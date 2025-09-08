<?php
<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class SingleLoginFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $auth = service('authentication');
        $user = $auth->user();

        // Jika tidak login, lanjut
        if (! $user) {
            return;
        }

        // Ambil user fresh dari DB
        $userModel = $auth->getUserModel();
        $dbUser = $userModel->find($user->id);

        // Jika user dihapus atau tidak ditemukan
        if (! $dbUser) {
            $auth->logout();
            session()->setFlashdata('error', 'Akun tidak ditemukan.');
            return redirect()->to('/login');
        }

        $sessionHash = session()->get('active_login_hash');
        $dbHash = $dbUser->active_login_hash;

        // Jika hash tidak cocok → logout
        if ($sessionHash !== $dbHash) {
            $auth->logout();
            session()->setFlashdata('error', 'Anda telah logout karena login dari perangkat lain.');
            return redirect()->to('/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return $response; // ✅ Wajib!
    }
}

// namespace App\Filters;

// use CodeIgniter\Filters\FilterInterface;
// use CodeIgniter\HTTP\RequestInterface;
// use CodeIgniter\HTTP\ResponseInterface;
// use Myth\Auth\Models\UserModel;

// class SingleLoginFilter implements FilterInterface
// {
//     public function before(RequestInterface $request, $arguments = null)
//     {
//         if (! service('authentication')->isLoggedIn()) {
//             return;
//         }

//         $user = service('authentication')->user();
//         $sessionHash = session()->get('active_login_hash');

//         $freshUser = model(UserModel::class)->find($user->id);

//         if (! $freshUser || $freshUser->active_login_hash !== $sessionHash) {
//             service('authentication')->logout();
//             session()->setFlashdata('error', 'Anda logout karena login dari perangkat lain.');
//             return redirect()->to('/login');
//         }
//     }

//     public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
// }
// namespace App\Filters;

// use CodeIgniter\Filters\FilterInterface;
// use CodeIgniter\HTTP\RequestInterface;
// use CodeIgniter\HTTP\ResponseInterface;
// use Myth\Auth\Models\UserModel;

// class SingleLoginFilter implements FilterInterface
// {
//     public function before(RequestInterface $request, $arguments = null)
//     {

//         $auth = service('authentication');
//         $user = $auth->user();

//         if ($user) {
//             $userModel = $auth->getUserModel();
//             $dbUser = $userModel->find($user->id);

//             $sessionHash = session()->get('active_login_hash');
//             $dbHash = $dbUser->active_login_hash;

//             // Jika hash tidak cocok → logout
//             if ($sessionHash !== $dbHash) {
//                 $auth->logout();
//                 session()->setFlashdata('error', 'Anda telah logout karena login dari perangkat lain.');
//                 return redirect()->to('/login');
//             }
//         }
//         // $auth = service('authentication');
//         // $user = $auth->user();

//         // // Hanya cek jika user login
//         // if ($user) {
//         //     $session = session();
//         //     $currentSessionId = $session->getSessionId();

//         //     // Ambil data user terbaru dari database
//         //     $userModel = $auth->getUserModel();
//         //     $dbUser = $userModel->find($user->id);

//         //     // Bandingkan session ID sekarang dengan yang tersimpan
//         //     if ($dbUser->active_login_hash !== $currentSessionId) {
//         //         // Sesi tidak valid → logout
//         //         $auth->logout();
//         //         session()->setFlashdata('error', 'Anda telah logout karena login dari perangkat atau browser lain.');
//         //         return redirect()->to('/login');
//         //     }
//         // }
//     }

//     public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
// }
