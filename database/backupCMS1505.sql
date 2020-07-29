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
(1,'Home','http://127.0.0.1:8000',0,0,NULL,1,0,'2020-04-21 00:24:17','2020-04-21 01:01:26'),
(2,'Product & Services','http://127.0.0.1:8000/product-services',0,1,NULL,1,0,'2020-04-21 00:24:52','2020-04-22 14:21:38'),
(3,'Our Portofolio','http://127.0.0.1:8000/portofolio',0,2,NULL,1,0,'2020-04-21 00:25:17','2020-04-27 02:18:42'),
(6,'Contact Us','http://127.0.0.1:8000/contact',0,17,NULL,1,0,'2020-04-21 00:26:09','2020-04-22 14:21:46'),
(11,'Our Commitment','#',0,8,NULL,1,0,'2020-04-21 00:32:46','2020-04-22 14:21:39'),
(12,'GCG Policies','http://127.0.0.1:8000/gcg-policies',16,10,NULL,1,2,'2020-04-21 00:35:12','2020-04-22 14:21:39'),
(13,'Code Of Conduct','http://127.0.0.1:8000/coc',16,11,NULL,1,2,'2020-04-21 00:35:26','2020-04-22 14:21:39'),
(14,'Safe Operations','http://127.0.0.1:8000/safety',17,13,NULL,1,2,'2020-04-21 00:36:01','2020-04-22 14:21:51'),
(15,'HSE Policy','http://127.0.0.1:8000/hse-policy',17,15,NULL,1,2,'2020-04-21 00:36:25','2020-04-22 14:21:46'),
(16,'Ethics & Governance','#',11,9,NULL,1,1,'2020-04-21 00:37:06','2020-04-22 14:21:39'),
(17,'Safety & Health','#',11,12,NULL,1,1,'2020-04-21 00:37:51','2020-04-22 14:21:39'),
(18,'Career','http://127.0.0.1:8000/career',0,16,NULL,1,0,'2020-04-21 01:00:08','2020-04-22 14:21:46'),
(22,'eInvoice','https://mail.tonscoindo.com',0,0,NULL,3,0,'2020-04-21 23:56:32','2020-04-22 13:54:19'),
(23,'Blog','http://127.0.0.1:8000/blog',0,1,NULL,3,0,'2020-04-21 23:56:55','2020-04-22 13:54:07'),
(24,'About Us','http://127.0.0.1:8000/about-us',0,0,NULL,2,0,'2020-04-21 23:57:23','2020-04-22 13:38:40'),
(25,'Services','http://127.0.0.1:8000/product-services',0,1,NULL,2,0,'2020-04-21 23:57:47','2020-04-21 23:57:56'),
(28,'Contact','http://127.0.0.1:8000/contact',0,1,NULL,4,0,'2020-04-22 13:36:34','2020-04-22 13:37:42'),
(29,'Portofolio','http://127.0.0.1:8000/portofolio',0,2,NULL,4,0,'2020-04-22 13:36:55','2020-04-22 13:37:42'),
(31,'Products','http://127.0.0.1:8000/products',0,0,NULL,4,0,'2020-04-22 13:37:39','2020-04-22 13:37:42'),
(32,'eInvoice','https://e-invoice.tonscoindo.com',0,3,NULL,2,0,'2020-04-22 13:53:41','2020-04-22 13:53:41'),
(33,'Healthy Working Environment','http://127.0.0.1:8000/health',17,14,NULL,1,2,'2020-04-22 14:21:38','2020-04-22 14:21:51');

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
(1,1,0,'teting-sluig','Pigging Project','Welcome to<br>Tonsco International',NULL,0.000,NULL,'<p>adsadada</p>',NULL,'AASDASASDA AD ASDAD,ADS ADSADAD','ASDADAS','<p>dadadaDASD</p>','15873558024087.jpg',0,'2020-04-20 04:10:03','2020-04-25 10:42:47'),
(2,1,0,'phe-onwj-br-ili-project','ILI Run 32\" Cilamaya Project','ILI Project',NULL,0.000,NULL,'<p>sda</p>',NULL,'ILI, UT','asda','<p>asd</p>','15876310922402.jpg',0,'2020-04-23 08:38:13','2020-04-25 10:43:02'),
(3,1,0,'otm-project','Anode Survey & Installation','Underwater Project',NULL,0.000,NULL,'<p>asdad</p>',NULL,'oil tank, survey','asdadada','<p>adsadas</p>','15876329974151.jpg',0,'2020-04-23 09:09:57','2020-04-25 10:43:35'),
(4,2,1,'intelligent','Intelligent','Pigging','text-black',0.600,'bg-white','<p>BP First time run on Intelligent Pigging with Tonsco International in Sorong Site</p>','<p>asdadadadadadada</p>','adsad','asdadsada','<p>asd</p>','15876500837177.jpg',0,'2020-04-23 13:54:43','2020-04-23 13:54:43'),
(5,2,2,'inspection','Inspection','Habitat Project',NULL,0.800,'bg-secondary text-white','<p>Inspection Project at ONWJ Field Subang</p>','<p>asdada</p>','asda','adsadada','<p>asdad</p>','15876503135417.jpg',0,'2020-04-23 13:58:33','2020-04-23 13:58:33'),
(6,2,3,'ep-cold-cutting','EP Cold Cutting','Project',NULL,0.800,'bg-primary text-white','<p>cold cutting</p>','<p>asdad</p>','asd','asd',NULL,'15876503976347.jpg',0,'2020-04-23 13:59:57','2020-04-23 13:59:57'),
(7,2,4,'ep-cold-cutting-1','Hot Tapp','Project',NULL,0.800,'bg-primary text-white','<p>cold cutting</p>','<p>asdad</p>','asd','asd','<p>asdad</p>','15876505266911.jpg',0,'2020-04-23 13:59:58','2020-04-23 14:02:06'),
(8,1,5,'laying-cable-phe30','Laying Cable PHE30','PHE WMO Project','text-black',0.200,'bg-white','<p>Laying Cable Project with underwater Company</p>',NULL,'adasd','adadada','<p>asda</p>','15876512659379.jpg',0,'2020-04-23 14:14:25','2020-04-25 10:43:43');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `careers` */

