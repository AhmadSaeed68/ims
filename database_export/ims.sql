-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2018 at 04:10 PM
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
(36, 1, 'Monitor', 'active'),
(37, 1, 'Laptop', 'active'),
(39, 1, 'Cooling Pad', 'active'),
(40, 1, 'Mouse', 'active'),
(41, 1, 'keyboard', 'active'),
(42, 1, 'watch', 'active'),
(46, 1, 'Allwin', 'active'),
(47, 1, 'mobile', 'active'),
(48, 1, 'Radiator', 'active'),
(49, 1, 'Brass Bottom', 'active'),
(50, 1, 'Pipe', 'active'),
(51, 1, 'Plastic Bottom', 'active');

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
(69, '43', '6406f', '2018-10-01 05:39:46', '23', '');

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
(14, 37, 0, 'Hp', 'hp1002', '8gb ram', 'inactive', -1826),
(15, 39, 0, 'China Coolpad', 'col4312', 'china cooling pad. good quality', 'active', -1483),
(16, 46, 1, '640', '6406f', 'Radiator Allwin 6FPI', 'active', -878),
(17, 33, 0, 'LG', 'lgch1', 'charger', 'active', -1712),
(18, 41, 0, 'Mechanical', 'mech_kbd', 'mechaanical keyboard', 'active', -3067),
(19, 42, 0, 'Digital', 'wat_digi', 'digital watch ', 'active', -274),
(21, 42, 0, 'Digital Watch', 'dg_w12', 'import from china', 'active', -242),
(22, 41, 0, 'bloddy', 'bld_kybrd', 'this is bloddy keyboard', 'active', -5485),
(23, 33, 0, 'moto turbo charger', 'trbch-moto', 'Moto Turbo Fast Charger', 'active', -2644),
(24, 37, 0, 'asus i5', 'i5as', 'asus core i5', 'active', -471),
(25, 47, 0, 'j7', 'smj7', 'Samsung ', 'active', -321),
(26, 47, 0, 'Iphone apple', 'Iphone6s', 'Iphoe', 'active', -926),
(27, 48, 0, '6408 fpi', 'al6408f', 'Allwin', 'active', -500),
(28, 49, 0, '640 Upper', '640upsp', '640 upper special \n700gm', 'active', -200),
(29, 50, 0, '640 Upper pipe', 'pip640up', 'filler 640 upper', 'active', -1000),
(30, 51, 0, 'xli upper bottom', 'plxliupp', 'xli upper bottom', 'active', -100);

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
  `item_qty` decimal(10,2) DEFAULT NULL,
  `item_rate` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `items_in_stock`
--

