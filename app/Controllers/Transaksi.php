<?php

namespace App\Controllers;


use CodeIgniter\HTTP\ResponseInterface;

use App\Models\AssetModel;
use App\Models\PlantModel;
use App\Models\CostcenterModel;
use App\Models\TransactionModel;
use App\Models\TransactionStepsModel;



class Transaksi extends BaseController
{

  protected $assetModel;
  protected $plantModel;
  protected $costcenterModel;


  public function __construct()
  {
    $this->assetModel = new AssetModel();
    $this->costcenterModel  = new CostcenterModel();
    $this->plantModel  = new PlantModel();
  }
  public function index(): string
  {
    // pr untuk data yang di load
    $plants = $this->plantModel->select('id_plant, nama_plant')->orderBy('nama_plant')->findAll();
    $costcenters = $this->costcenterModel->select('id_cost_center, nama_cost_center')->orderBy('nama_cost_center')->findAll();
    // $asset = $this->assetModel->getWithRelasi();



    $data = [
      'title' => 'Transaksi | Asset Managed',
      'validation'  => \Config\Services::validation(),
      'plants' => $plants,
      'costcenters' => $costcenters
      // 'asset' => $asset,
      // 'no_asset' => $this->assetModel->select('no_asset')->findAll()

    ];
    return view('transaksi/index', $data);
  }
  public function create(): string
  {
    // pr untuk data yang di load
    $plants = $this->plantModel->select('id_plant, nama_plant')->orderBy('nama_plant')->findAll();
    $costcenters = $this->costcenterModel->select('id_cost_center, nama_cost_center')->orderBy('nama_cost_center')->findAll();
    // $asset = $this->assetModel->getWithRelasi();



    $data = [
      'title' => 'Form Perpindahan | Asset Managed',
      'validation'  => \Config\Services::validation(),
      'plants' => $plants,
      'costcenters' => $costcenters
      // 'asset' => $asset,
      // 'no_asset' => $this->assetModel->select('no_asset')->findAll()

    ];
    return view('transaksi/create', $data);
  }
  public function suggestAsset(): ResponseInterface
  {
    $term = trim((string) $this->request->getGet('term'));
    if (mb_strlen($term) < 2) {
      return $this->response->setJSON([]);
    }

    // >>>> Panggil MODEL (semua query ada di Model)
    $rows = $this->assetModel->suggestByNoAsset($term, 10);

    $out = array_map(function ($r) {
      return [
        'label'  => ($r['no_asset'] ?? '') . ' — ' . ($r['nama_asset'] ?? ''),
        'value'  => $r['no_asset'] ?? '',
        'id_asset'      => $r['id_asset'] ?? null,
        'asset_class'   => $r['asset_class'] ?? '',
        'plant'         => $r['plant'] ?? '',
        'cost_center'   => $r['cost_center'] ?? '',
        'no_asset'      => $r['no_asset'] ?? '',
        'sub_asset'     => $r['sub_asset'] ?? '',
        'nama_asset'    => $r['nama_asset'] ?? '',
        'tgl_perolehan' => empty($r['tgl_perolehan']) ? '' : date('Y-m-d', strtotime($r['tgl_perolehan'])),
        'area'          => $r['area'] ?? '',
        'gedung'        => $r['gedung'] ?? '',
        'lantai'        => $r['lantai'] ?? '',
        'id_assetclass'    => $r['id_assetclass'] ?? null,
        'id_plant'          => $r['id_plant'] ?? null,
        'id_cost_center'    => $r['id_cost_center'] ?? null,
        'id_lokasi_area'    => $r['id_lokasi_area'] ?? null,
        'id_lokasi_gedung'  => $r['id_lokasi_gedung'] ?? null,
        'id_lokasi_lantai'  => $r['id_lokasi_lantai'] ?? null,
      ];
    }, $rows);
    return $this->response->setJSON($out);
  }

  public function save()
  {

    $data = $this->request->getPost();
    // dd($data);

    $rules = [
      // 'no_asset' => [
      //   'label'               => 'No Asset',
      //   'rules'               => 'required',
      //   'errors'              => [
      //     'required'          => '{field} harus diisi'
      //   ]
      // ],

    ];

    if (! $this->validateData($data, $rules)) {
      return redirect()->to('/transaksi')->withInput();
    }

  }

  // public function lala()
  // {
  //     $data = $this->request->getPost();

  //     if (!$this->validateData($data, [

  //         'id_lokasi' => [
  //             'label'               => 'Lokasi Asset',
  //             'rules'               => 'required',
  //             'errors'              => [
  //                 'required'          => 'Pilih Minimal 1 {field} yang sesuai'
  //             ]
  //         ],


  //     ])) {
  //         return redirect()->to('/asset/create')->withInput();
  //     }
  //     //    


  //     $this->assetModel->save([
  //         'no_asset'        => $this->request->getPost('no_asset'),
  //         'sub_asset'       => $this->request->getPost('sub_asset'),
  //         'nama_asset'      => $this->request->getPost('nama_asset'),
  //         'serial_number'   => $this->request->getPost('serial_number'),
  //         'batch_number'    => $this->request->getPost('batch_number'),
  //         'merek'           => $this->request->getPost('merek'),
  //         'spek'            => $this->request->getPost('spek'),
  //         'tgl_perolehan'   => $this->request->getPost('tgl_perolehan'),
  //         'harga'           => $data > ['harga'],
  //         'no_po'           => $this->request->getPost('no_po'),
  //         'id_assetclass'   => $this->request->getPost('id_assetclass'),
  //         'id_cost_center'  => $this->request->getPost('id_cost_center'),
  //         'id_lifetime'     => $this->request->getPost('id_lifetime'),
  //         'id_vendor'       => $this->request->getPost('id_vendor'),
  //         'id_plant'        => $this->request->getPost('id_plant'),
  //         'id_lokasi_area'   => $this->request->getPost('id_lokasi_area') ?: null,
  //         'id_lokasi_gedung' => $this->request->getPost('id_lokasi_gedung') ?: null,
  //         'id_lokasi_lantai' => $this->request->getPost('id_lokasi_lantai') ?: null,
  //         'status'          => $this->request->getPost('status') ?: 5,
  //     ]);
  //     session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
  //     return redirect()->to('/asset');
  // }

}
