<?php namespace App\Models;

use CodeIgniter\Model;

class user_model extends Model
{
    protected $table='User';
    //El nombre del ID en la tabla
    protected $primaryKey= 'id_usuario';
    //Last columnas que van a afectar
    protected $allowedFields= ['contrasena'];

    public function login($user_name,$password){
        return $this->where(['nombre_usuario'=>$user_name,'contrasena'=>$password])->first();
        
    }
    public function getUsers(){
        return $this->findAll();
    }
}

?>