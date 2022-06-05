<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\User_model;

class Products_controller extends ResourceController
{
    protected $modelName = 'App\Models\Product_model';
    protected $format    = 'json';
    public function index(){
        $userModel= new User_Model();
        if (session()->has('userId')) {
            $userAccessArray = $userModel->getUserAccess(session()->get('userId'));
        } else if (isset($_COOKIE['userId'])) {
            $userAccessArray = $userModel->getUserAccess($_COOKIE['userId']);
        }
        $view=view("header_footer/header").view("header_footer/sidebar",compact('userAccessArray')).view("Products_list_view");
        return $view;
    }
}

?>