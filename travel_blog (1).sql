-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 01, 2020 at 03:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `front_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `clicks` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_name`, `title`, `category`, `image`, `Description`, `front_category`, `meta_tag`, `meta_description`, `alt_description`, `created_at`, `updated_at`, `deleted_at`, `clicks`, `created_by`, `slug`) VALUES
(6, 'test test jkjmv f', 'Test', 7, '16042010731.jpg', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic nulla doloribus qui unde quaerat voluptas voluptatum, nobis nihil non velit at accusantium aliquid laudantium ex soluta natus, ab excepturi a.\r\n</p>', '1', 'sferbb rwbr', 'drsrgrb', 'sdrgr rgrb', '2020-10-31 21:54:33', '2020-10-31 21:54:33', NULL, NULL, 1, 'test-1604201073'),
(7, 'Jitendra', 'this is my first visit to dehradun      hiudfg       kdf vk', 4, '16042041881.jpg', '<p>This is test</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic nulla doloribus qui unde quaerat voluptas voluptatum, nobis nihil non velit at accusantium aliquid laudantium ex soluta natus, ab excepturi a.\r\n</p>', '2', 'twed fdgbr', 'dgfer', 'dfgb', '2020-10-31 22:46:28', '2020-11-01 00:00:23', NULL, NULL, 1, 'this-is-my-first-visit-to-dehradun-hiudfg-kdf-vk1604204188'),
(8, 'Jitendra', 'Title hhhh kkk', 3, '16042141101.jpg', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic nulla doloribus qui unde quaerat voluptas voluptatum, nobis nihil non velit at accusantium aliquid laudantium ex soluta natus, ab excepturi a.\r\n</p>', '2', 'dv', 'dfbbfg', 'dvdffd', '2020-11-01 01:31:50', '2020-11-01 04:58:43', NULL, NULL, 1, 'title-hhhh-kkk1604214110'),
(9, 'Jitendra', 'Title hhhh kkk', 5, '16042141321.jpg', '<p>xdxvfdgvb fbrb</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic nulla doloribus qui unde quaerat voluptas voluptatum, nobis nihil non velit at accusantium aliquid laudantium ex soluta natus, ab excepturi a.\r\n</p>', NULL, 'dgvd dbf', 'edgr fsbr', 'dvdfv', '2020-11-01 01:32:12', '2020-11-01 01:32:12', NULL, NULL, 1, 'title-hhhh-kkk1604214132');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Adventure', '1603621012adventure.jpg', '2020-10-25 04:46:52', '2020-10-25 04:46:52', NULL),
(4, 'Beaches', '1603621456beaches.jpg', '2020-10-25 04:54:16', '2020-10-25 04:54:16', NULL),
(5, 'Family', '1603621476family.jpg', '2020-10-25 04:54:36', '2020-10-25 04:54:36', NULL),
(6, 'Hill Station', '1603621498hill station.jpg', '2020-10-25 04:54:58', '2020-10-25 04:54:58', NULL),
(7, 'Historical', '1603621511historical.jpg', '2020-10-25 04:55:11', '2020-10-25 04:55:11', NULL),
(8, 'Honeymoon', '1603621531honeymoon.jpg', '2020-10-25 04:55:31', '2020-10-25 04:55:31', NULL),
(9, 'Pilgrimage', '1603621557pilgrimage.jpg', '2020-10-25 04:55:57', '2020-10-25 04:55:57', NULL),
(10, 'Roadtrips', '1603621589roadtrips.jpg', '2020-10-25 04:56:29', '2020-10-25 04:56:29', NULL),
(11, 'Solo', '1603621608solo.jpg', '2020-10-25 04:56:48', '2020-10-25 04:56:48', NULL),
(12, 'Tourist Hub', '1604232617tourist hub.jpg', '2020-11-01 06:40:17', '2020-11-01 06:40:17', NULL),
(13, 'Trekking', '1604232633trekking.jpg', '2020-11-01 06:40:33', '2020-11-01 06:40:33', NULL),
(14, 'Wildlife', '1604232644wildlife.jpg', '2020-11-01 06:40:44', '2020-11-01 06:40:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_approve` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_queries`
--

CREATE TABLE `blog_queries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `front_categories`
--

CREATE TABLE `front_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `front_slider`
--

CREATE TABLE `front_slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hyper_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `front_slider`
--

INSERT INTO `front_slider` (`id`, `image`, `hyper_link`, `title`, `category`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, '1604121541Screenshot from 2020-06-02 21-55-42.png', 'https://calendar.google.com/calendar/u/0/r/day/2020/11/13?tab=rc', 'Test', '7', '2020-10-30 23:49:01', '2020-10-30 23:49:53', '2020-10-30 23:49:53'),
(7, '1604121611Screenshot from 2020-06-02 21-56-34.png', 'https://calendar.google.com/calendar/u/0/r/day/2020/11/13?tab=rc', 'Test Titlecxvfdv vfgd', '5', '2020-10-30 23:50:11', '2020-10-31 00:02:56', '2020-10-31 00:02:56'),
(8, '16041224071.jpg', 'https://calendar.google.com/calendar/u/0/r/day/2020/11/13?tab=rc', 'Title hhhh kkk', '6', '2020-10-31 00:03:27', '2020-10-31 00:03:27', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_10_11_081316_slider', 1),
(4, '2020_10_11_082303_create_blogs_table', 1),
(5, '2020_10_12_164848_create_blog_comments_table', 2),
(6, '2020_10_12_170116_create_blog_categories_table', 3),
(7, '2020_10_12_170434_create_blog_queries_table', 3),
(8, '2020_10_12_170631_create_subscribes_table', 3),
(9, '2020_10_12_171833_create_front_categories_table', 4);

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
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user_type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jitendra', 'admin@trip.com', '1', NULL, '$2y$10$KFilRkKqDGhMIGLN8CLiI.8x/c8e1NRlmb4ztPPwlQBGUlsI2V6.O', 'SMF3ctCbYwZ5xOOvtG0eEh4YP15xMDmjqYVBwc58VH1Dchyzr3x2FKEwkViy', '2020-10-24 06:07:03', '2020-10-24 06:07:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_queries`
--
ALTER TABLE `blog_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_categories`
--
ALTER TABLE `front_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_slider`
--
ALTER TABLE `front_slider`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_queries`
--
ALTER TABLE `blog_queries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_categories`
--
ALTER TABLE `front_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_slider`
--
ALTER TABLE `front_slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
