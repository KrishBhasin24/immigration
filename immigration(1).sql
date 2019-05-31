-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2019 at 11:04 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `immigration`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_leads`
--

CREATE TABLE `account_leads` (
  `id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `retainer_id` int(11) NOT NULL,
  `cic_file_id` varchar(200) DEFAULT NULL,
  `cic_file_date` varchar(200) DEFAULT NULL,
  `retain_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_leads`
--

INSERT INTO `account_leads` (`id`, `lead_id`, `retainer_id`, `cic_file_id`, `cic_file_date`, `retain_date`) VALUES
(3, 3, 3, 'W98601', '2019-05-19', '2019-05-22 21:25:31'),
(4, 2, 13, 'W78452', '2019-05-27', '2019-05-27 18:05:50'),
(5, 4, 3, NULL, NULL, '2019-05-17 14:59:04'),
(6, 1, 13, 'V322014895', '2019-05-20', '2019-05-23 21:35:12'),
(7, 6, 3, NULL, NULL, '2019-05-17 20:41:38'),
(8, 5, 1, NULL, NULL, '2019-05-22 16:27:22'),
(9, 8, 1, 'W89532', '2019-05-13', '2019-05-24 17:59:09'),
(10, 7, 14, NULL, NULL, '2019-05-23 20:52:12'),
(11, 9, 4, NULL, NULL, '2019-05-24 19:44:22'),
(12, 13, 1, NULL, NULL, '2019-05-28 18:12:37'),
(13, 14, 1, NULL, NULL, '2019-05-28 18:23:38'),
(14, 17, 0, NULL, NULL, '2019-05-31 14:48:50'),
(15, 16, 0, NULL, NULL, '2019-05-31 16:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Express Entry'),
(2, 'Visitor Visa'),
(3, 'Work Permit'),
(4, 'Family Class Sponsorship'),
(5, 'Study Permit');

-- --------------------------------------------------------

--
-- Table structure for table `client_remarks`
--

