<?php

namespace App\Models;

use CodeIgniter\Model;

class SesiAuditModel extends Model
{
    protected $table      = 'sesi_audit';
    protected $primaryKey = 'id_sesi';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_sesi', 'nama_sesi', 'tanggal_mulai', 'tanggal_selesai', 'status','modified_by','created_at', 'updated_at', 'deleted_at'];
    protected $useSoftDeletes = true;

    public function getActiveSession()
    {
        return $this->where('status', 'OPEN')->first();
    }
}

