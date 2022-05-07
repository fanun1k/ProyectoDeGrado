<?php

namespace App\Controllers;

use App\Models\dining_area_model;
use App\Models\food_times_model;
use CodeIgniter\RESTful\ResourceController;

class Controller_dining_area extends ResourceController
{
    protected $modelName = 'App\Models\dining_area_model';
    protected $format    = 'json';

    public function index() {
        $view = view('header_footer/header').view('header_footer/sidebar').view('View_list_dining_area').view('header_footer/footer');
        return $view;
    }
        
    public function diningArea(){
        
        $this->food_times_model = new food_times_model();
        $data = $this->food_times_model->getFoodTimes();
        $view = view('header_footer/header').view('header_footer/sidebar').view('View_add_dining_area',compact('data')).view('header_footer/footer');
        return $view;
    }

    public function registerDiningArea(){

        $diningArea = array('id_empresa' => 1,
                            'nombre_comedor' => $this->request->getPost('nombre_comedor'),
                            'latitud' => -16.987645,
                            'longitud' => -66.234325,
                            'media_calorica' => $this->request->getPost('media_calorica'));
        
        $foodTimes = $this->request->getPost('food_time');
        
        if($this->model->insertDiningArea($diningArea, array_filter($foodTimes)) > 0){
            return $this->index();
        }
    }
}
?>