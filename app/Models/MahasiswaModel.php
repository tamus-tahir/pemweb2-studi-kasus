<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table      = 'tabel_mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    protected $allowedFields = ['id_prodi', 'nama', 'nim', 'telpon'];
    protected $useTimestamps = true;
    protected $createdField  = 'mahasiswa_created_at';
    protected $updatedField  = 'mahasiswa_updated_at';

    protected $table2      = 'tabel_prodi';
    protected $on           = 'tabel_prodi.id_prodi = tabel_mahasiswa.id_prodi';

    public function get()
    {
        return $this->orderBy('id_mahasiswa', 'DESC')
            ->join($this->table2, $this->on)
            ->findAll();
    }

    public function getId($id_mahasiswa)
    {
        return $this->where([$this->primaryKey => $id_mahasiswa])
            ->join($this->table2, $this->on)
            ->first();
    }

    public function getNim($nim)
    {
        return $this->where(['nim' => $nim])
            ->first();
    }
}
