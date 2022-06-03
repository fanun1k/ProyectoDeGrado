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
        $db = db_connect();
        $builder = $db->table('client c')->select('c.clientId, c.clientCode, c.clientName, c.clientLastName1, c.clientLastName2, c.dateOfBirth, c.clientCI, c.status');
        $builder->where('c.status !=',0);
        $builder->orderBy('c.'.$sidx,$sord);
        $builder->limit($start,$limit);
        $data = $builder->get();
        //print_r ($query);
        //return $query;
        //$data=$this->where('status !=',0)->findAll();
        $aux=[];
        foreach ($data->getResult() as $row) {
            $id=$row->clientId;
            if($row->status==1)
                $row->status='Activo';
            elseif($row->status==2){
                $row->status='Inactivo'; 
            }
            $b=['id'=>$id,'cell'=>$row];
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
