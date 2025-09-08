<?php

namespace App\Models;

use CodeIgniter\Model;

class PerbaikanModel extends Model
{
    protected $table      = 'perbaikan';
    protected $primaryKey = 'id_perbaikan';
    protected $useTimestamps = true;
    protected $allowedFields = ['jenis_perbaikan', 'keterangan', 'biaya', 'teknisi', 'durasi', 'tgl_awal', 'tgl_akhir', 'place', 'status', 'id_asset','modified_by'];
    protected $useSoftDeletes = true;


    public function getAllWithAssetDetail()
    {
        return $this->select("
        perbaikan.*,
        asset.no_asset,
        asset.nama_asset,
        asset.id_cost_center,
        asset.id_plant,
        asset.user_asset,
        asset.id_lifetime,
        asset.id_lokasi_area,
        asset.id_lokasi_gedung,
        asset.id_lokasi_lantai,

        ac.nama_assetclass,
        cc.nama_cost_center,
        p.nama_plant,
        la.nama_lokasi AS lokasi_area,
        lg.nama_lokasi AS lokasi_gedung,
        ll.nama_lokasi AS lokasi_lantai,
    ")
            ->join('asset', 'asset.id_asset = perbaikan.id_asset', 'left')
            ->join('assetclass ac', 'ac.id_assetclass = asset.id_assetclass', 'left')
            ->join('cost_center cc', 'cc.id_cost_center = asset.id_cost_center', 'left')
            ->join('plant p', 'p.id_plant = asset.id_plant', 'left')
            ->join('pemasok v', 'v.id_vendor = asset.id_vendor', 'left')
            ->join('lifetime lf', 'lf.id_lifetime = asset.id_lifetime', 'left')
            ->join('lokasi la', 'la.id_lokasi = asset.id_lokasi_area', 'left')
            ->join('lokasi lg', 'lg.id_lokasi = asset.id_lokasi_gedung', 'left')
            ->join('lokasi ll', 'll.id_lokasi = asset.id_lokasi_lantai', 'left')
            ->join('users pic', 'pic.id = asset.id_pic', 'left')
            ->findAll();
    }
}
