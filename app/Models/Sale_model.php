<?php

namespace App\Models;

use CodeIgniter\Model;

class Sale_model extends Model
{
    protected $table = 'sale';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'saleId';
    protected $allowedFields = ['clientId', 'total', 'userId', 'client_clientId','lastUpdate', 'status'];
    
  
}
