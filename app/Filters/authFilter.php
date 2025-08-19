<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $allowedRoutes = [
            'login',
            'login/process',
            'registrasi',
            'registrasi/process',
            'pages/registrasi'
        ];

        if (!session()->get('isLoggedIn') && !in_array($request->getUri()->getPath(), $allowedRoutes)) {
            return redirect()->to('/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
