/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.12-MariaDB : Database - webcms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`webcms` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `webcms`;

/*Table structure for table `admin_menu_items` */

DROP TABLE IF EXISTS `admin_menu_items`;

CREATE TABLE `admin_menu_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT 0,
  `sort` int(11) NOT NULL DEFAULT 0,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu` bigint(20) unsigned NOT NULL,
  `depth` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_menu_items_menu_foreign` (`menu`),
  CONSTRAINT `admin_menu_items_menu_foreign` FOREIGN KEY (`menu`) REFERENCES `admin_menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admin_menu_items` */

insert  into `admin_menu_items`(`id`,`label`,`link`,`parent`,`sort`,`class`,`menu`,`depth`,`created_at`,`updated_at`) values 
(1,'Home','https://tonscoindo.com',0,0,NULL,1,0,'2020-04-21 00:24:17','2020-04-21 01:01:26'),
(2,'Product & Services','https://tonscoindo.com/services',0,1,NULL,1,0,'2020-04-21 00:24:52','2020-04-22 14:21:38'),
(3,'Projects','#',0,2,NULL,1,0,'2020-04-21 00:25:17','2020-04-22 14:21:38'),
(6,'Contact Us','https://tonscoindo.com/contact-us',0,17,NULL,1,0,'2020-04-21 00:26:09','2020-04-22 14:21:46'),
(8,'Pigging','https://tonscoindo.com/projects/pigging',3,3,NULL,1,1,'2020-04-21 00:28:54','2020-04-22 14:21:38'),
(9,'Habitat','https://tonscoindo.com/projects/habitat',3,4,NULL,1,1,'2020-04-21 00:29:07','2020-04-22 14:21:38'),
(11,'Our Commitment','#',0,8,NULL,1,0,'2020-04-21 00:32:46','2020-04-22 14:21:39'),
(12,'GCG Policies','https://tonscoindo.com/gcg-policies',16,10,NULL,1,2,'2020-04-21 00:35:12','2020-04-22 14:21:39'),
(13,'Code Of Conduct','https://tonscoindo.com/coc',16,11,NULL,1,2,'2020-04-21 00:35:26','2020-04-22 14:21:39'),
(14,'Safe Operations','https://tonscoindo.com/safety',17,13,NULL,1,2,'2020-04-21 00:36:01','2020-04-22 14:21:51'),
(15,'HSE Policy','https://tonscoindo.com/hse-policy',17,15,NULL,1,2,'2020-04-21 00:36:25','2020-04-22 14:21:46'),
(16,'Ethics & Governance','#',11,9,NULL,1,1,'2020-04-21 00:37:06','2020-04-22 14:21:39'),
(17,'Safety & Health','#',11,12,NULL,1,1,'2020-04-21 00:37:51','2020-04-22 14:21:39'),
(18,'Career','https://tonscoindo.com/career',0,16,NULL,1,0,'2020-04-21 01:00:08','2020-04-22 14:21:46'),
(19,'Hot Tapping','https://tonscoindo.com/hot-tap',3,6,NULL,1,1,'2020-04-21 01:10:42','2020-04-22 14:21:39'),
(20,'Cold Cutting','https://tonscoindo.com/cold-cutting',3,5,NULL,1,1,'2020-04-21 01:10:53','2020-04-22 14:21:39'),
(21,'Underwater Services','https://tonscoindo.com/underwater-services',3,7,NULL,1,1,'2020-04-21 01:11:13','2020-04-22 14:21:39'),
(22,'eInvoice','https://mail.tonscoindo.com',0,0,NULL,3,0,'2020-04-21 23:56:32','2020-04-22 13:54:19'),
(23,'Blog','https://tonscoindo.com/blog',0,1,NULL,3,0,'2020-04-21 23:56:55','2020-04-22 13:54:07'),
(24,'About Us','https://tonscoindo.com/about-us',0,0,NULL,2,0,'2020-04-21 23:57:23','2020-04-22 13:38:40'),
(25,'Services','https://tonscoindo.com/services',0,1,NULL,2,0,'2020-04-21 23:57:47','2020-04-21 23:57:56'),
(26,'Projects','https://tonscoindo.com/projects',0,2,NULL,2,0,'2020-04-21 23:57:55','2020-04-21 23:58:26'),
(28,'Contact','https://tonscoindo.com/contact',0,1,NULL,4,0,'2020-04-22 13:36:34','2020-04-22 13:37:42'),
(29,'Portofolio','https://tonscoindo.com/portofolio',0,2,NULL,4,0,'2020-04-22 13:36:55','2020-04-22 13:37:42'),
(30,'Team','https://tonscoindo.com/team',0,3,NULL,4,0,'2020-04-22 13:37:18','2020-04-22 13:37:42'),
(31,'Products','https://tonscoindo.com/product',0,0,NULL,4,0,'2020-04-22 13:37:39','2020-04-22 13:37:42'),
(32,'eInvoice','https://e-invoice.tonscoindo.com',0,3,NULL,2,0,'2020-04-22 13:53:41','2020-04-22 13:53:41'),
(33,'Healthy Working Environment','https://tonscoindo.com/health',17,14,NULL,1,2,'2020-04-22 14:21:38','2020-04-22 14:21:51');

/*Table structure for table `admin_menus` */

DROP TABLE IF EXISTS `admin_menus`;

CREATE TABLE `admin_menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admin_menus` */

insert  into `admin_menus`(`id`,`name`,`created_at`,`updated_at`) values 
(1,'Main Menu','2020-04-21 00:23:35','2020-04-21 00:23:35'),
(2,'Footer Menu','2020-04-21 00:51:28','2020-04-21 00:51:28'),
(3,'Top Menu','2020-04-21 23:55:59','2020-04-21 23:55:59'),
(4,'Usefull Link','2020-04-22 13:36:08','2020-04-22 13:36:08');

/*Table structure for table `banners` */

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `webmaster_banner_id` int(11) NOT NULL DEFAULT 0,
  `section_id` int(11) NOT NULL DEFAULT 0,
  `banner_slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_subtitle` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_title` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_class` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_delay` double(10,3) NOT NULL DEFAULT 0.000,
  `data_class` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_description` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_meta` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_meta_description` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_abstract` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `banners` */

