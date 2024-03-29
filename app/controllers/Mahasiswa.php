<?php

class Mahasiswa extends Controller {
    public function index()
    {
        $data['judul'] = 'Data Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);  
        $this->view('templates/footer');
    }

    public function detail($Id) // parameter ini di dapat saat menghover detailmahasiswa 
    {
        $data['judul'] = 'Data Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($Id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);  
        $this->view('templates/footer');
    }

    public function tambah()
    {
        // var_dump($_POST);
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0)
        {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else{
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function hapus()
    {
        var_dump($_POST);
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($_POST) > 0)
        {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else{
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }
}