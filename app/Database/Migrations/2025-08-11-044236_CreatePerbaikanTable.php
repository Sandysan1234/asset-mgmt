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
            'kode_perbaikan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'nama_transaksi' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jenis_perbaikan' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'nominal' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'default'    => 0.00,
            ],
            'jenis_perbaikan'  => [
                'type' => 'ENUM',
                'constraint' => ['division', 'role', 'user'],
                'default' => 'division'
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
            'alasan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'catatan' => [
                'type' => 'TEXT',
                'null' => true,
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
        $this->forge->addKey('id_perbaikan', true);
        $this->forge->createTable('perbaikan');
    }

    public function down()
    {
        $this->forge->dropTable('perbaikan');
    }
}
