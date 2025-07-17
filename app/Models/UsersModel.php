<?php
namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model{
    protected $table = 'tb_users';
    protected $primaryKey = 'id_user';
    // protected $allowedFields = ['id_user', 'vc_user', 't_estatus'];

    // public function __construct(){
    //     parent::__construct();
    //     $this->db->database();
    // }

    public function listUsers(){
        return $this->select('id_user, id_acces, id_profile vc_user, pass,t_estatus')->findAll();
    }
    
}