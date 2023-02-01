<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LoginFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session('id_user')) {
            session()->setFlashdata('error', 'Harap Login Terlebih Dahulu');
            return redirect()->to('/');
        } else {
            // hak akses
            $db = \Config\Database::connect();
            $request = \Config\Services::request();
            $url = $request->uri->getSegment(1);

            $navigasi = $db->table('tabel_navigasi')->getWhere(['url' => $url])->getRowArray();
            $akses = $db->table('tabel_akses')->getWhere(['id_profil' => session('id_profil'), 'id_navigasi' => $navigasi['id_navigasi']])->getRowArray();
            if (!$akses) {
                session()->setFlashdata('error', 'Anda tidak memiliki akses');
                return redirect()->to('/dashboard/error');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session('id_user')) {
            return redirect()->to('/dashboard');
        }
    }
}
