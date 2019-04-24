-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2019 at 12:08 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `sensors`
--

CREATE TABLE `sensors` (
  `Number` int(11) NOT NULL,
  `Id` int(11) DEFAULT NULL,
  `Value` int(11) DEFAULT NULL,
  `cdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sensors`
--

INSERT INTO `sensors` (`Number`, `Id`, `Value`, `cdate`) VALUES
(1, 1, 10, '2019-04-02'),
(2, 1, 12, '2019-04-03'),
(3, 1, 5, '2019-04-04'),
(4, 2, 6, '2019-04-12'),
(5, 2, 7, '2019-04-13'),
(6, 2, 4, '2019-04-14'),
(7, 2, 1, '2019-04-15'),
(8, 3, 1, '2019-04-16'),
(9, 3, 6, '2019-04-12'),
(10, 3, 7, '2019-04-13'),
(11, 11, 6, '2019-04-14'),
(12, 2, 40, '2019-04-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`Number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sensors`
--
ALTER TABLE `sensors`
  MODIFY `Number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
