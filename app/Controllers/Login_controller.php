<?php

namespace App\Controllers;

use App\Models\User_model;
use CodeIgniter\RESTful\ResourceController;

class Login_controller extends ResourceController
{
    protected $modelName = 'App\Models\User_model';
    protected $format    = 'json';

    public function index()
    {
        if (session()->has('userId') || isset($_COOKIE['userId'])) {
            return redirect()->route('inicio');
        }
        else {
            return view('Login_view');
        }
    }
    
    public function login(){
        $email = $_POST['username'];
        $password = md5($_POST['password']);
        $query = $this->model->login($email, $password);
        
        foreach ($query->getResult() as $row) {
            $verifiedUserId = $row->userId;
            $verifiedEmail = $row->email;
            $verifiedPassword = $row->password;
            $verifiedName = $row->name;
            $verifiedLastName1 = $row->lastName1;
            $verifiedLastName2 = $row->lastName2;
            $verifiedEmployeeCode = $row->employeeCode;
        }

        if($verifiedUserId == NULL) { //Wrong username or password
            session()->set('error', 'No se pudo encontrar su cuenta. Verifique su nombre de usuario y/o contraseña y vuelva a intentarlo.');
            return redirect()->route('/');
        }
        else {
            if(isset($_POST['rememberMe'])){ //Use Cookie
                setcookie('userId', $verifiedUserId, time()+3600*24*30, '/');
                setcookie('email', $verifiedEmail, time()+3600*24*30, '/');
                setcookie('password', $verifiedPassword, time()+3600*24*30, '/');
                setcookie('name', $verifiedName, time()+3600*24*30, '/');
                setcookie('lastName1', $verifiedLastName1, time()+3600*24*30, '/');
                setcookie('lastName2', $verifiedLastName2, time()+3600*24*30, '/');
                setcookie('employeeCode', $verifiedEmployeeCode, time()+3600*24*30, '/');
            }
            else{ //Use Session
                session()->set('userId', $verifiedUserId);
                session()->set('email', $verifiedEmail);
                session()->set('password', $verifiedPassword);
                session()->set('name', $verifiedName);
                session()->set('lastName1', $verifiedLastName1);
                session()->set('lastName2', $verifiedLastName2);
                session()->set('employeeCode', $verifiedEmployeeCode);
            }
            return redirect()->route('inicio');
        }
    }

    public function logout(){
        session()->remove('userId');
        session()->remove('email');
        session()->remove('password');
        session()->remove('name');
        session()->remove('lastName1');
        session()->remove('lastName2');
        session()->remove('employeeCode');
        setcookie('userId', '', time() - 3600, '/');
        setcookie('email', '', time() - 3600, '/');
        setcookie('password', '', time() - 3600, '/');
        setcookie('name', '', time() - 3600, '/');
        setcookie('lastName1', '', time() - 3600, '/');
        setcookie('lastName2', '', time() - 3600, '/');
        setcookie('employeeCode', '', time() - 3600, '/');
        return redirect()->route('/');
    }

    public function recoverPassword(){
        $emailRecoverPassword = $_POST['emailRecoverPassword'];
        $query = $this->model->getNumUserByEmail($emailRecoverPassword);
        if($query > 0){
            $token = substr(md5(uniqid(rand(), true)), 0, 15).substr(md5(uniqid(rand(), true)), 0, 15);
            $tokenVar = $this->model->insertToken($emailRecoverPassword, $token);

            $email = \Config\Services::email();
            $email->setFrom('elpadGastronomico@gmail.com', 'ELPAD & L.G.');
            $email->setTo($emailRecoverPassword);
            $email->setSubject('Recuperar su cuenta');
            $email->setMessage("Haga clic en el siguiente enlace para cambiar su contraseña: <a href='".base_url()."/recuperar_cuenta?tk=".$tokenVar."'>Cambiar de Contraseña</a>");
            $email->send();

            session()->set('alert', 'Revisa el correo electrónico que ha escrito para que pueda cambiar su contraseña.');
        }
        else{
            session()->set('error', 'No se pudo encontrar el correo electrónico que ha escrito. Verifique su correo electrónico y vuelva a intentarlo.');
        }
        return redirect()->route('/');
    }

    public function recoverPasswordPage(){
        $urlComponents = parse_url("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        parse_str($urlComponents['query'], $params);
        $data['tk'] = $params['tk'];

        $query = $this->model->getTokenStatus($params['tk']);

        switch ($query) {
            case -1:
                session()->set('error', 'Enlace no permitido.');
                return redirect()->route('/');
                break;
            case 0:
                session()->set('error', 'Ya ha hecho clic en ese enlace y ha cambiado su contraseña.');
                return redirect()->route('/');
                break;
            default:
                return view('Recover_password_view', $data);
        }
    }

    public function changePassword(){
        if(md5($_POST['password']) == md5($_POST['password2'])){
            $query = $this->model->updatePassword($_POST['token'], md5($_POST['password']));
            session()->set('success', 'Logró cambiar la contraseña.');
            return redirect()->route('/');
        }
        else{
            session()->set('error', 'Las contraseñas deben coincidir.');
            return redirect()->to($_SERVER['HTTP_REFERER']);
        }
    }
}

?>