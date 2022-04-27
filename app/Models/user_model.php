<?php namespace App\Models;

use CodeIgniter\Model;

class user_model extends Model
{
    protected $table='usuario';
    //El nombre del ID en la tabla
    protected $primaryKey= 'id_usuario';
    //Last columnas que van a afectar
    protected $allowedFields= ['contrasena'];

    public function login($correo_electronico,$password){
        return $this->where(['correo_electronico'=>$correo_electronico,'contrasena'=>$password])->first();
        
    }
    public function getUsers(){
        return $this->findAll();
    }
}

?>