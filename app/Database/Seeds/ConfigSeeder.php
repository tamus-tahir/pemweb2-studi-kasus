<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ConfigSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'appname' => 'UserManager',
            'copyright'    => '@ 2022 || Tamus D Tahir',
            'logo'    => 'logo.png',
            'keywords'    => 'CI4, BS5',
            'author'    => 'Tamus D Tahir',
            'description'    => 'Aplikasi ini merupakan template user manager',
            'config_created_at' => Time::now(),
            'config_updated_at' => Time::now(),
        ];

        $this->db->table('tabel_config')->insert($data);
    }
}
