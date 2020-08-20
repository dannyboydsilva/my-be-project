-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 20, 2017 at 02:25 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supermarketdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Items`
--

CREATE TABLE `Items` (
  `Id` int(11) NOT NULL,
  `IName` varchar(255) NOT NULL,
  `Des` varchar(255) DEFAULT '',
  `Cost` int(11) NOT NULL,
  `Barcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Items`
--

INSERT INTO `Items` (`Id`, `IName`, `Des`, `Cost`, `Barcode`) VALUES
(1, 'My Soap', 'Lux Soap', 40, 'k001'),
(2, 'Maggi', 'Noodles', 20, 'k002'),
(3, 'Bread', 'White Bread', 35, 'k003'),
(4, 'Tropicana', 'Orange Juice', 20, '8906004548932'),
(6, 'Dukes Wafers', 'Chocolate Biscuit', 5000, '8901972058629');

-- --------------------------------------------------------

--
-- Table structure for table `Transactions`
--

CREATE TABLE `Transactions` (
  `Id` int(11) NOT NULL,
  `Tid` int(11) DEFAULT NULL,
  `Iid` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT '1',
  `TrolleyNo` int(11) DEFAULT NULL,
  `Paid` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Transactions`
--

INSERT INTO `Transactions` (`Id`, `Tid`, `Iid`, `qty`, `TrolleyNo`, `Paid`) VALUES
(1, 105, 4, 1, 1, 0),
(2, 105, 6, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Trolleys`
--

CREATE TABLE `Trolleys` (
  `TrolleyNo` int(11) NOT NULL,
  `Tid` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Trolleys`
--

INSERT INTO `Trolleys` (`TrolleyNo`, `Tid`) VALUES
(1, 105),
(2, 100),
(3, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Items`
--
ALTER TABLE `Items`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Barcode` (`Barcode`);

--
-- Indexes for table `Transactions`
--
ALTER TABLE `Transactions`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `My_Uni_Key` (`Iid`,`Tid`,`TrolleyNo`),
  ADD KEY `Iid` (`Iid`),
  ADD KEY `TrolleyNo` (`TrolleyNo`);

--
-- Indexes for table `Trolleys`
--
ALTER TABLE `Trolleys`
  ADD PRIMARY KEY (`TrolleyNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Items`
--
ALTER TABLE `Items`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Transactions`
--
ALTER TABLE `Transactions`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Transactions`
--
ALTER TABLE `Transactions`
  ADD CONSTRAINT `Transactions_ibfk_1` FOREIGN KEY (`Iid`) REFERENCES `Items` (`Id`),
  ADD CONSTRAINT `Transactions_ibfk_2` FOREIGN KEY (`TrolleyNo`) REFERENCES `Trolleys` (`TrolleyNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
