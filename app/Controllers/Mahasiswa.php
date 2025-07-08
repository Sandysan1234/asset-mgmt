<?php

namespace App\Controllers;

class Mahasiswa extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Mahasiswa | Asset Managed',
        ];
        return view('mahasiswa/mahasiswa', $data);
    }


}
