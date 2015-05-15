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


-- Дамп структуры для таблица edecationhub.tariffs
CREATE TABLE IF NOT EXISTS `tariffs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(25,2) DEFAULT '0.00',
  `active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы edecationhub.tariffs: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `tariffs` DISABLE KEYS */;
INSERT INTO `tariffs` (`id`, `name`, `price`, `active`) VALUES
	(3, 'Limit 3_100', 500.00, 0),
	(4, 'Li10mit 9', 1.02, 1),
	(5, 'Limit1_10', 3.00, 1),
	(6, 'Limit1_104', 0.11, 1),
	(7, 'Li20mit4', 5.00, 1);
/*!40000 ALTER TABLE `tariffs` ENABLE KEYS */;


-- Дамп структуры для таблица edecationhub.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы edecationhub.users: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `role_id`, `status`, `username`, `password`, `first_name`, `last_name`, `phone`, `country_id`, `institute_name`, `sub_domen`) VALUES
	(6, 1, 1, '00@local.net', 'd5dcf51903d738183fdf2865b15f1a3ae8daa8735b15caad0469de57a03b3fcf', 'Administrator', '', '7482394', 1, '', 'admin'),
	(8, 2, 1, 'ost.vas2@mail.ru', '6a472fca528fea5719017e598046ea0ba9cd4e28ceae336ee3ecce82aa9a63c4', 'Administrator', 'Admin', '423234wrewer', 2, 'IKTA', 'rrr-fsdfsdf-yy'),
	(11, 2, 1, 'ost.vas1@mail.ru', '572f9f10a2a82cfc263119fd2182fa9ce5d0c6cd5b4ed4e90c2cf626703e346f', 'Василь', 'Остапчук', '4234234234', 0, '', '1123-213q'),
	(12, 2, 1, 'ost.vas@mail.ru', 'd5dcf51903d738183fdf2865b15f1a3ae8daa8735b15caad0469de57a03b3fcf', 'Administrator', 'Admin', '42378904723', 0, '', 'school');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