insert  into `banners`(`id`,`webmaster_banner_id`,`section_id`,`banner_slug`,`banner_subtitle`,`banner_title`,`title_class`,`data_delay`,`data_class`,`banner_description`,`page_content`,`banner_meta`,`banner_meta_description`,`banner_abstract`,`banner_image`,`status`,`created_at`,`updated_at`) values 
(1,1,0,'teting-sluig','PHE ONWJ Pigging Project','Welcome to<br>Tonsco International',NULL,0.000,NULL,'<p>adsadada</p>',NULL,'AASDASASDA AD ASDAD,ADS ADSADAD','ASDADAS','<p>dadadaDASD</p>','15873558024087.jpg',0,'2020-04-20 04:10:03','2020-04-23 08:34:41'),
(2,1,0,'phe-onwj-br-ili-project','ILI Run 32\" Cilamaya Project','PHE ONWJ <br>ILI Project',NULL,0.000,NULL,'<p>sda</p>',NULL,'ILI, UT','asda','<p>asd</p>','15876310922402.jpg',0,'2020-04-23 08:38:13','2020-04-23 08:38:13'),
(3,1,0,'otm-project','Survey Oil Tank','OTM Project',NULL,0.000,NULL,'<p>asdad</p>',NULL,'oil tank, survey','asdadada','<p>adsadas</p>','15876329974151.jpg',0,'2020-04-23 09:09:57','2020-04-23 09:09:57'),
(4,2,1,'intelligent','Intelligent','Pigging','text-black',0.600,'bg-white','<p>BP First time run on Intelligent Pigging with Tonsco International in Sorong Site</p>','<p>asdadadadadadada</p>','adsad','asdadsada','<p>asd</p>','15876500837177.jpg',0,'2020-04-23 13:54:43','2020-04-23 13:54:43'),
(5,2,2,'inspection','Inspection','Habitat Project',NULL,0.800,'bg-secondary text-white','<p>Inspection Project at ONWJ Field Subang</p>','<p>asdada</p>','asda','adsadada','<p>asdad</p>','15876503135417.jpg',0,'2020-04-23 13:58:33','2020-04-23 13:58:33'),
(6,2,3,'ep-cold-cutting','EP Cold Cutting','Project',NULL,0.800,'bg-primary text-white','<p>cold cutting</p>','<p>asdad</p>','asd','asd',NULL,'15876503976347.jpg',0,'2020-04-23 13:59:57','2020-04-23 13:59:57'),
(7,2,4,'ep-cold-cutting-1','Hot Tapp','Project',NULL,0.800,'bg-primary text-white','<p>cold cutting</p>','<p>asdad</p>','asd','asd','<p>asdad</p>','15876505266911.jpg',0,'2020-04-23 13:59:58','2020-04-23 14:02:06'),
(8,2,5,'laying-cable-phe30','Laying Cable PHE30','PHE WMO Project','text-black',0.200,'bg-white','<p>Laying Cable Project with underwater Company</p>',NULL,'adasd','adadada','<p>asda</p>','15876512659379.jpg',0,'2020-04-23 14:14:25','2020-04-23 14:14:25');

