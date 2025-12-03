-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03 ديسمبر 2025 الساعة 10:41
-- إصدار الخادم: 8.0.28
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sports_db`
--

-- --------------------------------------------------------

--
-- بنية الجدول `events`
--

CREATE TABLE `events` (
  `id` int NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_date` datetime NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- إرجاع أو استيراد بيانات الجدول `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_date`, `location`, `type`, `description`, `created_at`) VALUES
(1, 'Summer Championship', '2024-06-15 09:00:00', 'City Stadium', 'Competition', 'Annual summer championship for all teams', '2025-11-20 09:16:01'),
(2, 'Charity Gala', '2024-07-01 18:00:00', 'Grand Hotel', 'Social', 'Fundraising event', '2025-11-20 09:16:01'),
(3, 'Summer Championship', '2024-06-15 09:00:00', 'City Stadium', 'Competition', 'Annual summer championship for all teams', '2025-11-20 11:20:50'),
(4, 'Charity Gala', '2024-07-01 18:00:00', 'Grand Hotel', 'Social', 'Fundraising event', '2025-11-20 11:20:50'),
(5, 'Championnat d\'été', '2025-06-10 15:00:00', 'Stade 5 Juillet, Alger', 'Competition', 'Championnat d\'été pour toutes les équipes', '2025-11-20 12:12:08'),
(6, 'Gala de charité', '2025-07-05 18:00:00', 'Hôtel El Aurassi, Alger', 'Social', 'Événement de levée de fonds', '2025-11-20 12:12:08'),
(7, 'Tournoi d\'Oran', '2025-08-12 16:00:00', 'Stade Ahmed Zabana, Oran', 'Competition', 'Tournoi régional de football', '2025-11-20 12:12:08'),
(8, 'Festival de football de Constantine', '2025-09-03 17:00:00', 'Stade Mohamed Hamlaoui, Constantine', 'Competition', 'Festival annuel de football', '2025-11-20 12:12:08'),
(9, 'Match amical Alger-Annaba', '2025-09-15 16:30:00', 'Stade 5 Juillet, Alger', 'Friendly', 'Match amical entre équipes locales', '2025-11-20 12:12:08'),
(10, 'Coupe de Tlemcen', '2025-10-01 15:00:00', 'Stade Akid Lotfi, Tlemcen', 'Competition', 'Tournoi de coupe de Tlemcen', '2025-11-20 12:12:08'),
(11, 'Festival des jeunes joueurs', '2025-10-10 14:00:00', 'Stade 20 Août, Blida', 'Competition', 'Festival pour jeunes talents', '2025-11-20 12:12:08'),
(12, 'Match Gala Béjaïa', '2025-10-20 18:00:00', 'Stade de Béjaïa, Béjaïa', 'Social', 'Événement caritatif et football', '2025-11-20 12:12:08'),
(13, 'Championnat d\'Automne', '2025-11-05 15:00:00', 'Stade 1er Novembre, Sétif', 'Competition', 'Championnat de football saison d\'automne', '2025-11-20 12:12:08'),
(14, 'Coupe de Batna', '2025-11-15 16:00:00', 'Stade Mustapha Seffouhi, Batna', 'Competition', 'Coupe régionale de Batna', '2025-11-20 12:12:08'),
(15, 'Match amical Oran-Tizi Ouzou', '2025-11-22 17:00:00', 'Stade Ahmed Zabana, Oran', 'Friendly', 'Match amical entre deux équipes locales', '2025-11-20 12:12:08'),
(16, 'Tournoi de Annaba', '2025-12-01 15:30:00', 'Stade 19 Mai 1956, Annaba', 'Competition', 'Tournoi annuel à Annaba', '2025-11-20 12:12:08'),
(17, 'Festival sportif Jijel', '2025-12-10 14:00:00', 'Stade de Jijel, Jijel', 'Competition', 'Festival pour clubs locaux et jeunes', '2025-11-20 12:12:08'),
(18, 'Gala de football Oran', '2025-12-15 18:00:00', 'Hôtel Sheraton, Oran', 'Social', 'Événement caritatif pour football', '2025-11-20 12:12:08'),
(19, 'Championnat hivernal', '2026-01-05 15:00:00', 'Stade 5 Juillet, Alger', 'Competition', 'Championnat hivernal pour toutes les équipes', '2025-11-20 12:12:08'),
(20, 'Coupe de Constantine', '2026-01-20 16:00:00', 'Stade Mohamed Hamlaoui, Constantine', 'Competition', 'Coupe régionale de Constantine', '2025-11-20 12:12:08'),
(21, 'Match amical Blida-Béjaïa', '2026-02-01 17:00:00', 'Stade Mustapha Seffouhi, Blida', 'Friendly', 'Match amical entre équipes locales', '2025-11-20 12:12:08'),
(22, 'Festival de football Annaba', '2026-02-10 14:00:00', 'Stade 19 Mai 1956, Annaba', 'Competition', 'Festival annuel pour jeunes joueurs', '2025-11-20 12:12:08'),
(23, 'Coupe de Tizi Ouzou', '2026-02-20 16:00:00', 'Stade 1er Novembre, Tizi Ouzou', 'Competition', 'Tournoi de coupe régional', '2025-11-20 12:12:08'),
(24, 'Gala de fin d\'année', '2026-03-01 18:00:00', 'Hôtel El Aurassi, Alger', 'Social', 'Gala de fin d\'année pour les équipes et sponsors', '2025-11-20 12:12:08');

