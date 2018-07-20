-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 20, 2018 at 03:38 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fcda`
--

-- --------------------------------------------------------

--
-- Table structure for table `beneficiaries`
--

DROP TABLE IF EXISTS `beneficiaries`;
CREATE TABLE IF NOT EXISTS `beneficiaries` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wives_total` int(11) NOT NULL DEFAULT '1',
  `children_total` int(11) NOT NULL DEFAULT '0',
  `occupations_id` int(10) UNSIGNED NOT NULL,
  `tribe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `household_head` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `household_head_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lgas_id` int(10) UNSIGNED NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `states_id` int(10) UNSIGNED NOT NULL,
  `household_size` enum('1 - 2','3 - 6','7 - 14','15 - 20','Over 20') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `beneficiaries_created_by_foreign` (`created_by`),
  KEY `beneficiaries_occupations_id_foreign` (`occupations_id`),
  KEY `beneficiaries_lgas_id_foreign` (`lgas_id`),
  KEY `beneficiaries_states_id_foreign` (`states_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beneficiaries`
--

INSERT INTO `beneficiaries` (`id`, `fname`, `lname`, `oname`, `gender`, `dob`, `phone`, `email`, `wives_total`, `children_total`, `occupations_id`, `tribe`, `household_head`, `household_head_photo`, `street`, `lgas_id`, `city`, `states_id`, `household_size`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Edythe Bins', 'Mr. Pietro Blanda IV', 'Tom Frami DVM', 0, '1997-09-11', '+1359329030216', 'pedro.white@hotmail.com', 1665, 324, 1, 'Aagun', 'Prof. Antwon Breitenberg', 'https://lorempixel.com/80/80/?12828', '23814 Tyreek Mountain', 647, 'Paxtonstad', 29, '3 - 6', 21, '2018-07-20 14:13:28', '2018-07-20 14:13:28'),
(2, 'Rosina Dietrich', 'Marjolaine Cremin PhD', 'Emelia Wyman IV', 1, '1997-09-11', '+7069316782688', 'fupton@yahoo.com', 913, 925, 2, 'Yoruba', 'Dr. Elody Effertz V', 'https://lorempixel.com/80/80/?86881', '824 Noah Camp Suite 608', 154, 'West Hillary', 18, '15 - 20', 22, '2018-07-20 14:13:28', '2018-07-20 14:13:28'),
(3, 'Miss Elena Ortiz', 'Prof. Imelda Yost', 'Antonia Wuckert', 0, '1997-09-11', '+6510993453057', 'mhomenick@gmail.com', 1826, 204, 3, 'Ijebu', 'Domenica Lowe', 'https://lorempixel.com/80/80/?36886', '3781 Bernadine Spring', 665, 'Leschville', 31, '3 - 6', 23, '2018-07-20 14:13:28', '2018-07-20 14:13:28'),
(4, 'Austin Walsh', 'Georgette Connelly', 'Prof. Jany Herman', 1, '1997-09-11', '+4958391562571', 'ramona55@gmail.com', 1550, 84, 4, 'Ishekiri', 'Payton Jacobs', 'https://lorempixel.com/80/80/?86280', '28634 Robb Burg', 33, 'Simonisstad', 22, 'Over 20', 24, '2018-07-20 14:13:28', '2018-07-20 14:13:28'),
(5, 'Ms. Kaitlin Brown V', 'Brittany Hyatt', 'Mr. Weldon Bashirian', 1, '1997-09-11', '+9211291664247', 'deondre80@hotmail.com', 602, 1733, 5, 'Yoruba', 'Maia Zemlak', 'https://lorempixel.com/80/80/?22534', '1560 Clarabelle Passage Suite 540', 22, 'North Jermainton', 18, 'Over 20', 25, '2018-07-20 14:13:28', '2018-07-20 14:13:28'),
(6, 'Dr. Alexandro Hills Jr.', 'Ora Mann', 'Dr. Benny Hammes MD', 0, '1997-09-11', '+6116661460451', 'hintz.kenny@hotmail.com', 655, 1790, 6, 'Fulani', 'Dr. Claude Goodwin V', 'https://lorempixel.com/80/80/?26516', '565 Collins Cliffs', 487, 'Halvorsonshire', 31, '15 - 20', 26, '2018-07-20 14:13:30', '2018-07-20 14:13:30'),
(7, 'Rene Treutel MD', 'Margarete Wilderman', 'Haylie Dietrich DDS', 1, '1997-09-11', '+4392300120650', 'neoma.prosacco@yahoo.com', 1659, 464, 7, 'Ijebu', 'Ivy Jast', 'https://lorempixel.com/80/80/?40196', '706 Stanton Ports', 650, 'Lacyfort', 1, '15 - 20', 27, '2018-07-20 14:13:30', '2018-07-20 14:13:30'),
(8, 'Summer Frami', 'Jazmin Rodriguez', 'Prof. Duane West IV', 0, '1997-09-11', '+7520307364701', 'armand.kuhlman@hotmail.com', 1717, 1178, 8, 'Fulani', 'Lorine Lowe', 'https://lorempixel.com/80/80/?24151', '3638 Rubie Mount Apt. 682', 344, 'Jaydonborough', 28, '7 - 14', 28, '2018-07-20 14:13:30', '2018-07-20 14:13:30'),
(9, 'Carlee Denesik', 'Miss Jakayla Douglas I', 'Cassidy Wintheiser', 1, '1997-09-11', '+7211096982978', 'schmitt.herminia@yahoo.com', 33, 745, 9, 'Ijebu', 'Ozella Streich', 'https://lorempixel.com/80/80/?87429', '642 Kali Bypass Suite 370', 693, 'New Xander', 31, 'Over 20', 29, '2018-07-20 14:13:30', '2018-07-20 14:13:30'),
(10, 'Lyda Waters', 'Kareem Reinger', 'Ramiro Wuckert', 0, '1997-09-11', '+8937246320402', 'abraham.barton@yahoo.com', 1951, 640, 10, 'Aagun', 'Dr. Josue Bode MD', 'https://lorempixel.com/80/80/?14824', '4702 Hauck Pike', 268, 'Abbeyburgh', 30, 'Over 20', 30, '2018-07-20 14:13:30', '2018-07-20 14:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_addresses`
--

DROP TABLE IF EXISTS `beneficiary_addresses`;
CREATE TABLE IF NOT EXISTS `beneficiary_addresses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `beneficiaries_id` int(10) UNSIGNED NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lgas_id` int(10) UNSIGNED NOT NULL,
  `city` int(11) NOT NULL,
  `states_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_bios`
--

