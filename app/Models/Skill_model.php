<?php 
namespace App\Models;

use CodeIgniter\Model;

class Skill_model extends Model{
    protected $table      = 'skill';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'skillId';

    protected $allowedFields=['skillName','lastUpdate','status'];
    

    public function getAllSkills()
	{
        return $this->where('status', '1')->findAll();
	}


}