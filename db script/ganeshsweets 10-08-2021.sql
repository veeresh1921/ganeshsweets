-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 10, 2021 at 07:10 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ganeshsweets`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(200) NOT NULL,
  `brand_description` varchar(500) DEFAULT NULL,
  `brand_createdby` varchar(200) NOT NULL,
  `brand_modifiedby` varchar(200) NOT NULL,
  `brand_createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `brand_modifiedon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

DROP TABLE IF EXISTS `company_details`;
CREATE TABLE IF NOT EXISTS `company_details` (
  `companyid` int(12) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(250) NOT NULL,
  `company_address` varchar(250) NOT NULL,
  `company_contact` varchar(15) NOT NULL,
  `company_tag` varchar(500) NOT NULL,
  `company_branches` varchar(250) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ModifiedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `company_GSTIN` varchar(15) DEFAULT NULL,
  `company_BankName` varchar(100) DEFAULT NULL,
  `company_BankAccountNumber` varchar(100) DEFAULT NULL,
  `company_BankIFSC` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`companyid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customerId` int(11) NOT NULL AUTO_INCREMENT,
  `customerCode` varchar(100) NOT NULL,
  `customerName` varchar(200) NOT NULL,
  `customerContactNumber` varchar(15) NOT NULL,
  `customerEmail` varchar(200) NOT NULL,
  `customerAddress` varchar(500) NOT NULL,
  `customerState` varchar(200) NOT NULL,
  `customerCity` varchar(200) NOT NULL,
  `isQuoteGenerated` tinyint(1) NOT NULL DEFAULT '0',
  `createdby` varchar(200) NOT NULL,
  `createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedby` varchar(200) NOT NULL,
  `modifiedon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customerDOV` datetime NOT NULL,
  PRIMARY KEY (`customerId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `customerCode`, `customerName`, `customerContactNumber`, `customerEmail`, `customerAddress`, `customerState`, `customerCity`, `isQuoteGenerated`, `createdby`, `createdon`, `modifiedby`, `modifiedon`, `customerDOV`) VALUES
