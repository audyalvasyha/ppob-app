<?php
$get_id = $_GET['id'];

session_start();
$encrypt = base64_encode($get_id);
$_SESSION['id'] = $encrypt;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/viewshop1.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        ul li {
            list-style: none;
            float: left;
            padding-right: 20px;
        }

        ul li a {
            text-decoration: none;
            color: #222;
            background-color: #ccc;
            padding: 4px 5px;
            border-radius: 3px;
        }

        .active {
            background-color: #035AAB;
            color: #fff;

        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="header-top" style="position: static;">
            <button onclick="location.href='skeleton.html'" style="background-color: #fff;border: none;">
                <i class="fas fa-arrow-left"></i>
            </button>
            <!-- <i class="fas fa-search"></i> -->
        </div>
        <!-- Content Top -->
        <?php
        include "class-product.php";
        $Product = new Product();
        $Array = $Product->dataProduct("game");
        $data = $Array[$get_id];
        ?>
        <div class="form-duration">
            <div class="container">
                <div class="data"></div>
                <div class="row side">
                    <div class="side-left">
                        <img src="<?= $data['img_product']; ?>" alt="" width="100px">
                    </div>
                    <div class="side-right">
                        <h1 class="title-item">
                            <span id="nmItem"><?= $data['nm_detail']; ?></span>
                        </h1>
                        <div class="label studio">
                            <a href="#" class="nm-studio">#developer</a>
                        </div>
                        <div class="label rate">
                            <span>Rating user</span>
                            <i class="fas fa-star star"></i>
                            <span>4.5</span>
                        </div>
                    </div>
                </div>
            </div><!-- End Content Top -->

            <!-- Content Center -->
            <div class="container">
                <div class="label-tag">
                    <span>Detail Deskripsi</span>
                </div>
                <input type="checkbox" id="check">
                <div class="body-desc">
                    <p>
                        <?php
                        include "config/database.php";
                        $nm = $_GET['nm'];
                        $query = mysqli_query($conn, "SELECT * FROM product WHERE nm_prdct='$nm'");
                        while ($dataServer = mysqli_fetch_array($query)) {
                            $bilA = $dataServer['price_prdct'];
                            echo $dataServer['detail_prdct'];
                        }
                        ?>
                    </p>
                </div>
                <div class="footer-desc">
                    <label for="check" style="color: #03ac0e;height: 30px;font-weight: 600;font-size: 14px;">Baca Selengkapnya</label>
                </div>
            </div><!-- End Content Center -->

            <div class="container">
                <div class="label-tag">
                    <span>1. Masukkan ID Game Anda</span>
                    <span>Panduan</span>
                </div>
                <div class="row" style="flex-direction: column;">
                    <form action="" class="game-form">
                        <div class="form-grup">
                            <input type="text" id="idGame" placeholder="ID Game">
                            <i class="fas fa-times"></i>
                        </div>
                    </form>
                    <i class="label">User ID akan terlihat dibagian bawah Nama Karakter Game Anda. Silakan masukkan User ID Anda untuk menyelesaikan transaksi. Contoh : 12345678(1234).</i>
                </div>
            </div>
            <!-- End -->

            <!-- Opsi Jumlah Top Up -->
            <div class="container">
                <div class="label-tag">
                    <span>2. Pilih Jumlah Top Up</span>
                    <span id="vieAll">Lihat Semua</span>
                </div>
                <?php
                if (array_key_exists("nominal", $data) == TRUE) { // Mengecek Key di dalam array menggunakan fungsi array_key_exists
                    $nominal_array = $data['nominal'];
                    $limit_slice = 7; // update dengan item terlaris
                ?>
                    <span class="subTitle">Terpopuler</span>
                    <div class="row" style="margin: 0 .5rem;">

                        <ul class="list-item">
                            <!-- Menampilkan list diamond terlaris -->
                            <?php
                            foreach (array_slice($nominal_array, 0, $limit_slice) as $value) {
                                echo '<li class="item"> <input type="button" value="' . $value . ' Diamond"></li>';
                            };
                            ?>
                        </ul>
                    </div>
                    <div id="viewAll" style="display: none;">
                        <span class="subTitle">Lainnya</span>
                        <div class="row" style="margin: .5rem 0 0 .5rem;">

                            <ul class="list-item">
                                <!-- Menampilkan seluruh list diamond -->
                                <?php
                                if (array_key_exists("nominal", $data) == TRUE) {
                                    $limit_end = count($data['nominal']);
                                    $slice = array_slice($nominal_array, $limit_slice, $limit_end);
                                    foreach ($slice as $value) {
                                        echo '<li class="item"> <input type="button" value="' . $value . ' Diamond"></li>';
                                    }
                                }
                                ?>

                            </ul>

                        </div>
                    </div>
                <?php
                } else {
                    echo "<center style='margin-bottom: 1rem'>Comming soon</center>";
                }   ?>

            </div> <!-- End -->

            <!-- Metode Pembayaran -->
            <div class="container">
                <div class="label-tag">
                    <span>Metode Pembayaran</span>
                    <span id="openAllPayment">Lihat Semua</span>
                </div>
                <div class="body-pay">
                    <img src="https://cdn3.iconfinder.com/data/icons/currency-17/24/Idr-512.png" alt="" width="30px">
                    <?php
                    $Email = $_SESSION['email'];
                    // Variable diskon di remote dari server
                    $diskon = 15;
                    $_SESSION['ha'] = $diskon;
                    $res = ($diskon / 100);
                    $n = $res * $bilA;
                    $admin = "1000";
                    $total = $bilA - $n + $admin;

                    // Ambil data
                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email='" . $Email . "'");
                    while ($d = mysqli_fetch_array($sql)) {
                        $saldo = $d['saldo'];
                        echo "<span id='saldo'> Saldo " . rp($saldo) . "</span>";
                    }

                    ?>
                </div>
                <ul class="payment">

                    <!-- Metode Transfer Banking -->
                    <label for="transferBank">Bank Transfer - Virtual Account</label>
                    <?php
                    $data1 = $Product->dataProduct("metode_payment");
                    $Array1 = $data1['banking'];
                    foreach ($Array1 as $value) {

                    ?>
                        <li class="item-pay" id=<?= $value['id_item']; ?>>
                            <div class="far"></div>
                            <div class="list">
                                <img src=<?= $value['logo_item']; ?> alt="bri" width="30px;">
                                <?= $value['nm_item']; ?>
                            </div>
                        </li>
                    <?php } ?>
                    <!-- Metode E-Wallet -->
                    <br>
                    <div id="viewPayment" style="display: none;">
                        <label for="eWallet">E-Wallet</label>
                        <?php
                        $data1 = $Product->dataProduct("metode_payment");
                        $Array1 = $data1['e-wallet'];
                        foreach ($Array1 as $value) {

                        ?>
                            <li class="item-pay" id=<?= $value['id_item']; ?>>
                                <div class="far"></div>
                                <div class="list">
                                    <img src=<?= $value['logo_item']; ?> alt="bri" width="30px;">
                                    <?= $value['nm_item']; ?>
                                </div>
                            </li>
                        <?php } ?>
                    </div>
                </ul>
            </div><!-- End Metode Pembayaran -->

            <!-- Ringkasan Pembayaran -->
            <div class="container">
                <div class="label-tag">
                    <span>Ringkasan Pembayaran</span>
                </div>
                <div class="body-sum">
                    <div class="list-detail">
                        <p>Total Tagihan</p>
                        <p id="toTag"><?= rp($a['price_prdct']); ?></p>
                    </div>
                    <div class="list-detail">
                        <p>Diskon %</p>
                        <p id="toDisk">-<?= rp($n); ?></p>
                    </div>
                    <div class="list-detail">
                        <p>Biaya Admin</p>
                        <p id="byAdm"><?= rp($admin); ?></p>
                    </div>
                </div>
            </div><!-- End Ringkasan Pembayaran -->

            <!-- Bayar -->
            <div class="container" style="padding-bottom: 3rem;">
                <div class="agree">
                    <span>Dengan membayar saya menyetujui
                        <span style="color: #03ac0e;">syarat dan ketentuan asuransi</span>
                    </span>
                </div>
                <div class="label-tag">
                    <span id="show">Total Pembayaran</span>
                    <p id="jml"><?= rp($total); ?></p>
                </div>
                <div class="body-pay">
                    <?php
                    if ($saldo < $total) {
                        echo "<button id='notif' class='pay'>Bayar Sekarang</button>";
                    } else {
                        echo "<button class='pay' id='subMit'>Bayar Sekarang</button>";
                    } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Pop Up Notifikasi Saat Saldo Tidak Mencukupi -->
    <div id="note">
        <div style="width: 90%;background-color: #fff;border-radius: 10px;display: flex;flex-direction: rows;align-items: center;justify-content: left;padding: 1.25rem 1rem;margin: 60% auto auto;">
            <img src="https://st4.depositphotos.com/13264288/21997/v/600/depositphotos_219975836-stock-illustration-exhausted-young-guy-flat-design.jpg" alt="" width="60px" height="60px">
            <div style="margin-left: 1rem;">
                <h2 style="line-height: 1.5rem;">Maaf<br><span style="font-weight: 400;font-size: .9rem;">Saldo Anda tidak mencukupi!</span></h2>
                <div style="margin: 1rem 0 0;display:flex">
                    <button class="item-durasi" style="border: 1px solid #03ac0e;color: #03ac0e;" onclick="location.href='skeleton.html'">Isi Saldo</button>
                    <button class="item-durasi" id="cel-note">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/scriptFront.js"></script>
    <script>
        // Fungsi Format Rupiah
        function rubah(angka) {
            var reverse = angka.toString().split('').reverse().join(''),
                ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return ribuan;
        }


        $(document).ready(function() {
            $("#openAllPayment").click(() => {
                $("#viewPayment").toggle();
            })
            // Dropbox Account
            $('#notif').click(function() {
                $('#note').toggle();
            });
            // Notifikasi Saldo
            $('#cel-note').click(function() {
                $('#note').toggle();
            });

            // Mengambil nilai durasi
            $('ul li span').click(function() {
                $('li span').removeClass("active");
                $(this).addClass("active");

                var text = $('.active').text();
                var toTag = $('#toTag');
                var toDisk = $('#toDisk');
                var diskon = <?= $diskon; ?> / 100;
                var nom = Harga * diskon;
                var tre = Harga * 3;
                var nom1 = tre * diskon;
                var sev = Harga * 7;
                var nom2 = sev * diskon;
                var biaya = <?= $admin; ?>;
                var jmlh = $('#jml');
                var sJmlh = $('#jml').text();

                if (text == '1 Hari') {
                    toTag.html('Rp ' + rubah(Harga));
                    toDisk.html('-Rp ' + rubah(nom));
                    jmlh.html('Rp ' + rubah(Harga - nom + biaya));
                } else if (text == '3 Hari') {
                    toTag.html('Rp ' + rubah(tre));
                    toDisk.html('-Rp ' + rubah(nom1));
                    jmlh.html('Rp ' + rubah(tre - nom1 + biaya));
                } else {
                    toTag.html('Rp ' + rubah(sev));
                    toDisk.html('-Rp ' + rubah(nom2.toFixed(0)));
                    jmlh.html('Rp ' + rubah(sev - nom2 + biaya));
                };



                $('#subMit').click(function() {
                    $.ajax({
                        url: 'inject.php',
                        type: 'POST',
                        data: text,
                        success: function(data) {
                            window.location = 'inject.php?to=' + text;
                        },
                        error: function() {
                            alert('Tidak dapat memproses data');
                        }
                    });
                    return false;
                })
            });
            // Meload Container Durasi
            // Mengambil Nilai Get
            // function getUrlVars(param = null) {
            //     if (param !== null) {
            //         var vars = [],
            //             hash;
            //         var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
            //         for (var i = 0; i < hashes.length; i++) {
            //             hash = hashes[i].split('=');
            //             vars.push(hash[0]);
            //             vars[hash[0]] = hash[1];
            //         }
            //         return vars[param];
            //     } else {
            //         return null;
            //     }
            // }
            // $('#subMit').click(function() {
            //     var url = getUrlVars('d');
            //     $.ajax({
            //         url: 'inject.php',
            //         type: 'POST',
            //         data: url,
            //         success: function(data) {
            //             window.location = "inject.php?to=" + url;
            //         },
            //         error: function() {
            //             alert('Tidak dapat memproses data!');
            //         }
            //     });
            //     return false;
            // });
        });
        // $('input[type=checkbox]').on('change', function(evt) {
        //     if ($('input[class=onDay]:checked').length >= 2) {
        //         this.checked = false;
        //         alert("Hanya Boleh memilih maksimal 1");
        //     }
        // })
    </script>
</body>

</html>