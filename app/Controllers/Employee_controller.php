<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class Employee_controller extends Controller{

    public function index(){
        $vista=view('header_footer/header').view('header_footer/sidebar').view('Employee_view').view('header_footer/footer');
        return $vista;
    }
}