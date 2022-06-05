<?php 
namespace App\Models;

use CodeIgniter\Model;

class Product_category_model extends Model{
    protected $table      = 'product_category';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'productCategoryId';

    protected $allowedFields=['categoryName','lastUpdate','status'];
    

    public function getOptionsProductCategory()
	{
        $db = db_connect();
        $builder = $db->table("product_category")->select('productCategoryId, categoryName');
        $builder->where('status =', 1);
        $data = $builder->get();
        $response ='<select>';
        $res = [];
        foreach ($data->getResult() as $row) {
            $response.= '<option value="'.$row->productCategoryId.'">'.$row->categoryName.'</option>';
        }
        $response .= '</select>';
        return $response;
	}


}