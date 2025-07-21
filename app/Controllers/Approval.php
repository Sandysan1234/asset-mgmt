<?php

namespace App\Controllers;

class Approval extends BaseController
{
    public function index(): string
    {
        $data=[
            'title' => 'Approval Transaksi | Asset Managed',
        ];
        return view('approval/index', $data);
    }
}