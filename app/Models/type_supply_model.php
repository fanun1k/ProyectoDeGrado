<?php namespace App\Models;

use CodeIgniter\Model;

class type_supply_model extends Model
{
    protected $table='tipo_insumo';
    //El nombre del ID en la tabla
    protected $primaryKey= 'id_tipo_insumo';
    //Last columnas que van a afectar
    protected $allowedFields= ['nombre_tipo_insumo','fecha_actualizacion','estado'];

    public function getAllTypeSupplies($limit,$offset){
        return $this->findAll();
    }
    public function InsertTypeSupply($data){
        return $this->insert($data);
    }
}

?>