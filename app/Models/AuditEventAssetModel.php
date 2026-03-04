<?php

namespace App\Models;

use CodeIgniter\Model;

class AuditEventAssetModel extends Model
{
    protected $table = 'audit_event_assets';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_sesi', 'id_asset', 'id_pic', 'status_audit', 'last_audit_at', 'catatan','created_at', 'updated_at', 'deleted_at'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    public function getAuditStatusCounts()
    {
        return $this->db->table($this->table . ' aea')
                        ->select('aea.status_audit, COUNT(*) as jumlah')
                        
                        // 1. JOIN ke tabel 'sesi_audit' (bukan 'audit_events')
                        ->join('sesi_audit sa', 'sa.id_sesi = aea.id_sesi') 
                        
                        // 2. Filter berdasarkan kolom 'status' di tabel 'sesi_audit'
                        //    Pastikan hanya sesi yang statusnya 'OPEN'
                        ->where('sa.status', 'OPEN') 
                        
                        ->groupBy('aea.status_audit')
                        ->orderBy('aea.status_audit', 'ASC')
                        ->get()
                        ->getResultArray();
    }
}