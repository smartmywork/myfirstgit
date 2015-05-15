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

-- Дамп структуры для таблица edecationhub.blocks
CREATE TABLE IF NOT EXISTS `blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы edecationhub.blocks: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `blocks` DISABLE KEYS */;
INSERT INTO `blocks` (`id`, `title`, `content`, `image`) VALUES
	(1, 'Learn Anything Online b1', '<p><span style="color: #484848; font-family: \'Open Sans\'; font-size: 13px; line-height: 16.8831157684326px;">Suspendisse ante mi, iaculis ac eleifend id, venenatis non eros. Sed rhoncus gravida elit, eu sollicitudin sem iaculis. Proin scelerisque, ipsum mollis posuere metus.</span></p>', 'block1.jpg'),
	(2, 'Learn Anything Online b2', '<p><span style="color: #484848; font-family: \'Open Sans\'; font-size: 13px; line-height: 16.8831157684326px;">Suspendisse ante mi, iaculis ac eleifend id, venenatis non eros. Sed rhoncus gravida elit, eu sollicitudin sem iaculis. Proin scelerisque, ipsum mollis posuere metus.</span></p>', 'block2.jpg'),
	(3, 'Learn Anything Online', '<p><span style="color: #484848; font-family: \'Open Sans\'; font-size: 13px; line-height: 16.8831157684326px;">Suspendisse ante mi, iaculis ac eleifend id, venenatis non eros. </span></p>\r\n<p><span style="color: #484848; font-family: \'Open Sans\'; font-size: 13px; line-height: 16.8831157684326px;">Sed rhoncus gravida elit, eu sollicitudin sem iaculis. </span></p>\r\n<p><span style="color: #484848; font-family: \'Open Sans\'; font-size: 13px; line-height: 16.8831157684326px;">Proin scelerisque, ipsum mollis posuere metus.</span></p>', 'block3.jpg');
/*!40000 ALTER TABLE `blocks` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
