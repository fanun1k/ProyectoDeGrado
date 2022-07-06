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
                'name'=>$this->request->getPost('name'),
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

        if ($this->model->registerEmployee($data,$skillsId,$skillsValue)>0) {
            return redirect()->route('recursos_humanos/personal_de_trabajo/lista_de_personal');
        }    
        else{
            
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
        //echo $_GET['id'];
        helper("site");
        $userAccessArray = getUserAccessArrayHELPER();
        $view = view('header_footer/header').view('header_footer/sidebar',compact('userAccessArray')).view('Employee_profile');
        return $view;
    }

    public function deleteEmployee($id)
    {
        if (session()->has('userId')) {
            $userId = session()->get('userId');
        } else if (isset($_COOKIE['userId'])) {
            $userId = $_COOKIE['userId'];
        }
        if ($userId == NULL) {
            session()->set('error', 'Enlace no permitido. Debe iniciar sesión.');
            return redirect()->route('/');
        }
        $this->userModel = new User_model();
        $status = $this->userModel->getUserStatus($userId);
        if ($status == -1 || $status == 0) {
            session()->set('error', 'Enlace no permitido. Debe iniciar sesión.');
            return redirect()->route('/');
        }
        else if ($status == 1) {
            if($this->model->deleteEmployee($id)>0){
                return redirect()->route('aprovisionamiento/proveedores/lista_proveedores');
            }
            else{
                echo "error";
            }
        }
    }

    
}