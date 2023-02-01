<?php

namespace App\Controllers;

use \App\Models\ProdiModel;

class Prodi extends BaseController
{

    protected $prodiModel;

    public function __construct()
    {
        $this->prodiModel = new ProdiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Prodi',
            'prodi' => $this->prodiModel->get(),
        ];

        return view('prodi/index', $data);
    }

    public function save()
    {
        $rules = [
            'prodi' => ['rules' => 'required', 'errors' => ['required' => 'prodi is required']],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal disimpan');
            return redirect()->to('prodi')->withInput();
        }

        $data = [
            'prodi' => $this->request->getVar('prodi'),
        ];

        $this->prodiModel->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to('prodi');
    }

    public function update($id_prodi)
    {
        $rules = [
            'prodi' => ['rules' => 'required', 'errors' => ['required' => 'prodi is required']],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal disimpan');
            return redirect()->to('prodi')->withInput();
        }

        $data = [
            'id_prodi' => $id_prodi,
            'prodi' => $this->request->getVar('prodi'),
        ];

        $this->prodiModel->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to('prodi');
    }

    public function delete($id_prodi)
    {

        $data = cekDataTerpakai('tabel_mahasiswa', ['id_prodi' => $id_prodi]);

        if ($data) {
            session()->setFlashdata('error', 'Data gagal dihapus, data sedang digunakan');
            return redirect()->to('prodi');
        }

        $this->prodiModel->delete($id_prodi);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('prodi');
    }

    public function excel()
    {
        $file = $this->request->getFile('file');
        $newName = $file->getRandomName();
        $file->move('assets/',  $newName);

        $fileName = 'assets/' . $newName;

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($fileName);

        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        for ($i = 2; $i <= count($sheetData); $i++) {
            $data = [
                'prodi' => $sheetData[$i]['A'],
            ];
            $this->prodiModel->save($data);
        }

        unlink('assets/' . $newName);
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to('prodi');
    }
}
