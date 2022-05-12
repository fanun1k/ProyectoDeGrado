<?php namespace App\Models;

use CodeIgniter\Model;

class Supply_model extends Model
{
    protected $table='supply';
    //El nombre del ID en la tabla
    protected $primaryKey= 'supplyId';
    //Last columnas que van a afectar
    protected $allowedFields= ['supplyTypeId','supplyName','caloricValue','proteinValue','fatValue','carbohydratesValue','status','lastUpdate'];

    public function getAllSupplies($limit, $offset){
        return $this->where('status', '1')->findAll();
    }

    public function insertSupply($data){
        return $this->insert($data);
    }

    public function editSupply($id, $data){
        
    }

    public function deleteSupply($id){
       return $this->update($id,['status'=>'0']);
    }
}

?>