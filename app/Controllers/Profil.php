<?php

namespace App\Controllers;

use \App\Models\ProfilModel;
use \App\Models\AksesModel;
use \App\Models\NavigasiModel;

class Profil extends BaseController
{

    protected $profilModel;
    protected $aksesModel;
    protected $navigasiModel;

    public function __construct()
    {
        $this->profilModel = new ProfilModel();
        $this->aksesModel = new AksesModel();
        $this->navigasiModel = new NavigasiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Profil',
            'profil' => $this->profilModel->get(),
        ];

        return view('profil/index', $data);
    }

    public function save()
    {
        $rules = [
            'profil' => ['rules' => 'required', 'errors' => ['required' => 'profil is required']],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal disimpan');
            return redirect()->to('prrofil')->withInput();
        }

        $data = [
            'profil' => $this->request->getVar('profil'),
        ];

        $this->profilModel->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to('profil');
    }

    public function update($id_profil)
    {
        $rules = [
            'profil' => ['rules' => 'required', 'errors' => ['required' => 'profil is required']],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal disimpan');
            return redirect()->to('profil')->withInput();
        }

        $data = [
            'id_profil' => $id_profil,
            'profil' => $this->request->getVar('profil'),
        ];

        $this->profilModel->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to('profil');
    }

    public function delete($id_profil)
    {
        $data = cekDataTerpakai('tabel_user', ['id_profil' => $id_profil]);

        if ($data) {
            session()->setFlashdata('error', 'Data gagal dihapus, data sedang digunakan');
            return redirect()->to('profil');
        }

        $this->profilModel->delete($id_profil);

        $this->aksesModel->where(['id_profil' => $id_profil]);
        $this->aksesModel->delete();

        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('profil');
    }


    // ===== akses =====
    public function akses($id_profil)
    {
        $data = [
            'title' => 'Akses Profil',
            'profil' => $this->profilModel->getId($id_profil),
            'navigasi' => $this->navigasiModel->get(),
        ];

        return view('profil/akses', $data);
    }

    public function change()
    {
        $id_profil = $this->request->getVar('profil');
        $id_navigasi = $this->request->getVar('navigasi');

        $db = \Config\Database::connect();
        $where = [
            'id_profil' => $id_profil,
            'id_navigasi' => $id_navigasi,
        ];

        $akses = $db->table('tabel_akses')->getWhere($where)->getResult();
        if (count($akses) < 1) {
            $data = [
                'id_profil' => $id_profil,
                'id_navigasi' => $id_navigasi,
            ];
            $db->table('tabel_akses')->insert($data);
        } else {
            $db->table('tabel_akses')->where($where)->delete();
        }
    }
}
