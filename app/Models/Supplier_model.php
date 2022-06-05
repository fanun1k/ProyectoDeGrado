<?php namespace App\Models;

use CodeIgniter\Model;

class Supplier_model extends Model
{
    protected $table='supplier';
    //El nombre del ID en la tabla
    protected $primaryKey= 'supplierId';
    //Last columnas que van a afectar
    protected $allowedFields= ['supplierId','type','name','address','phone1','phone2','phone3','createDate','lastUpdate','status'];

    public function getAllSuppliers($limit, $offset)
    {
        $db = db_connect();
        $builder = $db->table('supplier S');
        $builder->select('S.supplierId,S.name, SP.supplierTypeName, S.address, S.phone1, S.phone2,S.phone2, S.gmail, S.status');
        $builder->join('supplier_type SP', 'SP.supplierTypeId = S.type');
        $builder->where('S.status', '1');
        $data =  $builder->get()->getResultArray();
        return $data;
        echo "<pre>";
        print_r($data);

        //return $query;

        //return $this->where('status', '1')->findAll();
    }

    public function insertSupply($data){
        return $this->insert($data);
    }

    public function updateSupply($id, $data){
        return $this->update($id, $data);
    }

    public function deleteSupply($id){
       return $this->update($id,['status'=>'0']);
    }
}

?>