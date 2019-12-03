<?php

class App{
    // membuar properti untuk menentukan controller dan method defaultnya
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();
        // ada ga di dalam folder controllers nama file sesuai dengan nama url ex : home/idex 
        // ini buat controller
        if (file_exists('../app/controllers/' . $url[0] . '.php')){
            $this->controller = $url[0];
            unset($url[0]); // ini dihapus biar bisa ngambil parameternya
            // var_dump($url);
        } 

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //method
        if (isset($url[1])){
            if (method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }


        // params 
        if (!empty($url)){
            $this->params = array_values($url);
        }

        // jalankan controller dan method, serta kirimkan params jika ada   
        call_user_func_array([$this->controller, $this->method], $this->params); 

    }



    // membut method untuk menggambil url yang ada 
    public function parseURL()
    {
        // jika ada URL yang di kirimkan, maa ambil isinya
        if (isset($_GET['url']))
        {
            // isi url dengan urlnya
            $url = rtrim( $_GET['url'], '/'); // untuk menghapus garing di akhir
            $url = filter_var($url, FILTER_SANITIZE_URL); // agar url bersih dari karakter2 yang aneh
            $url = explode('/', $url); // memecah setiap kata dengan '/' menjadi array
            return $url;
        }
    }
}