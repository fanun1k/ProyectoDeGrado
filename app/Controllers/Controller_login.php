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
        return view('View_login');
    }
    
    public function login(){
        $correo_electronico=$_POST['UserName'];
        $password=md5($_POST['password']);
        $session=$this->model->login($correo_electronico,$password);
        if ($session!=null) {
            return redirect()->route('home');
        }
        else {
            return redirect()->route('login');
        }
    }
}
?>