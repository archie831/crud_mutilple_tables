-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2019 at 06:51 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cId` int(11) NOT NULL,
  `cName` varchar(255) NOT NULL,
  `cContact` varchar(13) NOT NULL,
  `cAddress` varchar(255) NOT NULL,
  `cDateAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cId`, `cName`, `cContact`, `cAddress`, `cDateAdded`) VALUES
(1, 'Bruce Lee', '1234567', 'Mandaue City', '2019-09-08 00:03:09'),
(2, 'Steve Jobs', '4567891', 'United States', '2019-09-08 00:03:09'),
(3, 'Bill Gates', '1239999', 'United States', '2019-09-08 12:32:27'),
(4, 'Henry Sy', '4567891', 'Cebu City', '2019-09-08 02:38:02'),
(5, '  Lebron James', '12345678', 'United States', '2019-09-08 04:39:26'),
(6, 'Donald Trump', '1112222', 'United States', '2019-09-09 08:53:53'),
(7, 'asfasfdasf', '2147483647', 'asdfasdf', '2019-09-10 01:35:16'),
(8, 'asdfasdfasdfasdf', '2147483647', 'asdfasdf', '2019-09-10 01:36:08'),
(9, 'asdfs123', '2147483647', 'sdfsdf', '2019-09-10 01:37:41'),
(10, 'asdfsdfasf', '2147483647', 'sdfsdfasfdas123123', '2019-09-10 01:41:15'),
(11, 'William Smith', '9287314697', 'Manila Philippines', '2019-09-10 01:45:09'),
(12, 'asdfasdfsfdsdfsdfsdf', '9324183436', 'asdfsdfsdfsdf', '2019-09-10 01:47:24'),
(13, 'asdfasdfsfsdfdfd', '639324193436', 'asdfdfdfd12313232', '2019-09-10 01:47:53'),
(14, 'sdfdf123sds123', '9324183436', 'dfdfdfdfdfd12121', '2019-09-10 01:48:34'),
(15, 'asdfsdfasfasdf', '9321483436', 'asdfsdf', '2019-09-10 01:49:45'),
(16, 'asdfdfdfdfdf', '9321483635', 'asdfsfddsf', '2019-09-10 01:50:29'),
(17, 'Bruce Willis', '+639124567890', 'Canada', '2019-09-10 01:53:07'),
(18, 'sdfasdf123123', '09354658888', 'asdfasdfsd123', '2019-09-13 06:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oId` int(11) NOT NULL,
  `oNo` bigint(20) NOT NULL,
  `pId` int(11) NOT NULL,
  `cId` int(11) NOT NULL,
  `oQuantity` bigint(20) NOT NULL,
  `oDate` datetime NOT NULL,
  `uId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oId`, `oNo`, `pId`, `cId`, `oQuantity`, `oDate`, `uId`) VALUES
(2, 1002, 3, 2, 2, '2019-09-08 00:04:50', 1),
(6, 1006, 6, 3, 1, '2019-09-08 02:40:01', 1),
(7, 1006, 3, 6, 10, '2019-09-09 08:54:41', 1),
(11, 1001, 1, 2, 5, '2019-09-13 02:03:26', 1),
(12, 1007, 3, 5, 1, '2019-09-13 01:54:52', 1),
(13, 888, 9, 14, 888, '2019-09-13 08:30:38', 14),
(14, 1011, 8, 15, 100, '2019-09-13 08:44:01', 14),
(15, 1009, 2, 4, 20, '2019-09-14 12:45:45', 31);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pId` int(11) NOT NULL,
  `pName` varchar(255) NOT NULL,
  `pDesc` varchar(255) NOT NULL,
  `pPrice` float NOT NULL,
  `pStock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pId`, `pName`, `pDesc`, `pPrice`, `pStock`) VALUES
(1, 'Xiaomi Redmi Note 7', '6.3 inches FHD+\r\nAndroid 9.0\r\nQualcomm Snapdragon 660\r\nOcta-core 2.2 GHz\r\n48 MP (1.6m 4-in-1 Super Pixel, f/1.8)+ 5MP(1.12?m)Rear camera + 13MP (1.12m, 2.0) Front camera', 7990, 20),
(2, 'Gome U7 6GB RAM 64GB ROM (Blue)', 'Memory: 4GB RAM / 64GB ROM ; 6GB RAM 64GB ROM', 4599, 50),
(3, 'Apple iPhone XS Max', 'SuperRetina HD display\r\n6.5-inch (diagonal) all-screen OLED Multi?Touch display\r\nHDR display', 70690, 10),
(4, 'Apple iPhone XS', 'Available on Oct 26, 2018, 12:00AM SuperRetina HD display 5.8â€‘inch (diagonal) allâ€‘screen OLED Multiâ€‘Touch display HDR display', 60952.1, 20),
(5, 'Samsung Galaxy J6 Plus', 'Premium Design Professional Dual Camera', 9990, 15),
(6, 'Samsung Galaxy Tab A 10.1', 'Metal, Unibody Design that gives a stylish look with enhanced durability', 15990, 30),
(7, 'test 99999', 'test test test durable 9999', 999, 9999),
(8, '2nd test', '2nd test product', 10, 9),
(9, 'fucking test', 'fucking long long test!!!', 978798, 789);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uId` int(11) NOT NULL,
  `uUsername` varchar(255) NOT NULL,
  `uPassword` varchar(255) NOT NULL,
  `uDateAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uId`, `uUsername`, `uPassword`, `uDateAdded`) VALUES
(1, 'archie831', '81dc9bdb52d04dc20036dbd8313ed055', '2019-09-08 00:01:21'),
(14, 'testuser', '85064efb60a9601805dcea56ec5402f7', '2019-09-13 08:30:06'),
(28, 'informatics123', '25f9e794323b453885f5181f1b624d0b', '2019-09-14 12:26:30'),
(30, 'admin19', '25f9e794323b453885f5181f1b624d0b', '2019-09-14 12:34:55'),
(31, 'Angel123', '25f9e794323b453885f5181f1b624d0b', '2019-09-14 12:42:51'),
(32, 'jake000', '1709d49072fb7f115f087346dc3c6269', '2019-09-14 12:43:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oId`),
  ADD KEY `pId_fk` (`pId`),
  ADD KEY `cId` (`cId`),
  ADD KEY `uId_fk` (`uId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `cId` FOREIGN KEY (`cId`) REFERENCES `customers` (`cId`) ON DELETE CASCADE,
  ADD CONSTRAINT `pId_fk` FOREIGN KEY (`pId`) REFERENCES `products` (`pId`) ON DELETE CASCADE,
  ADD CONSTRAINT `uId_fk` FOREIGN KEY (`uId`) REFERENCES `users` (`uId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
