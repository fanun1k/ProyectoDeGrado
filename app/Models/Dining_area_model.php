<?php namespace App\Models;

use CodeIgniter\Model;

class Dining_area_model extends Model
{
    protected $table='dining_area';
    //El nombre del ID en la tabla
    protected $primaryKey= 'id_comedor';
    //Last columnas que van a afectar
    protected $allowedFields= ['diningAreaId','companyId','diningAreaName','latitude','longitude','averageCalorie','createDate', 'lastUpdate','status'];

    public function getAllDiningArea($limit, $offset)
	{
        return $this->where('status', '1')->findAll();
	}

    public function insertDiningArea($diningArea, $diningAreaFoodTimes)
	{
        $this->db->transStart();

        $id = $this->insert($diningArea);

        foreach($diningAreaFoodTimes as $value) {
            $this->db->query('INSERT INTO dining_area_food_times (foodTimesId, diningAreaId, startTime, endTime, nutritionalPercentage) VALUES ('.$value.','.$id.', "08:00:00", "10:00:00", 100);');
        }

        $this->db->transComplete();
        
        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
            return 0;
        } else {
            $this->db->transCommit();
            return 1;
        }
	}
}

?>