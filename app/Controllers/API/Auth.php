<?php

namespace App\Controllers\API;
use App\Models\UsersModel;
use CodeIgniter\RESTful\ResourceController;


// use CodeIgniter\Controller;

class Auth extends ResourceController{
    // use ResponseTrait;
    protected $format = 'json';

    public function login(){
        $data = $this->request->getJSON(); // CAPTURA DATOS ENVIADOS EN JSON A REACT

        $username = $data->vc_user;
        $pass = $data->password;

        if (empty($data->vc_user) || empty($data->password)) {
            return $this->respond("Ingresa los datos de sesion");
        }

        $model = new UsersModel();
        $user = $model->where('vc_user', $username)->where('t_estatus', 1)->first(); //Busca el primer usuario en la tabla tb_users donde vc_user = $username

        
        if (is_null($user)) {
            return $this->failUnauthorized('El usuario no existe');
        }
        
        if(($user['vc_user'] != $username) || !password_verify($pass, $user['pass'])){
            return $this->failUnauthorized('Usuario o contraseña incorrectos.');
        } else {

            return $this->respond([
                'status' => 200,
                'message' => 'Login',
                'user' => [
                    'id_user' => $user['id_user'],
                    'vc_user' => $user['vc_user'],
                    't_estatus' => $user['t_estatus'],
                ]
            ]);
        }


    }
}