CREATE TABLE `client_remarks` (
  `id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `remarks_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_remarks`
--

INSERT INTO `client_remarks` (`id`, `lead_id`, `remarks`, `user_id`, `remarks_date`) VALUES
(1, 3, 'File processing ', 1, '2019-05-24 17:50:58'),
(2, 3, 'File under review.......', 1, '2019-05-24 17:50:58'),
(3, 6, 'Call client and talk about the new rules story.', 1, '2019-05-24 18:03:35'),
(4, 8, 'Please send Biomatric', 12, '2019-05-29 15:38:14'),
(5, 3, 'biomatric required', 3, '2019-05-29 16:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(250) NOT NULL,
  `telephone` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `website` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(150) NOT NULL,
  `province` varchar(150) NOT NULL,
  `postal_code` varchar(150) NOT NULL,
  `country` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `parent_id`, `name`, `telephone`, `email`, `website`, `address`, `city`, `province`, `postal_code`, `country`, `created_at`) VALUES
(1, 0, 'first company', '(456) 345-6345', 'dfg@cxc.com', 'dfsadfsadf', 'cvxzcvzx', 'brampton', 'Ontario', 'L3T4M7', 'Canada', '2019-04-26 19:16:41'),
(2, 0, 'test2', 'dfg', 'dfg@neew.com', 'dfsadfsadf', 'new hill power', 'toronto', 'Ontario', 'dfgsd', 'canada', '2019-04-26 19:16:41'),
(6, 1, 'child first company', '95623598', 'dfg@ertwe.com', 'dfsadfsadf.com', 'cvxzcvzx', 'toronto', 'ontario', 'L3S3X8', 'canada', '2019-04-26 19:16:41'),
(7, 2, 'new child', '98653236', 'qwerty@test.com', 'web@site.com', '148 main street', 'toronto', 'ontario', '653fer', 'canada', '2019-05-06 16:19:31'),
(8, 0, 'smart marketing', '9862356565', 'marketing@siiscanada.com', '', 'etobicoke', 'etobicoke', 'ontario', 'L3T4M7', 'canada', '2019-05-24 20:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(0, 'Albania'),
(1, 'India'),
(2, 'Canada'),
(3, 'Japan'),
(4, 'England'),
(5, 'Pakistan'),
(6, 'Russia'),
(7, 'USA'),
(8, 'Brazil'),
(9, 'Australia'),
(10, 'New Zealand'),
(11, 'Afganistan'),
(12, 'Chile'),
(13, 'Cuba'),
(14, 'Dominican Republic'),
(15, 'Mexico'),
(16, 'Argentina'),
(17, 'U K'),
(18, 'U A E'),
(19, 'Baharin'),
(20, 'Doha'),
(21, 'Qatar'),
(22, 'Saudi Arabia'),
(23, 'Iran'),
(24, 'Iraq'),
(25, 'Germany'),
(26, 'Yugoslavia'),
(27, 'Bosnia'),
(28, 'Belgium'),
(29, 'Hungry'),
(30, 'Itly'),
(31, 'France'),
(32, 'Ireland'),
(33, 'Netherland'),
(34, 'Sweden'),
(35, 'Denmark'),
(36, 'Norway'),
(37, 'Phillipines'),
(38, 'Fiji'),
(39, 'Indonesia'),
(40, 'South Africa'),
(41, 'Somalia'),
(42, 'Nigeria'),
(43, 'Hongkong'),
(45, 'Srilanka'),
(46, 'Mauritius'),
(47, 'Combodia'),
(48, 'China'),
(49, 'Egypt'),
(50, 'Bangladesh'),
(51, 'Kuwait'),
(53, 'Algeria'),
(54, 'Andorra'),
(55, 'Angola'),
(56, 'Anguilla'),
(57, 'Antigua & Barbuda'),
(58, 'Armenia'),
(59, 'Aruba'),
(60, 'Ascension'),
(61, 'Ashmore and Cartier Island'),
(62, 'Austria'),
(63, 'Azerbaijan'),
(64, 'Bahamas'),
(65, 'Bahrain'),
(66, 'Barbados'),
(67, 'Belarus'),
(68, 'Belau, Republic of (or Palau)'),
(69, 'Belize'),
(70, 'Benin'),
(71, 'Bermuda'),
(72, 'Bhutan'),
(73, 'Bolivia'),
(74, 'Bonaire'),
(75, 'Bora Bora'),
(76, 'Boznia-Herzegovina'),
(77, 'Botswana'),
(78, 'British Indian Ocean Territory'),
(79, 'Brunei'),
(80, 'Bulgaria'),
(81, 'Burkina-Faso'),
(82, 'Burma (Myanmar, Union of)'),
(83, 'Burundi'),
(84, 'Cambodia'),
(85, 'Cameroon'),
(87, 'Canary Islands'),
(88, 'Cape Verde'),
(89, 'Caroline Islands'),
(90, 'Cayman Islands'),
(91, 'Central African Republic'),
(92, 'Chad'),
(93, 'Channel Islands'),
(94, 'China (see People’s Republic of China)'),
(95, 'Choiseul'),
(96, 'Christmas Island'),
(97, 'Cocos (Keeling) Island'),
(98, 'Colombia'),
(99, 'Comoros Island'),
(100, 'Cook Island'),
(101, 'Costa Rica'),
(102, 'Croatia'),
(103, 'Curaçao'),
(104, 'Cyprus'),
(105, 'Czech Republic'),
(106, 'Democratic Republic of the Congo'),
(107, 'Djibouti'),
(108, 'Dominica'),
(109, 'East Timor'),
(110, 'Easter Island'),
(111, 'Ecuador'),
(112, 'El Salvador'),
(113, 'Equatorial Guinea'),
(114, 'Eritrea'),
(115, 'Estonia'),
(116, 'Ethiopia'),
(117, 'Falkland Islands'),
(118, 'Faroe Islands'),
(119, 'Finland'),
(120, 'French Guiana'),
(121, 'French Polynesia'),
(122, 'Gabon'),
(123, 'Gambia'),
(124, 'Gambier Island'),
(125, 'Gaza Strip (Palestinian Authority)'),
(126, 'Georgia'),
(127, 'Ghana'),
(128, 'Gibraltar'),
(129, 'Greece'),
(130, 'Greenland'),
(131, 'Grenada'),
(132, 'Guadalcanal'),
(133, 'Guadeloupe'),
(134, 'Guam'),
(135, 'Guatemala'),
(136, 'Guinea (Refugees apply in Accra)'),
(137, 'Guinea-Bissau'),
(138, 'Guyana'),
(139, 'Haiti'),
(140, 'Honduras'),
(141, 'Hong Kong'),
(142, 'Huahine'),
(143, 'Hungary'),
(144, 'Iceland'),
(145, 'Isle of Man'),
(146, 'Israel'),
(147, 'Italy'),
(148, 'Ivory Coast'),
(149, 'Jamaica'),
(150, 'Johnston Atoll'),
(151, 'Jordan'),
(152, 'Kazakhstan'),
(153, 'Kenya'),
(154, 'Kiribati'),
(155, 'Kosrae (Micronesia)'),
(156, 'Kyrgyzstan'),
(157, 'Laos'),
(158, 'Latvia'),
(159, 'Lebanon'),
(160, 'Lesotho'),
(161, 'Liberia'),
(162, 'Libya'),
(163, 'Liechtenstein'),
(164, 'Lithuania'),
(165, 'Lord Howe Island'),
(166, 'Loyalty Island'),
(167, 'Luxembourg'),
(168, 'Macao'),
(169, 'Macedonia (Former Yugoslav Republic of)'),
(170, 'Madagascar (Republic of)'),
(171, 'Maio'),
(172, 'Malawi'),
(173, 'Malaysia'),
(174, 'Maldives'),
(175, 'Mali'),
(176, 'Malta'),
(177, 'Marianas'),
(178, 'Marie-Galante'),
(179, 'Marquesas Island'),
(180, 'Marshall Island'),
(181, 'Martinique'),
(182, 'Maupiti'),
(183, 'Mauritania'),
(184, 'Micronesia (Federated States of)'),
(185, 'Midway Island'),
(186, 'Moldova'),
(187, 'Monaco'),
(188, 'Mongolia'),
(189, 'Montserrat'),
(190, 'Moorea'),
(191, 'Morocco'),
(192, 'Mozambique'),
(193, 'Myanmar, Union of (Burma)'),
(194, 'Namibia'),
(195, 'Nauru'),
(196, 'Nepal'),
(197, 'Netherlands'),
(198, 'Nevis'),
(199, 'New Caledonia'),
(200, 'New Georgia'),
(201, 'New Ireland'),
(202, 'Nicaragua'),
(203, 'Niger'),
(204, 'Niue Island'),
(205, 'Norfolk Island'),
(206, 'North Korea'),
(207, 'Northern Ireland'),
(208, 'Northern Mariana Island'),
(209, 'Oman'),
(210, 'Palau (or Republic of Belau)'),
(211, 'Palestinian Authority (West Bank & Gaza Strip)'),
(212, 'Panama'),
(213, 'Papua New Guinea'),
(214, 'Paraguay'),
(215, 'People’s Republic of China'),
(216, 'Peru'),
(217, 'Philippines'),
(218, 'Pitcairn Island'),
(219, 'Pohnpei (Micronesia)'),
(220, 'Poland'),
(221, 'Portugal (Azores, Madeira)'),
(222, 'Puerto Rico'),
(223, 'Raiatea'),
(224, 'Republic of Congo'),
(225, 'Republic of Madagascar'),
(226, 'Reunion'),
(227, 'Romania'),
(228, 'Rwanda'),
(229, 'Saba'),
(230, 'Samoa (American & Western)'),
(231, 'San Marino'),
(232, 'Santa Isabel'),
(233, 'Sao Tome and Principe'),
(234, 'Scotland'),
(235, 'Senegal'),
(236, 'Serbia-Montenegro'),
(237, 'Seychelles'),
(238, 'Shanghai'),
(239, 'Sierra Leone'),
(240, 'Singapore'),
(241, 'Slovakia'),
(242, 'Slovenia'),
(243, 'Society Archipelago'),
(244, 'Solomon Island'),
(245, 'South Korea'),
(246, 'Spain'),
(247, 'Sri Lanka'),
(248, 'St Pierre et Miquelon'),
(249, 'St. Barthelemay'),
(250, 'St. Eustatius'),
(251, 'St. Kitts'),
(252, 'St. Lucia'),
(253, 'St. Maarten/St. Martin'),
(254, 'St. Vincent and the Grenadines'),
(255, 'St. Helena'),
(256, 'Sudan'),
(257, 'Suriname'),
(258, 'Svalbard'),
(259, 'Swaziland'),
(260, 'Switzerland'),
(261, 'Syria'),
(262, 'Tahaa'),
(263, 'Tahiti'),
(264, 'Taïwan'),
(265, 'Tajikistan'),
(266, 'Tanzania'),
(267, 'Thailand'),
(268, 'Togo'),
(269, 'Tokeleau Island'),
(270, 'Tonga'),
(271, 'Tortola'),
(272, 'Trinidad & Tobago'),
(273, 'Tristan da Cunha'),
(274, 'Truk Island (Micronesia)'),
(275, 'Tuamotu Archipelago'),
(276, 'Tunisia'),
(277, 'Turkey'),
(278, 'Turkmenistan'),
(279, 'Turks & Caicos'),
(280, 'Tuvalu'),
(281, 'Uganda'),
(282, 'Ukraine'),
(283, 'United Arab Emirates'),
(284, 'Uruguay'),
(285, 'US Trust Territories of the Pacific Island'),
(286, 'United States of America'),
(287, 'Uzbekistan'),
(288, 'Vanuatu'),
(289, 'Vatican City'),
(290, 'Venezuela'),
(291, 'Vietnam'),
(292, 'Virgin Islands (British & US)'),
(293, 'Wake Island'),
(294, 'Wales'),
(295, 'Wallis & Futuna'),
(296, 'West Bank (Palestinian Authority)'),
(297, 'Western Sahara'),
(298, 'Yap Island (Micronesia)'),
(299, 'Yemen'),
(300, 'Zambia'),
(301, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `handle` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `handle`, `created_at`) VALUES
(1, 'Admin', 'admin', '2019-04-26 20:19:39'),
(2, 'Case Processing', 'case_processing', '2019-04-26 20:19:39'),
(3, 'Customer Care', 'customer_care', '2019-04-26 20:19:39'),
(4, 'Accounts', 'accounts', '2019-04-26 20:19:39'),
(5, 'Assessment', 'assessment', '2019-04-26 20:19:39'),
(6, 'Marketing', 'marketing', '2019-04-30 16:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telephone` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(200) NOT NULL,
  `province` varchar(200) NOT NULL,
  `postal_code` varchar(200) NOT NULL,
  `country` varchar(150) NOT NULL,
  `marital_status` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `reason_of_qualify` text NOT NULL,
  `special_instruction` text NOT NULL,
  `submission_deadline` varchar(250) NOT NULL,
  `source_of_lead` varchar(250) NOT NULL,
  `lead_status_id` varchar(100) NOT NULL,
  `status_changed_date` date DEFAULT NULL,
  `amount_payable` int(11) NOT NULL,
  `contract_signed` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `agent_id` int(11) NOT NULL,
  `retainer_id` int(11) NOT NULL,
  `processingAgent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `first_name`, `last_name`, `email`, `telephone`, `address`, `city`, `province`, `postal_code`, `country`, `marital_status`, `dob`, `category_id`, `sub_category_id`, `reason_of_qualify`, `special_instruction`, `submission_deadline`, `source_of_lead`, `lead_status_id`, `status_changed_date`, `amount_payable`, `contract_signed`, `client_id`, `agent_id`, `retainer_id`, `processingAgent_id`) VALUES
(1, 'Sachin', 'Sharma', 'sachine@sharma.com', '98653265986', '85 Sky drive North', 'Toronto', 'Ontario', 'L3T4M7', 'Canada', 'Married', '1991-06-19', 1, 2, 'All ready on work permit and have 4 years of experience', 'concern with me first', '2019-07-17', '1', '6', NULL, 8500, 1, NULL, 1, 13, 2),
(2, 'Rahul', 'kumar', 'rahul@kumar.com', '4379842124', '85 drive way ', 'Toronto', 'Ontario', 'L3T4M7', 'Canada', 'Engaged', '2010-05-27', 3, 7, 'No reason ', 'Client needs special treatment. lol!!!', '2019-05-31', '1', '6', '2019-05-27', 8500, 1, NULL, 1, 13, 12),
(3, 'sidhu', 'moosewala', 'sidhu@brownboy.com', '98653265986', 'Skymark drive', 'brampton', 'Ontario', 'L3T4M7', 'Canada', 'Never Married', '1991-09-11', 5, 12, 'Singer already', 'Do with the flow', '2019-06-12', '1', '6', '2019-05-29', 10000, 1, NULL, 12, 3, 12),
(4, 'Partap', 'Singh', 'partap@singh.com', '4379842124', 'hamilton road', 'Toronto', 'Ontario', 'L3T4M7', 'Canada', 'Married', '1991-02-15', 4, 10, 'normal case', 'no need', '2019-05-31', '1', '3', NULL, 5000, 1, NULL, 1, 3, 2),
(5, 'Sachin', 'Sharma', 'care@care.com', '98653265986', 'test', 'brampton', 'Ontario', 'L3T4M7', 'Bahrain', 'Married', '2006-07-12', 3, 8, 'tests', 'se tsetse tse t', '2018-06-29', '2', '4', '2019-05-27', 8000, 1, NULL, 1, 1, 2),
(6, 'express', 'kumar', 'express@care.com', '98653265986', 'df gsdf gdsf gds fgd sfg', 'Toronto', 'Ontario', 'L3T4M7', 'Canada', 'Widowed', '1993-06-23', 4, 10, 'test set se ts te', 'uhi  ityiu', '2019-06-28', '2', '5', '2019-05-29', 5200, 1, NULL, 1, 3, 12),
(7, 'User', 'kumar', 'care@care.com', '4379842124', 'sdfg sdf gsd', 'Toronto', 'Ontario', 'L3T4M7', 'Benin', 'Married', '2019-05-13', 3, 7, 'sd fasd f', 'sd fas df ', '2019-05-06', '2', '4', '2019-05-27', 5000, 1, NULL, 1, 14, 2),
(8, 'sidhu', 'Sharma', 'user@name.com', '98653265986', 'bn m,bnm', 'brampton', 'city', 'L3T4M7', 'Cambodia', 'Engaged', '2019-05-20', 4, 10, 'df asdf', 'sd fasd f', '2019-05-06', '2', '6', '2019-05-28', 8000, 1, NULL, 1, 1, 12),
(9, 'Loveleen', 'chahal', 'loveleen@chahal.com', '4379842184', 'ashebfjkhasd faskdfbkashdb', 'Toronto', 'Ontario', 'L3T4M7', 'Canada', 'Married', '1990-04-09', 1, 1, 'Already PR', 'No Special treatment', '2019-08-08', '1', '2', NULL, 8000, 1, NULL, 1, 4, 0),
(10, 'gurjyot', 'sethi', 'sethi@gurjyout.com', '9863136969', 'mohali', 'Markham', 'Ontario', 'L3T4M7', 'Canada', 'Never Married', '1992-12-08', 3, 6, '', '', '', '2', '1', NULL, 0, 0, NULL, 1, 0, 0),
(11, 'Mohal', 'lal', 'lal@lal.com', '4379842184', 'snowhill ', 'Thornhill', 'Ontario', 'L3T4M7', 'Canada', 'Never Married', '1984-12-05', 4, 10, '', '', '', '', '1', NULL, 0, 0, NULL, 1, 0, 0),
(12, '', '', 'fgd@name.com', '(   )    -    ', '', 'brampton', 'Ontario', '', '', '', '2019-05-29', 3, 5, '', '', '2019-05-29', '2', '1', NULL, 0, 0, NULL, 1, 0, 0),
(13, 'Karan', 'arjun', 'karan@arjun.com', '98653265986', 'sd aasd', 'brampton', 'Ontario', 'L3T4M7', 'Canada', 'Married', '2118-08-15', 5, 12, 'dfs gsdf ', 'gsdfgsd f', '2019-06-28', '2', '2', '2019-05-28', 5200, 1, NULL, 1, 1, 0),
(14, 'Manpreet', 'check', 'manpreet@check.com', '4379842124', 'zxc zx c', 'Thornhill', 'Ontario', 'L3T4M7', 'Canada', 'Never Married', '1993-11-11', 2, 4, 'df gdfgdf ', 'gdf gdf g', '2019-06-27', '3', '2', '2019-05-28', 9000, 1, NULL, 13, 3, 0),
(15, 'gagan deep', 'kumar', 'gagan@gmail.com', '4379842124', 'dsf dxf gsd fg', 'windsor', 'ontario', 'S3T4M7', 'Canada', 'Married', '1984-09-14', 2, 4, '', '', '2019-07-12', '2', '1', NULL, 0, 0, NULL, 12, 0, 0),
(16, 'mohan', 'kumar', 'deep@mohan.com', '(437) 984-2124', 'sdfs sdf sd', 'Toronto', 'ontario', 'L3T4M7', 'Canada', 'Married', '1985-02-01', 4, 10, '', '', '2019-07-25', '1', '2', '2019-05-31', 1000, 1, NULL, 1, 3, 0),
(17, 'gurwinder', 'singh', 'gurwinder@gmail.com', '(478) 252-3636', 'sdfsdf', 'brampton', 'ontario', 'L3T4M7', 'Canada', 'Engaged', '1998-02-01', 2, 4, 'dfgsd', 'fgsdfgs', '2019-07-25', '', '2', '2019-05-31', 2000, 1, 19, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lead_documents`
--

CREATE TABLE `lead_documents` (
  `id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `document_need` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead_documents`
--

INSERT INTO `lead_documents` (`id`, `lead_id`, `document_need`) VALUES
(3, 3, 'Please send photo');

-- --------------------------------------------------------

--
-- Table structure for table `lead_payments`
--

CREATE TABLE `lead_payments` (
  `id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `account_lead_id` int(11) NOT NULL COMMENT 'file no.',
  `current_payment` int(11) NOT NULL DEFAULT '0',
  `payment_mode` varchar(200) NOT NULL,
  `authorization_number` varchar(350) NOT NULL,
  `issued_by` varchar(250) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead_payments`
--

INSERT INTO `lead_payments` (`id`, `lead_id`, `account_lead_id`, `current_payment`, `payment_mode`, `authorization_number`, `issued_by`, `payment_date`) VALUES
(1, 4, 5, 390, 'Cash', '123', 'Manpreet Singh', '2019-05-21 20:17:34'),
(2, 1, 6, 800, 'Draft', '98652', 'Self', '2019-05-21 19:00:14'),
(3, 1, 6, 200, 'Credit', 'auth#986', 'Puneet', '2019-05-21 19:02:26'),
(4, 4, 5, 400, 'Credit', 'auth #888', 'Self', '2019-05-22 16:28:38'),
(5, 6, 7, 500, 'Cash', 'auth #888', 'Self', '2019-05-22 22:17:57'),
(6, 6, 7, 200, 'Cash', '', 'Self', '2019-05-23 16:42:33'),
(7, 1, 6, 7700, 'Cash', 'auth#9863', 'Puneet', '2019-05-23 17:52:24'),
(8, 8, 9, 520, 'Cash', '', 'Self', '2019-05-27 17:47:04'),
(9, 5, 8, 2000, 'Cheque', 'auth #8889', 'Puneet', '2019-05-24 18:02:01'),
(10, 9, 11, 2500, 'Cash', '', 'Puneet', '2019-05-24 19:44:54'),
(11, 2, 4, 250, 'Cash', '', 'Puneet', '2019-05-24 21:12:07'),
(12, 14, 13, 2000, 'Cash', '', 'Self', '2019-05-29 17:05:24'),
(13, 13, 12, 2000, 'Cashier Cheque', 'chc#965236', 'Puneet', '2019-05-30 19:31:28');

-- --------------------------------------------------------

--
-- Table structure for table `lead_refunds`
--

CREATE TABLE `lead_refunds` (
  `id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `account_lead_id` int(11) NOT NULL COMMENT 'file no.',
  `refund_payment` int(11) NOT NULL,
  `payment_mode` varchar(200) NOT NULL,
  `authorization_number` varchar(200) NOT NULL,
  `issued_by` varchar(200) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead_refunds`
--

INSERT INTO `lead_refunds` (`id`, `lead_id`, `account_lead_id`, `refund_payment`, `payment_mode`, `authorization_number`, `issued_by`, `payment_date`) VALUES
(1, 1, 6, 250, 'Cash', '', 'puneet', '2019-05-23 18:08:05'),
(2, 1, 6, 500, 'Draft', '', 'Puneet', '2019-05-23 18:08:11'),
(3, 8, 9, 500, 'Cash', '', 'Puneet', '2019-05-24 15:48:17'),
(4, 5, 8, 20, 'Debit', 'auth#9868', 'Self', '2019-05-24 18:02:23'),
(5, 2, 4, 250, 'Cash', '', 'Puneet', '2019-05-24 21:12:16'),
(6, 4, 5, 500, 'Cash', '', 'Self', '2019-05-31 19:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `lead_status`
--

CREATE TABLE `lead_status` (
  `id` int(11) NOT NULL,
  `lead_status` varchar(250) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `status_message` text,
  `next_step_message` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead_status`
--

INSERT INTO `lead_status` (`id`, `lead_status`, `department_id`, `status_message`, `next_step_message`) VALUES
(1, 'L', 4, 'Case with processing Dept for initial assessment', 'You may be contacted by our staff within a week'),
(2, 'R', 2, 'We require some additional infomation regarding your case. We sent you an  email and will also contcat via phone regarding this.', 'On receipt of your required information, we will forward the case to next level.'),
(3, 'Imm Package Released', NULL, NULL, NULL),
(4, 'Case Ready For Filling', NULL, NULL, NULL),
(5, 'Case Reviewed', NULL, NULL, NULL),
(6, 'Case Filed', NULL, NULL, NULL),
(7, 'Case Rejected', NULL, NULL, NULL),
(8, 'Case Closed', NULL, NULL, NULL),
(9, 'Additional Information Required', NULL, NULL, NULL),
(10, 'Case Approved', NULL, NULL, NULL),
(11, 'In Process', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `url` varchar(350) NOT NULL,
  `display_to` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `name`, `url`, `display_to`) VALUES
(1, 'Canadian Job Bank', 'http://www.jobbank.gc.ca/home-eng.do?lang=eng', 'All'),
(2, 'IELTS Information', 'http://www.ielts.org', 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

CREATE TABLE `medias` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medias`
--

INSERT INTO `medias` (`id`, `name`) VALUES
(1, 'Internet Search'),
(2, 'Newspaper'),
(3, 'Reference');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `icon` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `menu_order`, `icon`) VALUES
(1, 'Company setup', 1, ''),
(2, 'General Setup', 2, ''),
(3, 'Lead Management', 4, ''),
(4, 'Account', 5, ''),
(5, 'Customer Care', 6, ''),
(6, 'Case Processing', 7, ''),
(7, 'Reports', 8, ''),
(8, 'Newsletter', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `handle` varchar(250) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `parent` varchar(250) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `case_processing` int(11) NOT NULL DEFAULT '0',
  `customer_care` int(11) NOT NULL DEFAULT '0',
  `accounts` int(11) NOT NULL DEFAULT '0',
  `assessment` int(11) NOT NULL DEFAULT '0',
  `marketing` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `handle`, `menu_id`, `parent`, `admin`, `case_processing`, `customer_care`, `accounts`, `assessment`, `marketing`) VALUES
(5, 'Newsletter', 'manageNewsletter', 8, 'Newsletter', 1, 0, 0, 0, 0, 0),
(6, 'Agents', 'getAgent', 3, 'Lead Managment', 1, 0, 0, 0, 0, 0),
(7, 'Add New Leads', 'addLead', 3, 'Lead Managment', 1, 1, 1, 0, 0, 1),
(8, 'Assignment of leads', 'assignLead', 3, 'Lead Managment', 1, 0, 1, 0, 0, 0),
(9, 'View Leads', 'getLead', 3, 'Lead Managment', 1, 1, 1, 0, 0, 1),
(10, 'Today Followup ', 'todayFollow', 3, 'Lead Managment', 1, 1, 1, 0, 0, 0),
(11, 'Retained Cases', 'retainedCase', 3, 'Lead Managment', 1, 1, 0, 0, 0, 1),
(12, 'Manage Lead', 'accountLead', 4, 'Account', 1, 0, 1, 1, 0, 0),
(13, 'Manage Case', 'manageCase', 6, 'Case Processing', 1, 1, 1, 0, 0, 0),
(14, 'Companies', 'getAllCompanies', 1, 'Company setup', 1, 0, 0, 0, 0, 0),
(15, 'Staff', 'getAllStaff', 1, 'Company setup', 1, 0, 0, 0, 0, 0),
(16, 'Manage Status', 'getLeadStatus', 2, 'General Setup', 1, 0, 0, 0, 0, 0),
(17, 'Link Setup', 'getLink', 2, 'General Setup', 1, 0, 0, 0, 0, 0),
(18, 'Client Setup   ', 'getClient', 2, 'General Setup', 1, 0, 0, 0, 0, 0),
(19, 'Immigration Category', 'getCategory', 2, 'General Setup', 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `page_name` varchar(250) NOT NULL,
  `handle` varchar(200) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `parent` varchar(150) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE `remarks` (
  `id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `follow_up` varchar(250) DEFAULT NULL,
  `contacted_mode` varchar(150) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `remarks_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remarks`
--

INSERT INTO `remarks` (`id`, `lead_id`, `remarks`, `follow_up`, `contacted_mode`, `user_id`, `remarks_date`) VALUES
(1, 1, 'Paper ready and needs to files case', NULL, NULL, 1, '2019-05-16 18:40:32'),
(2, 1, 'Case Filed', NULL, NULL, 1, '2019-05-16 18:41:16'),
(3, 1, 'Need paper', NULL, NULL, 1, '2019-05-16 18:41:35'),
(4, 3, 'Manjit Sir Retained it.', NULL, NULL, 12, '2019-05-16 20:33:22'),
(5, 4, 'Sanjay Sir Case. Need extra care', NULL, NULL, 1, '2019-05-17 14:58:33'),
(6, 6, 'please review it properly.', NULL, NULL, 1, '2019-05-17 20:41:19'),
(7, 5, 'test case', NULL, NULL, 1, '2019-05-21 18:14:10'),
(8, 5, 'please review case', NULL, NULL, 1, '2019-05-22 16:26:13'),
(9, 3, 'please work on it ASAP!', NULL, NULL, 1, '2019-05-22 16:53:35'),
(10, 2, 'Please call the customer', NULL, NULL, 1, '2019-05-22 16:56:29'),
(11, 2, 'Customer is very angry on us because we didn\'t process his case till yet. please take care of this case and make it done as soon as possible.', NULL, NULL, 1, '2019-05-22 17:00:32'),
(12, 4, 'test', NULL, NULL, 1, '2019-05-22 22:15:06'),
(13, 8, 'please take care', NULL, NULL, 1, '2019-05-22 22:28:47'),
(14, 8, 'case filed', NULL, NULL, 1, '2019-05-22 22:28:58'),
(15, 8, 'please check again', NULL, NULL, 1, '2019-05-22 22:29:05'),
(16, 7, 'please work on it', NULL, NULL, 1, '2019-05-24 15:46:37'),
(17, 3, 'test', NULL, NULL, 1, '2019-05-24 17:37:54'),
(18, 8, 'post case status ', NULL, NULL, 1, '2019-05-27 16:24:38');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `category_id`) VALUES
(1, 'CEC', 1),
(2, 'FSTW', 1),
(3, 'FSW', 1),
(4, 'Visitor Extension', 2),
(5, 'LMIA Based WP', 3),
(6, 'PNP Work Permit', 3),
(7, 'DSWP', 3),
(8, 'PGWP', 3),
(9, 'Spousal Sponsorship', 4),
(10, 'Parental Sponsorship', 4),
(11, 'Other Family Member sponsorship', 4),
(12, 'Study Permit Extension', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `postal_code` varchar(150) NOT NULL,
  `country` varchar(150) NOT NULL,
  `role` varchar(150) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `in_time` varchar(100) DEFAULT NULL,
  `out_time` varchar(100) DEFAULT NULL,
  `saturday` int(11) DEFAULT NULL,
  `sunday` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `phone`, `address`, `city`, `province`, `postal_code`, `country`, `role`, `department_id`, `company_id`, `in_time`, `out_time`, `saturday`, `sunday`, `created_at`) VALUES
(1, 'test', '$2y$10$VDdpaZiVcjbCu8En/gey2uvU7rZVSnNSmlXi60USeNmIC0VDUcx/u', 'Admin', 'Admin', 'ted@test.com', '9865323232', 'fsdcvxcvx', '', '', '', '', 'admin', 1, 0, '', '', 0, 0, '2019-04-26 18:46:16'),
(2, 'check', '$2y$10$MuPsgALqsdREpCP.vlH40uY7s9XoIOZ4zs3sjrtAp.Asi3K0Mmmoi', 'admin rep', 'sdfg', 'case@new.com', 'cvx', 'dfasdf', 'sadfas', 'sadf', 'dfgsd', 'Canada', 'staff', 2, 1, '23', '32', 1, 0, '2019-04-29 19:26:57'),
(3, 'hello', '$2y$10$VDdpaZiVcjbCu8En/gey2uvU7rZVSnNSmlXi60USeNmIC0VDUcx/u', 'marketing person', 'sdfg', '123@123.com', '9865323232', 'cvxzcvzx', 'dsfg', 'sadf', 'dfgsd', 'Canada', 'staff', 6, 2, '23', '32', 0, 1, '2019-04-29 19:35:15'),
(4, 'new', '$2y$10$4GG7pg1KWT5XYNr/8Xp2w.722quHFZSqn2BeFx7ZeIbUNlPjdq5nm', 'processing staff', 'sdfg', 'qwerty@test.com', 'dsfg', 'dfgsdfg', 'er t', 'ert', '345g', 'Canada', 'staff', 1, 2, '23', '32', 1, 1, '2019-04-29 20:15:34'),
(12, '', '$2y$10$VDdpaZiVcjbCu8En/gey2uvU7rZVSnNSmlXi60USeNmIC0VDUcx/u', 'case', 'processing ', 'case@care.com', '9865323232', '148 main street', 'toronto', 'ontario', '345g', 'Canada', 'staff', 2, 2, '', '', 0, 1, '2019-05-06 17:57:48'),
(13, '', '$2y$10$VDdpaZiVcjbCu8En/gey2uvU7rZVSnNSmlXi60USeNmIC0VDUcx/u', 'customer care', 'person', 'care@care.com', '(865) 895-326 ', 'brampton', 'brampton', 'ontario', 'L95X1', 'Canada', 'staff', 3, 1, '10', '5', 0, 0, '2019-05-10 16:31:31'),
(14, '', '$2y$10$P9VHIzngIrg93pqOA0iuh.HcQukeQ55DPJt1Qd6OJrhyOI.QjMAR2', 'account', 'parson', 'account@immdesk.com', '986635656988', 'dixie road', 'missisuaga', 'ontario', 'L9d321', 'Canada', 'staff', 1, 2, '10', '5', 0, 1, '2019-05-10 16:37:05'),
(15, '', '$2y$10$VDdpaZiVcjbCu8En/gey2uvU7rZVSnNSmlXi60USeNmIC0VDUcx/u', 'express', 'name', 'ted@new.com', '45645064506', 'xcvc vv', 'Toronto', 'Ontario', 'L3T4M7', 'Canada', 'staff', 4, 6, '10', '6.00', 0, 1, '2019-05-14 20:51:28'),
(16, '', '$2y$10$vJVrmFZtHji2b.zkK0SQz.h1v7jB3bhWYl5YmdmQn5sk.fwQOW2jG', 'gagan deep', 'kumar', 'gagan@gmail.com', '4379842124', 'dsf dxf gsd fg', 'windsor', 'ontario', 'S3T4M7', 'Canada', 'client', NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-28 20:45:48'),
(17, '', '$2y$10$2xEPUYhOMIiVDFy6Qxb8QurSWXjgFQGiEU/kKXWw.VE/o0JhkxkEC', 'mohan', 'deep', 'deep@mohan.com', '4379842124', 'sdfs sdf sd', 'Toronto', 'ontario', 'L3T4M7', 'Canada', 'client', NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-28 21:28:14'),
(19, '', '$2y$10$dI/YwfaiuPj8qE3Og6v.zO9Oi5et.fL0aoP12Y7oMuSmJ9BK2Ayhq', 'gurwinder', 'singh', 'gurwinder@gmail.com', '4782523636', 'sdfsdf', 'brampton', 'ontario', 'L3T4M7', 'Canada', 'client', NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-28 21:33:11'),
(20, '', '$2y$10$MxhMZBFNNdGr7OafHBbZCuKLXexqW/80CiuSQFISqDqqK5GfS1QNO', 'sakshi', 'case', 'sakshi@case.com', '(456) 450-6450', '78 hill crescent', 'brampton', 'ontario', 'S3T4M7', 'Canada', 'staff', 2, 1, '10', '6.00', 0, 0, '2019-05-29 19:55:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_leads`
--
ALTER TABLE `account_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_remarks`
--
ALTER TABLE `client_remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_documents`
--
ALTER TABLE `lead_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_payments`
--
ALTER TABLE `lead_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_refunds`
--
ALTER TABLE `lead_refunds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_status`
--
ALTER TABLE `lead_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `remarks`
--
ALTER TABLE `remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `company_id` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_leads`
--
ALTER TABLE `account_leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `client_remarks`
--
ALTER TABLE `client_remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `lead_documents`
--
ALTER TABLE `lead_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lead_payments`
--
ALTER TABLE `lead_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lead_refunds`
--
ALTER TABLE `lead_refunds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lead_status`
--
ALTER TABLE `lead_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
