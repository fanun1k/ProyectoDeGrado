<?php

namespace App\Models;

use CodeIgniter\Model;

class Sale_model extends Model
{
    protected $table = 'sale';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'saleId';
    protected $allowedFields = ['total', 'userId', 'client_clientId', 'lastUpdate', 'status'];

    public function getSales($sidx, $sord, $start, $limit)
    {
        $db = db_connect();
        $builder = $db->table("sale s")->select("s.saleId,
                                                s.createDate, 
                                                c.clientCode,
                                                CONCAT(c.clientName,' ',
                                                clientLastName1,' ',
                                                IFNULL(clientLastName2,'')) AS clientName,
                                                u.email as user, 
                                                s.total");
        $builder->join('client c', 'c.clientId = s.client_clientId');
        $builder->join('user u', 'u.userId = s.userId');
        $builder->where('s.status =', 1);
        $builder->orderBy($sidx, $sord);
        $builder->limit($limit, $start);

        $data = $builder->get();
        $res = [];
        foreach ($data->getResult() as $row) {
            $id = $row->saleId;
            $b = ['id' => $id, 'cell' => $row];
            array_push($res, $b);
        }

        return $res;
    }
    public function insertSale($total,$userId,$data)
    {
        print_r($data);
        $this->db->transStart();

        $idSale = $this->insert(['total'=>$total,'client_clientId'=>1,'userId'=>$userId]);
        foreach($data as $product) {
            $this->db->query('INSERT INTO sale_detail(saleId, 
                                                      productId, 
                                                      quantity, 
                                                      unitPrice) 
                                            VALUES ('.$idSale.','.$product[0].','.$product[1].','.$product[2].');');           
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
    public function getSaleDetails($id)
    {
        $db = db_connect();
        $builder = $db->table("sale_detail sd")->select("p.productName, 
                                                        sd.quantity,                                                        
                                                        sd.unitPrice");
        $builder->join('product p', 'p.productId = sd.productId');
        $builder->where('sd.saleId !=', $id);
        $data = $builder->get();
        $res = [];
        foreach ($data->getResult() as $row) {
            //$total=$row->quantity*$row->unitPrice;
            //array_push($row, $total);
            array_push($res, $row);
        }
        return $res;
    }
    public function deleteSale($id)
    {        
        return $this->update($id,['status'=>0,'lastUpdate' => date('Y-m-d h:i:s a', time())]);
    }
}
