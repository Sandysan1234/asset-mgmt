<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthGroupsUsers extends Seeder
{
    public function run()
    {
        $data = [

            [
                'group_id' => '1',
                'user_id' => '1'
            ],
            [
                'group_id' => '1',
                'user_id' => '3'
            ],
            [
                'group_id' => '1',
                'user_id' => '10'
            ],
            [
                'group_id' => '1',
                'user_id' => '26'
            ],
            [
                'group_id' => '1',
                'user_id' => '4'
            ],
            [
                'group_id' => '2',
                'user_id' => '1'
            ],
            [
                'group_id' => '2',
                'user_id' => '3'
            ],
            [
                'group_id' => '2',
                'user_id' => '4'
            ],
            [
                'group_id' => '2',
                'user_id' => '8'
            ],
            [
                'group_id' => '3',
                'user_id' => '1'
            ],
            [
                'group_id' => '3',
                'user_id' => '3'
            ],
            [
                'group_id' => '3',
                'user_id' => '17'
            ],
            [
                'group_id' => '3',
                'user_id' => '18'
            ],
            [
                'group_id' => '3',
                'user_id' => '21'
            ],
            [
                'group_id' => '3',
                'user_id' => '22'
            ],
            [
                'group_id' => '3',
                'user_id' => '23'
            ],
            [
                'group_id' => '4',
                'user_id' => '16'
            ],
            [
                'group_id' => '4',
                'user_id' => '24'
            ],
            [
                'group_id' => '4',
                'user_id' => '31'
            ],
            [
                'group_id' => '4',
                'user_id' => '32'
            ],

        ];
        $this->db->table('auth_groups_users')->insertBatch($data);
    }
}
