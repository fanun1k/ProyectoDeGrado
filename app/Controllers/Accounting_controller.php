<?php

namespace App\Controllers;

use App\Models\User_model;
use CodeIgniter\RESTful\ResourceController;

class Accounting_controller extends ResourceController
{
    public function index()
	{
        $userModel = new User_model();
        if (session()->has('userId')) $userAccessArray = $userModel->getUserAccess(session()->get('userId'));
        else if (isset($_COOKIE['userId'])) $userAccessArray = $userModel->getUserAccess($_COOKIE['userId']);
        $view = view('header_footer/header') . view('header_footer/sidebar', compact('userAccessArray')) . view('Accounting_view');
        return $view;
	}

	
}

?>