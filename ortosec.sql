-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2023 at 05:36 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ortosec`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id_cart` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`) VALUES
(1, 'kecil', 'kecil'),
(2, 'sedang', 'sedang');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id_driver` int(11) NOT NULL,
  `name_driver` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `no_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id_driver`, `name_driver`, `email`, `password`, `phone_number`, `jurusan`, `no_pegawai`) VALUES
(8, 'bima', 'bima@gmail.com', '$2y$10$uXpPUmwSfe4F9rRW18d.YO12gfbA41Wcgh6zA9lLC5kaeSrrrdOT6', '087544651351', 'SEMARANG', 2),
(9, 'leo', 'leo@gmail.com', '$2y$10$uXpPUmwSfe4F9rRW18d.YO12gfbA41Wcgh6zA9lLC5kaeSrrrdOT6', '089464684684', 'JOGJA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `unit` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `stock` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `product_name`, `unit`, `price`, `descriptions`, `category_id`, `stock`) VALUES
(1, 'canvas ukuran 40 x 50', 1000, '15000', '<p>canvas ukuran 40 x 50 dengan bahan kayu sengon yang di pasah rapi,dengan menggunakan kain yang di cat menggunakan racikan canvas art leyangan,yang membuat beda dengan canvas yang lain nya</p>\r\n', 1, '400009'),
(2, 'canvas ukuran 50 x 60', 1000, '17000', '<p>canvas ukuran 50&nbsp;x 60&nbsp;canvas ukuran 40 x 50 dengan bahan kayu sengon yang di pasah rapi,dengan menggunakan kain yang di cat menggunakan racikan canvas art leyangan,yang membuat beda dengan canvas yang lain nya</p>\r\n', 1, '136998'),
(13, 'canvas ukuran 80 x 90', 1000, '25000', '<p>canvas ukuran 80&nbsp;x 90&nbsp;canvas ukuran 40 x 50 dengan bahan kayu sengon yang di pasah rapi,dengan menggunakan kain yang di cat menggunakan racikan canvas art leyangan,yang membuat beda dengan canvas yang lain nya</p>\r\n', 3, '399991'),
(14, 'canvas ukuran 90 x 100', 1000, '28000', '<p>canvas ukuran 90&nbsp;x 100&nbsp;canvas ukuran 40 x 50 dengan bahan kayu sengon yang di pasah rapi,dengan menggunakan kain yang di cat menggunakan racikan canvas art leyangan,yang membuat beda dengan canvas yang lain nya</p>\r\n', 3, '399980'),
(15, 'canvas ukuran 30 x 40', 1000, '10000', '<p>canvas ukuran 30 x 40&nbsp;canvas ukuran 40 x 50 dengan bahan kayu sengon yang di pasah rapi,dengan menggunakan kain yang di cat menggunakan racikan canvas art leyangan,yang membuat beda dengan canvas yang lain nya</p>\r\n', 1, '399898'),
(16, 'roll canvas', 1000, '120000', '<p>roll canvas.kain beukuran 2m x 3 m yang di cat menggunakan racikan canvas art leyangan,yang menjadikan berbeda dari produk lainnya</p>\r\n', 3, '3998964'),
(39, 'hhdhsh', 1000, '5000', 'sggsjsjdd hsjs', 1, '56'),
(40, 'Canvas terbaik 23', 1000, '5600', 'mantap', 1, '23');

-- --------------------------------------------------------

--
-- Table structure for table `products_galleries`
--

CREATE TABLE `products_galleries` (
  `id_gallery` int(11) NOT NULL,
  `photos` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_galleries`
--

INSERT INTO `products_galleries` (`id_gallery`, `photos`, `product_id`) VALUES
(1, '63bbdb0b2335d.jpg', 1),
(12, '6002cf749cccf.jpg', 7),
(22, '600ebf6d45187.jpg', 7),
(23, '600ebf80c735f.png', 7),
(33, '63bbde246aa36.jpg', 13),
(34, '63bbdae2b3049.jpg', 14),
(35, '63bbdbbc2dc2d.jpg', 15),
(36, '63bbdc3766ade.jpg', 16),
(37, '62b8bb263a812.png', 17),
(38, '62b8bb3926e8a.png', 18),
(39, '62b8bb53d50d0.png', 19),
(40, '62b8bb7d865c8.png', 20),
(41, '62b8bb8c6b4d0.png', 21),
(42, '62b8bba70ae63.png', 22),
(43, '62b8bbc067935.png', 23),
(44, '62b8bbe32fefc.png', 24),
(45, '62b8bbf8d8c46.png', 25),
(46, '62b8bc47b6dd4.png', 26),
(47, '62b8bc5720590.png', 27),
(48, '62b8bc6a94712.png', 28),
(49, '62b8bd3609d64.png', 29),
(50, '62b8be004bc6c.png', 30),
(51, '62b8be2897dbd.png', 31),
(52, '62b8be37cc665.png', 32),
(53, '62b8be4a78822.png', 33),
(54, '62b8be6d65667.png', 34),
(55, '62b8be7cab2d0.png', 35),
(56, '62b8be9764a50.png', 36),
(57, '62b8beba1c609.png', 37),
(58, '62b8bec8318ce.png', 38),
(59, '63bbda9d92a01.jpg', 2),
(67, 'IMG_20230621_115102_0422.jpg', 17),
(68, 'IMG_20230621_114432_587.jpg', 40);

-- --------------------------------------------------------

--
-- Table structure for table `rekening_numbers`
--

CREATE TABLE `rekening_numbers` (
  `id_rekening` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `rekening_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening_numbers`
--

INSERT INTO `rekening_numbers` (`id_rekening`, `bank_name`, `number`, `rekening_name`) VALUES
(1, 'BCA', '22247507', 'FATKHA KUNCORO AJI'),
(2, 'Mandiri', '0765432121236', 'Fatkha Kuncoro Aji');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id_transaction` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `rekening_id` int(11) NOT NULL,
  `transaction_status` varchar(255) NOT NULL,
  `weight_total` int(11) NOT NULL,
  `delivered` int(11) NOT NULL,
  `photo_transaction` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `time_arrived` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id_transaction`, `user_id`, `total_price`, `city`, `rekening_id`, `transaction_status`, `weight_total`, `delivered`, `photo_transaction`, `code`, `receiver`, `time_arrived`, `created_at`) VALUES
(1, 3, 260000, 'JAKARTA', 3, 'TERKIRIM', 4000, 0, '600d9b95c0711.jpg', 'EZM-57924', '', NULL, '2021-01-24 16:08:32'),
(2, 6, 200000, 'JAKARTA', 1, 'TERKIRIM', 4000, 0, '600d9c6b4e0d8.jpg', 'EZM-9366', '', NULL, '2021-01-24 16:12:13'),
(3, 9, 560000, 'JAKARTA', 1, 'KONFIRMASI', 3000, 0, '600e62cb73e61.png', 'EZM-86335', '', NULL, '2021-01-25 06:17:49'),
(4, 6, 100000, 'JAKARTA', 2, 'KONFIRMASI', 1000, 0, '600eba552a23c.png', 'EZM-81471', '', NULL, '2021-01-25 12:31:43'),
(5, 3, 218000, 'JAKARTA', 2, 'BELUM KONFIRMASI', 6000, 0, '6010cc60e12da.png', 'EZM-51571', '', NULL, '2021-01-25 13:06:50'),
(6, 9, 370000, 'JAKARTA', 1, 'TERKIRIM', 10000, 1, '6010ce5c5fc7f.png', 'EZM-98816', 'Mumun', '2021-01-27 05:26:45', '2021-01-27 02:21:26'),
(7, 14, 120000, 'TANGERANG', 5, 'TERKIRIM', 1000, 0, '62b8decd6d96a.jpg', 'EZM-10471', 'kontrakan', '2022-06-26 22:36:20', '2022-06-26 22:29:52'),
(8, 14, 200000, 'DEPOK', 1, 'TERKIRIM', 1000, 0, '62b8e1b73497c.png', 'EZM-669', 'kontrakan', '2022-06-26 22:49:26', '2022-06-26 22:45:46'),
(9, 14, 80000, 'DEPOK', 1, 'TERKIRIM', 1000, 0, '62b8e2f6dffee.jpg', 'EZM-25919', 'aji', '2022-06-26 22:54:27', '2022-06-26 22:51:15'),
(10, 13, 30000, 'JAKARTA', 1, 'TERKIRIM', 1000, 0, '62b8e63de35a5.jpg', 'EZM-79048', 'bsgsd', '2022-12-27 06:47:09', '2022-06-26 23:05:08'),
(11, 16, 17000, 'JAKARTA', 1, 'TERKIRIM', 1000, 0, '635d051d78480.jpg', 'EZM-28651', '', '2023-01-03 14:05:24', '2022-10-29 10:43:40'),
(13, 18, 2200000, 'DEPOK', 1, 'TERKIRIM', 100000, 0, '63aa93d2cf3ee.jpg', 'EZM-24466', '', '2023-01-03 14:05:47', '2022-12-27 06:41:37'),
(14, 18, 17000, 'JAKARTA', 1, 'TERKIRIM', 1000, 0, '63abb31ec3ee7.jpg', 'EZM-38534', 'bagas', '2023-01-03 15:52:40', '2022-12-28 03:06:57'),
(15, 18, 2985000, 'JOGJA', 1, 'TERKIRIM', 199000, 1, '63b447911ff55.jpg', 'EZM-84704', 'bagas', '2023-01-03 15:51:58', '2023-01-03 15:19:00'),
(17, 18, 1700000, 'SEMARANg', 1, 'TERKIRIM', 100000, 1, '63b450e414c3f.jpg', 'EZM-96414', 'bagas', '2023-01-03 16:04:06', '2023-01-03 15:59:00'),
(18, 18, 750000, 'JOGJA', 1, 'TERKIRIM', 50000, 0, '63bbe1b84a78d.jpg', 'EZM-53845', '', '2023-06-12 20:55:19', '2023-01-09 09:40:05'),
(19, 20, 17000, 'JOGJA', 1, 'TERKIRIM', 1000, 0, '64842f4c295ef.png', 'EZM-98157', '', '2023-06-10 08:36:43', '2023-06-10 08:07:01'),
(20, 20, 119000, 'JOGJA', 1, 'TERKIRIM', 6000, 0, 'IMG_20230611_171633_8601.jpg', 'EZM-89256', '', '2023-06-12 20:55:30', '2023-06-10 09:16:45'),
(21, 20, 125000, 'JOGJA', 1, 'BELUM KONFIRMASI', 7000, 0, '', 'EZM-77224', '', NULL, '2023-06-11 07:34:02'),
(22, 20, 4707000, 'JOGJA', 1, 'BELUM KONFIRMASI', 216000, 0, '', 'EZM-47292', '', NULL, '2023-06-11 13:43:17'),
(23, 20, 3960000, 'JOGJA', 1, 'TERKONFIRMASI', 143000, 0, 'IMG_20230611_171633_8603.jpg', 'EZM-51162', '', NULL, '2023-06-12 01:31:05'),
(24, 20, 20000, 'SEMARANG', 1, 'TERKIRIM', 12000, 0, 'IMG_20230611_171629_169.jpg', 'EZM-5934178', '', '2023-06-12 21:14:18', '2023-06-12 01:57:05'),
(25, 20, 572000, 'JOGJA', 2, 'TERKIRIM', 21000, 0, 'IMG_20230611_171633_8602.jpg', 'EZM-8010735', '', '2023-06-12 20:59:25', '2023-06-12 02:35:09'),
(26, 20, 68000, 'SEMARANG', 3, 'TERKIRIM', 3000, 0, 'IMG_20230611_171247_201.jpg', 'EZM-9115771', 'kevin', '2023-06-13 05:27:07', '2023-06-12 02:37:25'),
(27, 20, 20000, 'SEMARANG', 1, 'TERKIRIM', 12000, 0, '648756dbcfedc.png', 'EZM-9243805', '', '2023-06-12 21:16:16', '2023-06-12 05:39:17'),
(28, 20, 339000, 'SEMARANG', 1, 'TERKIRIM', 14000, 0, 'IMG_20230603_035944_053.jpg', 'EZM-5306466', 'Tasya', '2023-06-13 14:39:33', '2023-06-12 20:47:57'),
(29, 20, 17000, 'JOGJA', 1, 'TERKIRIM', 1000, 0, '648788e81bea2.png', 'EZM-61184', 'keren', '2023-06-13 09:47:40', '2023-06-12 21:06:22'),
(30, 22, 1440000, 'JOGJA', 1, 'BELUM KONFIRMASI', 12000, 0, '', 'EZM-1215890', '', NULL, '2023-06-13 16:19:46'),
(31, 22, 120000, 'SEMARANG', 1, 'BELUM KONFIRMASI', 1000, 0, '', 'EZM-6428040', '', NULL, '2023-06-13 16:20:34'),
(32, 22, 17000, 'JOGJA', 1, 'BELUM KONFIRMASI', 1000, 0, '', 'EZM-8721850', '', NULL, '2023-06-13 16:20:58'),
(33, 22, 15000, 'SEMARANG', 1, 'BELUM KONFIRMASI', 1000, 0, '', 'EZM-7447776', '', NULL, '2023-06-13 16:21:13'),
(34, 22, 10000, 'JOGJA', 1, 'TERKIRIM', 1000, 0, 'IMG_20230611_171558_097.jpg', 'EZM-7384377', 'Npicoyy', '2023-06-13 16:25:29', '2023-06-13 16:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `transactions_details`
--

CREATE TABLE `transactions_details` (
  `id_transaction_detail` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `code_product` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions_details`
--

INSERT INTO `transactions_details` (`id_transaction_detail`, `transaction_id`, `product_id`, `price`, `banyak`, `code_product`) VALUES
(1, 1, 1, 50000, 2, 'PRD-12943'),
(2, 1, 2, 80000, 2, 'PRD-12943'),
(3, 2, 1, 50000, 2, 'PRD-13113'),
(4, 2, 1, 50000, 2, 'PRD-13113'),
(5, 3, 2, 80000, 2, 'PRD-40981'),
(6, 3, 6, 400000, 1, 'PRD-40981'),
(7, 4, 3, 100000, 1, 'PRD-60879'),
(8, 5, 5, 20000, 2, 'PRD-71011'),
(9, 5, 10, 75000, 2, 'PRD-71011'),
(10, 5, 12, 14000, 2, 'PRD-71011'),
(11, 6, 4, 36000, 5, 'PRD-94186'),
(12, 6, 1, 30000, 1, 'PRD-94186'),
(13, 6, 2, 40000, 4, 'PRD-94186'),
(14, 7, 1, 120000, 1, 'PRD-39116'),
(15, 8, 4, 200000, 1, 'PRD-75635'),
(16, 9, 2, 80000, 1, 'PRD-36698'),
(17, 10, 1, 120000, 1, 'PRD-81050'),
(18, 11, 2, 17000, 1, 'PRD-87399'),
(19, 12, 1, 15000, 1, 'PRD-44229'),
(20, 12, 2, 17000, 100, 'PRD-44229'),
(21, 13, 4, 22000, 100, 'PRD-56711'),
(22, 14, 2, 17000, 1, 'PRD-50773'),
(23, 15, 1, 15000, 199, 'PRD-87518'),
(24, 16, 1, 15000, 1, 'PRD-61263'),
(25, 17, 2, 17000, 100, 'PRD-13789'),
(26, 18, 1, 15000, 50, 'PRD-62083'),
(27, 19, 2, 17000, 1, 'PRD-60660'),
(28, 20, 2, 17000, 1, 'PRD-90734'),
(29, 20, 4, 22000, 1, 'PRD-90734'),
(30, 20, 3, 20000, 4, 'PRD-90734'),
(31, 21, 3, 20000, 1, 'PRD-37075'),
(32, 21, 3, 20000, 1, 'PRD-37075'),
(33, 21, 2, 17000, 5, 'PRD-37075'),
(34, 22, 4, 22000, 1, 'PRD-40471'),
(35, 22, 16, 120000, 1, 'PRD-40471'),
(36, 22, 2, 17000, 4, 'PRD-40471'),
(37, 22, 2, 17000, 1, 'PRD-40471'),
(38, 22, 16, 120000, 9, 'PRD-40471'),
(39, 22, 2, 17000, 200, 'PRD-40471'),
(45, 23, 16, 120000, 23, 'PRD-66740'),
(46, 23, 15, 10000, 120, 'PRD-66740'),
(47, 25, 1, 15000, 1, 'PRD-8010735'),
(48, 25, 13, 25000, 1, 'PRD-8010735'),
(49, 25, 14, 532000, 19, 'PRD-8010735'),
(50, 26, 1, 15000, 1, 'PRD-9115771'),
(51, 26, 13, 25000, 1, 'PRD-9115771'),
(52, 26, 14, 28000, 1, 'PRD-9115771'),
(53, 28, 13, 300000, 12, 'PRD-5306466'),
(54, 28, 2, 17000, 1, 'PRD-5306466'),
(55, 28, 4, 22000, 1, 'PRD-5306466'),
(56, 29, 2, 17000, 1, 'PRD-52822'),
(57, 30, 16, 1440000, 12, 'PRD-1215890'),
(58, 31, 16, 120000, 1, 'PRD-6428040'),
(59, 32, 2, 17000, 1, 'PRD-8721850'),
(60, 33, 1, 15000, 1, 'PRD-7447776'),
(61, 34, 15, 10000, 1, 'PRD-7384377');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `phone_number` varchar(255) NOT NULL,
  `postal_code` varchar(191) NOT NULL,
  `roles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `password`, `address`, `phone_number`, `postal_code`, `roles`) VALUES
(1, 'Hafizh Maulana', 'hafizhmy26@gmail.com', '$2y$10$/v28V4a4hxcdc3KtkVc8huoop7Ir2NKDk2zA2DDFO9O0u7o9xG7Lq', 'Hafizh Maulana', '090990', 'Hafizh Maulana', 'ADMIN'),
(10, 'Muhammad Iqbal Subagio', 'athar@gmail.com', '$2y$10$LGiCeFBz8fFfOTkL8hMJxO1P6e6qq2aW3Vcc2jcc0SbdGHrVPnXX.', '<p>Jln H sanusi Gang Hamzah No 28</p>\r\n', '098777776668', '12345', 'OWNER'),
(11, 'admin123', 'admin123@gmail.com', '$2y$10$uXpPUmwSfe4F9rRW18d.YO12gfbA41Wcgh6zA9lLC5kaeSrrrdOT6', '', '098765414', '', 'ADMIN'),
(12, 'iqbal', 'iqgal@gmail.com', '$2y$10$4Xnj3nBmrk0xhrj07FhFNeSFcym.8axfyiRjpGAy1QA7f6G4rLlDC', '', '0895465852', '', 'USER'),
(13, 'aji', 'aji123@gmail.com', '$2y$10$R7wPu9M015iYUFrcL5WubOX8jv5BuPsRWiMDh1tBKO7/fC5DGU1PO', '<p>apapun yang terjadi</p>\r\n', '8454654654654', '456', 'USER'),
(14, 'kontrakan', 'kontrakan@gmail.com', '$2y$10$vSdaxJZ6CGn9FDus6abJLuOFwG5K7PhNfLh/UoryQyAB628.r5h.u', '<p>jalan jalan bos</p>\r\n', '08526549364', '54215', 'USER'),
(15, 'biyu', 'biyu@gmail.com', '$2y$10$dY9PEddekp31dzqR750V/.GcM2/OJk7.nQflD3hCjUfNzeQ2q0huW', NULL, '0329536', '', 'USER'),
(16, 'jon', 'jon123@gmail.com', '$2y$10$DGoIMRKOiTT7pf2io1AQyO5yb4SI1GDxrHwkPUXcvUIv43.hAH7nu', '<p>XASFSAF</p>\r\n', '085464654', '427', 'USER'),
(17, 'katon', 'katon@gmail.com', '$2y$10$6fztXHHzbq1WqC99a/9hn.ju1/q.EWvcBZGwPsoFgIdyfNgWY7V7u', NULL, '0895455545', '', 'USER'),
(18, 'BAGAS', 'bagas@gmail.com', '$2y$10$wmzK3AsFy7KRYj/ymKGzm.2/wkqYUSHYjmce2YIzYrFklZ7up4Rz2', '<p>ungaran timur leyangan</p>\r\n', '0895364685', '4505', 'USER'),
(19, 'owner', 'owner@gmail.com', '$2y$10$uXpPUmwSfe4F9rRW18d.YO12gfbA41Wcgh6zA9lLC5kaeSrrrdOT6', '<p>leyangan rt04 rw01</p>\r\n', '087832700934', '50514', 'OWNER'),
(20, 'Alvina Rizqiu', 'kevin@gmail.com', '$2y$10$uXpPUmwSfe4F9rRW18d.YO12gfbA41Wcgh6zA9lLC5kaeSrrrdOT6', 'Alvina Rizqiu', 'Alvina Rizqiu', 'Alvina Rizqi', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id_driver`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `products_galleries`
--
ALTER TABLE `products_galleries`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `rekening_numbers`
--
ALTER TABLE `rekening_numbers`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indexes for table `transactions_details`
--
ALTER TABLE `transactions_details`
  ADD PRIMARY KEY (`id_transaction_detail`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id_driver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products_galleries`
--
ALTER TABLE `products_galleries`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `rekening_numbers`
--
ALTER TABLE `rekening_numbers`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `transactions_details`
--
ALTER TABLE `transactions_details`
  MODIFY `id_transaction_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
