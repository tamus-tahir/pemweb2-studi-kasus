<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class AllSeeder extends Seeder
{
    public function run()
    {
        $this->call('ConfigSeeder');
        $this->call('ProfilSeeder');
        $this->call('UserSeeder');
        $this->call('NavigasiSeeder');
        $this->call('AksesSeeder');
    }
}
