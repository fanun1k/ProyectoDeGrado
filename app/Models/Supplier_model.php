<?php namespace App\Models;

use CodeIgniter\Model;

class Supplier_model extends Model
{
    protected $table='supplier';
    //El nombre del ID en la tabla
    protected $primaryKey= 'supplierId';
    //Last columnas que van a afectar
    protected $allowedFields= ['supplierId','type','name','address','phone1','phone2','phone3','createDate','lastUpdate','status'];

    public function getAllSuppliers()
    {
        $db = db_connect();
        $builder = $db->table('supplier S');
        $builder->select('S.supplierId,IFNULL(LE.legalEntityName, CONCAT(NP.name," ",NP.lastName1," ",IFNULL(NP.lastName2,""))) AS name,S.treatment, S.address, S.phone1, S.phone2,S.phone3, S.gmail, S.status');
        $builder->join('legal_entity LE', 'LE.legalEntityId = S.supplierId', 'left');
        $builder->join('natural_person NP', 'NP.naturalPersonId = S.supplierId', 'left');
        $builder->where('S.status', '1');
        $data =  $builder->get()->getResultArray();
        return $data;

        //return $query;

        //return $this->where('status', '1')->findAll();
    }

    public function insertSupply($data){
        return $this->insert($data);
    }

    public function updateSupply($id, $data){
        return $this->update($id, $data);
    }

    public function deleteSupplier($id){
       return $this->update($id,['status'=>'0']);
    }
}

?>