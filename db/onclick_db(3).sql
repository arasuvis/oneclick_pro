-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2016 at 10:30 AM
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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_messages`
--

INSERT INTO `admin_messages` (`id`, `email`, `password`, `contact`, `name`, `phone_number`, `address`, `date`, `modified_date`, `message`) VALUES
(2, 'vin@gmail.com', 'vin', '', 'VINAY', '9876543210', 'bangalore', '2016-03-22 05:55:41', '2016-03-22 05:55:41', ''),
(11, 'adel@gmail.com', 'adel', '', 'adel', '9876543211', '', '2016-04-07 01:04:46', '2016-04-07 01:04:46', ''),
(13, 'azdbz@gh.co', 'aaaa', '', 'asv', '9876543211', 'adhzh', '2016-03-22 07:24:02', '2016-03-22 07:24:02', ''),
(14, 'ram@gmail.com', 'eww', '', 'tgsg', '3445677651', 'ewfgasdgzdg', '2016-04-07 01:07:12', '2016-04-07 01:07:12', ''),
(15, 'ram@gmail.com', 'aaa', '', 'qwr', '9876543211', 'trgf', '2016-04-07 01:07:39', '2016-04-07 01:07:39', '');

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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_relations`
--

INSERT INTO `admin_relations` (`rel_id`, `name`, `date`, `modified_date`) VALUES
(8, 'sdagas', '2016-04-06 23:05:28', '2016-04-06 23:05:28'),
(9, 'dszhdfshx', '2016-04-09 04:45:53', '2016-04-09 04:45:53'),
(10, 'dsgsg', '2016-04-09 04:49:38', '2016-04-09 04:49:38'),
(11, 'qwegtqaewt', '2016-04-09 04:50:04', '2016-04-09 04:50:04');

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
-- Table structure for table `immovable_propertys`
--

