-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 04, 2019 at 04:39 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_name` varchar(250) NOT NULL,
  `category_status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `user_id`, `category_name`, `category_status`) VALUES
(61, 2, 'Radiator', 'active'),
(63, 2, 'Raw Material', 'active'),
(64, 2, 'laptop', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rate` varchar(255) NOT NULL,
  `po_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `name`, `msg`, `date`, `rate`, `po_code`) VALUES
(60, 'swax', 'My  change', '2018-10-01 04:59:50', '', ''),
(65, '4333', '6406f', '2018-10-01 05:26:51', '12', ''),
(66, '4666', 'lgch1', '2018-10-01 05:26:51', '76', ''),
(67, '12', 'hp1002', '2018-10-01 05:38:41', '13', 'po_code'),
(68, '12fd', 'lgch1', '2018-10-01 05:39:46', '43', 'pocode1'),
(69, '43', '6406f', '2018-10-01 05:39:46', '23', ''),
(70, '', '', '2018-10-30 04:03:22', '', 'I'),
(71, '', '', '2018-10-30 04:10:33', '', 'INPO201018-2'),
(72, '', '', '2018-10-30 05:32:51', '', 'INPO201018-2'),
(73, '43', '', '2018-10-30 05:37:19', '', 'INPO281018-12');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(240) NOT NULL,
  `user_id` varchar(240) NOT NULL,
  `ip_address` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`, `user_id`, `ip_address`) VALUES
(3, 'Hr', '', ''),
(5, 'Admin', '', ''),
(6, 'Admission', '', ''),
(7, 'laptop', '', ''),
(8, 'Sale', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `item_name` varchar(300) NOT NULL,
  `item_code` varchar(250) DEFAULT NULL,
  `item_description` text NOT NULL,
  `item_status` enum('active','inactive') NOT NULL,
  `item_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `category_id`, `brand_id`, `item_name`, `item_code`, `item_description`, `item_status`, `item_qty`) VALUES
(33, 61, 0, 'da', 'asd', 'dsaaa', 'active', -200),
(34, 61, 0, 'da', 'asd', 'dsaaa', 'active', -150),
(35, 61, 0, 'da', 'asd', 'dsaaa', 'active', -200),
(36, 61, 0, 'da', 'asd', 'dsaaa', 'active', -120),
(37, 61, 0, 'da', 'asd', 'dsaaa', 'active', -150),
(38, 61, 0, 'da', 'asd', 'dsaaa', 'active', -100),
(39, 61, 0, 'da', 'asd', 'dsaaa', 'active', -100),
(40, 61, 0, 'test1', 'asd', 'description test1', 'active', -100),
(41, 61, 0, 'da', 'asd', 'dsaaa', 'active', -100),
(42, 61, 0, 'da', 'asd', 'dsaaa', 'active', -100),
(43, 61, 0, 'da', 'asd', 'dsaaa', 'active', -100),
(44, 61, 0, 'Radiator', 'asd', 'dsaaa', 'active', -100),
(45, 63, 0, 'qwe', 'ewq', 'rewqd', 'active', 0),
(46, 61, 0, 'wer', 'rw', 'test', 'active', 0),
(47, 64, 0, 'core i5', 'dell7440', 'core i 5 dell', 'active', -5743),
(48, 63, 0, '640 upper', 'Pipe', 'this is just test', 'active', -8651);

-- --------------------------------------------------------

--
-- Table structure for table `items_in_stock`
--

CREATE TABLE `items_in_stock` (
  `id` int(11) NOT NULL,
  `entry_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `item_name` varchar(300) NOT NULL,
  `item_code` varchar(250) DEFAULT NULL,
  `item_description` text,
  `po_code` varchar(50) DEFAULT NULL,
  `invoice_code` varchar(50) DEFAULT NULL,
  `item_qty` decimal(10,0) DEFAULT NULL,
  `item_rate` decimal(10,2) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `items_in_stock`
--

INSERT INTO `items_in_stock` (`id`, `entry_date`, `category_id`, `brand_id`, `item_name`, `item_code`, `item_description`, `po_code`, `invoice_code`, `item_qty`, `item_rate`, `date`, `store_id`) VALUES
(86, '2019-03-12 16:49:40', 0, 0, '', 'allwin6408f', NULL, 'PO12319 2', 'INPO12319 1', '90', '10000.00', '2019-03-12 16:49:40', 0),
(87, '2019-03-12 16:49:40', 0, 0, '', 'allwin6406f', NULL, 'PO12319 2', 'INPO12319 1', '50', '6500.00', '2019-03-12 16:49:40', 0),
(88, '2019-03-14 07:21:16', 0, 0, '', 'ovn 02 o3', NULL, 'PO14319 3', 'INPO14319 2', '-2', '10000.00', '2019-03-14 07:21:16', 0),
(89, '2019-04-06 07:13:45', 0, 0, '', 'dell7440', NULL, 'PO06419 4', 'INPO06419 3', '-40', '30000.00', '2019-04-06 07:13:45', 0),
(90, '2019-04-10 19:21:28', 0, 0, '', 'wat_digi', NULL, 'PO12319 1', 'INPO11419 4', '23', '32.00', '2019-04-10 19:21:28', 0),
(91, '2019-04-10 19:21:28', 0, 0, '', 'pj1620', NULL, 'PO12319 1', 'INPO11419 4', '20', '8100.00', '2019-04-10 19:21:28', 0),
(92, '2019-04-10 19:21:28', 0, 0, '', 'pj6407f', NULL, 'PO12319 1', 'INPO11419 4', '100', '9000.00', '2019-04-10 19:21:28', 0),
(93, '2019-04-10 19:21:44', 0, 0, '', 'asd', NULL, 'PO11419 5', 'INPO11419 5', '100', '32221.00', '2019-04-10 19:21:44', 0),
(94, '2019-04-10 19:31:02', 0, 0, '', 'dell7440', NULL, 'PO11419 6', 'INPO11419 6', '454', '1234.00', '2019-04-10 19:31:02', 0),
(95, '2019-04-13 03:03:24', 0, 0, '', 'Pipe', NULL, 'PO13419 7', 'INPO13419 7', '1000', '60.00', '2019-04-13 03:03:24', 0),
(96, '2019-04-13 06:00:41', 0, 0, '', 'Pipe', NULL, 'PO13419 8', 'INPO13419 8', '122', '50.00', '2019-04-13 06:00:41', 0),
(97, '2019-04-13 06:13:39', 0, 0, '', 'dell7440', NULL, 'PO13419 9', 'INPO13419 9', '34', '4311.00', '2019-04-13 06:13:39', 0),
(98, '2019-04-13 06:24:11', 0, 0, '', 'dell7440', NULL, 'PO13419 10', 'INPO13419 10', '431', '12.00', '2019-04-13 06:24:11', 3),
(99, '2019-04-13 06:26:58', 0, 0, '', 'dell7440', NULL, 'PO13419 11', 'INPO13419 11', '321', '123.00', '2019-04-13 06:26:58', 2),
(100, '2019-04-13 06:27:57', 0, 0, '', 'dell7440', NULL, 'PO13419 12', 'INPO13419 12', '4313', '1234.00', '2019-04-13 06:27:57', 3),
(101, '2019-04-13 06:27:57', 0, 0, '', 'Pipe', NULL, 'PO13419 12', 'INPO13419 12', '431', '123.00', '2019-04-13 06:27:57', 3),
(102, '2019-04-13 06:27:57', 0, 0, '', 'Pipe', NULL, 'PO13419 12', 'INPO13419 12', '321', '43.00', '2019-04-13 06:27:57', 3),
(103, '2019-04-13 06:31:08', 0, 0, '', 'Pipe', NULL, 'PO13419 13', 'INPO13419 13', '6777', '123.00', '2019-04-13 06:31:08', 3),
(104, '2019-04-15 18:06:58', 0, 0, '', 'rw', NULL, 'PO16419 15', 'INPO16419 14', '-30', '8100.00', '2019-04-15 18:06:58', 3),
(105, '2019-04-15 18:10:58', 0, 0, '', 'rw', NULL, 'PO16419 16', 'INPO16419 15', '2', '54.00', '2019-04-15 18:10:58', 2),
(106, '2019-04-15 18:17:06', 0, 0, '', 'rw', NULL, 'PO16419 17', 'INPO16419 16', '43', '7654.00', '2019-04-15 18:17:06', 3),
(107, '2019-04-15 18:18:53', 0, 0, '', 'ewq', NULL, 'PO16419 18', 'INPO16419 17', '321', '43.00', '2019-04-15 18:18:53', 2);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `security_question` varchar(255) NOT NULL,
  `type` enum('user','master','super_user') NOT NULL DEFAULT 'master',
  `contact` int(100) NOT NULL,
  `address` text NOT NULL,
  `name` varchar(200) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `session_id` int(100) NOT NULL,
  `session_sub_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `cnic`, `security_question`, `type`, `contact`, `address`, `name`, `updated_at`, `session_id`, `session_sub_id`) VALUES
