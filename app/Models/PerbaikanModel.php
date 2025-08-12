<?php

namespace App\Models;

use CodeIgniter\Model;

class PerbaikanModel extends Model
{
    protected $table      = 'perbaikan';
    protected $primaryKey = 'id_perbaikan';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_perbaikan', 'nama_perbaikan'];
    protected $useSoftDeletes = true;
}
