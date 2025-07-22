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
    'id_lifetime',
  ];
  public function getWithRelasi()
  {
    return $this->select('
                asset.*,
                p.nama_plant,
                v.nama_vendor,
                cc.nama_cost_center,
                ac.nama_assetclass,
                lf.masa_berlaku,
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
      ->join('users pic', 'pic.id = asset.id_pic', 'left')
      ->join('users usr', 'usr.id = asset.id_user_asset', 'left')
      ->findAll();
  }
}
