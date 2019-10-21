/*
SQLyog Ultimate v8.8 
MySQL - 5.7.27-0ubuntu0.18.04.1 : Database - mygallery
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mygallery` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `mygallery`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`title`,`created_at`,`updated_at`) values (1,'Природа','2019-10-10 10:23:08','2019-10-10 10:23:08'),(2,'Игры','2019-10-10 10:23:15','2019-10-10 10:23:15'),(3,'HiTech','2019-10-10 10:23:28','2019-10-10 10:23:28'),(6,'Город','2019-10-10 17:50:16','2019-10-10 17:50:16'),(7,'Рисунки','2019-10-10 17:51:19','2019-10-10 17:51:19');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_10_09_111352_create_photos_table',1),(5,'2019_10_09_111458_create_categories_table',1),(6,'2019_10_10_102648_add_column_description_in_photos',2),(7,'2019_10_10_103314_change_column_user_id_in_photos',3),(8,'2019_10_10_140848_add_column__size_in_photos',4),(9,'2019_10_10_161621_change_column_category_id_in_photos',5),(12,'2019_10_11_083819_add_column_status_in_users',6),(13,'2019_10_11_091608_create_roles_table',6),(15,'2019_10_11_121311_add_column_avatar_in_users',7),(17,'2019_10_13_142219_change_column_role_id__a_n_d_status_in_users',8),(18,'2019_10_17_144237_add_column_in_photos',9);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

insert  into `password_resets`(`email`,`token`,`created_at`) values ('test@mail.ru','$2y$10$nJZFmMv3qqIY4tJxOw3IRebLHxf6Zp8NFZo6BZvGgaoFhshHC2nH6','2019-10-18 10:35:42'),('admin@mail.ru','$2y$10$A0xIrMiOYKSzR7y/MVmjhuDXbDK2aez8eUqfqpsF3LbisCW99DMPy','2019-10-19 14:54:18');

/*Table structure for table `photos` */

DROP TABLE IF EXISTS `photos`;

CREATE TABLE `photos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imgSmall` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `photos` */

