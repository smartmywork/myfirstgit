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

-- Дамп структуры для таблица edecationhub.schools
CREATE TABLE IF NOT EXISTS `schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `layout` varchar(50) DEFAULT NULL,
  `background` varchar(255) DEFAULT NULL COMMENT 'Background',
  `name` varchar(255) DEFAULT NULL COMMENT 'School/College Name',
  `address` varchar(255) DEFAULT NULL COMMENT 'School/College Address',
  `phone` varchar(255) DEFAULT NULL COMMENT 'School/College Phone',
  `type` varchar(255) DEFAULT NULL COMMENT 'Institution type ( K12 / Higer Education)',
  `student_type` varchar(255) DEFAULT NULL COMMENT 'Student Attendance Type',
  `start_day` varchar(255) DEFAULT NULL COMMENT 'Start day of the week',
  `date_format` varchar(255) DEFAULT NULL COMMENT 'Date format',
  `date_separator` varchar(255) DEFAULT NULL COMMENT 'Date separator',
  `financial_start` int(11) DEFAULT NULL COMMENT 'Financial year start date',
  `financial_end` int(11) DEFAULT NULL COMMENT 'Financial year end date',
  `language` varchar(255) DEFAULT NULL COMMENT 'Language',
  `time_zone` varchar(255) DEFAULT NULL COMMENT 'Time zone',
  `country_id` int(11) DEFAULT NULL COMMENT 'Country',
  `currency_type` varchar(255) DEFAULT NULL COMMENT 'Currency Type',
  `precision_count` varchar(255) DEFAULT NULL COMMENT 'Precision Count',
  `logo` varchar(255) DEFAULT NULL COMMENT 'Logo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Экспортируемые данные не выделены.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
