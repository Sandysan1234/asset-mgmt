<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddActiveLoginHashToUsers extends Migration
{
    public function up()
    {
        $fields = [
            'session_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 128,
                'null'       => true,
                'collation'  => 'utf8mb4_general_ci',
            ],
        ];

        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'active_login_hash');
    }
}