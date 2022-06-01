<?php 
namespace App\Models;

use CodeIgniter\Model;

class Client_model extends Model{
    protected $table = 'client';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'clientId';
    protected $allowedFields=['clientId','dinningAreaId','clientName','clientLastName1','clientLastName2','dateOfBirth','clientCode','clientCI','lastUpdate','status'];
    public function getClients(){
        $data=$this->where('status !=',0)->findAll();
        $aux=[];
        foreach ($data as $value) {
            
            if($value['status']==1)
                $value['status']='Activo';
            elseif($value['status']==2){
                $value['status']='Inactivo'; 
                
            }
            array_push($aux,$value);             
        }

        return $aux;
    }
    public function UpdateClient($id,$data){
        $data['lastUpdate']=date('Y-m-d h:i:s a', time());
        return $this->update($id,$data);
    }
    public function deletClient($id){
        return $this->update($id,['status'=>0,'lastUpdate'=>date('Y-m-d h:i:s a', time())]);
    }
}