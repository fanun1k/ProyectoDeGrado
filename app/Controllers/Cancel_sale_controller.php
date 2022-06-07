<?php

namespace App\Controllers;

use App\Models\User_model;
use App\Models\Sale_model;
use CodeIgniter\RESTful\ResourceController;

class Cancel_sale_controller extends ResourceController
{

    protected $modelName = 'App\Models\Sale_model';
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
        $view = view('header_footer/header') . view('header_footer/sidebar', compact('userAccessArray')) . view('Cancel_sale_view');
        return $view;
    }
    public function getSales()
    {
        $page = $_GET['page']; // get the requested page
        $limit = $_GET['rows']; // get how many rows we want to have into the grid
        $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
        $sord = $_GET['sord']; // get the direction
        if (!$sidx) $sidx = 1;

        $count = $this->model->where('status !=', 0)->countAllResults();

        if ($count > 0 && $limit > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages) $page = $total_pages;
        $start = $limit * $page - $limit;
        if ($start < 0) $start = 0;

        $result = $this->model->getSales($sidx, $sord, $start, $limit);

        $data = [
            'page' => $page,
            'total' => $total_pages,
            'records' => $count,
            'rows' => $result
        ];

        return $this->respond($data);
    }
    public function getSaleDetails($id)
    {
        return $this->respond($this->model->getSaleDetails($id));      
    }
    public function cancel_sale()
    {
        
        if($_REQUEST['oper']=='del'){
            $ids = explode(",", $_REQUEST['id']);
            foreach ($ids as $id) {
                $this->model->deleteSale($id);
            }
        }
    }
}
