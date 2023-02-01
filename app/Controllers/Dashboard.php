<?php

namespace App\Controllers;

use \App\Models\UserModel;

class Dashboard extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];

        return view('dashboard/index', $data);
    }

    public function error()
    {
        $data = [
            'title' => 'Error'
        ];

        return view('dashboard/error', $data);
    }

    public function profil()
    {
        $data = [
            'title' => 'My Profil',
            'user' => $this->userModel->getId(session('id_user'))
        ];

        return view('dashboard/profil', $data);
    }

    public function changeprofil()
    {
        $data = [
            'title' => 'Change Profil',
            'user' => $this->userModel->getId(session('id_user')),
            'validation' => \Config\Services::validation(),
        ];

        return view('dashboard/changeprofil', $data);
    }

    public function updateprofil()
    {
        $id_user = session('id_user');
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
            'nama' => ['rules' => 'required', 'errors' => ['required' => 'nama is required']],
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
            return redirect()->to('/dashboard/changeprofil')->withInput();
        }

        $data = [
            'id_user' => $id_user,
            'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('nama'),
            'telpon' => $this->request->getVar('telpon'),
            'foto' => upload($this->request->getFile('foto'), $this->request->getVar('foto_lama'), 'assets/img'),
        ];

        $this->userModel->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to('/dashboard');
    }

    public function changepassword()
    {
        $data = [
            'title' => 'Change password',
            'validation' => \Config\Services::validation(),
        ];

        return view('dashboard/changepassword', $data);
    }

    public function updatepassword()
    {
        $rules = [
            'password' => ['rules' => 'required|min_length[8]|matches[passconfirm]', 'errors' => [
                'required' => 'password is required',
                'min_length' => 'password must be at least 8 characters in length',
                'matches' => 'password does not match the {param} field',
            ]],
            'passconfirm' => ['rules' => 'required|min_length[8]|matches[password]', 'errors' => [
                'required' => 'passwor confirm is required',
                'min_length' => 'passwor confirm must be at least 8 characters in length',
                'matches' => 'passwor confirm does not match the {param} field',
            ]],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal disimpan');
            return redirect()->to('/dashboard/changepassword')->withInput();
        }
        $id_user = session('id_user');
        $user = $this->userModel->getId(session('id_user'));
        $oldpassword = $this->request->getVar('oldpassword');

        if (password_verify($oldpassword, $user['password'])) {
            $data = [
                'id_user' => $id_user,
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];

            $this->userModel->save($data);
            session()->setFlashdata('success', 'Data berhasil disimpan');
            return redirect()->to('/dashboard');
        } else {
            session()->setFlashdata('error', 'Password lama salah');
            return redirect()->to('/dashboard/changepassword');
        }
    }
}
