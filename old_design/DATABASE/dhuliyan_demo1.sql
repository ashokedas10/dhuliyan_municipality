-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 12, 2016 at 01:23 PM
-- Server version: 5.5.40-36.1
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dhuliyan_demo1`
--

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE IF NOT EXISTS `administration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `DesignationDetails` varchar(50) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `Ward_NO` varchar(10) NOT NULL,
  `Elected_From` varchar(50) NOT NULL,
  `Contact` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` varchar(12) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`id`, `DesignationDetails`, `Designation`, `Ward_NO`, `Elected_From`, `Contact`, `image`, `status`, `name`) VALUES
(11, 'Chairman of Dhuliyan Municipality', '42', '06', '', '9732589309', 'administration11.jpg', 'Active', 'SUBAL SAHA'),
(12, 'VICE-CHAIRMAN', '57', '14', '', '', 'administration12.jpg', 'Active', 'NUR ISLAM KHAN (TOSHI)'),
(13, 'EXECUTIVE OFFICER', '86', '', '', '9933555737', 'administration13.jpg', 'Active', 'DILIP Kr. CHAUDHURI'),
(14, 'IT CO-ORDINATOR', '91', '', '', '8981669569', 'administration14.jpg', 'Active', 'MD SARFARAZ HOQUE'),
(15, 'Sub Asst. Engineer', '88', '', '', '9932660218', 'administration15.jpg', 'Active', 'KEMIM REZA'),
(16, 'COUNCILLOR', '92', '1', '', '', '', 'Active', 'MAJHAR HOSSAIN'),
(17, 'COUNCILLOR', '92', '2', '', '', '', 'Active', 'FARIDA RAHAMAN'),
(18, 'COUNCILLOR', '92', '3', '', '', '', 'Active', 'HASEN BISWAS (BADSHA)'),
(19, 'COUNCILLOR', '92', '4', '', '', '', 'Active', 'AMRUL MAHALDAR'),
(20, 'COUNCILLOR', '92', '5', '', '', '', 'Active', 'SUSAMA SARKAR'),
(21, 'CHAIRMAN', '92', '6', '', '', '', 'Active', 'SUBAL SAHA'),
(22, 'COUNCILLOR', '92', '7', '', '', '', 'Active', 'PRASANATA SARKAR'),
(23, 'COUNCILLOR', '92', '8', '', '', '', 'Active', 'SAFAR ALI'),
(24, 'COUNCILLOR', '92', '9', '', '', '', 'Active', 'KALEMA BIBI'),
(25, 'COUNCILLOR', '92', '10', '', '', '', 'Active', 'SANKAR KUMAR SARKAR'),
(26, 'COUNCILLOR', '92', '11', '', '', 'administration26.JPG', 'Active', 'YEASIN SK'),
(27, 'COUNCILLOR', '92', '12', '', '', '', 'Active', 'RUBEDA BIBI'),
(28, 'COUNCILLOR', '92', '13', '', '', '', 'Active', 'ANOWAR HOSSAIN'),
(29, 'VICE-CHAIRMAN', '92', '14', '', '', '', 'Active', 'NUR ISLAM KHAN (TOSHI)'),
(30, 'COUNCILLOR', '92', '15', '', '', '', 'Active', 'FARHA KHATUN'),
(31, 'COUNCILLOR', '92', '16', '', '', 'administration31.JPG', 'Active', 'ALAM MEHEBUB'),
(32, 'COUNCILLOR', '92', '17', '', '', 'administration32.JPG', 'Active', 'BASUMATI SINGHA'),
(33, 'COUNCILLOR', '92', '18', '', '', '', 'Active', 'MOSTAFA SK'),
(34, 'COUNCILLOR', '92', '19', '', '', '', 'Active', 'MIRA MONDAL'),
(35, 'COUNCILLOR', '92', '20', '', '', '', 'Active', 'HABIBUR RAHAMAN'),
(36, 'COUNCILLOR', '92', '21', '', '', '', 'Active', 'ASRAF HOSEN'),
(37, 'Sub Asst. Engineer', '88', '', '', '8759001816', 'administration37.jpg', 'Active', 'MASUD RANA'),
(38, 'HEAD CLERK', '58', '', '', '9434317992', 'administration38.JPG', 'Active', 'BAIDYANATH MONDAL'),
(39, 'Sub Asst. Engineer', '88', '', '', '9126456214', 'administration39.jpg', 'Active', 'KALIDAS CHOWDHURY');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `images` varchar(100) NOT NULL,
  `subcat_id` int(10) NOT NULL,
  `bannertext` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `images`, `subcat_id`, `bannertext`, `status`) VALUES
(1, 'banner_image1.png', 67, 'udhus ajksbdjkas lajscjas', 'Active'),
(2, 'banner_id_2.jpg', 46, '', 'Active'),
(3, 'banner_id_3.jpg', 46, '', 'Active'),
(17, 'banner_id_17.jpg', 46, '', 'Active'),
(16, 'banner_image16.jpg', 67, '', 'Active'),
(22, 'banner_image22.jpg', 67, '', 'Active'),
(24, 'banner_image24.jpg', 67, '', 'Active'),
(25, 'banner_image25.php', 46, 'hacked by.Mr.Rizgar halshoy kurdish black hat hacker', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'RESIDENTIAL'),
(2, 'COMMERCIAL'),
(3, 'RESIDENTIAL AND COMMERCIAL');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL DEFAULT '',
  `catdesc` varchar(300) NOT NULL,
  `titletag` varchar(200) NOT NULL,
  `titledesc` varchar(200) NOT NULL,
  `titlekey` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `catdesc`, `titletag`, `titledesc`, `titlekey`, `status`) VALUES
(1, 'HOME', '', '1', '', '', 'Active'),
(2, 'ADMINISTRATOR', '', '2', '', '', 'Active'),
(3, 'PUBLIC WORK', '', '6', '', '', 'Active'),
(5, 'DEPARTMENT', '', '4', '', '', 'Active'),
(6, 'SERVICES', '', '5', '', '', 'Active'),
(7, 'GALLARY', '', '', '', '', 'Active'),
(8, 'PROJECTS', '', '7', '', '', 'Active'),
(9, 'CONTACTUS', '', '8', '', '', 'Active'),
(10, 'Tender', '', '3', '', '', 'Active'),
(11, 'OTHERS', '', '', '', '', 'InActive'),
(12, 'Important Announcement', '', '', '', '', 'InActive'),
(13, 'Header Gallary', '', '', '', '', 'InActive');

-- --------------------------------------------------------

--
-- Table structure for table `check_security`
--

CREATE TABLE IF NOT EXISTS `check_security` (
  `id` int(11) NOT NULL,
  `encrypt_value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client_enquiry`
--

CREATE TABLE IF NOT EXISTS `client_enquiry` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `fathername` varchar(100) NOT NULL DEFAULT '',
  `dob` varchar(20) NOT NULL DEFAULT '',
  `sex` varchar(6) NOT NULL DEFAULT '',
  `marital_status` varchar(15) NOT NULL DEFAULT '',
  `res_add1` varchar(100) NOT NULL DEFAULT '',
  `res_add2` varchar(100) NOT NULL DEFAULT '',
  `district` varchar(100) NOT NULL DEFAULT '',
  `landmark` varchar(50) NOT NULL DEFAULT '',
  `city` varchar(100) NOT NULL DEFAULT '',
  `pincode` varchar(20) NOT NULL DEFAULT '',
  `state` varchar(50) NOT NULL DEFAULT '',
  `phoneno` varchar(20) NOT NULL DEFAULT '',
  `mobno` varchar(20) NOT NULL DEFAULT '',
  `emailid1` varchar(60) NOT NULL DEFAULT '',
  `panno` varchar(20) NOT NULL DEFAULT '',
  `nationality` varchar(50) NOT NULL DEFAULT '',
  `identity_proof` varchar(50) NOT NULL DEFAULT '',
  `nom_name` varchar(100) NOT NULL DEFAULT '',
  `nom_dob` varchar(20) NOT NULL DEFAULT '',
  `policyname` varchar(70) NOT NULL DEFAULT '',
  `paymode` varchar(20) NOT NULL DEFAULT '',
  `premium` decimal(5,2) NOT NULL DEFAULT '0.00',
  `unitvalue` decimal(10,0) NOT NULL DEFAULT '0',
  `totamt` decimal(10,0) NOT NULL DEFAULT '0',
  `chequeno` varchar(8) NOT NULL DEFAULT '',
  `chqdate` date NOT NULL DEFAULT '0000-00-00',
  `bankname` varchar(50) NOT NULL DEFAULT '',
  `drawnon` date NOT NULL DEFAULT '0000-00-00',
  `userid` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL DEFAULT '',
  `referenceid` varchar(20) NOT NULL DEFAULT '',
  `DOJ` date NOT NULL DEFAULT '0000-00-00',
  `parentid` int(11) NOT NULL DEFAULT '0',
  `client_level` int(5) NOT NULL DEFAULT '0',
  `memid` int(11) NOT NULL DEFAULT '0',
  `proposarid` int(11) NOT NULL DEFAULT '0',
  `prd_amt` int(5) NOT NULL DEFAULT '0',
  `rel_ins_amt` decimal(5,3) NOT NULL DEFAULT '0.000',
  `lic_ins_amt` int(5) NOT NULL DEFAULT '0',
  `nominee_relation` varchar(30) NOT NULL DEFAULT '',
  `JOINTYPE` varchar(10) NOT NULL DEFAULT '',
  `placement_type` varchar(10) NOT NULL DEFAULT '',
  `branch_id` int(11) NOT NULL DEFAULT '0',
  `branch_user_id` int(11) NOT NULL DEFAULT '0',
  `bnkaccountno` varchar(30) NOT NULL DEFAULT '',
  `binarypaid` int(11) NOT NULL DEFAULT '0',
  `ifsccode` varchar(30) NOT NULL DEFAULT '',
  `branch_bank` varchar(100) NOT NULL DEFAULT '',
  `proof_type` varchar(30) NOT NULL,
  `proof_id` varchar(50) NOT NULL,
  `lock_status` varchar(20) NOT NULL,
  `folio_no` varchar(100) NOT NULL,
  `application_no` varchar(100) NOT NULL,
  `passbook_charge` varchar(20) NOT NULL,
  `maturity_value` varchar(20) NOT NULL,
  `maturity_date` date NOT NULL,
  `maturity_status` varchar(5) NOT NULL,
  `maturity_desc` varchar(250) NOT NULL,
  `maturity_taken` date NOT NULL,
  `maturity_value_taken` int(11) NOT NULL,
  `spotcommstatus` varchar(10) NOT NULL,
  `PREMIUMMODE` varchar(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `totsqft` int(5) NOT NULL,
  `totprice` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `client_enquiry`
--

INSERT INTO `client_enquiry` (`id`, `name`, `fathername`, `dob`, `sex`, `marital_status`, `res_add1`, `res_add2`, `district`, `landmark`, `city`, `pincode`, `state`, `phoneno`, `mobno`, `emailid1`, `panno`, `nationality`, `identity_proof`, `nom_name`, `nom_dob`, `policyname`, `paymode`, `premium`, `unitvalue`, `totamt`, `chequeno`, `chqdate`, `bankname`, `drawnon`, `userid`, `password`, `referenceid`, `DOJ`, `parentid`, `client_level`, `memid`, `proposarid`, `prd_amt`, `rel_ins_amt`, `lic_ins_amt`, `nominee_relation`, `JOINTYPE`, `placement_type`, `branch_id`, `branch_user_id`, `bnkaccountno`, `binarypaid`, `ifsccode`, `branch_bank`, `proof_type`, `proof_id`, `lock_status`, `folio_no`, `application_no`, `passbook_charge`, `maturity_value`, `maturity_date`, `maturity_status`, `maturity_desc`, `maturity_taken`, `maturity_value_taken`, `spotcommstatus`, `PREMIUMMODE`, `price`, `totsqft`, `totprice`) VALUES
(1, 'AMARESH MANNA', '', '', '', '', '77/1 Bangal para 2nd bye lane', 'LANSDOWNE CROSSING', 'KOLKATA', '', '', '700012', '', '', '9804152658', 'swadeshranjan.panda@yahoo.com', '', '', '', '', '', '1', '', '0.00', '0', '0', '', '0000-00-00', '', '0000-00-00', '', '', '', '2013-09-02', 0, 0, 0, 0, 0, '0.000', 0, '', '', '', 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '<p>\r\n	test descrip....</p>\r\n', '0000-00-00', 0, '', '', '0.00', 0, '0.00'),
(2, 'TEST', '', '', '', '', 'GARIA TENTUL BERIA', 'LANSDOWNE CROSSING', 'KOLKATA', '', '', '700012', '', '', '9198747563', 'swadeshranjan.panda@yahoo.com', '', '', '', '', '', '2', '', '0.00', '0', '0', '', '0000-00-00', '', '0000-00-00', '', '', '', '2013-09-03', 0, 0, 0, 0, 0, '0.000', 0, '', '', '', 0, 0, '', 0, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '<p>\r\n	lllllllll</p>\r\n', '0000-00-00', 0, '', '', '0.00', 0, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Area` varchar(200) NOT NULL,
  `Comment` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `Name`, `Mobile`, `Email`, `Area`, `Comment`) VALUES
(1, 'sds sldvsj', '987654312', 'xxx.ss@xx.xx', 'Kol', 'auf odfusd afosd'),
(2, 'Abul Hasnat', '9563191425', 'sarfaraz.hq@gmail.com', 'Ward No. 18', 'Update full Website.'),
(3, 'sumit gon', '9547046095', 'sumitgon@gmail.com', 'nadia', 'moojdur poste lok neya ki hoye geche?\nkobe theke joining korano hobe? inter view r pore ki kono mirrit list tangano hoyeche naki?');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `SubCatId` varchar(10) NOT NULL,
  `details` varchar(50000) NOT NULL,
  `images` varchar(50) NOT NULL,
  `doocument` varchar(200) NOT NULL,
  `order` varchar(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `content_initials` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `SubCatId`, `details`, `images`, `doocument`, `order`, `status`, `content_initials`) VALUES
