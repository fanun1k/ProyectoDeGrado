<?php 
namespace App\Models;

use CodeIgniter\Model;

class Product_model extends Model{
    protected $table      = 'product';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'productId';

    protected $allowedFields=[];
}