<?php


// ini harus di extend ke main kontroller yang ada di folder core file Controller.php
class About extends Controller{

    public function index($nama = "Ahmad Fasya", $perkerjaan = "Buruh", $status = "Palsu")
    {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $perkerjaan;
        $data['status'] = $status;
        $data['judul'] = 'About Me';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page(){

        $data['judul'] = 'Pages';
        // $this->view : panggil method view
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }

}