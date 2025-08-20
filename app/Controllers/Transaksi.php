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
  protected $transactionModel;


  public function __construct()
  {
    $this->assetModel = new AssetModel();
    $this->costcenterModel  = new CostcenterModel();
    $this->plantModel  = new PlantModel();
    $this->transactionModel  = new TransactionModel();
  }
  public function index(): string
  {

    $transaksi = $this->transactionModel->baseRelasi()->findAll();
    $data = [
      'title' => 'Transaksi | Asset Managed',
      'validation'  => \Config\Services::validation(),
      // 'plants' => $plants,
      // 'costcenters' => $costcenters
      // 'asset' => $asset,
      'transaksi' => $transaksi,

    ];
    return view('transaksi/index', $data);
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

  public function create(): string
  {
    // pr untuk data yang di load
    $plant = $this->plantModel->select('id_plant, nama_plant')->orderBy('nama_plant')->findAll();
    $cost_center = $this->costcenterModel->select('id_cost_center, nama_cost_center')->orderBy('nama_cost_center')->findAll();
    // $asset = $this->assetModel->getWithRelasi();



    $data = [
      'title' => 'Form Perpindahan | Asset Managed',
      'validation'  => \Config\Services::validation(),
      'plant' => $plant,
      'cost_center' => $cost_center,
      'user'          => user(),

      // 'asset' => $asset,
      // 'no_asset' => $this->assetModel->select('no_asset')->findAll()

    ];
    return view('transaksi/create', $data);
  }

  // public function save()
  // {

  //   $data = $this->request->getPost();

  //   $rules = [

  //     'transaksi' => [
  //       'label'               => 'No Asset',
  //       'rules'               => 'required',
  //       'errors'              => [
  //         'required'          => '{field} harus diisi'
  //       ]
  //     ],

  //   ];

  //   if (!$this->validateData($data, $rules)) {
  //     return redirect()->to('/transaksi/create')->withInput();
  //   }
  //   $this->transactionModel->save([
  //     'id_asset'              => $this->request->getPost('id_asset'),
  //     'transaksi'             => $this->request->getPost('transaksi'),
  //     'tgl_transaksi'         => $this->request->getPost('tgl_transaksi'),
  //     'alasan'                => $this->request->getPost('alasan'),
  //     'id_plant_asal'         => $this->request->getPost('id_plant_asal'),
  //     'id_cost_center_asal'   => $this->request->getPost('id_cost_center_asal'),
  //     'id_lokasi_area_asal'   => $this->request->getPost('id_lokasi_area_asal'),
  //     'id_lokasi_gedung_asal' => $this->request->getPost('id_lokasi_gedung_asal'),
  //     'id_lokasi_lantai_asal' => $this->request->getPost('id_lokasi_lantai_asal'),
  //     'id_plant_baru'         => $this->request->getPost('id_plant_baru'),
  //     'id_cost_center_baru'   => $this->request->getPost('id_cost_center_baru'),
  //     'id_lokasi_area_baru'   => $this->request->getPost('id_lokasi_area_baru'),
  //     'id_lokasi_gedung_baru' => $this->request->getPost('id_lokasi_gedung_baru'),
  //     'id_lokasi_lantai_baru' => $this->request->getPost('id_lokasi_lantai_baru'),
  //     'status'                => $this->request->getPost('status') ?: 0,
  //     'catatan'               => $this->request->getPost('catatan'),
  //   ]);
  //   session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
  //   return redirect()->to('/transaksi');
  // }

  public function save()
  {
    $post = $this->request->getPost();

    // 1) Validasi minimal: transaksi wajib
    $rules = [
      'transaksi' => [
        'label'  => 'Transaksi',
        'rules'  => 'required',
        'errors' => ['required' => '{field} harus diisi']
      ],
      'tgl_transaksi' => [
        'label'  => 'Tanggal Transaksi',
        'rules'  => 'required',
        'errors' => [
          'required'            => '{field} harus diisi',
        ]
      ],
      'alasan' => [
        'label'  => 'Alasan',
        'rules'  => 'required',
        'errors' => [
          'required'            => '{field} harus diisi',
        ]
      ],
    ];
    if (!$this->validateData($post, $rules)) {
      return redirect()->to('/transaksi/create')->withInput();
    }

    // 2) Ambil snapshot ASAL dari tabel assets (jangan dari POST)
    $idAsset = (int)$post['id_asset'];
    $asset = $this->assetModel
      ->select('id_asset,id_plant,id_cost_center') // bisa ditambah ini jika perlu: id_lokasi_area,id_lokasi_gedung,id_lokasi_lantai//
      ->find($idAsset);

    if (!$asset) {
      return redirect()->back()->withInput()->with('error', 'Asset tidak ditemukan.');
    }


    // 4) Jika bukan mutasi (3), kosongkan tujuan agar konsisten
    $isMutasi = ((int)$post['transaksi'] === 3);
    $idPlantBaru        = $isMutasi ? ($post['id_plant_baru']        ?? null) : null;
    $idCostCenterBaru   = $isMutasi ? ($post['id_cost_center_baru']  ?? null) : null;
    // $idLokAreaBaru      = $isMutasi ? ($post['id_lokasi_area_baru']  ?? null) : null;
    // $idLokGedungBaru    = $isMutasi ? ($post['id_lokasi_gedung_baru'] ?? null) : null;
    // $idLokLantaiBaru    = $isMutasi ? ($post['id_lokasi_lantai_baru'] ?? null) : null;

    // Opsional: guard mutasi asal≠tujuan

    // if ($isMutasi && !empty($idPlantBaru) && (int)$idPlantBaru === (int)$asset['id_plant']) {
    //   return redirect()->back()->withInput()->with('error', 'Plant asal & tujuan tidak boleh sama.');
    // }

    // 5) Payload akhir — tetap pola save() milikmu
    $ok = $this->transactionModel->save([
      'id_asset'               => $idAsset,
      'transaksi'              => $post['transaksi'],
      'tgl_transaksi'          => $post['tgl_transaksi'],
      'alasan'                 => $post['alasan'] ?? null,

      // ASAL diambil dari DB (snapshot)
      'id_plant_asal'          => $asset['id_plant'],
      'id_cost_center_asal'    => $asset['id_cost_center'],
      // 'id_lokasi_area_asal'    => $asset['id_lokasi_area'],
      // 'id_lokasi_gedung_asal'  => $asset['id_lokasi_gedung'],
      // 'id_lokasi_lantai_asal'  => $asset['id_lokasi_lantai'],

      // TUJUAN dari form (atau null jika bukan mutasi)
      'id_plant_baru'          => $idPlantBaru,
      'id_cost_center_baru'    => $idCostCenterBaru,
      // 'id_lokasi_area_baru'    => $idLokAreaBaru,
      // 'id_lokasi_gedung_baru'  => $idLokGedungBaru,
      // 'id_lokasi_lantai_baru'  => $idLokLantaiBaru,
      'date_pic'            => date('Y-m-d H:i:s', strtotime($post['date_pic'])),
      'nama_pic'            => $post['nama_pic'],

      'status'                 => $post['status'] ?? 0, // 0=onprogress
      'catatan'                 => $post['catatan'] ?? null,
    ]);


    if (!$ok) {
      return redirect()->back()->withInput()
        ->with('error', 'Gagal simpan: ' . json_encode($this->transactionModel->errors()));
    }

    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
    return redirect()->to('/transaksi');
  }
  public function edit($id)
  {


    $data = [
      'title'         => 'Approval | Asset Managed',
      'validation'    => \Config\Services::validation(),
      'transaksi'     => $this->transactionModel->baseRelasi()->find($id),
      'plants'        => $this->plantModel->select('id_plant, nama_plant')->orderBy('nama_plant')->findAll(),
      'cost_center'   => $this->costcenterModel->select('id_cost_center, nama_cost_center')->orderBy('nama_cost_center')->findAll(),
      'user'          => user(),
      // 'assets'        => $this->assetModel->findAll(),


    ];
    return view('transaksi/edit', $data);
  }

  public function update($id)
  {

    $data = $this->request->getPost();
    // dd($data);   
    // $existing = $this->transactionModel->find($id);

    // $rules[
    //   ''
    // ]

    // if (!$this->validateData($data,$rules)) {
    //   # code...
    // }

    $this->transactionModel->save([

      'id_transaksi'        => $id,
      // 'alasan'              => $existing['alasan'],
      'date_ttd_asal'       => date('Y-m-d H:i:s', strtotime($data['date_ttd_asal'])),
      'user_kabag_asal'     => $data['user_kabag_asal'],

      'date_ttd_tujuan'     => date('Y-m-d H:i:s', strtotime($data['date_ttd_tujuan'])),
      'user_kabag_tujuan'   => $data['user_kabag_tujuan'],
      'date_pic'            => date('Y-m-d H:i:s', strtotime($data['date_pic'])),
      'nama_pic'            => $data['nama_pic'],
      'date_direksi'        => date('Y-m-d H:i:s', strtotime($data['date_direksi'])),
      'nama_direksi'        => $data['nama_direksi'],
      'date_ack_fin'        => date('Y-m-d H:i:s', strtotime($data['date_ack_fin'])),
      'date_ack_acc'        => date('Y-m-d H:i:s', strtotime($data['date_ack_acc'])),
      'date_ack_ctrl'       => date('Y-m-d H:i:s', strtotime($data['date_ack_ctrl'])),
      // 'nama_direksi'        => $data['nama_direksi'],
      // 'nama_direksi'        => $data['nama_direksi'],
      // 'nama_direksi'        => $data['nama_direksi'],

    ]);



    session()->setFlashdata('pesan', 'Data berhasil Ditambahkan');
    return redirect()->to('/transaksi');
  }
}
