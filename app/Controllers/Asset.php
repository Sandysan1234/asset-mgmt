<?php

namespace App\Controllers;

use App\Models\AssetModel;
use App\Models\PlantModel;
use App\Models\PemasokModel;
use App\Models\CostcenterModel;
use App\Models\AssetclassModel;
use App\Models\LifetimeModel;
use App\Models\LocationModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\PermissionModel;


use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\QrCode;



use PhpParser\Node\Expr\FuncCall;



class Asset extends BaseController
{
  protected $assetModel;
  protected $pemasokModel;
  protected $assetclassModel;
  protected $costcenterModel;
  protected $locationModel;
  protected $plantModel;
  protected $lifetimeModel;
  protected $userModel;
  protected $groupModel;
  protected $permissionModel;




  public function __construct()
  {
    $this->assetModel = new AssetModel();
    $this->plantModel       = new PlantModel();
    $this->pemasokModel      = new PemasokModel();
    $this->costcenterModel  = new CostcenterModel();
    $this->assetclassModel  = new AssetClassModel();
    $this->lifetimeModel    = new LifetimeModel();
    $this->locationModel    = new LocationModel();
    $this->userModel    = new UserModel();
    $this->groupModel    = new GroupModel();
    $this->permissionModel    = new PermissionModel();
  }


  public function index()
  {
    // $asset = $this->assetModel->getWithRelasi();
    // $data = [
    //   'title'     => 'Asset | Asset Management System',
    //   'asset' => $asset,
    // ];
    return view('asset/index', [
      'title'     => 'Asset | Asset Management System',
    ]);
  }
  // Endpoint server-side DataTables
  public function dt()
  {
    $req  = $this->request->getGet();
    $draw = (int)($req['draw'] ?? 1);

    try {
      $data  = $this->assetModel->dtData($req);
      $total = $this->assetModel->dtCountAll();
      $filt  = $this->assetModel->dtCountFiltered($req);

      return $this->response->setJSON([
        'draw' => $draw,
        'recordsTotal' => $total,
        'recordsFiltered' => $filt,
        'data' => $data
      ]);
    } catch (\Throwable $e) {
      // kirim pesan error ke client untuk dilihat di Network -> Response
      return $this->response->setStatusCode(500)->setJSON([
        'error' => true,
        'message' => $e->getMessage()
      ]);
    }
  }

  // ===============create======//

  public function create()
  {
    $picGroup = $this->groupModel->where('name', 'pic')->first();
    $picUsers = [];

    if ($picGroup) {

      $picUsers = $this->userModel
        ->select('users.id, users.fullname, users.username, users.email')
        ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
        ->where('auth_groups_users.group_id', $picGroup->id) // pastikan field: group_id
        ->where('users.active', 1) // hanya user aktif
        ->findAll();
    }


    $data = [
      'title'       => 'Form Tambah Data Asset | Asset Management System',
      'validation'  => \Config\Services::validation(),
      'plant'       => $this->plantModel->findAll(),
      'pemasok'     => $this->pemasokModel->findAll(),
      'cost_center' => $this->costcenterModel->findAll(),
      'assetclass'  => $this->assetclassModel->findAll(),
      'lifetime'    => $this->lifetimeModel->findAll(),
      'lokasi_area'      => $this->locationModel->where('jenis_lokasi', 'Area')->findAll(),
      'lokasi_gedung'      => $this->locationModel->where('jenis_lokasi', 'Gedung')->findAll(),
      'lokasi_lantai'      => $this->locationModel->where('jenis_lokasi', 'Lantai')->findAll(),
      'pic_users'       => $picUsers

    ];

    return view('asset/create', $data);
  }

