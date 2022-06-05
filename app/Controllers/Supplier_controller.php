<?php 
namespace App\Controllers;

use App\Models\User_model;
use App\Models\Employee_type_model;
use App\Models\Supplier_model;
use CodeIgniter\Controller;
use CodeIgniter\RESTful\ResourceController;


class Supplier_controller extends ResourceController{

    protected $modelName = 'App\Models\Supplier_model';
    protected $format    = 'json';
    
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
            $data = $this->getSuppliers();
            $this->userModel = new User_model();
            if (session()->has('userId')) {
                $userAccessArray = $this->userModel->getUserAccess(session()->get('userId'));
            } else if (isset($_COOKIE['userId'])) {
                $userAccessArray = $this->userModel->getUserAccess($_COOKIE['userId']);
            }
            $view = view('header_footer/header').view('header_footer/sidebar', compact('data', 'userAccessArray')).view('Supplier_View');
            return $view;
        }
    }

    public function getSuppliers()
    {
        return $this->model->getAllSuppliers();
    }

    public function deleteSupplier($id)
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
            if($this->model->deleteSupplier($id)>0){
                return redirect()->route('aprovisionamiento/proveedores/lista_proveedores');
            }
            else{

            }
        }
    }
}