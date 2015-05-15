-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.16 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              8.3.0.4792
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица edecationhub.countries
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы edecationhub.countries: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` (`id`, `name`) VALUES
	(1, 'USA'),
	(2, 'Ukraine'),
	(3, 'Singapore');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;


-- Дамп структуры для таблица edecationhub.rols
CREATE TABLE IF NOT EXISTS `rols` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `short` varchar(50) CHARACTER SET latin1 DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы edecationhub.rols: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `rols` DISABLE KEYS */;
INSERT INTO `rols` (`id`, `name`, `short`) VALUES
	(1, 'Administrator', 'admin'),
	(2, 'Owner', 'owner');
/*!40000 ALTER TABLE `rols` ENABLE KEYS */;


-- Дамп структуры для таблица edecationhub.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы edecationhub.settings: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `name`, `value`) VALUES
	(1, 'SITE', 'mobileideaworks-test'),
	(2, 'KEY', 'test_ucu7p1sHISDNykU2M8cdbWMimNwmwWSRsU'),
	(3, 'CUSTOMER_ID', 'education_2uENY39VP87i7GH7ud');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;


-- Дамп структуры для таблица edecationhub.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `paid` tinyint(4) DEFAULT '0',
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT '0',
  `institute_name` varchar(255) DEFAULT NULL,
  `sub_domen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_users_rols` (`role_id`),
  KEY `FK_users_countries` (`country_id`),
  CONSTRAINT `FK_users_rols` FOREIGN KEY (`role_id`) REFERENCES `rols` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы edecationhub.users: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `role_id`, `status`, `paid`, `username`, `password`, `first_name`, `last_name`, `phone`, `country_id`, `institute_name`, `sub_domen`) VALUES
	(6, 1, 1, 0, '00@local.net', 'd5dcf51903d738183fdf2865b15f1a3ae8daa8735b15caad0469de57a03b3fcf', 'Administrator', '', '7482394', 1, '', 'admin'),
	(12, 2, 1, 1, 'ost.vas@mail.ru', 'd5dcf51903d738183fdf2865b15f1a3ae8daa8735b15caad0469de57a03b3fcf', 'Administrator', 'Admin', '42378904723', 3, '', 'school');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
