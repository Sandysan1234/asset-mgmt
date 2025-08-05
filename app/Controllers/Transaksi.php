<?php

namespace App\Controllers;

class Transaksi extends BaseController
{
    public function index(): string
    {
        $data=[
            'title' => 'Perpindahan Asset | Asset Managed',
        ];
        return view('transaksi/index', $data);
    }
}