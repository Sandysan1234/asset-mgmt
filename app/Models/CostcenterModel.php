<?php

namespace App\Models;

use CodeIgniter\Model;

class CostcenterModel extends Model
{
    protected $table      = 'cost_center';
    protected $primaryKey = 'id_cost_center';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_cost_center', 'nama_cost_center', 'status','modified_by'];
    protected $useSoftDeletes = true;
}
