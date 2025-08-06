<?php

namespace App\Models;

use CodeIgniter\Model;

class AssetModel extends Model
{
  protected $table      = 'asset';
  protected $primaryKey = 'id_asset';
  protected $useTimestamps = true;
  protected $useSoftDeletes = true;
  protected $allowedFields = [
    'no_asset',
    'sub_asset',
    'nama_asset',
    'serial_number',
    'batch_number',
    'merek',
    'spek',
    'tgl_perolehan',
    'harga',
    'no_po',
    'id_assetclass',
    'id_vendor',
    'id_cost_center',
    'id_plant',
    'id_lifetime',
    'id_lokasi_area',
    'id_lokasi_gedung',
    'id_lokasi_lantai',
  ];
  public function getWithRelasi($id = null, $limit = null)
  {
    $builder =  $this->select(
      '
                asset.*,
                p.nama_plant,
                v.nama_vendor,
                cc.nama_cost_center,
                ac.nama_assetclass,
                lf.masa_berlaku,
                la.nama_lokasi as la,
                lg.nama_lokasi as lg,
                ll.nama_lokasi as ll,
                pic.fullname as pic_fullname,
                pic.username as pic_username,
                usr.fullname as user_fullname,
                usr.username as user_username',
    )
      ->join('plant p', 'p.id_plant = asset.id_plant', 'left')
      ->join('pemasok v', 'v.id_vendor = asset.id_vendor', 'left')
      ->join('cost_center cc', 'cc.id_cost_center = asset.id_cost_center', 'left')
      ->join('assetclass ac', 'ac.id_assetclass = asset.id_assetclass', 'left')
      ->join('lifetime lf', 'lf.id_lifetime = asset.id_lifetime', 'left')
      ->join('lokasi la', 'la.id_lokasi = asset.id_lokasi_area', 'left')
      ->join('lokasi lg', 'lg.id_lokasi = asset.id_lokasi_gedung', 'left')
      ->join('lokasi ll', 'll.id_lokasi = asset.id_lokasi_lantai', 'left')
      ->join('users pic', 'pic.id = asset.id_pic', 'left')
      ->join('users usr', 'usr.id = asset.id_user_asset', 'left');

    if ($id !== null) {
      return $builder->where('asset.id_asset', $id)->asArray()->first();
    }
    if ($limit !== null) {
      return $builder->asArray()->findAll((int) $limit);
    }
    return $builder->asArray()->findAll();
  }
}
