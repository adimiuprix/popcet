<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Faucets extends Migration
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
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'meta_data' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'create_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('seos');
        $initialData = [
            [
                'title'     => 'adstera',
                'meta_data'     => 'link metadata',
            ],
        ];
        $this->db->table('seos')->insertBatch($initialData);
    }

    public function down()
    {
        $this->forge->dropTable('seos');
    }
}
