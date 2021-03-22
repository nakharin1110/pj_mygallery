-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 09:57 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallerydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_file`
--

CREATE TABLE `tb_file` (
  `id` int(10) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `userID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_file`
--

INSERT INTO `tb_file` (`id`, `detail`, `image`, `userID`) VALUES
(17, 'TEST1', 'TEST14.jpg', 4),
(18, 'TEST2', 'TEST24.jpg', 4),
(19, 'TEST3', 'TEST34.jpg', 4),
(20, 'TEST4', 'TEST44.jpg', 4),
(21, 'TEST5', 'TEST54.jpg', 4),
(22, 'TEST6', 'TEST64.jpg', 4),
(23, 'TEST1', 'TEST13.jpg', 3),
(24, 'TEST', 'TEST3.jpg', 3),
(25, 'TEST1', 'TEST11.jpg', 1),
(26, 'TEST2', 'TEST21.jpg', 1),
(27, 'TEST3', 'TEST31.jpg', 1),
(28, 'TEST4', 'TEST41.jpg', 1),
(29, 'TEST5', 'TEST51.jpg', 1),
(30, 'TEST6', 'TEST61.jpg', 1),
(32, 'TEST3', 'TEST33.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE `user_tb` (
  `id` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`id`, `email`, `username`, `password`) VALUES
(1, 'thiw@gmail.com', 'thiwtest', '123456'),
(3, 'thin@gmail.com', 'thintest', '123456'),
(4, 'por@gmail.com', 'portest', '123456'),
(6, 'aun@gmail.com', 'auntest', '123456'),
(8, 'ween1@gmail.com', 'weentest', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_file`
--
ALTER TABLE `tb_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_file`
--
ALTER TABLE `tb_file`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
