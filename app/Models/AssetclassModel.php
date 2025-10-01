<?php

namespace App\Models;

use CodeIgniter\Model;

class AssetclassModel extends Model
{
    protected $table      = 'assetclass';
    protected $primaryKey = 'id_assetclass';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_assetclass', 'nama_assetclass', 'status','modified_by'];
    protected $useSoftDeletes = true;
}