insert  into `careers`(`id`,`position`,`job_desc`,`status`,`created_at`,`updated_at`) values 
(1,'IT Staff','<ol><li>Familiar with OS (<b>Windows, Unix, MacOS</b>)</li><li><b>Zimbra </b>Mail Server</li><li><b>Mikrotik</b></li><li>Have knowledge Server Virtualization(VMWare <b>vSphere</b>)</li><li>Cloud Data Management use <b>NextCloud</b></li><li>Document Management System base on <b>Laravel</b></li><li>Network &amp; PC Troubleshooting</li><li>Mail Server <b>Maintenance &amp; Monitoring</b></li><li>Have knowledge in <b>ERP </b>System.</li></ol>',0,'2020-04-29 13:15:02','2020-04-29 15:12:33'),
(2,'Tender Staff','<ol><li>Administration Document</li><li>Having knowledge tender management</li><li>Having knowledge civid</li><li>Oil &amp; Gas Industry</li><li>etc</li></ol>',0,'2020-04-29 13:41:59','2020-04-29 15:12:49');

/*Table structure for table `categorys` */

DROP TABLE IF EXISTS `categorys`;

CREATE TABLE `categorys` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `webmaster_section_id` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visit` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categorys` */

insert  into `categorys`(`id`,`webmaster_section_id`,`slug`,`name`,`description`,`photo`,`icon`,`visit`,`status`,`created_at`,`updated_at`) values 
(1,1,'pigging','Pigging','Pigging has been used for many years to clean large diameter pipelines in the oil industry. Today, however, the use of smaller diameter pigging systems is now increasing in many continuous and batch process plants as plant operators search for increased efficiencies and reduced costs.\r\n\r\nPigging can be used for almost any section of the transfer process between, for example, blending, storage or filling systems. Pigging systems are already installed in industries handling products as diverse as lubricating oils, paints, chemicals, toiletries, cosmetics and foodstuffs.\r\n\r\nPigs are used in lube oil or paint blending to clean the pipes to avoid cross-contamination, and to empty the pipes into the product tanks (or sometimes to send a component back to its tank). Usually pigging is done at the beginning and at the end of each batch, but sometimes it is done in the midst of a batch, such as when producing a premix that will be used as an intermediate component.\r\n\r\nPigs are also used in oil and gas pipelines to clean the pipes. There are also \"smart pigs\" used to inspect pipelines for the purpose of preventing leaks, which can be explosive and dangerous to the environment. They usually do not interrupt production, though some product can be lost when the pig is extracted. They can also be used to separate different products in a multiproduct pipeline.\r\n\r\nIf the pipeline contains butterfly valves, or reduced port ball valves, the pipeline cannot be pigged. Full port (or full bore) ball valves cause no problems because the inside diameter of the ball opening is the same as that of the pipe.',NULL,'flaticon-boiler',0,0,'2020-05-09 12:10:32','2020-05-14 21:10:11'),
(2,1,'habitat','Habitat','A positive pressure enclosure, also known as welding habitats or hot work habitats, is a chamber used to provide a safe work environment for performing hot work in the presence of explosive gases or vapours. They are used most often in conjunction with the need for welding, and are often associated with the offshore oil industry.\r\n\r\nA positive pressure enclosure works by providing a constant inflow of breathable atmosphere, which in turn causes gas to continuously leak out of the chamber. This outflow of gases prevents the ingress of explosive gases or vapours which are often present in such work locations. This constant outflow of gases from the chamber also serves to cleanse the air within of the undesirable gaseous by-products of the welding process. Most commercial versions of positive pressure enclosures are referred to by their manufacturers as habitats.\r\n\r\nThe qualities of good Indoor Air Quality should include comfortable temperature and humidity, adequate supply of fresh outdoor air, and control of pollutants from inside and outside of the Habitat. Indoor air quality (also called \"indoor environmental quality\") describes how inside air can affect a person\'s health, comfort, and ability to work. It can include temperature, humidity, lack of outside air (poor ventilation), mold from water damage, or exposure to other chemicals. Currently, OSHA has no indoor air quality (IAQ) standards but it does provide guidelines about the most common IAQ workplace complaints, the habitat technician need to provide daily practical solutions to ensure the worker inside habitat is safety and healthy.',NULL,'flaticon-welding-machine',0,0,'2020-05-09 12:13:19','2020-05-14 21:14:57'),
(3,1,'cold-cutting','Cold Cutting','Where the high temperatures and sources of ignition required by hot cutting are not desirable, air- or hydraulically-powered pipe cutting machines are used. These comprise a clamshell or chain-mounted cutting head holding a tool steel and feed mechanism which advances the tool a set amount per revolution round the pipe. Tools may be styled to cut and/or prepare the bevel for welding in a single or multiple passes.\r\n\r\nPopular in offshore, pipe processing, ship building, pressure vessel, structural and mechanical contracting manufacturing because of the complex cuts and profiles typical required in their respective industries. Some common pipe cutting applications are: pipe work, offshore jackets, industrial steel structures, stadiums, cranes, nozzles, and pipe laying stingers.',NULL,'flaticon-saw-machine',0,0,'2020-05-09 12:14:21','2020-05-14 21:15:30'),
(4,1,'hot-tapping','Hot Tapping','Hot tapping, or pressure tapping, is the method of making a connection to existing piping or pressure vessels without the interrupting or emptying of that section of pipe or vessel. This means that a pipe or tank can continue to be in operation whilst maintenance or modifications are being done to it. The process is also used to drain off pressurized casing fluids and add test points or various sensors such as temperature and pressure. Hot taps can range from a ½ inch hole designed for something as simple as quality control testing, up to a 48-inch tap for the installation of a variety of ports, valves, t-sections or other pipes.\r\n\r\nHot Tap Procedures:\r\n\r\nA. A hot tap saddle, service saddle or welded threadolet, valve installed, assembly is pressure tested and hot tap machine attached.\r\n\r\nB. Valve opened, hot tap completed, coupon or cut portion retained by latches on pilot drill. Pressure is contained within the hot tapping machine.\r\n\r\nC. Cutter and coupon retracted and valve closed. Fluid is drained and hot tapping machine is removed. The tapped valve is now ready for the contractor\'s tie-in or IFT\'s linestop/stopple equipment to be inserted.[3]\r\n\r\nHot tapping is also the first procedure in line stopping, where a hole saw is used to make an opening in the pipe, so a line plugging head can be inserted.\r\n\r\nSituations in which welding operations are prohibited on equipment which contains:\r\n\r\nMixtures of gases or vapours within their flammable range or which may become flammable as a result of heat input in welding operations.\r\nSubstances which may undergo reaction or decomposition leading to a dangerous increase in pressure, explosion or attack on metal. In this context, attention is drawn to the possibility that under certain combinations of concentration, temperature and pressure, acetylene, ethylene and other unsaturated hydrocarbons may decompose explosively, initiated by a welding hot spot.\r\nOxygen-enriched atmospheres in the presence of hydrocarbons which may be present either in the atmosphere or deposited on the inside surface of the equipment or pipe.\r\nCompressed air in the presence of hydrocarbons which may be present either in the air or deposited on the inside surfaces of the equipment or pipe.\r\nGaseous mixtures in which the partial pressure of hydrogen exceeds 700 kPa gauge, except where evidence from tests has demonstrated that hot-tapping can be done safely.\r\nBased on the above, welding on equipment or pipe which contains hazardous substances or conditions as listed below (even in small quantities) shall not be performed unless positive evidence has been obtained that welding/hot tapping can be applied safely.',NULL,'flaticon-oil-platform',0,0,'2020-05-09 12:14:53','2020-05-14 21:16:09'),
(5,1,'underwater-services','Underwater Services','We provide underwater work services with experienced personnel in their fields, besides that we also rent diving equipment, ROV etc',NULL,'flaticon-diving',0,0,'2020-05-09 12:18:12','2020-05-09 12:18:12'),
(6,1,'pump-fabrication','Pump Fabrication','We provide pump manufacturing, hydralic pump manufacturing and chemical pump manufacturing etc.',NULL,'flaticon-pump',0,0,'2020-05-09 12:19:12','2020-05-09 12:19:12');

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clients_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `clients` */

