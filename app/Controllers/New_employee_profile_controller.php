<?php

namespace App\Controllers;

use App\Models\Employee_type_model;
use App\Models\User_model;
use App\Models\Employee_model;
use CodeIgniter\RESTful\ResourceController;

class New_employee_profile_controller extends ResourceController
{
    protected $modelName = 'App\Models\Employee_model';
    protected $format    = 'json';
    public function index()
    {
        $employeeTypeModel=new Employee_type_model();
        $data=$employeeTypeModel->getEmployeeTypes();
        $this->userModel = new User_model();
        if (session()->has('userId')) {
            $userAccessArray = $this->userModel->getUserAccess(session()->get('userId'));
        }
        else if (isset($_COOKIE['userId'])) {
            $userAccessArray = $this->userModel->getUserAccess($_COOKIE['userId']);
        }

        $view=view('header_footer/header').view('header_footer/sidebar',compact('userAccessArray')).view('New_employee_profile_view',compact('data'));
        return $view;
    }
    public function registerNewEmployee(){
        $data=array('name'=>$_POST['name'],
                'lastName1'=>$_POST['lastName1'],
                'lastName2'=>$_POST['lastName2'],
                'employeePhoneNumber'=>$_POST['employeePhoneNumber'],
                'employeeLatitude'=>-17.3742,
                'employeeLongitude'=>-66.1622,
                'employeeCI'=>$_POST['employeeCI'],  
                'employeeGender'=>$_POST['employeeGender'],
                'employeeDateOfBirth'=>$_POST['employeeDateOfBirth'],
                'employeeCode'=>$_POST['employeeCode']);
        $msg=$this->model->registerNewEmployee($data);
        if ($msg>0) {
            return redirect()->route('recursos_humanos/nuevo_perfil');
        }    
        else{
            echo 'error';
        }
    }
}

?>