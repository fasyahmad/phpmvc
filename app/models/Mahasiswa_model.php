<?php

// nama class sama dengan nama file
class Mahasiswa_model
{

    private $table = 'mahasiswa';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($Id)
    {
        // id tidak langsung di pangil untuk menghindari sql injection
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE Id =:id'); 
        $this->db->bind('id', $Id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa VALUES ('', :Nama, :Nrp, :Email, :Jurusan)";

        $this->db->query($query);
        $this->db->bind("Nama", $data['Nama']);
        $this->db->bind("Nrp", $data['Nrp']);
        $this->db->bind("Email", $data['Email']);
        $this->db->bind("Jurusan", $data['Jurusan']);

        $this->db->execute();
        $this->db->rowCount();
    }


}