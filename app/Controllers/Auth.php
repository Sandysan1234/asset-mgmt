<?php

namespace App\Controllers;

use Myth\Auth\Controllers\AuthController;
use Myth\Auth\Models\UserModel;

class Auth extends AuthController
{
    // Override: tambah simpan hash saat login
    public function login()
    {
        helper('auth'); // tetap butuh helper untuk in_groups(), has_permission()

        // Simpan status sebelum login
        $authentication = service('authentication');
        $wasLoggedIn = $authentication->check();

        // Jalankan proses login bawaan
        $response = parent::login();

        // Ambil user setelah login
        $user = $authentication->user();

        // Cek: apakah login berhasil (baru login, bukan sudah login)
        if (!$wasLoggedIn && $authentication->check() && $user) {
            try {
                $loginHash = bin2hex(random_bytes(16));

                // Simpan hash ke database
                model(UserModel::class)->update($user->id, [
                    'active_login_hash' => $loginHash
                ]);

                // Simpan ke session
                session()->set('active_login_hash', $loginHash);

                log_message('info', 'Login hash disimpan untuk user ID: ' . $user->id);
            } catch (\Exception $e) {
                log_message('error', 'Gagal simpan login hash: ' . $e->getMessage());
            }
        }

        return $response;
    }

    // Override: hapus hash saat logout
    public function logout()
    {
        $authentication = service('authentication');
        $user = $authentication->user();

        if ($user) {
            try {
                model(UserModel::class)->update($user->id, [
                    'active_login_hash' => null
                ]);
                log_message('info', 'Login hash dihapus saat logout - User ID: ' . $user->id);
            } catch (\Exception $e) {
                log_message('error', 'Gagal hapus login hash: ' . $e->getMessage());
            }
        }

        // Logout setelah update DB
        return parent::logout();
    }
}