-- --------------------------------------------------------

--
-- بنية الجدول `event_participants`
--

CREATE TABLE `event_participants` (
  `id` int NOT NULL,
  `event_id` int NOT NULL,
  `member_id` int NOT NULL,
  `registered_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `attended` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `members`
--

CREATE TABLE `members` (
  `id` int NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text,
  `join_date` date NOT NULL,
  `team_id` int DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `major` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- إرجاع أو استيراد بيانات الجدول `members`
--

INSERT INTO `members` (`id`, `full_name`, `email`, `phone`, `address`, `join_date`, `team_id`, `photo`, `created_at`, `major`) VALUES
(1, 'Mohamed Qasmi', 'member01@example.com', '0550000001', 'Alger', '2023-01-15', 1, NULL, '2025-11-20 11:20:50', NULL),
(2, 'Ahmed Bouazza', 'member02@example.com', '0550000002', 'Oran', '2023-02-10', 2, NULL, '2025-11-20 11:20:50', NULL),
(3, 'Ali Obeidi', 'member03@example.com', '0550000003', 'Constantine', '2023-03-05', 3, NULL, '2025-11-20 11:20:50', NULL),
(4, 'SDIKI ISMAIL', 'ismailsdiki5@gmail.com', '0657444989', 'elgolea', '2025-11-20', 4, NULL, '2025-11-20 11:05:06', NULL),
(14, 'Mustafa Belmadi', 'member04@example.com', '0550000004', 'Annaba', '2023-04-12', 14, NULL, '2025-11-20 11:20:50', NULL),
(15, 'Youssef Morsi', 'member05@example.com', '0550000005', 'Blida', '2023-05-20', 15, NULL, '2025-11-20 11:20:50', NULL),
(16, 'Karim Cherif', 'member06@example.com', '0550000006', 'Batna', '2023-06-18', 16, NULL, '2025-11-20 11:20:50', NULL),
(17, 'Soumaya Boutaher', 'member07@example.com', '0550000007', 'Tlemcen', '2023-07-22', 17, NULL, '2025-11-20 11:20:50', NULL),
(18, 'Leila Ben Zidan', 'member08@example.com', '0550000008', 'Tizi Ouzou', '2023-08-30', 18, NULL, '2025-11-20 11:20:50', NULL),
(19, 'Fatima Ben Hussein', 'member09@example.com', '0550000009', 'Setif', '2023-09-14', 19, NULL, '2025-11-20 11:20:50', NULL),
(20, 'Zahra Belkacem', 'member10@example.com', '0550000010', 'Bejaia', '2023-10-01', 20, NULL, '2025-11-20 11:20:50', NULL),
(21, 'Amin Badri', 'member11@example.com', '0550000011', 'Jijel', '2023-11-12', 21, NULL, '2025-11-20 11:20:50', NULL),
(22, 'Rami Akoun', 'member12@example.com', '0550000012', 'Béchar', '2024-01-05', 22, NULL, '2025-11-20 11:20:50', NULL),
(23, 'Nadia Bousaada', 'member13@example.com', '0550000013', 'Ghardaia', '2024-02-14', 23, NULL, '2025-11-20 11:20:50', NULL),
(24, 'Huda Draj', 'member14@example.com', '0550000014', 'Adrar', '2024-03-21', 24, NULL, '2025-11-20 11:20:50', NULL),
(25, 'Salim Massoud', 'member15@example.com', '0550000015', 'Mostaganem', '2024-04-11', 25, NULL, '2025-11-20 11:20:50', NULL),
(26, 'Noureddine Chniti', 'member16@example.com', '0550000016', 'Skikda', '2024-05-09', 26, NULL, '2025-11-20 11:20:50', NULL),
(27, 'Yassine Ben Yaich', 'member17@example.com', '0550000017', 'Tipaza', '2024-06-17', 27, NULL, '2025-11-20 11:20:50', NULL),
(28, 'Abdelrahman Qourmi', 'member18@example.com', '0550000018', 'Boumerdes', '2024-07-25', 28, NULL, '2025-11-20 11:20:50', NULL),
(29, 'Saadi Mezali', 'member19@example.com', '0550000019', 'El Oued', '2024-08-08', 29, NULL, '2025-11-20 11:20:50', NULL),
(30, 'Hakim Sifi', 'member20@example.com', '0550000020', 'M’sila', '2024-09-02', 30, NULL, '2025-11-20 11:20:50', NULL),
(31, 'Meriem Belhoul', 'member21@example.com', '0550000021', 'Alger', '2024-09-18', 31, NULL, '2025-11-20 11:20:50', NULL),
(32, 'Khoula Mezrouki', 'member22@example.com', '0550000022', 'Oran', '2024-10-05', 32, NULL, '2025-11-20 11:20:50', NULL),
(33, 'Jamal Ben Aissa', 'member23@example.com', '0550000023', 'Constantine', '2024-10-20', 33, NULL, '2025-11-20 11:20:50', NULL),
(34, 'Bachir Mesdour', 'member24@example.com', '0550000024', 'Annaba', '2024-11-01', 34, NULL, '2025-11-20 11:20:50', NULL),
(35, 'Nacer Zouaoui', 'member25@example.com', '0550000025', 'Blida', '2024-11-15', 35, NULL, '2025-11-20 11:20:50', NULL),
(36, 'Redouane Kade', 'member26@example.com', '0550000026', 'Batna', '2024-12-02', 36, NULL, '2025-11-20 11:20:50', NULL),
(37, 'Sami Ghazali', 'member27@example.com', '0550000027', 'Tlemcen', '2025-01-08', 37, NULL, '2025-11-20 11:20:50', NULL),
(38, 'Latifa Rachich', 'member28@example.com', '0550000028', 'Tizi Ouzou', '2025-02-11', 38, NULL, '2025-11-20 11:20:50', NULL),
(39, 'Youssra Boudraâ', 'member29@example.com', '0550000029', 'Setif', '2025-03-07', 39, NULL, '2025-11-20 11:20:50', NULL),
(40, 'Hicham Rqiq', 'member30@example.com', '0550000030', 'Bejaia', '2025-04-16', 40, NULL, '2025-11-20 11:20:50', NULL),
(41, 'Farid Karim', 'member31@example.com', '0550000031', 'Jijel', '2025-05-21', 41, NULL, '2025-11-20 11:20:50', NULL),
(42, 'Hajar Sofiane', 'member32@example.com', '0550000032', 'Béchar', '2025-06-30', 42, NULL, '2025-11-20 11:20:50', NULL),
(43, 'Ziad Ben Hamou', 'member33@example.com', '0550000033', 'Ghardaia', '2025-07-12', 43, NULL, '2025-11-20 11:20:50', NULL),
(44, 'Aisha Qasmi', 'member34@example.com', '0550000034', 'Adrar', '2025-08-03', 44, NULL, '2025-11-20 11:20:50', NULL),
(45, 'Abdelkader Dahoun', 'member35@example.com', '0550000035', 'Mostaganem', '2025-08-25', 45, NULL, '2025-11-20 11:20:50', NULL),
(46, 'Nouria Qarfi', 'member36@example.com', '0550000036', 'Skikda', '2025-09-09', 46, NULL, '2025-11-20 11:20:50', NULL),
(47, 'Rafik Khadra', 'member37@example.com', '0550000037', 'Tipaza', '2025-09-24', 47, NULL, '2025-11-20 11:20:50', NULL),
(48, 'Salima Ben Ayad', 'member38@example.com', '0550000038', 'Boumerdes', '2025-10-05', 48, NULL, '2025-11-20 11:20:50', NULL),
(49, 'Nizar Lekhel', 'member39@example.com', '0550000039', 'El Oued', '2025-10-18', 49, NULL, '2025-11-20 11:20:50', NULL),
(50, 'Hamza Rabah', 'member40@example.com', '0550000040', 'M’sila', '2025-10-29', 50, NULL, '2025-11-20 11:20:50', NULL),
(51, 'Wafaa Selim', 'member41@example.com', '0550000041', 'Alger', '2025-11-01', 51, NULL, '2025-11-20 11:20:50', NULL),
(52, 'Tarek Ben Makhlouf', 'member42@example.com', '0550000042', 'Oran', '2025-11-02', 52, NULL, '2025-11-20 11:20:50', NULL),
(53, 'Imane Ben Youssef', 'member43@example.com', '0550000043', 'Constantine', '2025-11-03', NULL, NULL, '2025-11-20 11:20:50', NULL),
(54, 'Saber Laarab', 'member44@example.com', '0550000044', 'Annaba', '2025-11-04', NULL, NULL, '2025-11-20 11:20:50', NULL),
(55, 'Samia Toubal', 'member45@example.com', '0550000045', 'Blida', '2025-11-05', NULL, NULL, '2025-11-20 11:20:50', NULL),
(56, 'Rayan Chaib', 'member46@example.com', '0550000046', 'Batna', '2025-11-06', NULL, NULL, '2025-11-20 11:20:50', NULL),
(57, 'Naima Ben Salem', 'member47@example.com', '0550000047', 'Tlemcen', '2025-11-07', NULL, NULL, '2025-11-20 11:20:50', NULL),
(58, 'Fouad Hamadi', 'member48@example.com', '0550000048', 'Tizi Ouzou', '2025-11-08', NULL, NULL, '2025-11-20 11:20:50', NULL),
(59, 'Lotfi Jebour', 'member49@example.com', '0550000049', 'Setif', '2025-11-09', NULL, NULL, '2025-11-20 11:20:50', NULL),
(60, 'Abir Meswani', 'member50@example.com', '0550000050', 'Bejaia', '2025-11-10', NULL, NULL, '2025-11-20 11:20:50', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `member_id` int NOT NULL,
  `skill_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- إرجاع أو استيراد بيانات الجدول `skills`
--

INSERT INTO `skills` (`id`, `member_id`, `skill_name`) VALUES
(1, 21, 'Dribble'),
(2, 22, 'Tir au but'),
(3, 23, 'Passage court'),
(4, 24, 'Passage long'),
(5, 25, 'Défense'),
(6, 26, 'Attaque'),
(7, 27, 'Endurance'),
(8, 28, 'Vitesse'),
(9, 29, 'Vision de jeu'),
(10, 30, 'Contrôle du ballon'),
(11, 31, 'Tacles'),
(12, 32, 'Jeu de tête'),
(13, 33, 'Positionnement'),
(14, 14, 'Réactivité'),
(15, 15, 'Communication'),
(16, 16, 'Technique individuelle'),
(17, 17, 'Polyvalence'),
(18, 18, 'Leadership'),
(19, 19, 'Précision'),
(20, 20, 'Agilité');

-- --------------------------------------------------------

--
-- بنية الجدول `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int NOT NULL,
  `member_id` int NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `status` enum('paid','pending','overdue') DEFAULT 'pending',
  `type` enum('monthly','annual','donation') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- إرجاع أو استيراد بيانات الجدول `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `member_id`, `amount`, `date`, `status`, `type`, `created_at`) VALUES
