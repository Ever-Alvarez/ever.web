<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Cors implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $origin = $request->getHeaderLine('Origin') ?? '*';
        header('Access-Control-Allow-Origin: http://localhost:5173'); // Puedes reemplazar * por http://localhost:5173 si quieres limitarlo
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

        // if ($request->getMethod() === 'options') {
        //     // Responde sin procesar la petición si es una preflight OPTIONS
        //     http_response_code(200);
        //     exit();
        // }
        // Importante: responde inmediatamente a las OPTIONS
        // if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            // http_response_code(200);
            // exit;
        // }
        if ($request->getMethod() === 'options') {
            header('Access-Control-Allow-Origin: http://localhost:5173'); // Puedes reemplazar * por http://localhost:5173 si quieres limitarlo
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
            header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

            http_response_code(200);
            exit;
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $response->setHeader('Access-Control-Allow-Origin', 'http://localhost:5173');
        $response->setHeader('Access-Control-Allow-Credentials', 'true');
        $response->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');
        $response->setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        return $response;
    }
}
