<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Navigasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_navigasi' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'navigasi' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'url' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'icon' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'urutan' => [
                'type'       => 'INT',
            ],
            'aktif' => [
                'type'       => 'VARCHAR',
                'constraint' => '3',
            ],
            'navigasi_created_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
            'navigasi_updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
        ]);
        $this->forge->addKey('id_navigasi', true);
        $this->forge->createTable('tabel_navigasi');
    }

    public function down()
    {
        $this->forge->dropTable('tabel_navigasi');
    }
}
