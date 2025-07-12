<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePemasokTable extends Migration
{
    public function up()
    {
        // $this->forge->addField([
        //     'id_vendor' => [
        //         'type'           => 'INT',
        //         'unsigned'       => true,
        //         'auto_increment' => true
        //     ],
        //     'kode_vendor' => [
        //         'type'       => 'VARCHAR',
        //         'constraint' => 100,
        //         'null'       => false,
        //     ],
        //     'nama_vendor' => [
        //         'type'       => 'VARCHAR',
        //         'constraint' => 200,
        //         'null'       => false
        //     ],
        //     'alamat' => [
        //         'type' => 'TEXT',
        //         'null' => true,
        //     ],
        //     'status' => [
        //         'type'       => 'TINYINT',
        //         'constraint' => 1,
        //         'default'    => 0
        //     ],
        //     'created_at' => [
        //         'type' => 'DATETIME',
        //         'null' => true
        //     ],
        //     'updated_at' => [
        //         'type' => 'DATETIME',
        //         'null' => true
        //     ],
        //     'modified_by' => [
        //         'type'       => 'VARCHAR',
        //         'constraint' => 100,
        //         'null'       => true
        //     ],
        //     'deleted_at' => [
        //         'type' => 'DATETIME',
        //         'null' => true
        //     ]
        // ]);

        // $this->forge->addKey('id_vendor', true); // primary key
        // $this->forge->createTable('pemasok');
    }

    public function down()
    {
        $this->forge->dropTable('pemasok');
    }
}