(1, 'AD-199601-s1', 'swathi', '3465676', 'swathi@gmail.com', '1st cross new badami nagar', 'KARNATAKA', 'hubballi', 0, 'ganeshsweets', '2021-08-07 13:16:39', 'ganeshsweets', '2021-08-07 13:16:39', '1996-01-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `designimages`
--

DROP TABLE IF EXISTS `designimages`;
CREATE TABLE IF NOT EXISTS `designimages` (
  `designImgId` int(11) NOT NULL AUTO_INCREMENT,
  `customerId` int(11) NOT NULL,
  `designFilePath` varchar(200) NOT NULL,
  `designDescription` varchar(500) NOT NULL,
  `createdby` varchar(200) NOT NULL,
  `modifiedby` varchar(200) NOT NULL,
  `modifiedon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`designImgId`),
  KEY `customerId` (`customerId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dimensions`
--

DROP TABLE IF EXISTS `dimensions`;
CREATE TABLE IF NOT EXISTS `dimensions` (
  `dimensionsId` int(11) NOT NULL AUTO_INCREMENT,
  `dimensionsName` varchar(200) NOT NULL,
  `dimensionsDescription` varchar(500) NOT NULL,
  `length` int(11) DEFAULT NULL,
  `breadth` int(11) DEFAULT NULL,
  `thickness` int(11) DEFAULT NULL,
  `createdOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` varchar(200) NOT NULL,
  `modifiedOn` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modifiedBy` varchar(200) NOT NULL,
  PRIMARY KEY (`dimensionsId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dimensions`
--

INSERT INTO `dimensions` (`dimensionsId`, `dimensionsName`, `dimensionsDescription`, `length`, `breadth`, `thickness`, `createdOn`, `createdBy`, `modifiedOn`, `modifiedBy`) VALUES
(2, '720x560x18', '720x560x18', 720, 560, 18, '2021-06-04 06:46:18', 'info@acedecors.in', '2021-06-04 06:46:18', 'info@acedecors.in'),
(3, 'Top/Bottom', '900mm Carcase', 864, 560, 18, '2021-06-12 12:18:08', 'info@acedecors.in', '2021-06-12 12:18:08', 'info@acedecors.in'),
(4, 'Top/Bottom', '800mm Carcase', 764, 560, 18, '2021-06-12 12:18:39', 'info@acedecors.in', '2021-06-12 12:18:39', 'info@acedecors.in');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_category`
--

DROP TABLE IF EXISTS `enquiry_category`;
CREATE TABLE IF NOT EXISTS `enquiry_category` (
  `enq_catid` int(11) NOT NULL AUTO_INCREMENT,
  `enq_cat_name` varchar(200) NOT NULL,
  `enq_cat_createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `enq_cat_createdby` varchar(200) NOT NULL,
  `enq_cat_modifiedon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `enq_cat_modifiedby` varchar(200) NOT NULL,
  PRIMARY KEY (`enq_catid`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry_category`
--

INSERT INTO `enquiry_category` (`enq_catid`, `enq_cat_name`, `enq_cat_createdon`, `enq_cat_createdby`, `enq_cat_modifiedon`, `enq_cat_modifiedby`) VALUES
(82, 'Modular Wardrobes', '2021-06-10 04:06:08', '', '2021-06-10 04:06:08', ''),
(83, 'Modular Kitchen', '2021-06-10 12:27:13', '', '2021-06-10 12:27:58', '');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_details`
--

DROP TABLE IF EXISTS `enquiry_details`;
CREATE TABLE IF NOT EXISTS `enquiry_details` (
  `enqid` int(11) NOT NULL AUTO_INCREMENT,
  `enq_name` varchar(200) NOT NULL,
  `enq_email` varchar(200) NOT NULL,
  `enq_address` varchar(500) NOT NULL,
  `enq_phone` varchar(10) NOT NULL,
  `enqStatus` enum('Attened','Unattened') NOT NULL DEFAULT 'Unattened',
  `isCustomerCreated` tinyint(1) NOT NULL DEFAULT '0',
  `enq_createdOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `enq_modifiedOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `enq_modifiedBy` varchar(200) NOT NULL,
  `enq_preffered_contact_mode` varchar(20) NOT NULL,
  PRIMARY KEY (`enqid`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry_details`
--

INSERT INTO `enquiry_details` (`enqid`, `enq_name`, `enq_email`, `enq_address`, `enq_phone`, `enqStatus`, `isCustomerCreated`, `enq_createdOn`, `enq_modifiedOn`, `enq_modifiedBy`, `enq_preffered_contact_mode`) VALUES
(12, 'Reyaz Ahmed', 'reyaz@gmail.com', 'dHARWAD', '9742367112', 'Attened', 1, '2021-06-05 10:23:56', '2021-06-25 00:58:50', '', ''),
(50, 'Shashi Kumar', 'shashi@gmail.com', 'Hubli', '9999999999', 'Attened', 0, '2021-06-10 04:14:38', '2021-06-25 00:59:17', '', ''),
(53, 'Shashi Kumar', 'ajayh@gmail.com', 'Dharwad', '9888888888', 'Unattened', 1, '2021-06-10 07:04:47', '2021-06-25 01:00:29', '', ''),
(57, 'MOHD ZAKEE SHAIKH', 'szakee19@gmail.com', 'H.NO:4290, JALGAR STREET BELGAUM.', '7847823770', 'Attened', 1, '2021-07-07 06:04:17', '2021-07-07 06:05:36', '', ''),
(56, 'Azhar Shaikh', 'atharshaikh1@gmail.com', 'Dharwad', '8007961759', 'Attened', 1, '2021-06-24 07:37:53', '2021-06-24 23:41:32', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_followups`
--

DROP TABLE IF EXISTS `enquiry_followups`;
CREATE TABLE IF NOT EXISTS `enquiry_followups` (
  `followupid` int(11) NOT NULL AUTO_INCREMENT,
  `followup_enq_id` int(11) NOT NULL,
  `followup_comments` varchar(500) NOT NULL,
  `followup_createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `followup_by` varchar(200) NOT NULL,
  PRIMARY KEY (`followupid`),
  KEY `followup_enq_id` (`followup_enq_id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry_followups`
--

INSERT INTO `enquiry_followups` (`followupid`, `followup_enq_id`, `followup_comments`, `followup_createdon`, `followup_by`) VALUES
(19, 11, 'test comments', '2021-06-04 09:27:41', '/'),
(20, 11, 'test comments 1', '2021-06-04 09:28:10', '/'),
(21, 11, '', '2021-06-05 10:24:33', 'info@acedecors.in'),
(22, 11, 'test 2', '2021-06-10 04:07:34', '/'),
(23, 12, 'test', '2021-06-10 04:08:21', '/'),
(24, 50, 'Shashi Kumar', '2021-06-10 04:15:18', '/'),
(25, 50, 'shashi kumar 2', '2021-06-10 04:15:52', '/'),
(26, 50, 'test', '2021-06-10 07:02:31', '/'),
(27, 51, 'Hello there its testing', '2021-06-10 07:53:57', 'info@acedecors.in'),
(28, 52, 'testing1', '2021-06-10 08:03:19', 'info@acedecors.in'),
(29, 51, '', '2021-06-10 08:29:27', 'info@acedecors.in'),
(30, 0, '', '2021-06-10 08:46:12', 'info@acedecors.in'),
(31, 0, '', '2021-06-10 08:49:40', '/'),
(32, 0, '', '2021-06-10 08:49:46', '/'),
(33, 54, '123 test', '2021-06-10 09:16:49', '/'),
(34, 0, '', '2021-06-24 07:35:27', 'info@acedecors.in'),
(35, 0, '', '2021-06-24 07:35:34', 'info@acedecors.in'),
(36, 0, '', '2021-06-24 07:35:38', 'info@acedecors.in'),
(37, 54, '', '2021-06-24 07:35:59', 'info@acedecors.in'),
(38, 0, '', '2021-06-24 07:36:03', 'info@acedecors.in'),
(39, 0, '', '2021-06-24 07:36:07', 'info@acedecors.in'),
(40, 0, '', '2021-06-24 07:39:07', 'info@acedecors.in'),
(41, 56, 'Construction Work in Progress', '2021-06-24 23:41:32', 'info@acedecors.in'),
(42, 12, 'test2', '2021-06-25 00:58:50', 'info@acedecors.in'),
(43, 50, 'test2', '2021-06-25 00:59:17', 'info@acedecors.in'),
(44, 50, '', '2021-06-25 01:00:29', 'info@acedecors.in'),
(45, 57, 'INITIAL CONTACT PENDING', '2021-07-07 06:04:54', 'info@acedecors.in'),
(46, 57, '', '2021-07-07 06:05:36', 'info@acedecors.in');

-- --------------------------------------------------------

--
-- Table structure for table `enq_cat_mapping`
--

DROP TABLE IF EXISTS `enq_cat_mapping`;
CREATE TABLE IF NOT EXISTS `enq_cat_mapping` (
  `enq_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enq_cat_mapping`
--

INSERT INTO `enq_cat_mapping` (`enq_id`, `cat_id`) VALUES
(12, 1),
(12, 2),
(50, 82),
(50, 3),
(57, 82),
(56, 83),
(56, 82);

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

DROP TABLE IF EXISTS `item_category`;
CREATE TABLE IF NOT EXISTS `item_category` (
  `item_catid` int(11) NOT NULL AUTO_INCREMENT,
  `item_catName` varchar(200) NOT NULL,
  `item_catDescription` varchar(500) NOT NULL,
  `item_catCreatedOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_catCreatedBy` varchar(200) NOT NULL,
  `item_catModifiedOn` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `item_catModifiedBy` varchar(200) NOT NULL,
  PRIMARY KEY (`item_catid`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`item_catid`, `item_catName`, `item_catDescription`, `item_catCreatedOn`, `item_catCreatedBy`, `item_catModifiedOn`, `item_catModifiedBy`) VALUES
(67, 'Sweets', 'various variety of sweets', '2021-08-04 11:49:52', 'ganeshsweets', '2021-08-04 11:49:52', 'ganeshsweets'),
(62, 'Namkeen', 'various variety of Namkeen', '2021-08-03 14:35:06', 'info@acedecors.in', '2021-08-06 15:33:14', 'info@acedecors.in');

-- --------------------------------------------------------

--
-- Table structure for table `item_companydetails`
--

DROP TABLE IF EXISTS `item_companydetails`;
CREATE TABLE IF NOT EXISTS `item_companydetails` (
  `item_compid` int(11) NOT NULL AUTO_INCREMENT,
  `item_compName` varchar(200) NOT NULL,
  `item_compContactName` varchar(200) DEFAULT NULL,
  `item_compContactNumber` varchar(20) DEFAULT NULL,
  `item_compDescription` varchar(500) NOT NULL,
  `item_compGSTIN` varchar(20) NOT NULL,
  `item_compAccountno` varchar(100) NOT NULL,
  `item_compAccountname` varchar(100) NOT NULL,
  `item_compaccIFSCcode` varchar(100) NOT NULL,
  `item_compaccMICRcode` varchar(100) NOT NULL,
  `item_compAddress` varchar(1000) NOT NULL,
  `item_compCreatedBy` varchar(200) NOT NULL,
  `item_compCreatedOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_compModifiedBy` varchar(200) NOT NULL,
  `item_compModifedOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `item_complogo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`item_compid`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_companydetails`
--

INSERT INTO `item_companydetails` (`item_compid`, `item_compName`, `item_compContactName`, `item_compContactNumber`, `item_compDescription`, `item_compGSTIN`, `item_compAccountno`, `item_compAccountname`, `item_compaccIFSCcode`, `item_compaccMICRcode`, `item_compAddress`, `item_compCreatedBy`, `item_compCreatedOn`, `item_compModifiedBy`, `item_compModifedOn`, `item_complogo`) VALUES
(21, 'Hettich india Pvt Ltd', 'Abhishek', '+91 9999999999', 'Company Description', '29AAACH8849M1ZT', '00012334555', '00012334555', 'ICIC001234', '223344', 'Mumbai', 'info@acedecors.in', '2021-06-05 02:13:49', 'info@acedecors.in', '2021-06-05 02:15:18', 'hettich logo.gif'),
(22, 'South India Ply Distributors', 'Abhishek', '+91 9999999999', 'Company Description', '29AAACH8849M1ZT', '00012334555', '00012334555', 'ICIC001234', '223344', 'Bangalore', 'info@acedecors.in', '2021-06-05 02:17:29', 'info@acedecors.in', '2021-06-05 03:05:36', 'download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `item_details`
--

DROP TABLE IF EXISTS `item_details`;
CREATE TABLE IF NOT EXISTS `item_details` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(200) NOT NULL,
  `item_catid` int(11) NOT NULL,
  `item_subcatid` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_details`
--

INSERT INTO `item_details` (`item_id`, `item_name`, `item_catid`, `item_subcatid`) VALUES
(1, 'Motichoor Ladoo', 67, 21),
(2, 'Sada mysore Pak', 67, 21),
(3, 'Balu shah', 67, 21),
(4, 'Halwa', 67, 21),
(5, 'Jahangir', 67, 21),
(6, 'Jelebi', 67, 21),
(7, 'Motipak', 67, 21),
(8, 'Dry fruit halwa', 67, 21),
(9, 'Chocolate roll', 67, 16),
(10, 'Pista roll', 67, 16),
(11, 'Keshar roll', 67, 16),
(12, 'Keshar pedha', 67, 16),
(13, 'Chocolate burfi', 67, 16),
(14, 'White burfi', 67, 16),
(15, 'Amruth pedha', 67, 16),
(16, 'Badam pedha', 67, 16),
(17, 'Mango burfi', 67, 16),
(18, 'Pista burfi', 67, 16),
(19, 'Coconut burfi', 67, 16),
(20, 'Mawa sandwich', 67, 16),
(21, 'Doodh pedha', 67, 16),
(22, 'Vip burfi', 67, 16),
(23, 'Kunda', 67, 16),
(24, 'Badami charry', 67, 16),
(25, 'Orange burfi', 67, 16),
(26, 'Rose burfi', 67, 16),
(27, 'Vanilla burfi', 67, 16),
(28, 'Pista chap', 67, 16),
(29, 'Elachi burfi', 67, 16),
(30, 'Dry fruit burfi', 67, 16),
(31, 'Kalakand burfi', 67, 17),
(32, 'Milk cake', 67, 17),
(33, 'Malie pedha', 67, 17),
(34, 'Ghee mysore pak', 67, 18),
(35, 'Kardant', 67, 18),
(36, 'Dink ladu', 67, 18),
(37, 'Soan papadi', 67, 18),
(38, 'Dry jamoon', 67, 18),
(39, 'Soan cake', 67, 18),
(40, 'Besan ladu', 67, 18),
(41, 'Kaju pista roll', 67, 19),
(42, 'Kaju burfi', 67, 19),
(43, 'Kaju pan', 67, 19),
(44, 'Kaju khajur', 67, 19),
(45, 'Kaju strabery', 67, 19),
(46, 'Champakali', 67, 20),
(47, 'Cham cham', 67, 20),
(48, 'Angoor dana', 67, 20),
(49, 'Malie sandwich', 67, 20),
(50, 'Rasmalai', 67, 20),
(51, 'Badam milk', 67, 20),
(52, 'chuda', 62, 10),
(53, 'Spl chuda', 62, 10),
(54, 'Saboo chooda', 62, 10),
(55, 'Aloo chuda', 62, 10),
(56, 'Palak ghati', 62, 11),
(57, 'Masala ghati', 62, 11),
(58, 'Ghati', 62, 11),
(59, 'Papdi', 62, 11),
(60, 'Bhavanagri', 62, 11),
(61, 'Masala shenga', 62, 12),
(62, 'Atta shenga', 62, 12),
(63, 'Dal', 62, 15),
(64, 'Dalmoth', 62, 15),
(65, 'Mota sew', 62, 15),
(66, 'Baarik sew', 62, 15),
(67, 'Bombay mix', 62, 15),
(68, 'Agra mix', 62, 15),
(69, 'Navratna mix', 62, 15),
(70, 'Spl agra', 62, 15),
(71, 'Kharabundi', 62, 13),
(72, 'Chakkali', 62, 13),
(73, 'Bharkawada', 62, 13),
(74, 'Methi wada', 62, 13),
(75, 'Dry somosa', 62, 13),
(76, 'Masala chips', 62, 13),
(77, 'Shankar pali', 62, 13),
(78, 'Hachhid awalakki', 62, 13),
(79, 'Kabul chana', 62, 13);

-- --------------------------------------------------------

--
-- Table structure for table `item_stock`
--

DROP TABLE IF EXISTS `item_stock`;
CREATE TABLE IF NOT EXISTS `item_stock` (
  `item_stockid` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `item_stockbatchno` varchar(200) NOT NULL,
  `item_stockquantity` int(11) NOT NULL,
  `item_stockinwarddate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_stockcomments` varchar(500) NOT NULL,
  `item_stockdescription` varchar(500) NOT NULL,
  `item_stockcreatedon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_stockcreatedby` varchar(200) NOT NULL,
  `item_stockmodifiedon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `item_stockmodifiedby` varchar(200) NOT NULL,
  PRIMARY KEY (`item_stockid`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_stock`
--

INSERT INTO `item_stock` (`item_stockid`, `item_id`, `item_stockbatchno`, `item_stockquantity`, `item_stockinwarddate`, `item_stockcomments`, `item_stockdescription`, `item_stockcreatedon`, `item_stockcreatedby`, `item_stockmodifiedon`, `item_stockmodifiedby`) VALUES
(28, 7, '5-6-2021-SAH130SOMBER ACACIA', 5, '2021-06-05 11:15:29', 'AAA', 'BBBB', '2021-06-05 11:15:29', 'info@acedecors.in', '2021-06-05 11:15:29', 'info@acedecors.in'),
(29, 9, '5-6-2021-SAH130SOMBER ACACIA', 3, '2021-06-05 11:17:48', '11', '111', '2021-06-05 11:17:48', 'info@acedecors.in', '2021-06-05 11:17:48', 'info@acedecors.in');

-- --------------------------------------------------------

--
-- Table structure for table `item_subcategory`
--

DROP TABLE IF EXISTS `item_subcategory`;
CREATE TABLE IF NOT EXISTS `item_subcategory` (
  `item_subcatid` int(11) NOT NULL AUTO_INCREMENT,
  `item_catid` int(11) NOT NULL,
  `item_subcatName` varchar(200) NOT NULL,
  `item_subcatDescription` varchar(100) NOT NULL,
  `item_subcatCreatedBy` varchar(200) NOT NULL,
  `item_subcatCreatedOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_subcatModifiedBy` varchar(200) NOT NULL,
  `item_subcatModifiedon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_subcatid`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_subcategory`
--

INSERT INTO `item_subcategory` (`item_subcatid`, `item_catid`, `item_subcatName`, `item_subcatDescription`, `item_subcatCreatedBy`, `item_subcatCreatedOn`, `item_subcatModifiedBy`, `item_subcatModifiedon`) VALUES
(17, 67, 'Milk Sweets', '', 'ganeshsweets', '2021-08-04 11:59:37', 'ganeshsweets', '2021-08-05 12:52:09'),
(2, 57, 'Kaju Sweets', '', 'ganeshsweets', '2021-08-03 13:04:45', 'ganeshsweets', '2021-08-05 12:52:21'),
(3, 57, 'Bengali Sweets', '', 'ganeshsweets', '2021-08-03 13:05:19', 'ganeshsweets', '2021-08-05 12:52:33'),
(4, 57, 'Milk Sweets', '', 'ganeshsweets', '2021-08-03 13:05:42', 'ganeshsweets', '2021-08-05 12:52:46'),
(5, 60, 'Chuda', '', 'ganeshsweets', '2021-08-03 13:08:53', 'ganeshsweets', '2021-08-05 12:52:54'),
(6, 60, 'Dal', '', 'ganeshsweets', '2021-08-03 13:11:23', 'ganeshsweets', '2021-08-05 12:53:11'),
(7, 60, 'Shenga', '', 'ganeshsweets', '2021-08-03 13:13:00', 'ganeshsweets', '2021-08-05 12:53:26'),
(8, 60, 'Sew', '', 'ganeshsweets', '2021-08-03 14:24:04', 'ganeshsweets', '2021-08-05 12:53:44'),
(15, 62, 'Sew', '', 'ganeshsweets', '2021-08-04 11:57:04', 'ganeshsweets', '2021-08-05 12:53:52'),
(16, 67, 'Khawa Sweets', '', 'ganeshsweets', '2021-08-04 11:59:02', 'ganeshsweets', '2021-08-05 12:54:50'),
(10, 62, 'Chuda', '', 'ganeshsweets', '2021-08-03 14:37:43', 'ganeshsweets', '2021-08-05 12:55:02'),
(11, 62, 'GHATI', '', 'ganeshsweets', '2021-08-03 14:38:03', 'ganeshsweets', '2021-08-03 14:38:03'),
(12, 62, 'Shenga', '', 'ganeshsweets', '2021-08-03 14:38:16', 'ganeshsweets', '2021-08-05 12:55:15'),
(13, 62, 'Snacks', '', 'ganeshsweets', '2021-08-03 14:38:35', 'ganeshsweets', '2021-08-05 12:55:27'),
(14, 57, 'Normal Sweets', '', 'ganeshsweets', '2021-08-03 14:39:37', 'ganeshsweets', '2021-08-05 12:55:38'),
(18, 67, 'Ghee & Dry Fruits', '', 'ganeshsweets', '2021-08-04 12:02:30', 'ganeshsweets', '2021-08-05 12:55:55'),
(19, 67, 'Kaju Sweets', '', 'ganeshsweets', '2021-08-04 12:03:30', 'ganeshsweets', '2021-08-05 12:56:12'),
(20, 67, 'Bengali Sweets', '', 'ganeshsweets', '2021-08-04 12:04:21', 'ganeshsweets', '2021-08-05 12:56:27'),
(21, 67, 'Normal Sweets', '', 'ganeshsweets', '2021-08-04 12:05:17', 'ganeshsweets', '2021-08-05 12:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `item_subcategorynum`
--

DROP TABLE IF EXISTS `item_subcategorynum`;
CREATE TABLE IF NOT EXISTS `item_subcategorynum` (
  `item_subcatid` int(200) NOT NULL AUTO_INCREMENT,
  `item_catid` int(200) NOT NULL,
  `item_subcatName` varchar(200) NOT NULL,
  `item_subcatDescription` varchar(200) NOT NULL,
  `item_subcatCreateBy` varchar(200) NOT NULL,
  `item_subcatCreatedOn` varchar(200) NOT NULL,
  `item_subcatModiedBy` varchar(200) NOT NULL,
  `item_subcatModifiedOn` varchar(200) NOT NULL,
  PRIMARY KEY (`item_subcatid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paymentinfo`
--

DROP TABLE IF EXISTS `paymentinfo`;
CREATE TABLE IF NOT EXISTS `paymentinfo` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_contactnumber` varchar(20) NOT NULL,
  `total_amount` int(100) NOT NULL,
  `paid_amount` int(100) NOT NULL,
  `pending_amount` int(100) NOT NULL,
  `payment_plan` varchar(100) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `due_date` date DEFAULT NULL,
  `payment_description` varchar(100) NOT NULL,
  `modifieddate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(100) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paymentinfo`
--

INSERT INTO `paymentinfo` (`payment_id`, `customer_id`, `customer_name`, `customer_contactnumber`, `total_amount`, `paid_amount`, `pending_amount`, `payment_plan`, `payment_mode`, `due_date`, `payment_description`, `modifieddate`, `modified_by`) VALUES
(1, 1, 'swathi', '3465676', 2500, 1000, 1500, 'Part Payment', 'Cash', '2021-08-09', 'jhgu', '2021-08-07 16:48:08', 'ganeshsweets'),
(3, 1, 'swathi', '3465676', 2500, 1000, 500, 'Part Payment', 'Cash', '2021-08-13', 'cdghgf', '2021-08-07 17:16:21', 'ganeshsweets');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `product_dimensions` varchar(100) NOT NULL,
  `product_dimensionsid` int(11) NOT NULL,
  `product_item` varchar(200) NOT NULL,
  `product_itemid` int(11) NOT NULL,
  `item_category` varchar(100) NOT NULL,
  `item_catid` int(11) NOT NULL,
  `item_subcategory` varchar(100) NOT NULL,
  `item_subcatid` int(11) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `product_brandid` int(11) NOT NULL,
  `product_itemcode` int(20) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_categoryid` int(11) NOT NULL,
  `product_subcategory` varchar(100) NOT NULL,
  `product_subcategoryid` int(11) NOT NULL,
  `product_quantity` int(10) NOT NULL,
  `product_store` varchar(50) NOT NULL,
  `product_unit` varchar(100) NOT NULL,
  `product_unitid` int(11) NOT NULL,
  `product_barcode` varchar(100) NOT NULL,
  `productID` varchar(100) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `product_catid` int(11) NOT NULL AUTO_INCREMENT,
  `product_catName` varchar(200) NOT NULL,
  `product_catDescription` varchar(200) NOT NULL,
  `product_catCreatedby` varchar(200) NOT NULL,
  `product_catModifiedby` varchar(200) NOT NULL,
  `product_catCreatedon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_catmodifiedon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_catid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_catid`, `product_catName`, `product_catDescription`, `product_catCreatedby`, `product_catModifiedby`, `product_catCreatedon`, `product_catmodifiedon`) VALUES
(1, 'Modular Kitchen', 'Cabinets For Kitchen', '', '', '2021-06-04 10:54:22', '2021-06-04 10:54:22'),
(2, 'Wardrobe', 'Cabinets For Bedroom', '', '', '2021-06-06 21:16:42', '2021-06-06 21:16:42'),
(3, '123', '345', '', '', '2021-06-07 06:46:16', '2021-06-07 06:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `product_subcategory`
--

DROP TABLE IF EXISTS `product_subcategory`;
CREATE TABLE IF NOT EXISTS `product_subcategory` (
  `product_subcatid` int(11) NOT NULL AUTO_INCREMENT,
  `product_catid` int(11) DEFAULT NULL,
  `product_subcatName` varchar(200) NOT NULL,
  `product_subcatDescription` varchar(200) NOT NULL,
  `product_subcatCreatedby` varchar(100) NOT NULL,
  `product_subcatModifiedby` varchar(100) NOT NULL,
  `product_subcatCreatedon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_subcatModifiedon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_subcatid`),
  KEY `product_catid` (`product_catid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_subcategory`
--

INSERT INTO `product_subcategory` (`product_subcatid`, `product_catid`, `product_subcatName`, `product_subcatDescription`, `product_subcatCreatedby`, `product_subcatModifiedby`, `product_subcatCreatedon`, `product_subcatModifiedon`) VALUES
(1, 1, 'Carcase', 'Cabinets', '', '', '2021-06-04 10:55:15', '2021-06-04 10:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_details`
--

DROP TABLE IF EXISTS `quotation_details`;
CREATE TABLE IF NOT EXISTS `quotation_details` (
  `quoid` int(11) NOT NULL AUTO_INCREMENT,
  `quo_enq_id` int(11) NOT NULL,
  `enqCatId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `quoteCode` varchar(100) NOT NULL,
  `quoteValue` decimal(10,2) DEFAULT NULL,
  `unitId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `quoteDescription` varchar(500) DEFAULT NULL,
  `itemListName` varchar(200) DEFAULT NULL,
  `orderListName` varchar(200) DEFAULT NULL,
  `quo_type` enum('General','Bank') NOT NULL,
  `quo_pdf_name` varchar(100) DEFAULT NULL,
  `quo_createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quo_createdby` varchar(100) NOT NULL,
  `modifiedby` varchar(200) NOT NULL,
  `modifiedon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `quo_status` enum('pending','rejected','Approved') NOT NULL DEFAULT 'pending',
  `quo_comments` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`quoid`),
  KEY `quo_enq_id` (`quo_enq_id`),
  KEY `customerId` (`customerId`),
  KEY `enqCatId` (`enqCatId`),
  KEY `unitId` (`unitId`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotation_details`
--

INSERT INTO `quotation_details` (`quoid`, `quo_enq_id`, `enqCatId`, `customerId`, `quoteCode`, `quoteValue`, `unitId`, `quantity`, `quoteDescription`, `itemListName`, `orderListName`, `quo_type`, `quo_pdf_name`, `quo_createdon`, `quo_createdby`, `modifiedby`, `modifiedon`, `quo_status`, `quo_comments`) VALUES
(5, 11, 0, 4, '', NULL, NULL, NULL, 'Modular Kitchen', '', '', 'General', '', '2021-06-05 02:23:29', 'info@acedecors.in', '', '2021-06-10 10:47:45', 'pending', ''),
(6, 11, 0, 4, '', NULL, NULL, NULL, '', '', '', 'Bank', '', '2021-06-07 06:59:34', '', '', '2021-06-10 10:30:01', 'pending', ''),
(10, 12, 0, 5, '', NULL, NULL, NULL, '', '', '', 'General', '', '2021-06-10 05:25:50', '', '', '2021-06-10 05:27:35', 'Approved', ''),
(11, 13, 0, 6, '', NULL, NULL, NULL, '', '', '', 'General', '', '2021-06-10 05:30:10', '', '', '2021-06-10 10:42:01', 'rejected', 'Did not like the design.'),
(12, 11, 0, 4, '', NULL, NULL, NULL, '', '', '', 'General', '', '2021-06-10 10:19:41', '', '', '2021-06-10 10:19:41', 'pending', ''),
(19, 56, 82, 14, 'AS14-MW-01', '20000000.00', 55, 100, 'Some description about the project', 'AD-202106-AS14AS14-MW-01.pdf', '', 'General', 'AD-202106-AS14_PROFORMA_Invoice.pdf', '2021-06-24 07:40:53', 'info@acedecors.in', 'info@acedecors.in', '2021-06-25 00:20:08', 'pending', ''),
(20, 57, 82, 16, 'MZS16-MW-01', '12345.00', NULL, NULL, '', '', '', 'General', 'AD--MZS16_PROFORMA_Invoice.pdf', '2021-07-07 06:08:00', 'info@acedecors.in', 'info@acedecors.in', '2021-07-07 06:09:46', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `quotelineitem`
--

DROP TABLE IF EXISTS `quotelineitem`;
CREATE TABLE IF NOT EXISTS `quotelineitem` (
  `lineItemId` int(11) NOT NULL AUTO_INCREMENT,
  `quoteId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `item_catid` int(20) NOT NULL,
  `item_subcatid` int(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `totalAmount` decimal(10,2) NOT NULL,
  `discount1` decimal(10,2) DEFAULT NULL,
  `discount1Amt` decimal(10,2) DEFAULT NULL,
  `discount2` decimal(10,2) DEFAULT NULL,
  `discount2Amt` decimal(10,2) DEFAULT NULL,
  `GSTAmount` decimal(10,2) NOT NULL,
  `GST` decimal(10,2) NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL,
  `billedAmount` decimal(10,2) DEFAULT NULL,
  `createdby` varchar(200) NOT NULL,
  `createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedby` varchar(200) NOT NULL,
  `modifiedon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lineItemId`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotelineitem`
--

INSERT INTO `quotelineitem` (`lineItemId`, `quoteId`, `itemId`, `item_catid`, `item_subcatid`, `quantity`, `amount`, `totalAmount`, `discount1`, `discount1Amt`, `discount2`, `discount2Amt`, `GSTAmount`, `GST`, `totalPrice`, `billedAmount`, `createdby`, `createdon`, `modifiedby`, `modifiedon`) VALUES
(43, 12, 10, 0, 0, 2, '172.00', '172.00', '0.00', '0.00', '0.00', '0.00', '30.96', '18.00', '202.96', NULL, '', '2021-06-10 10:19:41', '', '2021-06-10 10:19:41'),
(7, 5, 7, 0, 0, 15, '62.55', '62.55', '10.00', '37.53', '1.00', '37.15', '11.26', '18.00', '73.81', NULL, 'info@acedecors.in', '2021-06-05 02:23:29', 'info@acedecors.in', '2021-06-05 02:23:29'),
(8, 5, 7, 0, 0, 15, '62.55', '62.55', '10.00', '37.53', '1.00', '37.15', '11.26', '18.00', '73.81', NULL, 'info@acedecors.in', '2021-06-05 02:23:29', 'info@acedecors.in', '2021-06-05 02:23:29'),
(9, 6, 9, 0, 0, 15, '4608.00', '4608.00', '10.00', '0.00', '0.00', '0.00', '829.44', '18.00', '5437.44', NULL, '', '2021-06-07 06:59:34', '', '2021-06-07 06:59:34'),
(10, 6, 9, 0, 0, 15, '4608.00', '4608.00', '10.00', '0.00', '0.00', '0.00', '829.44', '18.00', '5437.44', NULL, '', '2021-06-07 06:59:34', '', '2021-06-07 06:59:34'),
(11, 6, 9, 0, 0, 15, '4608.00', '4608.00', '10.00', '4147.20', '1.00', '4105.73', '739.03', '18.00', '4844.76', NULL, '', '2021-06-07 06:59:34', '', '2021-06-07 06:59:34'),
(42, 12, 7, 0, 0, 10, '60.00', '60.00', '10.00', '54.00', '10.00', '48.60', '8.75', '18.00', '57.35', NULL, '', '2021-06-10 10:19:41', '', '2021-06-10 10:19:41'),
(39, 10, 11, 0, 0, 15, '5625.00', '5625.00', '0.00', '0.00', '0.00', '0.00', '1012.50', '18.00', '6637.50', NULL, '', '2021-06-10 05:25:50', '', '2021-06-10 05:25:50'),
(40, 10, 10, 0, 0, 64, '5504.00', '5504.00', '0.00', '0.00', '0.00', '0.00', '990.72', '18.00', '6494.72', NULL, '', '2021-06-10 05:25:50', '', '2021-06-10 05:25:50'),
(41, 11, 7, 0, 0, 15, '90.00', '90.00', '0.00', '0.00', '0.00', '0.00', '16.20', '18.00', '106.20', NULL, '', '2021-06-10 05:30:10', '', '2021-06-10 05:30:10'),
(80, 19, 11, 0, 0, 1500, '562500.00', '562500.00', '10.00', '506250.00', '10.00', '455625.00', '82012.50', '18.00', '537637.50', NULL, 'info@acedecors.in', '2021-06-24 07:40:53', 'info@acedecors.in', '2021-06-24 07:40:53'),
(81, 19, 11, 0, 0, 1500, '562500.00', '562500.00', '10.00', '506250.00', '10.00', '455625.00', '82012.50', '18.00', '537637.50', NULL, 'info@acedecors.in', '2021-06-24 07:40:53', 'info@acedecors.in', '2021-06-24 07:40:53'),
(82, 19, 11, 0, 0, 1500, '562500.00', '562500.00', '10.00', '506250.00', '10.00', '455625.00', '82012.50', '18.00', '537637.50', NULL, 'info@acedecors.in', '2021-06-24 07:40:53', 'info@acedecors.in', '2021-06-24 07:40:53'),
(83, 19, 11, 0, 0, 1500, '562500.00', '562500.00', '10.00', '506250.00', '10.00', '455625.00', '82012.50', '18.00', '537637.50', NULL, 'info@acedecors.in', '2021-06-24 07:40:53', 'info@acedecors.in', '2021-06-24 07:40:53'),
(84, 19, 11, 0, 0, 1500, '562500.00', '562500.00', '10.00', '506250.00', '10.00', '455625.00', '82012.50', '18.00', '537637.50', NULL, 'info@acedecors.in', '2021-06-24 07:40:53', 'info@acedecors.in', '2021-06-24 07:40:53'),
(85, 19, 7, 0, 0, 15, '90.00', '90.00', '10.00', '81.00', '10.00', '72.90', '13.12', '18.00', '86.02', NULL, 'info@acedecors.in', '2021-06-24 07:40:53', 'info@acedecors.in', '2021-06-24 07:40:53'),
(86, 19, 7, 0, 0, 15, '90.00', '90.00', '10.00', '81.00', '10.00', '72.90', '13.12', '18.00', '86.02', NULL, 'info@acedecors.in', '2021-06-24 07:40:53', 'info@acedecors.in', '2021-06-24 07:40:53'),
(87, 20, 10, 0, 0, 100, '275200.00', '275200.00', '0.00', '0.00', '0.00', '0.00', '49536.00', '18.00', '324736.00', NULL, 'info@acedecors.in', '2021-07-07 06:08:00', 'info@acedecors.in', '2021-07-07 06:08:00'),
(88, 20, 10, 0, 0, 100, '275200.00', '275200.00', '0.00', '0.00', '0.00', '0.00', '49536.00', '18.00', '324736.00', NULL, 'info@acedecors.in', '2021-07-07 06:08:00', 'info@acedecors.in', '2021-07-07 06:08:00'),
(89, 20, 10, 0, 0, 100, '275200.00', '275200.00', '0.00', '0.00', '0.00', '0.00', '49536.00', '18.00', '324736.00', NULL, 'info@acedecors.in', '2021-07-07 06:08:00', 'info@acedecors.in', '2021-07-07 06:08:00'),
(90, 20, 10, 0, 0, 100, '275200.00', '275200.00', '0.00', '0.00', '0.00', '0.00', '49536.00', '18.00', '324736.00', NULL, 'info@acedecors.in', '2021-07-07 06:08:00', 'info@acedecors.in', '2021-07-07 06:08:00'),
(91, 5, 11, 52, 38, 10, '7500.00', '7500.00', '10.00', '6750.00', '2.00', '6615.00', '1190.70', '18.00', '7805.70', NULL, 'info@acedecors.in', '2021-07-24 16:25:27', 'info@acedecors.in', '2021-07-24 16:25:27'),
(92, 5, 10, 51, 39, 10, '27520.00', '27520.00', '10.00', '24768.00', '4.00', '23777.28', '4279.91', '18.00', '28057.19', NULL, 'info@acedecors.in', '2021-07-24 16:42:36', 'info@acedecors.in', '2021-07-24 16:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `salesorder_lineitem`
--

DROP TABLE IF EXISTS `salesorder_lineitem`;
CREATE TABLE IF NOT EXISTS `salesorder_lineitem` (
  `SOlineitemId` int(11) NOT NULL AUTO_INCREMENT,
  `SOID` varchar(100) DEFAULT NULL,
  `Item_id` int(11) DEFAULT NULL,
  `Quantity` int(20) NOT NULL,
  `Price` int(20) NOT NULL,
  `TotalAmt` int(20) NOT NULL,
  `GST` varchar(50) NOT NULL,
  `Modified_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`SOlineitemId`),
  KEY `Item_id` (`Item_id`),
  KEY `POID` (`SOID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesorder_lineitem`
--

INSERT INTO `salesorder_lineitem` (`SOlineitemId`, `SOID`, `Item_id`, `Quantity`, `Price`, `TotalAmt`, `GST`, `Modified_Date`) VALUES
(1, '1', 55, 25, 1000, 2500, '', '2021-08-07 16:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

DROP TABLE IF EXISTS `sales_order`;
CREATE TABLE IF NOT EXISTS `sales_order` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `SOcode` varchar(20) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `Item_id` int(11) NOT NULL,
  `SalesDate` datetime NOT NULL,
  `TotalAmt` int(100) NOT NULL,
  `PendingAmt` int(100) NOT NULL,
  `createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `SupplierId` (`CustomerId`),
  KEY `Item_id` (`Item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`Id`, `SOcode`, `CustomerId`, `Item_id`, `SalesDate`, `TotalAmt`, `PendingAmt`, `createdon`, `Modified_date`) VALUES
(1, 'GS-202107-s', 1, 55, '2021-07-26 00:00:00', 2500, 2500, '2021-08-07 16:47:44', '2021-08-07 16:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `suppliercontactdetails`
--

DROP TABLE IF EXISTS `suppliercontactdetails`;
CREATE TABLE IF NOT EXISTS `suppliercontactdetails` (
  `contactId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `emailId` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `createdby` varchar(200) NOT NULL,
  `modifiedby` varchar(200) NOT NULL,
  `modifiedon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`contactId`),
  KEY `supplierId` (`supplierId`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliercontactdetails`
--

INSERT INTO `suppliercontactdetails` (`contactId`, `name`, `supplierId`, `emailId`, `designation`, `phone`, `createdby`, `modifiedby`, `modifiedon`, `createdon`) VALUES
(9, 'Shashi', 21, 'shashi@gmail.com', 'Sales', '9999999999', 'info@acedecors.in', 'info@acedecors.in', '2021-06-11 22:53:33', '2021-06-11 22:53:33'),
(6, 'Athar Shaikh', 22, 'atharshaikh1@gmail.com', 'Manager', '8007961759', 'ACE DECORS', 'ACE DECORS', '2021-06-11 02:20:26', '2021-06-11 02:20:26'),
(8, 'Reyaz', 21, 'ajayh@gmail.com', 'ASM', '9888888888', 'info@acedecors.in', 'info@acedecors.in', '2021-06-11 22:52:48', '2021-06-11 22:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_brand_mapping`
--

DROP TABLE IF EXISTS `supplier_brand_mapping`;
CREATE TABLE IF NOT EXISTS `supplier_brand_mapping` (
  `supplierId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `createdby` varchar(200) NOT NULL,
  `modifiedby` varchar(200) NOT NULL,
  `createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_brand_mapping`
--

INSERT INTO `supplier_brand_mapping` (`supplierId`, `brandId`, `createdby`, `modifiedby`, `createdon`, `modifiedon`) VALUES
(20, 9, '', '', '2021-06-05 00:16:06', '2021-06-05 00:16:06'),
(22, 11, '', '', '2021-06-05 03:05:36', '2021-06-05 03:05:36'),
(21, 8, '', '', '2021-06-05 02:15:39', '2021-06-05 02:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `tax_table`
--

DROP TABLE IF EXISTS `tax_table`;
CREATE TABLE IF NOT EXISTS `tax_table` (
  `tax_id` int(11) NOT NULL AUTO_INCREMENT,
  `GST` decimal(4,2) NOT NULL,
  `SGST` decimal(4,2) DEFAULT NULL,
  `CGST` decimal(4,2) DEFAULT NULL,
  `IGST` decimal(4,2) DEFAULT NULL,
  `Modified_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Created_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Created_By` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Modified_By` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`tax_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tax_table`
--

INSERT INTO `tax_table` (`tax_id`, `GST`, `SGST`, `CGST`, `IGST`, `Modified_Date`, `Created_Date`, `Created_By`, `Modified_By`) VALUES
(3, '18.00', '9.00', '9.00', NULL, '2021-06-03 22:16:41', '2021-06-03 22:16:41', '', 'info@acedecors.in'),
(4, '12.00', '6.00', '6.00', NULL, '2021-06-04 02:57:48', '2021-06-04 02:57:48', '', 'info@acedecors.in'),
(5, '18.00', NULL, NULL, '18.00', '2021-06-04 02:57:55', '2021-06-04 02:57:55', '', 'info@acedecors.in'),
(6, '12.00', NULL, NULL, '12.00', '2021-06-04 02:58:01', '2021-06-04 02:58:01', '', 'info@acedecors.in');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `unitId` int(11) NOT NULL AUTO_INCREMENT,
  `unitName` varchar(200) NOT NULL,
  `unitDescription` varchar(500) NOT NULL,
  `createdOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` varchar(200) NOT NULL,
  `modifiedOn` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modifiedBy` varchar(200) NOT NULL,
  PRIMARY KEY (`unitId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unitId`, `unitName`, `unitDescription`, `createdOn`, `createdBy`, `modifiedOn`, `modifiedBy`) VALUES
(1, 'KG', 'kilogram', '2021-08-05 14:15:21', 'ganeshsweets', '2021-08-05 14:15:21', 'ganeshsweets'),
(2, 'GRAM', 'Grams', '2021-08-05 14:15:41', 'ganeshsweets', '2021-08-05 14:15:41', 'ganeshsweets');

-- --------------------------------------------------------

--
-- Table structure for table `unitsfactor`
--

DROP TABLE IF EXISTS `unitsfactor`;
CREATE TABLE IF NOT EXISTS `unitsfactor` (
  `unitFactorId` int(11) NOT NULL AUTO_INCREMENT,
  `unitId` int(11) NOT NULL,
  `unitFactor` decimal(11,0) NOT NULL,
  `unitFactorDescription` varchar(500) NOT NULL,
  `createdOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` varchar(200) NOT NULL,
  `modifiedOn` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modifiedBy` varchar(200) NOT NULL,
  PRIMARY KEY (`unitFactorId`),
  KEY `unitId` (`unitId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unitsfactor`
--

INSERT INTO `unitsfactor` (`unitFactorId`, `unitId`, `unitFactor`, `unitFactorDescription`, `createdOn`, `createdBy`, `modifiedOn`, `modifiedBy`) VALUES
(1, 1, '1', '1 kg=1 unit factor', '2021-08-05 14:16:58', 'ganeshsweets', '2021-08-05 14:16:58', 'ganeshsweets'),
(2, 2, '1', '1 g=1 unit factor', '2021-08-05 14:17:09', 'ganeshsweets', '2021-08-05 15:22:26', 'ganeshsweets');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(12) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(250) NOT NULL,
  `user_contact` varchar(15) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_type` enum('Admin','Manager') NOT NULL,
  `user_status` enum('Enable','Disable') NOT NULL,
  `user_created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ModifiedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_contact`, `user_email`, `user_password`, `user_type`, `user_status`, `user_created_on`, `ModifiedDate`) VALUES
(2, 'ganeshsweets', '9742367112', 'ganeshsweets@gmail.com', 'Ganeshsweets@123', 'Admin', 'Enable', '2021-05-01 18:47:39', '2021-08-02 18:02:31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
