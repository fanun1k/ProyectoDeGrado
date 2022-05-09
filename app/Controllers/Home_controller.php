<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Home_controller extends ResourceController
{
    public function index()
    {
        helper('cookie');
        if (session()->has('userId') || isset($_COOKIE['userId'])) {
            $view = view('header_footer/header').view('header_footer/sidebar').view('Base_view').view('header_footer/footer');
            return $view;
        }
        else {
            return redirect()->route('iniciar_sesion');
        }
    }
}

?>