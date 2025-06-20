-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table simple_note.notes
CREATE TABLE IF NOT EXISTS `notes` (
  `note_idxxx` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `user_idxxx` int unsigned NOT NULL,
  `note_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '',
  `note_tagxx` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '',
  `note_cntnt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `note_times` timestamp NOT NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`note_idxxx`) USING BTREE,
  KEY `user_idxxx` (`user_idxxx`),
  CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user_idxxx`) REFERENCES `users` (`user_idxxx`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`user_idxxx`) REFERENCES `users` (`user_idxxx`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table simple_note.notes: ~3 rows (approximately)
INSERT INTO `notes` (`note_idxxx`, `user_idxxx`, `note_title`, `note_tagxx`, `note_cntnt`, `note_times`) VALUES
	('1', 1, 'Udins', 'Tugas', 'Cihuyyy', '2025-06-16 12:48:00'),
	('1e92d6aa-4d19-11f0-afe8-0a002700000d', 2, 'Malam Hari', 'tugas,ujian', 'Yuhuu anagoa n cbsjsanonasd', '2025-06-19 14:24:33'),
	('85600201-4d1a-11f0-afe8-0a002700000d', 2, '\\t \\n unch <br> <hr/>', 'tugas, ujian', '<br> \\t \\n <hr/>', '2025-06-19 14:34:35');

-- Dumping structure for table simple_note.quest
CREATE TABLE IF NOT EXISTS `quest` (
  `ques_idxxx` int NOT NULL,
  `ques_namex` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ques_idxxx`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table simple_note.quest: ~3 rows (approximately)
INSERT INTO `quest` (`ques_idxxx`, `ques_namex`) VALUES
	(1, 'apa makanan favorit?'),
	(2, 'apa minuman favorit?'),
	(3, 'apa nama panggilan?');

-- Dumping structure for table simple_note.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_idxxx` int unsigned NOT NULL,
  `user_usrnm` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `user_passx` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `user_quest` int NOT NULL,
  `user_answr` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`user_idxxx`) USING BTREE,
  KEY `FK_users_quest` (`user_quest`),
  CONSTRAINT `FK_users_quest` FOREIGN KEY (`user_quest`) REFERENCES `quest` (`ques_idxxx`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table simple_note.users: ~2 rows (approximately)
INSERT INTO `users` (`user_idxxx`, `user_usrnm`, `user_passx`, `user_quest`, `user_answr`) VALUES
	(1, 'udin', '202cb962ac59075b964b07152d234b70', 1, 'Ayam'),
	(2, 'ido', 'd41d8cd98f00b204e9800998ecf8427e', 1, 'Ayam');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
