-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2025 at 11:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `care_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `ai_predictions`
--

CREATE TABLE `ai_predictions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `temperature_value` double DEFAULT NULL,
  `spo2_value` double DEFAULT NULL,
  `bpm_value` double DEFAULT NULL,
  `blood_pressure_value` double DEFAULT NULL,
  `respiratory_rate_value` double DEFAULT NULL,
  `prediction_result` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ai_predictions`
--

INSERT INTO `ai_predictions` (`id`, `created_at`, `updated_at`, `temperature_value`, `spo2_value`, `bpm_value`, `blood_pressure_value`, `respiratory_rate_value`, `prediction_result`) VALUES
(1, '2025-05-31 21:01:00', '2025-05-31 21:01:00', 32.69, 94.13, 48.41, 129.95, 16.32, 'Positive/At risk');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_jede@mailinator.com|127.0.0.1', 'i:1;', 1748648691),
('laravel_cache_jede@mailinator.com|127.0.0.1:timer', 'i:1748648691;', 1748648691);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `care_givers`
--

CREATE TABLE `care_givers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT 'https://www.svgrepo.com/show/452030/avatar-default.svg',
  `address` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `emergency_contact_phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `care_givers`
--

INSERT INTO `care_givers` (`id`, `created_at`, `updated_at`, `full_name`, `email`, `phone`, `avatar`, `address`, `date_of_birth`, `emergency_contact_phone`, `password`, `user_id`) VALUES
(1, '2025-05-31 07:09:57', '2025-05-31 07:09:57', 'Oprah Love', 'myfawosili@mailinator.com', '+1 (423) 124', 'assets/avatars/683ad5753fa54.jpg', 'Eos saepe do commodo', NULL, '+1 (479) 695', '$2y$12$7MYuXbYAmD5EaA9ArgyEJeh727hCiGCJPIIOwJwhaPCxsvtI/Zely', 2),
(2, '2025-05-31 10:01:54', '2025-05-31 10:01:54', 'Ori Wilkinson', 'gacimuhosi@mailinator.com', '+1 (568)', 'assets/avatars/683afdc1f33c5.jpg', 'Repudiandae lorem in', NULL, '+1 (584) 3', '$2y$12$Fbb.EMLtKzEHQbgJkrghK.jkhJqNMVDXacwYrvnOeOGai9ZNTng4i', 3),
(3, '2025-05-31 22:27:26', '2025-05-31 23:22:16', 'Joseph Faris', 'zugicu@mailinator.com', '+1 (363) 65', 'assets/avatars/683bac7e685ce.jpg', 'Pariatur Atque dese', NULL, '+1 (899) 436', NULL, 3),
(4, '2025-06-01 01:11:42', '2025-06-01 01:11:42', 'Wylie Hahn', 'jyhus@mailinator.com', '+1 (456) 45', 'assets/avatars/683bd2fe58c2f.jpg', 'Laboriosam qui rati', NULL, '+1 (602) 128', '$2y$12$lFL5sk1SE56AV9iuZ3NDLONMm/Aef1Ur7y9VAR2wweXNEtHra3PKW', 5),
(5, '2025-06-02 17:42:05', '2025-06-02 17:42:05', 'Maggy Summers', 'tocuwa@mailinator.com', '011456', 'assets/avatars/683e0c9d2b1b1.jpg', 'Modi laborum Nesciu', NULL, '7894655', '$2y$12$Up68NfK0IwZ8PvrahWU.terz0ZUGArMwurEQzSOns32c8ugTPkKQq', 8);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_30_151129_create_care_givers_table', 1),
(5, '2025_05_30_161059_create_sernsors_table', 2),
(6, '2025_05_31_225843_create_sensor_readings_table', 3),
(7, '2025_05_31_230057_create_ai_predictions_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sensor_readings`
--

CREATE TABLE `sensor_readings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sensor_name` varchar(255) NOT NULL,
  `value` double NOT NULL,
  `recorded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sensor_readings`
