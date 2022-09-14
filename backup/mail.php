<?php

require_once("vendor/phpmailer/phpmailer/src/PHPMailer.php");
require_once("vendor/phpmailer/phpmailer/src/SMTP.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;



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
$mail->Host = 'cobainaja.com';
$mail->SMTPAuth = true;
// Pengirim
$mail->Username = 'ratelku@cobainaja.com';
$mail->Password = '1!ULnx4Wrc@O03';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

// Reception
$mail->setFrom('ratelku@cobainaja.com', 'Audy Al Vasyah');
$mail->addAddress($_POST['Email'], $_POST['Firstname'], $_POST['Lastname']);
$mail->isHTML(true);
$mail->Subject = "Aktivasi pendaftaran Akun";
$mail->Body = "Selamat, Anda berhasil membuat akun. Untuk mengaktifkan akun anda silahkan klik link dibawah ini.
    <a href='http://localhost:8080/archive/activation.php?t=" . $token . "'>activation.php?t=" . $token . "</a>";
$mail->send();
echo '<div id="notes" style=" display: block;position: fixed;left: 0;top: 0;width: 100%;height: 100vh;background-color: #9c9c9c8f;z-index: 999;">
                        <div style="width: 90%;background-color: #fff;border-radius: 10px;display: flex;flex-direction: rows;align-items: center;justify-content: left;padding: 1.25rem 1rem;margin: 60% auto auto;">
                               <div style="margin-left: 1rem;">
                                   <h2 style="line-height: 1.5rem;">Selamat Pendaftaran Anda berhasil!<br><span style="font-weight: 400;font-size: .9rem;">silahkan cek email anda untuk aktifasi.</span></h2>
                                   <div style="margin: 1rem 0 0;display:flex">
                                       <button class="item-durasi" style="border: 1px solid #03ac0e;color: #03ac0e;" id="notif">Login</button>
                                       <button class="item-durasi" id="cel-note">Cancel</button>
                                   </div>
                               </div>
                           </div>
                    </div>';