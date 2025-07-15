<?php

namespace App\Controllers;

use App\Models\LifetimeModel;

class Lifetime extends BaseController
{
    protected $lifetimeModel;
    public function __construct()
    {
        $this->lifetimeModel = new LifetimeModel();
    }


    public function index()
    {
        $lifetime = $this->lifetimeModel->findAll();
        $data = [
            'title'     => 'Lifetime | Asset Managed',
            'lifetime'  => $lifetime,

        ];
        return view('lifetime/index', $data);
    }

    public function create()
    {
        $data = [
            'title'      => 'Form Tambah Data lifetime | Asset Managed',
            'validation' =>  \Config\Services::validation()
        ];

        return view('lifetime/create', $data);
    }
}
