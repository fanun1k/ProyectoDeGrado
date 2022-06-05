<?php

namespace App\Controllers;

use App\Models\Product_category_model;
use CodeIgniter\RESTful\ResourceController;
use App\Models\User_model;
use App\Models\Product_model;

class Products_list_controller extends ResourceController
{
    protected $modelName = 'App\Models\Product_model';
    protected $format    = 'json';
    public function index(){
        $userModel= new User_Model();
        if (session()->has('userId')) {
            $userAccessArray = $userModel->getUserAccess(session()->get('userId'));
        } else if (isset($_COOKIE['userId'])) {
            $userAccessArray = $userModel->getUserAccess($_COOKIE['userId']);
        }
        $view=view("header_footer/header").view("header_footer/sidebar",compact('userAccessArray')).view("Products_list_view");
        return $view;
    }
    public function getProducts(){
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
       
        $result = $this->model->getProducts($sidx, $sord, $start, $limit);
        
        $data=[
            'page'=>$page,
            'total'=>$total_pages,
            'records'=>$count,
            'rows'=>$result        
        ];           

        return $this->respond($data);
    }
    public function crudProduct(){
        switch ($_POST['oper']) {
            case 'add':
                unset($_REQUEST['id']);
                unset($_REQUEST['productId']);
                unset($_REQUEST['oper']);
                $_REQUEST['productCategoryId']=$_REQUEST['categoryName'];
                unset($_REQUEST['categoryName']);
            return $this->model->insert($_REQUEST);    
                break;
            case 'edit':
                $id = $_POST['id'];

                unset($_REQUEST['id']);
                
                break;
            case 'del':
                
                break;
        }
    }
    public function getOptionsProductCategory(){
        $product_ategory=new Product_category_model();
        echo $product_ategory->getOptionsProductCategory();
    } 
}

?>