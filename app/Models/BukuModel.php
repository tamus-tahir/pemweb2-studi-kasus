<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table      = 'tabel_buku';
    protected $primaryKey = 'id_buku';
    protected $allowedFields = ['judul', 'kode', 'penerbit', 'penulis', 'deskripsi', 'sampul', 'stok'];
    protected $useTimestamps = true;
    protected $createdField  = 'buku_created_at';
    protected $updatedField  = 'buku_updated_at';

    public function get()
    {
        return $this->orderBy('id_buku', 'DESC')->findAll();
    }

    public function getId($id_buku)
    {
        return $this->where([$this->primaryKey => $id_buku])->first();
    }
}
