<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthPermission extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'asset.view',
                'description' => 'melihat data asset'
            ],
            
            [
                'name' => 'transaksi',
                'description' => 'Melakukan Transaksi'
            ],
            [
                'name' => 'ttd',
                'description' => 'Menandatangani Transaksi'
            ],
            [
                'name' => 'printqr',
                'description' => 'Mencetak barcode'
            ],
            
        ];
        $this->db->table('auth_permissions')->insertBatch($data);
    }
}
