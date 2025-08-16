<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthUsersPermission extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => '1',
                'permission_id' => '1'
            ],
            [
                'user_id' => '1',
                'permission_id' => '2'
            ],
            [
                'user_id' => '1',
                'permission_id' => '3'
            ],
            [
                'user_id' => '1',
                'permission_id' => '4'
            ],

            [
                'user_id' => '2',
                'permission_id' => '1'
            ],
            [
                'user_id' => '2',
                'permission_id' => '2'
            ],
            [
                'user_id' => '2',
                'permission_id' => '3'
            ],

            [
                'user_id' => '3',
                'permission_id' => '1'
            ],

            [
                'user_id' => '3',
                'permission_id' => '3'
            ],
            [
                'user_id' => '3',
                'permission_id' => '4'
            ],
            [
                'user_id' => '4',
                'permission_id' => '1'
            ],
            [
                'user_id' => '4',
                'permission_id' => '2'
            ],
            [
                'user_id' => '4',
                'permission_id' => '3'
            ],
            [
                'user_id' => '4',
                'permission_id' => '4'
            ],

            [
                'user_id' => '5',
                'permission_id' => '1'
            ],
            [
                'user_id' => '5',
                'permission_id' => '2'
            ],
            [
                'user_id' => '5',
                'permission_id' => '3'
            ],
            [
                'user_id' => '6',
                'permission_id' => '1'
            ],
            [
                'user_id' => '6',
                'permission_id' => '2'
            ],
            [
                'user_id' => '6',
                'permission_id' => '3'
            ],
            [
                'user_id' => '7',
                'permission_id' => '1'
            ],
            [
                'user_id' => '7',
                'permission_id' => '2'
            ],
            [
                'user_id' => '7',
                'permission_id' => '3'
            ],
            [
                'user_id' => '8',
                'permission_id' => '1'
            ],
            [
                'user_id' => '8',
                'permission_id' => '2'
            ],
            [
                'user_id' => '8',
                'permission_id' => '3'
            ],

            [
                'user_id' => '9',
                'permission_id' => '1'
            ],
            [
                'user_id' => '9',
                'permission_id' => '2'
            ],
            [
                'user_id' => '9',
                'permission_id' => '3'
            ],
            [
                'user_id' => '9',
                'permission_id' => '4'
            ],
            [
                'user_id' => '10',
                'permission_id' => '1'
            ],
            [
                'user_id' => '10',
                'permission_id' => '2'
            ],
            [
                'user_id' => '10',
                'permission_id' => '3'
            ],
            [
                'user_id' => '11',
                'permission_id' => '1'
            ],
            [
                'user_id' => '11',
                'permission_id' => '2'
            ],
            [
                'user_id' => '11',
                'permission_id' => '3'
            ],
            [
                'user_id' => '12',
                'permission_id' => '1'
            ],
            [
                'user_id' => '12',
                'permission_id' => '2'
            ],
            [
                'user_id' => '12',
                'permission_id' => '3'
            ],
            [
                'user_id' => '13',
                'permission_id' => '1'
            ],
            [
                'user_id' => '13',
                'permission_id' => '2'
            ],
            [
                'user_id' => '13',
                'permission_id' => '3'
            ],
            [
                'user_id' => '14',
                'permission_id' => '1'
            ],
            [
                'user_id' => '14',
                'permission_id' => '2'
            ],
            [
                'user_id' => '14',
                'permission_id' => '3'
            ],
            [
                'user_id' => '15',
                'permission_id' => '1'
            ],
            [
                'user_id' => '15',
                'permission_id' => '2'
            ],
            [
                'user_id' => '15',
                'permission_id' => '3'
            ],

            [
                'user_id' => '16',
                'permission_id' => '1'
            ],
            [
                'user_id' => '16',
                'permission_id' => '2'
            ],
            [
                'user_id' => '16',
                'permission_id' => '3'
            ],




            [
                'user_id' => '17',
                'permission_id' => '1'
            ],
            [
                'user_id' => '17',
                'permission_id' => '3'
            ],
            [
                'user_id' => '17',
                'permission_id' => '4'
            ],
            [
                'user_id' => '18',
                'permission_id' => '1'
            ],
            [
                'user_id' => '18',
                'permission_id' => '3'
            ],
            [
                'user_id' => '18',
                'permission_id' => '4'
            ],


        ];
        $this->db->table('auth_users_permissions')->insertBatch($data);
    }
}
