<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Config extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_config' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'appname' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'copyright' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'logo' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'keywords' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'author' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'description' => [
                'type'       => 'TEXT',
            ],
            'config_created_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
            'config_updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
        ]);
        $this->forge->addKey('id_config', true);
        $this->forge->createTable('tabel_config');
    }

    public function down()
    {
        $this->forge->dropTable('tabel_config');
    }
}