insert  into `photos`(`id`,`title`,`image`,`category_id`,`user_id`,`created_at`,`updated_at`,`description`,`size`,`imgSmall`) values (39,'Приставка','XxPBkXf8dY.jpg','2',1,'2019-10-10 14:14:47','2019-10-17 15:14:06','<p>Это был наш первый день у огры.</p>','1080 x 1920','6ZAuOZ.jpg'),(40,'Декор','VfsdeNsi4n.jpg','3',2,'2019-10-10 14:20:40','2019-10-17 15:13:36','<p>Хай-тек подразумевает минимум декора, простые формы, рациональное использование помещения.</p>','836 x 1254','Kr30wS.jpg'),(74,'Фотик','qx0u0SwSJt.jpg','3',3,'2019-10-17 15:10:14','2019-10-17 15:10:15','<p>Хай-тек интерьер сегодня расценивается как престиж, новый уровень стиля.</p>','1080 x 1920','YqZa9b.jpg'),(75,'Андроид','adfPWy2Bri.jpg','3',4,'2019-10-17 15:12:57','2019-10-17 15:12:58','<p>Хай-тек - это сокращение от &quot;высокие технологии&quot;, т.е. имеется в виду &quot;современные технологии&quot;.</p>','1180 x 1920','XqyeZ9.jpg'),(76,'Переулок','aui9chSrms.jpg','6',5,'2019-10-17 15:15:29','2019-10-17 15:15:30','<p>Пожалуйста, зарегистрируйтесь на МААМ. Копировать можно только зарегистрированным пользователям МААМ. Адрес публикации.</p>','835 x 1250','q7OICP.jpg'),(77,'Провинция','RdpJeh2sYn.jpg','6',1,'2019-10-17 15:17:21','2019-10-17 15:17:21','<p>Неправда, что все провинциальные города в России одинаковы: каждый из них уникален и имеет свой дух, своеобразие, свою душу.</p>','1050 x 1680','ATv7Bj.jpg'),(78,'GTA','4FFdyNpBd7.jpg','2',5,'2019-10-17 15:19:55','2019-10-17 15:19:55','<p><em><strong>Grand Theft Auto V</strong></em>&nbsp;(сокр.&nbsp;<em><strong>GTA V</strong></em>)</p>','1080 x 1920','HcNJTf.jpg'),(79,'Дети','XJs41Q0IAH.jpg','7',4,'2019-10-17 15:23:56','2019-10-17 15:24:53','<p>Какие&nbsp;<strong>красивые</strong>&nbsp;и трогательные&nbsp;<strong>высказывания</strong>&nbsp;известных и великих людей о любви к&nbsp;<strong>детям</strong></p>','1600 x 2560','0yCDam.jpg'),(80,'Снег','gXf1ezbsE2.jpg','7',3,'2019-10-17 15:25:45','2019-10-17 15:25:45','<p><strong>Дети</strong>&nbsp;&ndash; цветы жизни. Они украшают нашу жизнь и наполняют ее смыслом. Рождение&nbsp;<strong>ребенка</strong>&nbsp;&ndash; это возможность снова погрузиться в детство</p>','1050 x 1680','ytTrsI.jpg'),(81,'Лес','M7CoXaA2Ps.jpg','1',2,'2019-10-17 15:26:49','2019-10-17 15:26:52','<p><strong>Природа</strong>&nbsp;вокруг нас такая сказочная и такая хрупкая... Воспетая писателями и поэтами.</p>','2400 x 3840','kcVPGf.jpg'),(82,'Гора','9FcT7WTZ8o.jpg','1',1,'2019-10-17 15:27:55','2019-10-17 15:27:55','<p>Последующее появление человека, развитие им сельского хозяйства и цивилизации явились причиной влияния на Землю намного большего, чем все предыдущие формы жизни</p>','1080 x 1920','cnGJgg.jpg'),(85,'sadasd','At1n4BcgST.jpg','3',1,'2019-10-18 12:33:29','2019-10-18 12:33:30','<p>asd</p>','1080 x 1920','JjqNuf.jpg'),(86,'Лодки','sOlll2kj4p.jpg','1',5,'2019-10-19 14:53:17','2019-10-19 14:53:17','<p>Мои лодки</p>','1080 x 1920','Dg2ZHO.jpg');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`title`,`created_at`,`updated_at`) values (1,'Пользователь',NULL,NULL),(2,'Администратор',NULL,NULL),(9,'Супер Администратор',NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) DEFAULT '1',
  `status` int(11) DEFAULT '0',
  `avatar` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`role_id`,`status`,`avatar`) values (1,'Zoey O\'Connell','admin@mail.ru','2019-10-11 09:31:58','$2y$10$wcwcCf8/91Lk2l2M6f0KiOpK.G7BAaILfjCZSPfCtrqzK5kZHAbh2','mjjUbFlbkS5X2YKgtMMHFXA9TAw0vJMqWN7n0ZKUBHxjrZIKqpiMiJCexiTL','2019-10-11 09:31:58','2019-10-18 12:42:35',2,0,'zZFVhpFGSn.jpg'),(2,'Prof. Jayde Moore','murzilka@marlindev.ruaaa',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','qFoPU0Tvsg','2019-10-11 09:31:58','2019-10-16 10:48:16',1,0,'laAnrXqwbw.jpg'),(3,'Lennie Hansen','gino85@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','vdOzBtZsgV','2019-10-11 09:31:58','2019-10-17 15:51:28',1,0,'WSIirLH7qB.jpg'),(4,'Mrs. Lillie Botsf','schroeder.wade@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','M8hcAGt2qv','2019-10-11 09:31:58','2019-10-17 15:52:04',1,0,'vNYuh7Yvpj.jpg'),(5,'Demario Pollich Jr.','sprohaska@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','1RBQTSsEba','2019-10-11 09:31:58','2019-10-11 09:31:58',1,1,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
