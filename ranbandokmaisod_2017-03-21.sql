# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.17)
# Database: ranbandokmaisod
# Generation Time: 2017-03-21 01:31:21 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `name_en` varchar(150) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `order` int(3) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;

INSERT INTO `menus` (`id`, `name`, `name_en`, `url`, `status`, `order`, `created_at`, `updated_at`, `updated_by`)
VALUES
	(1,'หน้าหลัก','Home','',1,1,NULL,NULL,1),
	(2,'หน้าร้านค้า','Shop Page','shop',0,2,NULL,NULL,1),
	(3,'สินค้า','Single product','product',1,3,NULL,NULL,1),
	(4,'ตะกร้าสินค้า','ตะกร้าสินค้า','cart',1,4,NULL,NULL,1),
	(5,'Checkout','Checkout','checkout',1,5,NULL,NULL,1),
	(6,'Category','Category','category',1,6,NULL,NULL,1),
	(7,'Others','Others','others',1,7,NULL,NULL,1),
	(8,'Contact','Contact','contact',1,8,NULL,NULL,1);

/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sliders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sliders`;

CREATE TABLE `sliders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `url_type` int(2) DEFAULT '1',
  `url_target` varchar(20) DEFAULT NULL,
  `button_name` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `order` int(3) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;

INSERT INTO `sliders` (`id`, `name`, `title`, `subtitle`, `image`, `url`, `url_type`, `url_target`, `button_name`, `status`, `order`, `created_at`, `updated_at`, `updated_by`)
VALUES
	(1,' รับจัดดอกไม้สด','รับจัด <span class=\"primary\">ดอกไม้ <strong>สด</strong></span>','ทั้งในและนอกสถานที่','public/demo/ustora/img/slid/01.png','slider01',1,'_BANK','รายละเอียด',1,1,NULL,NULL,1),
	(2,'บริการให้เช่าเก้าอี้ โต๊ะ','บริการให้เช่าเก้าอี้ โต๊ะ','จัดงานทุกประเภท ทั้งในและนอกสถานที','public/demo/ustora/img/h4-slide2.png','slider02',1,'','รายละเอียด',1,2,NULL,NULL,1),
	(3,'test3','Apple <span class=\"primary\">Store <strong>Ipod</strong></span>','Select Item','public/demo/ustora/img/h4-slide3.png','slider03',1,'','รายละเอียด',1,3,NULL,NULL,1),
	(4,'test4','Apple <span class=\"primary\">Store <strong>Ipod</strong></span>','Select Item','public/demo/ustora/img/h4-slide4.png','slider04',1,'','รายละเอียด',1,4,NULL,NULL,1);

/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `first_name` varchar(150) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `gender` varchar(8) DEFAULT '',
  `birthday` date DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `uid_fb` bigint(20) DEFAULT NULL,
  `uid_g` int(11) DEFAULT NULL,
  `link_fb` varchar(255) DEFAULT NULL,
  `link_g` varchar(255) DEFAULT NULL,
  `access_token_fb` varchar(255) DEFAULT NULL,
  `access_token_g` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `locale` varchar(8) DEFAULT 'th_TH',
  `timezone` int(3) DEFAULT '7',
  `active` varchar(255) DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `u_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `password`, `name`, `first_name`, `last_name`, `gender`, `birthday`, `phone`, `photo`, `uid_fb`, `uid_g`, `link_fb`, `link_g`, `access_token_fb`, `access_token_g`, `remember_token`, `locale`, `timezone`, `active`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'admin@admin.com','5f4dcc3b5aa765d61d8327deb882cf99','admin','Admin','Admin','male','1970-01-01','','',0,NULL,'',NULL,'',NULL,'','th_TH',7,'1',1,'2017-03-01 23:58:31','2017-03-01 23:58:31');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
