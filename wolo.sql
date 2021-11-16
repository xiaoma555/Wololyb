/*
SQLyog Enterprise - MySQL GUI v6.15
MySQL - 5.5.5-10.1.38-MariaDB : Database - wolo1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `wolo`;

USE `wolo`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Pwd` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`adminId`,`adminName`,`Pwd`) values (1,'zzz','202cb962ac59075b964b07152d234b70'),(2,'mwh','202cb962ac59075b964b07152d234b70'),(3,'zj','202cb962ac59075b964b07152d234b70'),(4,'wht','202cb962ac59075b964b07152d234b70');

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `messageId` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `face` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.jpg',
  `sh` smallint(6) NOT NULL DEFAULT '0',
  `reply` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addTime` datetime NOT NULL,
  PRIMARY KEY (`messageId`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `message` */

insert  into `message`(`messageId`,`author`,`content`,`face`,`sh`,`reply`,`addTime`) values (1,'春天','在春季，地球的北半球开始倾向太阳，受到越来越多的太阳光直射，因而气温开始升高。春季植物开始发芽生长，许多鲜花开放。冬眠的动物苏醒，许多以卵过冬的动物孵化，鸟类开始迁徙，离开越冬地向繁殖地进发。许多动物在这段时间里发情，因此中国也将春季称为“万物复苏”的季节。于热空气开始北移，而冷空气还往往依然徘徊，此外土地、水域与空气温度上升的速度不同。','0.jpg',1,'ok','2021-10-10 00:00:00'),(2,'夏天','夏季是阴阳二气相争的时节，阳动于上、阴迫于下。夏季阳气盛，仲夏尤甚，仲夏午月纯阳正气，乃阴邪所惧。夏季分为孟夏、仲夏、季夏三个时间阶段。如果按公历，大概孟夏是5月，仲夏是6月，季夏是7月。因为夏至那一天太阳直射点在北回归线，夏至总在公历6月21日或者22日。','2.jpg',1,'嗯啊','2021-10-10 00:00:00'),(3,'秋天','立秋并不代表炎热的夏天即将过去，立秋还在暑热时段，尚未出暑，秋季第二个节气（处暑）才出暑，初秋期间天气仍然很热。所谓“热在三伏”，按照“三伏”的推算方法，立秋至处暑往往还处在“三伏”期间，所以初秋天气还很热，真正凉爽一般要到白露节气之后。热与凉的分水岭在秋季，并不是在夏秋之交。秋天的气候分为两个阶段，初秋“闷热”，仲秋后趋向“干燥”、“凉爽”气候特征。','4.jpg',1,'还真是','2021-10-10 00:00:00'),(4,'冬天','“立冬”意味着风雨、湿度、光照、气温等，处于转折点上，从秋季渐向冬季气候过渡。冬季太阳直射点向南移动到南回归线，再折回向北。立冬时节，太阳已到达黄经225度，地球位于赤纬-16°19\'，北半球的太阳高度变小，白昼时间缩短，北半球获得太阳的辐射量越来越少，但由于此时地表在下半年贮存的热量还有一定的能量，所以还不很冷。','13.jpg',1,'你说得对','2021-10-09 00:00:00'),(18,'马冬梅','123','0.jpg',1,'456','2021-10-16 14:41:55'),(20,'游客','123','0.jpg',0,NULL,'2021-10-16 15:01:11');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
