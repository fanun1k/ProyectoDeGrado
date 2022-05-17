<?php

namespace App\Controllers;

use App\Models\Dining_area_model;
use App\Models\Food_times_model;
use App\Models\User_model;
use CodeIgniter\RESTful\ResourceController;

class Dining_area_controller extends ResourceController
{
    protected $modelName = 'App\Models\Dining_area_model';
    protected $format    = 'json';

    public function index()
    {
        if (session()->has('userId')) {
            $userId = session()->get('userId');
        } else if (isset($_COOKIE['userId'])) {
            $userId = $_COOKIE['userId'];
        }
        if ($userId == NULL) {
            session()->set('error', 'Enlace no permitido. Debe iniciar sesión.');
            return redirect()->route('/');
        }
        $this->userModel = new User_model();
        $status = $this->userModel->getUserStatus($userId);
        if ($status == -1 || $status == 0) {
            session()->set('error', 'Enlace no permitido. Debe iniciar sesión.');
            return redirect()->route('/');
        }
        else if ($status == 1) {
            $data = $this->getDiningAreaData(10,1);
            $view = view('header_footer/header').view('header_footer/sidebar',compact('data')).view('List_dining_area_view').view('header_footer/footer');
            return $view;
        }
    }
        
    public function diningArea()
    {
        if (session()->has('userId')) {
            $userId = session()->get('userId');
        } else if (isset($_COOKIE['userId'])) {
            $userId = $_COOKIE['userId'];
        }
        if ($userId == NULL) {
            session()->set('error', 'Enlace no permitido. Debe iniciar sesión.');
            return redirect()->route('/');
        }
        $this->userModel = new User_model();
        $status = $this->userModel->getUserStatus($userId);
        if ($status == -1 || $status == 0) {
            session()->set('error', 'Enlace no permitido. Debe iniciar sesión.');
            return redirect()->route('/');
        }
        else if ($status == 1) {
            $this->foodTimesModel = new Food_times_model();
            $data = $this->foodTimesModel->getFoodTimes();
            $view = view('header_footer/header').view('header_footer/sidebar').view('Add_dining_area_view',compact('data')).view('header_footer/footer');
            return $view;
        }
    }

    public function getDiningAreaData($limit, $offset)
    {
        return $this->model->getAllDiningArea($limit, $offset);
    }

    public function registerDiningArea()
    {
        $diningArea = array('companyId' => 1,
                            'diningAreaName' => $this->request->getPost('diningAreaName'),
                            'latitude' => $this->request->getPost('lat'),
                            'longitude' => $this->request->getPost('lng'),
                            'averageCalorie' => $this->request->getPost('averageCalorie'));
        
        $foodTimes = $this->request->getPost('foodTime');
        
        if($this->model->insertDiningArea($diningArea, array_filter($foodTimes)) > 0){
            return redirect()->to('Dining_area_controller/index');
        }
        else{
            echo "hello";
        }
    }

    public function updateDiningArea() //LATER
    {
        $diningArea = array('companyId' => 1,
                            'diningAreaName' => $this->request->getPost('diningAreaName'),
                            'latitude' => -16.987645,
                            'longitude' => -66.234325,
                            'averageCalorie' => $this->request->getPost('averageCalorie'));
        
        $foodTimes = $this->request->getPost('foodTime');
        
        if($this->model->updateDiningArea($diningArea, array_filter($foodTimes)) > 0){
            return redirect()->to('Dining_area_controller/index');
        }
        else{
            echo "Error";
        }
    }

    public function deleteDiningArea($id) {
        if (session()->has('userId')) {
            $userId = session()->get('userId');
        } else if (isset($_COOKIE['userId'])) {
            $userId = $_COOKIE['userId'];
        }
        if ($userId == NULL) {
            session()->set('error', 'Enlace no permitido. Debe iniciar sesión.');
            return redirect()->route('/');
        }
        $this->userModel = new User_model();
        $status = $this->userModel->getUserStatus($userId);
        if ($status == -1 || $status == 0) {
            session()->set('error', 'Enlace no permitido. Debe iniciar sesión.');
            return redirect()->route('/');
        }
        else if ($status == 1) {
            if($this->model->deleteDiningArea($id)>0){
                return redirect()->to('Dining_area_controller/index');
            }
            else{
                echo "problemas";
            }
        }
    }
}

?>