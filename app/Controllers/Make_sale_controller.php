<?php

namespace App\Controllers;

use App\Models\Product_model;
use App\Models\User_model;
use App\Models\Sale_model;
use CodeIgniter\RESTful\ResourceController;

class Make_sale_controller extends ResourceController
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

        $product_model = new Product_model();
        $productsList = $product_model->getProductForSale();
        $view = view('header_footer/header').view('header_footer/sidebar',compact('userAccessArray')).view('Make_sale_view',compact('productsList'));
        return $view;
    }
    
    public function getProductsForSale(){
        $product_model=new Product_model();
        $products=[];
        foreach ($product_model->getProductForSale() as $value) {
            array_push($products,$value); 
        }
        
        return $this->respond($products);
    }

    public function insertSale(){
        $productos=json_decode($_POST['myarray'],true);
        $userId=1;
        $product_model = new Product_model();
        if (session()->has('userId')) {
            $userId = session()->get('userId');
        } else if (isset($_COOKIE['userId'])) {
            $userId = $_COOKIE['userId'];
        }
        $total=0;
        $ux=[];
        foreach ($productos as $value) {
            
            $id=$value[0];
            $value[2]=$product_model->getPrice($id);
            $total+=$value[1]*$value[2];
            array_push($ux,$value);
        }
        
        $productos=$ux;
        return $this->model->insertSale($total,$userId,$productos);
    }
}

?>