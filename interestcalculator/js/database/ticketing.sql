-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 01:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketing1`
--

-- --------------------------------------------------------

--
-- Table structure for table `clint_contactdetail`
--

CREATE TABLE `clint_contactdetail` (
  `elcon_id` int(50) NOT NULL,
  `clint_id` int(50) NOT NULL,
  `contact_person` int(55) NOT NULL,
  `mobile` int(20) NOT NULL,
  `email` int(75) NOT NULL,
  `designation` int(150) NOT NULL,
  `is_default` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clint_master`
--

CREATE TABLE `clint_master` (
  `clint_id` int(100) NOT NULL,
  `clint_name` varchar(55) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pin` int(20) NOT NULL,
  `state_id` int(100) NOT NULL,
  `website` varchar(255) NOT NULL,
  `gst_no` int(55) NOT NULL,
  `remarks` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clint_master`
--

INSERT INTO `clint_master` (`clint_id`, `clint_name`, `address`, `city`, `pin`, `state_id`, `website`, `gst_no`, `remarks`) VALUES
(94, 'bvcbcvb', 'It is a long established fact that a reader will be distracted by the readable content of a page whe', 'Rajkot', 3600001, 19, 'www.xyz.com', 2147483647, '---none---');

-- --------------------------------------------------------

--
-- Table structure for table `clint_productdetails`
--

CREATE TABLE `clint_productdetails` (
  `cl_prodid` int(100) NOT NULL,
  `clint_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `install_date` varchar(50) NOT NULL,
  `is_lifetime_free` varchar(100) NOT NULL,
  `service_valid_upto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complaint_master`
--

CREATE TABLE `complaint_master` (
  `complaint_id` int(100) NOT NULL,
  `complaint_no` int(50) NOT NULL,
  `complaint_date` varchar(50) NOT NULL,
  `complaint_time` varchar(60) NOT NULL,
  `clint_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `booked_by_staff_id` int(100) NOT NULL,
  `prob_id` int(75) NOT NULL,
  `complaint_status` varchar(75) NOT NULL,
  `assignedto_staff_id` int(100) NOT NULL,
  `pending_remarks` varchar(75) NOT NULL,
  `completion_date` varchar(75) NOT NULL,
  `completion_time` varchar(75) NOT NULL,
  `completed_by_staff_id` int(100) NOT NULL,
  `attechment` varchar(75) NOT NULL,
  `completion_remark` varchar(50) NOT NULL,
  `prob_description` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `problem_master`
--

CREATE TABLE `problem_master` (
  `prob_id` int(100) NOT NULL,
  `prob_name` varchar(75) NOT NULL,
  `product_cat_id` int(100) NOT NULL,
  `solutions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `problem_master`
--

INSERT INTO `problem_master` (`prob_id`, `prob_name`, `product_cat_id`, `solutions`) VALUES
(14, 'not reposding', 20, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_cat_id` int(100) NOT NULL,
  `product_category` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_cat_id`, `product_category`) VALUES
(18, 'WebApp'),
(19, 'MobileApp'),
(20, 'DesktopApp');

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE `product_master` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_cat_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`product_id`, `product_name`, `product_cat_id`) VALUES
(14, 'sdfgsdfzsd', 18),
(15, 'userweb', 18),
(16, 'Game', 19),
(18, 'not reposding', 19),
(19, 'software', 20),
(20, 'product management', 19);

-- --------------------------------------------------------

--
-- Table structure for table `staff_master`
--

CREATE TABLE `staff_master` (
  `satff_id` int(100) NOT NULL,
  `staff_name` varchar(55) NOT NULL,
  `mobile` int(20) NOT NULL,
  `email` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_master`
--

INSERT INTO `staff_master` (`satff_id`, `staff_name`, `mobile`, `email`) VALUES
(3, 'guest2', 1234567890, 'guest2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE `state_master` (
  `state_id` int(100) NOT NULL,
  `state_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`state_id`, `state_name`) VALUES
(1, 'ANDAMAN AND NICOBAR ISLANDS'),
(2, 'ANDHRA PRADESH'),
(3, 'ARUNACHAL PRADESH'),
(4, 'ASSAM'),
(5, 'BIHAR'),
(6, 'CHATTISGARH'),
(7, 'CHANDIGARH'),
(8, 'DAMAN AND DIU'),
(9, 'DELHI'),
(10, 'DADRA AND NAGAR HAVELI'),
(11, 'GOA'),
(12, 'GUJARAT'),
(13, 'HIMACHAL PRADESH'),
(14, 'HARYANA'),
(15, 'JAMMU AND KASHMIR'),
(16, 'JHARKHAND'),
(17, 'KERALA'),
(18, 'KARNATAKA'),
(19, 'LAKSHADWEEP'),
(20, 'MEGHALAYA'),
(21, 'MAHARASHTRA'),
(22, 'MANIPUR'),
(23, 'MADHYA PRADESH'),
(24, 'MIZORAM'),
(25, 'NAGALAND'),
(26, 'ORISSA'),
(27, 'PUNJAB'),
(28, 'PONDICHERRY'),
(29, 'RAJASTHAN'),
(30, 'SIKKIM'),
(31, 'TAMIL NADU'),
(32, 'TRIPURA'),
(33, 'UTTARAKHAND'),
(34, 'UTTAR PRADESH'),
(35, 'WEST BENGAL'),
(36, 'TELANGANA');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `user_id` int(100) NOT NULL,
  `disp_name` varchar(55) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_level` varchar(55) NOT NULL,
  `user_table_id` int(55) NOT NULL,
  `is_suspend` varchar(50) NOT NULL,
  `is_system` varchar(50) NOT NULL,
  `user_imose` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clint_contactdetail`
--
ALTER TABLE `clint_contactdetail`
  ADD PRIMARY KEY (`elcon_id`),
  ADD KEY `clint_id` (`clint_id`);

--
-- Indexes for table `clint_master`
--
ALTER TABLE `clint_master`
  ADD PRIMARY KEY (`clint_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `clint_productdetails`
--
ALTER TABLE `clint_productdetails`
  ADD PRIMARY KEY (`cl_prodid`),
  ADD KEY `clint_id` (`clint_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `complaint_master`
--
ALTER TABLE `complaint_master`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `clint_id` (`clint_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `prob_id` (`prob_id`);

--
-- Indexes for table `problem_master`
--
ALTER TABLE `problem_master`
  ADD PRIMARY KEY (`prob_id`),
  ADD KEY `product_cat_id` (`product_cat_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_cat_id`);

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_cat_id` (`product_cat_id`);

--
-- Indexes for table `staff_master`
--
ALTER TABLE `staff_master`
  ADD PRIMARY KEY (`satff_id`);

--
-- Indexes for table `state_master`
--
ALTER TABLE `state_master`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clint_contactdetail`
--
ALTER TABLE `clint_contactdetail`
  MODIFY `elcon_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clint_master`
--
ALTER TABLE `clint_master`
  MODIFY `clint_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `clint_productdetails`
--
ALTER TABLE `clint_productdetails`
  MODIFY `cl_prodid` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaint_master`
--
ALTER TABLE `complaint_master`
  MODIFY `complaint_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `problem_master`
--
ALTER TABLE `problem_master`
  MODIFY `prob_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `staff_master`
--
ALTER TABLE `staff_master`
  MODIFY `satff_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `state_master`
--
ALTER TABLE `state_master`
  MODIFY `state_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clint_contactdetail`
--
ALTER TABLE `clint_contactdetail`
  ADD CONSTRAINT `clint_contactdetail_ibfk_1` FOREIGN KEY (`clint_id`) REFERENCES `clint_master` (`clint_id`);

--
-- Constraints for table `clint_master`
--
ALTER TABLE `clint_master`
  ADD CONSTRAINT `clint_master_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state_master` (`state_id`);

--
-- Constraints for table `clint_productdetails`
--
ALTER TABLE `clint_productdetails`
  ADD CONSTRAINT `clint_productdetails_ibfk_1` FOREIGN KEY (`clint_id`) REFERENCES `clint_master` (`clint_id`),
  ADD CONSTRAINT `clint_productdetails_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_master` (`product_id`);

--
-- Constraints for table `complaint_master`
--
ALTER TABLE `complaint_master`
  ADD CONSTRAINT `complaint_master_ibfk_1` FOREIGN KEY (`clint_id`) REFERENCES `clint_master` (`clint_id`),
  ADD CONSTRAINT `complaint_master_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_master` (`product_id`),
  ADD CONSTRAINT `complaint_master_ibfk_3` FOREIGN KEY (`prob_id`) REFERENCES `problem_master` (`prob_id`);

--
-- Constraints for table `problem_master`
--
ALTER TABLE `problem_master`
  ADD CONSTRAINT `problem_master_ibfk_1` FOREIGN KEY (`product_cat_id`) REFERENCES `product_category` (`product_cat_id`);

--
-- Constraints for table `product_master`
--
ALTER TABLE `product_master`
  ADD CONSTRAINT `product_master_ibfk_1` FOREIGN KEY (`product_cat_id`) REFERENCES `product_category` (`product_cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
