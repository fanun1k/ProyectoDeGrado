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
        $page = $_GET['page']; // get the requested page
        $limit = $_GET['rows']; // get how many rows we want to have into the grid
        $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
        $sord = $_GET['sord']; // get the direction
        if (!$sidx) $sidx = 1;

        $count = $this->model->where('status !=', 0)->countAll();

        if ($count > 0 && $limit > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages) $page = $total_pages;
        $start = $limit * $page - $limit;
        if ($start < 0) $start = 0;
       
        $result = $this->model->getClients($sidx, $sord, $start, $limit);
        
        $data=[
            'page'=>$page,
            'total'=>$total_pages,
            'records'=>$count,
            'rows'=>$result        
        ];           

        return $this->respond($data);
    }
    public function crudClient()
    {

        switch ($_POST['oper']) {
            case 'add':
                unset($_REQUEST['id']);
                unset($_REQUEST['clientId']);
                unset($_REQUEST['oper']);
                $_REQUEST['diningAreaId']=1; //estatico, se tiene que hacer de manera dinamica
                print_r($_REQUEST);
                return $this->model->insertClient($_REQUEST);
                break;
            case 'edit':
                $id = $_POST['id'];

                unset($_REQUEST['id']);
                print_r($_REQUEST);
                return $this->model->UpdateClient($id, $_REQUEST);
                break;
            case 'del':
                return $this->respond($this->model->deleteClient($_POST['id']));
                break;
        }
    }
}
