<?php namespace App\Models;

use CodeIgniter\Model;

class Food_times_model extends Model
{
    protected $table='food_times';
    //El nombre del ID en la tabla
    protected $primaryKey= 'foodTimesId';
    //Last columnas que van a afectar
    protected $allowedFields= ['foodTimesId', 'foodTimesName', 'createDate', 'lastUpdate', 'status'];

    public function getFoodTimes()
	{
        return $this->where('status', 1)->findAll();
	}
}

?>