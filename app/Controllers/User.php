<?php

namespace App\Controllers;

use App\Models\AssetModel;


class User extends BaseController
{
    protected $assetModel;
    public function __construct()
    {
        $this->assetModel = new AssetModel();
    }
    public function index(): string
    {
        $db = \Config\Database::connect();
        $total_asset = $db->table('asset')
            ->where('deleted_at', null)
            ->countAllResults();
        $total_transaction = $db->table('transaksi')->where('deleted_at', null)->countAllResults();
        $chartData = [
            'labels' => ['Mutasi', 'Pelepasan', 'Aktif', 'penggabugan'],
            'values' => [15, 15, 50, 20], // bisa dari database
            'colors' => ['#03d8f9ff', '#ff2200ff', '#4CAF50','#f59c02ff']
        ];
        $pindaiData = [
            'labels' => ['Belum Diaudit', 'Tidak ditemukan', 'Terverifikasi'],
            'values' => [25, 25, 50,], // bisa dari database
            'colors' => ['#03d8f9ff', '#0b0b0bff', '#4CAF50']
        ];

        $data = [
            'title' => 'User | Asset Management System',
            'total_asset' => $total_asset,
            'total_transaction' => $total_transaction,
            'chartData' => $chartData,
            'pindaiData' => $pindaiData,
        ];
        return view('user/index', $data);
    }
}




