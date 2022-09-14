<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cobainaja - Top Up Game dan Produk Digital</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../css/viewshop1.css" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
  <div class="wrapper">
    <div class="header-top">
      <i class="fas fa-arrow-left" onclick="window.history.go(-1);"></i>
      <h3>Hi, Friends!</h3>
    </div>
    <div class="banner">
      <div style="padding: 1rem;">
        <h3>Beli <span>Voucher game</span> di Cobainaja</h3>
        <span>Mulai dari PUBG Mobile, Mobile Legends, Free Fire</span>
      </div>
      <div style="background-color: #fff; height: 65px">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
          <path fill="#284a6e" fill-opacity="1" d="M0,32L48,26.7C96,21,192,11,288,37.3C384,64,480,128,576,144C672,160,768,128,864,122.7C960,117,1056,139,1152,128C1248,117,1344,75,1392,53.3L1440,32L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
        </svg>
      </div>
    </div>
    <!-- Top Up Game & Voucher Game -->
    <div class="container">
      <!-- Item For sale -->
      <div class="label-tag">
        <span>Game Terpopuler</span>
      </div>
      <div class="rows">
        <?php
        // Mengambil file Json
        $JsonFile = file_get_contents("../config/data.json");

        // Mengubah standart encoding
        $JsonFile = utf8_encode($JsonFile);

        // Merubah Json menjadi Array Assosiatif
        $result = json_decode($JsonFile, true);
        $data =  $result['game'];

        // Looping data menggunakan foreach
        foreach ($data as $value) {

        ?>
          <a href="../product_1.php?id=<?= $value['id']; ?>&nm=<?= $value['nm_detail']; ?>" class="col">
            <div class="item">
              <img src="<?= $value['img_product'] ?>" alt="" width="85%">
              <span><?= $value['nm_product'] ?></span>
            </div>
          </a>
        <?php } ?>
      </div>
    </div><!-- End Item -->
  </div>
</body>

</html>