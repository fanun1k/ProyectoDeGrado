<?php namespace App\Models;

use CodeIgniter\Model;

class dining_area_model extends Model
{
    protected $comedor='comedor';
    protected $tiempos_de_comida='tiempos_de_comida';
    protected $comedor_tiempos_de_comida='comedor_tiempos_de_comida';
    //El nombre del ID en la tabla
    //protected $primaryKey= 'id_comedor';
    //Last columnas que van a afectar
    //protected $allowedFields= ['id_comedor','id_empresa','nombre_comedor','latitud','longitud','media_calorica','fecha_creacion', 'fecha_actualizacion','estado'];

    public function selectDiningArea()
	{
        
	}

    public function insertDiningArea($data)
	{
        $this->db->transStart();
        $dining_area = $this->insert(["id_empresa" => 1,
                                    "nombre_comedor" => $data["nombre_comedor"],
                                    "latitud" => -17.3765059,
                                    "longitud" => -66.1728839,
                                    "media_calorica" => $data["media_calorica"]
        ]);

        $dining_area_food_times = $this->insert(["id_tiempos_de_comida" => $data["foodTime"],
                                                "id_comedor" => $dining_area,
                                                "hora_inicio" => "08:00:00",
                                                "hora_fin" => "10:00:00",
                                                "porcentaje_nutricional" => 50
        ]);

        $this->db->transComplete();


	}

}

?>