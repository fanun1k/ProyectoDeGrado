<?php 
namespace App\Models;

use CodeIgniter\Model;

class Employee_work_memorandum_model extends Model{
    protected $table      = 'work_memorandum';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'workMemorandumId';

    protected $allowedFields= ['workMemorandumId','employeeId','workMemorandumDescription','createDate', 'lastUpdate','status'];

    public function insertEmployeeMemorandum($data) {
        return $this->insert($data);
    }


}