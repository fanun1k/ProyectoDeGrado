<?php namespace App\Models;

use CodeIgniter\Model;

class food_times_model extends Model
{
    protected $table='tiempos_de_comida';
    //El nombre del ID en la tabla
    protected $primaryKey= 'id_tiempos_de_comida';
    //Last columnas que van a afectar
    protected $allowedFields= ['id_tiempos_de_comida','nombre_tiempos_de_comida','fecha_creacion', 'fecha_actualizacion','estado'];

    public function getFoodTimes()
	{
        return $this->where('estado',1)->findAll();
	}

}

?>