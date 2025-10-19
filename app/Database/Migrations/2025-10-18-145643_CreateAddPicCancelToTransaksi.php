<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAddPicCancelToTransaksi extends Migration
{

    public function up()
    {
        $fields = [
            'pic_cancel_requested' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'null'       => false,
                'default'    => 0,
                'after'      => 'status'
            ],
            'pic_cancel_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
                'default'    => null,
                'after'      => 'pic_cancel_requested'
            ]
        ];
        $this->forge->addColumn('transaksi', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('transaksi', ['pic_cancel_requested', 'pic_cancel_at']);

    }
}
