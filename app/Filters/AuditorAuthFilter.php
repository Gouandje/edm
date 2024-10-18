<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuditorAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Check if the user is logged in
        if (!$session->get('isLoggedIn')) {
            // Redirect to login page if not logged in
            return redirect()->to('/login');
        }

        // Check if user has the role 'auditeur'
        if ($session->get('role') !== 'auditeur') {
            // User does not have the required role, redirect to no access page or show error
            return redirect()->to('/no-access');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here if needed
    }
}
