/*
Navicat MySQL Data Transfer

Source Server         : Localserver
Source Server Version : 50710
Source Host           : localhost:3306
Source Database       : onclick_db

Target Server Type    : MYSQL
Target Server Version : 50710
File Encoding         : 65001

Date: 2016-04-12 14:26:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_messages
-- ----------------------------
DROP TABLE IF EXISTS `admin_messages`;
CREATE TABLE `admin_messages` (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id auto increment',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin_messages
-- ----------------------------
INSERT INTO `admin_messages` VALUES ('2', 'vin@gmail.com', 'vin', '', 'VINAY', '9876543210', 'bangalore', '2016-03-22 11:25:41', '2016-03-22 11:25:41', '');
INSERT INTO `admin_messages` VALUES ('11', 'adel@gmail.com', 'adel', '', 'adel', '9876543211', 'Testing123', '2016-04-09 11:22:36', '2016-04-09 11:22:36', '');
INSERT INTO `admin_messages` VALUES ('13', 'azdbz@gh.co', 'aaaa', '', 'asv', '9876543211', 'adhzh', '2016-03-22 12:54:02', '2016-03-22 12:54:02', '');
INSERT INTO `admin_messages` VALUES ('14', 'ram@gmail.com', 'eww', '', 'tgsg', '3445677651', 'ewfgasdgzdg', '2016-04-07 06:37:12', '2016-04-07 06:37:12', '');
INSERT INTO `admin_messages` VALUES ('15', 'ram@gmail.com', 'aaa', '', 'qwr', '9876543211', 'trgf', '2016-04-07 06:37:39', '2016-04-07 06:37:39', '');
INSERT INTO `admin_messages` VALUES ('16', 'thiru@gmail.com', 'thiru', '', 'Thiru', '9999999999', 'Testing Address', '2016-04-09 10:36:39', '2016-04-09 10:36:39', '');
INSERT INTO `admin_messages` VALUES ('17', 'aaa@gmail.com', 'aaa', '', 'dasda', '9876543210', 'sfs', '2016-04-09 10:47:50', '2016-04-09 10:47:50', '');
INSERT INTO `admin_messages` VALUES ('18', 'a@gmail.com', 'aaa', '', 'dsad', '9876543210', 'dasda', '2016-04-09 11:19:56', '2016-04-09 11:19:56', '');

-- ----------------------------
-- Table structure for admin_registrations
-- ----------------------------
DROP TABLE IF EXISTS `admin_registrations`;
CREATE TABLE `admin_registrations` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `email_address` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin_registrations
-- ----------------------------
INSERT INTO `admin_registrations` VALUES ('1', 'admin@oneclick.com', '123456');

-- ----------------------------
-- Table structure for admin_relations
-- ----------------------------
DROP TABLE IF EXISTS `admin_relations`;
CREATE TABLE `admin_relations` (
  `rel_id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id auto increment',
  `name` varchar(255) NOT NULL,
  `date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`rel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin_relations
-- ----------------------------
INSERT INTO `admin_relations` VALUES ('8', 'sdagas', '2016-04-07 04:35:28', '2016-04-07 04:35:28');
INSERT INTO `admin_relations` VALUES ('9', 'qqqq', '2016-04-09 11:27:22', '2016-04-09 11:27:22');
INSERT INTO `admin_relations` VALUES ('10', 'dsgsg', '2016-04-09 10:19:38', '2016-04-09 10:19:38');
INSERT INTO `admin_relations` VALUES ('11', 'qwegtqaewt', '2016-04-09 10:20:04', '2016-04-09 10:20:04');
INSERT INTO `admin_relations` VALUES ('12', 'bbbb', '2016-04-09 11:25:08', '2016-04-09 11:25:08');
INSERT INTO `admin_relations` VALUES ('13', 'vinay', '2016-04-09 11:27:41', '2016-04-09 11:27:41');

-- ----------------------------
-- Table structure for familys
-- ----------------------------
DROP TABLE IF EXISTS `familys`;
CREATE TABLE `familys` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `user_id` int(11) NOT NULL COMMENT 'Foriegn key of users table',
  `member_name` varchar(255) NOT NULL,
  `relation_id` varchar(11) NOT NULL COMMENT 'foriegn key of relations table',
  `martial_status` varchar(255) NOT NULL,
  `age` varchar(100) NOT NULL,
  `family_rel_id` int(11) NOT NULL COMMENT 'foriegn key',
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`member_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `familys_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of familys
-- ----------------------------
INSERT INTO `familys` VALUES ('1', '3', 'ewqeq', '3', 'eqwe', 'eqwe', '2323', '2016-03-29 13:57:04', '2016-03-29 13:57:09');

-- ----------------------------
-- Table structure for grant_immovable
-- ----------------------------
DROP TABLE IF EXISTS `grant_immovable`;
CREATE TABLE `grant_immovable` (
  `grant_im_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user_id auto increment',
  `property_id` int(11) NOT NULL,
  `fam_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `percent` varchar(255) NOT NULL,
  PRIMARY KEY (`grant_im_id`),
  KEY `user_id_tree` (`grant_im_id`),
  KEY `grant_immovable_ibfk_2` (`user_id`),
  CONSTRAINT `grant_immovable_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of grant_immovable
-- ----------------------------
INSERT INTO `grant_immovable` VALUES ('7', '1', '1', '3', '11');
INSERT INTO `grant_immovable` VALUES ('8', '1', '2', '3', '33');
INSERT INTO `grant_immovable` VALUES ('9', '1', '2', '3', '33');
INSERT INTO `grant_immovable` VALUES ('10', '8', '14', '3', '1');
INSERT INTO `grant_immovable` VALUES ('11', '11', '13', '3', '222');

-- ----------------------------
-- Table structure for immovable_propertys
-- ----------------------------
DROP TABLE IF EXISTS `immovable_propertys`;
CREATE TABLE `immovable_propertys` (
  `Immovable_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `will_id` int(11) NOT NULL COMMENT 'foriegn key of users table',
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `municipal_number` varchar(255) DEFAULT NULL,
  `year_of_purchase` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `nature_of_ownership` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`Immovable_id`),
  KEY `immovable_propertys_ibfk_1` (`will_id`),
  CONSTRAINT `immovable_propertys_ibfk_1` FOREIGN KEY (`will_id`) REFERENCES `tbl_will` (`will_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of immovable_propertys
-- ----------------------------

-- ----------------------------
-- Table structure for movable_propertys
-- ----------------------------
DROP TABLE IF EXISTS `movable_propertys`;
CREATE TABLE `movable_propertys` (
  `movable_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `will_id` int(11) NOT NULL COMMENT 'Foriegn key of users table',
  `name` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`movable_id`),
  KEY `user_fk` (`will_id`),
  CONSTRAINT `movable_propertys_ibfk_1` FOREIGN KEY (`will_id`) REFERENCES `tbl_will` (`will_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of movable_propertys
-- ----------------------------

-- ----------------------------
-- Table structure for not_allocated_details
-- ----------------------------
DROP TABLE IF EXISTS `not_allocated_details`;
CREATE TABLE `not_allocated_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `member_id` int(11) NOT NULL COMMENT 'foreign key of family table',
  `will_id` int(11) NOT NULL COMMENT 'foriegn key of user_register table',
  `reason` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Membor_id` (`member_id`),
  KEY `user_id` (`will_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`will_id`) REFERENCES `tbl_will` (`will_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of not_allocated_details
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_doctor
-- ----------------------------
DROP TABLE IF EXISTS `tbl_doctor`;
CREATE TABLE `tbl_doctor` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `name` varchar(255) NOT NULL,
  `will_id` int(11) NOT NULL COMMENT 'primary key',
  `address` text,
  PRIMARY KEY (`id`),
  KEY `tbl_doctor_ibfk_1` (`will_id`),
  CONSTRAINT `tbl_doctor_ibfk_1` FOREIGN KEY (`will_id`) REFERENCES `tbl_will` (`will_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_doctor
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_family
-- ----------------------------
DROP TABLE IF EXISTS `tbl_family`;
CREATE TABLE `tbl_family` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `dob` datetime NOT NULL,
  `will_id` int(11) DEFAULT NULL,
  `marital_status` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fam_will_id` (`will_id`),
  CONSTRAINT `fam_will_id` FOREIGN KEY (`will_id`) REFERENCES `tbl_will` (`will_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_family
-- ----------------------------
INSERT INTO `tbl_family` VALUES ('1', 'aaa', 'Son', '2016-04-19 05:24:20', null, 'Single', 'Alive');
INSERT INTO `tbl_family` VALUES ('2', 'hgfhf', 'sdagas', '2016-04-11 00:00:00', null, 'Single', 'Alive');
INSERT INTO `tbl_family` VALUES ('3', 'hgfhf', 'sdagas', '2016-04-11 00:00:00', null, 'Single', 'Alive');
INSERT INTO `tbl_family` VALUES ('4', 'hf', 'dsgsg', '2016-04-11 00:00:00', null, 'Married', 'Alive');
INSERT INTO `tbl_family` VALUES ('5', 'Test', 'sdagas', '2016-04-13 00:00:00', null, 'Single', 'Alive');

-- ----------------------------
-- Table structure for tbl_lawyer
-- ----------------------------
DROP TABLE IF EXISTS `tbl_lawyer`;
CREATE TABLE `tbl_lawyer` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `name` varchar(255) NOT NULL,
  `will_id` int(11) NOT NULL COMMENT 'primary key',
  `address` text,
  PRIMARY KEY (`id`),
  KEY `tbl_lawyer_ibfk_1` (`will_id`),
  CONSTRAINT `tbl_lawyer_ibfk_1` FOREIGN KEY (`will_id`) REFERENCES `tbl_will` (`will_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_lawyer
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_will
-- ----------------------------
DROP TABLE IF EXISTS `tbl_will`;
CREATE TABLE `tbl_will` (
  `will_id` int(11) NOT NULL AUTO_INCREMENT,
  `will_name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`will_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_will
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_witness
-- ----------------------------
DROP TABLE IF EXISTS `tbl_witness`;
CREATE TABLE `tbl_witness` (
  `witness_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `will_id` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`witness_id`),
  KEY `will_wit_id` (`will_id`),
  CONSTRAINT `will_wit_id` FOREIGN KEY (`will_id`) REFERENCES `tbl_will` (`will_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_witness
-- ----------------------------
INSERT INTO `tbl_witness` VALUES ('1', 'Praveen A', 'bangalore', null, '2016-03-31 11:23:16', '2016-03-31 11:23:16');
INSERT INTO `tbl_witness` VALUES ('2', 'Pradeep', 'Anantpur andra', null, '2016-03-31 11:25:47', '2016-03-31 11:25:47');

-- ----------------------------
-- Table structure for user_register
-- ----------------------------
DROP TABLE IF EXISTS `user_register`;
CREATE TABLE `user_register` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_register
-- ----------------------------
INSERT INTO `user_register` VALUES ('3', 'dsa', 'dadadadad', 'adasda', 'ddsada', 'dasdasd', '22', 'M', 'dadasd', 'Bangalore', '231231321', '2016-03-28 13:55:43');
INSERT INTO `user_register` VALUES ('4', 'aaa', 'aaa', 'aaa', 'a@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', '12', 'M', 'sAS', 'Bangalore', '9999999999', '2016-03-29 10:28:30');
INSERT INTO `user_register` VALUES ('6', 'dfgdfg', 'gdf', 'gfdg', 'b@gmail.com', '08f8e0260c64418510cefb2b06eee5cd', '333', 'M', 'gdgdfg', 'Bangalore', '9940060625', '2016-04-09 16:19:31');

-- ----------------------------
-- Procedure structure for Proc_willdetails
-- ----------------------------
DROP PROCEDURE IF EXISTS `Proc_willdetails`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Proc_willdetails`(IN USERID INT,IN STARTPOSITION INT)
BEGIN
	
SET @POSITION =  STARTPOSITION;
SET @PAGESIZE = 5;
SET @USERID = USERID;


PREPARE GetProjects FROM
'SELECT * from user_register where user_id = ? order by user_id LIMIT ?,?';
EXECUTE GetProjects USING @USERID,@POSITION, @PAGESIZE;


PREPARE GetProp FROM
'SELECT * from immovable_propertys where user_id = ? order by user_id LIMIT ?,?';
EXECUTE GetProp USING @USERID,@POSITION, @PAGESIZE;
END
;;
DELIMITER ;
