<?php namespace App\Models;

use CodeIgniter\Model;

class user_model extends Model
{
    protected $table='user';
    //El nombre del ID en la tabla
    protected $primaryKey= 'userId';
    //Last columnas que van a afectar
    protected $allowedFields= ['password'];

    public function login($email, $password){
        $db = db_connect();
        $builder = $db->table('user u');
        $builder->select('u.userId, u.email, u.password, e.name, e.lastName1, e.lastName2, e.employeeCode');
        $builder->join('employee e', 'u.userId = e.employeeId');
        $builder->where('u.email', $email);
        $builder->where('u.password', $password);
        $builder->where('e.status', 1);
        $query = $builder->get();

        return $query;
    }

    public function getNumUserByEmail($email){
        $db = db_connect();
        $builder = $db->table('user');
        $builder->select('userId');
        $builder->where('email', $email);
        $builder->where('status', 1);

        return $builder->countAllResults();
    }

    public function getIdFromEmail($email){
        $db = db_connect();
        $builder = $db->table('user');
        $builder->select('userId');
        $builder->where('email', $email);
        $builder->where('status', 1);
        
        $query = $builder->get();
        foreach ($query->getResult() as $row) {
            $userId = $row->userId;
        }
        return $userId;
    }

    public function insertToken($email_recover_password, $token){
        $userId = $this->getIdFromEmail($email_recover_password);

        $db = db_connect();
        $builder = $db->table('token');
        $builder->insert(['tokenString' => $token, 'userId' => $userId]);

        return $token;
    }

    public function getTokenStatus($tokenString){
        $db = db_connect();
        $builder = $db->table('token');
        $builder->select('status');
        $builder->where('tokenString', $tokenString);
        
        $query = $builder->get();
        foreach ($query->getResult() as $row) {
            return $row->status;
        }
        return -1;
    }

    public function updatePassword($token, $password){
        $db = db_connect();
        $builder = $db->table('token');
        $builder->where('tokenString', $token);
        $builder->update(['status' => 0]);

        $builder1 = $db->table('token');
        $builder1->select('userId');
        $builder1->where('tokenString', $token);
        $query = $builder1->get();
        foreach ($query->getResult() as $row) {
            $userId = $row->userId;
        }

        $builder2 = $db->table('user');
        $builder2->where('userId', $userId);
        $builder2->update(['password' => $password]);
    }

    public function getUsers(){
        return $this->findAll();
    }
}

?>