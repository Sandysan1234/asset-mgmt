<?php

namespace App\Controllers;

use App\Models\AssetModel;
use App\Models\AuditEventAssetModel;


class User extends BaseController
{
    protected $assetModel;
    protected $auditEventAssetModel; // 2. Property baru
    public function __construct()
    {
        $this->assetModel = new AssetModel();
        $this->auditEventAssetModel = new AuditEventAssetModel(); 
    }
    public function index(): string
    {
        $db = \Config\Database::connect();
        $total_asset = $db->table('asset')
            ->where('deleted_at', null)
            ->countAllResults();
        $total_transaction = $db->table('transaksi')->where('deleted_at', null)->countAllResults();
        $queryResult = $this->assetModel->getStatusCounts();
        
        $labelMap = [
            1 => 'Penghentian',
            2 => 'Penggabungan',
            3 => 'Mutasi',
            4 => 'Non-Aktif',
            5 => 'Aktif',
        ];
        $colorMap = [
            1 => '#ffc107', // Kuning
            2 => '#6c757d',  // Abu-abu
            3 => '#17a2b8', // Cyan/Biru Muda
            4 => '#dc3545', // Merah
            5 => '#28a745', // Hijau
        ];
        $labels = [];
        $values = [];
        $colors = [];
        foreach ($queryResult as $row) {
            $statusId = (int)$row['status'];
            
            // Ambil label berdasarkan ID, jika tidak ada pakai 'Unknown'
            $labels[] = $labelMap[$statusId] ?? 'Unknown (' . $statusId . ')';
            
            // Ambil jumlah
            $values[] = (int)$row['jumlah'];
            
            // Ambil warna
            $colors[] = $colorMap[$statusId] ?? '#000000';
        }

        $auditResult = $this->auditEventAssetModel->getAuditStatusCounts();

        // SESUAIKAN KEY (Angka sebelah kiri) DENGAN ISI DATABASE KAMU
        $auditLabelMap = [
            'BELUM_AUDIT' => 'Belum Audit',
            'TERVERIFIKASI'    => 'Terverifikasi',
            'HILANG' => 'Hilang',
            'RUSAK' => 'Rusak',
            'TIDAK_TERDAFTAR' => 'Tidak Terdaftar'
        ];

        // Warna untuk Audit
        $auditColorMap = [
            'BELUM_AUDIT' => '#6c757d', // Abu-abu (Belum)
            'TERVERIFIKASI' => '#28a745', // Hijau (Sudah/Aman)
            'HILANG' => '#dc3545', // Merah (Hilang)
            'RUSAK' => '#ffc107', // Kuning/Orange (Tidak Terdaftar)
            'TIDAK_TERDAFTAR' => '#17a2b8', // Kuning/Orange (Tidak Terdaftar)
        ];
        $pindaiLabels = []; $pindaiValues = []; $pindaiColors = [];

        foreach ($auditResult as $row) {
            // Jika di DB kolom status_audit isinya string, hapus (int)
            $auditStatus = $row['status_audit']; 

            $pindaiLabels[] = $auditLabelMap[$auditStatus] ?? 'Unknown Audit (' . $auditStatus . ')';
            $pindaiValues[] = (int)$row['jumlah'];
            $pindaiColors[] = $auditColorMap[$auditStatus] ?? '#000000';
        }
        $data = [
            'title' => 'User | Asset Management System',
            'total_asset' => $total_asset,
            'total_transaction' => $total_transaction,
            'chartData' =>[
                'labels' => $labels,
                'values' => $values,
                'colors' => $colors
            ],
            'pindaiData'=>[
                'labels' => $pindaiLabels,
                'values' => $pindaiValues,
                'colors' => $pindaiColors
            ],
        ];
        return view('user/index', $data);
    }
}




