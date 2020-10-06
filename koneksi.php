<?php
$host   = "sql310.epizy.com";
$user   = "epiz_26774857";
$psw    = "I0okZbiQVtjMe9";
$db_name = "epiz_26774857_database2";
$koneksi = mysqli_connect($host, $user, $psw, $db_name);

//cek jika koneksi ke mysql gagal, maka akan tampil pesan berikut
if (mysqli_connect_errno()) {
    echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}
