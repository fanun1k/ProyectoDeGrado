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
        helper('cookie');
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
        $verified_email = $this->model->login($email, $password);
        
        if($verified_email == NULL) { //Wrong username or password
            return redirect()->route('login');
        }
        else {
            if(isset($_POST['remember_me'])){ //Use Cookie
                setcookie('email', $verified_email, time()+3600*24*30, '/');
            }
            else{ //Use Session
                session()->set('email', $verified_email);
            }
            return redirect()->route('home');
        }
    }

    public function logout(){
        session()->remove('email');
        setcookie('email', '', time() - 3600, '/');
        return redirect()->route('home');
    }
}
?>