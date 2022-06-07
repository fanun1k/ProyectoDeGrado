<?php namespace App\Models;

use CodeIgniter\Model;

class Supply_type_model extends Model
{
    protected $table='supply_type';
    //El nombre del ID en la tabla
    protected $primaryKey= 'supplyTypeId';
    //Last columnas que van a afectar
    protected $allowedFields= ['supplyTypeName','lastUpdate','status'];

    public function getOptionsSupplyType(){
        $db = db_connect();
        $builder = $db->table("supply_type")->select('supplyTypeId, supplyTypeName');
        $builder->where('status =', 1);
        $data = $builder->get();
        $response ='<select>';
        $res = [];
        foreach ($data->getResult() as $row) {
            $response.= '<option value="'.$row->supplyTypeId.'">'.$row->supplyTypeName.'</option>';
        }
        $response .= '</select>';
        return $response;
    }

    public function insertTypeSupply($data){
        return $this->insert($data);
    }
}

?>