<?php
include "config/database.php";
session_start();

$query = mysqli_query($conn, 'SELECT * FROM cobaina1_cheatshop.product ORDERS LIMIT 5');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css" />
    <link rel="stylesheet" href="css/viewshop.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <div class='wrapper'>
        <div class="data" style="position: fixed;top: 0;left: 0;right: 0;z-index: 5;"></div>
        <div class="header-top">
            <form action="" class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" name="keyword" id='keyword' class="search-input" placeholder="Search for game ..." autocomplete="off">
            </form>
            <div class="fitur">
                <i class="far fa-heart"></i>
                <i class="far fa-comment-alt-lines"></i>
                <i class="far fa-shopping-cart"></i>
            </div>
        </div>
        <div class="header-bottom">
            <?php
            $Email = $_SESSION['email'];

            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email='" . $Email . "'");
            while ($d = mysqli_fetch_array($sql)) {

            ?>
                <div id="account">
                    <div class="account-picture">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="account-name">Hi, <?= $d['username']; ?></div>
                    <i class="fas fa-angle-down"></i>
                </div>
                <ul class="dropbox">
                    <li style="padding: .5rem 1rem;border-bottom: 1px solid #dbdbdb">Profile</li>
                    <li style="padding: .5rem 1rem">Logout</li>
                </ul>
                <div class="top-up">
                    <i class="far fa-usd-circle"></i>
                <?php
                echo rp($d['saldo']);
            }
                ?>
                </div>
        </div>
        <div class="header-navigasi" style="height: 40px;">
            <ul>
                <li class="item-link">
                    <img src="assets/icons/category_icon.svg" alt="" width="12px">
                    <a href="#" class="link-head">Semua</a>
                </li>
                <li class="item-link">
                    <i class="far fa-lightbulb"></i>
                    <a href="#" class="link-head">Tips & Trick</a>
                </li>
                <li class="item-link">
                    <i class="fab fa-android"></i>
                    <a href="#" class="link-head">Android</a>
                </li>
                <li class="item-link">
                    <i class="fab fa-apple"></i>
                    <a href="#" class="link-head">IOS</a>
                </li>
                <li class="item-link">
                    <i class="fas fa-desktop"></i>
                    <a href="#" class="link-head">Computers</a>
                </li>
                <li class="item-link">
                    <i class="far fa-comments-alt"></i>
                    <a href="#" class="link-head">Feedback</a>
                </li>
            </ul>
        </div>

        <div class="container">
            <!-- Item For sale -->
            <div class="label-tag">
                <span>Terpopuler</span>
                <span>Lihat semua</span>
            </div>
            <div class="rows">
                <?php
                $query1 = mysqli_query($conn, 'SELECT * FROM cobaina1_cheatshop.product');
                foreach ($query1 as $key => $b) {
                ?>
                    <a href="product_1.php?id=<?= $b['id_product']; ?>&d=" class="col">
                        <div class="item">
                            <img src="<?= $b['images_prdct']; ?>" alt="" width="95%">
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div><!-- End Item -->

        <!-- Bonus Pengguna baru -->
        <div class="container">
            <div class="label-tag">
                <span>Bonus Pengguna Baru <br>
                    <span style="font-weight: 350;color: #31353b;font-size: 14px;">Berakhir dalam</span>
                </span>
                <div style="border: 1px solid red;padding: 0 8px;border-radius: 10px">
                    <span id="time" style="color: red;font-weight: 400">01:05:00</span>
                </div>
            </div>
            <div class="body-container">
                <div class="header-navigasi" style="outline: none;padding-left: 30%;background: transparent;">
                    <ul style="background-color: #47a651;height: 220px;padding: 10px;">
                        <?php
                        foreach ($query as $a) {

                        ?>
                            <li class="link-item">
                                <img src="<?= $a['images_prdct']; ?>" alt="" width="100px">
                                <div class="body-card">
                                    <p class="harga"><?= rp($a['price_prdct']); ?></p>
                                    <div class="diskon" style="line-height: 16px;"><span>51%</span><s style="color: #979797;text-decoration: line-through;font-size: 8px;margin: 0 5px;">Rp 20.000</s></div>
                                </div>
                                <span style="font-size: 8px;">Tersisa 2 dari <?= $a['stock_prdct']; ?></span>
                            </li>
                        <?php } ?>
                        <li class="link-item" style="width: 100px;">
                            <a href="#" class="view-all">
                                <i class="fas fa-angle-right" style="color: #fff;font-size: 1.5rem"></i>
                            </a>
                            <span style="text-align: center;margin-bottom: 1rem;line-height: 1rem">Lihat semua</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Bonus -->

        <div class="container">
            <div class="label-tag">
                <span>Produk Per Partial</span>
                <span>Lihat semua</span>
            </div>
            <?php
            $query2 = mysqli_query($conn, 'SELECT * FROM cobaina1_cheatshop.product Orders LIMIT 3');
            $no = 1;
            foreach ($query2 as $key => $c) {
            ?>
                <a href="product_1.php?id=<?= $no++; ?>&d=">
                    <div class="row side" style="border: rgb(218, 226, 237) solid 1px;border-radius: 10px;margin: 8px 1rem;padding: 6px;">
                        <div class="side-left" style="display: flex;align-items: center;max-width: 70px;margin: 0 10px 0 0;">
                            <img src="<?= $c['images_prdct']; ?>" alt="" width="60px" style="border-radius: 10px;">
                        </div>
                        <div class="side-right" style="max-width: 70%">
                            <h1 class="title-item" style="font-size: 14px;margin: 0;line-height: 1.2rem;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                <span><?= $c['nm_prdct']; ?></span>
                            </h1>
                            <div class="label studio" style="font-size: 13px;">
                                <span class="nm-studio"><?= $c['nm_studio']; ?></span>
                                <span class="catg"><?= $c['categories']; ?></span>
                            </div>
                            <div class="label rate" style="margin: 0;font-size: .8rem;">
                                <i class="fas fa-star star"></i>
                                <span>4.5</span>
                                <i class="fas fa-download user"></i>
                                <span>12rb</span>
                            </div>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>

        <div class="container" style="margin: 0;padding: 1rem 0;">
            <div class="footer-body" style="display: flex;flex-direction: column;">
                <span style="text-align: center;">Download Aplikasi Mobile Ratelku</span>
                <div class="down-app" style="display: flex;flex-direction: rows;justify-content: center;">
                    <img src="https://smhn.info/wp-content/uploads/2018/07/google-play-logo.png" alt="" width="100px">
                    <div class="app" style="height: 30px;width: 100px;border: #70A7EB solid 1px;font-size: 1rem;font-weight: 500;text-align: center;line-height: 30px;border-radius: 3px;color: #70A7EB;margin-left: 10px;">Download</div>
                </div>
                <span style="margin: 2rem auto 0;">Ikuti kami</span>
                <ul class="sosmed" style="display: flex;justify-content: center;list-style-type: none;margin-bottom: 1rem;">
                    <li style="margin: 4px;">
                        <img src="assets/icons/facebook.jpg" alt="" width="30px">
                    </li>
                    <li style="margin: 4px;">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/1024px-Instagram_icon.png" alt="" width="30px">
                    </li>
                    <li style="margin: 4px;">
                        <img src="https://image.flaticon.com/icons/png/512/124/124021.png" alt="" width="30px">
                    </li>
                    <li style="margin: 4px;">
                        <img src="https://cdn0.iconfinder.com/data/icons/web-social-and-folder-icons/512/YouTube.png" alt="" width="30px">
                    </li>
                </ul>
            </div>
            <div style="height: 100px;outline: rgb(218, 226, 237) solid 1px;width: 100%;text-align: center;line-height: 40px;">
                <span>© 2019-2021 PT. Ratel Group All Right Reserved.</span>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.progress').removeClass('sprogress').addClass('hidden');
            $('.search-box').click(function() {
                $('.wrapper').load('data.php');
            });
            // Event menu profile
            $('#account').click(function() {
                $('.dropbox').toggle();
            });
        });

        function startTimer(duration, display) {
            var timer = duration,
                days,
                minutes, seconds;
            setInterval(function() {
                days = "0" + 1;
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = days + ":" + minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

        window.onload = function() {
            var fiveMinutes = 60 * 5,
                display = document.querySelector('#time');
            startTimer(fiveMinutes, display);
        };
    </script>