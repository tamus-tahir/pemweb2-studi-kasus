<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_profil' => [
                'type'       => 'INT',
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
                'unique'       => true,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'telpon' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'      => true
            ],
            'aktif' => [
                'type'       => 'INT',
                'constraint' => 1,
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'      => true
            ],
            'user_created_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
            'user_updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('tabel_user');
    }

    public function down()
    {
        $this->forge->dropTable('tabel_user');
    }
}
