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
      'validation' =>  \Config\Services::validation()
    ];

    return view('plant/create', $data);
  }

  // ===============save======//
  public function save()
  {
    $data = $this->request->getPost();

    if (!$this->validateData($data, [
      'kode_plant'    => [
        'label'             => 'Kode Plant',
        'rules'             => 'required|is_unique[plant.kode_plant]',
        'errors'            => [
          'required'        => '{field} harus diisi',
          'is_unique'       => '{field} sudah terdafar'
        ]
      ],
      'nama_plant'    =>  [
        'label'             => 'Nama Plant',
        'rules'             => 'required',
        'errors'             => [
          'required'        => '{field} harus diisi',

        ]
      ],
      'alamat' => [
        'label'   => 'Alamat',
        'rules'   => 'required',
        'errors'  => [
          'required' => '{field} harus diisi',
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
      'alamat'            => $this->request->getPost('alamat'),
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


  public function edit($id)
  {
    $data = [
      'title'   => 'Form Tambah Data Plant | Asset Managed',
      'validation' =>  \Config\Services::validation(),
      'plant'      => $this->plantModel->find($id),
    ];
    return view('plant/edit', $data);
  }


  public function update($id)
  {
    $data = $this->request->getPost();

    if (!$this->validateData($data, [
      'kode_plant'    => [
        'label'             => 'Kode Plant',
        'rules'             => 'required|is_unique[plant.kode_plant,id_plant,' . $id . ']',
        'errors'            => [
          'required'        => '{field} harus diisi',
          'is_unique'       => '{field} sudah terdafar'
        ]
      ],
      'nama_plant'    =>  [
        'label'             => 'Nama Plant',
        'rules'             => 'required|is_unique[plant.nama_plant,id_plant,' . $id . ']',
        'errors'             => [
          'required'        => '{field} harus diisi',
          'is_unique'       => '{field} sudah terdafar'
        ]
      ],
      'alamat' => [
        'label'   => 'Alamat',
        'rules'   => 'required',
        'errors'  => [
          'required' => '{field} harus diisi',
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
      return redirect()->to('/plant/edit/' . $id)->withInput();
    }

    $this->plantModel->save([
      'id_plant'          => $id,
      'kode_plant'        => $this->request->getPost('kode_plant'),
      'nama_plant'        => $this->request->getPost('nama_plant'),
      'alamat'            => $this->request->getPost('alamat'),
      'status'            => $this->request->getPost('status'),
    ]);
    session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
    return redirect()->to('/plant');
  }
}
