<?php

function getNavigasi()
{
    $db = \Config\Database::connect();
    return $db->table('tabel_akses')
        ->join('tabel_navigasi', 'tabel_navigasi.id_navigasi = tabel_akses.id_navigasi')
        ->orderBy('urutan', 'ASC')
        ->getWhere(['id_profil' => session('id_profil')])
        ->getResultArray();
}

function getUser()
{
    $db = \Config\Database::connect();
    return $db->table('tabel_user')
        ->join('tabel_profil', 'tabel_profil.id_profil = tabel_user.id_profil')
        ->getWhere(['id_user' => session('id_user')])
        ->getRowArray();
}

function checkAccess($id_profil, $id_navigasi)
{
    $db = \Config\Database::connect();
    $akses = $db->table('tabel_akses')->getWhere(['id_profil' => $id_profil, 'id_navigasi' => $id_navigasi])->getResult();

    if (count($akses) > 0) {
        return "checked";
    }
}

function upload($file, $oldName, $temp)
{
    if ($file->getError() == 4) {
        $newName = $oldName;
    } else {
        $file->move($temp, $file->getRandomName());
        $newName = $file->getName();

        if ($oldName) {
            unlink($temp . '/' . $oldName);
        }
    }

    return $newName;
}

function getCount($param)
{
    $db = \Config\Database::connect();
    return $db->table($param)->get()->getNumRows();
}

function cekDataTerpakai($tabel, $where)
{
    $db = \Config\Database::connect();
    $data  = $db->table($tabel)->getWhere($where)->getResult();

    if ($data) {
        return true;
    }
}

function kodeBuku()
{
    $db = \Config\Database::connect();
    $data  = $db->table('tabel_buku')
        ->selectMax('kode')
        ->get()
        ->getRowArray();

    $kode = $data['kode'];

    if ($kode) {
        $strToArray = explode('-', $kode);
        $kode = $strToArray[1] + 1;
    } else {
        $kode = 1;
    }

    $kodeBaru = 'PU-' . sprintf("%06s", $kode);
    return $kodeBaru;
}
