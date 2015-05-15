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

-- Дамп структуры для таблица edecationhub.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT 'site',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы edecationhub.pages: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`id`, `name`, `title`, `slug`, `group`) VALUES
	(1, 'Home', 'EducationHub home page', 'home', 'home'),
	(2, 'Product', 'Page Product', 'product', 'site'),
	(3, 'Features', '', 'features', 'site'),
	(4, 'Pricing', 'pricing', 'pricing', 'site'),
	(5, 'Terms of use', 'Terms of use', 'terms', 'agreement'),
	(6, 'Privacy policy', 'Privacy policy', 'policies', 'agreement'),
	(7, 'Customers', 'Customers', 'customers', 'site');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;


-- Дамп структуры для таблица edecationhub.page_contents
CREATE TABLE IF NOT EXISTS `page_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) DEFAULT NULL,
  `content` text,
  `description` text,
  `keywords` text,
  PRIMARY KEY (`id`),
  KEY `FK_page_contents_pages` (`page_id`),
  CONSTRAINT `FK_page_contents_pages` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы edecationhub.page_contents: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `page_contents` DISABLE KEYS */;
INSERT INTO `page_contents` (`id`, `page_id`, `content`, `description`, `keywords`) VALUES
	(1, 3, 'features', 'Features Page in site Edhucation"-hub', 'features,educationhub'),
	(2, 4, 'pricing', NULL, NULL),
	(3, 7, 'customer', NULL, NULL),
	(4, 5, '<p>content</p>', NULL, NULL),
	(5, 6, '<p>content<span style="background-color: #000000;">&nbsp;<span style="color: #ffffff; font-family: \'Helvetica Neue\', Arial, Helvetica, sans-serif; font-size: 18px; font-weight: bold; line-height: 21.6000003814697px;">privacy policy</span></span></p>', NULL, NULL),
	(6, 2, '<h1 style="text-align: center;">Product</h1>\r\n<h2><span style="text-decoration: underline;">the Education is a good service</span></h2>', NULL, NULL),
	(8, 1, NULL, '', 'home page, educationhub, customers, product, feature');
/*!40000 ALTER TABLE `page_contents` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
