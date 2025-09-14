<?php
// app/Models/LogModel.php
namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
    protected $table = 'asset_log';
    protected $primaryKey = 'log_id';

    protected $createdField  = 'waktu_perubahan';
    protected $allowedFields = [
        'id_asset',
        'kolom_yang_diubah',
        'nilai_lama',
        'nilai_baru',
        'waktu_perubahan',
        'diubah_oleh',
        'aksi'
    ];
    protected $useTimestamps = true; // karena waktu kita set manual
}
