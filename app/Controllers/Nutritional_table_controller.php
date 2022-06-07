<?php

namespace App\Controllers;

use App\Models\Supply_model;
use App\Models\Supply_type_model;
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
        $view= view('header_footer/header').view('header_footer/sidebar',compact('userAccessArray')).view('Nutritional_table_view');
        return $view;
    }

    public function getSupplyTable()
    {
        $page = $_GET['page']; // get the requested page
        $limit = $_GET['rows']; // get how many rows we want to have into the grid
        $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
        $sord = $_GET['sord']; // get the direction
        if (!$sidx) $sidx = 1;

        $count = $this->model->where('status =', 1)->countAllResults();

        if ($count > 0 && $limit > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages) $page = $total_pages;
        $start = $limit * $page - $limit;
        if ($start < 0) $start = 0;

        $result = $this->model->getSupplies($sidx, $sord, $start, $limit);

        $data = [
            'page' => $page,
            'total' => $total_pages,
            'records' => $count,
            'rows' => $result
        ];

        return $this->respond($data);
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
    public function getOptionsSupplyType()
    {
        $product_ategory = new Supply_type_model();
        echo $product_ategory->getOptionsSupplyType();
    }
    public function crudSupply(){
        switch ($_POST['oper']) {
            case 'add':
                unset($_REQUEST['supplyId']);
                unset($_REQUEST['oper']);

                $_REQUEST['supplyTypeId'] = $_REQUEST['supplyTypeName'];
                unset($_REQUEST['supplyTypeName']);
                
                $id= $this->model->insert($_REQUEST);
                
                if (isset($_FILES['image'])) {
                    $id=$_POST["id"];
                    $this->upLoadProductImage($id,$_FILES);
                }
                echo $id;
                break;
            case 'edit':
                $_REQUEST['supplyTypeId'] = $_REQUEST['supplyTypeName'];
                $id=$_REQUEST['id'];               
                unset($_REQUEST['supplyId']);
                unset($_REQUEST['supplyTypeName']);
                if (isset($_FILES['image'])) {
                    $this->upLoadProductImage($id,$_FILES);
                }
                return $this->model->updateSupply($id, $_REQUEST);
                break;
            case 'del':
                return $this->model->deleteSupply($_REQUEST['id']);
                break;
        }
        
    }
    public function upLoadProductImage($id,$file){
        echo $id;
        print_r($file);
        $image = $file['image']['name'];
        $tipo = $file['image']['type'];
        $tamano = $file['image']['size'];
        $temp = $file['image']['tmp_name'];

        if (move_uploaded_file($temp, 'images/supply-images/'.$id.".jpg")) {
            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
            chmod('images/supply-images/'.$id.".jpg", 0777);
            //Mostramos el mensaje de que se ha subido co éxito
            echo 'imagen subida correctamente';
        }
        else {
            //Si no se ha podido subir la imagen, mostramos un mensaje de error
            echo 'la imagen no se suibó correctamente';
         }
    }
}

?>