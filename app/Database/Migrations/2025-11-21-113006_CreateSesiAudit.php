<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSesiAudit extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_sesi' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_sesi' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'null'       => false,
            ],
            'tanggal_mulai' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'tanggal_selesai' => [
                'type' => 'DATE',
                'null' => true, // Boleh null jika sesi belum ditentukan batas akhirnya
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['OPEN', 'CLOSED', 'CANCELED'],
                'default'    => 'OPEN',
                'null'       => false,
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
        $this->forge->addKey('id_sesi', true);
        $this->forge->createTable('sesi_audit');
    }

    public function down()
    {
        //
        $this->forge->dropTable('sesi_audit');

    }
}
