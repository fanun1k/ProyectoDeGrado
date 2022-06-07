<?php 
namespace App\Controllers;

use App\Models\User_model;
use App\Models\Employee_type_model;
use App\Models\Supplier_model;
use App\Models\Product_model;
use App\Models\Supply_model;
use CodeIgniter\Controller;
use CodeIgniter\RESTful\ResourceController;


class Order_controller extends ResourceController{

    protected $modelName = 'App\Models\Order_model';
    protected $format    = 'json';
    
    //productos
    public function index(){
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
            $dataProducts = $this->getProductForOrder();
            $dataSuppliers = $this->getSuppliersForOrder();
            $this->userModel = new User_model();
            if (session()->has('userId')) {
                $userAccessArray = $this->userModel->getUserAccess(session()->get('userId'));
            } else if (isset($_COOKIE['userId'])) {
                $userAccessArray = $this->userModel->getUserAccess($_COOKIE['userId']);
            }
            $view = view('header_footer/header').view('header_footer/sidebar', compact('dataProducts','dataSuppliers', 'userAccessArray')).view('Order_product_view');
            return $view;
        }
    }

    public function getProductForOrder()
    {
        $products = new Product_model();
        return $products->getProductForOrder();
    }

    public function getSuppliersForOrder()
    {
        $suppliers = new Supplier_model();
        return $suppliers->getAllSuppliers();
    }

    //insumos
    public function indexSupply(){
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
            //$data = $this->getSuppliers();
            $this->userModel = new User_model();
            if (session()->has('userId')) {
                $userAccessArray = $this->userModel->getUserAccess(session()->get('userId'));
            } else if (isset($_COOKIE['userId'])) {
                $userAccessArray = $this->userModel->getUserAccess($_COOKIE['userId']);
            }
            $view = view('header_footer/header').view('header_footer/sidebar', compact('data', 'userAccessArray')).view('Order_supply_view');
            return $view;
        }
    }
}