# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.29)
# Database: campusvisit_dev
# Generation Time: 2013-05-22 21:20:32 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table AuthAssignment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `AuthAssignment`;

CREATE TABLE `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `AuthAssignment` WRITE;
/*!40000 ALTER TABLE `AuthAssignment` DISABLE KEYS */;

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`)
VALUES
	('admin','admin',NULL,'N;');

/*!40000 ALTER TABLE `AuthAssignment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table AuthItem
# ------------------------------------------------------------

DROP TABLE IF EXISTS `AuthItem`;

CREATE TABLE `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `AuthItem` WRITE;
/*!40000 ALTER TABLE `AuthItem` DISABLE KEYS */;

INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`)
VALUES
	('admin',2,NULL,NULL,'N;'),
	('Authenticated',2,NULL,NULL,'N;'),
	('Guest',2,NULL,NULL,'N;');

/*!40000 ALTER TABLE `AuthItem` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table AuthItemChild
# ------------------------------------------------------------

DROP TABLE IF EXISTS `AuthItemChild`;

CREATE TABLE `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table blackout_event
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blackout_event`;

CREATE TABLE `blackout_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table blackout_schedule
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blackout_schedule`;

CREATE TABLE `blackout_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `date` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `blackout_schedule` WRITE;
/*!40000 ALTER TABLE `blackout_schedule` DISABLE KEYS */;

INSERT INTO `blackout_schedule` (`id`, `date`, `schedule_id`, `status`)
VALUES
	(1,'2013-05-25',12,3),
	(2,'2013-05-24',4,1),
	(3,'2013-05-23',5,2),
	(4,'2013-05-21',2,1),
	(13,'2013-07-17',1,1);

/*!40000 ALTER TABLE `blackout_schedule` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table event
# ------------------------------------------------------------

DROP TABLE IF EXISTS `event`;

CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `coordinator_name` varchar(255) DEFAULT NULL,
  `coordinator_email` varchar(255) DEFAULT NULL,
  `coordinator_phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;

INSERT INTO `event` (`id`, `name`, `coordinator_name`, `coordinator_email`, `coordinator_phone`)
VALUES
	(1,'event1',NULL,NULL,NULL),
	(2,'event2',NULL,NULL,NULL),
	(3,'event3',NULL,NULL,NULL),
	(4,'event4',NULL,NULL,NULL),
	(5,'event5',NULL,NULL,NULL),
	(6,'event6',NULL,NULL,NULL),
	(7,'e1',NULL,NULL,NULL),
	(8,'e2',NULL,NULL,NULL),
	(9,'e3',NULL,NULL,NULL),
	(10,'eventA',NULL,NULL,NULL),
	(11,'eventB',NULL,NULL,NULL),
	(12,'eventC',NULL,NULL,NULL);

/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table event_option
# ------------------------------------------------------------

DROP TABLE IF EXISTS `event_option`;

CREATE TABLE `event_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `event_option` WRITE;
/*!40000 ALTER TABLE `event_option` DISABLE KEYS */;

INSERT INTO `event_option` (`id`, `name`)
VALUES
	(6,'1'),
	(7,'2'),
	(8,'3'),
	(12,'a1'),
	(13,'a2'),
	(14,'a3'),
	(1,'option1'),
	(2,'option2'),
	(3,'option3'),
	(4,'option4'),
	(5,'option5'),
	(9,'x'),
	(10,'y'),
	(11,'z');

/*!40000 ALTER TABLE `event_option` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table event_option_event
# ------------------------------------------------------------

DROP TABLE IF EXISTS `event_option_event`;

CREATE TABLE `event_option_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `event_option_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `event_option_event` WRITE;
/*!40000 ALTER TABLE `event_option_event` DISABLE KEYS */;

INSERT INTO `event_option_event` (`id`, `event_id`, `event_option_id`)
VALUES
	(1,1,1),
	(2,1,2),
	(3,3,3),
	(4,3,4),
	(5,3,5),
	(6,7,6),
	(7,7,7),
	(8,7,8),
	(9,8,9),
	(10,8,10),
	(11,8,11),
	(12,9,12),
	(13,9,13),
	(14,9,14);

/*!40000 ALTER TABLE `event_option_event` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table event_schedule
# ------------------------------------------------------------

DROP TABLE IF EXISTS `event_schedule`;

CREATE TABLE `event_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schedule_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `optional` tinyint(1) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `event_schedule` WRITE;
/*!40000 ALTER TABLE `event_schedule` DISABLE KEYS */;

