<?php

namespace App\Controllers;

use \App\Models\UserModel;

class Login extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login'
        ];

        return view('login/index', $data);
    }

    public function process()
    {
        $rules = [
            'username'   => ['rules' => 'required', 'errors' => ['required' => 'Username is required']],
            'password'   => ['rules' => 'required', 'errors' => ['required' => 'Password is required']],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Login gagal');
            return redirect()->to('/login')->withInput();
        }

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $user = $this->userModel->getUsername($username);

        if ($user) {
            if ($user['aktif'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_user' => $user['id_user'],
                        'id_profil' => $user['id_profil'],
                    ];

                    session()->set($data);
                    session()->setFlashdata('success', 'Login Berhasil');
                    return redirect()->to('/dashboard');
                } else {
                    session()->setFlashdata('error', 'Username / Paswword Salah');
                    return redirect()->to('/login');
                }
            } else {
                session()->setFlashdata('error', 'Akun anda tidak aktif');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('error', 'Username / Paswword Salah');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $data = ['id_user', 'id_profil'];
        session()->remove($data);
        session()->set('');
        session()->setFlashdata('success', 'Logout Berhasil');
        return redirect()->to('/login');
    }
}
