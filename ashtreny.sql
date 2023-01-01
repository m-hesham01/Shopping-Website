-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 01, 2023 at 10:52 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ashtreny`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `CID` int NOT NULL AUTO_INCREMENT,
  `UID` int NOT NULL,
  `PID` int NOT NULL,
  `QuantityInCart` int NOT NULL,
  `TotalPrice` float DEFAULT NULL,
  PRIMARY KEY (`CID`),
  KEY `PID` (`PID`),
  KEY `UID` (`UID`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CID`, `UID`, `PID`, `QuantityInCart`, `TotalPrice`) VALUES
(30, 3, 18, 1, 35),
(31, 3, 20, 1, 50),
(32, 3, 16, 4, 104),
(34, 1, 3, 1, 16500);

-- --------------------------------------------------------

--
-- Table structure for table `likedmarkets`
--

DROP TABLE IF EXISTS `likedmarkets`;
CREATE TABLE IF NOT EXISTS `likedmarkets` (
  `LMID` int NOT NULL AUTO_INCREMENT,
  `UID` int NOT NULL,
  `MID` int NOT NULL,
  PRIMARY KEY (`LMID`),
  KEY `MID` (`MID`),
  KEY `UID` (`UID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `likedmarkets`
--

INSERT INTO `likedmarkets` (`LMID`, `UID`, `MID`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 1, 1),
(4, 3, 2),
(5, 2, 2),
(6, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `likedproducts`
--

DROP TABLE IF EXISTS `likedproducts`;
CREATE TABLE IF NOT EXISTS `likedproducts` (
  `LPID` int NOT NULL AUTO_INCREMENT,
  `UID` int NOT NULL,
  `PID` int NOT NULL,
  PRIMARY KEY (`LPID`),
  KEY `PID` (`PID`),
  KEY `UID` (`UID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `likedproducts`
--

INSERT INTO `likedproducts` (`LPID`, `UID`, `PID`) VALUES
(21, 3, 14);

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

DROP TABLE IF EXISTS `market`;
CREATE TABLE IF NOT EXISTS `market` (
  `MID` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `BalanceNum` varchar(45) NOT NULL,
  `Balance` float NOT NULL,
  PRIMARY KEY (`MID`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`MID`, `Username`, `Password`, `Email`, `Image`, `Address`, `Phone`, `Location`, `BalanceNum`, `Balance`) VALUES
(1, '2B', '123', '2b@not2b.com', '2b.jpg', 'zayed', '19000', 'mall of arabia', '00000', 0),
(2, 'Hyper One', '123', 'hyper@hyper.com', 'hyper.png', 'zayed', '19900', 'mehwar', '80000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `marketproducts`
--

DROP TABLE IF EXISTS `marketproducts`;
CREATE TABLE IF NOT EXISTS `marketproducts` (
  `MPID` int NOT NULL AUTO_INCREMENT,
  `MID` int NOT NULL,
  `PID` int NOT NULL,
  PRIMARY KEY (`MPID`),
  KEY `PID` (`PID`),
  KEY `MID` (`MID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `marketproducts`
--

INSERT INTO `marketproducts` (`MPID`, `MID`, `PID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 2, 15),
(16, 2, 16),
(17, 2, 17),
(18, 2, 18),
(19, 2, 19),
(20, 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `PID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Price` float NOT NULL,
  `Image` varchar(255) NOT NULL,
  `BriefDescription` varchar(90) NOT NULL,
  `FullDescription` varchar(300) NOT NULL,
  `Quantity` int NOT NULL,
  `Category` varchar(45) NOT NULL,
  `Brand` varchar(45) NOT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PID`, `Name`, `Price`, `Image`, `BriefDescription`, `FullDescription`, `Quantity`, `Category`, `Brand`) VALUES
(1, 'Samsung 40 inch Full HD Smart TV', 7000, 'tv1.jpg', 'with Built-in Receiver', 'HD picture quality Enjoy your HD TV in the digital age we live in. Once you watch images on HDTV with vivid, vivid detail, you can be sure that you will never go back to standard definition devices or to analog TV.', 10, 'TV', 'Samsung'),
(2, 'Samsung 85 Inche Neo QLED 8K Smart TV', 99999, 'tv2.jpg', '2021 Model', 'Video Picture Engine: Quantum Processor 8KHDR (High Dynamic Range): Quantum HDR 32xHDR 10+: Yes Contrast: Quantum Matrix Technology ProColor Volume: 100% Color Volume Viewing Angle: Ultra Viewing Angle', 2, 'TV', 'Samsung'),
(3, 'Samsung 65 Inch 4K UHD Smart LED TV', 16500, 'tv.jpg', 'with Built-in Receiver and Remote Control', 'Fine-tuned color for a true-to-life picture Smooth movement for a clear picture Motion Xcelerator Enjoy image clarity and performance as this feature automatically estimates and compensates frames for the content source.', 4, 'TV', 'Samsung'),
(4, 'LG 4K UHD Smart TV 55 Inch 4K UHD', 13000, 'tv3.jpg', 'Vibrant Viewing in Ultra High Resolution With Magic Remote', '3 Years Warranty On BuyBuy Only', 13, 'TV', 'LG'),
(5, 'LG NanoCell TV 65 Inch NANO79 Series', 21000, 'tv4.jpg', 'Cinema Screen Design 4K Active HDR WebOS Smart AI ThinQ', 'Real 4K NanoCell for Pure coloer with Nano Color , Nano Accuracy', 6, 'TV', 'LG'),
(6, 'Samsung Galaxy S22 Ultra', 32750, 'a1.jpg', 'test', 'test', 11, 'Mobile Phone', 'Samsung'),
(7, 'Samsung Galaxy A23', 6099, 'a2.jpg', '28GB, 4GB RAM, Dual SIM ', 'Ergonomic design Easy to maintain', 35, 'Mobile Phone', 'Samsung'),
(8, 'Samsung Galaxy Z Fold4', 46690, 'a3.jpg', '256GB', 'Multi View - Whether toggling between texts or catching up on emails, take full advantage of the expansive Main Screen with Multi View.', 3, 'Mobile Phone', 'Samsung'),
(9, 'Oppo A76', 6820, 'b1.jpg', '128GB 6GB RAM', 'Made with a modern and more convenient technology', 3, 'Mobile Phone', 'Oppo'),
(11, 'Oppo A55', 6900, 'b2.jpg', '128 GB', 'Unparalleled performance Best-in class specs Cutting-edge technology Seamless functionality', 3, 'Mobile Phone', 'Oppo'),
(12, 'Oppo Reno 6', 14400, 'b3.jpg', 'RAM 128GB', 'ower You Get Day and Night : Our All-Day Intelligent Battery (4300mAh) harnesses power maxing out Combined with a new power-efficient display and processor, it could get you through the workday and late-night fun', 4, 'Mobile Phone', 'Oppo'),
(13, 'Apple iPhone 14 Pro Max', 57000, 'c1.jpg', '256 GB', '6.7-inch Super Retina XDR display featuring Always-On and ProMotion Dynamic Island, a magical new way to interact with iPhone', 7, 'Mobile Phone', 'Apple'),
(14, 'Apple iPhone 13 Pro Max', 45700, 'b4.jpg', '256 GB', '6.7-inch Super Retina XDR display with ProMotion for a faster, more responsive feel', 13, 'Mobile Phone', 'Apple'),
(15, 'Mcvities Dark Chocolate Golden Oat', 45, '1.jpg', '12 Pieces', ' Flavour dark chocolate', 1, 'Food', 'Mcvities'),
(16, 'Fitness Biscuits Plain', 26, '2.jpg', 'Pack of 12', '360 grams', 8, 'Food', 'Nestle'),
(17, 'NESCAFE 3IN1 Milky', 35, '4.jpg', 'Pack of 12', '20g', 3, 'Food', 'Nestle'),
(18, 'Abu Auf Instant Coffee Classic', 35, '5.jpg', '24 Packet', 'Ground', 18, 'Food', 'Abu Auf'),
(19, 'BONJORNO Latte', 44, '6.jpg', 'Pack of 12', 'caffeinated', 9, 'Food', 'Bonjorno'),
(20, 'Abu Auf Peanut Butter', 50, '7.jpg', '300 Gm', 'Creamy', 3, 'Food', 'Abu Auf');

-- --------------------------------------------------------

--
-- Table structure for table `purchasedproducts`
--

DROP TABLE IF EXISTS `purchasedproducts`;
CREATE TABLE IF NOT EXISTS `purchasedproducts` (
  `PPID` int NOT NULL AUTO_INCREMENT,
  `UID` int NOT NULL,
  `PID` int NOT NULL,
  `purchasedQuantity` int NOT NULL,
  `Amount` float DEFAULT NULL,
  `Arrived` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`PPID`),
  KEY `PID` (`PID`),
  KEY `UID` (`UID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchasedproducts`
--

INSERT INTO `purchasedproducts` (`PPID`, `UID`, `PID`, `purchasedQuantity`, `Amount`, `Arrived`) VALUES
(1, 1, 18, 1, 35, 0),
(2, 1, 5, 1, 21000, 0),
(3, 1, 7, 4, 24396, 0),
(6, 1, 15, 1, 45, 1),
(7, 1, 13, 6, 342000, 1),
(8, 1, 20, 2, 100, 0),
(10, 1, 2, 1, 99999, 0),
(11, 1, 4, 1, 13000, 0),
(12, 1, 17, 1, 35, 0),
(13, 1, 16, 1, 26, 0),
(14, 1, 1, 1, 7000, 0),
(15, 1, 12, 2, 28800, 0),
(16, 3, 4, 4, 52000, 0),
(17, 3, 13, 1, 57000, 0),
(18, 3, 2, 1, 99999, 0),
(19, 3, 6, 1, 32750, 0),
(20, 3, 8, 1, 46690, 0),
(21, 2, 1, 1, 7000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UID` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`UID`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UID`, `Username`, `Password`, `Email`, `Image`, `Address`, `Phone`, `Location`) VALUES
(1, 'm_hesham01', '123', 'mohamedhesham2001@icloud.com', 'avi.png', 'zayed', '01155508864', 'mehwar'),
(2, 'Test', '123', 'testawy@test', '8.jpg', 'here', '0123456789', ''),
(3, 'Test2', '123', 'testawy2@test', '7.jpg', 'here', '0123456789', 'there');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `product` (`PID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`);

--
-- Constraints for table `likedmarkets`
--
ALTER TABLE `likedmarkets`
  ADD CONSTRAINT `likedmarkets_ibfk_1` FOREIGN KEY (`MID`) REFERENCES `market` (`MID`),
  ADD CONSTRAINT `likedmarkets_ibfk_2` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`);

--
-- Constraints for table `likedproducts`
--
ALTER TABLE `likedproducts`
  ADD CONSTRAINT `likedproducts_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `product` (`PID`),
  ADD CONSTRAINT `likedproducts_ibfk_2` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`);

--
-- Constraints for table `marketproducts`
--
ALTER TABLE `marketproducts`
  ADD CONSTRAINT `marketproducts_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `product` (`PID`),
  ADD CONSTRAINT `marketproducts_ibfk_2` FOREIGN KEY (`MID`) REFERENCES `market` (`MID`);

--
-- Constraints for table `purchasedproducts`
--
ALTER TABLE `purchasedproducts`
  ADD CONSTRAINT `purchasedproducts_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `product` (`PID`),
  ADD CONSTRAINT `purchasedproducts_ibfk_2` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
