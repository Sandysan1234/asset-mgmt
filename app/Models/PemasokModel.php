<?php

namespace App\Models;

use CodeIgniter\Model;

class PemasokModel extends Model
{
    protected $table      = 'pemasok';
    protected $primaryKey = 'id_vendor';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_vendor', 'nama_vendor', 'alamat', 'status'];
}
