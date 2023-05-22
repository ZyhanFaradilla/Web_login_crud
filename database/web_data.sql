-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2023 at 01:09 PM
-- Server version: 8.0.30
-- PHP Version: 8.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`user`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data`
--

CREATE TABLE `tb_data` (
  `id_data` int NOT NULL,
  `no_transaksi` varchar(16) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_data`
--

INSERT INTO `tb_data` (`id_data`, `no_transaksi`, `tanggal`, `item`) VALUES
(1, 'T0001', '2019-05-20', 'apel'),
(2, 'T0001', '2019-05-21', 'bir'),
(3, 'T0001', '2019-05-22', 'nasi'),
(4, 'T0001', '2019-05-23', 'ayam'),
(5, 'T0002', '2019-05-24', 'apel'),
(6, 'T0002', '2019-05-25', 'bir'),
(7, 'T0002', '2019-05-26', 'nasi'),
(8, 'T0003', '2019-05-27', 'apel'),
(9, 'T0003', '2019-05-28', 'bir'),
(10, 'T0004', '2019-05-29', 'apel'),
(11, 'T0004', '2019-05-30', 'pir'),
(12, 'T0005', '2019-05-31', 'bir'),
(13, 'T0005', '2019-06-01', 'nasi'),
(14, 'T0005', '2019-06-02', 'ayam'),
(15, 'T0005', '2019-06-03', 'susu'),
(16, 'T0006', '2019-06-04', 'bir'),
(17, 'T0006', '2019-06-05', 'nasi'),
(18, 'T0006', '2019-06-06', 'susu'),
(19, 'T0007', '2019-06-07', 'bir'),
(20, 'T0007', '2019-06-08', 'susu'),
(21, 'T0008', '2019-06-09', 'pir'),
(22, 'T0008', '2019-06-10', 'susu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `tb_data`
--
ALTER TABLE `tb_data`
  ADD PRIMARY KEY (`id_data`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_data`
--
ALTER TABLE `tb_data`
  MODIFY `id_data` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
