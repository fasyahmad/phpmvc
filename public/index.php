<!-- jadi ini manggil semual yang ada di dalam folder app -->

<?php
// teknik bootstraping : memanggil satu file lalu file itu memanggil semua file
require_once '../app/init.php'; 
//jika di web kita tidak ada session nya maka jalanka season
if (!session_id())
{
    session_start();
}


// intansiasi class App yang sudah di buat

$app = new App;