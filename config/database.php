<?php
// Class Database
$host = "localhost";
$user = "root";
$pass = "";
$name = "cobaina1_cheatshop";

$conn = mysqli_connect($host, $user, $pass, $name);
if(!$conn) {
    die("Koneksi Anda Gagal: ".mysqli_connect_error());
}


function rp($int)
{
    $sult = "Rp " . number_format($int, 0, ',', '.');
    return $sult;
}