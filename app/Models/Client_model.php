<?php

namespace App\Models;

use CodeIgniter\Model;

class Client_model extends Model
{
    protected $table = 'client';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'clientId';
    protected $allowedFields = ['clientId', 'dinningAreaId', 'clientName', 'clientLastName1', 'clientLastName2', 'dateOfBirth', 'clientCode', 'clientCI', 'lastUpdate', 'status'];
    public function getClients($sidx, $sord, $start, $limit)
    {
        /*$db = db_connect();
        $builder = $db->table('client c')->select('c.clientId, c.clientCode, c.clientName, c.clientLastName1, c.clientLastName2, c.dateOfBirth, c.clientCI, c.status');
        $builder->orderBy('c.'.$sidx,$sord);
        $builder->limit($start,$limit);
        $builder->where('c.status !=',0);
        $query = $builder->get();
        return $query;*/
        $data=$this->where('status !=',0)->findAll();
        $aux=[];
        foreach ($data as $value) {
            $id=$value['clientId'];
            if($value['status']==1)
                $value['status']='Activo';
            elseif($value['status']==2){
                $value['status']='Inactivo'; 
                
            ;
            }
            $b=['id'=>$id,'cell'=>$value];
            array_push($aux,$b);             
        }

        return $aux;
    }
    public function UpdateClient($id, $data)
    {
        $data['lastUpdate'] = date('Y-m-d h:i:s a', time());
        return $this->update($id, $data);
    }
    public function deleteClient($id)
    {
        return $this->update($id, ['status' => 0, 'lastUpdate' => date('Y-m-d h:i:s a', time())]);
    }
}
