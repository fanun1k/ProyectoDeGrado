<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Home extends ResourceController
{
    public function index()
    {
        helper('cookie');
        if (session()->has('email') || isset($_COOKIE['email'])) {
            $vista = view('header_footer/header').view('header_footer/sidebar').view('baseView').view('header_footer/footer');
            return $vista;
        }
        else {
            return redirect()->route('login');
        }
    }
}