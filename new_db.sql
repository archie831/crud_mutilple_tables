-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2019 at 08:38 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

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
  `cContact` int(11) NOT NULL,
  `cAddress` varchar(255) NOT NULL,
  `cDateAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cId`, `cName`, `cContact`, `cAddress`, `cDateAdded`) VALUES
(1, 'Bruce Lee', 2344567, 'Canduman Mandaue City', '2019-09-07 00:00:00'),
(2, 'James Bond', 1234567, 'Basak Mandaue City Cebu', '2019-09-07 00:00:00'),
(3, 'Steve Jobs', 2147483647, 'United States', '2019-09-14 09:31:21'),
(4, 'Bill Gates', 2147483647, 'United States', '2019-09-14 09:32:07'),
(5, 'Will Smith', 2147483647, 'Cebu City', '2019-09-14 11:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oId` int(11) NOT NULL,
  `oNo` int(11) NOT NULL,
  `pId` int(11) NOT NULL,
  `cId` int(11) NOT NULL,
  `oQuantity` int(11) NOT NULL,
  `oDate` datetime NOT NULL,
  `uId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oId`, `oNo`, `pId`, `cId`, `oQuantity`, `oDate`, `uId`) VALUES
(1, 1001, 1, 1, 1, '2019-09-07 00:00:00', 1),
(2, 1001, 2, 1, 10, '2019-09-07 00:00:00', 2),
(4, 1003, 6, 4, 10, '2019-09-14 09:32:44', 1),
(5, 1004, 4, 3, 20, '2019-09-14 09:33:43', 4),
(6, 1002, 2, 5, 5, '2019-09-14 11:04:45', 4),
(7, 1005, 1, 4, 50, '2019-09-14 11:33:30', 4);

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
(1, 'Huawei P30 Pro', 'Specification\r\nProcessor\r\nQuad-Core 4.MTK6580A\r\nDisplay\r\n6.0 inch 3D bending screen\r\nCamera', 25000, 10),
(2, 'OPPO F7', 'Specification\r\nProcessor\r\nQuad-Core 4.MTK6580A\r\nDisplay\r\n6.0 inch 3D bending screen\r\nCamera', 15000, 20),
(3, 'Samsung Galaxy Tab A 10.1', 'Metal, Unibody Design that gives a stylish look with enhanced durability', 15990, 50),
(4, 'Apple iPad Wi-Fi', '9.7 inches, 291.4 cm2 (~71.6% screen-to-body ratio)', 19590, 100),
(5, 'Torque Droidz Edge (WiFi)', 'Android 4.2 JellyBean', 1030, 100),
(6, 'Samsung Galaxy Tab S5e', 'Slimmest, lightest tablet at 5.5mm-thick and weighing just 400g makes it easy to pick up and carry around with you throughout your day', 25500, 50),
(7, 'Apple iPhone 6 Gold 32GB', '4.7-inch (diagonal) LED-backlit widescreen Multi Touch display with IPS technology 8-megapixel camera with 1080p HD video recording (30 fps or 60 fps) FaceTime HD Camera 720p HD video recording Touch ID for secure authentication', 16990, 999);

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
(1, 'archie831', '6121904d3138741fb744fba85c276606', '2019-09-07 00:00:00'),
(2, 'john123', '25d55ad283aa400af464c76d713c07ad', '2019-09-07 00:00:00'),
(4, 'informatics789', 'a95c530a7af5f492a74499e70578d150', '0000-00-00 00:00:00'),
(5, 'marayacarey', 'e807f1fcf82d132f9bb018ca6738a19f', '0000-00-00 00:00:00');

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
  ADD KEY `cId` (`cId`),
  ADD KEY `pId_fk` (`pId`),
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
  MODIFY `cId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
