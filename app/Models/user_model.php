<?php namespace App\Models;

use CodeIgniter\Model;

class user_model extends Model
{
    protected $table='usuario';
    //El nombre del ID en la tabla
    protected $primaryKey= 'id_usuario';
    //Last columnas que van a afectar
    protected $allowedFields= ['contrasena'];

    public function login($correo_electronico, $contrasena){
        $db = db_connect();
        $builder = $db->table('usuario');
        $builder->select('correo_electronico');
        $builder->where('correo_electronico', $correo_electronico);
        $builder->where('contrasena', $contrasena);
        $query = $builder->get();

        foreach ($query->getResult() as $row) {
            $correo_electronico_sesion = $row->correo_electronico;
        }
        return $correo_electronico_sesion;
    }

    public function getUsers(){
        return $this->findAll();
    }
}

?>