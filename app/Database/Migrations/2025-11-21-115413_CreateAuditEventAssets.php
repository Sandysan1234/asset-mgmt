<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAuditEventAssets extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_sesi' => [ // Foreign Key ke Sesi Audit
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
            ],
            'id_asset' => [ // Foreign Key ke Asset
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
            ],
            'id_pic' => [ // Untuk kemudahan query PIC (Foreign Key ke Users.id)
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
            ],
            'status_audit' => [
                'type'       => 'ENUM',
                'constraint' => ['BELUM_AUDIT', 'TERVERIFIKASI', 'HILANG', 'RUSAK', 'TIDAK_TERDAFTAR'],
                'default'    => 'BELUM_AUDIT',
            ],
            'last_audit_at' => [
                'type' => 'DATETIME',
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
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        
        $this->forge->addKey('id', true);
        // Tambahkan unique key untuk memastikan satu aset hanya satu status per sesi
        $this->forge->addUniqueKey(['id_sesi', 'id_asset']); 

        // Definisikan Foreign Key Relationship
        $this->forge->addForeignKey('id_sesi', 'sesi_audit', 'id_sesi', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_asset', 'asset', 'id_asset', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('id_pic', 'users', 'id', 'CASCADE', 'CASCADE');
        
        $this->forge->createTable('audit_event_assets');
        
    }
    
    public function down()
    {
        $this->forge->dropTable('audit_event_assets');
        //
    }
}
