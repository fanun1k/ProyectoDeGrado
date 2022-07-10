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
        $encryptedId = preg_replace('/[^a-z0-9]/i', substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'), 0, 1), $encryptedId);

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
            return "0";
        } else {
            $this->db->transCommit();
            return $encryptedId;
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
        $builder = $db->table('employee')->select('encryptedEmployeeId, name, lastName1, lastName2, employeePhoneNumber, employeeLatitude, employeeLongitude, employeeCI, employeeGender, employeeDateOfBirth')->where('encryptedEmployeeId', $encryptedEmployeeId);
        return $builder->get();
    }

    public function getEmployeesSkills($encryptedEmployeeId){
        $db = db_connect();
        $builder = $db->table('employee_skills es')->select('s.skillId, s.skillName, es.skillValue')->join('employee e', 'e.employeeId = es.employeeId')->join('skill s', 's.skillId = es.skillId')->where('e.encryptedEmployeeId', $encryptedEmployeeId);
        return $builder->get();
    }

    public function getDocumentType(){
        $db = db_connect();
        $builder = $db->table('employee_document_type')->select('employeeDocumentTypeId, employeeDocumentType, documentNeedName');
        return $builder->get();
    }

    public function getEmployeeDocuments($encryptedEmployeeId){
        $db = db_connect();
        $builder = $db->table('employee_document ed')->select('ed.employeeDocumentId, e.encryptedEmployeeId, ed.encryptedEmployeeDocumentId, CONCAT(ed.encryptedEmployeeDocumentId, ".", ed.employeeDocumentExtension) AS "documentInFolder", TRIM(CONCAT(edt.employeeDocumentType, IFNULL(ed.employeeDocumentName, ""), "De", e.name, e.lastName1, IFNULL(e.lastName2, ""))) AS "documentDownloadName", ed.employeeDocumentExtension')->join('employee_document_type edt', 'ed.employeeDocumentTypeId = edt.employeeDocumentTypeId')->join('employee e', 'e.employeeId = ed.employeeId')->where('e.encryptedEmployeeId', $encryptedEmployeeId)->where('ed.status', 1);
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

    public function updateEmployeeLocation($encryptedEmployeeId, $employeeLatitude, $employeeLongitude){
        $db = db_connect();
        $builder = $db->table('employee')->where('encryptedEmployeeId', $encryptedEmployeeId)->update(['employeeLatitude' => $employeeLatitude, 'employeeLongitude' => $employeeLongitude]);
    }

    public function updateEmployeeSkill($encryptedEmployeeId, $skillId, $skillValue){
        $db = db_connect();
        $builder = $db->table('employee')->select('employeeId')->where('encryptedEmployeeId', $encryptedEmployeeId);
        foreach($builder->get()->getResult() as $row)
            $builder = $db->table('employee_skills')->where('employeeId', $row->employeeId)->where('skillId', $skillId)->update(['skillValue' => $skillValue]);
    }

    public function removeEmployeeDocument($encryptedEmployeeDocumentId){
        $db = db_connect();
        $builder = $db->table('employee_document')->where('encryptedEmployeeDocumentId', $encryptedEmployeeDocumentId)->update(['status' => 0]);
    }
}