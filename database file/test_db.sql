/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.24-MariaDB : Database - test_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`test_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `test_db`;

/*Table structure for table `tbl_persons` */

DROP TABLE IF EXISTS `tbl_persons`;

CREATE TABLE `tbl_persons` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) DEFAULT NULL,
  `mname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `bday` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `date_added_modified` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_persons` */

insert  into `tbl_persons`(`id`,`fname`,`mname`,`lname`,`bday`,`gender`,`date_added_modified`) values 
(2,'Loydi','Capuli','Consolacion','2000-07-08','Male','July 25, 2022 at 07:38:48 PM'),
(4,'Momo','C','Hirai','1999-06-30','Female','July 24, 2022 at 09:43:28 PM'),
(6,'Mina','C','Myoui','2000-07-01','Female','July 25, 2022 at 02:42:10 PM'),
(8,'Danielo','Capuli','Consolacion','2000-06-30','Male','July 25, 2022 at 07:36:39 PM'),
(9,'Dahyun','C','Kim','1998-07-30','Female','July 25, 2022 at 07:42:44 PM');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id`,`username`,`password`) values 
(1,'admin','21232f297a57a5a743894a0e4a801fc3');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
