<?php namespace App\Models;

use CodeIgniter\Model;

class type_supply_model extends Model
{
    protected $table='supply_type';
    //El nombre del ID en la tabla
    protected $primaryKey= 'supplyTypeId';
    //Last columnas que van a afectar
    protected $allowedFields= ['supplyTypeName','lastUpdate','status'];

    public function getAllTypeSupplies($limit, $offset){
        return $this->findAll();
    }

    public function insertTypeSupply($data){
        return $this->insert($data);
    }
}

?>