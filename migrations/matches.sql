
CREATE TABLE `matches` (
  `match_id` int(11) unsigned NOT NULL,
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
  `file_manager_id` int(11) unsigned NOT NULL,
  `active` smallint(1) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `tournament_date` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `matches`
--

TRUNCATE TABLE `matches`;
--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`match_id`, `phase`, `penalties`, `bet`, `tournament_id`, `tournament`, `zone`, `phase_order`, `team1_id`, `team1_name`, `team1_abbr_name`, `team1_flag`, `team1_goals`, `team2_id`, `team2_name`, `team2_abbr_name`, `team2_flag`, `team2_goals`, `result`, `location`, `date_played`, `file_manager_id`, `active`, `date_created`, `tournament_date`) VALUES
(1, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo A', 0, 2, 'Rusia\r\n', '', '', 0, 3, 'A. Saudita', '', '', 0, -2, 'Estadio Olímpico Luzhnikí, Moscú', '2018-06-14 12:00:00', 0, 1, '2018-04-06 14:28:00', '0000-00-00 00:00:00'),
(2, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo A', 0, 4, 'Egipto\r\n', '', '', 0, 5, 'Uruguay\r\n', '', '', 0, -2, 'Ekaterimburgo Arena, Ekaterimburgo', '2018-06-15 09:00:00', 0, 1, '2018-04-06 14:34:37', '0000-00-00 00:00:00'),
(3, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo A', 0, 2, 'Rusia\r\n', '', '', 0, 4, 'Egipto\r\n', '', '', 0, -2, 'Zenit Arena, San Petersburgo', '2018-06-19 15:00:00', 0, 1, '2018-04-06 14:37:48', '0000-00-00 00:00:00'),
(4, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo A', 0, 5, 'Uruguay\r\n', '', '', 0, 3, 'A. Saudita', '', '', 0, -2, 'Rostov Arena, Rostov del Don', '2018-06-20 12:00:00', 0, 1, '2018-04-06 15:06:14', '0000-00-00 00:00:00'),
(5, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo A', 0, 5, 'Uruguay\r\n', '', '', 0, 2, 'Rusia\r\n', '', '', 0, -2, 'Samara Arena, Samara', '2018-06-25 11:00:00', 0, 1, '2018-04-06 15:10:04', '0000-00-00 00:00:00'),
(6, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo A', 0, 3, 'A. Saudita', '', '', 0, 4, 'Egipto\r\n', '', '', 0, -2, 'Volgogrado Arena, Volgogrado', '2018-06-25 11:00:00', 0, 1, '2018-04-06 15:19:29', '0000-00-00 00:00:00'),
(7, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo B', 0, 8, 'Marruecos\r\n', '', '', 0, 9, 'Irán\r\n', '', '', 0, -2, 'Zenit Arena, San Petersburgo', '2018-06-15 12:00:00', 0, 1, '2018-04-06 15:20:13', '0000-00-00 00:00:00'),
(8, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo B', 0, 6, 'Portugal\r\n', '', '', 0, 7, 'España\r\n', '', '', 0, -2, 'Estadio Fisht, Sochi', '2018-06-15 15:00:00', 0, 1, '2018-04-06 15:20:48', '0000-00-00 00:00:00'),
(9, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo B', 0, 6, 'Portugal\r\n', '', '', 0, 8, 'Marruecos\r\n', '', '', 0, -2, 'Estadio Olímpico Luzhnikí, Moscú', '2018-06-20 09:00:00', 0, 1, '2018-04-06 15:43:23', '0000-00-00 00:00:00'),
(10, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo B', 0, 9, 'Irán\r\n', '', '', 0, 7, 'España\r\n', '', '', 0, -2, 'Kazán Arena, Kazán', '2018-06-20 15:00:00', 0, 1, '2018-04-06 15:44:09', '0000-00-00 00:00:00'),
(11, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo B', 0, 9, 'Irán\r\n', '', '', 0, 6, 'Portugal\r\n', '', '', 0, -2, 'Mordovia Arena, Saransk', '2018-06-25 15:00:00', 0, 1, '2018-04-06 15:45:32', '0000-00-00 00:00:00'),
(12, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo B', 0, 7, 'España\r\n', '', '', 0, 8, 'Marruecos\r\n', '', '', 0, -2, 'Arena Baltika, Kaliningrado', '2018-06-25 15:00:00', 0, 1, '2018-04-06 15:46:13', '0000-00-00 00:00:00'),
(13, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo C', 0, 10, 'Francia\r\n', '', '', 0, 11, 'Australia\r\n', '', '', 0, -2, 'Kazán Arena, Kazán', '2018-06-16 07:00:00', 0, 1, '2018-04-06 15:46:49', '0000-00-00 00:00:00'),
(14, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo C', 0, 12, 'Perú\r\n', '', '', 0, 13, 'Dinamarca\r\n', '', '', 0, -2, 'Mordovia Arena, Saransk', '2018-06-16 13:00:00', 0, 1, '2018-04-06 15:47:11', '0000-00-00 00:00:00'),
(15, 'zone', '', '3/3|2|3/3', 1, 'Mundial 2014', 'Grupo C', 0, 10, 'Francia\r\n', '', '', 0, 12, 'Perú\r\n', '', '', 0, -2, 'Ekaterimburgo Arena, Ekaterimburgo', '2018-06-21 09:00:00', 0, 1, '2018-04-06 15:47:44', '0000-00-00 00:00:00'),
(16, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo C', 0, 13, 'Dinamarca\r\n', '', '', 0, 11, 'Australia\r\n', '', '', 0, -2, 'Samara Arena, Samara', '2018-06-21 12:00:00', 0, 1, '2018-04-06 15:48:02', '0000-00-00 00:00:00'),
(17, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo C', 0, 13, 'Dinamarca\r\n', '', '', 0, 10, 'Francia\r\n', '', '', 0, -2, 'Estadio Olímpico Luzhnikí, Moscú', '2018-06-26 11:00:00', 0, 1, '2018-04-06 15:48:24', '0000-00-00 00:00:00'),
(18, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo C', 0, 11, 'Australia\r\n', '', '', 0, 12, 'Perú\r\n', '', '', 0, -2, 'Estadio Fisht, Sochi', '2018-06-26 11:00:00', 0, 1, '2018-04-06 15:48:40', '0000-00-00 00:00:00'),
(19, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo D', 0, 14, 'Argentina\r\n', '', '', 0, 15, 'Islandia\r\n', '', '', 0, -2, 'Otkrytie Arena, Moscú', '2018-06-16 10:00:00', 0, 1, '2018-04-06 15:49:40', '0000-00-00 00:00:00'),
(20, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo D', 0, 16, 'Croacia\r\n', '', '', 0, 17, 'Nigeria\r\n', '', '', 0, -2, 'Arena Baltika, Kaliningrado', '2018-06-16 16:00:00', 0, 1, '2018-04-06 15:50:04', '0000-00-00 00:00:00'),
(21, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo D', 0, 14, 'Argentina\r\n', '', '', 0, 16, 'Croacia\r\n', '', '', 0, -2, 'Estadio de Nizhni Nóvgorod, Nizhni Nóvgorod', '2018-06-21 15:00:00', 0, 1, '2018-04-06 15:50:16', '0000-00-00 00:00:00'),
(22, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo D', 0, 17, 'Nigeria\r\n', '', '', 0, 15, 'Islandia\r\n', '', '', 0, -2, 'Volgogrado Arena, Volgogrado', '2018-06-22 12:00:00', 0, 1, '2018-04-06 15:50:36', '0000-00-00 00:00:00'),
(23, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo D', 0, 17, 'Nigeria\r\n', '', '', 0, 14, 'Argentina\r\n', '', '', 0, -2, 'Zenit Arena, San Petersburgo', '2018-06-25 15:00:00', 0, 1, '2018-04-06 15:50:53', '0000-00-00 00:00:00'),
(24, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo D', 0, 15, 'Islandia\r\n', '', '', 0, 16, 'Croacia\r\n', '', '', 0, -2, 'Rostov Arena, Rostov del Don', '2018-06-25 15:00:00', 0, 1, '2018-04-06 15:51:07', '0000-00-00 00:00:00'),
(25, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo E', 0, 20, 'Costa Rica', '', '', 0, 21, 'Serbia\r\n', '', '', 0, -2, 'Samara Arena, Samara', '2018-06-17 09:00:00', 0, 1, '2018-04-06 15:53:08', '0000-00-00 00:00:00'),
(26, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo E', 0, 18, 'Brasil\r\n', '', '', 0, 19, 'Suiza\r\n', '', '', 0, -2, 'Rostov Arena, Rostov del Don', '2018-06-17 15:00:00', 0, 1, '2018-04-06 15:53:31', '0000-00-00 00:00:00'),
(27, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo E', 0, 18, 'Brasil\r\n', '', '', 0, 20, 'Costa Rica', '', '', 0, -2, 'Zenit Arena, San Petersburgo', '2018-06-22 09:00:00', 0, 1, '2018-04-06 15:53:50', '0000-00-00 00:00:00'),
(28, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo E', 0, 21, 'Serbia\r\n', '', '', 0, 19, 'Suiza\r\n', '', '', 0, -2, 'Arena Baltika, Kaliningrado', '2018-06-22 15:00:00', 0, 1, '2018-04-06 15:54:11', '0000-00-00 00:00:00'),
(29, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo E', 0, 21, 'Serbia\r\n', '', '', 0, 18, 'Brasil\r\n', '', '', 0, -2, 'Otkrytie Arena, Moscú', '2018-06-27 15:00:00', 0, 1, '2018-04-06 15:54:35', '0000-00-00 00:00:00'),
(30, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo E', 0, 19, 'Suiza\r\n', '', '', 0, 20, 'Costa Rica', '', '', 0, -2, 'Estadio de Nizhni Nóvgorod, Nizhni Nóvgorod', '2018-06-27 15:00:00', 0, 1, '2018-04-06 15:56:00', '0000-00-00 00:00:00'),
(31, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo F', 0, 22, 'Alemania\r\n', '', '', 0, 23, 'México\r\n', '', '', 0, -2, 'Estadio Olímpico Luzhnikí, Moscú', '2018-06-17 12:00:00', 0, 1, '2018-04-06 15:56:52', '0000-00-00 00:00:00'),
(32, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo F', 0, 24, 'Suecia\r\n', '', '', 0, 25, 'R. de Corea', '', '', 0, -2, 'Estadio de Nizhni Nóvgorod, Nizhni Nóvgorod', '2018-06-18 09:00:00', 0, 1, '2018-04-06 15:57:22', '0000-00-00 00:00:00'),
(33, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo F', 0, 22, 'Alemania\r\n', '', '', 0, 24, 'Suecia\r\n', '', '', 0, -2, 'Estadio Fisht, Sochi', '2018-06-23 12:00:00', 0, 1, '2018-04-06 15:57:46', '0000-00-00 00:00:00'),
(34, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo F', 0, 25, 'R. de Corea', '', '', 0, 23, 'México\r\n', '', '', 0, -2, 'Rostov Arena, Rostov del Don', '2018-06-23 15:00:00', 0, 1, '2018-04-06 15:58:26', '0000-00-00 00:00:00'),
(35, 'zone', '', '3/3|2|3/3', 1, 'Mundial 2014', 'Grupo F', 0, 25, 'R. de Corea', '', '', 0, 22, 'Alemania\r\n', '', '', 0, -2, 'Kazán Arena, Kazán', '2018-06-27 11:00:00', 0, 1, '2018-04-06 15:58:42', '0000-00-00 00:00:00'),
(36, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo F', 0, 23, 'México\r\n', '', '', 0, 24, 'Suecia\r\n', '', '', 0, -2, 'Ekaterimburgo Arena, Ekaterimburgo', '2018-06-27 11:00:00', 0, 1, '2018-04-06 15:59:08', '0000-00-00 00:00:00'),
(37, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo G', 0, 26, 'Bélgica\r\n', '', '', 0, 27, 'Panamá\r\n', '', '', 0, -2, 'Estadio Fisht, Sochi', '2018-06-18 12:00:00', 0, 1, '2018-04-06 17:21:35', '0000-00-00 00:00:00'),
(38, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo G', 0, 28, 'Túnez\r\n', '', '', 0, 29, 'Inglaterra\r\n', '', '', 0, -2, 'Volgogrado Arena, Volgogrado', '2018-06-18 15:00:00', 0, 1, '2018-04-06 17:22:35', '0000-00-00 00:00:00'),
(39, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo G', 0, 26, 'Bélgica\r\n', '', '', 0, 28, 'Túnez\r\n', '', '', 0, -2, 'Otkrytie Arena, Moscú', '2018-06-23 09:00:00', 0, 1, '2018-04-06 17:26:57', '0000-00-00 00:00:00'),
(40, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo G', 0, 29, 'Inglaterra\r\n', '', '', 0, 27, 'Panamá\r\n', '', '', 0, -2, 'Estadio de Nizhni Nóvgorod, Nizhni Nóvgorod', '2018-06-24 09:00:00', 0, 1, '2018-04-06 17:27:09', '0000-00-00 00:00:00'),
(41, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo G', 0, 29, 'Inglaterra\r\n', '', '', 0, 26, 'Bélgica\r\n', '', '', 0, -2, 'Arena Baltika, Kaliningrado', '2018-06-28 15:00:00', 0, 1, '2018-04-06 17:30:58', '0000-00-00 00:00:00'),
(42, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo G', 0, 27, 'Panamá\r\n', '', '', 0, 28, 'Túnez\r\n', '', '', 0, -2, 'Mordovia Arena, Saransk', '2018-06-28 15:00:00', 0, 1, '2018-04-06 17:37:26', '0000-00-00 00:00:00'),
(43, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo H', 0, 30, 'Polonia\r\n', '', '', 0, 31, 'Senegal\r\n', '', '', 0, -2, 'Otkrytie Arena, Moscú', '2018-06-19 09:00:00', 0, 1, '2018-04-06 17:37:46', '0000-00-00 00:00:00'),
(44, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo H', 0, 32, 'Colombia\r\n', '', '', 0, 33, 'Japón\r\n', '', '', 0, -2, 'Mordovia Arena, Saransk', '2018-06-19 12:00:00', 0, 1, '2018-04-06 17:37:56', '0000-00-00 00:00:00'),
(45, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo H', 0, 30, 'Polonia\r\n', '', '', 0, 32, 'Colombia\r\n', '', '', 0, -2, 'Kazán Arena, Kazán', '2018-06-24 12:00:00', 0, 1, '2018-04-06 17:38:09', '0000-00-00 00:00:00'),
(46, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo H', 0, 33, 'Japón\r\n', '', '', 0, 31, 'Senegal\r\n', '', '', 0, -2, 'Ekaterimburgo Arena, Ekaterimburgo', '2018-06-24 15:00:00', 0, 1, '2018-04-06 17:38:42', '0000-00-00 00:00:00'),
(47, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo H', 0, 33, 'Japón\r\n', '', '', 0, 30, 'Polonia\r\n', '', '', 0, -2, 'Volgogrado Arena, Volgogrado', '2018-06-28 11:00:00', 0, 1, '2018-04-06 17:39:07', '0000-00-00 00:00:00'),
(48, 'zone', '', '3/3|2|3/3', 2, 'Mundial 2018', 'Grupo H', 0, 31, 'Senegal\r\n', '', '', 0, 32, 'Colombia\r\n', '', '', 0, -2, 'Samara Arena, Samara', '2018-04-28 11:00:00', 0, 1, '2018-04-06 17:39:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `matches_bk`
--

CREATE TABLE `matches_bk` (
  `match_id` int(11) unsigned NOT NULL,
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
  `file_manager_id` int(11) unsigned NOT NULL,
  `active` smallint(1) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `tournament_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `matches_bk`
--

TRUNCATE TABLE `matches_bk`;
--
-- Dumping data for table `matches_bk`
--

INSERT INTO `matches_bk` (`match_id`, `phase`, `penalties`, `bet`, `tournament_id`, `tournament`, `zone`, `phase_order`, `team1_id`, `team1_name`, `team1_abbr_name`, `team1_flag`, `team1_goals`, `team2_id`, `team2_name`, `team2_abbr_name`, `team2_flag`, `team2_goals`, `result`, `location`, `date_played`, `file_manager_id`, `active`, `date_created`, `tournament_date`) VALUES
(1, 'zone', '', '1/3|9/2|11', 1, 'Mundial 2014', 'Grupo A', 0, 13, 'Brazil', 'Bra', 'http://local.prode2018.com/uploads/files/17_1385512279_Brazil.png', 0, 15, 'Croacia', 'Cro', 'http://local.prode2018.com/uploads/files/19_1385512324_Croatia.png', 0, -2, 'São Paulo', '2014-06-12 17:00:00', 0, 1, '2014-01-14 15:08:58', NULL),
(2, 'zone', '', '9.19|10.33|5.33', 1, 'Mundial 2014', 'Grupo A', 0, 38, 'México', 'Mex', 'http://local.prode2018.com/uploads/files/42_1385522458_Mexico.png', 0, 25, 'Camerún', 'Cam', 'http://local.prode2018.com/uploads/files/29_1385513135_Cameroon.png', 1, -2, 'Natal', '2014-06-13 13:00:00', 0, 1, '2014-01-14 15:10:36', NULL),
(3, 'zone', '', '3.55|4.5|6.32', 1, 'Mundial 2014', 'Grupo A', 0, 13, 'Brazil', 'Bra', 'http://local.prode2018.com/uploads/files/17_1385512279_Brazil.png', 0, 38, 'México', 'Mex', 'http://local.prode2018.com/uploads/files/42_1385522458_Mexico.png', 0, -2, 'Fortaleza', '2014-06-17 16:00:00', 0, 1, '2014-01-14 15:12:32', NULL),
(4, 'zone', '', '3.3|4.3|1.3', 1, 'Mundial 2014', 'Grupo A', 0, 25, 'Camerún', 'Cam', 'http://local.prode2018.com/uploads/files/29_1385513135_Cameroon.png', 0, 15, 'Croacia', 'Cro', 'http://local.prode2018.com/uploads/files/19_1385512324_Croatia.png', 0, -2, 'Manaos', '2014-06-18 18:00:00', 0, 1, '2014-01-14 15:13:20', NULL),
(5, 'zone', '', '2.44|4.12|1.10', 1, 'Mundial 2014', 'Grupo A', 0, 25, 'Camerún', 'Cam', 'http://local.prode2018.com/uploads/files/29_1385513135_Cameroon.png', 0, 13, 'Brazil', 'Bra', 'http://local.prode2018.com/uploads/files/17_1385512279_Brazil.png', 0, -2, 'Brasilia', '2014-06-23 17:00:00', 0, 1, '2014-01-14 15:13:53', NULL),
(6, 'zone', '', '', 1, 'Mundial 2014', 'Grupo A', 0, 15, 'Croacia', 'Cro', 'http://local.prode2018.com/uploads/files/19_1385512324_Croatia.png', 0, 38, 'México', 'Mex', 'http://local.prode2018.com/uploads/files/42_1385522458_Mexico.png', 0, -2, 'Recife', '2014-06-23 17:00:00', 0, 1, '2014-01-14 15:17:05', NULL),
(7, 'zone', '', '', 1, 'Mundial 2014', 'Grupo B', 0, 11, 'España', 'Esp', 'http://local.prode2018.com/uploads/files/15_1385512225_Spain.png', 0, 22, 'Holanda', 'Hol', 'http://local.prode2018.com/uploads/files/26_1385512485_Netherlands.png', 0, -2, 'Salvador', '2014-06-13 16:00:00', 0, 1, '2014-01-14 15:18:27', NULL),
(8, 'zone', '', '', 1, 'Mundial 2014', 'Grupo B', 0, 28, 'Chile', 'Chi', 'http://local.prode2018.com/uploads/files/32_1385513358_Chile.png', 0, 31, 'Australia', 'Aus', 'http://local.prode2018.com/uploads/files/35_1385519835_Australia.png', 0, -2, 'Cuiabá', '2014-06-13 18:00:00', 0, 1, '2014-01-14 15:19:13', NULL),
(9, 'zone', '', '', 1, 'Mundial 2014', 'Grupo B', 0, 11, 'España', 'Esp', 'http://local.prode2018.com/uploads/files/15_1385512225_Spain.png', 0, 28, 'Chile', 'Chi', 'http://local.prode2018.com/uploads/files/32_1385513358_Chile.png', 0, -2, 'Río de Janeiro', '2014-06-18 16:00:00', 0, 1, '2014-01-14 15:19:45', NULL),
(10, 'zone', '', '', 1, 'Mundial 2014', 'Grupo B', 0, 31, 'Australia', 'Aus', 'http://local.prode2018.com/uploads/files/35_1385519835_Australia.png', 0, 22, 'Holanda', 'Hol', 'http://local.prode2018.com/uploads/files/26_1385512485_Netherlands.png', 0, -2, 'Porto Alegre', '2014-06-18 13:00:00', 0, 1, '2014-01-14 15:20:18', NULL),
(11, 'zone', '', '', 1, 'Mundial 2014', 'Grupo B', 0, 31, 'Australia', 'Aus', 'http://local.prode2018.com/uploads/files/35_1385519835_Australia.png', 0, 11, 'España', 'Esp', 'http://local.prode2018.com/uploads/files/15_1385512225_Spain.png', 0, -2, 'Curitiba', '2014-06-23 13:00:00', 0, 1, '2014-01-14 15:20:45', NULL),
(12, 'zone', '', '', 1, 'Mundial 2014', 'Grupo B', 0, 22, 'Holanda', 'Hol', 'http://local.prode2018.com/uploads/files/26_1385512485_Netherlands.png', 0, 28, 'Chile', 'Chi', 'http://local.prode2018.com/uploads/files/32_1385513358_Chile.png', 0, -2, 'São Paulo', '2014-06-23 13:00:00', 0, 1, '2014-01-14 15:21:56', NULL),
(13, 'zone', '', '', 1, 'Mundial 2014', 'Grupo C', 0, 10, 'Colombia', 'Col', 'http://local.prode2018.com/uploads/files/14_1385512211_Colombia.png', 0, 16, 'Grecia', 'Gre', 'http://local.prode2018.com/uploads/files/20_1385512343_Greece.png', 0, -2, 'Belo Horizonte', '2014-06-14 13:00:00', 0, 1, '2014-01-14 15:22:29', NULL),
(14, 'zone', '', '', 1, 'Mundial 2014', 'Grupo C', 0, 29, 'Costa de Marfil', 'CdM', 'http://local.prode2018.com/uploads/files/33_1385513370_Cote-dIvoire.png', 0, 37, 'Japón', 'Jap', 'http://local.prode2018.com/uploads/files/41_1385522447_Japan.png', 0, -2, 'Recife', '2014-06-14 22:00:00', 0, 1, '2014-01-14 15:23:03', NULL),
(15, 'zone', '', '', 1, 'Mundial 2014', 'Grupo C', 0, 10, 'Colombia', 'Col', 'http://local.prode2018.com/uploads/files/14_1385512211_Colombia.png', 0, 29, 'Costa de Marfil', 'CdM', 'http://local.prode2018.com/uploads/files/33_1385513370_Cote-dIvoire.png', 0, -2, 'Brasilia', '2014-06-19 13:00:00', 0, 1, '2014-01-14 15:23:36', NULL),
(16, 'zone', '', '', 1, 'Mundial 2014', 'Grupo C', 0, 37, 'Japón', 'Jap', 'http://local.prode2018.com/uploads/files/41_1385522447_Japan.png', 0, 16, 'Grecia', 'Gre', 'http://local.prode2018.com/uploads/files/20_1385512343_Greece.png', 0, -2, 'Natal', '2014-06-19 19:00:00', 0, 1, '2014-01-14 15:24:09', NULL),
(17, 'zone', '', '', 1, 'Mundial 2014', 'Grupo C', 0, 37, 'Japón', 'Jap', 'http://local.prode2018.com/uploads/files/41_1385522447_Japan.png', 0, 10, 'Colombia', 'Col', 'http://local.prode2018.com/uploads/files/14_1385512211_Colombia.png', 0, -2, 'Cuiabá', '2014-06-24 16:00:00', 0, 1, '2014-01-14 15:24:58', NULL),
(18, 'zone', '', '', 1, 'Mundial 2014', 'Grupo C', 0, 16, 'Grecia', 'Gre', 'http://local.prode2018.com/uploads/files/20_1385512343_Greece.png', 0, 29, 'Costa de Marfil', 'CdM', 'http://local.prode2018.com/uploads/files/33_1385513370_Cote-dIvoire.png', 0, -2, 'Fortaleza', '2014-06-24 17:00:00', 0, 1, '2014-01-14 15:25:29', NULL),
(19, 'zone', '', '', 1, 'Mundial 2014', 'Grupo D', 0, 17, 'Uruguay', 'Uru', 'http://local.prode2018.com/uploads/files/21_1385512361_Uruguay.png', 0, 33, 'Costa Rica', 'CRC', 'http://local.prode2018.com/uploads/files/37_1385522372_Costa-Rica.png', 0, -2, 'Fortaleza', '2014-06-14 16:00:00', 0, 1, '2014-01-14 15:26:23', NULL),
(20, 'zone', '', '', 1, 'Mundial 2014', 'Grupo D', 0, 21, 'Inglaterra', 'Ing', 'http://local.prode2018.com/uploads/files/25_1385512461_England.png', 0, 18, 'Italia', 'Ita', 'http://local.prode2018.com/uploads/files/22_1385512372_Italy.png', 0, -2, 'Manaos', '2014-06-14 18:00:00', 0, 1, '2014-01-14 15:27:05', NULL),
(21, 'zone', '', '', 1, 'Mundial 2014', 'Grupo D', 0, 17, 'Uruguay', 'Uru', 'http://local.prode2018.com/uploads/files/21_1385512361_Uruguay.png', 0, 21, 'Inglaterra', 'Ing', 'http://local.prode2018.com/uploads/files/25_1385512461_England.png', 0, -2, 'São Paulo', '2014-06-19 16:00:00', 0, 1, '2014-01-14 15:27:42', NULL),
(22, 'zone', '', '', 1, 'Mundial 2014', 'Grupo D', 0, 18, 'Italia', 'Ita', 'http://local.prode2018.com/uploads/files/22_1385512372_Italy.png', 0, 33, 'Costa Rica', 'CRC', 'http://local.prode2018.com/uploads/files/37_1385522372_Costa-Rica.png', 0, -2, 'Recife', '2014-06-20 13:00:00', 0, 1, '2014-01-14 15:28:11', NULL),
(23, 'zone', '', '', 1, 'Mundial 2014', 'Grupo D', 0, 18, 'Italia', 'Ita', 'http://local.prode2018.com/uploads/files/22_1385512372_Italy.png', 0, 17, 'Uruguay', 'Uru', 'http://local.prode2018.com/uploads/files/21_1385512361_Uruguay.png', 0, -2, 'Natal', '2014-06-24 13:00:00', 0, 1, '2014-01-14 15:28:44', NULL),
(24, 'zone', '', '', 1, 'Mundial 2014', 'Grupo D', 0, 33, 'Costa Rica', 'CRC', 'http://local.prode2018.com/uploads/files/37_1385522372_Costa-Rica.png', 0, 21, 'Inglaterra', 'Ing', 'http://local.prode2018.com/uploads/files/25_1385512461_England.png', 0, -2, 'Belo Horizonte', '2014-06-24 13:00:00', 0, 1, '2014-01-14 15:29:13', NULL),
(25, 'zone', '', '', 1, 'Mundial 2014', 'Grupo E', 0, 19, 'Suiza', 'Sui', 'http://local.prode2018.com/uploads/files/23_1385512392_Switzerland.png', 0, 26, 'Ecuador', 'Ecu', 'http://local.prode2018.com/uploads/files/30_1385513279_Ecuador.png', 0, -2, 'Brasilia', '2014-06-15 13:00:00', 0, 1, '2014-01-14 15:30:09', NULL),
(26, 'zone', '', '', 1, 'Mundial 2014', 'Grupo E', 0, 12, 'Francia', 'Fra', 'http://local.prode2018.com/uploads/files/16_1385512241_France.png', 0, 35, 'Honduras', 'Hon', 'http://local.prode2018.com/uploads/files/39_1385522402_Honduras.png', 0, -2, 'Porto Alegre', '2014-06-15 16:00:00', 0, 1, '2014-01-14 15:30:38', NULL),
(27, 'zone', '', '', 1, 'Mundial 2014', 'Grupo E', 0, 19, 'Suiza', 'Sui', 'http://local.prode2018.com/uploads/files/23_1385512392_Switzerland.png', 0, 12, 'Francia', 'Fra', 'http://local.prode2018.com/uploads/files/16_1385512241_France.png', 0, -2, 'Salvador', '2014-06-20 16:00:00', 0, 1, '2014-01-14 15:31:29', NULL),
(28, 'zone', '', '', 1, 'Mundial 2014', 'Grupo E', 0, 35, 'Honduras', 'Hon', 'http://local.prode2018.com/uploads/files/39_1385522402_Honduras.png', 0, 26, 'Ecuador', 'Ecu', 'http://local.prode2018.com/uploads/files/30_1385513279_Ecuador.png', 0, -2, 'Curitiba', '2014-06-20 19:00:00', 0, 1, '2014-01-14 15:31:56', NULL),
(29, 'zone', '', '', 1, 'Mundial 2014', 'Grupo E', 0, 35, 'Honduras', 'Hon', 'http://local.prode2018.com/uploads/files/39_1385522402_Honduras.png', 0, 19, 'Suiza', 'Sui', 'http://local.prode2018.com/uploads/files/23_1385512392_Switzerland.png', 0, -2, 'Manaos', '2014-06-25 16:00:00', 0, 1, '2014-01-14 15:32:24', NULL),
(30, 'zone', '', '', 1, 'Mundial 2014', 'Grupo E', 0, 26, 'Ecuador', 'Ecu', 'http://local.prode2018.com/uploads/files/30_1385513279_Ecuador.png', 0, 12, 'Francia', 'Fra', 'http://local.prode2018.com/uploads/files/16_1385512241_France.png', 0, -2, 'Río de Janeiro', '2014-06-25 17:00:00', 0, 1, '2014-01-14 15:32:54', NULL),
(31, 'zone', '', '', 1, 'Mundial 2014', 'Grupo F', 0, 8, 'Argentina', 'Arg', 'http://local.prode2018.com/uploads/files/12_1385512190_Argentina.png', 0, 14, 'Bosnia', 'Bos', 'http://local.prode2018.com/uploads/files/18_1385512316_Bosnia-and-Herzegovina.png', 0, -2, 'Río de Janeiro', '2014-06-15 19:00:00', 0, 1, '2014-01-14 15:33:43', NULL),
(32, 'zone', '', '', 1, 'Mundial 2014', 'Grupo F', 0, 36, 'Irán', 'Ira', 'http://local.prode2018.com/uploads/files/40_1385522412_Iran.png', 0, 30, 'Nigeria', 'Nig', 'http://local.prode2018.com/uploads/files/34_1385513414_Nigeria.png', 0, -2, 'Curitiba', '2014-06-16 16:00:00', 0, 1, '2014-01-14 15:34:12', NULL),
(34, 'zone', '', '', 1, 'Mundial 2014', 'Grupo F', 0, 8, 'Argentina', 'Arg', 'http://local.prode2018.com/uploads/files/12_1385512190_Argentina.png', 0, 36, 'Irán', 'Ira', 'http://local.prode2018.com/uploads/files/40_1385522412_Iran.png', 0, -2, 'Belo Horizonte', '2014-06-21 13:00:00', 0, 1, '2014-01-14 15:34:40', NULL),
(35, 'zone', '', '', 1, 'Mundial 2014', 'Grupo F', 0, 30, 'Nigeria', 'Nig', 'http://local.prode2018.com/uploads/files/34_1385513414_Nigeria.png', 0, 14, 'Bosnia', 'Bos', 'http://local.prode2018.com/uploads/files/18_1385512316_Bosnia-and-Herzegovina.png', 0, -2, 'Cuiabá', '2014-06-21 18:00:00', 0, 1, '2014-01-14 15:35:17', NULL),
(36, 'zone', '', '', 1, 'Mundial 2014', 'Grupo F', 0, 30, 'Nigeria', 'Nig', 'http://local.prode2018.com/uploads/files/34_1385513414_Nigeria.png', 0, 8, 'Argentina', 'Arg', 'http://local.prode2018.com/uploads/files/12_1385512190_Argentina.png', 0, -2, 'Porto Alegre', '2014-06-25 13:00:00', 0, 1, '2014-01-14 15:35:45', NULL),
(37, 'zone', '', '', 1, 'Mundial 2014', 'Grupo F', 0, 14, 'Bosnia', 'Bos', 'http://local.prode2018.com/uploads/files/18_1385512316_Bosnia-and-Herzegovina.png', 0, 36, 'Irán', 'Ira', 'http://local.prode2018.com/uploads/files/40_1385522412_Iran.png', 0, -2, 'Salvador', '2014-06-25 13:00:00', 0, 1, '2014-01-14 15:36:13', NULL),
(38, 'zone', '', '', 1, 'Mundial 2014', 'Grupo G', 0, 39, 'Alemania', 'Ale', 'http://local.prode2018.com/uploads/files/43_1387311198_Germany.png', 0, 23, 'Portugal', 'Por', 'http://local.prode2018.com/uploads/files/27_1385512495_Portugal.png', 0, -2, 'Salvador', '2014-06-16 13:00:00', 0, 1, '2014-01-14 15:36:39', NULL),
(39, 'zone', '', '', 1, 'Mundial 2014', 'Grupo G', 0, 27, 'Ghana', 'Gha', 'http://local.prode2018.com/uploads/files/31_1385513300_Ghana.png', 0, 34, 'Estados Unidos', 'USA', 'http://local.prode2018.com/uploads/files/38_1385522394_United-States.png', 0, -2, 'Natal', '2014-06-16 19:00:00', 0, 1, '2014-01-14 15:38:02', NULL),
(40, 'zone', '', '', 1, 'Mundial 2014', 'Grupo G', 0, 39, 'Alemania', 'Ale', 'http://local.prode2018.com/uploads/files/43_1387311198_Germany.png', 0, 27, 'Ghana', 'Gha', 'http://local.prode2018.com/uploads/files/31_1385513300_Ghana.png', 0, -2, 'Fortaleza', '2014-06-21 16:00:00', 0, 1, '2014-01-14 15:38:34', NULL),
(41, 'zone', '', '', 1, 'Mundial 2014', 'Grupo G', 0, 34, 'Estados Unidos', 'USA', 'http://local.prode2018.com/uploads/files/38_1385522394_United-States.png', 0, 23, 'Portugal', 'Por', 'http://local.prode2018.com/uploads/files/27_1385512495_Portugal.png', 0, -2, 'Manaos', '2014-06-22 18:00:00', 0, 1, '2014-01-14 15:39:10', NULL),
(42, 'zone', '', '', 1, 'Mundial 2014', 'Grupo G', 0, 34, 'Estados Unidos', 'USA', 'http://local.prode2018.com/uploads/files/38_1385522394_United-States.png', 0, 39, 'Alemania', 'Ale', 'http://local.prode2018.com/uploads/files/43_1387311198_Germany.png', 0, -2, 'Recife', '2014-06-26 13:00:00', 0, 1, '2014-01-14 15:39:39', NULL),
(43, 'zone', '', '', 1, 'Mundial 2014', 'Grupo G', 0, 23, 'Portugal', 'Por', 'http://local.prode2018.com/uploads/files/27_1385512495_Portugal.png', 0, 27, 'Ghana', 'Gha', 'http://local.prode2018.com/uploads/files/31_1385513300_Ghana.png', 0, -2, 'Brasilia', '2014-06-26 13:00:00', 0, 1, '2014-01-14 15:40:03', NULL),
(44, 'zone', '', '', 1, 'Mundial 2014', 'Grupo H', 0, 9, 'Bélgica', 'Bel', 'http://local.prode2018.com/uploads/files/13_1385512198_Belgium.png', 0, 24, 'Algeria', 'Alg', 'http://local.prode2018.com/uploads/files/28_1385512527_Algeria.png', 0, -2, 'Belo Horizonte', '2014-06-17 13:00:00', 0, 1, '2014-01-14 15:40:32', NULL),
(45, 'zone', '', '', 1, 'Mundial 2014', 'Grupo H', 0, 20, 'Rusia', 'Rus', 'http://local.prode2018.com/uploads/files/24_1385512408_Russia.png', 0, 32, 'Corea del Sur', 'Cor', 'http://local.prode2018.com/uploads/files/36_1385521662_South-Korea.png', 0, -2, 'Cuiabá', '2014-06-17 18:00:00', 0, 1, '2014-01-14 15:40:58', NULL),
(46, 'zone', '', '', 1, 'Mundial 2014', 'Grupo H', 0, 9, 'Bélgica', 'Bel', 'http://local.prode2018.com/uploads/files/13_1385512198_Belgium.png', 0, 20, 'Rusia', 'Rus', 'http://local.prode2018.com/uploads/files/24_1385512408_Russia.png', 0, -2, 'Río de Janeiro', '2014-06-22 13:00:00', 0, 1, '2014-01-14 15:41:28', NULL),
(47, 'zone', '', '', 1, 'Mundial 2014', 'Grupo H', 0, 32, 'Corea del Sur', 'Cor', 'http://local.prode2018.com/uploads/files/36_1385521662_South-Korea.png', 0, 24, 'Algeria', 'Alg', 'http://local.prode2018.com/uploads/files/28_1385512527_Algeria.png', 0, -2, 'Porto Alegre', '2014-06-22 16:00:00', 0, 1, '2014-01-14 15:42:00', NULL),
(48, 'zone', '', '', 1, 'Mundial 2014', 'Grupo H', 0, 32, 'Corea del Sur', 'Cor', 'http://local.prode2018.com/uploads/files/36_1385521662_South-Korea.png', 0, 9, 'Bélgica', 'Bel', 'http://local.prode2018.com/uploads/files/13_1385512198_Belgium.png', 0, -2, 'São Paulo', '2014-06-26 17:00:00', 0, 1, '2014-01-14 15:42:27', NULL),
(49, 'zone', '', '', 1, 'Mundial 2014', 'Grupo H', 0, 24, 'Algeria', 'Alg', 'http://local.prode2018.com/uploads/files/28_1385512527_Algeria.png', 0, 20, 'Rusia', 'Rus', 'http://local.prode2018.com/uploads/files/24_1385512408_Russia.png', 0, -2, 'Curitiba', '2014-06-26 17:00:00', 0, 1, '2014-01-14 15:42:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`match_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `match_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
