<?php

namespace App\Models;

use CodeIgniter\Model;

class NavigasiModel extends Model
{
    protected $table      = 'tabel_navigasi';
    protected $primaryKey = 'id_navigasi';
    protected $allowedFields = ['navigasi', 'url', 'urutan', 'icon', 'aktif'];
    protected $useTimestamps = true;
    protected $createdField  = 'navigasi_created_at';
    protected $updatedField  = 'navigasi_updated_at';

    public function get()
    {
        return $this->orderBy('id_navigasi', 'DESC')->findAll();
    }

    public function getId($id_navigasi)
    {
        return $this->where([$this->primaryKey => $id_navigasi])->first();
    }
}
