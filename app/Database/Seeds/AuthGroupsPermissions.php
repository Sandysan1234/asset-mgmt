<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthGroupsPermissions extends Seeder
{
    public function run()
    {
        $data = [
            [
                'group_id'   => '1',
                'permission_id'  => '1',
            ],
            [
                'group_id'   => '1',
                'permission_id'  => '2',
            ],
            [
                'group_id'   => '1',
                'permission_id'  => '3',
            ],
            [
                'group_id'   => '1',
                'permission_id'  => '4',
            ],
            [
                'group_id'   => '1',
                'permission_id'  => '5',
            ],
            [
                'group_id'   => '1',
                'permission_id'  => '6',
            ],
            [
                'group_id'   => '1',
                'permission_id'  => '7',
            ],
            [
                'group_id'   => '1',
                'permission_id'  => '8',
            ],
            [
                'group_id'   => '1',
                'permission_id'  => '9',
            ],
            [
                'group_id'   => '1',
                'permission_id'  => '10',
            ],
            [
                'group_id'   => '1',
                'permission_id'  => '11',
            ],
            [
                'group_id'   => '1',
                'permission_id'  => '12',
            ],

            [
                'group_id'   => '1',
                'permission_id'  => '13',
            ],
            [
                'group_id'   => '1',
                'permission_id'  => '14',
            ],
            [
                'group_id'   => '1',
                'permission_id'  => '15',
            ],
            [
                'group_id'   => '1',
                'permission_id'  => '16',
            ],
            [
                'group_id'   => '1',
                'permission_id'  => '17',
            ],
            [
                'group_id'   => '1',
                'permission_id'  => '18',
            ],
            [
                'group_id'   => '1',
                'permission_id'  => '20',
            ],
            [
                'group_id'   => '2',
                'permission_id'  => '6',
            ],
            [
                'group_id'   => '2',
                'permission_id'  => '7',
            ],
            [
                'group_id'   => '2',
                'permission_id'  => '8',
            ],
            [
                'group_id'   => '2',
                'permission_id'  => '9',
            ],
            [
                'group_id'   => '2',
                'permission_id'  => '12',
            ],
            [
                'group_id'   => '4',
                'permission_id'  => '6',
            ],
            [
                'group_id'   => '4',
                'permission_id'  => '10',
            ],
            [
                'group_id'   => '4',
                'permission_id'  => '11',
            ],
            [
                'group_id'   => '5',
                'permission_id'  => '17',
            ],
            [
                'group_id'   => '6',
                'permission_id'  => '1',
            ],
            
            [
                'group_id'   => '6',
                'permission_id'  => '20',
            ],
            [
                'group_id'   => '7',
                'permission_id'  => '6',
            ],
            [
                'group_id'   => '7',
                'permission_id'  => '7',
            ],
            [
                'group_id'   => '7',
                'permission_id'  => '8',
            ],
            [
                'group_id'   => '7',
                'permission_id'  => '9',
            ],
            [
                'group_id'   => '7',
                'permission_id'  => '12',
            ],
            [
                'group_id'   => '7',
                'permission_id'  => '16',
            ],
            [
                'group_id'   => '8',
                'permission_id'  => '14',
            ],
            [
                'group_id'   => '9',
                'permission_id'  => '13',
            ],
            [
                'group_id'   => '10',
                'permission_id'  => '1',
            ],
            [
                'group_id'   => '10',
                'permission_id'  => '15',
            ],
            
            [
                'group_id'   => '10',
                'permission_id'  => '20',
            ],
            

        ];
        $this->db->table('auth_groups_permissions')->insertBatch($data);
    }
}

