<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $user_name=$_POST['UserName'];
        echo $user_name;
        return view('home_view');
    }
}
