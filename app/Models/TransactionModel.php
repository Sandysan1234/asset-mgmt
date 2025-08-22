<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'id_asset',
        'transaksi',
        'tgl_transaksi',
        'alasan',
        'id_plant_asal',
        'id_cost_center_asal',
        'id_plant_baru',
        'id_cost_center_baru',
        'id_lokasi_area_baru',
        'id_lokasi_gedung_baru',
        'id_lokasi_lantai_baru',
        'status',
        'date_ttd_asal',
        'user_kabag_asal',
        
        'date_ttd_tujuan',
        'user_kabag_tujuan',
        'date_pic',
        'nama_pic',
        'date_direksi',
        'nama_direksi',

        'date_ack_fin',
        'date_ack_acc',
        'date_ack_ctrl',
        'created_by'

    ];

    // contoh helper query dasar (tanpa join approval)
    public function baseRelasi()
    {
        return $this->select("
            transaksi.*,
            a.no_asset,
            a.sub_asset,
            a.nama_asset,
            a.merek,
            a.spek,
            a.tgl_perolehan,
            ac.nama_assetclass,
            p_from.nama_plant   AS plant_asal,
            p_to.nama_plant     AS plant_tujuan,
            cc_from.nama_cost_center AS cost_center_asal,
            cc_to.nama_cost_center   AS cost_center_tujuan
        ")
            ->join('asset a', 'a.id_asset = transaksi.id_asset', 'left')
            ->join('assetclass ac', 'ac.id_assetclass = a.id_assetclass', 'left')  
            ->join('plant p_from', 'p_from.id_plant = transaksi.id_plant_asal', 'left')
            ->join('plant p_to',   'p_to.id_plant   = transaksi.id_plant_baru', 'left')
            ->join('cost_center cc_from', 'cc_from.id_cost_center = transaksi.id_cost_center_asal', 'left')
            ->join('cost_center cc_to',   'cc_to.id_cost_center   = transaksi.id_cost_center_baru', 'left');
    }
}
