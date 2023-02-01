<?php

namespace App\Controllers;

use \App\Models\ConfigModel;

class Config extends BaseController
{

    protected $configModel;

    public function __construct()
    {
        $this->configModel = new ConfigModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Config',
            'config' => $this->configModel->get(),
            'validation' => \Config\Services::validation()
        ];

        return view('config/index', $data);
    }

    public function update()
    {
        $rules = [
            'appname' => ['rules' => 'required', 'errors' => ['required' => 'App name is required']],
            'copyright' => ['rules' => 'required', 'errors' => ['required' => 'copyright is required']],
            'keywords' => ['rules' => 'required', 'errors' => ['required' => 'keywords is required']],
            'author' => ['rules' => 'required', 'errors' => ['required' => 'author is required']],
            'description' => ['rules' => 'required', 'errors' => ['required' => 'description is required']],
            'logo' => [
                'rules' => 'max_size[logo,500]|is_image[logo]|mime_in[logo,image/png,image/jpeg,image/jpg]',
                'errors' => [
                    'max_size' => 'Logo is too large of a file',
                    'is_image' => 'Logo is not a valid, uploaded image file',
                    'mime_in' => 'Logo does not have a valid type',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('error', 'Data gagal disimpan');
            return redirect()->to('config')->withInput();
        }

        $file = $this->request->getFile('logo');
        if ($file->getError() == 4) {
            $logo = $this->request->getVar('logo_lama');
        } else {
            $file->move('assets/img', $file->getRandomName());
            $logo = $file->getName();
            unlink('assets/img/' . $this->request->getVar('logo_lama'));
        }

        $data = [
            'id_config' => 1,
            'appname' => $this->request->getVar('appname'),
            'copyright' => $this->request->getVar('copyright'),
            'keywords' => $this->request->getVar('keywords'),
            'author' => $this->request->getVar('author'),
            'description' => $this->request->getVar('description'),
            'logo' => $logo,
        ];

        $this->configModel->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to('config');
    }
}
