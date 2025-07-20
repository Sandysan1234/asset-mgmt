<?php

namespace App\Models;

use CodeIgniter\Model;

class AssetModel extends Model
{
    protected $table      = 'asset';
    protected $primaryKey = 'id_asset';
    protected $useTimestamps = true;
    protected $allowedFields = ['no_asset, sub_asset', 'nama_asset', 'serial_number', 'batch_number', 'merek', 'spek', 'tgl_perolehan', 'harga', 'no_po', 'id_assetclass', 'id_vendor', 'id_lifetime'];
    protected $useSoftDeletes = true;
}