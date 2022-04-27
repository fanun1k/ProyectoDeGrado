<?php

namespace App\Controllers;

use App\Models\dining_area_model;
use CodeIgniter\RESTful\ResourceController;

class Controller_dining_area extends ResourceController
{
    protected $modelName = 'App\Models\dining_area_model';
    protected $format    = 'json';
    
    public function index()
    {
        return view('View_login');
    }
    
    public function dining_area(){
        
        $view = view('header_footer/header').view('header_footer/sidebar').view('View_dining_area').view('header_footer/footer');
        return $view;
    }
}
?>