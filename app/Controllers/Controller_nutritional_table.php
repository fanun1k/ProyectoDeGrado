<?php

namespace App\Controllers;
use App\Models\supply_model;
use App\Models\supply_type_model;
use App\Models\type_supply_model;
use CodeIgniter\RESTful\ResourceController;

class Controller_nutritional_table extends ResourceController
{
    protected $modelName = 'App\Models\supply_model';
    protected $format    = 'json';
    
    public function index()
    {
        $data= $this->GetSupplyTable(10,1);
        $data_type_supply=$this->GetTypeSupplies();
        $vista= view('header_footer/header').view('header_footer/sidebar',compact('data','data_type_supply')).view('view_nutritional_table').view('header_footer/footer');
        return $vista;
    }

    public function GetSupplyTable($limit,$offset){
        return $this->model->getAllSupplies($limit,$offset);
    }

    public function RegisterNewSupply(){
        $data = array('nombre_insumo' => $this->request->getPost('nombre'),
                    'id_tipo_insumo' => $this->request->getPost('tipo_insumo'),
                    'valor_calorico' => $this->request->getPost('kcal'), 
                    'proteinas'=>$this->request->getPost('val_proteina'),
                    'grasas'=>$this->request->getPost('val_grasas'),
                    'carbohidratos'=>$this->request->getPost('val_carbohidratos'));   
       if ($this->model->InsertSupply($data)>0) {
           return $this->index();
       }
       echo "error";
    }
    
    public function GetTypeSupplies(){
        $type_supplies=new type_supply_model();
        return $type_supplies->getAllTypeSupplies(10,1);
    }
}