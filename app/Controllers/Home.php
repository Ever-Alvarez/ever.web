<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {   
        // $pass = password_hash('password', PASSWORD_DEFAULT);
        // echo $pass;
        return view('welcome_message');
    }
}
