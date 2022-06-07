<?php namespace App\Models;

use CodeIgniter\Model;

class Supply_model extends Model
{
    protected $table='supply';
    //El nombre del ID en la tabla
    protected $primaryKey= 'supplyId';
    //Last columnas que van a afectar
    protected $allowedFields= ['supplyTypeId','supplyName','caloricValue','proteinValue','fatValue','carbohydratesValue','status','lastUpdate'];

    public function getSupplies($sidx, $sord, $start, $limit)
    {
        $db = db_connect();
        $builder = $db->table("supply s")->select('s.supplyId, 
                                                    s.supplyName,
                                                    st.supplyTypeName,
                                                    s.caloricValue,
                                                    s.proteinValue,
                                                    s.fatValue,
                                                    s.carbohydratesValue');
        $builder->join('supply_type st', 'st.supplyTypeId = s.supplyTypeId');
        $builder->where('s.status =', 1);
        //$builder->orderBy($sidx, $sord);
        //$builder->limit($limit, $start);

        $data = $builder->get();
        $aux = [];
        foreach ($data->getResult() as $row) {
            $id = $row->supplyId;
            $row->image=base_url("images/supply-images")."/".$id.".jpg";
            $b = ['id' => $id, 'cell' => $row];
            array_push($aux, $b);
        }
        return $aux;
    }

    public function insertSupply($data){
        return $this->insert($data);
    }

    public function updateSupply($id, $data){
        $data["lastUpdate"]=date('Y-m-d h:i:s a', time());
        return $this->update($id, $data);
    }

    public function deleteSupply($id){
       return $this->update($id,['status'=>'0','lastUpdate' => date('Y-m-d h:i:s a', time())]);
    }
}
