-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 04, 2021 at 11:59 AM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baacusa347_wealth_institute`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

DROP TABLE IF EXISTS `about_us`;
CREATE TABLE IF NOT EXISTS `about_us` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `embeded_link` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `name`, `profile_pic`, `profile_description`, `designation`, `phone`, `email`, `address`, `embeded_link`, `created_at`, `updated_at`) VALUES
(1, 'Moinul Haque Chowdhury Helal', 'upload/about-us-image/img_1611217611_60093acb4c31c.png', '<p>Bangladeshi American Association of Connecticut (BAAC) is a non-profit, voluntary, nonpolitical, and secular forum organized exclusively for cultural, educational and charitable purposes. It qualifies under Section 501 (c) (3) of the internal revenue code as a non-profit organization. Bangladeshi American Association of Connecticut (BAAC) is a non-profit, voluntary, nonpolitical, and secular forum organized exclusively for cultural, educational and charitable purposes.</p>\r\n\r\n<p>Bangladeshi American Association of Connecticut (BAAC) is a non-profit, voluntary, nonpolitical, and secular forum organized exclusively for cultural, educational and charitable purposes. It qualifies under Section 501 (c) (3) of the internal revenue code as a non-profit organization. Bangladeshi American Association of Connecticut (BAAC) is a non-profit, voluntary, nonpolitical, and secular forum organized exclusively for cultural, educational and charitable purposes. It qualifies under Section 501 (c) (3) of the internal revenue code as a non-profit organization.</p>', 'President', '860-938-6718', 'c.moinul@yahoo.com', '<p>41 Macintosh Lane,</p>\r\n\r\n<p>Glastonbury, CT 06033</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2978.323366440364!2d-72.5720262849369!3d41.713540579235584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e651ab6e7ffe0b%3A0xce4f9243509a8210!2s41%20MacIntosh%20Ln%2C%20Glastonbury%2C%20CT%2006033%2C%20USA!5e0!3m2!1sen!2sbd!4v1611150380057!5m2!1sen!2sbd\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', '2020-12-24 04:06:21', '2021-01-21 02:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `all_images`
--

DROP TABLE IF EXISTS `all_images`;
CREATE TABLE IF NOT EXISTS `all_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `all_images`
--