  // ===============save======//
  public function save()
  {
    $data = $this->request->getPost();

    // dd($data);
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
        'rules'               => 'required', //|is_unique[asset.nama_asset]
        'errors'              => [
          'required'        => '{field} harus diisi',
          // 'is_unique'       => '{field} sudah terdafar'
        ]
      ],
      'serial_number' => [
        'label'               => 'Serial Number',
        'rules'               => 'required|is_unique[asset.serial_number]',
        'errors'              => [
          'required'        => '{field} harus diisi',
          'is_unique'       => '{field} sudah terdafar',
          // 'integer'         => '{field} harus angka'
        ]
      ],
      'batch_number' => [
        'label'               => 'Batch Number',
        'rules'               => 'required|is_unique[asset.batch_number]',
        'errors'              => [
          'required'        => '{field} harus diisi',
          'is_unique'       => '{field} sudah terdafar',
          // 'integer'         => '{field} harus angka'
        ]
      ],
      'merek'    =>  [
        'label'               => 'Merek',
        'rules'               => 'required',
        'errors'              => [
          'required'        => '{field} harus diisi',
        ]
      ],
      'spek'    =>  [
        'label'               => 'Spek',
        'rules'               => 'required',
        'errors'              => [
          'required'        => '{field} harus diisi',
        ]
      ],
      'tgl_perolehan' => [
        'label'               => 'Tanggal Perolehan',
        'rules'               => 'required|valid_date',
        'errors'              => [
          'required'        => '{field} harus diisi',
          'valid_date'        => '{field} tidak sesuai'
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
      'id_assetclass' => [
        'label'               => 'Asset Class',
        'rules'               => 'required',
        'errors'              => [
          'required'          => 'Pilih {field} yang sesuai'
        ]
      ],
      'id_cost_center' => [
        'label'               => 'Cost Center',
        'rules'               => 'required',
        'errors'              => [
          'required'          => 'Pilih {field} yang sesuai'
        ]
      ],
      'id_lifetime' => [
        'label'               => 'Masa Berlaku',
        'rules'               => 'required',
        'errors'              => [
          'required'          => 'Pilih {field} yang sesuai'
        ]
      ],
      'id_plant' => [
        'label'               => 'Plant',
        'rules'               => 'required',
        'errors'              => [
          'required'          => 'Pilih {field} yang sesuai'
        ]
      ],
      // 'id_vendor' => [
      //   'label'               => 'Vendor',
      //   'rules'               => 'required',
      //   'errors'              => [
      //     'required'          => 'Pilih {field} yang sesuai'
      //   ]
      // ],
      'id_pic' => [
        'label'               => 'PIC',
        'rules'               => 'required',
        'errors'              => [
          'required'          => 'Pilih {field} yang sesuai'
        ]
      ],
      // 'id_user_asset' => [
      //   'label'               => 'User Asset',
      //   'rules'               => 'required',
      //   'errors'              => [
      //     'required'          => 'Pilih {field} yang sesuai'
      //   ]
      // ],
      'id_lokasi_area' => [
        'label'               => 'Area',
        'rules'               => 'required',
        'errors'              => [
          'required'          => 'Pilih {field} yang sesuai'
        ]
      ],
      'id_lokasi_gedung' => [
        'label'               => 'Gedung',
        'rules'               => 'required',
        'errors'              => [
          'required'          => 'Pilih {field} yang sesuai'
        ]
      ],
      'id_lokasi_lantai' => [
        'label'               => 'Lantai',
        'rules'               => 'required',
        'errors'              => [
          'required'          => 'Pilih {field} yang sesuai'
        ]
      ],


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


    $hargaRaw = $this->request->getPost('harga');
    $harga = (int) str_replace('.', '', $hargaRaw);


    $this->assetModel->save([
      'no_asset'         => $this->request->getPost('no_asset'),
      'sub_asset'        => $this->request->getPost('sub_asset'),
      'nama_asset'       => $this->request->getPost('nama_asset'),
      'serial_number'    => $this->request->getPost('serial_number'),
      'batch_number'     => $this->request->getPost('batch_number'),
      'merek'            => $this->request->getPost('merek'),
      'spek'             => $this->request->getPost('spek'),
      'tgl_perolehan'    => $this->request->getPost('tgl_perolehan'),
      'harga'            => $harga,
      'no_po'            => $this->request->getPost('no_po'),
      'id_assetclass'    => $this->request->getPost('id_assetclass'),
      'id_cost_center'   => $this->request->getPost('id_cost_center'),
      'id_lifetime'      => $this->request->getPost('id_lifetime'),
      'id_vendor'        => $this->request->getPost('id_vendor') ?: null,
      'id_plant'         => $this->request->getPost('id_plant'),
      'id_lokasi_area'   => $this->request->getPost('id_lokasi_area'),
      'id_lokasi_gedung' => $this->request->getPost('id_lokasi_gedung'),
      'id_lokasi_lantai' => $this->request->getPost('id_lokasi_lantai'),
      'id_pic'           => $this->request->getPost('id_pic'),
      'user_asset'       => $this->request->getPost('user_asset') ?: null,
      'status'           => $this->request->getPost('status') ?: 5,
      'modified_by'      => user_id(),
    ]);
    session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
    return redirect()->to('/asset');
  }
  public function delete($id)
  {
    $this->assetModel->delete($id);
    session()->setFlashdata('pesan', 'Data berhasil dihapus');
    return redirect()->to('/asset');
  }

  //===========delete===========
  // public function delete($id)
  // {
  //     $this->assetModel->delete($id);
  //     session()->setFlashdata('pesan', 'Data berhasil dihapus');
  //     return redirect()->to('/asset');
  // }

  public function edit($id)
  {
    $data = [
      'title'        => 'Form Ubah Data Asset',
      'validation'   => \Config\Services::validation(),
      'asset'        => $this->assetModel->find($id),
      'assetclass'   => $this->assetclassModel->findAll(),
      'cost_center'  => $this->costcenterModel->findAll(),
      'lifetime'     => $this->lifetimeModel->findAll(),
      'plant'        => $this->plantModel->findAll(),
      'pemasok'      => $this->pemasokModel->findAll(),
      'lokasi_area'        => $this->locationModel->where('jenis_lokasi', 'Area')->findAll(),
      'lokasi_gedung'      => $this->locationModel->where('jenis_lokasi', 'Gedung')->findAll(),
      'lokasi_lantai'      => $this->locationModel->where('jenis_lokasi', 'Lantai')->findAll(),
    ];
    return view('asset/edit', $data);
  }
  public function update($id)
  {

    $data = $this->request->getPost();
    // dd($data)
    $existing = $this->assetModel->find($id);


    if (!$this->validateData($data, [
      'nama_asset'    =>  [
        'label'               => 'Nama Asset',
        'rules'               => 'required', //|is_unique[asset.nama_asset,id_asset,' . $id . ']
        'errors'              => [
          'required'        => '{field} harus diisi',
        ]
      ],
      'serial_number' => [
        'label'               => 'Serial Number',
        'rules'               => 'required|is_unique[asset.serial_number,id_asset,' . $id . ']',
        'errors'              => [
          'required'        => '{field} harus diisi',
          'is_unique'       => '{field} sudah terdaftar'
        ]
      ],
      'batch_number' => [
        'label'               => 'Batch Number',
        'rules'               => 'required|is_unique[asset.batch_number,id_asset,' . $id . ']',
        'errors'              => [
          'required'        => '{field} harus diisi',
          'is_unique'       => '{field} sudah terdafar',
        ]
      ],
      'merek'    =>  [
        'label'               => 'Merek',
        'rules'               => 'required',
        'errors'              => [
          'required'        => '{field} harus diisi',
        ]
      ],
      'spek'    =>  [
        'label'               => 'Spek',
        'rules'               => 'required',
        'errors'              => [
          'required'        => '{field} harus diisi',
        ]
      ],
      'tgl_perolehan' => [
        'label'               => 'Tanggal Perolehan',
        'rules'               => 'required|valid_date',
        'errors'              => [
          'required'        => '{field} harus diisi',
          'valid_date'        => '{field} tidak sesuai'
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
        'rules'               => 'required|integer',
        'errors'              => [
          'required'        => '{field} harus diisi',
          'integer'         => '{field} harus angka'
        ]
      ],
      'id_assetclass' => [
        'label'               => 'Asset Class',
        'rules'               => 'required',
        'errors'              => [
          'required'          => 'Pilih {field} yang sesuai'
        ]
      ],
      'id_lifetime' => [
        'label'               => 'Masa Berlaku',
        'rules'               => 'required',
        'errors'              => [
          'required'          => 'Pilih {field} yang sesuai'
        ]
      ],
      // 'id_vendor' => [
      //   'label'               => 'Vendor',
      //   'rules'               => 'required',
      //   'errors'              => [
      //     'required'          => 'Pilih {field} yang sesuai'
      //   ]
      // ],


    ])) {
      return redirect()->to('/asset/edit/' . $id)->withInput();
    }

    
    $hargaRaw = $this->request->getPost('harga');
    $harga = (int) str_replace('.', '', $hargaRaw);

    $this->assetModel->save([
      'id_asset'        => $id,
      'no_asset'        => $existing['no_asset'],
      'sub_asset'       => $existing['sub_asset'],
      'nama_asset'      => $this->request->getPost('nama_asset'),
      'serial_number'   => $this->request->getPost('serial_number'),
      'batch_number'    => $this->request->getPost('batch_number'),
      'merek'           => $this->request->getPost('merek'),
      'spek'            => $this->request->getPost('spek'),
      'tgl_perolehan'   => $this->request->getPost('tgl_perolehan'),
      'harga'           => $this->request->getPost('harga'),
      'no_po'           => $this->request->getPost('no_po'),
      'id_assetclass'   => $this->request->getPost('id_assetclass'),
      'id_cost_center'  => $existing['id_cost_center'],
      'id_lifetime'     => $this->request->getPost('id_lifetime'),
      'id_vendor'       => $this->request->getPost('id_vendor'),
      'id_plant'        => $existing['id_plant'],
    ]);



    session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
    return redirect()->to('/asset');
  }
  public function detail($id)
  {

    $asset = $this->assetModel->getWithRelasi($id);
    if (!$asset) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException("Asset dengan ID : $id tidak ditemukan");
    }
    $writer = new PngWriter();
    $qrcode = new QrCode(
      data: base_url('asset/detail/' . $id),
      encoding: new Encoding('UTF-8'),
      errorCorrectionLevel: ErrorCorrectionLevel::Low,
      size: 300,
      margin: 10,
      roundBlockSizeMode: RoundBlockSizeMode::Margin,
      foregroundColor: new Color(0, 0, 0),
      backgroundColor: new Color(255, 255, 255)
    );


    //logo
    $logoPath = FCPATH . 'assets/images/logo-jmi.png';
    $logo = file_exists($logoPath) ? new Logo(
      path: $logoPath,
      resizeToWidth: 50,
      punchoutBackground: true
    ) : null;

    $result = $writer->write($qrcode, $logo, null);
    // $writer->validateResult($result, 'Life is too short to be generating QR codes');
    $dataUri = $result->getDataUri();
    // dd($asset);
    return view('asset/detail', [
      'title' => 'Detail Asset | Asset Management System',
      'asset' => $asset,
      'qr'    => $dataUri,

    ]);


    // $data = [
    //   'title'     => 'Detail | Asset Management System',
    //   'asset' => $asset,
    // ];
    // return view('asset/detail', $data);
  }
}
