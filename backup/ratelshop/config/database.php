<?php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'cobaina1_cheatshop';
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

function rp($int)
{
    $sult = "Rp " . number_format($int, 0, ',', '.');
    return $sult;
}
