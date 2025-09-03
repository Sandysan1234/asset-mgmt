<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthUsersPermission extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => '3',
                'permission_id' => '16'
            ],
            [
                'user_id' => '4',
                'permission_id' => '19'
            ],
            [
                'user_id' => '9',
                'permission_id' => '19'
            ],
            [
                'user_id' => '10',
                'permission_id' => '19'
            ],
            [
                'user_id' => '11',
                'permission_id' => '19'
            ],
            [
                'user_id' => '13',
                'permission_id' => '19'
            ],
            [
                'user_id' => '17',
                'permission_id' => '15'
            ],
            [
                'user_id' => '17',
                'permission_id' => '20'
            ],
            [
                'user_id' => '18',
                'permission_id' => '17'
            ],
            [
                'user_id' => '19',
                'permission_id' => '17'
            ],
            [
                'user_id' => '21',
                'permission_id' => '14'
            ],
            [
                'user_id' => '22',
                'permission_id' => '13'
            ],
            [
                'user_id' => '23',
                'permission_id' => '13'
            ],
            [
                'user_id' => '23',
                'permission_id' => '20'
            ],
            [
                'user_id' => '26',
                'permission_id' => '19'
            ],
            [
                'user_id' => '27',
                'permission_id' => '20'
            ],
            [
                'user_id' => '28',
                'permission_id' => '20'
            ],
            [
                'user_id' => '29',
                'permission_id' => '20'
            ],
        ];
        $this->db->table('auth_users_permissions')->insertBatch($data);
    }
}
