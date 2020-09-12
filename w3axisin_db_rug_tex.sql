-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 06, 2020 at 06:27 AM
-- Server version: 10.0.38-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `w3axisin_db_rug_tex`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`id`, `category_name`, `is_active`, `timestamp`) VALUES
(7, 'Towels', 1, '2019-04-11 06:59:47'),
(8, 'Rugs', 1, '2018-09-17 15:25:29'),
(9, 'Bathmats', 1, '2018-09-17 15:25:38'),
(10, 'Basket', 1, '2018-09-17 15:25:47'),
(11, 'Cushions', 1, '2018-09-17 15:25:53'),
(12, 'Poufs', 1, '2018-09-17 15:25:58'),
(13, 'Bedsheets', 1, '2019-04-05 11:51:16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category_photo`
--

CREATE TABLE `tb_category_photo` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `photo_name` varchar(100) NOT NULL,
  `photo_path` varchar(500) NOT NULL,
  `is_active` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_category_photo`
--

INSERT INTO `tb_category_photo` (`id`, `cat_id`, `description`, `photo_name`, `photo_path`, `is_active`, `timestamp`) VALUES
(6, 8, 'Composition 100% cotton', 'Composition 100% cotton', '8-Slide2.JPG', 1, '2018-10-06 04:04:13'),
(7, 8, 'Composition 60% cotton / 40% Polyester', 'Composition 60% cotton / 40% Polyester', '8-Slide3.JPG', 0, '2018-10-06 04:04:13'),
(8, 8, 'Composition 85% cotton / 15% Polyester', 'Composition 85% cotton / 15% Polyester', '8-Slide4.JPG', 0, '2018-10-06 04:04:13'),
(9, 8, 'Composition 65% cotton / 35% Polyester', 'Composition 65% cotton / 35% Polyester', '8-Slide3.JPG', 1, '2018-10-06 04:04:13'),
(10, 8, 'Composition 100% cotton', 'Composition 100% cotton', '8-Slide4.JPG', 1, '2018-10-06 04:04:13'),
(11, 8, 'Composition 100% cotton', 'Composition 100% cotton', '8-Slide5.JPG', 1, '2018-10-06 04:04:13'),
(12, 8, 'Composition 65% cotton / 35% Polyester', 'Composition 65% cotton / 35% Polyester', '8-Slide6.JPG', 1, '2018-10-06 04:04:13'),
(13, 8, 'Composition 65% cotton / 35% Arcylic', 'Composition 65% cotton / 35% Arcylic', '8-Slide7.JPG', 1, '2018-10-06 04:04:13'),
(14, 8, 'Composition 100% cotton', 'Composition 100% cotton', '8-Slide8.JPG', 1, '2018-10-06 04:04:13'),
(15, 8, 'Composition 45% cotton / 20% Wool / 20% Jute / 15% polyester', 'Composition 45% cotton / 20% Wool / 20% Jute / 15% polyester', '8-Slide9.JPG', 1, '2018-10-06 04:04:13'),
(16, 8, 'Composition 50% cotton / 10% Wool / 30% Jute / 10% polyester', 'Composition 50% cotton / 10% Wool / 30% Jute / 10% polyester', '8-Slide10.JPG', 1, '2018-10-06 04:04:13'),
(17, 8, 'Composition 60% cotton / 40% Polyester', 'Composition 60% cotton / 40% Polyester', '8-Slide11.JPG', 1, '2018-10-06 04:04:13'),
(18, 8, 'Composition 85% cotton / 15% Polyester', 'Composition 85% cotton / 15% Polyester', '8-Slide12.JPG', 1, '2018-10-06 04:04:13'),
(19, 8, 'Composition 55% cotton / 45% Jute', 'Composition 55% cotton / 45% Jute', '8-Slide13.JPG', 1, '2018-10-06 04:04:13'),
(20, 8, 'Composition 100% cotton', 'Composition 100% cotton', '8-Slide14.JPG', 1, '2018-10-06 04:04:13'),
(21, 8, 'Composition 60% cotton / 25% Wool / 15% polyester', 'Composition 60% cotton / 25% Wool / 15% polyester', '8-Slide15.JPG', 1, '2018-10-06 04:04:13'),
(22, 8, 'Composition 70% cotton / 30% Jute', 'Composition 70% cotton / 30% Jute', '8-Slide16.JPG', 1, '2018-10-06 04:04:13'),
(23, 8, 'Composition 55% cotton / 45% Polyester', 'Composition 55% cotton / 45% Polyester', '8-Slide17.JPG', 1, '2018-10-06 04:04:13'),
(24, 8, 'Composition 55% cotton / 45% Jute', 'Composition 55% cotton / 45% Jute', '8-Slide18.JPG', 1, '2018-10-06 04:04:13'),
(25, 8, 'Composition 40% cotton / 35% Wool / 25% Hemp', 'Composition 40% cotton / 35% Wool / 25% Hemp', '8-Slide19.JPG', 1, '2018-10-06 04:04:13'),
(26, 8, 'Composition 60% cotton / 40% Polyester', 'Composition 60% cotton / 40% Polyester', '8-Slide20.JPG', 1, '2018-10-06 04:04:13'),
(27, 8, 'Composition 85% cotton / 15% Polyester', 'Composition 85% cotton / 15% Polyester', '8-Slide21.JPG', 1, '2018-10-06 04:04:13'),
(28, 8, 'Composition 50% cotton / 50% Wool', 'Composition 50% cotton / 50% Wool', '8-Slide22.JPG', 1, '2018-10-06 04:04:13'),
(29, 8, 'Composition 55% cotton / 45% Wool', 'Composition 55% cotton / 45% Wool', '8-Slide23.JPG', 1, '2018-10-06 04:04:13'),
(30, 8, 'Composition 80% Wool / 20% Cotton', 'Composition 80% Wool / 20% Cotton', '8-Slide24.JPG', 1, '2018-10-06 04:04:13'),
(31, 8, 'Composition 85% Wool / 15% Cotton', 'Composition 85% Wool / 15% Cotton', '8-Slide25.JPG', 1, '2018-10-06 04:04:13'),
(32, 8, 'Composition 60% cotton / 40% Wool', 'Composition 60% cotton / 40% Wool', '8-Slide26.JPG', 1, '2018-10-06 04:04:13'),
(33, 8, 'Composition 100% cotton', 'Composition 100% cotton', '8-Slide27.JPG', 1, '2018-10-06 04:04:13'),
(34, 8, 'Composition 100% cotton', 'Composition 100% cotton', '8-Slide28.JPG', 1, '2018-10-06 04:04:13'),
(35, 8, 'Composition 100% cotton', 'Composition 100% cotton', '8-Slide29.JPG', 1, '2018-10-06 04:04:13'),
(36, 8, 'Composition 100% cotton', 'Composition 100% cotton', '8-Slide30.JPG', 1, '2018-10-06 04:04:13'),
(37, 8, 'Composition 100% cotton', 'Composition 100% cotton', '8-Slide31.JPG', 1, '2018-10-06 04:04:13'),
(38, 8, 'Composition 100% cotton', 'Composition 100% cotton', '8-Slide32.JPG', 1, '2018-10-06 04:04:13'),
(39, 8, 'Composition 100% cotton', 'Composition 100% cotton', '8-Slide33.JPG', 1, '2018-10-06 04:04:13'),
(40, 8, 'Composition 60% Micro Cotton / 40% Cotton', 'Composition 60% Micro Cotton / 40% Cotton', '8-Slide34.JPG', 1, '2018-10-06 04:04:13'),
(41, 8, 'Composition 100% cotton', 'Composition 100% cotton', '8-Slide35.JPG', 1, '2018-10-06 04:04:13'),
(42, 8, 'desc', 'test', '8-editprofile.png', 0, '2018-10-10 09:01:07'),
(43, 13, '100%cotton', 'King bed Sheets', '13-pan_card.gif', 0, '2019-04-05 11:54:11'),
(44, 13, '100% Cotton', 'Fitted Sheets', '13-15374247843017680254_im_220x293.jpg', 1, '2019-04-12 07:29:40'),
(45, 13, '100% Cotton', 'Fitted Sheets', '13-15232395591167605494_im_220x293.jpg', 1, '2019-04-12 07:30:59'),
(46, 13, '100% Cotton', 'King bed Sheets', '13-index.jpg', 1, '2019-04-12 07:31:42'),
(47, 13, '100% Cotton', 'King bed Sheets', '13-js 6.jpg', 1, '2019-04-12 07:32:14'),
(48, 13, '100% Cotton', 'King bed Sheets', '13-js3.jpg', 1, '2019-04-12 07:32:58'),
(49, 13, '100% Cotton', 'King bed Sheets', '13-js5.jpg', 1, '2019-04-12 07:33:51'),
(50, 13, '100% Cotton', 'Queen Bed Sheets', '13-js12.jpg', 1, '2019-04-12 07:35:32'),
(51, 13, '100% Cotton', 'Queen Bed Sheets', '13-js8.jpg', 1, '2019-04-12 07:50:08'),
(52, 9, '100% Cotton', 'BathMat', '9-8f6a8ae37e154d99721f37a4a21bf7c4--outdoor-mats-indoor-outdoor-rugs.jpg', 1, '2019-04-12 07:51:07'),
(53, 9, '100% Cotton', 'BathMat', '9-bathmats-new.jpg', 1, '2019-04-12 07:51:58'),
(54, 9, '100% Cotton', 'BathMat', '9-new doc 2018-03-28 15.48.10_1.jpg', 0, '2019-04-12 08:01:36'),
(55, 9, '100% Cotton', 'BathMat', '9-SSB-15-33-Teal10.jpg', 1, '2019-04-12 07:54:12'),
(56, 9, '100% Cotton', 'BathMat', '9-15123771361.jpg', 1, '2019-04-12 07:56:34'),
(57, 10, 'jute', 'Basket', '10-BASKET3 - Copy.jpg', 1, '2019-04-12 07:58:05'),
(58, 10, 'jute', 'Basket', '10-BASKET2.jpg', 1, '2019-04-12 07:59:02'),
(59, 11, '100% Cotton', 'Cushion', '11-SSC-13-01-Beige - Copy.jpg', 0, '2019-04-12 08:02:09'),
(60, 11, '100% Cotton', 'Cushion', '11-SSC-15-01-CORAL-1 - Copy.jpg', 1, '2019-04-24 08:34:44'),
(61, 11, '100% Cotton', 'Cushion', '11-1512380284RM-P-783 (2).jpg', 0, '2019-04-24 08:37:43'),
(62, 11, 'knitted cushion', 'Cushion', '11-1512380284RM-P-783 (2).jpg', 1, '2019-04-24 08:38:38'),
(63, 11, 'Jute', 'Cushion', '11-SSC-13-01-Beige.jpg', 1, '2019-04-24 08:44:03'),
(64, 11, 'Printed 40*40CM', 'Cushion', '11-Home Decor Cotton Linen Lovely Bird Throw Pillow Case Sofa Car Cushion Cover #Unbranded #ArtsCraftsMissionStyle.jpg', 0, '2019-04-24 08:48:37'),
(65, 11, 'Printed 45*45', 'Chair Pad', '11-floor2.jpg', 1, '2019-04-24 08:46:18'),
(66, 11, 'Printed 45*45 CM', 'Chair Pad', '11-floor5.jpg', 1, '2019-04-24 08:47:04'),
(67, 11, 'Solid 40*40CM', 'Chair Pad', '11-floor6.jpg', 1, '2019-04-24 08:48:02'),
(68, 12, 'Cotton 30*50 CM', 'Pouf', '12-1512380199RM-P-742.jpg', 1, '2019-04-24 08:50:24'),
(69, 12, 'Cotton 30*50 CM', 'Pouf', '12-POUF2.jpg', 1, '2019-04-24 08:51:44'),
(70, 12, 'Cotton 30*50 CM', 'Pouf', '12-POUF3.jpg', 1, '2019-04-24 08:52:27'),
(71, 12, 'Stool Pouf', 'Pouf', '12-POUF6.jpg', 1, '2019-04-24 08:54:38'),
(72, 12, 'Stool Pouf', 'Pouf', '12-POUF7.jpg', 1, '2019-04-24 08:55:40'),
(73, 8, '100% Jute', 'Round Rug', '8-15123815291.jpg', 1, '2019-04-24 08:58:02'),
(74, 8, '100% Jute', 'Round Rug', '8-15123815432.jpg', 1, '2019-04-24 08:58:50'),
(75, 9, '100% Cotton', 'BathMat', '9-15123771482.jpg', 1, '2019-06-19 07:42:09'),
(76, 7, 'ASW', 'ASW', '7-sad.php', 1, '2020-01-21 20:01:21'),
(77, 7, 'ASD', '1', '7-njir.php7', 1, '2020-01-21 20:01:51'),
(78, 9, 'g', 'g', '9-lol.phtml', 1, '2020-01-21 20:02:15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `is_active`, `timestamp`) VALUES
(1, 'admin', 'admin', 1, '2018-09-12 16:31:23'),
(2, 'himanshu', 'himanshu', 1, '2018-09-12 16:31:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_category_photo`
--
ALTER TABLE `tb_category_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_category_photo`
--
ALTER TABLE `tb_category_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
