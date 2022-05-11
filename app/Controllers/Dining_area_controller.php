<?php

namespace App\Controllers;

use App\Models\dining_area_model;
use App\Models\food_times_model;
use CodeIgniter\RESTful\ResourceController;

class Dining_area_controller extends ResourceController
{
    protected $modelName = 'App\Models\Dining_area_model';
    protected $format    = 'json';

    public function index()
    {
        $data = $this->model->getDiningArea();
        $view = view('header_footer/header').view('header_footer/sidebar').view('List_dining_area_view', compact('data')).view('header_footer/footer');
        return $view;
    }
        
    public function diningArea()
    {
        $this->foodTimesModel = new food_times_model();
        $data = $this->foodTimesModel->getFoodTimes();
        $view = view('header_footer/header').view('header_footer/sidebar').view('Add_dining_area_view',compact('data')).view('header_footer/footer');
        return $view;
    }

    public function registerDiningArea()
    {
        $diningArea = array('companyId' => 1,
                            'diningAreaName' => $this->request->getPost('diningAreaName'),
                            'latitude' => -16.987645,
                            'longitude' => -66.234325,
                            'averageCalorie' => $this->request->getPost('averageCalorie'));
        
        $foodTimes = $this->request->getPost('foodTime');
        
        if($this->model->insertDiningArea($diningArea, array_filter($foodTimes)) > 0){
            return redirect()->to('Dining_area_controller/index');
        }
        else{
            echo "hello";
        }
    }
}

?>