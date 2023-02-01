<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id_profil' => '1',
            'username' => 'superadmin',
            'password' => password_hash('superadmin', PASSWORD_DEFAULT),
            'nama' => 'Tamus Tahir',
            'telpon' => '0811-8888-888',
            'aktif' => 1,
            'foto' => 'superadmin.jpg',
            'user_created_at' => Time::now(),
            'user_updated_at' => Time::now(),
        ];

        $this->db->table('tabel_user')->insert($data);
    }
}
