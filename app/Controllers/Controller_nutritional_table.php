<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Controller_nutritional_table extends ResourceController
{
    public function index()
    {
        $vista= view('header_footer/header').view('header_footer/sidebar').view('view_nutritional_table').view('header_footer/footer');
        return $vista;
    }
}