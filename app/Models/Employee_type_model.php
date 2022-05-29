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

    public function getEmployeeTypes(){
        $db = db_connect();
        $builder = $db->table('employee_type et')->select('et.employeeTypeId, et.employeeTypeName, COUNT(e.employeeId) AS numberOfEmployeeTypes');
        $builder->join('(SELECT employeeTypeId, employeeId FROM employee_has_employee_type WHERE status = 1) AS ehet', 'et.employeeTypeId = ehet.employeeTypeId', 'left');
        $builder->join('(SELECT employeeId FROM employee WHERE status = 1) AS e', 'ehet.employeeId = e.employeeId', 'left');
        $builder->where(['et.status' => 1]);
        $builder->groupBy('et.employeeTypeName');
        $query = $builder->get();

        return $query;

        //return $this->where('status', 1)->findAll();
    }
    
    public function getEmployeeTypesPerCompany(){
        return $this->where('status', 1)->findAll();
    }
}