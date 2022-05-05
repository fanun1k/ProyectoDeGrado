<?php namespace App\Models;

use CodeIgniter\Model;

class dining_area_model extends Model
{
    protected $table='comedor';
    //El nombre del ID en la tabla
    protected $primaryKey= 'id_comedor';
    //Last columnas que van a afectar
    protected $allowedFields= ['id_comedor','id_empresa','nombre_comedor','latitud','longitud','media_calorica','fecha_creacion', 'fecha_actualizacion','estado'];


    public function getDiningArea()
	{
        
	}

    public function insertDiningArea($diningArea, $diningAreaFoodTimes)
	{
        $this->db->transStart();

        $id = $this->insert($diningArea);

        foreach($diningAreaFoodTimes as $value) {
            
            $this->db->query('INSERT INTO comedor_tiempos_de_comida (id_tiempos_de_comida, id_comedor, hora_inicio, hora_fin, porcentaje_nutricional) VALUES ('.$value.','.$id.', "08:00:00", "10:00:00", 100);');
            
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