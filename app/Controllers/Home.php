<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Home extends ResourceController
{
    public function index()
    {
        return view('home_view');
    }
}