INSERT INTO `all_images` (`id`, `image_url`, `created_at`, `updated_at`) VALUES
(13, 'upload/all-image/img_1608967515_5fe6e55b0b694.png', '2020-12-26 01:25:15', '2020-12-26 01:25:15'),
(16, 'upload/all-image/img_1608967515_5fe6e55b0d99b.gif', '2020-12-26 01:25:15', '2020-12-26 01:25:15'),
(17, 'upload/all-image/img_1608967515_5fe6e55b0e444.jpg', '2020-12-26 01:25:15', '2020-12-26 01:25:15'),
(18, 'upload/all-image/img_1608967515_5fe6e55b0eb2a.jpg', '2020-12-26 01:25:15', '2020-12-26 01:25:15'),
(19, 'upload/all-image/img_1611152362_60083bea0dca9.jpg', '2021-01-20 19:19:22', '2021-01-20 19:19:22'),
(20, 'upload/all-image/img_1611152362_60083bea0f438.jpg', '2021-01-20 19:19:22', '2021-01-20 19:19:22'),
(21, 'upload/all-image/img_1611152362_60083bea10745.jpg', '2021-01-20 19:19:22', '2021-01-20 19:19:22'),
(22, 'upload/all-image/img_1611152362_60083bea1172a.jpg', '2021-01-20 19:19:22', '2021-01-20 19:19:22'),
(23, 'upload/all-image/img_1611152362_60083bea12e1d.jpg', '2021-01-20 19:19:22', '2021-01-20 19:19:22'),
(24, 'upload/all-image/img_1611152362_60083bea1462b.jpg', '2021-01-20 19:19:22', '2021-01-20 19:19:22'),
(25, 'upload/all-image/img_1611152867_60083de39ca9f.jpg', '2021-01-20 19:27:47', '2021-01-20 19:27:47'),
(26, 'upload/all-image/img_1611152867_60083de39e1df.jpg', '2021-01-20 19:27:47', '2021-01-20 19:27:47'),
(27, 'upload/all-image/img_1611152867_60083de39fe5d.jpg', '2021-01-20 19:27:47', '2021-01-20 19:27:47'),
(28, 'upload/all-image/img_1611152867_60083de3a18f8.jpg', '2021-01-20 19:27:47', '2021-01-20 19:27:47'),
(29, 'upload/all-image/img_1611152867_60083de3a298e.jpg', '2021-01-20 19:27:47', '2021-01-20 19:27:47'),
(30, 'upload/all-image/img_1611153123_60083ee3462c5.jpg', '2021-01-20 19:32:03', '2021-01-20 19:32:03'),
(31, 'upload/all-image/img_1611153123_60083ee34857a.jpg', '2021-01-20 19:32:03', '2021-01-20 19:32:03'),
(32, 'upload/all-image/img_1611153123_60083ee3499a6.jpg', '2021-01-20 19:32:03', '2021-01-20 19:32:03'),
(33, 'upload/all-image/img_1611153123_60083ee34b0a8.jpg', '2021-01-20 19:32:03', '2021-01-20 19:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `at_glances`
--

DROP TABLE IF EXISTS `at_glances`;
CREATE TABLE IF NOT EXISTS `at_glances` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_category_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=Unpublished, 1=Published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `at_glances`
--

INSERT INTO `at_glances` (`id`, `post_category_id`, `title`, `slug`, `logo`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(7, NULL, 'Who We Are?', 'who-we-are', 'upload/at-glance/99378.png', '<p>Bangladeshi American Association of Connecticut (BAAC) is a non-profit, voluntary, nonpolitical, and secular forum organized exclusively for cultural, educational and charitable purposes. It qualifies under Section 501 (c) (3) of the internal revenue code as a non-profit organization.</p>\r\n\r\n<p>Bangladeshi American Association of Connecticut (BAAC) is a non-profit, voluntary, nonpolitical, and secular forum organized exclusively for cultural, educational and charitable purposes. It qualifies under Section 501 (c) (3) of the internal revenue code as a non-profit organization.</p>\r\n\r\n<p>Bangladeshi American Association of Connecticut (BAAC) is a non-profit, voluntary, nonpolitical, and secular forum organized exclusively for cultural, educational and charitable purposes. It qualifies under Section 501 (c) (3) of the internal revenue code as a non-profit organization. Bangladeshi American Association of Connecticut (BAAC) is a non-profit, voluntary, nonpolitical, and secular forum organized exclusively for cultural, educational and charitable purposes. It qualifies under Section 501 (c) (3) of the internal revenue code as a non-profit organization.</p>', 1, '2021-01-18 05:36:26', '2021-01-20 18:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

DROP TABLE IF EXISTS `contributions`;
CREATE TABLE IF NOT EXISTS `contributions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subtitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donate_one` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donate_tow` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=Unpublished, 1=Published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`id`, `subtitle`, `title`, `slug`, `content`, `url`, `donate_one`, `donate_tow`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Overview', 'Our Contributions', 'our-contributions', '<p>We are harly working to contibute to sustainable development such as welfare of society for the Bangladeshi immigrants Join our team and be a contributor to public welfare. Help us to reach our next Goal acquiring a graveyard for muslims</p>', NULL, 'upload/contributions/donate-one/87584.png', 'upload/contributions/donate-two/47257.jpg', 1, '2021-01-19 01:09:58', '2021-01-19 01:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genera_members`
--

DROP TABLE IF EXISTS `genera_members`;
CREATE TABLE IF NOT EXISTS `genera_members` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `memberId` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateOfYear` int NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_member` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=Unpublished, 1=Published',
  `general_member` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=Unpublished, 1=Published',
  `associate_member` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=Unpublished, 1=Published',
  `life_member` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=Unpublished, 1=Published',
  `departed_member` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=Unpublished, 1=Published',
  `executive_committee` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=Unpublished, 1=Published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `descriptoin` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `social` json DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `genera_members_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genera_members`
--

INSERT INTO `genera_members` (`id`, `memberId`, `name`, `dateOfYear`, `slug`, `image`, `email`, `phone`, `designation`, `organization`, `feature_member`, `general_member`, `associate_member`, `life_member`, `departed_member`, `executive_committee`, `status`, `created_at`, `updated_at`, `descriptoin`, `social`) VALUES
(10, 476678, 'Hasina Jafar', 1987, 'hasina-jafar', 'upload/members/597245.jpg', 'info5@gmail.com', NULL, 'Women\'s Affairs Secretary', NULL, 1, 1, 1, 1, 1, 1, 1, '2021-01-20 20:08:29', '2021-01-25 06:06:52', '<p>Bangladeshi American Association of Connecticut (BAK) standing beside of Bangladeshi journalists and media professional for more than 10 years, providing advocacy, information and service to the New York.<br />\r\nApplying for membership is straightforward. Select a membership category that best fits your situation. Submit a membership application along with appropriate fees (Credit/debit/PayPal/Check/Money Order etc.). Applications received without the fees payment will not be considered.<br />\r\nApplications are reviewed by a committee of the BAACUSA. If for any reason an application is not approved, all fees paid are immediately refunded.</p>', '[null, null, null, null]'),
(5, 482356, 'Humayun Chowdhury', 1987, 'humayun-chowdhury', 'upload/members/146974.jpg', 'info@6gmail.com', NULL, 'Organizing Secretary', NULL, 1, 1, 1, 1, 1, 1, 1, '2021-01-20 20:00:07', '2021-01-25 06:07:09', '<p>Bangladeshi American Association of Connecticut (BAK) standing beside of Bangladeshi journalists and media professional for more than 10 years, providing advocacy, information and service to the New York.<br />\r\nApplying for membership is straightforward. Select a membership category that best fits your situation. Submit a membership application along with appropriate fees (Credit/debit/PayPal/Check/Money Order etc.). Applications received without the fees payment will not be considered.<br />\r\nApplications are reviewed by a committee of the BAACUSA. If for any reason an application is not approved, all fees paid are immediately refunded.</p>', '[null, null, null, null]'),
(6, 465445, 'Tarek Khan', 1985, 'tarek-khan', 'upload/members/467085.jpg', 'info1@gmail.com', NULL, 'Tresurer', NULL, 1, 1, 1, 1, 1, 1, 1, '2021-01-20 20:02:08', '2021-01-25 06:04:45', '<p>Bangladeshi American Association of Connecticut (BAK) standing beside of Bangladeshi journalists and media professional for more than 10 years, providing advocacy, information and service to the New York.<br />\r\nApplying for membership is straightforward. Select a membership category that best fits your situation. Submit a membership application along with appropriate fees (Credit/debit/PayPal/Check/Money Order etc.). Applications received without the fees payment will not be considered.<br />\r\nApplications are reviewed by a committee of the BAACUSA. If for any reason an application is not approved, all fees paid are immediately refunded.</p>', '[null, null, null, null]'),
(7, 466544, 'Sayed Chowdhury', 1982, 'sayed-chowdhury', 'upload/members/190753.jpg', 'info4@gmail.com', NULL, 'Asst. General Secretary', NULL, 1, 1, 1, 1, 1, 1, 1, '2021-01-20 20:03:30', '2021-01-25 06:06:36', '<p>Bangladeshi American Association of Connecticut (BAK) standing beside of Bangladeshi journalists and media professional for more than 10 years, providing advocacy, information and service to the New York.<br />\r\nApplying for membership is straightforward. Select a membership category that best fits your situation. Submit a membership application along with appropriate fees (Credit/debit/PayPal/Check/Money Order etc.). Applications received without the fees payment will not be considered.<br />\r\nApplications are reviewed by a committee of the BAACUSA. If for any reason an application is not approved, all fees paid are immediately refunded.</p>', '[null, null, null, null]'),
(8, 253445, 'Moinul Haque Chowdhury Helal', 1972, 'moinul-haque-chowdhury-helal', 'upload/members/589848.jpg', 'info@gmail.com', '0171987657', 'President', NULL, 1, 1, 1, 1, 1, 1, 1, '2021-01-20 20:05:05', '2021-01-25 06:09:13', '<p>Bangladeshi American Association of Connecticut (BAK) standing beside of Bangladeshi journalists and media professional for more than 10 years, providing advocacy, information and service to the New York.<br />\r\nApplying for membership is straightforward. Select a membership category that best fits your situation. Submit a membership application along with appropriate fees (Credit/debit/PayPal/Check/Money Order etc.). Applications received without the fees payment will not be considered.<br />\r\nApplications are reviewed by a committee of the BAACUSA. If for any reason an application is not approved, all fees paid are immediately refunded.</p>', '[null, \"http://www.twitter.com\", null, null]'),
(9, 398876, 'Syed Azizur Rahman', 1980, 'syed-azizur-rahman', 'upload/members/912041.jpg', 'info3@gmail.com', NULL, 'General Secretary', NULL, 1, 1, 1, 1, 1, 1, 1, '2021-01-20 20:06:21', '2021-01-25 06:06:12', '<p>Bangladeshi American Association of Connecticut (BAK) standing beside of Bangladeshi journalists and media professional for more than 10 years, providing advocacy, information and service to the New York.<br />\r\nApplying for membership is straightforward. Select a membership category that best fits your situation. Submit a membership application along with appropriate fees (Credit/debit/PayPal/Check/Money Order etc.). Applications received without the fees payment will not be considered.<br />\r\nApplications are reviewed by a committee of the BAACUSA. If for any reason an application is not approved, all fees paid are immediately refunded.</p>', '[null, null, null, null]');

-- --------------------------------------------------------

--
-- Table structure for table `hero_sliders`
--

DROP TABLE IF EXISTS `hero_sliders`;
CREATE TABLE IF NOT EXISTS `hero_sliders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=Unpublished, 1=Published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hero_sliders`
--

INSERT INTO `hero_sliders` (`id`, `image`, `title`, `status`, `created_at`, `updated_at`) VALUES
(6, 'upload/slider/56251.jpg', 'Welcome to Bangladeshi American Association Of Connecticut Inc. (BAAC)', 1, '2021-01-20 18:32:14', '2021-01-20 18:32:14'),
(7, 'upload/slider/37100.jpg', 'A Largest Bangladeshi American Association', 1, '2021-01-20 18:34:34', '2021-01-20 18:34:34'),
(8, 'upload/slider/45774.jpg', 'Let\'s Work for the People of Bangladesh', 1, '2021-01-20 18:35:47', '2021-01-20 18:35:47'),
(9, 'upload/slider/79389.jpg', 'Welcome to Bangladeshi American Association of Connecticut Inc. (BAAC)', 1, '2021-01-20 18:36:30', '2021-01-20 18:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `home_intros`
--

DROP TABLE IF EXISTS `home_intros`;
CREATE TABLE IF NOT EXISTS `home_intros` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `instra_link` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `fb_link` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `twitter_link` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `youtube_link` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `google_link` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_intros`
--

INSERT INTO `home_intros` (`id`, `instra_link`, `fb_link`, `twitter_link`, `youtube_link`, `google_link`, `created_at`, `updated_at`) VALUES
(1, 'https://www.instagram.com/', 'https://www.facebook.com/giash.ahmed', 'https://www.twitter.com/', 'https://www.youtube.com/', NULL, '2020-12-26 00:35:04', '2020-12-27 02:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_21_093542_create_post_categories_table', 2),
(5, '2020_12_21_093653_create_posts_table', 2),
(6, '2020_12_21_115705_create_post_images_table', 3),
(7, '2020_12_22_093202_create_all_images_table', 4),
(8, '2020_12_24_094646_create_about_us_table', 5),
(9, '2020_12_26_054940_create_home_intros_table', 6),
(10, '2020_12_26_071504_create_photo_galleries_table', 7),
(11, '2020_12_26_071550_create_video_galleries_table', 7),
(12, '2020_12_26_092948_create_print_and_news_table', 8),
(14, '2021_01_18_082040_create_at_glances_table', 10),
(15, '2021_01_18_082419_create_upcomming_events_table', 10),
(16, '2021_01_18_084700_create_contributions_table', 10),
(17, '2021_01_19_081448_create_hero_sliders_table', 11),
(23, '2021_01_19_121712_create_genera_members_table', 12),
(28, '2020_12_28_061139_create_visitor_counts_table', 16),
(29, '2021_01_23_070952_create_publication_constitutions_table', 17),
(30, '2021_01_24_063503_create_states_table', 18),
(31, '2021_01_25_100835_update_general_members', 19),
(34, '2021_01_26_050836_create_missions_table', 20),
(35, '2021_01_26_051144_create_reunions_table', 20),
(37, '2021_01_20_092533_create_renew_member_ships_table', 21),
(38, '2021_03_28_054238_create_pricing_lists_table', 22),
(39, '2021_03_28_061525_create_subscriber_images_table', 23),
(41, '2021_03_28_063127_create_subscribe_users_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `missions`
--

DROP TABLE IF EXISTS `missions`;
CREATE TABLE IF NOT EXISTS `missions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=Unpublished, 1=Published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `missions`
--

INSERT INTO `missions` (`id`, `icon`, `title`, `slug`, `content`, `url`, `status`, `created_at`, `updated_at`) VALUES
(1, '<i class=\"fas fa-edit\"></i>', 'Donate', 'donate', '<p>Bangladeshi American Association of Connecticut (BAK) is an organization of Bangladeshi journalists living in New York and other cities. This Bangladeshi ..</p>', NULL, 1, '2021-01-26 00:00:26', '2021-01-26 00:14:30'),
(2, '<i class=\"fas fa-users\"></i>', 'Membership', 'membership', '<p>Bangladeshi American Association of Connecticut (BAK) standing beside of Bangladeshi journalists and media professional for more than 10 years, providing advocacy ..</p>', NULL, 1, '2021-01-26 00:27:44', '2021-01-26 00:27:44'),
(3, '<i class=\"fas fa-edit\"></i>', 'Mission', 'mission', '<p>Bangladeshi American Association of Connecticut (BAK) works to protect the rights of all reporters while providing networking opportunities for journalists and &hellip;</p>', NULL, 1, '2021-01-26 00:28:26', '2021-01-26 00:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_galleries`
--

DROP TABLE IF EXISTS `photo_galleries`;
CREATE TABLE IF NOT EXISTS `photo_galleries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo_galleries`
--

INSERT INTO `photo_galleries` (`id`, `title`, `image_url`, `created_at`, `updated_at`) VALUES
(13, 'Food Donation', 'upload/photo-gallery/img_1611153692_6008411cacb89.jpg', '2021-01-20 19:41:32', '2021-01-20 19:41:32'),
(14, 'Food Donation', 'upload/photo-gallery/img_1611153692_6008411caef4b.jpg', '2021-01-20 19:41:32', '2021-01-20 19:41:32'),
(15, 'Food Donation', 'upload/photo-gallery/img_1611153692_6008411cb0948.jpg', '2021-01-20 19:41:32', '2021-01-20 19:41:32'),
(16, 'Food Donation', 'upload/photo-gallery/img_1611153692_6008411cb2252.jpg', '2021-01-20 19:41:32', '2021-01-20 19:41:32'),
(17, 'Food Donation', 'upload/photo-gallery/img_1611153692_6008411cb329e.jpg', '2021-01-20 19:41:32', '2021-01-20 19:41:32'),
(18, 'Food Donation', 'upload/photo-gallery/img_1611153692_6008411cb4279.jpg', '2021-01-20 19:41:32', '2021-01-20 19:41:32'),
(19, 'Media', 'upload/photo-gallery/img_1611153775_6008416fd50f3.jpg', '2021-01-20 19:42:55', '2021-01-20 19:42:55'),
(20, 'Media', 'upload/photo-gallery/img_1611153775_6008416feff67.jpg', '2021-01-20 19:42:55', '2021-01-20 19:42:55'),
(21, 'Media', 'upload/photo-gallery/img_1611153775_6008416ff11f3.jpg', '2021-01-20 19:42:55', '2021-01-20 19:42:55'),
(22, 'Media', 'upload/photo-gallery/img_1611153775_6008416ff2cc4.jpg', '2021-01-20 19:42:55', '2021-01-20 19:42:55'),
(23, 'Media', 'upload/photo-gallery/img_1611153776_600841700849f.jpg', '2021-01-20 19:42:56', '2021-01-20 19:42:56'),
(24, 'Media', 'upload/photo-gallery/img_1611153776_60084170095b2.jpg', '2021-01-20 19:42:56', '2021-01-20 19:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_category_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=Unpublished, 1=Published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_category_id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(8, '[\"8\"]', 'Trump revokes ethics ban on aides as he exits Washington', 'kronakale-diesi-theke-rajsw-bereche-32-koti-taka-5fe2e8f0ec8cf', '<p>Outgoing U.S. President Donald Trump, who won the White House in part by promising to &quot;drain the swamp&quot; of Washington political manoeuvring, on Wednesday revoked his executive order barring aides and other administration officials from lobbying.</p>\r\n\r\n<p>The restrictions, imposed soon after he took office in 2017, had targeted the kind of insider culture the Republican Trump had campaigned against and blocked the kind of lucrative gigs that he had said makes politicians beholden to business interests instead of everyday Americans.</p>\r\n\r\n<p>In an executive order released overnight, hours before he was due to leave office, Trump withdrew the ethics order that had said his appointees would not lobby their own agency for five years after leaving, and would not lobby any government appointee for two years.</p>\r\n\r\n<p>It had also required them to agree to a lifetime ban on working on behalf of foreign governments or foreign political parties.</p>', 1, '2020-12-21 22:54:45', '2021-01-20 19:02:38'),
(13, '[\"8\"]', 'Dollar at 1-month highs as markets eye Biden\'s FX policy; euro slips', 'learn-more-about-side-effect-free-treatment-5fe2e91091f6e', '<p>The US dollar strengthened for a third consecutive day on Monday to a four-week high as an undercurrent of risk aversion swept through currency markets, knocking the Australian dollar and the British pound lower.</p>\r\n\r\n<p>With US markets shut for a holiday on Monday and Joe Biden set to be inaugurated as the next US president on Wednesday, major currencies remained within well-worn ranges, watching carefully the new administration&#39;s stance on the greenback.</p>\r\n\r\n<p>While outgoing President Donald Trump has publicly railed against the dollar&#39;s strength for years, Janet Yellen, Biden&#39;s pick to take over the US Treasury, is expected to make clear that the United States does not seek a weaker dollar, according to the Wall Street Journal.</p>\r\n\r\n<p>Moreover, Biden&#39;s plan for a $1.9 trillion stimulus package has also fuelled a broad-based rise in US Treasury yields and reversed a late 2020 fall in the value of the greenback.</p>', 1, '2020-12-21 22:54:45', '2021-01-20 19:05:22'),
(14, '[\"8\"]', 'Now social media grows a conscience?', 'lorem-ipsum-5fe2f67de6ad5', '<p>Propelled by the nation&rsquo;s stunned reaction to last week&rsquo;s violent siege of the Capitol, social media companies have sought to separate themselves from President Donald Trump and lawmakers who were complicit in the riots.</p>\r\n\r\n<p>Twitter banned Trump, while Facebook indefinitely suspended him and YouTube prevented new uploads for a week. Other tech companies stopped doing business with Parler, where would-be insurgents had found a comfortable home.</p>\r\n\r\n<p>The actions, a long time coming, are sure to limit the appearance of some of the most inflammatory posts and tweets, particularly leading up to the presidential inauguration. But until social media companies are willing to fundamentally change their sites by making them far less attractive to people seeking to post divisive content, deeply troubling posts will continue to spread quickly and broadly.</p>\r\n\r\n<p>Facebook, Twitter and YouTube are trying to claim the mantle of champions of free speech and impartial loudspeakers for whoever has a deeply held conviction. The truth is that they are businesses, driven by quarterly results and Wall Street&rsquo;s insatiable desire for ever greater sales and profits.</p>\r\n\r\n<p>That&rsquo;s the central tension at the root of the troubles with social media and civil society: The most divisive, misinformed content tends to keep users on the sites longer &mdash; which is essential for harvesting data that leads to highly targeted advertising.</p>', 1, '2020-12-21 22:54:45', '2021-01-20 19:08:15'),
(15, '[\"8\"]', 'হোয়াইট হাউস ছাড়লেন ট্রাম্প', 'learn-more-about-side-effect-free-treatment-5fe2e92abc494', '<p>প্রেসিডেন্ট ডোনাল্ড ট্রাম্প হোয়াইট হাউস থেকে বিদায় নিয়েছেন। এখন তিনি জয়েন্ট বেস অ্যান্ড্রুজে সম্ভাব্য একটি সংক্ষিপ্ত ফেয়ারওয়েল অনুষ্ঠানে অংশ নেবেন। বুধবার (২০ জানুয়ারি) আন্তর্জাতিক সংবাদমাধ্যম সিএনএন এ তথ্য জানায়। খবরে বলা হয়, প্রেসিডেন্ট ট্রাম্প হোয়াইট হাউস থেকে বিদায় নিয়েছেন। তিনি জয়েন্ট বেস অ্যান্ড্রুজে একটি সম্ভাব্য ফেয়ারওয়েল অনুষ্ঠানে অংশ নেবেন।</p>\r\n\r\n<p>জয়েন্ট বেস অ্যান্ড্রুজে সামরিক অভিবাদন নিয়ে ট্রাম্প ও মেলানিয়া চলে যাবেন ফ্লোরিডার মার এ লাগোতে। ক্ষমতা ছাড়ার পর ট্রাম্প আপাতত তার ঘনিষ্ঠ কিছু সহযোগীকে নিয়ে ফ্লোরিডাতেই থাকবেন। ভবিষ্যতে তিনি কী করবেন, সে সম্পর্কে কোনো তথ্য এখন পর্যন্ত জানা যায়নি।</p>', 1, '2020-12-21 22:54:45', '2021-01-20 19:10:06'),
(16, '[\"8\"]', 'Benefits Of Green Tea', 'lorem-ipsum-5fe2e9445518f', '<p>Green tea comes from the leaves of the camellia sinensis plant, which is a small shrub that is native to East Asia. While the drink has been enjoyed for centuries, even today, scientists continue to uncover new and exciting benefits of the beverage. Enjoying one or more cups of green tea per day could help you unlock some of these benefits.</p>\r\n\r\n<p><strong>Green Tea Is a Natural Stimulant</strong><br />\r\nGreen tea is a natural source of caffeine, making it a great way to perk yourself up when you&rsquo;re feeling tired.&nbsp;</p>\r\n\r\n<p><strong>Green Tea Might Help Fight Off Cancer</strong><br />\r\nYour cells naturally accumulate oxidative damage during regular cell metabolism. A class of molecules called antioxidants can prevent or even reverse that damage.&nbsp;</p>\r\n\r\n<p><strong>Minimal Processing Leaves Nutrients Intact</strong><br />\r\nUnlike soda, another common source of caffeine, tea is relatively unprocessed. After picking the leaves, they are allowed to soften before being rolled to wring out their juices (Tea Class, n.d.). After heat is applied to the leaves, they are dried and ready to use.&nbsp;</p>', 1, '2020-12-21 22:54:45', '2021-01-20 19:11:54'),
(18, '[\"8\"]', 'Int\'l norms on management and transportation of nuclear waste', 'intl-norms-on-management-and-transportation-of-nuclear-waste-60083a815fb60', '<p><strong>With the construction of Rooppur Nuclear Power Plant (RNPP), Bangladesh has entered the age of nuclear energy.&nbsp;The RNPP being constructed with Russia&rsquo;s assistance marks a landmark in ensuring energy security for the rapidly industrializing nation.&nbsp;</strong></p>\r\n\r\n<p>However, since RNPP is the country&rsquo;s first foray into technically complex nuclear energy sector, there have been concerns whether the country has the legal and policy frameworks, technical capabilities and skilled manpower in place to successfully operate a nuclear power plant. One of the recurring concerns relates to the management of nuclear waste.&nbsp;</p>\r\n\r\n<p>Radioactive waste or nuclear waste means radioactive material in gaseous, liquid or solid form for which no further use is foreseen by the end and which is controlled as radioactive waste. Spent fuel is also radioactive material that has been irradiated and permanently removed from a reactor core. Radioactive wastes are mainly three types, low-level (LLW), and intermediate-level (ILW) and high-level wastes (HLW). These wastes are carefully stored or disposed so as there is no chance of radioactive exposure to people and these decays with time. Disposal of low-level wastes are comparatively straight forward and typically sent to land-based disposal immediately following its packaging for a long-term management. Some parts of the world i.e. Czech Republic, Finland, France, Japan, Netherlands, Spain, Sweden, UK, etc. countries are availing near-surface disposal at ground level at depths of tens of meters.&nbsp;</p>', 1, '2021-01-20 19:13:21', '2021-01-20 19:13:21'),
(19, '[\"8\"]', 'কোভিড-১৯ এ ক্ষতিগ্রস্ত পরিবারের মাঝে বাক এর খাদ্য সামগ্রী বিতরন', 'kovid-19-e-kshtigrst-pribarer-majhe-bak-er-khadz-samgree-bitrn-60083c947d971', '<p>বাংলাদেশী আমেরিকান এসোসিয়েশন অব কানেক্টিকাট (বাক) এর উদ্যোগে কানেক্টিকাট এর ব্রীজপোর্ট ও স্টাম্পফোর্ডের দুই সিটিতে বাংলাদেশী কমিউনিটির মধ্যে কোভিড-১৯ এর জন্য প্রভাব পড়েছে এমন পরিবারের মাঝে খাদ্য সামগ্রী বিতরন করা হয়।</p>\r\n\r\n<p><img alt=\"\" src=\"https://baacusa.org/upload/all-image/img_1611152362_60083bea1172a.jpg\" style=\"height:452px; width:960px\" /></p>\r\n\r\n<p>এ সময় উপস্থিতি ছিলেন বাক এর উপদেষ্টা আব্দুল মুমিত মামুন, উপদেষ্টা নাজিম উদ্দিন, সভাপতি ময়নুল হক চৌধুরী হেলাল, বিশিষ্ট রাজনীতিবিদ ও কমিউনিটি নেতা জেহাদুল হক জিহাদ, বাকের সাধারণ সম্পাদক সাঈদ আজিজ, বাকের সহসভাপতি নুরুল আলম, সাংগঠনিক সম্পাদক হূমায়ুন আহমেদ চৌধুরী, ছাত্র ও যুব বিষয়ক সম্পাদক আব্দুল জলিল জায়গীরদার (খোকন) এবং ফরিদ চৌধুরী তারেক, আরিফুর রহমান আরিফ, জাবেদ সফি, বাছন আলী, জাহাঙ্গীর হেসেন এবিএস সিদ্দিক প্রমুখ।</p>\r\n\r\n<p><img alt=\"\" src=\"https://baacusa.org/upload/all-image/img_1611152362_60083bea0dca9.jpg\" style=\"height:480px; width:640px\" /></p>', 1, '2021-01-20 19:22:12', '2021-01-20 19:24:53'),
(20, '[\"8\"]', 'কানেকটিকাটে ‘’বাকের’’ বিজয় দিবস উদযাপন', 'kanektikate-baker-bijy-dibs-udzapn-60083e54500a7', '<p>বাংলাদেশী আমেরিকান এসোসিয়েশন অব কানেকটিকাট &ldquo;বাক&rdquo;এর আয়োজনে গত ১৯শে ডিসেম্বর (২০২০)সন্ধ্যা ৬ঘটিকায় &ldquo;বিজয় দিবস &ldquo; উপলক্ষে বিজয় দিবসের ভার্চুয়াল সাংস্কৃতিক অনুষ্টান ও আলোচনা সভা অনুষ্টিত হয় । বাকের সভাপতি ময়নুল চৌধুরী হেলালের সভাপতিত্বে এবং সাধারন সম্পাদক সৈয়দ আজিজুর রহমানের স্বাগত বক্তব্যের মাধ্যমে এবং হুমায়ুন চৌধুরী ও শারমীন ইভার যৌথ পরিচালনায় অনুষ্টিত সভা বাংলাদেশী ও আমেরিকান জাতীয় সংগীত পরিবেশনের মাধ্যমে শুরু হয় । এরপর মহান মুক্তিযুদ্ধের সকল শহীদ ও মহামারী করোনায় মৃত্যুবরনকারী সকল শহীদদের আত্নার মাগফেরাত কামনা করে ১ মিনিট নিরবতা পালন করা হয় । এরপর বিজয় দিবসের সংগীত পরিবেশন করেন রুপা আলমগীর ও কানন হাসান ।</p>\r\n\r\n<p><img alt=\"\" src=\"https://baacusa.org/upload/all-image/img_1611152867_60083de3a298e.jpg\" style=\"height:481px; width:770px\" /></p>\r\n\r\n<p>অনুষ্টানে ভিডিও বার্তার মাধ্যমে শুভেচ্ছা বক্তব্য প্রদান করেন কনসাল জেনারেল মিসেস সাদিয়া ফয়জুন্নেছা । অনুষ্টানে অতিথি হিসাবে বক্তব্য রাখেন ডেকসেল বিশ্ববিদ্যালয়ের অ্যামিরেটস অধ্যাপক এবং বাংলাদেশ মেডিকেল এসোসিয়েশন অব ইউএসএ&#39;র সাবেক সভাপতি বীর মুক্তিযোদ্ধা ডা: জিয়াউদদিন আহমদ এবং বাকের সাবেক সভাপতি ও সাবেক ইন্টারিম কমিটির চেয়ারম্যন, বিশিষ্ট বিজ্ঞানী, মুক্তিযোদ্ধা ড: এনায়েত তালুকদার এবং বাকের অন্যতম প্রতিষ্ঠাতা ও উপদেষ্টা ডা: সাইদুর রহমান । বক্তব্য রাখেন সাবেক সভাপতি ড: তামিম আহমদ, বিসিএসি&#39;র সভাপতি সমীর দত্ত, ষ্টেট আওয়ামীলীগ সভাপতি জিহাদুল হক, ষ্টেট বিএনপির অহবায়ক তৌফিকুল আম্বিয়া টিপু ও মুক্তিযোদ্ধা ডেভিড স্বপন রোজারিও। কবিতা আবৃত্তি করেন সাবেক সভাপতি মশিউর রহমান কামাল, উপদেষ্টা ডা: শওকত খান ও বাকের কালচারাল সম্পাদক মালিন মিথিলা ।</p>\r\n\r\n<p><img alt=\"\" src=\"https://baacusa.org/upload/all-image/img_1611152867_60083de3a18f8.jpg\" style=\"height:650px; width:810px\" /></p>\r\n\r\n<p>অনুষ্ঠানের ২য় পর্বে দেশের গানে মনোমুগ্ধকর সংগীতের মাধ্যমে সবাইকে মাতিয়ে রাখেন বিশিষ্ট সংগীত শিল্পী প্রমি ও তাজ এবং সারগাম ব্যান্ড অনুষ্টানে কানকটিকাট এর বিভিন্ন শহর থেকে জুম এর মাধ্যমে বাকের সদস্যবৃন্দ ও বিভিন্ন সংগঠনের সদস্যবৃন্দ অংশগ্রহণ করেন । বাকের উপদেষ্টা আব্দুল মান্নান চৌধুরী, তারেক আম্বিয়া, আব্দুল মোমিত মামুন, হেলালুল করিম, বাকের সহসভাপতি নুরুল আলম, মো: রহমান তুহিন কোষাধ্যক্ষ তারেক খান, পাবলিক রিলেশন সম্পাদক জাহাংগীর আলম, আব্দুল জায়গীরদার খোকন, সাহেদুর রহমান, ইব্রাহিম সাইদ, খলিলুর রহমান রুপু, হাসিনা জাফর, হাবিবুর বহমান ও জাহিদ প্রমুখ । অনুষ্টানটি সরাসরি ইউএসএ নিউজ অনলাইন ও ইউএস বাংলা ব্লগ থেকেও সরাসরি ফেইসবুকে সম্প্রচারিত হয়। অতিথিবৃন্দ মুক্তিযুদ্ধের স্মৃতিচারণ করেন। পাকিস্তান আমলের বঞ্চনার ইতিহাস তুলে ধরেন । অনুষ্টান চলে ৩ ঘন্টাব্যপী । পরিশেষে সভাপতি অনুষ্টানে উপস্হিত হওয়ার জন্য সবাইকে ধন্যবাদ জানিয়ে সভার সমাপ্তি ঘোষনা করেন।</p>', 1, '2021-01-20 19:29:40', '2021-01-20 19:29:40'),
(21, '[\"8\"]', 'বাকের গণসংযোগ সম্পাদক জাহাঙ্গীর আলম', 'baker-gnsngzog-smpadk-jahangoeer-alm-60083f4c38c7e', '<p>বাংলাদেশ আমেরিকান এসোসিয়েশন অব কানেকটিকাট-বাক এর গণসংযোগ সম্পাদক পদ শুন্য থাকায় গত ২০শে জুলাই (২০২০)সোমবার কার্যনির্বাহী কমিটির সভায় ১৬ সদস্যের সিদ্ধান্তের ভিত্তিত্তে গণ সংযোগ সম্পাদক পদে দক্ষ সংগঠক জাহাঙ্গীর আলমের নাম সর্বসম্মতিক্রমে প্রস্তাবিত হয় ।</p>\r\n\r\n<p>সংগঠনের সভাপতি ও সাধারণ সম্পাদক জাহাঙ্গীর আলমের প্রস্তাবিত নামটি গ্রহণ করেন এবং গত ২৬শে জুলাই কমিটি এক সভায় জাহাঙ্গীর আলমকে গণসংযোগ সম্পাদক পদে অন্তর্ভুক্ত করার শপথ অনুষ্ঠান অনুষ্টিত হয় ।</p>\r\n\r\n<p><img alt=\"\" src=\"https://baacusa.org/upload/all-image/img_1611153123_60083ee3499a6.jpg\" /></p>\r\n\r\n<p>এতে সংগঠনের সভাপতি শপথ অনুষ্টান পরিচালনা করেন, শপথ অনুষ্ঠানের পর সংগঠনের সভাপতি মঈনুল হক চৌধুরীর সভাপতিত্বে সাংগঠনিক সম্পাদক হূমায়ুন আহমেদ চৌধুরীর পরিচালনায় এক আলোচনা সভা অনুষ্টিত হয়।</p>\r\n\r\n<p>আলোচনায় অংশগ্রহন করেন বাকের উপদেষ্টা ও সাবেক প্রতিষ্ঠাতা সভাপতি ড. তামিম আহমদ, বাকের উপদেষ্টা ও সাবেক সভাপতি মশিউর রহমান কামাল, বাকের উপদেষ্টা ও সাবেক সভাপতি আশফাক তরফদার, বাকের উপদেষ্টা আব্দুল মান্নান চৌধুরী, বাকের উপদেষ্টা তারেক আম্বিয়া, সাধারণ সম্পাদক সৈয়দ আজিজুর রহমান, সহসভাপতি নুরুল আলম, সহসভাপতি মোহাম্মদ রহমান তুহিন, সাবেক কর্মকর্তা ডেভিড স্বপন রজারিও, সাবেক কর্মকর্তা সৈয়দ সাদেক, মোজাম্মেল হক বাবুল, হাবিবুর রহমান, আলমগীর হেসেন, সাঈদ চৌধুরী সুমন, মাসুদ রানা, তারেক খান, আবুল হাসেম, সাঈদ ইব্রাহীম, সাবেক কর্মকর্তা হাবিবুর রহমান, মোহাম্মদ রহমান রাজু, হাবিবুর রহমান (ম্যানচেস্টার), জাসেদুল আলম জাহিদ, ইব্রাহীম টিপু, জেহিন চৌধুরী, মোহাম্মদ মন্জু , পারভেজ (সেল্টন) শিপলু, কামরান, বুলবুল, সেলিম, শাহিন মোবিন ও মোহাইমিনুন প্রমূখ ।</p>', 0, '2021-01-20 19:33:48', '2021-01-21 07:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

DROP TABLE IF EXISTS `post_categories`;
CREATE TABLE IF NOT EXISTS `post_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `category_title`, `created_at`, `updated_at`) VALUES
(8, 'News', '2020-12-22 06:32:47', '2020-12-22 06:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `post_images`
--

DROP TABLE IF EXISTS `post_images`;
CREATE TABLE IF NOT EXISTS `post_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` bigint NOT NULL,
  `post_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_image` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=Default-True, 0=Default-False',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_images`
--

INSERT INTO `post_images` (`id`, `post_id`, `post_image`, `default_image`, `created_at`, `updated_at`) VALUES
(25, 8, 'upload/post-image/img_1611151358_600837fe87563.jpg', 1, '2021-01-20 19:02:38', '2021-01-20 19:02:38'),
(26, 13, 'upload/post-image/img_1611151522_600838a2e6de9.jpg', 1, '2021-01-20 19:05:22', '2021-01-20 19:05:22'),
(27, 14, 'upload/post-image/img_1611151696_6008395000cd8.jpg', 1, '2021-01-20 19:08:16', '2021-01-20 19:08:16'),
(28, 15, 'upload/post-image/img_1611151806_600839be70628.JPG', 1, '2021-01-20 19:10:06', '2021-01-20 19:10:06'),
(29, 16, 'upload/post-image/img_1611151914_60083a2add3fb.jpg', 1, '2021-01-20 19:11:54', '2021-01-20 19:11:54'),
(30, 18, 'upload/post-image/img_1611152001_60083a816174a.jpg', 1, '2021-01-20 19:13:21', '2021-01-20 19:13:21'),
(31, 19, 'upload/post-image/img_1611152532_60083c947f44c.jpg', 1, '2021-01-20 19:22:12', '2021-01-20 19:22:12'),
(32, 20, 'upload/post-image/img_1611152980_60083e5451f62.jpg', 1, '2021-01-20 19:29:40', '2021-01-20 19:29:40'),
(33, 21, 'upload/post-image/img_1611153228_60083f4c3b294.jpg', 1, '2021-01-20 19:33:48', '2021-01-20 19:33:48');

-- --------------------------------------------------------

--
-- Table structure for table `pricing_lists`
--

DROP TABLE IF EXISTS `pricing_lists`;
CREATE TABLE IF NOT EXISTS `pricing_lists` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `price` double(8,2) NOT NULL,
  `duration` int DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricing_lists`
--

INSERT INTO `pricing_lists` (`id`, `price`, `duration`, `title`, `slug`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 1.00, 30, 'General Member', 'General Member', '<p>Recurring Payment (monthly) on a small fee for testing purpose.</p>', 1, '2021-03-28 00:46:11', '2021-03-28 00:46:11'),
(2, 10.00, 30, 'Life Member', 'Life Member', '<p>Premium Content! It is a one time payment of a small fee. Just have a test..</p>', 1, '2021-03-28 00:47:04', '2021-03-28 00:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `print_and_news`
--

DROP TABLE IF EXISTS `print_and_news`;
CREATE TABLE IF NOT EXISTS `print_and_news` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `print_and_news`
--

INSERT INTO `print_and_news` (`id`, `image`, `link`, `created_at`, `updated_at`) VALUES
(1, 'upload/print-and-news/img_1608978066_5fe70e921e2a4.jpg', 'http://www.dainikamadershomoy.com/', '2020-12-26 03:58:37', '2020-12-26 04:21:06'),
(6, 'upload/print-and-news/img_1608978289_5fe70f7182fff.jpg', 'http://www.bd-pratidin.com/', '2020-12-26 04:24:49', '2020-12-26 04:24:49'),
(7, 'upload/print-and-news/img_1608978308_5fe70f8407374.jpg', 'http://www.mzamin.com/', '2020-12-26 04:25:08', '2020-12-26 04:25:08'),
(8, 'upload/print-and-news/img_1608978322_5fe70f9233fe9.jpg', 'http://www.bhorerkagoj.net/', '2020-12-26 04:25:22', '2020-12-26 04:25:22'),
(9, 'upload/print-and-news/img_1608978338_5fe70fa23418a.jpg', 'http://www.dailyinqilab.com/', '2020-12-26 04:25:38', '2020-12-26 04:25:38'),
(10, 'upload/print-and-news/img_1608978350_5fe70fae7d6b0.jpg', 'http://www.dailyjanakantha.com/', '2020-12-26 04:25:50', '2020-12-26 04:25:50'),
(11, 'upload/print-and-news/img_1608978361_5fe70fb99ce6d.jpg', 'http://www.mzamin.com/', '2020-12-26 04:26:01', '2020-12-26 04:26:01'),
(12, 'upload/print-and-news/img_1608978374_5fe70fc685593.jpg', 'http://www.dailynayadiganta.com/', '2020-12-26 04:26:14', '2020-12-26 04:26:14'),
(13, 'upload/print-and-news/img_1608978392_5fe70fd878338.jpg', 'http://www.prothom-alo.com/', '2020-12-26 04:26:32', '2020-12-26 04:26:32'),
(14, 'upload/print-and-news/img_1608978408_5fe70fe8920ea.jpg', 'http://www.samakal.com.bd/', '2020-12-26 04:26:48', '2020-12-26 04:26:48'),
(15, 'upload/print-and-news/img_1608978419_5fe70ff3dac4e.jpg', 'http://www.dailysangram.com/', '2020-12-26 04:26:59', '2020-12-26 04:26:59'),
(16, 'upload/print-and-news/img_1608978495_5fe7103fd5a49.jpg', 'http://www.bdnews24.com/bangla/', '2020-12-26 04:28:15', '2020-12-26 04:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `publication_constitutions`
--

DROP TABLE IF EXISTS `publication_constitutions`;
CREATE TABLE IF NOT EXISTS `publication_constitutions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `download` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `constitution` tinyint(1) DEFAULT NULL,
  `publication` tinyint(1) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=Unpublished, 1=Published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publication_constitutions`
--

INSERT INTO `publication_constitutions` (`id`, `title`, `image`, `download`, `constitution`, `publication`, `status`, `created_at`, `updated_at`) VALUES
(1, 'মূলধারা', 'upload/publication-constitution/66587.png', 'upload/publication-constitution/86280.pdf', 0, 1, 1, '2021-01-23 03:41:32', '2021-01-23 03:41:32'),
(2, 'পুনর্মিলনী', 'upload/publication-constitution/90715.jpg', 'upload/publication-constitution/86280.pdf', 1, 1, 1, '2021-01-23 03:41:32', '2021-01-23 04:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `renew_member_ships`
--

DROP TABLE IF EXISTS `renew_member_ships`;
CREATE TABLE IF NOT EXISTS `renew_member_ships` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `renewal_info` json DEFAULT NULL,
  `benifit_content` longtext COLLATE utf8mb4_unicode_ci,
  `membership_ceteogory_content` json DEFAULT NULL,
  `renew_page` tinyint(1) NOT NULL DEFAULT '0',
  `overview_page` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=Unpublished, 1=Published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `renew_member_ships`
--

INSERT INTO `renew_member_ships` (`id`, `image`, `title`, `content`, `renewal_info`, `benifit_content`, `membership_ceteogory_content`, `renew_page`, `overview_page`, `status`, `created_at`, `updated_at`) VALUES
(1, 'upload/member-renew/885624.jpg', 'Renew Membership Dues', 'Bangladeshi American Association Of Connecticut(BAAC) standing beside of Bangladeshi journalists and media professional for more than 10 years, providing advocacy, information and service to the New York.<br />\r\nApplying for membership is straightforward. Select a membership category that best fits your situation. Submit a membership application along with appropriate fees (Credit/debit/PayPal/Check/Money Order etc.). Applications received without the fees payment will not be considered.<br />\r\nApplications are reviewed by a committee of the Club. If for any reason an application is not approved, all fees paid are immediately refunded.', NULL, '<ul>\r\n	<li>Bangladeshi American Association of Connecticut (BAK) works to protect the rights of all reporters while providing networking opportunities for journalists and professional communicators to discuss professional issues and affect change.</li>\r\n	<li>Lectures, panel discussions, newsmaker appearances and other Press Club sponsored functions have covered such topics as threats to freedom of the press, the various threats to investigative reporting, the relationship between the media and government, the role of community newspapers, foreign press coverage, and questions about how the press covers itself. The club also sponsors debates &ndash; open to all members and broadcast live &ndash; among candidates.</li>\r\n	<li>Bangladeshi American Association of Connecticut (BAK) provides assistance and support to journalists faced with legal problems about news. Additionally, the club maintains a liaison with various government agencies whose actions directly affect working journalists in such matters as the issuing of Working Press credentials.</li>\r\n	<li>The annual New York Press Club Journalism Awards are a long-standing tradition in New York media, honoring excellence in journalism by writers and reporters who are recognized as being among the best in their fields. The Awards and Installation(annual) Dinner at which the years awards are formally presented is a highlight on community and socially.</li>\r\n	<li>Our annual Journalism Conference, traditionally staged in, has long been recognized as the premier event of community. In addition to numerous conference tracks and break-outs that feature respected working journalists, experts and academics, the conference offers other elements of useful interest to all.</li>\r\n	<li>The opportunities of membership in the New York Press Club, professional and otherwise, are boundless &ndash; regulated only by the enthusiasm and energy of individual members.</li>\r\n</ul>', NULL, 1, 1, 1, '2021-01-26 05:31:19', '2021-01-26 07:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `reunions`
--

DROP TABLE IF EXISTS `reunions`;
CREATE TABLE IF NOT EXISTS `reunions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=Unpublished, 1=Published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reunions`
--

INSERT INTO `reunions` (`id`, `icon`, `title`, `slug`, `image`, `url`, `status`, `created_at`, `updated_at`) VALUES
(1, '<i class=\"fas fa-external-link-alt\"></i>', 'পুনর্মিলনী - ২০১৭', 'punrmilnee-2017', 'upload/reunion/49017.png', 'upload/reunion/25095.pdf', 1, '2021-01-26 00:49:39', '2021-01-26 03:03:51'),
(2, '<i class=\"fas fa-external-link-alt\"></i>', 'পুনর্মিলনী - ২০১৮', 'punrmilnee-2018', 'upload/reunion/349.png', NULL, 1, '2021-01-26 01:02:09', '2021-01-26 01:02:09'),
(3, '<i class=\"fas fa-external-link-alt\"></i>', 'পুনর্মিলনী - ২০১৯', 'punrmilnee-2019', 'upload/reunion/43029.png', NULL, 1, '2021-01-26 01:02:44', '2021-01-26 01:02:44'),
(4, '<i class=\"fas fa-external-link-alt\"></i>', 'পুনর্মিলনী - ২০২০', 'punrmilnee-2020', 'upload/reunion/21931.png', NULL, 1, '2021-01-26 01:03:12', '2021-01-26 01:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `stateCode` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `stateName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `stateCode`, `stateName`, `created_at`, `updated_at`) VALUES
(1, 'AL', 'Alabama', NULL, NULL),
(2, 'AK', 'Alaska', NULL, NULL),
(3, 'AL', 'Alabama', NULL, NULL),
(4, 'AZ', 'Arizona', NULL, NULL),
(5, 'AR', 'Arkansas', NULL, NULL),
(6, 'CA', 'California', NULL, NULL),
(7, 'CO', 'Colorado', NULL, NULL),
(8, 'CT', 'Connecticut', NULL, NULL),
(9, 'DE', 'Delaware', NULL, NULL),
(10, 'DC', 'District of Columbia', NULL, NULL),
(11, 'FL', 'Florida', NULL, NULL),
(12, 'GA', 'Georgia', NULL, NULL),
(13, 'HI', 'Hawaii', NULL, NULL),
(14, 'ID', 'Idaho', NULL, NULL),
(15, 'IL', 'Illinois', NULL, NULL),
(16, 'IN', 'Indiana', NULL, NULL),
(17, 'IA', 'Iowa', NULL, NULL),
(18, 'KS', 'Kansas', NULL, NULL),
(19, 'KY', 'Kentucky', NULL, NULL),
(20, 'LA', 'Louisiana', NULL, NULL),
(21, 'ME', 'Maine', NULL, NULL),
(22, 'MD', 'Maryland', NULL, NULL),
(23, 'MA', 'Massachusetts', NULL, NULL),
(24, 'MI', 'Michigan', NULL, NULL),
(25, 'MN', 'Minnesota', NULL, NULL),
(26, 'MS', 'Mississippi', NULL, NULL),
(27, 'MO', 'Missouri', NULL, NULL),
(28, 'MT', 'Montana', NULL, NULL),
(29, 'NE', 'Nebraska', NULL, NULL),
(30, 'NV', 'Nevada', NULL, NULL),
(31, 'NH', 'New Hampshire', NULL, NULL),
(32, 'NJ', 'New Jersey', NULL, NULL),
(33, 'NM', 'New Mexico', NULL, NULL),
(34, 'NY', 'New York', NULL, NULL),
(35, 'NC', 'North Carolina', NULL, NULL),
(36, 'ND', 'North Dakota', NULL, NULL),
(37, 'OH', 'Ohio', NULL, NULL),
(38, 'OK', 'Oklahoma', NULL, NULL),
(39, 'OR', 'Oregon', NULL, NULL),
(40, 'PA', 'Pennsylvania', NULL, NULL),
(41, 'PR', 'Puerto Rico', NULL, NULL),
(42, 'RI', 'Rhode Island', NULL, NULL),
(43, 'SC', 'South Carolina', NULL, NULL),
(44, 'SD', 'South Dakota', NULL, NULL),
(45, 'TN', 'Tennessee', NULL, NULL),
(46, 'TX', 'Texas', NULL, NULL),
(47, 'UT', 'Utah', NULL, NULL),
(48, 'VT', 'Vermont', NULL, NULL),
(49, 'VA', 'Virginia', NULL, NULL),
(50, 'WA', 'Washington', NULL, NULL),
(51, 'WV', 'West Virginia', NULL, NULL),
(52, 'WI', 'Wisconsin', NULL, NULL),
(53, 'WY', 'Wyoming', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriber_images`
--

DROP TABLE IF EXISTS `subscriber_images`;
CREATE TABLE IF NOT EXISTS `subscriber_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriber_images`
--

INSERT INTO `subscriber_images` (`id`, `profile_img`, `status`, `created_at`, `updated_at`) VALUES
(1, 'upload/subscribe-users/984796.jpg', 1, '2021-03-28 02:26:09', '2021-03-28 02:29:12'),
(2, 'upload/subscribe-users/488218.jpg', 1, '2021-03-28 02:35:57', '2021-03-28 02:36:32'),
(3, 'upload/subscribe-users/89240.jpg', 1, '2021-03-28 02:48:20', '2021-03-28 02:48:54');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe_users`
--

DROP TABLE IF EXISTS `subscribe_users`;
CREATE TABLE IF NOT EXISTS `subscribe_users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `member_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yearOfBirth` int NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usa_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` int NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bd_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bd_upazila` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `information` longtext COLLATE utf8mb4_unicode_ci,
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `duration` int DEFAULT NULL,
  `started_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscribe_users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribe_users`
--

INSERT INTO `subscribe_users` (`id`, `member_id`, `fname`, `mname`, `lname`, `slug`, `phone`, `yearOfBirth`, `email`, `password`, `member_plan`, `usa_address`, `city`, `state`, `zipcode`, `country`, `bd_address`, `bd_upazila`, `facebook`, `twitter`, `other_social`, `information`, `profile_img`, `status`, `duration`, `started_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, '156739', 'Md', 'Sajib', 'Prodhan', 'md-sajib-prodhan-47', '01719322464', 1991, 'sajib@bijoytech.com', '$2y$10$Jygr0EpDOTlLceGhqPPXLeZs6LM3uY5xzvP4h6XaYVNLsC/ezVDku', 'Life Member', 'USA', 'Jackson Heights', 'Arkansas', 54785, 'USA', 'USA', 'Ajmiriganj', NULL, NULL, NULL, NULL, NULL, 1, 30, '2021-03-27 18:00:00', 'uZiUYn9HBAl0HwypCretL4ulzadAKqVQLP7W8mJYtmocZfy7Vc1tnbut36aY', '2021-03-28 04:00:07', '2021-03-28 23:06:51'),
(4, '237804', 'Md', 'Sajib', 'Prodhan', 'md-sajib-prodhan-44', '01719322464', 1991, 'sajibprodhan@gmail.com', '$2y$10$v64bH55E9gCzj/JU6oZQq.s4/89f0j4oVmTS8/BUcF1CM4Zlw1zYy', 'Life Member', 'USA', 'Jackson Heights', 'Arkansas', 54785, 'USA', 'USA', 'Ajmiriganj', NULL, NULL, NULL, NULL, 'upload/subscribe-users/89240.jpg', 1, 30, '2021-03-27 18:00:00', NULL, '2021-03-28 02:48:54', '2021-03-28 02:48:54'),
(6, '190615', 'Md', 'Sajib', 'Prodhan', 'md-sajib-prodhan-27', '01719322464', 1991, 'sajissbprodhan@gmail.com', '$2y$10$F0oD1b4i1am08RMUX.fiw.R4Dy560vfVZ3FSQyYFsKxYv6.2eD.kG', 'General Member', 'USA', 'Jackson Heights', 'Arkansas', 54785, 'USA', 'USA', 'Ajmiriganj', NULL, NULL, NULL, NULL, NULL, 1, 30, '2021-03-27 18:00:00', NULL, '2021-03-28 06:12:50', '2021-03-28 06:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `upcomming_events`
--

DROP TABLE IF EXISTS `upcomming_events`;
CREATE TABLE IF NOT EXISTS `upcomming_events` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `eventTitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventTitme` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventDate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventMonth` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventLocation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=Unpublished, 1=Published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upcomming_events`
--

INSERT INTO `upcomming_events` (`id`, `eventTitle`, `eventTitme`, `eventDate`, `eventMonth`, `eventLocation`, `status`, `created_at`, `updated_at`) VALUES
(1, 'মাতৃভাষা দিবস পালন উপলক্ষে মতবিনিময় সভা-2021', '05.00pm - 07.00pm', '05', 'Feb', '<p>সোসাইটি ভবন - 86-24 Whitney Avenue</p>', 1, '2021-01-18 06:11:43', '2021-01-18 23:58:08'),
(2, 'মাতৃভাষা দিবস পালন উপলক্ষে মতবিনিময় সভা-2021', '05.00pm - 07.00pm', '05', 'Oct', '<p>সোসাইটি ভবন - 86-24 Whitney Avenue</p>', 1, '2021-01-18 06:28:19', '2021-01-18 23:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Giash Ahmed', NULL, 'giashahmed123@gmail.com', '2020-12-21 06:51:04', '$2b$10$RWWJM5mJwvvxdfgz0ms43OB7n67C4bVV1mcIOHG6eFwCWBgDPjTPm', NULL, '2020-12-21 06:51:04', '2020-12-21 06:51:04'),
(2, 'Bijoytech', 'upload/admin-image/img_1608973166_5fe6fb6ee289d.jpg', 'bijoytechadmin@gmail.com', '2020-12-21 06:51:04', '$2y$10$/yhSxzJxvOWOxnBBpc3SQemTUAqX/lWTXo7IDDCHQV5ahKm8stAq.', 'HBRb2yxvQs8pi82Vv8e6OstY2xU2wWTjXZM1Svp6bctPqYKh13o4YEvXaAJJ', '2020-12-21 06:51:04', '2020-12-26 02:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `video_galleries`
--

DROP TABLE IF EXISTS `video_galleries`;
CREATE TABLE IF NOT EXISTS `video_galleries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `video_url` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_galleries`
--

INSERT INTO `video_galleries` (`id`, `video_url`, `created_at`, `updated_at`) VALUES
(11, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/0DrJ7VI0A0M\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-01-20 19:46:33', '2021-01-20 19:46:33'),
(12, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/UTMSrzRYA3s\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-01-20 19:48:06', '2021-01-20 19:48:06'),
(13, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/b5mzNJiJsCI\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-01-20 19:48:06', '2021-01-20 19:48:06'),
(14, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/fN21oOdni_c\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-01-20 19:49:18', '2021-01-20 19:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_counts`
--

DROP TABLE IF EXISTS `visitor_counts`;
CREATE TABLE IF NOT EXISTS `visitor_counts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor_counts`
--

INSERT INTO `visitor_counts` (`id`, `ip`, `date`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', '2021-01-23', '2021-01-23 01:22:01', '2021-01-23 01:22:01'),
(2, '127.0.0.1', '2021-01-24', '2021-01-23 23:04:08', '2021-01-23 23:04:08'),
(3, '127.0.0.1', '2021-01-25', '2021-01-24 23:21:09', '2021-01-24 23:21:09'),
(4, '127.0.0.1', '2021-01-26', '2021-01-25 22:34:38', '2021-01-25 22:34:38'),
(5, '127.0.0.1', '2021-01-27', '2021-01-26 22:45:07', '2021-01-26 22:45:07'),
(6, '127.0.0.1', '2021-02-01', '2021-01-31 23:19:50', '2021-01-31 23:19:50'),
(7, '127.0.0.1', '2021-02-02', '2021-02-02 02:41:47', '2021-02-02 02:41:47');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