--

INSERT INTO `sensor_readings` (`id`, `created_at`, `updated_at`, `sensor_name`, `value`, `recorded_at`) VALUES
(1, '2025-05-31 20:54:02', '2025-05-31 20:54:02', 'temperature', 30, '2025-05-31 23:54:02'),
(2, '2025-05-31 20:54:03', '2025-05-31 20:54:03', 'bpm', 77.82, '2025-05-31 23:54:03'),
(3, '2025-05-31 20:54:26', '2025-05-31 20:54:26', 'temperature', 30, '2025-05-31 23:54:26'),
(4, '2025-05-31 20:54:26', '2025-05-31 20:54:26', 'bpm', 78.43, '2025-05-31 23:54:26'),
(5, '2025-05-31 20:54:50', '2025-05-31 20:54:50', 'temperature', 30.06, '2025-05-31 23:54:50'),
(6, '2025-05-31 20:54:50', '2025-05-31 20:54:50', 'bpm', 78.43, '2025-05-31 23:54:50'),
(7, '2025-05-31 20:55:13', '2025-05-31 20:55:13', 'temperature', 30.12, '2025-05-31 23:55:13'),
(8, '2025-05-31 20:55:13', '2025-05-31 20:55:13', 'bpm', 77.82, '2025-05-31 23:55:13'),
(9, '2025-05-31 20:55:37', '2025-05-31 20:55:37', 'temperature', 30.25, '2025-05-31 23:55:37'),
(10, '2025-05-31 20:55:37', '2025-05-31 20:55:37', 'spo2', 79.1, '2025-05-31 23:55:37'),
(11, '2025-05-31 20:55:37', '2025-05-31 20:55:37', 'bpm', 91.3, '2025-05-31 23:55:37'),
(12, '2025-05-31 20:55:38', '2025-05-31 20:55:38', 'blood_pressure_sim', 102.77, '2025-05-31 23:55:38'),
(13, '2025-05-31 20:55:38', '2025-05-31 20:55:38', 'respiratory_rate_sim', 21.65, '2025-05-31 23:55:38'),
(14, '2025-05-31 20:56:02', '2025-05-31 20:56:02', 'temperature', 32.25, '2025-05-31 23:56:02'),
(15, '2025-05-31 20:56:02', '2025-05-31 20:56:02', 'spo2', 56.82, '2025-05-31 23:56:02'),
(16, '2025-05-31 20:56:02', '2025-05-31 20:56:02', 'bpm', 98.04, '2025-05-31 23:56:02'),
(17, '2025-05-31 20:56:03', '2025-05-31 20:56:03', 'blood_pressure_sim', 118.6, '2025-05-31 23:56:03'),
(18, '2025-05-31 20:56:03', '2025-05-31 20:56:03', 'respiratory_rate_sim', 26.48, '2025-05-31 23:56:03'),
(19, '2025-05-31 20:56:27', '2025-05-31 20:56:27', 'temperature', 34.56, '2025-05-31 23:56:27'),
(20, '2025-05-31 20:56:27', '2025-05-31 20:56:27', 'spo2', 90.56, '2025-05-31 23:56:27'),
(21, '2025-05-31 20:56:28', '2025-05-31 20:56:28', 'bpm', 100.49, '2025-05-31 23:56:28'),
(22, '2025-05-31 20:56:28', '2025-05-31 20:56:28', 'blood_pressure_sim', 139.52, '2025-05-31 23:56:28'),
(23, '2025-05-31 20:56:28', '2025-05-31 20:56:28', 'respiratory_rate_sim', 15.34, '2025-05-31 23:56:28'),
(24, '2025-05-31 20:56:52', '2025-05-31 20:56:52', 'temperature', 35.5, '2025-05-31 23:56:52'),
(25, '2025-05-31 20:56:52', '2025-05-31 20:56:52', 'spo2', 59.07, '2025-05-31 23:56:52'),
(26, '2025-05-31 20:56:53', '2025-05-31 20:56:53', 'bpm', 111.52, '2025-05-31 23:56:53'),
(27, '2025-05-31 20:56:53', '2025-05-31 20:56:53', 'blood_pressure_sim', 115.82, '2025-05-31 23:56:53'),
(28, '2025-05-31 20:56:53', '2025-05-31 20:56:53', 'respiratory_rate_sim', 26.44, '2025-05-31 23:56:53'),
(29, '2025-05-31 20:57:54', '2025-05-31 20:57:54', 'temperature', 31.94, '2025-05-31 23:57:54'),
(30, '2025-05-31 20:57:54', '2025-05-31 20:57:54', 'spo2', 86.33, '2025-05-31 23:57:54'),
(31, '2025-05-31 20:57:55', '2025-05-31 20:57:55', 'bpm', 82.72, '2025-05-31 23:57:55'),
(32, '2025-05-31 20:57:55', '2025-05-31 20:57:55', 'blood_pressure_sim', 120.85, '2025-05-31 23:57:55'),
(33, '2025-05-31 20:57:55', '2025-05-31 20:57:55', 'respiratory_rate_sim', 16.75, '2025-05-31 23:57:55'),
(34, '2025-05-31 20:58:19', '2025-05-31 20:58:19', 'temperature', 31.06, '2025-05-31 23:58:19'),
(35, '2025-05-31 20:58:19', '2025-05-31 20:58:19', 'bpm', 87.62, '2025-05-31 23:58:19'),
(36, '2025-05-31 21:00:34', '2025-05-31 21:00:34', 'temperature', 30.06, '2025-06-01 00:00:34'),
(37, '2025-05-31 21:00:35', '2025-05-31 21:00:35', 'bpm', 78.43, '2025-06-01 00:00:35'),
(38, '2025-05-31 21:00:58', '2025-05-31 21:00:58', 'temperature', 32.69, '2025-06-01 00:00:58'),
(39, '2025-05-31 21:00:58', '2025-05-31 21:00:58', 'spo2', 94.13, '2025-06-01 00:00:58'),
(40, '2025-05-31 21:00:59', '2025-05-31 21:00:59', 'bpm', 48.41, '2025-06-01 00:00:59'),
(41, '2025-05-31 21:00:59', '2025-05-31 21:00:59', 'blood_pressure_sim', 129.95, '2025-06-01 00:00:59'),
(42, '2025-05-31 21:00:59', '2025-05-31 21:00:59', 'respiratory_rate_sim', 16.32, '2025-06-01 00:00:59'),
(43, '2025-05-31 21:01:00', '2025-05-31 21:01:00', 'temperature', 32.69, '2025-06-01 00:01:00'),
(44, '2025-05-31 21:01:00', '2025-05-31 21:01:00', 'spo2', 94.13, '2025-06-01 00:01:00'),
(45, '2025-05-31 21:01:00', '2025-05-31 21:01:00', 'bpm', 48.41, '2025-06-01 00:01:00'),
(46, '2025-05-31 21:01:00', '2025-05-31 21:01:00', 'blood_pressure', 129.95, '2025-06-01 00:01:00'),
(47, '2025-05-31 21:01:00', '2025-05-31 21:01:00', 'respiratory_rate', 16.32, '2025-06-01 00:01:00'),
(48, '2025-05-31 21:01:23', '2025-05-31 21:01:23', 'temperature', 33.12, '2025-06-01 00:01:23'),
(49, '2025-05-31 21:01:23', '2025-05-31 21:01:23', 'bpm', 45.96, '2025-06-01 00:01:23'),
(50, '2025-05-31 21:01:47', '2025-05-31 21:01:47', 'temperature', 31.88, '2025-06-01 00:01:47'),
(51, '2025-05-31 21:01:47', '2025-05-31 21:01:47', 'bpm', 78.43, '2025-06-01 00:01:47'),
(52, '2025-05-31 21:02:10', '2025-05-31 21:02:10', 'temperature', 31.12, '2025-06-01 00:02:10'),
(53, '2025-05-31 21:02:10', '2025-05-31 21:02:10', 'bpm', 78.43, '2025-06-01 00:02:10'),
(54, '2025-05-31 21:02:34', '2025-05-31 21:02:34', 'temperature', 30.75, '2025-06-01 00:02:34'),
(55, '2025-05-31 21:02:35', '2025-05-31 21:02:35', 'bpm', 79.04, '2025-06-01 00:02:35'),
(56, '2025-05-31 21:02:58', '2025-05-31 21:02:58', 'temperature', 30.44, '2025-06-01 00:02:58'),
(57, '2025-05-31 21:02:59', '2025-05-31 21:02:59', 'bpm', 78.43, '2025-06-01 00:02:59'),
(58, '2025-05-31 21:03:22', '2025-05-31 21:03:22', 'temperature', 30.25, '2025-06-01 00:03:22'),
(59, '2025-05-31 21:03:22', '2025-05-31 21:03:22', 'bpm', 78.43, '2025-06-01 00:03:22'),
(60, '2025-05-31 21:03:45', '2025-05-31 21:03:45', 'temperature', 30.25, '2025-06-01 00:03:45'),
(61, '2025-05-31 21:03:46', '2025-05-31 21:03:46', 'bpm', 78.43, '2025-06-01 00:03:46'),
(62, '2025-05-31 21:04:09', '2025-05-31 21:04:09', 'temperature', 30.19, '2025-06-01 00:04:09'),
(63, '2025-05-31 21:04:09', '2025-05-31 21:04:09', 'bpm', 78.43, '2025-06-01 00:04:09'),
(64, '2025-05-31 21:04:33', '2025-05-31 21:04:33', 'temperature', 30.19, '2025-06-01 00:04:33'),
(65, '2025-05-31 21:04:33', '2025-05-31 21:04:33', 'bpm', 78.43, '2025-06-01 00:04:33'),
(66, '2025-05-31 21:04:57', '2025-05-31 21:04:57', 'temperature', 30.19, '2025-06-01 00:04:57'),
(67, '2025-05-31 21:04:57', '2025-05-31 21:04:57', 'bpm', 77.82, '2025-06-01 00:04:57'),
(68, '2025-05-31 21:05:20', '2025-05-31 21:05:20', 'temperature', 30.12, '2025-06-01 00:05:20'),
(69, '2025-05-31 21:05:21', '2025-05-31 21:05:21', 'bpm', 78.43, '2025-06-01 00:05:21'),
(70, '2025-05-31 21:05:45', '2025-05-31 21:05:45', 'temperature', 30.19, '2025-06-01 00:05:45'),
(71, '2025-05-31 21:05:45', '2025-05-31 21:05:45', 'bpm', 77.82, '2025-06-01 00:05:45'),
(72, '2025-05-31 21:06:09', '2025-05-31 21:06:09', 'temperature', 30.19, '2025-06-01 00:06:09'),
(73, '2025-05-31 21:06:09', '2025-05-31 21:06:09', 'bpm', 78.43, '2025-06-01 00:06:09'),
(74, '2025-05-31 21:06:33', '2025-05-31 21:06:33', 'temperature', 30.19, '2025-06-01 00:06:33'),
(75, '2025-05-31 21:06:33', '2025-05-31 21:06:33', 'bpm', 79.04, '2025-06-01 00:06:33'),
(76, '2025-05-31 21:06:56', '2025-05-31 21:06:56', 'temperature', 30.19, '2025-06-01 00:06:56'),
(77, '2025-05-31 21:06:57', '2025-05-31 21:06:57', 'bpm', 78.43, '2025-06-01 00:06:57'),
(78, '2025-05-31 21:07:20', '2025-05-31 21:07:20', 'temperature', 30.19, '2025-06-01 00:07:20'),
(79, '2025-05-31 21:07:21', '2025-05-31 21:07:21', 'bpm', 78.43, '2025-06-01 00:07:21'),
(80, '2025-05-31 21:07:44', '2025-05-31 21:07:44', 'temperature', 30.19, '2025-06-01 00:07:44'),
(81, '2025-05-31 21:07:44', '2025-05-31 21:07:44', 'bpm', 78.43, '2025-06-01 00:07:44'),
(82, '2025-05-31 21:08:08', '2025-05-31 21:08:08', 'temperature', 30.19, '2025-06-01 00:08:08'),
(83, '2025-05-31 21:08:08', '2025-05-31 21:08:08', 'bpm', 78.43, '2025-06-01 00:08:08'),
(84, '2025-05-31 21:08:31', '2025-05-31 21:08:31', 'temperature', 30.12, '2025-06-01 00:08:31'),
(85, '2025-05-31 21:08:31', '2025-05-31 21:08:31', 'bpm', 78.43, '2025-06-01 00:08:31'),
(86, '2025-05-31 21:08:55', '2025-05-31 21:08:55', 'temperature', 30.12, '2025-06-01 00:08:55'),
(87, '2025-05-31 21:08:55', '2025-05-31 21:08:55', 'bpm', 78.43, '2025-06-01 00:08:55'),
(88, '2025-05-31 21:09:19', '2025-05-31 21:09:19', 'temperature', 30.12, '2025-06-01 00:09:19'),
(89, '2025-05-31 21:09:19', '2025-05-31 21:09:19', 'bpm', 78.43, '2025-06-01 00:09:19'),
(90, '2025-05-31 21:09:42', '2025-05-31 21:09:42', 'temperature', 30.06, '2025-06-01 00:09:42'),
(91, '2025-05-31 21:09:42', '2025-05-31 21:09:42', 'bpm', 78.43, '2025-06-01 00:09:42'),
(92, '2025-05-31 21:10:06', '2025-05-31 21:10:06', 'temperature', 30.12, '2025-06-01 00:10:06'),
(93, '2025-05-31 21:10:06', '2025-05-31 21:10:06', 'bpm', 78.43, '2025-06-01 00:10:06'),
(94, '2025-05-31 21:10:29', '2025-05-31 21:10:29', 'temperature', 30.12, '2025-06-01 00:10:29'),
(95, '2025-05-31 21:10:29', '2025-05-31 21:10:29', 'bpm', 78.43, '2025-06-01 00:10:29'),
(96, '2025-05-31 21:10:53', '2025-05-31 21:10:53', 'temperature', 30.12, '2025-06-01 00:10:53'),
(97, '2025-05-31 21:10:53', '2025-05-31 21:10:53', 'bpm', 78.43, '2025-06-01 00:10:53'),
(98, '2025-05-31 21:11:16', '2025-05-31 21:11:16', 'temperature', 30.06, '2025-06-01 00:11:16'),
(99, '2025-05-31 21:11:17', '2025-05-31 21:11:17', 'bpm', 78.43, '2025-06-01 00:11:17'),
(100, '2025-05-31 21:11:40', '2025-05-31 21:11:40', 'temperature', 30.06, '2025-06-01 00:11:40'),
(101, '2025-05-31 21:11:41', '2025-05-31 21:11:41', 'bpm', 78.43, '2025-06-01 00:11:41'),
(102, '2025-05-31 21:12:04', '2025-05-31 21:12:04', 'temperature', 30, '2025-06-01 00:12:04'),
(103, '2025-05-31 21:12:05', '2025-05-31 21:12:05', 'bpm', 78.43, '2025-06-01 00:12:05'),
(104, '2025-05-31 21:12:28', '2025-05-31 21:12:28', 'temperature', 30, '2025-06-01 00:12:28'),
(105, '2025-05-31 21:12:28', '2025-05-31 21:12:28', 'bpm', 78.43, '2025-06-01 00:12:28'),
(106, '2025-05-31 21:12:51', '2025-05-31 21:12:51', 'temperature', 30.06, '2025-06-01 00:12:51'),
(107, '2025-05-31 21:12:52', '2025-05-31 21:12:52', 'bpm', 77.82, '2025-06-01 00:12:52'),
(108, '2025-05-31 21:13:15', '2025-05-31 21:13:15', 'temperature', 30.06, '2025-06-01 00:13:15'),
(109, '2025-05-31 21:13:16', '2025-05-31 21:13:16', 'bpm', 79.04, '2025-06-01 00:13:16'),
(110, '2025-05-31 21:13:39', '2025-05-31 21:13:39', 'temperature', 30.12, '2025-06-01 00:13:39'),
(111, '2025-05-31 21:13:39', '2025-05-31 21:13:39', 'bpm', 79.04, '2025-06-01 00:13:39'),
(112, '2025-05-31 21:14:03', '2025-05-31 21:14:03', 'temperature', 30.06, '2025-06-01 00:14:03'),
(113, '2025-05-31 21:14:03', '2025-05-31 21:14:03', 'bpm', 78.43, '2025-06-01 00:14:03'),
(114, '2025-05-31 21:14:27', '2025-05-31 21:14:27', 'temperature', 30.06, '2025-06-01 00:14:27'),
(115, '2025-05-31 21:14:27', '2025-05-31 21:14:27', 'bpm', 78.43, '2025-06-01 00:14:27'),
(116, '2025-05-31 21:14:50', '2025-05-31 21:14:50', 'temperature', 30, '2025-06-01 00:14:50'),
(117, '2025-05-31 21:14:51', '2025-05-31 21:14:51', 'bpm', 78.43, '2025-06-01 00:14:51'),
(118, '2025-05-31 21:15:14', '2025-05-31 21:15:14', 'temperature', 29.94, '2025-06-01 00:15:14'),
(119, '2025-05-31 21:15:14', '2025-05-31 21:15:14', 'bpm', 78.43, '2025-06-01 00:15:14'),
(120, '2025-05-31 21:15:37', '2025-05-31 21:15:37', 'temperature', 30, '2025-06-01 00:15:38'),
(121, '2025-05-31 21:15:38', '2025-05-31 21:15:38', 'bpm', 79.04, '2025-06-01 00:15:38'),
(122, '2025-05-31 21:16:01', '2025-05-31 21:16:01', 'temperature', 30, '2025-06-01 00:16:01'),
(123, '2025-05-31 21:16:01', '2025-05-31 21:16:01', 'bpm', 78.43, '2025-06-01 00:16:01'),
(124, '2025-05-31 21:16:25', '2025-05-31 21:16:25', 'temperature', 30.06, '2025-06-01 00:16:25'),
(125, '2025-05-31 21:16:25', '2025-05-31 21:16:25', 'bpm', 78.43, '2025-06-01 00:16:25'),
(126, '2025-05-31 21:16:48', '2025-05-31 21:16:48', 'temperature', 30.06, '2025-06-01 00:16:48'),
(127, '2025-05-31 21:16:48', '2025-05-31 21:16:48', 'bpm', 78.43, '2025-06-01 00:16:48'),
(128, '2025-05-31 21:17:12', '2025-05-31 21:17:12', 'temperature', 30.06, '2025-06-01 00:17:12'),
(129, '2025-05-31 21:17:12', '2025-05-31 21:17:12', 'bpm', 78.43, '2025-06-01 00:17:12'),
(130, '2025-05-31 21:17:35', '2025-05-31 21:17:35', 'temperature', 29.94, '2025-06-01 00:17:35'),
(131, '2025-05-31 21:17:35', '2025-05-31 21:17:35', 'bpm', 78.43, '2025-06-01 00:17:35'),
(132, '2025-05-31 21:17:59', '2025-05-31 21:17:59', 'temperature', 29.94, '2025-06-01 00:17:59'),
(133, '2025-05-31 21:17:59', '2025-05-31 21:17:59', 'bpm', 78.43, '2025-06-01 00:17:59'),
(134, '2025-05-31 21:18:22', '2025-05-31 21:18:22', 'temperature', 29.94, '2025-06-01 00:18:22'),
(135, '2025-05-31 21:18:22', '2025-05-31 21:18:22', 'bpm', 79.04, '2025-06-01 00:18:22'),
(136, '2025-05-31 21:18:46', '2025-05-31 21:18:46', 'temperature', 29.94, '2025-06-01 00:18:46'),
(137, '2025-05-31 21:18:46', '2025-05-31 21:18:46', 'bpm', 79.04, '2025-06-01 00:18:46'),
(138, '2025-05-31 21:19:09', '2025-05-31 21:19:09', 'temperature', 30, '2025-06-01 00:19:09'),
(139, '2025-05-31 21:19:09', '2025-05-31 21:19:09', 'bpm', 78.43, '2025-06-01 00:19:09'),
(140, '2025-05-31 21:19:32', '2025-05-31 21:19:32', 'temperature', 30, '2025-06-01 00:19:32'),
(141, '2025-05-31 21:19:33', '2025-05-31 21:19:33', 'bpm', 78.43, '2025-06-01 00:19:33'),
(142, '2025-05-31 21:19:56', '2025-05-31 21:19:56', 'temperature', 29.94, '2025-06-01 00:19:56'),
(143, '2025-05-31 21:19:56', '2025-05-31 21:19:56', 'bpm', 78.43, '2025-06-01 00:19:56'),
(144, '2025-05-31 21:24:28', '2025-05-31 21:24:28', 'temperature', 30, '2025-06-01 00:24:28'),
(145, '2025-05-31 21:24:28', '2025-05-31 21:24:28', 'bpm', 78.43, '2025-06-01 00:24:28'),
(146, '2025-05-31 21:24:51', '2025-05-31 21:24:51', 'temperature', 30.12, '2025-06-01 00:24:51'),
(147, '2025-05-31 21:24:51', '2025-05-31 21:24:51', 'bpm', 73.53, '2025-06-01 00:24:51'),
(148, '2025-05-31 21:25:15', '2025-05-31 21:25:15', 'temperature', 30.06, '2025-06-01 00:25:15'),
(149, '2025-05-31 21:25:15', '2025-05-31 21:25:15', 'bpm', 78.43, '2025-06-01 00:25:15');

