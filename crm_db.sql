-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2020 at 05:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ClientID` int(11) NOT NULL,
  `Client_FirstName` varchar(45) DEFAULT NULL,
  `Client_LastName` varchar(45) DEFAULT NULL,
  `Client_Email` varchar(45) DEFAULT NULL,
  `Company` varchar(45) DEFAULT NULL,
  `Client_Age` varchar(45) DEFAULT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ClientID`, `Client_FirstName`, `Client_LastName`, `Client_Email`, `Company`, `Client_Age`, `UserID`) VALUES
(1, 'Tito', 'Perez', 'tito@gmai.com', 'Microsoft', '25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ordersales`
--

CREATE TABLE `ordersales` (
  `OrderID` int(11) NOT NULL,
  `ClientID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ordersales`
--

INSERT INTO `ordersales` (`OrderID`, `ClientID`, `UserID`, `ProductID`, `CreatedDate`) VALUES
(1, 1, 1, 1, '2020-02-08 01:43:59'),
(2, 1, 1, 2, '2020-02-08 01:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `Product_Name` varchar(45) DEFAULT NULL,
  `Product_Price` int(11) DEFAULT NULL,
  `Product_Stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Product_Name`, `Product_Price`, `Product_Stock`) VALUES
(1, 'Pencil', 20, 10),
(2, 'Laptop Dell ', 300, 12);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `First_Name` varchar(45) DEFAULT NULL,
  `Last_Name` varchar(45) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `First_Name`, `Last_Name`, `Password`, `Email`) VALUES
(8, 'Onasi', 'Cuevas', '$2y$10$bL4JPOxeED4WLvYeekJqve1odRkRF8Fv9SxlL99HFSdClf3a3xfR2', 'admin@gmail.com'),
(11, '', '', '$2y$10$Hod.bVSOZXYBXksiaOhDCOdfEV.7tuCaczrkBdY0AA7WDLPnzygtO', ''),
(12, 'carlos', 'Guillermo', '$2y$10$IYXA2Pnu/4XjnQ6fpnpk3OuW0CvONnJmEpOMcn4ETWdVyhZ1TUaue', 'carlos@gmail.com'),
(13, 'Onasi', 'das', '$2y$10$0ZINm9UHbCyMQcvskiknIOCv7j8UtVp1m2TQtbZdW2plG8zeV3cde', 'ad@gmail.com'),
(14, '', '', '$2y$10$1OT8W.S0g3DANkuDA6i9s.iCe6mbd20u8mzlWyDnh5TQgaZTxgdaO', ''),
(15, 'Carlos', 'Martinez', '$2y$10$CIxbMBMk1Vx.BZuIVTXwte/yJFfbiNjjA0d6n/.SMQ2ND5Vi2DdQq', 'carlos@gmail.com'),
(16, '', '', '$2y$10$zoneGihaeOHIL1.j6Vb/GuuGASBErJBTFUX1wrKRB/hx4dAXzGou.', ''),
(17, 'Maria', 'Castillo', '$2y$10$v/7LJqZ9XOHdj17SLscqXeBAoQu5FBuBdQMYeQJyH/ycJqJtMp1BO', 'maria@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ClientID`);

--
-- Indexes for table `ordersales`
--
ALTER TABLE `ordersales`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ordersales`
--
ALTER TABLE `ordersales`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
