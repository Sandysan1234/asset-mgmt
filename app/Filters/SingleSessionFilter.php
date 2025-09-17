<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Myth\Auth\Filters\BaseFilter;

class SingleSessionFilter extends BaseFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Daftar route publik — tidak perlu login
        $publicRoutes = [
            'login',
            'logout',
            'register',
            'forgot',
            'reset-password',
            'activate-account',
            'resend-activate-account',
        ];

        // Cek apakah route saat ini adalah route publik
        foreach ($publicRoutes as $route) {
            if (url_is(route_to($route))) {
                return; // Biarkan akses
            }
        }

        // Ambil service
        $auth = service('authentication');
        $session = service('session');

        // Jika BELUM login → simpan URL + redirect ke login
        if (!$auth->check()) {
            $session->set('redirect_url', current_url());
            return redirect()->to(route_to('login'));
        }

        // Jika SUDAH login → cek validitas session
        $user = $auth->user();
        $currentSessionId = $session->session_id;

        // Jika session tidak valid → logout + redirect
        if ($user->session_id !== $currentSessionId) {
            $auth->logout();
            $session->set('redirect_url', current_url());
            $session->setFlashdata('error', 'Anda logout karena login di perangkat lain.');
            return redirect()->to(route_to('login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu lakukan apa-apa
    }
}

// <?php

// namespace App\Filters;

// use CodeIgniter\Filters\FilterInterface;
// use CodeIgniter\HTTP\RequestInterface;
// use CodeIgniter\HTTP\ResponseInterface;

// class SingleSessionFilter implements FilterInterface
// {
//     public function before(RequestInterface $request, $arguments = null)
//     {
//         $auth = service('authentication');
//         $session = service('session');

//         if (!$auth->check()) {
//             return;
//         }

//         $user = $auth->user();
//         $currentSessionId = $session->session_id;

//         // Jika session_id tidak cocok → logout paksa
//         if ($user->session_id !== $currentSessionId) {
//             $auth->logout();
//             $session->setFlashdata('error', 'Sesi Anda tidak valid. Anda login di perangkat lain.');
//             return redirect()->to('/login');
//         }
//     }

//     public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
//     {
//         // Do nothing
//     }
// }