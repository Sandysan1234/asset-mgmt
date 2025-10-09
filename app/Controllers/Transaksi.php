<?php

namespace App\Controllers;


use CodeIgniter\HTTP\ResponseInterface;

use App\Models\AssetModel;
use App\Models\PlantModel;
use App\Models\CostcenterModel;
use App\Models\TransactionModel;
use App\Models\UserModel;
// use Myth\Auth\Models\UserModel;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\PermissionModel;



class Transaksi extends BaseController
{

  protected $assetModel;
  protected $plantModel;
  protected $costcenterModel;
  protected $transactionModel;
  protected $userModel;
  protected $groupModel;
  protected $permissionModel;


  public function __construct()
  {
    $this->assetModel = new AssetModel();
    $this->costcenterModel  = new CostcenterModel();
    $this->plantModel  = new PlantModel();
    $this->transactionModel  = new TransactionModel();
    $this->userModel    = new UserModel();
    $this->groupModel    = new GroupModel();
    $this->permissionModel    = new PermissionModel();
  }
  public function index(): string
  {

    $transaksi = $this->transactionModel->baseRelasi()->findAll();
    $data = [
      'title' => 'Transaksi | Asset Management System',
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
    $kabagGroup = $this->groupModel->where('name', 'kabag')->first();
    $kabagUsers = [];

    if ($kabagGroup) {

      $kabagUsers = $this->userModel
        ->select('users.id, users.fullname, users.username, users.email')
        ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
        ->where('auth_groups_users.group_id', $kabagGroup->id) // pastikan field: group_id
        ->where('users.active', 1) // hanya user aktif
        ->findAll();
    }


    $direksi = $this->userModel->getUsersByPermissionNames([
      'approve_plant_manager',
      'approve_direksi'
    ]);

    $plant = $this->plantModel->select('id_plant, nama_plant')->orderBy('nama_plant')->findAll();
    $cost_center = $this->costcenterModel->select('id_cost_center, nama_cost_center')->orderBy('nama_cost_center')->findAll();
    // $asset = $this->assetModel->getWithRelasi();



    $data = [
      'title' => 'Form Perpindahan | Asset Management System',
      'transaksi' => $this->transactionModel->baseRelasi()->findAll(),
      'validation'  => \Config\Services::validation(),
      'plant' => $plant,
      'cost_center' => $cost_center,
      'user'          => user(),
      'kabagUsers' => $kabagUsers,
      'nama_direksi' => $direksi,
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
    // dd($post);

    // $idKabagAsal = $post['user_kabag_asal'];        // ini ID, bukan email
    // $idKabagTujuan = $post['user_kabag_tujuan'];
    // // $id_direksi = $post['user_kabag_tujuan'];

    // $kabagAsal = $this->userModel->find($idKabagAsal);
    // $emailAsal = $kabagAsal ? $kabagAsal['email'] : null;
    // $kabagTujuan = $this->userModel->find($idKabagTujuan);
    // $emailTujuan = $kabagTujuan ? $kabagTujuan['email'] : null;



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


      'user_kabag_asal' => [
        'label'  => 'Kepala Bagian Asal',
        'rules'  => 'required',
        'errors' => [
          'required'            => '{field} belum dipilih',
        ]
      ],
      'user_kabag_tujuan' => [
        'label'  => 'Kepala Bagian Tujuan',
        'rules'  => 'required',
        'errors' => [
          'required'            => '{field} belum dipilih',
        ]
      ],
      'nama_direksi' => [
        'label'  => 'Direksi / Plant',
        'rules'  => 'required',
        'errors' => [
          'required'            => '{field} belum dipilih',
        ]
      ],

      'alasan' => [
        'label'  => 'Alasan',
        'rules'  => 'required',
        'errors' => [
          'required'            => '{field} harus diisi',
        ]
      ],
      'upload_img' => [
        'label'  => 'Gambar',
        'rules'  => 'max_size[upload_img,2048]|is_image[upload_img]|mime_in[upload_img,image/png,image/jpeg,image/jpg]',
        'errors' => [
          'max_size'            => 'Ukuran {field} Max 2MB',
          'is_image'            => 'Yang anda pilih bukan {field}',
          'mime_in'            => 'Yang anda pilih bukan {field}',
        ]
      ],
    ];

    if (!$this->validateData($post, $rules)) {
      // dd(validation_errors());
      return redirect()->to('/transaksi/create')->withInput();
    }

    $upload_img = $this->request->getFile('upload_img');
    //apakah tidak ada yang diupload
    if ($upload_img->getError() == 4) {
      $nama_img = 'logo-jmi.png';
    } else {
      $nama_img = $upload_img->getRandomName();
      $upload_img->move('img', $nama_img);
      // dd($upload_img);
    }

    // 2) Ambil snapshot ASAL dari tabel assets (jangan dari POST)
    $idAsset = (int)$post['id_asset'];
    $asset = $this->assetModel
      ->select('id_asset,id_plant,id_cost_center,status') // bisa ditambah ini jika perlu: id_lokasi_area,id_lokasi_gedung,id_lokasi_lantai//
      ->find($idAsset);

    if (!$asset) {
      return redirect()->back()->withInput()->with('error', 'Asset tidak ditemukan.');
    }
    $statusSebelum = $asset['status'];


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
    // === AMBIL EMAIL DARI DATABASE (BEST PRACTICE) ===
    try {
      $emailKabagAsal   = $this->validateAndGetUserEmail($post['user_kabag_asal'], 'Kabag Asal');
      $emailKabagTujuan = $this->validateAndGetUserEmail($post['user_kabag_tujuan'], 'Kabag Tujuan');
      $emailDireksi     = $this->validateAndGetUserEmail($post['nama_direksi'], 'Direksi');
    } catch (\Exception $e) {
      return redirect()->back()->withInput()->with('error', $e->getMessage());
    }
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
      // 'date_pic'            => date('Y-m-d H:i:s', strtotime($post['date_pic'])),
      'user_kabag_asal'        => $post['user_kabag_asal'],
      'user_kabag_tujuan'      => $post['user_kabag_tujuan'],
      'nama_direksi'           => $post['nama_direksi'],
      'date_pic'               => !empty($post['date_pic']) ? $post['date_pic'] : null,
      'nama_pic'               => $post['nama_pic'],
      'status'                 => $post['status'] ?? 0, // 0=onprogress
      'upload_img'             => $nama_img ?? null,
      'catatan'                => $post['catatan'] ?? null,
      'created_by'             => user()->email,
      'modified_by'            => user()->email,
      'asset_status_awal'      => $asset['status'],
      

    ]);


