<?php namespace App\Models;

use CodeIgniter\Model;

class supply_model extends Model
{
    protected $table='insumo';
    //El nombre del ID en la tabla
    protected $primaryKey= 'id_insumo';
    //Last columnas que van a afectar
    protected $allowedFields= ['id_tipo_insumo','nombre_insumo','valor_calorico','proteinas','grasas','carbohidratos','estado','fecha_actualizacion'];

    public function getAllSupplies($limit,$offset){
        return $this->where('estado','1')->findAll();
    }
    public function InsertSupply($data){
        return $this->insert($data);
    }
    public function EditSupply($id,$data){

    }
    public function DeleteSupply($id){

    }
}

?>