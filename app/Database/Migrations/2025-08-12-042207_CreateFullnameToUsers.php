<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFullnameToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'fullname' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'after'      => 'username',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'fullname');
    }
}
