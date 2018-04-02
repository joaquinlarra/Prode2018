-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2018 at 07:08 PM
-- Server version: 5.6.35
-- PHP Version: 7.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `prode_2018`
--

-- --------------------------------------------------------

--
-- Table structure for table `bitauth_assoc`
--

DROP TABLE IF EXISTS `bitauth_assoc`;
CREATE TABLE `bitauth_assoc` (
  `assoc_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bitauth_assoc`
--

INSERT INTO `bitauth_assoc` (`assoc_id`, `user_id`, `group_id`) VALUES
(92, 3, 1),
(133, 23, 2),
(134, 21, 2),
(135, 32, 3),
(136, 30, 3),
(137, 33, 3),
(138, 28, 3),
(139, 29, 3),
(140, 27, 3),
(141, 31, 3),
(142, 34, 3),
(143, 1, 3),
(144, 35, 2),
(145, 36, 3);

-- --------------------------------------------------------

--
-- Table structure for table `bitauth_groups`
--

DROP TABLE IF EXISTS `bitauth_groups`;
CREATE TABLE `bitauth_groups` (
  `group_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(48) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `roles` text CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bitauth_groups`
--

INSERT INTO `bitauth_groups` (`group_id`, `name`, `description`, `roles`) VALUES
(1, 'Administrador', 'Administadores con accesso completo a todo el sitio', '1'),
(2, 'Manager', '', '0'),
(3, 'Jugador', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bitauth_logins`
--

DROP TABLE IF EXISTS `bitauth_logins`;
CREATE TABLE `bitauth_logins` (
  `login_id` int(10) UNSIGNED NOT NULL,
  `ip_address` bigint(20) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `time` datetime NOT NULL,
  `success` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bitauth_logins`
--

INSERT INTO `bitauth_logins` (`login_id`, `ip_address`, `user_id`, `time`, `success`) VALUES
(1, 3232235887, 3, '2013-05-08 15:42:27', 0),
(2, 3232235925, 3, '2013-05-16 15:01:43', 0),
(3, 3232235879, 3, '2013-06-28 16:08:06', 1),
(4, 3232235879, 3, '2013-07-01 10:50:52', 1),
(5, 3232235879, 3, '2013-07-01 10:56:50', 1),
(6, 3232235879, 3, '2013-07-02 10:37:37', 1),
(7, 3232235879, 3, '2013-07-02 10:41:09', 1),
(8, 3232235879, 21, '2013-07-02 11:09:33', 1),
(9, 3232235879, 3, '2013-07-02 16:58:50', 1),
(10, 3232235879, 3, '2013-07-04 12:21:44', 1),
(11, 3232235915, 3, '2013-07-30 10:43:57', 1),
(12, 3232235915, 3, '2013-07-30 12:08:42', 1),
(13, 3232235915, 3, '2013-07-31 10:47:20', 1),
(14, 3232235915, 3, '2013-07-31 10:47:49', 1),
(15, 3232235915, 3, '2013-08-02 10:58:54', 1),
(16, 3232235916, 3, '2013-08-14 10:29:21', 1),
(17, 3232235906, 3, '2013-11-11 13:00:06', 0),
(18, 3232235906, 3, '2013-11-11 13:00:37', 1),
(19, 3232235901, 3, '2013-11-12 11:01:16', 1),
(20, 3232235901, 3, '2013-11-12 15:24:17', 1),
(21, 3232235901, 3, '2013-11-12 15:27:44', 1),
(22, 3232235901, 3, '2013-11-12 18:06:52', 0),
(23, 3232235901, 3, '2013-11-12 18:07:04', 1),
(24, 3232235901, 3, '2013-11-12 18:15:12', 0),
(25, 3232235901, 3, '2013-11-13 10:59:19', 1),
(26, 3232235906, 3, '2013-11-13 12:26:48', 1),
(27, 3232235901, 3, '2013-11-14 11:16:47', 1),
(28, 3232235901, 3, '2013-11-14 12:04:39', 1),
(29, 3232235901, 3, '2013-11-14 12:41:21', 1),
(30, 3232235901, 3, '2013-11-14 12:42:36', 1),
(31, 3232235906, 3, '2013-11-14 14:32:42', 1),
(32, 3232235901, 3, '2013-11-15 10:22:14', 1),
(33, 3232235901, 3, '2013-11-15 10:22:19', 1),
(34, 3232235906, 3, '2013-11-15 10:55:22', 1),
(35, 3232235906, 3, '2013-11-15 14:38:11', 1),
(36, 3232235901, 3, '2013-11-15 16:55:20', 1),
(37, 3232235901, 3, '2013-11-18 12:40:48', 1),
(38, 3232235901, 3, '2013-11-18 15:58:52', 1),
(39, 3232235901, 3, '2013-11-19 12:12:13', 1),
(40, 3232235901, 3, '2013-11-19 15:37:09', 1),
(41, 3232235906, 3, '2013-11-20 11:04:12', 1),
(42, 3232235901, 3, '2013-11-20 14:55:17', 1),
(43, 3232235901, 3, '2013-11-20 14:55:19', 1),
(44, 3232235901, 3, '2013-11-20 17:25:00', 1),
(45, 3232235901, 3, '2013-11-21 11:49:10', 1),
(46, 3232235906, 3, '2013-11-27 11:20:27', 1),
(47, 3232235906, 3, '2013-12-02 11:31:57', 1),
(48, 3232235901, 3, '2013-12-05 11:54:52', 1),
(49, 3232235910, 3, '2013-12-17 12:10:15', 1),
(50, 3232235891, 3, '2014-01-02 16:33:51', 1),
(51, 3232235891, 3, '2014-01-06 10:36:00', 1),
(52, 3232235911, 3, '2014-01-06 11:50:54', 1),
(53, 3232235891, 3, '2014-01-13 15:52:41', 1),
(54, 3232235891, 3, '2014-01-14 11:43:20', 1),
(55, 3232235891, 3, '2014-01-14 15:02:54', 1),
(56, 3232235891, 3, '2014-01-15 10:34:56', 1),
(57, 3232235891, 3, '2014-01-16 10:33:36', 1),
(58, 3232235891, 3, '2014-01-16 16:05:12', 1),
(59, 3232235881, 3, '2014-01-17 11:14:21', 1),
(60, 3232235881, 3, '2014-01-20 12:12:29', 1),
(61, 3232235881, 3, '2014-01-20 16:22:37', 1),
(62, 3232235881, 3, '2014-01-22 17:20:03', 1),
(63, 3232235896, 3, '2014-01-31 10:56:41', 1),
(64, 3232235896, 3, '2014-01-31 12:57:46', 1),
(65, 3232235896, 3, '2014-01-31 16:24:06', 1),
(66, 3232235924, 0, '2014-02-07 16:21:43', 0),
(67, 3232235902, 3, '2014-03-07 17:01:01', 1),
(68, 3232235902, 3, '2014-03-13 11:57:08', 1),
(69, 3232235902, 3, '2014-03-18 16:02:30', 1),
(70, 3232235902, 3, '2014-03-18 17:15:42', 1),
(71, 3047665595, 3, '2014-03-27 21:21:10', 0),
(72, 3047665595, 3, '2014-03-27 21:21:16', 1),
(73, 3047665595, 3, '2014-03-28 15:13:34', 1),
(74, 3047665595, 3, '2014-03-31 18:37:15', 1),
(75, 3047665595, 3, '2014-04-03 16:11:35', 1),
(76, 3359310781, 3, '2014-04-09 17:02:35', 1),
(77, 0, 3, '2018-04-02 16:22:01', 0),
(78, 0, 1, '2018-04-02 16:24:17', 1),
(79, 0, 1, '2018-04-02 16:24:25', 1),
(80, 0, 1, '2018-04-02 16:24:38', 1),
(81, 0, 3, '2018-04-02 16:24:54', 0),
(82, 0, 1, '2018-04-02 16:25:30', 1),
(83, 0, 3, '2018-04-02 16:25:48', 0),
(84, 0, 3, '2018-04-02 16:26:04', 1),
(85, 0, 36, '2018-04-02 18:52:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bitauth_userdata`
--

DROP TABLE IF EXISTS `bitauth_userdata`;
CREATE TABLE `bitauth_userdata` (
  `userdata_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bitauth_userdata`
--

INSERT INTO `bitauth_userdata` (`userdata_id`, `user_id`) VALUES
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `bitauth_users`
--

DROP TABLE IF EXISTS `bitauth_users`;
CREATE TABLE `bitauth_users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `username` varchar(32) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `password_last_set` datetime NOT NULL,
  `password_never_expires` tinyint(1) NOT NULL DEFAULT '0',
  `remember_me` varchar(40) NOT NULL,
  `activation_code` varchar(40) NOT NULL,
  `groups_names` varchar(255) NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `bio` text NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `forgot_code` varchar(40) NOT NULL,
  `forgot_generated` datetime NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `image_file_name` varchar(255) NOT NULL,
  `file_manager_id` int(11) NOT NULL,
  `last_login` datetime NOT NULL,
  `last_login_ip` int(10) NOT NULL,
  `date_created` datetime NOT NULL,
  `country` enum('argentina') NOT NULL DEFAULT 'argentina',
  `province_id` int(11) NOT NULL,
  `province` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `displayname` varchar(255) DEFAULT NULL,
  `company_id` int(11) UNSIGNED DEFAULT NULL,
  `user_language` varchar(10) DEFAULT NULL,
  `branch_id` int(11) UNSIGNED DEFAULT NULL,
  `department_id` int(11) UNSIGNED DEFAULT NULL,
  `email_confirmed` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bitauth_users`
--

INSERT INTO `bitauth_users` (`user_id`, `username`, `fullname`, `site`, `email`, `password`, `password_last_set`, `password_never_expires`, `remember_me`, `activation_code`, `groups_names`, `group_id`, `bio`, `facebook`, `twitter`, `instagram`, `product_id`, `active`, `forgot_code`, `forgot_generated`, `enabled`, `image_file_name`, `file_manager_id`, `last_login`, `last_login_ip`, `date_created`, `country`, `province_id`, `province`, `region`, `department`, `branch`, `company`, `displayname`, `company_id`, `user_language`, `branch_id`, `department_id`, `email_confirmed`) VALUES
(3, 'admin', 'Admin tester', '', 'admin@admin.com', '$2a$08$Cjs8JFqtmOAf1RCi2zeuPeFoD.e1vyf3RvX6KOVkyWKcrrKQtZzEW', '2018-04-02 16:25:57', 0, '41f3fb1ac4570eed307cb0b622c90228978dcd8a', '', 'Administrador', 1, '', '', '', '', 0, 1, '', '2018-04-02 16:25:52', 1, '', 0, '2018-04-02 16:26:04', 0, '2012-09-28 16:27:01', 'argentina', 0, '0', 'capital federal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 'joaquin', 'Joaquin Astelarra', '', 'joaquinastelarra@gmail.com', '$2a$08$FV9wecuUZBV0dcEXrNctGOJsiZk.SDGbCZn8XpGt8VZfqVRvMNzjG', '2018-04-02 16:25:23', 0, '', '', 'Jugador', 3, '', '', '', '', 0, 1, '', '2018-04-02 16:25:13', 1, '', 18, '2018-04-02 16:25:30', 0, '2013-12-30 15:03:35', 'argentina', 0, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, '8DeFe', '8DeFebrero', '', '', '$2a$08$rONxTWtzJlR0nMXsyLkhverRaqPlZf9dOUJAnQHwMQtva5dBMcwq2', '2018-04-02 18:51:25', 0, '', '', '', 2, '', '', '', '', 0, 1, '', '0000-00-00 00:00:00', 1, '', 0, '0000-00-00 00:00:00', 0, '2018-04-02 18:51:25', '', 0, '', '', '', '', '8DeFebrero', '', 1, '', 0, 0, 0),
(36, 'joaquinastelarra@gmail.com', '', '', 'joaquinastelarra@gmail.com', '$2a$08$/kLSoDw5qKKGaB7lse7Mj.Nf/Y9q/WCnBMQgbOZxcQoX5zaHvDpq2', '2018-04-02 18:52:51', 0, '', '', 'Jugador', 3, 'Gusta futbol y sistemas', '', '', '', 0, 1, '', '0000-00-00 00:00:00', 1, '', 0, '2018-04-02 18:52:51', 0, '2018-04-02 18:52:51', '', 0, '', '', '', '', '8DeFebrero', 'yeken', 1, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `company_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `points_match` smallint(3) UNSIGNED NOT NULL,
  `points_exact_match` smallint(3) UNSIGNED NOT NULL,
  `qualys` tinyint(1) UNSIGNED NOT NULL,
  `qualys_team_points` smallint(3) UNSIGNED NOT NULL,
  `winners` tinyint(1) UNSIGNED NOT NULL,
  `winners_points` smallint(3) UNSIGNED NOT NULL,
  `badges` tinyint(1) UNSIGNED NOT NULL,
  `badges_points` smallint(3) UNSIGNED NOT NULL,
  `friends_league` tinyint(1) UNSIGNED NOT NULL,
  `dept_league` tinyint(1) UNSIGNED NOT NULL,
  `branch_league` tinyint(1) UNSIGNED NOT NULL,
  `country` varchar(2) NOT NULL,
  `file_manager_id` int(11) UNSIGNED NOT NULL,
  `active` smallint(1) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `creator_id` int(11) UNSIGNED NOT NULL,
  `creator_name` varchar(255) NOT NULL,
  `users_activated` tinyint(1) DEFAULT NULL,
  `register` tinyint(1) DEFAULT NULL,
  `confirm_email` tinyint(1) DEFAULT NULL,
  `first_login` tinyint(1) DEFAULT NULL,
  `qualys_close_date` datetime DEFAULT NULL,
  `winners_close_date` datetime DEFAULT NULL,
  `username_field` varchar(255) DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `bio` text,
  `multi_lang` tinyint(1) DEFAULT NULL,
  `branch_league_name` varchar(255) DEFAULT NULL,
  `how_to_text` text,
  `register_domain` varchar(255) DEFAULT NULL,
  `fantasy_logo_url` varchar(255) DEFAULT NULL,
  `first_login_text` varchar(255) DEFAULT NULL,
  `no_logos` tinyint(1) DEFAULT NULL,
  `patriot_seller` tinyint(1) DEFAULT NULL,
  `super_patriot` tinyint(1) DEFAULT NULL,
  `wall` tinyint(1) DEFAULT NULL,
  `colors` tinyint(1) DEFAULT NULL,
  `default_user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `name`, `description`, `namespace`, `points_match`, `points_exact_match`, `qualys`, `qualys_team_points`, `winners`, `winners_points`, `badges`, `badges_points`, `friends_league`, `dept_league`, `branch_league`, `country`, `file_manager_id`, `active`, `date_created`, `creator_id`, `creator_name`, `users_activated`, `register`, `confirm_email`, `first_login`, `qualys_close_date`, `winners_close_date`, `username_field`, `branch_name`, `bio`, `multi_lang`, `branch_league_name`, `how_to_text`, `register_domain`, `fantasy_logo_url`, `first_login_text`, `no_logos`, `patriot_seller`, `super_patriot`, `wall`, `colors`, `default_user_id`) VALUES
(1, '8DeFebrero', 'Diseño + Vanguardia', '8DeFe', 3, 5, 0, 1, 0, 5, 1, 1, 0, 0, 0, 'AR', 67, 1, '2014-04-01 12:58:24', 3, 'admin', 1, 1, 0, 0, '2014-06-17 23:00:00', '2014-06-26 23:00:00', 'Email', 'Sedes', '1', 1, 'Internas', '', '', '', '', 0, 1, 0, 1, 0, 35);

-- --------------------------------------------------------

--
-- Table structure for table `companies_deleted`
--

DROP TABLE IF EXISTS `companies_deleted`;
CREATE TABLE `companies_deleted` (
  `company_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file_manager_id` int(11) UNSIGNED NOT NULL,
  `active` smallint(1) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `creator_id` int(11) UNSIGNED NOT NULL,
  `creator_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

DROP TABLE IF EXISTS `configurations`;
CREATE TABLE `configurations` (
  `configuration_id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `telephone` varchar(250) NOT NULL,
  `text_footer` varchar(250) NOT NULL,
  `url_facebook` varchar(250) NOT NULL,
  `url_twitter` varchar(250) NOT NULL,
  `url_googleplus` varchar(250) NOT NULL,
  `url_youtube` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `form_emails` text NOT NULL COMMENT 'separados por coma. (ej: juan@gmail.com, florencia@yahoo.com)',
  `username` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`configuration_id`, `address`, `telephone`, `text_footer`, `url_facebook`, `url_twitter`, `url_googleplus`, `url_youtube`, `email`, `form_emails`, `username`) VALUES
(19, '', '', '', '', '', '', '', 'info@adyouwish.com', '', 'adyou'),
(20, '', '', '', '', '', '', '', 'info@adyouwish.com', '', 'adyou'),
(21, '', '', '', '', '', '', '', 'info@adyouwish.com', '', 'adyou'),
(23, '', '', '', '', '', '', '', 'client@client.com', '', 'client');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `contact_id` int(11) UNSIGNED NOT NULL,
  `fb_uid` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `province_id` int(11) UNSIGNED NOT NULL,
  `province` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `birthday` varchar(250) NOT NULL,
  `lives` smallint(3) NOT NULL,
  `completed` tinyint(1) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_ended` datetime NOT NULL,
  `friends_invited` smallint(3) NOT NULL,
  `ini_vars_setted` tinyint(1) NOT NULL,
  `views` int(6) UNSIGNED NOT NULL,
  `page_views` text NOT NULL,
  `net_views` int(3) UNSIGNED NOT NULL,
  `net_page_views` text NOT NULL,
  `new_like` tinyint(1) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `fb_uid`, `name`, `email`, `province_id`, `province`, `telephone`, `birthday`, `lives`, `completed`, `date_created`, `date_ended`, `friends_invited`, `ini_vars_setted`, `views`, `page_views`, `net_views`, `net_page_views`, `new_like`) VALUES
(6, 666, '', '', 0, '', '', '', 3, 0, '2013-07-30 10:42:32', '0000-00-00 00:00:00', 0, 1, 311, '|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index|index', 1, '|index', 0);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `file_id` int(11) UNSIGNED NOT NULL,
  `file` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `type` enum('image','video','archive') NOT NULL,
  `code` varchar(255) NOT NULL,
  `ext` varchar(10) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `file`, `file_name`, `type`, `code`, `ext`, `date_created`) VALUES
(12, '12_1385512190_Argentina.png', '1385512190_Argentina', 'image', '', 'png', '2014-01-14 12:14:35'),
(13, '13_1385512198_Belgium.png', '1385512198_Belgium', 'image', '', 'png', '2014-01-14 12:14:51'),
(14, '14_1385512211_Colombia.png', '1385512211_Colombia', 'image', '', 'png', '2014-01-14 12:15:07'),
(15, '15_1385512225_Spain.png', '1385512225_Spain', 'image', '', 'png', '2014-01-14 12:15:42'),
(16, '16_1385512241_France.png', '1385512241_France', 'image', '', 'png', '2014-01-14 12:15:55'),
(17, '17_1385512279_Brazil.png', '1385512279_Brazil', 'image', '', 'png', '2014-01-14 12:16:07'),
(18, '18_1385512316_Bosnia-and-Herzegovina.png', '1385512316_Bosnia-and-Herzegovina', 'image', '', 'png', '2014-01-14 12:16:25'),
(19, '19_1385512324_Croatia.png', '1385512324_Croatia', 'image', '', 'png', '2014-01-14 12:16:43'),
(20, '20_1385512343_Greece.png', '1385512343_Greece', 'image', '', 'png', '2014-01-14 12:16:56'),
(21, '21_1385512361_Uruguay.png', '1385512361_Uruguay', 'image', '', 'png', '2014-01-14 12:17:17'),
(22, '22_1385512372_Italy.png', '1385512372_Italy', 'image', '', 'png', '2014-01-14 12:17:43'),
(23, '23_1385512392_Switzerland.png', '1385512392_Switzerland', 'image', '', 'png', '2014-01-14 12:17:57'),
(24, '24_1385512408_Russia.png', '1385512408_Russia', 'image', '', 'png', '2014-01-14 12:19:56'),
(25, '25_1385512461_England.png', '1385512461_England', 'image', '', 'png', '2014-01-14 12:21:25'),
(26, '26_1385512485_Netherlands.png', '1385512485_Netherlands', 'image', '', 'png', '2014-01-14 12:22:14'),
(27, '27_1385512495_Portugal.png', '1385512495_Portugal', 'image', '', 'png', '2014-01-14 12:22:42'),
(28, '28_1385512527_Algeria.png', '1385512527_Algeria', 'image', '', 'png', '2014-01-14 12:22:52'),
(29, '29_1385513135_Cameroon.png', '1385513135_Cameroon', 'image', '', 'png', '2014-01-14 12:23:04'),
(30, '30_1385513279_Ecuador.png', '1385513279_Ecuador', 'image', '', 'png', '2014-01-14 12:23:16'),
(31, '31_1385513300_Ghana.png', '1385513300_Ghana', 'image', '', 'png', '2014-01-14 12:23:32'),
(32, '32_1385513358_Chile.png', '1385513358_Chile', 'image', '', 'png', '2014-01-14 12:23:46'),
(33, '33_1385513370_Cote-dIvoire.png', '1385513370_Cote-dIvoire', 'image', '', 'png', '2014-01-14 12:24:00'),
(34, '34_1385513414_Nigeria.png', '1385513414_Nigeria', 'image', '', 'png', '2014-01-14 12:24:24'),
(35, '35_1385519835_Australia.png', '1385519835_Australia', 'image', '', 'png', '2014-01-14 12:24:35'),
(36, '36_1385521662_South-Korea.png', '1385521662_South-Korea', 'image', '', 'png', '2014-01-14 12:24:47'),
(37, '37_1385522372_Costa-Rica.png', '1385522372_Costa-Rica', 'image', '', 'png', '2014-01-14 12:25:00'),
(38, '38_1385522394_United-States.png', '1385522394_United-States', 'image', '', 'png', '2014-01-14 12:25:14'),
(39, '39_1385522402_Honduras.png', '1385522402_Honduras', 'image', '', 'png', '2014-01-14 12:25:24'),
(40, '40_1385522412_Iran.png', '1385522412_Iran', 'image', '', 'png', '2014-01-14 12:25:36'),
(41, '41_1385522447_Japan.png', '1385522447_Japan', 'image', '', 'png', '2014-01-14 12:25:46'),
(42, '42_1385522458_Mexico.png', '1385522458_Mexico', 'image', '', 'png', '2014-01-14 12:25:56'),
(43, '43_1387311198_Germany.png', '1387311198_Germany', 'image', '', 'png', '2014-01-14 12:26:06'),
(44, '44_team01.jpg', 'team01', 'image', '', 'jpg', '2014-04-03 16:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `file_managers`
--

DROP TABLE IF EXISTS `file_managers`;
CREATE TABLE `file_managers` (
  `file_manager_id` int(11) UNSIGNED NOT NULL,
  `file_manager` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file_managers`
--

INSERT INTO `file_managers` (`file_manager_id`, `file_manager`, `date_created`) VALUES
(1, '', '2013-07-30 12:30:01'),
(2, '', '2013-07-30 12:30:13'),
(3, '', '2013-07-30 12:33:16'),
(4, '', '2013-07-30 12:33:23'),
(5, '', '2013-07-30 14:53:56'),
(6, '', '2013-11-14 11:50:47'),
(7, '', '2013-12-02 11:32:16'),
(8, '', '2013-12-02 11:38:32'),
(9, '', '2013-12-02 11:38:42'),
(10, '', '2013-12-02 11:39:53'),
(11, '', '2013-12-02 11:40:32'),
(12, '', '2013-12-02 12:12:19'),
(13, '', '2013-12-02 12:12:39'),
(14, '', '2013-12-02 12:16:03'),
(15, '', '2013-12-02 12:16:13'),
(16, '', '2013-12-02 12:16:21'),
(17, '', '2013-12-02 12:16:34'),
(18, '', '2013-12-02 12:16:56'),
(19, '', '2013-12-02 12:17:02'),
(20, '', '2013-12-02 12:17:12'),
(21, '', '2013-12-02 12:17:24'),
(22, '', '2013-12-02 12:20:11'),
(23, '', '2013-12-02 12:35:16'),
(24, '', '2013-12-02 12:35:32'),
(25, '', '2013-12-02 12:40:42'),
(26, '', '2013-12-02 12:44:29'),
(27, '', '2013-12-05 11:56:36'),
(28, '', '2013-12-05 11:57:09'),
(29, '', '2013-12-05 11:58:30'),
(30, '', '2013-12-05 11:59:25'),
(31, '', '2013-12-05 11:59:35'),
(32, '', '2013-12-05 11:59:54'),
(33, '', '2013-12-05 12:00:07'),
(34, '', '2014-01-14 12:14:35'),
(35, '', '2014-01-14 12:14:51'),
(36, '', '2014-01-14 12:15:07'),
(37, '', '2014-01-14 12:15:42'),
(38, '', '2014-01-14 12:15:55'),
(39, '', '2014-01-14 12:16:07'),
(40, '', '2014-01-14 12:16:25'),
(41, '', '2014-01-14 12:16:43'),
(42, '', '2014-01-14 12:16:56'),
(43, '', '2014-01-14 12:17:17'),
(44, '', '2014-01-14 12:17:43'),
(45, '', '2014-01-14 12:17:57'),
(46, '', '2014-01-14 12:19:56'),
(47, '', '2014-01-14 12:21:25'),
(48, '', '2014-01-14 12:22:14'),
(49, '', '2014-01-14 12:22:42'),
(50, '', '2014-01-14 12:22:52'),
(51, '', '2014-01-14 12:23:04'),
(52, '', '2014-01-14 12:23:16'),
(53, '', '2014-01-14 12:23:32'),
(54, '', '2014-01-14 12:23:46'),
(55, '', '2014-01-14 12:24:00'),
(56, '', '2014-01-14 12:24:24'),
(57, '', '2014-01-14 12:24:35'),
(58, '', '2014-01-14 12:24:47'),
(59, '', '2014-01-14 12:25:00'),
(60, '', '2014-01-14 12:25:14'),
(61, '', '2014-01-14 12:25:24'),
(62, '', '2014-01-14 12:25:36'),
(63, '', '2014-01-14 12:25:46'),
(64, '', '2014-01-14 12:25:56'),
(65, '', '2014-01-14 12:26:06'),
(66, '', '2014-01-14 12:26:42'),
(67, '', '2018-04-02 18:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `file_managers_files`
--

DROP TABLE IF EXISTS `file_managers_files`;
CREATE TABLE `file_managers_files` (
  `file_manager_id` int(11) UNSIGNED NOT NULL,
  `file_id` int(11) UNSIGNED NOT NULL,
  `tag` varchar(255) NOT NULL,
  `order` mediumint(8) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file_managers_files`
--

INSERT INTO `file_managers_files` (`file_manager_id`, `file_id`, `tag`, `order`) VALUES
(6, 1, 'main_image', 0),
(12, 2, 'main_image', 0),
(13, 3, 'main_image', 0),
(14, 4, 'main_image', 0),
(23, 5, 'main_image', 0),
(24, 6, 'main_image', 0),
(25, 7, 'main_image', 0),
(26, 8, 'main_image', 0),
(28, 9, 'main_image', 0),
(29, 10, 'main_image', 0),
(32, 11, 'main_image', 0),
(34, 12, 'flag_image', 0),
(35, 13, 'flag_image', 0),
(36, 14, 'flag_image', 0),
(37, 15, 'flag_image', 0),
(38, 16, 'flag_image', 0),
(39, 17, 'flag_image', 0),
(40, 18, 'flag_image', 0),
(41, 19, 'flag_image', 0),
(42, 20, 'flag_image', 0),
(43, 21, 'flag_image', 0),
(44, 22, 'flag_image', 0),
(45, 23, 'flag_image', 0),
(46, 24, 'flag_image', 0),
(47, 25, 'flag_image', 0),
(48, 26, 'flag_image', 0),
(49, 27, 'flag_image', 0),
(50, 28, 'flag_image', 0),
(51, 29, 'flag_image', 0),
(52, 30, 'flag_image', 0),
(53, 31, 'flag_image', 0),
(54, 32, 'flag_image', 0),
(55, 33, 'flag_image', 0),
(56, 34, 'flag_image', 0),
(57, 35, 'flag_image', 0),
(58, 36, 'flag_image', 0),
(59, 37, 'flag_image', 0),
(60, 38, 'flag_image', 0),
(61, 39, 'flag_image', 0),
(62, 40, 'flag_image', 0),
(63, 41, 'flag_image', 0),
(64, 42, 'flag_image', 0),
(65, 43, 'flag_image', 0),
(18, 44, 'image_list', 0);

-- --------------------------------------------------------

--
-- Table structure for table `friends_leagues`
--

DROP TABLE IF EXISTS `friends_leagues`;
CREATE TABLE `friends_leagues` (
  `league_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `company_id` int(11) UNSIGNED NOT NULL,
  `company` varchar(255) NOT NULL,
  `creator_id` int(11) UNSIGNED NOT NULL,
  `creator_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `friends_leagues_users`
--

DROP TABLE IF EXISTS `friends_leagues_users`;
CREATE TABLE `friends_leagues_users` (
  `league_id` int(11) UNSIGNED NOT NULL,
  `league` varchar(255) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `ip_address` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `page` varchar(50) NOT NULL,
  `current_url` varchar(255) NOT NULL,
  `extra_index_id` int(11) UNSIGNED NOT NULL,
  `action` enum('view','add_to_list') NOT NULL,
  `date_submitted` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

DROP TABLE IF EXISTS `matches`;
CREATE TABLE `matches` (
  `match_id` int(11) UNSIGNED NOT NULL,
  `phase` enum('zone','8','4','semi','3y4','final') NOT NULL,
  `penalties` varchar(50) NOT NULL,
  `bet` varchar(255) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `tournament` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `phase_order` smallint(3) NOT NULL,
  `team1_id` int(11) NOT NULL,
  `team1_name` varchar(250) NOT NULL,
  `team1_abbr_name` varchar(255) NOT NULL,
  `team1_flag` varchar(255) NOT NULL,
  `team1_goals` int(11) NOT NULL,
  `team2_id` int(11) NOT NULL,
  `team2_name` varchar(250) NOT NULL,
  `team2_abbr_name` varchar(255) NOT NULL,
  `team2_flag` varchar(255) NOT NULL,
  `team2_goals` int(11) NOT NULL,
  `result` tinyint(2) NOT NULL DEFAULT '-2',
  `location` varchar(255) NOT NULL,
  `date_played` datetime NOT NULL,
  `file_manager_id` int(11) UNSIGNED NOT NULL,
  `active` smallint(1) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `tournament_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`match_id`, `phase`, `penalties`, `bet`, `tournament_id`, `tournament`, `zone`, `phase_order`, `team1_id`, `team1_name`, `team1_abbr_name`, `team1_flag`, `team1_goals`, `team2_id`, `team2_name`, `team2_abbr_name`, `team2_flag`, `team2_goals`, `result`, `location`, `date_played`, `file_manager_id`, `active`, `date_created`, `tournament_date`) VALUES
(1, 'zone', '', '1/3|9/2|11', 1, 'Mundial 2014', 'Grupo A', 0, 13, 'Brazil', 'Bra', 'https://www.adyouwish.com/fantasy/uploads/files/17_1385512279_Brazil.png', 0, 15, 'Croacia', 'Cro', 'https://www.adyouwish.com/fantasy/uploads/files/19_1385512324_Croatia.png', 0, -2, 'São Paulo', '2014-06-12 17:00:00', 0, 1, '2014-01-14 15:08:58', NULL),
(2, 'zone', '', '9.19|10.33|5.33', 1, 'Mundial 2014', 'Grupo A', 0, 38, 'México', 'Mex', 'https://www.adyouwish.com/fantasy/uploads/files/42_1385522458_Mexico.png', 0, 25, 'Camerún', 'Cam', 'https://www.adyouwish.com/fantasy/uploads/files/29_1385513135_Cameroon.png', 1, -2, 'Natal', '2014-06-13 13:00:00', 0, 1, '2014-01-14 15:10:36', NULL),
(3, 'zone', '', '3.55|4.5|6.32', 1, 'Mundial 2014', 'Grupo A', 0, 13, 'Brazil', 'Bra', 'https://www.adyouwish.com/fantasy/uploads/files/17_1385512279_Brazil.png', 0, 38, 'México', 'Mex', 'https://www.adyouwish.com/fantasy/uploads/files/42_1385522458_Mexico.png', 0, -2, 'Fortaleza', '2014-06-17 16:00:00', 0, 1, '2014-01-14 15:12:32', NULL),
(4, 'zone', '', '3.3|4.3|1.3', 1, 'Mundial 2014', 'Grupo A', 0, 25, 'Camerún', 'Cam', 'https://www.adyouwish.com/fantasy/uploads/files/29_1385513135_Cameroon.png', 0, 15, 'Croacia', 'Cro', 'https://www.adyouwish.com/fantasy/uploads/files/19_1385512324_Croatia.png', 0, -2, 'Manaos', '2014-06-18 18:00:00', 0, 1, '2014-01-14 15:13:20', NULL),
(5, 'zone', '', '2.44|4.12|1.10', 1, 'Mundial 2014', 'Grupo A', 0, 25, 'Camerún', 'Cam', 'https://www.adyouwish.com/fantasy/uploads/files/29_1385513135_Cameroon.png', 0, 13, 'Brazil', 'Bra', 'https://www.adyouwish.com/fantasy/uploads/files/17_1385512279_Brazil.png', 0, -2, 'Brasilia', '2014-06-23 17:00:00', 0, 1, '2014-01-14 15:13:53', NULL),
(6, 'zone', '', '', 1, 'Mundial 2014', 'Grupo A', 0, 15, 'Croacia', 'Cro', 'https://www.adyouwish.com/fantasy/uploads/files/19_1385512324_Croatia.png', 0, 38, 'México', 'Mex', 'https://www.adyouwish.com/fantasy/uploads/files/42_1385522458_Mexico.png', 0, -2, 'Recife', '2014-06-23 17:00:00', 0, 1, '2014-01-14 15:17:05', NULL),
(7, 'zone', '', '', 1, 'Mundial 2014', 'Grupo B', 0, 11, 'España', 'Esp', 'https://www.adyouwish.com/fantasy/uploads/files/15_1385512225_Spain.png', 0, 22, 'Holanda', 'Hol', 'https://www.adyouwish.com/fantasy/uploads/files/26_1385512485_Netherlands.png', 0, -2, 'Salvador', '2014-06-13 16:00:00', 0, 1, '2014-01-14 15:18:27', NULL),
(8, 'zone', '', '', 1, 'Mundial 2014', 'Grupo B', 0, 28, 'Chile', 'Chi', 'https://www.adyouwish.com/fantasy/uploads/files/32_1385513358_Chile.png', 0, 31, 'Australia', 'Aus', 'https://www.adyouwish.com/fantasy/uploads/files/35_1385519835_Australia.png', 0, -2, 'Cuiabá', '2014-06-13 18:00:00', 0, 1, '2014-01-14 15:19:13', NULL),
(9, 'zone', '', '', 1, 'Mundial 2014', 'Grupo B', 0, 11, 'España', 'Esp', 'https://www.adyouwish.com/fantasy/uploads/files/15_1385512225_Spain.png', 0, 28, 'Chile', 'Chi', 'https://www.adyouwish.com/fantasy/uploads/files/32_1385513358_Chile.png', 0, -2, 'Río de Janeiro', '2014-06-18 16:00:00', 0, 1, '2014-01-14 15:19:45', NULL),
(10, 'zone', '', '', 1, 'Mundial 2014', 'Grupo B', 0, 31, 'Australia', 'Aus', 'https://www.adyouwish.com/fantasy/uploads/files/35_1385519835_Australia.png', 0, 22, 'Holanda', 'Hol', 'https://www.adyouwish.com/fantasy/uploads/files/26_1385512485_Netherlands.png', 0, -2, 'Porto Alegre', '2014-06-18 13:00:00', 0, 1, '2014-01-14 15:20:18', NULL),
(11, 'zone', '', '', 1, 'Mundial 2014', 'Grupo B', 0, 31, 'Australia', 'Aus', 'https://www.adyouwish.com/fantasy/uploads/files/35_1385519835_Australia.png', 0, 11, 'España', 'Esp', 'https://www.adyouwish.com/fantasy/uploads/files/15_1385512225_Spain.png', 0, -2, 'Curitiba', '2014-06-23 13:00:00', 0, 1, '2014-01-14 15:20:45', NULL),
(12, 'zone', '', '', 1, 'Mundial 2014', 'Grupo B', 0, 22, 'Holanda', 'Hol', 'https://www.adyouwish.com/fantasy/uploads/files/26_1385512485_Netherlands.png', 0, 28, 'Chile', 'Chi', 'https://www.adyouwish.com/fantasy/uploads/files/32_1385513358_Chile.png', 0, -2, 'São Paulo', '2014-06-23 13:00:00', 0, 1, '2014-01-14 15:21:56', NULL),
(13, 'zone', '', '', 1, 'Mundial 2014', 'Grupo C', 0, 10, 'Colombia', 'Col', 'https://www.adyouwish.com/fantasy/uploads/files/14_1385512211_Colombia.png', 0, 16, 'Grecia', 'Gre', 'https://www.adyouwish.com/fantasy/uploads/files/20_1385512343_Greece.png', 0, -2, 'Belo Horizonte', '2014-06-14 13:00:00', 0, 1, '2014-01-14 15:22:29', NULL),
(14, 'zone', '', '', 1, 'Mundial 2014', 'Grupo C', 0, 29, 'Costa de Marfil', 'CdM', 'https://www.adyouwish.com/fantasy/uploads/files/33_1385513370_Cote-dIvoire.png', 0, 37, 'Japón', 'Jap', 'https://www.adyouwish.com/fantasy/uploads/files/41_1385522447_Japan.png', 0, -2, 'Recife', '2014-06-14 22:00:00', 0, 1, '2014-01-14 15:23:03', NULL),
(15, 'zone', '', '', 1, 'Mundial 2014', 'Grupo C', 0, 10, 'Colombia', 'Col', 'https://www.adyouwish.com/fantasy/uploads/files/14_1385512211_Colombia.png', 0, 29, 'Costa de Marfil', 'CdM', 'https://www.adyouwish.com/fantasy/uploads/files/33_1385513370_Cote-dIvoire.png', 0, -2, 'Brasilia', '2014-06-19 13:00:00', 0, 1, '2014-01-14 15:23:36', NULL),
(16, 'zone', '', '', 1, 'Mundial 2014', 'Grupo C', 0, 37, 'Japón', 'Jap', 'https://www.adyouwish.com/fantasy/uploads/files/41_1385522447_Japan.png', 0, 16, 'Grecia', 'Gre', 'https://www.adyouwish.com/fantasy/uploads/files/20_1385512343_Greece.png', 0, -2, 'Natal', '2014-06-19 19:00:00', 0, 1, '2014-01-14 15:24:09', NULL),
(17, 'zone', '', '', 1, 'Mundial 2014', 'Grupo C', 0, 37, 'Japón', 'Jap', 'https://www.adyouwish.com/fantasy/uploads/files/41_1385522447_Japan.png', 0, 10, 'Colombia', 'Col', 'https://www.adyouwish.com/fantasy/uploads/files/14_1385512211_Colombia.png', 0, -2, 'Cuiabá', '2014-06-24 16:00:00', 0, 1, '2014-01-14 15:24:58', NULL),
(18, 'zone', '', '', 1, 'Mundial 2014', 'Grupo C', 0, 16, 'Grecia', 'Gre', 'https://www.adyouwish.com/fantasy/uploads/files/20_1385512343_Greece.png', 0, 29, 'Costa de Marfil', 'CdM', 'https://www.adyouwish.com/fantasy/uploads/files/33_1385513370_Cote-dIvoire.png', 0, -2, 'Fortaleza', '2014-06-24 17:00:00', 0, 1, '2014-01-14 15:25:29', NULL),
(19, 'zone', '', '', 1, 'Mundial 2014', 'Grupo D', 0, 17, 'Uruguay', 'Uru', 'https://www.adyouwish.com/fantasy/uploads/files/21_1385512361_Uruguay.png', 0, 33, 'Costa Rica', 'CRC', 'https://www.adyouwish.com/fantasy/uploads/files/37_1385522372_Costa-Rica.png', 0, -2, 'Fortaleza', '2014-06-14 16:00:00', 0, 1, '2014-01-14 15:26:23', NULL),
(20, 'zone', '', '', 1, 'Mundial 2014', 'Grupo D', 0, 21, 'Inglaterra', 'Ing', 'https://www.adyouwish.com/fantasy/uploads/files/25_1385512461_England.png', 0, 18, 'Italia', 'Ita', 'https://www.adyouwish.com/fantasy/uploads/files/22_1385512372_Italy.png', 0, -2, 'Manaos', '2014-06-14 18:00:00', 0, 1, '2014-01-14 15:27:05', NULL),
(21, 'zone', '', '', 1, 'Mundial 2014', 'Grupo D', 0, 17, 'Uruguay', 'Uru', 'https://www.adyouwish.com/fantasy/uploads/files/21_1385512361_Uruguay.png', 0, 21, 'Inglaterra', 'Ing', 'https://www.adyouwish.com/fantasy/uploads/files/25_1385512461_England.png', 0, -2, 'São Paulo', '2014-06-19 16:00:00', 0, 1, '2014-01-14 15:27:42', NULL),
(22, 'zone', '', '', 1, 'Mundial 2014', 'Grupo D', 0, 18, 'Italia', 'Ita', 'https://www.adyouwish.com/fantasy/uploads/files/22_1385512372_Italy.png', 0, 33, 'Costa Rica', 'CRC', 'https://www.adyouwish.com/fantasy/uploads/files/37_1385522372_Costa-Rica.png', 0, -2, 'Recife', '2014-06-20 13:00:00', 0, 1, '2014-01-14 15:28:11', NULL),
(23, 'zone', '', '', 1, 'Mundial 2014', 'Grupo D', 0, 18, 'Italia', 'Ita', 'https://www.adyouwish.com/fantasy/uploads/files/22_1385512372_Italy.png', 0, 17, 'Uruguay', 'Uru', 'https://www.adyouwish.com/fantasy/uploads/files/21_1385512361_Uruguay.png', 0, -2, 'Natal', '2014-06-24 13:00:00', 0, 1, '2014-01-14 15:28:44', NULL),
(24, 'zone', '', '', 1, 'Mundial 2014', 'Grupo D', 0, 33, 'Costa Rica', 'CRC', 'https://www.adyouwish.com/fantasy/uploads/files/37_1385522372_Costa-Rica.png', 0, 21, 'Inglaterra', 'Ing', 'https://www.adyouwish.com/fantasy/uploads/files/25_1385512461_England.png', 0, -2, 'Belo Horizonte', '2014-06-24 13:00:00', 0, 1, '2014-01-14 15:29:13', NULL),
(25, 'zone', '', '', 1, 'Mundial 2014', 'Grupo E', 0, 19, 'Suiza', 'Sui', 'https://www.adyouwish.com/fantasy/uploads/files/23_1385512392_Switzerland.png', 0, 26, 'Ecuador', 'Ecu', 'https://www.adyouwish.com/fantasy/uploads/files/30_1385513279_Ecuador.png', 0, -2, 'Brasilia', '2014-06-15 13:00:00', 0, 1, '2014-01-14 15:30:09', NULL),
(26, 'zone', '', '', 1, 'Mundial 2014', 'Grupo E', 0, 12, 'Francia', 'Fra', 'https://www.adyouwish.com/fantasy/uploads/files/16_1385512241_France.png', 0, 35, 'Honduras', 'Hon', 'https://www.adyouwish.com/fantasy/uploads/files/39_1385522402_Honduras.png', 0, -2, 'Porto Alegre', '2014-06-15 16:00:00', 0, 1, '2014-01-14 15:30:38', NULL),
(27, 'zone', '', '', 1, 'Mundial 2014', 'Grupo E', 0, 19, 'Suiza', 'Sui', 'https://www.adyouwish.com/fantasy/uploads/files/23_1385512392_Switzerland.png', 0, 12, 'Francia', 'Fra', 'https://www.adyouwish.com/fantasy/uploads/files/16_1385512241_France.png', 0, -2, 'Salvador', '2014-06-20 16:00:00', 0, 1, '2014-01-14 15:31:29', NULL),
(28, 'zone', '', '', 1, 'Mundial 2014', 'Grupo E', 0, 35, 'Honduras', 'Hon', 'https://www.adyouwish.com/fantasy/uploads/files/39_1385522402_Honduras.png', 0, 26, 'Ecuador', 'Ecu', 'https://www.adyouwish.com/fantasy/uploads/files/30_1385513279_Ecuador.png', 0, -2, 'Curitiba', '2014-06-20 19:00:00', 0, 1, '2014-01-14 15:31:56', NULL),
(29, 'zone', '', '', 1, 'Mundial 2014', 'Grupo E', 0, 35, 'Honduras', 'Hon', 'https://www.adyouwish.com/fantasy/uploads/files/39_1385522402_Honduras.png', 0, 19, 'Suiza', 'Sui', 'https://www.adyouwish.com/fantasy/uploads/files/23_1385512392_Switzerland.png', 0, -2, 'Manaos', '2014-06-25 16:00:00', 0, 1, '2014-01-14 15:32:24', NULL),
(30, 'zone', '', '', 1, 'Mundial 2014', 'Grupo E', 0, 26, 'Ecuador', 'Ecu', 'https://www.adyouwish.com/fantasy/uploads/files/30_1385513279_Ecuador.png', 0, 12, 'Francia', 'Fra', 'https://www.adyouwish.com/fantasy/uploads/files/16_1385512241_France.png', 0, -2, 'Río de Janeiro', '2014-06-25 17:00:00', 0, 1, '2014-01-14 15:32:54', NULL),
(31, 'zone', '', '', 1, 'Mundial 2014', 'Grupo F', 0, 8, 'Argentina', 'Arg', 'https://www.adyouwish.com/fantasy/uploads/files/12_1385512190_Argentina.png', 0, 14, 'Bosnia', 'Bos', 'https://www.adyouwish.com/fantasy/uploads/files/18_1385512316_Bosnia-and-Herzegovina.png', 0, -2, 'Río de Janeiro', '2014-06-15 19:00:00', 0, 1, '2014-01-14 15:33:43', NULL),
(32, 'zone', '', '', 1, 'Mundial 2014', 'Grupo F', 0, 36, 'Irán', 'Ira', 'https://www.adyouwish.com/fantasy/uploads/files/40_1385522412_Iran.png', 0, 30, 'Nigeria', 'Nig', 'https://www.adyouwish.com/fantasy/uploads/files/34_1385513414_Nigeria.png', 0, -2, 'Curitiba', '2014-06-16 16:00:00', 0, 1, '2014-01-14 15:34:12', NULL),
(34, 'zone', '', '', 1, 'Mundial 2014', 'Grupo F', 0, 8, 'Argentina', 'Arg', 'https://www.adyouwish.com/fantasy/uploads/files/12_1385512190_Argentina.png', 0, 36, 'Irán', 'Ira', 'https://www.adyouwish.com/fantasy/uploads/files/40_1385522412_Iran.png', 0, -2, 'Belo Horizonte', '2014-06-21 13:00:00', 0, 1, '2014-01-14 15:34:40', NULL),
(35, 'zone', '', '', 1, 'Mundial 2014', 'Grupo F', 0, 30, 'Nigeria', 'Nig', 'https://www.adyouwish.com/fantasy/uploads/files/34_1385513414_Nigeria.png', 0, 14, 'Bosnia', 'Bos', 'https://www.adyouwish.com/fantasy/uploads/files/18_1385512316_Bosnia-and-Herzegovina.png', 0, -2, 'Cuiabá', '2014-06-21 18:00:00', 0, 1, '2014-01-14 15:35:17', NULL),
(36, 'zone', '', '', 1, 'Mundial 2014', 'Grupo F', 0, 30, 'Nigeria', 'Nig', 'https://www.adyouwish.com/fantasy/uploads/files/34_1385513414_Nigeria.png', 0, 8, 'Argentina', 'Arg', 'https://www.adyouwish.com/fantasy/uploads/files/12_1385512190_Argentina.png', 0, -2, 'Porto Alegre', '2014-06-25 13:00:00', 0, 1, '2014-01-14 15:35:45', NULL),
(37, 'zone', '', '', 1, 'Mundial 2014', 'Grupo F', 0, 14, 'Bosnia', 'Bos', 'https://www.adyouwish.com/fantasy/uploads/files/18_1385512316_Bosnia-and-Herzegovina.png', 0, 36, 'Irán', 'Ira', 'https://www.adyouwish.com/fantasy/uploads/files/40_1385522412_Iran.png', 0, -2, 'Salvador', '2014-06-25 13:00:00', 0, 1, '2014-01-14 15:36:13', NULL),
(38, 'zone', '', '', 1, 'Mundial 2014', 'Grupo G', 0, 39, 'Alemania', 'Ale', 'https://www.adyouwish.com/fantasy/uploads/files/43_1387311198_Germany.png', 0, 23, 'Portugal', 'Por', 'https://www.adyouwish.com/fantasy/uploads/files/27_1385512495_Portugal.png', 0, -2, 'Salvador', '2014-06-16 13:00:00', 0, 1, '2014-01-14 15:36:39', NULL),
(39, 'zone', '', '', 1, 'Mundial 2014', 'Grupo G', 0, 27, 'Ghana', 'Gha', 'https://www.adyouwish.com/fantasy/uploads/files/31_1385513300_Ghana.png', 0, 34, 'Estados Unidos', 'USA', 'https://www.adyouwish.com/fantasy/uploads/files/38_1385522394_United-States.png', 0, -2, 'Natal', '2014-06-16 19:00:00', 0, 1, '2014-01-14 15:38:02', NULL),
(40, 'zone', '', '', 1, 'Mundial 2014', 'Grupo G', 0, 39, 'Alemania', 'Ale', 'https://www.adyouwish.com/fantasy/uploads/files/43_1387311198_Germany.png', 0, 27, 'Ghana', 'Gha', 'https://www.adyouwish.com/fantasy/uploads/files/31_1385513300_Ghana.png', 0, -2, 'Fortaleza', '2014-06-21 16:00:00', 0, 1, '2014-01-14 15:38:34', NULL),
(41, 'zone', '', '', 1, 'Mundial 2014', 'Grupo G', 0, 34, 'Estados Unidos', 'USA', 'https://www.adyouwish.com/fantasy/uploads/files/38_1385522394_United-States.png', 0, 23, 'Portugal', 'Por', 'https://www.adyouwish.com/fantasy/uploads/files/27_1385512495_Portugal.png', 0, -2, 'Manaos', '2014-06-22 18:00:00', 0, 1, '2014-01-14 15:39:10', NULL),
(42, 'zone', '', '', 1, 'Mundial 2014', 'Grupo G', 0, 34, 'Estados Unidos', 'USA', 'https://www.adyouwish.com/fantasy/uploads/files/38_1385522394_United-States.png', 0, 39, 'Alemania', 'Ale', 'https://www.adyouwish.com/fantasy/uploads/files/43_1387311198_Germany.png', 0, -2, 'Recife', '2014-06-26 13:00:00', 0, 1, '2014-01-14 15:39:39', NULL),
(43, 'zone', '', '', 1, 'Mundial 2014', 'Grupo G', 0, 23, 'Portugal', 'Por', 'https://www.adyouwish.com/fantasy/uploads/files/27_1385512495_Portugal.png', 0, 27, 'Ghana', 'Gha', 'https://www.adyouwish.com/fantasy/uploads/files/31_1385513300_Ghana.png', 0, -2, 'Brasilia', '2014-06-26 13:00:00', 0, 1, '2014-01-14 15:40:03', NULL),
(44, 'zone', '', '', 1, 'Mundial 2014', 'Grupo H', 0, 9, 'Bélgica', 'Bel', 'https://www.adyouwish.com/fantasy/uploads/files/13_1385512198_Belgium.png', 0, 24, 'Algeria', 'Alg', 'https://www.adyouwish.com/fantasy/uploads/files/28_1385512527_Algeria.png', 0, -2, 'Belo Horizonte', '2014-06-17 13:00:00', 0, 1, '2014-01-14 15:40:32', NULL),
(45, 'zone', '', '', 1, 'Mundial 2014', 'Grupo H', 0, 20, 'Rusia', 'Rus', 'https://www.adyouwish.com/fantasy/uploads/files/24_1385512408_Russia.png', 0, 32, 'Corea del Sur', 'Cor', 'https://www.adyouwish.com/fantasy/uploads/files/36_1385521662_South-Korea.png', 0, -2, 'Cuiabá', '2014-06-17 18:00:00', 0, 1, '2014-01-14 15:40:58', NULL),
(46, 'zone', '', '', 1, 'Mundial 2014', 'Grupo H', 0, 9, 'Bélgica', 'Bel', 'https://www.adyouwish.com/fantasy/uploads/files/13_1385512198_Belgium.png', 0, 20, 'Rusia', 'Rus', 'https://www.adyouwish.com/fantasy/uploads/files/24_1385512408_Russia.png', 0, -2, 'Río de Janeiro', '2014-06-22 13:00:00', 0, 1, '2014-01-14 15:41:28', NULL),
(47, 'zone', '', '', 1, 'Mundial 2014', 'Grupo H', 0, 32, 'Corea del Sur', 'Cor', 'https://www.adyouwish.com/fantasy/uploads/files/36_1385521662_South-Korea.png', 0, 24, 'Algeria', 'Alg', 'https://www.adyouwish.com/fantasy/uploads/files/28_1385512527_Algeria.png', 0, -2, 'Porto Alegre', '2014-06-22 16:00:00', 0, 1, '2014-01-14 15:42:00', NULL),
(48, 'zone', '', '', 1, 'Mundial 2014', 'Grupo H', 0, 32, 'Corea del Sur', 'Cor', 'https://www.adyouwish.com/fantasy/uploads/files/36_1385521662_South-Korea.png', 0, 9, 'Bélgica', 'Bel', 'https://www.adyouwish.com/fantasy/uploads/files/13_1385512198_Belgium.png', 0, -2, 'São Paulo', '2014-06-26 17:00:00', 0, 1, '2014-01-14 15:42:27', NULL),
(49, 'zone', '', '', 1, 'Mundial 2014', 'Grupo H', 0, 24, 'Algeria', 'Alg', 'https://www.adyouwish.com/fantasy/uploads/files/28_1385512527_Algeria.png', 0, 20, 'Rusia', 'Rus', 'https://www.adyouwish.com/fantasy/uploads/files/24_1385512408_Russia.png', 0, -2, 'Curitiba', '2014-06-26 17:00:00', 0, 1, '2014-01-14 15:42:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `matches_bk`
--

DROP TABLE IF EXISTS `matches_bk`;
CREATE TABLE `matches_bk` (
  `match_id` int(11) UNSIGNED NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `tournament` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `zone_order` smallint(3) NOT NULL,
  `team1_id` int(11) NOT NULL,
  `team1_name` varchar(250) NOT NULL,
  `team1_abbr_name` varchar(255) NOT NULL,
  `team1_flag` varchar(255) NOT NULL,
  `team1_goals` int(11) NOT NULL,
  `team2_id` int(11) NOT NULL,
  `team2_name` varchar(250) NOT NULL,
  `team2_abbr_name` varchar(255) NOT NULL,
  `team2_flag` varchar(255) NOT NULL,
  `team2_goals` int(11) NOT NULL,
  `result` tinyint(2) NOT NULL DEFAULT '-2',
  `location` varchar(255) NOT NULL,
  `date_played` datetime NOT NULL,
  `file_manager_id` int(11) UNSIGNED NOT NULL,
  `active` smallint(1) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matches_bk`
--

INSERT INTO `matches_bk` (`match_id`, `tournament_id`, `tournament`, `zone`, `zone_order`, `team1_id`, `team1_name`, `team1_abbr_name`, `team1_flag`, `team1_goals`, `team2_id`, `team2_name`, `team2_abbr_name`, `team2_flag`, `team2_goals`, `result`, `location`, `date_played`, `file_manager_id`, `active`, `date_created`) VALUES
(1, 1, 'Mundial 2014', 'Grupo A', 0, 13, 'Brazil', 'Brazil', 'http://192.168.1.111/prode/uploads/files/17_1385512279_Brazil.png', 0, 15, 'Croacia', 'Croacia', 'http://192.168.1.111/prode/uploads/files/19_1385512324_Croatia.png', 0, -2, 'São Paulo', '2014-06-12 17:00:00', 0, 1, '2014-01-14 15:08:58'),
(2, 1, 'Mundial 2014', 'Grupo A', 0, 38, 'México', 'México', 'http://192.168.1.111/prode/uploads/files/42_1385522458_Mexico.png', 0, 25, 'Camerún', 'Camerún', 'http://192.168.1.111/prode/uploads/files/29_1385513135_Cameroon.png', 0, -2, 'Natal', '2014-06-13 13:00:00', 0, 1, '2014-01-14 15:10:36'),
(3, 1, 'Mundial 2014', 'Grupo A', 0, 13, 'Brazil', 'Brazil', 'http://192.168.1.111/prode/uploads/files/17_1385512279_Brazil.png', 0, 38, 'México', 'México', 'http://192.168.1.111/prode/uploads/files/42_1385522458_Mexico.png', 0, -2, 'Fortaleza', '2014-06-17 16:00:00', 0, 1, '2014-01-14 15:12:32'),
(4, 1, 'Mundial 2014', 'Grupo A', 0, 25, 'Camerún', 'Camerún', 'http://192.168.1.111/prode/uploads/files/29_1385513135_Cameroon.png', 0, 15, 'Croacia', 'Croacia', 'http://192.168.1.111/prode/uploads/files/19_1385512324_Croatia.png', 0, -2, 'Manaos', '2014-06-18 18:00:00', 0, 1, '2014-01-14 15:13:20'),
(5, 1, 'Mundial 2014', 'Grupo A', 0, 25, 'Camerún', 'Camerún', 'http://192.168.1.111/prode/uploads/files/29_1385513135_Cameroon.png', 0, 13, 'Brazil', 'Brazil', 'http://192.168.1.111/prode/uploads/files/17_1385512279_Brazil.png', 0, -2, 'Brasilia', '2014-06-23 17:00:00', 0, 1, '2014-01-14 15:13:53'),
(6, 1, 'Mundial 2014', 'Grupo A', 0, 15, 'Croacia', 'Croacia', 'http://192.168.1.111/prode/uploads/files/19_1385512324_Croatia.png', 0, 38, 'México', 'México', 'http://192.168.1.111/prode/uploads/files/42_1385522458_Mexico.png', 0, -2, 'Recife', '2014-06-23 17:00:00', 0, 1, '2014-01-14 15:17:05'),
(7, 1, 'Mundial 2014', 'Grupo B', 0, 11, 'España', 'España', 'http://192.168.1.111/prode/uploads/files/15_1385512225_Spain.png', 0, 22, 'Países Bajos', 'P. Bajos', 'http://192.168.1.111/prode/uploads/files/26_1385512485_Netherlands.png', 0, -2, 'Salvador', '2014-06-13 16:00:00', 0, 1, '2014-01-14 15:18:27'),
(8, 1, 'Mundial 2014', 'Grupo B', 0, 28, 'Chile', 'Chile', 'http://192.168.1.111/prode/uploads/files/32_1385513358_Chile.png', 0, 31, 'Australia', 'Australia', 'http://192.168.1.111/prode/uploads/files/35_1385519835_Australia.png', 0, -2, 'Cuiabá', '2014-06-13 18:00:00', 0, 1, '2014-01-14 15:19:13'),
(9, 1, 'Mundial 2014', 'Grupo B', 0, 11, 'España', 'España', 'http://192.168.1.111/prode/uploads/files/15_1385512225_Spain.png', 0, 28, 'Chile', 'Chile', 'http://192.168.1.111/prode/uploads/files/32_1385513358_Chile.png', 0, -2, 'Río de Janeiro', '2014-06-18 16:00:00', 0, 1, '2014-01-14 15:19:45'),
(10, 1, 'Mundial 2014', 'Grupo B', 0, 31, 'Australia', 'Australia', 'http://192.168.1.111/prode/uploads/files/35_1385519835_Australia.png', 0, 22, 'Países Bajos', 'P. Bajos', 'http://192.168.1.111/prode/uploads/files/26_1385512485_Netherlands.png', 0, -2, 'Porto Alegre', '2014-06-18 13:00:00', 0, 1, '2014-01-14 15:20:18'),
(11, 1, 'Mundial 2014', 'Grupo B', 0, 31, 'Australia', 'Australia', 'http://192.168.1.111/prode/uploads/files/35_1385519835_Australia.png', 0, 11, 'España', 'España', 'http://192.168.1.111/prode/uploads/files/15_1385512225_Spain.png', 0, -2, 'Curitiba', '2014-06-23 13:00:00', 0, 1, '2014-01-14 15:20:45'),
(12, 1, 'Mundial 2014', 'Grupo B', 0, 22, 'Países Bajos', 'P. Bajos', 'http://192.168.1.111/prode/uploads/files/26_1385512485_Netherlands.png', 0, 28, 'Chile', 'Chile', 'http://192.168.1.111/prode/uploads/files/32_1385513358_Chile.png', 0, -2, 'São Paulo', '2014-06-23 13:00:00', 0, 1, '2014-01-14 15:21:56'),
(13, 1, 'Mundial 2014', 'Grupo C', 0, 10, 'Colombia', 'Colombia', 'http://192.168.1.111/prode/uploads/files/14_1385512211_Colombia.png', 0, 16, 'Grecia', 'Grecia', 'http://192.168.1.111/prode/uploads/files/20_1385512343_Greece.png', 0, -2, 'Belo Horizonte', '2014-06-14 13:00:00', 0, 1, '2014-01-14 15:22:29'),
(14, 1, 'Mundial 2014', 'Grupo C', 0, 29, 'Costa de Marfil', 'C. de Marfil', 'http://192.168.1.111/prode/uploads/files/33_1385513370_Cote-dIvoire.png', 0, 37, 'Japón', 'Japón', 'http://192.168.1.111/prode/uploads/files/41_1385522447_Japan.png', 0, -2, 'Recife', '2014-06-14 22:00:00', 0, 1, '2014-01-14 15:23:03'),
(15, 1, 'Mundial 2014', 'Grupo C', 0, 10, 'Colombia', 'Colombia', 'http://192.168.1.111/prode/uploads/files/14_1385512211_Colombia.png', 0, 29, 'Costa de Marfil', 'C. de Marfil', 'http://192.168.1.111/prode/uploads/files/33_1385513370_Cote-dIvoire.png', 0, -2, 'Brasilia', '2014-06-19 13:00:00', 0, 1, '2014-01-14 15:23:36'),
(16, 1, 'Mundial 2014', 'Grupo C', 0, 37, 'Japón', 'Japón', 'http://192.168.1.111/prode/uploads/files/41_1385522447_Japan.png', 0, 16, 'Grecia', 'Grecia', 'http://192.168.1.111/prode/uploads/files/20_1385512343_Greece.png', 0, -2, 'Natal', '2014-06-19 19:00:00', 0, 1, '2014-01-14 15:24:09'),
(17, 1, 'Mundial 2014', 'Grupo C', 0, 37, 'Japón', 'Japón', 'http://192.168.1.111/prode/uploads/files/41_1385522447_Japan.png', 0, 10, 'Colombia', 'Colombia', 'http://192.168.1.111/prode/uploads/files/14_1385512211_Colombia.png', 0, -2, 'Cuiabá', '2014-06-24 16:00:00', 0, 1, '2014-01-14 15:24:58'),
(18, 1, 'Mundial 2014', 'Grupo C', 0, 16, 'Grecia', 'Grecia', 'http://192.168.1.111/prode/uploads/files/20_1385512343_Greece.png', 0, 29, 'Costa de Marfil', 'C. de Marfil', 'http://192.168.1.111/prode/uploads/files/33_1385513370_Cote-dIvoire.png', 0, -2, 'Fortaleza', '2014-06-24 17:00:00', 0, 1, '2014-01-14 15:25:29'),
(19, 1, 'Mundial 2014', 'Grupo D', 0, 17, 'Uruguay', 'Uruguay', 'http://192.168.1.111/prode/uploads/files/21_1385512361_Uruguay.png', 0, 33, 'Costa Rica', 'C. Rica', 'http://192.168.1.111/prode/uploads/files/37_1385522372_Costa-Rica.png', 0, -2, 'Fortaleza', '2014-06-14 16:00:00', 0, 1, '2014-01-14 15:26:23'),
(20, 1, 'Mundial 2014', 'Grupo D', 0, 21, 'Inglaterra', 'Ing.', 'http://192.168.1.111/prode/uploads/files/25_1385512461_England.png', 0, 18, 'Italia', 'Italia', 'http://192.168.1.111/prode/uploads/files/22_1385512372_Italy.png', 0, -2, 'Manaos', '2014-06-14 18:00:00', 0, 1, '2014-01-14 15:27:05'),
(21, 1, 'Mundial 2014', 'Grupo D', 0, 17, 'Uruguay', 'Uruguay', 'http://192.168.1.111/prode/uploads/files/21_1385512361_Uruguay.png', 0, 21, 'Inglaterra', 'Ing.', 'http://192.168.1.111/prode/uploads/files/25_1385512461_England.png', 0, -2, 'São Paulo', '2014-06-19 16:00:00', 0, 1, '2014-01-14 15:27:42'),
(22, 1, 'Mundial 2014', 'Grupo D', 0, 18, 'Italia', 'Italia', 'http://192.168.1.111/prode/uploads/files/22_1385512372_Italy.png', 0, 33, 'Costa Rica', 'C. Rica', 'http://192.168.1.111/prode/uploads/files/37_1385522372_Costa-Rica.png', 0, -2, 'Recife', '2014-06-20 13:00:00', 0, 1, '2014-01-14 15:28:11'),
(23, 1, 'Mundial 2014', 'Grupo D', 0, 18, 'Italia', 'Italia', 'http://192.168.1.111/prode/uploads/files/22_1385512372_Italy.png', 0, 17, 'Uruguay', 'Uruguay', 'http://192.168.1.111/prode/uploads/files/21_1385512361_Uruguay.png', 0, -2, 'Natal', '2014-06-24 13:00:00', 0, 1, '2014-01-14 15:28:44'),
(24, 1, 'Mundial 2014', 'Grupo D', 0, 33, 'Costa Rica', 'C. Rica', 'http://192.168.1.111/prode/uploads/files/37_1385522372_Costa-Rica.png', 0, 21, 'Inglaterra', 'Ing.', 'http://192.168.1.111/prode/uploads/files/25_1385512461_England.png', 0, -2, 'Belo Horizonte', '2014-06-24 13:00:00', 0, 1, '2014-01-14 15:29:13'),
(25, 1, 'Mundial 2014', 'Grupo E', 0, 19, 'Suiza', 'Suiza', 'http://192.168.1.111/prode/uploads/files/23_1385512392_Switzerland.png', 0, 26, 'Ecuador', 'Ecuador', 'http://192.168.1.111/prode/uploads/files/30_1385513279_Ecuador.png', 0, -2, 'Brasilia', '2014-06-15 13:00:00', 0, 1, '2014-01-14 15:30:09'),
(26, 1, 'Mundial 2014', 'Grupo E', 0, 12, 'Francia', 'Francia', 'http://192.168.1.111/prode/uploads/files/16_1385512241_France.png', 0, 35, 'Honduras', 'Honduras', 'http://192.168.1.111/prode/uploads/files/39_1385522402_Honduras.png', 0, -2, 'Porto Alegre', '2014-06-15 16:00:00', 0, 1, '2014-01-14 15:30:38'),
(27, 1, 'Mundial 2014', 'Grupo E', 0, 19, 'Suiza', 'Suiza', 'http://192.168.1.111/prode/uploads/files/23_1385512392_Switzerland.png', 0, 12, 'Francia', 'Francia', 'http://192.168.1.111/prode/uploads/files/16_1385512241_France.png', 0, -2, 'Salvador', '2014-06-20 16:00:00', 0, 1, '2014-01-14 15:31:29'),
(28, 1, 'Mundial 2014', 'Grupo E', 0, 35, 'Honduras', 'Honduras', 'http://192.168.1.111/prode/uploads/files/39_1385522402_Honduras.png', 0, 26, 'Ecuador', 'Ecuador', 'http://192.168.1.111/prode/uploads/files/30_1385513279_Ecuador.png', 0, -2, 'Curitiba', '2014-06-20 19:00:00', 0, 1, '2014-01-14 15:31:56'),
(29, 1, 'Mundial 2014', 'Grupo E', 0, 35, 'Honduras', 'Honduras', 'http://192.168.1.111/prode/uploads/files/39_1385522402_Honduras.png', 0, 19, 'Suiza', 'Suiza', 'http://192.168.1.111/prode/uploads/files/23_1385512392_Switzerland.png', 0, -2, 'Manaos', '2014-06-25 16:00:00', 0, 1, '2014-01-14 15:32:24'),
(30, 1, 'Mundial 2014', 'Grupo E', 0, 26, 'Ecuador', 'Ecuador', 'http://192.168.1.111/prode/uploads/files/30_1385513279_Ecuador.png', 0, 12, 'Francia', 'Francia', 'http://192.168.1.111/prode/uploads/files/16_1385512241_France.png', 0, -2, 'Río de Janeiro', '2014-06-25 17:00:00', 0, 1, '2014-01-14 15:32:54'),
(31, 1, 'Mundial 2014', 'Grupo F', 0, 8, 'Argentina', 'Arg.', 'http://192.168.1.111/prode/uploads/files/12_1385512190_Argentina.png', 0, 14, 'Bosnia', 'Bosnia', 'http://192.168.1.111/prode/uploads/files/18_1385512316_Bosnia-and-Herzegovina.png', 0, -2, 'Río de Janeiro', '2014-06-15 19:00:00', 0, 1, '2014-01-14 15:33:43'),
(32, 1, 'Mundial 2014', 'Grupo F', 0, 36, 'Irán', 'Irán', 'http://192.168.1.111/prode/uploads/files/40_1385522412_Iran.png', 0, 30, 'Nigeria', 'Nigeria', 'http://192.168.1.111/prode/uploads/files/34_1385513414_Nigeria.png', 0, -2, 'Curitiba', '2014-06-16 16:00:00', 0, 1, '2014-01-14 15:34:12'),
(34, 1, 'Mundial 2014', 'Grupo F', 0, 8, 'Argentina', 'Arg.', 'http://192.168.1.111/prode/uploads/files/12_1385512190_Argentina.png', 0, 36, 'Irán', 'Irán', 'http://192.168.1.111/prode/uploads/files/40_1385522412_Iran.png', 0, -2, 'Belo Horizonte', '2014-06-21 13:00:00', 0, 1, '2014-01-14 15:34:40'),
(35, 1, 'Mundial 2014', 'Grupo F', 0, 30, 'Nigeria', 'Nigeria', 'http://192.168.1.111/prode/uploads/files/34_1385513414_Nigeria.png', 0, 14, 'Bosnia', 'Bosnia', 'http://192.168.1.111/prode/uploads/files/18_1385512316_Bosnia-and-Herzegovina.png', 0, -2, 'Cuiabá', '2014-06-21 18:00:00', 0, 1, '2014-01-14 15:35:17'),
(36, 1, 'Mundial 2014', 'Grupo F', 0, 30, 'Nigeria', 'Nigeria', 'http://192.168.1.111/prode/uploads/files/34_1385513414_Nigeria.png', 0, 8, 'Argentina', 'Arg.', 'http://192.168.1.111/prode/uploads/files/12_1385512190_Argentina.png', 0, -2, 'Porto Alegre', '2014-06-25 13:00:00', 0, 1, '2014-01-14 15:35:45'),
(37, 1, 'Mundial 2014', 'Grupo F', 0, 14, 'Bosnia', 'Bosnia', 'http://192.168.1.111/prode/uploads/files/18_1385512316_Bosnia-and-Herzegovina.png', 0, 36, 'Irán', 'Irán', 'http://192.168.1.111/prode/uploads/files/40_1385522412_Iran.png', 0, -2, 'Salvador', '2014-06-25 13:00:00', 0, 1, '2014-01-14 15:36:13'),
(38, 1, 'Mundial 2014', 'Grupo G', 0, 39, 'Alemania', 'Alemania', 'http://192.168.1.111/prode/uploads/files/43_1387311198_Germany.png', 0, 23, 'Portugal', 'Portugal', 'http://192.168.1.111/prode/uploads/files/27_1385512495_Portugal.png', 0, -2, 'Salvador', '2014-06-16 13:00:00', 0, 1, '2014-01-14 15:36:39'),
(39, 1, 'Mundial 2014', 'Grupo G', 0, 27, 'Ghana', 'Ghana', 'http://192.168.1.111/prode/uploads/files/31_1385513300_Ghana.png', 0, 34, 'Estados Unidos', 'EE. UU.', 'http://192.168.1.111/prode/uploads/files/38_1385522394_United-States.png', 0, -2, 'Natal', '2014-06-16 19:00:00', 0, 1, '2014-01-14 15:38:02'),
(40, 1, 'Mundial 2014', 'Grupo G', 0, 39, 'Alemania', 'Alemania', 'http://192.168.1.111/prode/uploads/files/43_1387311198_Germany.png', 0, 27, 'Ghana', 'Ghana', 'http://192.168.1.111/prode/uploads/files/31_1385513300_Ghana.png', 0, -2, 'Fortaleza', '2014-06-21 16:00:00', 0, 1, '2014-01-14 15:38:34'),
(41, 1, 'Mundial 2014', 'Grupo G', 0, 34, 'Estados Unidos', 'EE. UU.', 'http://192.168.1.111/prode/uploads/files/38_1385522394_United-States.png', 0, 23, 'Portugal', 'Portugal', 'http://192.168.1.111/prode/uploads/files/27_1385512495_Portugal.png', 0, -2, 'Manaos', '2014-06-22 18:00:00', 0, 1, '2014-01-14 15:39:10'),
(42, 1, 'Mundial 2014', 'Grupo G', 0, 34, 'Estados Unidos', 'EE. UU.', 'http://192.168.1.111/prode/uploads/files/38_1385522394_United-States.png', 0, 39, 'Alemania', 'Alemania', 'http://192.168.1.111/prode/uploads/files/43_1387311198_Germany.png', 0, -2, 'Recife', '2014-06-26 13:00:00', 0, 1, '2014-01-14 15:39:39'),
(43, 1, 'Mundial 2014', 'Grupo G', 0, 23, 'Portugal', 'Portugal', 'http://192.168.1.111/prode/uploads/files/27_1385512495_Portugal.png', 0, 27, 'Ghana', 'Ghana', 'http://192.168.1.111/prode/uploads/files/31_1385513300_Ghana.png', 0, -2, 'Brasilia', '2014-06-26 13:00:00', 0, 1, '2014-01-14 15:40:03'),
(44, 1, 'Mundial 2014', 'Grupo H', 0, 9, 'Bélgica', 'Bélgica', 'http://192.168.1.111/prode/uploads/files/13_1385512198_Belgium.png', 0, 24, 'Algeria', 'Algeria', 'http://192.168.1.111/prode/uploads/files/28_1385512527_Algeria.png', 0, -2, 'Belo Horizonte', '2014-06-17 13:00:00', 0, 1, '2014-01-14 15:40:32'),
(45, 1, 'Mundial 2014', 'Grupo H', 0, 20, 'Rusia', 'Rusia', 'http://192.168.1.111/prode/uploads/files/24_1385512408_Russia.png', 0, 32, 'Corea del Sur', 'Corea S.', 'http://192.168.1.111/prode/uploads/files/36_1385521662_South-Korea.png', 0, -2, 'Cuiabá', '2014-06-17 18:00:00', 0, 1, '2014-01-14 15:40:58'),
(46, 1, 'Mundial 2014', 'Grupo H', 0, 9, 'Bélgica', 'Bélgica', 'http://192.168.1.111/prode/uploads/files/13_1385512198_Belgium.png', 0, 20, 'Rusia', 'Rusia', 'http://192.168.1.111/prode/uploads/files/24_1385512408_Russia.png', 0, -2, 'Río de Janeiro', '2014-06-22 13:00:00', 0, 1, '2014-01-14 15:41:28'),
(47, 1, 'Mundial 2014', 'Grupo H', 0, 32, 'Corea del Sur', 'Corea S.', 'http://192.168.1.111/prode/uploads/files/36_1385521662_South-Korea.png', 0, 24, 'Algeria', 'Algeria', 'http://192.168.1.111/prode/uploads/files/28_1385512527_Algeria.png', 0, -2, 'Porto Alegre', '2014-06-22 16:00:00', 0, 1, '2014-01-14 15:42:00'),
(48, 1, 'Mundial 2014', 'Grupo H', 0, 32, 'Corea del Sur', 'Corea S.', 'http://192.168.1.111/prode/uploads/files/36_1385521662_South-Korea.png', 0, 9, 'Bélgica', 'Bélgica', 'http://192.168.1.111/prode/uploads/files/13_1385512198_Belgium.png', 0, -2, 'São Paulo', '2014-06-26 17:00:00', 0, 1, '2014-01-14 15:42:27'),
(49, 1, 'Mundial 2014', 'Grupo H', 0, 24, 'Algeria', 'Algeria', 'http://192.168.1.111/prode/uploads/files/28_1385512527_Algeria.png', 0, 20, 'Rusia', 'Rusia', 'http://192.168.1.111/prode/uploads/files/24_1385512408_Russia.png', 0, -2, 'Curitiba', '2014-06-26 17:00:00', 0, 1, '2014-01-14 15:42:54');

-- --------------------------------------------------------

--
-- Table structure for table `participations`
--

DROP TABLE IF EXISTS `participations`;
CREATE TABLE `participations` (
  `participation_id` int(11) NOT NULL,
  `contact_id` int(11) UNSIGNED NOT NULL,
  `fb_uid` bigint(20) NOT NULL,
  `date_created` datetime NOT NULL,
  `confirmed_partners` tinyint(2) NOT NULL,
  `winner` tinyint(1) NOT NULL,
  `fb_request_app_id` bigint(20) UNSIGNED NOT NULL,
  `total` mediumint(5) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `participations_fb_app_requests`
--

DROP TABLE IF EXISTS `participations_fb_app_requests`;
CREATE TABLE `participations_fb_app_requests` (
  `fb_request_app_id` bigint(20) NOT NULL,
  `fb_uid` bigint(20) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `participations_partners`
--

DROP TABLE IF EXISTS `participations_partners`;
CREATE TABLE `participations_partners` (
  `participation_id` int(11) UNSIGNED NOT NULL,
  `fb_uid` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `date_confirmed` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file_manager_id` int(11) UNSIGNED NOT NULL,
  `active` smallint(1) UNSIGNED NOT NULL,
  `hits` int(11) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `creator_id` int(11) UNSIGNED NOT NULL,
  `creator_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products_deleted`
--

DROP TABLE IF EXISTS `products_deleted`;
CREATE TABLE `products_deleted` (
  `product_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `brief` varchar(255) NOT NULL COMMENT 'Max 255 caracteres',
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `price_title` varchar(255) NOT NULL,
  `price_unit` enum('unidad','servicio') NOT NULL,
  `warranty` varchar(4) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `discount_type` varchar(255) NOT NULL,
  `total_fees` smallint(3) NOT NULL,
  `fee_amount` float(9,2) NOT NULL,
  `file_manager_id` int(11) UNSIGNED NOT NULL,
  `active` smallint(1) UNSIGNED NOT NULL,
  `views` int(11) UNSIGNED NOT NULL,
  `show_in_home` tinyint(1) UNSIGNED NOT NULL,
  `in_promo` tinyint(1) UNSIGNED NOT NULL COMMENT 'El producto se mostrará en el cuadro de promociones',
  `date_created` datetime NOT NULL,
  `creator_id` int(11) UNSIGNED NOT NULL,
  `creator_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prognostics`
--

DROP TABLE IF EXISTS `prognostics`;
CREATE TABLE `prognostics` (
  `prognostic_id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `tournament` varchar(255) NOT NULL,
  `match_id` int(11) NOT NULL,
  `matchname` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `team1_goals` int(11) NOT NULL,
  `team2_goals` int(11) NOT NULL,
  `result` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prognostics`
--

INSERT INTO `prognostics` (`prognostic_id`, `tournament_id`, `tournament`, `match_id`, `matchname`, `user_id`, `team1_goals`, `team2_goals`, `result`, `username`, `date_created`) VALUES
(1, 1, 'Mundial 2014', 1, 'Grupo A: Brazil vs Croacia', 999, 3, 1, -1, 'satan', '2014-01-22 20:14:46'),
(2, 1, 'Mundial 2014', 2, 'Grupo A: México vs Camerún', 999, 3, 3, 0, 'satan', '2014-01-22 20:14:46'),
(3, 1, 'Mundial 2014', 3, 'Grupo A: Brazil vs México', 999, 0, 2, 1, 'satan', '2014-01-22 20:14:46'),
(4, 1, 'Mundial 2014', 4, 'Grupo A: Camerún vs Croacia', 999, 1, 0, -1, 'satan', '2014-01-22 20:14:46'),
(5, 1, 'Mundial 2014', 1, 'Grupo A: Brazil vs Croacia', 666, 3, 1, -1, 'satan', '2014-02-07 19:28:40'),
(6, 1, 'Mundial 2014', 5, 'Grupo A: Camerún vs Brazil', 666, 1, 0, -1, 'satan', '2014-02-07 19:29:37'),
(7, 1, 'Mundial 2014', 7, 'Grupo B: España vs P. Bajos', 666, 1, 0, -1, 'satan', '2014-02-07 19:29:37'),
(8, 1, 'Mundial 2014', 11, 'Grupo B: Australia vs España', 666, 1, 0, -1, 'satan', '2014-02-07 19:29:37'),
(9, 1, 'Mundial 2014', 12, 'Grupo B: P. Bajos vs Chile', 666, 1, 0, -1, 'satan', '2014-02-07 19:29:37'),
(10, 1, 'Mundial 2014', 16, 'Grupo C: Japón vs Grecia', 666, 0, 0, 0, 'satan', '2014-02-07 19:29:37'),
(11, 1, 'Mundial 2014', 20, 'Grupo D: Inglaterra vs Italia', 666, 1, 0, -1, 'satan', '2014-02-07 19:29:37'),
(12, 1, 'Mundial 2014', 21, 'Grupo D: Uruguay vs Inglaterra', 666, 1, 0, -1, 'satan', '2014-02-07 19:29:37'),
(13, 1, 'Mundial 2014', 17, 'Grupo C: Japón vs Colombia', 666, 1, 1, 0, 'satan', '2014-02-07 19:29:55'),
(14, 1, 'Mundial 2014', 22, 'Grupo D: Italia vs Costa Rica', 666, 1, 0, -1, 'satan', '2014-02-07 19:29:55'),
(15, 1, 'Mundial 2014', 23, 'Grupo D: Italia vs Uruguay', 666, 1, 0, -1, 'satan', '2014-02-07 19:29:55'),
(16, 1, 'Mundial 2014', 24, 'Grupo D: Costa Rica vs Inglaterra', 666, 1, 0, -1, 'satan', '2014-02-07 19:29:55'),
(17, 1, 'Mundial 2014', 2, 'Grupo A: Méx vs Cam', 666, 3, 2, -1, 'satan', '2014-03-19 13:48:51'),
(18, 1, 'Mundial 2014', 3, 'Grupo A: Brazil vs Méx', 666, 2, 1, -1, 'satan', '2014-03-19 13:48:51'),
(19, 1, 'Mundial 2014', 8, 'Grupo B: Chile vs Aus', 666, 2, 1, -1, 'satan', '2014-03-19 13:48:51'),
(20, 1, 'Mundial 2014', 42, ': USA vs Ale', 666, 1, 3, 1, 'satan', '2014-03-31 19:38:14'),
(21, 1, 'Mundial 2014', 1, ': Bra vs Cro', 1, 3, 0, -1, 'juan', '2014-04-24 21:49:14'),
(22, 1, 'Mundial 2014', 2, ': Mex vs Cam', 1, 2, 0, -1, 'juan', '2014-04-24 21:49:14'),
(23, 1, 'Mundial 2014', 7, ': Esp vs Hol', 1, 3, 0, -1, 'juan', '2014-04-24 21:49:14'),
(24, 1, 'Mundial 2014', 8, ': Chi vs Aus', 1, 5, 3, -1, 'juan', '2014-04-24 21:49:14'),
(25, 1, 'Mundial 2014', 13, ': Col vs Gre', 1, 3, 3, 0, 'juan', '2014-04-24 21:49:14'),
(26, 1, 'Mundial 2014', 19, ': Uru vs CRC', 1, 3, 3, 0, 'juan', '2014-04-24 21:49:14'),
(27, 1, 'Mundial 2014', 20, ': Ing vs Ita', 1, 3, 5, 1, 'juan', '2014-04-24 21:49:14'),
(28, 1, 'Mundial 2014', 14, ': CdM vs Jap', 1, 4, 3, -1, 'juan', '2014-04-24 21:49:14'),
(29, 1, 'Mundial 2014', 25, ': Sui vs Ecu', 1, 5, 5, 0, 'juan', '2014-04-24 21:49:14'),
(30, 1, 'Mundial 2014', 26, ': Fra vs Hon', 1, 4, 0, -1, 'juan', '2014-04-24 21:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces` (
  `province_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `province_order` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`province_id`, `name`, `province_order`) VALUES
(1, 'Buenos Aires', 1),
(2, 'Catamarca', 2),
(3, 'Chaco', 3),
(4, 'Chubut', 4),
(5, 'Cordoba', 5),
(6, 'Corrientes', 6),
(8, 'Entre Rios', 8),
(9, 'Formosa', 9),
(14, 'Jujuy', 14),
(15, 'La Pampa', 15),
(16, 'La Rioja', 16),
(17, 'Mendoza', 17),
(18, 'Misiones', 18),
(19, 'Neuquén', 19),
(20, 'Río Negro', 20),
(21, 'Salta', 21),
(22, 'San Luis', 22),
(23, 'Santa Cruz', 23),
(24, 'Santiago Del Estero', 24),
(25, 'Tierra Del Fuego', 25),
(26, 'Tucumán', 26),
(27, 'San Juan', 27),
(28, 'Santa Fe', 28),
(29, 'Capital Federal', 0);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

DROP TABLE IF EXISTS `scores`;
CREATE TABLE `scores` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `points` int(5) UNSIGNED NOT NULL,
  `results` mediumint(3) NOT NULL,
  `exact_results` mediumint(3) NOT NULL,
  `badges` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `company_id` int(11) UNSIGNED NOT NULL,
  `department` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`user_id`, `username`, `points`, `results`, `exact_results`, `badges`, `company`, `company_id`, `department`, `branch`) VALUES
(1, 'Xavier Beltrán', 34, 4, 4, '1/2', 'adyouwish', 1, 'Diseño', 'D.F.'),
(2, 'Dolores Gobbi', 27, 4, 3, '4|5|6|15/2|18/2', 'adyouwish', 1, 'Community Manager', 'D.F.'),
(3, 'Victoria Saiz', 15, 0, 3, '11|12|9/3', 'adyouwish', 1, 'Community Manager', 'Jalisco'),
(4, 'Juan Allen', 17, 4, 1, '3/2|12/2|14/2|18', 'adyouwish', 1, 'Ventas', 'Jalisco'),
(5, 'Exzequiel Tortorelli', 20, 0, 4, '12/3', 'adyouwish', 1, 'Ventas', 'Jalisco'),
(6, 'Matias Vasquez', 25, 0, 5, '18|1/2', 'adyouwish', 1, 'Ventas', 'Aguas Calientes'),
(7, 'Joaquín Astelarra', 31, 2, 5, '10/2|11/2|18|14/2', 'adyouwish', 1, 'Sistemas', 'Aguas Calientes'),
(8, 'Francisco Niethart', 12, 4, 0, '1/2|12/3|10|9/2', 'adyouwish', 1, 'Community Manager', 'Aguas Calientes');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `team_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `abbr_name` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `team_flag` varchar(255) NOT NULL,
  `file_manager_id` int(11) UNSIGNED NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `creator_id` int(11) UNSIGNED NOT NULL,
  `creator_name` varchar(255) NOT NULL,
  `pj` int(3) DEFAULT NULL,
  `pg` int(3) DEFAULT NULL,
  `pe` int(3) DEFAULT NULL,
  `pp` int(3) DEFAULT NULL,
  `pts` int(3) DEFAULT NULL,
  `qualyfied` tinyint(1) DEFAULT NULL,
  `final_pos` smallint(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `name`, `abbr_name`, `zone`, `description`, `team_flag`, `file_manager_id`, `active`, `date_created`, `creator_id`, `creator_name`, `pj`, `pg`, `pe`, `pp`, `pts`, `qualyfied`, `final_pos`) VALUES
(12, 'Francia', 'Fra', 'Grupo E', '', 'https://www.adyouwish.com/fantasy/uploads/files/16_1385512241_France.png', 38, 1, '2014-01-14 12:15:55', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Bélgica', 'Bel', 'Grupo H', '', 'https://www.adyouwish.com/fantasy/uploads/files/13_1385512198_Belgium.png', 35, 1, '2014-01-14 12:14:51', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Argentina', 'Arg', 'Grupo F', '', 'https://www.adyouwish.com/fantasy/uploads/files/12_1385512190_Argentina.png', 34, 1, '2014-01-14 12:14:35', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Brazil', 'Bra', 'Grupo A', '', 'https://www.adyouwish.com/fantasy/uploads/files/17_1385512279_Brazil.png', 39, 1, '2014-01-14 12:16:07', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'España', 'Esp', 'Grupo B', '', 'https://www.adyouwish.com/fantasy/uploads/files/15_1385512225_Spain.png', 37, 1, '2014-01-14 12:15:42', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Colombia', 'Col', 'Grupo C', '', 'https://www.adyouwish.com/fantasy/uploads/files/14_1385512211_Colombia.png', 36, 1, '2014-01-14 12:15:07', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Bosnia', 'Bos', 'Grupo F', '', 'https://www.adyouwish.com/fantasy/uploads/files/18_1385512316_Bosnia-and-Herzegovina.png', 40, 1, '2014-01-14 12:16:25', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Croacia', 'Cro', 'Grupo A', '', 'https://www.adyouwish.com/fantasy/uploads/files/19_1385512324_Croatia.png', 41, 1, '2014-01-14 12:16:43', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Grecia', 'Gre', 'Grupo C', '', 'https://www.adyouwish.com/fantasy/uploads/files/20_1385512343_Greece.png', 42, 1, '2014-01-14 12:16:56', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Uruguay', 'Uru', 'Grupo D', '', 'https://www.adyouwish.com/fantasy/uploads/files/21_1385512361_Uruguay.png', 43, 1, '2014-01-14 12:17:17', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Italia', 'Ita', 'Grupo D', '', 'https://www.adyouwish.com/fantasy/uploads/files/22_1385512372_Italy.png', 44, 1, '2014-01-14 12:17:43', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Suiza', 'Sui', 'Grupo E', '', 'https://www.adyouwish.com/fantasy/uploads/files/23_1385512392_Switzerland.png', 45, 1, '2014-01-14 12:17:57', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Rusia', 'Rus', 'Grupo H', '', 'https://www.adyouwish.com/fantasy/uploads/files/24_1385512408_Russia.png', 46, 1, '2014-01-14 12:19:56', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Inglaterra', 'Ing', 'Grupo D', '', 'https://www.adyouwish.com/fantasy/uploads/files/25_1385512461_England.png', 47, 1, '2014-01-14 12:21:25', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Holanda', 'Hol', 'Grupo B', '', 'https://www.adyouwish.com/fantasy/uploads/files/26_1385512485_Netherlands.png', 48, 1, '2014-01-14 12:22:14', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Portugal', 'Por', 'Grupo G', '', 'https://www.adyouwish.com/fantasy/uploads/files/27_1385512495_Portugal.png', 49, 1, '2014-01-14 12:22:42', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Algeria', 'Alg', 'Grupo H', '', 'https://www.adyouwish.com/fantasy/uploads/files/28_1385512527_Algeria.png', 50, 1, '2014-01-14 12:22:52', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Camerún', 'Cam', 'Grupo A', '', 'https://www.adyouwish.com/fantasy/uploads/files/29_1385513135_Cameroon.png', 51, 1, '2014-01-14 12:23:04', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Ecuador', 'Ecu', 'Grupo E', '', 'https://www.adyouwish.com/fantasy/uploads/files/30_1385513279_Ecuador.png', 52, 1, '2014-01-14 12:23:16', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Ghana', 'Gha', 'Grupo G', '', 'https://www.adyouwish.com/fantasy/uploads/files/31_1385513300_Ghana.png', 53, 1, '2014-01-14 12:23:32', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Chile', 'Chi', 'Grupo B', '', 'https://www.adyouwish.com/fantasy/uploads/files/32_1385513358_Chile.png', 54, 1, '2014-01-14 12:23:46', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Costa de Marfil', 'CdM', 'Grupo C', '', 'https://www.adyouwish.com/fantasy/uploads/files/33_1385513370_Cote-dIvoire.png', 55, 1, '2014-01-14 12:24:00', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Nigeria', 'Nig', 'Grupo F', '', 'https://www.adyouwish.com/fantasy/uploads/files/34_1385513414_Nigeria.png', 56, 1, '2014-01-14 12:24:24', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Australia', 'Aus', 'Grupo B', '', 'https://www.adyouwish.com/fantasy/uploads/files/35_1385519835_Australia.png', 57, 1, '2014-01-14 12:24:35', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Corea del Sur', 'Cor', 'Grupo H', '', 'https://www.adyouwish.com/fantasy/uploads/files/36_1385521662_South-Korea.png', 58, 1, '2014-01-14 12:24:47', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Costa Rica', 'CRC', 'Grupo D', '', 'https://www.adyouwish.com/fantasy/uploads/files/37_1385522372_Costa-Rica.png', 59, 1, '2014-01-14 12:25:00', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Estados Unidos', 'USA', 'Grupo G', '', 'https://www.adyouwish.com/fantasy/uploads/files/38_1385522394_United-States.png', 60, 1, '2014-01-14 12:25:14', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Honduras', 'Hon', 'Grupo E', '', 'https://www.adyouwish.com/fantasy/uploads/files/39_1385522402_Honduras.png', 61, 1, '2014-01-14 12:25:24', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Irán', 'Ira', 'Grupo F', '', 'https://www.adyouwish.com/fantasy/uploads/files/40_1385522412_Iran.png', 62, 1, '2014-01-14 12:25:36', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Japón', 'Jap', 'Grupo C', '', 'https://www.adyouwish.com/fantasy/uploads/files/41_1385522447_Japan.png', 63, 1, '2014-01-14 12:25:46', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'México', 'Mex', 'Grupo A', '', 'https://www.adyouwish.com/fantasy/uploads/files/42_1385522458_Mexico.png', 64, 1, '2014-01-14 12:25:56', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Alemania', 'Ale', 'Grupo G', '', 'https://www.adyouwish.com/fantasy/uploads/files/43_1387311198_Germany.png', 65, 1, '2014-01-14 12:26:06', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Costa Rica', 'CRC', 'Grupo D', '', 'https://www.adyouwish.com/fantasy/uploads/files/37_1385522372_Costa-Rica.png', 59, 1, '2014-01-14 12:25:00', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams_deleted`
--

DROP TABLE IF EXISTS `teams_deleted`;
CREATE TABLE `teams_deleted` (
  `team_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file_manager_id` int(11) UNSIGNED NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `creator_id` int(11) UNSIGNED NOT NULL,
  `creator_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams_deleted`
--

INSERT INTO `teams_deleted` (`team_id`, `name`, `description`, `file_manager_id`, `active`, `date_created`, `creator_id`, `creator_name`) VALUES
(6, 'qwe', 'qwe', 0, 1, '2013-12-02 11:39:53', 3, ''),
(4, 'Otro equipo', '', 7, 0, '2013-07-30 14:53:56', 3, ''),
(1, 'Mistica Natural', '', 0, 1, '2013-07-30 12:30:01', 3, ''),
(5, 'equipo asd', 'asd', 9, 0, '2013-12-02 11:38:32', 3, ''),
(7, 'desactivado', 'asd', 0, 0, '2013-12-02 11:40:32', 3, ''),
(2, 'Apo Apo', '', 0, 1, '2013-07-30 12:33:16', 3, ''),
(3, 'Adyou Team', '', 0, 1, '2013-07-30 12:33:23', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `testt`
--

DROP TABLE IF EXISTS `testt`;
CREATE TABLE `testt` (
  `bhgh` text NOT NULL,
  `index_id` int(11) UNSIGNED NOT NULL,
  `field_1` varchar(255) NOT NULL,
  `field_2` varchar(10) NOT NULL,
  `field_3` text NOT NULL,
  `field_4` varchar(255) NOT NULL,
  `field_5` text NOT NULL,
  `tttt` text CHARACTER SET utf8mb4 NOT NULL,
  `rere` text NOT NULL,
  `field_6` float(9,2) NOT NULL,
  `field_7` enum('homa','dsd','fff') NOT NULL,
  `field_8` datetime NOT NULL,
  `trt` text NOT NULL,
  `ytyty` text NOT NULL,
  `ytytt` text NOT NULL,
  `field_9` enum('hola','hola2') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

DROP TABLE IF EXISTS `tournaments`;
CREATE TABLE `tournaments` (
  `tournament_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file_manager_id` int(11) UNSIGNED NOT NULL,
  `active` smallint(1) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `creator_id` int(11) UNSIGNED NOT NULL,
  `creator_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`tournament_id`, `name`, `description`, `file_manager_id`, `active`, `date_created`, `creator_id`, `creator_name`) VALUES
(1, 'Mundial 2014', 'FIFA World Cup 2014', 66, 1, '2014-01-14 12:26:42', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `tournaments_teams`
--

DROP TABLE IF EXISTS `tournaments_teams`;
CREATE TABLE `tournaments_teams` (
  `tournament_id` int(11) UNSIGNED NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wall`
--

DROP TABLE IF EXISTS `wall`;
CREATE TABLE `wall` (
  `comment_id` int(11) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `company_id` int(11) UNSIGNED NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wall`
--

INSERT INTO `wall` (`comment_id`, `comment`, `user_id`, `username`, `date_created`, `company_id`, `active`) VALUES
(1, '<h1>Premios del la fecha 1</h1>\r\n\r\n<div class=\"col-md-4 col-sm-6\">\r\n<div class=\"badge-comment\">\r\n<h2>El Mejor de la fecha</h2>\r\n<img src=\"http://www.adyouwish.com/fantasy/assets_fe/img/badges/200x200/mejor.png\">\r\n<div class=\"username\">Emiliano Zolá</div>\r\n</div>\r\n</div>\r\n<div class=\"col-md-4 col-sm-6\">\r\n<div class=\"badge-comment\">\r\n<h2>El peor de la fecha</h2>\r\n<img src=\"http://www.adyouwish.com/fantasy/assets_fe/img/badges/200x200/peor.png\">\r\n<div class=\"username\">Maxi Gonzalez</div>\r\n</div>\r\n</div>\r\n<div class=\"col-md-4 col-sm-6\">\r\n<div class=\"badge-comment\">\r\n<h2>El antifútbol</h2>\r\n<img src=\"http://www.adyouwish.com/fantasy/assets_fe/img/badges/200x200/antifutbol.png\">\r\n<div class=\"username\">Jorge Vargas</div>\r\n</div>\r\n</div>', 0, '', '2014-04-01 13:00:00', 1, 1),
(2, 'Mejor de la fecha!!! que bien!', 2, 'Emiliano Zolá', '2014-04-01 16:56:38', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bitauth_assoc`
--
ALTER TABLE `bitauth_assoc`
  ADD PRIMARY KEY (`assoc_id`),
  ADD KEY `user_id` (`user_id`,`group_id`);

--
-- Indexes for table `bitauth_groups`
--
ALTER TABLE `bitauth_groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `bitauth_logins`
--
ALTER TABLE `bitauth_logins`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `bitauth_userdata`
--
ALTER TABLE `bitauth_userdata`
  ADD PRIMARY KEY (`userdata_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `bitauth_users`
--
ALTER TABLE `bitauth_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `country` (`country`),
  ADD KEY `province_id` (`province_id`),
  ADD KEY `site` (`site`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `companies_deleted`
--
ALTER TABLE `companies_deleted`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`configuration_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `fb_uid` (`fb_uid`),
  ADD KEY `province_id` (`province_id`),
  ADD KEY `new_like` (`new_like`),
  ADD KEY `friends_invited` (`friends_invited`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `file_managers`
--
ALTER TABLE `file_managers`
  ADD PRIMARY KEY (`file_manager_id`);

--
-- Indexes for table `file_managers_files`
--
ALTER TABLE `file_managers_files`
  ADD PRIMARY KEY (`file_manager_id`,`file_id`);

--
-- Indexes for table `friends_leagues`
--
ALTER TABLE `friends_leagues`
  ADD PRIMARY KEY (`league_id`),
  ADD KEY `company` (`company_id`);

--
-- Indexes for table `friends_leagues_users`
--
ALTER TABLE `friends_leagues_users`
  ADD KEY `league_id` (`league_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD KEY `ip_address` (`ip_address`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `page` (`page`),
  ADD KEY `extra_index_id` (`extra_index_id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`match_id`);

--
-- Indexes for table `matches_bk`
--
ALTER TABLE `matches_bk`
  ADD PRIMARY KEY (`match_id`);

--
-- Indexes for table `participations`
--
ALTER TABLE `participations`
  ADD PRIMARY KEY (`participation_id`),
  ADD KEY `contact_id` (`contact_id`),
  ADD KEY `fb_invite_id` (`fb_request_app_id`);

--
-- Indexes for table `participations_fb_app_requests`
--
ALTER TABLE `participations_fb_app_requests`
  ADD KEY `fb_request_app_id` (`fb_request_app_id`),
  ADD KEY `fb_uid` (`fb_uid`);

--
-- Indexes for table `participations_partners`
--
ALTER TABLE `participations_partners`
  ADD KEY `participation_id` (`participation_id`),
  ADD KEY `fb_uid` (`fb_uid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `products_deleted`
--
ALTER TABLE `products_deleted`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `show_in_home` (`show_in_home`);

--
-- Indexes for table `prognostics`
--
ALTER TABLE `prognostics`
  ADD UNIQUE KEY `prognostic_id` (`prognostic_id`),
  ADD UNIQUE KEY `match_id` (`match_id`,`user_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `teams_deleted`
--
ALTER TABLE `teams_deleted`
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `testt`
--
ALTER TABLE `testt`
  ADD PRIMARY KEY (`index_id`),
  ADD KEY `field_2` (`field_2`),
  ADD KEY `field_6` (`field_6`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`tournament_id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `tournaments_teams`
--
ALTER TABLE `tournaments_teams`
  ADD PRIMARY KEY (`tournament_id`);

--
-- Indexes for table `wall`
--
ALTER TABLE `wall`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `company_id` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bitauth_assoc`
--
ALTER TABLE `bitauth_assoc`
  MODIFY `assoc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT for table `bitauth_groups`
--
ALTER TABLE `bitauth_groups`
  MODIFY `group_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bitauth_logins`
--
ALTER TABLE `bitauth_logins`
  MODIFY `login_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `bitauth_userdata`
--
ALTER TABLE `bitauth_userdata`
  MODIFY `userdata_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bitauth_users`
--
ALTER TABLE `bitauth_users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `companies_deleted`
--
ALTER TABLE `companies_deleted`
  MODIFY `company_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `configuration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `file_managers`
--
ALTER TABLE `file_managers`
  MODIFY `file_manager_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `friends_leagues`
--
ALTER TABLE `friends_leagues`
  MODIFY `league_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `match_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `matches_bk`
--
ALTER TABLE `matches_bk`
  MODIFY `match_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `participations`
--
ALTER TABLE `participations`
  MODIFY `participation_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products_deleted`
--
ALTER TABLE `products_deleted`
  MODIFY `product_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prognostics`
--
ALTER TABLE `prognostics`
  MODIFY `prognostic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `province_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `teams_deleted`
--
ALTER TABLE `teams_deleted`
  MODIFY `team_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `testt`
--
ALTER TABLE `testt`
  MODIFY `index_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `tournament_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tournaments_teams`
--
ALTER TABLE `tournaments_teams`
  MODIFY `tournament_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wall`
--
ALTER TABLE `wall`
  MODIFY `comment_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;