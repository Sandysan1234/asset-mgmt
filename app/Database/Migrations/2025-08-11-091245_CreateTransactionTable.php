<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransactionTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi'        => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'id_asset'            => ['type' => 'INT',  'unsigned' => true, 'null' => false],
            'tindakan'            => ['type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'comment' => '0=pelepasan,1=penghentian,2=penggabungan,3=mutasi'],
            'tgl_tindakan'        => ['type' => 'DATE', 'null' => true],
            'alasan'              => ['type' => 'TEXT', 'null' => true],
            'id_plant_asal'       => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            'id_cost_center_asal' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            'id_lokasi_area_asal' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            'id_lokasi_gedung_asal' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            'id_lokasi_lantai_asal' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            'id_plant_baru'       => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            'id_cost_center_baru' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            'status'              => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'in_progress'],
            'created_by'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'created_at'          => ['type' => 'DATETIME', 'null' => true],
            'updated_at'          => ['type' => 'DATETIME', 'null' => true],
            'deleted_at'          => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id_transaksi', true);
        // composite index dgn nama pendek
        $this->forge->addKey(['id_plant_asal', 'id_cost_center_asal'], false, false, 'idx_tr_from');
        $this->forge->addKey(['id_plant_baru', 'id_cost_center_baru'], false, false, 'idx_tr_to');

        // FK ini otomatis bikin index utk id_asset (jangan buat index id_asset lagi)
        $this->forge->addForeignKey('id_asset', 'asset', 'id_asset', 'RESTRICT', 'CASCADE');

        $this->forge->createTable('transaksi', true);
    }
    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}
