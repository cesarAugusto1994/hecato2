
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `activations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activations_user_id_index` (`user_id`),
  CONSTRAINT `activations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `activations` WRITE;
/*!40000 ALTER TABLE `activations` DISABLE KEYS */;
/*!40000 ALTER TABLE `activations` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `admin_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_config_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `admin_config` WRITE;
/*!40000 ALTER TABLE `admin_config` DISABLE KEYS */;
INSERT INTO `admin_config` VALUES (1,'clientes','50','Limite de Cleintes','2018-07-11 04:46:31','2018-07-11 04:46:31');
/*!40000 ALTER TABLE `admin_config` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `admin_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `admin_menu` WRITE;
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` VALUES (1,0,1,'Index','fa-bar-chart','/',NULL,NULL),(2,0,2,'Admin','fa-tasks','',NULL,NULL),(3,2,3,'Users','fa-users','auth/users',NULL,NULL),(4,2,4,'Roles','fa-user','auth/roles',NULL,NULL),(5,2,5,'Permission','fa-ban','auth/permissions',NULL,NULL),(6,2,6,'Menu','fa-bars','auth/menu',NULL,NULL),(7,2,7,'Operation log','fa-history','auth/logs',NULL,NULL),(8,0,8,'Exception Reporter','fa-bug','exceptions','2018-07-11 04:30:00','2018-07-11 04:30:00'),(9,0,9,'Log viewer','fa-database','logs','2018-07-11 04:33:08','2018-07-11 04:33:08'),(10,0,10,'Scheduling','fa-clock-o','scheduling','2018-07-11 04:37:50','2018-07-11 04:37:50'),(11,0,11,'Backup','fa-copy','backup','2018-07-11 04:44:21','2018-07-11 04:44:21'),(12,0,12,'Config','fa-toggle-on','config','2018-07-11 04:45:48','2018-07-11 04:45:48'),(13,0,12,'Helpers','fa-gears','','2018-07-11 04:49:12','2018-07-11 04:49:12'),(14,13,13,'Scaffold','fa-keyboard-o','helpers/scaffold','2018-07-11 04:49:12','2018-07-11 04:49:12'),(15,13,14,'Database terminal','fa-database','helpers/terminal/database','2018-07-11 04:49:12','2018-07-11 04:49:12'),(16,13,15,'Laravel artisan','fa-terminal','helpers/terminal/artisan','2018-07-11 04:49:12','2018-07-11 04:49:12'),(17,13,16,'Routes','fa-list-alt','helpers/routes','2018-07-11 04:49:12','2018-07-11 04:49:12');
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `admin_operation_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_operation_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_operation_log_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `admin_operation_log` WRITE;
/*!40000 ALTER TABLE `admin_operation_log` DISABLE KEYS */;
INSERT INTO `admin_operation_log` VALUES (1,1,'administrator','GET','127.0.0.1','[]','2018-07-11 04:27:45','2018-07-11 04:27:45'),(2,1,'administrator/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2018-07-11 04:27:59','2018-07-11 04:27:59'),(3,1,'administrator/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2018-07-11 04:28:12','2018-07-11 04:28:12'),(4,1,'administrator','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2018-07-11 04:28:31','2018-07-11 04:28:31'),(5,1,'administrator','GET','127.0.0.1','[]','2018-07-11 04:30:53','2018-07-11 04:30:53'),(6,1,'administrator','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2018-07-11 04:30:56','2018-07-11 04:30:56'),(7,1,'administrator/exceptions','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2018-07-11 04:30:59','2018-07-11 04:30:59'),(8,1,'administrator/exceptions','GET','127.0.0.1','[]','2018-07-11 04:31:27','2018-07-11 04:31:27'),(9,1,'administrator/exceptions','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2018-07-11 04:31:30','2018-07-11 04:31:30'),(10,1,'administrator/exceptions','GET','127.0.0.1','[]','2018-07-11 04:32:03','2018-07-11 04:32:03'),(11,1,'administrator/exceptions','GET','127.0.0.1','[]','2018-07-11 04:32:06','2018-07-11 04:32:06'),(12,1,'administrator/exceptions','GET','127.0.0.1','[]','2018-07-11 04:37:04','2018-07-11 04:37:04'),(13,1,'administrator/logs','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2018-07-11 04:37:09','2018-07-11 04:37:09'),(14,1,'administrator/logs/laravel.log/tail','GET','127.0.0.1','{\"offset\":\"32126873\"}','2018-07-11 04:37:29','2018-07-11 04:37:29'),(15,1,'administrator/logs/laravel.log/tail','GET','127.0.0.1','{\"offset\":\"32136779\"}','2018-07-11 04:37:31','2018-07-11 04:37:31'),(16,1,'administrator/logs/laravel.log/tail','GET','127.0.0.1','{\"offset\":\"32146685\"}','2018-07-11 04:37:33','2018-07-11 04:37:33'),(17,1,'administrator/logs/laravel.log/tail','GET','127.0.0.1','{\"offset\":\"32156591\"}','2018-07-11 04:37:35','2018-07-11 04:37:35'),(18,1,'administrator/logs/laravel.log/tail','GET','127.0.0.1','{\"offset\":\"32166497\"}','2018-07-11 04:37:37','2018-07-11 04:37:37'),(19,1,'administrator/logs','GET','127.0.0.1','[]','2018-07-11 04:37:53','2018-07-11 04:37:53'),(20,1,'administrator/scheduling','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2018-07-11 04:37:58','2018-07-11 04:37:58'),(21,1,'administrator/scheduling','GET','127.0.0.1','[]','2018-07-11 04:38:53','2018-07-11 04:38:53'),(22,1,'administrator/scheduling/run','POST','127.0.0.1','{\"id\":\"1\",\"_token\":\"n3h4sawQNJQsOaZdT5IKJylW9VMPIKQBrJldXiGW\"}','2018-07-11 04:39:06','2018-07-11 04:39:06'),(23,1,'administrator/scheduling/run','POST','127.0.0.1','{\"id\":\"2\",\"_token\":\"n3h4sawQNJQsOaZdT5IKJylW9VMPIKQBrJldXiGW\"}','2018-07-11 04:39:13','2018-07-11 04:39:13'),(24,1,'administrator/scheduling/run','POST','127.0.0.1','{\"id\":\"3\",\"_token\":\"n3h4sawQNJQsOaZdT5IKJylW9VMPIKQBrJldXiGW\"}','2018-07-11 04:39:19','2018-07-11 04:39:19'),(25,1,'administrator/exceptions','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2018-07-11 04:39:41','2018-07-11 04:39:41'),(26,1,'administrator/exceptions','GET','127.0.0.1','[]','2018-07-11 04:45:54','2018-07-11 04:45:54'),(27,1,'administrator/config','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2018-07-11 04:45:59','2018-07-11 04:45:59'),(28,1,'administrator/config/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2018-07-11 04:46:05','2018-07-11 04:46:05'),(29,1,'administrator/config','POST','127.0.0.1','{\"name\":\"clientes\",\"value\":\"50\",\"description\":\"Limite de Cleintes\",\"_token\":\"n3h4sawQNJQsOaZdT5IKJylW9VMPIKQBrJldXiGW\",\"_previous_\":\"http:\\/\\/localhost:8000\\/administrator\\/config\"}','2018-07-11 04:46:31','2018-07-11 04:46:31'),(30,1,'administrator/config','GET','127.0.0.1','[]','2018-07-11 04:46:31','2018-07-11 04:46:31'),(31,1,'administrator/auth/setting','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2018-07-11 04:46:39','2018-07-11 04:46:39'),(32,1,'administrator/auth/setting','PUT','127.0.0.1','{\"name\":\"Administrator\",\"password\":\"$2y$10$xI8I\\/B3FtZMynhcJ9xdDvu6FMezet8hSKKML1l4SNFEHzI\\/zCSVa6\",\"password_confirmation\":\"$2y$10$xI8I\\/B3FtZMynhcJ9xdDvu6FMezet8hSKKML1l4SNFEHzI\\/zCSVa6\",\"_token\":\"n3h4sawQNJQsOaZdT5IKJylW9VMPIKQBrJldXiGW\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/localhost:8000\\/administrator\\/config\"}','2018-07-11 04:46:53','2018-07-11 04:46:53'),(33,1,'administrator/auth/setting','GET','127.0.0.1','[]','2018-07-11 04:46:53','2018-07-11 04:46:53'),(34,1,'administrator/backup','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2018-07-11 04:47:37','2018-07-11 04:47:37'),(35,1,'administrator/backup/run','POST','127.0.0.1','{\"_token\":\"n3h4sawQNJQsOaZdT5IKJylW9VMPIKQBrJldXiGW\"}','2018-07-11 04:47:44','2018-07-11 04:47:44'),(36,1,'administrator/backup','GET','127.0.0.1','[]','2018-07-11 04:49:58','2018-07-11 04:49:58'),(37,1,'administrator/backup/run','POST','127.0.0.1','{\"_token\":\"n3h4sawQNJQsOaZdT5IKJylW9VMPIKQBrJldXiGW\"}','2018-07-11 04:50:17','2018-07-11 04:50:17');
/*!40000 ALTER TABLE `admin_operation_log` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `admin_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `admin_permissions` WRITE;
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;
INSERT INTO `admin_permissions` VALUES (1,'All permission','*','','*',NULL,NULL),(2,'Dashboard','dashboard','GET','/',NULL,NULL),(3,'Login','auth.login','','/auth/login\r\n/auth/logout',NULL,NULL),(4,'User setting','auth.setting','GET,PUT','/auth/setting',NULL,NULL),(5,'Auth management','auth.management','','/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs',NULL,NULL),(6,'Exceptions reporter','ext.reporter',NULL,'/exceptions*','2018-07-11 04:30:00','2018-07-11 04:30:00'),(7,'Logs','ext.log-viewer',NULL,'/logs*','2018-07-11 04:33:08','2018-07-11 04:33:08'),(8,'Scheduling','ext.scheduling',NULL,'/scheduling*','2018-07-11 04:37:50','2018-07-11 04:37:50'),(9,'Backup','ext.backup',NULL,'/backup*','2018-07-11 04:44:21','2018-07-11 04:44:21'),(10,'Admin Config','ext.config',NULL,'/config*','2018-07-11 04:45:48','2018-07-11 04:45:48'),(11,'Admin helpers','ext.helpers',NULL,'/helpers/*','2018-07-11 04:49:12','2018-07-11 04:49:12');
/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `admin_role_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `admin_role_menu` WRITE;
/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;
INSERT INTO `admin_role_menu` VALUES (1,2,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `admin_role_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `admin_role_permissions` WRITE;
/*!40000 ALTER TABLE `admin_role_permissions` DISABLE KEYS */;
INSERT INTO `admin_role_permissions` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `admin_role_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `admin_role_users` WRITE;
/*!40000 ALTER TABLE `admin_role_users` DISABLE KEYS */;
INSERT INTO `admin_role_users` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_users` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `admin_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `admin_roles` WRITE;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` VALUES (1,'Administrator','administrator','2018-07-11 04:26:55','2018-07-11 04:26:55');
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `admin_user_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `admin_user_permissions` WRITE;
/*!40000 ALTER TABLE `admin_user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_user_permissions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `admin_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'admin','$2y$10$xI8I/B3FtZMynhcJ9xdDvu6FMezet8hSKKML1l4SNFEHzI/zCSVa6','Administrator',NULL,NULL,'2018-07-11 04:26:55','2018-07-11 04:26:55');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `agenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agenda` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(10) unsigned NOT NULL,
  `inicio` datetime NOT NULL,
  `fim` datetime NOT NULL,
  `notas` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(10) unsigned NOT NULL,
  `empresa_id` int(10) unsigned NOT NULL,
  `status_id` int(10) unsigned NOT NULL,
  `lembrete` tinyint(1) NOT NULL DEFAULT '1',
  `confirmada` tinyint(1) NOT NULL DEFAULT '1',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agenda_pessoa_id_foreign` (`pessoa_id`),
  KEY `agenda_user_id_foreign` (`user_id`),
  KEY `agenda_empresa_id_foreign` (`empresa_id`),
  KEY `agenda_status_id_foreign` (`status_id`),
  CONSTRAINT `agenda_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`),
  CONSTRAINT `agenda_pessoa_id_foreign` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`),
  CONSTRAINT `agenda_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `agenda_status` (`id`),
  CONSTRAINT `agenda_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `agenda` WRITE;
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` VALUES (1,2,'2018-07-10 13:13:06','2018-07-10 13:13:06',NULL,2,1,1,1,1,1,'2018-07-10 16:13:06','2018-07-10 16:13:06'),(2,2,'2018-07-10 13:14:34','2018-07-10 13:14:34',NULL,2,1,1,1,1,1,'2018-07-10 16:14:34','2018-07-10 16:14:34'),(3,2,'2018-07-10 15:07:17','2018-07-10 15:07:17',NULL,2,1,1,1,1,1,'2018-07-10 18:07:17','2018-07-10 18:07:17');
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `agenda_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agenda_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `agenda_status_nome_unique` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `agenda_status` WRITE;
/*!40000 ALTER TABLE `agenda_status` DISABLE KEYS */;
INSERT INTO `agenda_status` VALUES (1,'Pendente','pendente',1,'2018-07-10 15:53:50','2018-07-10 15:53:50'),(2,'Em Andamento','em_andamento',1,'2018-07-10 15:53:50','2018-07-10 15:53:50'),(3,'Finalzada','finalizada',1,'2018-07-10 15:53:50','2018-07-10 15:53:50'),(4,'Cancelada','cancelada',1,'2018-07-10 15:53:50','2018-07-10 15:53:50');
/*!40000 ALTER TABLE `agenda_status` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `cms_apicustom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_apicustom` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permalink` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tabel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aksi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kolom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderby` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_query_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sql_where` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `method_type` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` longtext COLLATE utf8mb4_unicode_ci,
  `responses` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cms_apicustom` WRITE;
