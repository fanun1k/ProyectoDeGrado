<?php namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    protected $table='user';
    //El nombre del ID en la tabla
    protected $primaryKey= 'userId';
    //Last columnas que van a afectar
    protected $allowedFields= ['password'];

    public function login($email, $password){
        $db = db_connect();
        $builder = $db->table('user u')->select('u.userId, u.email, u.password, e.name, e.lastName1, e.lastName2, e.employeeCode');
        $builder->join('employee e', 'u.userId = e.employeeId');
        $builder->where(['u.email' => $email, 'u.password' => $password, 'e.status' => 1]);
        $query = $builder->get();

        return $query;
    }

    public function insertToken($email_recover_password, $token){
        $userId = $this->getIdFromEmail($email_recover_password);

        $db = db_connect();
        $builder = $db->table('token');
        $builder->insert(['tokenString' => $token, 'userId' => $userId]);

        return $token;
    }

    public function updatePassword($token, $password){
        $db = db_connect();
        $builder = $db->table('token');
        $builder->where('tokenString', $token);
        $builder->update(['status' => 0]);

        $builder1 = $db->table('token')->select('userId')->where('tokenString', $token);
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

    public function getUserStatus($userId) {
        $db = db_connect();
        $builder = $db->table('user')->select('status')->where('userId', $userId);
        $query = $builder->get();
        
        foreach ($query->getResult() as $row) {
            return $row->status;
        }

        return -1;
    }

    public function getNumUserByEmail($email){
        $db = db_connect();
        $builder = $db->table('user')->select('userId')->where(['email' => $email, 'status' => 1]);

        return $builder->countAllResults();
    }

    public function getIdFromEmail($email){
        $db = db_connect();
        $builder = $db->table('user');
        $builder->select('userId')->where(['email' => $email, 'status' => 1]);
        $query = $builder->get();
        
        foreach ($query->getResult() as $row) {
            return $row->userId;
        }

        return -1;
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
}

?>