INSERT INTO `items_in_stock` (`id`, `entry_date`, `category_id`, `brand_id`, `item_name`, `item_code`, `item_description`, `po_code`, `invoice_code`, `item_qty`, `item_rate`) VALUES
(35, '2018-10-20 12:48:09', 0, 0, '', 'hp1002', NULL, 'PO201018-1', 'INPO201018-1', '432.00', '12.00'),
(36, '2018-10-20 12:48:28', 0, 0, '', 'bld_kybrd', NULL, 'PO201018-2', 'INPO201018-2', '543.00', '12.00'),
(37, '2018-10-20 12:54:14', 0, 0, '', 'al6408f', NULL, 'PO201018-3', 'INPO201018-3', '100.00', '10000.00'),
(38, '2018-10-20 18:32:45', 0, 0, '', 'al6408f', NULL, 'PO201018-4', 'INPO201018-4', '200.00', '10000.00'),
(39, '2018-10-21 22:19:44', 0, 0, '', 'Iphone6s', NULL, 'PO211018-9', 'INPO211018-5', '400.00', '450.00'),
(40, '2018-10-21 22:20:34', 0, 0, '', 'plxliupp', NULL, 'PO201018-5', 'INPO211018-6', '50.00', '700.00'),
(41, '2018-10-21 22:20:51', 0, 0, '', 'pip640up', NULL, 'PO201018-6', 'INPO211018-7', '1000.00', '50.00'),
(42, '2018-10-21 22:21:10', 0, 0, '', 'dg_w12', NULL, 'PO211018-7', 'INPO211018-8', '300.00', '31.00'),
(43, '2018-10-21 22:21:31', 0, 0, '', 'lgch1', NULL, 'PO211018-8', 'INPO211018-9', '432.00', '432.00');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `security_question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `cnic`, `security_question`) VALUES
(1, 'pakjalihouse@gmail.com', 'admin123', '3120269441941', 'yes'),
(2, 'pakjalihouse@yahoo.com', 'admin123', '3120269441941', 'yes');

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
(88, 'PO201018-1', 'INPO201018-1', NULL, '2018-10-20 12:48:08', 'Recived by:Manager', 'Active'),
(89, 'PO201018-2', 'INPO201018-2', NULL, '2018-10-20 12:48:27', 'Recived By Frim', 'Active'),
(90, 'PO201018-3', 'INPO201018-3', NULL, '2018-10-20 12:54:14', 'Rana Khalid Goods\r\nBilty no: 321/432\r\nRecived BY: Ali', 'Active'),
(91, 'PO201018-4', 'INPO201018-4', NULL, '2018-10-20 18:32:45', 'Recived By:Manager', 'Active'),
(92, 'PO211018-9', 'INPO211018-5', NULL, '2018-10-21 22:19:44', 'Recived By Maneger', 'Active'),
(93, 'PO201018-5', 'INPO211018-6', NULL, '2018-10-21 22:20:34', 'Bilty No:430/54rf', 'Active'),
(94, 'PO201018-6', 'INPO211018-7', NULL, '2018-10-21 22:20:51', 'Bilty No:430/54fd', 'Active'),
(95, 'PO211018-7', 'INPO211018-8', NULL, '2018-10-21 22:21:10', 'Bilty No:430/54sd', 'Active'),
(96, 'PO211018-8', 'INPO211018-9', NULL, '2018-10-21 22:21:30', 'Bilty No:430/5sde', 'Active');

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
(83, 'INPO201018-1', 'hp1002', 432, '12.00', '2018-10-20 12:48:09', '5184.00', 0),
(84, 'INPO201018-2', 'bld_kybrd', 543, '12.00', '2018-10-20 12:48:28', '6516.00', 0),
(85, 'INPO201018-3', 'al6408f', 100, '10000.00', '2018-10-20 12:54:14', '800000.00', 20),
(86, 'INPO201018-4', 'al6408f', 200, '10000.00', '2018-10-20 18:32:45', '2000000.00', 0),
(87, 'INPO211018-5', 'Iphone6s', 400, '450.00', '2018-10-21 22:19:44', '180000.00', 0),
(88, 'INPO211018-6', 'plxliupp', 50, '700.00', '2018-10-21 22:20:34', '35000.00', 0),
(89, 'INPO211018-7', 'pip640up', 1000, '50.00', '2018-10-21 22:20:51', '50000.00', 0),
(90, 'INPO211018-8', 'dg_w12', 300, '31.00', '2018-10-21 22:21:10', '9300.00', 0),
(91, 'INPO211018-9', 'lgch1', 432, '432.00', '2018-10-21 22:21:31', '186624.00', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL,
  `po_code` varchar(50) DEFAULT NULL,
  `po_vendor` varchar(255) DEFAULT NULL,
  `po_total` decimal(11,2) DEFAULT NULL,
  `po_date` datetime DEFAULT NULL,
  `po_description` varchar(500) DEFAULT NULL,
  `po_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `order_report` enum('recived','pending') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `po_code`, `po_vendor`, `po_total`, `po_date`, `po_description`, `po_status`, `order_report`) VALUES
