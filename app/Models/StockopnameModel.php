<?php

namespace App\Models;

use CodeIgniter\Model;

class StockopnameModel extends Model
{
    protected $table = 'stock_opname';
    protected $primaryKey = 'id_stock_opname';
    protected $useTimestamps = true;
    protected $allowedFields = ['no_asset','no_transaksi', 'nama_asset', 'status_asset','tgl_stockopname', 'created_by','updated_at'];
    // protected $useSoftDeletes = true;
}
