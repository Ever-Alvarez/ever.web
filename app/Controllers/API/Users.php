<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
// use CodeIgniter\Controller;

class Users extends ResourceController{
    // use ResponseTrait;
    protected $format = 'json';

    public function index(){
        $users = [
          'id' => 1, 'user' => 'admin'  
        ];

        return $this->respond($users);
    }
}
