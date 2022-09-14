<!DOCTYPE html>
<html lang="en">
<?php

?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cobainaja - Top Up Game dan Produk Digital</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/viewshop1.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <div class="wrapper">
        <!-- Load template Header -->
        <div id="header">
            <div class="header-top">
                <form action="" class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" name="keyword" id="keyword" class="search-input" placeholder="Search for game ..." autocomplete="off" />
                </form>
                <div class="fitur">
                    <a href="https://api.whatsapp.com/send?phone=6281276049584" class="far fa-comment-alt-lines"></a>
                    <a href="./page/keranjang.html" class="far fa-shopping-cart"></a>
                </div>
            </div>
            <div class="header-bottom">
                <div id="account">
                    <div class="account-name">Hi, Friends</div>
                    <i class="fas fa-angle-down" style="font-size: 14px"></i>
                </div>
                <ul class="dropbox">
                    <li>
                        <a href="" class="far fa-user"><span>Profile</span> </a>
                    </li>
                    <li style="border-bottom: 1px solid rgb(218, 226, 237); margin: 0 1rem"></li>
                    <li id="logOut">
                        <a href="/backup/logout.php" class="far fa-sign-out"><span>Logout</span>
                        </a>
                    </li>
                </ul>
                <div class="top-up">
                    <i class="far fa-usd-circle"></i>
                </div>
            </div>
            <div id="menuLink" class="header-navigasi" style="height: 40px">
                <ul>
                    <li class="item-link">
                        <a href="#" class="link-head">
                            <i class="far fa-newspaper"></i>
                            Artikel & Berita</a>
                    </li>
                    <li class="item-link">
                        <a href="#" class="link-head">
                            <i class="far fa-user-headset"></i>
                            Layanan</a>
                    </li>
                    <li class="item-link">
                        <a href="#" class="link-head">
                            <i class="far fa-lightbulb"></i>
                            Tips & Trick</a>
                    </li>
                    <li class="item-link">
                        <a href="#" class="link-head">
                            <i class="far fa-comments-alt"></i>
                            FAQ</a>
                    </li>
                    <li class="item-link">
                        <a href="#" class="link-head">
                            <i class="far fa-question-circle"></i>
                            Tentang saya</a>
                    </li>
                </ul>
            </div>

        </div>
        <!-- Product Digital -->
        <div class="container">
            <div class="label-tag">
                <span>Isi Ulang</span>
            </div>
            <div class="prduk-isi">
                <ul class="list-item" style="justify-content: space-between;">
                    <li class="item-prduk">
                        <img src="https://cfstg.alfacart.com/media/revamp/web/assets/img/icon/ic_e-service_pulsa.png" width="50px" />
                        <span>Pulsa</span>
                    </li>
                    <li class="item-prduk">
                        <img src="https://cfstg.alfacart.com/media/revamp/web/assets/img/icon/ic_e-service_paket%20data.png" width="50px" />
                        <span>Paket Data</span>
                    </li>
                    <li class="item-prduk">
                        <img style='padding: 0' src="https://cfstg.alfacart.com/media/revamp/web/assets/img/icon/ic_e-service_pln.png" width="50px" />
                        <span>Token Listrik</span>
                    </li>
                </ul>
            </div>
        </div> <!-- End -->

        <!-- Top Up Game & Voucher Game -->
        <div class="container">
            <!-- Item For sale -->
            <div class="label-tag">
                <span>Voucher Game</span>
                <span onclick="window.location.href = './page/viewallproduct.php'">Lihat semua</span>
            </div>
            <div class="rows">
                <?php
                include "class-product.php";
                $Product = new Product();
                $data = $Product->dataProduct("game");
                for ($i = 0; $i < 6; $i++) {
                ?>
                    <a href="product_1.php?id=<?= $data[$i]['id']; ?>&nm=<?= $data[$i]['nm_detail']; ?>" class="col">
                        <div class="item">
                            <img src="<?= $data[$i]['img_product'] ?>" alt="" width="85%">
                            <span><?= $data[$i]['nm_product'] ?></span>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div><!-- End Item -->

        <!-- Load template footer -->
        <div id="footer" class="container"></div>
    </div>
    <script src="js/scriptFront.js"></script>
    <script>
        $(document).ready(() => {
            $(".progress").removeClass("sprogress").addClass("hidden");
            $(".search-box").click(function() {
                $(".wrapper").load("data.php");
            });
            // Event menu profile
            $("#account").click(function() {
                $(".dropbox").toggle();
            });
        })
    </script>
</body>

</html>