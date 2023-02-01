<?php

namespace App\Controllers;

use \App\Models\MahasiswaModel;
use \App\Models\ProdiModel;

class Mahasiswa extends BaseController
{

    protected $mahasiswaModel;
    protected $prodiModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
        $this->prodiModel = new ProdiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Mahasiswa',
            'mahasiswa' => $this->mahasiswaModel->get(),
            'prodi' => $this->prodiModel->get(),
        ];

        return view('mahasiswa/index', $data);
    }

    public function get()
    {
        echo json_encode($this->mahasiswaModel->getId($this->request->getVar('id')));
    }

    public function save()
    {
        $rules = [
            'id_prodi' => ['rules' => 'required', 'errors' => ['required' => 'prodi is required']],
            'nama' => ['rules' => 'required', 'errors' => ['required' => 'nama is required']],
            'telpon' => ['rules' => 'required', 'errors' => ['required' => 'telpon is required']],
            'nim' => ['rules' => 'required|is_unique[tabel_mahasiswa.nim]', 'errors' => [
                'required' => 'nim is required',
                'is_unique' => 'nim must contain a unique value',
            ]],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal disimpan');
            return redirect()->to('mahasiswa')->withInput();
        }

        $data = [
            'id_prodi' => $this->request->getVar('id_prodi'),
            'nama' => $this->request->getVar('nama'),
            'nim' => $this->request->getVar('nim'),
            'telpon' => $this->request->getVar('telpon'),
        ];

        $this->mahasiswaModel->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to('mahasiswa');
    }

    public function update($id_mahasiswa)
    {
        $mahasiswa = $this->mahasiswaModel->getId($id_mahasiswa);
        if ($mahasiswa['nim'] == $this->request->getVar('nim')) {
            $ruleNim = 'required';
        } else {
            $ruleNim = 'required|is_unique[tabel_mahasiswa.nim]';
        }

        $rules = [
            'id_prodi' => ['rules' => 'required', 'errors' => ['required' => 'prodi is required']],
            'nama' => ['rules' => 'required', 'errors' => ['required' => 'nama is required']],
            'telpon' => ['rules' => 'required', 'errors' => ['required' => 'telpon is required']],
            'nim' => ['rules' => $ruleNim, 'errors' => [
                'required' => 'nim is required',
                'is_unique' => 'nim must contain a unique value',
            ]],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal disimpan');
            return redirect()->to('mahasiswa')->withInput();
        }

        $data = [
            'id_mahasiswa' => $id_mahasiswa,
            'id_prodi' => $this->request->getVar('id_prodi'),
            'nama' => $this->request->getVar('nama'),
            'nim' => $this->request->getVar('nim'),
            'telpon' => $this->request->getVar('telpon'),
        ];

        $this->mahasiswaModel->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to('mahasiswa');
    }

    public function delete($id_mahasiswa)
    {
        $this->mahasiswaModel->delete($id_mahasiswa);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('mahasiswa');
    }

    public function excel()
    {
        $id_prodi = $this->request->getVar('id_prodi');
        $file = $this->request->getFile('file');
        $newName = $file->getRandomName();
        $file->move('assets/',  $newName);

        $fileName = 'assets/' . $newName;

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($fileName);

        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        for ($i = 2; $i <= count($sheetData); $i++) {
            $nim =  $sheetData[$i]['A'];
            $mahasiswa = $this->mahasiswaModel->getNim($nim);

            if (!$mahasiswa) {
                $data = [
                    'id_prodi' => $id_prodi,
                    'nim' => $nim,
                    'nama' => $sheetData[$i]['B'],
                    'telpon' => $sheetData[$i]['C'],
                ];
                $this->mahasiswaModel->save($data);
            }
        }

        unlink('assets/' . $newName);
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to('mahasiswa');
    }
}
