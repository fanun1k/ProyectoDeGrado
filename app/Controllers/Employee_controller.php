<?php 
namespace App\Controllers;

use App\Models\User_model;
use App\Models\Employee_type_model;
use App\Models\Employee_model;
use App\Models\Employee_work_memorandum_model;
use App\Models\Employee_work_permit_model;
use App\Models\Skill_model;
use CodeIgniter\Controller;
use CodeIgniter\RESTful\ResourceController;


class Employee_controller extends ResourceController{

    protected $modelName = 'App\Models\Employee_model';
    protected $format    = 'json';
    
    public function index(){
        $employeeTypeModel=new Employee_type_model();
        $data=$employeeTypeModel->getEmployeeTypes();
        $this->userModel = new User_model();
        if (session()->has('userId')) {
            $userAccessArray = $this->userModel->getUserAccess(session()->get('userId'));
        }
        else if (isset($_COOKIE['userId'])) {
            $userAccessArray = $this->userModel->getUserAccess($_COOKIE['userId']);
        }
        $vista=view('header_footer/header').view('header_footer/sidebar', compact('userAccessArray')).view('Employee_view',compact('data'));
        return $vista;

    }

    public function registerEmployeeView() {
        helper("site");
        $this->skillModel = new Skill_model();
        $skills = $this->skillModel->getAllSkills();
        $userAccessArray = getUserAccessArrayHELPER();
        $view = view('header_footer/header').view('header_footer/sidebar',compact('userAccessArray','skills')).view('Employee_register_view');
        return $view;
    }

    public function registerEmployee(){
        $dateOfBirth = $this->request->getPost('employeeDateOfBirth');
        $dateOfBirth = str_replace('/', '-', $dateOfBirth);
        $dateOfBirth = date("Y-m-d", strtotime($dateOfBirth));
        $data=array(
                'name1'=>$this->request->getPost('name1'),
                'lastName1'=>$this->request->getPost('lastName1'),
                'lastName2'=>$this->request->getPost('lastName2'),
                'employeePhoneNumber'=>$this->request->getPost('employeePhoneNumber'),
                'employeeLatitude'=>$this->request->getPost('lat'),
                'employeeLongitude'=>$this->request->getPost('lng'),
                'employeeCI'=>$this->request->getPost('employeeCI'),  
                'employeeGender'=>$this->request->getPost('employeeGender'),
                'employeeDateOfBirth'=>$dateOfBirth,
                'employeeCode'=>6765);

        $skillsId = $this->request->getPost('skillsId');
        $skillsValue = $this->request->getPost('skillsNumber');

        $encryptedEmployeeId = $this->model->registerEmployee($data,$skillsId,$skillsValue);

        if ($encryptedEmployeeId != "0") {
            $img = $this->request->getPost('data');
            $folderPath = "images/employee-images/";
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $folderPath . $encryptedEmployeeId . '.png';
            file_put_contents($file, $image_base64);

            return redirect()->route('recursos_humanos/empleados');
        }    
        else{
            echo "No se registró al empleado";
        }
    }

    public function listEmployees(){
        $data=$this->model->getAllEmployees();
        $this->userModel = new User_model();
        if (session()->has('userId')) {
            $userAccessArray = $this->userModel->getUserAccess(session()->get('userId'));
        }
        else if (isset($_COOKIE['userId'])) {
            $userAccessArray = $this->userModel->getUserAccess($_COOKIE['userId']);
        }
        $vista=view('header_footer/header').view('header_footer/sidebar', compact('userAccessArray')).view('Employees_list_view',compact('data'));
        return $vista;
    }

    public function registerEmployeeType() {
        $employeeTypeName=$_POST['employeeTypeName'];

        $employeeTypeModel=new Employee_type_model();

        if($employeeTypeModel->registerEmployeeType($employeeTypeName)){
            return redirect()->route('recursos_humanos/personal_de_trabajo');
        }
        else{
            echo 'error';
        }
    }

    public function employeeMemorandum() {
        $employee=new Employee_model();
        $dataEmployee=$employee->getAllEmployees();
        $this->userModel = new User_model();
        if (session()->has('userId')) {
            $userAccessArray = $this->userModel->getUserAccess(session()->get('userId'));
        }
        else if (isset($_COOKIE['userId'])) {
            $userAccessArray = $this->userModel->getUserAccess($_COOKIE['userId']);
        }
        $view = view('header_footer/header').view('header_footer/sidebar',compact('userAccessArray')).view('Employee_memorandum_view', compact('dataEmployee')).view('header_footer/footer');
        return $view;
    }

    public function registerEmployeeMemorandum() {
        $this->userModel = new Employee_work_memorandum_model();
        
        $data = array('employeeId' => $this->request->getPost('employee'),
                    'workMemorandumDescription' => $this->request->getPost('description'));
        
        if ($this->userModel->insertEmployeeMemorandum($data)>0) {
            return redirect()->route('recursos_humanos/planillas/memorandum');
        }
    }

    public function employeePermit() {
        $employee=new Employee_model();
        $dataEmployee=$employee->getAllEmployees();
        $this->userModel = new User_model();
        if (session()->has('userId')) {
            $userAccessArray = $this->userModel->getUserAccess(session()->get('userId'));
        }
        else if (isset($_COOKIE['userId'])) {
            $userAccessArray = $this->userModel->getUserAccess($_COOKIE['userId']);
        }
        $view = view('header_footer/header').view('header_footer/sidebar',compact('userAccessArray')).view('Employee_permit_view', compact('dataEmployee')).view('header_footer/footer');
        return $view;
    }

