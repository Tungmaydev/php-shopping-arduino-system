-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2024 at 08:21 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arduino`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_gallery`
--

CREATE TABLE `activity_gallery` (
  `activity_id` int(30) NOT NULL,
  `activity_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_gallery`
--

INSERT INTO `activity_gallery` (`activity_id`, `activity_name`, `date`) VALUES
(1, 'ทดสอบครีมกับหน้าเจ้าของแบรนด์', '2015-01-01'),
(2, 'เช็กสภาพแพคเก็จก่อนถึงมือลูกค้า', '2015-02-02'),
(3, 'Before-After เริดเว่อร์..!', '2015-03-03'),
(4, 'Magic..เคล็บไม่ลับ', '2015-04-04'),
(5, 'Magic ท่องเมืองคำสาป(Langkawi)', '2015-04-05'),
(6, 'สาวๆ Magic', '2015-04-05'),
(7, 'ใช้ดีมีแต่บอกต่อ', '2015-07-20'),
(8, 'Magic ครองใจสาวๆต่างแดน', '2015-07-22'),
(9, '\" สั่งกันจริง ส่งกันจัง \"', '2015-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `men_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`men_id`, `username`, `password`, `name`, `type_id`) VALUES
(1, 'admin1', 'admin1', 'คุณadmin1', 1),
(2, 'admin2', 'admin2', 'คุณadmin2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ct_id` int(10) NOT NULL,
  `ct_date` datetime DEFAULT NULL,
  `subTotal` decimal(10,0) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ct_id`, `ct_date`, `subTotal`) VALUES
(147, '2017-01-19 02:37:55', '1200'),
(161, '2017-01-20 04:47:10', '40'),
(162, '2017-01-20 04:47:17', '40'),
(165, '2017-01-20 04:57:15', '1200'),
(166, '2017-01-20 04:57:36', '82');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `ct_id` int(10) UNSIGNED NOT NULL,
  `pd_id` int(10) NOT NULL,
  `ct_qty` mediumint(8) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`ct_id`, `pd_id`, `ct_qty`) VALUES
(147, 4, 1),
(161, 3, 1),
(162, 3, 1),
(165, 4, 1),
(166, 6, 1),
(166, 3, 2),
(166, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `main_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `main_id`) VALUES
(12, 'IC Arduino', 9),
(13, 'IC เรกูเลต', 9),
(14, 'IC เซนเซอร์', 9),
(15, 'LED', 10),
(16, 'โมดูลจอ LCD ', 10),
(17, 'โมดูลจอแสดงผล OLED ', 10),
(18, 'LED Module', 10),
(19, 'โมดูล 7 Semgnet แสดงตัวเลขอเนกประสงค์', 11),
(20, '7 segment 1 หลัก', 11),
(21, 'IC IO/Driver', 9),
(22, 'IC ใช้งานพื้นฐาน', 9),
(23, '7 segment 2 หลัก', 11),
(24, '7 segment 3 หลัก', 11),
(25, '7 segment 4 หลัก', 11),
(26, 'Servo', 12),
(27, 'Motor', 12),
(28, 'โมดูลขับมอเตอร์', 12),
(29, 'Smart Car', 12),
(30, 'USB Power', 13),
(31, ' เรกูเลเตอร์ Step Up', 13),
(32, 'เรกูเลเตอร์ Step Down', 13),
(33, 'เรกูเลเตอร์ Step Up&Down', 13),
(34, 'แหล่งจ่ายไฟอะแดปเตอร์ / Adapter', 13),
(35, 'เซนเซอร์ความเร่ง / ไจโร / IMU', 14),
(36, 'เซนเซอร์วัดระยะทาง', 14),
(37, ' เซนเซอร์แสงและการมองเห็น', 14),
(38, 'เซนเซอร์ตรวจจับความเคลื่อนไหว', 14),
(39, 'เซนเซอร์วัดสภาพแวดล้อม', 14),
(40, '               เซนเซอร์แก๊ส', 14);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(20) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `activity_id` int(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `activity_id`) VALUES
(178, ' 30.jpg ', 1),
(179, ' 26.jpg ', 1),
(174, ' 019.jpg ', 1),
(87, '010.jpg', 4),
(89, '012.jpg', 4),
(239, ' 239.JPG ', 8),
(94, ' 20.jpg ', 6),
(95, ' 24.jpg ', 6),
(96, ' 42.jpg ', 6),
(97, ' 41.jpg ', 6),
(98, ' 59.jpg ', 6),
(99, ' 81.jpg ', 6),
(100, ' 82.jpg ', 6),
(109, ' 85.jpg ', 6),
(110, ' 86.jpg ', 6),
(111, ' 87.jpg ', 6),
(113, ' 103.jpg ', 6),
(114, ' 104.jpg ', 6),
(115, ' 107.jpg ', 6),
(116, ' 108.jpg ', 6),
(117, ' 102.jpg ', 6),
(118, ' 99.jpg ', 6),
(119, ' 109.jpg ', 6),
(120, ' 91.jpg ', 6),
(121, ' 52.jpg ', 7),
(122, ' 94.jpg ', 7),
(123, ' 49.jpg ', 7),
(124, ' 50.jpg ', 7),
(125, ' 55.jpg ', 7),
(126, ' 78.jpg ', 7),
(127, ' 66.jpg ', 7),
(138, ' 95.jpg ', 7),
(129, ' 97.jpg ', 7),
(130, ' 114.jpg ', 7),
(131, ' 39.jpg ', 7),
(132, ' 45.jpg ', 7),
(133, ' 90.jpg ', 7),
(134, ' 117.jpg ', 7),
(135, ' 31.jpg ', 7),
(136, ' 48.jpg ', 7),
(137, ' 115.jpg ', 7),
(139, ' 116.jpg ', 7),
(140, ' 98.jpg ', 7),
(141, ' 34.jpg ', 7),
(142, ' 36.jpg ', 7),
(143, ' 119.jpg ', 7),
(144, ' 37.jpg ', 7),
(145, ' 97.jpg ', 7),
(173, ' 11.jpg ', 2),
(172, ' 014.jpg ', 2),
(171, ' 14.jpg ', 2),
(169, ' 015.jpg ', 2),
(170, ' 17.jpg ', 2),
(167, ' 0000000000000.jpg ', 2),
(166, ' 19.jpg ', 2),
(164, ' 16.jpg ', 2),
(165, ' 15.jpg ', 2),
(181, ' 136.jpg ', 1),
(182, ' 122.jpg ', 1),
(177, ' 123.jpg ', 1),
(183, ' 128.jpg ', 1),
(184, ' 134.jpg ', 1),
(185, ' 132.jpg ', 1),
(186, ' 127.jpg ', 1),
(187, ' 189.jpg ', 1),
(226, ' 226.jpg ', 1),
(191, ' 30.jpg ', 3),
(193, ' 61.jpg ', 3),
(194, ' 88.jpg ', 3),
(231, ' 231.jpg ', 6),
(230, ' 230.jpg ', 3),
(229, ' 229.jpg ', 3),
(228, ' 228.jpg ', 3),
(227, ' 227.jpg ', 3),
(224, ' 224.jpg ', 6),
(223, ' 223.jpg ', 6),
(221, ' 221.jpg ', 6),
(222, ' 222.jpg ', 6),
(219, ' 214.jpg ', 6),
(220, ' 220.jpg ', 6),
(225, ' 225.jpg ', 6),
(232, ' 232.jpg ', 6),
(233, ' 233.jpg ', 6),
(234, ' 234.jpg ', 3),
(235, ' 235.jpg ', 3),
(236, ' 236.jpg ', 3),
(237, ' 237.jpg ', 3),
(238, ' 238.JPG ', 5),
(240, ' 240.JPG ', 8),
(243, ' 243.jpg ', 8),
(242, ' 242.jpg ', 8),
(244, ' 244.jpg ', 8),
(245, ' 245.jpg ', 8),
(246, ' 246.jpg ', 8),
(247, ' 247.jpg ', 8),
(248, ' 248.jpg ', 8),
(249, ' 249.jpg ', 8),
(250, ' 250.jpg ', 8),
(251, ' 251.jpg ', 8),
(252, ' 252.jpg ', 8),
(253, ' 253.jpg ', 8),
(254, ' 254.jpg ', 8),
(255, ' 255.jpg ', 8),
(256, ' 256.jpg ', 8),
(257, ' 257.jpg ', 8),
(258, ' 258.jpg ', 8),
(259, ' 259.jpg ', 8),
(260, ' 260.jpg ', 5),
(261, ' 261.jpg ', 5),
(262, ' 262.jpg ', 5),
(263, ' 263.jpg ', 5),
(264, ' 264.jpg ', 5),
(265, ' 265.jpg ', 6),
(266, ' 266.jpg ', 6),
(268, ' 267.jpg ', 9),
(269, ' 269.jpg ', 9),
(270, ' 270.jpg ', 9),
(271, ' 271.jpg ', 9),
(272, ' 272.jpg ', 9),
(273, ' 273.jpg ', 9),
(274, ' 274.jpg ', 9),
(275, ' 275.jpg ', 9),
(276, ' 276.jpg ', 9),
(277, ' 277.jpg ', 9),
(278, ' 278.jpg ', 9),
(279, ' 279.jpg ', 9),
(280, ' 280.jpg ', 9),
(281, ' 281.jpg ', 9),
(282, ' 282.jpg ', 9),
(283, ' 283.jpg ', 9),
(284, ' 284.jpg ', 9),
(285, ' 285.jpg ', 9),
(287, ' 287.jpg ', 9),
(288, ' 288.jpg ', 9),
(289, ' 289.jpg ', 9),
(290, ' 290.jpg ', 9),
(291, ' 291.jpg ', 9),
(294, ' 294.jpg ', 9),
(295, ' 295.jpg ', 9),
(296, ' 296.jpg ', 9),
(297, ' 297.jpg ', 9),
(298, ' 298.jpg ', 9),
(299, ' 299.jpg ', 9),
(300, ' 300.jpg ', 9),
(301, ' 301.jpg ', 9),
(302, ' 302.jpg ', 9),
(303, ' 303.jpg ', 9),
(304, ' 304.jpg ', 9),
(305, ' 305.jpg ', 9),
(306, ' 306.jpg ', 9),
(307, ' 307.jpg ', 9),
(308, ' 308.jpg ', 9),
(309, ' 309.jpg ', 9),
(310, ' 310.jpg ', 8),
(311, ' 311.jpg ', 6),
(312, ' 312.jpg ', 6),
(313, ' 313.jpg ', 7),
(314, ' 314.jpg ', 7),
(315, ' 315.jpg ', 7),
(316, ' 316.jpg ', 3),
(317, ' 317.jpg ', 6),
(318, ' 318.jpg ', 6),
(319, ' 319.jpg ', 6),
(320, ' 320.jpg ', 6);

-- --------------------------------------------------------

--
-- Table structure for table `main_category`
--

CREATE TABLE `main_category` (
  `main_id` int(10) UNSIGNED NOT NULL,
  `main_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_category`
--

INSERT INTO `main_category` (`main_id`, `main_name`) VALUES
(9, 'IC'),
(10, 'LCD/LED '),
(11, 'LED 7 Segment '),
(12, 'Servo / Motor / Car'),
(13, 'Power / Regulator'),
(14, 'Sensors / Modules / Shield'),
(15, 'โมดูลบอร์ดรีเลย์'),
(16, 'Socket / PCB'),
(17, 'Electronic component');

-- --------------------------------------------------------

--
-- Table structure for table `member_customers`
--

CREATE TABLE `member_customers` (
  `member_id` int(11) UNSIGNED NOT NULL,
  `member_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create` date NOT NULL,
  `active` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_bank`
--

CREATE TABLE `order_bank` (
  `pay_id` int(10) UNSIGNED NOT NULL,
  `od_id` int(10) NOT NULL,
  `bankname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `amt` decimal(9,2) NOT NULL DEFAULT 0.00,
  `imge` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `other` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slip_date` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `od_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `pd_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `od_qty` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`od_id`, `pd_id`, `od_qty`) VALUES
(1357, 6, 1),
(1356, 4, 69),
(1356, 7, 95),
(1355, 7, 1),
(1355, 8, 1),
(1354, 4, 1),
(1354, 8, 1),
(1354, 13, 1),
(1353, 4, 1),
(1353, 10, 1),
(1353, 6, 1),
(1352, 4, 1),
(1352, 6, 1),
(1351, 5, 1),
(1350, 13, 1),
(1350, 4, 2),
(1349, 6, 1),
(1359, 3, 2),
(1360, 3, 1),
(1361, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pd_id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `pd_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pd_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pd_price` decimal(9,2) NOT NULL DEFAULT 0.00,
  `pd_qty` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `date_ship` int(10) UNSIGNED NOT NULL,
  `pd_image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pd_id`, `cat_id`, `pd_code`, `pd_name`, `pd_price`, `pd_qty`, `date_ship`, `pd_image`) VALUES
(3, 12, 'A16001ABK', 'ATMEGA32A-PU ATMEGA32 ATMEGA32A DIP IC', '40.00', 49, 7, 'A16001ABK.png'),
(4, 12, 'A16002ABK', 'ATTINY 85 Arduino', '1200.00', 49, 3, 'A16002ABK.jpg'),
(5, 12, 'A16003ABK', 'ATTINY13 ATTINY13A ATTINY13A-SSU', '1.00', 52, 5, 'A16003ABK.jpg'),
(6, 13, 'B16001ABK', '7805 Voltage Regulator IC 5V 1.5A TO-220', '1.00', 49, 4, 'B16001ABK.jpg'),
(7, 15, 'C16001ABK', '10 Segment LED Bar Graph สีเขียว', '1.00', 0, 4, 'C16001ABK.jpg'),
(8, 15, 'C16002ABK', '10 Segment LED Bar Graph สีแดง', '1.00', 95, 4, 'C16002ABK.jpg'),
(9, 15, 'C16003ABK', '7 Colors LED Blinking Module Automatic flashing colorful LED', '1.00', 100, 3, 'C16003ABK.jpg'),
(10, 13, 'B16002ABK', '78L05 L78L05 5V 100mA 0.1A Voltage Regulator TO-92', '1.00', 99, 4, 'B16002ABK.jpg'),
(11, 13, 'B16003ABK', 'AMS1117-5.0 AMS1117-5.0V AMS1117 1117 5V 1A Voltage Regulato', '1.00', 100, 4, 'B16003ABK.jpg'),
(12, 13, 'B16004ABK', 'IC 7809 เรกูเลต 9 โวลต์', '1.00', 100, 4, 'B16004ABK.jpg'),
(13, 13, 'B16005ABK', 'IC 78L12 12V 100mA 0.1A Voltage Regulator TO-92', '1.00', 98, 6, 'B16005ABK.jpg'),
(14, 13, 'B16006ABK', 'IC เรกูเลต 3.3V 7533A-1 HT7533 HT7533A-1 TO-92 Voltage Regul', '1.00', 100, 2, 'B16006ABK.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_currency`
--

CREATE TABLE `tbl_currency` (
  `cy_id` int(10) UNSIGNED NOT NULL,
  `cy_code` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `cy_symbol` varchar(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_currency`
--

INSERT INTO `tbl_currency` (`cy_id`, `cy_code`, `cy_symbol`) VALUES
(1, 'EUR', '&#8364;'),
(2, 'GBP', '&pound;'),
(4, 'USD', '$'),
(5, 'THB', 'THB');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `od_id` int(10) UNSIGNED NOT NULL,
  `member_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `od_date` datetime DEFAULT NULL,
  `od_last_update` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `od_status` enum('New','Paid','Confirm_Paid') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'New',
  `ship` text COLLATE utf8_unicode_ci NOT NULL,
  `od_shipping_first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `od_shipping_last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `od_shipping_address1` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `od_shipping_address2` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `od_shipping_phone` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `od_shipping_city` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `od_shipping_state` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `od_shipping_postal_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `od_shipping_cost` decimal(5,2) DEFAULT 0.00,
  `od_pd_Total` decimal(9,2) DEFAULT 0.00,
  `od_shipping_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `od_payment_first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `od_payment_last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `od_payment_address1` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `od_payment_address2` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `od_payment_phone` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `od_payment_city` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `od_payment_state` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `od_payment_postal_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `od_payment_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop_config`
--

CREATE TABLE `tbl_shop_config` (
  `sc_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sc_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sc_phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sc_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sc_shipping_cost` decimal(5,2) NOT NULL DEFAULT 0.00,
  `sc_currency` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `sc_order_email` enum('y','n') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_shop_config`
--

INSERT INTO `tbl_shop_config` (`sc_name`, `sc_address`, `sc_phone`, `sc_email`, `sc_shipping_cost`, `sc_currency`, `sc_order_email`) VALUES
('jeerawuth shop', '99/623 หมู่ 4 ต. กระแชง อ. &', '080-0000000', 'jeerawuth@me.com', '0.00', 5, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_password` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_regdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_password`, `user_regdate`, `user_last_login`) VALUES
(1, 'admin', '1111', '2005-02-20 17:35:44', '2016-01-06 15:27:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_gallery`
--
ALTER TABLE `activity_gallery`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`men_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`ct_id`,`pd_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `cat_name` (`cat_name`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_category`
--
ALTER TABLE `main_category`
  ADD PRIMARY KEY (`main_id`);

--
-- Indexes for table `member_customers`
--
ALTER TABLE `member_customers`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `order_bank`
--
ALTER TABLE `order_bank`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`od_id`,`pd_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pd_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `pd_name` (`pd_name`);

--
-- Indexes for table `tbl_currency`
--
ALTER TABLE `tbl_currency`
  ADD PRIMARY KEY (`cy_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`od_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_gallery`
--
ALTER TABLE `activity_gallery`
  MODIFY `activity_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `men_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ct_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT for table `main_category`
--
ALTER TABLE `main_category`
  MODIFY `main_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `member_customers`
--
ALTER TABLE `member_customers`
  MODIFY `member_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `order_bank`
--
ALTER TABLE `order_bank`
  MODIFY `pay_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_currency`
--
ALTER TABLE `tbl_currency`
  MODIFY `cy_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `od_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1362;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
