<?php

namespace App\Models;

use CodeIgniter\Model;

class AssetlogModel extends Model
{
    protected $table          = 'asset_log';
    protected $primaryKey     = 'log_id';
    protected $useTimestamps  = true;
    // protected $allowedFields  = ['id_asset', 'kolom_yang_diubah', 'nilai_lama', 'nilai_baru','waktu_perubahan','diubah_oleh','aksi'];
    protected $useSoftDeletes = true;
    public function getLogsWithAssetName()
    {
        return $this->select('
            asset_log.*,
            asset.nama_asset
        ')
            ->join('asset', 'asset.id_asset = asset_log.id_asset', 'left')
            ->findAll();
    }

    /**
     * Ambil satu log berdasarkan ID, dengan nama_asset
     */
    public function getLogWithAssetName($id)
    {
        return $this->select('
            asset_log.*,
            asset.nama_asset
        ')
            ->join('asset', 'asset.id_asset = asset_log.id_asset', 'left')
            ->find($id);
    }
}
