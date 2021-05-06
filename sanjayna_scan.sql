-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 05, 2021 at 12:38 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sanjayna_scan`
--

-- --------------------------------------------------------

--
-- Table structure for table `adhar`
--

CREATE TABLE `adhar` (
  `id` int(11) NOT NULL,
  `uid` bigint(21) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(21) NOT NULL,
  `yob` varchar(21) NOT NULL,
  `co` varchar(21) NOT NULL,
  `gname` varchar(255) NOT NULL,
  `loc` varchar(255) NOT NULL,
  `house` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `lm` varchar(255) NOT NULL,
  `vtc` varchar(255) NOT NULL,
  `po` varchar(255) NOT NULL,
  `dist` varchar(255) NOT NULL,
  `subdist` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pc` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 9836726028, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adhar`
--
ALTER TABLE `adhar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adhar`
--
ALTER TABLE `adhar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
