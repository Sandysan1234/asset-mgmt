<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthPermission extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'asset_view',
                'description' => 'Melihat Asset'
            ],
            [
                'name' => 'asset_edit',
                'description' => 'Edit Data Asset'
            ],
            [
                'name' => 'asset_create',
                'description' => 'Membuat Data Asset'
            ],
            [
                'name' => 'asset_repair',
                'description' => 'Membuat Data Asset'
            ],
            [
                'name' => 'crud',
                'description' => 'crud semuanya'
            ],
            
            [
                'name' => 'transaksi_update',
                'description' => 'melakukan edit Transaksi'
            ],
            [
                'name' => 'transaksi_create',
                'description' => 'melakukan buat Transaksi'
            ],
            [
                'name' => 'transaksi_delete',
                'description' => 'melakukan hapus Transaksi'
            ],
            [
                'name' => 'printqr',
                'description' => 'Mencetak barcode'
            ],
            [
                'name' => 'approve_kabag_asal',
                'description' => 'Menyetujui Dept Asal'
            ],
            [
                'name' => 'approve_kabag_tujuan',
                'description' => 'Menyetujui Dept Tujuan'
            ],
            [
                'name'        => 'approve_pic',
                'description' => 'Boleh menandatangani sebagai PIC',
            ],
            [
                'name' => 'approve_plan_manager',
                'description' => 'Menyetujui oleh Plan Manager'
            ],
            [
                'name' => 'approve_direksi',
                'description' => 'Menyetujui oleh Direksi'
            ],
            [
                'name' => 'ack_finance',
                'description' => 'Finance Manager Acknowledge'
            ],
            [
                'name' => 'ack_accounting',
                'description' => 'Accounting Acknowledge'
            ],
            [
                'name' => 'ack_controlling',
                'description' => 'Controlling Acknowledge'
            ],
            [
                'name' => 'transaksi_view',
                'description' => 'Melihat Transaksi'
            ],
            
        ];
        $this->db->table('auth_permissions')->insertBatch($data);
    }
}
