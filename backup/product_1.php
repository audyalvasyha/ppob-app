<?php
include "config/database.php";
session_start();

$id_name = $_GET['id'];
$encrypt = base64_encode($id_name);
$_SESSION['id'] = $encrypt;


$query = mysqli_query($conn, "SELECT * FROM product WHERE id_product='$id_name'");

while ($a = mysqli_fetch_array($query)) {
    $bilA = $a['price_prdct'];
    $diskon = 15;
    $_SESSION['ha'] = $diskon;
    $res = ($diskon / 100);
    $n = $res * $bilA;

    $admin = "1000";

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $nm = $a['nm_prdct']; ?> | Cobainaja</title>
        <link rel="stylesheet" href="css/viewshop.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <style>
            ul li {
                list-style: none;
                float: left;
                padding: 10px 10px 10px 0;
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
            #btnClr {
                color: #999999;
                font-size: 14px;
                position: relative;
                left: -20px;
                display: none;
            }
        </style>
    </head>

    <body>
        <div class="wrapper">
            <div class="header-top" style="position: static;">
                <button onclick="location.href='index.html'" style="background-color: #fff;border: none;">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <!-- <i class="fas fa-search"></i> -->
            </div>
            <!-- Content Top -->
            <div class="form-duration">
                <div class="container">
                    <div class="data"></div>
                    <div class="row side">
                        <div class="side-left">
                            <img src="<?= $a['images_prdct']; ?>" alt="" width="100px">
                        </div>
                        <div class="side-right">
                            <h1 class="title-item">
                                <span id="nmItem"><?= $nm = $a['nm_prdct']; ?></span>
                            </h1>
                            <div class="label studio">
                                <a href="#" class="nm-studio"><?= $a['nm_studio']; ?></a>
                                <a href="#" class="catg"><?= $a['categories']; ?></a>
                            </div>
                            <div class="label for">
                                <img src="https://play-lh.googleusercontent.com/mw_NfsvKM8m6RPv8Fz2GQawCOsqWv010saMnc7zbWalMxuaA9IY8h7E0VMieLxSxAFB98NFeYqbFrXXq=s28-rw" alt="" width="14px">
                                <span>Remaja</span>
                            </div>
                            <div class="label rate">
                                <i class="fas fa-star star"></i>
                                <span>4.5</span>
                                <i class="fas fa-download user"></i>
                                <span>12rb</span>
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
                        <p><?= $a['detail_prdct']; ?></p>
                    </div>
                    <div class="footer-desc">
                        <label for="check" style="color: #03ac0e;height: 30px;font-weight: 600;font-size: 14px;">Baca Selengkapnya</label>
                    </div>
                </div><!-- End Content Center -->

                <!-- User Id -->

                <div class="container">
                    <div class="label-tag">
                        <span>Masukkan User ID</span>
                        <span>Lihat Panduan</span>
                    </div>
                    <div class="row">
                        <form action="" method="">
                            <div class="input-group">
                                <input type="number" id="inpId" placeholder="Masukkan ID Game Anda"/>
                                <i class="fas fa-times" id="btnClr"></i>
                                <i class="fas fa-search"></i>
                            </div>
                        </form>
                        <i class="label">User ID akan terlihat dibagian bawah Nama Karakter Game Anda. Silakan masukkan User ID Anda untuk menyelesaikan transaksi. Contoh : 12345678(1234).</i>
                    </div>
                </div>
                <!-- End User Id -->
                <!-- Nominal Top Up -->

                <div class="container">
                    <div class="label-tag">
                        <span>Pilih Nominal</span>
                    </div>
                    <div class="row">
                        <div class="header-navigasi" style="outline: none;padding: 0;">
                            <ul class="durasi" style="width: max-content;">
                                <li>
                                    <span class="item-durasi">50 Diamond</span>
                                </li>
                                <li>
                                    <span class="item-durasi">100 Diamond</span>
                                </li>
                                <li>
                                    <span class="item-durasi">250 Diamond</span>
                                </li>
                                 <li>
                                    <span class="item-durasi">500 Diamond</span>
                                </li>
                            </ul>
                        </div>
                        <div class="label">Stok tersisa 20, beli segera!</div>
                    </div>
                </div>
                <!-- End Nominal Top Up -->

                <!-- Metode Pembayaran -->
                <div class="container">
                    <div class="label-tag">
                        <span>Metode Pembayaran</span>
                        <span>Lihat Semua</span>
                    </div>
                    <div class="body-pay">
                        <img src="https://cdn3.iconfinder.com/data/icons/currency-17/24/Idr-512.png" alt="" width="30px">
                        <?php
                        $Email = $_SESSION['email'];
                        $total = $bilA - $n + $admin;

                        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email='" . $Email . "'");
                        while ($d = mysqli_fetch_array($sql)) {
                            $saldo = $d['saldo'];
                            echo "<span id='saldo'>" . rp($saldo) . "</span>";
                        }

                        ?>
                    </div>
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
                <div class="container">
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
        <script>
        
            // Fungsi Format Rupiah
            function rubah(angka) {
                var reverse = angka.toString().split('').reverse().join(''),
                    ribuan = reverse.match(/\d{1,3}/g);
                ribuan = ribuan.join('.').split('').reverse().join('');
                return ribuan;
            }
            $(document).ready(function() {
                // Dropbox Account
                $('#notif').click(function() {
                    $('#note').toggle();
                });
                // Notifikasi Saldo
                $('#cel-note').click(function() {
                    $('#note').toggle();
                });
                
                $('#inpId').on('keyup', function() {
                    if($("#inpId").val() != '') {
                        $('#btnClr').css('display', 'flex');
                    } else {
                        $('#btnClr').css('display', 'none');
                    }
                
                });
                $('#btnClr').click(function() {
                    $("#inpId").val(false);
                    $('#btnClr').css('display', 'none');
                })

                // Mengambil nilai durasi
                $('ul li span').click(function() {
                    $('li span').removeClass("active");
                    $(this).addClass("active");
                    
                    
                    // Membuat Encrypt code
                    var text = $('.active').text();
                    if(text == '1 Hari') {
                        var txt = "<?= base64_encode('1 Hari'); ?>";
                    } else if (text == '3 Hari') {
                         var txt = "<?= base64_encode('3 Hari'); ?>";
                    } else {
                         var txt = "<?= base64_encode('7 Hari'); ?>";
                    }
                    
                    
                    var Harga = <?= $a['price_prdct']; ?>;
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
                            data: txt,
                            success: function(data) {
                                window.location = 'inject.php?to=' + txt;
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
<?php } ?>