<?php

namespace App\Models;

use CodeIgniter\Model;

class LocationModel extends Model
{
    protected $table          = 'lokasi';
    protected $primaryKey     = 'id_lokasi';
    protected $useTimestamps  = true;
    protected $allowedFields  = ['kode_lokasi', 'nama_lokasi', 'jenis_lokasi', 'status', 'modified_by'];
    protected $useSoftDeletes = true;

    
}
