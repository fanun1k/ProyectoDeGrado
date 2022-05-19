<?php 
namespace App\Models;

use CodeIgniter\Model;

class Employee_model extends Model{
    protected $table      = 'employee';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'employeeId';
    protected $allowedFields=['name','lastName1','lastName2','employeePhoneNumber','employeeCI','employeeLatitude','employeeLongitude','employeeGender','employeeDateOfBirth','employeeCode'];
    
    public function registerNewEmployee($data){
        return $this->insert($data);
    }
}