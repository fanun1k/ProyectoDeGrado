<?php

namespace App\Controllers;

use App\Models\Supply_model;
use App\Models\Type_supply_model;
use App\Models\User_model;
use CodeIgniter\RESTful\ResourceController;

class Make_sale_controller extends ResourceController
{
    protected $modelName = 'App\Models\Supply_model';
    protected $format    = 'json';
    
    
    public function index()
    {
        
        if (session()->has('userId')) {
            $userId = session()->get('userId');
        } else if (isset($_COOKIE['userId'])) {
            $userId = $_COOKIE['userId'];
        } else {
            session()->set('error', 'Enlace no permitido. Debe iniciar sesión.');
            return redirect()->route('/');
        }
        
        $userModel = new User_model();
        $status = $userModel->getUserStatus($userId);
        if ($status == -1 || $status == 0) {
            session()->set('error', 'Enlace no permitido. Debe iniciar sesión.');
            return redirect()->route('/');
        }
    
        $userAccessArray = $userModel->getUserAccess($userId);
        $view= view('header_footer/header').view('header_footer/sidebar',compact('userAccessArray')).view('Make_sale_view');
        return $view;
    }
}

?>