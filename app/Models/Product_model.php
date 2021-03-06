<?php

namespace App\Models;

use CodeIgniter\Model;

class Product_model extends Model
{
    protected $table      = 'product';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'productId';

    protected $allowedFields = ["productName", "productCategoryId", "productPrice", "lastUpdate", "status"];
    public function getProducts($sidx, $sord, $start, $limit)
    {
        $db = db_connect();
        $builder = $db->table("product p")->select('p.productId, 
                                                    p.productName,
                                                    p.productCategoryId,
                                                    pc.categoryName,
                                                    p.productPrice,
                                                    p.status');
        $builder->join('product_category pc', 'pc.productCategoryId = p.productCategoryId');
        $builder->where('p.status !=', 0);
        $builder->orderBy($sidx, $sord);
        $builder->limit($limit, $start);

        $data = $builder->get();
        $aux = [];
        foreach ($data->getResult() as $row) {
            $id = $row->productId;
            $row->image=base_url("images/product-images")."/".$id.".jpg";
            $b = ['id' => $id, 'cell' => $row];
            array_push($aux, $b);
        }

        return $aux;
    }
    public function getProductForOrder() {
        return $this->where('status',1)->findAll();
    }
    public function deleteProduct($id){
        return $this->update($id, ['status' => 0, 'lastUpdate' => date('Y-m-d h:i:s a', time())]);
    }
    public function updateProduct($id,$data){
        $data["lastUpdate"]=date('Y-m-d h:i:s a', time());
        return $this->update($id,$data);
    }
    public function getProductForSale(){
        $db = db_connect();
        $builder = $db->table("product p")->select('p.productId, 
                                                    p.productName,
                                                    p.productCategoryId,
                                                    pc.categoryName,
                                                    p.productPrice');
        $builder->join('product_category pc', 'pc.productCategoryId = p.productCategoryId');
        $builder->where('p.status !=', 0);
        $builder->orderBy('p.productName', 'asc');


        $data = $builder->get();
        return $data->getResult();
    }
    public function getPrice($id)
    {
        $db = db_connect();
        $builder = $db->table("product p")->select('p.productPrice');
        $builder->where('p.productId =', $id);
        $data=$builder->get();
        $res=0;
        foreach($data->getResult() as $price){
            $res=$price->productPrice;
        }
        return $res;
    }
}