    public function registerEmployeePermit() {
        $this->userModel = new Employee_work_permit_model();
        
        $data = array('employeeId' => $this->request->getPost('employee'),
                    'startDate' => $this->request->getPost('startDate'),
                    'endDate' => $this->request->getPost('endDate'),
                    'workPermitDescription' => $this->request->getPost('description'));

        if ($this->userModel->insertEmployeePermit($data)>0) {
            return redirect()->route('recursos_humanos/planillas/permisos_vacaciones');
        }
    }

    public function showEmployeeProfile(){
        helper("site");
        $userAccessArray = getUserAccessArrayHELPER();
        $employeeModel = new Employee_model();
        $employeeInfoArray = $employeeModel->getEmployee($_GET['id']);
        $employeeSkillArray = $employeeModel->getEmployeesSkills($_GET['id']);
        $employeeDocumentArray = $employeeModel->getEmployeeDocuments($_GET['id']);
        $documentTypeArray = $employeeModel->getDocumentType();
        $view = view('header_footer/header').view('header_footer/sidebar', compact('userAccessArray')).view('Employee_profile', compact('employeeInfoArray', 'employeeSkillArray', 'documentTypeArray', 'employeeDocumentArray'));
        return $view;
    }

    public function deleteEmployee($id)
    {
            echo $id;
            if($this->model->deleteEmployee($id)>0){
                return redirect()->route('aprovisionamiento/proveedores/lista_proveedores');
            }
            else{
                echo "error";
            }
        
    }

    public function updateEmployeeName(){
        $employeeModel = new Employee_model();
        $encryptedEmployeeId = $this->request->getPost('encryptedEmployeeId');
        $name = $this->request->getPost('name');
        $employeeModel->updateEmployeeName($encryptedEmployeeId, $name);
    }

    public function updateEmployeeLastName1(){
        $employeeModel = new Employee_model();
        $encryptedEmployeeId = $this->request->getPost('encryptedEmployeeId');
        $lastName1 = $this->request->getPost('lastName1');
        $employeeModel->updateEmployeeLastName1($encryptedEmployeeId, $lastName1);
    }

    public function updateEmployeeLastName2(){
        $employeeModel = new Employee_model();
        $encryptedEmployeeId = $this->request->getPost('encryptedEmployeeId');
        $lastName2 = $this->request->getPost('lastName2');
        $employeeModel->updateEmployeeLastName2($encryptedEmployeeId, $lastName2);
    }

    public function updateEmployeePhoneNumber(){
        $employeeModel = new Employee_model();
        $encryptedEmployeeId = $this->request->getPost('encryptedEmployeeId');
        $employeePhoneNumber = $this->request->getPost('employeePhoneNumber');
        $employeeModel->updateEmployeePhoneNumber($encryptedEmployeeId, $employeePhoneNumber);
    }

    public function updateEmployeeCI(){
        $employeeModel = new Employee_model();
        $encryptedEmployeeId = $this->request->getPost('encryptedEmployeeId');
        $employeeCI = $this->request->getPost('employeeCI');
        $employeeModel->updateEmployeeCI($encryptedEmployeeId, $employeeCI);
    }

    public function updateEmployeeGender(){
        $employeeModel = new Employee_model();
        $encryptedEmployeeId = $this->request->getPost('encryptedEmployeeId');
        $employeeGender = $this->request->getPost('employeeGender');
        $employeeModel->updateEmployeeGender($encryptedEmployeeId, $employeeGender);
    }

    public function updateEmployeeDateOfBirth(){
        $employeeModel = new Employee_model();
        $encryptedEmployeeId = $this->request->getPost('encryptedEmployeeId');
        $employeeDateOfBirth = $this->request->getPost('employeeDateOfBirth');
        $employeeModel->updateEmployeeDateOfBirth($encryptedEmployeeId, $employeeDateOfBirth);
    }

    public function updateEmployeeLocation(){
        $employeeModel = new Employee_model();
        $encryptedEmployeeId = $this->request->getPost('encryptedEmployeeId');
        $employeeLatitude = $this->request->getPost('employeeLatitude');
        $employeeLongitude = $this->request->getPost('employeeLongitude');
        $employeeModel->updateEmployeeLocation($encryptedEmployeeId, $employeeLatitude, $employeeLongitude);
    }

    public function updateEmployeeAvatar(){
        $encryptedEmployeeId = $this->request->getPost('encryptedEmployeeId');
        $dataURI = $this->request->getPost('dataURI');
        $folderPath = "images/employee-images/";
        $image_parts = explode(";base64,", $dataURI);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . $encryptedEmployeeId . '.png';
        if (file_exists($file)) {
            if(unlink($file)) file_put_contents($file, $image_base64);
        } else {
            file_put_contents($file, $image_base64);
        }
        clearstatcache();
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Content-Type: application/xml; charset=utf-8");
    }

    public function updateEmployeeSkill(){
        $employeeModel = new Employee_model();
        $encryptedEmployeeId = $this->request->getPost('encryptedEmployeeId');
        $skillId = $this->request->getPost('skillId');
        $skillValue = $this->request->getPost('skillValue');
        $employeeModel->updateEmployeeSkill($encryptedEmployeeId, $skillId, $skillValue);
    }

    public function insertEmployeeDocument(){

    }

    public function removeEmployeeDocument(){
        $employeeModel = new Employee_model();
        $encryptedEmployeeId = $this->request->getPost('encryptedEmployeeId');
        $encryptedEmployeeDocumentId = $this->request->getPost('encryptedEmployeeDocumentId');
        $employeeModel->removeEmployeeDocument($encryptedEmployeeDocumentId);
    }
}