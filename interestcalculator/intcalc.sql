-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2022 at 12:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intcalc`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_master`
--

CREATE TABLE `customer_master` (
  `customer_id` int(100) NOT NULL,
  `customer_name` varchar(75) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile` int(100) NOT NULL,
  `rate_of_interest` varchar(70) NOT NULL,
  `interest_on` varchar(20) NOT NULL,
  `remark` longtext NOT NULL,
  `ent_user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_master`
--

INSERT INTO `customer_master` (`customer_id`, `customer_name`, `city`, `mobile`, `rate_of_interest`, `interest_on`, `remark`, `ent_user_id`) VALUES
(1, 'DEMO', 'DEMO CITY', 1234567890, '8.2', 'M', 'XYZXYZYXZ', 0),
(2, 'DEMO_1', 'DEMO1 CITY', 1234567890, '2.8', 'Y', 'XYZXYZYXZ', 0),
(4, 'DEMO_2', 'DEMO2 CITY', 987654321, '8.8', 'M', 'CBOASICBASC', 0),
(5, 'DEMO_3', 'DEMO3 CITY', 1234567766, '10', 'Y', 'XYZYX', 0),
(6, 'DEMO_4 ', 'DEMO4 CITY', 2147483647, '9', 'M', 'NCOQWNCOQW', 1),
(15, 'TEST', 'TEST CITY', 1234567898, '10', 'M', 'none', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trans_details`
--

CREATE TABLE `trans_details` (
  `trans_id` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `trans_type` varchar(20) NOT NULL,
  `trans_date` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `description` longtext NOT NULL,
  `ent_user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_details`
--

INSERT INTO `trans_details` (`trans_id`, `customer_id`, `trans_type`, `trans_date`, `amount`, `description`, `ent_user_id`) VALUES
(12, 1, 'PAID', '2022-09-14', 100000, 'XYZYXZYX', 1),
(13, 2, 'PAID', '2022-09-15', 100000, 'XYZXYXZ', 1),
(15, 1, 'RECD', '2022-09-15', 20000, 'XYZYXZYXYZ', 1),
(16, 2, 'RECD', '2022-09-15', 5000, 'XYZXYXZYXZYXYZ', 1),
(17, 4, 'PAID', '2022-09-16', 23000, 'XZYXZYXYZXYZ', 1),
(18, 4, 'PAID', '2022-09-16', 120000, 'XYZXYZYX', 1),
(19, 5, 'PAID', '2022-09-17', 220000, 'XZYXZYXYZXYZXYZYXZ', 1),
(20, 6, 'PAID', '2022-09-17', 88000, 'XYZXYZYXZX', 1),
(21, 5, 'RECD', '2022-09-20', 50000, 'XYZXYZYXYZX', 1),
(22, 5, 'PAID', '2022-09-17', 150000, 'XYZYXZXYZ', 1),
(26, 6, 'RECD', '2022-09-21', 80000, 'XYZXZYXYZXYZX', 1),
(27, 15, 'PAID', '2022-09-07', 100000, 'Borrow the Money', 1),
(28, 15, 'RECD', '2022-09-08', 20000, 'Give back the Money.', 1),
(29, 15, 'PAID', '2022-09-10', 30000, 'Borrow the Money.', 1),
(30, 15, 'RECD', '2022-09-09', 50000, 'Return some Money.', 1),
(31, 15, 'PAID', '2022-09-11', 40000, 'Borrow the Money.', 1),
(35, 15, 'PAID', '2022-09-22', 20000, 'Borrow The Money.', 1),
(39, 15, 'RECD', '2022-09-12', 35000, 'tteesstt', 1),
(40, 0, 'PAID', '2022-10-01', 150000, '', 1),
(41, 0, 'PAID', '2022-10-01', 150000, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `user_id` int(100) NOT NULL,
  `username` varchar(75) NOT NULL,
  `password` varchar(75) NOT NULL,
  `user_level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `username`, `password`, `user_level`) VALUES
(1, 'jigar', 'jigar', 'A'),
(3, 'mohinbhai', 'mohin', 'A'),
(5, 'Bhargav Bhai', 'bhargavbhai', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_master`
--
ALTER TABLE `customer_master`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `trans_details`
--
ALTER TABLE `trans_details`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_master`
--
ALTER TABLE `customer_master`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `trans_details`
--
ALTER TABLE `trans_details`
  MODIFY `trans_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
