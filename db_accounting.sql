-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2016 at 04:03 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_accounting`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `date_added` datetime NOT NULL,
  `item_id` int(10) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `supplier_name` varchar(20) NOT NULL,
  `price` int(6) NOT NULL,
  `stock` int(10) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`date_added`, `item_id`, `item_name`, `supplier_name`, `price`, `stock`, `total`) VALUES
('2016-11-24 23:17:18', 36, 'Pencil', 'National', 5, 140, 0),
('2016-11-25 10:51:00', 37, 'Marker', 'Asd', 35, 70, 0);

-- --------------------------------------------------------

--
-- Table structure for table `log_item`
--

CREATE TABLE `log_item` (
  `date_added` datetime(6) NOT NULL,
  `log_id` int(10) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `stock` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_item`
--

INSERT INTO `log_item` (`date_added`, `log_id`, `item_name`, `supplier_name`, `price`, `stock`, `total`) VALUES
('2016-11-24 15:05:49.000000', 1, 'Pencil', 'National', 5, 10, 10),
('2016-11-24 15:06:08.000000', 2, 'Pencil', 'National', 5, 10, 20),
('2016-11-24 23:17:18.000000', 3, 'Pencil', 'National', 5, 10, 140),
('2016-11-24 23:21:03.000000', 4, 'Marker', 'Asd', 10, 20, 20),
('2016-11-25 10:51:00.000000', 5, 'Marker', 'Asd', 10, 50, 70);

-- --------------------------------------------------------

--
-- Table structure for table `log_sales`
--

CREATE TABLE `log_sales` (
  `date_added` datetime(6) NOT NULL,
  `item_id` int(10) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `stock` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `branch` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `date_added` date NOT NULL,
  `sales_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_name` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `branch` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`date_added`, `sales_id`, `item_id`, `item_name`, `qty`, `price`, `total`, `branch`) VALUES
('2016-11-24', 7, NULL, 'Pencil', 2, 5, '10.00', 'Branch1'),
('2016-11-24', 8, NULL, 'Pencil', 17, 5, '85.00', ''),
('2016-11-24', 9, NULL, 'Pencil', 1, 5, '5.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `status`) VALUES
(1, 'Jeremy', 'test', 'test', 'null');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `log_item`
--
ALTER TABLE `log_item`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `log_sales`
--
ALTER TABLE `log_sales`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `log_item`
--
ALTER TABLE `log_item`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
