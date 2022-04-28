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
        $builder = $db->table('usuario u');
        $builder->select('u.id_usuario, u.correo_electronico, u.contrasena, e.nombre, e.primer_apellido, e.segundo_apellido, e.codigo_empleado');
        $builder->join('empleado e', 'u.id_usuario = e.id_empleado');
        $builder->where('u.correo_electronico', $correo_electronico);
        $builder->where('u.contrasena', $contrasena);
        $builder->where('e.estado', 1);
        $query = $builder->get();

        return $query;
    }

    public function get_num_user_by_email($correo_electronico){
        $db = db_connect();
        $builder = $db->table('usuario');
        $builder->select('id_usuario');
        $builder->where('correo_electronico', $correo_electronico);
        $builder->where('estado', 1);

        return $builder->countAllResults();
    }

    public function get_id_from_email($correo_electronico){
        $db = db_connect();
        $builder = $db->table('usuario');
        $builder->select('id_usuario');
        $builder->where('correo_electronico', $correo_electronico);
        $query = $builder->get();
        foreach ($query->getResult() as $row) {
            $usuario_id = $row->id_usuario;
        }
        return $usuario_id;
    }

    public function insert_token($email_recover_password, $token){
        $id_usuario = $this->get_id_from_email($email_recover_password);

        $db = db_connect();
        $builder = $db->table('token');
        $builder->insert(['token_string' => $token, 'id_usuario' => $id_usuario]);
    }

    public function update_password($token, $password){
        $db = db_connect();
        $builder = $db->table('token');
        $builder->where('token_string', $token);
        $builder->update(['status' => 0]);

        $builder1 = $db->table('token');
        $builder1->select('id_usuario');
        $builder1->where('token_string', $token);
        $query = $builder1->get();
        foreach ($query->getResult() as $row) {
            $usuario_id = $row->id_usuario;
        }

        $builder2 = $db->table('usuario');
        $builder2->where('id_usuario', $usuario_id);
        $builder2->update(['contrasena' => $password]);
    }

    public function getUsers(){
        return $this->findAll();
    }
}

?>