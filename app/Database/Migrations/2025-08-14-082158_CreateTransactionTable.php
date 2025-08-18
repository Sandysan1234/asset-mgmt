<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransactionTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            // PK konsisten dengan Model
            'id_transaksi' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            // identitas
            'id_asset' => [
                'type'       => 'BIGINT',
                'constraint' => 20,
                'unsigned'   => true,
                'null'       => false,
            ],
            'transaksi' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'null'       => false,
                'comment'    => '0=pelepasan,1=penghentian,2=penggabungan,3=mutasi',
            ],
            'tgl_transaksi' => ['type' => 'DATETIME', 'null' => true],
            'alasan'       => ['type' => 'TEXT', 'null' => true],

            // asal (snapshot)
            'id_plant_asal'         => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            'id_cost_center_asal'   => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            // 'id_lokasi_area_asal'   => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            // 'id_lokasi_gedung_asal' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            // 'id_lokasi_lantai_asal' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],

            // tujuan (rencana)
            'id_plant_baru'         => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            'id_cost_center_baru'   => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            // 'id_lokasi_area_baru'   => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            // 'id_lokasi_gedung_baru' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],
            // 'id_lokasi_lantai_baru' => ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'null' => true],

            // status umum transaksi
            // 0=onprogress,1=approve,2=complete,3=cancelled
            'status'  => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
                'comment'    => '0=onprogress,1=approve,2=complete,3=cancelled',
            ],
            'catatan' => ['type' => 'TEXT', 'null' => true],

            // audit trail
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
            'modified_by'   => ['type' => 'VARCHAR', 'constraint' => 100, 'null'=> true],
            'deleted_at'    => ['type' => 'DATETIME', 'null' => true]
        ]);

        // Primary key
        $this->forge->addKey('id_transaksi', true);

        // Index (tanpa nama khusus — biarkan CI/MySQL memberi nama otomatis)
        $this->forge->addKey('id_asset');
        $this->forge->addKey(['id_plant_asal', 'id_cost_center_asal']);
        $this->forge->addKey(['id_plant_baru', 'id_cost_center_baru']);
        $this->forge->addKey('transaksi');
        $this->forge->addKey('status');
        $this->forge->addKey('tgl_transaksi');

        // (Opsional) Foreign Keys — aktifkan jika parent table sudah ada & tipe cocok
        // $this->forge->addForeignKey('id_asset', 'asset', 'id_asset', 'RESTRICT', 'CASCADE');
        // $this->forge->addForeignKey('id_plant_asal', 'plant', 'id_plant', 'SET NULL', 'CASCADE');
        // $this->forge->addForeignKey('id_plant_baru', 'plant', 'id_plant', 'SET NULL', 'CASCADE');
        // ... tambahkan FK lain sesuai kebutuhan skema kamu

        $this->forge->createTable('transaksi', true);
    }

    public function down()
    {
        // Hapus FK dulu kalau kamu mengaktifkannya (CI4 biasanya otomatis saat dropTable(true))
        $this->forge->dropTable('transaksi', true);
    }
}
