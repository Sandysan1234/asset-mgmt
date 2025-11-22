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
}