<?php

class Controller {
    // fungsi view param pertama : menangkap $this->view('home/index'); , param kedua untuk menangkap data
    public function view($view, $data = []){
        //panggil viewnya yang ada di folder views 
        // folder sekaran ada di public->index.php jadi harus keluar dulu
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        // karena ini kelas kita harus instansiasi dulu 
        return new $model;
    }
}