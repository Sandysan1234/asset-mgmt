<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransactionTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transfer'            => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],

            // identitas
            'id_asset'               => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'null' => false],
            'tindakan'               => ['type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'comment' => '0=pelepasan,1=penghentian,2=penggabungan,3=mutasi'],
            'tgl_tindakan'           => ['type' => 'DATE', 'null' => true],
            'alasan'                 => ['type' => 'TEXT', 'null' => true],

            // asal
            'id_plant_asal'          => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            'id_cost_center_asal'    => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            'id_lokasi_area_asal'    => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            'id_lokasi_gedung_asal'  => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            'id_lokasi_lantai_asal'  => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],

            // tujuan
            'id_plant_baru'          => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            'id_cost_center_baru'    => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            'id_lokasi_area_baru'    => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            'id_lokasi_gedung_baru'  => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            'id_lokasi_lantai_baru'  => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],

            // status umum transaksi
            // in_progress | approved | rejected | cancelled | completed
            'status'               => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0, 'comment' => '0=onprogress,1=approve,2=complete,3=cancelled'],
            'catatan'                 => ['type' => 'TEXT', 'null' => true],

            // audit trail
            'created_by'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'created_at'             => ['type' => 'DATETIME', 'null' => true],
            'updated_at'             => ['type' => 'DATETIME', 'null' => true],
            'deleted_at'             => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id_transfer', true);

        // index berguna untuk filter & laporan
        $this->forge->addKey('id_asset', false, false, 'idx_at_asset');
        $this->forge->addKey(['id_plant_asal', 'id_cost_center_asal'], false, false, 'idx_at_from');
        $this->forge->addKey(['id_plant_baru', 'id_cost_center_baru'], false, false, 'idx_at_to');
        $this->forge->addKey('tindakan', false, false, 'idx_at_tindakan');
        $this->forge->addKey('status', false, false, 'idx_at_status');
        $this->forge->addKey('tgl_tindakan', false, false, 'idx_at_tgl');

        // >>> Jika ingin pakai FK, pastikan tipe kolom parent sama persis & urutan migration benar, lalu buka komentar di bawah:
        // $this->forge->addForeignKey('id_asset', 'asset', 'id_asset', 'RESTRICT', 'CASCADE');

        $this->forge->createTable('transaksi', true);
    }

    public function down()
    {
        $this->forge->dropTable('transaksi', true);
    }
}
