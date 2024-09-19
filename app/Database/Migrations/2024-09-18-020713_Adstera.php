<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Seos extends Migration
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
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'meta_data' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('adsteras');
        $initialData = [
            [
                'type'     => 'popunder',
                'meta_data'     => '',
            ],
            [
                'type'     => 'social_bar',
                'meta_data'     => '',
            ],
        ];
        $this->db->table('adsteras')->insertBatch($initialData);
    }

    public function down()
    {
        $this->forge->dropTable('adsteras');
    }
}
