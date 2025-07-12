<?php

namespace App\Models;

use CodeIgniter\Model;

class PlantModel extends Model
{
    protected $table      = 'plant';
    protected $primaryKey = 'id_plant';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_plant', 'nama_plant', 'status'];
    protected $useSoftDeletes = true;
}
