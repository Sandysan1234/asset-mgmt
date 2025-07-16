<?php

namespace App\Models;

use CodeIgniter\Model;

class LocationModel extends Model
{
    protected $table          = 'location';
    protected $primaryKey     = 'id_lifet';
    protected $useTimestamps  = true;
    protected $allowedFields  = ['kode_lifetime', 'masa_berlaku', 'status'];
    protected $useSoftDeletes = true;
}