(1, '0', 'admin123', '0', 'yes', 'super_user', 0, '0', '0', '2019-03-31 11:33:23', 0, 0),
(2, 'pakjalihouse@yahoo.com', 'admin123', '3120269441941', 'yes', 'master', 2147483647, 'pak jali house, Near Shama Canima Multan Road Bahawalpur.', 'Musawer ALi', '2019-03-31 11:33:23', 0, 0),
(3, 'email', '984443', '3120275554', '', 'user', 4033222, 'pak jali', 'Hamza', '2019-03-31 11:33:23', 0, 0),
(4, 'liaquat31202@gmail.com', '984413123', '31202899321', '', 'user', 2147483647, 'pak jali ', 'Musawer ali', '2019-03-31 11:33:23', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `phone_id` int(5) NOT NULL,
  `name` varchar(40) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `dimension` varchar(50) NOT NULL,
  `sim` varchar(50) NOT NULL,
  `display_type` varchar(50) NOT NULL,
  `display_size` varchar(50) NOT NULL,
  `resolution` varchar(50) NOT NULL,
  `os` varchar(50) NOT NULL,
  `chipset` varchar(50) NOT NULL,
  `cpu` varchar(50) NOT NULL,
  `gpu` varchar(50) NOT NULL,
  `cardslot` varchar(50) NOT NULL,
  `internal` varchar(50) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `cam_primary` varchar(40) NOT NULL,
  `cam_secondary` varchar(40) NOT NULL,
  `battery` varchar(30) NOT NULL,
  `image1` varchar(300) NOT NULL,
  `released_time` varchar(50) NOT NULL,
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`phone_id`, `name`, `brand`, `dimension`, `sim`, `display_type`, `display_size`, `resolution`, `os`, `chipset`, `cpu`, `gpu`, `cardslot`, `internal`, `ram`, `cam_primary`, `cam_secondary`, `battery`, `image1`, `released_time`, `price`) VALUES
(1, 'Huawei GR5 2017', 'Huawei', '150.9 x 76.2 x 8.2 mm', 'Hybrid Dual SIM (Nano-SIM, dual stand-by)', 'LTPS IPS LCD 16M colors', '5.5 inches', '1080 x 1920 pixels', 'Android 6.0 (Marshmallow)', 'HiSilicon Kirin 655', 'Octa-core', 'Mali-T830MP2', 'microSD, up to 256 GB', '32 GB', '3 GB RAM', '12 MP + 2MP', '8 MP', '3340mAh', '1.png', '2016, October', '27600 '),
(2, 'Samsung Galaxy J7 Prime', 'Samsung', '151.7 x 75 x 8 mm', 'Single SIM (Nano-SIM) or Dual SIM', 'PLS TFT 16M colors', '5.5 inches', '1080 x 1920 pixels', 'Android 6.0.1 (Marshmallow)', 'Exynos 7870 Octa', 'Octa-core 1.6 GHz ', 'Mali-T830 MP1', 'microSD, up to 256 GB', '32 GB', '3 GB RAM', '13 MP ', '8 MP', '3300mAh', '2.png', '2016, August', '29800'),
(3, 'Apple iPhone 7', 'Apple', '138.3 x 67.1 x 7.1 mm', 'Nano-SIM', 'LED-backlit IPS LCD 16M colors', '4.7 inches', '750 x 1334 pixels', 'iOS 10.0.1', 'Apple A10 Fusion', 'Quad-core 2.34 GHz', 'PowerVR Series7XT Plus', 'No', '32 GB', '2 GB RAM', '12 MP', '7 MP ', '1960mAh', '3.png', '2016, September', '110000'),
(4, 'HTC Desire 628', 'HTC', '146.9 x 70.9 x 8.1 mm', 'Dual SIM (Nano-SIM, dual stand-by)', 'IPS LCD 16M colors', '5.0 inches', '720 x 1280 pixels', 'Android 5.1 (Lollipop)', 'Mediatek MT6753', 'Octa-core 1.3 GHz Cortex-A53', 'Mali-T720MP3', 'microSD, up to 256 GB', '32 GB', '3 GB RAM', '13 MP', '5 MP', '2200mAh', '4.png', '2016, May', '22300'),
(5, 'Huawei Nova 2', 'Huawei', '142.2 x 68.9 x 6.9 mm', 'Hybrid Dual SIM (Nano-SIM, dual stand-by)', 'LTPS IPS LCD 16M colors', '5.0 inches', '1080 x 1920 pixels', 'Android 7.0 (Nougat)', 'HiSilicon Kirin 659', 'Octa-core', 'Mali-T830 MP2', 'microSD, up to 256 GB', '64 GB', '4 GB RAM', '12 MP + 8 MP', '20 MP', '2950mAh', '5.png', '2017, May', '37300'),
(6, 'Sony Xperia XZ', 'Sony', '146 x 72 x 8.1 mm', 'Single SIM (Nano-SIM) or Hybrid Dual SIM', 'IPS LCD 16M colors', '5.2 inches', '1080 x 1920 pixels', 'Android 6.0.1 (Marshmallow)', 'Qualcomm MSM8996 Snapdragon 820', 'Quad-core', 'Adreno 530', 'microSD, up to 256 GB', '32 GB', '3 GB RAM', '23 MP', '13MP', '2900mAh', '6.png', '2016, October', '53900 '),
(7, 'Samsung Galaxy J7 Max', 'Samsung', '148.9 x 71.9 x 7.9 mm', 'Dual SIM (Nano-SIM, dual stand-by)', 'PLS 16M colors', '5.7 inches', '1080 x 1920 pixels', 'Android 7.0 (Nougat)', 'Mediatek MT6757 Helio P20', 'Octa-core 2.4 GHz', 'Mali-T880MP2', 'microSD, up to 256 GB', '32GB', '4GB RAM', '13 MP', '13 MP', '3300mAh', '7.png', '2017, June', ' 32300 '),
(8, 'HTC ONE A9S ', 'HTC', '146.5 x 71.5 x 8 mm', 'Nano-SIM', 'Super LCD 16M colors', '5.0 inches', '720 x 1280 pixels', 'Android 6.0 (Marshmallow)', 'Mediatek MT6755 Helio P10', 'Octa-core', 'Mali-T860MP2', 'microSD, up to 256 GB', '32GB', '3GB RAM', '13MP', '5 MP', '2300mAh', '8.png', '2016, September', '31900 ');

-- --------------------------------------------------------

--
-- Table structure for table `po_invoice`
--

