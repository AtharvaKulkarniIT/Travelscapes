-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2023 at 10:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelscapes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `srno` int(3) NOT NULL,
  `Admin_Name` varchar(100) NOT NULL,
  `Admin_Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`srno`, `Admin_Name`, `Admin_Password`) VALUES
(1, 'Admin', 'Admin'),
(2, 'Tejas', 'Tejas'),
(3,  'atharva', 'atharva'),
(4, 'yash' ,  'Yash');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `cityid` int(4) NOT NULL,
  `city` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `season` varchar(255) NOT NULL,
  `days` int(2) NOT NULL,
  `cost` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`cityid`, `city`, `region`, `season`, `days`, `cost`) VALUES
(1, 'Chennai', 'South', 'Winter', 3, 30000),
(2, 'Ladakh', 'North', 'Summer', 7, 50000),
(3, 'Manali', 'North', 'Monsoon', 5, 35000),
(4, 'Mumbai', 'West', 'Winter', 3, 15000),
(5, 'Pune', 'West', 'Winter', 3, 15000),
(6, 'Rajasthan', 'North-West', 'Winter', 7, 40000),
(7, 'Goa', 'West', 'Summer', 3, 15000),
(8, 'Kerala', 'South', 'Monsoon', 5, 21000),
(9, 'Sikkim', 'North-East', 'Winter', 7, 55000);

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotelid` int(11) NOT NULL,
  `hotel` varchar(255) NOT NULL,
  `cityid` int(11) DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `amenities` text DEFAULT NULL,
  `ratings` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotelid`, `hotel`, `cityid`, `cost`, `amenities`, `ratings`) VALUES
(1, 'Maple Hermitage', 1, 6000.00, '1. 24*7 Room Service\r\n2. Fine-Dining\r\n3. Free WiFi\r\n4. CCTV Surveillance\r\n5. Swimming Pool', 3),
(2, 'Trident', 2, 7000.00, '1. 24*7 Room Service\r\n2. Fine-Dining\r\n3. Free WiFi\r\n4. CCTV Surveillance\r\n5. Swimming Pool', 5),
(3, 'JW Marriott', 5, 7000.00, '1. 24*7 Room Service\r\n2. Fine-Dining\r\n3. Free WiFi\r\n4. CCTV Surveillance\r\n5. Swimming Pool', 5),
(4, 'The Taj', 4, 9000.00, '1. 24*7 Room Service\r\n2. Fine-Dining\r\n3. Free WiFi\r\n4. CCTV Surveillance\r\n5. Swimming Pool', NULL),
(5, 'The Leela Palace', 3, 8000.00, '1. 24*7 Room Service\r\n2. Fine-Dining\r\n3. Free WiFi\r\n4. CCTV Surveillance\r\n5. Swimming Pool', 5),
(6, 'Ritz Carlton', 7, 8000.00, '1. 24*7 Room Service\r\n2. Fine-Dining\r\n3. Free WiFi\r\n4. CCTV Surveillance\r\n5. Swimming Pool', 5),
(7, 'Kohinoor', 6, 5000.00, '1. 24*7 Water Supply\r\n2. Fine-Dining\r\n3. Free WiFi\r\n4. CCTV Surveillance\r\n5. Swimming Pool', 3),
(8, 'Taj Exotica', 8, 7000.00, '1. 24*7 Room Service\r\n2. Fine-Dining\r\n3. Free WiFi\r\n4. CCTV Surveillance\r\n5. Swimming Pool', 5),
(9, 'Tunga International', 9, 7000.00, '1. 24*7 Room Service\r\n2. Fine-Dining\r\n3. Free WiFi\r\n4. CCTV Surveillance\r\n5. Great Views', 5);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `usersid` int(4) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersuid` varchar(128) NOT NULL,
  `userspwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`usersid`, `usersEmail`, `usersuid`, `userspwd`) VALUES
(1, 'test@test.com', 'test', '$2y$10$flekLyq.6a/gn12Xsdm0v.SZZCrx3/.Pm3M3Ucvel8MwCzReorRsq'),
(2, 'test2@test.com', 'test2', '$2y$10$uqx8Jk9IDXZ8q1x4JFPR5OYiaCKYTquxsXH6A0OM7hTXkpEKXzjJG'),
(3, 'test3@test.com', 'test3', '$2y$10$OGLEA.ETOj1DB0fRhjjuduKb4OJ75.WB5wgs5UVUBPjTMbcoUVVgy'),
(5, 'test4@test.com', 'test4', '$2y$10$ikw.LpmUCDlMTuK2qdUyNuueZOn2Zrqkg4WLEuUaqDFLYh4YjrIlC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`cityid`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotelid`),
  ADD KEY `hotels_ibfk_1` (`cityid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`usersid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `srno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `cityid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotelid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `usersid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`cityid`) REFERENCES `cities` (`cityid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
