<?php

namespace App\Controllers;

use App\Models\Dining_area_model;
use App\Models\Food_times_model;
use App\Models\User_model;
use CodeIgniter\RESTful\ResourceController;
use Kint\Zval\Value;

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
        } else if ($status == 1) {
            $data = $this->getDiningAreaData(10, 1);
            $this->userModel = new User_model();
            if (session()->has('userId')) {
                $userAccessArray = $this->userModel->getUserAccess(session()->get('userId'));
            } else if (isset($_COOKIE['userId'])) {
                $userAccessArray = $this->userModel->getUserAccess($_COOKIE['userId']);
            }
            $view = view('header_footer/header') . view('header_footer/sidebar', compact('data', 'userAccessArray')) . view('List_dining_area_view') . view('header_footer/footer');
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
        } else if ($status == 1) {
            $this->foodTimesModel = new Food_times_model();
            $data = $this->foodTimesModel->getFoodTimes();
            $this->userModel = new User_model();
            if (session()->has('userId')) {
                $userAccessArray = $this->userModel->getUserAccess(session()->get('userId'));
            } else if (isset($_COOKIE['userId'])) {
                $userAccessArray = $this->userModel->getUserAccess($_COOKIE['userId']);
            }
            $view = view('header_footer/header') . view('header_footer/sidebar', compact('userAccessArray')) . view('Add_dining_area_view', compact('data'));
            return $view;
        }
    }

    public function getDiningAreaData($limit, $offset)
    {
        return $this->model->getAllDiningArea($limit, $offset);
    }

    public function registerDiningArea()
    {
        $diningArea = array(
            'companyId' => 1,
            'diningAreaName' => $this->request->getPost('diningAreaName'),
            'latitude' => $this->request->getPost('lat'),
            'longitude' => $this->request->getPost('lng'),
            'averageCalorie' => $this->request->getPost('averageCalorie')
        );

        $foodTimes = $this->request->getPost('foodTime');
        $foodTimesStartTime = $this->request->getPost('startTime');
        $foodTimesEndTime = $this->request->getPost('endTime');

        $foodTimesStartTime = array_values(array_filter($foodTimesStartTime));
        $foodTimesEndTime = array_values(array_filter($foodTimesEndTime));


        if ($this->model->insertDiningArea($diningArea, array_filter($foodTimes), $foodTimesStartTime, $foodTimesEndTime) > 0) {
            return redirect()->route('gestion_proyectos/gestion_comedores/visualizar_comedores');
        } else {
            echo "Error";
        }
    }

    public function updateDiningArea() //LATER
    {
        $diningArea = array(
            'companyId' => 1,
            'diningAreaName' => $this->request->getPost('diningAreaName'),
            'latitude' => -16.987645,
            'longitude' => -66.234325,
            'averageCalorie' => $this->request->getPost('averageCalorie')
        );

        $foodTimes = $this->request->getPost('foodTime');

        if ($this->model->updateDiningArea($diningArea, array_filter($foodTimes)) > 0) {
            return redirect()->route('gestion_proyectos/gestion_comedores/visualizar_comedores');
        } else {
            echo "Error";
        }
    }

    public function deleteDiningArea($id)
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
        } else if ($status == 1) {
            if ($this->model->deleteDiningArea($id) > 0) {
                return redirect()->route('gestion_proyectos/gestion_comedores/visualizar_comedores');
            } else {
                echo "Error";
            }
        }
    }
    public function getFoodTimes()
    {
        $foodTimesModel = new Food_times_model();
        
        $page = $_GET['page']; // get the requested page
        $limit = $_GET['rows']; // get how many rows we want to have into the grid
        $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
        $sord = $_GET['sord']; // get the direction
        if (!$sidx) $sidx = 1;

        $count = $foodTimesModel->where('status ==', 1)->countAllResults();

        if ($count > 0 && $limit > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages) $page = $total_pages;
        $start = $limit * $page - $limit;
        if ($start < 0) $start = 0;
        $result = $foodTimesModel->getFoodTimesTable($sidx, $sord, $start, $limit);
        
        $data=[
            'page'=>$page,
            'total'=>$total_pages,
            'records'=>$count,
            'rows'=>$result        
        ];           

        return $this->respond($data);
    }
    public function crudFoodTimes()
    {
        $foodTimesModel = new Food_times_model();
        switch ($_POST['oper']) {
            case 'add':
                unset($_REQUEST['id']);
                unset($_REQUEST['foodTimesId']);
                unset($_REQUEST['oper']);
                return $foodTimesModel->insertFoodTime($_REQUEST);
                break;
            case 'edit':
                $id = $_POST['id'];

                unset($_REQUEST['id']);
                return $foodTimesModel->updateFoodTime($id, $_REQUEST);
                break;
            case 'del':
                return $this->respond($foodTimesModel->deleteFoodTime($_POST['id']));
                break;
        }
    }
}
