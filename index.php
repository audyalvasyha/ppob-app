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
</head>

<body>
    <div class="wrapper">
        <!-- Load template Header -->
        <div id="header"></div>
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
                    <a href="item-product.php?id=<?= $data[$i]['id']; ?>&d=" class="col">
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
</body>

</html>