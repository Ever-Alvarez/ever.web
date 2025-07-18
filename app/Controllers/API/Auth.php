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
        $pass = $data->vc_pass;

        if (empty($data->vc_user) || empty($data->vc_pass)) {
            return $this->failUnauthorized("Ingresa los datos de sesion");
        }

        $model = new UsersModel();
        $user = $model->where('vc_user', $username)->where('t_estatus', 1)->first(); //Busca el primer usuario en la tabla tb_users donde vc_user = $username

        
        if (is_null($user)) {
            return $this->failUnauthorized('El usuario no existe');
        }

        // if(!empty($user['vc_user']) && empty($pass))
        
        if(($user['vc_user'] != $username) || !password_verify($pass, $user['pass'])){
            return $this->failUnauthorized('Usuario o contraseña incorrectos.');
        } else {
            $session = session();
            $session->set('userId', $user['id_user']);
            $session->set('userName', $user['vc_user']);
            $session->set('accessId', $user['id_access']);
            $session->set('profileId', $user['id_profile']);
            $userId = $session->get('userId');
            $userName = $session->get('userName');
            $accessId = $session->get('accessId');
            $profileId = $session->get('profileId');
            return $this->respond([
                'user' => [
                    'id_user' => $userId,
                    'vc_user' => $userName,
                    'id_access' => $accessId ,
                    'id_profile' => $profileId
                ]
            ]);
            // return $this->respond([
            //     'status' => 200,
            //     'message' => 'Login',
            //     'user' => [
            //         'id_user' => $user['id_user'],
            //         'vc_user' => $user['vc_user'],
            //         't_estatus' => $user['t_estatus'],
            //     ]
            // ]);
        }


    }

    public function options(){
        return $this->response->setStatusCode(200);
    }
}
