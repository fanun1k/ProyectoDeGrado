<?php

namespace App\Controllers;

use App\Models\user_model;
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
            return redirect()->route('inicio');
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
        return redirect()->route('inicio'); //->withInput()->with('validation',$this->validator);;
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
            $email->setMessage("<a href='".base_url()."/recuperar_cuenta?tk=".$tokenVar."'>Cambiar de Contraseña</a>");
            $email->send();
        }
        return redirect()->route('inicio');
    }

    public function recoverPasswordPage(){
        $urlComponents = parse_url("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        parse_str($urlComponents['query'], $params);
        $data['tk'] = $params['tk'];
        return view('Recover_password_view', $data);
    }

    public function changePassword(){
        if(md5($_POST['password']) == md5($_POST['password2'])){
            $query = $this->model->updatePassword($_POST['token'], md5($_POST['password']));
            return redirect()->route('inicio');
        }
        else{
            return redirect()->to($_SERVER['HTTP_REFERER']);
        }
    }
}

?>