(266, 'PO201018-1', NULL, NULL, NULL, 'Rk Corp', 'active', 'recived'),
(267, 'PO201018-2', NULL, NULL, NULL, 'SM Electronics', 'active', 'recived'),
(268, 'PO201018-3', NULL, NULL, NULL, 'RSO Main Branch', 'active', 'recived'),
(271, 'PO201018-4', NULL, NULL, NULL, 'Allwin Main Branch', 'active', 'recived'),
(272, 'PO201018-5', NULL, NULL, NULL, 'Khan Peshwar', 'active', 'recived'),
(273, 'PO201018-6', NULL, NULL, NULL, 'MSH Brothers', 'active', 'recived'),
(274, 'PO211018-7', NULL, NULL, NULL, 'Import From China', 'active', 'recived'),
(275, 'PO211018-8', NULL, NULL, NULL, 'Su Trades Corp.', 'active', 'recived'),
(276, 'PO211018-9', NULL, NULL, NULL, 'United Trades pvt', 'active', 'recived'),
(299, 'PO221018-10', NULL, NULL, NULL, 'AK Trades', 'active', 'pending'),
(300, 'PO221018-11', NULL, NULL, NULL, 'AR TRading Corp.', 'active', 'pending');

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
  `order_report` enum('recived','pending') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order_detail`
--

INSERT INTO `purchase_order_detail` (`id`, `po_code`, `item_code`, `item_qty`, `item_rate`, `date`, `po_item_total`, `status`, `order_report`) VALUES
(222, 'PO201018-1', 'hp1002', 432, '12.00', '2018-10-20 12:46:25', '5184.00', 'active', 'recived'),
(223, 'PO201018-2', 'bld_kybrd', 543, '12.00', '2018-10-20 12:47:34', '6516.00', 'active', 'recived'),
(224, 'PO201018-3', 'al6408f', 100, '10000.00', '2018-10-20 12:52:20', '1000000.00', 'active', 'recived'),
(227, 'PO201018-4', 'al6408f', 200, '10000.00', '2018-10-20 13:05:28', '2000000.00', 'active', 'recived'),
(228, 'PO201018-5', 'plxliupp', 50, '700.00', '2018-10-20 13:06:00', '35000.00', 'active', 'recived'),
(229, 'PO201018-6', 'pip640up', 1000, '50.00', '2018-10-20 13:07:23', '50000.00', 'active', 'recived'),
(230, 'PO211018-7', 'dg_w12', 300, '31.00', '2018-10-21 22:02:13', '9300.00', 'active', 'recived'),
(231, 'PO211018-8', 'lgch1', 432, '432.00', '2018-10-21 22:09:49', '186624.00', 'active', 'recived'),
(232, 'PO211018-9', 'Iphone6s', 400, '450.00', '2018-10-21 22:10:38', '180000.00', 'active', 'recived'),
(255, 'PO221018-10', 'i5as', 54, '20000.00', '2018-10-22 12:30:12', '1080000.00', 'active', 'pending'),
(256, 'PO221018-11', 'bld_kybrd', 100, '700.00', '2018-10-22 12:31:13', '70000.00', 'active', 'pending'),
(257, 'PO221018-11', 'smj7', 200, '15000.00', '2018-10-22 12:31:13', '3000000.00', 'active', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `sale_order`
--

CREATE TABLE `sale_order` (
  `id` int(11) NOT NULL,
  `so_code` varchar(50) DEFAULT NULL,
  `po_vendor` varchar(255) DEFAULT NULL,
  `po_total` decimal(11,2) DEFAULT NULL,
  `po_date` datetime DEFAULT NULL,
  `po_description` varchar(500) DEFAULT NULL,
  `po_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `order_report` enum('recived','pending') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_order_detail`
--

CREATE TABLE `sale_order_detail` (
  `id` int(11) NOT NULL,
  `po_code` varchar(50) DEFAULT NULL,
  `item_code` varchar(500) DEFAULT NULL,
  `item_qty` int(100) DEFAULT NULL,
  `item_rate` decimal(10,2) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `po_item_total` decimal(10,2) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `order_report` enum('recived','pending') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `so_invoice`
--

CREATE TABLE `so_invoice` (
  `id` int(11) NOT NULL,
  `po_code` varchar(50) DEFAULT NULL,
  `invoice_code` varchar(50) DEFAULT NULL,
  `invoice_total` decimal(11,2) DEFAULT NULL,
  `invoice_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `invoice_description` varchar(500) DEFAULT NULL,
  `invoice_status` enum('Active','Blocked') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `discount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `reg_date`) VALUES
(1, 'Admin', 'admin123', 'admin@gmail.com', '2018-08-31 08:12:22'),
(2, 'musawer Ali', 'admin', 'pakjalihouse@gmail.com', '2018-08-31 08:12:22'),
(5, 'Musawer ALi', 'admin123', 'musawer79@ovi.com', '2018-08-31 08:12:22');

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `items_in_stock`
--
ALTER TABLE `items_in_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `phone_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `po_invoice`
--
ALTER TABLE `po_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `po_invoice_detail`
--
ALTER TABLE `po_invoice_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `purchase_order_detail`
--
ALTER TABLE `purchase_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `sale_order`
--
ALTER TABLE `sale_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_order_detail`
--
ALTER TABLE `sale_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `so_invoice`
--
ALTER TABLE `so_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `so_invoice_detail`
--
ALTER TABLE `so_invoice_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
