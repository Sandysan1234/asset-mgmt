<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLogAssetTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'log_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_asset' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'kolom_yang_diubah' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'nilai_lama' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'nilai_baru' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'waktu_perubahan' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'diubah_oleh' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'aksi' => [
                'type'       => 'ENUM',
                'constraint' => ['INSERT', 'UPDATE', 'DELETE'],
                'null'       => false,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('log_id', true); // Primary Key
        $this->forge->createTable('asset_log');
    }

    public function down()
    {
        $this->forge->dropTable('asset_log');
    }
}
