<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Buku extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_buku' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'kode' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'penulis' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'penerbit' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'deskripsi' => [
                'type'       => 'TEXT',
            ],
            'stok' => [
                'type'       => 'INT',
            ],
            'sampul' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'buku_created_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
            'buku_updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
        ]);
        $this->forge->addKey('id_buku', true);
        $this->forge->createTable('tabel_buku');
    }

    public function down()
    {
        $this->forge->dropTable('tabel_buku');
    }
}
