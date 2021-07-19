-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2021 at 07:34 AM
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
-- Table structure for table `sale_items_list`
--

CREATE TABLE `sale_items_list` (
  `sale_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sale_items_list`
--

INSERT INTO `sale_items_list` (`sale_id`, `product_id`, `quantity`) VALUES
(5500001, 31, 6),
(5500002, 5, 5),
(5500002, 13, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sale_items_list`
--
ALTER TABLE `sale_items_list`
  ADD KEY `sale_id` (`sale_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sale_items_list`
--
ALTER TABLE `sale_items_list`
  ADD CONSTRAINT `Connect product4` FOREIGN KEY (`product_id`) REFERENCES `wine_list` (`product_id`),
  ADD CONSTRAINT `Connect sale` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`sale_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
