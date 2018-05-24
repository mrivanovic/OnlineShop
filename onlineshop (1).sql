-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2018 at 02:44 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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
('misko@gmail.com', 'Misko', 'Miskovic', 'misko', 'Pakistan', 'Bagdad', 'Buraza sfdif 0asd', '123456789', NULL, '1965-02-02');

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
  `content` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orders_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `main` tinyint(1) DEFAULT NULL,
  `products_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `orders_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `buyer_mail` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `status` int(20) NOT NULL,
  `quantity` int(11) DEFAULT '1',
  `details` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 20, 'ljubisa@gmail.com', 'Hama ', '0', 1000, 2, 1),
(2, 1, 'ljubisa@gmail.com', 'LENOVO IdeaPad 320-15IAP - 80XR00BHYA', 'Intel® Pentium® N4200 do 2.50GHz, 15.6\", 500GB HDD, 4GB\r\nPolovan', 30999, 3, 1),
(3, 1, 'ljubisa@gmail.com', 'HP OMEN - 15-ce019nm - 2QE49EA', 'Intel® Core™ i5 7300HQ do 3.5GHz, 15.6\", 256GB SSD, 8GB', 30000, 3, 1),
(4, 1, 'ljubisa@gmail.com', 'DELL Inspiron 15 7577 - NOT12010', 'Intel® Core™ i5 7300HQ do 3.5GHz, 15.6\", 1TB HDD, 8GB\r\nNov', 105000, 2, 1),
(5, 1, 'ljubisa@gmail.com', 'DELL Inspiron 15 7577 - NOT11998', 'Intel® Core™ i5 7300HQ do 3.5GHz, 15.6\", 256GB SSD, 8GB\r\nNOVO!', 1000, 2, 3),
(6, 1, 'ljubisa@gmail.com', 'ACER Predator Helios 300 G3-572-50K2 - NOT11761', 'Intel® Core™ i5 7300HQ do 3.5GHz, 15.6\", 256GB SSD, 8GB\r\nNOVO!!', 1100, 2, 2),
(7, 3, 'andjela@gmail.com', 'eSTAR BEAUTY 2 HD', '(Zlatna) - ES-BEAUTY-G 7\", Četiri jezgra, 1GB, WiFi', 50, 4, 3),
(8, 3, 'andjela@gmail.com', 'ALCATEL OneTouch Pixi', '4 7\" WiFi 8063 (Siva) 7\", Četiri jezgra, 1GB, WiFi NOVO', 8000, 2, 1),
(9, 3, 'andjela@gmail.com', 'HUAWEI Mediapad T3', '7\" (Siva) 7\", Četiri jezgra, 1GB, WiFi NOVO', 100, 4, 3),
(10, 5, 'andjela@gmail.com', 'ASUS LED', '18.5\" VS197DE HD Ready 18.5\", TN, 1366 x 768 HD ready, 5ms NOVO', 100, 2, 2),
(11, 15, 'andjela@gmail.com', 'GIGATRON PRIME LIDER', 'A990 Ryzen 3 + AMD Ryzen 3, 8GB DDR4 2133 MHz, 240GB SSD, GeForce GTX 1050 Ti\r\nPolovno', 30000, 4, 1),
(12, 21, 'jovan@gmail.com', 'HAVIT tastatura Multi-Media', '(Crna) - HV-KB327 SRB (YU), 104 tastera, 10 multimedijalna tastera AKCIJA!', 999, 4, 1),
(13, 20, 'jovan@gmail.com', 'GENIUS žični miš', 'DX-110 PS/2 - 31010116106 Optički, 1000dpi, 3, Simetričan (pogodan za obe ruke) AKCIJA!', 599, 4, 1),
(14, 9, 'jovan@gmail.com', 'AMD A4-5300 ', '3.4GHz 2-Core APU Box AMD® FM2, AMD® A-series APU, 2, 2 NOVO!', 4000, 4, 1),
(15, 13, 'jovan@gmail.com', 'KINGSTON 4GB DDR3L ValueRAM', '1600MHz CL11 - KVR16LN11/4 DDR3, 4GB, 1600Mhz, 1.35V NOVO', 50, 4, 2),
(18, 18, 'ljubisa@gmail.com', 'sadasdasd', '', 999, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rate` int(11) NOT NULL,
  `timestemp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orders_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `dateofbirth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`mail`, `name`, `lastname`, `password`, `country`, `city`, `adress`, `tel`, `image`, `dateofbirth`) VALUES
('andjela@gmail.com', 'Andjela', 'Djurovic', 'andjela', 'Serbia', 'Priboj', 'LimskaBB', '0620620622', NULL, '1996-06-16'),
('jovan@gmail.com', 'Jovan', 'Ivanovic', 'jovan', 'Serbia', 'Beograd', 'Vinodolska 5', '0620620622', NULL, '1997-04-05'),
('ljubisa@gmail.com', 'Ljubisa', 'Ivanovic', 'ljubisa', 'Srbija', 'Beograd', 'Vinodolska 5', '0645799061', 'img/uploads/1527158783_superman.gif', '1993-08-18');

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
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `fk_comments_orders1_idx` (`orders_id`);

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
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`orders_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_products1_idx` (`products_id`),
  ADD KEY `fk_orders_buyer1_idx` (`buyer_mail`);

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
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `fk_ratings_orders1_idx` (`orders_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_orders1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `order_id` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_buyer1` FOREIGN KEY (`buyer_mail`) REFERENCES `buyer` (`mail`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `fk_ratings_orders1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
