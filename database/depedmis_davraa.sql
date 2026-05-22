-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2026 at 08:11 AM
-- Server version: 8.4.7
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `depedmis_davraa`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `AddID` int UNSIGNED NOT NULL,
  `Province` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `City` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `Brgy` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int UNSIGNED NOT NULL,
  `full_name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `position_title` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `account_level` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Administrator',
  `contact_number` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_categories`
--

CREATE TABLE `event_categories` (
  `category_id` int UNSIGNED NOT NULL,
  `category_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_categories`
--

INSERT INTO `event_categories` (`category_id`, `category_name`) VALUES
(79, '100m Athletic (15 Below) Boys'),
(77, '100m Athletic (15B / down) Boys'),
(90, '100m Athletic (16 Above) Boys'),
(89, '100m Athletic (16 Above) Girls'),
(2, '100m Backstroke'),
(3, '100m Breaststroke'),
(4, '100m Butterfly'),
(5, '100m Freestyle'),
(312, '1500 Freestyle'),
(311, '1500 Freestyle Boys'),
(313, '200 Backstroke'),
(76, '200 Individual Medley'),
(6, '200 m Individual Medley'),
(78, '200m Athletic (15 Below) Boys'),
(80, '200m Athletic (15 Below) Girls'),
(88, '200m Athletic (16 Above) Boys'),
(87, '200m Athletic (16 Above) Girls'),
(7, '200M Backstroke'),
(8, '200M Breaststroke'),
(9, '200m Butterfly'),
(10, '200m Freestyle'),
(75, '200M Individual Medley'),
(334, '37.1 - 40.0 kg'),
(11, '3x3'),
(12, '3x4'),
(13, '3x5'),
(84, '4 x 100 Relay (15 Below) Boys'),
(83, '4 x 100 Relay (16 Above) Boys'),
(335, '40.1 - 44.0 kg (Girls)'),
(86, '400m Athletic (15 Below) Boys'),
(82, '400m Athletic (15 Below) Girls'),
(81, '400m Athletic (16 Above) Boys'),
(85, '400m Athletic (16 Above) Girls'),
(14, '400M Freestyle'),
(15, '400m Individual Medley'),
(167, '40kg - Girls'),
(323, '40kg Cadets'),
(16, '42-45 kg'),
(315, '42kg Cadets'),
(308, '43.1 - 47.0 kg (Boys)'),
(336, '44.1 - 48.0 kg'),
(168, '44kg - Girls'),
(324, '44kg Cadets'),
(124, '44KG. - 46KG.'),
(17, '45-48kg'),
(316, '46kg Cadets'),
(126, '46KG. - 48KG.'),
(309, '47.1 - 51.0 kg (Boys)'),
(18, '48-52kg'),
(337, '48.1 - 52.0 kg'),
(170, '48kg - Girls'),
(153, '48kg - Male'),
(325, '48kg Cadets'),
(327, '48kg Junior'),
(125, '48KG. - 50KG.'),
(123, '48KG. - 51KG.'),
(20, '4x100m Freestyle Relay'),
(21, '4x100m Medley Relay'),
(22, '4x50m Freestyle Relay'),
(19, '4X50M Medley Relay'),
(157, '50 LC Meter Butterfly(Boys)'),
(226, '50 m Backstroke'),
(120, '50 m Breastroke'),
(227, '50 m Freestyle'),
(317, '50kg Cadets'),
(23, '50m Backstroke'),
(115, '50m BREASTROKE'),
(24, '50m Breaststroke'),
(25, '50m Butterfly'),
(26, '50m Freestyle'),
(310, '51.1 - 55.0 KG'),
(127, '51KG. - 54KG.'),
(27, '52-56kg'),
(338, '52.1 - 56.0 kg'),
(155, '52kg - Male'),
(326, '52kg Cadets'),
(328, '52kg Junior'),
(122, '52KG. - 54KG.'),
(171, '53+kg - Girls'),
(174, '53kg - Girls'),
(318, '54kg Cadets'),
(319, '54kg Junior'),
(349, '55.1 - 60.0 kg'),
(154, '56kg - Male'),
(329, '56kg Junior'),
(320, '58kg Junior'),
(28, '5x5'),
(333, '60.1 -65.0 kg'),
(156, '60kg - Male'),
(330, '60kg Junior'),
(321, '62kg Junior'),
(322, '66kg Junior'),
(29, '8 Balls'),
(350, '800M Freestyle'),
(30, '9 Balls'),
(288, 'A -  Girls 48kg'),
(253, 'Aero Dance'),
(73, 'Aero-Individual'),
(291, 'B -  Boys 45kg'),
(292, 'B -  Boys 48kg'),
(286, 'B -  Girls 42kg'),
(287, 'B -  Girls 45kg'),
(245, 'Balance Beam'),
(222, 'Ball Apparatus'),
(31, 'Bantam Weight'),
(331, 'Best Regu Event'),
(101, 'Bocce (Doubles)'),
(99, 'Bocce (Singles-Boys)'),
(100, 'Bocce (Singles-Girls)'),
(102, 'Bocce (Team)'),
(109, 'boys'),
(294, 'Cat A -  Boys 48kg'),
(293, 'Cat A -  Boys 52kg'),
(295, 'Cat A -  Boys 56kg'),
(289, 'Cat A -  Girls 52kg'),
(290, 'Cat B -  Boys 42kg'),
(32, 'Category 1'),
(33, 'Category 2'),
(34, 'Category 3'),
(35, 'Category A'),
(36, 'Chacha'),
(221, 'Clubs Apparatus'),
(273, 'Cluster 1 - Floor Exercise (Boys)'),
(274, 'Cluster 1 - Floor Exercise (Girls)'),
(219, 'Cluster 1 - Horizontal Bar (Boys)'),
(263, 'Cluster 1 - Individual All Around (Boys)'),
(264, 'Cluster 1 - Individual All Around (Girls)'),
(220, 'Cluster 1 - Mushroom (Boys)'),
(271, 'Cluster 1 - Vault (Boys)'),
(272, 'Cluster 1 - Vault (Girls)'),
(269, 'Cluster 1&2 - Team All Around (Boys)'),
(270, 'Cluster 1&2 - Team All Around (Girls)'),
(267, 'Cluster 2 - Floor Exercise (Boys)'),
(268, 'Cluster 2 - Floor Exercise (Girls)'),
(215, 'Cluster 2 - Horizontal Bar (Boys)'),
(259, 'Cluster 2 - Individual All Around (Boys)'),
(260, 'Cluster 2 - Individual All Around (Girls)'),
(218, 'Cluster 2 - Mushroom (Boys)'),
(265, 'Cluster 2 - Vault (Boys)'),
(266, 'Cluster 2 - Vault (Girls)'),
(262, 'Cluster 3 - Floor Exercise (Boys)'),
(261, 'Cluster 3 - Floor Exercise (Girls)'),
(213, 'Cluster 3 - Horizontal Bar'),
(216, 'Cluster 3 - Horizontal Bar (Boys)'),
(254, 'Cluster 3 - Individual All Around (Boys)'),
(255, 'Cluster 3 - Individual All Around (Girls)'),
(214, 'Cluster 3 - Pommel Horse'),
(217, 'Cluster 3 - Pommel Horse (Boys)'),
(256, 'Cluster 3 - Team All Around (Boys)'),
(257, 'Cluster 3 - Team All Around (Girls)'),
(258, 'Cluster 3 - Vault'),
(72, 'dfsdf'),
(188, 'Doble Baston (Boys)'),
(189, 'Doble Baston (Girls)'),
(186, 'Double Baston (Boys)'),
(185, 'Double Baston (Girls)'),
(314, 'Double Event'),
(238, 'Double Weapon (Boys)'),
(194, 'Double Weapon (Girls and Boys)'),
(235, 'Double Weapon (Girls)'),
(37, 'Doubles'),
(193, 'Espada Y Daga (Boys)'),
(192, 'Espada Y Daga (Girls)'),
(38, 'Extralight Weight'),
(39, 'Feather Weight'),
(244, 'Floor Exercise'),
(40, 'Foxtrot'),
(224, 'Freehand'),
(128, 'GIRLS'),
(1, 'Girls Team'),
(158, 'Goal Ball'),
(159, 'Goal Ball(Boys)'),
(160, 'Goal Ball(Girls)'),
(41, 'Grade A'),
(304, 'Group 3'),
(42, 'Halflight Weight'),
(43, 'Homo-Doubles'),
(223, 'Hoop Apparatus'),
(204, 'I.D. Junior (Boys)'),
(203, 'I.D. Junior (Girls)'),
(176, 'I.D. Junior Boys'),
(178, 'I.D. Junior Girls'),
(201, 'I.D. Youth (Boys)'),
(202, 'I.D. Youth (Girls)'),
(184, 'I.D. Youth Boys'),
(179, 'I.D. Youth Girls'),
(44, 'Individual'),
(225, 'Individual All Around (IAA)'),
(248, 'Individual All Round'),
(45, 'Individual Doble Baston'),
(46, 'Individual Espada y Daga Baston'),
(243, 'Individual Men'),
(340, 'Individual Olympic Round'),
(47, 'Individual Solo Baston'),
(242, 'Individual Women'),
(48, 'Jive'),
(129, 'Junior Boys'),
(362, 'Junior Boys Bantam Weight 52-54kg'),
(347, 'Junior Boys Fly Weight'),
(355, 'Junior Boys Flyweight 48-50kg'),
(348, 'Junior Boys Light Bantam Weight'),
(356, 'Junior Boys Light Bantam Weight 50-52kg'),
(357, 'Junior Boys Light Bantam Weight 52-54kg'),
(346, 'Junior Boys Light Flyweight'),
(354, 'Junior Boys Light Flyweight 46-48kg'),
(345, 'Junior Boys Pin weight'),
(353, 'Junior Boys Pin weight 44-46kg'),
(49, 'Junior Boys, Light Bantam Category'),
(50, 'Junior Boys, Pin Weight Category'),
(130, 'Junior Girls'),
(305, 'Kyurogi Group 1'),
(306, 'Kyurogi Group 2'),
(307, 'Kyurogi Group 3'),
(303, 'Kyurogi Group 3 (Boys)'),
(296, 'Kyurogi Under 42'),
(297, 'Kyurogi Under 44'),
(279, 'Kyurogi Under 45 (Boys)'),
(298, 'Kyurogi Under 46'),
(280, 'Kyurogi Under 48 (Boys)'),
(299, 'Kyurogi Under 49'),
(281, 'Kyurogi Under 51 (Boys)'),
(300, 'Kyurogi Under 52'),
(301, 'Kyurogi Under 55'),
(282, 'Kyurogi Under 55 (Boys)'),
(302, 'Kyurogi Under 59'),
(283, 'Kyurogi Under 59 (Boys)'),
(284, 'Kyurogi Under 63 (Boys)'),
(285, 'Kyurogi Under 68 (Boys)'),
(146, 'Latin American - Grade A'),
(152, 'Latin American - Single Dance (Chachacha)'),
(140, 'Latin American - Single Dance (Jive)'),
(151, 'Latin American - Single Dance (Paso Doble)'),
(150, 'Latin American - Single Dance (Rumba)'),
(149, 'Latin American - Single Dance (Samba)'),
(139, 'Low Vision (Boys)'),
(138, 'Low Vision (Girls)'),
(51, 'Mix'),
(110, 'Mixed Doubles'),
(52, 'Mixed o'),
(251, 'Mixed Pair'),
(339, 'Mixed Team Olympic Round'),
(145, 'Modern Standard - Grade A'),
(147, 'Modern Standard - Single Dance (Foxtrot)'),
(148, 'Modern Standard - Single Dance (Quickstep)'),
(143, 'Modern Standard - Single Dance (Tango)'),
(144, 'Modern Standard - Single Dance (Viennese Waltz)'),
(141, 'Modern Standard - Single Dance (Waltz)'),
(142, 'Modern Standard - Single Dance(Quickstep)'),
(210, 'Ortho (Boys)'),
(209, 'Ortho (Girls)'),
(161, 'Ortho Girls'),
(137, 'Partially Blind (Boys)'),
(136, 'Partially Blind (Girls)'),
(53, 'Pasodoble'),
(54, 'Pin Weight'),
(232, 'Poomsae Individual (Boys)'),
(231, 'Poomsae Individual (Girls)'),
(230, 'Poomsae Mixed Pair'),
(55, 'Quickstep'),
(332, 'Regu'),
(121, 'REGU(TRIO/TEAM) ARTISTIC (SENI)'),
(228, 'Ribbon Apparatus'),
(56, 'Rumba'),
(97, 'Running Long Jump (15 Below) Boys'),
(95, 'Running Long Jump (15 Below) Girls'),
(98, 'Running Long Jump (16 Above) Boys'),
(96, 'Running Long Jump (16 Above) Girls'),
(57, 'Samba'),
(103, 'SAMBA,CHACHA,RUMBA,PASO DODBLE,JIVE,GRADE A'),
(344, 'School Boys Light Flyweight'),
(352, 'School Boys Light Flyweight 46-48kg'),
(343, 'School Boys Pin Weight'),
(351, 'School Boys Pin Weight 44 - 46kg'),
(105, 'SD-Chacha'),
(108, 'SD-Jive'),
(107, 'SD-Paso Dodble'),
(106, 'SD-Rumba'),
(104, 'SD-SAMBA'),
(249, 'Seni (Artistic) Ganda'),
(250, 'Seni (Artistic) Tunggal'),
(93, 'Shot Put (15 Below) Boys'),
(91, 'Shot Put (15 Below) Girls'),
(94, 'Shot Put (16 Above) Boys'),
(92, 'Shot Put (16 Above) Girls'),
(198, 'Shot Put I.D. Junior (Boys)'),
(197, 'Shot Put I.D. Junior (Girls)'),
(199, 'Shot Put I.D. Low Vision (Boys)'),
(200, 'Shot Put I.D. Low Vision (Girls)'),
(195, 'Shot Put I.D. Youth (Boys)'),
(196, 'Shot Put I.D. Youth (Girls)'),
(177, 'Shotput Ortho(Boys)'),
(175, 'Shotput ORTHO(Girls)'),
(181, 'Shotput V.I. Partially Blind(Boys)'),
(180, 'Shotput V.I. Partially Blind(Girls)'),
(182, 'Shotput V.I. Totally Blind(Boys)'),
(183, 'Shotput V.I. Totally Blind(Girls)'),
(58, 'Single A'),
(59, 'Single B'),
(241, 'Single Weapon'),
(236, 'Single Weapon (Boys)'),
(237, 'Single Weapon (Girls)'),
(60, 'Singles'),
(133, 'Singles - Boys'),
(191, 'Solo Baston (Boston)'),
(190, 'Solo Baston (Boys)'),
(187, 'Solo Baston (Girls)'),
(163, 'Swimming - 50 Meter Breaststroke(Boys)'),
(162, 'Swimming - 50 Meter Breaststroke(Girls)'),
(164, 'Swimming ID - 50 Meter Breaststroke(Boys)'),
(165, 'Swimming ID - 50 Meter Breaststroke(Girls)'),
(166, 'Swimming ID - 50 Meter Butterfly (Boys)'),
(169, 'Swimming ID - 50 Meter Butterfly(Girls)'),
(172, 'Swimming ORTHO - 50 Meter Butterfly(Boys)'),
(173, 'Swimming ORTHO - 50 Meter Butterfly(Girls)'),
(233, 'Sword And Dagger (Boys)'),
(234, 'Sword And Dagger (Girls)'),
(239, 'Sword And Dagger Weapon (Boys)'),
(240, 'Sword And Dagger Weapon (Girls)'),
(61, 'Synchronized Doble Baston (Non-Traditional)'),
(62, 'Synchronized Espada y Daga (Non-Traditional)'),
(63, 'Synchronized Solo Baston (Non-Traditional)'),
(64, 'Syncrhonized Doble Baston (Non-Traditional)'),
(65, 'Syncrhonized Espada y Daga (Non-Traditional)'),
(342, 'Tanding (Match) Class A'),
(278, 'Tanding (Match) Class B'),
(277, 'Tanding (Match) Class C'),
(276, 'Tanding (Match) Class D'),
(275, 'Tanding (Match) Class E'),
(363, 'Tanding Match (Class A)'),
(116, 'Tanding Match A'),
(117, 'Tanding Match B'),
(118, 'Tanding Match C'),
(119, 'Tanding Match D'),
(66, 'Tango'),
(67, 'Team'),
(341, 'Team Olympic Round'),
(229, 'Team Regu Event'),
(134, 'Totally Blind (Boys)'),
(135, 'Totally Blind (Girls)'),
(252, 'Trio'),
(74, 'Trio Aero'),
(111, 'U17-Bantam Weight (52-54 KG)'),
(114, 'U17-Light Flyweight (58-50 KG)'),
(113, 'U17-PinWeight (44-46 KG)'),
(112, 'U19-Flyweight (48-51 KG)'),
(68, 'Under 42kg'),
(247, 'Uneven Bars'),
(205, 'V.I. Low Vision (Boys)'),
(206, 'V.I. Low Vision (Girls)'),
(211, 'V.I. Partially Blind (Boys)'),
(212, 'V.I. Partially Blind (Girls)'),
(208, 'V.I. Totally Blind (Boys)'),
(207, 'V.I. Totally Blind (Girls)'),
(246, 'Vault'),
(69, 'Veinnese Waltz'),
(70, 'Waltz'),
(131, 'Youth Boys'),
(360, 'Youth Boys Bantam Weight 51-54kg'),
(361, 'Youth Boys Bantam Weight 52-54kg'),
(359, 'Youth Boys Flyweight 48-51kg'),
(358, 'Youth Boys Minimum Weight 46-48kg'),
(132, 'Youth Girls'),
(71, 'Youth Men, Bantam Weight Category');

-- --------------------------------------------------------

--
-- Table structure for table `event_groups`
--

CREATE TABLE `event_groups` (
  `group_id` tinyint UNSIGNED NOT NULL,
  `group_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_groups`
--

INSERT INTO `event_groups` (`group_id`, `group_name`) VALUES
(4, ''),
(1, 'Elementary'),
(2, 'Secondary'),
(5, 'SNED'),
(3, 'Team');

-- --------------------------------------------------------

--
-- Table structure for table `event_master`
--

CREATE TABLE `event_master` (
  `event_id` int UNSIGNED NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` tinyint UNSIGNED NOT NULL,
  `category_id` int UNSIGNED DEFAULT NULL,
  `event_group_label` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `playing_venue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_master`
--

INSERT INTO `event_master` (`event_id`, `event_name`, `group_id`, `category_id`, `event_group_label`, `playing_venue`, `location`) VALUES
(1, 'Elementary Boys', 1, 1, NULL, NULL, NULL),
(2, 'Athletics - 100 Meter (Boys)', 1, NULL, NULL, NULL, NULL),
(3, 'Athletics - 100 Meter (Boys)', 2, NULL, NULL, NULL, NULL),
(4, 'Athletics - 100 Meter (Girls)', 1, NULL, NULL, NULL, NULL),
(5, 'Athletics - 100 Meter (Girls)', 2, NULL, NULL, NULL, NULL),
(6, 'Athletics - 1500 Meter (Boys)', 1, NULL, NULL, NULL, NULL),
(7, 'Athletics - 1500 Meter (Boys)', 2, NULL, NULL, NULL, NULL),
(8, 'Athletics - 1500 Meter (Girls)', 1, NULL, NULL, NULL, NULL),
(9, 'Athletics - 1500 Meter (Girls)', 2, NULL, NULL, NULL, NULL),
(10, 'Athletics - 2,000 m Walkathon (Girls)', 2, NULL, NULL, NULL, NULL),
(11, 'Athletics - 200 m (Girls)', 1, NULL, NULL, NULL, NULL),
(12, 'Athletics - 200m (Boys)', 1, NULL, NULL, NULL, NULL),
(13, 'Athletics - 200m (Boys)', 2, NULL, NULL, NULL, NULL),
(14, 'Athletics - 200m (Girls)', 2, NULL, NULL, NULL, NULL),
(15, 'Athletics - 3000 Meter (Girls)', 2, NULL, NULL, NULL, NULL),
(16, 'Athletics - 400m (Boys)', 1, NULL, NULL, NULL, NULL),
(17, 'Athletics - 400m (Boys)', 2, NULL, NULL, NULL, NULL),
(18, 'Athletics - 400m (Girls)', 1, NULL, NULL, NULL, NULL),
(19, 'Athletics - 400m (Girls)', 2, NULL, NULL, NULL, NULL),
(20, 'Athletics - 4x100 Relay (Boys)', 1, NULL, NULL, NULL, NULL),
(21, 'Athletics - 4x100 Relay (Boys)', 2, NULL, NULL, NULL, NULL),
(22, 'Athletics - 4x100 Relay (Girls)', 1, NULL, NULL, NULL, NULL),
(23, 'Athletics - 4x100 Relay (Girls)', 2, NULL, NULL, NULL, NULL),
(24, 'Athletics - 4x400 Relay (Boys)', 1, NULL, NULL, NULL, NULL),
(25, 'Athletics - 4x400 Relay (Boys)', 2, NULL, NULL, NULL, NULL),
(26, 'Athletics - 4x400 Relay (Girls)', 1, NULL, NULL, NULL, NULL),
(27, 'Athletics - 4x400 Relay (Girls)', 2, NULL, NULL, NULL, NULL),
(28, 'Athletics - 5,000 m (Boys)', 2, NULL, NULL, NULL, NULL),
(29, '8 Balls (Boys)', 2, 29, NULL, NULL, NULL),
(30, '8 Balls (Girls)', 2, 29, NULL, NULL, NULL),
(31, 'Athletics - 800M (Boys)', 1, NULL, NULL, NULL, NULL),
(32, 'Athletics - 800m (Boys)', 2, NULL, NULL, NULL, NULL),
(33, 'Athletics - 800m (Girls) Elemenetary', 1, NULL, NULL, NULL, NULL),
(34, 'Athletics - 800M (Girls)', 2, NULL, NULL, NULL, NULL),
(35, '9 Balls (Boys)', 2, 30, NULL, NULL, NULL),
(36, '9 Balls (Girls)', 2, 30, NULL, NULL, NULL),
(37, 'Archery 30 meters (Boys)', 2, NULL, NULL, NULL, NULL),
(38, 'Archery 30 meters (Girls)', 2, NULL, NULL, NULL, NULL),
(39, 'Archery 50 meters (Boys)', 2, NULL, NULL, NULL, NULL),
(40, 'Archery 50 meters (Girls)', 2, NULL, NULL, NULL, NULL),
(41, 'Archery 50 meters (Mixed Gender)', 2, NULL, NULL, NULL, NULL),
(42, 'Archery Olympic Round', 2, NULL, NULL, NULL, NULL),
(78, 'Badminton (Boys)', 1, 37, NULL, NULL, NULL),
(80, 'Badminton (Boys)', 1, 60, NULL, NULL, NULL),
(81, 'Badminton (Boys)', 2, 37, NULL, NULL, NULL),
(82, 'Badminton (Boys)', 2, 60, NULL, NULL, NULL),
(88, 'Badminton (Girls)', 2, 37, NULL, NULL, NULL),
(90, 'Baseball (Boys)', 2, NULL, NULL, NULL, NULL),
(91, 'Basketball (Boys)', 1, 67, NULL, NULL, NULL),
(92, 'Basketball (Boys)', 2, 28, NULL, NULL, NULL),
(93, 'Basketball (Boys)', 2, 11, NULL, NULL, NULL),
(94, 'Basketball (Boys)', 2, 12, NULL, NULL, NULL),
(95, 'Basketball (Boys)', 2, 13, NULL, NULL, NULL),
(96, 'Basketball 3x3', 2, NULL, NULL, NULL, NULL),
(97, 'Basketball 5x5 Boys', 2, NULL, NULL, NULL, NULL),
(98, 'Basketball 5x5 Girls', 2, NULL, NULL, NULL, NULL),
(99, 'Boxing', 2, 50, NULL, NULL, NULL),
(100, 'Boxing', 2, 356, NULL, NULL, NULL),
(101, 'Boxing', 2, 71, NULL, NULL, NULL),
(102, 'Chess Tournament - BLITZ Boys', 1, 44, NULL, NULL, NULL),
(103, 'Chess Tournament - BLITZ Boys', 1, 67, NULL, NULL, NULL),
(104, 'Chess Tournament - BLITZ Girls', 1, 44, NULL, NULL, NULL),
(105, 'Chess Tournament - BLITZ Girls', 1, 67, NULL, NULL, NULL),
(106, 'Chess Tournament - BLITZ Boys', 2, 44, NULL, NULL, NULL),
(107, 'Chess Tournament - BLITZ Boys', 2, 67, NULL, NULL, NULL),
(108, 'Chess Tournament - BLITZ Girls', 2, 44, NULL, NULL, NULL),
(109, 'Chess Tournament - BLITZ Girls', 2, 67, NULL, NULL, NULL),
(110, 'Chess Tournament - Standard Boys', 1, 67, NULL, NULL, NULL),
(111, 'Chess Tournament - Standard Boys', 1, 44, NULL, NULL, NULL),
(112, 'Chess Tournament - Standard Girls', 1, 44, NULL, NULL, NULL),
(113, 'Chess Tournament - Standard Girls', 1, 67, NULL, NULL, NULL),
(114, 'Chess Tournament - Standard Boys', 2, 44, NULL, NULL, NULL),
(115, 'Chess Tournament - Standard Boys', 2, 67, NULL, NULL, NULL),
(116, 'Chess Tournament - Standard Girls', 2, 44, NULL, NULL, NULL),
(117, 'Chess Tournament - Standard Girls', 2, 67, NULL, NULL, NULL),
(118, 'Discus Throw (Boys)', 2, NULL, NULL, NULL, NULL),
(119, 'Discus Throw (Girls)', 1, NULL, NULL, NULL, NULL),
(120, 'Discus Throw (Girls)', 2, NULL, NULL, NULL, NULL),
(122, 'Football (Boys)', 1, NULL, NULL, NULL, NULL),
(123, 'Football', 2, NULL, NULL, NULL, NULL),
(124, 'Futsal', 2, NULL, NULL, NULL, NULL),
(125, 'Athletics - High Jump (Boys)', 1, NULL, NULL, NULL, NULL),
(126, 'Athletics - High Jump (Boys)', 2, NULL, NULL, NULL, NULL),
(127, 'Athletics - High Jump (Girls)', 1, NULL, NULL, NULL, NULL),
(128, 'Athletics - High Jump (Girls)', 2, NULL, NULL, NULL, NULL),
(129, 'Athletics - Javelin Throw (Boys)', 1, NULL, NULL, NULL, NULL),
(130, 'Athletics - Javelin Throw (Boys)', 2, NULL, NULL, NULL, NULL),
(131, 'Athletics - Javelin Throw (Girls)', 1, NULL, NULL, NULL, NULL),
(132, 'Athletics - Javelin Throw (Girls)', 2, NULL, NULL, NULL, NULL),
(133, 'Junior Modern Standard Discipline', 2, 36, NULL, NULL, NULL),
(134, 'Junior Modern Standard Discipline', 2, 40, NULL, NULL, NULL),
(135, 'Junior Modern Standard Discipline', 2, 41, NULL, NULL, NULL),
(136, 'Junior Modern Standard Discipline', 2, 48, NULL, NULL, NULL),
(137, 'Junior Modern Standard Discipline', 2, 53, NULL, NULL, NULL),
(138, 'Junior Modern Standard Discipline', 2, 55, NULL, NULL, NULL),
(139, 'Junior Modern Standard Discipline', 2, 56, NULL, NULL, NULL),
(140, 'Junior Modern Standard Discipline', 2, 57, NULL, NULL, NULL),
(141, 'Junior Modern Standard Discipline', 2, 66, NULL, NULL, NULL),
(142, 'Junior Modern Standard Discipline', 2, 70, NULL, NULL, NULL),
(143, 'Junior Modern Standard Discipline', 2, 69, NULL, NULL, NULL),
(144, 'Juvenile Latin American Discipline', 1, 36, NULL, NULL, NULL),
(145, 'Juvenile Latin American Discipline', 1, 41, NULL, NULL, NULL),
(146, 'Juvenile Latin American Discipline', 1, 48, NULL, NULL, NULL),
(147, 'Juvenile Latin American Discipline', 1, 53, NULL, NULL, NULL),
(148, 'Juvenile Latin American Discipline', 1, 56, NULL, NULL, NULL),
(149, 'Juvenile Latin American Discipline', 1, 57, NULL, NULL, NULL),
(150, 'Juvenile Modern Standard Discipline', 1, 40, NULL, NULL, NULL),
(151, 'Juvenile Modern Standard Discipline', 1, 41, NULL, NULL, NULL),
(152, 'Juvenile Modern Standard Discipline', 1, 55, NULL, NULL, NULL),
(153, 'Juvenile Modern Standard Discipline', 1, 66, NULL, NULL, NULL),
(154, 'Juvenile Modern Standard Discipline', 1, 69, NULL, NULL, NULL),
(155, 'Juvenile Modern Standard Discipline', 1, 70, NULL, NULL, NULL),
(156, 'KYUROGI (Boys)', 1, 32, NULL, NULL, NULL),
(157, 'KYUROGI (Boys)', 1, 33, NULL, NULL, NULL),
(158, 'KYUROGI (Girls)', 1, 32, NULL, NULL, NULL),
(159, 'KYUROGI (Girls)', 1, 33, NULL, NULL, NULL),
(160, 'KYUROGI (Girls)', 1, 34, NULL, NULL, NULL),
(161, 'Athletics - Long Jump (Boys)', 1, NULL, NULL, NULL, NULL),
(162, 'Athletics - Long Jump (Boys)', 2, NULL, NULL, NULL, NULL),
(163, 'Athletics - Long Jump (Girls)', 1, NULL, NULL, NULL, NULL),
(164, 'Athletics - Long Jump (Girls)', 2, NULL, NULL, NULL, NULL),
(165, 'Men\'s Artistic Gymnastics', 2, NULL, NULL, NULL, NULL),
(166, 'Men\'s Artistic Gymnastics', 2, NULL, NULL, NULL, NULL),
(167, 'Poomsae (Boys)', 1, 35, NULL, NULL, NULL),
(168, 'Poomsae (Boys)', 1, 67, NULL, NULL, NULL),
(169, 'Poomsae (Girls)', 1, 35, NULL, NULL, NULL),
(170, 'Poomsae (Girls)', 1, 52, NULL, NULL, NULL),
(171, 'Poomsae (Girls)', 1, 67, NULL, NULL, NULL),
(172, 'Poomsae (Team)', 1, 67, NULL, NULL, NULL),
(173, 'Poomsae (Girls)', 2, 52, NULL, NULL, NULL),
(174, 'Poomsae (Boys)', 2, 35, NULL, NULL, NULL),
(175, 'Poomsae (Boys)', 2, 67, NULL, NULL, NULL),
(176, 'Poomsae (Girls)', 2, 35, NULL, NULL, NULL),
(177, 'Poomsae (Girls)', 2, 67, NULL, NULL, NULL),
(178, 'Rhythmic Gymnastics', 2, NULL, NULL, NULL, NULL),
(179, 'Rhythmic Gymnastics', 2, NULL, NULL, NULL, NULL),
(180, 'Rhythmic Gymnastics', 2, NULL, NULL, NULL, NULL),
(181, 'Rhythmic Gymnastics', 2, NULL, NULL, NULL, NULL),
(182, 'Sepak Takraw (Boys)', 1, NULL, NULL, NULL, NULL),
(183, 'Sepak Takraw (Boys)', 2, NULL, NULL, NULL, NULL),
(184, 'Sepak Takraw (Girls)', 2, NULL, NULL, NULL, NULL),
(185, 'Athletics - Shot Put (Boys)', 1, NULL, NULL, NULL, NULL),
(186, 'Athletics - Shot Put (Boys)', 2, NULL, NULL, NULL, NULL),
(187, 'Athletics - Shot Put (Girls)', 1, NULL, NULL, NULL, NULL),
(188, 'Athletics - Shot Put (Girls)', 2, NULL, NULL, NULL, NULL),
(189, 'Softball', 1, NULL, NULL, NULL, NULL),
(190, 'Softball', 2, NULL, NULL, NULL, NULL),
(191, 'Swimming (Boys)', 1, 10, NULL, NULL, NULL),
(192, 'Swimming (Boys)', 1, 2, NULL, NULL, NULL),
(193, 'Swimming (Boys)', 1, 19, NULL, NULL, NULL),
(194, 'Swimming (Boys)', 1, 23, NULL, NULL, NULL),
(195, 'Swimming (Boys)', 1, 24, NULL, NULL, NULL),
(196, 'Swimming (Boys)', 1, 26, NULL, NULL, NULL),
(197, 'Swimming (Boys)', 1, 25, NULL, NULL, NULL),
(198, 'Swimming (Boys)', 1, 21, NULL, NULL, NULL),
(199, 'Swimming (Boys)', 1, 20, NULL, NULL, NULL),
(200, 'Swimming (Boys)', 2, 10, NULL, NULL, NULL),
(201, 'Swimming (Boys)', 2, 2, NULL, NULL, NULL),
(202, 'Swimming (Boys)', 2, 8, NULL, NULL, NULL),
(203, 'Swimming (Boys)', 2, 7, NULL, NULL, NULL),
(204, 'Swimming (Boys)', 2, 14, NULL, NULL, NULL),
(205, 'Swimming (Boys)', 2, 19, NULL, NULL, NULL),
(206, 'Swimming (Boys)', 2, 15, NULL, NULL, NULL),
(207, 'Swimming (Boys)', 2, 9, NULL, NULL, NULL),
(208, 'Swimming (Boys)', 2, 21, NULL, NULL, NULL),
(209, 'Swimming (Boys)', 2, 20, NULL, NULL, NULL),
(210, 'Swimming (Girls)', 1, 10, NULL, NULL, NULL),
(211, 'Swimming (Girls)', 1, 2, NULL, NULL, NULL),
(212, 'Swimming (Girls)', 1, 19, NULL, NULL, NULL),
(213, 'Swimming (Girls)', 1, 23, NULL, NULL, NULL),
(214, 'Swimming (Girls)', 1, 24, NULL, NULL, NULL),
(215, 'Swimming (Girls)', 1, 26, NULL, NULL, NULL),
(216, 'Swimming (Girls)', 1, 25, NULL, NULL, NULL),
(217, 'Swimming (Girls)', 1, 21, NULL, NULL, NULL),
(218, 'Swimming (Girls)', 1, 20, NULL, NULL, NULL),
(219, 'Swimming (Girls)', 2, 10, NULL, NULL, NULL),
(220, 'Swimming (Girls)', 2, 2, NULL, NULL, NULL),
(221, 'Swimming (Girls)', 2, 8, NULL, NULL, NULL),
(222, 'Swimming (Girls)', 2, 7, NULL, NULL, NULL),
(223, 'Swimming (Girls)', 2, 14, NULL, NULL, NULL),
(224, 'Swimming (Girls)', 2, 19, NULL, NULL, NULL),
(225, 'Swimming (Girls)', 2, 15, NULL, NULL, NULL),
(226, 'Swimming (Girls)', 2, 9, NULL, NULL, NULL),
(227, 'Swimming (Girls)', 2, 21, NULL, NULL, NULL),
(228, 'Swimming (Girls)', 2, 20, NULL, NULL, NULL),
(229, 'Swimming 100m (Boys)', 1, 5, NULL, NULL, NULL),
(230, 'Swimming 100m (Boys)', 1, 3, NULL, NULL, NULL),
(231, 'Swimming 100m (Boys)', 1, 4, NULL, NULL, NULL),
(232, 'Swimming 100m (Boys)', 2, 5, NULL, NULL, NULL),
(233, 'Swimming 100m (Boys)', 2, 3, NULL, NULL, NULL),
(234, 'Swimming 100m (Boys)', 2, 4, NULL, NULL, NULL),
(235, 'Swimming 100m (Girls)', 1, 5, NULL, NULL, NULL),
(236, 'Swimming 100m (Girls)', 1, 3, NULL, NULL, NULL),
(237, 'Swimming 100m (Girls)', 1, 4, NULL, NULL, NULL),
(238, 'Swimming 100m (Girls)', 2, 5, NULL, NULL, NULL),
(239, 'Swimming 100m (Girls)', 2, 3, NULL, NULL, NULL),
(240, 'Swimming 100m (Girls)', 2, 4, NULL, NULL, NULL),
(241, 'Swimming 200m (Boys)', 1, NULL, NULL, NULL, NULL),
(242, 'Swimming 200m Individual Medley (Boys)', 2, 6, NULL, NULL, NULL),
(243, 'Swimming 200m Individual Medley (Girls)', 1, NULL, NULL, NULL, NULL),
(244, 'Swimming 200m Individual Medley (Girls)', 2, 6, NULL, NULL, NULL),
(245, 'Swimming 4x50m (Boys)', 1, 22, NULL, NULL, NULL),
(246, 'Swimming 4x50m (Boys)', 2, 22, NULL, NULL, NULL),
(247, 'Swimming 4x50m (Girls)', 1, 22, NULL, NULL, NULL),
(248, 'Swimming 4x50m (Girls)', 2, 22, NULL, NULL, NULL),
(249, 'Table Tennis (Boys)', 1, 60, NULL, NULL, NULL),
(250, 'Table Tennis (Boys)', 1, 43, NULL, NULL, NULL),
(251, 'Table Tennis (Girls)', 1, 60, NULL, NULL, NULL),
(252, 'Table Tennis (Girls)', 1, 43, NULL, NULL, NULL),
(253, 'Table Tennis (Boys)', 2, 60, NULL, NULL, NULL),
(254, 'Table Tennis (Boys)', 2, 43, NULL, NULL, NULL),
(255, 'Table Tennis (Girls)', 2, 60, NULL, NULL, NULL),
(256, 'Table Tennis (Girls)', 2, 43, NULL, NULL, NULL),
(257, 'Tennis (Boys)', 1, 60, NULL, NULL, NULL),
(258, 'Tennis (Boys)', 1, 37, NULL, NULL, NULL),
(259, 'Tennis (Boys)', 2, 60, NULL, NULL, NULL),
(260, 'Tennis (Boys)', 2, 37, NULL, NULL, NULL),
(261, 'Tennis (Boys)', 2, 51, NULL, NULL, NULL),
(262, 'Tennis (Girls)', 1, 60, NULL, NULL, NULL),
(263, 'Tennis (Girls)', 1, 37, NULL, NULL, NULL),
(264, 'Tennis (Girls)', 2, 60, NULL, NULL, NULL),
(265, 'Tennis (Girls)', 2, 37, NULL, NULL, NULL),
(266, 'Tennis (Mix)', 1, 51, NULL, NULL, NULL),
(267, 'Athletics - Triple Jump (boys)', 1, NULL, NULL, NULL, NULL),
(268, 'Athletics - Triple Jump (boys)', 2, NULL, NULL, NULL, NULL),
(269, 'Athletics - Triple Jump (Girls)', 1, NULL, NULL, NULL, NULL),
(270, 'Athletics - Triple Jump (Girls)', 2, NULL, NULL, NULL, NULL),
(271, 'Volleyball (Boys)', 1, NULL, NULL, NULL, NULL),
(272, 'Volleyball (Boys)', 2, NULL, NULL, NULL, NULL),
(273, 'Volleyball (Girls)', 1, NULL, NULL, NULL, NULL),
(274, 'Volleyball (Girls)', 2, NULL, NULL, NULL, NULL),
(275, 'Walkathon (Boys)', 2, NULL, NULL, NULL, NULL),
(276, 'WUSHU (Girls)', 2, 68, NULL, NULL, NULL),
(277, 'WUSHU (Girls)', 2, 16, NULL, NULL, NULL),
(278, 'WUSHU (Girls)', 2, 18, NULL, NULL, NULL),
(279, 'WUSHU (Boys)', 2, 68, NULL, NULL, NULL),
(280, 'WUSHU (Boys)', 2, 16, NULL, NULL, NULL),
(281, 'WUSHU (Boys)', 2, 17, NULL, NULL, NULL),
(282, 'WUSHU (Boys)', 2, 18, NULL, NULL, NULL),
(283, 'WUSHU (Boys)', 2, 27, NULL, NULL, NULL),
(284, 'Poomsae (Boys)', 1, 52, NULL, NULL, NULL),
(285, 'WUSHU (Girls)', 2, 17, NULL, NULL, NULL),
(286, 'Gymnastic (Boys)', 2, 73, NULL, NULL, NULL),
(287, 'Gymnastic (Boys)', 3, 74, NULL, NULL, NULL),
(288, 'Swimming (Boys)', 1, 75, NULL, NULL, NULL),
(289, 'Swimming (Girls)', 1, 75, NULL, NULL, NULL),
(290, 'Swimming (Boys)', 2, 5, NULL, NULL, NULL),
(291, 'Swimming (Girls)', 2, 5, NULL, NULL, NULL),
(292, 'Swimming (Boys)', 2, 3, NULL, NULL, NULL),
(293, 'Swimming (Girls)', 2, 3, NULL, NULL, NULL),
(294, 'Swimming (Boys)', 2, 4, NULL, NULL, NULL),
(295, 'Swimming (Girls)', 2, 4, NULL, NULL, NULL),
(296, 'Swimming (Boys)', 2, 22, NULL, NULL, NULL),
(297, 'Swimming (Girls)', 2, 22, NULL, NULL, NULL),
(298, 'Swimming (Boys)', 1, 22, NULL, NULL, NULL),
(299, 'Athletics - 400M Hurdle (Boys)', 1, NULL, NULL, NULL, NULL),
(300, 'Athletics - 400m Hurdle(Girls)', 1, NULL, NULL, NULL, NULL),
(301, 'Para Games', 4, 79, NULL, NULL, NULL),
(302, 'Para Games', 4, 78, NULL, NULL, NULL),
(303, 'Para Games', 4, 80, NULL, NULL, NULL),
(304, 'Para Games', 4, 81, NULL, NULL, NULL),
(305, 'Para Games', 4, 82, NULL, NULL, NULL),
(306, 'Para Games', 3, 83, NULL, NULL, NULL),
(307, 'Para Games', 3, 84, NULL, NULL, NULL),
(308, 'Para Games', 4, 85, NULL, NULL, NULL),
(309, 'Para Games', 4, 86, NULL, NULL, NULL),
(310, 'Para Games', 4, 87, NULL, NULL, NULL),
(311, 'Para Games', 4, 88, NULL, NULL, NULL),
(313, 'Para Games', 4, 89, NULL, NULL, NULL),
(314, 'Para Games', 4, 90, NULL, NULL, NULL),
(315, 'Athletics - 110m Hurdle (Boys)', 1, NULL, NULL, NULL, NULL),
(324, 'Para Games - Bocce', 5, 133, NULL, NULL, NULL),
(325, 'Para Games', 4, 100, NULL, NULL, NULL),
(326, 'Para Games', 3, 101, NULL, NULL, NULL),
(327, 'Para Games', 3, 102, NULL, NULL, NULL),
(328, 'Junior Latin American Discipline', 2, 104, NULL, NULL, NULL),
(329, 'Junior Latin American Discipline', 2, 105, NULL, NULL, NULL),
(330, 'Junior Latin American Discipline', 2, 106, NULL, NULL, NULL),
(331, 'Junior Latin American Discipline', 2, 107, NULL, NULL, NULL),
(332, 'Junior Latin American Discipline', 2, 108, NULL, NULL, NULL),
(333, 'Junior Latin American Discipline', 2, 41, NULL, NULL, NULL),
(334, 'Chess RAPID (Boys)', 1, 44, NULL, NULL, NULL),
(335, 'Chess RAPID (Girls)', 2, 44, NULL, NULL, NULL),
(336, 'Chess RAPID (Boys)', 1, 67, NULL, NULL, NULL),
(337, 'Chess RAPID (Girls)', 1, 67, NULL, NULL, NULL),
(338, 'Tennis (Mix)', 1, 110, NULL, NULL, NULL),
(339, 'Walkathon (Girls)', 2, NULL, NULL, NULL, NULL),
(340, 'Athletics - 100M Hurdle (Girls)', 2, NULL, NULL, NULL, NULL),
(341, 'Boxing', 2, 111, NULL, NULL, NULL),
(342, 'Boxing', 2, 112, NULL, NULL, NULL),
(343, 'Boxing', 2, 113, NULL, NULL, NULL),
(344, 'Boxing', 2, 114, NULL, NULL, NULL),
(345, 'Paragames', 5, 115, NULL, NULL, NULL),
(346, 'Paragames', 5, 26, NULL, NULL, NULL),
(347, 'Pencak Silat (boys', 2, 116, NULL, NULL, NULL),
(348, 'Penkak Silat (boys', 2, 117, NULL, NULL, NULL),
(349, 'Pencak Silat (boys', 2, 118, NULL, NULL, NULL),
(350, 'Pencak Silat (boys', 2, 119, NULL, NULL, NULL),
(351, 'Pencak Silat (girls)', 2, 116, NULL, NULL, NULL),
(352, 'Pencak Silat (girls)', 2, 117, NULL, NULL, NULL),
(353, 'Pencak Silat (girls)', 2, 118, NULL, NULL, NULL),
(354, 'Para Games', 5, 120, NULL, NULL, NULL),
(355, 'Para Games', 5, 26, NULL, NULL, NULL),
(356, 'Pencak Silat (girls)', 2, 121, NULL, NULL, NULL),
(357, 'Pencak Silat (boys', 2, 121, NULL, NULL, NULL),
(358, 'Para Games', 5, 23, NULL, NULL, NULL),
(359, 'Billiards(Boys)', 2, 29, NULL, NULL, NULL),
(360, 'Billiards(Boys)', 2, 30, NULL, NULL, NULL),
(361, 'Billiards(Girls)', 2, 29, NULL, NULL, NULL),
(362, 'Billiards(Girls)', 2, 30, NULL, NULL, NULL),
(363, 'BOXING-UNDER 17 BANTAM WEIGHT', 2, 122, NULL, NULL, NULL),
(364, 'BOXING-UNDER 19 FLYWEIGHT', 2, 123, NULL, NULL, NULL),
(365, 'BOXING-UNDER 17 PIN WEIGHT', 2, 124, NULL, NULL, NULL),
(366, 'BOXING-UNDER 17 LIGHT  FLYWEIGHT', 2, 125, NULL, NULL, NULL),
(367, 'BOXING-UNDER 17 FLYWEIGHT', 2, 125, NULL, NULL, NULL),
(368, 'BOXING-UNDER 19 MINIMUM WEIGHT', 2, 126, NULL, NULL, NULL),
(369, 'BOXING-UNDER 19 BANTAM WEIGHT', 2, 127, NULL, NULL, NULL),
(370, 'Archery (Girls) 60Meters', 2, NULL, NULL, NULL, NULL),
(371, 'Archery (Girls) 70Meters', 2, NULL, NULL, NULL, NULL),
(372, 'Archery (Girls) Team', 2, NULL, NULL, NULL, NULL),
(373, 'Archery 60 meters (Boys)', 2, NULL, NULL, NULL, NULL),
(374, 'Archery 70 meters (Boys)', 2, NULL, 'ARCHERY', 'Open Space', 'Labnig, Talacogon'),
(375, 'Archery 1440 meters (Boys)', 2, NULL, NULL, NULL, NULL),
(376, 'Archery TEAM (Boys)', 2, NULL, NULL, NULL, NULL),
(377, 'TAEKWONDO', 1, NULL, NULL, NULL, NULL),
(378, 'TAEKWONDO', 2, 109, NULL, NULL, NULL),
(379, 'TAEKWONDO', 2, 128, NULL, NULL, NULL),
(380, 'Para Games - Athletics (100m)', 5, 129, NULL, NULL, NULL),
(381, 'Para Games - Athletics (100m)', 5, 130, NULL, NULL, NULL),
(382, 'Para Games - Athletics (100m)', 5, 131, NULL, NULL, NULL),
(383, 'Para Games - Athletics (100m)', 5, 132, NULL, NULL, NULL),
(384, 'Para Games - Athletics Running Long Jump', 5, 131, NULL, NULL, NULL),
(385, 'Para Games - Athletics Running Long Jump', 5, 132, NULL, NULL, NULL),
(386, 'Para Games - Athletics Running Long Jump', 5, 130, NULL, NULL, NULL),
(387, 'Para Games - Athletics Running Long Jump', 5, 129, NULL, NULL, NULL),
(388, 'Para Games - Athletics Shot Put', 5, 129, NULL, NULL, NULL),
(389, 'Para Games - Athletics Shot Put', 5, 132, NULL, NULL, NULL),
(390, 'Para Games - Athletics Shot Put', 5, 130, NULL, NULL, NULL),
(391, 'Para Games - Athletics Shot Put', 5, 131, NULL, NULL, NULL),
(392, 'Para Games - Athletics (100m)', 5, 134, NULL, NULL, NULL),
(393, 'Para Games - Athletics (100m)', 5, 135, NULL, NULL, NULL),
(394, 'Para Games - Athletics (100m)', 5, 136, NULL, NULL, NULL),
(395, 'Para Games - Athletics (100m)', 5, 137, NULL, NULL, NULL),
(396, 'Para Games - Athletics (100m)', 5, 138, NULL, NULL, NULL),
(397, 'Para Games - Athletics (100m)', 5, 139, NULL, NULL, NULL),
(398, 'Dancesport', 1, 140, NULL, NULL, NULL),
(399, 'Dancesport', 2, 141, NULL, NULL, NULL),
(400, 'Dancesport', 2, 142, NULL, NULL, NULL),
(401, 'Dancesport', 2, 143, NULL, NULL, NULL),
(402, 'Dancesport', 2, 144, NULL, NULL, NULL),
(403, 'Dancesport', 1, 145, NULL, NULL, NULL),
(404, 'Dancesport', 2, 145, NULL, NULL, NULL),
(405, 'Dancesport', 1, 141, NULL, NULL, NULL),
(406, 'Dancesport', 1, 146, NULL, NULL, NULL),
(407, 'Dancesport', 1, 143, NULL, NULL, NULL),
(408, 'Dancesport', 1, 144, NULL, NULL, NULL),
(409, 'Dancesport', 1, 147, NULL, NULL, NULL),
(411, 'Dancesport', 2, 149, NULL, NULL, NULL),
(412, 'Dancesport', 2, 150, NULL, NULL, NULL),
(413, 'Dancesport', 2, 151, NULL, NULL, NULL),
(414, 'Dancesport', 2, 152, NULL, NULL, NULL),
(415, 'Dancesport', 2, 147, NULL, NULL, NULL),
(416, 'Dancesport', 2, 140, NULL, NULL, NULL),
(417, 'Dancesport', 1, 149, NULL, NULL, NULL),
(418, 'Dancesport', 1, 152, NULL, NULL, NULL),
(419, 'Dancesport', 1, 150, NULL, NULL, NULL),
(420, 'Dancesport', 1, 151, NULL, NULL, NULL),
(421, 'Weightlifting', 2, 153, NULL, NULL, NULL),
(422, 'Weightlifting', 2, 154, NULL, NULL, NULL),
(423, 'Weightlifting', 2, 155, NULL, NULL, NULL),
(424, 'Weightlifting', 2, 156, NULL, NULL, NULL),
(425, 'Para Games - Athletics Long Jump', 5, 132, NULL, NULL, NULL),
(426, 'Para Games - Athletics Long Jump', 5, 130, NULL, NULL, NULL),
(427, 'Discus Throw (Boys)', 1, NULL, NULL, NULL, NULL),
(428, 'Para Games', 5, 157, NULL, NULL, NULL),
(429, 'Para Games - Goal Ball', 5, 128, NULL, NULL, NULL),
(430, 'Para Games', 5, 159, NULL, NULL, NULL),
(431, 'Para Games', 5, 160, NULL, NULL, NULL),
(432, 'Para Games - Shotput', 5, 161, NULL, NULL, NULL),
(433, 'Para Games - Swimming (Ortho Boys)', 5, 24, NULL, NULL, NULL),
(434, 'Para Games', 5, 165, NULL, NULL, NULL),
(435, 'Para Games', 5, 164, NULL, NULL, NULL),
(436, 'Para Games', 5, 166, NULL, NULL, NULL),
(437, 'Weightlifting', 2, 167, NULL, NULL, NULL),
(438, 'Weightlifting', 2, 168, NULL, NULL, NULL),
(439, 'Para Games', 5, 169, NULL, NULL, NULL),
(440, 'Weightlifting', 2, 170, NULL, NULL, NULL),
(441, 'Weightlifting', 2, 171, NULL, NULL, NULL),
(442, 'Para Games', 5, 172, NULL, NULL, NULL),
(443, 'Para Games', 5, 173, NULL, NULL, NULL),
(444, 'Weightlifting', 2, 174, NULL, NULL, NULL),
(446, 'Para Games - Athletics 400 meters', 5, 176, NULL, NULL, NULL),
(447, 'Para Games', 5, 177, NULL, NULL, NULL),
(448, 'Para Games', 5, 175, NULL, NULL, NULL),
(449, 'Para Games - Athletics 400 meters', 5, 178, NULL, NULL, NULL),
(450, 'Para Games - Athletics 400 meters', 5, 179, NULL, NULL, NULL),
(451, 'Para Games', 5, 180, NULL, NULL, NULL),
(452, 'Para Games', 5, 181, NULL, NULL, NULL),
(455, 'Para Games - Athletics 400 meters', 5, 184, NULL, NULL, NULL),
(456, 'Para Games - Bocce', 5, 37, NULL, NULL, NULL),
(457, 'Athletics - 2000 m Walkathon (Boys)', 2, NULL, NULL, NULL, NULL),
(458, 'Arnis - Individual Anyo', 1, 189, NULL, NULL, NULL),
(459, 'Arnis - Individual Anyo', 1, 188, NULL, NULL, NULL),
(460, 'Arnis - Individual Anyo', 1, 187, NULL, NULL, NULL),
(461, 'Arnis - Individual Anyo', 1, 190, NULL, NULL, NULL),
(462, 'Arnis - Individual Anyo', 2, 187, NULL, NULL, NULL),
(463, 'Arnis - Individual Anyo', 2, 190, NULL, NULL, NULL),
(464, 'Arnis - Individual Anyo', 2, 188, NULL, NULL, NULL),
(465, 'Arnis - Individual Anyo', 2, 189, NULL, NULL, NULL),
(466, 'Arnis - Individual Anyo', 1, 192, NULL, NULL, NULL),
(467, 'Arnis - Individual Anyo', 1, 193, NULL, NULL, NULL),
(468, 'Arnis - Individual Anyo', 2, 192, NULL, NULL, NULL),
(469, 'Arnis - Individual Anyo', 2, 193, NULL, NULL, NULL),
(470, 'Arnis - Mixed Sychro', 1, 194, NULL, NULL, NULL),
(471, 'Arnis - Mixed Sychro', 2, 194, NULL, NULL, NULL),
(478, 'Para Games - Shotput', 5, 201, NULL, NULL, NULL),
(479, 'Para Games - Shotput', 5, 202, NULL, NULL, NULL),
(480, 'Para Games - Shotput', 5, 203, NULL, NULL, NULL),
(481, 'Para Games - Shotput', 5, 204, NULL, NULL, NULL),
(482, 'Para Games - Shotput', 5, 205, NULL, NULL, NULL),
(483, 'Para Games - Shotput', 5, 206, NULL, NULL, NULL),
(484, 'Para Games - Running Long Jump', 5, 206, NULL, NULL, NULL),
(485, 'Para Games - Running Long Jump', 5, 205, NULL, NULL, NULL),
(486, 'Para Games - Shotput', 5, 207, NULL, NULL, NULL),
(487, 'Para Games - Shotput', 5, 208, NULL, NULL, NULL),
(488, 'Athletics - 3,000 m Steeplechase', 2, 109, NULL, NULL, NULL),
(489, 'Athletics - 3,000 m Steeplechase', 2, 128, NULL, NULL, NULL),
(490, 'Para Games - Running Long Jump', 5, 209, NULL, NULL, NULL),
(491, 'Para Games - Running Long Jump', 5, 210, NULL, NULL, NULL),
(492, 'Para Games - Running Long Jump', 5, 208, NULL, NULL, NULL),
(493, 'Para Games - Running Long Jump', 5, 207, NULL, NULL, NULL),
(494, 'Para Games - Running Long Jump', 5, 211, NULL, NULL, NULL),
(495, 'Para Games - Running Long Jump', 5, 212, NULL, NULL, NULL),
(496, 'Swimming (Boys and Girls)', 1, NULL, NULL, NULL, NULL),
(497, 'Swimming 200 Freestyle (Girls)', 1, NULL, NULL, NULL, NULL),
(500, 'Para Games - Shotput', 5, 211, NULL, NULL, NULL),
(501, 'Men\'s Artistic Gymnastics (MAG)', 2, 216, NULL, NULL, NULL),
(502, 'Men\'s Artistic Gymnastics (MAG)', 2, 217, NULL, NULL, NULL),
(503, 'Men\'s Artistic Gymnastics (MAG)', 1, 215, NULL, NULL, NULL),
(504, 'Men\'s Artistic Gymnastics (MAG)', 1, 218, NULL, NULL, NULL),
(505, 'Men\'s Artistic Gymnastics (MAG)', 1, 219, NULL, NULL, NULL),
(506, 'Men\'s Artistic Gymnastics (MAG)', 1, 220, NULL, NULL, NULL),
(507, 'Para Games - Athletics 200 meters', 5, 201, NULL, NULL, NULL),
(508, 'Para Games - Athletics 200 meters', 5, 202, NULL, NULL, NULL),
(509, 'Para Games -200 meters', 5, 203, NULL, NULL, NULL),
(510, 'Para Games -200 meters', 5, 204, NULL, NULL, NULL),
(511, 'Para Games - Bocce', 5, 67, NULL, NULL, NULL),
(512, 'Rhythmic Gymnastics', 1, 221, NULL, NULL, NULL),
(513, 'Rhythmic Gymnastics', 1, 222, NULL, NULL, NULL),
(514, 'Rhythmic Gymnastics', 1, 223, NULL, NULL, NULL),
(515, 'Rhythmic Gymnastics', 1, 224, NULL, NULL, NULL),
(516, 'Rhythmic Gymnastics', 1, 225, NULL, NULL, NULL),
(517, 'Para Games - Swimming (Ortho Boys)', 5, 26, NULL, NULL, NULL),
(518, 'Para Games - Swimming (ID Girls)', 5, 26, NULL, NULL, NULL),
(519, 'Para Games - Swimming I.D. (Girls)', 5, 226, NULL, NULL, NULL),
(520, 'Para Games - Swimming I.D. (Boys)', 5, 226, NULL, NULL, NULL),
(521, 'Para Games - Swimming I.D. (Boys)', 5, 227, NULL, NULL, NULL),
(522, 'Para Games - Swimming I.D. (Girls)', 5, 227, NULL, NULL, NULL),
(523, 'Para Games -  4x100 m Relay', 5, 202, NULL, NULL, NULL),
(524, 'Para Games -  4x100 m Relay', 5, 201, NULL, NULL, NULL),
(525, 'Para Games -  4x100 m Relay', 5, 204, NULL, NULL, NULL),
(526, 'Para Games -  4x100 m Relay', 5, 203, NULL, NULL, NULL),
(527, 'Archery 1440 Round (Girls)', 2, NULL, NULL, NULL, NULL),
(528, 'Badminton (Girls)', 2, 60, NULL, NULL, NULL),
(529, 'Badminton (Girls)', 1, 60, NULL, NULL, NULL),
(530, 'Badminton (Girls)', 1, 37, NULL, NULL, NULL),
(531, 'Badminton (Mixed)', 2, 37, NULL, NULL, NULL),
(532, 'Badminton (Mixed)', 1, 37, NULL, NULL, NULL),
(533, 'Rhythmic Gymnastics', 2, 228, NULL, NULL, NULL),
(534, 'Sepak Takraw (Boys)', 2, 229, NULL, NULL, NULL),
(535, 'Table Tennis (Boys)', 1, 37, NULL, NULL, NULL),
(536, 'Table Tennis (Girls)', 1, 37, NULL, NULL, NULL),
(537, 'TAEKWONDO', 2, 230, NULL, NULL, NULL),
(538, 'Archery 1440 Round (Boys)', 2, NULL, NULL, NULL, NULL),
(539, 'TAEKWONDO', 2, 231, NULL, NULL, NULL),
(540, 'TAEKWONDO', 2, 232, NULL, NULL, NULL),
(541, 'Arnis - Synchronized Anyo', 1, 233, NULL, NULL, NULL),
(542, 'Arnis - Synchronized Anyo', 1, 234, NULL, NULL, NULL),
(543, 'Arnis - Synchronized Anyo', 1, 235, NULL, NULL, NULL),
(544, 'Arnis - Synchronized Anyo', 2, 236, NULL, NULL, NULL),
(545, 'Arnis - Synchronized Anyo', 2, 237, NULL, NULL, NULL),
(546, 'Arnis - Synchronized Anyo', 2, 238, NULL, NULL, NULL),
(547, 'Arnis - Synchronized Anyo', 2, 235, NULL, NULL, NULL),
(548, 'Arnis - Synchronized Anyo', 1, 238, NULL, NULL, NULL),
(549, 'Arnis - Synchronized Anyo', 2, 239, NULL, NULL, NULL),
(550, 'Arnis - Synchronized Anyo', 2, 240, NULL, NULL, NULL),
(551, 'Arnis - Synchronized Anyo', 2, 233, NULL, NULL, NULL),
(552, 'Arnis - Synchronized Anyo', 2, 234, NULL, NULL, NULL),
(553, 'Arnis - Synchronized Anyo', 1, 237, NULL, NULL, NULL),
(554, 'Arnis - Synchronized Anyo', 1, 236, NULL, NULL, NULL),
(555, 'Aerobic Gymnastics', 2, 242, NULL, NULL, NULL),
(556, 'Aerobic Gymnastics', 1, 242, NULL, NULL, NULL),
(557, 'Aerobic Gymnastics', 2, 243, NULL, NULL, NULL),
(558, 'Aerobic Gymnastics', 1, 243, NULL, NULL, NULL),
(559, 'Para Games - High Jump', 5, 209, NULL, NULL, NULL),
(560, 'Para Games - High Jump', 5, 210, NULL, NULL, NULL),
(561, 'Para Games - Bocce', 5, 110, NULL, NULL, NULL),
(562, 'Womens\' Artistic Gymnastics (Cluster 1)', 1, 244, NULL, NULL, NULL),
(563, 'Womens\' Artistic Gymnastics (Cluster 1)', 1, 245, NULL, NULL, NULL),
(564, 'Womens\' Artistic Gymnastics (Cluster 1)', 1, 246, NULL, NULL, NULL),
(565, 'Womens\' Artistic Gymnastics (Cluster 1)', 1, 247, NULL, NULL, NULL),
(566, 'Womens\' Artistic Gymnastics (Cluster 1)', 1, 248, NULL, NULL, NULL),
(567, 'Womens\' Artistic Gymnastics (Cluster 2)', 1, 244, NULL, NULL, NULL),
(568, 'Womens\' Artistic Gymnastics (Cluster 2)', 1, 245, NULL, NULL, NULL),
(569, 'Womens\' Artistic Gymnastics (Cluster 2)', 1, 246, NULL, NULL, NULL),
(570, 'Womens\' Artistic Gymnastics (Cluster 2)', 1, 247, NULL, NULL, NULL),
(571, 'Womens\' Artistic Gymnastics (Cluster 2)', 1, 248, NULL, NULL, NULL),
(572, 'Womens\' Artistic Gymnastics (Cluster 3)', 2, 244, NULL, NULL, NULL),
(573, 'Womens\' Artistic Gymnastics (Cluster 3)', 2, 245, NULL, NULL, NULL),
(574, 'Womens\' Artistic Gymnastics (Cluster 3)', 2, 246, NULL, NULL, NULL),
(575, 'Womens\' Artistic Gymnastics (Cluster 3)', 2, 247, NULL, NULL, NULL),
(576, 'Womens\' Artistic Gymnastics (Cluster 3)', 2, 248, NULL, NULL, NULL),
(577, 'Womens\' Artistic Gymnastics Team Champion', 1, NULL, NULL, NULL, NULL),
(578, 'Womens\' Artistic Gymnastics Team Champion', 2, NULL, NULL, NULL, NULL),
(579, 'Pencak Silat (Girls)', 2, 249, NULL, NULL, NULL),
(580, 'Pencak Silat (Boys)', 2, 249, NULL, NULL, NULL),
(581, 'Pencak Silat (Girls)', 2, 250, NULL, NULL, NULL),
(582, 'Pencak Silat (Boys)', 2, 250, NULL, NULL, NULL),
(583, 'Aerobic Gymnastics', 1, 251, NULL, NULL, NULL),
(584, 'Aerobic Gymnastics', 2, 251, NULL, NULL, NULL),
(585, 'Aerobic Gymnastics', 1, 252, NULL, NULL, NULL),
(586, 'Aerobic Gymnastics', 3, 253, NULL, NULL, NULL),
(587, 'Aerobic Gymnastics', 2, 252, NULL, NULL, NULL),
(588, 'Sepak Takraw (Girls)', 2, 37, NULL, NULL, NULL),
(589, 'Men\'s Artistic Gymnastics (MAG)', 2, 254, NULL, NULL, NULL),
(590, 'Men\'s Artistic Gymnastics (MAG)', 2, 255, NULL, NULL, NULL),
(591, 'Men\'s Artistic Gymnastics (MAG)', 2, 256, NULL, NULL, NULL),
(592, 'Men\'s Artistic Gymnastics (MAG)', 2, 257, NULL, NULL, NULL),
(593, 'Men\'s Artistic Gymnastics (MAG)', 2, 258, NULL, NULL, NULL),
(594, 'Men\'s Artistic Gymnastics (MAG)', 1, 259, NULL, NULL, NULL),
(595, 'Men\'s Artistic Gymnastics (MAG)', 1, 260, NULL, NULL, NULL),
(596, 'Men\'s Artistic Gymnastics (MAG)', 2, 261, NULL, NULL, NULL),
(597, 'Men\'s Artistic Gymnastics (MAG)', 2, 262, NULL, NULL, NULL),
(598, 'Men\'s Artistic Gymnastics (MAG)', 1, 263, NULL, NULL, NULL),
(599, 'Men\'s Artistic Gymnastics (MAG)', 1, 264, NULL, NULL, NULL),
(600, 'Men\'s Artistic Gymnastics (MAG)', 1, 265, NULL, NULL, NULL),
(601, 'Men\'s Artistic Gymnastics (MAG)', 1, 266, NULL, NULL, NULL),
(602, 'Men\'s Artistic Gymnastics (MAG)', 1, 267, NULL, NULL, NULL),
(603, 'Men\'s Artistic Gymnastics (MAG)', 1, 268, NULL, NULL, NULL),
(604, 'Men\'s Artistic Gymnastics (MAG)', 1, 269, NULL, NULL, NULL),
(605, 'Men\'s Artistic Gymnastics (MAG)', 1, 270, NULL, NULL, NULL),
(606, 'Men\'s Artistic Gymnastics (MAG)', 1, 271, NULL, NULL, NULL),
(607, 'Men\'s Artistic Gymnastics (MAG)', 1, 272, NULL, NULL, NULL),
(608, 'Men\'s Artistic Gymnastics (MAG)', 1, 273, NULL, NULL, NULL),
(609, 'Men\'s Artistic Gymnastics (MAG)', 1, 274, NULL, NULL, NULL),
(610, 'Athletics - Pole Vault (Girls)', 2, NULL, NULL, NULL, NULL),
(611, 'Athletics - Pole Vault (Boys)', 2, NULL, NULL, NULL, NULL),
(612, 'Pencak Silat (girls)', 2, 275, NULL, NULL, NULL),
(613, 'Pencak Silat (girls)', 2, 276, NULL, NULL, NULL),
(614, 'Pencak Silat (girls)', 2, 277, NULL, NULL, NULL),
(615, 'Pencak Silat (girls)', 2, 278, NULL, NULL, NULL),
(616, 'TAEKWONDO', 2, 279, NULL, NULL, NULL),
(617, 'TAEKWONDO', 2, 280, NULL, NULL, NULL),
(618, 'TAEKWONDO', 2, 281, NULL, NULL, NULL),
(619, 'TAEKWONDO', 2, 282, NULL, NULL, NULL),
(620, 'TAEKWONDO', 2, 283, NULL, NULL, NULL),
(621, 'TAEKWONDO', 2, 284, NULL, NULL, NULL),
(622, 'TAEKWONDO', 2, 285, NULL, NULL, NULL),
(623, 'Wushu (Girls)', 2, 286, NULL, NULL, NULL),
(624, 'Wushu (Girls)', 2, 287, NULL, NULL, NULL),
(625, 'Wushu (Girls)', 2, 288, NULL, NULL, NULL),
(626, 'Wushu (Girls)', 2, 289, NULL, NULL, NULL),
(627, 'Wushu (Boys)', 2, 290, NULL, NULL, NULL),
(628, 'Wushu (Boys)', 2, 291, NULL, NULL, NULL),
(629, 'Wushu (Boys)', 2, 292, NULL, NULL, NULL),
(630, 'Wushu (Boys)', 2, 293, NULL, NULL, NULL),
(631, 'Wushu (Boys)', 2, 294, NULL, NULL, NULL),
(632, 'Wushu (Boys)', 2, 295, NULL, NULL, NULL),
(633, 'TAEKWONDO (Girls)', 2, 296, NULL, NULL, NULL),
(634, 'TAEKWONDO (Girls)', 2, 297, NULL, NULL, NULL),
(635, 'TAEKWONDO (Girls)', 2, 298, NULL, NULL, NULL),
(636, 'TAEKWONDO (Girls)', 2, 299, NULL, NULL, NULL),
(637, 'TAEKWONDO (Girls)', 2, 300, NULL, NULL, NULL),
(638, 'TAEKWONDO (Girls)', 2, 301, NULL, NULL, NULL),
(639, 'TAEKWONDO (Girls)', 2, 302, NULL, NULL, NULL),
(640, 'TAEKWONDO', 1, 303, NULL, NULL, NULL),
(641, 'KYUROGI (Boys)', 1, 304, NULL, NULL, NULL),
(642, 'TAEKWONDO (Boys)', 1, 307, NULL, NULL, NULL),
(643, 'Kyurogi Group 3 (Boys)', 1, 305, NULL, NULL, NULL),
(644, 'TAEKWONDO (Boys)', 1, 306, NULL, NULL, NULL),
(645, 'TAEKWONDO (Boys)', 1, 305, NULL, NULL, NULL),
(646, 'Arnis - Pin Weight', 2, 308, NULL, NULL, NULL),
(647, 'Arnis - Bantam Weight', 2, 309, NULL, NULL, NULL),
(648, 'Arnis - Feather Weight', 2, 310, NULL, NULL, NULL),
(650, 'Swimming (Boys)', 2, 312, NULL, NULL, NULL),
(652, 'Sepak Takraw (Boys)', 1, 314, NULL, NULL, NULL),
(653, 'Swimming (Girls)', 2, 312, NULL, NULL, NULL),
(654, 'Wrestling (Boys)', 2, 315, NULL, NULL, NULL),
(655, 'Wrestling (Boys)', 2, 316, NULL, NULL, NULL),
(656, 'Wrestling (Boys)', 2, 317, NULL, NULL, NULL),
(657, 'Wrestling (Boys)', 2, 318, NULL, NULL, NULL),
(658, 'Wrestling (Boys)', 2, 319, NULL, NULL, NULL),
(659, 'Wrestling (Boys)', 2, 320, NULL, NULL, NULL),
(660, 'Wrestling (Boys)', 2, 321, NULL, NULL, NULL),
(661, 'Wrestling (Boys)', 2, 322, NULL, NULL, NULL),
(662, 'Wrestling (Girls)', 2, 323, NULL, NULL, NULL),
(663, 'Wrestling (Girls)', 2, 324, NULL, NULL, NULL),
(664, 'Wrestling (Girls)', 2, 325, NULL, NULL, NULL),
(665, 'Wrestling (Girls)', 2, 326, NULL, NULL, NULL),
(666, 'Wrestling (Girls)', 2, 327, NULL, NULL, NULL),
(667, 'Wrestling (Girls)', 2, 328, NULL, NULL, NULL),
(668, 'Wrestling (Girls)', 2, 329, NULL, NULL, NULL),
(669, 'Wrestling (Girls)', 2, 330, NULL, NULL, NULL),
(670, 'Sepak Takraw (Boys)', 2, 331, NULL, NULL, NULL),
(671, 'Sepak Takraw (Girls)', 2, 332, NULL, NULL, NULL),
(672, 'Arnis - Halflight Weight (Boys)', 2, 333, NULL, NULL, NULL),
(673, 'Arnis Pin Weight (Girls)', 2, 334, NULL, NULL, NULL),
(674, 'Arnis - Bantam Weight', 2, 335, NULL, NULL, NULL),
(675, 'Arnis - Feather Weight (Girls)', 2, 336, NULL, NULL, NULL),
(676, 'Arnis - Extralight Weight (Girls)', 2, 337, NULL, NULL, NULL),
(677, 'Arnis - Halflight Weight (Girls)', 2, 338, NULL, NULL, NULL),
(678, 'Archery - Mixed Team Olympic Round', 2, NULL, NULL, NULL, NULL),
(680, 'Archery (Girls)', 2, 340, NULL, NULL, NULL),
(681, 'Archery (Girls)', 2, 341, NULL, NULL, NULL),
(682, 'Pencak Silat (Boys)', 2, 342, NULL, NULL, NULL),
(683, 'Pencak Silat (Boys)', 2, 278, NULL, NULL, NULL),
(684, 'Pencak Silat (Boys)', 2, 277, NULL, NULL, NULL),
(685, 'Pencak Silat (Boys)', 2, 276, NULL, NULL, NULL),
(686, 'Pencak Silat (Boys)', 2, 275, NULL, NULL, NULL),
(687, 'Boxing', 2, 351, NULL, NULL, NULL),
(688, 'Boxing', 2, 352, NULL, NULL, NULL),
(689, 'Boxing', 2, 353, NULL, NULL, NULL),
(690, 'Boxing', 2, 354, NULL, NULL, NULL),
(691, 'Boxing', 2, 355, NULL, NULL, NULL),
(692, 'Boxing', 2, 357, NULL, NULL, NULL),
(693, 'Archery (Boys)', 2, 340, NULL, NULL, NULL),
(694, 'Rhythmic Gymnastics', 2, 67, NULL, NULL, NULL),
(695, 'Archery (Boys)', 2, 341, NULL, NULL, NULL),
(696, 'Arnis - Extralight Weight (Boys)', 2, 349, NULL, NULL, NULL),
(697, 'Swimming (Boys)', 2, 350, NULL, NULL, NULL),
(698, 'Swimming (Girls)', 2, 350, NULL, NULL, NULL),
(699, 'Boxing', 2, 358, NULL, NULL, NULL),
(700, 'Boxing', 2, 359, NULL, NULL, NULL),
(701, 'Boxing', 2, 360, NULL, NULL, NULL),
(702, 'Boxing', 2, 361, NULL, NULL, NULL),
(703, 'Boxing', 2, 362, NULL, NULL, NULL),
(704, 'Pencak Silat (Girls)', 2, 363, NULL, NULL, NULL),
(705, 'Football (Boys)', 2, NULL, NULL, NULL, NULL),
(706, 'Football (Girls)', 2, NULL, NULL, NULL, NULL),
(707, 'Football', 1, NULL, NULL, NULL, NULL),
(708, 'Basketball (Girls)', 2, 11, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meet_settings`
--

CREATE TABLE `meet_settings` (
  `id` int NOT NULL,
  `meet_title` varchar(150) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Provincial Meet',
  `meet_year` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '2025',
  `subtitle` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meet_settings`
--

INSERT INTO `meet_settings` (`id`, `meet_title`, `meet_year`, `subtitle`, `updated_at`) VALUES
(1, 'DAVRAA', '2026', 'Live results encoded by authorized officials. ', '2026-02-23 08:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `raw_results`
--

CREATE TABLE `raw_results` (
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_group` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medal` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `municipality` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings_address`
--

CREATE TABLE `settings_address` (
  `AddID` int UNSIGNED NOT NULL,
  `Province` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `City` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `Brgy` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings_address`
--

INSERT INTO `settings_address` (`AddID`, `Province`, `City`, `Brgy`, `logo`) VALUES
(83874, '', 'Davao Region', '', '5f513755dc0cfd46a95f06dca3f080dd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `technical_officials`
--

CREATE TABLE `technical_officials` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Tournament Manager','Technical Official') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Technical Official',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `event_id` int UNSIGNED DEFAULT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_group` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int UNSIGNED NOT NULL,
  `IDNumber` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `position` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fName` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mName` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lName` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'default.png',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `IDNumber`, `username`, `password`, `position`, `fName`, `mName`, `lName`, `email`, `avatar`, `is_active`, `dateCreated`) VALUES
(4, 'admin', 'admin', '$2y$10$16n4r1MQKGloMdMYYjP2fObx8.BieprFIzCuzWgsZRwUDXcVnMHHG', 'Administrator', 'System', '', 'Admin', 'admin@example.com', 'avatar_admin_1764577224.jpeg', 1, '2025-12-01 15:13:45'),
(5, '', 'sec1', '$2y$10$8tdwfC.zhjLE3QIiwjXAqulTK7Ko1hoLDEAAfAUxyj8xo0UlBc7fG', 'Administrator', 'sec1', '', 'sec1', '', 'default.png', 1, '2026-02-22 10:22:21'),
(6, '', 'sec2', '$2y$10$JPLnnKb9XPB7ea/FKcJ70u4WBpI.CX4.gPoA7u0AYLeMRXeD.38Za', 'Administrator', 'sec2', '', 'sec2', '', 'default.png', 1, '2026-02-22 10:22:52'),
(7, '', 'Zrecta911', '$2y$10$IpR4o1S6gA79AiKJFHzE1.EDo1BCOpvvQA.XwejD4Sjpns/pCnmlC', 'Administrator', 'Zairel', 'Recta', 'Agravante', 'zairel.recta@deped.gov.ph', 'default.png', 1, '2026-02-23 08:59:02'),
(8, '', 'kimmysu', '$2y$10$FapB0LIVBdYyE5bgKmTe3eZxOjSsoaGxxlgRuhdk.qUCbToBpePR6', 'Administrator', 'kimberly', 'macamay', 'sumi-og', 'kimberly.sumi-og@deped.gov.ph', 'default.png', 1, '2026-02-23 09:00:37'),
(9, '', 'Jerams', '$2y$10$Iqax8Qn0TlNnoTNI7TEnkOyLKvqqreVtgudYp/2lABzqZ3jjyPvyC', 'Administrator', 'Jeramae', 'Reyes', 'Mercado', 'jeramae.mercado@deped.gov.ph', 'default.png', 1, '2026-02-23 16:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--

CREATE TABLE `winners` (
  `id` int UNSIGNED NOT NULL,
  `event_id` int UNSIGNED DEFAULT NULL,
  `first_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` text COLLATE utf8mb4_unicode_ci,
  `last_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_group` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medal` enum('Gold','Silver','Bronze') COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipality` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` text COLLATE utf8mb4_unicode_ci,
  `coach` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`AddID`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_username` (`username`);

--
-- Indexes for table `event_categories`
--
ALTER TABLE `event_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `event_groups`
--
ALTER TABLE `event_groups`
  ADD PRIMARY KEY (`group_id`),
  ADD UNIQUE KEY `group_name` (`group_name`);

--
-- Indexes for table `event_master`
--
ALTER TABLE `event_master`
  ADD PRIMARY KEY (`event_id`),
  ADD UNIQUE KEY `uq_event_group_category` (`event_name`,`group_id`,`category_id`),
  ADD KEY `fk_eventmaster_group` (`group_id`),
  ADD KEY `fk_eventmaster_category` (`category_id`);

--
-- Indexes for table `meet_settings`
--
ALTER TABLE `meet_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings_address`
--
ALTER TABLE `settings_address`
  ADD PRIMARY KEY (`AddID`);

--
-- Indexes for table `technical_officials`
--
ALTER TABLE `technical_officials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_winners_eventmaster` (`event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `AddID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83873;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `category_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;

--
-- AUTO_INCREMENT for table `event_groups`
--
ALTER TABLE `event_groups`
  MODIFY `group_id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_master`
--
ALTER TABLE `event_master`
  MODIFY `event_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=710;

--
-- AUTO_INCREMENT for table `meet_settings`
--
ALTER TABLE `meet_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings_address`
--
ALTER TABLE `settings_address`
  MODIFY `AddID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83886;

--
-- AUTO_INCREMENT for table `technical_officials`
--
ALTER TABLE `technical_officials`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `winners`
--
ALTER TABLE `winners`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2808;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_master`
--
ALTER TABLE `event_master`
  ADD CONSTRAINT `fk_eventmaster_category` FOREIGN KEY (`category_id`) REFERENCES `event_categories` (`category_id`),
  ADD CONSTRAINT `fk_eventmaster_group` FOREIGN KEY (`group_id`) REFERENCES `event_groups` (`group_id`);

--
-- Constraints for table `winners`
--
ALTER TABLE `winners`
  ADD CONSTRAINT `fk_winners_eventmaster` FOREIGN KEY (`event_id`) REFERENCES `event_master` (`event_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
