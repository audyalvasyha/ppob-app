<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require "vendor/autoload.php";


// Isi data
$mail = new PHPMailer(true);
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
// Pengirim
$mail->Username = 'audialfasha@gmail.com';
$mail->Password = 'lalisamanoban';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Reception
$mail->setFrom('audialfasha@gmail.com', 'Audy Al Vasyah');
$mail->addAddress($_POST['Email'], $_POST['Firstname'], $_POST['Lastname']);
$mail->isHTML(true);
$mail->Subject = "Aktivasi pendaftaran Akun";
$mail->Body = "Selamat, Anda berhasil membuat akun. Untuk mengaktifkan akun anda silahkan klik link dibawah ini.
    <a href='http://localhost/all/ratelShop/WebViewShop/webbol.github.io/activation.php?t=" . $token . "'>http://localhost/all/ratelShop/WebViewShop/webbol.github.io/activation.php?t=" . $token . "</a>";
$mail->send();
echo 'Message has been sent';