(63, 14, 4950.00, '2025-01-20', 'paid', 'donation', '2025-01-20 09:50:00'),
(64, 15, 5050.00, '2025-01-21', 'overdue', 'monthly', '2025-01-21 10:15:00'),
(65, 16, 5400.00, '2025-01-22', 'paid', 'annual', '2025-01-22 13:30:00'),
(66, 17, 4800.00, '2025-01-23', 'pending', 'donation', '2025-01-23 08:40:00'),
(67, 18, 5250.00, '2025-01-24', 'paid', 'monthly', '2025-01-24 12:25:00'),
(68, 19, 5000.00, '2025-01-25', 'overdue', 'annual', '2025-01-25 14:00:00'),
(69, 20, 5150.00, '2025-01-26', 'paid', 'monthly', '2025-01-26 09:10:00'),
(70, 21, 4950.00, '2025-01-27', 'pending', 'donation', '2025-01-27 11:20:00'),
(71, 22, 5200.00, '2025-01-28', 'paid', 'annual', '2025-01-28 13:50:00'),
(72, 23, 5100.00, '2025-01-29', 'overdue', 'monthly', '2025-01-29 15:15:00'),
(73, 24, 5050.00, '2025-01-30', 'paid', 'donation', '2025-01-30 08:55:00'),
(74, 25, 4950.00, '2025-01-31', 'pending', 'monthly', '2025-01-31 10:35:00'),
(75, 26, 5300.00, '2025-02-01', 'paid', 'annual', '2025-02-01 09:05:00'),
(76, 27, 5000.00, '2025-02-02', 'overdue', 'donation', '2025-02-02 11:45:00'),
(77, 28, 5150.00, '2025-02-03', 'paid', 'monthly', '2025-02-03 13:30:00'),
(78, 29, 4900.00, '2025-02-04', 'pending', 'annual', '2025-02-04 08:15:00'),
(79, 30, 5050.00, '2025-02-05', 'paid', 'donation', '2025-02-05 12:50:00'),
(80, 31, 5200.00, '2025-02-06', 'overdue', 'monthly', '2025-02-06 14:10:00'),
(81, 32, 5000.00, '2025-02-07', 'paid', 'annual', '2025-02-07 09:40:00'),
(82, 33, 4950.00, '2025-02-08', 'pending', 'monthly', '2025-02-08 10:25:00'),
(83, 34, 5100.00, '2025-02-09', 'paid', 'donation', '2025-02-09 13:00:00');

