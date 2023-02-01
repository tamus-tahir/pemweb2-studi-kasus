<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class NavigasiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'navigasi' => 'Dashboard',
                'url' => 'dashboard',
                'icon' => 'bi bi-grid',
                'urutan' => 1,
                'aktif' => 'Yes',
                'navigasi_created_at' => Time::now(),
                'navigasi_updated_at' => Time::now(),
            ],
            [
                'navigasi' => 'Config',
                'url' => 'config',
                'icon' => 'bi bi-gear',
                'urutan' => 2,
                'aktif' => 'Yes',
                'navigasi_created_at' => Time::now(),
                'navigasi_updated_at' => Time::now(),
            ],
            [
                'navigasi' => 'Navigasi',
                'url' => 'navigasi',
                'icon' => 'bi bi-sign-turn-right',
                'urutan' => 3,
                'aktif' => 'Yes',
                'navigasi_created_at' => Time::now(),
                'navigasi_updated_at' => Time::now(),
            ],
            [
                'navigasi' => 'Profil',
                'url' => 'profil',
                'icon' => 'bi bi-person',
                'urutan' => 4,
                'aktif' => 'Yes',
                'navigasi_created_at' => Time::now(),
                'navigasi_updated_at' => Time::now(),
            ],
            [
                'navigasi' => 'User',
                'url' => 'user',
                'icon' => 'bi bi-people',
                'urutan' => 5,
                'aktif' => 'Yes',
                'navigasi_created_at' => Time::now(),
                'navigasi_updated_at' => Time::now(),
            ],
        ];

        $this->db->table('tabel_navigasi')->insertBatch($data);
    }
}
