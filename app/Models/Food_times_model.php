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
    public function getFoodTimesTable($sidx, $sord, $start, $limit)
	{
        $db = db_connect();
        $builder = $db->table("food_times")->select('foodTimesId, 
                                                foodTimesName,');
        $builder->where('status',1);
        $builder->orderBy($sidx,$sord);
        $builder->limit($limit,$start);

        $data = $builder->get();
        $aux=[];
        foreach ($data->getResult() as $row) {
            $id=$row->foodTimesId;           
            $b=['id'=>$id,'cell'=>$row];
            array_push($aux,$b);             
        }
        return $aux;
	}
    public function deleteFoodTime($id){
        $data['lastUpdate'] = date('Y-m-d h:i:s a', time());
        $data["status"]=0;
        return $this->update($id,$data);
    }

    public function updateFoodTime($id,$data){
        $data['lastUpdate'] = date('Y-m-d h:i:s a', time());
        return $this->update($id,$data);
    }
    public function insertFoodTime($data){
        return $this->insert($data);
    }
}

?>