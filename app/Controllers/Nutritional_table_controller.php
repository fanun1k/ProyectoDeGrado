<?php

namespace App\Controllers;
use App\Models\Supply_model;
use App\Models\Type_supply_model;
use CodeIgniter\RESTful\ResourceController;

class Nutritional_table_controller extends ResourceController
{
    protected $modelName = 'App\Models\Supply_model';
    protected $format    = 'json';
    
    
    public function index()
    {
        $data= $this->getSupplyTable(10, 1);
        $dataTypeSupply=$this->getTypeSupplies();
        $view= view('header_footer/header').view('header_footer/sidebar',compact('data','dataTypeSupply')).view('Nutritional_table_view').view('header_footer/footer');
        return $view;
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

    public function deleteSupply($id)
    {
        if($this->model->deleteSupply($id)>0){
            return redirect()->route('gestion_nutricional/tabla_nutricional');
        }
        else{

        }
    }
}

?>