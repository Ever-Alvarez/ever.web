<?php

namespace App\Controllers\API;
use App\Models\UsersModel;
use CodeIgniter\RESTful\ResourceController;


// use CodeIgniter\Controller;

class Users extends ResourceController{
    // use ResponseTrait;
    protected $format = 'json';

    public function index(){
        $model = new UsersModel();
        $users = $model->listUsers();
        if (!empty($users)) {
            return $this->respond($users);
        } else {
            return $this->respond('No hay datos');
        }
        

    }
}