    if (!$ok) {
      return redirect()->back()->withInput()
        ->with('error', 'Gagal simpan: ' . json_encode($this->transactionModel->errors()));
    }

    $transaksiId = $this->transactionModel->getInsertID();

    try {
      // === 1. Ambil 3 email dari form (dicek ke DB) ===
      $emailKabagAsal   = $this->validateAndGetUserEmail($post['user_kabag_asal'], 'Kabag Asal');
      $emailKabagTujuan = $this->validateAndGetUserEmail($post['user_kabag_tujuan'], 'Kabag Tujuan');
      $emailDireksi     = $this->validateAndGetUserEmail($post['nama_direksi'], 'Direksi');

      // === 2. Ambil 3 email dari permission (otomatis dari DB) ===
      $emailsFinance    = $this->getEmailsByPermission('ack_finance');
      $emailsAccounting = $this->getEmailsByPermission('ack_accounting');
      $emailsControlling = $this->getEmailsByPermission('ack_controlling');

      // === 3. Gabung semua email & hapus duplikat ===
      $penerima = array_unique([
        // $emailKabagAsal,
        // $emailKabagTujuan,
        // $emailDireksi,
        // ...$emailsFinance,
        // ...$emailsAccounting,
        // ...$emailsControlling
      ]);

      // === 4. Kirim email ke semua ===
      foreach ($penerima as $email) {
        if (!empty($email)) {
          $this->kirimEmailNotifikasi($email, $transaksiId);
        }
      }
      return redirect()->to('/transaksi')
        ->with('pesan', 'Transaksi disimpan & email dikirim ke ' . count($penerima) . ' penerima.');
    } catch (\Exception $e) {
      log_message('error', 'Gagal kirim email: ' . $e->getMessage());
      return redirect()->to('/transaksi')
        ->with('warning', 'Data disimpan, tapi gagal kirim email: ' . $e->getMessage());
    }

    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan & email terkirim');
    // $transaksiId = $this->transactionModel->getInsertID();

