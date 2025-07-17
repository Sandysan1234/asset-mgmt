<?php

namespace App\Controllers;

use App\Models\LocationModel;

class Location extends BaseController
{
    protected $locationModel;

    public function __construct()
    {
        $this->locationModel = new LocationModel();
    }
    public function index()
    {
        $location  = $this->locationModel->findAll();
        $data = [
            'title'     => 'Location | Asset Managed',
            'location'  => $location,
        ];
        return view('location/index', $data);
    }
    public function create()
    {
        $data = [
            'title'        => 'Form Tambah Location | Asset managed',
            'validation'   => \Config\Services::validation(),
        ];
        return view('location/create', $data);
    }
    public function save()
    {
        $data = $this->request->getPost();

        if (!$this->validateData($data, [
            'kode_lokasi'    => [
                'label'             => 'Kode Lokasi',
                'rules'             => 'required|is_unique[lokasi.kode_lokasi]',
                'errors'            => [
                    'required'        => '{field} harus diisi',
                    'is_unique'       => '{field} sudah terdafar'
                ]
            ],
            'nama_lokasi'   => [
                'label'             => 'Nama Lokasi',
                'rules'             => 'required|is_unique[lokasi.nama_lokasi]',
                'errors'            => [
                    'required'        => '{field} harus diisi',
                    'is_unique'       => '{field} sudah terdafar'
                ]
            ],
            'jenis_lokasi'  => [
                'label'             => 'Jenis Lokasi',
                'rules'             => 'required|',
                'errors'            => [
                    'required'        => '{field} harus diisi',
                ]
            ],
            'status'        => [
                'label'             => 'Status',
                'rules'             => 'required|',
                'errors'            => [
                    'required'        => '{field} harus diisi',
                ]
            ]
        ])) {
            return redirect()->to('/location/create')->withInput();
        }

        $this->locationModel->save([
            'kode_lokasi'   => $this->request->getPost('kode_lokasi'),
            'nama_lokasi'   => $this->request->getPost('nama_lokasi'),
            'jenis_lokasi'  => $this->request->getPost('jenis_lokasi'),
            'status'        => $this->request->getPost('status'),
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/location');
    }

    public function delete($id)
    {
        $this->locationModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/location');
    }

    public function edit($id)
    {
        $data = [
            'title'        => 'Form Tambah Location | Asset managed',
            'validation'   => \Config\Services::validation(),
            'location'     => $this->locationModel->find($id),
        ];
        return view('location/edit', $data);
    }

    public function update($id)
    {
        $data = $this->request->getPost();

        if (!$this->validateData($data, [
            'kode_lokasi'    => [
                'label'             => 'Kode Lokasi',
                'rules'             => 'required|is_unique[lokasi.kode_lokasi,id_lokasi,' . $id . ']',
                'errors'            => [
                    'required'        => '{field} harus diisi',
                    'is_unique'       => '{field} sudah terdafar'
                ]
            ],
            'nama_lokasi'   => [
                'label'             => 'Nama Lokasi',
                'rules'             => 'required|is_unique[lokasi.nama_lokasi,id_lokasi,' . $id . ']',
                'errors'            => [
                    'required'        => '{field} harus diisi',
                    'is_unique'       => '{field} sudah terdafar'
                ]
            ],
            'jenis_lokasi'  => [
                'label'             => 'Jenis Lokasi',
                'rules'             => 'required|',
                'errors'            => [
                    'required'        => '{field} harus diisi',
                ]
            ],
            'status'        => [
                'label'             => 'Status',
                'rules'             => 'required|',
                'errors'            => [
                    'required'        => '{field} harus diisi',
                ]
            ]
        ])) {
            return redirect()->to('/location/edit/' . $id)->withInput();
        }

        $this->locationModel->save([
            'id_lokasi'     => $id,
            'kode_lokasi'   => $this->request->getPost('kode_lokasi'),
            'nama_lokasi'   => $this->request->getPost('nama_lokasi'),
            'jenis_lokasi'  => $this->request->getPost('jenis_lokasi'),
            'status'        => $this->request->getPost('status'),
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/location');
    }
}
