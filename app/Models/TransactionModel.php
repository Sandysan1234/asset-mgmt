<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id_asset',
        'tindakan',
        'tgl_tindakan',
        'alasan',
        'id_plant_asal',
        'id_cost_center_asal',
        'id_lokasi_area_asal',
        'id_lokasi_gedung_asal',
        'id_lokasi_lantai_asal',
        'id_plant_baru',
        'id_cost_center_baru',
        'id_lokasi_area_baru',
        'id_lokasi_gedung_baru',
        'id_lokasi_lantai_baru',
        'status',
        'created_by'
    ];

    // contoh helper query dasar (tanpa join approval)
    public function baseRelasi()
    {
        return $this->select("
            asset_transfers.*,
            a.no_asset, a.nama_asset,
            p_from.nama_plant   AS plant_asal,
            p_to.nama_plant     AS plant_tujuan,
            cc_from.nama_cost_center AS cost_center_asal,
            cc_to.nama_cost_center   AS cost_center_tujuan
        ")
            ->join('asset a', 'a.id_asset = asset_transfers.id_asset', 'left')
            ->join('plant p_from', 'p_from.id_plant = asset_transfers.id_plant_asal', 'left')
            ->join('plant p_to',   'p_to.id_plant   = asset_transfers.id_plant_baru', 'left')
            ->join('cost_center cc_from', 'cc_from.id_cost_center = asset_transfers.id_cost_center_asal', 'left')
            ->join('cost_center cc_to',   'cc_to.id_cost_center   = asset_transfers.id_cost_center_baru', 'left');
    }
}
