<?php 
namespace App\Controllers;

use App\Models\User_model;
use App\Models\Employee_type_model;
use App\Models\Employee_model;
use CodeIgniter\Controller;
use CodeIgniter\RESTful\ResourceController;


class Employee_controller extends Controller{

    protected $modelName = 'App\Models\Employee_model';
    protected $format    = 'json';
    public function index(){
        $employeeTypeModel=new Employee_type_model();
        $data=$employeeTypeModel->getNameAndCountAllEmmployeeTypes();
        $this->userModel = new User_model();
        if (session()->has('userId')) {
            $userAccessArray = $this->userModel->getUserAccess(session()->get('userId'));
        }
        else if (isset($_COOKIE['userId'])) {
            $userAccessArray = $this->userModel->getUserAccess($_COOKIE['userId']);
        }
        $vista=view('header_footer/header').view('header_footer/sidebar', compact('userAccessArray')).view('Employee_view',compact('data'));
        return $vista;

    }
    public function registerEmployeeType(){
        $employeeTypeName=$_POST['employeeTypeName'];

        $employeeTypeModel=new Employee_type_model();

        if($employeeTypeModel->registerEmployeeType($employeeTypeName)){
            return redirect()->route('recursos_humanos/personal_de_trabajo');
        }
        else{
            echo 'error';
        }
    }

    public function employeeMemorandum() {
        $employee=new Employee_model();
        $dataEmployee=$employee->getAllEmployees();
        $this->userModel = new User_model();
        if (session()->has('userId')) {
            $userAccessArray = $this->userModel->getUserAccess(session()->get('userId'));
        }
        else if (isset($_COOKIE['userId'])) {
            $userAccessArray = $this->userModel->getUserAccess($_COOKIE['userId']);
        }
        $view = view('header_footer/header').view('header_footer/sidebar',compact('userAccessArray')).view('Employee_memorandum_view', compact('dataEmployee')).view('header_footer/footer');
        return $view;
    }

    public function registerEmployeeMemorandum() {
        
        $data = array('employeeId' => $this->request->getPost('employee'),
                    'workMemorandumDescription' => $this->request->getPost('description'));

        if ($this->model->insertEmployeeMemorandum($data)>0) {
            //return redirect()->route('gestion_nutricional/tabla_nutricional');
            echo "insertado";
        }
    }
}