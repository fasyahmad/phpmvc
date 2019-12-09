<?php

class Home extends Controller{
    public function index()
    {
        //alamat yang kita tuju di folder view -> home -> index.php

        $data['judul'] = 'Home';
        // ngambil data dari modele : panggil class User_model -> pangil fungsi getUser()
        // $this->model : 'model' ini harus di bikin dulu di controller 
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}