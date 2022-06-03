<?php

namespace App\Controllers;

use App\Models\User_model;
use App\Models\Client_model;
use CodeIgniter\RESTful\ResourceController;

class Client_list_controller extends ResourceController
{

    protected $modelName = 'App\Models\Client_model';
    protected $format    = 'json';
    public function index()
    {
        $userModel = new User_model();
        if (session()->has('userId')) {
            $userAccessArray = $userModel->getUserAccess(session()->get('userId'));
        } else if (isset($_COOKIE['userId'])) {
            $userAccessArray = $userModel->getUserAccess($_COOKIE['userId']);
        }
        $view = view('header_footer/header') . view('header_footer/sidebar', compact('userAccessArray')) . view('Client_list_view');
        return $view;
    }
    public function getClients()
    {
        $data = $this->model->getClients();
        return $this->respond($data);
    }
    public function crudClient()
    {
        $page = $_GET['page']; // get the requested page
        $limit = $_GET['rows']; // get how many rows we want to have into the grid
        $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
        $sord = $_GET['sord']; // get the direction
        if(!$sidx) $sidx =1;
        switch ($_POST['oper']) {
            case 'add':
                print_r($_REQUEST);
                break;
            case 'edit':
                $id=$_POST['clientId'];
                
                unset($_REQUEST['id']);
                print_r($_REQUEST);
                return $this->model->UpdateClient($id,$_REQUEST);
                break;
            case 'del':
                return $this->respond($this->model->deletClient($_POST['id']));
                break;
        }
    }
}
