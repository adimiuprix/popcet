<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Settings extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'sitename' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
            ],
            'keyword' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
            ],
            'description' => [
                'type'       => 'VARCHAR',
                'constraint'     => 255,
                'null' => true,
            ],
            'reward_rate' => [
                'type'       => 'DECIMAL',
                'constraint'     => '20,8',
                'default' => '0.00000000',
            ],
            'reward_reff' => [
                'type'       => 'INT',
                'constraint'     => 100,
                'default' => '10',
            ],
            'free_energy' => [
                'type'       => 'INT',
                'constraint'     => 10,
                'default' => '0',
            ],
            'create_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('settings');
        $initialData = [
            [
                'sitename'     => 'Sweat Faucet',
                'keyword'     => 'Faucet',
                'description'     => 'Get reward with easy',
                'reward_rate'     => '0.00000000',
                'reward_reff'   => '10',    // Percent
                'free_energy'     => '10',  // Free energy when registration
            ],
        ];
        $this->db->table('settings')->insertBatch($initialData);
    }

    public function down()
    {
        $this->forge->dropTable('settings');
    }
}