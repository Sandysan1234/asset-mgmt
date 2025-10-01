<?php

namespace App\Controllers;

use App\Models\AssetModel;
use App\Models\PerbaikanModel;
use CodeIgniter\Validation\StrictRules\Rules;
use PhpParser\Node\Expr\FuncCall;

class Perbaikan extends BaseController
{
    protected $assetModel;
    protected $perbaikanModel;

    public function __construct()
    {
        $this->assetModel = new AssetModel();
        $this->perbaikanModel = new PerbaikanModel();
    }




    public function index()
    {
        // $assets = $this->assetModel->baseRelasi()->findAll();

        $repairs = $this->perbaikanModel->getAllWithAssetDetail();
        $data = [
            'title'     => 'Perbaikan | Asset Management System',
            'repairs' => $repairs,
            // 'assets' => $assets,
        ];
        return view('perbaikan/index', $data);
    }
    // ===============create======//
    public function create()
    {
        $data = [
            'title'      => 'Form Tambah Data Perbaikan | Asset Management System',
            'validation' =>  \Config\Services::validation(),
            'assets'       => $this->assetModel->orderBy('nama_asset')->findAll(),

        ];

        return view('perbaikan/create', $data);
    }



    // ===============save======//
    public function save()
    {
        $data = $this->request->getPost();

        if (!$this->validateData($data, [
            'id_asset'    => [
                'label'             => 'Asset',
                'rules'             => 'required',
                'errors'            => [
                    'required'        => 'Pilih {field} yang sesuai',
                ]
            ],
            'jenis_perbaikan'    =>  [
                'label'             => 'Jenis Perbaikan',
                'rules'             => 'required',
                'errors'             => [
                    'required'        => '{field} harus diisi',

                ]
            ],
            'keterangan' => [
                'label'   => 'Keterangan',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'teknisi' => [
                'label'   => 'Teknisi',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'durasi' => [
                'label'   => 'Durasi',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'tgl_awal' => [
                'label'   => 'Mulai Perbaikan',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'tgl_akhir' => [
                'label'   => 'Selesai Perbaikan',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'place' => [
                'label'   => 'Tempat Perbaikan',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} harus diisi',
                ]
            ],
        ])) {
            return redirect()->to('/perbaikan/create')->withInput();
        }
        $biayaRaw = $this->request->getPost('biaya');
        $biaya = (int) str_replace('.', '', $biayaRaw);

        $this->perbaikanModel->save([
            'id_asset'         => $this->request->getPost('id_asset'),
            'jenis_perbaikan'  => $this->request->getPost('jenis_perbaikan'),
            'keterangan'       => $this->request->getPost('keterangan'),
            'biaya'            => $biaya,
            'teknisi'          => $this->request->getPost('teknisi'),
            'durasi'           => $this->request->getPost('durasi'),
            'tgl_awal'         => $this->request->getPost('tgl_awal'),
            'tgl_akhir'        => $this->request->getPost('tgl_akhir'),
            'place'            => $this->request->getPost('place'),
            'status'           => $this->request->getPost('status'),
            'modified_by'      => user()->email, // ✅ AMAN dengan fallback
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/perbaikan');
    }
    // --------------=====edit=====------
    public function edit($id)
    {
        $data = [
            'title'   => 'Form Ubah Data Perbaikan | Asset Management System',
            'validation' =>  \Config\Services::validation(),
            'assets' => $this->assetModel
                ->select('id_asset, nama_asset, no_asset') // <-- hanya ambil yang perlu
                ->orderBy('nama_asset')
                ->findAll(),
            'repair'      => $this->perbaikanModel->find($id),
        ];
        return view('perbaikan/edit', $data);
    }
    public function update($id)
    {
        $data = $this->request->getPost();
        // $existing = $this->perbaikanModel->find($id);

        $rules = [
            // 'id_asset'    => [
            //     'label'             => 'Asset',
            //     'rules'             => 'required',
            //     'errors'            => [
            //         'required'        => 'Pilih {field} yang sesuai',
            //     ]
            // ],
            'jenis_perbaikan'    =>  [
                'label'             => 'Jenis Perbaikan',
                'rules'             => 'required',
                'errors'             => [
                    'required'        => '{field} harus diisi',

                ]
            ],
            'keterangan' => [
                'label'   => 'Keterangan',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'teknisi' => [
                'label'   => 'Teknisi',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'durasi' => [
                'label'   => 'Durasi',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'tgl_awal' => [
                'label'   => 'Mulai Perbaikan',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'tgl_akhir' => [
                'label'   => 'Selesai Perbaikan',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'place' => [
                'label'   => 'Tempat Perbaikan',
                'rules'   => 'required',
                'errors'  => [
                    'required' => '{field} harus diisi',
                ]
            ],
        ];
        if (!$this->validateData($data, $rules)) {
            return redirect()->to('/perbaikan/edit/' . $id)->withInput();
        }
        $biayaRaw = $this->request->getPost('biaya');
        $biaya = (int) str_replace('.', '', $biayaRaw);
        $this->perbaikanModel->save([
            'id_perbaikan'      => $id,
            // 'id_asset'          => $existing['id_asset'],
            'jenis_perbaikan'   => $data['jenis_perbaikan'],
            'keterangan'        => $data['keterangan'],
            'biaya'             => $biaya,
            'teknisi'           => $data['teknisi'],
            'durasi'            => $data['durasi'],
            'tgl_awal'          => $data['tgl_awal'],
            'tgl_akhir'         => $data['tgl_akhir'],
            'place'             => $data['place'],
            'status'           => $this->request->getPost('status'),
            'modified_by'      => user()->email, // ✅ AMAN dengan fallback

        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/perbaikan');
    }


    //===========delete===========
    public function delete($id)
    {
        $this->perbaikanModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/perbaikan');
    }
}
