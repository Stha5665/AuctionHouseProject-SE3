-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 04:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction_house`
--

-- --------------------------------------------------------

--
-- Table structure for table `auctions`
--

CREATE TABLE `auctions` (
  `id` char(36) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `is_archived` enum('yes','no') NOT NULL DEFAULT 'no',
  `status` varchar(255) NOT NULL DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auctions`
--

INSERT INTO `auctions` (`id`, `title`, `description`, `start_date`, `end_date`, `address`, `is_archived`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('2c1a3ef1-18bc-4574-b5f3-c4c92ef4f604', 'Food Image Collection', 'ok', '2023-09-24', '2023-09-28', 'USA', 'no', 'open', '2023-09-23 03:57:52', '2023-09-23 04:00:30', NULL),
('3264c969-ec6c-44fe-ae87-d2f73a91aee7', 'Rock Auction', 'ok', '2023-09-25', '2023-09-29', 'UK', 'no', 'open', '2023-09-23 04:59:29', '2023-09-23 04:59:49', NULL),
('3da2c69a-0d02-4e9e-b6d7-ecd776531c6b', 'Roll1', 'ok', '2023-09-25', '2023-09-27', 'USA', 'no', 'open', '2023-09-23 04:52:26', '2023-09-23 04:52:55', NULL),
('74ca2e74-edfe-4433-9bf0-567d32c95572', 'Classic Picture', 'Ut quos vitae laboru', '2023-09-24', '2023-09-25', 'UK', 'no', 'open', '2023-09-14 12:58:29', '2023-09-23 03:47:14', NULL),
('9cf249da-2240-43e5-b924-b74895ab1df9', 'Images Collection1', 'Collection of image', '2023-09-24', '2023-09-27', 'UK', 'no', 'open', '2023-09-23 03:36:52', '2023-09-23 03:37:03', NULL),
('a40be38c-49b4-4b9b-92c5-d360de635d49', 'Collection of game', 'ok', '2023-09-24', '2023-09-29', 'USA', 'no', 'open', '2023-09-23 04:28:27', '2023-09-23 04:35:53', NULL),
('b918b787-a57c-4ad7-b925-5613f6a8b134', 'Modern image', 'For moder images', '2023-09-25', '2023-09-29', 'UK', 'no', 'open', '2023-09-23 03:26:19', '2023-09-23 03:26:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` char(36) NOT NULL,
  `amount` double(12,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `auction_id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `item_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `amount`, `description`, `type`, `status`, `auction_id`, `user_id`, `item_id`, `created_at`, `updated_at`) VALUES
('2b6032bd-b835-4bf4-8301-cb6e0cae3053', 3002.00, 'ok', 'advance', 'open', 'b918b787-a57c-4ad7-b925-5613f6a8b134', '1e965a28-b019-45a8-9c03-84ad0e587c95', 'b6ae59d2-fd66-4033-b42a-dd6e85bd52f1', '2023-09-23 05:03:51', '2023-09-23 05:03:51'),
('7ef70e07-c451-4e31-acfd-da52cb3aab6b', 2655.00, 'Dolore illo placeat', 'normal', 'open', '74ca2e74-edfe-4433-9bf0-567d32c95572', '4d61adb3-4326-44e7-8b6f-5df228cfe157', 'b6ae59d2-fd66-4033-b42a-dd6e85bd52f1', '2023-09-14 14:17:42', '2023-09-14 14:17:42'),
('9bccbf3a-e3bd-459f-8084-3abbbfaa1800', 3000.00, 'Ok i will buy', 'advance', 'open', 'a40be38c-49b4-4b9b-92c5-d360de635d49', '1e965a28-b019-45a8-9c03-84ad0e587c95', '39968930-0895-4158-a139-8c28e60504b2', '2023-09-23 04:34:50', '2023-09-23 04:34:50'),
('c0c649af-2502-4bad-a7f0-61d251cc8296', 999.05, 'jhhj', 'normal', 'open', '74ca2e74-edfe-4433-9bf0-567d32c95572', '4d61adb3-4326-44e7-8b6f-5df228cfe157', 'b6ae59d2-fd66-4033-b42a-dd6e85bd52f1', '2023-09-14 13:46:02', '2023-09-14 13:46:02'),
('d045f9b3-8a86-4cdb-ab54-d24832bb317c', 3000.00, 'ok', 'advance', 'open', '74ca2e74-edfe-4433-9bf0-567d32c95572', '1e965a28-b019-45a8-9c03-84ad0e587c95', 'b6ae59d2-fd66-4033-b42a-dd6e85bd52f1', '2023-09-23 05:03:39', '2023-09-23 05:03:39'),
('dce101e4-03bc-46ed-9cd7-a8be3c049bbb', 2990.00, 'ok', 'advance', 'open', 'b918b787-a57c-4ad7-b925-5613f6a8b134', '1e965a28-b019-45a8-9c03-84ad0e587c95', 'b6ae59d2-fd66-4033-b42a-dd6e85bd52f1', '2023-09-23 04:06:00', '2023-09-23 04:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `catalogues`
--

CREATE TABLE `catalogues` (
  `id` char(36) NOT NULL,
  `title` varchar(255) NOT NULL,
  `lot_number` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `estimated_price` int(11) NOT NULL,
  `is_archived` enum('yes','no') NOT NULL DEFAULT 'no',
  `auction_id` char(36) NOT NULL,
  `item_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalogues`
--

INSERT INTO `catalogues` (`id`, `title`, `lot_number`, `description`, `estimated_price`, `is_archived`, `auction_id`, `item_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('221fd3ca-7db0-4bc7-8155-6a4246d3f314', 'Modern Image collection', '1', 'This is the collection of moder image', 235, 'no', 'b918b787-a57c-4ad7-b925-5613f6a8b134', 'b6ae59d2-fd66-4033-b42a-dd6e85bd52f1', '2023-09-23 03:27:57', '2023-09-23 03:27:57', NULL),
('41ea4f4f-0502-4265-a826-a66dcd681308', 'Hello roll', '2', 'ok', 334, 'no', '3da2c69a-0d02-4e9e-b6d7-ecd776531c6b', '3ec7c926-7d40-46e2-b181-a0b0c06406c3', '2023-09-23 04:53:48', '2023-09-23 04:53:48', NULL),
('4e31f7e9-e4f3-4487-8330-a05e0932e565', 'Roll and Rock', '1', 'ok', 223, 'no', '3da2c69a-0d02-4e9e-b6d7-ecd776531c6b', 'd1e2af14-1a1f-44f0-b393-60b25c92ab4a', '2023-09-23 04:53:23', '2023-09-23 04:53:23', NULL),
('94f8c792-d7eb-47be-aaa4-b7f0e583e36d', 'Et voluptas in facer', '700', 'Officiis amet nesci', 948, 'no', '74ca2e74-edfe-4433-9bf0-567d32c95572', 'b6ae59d2-fd66-4033-b42a-dd6e85bd52f1', '2023-09-14 12:58:48', '2023-09-23 03:47:14', NULL),
('d771b99c-cfb3-4c56-a955-46dd0c3f2cfe', 'Collecction1', '1', 'ok', 2276, 'no', 'a40be38c-49b4-4b9b-92c5-d360de635d49', '39968930-0895-4158-a139-8c28e60504b2', '2023-09-23 04:29:04', '2023-09-23 04:35:53', NULL),
('dda296f2-321c-48ac-8efb-e180a868a093', 'Collection of images', '1', 'Collection', 225, 'no', '9cf249da-2240-43e5-b924-b74895ab1df9', 'd1e2af14-1a1f-44f0-b393-60b25c92ab4a', '2023-09-23 03:37:48', '2023-09-23 03:37:48', NULL),
('df885995-3c04-4ce8-93b6-73e7ab75d17a', 'Food Image best1', '1', 'Food best', 20201, 'no', '2c1a3ef1-18bc-4574-b5f3-c4c92ef4f604', '5af7a2b3-0a05-40f8-9af9-256f1f723849', '2023-09-23 03:58:40', '2023-09-23 04:00:30', NULL),
('e16a2bc8-9e70-4058-a358-058d67618306', 'Rock', '1', 'ok', 455, 'no', '3264c969-ec6c-44fe-ae87-d2f73a91aee7', '0507e551-38e3-4666-987f-e98a4e1756fd', '2023-09-23 05:00:07', '2023-09-23 05:00:07', NULL);

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
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lot_reference_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `artist_name` varchar(255) NOT NULL,
  `produced_year` date NOT NULL,
  `subject_classification` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `is_archived` enum('yes','no') NOT NULL DEFAULT 'no',
  `user_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `lot_reference_id`, `status`, `artist_name`, `produced_year`, `subject_classification`, `description`, `image_path`, `is_archived`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('0507e551-38e3-4666-987f-e98a4e1756fd', 'Rock Image', 63133470, 'open', 'Rock', '2023-08-02', 'still life', 'ok', 'uploads/items/0507e551-38e3-4666-987f-e98a4e1756fd.jpg', 'no', '4d61adb3-4326-44e7-8b6f-5df228cfe157', '2023-09-23 04:58:56', '2023-09-23 04:58:56', NULL),
('20454bd0-1520-4af8-ab03-566f7cb50262', 'JavaImg', 63133467, 'open', 'Alpha Java', '2023-09-27', 'figure', 'ok', 'uploads/items/20454bd0-1520-4af8-ab03-566f7cb50262.jpg', 'no', 'b6b8aca2-f104-457f-bba5-96acee4c9eea', '2023-09-23 04:04:07', '2023-09-23 04:04:07', NULL),
('39968930-0895-4158-a139-8c28e60504b2', 'Game1', 63133468, 'open', 'Java', '2022-01-24', 'landscape', 'ok', 'uploads/items/39968930-0895-4158-a139-8c28e60504b2.jpg', 'no', '4d61adb3-4326-44e7-8b6f-5df228cfe157', '2023-09-23 04:27:37', '2023-09-23 04:27:49', NULL),
('3ec7c926-7d40-46e2-b181-a0b0c06406c3', 'Shinchan laugh', 63133465, 'open', 'John', '2022-05-23', 'landscape', 'For the cartoons', 'uploads/items/3ec7c926-7d40-46e2-b181-a0b0c06406c3.jpg', 'no', '4d61adb3-4326-44e7-8b6f-5df228cfe157', '2023-09-23 03:42:46', '2023-09-23 03:43:15', NULL),
('4239fb22-138f-4863-b26c-1721063744f1', 'Meat', 63133469, 'open', 'Alpha', '2023-09-12', 'nude', 'Ok', 'uploads/items/4239fb22-138f-4863-b26c-1721063744f1.jpg', 'no', 'b6b8aca2-f104-457f-bba5-96acee4c9eea', '2023-09-23 04:32:59', '2023-09-23 04:32:59', NULL),
('5af7a2b3-0a05-40f8-9af9-256f1f723849', 'Food Image1', 63133466, 'open', 'Java', '2023-09-25', 'still life', 'ok', 'uploads/items/5af7a2b3-0a05-40f8-9af9-256f1f723849.jpg', 'no', '4d61adb3-4326-44e7-8b6f-5df228cfe157', '2023-09-23 03:56:39', '2023-09-23 03:57:01', NULL),
('b6ae59d2-fd66-4033-b42a-dd6e85bd52f1', 'Nash Paul', 63133463, 'open', 'Xanthus Oconnor', '1979-10-17', 'portrait', 'Cumque fugiat incidi', 'uploads/items/b6ae59d2-fd66-4033-b42a-dd6e85bd52f1.jpg', 'no', '4d61adb3-4326-44e7-8b6f-5df228cfe157', '2023-09-14 12:57:24', '2023-09-14 12:57:24', NULL),
('d1e2af14-1a1f-44f0-b393-60b25c92ab4a', 'Shinchan Image', 63133464, 'open', 'Alpha', '2022-01-23', 'landscape', 'Fine image', 'uploads/items/d1e2af14-1a1f-44f0-b393-60b25c92ab4a.jpg', 'no', '4d61adb3-4326-44e7-8b6f-5df228cfe157', '2023-09-23 03:36:00', '2023-09-23 03:36:00', NULL),
('f1b6794e-df84-4c0a-9fb6-6b9b952038b7', 'bread', 63133471, 'open', 'bread', '2023-09-20', 'figure', 'ok', 'uploads/items/f1b6794e-df84-4c0a-9fb6-6b9b952038b7.jpg', 'no', 'b6b8aca2-f104-457f-bba5-96acee4c9eea', '2023-09-23 05:02:27', '2023-09-23 05:02:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` char(36) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `used_medium` varchar(255) DEFAULT NULL,
  `used_material` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `dimension` varchar(255) DEFAULT NULL,
  `image_type_of` varchar(255) DEFAULT NULL,
  `is_framed` enum('yes','no') DEFAULT NULL,
  `item_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `category_name`, `used_medium`, `used_material`, `weight`, `dimension`, `image_type_of`, `is_framed`, `item_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('01e85374-794e-4718-bee9-0aabdf8f9cba', 'Image', 'paint', 'paint', NULL, '25 * 30cm', 'BLACK', 'yes', '39968930-0895-4158-a139-8c28e60504b2', '2023-09-23 04:27:37', '2023-09-23 04:27:37', NULL),
('17881999-e558-4168-a684-52e7434072db', 'bread', 'ok', 'ok', NULL, '12 cm', 'BLACK', 'yes', 'f1b6794e-df84-4c0a-9fb6-6b9b952038b7', '2023-09-23 05:02:27', '2023-09-23 05:02:27', NULL),
('2f3c6c6d-3043-4007-92d6-3609679d51e9', 'Charde Clemons', NULL, 'Et architecto sit q', 'Non rerum perferendi', 'Harum quidem qui sit', 'BLACK', 'yes', 'b6ae59d2-fd66-4033-b42a-dd6e85bd52f1', '2023-09-14 12:57:24', '2023-09-14 12:57:24', NULL),
('40001606-8074-45a6-8125-1e8cca2a532b', 'Food', 'art', 'paint', NULL, '30cm * 40cm', 'BLACK', 'yes', '5af7a2b3-0a05-40f8-9af9-256f1f723849', '2023-09-23 03:56:39', '2023-09-23 03:56:39', NULL),
('6aade587-b2c7-4b0c-9fd8-8b8a35a40c4f', 'Rock', 'paint', 'paint', NULL, '23 *40 cm', 'BLACK', 'yes', '0507e551-38e3-4666-987f-e98a4e1756fd', '2023-09-23 04:58:56', '2023-09-23 04:58:56', NULL),
('8196f782-0865-4f02-913a-c8c4880fa9f0', 'Image', 'paint', 'color', NULL, '13 * 20 cm', 'COLOR', 'yes', 'd1e2af14-1a1f-44f0-b393-60b25c92ab4a', '2023-09-23 03:36:00', '2023-09-23 03:36:00', NULL),
('cc494f85-4650-48db-b7a4-61f10144f846', 'Image', 'quarter', 'image', NULL, '35*40cm', 'BLACK', 'yes', '20454bd0-1520-4af8-ab03-566f7cb50262', '2023-09-23 04:04:07', '2023-09-23 04:04:07', NULL),
('d2a4c6a3-99e9-46f9-b4ed-e167c56de8fe', '12', 'ok', '11', NULL, '21*30cm', 'BLACK', 'yes', '4239fb22-138f-4863-b26c-1721063744f1', '2023-09-23 04:32:59', '2023-09-23 04:32:59', NULL),
('dd5c1075-a380-4a44-a236-817f15a4ae1e', 'Image', 'painting', 'color image', NULL, '22 *30cm', 'BLACK', 'yes', '3ec7c926-7d40-46e2-b181-a0b0c06406c3', '2023-09-23 03:42:46', '2023-09-23 03:42:46', NULL);

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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2023_09_07_052632_create_items_table', 1),
(16, '2023_09_07_053836_create_auctions_table', 1),
(17, '2023_09_07_054014_create_catalogues_table', 1),
(18, '2023_09_10_094731_item_categories', 1),
(19, '2023_09_14_180706_create_bids_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unverified',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `address`, `phone_number`, `email`, `email_verified_at`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1e965a28-b019-45a8-9c03-84ad0e587c95', 'Hero', NULL, 'Man', 'Northampton', '98987887', 'hero@gmail.com', NULL, '$2y$10$3SSHt4/FClQPq/pnP3XvzOO2GKS80EFK0Cwcb70j/j5exEPvDG0Bi', 'buyer', 'active', NULL, '2023-09-23 04:05:04', '2023-09-23 04:05:04', NULL),
('217a815f-b7e6-4e51-a5de-00b4c90741af', 'Aayush', NULL, 'Shrestha', 'Kathmandu', '9898989877', 'aayushstha56@gmail.com', NULL, '$2y$10$6Ca8hicJV3sUaEiFICRV7Oqrd4eCEstPzp2grrc6nbjiK771cQEEO', 'seller', 'verified', NULL, '2023-09-23 03:12:51', '2023-09-23 03:18:52', NULL),
('4d61adb3-4326-44e7-8b6f-5df228cfe157', 'admin', NULL, 'admin', 'Kathmandu', '+977-9841678632', 'aucadmin@gmail.com', NULL, '$2y$10$jvYuqD2jcu6Ca61L1z0jxOr9Ys5.97/8x3omNsxRrQ44eLFSCw0Pu', 'admin', 'verified', NULL, '2023-09-14 12:56:52', '2023-09-23 03:31:00', NULL),
('9562ec10-d259-4c62-8d1f-9e09cfd2eff8', 'Test', NULL, 'Man', 'Test chowk', '98989898987', 'test@gmail.com', NULL, '$2y$10$7D8/ABz6dOWqiA0rkodhqOp108s3DnIp5oa35Q/j9So4IcHNA2dz6', 'both', 'verified', NULL, '2023-09-24 08:48:00', '2023-09-24 08:49:52', NULL),
('b6b8aca2-f104-457f-bba5-96acee4c9eea', 'Shyam', 'Bahadhur', 'Thapa', 'Gorkha, Nepal', '9898778875', 'shyam12@gmail.com', NULL, '$2y$10$4lCkD1obsZnPyJA84wuqY.OlWTym3xzrFSxYW2hPt9pnEGHKQnkeO', 'seller', 'verified', NULL, '2023-09-23 03:14:13', '2023-09-23 05:01:45', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auctions`
--
ALTER TABLE `auctions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bids_auction_id_foreign` (`auction_id`),
  ADD KEY `bids_user_id_foreign` (`user_id`),
  ADD KEY `bids_item_id_foreign` (`item_id`);

--
-- Indexes for table `catalogues`
--
ALTER TABLE `catalogues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catalogues_auction_id_foreign` (`auction_id`),
  ADD KEY `catalogues_item_id_foreign` (`item_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_user_id_foreign` (`user_id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_categories_item_id_foreign` (`item_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_auction_id_foreign` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`id`),
  ADD CONSTRAINT `bids_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `bids_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `catalogues`
--
ALTER TABLE `catalogues`
  ADD CONSTRAINT `catalogues_auction_id_foreign` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`id`),
  ADD CONSTRAINT `catalogues_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD CONSTRAINT `item_categories_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
