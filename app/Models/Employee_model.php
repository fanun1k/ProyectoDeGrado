<?php 
namespace App\Models;

use CodeIgniter\Model;

class Employee_model extends Model{
    protected $table      = 'employee';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'employeeId';

    protected $allowedFields= ['employeeId','name','lastName1','lastName2','employeePhoneNumber','employeeLatitude','employeeLongitude', 'employeeCI','employeeGender','employeeDateOfBirth','employeeCode','createDate', 'lastUpdate','status'];

    public function getAllEmployees()
	{
        return $this->where('status', '1')->findAll();
	}

    public function insertEmployeeMemorandum($data) {
        return $this->table('work_memorandum')->insert($data);
    }


}