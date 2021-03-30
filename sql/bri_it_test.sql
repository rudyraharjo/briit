-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2021 at 01:34 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bri_it_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_issuer`
--

CREATE TABLE `tb_issuer` (
  `ID` int(11) NOT NULL,
  `prefix` int(11) NOT NULL,
  `bank` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_issuer`
--

INSERT INTO `tb_issuer` (`ID`, `prefix`, `bank`) VALUES
(1, 5567, 'A'),
(2, 5520, 'B'),
(3, 7790, 'C'),
(4, 8890, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `tb_terminalatm`
--

CREATE TABLE `tb_terminalatm` (
  `ID` int(11) NOT NULL,
  `nomor_terminal` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_terminalatm`
--

INSERT INTO `tb_terminalatm` (`ID`, `nomor_terminal`, `merk`) VALUES
(1, 'SV0001', 'HITACHI'),
(2, 'SV0002', 'HITACHI'),
(3, 'SV0003', 'HYOSUNG'),
(4, 'SV0004', 'HYOSUNG'),
(5, 'SV0005', 'HYOSUNG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksiatm`
--

CREATE TABLE `tb_transaksiatm` (
  `ID` int(11) NOT NULL,
  `terminal` varchar(255) NOT NULL,
  `nomor_kartu` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksiatm`
--

INSERT INTO `tb_transaksiatm` (`ID`, `terminal`, `nomor_kartu`, `amount`) VALUES
(12, 'SV0001', '55679293945', 100000),
(13, 'SV0001', '55678475829', 150000),
(14, 'SV0001', '55678475829', 500000),
(15, 'SV0001', '55678475029', 1000000),
(16, 'SV0001', '55678475333', 1250000),
(17, 'SV0003', '77908473632', 600000),
(18, 'SV0003', '77908444632', 300000),
(19, 'SV0005', '77908441132', 350000),
(20, 'SV0005', '77908221132', 100000),
(21, 'SV0005', '77908487632', 50000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_issuer`
--
ALTER TABLE `tb_issuer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_terminalatm`
--
ALTER TABLE `tb_terminalatm`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_transaksiatm`
--
ALTER TABLE `tb_transaksiatm`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_issuer`
--
ALTER TABLE `tb_issuer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_terminalatm`
--
ALTER TABLE `tb_terminalatm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_transaksiatm`
--
ALTER TABLE `tb_transaksiatm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
