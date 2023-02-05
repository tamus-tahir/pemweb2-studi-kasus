<?php

namespace App\Controllers;

use \App\Models\MasukModel;
use \App\Models\BukuModel;

class Masuk extends BaseController
{

    protected $masukModel;
    protected $bukuModel;

    public function __construct()
    {
        $this->masukModel = new MasukModel();
        $this->bukuModel = new BukuModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Buku Masuk',
            'masuk' => $this->masukModel->get(),
            'buku' => $this->bukuModel->get(),
        ];

        return view('masuk/index', $data);
    }

    public function save()
    {
        $rules = [
            'id_buku' => ['rules' => 'required', 'errors' => ['required' => 'buku is required']],
            'jumlah' => ['rules' => 'required', 'errors' => ['required' => 'jumlah is required']],
            'tanggal' => ['rules' => 'required', 'errors' => ['required' => 'tanggal is required']],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal disimpan');
            return redirect()->to('masuk')->withInput();
        }

        $jumlah = $this->request->getVar('jumlah');
        $id_buku = $this->request->getVar('id_buku');

        // insert data buku masuk
        $data = [
            'id_buku' => $id_buku,
            'jumlah' => $jumlah,
            'tanggal' => $this->request->getVar('tanggal'),
        ];
        $this->masukModel->save($data);

        // tambah jumlah stok buku
        $buku = $this->bukuModel->getId($id_buku);
        $data = [
            'id_buku' => $id_buku,
            'stok' => $buku['stok'] + $jumlah,
        ];
        $this->bukuModel->save($data);

        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to('masuk');
    }

    public function update($id_masuk)
    {
        $rules = [
            'id_buku' => ['rules' => 'required', 'errors' => ['required' => 'buku is required']],
            'jumlah' => ['rules' => 'required', 'errors' => ['required' => 'jumlah is required']],
            'tanggal' => ['rules' => 'required', 'errors' => ['required' => 'tanggal is required']],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal disimpan');
            return redirect()->to('masuk')->withInput();
        }

        $jumlah = $this->request->getVar('jumlah');
        $id_buku = $this->request->getVar('id_buku');
        $masuk = $this->masukModel->getId($id_masuk);

        // update data buku masuk
        $data = [
            'id_masuk' => $id_masuk,
            'id_buku' => $id_buku,
            'jumlah' => $jumlah,
            'tanggal' => $this->request->getVar('tanggal'),
        ];
        $this->masukModel->save($data);

        // kurangi jumlah buku sebelumnya
        $bukuSebelumnya = $this->bukuModel->getId($masuk['id_buku']);
        $data = [
            'id_buku' => $masuk['id_buku'],
            'stok' => $bukuSebelumnya['stok'] - $masuk['jumlah'],
        ];
        $this->bukuModel->save($data);

        // tambah jumlah buku
        $bukuSetelah = $this->bukuModel->getId($id_buku);
        $data = [
            'id_buku' => $bukuSetelah['id_buku'],
            'stok' => $bukuSetelah['stok'] + $jumlah,
        ];
        $this->bukuModel->save($data);

        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to('masuk');
    }

    public function delete($id_masuk)
    {
        $masuk = $this->masukModel->getId($id_masuk);
        $this->masukModel->delete($id_masuk);

        $id_buku = $masuk['id_buku'];
        $buku = $this->bukuModel->getId($id_buku);
        $data = [
            'id_buku' => $id_buku,
            'stok' => $buku['stok'] - $masuk['jumlah'],
        ];
        $this->bukuModel->save($data);

        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('masuk');
    }
}
