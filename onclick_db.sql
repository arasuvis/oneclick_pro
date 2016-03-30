/*
Navicat MySQL Data Transfer

Source Server         : Localserver
Source Server Version : 50710
Source Host           : localhost:3306
Source Database       : onclick_db

Target Server Type    : MYSQL
Target Server Version : 50710
File Encoding         : 65001

Date: 2016-03-30 18:13:26
*/

SET FOREIGN_KEY_CHECKS=0;

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
-- Table structure for immovable_propertys
-- ----------------------------
DROP TABLE IF EXISTS `immovable_propertys`;
CREATE TABLE `immovable_propertys` (
  `Immovable_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `user_id` int(11) NOT NULL COMMENT 'foriegn key of users table',
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `municipal_number` varchar(255) DEFAULT NULL,
  `year_of_purchase` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `nature_of_ownership` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`Immovable_id`),
  KEY `user_id_fk` (`user_id`),
  CONSTRAINT `immovable_propertys_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of immovable_propertys
-- ----------------------------
INSERT INTO `immovable_propertys` VALUES ('7', '3', 'dasda', 'dsada', 'dasdad', 'dasda', 'Bangalore', 'dasdada', '2016-03-28 13:55:55', '2016-03-28 13:55:55');
INSERT INTO `immovable_propertys` VALUES ('8', '3', 'land1', 'dadsad', 'dasd', 'adasdad', 'Bangalore', 'dasdad', '2016-03-28 13:56:12', '2016-03-28 13:56:12');
INSERT INTO `immovable_propertys` VALUES ('9', '3', 'dasdasxcv', 'xvxvx', 'vvx', 'vxvx', 'Bangalore', 'vxcvxv', '2016-03-28 13:59:18', '2016-03-28 13:59:18');
INSERT INTO `immovable_propertys` VALUES ('10', '3', null, 'dasasdadadd', 'dsadasd', 'dasdad', 'Bangalore', 'dasdada', '2016-03-30 11:48:28', '2016-03-30 11:48:28');
INSERT INTO `immovable_propertys` VALUES ('11', '3', 'dsada', 'dasda', 'dsad', 'dasda', 'Bangalore', 'dasdada', '2016-03-30 11:49:48', '2016-03-30 11:49:48');

-- ----------------------------
-- Table structure for movable_propertys
-- ----------------------------
DROP TABLE IF EXISTS `movable_propertys`;
CREATE TABLE `movable_propertys` (
  `movable_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `user_id` int(11) NOT NULL COMMENT 'Foriegn key of users table',
  `name` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`movable_id`),
  KEY `user_fk` (`user_id`),
  CONSTRAINT `movable_propertys_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of movable_propertys
-- ----------------------------

-- ----------------------------
-- Table structure for nodes
-- ----------------------------
DROP TABLE IF EXISTS `nodes`;
CREATE TABLE `nodes` (
  `user_id_new` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user_id auto increment',
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
  `isauthor` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id_new`),
  KEY `tree_node_id` (`familyid`),
  CONSTRAINT `tree_node_id` FOREIGN KEY (`familyid`) REFERENCES `tree` (`tree_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of nodes
-- ----------------------------
INSERT INTO `nodes` VALUES ('1', '2', '1m', '2480.000030517578', '2480', 'qwes rew', 'qwes', 'rew', 'male', '17/feb/54', '', '1', '', '', '', '', '', '', '', '', '', '', '', '1');
INSERT INTO `nodes` VALUES ('2', '2', '1m-2f', '2480.000030517578', '2279', 'Partner of qwes', 'Partner of qwes', '', 'female', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `nodes` VALUES ('3', '2', '1m-2f-4m', '2545.000030517578', '2559', 'Sibling of Partner of qwes', 'Sibling of Partner of qwes', '', 'male', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `nodes` VALUES ('4', '2', '1m-2f-4m-6f', '2695.000030517578', '2559', 'Child of Sibling of Partner of qwes', 'Child of Sibling of Partner of qwes', '', 'female', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `nodes` VALUES ('5', '2', '1m-2f-4m-6f-2m', '2695.000030517578', '2359', 'Partner of Child of Sibling of Partner of qwes', 'Partner of Child of Sibling of Partner of qwes', '', 'male', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `nodes` VALUES ('6', '2', '1m-2f-4m-6f-6f', '2845', '2439', 'Child of Child of Sibling of Partner of qwes', 'Child of Child of Sibling of Partner of qwes', '', 'female', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `nodes` VALUES ('7', '2', '1m-2f-4m-6f-6f-3m', '2845', '2639', 'Ex Partner of Child of Child of Sibling of Partner of qwes', 'Ex Partner of Child of Child of Sibling of Partner of qwes', '', 'male', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `nodes` VALUES ('8', '2', '1m-2f-4m-6f-6f-3m-6f', '2995', '2639', 'Child of Ex Partner of Child of Child of Sibling of Partner of qwes', 'Child of Ex Partner of Child of Child of Sibling of Partner of qwes', '', 'female', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `nodes` VALUES ('10', '3', '1m', '2481.000030517578', '2480', 'Thiru M', 'Thiru', 'M', 'male', '14/apr/99', '', '1', '', '', '', '', '', '', '', '', '', '', '', '1');
INSERT INTO `nodes` VALUES ('11', '3', '1m-2f', '2481.000030517578', '2280', 'Partner of Thiru t', 'Partner of Thiru', 't', 'female', '18/mar/99', '', '0', 'may/16/33', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `nodes` VALUES ('12', '4', '1m', '2480', '2480', 'tttt fdf', 'tttt', 'fdf', 'male', '15/jul/434', '', '1', '', '', '', '', '', '', '', '', '', '', '', '1');
INSERT INTO `nodes` VALUES ('13', '4', '1m-2f', '2480', '2280', 'Partner of tttt dsadsa', 'Partner of tttt', 'dsadsa', 'female', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `nodes` VALUES ('14', '5', '1m', '2480', '2480', 'A a', 'A', 'a', 'male', '09/jan/99', '', '1', '', '', '', '', '', '', '', '', '', '', '', '1');
INSERT INTO `nodes` VALUES ('15', '5', '1m-2f', '2480', '2280', 'Partner of A b', 'Partner of A', 'b', 'female', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `nodes` VALUES ('16', '5', '1m-2f-2m', '2480', '2080', 'Partner of Partner of A', 'Partner of Partner of A', '', 'male', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '0');

-- ----------------------------
-- Table structure for tbl_doctor
-- ----------------------------
DROP TABLE IF EXISTS `tbl_doctor`;
CREATE TABLE `tbl_doctor` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'primary key',
  `address` text,
  PRIMARY KEY (`id`),
  KEY `user_fk` (`user_id`),
  CONSTRAINT `tbl_doctor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_doctor
-- ----------------------------
INSERT INTO `tbl_doctor` VALUES ('2', 'czcxc2222', '3', 'czxc222');
INSERT INTO `tbl_doctor` VALUES ('3', 'dasdad', '3', 'dasdadadad');

-- ----------------------------
-- Table structure for tbl_lawyer
-- ----------------------------
DROP TABLE IF EXISTS `tbl_lawyer`;
CREATE TABLE `tbl_lawyer` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'primary key',
  `address` text,
  PRIMARY KEY (`id`),
  KEY `user_fk` (`user_id`),
  CONSTRAINT `tbl_lawyer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_lawyer
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_person
-- ----------------------------
DROP TABLE IF EXISTS `tbl_person`;
CREATE TABLE `tbl_person` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_person
-- ----------------------------
INSERT INTO `tbl_person` VALUES ('26', 'gfdgdg', 'M', '2016-03-08');
INSERT INTO `tbl_person` VALUES ('2', 'name_1111111111111111', 'M', '1990-01-01');
INSERT INTO `tbl_person` VALUES ('3', 'name_002', 'f', '2000-01-01');
INSERT INTO `tbl_person` VALUES ('4', 'name_003', 'm', '2000-02-02');
INSERT INTO `tbl_person` VALUES ('5', 'name_005', 'm', '2000-04-04');
INSERT INTO `tbl_person` VALUES ('6', 'name_006', 'f', '2000-05-05');
INSERT INTO `tbl_person` VALUES ('34', 'dasda', 'M', '2016-03-23');
INSERT INTO `tbl_person` VALUES ('8', 'name_008', 'f', '2000-07-07');
INSERT INTO `tbl_person` VALUES ('9', 'name_009', 'm', '2000-08-08');
INSERT INTO `tbl_person` VALUES ('10', 'name_010', 'f', '2000-09-09');
INSERT INTO `tbl_person` VALUES ('11', 'name_011', 'm', '2000-10-10');
INSERT INTO `tbl_person` VALUES ('12', 'name_012', 'f', '2000-11-11');
INSERT INTO `tbl_person` VALUES ('13', 'name_013', 'm', '2000-12-12');
INSERT INTO `tbl_person` VALUES ('14', 'name_014', 'f', '2001-01-01');
INSERT INTO `tbl_person` VALUES ('15', 'name_015', 'm', '2001-02-02');
INSERT INTO `tbl_person` VALUES ('16', 'name_016', 'm', '2001-03-03');
INSERT INTO `tbl_person` VALUES ('17', 'name_017', 'm', '2001-04-04');
INSERT INTO `tbl_person` VALUES ('18', 'name_018', 'm', '2001-05-05');
INSERT INTO `tbl_person` VALUES ('19', 'name_019', 'm', '2001-06-06');
INSERT INTO `tbl_person` VALUES ('20', 'name_020', 'm', '2001-07-07');
INSERT INTO `tbl_person` VALUES ('21', 'name_021', 'm', '2001-08-08');
INSERT INTO `tbl_person` VALUES ('22', 'name_022', 'm', '2001-09-09');
INSERT INTO `tbl_person` VALUES ('23', 'name_023', 'm', '2001-10-10');
INSERT INTO `tbl_person` VALUES ('24', 'name_024', 'm', '2001-11-11');
INSERT INTO `tbl_person` VALUES ('25', 'name_025', 'm', '2001-12-12');
INSERT INTO `tbl_person` VALUES ('27', 'dsada', 'M', '2016-03-15');
INSERT INTO `tbl_person` VALUES ('28', 'dasdad', 'M', '2016-03-09');
INSERT INTO `tbl_person` VALUES ('29', 'aaa', 'M', '2016-03-11');
INSERT INTO `tbl_person` VALUES ('30', 'aaa', 'M', '2016-03-11');
INSERT INTO `tbl_person` VALUES ('31', 'adsad', 'M', '2016-03-10');
INSERT INTO `tbl_person` VALUES ('33', 'xczCzc', 'M', '2016-03-14');
INSERT INTO `tbl_person` VALUES ('35', 'dasda', 'M', '2016-03-23');
INSERT INTO `tbl_person` VALUES ('36', 'dasda', null, '2016-03-23');

-- ----------------------------
-- Table structure for tree
-- ----------------------------
DROP TABLE IF EXISTS `tree`;
CREATE TABLE `tree` (
  `user_id` int(255) NOT NULL COMMENT 'user_id auto increment',
  `name` varchar(255) NOT NULL,
  `dateadded` datetime NOT NULL,
  `username` varchar(255) NOT NULL,
  `tree_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`tree_id`),
  KEY `user_id_tree` (`user_id`),
  CONSTRAINT `user_id_tree` FOREIGN KEY (`user_id`) REFERENCES `user_register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tree
-- ----------------------------
INSERT INTO `tree` VALUES ('3', 'administrator Tree', '2016-03-28 18:23:39', 'administrator', '2');
INSERT INTO `tree` VALUES ('3', 'administrator Tree', '2016-03-28 18:36:39', 'administrator', '3');
INSERT INTO `tree` VALUES ('3', 'administrator Tree', '2016-03-29 10:12:25', 'administrator', '4');
INSERT INTO `tree` VALUES ('3', 'administrator Tree', '2016-03-29 11:08:12', 'administrator', '5');

-- ----------------------------
-- Table structure for treerelationships
-- ----------------------------
DROP TABLE IF EXISTS `treerelationships`;
CREATE TABLE `treerelationships` (
  `user_id_new` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user_id auto increment',
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
  `sconnectpos` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id_new`),
  KEY `tree_id` (`familyid`),
  CONSTRAINT `tree_id` FOREIGN KEY (`familyid`) REFERENCES `tree` (`tree_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of treerelationships
-- ----------------------------
INSERT INTO `treerelationships` VALUES ('1', '1m-2f', '2', '1m', '', '', '', '', '', null, null, null, null, null, null, null, null, null, null, null, 'qwes rew', 'Partner of qwes', 'Partner', 'Left', 'Right');
INSERT INTO `treerelationships` VALUES ('2', '1m-2f-4m', '2', '1m-2f', '', '', '', '', '', null, null, null, null, null, null, null, null, null, null, null, 'Partner of qwes', 'Sibling of Partner of qwes', 'Brother', 'TopCenter', 'TopCenter');
INSERT INTO `treerelationships` VALUES ('3', '1m-2f-4m-6f', '2', '1m-2f-4m', '', '', '', '', '', null, null, null, null, null, null, null, null, null, null, null, 'Sibling of Partner of qwes', 'Child of Sibling of Partner of qwes', 'Child', 'BottomCenter', 'TopCenter');
INSERT INTO `treerelationships` VALUES ('4', '1m-2f-4m-6f-2m', '2', '1m-2f-4m-6f', '', '', '', '', '', null, null, null, null, null, null, null, null, null, null, null, 'Child of Sibling of Partner of qwes', 'Partner of Child of Sibling of Partner of qwes', 'Partner', 'Left', 'Right');
INSERT INTO `treerelationships` VALUES ('5', '1m-2f-4m-6f-6f', '2', '1m-2f-4m-6f', '', '', '', '', '', null, null, null, null, null, null, null, null, null, null, null, 'Child of Sibling of Partner of qwes', 'Child of Child of Sibling of Partner of qwes', 'Child', 'Left', 'TopCenter');
INSERT INTO `treerelationships` VALUES ('6', '1m-2f-4m-6f-6f', '2', '1m-2f-4m-6f-2m', '', '', '', '', '', null, null, null, null, null, null, null, null, null, null, null, 'Partner of Child of Sibling of Partner of qwes', 'Child of Child of Sibling of Partner of qwes', 'Child', 'Right', 'TopCenter');
INSERT INTO `treerelationships` VALUES ('7', '1m-2f-4m-6f-6f-3m', '2', '1m-2f-4m-6f-6f', '', '', '', '', '', null, null, null, null, null, null, null, null, null, null, null, 'Child of Child of Sibling of Partner of qwes', 'Ex Partner of Child of Child of Sibling of Partner of qwes', 'Ex-Partner', 'Right', 'Left');
INSERT INTO `treerelationships` VALUES ('8', '1m-2f-4m-6f-6f-3m-6f', '2', '1m-2f-4m-6f-6f-3m', '', '', '', '', '', null, null, null, null, null, null, null, null, null, null, null, 'Ex Partner of Child of Child of Sibling of Partner of qwes', 'Child of Ex Partner of Child of Child of Sibling of Partner of qwes', 'Child', 'BottomCenter', 'TopCenter');
INSERT INTO `treerelationships` VALUES ('9', '1m-2f', '3', '1m', '', '', '', '', '', null, null, null, null, null, null, null, null, null, null, null, 'Thiru M', 'Partner of Thiru t', 'Partner', 'Left', 'Right');
INSERT INTO `treerelationships` VALUES ('10', '1m-2f', '4', '1m', '', '', '', '', '', null, null, null, null, null, null, null, null, null, null, null, 'tttt fdf', 'Partner of tttt dsadsa', 'Partner', 'Left', 'Right');
INSERT INTO `treerelationships` VALUES ('11', '1m-2f', '5', '1m', '', '', '', '', '', null, null, null, null, null, null, null, null, null, null, null, 'A a', 'Partner of A b', 'Partner', 'Left', 'Right');
INSERT INTO `treerelationships` VALUES ('12', '1m-2f-2m', '5', '1m-2f', '', '', '', '', '', null, null, null, null, null, null, null, null, null, null, null, 'Partner of A b', 'Partner of Partner of A', 'Partner', 'Left', 'Right');

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
  `mobile` bigint(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_register
-- ----------------------------
INSERT INTO `user_register` VALUES ('3', 'dsa', 'dadadadad', 'adasda', 'ddsada', 'dasdasd', '22', 'M', 'dadasd', '231231321', '2016-03-28 13:55:43');
INSERT INTO `user_register` VALUES ('4', 'aaa', 'aaa', 'aaa', 'a@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', '12', 'M', 'sAS', '9999999999', '2016-03-29 10:28:30');
