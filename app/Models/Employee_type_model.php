<?php 
namespace App\Models;

use CodeIgniter\Model;

class Employee_type_model extends Model{
    protected $table      = 'employee_type';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'employeeTypeId';
    protected $allowedFields= ['employeeTypeName', 'lastUpdate', 'status'];

    public function registerEmployeeType($employeeTypeName){
        return $this->insert(['employeeTypeName'=>$employeeTypeName]);
    }
    public function getEmployeeTypes(){ // faltaria el registro de empleados a los rolles para el count
        return $this->where('status', 1)->findAll();
    }
}