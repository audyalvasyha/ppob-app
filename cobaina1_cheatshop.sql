-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 14, 2022 at 09:02 AM
-- Server version: 10.3.35-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cobaina1_cheatshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `nm_prdct` varchar(255) NOT NULL,
  `price_prdct` int(15) NOT NULL,
  `detail_prdct` text NOT NULL,
  `stock_prdct` int(5) NOT NULL,
  `images_prdct` text NOT NULL,
  `nm_studio` varchar(255) NOT NULL,
  `categories` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `nm_prdct`, `price_prdct`, `detail_prdct`, `stock_prdct`, `images_prdct`, `nm_studio`, `categories`) VALUES
(1, 'PUBG MOBILE 1.5: IGNITION', 4000, 'PLAYERUNKNOWN\'S BATTLEGROUNDS resmi didesain eksklusif untuk perangkat seluler. Mainkan di mana saja, kapan saja. PUBG MOBILE menghadirkan aksi multiplayer gratis paling seru di perangkat seluler. Terjun, siapkan senjata, dan tuntaskan. Bertahanlah dalam pertempuran klasik 100 pemain, mode payload, mode fast-paced 4v4 team deathmatch, dan mode zombie. Bertahan adalah kunci, dan siapa yang terakhir bertahan menjadi pemenangnya. Saat panggilan tugas, tembak sesuka hati!<br></br>FREE ON MOBILE - Didukung oleh Mesin Unreal 4. Mainkan game kualitas konsol di mana saja. Menghadirkan grafis HD dan suara 3D yang mengagumkan. Menampilkan kontrol game yang bisa disesuaikan, mode training, dan obrolan suara. Rasakan kontrol paling halus, perilaku balistik dan senjata yang realistik di ponsel.', 20, 'assets/images/game_1.jpg', 'PROXIMA BETA', 'Laga'),
(2, 'Mobile Legends: Bang Bang', 3000, 'Bergabung Dengan Teman Anda Di Brand Baru Game moba 5v5 Melawan Pemain Manusia Sungguhan, Mobile Legends: Bang Bang! Pilih Hero Favorit Kamu Dan Buat Team Yang Sempurna Dengan Kawanmu!\r\n<br></br>\r\n10 Detik Membuat Pertandingan, 10 Menit Bertarung, Lorong, Hutan, Menghancurkan Tower, Pertarungan Tim, Semua Kesenangan Itu Dari PC MOBAs Dan Permainan Action Itu Berada Di Tangan Mu! Tunjukan Semangat E-sports Kamu!\r\n<br></br>\r\nMobile Legends: Bang Bang Game MOBA ponsel luar biasa. Kalahkan lawan dengan tim Anda untuk meraih kemenangan!\r\n<br></br>\r\nHandphone Kamu Haus Akan Pertandingan!', 15, 'assets/images/game_2.jpg', 'Moonton', 'Laga'),
(3, 'Call of Duty&#174;: Mobile - SEASON 6: THE HEAT', 4000, 'Official CALL OF DUTY&#174; designed exclusively for mobile phones. Play iconic multiplayer maps and modes anytime, anywhere. 100 player Battle Royale battleground? Fast 5v5 team deathmatch Sniper vs sniper battle? Activision&#174;s free-to-play CALL OF DUTY&#174;: MOBILE has it all.FREE TO PLAY ON <br></br>MOBILEConsole quality HD gaming on your phone with customizable controls, voice and text chat, and thrilling 3D graphics and sound. Experience the thrill of the world&#174;s most beloved shooter game, now on your phone for easy on-the-go fun.', 12, 'assets/images/game_5.jpg', 'Activision Publishing, Inc.', 'Laga'),
(4, 'Garena Free Fire - 4nniversary', 7000, 'Free Fire adalah permainan survival shooter terbaik yang tersedia di ponsel. Permainan berdurasi 10 menit ini akan menempatkan kamu di pulau terpencil dimana kamu bertarung melawan 49 pemain lainnya, dengan tujuan untuk bertahan hidup. Player bebas memilih posisi untuk memulai pemainan menggunakan parasut, dan tujuan semua ini untuk bertahan dalam zona aman selama mungkin. Menyetir kendaraan untuk menjelajahi map yang besar, bersembunyi dalam parit, atau menjadi tidak terlihat dengan tiarap di padang rumput. Menyerang, bertahan hidup, hanya satu tujuan: untuk bertahan hidup dan menjawab panggilan tugas.\r\n<br></br>\r\n[Game Survival terbaik pada fomat aslinya]\r\nCari perlengkapanmu, tetap dalam zona bermain, loot musuhmu dan jadilah orang terakhir yang bertahan. Sepanjang perjalanan, carilah airdrop dan hindari serangan udara untuk mendapatkan sedikit keunggulan dari pemain lainnya.', 18, 'assets/images/game_3.jpg', 'GARENA INTERNATIONAL I PRIVATE LIMITED', 'Laga'),
(5, 'Arena of Valor: 5v5 Arena Game', 1500, 'Experience Arena of Valor, an epic new 5v5 multiplayer online battle arena (MOBA) designed by Tencent Games!\r\n<br></br>\r\nCall on your teammates to join you in the jungle! Crush your enemies in classic 5v5 combat in real time! Draw first blood, carry your team, and become legendary in the arena!', 17, 'assets/images/game_4.jpg', 'PROXIMA BETA', 'Laga'),
(6, '	\r\nGenshin Impact', 3000, 'Teyvat, sebuah dunia fantasi yang bebas, dinamis, dan penuh dengan kehidupan mistis, dunia di mana tujuh elemen yang saling mengalir, berpadu, menari dan beradu.\r\n<br></br>\r\nPemain berperan sebagai seorang dari sepasang saudara kembar yang berkelana dari dunia satu ke dunia lain. Sampai sesosok dewa yang tak dikenal menghadang langkahmu, merenggut saudara kembarmu, dan menyegel kekuatanmu. Karena sihirnya, kamu tertidur tak sadarkan diri.\r\nSaat kesadaranmu kembali, dunia di sekelilingmu... bukan lagi dunia yang kamu kenal.', 15, 'assets/images/game_6.jpg', 'miHoYo Limited', 'Petualangan'),
(7, '	\r\nClash of Clans', 1500, 'Ikut jutaan pemain di seluruh dunia membangun desa, mendirikan klan, dan berlomba dalam Perang Klan epik!\r\n<br></br>\r\nOrang Barbar berkumis, Penyihir membawa api, dan peleton unik lainnya menunggumu! Masuki dunia Clash!', 16, 'assets/images/game_7.jpg', 'Supercell', 'Strategi'),
(8, 'Pok&#233;mon GO', 4000, 'New! Now you can battle other Pok?mon GO Trainers online! Try the GO Battle League today!\r\n<br></br>\r\nJoin Trainers across the globe who are discovering Pok?mon as they explore the world around them. Pok?mon GO is the global gaming sensation that has been downloaded over 1 billion times and named ?Best Mobile Game? by the Game Developers Choice Awards and ?Best App of the Year? by TechCrunch.', 13, 'assets/images/game_8.jpg\r\n', 'Niantic, Inc', 'Petualngan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aktif` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saldo` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `email`, `token`, `aktif`, `saldo`) VALUES
(9, 'Admin', 'admin', 'audyalvasyah20@gmail.com', 'db3264e9377758aee2cdbad2e86f74f154e7f130ba7898bfafdf9a87a75fad4f', '1', 9720675),
(29, 'Heru', 'heru090504', 'herukurniawan9504@gmail.com', 'fb785063800584f86d700e5b5f91985f8ef5a35c64bf7aed2a3cb2e955108604', '1', 10000),
(36, 'Kiki', '123456', 'calonsukses3678@gmail.com', '6c502be272ee7642f535b9ef971044bb68b47afb16c1996985092e53c4ae92e4', '1', 0),
(37, 'Dhaby', '12345678', 'dhabyiqbal@gmail.com', '96fffdbb2bcf54db8a2b4203b1b2644389b85e976ac464ec53128d704cad4ea4', '1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
