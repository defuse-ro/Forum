-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 25, 2024 at 12:39 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tests_apexforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`id`, `name`, `description`, `score`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Junior', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas enim mauris, congue vel justo vel, vehicula posuere risus. Vestibulum at ante tellus. Morbi volutpat massa nec urna pretium, eu porta mi accumsan', 100, 'cdc0939ff1f7065d69df6a5d01c7a123_.png', '2023-07-14 05:53:57', '2023-11-20 12:40:41'),
(3, 'Dynamite', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas enim mauris, congue vel justo vel, vehicula posuere risus. Vestibulum at ante tellus. Morbi volutpat massa nec urna pretium, eu porta mi accumsan', 500, 'df99ab4a5a70b71aa841748ed5ed5f15_Dynamite.png', '2023-07-14 15:36:43', '2023-11-20 12:41:58'),
(4, 'MVP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas enim mauris, congue vel justo vel, vehicula posuere risus. Vestibulum at ante tellus. Morbi volutpat massa nec urna pretium, eu porta mi accumsan', 10000, '965d42521ab7ed3b768fea51f8e48350_MVP.png', '2023-09-23 08:29:25', '2023-11-20 12:36:51'),
(6, 'King', 'Fusce efficitur non turpis nec mattis. Nulla placerat et felis nec interdum. Pellentesque elementum orci erat, eget posuere nisi tristique vitae', 20000, '422c162028af26f1e8933ee47df2557e_King.png', '2023-11-20 12:35:51', '2023-11-20 12:35:51'),
(7, 'Legend', 'Fusce efficitur non turpis nec mattis. Nulla placerat et felis nec interdum. Pellentesque elementum orci erat, eget posuere nisi tristique vitae', 15000, '1a9251a57d198c4d1d2a1b734159a6ff_Legend.png', '2023-11-20 12:36:33', '2023-11-20 12:36:33'),
(8, 'Transcend', 'Fusce efficitur non turpis nec mattis. Nulla placerat et felis nec interdum. Pellentesque elementum orci erat, eget posuere nisi tristique vitae', 5000, '3a69e53db7828bba71404c74a8260cd2_Transcend.png', '2023-11-20 12:37:38', '2023-11-20 12:37:38'),
(9, 'Pikachu', 'Fusce efficitur non turpis nec mattis. Nulla placerat et felis nec interdum. Pellentesque elementum orci erat, eget posuere nisi tristique vitae', 3000, '644f14d73d15a8b386f7d1a22545b93d_Pikachu.png', '2023-11-20 12:38:38', '2023-11-20 12:38:38'),
(10, 'Mario', 'Fusce efficitur non turpis nec mattis. Nulla placerat et felis nec interdum. Pellentesque elementum orci erat, eget posuere nisi tristique vitae', 2000, '9a3f7bdff825534dac4895db528154ea_Mario.png', '2023-11-20 12:39:16', '2023-11-20 12:39:16'),
(11, 'Bombastic', 'Fusce efficitur non turpis nec mattis. Nulla placerat et felis nec interdum. Pellentesque elementum orci erat, eget posuere nisi tristique vitae', 1000, 'd55a68b8d15084164b49caa50c06df31_Bombastic.png', '2023-11-20 12:40:02', '2023-11-20 12:40:02'),
(12, 'Warrior', 'Fusce efficitur non turpis nec mattis. Nulla placerat et felis nec interdum. Pellentesque elementum orci erat, eget posuere nisi tristique vitae', 200, '0c8a914ea853c7ee304608fa656059a0_Warrior.png', '2023-11-20 12:41:33', '2023-11-20 12:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `bans`
--

CREATE TABLE `bans` (
  `id` int(10) UNSIGNED NOT NULL,
  `bannable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bannable_id` bigint(20) UNSIGNED NOT NULL,
  `created_by_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bans`
--

INSERT INTO `bans` (`id`, `bannable_type`, `bannable_id`, `created_by_type`, `created_by_id`, `comment`, `expired_at`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 14, 'App\\Models\\User', 1, 'You have been spamming other Users', '2023-11-14 11:35:48', '2023-11-13 12:33:51', '2023-11-13 11:35:48', '2023-11-13 12:33:51'),
(2, 'App\\Models\\User', 14, 'App\\Models\\User', 1, 'Spamming Users', '2023-11-14 00:43:40', '2023-11-20 14:51:28', '2023-11-13 12:43:40', '2023-11-20 14:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `ban_durations`
--

CREATE TABLE `ban_durations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ban_durations`
--

INSERT INTO `ban_durations` (`id`, `title`, `time`, `created_at`, `updated_at`) VALUES
(2, '15 Minutes', 15, '2023-11-13 09:13:27', '2023-11-13 09:13:27'),
(3, '30 Minutes', 30, '2023-11-13 09:13:51', '2023-11-13 09:13:51'),
(4, 'An Hour', 60, '2023-11-13 09:14:10', '2023-11-13 09:14:10'),
(5, '3 Hours', 180, '2023-11-13 09:17:15', '2023-11-13 09:17:15'),
(6, '6 Hours', 360, '2023-11-13 09:17:40', '2023-11-13 09:17:40'),
(7, '12 Hours', 720, '2023-11-13 09:18:31', '2023-11-13 09:18:31'),
(8, 'A Day', 1440, '2023-11-13 09:18:56', '2023-11-13 09:18:56'),
(9, '3 Days', 4320, '2023-11-13 09:19:39', '2023-11-13 09:19:39'),
(10, 'A Week', 10080, '2023-11-13 09:20:02', '2023-11-13 09:20:02'),
(11, '2 weeks', 20160, '2023-11-13 09:20:31', '2023-11-13 09:20:31'),
(12, 'A Month', 43200, '2023-11-13 09:21:30', '2023-11-13 09:21:30'),
(13, '2 Months', 86400, '2023-11-13 09:23:27', '2023-11-13 09:23:27'),
(14, 'A Year', 518400, '2023-11-13 09:24:33', '2023-11-13 09:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `block_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `user_id`, `block_id`, `created_at`, `updated_at`) VALUES
(1, 2, 14, '2023-11-16 05:56:54', '2023-11-16 05:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `buy_points`
--

CREATE TABLE `buy_points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buy_points`
--

INSERT INTO `buy_points` (`id`, `value`, `price`, `order`, `created_at`, `updated_at`) VALUES
(2, 20, '2.00', 1, '2023-10-27 07:49:34', '2023-10-27 07:49:34'),
(3, 30, '3.00', 2, '2023-10-27 08:23:07', '2023-10-27 08:23:07'),
(4, 50, '5.00', 3, '2023-10-27 08:23:25', '2023-10-27 08:23:25'),
(5, 100, '10.00', 4, '2023-10-27 08:23:43', '2023-10-27 08:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `pro`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Design', 'design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin luctus auctor elit vestibulum molestie. Sed vehicula risus vitae ornare mattis. Nulla pharetra mattis turpis eget condimentum.', '94732688560a1cefd7bd37afd92fa141_Design.jpg', 0, 1, '2023-07-18 05:34:42', '2023-07-18 05:34:42'),
(2, 'Community', 'community', 'Donec id blandit neque. Etiam eu ex id elit vehicula varius. Cras consectetur libero id magna sollicitudin aliquet. Curabitur quis erat ornare, laoreet ligula id, porta enim.', '58288cb6222f9326cb7e507114db859b_Community.jpg', 0, 1, '2023-07-19 06:30:20', '2023-07-19 06:30:20'),
(3, 'Growth Hacking', 'growth-hacking', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam sed tellus purus. Nunc eu vestibulum quam, in sollicitudin ipsum. Donec ut molestie eros', '98d0da566017c6ed5e5666c82f4094b4_Growth Hacking.jpg', 1, 1, '2023-10-07 09:44:02', '2023-10-26 09:34:29'),
(4, 'Products', 'products', 'Nullam et pharetra elit, commodo volutpat diam. Quisque maximus augue in erat tempor sollicitudin', '6b41fe0b6eee344d51eeb47b8979ac56_Products.jpg', 0, 1, '2023-10-14 06:12:12', '2023-10-14 06:12:12'),
(5, 'Ideas and Validation', 'ideas-and-validation', 'Nullam et pharetra elit, commodo volutpat diam. Quisque maximus augue in erat tempor sollicitudin', '0070a62beadbd6786d62a0d4045aefba_Ideas and Validation.jpg', 0, 1, '2023-10-14 06:12:42', '2023-10-14 06:12:42'),
(6, 'Feedback', 'feedback', 'Nullam et pharetra elit, commodo volutpat diam. Quisque maximus augue in erat tempor sollicitudin', 'f3fdb0db05482926bc6b8f2259e71880_Feedback.jpg', 1, 1, '2023-10-14 06:13:26', '2023-10-26 09:34:48'),
(7, 'Crypto & NFT', 'crypto-nft', 'Curabitur feugiat porttitor ipsum in pharetra. Suspendisse lacinia fermentum magna, at porttitor elit finibus quis. Morbi eu elit nulla.', 'b9b9fc6ceaece1e5ba41407bb434f62f_Crypto & NFT.jpg', 0, 1, '2023-11-20 12:26:04', '2023-11-20 12:26:04'),
(8, 'AI', 'ai', 'Curabitur feugiat porttitor ipsum in pharetra. Suspendisse lacinia fermentum magna, at porttitor elit finibus quis. Morbi eu elit nulla.', '9bffcd6173949d44b7dda2ec39aedf0e_AI.jpg', 0, 1, '2023-11-20 12:26:57', '2023-11-20 12:26:57'),
(9, 'Success & Failures', 'success-failures', 'Curabitur feugiat porttitor ipsum in pharetra. Suspendisse lacinia fermentum magna, at porttitor elit finibus quis. Morbi eu elit nulla.', '79f484c43613cb34ffc94918fc338e16_Success & Failures.jpg', 0, 1, '2023-11-20 12:28:13', '2023-11-20 12:28:13'),
(10, 'Developers', 'developers', 'Curabitur feugiat porttitor ipsum in pharetra. Suspendisse lacinia fermentum magna, at porttitor elit finibus quis. Morbi eu elit nulla.', '749d7165a000c434b215cc6fda95e1e7_Developers.jpg', 0, 1, '2023-11-20 12:28:53', '2023-11-20 12:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `sender_id`, `receiver_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 6, 7, 1, '2023-08-26 09:20:15', '2023-08-26 09:20:15'),
(5, 7, 2, 1, '2023-08-29 12:28:13', '2023-08-30 15:21:57'),
(6, 6, 8, 1, '2023-08-30 06:37:17', '2023-08-30 06:37:17'),
(7, 7, 8, 1, '2023-08-30 16:14:29', '2023-08-30 16:14:29'),
(8, 5, 7, 1, '2023-09-01 07:56:57', '2023-09-01 07:56:57'),
(9, 4, 5, 1, '2023-09-06 05:59:36', '2023-09-06 05:59:36'),
(11, 4, 3, 1, '2023-09-09 11:39:18', '2023-09-09 11:39:18'),
(12, 2, 8, 1, '2023-09-12 13:45:47', '2023-09-12 13:45:47'),
(13, 7, 4, 1, '2023-09-15 05:53:30', '2023-09-15 05:53:30'),
(14, 9, 10, 1, '2023-10-06 12:13:58', '2023-10-06 12:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `solution` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `body`, `status`, `solution`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '<p>Why are you Crying Little Baby</p><p><img src=\"https://media3.giphy.com/media/C5oD3WouufnWORp7wP/giphy-downsized.gif?cid=a51c33e6ot9llynwozzfu7ic1qmjc5s5pp633ue8malainm4&amp;ep=v1_gifs_trending&amp;rid=giphy-downsized.gif&amp;ct=g\" alt=\"Friends Kids GIF by Storyful\"><br></p>', 1, 0, '2023-08-23 11:39:07', '2023-08-23 16:02:24'),
(2, 1, 2, '<p>Indeed</p><p><img src=\"https://media2.giphy.com/media/B2vBunhgt9Pc4/giphy-tumblr.gif?cid=a51c33e6ot9llynwozzfu7ic1qmjc5s5pp633ue8malainm4&amp;ep=v1_gifs_trending&amp;rid=giphy-tumblr.gif&amp;ct=g\" alt=\"Dogs Think GIF\"><br></p>', 1, 0, '2023-08-23 11:42:26', '2023-08-23 11:42:26'),
(3, 1, 2, '<p>Great Work</p><p><img src=\"https://media4.giphy.com/media/YFPVchheUeN1RQmjQx/giphy-downsized.gif?cid=a51c33e6ot9llynwozzfu7ic1qmjc5s5pp633ue8malainm4&amp;ep=v1_gifs_trending&amp;rid=giphy-downsized.gif&amp;ct=g\" alt=\"Public School Ugh GIF by ABC Network\"><br></p>', 1, 0, '2023-08-23 11:43:07', '2023-08-23 11:43:07'),
(4, 2, 8, '<p>More\' More\'</p><p><img src=\"https://media0.giphy.com/media/pynZagVcYxVUk/giphy.gif?cid=a51c33e6w4bq3eiob9k86xsplwxqw43f29kt6866nlw8qzgz&amp;ep=v1_gifs_trending&amp;rid=giphy.gif&amp;ct=g\" alt=\"The Office Crying GIF\"><br></p>', 1, 0, '2023-08-23 15:42:22', '2023-08-23 16:10:04'),
(5, 7, 4, '<pre class=\"language-html\"><code class=\"language-html\">\r\n    <span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;</span>div</span> <span class=\"token attr-name\">class</span><span class=\"token attr-value\"><span class=\"token punctuation attr-equals\">=</span><span class=\"token punctuation\">\"</span>vine-header mb-4<span class=\"token punctuation\">\"</span></span> <span class=\"token attr-name\">data-aos</span><span class=\"token attr-value\"><span class=\"token punctuation attr-equals\">=</span><span class=\"token punctuation\">\"</span>fade-down<span class=\"token punctuation\">\"</span></span> <span class=\"token attr-name\">data-aos-easing</span><span class=\"token attr-value\"><span class=\"token punctuation attr-equals\">=</span><span class=\"token punctuation\">\"</span>linear<span class=\"token punctuation\">\"</span></span><span class=\"token punctuation\">&gt;</span></span>\r\n        <span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;</span>div</span> <span class=\"token attr-name\">class</span><span class=\"token attr-value\"><span class=\"token punctuation attr-equals\">=</span><span class=\"token punctuation\">\"</span>container<span class=\"token punctuation\">\"</span></span><span class=\"token punctuation\">&gt;</span></span>\r\n            <span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;</span>div</span> <span class=\"token attr-name\">class</span><span class=\"token attr-value\"><span class=\"token punctuation attr-equals\">=</span><span class=\"token punctuation\">\"</span>row px-3<span class=\"token punctuation\">\"</span></span><span class=\"token punctuation\">&gt;</span></span>\r\n                <span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;</span>div</span> <span class=\"token attr-name\">class</span><span class=\"token attr-value\"><span class=\"token punctuation attr-equals\">=</span><span class=\"token punctuation\">\"</span>col-lg-12<span class=\"token punctuation\">\"</span></span><span class=\"token punctuation\">&gt;</span></span>\r\n                    <span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;</span>ul</span> <span class=\"token attr-name\">class</span><span class=\"token attr-value\"><span class=\"token punctuation attr-equals\">=</span><span class=\"token punctuation\">\"</span>breadcrumbs<span class=\"token punctuation\">\"</span></span><span class=\"token punctuation\">&gt;</span></span>\r\n                        <span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;</span>li</span><span class=\"token punctuation\">&gt;</span></span><span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;</span>a</span> <span class=\"token attr-name\">href</span><span class=\"token attr-value\"><span class=\"token punctuation attr-equals\">=</span><span class=\"token punctuation\">\"</span>{{ route(\'home\') }}<span class=\"token punctuation\">\"</span></span><span class=\"token punctuation\">&gt;</span></span><span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;</span>span</span> <span class=\"token attr-name\">class</span><span class=\"token attr-value\"><span class=\"token punctuation attr-equals\">=</span><span class=\"token punctuation\">\"</span>bi bi-house me-1<span class=\"token punctuation\">\"</span></span><span class=\"token punctuation\">&gt;</span></span><span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;/</span>span</span><span class=\"token punctuation\">&gt;</span></span>Home<span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;/</span>a</span><span class=\"token punctuation\">&gt;</span></span><span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;/</span>li</span><span class=\"token punctuation\">&gt;</span></span>\r\n                        <span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;</span>li</span><span class=\"token punctuation\">&gt;</span></span><span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;</span>a</span> <span class=\"token attr-name\">href</span><span class=\"token attr-value\"><span class=\"token punctuation attr-equals\">=</span><span class=\"token punctuation\">\"</span>{{ route(\'home.posts\') }}<span class=\"token punctuation\">\"</span></span><span class=\"token punctuation\">&gt;</span></span>Posts<span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;/</span>a</span><span class=\"token punctuation\">&gt;</span></span><span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;/</span>li</span><span class=\"token punctuation\">&gt;</span></span>\r\n                        <span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;</span>li</span><span class=\"token punctuation\">&gt;</span></span>{{ $post-&gt;title }}<span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;/</span>li</span><span class=\"token punctuation\">&gt;</span></span>\r\n                    <span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;/</span>ul</span><span class=\"token punctuation\">&gt;</span></span>\r\n                    <span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;</span>h2</span> <span class=\"token attr-name\">class</span><span class=\"token attr-value\"><span class=\"token punctuation attr-equals\">=</span><span class=\"token punctuation\">\"</span>mb-2<span class=\"token punctuation\">\"</span></span><span class=\"token punctuation\">&gt;</span></span>{{ $post-&gt;title }}<span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;/</span>h2</span><span class=\"token punctuation\">&gt;</span></span>\r\n                <span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;/</span>div</span><span class=\"token punctuation\">&gt;</span></span>\r\n            <span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;/</span>div</span><span class=\"token punctuation\">&gt;</span></span>\r\n        <span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;/</span>div</span><span class=\"token punctuation\">&gt;</span></span>\r\n    <span class=\"token tag\"><span class=\"token tag\"><span class=\"token punctuation\">&lt;/</span>div</span><span class=\"token punctuation\">&gt;</span></span><span class=\"token comment\">&lt;!--/vine-header--&gt;</span></code></pre><p><br><br></p><p><br></p>', 1, 0, '2023-09-08 06:29:29', '2023-09-08 06:29:29'),
(6, 6, 4, '<p>A Great Country&nbsp;</p><p><img src=\"https://media4.giphy.com/media/2A6vxsQHRZDSsUzxmj/giphy-downsized.gif?cid=a51c33e6lohrkv2051dsllaho304x632enr6cll3a0ubkze4&amp;ep=v1_gifs_search&amp;rid=giphy-downsized.gif&amp;ct=g\" alt=\"GIF by World Rugby\"><br></p>', 1, 0, '2023-09-09 12:43:42', '2023-09-09 12:43:42'),
(7, 8, 10, '<p><img src=\"https://media4.giphy.com/media/3gL6gRQkBuacohnQfp/giphy.gif?cid=a51c33e6zmhefgvzj1rqpdg9rotlw6fexs3sxjxflpk86h49&amp;ep=v1_gifs_trending&amp;rid=giphy.gif&amp;ct=g\" alt=\"Hope Lol GIF\"></p><p><br></p><p>Indeed I Prayed</p>', 1, 0, '2023-09-25 11:35:26', '2023-09-25 12:28:28'),
(8, 9, 9, '<p><img src=\"https://media1.giphy.com/media/FwKsctbw412x7VRbyg/giphy.gif?cid=a51c33e6q9wsmw5s3olwnop194qlfa74iqvhti44nsvfmb8f&amp;ep=v1_gifs_trending&amp;rid=giphy.gif&amp;ct=g\" alt=\"Animation Watching GIF by Holler Studios\"></p>', 1, 0, '2023-10-06 11:34:07', '2023-10-06 11:34:07'),
(9, 9, 1, '<p><img src=\"https://media3.giphy.com/media/6Q3M4BIK0lX44/giphy-downsized.gif?cid=a51c33e6fs5o8t1zmusc782vy2hgr14ap7o1t2ps8na98l65&amp;ep=v1_gifs_trending&amp;rid=giphy-downsized.gif&amp;ct=g\" alt=\"Interview Crying GIF\"></p>', 1, 0, '2023-10-07 11:48:03', '2023-10-07 11:48:03'),
(10, 13, 14, '<p>Definitely a Great individual</p><p><br></p><p><img src=\"https://media3.giphy.com/media/xUOrw4tlQfCTGmD5Kw/giphy-downsized.gif?cid=a51c33e6c9re6naq9vsqffzr5ffese2xkfuhl03oiy5f1mhw&ep=v1_gifs_trending&rid=giphy-downsized.gif&ct=g\" alt=\"Happy Birthday GIF by Late Night with Seth Meyers\"><br></p>', 1, 0, '2023-11-13 08:04:34', '2023-11-18 12:35:24'),
(11, 15, 12, '<p>Whats the name of the Product we make money also</p><p><br></p><p><img src=\"https://media0.giphy.com/media/REoJU89DSsTAH4pUpr/giphy-downsized.gif?cid=a51c33e6wi4hobmrop58qk2ji74w714ak1ihivi75cxk3bsw&ep=v1_gifs_trending&rid=giphy-downsized.gif&ct=g\" alt=\"Big Cat Cats GIF by Nature on PBS\"><br></p>', 1, 0, '2023-11-20 14:48:17', '2023-11-20 14:48:17'),
(12, 14, 13, '<p>I will have to check this out.</p><p><img src=\"https://media1.giphy.com/media/CxfGyx9jGNkUJuKVvT/giphy.gif?cid=a51c33e6wi4hobmrop58qk2ji74w714ak1ihivi75cxk3bsw&ep=v1_gifs_trending&rid=giphy.gif&ct=g\" alt=\"Jason Momoa Snl GIF by Saturday Night Live\"><br></p>', 1, 0, '2023-11-20 14:49:57', '2023-11-20 14:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deposit_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `gateway` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage_applied` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_fee` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `deposit_id`, `user_id`, `amount`, `gateway`, `image`, `percentage_applied`, `transaction_fee`, `status`, `created_at`, `updated_at`) VALUES
(2, '19X94429V51727614', 2, 20, 'PayPal', NULL, '5.4% + 0.30', '1.38', 1, '2023-10-19 12:11:35', '2023-10-19 12:11:35'),
(3, '0BL120358C5651622', 8, 10, 'PayPal', NULL, '5.4% + 0.30', '0.84', 1, '2023-10-19 12:18:04', '2023-10-19 12:18:04'),
(4, '56503106JB3420247', 8, 10, 'PayPal', NULL, '5.4% + 0.30', '0.84', 1, '2023-10-19 12:22:09', '2023-10-19 12:22:09'),
(5, '4J02632649903461S', 10, 5, 'PayPal', NULL, '5.4% + 0.30', '0.57', 1, '2023-10-19 12:23:49', '2023-10-19 12:23:49'),
(6, 'cs_test_a1mBtLUcodLq4fTYzwxAIWYHaS5JRu49criFzQxwm1KCZlqBCJ2Yk4Wojj', 2, 10, 'Stripe', NULL, '2.9% + 0.30', '0.59', 1, '2023-10-23 04:34:34', '2023-10-23 04:35:13'),
(8, 'cs_test_a1azNMPLCsL7URezhZW1K8wOLpMNX2n72IbMY2yAk2mhp5XoHGNls6eoYy', 3, 10, 'Stripe', NULL, '2.9% + 0.30', '0.59', 1, '2023-11-20 14:19:49', '2023-11-20 14:20:39'),
(9, 'cs_test_a16mVskcJqUwlorQZEkO0jUXf7bVpzZMMlFGeIVSgDGInbToPVqLjCCFqq', 6, 10, 'Stripe', NULL, '2.9% + 0.30', '0.59', 1, '2023-11-20 14:31:22', '2023-11-20 14:32:10');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `order`, `created_at`, `updated_at`) VALUES
(1, 'What is ApexForum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin luctus auctor elit vestibulum molestie. Sed vehicula risus vitae ornare mattis. Nulla pharetra mattis turpis eget condimentum.', 1, '2023-07-18 05:23:17', '2023-07-18 05:23:17'),
(2, 'Does it work with Wordpress?', 'Nunc duis id aenean gravida tincidunt eu, tempor ullamcorper. Viverra aliquam arcu, viverra et, cursus. Aliquet pretium cursus adipiscing gravida et consequat lobortis arcu velit. Nibh pharetra fermentum duis accumsan lectus non. Massa cursus molestie lorem scelerisque pellentesque. Nisi, enim, arcu purus gravida adipiscing euismod montes, duis egestas. Vehicula eu etiam quam tristique tincidunt suspendisse ut consequat.\r\n\r\nOrnare senectus fusce dignissim ut. Integer consequat in eu tortor, faucibus et lacinia posuere. Turpis sit viverra lorem suspendisse lacus aliquam auctor vulputate. Quis egestas aliquam nunc purus lacus, elit leo elit facilisi. Dignissim amet adipiscing massa integer.', 2, '2023-09-07 15:48:13', '2023-09-07 15:48:13'),
(3, 'Do I get free Updates?', 'Sed finibus nibh nibh, eu sodales lacus gravida in. Cras finibus urna felis, eget viverra nulla placerat at. Phasellus mollis eu elit nec tristique. Donec in efficitur metus. Proin tortor ante, vehicula eu rutrum in, bibendum vestibulum lectus. Ut id tempor ligula. Ut porta sodales tincidunt. Cras et nisl nunc. Phasellus scelerisque ultrices porta.', 3, '2023-09-07 15:59:23', '2023-09-07 15:59:23'),
(4, 'Will you provide Support?', 'Sed finibus nibh nibh, eu sodales lacus gravida in. Cras finibus urna felis, eget viverra nulla placerat at. Phasellus mollis eu elit nec tristique. Donec in efficitur metus. Proin tortor ante, vehicula eu rutrum in, bibendum vestibulum lectus. Ut id tempor ligula. Ut porta sodales tincidunt. Cras et nisl nunc. Phasellus scelerisque ultrices porta.', 4, '2023-09-07 15:59:58', '2023-09-07 15:59:58'),
(5, 'How do I cancel my Monthly Subscription?', 'Sed finibus nibh nibh, eu sodales lacus gravida in. Cras finibus urna felis, eget viverra nulla placerat at. Phasellus mollis eu elit nec tristique. Donec in efficitur metus. Proin tortor ante, vehicula eu rutrum in, bibendum vestibulum lectus. Ut id tempor ligula. Ut porta sodales tincidunt. Cras et nisl nunc. Phasellus scelerisque ultrices porta.', 5, '2023-09-07 16:00:35', '2023-09-07 16:00:35'),
(6, 'How do I request a Refund?', 'Sed finibus nibh nibh, eu sodales lacus gravida in. Cras finibus urna felis, eget viverra nulla placerat at. Phasellus mollis eu elit nec tristique. Donec in efficitur metus. Proin tortor ante, vehicula eu rutrum in, bibendum vestibulum lectus. Ut id tempor ligula. Ut porta sodales tincidunt. Cras et nisl nunc. Phasellus scelerisque ultrices porta.', 6, '2023-09-07 16:01:12', '2023-09-07 16:01:12'),
(7, 'Where can I get my ApexForum License?', 'Sed finibus nibh nibh, eu sodales lacus gravida in. Cras finibus urna felis, eget viverra nulla placerat at. Phasellus mollis eu elit nec tristique. Donec in efficitur metus. Proin tortor ante, vehicula eu rutrum in, bibendum vestibulum lectus. Ut id tempor ligula. Ut porta sodales tincidunt. Cras et nisl nunc. Phasellus scelerisque ultrices porta.', 7, '2023-09-07 16:01:52', '2023-09-07 16:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'user_id',
  `favoriteable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favoriteable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `favoriteable_type`, `favoriteable_id`, `created_at`, `updated_at`) VALUES
(2, 8, 'App\\Models\\Posts', 3, '2023-09-15 15:16:48', '2023-09-15 15:16:48'),
(3, 9, 'App\\Models\\Posts', 9, '2023-10-06 12:48:18', '2023-10-06 12:48:18'),
(4, 2, 'App\\Models\\Posts', 9, '2023-11-16 09:43:42', '2023-11-16 09:43:42'),
(6, 2, 'App\\Models\\Posts', 10, '2023-11-16 09:44:01', '2023-11-16 09:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `followables`
--

CREATE TABLE `followables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'user_id',
  `followable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `followable_id` bigint(20) UNSIGNED NOT NULL,
  `accepted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followables`
--

INSERT INTO `followables` (`id`, `user_id`, `followable_type`, `followable_id`, `accepted_at`, `created_at`, `updated_at`) VALUES
(9, 7, 'App\\Models\\User', 6, '2023-09-15 10:21:01', '2023-09-15 10:21:01', '2023-09-15 10:21:01'),
(11, 7, 'App\\Models\\User', 8, '2023-09-15 13:41:45', '2023-09-15 13:41:45', '2023-09-15 13:41:45'),
(12, 7, 'App\\Models\\User', 5, '2023-09-15 13:42:37', '2023-09-15 13:42:37', '2023-09-15 13:42:37'),
(13, 8, 'App\\Models\\User', 6, '2023-09-15 13:49:57', '2023-09-15 13:49:57', '2023-09-15 13:49:57'),
(14, 8, 'App\\Models\\User', 2, '2023-09-15 14:39:22', '2023-09-15 14:39:22', '2023-09-15 14:39:22'),
(15, 8, 'App\\Models\\User', 5, '2023-09-15 14:44:24', '2023-09-15 14:44:24', '2023-09-15 14:44:24'),
(16, 8, 'App\\Models\\User', 7, '2023-09-15 16:12:21', '2023-09-15 16:12:21', '2023-09-15 16:12:21'),
(23, 1, 'App\\Models\\User', 2, '2023-09-23 14:12:09', '2023-09-23 14:12:09', '2023-09-23 14:12:09'),
(26, 2, 'App\\Models\\User', 5, '2023-09-23 17:48:14', '2023-09-23 17:48:14', '2023-09-23 17:48:14'),
(27, 2, 'App\\Models\\User', 4, '2023-09-23 19:11:29', '2023-09-23 19:11:29', '2023-09-23 19:11:29'),
(29, 5, 'App\\Models\\User', 7, '2023-09-24 17:26:59', '2023-09-24 17:26:59', '2023-09-24 17:26:59'),
(30, 5, 'App\\Models\\User', 2, '2023-09-24 17:41:22', '2023-09-24 17:41:22', '2023-09-24 17:41:22'),
(31, 10, 'App\\Models\\User', 5, '2023-09-25 12:25:03', '2023-09-25 12:25:03', '2023-09-25 12:25:03'),
(33, 10, 'App\\Models\\User', 8, '2023-09-25 12:25:31', '2023-09-25 12:25:31', '2023-09-25 12:25:31'),
(34, 10, 'App\\Models\\User', 4, '2023-09-25 12:34:09', '2023-09-25 12:34:09', '2023-09-25 12:34:09'),
(35, 5, 'App\\Models\\User', 10, '2023-09-25 12:35:06', '2023-09-25 12:35:06', '2023-09-25 12:35:06'),
(36, 1, 'App\\Models\\User', 8, '2023-09-26 11:04:43', '2023-09-26 11:04:43', '2023-09-26 11:04:43'),
(37, 9, 'App\\Models\\User', 10, '2023-10-06 11:35:02', '2023-10-06 11:35:02', '2023-10-06 11:35:02'),
(40, 1, 'App\\Models\\User', 4, '2023-10-07 13:13:26', '2023-10-07 13:13:26', '2023-10-07 13:13:26'),
(41, 10, 'App\\Models\\User', 9, '2023-10-11 12:20:19', '2023-10-11 12:20:19', '2023-10-11 12:20:19'),
(43, 13, 'App\\Models\\User', 7, '2023-10-25 10:51:43', '2023-10-25 10:51:43', '2023-10-25 10:51:43'),
(44, 13, 'App\\Models\\User', 2, '2023-10-25 10:52:00', '2023-10-25 10:52:00', '2023-10-25 10:52:00'),
(45, 2, 'App\\Models\\User', 13, '2023-11-02 17:14:36', '2023-11-02 17:14:36', '2023-11-02 17:14:36'),
(47, 2, 'App\\Models\\User', 8, '2023-11-18 06:50:06', '2023-11-18 06:50:06', '2023-11-18 06:50:06'),
(51, 8, 'App\\Models\\User', 12, '2024-01-18 08:38:39', '2024-01-18 08:38:39', '2024-01-18 08:38:39');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'user_id',
  `likeable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `likeable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `likeable_type`, `likeable_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'App\\Models\\Posts', 1, '2023-08-23 12:00:50', '2023-08-23 12:00:50'),
(2, 8, 'App\\Models\\Comments', 4, '2023-08-23 16:25:10', '2023-08-23 16:25:10'),
(3, 2, 'App\\Models\\Posts', 3, '2023-09-07 10:55:28', '2023-09-07 10:55:28'),
(4, 2, 'App\\Models\\Comments', 4, '2023-09-07 11:25:01', '2023-09-07 11:25:01'),
(6, 1, 'App\\Models\\Comments', 8, '2023-10-07 11:47:07', '2023-10-07 11:47:07'),
(7, 2, 'App\\Models\\Replies', 1, '2023-11-11 12:12:29', '2023-11-11 12:12:29'),
(8, 1, 'App\\Models\\Comments', 7, '2023-11-13 15:40:21', '2023-11-13 15:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_ext` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `chat_id`, `sender_id`, `message`, `attachment_name`, `file_ext`, `mime_type`, `seen`, `created_at`, `updated_at`) VALUES
(2, 2, 6, 'Hey just a Test 👍👍🙈', NULL, 'Text', NULL, '1', '2023-08-26 09:20:15', '2023-11-20 14:36:04'),
(4, 2, 7, 'Good and Perfect 😭😭', NULL, 'Text', NULL, '1', '2023-08-28 08:54:47', '2023-09-01 08:18:56'),
(7, 2, 7, '<img class=\'giffy mb-2\' src=\'https://media0.giphy.com/media/3ohhwfAa9rbXaZe86c/giphy-downsized.gif\' width=\'335\' height = \'280\'/>', NULL, 'Gif', NULL, '1', '2023-08-28 09:13:39', '2023-09-01 08:18:56'),
(10, 2, 7, 'Be Blessed', NULL, 'Text', NULL, '1', '2023-08-28 10:21:08', '2023-09-01 08:18:56'),
(12, 2, 7, 'Great Platform for a Great people.Making over $2000 per month.👌👌', NULL, 'Text', NULL, '1', '2023-08-28 12:06:53', '2023-09-01 08:18:56'),
(20, 2, 6, NULL, 'c29983c13d0f592460990a3c9a3f10c3_.mp4', 'Video', 'video/mp4', '1', '2023-08-28 16:13:38', '2023-11-20 14:36:04'),
(22, 2, 6, NULL, '77c3c511efd38c98f95459c3819ff826_.jpg', 'Image', 'image/jpeg', '1', '2023-08-28 16:17:08', '2023-11-20 14:36:04'),
(23, 2, 6, '😂😂😂😂😂', NULL, 'Text', NULL, '1', '2023-08-28 16:29:52', '2023-11-20 14:36:04'),
(28, 2, 7, '<img class=\'giffy mb-2\' src=\'https://media1.giphy.com/media/l3vR3EssQ5ALagr7y/giphy-downsized.gif?cid=a51c33e67cmgt28cj2rv87bag1ot7jxwzu091co9vovskm9m&ep=v1_gifs_search&rid=giphy-downsized.gif&ct=g\' width=\'335\' height = \'280\'/>', NULL, 'Gif', NULL, '1', '2023-08-29 06:23:57', '2023-09-01 08:18:56'),
(32, 2, 6, '<img class=\'giffy mb-2\' src=\'https://media4.giphy.com/media/l3V0lsGtTMSB5YNgc/giphy-downsized.gif?cid=a51c33e6thqaegw7ggt72a1h90sccpmozvsiloc2v86iur09&ep=v1_gifs_search&rid=giphy-downsized.gif&ct=g\' width=\'335\' height = \'280\'/>', NULL, 'Gif', NULL, '1', '2023-08-29 07:39:14', '2023-11-20 14:36:04'),
(36, 5, 7, '👌👌👌', NULL, 'Text', NULL, '1', '2023-08-29 12:38:49', '2023-11-23 16:37:02'),
(37, 5, 2, '<img class=\'giffy mb-2\' src=\'https://media3.giphy.com/media/Vef9tjGuPU3zafDaxy/giphy-downsized.gif?cid=a51c33e6wnepux00oguj4pw6buuquavfpgxq4y0i8dokz2zd&ep=v1_gifs_search&rid=giphy-downsized.gif&ct=g\' width=\'335\' height = \'280\'/>', NULL, 'Gif', NULL, '1', '2023-08-29 12:42:42', '2023-11-20 14:34:37'),
(38, 6, 6, 'Hi 👍', NULL, 'Text', NULL, '1', '2023-08-30 06:37:17', '2023-08-30 07:44:42'),
(39, 6, 8, 'Doing Great, how are you', NULL, 'Text', NULL, '1', '2023-08-30 06:50:30', '2023-09-01 08:10:21'),
(41, 5, 7, 'Yooh you are online..', NULL, 'Text', NULL, '1', '2023-08-30 16:07:14', '2023-11-23 16:37:02'),
(42, 2, 6, 'Great Meme', NULL, 'Text', NULL, '1', '2023-08-30 16:12:41', '2023-11-20 14:36:04'),
(43, 7, 7, 'Hi 👍', NULL, 'Text', NULL, '2', '2023-08-30 16:14:30', '2023-08-30 16:14:30'),
(45, 8, 5, 'Hi 👍', NULL, 'Text', NULL, '1', '2023-09-01 07:56:57', '2023-11-20 14:34:16'),
(49, 9, 4, 'Hey yo Maah 🙈🙈', NULL, 'Text', NULL, '2', '2023-09-06 05:59:36', '2023-09-06 05:59:36'),
(51, 11, 4, '😭😭😭😂', NULL, 'Text', NULL, '2', '2023-09-09 11:39:18', '2023-09-09 11:39:18'),
(52, 12, 2, '😊😊😊😊 working', NULL, 'Text', NULL, '2', '2023-09-12 13:45:47', '2023-09-12 13:45:47'),
(53, 13, 7, 'Hey its Working Pale 👌👌👍👍😍😍😔😔😊😊☺️☺️', NULL, 'Text', NULL, '1', '2023-09-15 05:53:30', '2023-11-20 14:23:00'),
(54, 14, 9, 'Hi 👍', NULL, 'Text', NULL, '1', '2023-10-06 12:13:58', '2023-11-20 14:44:53'),
(56, 5, 2, '<img class=\'giffy mb-2\' src=\'https://media4.giphy.com/media/l41lZccR1oUigYeNa/giphy.gif?cid=a51c33e6336zy1vkq2f7gc3kzmb225wfm1pd7kpc51xwu12x&ep=v1_gifs_search&rid=giphy.gif&ct=g\' width=\'335\' height = \'280\'/>', NULL, 'Gif', NULL, '1', '2023-11-16 08:22:02', '2023-11-20 14:34:37'),
(57, 14, 9, '<img class=\'giffy mb-2\' src=\'https://media4.giphy.com/media/QWw4hc5gTnJhY0BUI3/giphy.gif?cid=a51c33e6nwrhwwwhe4uy12zrgiijyp6e6m4ocfpszd6llcae&ep=v1_gifs_search&rid=giphy.gif&ct=g\' width=\'335\' height = \'280\'/>', NULL, 'Gif', NULL, '1', '2023-11-20 14:40:12', '2023-11-20 14:44:53');

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
(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2022_11_01_124243_create_settings', 2),
(12, '2022_11_18_130935_create_pages_table', 2),
(14, '2023_07_14_082128_create_badges', 3),
(18, '2014_10_12_000000_create_users_table', 4),
(19, '2022_11_18_063248_create_categories_table', 5),
(20, '2022_11_22_133317_create_faqs_table', 5),
(21, '2014_01_07_073615_create_tagged_table', 6),
(22, '2014_01_07_073615_create_tags_table', 6),
(23, '2016_06_29_073615_create_tag_groups_table', 6),
(24, '2016_06_29_073615_update_tags_table', 6),
(25, '2020_03_13_083515_add_description_to_tags_table', 6),
(35, '2018_12_14_000000_create_likes_table', 9),
(49, '2023_08_01_141100_create_posts_views_table', 12),
(52, '2018_12_14_000000_create_favorites_table', 14),
(53, '2023_08_11_141020_create_reports_table', 15),
(55, '2023_08_11_160942_create_shares_table', 16),
(56, '2018_07_10_000000_create_reactions_table', 17),
(57, '2023_08_07_154847_create_notifications_table', 18),
(58, '2023_07_31_131628_create_points_table', 19),
(62, '2023_07_19_071751_create_posts_table', 20),
(63, '2023_07_19_184009_create_comments_table', 20),
(64, '2023_07_19_191009_create_replies_table', 20),
(65, '2023_08_25_183554_create_chats_table', 21),
(66, '2023_08_25_183614_create_messages_table', 21),
(67, '2022_05_02_000000_create_followables_table', 22),
(68, '2023_09_23_115307_create_user_views_table', 23),
(69, '2023_10_19_075318_create_deposits_table', 24),
(74, '2023_10_23_080714_create_plans_table', 25),
(78, '2023_10_24_095435_create_subscriptions_table', 26),
(79, '2023_10_27_082927_create_transactions_table', 27),
(80, '2023_10_27_085347_create_buy_points_table', 28),
(81, '2023_11_02_172801_create_payments_table', 29),
(84, '2023_11_03_085139_create_withdraws_table', 30),
(85, '2023_11_13_113800_create_ban_durations_table', 31),
(86, '2023_11_13_124534_create_report_users_table', 32),
(87, '2017_03_04_000000_create_bans_table', 33),
(88, '2023_11_16_083936_create_blocks_table', 34),
(89, '2023_11_19_100826_create_roles_table', 35);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `recipient_id` bigint(20) UNSIGNED NOT NULL,
  `notification_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `like_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `react_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `following_id` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `tip_id` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `seen` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sender_id`, `recipient_id`, `notification_type`, `post_id`, `like_id`, `comment_id`, `reply_id`, `react_id`, `following_id`, `tip_id`, `seen`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 'React Post', 1, NULL, NULL, NULL, '2', NULL, NULL, '1', '2023-08-23 11:46:30', '2023-11-21 08:37:59'),
(3, 8, 2, 'Comment', 2, NULL, '4', NULL, NULL, NULL, NULL, '1', '2023-08-23 15:42:22', '2023-11-21 08:37:59'),
(4, 2, 8, 'Reply', 2, NULL, NULL, '2', NULL, NULL, NULL, '1', '2023-08-23 16:10:34', '2023-10-19 15:56:40'),
(5, 8, 2, 'React Post', 2, NULL, NULL, NULL, '5', NULL, NULL, '1', '2023-08-23 16:25:27', '2023-11-21 08:37:59'),
(12, 7, 2, 'React Post', 3, NULL, NULL, NULL, '12', NULL, NULL, '1', '2023-08-30 18:38:21', '2023-11-21 08:37:59'),
(15, 6, 2, 'React Post', 2, NULL, NULL, NULL, '15', NULL, NULL, '1', '2023-09-01 08:39:46', '2023-11-21 08:37:59'),
(17, 2, 8, 'Like Comment', 2, '4', NULL, NULL, NULL, NULL, NULL, '1', '2023-09-07 11:25:01', '2023-10-19 15:56:40'),
(20, 4, 5, 'Comment', 6, NULL, '6', NULL, NULL, NULL, NULL, '1', '2023-09-09 12:43:42', '2023-12-14 10:21:08'),
(24, 1, 2, 'Following User', NULL, NULL, NULL, NULL, NULL, '23', NULL, '1', '2023-09-23 14:12:10', '2023-11-21 08:37:59'),
(28, 2, 4, 'React Post', 7, NULL, NULL, NULL, '20', NULL, NULL, '1', '2023-09-23 19:04:15', '2023-11-20 14:23:11'),
(32, 5, 2, 'Following User', NULL, NULL, NULL, NULL, NULL, '29', NULL, '1', '2023-09-24 17:41:22', '2023-11-21 08:37:59'),
(38, 5, 10, 'Following User', NULL, NULL, NULL, NULL, NULL, '29', NULL, '1', '2023-09-25 12:35:06', '2023-11-20 14:44:49'),
(39, 1, 8, 'Following User', NULL, NULL, NULL, NULL, NULL, '23', NULL, '1', '2023-09-26 11:04:44', '2023-10-19 15:56:40'),
(40, 9, 10, 'React Post', 9, NULL, NULL, NULL, '23', NULL, NULL, '1', '2023-10-06 11:32:14', '2023-11-20 14:44:49'),
(41, 9, 2, 'React Post', 2, NULL, NULL, NULL, '24', NULL, NULL, '1', '2023-10-06 11:32:27', '2023-11-21 08:37:59'),
(42, 9, 10, 'Comment', 9, NULL, '8', NULL, NULL, NULL, NULL, '1', '2023-10-06 11:34:07', '2023-11-20 14:44:49'),
(46, 9, 2, 'React Post', 1, NULL, NULL, NULL, '25', NULL, NULL, '1', '2023-10-06 12:24:38', '2023-11-21 08:37:59'),
(47, 1, 10, 'React Post', 9, NULL, NULL, NULL, '26', NULL, NULL, '1', '2023-10-07 10:43:14', '2023-11-20 14:44:49'),
(49, 1, 9, 'Like Comment', 9, '6', NULL, NULL, NULL, NULL, NULL, '1', '2023-10-07 11:47:08', '2023-10-11 12:37:43'),
(50, 1, 10, 'Comment', 9, NULL, '9', NULL, NULL, NULL, NULL, '1', '2023-10-07 11:48:03', '2023-11-20 14:44:49'),
(51, 1, 4, 'Following User', NULL, NULL, NULL, NULL, NULL, '23', NULL, '1', '2023-10-07 13:13:26', '2023-11-20 14:23:11'),
(52, 10, 9, 'Following User', NULL, NULL, NULL, NULL, NULL, '31', NULL, '1', '2023-10-11 12:20:19', '2023-10-11 12:37:43'),
(57, 2, 12, 'Tip', NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '2023-11-02 15:10:33', '2023-11-07 08:10:05'),
(59, 2, 12, 'Tip', NULL, NULL, NULL, NULL, NULL, NULL, '2', '1', '2023-11-07 08:08:07', '2023-11-07 08:10:05'),
(60, 1, 10, 'Like Comment', 8, '8', NULL, NULL, NULL, NULL, NULL, '1', '2023-11-13 15:40:21', '2023-11-20 14:44:49'),
(66, 1, 2, 'Reply', 1, NULL, NULL, '3', NULL, NULL, NULL, '1', '2023-11-19 06:50:13', '2023-11-21 08:37:59'),
(67, 1, 2, 'React Post', 3, NULL, NULL, NULL, '28', NULL, NULL, '1', '2023-11-20 13:57:17', '2023-11-21 08:37:59'),
(68, 3, 4, 'Tip', NULL, NULL, NULL, NULL, NULL, NULL, '3', '1', '2023-11-20 14:21:36', '2023-11-20 14:23:11'),
(69, 8, 2, 'Tip', NULL, NULL, NULL, NULL, NULL, NULL, '4', '1', '2023-11-20 14:38:18', '2023-11-21 08:37:59'),
(70, 12, 1, 'Reply', 9, NULL, NULL, '4', NULL, NULL, NULL, '1', '2023-11-20 14:47:02', '2023-11-21 11:14:09'),
(71, 12, 9, 'Comment', 15, NULL, '11', NULL, NULL, NULL, NULL, '2', '2023-11-20 14:48:17', '2023-11-20 14:48:17'),
(72, 13, 6, 'Comment', 14, NULL, '12', NULL, NULL, NULL, NULL, '2', '2023-11-20 14:49:57', '2023-11-20 14:49:57'),
(73, 8, 12, 'Following User', NULL, NULL, NULL, NULL, NULL, '13', NULL, '2', '2024-01-18 08:38:39', '2024-01-18 08:38:39');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `meta_title`, `meta_keywords`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About', 'about', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ipsum ante, pretium non nibh cursus, tempor ornare urna. Vestibulum ultricies velit nec diam pretium rhoncus. Etiam sagittis, lorem eu scelerisque venenatis, lectus felis vehicula justo, ac vulputate sem felis laoreet ante. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum vitae ornare sem, eget commodo libero. Aliquam nisi risus, congue a orci sed, blandit pharetra lectus. Vivamus nec nibh a leo elementum consectetur eget ut turpis. Curabitur egestas erat at ornare tincidunt. Ut augue ex, iaculis a augue ac, dignissim tempor nisl. Nulla in finibus risus, nec fringilla ligula. Proin ac elit sollicitudin purus lacinia posuere. In ornare mauris non purus faucibus, sed lacinia diam euismod. Vivamus suscipit sem vel mauris sagittis scelerisque.\r\n</p><p>\r\n</p><p><br></p><p>Aliquam odio turpis, scelerisque quis mauris et, molestie hendrerit ex. Nunc laoreet libero a nibh vehicula, ut commodo arcu sagittis. Vivamus at mauris in justo consequat convallis accumsan et felis. Pellentesque mattis dui massa, et consectetur lectus lobortis non. Pellentesque suscipit aliquet pulvinar. Fusce egestas sapien sed euismod vestibulum. Nullam at sapien in leo suscipit finibus eu sit amet risus. Maecenas euismod, sem ut convallis elementum, enim orci semper dolor, at sagittis tortor justo vitae tellus. Nullam accumsan consequat elit eget tempor. Vivamus non massa volutpat, porta orci at, fermentum dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;\r\n</p><p>\r\n</p><p><br></p><p>Sed finibus nibh nibh, eu sodales lacus gravida in. Cras finibus urna felis, eget viverra nulla placerat at. Phasellus mollis eu elit nec tristique. Donec in efficitur metus. Proin tortor ante, vehicula eu rutrum in, bibendum vestibulum lectus. Ut id tempor ligula. Ut porta sodales tincidunt. Cras et nisl nunc. Phasellus scelerisque ultrices porta.\r\n</p><p><br></p><p>In vitae tortor facilisis, condimentum nulla quis, molestie urna. Cras in justo non est condimentum scelerisque. Pellentesque vestibulum magna ex, id finibus felis lobortis ac. Aenean et ex augue. Maecenas sagittis felis eu ullamcorper imperdiet. Pellentesque non tortor id libero placerat dignissim. Praesent feugiat, ligula vel varius euismod, nisl ex posuere tellus, id ultrices neque sem et orci. Duis mattis nunc vel ligula lobortis convallis. Sed a gravida turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent faucibus hendrerit lorem, ut volutpat tellus imperdiet eu.\r\n</p><p><br></p><p>Phasellus imperdiet commodo orci, sed auctor nisl vehicula ac. Nulla facilisi. Duis urna libero, lobortis id orci vitae, congue gravida risus. Donec vitae nisi ut justo facilisis blandit sit amet eleifend tortor. Cras dui urna, gravida sit amet viverra non, egestas a nisl. Nunc blandit ex a tortor luctus, sit amet facilisis arcu porta. Morbi massa nibh, ultrices iaculis elit placerat, ullamcorper interdum arcu. Aenean nec dui mollis, vehicula libero non, facilisis elit.</p><p><br></p><p><img src=\"https://media4.giphy.com/media/BYoRqTmcgzHcL9TCy1/giphy.gif?cid=a51c33e69pr6fh9kyiry30lbqg512c58f4ykolubi9pxtj0r&amp;ep=v1_gifs_trending&amp;rid=giphy.gif&amp;ct=g\" alt=\"Baby Thank You GIF\"></p>', 'About', 'about', 'Sed finibus nibh nibh, eu sodales lacus gravida in. Cras finibus urna felis, eget viverra nulla placerat at. Phasellus mollis eu elit nec tristique. Donec in efficitur metus.', 1, '2023-09-07 14:59:36', '2023-09-07 15:01:54'),
(2, 'Community Rules', 'community-rules', '<h3>Welcome to ApexForum!</h3><p>This is a great Laravel Script Forum Platform for Brands, Businesses and Creators; can use this Script to build their thriving community and get loyal users plus also generate money using this Script.</p><p><br></p><h4>Userbase\r\n</h4><p>Vivamus non massa volutpat, porta orci at, fermentum dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae<br></p><p><br></p><h4><span style=\"text-align: var(--bs-body-text-align); display: inline !important;\">Rules</span></h4><p><span style=\"text-align: var(--bs-body-text-align); display: inline !important;\">Do not:</span></p><ul><li><span style=\"text-align: var(--bs-body-text-align); display: inline !important;\">Post private PMs or information of other users</span></li><li><span style=\"text-align: var(--bs-body-text-align); display: inline !important;\">Doxing or threatening to dox someone is prohibited, applies to users outside the community as well.</span></li><li><span style=\"text-align: var(--bs-body-text-align); display: inline !important;\">Mass-tag users</span></li><li><span style=\"text-align: var(--bs-body-text-align); display: inline !important;\">Spam</span></li><li><span style=\"text-align: var(--bs-body-text-align); display: inline !important;\">Racebait</span></li><li><span style=\"text-align: var(--bs-body-text-align); display: inline !important;\">Impersonate</span></li><li><span style=\"text-align: var(--bs-body-text-align); display: inline !important;\">Advertise (without permission)</span></li><li><span style=\"text-align: var(--bs-body-text-align); display: inline !important;\">Post low-effort or LBGTQ content</span></li><li><span style=\"text-align: var(--bs-body-text-align); display: inline !important;\">Low-effort content may only be posted in the Off topic section.</span></li><li>Do not post on old threads over one (1) month old unless you have a good reason to do so</li><li>\"Bumps\", one-liners, mere quoting, and plain agreement are not good reasons\r\n</li><li>Post illegal content or incite anyone to commit illegal acts of any kind (If in doubt, don\'t post)\r\n</li><li>Create more than one (1) account or share your account\r\n</li><li>Creating more than one account will result in you being banned all of the accounts you created\r\n</li><li>Post on the behalf of banned users.\r\n</li></ul><p><br></p><p>Other\r\n</p><p>Ratings belong exclusively to the ratings subforum.\r\n</p><p>You cannot delete rating threads or pictures within them unless you\'re a VIP Supporter (check FAQ below).\r\n</p><p>Use a [NSFW] and spoiler tags whenever needed.\r\n</p><p>Don\'t post things such as gore or pornography in random threads.\r\n</p><p><br></p><p>Mod Abuse:\r\n</p><p>If you have any questions or concerns about a warning or ban, please message @Alexanderr, @Administrator, or @Master\r\n</p><p><br></p><p>Banned Users:\r\n</p><p>Rules for users who are banned are explained here.\r\n</p><p>Do not try to circumvent the rules, mods can warn at their discretion. Please read our privacy policy and terms of service. By using this site you agree to all our policies and rules.\r\n</p><p><br></p><p>Disclaimer:\r\n</p><p>This is a public discussion forum. The owners, staff, and users of this website are not engaged in rendering professional services to the individual reader. Do not use the content of this website as an alternative to personal examination and advice from licenced healthcare providers. Do not begin, delay, or discontinue treatments and/or exercises without licenced medical supervision.\r\n</p><p><br></p><p>Frequently Asked Questions\r\n</p><p>I have a serious inquiry or wish to advertise, where can I reach you?\r\n</p><p>Please use the contact feature at the bottom of the site.\r\n</p><p>How do I keep up with forum news ?\r\n</p><p>Besides checking the News &amp; Announcement subforum, you can...\r\n</p><p>Check our Twitter: https://twitter.com/Looksmaxme\r\n</p><p>Check our Instagram: https://www.instagram.com/looksmaxorg/\r\n</p><p>Join our Discord: https://discord.gg/PNpdyP57HX\r\n</p><p>How can I get VIP? What benefits does VIP have?\r\n</p><p>Read this thread. You can get VIP by clicking here.\r\n</p><p><br></p><p>What is reputation?\r\n</p><p>Reputation is shown under your user, and in your user profile page. When someone \"likes\" your post or gives you any other type of reaction (minus anger), you will receive +1 reputation. The more you post and the more quality your posts have, the more reputation you\'ll get.\r\n</p><p><br></p><p>What are trophies?\r\n</p><p>They are silly badges you get for doing certain things on the forum. They don\'t give you anything, it\'s just for you to prove just how handsome and cool you are.\r\n</p><p>How do I change the theme of the site?\r\n</p><p>There is a button at the bottom left of the page for that.\r\n</p><p><br></p><p>When will I be able to send PMs/vote in polls?\r\n</p><p>If you are active, you\'ll be permitted to do these things automatically. It\'s a spam-prevention measure, be patient.\r\n</p><p><br></p><p>How do the ranks work?\r\n</p><p>For every 500 posts, your rank changes. Note that for each rank you need to have been registered one extra week on the site. This is so spamming to skip ranks isn\'t possible. You can see all of the ranks on the member\'s section sidebar.\r\n</p><p>If you have the post count and the registered time required, be patient. The \'upgrade\' process runs every couple hours.\r\n</p><p>You can also get yourself a VIP rank for a special color, alongside other perks.\r\n</p><p>How do I change the tag under my username, my privacy settings, or my alert preferences?\r\n</p><p>You can go to the preference page in your profile.\r\n</p><p><br></p><p>Can I block/ignore a user?\r\n</p><p>Yes. Click on their username. Then you can click the \"ignore\" button.\r\n</p><p><br></p><p>Can I edit/delete my posts and threads?\r\n</p><p>You have a 4-hour window to edit/delete posts.\r\n</p><p>You have a 4-hour window to edit threads, but you are unable to delete them. The reason is that good discussions are sometimes lost when threads are deleted. You can always ask a moderator to remove content if you need something removed, but note we do not mass delete content.\r\n</p><p>Rating threads can typically not be deleted, unless you get upgrade to a VIP rank.\r\n</p><p><br></p><p>Can I change my username?\r\n</p><p>Yes, if you upgrade your account. You can\'t create a new account to get a new name, we only allow one account per user.\r\n</p><p><br></p><p>Can I delete my account?\r\n</p><p>Yes, you can. Check this thread. If you want a more temporary type of ban (say, to focus on studying or taking a break from the site) PM a moderator to get a voluntary ban, and then PM them again to be unbanned, we don\'t mind. We do not mass delete content.\r\n</p><p>I deleted my account. Can I make a new one?\r\n</p><p><br></p><p>Yes, but not immediately. Read this thread.\r\n</p><p>Can I delete my private messages?\r\n</p><p>Yes, at any time. However, the only way to do it is if everyone in the conversation (you and the other person you\'re talking to) leave it. There is a button for that, look around in the conversation page. We can\'t delete private messages for you, so be careful what you share.\r\n</p><p><br></p><p>How do I get alerts from a thread?\r\n</p><p>On the top right of every thread, there\'s a button that says \"Watch.\" If you want to watch a particular thread without having to post, click that button. By changing your alert preferences, you can automatically watch threads after you post in a thread or after you create a thread.\r\n</p><p><br></p><p>How do warnings work?\r\n</p><p>Warnings you get are active in your profile for only one month by default and can be seen only by moderators. Active warnings will add up, and if your warnings total 60% or more, you will get a temporary ban (up to 4 days). At 100%, you will be permanently banned. To know your warning level, add up each warning PM you have received over the last month. Note that a mod may make your warnings last longer (e.g., 2 months or more) if they feel you have been ignoring previous warnings sent to you.\r\n</p><p><br></p><p>How can I stay safe online?\r\n</p><p>The same way you do anywhere else: Don\'t post personal information (real name, address, phone, email, pictures, etc), unless you are comfortable exposing that information to the whole internet. You can use a vpn as well when posting. In short, don\'t post anything that can tie your real identity to your identity here, and of course don\'t post anything illegal.\r\n</p><p><br></p><p>Why was X user warned/banned?\r\n</p><p>Warnings are personal, so we do not publicly announce reasons for warnings or bans. You are free to PM the user in question and ask them yourself.</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p>', 'Community Rules', 'rules', 'Community Rules', 1, '2023-09-07 15:26:06', '2023-09-07 15:30:36'),
(3, 'Privacy Policy', 'privacy-policy', '<h3>1. Terms\n</h3><p>This website, https://example.com, is operated by Company A. Throughout the site, the terms “we”, “us” and “our” refer to Company A. We offer this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.\n</p><p>By visiting our site and/ or purchasing something from us, you engage in our “Service” and agree to be bound by the following terms and conditions (“Terms of Service”, “Terms”), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply  to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content.\n</p><p>Please read these Terms of Service carefully before accessing or using our website. By accessing or using any part of the site, you agree to be bound by these Terms of Service. If you do not agree to all the terms and conditions of this agreement, then you may not access the website or use any services. If these Terms of Service are considered an offer, acceptance is expressly limited to these Terms of Service.\n</p><p>The materials contained in this website are protected by applicable copyright and trademark law.\n</p><p><br></p><p><h3><span style=\"text-align: var(--bs-body-text-align); display: inline !important;\">2. Licenses</span></h3><ul><li>Eu incididunt proident commodo occaecat commodo occaecat eiusmod ex qui et. Culpa esse do laborum elit commodo cupidatat veniam consequat ut nostrud non ut ea proident. Fugiat eu magna sint ea fugiat commodo ad duis excepteur.\n</li><li>Ex mollit id dolore commodo do. Do incididunt aute ipsum eiusmod cillum occaecat et ut voluptate aliquip occaecat consequat laborum id. Consectetur fugiat sit do culpa. Consequat esse sunt esse reprehenderit commodo nisi amet Lorem nulla enim enim eiusmod nulla.\n</li><li>This license shall automatically terminate if you violate any of these restrictions and may be terminated by Company A at any time.\n</li><li>Our order process is conducted by our online reseller Paddle.com. Paddle.com is the Merchant of Record for all our orders. Paddle provides all customer service inquiries and handles returns.\n</li></ul></p><p><br></p><h3>3. Intellectual Property\n</h3><p>Qui laboris cillum nisi nisi reprehenderit fugiat quis in ipsum irure fugiat. In duis cillum exercitation magna non nisi cillum. Ex in nostrud proident velit eiusmod commodo consequat incididunt deserunt quis sit proident qui ut. Proident do do in ipsum ipsum veniam excepteur velit pariatur veniam consectetur do elit. Pariatur aliquip aute mollit nisi aute anim voluptate tempor culpa sunt eu fugiat sint aliquip.\n</p><p><br></p><h3>4. Disclaimer\n</h3><p>Mollit sit officia dolore reprehenderit in elit ad excepteur irure tempor minim. Laborum nulla nulla aliqua sit qui pariatur ullamco occaecat cillum do. Sit laborum laboris voluptate qui nostrud nulla quis elit sunt amet magna. Deserunt adipisicing culpa ut nostrud laboris exercitation cupidatat aute. Amet sunt nisi magna dolore reprehenderit quis reprehenderit quis eu ex incididunt ullamco elit.\n</p><p>Aliqua eiusmod non consectetur non fugiat. Lorem duis aute non eu quis do labore proident laborum reprehenderit nisi minim. Commodo aute proident do eiusmod dolor et officia voluptate proident eiusmod. Cupidatat ex ipsum reprehenderit ullamco qui ex sit nisi esse Lorem. Sunt adipisicing tempor aliqua anim dolor tempor adipisicing ipsum irure do. Ex labore deserunt cupidatat ipsum ipsum aute et sint enim labore in qui ad occaecat. Cillum velit exercitation minim nulla laborum dolore ea velit id enim esse duis.\n</p><p><br></p><h3>5. Limitations\n</h3><p>Sint ut ut duis esse enim ea aute ut nostrud. Eiusmod ea do dolor velit Lorem ut commodo ea elit ea consectetur aliquip aute. Eiusmod mollit consequat aute esse eu dolore nostrud nisi esse duis cupidatat. Consequat laborum laborum esse est duis est id anim magna magna cupidatat veniam. Officia labore cupidatat quis irure cupidatat do nisi est. In labore ut enim non Lorem cupidatat officia. Consequat proident dolore anim minim proident officia excepteur aliquip magna non labore officia excepteur.\n</p><p><br></p><h3>6. Accuracy of materials\n</h3><p>Magna commodo ut est aliquip amet reprehenderit est incididunt laboris. Laborum non ullamco in in quis ipsum exercitation occaecat laboris. Culpa ex ex sit pariatur enim magna officia esse laboris ad dolore.\n</p><p><br></p><h3>7. Links\n</h3><p>Anim esse Lorem nostrud consequat. Aute cupidatat duis deserunt reprehenderit consequat elit tempor. Ad mollit ad quis nulla id irure aliqua amet velit.\n</p><p><br></p><h3>8. Modifications\n</h3><p>Company A may revise these terms of service for its website at any time without notice. By using this website you are agreeing to be bound by the then current version of these terms of service.\n</p><p><br></p><h3>9. Governing Law\n</h3><p>These terms and conditions are governed by and construed in accordance with the laws of Czech Republic and you irrevocably submit to the exclusive jurisdiction of the courts in that State or location.</p><p>\n</p><p>\n</p><p>\n</p><p>\n</p><p>\n</p><p>\n</p><p>\n</p><p>\n</p><p>\n</p>', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 1, '2023-09-07 15:36:36', '2023-09-07 15:36:36'),
(4, 'Terms and Conditions', 'terms-and-conditions', '<h3>1. Terms\n</h3><p>This website, https://example.com, is operated by Company A. Throughout the site, the terms “we”, “us” and “our” refer to Company A. We offer this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.\n</p><p>By visiting our site and/ or purchasing something from us, you engage in our “Service” and agree to be bound by the following terms and conditions (“Terms of Service”, “Terms”), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply  to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content.\n</p><p>Please read these Terms of Service carefully before accessing or using our website. By accessing or using any part of the site, you agree to be bound by these Terms of Service. If you do not agree to all the terms and conditions of this agreement, then you may not access the website or use any services. If these Terms of Service are considered an offer, acceptance is expressly limited to these Terms of Service.\n</p><p>The materials contained in this website are protected by applicable copyright and trademark law.\n</p><p><br></p><p><h3><span style=\"text-align: var(--bs-body-text-align); display: inline !important;\">2. Licenses</span></h3><ul><li>Eu incididunt proident commodo occaecat commodo occaecat eiusmod ex qui et. Culpa esse do laborum elit commodo cupidatat veniam consequat ut nostrud non ut ea proident. Fugiat eu magna sint ea fugiat commodo ad duis excepteur.\n</li><li>Ex mollit id dolore commodo do. Do incididunt aute ipsum eiusmod cillum occaecat et ut voluptate aliquip occaecat consequat laborum id. Consectetur fugiat sit do culpa. Consequat esse sunt esse reprehenderit commodo nisi amet Lorem nulla enim enim eiusmod nulla.\n</li><li>This license shall automatically terminate if you violate any of these restrictions and may be terminated by Company A at any time.\n</li><li>Our order process is conducted by our online reseller Paddle.com. Paddle.com is the Merchant of Record for all our orders. Paddle provides all customer service inquiries and handles returns.\n</li></ul></p><p><br></p><h3>3. Intellectual Property\n</h3><p>Qui laboris cillum nisi nisi reprehenderit fugiat quis in ipsum irure fugiat. In duis cillum exercitation magna non nisi cillum. Ex in nostrud proident velit eiusmod commodo consequat incididunt deserunt quis sit proident qui ut. Proident do do in ipsum ipsum veniam excepteur velit pariatur veniam consectetur do elit. Pariatur aliquip aute mollit nisi aute anim voluptate tempor culpa sunt eu fugiat sint aliquip.\n</p><p><br></p><h3>4. Disclaimer\n</h3><p>Mollit sit officia dolore reprehenderit in elit ad excepteur irure tempor minim. Laborum nulla nulla aliqua sit qui pariatur ullamco occaecat cillum do. Sit laborum laboris voluptate qui nostrud nulla quis elit sunt amet magna. Deserunt adipisicing culpa ut nostrud laboris exercitation cupidatat aute. Amet sunt nisi magna dolore reprehenderit quis reprehenderit quis eu ex incididunt ullamco elit.\n</p><p>Aliqua eiusmod non consectetur non fugiat. Lorem duis aute non eu quis do labore proident laborum reprehenderit nisi minim. Commodo aute proident do eiusmod dolor et officia voluptate proident eiusmod. Cupidatat ex ipsum reprehenderit ullamco qui ex sit nisi esse Lorem. Sunt adipisicing tempor aliqua anim dolor tempor adipisicing ipsum irure do. Ex labore deserunt cupidatat ipsum ipsum aute et sint enim labore in qui ad occaecat. Cillum velit exercitation minim nulla laborum dolore ea velit id enim esse duis.\n</p><p><br></p><h3>5. Limitations\n</h3><p>Sint ut ut duis esse enim ea aute ut nostrud. Eiusmod ea do dolor velit Lorem ut commodo ea elit ea consectetur aliquip aute. Eiusmod mollit consequat aute esse eu dolore nostrud nisi esse duis cupidatat. Consequat laborum laborum esse est duis est id anim magna magna cupidatat veniam. Officia labore cupidatat quis irure cupidatat do nisi est. In labore ut enim non Lorem cupidatat officia. Consequat proident dolore anim minim proident officia excepteur aliquip magna non labore officia excepteur.\n</p><p><br></p><h3>6. Accuracy of materials\n</h3><p>Magna commodo ut est aliquip amet reprehenderit est incididunt laboris. Laborum non ullamco in in quis ipsum exercitation occaecat laboris. Culpa ex ex sit pariatur enim magna officia esse laboris ad dolore.\n</p><p><br></p><h3>7. Links\n</h3><p>Anim esse Lorem nostrud consequat. Aute cupidatat duis deserunt reprehenderit consequat elit tempor. Ad mollit ad quis nulla id irure aliqua amet velit.\n</p><p><br></p><h3>8. Modifications\n</h3><p>Company A may revise these terms of service for its website at any time without notice. By using this website you are agreeing to be bound by the then current version of these terms of service.\n</p><p><br></p><h3>9. Governing Law\n</h3><p>These terms and conditions are governed by and construed in accordance with the laws of Czech Republic and you irrevocably submit to the exclusive jurisdiction of the courts in that State or location.</p><p>\n</p><p>\n</p><p>\n</p><p>\n</p><p>\n</p><p>\n</p><p>\n</p><p>\n</p><p>\n</p>', 'Terms and Conditions', 'Terms and Conditions', 'Terms and Conditions', 1, '2023-09-07 15:38:11', '2023-09-07 15:38:11'),
(5, 'Cookie Policy', 'cookie-policy', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ipsum ante, pretium non nibh cursus, tempor ornare urna. Vestibulum ultricies velit nec diam pretium rhoncus. Etiam sagittis, lorem eu scelerisque venenatis, lectus felis vehicula justo, ac vulputate sem felis laoreet ante. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum vitae ornare sem, eget commodo libero. Aliquam nisi risus, congue a orci sed, blandit pharetra lectus. Vivamus nec nibh a leo elementum consectetur eget ut turpis. Curabitur egestas erat at ornare tincidunt. Ut augue ex, iaculis a augue ac, dignissim tempor nisl. Nulla in finibus risus, nec fringilla ligula. Proin ac elit sollicitudin purus lacinia posuere. In ornare mauris non purus faucibus, sed lacinia diam euismod. Vivamus suscipit sem vel mauris sagittis scelerisque.\r\n</p><p><br></p><p>Aliquam odio turpis, scelerisque quis mauris et, molestie hendrerit ex. Nunc laoreet libero a nibh vehicula, ut commodo arcu sagittis. Vivamus at mauris in justo consequat convallis accumsan et felis. Pellentesque mattis dui massa, et consectetur lectus lobortis non. Pellentesque suscipit aliquet pulvinar. Fusce egestas sapien sed euismod vestibulum. Nullam at sapien in leo suscipit finibus eu sit amet risus. Maecenas euismod, sem ut convallis elementum, enim orci semper dolor, at sagittis tortor justo vitae tellus. Nullam accumsan consequat elit eget tempor. Vivamus non massa volutpat, porta orci at, fermentum dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;\r\n</p><p><br></p><p>Sed finibus nibh nibh, eu sodales lacus gravida in. Cras finibus urna felis, eget viverra nulla placerat at. Phasellus mollis eu elit nec tristique. Donec in efficitur metus. Proin tortor ante, vehicula eu rutrum in, bibendum vestibulum lectus. Ut id tempor ligula. Ut porta sodales tincidunt. Cras et nisl nunc. Phasellus scelerisque ultrices porta.\r\n</p><p><br></p><p>In vitae tortor facilisis, condimentum nulla quis, molestie urna. Cras in justo non est condimentum scelerisque. Pellentesque vestibulum magna ex, id finibus felis lobortis ac. Aenean et ex augue. Maecenas sagittis felis eu ullamcorper imperdiet. Pellentesque non tortor id libero placerat dignissim. Praesent feugiat, ligula vel varius euismod, nisl ex posuere tellus, id ultrices neque sem et orci. Duis mattis nunc vel ligula lobortis convallis. Sed a gravida turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent faucibus hendrerit lorem, ut volutpat tellus imperdiet eu.\r\n</p><p><br></p><p>Phasellus imperdiet commodo orci, sed auctor nisl vehicula ac. Nulla facilisi. Duis urna libero, lobortis id orci vitae, congue gravida risus. Donec vitae nisi ut justo facilisis blandit sit amet eleifend tortor. Cras dui urna, gravida sit amet viverra non, egestas a nisl. Nunc blandit ex a tortor luctus, sit amet facilisis arcu porta. Morbi massa nibh, ultrices iaculis elit placerat, ullamcorper interdum arcu. Aenean nec dui mollis, vehicula libero non, facilisis elit.</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p>', 'Cookie Policy', 'Cookie Policy', 'Cookie Policy', 1, '2023-09-07 15:43:48', '2023-09-07 15:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `commission_fee` decimal(10,2) NOT NULL,
  `admin_amount` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `sender_id`, `receiver_id`, `commission_fee`, `admin_amount`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 12, '20.00', '0.60', '2.40', 1, '2023-11-02 15:10:33', '2023-11-02 15:10:33'),
(2, 2, 12, '20.00', '1.00', '4.00', 1, '2023-11-07 08:08:07', '2023-11-07 08:08:07'),
(3, 3, 4, '20.00', '1.00', '4.00', 1, '2023-11-20 14:21:36', '2023-11-20 14:21:36'),
(4, 8, 2, '20.00', '0.60', '2.40', 1, '2023-11-20 14:38:18', '2023-11-20 14:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` tinyint(1) DEFAULT 0,
  `points` int(11) NOT NULL,
  `categories` tinyint(1) DEFAULT 0,
  `tips` tinyint(1) DEFAULT 0,
  `comments` tinyint(1) DEFAULT 0,
  `reactions` tinyint(1) DEFAULT 0,
  `followers` tinyint(1) DEFAULT 0,
  `messages` tinyint(1) DEFAULT 0,
  `users` tinyint(1) DEFAULT 0,
  `viewers` tinyint(1) DEFAULT 0,
  `ads` tinyint(1) DEFAULT 0,
  `order` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `price`, `duration`, `verified`, `points`, `categories`, `tips`, `comments`, `reactions`, `followers`, `messages`, `users`, `viewers`, `ads`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Free Plan', '0.00', 'Lifetime', 0, 10, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 1, '2023-10-23 10:12:18', '2023-11-16 06:44:11'),
(2, 'Standard Plan', '8.00', 'Monthly', 1, 100, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 1, '2023-10-23 10:13:47', '2023-10-23 10:13:47'),
(3, 'Yealy Plan', '99.00', 'Yearly', 1, 200, 1, 1, 1, 1, 1, 1, 1, 1, 1, 3, 1, '2023-10-23 10:14:55', '2023-10-23 10:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` bigint(20) NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `user_id`, `type`, `score`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 2, '2023-08-18 10:48:13', '2023-08-18 10:48:13'),
(2, 2, 3, 10, '2023-08-18 10:51:24', '2023-08-18 10:51:24'),
(3, 2, 3, 10, '2023-08-18 11:33:22', '2023-08-18 11:33:22'),
(4, 1, 1, 2, '2023-08-18 11:45:43', '2023-08-18 11:45:43'),
(5, 1, 6, 3, '2023-08-18 11:47:03', '2023-08-18 11:47:03'),
(6, 1, 4, 6, '2023-08-18 12:07:40', '2023-08-18 12:07:40'),
(7, 1, 7, 3, '2023-08-18 12:12:37', '2023-08-18 12:12:37'),
(8, 1, 7, 3, '2023-08-18 12:12:47', '2023-08-18 12:12:47'),
(9, 2, 1, 2, '2023-08-19 08:30:22', '2023-08-19 08:30:22'),
(10, 1, 1, 2, '2023-08-19 10:30:52', '2023-08-19 10:30:52'),
(11, 2, 1, 2, '2023-08-21 05:51:55', '2023-08-21 05:51:55'),
(12, 2, 1, 2, '2023-08-21 05:52:54', '2023-08-21 05:52:54'),
(13, 2, 1, 2, '2023-08-21 05:57:23', '2023-08-21 05:57:23'),
(14, 2, 1, 2, '2023-08-21 06:06:50', '2023-08-21 06:06:50'),
(15, 5, 1, 2, '2023-08-21 06:07:40', '2023-08-21 06:07:40'),
(16, 4, 1, 2, '2023-08-21 06:09:24', '2023-08-21 06:09:24'),
(17, 4, 1, 2, '2023-08-21 06:10:10', '2023-08-21 06:10:10'),
(18, 4, 1, 2, '2023-08-21 06:11:29', '2023-08-21 06:11:29'),
(19, 4, 1, 2, '2023-08-21 06:12:22', '2023-08-21 06:12:22'),
(20, 4, 4, 6, '2023-08-21 08:04:54', '2023-08-21 08:04:54'),
(21, 4, 4, 6, '2023-08-21 08:06:02', '2023-08-21 08:06:02'),
(22, 4, 7, 3, '2023-08-21 08:13:03', '2023-08-21 08:13:03'),
(23, 4, 7, 3, '2023-08-21 09:24:08', '2023-08-21 09:24:08'),
(24, 1, 1, 2, '2023-08-21 09:52:49', '2023-08-21 09:52:49'),
(25, 2, 1, 2, '2023-08-21 16:21:17', '2023-08-21 16:21:17'),
(26, 2, 3, 10, '2023-08-21 16:32:23', '2023-08-21 16:32:23'),
(27, 4, 1, 2, '2023-08-23 10:06:48', '2023-08-23 10:06:48'),
(28, 4, 3, 10, '2023-08-23 10:11:10', '2023-08-23 10:11:10'),
(29, 1, 1, 2, '2023-08-23 10:12:39', '2023-08-23 10:12:39'),
(30, 2, 1, 2, '2023-08-23 10:28:42', '2023-08-23 10:28:42'),
(31, 2, 3, 10, '2023-08-23 10:29:51', '2023-08-23 10:29:51'),
(32, 2, 3, 10, '2023-08-23 10:34:18', '2023-08-23 10:34:18'),
(33, 2, 4, 6, '2023-08-23 11:39:08', '2023-08-23 11:39:08'),
(34, 2, 4, 6, '2023-08-23 11:42:26', '2023-08-23 11:42:26'),
(35, 2, 4, 6, '2023-08-23 11:43:07', '2023-08-23 11:43:07'),
(36, 4, 1, 2, '2023-08-23 11:46:09', '2023-08-23 11:46:09'),
(37, 4, 7, 3, '2023-08-23 11:46:30', '2023-08-23 11:46:30'),
(38, 5, 1, 2, '2023-08-23 11:46:58', '2023-08-23 11:46:58'),
(39, 5, 7, 3, '2023-08-23 11:47:20', '2023-08-23 11:47:20'),
(40, 1, 1, 2, '2023-08-23 11:56:09', '2023-08-23 11:56:09'),
(41, 2, 1, 2, '2023-08-23 11:56:43', '2023-08-23 11:56:43'),
(42, 2, 3, 10, '2023-08-23 12:28:11', '2023-08-23 12:28:11'),
(43, 2, 1, 2, '2023-08-23 15:39:39', '2023-08-23 15:39:39'),
(44, 8, 1, 2, '2023-08-23 15:40:24', '2023-08-23 15:40:24'),
(45, 8, 4, 6, '2023-08-23 15:42:22', '2023-08-23 15:42:22'),
(46, 2, 1, 2, '2023-08-23 15:43:06', '2023-08-23 15:43:06'),
(47, 2, 5, 4, '2023-08-23 15:48:21', '2023-08-23 15:48:21'),
(48, 2, 5, 4, '2023-08-23 16:10:34', '2023-08-23 16:10:34'),
(49, 8, 1, 2, '2023-08-23 16:14:10', '2023-08-23 16:14:10'),
(50, 8, 7, 3, '2023-08-23 16:25:28', '2023-08-23 16:25:28'),
(51, 8, 1, 2, '2023-08-26 08:17:26', '2023-08-26 08:17:26'),
(52, 7, 1, 2, '2023-08-26 08:46:22', '2023-08-26 08:46:22'),
(53, 6, 1, 2, '2023-08-26 09:19:40', '2023-08-26 09:19:40'),
(54, 7, 1, 2, '2023-08-26 09:23:54', '2023-08-26 09:23:54'),
(55, 8, 1, 2, '2023-08-26 12:05:15', '2023-08-26 12:05:15'),
(56, 7, 1, 2, '2023-08-28 05:30:48', '2023-08-28 05:30:48'),
(57, 6, 1, 2, '2023-08-28 11:41:52', '2023-08-28 11:41:52'),
(58, 7, 1, 2, '2023-08-28 11:54:31', '2023-08-28 11:54:31'),
(59, 8, 1, 2, '2023-08-28 12:39:10', '2023-08-28 12:39:10'),
(60, 7, 1, 2, '2023-08-28 12:42:34', '2023-08-28 12:42:34'),
(61, 6, 1, 2, '2023-08-28 15:52:59', '2023-08-28 15:52:59'),
(62, 7, 1, 2, '2023-08-29 05:47:19', '2023-08-29 05:47:19'),
(63, 6, 1, 2, '2023-08-29 06:47:50', '2023-08-29 06:47:50'),
(64, 7, 1, 2, '2023-08-29 10:43:11', '2023-08-29 10:43:11'),
(65, 2, 1, 2, '2023-08-29 12:41:46', '2023-08-29 12:41:46'),
(66, 6, 1, 2, '2023-08-30 06:18:44', '2023-08-30 06:18:44'),
(67, 8, 1, 2, '2023-08-30 06:37:49', '2023-08-30 06:37:49'),
(68, 7, 1, 2, '2023-08-30 14:35:17', '2023-08-30 14:35:17'),
(69, 2, 1, 2, '2023-08-30 15:58:05', '2023-08-30 15:58:05'),
(70, 7, 1, 2, '2023-08-30 16:06:45', '2023-08-30 16:06:45'),
(71, 6, 1, 2, '2023-08-30 16:10:26', '2023-08-30 16:10:26'),
(72, 7, 1, 2, '2023-08-30 16:13:00', '2023-08-30 16:13:00'),
(73, 7, 7, 3, '2023-08-30 18:30:46', '2023-08-30 18:30:46'),
(74, 7, 7, 3, '2023-08-30 18:31:06', '2023-08-30 18:31:06'),
(75, 7, 7, 3, '2023-08-30 18:31:54', '2023-08-30 18:31:54'),
(76, 7, 7, 3, '2023-08-30 18:37:33', '2023-08-30 18:37:33'),
(77, 7, 7, 3, '2023-08-30 18:37:41', '2023-08-30 18:37:41'),
(78, 7, 7, 3, '2023-08-30 18:38:02', '2023-08-30 18:38:02'),
(79, 7, 7, 3, '2023-08-30 18:38:21', '2023-08-30 18:38:21'),
(80, 2, 1, 2, '2023-09-01 07:27:22', '2023-09-01 07:27:22'),
(81, 7, 1, 2, '2023-09-01 07:47:00', '2023-09-01 07:47:00'),
(82, 5, 1, 2, '2023-09-01 07:56:29', '2023-09-01 07:56:29'),
(83, 6, 1, 2, '2023-09-01 08:02:19', '2023-09-01 08:02:19'),
(84, 6, 7, 3, '2023-09-01 08:39:27', '2023-09-01 08:39:27'),
(85, 6, 7, 3, '2023-09-01 08:39:40', '2023-09-01 08:39:40'),
(86, 6, 7, 3, '2023-09-01 08:39:46', '2023-09-01 08:39:46'),
(87, 4, 1, 2, '2023-09-05 05:44:44', '2023-09-05 05:44:44'),
(88, 4, 3, 10, '2023-09-05 06:00:44', '2023-09-05 06:00:44'),
(89, 4, 1, 2, '2023-09-05 09:14:08', '2023-09-05 09:14:08'),
(90, 4, 3, 10, '2023-09-05 09:15:40', '2023-09-05 09:15:40'),
(91, 5, 1, 2, '2023-09-06 03:45:29', '2023-09-06 03:45:29'),
(92, 5, 3, 10, '2023-09-06 05:45:00', '2023-09-06 05:45:00'),
(93, 4, 1, 2, '2023-09-06 05:57:12', '2023-09-06 05:57:12'),
(94, 4, 1, 2, '2023-09-07 04:51:19', '2023-09-07 04:51:19'),
(95, 5, 1, 2, '2023-09-07 05:20:38', '2023-09-07 05:20:38'),
(96, 6, 1, 2, '2023-09-07 05:23:08', '2023-09-07 05:23:08'),
(97, 4, 1, 2, '2023-09-07 05:35:28', '2023-09-07 05:35:28'),
(98, 2, 1, 2, '2023-09-07 06:19:25', '2023-09-07 06:19:25'),
(99, 4, 1, 2, '2023-09-07 07:08:33', '2023-09-07 07:08:33'),
(100, 5, 1, 2, '2023-09-07 10:07:19', '2023-09-07 10:07:19'),
(101, 2, 1, 2, '2023-09-07 10:50:23', '2023-09-07 10:50:23'),
(102, 1, 1, 2, '2023-09-07 10:52:57', '2023-09-07 10:52:57'),
(103, 2, 1, 2, '2023-09-07 10:54:00', '2023-09-07 10:54:00'),
(104, 7, 1, 2, '2023-09-07 11:21:38', '2023-09-07 11:21:38'),
(105, 7, 7, 3, '2023-09-07 11:23:33', '2023-09-07 11:23:33'),
(106, 2, 1, 2, '2023-09-07 11:24:30', '2023-09-07 11:24:30'),
(107, 2, 6, 3, '2023-09-07 11:25:02', '2023-09-07 11:25:02'),
(108, 1, 1, 2, '2023-09-07 14:54:02', '2023-09-07 14:54:02'),
(109, 7, 1, 2, '2023-09-08 05:21:58', '2023-09-08 05:21:58'),
(110, 7, 7, 3, '2023-09-08 05:22:18', '2023-09-08 05:22:18'),
(111, 7, 7, 3, '2023-09-08 05:22:27', '2023-09-08 05:22:27'),
(112, 4, 1, 2, '2023-09-08 05:34:18', '2023-09-08 05:34:18'),
(113, 4, 7, 10, '2023-09-08 06:23:36', '2023-09-08 06:23:36'),
(114, 4, 4, 6, '2023-09-08 06:29:29', '2023-09-08 06:29:29'),
(115, 1, 1, 2, '2023-09-08 09:17:54', '2023-09-08 09:17:54'),
(116, 5, 1, 2, '2023-09-08 16:48:24', '2023-09-08 16:48:24'),
(117, 4, 1, 2, '2023-09-09 11:17:32', '2023-09-09 11:17:32'),
(118, 4, 4, 6, '2023-09-09 12:43:43', '2023-09-09 12:43:43'),
(119, 2, 1, 2, '2023-09-12 13:26:51', '2023-09-12 13:26:51'),
(120, 7, 1, 2, '2023-09-13 05:17:35', '2023-09-13 05:17:35'),
(121, 7, 1, 2, '2023-09-15 05:39:14', '2023-09-15 05:39:14'),
(122, 7, 1, 2, '2023-09-15 05:56:39', '2023-09-15 05:56:39'),
(123, 8, 1, 2, '2023-09-15 06:33:25', '2023-09-15 06:33:25'),
(124, 7, 1, 2, '2023-09-15 09:56:41', '2023-09-15 09:56:41'),
(125, 7, 1, 2, '2023-09-15 12:01:17', '2023-09-15 12:01:17'),
(126, 8, 1, 2, '2023-09-15 13:46:44', '2023-09-15 13:46:44'),
(127, 7, 1, 2, '2023-09-15 16:16:39', '2023-09-15 16:16:39'),
(128, 1, 1, 2, '2023-09-23 08:17:51', '2023-09-23 08:17:51'),
(129, 2, 1, 2, '2023-09-23 14:19:34', '2023-09-23 14:19:34'),
(130, 8, 1, 2, '2023-09-23 14:32:12', '2023-09-23 14:32:12'),
(131, 2, 1, 2, '2023-09-23 16:33:14', '2023-09-23 16:33:14'),
(132, 2, 7, 3, '2023-09-23 19:04:15', '2023-09-23 19:04:15'),
(133, 5, 1, 2, '2023-09-24 17:26:37', '2023-09-24 17:26:37'),
(134, 5, 2, 3, '2023-09-24 18:52:52', '2023-09-24 18:52:52'),
(135, 9, 2, 2, '2023-09-25 11:21:50', '2023-09-25 11:21:50'),
(136, 10, 2, 2, '2023-09-25 11:25:43', '2023-09-25 11:25:43'),
(137, 10, 3, 10, '2023-09-25 11:34:33', '2023-09-25 11:34:33'),
(138, 10, 4, 6, '2023-09-25 11:35:26', '2023-09-25 11:35:26'),
(139, 5, 1, 2, '2023-09-25 12:34:41', '2023-09-25 12:34:41'),
(140, 2, 1, 2, '2023-09-25 12:51:47', '2023-09-25 12:51:47'),
(141, 1, 1, 2, '2023-09-26 11:04:30', '2023-09-26 11:04:30'),
(142, 10, 1, 2, '2023-10-06 11:03:03', '2023-10-06 11:03:03'),
(143, 10, 3, 10, '2023-10-06 11:06:26', '2023-10-06 11:06:26'),
(144, 9, 1, 2, '2023-10-06 11:08:35', '2023-10-06 11:08:35'),
(145, 9, 3, 10, '2023-10-06 11:11:11', '2023-10-06 11:11:11'),
(146, 9, 7, 3, '2023-10-06 11:32:15', '2023-10-06 11:32:15'),
(147, 9, 7, 3, '2023-10-06 11:32:27', '2023-10-06 11:32:27'),
(148, 9, 4, 6, '2023-10-06 11:34:07', '2023-10-06 11:34:07'),
(149, 9, 7, 3, '2023-10-06 12:24:38', '2023-10-06 12:24:38'),
(150, 1, 7, 2, '2023-10-07 09:38:52', '2023-10-07 09:38:52'),
(151, 1, 7, 10, '2023-10-07 10:37:14', '2023-10-07 10:37:14'),
(152, 1, 7, 3, '2023-10-07 10:43:14', '2023-10-07 10:43:14'),
(153, 1, 6, 3, '2023-10-07 11:47:02', '2023-10-07 11:47:02'),
(154, 1, 6, 3, '2023-10-07 11:47:08', '2023-10-07 11:47:08'),
(155, 1, 4, 6, '2023-10-07 11:48:03', '2023-10-07 11:48:03'),
(156, 5, 1, 2, '2023-10-11 11:53:03', '2023-10-11 11:53:03'),
(157, 6, 1, 2, '2023-10-11 11:53:41', '2023-10-11 11:53:41'),
(158, 2, 1, 2, '2023-10-11 11:54:57', '2023-10-11 11:54:57'),
(159, 9, 1, 2, '2023-10-11 11:58:46', '2023-10-11 11:58:46'),
(160, 10, 1, 2, '2023-10-11 12:07:46', '2023-10-11 12:07:46'),
(161, 9, 1, 2, '2023-10-11 12:37:35', '2023-10-11 12:37:35'),
(162, 1, 1, 2, '2023-10-14 05:51:59', '2023-10-14 05:51:59'),
(163, 1, 1, 2, '2023-10-17 05:00:51', '2023-10-17 05:00:51'),
(164, 1, 1, 2, '2023-10-17 08:52:05', '2023-10-17 08:52:05'),
(165, 2, 1, 2, '2023-10-19 04:47:05', '2023-10-19 04:47:05'),
(166, 2, 1, 2, '2023-10-19 10:15:19', '2023-10-19 10:15:19'),
(167, 1, 1, 2, '2023-10-19 11:07:48', '2023-10-19 11:07:48'),
(168, 2, 1, 2, '2023-10-19 11:20:06', '2023-10-19 11:20:06'),
(169, 8, 1, 2, '2023-10-19 12:17:23', '2023-10-19 12:17:23'),
(170, 10, 1, 2, '2023-10-19 12:23:01', '2023-10-19 12:23:01'),
(171, 2, 1, 2, '2023-10-19 15:19:40', '2023-10-19 15:19:40'),
(172, 8, 1, 2, '2023-10-19 15:52:50', '2023-10-19 15:52:50'),
(173, 2, 1, 2, '2023-10-20 08:29:48', '2023-10-20 08:29:48'),
(174, 2, 1, 2, '2023-10-20 08:50:01', '2023-10-20 08:50:01'),
(175, 2, 1, 2, '2023-10-23 04:07:25', '2023-10-23 04:07:25'),
(176, 1, 1, 2, '2023-10-23 05:21:16', '2023-10-23 05:21:16'),
(177, 1, 1, 2, '2023-10-23 07:56:32', '2023-10-23 07:56:32'),
(178, 2, 1, 2, '2023-10-23 10:31:52', '2023-10-23 10:31:52'),
(179, 2, 1, 2, '2023-10-24 06:28:37', '2023-10-24 06:28:37'),
(180, 2, 9, 10, '2023-10-24 09:08:58', '2023-10-24 09:08:58'),
(181, 2, 9, 100, '2023-10-24 09:10:31', '2023-10-24 09:10:31'),
(182, 2, 9, 10, '2023-10-24 10:43:01', '2023-10-24 10:43:01'),
(183, 11, 2, 2, '2023-10-25 10:23:46', '2023-10-25 10:23:46'),
(184, 12, 2, 2, '2023-10-25 10:33:16', '2023-10-25 10:33:16'),
(185, 13, 2, 2, '2023-10-25 10:34:49', '2023-10-25 10:34:49'),
(186, 1, 1, 2, '2023-10-26 09:29:48', '2023-10-26 09:29:48'),
(187, 1, 9, 10, '2023-10-26 09:54:27', '2023-10-26 09:54:27'),
(188, 1, 1, 2, '2023-10-27 05:25:13', '2023-10-27 05:25:13'),
(189, 4, 1, 2, '2023-10-27 05:43:18', '2023-10-27 05:43:18'),
(190, 4, 9, 10, '2023-10-27 05:43:55', '2023-10-27 05:43:55'),
(191, 1, 1, 2, '2023-10-27 05:46:09', '2023-10-27 05:46:09'),
(192, 2, 9, 2, '2023-10-27 09:17:00', '2023-10-27 09:17:00'),
(193, 2, 10, 20, '2023-10-27 09:17:29', '2023-10-27 09:17:29'),
(194, 1, 1, 2, '2023-10-27 10:25:30', '2023-10-27 10:25:30'),
(195, 12, 1, 2, '2023-10-27 15:55:16', '2023-10-27 15:55:16'),
(196, 13, 1, 2, '2023-10-27 15:56:26', '2023-10-27 15:56:26'),
(197, 12, 1, 2, '2023-10-27 15:57:22', '2023-10-27 15:57:22'),
(198, 7, 1, 2, '2023-10-27 16:20:14', '2023-10-27 16:20:14'),
(199, 5, 1, 2, '2023-10-27 16:21:17', '2023-10-27 16:21:17'),
(200, 1, 1, 2, '2023-10-28 10:26:50', '2023-10-28 10:26:50'),
(201, 2, 1, 2, '2023-11-02 13:52:26', '2023-11-02 13:52:26'),
(202, 1, 1, 2, '2023-11-02 14:25:45', '2023-11-02 14:25:45'),
(203, 2, 1, 2, '2023-11-02 14:52:13', '2023-11-02 14:52:13'),
(204, 12, 1, 2, '2023-11-02 15:20:27', '2023-11-02 15:20:27'),
(205, 2, 1, 2, '2023-11-02 16:08:55', '2023-11-02 16:08:55'),
(206, 1, 1, 2, '2023-11-03 05:30:07', '2023-11-03 05:30:07'),
(207, 12, 1, 2, '2023-11-03 05:38:12', '2023-11-03 05:38:12'),
(208, 12, 1, 2, '2023-11-07 06:50:05', '2023-11-07 06:50:05'),
(209, 10, 1, 2, '2023-11-07 08:04:38', '2023-11-07 08:04:38'),
(210, 2, 1, 2, '2023-11-07 08:06:41', '2023-11-07 08:06:41'),
(211, 12, 1, 2, '2023-11-07 08:09:56', '2023-11-07 08:09:56'),
(212, 1, 1, 2, '2023-11-07 09:29:11', '2023-11-07 09:29:11'),
(213, 12, 1, 2, '2023-11-07 09:35:56', '2023-11-07 09:35:56'),
(214, 1, 1, 2, '2023-11-07 09:38:22', '2023-11-07 09:38:22'),
(215, 5, 1, 2, '2023-11-07 10:49:19', '2023-11-07 10:49:19'),
(216, 5, 9, 10, '2023-11-07 10:49:53', '2023-11-07 10:49:53'),
(217, 5, 1, 2, '2023-11-07 10:58:42', '2023-11-07 10:58:42'),
(218, 1, 1, 2, '2023-11-07 11:02:11', '2023-11-07 11:02:11'),
(219, 2, 1, 2, '2023-11-07 11:14:02', '2023-11-07 11:14:02'),
(220, 2, 1, 2, '2023-11-11 11:35:48', '2023-11-11 11:35:48'),
(221, 3, 1, 2, '2023-11-11 12:45:33', '2023-11-11 12:45:33'),
(222, 3, 9, 10, '2023-11-11 12:52:35', '2023-11-11 12:52:35'),
(223, 2, 1, 2, '2023-11-11 13:02:15', '2023-11-11 13:02:15'),
(224, 2, 1, 2, '2023-11-11 13:02:58', '2023-11-11 13:02:58'),
(225, 14, 2, 2, '2023-11-13 06:34:04', '2023-11-13 06:34:04'),
(226, 14, 9, 10, '2023-11-13 06:34:04', '2023-11-13 06:34:04'),
(227, 1, 1, 2, '2023-11-13 07:18:21', '2023-11-13 07:18:21'),
(228, 14, 1, 2, '2023-11-13 07:32:03', '2023-11-13 07:32:03'),
(229, 14, 3, 10, '2023-11-13 07:35:18', '2023-11-13 07:35:18'),
(230, 14, 3, 10, '2023-11-13 07:55:31', '2023-11-13 07:55:31'),
(231, 14, 1, 6, '2023-11-13 08:04:34', '2023-11-13 08:04:34'),
(232, 1, 1, 2, '2023-11-13 09:08:04', '2023-11-13 09:08:04'),
(233, 4, 1, 2, '2023-11-13 09:25:14', '2023-11-13 09:25:14'),
(234, 1, 1, 2, '2023-11-13 10:27:12', '2023-11-13 10:27:12'),
(235, 1, 1, 2, '2023-11-13 10:52:08', '2023-11-13 10:52:08'),
(236, 14, 1, 2, '2023-11-13 11:40:57', '2023-11-13 11:40:57'),
(237, 1, 1, 2, '2023-11-13 12:16:16', '2023-11-13 12:16:16'),
(238, 14, 1, 2, '2023-11-13 12:45:28', '2023-11-13 12:45:28'),
(239, 1, 1, 2, '2023-11-13 12:50:05', '2023-11-13 12:50:05'),
(240, 1, 1, 2, '2023-11-13 15:26:44', '2023-11-13 15:26:44'),
(241, 1, 6, 3, '2023-11-13 15:40:21', '2023-11-13 15:40:21'),
(242, 1, 1, 2, '2023-11-16 05:21:32', '2023-11-16 05:21:32'),
(243, 2, 1, 2, '2023-11-16 05:56:09', '2023-11-16 05:56:09'),
(244, 14, 1, 2, '2023-11-16 06:03:51', '2023-11-16 06:03:51'),
(245, 6, 1, 2, '2023-11-16 06:04:39', '2023-11-16 06:04:39'),
(246, 7, 1, 2, '2023-11-16 06:05:49', '2023-11-16 06:05:49'),
(247, 6, 1, 2, '2023-11-16 06:20:32', '2023-11-16 06:20:32'),
(248, 1, 1, 2, '2023-11-16 06:43:36', '2023-11-16 06:43:36'),
(249, 2, 1, 2, '2023-11-16 07:20:33', '2023-11-16 07:20:33'),
(250, 2, 1, 2, '2023-11-18 03:58:05', '2023-11-18 03:58:05'),
(251, 1, 1, 2, '2023-11-18 07:09:22', '2023-11-18 07:09:22'),
(252, 1, 1, 2, '2023-11-18 11:09:41', '2023-11-18 11:09:41'),
(253, 1, 1, 2, '2023-11-18 15:44:01', '2023-11-18 15:44:01'),
(254, 9, 1, 2, '2023-11-19 06:22:52', '2023-11-19 06:22:52'),
(255, 1, 1, 2, '2023-11-19 06:29:01', '2023-11-19 06:29:01'),
(256, 1, 1, 4, '2023-11-19 06:50:13', '2023-11-19 06:50:13'),
(257, 3, 1, 2, '2023-11-19 10:02:40', '2023-11-19 10:02:40'),
(258, 1, 1, 2, '2023-11-19 10:59:51', '2023-11-19 10:59:51'),
(259, 1, 1, 2, '2023-11-19 11:23:22', '2023-11-19 11:23:22'),
(260, 12, 1, 2, '2023-11-19 13:37:45', '2023-11-19 13:37:45'),
(261, 1, 1, 2, '2023-11-19 14:58:16', '2023-11-19 14:58:16'),
(262, 1, 1, 2, '2023-11-20 11:04:11', '2023-11-20 11:04:11'),
(263, 1, 1, 2, '2023-11-20 12:10:21', '2023-11-20 12:10:21'),
(264, 1, 7, 3, '2023-11-20 13:57:17', '2023-11-20 13:57:17'),
(265, 2, 1, 2, '2023-11-20 14:16:07', '2023-11-20 14:16:07'),
(266, 3, 1, 2, '2023-11-20 14:19:02', '2023-11-20 14:19:02'),
(267, 4, 1, 2, '2023-11-20 14:22:07', '2023-11-20 14:22:07'),
(268, 5, 1, 2, '2023-11-20 14:23:31', '2023-11-20 14:23:31'),
(269, 6, 1, 2, '2023-11-20 14:24:34', '2023-11-20 14:24:34'),
(270, 6, 9, 10, '2023-11-20 14:28:17', '2023-11-20 14:28:17'),
(271, 6, 3, 10, '2023-11-20 14:30:41', '2023-11-20 14:30:41'),
(272, 6, 9, 100, '2023-11-20 14:32:32', '2023-11-20 14:32:32'),
(273, 7, 1, 2, '2023-11-20 14:33:09', '2023-11-20 14:33:09'),
(274, 7, 9, 10, '2023-11-20 14:33:38', '2023-11-20 14:33:38'),
(275, 7, 1, 2, '2023-11-20 14:33:59', '2023-11-20 14:33:59'),
(276, 8, 1, 2, '2023-11-20 14:36:40', '2023-11-20 14:36:40'),
(277, 8, 9, 100, '2023-11-20 14:37:42', '2023-11-20 14:37:42'),
(278, 9, 1, 2, '2023-11-20 14:38:50', '2023-11-20 14:38:50'),
(279, 9, 9, 10, '2023-11-20 14:39:22', '2023-11-20 14:39:22'),
(280, 9, 3, 10, '2023-11-20 14:43:47', '2023-11-20 14:43:47'),
(281, 10, 1, 2, '2023-11-20 14:44:18', '2023-11-20 14:44:18'),
(282, 10, 9, 10, '2023-11-20 14:44:39', '2023-11-20 14:44:39'),
(283, 12, 1, 2, '2023-11-20 14:45:23', '2023-11-20 14:45:23'),
(284, 12, 1, 4, '2023-11-20 14:47:03', '2023-11-20 14:47:03'),
(285, 12, 1, 6, '2023-11-20 14:48:17', '2023-11-20 14:48:17'),
(286, 13, 1, 2, '2023-11-20 14:48:49', '2023-11-20 14:48:49'),
(287, 13, 1, 6, '2023-11-20 14:49:57', '2023-11-20 14:49:57'),
(288, 14, 1, 2, '2023-11-20 14:50:40', '2023-11-20 14:50:40'),
(289, 1, 1, 2, '2023-11-20 14:51:04', '2023-11-20 14:51:04'),
(290, 14, 1, 2, '2023-11-20 14:51:53', '2023-11-20 14:51:53'),
(291, 1, 1, 2, '2023-11-20 14:58:07', '2023-11-20 14:58:07'),
(292, 1, 1, 2, '2023-11-21 06:27:47', '2023-11-21 06:27:47'),
(293, 2, 1, 2, '2023-11-21 06:29:33', '2023-11-21 06:29:33'),
(294, 1, 1, 2, '2023-11-21 09:13:04', '2023-11-21 09:13:04'),
(295, 1, 1, 2, '2023-11-21 15:18:55', '2023-11-21 15:18:55'),
(296, 1, 1, 2, '2023-11-22 05:32:17', '2023-11-22 05:32:17'),
(297, 1, 1, 2, '2023-11-22 15:30:31', '2023-11-22 15:30:31'),
(298, 1, 1, 2, '2023-11-23 09:50:33', '2023-11-23 09:50:33'),
(299, 1, 1, 2, '2023-11-23 14:37:08', '2023-11-23 14:37:08'),
(300, 3, 1, 2, '2023-11-23 15:42:54', '2023-11-23 15:42:54'),
(301, 1, 1, 2, '2023-11-23 15:49:15', '2023-11-23 15:49:15'),
(302, 2, 1, 2, '2023-11-23 16:08:15', '2023-11-23 16:08:15'),
(303, 1, 1, 2, '2023-11-23 16:23:47', '2023-11-23 16:23:47'),
(304, 8, 1, 2, '2023-11-23 16:25:11', '2023-11-23 16:25:11'),
(305, 2, 1, 2, '2023-11-23 16:34:55', '2023-11-23 16:34:55'),
(306, 1, 1, 2, '2023-11-23 16:39:31', '2023-11-23 16:39:31'),
(307, 1, 1, 2, '2023-12-14 09:36:21', '2023-12-14 09:36:21'),
(308, 7, 1, 2, '2023-12-14 09:50:44', '2023-12-14 09:50:44'),
(309, 8, 1, 2, '2023-12-14 09:51:24', '2023-12-14 09:51:24'),
(310, 8, 3, 10, '2023-12-14 09:55:16', '2023-12-14 09:55:16'),
(311, 7, 1, 2, '2023-12-14 09:56:01', '2023-12-14 09:56:01'),
(312, 8, 1, 2, '2023-12-14 09:57:00', '2023-12-14 09:57:00'),
(313, 5, 1, 2, '2023-12-14 09:58:00', '2023-12-14 09:58:00'),
(314, 1, 1, 2, '2023-12-27 09:58:10', '2023-12-27 09:58:10'),
(315, 1, 1, 2, '2023-12-27 10:01:29', '2023-12-27 10:01:29'),
(316, 1, 1, 2, '2023-12-27 10:38:20', '2023-12-27 10:38:20'),
(317, 1, 1, 2, '2024-01-03 07:20:03', '2024-01-03 07:20:03'),
(318, 1, 1, 2, '2024-01-12 05:02:06', '2024-01-12 05:02:06'),
(319, 1, 1, 2, '2024-01-13 04:39:10', '2024-01-13 04:39:10'),
(320, 1, 1, 2, '2024-01-13 08:05:44', '2024-01-13 08:05:44'),
(321, 1, 1, 2, '2024-01-14 13:07:28', '2024-01-14 13:07:28'),
(322, 1, 1, 2, '2024-01-16 03:42:20', '2024-01-16 03:42:20'),
(323, 1, 1, 2, '2024-01-16 12:00:18', '2024-01-16 12:00:18'),
(324, 1, 1, 2, '2024-01-16 16:34:39', '2024-01-16 16:34:39'),
(325, 8, 1, 2, '2024-01-18 08:38:13', '2024-01-18 08:38:13'),
(326, 1, 1, 2, '2024-01-19 10:40:55', '2024-01-19 10:40:55'),
(327, 1, 1, 2, '2024-01-20 15:13:38', '2024-01-20 15:13:38'),
(328, 1, 1, 2, '2024-01-23 07:10:17', '2024-01-23 07:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `pinned` tinyint(1) NOT NULL DEFAULT 0,
  `public` tinyint(4) NOT NULL DEFAULT 1,
  `comments` tinyint(4) NOT NULL DEFAULT 1,
  `likes` tinyint(4) NOT NULL DEFAULT 1,
  `solved` tinyint(1) NOT NULL DEFAULT 0,
  `closed` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_id`, `user_id`, `category_id`, `title`, `slug`, `description`, `keywords`, `body`, `status`, `pinned`, `public`, `comments`, `likes`, `solved`, `closed`, `created_at`, `updated_at`) VALUES
(1, 'K8C1omdVu', 2, 2, 'Social Media vs. Email marketing', 'social-media-vs-email-marketing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae magna a dolor blandit tristique sed vel felis. Nunc semper ultrices posuere.', 'Lorem, Ipsum', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae magna a dolor blandit tristique sed vel felis. Nunc semper ultrices posuere. Phasellus pharetra aliquam sem, ac bibendum magna tempor in. Donec commodo, dui a posuere dictum, diam massa ultricies leo, id fermentum turpis dolor ut ipsum. Vestibulum mattis hendrerit condimentum. Curabitur rutrum lacus erat, sed rhoncus neque malesuada accumsan. Nunc non turpis lacus. Curabitur lobortis, ante at gravida venenatis, arcu purus suscipit enim, ac mollis nisi mi sed libero. In sed ex rutrum, sodales sem vel, mattis ipsum. In et eleifend nunc, a mattis turpis. Quisque vel erat quis lorem hendrerit viverra.</p><p><img src=\"https://media1.giphy.com/media/RCAPsp632kWU2j4wKM/giphy-downsized.gif?cid=a51c33e6b28ub2rfg6sl3pnsbarlb35lfzvlrncpi6ccv8cp&amp;ep=v1_gifs_trending&amp;rid=giphy-downsized.gif&amp;ct=g\" alt=\"Whats Up Asian GIF by Hello All\"><br></p>', 1, 0, 1, 1, 1, 1, 0, '2023-08-23 10:29:51', '2023-08-23 15:30:10'),
(2, 'jR5tJlBQj', 2, 1, 'What sets your product apart from existing solutions in the market?', 'what-sets-your-product-apart-from-existing-solutions-in-the-market', 'Phasellus pharetra aliquam sem, ac bibendum magna tempor in. Donec commodo, dui a posuere dictum, diam massa ultricies leo,', 'Lorem, Ipsum', '<p>Nulla egestas in nisi a rutrum. Morbi non orci mi. Quisque volutpat metus augue, id efficitur diam fringilla non. Phasellus lobortis sapien vitae lectus pulvinar tempor. Nulla nunc mi, pharetra sed dolor eu, porta finibus neque. Maecenas hendrerit pulvinar nisl, nec volutpat augue mollis sit amet. Nunc vestibulum, mi sit amet tincidunt mollis, tortor urna dignissim felis, fermentum mollis libero sapien eget odio. Donec nec libero in nibh mattis elementum. Integer vel justo mollis, tristique risus in, sagittis nibh. Pellentesque iaculis vestibulum aliquet. Donec luctus, turpis ac rhoncus tincidunt, risus nunc fermentum lorem, non bibendum lectus elit sit amet ante. Mauris feugiat at lacus eu luctus. Donec justo tortor, tincidunt nec ipsum id, lacinia porttitor massa.</p><p><br></p><p><img src=\"https://media1.giphy.com/media/jnQYWZ0T4mkhCmkzcn/giphy.gif?cid=a51c33e6b28ub2rfg6sl3pnsbarlb35lfzvlrncpi6ccv8cp&amp;ep=v1_gifs_trending&amp;rid=giphy.gif&amp;ct=g\" alt=\"Sad Baby GIF\"><br></p>', 1, 1, 1, 1, 1, 1, 1, '2023-08-23 10:34:17', '2023-09-07 06:34:12'),
(3, 'shXN75F9J', 2, 1, 'Adding pinned posts with Laravel', 'adding-pinned-posts-with-laravel', 'Pinned posts should be displayed before any other posts regardless of their published date. Pinned posts should be displayed before any other posts regardless of their published date. The Solution, You can accomplish this by modifying the order clause in the query. Nulla nunc mi, pharetra sed dolor eu, porta finibus neque. Maecenas hendrerit pulvinar nisl, nec volutpat augue mollis sit amet.', 'Pinned', '<p>Let\'s say you have a blog and have posts ordered by their published date. Later you decide you want to pin certain posts.\r\n</p><p>Pinned posts should be displayed before any other posts regardless of their published date.\r\n</p><p>The Solution\r\n</p><p>You can accomplish this by modifying the order clause in the query.</p><p>&nbsp;Nulla nunc mi, pharetra sed dolor eu, porta finibus neque. Maecenas hendrerit pulvinar nisl, nec volutpat augue mollis sit amet. Nunc vestibulum, mi sit amet tincidunt mollis, tortor urna dignissim felis, fermentum mollis libero sapien eget odio. Donec nec libero in nibh mattis elementum.</p><p><br></p><p><img src=\"https://cdn.hashnode.com/res/hashnode/image/upload/v1675040624670/36f72eb8-ccb2-4d56-bccb-43ce7925cc04.png\" alt=\"Pinned Posts\"><br></p><p>\r\n</p><p>\r\n</p>', 1, 0, 1, 1, 1, 0, 0, '2023-08-23 12:28:10', '2023-09-07 10:58:13'),
(4, 'n7eWSGin0', 4, 2, 'Consectetur adipiscing elit', 'consectetur-adipiscing-elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lobortis gravida mauris sit amet finibus. Aliquam vitae venenatis lorem. Pellentesque molestie mollis sapien, et condimentum arcu efficitur ut. Curabitur eget volutpat est, et consequat lectus. Mauris ac pellentesque turpis. Phasellus porta odio non massa placerat sagittis. Sed cursus varius urna, nec lacinia lectus lobortis nec.', 'Lorem, Ipsum', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mattis rutrum lacus id faucibus. Aliquam sit amet eros at diam imperdiet ullamcorper sit amet vel ligula. Ut ex sem, convallis eget facilisis ut, porttitor eu turpis. Phasellus convallis facilisis rutrum. Phasellus tempus rhoncus dui, facilisis malesuada justo faucibus non. In luctus turpis ac auctor placerat. Vivamus rhoncus vel ligula eget tempus.</p><p><br></p><p><img src=\"https://media1.giphy.com/media/kkbzoD1i0qF0UYybvY/giphy-downsized.gif?cid=a51c33e6iunqfssmkdrbex75mmbga7wyb5jabbvrwiorqxbs&amp;ep=v1_gifs_trending&amp;rid=giphy-downsized.gif&amp;ct=g\" alt=\"Hug Me Us Open Tennis GIF by US Open\" style=\"color: var(--text-color); font-family: var(--gen-font-family); font-size: 1.0625rem; text-align: var(--bs-body-text-align);\"><br></p><p><br></p><pre class=\"language-php\"><code class=\"language-php\"><span class=\"token operator\">&lt;</span>div <span class=\"token keyword\">class</span><span class=\"token operator\">=</span><span class=\"token string double-quoted-string\">\"col-sm-12\"</span><span class=\"token operator\">&gt;</span>\r\n<span class=\"token operator\"> &lt;</span>label <span class=\"token keyword\">class</span><span class=\"token operator\">=</span><span class=\"token string double-quoted-string\">\"form-label\"</span><span class=\"token operator\">&gt;</span>Categories<span class=\"token operator\">&lt;</span><span class=\"token operator\">/</span>label<span class=\"token operator\">&gt;</span>\r\n  <span class=\"token operator\">&lt;</span>select name<span class=\"token operator\">=</span><span class=\"token string double-quoted-string\">\"category_id\"</span> id<span class=\"token operator\">=</span><span class=\"token string double-quoted-string\">\"category_id\"</span><span class=\"token operator\">&gt;</span>\r\n   @<span class=\"token keyword\">foreach</span> <span class=\"token punctuation\">(</span><span class=\"token variable\">$categories</span> <span class=\"token keyword\">as</span> <span class=\"token variable\">$category</span><span class=\"token punctuation\">)</span>\r\n     <span class=\"token operator\">&lt;</span>option value<span class=\"token operator\">=</span><span class=\"token string double-quoted-string\">\"{{ <span class=\"token interpolation\"><span class=\"token variable\">$category</span><span class=\"token operator\">-&gt;</span><span class=\"token property\">id</span></span> }}\"</span> <span class=\"token punctuation\">{</span><span class=\"token punctuation\">{</span> <span class=\"token variable\">$post</span><span class=\"token operator\">-&gt;</span><span class=\"token property\">category_id</span> <span class=\"token operator\">==</span> <span class=\"token variable\">$category</span><span class=\"token operator\">-&gt;</span><span class=\"token property\">id</span> <span class=\"token operator\">?</span> <span class=\"token string single-quoted-string\">\'selected\'</span> <span class=\"token punctuation\">:</span> <span class=\"token string single-quoted-string\">\'\'</span> <span class=\"token punctuation\">}</span><span class=\"token punctuation\">}</span><span class=\"token operator\">&gt;</span><span class=\"token punctuation\">{</span><span class=\"token punctuation\">{</span> <span class=\"token variable\">$category</span><span class=\"token operator\">-&gt;</span><span class=\"token property\">name</span> <span class=\"token punctuation\">}</span><span class=\"token punctuation\">}</span><span class=\"token operator\">&lt;</span><span class=\"token operator\">/</span>option<span class=\"token operator\">&gt;</span>\r\n   @<span class=\"token keyword\">endforeach</span>\r\n  <span class=\"token operator\">&lt;</span><span class=\"token operator\">/</span>select<span class=\"token operator\">&gt;</span>\r\n  <span class=\"token operator\">&lt;</span>div <span class=\"token keyword\">class</span><span class=\"token operator\">=</span><span class=\"token string double-quoted-string\">\"invalid-feedback\"</span><span class=\"token operator\">&gt;</span><span class=\"token operator\">&lt;</span><span class=\"token operator\">/</span>div<span class=\"token operator\">&gt;</span>\r\n<span class=\"token operator\">&lt;</span><span class=\"token operator\">/</span>div<span class=\"token operator\">&gt;</span></code></pre>', 1, 0, 1, 2, 2, 0, 0, '2023-09-05 06:00:43', '2023-09-08 05:36:50'),
(6, 'vcBVhBhOi', 5, 2, 'How to Display Validation Message for Radio Buttons with Inline Images using Bootstrap 4 ?', 'how-to-display-validation-message-for-radio-buttons-with-inline-images-using-bootstrap-4', 'By default, Bootstrap 4 has various form features for radio buttons with images inline. Here HTML 5 has default validation features, However, for custom validation, we must use JavaScript or jQuery. The following approaches would help in the display validation message for radio buttons with images inline. Approach 1: First wrap the Radio buttons and its label by using the form-check-inline class.', 'Bootstrap 4, Bootstrap', '<p>By default, Bootstrap 4 has various form features for radio buttons with images inline. Here HTML 5 has default validation features, However, for custom validation, we must use JavaScript or jQuery. The following approaches would help in the display validation message for radio buttons with images inline.</p><p>Approach 1: First wrap the Radio buttons and its label by using the form-check-inline class. Then add img tag within the above wrap after the label tag. Use default required validation by adding the required attribute of a radio button. Finally, display the message using alert class and trigger it with jQueries attr(), addClass(), and html() methods only if the radio button is not checked.</p><p><br></p><p><img src=\"https://media4.giphy.com/media/PXqyTQkTZTf7jydH4N/giphy.gif?cid=a51c33e6li8x20s4o56ce4j46y316a5xt05hdxx77nt5o6mk&amp;ep=v1_gifs_trending&amp;rid=giphy.gif&amp;ct=g\" alt=\"Us Open Tennis Sport GIF by US Open\" style=\"color: var(--text-color); font-family: var(--gen-font-family); font-size: 1.0625rem; text-align: var(--bs-body-text-align);\"></p><p><br></p>', 1, 0, 1, 1, 1, 0, 0, '2023-09-06 05:44:59', '2023-09-07 10:41:23'),
(7, 'dUOTA0rny', 4, 1, 'It\'s time to amplify your online business', 'its-time-to-amplify-your-online-business', 'Quick is a premium HTML template that includes adaptable components and pages for various industries, plus new ones each month.', 'Quick', '<pre class=\"language-js\"><code class=\"language-js\">\r\n	<span class=\"token keyword\">function</span> <span class=\"token function\">init</span><span class=\"token punctuation\">(</span><span class=\"token parameter\">i<span class=\"token punctuation\">,</span> block</span><span class=\"token punctuation\">)</span> <span class=\"token punctuation\">{</span>\r\n		<span class=\"token comment\">// Insert the copy button inside the highlight block</span>\r\n		<span class=\"token keyword\">var</span> btnHtml <span class=\"token operator\">=</span> <span class=\"token string\">\'&lt;button class=\"action-item btn-clipboard\" title=\"Copy to clipboard\"&gt;&lt;i data-feather=\"copy\"&gt;&lt;/i&gt;&lt;/button&gt;\'</span>\r\n		<span class=\"token function\">$</span><span class=\"token punctuation\">(</span>block<span class=\"token punctuation\">)</span><span class=\"token punctuation\">.</span><span class=\"token function\">before</span><span class=\"token punctuation\">(</span>btnHtml<span class=\"token punctuation\">)</span>\r\n		<span class=\"token function\">$</span><span class=\"token punctuation\">(</span><span class=\"token string\">\'.btn-clipboard\'</span><span class=\"token punctuation\">)</span>\r\n			<span class=\"token punctuation\">.</span><span class=\"token function\">tooltip</span><span class=\"token punctuation\">(</span><span class=\"token punctuation\">)</span>\r\n			<span class=\"token punctuation\">.</span><span class=\"token function\">on</span><span class=\"token punctuation\">(</span><span class=\"token string\">\'mouseleave\'</span><span class=\"token punctuation\">,</span> <span class=\"token keyword\">function</span><span class=\"token punctuation\">(</span><span class=\"token punctuation\">)</span> <span class=\"token punctuation\">{</span>\r\n				<span class=\"token comment\">// Explicitly hide tooltip, since after clicking it remains</span>\r\n				<span class=\"token comment\">// focused (as it\'s a button), so tooltip would otherwise</span>\r\n				<span class=\"token comment\">// remain visible until focus is moved away</span>\r\n				<span class=\"token function\">$</span><span class=\"token punctuation\">(</span><span class=\"token keyword\">this</span><span class=\"token punctuation\">)</span><span class=\"token punctuation\">.</span><span class=\"token function\">tooltip</span><span class=\"token punctuation\">(</span><span class=\"token string\">\'hide\'</span><span class=\"token punctuation\">)</span><span class=\"token punctuation\">;</span>\r\n			<span class=\"token punctuation\">}</span><span class=\"token punctuation\">)</span><span class=\"token punctuation\">;</span>\r\n\r\n		<span class=\"token comment\">// Component code copy/paste</span>\r\n		<span class=\"token keyword\">var</span> clipboard <span class=\"token operator\">=</span> <span class=\"token keyword\">new</span> <span class=\"token class-name\">ClipboardJS</span><span class=\"token punctuation\">(</span><span class=\"token string\">\'.btn-clipboard\'</span><span class=\"token punctuation\">,</span> <span class=\"token punctuation\">{</span>\r\n			<span class=\"token function-variable function\">target</span><span class=\"token operator\">:</span> <span class=\"token keyword\">function</span><span class=\"token punctuation\">(</span><span class=\"token parameter\">trigger</span><span class=\"token punctuation\">)</span> <span class=\"token punctuation\">{</span>\r\n				<span class=\"token keyword\">return</span> trigger<span class=\"token punctuation\">.</span>nextElementSibling\r\n			<span class=\"token punctuation\">}</span>\r\n		<span class=\"token punctuation\">}</span><span class=\"token punctuation\">)</span>\r\n\r\n		clipboard<span class=\"token punctuation\">.</span><span class=\"token function\">on</span><span class=\"token punctuation\">(</span><span class=\"token string\">\'success\'</span><span class=\"token punctuation\">,</span> <span class=\"token keyword\">function</span><span class=\"token punctuation\">(</span><span class=\"token parameter\">e</span><span class=\"token punctuation\">)</span> <span class=\"token punctuation\">{</span>\r\n			<span class=\"token function\">$</span><span class=\"token punctuation\">(</span>e<span class=\"token punctuation\">.</span>trigger<span class=\"token punctuation\">)</span>\r\n				<span class=\"token punctuation\">.</span><span class=\"token function\">attr</span><span class=\"token punctuation\">(</span><span class=\"token string\">\'title\'</span><span class=\"token punctuation\">,</span> <span class=\"token string\">\'Copied!\'</span><span class=\"token punctuation\">)</span>\r\n				<span class=\"token punctuation\">.</span><span class=\"token function\">tooltip</span><span class=\"token punctuation\">(</span><span class=\"token string\">\'_fixTitle\'</span><span class=\"token punctuation\">)</span>\r\n				<span class=\"token punctuation\">.</span><span class=\"token function\">tooltip</span><span class=\"token punctuation\">(</span><span class=\"token string\">\'show\'</span><span class=\"token punctuation\">)</span>\r\n				<span class=\"token punctuation\">.</span><span class=\"token function\">attr</span><span class=\"token punctuation\">(</span><span class=\"token string\">\'title\'</span><span class=\"token punctuation\">,</span> <span class=\"token string\">\'Copy to clipboard\'</span><span class=\"token punctuation\">)</span>\r\n				<span class=\"token punctuation\">.</span><span class=\"token function\">tooltip</span><span class=\"token punctuation\">(</span><span class=\"token string\">\'_fixTitle\'</span><span class=\"token punctuation\">)</span>\r\n\r\n			e<span class=\"token punctuation\">.</span><span class=\"token function\">clearSelection</span><span class=\"token punctuation\">(</span><span class=\"token punctuation\">)</span>\r\n		<span class=\"token punctuation\">}</span><span class=\"token punctuation\">)</span>\r\n\r\n		clipboard<span class=\"token punctuation\">.</span><span class=\"token function\">on</span><span class=\"token punctuation\">(</span><span class=\"token string\">\'error\'</span><span class=\"token punctuation\">,</span> <span class=\"token keyword\">function</span><span class=\"token punctuation\">(</span><span class=\"token parameter\">e</span><span class=\"token punctuation\">)</span> <span class=\"token punctuation\">{</span>\r\n			<span class=\"token keyword\">var</span> modifierKey <span class=\"token operator\">=</span> <span class=\"token regex\"><span class=\"token regex-delimiter\">/</span><span class=\"token regex-source language-regex\">Mac</span><span class=\"token regex-delimiter\">/</span><span class=\"token regex-flags\">i</span></span><span class=\"token punctuation\">.</span><span class=\"token function\">test</span><span class=\"token punctuation\">(</span>navigator<span class=\"token punctuation\">.</span>userAgent<span class=\"token punctuation\">)</span> <span class=\"token operator\">?</span> <span class=\"token string\">\'\\u2318\'</span> <span class=\"token operator\">:</span> <span class=\"token string\">\'Ctrl-\'</span>\r\n			<span class=\"token keyword\">var</span> fallbackMsg <span class=\"token operator\">=</span> <span class=\"token string\">\'Press \'</span> <span class=\"token operator\">+</span> modifierKey <span class=\"token operator\">+</span> <span class=\"token string\">\'C to copy\'</span>\r\n\r\n			<span class=\"token function\">$</span><span class=\"token punctuation\">(</span>e<span class=\"token punctuation\">.</span>trigger<span class=\"token punctuation\">)</span>\r\n				<span class=\"token punctuation\">.</span><span class=\"token function\">attr</span><span class=\"token punctuation\">(</span><span class=\"token string\">\'title\'</span><span class=\"token punctuation\">,</span> fallbackMsg<span class=\"token punctuation\">)</span>\r\n				<span class=\"token punctuation\">.</span><span class=\"token function\">tooltip</span><span class=\"token punctuation\">(</span><span class=\"token string\">\'_fixTitle\'</span><span class=\"token punctuation\">)</span>\r\n				<span class=\"token punctuation\">.</span><span class=\"token function\">tooltip</span><span class=\"token punctuation\">(</span><span class=\"token string\">\'show\'</span><span class=\"token punctuation\">)</span>\r\n				<span class=\"token punctuation\">.</span><span class=\"token function\">attr</span><span class=\"token punctuation\">(</span><span class=\"token string\">\'title\'</span><span class=\"token punctuation\">,</span> <span class=\"token string\">\'Copy to clipboard\'</span><span class=\"token punctuation\">)</span>\r\n				<span class=\"token punctuation\">.</span><span class=\"token function\">tooltip</span><span class=\"token punctuation\">(</span><span class=\"token string\">\'_fixTitle\'</span><span class=\"token punctuation\">)</span>\r\n		<span class=\"token punctuation\">}</span><span class=\"token punctuation\">)</span>\r\n\r\n		<span class=\"token comment\">// Initialize highlight.js plugin</span>\r\n		hljs<span class=\"token punctuation\">.</span><span class=\"token function\">highlightBlock</span><span class=\"token punctuation\">(</span>block<span class=\"token punctuation\">)</span><span class=\"token punctuation\">;</span>\r\n	<span class=\"token punctuation\">}</span></code></pre><p><br><br></p>', 1, 0, 1, 1, 1, 0, 0, '2023-09-08 06:23:36', '2023-09-08 06:23:36'),
(8, 'Jl3wixBIh', 10, 2, 'Did you pray today?', 'did-you-pray-today', 'Nunc lobortis cursus justo eget mattis. Integer efficitur semper purus at blandit. Mauris ex eros, fringilla at urna sed, eleifend auctor nulla. In tempor magna ante, sed interdum quam ultricies sed. Sed et mi feugiat, dapibus erat vitae, faucibus nulla. Vivamus pulvinar leo in metus vulputate auctor eu in arcu. Morbi sit amet neque fermentum, venenatis risus vel, rutrum tortor. Vestibulum ante.', 'Lorem, Ipsum', '<p><iframe width=\"500\" height=\"281\" src=\"https://www.youtube.com/embed/7q8f5kapcZg?feature=oembed\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen=\"\" title=\"Backlash From Male Loneliness Epidemic &quot;Men Deserve Far Worse&quot;\"></iframe><br></p>', 1, 0, 1, 1, 1, 0, 0, '2023-09-25 11:34:32', '2023-09-25 12:28:28'),
(9, 'HFHFQKhlD', 10, 2, 'Aenean in enim eu elit ultrices rutrum ac nec quam', 'aenean-in-enim-eu-elit-ultrices-rutrum-ac-nec-quam', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras metus odio, commodo id bibendum non, scelerisque varius tortor. Aenean in enim eu elit ultrices rutrum ac nec quam. Nunc et erat at turpis sollicitudin molestie eu sit amet justo. Nunc ut nibh auctor, malesuada orci sit amet, aliquet felis. Sed arcu massa, hendrerit at dignissim viverra, faucibus vel sapien.', 'Lorem, Ipsum', '<p><img src=\"https://net-twin.de/net/content/uploads/photos/2023/10/nettwin_c9a36c098be5a4935ab11eb6dbb2cade.jpg\" style=\"font-family: var(--gen-font-family); font-size: 1.0625rem; text-align: var(--bs-body-text-align);\" alt=\"\"><img src=\"http://www.flickr.com/photos/onement/1239189689/\" alt=\"\"><br></p>', 1, 1, 1, 1, 1, 0, 0, '2023-10-06 11:06:24', '2023-10-06 11:07:23'),
(10, 'rFosRiwKp', 9, 1, 'Donec laoreet pellentesque orci', 'donec-laoreet-pellentesque-orci', 'Aliquam commodo ante eu sem lacinia, et aliquam magna vehicula. Duis convallis hendrerit condimentum. Proin vulputate libero vel dui vulputate dictum. Donec laoreet pellentesque orci. Etiam at orci ac ante lobortis tempus. Integer et justo ut velit efficitur cursus. In malesuada rhoncus ante, non ultricies nulla porttitor quis. Donec purus orci, consectetur at odio eget, tristique bibendum nulla.', 'Sonko', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras metus odio, commodo id bibendum non, scelerisque varius tortor. Aenean in enim eu elit ultrices rutrum ac nec quam. Nunc et erat at turpis sollicitudin molestie eu sit amet justo.&nbsp;</p><p>Nunc ut nibh auctor, malesuada orci sit amet, aliquet felis. Sed arcu massa, hendrerit at dignissim viverra, faucibus vel sapien. Aenean aliquet diam ac volutpat sodales. Suspendisse ultricies mi elit, ut fermentum neque dignissim sed. Donec mauris velit, tristique vitae ultricies ut, semper sit amet tellus. In tincidunt urna non egestas rutrum. Nullam at est nisl. Nullam porta egestas tortor, et facilisis nisi faucibus quis.&nbsp;</p><p>Quisque viverra eros a tortor porta tincidunt. Maecenas vitae purus sit amet lorem iaculis venenatis ac sit amet augue. Donec tempor bibendum nisi sit amet imperdiet.\r\n</p><p>Aliquam commodo ante eu sem lacinia, et aliquam magna vehicula. Duis convallis hendrerit condimentum. Proin vulputate libero vel dui vulputate dictum. Donec laoreet pellentesque orci. Etiam at orci ac ante lobortis tempus. Integer et justo ut velit efficitur cursus.&nbsp;</p><p>In malesuada rhoncus ante, non ultricies nulla porttitor quis. Donec purus orci, consectetur at odio eget, tristique bibendum nulla. In non nisi sit amet velit consequat pulvinar. Cras non diam eu risus facilisis facilisis nec sed purus. In sodales magna at urna pellentesque semper. Proin sed condimentum mi, quis aliquet ligula. Vestibulum in augue vitae elit porta ornare. Vivamus ut suscipit mi. Duis commodo vehicula ligula, quis vulputate risus congue quis</p><p>\r\n</p>', 1, 0, 1, 1, 1, 0, 0, '2023-10-06 11:11:10', '2023-10-06 11:11:10'),
(11, 'gThK4YtMo', 1, 1, 'Building a $425,000-ARR A.I. startup: 57 Business Questions Worth Asking', 'building-a-425000-arr-ai-startup-57-business-questions-worth-asking', 'Nullam congue ex a vestibulum aliquet. Nunc egestas, leo in sagittis gravida, nisi urna mollis tellus, et eleifend orci orci ac felis. Cl*** aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam sed tellus purus. Nunc eu vestibulum quam, in sollicitudin ipsum', 'Lorem, Ipsum', '<p>We\'re an AI startup growing 400% per year, at $425k ARR right now with basically zero cash left, and still optimistic.</p><p><br></p><p><img src=\"https://storage.googleapis.com/indie-hackers.appspot.com/post-images/ae76d46375/UlC4Zt1j7sdDF7naQxFpqlv7Atn1/567281bd-802c-ef10-8b0e-ca03d4fbbc38.png\" alt=\"\"><br></p><p><br></p>', 1, 0, 1, 1, 1, 0, 0, '2023-10-07 10:37:12', '2023-11-20 12:21:57'),
(13, 'CH5PF6nRK', 14, 2, 'Morbi nulla nunc, maximus sed tortor in', 'morbi-nulla-nunc-maximus-sed-tortor-in', 'Suspendisse vestibulum velit a ante rutrum, sit amet viverra lectus ultrices. Vestibulum in dui a purus dictum tincidunt sit amet ut nisl. Morbi nulla nunc, maximus sed tortor in, fringilla aliquet libero. Morbi faucibus placerat mi nec hendrerit. Vestibulum facilisis urna magna', 'Lorem, Ipsum', '<h1>Great Individual</h1><p><br></p><p><img src=\"https://media2.giphy.com/media/ifzgfPmJ9Tm5hXSAuG/giphy.gif?cid=a51c33e6ihjj2xmcsznhysd63mgttwr7l23iupnp6kjjh18s&ep=v1_gifs_trending&rid=giphy.gif&ct=g\" alt=\"Excited Gwen Stefani GIF by The Voice\"><br></p>', 1, 0, 1, 1, 1, 0, 0, '2023-11-13 07:55:30', '2023-11-18 12:09:57'),
(14, 'k3vKOPrw6', 6, 4, 'This code is worth $30,000+', 'this-code-is-worth-30000', 'Okay, the title of this post is a bit click baity, but in fact the code I wrote just crossed $30.000 of revenue.', 'Revenue, Code', '<p>The product I am talking about is my SaaS starter kit supastarter (https://supastarter.dev). </p><p>It essentially is a codebase that comes with all the common SaaS functionalities like auth, i18n, payments and so on already implemented.\r\n</p><p>I started to over a year ago in August of 2022 to build the initial Next.js starter kit for myself, so that I would not have to repeat myself over and over again when starting new SaaS apps for my clients. I never really had the intention to (in the beginning) to make real money from this, but I created a small landing page and put a price tag of $49 on i, which would get you access to the repository and a Discord server for support. I said to myself \"If this thing makes me $1k, it\'s a huge success for me\", not believing that could actually happen.</p><p>\r\n</p>', 1, 0, 1, 1, 1, 0, 0, '2023-11-20 14:30:40', '2023-11-20 14:30:40'),
(15, 'QzWdx4zbP', 9, 8, 'How to build AI products that make $$$', 'how-to-build-ai-products-that-make', 'Every day 1000s of AI tools are launched, 99% of them fail to make sizeable revenue.\r\nMost of them are wrappers that use a bunch of API calls and often lack any kind of MOAT', 'Ai, Products', '<p><img src=\"https://media0.giphy.com/media/3og0IK5Wj4g10fwUAU/giphy.gif?cid=a51c33e6kbuvupisrcd7n5ocosmoneyi6mbhptrlt47navu2&ep=v1_gifs_search&rid=giphy.gif&ct=g\" alt=\"aging crazy eyes GIF by Jacqueline Jing Lin\"><br></p>', 1, 0, 1, 1, 1, 0, 0, '2023-11-20 14:43:46', '2023-11-20 14:43:46'),
(16, 'PUHHX0M8s', 8, 3, 'Biden\'s Impeachment Inquiry', 'bidens-impeachment-inquiry', 'Biden\'s Impeachment Inquiry', 'Biden', '<p><img src=\"https://media3.giphy.com/media/aIQkB7ObOo72CFvxbB/giphy.gif?cid=a51c33e67tadlp0neicz7iemei30nfcowowi7empsvbn0dud&ep=v1_gifs_trending&rid=giphy.gif&ct=g\" alt=\"Inquiry GIF by GIPHY News\"></p>', 1, 0, 1, 1, 1, 0, 0, '2023-12-14 09:55:15', '2023-12-14 09:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `posts_views`
--

CREATE TABLE `posts_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts_views`
--

INSERT INTO `posts_views` (`id`, `post_id`, `user_id`, `ip`, `agent`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 11:38:25', '2023-08-23 11:38:25'),
(2, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 11:39:09', '2023-08-23 11:39:09'),
(3, 1, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 11:41:58', '2023-08-23 11:41:58'),
(4, 1, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 11:42:28', '2023-08-23 11:42:28'),
(5, 1, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 11:43:09', '2023-08-23 11:43:09'),
(6, 1, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 12:06:43', '2023-08-23 12:06:43'),
(7, 3, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 14:19:03', '2023-08-23 14:19:03'),
(8, 1, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 15:04:17', '2023-08-23 15:04:17'),
(9, 1, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 15:31:46', '2023-08-23 15:31:46'),
(10, 1, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 15:38:33', '2023-08-23 15:38:33'),
(11, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 15:39:57', '2023-08-23 15:39:57'),
(12, 2, 8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 15:40:40', '2023-08-23 15:40:40'),
(13, 2, 8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 15:41:30', '2023-08-23 15:41:30'),
(14, 2, 8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 15:42:24', '2023-08-23 15:42:24'),
(15, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 15:43:14', '2023-08-23 15:43:14'),
(16, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 15:44:06', '2023-08-23 15:44:06'),
(17, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 15:46:19', '2023-08-23 15:46:19'),
(18, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 15:47:42', '2023-08-23 15:47:42'),
(19, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 15:48:22', '2023-08-23 15:48:22'),
(20, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 15:49:47', '2023-08-23 15:49:47'),
(21, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 15:59:54', '2023-08-23 15:59:54'),
(22, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 16:00:06', '2023-08-23 16:00:06'),
(23, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 16:01:09', '2023-08-23 16:01:09'),
(24, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 16:02:08', '2023-08-23 16:02:08'),
(25, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 16:02:25', '2023-08-23 16:02:25'),
(26, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 16:03:24', '2023-08-23 16:03:24'),
(27, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 16:03:43', '2023-08-23 16:03:43'),
(28, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 16:10:05', '2023-08-23 16:10:05'),
(29, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 16:10:36', '2023-08-23 16:10:36'),
(30, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 16:12:38', '2023-08-23 16:12:38'),
(31, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 16:13:05', '2023-08-23 16:13:05'),
(32, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 16:13:30', '2023-08-23 16:13:30'),
(33, 2, 8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 16:14:18', '2023-08-23 16:14:18'),
(34, 2, 8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 16:14:38', '2023-08-23 16:14:38'),
(35, 2, 8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 16:26:26', '2023-08-23 16:26:26'),
(36, 2, 8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-23 17:21:49', '2023-08-23 17:21:49'),
(37, 2, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-24 07:37:56', '2023-08-24 07:37:56'),
(38, 2, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-24 07:43:18', '2023-08-24 07:43:18'),
(39, 2, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-26 08:00:26', '2023-08-26 08:00:26'),
(40, 1, 7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-30 17:50:18', '2023-08-30 17:50:18'),
(41, 2, 7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-08-30 18:31:24', '2023-08-30 18:31:24'),
(42, 2, 7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-01 07:55:13', '2023-09-01 07:55:13'),
(43, 2, 5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-01 07:57:59', '2023-09-01 07:57:59'),
(44, 4, 5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-06 05:55:52', '2023-09-06 05:55:52'),
(45, 4, 4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-06 06:42:21', '2023-09-06 06:42:21'),
(46, 4, 4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 05:16:15', '2023-09-07 05:16:15'),
(47, 4, 4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 05:18:19', '2023-09-07 05:18:19'),
(48, 2, 4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 05:42:13', '2023-09-07 05:42:13'),
(49, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 06:19:43', '2023-09-07 06:19:43'),
(50, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 06:20:12', '2023-09-07 06:20:12'),
(51, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 06:21:49', '2023-09-07 06:21:49'),
(52, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 06:23:34', '2023-09-07 06:23:34'),
(53, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 06:23:50', '2023-09-07 06:23:50'),
(54, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 06:24:07', '2023-09-07 06:24:07'),
(55, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 06:25:01', '2023-09-07 06:25:01'),
(56, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 06:25:13', '2023-09-07 06:25:13'),
(57, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 06:29:57', '2023-09-07 06:29:57'),
(58, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 06:30:10', '2023-09-07 06:30:10'),
(59, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 06:31:16', '2023-09-07 06:31:16'),
(60, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 06:31:57', '2023-09-07 06:31:57'),
(61, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 06:32:17', '2023-09-07 06:32:17'),
(62, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 06:32:46', '2023-09-07 06:32:46'),
(63, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 06:33:07', '2023-09-07 06:33:07'),
(64, 3, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 09:17:56', '2023-09-07 09:17:56'),
(65, 3, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 09:19:48', '2023-09-07 09:19:48'),
(66, 2, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 09:20:40', '2023-09-07 09:20:40'),
(67, 2, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 09:20:41', '2023-09-07 09:20:41'),
(68, 2, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 09:21:13', '2023-09-07 09:21:13'),
(69, 2, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 09:28:23', '2023-09-07 09:28:23'),
(70, 3, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 09:28:59', '2023-09-07 09:28:59'),
(71, 1, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 09:29:30', '2023-09-07 09:29:30'),
(72, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 11:08:57', '2023-09-07 11:08:57'),
(73, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 11:20:38', '2023-09-07 11:20:38'),
(74, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 11:24:45', '2023-09-07 11:24:45'),
(75, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-07 14:12:30', '2023-09-07 14:12:30'),
(76, 4, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-09-08 05:35:02', '2023-09-08 05:35:02'),
(77, 4, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-09-08 05:56:21', '2023-09-08 05:56:21'),
(78, 4, NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-09-08 05:56:46', '2023-09-08 05:56:46'),
(79, 4, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-09-08 06:10:59', '2023-09-08 06:10:59'),
(80, 4, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-09-08 06:13:34', '2023-09-08 06:13:34'),
(81, 4, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-09-08 06:14:28', '2023-09-08 06:14:28'),
(82, 4, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-09-08 06:15:00', '2023-09-08 06:15:00'),
(83, 4, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-09-08 06:16:01', '2023-09-08 06:16:01'),
(84, 4, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-09-08 06:16:25', '2023-09-08 06:16:25'),
(85, 4, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-09-08 06:18:34', '2023-09-08 06:18:34'),
(86, 4, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-09-08 06:20:47', '2023-09-08 06:20:47'),
(87, 7, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-09-08 06:23:50', '2023-09-08 06:23:50'),
(88, 7, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-09-08 06:28:11', '2023-09-08 06:28:11'),
(89, 7, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-09-08 06:29:31', '2023-09-08 06:29:31'),
(90, 7, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-09-08 06:33:24', '2023-09-08 06:33:24'),
(91, 7, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-09-08 06:34:11', '2023-09-08 06:34:11'),
(92, 7, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-09-08 06:39:00', '2023-09-08 06:39:00'),
(93, 6, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-08 08:56:08', '2023-09-08 08:56:08'),
(94, 4, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-08 08:56:19', '2023-09-08 08:56:19'),
(95, 7, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-08 08:57:12', '2023-09-08 08:57:12'),
(96, 7, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-09 09:54:12', '2023-09-09 09:54:12'),
(97, 6, 4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-09 12:36:08', '2023-09-09 12:36:08'),
(98, 6, 4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-09 12:41:52', '2023-09-09 12:41:52'),
(99, 6, 4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-09 12:43:45', '2023-09-09 12:43:45'),
(100, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-12 15:45:21', '2023-09-12 15:45:21'),
(101, 2, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 09:39:58', '2023-09-23 09:39:58'),
(102, 2, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 16:22:06', '2023-09-23 16:22:06'),
(103, 4, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 18:47:23', '2023-09-23 18:47:23'),
(104, 2, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-25 11:01:39', '2023-09-25 11:01:39'),
(105, 8, 10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-25 11:34:59', '2023-09-25 11:34:59'),
(106, 8, 10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-25 11:35:28', '2023-09-25 11:35:28'),
(107, 8, 10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-25 12:26:54', '2023-09-25 12:26:54'),
(108, 8, 10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-25 12:27:41', '2023-09-25 12:27:41'),
(109, 8, 10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-25 12:28:04', '2023-09-25 12:28:04'),
(110, 8, 10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-25 12:28:30', '2023-09-25 12:28:30'),
(111, 2, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-09-26 04:34:14', '2023-09-26 04:34:14'),
(112, 4, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-09-26 04:35:14', '2023-09-26 04:35:14'),
(113, 7, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-09-26 04:36:28', '2023-09-26 04:36:28'),
(114, 4, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-02 11:05:37', '2023-10-02 11:05:37'),
(115, 7, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-02 11:06:28', '2023-10-02 11:06:28'),
(116, 8, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-06 11:02:30', '2023-10-06 11:02:30'),
(117, 8, 10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-06 11:03:05', '2023-10-06 11:03:05'),
(118, 9, 10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-06 11:06:57', '2023-10-06 11:06:57'),
(119, 9, 10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-06 11:07:25', '2023-10-06 11:07:25'),
(120, 9, 9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-06 11:33:40', '2023-10-06 11:33:40'),
(121, 9, 9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-06 11:34:08', '2023-10-06 11:34:08'),
(122, 9, 9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-06 11:44:38', '2023-10-06 11:44:38'),
(123, 1, 9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-06 12:25:06', '2023-10-06 12:25:06'),
(124, 9, 9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-06 12:48:08', '2023-10-06 12:48:08'),
(125, 11, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-07 10:39:09', '2023-10-07 10:39:09'),
(126, 7, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-07 10:47:38', '2023-10-07 10:47:38'),
(127, 9, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-07 11:46:38', '2023-10-07 11:46:38'),
(128, 9, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-07 11:47:39', '2023-10-07 11:47:39'),
(129, 9, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-07 11:48:05', '2023-10-07 11:48:05'),
(130, 8, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-11 06:23:54', '2023-10-11 06:23:54'),
(131, 6, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-11 06:55:39', '2023-10-11 06:55:39'),
(132, 2, 10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-11 12:35:59', '2023-10-11 12:35:59'),
(133, 9, 9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-11 12:37:58', '2023-10-11 12:37:58'),
(134, 8, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-10-14 05:35:09', '2023-10-14 05:35:09'),
(135, 6, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-10-14 09:09:03', '2023-10-14 09:09:03'),
(136, 6, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-10-14 09:10:26', '2023-10-14 09:10:26'),
(137, 6, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-10-14 09:11:49', '2023-10-14 09:11:49'),
(138, 6, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-10-14 09:12:05', '2023-10-14 09:12:05'),
(139, 6, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-10-14 09:12:29', '2023-10-14 09:12:29'),
(140, 6, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-10-14 09:12:39', '2023-10-14 09:12:39'),
(141, 3, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-10-24 11:30:28', '2023-10-24 11:30:28'),
(142, 7, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-10-28 10:52:40', '2023-10-28 10:52:40'),
(143, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-11 11:50:06', '2023-11-11 11:50:06'),
(144, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-11 11:53:06', '2023-11-11 11:53:06'),
(145, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-11 11:53:22', '2023-11-11 11:53:22'),
(146, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-11 11:56:06', '2023-11-11 11:56:06'),
(147, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-11 12:07:15', '2023-11-11 12:07:15'),
(148, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-11 12:12:36', '2023-11-11 12:12:36'),
(149, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-11 12:15:22', '2023-11-11 12:15:22'),
(150, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-11 12:17:25', '2023-11-11 12:17:25'),
(151, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-11 12:21:46', '2023-11-11 12:21:46'),
(152, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-11 12:22:11', '2023-11-11 12:22:11'),
(153, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-11 12:23:26', '2023-11-11 12:23:26'),
(154, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-11 12:26:15', '2023-11-11 12:26:15'),
(155, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-11 12:28:27', '2023-11-11 12:28:27'),
(157, 13, 14, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-13 07:55:45', '2023-11-13 07:55:45'),
(158, 13, 14, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-13 08:03:36', '2023-11-13 08:03:36'),
(159, 13, 14, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-13 08:04:36', '2023-11-13 08:04:36'),
(160, 13, 14, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-13 08:05:47', '2023-11-13 08:05:47'),
(161, 8, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-13 15:39:58', '2023-11-13 15:39:58'),
(162, 4, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-18 11:51:36', '2023-11-18 11:51:36'),
(163, 9, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-19 06:48:42', '2023-11-19 06:48:42'),
(164, 1, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-19 06:49:34', '2023-11-19 06:49:34'),
(165, 1, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-19 06:50:15', '2023-11-19 06:50:15'),
(166, 9, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-19 11:42:24', '2023-11-19 11:42:24'),
(167, 9, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-19 11:43:30', '2023-11-19 11:43:30'),
(168, 9, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-19 11:44:28', '2023-11-19 11:44:28'),
(169, 9, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-19 11:46:08', '2023-11-19 11:46:08'),
(170, 9, 12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-20 14:46:12', '2023-11-20 14:46:12'),
(171, 9, 12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-20 14:47:05', '2023-11-20 14:47:05'),
(172, 15, 12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-20 14:47:31', '2023-11-20 14:47:31'),
(173, 15, 12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-20 14:48:19', '2023-11-20 14:48:19'),
(174, 14, 13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-20 14:49:24', '2023-11-20 14:49:24'),
(175, 14, 13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-20 14:49:59', '2023-11-20 14:49:59'),
(176, 2, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-21 17:26:36', '2023-11-21 17:26:36'),
(177, 2, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-21 17:27:30', '2023-11-21 17:27:30'),
(178, 16, 7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2023-12-14 09:56:21', '2023-12-14 09:56:21'),
(179, 16, 5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2023-12-14 10:16:36', '2023-12-14 10:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `reactable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reactable_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reactions`
--

INSERT INTO `reactions` (`id`, `user_id`, `reactable_type`, `reactable_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 2, 'App\\Models\\Posts', 2, 'haha', '2023-08-23 11:39:30', '2023-08-23 11:39:30'),
(2, 4, 'App\\Models\\Posts', 1, 'like', '2023-08-23 11:46:30', '2023-08-23 11:46:30'),
(5, 8, 'App\\Models\\Posts', 2, 'wow', '2023-08-23 16:25:27', '2023-08-23 16:25:27'),
(12, 7, 'App\\Models\\Posts', 3, 'haha', '2023-08-30 18:38:20', '2023-08-30 18:38:20'),
(15, 6, 'App\\Models\\Posts', 2, 'love', '2023-09-01 08:39:46', '2023-09-01 08:39:46'),
(16, 5, 'App\\Models\\Posts', 6, 'like', '2023-09-07 10:47:57', '2023-09-07 10:47:57'),
(20, 2, 'App\\Models\\Posts', 7, 'like', '2023-09-23 19:04:15', '2023-09-23 19:04:15'),
(22, 9, 'App\\Models\\Posts', 10, 'love', '2023-10-06 11:20:12', '2023-10-06 11:20:12'),
(23, 9, 'App\\Models\\Posts', 9, 'wow', '2023-10-06 11:32:14', '2023-10-06 11:32:14'),
(24, 9, 'App\\Models\\Posts', 2, 'mad', '2023-10-06 11:32:27', '2023-10-06 11:32:27'),
(25, 9, 'App\\Models\\Posts', 1, 'like', '2023-10-06 12:24:38', '2023-10-06 12:24:38'),
(26, 1, 'App\\Models\\Posts', 9, 'wow', '2023-10-07 10:43:13', '2023-10-07 10:43:13'),
(27, 14, 'App\\Models\\Posts', 13, 'love', '2023-11-13 08:07:15', '2023-11-13 08:07:15'),
(28, 1, 'App\\Models\\Posts', 3, 'love', '2023-11-20 13:57:17', '2023-11-20 13:57:17'),
(30, 6, 'App\\Models\\Posts', 14, 'love', '2023-11-20 14:30:52', '2023-11-20 14:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `solution` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `comment_id`, `user_id`, `body`, `status`, `solution`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '<p><img src=\"https://media0.giphy.com/media/fVLlVltDnWrJMlAxmi/giphy-downsized.gif?cid=a51c33e65txbbuv0xpa882ny4tftyq85tjl90shfjhla7688&ep=v1_gifs_trending&rid=giphy-downsized.gif&ct=g\" alt=\"Happy Football GIF by ElevenDAZN\"><br></p><p><br></p>', 1, 0, '2023-08-23 15:48:20', '2023-11-18 12:46:46'),
(2, 4, 2, '<p><img src=\"https://media3.giphy.com/media/tXL4FHPSnVJ0A/giphy.gif?cid=a51c33e65txbbuv0xpa882ny4tftyq85tjl90shfjhla7688&amp;ep=v1_gifs_trending&amp;rid=giphy.gif&amp;ct=g\" alt=\"Bored Cabin Fever GIF\"></p>', 1, 1, '2023-08-23 16:10:34', '2023-08-23 16:26:24'),
(3, 3, 1, '<p><img src=\"https://media4.giphy.com/media/MS9Yq6Y718CSiDTxR5/giphy.gif?cid=a51c33e6vyhs79ju05kq61xftjw7t3h65rmtyd95qidhs8js&ep=v1_gifs_trending&rid=giphy.gif&ct=g\" alt=\"Inspired Good Morning GIF by BrittDoesDesign\"></p>', 1, 0, '2023-11-19 06:50:12', '2023-11-19 06:50:12'),
(4, 9, 12, '<p>I Remember this video</p><p><br></p><p><img src=\"https://media1.giphy.com/media/8hEVYzN6hie1z6dNBo/giphy-downsized.gif?cid=a51c33e6wi4hobmrop58qk2ji74w714ak1ihivi75cxk3bsw&ep=v1_gifs_trending&rid=giphy-downsized.gif&ct=g\" alt=\"Basketball Hoops GIF by USC Trojans\"><br></p>', 1, 0, '2023-11-20 14:47:02', '2023-11-20 14:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `report_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `report_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `report_type`, `report_id`, `created_at`, `updated_at`) VALUES
(1, 9, 'Post', 13, '2023-11-19 06:23:26', '2023-11-19 06:23:26'),
(2, 9, 'Post', 10, '2023-11-19 06:28:34', '2023-11-19 06:28:34'),
(3, 1, 'Comment', 9, '2023-11-19 06:49:04', '2023-11-19 06:49:04'),
(4, 1, 'Reply', 3, '2023-11-19 06:50:25', '2023-11-19 06:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `report_users`
--

CREATE TABLE `report_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `report_users`
--

INSERT INTO `report_users` (`id`, `sender_id`, `user_id`, `category`, `reason`, `created_at`, `updated_at`) VALUES
(1, 4, 14, 'Spam', 'User has sent me Spam Messages', '2023-11-13 10:04:34', '2023-11-13 10:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` tinyint(1) DEFAULT 0,
  `badges` tinyint(1) DEFAULT 0,
  `posts` tinyint(1) DEFAULT 0,
  `comments` tinyint(1) DEFAULT 0,
  `replies` tinyint(1) DEFAULT 0,
  `chats` tinyint(1) DEFAULT 0,
  `reports` tinyint(1) DEFAULT 0,
  `ban_durations` tinyint(1) DEFAULT 0,
  `banned_users` tinyint(1) DEFAULT 0,
  `plans` tinyint(1) DEFAULT 0,
  `buy_points` tinyint(1) DEFAULT 0,
  `deposits` tinyint(1) DEFAULT 0,
  `subscriptions` tinyint(1) DEFAULT 0,
  `tips` tinyint(1) DEFAULT 0,
  `withdrawals` tinyint(1) DEFAULT 0,
  `transactions` tinyint(1) DEFAULT 0,
  `users` tinyint(1) DEFAULT 0,
  `roles` tinyint(1) DEFAULT 0,
  `pages` tinyint(1) DEFAULT 0,
  `faqs` tinyint(1) DEFAULT 0,
  `site_settings` tinyint(1) DEFAULT 0,
  `gateways` tinyint(1) DEFAULT 0,
  `language` tinyint(1) DEFAULT 0,
  `mail` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `categories`, `badges`, `posts`, `comments`, `replies`, `chats`, `reports`, `ban_durations`, `banned_users`, `plans`, `buy_points`, `deposits`, `subscriptions`, `tips`, `withdrawals`, `transactions`, `users`, `roles`, `pages`, `faqs`, `site_settings`, `gateways`, `language`, `mail`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-11-19 08:56:57', '2023-11-19 08:56:57'),
(3, 'Moderator', 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-11-19 08:58:18', '2023-11-19 08:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `type`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'ApexForum', '2023-07-13 06:25:10', '2023-07-13 06:30:19'),
(2, 'site_title', 'The Ultimate Forum & Community Discussions Platform', '2023-07-13 06:25:10', '2023-11-20 11:30:27'),
(3, 'site_description', 'Connect with fellow community users and ask questions, get answers plus also earn money through tips.', '2023-07-13 06:25:10', '2023-11-20 11:30:27'),
(4, 'site_keywords', 'Forum, Community, Users, Developers', '2023-07-13 06:25:10', '2023-11-20 11:30:27'),
(5, 'contact_email', 'admin@apexforum.com', '2023-07-13 06:25:10', '2023-11-20 11:30:27'),
(6, 'timezone', 'Default', '2023-07-13 06:25:10', '2023-07-13 06:30:19'),
(7, 'logo_light', '1689254824.jpg', '2023-07-13 06:25:12', '2023-07-13 10:27:04'),
(8, 'logo_dark', '1689254859.png', '2023-07-13 06:25:12', '2023-07-13 10:27:39'),
(9, 'favicon', '1700490502.jpg', '2023-07-13 06:25:13', '2023-11-20 11:28:22'),
(10, 'default_currency', '1', '2023-07-13 06:41:23', '2023-07-13 06:41:34'),
(11, 'symbol_format', '1', '2023-07-13 06:41:45', '2023-07-13 06:42:00'),
(12, 'no_of_decimals', '0', '2023-07-13 06:41:45', '2023-07-13 06:42:00'),
(13, 'new_posts', 'Visible', '2023-07-14 11:21:19', '2023-08-23 10:28:02'),
(14, 'results_per_page', '10', '2023-07-14 11:33:51', '2023-11-19 13:01:33'),
(15, 'minimum_characters', '30', '2023-07-14 11:33:51', '2023-07-14 15:00:56'),
(16, 'maximum_characters', '1239900000', '2023-07-14 11:33:51', '2023-07-14 15:00:56'),
(17, 'maximum_preview_chars', '400', '2023-07-14 11:33:51', '2023-07-14 15:00:56'),
(19, 'word_censored', '1', '2023-07-14 11:41:34', '2023-11-13 07:21:48'),
(20, 'alert_reports', '10', '2023-07-14 11:49:28', '2023-07-14 15:00:56'),
(21, 'categories_widget', '6', '2023-07-14 11:49:28', '2023-07-14 15:00:57'),
(22, 'trending_posts_widget', '7', '2023-07-14 11:49:28', '2023-07-14 15:00:57'),
(23, 'points_system', '1', '2023-07-14 15:35:41', '2023-10-27 15:50:13'),
(28, 'like', '3', '2023-07-14 15:35:41', '2023-08-18 10:29:45'),
(29, 'comment', '6', '2023-07-14 15:35:41', '2023-07-14 15:38:02'),
(30, 'reply', '4', '2023-07-14 15:35:42', '2023-07-14 15:38:02'),
(33, 'react_like', 'React', '2023-08-18 10:11:53', '2023-09-07 10:53:32'),
(38, 'reaction', '3', '2023-08-18 10:26:38', '2023-08-18 10:29:45'),
(39, 'share', '2', '2023-08-18 10:26:38', '2023-08-18 10:29:45'),
(40, 'registration', '2', '2023-08-18 10:26:38', '2023-08-18 10:29:45'),
(41, 'login', '2', '2023-08-18 10:26:38', '2023-08-18 10:29:45'),
(42, 'new_posts_no', '10', '2023-08-18 10:28:55', '2023-08-18 10:29:45'),
(43, 'cookie_consent', 'We use cookies to give you the best online experience. By agreeing you accept the use of cookies in accordance with our cookie policy.', '2023-08-19 10:31:08', '2023-08-19 10:31:24'),
(44, 'login_bg', '1692623621.jpg', '2023-08-21 09:53:01', '2023-08-21 10:13:41'),
(45, 'new_comments', 'Visible', '2023-08-23 10:19:28', '2023-08-23 10:19:58'),
(46, 'new_replies', 'Visible', '2023-08-23 10:19:29', '2023-08-23 10:19:58'),
(47, 'pause_new_posts', 'Active', '2023-08-23 10:25:17', '2023-08-23 10:25:37'),
(48, 'currency_code', 'USD', '2023-09-26 11:36:34', '2023-10-17 05:11:22'),
(49, 'currency_symbol', '$', '2023-09-26 11:36:34', '2023-10-17 05:11:22'),
(50, 'currency_position', 'left', '2023-09-26 11:36:34', '2023-10-17 05:11:22'),
(51, 'min_tip', '2', '2023-09-26 11:36:34', '2023-10-28 10:35:06'),
(53, 'tips_commission', '20', '2023-09-26 11:36:34', '2023-10-17 05:30:38'),
(54, 'home_title', 'Ask Questions, Get Answers', '2023-10-14 05:55:31', '2023-10-14 05:57:50'),
(55, 'home_sub_title', 'Ask questions, find support, and connect with the community.', '2023-10-14 05:55:32', '2023-10-14 05:57:50'),
(56, 'home_bg', '1697276163.jpg', '2023-10-14 05:55:32', '2023-10-14 06:36:03'),
(57, 'contact_address', 'Perth, Australia', '2023-10-14 09:27:20', '2023-10-14 09:28:01'),
(58, 'contact_phone', '+44-20-7328-4499', '2023-10-14 09:27:20', '2023-10-14 09:28:01'),
(59, 'min_deposit', '5', '2023-10-17 05:01:21', '2023-10-17 05:30:38'),
(62, 'paypal_client_id', 'Acy4la1qy_wqrWUEfcn0cixn9eJMn_D4FUD6tg5A4qmfr6I_XwsB9HnLmaCRCwtIZNoHoMs9EcK_6MxA', '2023-10-17 05:48:07', '2023-10-17 06:25:29'),
(63, 'paypal_secret', 'EP7LvEtbEF7LQ0Dax2wi6aMe-JK0HBHsiT5l6zp4DQkOnW5F9EQi8D0IoF8atlj8jQYJE2m824aRAoRX', '2023-10-17 05:48:08', '2023-10-17 06:25:30'),
(64, 'paypal_active', 'Yes', '2023-10-17 06:14:19', '2023-10-17 06:25:29'),
(65, 'paypal_mode', 'sandbox', '2023-10-17 06:14:19', '2023-10-17 06:25:29'),
(66, 'paypal_fee', '5.4', '2023-10-17 06:20:59', '2023-10-17 06:25:30'),
(67, 'paypal_fee_cents', '0.30', '2023-10-17 06:20:59', '2023-10-17 06:25:30'),
(68, 'stripe_active', 'Yes', '2023-10-17 06:33:20', '2023-10-17 06:38:44'),
(69, 'stripe_key', 'pk_test_0sPQBhDwhX7x4kn3azVd0Jnn', '2023-10-17 06:33:21', '2023-10-17 06:38:44'),
(70, 'stripe_secret', 'sk_test_IMq9XsThe0AEDUNEdYwwZdxS', '2023-10-17 06:33:21', '2023-10-17 06:38:44'),
(71, 'stripe_fee', '2.9', '2023-10-17 06:33:21', '2023-10-17 06:38:44'),
(72, 'stripe_fee_cents', '0.30', '2023-10-17 06:33:21', '2023-10-17 06:38:44'),
(75, 'min_withdraw', '5', '2023-11-03 05:30:34', '2023-11-03 05:32:06'),
(76, 'days_withdraw', '7', '2023-11-07 09:29:45', '2023-11-07 09:30:07'),
(79, 'top_ad', '<img src=\"https://placehold.co/730x100/FF597B/white?text=Ad\" class=\"img-fluid\">', '2023-11-19 11:23:48', '2023-11-20 11:24:42'),
(80, 'footer_ad', '<img src=\"https://placehold.co/730x100/FF597B/white?text=Ad\" class=\"img-fluid\">', '2023-11-19 11:23:48', '2023-11-20 11:24:42'),
(81, 'sidebar_ad', '<img src=\"https://placehold.co/350x300/FF597B/white?text=Sidebar+Ad\" class=\"img-fluid\">', '2023-11-19 11:23:48', '2023-11-20 11:24:43'),
(82, 'ads', '1', '2023-11-20 11:06:37', '2023-11-20 11:06:45'),
(83, 'site_direction', 'ltr', '2023-11-20 15:00:55', '2023-11-20 16:07:45'),
(85, 'analytics', '<!-- Google tag (gtag.js) -->\r\n<script async src=\"https://www.googletagmanager.com/gtag/js?id=G-J2Q9ETQ5SX\"></script>\r\n<script>\r\n  window.dataLayer = window.dataLayer || [];\r\n  function gtag(){dataLayer.push(arguments);}\r\n  gtag(\'js\', new Date());\r\n\r\n  gtag(\'config\', \'G-J2Q9ETQ5SX\');\r\n</script>', '2024-01-03 07:25:51', '2024-01-03 07:31:15'),
(86, 'adsense', '', '2024-01-03 07:25:57', '2024-01-03 07:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

CREATE TABLE `shares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `verified` tinyint(1) DEFAULT 0,
  `points` int(11) NOT NULL,
  `categories` tinyint(1) DEFAULT 0,
  `tips` tinyint(1) DEFAULT 0,
  `comments` tinyint(1) DEFAULT 0,
  `reactions` tinyint(1) DEFAULT 0,
  `followers` tinyint(1) DEFAULT 0,
  `messages` tinyint(1) DEFAULT 0,
  `users` tinyint(1) DEFAULT 0,
  `viewers` tinyint(1) DEFAULT 0,
  `ads` tinyint(1) DEFAULT 0,
  `status` tinyint(1) DEFAULT 1,
  `will_expire` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `plan_id`, `price`, `verified`, `points`, `categories`, `tips`, `comments`, `reactions`, `followers`, `messages`, `users`, `viewers`, `ads`, `status`, `will_expire`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '0.00', 0, 10, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, '2073-10-24 12:08:58', '2023-10-24 09:08:58', '2023-10-24 10:43:01'),
(2, 2, 2, '8.00', 1, 100, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, '2023-11-24 12:10:31', '2023-10-24 09:10:31', '2023-10-24 10:43:01'),
(3, 2, 1, '0.00', 0, 10, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, '2073-10-24 13:43:01', '2023-10-24 10:43:01', '2023-10-24 10:43:01'),
(4, 12, 1, '0.00', 0, 10, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, '2073-10-25 13:33:16', '2023-10-25 10:33:16', '2023-10-25 10:33:16'),
(5, 13, 1, '0.00', 0, 10, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, '2073-10-25 13:34:48', '2023-10-25 10:34:49', '2023-10-25 10:34:49'),
(6, 1, 1, '0.00', 0, 10, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, '2023-11-10 12:54:27', '2023-10-26 09:54:27', '2023-11-20 12:12:45'),
(7, 4, 1, '0.00', 0, 10, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, '2073-10-27 08:43:55', '2023-10-27 05:43:55', '2023-10-27 05:43:55'),
(8, 5, 1, '0.00', 0, 10, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, '2073-11-07 13:49:53', '2023-11-07 10:49:53', '2023-11-07 10:49:53'),
(9, 3, 1, '0.00', 0, 10, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, '2073-11-11 15:52:35', '2023-11-11 12:52:35', '2023-11-11 12:52:35'),
(10, 14, 1, '0.00', 0, 10, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, '2073-11-13 09:34:04', '2023-11-13 06:34:04', '2023-11-13 06:34:04'),
(14, 1, 1, '0.00', 0, 10, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, '2073-11-20 15:12:45', '2023-11-20 12:12:45', '2023-11-20 12:12:45'),
(15, 6, 1, '0.00', 0, 10, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, '2073-11-20 17:28:17', '2023-11-20 14:28:17', '2023-11-20 14:32:32'),
(16, 6, 2, '8.00', 1, 100, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-12-20 17:32:32', '2023-11-20 14:32:32', '2023-11-20 14:32:32'),
(17, 7, 1, '0.00', 0, 10, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, '2073-11-20 17:33:37', '2023-11-20 14:33:37', '2023-11-20 14:33:37'),
(18, 8, 2, '8.00', 1, 100, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, '2023-12-20 17:37:42', '2023-11-20 14:37:42', '2024-01-18 08:38:39'),
(19, 9, 1, '0.00', 0, 10, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, '2073-11-20 17:39:22', '2023-11-20 14:39:22', '2023-11-20 14:39:22'),
(20, 10, 1, '0.00', 0, 10, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, '2073-11-20 17:44:39', '2023-11-20 14:44:39', '2023-11-20 14:44:39'),
(21, 8, 1, '0.00', 0, 10, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, '2074-01-18 11:38:39', '2024-01-18 08:38:39', '2024-01-18 08:38:39');

-- --------------------------------------------------------

--
-- Table structure for table `tagging_tagged`
--

CREATE TABLE `tagging_tagged` (
  `id` int(10) UNSIGNED NOT NULL,
  `taggable_id` int(10) UNSIGNED NOT NULL,
  `taggable_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagging_tagged`
--

INSERT INTO `tagging_tagged` (`id`, `taggable_id`, `taggable_type`, `tag_name`, `tag_slug`) VALUES
(1, 1, 'App\\Models\\Posts', 'Lorem', 'lorem'),
(2, 1, 'App\\Models\\Posts', 'Ipsum', 'ipsum'),
(3, 1, 'App\\Models\\Posts', 'Dolor', 'dolor'),
(4, 2, 'App\\Models\\Posts', 'Lorem', 'lorem'),
(5, 2, 'App\\Models\\Posts', 'Ipsum', 'ipsum'),
(6, 2, 'App\\Models\\Posts', 'Dolor', 'dolor'),
(36, 6, 'App\\Models\\Posts', 'Blessed', 'blessed'),
(37, 6, 'App\\Models\\Posts', 'Great', 'great'),
(38, 3, 'App\\Models\\Posts', 'Laravel', 'laravel'),
(39, 3, 'App\\Models\\Posts', 'Coding', 'coding'),
(40, 4, 'App\\Models\\Posts', 'Nice', 'nice'),
(41, 4, 'App\\Models\\Posts', 'Love', 'love'),
(42, 7, 'App\\Models\\Posts', 'Quick', 'quick'),
(43, 8, 'App\\Models\\Posts', 'Lorem', 'lorem'),
(44, 8, 'App\\Models\\Posts', 'Ipsum', 'ipsum'),
(45, 9, 'App\\Models\\Posts', 'Grim', 'grim'),
(46, 9, 'App\\Models\\Posts', 'Close', 'close'),
(47, 10, 'App\\Models\\Posts', 'Dopamine', 'dopamine'),
(48, 10, 'App\\Models\\Posts', 'Hits', 'hits'),
(53, 13, 'App\\Models\\Posts', 'Lorem', 'lorem'),
(56, 14, 'App\\Models\\Posts', 'Code', 'code'),
(57, 14, 'App\\Models\\Posts', 'Revenue', 'revenue'),
(58, 15, 'App\\Models\\Posts', 'Products', 'products'),
(59, 15, 'App\\Models\\Posts', 'Ai', 'ai'),
(62, 11, 'App\\Models\\Posts', 'Growth', 'growth');

-- --------------------------------------------------------

--
-- Table structure for table `tagging_tags`
--

CREATE TABLE `tagging_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suggest` tinyint(1) NOT NULL DEFAULT 0,
  `count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `tag_group_id` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagging_tags`
--

INSERT INTO `tagging_tags` (`id`, `slug`, `name`, `suggest`, `count`, `tag_group_id`, `description`) VALUES
(1, 'lorem', 'Lorem', 0, 4, NULL, NULL),
(2, 'ipsum', 'Ipsum', 0, 3, NULL, NULL),
(3, 'dolor', 'Dolor', 0, 2, NULL, NULL),
(4, 'laravel', 'Laravel', 0, 1, NULL, NULL),
(5, 'coding', 'Coding', 0, 1, NULL, NULL),
(6, 'blessed', 'Blessed', 0, 1, NULL, NULL),
(7, 'nice', 'Nice', 0, 1, NULL, NULL),
(8, 'love', 'Love', 0, 1, NULL, NULL),
(9, 'test', 'Test', 0, 0, NULL, NULL),
(10, 'great', 'Great', 0, 1, NULL, NULL),
(11, 'quick', 'Quick', 0, 1, NULL, NULL),
(12, 'grim', 'Grim', 0, 1, NULL, NULL),
(13, 'close', 'Close', 0, 1, NULL, NULL),
(14, 'dopamine', 'Dopamine', 0, 1, NULL, NULL),
(15, 'hits', 'Hits', 0, 1, NULL, NULL),
(16, 'growth', 'Growth', 0, 1, NULL, NULL),
(17, 'code', 'Code', 0, 1, NULL, NULL),
(18, 'revenue', 'Revenue', 0, 1, NULL, NULL),
(19, 'products', 'Products', 0, 1, NULL, NULL),
(20, 'ai', 'Ai', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tagging_tag_groups`
--

CREATE TABLE `tagging_tag_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `type_id`, `type`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 7, 1, '0.00', 1, '2023-10-27 05:43:55', '2023-10-27 05:43:55'),
(2, 2, 2, 2, '2.00', 1, '2023-10-27 09:17:29', '2023-10-27 09:17:29'),
(3, 5, 8, 1, '0.00', 1, '2023-11-07 10:49:53', '2023-11-07 10:49:53'),
(4, 3, 9, 1, '0.00', 1, '2023-11-11 12:52:35', '2023-11-11 12:52:35'),
(5, 14, 10, 1, '0.00', 1, '2023-11-13 06:34:04', '2023-11-13 06:34:04'),
(9, 1, 14, 1, '0.00', 1, '2023-11-20 12:12:45', '2023-11-20 12:12:45'),
(10, 6, 15, 1, '0.00', 1, '2023-11-20 14:28:17', '2023-11-20 14:28:17'),
(11, 6, 16, 1, '8.00', 1, '2023-11-20 14:32:32', '2023-11-20 14:32:32'),
(12, 7, 17, 1, '0.00', 1, '2023-11-20 14:33:38', '2023-11-20 14:33:38'),
(13, 8, 18, 1, '8.00', 1, '2023-11-20 14:37:42', '2023-11-20 14:37:42'),
(14, 9, 19, 1, '0.00', 1, '2023-11-20 14:39:22', '2023-11-20 14:39:22'),
(15, 10, 20, 1, '0.00', 1, '2023-11-20 14:44:39', '2023-11-20 14:44:39'),
(16, 8, 21, 1, '0.00', 1, '2024-01-18 08:38:39', '2024-01-18 08:38:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL,
  `wallet` decimal(10,2) NOT NULL,
  `earnings` decimal(10,2) NOT NULL,
  `plan_id` bigint(20) NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT 0,
  `paypal_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banned_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `slug`, `email`, `email_verified_at`, `password`, `image`, `username`, `profession`, `gender`, `bio`, `location`, `country`, `website`, `twitter`, `facebook`, `instagram`, `linkedin`, `role`, `remember_token`, `last_seen`, `wallet`, `earnings`, `plan_id`, `verified`, `paypal_email`, `banned_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin ApexForum', 'admin-apexforum', 'admin@gmail.com', NULL, '$2y$10$5DMrmUdF5Z.OmdaWUzPHD.BLODXVMvyx5j9c.zAobweZZfuqqdawC', 'ee4de852952ac19c0d827e8c355b62a4_.jpg', 'adminapexforum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, '2024-01-23 07:10:47', '0.00', '0.00', 1, 0, NULL, NULL, '2023-07-15 06:49:56', '2024-01-23 07:10:47'),
(2, 'John Doe', 'john-doe', 'john@gmail.com', NULL, '$2y$10$Zg2ntgpck4LhsFd7.bi8jO2nodeyHCSwWekOx2yf59q0i6UUbYmVa', '345e8a36dfd83af2c4d30728dcb4f861_John Doe.jpg', 'johndoe', 'Frontend Developer', 'Male', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin luctus auctor elit vestibulum molestie. Sed vehicula risus vitae ornare mattis. Nulla pharetra mattis turpis eget condimentum.', 'New York', 'United States of America', 'https://www.apexcodestudios.com', 'https://www.apexcodestudios.com/johndoe', 'https://www.apexcodestudios.com/johndoe', 'https://www.apexcodestudios.com/johndoe', 'https://www.apexcodestudios.com/johndoe', 'Moderator', NULL, '2023-11-23 16:39:11', '12.00', '2.40', 1, 1, 'john.paypal@gmail.com', NULL, '2023-07-18 07:26:10', '2023-11-23 16:39:11'),
(3, 'Jane Doe', 'jane-doe', 'jane@gmail.com', NULL, '$2y$10$Zg2ntgpck4LhsFd7.bi8jO2nodeyHCSwWekOx2yf59q0i6UUbYmVa', '1e66e27164a8503e73569ba299c6f08c_Test Test924.jpg', 'janedoe', NULL, 'Female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Moderator', NULL, '2023-11-23 15:43:10', '5.00', '0.00', 1, 0, NULL, NULL, '2023-07-18 07:46:52', '2023-12-14 09:49:58'),
(4, 'User One', 'user-one', 'user_1@gmail.com', NULL, '$2y$10$37YM7x/JhwbwjwcQwoqh3OGH6xQ4lLXTrjgoq.UE4FOl/WhFbYb0q', 'avatar.jpg', 'userone', NULL, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin luctus auctor elit vestibulum molestie. Sed vehicula risus vitae ornare mattis. Nulla pharetra mattis turpis eget condimentum.', 'Copenhagen', 'Denmark', NULL, NULL, NULL, NULL, NULL, 'User', NULL, '2023-11-20 14:23:14', '0.00', '4.00', 1, 0, NULL, NULL, '2023-08-01 11:36:39', '2023-11-20 14:23:14'),
(5, 'User Two', 'user-two', 'user_2@gmail.com', NULL, '$2y$10$q2sXntIDSNVnEmfkVqQcKOS8LuSrInWUpakYKnIoK5V8fwdzBaNny', '23b2bc8e6d9060a22a589ce48b609e41_User Two.jpg', 'usertwo', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin luctus auctor elit vestibulum molestie. Sed vehicula risus vitae ornare mattis. Nulla pharetra mattis turpis eget condimentum.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'User', NULL, '2023-12-14 10:21:08', '0.00', '0.00', 1, 0, NULL, NULL, '2023-08-01 11:38:37', '2023-12-14 10:21:08'),
(6, 'User Three', 'user-three', 'user_3@gmail.com', NULL, '$2y$10$tvrUm6I3UOz9zShir4.roOhQmbpj7MubOz73Sw72OPGDX6wBLj1Su', '574ae2e78d71063f3d2a0a68873d841b_User Three.jpg', 'userthree', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'User', NULL, '2023-11-20 14:32:50', '2.00', '0.00', 2, 1, NULL, NULL, '2023-08-01 11:39:11', '2023-11-20 14:32:50'),
(7, 'User Four', 'user-four', 'user_4@gmail.com', NULL, '$2y$10$TknVx2leRiRrkgsULYbiy.YnDQ/Ih6L9g0Otl0VkkZ7mgdRDzdhO.', '50a57b2b994e210579d49a9e8593682d_User Four.jpg', 'userfour', 'Frontend Developer', 'Female', 'Integer eleifend erat eget interdum bibendum. Etiam sagittis congue sem ac feugiat. Mauris feugiat purus ut mi cursus gravida.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'User', NULL, '2023-12-14 09:56:44', '0.00', '0.00', 1, 0, NULL, NULL, '2023-08-01 11:39:45', '2023-12-14 09:56:44'),
(8, 'User Five', 'user-five', 'user_5@gmail.com', NULL, '$2y$10$mmvuIj7FYTVyElnauMB6uOGpQrTbwevGaeOrLUr7/Yah72rU03IOa', '3e0e967b6a68e21e7f1510275c031369_User Five.jpg', 'userfive', 'Backend Developer', 'Male', NULL, 'San Francisco', 'United States of America', NULL, NULL, NULL, NULL, NULL, 'User', NULL, '2024-01-18 08:38:38', '9.00', '0.00', 1, 0, NULL, NULL, '2023-08-01 11:40:22', '2024-01-18 08:38:39'),
(9, 'User Six', 'user-six', 'user_6@gmail.com', NULL, '$2y$10$OZGbeIAmp26GgJUa/r7RoejDpfKsC2VlekgD90lBvWON00UP00BW6', 'male.png', 'usersix', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'User', NULL, '2023-11-20 14:43:58', '0.00', '0.00', 1, 0, NULL, NULL, '2023-09-25 11:21:49', '2023-11-20 14:43:58'),
(10, 'User Seven', 'user-seven', 'user_7@gmail.com', NULL, '$2y$10$TY3L5KEMAVx7BlFaMW1ypOjWY1tj3uJMR5ibSiK9xxVuQtQa1xVbq', 'female.png', 'userseven', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'User', NULL, '2023-11-20 14:45:01', '5.00', '0.00', 1, 0, NULL, NULL, '2023-09-25 11:25:43', '2023-11-20 14:45:01'),
(12, 'User Eight', 'user-eight', 'user_8@gmail.com', NULL, '$2y$10$GEFlq2cEQ0.idSh3RHsp2.LkKHav8KWug/WrMixNmM/wIGyyZP5eS', 'male-2.jpg', 'usereight', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'User', NULL, '2023-11-20 14:48:32', '0.00', '1.40', 1, 0, 'user_8_paypal@gmail.com', NULL, '2023-10-25 10:33:16', '2023-11-20 14:48:32'),
(13, 'User Nine', 'user-nine', 'user_9@gmail.com', NULL, '$2y$10$dJ.3j5F9eFDkSwESKNLoxeXsdQy.8aQuPBTyiL5v.4Zta9OZOqdBK', 'female-2.jpg', 'usernine', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'User', NULL, '2023-11-20 14:50:06', '0.00', '0.00', 1, 0, NULL, NULL, '2023-10-25 10:34:49', '2023-11-20 14:50:06'),
(14, 'User Ten', 'user-ten', 'user_10@gmail.com', NULL, '$2y$10$R.CRNMKAx4/7ldIA.4qgGOksV2CITemv4GVTCt0hvd8.0Ik3O7YmO', 'male.png', 'userten', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'User', NULL, '2023-11-20 14:57:41', '0.00', '0.00', 1, 0, NULL, NULL, '2023-11-13 06:34:04', '2023-11-20 14:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_views`
--

CREATE TABLE `user_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `viewer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_views`
--

INSERT INTO `user_views` (`id`, `user_id`, `viewer_id`, `ip`, `agent`, `created_at`, `updated_at`) VALUES
(1, 8, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 09:00:22', '2023-09-23 09:00:22'),
(2, 8, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 09:06:16', '2023-09-23 09:06:16'),
(3, 8, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 09:06:55', '2023-09-23 09:06:55'),
(4, 2, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 09:07:18', '2023-09-23 09:07:18'),
(5, 2, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 09:08:16', '2023-09-23 09:08:16'),
(6, 2, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 09:09:02', '2023-09-23 09:09:02'),
(7, 8, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 09:09:47', '2023-09-23 09:09:47'),
(8, 1, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 09:16:41', '2023-09-23 09:16:41'),
(9, 6, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 09:19:35', '2023-09-23 09:19:35'),
(10, 6, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 09:20:13', '2023-09-23 09:20:13'),
(11, 6, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 09:21:01', '2023-09-23 09:21:01'),
(12, 2, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 09:21:13', '2023-09-23 09:21:13'),
(13, 2, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 09:32:15', '2023-09-23 09:32:15'),
(14, 2, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 09:40:44', '2023-09-23 09:40:44'),
(15, 2, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 09:46:12', '2023-09-23 09:46:12'),
(16, 2, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 12:18:48', '2023-09-23 12:18:48'),
(17, 2, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 12:22:43', '2023-09-23 12:22:43'),
(18, 1, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 14:22:57', '2023-09-23 14:22:57'),
(19, 1, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 14:23:21', '2023-09-23 14:23:21'),
(20, 7, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 14:25:48', '2023-09-23 14:25:48'),
(21, 7, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 14:29:58', '2023-09-23 14:29:58'),
(22, 7, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 14:30:47', '2023-09-23 14:30:47'),
(23, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 14:31:04', '2023-09-23 14:31:04'),
(24, 8, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 14:32:58', '2023-09-23 14:32:58'),
(25, 6, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 14:55:10', '2023-09-23 14:55:10'),
(26, 8, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 16:23:35', '2023-09-23 16:23:35'),
(27, 5, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 16:30:33', '2023-09-23 16:30:33'),
(28, 7, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 16:31:11', '2023-09-23 16:31:11'),
(29, 2, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 16:32:02', '2023-09-23 16:32:02'),
(30, 2, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 16:32:27', '2023-09-23 16:32:27'),
(31, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 16:33:16', '2023-09-23 16:33:16'),
(32, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 16:33:26', '2023-09-23 16:33:26'),
(33, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 16:35:20', '2023-09-23 16:35:20'),
(34, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 17:47:25', '2023-09-23 17:47:25'),
(35, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 18:15:28', '2023-09-23 18:15:28'),
(36, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-23 19:05:51', '2023-09-23 19:05:51'),
(37, 7, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-24 16:42:36', '2023-09-24 16:42:36'),
(38, 7, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-24 16:55:21', '2023-09-24 16:55:21'),
(39, 8, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-24 16:55:28', '2023-09-24 16:55:28'),
(40, 5, 5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-24 17:43:31', '2023-09-24 17:43:31'),
(41, 7, 5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-24 18:09:29', '2023-09-24 18:09:29'),
(42, 1, 5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-24 19:05:36', '2023-09-24 19:05:36'),
(43, 1, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-25 06:44:27', '2023-09-25 06:44:27'),
(44, 2, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-25 10:10:01', '2023-09-25 10:10:01'),
(45, 7, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-25 10:29:58', '2023-09-25 10:29:58'),
(46, 2, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-25 10:39:52', '2023-09-25 10:39:52'),
(47, 9, 9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-25 11:22:02', '2023-09-25 11:22:02'),
(48, 10, 10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-25 11:28:03', '2023-09-25 11:28:03'),
(49, 10, 10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-25 12:21:51', '2023-09-25 12:21:51'),
(50, 10, 10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-25 12:25:39', '2023-09-25 12:25:39'),
(51, 2, 10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-25 12:29:49', '2023-09-25 12:29:49'),
(52, 10, 5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-25 12:34:58', '2023-09-25 12:34:58'),
(53, 2, 5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '2023-09-25 12:38:04', '2023-09-25 12:38:04'),
(54, 4, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-09-26 04:34:55', '2023-09-26 04:34:55'),
(55, 8, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-09-26 04:40:56', '2023-09-26 04:40:56'),
(56, 10, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-02 11:04:52', '2023-10-02 11:04:52'),
(57, 4, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-02 11:05:19', '2023-10-02 11:05:19'),
(58, 4, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-02 11:07:12', '2023-10-02 11:07:12'),
(59, 9, 9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-06 11:34:51', '2023-10-06 11:34:51'),
(60, 8, 9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-06 12:20:53', '2023-10-06 12:20:53'),
(61, 4, 9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-06 12:28:09', '2023-10-06 12:28:09'),
(62, 2, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-07 08:54:20', '2023-10-07 08:54:20'),
(63, 10, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-07 10:00:24', '2023-10-07 10:00:24'),
(64, 2, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-07 13:00:21', '2023-10-07 13:00:21'),
(65, 10, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-08 16:24:27', '2023-10-08 16:24:27'),
(66, 9, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-08 17:12:45', '2023-10-08 17:12:45'),
(67, 2, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-09 05:58:16', '2023-10-09 05:58:16'),
(68, 5, NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-10-11 05:43:48', '2023-10-11 05:43:48'),
(69, 4, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-11 06:28:27', '2023-10-11 06:28:27'),
(70, 4, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-11 07:10:07', '2023-10-11 07:10:07'),
(71, 8, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-11 07:56:42', '2023-10-11 07:56:42'),
(72, 6, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-11 11:57:36', '2023-10-11 11:57:36'),
(73, 9, 9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', '2023-10-11 12:01:02', '2023-10-11 12:01:02'),
(74, 10, NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-10-11 16:13:50', '2023-10-11 16:13:50'),
(75, 10, NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-10-11 16:16:12', '2023-10-11 16:16:12'),
(76, 10, NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-10-11 16:18:42', '2023-10-11 16:18:42'),
(77, 9, NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-10-11 16:22:28', '2023-10-11 16:22:28'),
(78, 10, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-10-14 08:18:29', '2023-10-14 08:18:29'),
(79, 4, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-10-14 08:46:38', '2023-10-14 08:46:38'),
(80, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-10-19 04:47:21', '2023-10-19 04:47:21'),
(81, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-10-24 09:08:44', '2023-10-24 09:08:44'),
(82, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-10-24 09:09:08', '2023-10-24 09:09:08'),
(83, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-10-24 09:10:49', '2023-10-24 09:10:49'),
(84, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-10-24 12:20:32', '2023-10-24 12:20:32'),
(86, 13, 13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-10-25 10:52:16', '2023-10-25 10:52:16'),
(87, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-10-27 09:17:40', '2023-10-27 09:17:40'),
(88, 12, 13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-10-27 15:56:35', '2023-10-27 15:56:35'),
(89, 5, 7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-10-27 16:20:44', '2023-10-27 16:20:44'),
(90, 13, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-10-28 10:20:35', '2023-10-28 10:20:35'),
(91, 13, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-10-28 10:26:52', '2023-10-28 10:26:52'),
(92, 10, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-02 13:52:37', '2023-11-02 13:52:37'),
(93, 10, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-02 13:53:58', '2023-11-02 13:53:58'),
(94, 10, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-02 13:59:56', '2023-11-02 13:59:56'),
(95, 10, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-02 14:00:38', '2023-11-02 14:00:38'),
(96, 12, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-02 14:52:25', '2023-11-02 14:52:25'),
(97, 12, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-02 14:57:21', '2023-11-02 14:57:21'),
(98, 12, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-02 14:57:33', '2023-11-02 14:57:33'),
(99, 12, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-02 15:00:19', '2023-11-02 15:00:19'),
(100, 12, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-02 15:00:33', '2023-11-02 15:00:33'),
(101, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-02 16:13:57', '2023-11-02 16:13:57'),
(102, 13, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-02 17:14:47', '2023-11-02 17:14:47'),
(103, 13, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-02 17:15:05', '2023-11-02 17:15:05'),
(104, 12, 12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-07 06:57:18', '2023-11-07 06:57:18'),
(105, 12, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-07 08:06:57', '2023-11-07 08:06:57'),
(106, 12, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-07 08:07:57', '2023-11-07 08:07:57'),
(107, 12, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-07 08:08:08', '2023-11-07 08:08:08'),
(108, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-07 11:26:15', '2023-11-07 11:26:15'),
(109, 2, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-11 11:35:08', '2023-11-11 11:35:08'),
(110, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-11 12:17:57', '2023-11-11 12:17:57'),
(111, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-11 12:21:02', '2023-11-11 12:21:02'),
(112, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-11 12:21:11', '2023-11-11 12:21:11'),
(113, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-11 12:33:38', '2023-11-11 12:33:38'),
(114, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-11 13:11:14', '2023-11-11 13:11:14'),
(115, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-11 13:32:36', '2023-11-11 13:32:36'),
(116, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-11 13:50:57', '2023-11-11 13:50:57'),
(117, 10, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-13 06:29:53', '2023-11-13 06:29:53'),
(118, 13, 14, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-13 08:17:25', '2023-11-13 08:17:25'),
(119, 14, 4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-13 09:25:24', '2023-11-13 09:25:24'),
(120, 14, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-16 05:56:18', '2023-11-16 05:56:18'),
(121, 14, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-16 05:56:31', '2023-11-16 05:56:31'),
(122, 14, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-16 05:56:55', '2023-11-16 05:56:55'),
(123, 14, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-16 06:00:19', '2023-11-16 06:00:19'),
(124, 7, 6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-16 06:05:10', '2023-11-16 06:05:10'),
(125, 7, 6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-16 06:05:21', '2023-11-16 06:05:21'),
(126, 6, 7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-16 06:06:12', '2023-11-16 06:06:12'),
(127, 13, 7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-16 06:06:43', '2023-11-16 06:06:43'),
(128, 7, 6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-16 06:30:06', '2023-11-16 06:30:06'),
(129, 2, 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-18 06:49:44', '2023-11-18 06:49:44'),
(130, 13, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-19 13:29:16', '2023-11-19 13:29:16'),
(131, 13, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-19 13:30:55', '2023-11-19 13:30:55'),
(132, 13, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-19 13:33:56', '2023-11-19 13:33:56'),
(133, 8, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-19 13:36:11', '2023-11-19 13:36:11'),
(134, 6, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-19 13:36:39', '2023-11-19 13:36:39'),
(135, 10, 12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-19 13:38:29', '2023-11-19 13:38:29'),
(136, 10, 12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-19 13:38:52', '2023-11-19 13:38:52'),
(137, 10, 12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-19 13:39:43', '2023-11-19 13:39:43'),
(138, 12, 12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-19 13:52:54', '2023-11-19 13:52:54'),
(139, 12, 12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-19 13:54:02', '2023-11-19 13:54:02'),
(140, 12, 12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-19 13:55:28', '2023-11-19 13:55:28'),
(141, 12, 12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-19 13:56:19', '2023-11-19 13:56:19'),
(142, 12, 12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-19 13:56:57', '2023-11-19 13:56:57'),
(143, 2, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-20 13:02:57', '2023-11-20 13:02:57'),
(144, 4, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-20 14:21:23', '2023-11-20 14:21:23'),
(145, 4, 3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-20 14:21:38', '2023-11-20 14:21:38'),
(146, 2, 8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-20 14:38:06', '2023-11-20 14:38:06'),
(147, 2, 8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-20 14:38:20', '2023-11-20 14:38:20'),
(148, 13, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-20 15:39:11', '2023-11-20 15:39:11'),
(149, 5, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-20 18:21:33', '2023-11-20 18:21:33'),
(150, 2, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-21 15:29:36', '2023-11-21 15:29:36'),
(151, 2, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-21 16:42:00', '2023-11-21 16:42:00'),
(152, 2, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-21 17:26:00', '2023-11-21 17:26:00'),
(153, 12, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-21 18:05:00', '2023-11-21 18:05:00'),
(154, 1, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-22 06:04:17', '2023-11-22 06:04:17'),
(155, 2, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-11-23 16:22:48', '2023-11-23 16:22:48'),
(156, 4, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-11-23 16:23:12', '2023-11-23 16:23:12'),
(157, 2, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', '2023-11-23 16:25:36', '2023-11-23 16:25:36'),
(158, 12, 8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2024-01-18 08:38:32', '2024-01-18 08:38:32'),
(159, 12, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2024-01-18 12:07:38', '2024-01-18 12:07:38'),
(160, 12, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2024-01-20 15:32:14', '2024-01-20 15:32:14'),
(161, 2, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', '2024-01-20 16:19:18', '2024-01-20 16:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `paypal_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `process_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraws`
--

INSERT INTO `withdraws` (`id`, `user_id`, `paypal_email`, `amount`, `status`, `process_date`, `created_at`, `updated_at`) VALUES
(1, 12, 'user_8_paypal@gmail.com', '5.00', 1, '2023-11-14 12:36:22', '2023-11-07 09:36:22', '2023-11-07 10:13:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bans`
--
ALTER TABLE `bans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bans_bannable_type_bannable_id_index` (`bannable_type`,`bannable_id`),
  ADD KEY `bans_created_by_type_created_by_id_index` (`created_by_type`,`created_by_id`),
  ADD KEY `bans_expired_at_index` (`expired_at`);

--
-- Indexes for table `ban_durations`
--
ALTER TABLE `ban_durations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buy_points`
--
ALTER TABLE `buy_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_favoriteable_type_favoriteable_id_index` (`favoriteable_type`,`favoriteable_id`),
  ADD KEY `favorites_user_id_index` (`user_id`);

--
-- Indexes for table `followables`
--
ALTER TABLE `followables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `followables_followable_type_followable_id_index` (`followable_type`,`followable_id`),
  ADD KEY `followables_followable_type_accepted_at_index` (`followable_type`,`accepted_at`),
  ADD KEY `followables_user_id_index` (`user_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_likeable_type_likeable_id_index` (`likeable_type`,`likeable_id`),
  ADD KEY `likes_user_id_index` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_views`
--
ALTER TABLE `posts_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `react_user_unique` (`reactable_type`,`reactable_id`,`user_id`),
  ADD KEY `reactions_reactable_type_reactable_id_index` (`reactable_type`,`reactable_id`),
  ADD KEY `reactions_user_id_index` (`user_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_users`
--
ALTER TABLE `report_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shares`
--
ALTER TABLE `shares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagging_tagged`
--
ALTER TABLE `tagging_tagged`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tagged_taggable_id_index` (`taggable_id`),
  ADD KEY `tagging_tagged_taggable_type_index` (`taggable_type`),
  ADD KEY `tagging_tagged_tag_slug_index` (`tag_slug`);

--
-- Indexes for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tags_slug_index` (`slug`),
  ADD KEY `tagging_tags_tag_group_id_foreign` (`tag_group_id`);

--
-- Indexes for table `tagging_tag_groups`
--
ALTER TABLE `tagging_tag_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tag_groups_slug_index` (`slug`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_views`
--
ALTER TABLE `user_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bans`
--
ALTER TABLE `bans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ban_durations`
--
ALTER TABLE `ban_durations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buy_points`
--
ALTER TABLE `buy_points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `followables`
--
ALTER TABLE `followables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posts_views`
--
ALTER TABLE `posts_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `report_users`
--
ALTER TABLE `report_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `shares`
--
ALTER TABLE `shares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tagging_tagged`
--
ALTER TABLE `tagging_tagged`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tagging_tag_groups`
--
ALTER TABLE `tagging_tag_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_views`
--
ALTER TABLE `user_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  ADD CONSTRAINT `tagging_tags_tag_group_id_foreign` FOREIGN KEY (`tag_group_id`) REFERENCES `tagging_tag_groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