    return redirect()->to('/transaksi');
  }

  ////==============kirim email=============//
  // private function sendEmail($to, $id, $message = '', $attachment = null)
  // {
  //   $email = \Config\Services::email();

  //   $link = base_url("transaksi/edit/{$id}");

  //   if (empty($message)) {
  //     $message = "Klik link berikut untuk melakukan Approval Transaksi Asset:<br>
  //                   <a href='{$link}' style='color: #007bff; font-weight: bold;'>{$link}</a><br><br>";
  //   }
  //   $email->setFrom('noreplyemailtojmi@gmail.com', 'Asset Management System');
  //   $email->setTo($to);
  //   $email->setSubject('Approval Transaksi Asset');
  //   $email->setMessage($message);

  //   // Jika ada attachment dan valid
  //   if ($attachment && is_file($attachment)) {
  //     $email->attach($attachment);
  //   }

  //   if (!$email->send()) {
  //     log_message('error', 'Gagal kirim email ke: ' . $to . ' | Error: ' . $email->printDebugger(['headers']));
  //     return false;
  //   }

  //   return true;
  // }

  private function validateAndGetUserEmail(int|string $userId, string $role): string
  {
    $user = $this->userModel->find($userId);

    if (!$user) {
      throw new \Exception("{$role} dengan ID {$userId} tidak ditemukan.");
    }

    if (empty($user->email)) {
      throw new \Exception("{$role} ({$user->fullname}) tidak memiliki email.");
    }

    if ($user->active != 1) {
      throw new \Exception("{$role} ({$user->fullname}) tidak aktif.");
    }
    return $user->email; // ✅ AMAN — dari database, bukan dari form!
  }
  private function getEmailsByPermission(string $permissionName): array
  {
    $permission = model('PermissionModel')->where('name', $permissionName)->first();

    if (!$permission) {
      log_message('error', "Permission '{$permissionName}' tidak ditemukan.");
      return [];
    }

    $users = $this->userModel
      ->select('users.email, users.fullname')
      ->join('auth_users_permissions', 'auth_users_permissions.user_id = users.id')
      ->where('auth_users_permissions.permission_id', $permission->id)
      ->where('users.active', 1)
      ->where('users.email IS NOT NULL')
      ->findAll();

    return array_column($users, 'email'); // kembalikan array email
  }
  /**
   * Kirim email notifikasi
   */
  private function kirimEmailNotifikasi(string $to, int $transaksiId): bool
  {
    $email = \Config\Services::email();

    // 🔍 Ambil data transaksi + aset terkait
    $transaksi = $this->transactionModel->baseRelasi()->find($transaksiId);
    if (!$transaksi) {
      log_message('error', "Transaksi ID {$transaksiId} tidak ditemukan saat kirim email.");
      return false;
    }

    // Ambil no_asset dan nama_asset
    $noAsset = $transaksi['no_asset'] ?? '–';
    $namaAsset = $transaksi['nama_asset'] ?? '–';

    $link = base_url("transaksi/edit/{$transaksiId}");

    $message = "
        <h3>Notifikasi Transaksi Baru</h3>
        <p>Halo,</p>
        <p>Anda menerima notifikasi transaksi baru untuk aset berikut:</p>
        <ul>
            <li><strong>No. Aset:</strong> {$noAsset}</li>
            <li><strong>Nama Aset:</strong> {$namaAsset}</li>
        </ul>
        <p><strong>Klik link berikut untuk approval:</strong><br>
        <a href='{$link}'>
            Lihat Transaksi #{$transaksiId}
        </a></p>
        <p><em>Sistem Asset Management</em></p>
    ";

    $email->setFrom('noreplyemailtojmi@gmail.com', 'Asset Management System');
    $email->setTo($to);
    $email->setSubject('Approval Transaksi #' . $transaksiId);
    $email->setMessage($message);

    if (!$email->send()) {
      $error = $email->printDebugger(['headers']);
      log_message('error', "Gagal kirim ke {$to}: {$error}");
      return false;
    }

    return true;
  }




  public function edit($id)
  {


    $data = [
      'title'         => 'Approval | Asset Management System',
      'validation'    => \Config\Services::validation(),
      'transaksi'     => $this->transactionModel->baseRelasi()->find($id),
      'plants'        => $this->plantModel->select('id_plant, nama_plant')->orderBy('nama_plant')->findAll(),
      'cost_center'   => $this->costcenterModel->select('id_cost_center, nama_cost_center')->orderBy('nama_cost_center')->findAll(),
      'user'          => user(),
      // 'assets'        => $this->assetModel->findAll(),


    ];
    return view('transaksi/edit', $data);
  }

  // public function update($id)
  // {

  //   $data = $this->request->getPost();
  //   // dd($data);   
  //   // $existing = $this->transactionModel->find($id);

  //   // $rules[
  //   //   ''
  //   // ]

  //   // if (!$this->validateData($data,$rules)) {
  //   //   # code...
  //   // }

  //   $this->transactionModel->save([

  //     'id_transaksi'        => $id,
  //     // 'alasan'              => $existing['alasan'],
  //     'date_ttd_asal'       => !empty($data['date_ttd_asal']) ? $data['date_ttd_asal'] : null,
  //     'user_kabag_asal'     => $data['user_kabag_asal'],

  //     'date_ttd_tujuan'     => !empty($data['date_ttd_tujuan']) ? $data['date_ttd_tujuan'] : null,
  //     'user_kabag_tujuan'   => $data['user_kabag_tujuan'],
  //     'date_pic'            => !empty($data['date_pic']) ? $data['date_pic'] : null,
  //     'nama_pic'            => $data['nama_pic'],
  //     'date_direksi'        => !empty($data['date_direksi']) ? $data['date_direksi'] : null,
  //     'nama_direksi'        => $data['nama_direksi'],
  //     'date_ack_fin'        => !empty($data['date_ack_fin']) ? $data['date_ack_fin'] : null,
  //     'date_ack_acc'        => !empty($data['date_ack_acc']) ? $data['date_ack_acc'] : null,
  //     'date_ack_ctrl'       => !empty($data['date_ack_ctrl']) ? $data['date_ack_ctrl'] : null,
  //     // 'nama_direksi'        => $data['nama_direksi'],
  //     // 'nama_direksi'        => $data['nama_direksi'],
  //     // 'nama_direksi'        => $data['nama_direksi'],

  //   ]);



  //   session()->setFlashdata('pesan', 'Data berhasil Ditambahkan');
  //   return redirect()->to('/transaksi');
  // }
  private function isApprovalComplete($transaksi)
  {
    $required = [
      'date_ttd_asal',
      'date_ttd_tujuan',
      'date_pic',
      'date_direksi',
      'date_ack_fin',
      'date_ack_acc',
      'date_ack_ctrl',
    ];

    foreach ($required as $field) {
      if (empty($transaksi[$field])) {
        return false;
      }
    }
    return true;
  }

  // ✅ TAMBAHAN: Update data aset jika transaksi adalah mutasi
  private function updateAssetAfterMutation($transaksi)
  {
    $assetModel = new AssetModel();
    $idAsset = $transaksi['id_asset'];

    // 🔍 Ambil data LAMA dari database SEBELUM diubah
    $dataLama = $assetModel->find($idAsset);
    if (!$dataLama) {
      log_message('error', "Asset ID {$idAsset} tidak ditemukan saat update after mutation.");
      return;
    }

    // Siapkan data BARU
    if ($transaksi['transaksi'] == '3') {
      $dataBaru = [
        'id_plant'         => $transaksi['id_plant_baru'],
        'id_cost_center'   => $transaksi['id_cost_center_baru'],
      ];
    } else {
      $dataBaru = [
        'status' => $transaksi['transaksi']
      ];
    }

    // 🔥 Lakukan update ke database
    $assetModel->update($idAsset, $dataBaru);

    // 🔥 LOG PERUBAHAN
    $this->logAssetChange($idAsset, array_merge($dataLama, $dataBaru), $dataLama);
  }

  // ✅ MODIFIKASI: Fungsi update() dengan tambahan otomatisasi
  public function update($id)
  {
    $data = $this->request->getPost();
    $transaksiLama = $this->transactionModel->find($id);

    if (!$transaksiLama) {
      session()->setFlashdata('error', 'Transaksi tidak ditemukan.');
      return redirect()->to('/transaksi');
    }

    // Siapkan data untuk disimpan
    $updateData = [
      'id_transaksi'        => $id,
      'date_ttd_asal'       => !empty($data['date_ttd_asal']) ? $data['date_ttd_asal'] : null,
      // 'user_kabag_asal'     => $data['user_kabag_asal'],
      'date_ttd_tujuan'     => !empty($data['date_ttd_tujuan']) ? $data['date_ttd_tujuan'] : null,
      // 'user_kabag_tujuan'   => $data['user_kabag_tujuan'],
      'date_pic'            => !empty($data['date_pic']) ? $data['date_pic'] : null,
      // 'nama_pic'            => $data['nama_pic'],
      'date_direksi'        => !empty($data['date_direksi']) ? $data['date_direksi'] : null,
      // 'nama_direksi'        => $data['nama_direksi'],
      'date_ack_fin'        => !empty($data['date_ack_fin']) ? $data['date_ack_fin'] : null,
      'date_ack_acc'        => !empty($data['date_ack_acc']) ? $data['date_ack_acc'] : null,
      'date_ack_ctrl'       => !empty($data['date_ack_ctrl']) ? $data['date_ack_ctrl'] : null,
    ];

    // Simpan perubahan approval
    $this->transactionModel->save($updateData);

    // Ambil data terbaru setelah update
    $transaksiBaru = $this->transactionModel->find($id);

    // ✅ Cek apakah semua approval sudah lengkap
    if ($this->isApprovalComplete($transaksiBaru)) {
      // Ubah status ke "Complete"
      $this->transactionModel->update($id, ['status' => 2]);

      // Update data aset jika mutasi
      $this->updateAssetAfterMutation($transaksiBaru);

      session()->setFlashdata('pesan', 'Semua approval selesai! Data aset berhasil diperbarui.');
    } else {
      session()->setFlashdata('pesan', 'Approval berhasil disimpan.');
    }

    return redirect()->to('/transaksi');
  }

  //======================================cancel==========
  public function cancel()
  {
    $id = $this->request->getPost('id_transaksi');
    $catatan = $this->request->getPost('catatan_pembatalan');

    if (!$id) {
      return redirect()->back()->with('error', 'ID transaksi tidak ditemukan.');
    }

    $transaksi = $this->transactionModel->find($id);
    if (!$transaksi) {
      return redirect()->back()->with('error', 'Transaksi tidak ditemukan.');
    }

    if ($transaksi['status'] == '3') {
      return redirect()->back()->with('error', 'Transaksi sudah dibatalkan.');
    }

    if ($transaksi['status'] != '2') {
      return redirect()->back()->with('error', 'Hanya transaksi yang sudah selesai bisa dibatalkan.');
    }

    $assetModel = new AssetModel();
    $idAsset = $transaksi['id_asset'];

    // 🔍 Ambil data aset SAAT INI (ini adalah "nilai lama" untuk log)
    $dataLama = $assetModel->find($idAsset);
    if (!$dataLama) {
      return redirect()->back()->with('error', 'Aset tidak ditemukan.');
    }

    // Siapkan data yang akan dikembalikan (nilai baru setelah cancel)
    if ($transaksi['transaksi'] == '3') {
      $dataBaru = [
        'id_plant'         => $transaksi['id_plant_asal'],
        'id_cost_center'   => $transaksi['id_cost_center_asal'],
      ];
    } else {
      $dataBaru = [
        'status' => $transaksi['asset_status_awal'],
      ];
    }

    // 🔁 Lakukan update ke aset
    $assetModel->update($idAsset, $dataBaru);

    // 🔥 LOG PERUBAHAN SAAT PEMBATALAN
    $this->logAssetChangeOnCancel($idAsset, $dataBaru, $dataLama);

    // 🚫 Batalkan transaksi
    $this->transactionModel->update($id, [
      'status'                => '3',
      'dibatalkan_oleh'       => user_id(),
      'dibatalkan_at'         => date('Y-m-d H:i:s'),
      'catatan_pembatalan'    => $catatan,
    ]);

    session()->setFlashdata('pesan', 'Transaksi berhasil dibatalkan. Status aset dikembalikan ke kondisi sebelumnya.');
    return redirect()->to('/transaksi');
  }

  public function delete($id)
  {
    $transaksi = $this->transactionModel->find($id);
    //hapus gambar 
    if ($transaksi['upload_img'] != 'logo-jmi.png') {
      # code...
      unlink('img/' . $transaksi['upload_img']);
    }
    $this->transactionModel->delete($id);
    session()->setFlashdata('pesan', 'Data berhasil dihapus');
    return redirect()->to('/transaksi');
  }

  // public function cancel()
  // {
  //   $id = $this->request->getPost('id_transaksi');
  //   $catatan = $this->request->getPost('catatan_pembatalan');

  //   if (!$id) {
  //     return redirect()->back()->with('error', 'ID transaksi tidak ditemukan.');
  //   }

  //   $transaksi = $this->transactionModel->find($id);
  //   if (!$transaksi) {
  //     return redirect()->back()->with('error', 'Transaksi tidak ditemukan.');
  //   }
  //   dd($transaksi); // ← Uncomment untuk cek


  //   if ($transaksi['status'] == '3') { // Dibatalkan
  //     return redirect()->back()->with('error', 'Transaksi sudah dibatalkan.');
  //   }
  //   // dd($transaksi['status'], ge  ttype($transaksi['status']));


  //   if ($transaksi['status'] != '2') {
  //     return redirect()->back()->with('error', 'Hanya transaksi yang sudah selesai bisa dibatalkan.');
  //   }

  //   // 🔁 Kembalikan data aset
  //   $assetModel = new AssetModel();

  //   // Data yang akan dikembalikan
  //   $dataUpdate = [];

  //   // Jika transaksi MUTASI → kembalikan plant & cost center
  //   if ($transaksi['transaksi'] == '3') {
  //     $dataUpdate = [
  //       'id_plant'         => $transaksi['id_plant_asal'],
  //       'id_cost_center'   => $transaksi['id_cost_center_asal'],
  //       // tambahkan lokasi lain jika perlu
  //     ];
  //   }
  //   // Jika BUKAN mutasi → kembalikan STATUS
  //   else {
  //     $dataUpdate = [
  //       'status' => $transaksi['status_sebelum'], // 🔥 Kembali ke status sebelum transaksi
  //     ];
  //   }

  //   // Update aset
  //   $assetModel->update($transaksi['id_asset'], $dataUpdate);

  //   // 🚫 Batalkan transaksi
  //   $this->transactionModel->update($id, [
  //     'status'                => '3', // Dibatalkan
  //     'dibatalkan_oleh'       => user_id(),
  //     'dibatalkan_at'         => date('Y-m-d H:i:s'),
  //     'catatan_pembatalan'    => $catatan,
  //   ]);

  //   session()->setFlashdata('pesan', 'Transaksi berhasil dibatalkan. Status aset dikembalikan ke kondisi sebelumnya.');
  //   return redirect()->to('/transaksi');
  // }
  // app/Controllers/TransaksiController.php
  private function logAssetChange($id_asset, $dataBaru, $dataLama)
  {
    $user = user()->email ?: 'System';
    $waktu = date('Y-m-d H:i:s');

    $fieldsToLog = [
      'id_plant',
      'id_cost_center',
      // tambahkan lainnya jika perlu: 'status', dll
    ];

    foreach ($fieldsToLog as $field) {
      $nilaiLama = $dataLama[$field] ?? null;
      $nilaiBaru = $dataBaru[$field] ?? null;

      if ($nilaiLama !== $nilaiBaru) {
        // Pastikan logModel tersedia
        $logModel = model('App\Models\LogModel'); // sesuaikan nama model logmu

        $logModel->insert([
          'id_asset' => $id_asset,
          'kolom_yang_diubah' => $field,
          'nilai_lama' => $nilaiLama,
          'nilai_baru' => $nilaiBaru,
          'waktu_perubahan' => $waktu,
          'diubah_oleh' => $user,
          'aksi' => 'UPDATE'
        ]);
      }
    }
  }
  private function logAssetChangeOnCancel(int $id_asset, array $dataBaru, array $dataLama)
  {
    $user = user()->email ?: 'System';
    $waktu = date('Y-m-d H:i:s');

    // Kolom yang mungkin berubah saat cancel
    $fieldsToLog = [
      'id_plant',
      'id_cost_center',
      'status'
    ];

    // Load model log — sesuaikan dengan nama model logmu
    $logModel = model('App\Models\LogModel'); // 👈 GANTI SESUAI NAMA MODEL LOGMU

    foreach ($fieldsToLog as $field) {
      $nilaiLama = $dataLama[$field] ?? null;
      $nilaiBaru = $dataBaru[$field] ?? null;

      // Hanya log jika benar-benar berbeda
      if ($nilaiLama !== $nilaiBaru) {
        $logModel->insert([
          'id_asset'          => $id_asset,
          'kolom_yang_diubah' => $field,
          'nilai_lama'        => $nilaiLama,
          'nilai_baru'        => $nilaiBaru,
          'waktu_perubahan'   => $waktu,
          'diubah_oleh'       => $user,
          'aksi'              => 'CANCEL' // atau 'UPDATE', terserah kebijakanmu
        ]);
      }
    }
  }
  public function testKirim7Email()
  {
    // Daftar 7 email penerima (bisa ganti sesuai kebutuhan)
    $penerima = [
      'afinzdi@gmail.com',
      'sap.care@onemed.co.id',
      'nsyafriska@gmail.com',
      'rahmahdiandian@gmail.com',
      'dept.it@gmail.com',
      '221080200145@umsida.ac.id',
      '221080200136@umsida.ac.id'
    ];

    $subject = 'Test Kirim 7 Email - ' . date('Y-m-d H:i:s');
    $message = '<h3>Ini email test</h3><p>Dikirim pada: ' . date('Y-m-d H:i:s') . '</p>';

    // Mulai hitung waktu
    $start = microtime(true);

    $berhasil = 0;
    $gagal = 0;

    foreach ($penerima as $email) {
      if ($this->kirimEmailTest($email, $subject, $message)) {
        $berhasil++;
      } else {
        $gagal++;
      }
    }

    $end = microtime(true);
    $waktu = number_format($end - $start, 2);

    // Tampilkan hasil langsung di browser
    echo "<h1>📧 HASIL TEST KIRIM 7 EMAIL</h1>";
    echo "<p><strong>✅ Berhasil:</strong> {$berhasil}</p>";
    echo "<p><strong>❌ Gagal:</strong> {$gagal}</p>";
    echo "<p><strong>⏱️ Waktu:</strong> {$waktu} detik</p>";
    echo "<p><a href='/test-email'>🔁 Coba Lagi</a></p>";
  }

  private function kirimEmailTest($to, $subject, $message)
  {
    $email = \Config\Services::email();

    $email->setFrom('noreplyemailtojmi@gmail.com', 'Test System');
    $email->setTo($to);
    $email->setSubject($subject);
    $email->setMessage($message);

    return $email->send();
  }
}
