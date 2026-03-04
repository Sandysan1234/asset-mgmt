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
  // public function detail($id = null)
  // {
  //   if ($id == null) {
  //     return redirect()->to('/assetlog');
  //   }

  //   // Pastikan $id di sini adalah variabel yang dikirim dari URL
  //   $assetlogs = $this->assetlogModel->getLogWithAssetName($id);
  //   $data=[
  //     'title' => 'Asset Log | Asset Management System',
  //     'assetlogs'  => $assetlogs,
  //   ];
  //   return view('assetlog/detail', $data);
  // }
}
