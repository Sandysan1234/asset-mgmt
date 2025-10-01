<?php

namespace App\Controllers;

use App\Models\AssetclassModel;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Stmt\Label;


class Assetclass extends BaseController
{
  protected $assetclassModel;

  public function __construct()
  {
    $this->assetclassModel = new AssetclassModel();
  }


  public function index()
  {
    $assetclass = $this->assetclassModel->findAll();
    $data = [
      'title'     => 'Asset Class | Asset Management System',
      'assetclass' => $assetclass,
    ];
    return view('assetclass/index', $data);
  }
  // ===============create======//

  public function create()
  {
    $data = [
      'title'      => 'Form Tambah Data Asset Class | Asset Management System',
      'validation' => \Config\Services::validation()

    ];

    return view('assetclass/create', $data);
  }

  // ===============save======//
  public function save()
  {
    $data = $this->request->getPost();

    if (!$this->validateData($data, [
      'kode_assetclass'    => [
        'label'             => 'Kode Asset Class',
        'rules'             => 'required|is_unique[assetclass.kode_assetclass]',
        'errors'             => [
          'required'        => '{field} harus diisi',
          'is_unique'       => '{field} sudah terdafar'
        ]
      ],
      'nama_assetclass'    =>  [
        'label'             => 'Nama Asset Class',
        'rules'             => 'required|is_unique[assetclass.nama_assetclass]',
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
      return redirect()->to('/assetclass/create')->withInput();
    }

    $this->assetclassModel->save([
      'kode_assetclass'   => $this->request->getPost('kode_assetclass'),
      'nama_assetclass'   => $this->request->getPost('nama_assetclass'),
      'status'            => $this->request->getPost('status'),
    ]);
    session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
    return redirect()->to('/assetclass');
  }

  //===========delete===========
  public function delete($id)
  {
    $this->assetclassModel->delete($id);
    session()->setFlashdata('pesan', 'Data berhasil dihapus');
    return redirect()->to('/assetclass');
  }

  public function edit($id)
  {
    $data = [
      'title'      => 'Form Ubah Data Asset Class',
      'validation' => \Config\Services::validation(),
      'assetclass'      => $this->assetclassModel->find($id),
    ];
    return view('assetclass/edit', $data);
  }
  public function update($id)
  {
    $data = $this->request->getPost();

    if (!$this->validateData($data, [
      'kode_assetclass'  => [
        'label'   => 'Kode Asset Class',
        'rules'   => 'required|is_unique[assetclass.kode_assetclass,id_assetclass,' . $id . ']',
        'errors'  => [
          'required'  => '{field} harus diisi',
          'is_unique' => '{field} sudah terdaftar',
        ]
      ],
      'nama_assetclass'  => [
        'label'   => 'Nama Asset Class',
        'rules'   => 'required|is_unique[assetclass.kode_assetclass,id_assetclass,' . $id . ']',
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
      return redirect()->to('/assetclass/edit/' . $id)->withInput();
    }
    $this->assetclassModel->save(
      [
        'id_assetclass'      => $id,
        'kode_assetclass'    => $this->request->getPost('kode_assetclass'),
        'nama_assetclass'    => $this->request->getPost('nama_assetclass'),
        'status'             => $this->request->getPost('status'),
        'modified_by'        => user()->email, // ✅ AMAN dengan fallback
      ]
    );
    session()->setFlashdata('pesan', 'Data berhasil diubah');
    return redirect()->to('/assetclass');
  }
}
