<?php namespace App\Models;

use CodeIgniter\Model;

class Supplier_model extends Model
{
    protected $table='supplier';
    //El nombre del ID en la tabla
    protected $primaryKey= 'supplierId';
    //Last columnas que van a afectar
    protected $allowedFields= ['supplierId','type','name','address','phone1','phone2','phone3','createDate','lastUpdate','status'];

    public function getAllSuppliers()
    {
        $db = db_connect();
        $builder = $db->table('supplier S');
        $builder->select('S.supplierId,LE.legalEntityName, NP.name,NP.lastName1,NP.lastName2,S.treatment, S.address, S.phone1, S.phone2,S.phone3, S.gmail, S.status');
        $builder->join('legal_entity LE', 'LE.legalEntityId = S.supplierId', 'left');
        $builder->join('natural_person NP', 'NP.naturalPersonId = S.supplierId', 'left');
        $builder->where('S.status', '1');
        $data =  $builder->get()->getResultArray();
        return $data;

        //return $query;

        //return $this->where('status', '1')->findAll();
    }

    public function insertSupplier($supplier, $naturalPerson, $legalEntity){
        $this->db->transStart();

        $this->db->table('supplier')->insert($supplier);

        $id = $this->db->insertID();
        
        if($supplier['treatment'] == 1) {
            $legalEntity['legalEntityId'] = $id;
            /*foreach($legalEntity as $row){
                echo $row."  ";
            }*/
            $this->db->table('legal_entity')->insert($legalEntity);
        }
        elseif($supplier['treatment'] == 2) {
            $naturalPerson['naturalPersonId'] = $id;
            /*foreach($naturalPerson as $row){
                echo $row."  ";
            }*/
            $this->db->table('natural_person')->insert($naturalPerson);
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

    public function updateSupplier($id,$supplier, $naturalPerson, $legalEntity){
        $this->db->transStart();

        foreach($supplier as $row){
            echo $row."  ".'<br>';
        }
        echo $id;

        $this->db->table('supplier')->where('supplierId',$id)->update($supplier);

        //$id = $this->db->insertID();
        
        if($supplier['treatment'] == 1) {
            //$legalEntity['legalEntityId'] = $id;
            /*foreach($legalEntity as $row){
                echo $row."  ";
            }*/
            $this->db->table('legal_entity')->where('legalEntityId',$id)->update($legalEntity);
        }
        elseif($supplier['treatment'] == 2) {
            //$naturalPerson['naturalPersonId'] = $id;
            /*foreach($naturalPerson as $row){
                echo $row."  ";
            }*/
            $this->db->table('natural_person')->where('naturalPersonId',$id)->update($naturalPerson);
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

    public function deleteSupplier($id){
       return $this->update($id,['status'=>'0']);
    }
}

?>