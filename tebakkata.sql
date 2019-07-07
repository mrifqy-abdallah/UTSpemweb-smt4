-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2019 at 06:37 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tebakkata`
--

-- --------------------------------------------------------

--
-- Table structure for table `tebakkata`
--

CREATE TABLE `tebakkata` (
  `username` varchar(30) NOT NULL,
  `id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `playtime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tebakkata`
--

INSERT INTO `tebakkata` (`username`, `id`, `score`, `playtime`) VALUES
('iniaku', 33, 10, 2019),
('iniaku', 34, 0, 2019),
('iniaku', 35, 10, 2019),
('iniaku', 36, 0, 2019),
('iniaku', 37, 9, 2019),
('iniaku', 38, 19, 2019),
('iniaku', 39, 10, 2019),
('iniaku', 40, 20, 2019),
('iniaku', 41, 30, 2019),
('iniaku', 42, 36, 2019),
('iniaku', 43, 45, 2019),
('iniaku', 44, 55, 2019),
('iniaku', 45, 65, 2019),
('ria', 46, 72, 2019),
('ria', 47, 82, 2019),
('ria', 48, 92, 2019),
('iniaku', 49, 102, 2019),
('iniaku', 50, 112, 2019),
('ria', 51, 119, 2019),
('iniaku', 52, 0, 2019),
('iniaku', 53, 1, 2019);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tebakkata`
--
ALTER TABLE `tebakkata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tebakkata`
--
ALTER TABLE `tebakkata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
