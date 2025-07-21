<?php

namespace App\Controllers;

use App\Models\AssetModel;
use App\Models\PlantModel;
use App\Models\PemasokModel;
use App\Models\CostcenterModel;
use App\Models\AssetclassModel;
use App\Models\LifetimeModel;

use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Stmt\Label;


class Asset extends BaseController
{
    protected $assetModel;
    protected $pemasokModel;
    protected $assetclassModel;
    protected $costcenterModel;
    protected $plantModel;
    protected $lifetimeModel;


    public function __construct()
    {
        $this->assetModel = new AssetModel();
        $this->plantModel       = new PlantModel();
        $this->pemasokModel      = new PemasokModel();
        $this->costcenterModel  = new CostcenterModel();
        $this->assetclassModel  = new AssetClassModel();
        $this->lifetimeModel    = new LifetimeModel();
    }


    public function index()
    {
        $asset = $this->assetModel->getWithRelasi();
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
            'validation' => \Config\Services::validation(),
            'plant'        => $this->plantModel->findAll(),
            'pemasok'       => $this->pemasokModel->findAll(),
            'cost_center'  => $this->costcenterModel->findAll(),
            'assetclass'  => $this->assetclassModel->findAll(),
            'lifetime'     => $this->lifetimeModel->findAll(),

        ];

        return view('asset/create', $data);
    }

    // ===============save======//
    public function save()
    {
        $data = $this->request->getPost();

        if (!$this->validateData($data, [
            'no_asset'    => [
                'label'               => 'No Asset',
                'rules'               => 'required|is_unique[asset.no_asset]',
                'errors'              => [
                    'required'        => '{field} harus diisi',
                    'is_unique'       => '{field} sudah terdafar'
                ]
            ],
            'sub_asset'    => [
                'label'               => 'Sub Asset',
                'rules'               => 'required|integer|is_unique[asset.sub_asset]',
                'errors'              => [
                    'required'        => '{field} harus diisi',
                    'is_unique'       => '{field} sudah terdafar',
                    'integer'         => '{field} harus angka'
                ]
            ],
            'nama_asset'    =>  [
                'label'               => 'Nama Asset',
                'rules'               => 'required|is_unique[asset.nama_asset]',
                'errors'              => [
                    'required'        => '{field} harus diisi',
                    'is_unique'       => '{field} sudah terdafar'
                ]
            ],
            'serial_number' => [
                'label'               => 'Serial Number',
                'rules'               => 'required|integer|is_unique[asset.serial_number]',
                'errors'              => [
                    'required'        => '{field} harus diisi',
                    'is_unique'       => '{field} sudah terdafar',
                    'integer'         => '{field} harus angka'
                ]
            ],
            'batch_number' => [
                'label'               => 'Batch Number',
                'rules'               => 'required|integer|is_unique[asset.batch_number]',
                'errors'              => [
                    'required'        => '{field} harus diisi',
                    'is_unique'       => '{field} sudah terdafar',
                    'integer'         => '{field} harus angka'
                ]
            ],
            'merk'    =>  [
                'label'               => 'Merk',
                'rules'               => 'required|is_unique[asset.merk]',
                'errors'              => [
                    'required'        => '{field} harus diisi',
                    'is_unique'       => '{field} sudah terdafar'
                ]
            ],
            'spek'    =>  [
                'label'               => 'Spek',
                'rules'               => 'required|is_unique[asset.spek]',
                'errors'              => [
                    'required'        => '{field} harus diisi',
                    'is_unique'       => '{field} sudah terdafar'
                ]
            ],
            'tgl_perolehan' => [
                'label'               => 'Spek',
                'rules'               => 'required|timezone',
                'errors'              => [
                    'required'        => '{field} harus diisi',
                    'timezone'       => '{field} tidak sesuai'
                ]
            ],

            'harga' => [
                'label'   => 'Harga',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'no_po' => [
                'label'               => 'No Purchase Order',
                'rules'               => 'required|integer|is_unique[asset.no_po]',
                'errors'              => [
                    'required'        => '{field} harus diisi',
                    'is_unique'       => '{field} sudah terdafar',
                    'integer'         => '{field} harus angka'
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
        //     'no_asset',
        // 'sub_asset',
        // 'nama_asset',
        // 'serial_number',
        // 'batch_number',
        // 'merek',
        // 'spek',
        // 'tgl_perolehan',
        // 'harga',
        // 'no_po',
        // 'id_assetclass',
        // 'id_vendor',
        // 'id_lifetime',

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