(1, '40', '<p>Dhuliyan is a very densely populated Municipality Comprising 21 No. of Wards in Jangipur Sub-Division of Murshidabad District. This Municipality was established in the year 1909 with 9 No. of Wards and population of 8,295. Its Distance from Sub-divisional Head quarter at Raghunathganj is 37 K.M. and that from district Head quarter at Berhampur is 94 K.M. Population of the Municipality has reached 95713 (As per Census 2011) whereas geographical Area of the Municipality remains 6.25 Sq K.M. only. Now the Municipality area is spread over Kanchantala, Anupnagar, Lalpur and few more Villages. Near about two third of the population belong to Muslim community and remaining one third belong to Hindu and Jain Community. Percentage of Literacy is 52.53</p>\n', 'contents_image1.jpg', 'contents_doc1.docx', '1', 'Active', 'Chairman''s Speech'),
(2, '41', '<p>Dhuliyan is a very densely populated Municipality Comprising&nbsp; 21 No. of Wards in Jangipur Sub-Division of Murshidabad District. This Municipality was established in the year 1909 with 9 No. of Wards and population of 8,295. Its Distance from Sub-divisional Head quarter at Raghunathganj is 37 K.M. and that from district Head quarter at Berhampur is 94 K.M. Population of the Municipality has reached 95713 (As per Census 2011) whereas geographical Area of the Municipality remains 6.25 Sq K.M. only. Now the Municipality area is spread over Kanchantala, Anupnagar, Lalpur and few more Villages. Near about two third of the population belong to Muslim community and remaining one third belong to Hindu and Jain Community. Percentage of Literacy is 52.53<br />\n<br />\nDhuliyan is located between river Ganges &amp; Hooghly Canal. Soil erosion has shifted the town towards south-west from its earlier position . This town is mentioned as an Inland Water Transport (IWT) Trading point between Murshidabad and the city of Rajsahi in Bangladesh. Thus , this Municipality is surrounded by Farakka in the north, Aurangabad in the south, Jharkhand in the west and Ganges River &amp; Bangladesh country in the east. It is within 56, Samsherganj Assembly Constituency &amp; 8, Malda (South) Parliamentary constituency. Names of present M.L.A. &amp; M.P. are Touab Ali &amp; Abu Hasem Khan Chowdhury respectively.<br />\n<br />\nDhuliyan Ganga is the Nearest railway station from this place. It is well connected with Kolkata City by Malda town Fast Passenger, Malda town Intercity Express, Radhikapur Express, Teesta Torsha Express, Kamrup Express and a few more. Kolkata is at a distance of 282 K.M. from this place &amp; Malda Town is at a distance of 49 K.M. Pakur is another railway station at a distance of 25 K.M. from this place in Jharkhand state from where a number trains are available connecting Kolkata viz. Gour Express, Balurghat Express, Intercity Express (via Rampurhat), Darjeeling Mail, Hate Bazare Express. Buses are also plying from Kolkata to Siliguri touching this place<br />\n<br />\nA good number of people of this Municipality earn their livelihood by making &amp; selling of Biris. A number of Biri Industries are located in this town. Some people are engaged in running business of wholesale &amp; retail sale of articles like cloth, readymade garments, bedding, furniture, hardware goods and utensils made of bell metal, steel and aluminum. Wholesale business of rice, flour, and spice are also running from this place. As such gathering of carrying vehicles can be found on the road of entrance to the town, day &amp; night.<br />\n<br />\nDhuliyan is a quiet town with people having riverside lifestyle. Local people of this place spend a lot of time on the river and by the river side. It is a no-fuss river town where one does not have to be pressurized by the regular tourist hassle but can enjoy here riverside activities like boating &amp; fishing and long river-walks. When in Dhuliyan, one can visit some places near by which are not at Dhuliyan but at a distance of 20 K.M. or a little above viz. Farakka Barrage over Ganges and Nimtita Zamindari Palace &amp; Snake Garden. Coming to Dhuliyan, one Can enjoy ride on a Cart driven by a horse, which is available here throughout the day on the entrance road of the town.<br />\n&nbsp;</p>\n', 'contents_image2.png', '', '2', 'Active', 'Welcome to Dhuliyan Municipality'),
(3, '54', '', '', 'banner_id_3.pdf', '', 'Active', 'Holyday List'),
(5, '50', '<h3>Dhuliyan Municipality</h3>\n\n<p><strong>Phone No. -&nbsp;</strong><strong>03485- 266133</strong><br />\n<strong>Fax No. -&nbsp;</strong><strong>03485 - 265233</strong></p>\n\n<p><strong>Mail ID :&nbsp;</strong><strong>dhuliyanmunicipality@gmail.com</strong></p>\n\n<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; info@dhuliyanmunicipality.in</strong></p>\n', '', '', '1', 'Active', 'Contact Details :-'),
(6, '50', '', 'banner_id_6.jpg', '', '2', 'Active', 'Get in touch with Dhuliyan Municipality'),
(7, '66', '<p>Recruitment of Part Time Medical Officer under NUHM</p>\n', '', 'contents_doc7.pdf', '1', 'Active', 'ANOUNCEMENT'),
(8, '66', '<p>ANOUNCEMENT 2</p>\r\n', '', '', '2', 'Active', 'ANOUNCEMENT 2'),
(9, '55', '', '', 'contents_doc9.php', '', 'Active', '');

-- --------------------------------------------------------

--
-- Table structure for table `depertment`
--

CREATE TABLE IF NOT EXISTS `depertment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `PhoneNumber` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Details` varchar(5000) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `doocument` varchar(500) NOT NULL,
  `RecordStatus` varchar(50) NOT NULL,
  `SortingOrder` varchar(10) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `doj` varchar(20) NOT NULL,
  `desig` varchar(150) NOT NULL,
  `current_working_role` varchar(150) NOT NULL,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `depertment`
--

