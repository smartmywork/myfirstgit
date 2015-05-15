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

-- Дамп структуры для таблица edecationhub.experts
CREATE TABLE IF NOT EXISTS `experts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cite` varchar(255) NOT NULL,
  `content` text,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы edecationhub.experts: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `experts` DISABLE KEYS */;
INSERT INTO `experts` (`id`, `name`, `cite`, `content`, `image`) VALUES
	(2, 'Steven Granger', 'Project Manager', '<p><span style="color: #484848; font-family: \'Open Sans\'; font-size: 13px; line-height: 16.8831157684326px;">Cras a neque diam. Aenean dapibus accumsan velit eget imperdiet. Quisque sapien neque, fermentum ac pharetra ac, iaculis a elit. Morbi tincidunt, lectus et dignissim pharetra, elit leo lacinia purus, eu porta. Aenean adipiscing, sed lacinia sapien tincidunt.</span></p>', '1427819559_expert2.jpg'),
	(3, 'Granger Steven', 'Project Manager', '<p><span style="color: #484848; font-family: \'Open Sans\'; font-size: 13px; line-height: 16.8831157684326px;">Cras a neque diam. Aenean dapibus accumsan velit eget imperdiet. Quisque sapien neque, fermentum ac pharetra ac, iaculis a elit. Morbi tincidunt, lectus et dignissim pharetra, elit leo lacinia purus, eu porta. Aenean adipiscing, sed lacinia sapien tincidunt.</span></p>', '1427819593_expert1.jpg');
/*!40000 ALTER TABLE `experts` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
