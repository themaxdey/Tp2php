-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2019 at 05:21 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Asset Management`
--

-- --------------------------------------------------------

--
-- Table structure for table `ASSETS_CUSTOMERS`
--

CREATE TABLE IF NOT EXISTS `ASSETS_CUSTOMERS` (
  `Customer_Name` varchar(100) COLLATE utf32_bin NOT NULL,
  `PK Customer_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `ASSETS_CUSTOMERS`
--

INSERT INTO `ASSETS_CUSTOMERS` (`Customer_Name`, `PK Customer_ID`) VALUES
('Paul', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ASSETS_EVENTS`
--

CREATE TABLE IF NOT EXISTS `ASSETS_EVENTS` (
  `PK_Event_ID` int(11) NOT NULL,
  `FK_Customer_ID` int(11) NOT NULL,
  `FK_Register_ID` int(11) NOT NULL,
  `Event_Type` varchar(100) COLLATE utf32_bin NOT NULL,
  `Event_Date` date NOT NULL,
  `Event_Amount` double NOT NULL,
  `Event_Description` varchar(100) COLLATE utf32_bin NOT NULL,
  `Invoice_Paid` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `ASSETS_EVENTS`
--

INSERT INTO `ASSETS_EVENTS` (`PK_Event_ID`, `FK_Customer_ID`, `FK_Register_ID`, `Event_Type`, `Event_Date`, `Event_Amount`, `Event_Description`, `Invoice_Paid`) VALUES
(1, 3, 0, 'Vente', '2019-02-06', 200, 'Vraiment compliquer', 50),
(5, 3, 0, 'ee', '2019-04-03', 0, 'ee', 0),
(6, 3, 0, 'ee', '2019-04-03', 0, 'ee', 0),
(7, 3, 0, 'ee', '2019-04-03', 0, 'ee', 0),
(8, 3, 0, 'poupou', '2019-04-03', 60, 'c gay le poupou', 40);

-- --------------------------------------------------------

--
-- Table structure for table `ASSET_REGISTER`
--

CREATE TABLE IF NOT EXISTS `ASSET_REGISTER` (
  `PK_Asset_Register_ID` int(11) NOT NULL,
  `Asset_Name` varchar(100) COLLATE utf32_bin NOT NULL,
  `Type` varchar(100) COLLATE utf32_bin NOT NULL,
  `physicalPresence` varchar(100) COLLATE utf32_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `ASSET_REGISTER`
--

INSERT INTO `ASSET_REGISTER` (`PK_Asset_Register_ID`, `Asset_Name`, `Type`, `physicalPresence`) VALUES
(5, 'axcvbnmrjy  junior le deuxiwemwe', '', 'Intangible'),
(7, 'Nintendo', 'Actif financier', 'Tangible'),
(8, 'Manon', 'Actif financier', 'Tangible'),
(9, 'e', 'Actif fixe', 'Tangible'),
(10, 'abc', 'Actif courant', 'Tangible'),
(11, 'Essaie', 'Actif fixe', 'Intangible');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ASSETS_CUSTOMERS`
--
ALTER TABLE `ASSETS_CUSTOMERS`
  ADD PRIMARY KEY (`PK Customer_ID`);

--
-- Indexes for table `ASSETS_EVENTS`
--
ALTER TABLE `ASSETS_EVENTS`
  ADD PRIMARY KEY (`PK_Event_ID`),
  ADD KEY `FK Customer_ID` (`FK_Customer_ID`),
  ADD KEY `PK Event_ID` (`PK_Event_ID`),
  ADD KEY `FK_Register_ID` (`FK_Register_ID`);

--
-- Indexes for table `ASSET_REGISTER`
--
ALTER TABLE `ASSET_REGISTER`
  ADD PRIMARY KEY (`PK_Asset_Register_ID`),
  ADD KEY `PK_Asset_Register_ID` (`PK_Asset_Register_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ASSETS_CUSTOMERS`
--
ALTER TABLE `ASSETS_CUSTOMERS`
  MODIFY `PK Customer_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ASSETS_EVENTS`
--
ALTER TABLE `ASSETS_EVENTS`
  MODIFY `PK_Event_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ASSET_REGISTER`
--
ALTER TABLE `ASSET_REGISTER`
  MODIFY `PK_Asset_Register_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ASSETS_EVENTS`
--
ALTER TABLE `ASSETS_EVENTS`
  ADD CONSTRAINT `FKC_EVENTS_CUSTOMERS` FOREIGN KEY (`FK_Customer_ID`) REFERENCES `ASSETS_CUSTOMERS` (`PK Customer_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
