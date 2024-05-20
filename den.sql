-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for den
CREATE DATABASE IF NOT EXISTS `den` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `den`;

-- Dumping structure for table den.students
CREATE TABLE IF NOT EXISTS `students` (
  `name` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `scanned` enum('Yes','No') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table den.students: ~3 rows (approximately)
INSERT INTO `students` (`name`, `id`, `gender`, `email`, `mobile`, `scanned`) VALUES
	('Den', '123', 'Male', 'den@den', '123', NULL),
	('Johnn', '769174F8', 'Male', 'john@email.com', '23456789', NULL),
	('Thvhm,b', '81A3DC79', 'Female', 'jgkhkkmanjil@gmail.com', '45768767564', NULL);

-- Dumping structure for table den.teachers
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(500) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `fullname` varchar(555) DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table den.teachers: ~2 rows (approximately)
INSERT INTO `teachers` (`id`, `username`, `password`, `fullname`, `phone`) VALUES
	(6, 'farizoza', 'hilmigay', 'Hilmi Faris', '113231113'),
	(7, 'Haikalwelp', 'Spidey12!', 'Haikal Iskandar', '01139979189');

-- Dumping structure for table den.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '0',
  `user_password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '0',
  `user_email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Dumping data for table den.user: ~10 rows (approximately)
INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_email`) VALUES
	(9, 'ulwan', '$2y$10$w52pLglmFfIG6vw6kPBgBuoFirQWnp0bqElSf3ATWbWoIXUNyIqVm', 'ulwan.muzammil98@gmail.com'),
	(127, 'sherly', '$2y$10$jAfsVzBqC4srChd77G.SPOC/mD7UUC0ZkG8Fzg2MaVo5LYnWCzl7q', 'ali@gmail.com'),
	(128, 'sherly', '$2y$10$20VEUviPaKXYXWAxSt1Eq.igE4aa5a6ABT9JnsNS/QcFAkg5hWrrq', 'ali@gmail.com'),
	(129, 'koni', '$2y$10$6MRRX93.BiE8u1iI0LPvWeLK0LqFcrFdug9syvlhySPdGwOUjkJW.', 'koni@gmail.com'),
	(130, 'fi', '$2y$10$uCxyL1eQNnVXyRlbBh4qEef2/Qv0yyjW1W5MuedP9DO.Uh/sYwsoO', 'fi@gmail'),
	(132, 'admin', '$2y$10$IRfB3kXwNhzHTZ8TpsIKbubpKbxGkXQg3d9uxpUKViu7wntQGr47S', 'admin@gmail.com'),
	(133, 'awi', '$2y$10$eoHCpdRrhELRF74KAtXmZOe/ew1Stc9XK7nszahEPrLs2oiRrAuWW', 'awi@gmail.com'),
	(134, 'bi', '$2y$10$qJ721zt67wEmI2eKG4cicegcAqwQ3WaCj2zU7WNBHoRJw6Skjvd06', 'bi@gmail.com'),
	(135, 'osman', '$2y$10$in3dQubIbzkMEhE.KbZaNOB5t0qrSjscpQgHj98Q56bP4Tm27RCVa', 'osman@gmail.com'),
	(136, 'luna', '$2y$10$n6Fe.VxxsFGZEekg6N4XqOwR4xl63NyJnbXmHanSOSoNghOR09Um.', 'luna@gmail.com');

-- Dumping structure for table den.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table den.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `username`, `password`) VALUES
	(1, 'den', 'test');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
