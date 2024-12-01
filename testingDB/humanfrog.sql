-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 01, 2024 at 01:41 PM
-- Server version: 5.7.40
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `humanfrog`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2024_11_30_173227_create_rooms_table', 1),
(5, '2024_11_30_173302_create_room_images_table', 1),
(6, '2024_12_01_111108_create_reservations_table', 2),
(7, '2024_12_01_111307_add_price_to_reservations_table', 3),
(8, '2024_12_01_131213_add_is_admin_to_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `arrival_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reservations_room_id_foreign` (`room_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `room_id`, `arrival_date`, `departure_date`, `name`, `email`, `phone`, `message`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-12-01', '2024-12-02', 'Mihael Donko', 'mihael.donko@student.um.si', '030316962', NULL, '90.00', '2024-12-01 10:15:41', '2024-12-01 10:15:41'),
(2, 1, '2024-12-01', '2024-12-02', 'Mihael Donko', 'mihael.donko@student.um.si', '030316962', NULL, '90.00', '2024-12-01 10:16:03', '2024-12-01 10:16:03'),
(3, 1, '2024-12-01', '2024-12-10', 'Mihael Donko', 'mihael.donko@student.um.si', '030316962', NULL, '810.00', '2024-12-01 10:16:47', '2024-12-01 10:16:47'),
(4, 1, '2024-12-01', '2024-12-11', 'Mihael Donko', 'mihael.donko@student.um.si', '030316962', 'adasdasdasdasd', '900.00', '2024-12-01 11:01:30', '2024-12-01 11:01:30'),
(5, 1, '2024-12-01', '2024-12-11', 'Mihael Donko', 'mihael.donko@student.um.si', '030316962', 'adasdasdasdasd', '900.00', '2024-12-01 11:02:06', '2024-12-01 11:02:06'),
(6, 1, '2024-12-01', '2024-12-11', 'Mihael Donko', 'mihael.donko@student.um.si', '030316962', 'adasdasdasdasd', '900.00', '2024-12-01 11:02:52', '2024-12-01 11:02:52'),
(7, 1, '2024-12-01', '2024-12-11', 'Mihael Donko', 'mihael.donko@student.um.si', '030316962', 'adasdasdasdasd', '900.00', '2024-12-01 11:06:40', '2024-12-01 11:06:40'),
(8, 1, '2024-12-01', '2024-12-11', 'Mihael Donko', 'mihael.donko@student.um.si', '030316962', NULL, '900.00', '2024-12-01 11:07:01', '2024-12-01 11:07:01'),
(9, 1, '2024-12-02', '2024-12-13', 'Mihael Donko', 'mihael.donko@student.um.si', '030316962', NULL, '990.00', '2024-12-01 11:19:23', '2024-12-01 11:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `long_description` text COLLATE utf8mb4_unicode_ci,
  `main_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `price`, `short_description`, `long_description`, `main_image`, `created_at`, `updated_at`) VALUES
(1, 'Medium queen bed room', '100.00', 'Premium room good for anyone!!!', 'asdasdasd', 'https://www.italianbark.com/wp-content/uploads/2018/01/Muji-Hotel-Shenzhen-02-hotel-room-design-trends-italianbark-.jpg.webp', '2024-11-30 17:43:19', '2024-12-01 12:31:19'),
(2, 'Unrenovated hotel room', '27.00', 'Cheap alternative in our hotel!!!!', 'asdasdasdasd', 'https://media.istockphoto.com/id/1371804418/photo/bedroom-in-an-abandoned-run-down-hotel.jpg?s=612x612&w=0&k=20&c=ecO4agjozik7i71jaNYghx94nzxG_DRmRokG4s9mJJA=', '2024-11-30 17:44:35', '2024-12-01 11:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

DROP TABLE IF EXISTS `room_images`;
CREATE TABLE IF NOT EXISTS `room_images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `room_images_room_id_foreign` (`room_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@admin.com', NULL, '$2y$10$R5Tq6hxshgkt6cy3rOb8VeCAQCLZ.xdM5CwEdkJDHqO2NNhPieKmu', 1, NULL, '2024-12-01 12:37:45', '2024-12-01 12:37:45'),
(3, 'test', 'test@test.com', NULL, '$2y$10$BfCphBdTQ8afS5DuIDlEuOSexFITlSNhLZbAWHQTA8pjSulit9Kle', 0, NULL, '2024-12-01 12:38:02', '2024-12-01 12:38:02');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