CREATE TABLE `po_invoice` (
  `id` int(11) NOT NULL,
  `po_code` varchar(50) DEFAULT NULL,
  `invoice_code` varchar(50) DEFAULT NULL,
  `invoice_total` decimal(11,2) DEFAULT NULL,
  `invoice_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `invoice_description` varchar(500) DEFAULT NULL,
  `invoice_status` enum('Active','Blocked') NOT NULL DEFAULT 'Active',
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_invoice`
--

INSERT INTO `po_invoice` (`id`, `po_code`, `invoice_code`, `invoice_total`, `invoice_date`, `invoice_description`, `invoice_status`, `store_id`) VALUES
(119, 'PO12319 2', 'INPO12319 1', '1325000.00', '2019-03-12 16:49:40', 'Recived Bilty No:3212\r\nRana Khalid \r\nRecived By: Manager\r\nBilty Charges 4310', 'Active', 0),
(120, 'PO14319 3', 'INPO14319 2', '470000.00', '2019-03-14 07:21:16', 'Recied bilty:5444\r\nRecev Owner', 'Active', 0),
(121, 'PO06419 4', 'INPO06419 3', '2820000.00', '2019-04-06 07:13:45', 'bilty:211p\r\nrecived:owner', 'Active', 0),
(122, 'PO12319 1', 'INPO11419 4', '1062736.00', '2019-04-10 19:21:28', 'test', 'Active', 0),
(123, 'PO11419 5', 'INPO11419 5', '3222100.00', '2019-04-10 19:21:43', 'test2', 'Active', 0),
(124, 'PO11419 6', 'INPO11419 6', '671296.00', '2019-04-10 19:31:01', 'recfre', 'Active', 0),
(125, 'PO13419 7', 'INPO13419 7', '60000.00', '2019-04-13 03:03:24', 'order  test', 'Active', 0),
(126, 'PO13419 8', 'INPO13419 8', '6100.00', '2019-04-13 06:00:40', 'ds', 'Active', 0),
(127, 'PO13419 9', 'INPO13419 9', '139245.30', '2019-04-13 06:13:39', 'test', 'Active', 2),
(128, 'PO13419 10', 'INPO13419 10', '5016.84', '2019-04-13 06:24:11', 'tesr', 'Active', 3),
(129, 'PO13419 11', 'INPO13419 11', '38298.51', '2019-04-13 06:26:57', 'treae', 'Active', 2),
(130, 'PO13419 12', 'INPO13419 12', '5389058.00', '2019-04-13 06:27:56', 'req', 'Active', 3),
(131, 'PO13419 13', 'INPO13419 13', '791892.45', '2019-04-13 06:31:07', 'rewqa', 'Active', 3),
(132, 'PO16419 15', 'INPO16419 14', '199584.00', '2019-04-15 18:06:57', 'test   sad', 'Active', 3),
(133, 'PO16419 16', 'INPO16419 15', '1676.16', '2019-04-15 18:10:58', 'te', 'Active', 2),
(134, 'PO16419 17', 'INPO16419 16', '322539.56', '2019-04-15 18:17:06', 'dsa', 'Active', 3),
(135, 'PO16419 18', 'INPO16419 17', '13664.97', '2019-04-15 18:18:53', 'testrttt', 'Active', 2);

-- --------------------------------------------------------

--
-- Table structure for table `po_invoice_detail`
--

CREATE TABLE `po_invoice_detail` (
  `id` int(11) NOT NULL,
  `invoice_code` varchar(50) DEFAULT NULL,
  `item_code` varchar(500) DEFAULT NULL,
  `item_qty` int(100) DEFAULT NULL,
  `item_rate` decimal(10,2) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `item_total` decimal(10,2) NOT NULL,
  `discount` int(100) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_invoice_detail`
--

INSERT INTO `po_invoice_detail` (`id`, `invoice_code`, `item_code`, `item_qty`, `item_rate`, `date`, `item_total`, `discount`, `store_id`) VALUES
(123, 'INPO12319 1', 'allwin6408f', 100, '10000.00', '2019-03-12 16:49:40', '1000000.00', 0, 0),
(124, 'INPO12319 1', 'allwin6406f', 50, '6500.00', '2019-03-12 16:49:40', '325000.00', 0, 0),
(125, 'INPO14319 2', 'ovn 02 o3', 50, '10000.00', '2019-03-14 07:21:16', '470000.00', 6, 0),
(126, 'INPO06419 3', 'dell7440', 100, '30000.00', '2019-04-06 07:13:45', '2820000.00', 6, 0),
(127, 'INPO11419 4', 'wat_digi', 23, '32.00', '2019-04-10 19:21:28', '736.00', 0, 0),
(128, 'INPO11419 4', 'pj1620', 20, '8100.00', '2019-04-10 19:21:28', '162000.00', 0, 0),
(129, 'INPO11419 4', 'pj6407f', 100, '9000.00', '2019-04-10 19:21:28', '900000.00', 0, 0),
(130, 'INPO11419 5', 'asd', 100, '32221.00', '2019-04-10 19:21:44', '3222100.00', 0, 0),
(131, 'INPO11419 6', 'dell7440', 544, '1234.00', '2019-04-10 19:31:01', '671296.00', 0, 0),
(132, 'INPO13419 7', 'Pipe', 1000, '60.00', '2019-04-13 03:03:24', '60000.00', 0, 0),
(133, 'INPO13419 8', 'Pipe', 122, '50.00', '2019-04-13 06:00:41', '6100.00', 0, 0),
(134, 'INPO13419 9', 'dell7440', 34, '4311.00', '2019-04-13 06:13:39', '139245.30', 5, 2),
(135, 'INPO13419 10', 'dell7440', 431, '12.00', '2019-04-13 06:24:11', '5016.84', 3, 3),
(136, 'INPO13419 11', 'dell7440', 321, '123.00', '2019-04-13 06:26:57', '38298.51', 3, 2),
(137, 'INPO13419 12', 'dell7440', 4313, '1234.00', '2019-04-13 06:27:57', '5322242.00', 0, 3),
(138, 'INPO13419 12', 'Pipe', 431, '123.00', '2019-04-13 06:27:57', '53013.00', 0, 3),
(139, 'INPO13419 12', 'Pipe', 321, '43.00', '2019-04-13 06:27:57', '13803.00', 0, 3),
(140, 'INPO13419 13', 'Pipe', 6777, '123.00', '2019-04-13 06:31:08', '791892.45', 5, 3),
(141, 'INPO16419 14', 'rw', 32, '8100.00', '2019-04-15 18:06:57', '199584.00', 23, 3),
(142, 'INPO16419 15', 'rw', 32, '54.00', '2019-04-15 18:10:58', '1676.16', 3, 2),
(143, 'INPO16419 16', 'rw', 43, '7654.00', '2019-04-15 18:17:06', '322539.56', 2, 3),
(144, 'INPO16419 17', 'ewq', 321, '43.00', '2019-04-15 18:18:53', '13664.97', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_description` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_unit` varchar(150) NOT NULL,
  `product_base_price` double(10,2) NOT NULL,
  `product_tax` decimal(4,2) NOT NULL,
  `product_minimum_order` double(10,2) NOT NULL,
  `product_enter_by` int(11) NOT NULL,
  `product_status` enum('active','inactive') NOT NULL,
  `product_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `brand_id`, `product_name`, `product_description`, `product_quantity`, `product_unit`, `product_base_price`, `product_tax`, `product_minimum_order`, `product_enter_by`, `product_status`, `product_date`) VALUES
(1, 1, 1, '4W LED Bulb', 'Base Type B22, E27\r\nBulb Material Aluminium\r\nItem Width 5 (cm)\r\nItem Height 10 (cm)\r\nItem Weight 0.07 (kg)', 100, 'Nos', 141.00, '12.00', 0.00, 1, 'active', '2017-11-08'),
(2, 1, 3, '17W B22 LED Bulb', 'Item Height 14.2 (cm)\r\nColor Temperature (Kelvin) 6500\r\nItem Weight 0.19 (kg)\r\nBulb Material Aluminium\r\nBase Color Aluminium\r\nVoltage 240\r\nUsages Household, Commercial, Kitchen', 150, 'Nos', 350.00, '12.00', 0.00, 1, 'active', '2017-11-08'),
(3, 8, 5, '18W LED Ceiling Light', 'Round Ceiling Light 18w', 75, 'Nos', 800.00, '5.00', 0.00, 1, 'active', '2017-11-08'),
(4, 8, 4, 'Round LED Ceiling Light', 'Relying on our expertise in this domain, we are into offering Round LED Ceiling Light. ', 50, 'Nos', 550.00, '12.00', 0.00, 1, 'active', '2017-11-08'),
(5, 6, 6, '7W LED Concealed Light', 'Dimension \'3\" \'\r\n50000 hours burning life\r\ncost effective\r\nhigh quality led', 85, 'Nos', 240.00, '15.00', 0.00, 1, 'active', '2017-11-08'),
(6, 6, 7, '9w LED Concealed Light', 'dimension \'3\" \'\r\n50000 hours burning life\r\ncost effective\r\nhigh quality led', 65, 'Nos', 250.00, '15.00', 0.00, 1, 'active', '2017-11-08'),
(7, 10, 9, '24W Street Light Led Driver', 'Dc Voltage 36v\r\nRated Current 600ma\r\nRated Power 22w', 120, 'Nos', 210.00, '12.00', 0.00, 1, 'active', '2017-11-08'),
(8, 10, 8, 'BP1601 ICs', 'Backed by immense industry-experience & latest designing techniques, we are engaged in providing BP1601 ICs.', 200, 'Nos', 15.00, '18.00', 0.00, 1, 'active', '2017-11-08'),
(9, 3, 11, '5W LED Square Downlight', 'Wattage: 5 Watt\r\nInput Voltage: 150V to 265V, 50/60Hz\r\nLumens: 500 lumen (approx)\r\nPower Factor: 0.90pf', 50, 'Nos', 400.00, '12.00', 0.00, 1, 'active', '2017-11-08'),
(10, 3, 10, '10W LED Square Downlight', 'Wattage: 10 Watt\r\nInput Voltage: 150V to 265V, 50/60Hz\r\nLumens: 1000 lumen (approx)\r\nPower Factor: 0.90pf', 40, 'Nos', 150.00, '18.00', 0.00, 1, 'active', '2017-11-08'),
(11, 5, 13, ' 9w Deluxe LED Lamp', 'Lighting Color Cool Daylight\r\nBase Type B22', 100, 'Nos', 85.00, '12.00', 0.00, 1, 'active', '2017-11-08'),
(12, 5, 12, '5w LED Lamp', 'Lighting Color Cool Daylight\r\nBody Material Aluminum\r\nBase Type B22', 75, 'Nos', 60.00, '12.00', 0.00, 1, 'active', '2017-11-08'),
(13, 2, 14, '15W Big LED Bay Light', 'Wattage: 15 Watt\r\nInput Voltage: 100V - 265V, 50/60Hz\r\nLumens: 1500 lumen (approx)\r\nPower Factor: 0.90pf', 60, 'Nos', 200.00, '18.00', 0.00, 1, 'active', '2017-11-08'),
(14, 2, 15, '15W Small LED Bay Light', 'Wattage: 15 Watt\r\nInput Voltage: 100V -265V, 50/60Hz\r\nLumens: 1500 lumen (approx)\r\nPower Factor: 0.90pf', 55, 'Nos', 250.00, '18.00', 0.00, 1, 'active', '2017-11-08'),
(15, 4, 16, '12W LED Panel Light', 'Body Material Aluminum\r\nLighting Type LED\r\nApplications Hotel, House, etc', 85, 'Nos', 125.00, '5.00', 0.00, 1, 'active', '2017-11-08'),
(16, 4, 17, '15W LED Panel Light', 'IP Rating IP40\r\nBody Material Aluminum\r\nLighting Type LED', 40, 'Nos', 175.00, '5.00', 0.00, 1, 'active', '2017-11-08'),
(17, 7, 19, '3W Round LED Spotlight', 'Lighting Color Cool White\r\nBody Material Aluminum\r\nCertification ISO\r\nInput Voltage(V) 12 V\r\nIP Rating IP33, IP40, IP44', 100, 'Nos', 60.00, '12.00', 0.00, 1, 'active', '2017-11-08'),
(18, 7, 18, '3W Square LED Spotlight', 'Lighting Color Cool White\r\nBody Material Aluminum\r\nInput Voltage(V) 12 V\r\nIP Rating IP33, IP40', 85, 'Nos', 90.00, '12.00', 0.00, 1, 'active', '2017-11-08'),
(19, 9, 20, '18W LED Tube Light', 'Tube Base Type T5\r\nIP Rating IP66', 180, 'Nos', 120.00, '18.00', 0.00, 1, 'active', '2017-11-08'),
(20, 9, 21, '10W Ready Tube Light', 'Body Material Aluminum, Ceramic\r\nPower 10W', 200, 'Nos', 100.00, '18.00', 0.00, 1, 'active', '2017-11-08'),
(21, 11, 22, '90W LED Flood Lights', 'Lighting Color Cool White, Pure White, Warm White\r\nBody Material Ceramic, Chrome, Iron\r\nIP Rating IP33, IP40, IP44, IP55, IP66', 20, 'Nos', 500.00, '18.00', 0.00, 1, 'active', '2017-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_qlty` varchar(255) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_bilty_no` varchar(255) NOT NULL,
  `item_type` varchar(255) NOT NULL,
  `item_location` varchar(255) NOT NULL,
  `item_company` varchar(255) NOT NULL,
  `item_code` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`item_id`, `item_name`, `item_qty`, `item_qlty`, `item_price`, `item_bilty_no`, `item_type`, `item_location`, `item_company`, `item_code`, `date`) VALUES
(1, 'LG TV', 100, 'good', 3200, '43l/re', '1', 'st1', 'LG', 'lg3211', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL,
  `po_code` varchar(50) DEFAULT NULL,
  `po_vendor` varchar(255) DEFAULT NULL,
  `po_total` decimal(11,2) DEFAULT NULL,
  `po_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `po_description` varchar(500) DEFAULT NULL,
  `po_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `order_report` enum('recived','pending') NOT NULL DEFAULT 'pending',
  `vendor_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `po_code`, `po_vendor`, `po_total`, `po_date`, `po_description`, `po_status`, `order_report`, `vendor_id`, `store_id`) VALUES
(384, 'PO12319 1', 'Prime', '1062736.00', '2019-03-12 16:42:34', 'Online 500000\r\nonline No: 32109', 'active', 'recived', 0, 0),
(385, 'PO12319 2', 'Kortech', '1325000.00', '2019-03-12 16:48:16', 'Chk#no 1000053\r\nHBL \r\nPak jali House', 'active', 'recived', 0, 0),
(386, 'PO14319 3', 'Kortech', '500000.00', '2019-03-14 07:19:41', 'chk no;000043\r\nHBL', 'active', 'recived', 0, 0),
(387, 'PO06419 4', 'as Traders', '3000000.00', '2019-04-06 07:11:17', 'online 100000\r\n', 'active', 'recived', 0, 0),
(388, 'PO11419 5', 'Kortech', '3222100.00', '2019-04-10 19:21:10', 'resr', 'active', 'recived', 0, 0),
(389, 'PO11419 6', 'Nestle', '671296.00', '2019-04-10 19:30:46', 'resrr', 'active', 'recived', 0, 0),
(390, 'PO13419 7', 'Kortech', '60000.00', '2019-04-13 03:02:47', 'tet 2', 'active', 'recived', 0, 0),
(391, 'PO13419 8', 'Kortech', '6100.00', '2019-04-13 03:07:58', 'tes', 'active', 'recived', 0, 0),
(392, 'PO13419 9', 'Kortech', '146574.00', '2019-04-13 06:02:39', 'test', 'active', 'recived', 0, 0),
(393, 'PO13419 10', 'United Motors', '5172.00', '2019-04-13 06:23:41', 'rewq', 'active', 'recived', 0, 0),
(394, 'PO13419 11', 'United Motors', '39483.00', '2019-04-13 06:26:43', 'dsa', 'active', 'recived', 0, 0),
(395, 'PO13419 12', 'United Motors', '5389058.00', '2019-04-13 06:27:37', '43q', 'active', 'recived', 0, 0),
(396, 'PO13419 13', 'United Motors', '833571.00', '2019-04-13 06:30:47', 'ted', 'active', 'recived', 0, 0),
(398, 'PO16419 15', 'dept Hr', NULL, '2019-04-15 18:03:29', 'This generated from Hr Dept', 'active', 'recived', 0, 0),
(399, 'PO16419 16', 'dept laptop', NULL, '2019-04-15 18:07:56', 'This generated from laptop Dept', 'active', 'recived', 0, 0),
(400, 'PO16419 17', 'dept Admission', NULL, '2019-04-15 18:12:10', 'This generated from Admission Dept', 'active', 'recived', 0, 0),
(401, 'PO16419 18', 'dept Admission', NULL, '2019-04-15 18:18:25', 'This generated from Admission Dept', 'active', 'recived', 0, 0),
(402, 'PO16419 19', 'dept Hr', NULL, '2019-04-15 18:23:01', 'This generated from Hr Dept', 'active', 'pending', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_detail`
--

CREATE TABLE `purchase_order_detail` (
  `id` int(11) NOT NULL,
  `po_code` varchar(50) DEFAULT NULL,
  `item_code` varchar(500) DEFAULT NULL,
  `item_qty` int(100) DEFAULT NULL,
  `item_rate` decimal(10,2) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `po_item_total` decimal(10,2) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `order_report` enum('recived','pending') NOT NULL DEFAULT 'pending',
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order_detail`
--

INSERT INTO `purchase_order_detail` (`id`, `po_code`, `item_code`, `item_qty`, `item_rate`, `date`, `po_item_total`, `status`, `order_report`, `vendor_id`) VALUES
(353, 'PO12319 1', 'wat_digi', 23, '32.00', '2019-03-12 13:33:59', '736.00', 'active', 'recived', 0),
(354, 'PO12319 1', 'pj1620', 20, '8100.00', '2019-03-12 16:42:34', '162000.00', 'active', 'recived', 0),
(355, 'PO12319 1', 'pj6407f', 100, '9000.00', '2019-03-12 16:42:34', '900000.00', 'active', 'recived', 0),
(356, 'PO12319 2', 'allwin6408f', 100, '10000.00', '2019-03-12 16:48:16', '1000000.00', 'active', 'recived', 0),
(357, 'PO12319 2', 'allwin6406f', 50, '6500.00', '2019-03-12 16:48:16', '325000.00', 'active', 'recived', 0),
(358, 'PO14319 3', 'ovn 02 o3', 50, '10000.00', '2019-03-14 07:19:41', '500000.00', 'active', 'recived', 0),
(359, 'PO06419 4', 'dell7440', 100, '30000.00', '2019-04-06 07:11:17', '3000000.00', 'active', 'recived', 0),
(360, 'PO11419 5', 'asd', 100, '32221.00', '2019-04-10 19:21:10', '3222100.00', 'active', 'recived', 0),
(361, 'PO11419 6', 'dell7440', 544, '1234.00', '2019-04-10 19:30:46', '671296.00', 'active', 'recived', 0),
(362, 'PO13419 7', 'Pipe', 1000, '60.00', '2019-04-13 03:02:47', '60000.00', 'active', 'recived', 0),
(363, 'PO13419 8', 'Pipe', 122, '50.00', '2019-04-13 03:07:59', '6100.00', 'active', 'recived', 0),
(364, 'PO13419 9', 'dell7440', 34, '4311.00', '2019-04-13 06:02:39', '146574.00', 'active', 'recived', 0),
(365, 'PO13419 10', 'dell7440', 431, '12.00', '2019-04-13 06:23:41', '5172.00', 'active', 'recived', 0),
(366, 'PO13419 11', 'dell7440', 321, '123.00', '2019-04-13 06:26:43', '39483.00', 'active', 'recived', 0),
(367, 'PO13419 12', 'dell7440', 4313, '1234.00', '2019-04-13 06:27:37', '5322242.00', 'active', 'recived', 0),
(368, 'PO13419 12', 'Pipe', 431, '123.00', '2019-04-13 06:27:37', '53013.00', 'active', 'recived', 0),
(369, 'PO13419 12', 'Pipe', 321, '43.00', '2019-04-13 06:27:37', '13803.00', 'active', 'recived', 0),
(370, 'PO13419 13', 'Pipe', 6777, '123.00', '2019-04-13 06:30:47', '833571.00', 'active', 'recived', 0),
(371, 'PO16419 15', 'rw', 32, NULL, '2019-04-15 17:55:10', '0.00', 'active', 'recived', 0),
(372, 'PO16419 16', 'rw', 32, NULL, '2019-04-15 18:03:29', '0.00', 'active', 'recived', 0),
(373, 'PO16419 17', 'rw', 43, NULL, '2019-04-15 18:07:56', '0.00', 'active', 'recived', 0),
(374, 'PO16419 18', 'ewq', 321, NULL, '2019-04-15 18:12:10', '0.00', 'active', 'recived', 0),
(375, 'PO16419 19', 'ewq', 321, NULL, '2019-04-15 18:18:25', '0.00', 'active', 'pending', 0),
(376, 'PO16419 20', 'asd', 32, NULL, '2019-04-15 18:23:01', '0.00', 'active', 'pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_request`
--

CREATE TABLE `purchase_request` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_code` varchar(240) NOT NULL,
  `department_id` int(11) NOT NULL,
  `department_name` varchar(240) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('pending','success','item not available','processing') NOT NULL DEFAULT 'pending',
  `review` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_request`
--

INSERT INTO `purchase_request` (`id`, `item_id`, `item_code`, `department_id`, `department_name`, `date`, `status`, `review`, `user_id`, `item_qty`, `updated_at`) VALUES
(17, 0, 'plxliupp', 0, 'Admission', '2019-03-26 14:32:23', 'success', 'dsa', 0, 43, '2019-03-26 04:20:45'),
(18, 0, 'plxliupp', 0, 'Hr', '2019-03-26 14:33:18', 'success', 'da', 0, 32, '2019-03-26 04:20:45'),
(19, 0, 'dg_w12', 0, 'Sale', '2019-03-26 14:45:18', 'item not available', 'Item Not Available in Stock', 0, 32, '2019-03-26 04:20:45'),
(20, 0, 'col4312', 0, 'laptop', '2019-03-31 09:49:45', 'item not available', 'Item Not Available in Stock', 0, 23, '2019-03-26 04:20:45'),
(21, 0, 'Iphone6s', 0, 'Admission', '2019-03-31 09:56:16', 'item not available', 'Item Not Available in Stock', 0, 32, '2019-03-26 04:20:45'),
(22, 0, 'Ndry_milk', 0, 'laptop', '2019-03-31 09:59:18', 'item not available', 'Item Not Available in Stock', 0, 45, '2019-03-26 04:20:45'),
(24, 0, 'ovn 02 o3', 0, 'Sale', '2019-03-26 11:55:25', 'success', 'test', 0, 30, '2019-03-26 04:20:45'),
(25, 0, 'allwin6406f', 0, 'Sale', '2019-03-26 11:34:07', 'success', 'seds', 0, 7, '2019-03-26 04:20:45'),
(27, 0, 'ovn 02 o3', 0, 'Admission', '2019-03-26 11:57:49', 'success', 'test 2', 0, 4, '2019-03-26 04:57:33'),
(28, 0, 'ovn 02 o3', 0, 'Hr', '2019-03-26 12:03:44', 'success', 'test 3', 0, 1, '2019-03-26 05:03:18'),
(29, 0, 'ovn 02 o3', 0, 'Hr', '2019-03-26 12:04:33', 'success', 'test 4', 0, 3, '2019-03-26 05:04:21'),
(30, 0, 'ovn 02 o3', 0, 'Admin', '2019-03-26 12:06:48', 'success', 'test 5', 0, 4, '2019-03-26 05:06:32'),
(31, 0, 'ovn 02 o3', 0, 'Admin', '2019-03-31 10:00:38', 'item not available', 'Item Not Available in Stock', 0, 12, '2019-03-28 22:55:16'),
(32, 0, 'ovn 02 o3', 0, 'Admission', '2019-04-15 23:16:50', 'success', 'da', 0, 12, '2019-03-31 03:00:29'),
(33, 0, 'dell7440', 0, 'laptop', '2019-04-15 23:46:11', 'item not available', 'Item Not Available in Stock', 0, 30, '2019-04-06 07:20:31'),
(35, 0, 'rw', 0, 'Hr', '2019-04-16 01:07:44', 'success', 'success', 0, 32, '2019-04-15 16:48:11'),
(36, 0, 'rw', 0, 'laptop', '2019-04-16 01:14:51', 'success', 'allot', 0, 30, '2019-04-15 18:03:16'),
(38, 0, 'asd', 0, 'Hr', '2019-04-16 01:23:01', 'processing', '', 0, 32, '2019-04-15 18:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `sales_profile`
--

CREATE TABLE `sales_profile` (
  `id` int(11) NOT NULL,
  `sale_pattern` enum('lifo','fifo','general') NOT NULL DEFAULT 'general',
  `profit` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_profile`
--

INSERT INTO `sales_profile` (`id`, `sale_pattern`, `profit`, `user_id`) VALUES
(1, 'lifo', 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sale_order`
--

CREATE TABLE `sale_order` (
  `id` int(11) NOT NULL,
  `so_code` varchar(50) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `so_total` decimal(11,2) DEFAULT NULL,
  `so_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `so_description` varchar(500) DEFAULT NULL,
  `so_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `so_report` enum('recived','pending') NOT NULL DEFAULT 'pending',
  `invoice_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_order`
--

INSERT INTO `sale_order` (`id`, `so_code`, `customer_name`, `so_total`, `so_date`, `so_description`, `so_status`, `so_report`, `invoice_code`) VALUES
(143, 'SO12319 1', 'Madni Ent.', NULL, NULL, NULL, 'active', 'pending', 'INPO12319 1'),
(144, 'SO14319 2', 'Pak Jali House', NULL, NULL, NULL, 'active', 'pending', 'INPO14319 2'),
(145, 'SO06419 3', 'Madni Ent.', NULL, NULL, NULL, 'active', 'pending', 'INPO06419 3'),
(151, 'SO11419 4', 'Zoefeng Parts', NULL, NULL, NULL, 'active', 'pending', ''),
(152, 'SO11419 5', 'Zoefeng Parts', NULL, NULL, NULL, 'active', 'pending', ''),
(153, 'SO11419 6', 'Zoefeng Parts', NULL, NULL, NULL, 'active', 'pending', ''),
(154, 'SO11419 7', 'Madni Ent.', NULL, '2019-04-11 07:00:00', NULL, 'active', 'pending', ''),
(155, 'SO11419 8', 'Pak Jali House', NULL, '2019-04-11 10:08:08', NULL, 'active', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `sale_order_detail`
--

CREATE TABLE `sale_order_detail` (
  `id` int(11) NOT NULL,
  `so_code` varchar(50) DEFAULT NULL,
  `item_code` varchar(500) DEFAULT NULL,
  `item_qty` int(100) DEFAULT NULL,
  `item_rate` decimal(10,2) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `so_item_total` decimal(10,2) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `so_report` enum('recived','pending') NOT NULL DEFAULT 'pending',
  `profit` int(100) NOT NULL,
  `invoice_code` varchar(100) NOT NULL,
  `discount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_order_detail`
--

INSERT INTO `sale_order_detail` (`id`, `so_code`, `item_code`, `item_qty`, `item_rate`, `date`, `so_item_total`, `status`, `so_report`, `profit`, `invoice_code`, `discount`) VALUES
(104, 'SO12319 1', 'allwin6408f', 7, '6500.00', '2019-03-12 16:50:56', '50050.00', 'active', 'pending', 10, 'INPO12319 1', 0),
(105, 'SO14319 2', 'ovn 02 o3', 20, '10000.00', '2019-03-14 07:27:15', '218000.00', 'active', 'pending', 9, 'INPO14319 2', 0),
(106, 'SO06419 3', 'dell7440', 50, '30000.00', '2019-04-06 07:19:25', '1650000.00', 'active', 'pending', 10, 'INPO06419 3', 0),
(107, 'SO11419 4', 'ovn 02 o3', 12, '10000.00', '2019-04-11 02:53:58', '118800.00', 'active', 'pending', 10, '', 1),
(108, 'SO11419 5', 'dell7440', 4, '1234.00', '2019-04-11 02:54:58', '4343.68', 'active', 'pending', 10, '', 12),
(109, 'SO11419 6', 'dell7440', 86, '1234.00', '2019-04-11 02:55:31', '60490.68', 'active', 'pending', 10, '', 43),
(110, 'SO11419 7', 'ovn 02 o3', 4, '10000.00', '2019-04-11 03:00:43', '38000.00', 'active', 'pending', 10, '', 5),
(111, 'SO11419 8', 'allwin6408f', 3, '10000.00', '2019-04-11 03:14:23', '26400.00', 'active', 'pending', 10, '', 12);

-- --------------------------------------------------------

--
-- Table structure for table `so_customer_detail`
--

CREATE TABLE `so_customer_detail` (
  `id` int(11) NOT NULL,
  `business_name` varchar(100) NOT NULL,
  `ntn` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `so_code` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `city` varchar(255) NOT NULL,
  `user_inform_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `so_customer_detail`
--

INSERT INTO `so_customer_detail` (`id`, `business_name`, `ntn`, `email`, `contact`, `address`, `so_code`, `date`, `city`, `user_inform_id`) VALUES
(92, 'Madni Ent.', '17921-TR', 'liaquatali31202@gmail.com', 2147483647, 'Near GEn Bus Stand.Mina-re-Pakistan Laore', 'SO311018-1', '2018-10-31 21:50:23', 'Lahore', 9),
(93, 'Madni Ent.', '17921-TR', 'liaquatali31202@gmail.com', 2147483647, 'Near GEn Bus Stand.Mina-re-Pakistan Laore', 'SO311018-2', '2018-10-31 21:54:35', 'Lahore', 9),
(94, 'AK Corp.', '3409-N78', 'musawer79@ovi.com', 2147483647, 'Near Port Qasimm Road.Korangi 12N Karachi', 'SO311018-3', '2018-10-31 21:58:40', 'Karachi', 10),
(95, 'Pak Jali House', '57N-N432', 'pakjalihouse@gmail.com', 2147483647, 'Bahawalpur Main Road', 'SO041118-4', '2018-11-04 15:44:45', 'Bahawalpur', 8),
(96, 'AK Corp.', '3409-N78', 'musawer79@ovi.com', 2147483647, 'Near Port Qasimm Road.Korangi 12N Karachi', 'SO061118-5', '2018-11-06 20:55:21', 'Karachi', 10),
(97, 'AK Corp.', '3409-N78', 'musawer79@ovi.com', 2147483647, 'Near Port Qasimm Road.Korangi 12N Karachi', 'SO151118-6', '2018-11-15 12:25:13', 'Karachi', 10),
(98, 'Pak Jali House', '57N-N432', 'pakjalihouse@gmail.com', 2147483647, 'Bahawalpur Main Road', 'SO171218-7', '2018-12-17 20:40:34', 'Bahawalpur', 8),
(99, 'Zoefeng Parts', 'CN-8632HND/PK', 'ZoefengParts@gmail.com', 2147483647, 'Shenzen China Port', 'SO23219-8', '2019-02-23 18:03:18', 'Beijing', 11),
(100, '0', '0', '0', 0, '0', 'SO11319--7', '2019-03-11 19:18:59', '0', 0),
(101, '0', '0', '0', 0, '0', 'SO11319-8', '2019-03-11 19:20:12', '0', 0),
(102, 'AK Corp.', '3409-N78', 'musawer79@ovi.com', 2147483647, 'Near Port Qasimm Road.Korangi 12N Karachi', 'SO12319 1', '2019-03-12 13:30:30', 'Karachi', 10),
(103, 'Madni Ent.', '17921-TR', 'liaquatali31202@gmail.com', 2147483647, 'Near GEn Bus Stand.Mina-re-Pakistan Laore', 'SO12319 1', '2019-03-12 16:50:57', 'Lahore', 9),
(104, 'Pak Jali House', '57N-N432', 'pakjalihouse@gmail.com', 2147483647, 'Bahawalpur Main Road', 'SO14319 2', '2019-03-14 07:27:15', 'Bahawalpur', 8),
(105, 'Madni Ent.', '17921-TR', 'liaquatali31202@gmail.com', 2147483647, 'Near GEn Bus Stand.Mina-re-Pakistan Laore', 'SO06419 3', '2019-04-06 07:19:25', 'Lahore', 9),
(106, 'Zoefeng Parts', 'CN-8632HND/PK', 'ZoefengParts@gmail.com', 2147483647, 'Shenzen China Port', 'SO11419 4', '2019-04-11 02:53:59', 'Beijing', 11),
(107, 'Zoefeng Parts', 'CN-8632HND/PK', 'ZoefengParts@gmail.com', 2147483647, 'Shenzen China Port', 'SO11419 5', '2019-04-11 02:54:58', 'Beijing', 11),
(108, 'Zoefeng Parts', 'CN-8632HND/PK', 'ZoefengParts@gmail.com', 2147483647, 'Shenzen China Port', 'SO11419 6', '2019-04-11 02:55:31', 'Beijing', 11),
(109, 'Madni Ent.', '17921-TR', 'liaquatali31202@gmail.com', 2147483647, 'Near GEn Bus Stand.Mina-re-Pakistan Laore', 'SO11419 7', '2019-04-11 03:00:44', 'Lahore', 9),
(110, 'Pak Jali House', '57N-N432', 'pakjalihouse@gmail.com', 2147483647, 'Bahawalpur Main Road', 'SO11419 8', '2019-04-11 03:14:23', 'Bahawalpur', 8);

-- --------------------------------------------------------

--
-- Table structure for table `so_invoice`
--

CREATE TABLE `so_invoice` (
  `id` int(11) NOT NULL,
  `so_code` varchar(50) DEFAULT NULL,
  `invoice_code` varchar(50) DEFAULT NULL,
  `so_total` decimal(11,2) DEFAULT NULL,
  `so_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `so_description` varchar(500) DEFAULT NULL,
  `so_status` enum('Active','Blocked') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `so_invoice`
--

INSERT INTO `so_invoice` (`id`, `so_code`, `invoice_code`, `so_total`, `so_date`, `so_description`, `so_status`) VALUES
(52, 'SO311018-1', 'INPO311018-1', NULL, '2018-10-31 21:50:23', NULL, 'Active'),
(53, 'SO311018-2', 'INPO311018-2', NULL, '2018-10-31 21:54:35', NULL, 'Active'),
(54, 'SO311018-3', 'INPO311018-3', NULL, '2018-10-31 21:58:40', NULL, 'Active'),
(55, 'SO041118-4', 'INPO031118-5', NULL, '2018-11-04 15:44:45', NULL, 'Active'),
(56, 'SO061118-5', 'INPO311018-1', NULL, '2018-11-06 20:55:21', NULL, 'Active'),
(57, 'SO151118-6', 'INPO151118-8', NULL, '2018-11-15 12:25:13', NULL, 'Active'),
(58, 'SO171218-7', 'INPO311018-1', NULL, '2018-12-17 20:40:34', NULL, 'Active'),
(59, 'SO23219-8', 'INPO061118-6', NULL, '2019-02-23 18:03:18', NULL, 'Active'),
(60, 'SO11319--7', 'INPO311018-2', NULL, '2019-03-11 19:18:59', NULL, 'Active'),
(61, 'SO11319-8', 'INPO311018-2', NULL, '2019-03-11 19:20:12', NULL, 'Active'),
(62, 'SO12319 1', 'INPO171118-10', NULL, '2019-03-12 13:30:30', NULL, 'Active'),
(63, 'SO12319 1', 'INPO12319 1', NULL, '2019-03-12 16:50:57', NULL, 'Active'),
(64, 'SO14319 2', 'INPO14319 2', NULL, '2019-03-14 07:27:15', NULL, 'Active'),
(65, 'SO06419 3', 'INPO06419 3', NULL, '2019-04-06 07:19:25', NULL, 'Active'),
(66, 'SO11419 5', NULL, NULL, '2019-04-11 02:54:58', NULL, 'Active'),
(67, 'SO11419 6', NULL, NULL, '2019-04-11 02:55:31', NULL, 'Active'),
(68, 'SO11419 7', NULL, NULL, '2019-04-11 03:00:44', NULL, 'Active'),
(69, 'SO11419 8', NULL, NULL, '2019-04-11 03:14:23', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `so_invoice_detail`
--

CREATE TABLE `so_invoice_detail` (
  `id` int(11) NOT NULL,
  `invoice_code` varchar(50) DEFAULT NULL,
  `item_code` varchar(500) DEFAULT NULL,
  `item_qty` int(100) DEFAULT NULL,
  `item_rate` decimal(10,2) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `item_total` decimal(10,2) NOT NULL,
  `profit` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `so_invoice_detail`
--

INSERT INTO `so_invoice_detail` (`id`, `invoice_code`, `item_code`, `item_qty`, `item_rate`, `date`, `item_total`, `profit`) VALUES
(40, 'INPO311018-1', 'bld_kybrd', 200, '1000.00', '2018-10-31 21:50:23', '212000.00', 6),
(41, 'INPO311018-2', 'i5as', 4, '19600.00', '2018-10-31 21:54:35', '82320.00', 5),
(42, 'INPO311018-3', 'mech_kbd', 30, '500.00', '2018-10-31 21:58:40', '164245.00', 7),
(43, 'INPO031118-5', 'mech_kbd', 5, '34.00', '2018-11-04 15:44:45', '190.40', 12),
(44, 'INPO311018-1', 'bld_kybrd', 5, '1000.00', '2018-11-06 20:55:21', '5250.00', 5),
(45, 'INPO151118-8', 'Ndry_milk', 120, '32.00', '2018-11-15 12:25:13', '4224.00', 10),
(46, 'INPO311018-1', 'bld_kybrd', 5, '1000.00', '2018-12-17 20:40:34', '0.00', 10),
(47, 'INPO061118-6', 'bld_kybrd', 12, '6000.00', '2019-02-23 18:03:18', '0.00', 10),
(48, 'INPO311018-2', 'i5as', 43, '19600.00', '2019-03-11 19:18:59', '935508.00', 11),
(49, 'INPO311018-2', 'Select item_code', 53, '19600.00', '2019-03-11 19:20:12', '1153068.00', 11),
(50, 'INPO171118-10', '6406f', 12, '43.00', '2019-03-12 13:30:30', '2089.37', 13),
(51, 'INPO12319 1', 'allwin6408f', 7, '6500.00', '2019-03-12 16:50:57', '50050.00', 10),
(52, 'INPO14319 2', 'ovn 02 o3', 20, '10000.00', '2019-03-14 07:27:15', '218000.00', 9),
(53, 'INPO06419 3', 'dell7440', 50, '30000.00', '2019-04-06 07:19:25', '1650000.00', 10),
(54, NULL, 'dell7440', 4, '1234.00', '2019-04-11 02:54:58', '4343.68', 10),
(55, NULL, 'dell7440', 86, '1234.00', '2019-04-11 02:55:31', '60490.68', 10),
(56, NULL, 'ovn 02 o3', 4, '10000.00', '2019-04-11 03:00:44', '38000.00', 10),
(57, NULL, 'allwin6408f', 3, '10000.00', '2019-04-11 03:14:23', '26400.00', 10);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(150) NOT NULL,
  `user_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `name`, `description`, `user_id`) VALUES
(2, 'Store 1', 'Model Town c', '2'),
(3, 'Store 2', 'Loc2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `store_track`
--

CREATE TABLE `store_track` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `po_invoice_id` int(11) NOT NULL,
  `po_invoice` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `store_id` int(11) NOT NULL,
  `item_code` varchar(50) NOT NULL,
  `qty` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_track`
--

INSERT INTO `store_track` (`id`, `user_id`, `po_invoice_id`, `po_invoice`, `date`, `store_id`, `item_code`, `qty`) VALUES
(1, 0, 0, 'INPO13419 11', '2019-04-13 06:26:58', 2, 'dell7440', 321),
(2, 0, 0, 'INPO13419 12', '2019-04-13 06:27:57', 3, 'dell7440', 4313),
(3, 0, 0, 'INPO13419 12', '2019-04-13 06:27:57', 3, 'Pipe', 431),
(4, 0, 0, 'INPO13419 12', '2019-04-13 06:27:57', 3, 'Pipe', 321),
(5, 0, 0, 'INPO13419 13', '2019-04-13 06:31:08', 3, 'Pipe', 6777),
(6, 0, 0, 'INPO16419 14', '2019-04-15 18:06:58', 3, 'rw', 32),
(7, 0, 0, 'INPO16419 15', '2019-04-15 18:10:58', 2, 'rw', 32),
(8, 0, 0, 'INPO16419 16', '2019-04-15 18:17:06', 3, 'rw', 43),
(9, 0, 0, 'INPO16419 17', '2019-04-15 18:18:53', 2, 'ewq', 321);

-- --------------------------------------------------------

--
-- Table structure for table `sub_users`
--

CREATE TABLE `sub_users` (
  `id` int(11) NOT NULL,
  `login_id` int(200) NOT NULL,
  `session_id` int(200) NOT NULL,
  `role` enum('master','user','super_user') NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_users`
--

INSERT INTO `sub_users` (`id`, `login_id`, `session_id`, `role`, `email`, `name`, `contact`, `password`, `date`) VALUES
(8, 2, 0, 'user', 'pdasd@gmail.com', 'Musawer', '43132421', 'fda321', NULL),
(16, 1, 0, 'user', 'ali@gmail.com', 'Ali', '03086854734', 'admin123', '2019-03-31 11:46:47'),
(17, 2, 0, '', 'pakjalihouse@yahoo.com', '', '', 'admin123', '2019-04-03 23:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_inform`
--

CREATE TABLE `user_inform` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `ntn` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_inform`
--

INSERT INTO `user_inform` (`id`, `user_name`, `ntn`, `contact`, `business_name`, `city`, `address`, `email`, `date`) VALUES
(8, 'Musawer Ali', '57N-N432', '03336513516', 'Pak Jali House', 'Bahawalpur', 'Bahawalpur Main Road', 'pakjalihouse@gmail.com', '2018-10-31 11:34:53'),
(9, 'Liaquat', '17921-TR', '03086854734', 'Madni Ent.', 'Lahore', 'Near GEn Bus Stand.Mina-re-Pakistan Laore', 'liaquatali31202@gmail.com', '2018-10-31 11:47:38'),
(10, 'Ali', '3409-N78', '03086854734', 'AK Corp.', 'Karachi', 'Near Port Qasimm Road.Korangi 12N Karachi', 'musawer79@ovi.com', '2018-10-31 11:49:23'),
(11, 'Zhoe Feng ', 'CN-8632HND/PK', '8645209234521', 'Zoefeng Parts', 'Beijing', 'Shenzen China Port', 'ZoefengParts@gmail.com', '2018-11-17 19:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_track`
--

CREATE TABLE `user_track` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_login` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `manager_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `vendor_name`, `manager_name`, `city`, `email`, `company_name`, `contact`, `address`, `status`) VALUES
(2, 'United Motors', 'John', 'Bahawalpur', 'pakjalihouse@gmail.com', '', '7654223', 'GT ROAD 43Nn', 'active'),
(3, 'Kortech', 'ALi', 'Bahawalpur', 'liaquat31202@gmail.com', '', '65333257', 'Multan road', 'active'),
(4, 'Nestle', 'Ali', 'Multan', 'pakjalihouse@gmail.com', '', '04443332', 'Lari Adas', 'active'),
(5, 'Prime', 'ALi', 'Bahawalpur', 'pakjalihouse@gmail.com', '', '03336513516', 'pak jali house, Near Shama Canima Multan Road Bahawalpur', 'active'),
(6, 'as Traders', 'ali', 'Bahawalpur', 'musawer79@ovi.com', '', '92943234', 'pak jali house, Near Shama Canima Multan Road Bahawalpur', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `items_in_stock`
--
ALTER TABLE `items_in_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`phone_id`);

--
-- Indexes for table `po_invoice`
--
ALTER TABLE `po_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_invoice_detail`
--
ALTER TABLE `po_invoice_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_detail`
--
ALTER TABLE `purchase_order_detail`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `purchase_request`
--
ALTER TABLE `purchase_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_profile`
--
ALTER TABLE `sales_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_order`
--
ALTER TABLE `sale_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_order_detail`
--
ALTER TABLE `sale_order_detail`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `so_customer_detail`
--
ALTER TABLE `so_customer_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `so_invoice`
--
ALTER TABLE `so_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `so_invoice_detail`
--
ALTER TABLE `so_invoice_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_track`
--
ALTER TABLE `store_track`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_users`
--
ALTER TABLE `sub_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_inform`
--
ALTER TABLE `user_inform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_track`
--
ALTER TABLE `user_track`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `items_in_stock`
--
ALTER TABLE `items_in_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `phone_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `po_invoice`
--
ALTER TABLE `po_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `po_invoice_detail`
--
ALTER TABLE `po_invoice_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;

--
-- AUTO_INCREMENT for table `purchase_order_detail`
--
ALTER TABLE `purchase_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;

--
-- AUTO_INCREMENT for table `purchase_request`
--
ALTER TABLE `purchase_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sales_profile`
--
ALTER TABLE `sales_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sale_order`
--
ALTER TABLE `sale_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `sale_order_detail`
--
ALTER TABLE `sale_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `so_customer_detail`
--
ALTER TABLE `so_customer_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `so_invoice`
--
ALTER TABLE `so_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `so_invoice_detail`
--
ALTER TABLE `so_invoice_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `store_track`
--
ALTER TABLE `store_track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sub_users`
--
ALTER TABLE `sub_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_inform`
--
ALTER TABLE `user_inform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_track`
--
ALTER TABLE `user_track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;