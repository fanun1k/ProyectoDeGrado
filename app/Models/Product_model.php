<?php 
namespace App\Models;

use CodeIgniter\Model;

class Product_model extends Model{
    protected $table      = 'product';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'productId';

    protected $allowedFields=["productName","productCategoryId","productPrice","lastUpdate","status"];
    public function getProducts($sidx, $sord, $start, $limit)
    {
        $db = db_connect();
        $builder = $db->table("client")->select('productId, 
                                                productName,
                                                productCategoryId,
                                                productPrice,
                                                lastUpdate,
                                                status');
        $builder->where('status !=',0);
        $builder->orderBy($sidx,$sord);
        $builder->limit($limit,$start);

        $data = $builder->get();
        $aux=[];
        foreach ($data->getResult() as $row) {
            $id=$row->productId;
            $b=['id'=>$id,'cell'=>$row];
            array_push($aux,$b);             
        }

        return $aux;
    }
}