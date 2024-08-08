<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 100,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'balance' => [
                'type'       => 'DECIMAL',
                'constraint' => '20,8',
            ],
            'ip_address' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
            ],
            'referral_code' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
            ],
            'reff_by' => [
                'type'       => 'INT',
                'constraint'     => 100,
                'null' => true,
            ],
            'energy' => [
                'type'       => 'INT',
                'constraint'     => 255,
                'null' => true,
            ],
            'last_claim' => [
                'type'       => 'BIGINT',
                'null' => true,
            ],
            'create_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
