-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2016 at 03:37 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onclick_db`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Proc_willdetails` (IN `USERID` INT, IN `STARTPOSITION` INT)  BEGIN
	
SET @POSITION =  STARTPOSITION;
SET @PAGESIZE = 5;
SET @USERID = USERID;


PREPARE GetProjects FROM
'SELECT * from user_register where user_id = ? order by user_id LIMIT ?,?';
EXECUTE GetProjects USING @USERID,@POSITION, @PAGESIZE;


PREPARE GetProp FROM
'SELECT * from immovable_propertys where user_id = ? order by user_id LIMIT ?,?';
EXECUTE GetProp USING @USERID,@POSITION, @PAGESIZE;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_messages`
--

CREATE TABLE `admin_messages` (
  `id` int(255) NOT NULL COMMENT 'id auto increment',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_messages`
--

INSERT INTO `admin_messages` (`id`, `email`, `password`, `contact`, `name`, `phone_number`, `address`, `date`, `modified_date`, `message`) VALUES
(2, 'vin@gmail.com', 'vin', '', 'VINAY', '9876543210', 'bangalore', '2016-03-22 11:25:41', '2016-03-22 11:25:41', ''),
(11, 'adel@gmail.com', 'adel', '', 'adel', '9876543211', 'Testing123', '2016-04-09 11:22:36', '2016-04-09 11:22:36', ''),
(13, 'azdbz@gh.co', 'aaaa', '', 'asv', '9876543211', 'adhzh', '2016-03-22 12:54:02', '2016-03-22 12:54:02', ''),
(14, 'ram@gmail.com', 'eww', '', 'tgsg', '3445677651', 'ewfgasdgzdg', '2016-04-07 06:37:12', '2016-04-07 06:37:12', ''),
(15, 'ram@gmail.com', 'aaa', '', 'qwr', '9876543211', 'trgf', '2016-04-07 06:37:39', '2016-04-07 06:37:39', ''),
(16, 'thiru@gmail.com', 'thiru', '', 'Thiru', '9999999999', 'Testing Address', '2016-04-09 10:36:39', '2016-04-09 10:36:39', ''),
(17, 'aaa@gmail.com', 'aaa', '', 'dasda', '9876543210', 'sfs', '2016-04-09 10:47:50', '2016-04-09 10:47:50', ''),
(18, 'a@gmail.com', 'aaa', '', 'dsad', '9876543210', 'dasda', '2016-04-09 11:19:56', '2016-04-09 11:19:56', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_ownership`
--

CREATE TABLE `admin_ownership` (
  `own_id` int(11) NOT NULL,
  `own_name` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_ownership`
--

INSERT INTO `admin_ownership` (`own_id`, `own_name`, `date`, `modified_date`) VALUES
(2, 'Thiru', '2016-04-12 07:24:41', '2016-04-12 07:24:41'),
(3, 'Ram', '2016-04-03 00:00:00', '2016-04-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_property`
--

CREATE TABLE `admin_property` (
  `prop_id` int(11) NOT NULL,
  `prop_name` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_property`
--

INSERT INTO `admin_property` (`prop_id`, `prop_name`, `date`, `modified_date`) VALUES
(3, 'Flat', '2016-04-12 06:34:43', '2016-04-12 06:34:43'),
(4, 'House', '2016-04-12 06:34:29', '2016-04-12 06:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `admin_registrations`
--

CREATE TABLE `admin_registrations` (
  `admin_id` int(11) NOT NULL COMMENT 'primary key',
  `email_address` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_registrations`
--

INSERT INTO `admin_registrations` (`admin_id`, `email_address`, `password`) VALUES
(1, 'admin@oneclick.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `admin_relations`
--

CREATE TABLE `admin_relations` (
  `rel_id` int(255) NOT NULL COMMENT 'id auto increment',
  `name` varchar(255) NOT NULL,
  `date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_relations`
--

INSERT INTO `admin_relations` (`rel_id`, `name`, `date`, `modified_date`) VALUES
(1, 'Father', '2016-04-06 00:00:00', '2016-04-20 00:00:00'),
(2, 'Mother', '2016-04-03 00:00:00', '2016-04-20 00:00:00'),
(3, 'Son', '2016-04-13 00:00:00', '2016-04-13 00:00:00'),
(4, 'Daughter', '2016-04-20 00:00:00', '2016-04-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `familys`
--

CREATE TABLE `familys` (
  `member_id` int(11) NOT NULL COMMENT 'primary key',
  `user_id` int(11) NOT NULL COMMENT 'Foriegn key of users table',
  `member_name` varchar(255) NOT NULL,
  `relation_id` varchar(11) NOT NULL COMMENT 'foriegn key of relations table',
  `martial_status` varchar(255) NOT NULL,
  `age` varchar(100) NOT NULL,
  `family_rel_id` int(11) NOT NULL COMMENT 'foriegn key',
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `familys`
--

INSERT INTO `familys` (`member_id`, `user_id`, `member_name`, `relation_id`, `martial_status`, `age`, `family_rel_id`, `created_date`, `modified_date`) VALUES
(1, 3, 'ewqeq', '3', 'eqwe', 'eqwe', 2323, '2016-03-29 13:57:04', '2016-03-29 13:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `grant_immovable`
--

CREATE TABLE `grant_immovable` (
  `grant_im_id` int(11) NOT NULL COMMENT 'user_id auto increment',
  `property_id` int(11) NOT NULL,
  `fam_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `percent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `grant_immovable`
--

INSERT INTO `grant_immovable` (`grant_im_id`, `property_id`, `fam_id`, `user_id`, `percent`) VALUES
(7, 1, 1, 3, '11'),
(8, 1, 2, 3, '33'),
(9, 1, 2, 3, '33'),
(10, 8, 14, 3, '1'),
(11, 11, 13, 3, '222');

-- --------------------------------------------------------

--
-- Table structure for table `immovable_propertys`
--

CREATE TABLE `immovable_propertys` (
  `Immovable_id` int(11) NOT NULL COMMENT 'primary key',
  `will_id` int(11) NOT NULL COMMENT 'foriegn key of users table',
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `municipal_number` varchar(255) DEFAULT NULL,
  `year_of_purchase` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `nature_of_ownership` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `immovable_propertys`
--

INSERT INTO `immovable_propertys` (`Immovable_id`, `will_id`, `name`, `address`, `municipal_number`, `year_of_purchase`, `area`, `nature_of_ownership`, `created_date`, `modified_date`) VALUES
(18, 3, '3', 'bangalore', '2222', '2013', 'rajajinagar', '2', '2016-04-12 00:00:00', '2016-04-20 00:00:00'),
(21, 7, '3', 'eqwtq', '123', '1234', 'dwagwd', '2', '2016-04-13 12:24:16', '2016-04-13 12:24:16'),
(22, 7, '4', 'aaaaaaa', '111', '111', 'aaaaaaaaa', '3', '2016-04-13 12:38:00', '2016-04-13 12:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `movable_propertys`
--

CREATE TABLE `movable_propertys` (
  `movable_id` int(11) NOT NULL COMMENT 'primary key',
  `will_id` int(11) NOT NULL COMMENT 'Foriegn key of users table',
  `name` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movable_propertys`
--

INSERT INTO `movable_propertys` (`movable_id`, `will_id`, `name`, `comments`, `created_date`, `modified_date`) VALUES
(3, 7, 'praveen', 'comments', '2016-04-01 00:00:00', '2016-04-02 00:00:00'),
(4, 7, 'thiru', 'comments', '2016-04-01 00:00:00', '2016-04-02 00:00:00'),
(5, 3, 'Ram', 'Ram comments', '2016-04-05 00:00:00', '2016-04-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `not_allocated_details`
--

CREATE TABLE `not_allocated_details` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `member_id` int(11) NOT NULL COMMENT 'foreign key of family table',
  `will_id` int(11) NOT NULL COMMENT 'foriegn key of user_register table',
  `reason` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `not_allocated_details`
--

INSERT INTO `not_allocated_details` (`id`, `member_id`, `will_id`, `reason`, `created_date`, `modified_date`) VALUES
(6, 6, 7, 'reason ', '2016-04-19 00:00:00', '2016-04-18 00:00:00'),
(7, 7, 3, 'reason123 ', '2016-04-19 00:00:00', '2016-04-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor`
--

CREATE TABLE `tbl_doctor` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `name` varchar(255) NOT NULL,
  `will_id` int(11) NOT NULL COMMENT 'primary key',
  `address` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_doctor`
--

INSERT INTO `tbl_doctor` (`id`, `name`, `will_id`, `address`) VALUES
(4, 'Abhi123', 7, 'Vijayanagar12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_family`
--

CREATE TABLE `tbl_family` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `dob` datetime NOT NULL,
  `will_id` int(11) DEFAULT NULL,
  `marital_status` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_family`
--

INSERT INTO `tbl_family` (`id`, `name`, `relationship`, `dob`, `will_id`, `marital_status`, `status`) VALUES
(6, 'Raj12', 'Daughter', '2016-04-19 00:00:00', 7, 'Married', 'Dead');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lawyer`
--

CREATE TABLE `tbl_lawyer` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `name` varchar(255) NOT NULL,
  `will_id` int(11) NOT NULL COMMENT 'primary key',
  `address` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lawyer`
--

INSERT INTO `tbl_lawyer` (`id`, `name`, `will_id`, `address`) VALUES
(4, 'Abhi12345', 7, 'Vijayanagar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_will`
--

CREATE TABLE `tbl_will` (
  `will_id` int(11) NOT NULL,
  `will_name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_will`
--

INSERT INTO `tbl_will` (`will_id`, `will_name`, `user_id`, `status`, `created_date`, `modified_date`) VALUES
(3, 'aaa', 2, 0, '2016-04-13 00:00:00', '2016-04-21 00:00:00'),
(7, 'Default Will', 28, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_witness`
--

CREATE TABLE `tbl_witness` (
  `witness_id` int(11) NOT NULL COMMENT 'primary key',
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `will_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_witness`
--

INSERT INTO `tbl_witness` (`witness_id`, `name`, `address`, `will_id`, `created_date`, `modified_date`) VALUES
(1, 'Praveen A', 'bangalore', NULL, '2016-03-31 11:23:16', '2016-03-31 11:23:16'),
(2, 'Pradeep', 'Anantpur andra', NULL, '2016-03-31 11:25:47', '2016-03-31 11:25:47'),
(3, 'Abhi123', 'Vijayanagar12', 7, '2016-04-12 18:19:23', '2016-04-12 18:19:23'),
(4, 'aaaaa', 'aaaa', 7, '2016-04-13 13:26:44', '2016-04-13 13:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

CREATE TABLE `user_register` (
  `user_id` int(11) NOT NULL COMMENT 'primary key',
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('M','F','O') NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `mobile` bigint(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`user_id`, `fname`, `mname`, `surname`, `email`, `password`, `age`, `gender`, `address`, `city`, `mobile`, `date`) VALUES
(3, 'dsa', 'dadadadad', 'adasda', 'ddsada', 'dasdasd', 22, 'M', 'dadasd', 'Bangalore', 231231321, '2016-03-28 08:25:43'),
(4, 'aaa', 'aaa', 'aaa', 'a@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', 12, 'M', 'sAS', 'Bangalore', 9999999999, '2016-03-29 04:58:30'),
(6, 'dfgdfg', 'gdf', 'gfdg', 'b@gmail.com', '08f8e0260c64418510cefb2b06eee5cd', 333, 'M', 'gdgdfg', 'Bangalore', 9940060625, '2016-04-09 10:49:31'),
(28, 'Vinay', 'P', 'vin', 'vinay11@gmail.com', '202cb962ac59075b964b07152d234b70', 11, 'M', 'Rajainagar', NULL, 9876543210, '2016-04-12 10:51:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_messages`
--
ALTER TABLE `admin_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_ownership`
--
ALTER TABLE `admin_ownership`
  ADD PRIMARY KEY (`own_id`);

--
-- Indexes for table `admin_property`
--
ALTER TABLE `admin_property`
  ADD PRIMARY KEY (`prop_id`);

--
-- Indexes for table `admin_registrations`
--
ALTER TABLE `admin_registrations`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_relations`
--
ALTER TABLE `admin_relations`
  ADD PRIMARY KEY (`rel_id`);

--
-- Indexes for table `familys`
--
ALTER TABLE `familys`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `grant_immovable`
--
ALTER TABLE `grant_immovable`
  ADD PRIMARY KEY (`grant_im_id`),
  ADD KEY `user_id_tree` (`grant_im_id`),
  ADD KEY `grant_immovable_ibfk_2` (`user_id`);

--
-- Indexes for table `immovable_propertys`
--
ALTER TABLE `immovable_propertys`
  ADD PRIMARY KEY (`Immovable_id`),
  ADD KEY `immovable_propertys_ibfk_1` (`will_id`);

--
-- Indexes for table `movable_propertys`
--
ALTER TABLE `movable_propertys`
  ADD PRIMARY KEY (`movable_id`),
  ADD KEY `user_fk` (`will_id`);

--
-- Indexes for table `not_allocated_details`
--
ALTER TABLE `not_allocated_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Membor_id` (`member_id`),
  ADD KEY `user_id` (`will_id`);

--
-- Indexes for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_doctor_ibfk_1` (`will_id`);

--
-- Indexes for table `tbl_family`
--
ALTER TABLE `tbl_family`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fam_will_id` (`will_id`);

--
-- Indexes for table `tbl_lawyer`
--
ALTER TABLE `tbl_lawyer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_lawyer_ibfk_1` (`will_id`);

--
-- Indexes for table `tbl_will`
--
ALTER TABLE `tbl_will`
  ADD PRIMARY KEY (`will_id`);

--
-- Indexes for table `tbl_witness`
--
ALTER TABLE `tbl_witness`
  ADD PRIMARY KEY (`witness_id`),
  ADD KEY `will_wit_id` (`will_id`);

--
-- Indexes for table `user_register`
--
ALTER TABLE `user_register`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_messages`
--
ALTER TABLE `admin_messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id auto increment', AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `admin_ownership`
--
ALTER TABLE `admin_ownership`
  MODIFY `own_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `admin_property`
--
ALTER TABLE `admin_property`
  MODIFY `prop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `admin_registrations`
--
ALTER TABLE `admin_registrations`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_relations`
--
ALTER TABLE `admin_relations`
  MODIFY `rel_id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id auto increment', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `familys`
--
ALTER TABLE `familys`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `grant_immovable`
--
ALTER TABLE `grant_immovable`
  MODIFY `grant_im_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user_id auto increment', AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `immovable_propertys`
--
ALTER TABLE `immovable_propertys`
  MODIFY `Immovable_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `movable_propertys`
--
ALTER TABLE `movable_propertys`
  MODIFY `movable_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `not_allocated_details`
--
ALTER TABLE `not_allocated_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_family`
--
ALTER TABLE `tbl_family`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_lawyer`
--
ALTER TABLE `tbl_lawyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_will`
--
ALTER TABLE `tbl_will`
  MODIFY `will_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_witness`
--
ALTER TABLE `tbl_witness`
  MODIFY `witness_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_register`
--
ALTER TABLE `user_register`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `familys`
--
ALTER TABLE `familys`
  ADD CONSTRAINT `familys_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grant_immovable`
--
ALTER TABLE `grant_immovable`
  ADD CONSTRAINT `grant_immovable_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `immovable_propertys`
--
ALTER TABLE `immovable_propertys`
  ADD CONSTRAINT `immovable_propertys_ibfk_1` FOREIGN KEY (`will_id`) REFERENCES `tbl_will` (`will_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movable_propertys`
--
ALTER TABLE `movable_propertys`
  ADD CONSTRAINT `movable_propertys_ibfk_1` FOREIGN KEY (`will_id`) REFERENCES `tbl_will` (`will_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `not_allocated_details`
--
ALTER TABLE `not_allocated_details`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`will_id`) REFERENCES `tbl_will` (`will_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  ADD CONSTRAINT `tbl_doctor_ibfk_1` FOREIGN KEY (`will_id`) REFERENCES `tbl_will` (`will_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_family`
--
ALTER TABLE `tbl_family`
  ADD CONSTRAINT `fam_will_id` FOREIGN KEY (`will_id`) REFERENCES `tbl_will` (`will_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_lawyer`
--
ALTER TABLE `tbl_lawyer`
  ADD CONSTRAINT `tbl_lawyer_ibfk_1` FOREIGN KEY (`will_id`) REFERENCES `tbl_will` (`will_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_witness`
--
ALTER TABLE `tbl_witness`
  ADD CONSTRAINT `will_wit_id` FOREIGN KEY (`will_id`) REFERENCES `tbl_will` (`will_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
