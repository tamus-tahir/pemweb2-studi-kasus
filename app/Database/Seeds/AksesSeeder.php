<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class AksesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_profil' => 1,
                'id_navigasi' => 1,
                'akses_created_at' => Time::now(),
                'akses_updated_at' => Time::now(),
            ],
            [
                'id_profil' => 1,
                'id_navigasi' => 2,
                'akses_created_at' => Time::now(),
                'akses_updated_at' => Time::now(),
            ],
            [
                'id_profil' => 1,
                'id_navigasi' => 3,
                'akses_created_at' => Time::now(),
                'akses_updated_at' => Time::now(),
            ],
            [
                'id_profil' => 1,
                'id_navigasi' => 4,
                'akses_created_at' => Time::now(),
                'akses_updated_at' => Time::now(),
            ],
            [
                'id_profil' => 1,
                'id_navigasi' => 5,
                'akses_created_at' => Time::now(),
                'akses_updated_at' => Time::now(),
            ],
        ];

        $this->db->table('tabel_akses')->insertBatch($data);
    }
}
