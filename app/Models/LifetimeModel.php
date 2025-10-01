<?php

namespace App\Models;

use CodeIgniter\Model;

class LifetimeModel extends Model
{
    protected $table          = 'lifetime';
    protected $primaryKey     = 'id_lifetime';
    protected $useTimestamps  = true;
    protected $allowedFields  = ['kode_lifetime', 'masa_berlaku', 'status', 'modified_by'];
    protected $useSoftDeletes = true;
}