-- --------------------------------------------------------

--
-- Table structure for table `sernsors`
--

CREATE TABLE `sernsors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `temptrature` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`temptrature`)),
  `heart_rate` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`heart_rate`)),
  `blood_pressure` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`blood_pressure`)),
  `prediction` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`prediction`)),
  `care_giver_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('HRN2rGNVypmXE0CDaA3OyeAQS6zT2Y3HZnRcFOyW', 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQVI2dW5qdk91STdwN0NYQUVBSlZBVGcydE9sdzlFbDQ4Rm1wZzhiYSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYXRpZW50Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6ODtzOjU3OiJsb2dpbl9jYXJlX2dpdmVyXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTt9', 1748896944);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT 'https://www.svgrepo.com/show/452030/avatar-default.svg',
  `address` varchar(255) DEFAULT NULL,
  `dateOfbirth` varchar(255) DEFAULT NULL,
  `chronic_diseases` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phone`, `avatar`, `address`, `dateOfbirth`, `chronic_diseases`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kaseem Willis', 'suwyf@mailinator.com', '+1 (776) 677-80', 'assets/avatars/683a04848ccd0.jpg', 'Consectetur deserunt', '19-Mar-1990', 'asthma', NULL, '$2y$12$8b/xfaw1UObwCRIKaqqmje7DhrP.a21Fy0.Mt9M6N2gj6uYOYO3vC', NULL, '2025-05-30 16:18:29', '2025-05-30 16:18:29'),
(2, 'SDAASDSAD', 'zoma@mailinator.com', '015540821', 'assets/avatars/683a0abb1bc31.jpg', 'Eveniet commodi dol', '06-Nov-2024', 'diabetes', NULL, '$2y$12$TzVw3JqOSs4CRtKnzCvIr.KmCWRQCt7GLgKiyMUhXguFoBaFb7dF2', NULL, '2025-05-30 16:44:59', '2025-05-30 18:43:49'),
(3, 'Tanya Barrera', 'lyfekerym@mailinator.com', '+1 (453) 698', 'assets/avatars/683ad2df4bfdd.jpg', 'Eum odit anim et dol', '22-Mar-1990', 'asthma', NULL, '$2y$12$utEZnG/8wOxQeKImOd4KmOFLDDUfUVY4vE4Q7ZoQF8aZAwFlR7.Im', NULL, '2025-05-31 06:58:55', '2025-05-31 06:58:55'),
(4, 'Carly Swanson', 'jasy@mailinator.com', '+1 (964) 1', 'assets/avatars/683b8f49a3058.jpg', 'Iusto dolor quos id', '13-Aug-1996', 'asthma', NULL, '$2y$12$n6YCEqFrxiOe1roeJvNIzOgz06kyyhFH6FsddDLacrwIxCwzuFJi.', NULL, '2025-05-31 20:22:50', '2025-05-31 20:22:50'),
(5, 'Quyn Foley', 'fecixamuj@mailinator.com', '+1 (436) 74', 'assets/avatars/683bd1cb1d321.jpg', 'Veniam provident e', '26-Jul-1973', 'none', NULL, '$2y$12$5UGTQheKm/9u2BedHSVY9OT0HW7saUMiWFxZFmjAD3b0MfCoKKaPm', NULL, '2025-06-01 01:06:35', '2025-06-01 01:06:35'),
(6, 'Tana Miller', 'rinyjog@mailinator.com', '0155408', 'assets/avatars/683e096471842.jpg', 'Cumque quia sed ut e', '13-Feb-2023', 'hypertension', NULL, '$2y$12$4NPF6GDbd6G63Yrk08nEPOu08eP2SztCe5sw.Mm57PSxNN331orau', NULL, '2025-06-02 17:28:20', '2025-06-02 17:28:20'),
(7, 'Peace non', 'role@mailinator.com', '123456', 'assets/avatars/683e0b39bd8bd.jpg', 'Excepturi sint tempo', '18-Jan-2014', 'diabetes', NULL, '$2y$12$WXmDp13qQ/G6Z/5ESq3xBub2dVMGAjI1dYXhxSVqFREPjyMy0zzQ2', NULL, '2025-06-02 17:36:09', '2025-06-02 17:36:09'),
(8, 'Tatyana Weeks', 'rysuwuko@mailinator.com', '014305415', 'assets/avatars/683e0c1f907d5.jpg', 'Hic asperiores ad cu', '02-Oct-1988', 'diabetes', NULL, '$2y$12$ErYGcW1OpzyYuoRjJGAJo.burEAy47SttYO9j0xowfDT/Gj61bUsW', NULL, '2025-06-02 17:39:59', '2025-06-02 17:39:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ai_predictions`
--
ALTER TABLE `ai_predictions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `care_givers`
--
ALTER TABLE `care_givers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `care_givers_email_unique` (`email`),
  ADD KEY `care_givers_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sensor_readings`
--
ALTER TABLE `sensor_readings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sernsors`
--
ALTER TABLE `sernsors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sernsors_care_giver_id_foreign` (`care_giver_id`),
  ADD KEY `sernsors_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ai_predictions`
--
ALTER TABLE `ai_predictions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `care_givers`
--
ALTER TABLE `care_givers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sensor_readings`
--
ALTER TABLE `sensor_readings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `sernsors`
--
ALTER TABLE `sernsors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `care_givers`
--
ALTER TABLE `care_givers`
  ADD CONSTRAINT `care_givers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sernsors`
--
ALTER TABLE `sernsors`
  ADD CONSTRAINT `sernsors_care_giver_id_foreign` FOREIGN KEY (`care_giver_id`) REFERENCES `care_givers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sernsors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
