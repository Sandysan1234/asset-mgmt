<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePerbaikanTable extends Migration
{

    public function up()
    {
        $this->forge->addField([
            'id_perbaikan' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'jenis_perbaikan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'biaya' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'default'    => 0.00,
            ],
            'teknisi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'durasi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'status' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
                'comment'    => '0=sedang diperbaiki, 1 = selesai diperbaiki'
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
            'id_asset' => [
                'type'     => 'INT',
                'unsigned' => true,
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
            // 'catatan' => [
            //     'type' => 'TEXT',
            //     'null' => true,
            // ],
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
        $this->forge->addKey('id_perbaikan', true);
        $this->forge->createTable('perbaikan');
    }

    public function down()
    {
        $this->forge->dropTable('perbaikan');
    }
}
