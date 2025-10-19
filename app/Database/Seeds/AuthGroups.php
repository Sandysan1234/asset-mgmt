<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthGroups extends Seeder
{
  public function run()
  {
    $data = [
      [
        'name'   => 'admin',
        'description'  => 'Melakukan Semuanya',
      ],
      [
        'name'   => 'pic',
        'description'  => 'Buat Transaksi, Approve PIC, CRU List Aset, Perbaikan IT',
      ],
      [
        'name'   => 'approval',
        'description'  => 'yang bisa ttd',
      ],
      [
        'name'   => 'kabag',
        'description'  => 'approve dept asal/tujuan, List Asset All',
      ],
      [
        'name'   => 'user',
        'description'  => 'Regular user',
      ],
      [
        'name'   => 'finance',
        'description'  => 'assetclass,ttd, list asset',
      ],
      [
        'name'   => 'pic-accounting',
        'description'  => 'pic dan ttd accounting',
      ],
      [
        'name'   => 'direksi',
        'description'  => 'ttd direksi',
      ],
      [
        'name'   => 'plant-manager',
        'description'  => 'ttd plant manager',
      ],
      [
        'name'   => 'finance-manager',
        'description'  => 'list asset, ttd finance, crud assetclass',
      ],

    ];
    $this->db->table('auth_groups')->insertBatch($data);
  }
}
