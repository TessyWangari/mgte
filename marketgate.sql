-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2018 at 02:22 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketgate`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus_attributes`
--

CREATE TABLE `bus_attributes` (
  `attribkey` int(255) NOT NULL,
  `bus_name` varchar(500) NOT NULL,
  `bus_tel` varchar(500) NOT NULL,
  `bus_email` varchar(500) NOT NULL,
  `bus_branches` text NOT NULL,
  `bus_location` varchar(500) NOT NULL,
  `facebookurl` varchar(500) NOT NULL,
  `twitterurl` varchar(500) NOT NULL,
  `linkedinurl` varchar(500) NOT NULL,
  `bus_descr` blob NOT NULL,
  `bus_mission` blob NOT NULL,
  `bus_slogan` varchar(500) NOT NULL,
  `bus_vision` varchar(500) NOT NULL,
  `other_contacts` text NOT NULL,
  `site_id` varchar(500) NOT NULL,
  `logourl` varchar(500) NOT NULL,
  `domainname` varchar(500) NOT NULL,
  `about_descr` blob NOT NULL,
  `bus_type` varchar(500) NOT NULL,
  `bus_keywords` blob NOT NULL,
  `cartbutton_type` varchar(500) NOT NULL,
  `onflycss` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_attributes`
--

INSERT INTO `bus_attributes` (`attribkey`, `bus_name`, `bus_tel`, `bus_email`, `bus_branches`, `bus_location`, `facebookurl`, `twitterurl`, `linkedinurl`, `bus_descr`, `bus_mission`, `bus_slogan`, `bus_vision`, `other_contacts`, `site_id`, `logourl`, `domainname`, `about_descr`, `bus_type`, `bus_keywords`, `cartbutton_type`, `onflycss`) VALUES
(17, 'Market Gate', '0723000773', 'marketgate@gmail.com', '', 'Ruruaka', '#', '', '', 0x477265617420506c6163652c2047726561742070656f706c652c20476f6f6420427573696e657373, 0x6e61, 'One Stop Shopping Mall', '									na			', '', 'eshop_CB1X_JLMJ', './eshopimages/logos/eslogo_IQGZ_QNO2.png', 'marketgate', '', 'Products & Services', '', 'Order', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_services`
--

CREATE TABLE `product_services` (
  `prodkey` int(255) NOT NULL,
  `prod_id` varchar(500) NOT NULL,
  `prod_name` varchar(500) NOT NULL,
  `prod_descr` blob NOT NULL,
  `prod_price` varchar(500) NOT NULL,
  `site_id` varchar(500) NOT NULL,
  `prod_type` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_services`
--

INSERT INTO `product_services` (`prodkey`, `prod_id`, `prod_name`, `prod_descr`, `prod_price`, `site_id`, `prod_type`) VALUES
(2, '2ST9COA', 'Blue Ivy Dress', 0x7479, '655', 'MKGT-4TTQZ289GJFQ', 'Fashion'),
(3, 'QMVOPDV', 'Blue Ivy Dress', 0x667666, '3', 'MKGT-4TTQZ289GJFQ', 'Dairy Products');

-- --------------------------------------------------------

--
-- Table structure for table `webtemp_admin`
--

CREATE TABLE `webtemp_admin` (
  `adminkey` int(255) NOT NULL,
  `admin_name` varchar(500) NOT NULL,
  `admin_email` varchar(500) NOT NULL,
  `admin_tel` varchar(500) NOT NULL,
  `admin_pass` varchar(500) NOT NULL,
  `site_id` varchar(500) NOT NULL,
  `confmsg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webtemp_admin`
--

INSERT INTO `webtemp_admin` (`adminkey`, `admin_name`, `admin_email`, `admin_tel`, `admin_pass`, `site_id`, `confmsg`) VALUES
(43, 'Teresia Wangari', 'tess@gmail.com', '0710766390', 'tess', 'eshop_CB1X_JLMJ', ''),
(53, '', 'clearphrases@gmail.com', '', 'hhh', 'MKGT-4TTQZ289GJFQ', 'Thanks for payment please login to access our services');

-- --------------------------------------------------------

--
-- Table structure for table `webtemp_images`
--

CREATE TABLE `webtemp_images` (
  `imgkey` int(255) NOT NULL,
  `image_itemid` varchar(500) NOT NULL,
  `image_url` varchar(500) NOT NULL,
  `image_type` varchar(500) NOT NULL,
  `site_id` varchar(500) NOT NULL,
  `PhotoCaption` varchar(500) NOT NULL,
  `show_img` varchar(500) NOT NULL,
  `cartegory_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webtemp_images`
--

INSERT INTO `webtemp_images` (`imgkey`, `image_itemid`, `image_url`, `image_type`, `site_id`, `PhotoCaption`, `show_img`, `cartegory_name`) VALUES
(3, '2ST9COA', './images/products/PAYDEMO-6OWVABQ-8VK9X.jpg', '', 'MKGT-4TTQZ289GJFQ', '', '', ''),
(4, 'QMVOPDV', './images/products/PAYDEMO-4CHVLNI-R0NET.jpg', '', 'MKGT-4TTQZ289GJFQ', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus_attributes`
--
ALTER TABLE `bus_attributes`
  ADD PRIMARY KEY (`attribkey`);

--
-- Indexes for table `product_services`
--
ALTER TABLE `product_services`
  ADD PRIMARY KEY (`prodkey`);

--
-- Indexes for table `webtemp_admin`
--
ALTER TABLE `webtemp_admin`
  ADD PRIMARY KEY (`adminkey`);

--
-- Indexes for table `webtemp_images`
--
ALTER TABLE `webtemp_images`
  ADD PRIMARY KEY (`imgkey`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus_attributes`
--
ALTER TABLE `bus_attributes`
  MODIFY `attribkey` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_services`
--
ALTER TABLE `product_services`
  MODIFY `prodkey` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `webtemp_admin`
--
ALTER TABLE `webtemp_admin`
  MODIFY `adminkey` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `webtemp_images`
--
ALTER TABLE `webtemp_images`
  MODIFY `imgkey` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
