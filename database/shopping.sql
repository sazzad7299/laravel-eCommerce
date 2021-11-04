-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 04, 2021 at 05:01 AM
-- Server version: 5.7.26
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
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `status`, `password`, `role`, `created_at`, `updated_at`) VALUES
(2, 'admin@gmail.com', 1, '81dc9bdb52d04dc20036dbd8313ed055', 1, '2021-10-10 16:02:47', '2021-10-10 16:02:47'),
(3, 'sazzadur@gmail.com', 1, '827ccb0eea8a706c4c34a16891f84e7b', 1, '2021-10-27 18:00:00', '2021-10-11 00:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `title`, `link`, `position`, `status`, `created_at`, `updated_at`) VALUES
(1, '12991.jpg', 'jhgjhsfgiu', 'link', 0, 1, '2021-04-18 18:00:00', '2021-09-28 08:53:45'),
(2, '82531.jpg', 'Make a trip', 'dico omnesque vis at, ius an laboramus adversarium.', 1, 1, '2021-04-20 02:16:39', '2021-04-20 02:19:09'),
(3, '44128.jpg', 'Welcome to our travel website', 'link2', 2, 1, '2021-04-20 02:19:48', '2021-04-20 02:53:41'),
(4, '26326.jpg', 'Welcome to our travel website 1', 'link', 3, 1, '2021-04-20 02:24:11', '2021-04-20 02:51:36'),
(5, '19289.jpg', 'Welcome to our travel website', 'link', 4, 1, '2021-04-20 03:09:17', '2021-04-20 08:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `product_name`, `product_code`, `product_color`, `user_email`, `size`, `session_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(59, 7, 'Men Comfortable Converse', '#sku-s10', 'black', 'sazzadurrahman580@gmail.com', 'Small', 'umz2IxxqArjiarHN3Kq11tNbkoaR2b0VaHr4L1wL', 1, '200', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `status`, `url`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Men Fashion\'s', 'Men Fashion\'s', 1, 'men_fashion\'s', NULL, '2021-01-28 13:37:14', '2021-02-21 10:57:53'),
(2, 0, 'Electronic Devices', 'Electronic devices are components for controlling the flow of electrical currents for the purpose of information processing and system control. Prominent examples include transistors and diodes. Electronic devices are usually small and can be grouped together into packages called integrated circuits.', 1, 'electronic_devices', NULL, '2021-01-28 13:37:51', '2021-01-28 13:37:51'),
(3, 2, 'Mobiles', 'Find here the list of all mobile phones brands of India and Worldwide, Also check latest smartphones from top & best company like Samsung, Apple, Xiaomi, ...', 1, 'mobiles', NULL, '2021-01-28 13:38:15', '2021-01-28 13:38:15'),
(4, 0, 'Women\'s Fashion', 'women dress are goes to here', 1, 'women\'s_fashion', NULL, '2021-01-29 02:24:02', '2021-01-29 02:24:02'),
(5, 4, 'Dress', 'women dress are goes to here', 1, 'dress', NULL, '2021-01-29 03:01:24', '2021-01-29 03:03:18'),
(6, 4, 'Watch', 'watch', 1, 'watch', NULL, '2021-02-07 07:32:20', '2021-02-07 07:32:20'),
(7, 1, 'Shoes', 'Mens Comfortable Shoes here', 1, 'shoes', NULL, '2021-02-21 10:55:43', '2021-02-21 10:55:43'),
(8, 1, 'choco', 'Shop Beauty, Vitamins & Health Essentials - CVS PharmacyShop Beauty, Vitamins & Health Essentials - CVS PharmacyShop Beauty, Vitamins & Health Essentials - CVS PharmacyShop Beauty, Vitamins & Health Essentials - CVS PharmacyShop Beauty, Vitamins & Health Essentials - CVS PharmacyShop Beauty, Vitamins & Health Essentials - CVS PharmacyShop Beauty, Vitamins & Health Essentials - CVS PharmacyShop Beauty, Vitamins & Health Essentials - CVS PharmacyShop Beauty, Vitamins & Health Essentials - CVS PharmacyShop Beauty, Vitamins & Health Essentials - CVS PharmacyShop Beauty, Vitamins & Health Essentials - CVS Pharmacy', 1, 'choco', NULL, '2021-10-14 02:07:39', '2021-10-14 02:07:39');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

DROP TABLE IF EXISTS `cms_pages`;
CREATE TABLE IF NOT EXISTS `cms_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `description`, `url`, `status`, `created_at`, `updated_at`) VALUES
(5, 'About Us', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum magni asperiores fugiat qui et maiores libero commodi quaerat, exercitationem, molestiae earum itaque, officia tempora sit ipsa! Illo natus ipsa voluptatem?', 'about-us', 1, '2021-10-17 06:59:58', '2021-10-17 07:13:18');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=256 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AX', 'Åland Islands'),
(3, 'AL', 'Albania'),
(4, 'DZ', 'Algeria'),
(5, 'AS', 'American Samoa'),
(6, 'AD', 'Andorra'),
(7, 'AO', 'Angola'),
(8, 'AI', 'Anguilla'),
(9, 'AQ', 'Antarctica'),
(10, 'AG', 'Antigua & Barbuda'),
(11, 'AR', 'Argentina'),
(12, 'AM', 'Armenia'),
(13, 'AW', 'Aruba'),
(14, 'AC', 'Ascension Island'),
(15, 'AU', 'Australia'),
(16, 'AT', 'Austria'),
(17, 'AZ', 'Azerbaijan'),
(18, 'BS', 'Bahamas'),
(19, 'BH', 'Bahrain'),
(20, 'BD', 'Bangladesh'),
(21, 'BB', 'Barbados'),
(22, 'BY', 'Belarus'),
(23, 'BE', 'Belgium'),
(24, 'BZ', 'Belize'),
(25, 'BJ', 'Benin'),
(26, 'BM', 'Bermuda'),
(27, 'BT', 'Bhutan'),
(28, 'BO', 'Bolivia'),
(29, 'BA', 'Bosnia & Herzegovina'),
(30, 'BW', 'Botswana'),
(31, 'BR', 'Brazil'),
(32, 'IO', 'British Indian Ocean Territory'),
(33, 'VG', 'British Virgin Islands'),
(34, 'BN', 'Brunei'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'KH', 'Cambodia'),
(39, 'CM', 'Cameroon'),
(40, 'CA', 'Canada'),
(41, 'IC', 'Canary Islands'),
(42, 'CV', 'Cape Verde'),
(43, 'BQ', 'Caribbean Netherlands'),
(44, 'KY', 'Cayman Islands'),
(45, 'CF', 'Central African Republic'),
(46, 'EA', 'Ceuta & Melilla'),
(47, 'TD', 'Chad'),
(48, 'CL', 'Chile'),
(49, 'CN', 'China'),
(50, 'CX', 'Christmas Island'),
(51, 'CC', 'Cocos (Keeling) Islands'),
(52, 'CO', 'Colombia'),
(53, 'KM', 'Comoros'),
(54, 'CG', 'Congo - Brazzaville'),
(55, 'CD', 'Congo - Kinshasa'),
(56, 'CK', 'Cook Islands'),
(57, 'CR', 'Costa Rica'),
(58, 'CI', 'Côte d’Ivoire'),
(59, 'HR', 'Croatia'),
(60, 'CU', 'Cuba'),
(61, 'CW', 'Curaçao'),
(62, 'CY', 'Cyprus'),
(63, 'CZ', 'Czechia'),
(64, 'DK', 'Denmark'),
(65, 'DG', 'Diego Garcia'),
(66, 'DJ', 'Djibouti'),
(67, 'DM', 'Dominica'),
(68, 'DO', 'Dominican Republic'),
(69, 'EC', 'Ecuador'),
(70, 'EG', 'Egypt'),
(71, 'SV', 'El Salvador'),
(72, 'GQ', 'Equatorial Guinea'),
(73, 'ER', 'Eritrea'),
(74, 'EE', 'Estonia'),
(75, 'ET', 'Ethiopia'),
(76, 'EZ', 'Eurozone'),
(77, 'FK', 'Falkland Islands'),
(78, 'FO', 'Faroe Islands'),
(79, 'FJ', 'Fiji'),
(80, 'FI', 'Finland'),
(81, 'FR', 'France'),
(82, 'GF', 'French Guiana'),
(83, 'PF', 'French Polynesia'),
(84, 'TF', 'French Southern Territories'),
(85, 'GA', 'Gabon'),
(86, 'GM', 'Gambia'),
(87, 'GE', 'Georgia'),
(88, 'DE', 'Germany'),
(89, 'GH', 'Ghana'),
(90, 'GI', 'Gibraltar'),
(91, 'GR', 'Greece'),
(92, 'GL', 'Greenland'),
(93, 'GD', 'Grenada'),
(94, 'GP', 'Guadeloupe'),
(95, 'GU', 'Guam'),
(96, 'GT', 'Guatemala'),
(97, 'GG', 'Guernsey'),
(98, 'GN', 'Guinea'),
(99, 'GW', 'Guinea-Bissau'),
(100, 'GY', 'Guyana'),
(101, 'HT', 'Haiti'),
(102, 'HN', 'Honduras'),
(103, 'HK', 'Hong Kong SAR China'),
(104, 'HU', 'Hungary'),
(105, 'IS', 'Iceland'),
(106, 'IN', 'India'),
(107, 'ID', 'Indonesia'),
(108, 'IR', 'Iran'),
(109, 'IQ', 'Iraq'),
(110, 'IE', 'Ireland'),
(111, 'IM', 'Isle of Man'),
(112, 'IL', 'Israel'),
(113, 'IT', 'Italy'),
(114, 'JM', 'Jamaica'),
(115, 'JP', 'Japan'),
(116, 'JE', 'Jersey'),
(117, 'JO', 'Jordan'),
(118, 'KZ', 'Kazakhstan'),
(119, 'KE', 'Kenya'),
(120, 'KI', 'Kiribati'),
(121, 'XK', 'Kosovo'),
(122, 'KW', 'Kuwait'),
(123, 'KG', 'Kyrgyzstan'),
(124, 'LA', 'Laos'),
(125, 'LV', 'Latvia'),
(126, 'LB', 'Lebanon'),
(127, 'LS', 'Lesotho'),
(128, 'LR', 'Liberia'),
(129, 'LY', 'Libya'),
(130, 'LI', 'Liechtenstein'),
(131, 'LT', 'Lithuania'),
(132, 'LU', 'Luxembourg'),
(133, 'MO', 'Macau SAR China'),
(134, 'MK', 'Macedonia'),
(135, 'MG', 'Madagascar'),
(136, 'MW', 'Malawi'),
(137, 'MY', 'Malaysia'),
(138, 'MV', 'Maldives'),
(139, 'ML', 'Mali'),
(140, 'MT', 'Malta'),
(141, 'MH', 'Marshall Islands'),
(142, 'MQ', 'Martinique'),
(143, 'MR', 'Mauritania'),
(144, 'MU', 'Mauritius'),
(145, 'YT', 'Mayotte'),
(146, 'MX', 'Mexico'),
(147, 'FM', 'Micronesia'),
(148, 'MD', 'Moldova'),
(149, 'MC', 'Monaco'),
(150, 'MN', 'Mongolia'),
(151, 'ME', 'Montenegro'),
(152, 'MS', 'Montserrat'),
(153, 'MA', 'Morocco'),
(154, 'MZ', 'Mozambique'),
(155, 'MM', 'Myanmar (Burma)'),
(156, 'NA', 'Namibia'),
(157, 'NR', 'Nauru'),
(158, 'NP', 'Nepal'),
(159, 'NL', 'Netherlands'),
(160, 'NC', 'New Caledonia'),
(161, 'NZ', 'New Zealand'),
(162, 'NI', 'Nicaragua'),
(163, 'NE', 'Niger'),
(164, 'NG', 'Nigeria'),
(165, 'NU', 'Niue'),
(166, 'NF', 'Norfolk Island'),
(167, 'KP', 'North Korea'),
(168, 'MP', 'Northern Mariana Islands'),
(169, 'NO', 'Norway'),
(170, 'OM', 'Oman'),
(171, 'PK', 'Pakistan'),
(172, 'PW', 'Palau'),
(173, 'PS', 'Palestinian Territories'),
(174, 'PA', 'Panama'),
(175, 'PG', 'Papua New Guinea'),
(176, 'PY', 'Paraguay'),
(177, 'PE', 'Peru'),
(178, 'PH', 'Philippines'),
(179, 'PN', 'Pitcairn Islands'),
(180, 'PL', 'Poland'),
(181, 'PT', 'Portugal'),
(182, 'PR', 'Puerto Rico'),
(183, 'QA', 'Qatar'),
(184, 'RE', 'Réunion'),
(185, 'RO', 'Romania'),
(186, 'RU', 'Russia'),
(187, 'RW', 'Rwanda'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'São Tomé & Príncipe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SX', 'Sint Maarten'),
(198, 'SK', 'Slovakia'),
(199, 'SI', 'Slovenia'),
(200, 'SB', 'Solomon Islands'),
(201, 'SO', 'Somalia'),
(202, 'ZA', 'South Africa'),
(203, 'GS', 'South Georgia & South Sandwich Islands'),
(204, 'KR', 'South Korea'),
(205, 'SS', 'South Sudan'),
(206, 'ES', 'Spain'),
(207, 'LK', 'Sri Lanka'),
(208, 'BL', 'St. Barthélemy'),
(209, 'SH', 'St. Helena'),
(210, 'KN', 'St. Kitts & Nevis'),
(211, 'LC', 'St. Lucia'),
(212, 'MF', 'St. Martin'),
(213, 'PM', 'St. Pierre & Miquelon'),
(214, 'VC', 'St. Vincent & Grenadines'),
(215, 'SD', 'Sudan'),
(216, 'SR', 'Suriname'),
(217, 'SJ', 'Svalbard & Jan Mayen'),
(218, 'SZ', 'Swaziland'),
(219, 'SE', 'Sweden'),
(220, 'CH', 'Switzerland'),
(221, 'SY', 'Syria'),
(222, 'TW', 'Taiwan'),
(223, 'TJ', 'Tajikistan'),
(224, 'TZ', 'Tanzania'),
(225, 'TH', 'Thailand'),
(226, 'TL', 'Timor-Leste'),
(227, 'TG', 'Togo'),
(228, 'TK', 'Tokelau'),
(229, 'TO', 'Tonga'),
(230, 'TT', 'Trinidad & Tobago'),
(231, 'TA', 'Tristan da Cunha'),
(232, 'TN', 'Tunisia'),
(233, 'TR', 'Turkey'),
(234, 'TM', 'Turkmenistan'),
(235, 'TC', 'Turks & Caicos Islands'),
(236, 'TV', 'Tuvalu'),
(237, 'UM', 'U.S. Outlying Islands'),
(238, 'VI', 'U.S. Virgin Islands'),
(239, 'UG', 'Uganda'),
(240, 'UA', 'Ukraine'),
(241, 'AE', 'United Arab Emirates'),
(242, 'GB', 'United Kingdom'),
(243, 'UN', 'United Nations'),
(244, 'US', 'United States'),
(245, 'UY', 'Uruguay'),
(246, 'UZ', 'Uzbekistan'),
(247, 'VU', 'Vanuatu'),
(248, 'VA', 'Vatican City'),
(249, 'VE', 'Venezuela'),
(250, 'VN', 'Vietnam'),
(251, 'WF', 'Wallis & Futuna'),
(252, 'EH', 'Western Sahara'),
(253, 'YE', 'Yemen'),
(254, 'ZM', 'Zambia'),
(255, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `amount`, `amount_type`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'rtyhr', 50, 'percentage', '2021-04-22', 1, '2021-04-11 04:30:40', '2021-04-16 04:23:19'),
(2, 'Cup60', 60, 'percentage', '2021-10-16', 1, '2021-04-11 04:59:46', '2021-10-06 05:32:02'),
(3, 'edrererew', 45, 'fixed', '2021-10-16', 1, '2021-04-11 04:59:51', '2021-10-06 05:40:54'),
(9, 'Cup12', 20, 'fixed', '2021-10-31', 1, '2021-10-17 08:11:22', '2021-10-17 08:11:22');

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_11_12_081415_create_categories_table', 1),
(4, '2020_11_13_160625_create_products_table', 1),
(5, '2020_11_27_194701_create_products_attributes_table', 1),
(6, '2021_02_06_201501_create_products_images_table', 2),
(7, '2021_02_21_151826_add_status_to_products_table', 3),
(10, '2021_02_24_171157_create_cart_table', 4),
(11, '2021_04_10_191329_create_coupons_table', 5),
(14, '2021_04_18_114143_create_banners_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postcode` int(10) NOT NULL,
  `country` varchar(255) NOT NULL,
  `mobile` int(255) NOT NULL,
  `shipping_charges` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_amount` float NOT NULL,
  `order_status` varchar(225) NOT NULL,
  `payment_method` text NOT NULL,
  `grand_total` float NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `state`, `postcode`, `country`, `mobile`, `shipping_charges`, `coupon_code`, `coupon_amount`, `order_status`, `payment_method`, `grand_total`, `transaction_id`, `created_at`, `updated_at`) VALUES
(63, 11, 'sazzadursd@gmail.com', '97/8 Chairman Goli, Shankar', '97/8 Chairman Goli, Shankar', 'Dhaka', 'ghgh', 3480, 'Antigua & Barbuda', 1786740107, '0', '', 0, 'New', 'COD', 250, NULL, '2021-10-17 08:38:32', '2021-10-17 08:38:32'),
(62, 11, 'sazzadursd@gmail.com', '97/8 Chairman Goli, Shankar', '97/8 Chairman Goli, Shankar', 'Dhaka', 'ghgh', 3480, 'Antigua & Barbuda', 1786740107, '0', '', 0, 'New', 'COD', 250, NULL, '2021-10-17 08:28:43', '2021-10-17 08:28:43'),
(61, 11, 'sazzadursd@gmail.com', '97/8 Chairman Goli, Shankar', '97/8 Chairman Goli, Shankar', 'Dhaka', 'ghgh', 3480, 'Antigua & Barbuda', 1786740107, '0', '', 0, 'New', 'COD', 250, NULL, '2021-10-17 08:27:52', '2021-10-17 08:27:52'),
(59, 11, 'sazzadursd@gmail.com', '97/8 Chairman Goli, Shankar', '97/8 Chairman Goli, Shankar', 'Dhaka', 'ghgh', 3480, 'Antigua & Barbuda', 1786740107, '0', '', 0, 'New', 'COD', 250, NULL, '2021-10-17 08:26:34', '2021-10-17 08:26:34'),
(60, 11, 'sazzadursd@gmail.com', '97/8 Chairman Goli, Shankar', '97/8 Chairman Goli, Shankar', 'Dhaka', 'ghgh', 3480, 'Antigua & Barbuda', 1786740107, '0', '', 0, 'New', 'COD', 250, NULL, '2021-10-17 08:27:03', '2021-10-17 08:27:03'),
(58, 11, 'sazzadursd@gmail.com', '97/8 Chairman Goli, Shankar', '97/8 Chairman Goli, Shankar', 'Dhaka', 'ghgh', 3480, 'Antigua & Barbuda', 1786740107, '0', 'Cup12', 20, 'New', 'COD', 230, NULL, '2021-10-17 08:22:54', '2021-10-17 08:22:54'),
(57, 11, 'sazzadursd@gmail.com', '97/8 Chairman Goli, Shankar', '97/8 Chairman Goli, Shankar', 'Dhaka', 'ghgh', 3480, 'Antigua & Barbuda', 1786740107, '0', 'Cup12', 20, 'New', 'COD', 230, NULL, '2021-10-17 08:18:06', '2021-10-17 08:18:06'),
(56, 11, 'sazzadursd@gmail.com', '97/8 Chairman Goli, Shankar', '97/8 Chairman Goli, Shankar', 'Dhaka', 'ghgh', 3480, 'Antigua & Barbuda', 1786740107, '0', 'Cup12', 20, 'New', 'COD', 230, NULL, '2021-10-17 08:18:05', '2021-10-17 08:18:05'),
(55, 11, 'sazzadursd@gmail.com', '97/8 Chairman Goli, Shankar', '97/8 Chairman Goli, Shankar', 'Dhaka', 'ghgh', 3480, 'Antigua & Barbuda', 1786740107, '0', 'Cup60', 2400, 'New', 'COD', 1600, NULL, '2021-10-13 07:28:01', '2021-10-13 07:28:01'),
(53, 10, 'sazzadur@gmail.com', 'Mehdi Hasan', '97/8 Chairman Goli, Shankar', 'Dhaka', 'Dhaka', 3480, 'Bangladesh', 1786740107, '0', '', 0, 'New', 'COD', 250, NULL, '2021-10-11 12:50:21', '2021-10-11 12:50:21'),
(54, 10, 'sazzadur@gmail.com', 'Mehdi Hasan', '97/8 Chairman Goli, Shankar', 'Dhaka', 'Dhaka', 3480, 'Bangladesh', 1786740107, '0', '', 0, 'New', 'COD', 250, NULL, '2021-10-11 12:53:14', '2021-10-11 12:53:14'),
(52, 10, 'sazzadur@gmail.com', 'Mehdi Hasan', '97/8 Chairman Goli, Shankar', 'Dhaka', 'Dhaka', 3480, 'Bangladesh', 1786740107, '0', '', 0, 'New', 'COD', 1200, NULL, '2021-10-11 12:47:06', '2021-10-11 12:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

DROP TABLE IF EXISTS `orders_products`;
CREATE TABLE IF NOT EXISTS `orders_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `user_id`, `product_id`, `product_code`, `product_name`, `product_size`, `product_color`, `product_price`, `product_qty`, `created_at`, `updated_at`) VALUES
(69, 63, 11, 3, '#sku-1234', '2020 Summer Women\'s Crop Top', 'Small', 'black', 250, 1, '2021-10-17 08:38:32', '2021-10-17 08:38:32'),
(68, 62, 11, 3, '#sku-1234', '2020 Summer Women\'s Crop Top', 'Small', 'black', 250, 1, '2021-10-17 08:28:43', '2021-10-17 08:28:43'),
(67, 61, 11, 3, '#sku-1234', '2020 Summer Women\'s Crop Top', 'Small', 'black', 250, 1, '2021-10-17 08:27:52', '2021-10-17 08:27:52'),
(66, 60, 11, 3, '#sku-1234', '2020 Summer Women\'s Crop Top', 'Small', 'black', 250, 1, '2021-10-17 08:27:03', '2021-10-17 08:27:03'),
(65, 59, 11, 3, '#sku-1234', '2020 Summer Women\'s Crop Top', 'Small', 'black', 250, 1, '2021-10-17 08:26:34', '2021-10-17 08:26:34'),
(64, 58, 11, 2, '#sku-122346', 'Xaiomi', '2GB', 'green, red', 250, 1, '2021-10-17 08:22:54', '2021-10-17 08:22:54'),
(63, 57, 11, 2, '#sku-122346', 'Xaiomi', '2GB', 'green, red', 250, 1, '2021-10-17 08:18:06', '2021-10-17 08:18:06'),
(62, 56, 11, 2, '#sku-122346', 'Xaiomi', '2GB', 'green, red', 250, 1, '2021-10-17 08:18:05', '2021-10-17 08:18:05'),
(60, 55, 11, 7, '#sku-s10', 'Men Comfortable Converse', 'Small', 'black', 200, 5, '2021-10-13 07:28:01', '2021-10-13 07:28:01'),
(61, 55, 11, 2, 'SKU#L67', 'Xaiomi', '3GB', 'green, red', 600, 5, '2021-10-13 07:28:01', '2021-10-13 07:28:01'),
(59, 54, 10, 4, '#sku-111', 'Women White Watch', 'Small', 'black', 250, 1, '2021-10-11 12:53:14', '2021-10-11 12:53:14'),
(57, 52, 10, 2, 'SKU#L67', 'Xaiomi', '3GB', 'green, red', 600, 2, '2021-10-11 12:47:06', '2021-10-11 12:47:06'),
(58, 53, 10, 4, '#sku-111', 'Women White Watch', 'Small', 'black', 250, 1, '2021-10-11 12:50:21', '2021-10-11 12:50:21');

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `care` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_code`, `product_color`, `description`, `care`, `price`, `image`, `featured`, `created_at`, `updated_at`, `status`) VALUES
(2, 8, 'Xaiomi', '240WCD', 'green, red', 'Metal bodyertert', 'SXSXSX', 300.00, '1798.png', 1, '2021-01-28 13:48:16', '2021-10-14 02:08:47', 1),
(3, 8, '2020 Summer Women\'s Crop Top', 'SM34', 'black', 'Suitable for all hips 100% BRAND NEW Size: Please compare the detail sizes with yours, please allow 1-3cm differs due to manual measurement (All measurement in cm and please note 1cm=0.39inch) Attention: As different computers display colors differently, the color of the actual item may vary slightly from the above images, thanks for your understanding', 'Pure Corton and Wash', 234.00, '912.jpg', 1, '2021-01-29 02:30:17', '2021-10-14 02:08:55', 1),
(4, 8, 'Women White Watch', 'SM34', 'black', 'women dress are goes to here', 'Pure Corton and Wash', 234.00, '9407.jpg', 1, '2021-02-06 11:51:19', '2021-10-14 02:09:07', 1),
(5, 7, 'Women White Watch', 'SM34', 'black', 'women dress are goes to here', 'Pure Corton and Wash', 234.00, '4437.jpg', 1, '2021-02-07 07:26:57', '2021-10-14 01:55:12', 1),
(6, 7, '8yjg', 'SM34', 'black', 'women dress are goes to here', 'Pure Corton and Wash', 234.00, '3651.jpg', 1, '2021-02-07 14:01:50', '2021-10-14 01:55:18', 1),
(7, 7, 'Men Comfortable Converse', 'SM34', 'black', 'women dress are goes to here', 'Pure Corton and Wash', 234.00, '5022.jpg', 1, '2021-02-21 09:41:17', '2021-10-14 01:56:18', 1),
(8, 7, 'Men Comfortable Converse', 'SM34', 'black', 'Suitable for all hips 100% BRAND NEW Size: Please compare the detail sizes with yours, please allow 1-3cm differs due to manual measurement (All measurement in cm and please note 1cm=0.39inch) Attention : As different computers display colors differently, the color of the actual item may vary slightly from the above images, thanks for your understanding', 'Pure Corton and Wash', 500.00, '6784.jpg', 1, '2021-02-21 09:42:21', '2021-10-14 01:55:45', 1),
(9, 7, 'Shop Beauty, Vitamins & Health Essentials - CVS Pharmacy', 'DJH30', 'Green', 'Shop Beauty, Vitamins & Health Essentials - CVS PharmacyShop Beauty, Vitamins & Health Essentials - CVS PharmacyShop Beauty, Vitamins & Health Essentials - CVS PharmacyShop Beauty, Vitamins & Health Essentials - CVS PharmacyShop Beauty, Vitamins & Health Essentials - CVS PharmacyShop Beauty, Vitamins & Health Essentials - CVS PharmacyShop Beauty, Vitamins & Health Essentials - CVS PharmacyShop Beauty, Vitamins & Health Essentials - CVS PharmacyShop Beauty, Vitamins & Health Essentials - CVS PharmacyShop Beauty, Vitamins & Health Essentials - CVS PharmacyShop Beauty, Vitamins & Health Essentials - CVS Pharmacy', 'silver', 3000.00, '7136.jpg', 1, '2021-10-13 22:23:34', '2021-10-13 22:30:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

DROP TABLE IF EXISTS `products_attributes`;
CREATE TABLE IF NOT EXISTS `products_attributes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `sku`, `size`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 1, '#sku-1233', 'Small', 200.00, 5, '2021-01-29 02:39:29', '2021-02-26 10:01:24'),
(3, 1, '#sku-M5', 'Medium', 100.00, 20, '2021-01-29 02:59:49', '2021-02-26 10:01:24'),
(4, 1, 'SKU#L6', 'Large', 2882.00, 10, '2021-01-29 03:00:23', '2021-02-26 10:01:24'),
(5, 3, '#sku-1234', 'Small', 250.00, 10, '2021-01-29 03:36:05', '2021-02-18 07:56:59'),
(6, 2, '#sku-12234', '4GB', 600.00, 10, '2021-02-26 10:02:38', '2021-02-26 10:02:38'),
(7, 2, '#sku-122346', '2GB', 250.00, 60, '2021-02-26 10:03:12', '2021-02-26 10:03:12'),
(8, 2, 'SKU#L67', '3GB', 600.00, 10, '2021-02-26 10:03:31', '2021-02-26 10:03:31'),
(9, 4, '#sku-111', 'Small', 250.00, 2, '2021-02-26 10:04:45', '2021-02-26 10:04:45'),
(10, 4, '#sku-112', 'Medium', 250.00, 10, '2021-02-26 10:04:45', '2021-02-26 10:04:45'),
(11, 4, '#sku-123', 'Large', 260.00, 10, '2021-02-26 10:04:45', '2021-02-26 10:04:45'),
(12, 7, '#sku-121', '6', 600.00, 10, '2021-02-26 10:05:56', '2021-02-26 10:05:56'),
(13, 7, '#sku-122', '7', 600.00, 10, '2021-02-26 10:05:56', '2021-02-26 10:05:56'),
(14, 7, '#sku-s10', 'Small', 200.00, 6, '2021-02-26 10:06:50', '2021-02-26 10:06:50'),
(15, 7, '#sku-s11', 'Medium', 200.00, 60, '2021-02-26 10:06:50', '2021-02-26 10:06:50'),
(16, 8, 'SKU#L1', 'Small', 600.00, 10, '2021-02-26 10:08:22', '2021-02-26 10:08:22'),
(17, 8, 'SKU#L2', 'Medium', 250.00, 4, '2021-02-26 10:08:22', '2021-02-26 10:08:22'),
(18, 8, 'SKU#L3', 'Large', 600.00, 10, '2021-02-26 10:08:22', '2021-02-26 10:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

DROP TABLE IF EXISTS `products_images`;
CREATE TABLE IF NOT EXISTS `products_images` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, '5349.jpg', '2021-02-06 14:19:47', '2021-02-06 14:19:47'),
(2, 2, '4225.png', '2021-02-06 14:19:47', '2021-02-06 14:19:47'),
(9, 1, '1892.png', '2021-02-06 16:09:25', '2021-02-06 16:09:25'),
(8, 1, '8940.png', '2021-02-06 16:09:25', '2021-02-06 16:09:25'),
(6, 4, '5706.jpg', '2021-02-06 15:13:00', '2021-02-06 15:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

DROP TABLE IF EXISTS `shipping_addresses`;
CREATE TABLE IF NOT EXISTS `shipping_addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `country` text NOT NULL,
  `postcode` varchar(100) NOT NULL,
  `mobile` int(15) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_addresses`
--

INSERT INTO `shipping_addresses` (`id`, `user_id`, `email`, `name`, `address`, `city`, `state`, `country`, `postcode`, `mobile`, `created_at`, `updated_at`) VALUES
(2, 10, 'sazzadur@gmail.com', 'Mehdi Hasan', '97/8 Chairman Goli, Shankar', 'Dhaka', 'Dhaka', 'Bangladesh', '3480', 1786740107, '2021-10-05 18:26:00', '2021-10-11 12:50:16'),
(3, 11, 'sazzadursd@gmail.com', '97/8 Chairman Goli, Shankar', '97/8 Chairman Goli, Shankar', 'Dhaka', 'ghgh', 'Antigua & Barbuda', '3480', 1786740107, '2021-10-05 18:26:00', '2021-10-17 08:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` int(15) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `city`, `country`, `state`, `postcode`, `mobile`, `password`, `admin`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(10, 'Mehdi Hasan', 'admin@gmail.com', '97/8 Chairman Goli, Shankar', 'Dhaka', 'Bangladesh', 'Dhaka', '3480', 1786740107, '$2y$10$lb/dMoSQBvmBUsI2qE3dq.h82nJVdN5RqhKMJfNhtnqgIDm9OXfQa', 0, 'LA0IOqRJclvBuwJil2tzPAIoGuFeGiQyYZxWt3AjCI3PHW1yNWYs2KWp2Ul5', 1, '2021-10-11 12:12:47', '2021-10-14 00:02:20'),
(11, '97/8 Chairman Goli, Shankar', 'web@gmail.com', '97/8 Chairman Goli, Shankar', 'Dhaka', 'Antigua & Barbuda', 'ghgh', '3480', 1786740107, '$2y$10$NM/dNn08OW./iYIU7PC9ieAy2YwEzPk7dzPrq0FgAcmJHo9sHDcvi', 0, '1ILcWBMFq5PX8p4gR5g6KpwwnQHlBn9KKu62xykDGFLZ1SRqcSJ4nkSGNgSL', 1, '2021-10-13 00:20:21', '2021-10-17 08:38:27'),
(12, 'Md. Sazzadur Rahman', 'sazzadurrahman580@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$XP/kLRKDNTvWdYxWQdkWZeB6cJZZ764T1RUxMZ2/n7XBqgxF1AtE2', 0, 'bt3XdgymnsYXfHSv14x3Ku16PSmtKIDyzgurwjpodurv7yLDocTIZgxMNSrG', 1, '2021-10-13 00:30:37', '2021-10-14 00:10:16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
