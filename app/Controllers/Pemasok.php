<?php

namespace App\Controllers;

use App\Models\PemasokModel;
use PhpParser\Node\Stmt\Label;

class Pemasok extends BaseController
{
    protected $pemasokModel;

    public function __construct()
    {
        $this->pemasokModel = new PemasokModel();
    }

    public function index()
    {
        $pemasok = $this->pemasokModel->findAll();

        $data = [
            'title'   => 'Vendor | Asset Management System',
            'pemasok' => $pemasok,
        ];

        return view('pemasok/index', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title'      => 'Form Tambah Data Vendor | Asset Management System',
            'validation' => \Config\Services::validation()
        ];

        // Ambil validasi dari session jika ada


        return view('pemasok/create', $data);
    }

    // public function save()
    // {
    //     if (!$this->validate([
    //         'kode_vendor' => 'required|is_unique[pemasok.kode_vendor]',
    //         'nama_vendor' => 'required',
    //         'alamat'      => 'required',
    //         'status'      => 'required',
    //     ])) {
    //         $validation = \config\Services::validation();
    //         // Kirim error validasi ke halaman create
    //         return redirect()->to('/pemasok/create')->withInput()->with('validation', $validation);
    //         // return redirect()->to(base_url('/pemasok/create'))->withInput();
    //     }

    //     $this->pemasokModel->save([
    //         'kode_vendor' => $this->request->getPost('kode_vendor'),
    //         'nama_vendor' => $this->request->getPost('nama_vendor'),
    //         'alamat'      => $this->request->getPost('alamat'),
    //         'status'      => $this->request->getPost('status'),
    //     ]);

    //     session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
    //     return redirect()->to('/pemasok');
    // }
    public function save()
    {
        $data = $this->request->getPost();

        if (!$this->validateData($data, [
            'kode_vendor' => [
                'label'  => 'Kode Vendor',
                'rules'  => 'required|is_unique[pemasok.kode_vendor]',
                'errors' => [
                    'required'  => '{field} harus diisi',
                    'is_unique'  => '{field} sudah terdaftar',
                ]
            ],
            'nama_vendor' => [
                'label'   => 'Nama Vendor',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'alamat' => [
                'label'   => 'Alamat',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'status' => [
                'label'   => 'Status',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} harus diisi',
                ]
            ]

        ])) {

            return redirect()->to('/pemasok/create')->withInput();
        }

        $this->pemasokModel->save([
            'kode_vendor'   => $this->request->getPost('kode_vendor'),
            'nama_vendor'   => $this->request->getPost('nama_vendor'),
            'alamat'        => $this->request->getPost('alamat'),
            'status'        => $this->request->getPost('status'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('pemasok');
    }



    public function delete($id)
    {
        $this->pemasokModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/pemasok');
    }
    public function edit($id)
    {
        $data = [
            'title'      => 'Form Ubah Data Vendor',
            'validation' => \Config\Services::validation(),
            'pemasok'      => $this->pemasokModel->find($id),
        ];
        return view('pemasok/edit', $data);
    }
    public function update($id)
    {
        $data = $this->request->getPost();
        if (!$this->validateData($data, [
            'kode_vendor' => [
                'label'  => 'Kode Vendor',
                'rules'  => 'required|is_unique[pemasok.kode_vendor,id_vendor,' . $id . ']',
                'errors' => [
                    'required'  => '{field} harus diisi',
                    'is_unique'  => '{field} sudah terdaftar',
                ]
            ],
            'nama_vendor' => [
                'label'   => 'Nama Vendor',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'alamat' => [
                'label'   => 'Alamat',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'status' => [
                'label'   => 'Status',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} harus diisi',
                ]
            ]

        ])) {
            return redirect()->to('/pemasok/edit/' . $id)->withInput();
        }
        $this->pemasokModel->save([
            'id_vendor'     => $id,
            'kode_vendor'   => $this->request->getPost('kode_vendor'),
            'nama_vendor'   => $this->request->getPost('nama_vendor'),
            'alamat'        => $this->request->getPost('alamat'),
            'status'        => $this->request->getPost('status'),
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('pemasok');
    }
}
