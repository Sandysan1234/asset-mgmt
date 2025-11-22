<?php

namespace App\Controllers;

use Myth\Auth\Controllers\AuthController;
use Myth\Auth\Models\UserModel;

class Auth extends AuthController
{
    // Override: tambah simpan hash saat login
    public function login()
    {
        helper('auth');

        // Jalankan proses login bawaan
        $response = parent::login();


        return $response;
    }

    // Override: hapus hash saat logout
    public function logout()
    {
        // Logout setelah update DB
        return parent::logout();
    }
}
