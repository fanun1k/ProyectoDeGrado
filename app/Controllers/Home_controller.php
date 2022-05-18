<?php

namespace App\Controllers;

use App\Models\User_model;
use CodeIgniter\RESTful\ResourceController;

class Home_controller extends ResourceController
{
    protected $modelName = 'App\Models\User_model';
    protected $format    = 'json';

    public function index()
    {
        helper('cookie');
        if (session()->has('userId') || isset($_COOKIE['userId'])) {
            if (session()->has('userId')) {
                $userAccessArray = $this->model->getUserAccess(session()->get('userId'));
            }
            else if (isset($_COOKIE['userId'])) {
                $userAccessArray = $this->model->getUserAccess($_COOKIE['userId']);
            }
            $view = view('header_footer/header').view('header_footer/sidebar', compact('userAccessArray')).view('Base_view').view('header_footer/footer');
            return $view;
        }
        else {
            return redirect()->route('/');
        }
    }
}

?>