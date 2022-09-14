<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi pembayaran | Cobainaja</title>
    <link rel="stylesheet" href="css/viewshop.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <?php
    session_start();
    include "config/database.php";
    // Mengumpulkan Data dari Halaman Sebelumnya dengan SESSION
    $Email = $_SESSION['email'];
    $Enc = $_SESSION['id'];
    $Disk = $_SESSION['ha'];

    $decrypt = base64_decode($Enc);
    $No_Order = date('Ymdhis');
    $admin = 1000;

    // Mengambil Saldo Berdasarkan Email dari Table account
    $sql1 = mysqli_query($conn, "SELECT * FROM users WHERE email='" . $Email . "'");
    while ($d = mysqli_fetch_array($sql1)) {
        $saldo = $d['saldo'];
    }
    ?>
    <div class="wrapper" style="height: 100vh;padding-top: 50px;background-color: #eee;">
        <div class="header-top">
            <button onclick="window.history.go(-1)" style="background-color: #fff;border: none;">
                <i class="fas fa-arrow-left"></i>
            </button>
            <h3>Verifikasi Pembayaran</h3>
            <i class="far fa-question-circle"></i>
        </div>
        <div class="container" style="background-color: transparent;">
            <h3 style="text-align: center;line-height: 1.5rem;margin: 1.5rem 0;">Terimakasih Atas Pemesanan Anda!<br><span style="font-size: .8rem;font-weight: 400;">Nomor Order Anda: <?= $No_Order; ?></span></h3>
            <div class="d-body" style="background-color: #fff;border-radius: 8px;margin: 0 1.5rem;padding: 1rem;position: relative;">
                <div class="label-tag" style="justify-content: center;padding: 0 0 2rem 0;font-weight: 400;font-size: 1.2rem;">
                    <span>Detail Pesanan</span>
                </div>
                <?php
                $sql2 = mysqli_query($conn, "SELECT * FROM product WHERE id_product='" . $decrypt . "'");
                while ($e = mysqli_fetch_array($sql2)) {

                ?>
                    <div class="body-sum">
                        <div class="list-detail are">
                            <p style="margin-bottom: 1rem;">Pesanan :</p>
                            <p style="max-width: 150px;line-height: 1rem;text-align: right;"><?= $e['nm_prdct']; ?></p>
                        </div>
                        <div class="list-detail are">
                            <p>Durasi Sewa :</p>
                            <p>
                                <?php
                                $Dur =  $_GET['to'];
                                if($Dur == 'MSBIYXJp') {
                                    echo '1 Hari';
                                } else if ($Dur == 'MyBIYXJp') {
                                    echo '3 Hari';
                                } else if ($Dur == 'NyBIYXJp') {
                                    echo '7 Hari';
                                }
                                
                                ?>
                            </p>
                        </div>
                        <div class="list-detail are">
                            <p>Total Tagihan :</p>
                            <p>
                                <?php
                                $Ha = $e['price_prdct'];
                                $Not = $Disk / 100;
                                if ($Dur == 'MSBIYXJp') {
                                    echo rp($Ha);
                                } else if ($Dur == 'MyBIYXJp') {
                                    echo rp($Ha * 3);
                                    // $Dis = $Nih * $Not;
                                    // echo rp($Nih - $Dis + 1000);
                                } else if ($Dur == 'NyBIYXJp') {
                                    echo rp($Ha * 7);
                                    // $Dis = $Nih * $Not;
                                    // echo rp($Nih - $Dis + 1000);
                                }
                                ?>
                            </p>
                        </div>
                    </div><br>
                    <div class="body-sum">
                        <div class="list-detail are">
                            <p>Potongan Diskon %:</p>
                            <p><?php
                                if ($Dur == 'MSBIYXJp') {
                                    echo '-' . rp($Ha * $Not);
                                } else if ($Dur == 'MyBIYXJp') {
                                    echo '-' . rp($Ha * 3 * $Not);
                                    // $Dis = $Nih * $Not;
                                    // echo rp($Nih - $Dis + 1000);
                                } else if ($Dur == 'NyBIYXJp') {
                                    echo '-' . rp($Ha * 7 * $Not);
                                    // $Dis = $Nih * $Not;
                                    // echo rp($Nih - $Dis + 1000);
                                }
                                ?></p>
                        </div>
                        <div class="list-detail are">
                            <p>Biaya Admin :</p>
                            <p><?= rp($admin); ?></p>
                        </div>
                    </div>
                    <div class="label-tag" style="margin-top: 2rem">
                        <span>Total :</span>
                        <div>Rp
                            <span id="noMinal"></span>
                        </div>
                    </div>
                <?php } ?>
                <div class="body-pay">
                    <button class="pay" id="submit">Konfirmasi</button>
                </div>
                <div style="font-size: .6rem;color: #969696;text-align: center;padding: .5rem .5rem 0;">
                    <span>Dengan membayar saya menyetujui
                        <span style="color: #03ac0e;">syarat dan ketentuan asuransi</span>
                    </span>
                </div>
            </div>
            <h3 style="text-align: center;line-height: 1.5rem;margin: 1.5rem 0;">Klik Tombol Konfirmasi <br><span style="font-size: .8rem;font-weight: 400;">Sistem sedang memproses game anda, Happy Fun!</span></h3>
        </div>
    </div>
    <script>
        // Fungsi Format Rupiah
        function rubah(angka) {
            var reverse = angka.toString().split('').reverse().join(''),
                ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return ribuan;
        }
        $(document).ready(function() {
            var dataphp = <?php
                            if ($Dur == 'MSBIYXJp') {
                                $cek = $Ha * $Not;
                                echo $Ha - $cek + $admin;
                            } else if ($Dur == 'MyBIYXJp') {
                                $cek = $Ha * 3 * $Not;
                                echo $Ha * 3 - $cek + $admin;
                                // $Dis = $Nih * $Not;
                                // echo $Nih - $Dis + 1000);
                            } else if ($Dur == 'NyBIYXJp') {
                                $cek = $Ha * 7 * $Not;
                                echo $Ha * 7 - $cek + $admin;
                                // $Dis = $Nih * $Not;
                                // echo $Nih - $Dis + 1000);
                            }
                            ?>;
            $('#noMinal').html(rubah(dataphp));
            $('#submit').click(function() {
                $.ajax({
                    url: 'unzip.php',
                    type: 'POST',
                    data: dataphp,
                    success: function(data) {
                        window.location = 'unzip.php?n=' + dataphp;
                    },
                    error: function() {
                        alert('Tidak dapat memproses data');
                    }
                });
                return false;
            });
        });
    </script>
</body>

</html>