/*!40000 ALTER TABLE `cms_apicustom` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_apicustom` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `cms_apikey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_apikey` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `screetkey` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cms_apikey` WRITE;
/*!40000 ALTER TABLE `cms_apikey` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_apikey` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `cms_dashboard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_dashboard` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cms_dashboard` WRITE;
/*!40000 ALTER TABLE `cms_dashboard` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_dashboard` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `cms_email_queues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_email_queues` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `send_at` datetime DEFAULT NULL,
  `email_recipient` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_cc_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_content` text COLLATE utf8mb4_unicode_ci,
  `email_attachments` text COLLATE utf8mb4_unicode_ci,
  `is_sent` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cms_email_queues` WRITE;
/*!40000 ALTER TABLE `cms_email_queues` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_email_queues` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `cms_email_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_email_templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cms_email_templates` WRITE;
/*!40000 ALTER TABLE `cms_email_templates` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_email_templates` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `cms_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ipaddress` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `useragent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `id_cms_users` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cms_logs` WRITE;
/*!40000 ALTER TABLE `cms_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_logs` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `cms_menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'url',
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_dashboard` tinyint(1) NOT NULL DEFAULT '0',
  `id_cms_privileges` int(11) DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cms_menus` WRITE;
/*!40000 ALTER TABLE `cms_menus` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_menus` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `cms_menus_privileges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_menus_privileges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cms_menus` int(11) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cms_menus_privileges` WRITE;
/*!40000 ALTER TABLE `cms_menus_privileges` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_menus_privileges` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `cms_moduls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_moduls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_protected` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cms_moduls` WRITE;
/*!40000 ALTER TABLE `cms_moduls` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_moduls` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `cms_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cms_users` int(11) DEFAULT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cms_notifications` WRITE;
/*!40000 ALTER TABLE `cms_notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_notifications` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `cms_privileges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_privileges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_superadmin` tinyint(1) DEFAULT NULL,
  `theme_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cms_privileges` WRITE;
/*!40000 ALTER TABLE `cms_privileges` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_privileges` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `cms_privileges_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_privileges_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `is_visible` tinyint(1) DEFAULT NULL,
  `is_create` tinyint(1) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `is_edit` tinyint(1) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `id_cms_moduls` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cms_privileges_roles` WRITE;
/*!40000 ALTER TABLE `cms_privileges_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_privileges_roles` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `cms_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `content_input_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataenum` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `helper` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_setting` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cms_settings` WRITE;
/*!40000 ALTER TABLE `cms_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_settings` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `cms_statistic_components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_statistic_components` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cms_statistics` int(11) DEFAULT NULL,
  `componentID` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `component_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_name` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `config` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cms_statistic_components` WRITE;
/*!40000 ALTER TABLE `cms_statistic_components` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_statistic_components` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `cms_statistics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_statistics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cms_statistics` WRITE;
/*!40000 ALTER TABLE `cms_statistics` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_statistics` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `cms_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cms_users` WRITE;
/*!40000 ALTER TABLE `cms_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_users` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `empresa_contatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa_contatos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ddd` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `tipo_id` int(10) unsigned NOT NULL,
  `empresa_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `empresa_contatos_tipo_id_foreign` (`tipo_id`),
  KEY `empresa_contatos_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `empresa_contatos_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`),
  CONSTRAINT `empresa_contatos_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipo_contato` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `empresa_contatos` WRITE;
/*!40000 ALTER TABLE `empresa_contatos` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresa_contatos` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_id` int(10) unsigned NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aniversario_fundacao` date DEFAULT NULL,
  `cpf_cnpj` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rg_ie` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `informacoes` text COLLATE utf8mb4_unicode_ci,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `empresas_tipo_id_foreign` (`tipo_id`),
  CONSTRAINT `empresas_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `pessoa_tipo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (1,3,'Empresa Teste 8hpCrPVuM9dl','empresa@kVzlOYJiBkmG.com.br','2018-07-10',NULL,NULL,'empresa@vWDgV1geoAd0.com.br','Empresa Teste gIIglpoazimp',1,'2018-07-10 15:53:50','2018-07-10 15:53:50',NULL);
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `grupo_pessoas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo_pessoas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `grupo_pessoas` WRITE;
/*!40000 ALTER TABLE `grupo_pessoas` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupo_pessoas` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `laravel_exceptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laravel_exceptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line` int(11) NOT NULL,
  `trace` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `query` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cookies` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `laravel_exceptions` WRITE;
/*!40000 ALTER TABLE `laravel_exceptions` DISABLE KEYS */;
INSERT INTO `laravel_exceptions` VALUES (1,'Symfony\\Component\\Console\\Exception\\NamespaceNotFoundException','0','There are no commands defined in the \"activations\" namespace.','/home/cesar/Projetos/Github/hecato2/vendor/symfony/console/Application.php',578,'#0 /home/cesar/Projetos/Github/hecato2/vendor/symfony/console/Application.php(618): Symfony\\Component\\Console\\Application->findNamespace(\'activations\')\n#1 /home/cesar/Projetos/Github/hecato2/vendor/symfony/console/Application.php(226): Symfony\\Component\\Console\\Application->find(\'activations:cle...\')\n#2 /home/cesar/Projetos/Github/hecato2/vendor/symfony/console/Application.php(145): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#3 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Console/Application.php(89): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#4 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(122): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#5 /home/cesar/Projetos/Github/hecato2/artisan(35): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#6 {main}','GET','/','[]','','[]','{\"host\":[\"localhost\"],\"user-agent\":[\"Symfony\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,*\\/*;q=0.8\"],\"accept-language\":[\"en-us,en;q=0.5\"],\"accept-charset\":[\"ISO-8859-1,utf-8;q=0.7,*;q=0.7\"]}','[\"127.0.0.1\"]','2018-07-11 04:39:07','2018-07-11 04:39:07'),(2,'ReflectionException','-1','Class App\\Http\\Controllers\\EmpresasController does not exist','/home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Container/Container.php',767,'#0 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Container/Container.php(767): ReflectionClass->__construct(\'App\\\\Http\\\\Contro...\')\n#1 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Container/Container.php(646): Illuminate\\Container\\Container->build(\'App\\\\Http\\\\Contro...\')\n#2 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Container/Container.php(601): Illuminate\\Container\\Container->resolve(\'App\\\\Http\\\\Contro...\', Array)\n#3 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Foundation/Application.php(734): Illuminate\\Container\\Container->make(\'App\\\\Http\\\\Contro...\', Array)\n#4 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Route.php(226): Illuminate\\Foundation\\Application->make(\'App\\\\Http\\\\Contro...\')\n#5 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Route.php(796): Illuminate\\Routing\\Route->getController()\n#6 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Route.php(757): Illuminate\\Routing\\Route->controllerMiddleware()\n#7 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Foundation/Console/RouteListCommand.php(151): Illuminate\\Routing\\Route->gatherMiddleware()\n#8 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Foundation/Console/RouteListCommand.php(114): Illuminate\\Foundation\\Console\\RouteListCommand->getMiddleware(Object(Illuminate\\Routing\\Route))\n#9 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Foundation/Console/RouteListCommand.php(86): Illuminate\\Foundation\\Console\\RouteListCommand->getRouteInformation(Object(Illuminate\\Routing\\Route))\n#10 [internal function]: Illuminate\\Foundation\\Console\\RouteListCommand->Illuminate\\Foundation\\Console\\{closure}(Object(Illuminate\\Routing\\Route), 149)\n#11 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Support/Collection.php(932): array_map(Object(Closure), Array, Array)\n#12 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Foundation/Console/RouteListCommand.php(87): Illuminate\\Support\\Collection->map(Object(Closure))\n#13 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Foundation/Console/RouteListCommand.php(75): Illuminate\\Foundation\\Console\\RouteListCommand->getRoutes()\n#14 [internal function]: Illuminate\\Foundation\\Console\\RouteListCommand->handle()\n#15 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(29): call_user_func_array(Array, Array)\n#16 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(87): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#17 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(31): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#18 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Container/Container.php(564): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#19 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Console/Command.php(184): Illuminate\\Container\\Container->call(Array)\n#20 /home/cesar/Projetos/Github/hecato2/vendor/symfony/console/Command/Command.php(251): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#21 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Console/Command.php(171): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#22 /home/cesar/Projetos/Github/hecato2/vendor/symfony/console/Application.php(886): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#23 /home/cesar/Projetos/Github/hecato2/vendor/symfony/console/Application.php(262): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Foundation\\Console\\RouteListCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#24 /home/cesar/Projetos/Github/hecato2/vendor/symfony/console/Application.php(145): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#25 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Console/Application.php(89): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#26 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(122): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#27 /home/cesar/Projetos/Github/hecato2/artisan(35): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#28 {main}','GET','/','[]','','[]','{\"host\":[\"localhost\"],\"user-agent\":[\"Symfony\"],\"accept\":[\"text\\/html,application\\/xhtml+xml,application\\/xml;q=0.9,*\\/*;q=0.8\"],\"accept-language\":[\"en-us,en;q=0.5\"],\"accept-charset\":[\"ISO-8859-1,utf-8;q=0.7,*;q=0.7\"]}','[\"127.0.0.1\"]','2018-07-11 04:39:20','2018-07-11 04:39:20'),(3,'Symfony\\Component\\Debug\\Exception\\FatalThrowableError','0','Call to a member function exists() on string','/home/cesar/Projetos/Github/hecato2/vendor/encore/laravel-admin/src/Form/Field/UploadField.php',273,'#0 /home/cesar/Projetos/Github/hecato2/vendor/encore/laravel-admin/src/Form/Field/File.php(122): Encore\\Admin\\Form\\Field\\File->renameIfExists(Object(Illuminate\\Http\\UploadedFile))\n#1 /home/cesar/Projetos/Github/hecato2/vendor/encore/laravel-admin/src/Form/Field/Image.php(38): Encore\\Admin\\Form\\Field\\File->uploadAndDeleteOriginal(Object(Illuminate\\Http\\UploadedFile))\n#2 /home/cesar/Projetos/Github/hecato2/vendor/encore/laravel-admin/src/Form.php(758): Encore\\Admin\\Form\\Field\\Image->prepare(Object(Illuminate\\Http\\UploadedFile))\n#3 /home/cesar/Projetos/Github/hecato2/vendor/encore/laravel-admin/src/Form.php(537): Encore\\Admin\\Form->prepareUpdate(Array)\n#4 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Database/Concerns/ManagesTransactions.php(29): Encore\\Admin\\Form->Encore\\Admin\\{closure}(Object(Illuminate\\Database\\MySqlConnection))\n#5 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Database/DatabaseManager.php(327): Illuminate\\Database\\Connection->transaction(Object(Closure))\n#6 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Support/Facades/Facade.php(221): Illuminate\\Database\\DatabaseManager->__call(\'transaction\', Array)\n#7 /home/cesar/Projetos/Github/hecato2/vendor/encore/laravel-admin/src/Form.php(547): Illuminate\\Support\\Facades\\Facade::__callStatic(\'transaction\', Array)\n#8 /home/cesar/Projetos/Github/hecato2/vendor/encore/laravel-admin/src/Controllers/AuthController.php(103): Encore\\Admin\\Form->update(1)\n#9 [internal function]: Encore\\Admin\\Controllers\\AuthController->putSetting()\n#10 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Controller.php(54): call_user_func_array(Array, Array)\n#11 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/ControllerDispatcher.php(45): Illuminate\\Routing\\Controller->callAction(\'putSetting\', Array)\n#12 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Route.php(212): Illuminate\\Routing\\ControllerDispatcher->dispatch(Object(Illuminate\\Routing\\Route), Object(Encore\\Admin\\Controllers\\AuthController), \'putSetting\')\n#13 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Route.php(169): Illuminate\\Routing\\Route->runController()\n#14 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Router.php(665): Illuminate\\Routing\\Route->run()\n#15 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php(30): Illuminate\\Routing\\Router->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#16 /home/cesar/Projetos/Github/hecato2/vendor/encore/laravel-admin/src/Middleware/Permission.php(42): Illuminate\\Routing\\Pipeline->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#17 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(151): Encore\\Admin\\Middleware\\Permission->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#18 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php(53): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#19 /home/cesar/Projetos/Github/hecato2/vendor/encore/laravel-admin/src/Middleware/Bootstrap.php(23): Illuminate\\Routing\\Pipeline->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#20 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(151): Encore\\Admin\\Middleware\\Bootstrap->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#21 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php(53): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#22 /home/cesar/Projetos/Github/hecato2/vendor/encore/laravel-admin/src/Middleware/LogOperation.php(34): Illuminate\\Routing\\Pipeline->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#23 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(151): Encore\\Admin\\Middleware\\LogOperation->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#24 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php(53): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#25 /home/cesar/Projetos/Github/hecato2/vendor/encore/laravel-admin/src/Middleware/Pjax.php(24): Illuminate\\Routing\\Pipeline->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#26 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(151): Encore\\Admin\\Middleware\\Pjax->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#27 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php(53): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#28 /home/cesar/Projetos/Github/hecato2/vendor/encore/laravel-admin/src/Middleware/Authenticate.php(25): Illuminate\\Routing\\Pipeline->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#29 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(151): Encore\\Admin\\Middleware\\Authenticate->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#30 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php(53): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#31 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Middleware/SubstituteBindings.php(41): Illuminate\\Routing\\Pipeline->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#32 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(151): Illuminate\\Routing\\Middleware\\SubstituteBindings->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#33 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php(53): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#34 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/VerifyCsrfToken.php(67): Illuminate\\Routing\\Pipeline->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#35 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(151): Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#36 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php(53): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#37 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/View/Middleware/ShareErrorsFromSession.php(49): Illuminate\\Routing\\Pipeline->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#38 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(151): Illuminate\\View\\Middleware\\ShareErrorsFromSession->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#39 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php(53): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#40 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Session/Middleware/StartSession.php(63): Illuminate\\Routing\\Pipeline->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#41 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(151): Illuminate\\Session\\Middleware\\StartSession->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#42 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php(53): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#43 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Cookie/Middleware/AddQueuedCookiesToResponse.php(37): Illuminate\\Routing\\Pipeline->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#44 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(151): Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#45 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php(53): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#46 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Cookie/Middleware/EncryptCookies.php(59): Illuminate\\Routing\\Pipeline->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#47 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(151): Illuminate\\Cookie\\Middleware\\EncryptCookies->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#48 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php(53): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#49 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(104): Illuminate\\Routing\\Pipeline->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#50 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Router.php(667): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#51 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Router.php(642): Illuminate\\Routing\\Router->runRouteWithinStack(Object(Illuminate\\Routing\\Route), Object(Illuminate\\Http\\Request))\n#52 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Router.php(608): Illuminate\\Routing\\Router->runRoute(Object(Illuminate\\Http\\Request), Object(Illuminate\\Routing\\Route))\n#53 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Router.php(597): Illuminate\\Routing\\Router->dispatchToRoute(Object(Illuminate\\Http\\Request))\n#54 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php(176): Illuminate\\Routing\\Router->dispatch(Object(Illuminate\\Http\\Request))\n#55 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php(30): Illuminate\\Foundation\\Http\\Kernel->Illuminate\\Foundation\\Http\\{closure}(Object(Illuminate\\Http\\Request))\n#56 /home/cesar/Projetos/Github/hecato2/vendor/barryvdh/laravel-debugbar/src/Middleware/InjectDebugbar.php(65): Illuminate\\Routing\\Pipeline->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#57 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(151): Barryvdh\\Debugbar\\Middleware\\InjectDebugbar->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#58 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php(53): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#59 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php(31): Illuminate\\Routing\\Pipeline->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#60 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(151): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#61 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php(53): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#62 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php(31): Illuminate\\Routing\\Pipeline->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#63 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(151): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#64 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php(53): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#65 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ValidatePostSize.php(27): Illuminate\\Routing\\Pipeline->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#66 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(151): Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#67 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php(53): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#68 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/CheckForMaintenanceMode.php(51): Illuminate\\Routing\\Pipeline->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#69 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(151): Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#70 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php(53): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#71 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(104): Illuminate\\Routing\\Pipeline->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#72 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php(151): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#73 /home/cesar/Projetos/Github/hecato2/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php(116): Illuminate\\Foundation\\Http\\Kernel->sendRequestThroughRouter(Object(Illuminate\\Http\\Request))\n#74 /home/cesar/Projetos/Github/hecato2/public/index.php(52): Illuminate\\Foundation\\Http\\Kernel->handle(Object(Illuminate\\Http\\Request))\n#75 /home/cesar/Projetos/Github/hecato2/server.php(19): require_once(\'/home/cesar/Pro...\')\n#76 {main}','PUT','administrator/auth/setting','{\"name\":\"Administrator\",\"password\":\"$2y$10$xI8I\\/B3FtZMynhcJ9xdDvu6FMezet8hSKKML1l4SNFEHzI\\/zCSVa6\",\"password_confirmation\":\"$2y$10$xI8I\\/B3FtZMynhcJ9xdDvu6FMezet8hSKKML1l4SNFEHzI\\/zCSVa6\",\"avatar\":{}}','','{\"PHPSESSID\":null,\"ssupp_visits\":null,\"ssupp_chatid\":null,\"ssupp_vid\":null,\"_ga\":null,\"_gid\":null,\"laravel_session\":null,\"XSRF-TOKEN\":\"n3h4sawQNJQsOaZdT5IKJylW9VMPIKQBrJldXiGW\",\"hecato_session\":\"kkShP6UiuwmZGjfmV808tkjKv7ziF924tXDHMBWk\"}','{\"host\":[\"localhost:8000\"],\"connection\":[\"keep-alive\"],\"content-length\":[\"40322\"],\"origin\":[\"http:\\/\\/localhost:8000\"],\"user-agent\":[\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/62.0.3202.62 Safari\\/537.36\"],\"content-type\":[\"multipart\\/form-data; boundary=----WebKitFormBoundarylEDpsje0bKOIFAQd\"],\"accept\":[\"text\\/html, *\\/*; q=0.01\"],\"x-requested-with\":[\"XMLHttpRequest\"],\"x-pjax\":[\"true\"],\"x-pjax-container\":[\"#pjax-container\"],\"dnt\":[\"1\"],\"referer\":[\"http:\\/\\/localhost:8000\\/administrator\\/auth\\/setting\"],\"accept-encoding\":[\"gzip, deflate, br\"],\"accept-language\":[\"pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7\"]}','[\"127.0.0.1\"]','2018-07-11 04:46:53','2018-07-11 04:46:53');
/*!40000 ALTER TABLE `laravel_exceptions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2015_07_03_004001_create_tipos_table',1),(2,'2015_07_03_004003_create_empresas_table',1),(3,'2015_10_12_000000_create_users_table',1),(4,'2015_10_12_100000_create_password_resets_table',1),(5,'2015_10_31_162633_scaffoldinterfaces',1),(6,'2016_01_15_105324_create_roles_table',1),(7,'2016_01_15_114412_create_role_user_table',1),(8,'2016_01_26_115212_create_permissions_table',1),(9,'2016_01_26_115523_create_permission_role_table',1),(10,'2016_02_09_132439_create_permission_user_table',1),(11,'2016_08_07_145904_add_table_cms_apicustom',1),(12,'2016_08_07_150834_add_table_cms_dashboard',1),(13,'2016_08_07_151210_add_table_cms_logs',1),(14,'2016_08_07_151211_add_details_cms_logs',1),(15,'2016_08_07_152014_add_table_cms_privileges',1),(16,'2016_08_07_152214_add_table_cms_privileges_roles',1),(17,'2016_08_07_152320_add_table_cms_settings',1),(18,'2016_08_07_152421_add_table_cms_users',1),(19,'2016_08_07_154624_add_table_cms_menus_privileges',1),(20,'2016_08_07_154624_add_table_cms_moduls',1),(21,'2016_08_17_225409_add_status_cms_users',1),(22,'2016_08_20_125418_add_table_cms_notifications',1),(23,'2016_09_04_033706_add_table_cms_email_queues',1),(24,'2016_09_16_035347_add_group_setting',1),(25,'2016_09_16_045425_add_label_setting',1),(26,'2016_09_17_104728_create_nullable_cms_apicustom',1),(27,'2016_10_01_141740_add_method_type_apicustom',1),(28,'2016_10_01_141846_add_parameters_apicustom',1),(29,'2016_10_01_141934_add_responses_apicustom',1),(30,'2016_10_01_144826_add_table_apikey',1),(31,'2016_11_14_141657_create_cms_menus',1),(32,'2016_11_15_132350_create_cms_email_templates',1),(33,'2016_11_15_190410_create_cms_statistics',1),(34,'2016_11_17_102740_create_cms_statistic_components',1),(35,'2017_03_09_082449_create_social_logins_table',1),(36,'2017_03_09_082526_create_activations_table',1),(37,'2017_03_20_213554_create_themes_table',1),(38,'2017_03_21_042918_create_profiles_table',1),(39,'2017_05_20_095210_create_tasks_table',1),(40,'2017_06_06_164501_add_deleted_at_cms_moduls',1),(41,'2018_07_03_004002_create_grupos_table',1),(42,'2018_07_03_004004_create_pessoas_table',1),(43,'2018_07_03_004019_create_fisicas_table',1),(44,'2018_07_03_004023_create_juridicas_table',1),(45,'2018_07_03_004025_create_tipo_contato_table',1),(46,'2018_07_03_004028_create_telefones_table',1),(47,'2018_07_03_004033_create_enderecos_table',1),(48,'2018_07_03_125228_create_permission_tables',1),(49,'2018_07_09_111413_create_statuses_table',1),(50,'2018_07_09_111414_create_schedules_table',1),(51,'2018_07_09_172725_create_contatos_table',1),(52,'2016_01_04_173148_create_admin_tables',2),(53,'2017_07_17_040159_create_exceptions_table',3),(54,'2017_07_17_040159_create_config_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1,2,'2018-07-10 15:53:47','2018-07-10 15:53:47'),(2,2,2,'2018-07-10 15:53:47','2018-07-10 15:53:47'),(3,3,2,'2018-07-10 15:53:47','2018-07-10 15:53:47'),(4,4,2,'2018-07-10 15:53:47','2018-07-10 15:53:47');
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `permission_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_user_permission_id_index` (`permission_id`),
  KEY `permission_user_user_id_index` (`user_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `permission_user` WRITE;
/*!40000 ALTER TABLE `permission_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_user` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'Can View Users','view.users','Can view users','Permission','2018-07-10 15:53:47','2018-07-10 15:53:47',NULL),(2,'Can Create Users','create.users','Can create new users','Permission','2018-07-10 15:53:47','2018-07-10 15:53:47',NULL),(3,'Can Edit Users','edit.users','Can edit users','Permission','2018-07-10 15:53:47','2018-07-10 15:53:47',NULL),(4,'Can Delete Users','delete.users','Can delete users','Permission','2018-07-10 15:53:47','2018-07-10 15:53:47',NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pessoa_enderecos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa_enderecos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(10) unsigned NOT NULL,
  `endereco` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pessoa_enderecos_pessoa_id_foreign` (`pessoa_id`),
  CONSTRAINT `pessoa_enderecos_pessoa_id_foreign` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pessoa_enderecos` WRITE;
/*!40000 ALTER TABLE `pessoa_enderecos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pessoa_enderecos` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pessoa_fisica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa_fisica` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(10) unsigned NOT NULL,
  `cpf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aniversario` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pessoa_fisica_pessoa_id_foreign` (`pessoa_id`),
  CONSTRAINT `pessoa_fisica_pessoa_id_foreign` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pessoa_fisica` WRITE;
/*!40000 ALTER TABLE `pessoa_fisica` DISABLE KEYS */;
/*!40000 ALTER TABLE `pessoa_fisica` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pessoa_juridica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa_juridica` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(10) unsigned NOT NULL,
  `fantasia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnpj` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ie` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pessoa_juridica_pessoa_id_foreign` (`pessoa_id`),
  CONSTRAINT `pessoa_juridica_pessoa_id_foreign` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pessoa_juridica` WRITE;
/*!40000 ALTER TABLE `pessoa_juridica` DISABLE KEYS */;
/*!40000 ALTER TABLE `pessoa_juridica` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pessoa_telefones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa_telefones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(10) unsigned NOT NULL,
  `tipo_contato_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ramal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pessoa_telefones_pessoa_id_foreign` (`pessoa_id`),
  CONSTRAINT `pessoa_telefones_pessoa_id_foreign` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pessoa_telefones` WRITE;
/*!40000 ALTER TABLE `pessoa_telefones` DISABLE KEYS */;
/*!40000 ALTER TABLE `pessoa_telefones` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pessoa_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa_tipo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pessoa_tipo` WRITE;
/*!40000 ALTER TABLE `pessoa_tipo` DISABLE KEYS */;
INSERT INTO `pessoa_tipo` VALUES (1,'Fisíca',1,'2018-07-10 15:53:50','2018-07-10 15:53:50'),(2,'Jurídica',1,'2018-07-10 15:53:50','2018-07-10 15:53:50'),(3,'Pessoa Juridica',1,'2018-07-10 15:53:50','2018-07-10 15:53:50');
/*!40000 ALTER TABLE `pessoa_tipo` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pessoas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_id` int(10) unsigned NOT NULL,
  `empresa_id` int(10) unsigned NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `informacoes` text COLLATE utf8mb4_unicode_ci,
  `site` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pessoas_tipo_id_foreign` (`tipo_id`),
  KEY `pessoas_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `pessoas_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`),
  CONSTRAINT `pessoas_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `pessoa_tipo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pessoas` WRITE;
/*!40000 ALTER TABLE `pessoas` DISABLE KEYS */;
INSERT INTO `pessoas` VALUES (2,1,1,NULL,'Cesar','cesar@mail.com','teste','',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `pessoas` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `theme_id` int(10) unsigned NOT NULL DEFAULT '1',
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `twitter_username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github_username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_status` tinyint(1) NOT NULL DEFAULT '0',
  `user_profile_bg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '/images/default-user-bg.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profiles_theme_id_foreign` (`theme_id`),
  KEY `profiles_user_id_index` (`user_id`),
  CONSTRAINT `profiles_theme_id_foreign` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`),
  CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (1,2,1,NULL,NULL,NULL,NULL,NULL,0,'/images/default-user-bg.png','2018-07-10 15:53:50','2018-07-10 15:53:50'),(2,3,1,NULL,NULL,NULL,NULL,NULL,0,'/images/default-user-bg.png','2018-07-10 15:53:50','2018-07-10 15:53:50'),(3,4,1,NULL,NULL,NULL,NULL,NULL,0,'/images/default-user-bg.png','2018-07-11 02:42:41','2018-07-11 02:42:41');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `scaffoldinterface_id` int(10) unsigned NOT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `having` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `relations_scaffoldinterface_id_foreign` (`scaffoldinterface_id`),
  CONSTRAINT `relations_scaffoldinterface_id_foreign` FOREIGN KEY (`scaffoldinterface_id`) REFERENCES `scaffoldinterfaces` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `relations` WRITE;
/*!40000 ALTER TABLE `relations` DISABLE KEYS */;
/*!40000 ALTER TABLE `relations` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,1,'2018-07-10 15:53:50','2018-07-10 15:53:50'),(2,2,2,'2018-07-10 15:53:50','2018-07-10 15:53:50'),(3,3,3,'2018-07-10 15:53:50','2018-07-10 15:53:50'),(4,3,4,'2018-07-11 02:42:41','2018-07-11 02:42:41');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Owner','owner','Owner Role',7,'2018-07-10 15:53:47','2018-07-10 15:53:47',NULL),(2,'Admin','admin','Admin Role',5,'2018-07-10 15:53:47','2018-07-10 15:53:47',NULL),(3,'User','user','User Role',1,'2018-07-10 15:53:47','2018-07-10 15:53:47',NULL),(4,'Unverified','unverified','Unverified Role',0,'2018-07-10 15:53:47','2018-07-10 15:53:47',NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `scaffoldinterfaces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scaffoldinterfaces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tablename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `scaffoldinterfaces` WRITE;
/*!40000 ALTER TABLE `scaffoldinterfaces` DISABLE KEYS */;
/*!40000 ALTER TABLE `scaffoldinterfaces` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `social_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_logins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `provider` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_logins_user_id_index` (`user_id`),
  CONSTRAINT `social_logins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `social_logins` WRITE;
/*!40000 ALTER TABLE `social_logins` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_logins` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `company_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_user_id_foreign` (`user_id`),
  KEY `tasks_company_id_foreign` (`company_id`),
  CONSTRAINT `tasks_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `empresas` (`id`),
  CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `themes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `taggable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taggable_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `themes_name_unique` (`name`),
  UNIQUE KEY `themes_link_unique` (`link`),
  KEY `themes_taggable_type_taggable_id_index` (`taggable_type`,`taggable_id`),
  KEY `themes_id_index` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=289 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `themes` WRITE;
/*!40000 ALTER TABLE `themes` DISABLE KEYS */;
INSERT INTO `themes` VALUES (1,'Default','material.min.css',NULL,1,'theme',1,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(2,'Amber / Blue','material.amber-blue.min.css',NULL,1,'theme',2,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(3,'Amber / Cyan','material.amber-cyan.min.css',NULL,1,'theme',3,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(4,'Amber / Deep Orange','material.amber-deep_orange.min.css',NULL,1,'theme',4,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(5,'Amber / Deep Purple','material.amber-deep_purple.min.css',NULL,1,'theme',5,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(6,'Amber / Green','material.amber-green.min.css',NULL,1,'theme',6,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(7,'Amber / Indigo','material.amber-indigo.min.css',NULL,1,'theme',7,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(8,'Amber / Light Blue','material.amber-light_blue.min.css',NULL,1,'theme',8,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(9,'Amber / Light Green','material.amber-light_green.min.css',NULL,1,'theme',9,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(10,'Amber / Lime','material.amber-lime.min.css',NULL,1,'theme',10,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(11,'Amber / Orange','material.amber-orange.min.css',NULL,1,'theme',11,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(12,'Amber / Pink','material.amber-pink.min.css',NULL,1,'theme',12,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(13,'Amber / Purple','material.amber-purple.min.css',NULL,1,'theme',13,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(14,'Amber / Red','material.amber-red.min.css',NULL,1,'theme',14,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(15,'Amber / Teal','material.amber-teal.min.css',NULL,1,'theme',15,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(16,'Amber / Yellow','material.amber-yellow.min.css',NULL,1,'theme',16,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(17,'Blue Grey / Amber','material.blue_grey-amber.min.css',NULL,1,'theme',17,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(18,'Blue Grey / Blue','material.blue_grey-blue.min.css',NULL,1,'theme',18,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(19,'Blue Grey / Cyan','material.blue_grey-cyan.min.css',NULL,1,'theme',19,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(20,'Blue Grey / Deep Orange','material.blue_grey-deep_orange.min.css',NULL,1,'theme',20,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(21,'Blue Grey / Deep Purple','material.blue_grey-deep_purple.min.css',NULL,1,'theme',21,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(22,'Blue Grey / Green','material.blue_grey-green.min.css',NULL,1,'theme',22,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(23,'Blue Grey / Indigo','material.blue_grey-indigo.min.css',NULL,1,'theme',23,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(24,'Blue Grey / Light Blue','material.blue_grey-light_blue.min.css',NULL,1,'theme',24,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(25,'Blue Grey / Light Green','material.blue_grey-light_green.min.css',NULL,1,'theme',25,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(26,'Blue Grey / Lime','material.blue_grey-lime.min.css',NULL,1,'theme',26,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(27,'Blue Grey / Orange','material.blue_grey-orange.min.css',NULL,1,'theme',27,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(28,'Blue Grey / Pink','material.blue_grey-pink.min.css',NULL,1,'theme',28,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(29,'Blue Grey / Purple','material.blue_grey-purple.min.css',NULL,1,'theme',29,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(30,'Blue Grey / Red','material.blue_grey-red.min.css',NULL,1,'theme',30,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(31,'Blue Grey / Teal','material.blue_grey-teal.min.css',NULL,1,'theme',31,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(32,'Blue Grey / Yellow','material.blue_grey-yellow.min.css',NULL,1,'theme',32,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(33,'Blue / Amber','material.blue-amber.min.css',NULL,1,'theme',33,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(34,'Blue / Cyan','material.blue-cyan.min.css',NULL,1,'theme',34,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(35,'Blue / Deep Orange','material.blue-deep_orange.min.css',NULL,1,'theme',35,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(36,'Blue / Deep Purple','material.blue-deep_purple.min.css',NULL,1,'theme',36,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(37,'Blue / Green','material.blue-green.min.css',NULL,1,'theme',37,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(38,'Blue / Indigo','material.blue-indigo.min.css',NULL,1,'theme',38,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(39,'Blue / Light Blue','material.blue-light_blue.min.css',NULL,1,'theme',39,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(40,'Blue / Light Green','material.blue-light_green.min.css',NULL,1,'theme',40,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(41,'Blue / Lime','material.blue-lime.min.css',NULL,1,'theme',41,'2018-07-10 15:53:47','2018-07-10 15:53:49',NULL),(42,'Blue / Orange','material.blue-orange.min.css',NULL,1,'theme',42,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(43,'Blue / Pink','material.blue-pink.min.css',NULL,1,'theme',43,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(44,'Blue / Purple','material.blue-purple.min.css',NULL,1,'theme',44,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(45,'Blue / Red','material.blue-red.min.css',NULL,1,'theme',45,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(46,'Blue / Teal','material.blue-teal.min.css',NULL,1,'theme',46,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(47,'Blue / Yellow','material.blue-yellow.min.css',NULL,1,'theme',47,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(48,'Brown / Amber','material.brown-amber.min.css',NULL,1,'theme',48,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(49,'Brown / Blue','material.brown-blue.min.css',NULL,1,'theme',49,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(50,'Brown / Cyan','material.brown-cyan.min.css',NULL,1,'theme',50,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(51,'Brown / Deep Orange','material.brown-deep_orange.min.css',NULL,1,'theme',51,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(52,'Brown / Deep Purple','material.brown-deep_purple.min.css',NULL,1,'theme',52,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(53,'Brown / Green','material.brown-green.min.css',NULL,1,'theme',53,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(54,'Brown / Indigo','material.brown-indigo.min.css',NULL,1,'theme',54,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(55,'Brown / Light Blue','material.brown-light_blue.min.css',NULL,1,'theme',55,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(56,'Brown / Light Green','material.brown-light_green.min.css',NULL,1,'theme',56,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(57,'Brown / Lime','material.brown-lime.min.css',NULL,1,'theme',57,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(58,'Brown / Orange','material.brown-orange.min.css',NULL,1,'theme',58,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(59,'Brown / Pink','material.brown-pink.min.css',NULL,1,'theme',59,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(60,'Brown / Purple','material.brown-purple.min.css',NULL,1,'theme',60,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(61,'Brown / Red','material.brown-red.min.css',NULL,1,'theme',61,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(62,'Brown / Teal','material.brown-teal.min.css',NULL,1,'theme',62,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(63,'Brown / Yellow','material.brown-yellow.min.css',NULL,1,'theme',63,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(64,'Cyan / Amber','material.cyan-amber.min.css',NULL,1,'theme',64,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(65,'Cyan / Blue','material.cyan-blue.min.css',NULL,1,'theme',65,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(66,'Cyan / Deep Orange','material.cyan-deep_orange.min.css',NULL,1,'theme',66,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(67,'Cyan / Deep Purple','material.cyan-deep_purple.min.css',NULL,1,'theme',67,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(68,'Cyan / Green','material.cyan-green.min.css',NULL,1,'theme',68,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(69,'Cyan / Indigo','material.cyan-indigo.min.css',NULL,1,'theme',69,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(70,'Cyan / Light Blue','material.cyan-light_blue.min.css',NULL,1,'theme',70,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(71,'Cyan / Light Green','material.cyan-light_green.min.css',NULL,1,'theme',71,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(72,'Cyan / Lime','material.cyan-lime.min.css',NULL,1,'theme',72,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(73,'Cyan / Orange','material.cyan-orange.min.css',NULL,1,'theme',73,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(74,'Cyan / Pink','material.cyan-pink.min.css',NULL,1,'theme',74,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(75,'Cyan / Purple','material.cyan-purple.min.css',NULL,1,'theme',75,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(76,'Cyan / Red','material.cyan-red.min.css',NULL,1,'theme',76,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(77,'Cyan / Teal','material.cyan-teal.min.css',NULL,1,'theme',77,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(78,'Cyan / Yellow','material.cyan-yellow.min.css',NULL,1,'theme',78,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(79,'Deep Orange / Amber','material.deep_orange-amber.min.css',NULL,1,'theme',79,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(80,'Deep Orange / Blue','material.deep_orange-blue.min.css',NULL,1,'theme',80,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(81,'Deep Orange / Cyan','material.deep_orange-cyan.min.css',NULL,1,'theme',81,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(82,'Deep Orange / Deep Purple','material.deep_orange-deep_purple.min.css',NULL,1,'theme',82,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(83,'Deep Orange / Green','material.deep_orange-green.min.css',NULL,1,'theme',83,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(84,'Deep Orange / Indigo','material.deep_orange-indigo.min.css',NULL,1,'theme',84,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(85,'Deep Orange / Light Blue','material.deep_orange-light_blue.min.css',NULL,1,'theme',85,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(86,'Deep Orange / Light Green','material.deep_orange-light_green.min.css',NULL,1,'theme',86,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(87,'Deep Orange / Lime','material.deep_orange-lime.min.css',NULL,1,'theme',87,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(88,'Deep Orange / Orange','material.deep_orange-orange.min.css',NULL,1,'theme',88,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(89,'Deep Orange / Pink','material.deep_orange-pink.min.css',NULL,1,'theme',89,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(90,'Deep Orange / Purple','material.deep_orange-purple.min.css',NULL,1,'theme',90,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(91,'Deep Orange / Red','material.deep_orange-red.min.css',NULL,1,'theme',91,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(92,'Deep Orange / Teal','material.deep_orange-teal.min.css',NULL,1,'theme',92,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(93,'Deep Orange / Yellow','material.deep_orange-yellow.min.css',NULL,1,'theme',93,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(94,'Deep Purple / Amber','material.deep_purple-amber.min.css',NULL,1,'theme',94,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(95,'Deep Purple / Blue','material.deep_purple-blue.min.css',NULL,1,'theme',95,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(96,'Deep Purple / Cyan','material.deep_purple-cyan.min.css',NULL,1,'theme',96,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(97,'Deep Purple / Deep Orange','material.deep_purple-deep_orange.min.css',NULL,1,'theme',97,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(98,'Deep Purple / Green','material.deep_purple-green.min.css',NULL,1,'theme',98,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(99,'Yellow / Teal','material.yellow-teal.min.css',NULL,1,'theme',99,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(100,'Yellow / Red','material.yellow-red.min.css',NULL,1,'theme',100,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(101,'Yellow / Orange','material.yellow-orange.min.css',NULL,1,'theme',101,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(102,'Yellow / Pink','material.yellow-pink.min.css',NULL,1,'theme',102,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(103,'Yellow / Purple','material.yellow-purple.min.css',NULL,1,'theme',103,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(104,'Yellow / Lime','material.yellow-lime.min.css',NULL,1,'theme',104,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(105,'Yellow / Light Green','material.yellow-light_green.min.css',NULL,1,'theme',105,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(106,'Yellow / Indigo','material.yellow-indigo.min.css',NULL,1,'theme',106,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(107,'Yellow / Light Blue','material.yellow-light_blue.min.css',NULL,1,'theme',107,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(108,'Yellow / Green','material.yellow-green.min.css',NULL,1,'theme',108,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(109,'Yellow / Deep Purple','material.yellow-deep_purple.min.css',NULL,1,'theme',109,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(110,'Yellow / Deep Orange','material.yellow-deep_orange.min.css',NULL,1,'theme',110,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(111,'Yellow / Cyan','material.yellow-cyan.min.css',NULL,1,'theme',111,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(112,'Yellow / Blue','material.yellow-blue.min.css',NULL,1,'theme',112,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(113,'Yellow / Amber','material.yellow-amber.min.css',NULL,1,'theme',113,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(114,'Teal / Yellow','material.teal-yellow.min.css',NULL,1,'theme',114,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(115,'Teal / Red','material.teal-red.min.css',NULL,1,'theme',115,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(116,'Teal / Purple','material.teal-purple.min.css',NULL,1,'theme',116,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(117,'Teal / Pink','material.teal-pink.min.css',NULL,1,'theme',117,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(118,'Teal / Orange','material.teal-orange.min.css',NULL,1,'theme',118,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(119,'Teal / Lime','material.teal-lime.min.css',NULL,1,'theme',119,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(120,'Teal / Light Green','material.teal-light_green.min.css',NULL,1,'theme',120,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(121,'Teal / Light Blue','material.teal-light_blue.min.css',NULL,1,'theme',121,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(122,'Teal / Indigo','material.teal-indigo.min.css',NULL,1,'theme',122,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(123,'Teal / Green','material.teal-green.min.css',NULL,1,'theme',123,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(124,'Teal / Deep Purple','material.teal-deep_purple.min.css',NULL,1,'theme',124,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(125,'Teal / Deep Orange','material.teal-deep_orange.min.css',NULL,1,'theme',125,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(126,'Teal / Cyan','material.teal-cyan.min.css',NULL,1,'theme',126,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(127,'Teal / Blue','material.teal-blue.min.css',NULL,1,'theme',127,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(128,'Teal / Amber','material.teal-amber.min.css',NULL,1,'theme',128,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(129,'Red / Yellow','material.red-yellow.min.css',NULL,1,'theme',129,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(130,'Red / Teal','material.red-teal.min.css',NULL,1,'theme',130,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(131,'Red / Purple','material.red-purple.min.css',NULL,1,'theme',131,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(132,'Red / Pink','material.red-pink.min.css',NULL,1,'theme',132,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(133,'Red / Orange','material.red-orange.min.css',NULL,1,'theme',133,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(134,'Red / Lime','material.red-lime.min.css',NULL,1,'theme',134,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(135,'Red / Light Green','material.red-light_green.min.css',NULL,1,'theme',135,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(136,'Red / Light Blue','material.red-light_blue.min.css',NULL,1,'theme',136,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(137,'Red / Indigo','material.red-indigo.min.css',NULL,1,'theme',137,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(138,'Red / Green','material.red-green.min.css',NULL,1,'theme',138,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(139,'Red / Deep Purple','material.red-deep_purple.min.css',NULL,1,'theme',139,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(140,'Red / Deep Orange','material.red-deep_orange.min.css',NULL,1,'theme',140,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(141,'Red / Cyan','material.red-cyan.min.css',NULL,1,'theme',141,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(142,'Red / Blue','material.red-blue.min.css',NULL,1,'theme',142,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(143,'Red / Amber','material.red-amber.min.css',NULL,1,'theme',143,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(144,'Purple / Yellow','material.purple-yellow.min.css',NULL,1,'theme',144,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(145,'Purple / Teal','material.purple-teal.min.css',NULL,1,'theme',145,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(146,'Purple / Pink','material.purple-pink.min.css',NULL,1,'theme',146,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(147,'Purple / Orange','material.purple-orange.min.css',NULL,1,'theme',147,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(148,'Purple / Lime','material.purple-lime.min.css',NULL,1,'theme',148,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(149,'Purple / Light Green','material.purple-light_green.min.css',NULL,1,'theme',149,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(150,'Purple / Light Blue','material.purple-light_blue.min.css',NULL,1,'theme',150,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(151,'Purple / Indigo','material.purple-indigo.min.css',NULL,1,'theme',151,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(152,'Purple / Green','material.purple-green.min.css',NULL,1,'theme',152,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(153,'Purple / Deep Purple','material.purple-deep_purple.min.css',NULL,1,'theme',153,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(154,'Purple / Deep Orange','material.purple-deep_orange.min.css',NULL,1,'theme',154,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(155,'Purple / Cyan','material.purple-cyan.min.css',NULL,1,'theme',155,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(156,'Purple / Blue','material.purple-blue.min.css',NULL,1,'theme',156,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(157,'Purple / Amber','material.purple-amber.min.css',NULL,1,'theme',157,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(158,'Pink / Yellow','material.pink-yellow.min.css',NULL,1,'theme',158,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(159,'Pink / Teal','material.pink-teal.min.css',NULL,1,'theme',159,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(160,'Pink / Red','material.pink-red.min.css',NULL,1,'theme',160,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(161,'Pink / Purple','material.pink-purple.min.css',NULL,1,'theme',161,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(162,'Pink / Orange','material.pink-orange.min.css',NULL,1,'theme',162,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(163,'Pink / Lime','material.pink-lime.min.css',NULL,1,'theme',163,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(164,'Pink / Light Green','material.pink-light_green.min.css',NULL,1,'theme',164,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(165,'Pink / Light Blue','material.pink-light_blue.min.css',NULL,1,'theme',165,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(166,'Pink / Indigo','material.pink-indigo.min.css',NULL,1,'theme',166,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(167,'Pink / Green','material.pink-green.min.css',NULL,1,'theme',167,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(168,'Pink / Deep Purple','material.pink-deep_purple.min.css',NULL,1,'theme',168,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(169,'Pink / Deep Orange','material.pink-deep_orange.min.css',NULL,1,'theme',169,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(170,'Pink / Cyan','material.pink-cyan.min.css',NULL,1,'theme',170,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(171,'Pink / Blue','material.pink-blue.min.css',NULL,1,'theme',171,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(172,'Pink / Amber','material.pink-amber.min.css',NULL,1,'theme',172,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(173,'Orange / Yellow','material.orange-yellow.min.css',NULL,1,'theme',173,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(174,'Orange / Teal','material.orange-teal.min.css',NULL,1,'theme',174,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(175,'Orange / Red','material.orange-red.min.css',NULL,1,'theme',175,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(176,'Orange / Purple','material.orange-purple.min.css',NULL,1,'theme',176,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(177,'Orange / Pink','material.orange-pink.min.css',NULL,1,'theme',177,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(178,'Orange / Lime','material.orange-lime.min.css',NULL,1,'theme',178,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(179,'Orange / Light Green','material.orange-light_green.min.css',NULL,1,'theme',179,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(180,'Orange / Light Blue','material.orange-light_blue.min.css',NULL,1,'theme',180,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(181,'Orange / Indigo','material.orange-indigo.min.css',NULL,1,'theme',181,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(182,'Orange / Green','material.orange-green.min.css',NULL,1,'theme',182,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(183,'Orange / Deep Purple','material.orange-deep_purple.min.css',NULL,1,'theme',183,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(184,'Orange / Deep Orange','material.orange-deep_orange.min.css',NULL,1,'theme',184,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(185,'Orange / Cyan','material.orange-cyan.min.css',NULL,1,'theme',185,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(186,'Orange / Amber','material.orange-amber.min.css',NULL,1,'theme',186,'2018-07-10 15:53:48','2018-07-10 15:53:49',NULL),(187,'Orange / Blue','material.orange-blue.min.css',NULL,1,'theme',187,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(188,'Lime / Yellow','material.lime-yellow.min.css',NULL,1,'theme',188,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(189,'Lime / Teal','material.lime-teal.min.css',NULL,1,'theme',189,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(190,'Lime / Red','material.lime-red.min.css',NULL,1,'theme',190,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(191,'Lime / Purple','material.lime-purple.min.css',NULL,1,'theme',191,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(192,'Lime / Pink','material.lime-pink.min.css',NULL,1,'theme',192,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(193,'Lime / Orange','material.lime-orange.min.css',NULL,1,'theme',193,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(194,'Lime / Light Green','material.lime-light_green.min.css',NULL,1,'theme',194,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(195,'Lime / Light Blue','material.lime-light_blue.min.css',NULL,1,'theme',195,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(196,'Lime / Indigo','material.lime-indigo.min.css',NULL,1,'theme',196,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(197,'Lime / Green','material.lime-green.min.css',NULL,1,'theme',197,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(198,'Lime / Deep Orange','material.lime-deep_orange.min.css',NULL,1,'theme',198,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(199,'Lime / Deep Purple','material.lime-deep_purple.min.css',NULL,1,'theme',199,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(200,'Lime / Cyan','material.lime-cyan.min.css',NULL,1,'theme',200,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(201,'Lime / Blue','material.lime-blue.min.css',NULL,1,'theme',201,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(202,'Lime / Amber','material.lime-amber.min.css',NULL,1,'theme',202,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(203,'Light Green / Yellow','material.light_green-yellow.min.css',NULL,1,'theme',203,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(204,'Light Green / Teal','material.light_green-teal.min.css',NULL,1,'theme',204,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(205,'Light Green / Red','material.light_green-red.min.css',NULL,1,'theme',205,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(206,'Light Green / Purple','material.light_green-purple.min.css',NULL,1,'theme',206,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(207,'Light Green / Pink','material.light_green-pink.min.css',NULL,1,'theme',207,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(208,'Light Green / Orange','material.light_green-orange.min.css',NULL,1,'theme',208,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(209,'Light Green / Lime','material.light_green-lime.min.css',NULL,1,'theme',209,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(210,'Light Green / Light Blue','material.light_green-light_blue.min.css',NULL,1,'theme',210,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(211,'Light Green / Indigo','material.light_green-indigo.min.css',NULL,1,'theme',211,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(212,'Light Green / Green','material.light_green-green.min.css',NULL,1,'theme',212,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(213,'Light Green / Deep Purple','material.light_green-deep_purple.min.css',NULL,1,'theme',213,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(214,'Light Green / Deep Orange','material.light_green-deep_orange.min.css',NULL,1,'theme',214,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(215,'Light Green / Cyan','material.light_green-cyan.min.css',NULL,1,'theme',215,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(216,'Light Green / Blue','material.light_green-blue.min.css',NULL,1,'theme',216,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(217,'Light Green / Amber','material.light_green-amber.min.css',NULL,1,'theme',217,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(218,'Light Blue / Yellow','material.light_blue-yellow.min.css',NULL,1,'theme',218,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(219,'Light Blue / Teal','material.light_blue-teal.min.css',NULL,1,'theme',219,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(220,'Light Blue / Red','material.light_blue-red.min.css',NULL,1,'theme',220,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(221,'Light Blue / Purple','material.light_blue-purple.min.css',NULL,1,'theme',221,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(222,'Light Blue / Pink','material.light_blue-pink.min.css',NULL,1,'theme',222,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(223,'Light Blue / Orange','material.light_blue-orange.min.css',NULL,1,'theme',223,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(224,'Light Blue / Lime','material.light_blue-lime.min.css',NULL,1,'theme',224,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(225,'Light Blue / Light Green','material.light_blue-light_green.min.css',NULL,1,'theme',225,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(226,'Light Blue / Indigo','material.light_blue-indigo.min.css',NULL,1,'theme',226,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(227,'Light Blue / Green','material.light_blue-green.min.css',NULL,1,'theme',227,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(228,'Light Blue / Deep Purple','material.light_blue-deep_purple.min.css',NULL,1,'theme',228,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(229,'Light Blue / Deep Orange','material.light_blue-deep_orange.min.css',NULL,1,'theme',229,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(230,'Light Blue / Cyan','material.light_blue-cyan.min.css',NULL,1,'theme',230,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(231,'Light Blue / Blue','material.light_blue-blue.min.css',NULL,1,'theme',231,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(232,'Light Blue / Amber','material.light_blue-amber.min.css',NULL,1,'theme',232,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(233,'Indigo / Yellow','material.indigo-yellow.min.css',NULL,1,'theme',233,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(234,'Indigo / Teal','material.indigo-teal.min.css',NULL,1,'theme',234,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(235,'Indigo / Red','material.indigo-red.min.css',NULL,1,'theme',235,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(236,'Indigo / Purple','material.indigo-purple.min.css',NULL,1,'theme',236,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(237,'Indigo / Pink','material.indigo-pink.min.css',NULL,1,'theme',237,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(238,'Indigo / Orange','material.indigo-orange.min.css',NULL,1,'theme',238,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(239,'Indigo / Lime','material.indigo-lime.min.css',NULL,1,'theme',239,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(240,'Indigo / Light Green','material.indigo-light_green.min.css',NULL,1,'theme',240,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(241,'Indigo / Light Blue','material.indigo-light_blue.min.css',NULL,1,'theme',241,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(242,'Indigo / Green','material.indigo-green.min.css',NULL,1,'theme',242,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(243,'Indigo / Deep Purple','material.indigo-deep_purple.min.css',NULL,1,'theme',243,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(244,'Indigo / Deep Orange','material.indigo-deep_orange.min.css',NULL,1,'theme',244,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(245,'Indigo / Cyan','material.indigo-cyan.min.css',NULL,1,'theme',245,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(246,'Indigo / Blue','material.indigo-blue.min.css',NULL,1,'theme',246,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(247,'Indigo / Amber','material.indigo-amber.min.css',NULL,1,'theme',247,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(248,'Grey / Yellow','material.grey-yellow.min.css',NULL,1,'theme',248,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(249,'Grey / Teal','material.grey-teal.min.css',NULL,1,'theme',249,'2018-07-10 15:53:48','2018-07-10 15:53:50',NULL),(250,'Grey / Red','material.grey-red.min.css',NULL,1,'theme',250,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(251,'Grey / Purple','material.grey-purple.min.css',NULL,1,'theme',251,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(252,'Grey / Pink','material.grey-pink.min.css',NULL,1,'theme',252,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(253,'Grey / Orange','material.grey-orange.min.css',NULL,1,'theme',253,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(254,'Grey / Lime','material.grey-lime.min.css',NULL,1,'theme',254,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(255,'Grey / Light Green','material.grey-light_green.min.css',NULL,1,'theme',255,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(256,'Grey / Light Blue','material.grey-light_blue.min.css',NULL,1,'theme',256,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(257,'Grey / Indigo','material.grey-indigo.min.css',NULL,1,'theme',257,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(258,'Grey / Green','material.grey-green.min.css',NULL,1,'theme',258,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(259,'Grey / Deep Purple','material.grey-deep_purple.min.css',NULL,1,'theme',259,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(260,'Grey / Deep Orange','material.grey-deep_orange.min.css',NULL,1,'theme',260,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(261,'Grey / Cyan','material.grey-cyan.min.css',NULL,1,'theme',261,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(262,'Grey / Blue','material.grey-blue.min.css',NULL,1,'theme',262,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(263,'Grey / Amber','material.grey-amber.min.css',NULL,1,'theme',263,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(264,'Green / Yellow','material.green-yellow.min.css',NULL,1,'theme',264,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(265,'Green / Teal','material.green-teal.min.css',NULL,1,'theme',265,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(266,'Green / Red','material.green-red.min.css',NULL,1,'theme',266,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(267,'Green / Purple','material.green-purple.min.css',NULL,1,'theme',267,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(268,'Green / Pink','material.green-pink.min.css',NULL,1,'theme',268,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(269,'Green / Orange','material.green-orange.min.css',NULL,1,'theme',269,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(270,'Green / Lime','material.green-lime.min.css',NULL,1,'theme',270,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(271,'Green / Light Green','material.green-light_green.min.css',NULL,1,'theme',271,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(272,'Green / Light Blue','material.green-light_blue.min.css',NULL,1,'theme',272,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(273,'Green / Indigo','material.green-indigo.min.css',NULL,1,'theme',273,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(274,'Green / Deep Purple','material.green-deep_purple.min.css',NULL,1,'theme',274,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(275,'Green / Deep Orange','material.green-deep_orange.min.css',NULL,1,'theme',275,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(276,'Green / Cyan','material.green-cyan.min.css',NULL,1,'theme',276,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(277,'Green / Blue','material.green-blue.min.css',NULL,1,'theme',277,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(278,'Green / Amber','material.green-amber.min.css',NULL,1,'theme',278,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(279,'Deep Purple / Yellow','material.deep_purple-yellow.min.css',NULL,1,'theme',279,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(280,'Deep Purple / Teal','material.deep_purple-teal.min.css',NULL,1,'theme',280,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(281,'Deep Purple / Red','material.deep_purple-red.min.css',NULL,1,'theme',281,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(282,'Deep Purple / Purple','material.deep_purple-purple.min.css',NULL,1,'theme',282,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(283,'Deep Purple / Pink','material.deep_purple-pink.min.css',NULL,1,'theme',283,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(284,'Deep Purple / Orange','material.deep_purple-orange.min.css',NULL,1,'theme',284,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(285,'Deep Purple / Lime','material.deep_purple-lime.min.css',NULL,1,'theme',285,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(286,'Deep Purple / Light Green','material.deep_purple-light_green.min.css',NULL,1,'theme',286,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(287,'Deep Purple / Light Blue','material.deep_purple-light_blue.min.css',NULL,1,'theme',287,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL),(288,'Deep Purple / Indigo','material.deep_purple-indigo.min.css',NULL,1,'theme',288,'2018-07-10 15:53:49','2018-07-10 15:53:50',NULL);
/*!40000 ALTER TABLE `themes` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tipo_contato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_contato` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tipo_contato` WRITE;
/*!40000 ALTER TABLE `tipo_contato` DISABLE KEYS */;
INSERT INTO `tipo_contato` VALUES (1,'Telefone Fixo',1,'2018-07-10 15:53:50','2018-07-10 15:53:50'),(2,'Celular',1,'2018-07-10 15:53:50','2018-07-10 15:53:50'),(3,'Fax',1,'2018-07-10 15:53:50','2018-07-10 15:53:50');
/*!40000 ALTER TABLE `tipo_contato` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signup_ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signup_confirmation_ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signup_sm_ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_unique` (`name`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_company_id_foreign` (`company_id`),
  CONSTRAINT `users_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `empresas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'julie.mcclure','Antonia','Daugherty','owner@owner.com','$2y$10$Jp79ZKhst2Iys4q3HdDr3OeiF6z65qtUD.bKMkiIJHpBM6OfN1GoS',1,NULL,1,'N51QFZXCnN0TazQiW09AeyEc64qwwbOdoIf2RCxwr1dKUdjFHtPTW3SIYADgLwDD',NULL,'104.97.123.86',NULL,'61.60.37.215',NULL,NULL,'2018-07-10 15:53:50','2018-07-10 15:53:50',NULL),(2,'michel67','Madelyn','Schowalter','admin@admin.com','$2y$10$7z6ZUEhdosKA0NsLv7.1HuquHYdIROF/bTp8LMnOypEkejzs7HrCW',1,NULL,1,'G84rG2Eb8U8JJPGBSx4ij9CpSg2whp65nEUuozD5Wj5H9t1Be0u2RXm1OT9RRjnD',NULL,'43.33.203.82',NULL,'181.122.24.208',NULL,NULL,'2018-07-10 15:53:50','2018-07-10 15:53:50',NULL),(3,'eldora.braun','Eduardo','Ebert','user@user.com','$2y$10$8Hqguv62QdZzVaTJV5sKGeanj.nSiNsQINRnqFJaFgLi61Of8d7vK',1,NULL,1,'ZvwbDCk8TDHwfr8sT7h0BXuwQDc1hWB2Csr6zGJdp8PzrKGLhzSuT5AqM8ips6Zl','236.247.167.41','180.104.254.42',NULL,NULL,NULL,NULL,'2018-07-10 15:53:50','2018-07-10 15:53:50',NULL),(4,'cezzaar','César Augusto Silva','Sousa','cezzaar@gmail.com','$2y$10$zKNEbhpQOl2Tw/PSRSoMkugmgDuaW8MLKxElDa0E5BmH9P5BZDx92',1,NULL,1,'bwKZfqKxhsc6XYUJYieAzssJxpvCNjSPQGJvnurVZW3md4MPYYVdylukSBckdGDM',NULL,NULL,NULL,'0.0.0.0',NULL,NULL,'2018-07-11 02:42:41','2018-07-11 02:42:41',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

