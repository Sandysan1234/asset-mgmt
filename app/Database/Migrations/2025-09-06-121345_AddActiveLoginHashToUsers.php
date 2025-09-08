<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddActiveLoginHashToUsers extends Migration
{
    public function up()
    {
        $fields = [
            'active_login_hash' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'active',
                'comment'    => 'Hash sesi login terbaru',
            ]
        ];

        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'active_login_hash');
    }
}