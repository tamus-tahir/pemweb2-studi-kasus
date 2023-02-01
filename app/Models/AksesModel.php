<?php

namespace App\Models;

use CodeIgniter\Model;

class AksesModel extends Model
{
    protected $table      = 'tabel_akses';
    protected $primaryKey = 'id_akses';
    protected $allowedFields = ['id_profil', 'id_navigasi'];
    protected $useTimestamps = true;
    protected $createdField  = 'akses_created_at';
    protected $updatedField  = 'akses_updated_at';

    public function get()
    {
        return $this->orderBy('id_akses', 'DESC')->findAll();
    }

    public function getId($id_akses)
    {
        return $this->where([$this->primaryKey => $id_akses])->first();
    }
}
