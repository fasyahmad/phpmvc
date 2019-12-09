<?php

class User_model {
    // kita bisa ambil data dari 
    // - database
    // - API
    // - dll
    private $nama = 'Ahmad Fasya';

    public function getUser()
    {
        return $this->nama;
    }


}