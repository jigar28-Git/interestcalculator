-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2022 at 01:39 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `clcon_id` int(50) NOT NULL,
  `clint_id` int(50) NOT NULL,
  `contact_person` varchar(75) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(75) NOT NULL,
  `designation` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clint_contactdetail`
--

INSERT INTO `clint_contactdetail` (`clcon_id`, `clint_id`, `contact_person`, `mobile`, `email`, `designation`) VALUES
(4, 5, 'client_22', '345353245623', 'client@gmail.com', 'ABCD'),
(5, 6, 'client_33', '9465465842', 'client@gmail.comS', 'ABCDE'),
(6, 7, 'client_44', '456789321', 'cl4@gmail.com', 'ADFBCD'),
(7, 8, 'client_55', '9876543211', 'cl5@gmail.com]', 'FPDISJF'),
(8, 9, 'client_66', '14599872634', 'cl6#gmail.com', 'SHAQOFD'),
(10, 13, 'client_11', '9465465841', 'client@gmail.com', 'ABC'),
(13, 16, 'client_88', '9465465841', 'client@gmail.com', 'ABC'),
(14, 15, 'client_77', '9465465841s', 'cl7@gmail.com', 'ABCDEGEDTG');

-- --------------------------------------------------------

--
-- Table structure for table `clint_master`
--

CREATE TABLE `clint_master` (
  `clint_id` int(100) NOT NULL,
  `clint_name` varchar(55) NOT NULL,
  `address` longtext NOT NULL,
  `city` varchar(20) NOT NULL,
  `pin` int(20) NOT NULL,
  `state_id` int(100) NOT NULL,
  `website` varchar(255) NOT NULL,
  `gst_no` varchar(55) NOT NULL,
  `remarks` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clint_master`
--

INSERT INTO `clint_master` (`clint_id`, `clint_name`, `address`, `city`, `pin`, `state_id`, `website`, `gst_no`, `remarks`) VALUES
(5, 'client02', 'mhd\r\ndfh\r\nf\r\ndh\r\ndfh', 'gfhfgh', 465566, 16, 'WWW.XYZ.COM', '24CCLPC1437J1Zvcb', 'gdofisughsd'),
(6, 'client03', 'ngfn\r\nnfg\r\nxfgn\r\nfg\r\nnfg\r\n132', 'gnfgvn', 465566, 4, 'WWW.XYZ.COM', '24CCLPC1437J1Zvcb', 'gdofisugh'),
(7, 'client04', 'bfd\r\nbfdbfd\r\nbfd\r\nbfdb\r\n465879\r\n\r\n', 'xyzz', 465566, 18, 'WWW.XYZ.COM', '24CCLPC1437J1Zvcb', 'rggffdsgsdfsdf'),
(8, 'client05', 'iurenhrw]ge\r\ngrwuign\r\nwrginwrg\r\nrwgnwrgprwher\r\nhrehets\r\nher\r\n978779876', 'gfhfgh', 6366, 36, 'fdgfdgfdgwaerh', 'dfgrehyeherh`', 'gwae4gweagewa'),
(9, 'client06', 'prewigj\r\ngreigji\r\ngpiejp\r\niperg\r\n987654\r\n', 'xyzz', 465566, 15, 'WWW.XYZ.COM', '24CCLPC1437J1Z5', 'DUIFGDOFIDS'),
(13, 'client01', 'piyysdo\r\nbfdnRJKO\r\nN0REIHJRW\r\nJGI0987789', 'xyzz', 789654, 12, 'WWW.XYZ.COM', '24CCLPC1437J1Z', 'gwae4gweagewa'),
(15, 'client07', 'ektyo\r\nrtsior\r\n6oat\r\nors\r\ntitruh\r\njh\r\n789654', 'xyzz', 465566, 30, 'WWW.XYZ.COM', '24CCLPC1437J1Z5', 'DUIFGDOFIDS'),
(16, 'client08', 'kltgkytk\r\nyj\r\ndyj\r\nyrjxdr\r\ntjyj\r\nrtj', 'XYZ', 465566, 35, 'WWW.XYZ.COM', '24CCLPC1437J1Z5', 'DUIFGDOFIDS'),
(17, 'client09', 'utkuyk\r\nyj\r\nyhfjyg\r\njftgjfgyj', 'AGBEPROI', 465566, 24, 'WWW.XYZ.COM', '24CCLPC1437J1Z5', 'DUIFGDOFIDS');

