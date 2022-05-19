<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class New_employee_profile_controller extends ResourceController
{
    public function index()
    {
       $view=view('header_footer/header').view('header_footer/sidebar').view('New_employee_profile_view');
       return $view;
    }
}

?>