DROP TABLE IF EXISTS `beneficiary_bios`;
CREATE TABLE IF NOT EXISTS `beneficiary_bios` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `beneficiaries_id` int(10) UNSIGNED NOT NULL,
  `rt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `li` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `beneficiary_bios_beneficiaries_id_foreign` (`beneficiaries_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_dependents`
--

DROP TABLE IF EXISTS `beneficiary_dependents`;
CREATE TABLE IF NOT EXISTS `beneficiary_dependents` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `beneficiaries_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `beneficiary_dependents_beneficiaries_id_foreign` (`beneficiaries_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_details`
--

DROP TABLE IF EXISTS `beneficiary_details`;
CREATE TABLE IF NOT EXISTS `beneficiary_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `beneficiaries_id` int(10) UNSIGNED NOT NULL,
  `wives_total` int(11) NOT NULL DEFAULT '1',
  `children_total` int(11) NOT NULL DEFAULT '0',
  `occupations_id` int(10) UNSIGNED NOT NULL,
  `tribe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `household_size` enum('1 - 2','3 - 6','7 - 14','15 - 20','Over 20') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crop_grades`
--

DROP TABLE IF EXISTS `crop_grades`;
CREATE TABLE IF NOT EXISTS `crop_grades` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `crop` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crop_property_datas`
--

DROP TABLE IF EXISTS `crop_property_datas`;
CREATE TABLE IF NOT EXISTS `crop_property_datas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double(8,2) NOT NULL,
  `crop_grades_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `crop_property_datas_crop_grades_id_foreign` (`crop_grades_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lgas`
--

DROP TABLE IF EXISTS `lgas`;
CREATE TABLE IF NOT EXISTS `lgas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=775 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lgas`
--

INSERT INTO `lgas` (`id`, `lga`, `state_id`, `created_at`, `updated_at`) VALUES
(1, 'adam', 8, NULL, NULL),
(2, 'Abaji', 15, NULL, NULL),
(3, 'Abak', 3, NULL, NULL),
(4, 'Abakaliki', 11, NULL, NULL),
(5, 'Aba North', 1, NULL, NULL),
(6, 'Aba South', 1, NULL, NULL),
(7, 'Abeokuta North', 28, NULL, NULL),
(8, 'Abeokuta South', 28, NULL, NULL),
(9, 'Abi', 9, NULL, NULL),
(10, 'Aboh Mbaise', 17, NULL, NULL),
(11, 'Abua/Odual', 33, NULL, NULL),
(12, 'Adavi', 23, NULL, NULL),
(13, 'Ado Ekiti', 13, NULL, NULL),
(14, 'Ado-Odo/Ota', 28, NULL, NULL),
(15, 'Afijio', 31, NULL, NULL),
(16, 'Afikpo North', 11, NULL, NULL),
(17, 'Afikpo South (Edda)', 11, NULL, NULL),
(18, 'Agaie', 27, NULL, NULL),
(19, 'Agatu', 7, NULL, NULL),
(20, 'Agwara', 27, NULL, NULL),
(21, 'Agege', 25, NULL, NULL),
(22, 'Aguata', 4, NULL, NULL),
(23, 'Ahiazu Mbaise', 17, NULL, NULL),
(24, 'Ahoada East', 33, NULL, NULL),
(25, 'Ahoada West', 33, NULL, NULL),
(26, 'Ajaokuta', 23, NULL, NULL),
(27, 'Ajeromi-Ifelodun', 25, NULL, NULL),
(28, 'Ajingi', 20, NULL, NULL),
(29, 'Akamkpa', 9, NULL, NULL),
(30, 'Akinyele', 31, NULL, NULL),
(31, 'Akko', 16, NULL, NULL),
(32, 'Akoko-Edo', 12, NULL, NULL),
(33, 'Akoko North-East', 29, NULL, NULL),
(34, 'Akoko North-West', 29, NULL, NULL),
(35, 'Akoko South-West', 29, NULL, NULL),
(36, 'Akoko South-East', 29, NULL, NULL),
(37, 'Akpabuyo', 9, NULL, NULL),
(38, 'Akuku-Toru', 33, NULL, NULL),
(39, 'Akure North', 29, NULL, NULL),
(40, 'Akure South', 29, NULL, NULL),
(41, 'Akwanga', 26, NULL, NULL),
(42, 'Albasu', 20, NULL, NULL),
(43, 'Aleiro', 22, NULL, NULL),
(44, 'Alimosho', 25, NULL, NULL),
(45, 'Alkaleri', 5, NULL, NULL),
(46, 'Amuwo-Odofin', 25, NULL, NULL),
(47, 'Anambra East', 4, NULL, NULL),
(48, 'Anambra West', 4, NULL, NULL),
(49, 'Anaocha', 4, NULL, NULL),
(50, 'Andoni', 33, NULL, NULL),
(51, 'Aninri', 14, NULL, NULL),
(52, 'Aniocha North', 10, NULL, NULL),
(53, 'Aniocha South', 10, NULL, NULL),
(54, 'Anka', 37, NULL, NULL),
(55, 'Ankpa', 23, NULL, NULL),
(56, 'Apa', 7, NULL, NULL),
(57, 'Apapa', 25, NULL, NULL),
(58, 'Ado', 7, NULL, NULL),
(59, 'Ardo Kola', 35, NULL, NULL),
(60, 'Arewa Dandi', 22, NULL, NULL),
(61, 'Argungu', 22, NULL, NULL),
(62, 'Arochukwu', 1, NULL, NULL),
(63, 'Asa', 24, NULL, NULL),
(64, 'Asari-Toru', 33, NULL, NULL),
(65, 'Askira/Uba', 8, NULL, NULL),
(66, 'Atakunmosa East', 30, NULL, NULL),
(67, 'Atakunmosa West', 30, NULL, NULL),
(68, 'Atiba', 31, NULL, NULL),
(69, 'Atisbo', 31, NULL, NULL),
(70, 'Augie', 22, NULL, NULL),
(71, 'Auyo', 18, NULL, NULL),
(72, 'Awe', 26, NULL, NULL),
(73, 'Awgu', 14, NULL, NULL),
(74, 'Awka North', 4, NULL, NULL),
(75, 'Awka South', 4, NULL, NULL),
(76, 'Ayamelum', 4, NULL, NULL),
(77, 'Aiyedaade', 30, NULL, NULL),
(78, 'Aiyedire', 30, NULL, NULL),
(79, 'Babura', 18, NULL, NULL),
(80, 'Badagry', 25, NULL, NULL),
(81, 'Bagudo', 22, NULL, NULL),
(82, 'Bagwai', 20, NULL, NULL),
(83, 'Bakassi', 9, NULL, NULL),
(84, 'Bokkos', 32, NULL, NULL),
(85, 'Bakori', 21, NULL, NULL),
(86, 'Bakura', 37, NULL, NULL),
(87, 'Balanga', 16, NULL, NULL),
(88, 'Bali', 35, NULL, NULL),
(89, 'Bama', 8, NULL, NULL),
(90, 'Bade', 36, NULL, NULL),
(91, 'Barkin Ladi', 32, NULL, NULL),
(92, 'Baruten', 24, NULL, NULL),
(93, 'Bassa', 23, NULL, NULL),
(94, 'Bassa', 32, NULL, NULL),
(95, 'Batagarawa', 21, NULL, NULL),
(96, 'Batsari', 21, NULL, NULL),
(97, 'Bauchi', 5, NULL, NULL),
(98, 'Baure', 21, NULL, NULL),
(99, 'Bayo', 8, NULL, NULL),
(100, 'Bebeji', 20, NULL, NULL),
(101, 'Bekwarra', 9, NULL, NULL),
(102, 'Bende', 1, NULL, NULL),
(103, 'Biase', 9, NULL, NULL),
(104, 'Bichi', 20, NULL, NULL),
(105, 'Bida', 27, NULL, NULL),
(106, 'Billiri', 16, NULL, NULL),
(107, 'Bindawa', 21, NULL, NULL),
(108, 'Binji', 34, NULL, NULL),
(109, 'Biriniwa', 18, NULL, NULL),
(110, 'Birnin Gwari', 19, NULL, NULL),
(111, 'Birnin Kebbi', 22, NULL, NULL),
(112, 'Birnin Kudu', 18, NULL, NULL),
(113, 'Birnin Magaji/Kiyaw', 37, NULL, NULL),
(114, 'Biu', 8, NULL, NULL),
(115, 'Bodinga', 34, NULL, NULL),
(116, 'Bogoro', 5, NULL, NULL),
(117, 'Boki', 9, NULL, NULL),
(118, 'Boluwaduro', 30, NULL, NULL),
(119, 'Bomadi', 10, NULL, NULL),
(120, 'Bonny', 33, NULL, NULL),
(121, 'Borgu', 27, NULL, NULL),
(122, 'Boripe', 30, NULL, NULL),
(123, 'Bursari', 36, NULL, NULL),
(124, 'Bosso', 27, NULL, NULL),
(125, 'Brass', 6, NULL, NULL),
(126, 'Buji', 18, NULL, NULL),
(127, 'Bukkuyum', 37, NULL, NULL),
(128, 'Buruku', 7, NULL, NULL),
(129, 'Bungudu', 37, NULL, NULL),
(130, 'Bunkure', 20, NULL, NULL),
(131, 'Bunza', 22, NULL, NULL),
(132, 'Burutu', 10, NULL, NULL),
(133, 'Bwari', 15, NULL, NULL),
(134, 'Calabar Municipal', 9, NULL, NULL),
(135, 'Calabar South', 9, NULL, NULL),
(136, 'Chanchaga', 27, NULL, NULL),
(137, 'Charanchi', 21, NULL, NULL),
(138, 'Chibok', 8, NULL, NULL),
(139, 'Chikun', 19, NULL, NULL),
(140, 'Dala', 20, NULL, NULL),
(141, 'Damaturu', 36, NULL, NULL),
(142, 'Damban', 5, NULL, NULL),
(143, 'Dambatta', 20, NULL, NULL),
(144, 'Damboa', 8, NULL, NULL),
(145, 'Dandi', 22, NULL, NULL),
(146, 'Dandume', 21, NULL, NULL),
(147, 'Dange Shuni', 34, NULL, NULL),
(148, 'Danja', 21, NULL, NULL),
(149, 'Dan Musa', 21, NULL, NULL),
(150, 'Darazo', 5, NULL, NULL),
(151, 'Dass', 5, NULL, NULL),
(152, 'Daura', 21, NULL, NULL),
(153, 'Dawakin Kudu', 20, NULL, NULL),
(154, 'Dawakin Tofa', 20, NULL, NULL),
(155, 'Degema', 33, NULL, NULL),
(156, 'Dekina', 23, NULL, NULL),
(157, 'Demsa', 2, NULL, NULL),
(158, 'Dikwa', 8, NULL, NULL),
(159, 'Doguwa', 20, NULL, NULL),
(160, 'Doma', 26, NULL, NULL),
(161, 'Donga', 35, NULL, NULL),
(162, 'Dukku', 16, NULL, NULL),
(163, 'Dunukofia', 4, NULL, NULL),
(164, 'Dutse', 18, NULL, NULL),
(165, 'Dutsi', 21, NULL, NULL),
(166, 'Dutsin Ma', 21, NULL, NULL),
(167, 'Eastern Obolo', 3, NULL, NULL),
(168, 'Ebonyi', 11, NULL, NULL),
(169, 'Edati', 27, NULL, NULL),
(170, 'Ede North', 30, NULL, NULL),
(171, 'Ede South', 30, NULL, NULL),
(172, 'Edu', 24, NULL, NULL),
(173, 'Ife Central', 30, NULL, NULL),
(174, 'Ife East', 30, NULL, NULL),
(175, 'Ife North', 30, NULL, NULL),
(176, 'Ife South', 30, NULL, NULL),
(177, 'Efon', 13, NULL, NULL),
(178, 'Yewa North', 28, NULL, NULL),
(179, 'Yewa South', 28, NULL, NULL),
(180, 'Egbeda', 31, NULL, NULL),
(181, 'Egbedore', 30, NULL, NULL),
(182, 'Egor', 12, NULL, NULL),
(183, 'Ehime Mbano', 17, NULL, NULL),
(184, 'Ejigbo', 30, NULL, NULL),
(185, 'Ekeremor', 6, NULL, NULL),
(186, 'Eket', 3, NULL, NULL),
(187, 'Ekiti', 24, NULL, NULL),
(188, 'Ekiti East', 13, NULL, NULL),
(189, 'Ekiti South-West', 13, NULL, NULL),
(190, 'Ekiti West', 13, NULL, NULL),
(191, 'Ekwusigo', 4, NULL, NULL),
(192, 'Eleme', 33, NULL, NULL),
(193, 'Emuoha', 33, NULL, NULL),
(194, 'Emure', 13, NULL, NULL),
(195, 'Enugu East', 14, NULL, NULL),
(196, 'Enugu North', 14, NULL, NULL),
(197, 'Enugu South', 14, NULL, NULL),
(198, 'Epe', 25, NULL, NULL),
(199, 'Esan Central', 12, NULL, NULL),
(200, 'Esan North-East', 12, NULL, NULL),
(201, 'Esan South-East', 12, NULL, NULL),
(202, 'Esan West', 12, NULL, NULL),
(203, 'Ese Odo', 29, NULL, NULL),
(204, 'Esit Eket', 3, NULL, NULL),
(205, 'Essien Udim', 3, NULL, NULL),
(206, 'Etche', 33, NULL, NULL),
(207, 'Ethiope East', 10, NULL, NULL),
(208, 'Ethiope West', 10, NULL, NULL),
(209, 'Etim Ekpo', 3, NULL, NULL),
(210, 'Etinan', 3, NULL, NULL),
(211, 'Eti Osa', 25, NULL, NULL),
(212, 'Etsako Central', 12, NULL, NULL),
(213, 'Etsako East', 12, NULL, NULL),
(214, 'Etsako West', 12, NULL, NULL),
(215, 'Etung', 9, NULL, NULL),
(216, 'Ewekoro', 28, NULL, NULL),
(217, 'Ezeagu', 14, NULL, NULL),
(218, 'Ezinihitte', 17, NULL, NULL),
(219, 'Ezza North', 11, NULL, NULL),
(220, 'Ezza South', 11, NULL, NULL),
(221, 'Fagge', 20, NULL, NULL),
(222, 'Fakai', 22, NULL, NULL),
(223, 'Faskari', 21, NULL, NULL),
(224, 'Fika', 36, NULL, NULL),
(225, 'Fufure', 2, NULL, NULL),
(226, 'Funakaye', 16, NULL, NULL),
(227, 'Fune', 36, NULL, NULL),
(228, 'Funtua', 21, NULL, NULL),
(229, 'Gabasawa', 20, NULL, NULL),
(230, 'Gada', 34, NULL, NULL),
(231, 'Gagarawa', 18, NULL, NULL),
(232, 'Gamawa', 5, NULL, NULL),
(233, 'Ganjuwa', 5, NULL, NULL),
(234, 'Ganye', 2, NULL, NULL),
(235, 'Garki', 18, NULL, NULL),
(236, 'Garko', 20, NULL, NULL),
(237, 'Garun Mallam', 20, NULL, NULL),
(238, 'Gashaka', 35, NULL, NULL),
(239, 'Gassol', 35, NULL, NULL),
(240, 'Gaya', 20, NULL, NULL),
(241, 'Gayuk', 2, NULL, NULL),
(242, 'Gezawa', 20, NULL, NULL),
(243, 'Gbako', 27, NULL, NULL),
(244, 'Gboko', 7, NULL, NULL),
(245, 'Gbonyin', 13, NULL, NULL),
(246, 'Geidam', 36, NULL, NULL),
(247, 'Giade', 5, NULL, NULL),
(248, 'Giwa', 19, NULL, NULL),
(249, 'Gokana', 33, NULL, NULL),
(250, 'Gombe', 16, NULL, NULL),
(251, 'Gombi', 2, NULL, NULL),
(252, 'Goronyo', 34, NULL, NULL),
(253, 'Grie', 2, NULL, NULL),
(254, 'Gubio', 8, NULL, NULL),
(255, 'Gudu', 34, NULL, NULL),
(256, 'Gujba', 36, NULL, NULL),
(257, 'Gulani', 36, NULL, NULL),
(258, 'Guma', 7, NULL, NULL),
(259, 'Gumel', 18, NULL, NULL),
(260, 'Gummi', 37, NULL, NULL),
(261, 'Gurara', 27, NULL, NULL),
(262, 'Guri', 18, NULL, NULL),
(263, 'Gusau', 37, NULL, NULL),
(264, 'Guzamala', 8, NULL, NULL),
(265, 'Gwadabawa', 34, NULL, NULL),
(266, 'Gwagwalada', 15, NULL, NULL),
(267, 'Gwale', 20, NULL, NULL),
(268, 'Gwandu', 22, NULL, NULL),
(269, 'Gwaram', 18, NULL, NULL),
(270, 'Gwarzo', 20, NULL, NULL),
(271, 'Gwer East', 7, NULL, NULL),
(272, 'Gwer West', 7, NULL, NULL),
(273, 'Gwiwa', 18, NULL, NULL),
(274, 'Gwoza', 8, NULL, NULL),
(275, 'Hadejia', 18, NULL, NULL),
(276, 'Hawul', 8, NULL, NULL),
(277, 'Hong', 2, NULL, NULL),
(278, 'Ibadan North', 31, NULL, NULL),
(279, 'Ibadan North-East', 31, NULL, NULL),
(280, 'Ibadan North-West', 31, NULL, NULL),
(281, 'Ibadan South-East', 31, NULL, NULL),
(282, 'Ibadan South-West', 31, NULL, NULL),
(283, 'Ibaji', 23, NULL, NULL),
(284, 'Ibarapa Central', 31, NULL, NULL),
(285, 'Ibarapa East', 31, NULL, NULL),
(286, 'Ibarapa North', 31, NULL, NULL),
(287, 'Ibeju-Lekki', 25, NULL, NULL),
(288, 'Ibeno', 3, NULL, NULL),
(289, 'Ibesikpo Asutan', 3, NULL, NULL),
(290, 'Ibi', 35, NULL, NULL),
(291, 'Ibiono-Ibom', 3, NULL, NULL),
(292, 'Idah', 23, NULL, NULL),
(293, 'Idanre', 29, NULL, NULL),
(294, 'Ideato North', 17, NULL, NULL),
(295, 'Ideato South', 17, NULL, NULL),
(296, 'Idemili North', 4, NULL, NULL),
(297, 'Idemili South', 4, NULL, NULL),
(298, 'Ido', 31, NULL, NULL),
(299, 'Ido Osi', 13, NULL, NULL),
(300, 'Ifako-Ijaiye', 25, NULL, NULL),
(301, 'Ifedayo', 30, NULL, NULL),
(302, 'Ifedore', 29, NULL, NULL),
(303, 'Ifelodun', 24, NULL, NULL),
(304, 'Ifelodun', 30, NULL, NULL),
(305, 'Ifo', 28, NULL, NULL),
(306, 'Igabi', 19, NULL, NULL),
(307, 'Igalamela Odolu', 23, NULL, NULL),
(308, 'Igbo Etiti', 14, NULL, NULL),
(309, 'Igbo Eze North', 14, NULL, NULL),
(310, 'Igbo Eze South', 14, NULL, NULL),
(311, 'Igueben', 12, NULL, NULL),
(312, 'Ihiala', 4, NULL, NULL),
(313, 'Ihitte/Uboma', 17, NULL, NULL),
(314, 'Ilaje', 29, NULL, NULL),
(315, 'Ijebu East', 28, NULL, NULL),
(316, 'Ijebu North', 28, NULL, NULL),
(317, 'Ijebu North East', 28, NULL, NULL),
(318, 'Ijebu Ode', 28, NULL, NULL),
(319, 'Ijero', 13, NULL, NULL),
(320, 'Ijumu', 23, NULL, NULL),
(321, 'Ika', 3, NULL, NULL),
(322, 'Ika North East', 10, NULL, NULL),
(323, 'Ikara', 19, NULL, NULL),
(324, 'Ika South', 10, NULL, NULL),
(325, 'Ikeduru', 17, NULL, NULL),
(326, 'Ikeja', 25, NULL, NULL),
(327, 'Ikenne', 28, NULL, NULL),
(328, 'Ikere', 13, NULL, NULL),
(329, 'Ikole', 13, NULL, NULL),
(330, 'Ikom', 9, NULL, NULL),
(331, 'Ikono', 3, NULL, NULL),
(332, 'Ikorodu', 25, NULL, NULL),
(333, 'Ikot Abasi', 3, NULL, NULL),
(334, 'Ikot Ekpene', 3, NULL, NULL),
(335, 'Ikpoba Okha', 12, NULL, NULL),
(336, 'Ikwerre', 33, NULL, NULL),
(337, 'Ikwo', 11, NULL, NULL),
(338, 'Ikwuano', 1, NULL, NULL),
(339, 'Ila', 30, NULL, NULL),
(340, 'Ilejemeje', 13, NULL, NULL),
(341, 'Ile Oluji/Okeigbo', 29, NULL, NULL),
(342, 'Ilesa East', 30, NULL, NULL),
(343, 'Ilesa West', 30, NULL, NULL),
(344, 'Illela', 34, NULL, NULL),
(345, 'Ilorin East', 24, NULL, NULL),
(346, 'Ilorin South', 24, NULL, NULL),
(347, 'Ilorin West', 24, NULL, NULL),
(348, 'Imeko Afon', 28, NULL, NULL),
(349, 'Ingawa', 21, NULL, NULL),
(350, 'Ini', 3, NULL, NULL),
(351, 'Ipokia', 28, NULL, NULL),
(352, 'Irele', 29, NULL, NULL),
(353, 'Irepo', 31, NULL, NULL),
(354, 'Irepodun', 24, NULL, NULL),
(355, 'Irepodun', 30, NULL, NULL),
(356, 'Irepodun/Ifelodun', 13, NULL, NULL),
(357, 'Irewole', 30, NULL, NULL),
(358, 'Isa', 34, NULL, NULL),
(359, 'Ise/Orun', 13, NULL, NULL),
(360, 'Iseyin', 31, NULL, NULL),
(361, 'Ishielu', 11, NULL, NULL),
(362, 'Isiala Mbano', 17, NULL, NULL),
(363, 'Isiala Ngwa North', 1, NULL, NULL),
(364, 'Isiala Ngwa South', 1, NULL, NULL),
(365, 'Isin', 24, NULL, NULL),
(366, 'Isi Uzo', 14, NULL, NULL),
(367, 'Isokan', 30, NULL, NULL),
(368, 'Isoko North', 10, NULL, NULL),
(369, 'Isoko South', 10, NULL, NULL),
(370, 'Isu', 17, NULL, NULL),
(371, 'Isuikwuato', 1, NULL, NULL),
(372, 'Itas/Gadau', 5, NULL, NULL),
(373, 'Itesiwaju', 31, NULL, NULL),
(374, 'Itu', 3, NULL, NULL),
(375, 'Ivo', 11, NULL, NULL),
(376, 'Iwajowa', 31, NULL, NULL),
(377, 'Iwo', 30, NULL, NULL),
(378, 'Izzi', 11, NULL, NULL),
(379, 'Jaba', 19, NULL, NULL),
(380, 'Jada', 2, NULL, NULL),
(381, 'Jahun', 18, NULL, NULL),
(382, 'Jakusko', 36, NULL, NULL),
(383, 'Jalingo', 35, NULL, NULL),
(384, 'Jama\'are', 5, NULL, NULL),
(385, 'Jega', 22, NULL, NULL),
(386, 'Jema\'a', 19, NULL, NULL),
(387, 'Jere', 8, NULL, NULL),
(388, 'Jibia', 21, NULL, NULL),
(389, 'Jos East', 32, NULL, NULL),
(390, 'Jos North', 32, NULL, NULL),
(391, 'Jos South', 32, NULL, NULL),
(392, 'Kabba/Bunu', 23, NULL, NULL),
(393, 'Kabo', 20, NULL, NULL),
(394, 'Kachia', 19, NULL, NULL),
(395, 'Kaduna North', 19, NULL, NULL),
(396, 'Kaduna South', 19, NULL, NULL),
(397, 'Kafin Hausa', 18, NULL, NULL),
(398, 'Kafur', 21, NULL, NULL),
(399, 'Kaga', 8, NULL, NULL),
(400, 'Kagarko', 19, NULL, NULL),
(401, 'Kaiama', 24, NULL, NULL),
(402, 'Kaita', 21, NULL, NULL),
(403, 'Kajola', 31, NULL, NULL),
(404, 'Kajuru', 19, NULL, NULL),
(405, 'Kala/Balge', 8, NULL, NULL),
(406, 'Kalgo', 22, NULL, NULL),
(407, 'Kaltungo', 16, NULL, NULL),
(408, 'Kanam', 32, NULL, NULL),
(409, 'Kankara', 21, NULL, NULL),
(410, 'Kanke', 32, NULL, NULL),
(411, 'Kankia', 21, NULL, NULL),
(412, 'Kano Municipal', 20, NULL, NULL),
(413, 'Karasuwa', 36, NULL, NULL),
(414, 'Karaye', 20, NULL, NULL),
(415, 'Karim Lamido', 35, NULL, NULL),
(416, 'Karu', 26, NULL, NULL),
(417, 'Katagum', 5, NULL, NULL),
(418, 'Katcha', 27, NULL, NULL),
(419, 'Katsina', 21, NULL, NULL),
(420, 'Katsina-Ala', 7, NULL, NULL),
(421, 'Kaura', 19, NULL, NULL),
(422, 'Kaura Namoda', 37, NULL, NULL),
(423, 'Kauru', 19, NULL, NULL),
(424, 'Kazaure', 18, NULL, NULL),
(425, 'Keana', 26, NULL, NULL),
(426, 'Kebbe', 34, NULL, NULL),
(427, 'Keffi', 26, NULL, NULL),
(428, 'Khana', 33, NULL, NULL),
(429, 'Kibiya', 20, NULL, NULL),
(430, 'Kirfi', 5, NULL, NULL),
(431, 'Kiri Kasama', 18, NULL, NULL),
(432, 'Kiru', 20, NULL, NULL),
(433, 'Kiyawa', 18, NULL, NULL),
(434, 'Kogi', 23, NULL, NULL),
(435, 'Koko/Besse', 22, NULL, NULL),
(436, 'Kokona', 26, NULL, NULL),
(437, 'Kolokuma/Opokuma', 6, NULL, NULL),
(438, 'Konduga', 8, NULL, NULL),
(439, 'Konshisha', 7, NULL, NULL),
(440, 'Kontagora', 27, NULL, NULL),
(441, 'Kosofe', 25, NULL, NULL),
(442, 'Kaugama', 18, NULL, NULL),
(443, 'Kubau', 19, NULL, NULL),
(444, 'Kudan', 19, NULL, NULL),
(445, 'Kuje', 15, NULL, NULL),
(446, 'Kukawa', 8, NULL, NULL),
(447, 'Kumbotso', 20, NULL, NULL),
(448, 'Kumi', 35, NULL, NULL),
(449, 'Kunchi', 20, NULL, NULL),
(450, 'Kura', 20, NULL, NULL),
(451, 'Kurfi', 21, NULL, NULL),
(452, 'Kusada', 21, NULL, NULL),
(453, 'Kwali', 15, NULL, NULL),
(454, 'Kwande', 7, NULL, NULL),
(455, 'Kwami', 16, NULL, NULL),
(456, 'Kware', 34, NULL, NULL),
(457, 'Kwaya Kusar', 8, NULL, NULL),
(458, 'Lafia', 26, NULL, NULL),
(459, 'Lagelu', 31, NULL, NULL),
(460, 'Lagos Island', 25, NULL, NULL),
(461, 'Lagos Mainland', 25, NULL, NULL),
(462, 'Langtang South', 32, NULL, NULL),
(463, 'Langtang North', 32, NULL, NULL),
(464, 'Lapai', 27, NULL, NULL),
(465, 'Lamurde', 2, NULL, NULL),
(466, 'Lau', 35, NULL, NULL),
(467, 'Lavun', 27, NULL, NULL),
(468, 'Lere', 19, NULL, NULL),
(469, 'Logo', 7, NULL, NULL),
(470, 'Lokoja', 23, NULL, NULL),
(471, 'Machina', 36, NULL, NULL),
(472, 'Madagali', 2, NULL, NULL),
(473, 'Madobi', 20, NULL, NULL),
(474, 'Mafa', 8, NULL, NULL),
(475, 'Magama', 27, NULL, NULL),
(476, 'Magumeri', 8, NULL, NULL),
(477, 'Mai\'Adua', 21, NULL, NULL),
(478, 'Maiduguri', 8, NULL, NULL),
(479, 'Maigatari', 18, NULL, NULL),
(480, 'Maiha', 2, NULL, NULL),
(481, 'Maiyama', 22, NULL, NULL),
(482, 'Makarfi', 19, NULL, NULL),
(483, 'Makoda', 20, NULL, NULL),
(484, 'Malam Madori', 18, NULL, NULL),
(485, 'Malumfashi', 21, NULL, NULL),
(486, 'Mangu', 32, NULL, NULL),
(487, 'Mani', 21, NULL, NULL),
(488, 'Maradun', 37, NULL, NULL),
(489, 'Mariga', 27, NULL, NULL),
(490, 'Makurdi', 7, NULL, NULL),
(491, 'Marte', 8, NULL, NULL),
(492, 'Maru', 37, NULL, NULL),
(493, 'Mashegu', 27, NULL, NULL),
(494, 'Mashi', 21, NULL, NULL),
(495, 'Matazu', 21, NULL, NULL),
(496, 'Mayo Belwa', 2, NULL, NULL),
(497, 'Mbaitoli', 17, NULL, NULL),
(498, 'Mbo', 3, NULL, NULL),
(499, 'Michika', 2, NULL, NULL),
(500, 'Miga', 18, NULL, NULL),
(501, 'Mikang', 32, NULL, NULL),
(502, 'Minjibir', 20, NULL, NULL),
(503, 'Misau', 5, NULL, NULL),
(504, 'Moba', 13, NULL, NULL),
(505, 'Mobbar', 8, NULL, NULL),
(506, 'Mubi North', 2, NULL, NULL),
(507, 'Mubi South', 2, NULL, NULL),
(508, 'Mokwa', 27, NULL, NULL),
(509, 'Monguno', 8, NULL, NULL),
(510, 'Mopa Muro', 23, NULL, NULL),
(511, 'Moro', 24, NULL, NULL),
(512, 'Moya', 27, NULL, NULL),
(513, 'Mkpat-Enin', 3, NULL, NULL),
(514, 'Municipal Area Council', 15, NULL, NULL),
(515, 'Musawa', 21, NULL, NULL),
(516, 'Mushin', 25, NULL, NULL),
(517, 'Nafada', 16, NULL, NULL),
(518, 'Nangere', 36, NULL, NULL),
(519, 'Nasarawa', 20, NULL, NULL),
(520, 'Nasarawa', 26, NULL, NULL),
(521, 'Nasarawa Egon', 26, NULL, NULL),
(522, 'Ndokwa East', 10, NULL, NULL),
(523, 'Ndokwa West', 10, NULL, NULL),
(524, 'Nembe', 6, NULL, NULL),
(525, 'Ngala', 8, NULL, NULL),
(526, 'Nganzai', 8, NULL, NULL),
(527, 'Ngaski', 22, NULL, NULL),
(528, 'Ngor Okpala', 17, NULL, NULL),
(529, 'Nguru', 36, NULL, NULL),
(530, 'Ningi', 5, NULL, NULL),
(531, 'Njaba', 17, NULL, NULL),
(532, 'Njikoka', 4, NULL, NULL),
(533, 'Nkanu East', 14, NULL, NULL),
(534, 'Nkanu West', 14, NULL, NULL),
(535, 'Nkwerre', 17, NULL, NULL),
(536, 'Nnewi North', 4, NULL, NULL),
(537, 'Nnewi South', 4, NULL, NULL),
(538, 'Nsit-Atai', 3, NULL, NULL),
(539, 'Nsit-Ibom', 3, NULL, NULL),
(540, 'Nsit-Ubium', 3, NULL, NULL),
(541, 'Nsukka', 14, NULL, NULL),
(542, 'Numan', 2, NULL, NULL),
(543, 'Nwangele', 17, NULL, NULL),
(544, 'Obafemi Owode', 28, NULL, NULL),
(545, 'Obanliku', 9, NULL, NULL),
(546, 'Obi', 7, NULL, NULL),
(547, 'Obi', 26, NULL, NULL),
(548, 'Obi Ngwa', 1, NULL, NULL),
(549, 'Obio/Akpor', 33, NULL, NULL),
(550, 'Obokun', 30, NULL, NULL),
(551, 'Obot Akara', 3, NULL, NULL),
(552, 'Obowo', 17, NULL, NULL),
(553, 'Obubra', 9, NULL, NULL),
(554, 'Obudu', 9, NULL, NULL),
(555, 'Odeda', 28, NULL, NULL),
(556, 'Odigbo', 29, NULL, NULL),
(557, 'Odogbolu', 28, NULL, NULL),
(558, 'Odo Otin', 30, NULL, NULL),
(559, 'Odukpani', 9, NULL, NULL),
(560, 'Offa', 24, NULL, NULL),
(561, 'Ofu', 23, NULL, NULL),
(562, 'Ogba/Egbema/Ndoni', 33, NULL, NULL),
(563, 'Ogbadibo', 7, NULL, NULL),
(564, 'Ogbaru', 4, NULL, NULL),
(565, 'Ogbia', 6, NULL, NULL),
(566, 'Ogbomosho North', 31, NULL, NULL),
(567, 'Ogbomosho South', 31, NULL, NULL),
(568, 'Ogu/Bolo', 33, NULL, NULL),
(569, 'Ogoja', 9, NULL, NULL),
(570, 'Ogo Oluwa', 31, NULL, NULL),
(571, 'Ogori/Magongo', 23, NULL, NULL),
(572, 'Ogun Waterside', 28, NULL, NULL),
(573, 'Oguta', 17, NULL, NULL),
(574, 'Ohafia', 1, NULL, NULL),
(575, 'Ohaji/Egbema', 17, NULL, NULL),
(576, 'Ohaozara', 11, NULL, NULL),
(577, 'Ohaukwu', 11, NULL, NULL),
(578, 'Ohimini', 7, NULL, NULL),
(579, 'Orhionmwon', 12, NULL, NULL),
(580, 'Oji River', 14, NULL, NULL),
(581, 'Ojo', 25, NULL, NULL),
(582, 'Oju', 7, NULL, NULL),
(583, 'Okehi', 23, NULL, NULL),
(584, 'Okene', 23, NULL, NULL),
(585, 'Oke Ero', 24, NULL, NULL),
(586, 'Okigwe', 17, NULL, NULL),
(587, 'Okitipupa', 29, NULL, NULL),
(588, 'Okobo', 3, NULL, NULL),
(589, 'Okpe', 10, NULL, NULL),
(590, 'Okrika', 33, NULL, NULL),
(591, 'Olamaboro', 23, NULL, NULL),
(592, 'Ola Oluwa', 30, NULL, NULL),
(593, 'Olorunda', 30, NULL, NULL),
(594, 'Olorunsogo', 31, NULL, NULL),
(595, 'Oluyole', 31, NULL, NULL),
(596, 'Omala', 23, NULL, NULL),
(597, 'Omuma', 33, NULL, NULL),
(598, 'Ona Ara', 31, NULL, NULL),
(599, 'Ondo East', 29, NULL, NULL),
(600, 'Ondo West', 29, NULL, NULL),
(601, 'Onicha', 11, NULL, NULL),
(602, 'Onitsha North', 4, NULL, NULL),
(603, 'Onitsha South', 4, NULL, NULL),
(604, 'Onna', 3, NULL, NULL),
(605, 'Okpokwu', 7, NULL, NULL),
(606, 'Opobo/Nkoro', 33, NULL, NULL),
(607, 'Oredo', 12, NULL, NULL),
(608, 'Orelope', 31, NULL, NULL),
(609, 'Oriade', 30, NULL, NULL),
(610, 'Ori Ire', 31, NULL, NULL),
(611, 'Orlu', 17, NULL, NULL),
(612, 'Orolu', 30, NULL, NULL),
(613, 'Oron', 3, NULL, NULL),
(614, 'Orsu', 17, NULL, NULL),
(615, 'Oru East', 17, NULL, NULL),
(616, 'Oruk Anam', 3, NULL, NULL),
(617, 'Orumba North', 4, NULL, NULL),
(618, 'Orumba South', 4, NULL, NULL),
(619, 'Oru West', 17, NULL, NULL),
(620, 'Ose', 29, NULL, NULL),
(621, 'Oshimili North', 10, NULL, NULL),
(622, 'Oshimili South', 10, NULL, NULL),
(623, 'Oshodi-Isolo', 25, NULL, NULL),
(624, 'Osisioma', 1, NULL, NULL),
(625, 'Osogbo', 30, NULL, NULL),
(626, 'Oturkpo', 7, NULL, NULL),
(627, 'Ovia North-East', 12, NULL, NULL),
(628, 'Ovia South-West', 12, NULL, NULL),
(629, 'Owan East', 12, NULL, NULL),
(630, 'Owan West', 12, NULL, NULL),
(631, 'Owerri Municipal', 17, NULL, NULL),
(632, 'Owerri North', 17, NULL, NULL),
(633, 'Owerri West', 17, NULL, NULL),
(634, 'Owo', 29, NULL, NULL),
(635, 'Oye', 13, NULL, NULL),
(636, 'Oyi', 4, NULL, NULL),
(637, 'Oyigbo', 33, NULL, NULL),
(638, 'Oyo', 31, NULL, NULL),
(639, 'Oyo East', 31, NULL, NULL),
(640, 'Oyun', 24, NULL, NULL),
(641, 'Paikoro', 27, NULL, NULL),
(642, 'Pankshin', 32, NULL, NULL),
(643, 'Patani', 10, NULL, NULL),
(644, 'Pategi', 24, NULL, NULL),
(645, 'Port Harcourt', 33, NULL, NULL),
(646, 'Potiskum', 36, NULL, NULL),
(647, 'Qua\'an Pan', 32, NULL, NULL),
(648, 'Rabah', 34, NULL, NULL),
(649, 'Rafi', 27, NULL, NULL),
(650, 'Rano', 20, NULL, NULL),
(651, 'Remo North', 28, NULL, NULL),
(652, 'Rijau', 27, NULL, NULL),
(653, 'Rimi', 21, NULL, NULL),
(654, 'Rimin Gado', 20, NULL, NULL),
(655, 'Ringim', 18, NULL, NULL),
(656, 'Riyom', 32, NULL, NULL),
(657, 'Rogo', 20, NULL, NULL),
(658, 'Roni', 18, NULL, NULL),
(659, 'Sabon Birni', 34, NULL, NULL),
(660, 'Sabon Gari', 19, NULL, NULL),
(661, 'Sabuwa', 21, NULL, NULL),
(662, 'Safana', 21, NULL, NULL),
(663, 'Sagbama', 6, NULL, NULL),
(664, 'Sakaba', 22, NULL, NULL),
(665, 'Saki East', 31, NULL, NULL),
(666, 'Saki West', 31, NULL, NULL),
(667, 'Sandamu', 21, NULL, NULL),
(668, 'Sanga', 19, NULL, NULL),
(669, 'Sapele', 10, NULL, NULL),
(670, 'Sardauna', 35, NULL, NULL),
(671, 'Shagamu', 28, NULL, NULL),
(672, 'Shagari', 34, NULL, NULL),
(673, 'Shanga', 22, NULL, NULL),
(674, 'Shani', 8, NULL, NULL),
(675, 'Shanono', 20, NULL, NULL),
(676, 'Shelleng', 2, NULL, NULL),
(677, 'Shendam', 32, NULL, NULL),
(678, 'Shinkafi', 37, NULL, NULL),
(679, 'Shira', 5, NULL, NULL),
(680, 'Shiroro', 27, NULL, NULL),
(681, 'Shongom', 16, NULL, NULL),
(682, 'Shomolu', 25, NULL, NULL),
(683, 'Silame', 34, NULL, NULL),
(684, 'Soba', 19, NULL, NULL),
(685, 'Sokoto North', 34, NULL, NULL),
(686, 'Sokoto South', 34, NULL, NULL),
(687, 'Song', 2, NULL, NULL),
(688, 'Southern Ijaw', 6, NULL, NULL),
(689, 'Suleja', 27, NULL, NULL),
(690, 'Sule Tankarkar', 18, NULL, NULL),
(691, 'Sumaila', 20, NULL, NULL),
(692, 'Suru', 22, NULL, NULL),
(693, 'Surulere', 31, NULL, NULL),
(694, 'Surulere', 25, NULL, NULL),
(695, 'Tafa', 27, NULL, NULL),
(696, 'Tafawa Balewa', 5, NULL, NULL),
(697, 'Tai', 33, NULL, NULL),
(698, 'Takai', 20, NULL, NULL),
(699, 'Takum', 35, NULL, NULL),
(700, 'Talata Mafara', 37, NULL, NULL),
(701, 'Tambuwal', 34, NULL, NULL),
(702, 'Tangaza', 34, NULL, NULL),
(703, 'Tarauni', 20, NULL, NULL),
(704, 'Tarka', 7, NULL, NULL),
(705, 'Tarmuwa', 36, NULL, NULL),
(706, 'Taura', 18, NULL, NULL),
(707, 'Toungo', 2, NULL, NULL),
(708, 'Tofa', 20, NULL, NULL),
(709, 'Toro', 5, NULL, NULL),
(710, 'Toto', 26, NULL, NULL),
(711, 'Chafe', 37, NULL, NULL),
(712, 'Tsanyawa', 20, NULL, NULL),
(713, 'Tudun Wada', 20, NULL, NULL),
(714, 'Tureta', 34, NULL, NULL),
(715, 'Udenu', 14, NULL, NULL),
(716, 'Udi', 14, NULL, NULL),
(717, 'Udu', 10, NULL, NULL),
(718, 'Udung-Uko', 3, NULL, NULL),
(719, 'Ughelli North', 10, NULL, NULL),
(720, 'Ughelli South', 10, NULL, NULL),
(721, 'Ugwunagbo', 1, NULL, NULL),
(722, 'Uhunmwonde', 12, NULL, NULL),
(723, 'Ukanafun', 3, NULL, NULL),
(724, 'Ukum', 7, NULL, NULL),
(725, 'Ukwa East', 1, NULL, NULL),
(726, 'Ukwa West', 1, NULL, NULL),
(727, 'Ukwuani', 10, NULL, NULL),
(728, 'Umuahia North', 1, NULL, NULL),
(729, 'Umuahia South', 1, NULL, NULL),
(730, 'Umu Nneochi', 1, NULL, NULL),
(731, 'Ungogo', 20, NULL, NULL),
(732, 'Unuimo', 17, NULL, NULL),
(733, 'Uruan', 3, NULL, NULL),
(734, 'Urue-Offong/Oruko', 3, NULL, NULL),
(735, 'Ushongo', 7, NULL, NULL),
(736, 'Ussa', 35, NULL, NULL),
(737, 'Uvwie', 10, NULL, NULL),
(738, 'Uyo', 3, NULL, NULL),
(739, 'Uzo-Uwani', 14, NULL, NULL),
(740, 'Vandeikya', 7, NULL, NULL),
(741, 'Wamako', 34, NULL, NULL),
(742, 'Wamba', 26, NULL, NULL),
(743, 'Warawa', 20, NULL, NULL),
(744, 'Warji', 5, NULL, NULL),
(745, 'Warri North', 10, NULL, NULL),
(746, 'Warri South', 10, NULL, NULL),
(747, 'Warri South West', 10, NULL, NULL),
(748, 'Wasagu/Danko', 22, NULL, NULL),
(749, 'Wase', 32, NULL, NULL),
(750, 'Wudil', 20, NULL, NULL),
(751, 'Wukari', 35, NULL, NULL),
(752, 'Wurno', 34, NULL, NULL),
(753, 'Wushishi', 27, NULL, NULL),
(754, 'Yabo', 34, NULL, NULL),
(755, 'Yagba East', 23, NULL, NULL),
(756, 'Yagba West', 23, NULL, NULL),
(757, 'Yakuur', 9, NULL, NULL),
(758, 'Yala', 9, NULL, NULL),
(759, 'Yamaltu/Deba', 16, NULL, NULL),
(760, 'Yankwashi', 18, NULL, NULL),
(761, 'Yauri', 22, NULL, NULL),
(762, 'Yenagoa', 6, NULL, NULL),
(763, 'Yola North', 2, NULL, NULL),
(764, 'Yola South', 2, NULL, NULL),
(765, 'Yorro', 35, NULL, NULL),
(766, 'Yunusari', 36, NULL, NULL),
(767, 'Yusufari', 36, NULL, NULL),
(768, 'Zaki', 5, NULL, NULL),
(769, 'Zango', 21, NULL, NULL),
(770, 'Zangon Kataf', 19, NULL, NULL),
(771, 'Zaria', 19, NULL, NULL),
(772, 'Zing', 35, NULL, NULL),
(773, 'Zurmi', 37, NULL, NULL),
(774, 'Zuru', 22, NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_02_07_172606_create_roles_table', 1),
(4, '2015_02_07_172633_create_role_user_table', 1),
(5, '2015_02_07_172649_create_permissions_table', 1),
(6, '2015_02_07_172657_create_permission_role_table', 1),
(7, '2015_02_17_152439_create_permission_user_table', 1),
(8, '2015_11_30_232041_bigint_user_keys', 1),
(9, '2018_07_18_091526_create_project_locations_table', 1),
(10, '2018_07_18_091541_create_projects_table', 1),
(11, '2018_07_18_092621_create_states_table', 1),
(12, '2018_07_18_092634_create_lgas_table', 1),
(13, '2018_07_18_093055_create_beneficiaries_table', 1),
(14, '2018_07_18_093112_create_beneficiary_addresses_table', 1),
(15, '2018_07_18_093736_create_beneficiary_details_table', 1),
(16, '2018_07_18_093920_create_occupations_table', 1),
(17, '2018_07_18_094403_create_beneficiary_dependents_table', 1),
(18, '2018_07_18_094906_create_crop_property_datas_table', 1),
(19, '2018_07_18_094916_create_crop_grades_table', 1),
(20, '2018_07_18_095714_create_properties_table', 1),
(21, '2018_07_18_100416_create_beneficiary_bios_table', 1),
(22, '2018_07_18_100454_create_property_structures_table', 1),
(23, '2018_07_18_101805_create_property_crops_table', 1),
(24, '2018_07_18_105633_create_sessions_table', 1),
(25, '2018_07_18_112446_create_project_users_table', 1),
(26, '2018_07_19_135309_create_project_statuses_table', 1),
(27, '2018_07_19_154611_create_project_beneficiaries_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `occupations`
--

DROP TABLE IF EXISTS `occupations`;
CREATE TABLE IF NOT EXISTS `occupations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `occupations`
--

INSERT INTO `occupations` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Agricultural Sciences Teacher', '2018-07-20 14:13:28', '2018-07-20 14:13:28'),
(2, 'Textile Worker', '2018-07-20 14:13:28', '2018-07-20 14:13:28'),
(3, 'Public Relations Manager', '2018-07-20 14:13:28', '2018-07-20 14:13:28'),
(4, 'Manager of Weapons Specialists', '2018-07-20 14:13:28', '2018-07-20 14:13:28'),
(5, 'Automotive Mechanic', '2018-07-20 14:13:28', '2018-07-20 14:13:28'),
(6, 'Rotary Drill Operator', '2018-07-20 14:13:30', '2018-07-20 14:13:30'),
(7, 'Visual Designer', '2018-07-20 14:13:30', '2018-07-20 14:13:30'),
(8, 'Radio Mechanic', '2018-07-20 14:13:30', '2018-07-20 14:13:30'),
(9, 'Casting Machine Operator', '2018-07-20 14:13:30', '2018-07-20 14:13:30'),
(10, 'Account Manager', '2018-07-20 14:13:30', '2018-07-20 14:13:30');

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
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `inherit_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_inherit_id_index` (`inherit_id`),
  KEY `permissions_name_index` (`name`),
  KEY `permissions_slug_index` (`slug`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE IF NOT EXISTS `permission_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_user_permission_id_index` (`permission_id`),
  KEY `permission_user_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_created_by_foreign` (`created_by`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `code`, `address`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'quia doloribus facere corporis eveniet', 'FCDA/DRC/SGP/18/443', '7314 Feest Hollow\nSouth Coby, FL 16085', 11, '2018-07-20 14:13:13', '2018-07-20 14:13:13'),
(2, 'pariatur qui odio odio aut', 'FCDA/DRC/EST/18/201', '947 Erdman Trail\nWestonshire, MA 19665-4706', 12, '2018-07-20 14:13:13', '2018-07-20 14:13:13'),
(3, 'distinctio ullam mollitia consequuntur nostrum', 'FCDA/DRC/IRQ/18/102', '9059 Dooley Manors Suite 892\nThomasfurt, NV 95782-7205', 13, '2018-07-20 14:13:13', '2018-07-20 14:13:13'),
(4, 'vel quis sit sequi dolorum', 'FCDA/DRC/ITA/18/187', '332 Ava Course\nMagdalenland, CO 24316-2294', 14, '2018-07-20 14:13:13', '2018-07-20 14:13:13'),
(5, 'commodi in ipsa ea necessitatibus', 'FCDA/DRC/GUF/18/706', '162 Hegmann Neck Apt. 557\nDollyfort, WA 07489-0392', 15, '2018-07-20 14:13:13', '2018-07-20 14:13:13'),
(6, 'suscipit laborum amet explicabo ipsa', 'FCDA/DRC/GEO/18/217', '62805 Geovany Trace Apt. 465\nLake Cielo, TN 04431-8465', 16, '2018-07-20 14:13:15', '2018-07-20 14:13:15'),
(7, 'ipsa cupiditate enim sunt sit', 'FCDA/DRC/ALB/18/211', '84399 Wunsch Cape\nBrekkeborough, PA 32631-6223', 17, '2018-07-20 14:13:15', '2018-07-20 14:13:15'),
(8, 'quod ut sed omnis repellat', 'FCDA/DRC/PRT/18/300', '21932 Novella Greens\nPagacport, MT 56328', 18, '2018-07-20 14:13:15', '2018-07-20 14:13:15'),
(9, 'ut sunt eum rem qui', 'FCDA/DRC/ATF/18/686', '77284 Bruen Run\nFlorineside, AR 88525', 19, '2018-07-20 14:13:15', '2018-07-20 14:13:15'),
(10, 'sed totam est aspernatur aut', 'FCDA/DRC/GUY/18/692', '23894 Kelly Wells Suite 264\nRicotown, MS 31666', 20, '2018-07-20 14:13:15', '2018-07-20 14:13:15');

-- --------------------------------------------------------

--
-- Table structure for table `project_beneficiaries`
--

DROP TABLE IF EXISTS `project_beneficiaries`;
CREATE TABLE IF NOT EXISTS `project_beneficiaries` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` int(10) UNSIGNED NOT NULL,
  `beneficiary_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_beneficiaries_project_id_foreign` (`project_id`),
  KEY `project_beneficiaries_beneficiary_id_foreign` (`beneficiary_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_locations`
--

DROP TABLE IF EXISTS `project_locations`;
CREATE TABLE IF NOT EXISTS `project_locations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `projects_id` int(10) UNSIGNED NOT NULL,
  `lgas_id` int(10) UNSIGNED NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_locations_lgas_id_foreign` (`lgas_id`),
  KEY `project_locations_projects_id_foreign` (`projects_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_statuses`
--

DROP TABLE IF EXISTS `project_statuses`;
CREATE TABLE IF NOT EXISTS `project_statuses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_statuses`
--

INSERT INTO `project_statuses` (`id`, `project_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-07-20 14:13:13', '2018-07-20 14:13:13'),
(2, 2, 1, '2018-07-20 14:13:13', '2018-07-20 14:13:13'),
(3, 3, 1, '2018-07-20 14:13:13', '2018-07-20 14:13:13'),
(4, 4, 1, '2018-07-20 14:13:13', '2018-07-20 14:13:13'),
(5, 5, 1, '2018-07-20 14:13:13', '2018-07-20 14:13:13'),
(6, 6, 2, '2018-07-20 14:13:15', '2018-07-20 14:14:28'),
(7, 7, 1, '2018-07-20 14:13:15', '2018-07-20 14:13:15'),
(8, 8, 1, '2018-07-20 14:13:15', '2018-07-20 14:13:15'),
(9, 9, 1, '2018-07-20 14:13:15', '2018-07-20 14:13:15'),
(10, 10, 1, '2018-07-20 14:13:15', '2018-07-20 14:13:15');

-- --------------------------------------------------------

--
-- Table structure for table `project_users`
--

DROP TABLE IF EXISTS `project_users`;
CREATE TABLE IF NOT EXISTS `project_users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `users_id` int(10) UNSIGNED NOT NULL,
  `projects_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_users_users_id_foreign` (`users_id`),
  KEY `project_users_projects_id_foreign` (`projects_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `beneficiaries_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ownership` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` int(11) NOT NULL DEFAULT '0',
  `plan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_trees` int(11) NOT NULL DEFAULT '0',
  `others1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `properties_beneficiaries_id_foreign` (`beneficiaries_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_crops`
--

DROP TABLE IF EXISTS `property_crops`;
CREATE TABLE IF NOT EXISTS `property_crops` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `properties_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `size` double(8,2) NOT NULL,
  `crop_grades_id` int(10) UNSIGNED NOT NULL,
  `owner_present` int(11) NOT NULL DEFAULT '1',
  `valuation` double(8,2) NOT NULL,
  `date_of_enumeration` date NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `property_crops_properties_id_foreign` (`properties_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_structures`
--

DROP TABLE IF EXISTS `property_structures`;
CREATE TABLE IF NOT EXISTS `property_structures` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `properties_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_inspection` date NOT NULL,
  `roof` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ceiling` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wall` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `window` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `door` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fence` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_of_repairs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accomodation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proof` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valuation_of_structure` double(8,2) NOT NULL,
  `total_valuation` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `property_structures_properties_id_foreign` (`properties_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'superadmin', '1. Access Admin dashboard \r\n2. Create user account and assign them to a category  \r\n3. Change user or remove user from a category  \r\n4. View system audit trails  \r\n5. Access all user’s functionalities on the system \r\n6. View, edit and delete a user account \r\n7. View, generate and print various report types  \r\n8. Edit and correct mistakes made on field /site', '2018-07-20 14:22:52', '2018-07-20 14:22:52'),
(2, 'planning officer', 'PO', '1. Update/change account password 2. Create a project 3. Add a new beneficiary and capture biometric data of the beneficiary (Fingerprint and Face capture) 4. Capture socio-economic data by filling the socio-economic survey form for a beneficiary 5. Capture household and housing conditions data by filling the household and housing condition forms of a beneficiary  6. View and generation socio-economic reports for each beneficiaries', '2018-07-20 14:24:33', '2018-07-20 14:24:33'),
(3, 'valuation and compensation officer', 'VCO', '1. Update/change account password 2. Create a project if project does not exist 3. Capture information on crops and economic tree at the project site of beneficiary (on field using the field report interface for Valuation of Crops and Economic Trees, VCET01) 4. Generate summary report sheet on crops and economic trees for each project and its beneficiaries (see form VCET02) 5. Generate and view Valuation and Compensation report for each project and its beneficiaries', '2018-07-20 14:27:13', '2018-07-20 14:27:13'),
(4, 'valuation and compensation officer (vo-structure)', 'VO-Structure', '1. Update/change account password 2. Create a project if project does not exist \r\n3. Capture information on structure of beneficiary at the project site (on field using the field report interface for Valuation of Structure, see form VS01) 4. Generate summary report on structure for each project and its beneficiaries (see form VS02) 5. Generate and view Valuation and Compensation report for each project and its beneficiaries.', '2018-07-20 14:31:03', '2018-07-20 14:31:03'),
(5, 'monitoring and control officer', 'MCO', '1. Update/change account password 2. View all projects and beneficiary information 3. View summary report sheet on structure for each project and its beneficiaries 4. View summary report sheet on crops and economic trees for each project and its beneficiaries 5. View Valuation and Compensation report for each project and its beneficiaries', '2018-07-20 14:32:41', '2018-07-20 14:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capital` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state`, `capital`, `created_at`, `updated_at`) VALUES
(1, 'Abia', 'Umuahia', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(2, 'Adamawa', 'Yola', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(3, 'Akwa Ibom', 'Uyo', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(4, 'Anambra', 'Awka', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(5, 'Bauchi', 'Bauchi', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(6, 'Bayelsa', 'Yenagoa', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(7, 'Benue', 'Markudi', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(8, 'Borno', 'Maiduguri', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(9, 'Cross River', 'Calabar', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(10, 'Delta', 'Asaba', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(11, 'Ebonyi', 'Abakaliki', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(12, 'Edo', 'Benin City', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(13, 'Ekiti', 'Ado Ekiti', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(14, 'Enugu', 'Enugu', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(15, 'FCT', 'Abuja', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(16, 'Gombe', 'Gombe', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(17, 'Imo', 'Owerri', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(18, 'Jigawa', 'Dutse', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(19, 'Kaduna', 'Kaduna', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(20, 'Kano', 'Kano', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(21, 'Katsina', 'Katsina', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(22, 'Kebbi', 'Birnin Kebbi', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(23, 'Kogi', 'Lokoja', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(24, 'Kwara', 'Ilorin', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(25, 'Lagos', 'Ikeja', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(26, 'Nasarawa', 'Lafia', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(27, 'Niger', 'Minna', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(28, 'Ogun', 'Abeokuta', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(29, 'Ondo', 'Akure', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(30, 'Osun', 'Osogbo', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(31, 'Oyo', 'Ibadan', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(32, 'Pleatau', 'Jos', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(33, 'Rivers', 'Port Harcourt', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(34, 'Sokoto', 'Sokoto', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(35, 'Taraba', 'Jalingo', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(36, 'Yobe', 'Damaturu', '2016-11-25 06:10:36', '2016-11-25 06:10:36'),
(37, 'Zamfara', 'Gusau', '2016-11-25 06:10:36', '2016-11-25 06:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `oname`, `email`, `username`, `phone`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cade', 'Mrs.', 'Prof. Gillian Eichmann I', 'hcummerata@hotmail.com', 'Cade.Mrs.', '+1488590226031', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'OB00SzlvU3rmPw7yDeKQLN8wY67JX9VqSvLgt2FDY62K0865Pp2FsMFhYCyL', '2018-07-20 14:08:56', '2018-07-20 14:08:56'),
(2, 'Antonina', 'Vallie', 'Prof. Dino Pagac', 'hand.tiffany@yahoo.com', 'Antonina.Vallie', '+8185753849807', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'vCvffEiG2o', '2018-07-20 14:08:56', '2018-07-20 14:08:56'),
(3, 'Prof.', 'Daphne', 'Mr. Adrien Swift IV', 'writchie@gmail.com', 'Prof..Daphne', '+7185455714306', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, '70UJb1ONgw', '2018-07-20 14:08:56', '2018-07-20 14:08:56'),
(4, 'Shyanne', 'Dr.', 'Ottilie Beer', 'susanna02@hotmail.com', 'Shyanne.Dr.', '+5612997264538', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, '6PrsETBzRN', '2018-07-20 14:08:56', '2018-07-20 14:08:56'),
(5, 'Vallie', 'Mr.', 'Carley Williamson', 'leuschke.preston@gmail.com', 'Vallie.Mr.', '+6568280298715', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'm1huuhoADU', '2018-07-20 14:08:56', '2018-07-20 14:08:56'),
(6, 'Prof.', 'Nathanael', 'Hester Flatley II', 'rubye.balistreri@gmail.com', 'Prof..Nathanael', '+3037162936743', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'mMnnIVw97i', '2018-07-20 14:08:56', '2018-07-20 14:08:56'),
(7, 'Gail', 'Ms.', 'Alessandra Jacobson III', 'hackett.lucy@gmail.com', 'Gail.Ms.', '+7182421416494', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'q6lYjVhpmQ', '2018-07-20 14:08:56', '2018-07-20 14:08:56'),
(8, 'Reece', 'Lesly', 'Dr. Bret Olson DDS', 'charley.wiza@hotmail.com', 'Reece.Lesly', '+3946600739652', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'FAcSXW6XNu', '2018-07-20 14:08:56', '2018-07-20 14:08:56'),
(9, 'Johathan', 'Mrs.', 'Prudence Upton', 'lueilwitz.chyna@gmail.com', 'Johathan.Mrs.', '+6224887235066', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'NGO8jlDXi2', '2018-07-20 14:08:56', '2018-07-20 14:08:56'),
(10, 'Mrs.', 'Ms.', 'Ismael Tremblay Sr.', 'karlee.gislason@gmail.com', 'Mrs..Ms.', '+8314047735973', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'u8PZrN2LOt', '2018-07-20 14:08:56', '2018-07-20 14:08:56'),
(11, 'Nicolas', 'Abigale', 'Adriana Ryan', 'cristobal79@hotmail.com', 'Nicolas.Abigale', '+9749908026467', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'g9UY1Q6NZq', '2018-07-20 14:13:13', '2018-07-20 14:13:13'),
(12, 'Prof.', 'Prof.', 'Prof. Forrest Blanda', 'ella.west@hotmail.com', 'Prof..Prof.', '+2748704494713', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'SR3dH7MwOd', '2018-07-20 14:13:13', '2018-07-20 14:13:13'),
(13, 'Andreanne', 'Ms.', 'Titus Rogahn', 'kuvalis.juliana@yahoo.com', 'Andreanne.Ms.', '+1208110331444', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'Upk4MVQuQ1', '2018-07-20 14:13:13', '2018-07-20 14:13:13'),
(14, 'Lonnie', 'Johathan', 'Dr. Justine Herman IV', 'marianne.nicolas@yahoo.com', 'Lonnie.Johathan', '+9446550297311', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'aILpiNGumv', '2018-07-20 14:13:13', '2018-07-20 14:13:13'),
(15, 'Mitchel', 'Kyle', 'Porter Larson I', 'wshanahan@yahoo.com', 'Mitchel.Kyle', '+3710502077686', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'QAy5coy1bo', '2018-07-20 14:13:13', '2018-07-20 14:13:13'),
(16, 'Herman', 'Brooklyn', 'Elena Kub Jr.', 'jerrod.durgan@yahoo.com', 'Herman.Brooklyn', '+8466256043880', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'MD2FjQMj2D', '2018-07-20 14:13:15', '2018-07-20 14:13:15'),
(17, 'Gonzalo', 'Julianne', 'Kellie Reynolds', 'gloria80@gmail.com', 'Gonzalo.Julianne', '+8483998205819', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'VXFjIQcQjb', '2018-07-20 14:13:15', '2018-07-20 14:13:15'),
(18, 'Mitchel', 'Dr.', 'Miss Fay Bruen', 'luettgen.rahsaan@hotmail.com', 'Mitchel.Dr.', '+7492906916560', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'ncexvBfCTD', '2018-07-20 14:13:15', '2018-07-20 14:13:15'),
(19, 'Prof.', 'Emmanuelle', 'Miss Mallie Kling PhD', 'bogisich.aurelia@hotmail.com', 'Prof..Emmanuelle', '+1561556888200', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'oBsSbWEHmp', '2018-07-20 14:13:15', '2018-07-20 14:13:15'),
(20, 'Miss', 'Mr.', 'Marty Christiansen', 'elmore70@gmail.com', 'Miss.Mr.', '+7850377651175', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'WbVyrK0Vbf', '2018-07-20 14:13:15', '2018-07-20 14:13:15'),
(21, 'Eleanora', 'Valentin', 'Sarina Lakin', 'carolyne93@gmail.com', 'Eleanora.Valentin', '+5451448825570', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'wxULBoBTDV', '2018-07-20 14:13:28', '2018-07-20 14:13:28'),
(22, 'Imogene', 'Miss', 'Leonor Casper', 'stiedemann.mario@hotmail.com', 'Imogene.Miss', '+5530764120371', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'LFPpzGQUQo', '2018-07-20 14:13:28', '2018-07-20 14:13:28'),
(23, 'Prof.', 'Mrs.', 'Claude VonRueden', 'sharon.walter@hotmail.com', 'Prof..Mrs.', '+2526072054645', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, '0vJJi1Ae2l', '2018-07-20 14:13:28', '2018-07-20 14:13:28'),
(24, 'Magali', 'Prof.', 'Mrs. Dianna Vandervort', 'hunter26@yahoo.com', 'Magali.Prof.', '+1895391098238', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'HfxoLEDPWu', '2018-07-20 14:13:28', '2018-07-20 14:13:28'),
(25, 'Faye', 'Mrs.', 'Silas Kertzmann III', 'hans.rice@yahoo.com', 'Faye.Mrs.', '+5881018563896', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'H9p4hAKpwC', '2018-07-20 14:13:28', '2018-07-20 14:13:28'),
(26, 'Miss', 'Arvilla', 'Jillian Swaniawski', 'kyler.kessler@gmail.com', 'Miss.Arvilla', '+1606485993629', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'To9tMQ9siT', '2018-07-20 14:13:30', '2018-07-20 14:13:30'),
(27, 'Lavern', 'Joaquin', 'Prof. Neha Lebsack Sr.', 'zboncak.beulah@hotmail.com', 'Lavern.Joaquin', '+3456718139807', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'tRwcuvTlZ9', '2018-07-20 14:13:30', '2018-07-20 14:13:30'),
(28, 'Angeline', 'Breana', 'Ms. Jackeline Hickle DDS', 'noemie.dickens@gmail.com', 'Angeline.Breana', '+2492044093289', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'JlYHjExG0G', '2018-07-20 14:13:30', '2018-07-20 14:13:30'),
(29, 'Mr.', 'Zackery', 'Izabella Conn', 'monty59@yahoo.com', 'Mr..Zackery', '+9309025646430', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, 'T0VFtCcfyh', '2018-07-20 14:13:30', '2018-07-20 14:13:30'),
(30, 'Prof.', 'Anastacio', 'Thad Mills', 'bella.gibson@yahoo.com', 'Prof..Anastacio', '+9033294611605', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 0, '39NwFBPDsQ', '2018-07-20 14:13:30', '2018-07-20 14:13:30');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
