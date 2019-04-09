-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2019 at 09:34 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

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
(33, 61, 0, 'da', 'asd', 'dsaaa', 'active', -100),
(34, 61, 0, 'da', 'asd', 'dsaaa', 'active', -50),
(35, 61, 0, 'da', 'asd', 'dsaaa', 'active', -100),
(36, 61, 0, 'da', 'asd', 'dsaaa', 'active', -20),
(37, 61, 0, 'da', 'asd', 'dsaaa', 'active', -50),
(38, 61, 0, 'da', 'asd', 'dsaaa', 'active', 0),
(39, 61, 0, 'da', 'asd', 'dsaaa', 'active', 0),
(40, 61, 0, 'test1', 'asd', 'description test1', 'active', 0),
(41, 61, 0, 'da', 'asd', 'dsaaa', 'active', 0),
(42, 61, 0, 'da', 'asd', 'dsaaa', 'active', 0),
(43, 61, 0, 'da', 'asd', 'dsaaa', 'active', 0),
(44, 61, 0, 'Radiator', 'asd', 'dsaaa', 'active', 0),
(45, 63, 0, 'qwe', 'ewq', 'rewqd', 'active', 0),
(46, 61, 0, 'wer', 'rw', 'test', 'active', 0),
(47, 64, 0, 'core i5', 'dell7440', 'core i 5 dell', 'active', -100);

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
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `items_in_stock`
--

INSERT INTO `items_in_stock` (`id`, `entry_date`, `category_id`, `brand_id`, `item_name`, `item_code`, `item_description`, `po_code`, `invoice_code`, `item_qty`, `item_rate`, `date`) VALUES
(86, '2019-03-12 16:49:40', 0, 0, '', 'allwin6408f', NULL, 'PO12319 2', 'INPO12319 1', '93', '10000.00', '2019-03-12 16:49:40'),
(87, '2019-03-12 16:49:40', 0, 0, '', 'allwin6406f', NULL, 'PO12319 2', 'INPO12319 1', '50', '6500.00', '2019-03-12 16:49:40'),
(88, '2019-03-14 07:21:16', 0, 0, '', 'ovn 02 o3', NULL, 'PO14319 3', 'INPO14319 2', '14', '10000.00', '2019-03-14 07:21:16'),
(89, '2019-04-06 07:13:45', 0, 0, '', 'dell7440', NULL, 'PO06419 4', 'INPO06419 3', '50', '30000.00', '2019-04-06 07:13:45');

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
(1, 'pakjalihouse@gmail.com', 'admin123', '3120269441941', 'yes', 'super_user', 2147483647, 'pak jali house, Near Shama Canima Multan Road Bahawalpur', 'Musawer', '2019-03-31 11:33:23', 0, 0),
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
  `invoice_status` enum('Active','Blocked') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_invoice`
--

INSERT INTO `po_invoice` (`id`, `po_code`, `invoice_code`, `invoice_total`, `invoice_date`, `invoice_description`, `invoice_status`) VALUES
(119, 'PO12319 2', 'INPO12319 1', '1325000.00', '2019-03-12 16:49:40', 'Recived Bilty No:3212\r\nRana Khalid \r\nRecived By: Manager\r\nBilty Charges 4310', 'Active'),
(120, 'PO14319 3', 'INPO14319 2', '470000.00', '2019-03-14 07:21:16', 'Recied bilty:5444\r\nRecev Owner', 'Active'),
(121, 'PO06419 4', 'INPO06419 3', '2820000.00', '2019-04-06 07:13:45', 'bilty:211p\r\nrecived:owner', 'Active');

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
  `discount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_invoice_detail`
--

INSERT INTO `po_invoice_detail` (`id`, `invoice_code`, `item_code`, `item_qty`, `item_rate`, `date`, `item_total`, `discount`) VALUES
(123, 'INPO12319 1', 'allwin6408f', 100, '10000.00', '2019-03-12 16:49:40', '1000000.00', 0),
(124, 'INPO12319 1', 'allwin6406f', 50, '6500.00', '2019-03-12 16:49:40', '325000.00', 0),
(125, 'INPO14319 2', 'ovn 02 o3', 50, '10000.00', '2019-03-14 07:21:16', '470000.00', 6),
(126, 'INPO06419 3', 'dell7440', 100, '30000.00', '2019-04-06 07:13:45', '2820000.00', 6);

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
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `po_code`, `po_vendor`, `po_total`, `po_date`, `po_description`, `po_status`, `order_report`, `vendor_id`) VALUES
(384, 'PO12319 1', 'Prime', '1062736.00', '2019-03-12 16:42:34', 'Online 500000\r\nonline No: 32109', 'active', 'pending', 0),
(385, 'PO12319 2', 'Kortech', '1325000.00', '2019-03-12 16:48:16', 'Chk#no 1000053\r\nHBL \r\nPak jali House', 'active', 'recived', 0),
(386, 'PO14319 3', 'Kortech', '500000.00', '2019-03-14 07:19:41', 'chk no;000043\r\nHBL', 'active', 'recived', 0),
(387, 'PO06419 4', 'as Traders', '3000000.00', '2019-04-06 07:11:17', 'online 100000\r\n', 'active', 'recived', 0);

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
(353, 'PO12319 1', 'wat_digi', 23, '32.00', '2019-03-12 13:33:59', '736.00', 'active', 'pending', 0),
(354, 'PO12319 1', 'pj1620', 20, '8100.00', '2019-03-12 16:42:34', '162000.00', 'active', 'pending', 0),
(355, 'PO12319 1', 'pj6407f', 100, '9000.00', '2019-03-12 16:42:34', '900000.00', 'active', 'pending', 0),
(356, 'PO12319 2', 'allwin6408f', 100, '10000.00', '2019-03-12 16:48:16', '1000000.00', 'active', 'recived', 0),
(357, 'PO12319 2', 'allwin6406f', 50, '6500.00', '2019-03-12 16:48:16', '325000.00', 'active', 'recived', 0),
(358, 'PO14319 3', 'ovn 02 o3', 50, '10000.00', '2019-03-14 07:19:41', '500000.00', 'active', 'recived', 0),
(359, 'PO06419 4', 'dell7440', 100, '30000.00', '2019-04-06 07:11:17', '3000000.00', 'active', 'recived', 0);

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
  `status` enum('pending','success','item not available') NOT NULL DEFAULT 'pending',
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
(32, 0, 'ovn 02 o3', 0, 'Admission', '2019-03-31 10:00:29', 'pending', '', 0, 12, '2019-03-31 03:00:29'),
(33, 0, 'dell7440', 0, 'laptop', '2019-04-06 14:20:31', 'pending', '', 0, 30, '2019-04-06 07:20:31');

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
(1, 'general', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sale_order`
--

