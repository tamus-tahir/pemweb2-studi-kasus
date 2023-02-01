<?php

namespace App\Controllers;

use \App\Models\NavigasiModel;

class Navigasi extends BaseController
{

    protected $navigasiModel;

    public function __construct()
    {
        $this->navigasiModel = new NavigasiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Navigasi',
            'navigasi' => $this->navigasiModel->get(),
        ];

        return view('navigasi/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Navigasi',
            'validation' => \Config\Services::validation()
        ];

        return view('navigasi/create', $data);
    }

    public function save()
    {
        $rules = [
            'navigasi' => ['rules' => 'required', 'errors' => ['required' => 'navigasi is required']],
            'url' => ['rules' => 'required', 'errors' => ['required' => 'url is required']],
            'icon' => ['rules' => 'required', 'errors' => ['required' => 'icon is required']],
            'urutan' => ['rules' => 'required', 'errors' => ['required' => 'urutan is required']],
            'aktif' => ['rules' => 'required', 'errors' => ['required' => 'aktif is required']],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal disimpan');
            return redirect()->to('navigasi/create')->withInput();
        }

        $data = [
            'navigasi' => $this->request->getVar('navigasi'),
            'url' => $this->request->getVar('url'),
            'icon' => $this->request->getVar('icon'),
            'urutan' => $this->request->getVar('urutan'),
            'aktif' => $this->request->getVar('aktif'),
        ];

        $this->navigasiModel->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to('navigasi');
    }

    public function edit($id_navigasi)
    {
        $data = [
            'title' => 'Ubah Navigasi',
            'validation' => \Config\Services::validation(),
            'navigasi' => $this->navigasiModel->getId($id_navigasi),
        ];

        return view('navigasi/edit', $data);
    }

    public function update($id_navigasi)
    {
        $rules = [
            'navigasi' => ['rules' => 'required', 'errors' => ['required' => 'navigasi is required']],
            'url' => ['rules' => 'required', 'errors' => ['required' => 'url is required']],
            'icon' => ['rules' => 'required', 'errors' => ['required' => 'icon is required']],
            'urutan' => ['rules' => 'required', 'errors' => ['required' => 'urutan is required']],
            'aktif' => ['rules' => 'required', 'errors' => ['required' => 'aktif is required']],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal disimpan');
            return redirect()->to('navigasi/edit')->withInput();
        }

        $data = [
            'id_navigasi' => $id_navigasi,
            'navigasi' => $this->request->getVar('navigasi'),
            'url' => $this->request->getVar('url'),
            'icon' => $this->request->getVar('icon'),
            'urutan' => $this->request->getVar('urutan'),
            'aktif' => $this->request->getVar('aktif'),
        ];

        $this->navigasiModel->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to('navigasi');
    }

    public function delete($id_navigasi)
    {
        $this->navigasiModel->delete($id_navigasi);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('navigasi');
    }
}