-- --------------------------------------------------------

--
-- بنية الجدول `teams`
--

CREATE TABLE `teams` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `coach` varchar(100) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- إرجاع أو استيراد بيانات الجدول `teams`
--

INSERT INTO `teams` (`id`, `name`, `coach`, `category`, `created_at`) VALUES
(1, 'Red Dragons', 'John Smith', 'Senior', '2025-11-20 09:16:01'),
(2, 'Blue Sharks', 'Sarah Connor', 'Junior', '2025-11-20 09:16:01'),
(3, 'Green Eagles', 'Mike Ross', 'Amateur', '2025-11-20 09:16:01'),
(4, 'Green Eagles', 'Mike Ross', 'Amateur', '2025-11-20 11:20:50'),
(5, 'Mouloudia Alger', 'Ahmed Benali', 'Senior', '2025-11-20 11:37:30'),
(6, 'USM Alger', 'Karim Hadj', 'Senior', '2025-11-20 11:37:30'),
(7, 'CR Belouizdad', 'Sofiane Bouzid', 'Senior', '2025-11-20 11:37:30'),
(8, 'ES Setif', 'Rachid Merabet', 'Senior', '2025-11-20 11:37:30'),
(9, 'JS Kabylie', 'Nadir Bensalah', 'Senior', '2025-11-20 11:37:30'),
(10, 'JS Saoura', 'Abdelkader Mezdad', 'Senior', '2025-11-20 11:37:30'),
(11, 'Ahly Bordj Bou Arreridj', 'Fouad Laidani', 'Senior', '2025-11-20 11:37:30'),
(12, 'NA Hussein Dey', 'Samir Djerbi', 'Senior', '2025-11-20 11:37:30'),
(13, 'MC Oran', 'Houssam Djelloul', 'Senior', '2025-11-20 11:37:30'),
(14, 'USM Annaba', 'Walid Rahmani', 'Senior', '2025-11-20 11:37:30'),
(15, 'US Blida', 'Mohamed Cherif', 'Senior', '2025-11-20 11:37:30'),
(16, 'ASO Chlef', 'Adel Ferhani', 'Senior', '2025-11-20 11:37:30'),
(17, 'MO Bejaia', 'Amine Souilah', 'Senior', '2025-11-20 11:37:30'),
(18, 'JSM Bejaia', 'Riad Mansouri', 'Senior', '2025-11-20 11:37:30'),
(19, 'MC El Eulma', 'Othmane Belkacem', 'Senior', '2025-11-20 11:37:30'),
(20, 'USM Harrach', 'Nassim Kadi', 'Senior', '2025-11-20 11:37:30'),
(21, 'RC Kouba', 'Hakim Bouteldja', 'Senior', '2025-11-20 11:37:30'),
(22, 'O Médéa', 'Rafik Kerras', 'Senior', '2025-11-20 11:37:30'),
(23, 'RC Arbaâ', 'Mourad Laribi', 'Senior', '2025-11-20 11:37:30'),
(24, 'NC Magra', 'Younes Hamadi', 'Senior', '2025-11-20 11:37:30'),
(25, 'MC El Bayadh', 'Salah Zekri', 'Senior', '2025-11-20 11:37:30'),
(26, 'WA Tlemcen', 'Bilal Chergui', 'Senior', '2025-11-20 11:37:30'),
(27, 'CS Constantine', 'Tarek Boudiaf', 'Senior', '2025-11-20 11:37:30'),
(28, 'Paradou AC', 'Walid Boukhalfa', 'Senior', '2025-11-20 11:37:30'),
(29, 'MC Saida', 'Fares Maamar', 'Senior', '2025-11-20 11:37:30'),
(30, 'ASO Oran', 'Khaled Hend', 'Senior', '2025-11-20 11:37:30'),
(31, 'US Biskra', 'Abdelhak Belmadi', 'Senior', '2025-11-20 11:37:30'),
(32, 'JS Skikda', 'Samir Mechri', 'Senior', '2025-11-20 11:37:30'),
(33, 'HB Chelghoum Laid', 'Mourad Zidane', 'Senior', '2025-11-20 11:37:30'),
(34, 'US Chaouia', 'Lotfi Maatallah', 'Senior', '2025-11-20 11:37:30'),
(35, 'MO Constantine', 'Sami Ghrib', 'Senior', '2025-11-20 11:37:30'),
(36, 'OM Arzew', 'Yacine Bahloul', 'Senior', '2025-11-20 11:37:30'),
(37, 'CA Batna', 'Salim Bencherif', 'Senior', '2025-11-20 11:37:30'),
(38, 'USM Bel Abbès', 'Badreddine Fergani', 'Senior', '2025-11-20 11:37:30'),
(39, 'ES Guelma', 'Zahir Derrar', 'Senior', '2025-11-20 11:37:30'),
(40, 'CA Bordj Bou Arreridj', 'Hichem Khelifi', 'Senior', '2025-11-20 11:37:30'),
(41, 'SC Mecheria', 'Hamza Bouziane', 'Senior', '2025-11-20 11:37:30'),
(42, 'CA Témouchent', 'Abdelali Sahli', 'Senior', '2025-11-20 11:37:30'),
(43, 'CA Mila', 'Nacer Kahlaoui', 'Senior', '2025-11-20 11:37:30'),
(44, 'Rapid Relizane', 'Islem Bouazza', 'Senior', '2025-11-20 11:37:30'),
(45, 'JS Tiaret', 'Ahmed Sebti', 'Senior', '2025-11-20 11:37:30'),
(46, 'MC Saida', 'Khalil Aouam', 'Senior', '2025-11-20 11:37:30'),
(47, 'AS Ain Mlila', 'Yacine Mezghenna', 'Senior', '2025-11-20 11:37:30'),
(48, 'CRB Aïn Oussera', 'Walid Seridi', 'Senior', '2025-11-20 11:37:30'),
(49, 'ES Mostaganem', 'Nabil Ghezali', 'Senior', '2025-11-20 11:37:30'),
(50, 'NRB Teleghma', 'Redha Meddour', 'Senior', '2025-11-20 11:37:30'),
(51, 'IRB Ouargla', 'Abdelhak Boumediene', 'Senior', '2025-11-20 11:37:30'),
(52, 'ES Ben Aknoun', 'Hichem Maiza', 'Senior', '2025-11-20 11:37:30');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('admin','staff') DEFAULT 'staff',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`, `role`, `created_at`) VALUES
(1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '2025-11-20 11:16:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_participants`
--
ALTER TABLE `event_participants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `event_id` (`event_id`,`member_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `event_participants`
--
ALTER TABLE `event_participants`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `event_participants`
--
ALTER TABLE `event_participants`
  ADD CONSTRAINT `event_participants_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_participants_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE SET NULL;

--
-- قيود الجداول `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