insert  into `clients`(`id`,`name`,`address`,`phone_no`,`city`,`website`,`logo`,`email`,`password`,`email_verified_at`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Pertamina Hulu Energi ONWJ','PHE Tower<br>\r\nLantai Mezanin - Lantai 10, Jalan Tb. Simatupang Kav. 99, RT.1/RW.1, Kebagusan','(021) 78839000','Jakarta Selatan','https://pheonwj.pertamina.com/','15881538584722.png','info@pertamina.com','3K2RQUrg',NULL,NULL,'2020-04-29 09:50:58','2020-04-29 09:50:58'),
(2,'BP Indonesia','Arkadia Tower<br>\r\nJl. TB Simatupang Jakarta No.Kav 88, RT.1/RW.1, Kebagusan, Kec. Ps. Minggu','021','Jakarta Selatan','https://www.bp.com/','15881542792799.png','info@bp.com','nZ0wHcjI',NULL,NULL,'2020-04-29 09:57:59','2020-04-29 09:57:59'),
(3,'Meindo Elang Indah','TCC Tower One, 27th Floor\r\nJl. KH Mansyur Kav 126','021','Jakarta Pusat','http://meindo.com/','15881548687610.png','info@meindo.com','7T9zEKQC',NULL,NULL,'2020-04-29 10:07:48','2020-04-29 10:07:48'),
(5,'Pertamina EP','Menara Standard Chartered, No, Jl. Prof. DR. Satrio No.26, RT.4/RW.4, Karet Semanggi, Kecamatan Setiabudi','021','Jakarta Selatan','https://pep.pertamina.com','15881551252928.png','info@pep.pertamina.com','iKyYr7Nt',NULL,NULL,'2020-04-29 10:12:05','2020-04-29 10:12:05'),
(6,'JOB Pertamina - Talisman','-','021','Jakarta Selatan','phe.pertamina.com','15881553342328.png','info@phe.pertamina.com','CzcI8Krs',NULL,NULL,'2020-04-29 10:15:34','2020-04-29 10:15:34'),
(7,'HESS','Jl. Jend Sudirman Kav. 52-53 The Energy Senayan Kebayoran Baru Jakarta Selatan DKI Jakarta, Jl. New Delhi, RT.1/RW.3, Gelora','021','Jakarta Selatan','hess.co,','15893459863824.png','info@hess.com','AZPZETca',NULL,NULL,'2020-05-13 04:59:46','2020-05-13 04:59:46'),
(8,'Petronas Carigali','Talavera Office Tower','021','Jakarta Selatan','https://petronas.com','15893461421785.png','info@petronas.com','hbtfvU36',NULL,NULL,'2020-05-13 05:02:22','2020-05-13 05:02:22'),
(9,'CNOOC','CNooc','021','Jakarta Pusat','https://cnoocinternational.com','15893463354660.png','info@cnoocinternational.com','RwjGkvRR',NULL,NULL,'2020-05-13 05:05:35','2020-05-13 05:05:35'),
(10,'Elnusa','Graha Elnusa','021','Jakarta Selatan','elnusa.co.id','15893464681870.png','info@elnusa.co.id','aTPORUxJ',NULL,NULL,'2020-05-13 05:07:48','2020-05-13 05:07:48');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(36,'2020_04_23_131953_add_fieldsection_to_banners',15),
(37,'2020_04_26_141620_add_fieldfolderdest_to_webmaster_banners',16),
(38,'2020_04_26_144120_add_fieldimagetype_to_pages',17),
(39,'2020_05_03_070851_create_categorys_table',18),
(40,'2020_05_03_071457_create_webmaster_phones_table',19),
(41,'2020_05_03_101119_add_fieldwebmastersection_to_categorys',20),
(42,'2020_05_09_042802_create_webmaster_mails_table',21),
(43,'2020_05_09_155435_add_fieldslug_to_categorys',22);

/*Table structure for table `pages` */

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_item_id` int(11) NOT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_2` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_content` varchar(140) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_id` int(11) NOT NULL DEFAULT 0,
  `webmaster_banner_id` int(11) NOT NULL DEFAULT 0,
  `page_date` date DEFAULT NULL,
  `photo_filename` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_meta` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_description` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_abstract` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_visit` int(11) NOT NULL DEFAULT 0,
  `client_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pages` */

insert  into `pages`(`id`,`menu_item_id`,`slug`,`title`,`title_2`,`short_content`,`page_content`,`location`,`section_id`,`webmaster_banner_id`,`page_date`,`photo_filename`,`page_meta`,`page_description`,`page_abstract`,`page_visit`,`client_id`,`status`,`created_at`,`updated_at`) values 
(1,3,'ili-run','ILI Run',NULL,NULL,'<p>asdad</p>',NULL,0,4,NULL,'15881783433885.jpg','asdad',NULL,'<p>adadada</p>',0,0,0,'2020-04-29 16:39:03','2020-04-29 16:39:03');

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
(6,1,0,'Pump',NULL,NULL,0,0,'2020-04-22 17:17:27','2020-04-22 17:17:27');

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
(1,1,'Eko Budi','viscamarisca','budi2283@gmail.com','2020-04-19 05:37:21','$2y$10$iwNQjU7QcmHSHJIID1skaeJOguvPPctZjMfyiYfZvv8qo7RyucePm',NULL,'2020-04-19 05:37:26','2020-04-19 05:37:28');

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
  `destination_folder` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` int(11) NOT NULL DEFAULT 0,
  `height` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `webmaster_banners` */

insert  into `webmaster_banners`(`id`,`webmaster_id`,`row_no`,`banner_name`,`banner_type`,`destination_folder`,`width`,`height`,`status`,`created_at`,`updated_at`) values 
(1,1,1,'homeSliderRevolution',1,'main-slider',1920,982,0,'2020-04-19 09:33:18','2020-04-23 14:37:19'),
(2,1,2,'homeTextThumbnail',0,'content',900,550,0,'2020-04-19 09:36:29','2020-04-23 14:38:01'),
(3,1,3,'blogImage',1,'blog',700,500,0,'2020-04-22 14:51:48','2020-04-22 14:51:48'),
(4,1,4,'galeryImage',1,'gallery',650,528,0,'2020-04-26 13:56:52','2020-04-26 13:56:52');

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

/*Table structure for table `webmaster_mails` */

DROP TABLE IF EXISTS `webmaster_mails`;

CREATE TABLE `webmaster_mails` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `webmaster_id` int(11) NOT NULL,
  `mail_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_address` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `webmaster_mails_mail_address_unique` (`mail_address`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `webmaster_mails` */

insert  into `webmaster_mails`(`id`,`webmaster_id`,`mail_name`,`mail_address`,`status`,`created_at`,`updated_at`) values 
(1,1,'Sales HO','sales@tonscoindo.com',0,'2020-05-09 04:48:34','2020-05-09 04:48:34'),
(2,1,'Sales Pump Division','sales.pttonsco@gmail.com',0,'2020-05-09 04:49:03','2020-05-09 04:49:03');

/*Table structure for table `webmaster_phones` */

DROP TABLE IF EXISTS `webmaster_phones`;

CREATE TABLE `webmaster_phones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `webmaster_id` bigint(20) NOT NULL,
  `phone_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `webmaster_phones` */

insert  into `webmaster_phones`(`id`,`webmaster_id`,`phone_name`,`phone_no`,`status`,`created_at`,`updated_at`) values 
(1,1,'Head Office','+62 21 2923 7052',0,'2020-05-03 07:26:21','2020-05-03 07:26:21'),
(2,1,'Pump Division','+62 811 139 505',0,'2020-05-03 07:37:07','2020-05-03 07:37:07');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `webmaster_sections` */

insert  into `webmaster_sections`(`id`,`menu_item_id`,`webmaster_id`,`row_no`,`section_description`,`section_type`,`section_category`,`icon_name`,`status`,`created_at`,`updated_at`) values 
(1,2,1,1,'Website Content Management Sistem',0,2,'far fa-newspaper',0,'2020-04-19 11:04:37','2020-04-22 14:23:52'),
(7,1,1,2,'Index',0,0,'fas fa-home',0,'2020-04-22 01:46:55','2020-04-22 01:46:55'),
(8,3,1,3,'Detail Portofolio',1,0,NULL,0,'2020-05-03 10:02:11','2020-05-03 10:02:11'),
(9,6,1,4,'Contact',0,0,NULL,0,'2020-05-03 10:02:39','2020-05-09 04:27:08'),
(10,24,1,5,NULL,0,0,NULL,0,'2020-05-03 10:02:56','2020-05-03 10:02:56');

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
(1,'tonscoInternational','<p>Tonsco International is nasional company established from 2004.</p>','info@tonscoindo.com','tonscoindo.com','+62 21 2923 7052','+62 812 ...','Bona Business Center No 8J\r\n <br>Jl. Karangtengah Raya, Lebak Bulus, <br>Jakarta Selatan','Jakarta Selatan','DKI Jakarta','Indonesia','12440',-6.301963,106.781535,NULL,0,'2020-04-19 07:00:23','2020-04-22 15:11:05');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
