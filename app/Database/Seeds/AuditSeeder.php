<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuditSeeder extends Seeder
{
    public function run()
    {
        // 1. Buat User PIC (Budi)
        $this->db->table('users')->insert([
            'email'    => 'budi@pic.com',
            'username' => 'budi_pic',
            'fullname' => 'Budi Santoso',
            'active'   => 1,
            'password_hash' => 'dummy_hash', // Kita tidak login pakai password dulu
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $idPic = $this->db->insertID();

        // 2. Buat Aset Dumy (Laptop)
        $this->db->table('assets')->insert([
            'no_asset'   => 'LTP-001',
            'nama_asset' => 'Laptop Dell Latitude',
            'id_pic'     => $idPic,
            'status'     => 5, // Aktif
            'tgl_perolehan' => date('Y-m-d'),
            // Kolom lain yang NOT NULL harus diisi default
            'id_assetclass' => 1, 'id_vendor' => 1, 'id_cost_center' => 1,
            'id_plant' => 1, 'id_lifetime' => 1
        ]);
        
        echo "Data Dumy Berhasil Dibuat! ID PIC: $idPic\n";
    }
}