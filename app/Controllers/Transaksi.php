<?php

namespace App\Controllers;

use App\Models\AssetModel;


class Transaksi extends BaseController
{
    protected $assetModel;

    public function __construct()
    {
        $this->assetModel = new AssetModel();
    }
    public function index(): string
    {
        // pr untuk data yang di load
        $asset = $this->assetModel->getWithRelasi();


        $data = [
            'title' => 'Perpindahan Asset | Asset Managed',
            'asset' => $asset,
            'no_asset' => $this->assetModel->select('no_asset')->findAll()

        ];
        return view('transaksi/index', $data);
    }
    public function cari()
    {
        $noasset = $this->request->getGet('no_asset');
        $asset = $this->assetModel->getWithRelasiByNoAsset($noasset);

        if (!$asset) {

            return $this->response->setJSON([
                'status' => false,
                'message' => 'asset tidak ditemukan.'
            ]);
        }
        return $this->response->setJSON(
            [
                'status' => true,
                'data'  => '$asset',
            ]
        );
    }
}
