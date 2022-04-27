<?php

namespace App\Controllers;
use App\Models\user_model;

use CodeIgniter\RESTful\ResourceController;

class Controller_nutritional_table extends ResourceController
{
    protected $modelName = 'App\Models\supply_model';
    protected $format    = 'json';
    
    public function index()
    {
        $data= $this->GetSupplyTable(10,1);
        $vista= view('header_footer/header').view('header_footer/sidebar',compact('data')).view('view_nutritional_table').view('header_footer/footer');
        return $vista;
    }
    public function GetSupplyTable($limit,$offset){
        return $this->model->getAllSupplies($limit,$offset);
    }
}