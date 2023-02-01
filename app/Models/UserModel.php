<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'tabel_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['id_profil', 'username', 'password', 'nama', 'telpon', 'aktif', 'foto'];
    protected $useTimestamps = true;
    protected $createdField  = 'user_created_at';
    protected $updatedField  = 'user_updated_at';

    protected $table2      = 'tabel_profil';
    protected $on           = 'tabel_profil.id_profil = tabel_user.id_profil';

    public function get()
    {
        return $this->orderBy('id_user', 'DESC')
            ->join($this->table2, $this->on)
            ->findAll();
    }

    public function getId($id_user)
    {
        return $this->where([$this->primaryKey => $id_user])
            ->join($this->table2, $this->on)
            ->first();
    }

    public function getUsername($username)
    {
        return $this->where(['username' => $username])->first();
    }
}
