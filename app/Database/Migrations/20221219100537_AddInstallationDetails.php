<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddInstallationDetails extends Migration
{
    public function up()
    {
        $this->forge->dropTable('installation_details');
        $this->forge->addField([
            'installation_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'date' => [
                'type'       => 'DATE'
                
            ],
            'date' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'seal' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'installed_at' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'type' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'use' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'client' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'unique_id' => [
                'type'       => 'BIGINT',
                'constraint' => '100',
                'unique'=>true
            ],
        ]);
        $this->forge->addKey('installation_id', true);
        $this->forge->createTable('installation_details');
    }

    public function down()
    {
        $this->forge->dropTable('blog');
    }
}