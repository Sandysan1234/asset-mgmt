<?php

namespace App\Controllers;

use App\Models\AssetModel;

class Hitung extends BaseController
{
    
    protected $assetModel;
    public function __construct()
    {
      $this->assetModel = new AssetModel();
    }
    public function index(): string
    {
        $assets = $this->assetModel->select('id_asset, nama_asset, no_asset, harga')->orderBy('nama_asset', 'ASC')->findAll();
        $data=[
            'title' => 'Hitung Depresiasi Aset',
            'assets' =>   $assets,
        ];
        return view('hitung/index', $data);
    }
    public function getDetail($id = null)
    {
        // if (!$this->request->isAJAX()) {
        //     return $this->response->setStatusCode(403);
        // }

        $asset = $this->assetModel
            ->select('harga, tgl_perolehan')
            ->find($id);

        if ($asset) {
            return $this->response->setJSON([
                'success' => true,
                'data' => $asset
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Aset tidak ditemukan'
        ]);
    }
}