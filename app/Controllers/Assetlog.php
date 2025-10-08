<?php

namespace App\Controllers;

use App\Models\AssetlogModel;

class Assetlog extends BaseController
{
  protected $assetlogModel;
  public function __construct()
  {
    $this->assetlogModel = new AssetlogModel();
  }


  public function index()
  {
    $assetlogs = $this->assetlogModel->getLogsWithAssetName();
    $data = [
      'title'     => 'Asset Log | Asset Management System',
      'assetlogs'  => $assetlogs,

    ];
    
    return view('assetlog/index', $data);
  }

  // public function create()
  // {
  //   $data = [
  //     'title'      => 'Form Tambah Data lifetime | Asset Management System',
  //     'validation' =>  \Config\Services::validation()
  //   ];

  //   return view('lifetime/create', $data);
  // }
  // public function save()
  // {
  //   $data = $this->request->getPost();

  //   if (!$this->validateData($data, [
  //     // 'kode_lifetime'     => [
  //     //   'label'         => 'Kode Lifetime',
  //     //   'rules'         => 'required|is_unique[lifetime.kode_lifetime]',
  //     //   'errors'        => [
  //     //     'required'  => '{field} harus diisi',
  //     //     'is_unique' => '{field} harus diisi'
  //     //   ]
  //     // ],
  //     'masa_berlaku'      => [
  //       'label'         => 'Masa Berlaku',
  //       'rules'         => 'required|integer',
  //       'errors'        => [
  //         'required'  => '{field} harus diisi',
  //         'integer'   => '{field} harus angka'
  //       ]
  //     ],
  //     'status'      => [
  //       'label'         => 'Status',
  //       'rules'         => 'required',
  //       'errors'        => [
  //         'required'  => '{field} harus diisi',
  //       ]
  //     ],
  //   ])) {
  //     return redirect()->to('/lifetime/create')->withInput();
  //   }
  //   $this->assetlogModel->save([
  //     'kode_lifetime'     => $this->request->getPost('kode_lifetime'),
  //     'masa_berlaku'      => $this->request->getPost('masa_berlaku'),
  //     'status'            => $this->request->getPost('status')
  //   ]);
  //   session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
  //   return redirect()->to('lifetime');
  // }

  // public function delete($id)
  // {
  //   $this->assetlogModel->delete($id);
  //   session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
  //   return redirect()->to('/lifetime');
  // }

  // public function edit($id)
  // {
  //   $data = [
  //     'title' => 'Form Ubah Data Lifetime | Asset Management System',
  //     'validation' => \Config\services::validation(),
  //     'lifetime'   => $this->assetlogModel->find($id),
  //   ];
  //   return view('lifetime/edit', $data);
  // }
  // public function update($id)
  // {
  //   $data = $this->request->getPost();

  //   if (!$this->validateData($data, [
  //     // 'kode_lifetime'     => [
  //     //   'label'         => 'Kode Lifetime',
  //     //   'rules'         => 'required|is_unique[lifetime.kode_lifetime,id_lifetime,' . $id . ']',
  //     //   'errors'        => [
  //     //     'required'  => '{field} harus diisi',
  //     //     'is_unique' => '{field} harus diisi'
  //     //   ]
  //     // ],
  //     'masa_berlaku'      => [
  //       'label'         => 'Masa Berlaku',
  //       'rules'         => 'required|integer',
  //       'errors'        => [
  //         'required'  => '{field} harus diisi',
  //         'integer'   => '{field} harus angka'
  //       ]
  //     ],
  //     'status'      => [
  //       'label'         => 'Status',
  //       'rules'         => 'required',
  //       'errors'        => [
  //         'required'  => '{field} harus diisi',
  //       ]
  //     ],
  //   ])) {
  //     return redirect()->to('/lifetime/create/' . $id)->withInput();
  //   }
  //   $this->assetlogModel->save([
  //     'id_lifetime'       => $id,
  //     // 'kode_lifetime'     => $this->request->getPost('kode_lifetime'),
  //     'masa_berlaku'      => $this->request->getPost('masa_berlaku'),
  //     'status'            => $this->request->getPost('status'),
  //     'modified_by'            => user()->email,
  //   ]);
  //   session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
  //   return redirect()->to('lifetime');
  // }
}
