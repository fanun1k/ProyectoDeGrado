<?php

namespace App\Controllers;

use App\Models\user_model;
use CodeIgniter\RESTful\ResourceController;

class Controller_login extends ResourceController
{
    protected $modelName = 'App\Models\user_model';
    protected $format    = 'json';

    public function index()
    {
        if (session()->has('email') || isset($_COOKIE['email'])) {
            return redirect()->route('home');
        }
        else {
            return view('View_login');
        }
    }
    
    public function login(){
        $email = $_POST['username'];
        $password = md5($_POST['password']);
        $query = $this->model->login($email, $password);
        
        foreach ($query->getResult() as $row) {
            $verified_user_id = $row->id_usuario;
            $verified_email = $row->correo_electronico;
            $verified_password = $row->contrasena;
            $verified_name = $row->nombre;
            $verified_last_name_1 = $row->primer_apellido;
            $verified_last_name_2 = $row->segundo_apellido;
            $verified_employee_code = $row->codigo_empleado;
        }

        if($verified_user_id == NULL) { //Wrong username or password
            return redirect()->route('login');
        }
        else {
            if(isset($_POST['remember_me'])){ //Use Cookie
                setcookie('user_id', $verified_user_id, time()+3600*24*30, '/');
                setcookie('email', $verified_email, time()+3600*24*30, '/');
                setcookie('password', $verified_password, time()+3600*24*30, '/');
                setcookie('name', $verified_name, time()+3600*24*30, '/');
                setcookie('last_name_1', $verified_last_name_1, time()+3600*24*30, '/');
                setcookie('last_name_2', $verified_last_name_2, time()+3600*24*30, '/');
                setcookie('employee_code', $verified_employee_code, time()+3600*24*30, '/');
            }
            else{ //Use Session
                session()->set('user_id', $verified_user_id);
                session()->set('email', $verified_email);
                session()->set('password', $verified_password);
                session()->set('name', $verified_name);
                session()->set('last_name_1', $verified_last_name_1);
                session()->set('last_name_2', $verified_last_name_2);
                session()->set('employee_code', $verified_employee_code);
            }
            return redirect()->route('home');
        }
    }

    public function logout(){
        session()->remove('user_id');
        session()->remove('email');
        session()->remove('password');
        session()->remove('name');
        session()->remove('last_name_1');
        session()->remove('last_name_2');
        session()->remove('employee_code');
        setcookie('user_id', '', time() - 3600, '/');
        setcookie('email', '', time() - 3600, '/');
        setcookie('password', '', time() - 3600, '/');
        setcookie('name', '', time() - 3600, '/');
        setcookie('last_name_1', '', time() - 3600, '/');
        setcookie('last_name_2', '', time() - 3600, '/');
        setcookie('employee_code', '', time() - 3600, '/');
        return redirect()->route('home');
    }

    public function recover_password(){
        $email_recover_password = $_POST['email_recover_password'];
        $query = $this->model->get_num_user_by_email($email_recover_password);
        if($query > 0){
            $token = substr(md5(uniqid(rand(), true)), 0, 15).substr(md5(uniqid(rand(), true)), 0, 15);
            $this->model->insert_token($email_recover_password, $token);

            $email = \Config\Services::email();
            $email->setFrom('elpadGastronomico@gmail.com', 'ELPAD & L.G.');
            $email->setTo($email_recover_password);
            $email->setSubject('Recuperar su cuenta');
            $email->setMessage("<a href='".base_url()."/recuperar_cuenta?tk=".$token."'>Cambiar de Contraseña</a>");
            $email->send();
        }
        return redirect()->route('login');
    }

    public function recover_password_page(){
        $url_components = parse_url("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        parse_str($url_components['query'], $params);
        $data['tk'] = $params['tk'];
        return view('View_recover_password', $data);
    }

    public function change_password(){
        if(md5($_POST['password']) == md5($_POST['password2'])){
            $query = $this->model->update_password($_POST['token'], md5($_POST['password']));
            return redirect()->route('login');
        }
    }
}
?>