<?php
include "config/database.php";
$token = $_GET['t'];
$sql_cek = mysqli_query($conn, "SELECT * FROM users WHERE token='" . $token . "' AND aktif='0'");
$jmlh_data = mysqli_num_rows($sql_cek);
if ($jmlh_data > 0) {
    // Update data user aktif
    mysqli_query($conn, "UPDATE users SET aktif='1' WHERE token='" . $token . "' AND aktif='0'");
    echo "Akun Anda sudah aktif, silahkan <a href='login.php'>Login</a>";
} else {
    echo "Invalid token";
}
