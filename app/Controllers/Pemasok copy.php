<?php

namespace App\Controllers;
use App\Models\PemasokModel;

class Pemasok extends BaseController
{
    protected $pemasokModel;
    public function __construct()
    {
        $this-> pemasokModel = new PemasokModel();
    }
    public function index()
    {
        $pemasok = $this->pemasokModel->findAll();
        $data =[
            'title'=> 'Vendor | Asset Managed',
            'pemasok' => $pemasok,
            
            
        ];

        return view('pemasok/index', $data);
    }
    
    public function save()
    {
        
        $this->pemasokModel->save([
            'kode_vendor' => $this->request->getPost('kode_vendor'),
            'nama_vendor' => $this->request->getPost('nama_vendor'),
            'alamat' => $this->request->getPost('alamat'),
            'status' => $this->request->getPost('status'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/pemasok');

    }
    
}
