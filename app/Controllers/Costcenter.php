<?php

namespace App\Controllers;

use App\Models\CostcenterModel;
use PhpParser\Node\Expr\FuncCall;

class Costcenter extends BaseController
{
  protected $costcenterModel;

  public function __construct()
  {
    $this->costcenterModel = new CostcenterModel();
  }


  public function index()
  {
    $costcenter = $this->costcenterModel->findAll();
    $data = [
      'title'     => 'Cost Center | Asset Managed',
      'costcenter' => $costcenter,
    ];
    return view('costcenter/index', $data);
  }
  // ===============create======//

  public function create()
  {
    $data = [
      'title'      => 'Form Tambah Data Cost Center | Asset Managed',
      'validation' => session('validation') ?? \Config\Services::validation()
    ];

    return view('costcenter/create', $data);
  }

  // ===============save======//
  public function save()
  {
    $data = $this->request->getPost();

    if (!$this->validateData($data, [
      'kode_cost_center'    => [
        'label'             => 'Kode Cost Center',
        'rules'             => 'required|is_unique[cost_center.kode_cost_center]',
        'errors'             => [
          'required'        => '{field} harus diisi',
          'is_unique'       => '{field} sudah terdafar'
        ]
      ],
      'nama_cost_center'    =>  [
        'label'             => 'Nama Cost Center',
        'rules'             => 'required|is_unique[cost_center.nama_cost_center]',
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
      return redirect()->to('/costcenter/create')->withInput();
    }

    $this->costcenterModel->save([
      'kode_cost_center'   => $this->request->getPost('kode_cost_center'),
      'nama_cost_center'   => $this->request->getPost('nama_cost_center'),
      'status'            => $this->request->getPost('status'),
    ]);
    session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
    return redirect()->to('/costcenter');
  }

  //===========delete===========
  public function delete($id)
  {
    $this->costcenterModel->delete($id);
    session()->setFlashdata('pesan', 'Data berhasil dihapus');
    return redirect()->to('/costcenter');
    
  }
}
