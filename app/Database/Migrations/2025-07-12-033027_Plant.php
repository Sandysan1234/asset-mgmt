<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Plant extends Migration
{
    public function up()
    {
        $this->forge->addField([
          'id_plant' => [
              'type'           => 'INT',
              'unsigned'       => true,
              'auto_increment' => true
          ],
          'kode_plant' => [
              'type'       => 'VARCHAR',
              'constraint' => 100,
              'null'       => false,
          ],
          'nama_plant' => [
              'type'       => 'VARCHAR',
              'constraint' => 200,
              'null'       => false
          ],
          'status' => [
              'type'       => 'TINYINT',
              'constraint' => 1,
              'default'    => 0
          ],
          'created_at' => [
              'type' => 'DATETIME',
              'null' => true
          ],
          'updated_at' => [
              'type' => 'DATETIME',
              'null' => true
          ],
          'modified_by' => [
              'type'       => 'VARCHAR',
              'constraint' => 100,
              'null'       => true
          ],
          'deleted_at' => [
              'type' => 'DATETIME',
              'null' => true
          ]
      ]);
    
            $this->forge->addKey('id_plant', true); // primary key
            $this->forge->createTable('plant');
    }

    public function down()
    {
        //
    }
}
