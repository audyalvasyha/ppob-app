<?php
include "config/database.php";
session_start();
$Zip = new ZipArchive;
$Extract = $Zip->open('archive.zip');
if ($Extract === TRUE) {
    // Mengekstrak zip ke Direktori
    $Zip->extractTo('archive/');
    $Zip->close();
    $sal = $_GET['n'];
    $Email = $_SESSION['email'];
    $query = mysqli_query($conn, "SELECT * FROM cheat_shop.users WHERE email='$Email'");

    while ($a = mysqli_fetch_array($query)) {
        $cek = $a['saldo'];
        $salAk = $cek - $sal;
    }
    mysqli_query($conn, "UPDATE users SET saldo='$salAk' WHERE email='$Email'");
    // Merubah permision Direktori
    chmod('archive', 0777);
    header("Location:skeleton.html");
} else {
    echo "Gagal";
}
