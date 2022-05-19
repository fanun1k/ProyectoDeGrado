<?php

namespace App\Controllers;

use App\Models\Employee_type_model;
use CodeIgniter\RESTful\ResourceController;

class New_employee_profile_controller extends ResourceController
{
    public function index()
    {
        $employeeTypeModel=new Employee_type_model();
        $data=$employeeTypeModel->getEmployeeTypes();
        $view=view('header_footer/header').view('header_footer/sidebar').view('New_employee_profile_view',compact('data'));
        return $view;
    }
    public function registerNewEmployee(){
        echo "gaaaaa";
    }
}

?>