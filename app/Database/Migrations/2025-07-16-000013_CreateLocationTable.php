<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLocationTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_lokasi' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'kode_lokasi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'unique'     => true,
            ],
            'nama_lokasi' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'null'       => true
            ],
            'jenis_lokasi' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'null'       => true
            ],
            'status' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'modified_by' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id_lokasi', true); // primary key
        $this->forge->createTable('lokasi');
    }

    public function down()
    {
        $this->forge->dropTable('lokasi');
    }
}
