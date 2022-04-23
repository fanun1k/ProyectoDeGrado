<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Home extends ResourceController
{
    public function index()
    {
        $vista= view('header_footer/header').view('header_footer/sidebar').view('baseView').view('header_footer/footer');
        return $vista;
    }
}
