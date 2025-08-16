<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransactionSteps extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_step'       => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true, 'auto_increment' => true],
            'id_transfer'   => ['type' => 'BIGINT', 'constraint' => 20, 'unsigned' => true],
            'step_code'     => ['type' => 'VARCHAR', 'constraint' => 50],
            'step_type'     => ['type' => 'ENUM', 'constraint' => ['approve', 'ack'], 'default' => 'approve'],
            'step_order'    => ['type' => 'INT', 'constraint' => 5, 'default' => 1],
            'is_required'   => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'status'        => ['type' => 'ENUM', 'constraint' => ['pending', 'approved', 'rejected', 'skipped'], 'default' => 'pending'],
            'acted_by'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'acted_name'    => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'acted_at'      => ['type' => 'DATETIME', 'null' => true],
            'note'          => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
            'deleted_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id_step', true);
        $this->forge->addKey(['id_transfer', 'step_order']);
        $this->forge->addForeignKey('id_transfer', 'transaksi', 'id_transfer', 'CASCADE', 'CASCADE');
        $this->forge->createTable('transaksi_steps', true);
    }
    public function down()
    {
        $this->forge->dropTable('transaksi_steps', true);
    }
}
