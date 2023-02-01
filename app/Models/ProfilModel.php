<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table      = 'tabel_profil';
    protected $primaryKey = 'id_profil';
    protected $allowedFields = ['profil'];
    protected $useTimestamps = true;
    protected $createdField  = 'profil_created_at';
    protected $updatedField  = 'profil_updated_at';

    public function get()
    {
        return $this->orderBy('id_profil', 'DESC')->findAll();
    }

    public function getId($id_profil)
    {
        return $this->where([$this->primaryKey => $id_profil])->first();
    }
}