INSERT INTO `event_schedule` (`id`, `schedule_id`, `event_id`, `optional`, `start_time`, `end_time`)
VALUES
	(1,1,2,0,'09:00:00','00:00:00'),
	(2,1,4,0,'08:00:08','00:00:00'),
	(3,1,5,1,'13:00:00','00:00:00'),
	(4,1,6,1,'13:00:00','00:00:00'),
	(5,2,3,0,'09:30:00','10:00:00'),
	(6,1,1,0,'12:00:00','00:00:00'),
	(8,5,7,0,'00:00:00','00:00:00'),
	(11,5,10,1,'00:00:00','00:00:00'),
	(12,5,11,1,'00:00:00','00:00:00'),
	(13,5,12,1,'00:00:00','00:00:00'),
	(14,4,7,0,'00:00:00','00:00:00');

/*!40000 ALTER TABLE `event_schedule` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table group_reservation
# ------------------------------------------------------------

DROP TABLE IF EXISTS `group_reservation`;

CREATE TABLE `group_reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schedule_id` int(11) NOT NULL,
  `schedule_option_id` int(11) NOT NULL,
  `event_option_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `visitors_num` int(11) NOT NULL,
  `audits_num` int(11) NOT NULL,
  `total_num` int(11) NOT NULL,
  `lunch_payment` varchar(255) NOT NULL,
  `bus_parking` tinyint(1) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `date` (`date`,`schedule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `group_reservation` WRITE;
/*!40000 ALTER TABLE `group_reservation` DISABLE KEYS */;

INSERT INTO `group_reservation` (`id`, `schedule_id`, `schedule_option_id`, `event_option_id`, `date`, `name`, `type_id`, `type_name`, `visitors_num`, `audits_num`, `total_num`, `lunch_payment`, `bus_parking`, `bus_name`, `first_name`, `last_name`, `email`, `phone`, `address`, `city`, `state`, `zipcode`)
VALUES
	(1,2,0,3,'2013-05-25','123',3,'',32,1,1,'School Payment',0,'','Baibing','Zheng','whiterice@live.cn','9796760721','401 Anderson St','College Station','TX',77840),
	(2,2,0,3,'2013-05-21','123',4,'',44,2,3,'School Payment',1,'baibing z','baibing','z','whiterice@live.cn','9796760721','401 Anderson St','College Station','TX',77840),
	(10,1,4,4,'2013-07-17','32',21,'baibing group type',43,1,1,'School Payment',1,'Baibing Zheng','Baibing','Zheng','whiterice@live.cn','9796760721','401 Anderson St','College Station','TX',77840);

/*!40000 ALTER TABLE `group_reservation` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table group_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `group_type`;

CREATE TABLE `group_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `group_type` WRITE;
/*!40000 ALTER TABLE `group_type` DISABLE KEYS */;

INSERT INTO `group_type` (`id`, `name`)
VALUES
	(4,'6th Grade and Below'),
	(3,'7th Grade'),
	(2,'8th Grade'),
	(1,'9th - 12th Grade'),
	(5,'After School Club'),
	(6,'Aggie Affiliated Club or Organization'),
	(7,'Business Representatives'),
	(9,'Church Adult Group'),
	(8,'Church Youth Group'),
	(10,'College Transfer Students'),
	(11,'Conference/Workshop Attendees'),
	(12,'Elected Officials'),
	(13,'Former Students'),
	(14,'Governmental Official'),
	(15,'Non-profit Organization'),
	(21,'Other'),
	(16,'Prospective Graduate Students'),
	(17,'Senior Citizens Group'),
	(18,'Tourist Group'),
	(19,'University Department Guests'),
	(20,'University Faculty/Staff');

/*!40000 ALTER TABLE `group_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Rights
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Rights`;

CREATE TABLE `Rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`),
  CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table schedule
# ------------------------------------------------------------

DROP TABLE IF EXISTS `schedule`;

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `public` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;

INSERT INTO `schedule` (`id`, `name`, `public`)
VALUES
	(1,'Schedule 1',1),
	(2,'Schedule 2',1),
	(3,'Tour Only',1),
	(4,'Schedule 3',0),
	(5,'S1',1);

/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_migration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_migration`;

CREATE TABLE `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_migration` WRITE;
/*!40000 ALTER TABLE `tbl_migration` DISABLE KEYS */;

INSERT INTO `tbl_migration` (`version`, `apply_time`)
VALUES
	('m000000_000000_base',1366060859),
	('m130415_201730_event',1366405421),
	('m130415_203545_schedule',1366746339),
	('m130415_203814_event_schedule',1366746339),
	('m130415_203837_blackout_event',1366746339),
	('m130415_203844_blackout_schedule',1366746339),
	('m130415_210845_user',1366746339),
	('m130419_205324_group_type',1366746340),
	('m130419_205404_event_option',1366746340),
	('m130419_205441_event_option_event',1366746340),
	('m130419_205454_group_reservation',1366754615),
	('m130423_193056_group_type_insert',1366754615);

/*!40000 ALTER TABLE `tbl_migration` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