/*Table structure for table `careers` */

DROP TABLE IF EXISTS `careers`;

CREATE TABLE `careers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `position` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `careers` */

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clients_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `clients` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(4,'2020_04_17_105713_create_clients_table',1),
(5,'2020_04_17_110403_create_banners_table',1),
(6,'2020_04_17_110425_create_testimonis_table',1),
(7,'2020_04_17_110703_create_webmasters_table',1),
(8,'2020_04_17_110719_create_webmaster_hours_table',1),
(9,'2020_04_17_110730_create_webmaster_socials_table',1),
(10,'2020_04_17_125102_create_sections_table',1),
(11,'2020_04_17_125410_create_webmaster_sections_table',1),
(12,'2020_04_17_153544_create_webmaster_documents_table',1),
(13,'2020_04_17_155354_create_webmaster_banners_table',1),
(14,'2020_04_17_161820_create_visitors_table',1),
(15,'2020_04_19_105447_add_fieldwebmasterid_to_webmaster_sections',2),
(16,'2020_04_19_121830_add_fieldiconname_to_webmaster_sections',3),
(17,'2020_04_19_124436_add_fieldiconname_to_webmaster_socials',4),
(18,'2020_04_19_165411_add_fieldimage_to_banners',5),
(19,'2020_04_19_165535_change_fieldflagtosection_to_banners',5),
(20,'2020_04_20_013059_change_columnsection_to_banners',6),
(21,'2017_08_11_073824_create_menus_wp_table',7),
(22,'2017_08_11_074006_create_menu_items_wp_table',7),
(24,'2020_04_21_105228_create_permissions_table',8),
(25,'2020_04_21_111351_add_fieldpermission_to_users',8),
(28,'2020_04_22_005557_change_fieldsectionname_to_webmaster_sections',9),
(29,'2020_04_21_103747_create_careers_table',10),
(30,'2020_04_22_150954_add_fieldlogo_to_webmasters',11),
(33,'2020_04_17_104831_create_pages_table',12),
(34,'2020_04_23_082544_add_fieldbanner_to_banners',13),
(35,'2020_04_23_131535_add_fieldbannerdetail_to_banners',14),
(36,'2020_04_23_131953_add_fieldsection_to_banners',15);

/*Table structure for table `pages` */

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_item_id` int(11) NOT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_2` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_class` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_delay` double(10,3) NOT NULL DEFAULT 0.000,
  `data_class` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_content` varchar(140) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id` int(11) NOT NULL DEFAULT 0,
  `page_date` date DEFAULT NULL,
  `photo_filename` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_meta` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_description` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_abstract` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_visit` int(11) NOT NULL DEFAULT 0,
  `client_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pages` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add` int(11) NOT NULL DEFAULT 0,
  `edit` int(11) NOT NULL DEFAULT 0,
  `delete` int(11) NOT NULL DEFAULT 0,
  `banner_status` int(11) NOT NULL DEFAULT 0,
  `setting_status` int(11) NOT NULL DEFAULT 0,
  `webmaster_status` int(11) NOT NULL DEFAULT 0,
  `data` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`add`,`edit`,`delete`,`banner_status`,`setting_status`,`webmaster_status`,`data`,`status`,`created_at`,`updated_at`) values 
