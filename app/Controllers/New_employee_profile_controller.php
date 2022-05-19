<?php

namespace App\Controllers;

use App\Models\Employee_type_model;
use App\Models\User_model;
use CodeIgniter\RESTful\ResourceController;

class New_employee_profile_controller extends ResourceController
{
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
        echo "gaaaaa";
    }
}

?>