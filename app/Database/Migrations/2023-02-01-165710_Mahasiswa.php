<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mahasiswa' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_prodi' => [
                'type'       => 'INT',
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint'     => 128,
            ],
            'nim' => [
                'type'       => 'INT',
                'constraint'     => 11,
            ],
            'telpon' => [
                'type'       => 'VARCHAR',
                'constraint'     => 20,
            ],
            'mahasiswa_created_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
            'mahasiswa_updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
        ]);
        $this->forge->addKey('id_mahasiswa', true);
        $this->forge->createTable('tabel_mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('tabel_mahasiswa');
    }
}
