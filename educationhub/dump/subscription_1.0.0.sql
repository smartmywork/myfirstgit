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

-- Дамп структуры для таблица edecationhub.subscriptions
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `plan_id` varchar(255) DEFAULT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `subscription_id` varchar(255) DEFAULT NULL,
  `subscription_status` varchar(255) DEFAULT NULL,
  `remaining_billing_cycles` int(11) DEFAULT NULL,
  `started_at` int(11) DEFAULT NULL,
  `current_term_start` int(11) DEFAULT NULL,
  `current_term_end` int(11) DEFAULT NULL,
  `trial_start` int(11) DEFAULT NULL,
  `trial_end` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы edecationhub.subscriptions: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
INSERT INTO `subscriptions` (`id`, `user_id`, `plan_id`, `customer_id`, `subscription_id`, `subscription_status`, `remaining_billing_cycles`, `started_at`, `current_term_start`, `current_term_end`, `trial_start`, `trial_end`) VALUES
	(1, 7, 'trial3', '2slhRVReP8VVBWMTF3', '2slhRVReP8VVBWMTF3', 'cancelled', NULL, 1427752800, 1427752800, 1427808588, 0, 0),
	(2, 7, 'basic', '2slhRVReP8VqGq6TQG', '2slhRVReP8VqGq6TQG', 'non_renewing', NULL, 1427752800, 0, 1430402221, 1427752800, 1427810221),
	(3, 7, 'trial3', '2slhRVReP8VqdUTTR1', '2slhRVReP8VqdUTTR1', 'active', NULL, 1427752800, 1427752800, 1427892524, 0, 0),
	(4, 9, 'trial', 'trial9', 'trial9', 'cancelled', 0, 1427813127, 0, 1427813594, 1427813127, 1427813594),
	(5, 10, 'trial3', '1mqYqzQP8WQoTGeFL', '1mqYqzQP8WQoTGeFL', 'active', NULL, 1427752800, 1427752800, 1430344800, 0, 0);
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
