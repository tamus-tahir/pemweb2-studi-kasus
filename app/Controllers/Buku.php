<?php

namespace App\Controllers;

use \App\Models\BukuModel;

class Buku extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Buku',
            'buku' => $this->bukuModel->get()
        ];

        return view('buku/index', $data);
    }

    public function pdf()
    {
        $data = [
            'title' => 'Buku',
            'buku' => $this->bukuModel->get()
        ];

        return view('buku/pdf', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Buku',
            'validation' => \Config\Services::validation(),
        ];

        return view('buku/create', $data);
    }

    public function save()
    {
        $rules = [
            'judul' => ['rules' => 'required', 'errors' => ['required' => 'judul is required']],
            'penulis' => ['rules' => 'required', 'errors' => ['required' => 'penulis is required']],
            'penerbit' => ['rules' => 'required', 'errors' => ['required' => 'penerbit is required']],
            'sampul' => [
                'rules' => 'max_size[sampul,520]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'sampul is too large of a file.',
                    'mime_in' => 'sampul does not have a valid mime type.',
                    'is_image' => 'sampul is not a valid, uploaded image file.',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal disimpan');
            return redirect()->to('/buku/create')->withInput();
        }

        $data = [
            'kode' => kodeBuku(),
            'judul' => $this->request->getVar('judul'),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'sampul' => upload($this->request->getFile('sampul'), null, 'assets/buku'),
        ];

        $this->bukuModel->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to('/buku');
    }

    public function edit($id_buku)
    {
        $data = [
            'title' => 'Ubah Buku',
            'validation' => \Config\Services::validation(),
            'buku' => $this->bukuModel->getId($id_buku)
        ];

        return view('buku/edit', $data);
    }

    public function update($id_buku)
    {
        $rules = [
            'judul' => ['rules' => 'required', 'errors' => ['required' => 'judul is required']],
            'penulis' => ['rules' => 'required', 'errors' => ['required' => 'penulis is required']],
            'penerbit' => ['rules' => 'required', 'errors' => ['required' => 'penerbit is required']],
            'deskripsi' => ['rules' => 'required', 'errors' => ['required' => 'deskripsi is required']],
            'sampul' => [
                'rules' => 'max_size[sampul,520]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'sampul is too large of a file.',
                    'mime_in' => 'sampul does not have a valid mime type.',
                    'is_image' => 'sampul is not a valid, uploaded image file.',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal disimpan');
            return redirect()->to('/buku/edit/' . $id_buku)->withInput();
        }

        $data = [
            'id_buku' => $id_buku,
            'judul' => $this->request->getVar('judul'),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'sampul' => upload($this->request->getFile('sampul'), $this->request->getVar('sampul_lama'), 'assets/buku'),
        ];

        $this->bukuModel->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to('/buku');
    }

    public function delete($id_buku)
    {
        $buku = $this->bukuModel->getId($id_buku);
        if ($buku['sampul']) {
            unlink('assets/buku/' . $buku['sampul']);
        }
        $buku = $this->bukuModel->delete($id_buku);
        session()->setFlashdata('success', 'Data Berhasil Dihapus');
        return redirect()->to('/buku');
    }

    public function detail()
    {
        echo json_encode($this->bukuModel->getId($this->request->getVar('id')));
    }
}
