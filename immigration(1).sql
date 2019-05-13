-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2019 at 11:09 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

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
(1, 0, 'first company', 'dfg', 'dfg', 'dfsadfsadf', 'cvxzcvzx', 'brampton', 'sadf', 'dfgsd', 'dfasdf', '2019-04-26 19:16:41'),
(2, 0, 'test2', 'dfg', 'dfg', 'dfsadfsadf', 'cvxzcvzx', 'toronto', 'sadf', 'dfgsd', 'dfasdf', '2019-04-26 19:16:41'),
(6, 1, 'child first company', '95623598', 'dfg@ertwe.com', 'dfsadfsadf.com', 'cvxzcvzx', 'toronto', 'ontario', 'L3S3X8', 'canada', '2019-04-26 19:16:41'),
(7, 2, 'new child', '98653236', 'qwerty@test.com', 'web@site.com', '148 main street', 'toronto', 'ontario', '653fer', 'canada', '2019-05-06 16:19:31');

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
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lead_status`
--

CREATE TABLE `lead_status` (
  `id` int(11) NOT NULL,
  `lead_status` varchar(250) NOT NULL,
  `department_id` int(11) NOT NULL,
  `status_message` text NOT NULL,
  `next_step_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead_status`
--

INSERT INTO `lead_status` (`id`, `lead_status`, `department_id`, `status_message`, `next_step_message`) VALUES
(1, 'L', 4, 'Case with processing Dept for initial assessment', 'You may be contacted by our staff within a week'),
(2, 'Additional Information Required', 2, 'We require some additional infomation regarding your case. We sent you an  email and will also contcat via phone regarding this.', 'On receipt of your required information, we will forward the case to next level.');

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
(13, 'Manage Case', 'manageCase', 5, 'CustomerCare', 1, 1, 1, 0, 0, 0),
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

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `user_id`, `page_name`, `handle`, `menu_id`, `parent`, `department_id`) VALUES
(38, 2, 'Task Managment', 'addTask', 0, 'addTask', 1),
(39, 2, 'Leads Managment', 'addLead', 0, 'addLead', 1),
(40, 2, 'Case Processing', 'addCase', 0, 'addCase', 1),
(41, 3, 'Case Processing', 'addCase', 0, 'addCase', 6),
(76, 4, 'Newsletter', 'manageNewsletter', 8, '8', 1),
(77, 4, 'Agents', 'getAgent', 3, '3', 1),
(78, 4, 'Manage Case', 'manageCase', 5, '5', 1),
(79, 4, 'Companies', 'getAllCompanies', 1, '1', 1),
(80, 4, 'Staff', 'getAllStaff', 1, '1', 1),
(81, 4, 'Manage Status', 'getLeadStatus', 2, '2', 1),
(82, 4, 'Link Setup', 'getLink', 2, '2', 1),
(83, 4, 'Immigration Category', 'getCategory', 2, '2', 1),
(84, 12, 'View Leads', 'getLead', 3, '3', 2),
(85, 12, 'Manage Case', 'manageCase', 5, '5', 2);

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
  `department_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `in_time` varchar(100) NOT NULL,
  `out_time` varchar(100) NOT NULL,
  `saturday` int(11) NOT NULL,
  `sunday` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `phone`, `address`, `city`, `province`, `postal_code`, `country`, `role`, `department_id`, `company_id`, `in_time`, `out_time`, `saturday`, `sunday`, `created_at`) VALUES
(1, 'test', '$2y$10$VDdpaZiVcjbCu8En/gey2uvU7rZVSnNSmlXi60USeNmIC0VDUcx/u', 'Admin', 'Admin', 'ted@test.com', '9865323232', 'fsdcvxcvx', '', '', '', '', 'admin', 1, 0, '', '', 0, 0, '2019-04-26 18:46:16'),
(2, 'check', '$2y$10$MuPsgALqsdREpCP.vlH40uY7s9XoIOZ4zs3sjrtAp.Asi3K0Mmmoi', 'admin rep', 'sdfg', 'admin@new.com', 'cvx', 'dfasdf', 'sadfas', 'sadf', 'dfgsd', 'fgdfg', 'staff', 1, 1, '23', '32', 1, 0, '2019-04-29 19:26:57'),
(3, 'hello', '$2y$10$VDdpaZiVcjbCu8En/gey2uvU7rZVSnNSmlXi60USeNmIC0VDUcx/u', 'marketing person', 'sdfg', '123@123.com', '9865323232', 'cvxzcvzx', 'dsfg', 'sadf', 'dfgsd', 'dfasdf', 'staff', 6, 2, '23', '32', 0, 1, '2019-04-29 19:35:15'),
(4, 'new', '$2y$10$4GG7pg1KWT5XYNr/8Xp2w.722quHFZSqn2BeFx7ZeIbUNlPjdq5nm', 'processing staff', 'sdfg', 'qwerty@test.com', 'dsfg', 'dfgsdfg', 'er t', 'ert', '345g', 'dfasdf', 'staff', 1, 2, '23', '32', 1, 1, '2019-04-29 20:15:34'),
(12, '', '$2y$10$VDdpaZiVcjbCu8En/gey2uvU7rZVSnNSmlXi60USeNmIC0VDUcx/u', 'customer', 'rep', 'customer@care.com', '9865323232', '148 main street', 'toronto', 'ontario', '345g', 'canada', 'staff', 2, 2, '', '', 0, 1, '2019-05-06 17:57:48'),
(13, '', '$2y$10$cgpalMtTeinMyzNL5MQaaefalYGjpNLYAxyr69rImtMNu3Z3cs512', 'customer care', 'person', 'care@care.com', '865895326', 'brampton', 'brampton', 'ontario', 'L95X1', 'canada', 'staff', 3, 1, '10', '5', 0, 0, '2019-05-10 16:31:31'),
(14, '', '$2y$10$P9VHIzngIrg93pqOA0iuh.HcQukeQ55DPJt1Qd6OJrhyOI.QjMAR2', 'account', 'parson', 'account@immdesk.com', '986635656988', 'dixie road', 'missisuaga', 'ontario', 'L9d321', 'canada', 'staff', 4, 2, '10', '5', 0, 1, '2019-05-10 16:37:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lead_status`
--
ALTER TABLE `lead_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
