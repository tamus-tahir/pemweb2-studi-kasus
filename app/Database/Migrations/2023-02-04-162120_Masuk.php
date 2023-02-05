<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Masuk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_masuk' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_buku' => [
                'type'       => 'INT',
            ],
            'jumlah' => [
                'type'       => 'INT',
            ],
            'tanggal' => [
                'type'       => 'DATE',
            ],
            'masuk_created_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
            'masuk_updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
        ]);
        $this->forge->addKey('id_masuk', true);
        $this->forge->createTable('tabel_masuk');
    }

    public function down()
    {
        $this->forge->dropTable('tabel_masuk');
    }
}
