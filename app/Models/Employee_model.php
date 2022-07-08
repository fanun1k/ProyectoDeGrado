<?php 
namespace App\Models;

use CodeIgniter\Model;

class Employee_model extends Model{
    protected $table      = 'employee';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'employeeId';

    protected $allowedFields=['name','lastName1','lastName2','employeePhoneNumber','employeeCI','employeeLatitude','employeeLongitude','employeeGender','employeeDateOfBirth','employeeCode','employeeProfileCompleted','lastUpdate','status'];
    
    public function registerEmployee($data,$skillsId,$skillsValue){
        //return $this->insert($data);

        $this->db->transStart();

        $id = $this->insert($data);
        $encryptedId = crypt(hash("sha256", $id), "ep");

        $this->db->query('UPDATE employee SET encryptedEmployeeId = "'.$encryptedId.'" WHERE employeeId = '.$id.';');

        $cont=0;
        
        foreach($skillsId as $value) {
            if($skillsValue[$cont]==null){
                $skillsValue[$cont]=0;
            }
            $this->db->query('INSERT INTO employee_skills (employeeId, skillId, skillValue) VALUES ('.$id.','.$value.','.$skillsValue[$cont].');');
            $cont++;
        }

        $this->db->transComplete();
        
        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
            return 0;
        } else {
            $this->db->transCommit();
            return 1;
        }
    }
    
    public function getAllEmployees()
	{
        return $this->where('status', '1')->findAll();
	}

    public function getMaxEmployeeId()
	{
        return $this->select('IFNULL(MAX(employeeId)+1,1) as MaxEmployeeId')->first();

	}

    public function deleteEmployee($id){
        return $this->update($id,['status'=>'0']);
    }

    public function getEmployee($encryptedEmployeeId){
        $db = db_connect();
        $builder = $db->table('employee')->select('name, lastName1, lastName2, employeePhoneNumber, employeeCI, employeeGender, employeeDateOfBirth')->where('encryptedEmployeeId', $encryptedEmployeeId);
        return $builder->get();
    }

    public function updateEmployeeName($encryptedEmployeeId, $name){
        $db = db_connect();
        $builder = $db->table('employee')->where('encryptedEmployeeId', $encryptedEmployeeId)->update(['name' => $name]);
    }

    public function updateEmployeeLastName1($encryptedEmployeeId, $lastName1){
        $db = db_connect();
        $builder = $db->table('employee')->where('encryptedEmployeeId', $encryptedEmployeeId)->update(['lastName1' => $lastName1]);
    }

    public function updateEmployeeLastName2($encryptedEmployeeId, $lastName2){
        $db = db_connect();
        $builder = $db->table('employee')->where('encryptedEmployeeId', $encryptedEmployeeId)->update(['lastName2' => $lastName2]);
    }

    public function updateEmployeePhoneNumber($encryptedEmployeeId, $employeePhoneNumber){
        $db = db_connect();
        $builder = $db->table('employee')->where('encryptedEmployeeId', $encryptedEmployeeId)->update(['employeePhoneNumber' => $employeePhoneNumber]);
    }

    public function updateEmployeeCI($encryptedEmployeeId, $employeeCI){
        $db = db_connect();
        $builder = $db->table('employee')->where('encryptedEmployeeId', $encryptedEmployeeId)->update(['employeeCI' => $employeeCI]);
    }

    public function updateEmployeeGender($encryptedEmployeeId, $employeeGender){
        $db = db_connect();
        $builder = $db->table('employee')->where('encryptedEmployeeId', $encryptedEmployeeId)->update(['employeeGender' => $employeeGender]);
    }

    public function updateEmployeeDateOfBirth($encryptedEmployeeId, $employeeDateOfBirth){
        $db = db_connect();
        $builder = $db->table('employee')->where('encryptedEmployeeId', $encryptedEmployeeId)->update(['employeeDateOfBirth' => $employeeDateOfBirth]);
    }
}