(1,'Web Admin',1,1,1,1,1,1,'21,20,19,18,15,14,13,12,10,9,8,7,6,5,3,2,1',0,'2020-04-21 12:39:07','2020-04-21 12:39:07'),
(3,'Pump Author',0,0,0,1,0,0,'7',0,'2020-04-21 12:41:05','2020-04-21 12:41:05'),
(4,'HR Author',1,1,0,0,0,0,'18',0,'2020-04-21 12:41:20','2020-04-21 12:41:20'),
(5,'Project Author',1,1,0,1,0,0,'21,20,19,10,9,8,3',0,'2020-04-21 12:42:01','2020-04-21 12:42:01'),
(6,'HSE Author',1,1,0,1,0,0,'15,14,13,12',0,'2020-04-21 12:42:17','2020-04-21 12:42:17');

/*Table structure for table `sections` */

DROP TABLE IF EXISTS `sections`;

CREATE TABLE `sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `webmaster_section_id` bigint(20) NOT NULL,
  `row_no` int(11) NOT NULL DEFAULT 0,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visit` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sections` */

insert  into `sections`(`id`,`webmaster_section_id`,`row_no`,`name`,`photo`,`icon`,`visit`,`status`,`created_at`,`updated_at`) values 
(1,1,0,'Pigging',NULL,NULL,0,0,'2020-04-22 17:16:24','2020-04-22 17:16:24'),
(2,1,0,'Habitat',NULL,NULL,0,0,'2020-04-22 17:16:41','2020-04-22 17:16:41'),
(3,1,0,'Cold Cutting',NULL,NULL,0,0,'2020-04-22 17:16:51','2020-04-22 17:16:51'),
(4,1,0,'Hot Tapping',NULL,NULL,0,0,'2020-04-22 17:17:03','2020-04-22 17:17:03'),
(5,1,0,'Underwater Services',NULL,NULL,0,0,'2020-04-22 17:17:15','2020-04-22 17:17:15'),
(6,1,0,'Pump',NULL,NULL,0,0,'2020-04-22 17:17:27','2020-04-22 17:17:27'),
(7,1,0,'Man Power',NULL,NULL,0,0,'2020-04-22 17:17:42','2020-04-22 17:17:42');

/*Table structure for table `testimonis` */

DROP TABLE IF EXISTS `testimonis`;

CREATE TABLE `testimonis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) NOT NULL,
  `testimoni_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `testimonis` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`permission_id`,`name`,`username`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,1,'Eko Budi','viscamarisca','budi2283@gmail.com','2020-04-19 05:37:21','$2y$10$iwNQjU7QcmHSHJIID1skaeJOguvPPctZjMfyiYfZvv8qo7RyucePm',NULL,'2020-04-19 05:37:26','2020-04-19 05:37:28'),
(5,4,'F MPD','finance','finance.globalmpd@gmail.com',NULL,'$2y$10$G/FQF/T.TalMk0ji8fNDWuhUuM5t5P97lotRlcvkgPH.V0EHz6B.q','5M9bnxMItSWEx7gP','2020-04-21 23:37:04','2020-04-21 23:37:04');

/*Table structure for table `visitors` */

DROP TABLE IF EXISTS `visitors`;

CREATE TABLE `visitors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `visitors` */

/*Table structure for table `webmaster_banners` */

DROP TABLE IF EXISTS `webmaster_banners`;

