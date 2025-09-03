<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSessionsTable extends Migration
{
    public function up()
    {
        // Hapus tabel jika sudah ada (opsional)
        $this->forge->dropTable('ci4_sessions', true);

        $this->forge->addField([
            'id' => [
                'type'           => 'VARCHAR',
                'constraint'     => 128,
                'null'           => false,
            ],
            'ip_address' => [
                'type'           => 'VARCHAR',
                'constraint'     => 45,
                'null'           => false,
            ],
            'timestamp' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'null'           => false,
                'default'        => 0,
            ],
            'data' => [
                'type'           => 'BLOB',
                'null'           => true,
            ],
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'           => true,
                'default'        => null,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('timestamp');
        $this->forge->addKey('user_id'); // penting untuk query session per user

        $this->forge->createTable('ci4_sessions', true);
    }

    public function down()
    {
        $this->forge->dropTable('ci4_sessions', true);
    }
}