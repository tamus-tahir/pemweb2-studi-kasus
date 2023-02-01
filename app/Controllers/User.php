<?php

namespace App\Controllers;

use \App\Models\UserModel;
use \App\Models\ProfilModel;

class User extends BaseController
{
    protected $userModel;
    protected $profilModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->profilModel = new ProfilModel();
    }

    public function index()
    {
        $data = [
            'title' => 'User',
            'user' => $this->userModel->get()
        ];

        return view('user/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah User',
            'profil' => $this->profilModel->get(),
            'validation' => \Config\Services::validation(),
        ];

        return view('user/create', $data);
    }

    public function save()
    {
        $rules = [
            'username' => ['rules' => 'required|is_unique[tabel_user.username]', 'errors' => [
                'required' => 'username is required',
                'is_unique' => 'username must contain a unique value',
            ]],
            'password' => ['rules' => 'required|min_length[8]|matches[passwor_confirm]', 'errors' => [
                'required' => 'password is required',
                'min_length' => 'password must be at least 8 characters in length',
                'matches' => 'password does not match the {param} field',
            ]],
            'passwor_confirm' => ['rules' => 'required|min_length[8]|matches[password]', 'errors' => [
                'required' => 'passwor confirm is required',
                'min_length' => 'passwor confirm must be at least 8 characters in length',
                'matches' => 'passwor confirm does not match the {param} field',
            ]],
            'id_profil' => ['rules' => 'required', 'errors' => ['required' => 'profil is required']],
            'nama' => ['rules' => 'required', 'errors' => ['required' => 'nama is required']],
            'aktif' => ['rules' => 'required', 'errors' => ['required' => 'aktif is required']],
            'foto' => [
                'rules' => 'max_size[foto,520]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'foto is too large of a file.',
                    'mime_in' => 'foto does not have a valid mime type.',
                    'is_image' => 'foto is not a valid, uploaded image file.',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal disimpan');
            return redirect()->to('/user/create')->withInput();
        }

        $data = [
            'id_profil' => $this->request->getVar('id_profil'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'nama' => $this->request->getVar('nama'),
            'telpon' => $this->request->getVar('telpon'),
            'aktif' => $this->request->getVar('aktif'),
            'foto' => upload($this->request->getFile('foto'), null, 'assets/img'),
        ];

        $this->userModel->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to('/user');
    }

    public function edit($id_user)
    {
        $data = [
            'title' => 'Ubah User',
            'profil' => $this->profilModel->get(),
            'validation' => \Config\Services::validation(),
            'user' => $this->userModel->getId($id_user)
        ];

        return view('user/edit', $data);
    }

    public function update($id_user)
    {
        $user = $this->userModel->getId($id_user);
        if ($user['username'] == $this->request->getVar('username')) {
            $ruleUsername = 'required';
        } else {
            $ruleUsername = 'required|is_unique[tabel_user.username]';
        }
        $rules = [
            'username' => ['rules' => $ruleUsername, 'errors' => [
                'required' => 'username is required',
                'is_unique' => 'username must contain a unique value',
            ]],
            'id_profil' => ['rules' => 'required', 'errors' => ['required' => 'profil is required']],
            'nama' => ['rules' => 'required', 'errors' => ['required' => 'nama is required']],
            'aktif' => ['rules' => 'required', 'errors' => ['required' => 'aktif is required']],
            'foto' => [
                'rules' => 'max_size[foto,520]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'foto is too large of a file.',
                    'mime_in' => 'foto does not have a valid mime type.',
                    'is_image' => 'foto is not a valid, uploaded image file.',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal disimpan');
            return redirect()->to('/user/edit/' . $id_user)->withInput();
        }

        $data = [
            'id_user' => $id_user,
            'id_profil' => $this->request->getVar('id_profil'),
            'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('nama'),
            'telpon' => $this->request->getVar('telpon'),
            'aktif' => $this->request->getVar('aktif'),
            'foto' => upload($this->request->getFile('foto'), $this->request->getVar('foto_lama'), 'assets/img'),
        ];

        $this->userModel->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to('/user');
    }

    public function delete($id_user)
    {
        $user = $this->userModel->getId($id_user);
        if ($user['foto']) {
            unlink('assets/img/' . $user['foto']);
        }
        $user = $this->userModel->delete($id_user);
        session()->setFlashdata('success', 'Data Berhasil Dihapus');
        return redirect()->to('/user');
    }

    public function detail()
    {
        echo json_encode($this->userModel->getId($this->request->getVar('id')));
    }

    public function password($id_user)
    {
        $rules = [
            'password' => ['rules' => 'required|min_length[8]|matches[passwor_confirm]', 'errors' => [
                'required' => 'password is required',
                'min_length' => 'password must be at least 8 characters in length',
                'matches' => 'password does not match the {param} field',
            ]],
            'passwor_confirm' => ['rules' => 'required|min_length[8]|matches[password]', 'errors' => [
                'required' => 'passwor confirm is required',
                'min_length' => 'passwor confirm must be at least 8 characters in length',
                'matches' => 'passwor confirm does not match the {param} field',
            ]],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal disimpan');
            return redirect()->to('/user')->withInput();
        }

        $data = [
            'id_user' => $id_user,
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];

        $this->userModel->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to('/user');
    }
}
