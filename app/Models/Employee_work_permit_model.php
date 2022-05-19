<?php 
namespace App\Models;

use CodeIgniter\Model;

class Employee_work_permit_model extends Model{
    protected $table      = 'work_permit';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'workPermitId';

    protected $allowedFields= ['workPermitId','employeeId','startDate','endDate','workPermitDescription','createDate', 'lastUpdate','status'];

    public function insertEmployeePermit($data) {
        return $this->insert($data);
    }


}