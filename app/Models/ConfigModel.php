<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfigModel extends Model
{
    protected $table      = 'tabel_config';
    protected $primaryKey = 'id_config';
    protected $allowedFields = ['appname', 'copyright', 'logo', 'keywords', 'author', 'description'];
    protected $useTimestamps = true;
    protected $createdField  = 'config_created_at';
    protected $updatedField  = 'config_updated_at';

    public function get()
    {
        return $this->where([$this->primaryKey => 1])->first();
    }
}