CREATE TABLE `sale_order` (
  `id` int(11) NOT NULL,
  `so_code` varchar(50) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `so_total` decimal(11,2) DEFAULT NULL,
  `so_date` date DEFAULT NULL,
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
(145, 'SO06419 3', 'Madni Ent.', NULL, NULL, NULL, 'active', 'pending', 'INPO06419 3');

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
  `invoice_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_order_detail`
--

INSERT INTO `sale_order_detail` (`id`, `so_code`, `item_code`, `item_qty`, `item_rate`, `date`, `so_item_total`, `status`, `so_report`, `profit`, `invoice_code`) VALUES
(104, 'SO12319 1', 'allwin6408f', 7, '6500.00', '2019-03-12 16:50:56', '50050.00', 'active', 'pending', 10, 'INPO12319 1'),
(105, 'SO14319 2', 'ovn 02 o3', 20, '10000.00', '2019-03-14 07:27:15', '218000.00', 'active', 'pending', 9, 'INPO14319 2'),
(106, 'SO06419 3', 'dell7440', 50, '30000.00', '2019-04-06 07:19:25', '1650000.00', 'active', 'pending', 10, 'INPO06419 3');

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
(105, 'Madni Ent.', '17921-TR', 'liaquatali31202@gmail.com', 2147483647, 'Near GEn Bus Stand.Mina-re-Pakistan Laore', 'SO06419 3', '2019-04-06 07:19:25', 'Lahore', 9);

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
(65, 'SO06419 3', 'INPO06419 3', NULL, '2019-04-06 07:19:25', NULL, 'Active');

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
(53, 'INPO06419 3', 'dell7440', 50, '30000.00', '2019-04-06 07:19:25', '1650000.00', 10);

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
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `items_in_stock`
--
ALTER TABLE `items_in_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `po_invoice_detail`
--
ALTER TABLE `po_invoice_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=388;

--
-- AUTO_INCREMENT for table `purchase_order_detail`
--
ALTER TABLE `purchase_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;

--
-- AUTO_INCREMENT for table `purchase_request`
--
ALTER TABLE `purchase_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sales_profile`
--
ALTER TABLE `sales_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sale_order`
--
ALTER TABLE `sale_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `sale_order_detail`
--
ALTER TABLE `sale_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `so_customer_detail`
--
ALTER TABLE `so_customer_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `so_invoice`
--
ALTER TABLE `so_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `so_invoice_detail`
--
ALTER TABLE `so_invoice_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