CREATE TABLE `webmaster_banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `webmaster_id` bigint(20) NOT NULL,
  `row_no` int(11) NOT NULL DEFAULT 0,
  `banner_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_type` int(11) NOT NULL DEFAULT 0,
  `width` int(11) NOT NULL DEFAULT 0,
  `height` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `webmaster_banners` */

insert  into `webmaster_banners`(`id`,`webmaster_id`,`row_no`,`banner_name`,`banner_type`,`width`,`height`,`status`,`created_at`,`updated_at`) values 
(1,1,1,'homeSliderRevolution',1,1920,982,0,'2020-04-19 09:33:18','2020-04-23 14:37:19'),
(2,1,2,'homeTextThumbnail',0,900,550,0,'2020-04-19 09:36:29','2020-04-23 14:38:01'),
(3,1,3,'blogImage',1,700,500,0,'2020-04-22 14:51:48','2020-04-22 14:51:48');

/*Table structure for table `webmaster_documents` */

DROP TABLE IF EXISTS `webmaster_documents`;

CREATE TABLE `webmaster_documents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `webmaster_id` bigint(20) NOT NULL,
  `document_id` int(11) NOT NULL,
  `description` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_filename` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `webmaster_documents` */

insert  into `webmaster_documents`(`id`,`webmaster_id`,`document_id`,`description`,`document_filename`,`status`,`created_at`,`updated_at`) values 
(4,1,0,'Company Profile','companyProfile20200419140826.pdf',0,'2020-04-19 14:07:53','2020-04-19 14:08:26');

/*Table structure for table `webmaster_hours` */

DROP TABLE IF EXISTS `webmaster_hours`;

CREATE TABLE `webmaster_hours` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `webmaster_id` bigint(20) NOT NULL,
  `hour_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hour_desc` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `webmaster_hours` */

insert  into `webmaster_hours`(`id`,`webmaster_id`,`hour_name`,`hour_desc`,`status`,`created_at`,`updated_at`) values 
(1,1,'Mon - Fri','08:00 - 17:00',0,'2020-04-19 12:00:56','2020-04-19 12:01:51');

/*Table structure for table `webmaster_sections` */

DROP TABLE IF EXISTS `webmaster_sections`;

CREATE TABLE `webmaster_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_item_id` int(11) NOT NULL,
  `webmaster_id` int(11) NOT NULL DEFAULT 0,
  `row_no` int(11) NOT NULL DEFAULT 0,
  `section_description` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_type` int(11) NOT NULL DEFAULT 0,
  `section_category` int(11) NOT NULL DEFAULT 0,
  `icon_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `webmaster_sections` */

insert  into `webmaster_sections`(`id`,`menu_item_id`,`webmaster_id`,`row_no`,`section_description`,`section_type`,`section_category`,`icon_name`,`status`,`created_at`,`updated_at`) values 
(1,2,1,1,'Website Content Management Sistem',0,2,'far fa-newspaper',0,'2020-04-19 11:04:37','2020-04-22 14:23:52'),
(7,1,1,2,'Index',0,0,'fas fa-home',0,'2020-04-22 01:46:55','2020-04-22 01:46:55');

/*Table structure for table `webmaster_socials` */

DROP TABLE IF EXISTS `webmaster_socials`;

CREATE TABLE `webmaster_socials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `webmaster_id` bigint(20) NOT NULL,
  `social_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_uuid` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_codename` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `webmaster_socials` */

insert  into `webmaster_socials`(`id`,`webmaster_id`,`social_name`,`social_uuid`,`social_codename`,`icon_name`,`status`,`created_at`,`updated_at`) values 
(1,1,'Facebook','uid','$','fa fa-facebook',0,'2020-04-19 12:41:45','2020-04-19 12:43:59'),
(2,1,'Youtube','#','#','fa fa-youtube',0,'2020-04-19 12:43:36','2020-04-19 12:43:36');

/*Table structure for table `webmasters` */

DROP TABLE IF EXISTS `webmasters`;

CREATE TABLE `webmasters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double(10,6) NOT NULL DEFAULT 0.000000,
  `longitude` double(10,6) NOT NULL DEFAULT 0.000000,
  `image_logo` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `webmasters` */

insert  into `webmasters`(`id`,`name`,`description`,`email`,`website`,`phone_no`,`mobile_no`,`address`,`city`,`state`,`country`,`postal_code`,`latitude`,`longitude`,`image_logo`,`status`,`created_at`,`updated_at`) values 
(1,'tonscoInternational','<p>Tonsco International is nasional company established from 2004.</p>','info@tonscoindo.com','tonscoindo.com','+62 21 2923 7052','+62 812 ...','Ruko Bona Business Center No 8J\r\n <br>Jl. Karangtengah Raya, Lebak Bulus, <br>Jakarta Selatan','Jakarta Selatan','DKI Jakarta','Indonesia','12440',-6.301963,106.781535,NULL,0,'2020-04-19 07:00:23','2020-04-22 15:11:05');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
