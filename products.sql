-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2021 at 06:15 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trend_setter_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_04_04_200956_create_products_table', 1),
(10, '2021_04_04_201148_create_variations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` enum('men','women','youth','apparel','used') COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `size`, `category`, `quantity`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Air Jordan 1 Retro High Og \'Lucky Green\'', '$275', '10.5', 'men', 1, 'storage/images/air-jordan-1-retro-high-lucky-green-w.jpg', '2021-05-03 17:09:24', '2021-05-03 17:09:24'),
(4, 'Air Jordan 13 Retro \'Flint\'', '$275', '10', 'men', 1, 'storage/images/air-jordan-13-retro-flint-2020.jpg', '2021-05-03 19:31:58', '2021-05-03 19:31:58'),
(5, 'Nike Air Barrage Low \'Black\'', 'Price Negotiable', '10', 'men', 1, 'storage/images/air-barrage-low-black.png', '2021-05-03 19:31:58', '2021-05-03 19:31:58'),
(6, 'Air Jordan 1 Retro High OG \'David Letterman\'', '$275', '11.5', 'men', 1, 'storage/images/jordan-1-retro-david-letterman.jpg', '2021-05-03 19:31:58', '2021-05-03 19:31:58'),
(7, 'Air Jordan 7 Retro \'Ray Allen\' Bucks PE', '$275', '10.5', 'men', 1, 'storage/images/air-jordan-7-retro-ray-allen-bucks.jpg', '2021-05-03 19:31:58', '2021-05-03 19:31:58'),
(8, 'Air Jordan 8 Retro SP SE \'Multi-Color\'', '$275', '9', 'men', 1, 'storage/images/air-jordan-8-sp-retro-se-white-multi-dsm.jpg', '2021-05-03 19:31:58', '2021-05-03 19:31:58'),
(9, 'Air Jordan 11 Retro Low \'Concord-Bred\'', '$275', '10.5', 'men', 1, 'storage/images/air-jordan-11-retro-low-white-concord-sketch.jpg', '2021-05-03 19:31:58', '2021-05-03 19:31:58'),
(10, 'Air Jordan 6 Retro SE GS \'Defining Moments\' 2020', '$275', '9', 'men', 1, 'storage/images/air-jordan-6-retro-se-gs-defining-moments-2020.jpeg', '2021-05-03 19:31:58', '2021-05-03 19:31:58'),
(11, 'Air Jordan 3 Retro Denim SE \'Fire Red\'', '$275', '9', 'men', 1, 'storage/images/air-jordan-3-retro-se-fire-red-2020.jpg', '2021-05-03 19:57:18', '2021-05-03 19:57:18'),
(12, 'Undefeated X Air Max 97 \'Militia Green\'', 'Price Negotiable\r\n', '9', 'men', 1, 'storage/images/nike-air-max-97-x-undefeated-undftd-black-mens.jpg', '2021-05-03 19:57:18', '2021-05-03 19:57:18'),
(13, 'Air Jordan 12 Retro \'University Gold\'', '$275', '12', 'men', 1, 'storage/images/air-jordan-12-university-gold-130690-070.jpeg', '2021-05-03 19:57:18', '2021-05-03 19:57:18'),
(14, 'Air Jordan 11 Retro \'Neutral Olive\'', '$275', '10', 'men', 1, 'storage/images/air-jordan-11-retro-neutral-olive-w.jpg', '2021-05-03 19:57:18', '2021-05-03 19:57:18'),
(15, 'Air Jordan 12 Low SE \'Super Bowl\'', '$275', '9', 'men', 1, 'storage/images/air-jordan-12-low-se-superbowl-lv.jpg', '2021-05-03 19:57:18', '2021-05-03 19:57:18'),
(16, 'Nike Air Jordan JumpMan Swift \'Lakers\'', '$275', '11', 'men', 1, 'storage/images/Air-Jordan-Jumpman-Swift-Lakers.jpeg', '2021-05-03 19:57:18', '2021-05-03 19:57:18'),
(17, 'Nike React Presto \'Cosmic Clay\'', 'Price Negotiable', '10', 'men', 1, 'storage/images/Nike-Reacto-Presto-Cosmic-Clay.jpg', '2021-05-03 19:57:18', '2021-05-03 19:57:18'),
(18, 'Nike Space Hippie 04', 'Price Negotiable', '10', 'men', 1, 'storage/images/nike-space-hippie-04-grey-volt-w.jpg', '2021-05-03 19:57:18', '2021-05-03 19:57:18'),
(19, 'Air Jordan 5 Retro Alternate Bel-Air', '$275', '9', 'men', 1, 'storage/images/air-jordan-5-retro-alternate-bel-air.jpg', '2021-05-03 20:09:56', '2021-05-03 20:09:56'),
(20, 'Air Jordan 5 Retro SE \'What The\'', '$275', '10.5', 'men', 1, 'storage/images/air-jordan-5-what-the.jpg', '2021-05-03 20:09:56', '2021-05-03 20:09:56'),
(21, 'Nike Vapor Street (OW/Black/White/Black)', 'Price Negotiable', '9.5', 'men', 1, 'storage/images/WS Vapor Street OWBlackWhiteBlack.jpg', '2021-05-03 20:09:56', '2021-05-03 20:09:56'),
(22, 'Nike Dunk Hi SP \'Varsity Maize\'', 'Price Negotiable', '9.5', 'men', 1, 'storage/images/nike-dunk-high-black-varsity-maize.jpg', '2021-05-03 20:09:56', '2021-05-03 20:09:56'),
(23, 'Nike Cortez Basic Leather', 'Price Negotiable', '8', 'men', 1, 'storage/images/nike-cortez-basic-leather-white-black-2017.jpg', '2021-05-03 20:09:56', '2021-05-03 20:09:56'),
(24, 'Nike Air Max 90 Reverse Duck Camo', 'Price Negotiable', '9', 'men', 1, 'storage/images/Nike-Air-Max-90-Reverse-Duck-Camo-2020.jfif', '2021-05-03 20:09:56', '2021-05-03 20:09:56'),
(25, 'Nike Air Force 1 Low \'Drew League\'', 'Price Negotiable', '9', 'men', 1, 'storage/images/Nike-Air-Force-1-Low-Drew-League-2020.jpg', '2021-05-03 20:09:56', '2021-05-03 20:09:56'),
(26, 'Puma Men\'s Suede Classic (Olympian Blue / White)', 'Price Negotiable', '10.5', 'men', 1, 'storage/images/puma-suede-classic-mens-shoes-olympian-blue-white.jpg', '2021-05-03 20:09:56', '2021-05-03 20:09:56'),
(27, 'Air Griffey Max 1 \'Freshwater\'', 'Price Negotiable', '8.5', 'men', 1, 'storage/images/nike-air-griffey-max-1-white-freshwater-2021.jpg', '2021-05-03 20:24:36', '2021-05-03 20:24:36'),
(28, 'Nike Air Jordan 1 (Lt. Crimson/Mid Navy-University/BL-WH)', '$275', '11.5', 'men', 1, 'storage/images/Nike Air Jordan 1 LT CRMSNMid NVy University BL WH.jpg', '2021-05-03 20:24:36', '2021-05-03 20:24:36'),
(29, 'Nike Air Jordan 7 GC (White/Chile Red)', '$275', '11', 'men', 1, 'storage/images/Air Jordan 7 GC White Chili Red.png', '2021-05-03 20:24:36', '2021-05-03 20:24:36'),
(30, 'Nike Air Jordan 1 (Black/Metallic Gold-Black)', '$275', '11', 'men', 1, 'storage/images/Air Jordan 1 Black Metallic Gold Black.jpg', '2021-05-03 20:24:36', '2021-05-03 20:24:36'),
(31, 'Nike Air Jordan 1 High OG CO JP (Neutral Grey/Metallic Silver)', '$275', '10.5', 'men', 1, 'storage/images/Air Jordan 1 High OG CO JP Neutral Grey Metallic Silver.jpg', '2021-05-03 20:24:36', '2021-05-03 20:24:36'),
(32, 'Nike Air Jordan 1 Retro High OG (Black/Metallic Gold-Black)', '$275', '10.5', 'men', 1, 'storage/images/Air Jordan 1 Black Metallic Gold Black.jpg', '2021-05-03 20:24:36', '2021-05-03 20:24:36'),
(33, 'Nike Air Jordan 1 Low Court (Purple/Black-White)', '$275', '10.5', 'men', 1, 'storage/images/Air Jordan 1 Low Court Purple Black White.jpg', '2021-05-03 20:24:36', '2021-05-03 20:24:36'),
(34, 'Nike Air Jordan 13 (White/Starfish-Black)Nike Air Jordan 13 (White/Starfish-Black)', '$275', '10.5', 'men', 1, 'storage/images/Air-Jordan-13-Retro-Starfish.png', '2021-05-03 20:24:36', '2021-05-03 20:24:36'),
(35, 'Nike Air Jordan 11 Retro Low (White/University Red-Black)', '$275', '10.5', 'men', 1, 'storage/images/Air Jordan 11 Retro Low White University Red Black.jpg', '2021-05-03 20:30:29', '2021-05-03 20:30:29'),
(36, 'Nike Air Jordan 5 Retro SE (Varsity/Maize/Solar Orange)', '$275', '10.5', 'men', 1, 'storage/images/Air Jordan 5 Retro SE Varsity Maize Solar Orange.jpg', '2021-05-03 20:30:29', '2021-05-03 20:30:29'),
(37, 'Nike Air Jordan 12 (Stone Blue/Legend Blue)', '$275', '10.5', 'men', 1, 'storage/images/Air Jordan 12 Stone Blue Legend Blue.jpg', '2021-05-03 20:30:29', '2021-05-03 20:30:29'),
(38, 'Nike Air Jordan 9 (White/University Blue/Black)', '$275', '10.5', 'men', 1, 'storage/images/Air Jordan 9 White University Blue  Black.jpg', '2021-05-03 20:30:29', '2021-05-03 20:30:29'),
(39, 'Nike Air Jordan 4 Retro SE 95\' (Cool Grey/Volt/Wolf Grey)', '$275', '10.5', 'men', 1, 'storage/images/Air jordan 4 retro col grey.jpg', '2021-05-03 20:30:29', '2021-05-03 20:30:29'),
(40, 'Nike Air Jordan 7 (Retro Black/Field Purple/Fir)', '$275', '10.5', 'men', 1, 'storage/images/Air Jordan 7 RetroBlack Field Purple Fir.jpg', '2021-05-03 20:30:29', '2021-05-03 20:30:29'),
(41, 'Nike Air Jordan 12 \'Reverse Flu Game\'', '$275', '10.5', 'men', 1, 'storage/images/air-jordan-12-reverse-flu-game-1.jpg', '2021-05-03 20:30:29', '2021-05-03 20:30:29'),
(42, 'Reebok Answer V (Black/DRKGRN/Fiegol)', '$275', '10.5', 'men', 1, 'storage/images/Reebok Answer V BlackDRKGRN Fiegol.jpg', '2021-05-03 20:30:29', '2021-05-03 20:30:29'),
(43, 'Nike Air Max Uptempo 95\' QS (Dark Pewter/Volt-Black-White)', 'Price Negotiable', '10', 'men', 1, 'storage/images/Air Max Uptempo 95 Qs DK PewterVolt Black White.jpg', '2021-05-03 20:46:54', '2021-05-03 20:46:54'),
(44, 'Nike Air Jordan 1 Mid SE Turf Orange/Black-White', '$275', '10', 'men', 1, 'storage/images/Air Jordan 1 Mid SE Turf Orange Black White.jpg', '2021-05-03 20:46:54', '2021-05-03 20:46:54'),
(45, 'Nike Air Jordan 14 (White/Black/Hyper Royal)', '$275', '10', 'men', 1, 'storage/images/Air Jordan 14 WhiteBlackHyper Royal.png', '2021-05-03 20:46:54', '2021-05-03 20:46:54'),
(46, 'Nike Air Jordan 5 Retro SE \'Oregon\' (Apple Green/Black/Black)', '$275', '9', 'men', 1, 'storage/images/jordan-air-jordan-5-se-oregon-sneakers.jpg', '2021-05-03 20:46:54', '2021-05-03 20:46:54'),
(47, 'Nike Air Jordan 4 (White/Fire Red/Black/Tech Grey)', '$275', '10', 'men', 1, 'storage/images/Air Jordan 4 WhiteFire RedBlackTech Grey.jpg', '2021-05-03 20:46:54', '2021-05-03 20:46:54'),
(48, 'Nike Air Jordan 11 Low IE (Black/Fire Red/Cement Grey)', '$275', '10', 'men', 1, 'storage/images/Air Jordan 11 Low IE BlackFire RedCement Grey.jpg', '2021-05-03 20:46:54', '2021-05-03 20:46:54'),
(49, 'Nike Air Jordan 3 Retro SE \'Unite\' (Fire Red/Fire Red/Cement Grey)', '$275', '9', 'men', 1, 'storage/images/Air Jordan 3 Retro SEFire RedFire RedCement Grey.jpg', '2021-05-03 20:46:54', '2021-05-03 20:46:54'),
(50, 'Nike Air Jordan 3 Retro SE (Black/Multi-Color/Dark Mocha)', '$275', '9.5', 'men', 1, 'storage/images/Air Jordan 3 Retro SEBlackMultiColorDark Mocha.jpg', '2021-05-03 20:46:54', '2021-05-03 20:46:54'),
(51, 'Nike Air Jordan XX3 (White/Black/Varsity Red)', 'Price Negotiable', '10', 'men', 1, 'storage/images/Air Jordan XX3 WhiteBlack Varsity Red.png', '2021-05-03 20:54:00', '2021-05-03 20:54:00'),
(52, 'Nike Air Jordan 9 (White/University Blue/Black)', '$275', '10', 'men', 1, 'storage/images/Air Jordan 9 White University Blue  Black.jpg', '2021-05-03 20:54:00', '2021-05-03 20:54:00'),
(53, 'Adidas Yeezy Boost 380 \'Mist\'', 'Price Negotiable', '9.5', 'men', 1, 'storage/images/Adidas Yeezy Boost 380 MistMist.jpg', '2021-05-03 20:54:00', '2021-05-03 20:54:00'),
(54, 'Adidas Yeezy Boost 350 V2 \'Natural\'', 'Price Negotiable', '10.5', 'men', 1, 'storage/images/adidas-yeezy-boost-350-v2-natural.jpg', '2021-05-03 20:54:00', '2021-05-03 20:54:00'),
(55, 'Air Jordan 5 Retro \'Fire Red\' 2020', '$275', '9.5', 'men', 1, 'storage/images/Air Jordan 5 True WhiteFire RedBlack.jpg', '2021-05-03 20:54:00', '2021-05-03 20:54:00'),
(56, 'Nike Air Jordan 5 (White/Ghost Green/Court Purple)', '$275', '9', 'men', 1, 'storage/images/Air Jordan 5 WhiteGhost GreenCourt Purple.jpg', '2021-05-03 20:54:00', '2021-05-03 20:54:00'),
(57, 'Nike Air Force 1 \'07 LV8 (Orange Trance/Pacific Blue)', 'Price Negotiable', '9.5', 'men', 1, 'storage/images/Air Force 1 \'07 LV8 Orange TrancePacific Blue.jpg', '2021-05-03 20:54:00', '2021-05-03 20:54:00'),
(58, 'Nike Air Jordan 11 Low IE (Black/Fire Red/Cement Grey)', '$275', '9.5', 'men', 1, 'storage/images/Air Jordan 11 Low IE BlackFire RedCement Grey.jpg', '2021-05-03 20:54:00', '2021-05-03 20:54:00'),
(59, 'Nike Air Jordan 5 Grape Ice New Emerald Black.jpg', '$275', '9.5', 'men', 1, 'storage/images/Air Jordan XX3 WhiteBlack Varsity Red.png', '2021-05-03 20:59:26', '2021-05-03 20:59:26'),
(60, 'Nike Air Jordan 1 Mid SE Turf Orange/Black-White', '$275', '10', 'men', 1, 'storage/images/Air Jordan 1 Mid SE Turf Orange Black White.jpg', '2021-05-03 20:59:26', '2021-05-03 20:59:26'),
(61, 'Nike Air Jordan 14 Retro SE \'Reverse Ferarri\'', 'Price Negotiable', '9.5', 'men', 1, 'storage/images/Air Jordan 14 Retro SE University GoldBlack.jpg', '2021-05-03 20:59:26', '2021-05-03 20:59:26'),
(62, 'Nike Air Max 90 SP (Infrared/Black)', 'Price Negotiable', '10.5', 'men', 1, 'storage/images/Air Max 90 SP InfraredBlack.jpg', '2021-05-03 20:59:26', '2021-05-03 20:59:26'),
(63, 'Nike Air Jordan 11 Low IE (Black/Fire Red/Cement Grey)', '$275', '9.5', 'men', 1, 'storage/images/Air Jordan 11 Low IE BlackFire RedCement Grey.jpg', '2021-05-03 20:59:26', '2021-05-03 20:59:26'),
(64, 'Reebok Kamikaze 2 (Black/White/Utigrn)', 'Price Negotiable', '9', 'men', 1, 'storage/images/reebok-kamikaze-ii-og-black-utility-green.jpg', '2021-05-03 20:59:26', '2021-05-03 20:59:26'),
(65, 'Adidas Superstar (FTWWHT/Blue/TMCORD)', 'Price Negotiable', '9.5', 'men', 1, 'storage/images/Adidas Superstar FTWWHTBlueTMCORD.jpg', '2021-05-03 20:59:26', '2021-05-03 20:59:26'),
(66, 'Converse Golf Gianno Ox (Bright Concord/Meerkat/Black)', 'Price Negotiable', '5', 'men', 1, 'storage/images/Converse Golf Gianno Ox Bright ConcordMeerkatBlack.jpg', '2021-05-03 20:59:26', '2021-05-03 20:59:26'),
(67, 'Air Jordan 1 Retro High Og \'Lucky Green\'', 'Contact For Price', '12.5', 'women', 1, 'storage/images/air-jordan-1-retro-high-lucky-green-w.jpg', '2021-05-04 13:12:06', '2021-05-04 13:12:06'),
(68, 'Air Jordan 1 Retro High OG \'Silver Toe\'', 'Contact For Price', '6.5', 'women', 1, 'storage/images/wmns-air-jordan-1-high-og-metallic-silver.jpeg', '2021-05-04 13:12:06', '2021-05-04 13:12:06'),
(69, 'Nike Air Force 1 07 Women\'s', 'Contact For Price', '11', 'women', 1, 'storage/images/nike-wmns-air-force-1-07.jpeg', '2021-05-04 13:12:06', '2021-05-04 13:12:06'),
(70, 'Converse Golf Gianno Ox (Bright Concord/Meerkat/Black)', 'Contact For Price', '6.5', 'women', 1, 'storage/images/Converse Golf Gianno Ox Bright ConcordMeerkatBlack.jpg', '2021-05-04 13:12:06', '2021-05-04 13:12:06'),
(71, 'FILA Disruptor II Animal', 'Contact For Price', '6.5', 'women', 1, 'storage/images/fila-disruptor-2-animal-womens-shoe.jfif', '2021-05-04 13:12:06', '2021-05-04 13:12:06'),
(72, 'Nike (Womens) (Air Jordan 11 Retro Low White/Black/Concord)', 'Contact For Price', '10', 'women', 1, 'storage/images/WAir Jordan 11 Retro Low WhiteBlackConcord.jpg', '2021-05-04 13:12:06', '2021-05-04 13:12:06'),
(73, 'Nike (Womens) Air Jordan 8 Retro Low (Dark Cinder/Champagne-Sail)', 'Contact For Price', '9', 'women', 1, 'storage/images/WMNS Air Jordan 8 Retro LowDark CinderChampagne-Sail.jpg', '2021-05-04 13:12:06', '2021-05-04 13:12:06'),
(74, 'Nike (Womens) Nike React Element 55 (Bicycle Yellow/Dark Sulfur)', 'Contact For Price', '12', 'women', 1, 'storage/images/W Nike React Element 55 Bicycle YellowDark Sulfur.jpg', '2021-05-04 13:12:06', '2021-05-04 13:12:06'),
(75, 'Nike (Womens) Air Jordan 11 (Neutral Olive/MYLC Stout-Sail)', 'Contact For Price', '12', 'women', 1, 'storage/images/WMNS Air Jordan 11 OliveMYLC StoutSail.jpg', '2021-05-04 13:18:16', '2021-05-04 13:18:16'),
(76, 'Nike (Womens) Vapor Street (OW/Black/White/Black)\r\n', 'Contact For Price', '11', 'women', 1, 'storage/images/WS Vapor Street OWBlackWhiteBlack.jpg', '2021-05-04 13:18:16', '2021-05-04 13:18:16'),
(77, 'Nike (Womens) Space Hippie 04 (Grey/Volt Black/DK Smoke Grey)', 'Contact For Price', '11', 'women', 1, 'storage/images/W Nike Space Hippie 04GreyVoltBlackDK Smoke Grey.jpg', '2021-05-04 13:18:16', '2021-05-04 13:18:16'),
(78, 'Nike (Womens) Air Jordan 8 (Retro White/Hyper Blue/Black)', 'Contact For Price', '9', 'women', 1, 'storage/images/WMNS Air Jordan 8 Retro WhiteHyper BlueBlack.jpg', '2021-05-04 13:18:16', '2021-05-04 13:18:16'),
(79, 'Supreme Kangol Bermuda Space Camp Cap', 'CONTACT FOR PRICE', 'LARGE', 'apparel', 1, 'storage/images/Supreme Kangol Bermuda Space Camp Cap.jpg', '2021-05-04 19:45:09', '2021-05-04 19:45:09'),
(80, 'Staple X Futura BLM T-shirt', 'CONTACT FOR PRICE', 'X-LARGE', 'apparel', 1, 'storage/images/Staple X Futura Blm T-shirt.jpg', '2021-05-04 19:45:09', '2021-05-04 19:45:09'),
(81, 'Mike Tyson x Chinatown Market Tee in Black', 'CONTACT FOR PRICE', 'X-LARGE', 'apparel', 1, 'storage/images/Mike Tyson x Chinatown Market Tee in Black.jpg', '2021-05-04 19:45:09', '2021-05-04 19:45:09'),
(82, 'Chinatown Market x Mike Tyson Tee in White', 'CONTACT FOR PRICE', 'X-LARGE', 'apparel', 1, 'storage/images/Chinatown Market x Mike Tyson Tee in White.jpg', '2021-05-04 19:45:09', '2021-05-04 19:45:09'),
(83, 'Chinatown Market Mike Tyson Graphics Black Tee Shirt', 'CONTACT FOR PRICE', 'X-LARGE', 'apparel', 1, 'storage/images/Chinatown Market Mike Tyson Graphics Black Tee Shirt.jpg', '2021-05-04 19:45:09', '2021-05-04 19:45:09'),
(84, 'Supreme Smurfs Tee Black', 'CONTACT FOR PRICE', 'LARGE', 'apparel', 1, 'storage/images/Supreme Smurfs Tee Black.jpg', '2021-05-04 19:45:09', '2021-05-04 19:45:09'),
(85, 'Thanks But Im Gucci Black Airbrush T-Shirt', 'CONTACT FOR PRICE', 'LARGE', 'apparel', 1, 'storage/images/Thanks But Im Gucci Black Airbrush T-Shirt.jpg', '2021-05-04 19:45:09', '2021-05-04 19:45:09'),
(86, 'Supreme Sun Tee Black', 'CONTACT FOR PRICE', 'X-LARGE', 'apparel', 1, 'storage/images/Supreme Sun Tee Black.jpg', '2021-05-04 19:45:09', '2021-05-04 19:45:09'),
(87, 'Supreme Lovers Tee Woodland Camo', 'CONTACT FOR PRICE', 'X-LARGE', 'apparel', 1, 'storage/images/Supreme Lovers Tee Woodland Camo.jpg', '2021-05-04 19:45:09', '2021-05-04 19:45:09'),
(88, 'Supreme Futura Logo Tee Bright Blue', 'CONTACT FOR PRICE', 'MEDIUM', 'apparel', 1, 'storage/images/Supreme Futura Logo Tee Bright Blue.jpg', '2021-05-04 19:45:09', '2021-05-04 19:45:09'),
(92, 'adidas Ozweego Orange', 'Contact For Price', '5Y', 'youth', 1, 'storage/images/adidas-ozweego-orange-gs.jpg', NULL, NULL),
(93, 'Nike Cortez Basic White Black (GS)', 'Contact For Price', '6.5Y', 'youth', 1, 'storage/images/Nike-Cortez-Basic-White-Black-GS.jpg', NULL, NULL),
(94, 'Air Jordan 6 Retro GS \'CARMINE\' 2021', 'Contact For Price', '7Y', 'youth', 1, 'storage/images/air-jordan-6-retro-carmine-2020.jpg', NULL, NULL),
(95, 'Nike Air Force 1 07\'', 'Contact For Price', '4C', 'youth', 1, 'storage/images/nike-wmns-air-force-1-07.jpeg', NULL, NULL),
(96, 'Nike Air Jordan 3 Retro OG DK (Purple Dust/Atomic Pink)', 'Contact For Price', '7.5Y', 'youth', 1, 'storage/images/Air Jordan 3 Retro OG DK Purple DustAtomic Pink.jpg', NULL, NULL),
(97, 'Nike Manoa LTR (GS) (Wheat/Wheat-Black)', 'Contact For Price', '5Y', 'youth', 1, 'storage/images/Nike Manoa LTR GSWheatWheatBlack.jpg', NULL, NULL),
(98, 'Nike Air Max 90 LTR(PS) (White/Particle Grey)', 'Contact For Price', '2.5Y', 'youth', 1, 'storage/images/Nike Air Max 90 LTR PS WhiteParticle Grey.jpg', NULL, NULL),
(99, 'Adidas Superstar (CBlack/FTWWHT/CBlack)', 'Contact For Price', '1Y', 'youth', 1, 'storage/images/Adidas Superstar CBlack FTWWHT CBlack.jpg', NULL, NULL),
(124, 'Nike Air Max Excee (TD) (Black/LT Arctic Pink-White)', 'Contact For Price', '8C', 'youth', 1, 'storage/images/Nike Air Max Excee TD Black LT Arctic PinkWhite.jpg', NULL, NULL),
(125, 'Nike Jordan 1 Mid SE (Black/Field Purple-White)', 'Contact For Price', '5C', 'youth', 1, 'storage/images/Jordan 1 Mid SE BlackField PurpleWhite.jpg', NULL, NULL),
(126, 'Nike Jordan 1 Mid GT (Phantom/Gloo-Purple Rise)', 'Contact For Price', '4C', 'youth', 1, 'storage/images/Jordan 1 Mid GT PhantomGlooPurple Rise.jpg', NULL, NULL),
(127, 'Nike Jordan 11 Crib Bootie (White/Metallic Silver)', 'Contact For Price', '4C', 'youth', 1, 'storage/images/Jordan 11 Crib Bootie WhiteMetallic Silver.jpg', NULL, NULL),
(128, 'Nike Jordan 1 Crib Bootie (White/DK Powder Blue)', 'Contact For Price', '2C', 'youth', 1, 'storage/images/Jordan 1 Crib BootieWhiteDK Powder Blue.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$u3DnxzRgyk3FQ9AsJBREW.uPV8FL3zShniywC1tlzQ/8gl6M/.uPK', '0gI0OTNS44GoGMTGazAns4YFev9L7e50klIOj7yHwuagOyjN24esfETtHl8w', '2021-04-30 17:22:48', '2021-04-30 17:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `variations`
--

CREATE TABLE `variations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variations`
--

INSERT INTO `variations` (`id`, `size`, `quantity`, `product_id`, `created_at`, `updated_at`) VALUES
(4, '9.5', 1, 18, NULL, NULL),
(5, '9.5', 1, 19, NULL, NULL),
(6, '11', 1, 20, NULL, NULL),
(7, '10.5', 1, 22, NULL, NULL),
(8, '11', 1, 25, NULL, NULL),
(9, '9', 1, 27, NULL, NULL),
(10, '10', 1, 46, NULL, NULL),
(11, '9.5', 1, 49, NULL, NULL),
(12, '10', 1, 49, NULL, NULL),
(13, '10', 1, 50, NULL, NULL),
(14, '10.5', 1, 52, NULL, NULL),
(15, '9.5', 1, 56, NULL, NULL),
(16, '11', 1, 59, NULL, NULL),
(17, '9.5', 1, 56, NULL, NULL),
(18, '7', 1, 71, NULL, NULL),
(19, '12', 1, 72, NULL, NULL),
(20, '11.5', 1, 77, NULL, NULL),
(37, '7Y', 1, 92, NULL, NULL),
(38, '6C', 1, 94, NULL, NULL),
(39, '13C', 1, 94, NULL, NULL),
(40, '7C', 1, 95, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variations`
--
ALTER TABLE `variations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variations_product_id_foreign` (`product_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `variations`
--
ALTER TABLE `variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `variations`
--
ALTER TABLE `variations`
  ADD CONSTRAINT `variations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
