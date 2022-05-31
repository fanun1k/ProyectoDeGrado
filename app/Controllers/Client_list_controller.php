<?php 
namespace App\Controllers;

use App\Models\User_model;
use CodeIgniter\Controller;

class Client_list_controller extends Controller{

    protected $modelName = 'App\Model\Client_model';
    protected $format    = 'json';
    public function index(){
        $userModel= new User_model();
        if (session()->has('userId')) {
            $userAccessArray = $userModel->getUserAccess(session()->get('userId'));
        }
        else if (isset($_COOKIE['userId'])) {
            $userAccessArray = $userModel->getUserAccess($_COOKIE['userId']);
        }
        $view= view('header_footer/header').view('header_footer/sidebar',compact('userAccessArray')).view('Client_list_view');
        return $view;
    }

}