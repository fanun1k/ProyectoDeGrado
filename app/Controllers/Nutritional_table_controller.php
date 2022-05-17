<?php

namespace App\Controllers;

use App\Models\Supply_model;
use App\Models\Type_supply_model;
use App\Models\User_model;
use CodeIgniter\RESTful\ResourceController;

class Nutritional_table_controller extends ResourceController
{
    protected $modelName = 'App\Models\Supply_model';
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
        
        $userModel = new User_model();
        $status = $userModel->getUserStatus($userId);
        if ($status == -1 || $status == 0) {
            session()->set('error', 'Enlace no permitido. Debe iniciar sesión.');
            return redirect()->route('/');
        }
        else if ($status == 1) {
            $dataSupply= $this->getSupplyTable(10, 1);
            $dataTypeSupply=$this->getTypeSupplies();
            $view= view('header_footer/header').view('header_footer/sidebar',compact('dataSupply','dataTypeSupply')).view('Nutritional_table_view').view('header_footer/footer');
            return $view; 
        }
    }

    public function getSupplyTable($limit, $offset)
    {
        return $this->model->getAllSupplies($limit, $offset);
    }

    public function registerNewSupply()
    {
        $data = array('supplyName' => $this->request->getPost('supplyName'),
                    'supplyTypeId' => $this->request->getPost('supplyType'),
                    'caloricValue' => $this->request->getPost('caloricValue'), 
                    'proteinValue'=>$this->request->getPost('proteinValue'),
                    'fatValue'=>$this->request->getPost('fatValue'),
                    'carbohydratesValue'=>$this->request->getPost('carbohydratesValue'));   
        if ($this->model->insertSupply($data)>0) {
            return redirect()->route('gestion_nutricional/tabla_nutricional');
        }
        echo "error";
    }

    public function getTypeSupplies()
    {
        $type_supplies=new Type_supply_model();
        return $type_supplies->getAllTypeSupplies(10,1);
    }

    public function updateSupply($id){
        $data = array('supplyName' => $this->request->getPost('supplyName'),
                    'supplyTypeId' => $this->request->getPost('supplyType'),
                    'caloricValue' => $this->request->getPost('caloricValue'), 
                    'proteinValue'=>$this->request->getPost('proteinValue'),
                    'fatValue'=>$this->request->getPost('fatValue'),
                    'carbohydratesValue'=>$this->request->getPost('carbohydratesValue'),
                    'lastUpdate'=>date('Y-m-d H:i:s'));
        if($this->model->updateSupply($id, $data) > 0){
           return redirect()->route('gestion_nutricional/tabla_nutricional');
        }
    }

    public function deleteSupply($id)
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
            if($this->model->deleteSupply($id)>0){
                return redirect()->route('gestion_nutricional/tabla_nutricional');
            }
            else{

            }
        }
    }
}

?>