CREATE TABLE `immovable_propertys` (
  `Immovable_id` int(11) NOT NULL COMMENT 'primary key',
  `user_id` int(11) NOT NULL COMMENT 'foriegn key of users table',
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

INSERT INTO `immovable_propertys` (`Immovable_id`, `user_id`, `name`, `address`, `municipal_number`, `year_of_purchase`, `area`, `nature_of_ownership`, `created_date`, `modified_date`) VALUES
(1, 3, 'praveen', 'bangalore', '080-7777', '2016', 'rajajinagar', 'private', '2016-03-31 08:54:43', '2016-03-31 08:54:43'),
(2, 3, 'Pradeep', 'Anantpur andra', '080-6666', '2014', 'anantpur', 'private', '2016-03-31 09:08:46', '2016-03-31 09:08:46'),
(3, 3, 'Bharath', 'Chitradurga', '080-4444', '2015', 'rajajinagar', 'public', '2016-03-31 09:09:38', '2016-03-31 09:09:38'),
(4, 3, 'Vinay', 'Bangalore', '080-8888', '2016', 'rajajinagar', 'private', '2016-03-31 09:10:08', '2016-03-31 09:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `movable_propertys`
--

CREATE TABLE `movable_propertys` (
  `movable_id` int(11) NOT NULL COMMENT 'primary key',
  `user_id` int(11) NOT NULL COMMENT 'Foriegn key of users table',
  `name` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movable_propertys`
--

INSERT INTO `movable_propertys` (`movable_id`, `user_id`, `name`, `comments`, `created_date`, `modified_date`) VALUES
(1, 3, 'Praveen A', 'welcome', '2016-03-31 09:47:57', '2016-03-31 09:47:57'),
(2, 3, 'Vinay', 'hi hello', '2016-03-31 09:49:24', '2016-03-31 09:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `nodes`
--

CREATE TABLE `nodes` (
  `user_id_new` int(11) NOT NULL COMMENT 'user_id auto increment',
  `familyid` int(11) NOT NULL,
  `elementid` varchar(255) NOT NULL,
  `toppos` varchar(255) NOT NULL,
  `leftpos` varchar(255) NOT NULL,
  `nodecaption` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `isliving` varchar(255) NOT NULL,
  `deathdate` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `hometel` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `deathplace` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `interests` varchar(255) NOT NULL,
  `bionotes` varchar(255) NOT NULL,
  `isauthor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nodes`
--

INSERT INTO `nodes` (`user_id_new`, `familyid`, `elementid`, `toppos`, `leftpos`, `nodecaption`, `firstname`, `surname`, `gender`, `birthdate`, `photo`, `isliving`, `deathdate`, `email`, `website`, `hometel`, `mobile`, `birthplace`, `deathplace`, `profession`, `company`, `interests`, `bionotes`, `isauthor`) VALUES
(1, 2, '1m', '2480.000030517578', '2480', 'qwes rew', 'qwes', 'rew', 'male', '17/feb/54', '', '1', '', '', '', '', '', '', '', '', '', '', '', '1'),
(2, 2, '1m-2f', '2480.000030517578', '2279', 'Partner of qwes', 'Partner of qwes', '', 'female', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '0'),
(3, 2, '1m-2f-4m', '2545.000030517578', '2559', 'Sibling of Partner of qwes', 'Sibling of Partner of qwes', '', 'male', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '0'),
(4, 2, '1m-2f-4m-6f', '2695.000030517578', '2559', 'Child of Sibling of Partner of qwes', 'Child of Sibling of Partner of qwes', '', 'female', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '0'),
(5, 2, '1m-2f-4m-6f-2m', '2695.000030517578', '2359', 'Partner of Child of Sibling of Partner of qwes', 'Partner of Child of Sibling of Partner of qwes', '', 'male', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '0'),
(6, 2, '1m-2f-4m-6f-6f', '2845', '2439', 'Child of Child of Sibling of Partner of qwes', 'Child of Child of Sibling of Partner of qwes', '', 'female', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '0'),
(7, 2, '1m-2f-4m-6f-6f-3m', '2845', '2639', 'Ex Partner of Child of Child of Sibling of Partner of qwes', 'Ex Partner of Child of Child of Sibling of Partner of qwes', '', 'male', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '0'),
(8, 2, '1m-2f-4m-6f-6f-3m-6f', '2995', '2639', 'Child of Ex Partner of Child of Child of Sibling of Partner of qwes', 'Child of Ex Partner of Child of Child of Sibling of Partner of qwes', '', 'female', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '0'),
(10, 3, '1m', '2481.000030517578', '2480', 'Thiru M', 'Thiru', 'M', 'male', '14/apr/99', '', '1', '', '', '', '', '', '', '', '', '', '', '', '1'),
(11, 3, '1m-2f', '2481.000030517578', '2280', 'Partner of Thiru t', 'Partner of Thiru', 't', 'female', '18/mar/99', '', '0', 'may/16/33', '', '', '', '', '', '', '', '', '', '', '0'),
(12, 4, '1m', '2480', '2480', 'tttt fdf', 'tttt', 'fdf', 'male', '15/jul/434', '', '1', '', '', '', '', '', '', '', '', '', '', '', '1'),
(13, 4, '1m-2f', '2480', '2280', 'Partner of tttt dsadsa', 'Partner of tttt', 'dsadsa', 'female', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '0'),
(14, 5, '1m', '2480', '2480', 'A a', 'A', 'a', 'male', '09/jan/99', '', '1', '', '', '', '', '', '', '', '', '', '', '', '1'),
(15, 5, '1m-2f', '2480', '2280', 'Partner of A b', 'Partner of A', 'b', 'female', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '0'),
(16, 5, '1m-2f-2m', '2480', '2080', 'Partner of Partner of A', 'Partner of Partner of A', '', 'male', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `not_allocated_details`
--

CREATE TABLE `not_allocated_details` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `member_id` int(11) NOT NULL COMMENT 'foreign key of family table',
  `user_id` int(11) NOT NULL COMMENT 'foriegn key of user_register table',
  `reason` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `not_allocated_details`
--

INSERT INTO `not_allocated_details` (`id`, `member_id`, `user_id`, `reason`, `created_date`, `modified_date`) VALUES
(1, 1, 3, 'not good', '2016-03-31 12:29:35', '2016-03-31 12:29:35'),
(2, 1, 3, 'died', '2016-03-31 12:34:04', '2016-03-31 12:34:04'),
(4, 1, 3, 'not good', '2016-03-31 17:36:02', '2016-03-31 17:36:02'),
(5, 11, 3, 'not so good', '2016-03-31 17:36:35', '2016-03-31 17:36:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor`
--

CREATE TABLE `tbl_doctor` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'primary key',
  `address` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_doctor`
--

INSERT INTO `tbl_doctor` (`id`, `name`, `user_id`, `address`) VALUES
(2, 'czcxc2222', 3, 'czxc222'),
(3, 'dasdad', 3, 'dasdadadad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lawyer`
--

CREATE TABLE `tbl_lawyer` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'primary key',
  `address` text,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lawyer`
--

INSERT INTO `tbl_lawyer` (`id`, `name`, `user_id`, `address`, `created_date`, `modified_date`) VALUES
(1, 'Praveen', 3, 'bangalore', '2016-03-31 10:20:14', '2016-03-31 10:20:14'),
(2, 'Thiru', 3, 'Chennai', '2016-03-31 10:20:49', '2016-03-31 10:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_person`
--

CREATE TABLE `tbl_person` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_person`
--

INSERT INTO `tbl_person` (`id`, `name`, `gender`, `dob`) VALUES
(26, 'gfdgdg', 'M', '2016-03-08'),
(2, 'name_1111111111111111', 'M', '1990-01-01'),
(3, 'name_002', 'f', '2000-01-01'),
(4, 'name_003', 'm', '2000-02-02'),
(5, 'name_005', 'm', '2000-04-04'),
(6, 'name_006', 'f', '2000-05-05'),
(34, 'dasda', 'M', '2016-03-23'),
(8, 'name_008', 'f', '2000-07-07'),
(9, 'name_009', 'm', '2000-08-08'),
(10, 'name_010', 'f', '2000-09-09'),
(11, 'name_011', 'm', '2000-10-10'),
(12, 'name_012', 'f', '2000-11-11'),
(13, 'name_013', 'm', '2000-12-12'),
(14, 'name_014', 'f', '2001-01-01'),
(15, 'name_015', 'm', '2001-02-02'),
(16, 'name_016', 'm', '2001-03-03'),
(17, 'name_017', 'm', '2001-04-04'),
(18, 'name_018', 'm', '2001-05-05'),
(19, 'name_019', 'm', '2001-06-06'),
(20, 'name_020', 'm', '2001-07-07'),
(21, 'name_021', 'm', '2001-08-08'),
(22, 'name_022', 'm', '2001-09-09'),
(23, 'name_023', 'm', '2001-10-10'),
(24, 'name_024', 'm', '2001-11-11'),
(25, 'name_025', 'm', '2001-12-12'),
(27, 'dsada', 'M', '2016-03-15'),
(28, 'dasdad', 'M', '2016-03-09'),
(29, 'aaa', 'M', '2016-03-11'),
(30, 'aaa', 'M', '2016-03-11'),
(31, 'adsad', 'M', '2016-03-10'),
(33, 'xczCzc', 'M', '2016-03-14'),
(35, 'dasda', 'M', '2016-03-23'),
(36, 'dasda', NULL, '2016-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_witness`
--

CREATE TABLE `tbl_witness` (
  `witness_id` int(11) NOT NULL COMMENT 'primary key',
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_witness`
--

INSERT INTO `tbl_witness` (`witness_id`, `name`, `address`, `created_date`, `modified_date`) VALUES
(1, 'Praveen A', 'bangalore', '2016-03-31 11:23:16', '2016-03-31 11:23:16'),
(2, 'Pradeep', 'Anantpur andra', '2016-03-31 11:25:47', '2016-03-31 11:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `tree`
--

CREATE TABLE `tree` (
  `user_id` int(255) NOT NULL COMMENT 'user_id auto increment',
  `name` varchar(255) NOT NULL,
  `dateadded` datetime NOT NULL,
  `username` varchar(255) NOT NULL,
  `tree_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tree`
--

INSERT INTO `tree` (`user_id`, `name`, `dateadded`, `username`, `tree_id`) VALUES
(3, 'administrator Tree', '2016-03-28 18:23:39', 'administrator', 2),
(3, 'administrator Tree', '2016-03-28 18:36:39', 'administrator', 3),
(3, 'administrator Tree', '2016-03-29 10:12:25', 'administrator', 4),
(3, 'administrator Tree', '2016-03-29 11:08:12', 'administrator', 5);

-- --------------------------------------------------------

--
-- Table structure for table `treerelationships`
--

CREATE TABLE `treerelationships` (
  `user_id_new` int(11) NOT NULL COMMENT 'user_id auto increment',
  `selementid` varchar(255) NOT NULL,
  `familyid` int(11) NOT NULL,
  `delementid` varchar(255) NOT NULL,
  `leftpos` varchar(255) DEFAULT '',
  `nodecaption` varchar(255) DEFAULT '',
  `firstname` varchar(255) DEFAULT '',
  `surname` varchar(255) DEFAULT '',
  `gender` varchar(255) DEFAULT '',
  `birthdate` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `isliving` varchar(255) DEFAULT NULL,
  `deathdate` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `hometel` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `birthplace` varchar(255) DEFAULT NULL,
  `deathplace` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `dname` varchar(255) DEFAULT NULL,
  `sname` varchar(255) DEFAULT NULL,
  `relation` varchar(255) DEFAULT NULL,
  `dconnectpos` varchar(255) DEFAULT NULL,
  `sconnectpos` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treerelationships`
--

INSERT INTO `treerelationships` (`user_id_new`, `selementid`, `familyid`, `delementid`, `leftpos`, `nodecaption`, `firstname`, `surname`, `gender`, `birthdate`, `photo`, `isliving`, `deathdate`, `email`, `website`, `hometel`, `mobile`, `birthplace`, `deathplace`, `profession`, `dname`, `sname`, `relation`, `dconnectpos`, `sconnectpos`) VALUES
(1, '1m-2f', 2, '1m', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qwes rew', 'Partner of qwes', 'Partner', 'Left', 'Right'),
(2, '1m-2f-4m', 2, '1m-2f', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Partner of qwes', 'Sibling of Partner of qwes', 'Brother', 'TopCenter', 'TopCenter'),
(3, '1m-2f-4m-6f', 2, '1m-2f-4m', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sibling of Partner of qwes', 'Child of Sibling of Partner of qwes', 'Child', 'BottomCenter', 'TopCenter'),
(4, '1m-2f-4m-6f-2m', 2, '1m-2f-4m-6f', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Child of Sibling of Partner of qwes', 'Partner of Child of Sibling of Partner of qwes', 'Partner', 'Left', 'Right'),
(5, '1m-2f-4m-6f-6f', 2, '1m-2f-4m-6f', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Child of Sibling of Partner of qwes', 'Child of Child of Sibling of Partner of qwes', 'Child', 'Left', 'TopCenter'),
(6, '1m-2f-4m-6f-6f', 2, '1m-2f-4m-6f-2m', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Partner of Child of Sibling of Partner of qwes', 'Child of Child of Sibling of Partner of qwes', 'Child', 'Right', 'TopCenter'),
(7, '1m-2f-4m-6f-6f-3m', 2, '1m-2f-4m-6f-6f', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Child of Child of Sibling of Partner of qwes', 'Ex Partner of Child of Child of Sibling of Partner of qwes', 'Ex-Partner', 'Right', 'Left'),
(8, '1m-2f-4m-6f-6f-3m-6f', 2, '1m-2f-4m-6f-6f-3m', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ex Partner of Child of Child of Sibling of Partner of qwes', 'Child of Ex Partner of Child of Child of Sibling of Partner of qwes', 'Child', 'BottomCenter', 'TopCenter'),
(9, '1m-2f', 3, '1m', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Thiru M', 'Partner of Thiru t', 'Partner', 'Left', 'Right'),
(10, '1m-2f', 4, '1m', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tttt fdf', 'Partner of tttt dsadsa', 'Partner', 'Left', 'Right'),
(11, '1m-2f', 5, '1m', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A a', 'Partner of A b', 'Partner', 'Left', 'Right'),
(12, '1m-2f-2m', 5, '1m-2f', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Partner of A b', 'Partner of Partner of A', 'Partner', 'Left', 'Right');

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
  `mobile` bigint(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`user_id`, `fname`, `mname`, `surname`, `email`, `password`, `age`, `gender`, `address`, `mobile`, `date`) VALUES
(3, 'dsa', 'dadadadad', 'adasda', 'ddsada', 'dasdasd', 22, 'M', 'dadasd', 231231321, '2016-03-28 08:25:43'),
(4, 'aaa', 'aaa', 'aaa', 'a@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', 12, 'M', 'sAS', 9999999999, '2016-03-29 04:58:30'),
(5, 'praveen', 'kumar', 'A', 'praveen@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 23, 'M', 'qwerty', 1234567890, '2016-03-30 12:53:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_messages`
--
ALTER TABLE `admin_messages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `immovable_propertys`
--
ALTER TABLE `immovable_propertys`
  ADD PRIMARY KEY (`Immovable_id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `movable_propertys`
--
ALTER TABLE `movable_propertys`
  ADD PRIMARY KEY (`movable_id`),
  ADD KEY `user_fk` (`user_id`);

--
-- Indexes for table `nodes`
--
ALTER TABLE `nodes`
  ADD PRIMARY KEY (`user_id_new`),
  ADD KEY `tree_node_id` (`familyid`);

--
-- Indexes for table `not_allocated_details`
--
ALTER TABLE `not_allocated_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `Membor_id` (`member_id`);

--
-- Indexes for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk` (`user_id`);

--
-- Indexes for table `tbl_lawyer`
--
ALTER TABLE `tbl_lawyer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk` (`user_id`);

--
-- Indexes for table `tbl_person`
--
ALTER TABLE `tbl_person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_witness`
--
ALTER TABLE `tbl_witness`
  ADD PRIMARY KEY (`witness_id`);

--
-- Indexes for table `tree`
--
ALTER TABLE `tree`
  ADD PRIMARY KEY (`tree_id`),
  ADD KEY `user_id_tree` (`user_id`);

--
-- Indexes for table `treerelationships`
--
ALTER TABLE `treerelationships`
  ADD PRIMARY KEY (`user_id_new`),
  ADD KEY `tree_id` (`familyid`);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id auto increment', AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `admin_registrations`
--
ALTER TABLE `admin_registrations`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_relations`
--
ALTER TABLE `admin_relations`
  MODIFY `rel_id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id auto increment', AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `familys`
--
ALTER TABLE `familys`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `immovable_propertys`
--
ALTER TABLE `immovable_propertys`
  MODIFY `Immovable_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `movable_propertys`
--
ALTER TABLE `movable_propertys`
  MODIFY `movable_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nodes`
--
ALTER TABLE `nodes`
  MODIFY `user_id_new` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user_id auto increment', AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `not_allocated_details`
--
ALTER TABLE `not_allocated_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_lawyer`
--
ALTER TABLE `tbl_lawyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_person`
--
ALTER TABLE `tbl_person`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tbl_witness`
--
ALTER TABLE `tbl_witness`
  MODIFY `witness_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tree`
--
ALTER TABLE `tree`
  MODIFY `tree_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `treerelationships`
--
ALTER TABLE `treerelationships`
  MODIFY `user_id_new` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user_id auto increment', AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_register`
--
ALTER TABLE `user_register`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `familys`
--
ALTER TABLE `familys`
  ADD CONSTRAINT `familys_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `immovable_propertys`
--
ALTER TABLE `immovable_propertys`
  ADD CONSTRAINT `immovable_propertys_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movable_propertys`
--
ALTER TABLE `movable_propertys`
  ADD CONSTRAINT `movable_propertys_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nodes`
--
ALTER TABLE `nodes`
  ADD CONSTRAINT `tree_node_id` FOREIGN KEY (`familyid`) REFERENCES `tree` (`tree_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `not_allocated_details`
--
ALTER TABLE `not_allocated_details`
  ADD CONSTRAINT `Membor_id` FOREIGN KEY (`member_id`) REFERENCES `nodes` (`user_id_new`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user_register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  ADD CONSTRAINT `tbl_doctor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_lawyer`
--
ALTER TABLE `tbl_lawyer`
  ADD CONSTRAINT `tbl_lawyer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tree`
--
ALTER TABLE `tree`
  ADD CONSTRAINT `user_id_tree` FOREIGN KEY (`user_id`) REFERENCES `user_register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `treerelationships`
--
ALTER TABLE `treerelationships`
  ADD CONSTRAINT `tree_id` FOREIGN KEY (`familyid`) REFERENCES `tree` (`tree_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
