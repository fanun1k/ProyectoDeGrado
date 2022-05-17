<?php 
namespace App\Controllers;

use App\Models\Employee_type_model;
use CodeIgniter\Controller;


class Employee_controller extends Controller{

    protected $modelName = 'App\Models\Employee_model';
    protected $format    = 'json';
    public function index(){
        $employeeTypeModel=new Employee_type_model();
        $data=$employeeTypeModel->getNameAndCountAllEmmployeeTypes();
        $vista=view('header_footer/header').view('header_footer/sidebar').view('Employee_view',compact('data'));
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
}