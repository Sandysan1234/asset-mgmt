<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateManualBook extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'judul'     =>[
                'type'  => 'VARCHAR',
                'constraint' => 100,
                'null'      => false,
            ],
            'file_name'     =>[
                'type'  => 'VARCHAR',
                'constraint' => 100,
                'null'      => false,
            ],

            'path'     =>[
                'type'  => 'VARCHAR',
                'constraint' => 100,
                'null'      => false,
            ],
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('manual_books');
    }
    
    public function down()
    {
        $this->forge->dropTable('manual_books');
        //
    }
}
