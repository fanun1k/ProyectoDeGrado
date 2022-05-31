<?php 
namespace App\Models;

use CodeIgniter\Model;

class Client_model extends Model{
    protected $table      = 'client';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'clientId';
    protected $allowedFields=[];
}