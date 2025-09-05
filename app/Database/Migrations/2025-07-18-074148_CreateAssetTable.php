<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAssetTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_asset' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'no_asset' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'sub_asset' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'nama_asset' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
            ],
            'serial_number' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'batch_number' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'merek' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'spek' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'tgl_perolehan' => [
                'type' => 'DATE',
            ],
            'harga' => [
                'type'       => 'VARCHAR',
                'constraint' => 13,
                'null'       => true,
            ],
            'no_po' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'status' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0
            ],
            'no_po' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'id_assetclass' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'id_vendor' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'id_cost_center' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'id_plant' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'id_lifetime' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'id_pic'    => [
                'type'     => 'INT',
                'unsigned' => true,
                'null'     => true,
            ],
            'user_asset' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'id_lokasi_area' => [
                'type'     => 'INT',
                'unsigned' => true,
                'null'     => true,

            ],
            'id_lokasi_gedung' => [
                'type'     => 'INT',
                'unsigned' => true,
                'null'     => true,

            ],
            'id_lokasi_lantai' => [
                'type'     => 'INT',
                'unsigned' => true,
                'null'     => true,

            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'modified_by' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_asset', true); // primary key
        $this->forge->createTable('asset');
    }

    public function down()
    {
        $this->forge->dropTable('asset');
    }
}
