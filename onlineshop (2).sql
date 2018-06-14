-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2018 at 02:12 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `mail` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adress` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `dateofbirth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`mail`, `name`, `lastname`, `password`, `country`, `city`, `adress`, `tel`, `image`, `dateofbirth`) VALUES
('milos@gmail.com', 'Milos', 'Milosevicq', 'Miloss1', 'AO', 'Beograd', 'Vinodolska 5', '0620620622', NULL, '1997-04-05'),
('misko@gmail.com', 'Misko', 'Miskovic', 'misko', 'Pakistan', 'Bagdad', 'Buraza sfdif 0asd', '123456789', 'img/uploads/1528293036_хххх.jpg', '1965-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `ime`, `parent_id`) VALUES
(1, 'Laptops', NULL),
(2, 'Desktops', NULL),
(3, 'Tablets', NULL),
(4, 'Mobile phone', NULL),
(5, 'Monitors', NULL),
(7, 'Equipment', NULL),
(8, 'Components', NULL),
(9, 'Processors', 8),
(10, 'Motherboards', 8),
(11, 'Graphic cards', 8),
(12, 'Hard drives', 8),
(13, 'SSD', 8),
(14, 'Power supply', 8),
(15, 'Cabinets', 8),
(16, 'Controllers', 8),
(17, 'Optical devices', 8),
(18, 'Sound cards', 8),
(19, 'Coolers', 8),
(20, 'Mouses', 7),
(21, 'Keyboards', 7),
(22, 'Speakers', 7),
(23, 'Gaming equipment', 7),
(24, 'Webcams', 7),
(25, 'Microphones', 7),
(28, 'Printers', 7),
(29, 'Scanners', 7),
(30, 'Headphones', 7);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `buyer_mail` text COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `buyer_mail`, `product_id`, `timestamp`) VALUES
(1, 'komentar', 'misko@gmail.com', 21, '2018-06-10 15:03:44'),
(2, 'komentar', 'misko@gmail.com', 26, '2018-06-10 16:04:09'),
(3, 'fghdhdfgh', 'misko@gmail.com', 21, '2018-06-10 22:52:31'),
(4, 'dobro je sve sve je ok i bice sigurans am', 'misko@gmail.com', 21, '2018-06-11 00:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `name` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`) VALUES
(1, 'RSD'),
(2, 'USD'),
(3, 'EUR'),
(4, 'AUD'),
(5, 'BAM'),
(6, 'RUB'),
(7, 'CHF'),
(8, 'CAD'),
(9, 'HUF'),
(10, 'JPY');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `name`) VALUES
(2, 'Negotiated'),
(3, 'Perslonalized'),
(4, 'POST');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `buyer_mail` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `products_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`buyer_mail`, `products_id`) VALUES
('misko@gmail.com', 22),
('misko@gmail.com', 25);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `path` text COLLATE utf8_unicode_ci NOT NULL,
  `main` tinyint(1) DEFAULT '0',
  `extension` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `mime-type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `products_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `path`, `main`, `extension`, `mime-type`, `products_id`) VALUES
(1, 'superman.gif', 'img/products/21_1527241171_superman.gif', 1, 'gif', 'image/gif', 21),
(2, 'superman.gif', 'img/products/21_1527241171_superman.gif', 0, 'gif', 'image/gif', 21),
(3, 'superman.gif', 'img/products/21_1527241171_superman.gif', 0, 'gif', 'image/gif', 21),
(4, 'superman.gif', 'img/products/21_1527241171_superman.gif', 0, 'gif', 'image/gif', 21),
(5, 'superman.gif', 'img/products/21_1527241171_superman.gif', 0, 'gif', 'image/gif', 21),
(6, 'laptop1.jpg', 'img/products/22_1527241717_laptop1.jpg', 1, 'jpg', 'image/jpeg', 22),
(7, 'laptop1.jpg', 'img/products/22_1527241717_laptop1.jpg', 0, 'jpg', 'image/jpeg', 22),
(8, 'laptop1.jpg', 'img/products/22_1527241717_laptop1.jpg', 0, 'jpg', 'image/jpeg', 22),
(9, '', 'img/products/22_1527241717_', 0, '', '0', 22),
(10, '', 'img/products/22_1527241717_', 0, '', '0', 22),
(11, 'laptop3.jpg', 'img/products/23_1527241761_laptop3.jpg', 1, 'jpg', 'image/jpeg', 23),
(12, 'laptop4.jpg', 'img/products/23_1527241761_laptop4.jpg', 0, 'jpg', 'image/jpeg', 23),
(13, '', 'img/products/23_1527241761_', 0, '', '0', 23),
(14, '', 'img/products/23_1527241761_', 0, '', '0', 23),
(15, '', 'img/products/23_1527241761_', 0, '', '0', 23),
(16, 'laptop5.jpg', 'img/products/24_1527241793_laptop5.jpg', 1, 'jpg', 'image/jpeg', 24),
(17, 'laptop2.jpg', 'img/products/24_1527241793_laptop2.jpg', 0, 'jpg', 'image/jpeg', 24),
(18, 'laptop1.jpg', 'img/products/24_1527241793_laptop1.jpg', 0, 'jpg', 'image/jpeg', 24),
(19, 'laptop3.jpg', 'img/products/24_1527241793_laptop3.jpg', 0, 'jpg', 'image/jpeg', 24),
(20, 'laptop2.jpg', 'img/products/24_1527241793_laptop2.jpg', 0, 'jpg', 'image/jpeg', 24),
(21, 'laptop4.jpg', 'img/products/25_1527241828_laptop4.jpg', 1, 'jpg', 'image/jpeg', 25),
(22, 'laptop3.jpg', 'img/products/25_1527241828_laptop3.jpg', 0, 'jpg', 'image/jpeg', 25),
(23, 'laptop2.jpg', 'img/products/25_1527241828_laptop2.jpg', 0, 'jpg', 'image/jpeg', 25),
(24, 'laptop2.jpg', 'img/products/25_1527241828_laptop2.jpg', 0, 'jpg', 'image/jpeg', 25),
(25, 'laptop3.jpg', 'img/products/25_1527241828_laptop3.jpg', 0, 'jpg', 'image/jpeg', 25),
(26, 'monitor.jpg', 'img/products/26_1527241926_monitor.jpg', 1, 'jpg', 'image/jpeg', 26),
(27, 'monitor2.jpg', 'img/products/26_1527241926_monitor2.jpg', 0, 'jpg', 'image/jpeg', 26),
(28, 'monitor.jpg', 'img/products/26_1527241926_monitor.jpg', 0, 'jpg', 'image/jpeg', 26),
(29, '', 'img/products/26_1527241926_', 0, '', '0', 26),
(30, '', 'img/products/26_1527241926_', 0, '', '0', 26),
(31, 'tablet1.jpg', 'img/products/27_1527242036_tablet1.jpg', 1, 'jpg', 'image/jpeg', 27),
(32, 'tablet2.jpg', 'img/products/27_1527242036_tablet2.jpg', 0, 'jpg', 'image/jpeg', 27),
(33, 'tablet1.jpg', 'img/products/27_1527242036_tablet1.jpg', 0, 'jpg', 'image/jpeg', 27),
(34, 'tablet3.jpg', 'img/products/27_1527242036_tablet3.jpg', 0, 'jpg', 'image/jpeg', 27),
(35, '', 'img/products/27_1527242036_', 0, '', '0', 27),
(36, 'speakers.jpg', 'img/products/28_1527242165_speakers.jpg', 1, 'jpg', 'image/jpeg', 28),
(37, 'speakers.jpg', 'img/products/28_1527242165_speakers.jpg', 0, 'jpg', 'image/jpeg', 28),
(38, 'speakers.jpg', 'img/products/28_1527242165_speakers.jpg', 0, 'jpg', 'image/jpeg', 28),
(39, '', 'img/products/28_1527242165_', 0, '', '0', 28),
(40, '', 'img/products/28_1527242165_', 0, '', '0', 28),
(41, 'kuciste1.jpg', 'img/products/29_1527242206_kuciste1.jpg', 1, 'jpg', 'image/jpeg', 29),
(42, 'kuciste2.jpg', 'img/products/29_1527242206_kuciste2.jpg', 0, 'jpg', 'image/jpeg', 29),
(43, '', 'img/products/29_1527242206_', 0, '', '0', 29),
(44, '', 'img/products/29_1527242206_', 0, '', '0', 29),
(45, '', 'img/products/29_1527242206_', 0, '', '0', 29),
(46, 'kuciste1.jpg', 'img/products/30_1527242233_kuciste1.jpg', 1, 'jpg', 'image/jpeg', 30),
(47, 'kuciste1.jpg', 'img/products/30_1527242233_kuciste1.jpg', 0, 'jpg', 'image/jpeg', 30),
(48, 'kuciste1.jpg', 'img/products/30_1527242233_kuciste1.jpg', 0, 'jpg', 'image/jpeg', 30),
(49, 'kuciste1.jpg', 'img/products/30_1527242233_kuciste1.jpg', 0, 'jpg', 'image/jpeg', 30),
(50, 'kuciste1.jpg', 'img/products/30_1527242233_kuciste1.jpg', 0, 'jpg', 'image/jpeg', 30),
(51, 'laptop4.jpg', 'img/products/31_1527242294_laptop4.jpg', 1, 'jpg', 'image/jpeg', 31),
(52, 'laptop1.jpg', 'img/products/31_1527242294_laptop1.jpg', 0, 'jpg', 'image/jpeg', 31),
(53, 'laptop1.jpg', 'img/products/31_1527242294_laptop1.jpg', 0, 'jpg', 'image/jpeg', 31),
(54, 'laptop1.jpg', 'img/products/31_1527242294_laptop1.jpg', 0, 'jpg', 'image/jpeg', 31),
(55, '', 'img/products/31_1527242294_', 0, '', '0', 31),
(56, 'tastatura 2.jpg', 'img/products/32_1527242353_tastatura 2.jpg', 1, 'jpg', 'image/jpeg', 32),
(57, 'tastatura1.jpg', 'img/products/32_1527242353_tastatura1.jpg', 0, 'jpg', 'image/jpeg', 32),
(58, 'tastatura 2.jpg', 'img/products/32_1527242353_tastatura 2.jpg', 0, 'jpg', 'image/jpeg', 32),
(59, '', 'img/products/32_1527242353_', 0, '', '0', 32),
(60, '', 'img/products/32_1527242353_', 0, '', '0', 32),
(61, 'tastatura1.jpg', 'img/products/33_1527242409_tastatura1.jpg', 1, 'jpg', 'image/jpeg', 33),
(62, 'tastatura 2.jpg', 'img/products/33_1527242409_tastatura 2.jpg', 0, 'jpg', 'image/jpeg', 33),
(63, 'tastatura 2.jpg', 'img/products/33_1527242409_tastatura 2.jpg', 0, 'jpg', 'image/jpeg', 33),
(64, '', 'img/products/33_1527242409_', 0, '', '0', 33),
(65, '', 'img/products/33_1527242409_', 0, '', '0', 33),
(66, '', 'img/products/34_1527242461_', 1, '', '0', 34),
(67, '', 'img/products/34_1527242461_', 0, '', '0', 34),
(68, '', 'img/products/34_1527242461_', 0, '', '0', 34),
(69, '', 'img/products/34_1527242461_', 0, '', '0', 34),
(70, '', 'img/products/34_1527242461_', 0, '', '0', 34),
(71, 'procesor.jpg', 'img/products/35_1527242473_procesor.jpg', 1, 'jpg', 'image/jpeg', 35),
(72, 'procesor.jpg', 'img/products/35_1527242473_procesor.jpg', 0, 'jpg', 'image/jpeg', 35),
(73, 'procesor.jpg', 'img/products/35_1527242473_procesor.jpg', 0, 'jpg', 'image/jpeg', 35),
(74, '', 'img/products/35_1527242473_', 0, '', '0', 35),
(75, '', 'img/products/35_1527242473_', 0, '', '0', 35);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `buyer_mail` text NOT NULL,
  `seller_mail` text NOT NULL,
  `reactions` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `buyer_mail`, `seller_mail`, `reactions`, `timestamp`) VALUES
(1, 'misko@gmail.com', 'ljubisa@gmail.com', 0, '2018-06-10 22:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `receiver_mail` text NOT NULL,
  `receiver_type` varchar(10) NOT NULL,
  `sender_mail` text NOT NULL,
  `sender_type` varchar(10) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `receiver_mail`, `receiver_type`, `sender_mail`, `sender_type`, `message`, `status`, `timestamp`) VALUES
(1, 'ljubisa@gmail.com', 'seller', 'misko@gmail.com', 'buyer', 'proba', 0, '2018-05-31 22:05:51'),
(2, 'ljubisa@gmail.com', 'seller', 'misko@gmail.com', 'buyer', 'proba1', 0, '2018-05-31 22:06:54'),
(3, 'misko@gmail.com', 'buyer', 'ljubisa@gmail.com', 'seller', 'gde si misko kuco', 0, '2018-06-08 13:05:53'),
(4, 'misko@gmail.com', 'buyer', 'ljubisa@gmail.com', 'seller', 'sta mi probas koje pm', 0, '2018-06-08 13:06:02'),
(5, 'ljubisa@gmail.com', 'seller', 'misko@gmail.com', 'buyer', 'ma jebo ti pas mater ludu', 0, '2018-06-08 13:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `buyer_mail` text COLLATE utf8_unicode_ci NOT NULL,
  `seller_mail` text COLLATE utf8_unicode_ci NOT NULL,
  `stripe_id` text COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `sent` timestamp NULL DEFAULT NULL,
  `arrived` timestamp NULL DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `buyer_mail`, `seller_mail`, `stripe_id`, `product_id`, `price`, `currency`, `sent`, `arrived`, `timestamp`) VALUES
(8, 'misko@gmail.com', 'ljubisa@gmail.com', 'ch_1CakNpEnNWAh2mCBUpsnYoJM', 21, '99900', 'USD', '2018-06-10 22:21:04', '2018-06-10 22:30:12', '2018-06-10 22:30:12'),
(9, 'milos@gmail.com', 'ljubisa@gmail.com', 'ch_1CakeBEnNWAh2mCBK4Wx7SG6', 22, '5000000', 'RSD', '2018-06-10 22:56:20', '2018-06-10 22:57:03', '2018-06-10 22:57:03'),
(10, 'misko@gmail.com', 'ljubisa@gmail.com', 'ch_1CbVwdEnNWAh2mCBfI6EAYvq', 26, '45000', 'RUB', '2018-06-10 22:56:13', '2018-06-10 22:57:32', '2018-06-10 22:57:32'),
(11, 'misko@gmail.com', 'ljubisa@gmail.com', 'ch_1CbcU3EnNWAh2mCBNYVjd9Ph', 21, '99900', 'USD', '2018-06-10 22:58:23', '2018-06-10 22:58:43', '2018-06-10 22:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `sellers_id` int(11) NOT NULL,
  `tittle` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `content` int(200) NOT NULL,
  `timestemp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `seller_mail` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `seller_mail` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descriptions` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `seller_mail`, `name`, `descriptions`, `price`, `delivery_id`, `currency_id`) VALUES
(21, 2, 'ljubisa@gmail.com', 'supermenn4', 'supermen za decu malo presao prvi vlasnik', 999, 2, 2),
(22, 1, 'ljubisa@gmail.com', 'HP OMEN - 15-ce019nm - 2QE49EA', '2QE49EA Intel® Core™ i5 7300HQ do 3.5GHz, 15.6\", 256GB SSD, 8GB', 50000, 4, 1),
(23, 1, 'ljubisa@gmail.com', 'ACER Predator Helios 300 G3-572-50K2 - NOT11761', 'accer - 15-ce019nm - 2QE49EA Intel® Core™ i5 7300HQ do 3.5GHz, 15.6\", 256GB SSD, 8GB\r\nAKCIJA!!', 999, 2, 2),
(24, 1, 'ljubisa@gmail.com', 'ACER Predator Helios 300 G3-572-50K2 - NOT11761', 'accer - 15-ce019nm - 2QE49EA Intel® Core™ i5 7300HQ do 3.5GHz, 15.6\", 256GB SSD, 8GB\r\nAKCIJA!!', 999, 2, 2),
(25, 1, 'ljubisa@gmail.com', 'Asus 245-3232', 'ASUS- 15-ce019nm - 2QE49EA Intel® Core™ i5 7300HQ do 3.5GHz, 15.6\", 256GB SSD, 8GB', 998, 3, 3),
(26, 5, 'ljubisa@gmail.com', 'Monitor ACER LED', ' 23\" R231bmid IPS Full HD - UM.VR1EE.001 23\", IPS, 1920 x 1080 Full HD, 4ms', 450, 3, 6),
(27, 3, 'andjela@gmail.com', 'Tablet HUAWEI', ' Mediapad T3 10\" (Siva) 9.6\", Četiri jezgra, 2GB, WiFi', 500, 2, 2),
(28, 22, 'andjela@gmail.com', 'SOROUND', 'SONY dobro ocuvani kao novi', 45000, 4, 1),
(29, 15, 'andjela@gmail.com', 'KUCISTE ASUS', 'Kuciste novo uvezeno iz Nemacke', 700, 2, 3),
(30, 15, 'andjela@gmail.com', 'KUCISTE ASUS', 'Kuciste novo uvezeno iz Nemacke', 700, 2, 3),
(31, 1, 'andjela@gmail.com', 'Assus  32\" 8hddr', 'NOVOOO', 1000, 3, 7),
(32, 21, 'jovan@gmail.com', 'HAVIT tastatura Multi-Media', 'HAVIT tastatura Multi-Media Crna nova', 500, 2, 1),
(33, 21, 'jovan@gmail.com', 'Opticka ', 'DX-110 PS/2 - 31010116106 Optički, 1000dpi, 3, Simetričan (pogodan za obe ruke) AKCIJA!', 999, 2, 1),
(34, 9, 'jovan@gmail.com', 'kingston', '3.4GHz 2-Core APU Box AMD® FM2, AMD® A-series APU, 2, 2 NOVO!', 8000, 2, 1),
(35, 9, 'jovan@gmail.com', 'kingston', '3.4GHz 2-Core APU Box AMD® FM2, AMD® A-series APU, 2, 2 NOVO!', 8000, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `buyer_mail` text COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `timestemp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `buyer_mail`, `product_id`, `rate`, `timestemp`) VALUES
(1, 'misko@gmail.com', 26, 5, '2018-06-10 16:03:31'),
(2, 'misko@gmail.com', 21, 5, '2018-06-10 23:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `mail` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adress` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `dateofbirth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`mail`, `name`, `lastname`, `password`, `country`, `city`, `adress`, `tel`, `image`, `status`, `dateofbirth`) VALUES
('andjela@gmail.com', 'Andjela', 'Djurovic', 'andjela', 'Serbia', 'Priboj', 'LimskaBB', '0620620622', 'img/uploads/1527246294_laptop3.jpg', '', '1996-06-16'),
('jovan@gmail.com', 'Jovan', 'Ivanovic', 'jovan', 'Serbia', 'Beograd', 'Vinodolska 5', '0620620622', NULL, '', '1997-04-05'),
('ljubisa@gmail.com', 'Ljubisa', 'Ivanovic', 'ljubisa', 'Srbija', 'Beograd', 'Vinodolska 5', '0645799061', 'img/uploads/1528672395_', 'ovo je moj prvi status', '1993-08-18'),
('nenad@gmail.com', 'Nenad', 'Nenad', 'Nenadb1', 'AF', 'Becej', 'Becejska 3', '0620620622', NULL, '', '1997-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `mail` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `text`, `mail`, `timestamp`) VALUES
(1, 'ovo je moj prvi status', 'ljubisa@gmail.com', '2018-06-09 00:29:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`mail`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`buyer_mail`,`products_id`),
  ADD KEY `fk_buyer_has_products_products1_idx` (`products_id`),
  ADD KEY `fk_buyer_has_products_buyer1_idx` (`buyer_mail`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_images_products1_idx` (`products_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_posts_seller1_idx` (`seller_mail`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_seller1_idx` (`seller_mail`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `delivery_id` (`delivery_id`),
  ADD KEY `currency_id` (`currency_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`mail`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `fk_buyer_has_products_buyer1` FOREIGN KEY (`buyer_mail`) REFERENCES `buyer` (`mail`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_buyer_has_products_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_images_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_seller1` FOREIGN KEY (`seller_mail`) REFERENCES `seller` (`mail`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `currency_id` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`),
  ADD CONSTRAINT `delivery_id` FOREIGN KEY (`delivery_id`) REFERENCES `delivery` (`id`),
  ADD CONSTRAINT `fk_products_seller1` FOREIGN KEY (`seller_mail`) REFERENCES `seller` (`mail`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
