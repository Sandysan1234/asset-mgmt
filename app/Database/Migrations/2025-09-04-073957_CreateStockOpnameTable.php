<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use PHPUnit\Framework\Constraint\Constraint;

class CreateStockOpnameTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_stock_opname' => [
                'type'          => 'INT',
                'unsigned'      => true,
                'auto_increment' => true
            ],
            'no_transaksi'         => [
                'type'          => 'VARCHAR',
                'constraint'    => '50',
                'null'          => false,
            ],
            'no_asset'         => [
                'type'          => 'VARCHAR',
                'constraint'    => '20',
                'null'          => false,
            ],
            'nama_asset'    => [
                'type'      => 'VARCHAR',
                'constraint' => 200,
                'null'       => false,
            ],

            'status_asset' => [
                'type'      => 'VARCHAR',
                'constraint' => '12',
                'null'      => false,
            ],

            'tgl_stockopname'  => ['type' => 'DATE', 'null' => true],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
            'created_by'   => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'deleted_at'    => ['type' => 'DATETIME', 'null' => true]
        ]);
        $this->forge->addKey('id_stock_opname', true); // primary key
        $this->forge->createTable('stock_opname', true);
    }

    public function down()
    {
        $this->forge->dropTable('stock_opname', true);
    }
}
