-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2018 at 06:13 PM
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
(33, 1, 'Charger', 'active'),
(34, 1, 'Fan', 'active'),
(36, 1, 'Monitor', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `name`, `msg`, `date`) VALUES
(18, 'musawer', 'hi how are you ', '2018-08-26 23:20:38'),
(19, 'ali', 'i am fine, Whats about you?', '2018-08-26 23:20:53'),
(20, 'musawer', 'ds', '2018-09-05 15:14:22'),
(21, 'musawer', 'ds', '2018-09-05 15:14:28'),
(23, 'hp', 'hp', '2018-09-05 17:24:33');

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
  `item_status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `category_id`, `brand_id`, `item_name`, `item_code`, `item_description`, `item_status`) VALUES
(10, 32, 0, 'HP', '10001', '8gb Ram\n500Gb\ncore i5 black\n14inch', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `items_in_stock`
--

CREATE TABLE `items_in_stock` (
  `id` int(11) NOT NULL,
  `entry_date` datetime DEFAULT NULL,
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
(1, '2018-08-20 00:00:00', 1, 1, 'Mobile', '100001', '', '00001', '00001', '20.00', '50.00'),
(2, '2018-08-20 00:00:00', 2, 1, 'Part B', '100002', '', '00001', '00001', '5.00', '50.00');

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
  `invoice_date` datetime DEFAULT NULL,
  `invoice_description` varchar(500) DEFAULT NULL,
  `invoice_status` enum('Active','Blocked') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_invoice`
--

INSERT INTO `po_invoice` (`id`, `po_code`, `invoice_code`, `invoice_total`, `invoice_date`, `invoice_description`, `invoice_status`) VALUES
(1, '000001', '000001', '100.00', '2018-08-18 00:00:00', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `po_invoice_detail`
--

CREATE TABLE `po_invoice_detail` (
  `id` int(11) NOT NULL,
  `invoice_code` varchar(50) DEFAULT NULL,
  `item_code` varchar(500) DEFAULT NULL,
  `item_qty` decimal(10,2) DEFAULT NULL,
  `item_rate` decimal(10,2) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_invoice_detail`
--

INSERT INTO `po_invoice_detail` (`id`, `invoice_code`, `item_code`, `item_qty`, `item_rate`, `date`) VALUES
(1, '000001', '100001', '1.00', '50.00', '2018-08-18 14:40:18'),
(2, '000001', '100002', '1.00', '50.00', '2018-08-18 14:40:57');

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
(29, 'xli radiator', 156, 'good', 2200, 'LH/12/12', '2', 'st2', 'Koyo cool', 'xl1', '0000-00-00'),
(30, 'mehran ', 50, 'normal', 1200, 'LH/mr', '3', 'st2', 'ND', 'mh12', '0000-00-00'),
(31, 'fiat 640', -27, 'good', 10000, 'lhr122', '1', 'st1', 'allwin', 'fh640', '0000-00-00'),
(32, '640 apper ', 100, 'normal', 530, 'Lh/12', '1', 'st1', 'abd', '', '0000-00-00'),
(33, 'mehran radiator', 6, 'good', 1299, 'kr123', '1', 'st2', 'Koyo cool', 'mh13', '0000-00-00');

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
  `po_status` enum('Active','Blocked') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `po_code`, `po_vendor`, `po_total`, `po_date`, `po_description`, `po_status`) VALUES
(3, '0001', 'AA Traders', '3000.00', '2018-09-03 03:08:00', '4 good quality laptops', 'Active'),
(4, NULL, NULL, NULL, NULL, 'honda,Nissan', 'Active'),
(5, '322', 'fd', NULL, '0000-00-00 00:00:00', 'good', 'Active'),
(6, '3221', 'toyoya', NULL, '0000-00-00 00:00:00', 'good quality', 'Active'),
(7, NULL, 'allwin', NULL, NULL, 'good quality', 'Active'),
(8, NULL, 'fuiji', NULL, NULL, 'super', 'Active'),
(9, NULL, NULL, NULL, NULL, NULL, 'Active'),
(10, NULL, NULL, NULL, NULL, NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_detail`
--

CREATE TABLE `purchase_order_detail` (
  `id` int(11) NOT NULL,
  `po_code` varchar(50) DEFAULT NULL,
  `item_code` varchar(500) DEFAULT NULL,
  `item_qty` decimal(10,2) DEFAULT NULL,
  `item_rate` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order_detail`
--

INSERT INTO `purchase_order_detail` (`id`, `po_code`, `item_code`, `item_qty`, `item_rate`, `date`) VALUES
(3, '0001', '100001', '2.00', '1500.00', '2018-09-04'),
(4, NULL, NULL, NULL, '32.00', NULL),
(5, NULL, NULL, NULL, '32.00', NULL);

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `items_in_stock`
--
ALTER TABLE `items_in_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `po_invoice_detail`
--
ALTER TABLE `po_invoice_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchase_order_detail`
--
ALTER TABLE `purchase_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
