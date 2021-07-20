-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2021 at 03:58 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `outbound_items_list`
--

CREATE TABLE `outbound_items_list` (
  `outbound_id` int(20) NOT NULL,
  `sale_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `outbound_items_list`
--

INSERT INTO `outbound_items_list` (`outbound_id`, `sale_id`) VALUES
(6600001, 5500001),
(6600001, 5500002);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `outbound_items_list`
--
ALTER TABLE `outbound_items_list`
  ADD KEY `outbound_id` (`outbound_id`),
  ADD KEY `sale_id` (`sale_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `outbound_items_list`
--
ALTER TABLE `outbound_items_list`
  ADD CONSTRAINT `Connect outbound` FOREIGN KEY (`outbound_id`) REFERENCES `outbound` (`outbound_id`),
  ADD CONSTRAINT `Connet sale` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`sale_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
