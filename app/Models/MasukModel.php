<?php

namespace App\Models;

use CodeIgniter\Model;

class MasukModel extends Model
{
    protected $table      = 'tabel_masuk';
    protected $primaryKey = 'id_masuk';
    protected $allowedFields = ['id_buku', 'jumlah', 'tanggal'];
    protected $useTimestamps = true;
    protected $createdField  = 'masuk_created_at';
    protected $updatedField  = 'masuk_updated_at';

    protected $table2      = 'tabel_buku';
    protected $on           = 'tabel_buku.id_buku = tabel_masuk.id_buku';

    public function get()
    {
        return $this->orderBy('id_masuk', 'DESC')
            ->join($this->table2, $this->on)
            ->findAll();
    }

    public function getId($id_masuk)
    {
        return $this->where([$this->primaryKey => $id_masuk])
            ->join($this->table2, $this->on)
            ->first();
    }

    public function getNim($nim)
    {
        return $this->where(['nim' => $nim])
            ->first();
    }
}
