<?php

namespace App\Controllers;

use App\Models\AssetModel;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Stmt\Label;


class Asset extends BaseController
{
    protected $assetModel;

    public function __construct()
    {
        $this->assetModel = new AssetModel();
    }


    public function index()
    {
        $asset = $this->assetModel->findAll();
        $data = [
            'title'     => 'Asset | Asset Managed',
            'asset' => $asset,
        ];
        return view('asset/index', $data);
    }
    // ===============create======//

    public function create()
    {
        $data = [
            'title'      => 'Form Tambah Data Asset | Asset Managed',
            'validation' => \Config\Services::validation()

        ];

        return view('asset/create', $data);
    }

    // ===============save======//
    public function save()
    {
        $data = $this->request->getPost();

        if (!$this->validateData($data, [
            'kode_asset'    => [
                'label'             => 'Kode Asset',
                'rules'             => 'required|is_unique[asset.kode_asset]',
                'errors'             => [
                    'required'        => '{field} harus diisi',
                    'is_unique'       => '{field} sudah terdafar'
                ]
            ],
            'nama_asset'    =>  [
                'label'             => 'Nama Asset',
                'rules'             => 'required|is_unique[asset.nama_asset]',
                'errors'             => [
                    'required'        => '{field} harus diisi',
                    'is_unique'       => '{field} sudah terdafar'
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
            return redirect()->to('/asset/create')->withInput();
        }

        $this->assetModel->save([
            'kode_asset'   => $this->request->getPost('kode_asset'),
            'nama_asset'   => $this->request->getPost('nama_asset'),
            'status'            => $this->request->getPost('status'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/asset');
    }

    //===========delete===========
    public function delete($id)
    {
        $this->assetModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/asset');
    }

    public function edit($id)
    {
        $data = [
            'title'      => 'Form Ubah Data Asset',
            'validation' => \Config\Services::validation(),
            'asset'      => $this->assetModel->find($id),
        ];
        return view('asset/edit', $data);
    }
    public function update($id)
    {
        $data = $this->request->getPost();

        if (!$this->validateData($data, [
            'kode_asset'  => [
                'label'   => 'Kode Asset',
                'rules'   => 'required|is_unique[asset.kode_asset,id_asset,' . $id . ']',
                'errors'  => [
                    'required'  => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar',
                ]
            ],
            'nama_asset'  => [
                'label'   => 'Nama Asset',
                'rules'   => 'required|is_unique[asset.kode_asset,id_asset,' . $id . ']',
                'errors'  => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'status'    => [
                'label'   => 'Status',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} harus'
                ]
            ]

        ])) {
            return redirect()->to('/asset/edit/' . $id)->withInput();
        }
        $this->assetModel->save(
            [
                'id_asset'      => $id,
                'kode_asset'    => $this->request->getPost('kode_asset'),
                'nama_asset'    => $this->request->getPost('nama_asset'),
                'status'              => $this->request->getPost('status')
            ]
        );
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/asset');
    }
}
