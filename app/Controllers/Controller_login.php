<?php

namespace App\Controllers;

use App\Models\user_model;

class Controller_login extends BaseController
{
    public function index()
    {
        return view('View_login');
    }
    public function login(){
        //$model=new user_model();
        //echo $model->getUsers(); 
        return redirect()->route('home');
                
    }
}