<?php
// app/Models/LogAuditModel.php
namespace App\Models;
use CodeIgniter\Model;

class LogAuditModel extends Model
{
    protected $table = 'log_audit';
    protected $primaryKey = 'id_log';
    protected $allowedFields = [
        'id_sesi', 'qr_scanned', 'id_pic', 
        'hasil_klasifikasi', 'waktu_audit'
    ];
    protected $useSoftDeletes = true;
    protected $useTimestamps = true; // Kita atur manual 'waktu_audit'
}