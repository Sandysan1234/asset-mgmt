<?php

namespace App\Controllers;

use App\Models\PlantModel;
use PhpParser\Node\Expr\FuncCall;

class Plant extends BaseController
{
  protected $plantModel;

  public function __construct()
  {
    $this->plantModel = new PlantModel();
  }


  public function index()
  {
    $plant = $this->plantModel->findAll();
    $data = [
      'title'     => 'Plant | Asset Managed',
      'plant' => $plant,
    ];
    return view('plant/index', $data);
  }
  // ===============create======//

  public function create()
  {
    $data = [
      'title'      => 'Form Tambah Data Plant | Asset Managed',
      'validation' => session('validation') ?? \Config\Services::validation()
    ];

    return view('plant/create', $data);
  }

  // ===============save======//
  public function save()
  {
    $data = $this->request->getPost();

    if (!$this->validateData($data, [
      'kode_plant'    => [
        'label'             => 'Kode Cost Center',
        'rules'             => 'required|is_unique[plant.kode_plant]',
        'errors'            => [
          'required'        => '{field} harus diisi',
          'is_unique'       => '{field} sudah terdafar'
        ]
      ],
      'nama_plant'    =>  [
        'label'             => 'Nama Cost Center',
        'rules'             => 'required|is_unique[plant.nama_plant]',
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
      return redirect()->to('/plant/create')->withInput();
    }

    $this->plantModel->save([
      'kode_plant'        => $this->request->getPost('kode_plant'),
      'nama_plant'        => $this->request->getPost('nama_plant'),
      'status'            => $this->request->getPost('status'),
    ]);
    session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
    return redirect()->to('/plant');
  }

  //===========delete===========
  public function delete($id)
  {
    $this->plantModel->delete($id);
    session()->setFlashdata('pesan', 'Data berhasil dihapus');
    return redirect()->to('/plant');
    
  }
}
