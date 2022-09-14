<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cobainaja - Top Up Game dan Produk Digital</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/viewshop.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <style>
        #active {
            background-color: #ffd860;
            border: 1px solid #33691e !important;
            color: #33691e;
        }

        .fa-check {
            background: #33691e;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="header-top">
            <i class="fas fa-arrow-left" onclick="window.history.go(-1);"></i>
        </div>
        <!-- Content Top -->
        <?php
        include "class-product.php";
        $get_id = $_GET['id'];

        $Product = new Product();
        $Array = $Product->dataProduct("game");
        $data = $Array[$get_id];

        ?>
        <div class="form-duration" style="margin-top: 55px">
            <div class="container">
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
        </div>
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
                <span>3. Metode Pembayaran</span>
            </div>
            <div class="row">
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
                </ul>
            </div>
        </div>
        <div class="container blank">
            <span>Happy Playing... :)</span>
            <!-- button to Top -->
            <div id="goTop" onclick="goToTop()">
                <i class="fas fa-arrow-up"></i>
            </div>
        </div>
        <div class="checkout">
            <div class="btn-checkout" onclick="location.href='page/checkout.html'">Beli sekarang</div>
        </div>
    </div>
    <script src="js/scriptFront.js"></script>
    <script>
        // Button Go Top Page Order Product
        var btnTop = document.getElementById("goTop");
        window.onscroll = function() {
            scrollFunc();
        };

        function scrollFunc() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20 && $(".wrapper").width() < 560
            ) {
                btnTop.style.display = "flex";
            } else {
                btnTop.style.display = "none";
            }
        }

        function goToTop() {
            document.documentElement.scrollTop = 0;
            document.body.scrollTop = 0;
        }
    </script>
</body>

</html>