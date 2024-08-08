<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transactions extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'  => 'INT',
                'constraint' => 100,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => '100',
                'null' => true,
            ],
            'amount' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'unixtime' => [
                'type'       => 'BIGINT',
                'null' => true,
            ],
            'type' => [
                'type'       => 'VARCHAR',
                'constraint'     => 100,
                'null' => true,
            ],
            'create_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('transactions');
    }

    public function down()
    {
        $this->forge->dropTable('transactions');
    }
}