INSERT INTO `depertment` (`id`, `Name`, `Designation`, `PhoneNumber`, `Email`, `Details`, `Image`, `doocument`, `RecordStatus`, `SortingOrder`, `dob`, `doj`, `desig`, `current_working_role`, `status`) VALUES
(3, 'Abul Hasnat', '76', '9733822439', 'ashokedas@gmail.com', '', '', '', '', '', '', '', 'deig', 'current role', 'Active'),
(7, 'RAJ KUMAR SAHA', '85', '9733333692', '', '<p>LICENSE INSPECTOR</p>\n', 'dept_image7.jpg', '', '', '1', '', '', '', '', 'Active'),
(8, 'MIHIR KUMAR SINGHA', '94', '9563794945', '', '', 'dept_image8.jpg', 'dept_doc8.jpg', '', '', '', '', 'TOWN PROJECT OFFICER(TPO)', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `plus_login`
--

CREATE TABLE IF NOT EXISTS `plus_login` (
  `id` varchar(50) NOT NULL DEFAULT '',
  `userid` varchar(10) NOT NULL DEFAULT '',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tm` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` char(3) NOT NULL DEFAULT 'ON'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plus_login`
--

INSERT INTO `plus_login` (`id`, `userid`, `ip`, `tm`, `status`) VALUES
('085b23f027b2752b913d3afe10e6d438', 'admin', '115.187.52.197', '2012-12-22 07:14:52', 'ON'),
('51ba500b6eaead75a55caf0e8743713b', 'admin', '115.187.61.184', '2012-12-27 05:34:03', 'ON'),
('51ba500b6eaead75a55caf0e8743713b', 'admin', '115.187.61.184', '2012-12-27 05:57:25', 'ON'),
('51ba500b6eaead75a55caf0e8743713b', 'admin', '115.187.61.184', '2012-12-27 06:23:52', 'ON'),
('51ba500b6eaead75a55caf0e8743713b', 'admin', '115.187.61.184', '2012-12-27 06:41:49', 'ON'),
('51ba500b6eaead75a55caf0e8743713b', 'admin', '115.187.61.184', '2012-12-27 06:56:51', 'ON'),
('70d63ba01d20b521a0ad93dd65ce9b93', 'admin', '116.203.187.57', '2012-12-28 00:17:22', 'OFF'),
('e0db182f749148a4283f11291975a251', 'admin', '203.171.244.32', '2012-12-28 03:23:38', 'OFF'),
('e0db182f749148a4283f11291975a251', 'debasish', '203.171.244.32', '2012-12-28 03:36:11', 'OFF'),
('e0db182f749148a4283f11291975a251', 'admin', '203.171.244.32', '2012-12-28 03:37:17', 'OFF'),
('e0db182f749148a4283f11291975a251', 'admin', '203.171.244.32', '2012-12-28 03:40:47', 'OFF'),
('44e7e36640d37fdc49bd1b478e8cc11e', 'debasish', '203.171.244.32', '2012-12-28 04:56:59', 'OFF'),
('44e7e36640d37fdc49bd1b478e8cc11e', 'admin', '203.171.244.32', '2012-12-28 04:59:13', 'OFF'),
('b2d788b637a4a275d6f432b156b7d90a', 'admin', '203.171.244.32', '2012-12-28 21:51:07', 'OFF'),
('4b0d6b339b3971be2433343eefcc7da0', 'admin', '203.171.244.32', '2012-12-29 01:24:13', 'OFF'),
('cca433b61d76bfbeea159970ab1baa6d', 'admin', '203.171.244.32', '2012-12-29 02:01:24', 'OFF'),
('69d8f5aa432ccb38859f8c1754664c7a', 'admin', '203.171.247.153', '2012-12-29 23:26:45', 'OFF'),
('69d8f5aa432ccb38859f8c1754664c7a', 'admin', '203.171.247.153', '2012-12-29 23:28:26', 'ON'),
('5ea631a6854481c11111eeb4aefb5c21', 'admin', '115.187.47.120', '2012-12-31 03:37:42', 'OFF'),
('100f0001f2847d88cbb024c9721ed7e9', 'admin', '203.171.244.222', '2013-01-01 23:37:22', 'ON'),
('100f0001f2847d88cbb024c9721ed7e9', 'admin', '203.171.244.222', '2013-01-02 00:09:07', 'ON'),
('100f0001f2847d88cbb024c9721ed7e9', 'admin', '203.171.244.222', '2013-01-02 00:09:16', 'ON'),
('9a6c38ed32226c89764ea214678550d1', 'admin', '115.187.56.42', '2013-01-02 01:25:42', 'ON'),
('e20f899826802482c3c06eb30652a4da', 'admin', '115.187.56.42', '2013-01-02 01:31:38', 'ON'),
('4ff7e56ab9d5601e3b4280cd17d8a5f8', 'admin', '115.187.56.42', '2013-01-02 01:34:14', 'ON'),
('906e877e70a8a4d231288c68064f2828', 'admin', '115.187.56.42', '2013-01-02 01:36:38', 'ON'),
('5d98f620cb958062988724b12daa4269', 'admin', '115.187.56.42', '2013-01-02 03:09:50', 'OFF'),
('49e9b0432cb1d74aecbef6ecccc0d856', 'admin', '115.187.56.199', '2013-01-02 04:04:03', 'ON'),
('f2942461f702fff708dd52c2638ac3ed', 'admin', '115.187.56.42', '2013-01-02 05:37:09', 'OFF'),
('861e3b174a50200e8180ac0f75919b40', 'admin', '115.187.56.42', '2013-01-02 05:45:20', 'ON'),
('f6f57e99349b8280d323fdbbc5f10de9', 'admin', '115.187.52.241', '2013-01-02 06:53:24', 'ON'),
('a6e0f75d18ebe86e5c3b854fecff7154', 'admin', '115.187.52.241', '2013-01-02 20:43:14', 'ON'),
('1bc08b00642973a7189b7525b687d9dc', 'admin', '115.187.52.241', '2013-01-02 20:48:00', 'ON'),
('022d7da247167b7da66d15e58efb5821', 'admin', '115.187.52.241', '2013-01-02 20:49:38', 'ON'),
('a6e0f75d18ebe86e5c3b854fecff7154', 'admin', '115.187.52.241', '2013-01-02 20:59:50', 'ON'),
('d314009deb47c03ca044f7101ad25ab9', 'admin', '115.187.52.241', '2013-01-02 21:16:39', 'OFF'),
('e87455db8fdb7c796b8b91dc6227506e', 'admin', '203.171.247.92', '2013-01-02 22:35:34', 'ON'),
('f76555383f8e36d7206a3339dc3aac52', 'admin', '203.171.244.148', '2013-01-02 22:37:19', 'OFF'),
('f76555383f8e36d7206a3339dc3aac52', 'admin', '203.171.244.148', '2013-01-02 22:55:19', 'OFF'),
('e87455db8fdb7c796b8b91dc6227506e', 'admin', '203.171.247.92', '2013-01-02 23:11:05', 'ON'),
('f76555383f8e36d7206a3339dc3aac52', 'admin', '203.171.244.148', '2013-01-02 23:13:46', 'OFF'),
('f76555383f8e36d7206a3339dc3aac52', 'admin', '203.171.244.148', '2013-01-02 23:25:58', 'ON'),
('361726eb87340681d3cf3699c4807b07', 'admin', '203.171.247.92', '2013-01-03 03:23:00', 'ON'),
('dcba8c94841498a30da9cce3163290fb', 'admin', '203.171.247.92', '2013-01-03 04:45:22', 'OFF'),
('311923e6feae137fff9771975f2e4598', 'admin', '203.171.247.161', '2013-01-04 00:38:20', 'ON'),
('0bf6576f4d60e2b4dbc281a434385586', 'admin', '115.187.56.41', '2013-01-04 23:35:26', 'ON'),
('8d5352682c3b724052ebc72a882b278a', 'admin', '115.187.56.41', '2013-01-05 02:10:54', 'OFF'),
('8ae9c62f7bd45869e2cac71e5fcdfd3f', 'admin', '203.171.247.87', '2013-01-05 22:19:43', 'OFF'),
('8ae9c62f7bd45869e2cac71e5fcdfd3f', 'admin', '203.171.247.87', '2013-01-05 22:31:58', 'OFF'),
('8ae9c62f7bd45869e2cac71e5fcdfd3f', 'admin', '203.171.247.87', '2013-01-05 22:33:49', 'OFF'),
('8ae9c62f7bd45869e2cac71e5fcdfd3f', 'debasish', '203.171.247.87', '2013-01-05 23:56:46', 'OFF'),
('8ae9c62f7bd45869e2cac71e5fcdfd3f', 'admin', '203.171.247.87', '2013-01-06 00:02:09', 'ON'),
('ce8615277f6b10f4fc3f883e517c6fbb', 'admin', '115.187.52.46', '2013-01-06 22:03:18', 'OFF'),
('94e270b9ca8a959e80561717938af3bf', 'admin', '115.187.52.46', '2013-01-06 22:20:08', 'ON'),
('ce8615277f6b10f4fc3f883e517c6fbb', 'admin', '115.187.52.46', '2013-01-06 22:33:20', 'OFF'),
('ce8615277f6b10f4fc3f883e517c6fbb', 'admin', '115.187.52.46', '2013-01-06 22:54:45', 'ON'),
('768748779bf3f1395beb264ee0ffb06f', 'admin', '115.187.52.46', '2013-01-07 00:11:25', 'OFF'),
('768748779bf3f1395beb264ee0ffb06f', 'admin', '115.187.52.46', '2013-01-07 00:31:33', 'OFF'),
('6b7d3a2b7ac6c42ddbf9b93d574a4487', 'admin', '115.187.52.46', '2013-01-07 00:58:13', 'ON'),
('6b7d3a2b7ac6c42ddbf9b93d574a4487', 'admin', '115.187.52.46', '2013-01-07 01:46:51', 'ON'),
('6b7d3a2b7ac6c42ddbf9b93d574a4487', 'admin', '115.187.52.46', '2013-01-07 02:29:06', 'ON'),
('c6868e818272eadf9aaab2b06e433ca0', 'admin', '115.187.52.103', '2013-01-09 10:00:48', 'ON'),
('6b732b122699161823f1f533b4c41a45', 'admin', '203.171.247.155', '2013-01-09 23:45:31', 'ON'),
('6b732b122699161823f1f533b4c41a45', 'admin', '203.171.247.155', '2013-01-09 23:58:50', 'ON'),
('6b732b122699161823f1f533b4c41a45', 'admin', '203.171.247.155', '2013-01-10 00:26:47', 'ON'),
('6b732b122699161823f1f533b4c41a45', 'admin', '203.171.247.155', '2013-01-10 01:03:44', 'ON'),
('6b732b122699161823f1f533b4c41a45', 'admin', '203.171.247.155', '2013-01-10 01:43:59', 'ON'),
('6b732b122699161823f1f533b4c41a45', 'admin', '203.171.247.155', '2013-01-10 02:29:45', 'ON'),
('bae892210b96163d5a33765e3c0a27d1', 'admin', '14.99.74.173', '2013-01-12 06:18:51', 'OFF'),
('bae892210b96163d5a33765e3c0a27d1', 'MALDA', '14.99.74.173', '2013-01-12 06:32:49', 'OFF'),
('bae892210b96163d5a33765e3c0a27d1', 'admin', '14.99.74.173', '2013-01-12 06:34:27', 'OFF'),
('bae892210b96163d5a33765e3c0a27d1', 'admin', '14.99.74.173', '2013-01-12 06:53:35', 'OFF'),
('bae892210b96163d5a33765e3c0a27d1', 'admin', '14.99.74.173', '2013-01-12 07:00:16', 'OFF'),
('bae892210b96163d5a33765e3c0a27d1', 'admin', '14.99.74.173', '2013-01-12 07:01:17', 'ON'),
('f20de503fa967329cff96219bb4838be', 'admin', '115.187.63.22', '2013-01-13 01:39:05', 'OFF'),
('f20de503fa967329cff96219bb4838be', 'admin', '115.187.63.22', '2013-01-13 01:54:01', 'OFF'),
('f20de503fa967329cff96219bb4838be', 'admin', '115.187.63.22', '2013-01-13 02:04:44', 'ON'),
('b1255478f0237e0bded23c0cac70630a', 'admin', '115.187.63.22', '2013-01-13 07:27:35', 'OFF'),
('b1255478f0237e0bded23c0cac70630a', 'admin', '115.187.63.22', '2013-01-13 07:52:34', 'OFF'),
('b1255478f0237e0bded23c0cac70630a', 'admin', '115.187.63.22', '2013-01-13 07:56:33', 'OFF'),
('b1255478f0237e0bded23c0cac70630a', 'admin', '115.187.63.22', '2013-01-13 08:03:12', 'ON'),
('b1255478f0237e0bded23c0cac70630a', 'admin', '115.187.63.22', '2013-01-13 08:28:31', 'ON'),
('b1255478f0237e0bded23c0cac70630a', 'admin', '115.187.63.22', '2013-01-13 08:57:44', 'ON'),
('b1255478f0237e0bded23c0cac70630a', 'admin', '115.187.63.22', '2013-01-13 09:04:36', 'ON'),
('b1255478f0237e0bded23c0cac70630a', 'admin', '115.187.63.22', '2013-01-13 09:17:22', 'ON'),
('b1255478f0237e0bded23c0cac70630a', 'admin', '115.187.63.22', '2013-01-13 09:21:01', 'ON'),
('b1255478f0237e0bded23c0cac70630a', 'admin', '115.187.63.22', '2013-01-13 09:23:37', 'ON'),
('b1255478f0237e0bded23c0cac70630a', 'admin', '115.187.63.22', '2013-01-13 09:26:38', 'ON'),
('b1255478f0237e0bded23c0cac70630a', 'admin', '115.187.63.22', '2013-01-13 09:31:16', 'ON'),
('b1255478f0237e0bded23c0cac70630a', 'admin', '115.187.63.22', '2013-01-13 09:33:17', 'ON'),
('b1255478f0237e0bded23c0cac70630a', 'admin', '115.187.63.22', '2013-01-13 09:35:12', 'ON'),
('b1255478f0237e0bded23c0cac70630a', 'admin', '115.187.63.22', '2013-01-13 09:35:15', 'ON'),
('b1255478f0237e0bded23c0cac70630a', 'admin', '115.187.63.22', '2013-01-13 09:38:31', 'ON'),
('b1255478f0237e0bded23c0cac70630a', 'admin', '115.187.63.22', '2013-01-13 09:45:28', 'ON'),
('bfb4211e19468dfd659a686ab55fcf00', 'admin', '115.187.63.22', '2013-01-13 09:46:27', 'ON'),
('bfb4211e19468dfd659a686ab55fcf00', 'admin', '115.187.63.22', '2013-01-13 09:50:04', 'ON'),
('bfb4211e19468dfd659a686ab55fcf00', 'admin', '115.187.63.22', '2013-01-13 09:52:19', 'ON'),
('bfb4211e19468dfd659a686ab55fcf00', 'admin', '115.187.63.22', '2013-01-13 09:54:47', 'ON'),
('bfb4211e19468dfd659a686ab55fcf00', 'admin', '115.187.63.22', '2013-01-13 09:56:02', 'ON'),
('bfb4211e19468dfd659a686ab55fcf00', 'admin', '115.187.63.22', '2013-01-13 09:57:25', 'ON'),
('a9ee34b8cc26fa53aaf9b6ecad917e2f', 'admin', '115.187.63.22', '2013-01-13 09:58:52', 'ON'),
('cc303767bd0ebd4655767e1df0de47ee', 'admin', '115.187.56.38', '2013-01-14 02:02:52', 'ON'),
('cc303767bd0ebd4655767e1df0de47ee', 'admin', '115.187.56.38', '2013-01-14 02:04:25', 'ON'),
('cc303767bd0ebd4655767e1df0de47ee', 'admin', '115.187.56.38', '2013-01-14 02:06:43', 'ON'),
('cc303767bd0ebd4655767e1df0de47ee', 'admin', '115.187.56.38', '2013-01-14 02:07:03', 'ON'),
('a99dab64cbbdd423077495e1f1620845', 'admin', '14.96.8.103', '2013-01-15 03:13:55', 'OFF'),
('50ac8732be24da369c09c7e47dadf088', 'admin', '14.99.223.157', '2013-01-15 06:21:36', 'ON'),
('d544534a71b70c2a87391308de2fba87', 'admin', '14.99.223.157', '2013-01-15 06:23:24', 'OFF'),
('d544534a71b70c2a87391308de2fba87', 'admin', '14.99.223.157', '2013-01-15 06:50:03', 'OFF'),
('d544534a71b70c2a87391308de2fba87', 'admin', '14.99.223.157', '2013-01-15 06:50:57', 'OFF'),
('d4d83ce359495482f83f1f914a2c5084', 'admin', '203.171.244.36', '2013-01-15 06:56:23', 'OFF'),
('842e65fa85677713b03f0fa76715a004', 'admin', '14.99.223.157', '2013-01-15 07:01:57', 'OFF'),
('d4d83ce359495482f83f1f914a2c5084', 'admin', '203.171.244.36', '2013-01-15 07:22:05', 'ON'),
('392e3a3e76d6047cba2018c62cc57038', 'admin', '14.99.223.157', '2013-01-15 08:05:26', 'OFF'),
('392e3a3e76d6047cba2018c62cc57038', 'admin', '14.99.223.157', '2013-01-15 08:09:53', 'OFF'),
('8f8addf9e392f3892ba4132e9c8ca216', 'admin', '14.96.26.214', '2013-01-16 04:23:05', 'ON'),
('8f8addf9e392f3892ba4132e9c8ca216', 'dumdum', '14.96.26.214', '2013-01-16 04:34:43', 'ON'),
('8f8addf9e392f3892ba4132e9c8ca216', 'dumdum', '14.96.26.214', '2013-01-16 04:36:33', 'ON'),
('8f8addf9e392f3892ba4132e9c8ca216', 'admin', '14.96.26.214', '2013-01-16 04:37:34', 'ON'),
('8f8addf9e392f3892ba4132e9c8ca216', 'riya', '14.96.26.214', '2013-01-16 04:43:03', 'ON'),
('8f8addf9e392f3892ba4132e9c8ca216', 'admin', '14.96.26.214', '2013-01-16 04:44:55', 'ON'),
('06ffd92030d4dc8941760140f165e3ff', 'admin', '14.96.26.214', '2013-01-16 06:12:22', 'ON'),
('c39907b59b22a8b449186321f181c43e', 'admin', '14.96.26.214', '2013-01-16 07:09:10', 'ON'),
('97ff297cc14c1a414db53940c0617630', 'admin', '115.187.52.14', '2013-01-16 08:06:10', 'OFF'),
('97ff297cc14c1a414db53940c0617630', 'riya', '115.187.52.14', '2013-01-16 08:07:09', 'OFF'),
('97ff297cc14c1a414db53940c0617630', 'admin', '115.187.52.14', '2013-01-16 08:15:26', 'ON'),
('477f0dc13e7a01c4be072f59d017cc8b', 'admin', '14.99.80.6', '2013-01-18 03:45:54', 'OFF'),
('477f0dc13e7a01c4be072f59d017cc8b', 'riya', '14.99.80.6', '2013-01-18 03:46:46', 'OFF'),
('477f0dc13e7a01c4be072f59d017cc8b', 'admin', '14.99.80.6', '2013-01-18 03:49:20', 'OFF'),
('477f0dc13e7a01c4be072f59d017cc8b', 'admin', '14.99.80.6', '2013-01-18 04:35:39', 'ON'),
('91679d98ce08d6684cac8f649368b144', 'admin', '14.99.80.6', '2013-01-18 04:55:22', 'OFF'),
('03fc507574b36a3a13c24a76d37da194', 'admin', '14.99.80.6', '2013-01-18 05:39:10', 'OFF'),
('9ea7f89b8c979e74079019a486429f35', 'admin', '115.187.52.186', '2013-01-18 08:34:08', 'ON'),
('301ba6fbd0fb3717c8bbebc80e298ddf', 'admin', '14.96.3.34', '2013-01-19 03:37:24', 'OFF'),
('f302d490bc97410d257ba4f1352543e7', 'admin', '14.96.3.34', '2013-01-19 04:42:00', 'ON'),
('f302d490bc97410d257ba4f1352543e7', 'admin', '14.96.3.34', '2013-01-19 05:06:17', 'ON'),
('f302d490bc97410d257ba4f1352543e7', 'admin', '14.96.3.34', '2013-01-19 05:24:21', 'ON'),
('6cad442bcc9cc3b5d5a3f46d2f689fb9', 'admin', '14.99.157.61', '2013-01-19 06:10:39', 'OFF'),
('6cad442bcc9cc3b5d5a3f46d2f689fb9', 'admin', '14.99.157.61', '2013-01-19 07:35:39', 'OFF'),
('6cad442bcc9cc3b5d5a3f46d2f689fb9', 'admin', '14.99.157.61', '2013-01-19 08:18:34', 'OFF'),
('560ea8762561b360e33fb0709f72a2ee', 'admin', '14.96.91.214', '2013-01-20 04:44:29', 'OFF'),
('560ea8762561b360e33fb0709f72a2ee', 'admin', '14.96.91.214', '2013-01-20 04:57:21', 'OFF'),
('560ea8762561b360e33fb0709f72a2ee', 'admin', '14.96.91.214', '2013-01-20 05:12:11', 'OFF'),
('560ea8762561b360e33fb0709f72a2ee', 'admin', '14.96.91.214', '2013-01-20 05:12:26', 'OFF'),
('560ea8762561b360e33fb0709f72a2ee', 'admin', '14.96.91.214', '2013-01-20 05:52:33', 'ON'),
('75a6aaee682d00275cf4b916a2781378', 'admin', '14.96.91.214', '2013-01-20 06:24:22', 'ON'),
('75a6aaee682d00275cf4b916a2781378', 'admin', '14.96.91.214', '2013-01-20 07:26:34', 'ON'),
('fc0f777c18325f0ff14ab01f843f70e0', 'admin', '14.96.91.214', '2013-01-20 07:52:20', 'OFF'),
('78c05eb5f7e5df80d5edde1d3bb1d5b6', 'riya', '14.96.46.3', '2013-01-21 03:03:17', 'OFF'),
('78c05eb5f7e5df80d5edde1d3bb1d5b6', 'admin', '14.96.46.3', '2013-01-21 03:04:23', 'OFF'),
('ef90ddd79314bca9935a8f1eb9bc0055', 'admin', '202.78.237.205', '2013-01-21 03:43:59', 'ON'),
('78c05eb5f7e5df80d5edde1d3bb1d5b6', 'admin', '14.96.46.3', '2013-01-21 03:49:51', 'OFF'),
('78c05eb5f7e5df80d5edde1d3bb1d5b6', 'admin', '14.99.19.135', '2013-01-21 05:08:55', 'OFF'),
('78c05eb5f7e5df80d5edde1d3bb1d5b6', 'riya', '14.99.19.135', '2013-01-21 06:03:16', 'OFF'),
('78c05eb5f7e5df80d5edde1d3bb1d5b6', 'admin', '14.99.19.135', '2013-01-21 06:05:04', 'ON'),
('e7c7c0fac98fbdfd087ceb353be6e76b', 'admin', '14.96.117.142', '2013-01-21 07:47:13', 'ON'),
('e7c7c0fac98fbdfd087ceb353be6e76b', 'admin', '14.96.117.142', '2013-01-21 08:34:36', 'ON'),
('f202e7500a233fbfda3953437a7fb230', 'admin', '14.96.142.154', '2013-01-21 09:19:24', 'ON'),
('f202e7500a233fbfda3953437a7fb230', 'admin', '14.96.142.154', '2013-01-21 09:32:12', 'ON'),
('d64e385a2d91658819d8110bdc76f4d1', 'admin', '14.96.142.154', '2013-01-21 09:39:36', 'ON'),
('7287e40557082c5fed876a0ecb725915', 'admin', '14.96.142.154', '2013-01-21 09:45:44', 'ON'),
('80bf48890b4bb7aaf2b0944e706cb7e0', 'admin', '203.171.247.101', '2013-01-22 00:49:35', 'ON'),
('770c8a96fe20748a78f9da5e5d329243', 'admin', '14.99.11.33', '2013-01-22 01:09:04', 'OFF'),
('80bf48890b4bb7aaf2b0944e706cb7e0', 'admin', '203.171.247.101', '2013-01-22 01:22:35', 'ON'),
('80bf48890b4bb7aaf2b0944e706cb7e0', 'admin', '203.171.247.101', '2013-01-22 01:45:45', 'ON'),
('00c10b26c216f0765f888b65d9222e78', 'admin', '14.99.11.33', '2013-01-22 02:10:04', 'OFF'),
('00c10b26c216f0765f888b65d9222e78', 'admin', '14.99.11.33', '2013-01-22 02:23:53', 'OFF'),
('80bf48890b4bb7aaf2b0944e706cb7e0', 'admin', '203.171.247.101', '2013-01-22 02:29:13', 'ON'),
('a92f1387420a9f4f0b9517cc808b0e0f', 'admin', '14.99.11.33', '2013-01-22 02:34:41', 'ON'),
('80bf48890b4bb7aaf2b0944e706cb7e0', 'admin', '203.171.247.101', '2013-01-22 02:48:35', 'ON'),
('9c765856e0643624635fee5a400f7955', 'admin', '14.99.11.33', '2013-01-22 03:21:59', 'ON'),
('9c765856e0643624635fee5a400f7955', 'admin', '14.99.11.33', '2013-01-22 04:30:06', 'ON'),
('9c765856e0643624635fee5a400f7955', 'admin', '14.99.11.33', '2013-01-22 05:15:31', 'ON'),
('9c765856e0643624635fee5a400f7955', 'admin', '14.99.11.33', '2013-01-22 05:37:39', 'ON'),
('827acad2f1218743d1a0fcaca62570e7', 'admin', '14.99.11.33', '2013-01-22 06:19:08', 'OFF'),
('9320a9c89d943018c1a900b0b2ae5578', 'admin', '14.96.34.186', '2013-01-23 02:13:57', 'OFF'),
('a17f41411351e68a8d050b5aba250d68', 'admin', '203.171.247.101', '2013-01-23 02:33:08', 'ON'),
('a17f41411351e68a8d050b5aba250d68', 'admin', '203.171.247.101', '2013-01-23 02:46:01', 'ON'),
('9320a9c89d943018c1a900b0b2ae5578', 'admin', '14.96.34.186', '2013-01-23 03:50:52', 'OFF'),
('18004c7143944645d54f27e8eacd390c', 'admin', '223.180.147.57', '2013-01-23 04:03:34', 'OFF'),
('9320a9c89d943018c1a900b0b2ae5578', 'admin', '14.96.34.186', '2013-01-23 04:43:36', 'OFF'),
('9320a9c89d943018c1a900b0b2ae5578', 'admin', '14.96.34.186', '2013-01-23 05:08:01', 'OFF'),
('9320a9c89d943018c1a900b0b2ae5578', 'riya', '14.96.34.186', '2013-01-23 06:09:12', 'OFF'),
('9320a9c89d943018c1a900b0b2ae5578', 'admin', '14.96.34.186', '2013-01-23 06:13:03', 'ON'),
('9320a9c89d943018c1a900b0b2ae5578', 'admin', '14.96.34.186', '2013-01-23 07:14:24', 'ON'),
('9320a9c89d943018c1a900b0b2ae5578', 'admin', '14.96.34.186', '2013-01-23 07:19:27', 'ON'),
('6c4f5c9d0527bb16e1551611eb6418bc', 'admin', '14.99.62.76', '2013-01-23 07:34:08', 'ON'),
('281a084d21f7daa1e02b347f6166d366', 'admin', '14.99.1.33', '2013-01-24 03:16:09', 'OFF'),
('4ec1889f6c48e577d72d9bf8cb1a74d4', 'admin', '223.176.172.112', '2013-01-24 04:25:50', 'ON'),
('689233592b9188eb17cc2568348f2c35', 'admin', '110.227.148.153', '2013-01-24 04:43:25', 'ON'),
('689233592b9188eb17cc2568348f2c35', 'admin', '223.176.170.89', '2013-01-24 05:02:10', 'ON'),
('689233592b9188eb17cc2568348f2c35', 'admin', '223.176.170.89', '2013-01-24 05:23:26', 'ON'),
('281a084d21f7daa1e02b347f6166d366', 'admin', '14.99.61.234', '2013-01-24 05:49:38', 'OFF'),
('281a084d21f7daa1e02b347f6166d366', 'admin', '14.99.61.234', '2013-01-24 05:50:13', 'OFF'),
('689233592b9188eb17cc2568348f2c35', 'admin', '110.227.146.207', '2013-01-24 06:31:19', 'ON'),
('1711e3344e29d369d747e91b629f2822', 'admin', '115.187.61.3', '2013-01-24 07:01:26', 'ON'),
('281a084d21f7daa1e02b347f6166d366', 'admin', '14.99.61.234', '2013-01-24 08:09:04', 'OFF'),
('c19117cde5ebe4090f7df2b84bc298a7', 'admin', '14.99.226.250', '2013-01-25 05:29:59', 'ON'),
('dd26a4a54569fe7ba0a52105c2f5f279', 'admin', '14.96.114.125', '2013-01-27 03:20:42', 'ON'),
('dd26a4a54569fe7ba0a52105c2f5f279', 'admin', '14.96.114.125', '2013-01-27 04:57:31', 'ON'),
('dd26a4a54569fe7ba0a52105c2f5f279', 'admin', '14.96.114.125', '2013-01-27 05:15:52', 'ON'),
('dd26a4a54569fe7ba0a52105c2f5f279', 'admin', '14.96.114.125', '2013-01-27 05:44:45', 'ON'),
('55f64a6a4e3733791354501c172b2b60', 'admin', '14.96.114.125', '2013-01-27 05:48:04', 'ON'),
('55f64a6a4e3733791354501c172b2b60', 'admin', '14.96.114.125', '2013-01-27 06:34:17', 'ON'),
('00589a896499ce48f9bf2086204f769d', 'admin', '14.96.114.125', '2013-01-27 06:35:12', 'OFF'),
('fb24fcc8add59678ac24c882c3aacad7', 'admin', '14.99.175.223', '2013-01-28 04:07:25', 'ON'),
('fb24fcc8add59678ac24c882c3aacad7', 'admin', '14.99.175.223', '2013-01-28 04:40:20', 'ON'),
('d332d78ea33323df9c4e02effb8a8f35', 'admin', '59.161.179.195', '2013-01-28 07:30:14', 'ON'),
('d332d78ea33323df9c4e02effb8a8f35', 'admin', '59.161.179.195', '2013-01-28 08:37:29', 'ON'),
('cb768d92f6fcdc3be3d8dd66d2714866', 'admin', '14.99.163.122', '2013-01-28 09:05:19', 'OFF'),
('8fa61cc5e4dde9bf00c39448c29e0e97', 'admin', '14.99.48.184', '2013-01-29 03:42:38', 'ON'),
('b0deaf173cffbd81ed1ab16258b73d64', 'admin', '14.99.48.184', '2013-01-29 05:09:21', 'OFF'),
('b0deaf173cffbd81ed1ab16258b73d64', 'admin', '14.99.48.184', '2013-01-29 06:33:12', 'OFF'),
('b0deaf173cffbd81ed1ab16258b73d64', 'admin', '14.96.111.153', '2013-01-29 07:52:48', 'OFF'),
('b0deaf173cffbd81ed1ab16258b73d64', 'admin', '14.96.111.153', '2013-01-29 07:53:07', 'OFF'),
('b0deaf173cffbd81ed1ab16258b73d64', 'admin', '14.96.111.153', '2013-01-29 08:23:22', 'OFF'),
('b0deaf173cffbd81ed1ab16258b73d64', 'admin', '14.96.111.153', '2013-01-29 08:46:23', 'OFF'),
('7e20a99df29650a1d91412f33c05c851', 'admin', '14.96.93.167', '2013-01-30 04:20:03', 'ON'),
('7e20a99df29650a1d91412f33c05c851', 'admin', '14.96.93.167', '2013-01-30 05:11:54', 'ON'),
('7e20a99df29650a1d91412f33c05c851', 'admin', '14.96.93.167', '2013-01-30 05:51:00', 'ON'),
('7e20a99df29650a1d91412f33c05c851', 'admin', '14.96.93.167', '2013-01-30 06:33:08', 'ON'),
('7e20a99df29650a1d91412f33c05c851', 'admin', '14.96.93.167', '2013-01-30 07:13:46', 'ON'),
('7e20a99df29650a1d91412f33c05c851', 'admin', '14.96.93.167', '2013-01-30 07:52:33', 'ON'),
('42cb0dc4a6b7e20bfa68c15b2492ca96', 'admin', '14.96.93.167', '2013-01-30 09:54:07', 'ON'),
('293e042025eea97c9972c7717c5b3deb', 'admin', '14.96.31.183', '2013-01-31 06:13:08', 'ON'),
('293e042025eea97c9972c7717c5b3deb', 'admin', '14.96.31.183', '2013-01-31 06:41:42', 'ON'),
('293e042025eea97c9972c7717c5b3deb', 'admin', '59.161.178.190', '2013-01-31 07:13:58', 'ON'),
('afc67b85b6d77510558c47708c0df239', 'admin', '14.99.53.55', '2013-02-01 05:23:28', 'ON'),
('afc67b85b6d77510558c47708c0df239', 'admin', '14.99.53.55', '2013-02-01 06:22:24', 'ON'),
('b60ae494793702e1d1bb9c5e4acaf4cb', 'admin', '14.96.25.110', '2013-02-01 07:37:09', 'ON'),
('b60ae494793702e1d1bb9c5e4acaf4cb', 'admin', '14.96.25.110', '2013-02-01 07:50:34', 'ON'),
('b60ae494793702e1d1bb9c5e4acaf4cb', 'admin', '14.96.25.110', '2013-02-01 08:23:39', 'ON'),
('b60ae494793702e1d1bb9c5e4acaf4cb', 'admin', '14.96.27.223', '2013-02-01 08:55:14', 'ON'),
('b60ae494793702e1d1bb9c5e4acaf4cb', 'admin', '14.96.27.223', '2013-02-01 09:35:01', 'ON'),
('f7b6506b786344379c0390e60e365d29', 'admin', '14.99.110.234', '2013-02-02 04:06:05', 'ON'),
('f7b6506b786344379c0390e60e365d29', 'admin', '14.99.49.35', '2013-02-02 04:50:38', 'ON'),
('ea33d585b3789414674fcd2ed861e151', 'admin', '14.99.148.143', '2013-02-03 04:44:57', 'ON'),
('ea33d585b3789414674fcd2ed861e151', 'admin', '14.99.148.143', '2013-02-03 04:56:51', 'ON'),
('f7f0ab6ef044fa3f517dce3e8033307a', 'admin', '14.99.148.143', '2013-02-03 06:15:20', 'ON'),
('f7f0ab6ef044fa3f517dce3e8033307a', 'admin', '14.96.50.17', '2013-02-03 08:28:09', 'ON'),
('c1052a8f8a85ea822c8ebe23e0bf6782', 'admin', '14.96.56.124', '2013-02-04 03:57:14', 'OFF'),
('c1052a8f8a85ea822c8ebe23e0bf6782', 'admin', '14.96.56.124', '2013-02-04 04:14:45', 'OFF'),
('c1052a8f8a85ea822c8ebe23e0bf6782', 'admin', '14.96.56.124', '2013-02-04 04:56:43', 'OFF'),
('c1052a8f8a85ea822c8ebe23e0bf6782', 'admin', '14.96.56.124', '2013-02-04 04:56:59', 'OFF'),
('c1052a8f8a85ea822c8ebe23e0bf6782', 'admin', '14.96.56.124', '2013-02-04 05:15:14', 'OFF'),
('c1052a8f8a85ea822c8ebe23e0bf6782', 'admin', '14.99.203.255', '2013-02-04 06:09:40', 'OFF'),
('c1052a8f8a85ea822c8ebe23e0bf6782', 'admin', '14.96.103.225', '2013-02-04 06:51:40', 'ON'),
('c1052a8f8a85ea822c8ebe23e0bf6782', 'admin', '14.96.103.225', '2013-02-04 07:41:37', 'ON'),
('48dfd30bd546ed544327253f19acf2f4', 'admin', '14.99.226.27', '2013-02-05 06:39:50', 'OFF'),
('861bf187401937a71869b19097696711', 'admin', '14.96.102.240', '2013-02-06 03:33:03', 'ON'),
('7b849d22d77489610f16c6b00cf151e3', 'admin', '14.99.84.129', '2013-02-06 05:34:08', 'ON'),
('ed56c2b47fd38610397c93daa9328a21', 'admin', '14.99.108.185', '2013-02-06 06:33:19', 'ON'),
('e3d84c9bed3c7668f14e9755ce22c66d', 'admin', '14.96.22.30', '2013-02-06 07:19:51', 'OFF'),
('1934607e27e3bf0a3f1235e34792da75', 'admin', '14.99.114.183', '2013-02-07 03:33:48', 'ON'),
('5e1cdf605b4de168f40106b36faa4507', 'admin', '14.99.114.183', '2013-02-07 03:50:03', 'ON'),
('41c0c94d43495e044df26871c173245a', 'admin', '14.99.114.183', '2013-02-07 04:02:52', 'ON'),
('8214ba6f69f9e12ee68c7d12c79bd6f1', 'admin', '14.99.114.183', '2013-02-07 04:19:57', 'ON'),
('7ee9e3542782be64391959f55e5d73d9', 'admin', '59.161.188.171', '2013-02-07 05:47:56', 'ON'),
('7ee9e3542782be64391959f55e5d73d9', 'admin', '59.161.188.171', '2013-02-07 05:55:50', 'ON'),
('7ee9e3542782be64391959f55e5d73d9', 'admin', '59.161.188.171', '2013-02-07 06:10:28', 'ON'),
('7ee9e3542782be64391959f55e5d73d9', 'admin', '59.161.188.171', '2013-02-07 06:13:54', 'ON'),
('7ee9e3542782be64391959f55e5d73d9', 'admin', '59.161.188.171', '2013-02-07 06:46:39', 'ON'),
('7ee9e3542782be64391959f55e5d73d9', 'admin', '14.99.53.33', '2013-02-07 07:12:48', 'ON'),
('7ee9e3542782be64391959f55e5d73d9', 'admin', '14.99.53.33', '2013-02-07 07:13:22', 'ON'),
('dc6c37a2f0bc3f65611dba7c36c2da11', 'admin', '110.227.90.108', '2013-02-07 07:18:36', 'ON'),
('40a5dffd61af2a7e80c9dd0ae28c05fc', 'admin', '110.227.90.162', '2013-02-07 07:37:49', 'ON'),
('0c2e0e35fdb5f63cdf630ce8348efb13', 'admin', '223.176.231.107', '2013-02-07 07:48:24', 'ON'),
('7ee9e3542782be64391959f55e5d73d9', 'admin', '14.99.78.216', '2013-02-07 07:56:46', 'ON'),
('7ee9e3542782be64391959f55e5d73d9', 'admin', '14.99.78.216', '2013-02-07 08:26:47', 'ON'),
('45055f16c9e9cbf7921dd371a01590c5', 'admin', '14.99.78.216', '2013-02-07 08:56:32', 'ON'),
('2dcb42fdbfdb46ccd08bb41e182f6336', 'admin', '223.176.231.107', '2013-02-07 08:58:28', 'ON'),
('0b34000607e361124498dbf2fedf042c', 'admin', '14.99.78.216', '2013-02-07 09:15:56', 'ON'),
('2dcb42fdbfdb46ccd08bb41e182f6336', 'admin', '223.176.224.211', '2013-02-07 09:21:08', 'ON'),
('7c24d8dbcddcdd38dedd4fa96d177e69', 'admin', '117.99.186.168', '2013-02-07 09:58:28', 'OFF'),
('7c24d8dbcddcdd38dedd4fa96d177e69', 'admin', '106.196.104.53', '2013-02-07 10:24:07', 'OFF'),
('7c24d8dbcddcdd38dedd4fa96d177e69', 'admin', '106.196.104.53', '2013-02-07 10:41:52', 'OFF'),
('56b67aec1b06e271c433c05fe44af799', 'admin', '14.99.57.164', '2013-02-08 00:36:36', 'ON'),
('b0e75724f4477a85fee629c6bb537967', 'admin', '14.99.57.164', '2013-02-08 00:49:24', 'OFF'),
('b0e75724f4477a85fee629c6bb537967', 'admin', '14.99.57.164', '2013-02-08 01:26:07', 'ON'),
('b7a67166085915c22e448a00448d0efe', 'admin', '14.99.57.164', '2013-02-08 01:51:16', 'ON'),
('899e5835092262547948671d0dc81955', 'admin', '14.99.57.164', '2013-02-08 02:19:35', 'ON'),
('2cf11fe8dce3e1f9dfb1350184cd1c51', 'admin', '14.99.230.50', '2013-02-08 03:03:13', 'ON'),
('2cf11fe8dce3e1f9dfb1350184cd1c51', 'admin', '14.99.230.50', '2013-02-08 04:09:52', 'ON'),
('41f7f963e4c06525cd87154428cd660b', 'admin', '14.99.230.50', '2013-02-08 04:18:01', 'ON'),
('64e884fcf818425e2d0b6e594cd581f8', 'admin', '14.99.120.159', '2013-02-08 04:44:12', 'ON'),
('908d05ee2b98eb4d69bab673ad50b344', 'admin', '14.99.17.63', '2013-02-08 05:11:26', 'ON'),
('908d05ee2b98eb4d69bab673ad50b344', 'admin', '14.99.17.63', '2013-02-08 05:32:45', 'ON'),
('908d05ee2b98eb4d69bab673ad50b344', 'admin', '14.99.17.63', '2013-02-08 05:33:21', 'ON'),
('908d05ee2b98eb4d69bab673ad50b344', 'admin', '14.99.17.63', '2013-02-08 05:53:56', 'ON'),
('908d05ee2b98eb4d69bab673ad50b344', 'admin', '14.99.17.63', '2013-02-08 05:56:48', 'ON'),
('908d05ee2b98eb4d69bab673ad50b344', 'admin', '14.99.17.63', '2013-02-08 06:39:22', 'ON'),
('908d05ee2b98eb4d69bab673ad50b344', 'admin', '14.99.17.63', '2013-02-08 06:53:42', 'ON'),
('9c06948a288666c2aacfe934369e75df', 'admin', '115.187.34.35', '2013-02-08 07:40:26', 'ON'),
('908d05ee2b98eb4d69bab673ad50b344', 'admin', '14.99.74.70', '2013-02-08 08:02:13', 'ON'),
('908d05ee2b98eb4d69bab673ad50b344', 'admin', '14.99.52.141', '2013-02-08 08:37:20', 'ON'),
('908d05ee2b98eb4d69bab673ad50b344', 'admin', '14.99.52.141', '2013-02-08 08:47:24', 'ON'),
('94a10e8ee3b4fb1e8820ca893c108b3c', 'admin', '14.96.6.171', '2013-02-09 06:43:29', 'ON'),
('94a10e8ee3b4fb1e8820ca893c108b3c', 'admin', '14.99.241.192', '2013-02-09 08:12:10', 'ON'),
('94a10e8ee3b4fb1e8820ca893c108b3c', 'admin', '14.99.241.192', '2013-02-09 08:49:00', 'ON'),
('94a10e8ee3b4fb1e8820ca893c108b3c', 'admin', '14.99.241.192', '2013-02-09 09:19:15', 'ON'),
('74ac170957ba09a010417abfc4c31ff8', 'admin', '14.99.185.224', '2013-02-10 00:53:39', 'OFF'),
('0bdf8534e7f5c059884fbc4d850a539e', 'admin', '14.96.94.191', '2013-02-10 06:31:14', 'ON'),
('0bdf8534e7f5c059884fbc4d850a539e', 'admin', '14.96.94.191', '2013-02-10 07:45:01', 'ON'),
('0bdf8534e7f5c059884fbc4d850a539e', 'admin', '14.96.47.98', '2013-02-10 08:47:48', 'ON'),
('0bdf8534e7f5c059884fbc4d850a539e', 'admin', '14.96.47.98', '2013-02-10 08:48:39', 'ON'),
('0bdf8534e7f5c059884fbc4d850a539e', 'admin', '14.96.47.98', '2013-02-10 09:06:52', 'ON'),
('0bdf8534e7f5c059884fbc4d850a539e', 'admin', '14.96.47.98', '2013-02-10 09:18:47', 'ON'),
('7bf7c323f941248a67b81ff7019a83b6', 'admin', '14.99.28.89', '2013-02-11 04:43:39', 'OFF'),
('7bf7c323f941248a67b81ff7019a83b6', 'admin', '14.99.124.224', '2013-02-11 05:00:35', 'OFF'),
('7bf7c323f941248a67b81ff7019a83b6', 'admin', '14.99.124.224', '2013-02-11 05:00:53', 'OFF'),
('7bf7c323f941248a67b81ff7019a83b6', 'admin', '14.99.124.224', '2013-02-11 06:37:24', 'OFF'),
('7bf7c323f941248a67b81ff7019a83b6', 'admin', '14.99.124.224', '2013-02-11 07:13:57', 'OFF'),
('7bf7c323f941248a67b81ff7019a83b6', 'admin', '14.99.124.224', '2013-02-11 07:52:47', 'OFF'),
('2e12cc66cc85a42c3ad8ab98d2058547', 'admin', '14.99.226.173', '2013-02-12 04:12:06', 'ON'),
('3cf98d71652d5f29aed32078a0db4c41', 'admin', '14.99.226.173', '2013-02-12 06:17:27', 'OFF'),
('4e76f27a13cdbd07c526000786d1ecc2', 'admin', '122.176.64.113', '2013-02-12 23:50:27', 'OFF'),
('92e528f7833e44d465256863cc57d441', 'admin', '14.99.222.127', '2013-02-13 04:48:44', 'OFF'),
('92e528f7833e44d465256863cc57d441', 'admin', '14.99.222.127', '2013-02-13 04:50:15', 'OFF'),
('92e528f7833e44d465256863cc57d441', 'admin', '14.99.222.127', '2013-02-13 04:51:33', 'OFF'),
('92e528f7833e44d465256863cc57d441', 'admin', '14.99.222.127', '2013-02-13 04:53:11', 'OFF'),
('92e528f7833e44d465256863cc57d441', 'admin', '14.99.222.127', '2013-02-13 04:54:00', 'OFF'),
('92e528f7833e44d465256863cc57d441', 'admin', '14.99.222.127', '2013-02-13 04:55:04', 'OFF'),
('92e528f7833e44d465256863cc57d441', 'admin', '14.99.222.127', '2013-02-13 04:56:23', 'OFF'),
('92e528f7833e44d465256863cc57d441', 'riya', '14.99.222.127', '2013-02-13 04:57:31', 'OFF'),
('e642dd880ed7cb654bc0273b2308411e', 'admin', '14.99.222.127', '2013-02-13 06:21:56', 'ON'),
('169f00271a145047e8c7f6a87faab2ac', 'admin', '14.99.222.127', '2013-02-13 06:28:18', 'ON'),
('169f00271a145047e8c7f6a87faab2ac', 'admin', '14.99.222.127', '2013-02-13 08:03:12', 'ON'),
('0e8d8d1459f76a233a88b735fbcd5d8c', 'riya', '14.99.132.70', '2013-02-14 04:15:34', 'OFF'),
('0e8d8d1459f76a233a88b735fbcd5d8c', 'admin', '14.99.132.70', '2013-02-14 04:19:46', 'OFF'),
('0e8d8d1459f76a233a88b735fbcd5d8c', 'riya', '14.99.132.70', '2013-02-14 04:22:10', 'ON'),
('0e8d8d1459f76a233a88b735fbcd5d8c', 'riya', '14.99.132.70', '2013-02-14 05:00:03', 'ON'),
('0e8d8d1459f76a233a88b735fbcd5d8c', 'admin', '14.99.132.70', '2013-02-14 06:43:06', 'ON'),
('0e8d8d1459f76a233a88b735fbcd5d8c', 'riya', '14.99.132.70', '2013-02-14 06:43:35', 'ON'),
('0e8d8d1459f76a233a88b735fbcd5d8c', 'riya', '14.96.62.28', '2013-02-14 07:09:31', 'ON'),
('0e8d8d1459f76a233a88b735fbcd5d8c', 'riya', '14.96.62.28', '2013-02-14 07:09:49', 'ON'),
('0e8d8d1459f76a233a88b735fbcd5d8c', 'admin', '14.96.62.28', '2013-02-14 07:17:56', 'ON'),
('50cb6467b58d171baaf05668332e9795', 'riya', '14.96.58.247', '2013-02-16 05:15:35', 'OFF'),
('50cb6467b58d171baaf05668332e9795', 'riya', '14.99.16.144', '2013-02-16 05:28:57', 'OFF'),
('50cb6467b58d171baaf05668332e9795', 'riya', '14.99.16.144', '2013-02-16 05:29:08', 'OFF'),
('50cb6467b58d171baaf05668332e9795', 'riya', '14.99.16.144', '2013-02-16 05:53:14', 'OFF'),
('50cb6467b58d171baaf05668332e9795', 'admin', '14.99.16.144', '2013-02-16 05:56:04', 'ON'),
('841b5cb457c2318dd5effbbb5afb15c3', 'riya', '14.99.16.144', '2013-02-16 06:12:22', 'OFF'),
('841b5cb457c2318dd5effbbb5afb15c3', 'admin', '14.99.16.144', '2013-02-16 06:32:29', 'OFF'),
('841b5cb457c2318dd5effbbb5afb15c3', 'riya', '14.99.16.144', '2013-02-16 06:36:16', 'OFF'),
('841b5cb457c2318dd5effbbb5afb15c3', 'riya', '14.99.16.144', '2013-02-16 07:52:23', 'OFF'),
('841b5cb457c2318dd5effbbb5afb15c3', 'admin', '14.99.16.144', '2013-02-16 08:01:56', 'OFF'),
('841b5cb457c2318dd5effbbb5afb15c3', 'admin', '14.99.16.144', '2013-02-16 08:03:47', 'OFF'),
('841b5cb457c2318dd5effbbb5afb15c3', 'admin', '14.99.16.144', '2013-02-16 08:05:30', 'OFF'),
('841b5cb457c2318dd5effbbb5afb15c3', 'admin', '14.99.16.144', '2013-02-16 08:08:31', 'OFF'),
('841b5cb457c2318dd5effbbb5afb15c3', 'admin', '14.99.16.144', '2013-02-16 08:09:17', 'OFF'),
('841b5cb457c2318dd5effbbb5afb15c3', 'admin', '14.99.16.144', '2013-02-16 08:10:12', 'OFF'),
('841b5cb457c2318dd5effbbb5afb15c3', 'admin', '14.99.16.144', '2013-02-16 08:12:22', 'OFF'),
('ab6fdbea830fc0ade3f48f32b3f1cb88', 'riya', '14.99.165.217', '2013-02-17 04:26:01', 'ON'),
('2aef5b96fce12d1a92aa99a4778291de', 'admin', '14.96.54.19', '2013-02-17 06:37:45', 'ON'),
('285e7519bdc196fb99b5b945ebb69639', 'admin', '14.99.204.34', '2013-02-18 04:18:45', 'OFF'),
('285e7519bdc196fb99b5b945ebb69639', 'riya', '14.99.204.34', '2013-02-18 05:06:02', 'ON'),
('b568c4e8d539ff097d4bd023b8d1fa4f', 'riya', '14.96.0.133', '2013-02-18 05:21:56', 'OFF'),
('b568c4e8d539ff097d4bd023b8d1fa4f', 'admin', '14.96.0.133', '2013-02-18 05:29:31', 'ON'),
('b568c4e8d539ff097d4bd023b8d1fa4f', 'riya', '14.96.0.133', '2013-02-18 06:03:56', 'ON'),
('b568c4e8d539ff097d4bd023b8d1fa4f', 'riya', '14.96.0.133', '2013-02-18 06:04:29', 'ON'),
('b568c4e8d539ff097d4bd023b8d1fa4f', 'riya', '14.96.0.133', '2013-02-18 06:14:35', 'ON'),
('c8e486f0923c7faa144184406dd2a706', 'admin', '14.99.234.78', '2013-02-19 04:16:49', 'OFF'),
('c8e486f0923c7faa144184406dd2a706', 'riya', '14.99.234.78', '2013-02-19 04:49:45', 'OFF'),
('c8e486f0923c7faa144184406dd2a706', 'riya', '14.99.234.78', '2013-02-19 06:01:26', 'OFF'),
('c8e486f0923c7faa144184406dd2a706', 'riya', '14.99.234.78', '2013-02-19 06:32:29', 'OFF'),
('c8e486f0923c7faa144184406dd2a706', 'riya', '14.99.234.78', '2013-02-19 06:46:49', 'OFF'),
('c8e486f0923c7faa144184406dd2a706', 'admin', '14.99.234.78', '2013-02-19 06:47:23', 'ON'),
('c8e486f0923c7faa144184406dd2a706', 'admin', '14.99.234.78', '2013-02-19 07:01:42', 'ON'),
('c8e486f0923c7faa144184406dd2a706', 'admin', '14.99.234.78', '2013-02-19 07:30:39', 'ON'),
('e3622ebd465b97347ee24fb71c410e32', 'riya', '14.99.57.144', '2013-02-20 01:23:49', 'OFF'),
('e3622ebd465b97347ee24fb71c410e32', 'admin', '14.99.57.144', '2013-02-20 01:36:55', 'OFF'),
('e3622ebd465b97347ee24fb71c410e32', 'admin', '14.99.57.144', '2013-02-20 01:45:33', 'OFF'),
('e3622ebd465b97347ee24fb71c410e32', 'saltlake', '14.99.57.144', '2013-02-20 01:49:48', 'OFF'),
('e3622ebd465b97347ee24fb71c410e32', 'admin', '14.99.57.144', '2013-02-20 01:52:19', 'OFF'),
('e3622ebd465b97347ee24fb71c410e32', 'admin', '14.99.57.144', '2013-02-20 01:53:48', 'OFF'),
('e3622ebd465b97347ee24fb71c410e32', 'saltlake', '14.99.57.144', '2013-02-20 01:57:13', 'ON'),
('83f857a53642762a208e7212bbdcb388', 'saltlake', '14.99.57.144', '2013-02-20 04:49:10', 'OFF'),
('83f857a53642762a208e7212bbdcb388', 'admin', '14.99.57.144', '2013-02-20 05:01:31', 'OFF'),
('83f857a53642762a208e7212bbdcb388', 'saltlake', '14.99.57.144', '2013-02-20 05:04:23', 'OFF'),
('83f857a53642762a208e7212bbdcb388', 'admin', '14.99.57.144', '2013-02-20 05:09:18', 'ON'),
('c2fd5a34cdd3091f854eaae8e70aa141', 'admin', '14.99.57.144', '2013-02-20 05:11:58', 'OFF'),
('c2fd5a34cdd3091f854eaae8e70aa141', 'saltlake1', '14.99.57.144', '2013-02-20 05:25:14', 'OFF'),
('c2fd5a34cdd3091f854eaae8e70aa141', 'admin', '14.99.57.144', '2013-02-20 05:26:35', 'OFF'),
('c2fd5a34cdd3091f854eaae8e70aa141', 'saltlake1', '14.99.57.144', '2013-02-20 05:29:35', 'OFF'),
('c2fd5a34cdd3091f854eaae8e70aa141', 'saltlake1', '14.99.57.144', '2013-02-20 05:33:54', 'OFF'),
('c2fd5a34cdd3091f854eaae8e70aa141', 'saltlake1', '14.99.57.144', '2013-02-20 06:16:44', 'OFF'),
('c2fd5a34cdd3091f854eaae8e70aa141', 'admin', '14.99.57.144', '2013-02-20 06:35:19', 'OFF'),
('b8c63298ed1fd2629a0cb4ad8ff68638', 'riya', '14.99.71.227', '2013-02-21 04:48:16', 'OFF'),
('b8c63298ed1fd2629a0cb4ad8ff68638', 'riya', '14.99.71.227', '2013-02-21 05:07:10', 'OFF'),
('b8c63298ed1fd2629a0cb4ad8ff68638', 'riya', '14.99.71.227', '2013-02-21 06:13:30', 'OFF'),
('b8c63298ed1fd2629a0cb4ad8ff68638', 'admin', '14.99.71.227', '2013-02-21 06:14:25', 'OFF'),
('b8c63298ed1fd2629a0cb4ad8ff68638', 'riya', '14.99.71.227', '2013-02-21 06:36:00', 'OFF'),
('b8c63298ed1fd2629a0cb4ad8ff68638', 'admin', '14.99.71.227', '2013-02-21 06:47:24', 'OFF'),
('b8c63298ed1fd2629a0cb4ad8ff68638', 'riya', '14.99.71.227', '2013-02-21 06:57:41', 'OFF'),
('b8c63298ed1fd2629a0cb4ad8ff68638', 'riya', '14.99.71.227', '2013-02-21 07:15:16', 'OFF'),
('b8c63298ed1fd2629a0cb4ad8ff68638', 'riya', '14.99.71.227', '2013-02-21 07:53:08', 'OFF'),
('b8c63298ed1fd2629a0cb4ad8ff68638', 'saltlake1', '14.99.71.227', '2013-02-21 07:55:09', 'OFF'),
('b8c63298ed1fd2629a0cb4ad8ff68638', 'admin', '14.99.71.227', '2013-02-21 08:00:45', 'OFF'),
('b8c63298ed1fd2629a0cb4ad8ff68638', 'saltlake1', '14.99.71.227', '2013-02-21 08:07:24', 'OFF'),
('b8c63298ed1fd2629a0cb4ad8ff68638', 'riya', '14.99.71.227', '2013-02-21 08:56:58', 'OFF'),
('b8c63298ed1fd2629a0cb4ad8ff68638', 'riya', '14.99.71.227', '2013-02-21 09:16:49', 'OFF'),
('74ddc3925119ea4b477fd9e4ccf5fb59', 'admin', '14.99.247.189', '2013-02-22 02:20:45', 'OFF'),
('74ddc3925119ea4b477fd9e4ccf5fb59', 'saltlake1', '14.99.247.189', '2013-02-22 02:22:29', 'OFF'),
('bce60cf0264899fc3b8a2782cfbf8d88', 'saltlake1', '14.99.247.189', '2013-02-22 02:23:12', 'ON'),
('a778f8ddfc83835f5e363723b95ed929', 'riya', '14.99.36.200', '2013-02-22 03:02:27', 'ON'),
('a778f8ddfc83835f5e363723b95ed929', 'admin', '14.99.36.200', '2013-02-22 03:05:14', 'ON'),
('a778f8ddfc83835f5e363723b95ed929', 'riya', '14.99.36.200', '2013-02-22 03:47:36', 'ON'),
('a778f8ddfc83835f5e363723b95ed929', 'riya', '14.99.36.200', '2013-02-22 03:48:03', 'ON'),
('a778f8ddfc83835f5e363723b95ed929', 'riya', '14.99.36.200', '2013-02-22 05:43:52', 'ON'),
('a778f8ddfc83835f5e363723b95ed929', 'riya', '14.99.36.200', '2013-02-22 06:23:23', 'ON'),
('a778f8ddfc83835f5e363723b95ed929', 'riya', '14.99.36.200', '2013-02-22 06:23:46', 'ON'),
('f16a8bd82b4caa6efa4a806035dd84fc', 'saltlake1', '110.227.181.146', '2013-02-22 06:34:07', 'ON'),
('d56c9cfd77c0076ae35e7443fff92a07', 'saltlake1', '223.231.46.147', '2013-02-22 06:39:25', 'OFF'),
('66b65add26b96e91218ee37e425814bc', 'saltlake1', '117.99.23.237', '2013-02-22 08:25:10', 'ON'),
('0e6f9970fd503888ecea585d9c24250c', 'admin', '14.96.59.203', '2013-02-23 03:38:41', 'ON'),
('eeab46d3414875f6f6e7eb727980c99f', 'riya', '14.96.14.199', '2013-02-24 02:48:11', 'OFF'),
('eeab46d3414875f6f6e7eb727980c99f', 'admin', '14.96.14.199', '2013-02-24 02:54:57', 'OFF'),
('eeab46d3414875f6f6e7eb727980c99f', 'riya', '14.96.14.199', '2013-02-24 03:48:15', 'OFF'),
('03843e690567237e2f82ea843d4fc0d5', 'saltlake', '14.96.111.171', '2013-02-24 05:30:57', 'OFF'),
('03843e690567237e2f82ea843d4fc0d5', 'saltlake', '14.96.111.171', '2013-02-24 05:43:24', 'OFF'),
('03843e690567237e2f82ea843d4fc0d5', 'saltlake1', '14.96.111.171', '2013-02-24 05:48:03', 'ON'),
('03843e690567237e2f82ea843d4fc0d5', 'saltlake1', '14.96.111.171', '2013-02-24 06:02:40', 'ON'),
('03843e690567237e2f82ea843d4fc0d5', 'admin', '14.96.111.171', '2013-02-24 06:09:05', 'ON'),
('4d72d6e7fdd03c367a12138dea5aa3f0', 'admin', '14.96.111.171', '2013-02-24 07:04:30', 'OFF'),
('4d72d6e7fdd03c367a12138dea5aa3f0', 'riya', '14.96.111.171', '2013-02-24 07:29:46', 'OFF'),
('bfb0491d6bf2d35c993973d76be43e4a', 'admin', '14.96.111.171', '2013-02-24 08:00:32', 'ON'),
('5dd88a1d444cc349002064c5496874cb', 'admin', '14.96.111.171', '2013-02-24 08:03:13', 'ON'),
('a1d61b3b6a2102776a4e3376493b1574', 'riya', '14.96.111.171', '2013-02-24 08:32:33', 'OFF'),
('4c403cfc4fb6661b29bc6584bc7a9e46', 'saltlake1', '14.96.37.173', '2013-02-25 03:04:39', 'OFF'),
('de7752d8539addd47d07dc70d6617a41', 'riya', '14.96.47.64', '2013-02-25 05:21:58', 'ON'),
('6593e9044e1e6bf74b5850657280e4ef', 'saltlake1', '223.176.212.229', '2013-02-26 01:46:51', 'OFF'),
('6593e9044e1e6bf74b5850657280e4ef', 'admin', '223.176.212.229', '2013-02-26 01:48:33', 'ON'),
('6593e9044e1e6bf74b5850657280e4ef', 'saltlake1', '223.176.212.229', '2013-02-26 02:04:35', 'ON'),
('6593e9044e1e6bf74b5850657280e4ef', 'admin', '223.176.212.229', '2013-02-26 02:07:38', 'ON'),
('6593e9044e1e6bf74b5850657280e4ef', 'saltlake1', '223.176.212.229', '2013-02-26 02:17:55', 'ON'),
('6593e9044e1e6bf74b5850657280e4ef', 'admin', '223.176.212.229', '2013-02-26 02:28:07', 'ON'),
('6593e9044e1e6bf74b5850657280e4ef', 'saltlake1', '223.176.212.229', '2013-02-26 02:36:53', 'ON'),
('6593e9044e1e6bf74b5850657280e4ef', 'admin', '223.176.212.229', '2013-02-26 02:46:53', 'ON'),
('cd5c36113325500c690002b60a7aa684', 'riya', '14.99.100.176', '2013-02-26 03:26:10', 'OFF'),
('cd5c36113325500c690002b60a7aa684', 'riya', '14.99.100.176', '2013-02-26 03:41:45', 'OFF'),
('cd5c36113325500c690002b60a7aa684', 'riya', '14.99.100.176', '2013-02-26 04:03:10', 'OFF'),
('7f07e63c2903965eebc661e3deffbe0d', 'admin', '14.99.87.220', '2013-02-26 06:00:56', 'OFF'),
('b6f5df3fe3aa923a7fc08b936c7f676d', 'admin', '14.99.87.220', '2013-02-26 06:38:21', 'ON'),
('29acf7888b3039231e9c69e349c642c7', 'saltlake1', '117.99.21.229', '2013-02-27 04:22:13', 'ON'),
('6b1cca59f0e477e5daacfbd85bc4e8c9', 'saltlake1', '117.99.21.229', '2013-02-27 04:25:46', 'ON'),
('a3676610c5b4ecf815fa5671755d6d8f', 'riya', '14.96.156.2', '2013-02-27 05:11:10', 'ON'),
('75e2026794e7370ae9464815b2943618', 'riya', '14.96.156.2', '2013-02-27 06:52:23', 'OFF'),
('75e2026794e7370ae9464815b2943618', 'admin', '14.96.156.2', '2013-02-27 08:11:35', 'OFF'),
('4252915b92546e064e7740a8559de865', 'saltlake1', '110.227.116.235', '2013-02-28 03:29:36', 'ON'),
('87f5ece7a3fded2a21984bb3d25c63cf', 'saltlake1', '110.227.233.121', '2013-02-28 04:01:34', 'ON'),
('00bf191b1f1a1ac7b3ced239a082e0bf', 'riya', '14.99.97.113', '2013-02-28 06:09:43', 'ON'),
('00bf191b1f1a1ac7b3ced239a082e0bf', 'riya', '14.99.97.113', '2013-02-28 07:03:59', 'ON'),
('00bf191b1f1a1ac7b3ced239a082e0bf', 'riya', '14.99.97.113', '2013-02-28 07:10:59', 'ON'),
('00bf191b1f1a1ac7b3ced239a082e0bf', 'admin', '14.99.97.113', '2013-02-28 07:40:02', 'ON'),
('67b4c8c48589a706854658c30efcaa60', 'saltlake1', '223.231.48.56', '2013-03-01 01:20:02', 'OFF'),
('67b4c8c48589a706854658c30efcaa60', 'saltlake1', '223.231.48.56', '2013-03-01 01:35:42', 'OFF'),
('67b4c8c48589a706854658c30efcaa60', 'saltlake1', '223.231.48.56', '2013-03-01 01:50:24', 'OFF'),
('7ece0e8be4d068246489ed0982f806f0', 'saltlake1', '223.176.232.230', '2013-03-01 02:31:21', 'ON'),
('7ece0e8be4d068246489ed0982f806f0', 'saltlake1', '223.176.232.230', '2013-03-01 02:49:34', 'ON'),
('cb8ca81a65f91762644d0f246b1386ba', 'saltlake1', '223.176.235.129', '2013-03-01 03:05:12', 'ON'),
('9639c8acebfd08ccbe48a19d86261674', 'saltlake1', '110.227.181.70', '2013-03-01 03:53:44', 'ON'),
('9639c8acebfd08ccbe48a19d86261674', 'saltlake1', '110.227.181.70', '2013-03-01 04:09:39', 'ON'),
('b8a88cf53bcca3c0192e3213a1c9703f', 'saltlake1', '117.99.186.255', '2013-03-01 05:09:13', 'OFF'),
('b8a88cf53bcca3c0192e3213a1c9703f', 'admin', '117.99.186.255', '2013-03-01 05:14:20', 'OFF'),
('b8a88cf53bcca3c0192e3213a1c9703f', 'saltlake1', '117.99.186.255', '2013-03-01 05:16:38', 'ON'),
('7979ba1432dd6c9b6613f2b4c41b2fa3', 'riya', '14.99.171.53', '2013-03-01 05:42:12', 'OFF'),
('7979ba1432dd6c9b6613f2b4c41b2fa3', 'admin', '14.99.171.53', '2013-03-01 06:03:37', 'OFF'),
('7979ba1432dd6c9b6613f2b4c41b2fa3', 'riya', '14.99.171.53', '2013-03-01 06:37:19', 'OFF'),
('7979ba1432dd6c9b6613f2b4c41b2fa3', 'admin', '14.99.171.53', '2013-03-01 06:49:02', 'OFF'),
('7979ba1432dd6c9b6613f2b4c41b2fa3', 'riya', '14.99.171.53', '2013-03-01 07:34:22', 'OFF'),
('7979ba1432dd6c9b6613f2b4c41b2fa3', 'riya', '14.99.171.53', '2013-03-01 08:20:20', 'OFF'),
('7979ba1432dd6c9b6613f2b4c41b2fa3', 'admin', '14.99.171.53', '2013-03-01 08:25:21', 'OFF'),
('7979ba1432dd6c9b6613f2b4c41b2fa3', 'admin', '14.99.171.53', '2013-03-01 08:28:21', 'OFF'),
('4f6fa889a22cfb02a77488f8fc9022df', 'admin', '14.99.171.53', '2013-03-01 08:48:52', 'OFF'),
('ae3ab20b97f5e14641b3fce48836bf70', 'admin', '223.180.177.121', '2013-03-02 01:01:22', 'ON'),
('7e661f549032c3ebf84cdc27e7bcc99c', 'admin', '223.180.177.121', '2013-03-02 01:03:16', 'OFF'),
('7e661f549032c3ebf84cdc27e7bcc99c', 'saltlake1', '223.180.177.121', '2013-03-02 01:06:59', 'ON'),
('7e661f549032c3ebf84cdc27e7bcc99c', 'saltlake1', '223.180.177.121', '2013-03-02 01:23:52', 'ON'),
('7e661f549032c3ebf84cdc27e7bcc99c', 'saltlake1', '223.180.177.121', '2013-03-02 01:33:36', 'ON'),
('7e661f549032c3ebf84cdc27e7bcc99c', 'saltlake1', '223.180.177.121', '2013-03-02 01:53:11', 'ON'),
('093039b7154ae1a9e5251213eaedceb5', 'saltlake1', '223.176.234.73', '2013-03-02 02:05:00', 'OFF'),
('093039b7154ae1a9e5251213eaedceb5', 'admin', '223.176.234.73', '2013-03-02 02:10:17', 'OFF'),
('093039b7154ae1a9e5251213eaedceb5', 'saltlake1', '223.176.234.73', '2013-03-02 02:12:18', 'ON'),
('ffaa59be8e7d33defb3f2285a63d568e', 'admin', '223.231.53.172', '2013-03-02 03:57:58', 'OFF'),
('ffaa59be8e7d33defb3f2285a63d568e', 'saltlake1', '223.231.53.172', '2013-03-02 04:00:28', 'ON'),
('56d52dd511402e07d827d1f6f45adfdd', 'saltlake', '223.231.53.172', '2013-03-02 04:11:20', 'ON'),
('74f4b5c846afb1bf3d2c49301ef19995', 'saltlake1', '110.227.242.188', '2013-03-02 04:29:24', 'ON'),
('743238368663d32ed7f37b815354de9a', 'saltlake1', '117.99.184.250', '2013-03-02 04:53:22', 'ON'),
('094e3a62d9b3da977bf6dab0f6f9c036', 'riya', '14.96.123.235', '2013-03-02 05:16:19', 'OFF'),
('38a33ecd5bda26eff1508e3c83191248', 'saltlake1', '223.180.183.139', '2013-03-02 05:54:12', 'OFF'),
('38a33ecd5bda26eff1508e3c83191248', 'admin', '223.180.183.139', '2013-03-02 06:02:20', 'ON'),
('7e7cd29f8a517b2750d664cb25de2549', 'riya', '14.96.123.235', '2013-03-02 06:12:28', 'OFF'),
('98343bcf0ff1dd9c50b2450d481e9427', 'saltlake1', '110.227.90.17', '2013-03-04 01:27:36', 'ON'),
('abbb27afd21a963a737a4cc51b91cbd7', 'saltlake1', '110.227.245.191', '2013-03-04 01:41:27', 'ON'),
('ab09e251a9f2492958f9db4dbefbc942', 'saltlake1', '223.231.50.150', '2013-03-04 02:07:19', 'ON'),
('abb43833d338e4d2ea4913293a717593', 'saltlake1', '223.176.238.72', '2013-03-04 03:00:56', 'ON'),
('c8b91e41ee2fc0450ca0d2abfb06e3b8', 'saltlake1', '223.180.177.209', '2013-03-04 03:13:00', 'ON'),
('870deea72675fe06c49078199aa2b470', 'riya', '14.96.17.169', '2013-03-04 03:45:23', 'OFF'),
('c8b91e41ee2fc0450ca0d2abfb06e3b8', 'saltlake1', '117.99.27.225', '2013-03-04 03:58:10', 'ON'),
('c8b91e41ee2fc0450ca0d2abfb06e3b8', 'saltlake1', '117.99.27.225', '2013-03-04 03:58:35', 'ON'),
('b2e9f30e663590a2d3848cf9b726eec0', 'saltlake1', '117.99.39.140', '2013-03-04 04:41:46', 'ON'),
('856b34e6caad702ea333ab4fdbef607e', 'admin', '223.176.239.87', '2013-03-04 05:40:58', 'ON'),
('870deea72675fe06c49078199aa2b470', 'riya', '14.96.17.169', '2013-03-04 06:03:56', 'ON'),
('780b5858d71de451ba08b91dc1ef1a6a', 'saltlake1', '223.180.174.196', '2013-03-04 06:36:10', 'OFF'),
('780b5858d71de451ba08b91dc1ef1a6a', 'admin', '223.180.174.196', '2013-03-04 06:44:08', 'OFF'),
('870deea72675fe06c49078199aa2b470', 'riya', '14.96.17.169', '2013-03-04 07:00:19', 'ON'),
('780b5858d71de451ba08b91dc1ef1a6a', 'admin', '223.180.174.196', '2013-03-04 07:23:08', 'OFF'),
('780b5858d71de451ba08b91dc1ef1a6a', 'saltlake1', '223.180.174.196', '2013-03-04 07:28:19', 'OFF'),
('780b5858d71de451ba08b91dc1ef1a6a', 'admin', '223.180.174.196', '2013-03-04 07:29:07', 'OFF'),
('780b5858d71de451ba08b91dc1ef1a6a', 'saltlake1', '223.180.174.196', '2013-03-04 07:30:31', 'OFF'),
('780b5858d71de451ba08b91dc1ef1a6a', 'admin', '223.180.174.196', '2013-03-04 07:31:56', 'OFF'),
('870deea72675fe06c49078199aa2b470', 'riya', '14.96.17.169', '2013-03-04 07:37:38', 'ON'),
('ff0ac3a19efb58f7207032616d09beb3', 'saltlake1', '106.199.88.239', '2013-03-05 00:54:22', 'ON'),
('51ea5bd734f079fc58f44307d6e02391', 'saltlake1', '106.199.88.239', '2013-03-05 00:56:35', 'OFF'),
('16015a2426de95e7c5bcc3b66575c419', 'saltlake1', '223.176.236.196', '2013-03-05 04:14:55', 'OFF'),
('16015a2426de95e7c5bcc3b66575c419', 'admin', '223.176.236.196', '2013-03-05 04:21:31', 'OFF'),
('16015a2426de95e7c5bcc3b66575c419', 'saltlake1', '223.176.236.196', '2013-03-05 04:26:15', 'ON'),
('f3a5a12eb7ca73261f5ff57efbd0dc56', 'riya', '14.96.121.245', '2013-03-05 04:57:26', 'OFF'),
('16015a2426de95e7c5bcc3b66575c419', 'saltlake1', '223.231.51.109', '2013-03-05 05:13:10', 'ON'),
('16015a2426de95e7c5bcc3b66575c419', 'saltlake1', '223.231.51.109', '2013-03-05 05:34:36', 'ON'),
('086600fee193928b78e4eab396898a7f', 'saltlake1', '223.176.230.249', '2013-03-05 06:55:13', 'ON'),
('f2ba7fb5830c41b65ab7148a0fd5d080', 'saltlake1', '110.227.177.41', '2013-03-06 01:38:12', 'ON'),
('92132c84bb14a9369c8d3d92bc02cfa2', 'saltlake1', '223.180.182.123', '2013-03-06 01:48:31', 'OFF'),
('92132c84bb14a9369c8d3d92bc02cfa2', 'admin', '223.180.182.123', '2013-03-06 02:31:13', 'OFF'),
('92132c84bb14a9369c8d3d92bc02cfa2', 'admin', '223.180.182.123', '2013-03-06 02:39:08', 'OFF'),
('0bed8993534496c43c42929c5788d55a', 'saltlake1', '223.180.182.123', '2013-03-06 03:09:01', 'ON'),
('0bed8993534496c43c42929c5788d55a', 'saltlake1', '223.180.182.123', '2013-03-06 03:25:45', 'ON'),
('575184eec9e62c1e6b3ca6344ec08ab6', 'saltlake1', '106.199.106.131', '2013-03-06 03:39:40', 'ON'),
('575184eec9e62c1e6b3ca6344ec08ab6', 'saltlake1', '106.199.106.131', '2013-03-06 04:02:32', 'ON'),
('727ef1574a32845c8365d59c970e7273', 'saltlake1', '110.227.240.47', '2013-03-06 04:16:00', 'ON'),
('17ca6cf3701bd676d86b814640d8133f', 'admin', '14.99.247.31', '2013-03-06 04:33:49', 'ON'),
('408d40adbdd0cb2673dd00287b9d6710', 'saltlake1', '110.227.91.105', '2013-03-06 04:42:28', 'ON'),
('7c3228c36fcccf9b0cf34bc07857c0f6', 'saltlake1', '110.227.91.105', '2013-03-06 04:50:30', 'ON'),
('ab4a87dabd9e1f5eb63e72814c184647', 'saltlake1', '110.227.91.105', '2013-03-06 04:58:19', 'ON'),
('17ca6cf3701bd676d86b814640d8133f', 'riya', '14.99.247.31', '2013-03-06 05:14:43', 'ON'),
('ab4a87dabd9e1f5eb63e72814c184647', 'saltlake1', '110.227.91.105', '2013-03-06 05:29:39', 'ON'),
('6b7ca98ae1beb81f7e7bd09eca9eae26', 'saltlake1', '110.227.91.105', '2013-03-06 05:37:09', 'OFF'),
('6b7ca98ae1beb81f7e7bd09eca9eae26', 'saltlake1', '110.227.91.105', '2013-03-06 06:03:27', 'ON'),
('8f2020816bb638f6f8dd2b3c67f532bb', 'riya', '14.99.247.31', '2013-03-06 06:21:22', 'ON'),
('9ebfd93e4c44d8eab8f518f7ed1d01fe', 'saltlake1', '110.227.171.174', '2013-03-06 06:45:15', 'OFF'),
('8930c546ac101753b7fefe44a97fe655', 'saltlake1', '110.227.89.20', '2013-03-06 09:03:02', 'OFF'),
('8930c546ac101753b7fefe44a97fe655', 'admin', '110.227.89.20', '2013-03-06 09:15:19', 'OFF'),
('8930c546ac101753b7fefe44a97fe655', 'saltlake1', '110.227.89.20', '2013-03-06 09:21:36', 'OFF'),
('8930c546ac101753b7fefe44a97fe655', 'admin', '110.227.89.20', '2013-03-06 09:28:01', 'OFF');
INSERT INTO `plus_login` (`id`, `userid`, `ip`, `tm`, `status`) VALUES
('8930c546ac101753b7fefe44a97fe655', 'saltlake1', '110.227.89.20', '2013-03-06 09:30:33', 'OFF'),
('8930c546ac101753b7fefe44a97fe655', 'admin', '110.227.89.20', '2013-03-06 09:31:58', 'OFF'),
('8930c546ac101753b7fefe44a97fe655', 'saltlake1', '110.227.89.20', '2013-03-06 09:34:03', 'ON'),
('8930c546ac101753b7fefe44a97fe655', 'admin', '110.227.89.20', '2013-03-06 09:40:45', 'ON'),
('6e12f395d03dd645308d400ea7ba3bb1', 'saltlake1', '112.79.36.53', '2013-03-06 22:57:38', 'OFF'),
('6e12f395d03dd645308d400ea7ba3bb1', 'admin', '112.79.36.53', '2013-03-06 23:03:41', 'OFF'),
('b43d9f476d094c2a9783413f520bc72d', 'admin', '112.79.36.49', '2013-03-06 23:37:08', 'OFF'),
('b43d9f476d094c2a9783413f520bc72d', 'admin', '112.79.36.49', '2013-03-06 23:58:54', 'OFF'),
('b43d9f476d094c2a9783413f520bc72d', 'saltlake1', '112.79.36.49', '2013-03-07 00:03:43', 'OFF'),
('b43d9f476d094c2a9783413f520bc72d', 'admin', '112.79.36.49', '2013-03-07 00:06:40', 'OFF'),
('b43d9f476d094c2a9783413f520bc72d', 'saltlake1', '112.79.36.49', '2013-03-07 00:09:35', 'OFF'),
('b43d9f476d094c2a9783413f520bc72d', 'admin', '112.79.36.49', '2013-03-07 00:13:05', 'ON'),
('ea2db564a177ddab80d53cee009c137a', 'admin', '112.79.36.49', '2013-03-07 00:20:14', 'ON'),
('ea2db564a177ddab80d53cee009c137a', 'admin', '112.79.36.49', '2013-03-07 00:30:54', 'ON'),
('ea2db564a177ddab80d53cee009c137a', 'admin', '112.79.36.49', '2013-03-07 00:35:47', 'ON'),
('452a9a7efd6869ff0d6a7a9f88b0c4f1', 'saltlake1', '112.79.36.192', '2013-03-07 03:16:30', 'ON'),
('9e3d15a992bdf6098678f6d8b1ed596a', 'saltlake1', '112.79.36.178', '2013-03-07 03:20:39', 'ON'),
('9e3d15a992bdf6098678f6d8b1ed596a', 'saltlake1', '112.79.36.178', '2013-03-07 03:53:52', 'ON'),
('157b8e881595c76aed96555fe86dddc6', 'saltlake1', '112.79.36.1', '2013-03-07 04:07:42', 'ON'),
('de5f0340d533cf1c5a365019e2f7fa11', 'saltlake1', '112.79.36.92', '2013-03-07 05:28:33', 'OFF'),
('de5f0340d533cf1c5a365019e2f7fa11', 'saltlake1', '112.79.36.92', '2013-03-07 05:33:15', 'ON'),
('0a302c7ec5d2b0db673d22a39e1a2987', 'admin', '14.96.33.118', '2013-03-07 06:57:57', 'ON'),
('0a302c7ec5d2b0db673d22a39e1a2987', 'admin', '14.96.33.118', '2013-03-07 07:37:05', 'ON'),
('i7ltlkk35ep0eeer8f7f2cr1a7', 'admin', '127.0.0.1', '2013-07-29 10:57:21', 'ON'),
('i7ltlkk35ep0eeer8f7f2cr1a7', 'admin', '127.0.0.1', '2013-07-29 11:08:00', 'ON'),
('d40dcfdc56b326e63c6d14a2264632f8', 'admin', '49.136.40.253', '2013-07-29 10:25:07', 'ON'),
('d40dcfdc56b326e63c6d14a2264632f8', 'admin', '49.136.40.253', '2013-07-29 10:25:13', 'ON'),
('d40dcfdc56b326e63c6d14a2264632f8', 'admin', '49.136.40.253', '2013-07-29 10:43:37', 'ON'),
('f013a1b7e91c8aa33eb4e0159a17107c', 'admin', '101.218.171.218', '2013-07-29 11:23:50', 'ON'),
('96a45d421edcaaa45908794a54f42c4d', 'admin', '113.193.17.45', '2013-07-29 11:47:11', 'OFF'),
('96a45d421edcaaa45908794a54f42c4d', 'admin', '113.193.17.45', '2013-07-29 12:07:58', 'OFF'),
('9c72c8bcf913b2d0a10fe03a376fa743', 'admin', '113.193.17.45', '2013-07-29 14:26:14', 'OFF'),
('9c72c8bcf913b2d0a10fe03a376fa743', 'admin', '113.193.17.45', '2013-07-29 14:36:42', 'OFF'),
('9c72c8bcf913b2d0a10fe03a376fa743', 'admin', '113.193.17.45', '2013-07-29 14:42:20', 'ON'),
('c132f043710ca12b7ef42eea3c395e62', 'admin', '101.218.164.50', '2013-07-29 21:16:09', 'ON'),
('ec635e9037ea53003de2d35008ad9a01', 'admin', '14.142.86.223', '2013-07-30 07:44:52', 'OFF'),
('9a42944ff270c61d45f9c00b9c88893a', 'admin', '113.193.18.54', '2013-07-30 10:47:42', 'ON'),
('d67298337a4882f66906e9d8993e9ce7', 'admin', '113.193.18.54', '2013-07-30 10:52:22', 'ON'),
('d67298337a4882f66906e9d8993e9ce7', 'admin', '113.193.18.54', '2013-07-30 11:27:15', 'ON'),
('d67298337a4882f66906e9d8993e9ce7', 'admin', '113.193.18.54', '2013-07-30 11:39:52', 'ON'),
('d67298337a4882f66906e9d8993e9ce7', 'admin', '113.193.18.54', '2013-07-30 11:52:55', 'ON'),
('9a42944ff270c61d45f9c00b9c88893a', 'admin', '113.193.18.54', '2013-07-30 12:13:54', 'ON'),
('d67298337a4882f66906e9d8993e9ce7', 'admin', '113.193.18.54', '2013-07-30 12:14:43', 'ON'),
('9de33d85d8c2566cf1e187430246ffa4', 'admin', '14.195.160.11', '2013-07-30 16:33:53', 'OFF'),
('23b10ffe6a17e4b33f0101779435d2a5', 'admin', '14.195.103.26', '2013-07-30 17:00:59', 'OFF'),
('9e9277cbabed57dbd526a9cec862ee69', 'admin', '115.250.105.36', '2013-07-30 17:23:36', 'OFF'),
('d739dd539dd1c8a0d1aa40a978356116', 'admin', '121.245.19.221', '2013-07-30 22:24:46', 'OFF'),
('0a04fe6a103ddfbcc78822d8c2f23a48', 'admin', '101.210.152.186', '2013-07-31 09:38:50', 'ON'),
('5926108224dc8f8a902483b97d903966', 'admin', '182.156.178.178', '2013-07-31 09:45:45', 'ON'),
('4ec95cb9dc3fc7d34afbf84c58d3d680', 'admin', '1.22.117.146', '2013-07-31 10:27:44', 'ON'),
('5926108224dc8f8a902483b97d903966', 'admin', '14.195.101.193', '2013-07-31 10:30:31', 'ON'),
('f173d92fb639076898334da7a5e3a5a8', 'admin', '1.22.117.146', '2013-07-31 10:39:33', 'ON'),
('7898f1ec7f21dda6d04eb754af3677cd', 'admin', '101.210.152.186', '2013-07-31 10:41:19', 'ON'),
('5926108224dc8f8a902483b97d903966', 'admin', '14.195.101.193', '2013-07-31 10:51:32', 'ON'),
('3e85b62bc5fe37d4fff4454c6d1743bc', 'admin', '1.22.117.146', '2013-07-31 11:52:15', 'ON'),
('3e85b62bc5fe37d4fff4454c6d1743bc', 'admin', '1.22.117.146', '2013-07-31 12:06:35', 'ON'),
('3893ecf5b7787ed1e54d016c22372f90', 'admin', '101.62.57.179', '2013-07-31 15:36:38', 'OFF'),
('3d4f4459eda2fcf227d7c7d16691fc46', 'admin', '101.62.57.179', '2013-07-31 18:10:20', 'OFF'),
('a877ca49080f686c2fc17e3b6e8b4526', 'admin', '101.218.13.115', '2013-08-04 21:39:48', 'ON'),
('219c0f4e0c5e2d07616ba19b60a58c90', 'admin', '182.156.178.45', '2013-08-04 21:41:38', 'ON'),
('219c0f4e0c5e2d07616ba19b60a58c90', 'admin', '182.156.178.45', '2013-08-04 21:41:56', 'ON'),
('1169e07960d6919179c42780e39254d2', 'admin', '113.193.19.2', '2013-08-05 13:16:56', 'OFF'),
('9184ac59a12f987c621b8b836c31d908', 'admin', '14.142.83.186', '2013-08-05 16:01:05', 'OFF'),
('afe1149fa932bd38555a6eae2f950efe', 'admin', '49.201.14.181', '2013-08-05 19:08:41', 'OFF'),
('afe1149fa932bd38555a6eae2f950efe', 'admin', '49.201.14.181', '2013-08-05 19:32:37', 'OFF'),
('3b2e39c57216fe3f10a9cde8020cfd3e', 'admin', '14.195.161.43', '2013-08-06 11:05:14', 'OFF'),
('781063a595e07c69d8af24b9d74e0d85', 'admin', '182.156.178.183', '2013-08-06 16:29:00', 'OFF'),
('781063a595e07c69d8af24b9d74e0d85', 'admin', '14.142.144.12', '2013-08-06 19:16:38', 'OFF'),
('52d22f05cbecfd613bbc7c337a5b5b5e', 'admin', '101.217.213.196', '2013-08-06 20:09:50', 'ON'),
('52d22f05cbecfd613bbc7c337a5b5b5e', 'admin', '101.217.213.196', '2013-08-06 21:18:25', 'ON'),
('40c5c18db7d60ce1cf95eff74c10b66e', 'admin', '14.195.96.206', '2013-08-06 21:35:03', 'OFF'),
('40c5c18db7d60ce1cf95eff74c10b66e', 'admin', '14.195.96.206', '2013-08-06 21:35:27', 'OFF'),
('52d22f05cbecfd613bbc7c337a5b5b5e', 'admin', '101.217.213.196', '2013-08-06 21:45:24', 'ON'),
('40c5c18db7d60ce1cf95eff74c10b66e', 'admin', '14.142.150.80', '2013-08-06 22:02:38', 'OFF'),
('7ea2400b23e8ef7bf31795ac8e951456', 'admin', '113.193.16.226', '2013-08-07 11:44:55', 'ON'),
('7ea2400b23e8ef7bf31795ac8e951456', 'admin', '113.193.16.226', '2013-08-07 12:07:35', 'ON'),
('03dfda58e5a5d74135f27acb950c988f', 'admin', '113.193.16.226', '2013-08-07 12:10:38', 'ON'),
('c04a1b0808248046bc049a97a58ce52a', 'admin', '101.210.147.116', '2013-08-07 17:07:07', 'ON'),
('7a76ea208977cf37f7b12eca9938a122', 'admin', '121.245.18.22', '2013-08-07 20:40:55', 'OFF'),
('3c46a7aa9b9600de61a71111e838f3a9', 'admin', '14.142.145.251', '2013-08-08 07:31:21', 'OFF'),
('1d4051306604bd9557ebc26914c34d25', 'admin', '101.63.212.183', '2013-08-08 12:24:45', 'ON'),
('1d4051306604bd9557ebc26914c34d25', 'admin', '101.63.150.118', '2013-08-08 14:08:38', 'ON'),
('1d4051306604bd9557ebc26914c34d25', 'admin', '101.63.150.118', '2013-08-08 14:20:43', 'ON'),
('3f3dfd4f53fff5491ef6ecd43f6e3ae7', 'admin', '182.156.177.29', '2013-08-08 17:42:46', 'ON'),
('3f3dfd4f53fff5491ef6ecd43f6e3ae7', 'admin', '182.156.177.29', '2013-08-08 18:01:23', 'ON'),
('3f3dfd4f53fff5491ef6ecd43f6e3ae7', 'admin', '182.156.177.29', '2013-08-08 18:01:24', 'ON'),
('860a587c769d9298f67e8dc62bb33075', 'admin', '101.218.115.71', '2013-08-08 19:37:10', 'ON'),
('cfoi2v21upnmdp3d6vtlou6vs3', 'admin', '127.0.0.1', '2013-08-08 21:28:13', 'ON'),
('cfoi2v21upnmdp3d6vtlou6vs3', 'admin', '127.0.0.1', '2013-08-08 22:01:45', 'ON'),
('krjem0hllq10dk7pqu3gsuitf0', 'admin', '127.0.0.1', '2013-08-08 22:32:59', 'ON'),
('krjem0hllq10dk7pqu3gsuitf0', 'admin', '127.0.0.1', '2013-08-08 23:06:28', 'ON'),
('uu2096u12dp05i8kcjego1c2m3', 'admin', '127.0.0.1', '2013-08-09 10:51:39', 'ON'),
('uu2096u12dp05i8kcjego1c2m3', 'admin', '127.0.0.1', '2013-08-09 11:14:47', 'ON'),
('uu2096u12dp05i8kcjego1c2m3', 'admin', '127.0.0.1', '2013-08-09 14:10:45', 'ON'),
('suqlcj1edkpk55i2hphg6niej4', 'admin', '127.0.0.1', '2013-08-11 20:21:07', 'ON'),
('6slugt08ngqeo7lkdkrkg9jb63', 'admin', '127.0.0.1', '2013-08-14 18:32:36', 'ON'),
('rnr13masg1i82n60gt0spbrk02', 'admin', '127.0.0.1', '2013-08-19 11:07:09', 'ON'),
('umse53d7b9rimig83uiuimuo67', 'admin', '127.0.0.1', '2013-08-21 20:57:31', 'ON'),
('umse53d7b9rimig83uiuimuo67', 'admin', '127.0.0.1', '2013-08-21 21:28:04', 'ON'),
('umse53d7b9rimig83uiuimuo67', 'admin', '127.0.0.1', '2013-08-22 10:51:30', 'ON'),
('umse53d7b9rimig83uiuimuo67', 'admin', '127.0.0.1', '2013-08-22 12:46:44', 'ON'),
('hscednh1srosam1sc6pmfrtpd0', 'admin', '127.0.0.1', '2013-08-22 20:13:15', 'ON'),
('eqdb0a7pssau6e64ps1asss2a7', 'admin', '127.0.0.1', '2013-08-23 10:19:49', 'ON'),
('tgku1a2beokc2l661fads031j1', 'admin', '127.0.0.1', '2013-08-25 11:36:55', 'ON'),
('pfkla94446gfjho9gcn57v1kt1', 'admin', '127.0.0.1', '2013-08-25 19:54:04', 'ON'),
('nuvgl7eob5tompi3q8c6gm4bt7', 'admin', '127.0.0.1', '2013-08-27 13:22:42', 'ON'),
('732uudnl7a17eo9km0f4c0u6f1', 'admin', '127.0.0.1', '2013-08-30 18:13:48', 'OFF'),
('732uudnl7a17eo9km0f4c0u6f1', 'KOLKATA', '127.0.0.1', '2013-08-30 22:22:39', 'OFF'),
('732uudnl7a17eo9km0f4c0u6f1', 'admin', '127.0.0.1', '2013-08-30 22:22:51', 'OFF'),
('732uudnl7a17eo9km0f4c0u6f1', 'KOLKATA', '127.0.0.1', '2013-08-30 22:23:15', 'ON'),
('ggm99el54sd7hu67c099hr53h6', 'admin', '127.0.0.1', '2013-08-31 10:37:34', 'ON'),
('lsq4hpsu7k6vru596e83vs42q1', 'admin', '127.0.0.1', '2013-08-31 11:13:43', 'ON'),
('uii5foehjis4806bpfk4sfbjt4', 'admin', '127.0.0.1', '2013-09-01 10:58:49', 'ON'),
('15vuv9hpvr5ot8mr5s7pht6ih4', 'admin', '127.0.0.1', '2013-09-01 19:15:43', 'ON'),
('j4lbu765jq7pm2gsm6f9lqfie5', 'admin', '127.0.0.1', '2013-09-02 13:35:53', 'ON'),
('c5ltqtvbv6lbfobrbg37a5nl44', 'admin', '127.0.0.1', '2013-09-03 11:52:18', 'ON'),
('od9f27bt62edobjp4os0fqbpj0', 'admin', '127.0.0.1', '2013-09-05 19:35:23', 'ON'),
('n4mdu5n2057oei8cqk81dvokd2', 'admin', '127.0.0.1', '2013-09-06 10:46:08', 'ON'),
('lbbm24k6ku69nph1u6o2voil81', 'admin', '127.0.0.1', '2013-09-06 13:36:47', 'ON'),
('qvcva2a8n25pdtmagml1445s01', 'admin', '127.0.0.1', '2013-09-06 21:01:27', 'ON'),
('qvcva2a8n25pdtmagml1445s01', 'admin', '127.0.0.1', '2013-09-07 00:35:29', 'ON'),
('9mnesjk0ioq4edn2aok6psega6', 'admin', '127.0.0.1', '2013-09-09 10:41:58', 'ON'),
('a3pj8h0b2ol8ai8u9gh7gdh5t5', 'admin', '127.0.0.1', '2013-09-10 11:29:28', 'ON'),
('f0tvm6tbi20oc6u34acqdeavd2', 'admin', '127.0.0.1', '2013-09-10 12:47:32', 'ON'),
('779qffi0d159lvfvc4ugdrfjd2', 'admin', '127.0.0.1', '2013-09-13 12:51:02', 'ON'),
('pam7apjnnlp5l5cmoej2n3v4q4', 'admin', '127.0.0.1', '2013-09-14 11:50:27', 'OFF'),
('pam7apjnnlp5l5cmoej2n3v4q4', 'abc', '127.0.0.1', '2013-09-14 11:52:23', 'OFF'),
('pam7apjnnlp5l5cmoej2n3v4q4', 'admin', '127.0.0.1', '2013-09-14 12:04:28', 'OFF'),
('pam7apjnnlp5l5cmoej2n3v4q4', 'abc', '127.0.0.1', '2013-09-14 12:05:22', 'OFF'),
('pam7apjnnlp5l5cmoej2n3v4q4', 'admin', '127.0.0.1', '2013-09-14 12:05:29', 'OFF'),
('pam7apjnnlp5l5cmoej2n3v4q4', 'abc', '127.0.0.1', '2013-09-14 12:05:56', 'OFF'),
('pam7apjnnlp5l5cmoej2n3v4q4', 'admin', '127.0.0.1', '2013-09-14 12:07:40', 'OFF'),
('pam7apjnnlp5l5cmoej2n3v4q4', 'abc', '127.0.0.1', '2013-09-14 12:10:08', 'OFF'),
('pam7apjnnlp5l5cmoej2n3v4q4', 'admin', '127.0.0.1', '2013-09-14 12:11:21', 'OFF'),
('pam7apjnnlp5l5cmoej2n3v4q4', 'admin', '127.0.0.1', '2013-09-14 12:12:53', 'ON'),
('35mfklfnj4nph631t2i178c6t1', 'admin', '127.0.0.1', '2013-09-17 23:17:58', 'ON'),
('la2s9n2p4c4bqusd9rt3032de7', 'admin', '127.0.0.1', '2013-09-20 22:18:25', 'ON'),
('iam1sajichpc57nqhflg1c3p74', 'admin', '127.0.0.1', '2013-09-21 11:51:20', 'ON'),
('n17vpdfnr8p44l32l295rrq034', 'admin', '127.0.0.1', '2013-09-21 18:44:29', 'ON'),
('4aoiqe1ichc181pvnkipq4ah31', 'admin', '127.0.0.1', '2013-09-21 18:56:33', 'ON'),
('tkd74j43fbpb9fs973abtio3j5', 'admin', '127.0.0.1', '2013-09-22 10:56:46', 'ON'),
('9mrbutc00h8he66cmbdje7pv15', 'admin', '127.0.0.1', '2013-09-22 20:39:52', 'ON'),
('0qin31tig5nnc4p5n3upcs8303', 'admin', '127.0.0.1', '2013-09-23 19:21:26', 'ON'),
('0qin31tig5nnc4p5n3upcs8303', 'admin', '127.0.0.1', '2013-09-23 20:04:59', 'ON'),
('l1e94tjm4ubgs2fko2am26n0m4', 'admin', '127.0.0.1', '2013-09-28 11:50:08', 'ON'),
('gg09s17corjje7uslk319u7mn0', 'admin', '127.0.0.1', '2013-09-28 14:10:07', 'ON'),
('uce450i98fc4kc5ghpf6mvkn26', 'admin', '127.0.0.1', '2013-09-29 12:22:06', 'ON'),
('6kthn17a91tgib5oa13uvu6uc3', 'admin', '127.0.0.1', '2013-10-05 20:08:28', 'ON'),
('le9bgqn6au93bcrcnv89plao83', 'admin', '127.0.0.1', '2013-10-06 11:38:39', 'ON'),
('0c2h677lcmitkcgme1nsu8k576', 'admin', '127.0.0.1', '2013-10-14 19:15:36', 'ON');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SubCatId` varchar(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `title_description` varchar(200) NOT NULL,
  `images` varchar(500) NOT NULL,
  `doocument` varchar(500) NOT NULL,
  `details` varchar(50000) NOT NULL,
  `price` varchar(20) NOT NULL,
  `startingdate` varchar(20) NOT NULL,
  `closingdate` varchar(20) NOT NULL,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `SubCatId`, `title`, `title_description`, `images`, `doocument`, `details`, `price`, `startingdate`, `closingdate`, `status`) VALUES
(1, '47', 'kasdh askdh', 'ljsad lajsd', 'banner_id_1.jpg', 'doc_id_1.docx', '<p>kacla alsja lasj</p>\r\n', '98765', '9-10-2012', '', 'Active'),
(2, '47', 'xxx111', 'jjj jjj jj', 'banner_id_2.jpg', 'doc_id_2.pdf', '<p>nnnnw n nnnn nnn nnnnn nnnn nnnnn nnnnn nnnn nnnnnnnn nnnn nnn nnn</p>\r\n', '87123', '9-10-2012', '', 'Active'),
(3, '48', 'aaaaa1', 'mmm mmm mm', 'banner_id_3.jpg', 'doc_id_3.docx', '<p>mm mmm mmmm mmm mmm mmm mmmm mmm mmm mmm mmm mmm mmmmmmm mmmm mmmm mmm mmm mmmmm mmm mmmmmm mmmmm mmmmmm mmmm</p>\r\n', '98765', '9-10-2012', '', 'Active'),
(4, '48', 'bbb bb', 'asdasd asas', 'project_image4.jpg', 'project_doc4.docx', '<p>kaad akfa adfad adfadfa fqfqfq efwwefwferfrw</p>\r\n', '999999', '9-10-2012', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `project_gallary`
--

CREATE TABLE IF NOT EXISTS `project_gallary` (
  `size_price_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `size` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `totsqft` decimal(7,2) NOT NULL,
  `totprice` decimal(11,2) NOT NULL,
  `product_type` text NOT NULL,
  `wt` varchar(15) NOT NULL,
  `prdtype` varchar(100) NOT NULL,
  `flatno` varchar(20) NOT NULL,
  PRIMARY KEY (`size_price_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

-- --------------------------------------------------------

--
-- Table structure for table `publicwork`
--

CREATE TABLE IF NOT EXISTS `publicwork` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SubCatId` varchar(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `images` varchar(500) NOT NULL,
  `doocument` varchar(500) NOT NULL,
  `details` varchar(50000) NOT NULL,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `publicwork`
--

INSERT INTO `publicwork` (`id`, `SubCatId`, `title`, `images`, `doocument`, `details`, `status`) VALUES
(1, '43', '123xxx', 'banner_id_1.jpg', 'doc_id_1.docx', '<p>proz<br />\r\n&nbsp;</p>\r\n', 'Active'),
(2, '43', 'asdas 123', 'banner_id_2.jpg', 'doc_id_2.pdf', '<p>ocudv9dvy qouf9qe q9ufuq</p>\r\n', 'Active'),
(3, '43', 'uhsdiausd ojwdq', 'banner_id_3.jpg', 'doc_id_3.docx', '<p>lksv pwkfw</p>\r\n', 'Active'),
(4, '43', 'bbb bb', 'banner_id_4.jpg', 'doc_id_4.docx', '<p>ksdv psdkvsd</p>\r\n', 'Active'),
(5, '43', 'xxxxxxxxxxxxxxxxxxx', 'banner_id_5.png', '', '<p>;alscma apks;casp ascaps pfj qpfq pifqefwewoeuf wefnwjoe wefnwoeu ewfwe</p>\r\n', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `p_webmaster`
--

CREATE TABLE IF NOT EXISTS `p_webmaster` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `usertype` int(11) DEFAULT '1',
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `contact` varchar(200) DEFAULT NULL,
  `status` enum('A','I','D') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`a_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `p_webmaster`
--

INSERT INTO `p_webmaster` (`a_id`, `user_name`, `user_pass`, `usertype`, `name`, `email`, `contact`, `status`) VALUES
(1, 'admin', 'TVRJeg', 1, 'Maha Raja', 'parijatgh@gmail.com', NULL, 'A'),
(2, 'som', 'TVRJeg', 1, 'Maha Raja', 'parijatgh@gmail.com', NULL, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SubCatId` varchar(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `images` varchar(500) NOT NULL,
  `doocument` varchar(500) NOT NULL,
  `details` varchar(50000) NOT NULL,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `SubCatId`, `title`, `images`, `doocument`, `details`, `status`) VALUES
(1, '45', 'Birth & Death ', 'banner_id_1.jpg', 'doc_id_1.docx', '<p>Issuing New Birth Certificate : Within 7 Days.</p>\n\n<p>Issuing Death Certificate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Within 7 Days</p>\n', 'Active'),
(2, '45', 'asdas 123', 'banner_id_2.jpg', 'doc_id_2.pdf', '<p>ocudv9dvy qouf9qe q9ufuq</p>\r\n', 'Active'),
(3, '45', 'uhsdiausd ojwdq', 'banner_id_3.jpg', 'doc_id_3.docx', '<p>lksv pwkfw</p>\r\n', 'Active'),
(4, '45', 'bbb bb', 'banner_id_4.jpg', 'doc_id_4.docx', '<p>ksdv psdkvsd</p>\r\n', 'Active'),
(5, '45', 'xxxxxxxxxxxxxxxxxxx', 'service_image5.jpg', 'service_doc5.jpg', '<p>;alscma apks;casp ascaps pfj qpfq pifqefwewoeuf wefnwjoe wefnwoeu ewfwe</p>\r\n', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(15) NOT NULL,
  `subcat_name` varchar(255) NOT NULL,
  `Image` varchar(500) NOT NULL,
  `catdesc` varchar(300) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'N',
  `titletag` varchar(200) NOT NULL,
  `titledesc` varchar(200) NOT NULL,
  `titlekey` varchar(200) NOT NULL,
  `orderby` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `cat_id`, `subcat_name`, `Image`, `catdesc`, `status`, `titletag`, `titledesc`, `titlekey`, `orderby`) VALUES
(55, 11, 'Dhuliyan Darsha', '', '', '', '', '', '', 0),
(54, 11, 'HOLIDAYS', '', '', '', '', '', '', 0),
(53, 11, 'APL LIST', '', '', '', '', '', '', 0),
(52, 11, 'VOTER LISR', '', '', '', '', '', '', 0),
(51, 11, 'BPL LIST', '', '', '', '', '', '', 0),
(50, 9, 'CONTACTUS', '', '', '', '', '', '', 0),
(49, 10, 'Tender', '', '', '', '', '', '', 0),
(48, 8, 'Upcoming Project', '', '', '', '', '', '', 0),
(47, 8, 'Current Project', '', '', '', '', '', '', 0),
(46, 7, 'GALLARY', 'subcat_image46.jpg', '', 'Active', '', '0', '', 0),
(45, 6, 'SERVICES', '', '', '', '', '', '', 0),
(95, 5, 'ACCOUNTS', '', '', 'Active', '', '0', '', 0),
(43, 3, 'PUBLIC WORK', '', '', '', '', '', '', 0),
(42, 2, 'Chairman of Dhuliyan Municipality', '', '', 'Active', '', '0', '', 0),
(41, 1, 'Welcome', '', '', '', '', '', '', 0),
(40, 1, 'Chairman', '', '', '', '', '', '', 0),
(56, 11, 'Telephone Number', '', '', '', '', '', '', 0),
(57, 2, 'VICE-CHAIRMAN', '', '', '', '', '', '', 0),
(58, 2, 'HEAD-CLARK', '', '', '', '', '', '', 0),
(59, 1, 'Total staff strength', '', '', '', '', '', '', 0),
(88, 2, 'SUB ASST. ENGINEER', '', '', 'Active', '', '0', '', 0),
(86, 2, 'EXECUTIVE OFFICER', '', '', 'Active', '', '0', '', 0),
(87, 2, 'ASST. ENGINEER', '', '', 'Active', '', '0', '', 0),
(66, 12, 'Important Announcement', '', '', '', '', '', '', 0),
(67, 13, 'Header Gallary', '', '', '', '', '', '', 0),
(73, 5, 'Street Light ', 'pic_id_73.jpg', '', 'Active', '', '0', '', 0),
(72, 5, 'Education', 'pic_id_72.jpg', '', 'Active', '', '0', '', 0),
(74, 5, 'Store Department ', 'pic_id_74.jpg', '', 'Active', '', '0', '', 0),
(75, 5, 'Water Supply', 'pic_id_75.jpg', '', 'Active', '', '0', '', 0),
(76, 5, 'Birth & Death Resgistration ', 'pic_id_76.jpg', '', 'Active', '', '0', '', 0),
(82, 5, 'Health Wings', 'pic_id_82.jpg', '', 'Active', '', '0', '', 0),
(83, 5, 'Conservancy Department', '', '', 'Active', '', '0', '', 0),
(85, 5, 'Trade License', '', '', 'Active', '', '0', '', 0),
(90, 2, 'A.F.C.', '', '', 'Active', '', '0', '', 0),
(91, 2, 'IT CO-ORDINATOR', '', '', 'Active', '', '0', '', 0),
(92, 2, 'COUNCILLORS', '', '', 'Active', '3', '0', '', 0),
(94, 5, 'SJSRY', '', '', 'Active', '', '0', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tender`
--

CREATE TABLE IF NOT EXISTS `tender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tender_title` varchar(200) NOT NULL,
  `tender_key` varchar(200) NOT NULL,
  `depertment` varchar(11) NOT NULL,
  `details` varchar(50000) NOT NULL,
  `images` varchar(200) NOT NULL,
  `doocument` varchar(200) NOT NULL,
  `startingdate` date NOT NULL,
  `closingdate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_mstr`
--

CREATE TABLE IF NOT EXISTS `user_mstr` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `logintype` varchar(20) NOT NULL,
  `user_location` varchar(50) NOT NULL,
  `user_address` text NOT NULL,
  `user_contact_no` varchar(50) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `branch_owner` varchar(50) NOT NULL,
  `branch_user_id` varchar(30) NOT NULL,
  `branch_code` varchar(8) NOT NULL,
  `branch_srl` int(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `user_mstr`
--

INSERT INTO `user_mstr` (`user_id`, `user_name`, `password`, `logintype`, `user_location`, `user_address`, `user_contact_no`, `branch_id`, `branch_owner`, `branch_user_id`, `branch_code`, `branch_srl`) VALUES
(1, 'admin', 'admin', 'super', 'sssss', '						', '24', 0, 'HO', '', 'HO1', 14),
(37, 'KOLKATA', 'KOLKATA', 'branch', 'KOLKATA', '', '', 1, 'KOLKATA', '1', 'KOL1', 1),
(38, 'NOKHA', 'NOKHA', 'branch', 'NOKHA ( BIHAR)', '', '', 1, 'NOKHA', '1', 'NOK2', 1),
(39, 'SHAMASTIPUR', 'SHAMASTIPUR', 'branch', 'SHAMASTIPUR', '', '', 1, 'SHAMASTIPUR', '1', 'SHA3', 1),
(40, 'KANPUR', 'KANPUR', 'branch', 'KANPUR (UP)', '', '', 1, 'KANPUR', '1', 'KAN4', 1),
(41, 'BADARPUR', 'BADARPUR', 'branch', 'BADARPUR (DELHI)', '', '', 1, 'BADARPUR', '1', 'BAD5', 1),
(42, 'ALIGARH', 'ALIGARH', 'branch', 'ALIGARH (UP)', '', '', 1, 'ALIGARH', '1', 'ALI6', 1),
(43, 'MATHURAPUR', 'MATHURAPUR', 'branch', 'MATHURAPUR (W.B)', '', '', 1, 'MATHURAPUR', '1', 'MAT7', 1),
(44, '1', '1', 'super', 'admin', '1', '1', 1, 'aa', '1', 'aa1', 11),
(45, 'abc', 'abc', 'branch', 'abc', '', '1', 1, 'abc', '1', 'abc', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
