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
        $asset = $this->assetModel->getWithRelasi();

        $data = [
            'title' => 'Perpindahan Asset | Asset Managed',
            'asset' => $asset,
        ];
        return view('transaksi/index', $data);
    }
}
