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
    public function index()
    {
        $userModel = new User_Model();
        if (session()->has('userId')) {
            $userAccessArray = $userModel->getUserAccess(session()->get('userId'));
        } else if (isset($_COOKIE['userId'])) {
            $userAccessArray = $userModel->getUserAccess($_COOKIE['userId']);
        }
        $view = view("header_footer/header") . view("header_footer/sidebar", compact('userAccessArray')) . view("Products_list_view");
        return $view;
    }
    public function getProducts()
    {
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

        $data = [
            'page' => $page,
            'total' => $total_pages,
            'records' => $count,
            'rows' => $result
        ];

        return $this->respond($data);
    }
    public function crudProduct()
    {

        if (isset($_POST['image'])) {
            echo "existe";
        }
        switch ($_POST['oper']) {
            case 'add':
                unset($_REQUEST['productId']);
                unset($_REQUEST['oper']);

                $_REQUEST['productCategoryId'] = $_REQUEST['categoryName'];
                unset($_REQUEST['categoryName']);
                
                $id= $this->model->insert($_REQUEST);
                
                if (isset($_FILES['image'])) {
                    $id=$_POST["id"];
                    $this->upLoadProductImage($id,$_FILES);
                }
                echo $id;
                break;
            case 'edit':
                $_REQUEST['productCategoryId'] = $_REQUEST['categoryName'];
                $id=$_REQUEST['id'];               
                unset($_REQUEST['productId']);
                unset($_REQUEST['categoryName']);
                if (isset($_FILES['image'])) {
                    $this->upLoadProductImage($id,$_FILES);
                }
                return $this->model->updateProduct($id, $_REQUEST);
                break;
            case 'del':
                return $this->model->deleteProduct($_REQUEST['id']);
                break;
        }
    }
    public function getOptionsProductCategory()
    {
        $product_ategory = new Product_category_model();
        echo $product_ategory->getOptionsProductCategory();
    }
    public function upLoadProductImage($id,$file){
        echo $id;
        print_r($file);
        $image = $file['image']['name'];
        $tipo = $file['image']['type'];
        $tamano = $file['image']['size'];
        $temp = $file['image']['tmp_name'];

        if (move_uploaded_file($temp, 'images/product-images/'.$id.".jpg")) {
            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
            chmod('images/product-images/'.$id.".jpg", 0777);
            //Mostramos el mensaje de que se ha subido co éxito
            echo 'imagen subida correctamente';
        }
        else {
            //Si no se ha podido subir la imagen, mostramos un mensaje de error
            echo 'la imagen no se suibó correctamente';
         }
    }
}
