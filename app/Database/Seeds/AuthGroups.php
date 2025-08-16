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
        'description'  => 'Site Administrator',
      ],
      [
        'name'   => 'user',
        'description'  => 'Regular user',
      ],
      [
        'name'   => 'pic',
        'description'  => 'PIC department',
      ],
      [
        'name'   => 'manager',
        'description'  => 'Semua Manager Department',
      ],

    ];
    $this->db->table('auth_groups')->insertBatch($data);
  }
}
