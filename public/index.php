<!-- jadi ini manggil semual yang ada di dalam folder app -->

<?php
// teknik bootstraping : memanggil satu file lalu file itu memanggil semua file
require_once '../app/init.php'; 


// intansiasi class App yang sudah di buat

$app = new App;