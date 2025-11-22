<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAuiditLogs extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_log' => [
                'type'           => 'BIGINT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_sesi' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
            ],
            'qr_scanned' => [ // URL mentah yang dipindai
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'id_pic' => [ // PIC yang melakukan scan
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'hasil_klasifikasi' => [
                'type'       => 'VARCHAR',
                'constraint' => 50, // e.g., 'TERVERIFIKASI', 'BUKAN_ASET_PIC'
            ],
            'waktu_audit' => [
                'type' => 'DATETIME',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
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
        
        $this->forge->addKey('id_log', true);
        $this->forge->addForeignKey('id_sesi', 'sesi_audit', 'id_sesi', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('id_pic', 'users', 'id', 'CASCADE', 'CASCADE');
        
        $this->forge->createTable('log_audit');
    }
    
    public function down()
    {
        $this->forge->dropTable('log_audit');
        //
    }
}