-- --------------------------------------------------------

--
-- Table structure for table `clint_productdetails`
--

CREATE TABLE `clint_productdetails` (
  `client_prod_id` int(100) NOT NULL,
  `clint_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `install_date` varchar(50) NOT NULL,
  `is_lifetime_free` varchar(100) NOT NULL,
  `service_valid_upto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clint_productdetails`
--

INSERT INTO `clint_productdetails` (`client_prod_id`, `clint_id`, `product_id`, `install_date`, `is_lifetime_free`, `service_valid_upto`) VALUES
(1, 9, 24, '07/31/2022', 'NO', '07/31/2022');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_master`
--

CREATE TABLE `complaint_master` (
  `complaint_id` int(100) NOT NULL,
  `complaint_no` int(255) NOT NULL,
  `complaint_date` varchar(100) NOT NULL,
  `complaint_time` varchar(100) NOT NULL,
  `clint_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `booked_by_staff_id` int(100) NOT NULL,
  `prob_id` int(100) NOT NULL,
  `prob_deseription` longtext NOT NULL,
  `priority` varchar(100) NOT NULL,
  `complaint_status` varchar(100) NOT NULL,
  `assign_to_staff_id` int(100) NOT NULL,
  `pending_remark` longtext NOT NULL,
  `completion_date` varchar(100) NOT NULL,
  `completion_time` varchar(100) NOT NULL,
  `completed_by_staff_id` int(100) NOT NULL,
  `completion_remark` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint_master`
--

INSERT INTO `complaint_master` (`complaint_id`, `complaint_no`, `complaint_date`, `complaint_time`, `clint_id`, `product_id`, `booked_by_staff_id`, `prob_id`, `prob_deseription`, `priority`, `complaint_status`, `assign_to_staff_id`, `pending_remark`, `completion_date`, `completion_time`, `completed_by_staff_id`, `completion_remark`) VALUES
(39, 25041, '2022-08-02', '23:42', 8, 25, 8, 12, 'VDASVSDFBSFBFSDBZFDSB', 'High Priority', 'Complete', 7, 'BSDBDBSDbSDB', '08/27/2022', '23:42', 7, 'BSDBSDBNSDBDNRWNJMTEJERH'),
(40, 31425, '2022-08-02', '23:42', 13, 23, 5, 11, 'ATENNATNERNERWN', 'High Priority', 'Complete', 5, 'NAERNRENAREN', '08/20/2022', '23:43', 5, 'NARENRENRWNRWEN'),
(41, 21057, '2022-08-02', '23:42', 8, 23, 4, 12, 'ATENNATNERNERWNCGH,GH,CHG,GHC,', 'High Priority', 'Complete', 3, 'NAERNRENAREN,HG,CGH,GH,', '08/20/2022', '23:43', 3, 'NARENRENRWNRWENGC,HGCH,'),
(42, 6099, '2022-08-02', '23:42', 8, 24, 3, 13, 'ATENNATNERNERWNCGH,GH,CHG,GHC,', '-- Select Priority--', 'null', 7, 'NAERNRENAREN,HG,CGH,GH,', '08/19/2022', '03:48', 0, 'NARENRENRWNRWENGC,HGCH,,HG,GHC,HG'),
(43, 2471, '2022-08-02', '23:42', 8, 24, 3, 13, 'ATENNATNERNERWNCGH,GH,CHG,GHC,', '-- Select Priority--', 'null', 7, 'NAERNRENAREN,HG,CGH,GH,', '08/19/2022', '03:48', 0, 'NARENRENRWNRWENGC,HGCH,,HG,GHC,HG');

-- --------------------------------------------------------

--
-- Table structure for table `problem_master`
--

CREATE TABLE `problem_master` (
  `prob_id` int(100) NOT NULL,
  `prob_name` varchar(75) NOT NULL,
  `product_id` int(100) NOT NULL,
  `solutions` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `problem_master`
--

INSERT INTO `problem_master` (`prob_id`, `prob_name`, `product_id`, `solutions`) VALUES
(9, 'not working properly', 24, 'Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, '),
(10, 'problem', 22, 'um generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the '),
(11, 'Page Loading ', 23, 'There are many variations of passages of Lorem Ipsum available, but the  to use a passags on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated'),
(12, 'not working properly', 22, 'this is just for the demo purpoe and they have not idea what i am doing here but we just keeping all but some time we have found thed not just this but we have also doing other work this is just for the demo purpoe and they have not idea what i am doing here but we just keeping all but some time we have found thed not just this but we have also doing other work this is just for the demo purpoe and they have not idea what i am doing here but we just keeping all but some time we have found thed not just this but we have also doing other work this is just for the demo purpoe and they have not idea what i am doing here but we just keeping all but some time we have found thed not just this but we have also doing other work this is just for the demo purpoe and they have not idea what i am doing here but we just keeping all but some time we have found thed not just this but we have also doing other work '),
(13, 'Not Redirect Proper', 25, 'cgfosuaghfoisahyfpiosadhfihgpsghpfsdg\r\nsagadf\r\nghafpdsigha\r\nsgfdhpgiaH\r\nPdfg'),
(15, '', 0, ''),
(16, '', 0, ''),
(17, '', 0, ''),
(18, '', 0, ''),
(19, '', 0, ''),
(20, '', 0, ''),
(21, '', 0, ''),
(22, '', 0, ''),
(23, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_cat_id` int(100) NOT NULL,
  `p_category` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_cat_id`, `p_category`) VALUES
(21, 'DesktopApp'),
(22, 'WebApp'),
(23, 'MobileApp');

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
(22, 'software', 21),
(23, 'Game', 23),
(24, 'Online Exam', 22),
(25, 'Advoffice Web', 22);

-- --------------------------------------------------------

--
-- Table structure for table `random_id`
--

CREATE TABLE `random_id` (
  `id` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `random_id`
--

INSERT INTO `random_id` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15);

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
(1, 'Staff_05', 2147483647, 'st5@gmail.com'),
(2, 'Staff_01', 123465684, 'st1@gmail.com'),
(3, 'Staff_02', 1324234153, 'st2@gmail.com'),
(4, 'Staff_03', 2147483647, 'st3@gmail.com'),
(5, 'Staff_04', 2147483647, 'st4@gmail.com'),
(7, 'Staff_06', 2147483647, 'st6@gmail.com'),
(8, 'Staff_07', 2147483647, 'st7@gmail.com');

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
  `username` varchar(50) NOT NULL,
  `user_level` varchar(55) NOT NULL,
  `user_table_id` int(55) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` varchar(75) DEFAULT NULL,
  `user_img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `disp_name`, `username`, `user_level`, `user_table_id`, `password`, `status`, `user_img`) VALUES
(10, 'jig@r', 'jigar', 'admin', 2, 'jigar', 'Is_System', ''),
(34, 'CliEnT', 'client', 'client', 0, 'client', 'Is_System', NULL),
(35, 'StaFF', 'staff', 'staff', 5, 'staff', 'Is_Suspend', NULL),
(36, 'OpErAtOR', 'operator', 'operator', 0, 'operator', 'Is_System', NULL),
(41, 'Admin', 'admin', 'admin', 0, 'admin', 'Is_System', NULL),
(42, 'client', 'client1', 'client', 0, 'client', 'Is_System', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clint_contactdetail`
--
ALTER TABLE `clint_contactdetail`
  ADD PRIMARY KEY (`clcon_id`),
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
  ADD PRIMARY KEY (`client_prod_id`),
  ADD KEY `clint_id` (`clint_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `complaint_master`
--
ALTER TABLE `complaint_master`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `problem_master`
--
ALTER TABLE `problem_master`
  ADD PRIMARY KEY (`prob_id`),
  ADD KEY `product_cat_id` (`product_id`);

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
-- Indexes for table `random_id`
--
ALTER TABLE `random_id`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clint_contactdetail`
--
ALTER TABLE `clint_contactdetail`
  MODIFY `clcon_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `clint_master`
--
ALTER TABLE `clint_master`
  MODIFY `clint_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `clint_productdetails`
--
ALTER TABLE `clint_productdetails`
  MODIFY `client_prod_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaint_master`
--
ALTER TABLE `complaint_master`
  MODIFY `complaint_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `problem_master`
--
ALTER TABLE `problem_master`
  MODIFY `prob_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `random_id`
--
ALTER TABLE `random_id`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `staff_master`
--
ALTER TABLE `staff_master`
  MODIFY `satff_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `state_master`
--
ALTER TABLE `state_master`
  MODIFY `state_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clint_master`
--
ALTER TABLE `clint_master`
  ADD CONSTRAINT `clint_master_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state_master` (`state_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
