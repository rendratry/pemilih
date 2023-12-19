<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilters implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Ambil informasi peran pengguna dari session (contoh: 'admin', 'editor', 'user')
        $userRole = session('role');

        // Ambil peran yang diizinkan dari argumen middleware
        $allowedRoles = is_array($arguments) ? $arguments : [];

        // Jika pengguna memiliki peran yang diizinkan, lanjutkan
        if (in_array($userRole, $allowedRoles)) {
            return $request;
        }

        if (!$userRole) {
            return redirect()->to(base_url('login'));
        }
        // Jika tidak, redirect atau lakukan tindakan lain
        switch ($userRole) {
            case 'admin':
                return redirect()->to(base_url('dashboard/admin'));
                break;
            case 'mejayan' || 'saradan':
                return redirect()->to(base_url('tabulasi/tps'));
                break;
            default:
            break;// Ganti dengan URL atau tindakan sesuai kebutuhan
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Code to run after the response has been sent
    }
}
