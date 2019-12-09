<?php

class Database{
    // ini diambil dari config/config 
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh; // database handler
    private $stmt; // statment untuk menampung query


    //koneksi ke database   
    public function __construct()
    {
        // untuk identitas server (dsn : data source name)
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        // $dsn = 'mysql:host=localhost; dbname=mahasiswa;' ;
        // $dsn = "mysql:host=localhost; dbname=mahasiswa"; 



        // option : untuk mengoptimalisasi koneksi ke db
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        // cek koneksi ke database
        try{
            $this->dbh = new PDO($dsn, $this->user,  $this->pass, $option);
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }


    // fungsi untuk menjalankan query agar fleksibel bisa : insert, delete, update dll
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    //binding data 
    public function bind($param, $value, $type = null){
        if( is_null($type) ){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }   
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    { 
        $this->stmt->execute();
    }


    // kalo ngambil data semuanya
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // kalo ngambil data semuanya
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }


    // untuk menghtung ada berapa baris yang berubah di tabel pada database -> ini fungsu milik kita
    public function rowCount()
    {
        // ini untuk PDO
        return $this->stmt->rowCount();
    }
}