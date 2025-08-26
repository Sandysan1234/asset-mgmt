<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthSeeder extends Seeder
{
    public function run()
    {
        $this->call('CreateUsers');
        $this->call('AuthGroups');
        $this->call('AuthPermission');
        $this->call('AuthUsersPermission');
    }
}
