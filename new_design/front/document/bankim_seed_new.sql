-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 05, 2019 at 02:02 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bankim_seed_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_test`
--

CREATE TABLE IF NOT EXISTS `blood_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_name` varchar(100) NOT NULL,
  `test_price` double(10,2) NOT NULL,
  `Pre_test_Information` varchar(100) NOT NULL,
  `Report_Delivery` varchar(50) NOT NULL,
  `test_type` varchar(50) NOT NULL DEFAULT 'INDIVIDUAL_TEST',
  `status` varchar(20) NOT NULL DEFAULT 'INACTIVE',
  `GROUPID` int(10) NOT NULL,
  `srl_order` int(10) NOT NULL,
  `ItemID` varchar(30) NOT NULL,
  `PARAMETERS` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1754 ;

--
-- Dumping data for table `blood_test`
--

INSERT INTO `blood_test` (`id`, `test_name`, `test_price`, `Pre_test_Information`, `Report_Delivery`, `test_type`, `status`, `GROUPID`, `srl_order`, `ItemID`, `PARAMETERS`) VALUES
(1436, 'Fasting glucose', 70.00, '', '', 'GROUP_TEST', 'ACTIVE', 12, 3, '', ''),
(1437, '2 hours PP Glucose', 70.00, '', '', 'GROUP_TEST', 'ACTIVE', 6, 2, '', ''),
(1438, 'HbA1c', 550.00, '', '', 'GROUP_TEST', 'ACTIVE', 11, 2, '', ''),
(1439, 'Urea', 130.00, '', '', 'GROUP_TEST', 'ACTIVE', 12, 4, '', ''),
(1440, 'Creatinine', 150.00, '', '', 'GROUP_TEST', 'ACTIVE', 12, 5, '', ''),
(1441, 'Total Cholesterol', 160.00, '', '', 'GROUP_TEST', 'ACTIVE', 14, 2, '', ''),
(1442, 'Triglyceride', 220.00, '', '', 'GROUP_TEST', 'ACTIVE', 14, 1, '', ''),
(1443, 'Urine R/E', 140.00, '', '', 'GROUP_TEST', 'ACTIVE', 12, 10, '', ''),
(1444, 'Urinary ACR', 500.00, '', '', 'GROUP_TEST', 'ACTIVE', 6, 13, '', ''),
(1445, 'Doctor Consultation', 200.00, '', '', 'GROUP_TEST', 'ACTIVE', 14, 9, '', ''),
(1446, 'Dietician Consultation', 100.00, '', '', 'GROUP_TEST', 'ACTIVE', 14, 10, '', ''),
(1447, 'Uric acid', 120.00, '', '', 'GROUP_TEST', 'ACTIVE', 11, 5, '', ''),
(1448, 'Sodium', 160.00, '', '', 'GROUP_TEST', 'ACTIVE', 6, 5, '', ''),
(1449, 'Potassium', 160.00, '', '', 'GROUP_TEST', 'ACTIVE', 6, 6, '', ''),
(1450, 'Chloride', 150.00, '', '', 'GROUP_TEST', 'ACTIVE', 6, 7, '', ''),
(1451, 'Complete Blood Count', 250.00, '', '', 'GROUP_TEST', 'ACTIVE', 12, 1, '', ''),
(1452, 'Calcium', 180.00, '', '', 'GROUP_TEST', 'ACTIVE', 12, 6, '', ''),
(1453, 'Inorganic Phosphorus', 300.00, '', '', 'GROUP_TEST', 'ACTIVE', 12, 7, '', ''),
(1454, 'USG lower abdomen', 700.00, '', '', 'GROUP_TEST', 'ACTIVE', 2, 13, '', ''),
(1455, 'Total Protein', 300.00, '', '', 'GROUP_TEST', 'ACTIVE', 13, 4, '', ''),
(1456, 'Albumin', 140.00, '', '', 'GROUP_TEST', 'ACTIVE', 13, 5, '', ''),
(1457, 'Globulin', 0.00, '', '', 'GROUP_TEST', 'ACTIVE', 13, 6, '', ''),
(1458, 'A:G Ratio', 0.00, '', '', 'GROUP_TEST', 'ACTIVE', 2, 17, '', ''),
(1459, 'Haemoglobin', 80.00, '', '', 'GROUP_TEST', 'ACTIVE', 3, 1, '', ''),
(1460, 'Hb HPLC', 1000.00, '', '', 'GROUP_TEST', 'ACTIVE', 12, 2, '', ''),
(1462, 'Anti -HCV', 500.00, '', '', 'GROUP_TEST', 'ACTIVE', 3, 4, '', ''),
(1463, 'Blood Group', 100.00, '', '', 'GROUP_TEST', 'ACTIVE', 12, 8, '', ''),
(1464, 'HIV', 500.00, '', '', 'GROUP_TEST', 'ACTIVE', 3, 6, '', ''),
(1465, 'Random glucose', 70.00, '', '', 'GROUP_TEST', 'ACTIVE', 3, 7, '', ''),
(1467, 'RA Factor', 500.00, '', '', 'GROUP_TEST', 'ACTIVE', 4, 6, '', ''),
(1468, 'CRP', 500.00, '', '', 'GROUP_TEST', 'ACTIVE', 4, 7, '', ''),
(1469, 'ASO', 500.00, '', '', 'GROUP_TEST', 'ACTIVE', 4, 8, '', ''),
(1470, 'Anti-CCP', 1300.00, '', '', 'GROUP_TEST', 'ACTIVE', 4, 9, '', ''),
(1471, '25-hydroxy Vitamin D', 1200.00, '', '', 'GROUP_TEST', 'ACTIVE', 4, 10, '', ''),
(1472, 'X-ray of both knees', 600.00, '', '', 'GROUP_TEST', 'ACTIVE', 4, 11, '', ''),
(1473, '(AP & Lateral)', 0.00, '', '', 'GROUP_TEST', 'ACTIVE', 4, 16, '', ''),
(1474, 'X-ray of cervical spine', 420.00, '', '', 'GROUP_TEST', 'ACTIVE', 4, 13, '', ''),
(1475, 'X-ray of Lumbo-sacral spine', 420.00, '', '', 'GROUP_TEST', 'ACTIVE', 4, 15, '', ''),
(1476, 'Iron', 500.00, '', '', 'GROUP_TEST', 'ACTIVE', 5, 3, '', ''),
(1477, 'Tibc', 500.00, '', '', 'GROUP_TEST', 'ACTIVE', 5, 4, '', ''),
(1478, 'Iron saturation', 0.00, '', '', 'GROUP_TEST', 'ACTIVE', 5, 5, '', ''),
(1479, 'Ferritin', 800.00, '', '', 'GROUP_TEST', 'ACTIVE', 5, 6, '', ''),
(1480, 'G6PD', 400.00, '', '', 'GROUP_TEST', 'ACTIVE', 5, 7, '', ''),
(1481, 'Vitamin B12', 1000.00, '', '', 'GROUP_TEST', 'ACTIVE', 5, 8, '', ''),
(1482, 'Folate', 1200.00, '', '', 'GROUP_TEST', 'ACTIVE', 5, 9, '', ''),
(1483, 'Magnesium', 300.00, '', '', 'GROUP_TEST', 'ACTIVE', 6, 8, '', ''),
(1484, 'SGPT', 150.00, '', '', 'GROUP_TEST', 'ACTIVE', 13, 9, '', ''),
(1697, 'WBC-Total Counts Leucocytes Blood', 180.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI471', '1 PARAMETER COVERED'),
(1486, 'ECG', 200.00, '', '', 'GROUP_TEST', 'ACTIVE', 11, 18, '', ''),
(1487, 'Chest Xray', 600.00, '', '', 'GROUP_TEST', 'ACTIVE', 6, 20, '', ''),
(1488, '(PA & Lateral views)', 0.00, '', '', 'GROUP_TEST', 'ACTIVE', 6, 21, '', ''),
(1489, 'FT3', 400.00, '', '', 'GROUP_TEST', 'ACTIVE', 7, 2, '', ''),
(1490, 'FT4', 480.00, '', '', 'GROUP_TEST', 'ACTIVE', 7, 3, '', ''),
(1491, 'Anti-TPO antibody', 1000.00, '', '', 'GROUP_TEST', 'ACTIVE', 7, 4, '', ''),
(1492, 'Anti HCV', 600.00, '', '', 'GROUP_TEST', 'ACTIVE', 13, 13, '', ''),
(1493, 'HIV 1 & 2 Antibody', 500.00, '', '', 'GROUP_TEST', 'ACTIVE', 8, 3, '', ''),
(1494, 'VDRL', 130.00, '', '', 'GROUP_TEST', 'ACTIVE', 8, 4, '', ''),
(1495, 'Prothrombin Time, INR', 220.00, '', '', 'GROUP_TEST', 'ACTIVE', 9, 1, '', ''),
(1497, 'BT CT', 80.00, '', '', 'GROUP_TEST', 'ACTIVE', 9, 3, '', ''),
(1498, 'APTT', 440.00, '', '', 'GROUP_TEST', 'ACTIVE', 9, 4, '', ''),
(1499, 'SGOT', 150.00, '', '', 'GROUP_TEST', 'ACTIVE', 13, 8, '', ''),
(1500, 'CPK', 400.00, '', '', 'GROUP_TEST', 'ACTIVE', 10, 2, '', ''),
(1501, 'CK MB', 500.00, '', '', 'GROUP_TEST', 'ACTIVE', 10, 3, '', ''),
(1502, 'LDH', 500.00, '', '', 'GROUP_TEST', 'ACTIVE', 10, 4, '', ''),
(1503, 'Echocardiography ', 1000.00, '', '', 'GROUP_TEST', 'ACTIVE', 10, 6, '', ''),
(1504, 'A : G Ratio', 0.00, '', '', 'GROUP_TEST', 'ACTIVE', 13, 7, '', ''),
(1505, 'HDL Cholesterol', 240.00, '', '', 'GROUP_TEST', 'ACTIVE', 11, 12, '', ''),
(1507, 'Triglycerides', 220.00, '', '', 'GROUP_TEST', 'ACTIVE', 11, 14, '', ''),
(1508, 'Chest X-ray (PA & Lateral View)', 600.00, '', '', 'GROUP_TEST', 'ACTIVE', 12, 12, '', ''),
(1509, 'USG Whole Abdomen', 1000.00, '', '', 'GROUP_TEST', 'ACTIVE', 11, 20, '', ''),
(1510, 'Urine for R/E', 140.00, '', '', 'GROUP_TEST', 'ACTIVE', 11, 21, '', ''),
(1511, 'Stool R/E', 140.00, '', '', 'GROUP_TEST', 'ACTIVE', 12, 11, '', ''),
(1512, 'Bilirubin (total)', 150.00, '', '', 'GROUP_TEST', 'ACTIVE', 13, 1, '', ''),
(1513, 'Bilirubin (direct)', 0.00, '', '', 'GROUP_TEST', 'ACTIVE', 13, 2, '', ''),
(1514, 'Bilirubin (indirect)', 0.00, '', '', 'GROUP_TEST', 'ACTIVE', 13, 3, '', ''),
(1515, 'Alkaline Phosphatase', 190.00, '', '', 'GROUP_TEST', 'ACTIVE', 13, 10, '', ''),
(1516, 'GGT', 350.00, '', '', 'GROUP_TEST', 'ACTIVE', 13, 11, '', ''),
(1517, 'HDL Cholesterol(Direct)', 240.00, '', '', 'GROUP_TEST', 'ACTIVE', 14, 3, '', ''),
(1518, 'LDL Cholesterol(Direct)', 280.00, '', '', 'GROUP_TEST', 'ACTIVE', 14, 4, '', ''),
(1696, 'TOXIC GRANULES', 80.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI3680', '1 PARAMETER COVERED'),
(1520, 'Non - HDL Cholesterol', 0.00, '', '', 'GROUP_TEST', 'ACTIVE', 14, 6, '', ''),
(1521, 'LDL Cholesterol : HDL Cholesterol Ratio', 0.00, '', '', 'GROUP_TEST', 'ACTIVE', 14, 7, '', ''),
(1522, 'Total Cholesterol : HDL Cholesterol Ratio', 0.00, '', '', 'GROUP_TEST', 'ACTIVE', 14, 8, '', ''),
(1695, 'Reticulocyte Count', 150.00, 'NO SPECIAL PRAPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI507', '1 PARAMETER COVERED'),
(1694, 'Prothrombin Time (PT)', 220.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI459', '6 PARAMETERS COVERED'),
(1693, 'Platelet Count', 110.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI478', '1 PARAMETER COVERED'),
(1692, 'PCV', 150.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI3688', '1 PARAMETER COVERED'),
(1691, 'MP (THICK & THIN)', 120.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI3715', '1 PARAMETER COVERED'),
(1690, 'Malarial Antigen Test (P.Vivax, P.Falciperum)', 500.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI905', '2 PARAMETERS COVERED'),
(1689, 'Malaria Parasite', 120.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI483', '1 PARAMETER COVERED'),
(1688, 'HB, TC, DC, ESR WITH MP', 330.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI4000', '11 PARAMETERS COVERED'),
(1687, 'THALASSEMIA(HPLC)', 1000.00, 'NO SPECIAL PREPARATION REQUIRED', 'MONDAY,WEDNESDAY,FRIDAY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI607', '8 PARAMETERS COVERED'),
(1686, 'HB , TC , DC , ESR', 180.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI3687', '10 PARAMETERS COVERED'),
(1685, 'Complete haemogram', 250.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI464', '16 PARAMETERS COVERED'),
(1684, 'CBC WITH MP', 340.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI3999', '17 PARAMETERS COVERED'),
(1683, 'Blood Group ABO & Rh Typing', 100.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI484', '1 PARAMETER COVERED'),
(1682, 'Bleeding Time & Cloting Time - Haematology', 80.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI469', '2 PARAMETERS COVERED'),
(1681, 'BAND CELL', 90.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI3707', '1 PARAMETER COVERED'),
(1680, 'APTT/ PTTK', 440.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI460', '1 PARAMETER COVERED'),
(1679, 'Absolute Eosinophils Count', 110.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI501', '1 PARAMETER COVERED'),
(1678, 'Vitamin D -25 Hydroxy Serum', 1200.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1243', '1 PARAMETER COVERED'),
(1677, 'Vitamin B12 Cyanocobalamin Serum', 1000.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1240', '1 PARAMETER COVERED'),
(1676, 'Thyroid Profile T3,T4,TSH', 650.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI3682', '3 PARAMETERS COVERED'),
(1675, 'Testosterone Total Serum', 750.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI937', '1 PARAMETER COVERED'),
(1674, 'T4-Total Thyroxine Serum', 270.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1088', '1 PARAMETER COVERED'),
(1673, 'T4 & TSH', 540.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI3693', '2 PARAMETERS COVERED'),
(1672, 'TSH', 300.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, '0', '1 PARAMETER COVERED'),
(1671, 'T4', 270.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, '0', '1 PARAMETER COVERED'),
(1670, 'T3-Total Tri Iodothyronine Serum', 270.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1087', '1 PARAMETER COVERED'),
(1669, 'T3 & TSH', 540.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI3692', '2 PARAMETERS COVERED'),
(1668, 'PTH (Intact) - Hormone Assays', 1400.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI946', '1 PARAMETER COVERED'),
(1667, 'PSA-total Prostate Specific Antigen, total Serum', 700.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1078', '1 PARAMETER COVERED'),
(1666, 'PSA-Free Prostate Specific Antigen Free, Total Serum', 1000.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1081', '1 PARAMETER COVERED'),
(1665, 'Prolactin Serum', 450.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI933', '1 PARAMETER COVERED'),
(1664, 'LH', 450.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, '0', '1 PARAMETER COVERED'),
(1663, 'Insulin Post Prandial Serum', 750.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI3074', '1 PARAMETER COVERED'),
(1662, 'Insulin Fasting', 750.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI3073', '1 PARAMETER COVERED'),
(1661, 'FT4 & TSH', 720.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI4004', '2 PARAMETERS COVERED'),
(1660, 'FSH-Follicle Stimulating Hormone CMIA Serum', 450.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI930', '1 PARAMETER COVERED'),
(1659, 'FSH , LH & PROLACTIN', 1200.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI4005', '3 PARAMETERS COVERED'),
(1658, 'Free T4 Serum', 480.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1086', '1 PARAMETER COVERED'),
(1657, 'Free T3 Serum', 400.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1085', '1 PARAMETER COVERED'),
(1656, 'Free Testosterone', 1500.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI936', '1 PARAMETER COVERED'),
(1655, 'Ferritin Serum', 800.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1217', '1 PARAMETER COVERED'),
(1654, 'DHEAS Dehydroepiandrostenedione Sulphate Serum', 1000.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI940', '1 PARAMETER COVERED'),
(1653, 'CA-19.9 CMIA Serum', 1300.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1072', '1 PARAMETER COVERED'),
(1652, 'CA 125', 1000.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1070', '1 PARAMETER COVERED'),
(1651, 'Beta HCG Serum', 550.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1004', '1 PARAMETER COVERED'),
(1650, 'Anti TPO (Thyroid Peroxidase) Antibody - Auto - Immune Test Menu', 1000.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1102', '1 PARAMETER COVERED'),
(1649, 'Anti Nuclear Antibody (ELISA) Serum', 550.00, 'EMPTY STOMACH PREFERABLE', 'MONDAY,WEDDAY,FRIDAY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1224', '1 PARAMETER COVERED'),
(1648, 'Anti CCP', 1300.00, 'EMPTY STOMACH PREFERABLE', 'SUNDAY,TUEDAY,FRIDAY,SATURDAY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1108', '1 PARAMETER COVERED'),
(1647, 'AMH Mullerian Inhibiting Substance Serum', 1500.00, 'EMPTY STOMACH PREFERABLE', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1002', '1 PARAMETER COVERED'),
(1646, 'Widal Test', 160.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1383', '4 PARAMETERS COVERED'),
(1645, 'VDRL Serum', 130.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1374', '1 PARAMETER COVERED'),
(1644, 'Typhi dot IgM & IgG', 570.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1387', '1 PARAMETER COVERED'),
(1643, 'HBsAg', 300.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI966', '1 PARAMETER COVERED'),
(1642, 'DENGUE NS1 ANTIGEN SERUM (ELISA)', 700.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI3895', '1 PARAMETER COVERED'),
(1641, 'DENGUE FEVER PROFILE(NS1,IGG &IGM)ELISA', 1800.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI3876', '3 PARAMETERS COVERED'),
(1640, 'Dengue IgM antibody Serum (ELISA)', 700.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI892', '1 PARAMETER COVERED'),
(1639, 'Dengue IgG antibody Serum (ELISA)', 700.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI891', '1 PARAMETER COVERED'),
(1638, 'Chikungunya IgM antibody Serum', 1000.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI895', '1 PARAMETER COVERED'),
(1637, 'ASO Titre', 500.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI3708', '1 PARAMETER COVERED'),
(1636, 'Anti HCV (By card) - Hepatitis Serology', 600.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI989', '1 PARAMETER COVERED'),
(1698, 'Haemogram', 250.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, '0', '16 PARAMETERS COVERED'),
(1699, 'Albumin Serum', 140.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI669', '1 PARAMETER COVERED'),
(1700, 'Albumin:Creatinine Ratio - URINE', 500.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1420', '3 PARAMETERS COVERED'),
(1701, 'Alkaline phosphatase Serum', 190.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI674', '1 PARAMETER COVERED'),
(1702, 'Allergy Blood', 2000.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI3702', '0'),
(1703, 'Amylase Serum', 400.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI698', '1 PARAMETER COVERED'),
(1704, 'Bilirubin Total, Direct, Indirect Serum', 150.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI679', '3 PARAMETERS COVERED'),
(1705, 'Blood Glucose Fasting (FBG)', 70.00, 'OVERNIGHT FASTING', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI647', '1 PARAMETER COVERED'),
(1706, 'Blood Glucose Post Prandial (75 gm glucose)', 70.00, 'AFTER 2 HOURS OF CONSUMPTION OF 82.5gm GLUCOSE ', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI3700', '1 PARAMETER COVERED'),
(1707, 'Blood Glucose Post Prandial (PPBG)', 70.00, 'AFTER 2 HOURS OF LUNCH', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI648', '1 PARAMETER COVERED'),
(1708, 'Blood Glucose Random (RBG)', 70.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI650', '1 PARAMETER COVERED'),
(1709, 'Blood Urea Nitrogen(BUN)', 150.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI3067', '1 PARAMETER COVERED'),
(1710, 'C - Reactive Protein (Quantitative)', 500.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI714', '1 PARAMETER COVERED'),
(1711, 'Calcium Serum', 180.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI689', '1 PARAMETER COVERED'),
(1712, 'Chloride Serum', 150.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI688', '1 PARAMETER COVERED'),
(1713, 'Cholesterol-Total Serum', 160.00, '12 HOURS FASTING', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI651', '1 PARAMETER COVERED'),
(1714, 'CK -MB Serum', 500.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI717', '1 PARAMETER COVERED'),
(1715, 'CPK Total Serum', 400.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI710', '1 PARAMETER COVERED'),
(1716, 'Creatinine Clearance test Serum and urine', 650.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1434', '5 PARAMETERS COVERED'),
(1717, 'Creatinine Serum', 150.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI684', '1 PARAMETER COVERED'),
(1718, 'eGFR (Estimated Glomerular Filtration Rate)', 500.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI2900', '2 PARAMETERS COVERED'),
(1719, 'G-6PD (Quantitative)', 400.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, '0', '2 PARAMETERS COVERED'),
(1720, 'Electrolytes Serum', 400.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI628', '3 PARAMETERS COVERED'),
(1721, 'GGTP Gamma GT Serum', 350.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI670', '1 PARAMETER COVERED'),
(1722, 'HBA1C Glycosylated Haemoglobin(HPLC)', 550.00, 'NO SPECIAL PREPARATION REQUIRED', 'MONDAY,WEDNESDAY,FRIDAY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI515', '1 PARAMETER COVERED'),
(1723, 'HDL Cholestrol', 240.00, '12 HOURS FASTING', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI3699', '1 PARAMETER COVERED'),
(1724, 'Iron & TIBC Serum', 1000.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI4008', '2 PARAMETERS COVERED'),
(1725, 'Iron (Fe)', 500.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI3135', '1 PARAMETER COVERED'),
(1726, 'Iron Studies - Iron, TIBC,TS% ,Ferritin Serum,', 1700.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI633', '5 PARAMETERS COVERED'),
(1727, 'Kidney Function Test (KFT) - SCH', 800.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI2827', '14 PARAMETERS COVERED'),
(1728, 'LDH Lactate Dehydrogenase Serum', 500.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI692', '1 PARAMETER COVERED'),
(1729, 'LDL Cholesterol', 280.00, '12 HOURS FASTING', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI664', '1 PARAMETER COVERED'),
(1730, 'VLDL Cholesterol', 700.00, '12 HOURS FASTING', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, '0', '1 PARAMETER COVERED'),
(1731, 'Lipase Serum', 500.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI691', '1 PARAMETER COVERED'),
(1732, 'Lipid Profile', 700.00, '12 HOURS FASTING', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI3880', '8 PARAMETERS COVERED'),
(1733, 'Lipid Profile Mini', 650.00, '12 HOURS FASTING', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, '0', '6 PARAMETERS COVERED'),
(1734, 'Liver Function Test', 650.00, 'EMPTY STOMACH', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI624', '11 PARAMETERS COVERED'),
(1735, 'Liver Function Test Mini', 550.00, 'EMPTY STOMACH', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, '0', '10 PARAMETERS COVERED'),
(1736, 'Magnesium Serum', 300.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI695', '1 PARAMETER COVERED'),
(1737, 'Microalbumin / Creatinine Ratio Creatinine Ratio Urine Spot', 500.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1458', '3 PARAMETERS COVERED'),
(1738, 'Phosphorus-Inorganic Serum', 300.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI690', '1 PARAMETER COVERED'),
(1739, 'Potassium Serum', 160.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI687', '1 PARAMETER COVERED'),
(1740, 'Protein Total,Albumin,Globulin and AG Ratio', 300.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI3148', '4 PARAMETERS COVERED'),
(1741, 'RA Factor (Quantitative)', 500.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI713', '1 PARAMETER COVERED'),
(1742, 'SGOT / AST Serum', 150.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI672', '1 PARAMETER COVERED'),
(1743, 'SGPT / ALT Serum', 150.00, 'OVERNIGHT FASTING', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI673', '1 PARAMETER COVERED'),
(1744, 'Sodium Serum', 160.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI686', '1 PARAMETER COVERED'),
(1745, 'Sodium & Potassium', 320.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI699', '2 PARAMETERS COVERED'),
(1746, 'TIBC Biochemical Serum', 500.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI706', '1 PARAMETER COVERED'),
(1747, 'Triglycerides Serum', 220.00, '12 HOURS FASTING', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI652', '1 PARAMETER COVERED'),
(1748, 'Troponin-T', 1400.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI1214', '1 PARAMETER COVERED'),
(1749, 'Urea Serum', 130.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI683', '1 PARAMETER COVERED'),
(1750, 'Urea & Creatinine', 250.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI3670', '2 PARAMETERS COVERED'),
(1751, 'Uric Acid Serum', 120.00, 'OVERNIGHT FASTING', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, 'LSHHI685', '1 PARAMETER COVERED'),
(1752, 'Microalbumin Urine Spot', 450.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, '0', '1 PARAMETER COVERED'),
(1753, 'Total IgE', 680.00, 'NO SPECIAL PREPARATION REQUIRED', 'DAILY', 'INDIVIDUAL_TEST', 'ACTIVE', 0, 0, '0', '1 PARAMETER COVERED');

-- --------------------------------------------------------

--
-- Table structure for table `blood_test_group`
--

CREATE TABLE IF NOT EXISTS `blood_test_group` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(60) NOT NULL,
  `price` double(10,2) NOT NULL,
  `original_price` double(10,2) NOT NULL,
  `discount_price` double(10,2) NOT NULL,
  `Pre_test_Information` varchar(50) NOT NULL,
  `Report_Delivery` varchar(50) NOT NULL,
  `Components` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'ACTIVE',
  `profile_type_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `blood_test_group`
--

INSERT INTO `blood_test_group` (`id`, `group_name`, `price`, `original_price`, `discount_price`, `Pre_test_Information`, `Report_Delivery`, `Components`, `status`, `profile_type_id`) VALUES
(1, 'Diabetic Profile ', 1850.00, 2290.00, 1400.00, '12 Hour Fasting Mandatory', 'Daily', '11', 'ACTIVE', 51),
(2, 'Renal Profile ', 3000.00, 3750.00, 2250.00, 'NA', 'Daily', '19', 'ACTIVE', 50),
(3, 'Pre-marriage Profile', 2650.00, 3300.00, 2000.00, 'NA', 'daily', '11', 'ACTIVE', 51),
(4, 'Arthritis  Profile', 5250.00, 6660.00, 4000.00, 'NA', 'DAILY', '15', 'ACTIVE', 51),
(5, 'Anemia Profile', 4750.00, 5950.00, 3500.00, 'NA', 'Daily', '11', 'ACTIVE', 51),
(6, 'Senior Citizen Profile', 4500.00, 5480.00, 3250.00, 'NA', 'Daily', '22', 'ACTIVE', 51),
(7, 'Thyroid Profile', 2000.00, 2480.00, 1500.00, 'NA', 'Daily', '6', 'ACTIVE', 51),
(8, 'Viral Serology Profile', 1500.00, 1830.00, 1000.00, 'NA', 'Daily', '6', 'ACTIVE', 51),
(9, 'Coagulation Profile', 1000.00, 1150.00, 750.00, 'NA', 'Daily', '6', 'ACTIVE', 51),
(10, 'Cardiac Profile', 2500.00, 3050.00, 2000.00, 'NA', 'Daily', '11', 'ACTIVE', 51),
(11, 'Adult Elite Health Check Up Profile', 4500.00, 5710.00, 3500.00, 'NA', 'Daily', '23', 'ACTIVE', 51),
(12, 'Child Wellbeing Profile', 3000.00, 3660.00, 2500.00, 'NA', 'Daily', '14', 'ACTIVE', 51),
(13, 'Hepatic Profile', 2000.00, 2630.00, 1500.00, 'NA', 'Daily', '15', 'ACTIVE', 51),
(14, 'Lipid Profile', 1250.00, 1450.00, 1000.00, 'NA', 'Daily', '10', 'ACTIVE', 51);

-- --------------------------------------------------------

--
-- Table structure for table `blood_test_group_map`
--

CREATE TABLE IF NOT EXISTS `blood_test_group_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blood_test_group_id` int(10) NOT NULL,
  `blood_test_id` int(10) NOT NULL,
  `srl_order` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3499 ;

--
-- Dumping data for table `blood_test_group_map`
--

INSERT INTO `blood_test_group_map` (`id`, `blood_test_group_id`, `blood_test_id`, `srl_order`) VALUES
(2730, 1, 1436, 1),
(2734, 1, 1437, 2),
(2738, 1, 1438, 3),
(2742, 1, 1439, 4),
(2746, 1, 1440, 5),
(2750, 1, 1441, 6),
(2754, 1, 1442, 7),
(2758, 1, 1443, 8),
(2762, 1, 1444, 9),
(2766, 1, 1445, 10),
(2770, 1, 1446, 11),
(2774, 2, 1436, 1),
(2778, 2, 1439, 2),
(2782, 2, 1440, 3),
(2786, 2, 1447, 4),
(2790, 2, 1448, 5),
(2794, 2, 1449, 6),
(2798, 2, 1450, 7),
(2802, 2, 1443, 8),
(2806, 2, 1444, 9),
(2810, 2, 1451, 10),
(2814, 2, 1452, 11),
(2818, 2, 1453, 12),
(2822, 2, 1454, 13),
(2826, 2, 1455, 14),
(2830, 2, 1456, 15),
(2834, 2, 1457, 16),
(2838, 2, 1458, 17),
(2842, 2, 1445, 18),
(2846, 2, 1446, 19),
(2850, 3, 1459, 1),
(2854, 3, 1460, 2),
(2858, 3, 1461, 3),
(2862, 3, 1462, 4),
(2866, 3, 1463, 5),
(2870, 3, 1464, 6),
(2874, 3, 1465, 7),
(2878, 3, 1440, 8),
(2882, 3, 1466, 9),
(2886, 3, 1445, 10),
(2890, 3, 1446, 11),
(2894, 4, 1436, 1),
(2898, 4, 1451, 2),
(2902, 4, 1447, 3),
(2906, 4, 1452, 4),
(2910, 4, 1453, 5),
(2914, 4, 1467, 6),
(2918, 4, 1468, 7),
(2922, 4, 1469, 8),
(2926, 4, 1470, 9),
(2930, 4, 1471, 10),
(2934, 4, 1472, 11),
(2938, 4, 1473, 12),
(2942, 4, 1474, 13),
(2946, 4, 1473, 14),
(2950, 4, 1475, 15),
(2954, 4, 1473, 16),
(2958, 4, 1445, 17),
(2962, 4, 1446, 18),
(2966, 5, 1451, 1),
(2970, 5, 1460, 2),
(2974, 5, 1476, 3),
(2978, 5, 1477, 4),
(2982, 5, 1478, 5),
(2986, 5, 1479, 6),
(2990, 5, 1480, 7),
(2994, 5, 1481, 8),
(2998, 5, 1482, 9),
(3002, 5, 1445, 10),
(3006, 5, 1446, 11),
(3010, 6, 1436, 1),
(3014, 6, 1437, 2),
(3018, 6, 1439, 3),
(3022, 6, 1440, 4),
(3026, 6, 1448, 5),
(3030, 6, 1449, 6),
(3034, 6, 1450, 7),
(3038, 6, 1483, 8),
(3042, 6, 1452, 9),
(3046, 6, 1453, 10),
(3050, 6, 1447, 11),
(3054, 6, 1443, 12),
(3058, 6, 1444, 13),
(3062, 6, 1451, 14),
(3066, 6, 1484, 15),
(3070, 6, 1485, 16),
(3074, 6, 1438, 17),
(3078, 6, 1466, 18),
(3082, 6, 1486, 19),
(3086, 6, 1487, 20),
(3090, 6, 1488, 21),
(3094, 6, 1445, 22),
(3098, 6, 1446, 23),
(3102, 7, 1466, 1),
(3106, 7, 1489, 2),
(3110, 7, 1490, 3),
(3114, 7, 1491, 4),
(3118, 7, 1445, 5),
(3122, 7, 1446, 6),
(3126, 7, 1461, 7),
(3130, 7, 1492, 8),
(3134, 7, 1493, 9),
(3138, 7, 1494, 10),
(3142, 7, 1445, 11),
(3146, 7, 1446, 12),
(3150, 7, 1495, 13),
(3154, 7, 1496, 14),
(3158, 7, 1497, 15),
(3162, 7, 1498, 16),
(3166, 7, 1445, 17),
(3170, 7, 1446, 18),
(3174, 8, 1461, 1),
(3178, 8, 1492, 2),
(3182, 8, 1493, 3),
(3186, 8, 1494, 4),
(3190, 8, 1445, 5),
(3194, 8, 1446, 6),
(3198, 9, 1495, 1),
(3202, 9, 1496, 2),
(3206, 9, 1497, 3),
(3210, 9, 1498, 4),
(3214, 9, 1445, 5),
(3218, 9, 1446, 6),
(3222, 10, 1499, 1),
(3226, 10, 1500, 2),
(3230, 10, 1501, 3),
(3234, 10, 1502, 4),
(3238, 10, 1486, 5),
(3242, 10, 1503, 6),
(3246, 10, 1445, 7),
(3250, 10, 1446, 8),
(3254, 11, 1451, 1),
(3258, 11, 1438, 2),
(3262, 11, 1439, 3),
(3266, 11, 1440, 4),
(3270, 11, 1447, 5),
(3274, 11, 1455, 6),
(3278, 11, 1456, 7),
(3282, 11, 1457, 8),
(3286, 11, 1504, 9),
(3290, 11, 1484, 10),
(3294, 11, 1441, 11),
(3298, 11, 1505, 12),
(3302, 11, 1506, 13),
(3306, 11, 1507, 14),
(3310, 11, 1452, 15),
(3314, 11, 1453, 16),
(3318, 11, 1466, 17),
(3322, 11, 1486, 18),
(3326, 11, 1508, 19),
(3330, 11, 1509, 20),
(3334, 11, 1510, 21),
(3338, 11, 1445, 22),
(3342, 11, 1446, 23),
(3346, 12, 1451, 1),
(3350, 12, 1460, 2),
(3354, 12, 1436, 3),
(3358, 12, 1439, 4),
(3362, 12, 1440, 5),
(3366, 12, 1452, 6),
(3370, 12, 1453, 7),
(3374, 12, 1463, 8),
(3378, 12, 1466, 9),
(3382, 12, 1443, 10),
(3386, 12, 1511, 11),
(3390, 12, 1508, 12),
(3394, 12, 1445, 13),
(3398, 12, 1446, 14),
(3402, 13, 1512, 1),
(3406, 13, 1513, 2),
(3410, 13, 1514, 3),
(3414, 13, 1455, 4),
(3418, 13, 1456, 5),
(3422, 13, 1457, 6),
(3426, 13, 1504, 7),
(3430, 13, 1499, 8),
(3434, 13, 1484, 9),
(3438, 13, 1515, 10),
(3442, 13, 1516, 11),
(3446, 13, 1461, 12),
(3450, 13, 1492, 13),
(3454, 13, 1445, 14),
(3458, 13, 1446, 15),
(3462, 14, 1442, 1),
(3466, 14, 1441, 2),
(3470, 14, 1517, 3),
(3474, 14, 1518, 4),
(3478, 14, 1519, 5),
(3482, 14, 1520, 6),
(3486, 14, 1521, 7),
(3490, 14, 1522, 8),
(3494, 14, 1445, 9),
(3498, 14, 1446, 10);

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE IF NOT EXISTS `career` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` varchar(20) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `applied_for` text NOT NULL,
  `upload_file` varchar(150) NOT NULL,
  `experience` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id`, `name`, `address`, `city`, `phone`, `email`, `age`, `marital_status`, `applied_for`, `upload_file`, `experience`, `created_at`, `status`) VALUES
(1, 'Ashoke Das', '', '', '', '', '', '', '', '', '', '2019-05-31 13:23:48', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE IF NOT EXISTS `company_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(150) NOT NULL,
  `ADDRESS` varchar(200) NOT NULL,
  `MOB_NOS` varchar(100) NOT NULL,
  `EMAIL_IDS` varchar(300) NOT NULL,
  `SMS_KEY` varchar(200) NOT NULL DEFAULT '77477AbwBFRMdBFd5533c1f5',
  `company_mailid` varchar(200) NOT NULL DEFAULT 'info@onlineunilab.co.in',
  `SMS_SENDERID` varchar(6) NOT NULL,
  `visit_lock_days` int(3) NOT NULL,
  `distance_wise_exp` double(10,2) NOT NULL,
  `COMP_ID` varchar(30) NOT NULL DEFAULT 'MEDICHEM',
  `Address2` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `State` int(5) NOT NULL,
  `PhoneNo` varchar(20) NOT NULL,
  `Website` varchar(100) NOT NULL,
  `PANNo` varchar(20) NOT NULL,
  `GSTNo` varchar(20) NOT NULL,
  `DLNO1` varchar(20) NOT NULL,
  `DLNO2` varchar(20) NOT NULL,
  `BankDetails` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `NAME`, `ADDRESS`, `MOB_NOS`, `EMAIL_IDS`, `SMS_KEY`, `company_mailid`, `SMS_SENDERID`, `visit_lock_days`, `distance_wise_exp`, `COMP_ID`, `Address2`, `City`, `State`, `PhoneNo`, `Website`, `PANNo`, `GSTNo`, `DLNO1`, `DLNO2`, `BankDetails`) VALUES
(1, 'ROY HOMOEO HALL', '101/3A GOPAL LAL TAGORE ROAD KOLKATA 700036', '999999999', 'companyname@domainname.com', '77477AbwBFRMdBFd5533c1f5', 'info@onlineunilab.co.in', 'UNILAB', 30, 1.20, 'MEDICHEM', '', 'KOLKATA', 166, '9831414617', '', '', '19ADGPR8061H1Z4', 'HL/579-S', '', 'BANK');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(120) NOT NULL,
  `comment` longtext NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `phone`, `email`, `comment`, `status`, `created_at`) VALUES
(2, '', '', '', '', 'ACTIVE', '2019-05-31 13:18:28'),
(3, '', '', '', '', 'INACTIVE', '2019-05-31 13:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `frmrptgeneralmaster`
--

CREATE TABLE IF NOT EXISTS `frmrptgeneralmaster` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `FieldID` varchar(50) NOT NULL,
  `FieldVal` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `DEBIT_HEAD_NAME` varchar(200) NOT NULL,
  `DEBIT_GROUP` varchar(200) NOT NULL,
  `DEBIT_LEDGER` varchar(200) NOT NULL,
  `CREDIT_HEAD_NAME` varchar(200) NOT NULL,
  `CREDIT_GROUP` varchar(200) NOT NULL,
  `CREDIT_LEDGER` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `frmrptgeneralmaster`
--

INSERT INTO `frmrptgeneralmaster` (`id`, `FieldID`, `FieldVal`, `Status`, `DEBIT_HEAD_NAME`, `DEBIT_GROUP`, `DEBIT_LEDGER`, `CREDIT_HEAD_NAME`, `CREDIT_GROUP`, `CREDIT_LEDGER`) VALUES
(53, 'RESULT_WITH_CONDITION', 'RESULT_WITH_CONDITION', 'QUERY_TYPE', '', '', '', '', '', ''),
(52, 'RESULT', 'RESULT', 'QUERY_TYPE', '', '', '', '', '', ''),
(51, 'Anemia', 'Anemia', 'profile_type', '', '', '', '', '', ''),
(50, 'Allergy', 'Allergy', 'profile_type', '', '', '', '', '', ''),
(49, 'Abortions', 'Abortions', 'profile_type', '', '', '', '', '', ''),
(48, 'Health_Check_Up', 'Health Check Up', 'profile_type', '', '', '', '', '', ''),
(47, 'Blood', 'Blood', 'BLOOD_TEST_TYPE', '', '', '', '', '', ''),
(46, 'SUPER', 'SUPER', 'LOGINTYPE', '', '0', '0', '', '0', '0'),
(45, 'ADMIN', 'ADMIN', 'LOGINTYPE', '', '0', '0', '', '0', '0'),
(44, 'INACTIVE', 'INACTIVE', 'ACTIVE_INACTIVE', '', '0', '0', '', '0', '0'),
(43, 'ACTIVE', 'ACTIVE', 'ACTIVE_INACTIVE', '', '0', '0', '', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `frmrpttemplatedetails`
--

CREATE TABLE IF NOT EXISTS `frmrpttemplatedetails` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `frmrpttemplatehdrID` int(10) NOT NULL,
  `InputName` varchar(50) NOT NULL,
  `tran_table_name` varchar(100) NOT NULL,
  `InputType` varchar(20) NOT NULL,
  `Inputvalue` varchar(100) NOT NULL,
  `LogoType` varchar(20) NOT NULL,
  `RecordSet` varchar(200) NOT NULL,
  `LabelName` varchar(50) NOT NULL,
  `DIVClass` varchar(50) NOT NULL,
  `Section` int(10) NOT NULL,
  `FieldOrder` int(5) NOT NULL,
  `datafields` varchar(200) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `where_condition` varchar(100) NOT NULL,
  `orderby` varchar(100) NOT NULL,
  `SectionType` varchar(20) NOT NULL,
  `MainTable` varchar(40) NOT NULL,
  `LinkField` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=233 ;

--
-- Dumping data for table `frmrpttemplatedetails`
--

INSERT INTO `frmrpttemplatedetails` (`id`, `frmrpttemplatehdrID`, `InputName`, `tran_table_name`, `InputType`, `Inputvalue`, `LogoType`, `RecordSet`, `LabelName`, `DIVClass`, `Section`, `FieldOrder`, `datafields`, `table_name`, `where_condition`, `orderby`, `SectionType`, `MainTable`, `LinkField`) VALUES
(15, 7, 'FieldID', 'frmrptgeneralmaster', 'text', '', '', '', 'Field ID', '3', 1, 1, '', '', '', '', 'HEADER', 'frmrptgeneralmaster', 'id'),
(16, 7, 'FieldVal', 'frmrptgeneralmaster', 'text', '', '', '', 'Field Value', '6', 1, 2, '', '', '', '', 'HEADER', 'frmrptgeneralmaster', 'id'),
(17, 7, 'Status', 'frmrptgeneralmaster', 'text', '', '', '', 'Status', '3', 1, 3, '', '', '', '', 'HEADER', 'frmrptgeneralmaster', 'id'),
(18, 8, 'NAME', 'company_details', 'text', '', '', '', 'COMPANY NAME', '3', 1, 1, '', '', '', '', 'HEADER', 'company_details', 'id'),
(19, 8, 'ADDRESS', 'company_details', 'text', '', '', '', 'ADDRESS', '6', 1, 2, '', '', '', '', 'HEADER', 'company_details', 'id'),
(32, 10, 'code', 'tbl_employee_mstr', 'text', '', '', '', 'Code', '3', 1, 1, '', '', '', '', 'HEADER', 'tbl_employee_mstr', 'id'),
(33, 10, 'name', 'tbl_employee_mstr', 'text', '', '', '', 'Name', '3', 1, 2, '', '', '', '', 'HEADER', 'tbl_employee_mstr', ''),
(34, 10, 'address', 'tbl_employee_mstr', 'text', '', '', '', 'Address', '3', 1, 3, '', '', '', '', 'HEADER', 'tbl_employee_mstr', 'id'),
(35, 10, 'contactno', 'tbl_employee_mstr', 'text', '', '', '', 'Contact No', '3', 1, 4, '', '', '', '', 'HEADER', 'tbl_employee_mstr', 'id'),
(36, 10, 'email', 'tbl_employee_mstr', 'text', '', '', '', 'Email', '3', 1, 6, '', '', '', '', 'HEADER', 'tbl_employee_mstr', 'id'),
(207, 33, '  order_index', 'service_cate', 'text', '', '', '', 'Order index', '2', 3, 2, '', '', '', '', 'HEADER', 'career', ''),
(208, 34, 'name', 'services', 'text', '', '', '', 'Name', '3', 1, 1, '', '', '', '', 'HEADER', 'career', ''),
(38, 10, 'userid', 'tbl_employee_mstr', 'text', '', '', '', 'User Id', '3', 1, 7, '', '', '', '', 'HEADER', 'tbl_employee_mstr', 'id'),
(39, 10, 'password', 'tbl_employee_mstr', 'password', '', '', '', 'Password', '3', 1, 8, '', '', '', '', 'HEADER', 'tbl_employee_mstr', 'id'),
(40, 10, 'login_status', 'tbl_employee_mstr', 'hidden', 'ADMIN', '', '', 'Login Type', '1', 1, 10, '', '', '', '', 'HEADER', 'tbl_employee_mstr', 'id'),
(206, 33, 'cate_name', 'service_cate', 'text', '', '', '', 'category name', '3', 1, 1, '', '', '', '', 'HEADER', 'career', ''),
(41, 10, 'status', 'tbl_employee_mstr', 'SingleSelect', '', '', '', 'Status', '3', 1, 9, 'select  FieldID,FieldVal  from frmrptgeneralmaster where Status=''ACTIVE_INACTIVE''  order by   FieldVal', '', '', '', 'HEADER', 'tbl_employee_mstr', 'id'),
(232, 33, 'image', 'service_cate', 'FILE_UPLOAD', '', '', '', 'Image', '3', 2, 1, '', '', '', '', 'HEADER', 'career', ''),
(157, 8, 'City', 'company_details', 'text', '', '', '', 'City', '3', 1, 5, '', '', '', '', 'HEADER', 'company_details', ''),
(158, 8, 'PhoneNo', 'company_details', 'text', '', '', '', 'PhoneNo', '3', 1, 6, '', '', '', '', 'HEADER', 'company_details', ''),
(159, 8, 'Website', 'company_details', 'text', '', '', '', 'Website', '3', 1, 7, '', '', '', '', 'HEADER', 'company_details', ''),
(216, 35, 'news_pic', 'news', 'FILE_UPLOAD', '', '', '', 'Picture', '3', 1, 5, '', '', '', '', 'HEADER', 'career', ''),
(214, 35, 'date', 'news', 'datefield', '', '', '', 'Date', '3', 1, 3, '', '', '', '', 'HEADER', 'career', ''),
(215, 35, 'status', 'news', 'SingleSelect', '', '', '', 'Status', '3', 1, 4, 'select FieldID,FieldVal from  frmrptgeneralmaster where   status=''ACTIVE_INACTIVE''', '', '', '', 'HEADER', 'career', ''),
(213, 35, 'news_details', 'news', 'text', '', '', '', 'Details', '6', 1, 2, '', '', '', '', 'HEADER', 'career', ''),
(212, 35, 'title', 'news', 'text', '', '', '', 'Title', '3', 1, 1, '', '', '', '', 'HEADER', 'career', ''),
(211, 34, 'order_index', 'services', 'text', '', '', '', 'Order index', '2', 1, 4, '', '', '', '', 'HEADER', 'career', ''),
(210, 34, 'service_details', 'services', 'text', '', '', '', 'Service Details', '6', 1, 3, '', '', '', '', 'HEADER', 'career', ''),
(189, 31, 'name', 'career', 'LABEL', '', '', '', 'NAME', '3', 1, 1, '', '', '', '', 'HEADER', 'career', ''),
(190, 31, 'address', 'career', 'LABEL', '', '', '', 'Address', '6', 1, 2, '', '', '', '', 'HEADER', 'career', ''),
(191, 31, 'city', 'career', 'LABEL', '', '', '', 'City', '3', 1, 3, '', '', '', '', 'HEADER', 'career', ''),
(192, 31, 'phone', 'career', 'LABEL', '', '', '', 'phone', '3', 1, 4, '', '', '', '', 'HEADER', 'career', ''),
(193, 31, 'email', 'career', 'LABEL', '', '', '', 'Email', '3', 1, 5, '', '', '', '', 'HEADER', 'career', ''),
(194, 31, 'age', 'career', 'LABEL', '', '', '', 'Age', '3', 1, 6, '', '', '', '', 'HEADER', 'career', ''),
(195, 31, 'marital_status', 'career', 'LABEL', '', '', '', 'marital_status', '3', 1, 7, '', '', '', '', 'HEADER', 'career', ''),
(196, 31, 'applied_for', 'career', 'LABEL', '', '', '', 'applied_for', '3', 1, 8, '', '', '', '', 'HEADER', 'career', ''),
(197, 31, 'experience', 'career', 'LABEL', '', '', '', 'Experience', '3', 1, 9, '', '', '', '', 'HEADER', 'career', ''),
(198, 31, 'created_at', 'career', 'LABEL', '', '', '', 'Created_at', '3', 1, 10, '', '', '', '', 'HEADER', 'career', ''),
(199, 31, 'status', 'career', 'SingleSelect', '', '', '', 'Status', '3', 1, 11, 'select FieldID,FieldVal from  frmrptgeneralmaster where   status=''ACTIVE_INACTIVE''', '', '', '', 'HEADER', 'career', ''),
(200, 32, 'name', 'feedback', 'LABEL', '', '', '', 'Name', '3', 1, 1, '', '', '', '', 'HEADER', 'career', ''),
(201, 32, 'phone', 'feedback', 'LABEL', '', '', '', 'phone', '3', 1, 2, '', '', '', '', 'HEADER', 'career', ''),
(202, 32, 'email', 'feedback', 'LABEL', '', '', '', 'Email', '3', 1, 3, '', '', '', '', 'HEADER', 'career', ''),
(203, 32, 'comment', 'feedback', 'LABEL', '', '', '', 'Comment', '6', 1, 4, '', '', '', '', 'HEADER', 'career', ''),
(204, 32, 'created_at', 'feedback', 'LABEL', '', '', '', 'created_at', '3', 1, 5, '', '', '', '', 'HEADER', 'career', ''),
(205, 32, 'status', 'feedback', 'SingleSelect', '', '', '', 'Status', '3', 1, 6, 'select FieldID,FieldVal from  frmrptgeneralmaster where   status=''ACTIVE_INACTIVE''', '', '', '', 'HEADER', 'career', ''),
(209, 34, 'cate_id', 'services', 'SingleSelect', '', '', '', 'category', '3', 1, 2, 'select id FieldID,cate_name FieldVal from  service_cate', '', '', '', 'HEADER', 'career', ''),
(183, 30, 'FormRptName', 'frmrpt_simple_query_builder', 'text', '', '', '', 'Frm Report Name', '3', 1, 1, '', '', '', '', 'HEADER', 'acc_group_ledgers', ''),
(184, 30, 'query_name', 'frmrpt_simple_query_builder', 'text', '', '', '', 'Query Name', '3', 1, 2, '', '', '', '', 'HEADER', 'acc_group_ledgers', ''),
(185, 30, 'table_name', 'frmrpt_simple_query_builder', 'text', '', '', '', 'Table Name', '3', 1, 3, '', '', '', '', 'HEADER', 'acc_group_ledgers', ''),
(186, 30, 'field_name', 'frmrpt_simple_query_builder', 'text', '', '', '', 'Field Name', '3', 1, 4, '', '', '', '', 'HEADER', 'acc_group_ledgers', ''),
(187, 30, 'where_cond', 'frmrpt_simple_query_builder', 'text', '', '', '', 'where_cond', '6', 1, 5, '', '', '', '', 'HEADER', 'acc_group_ledgers', ''),
(188, 30, 'type', 'frmrpt_simple_query_builder', 'SingleSelect', '', '', '', 'TYPE', '3', 1, 6, 'select FieldID,FieldVal from  frmrptgeneralmaster where Status=''QUERY_TYPE''', '', '', '', 'HEADER', 'acc_group_ledgers', '');

-- --------------------------------------------------------

--
-- Table structure for table `frmrpttemplatehdr`
--

CREATE TABLE IF NOT EXISTS `frmrpttemplatehdr` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `FormRptName` varchar(100) NOT NULL,
  `Type` varchar(15) NOT NULL,
  `GridHeader` varchar(250) NOT NULL,
  `DataFields` varchar(200) NOT NULL,
  `TableName` varchar(100) NOT NULL,
  `WhereCondition` varchar(150) NOT NULL,
  `OrderBy` varchar(100) NOT NULL,
  `ControllerFunctionLink` varchar(150) NOT NULL,
  `ViewPath` varchar(150) NOT NULL,
  `DisplayGrid` varchar(3) NOT NULL DEFAULT 'YES',
  `NEWENTRYBUTTON` varchar(3) NOT NULL DEFAULT 'YES',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `frmrpttemplatehdr`
--

INSERT INTO `frmrpttemplatehdr` (`id`, `FormRptName`, `Type`, `GridHeader`, `DataFields`, `TableName`, `WhereCondition`, `OrderBy`, `ControllerFunctionLink`, `ViewPath`, `DisplayGrid`, `NEWENTRYBUTTON`) VALUES
(7, 'General Master', 'FORM', '', 'id,FieldID,FieldVal,Status', 'frmrptgeneralmaster', '', 'Status ASC', 'Project_controller/TempleteForm/', 'ActiveReport/TemplateForm', 'YES', 'YES'),
(8, 'Company Setting', 'FORM', '', 'id,NAME,ADDRESS', 'company_details', 'id=1', 'Name ASC', 'Project_controller/TempleteForm/', 'ActiveReport/TemplateForm', 'YES', 'NO'),
(10, 'Employee Master', 'FORM', '', 'id,name,userid,login_status', 'tbl_employee_mstr', 'id>0 and login_status=''ADMIN''', '', 'Project_controller/TempleteForm/', 'ActiveReport/TemplateForm', 'YES', 'YES'),
(31, 'Job Application List', 'FORM', '', 'id,name,phone,email,upload_file', 'career', 'id>0 and status=''ACTIVE''', '', 'Project_controller/TempleteForm/', 'ActiveReport/TemplateForm', 'YES', 'YES'),
(32, 'Feedback manage', 'FORM', '', 'id,name,phone,email,comment,status', 'feedback', 'id>0', '', 'Project_controller/TempleteForm/', 'ActiveReport/TemplateForm', 'YES', 'YES'),
(33, 'Product Category', 'FORM', '', 'id,cate_name,order_index', 'service_cate', '', '', 'Project_controller/TempleteForm/', 'ActiveReport/TemplateForm', 'YES', 'YES'),
(34, 'Product details', 'FORM', '', 'id,name,cate_id,order_index', 'services', 'id>0', '', 'Project_controller/TempleteForm/', 'ActiveReport/TemplateForm', 'YES', 'YES'),
(35, 'News', 'FORM', '', 'id,title,news_details,date', 'news', '', '', 'Project_controller/TempleteForm/', 'ActiveReport/TemplateForm', 'YES', 'YES'),
(30, 'Query_bulder', 'FORM', '', 'id,FormRptName,query_name', 'frmrpt_simple_query_builder', 'id>0', '', 'Project_controller/TempleteForm/', 'ActiveReport/TemplateForm', 'YES', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `frmrpt_simple_query_builder`
--

CREATE TABLE IF NOT EXISTS `frmrpt_simple_query_builder` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `FormRptName` varchar(100) NOT NULL,
  `query_name` varchar(100) NOT NULL,
  `table_name` varchar(100) NOT NULL,
  `field_name` varchar(100) NOT NULL,
  `where_cond` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'RESULT',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `frmrpt_simple_query_builder`
--

INSERT INTO `frmrpt_simple_query_builder` (`id`, `FormRptName`, `query_name`, `table_name`, `field_name`, `where_cond`, `type`) VALUES
(32, 'GENERAL', 'TESTS', 'blood_test', 'test_name', 'id>0', 'RESULT'),
(33, 'GENERAL', 'PROFILE MASTER with FieldID', 'blood_test_group', 'group_name', 'profile_type_id=', 'RESULT_WITH_CONDITION'),
(34, 'GENERAL', 'PROFILE MASTER', 'blood_test_group', 'group_name', 'id>0', 'RESULT'),
(35, 'GENERAL', 'profile list', 'frmrptgeneralmaster', 'FieldVal', 'Status=''profile_type''', 'RESULT');

-- --------------------------------------------------------

--
-- Table structure for table `menu_details`
--

CREATE TABLE IF NOT EXISTS `menu_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `menu_header_id` int(10) NOT NULL,
  `menu_details_name` varchar(100) NOT NULL,
  `controller_path` varchar(100) NOT NULL,
  `menu_order` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `menu_details`
--

INSERT INTO `menu_details` (`id`, `menu_header_id`, `menu_details_name`, `controller_path`, `menu_order`) VALUES
(1, 1, 'Advance Chart', 'Project_controller/advance_chart_listing/', 1),
(2, 1, 'Employee Master', 'Project_controller/TempleteForm/33/', 2),
(3, 1, 'Driver Master', 'Project_controller/operator_listing/', 3),
(4, 1, 'Create Agreement', 'Project_controller/truck_loan_listing/', 4),
(5, 1, 'Truck Master', 'Project_controller/stockist_listing/', 5),
(6, 1, 'Misc Master', 'Project_controller/TempleteForm/38/', 6),
(7, 1, 'Document Master', 'Project_controller/TempleteForm/39/', 7),
(8, 1, 'Bank Master', 'Project_controller/TempleteForm/37/', 8),
(9, 2, 'Trip Entry', 'Primary_sale_controller/sell_section/new/0/0/', 1),
(10, 2, 'TT Paper Detail Entry', 'Project_controller/DocumentPayment/28/TRANEDIT/', 2),
(11, 2, 'Operator activity', 'Project_controller/employee_daily_trn_control/nolist/', 3),
(12, 2, 'Operator Salary', 'Primary_sale_controller/operator_salary/listing/', 4),
(13, 2, 'Truck Attachment Master', 'Primary_sale_controller/truck_attachment/listing/', 5),
(14, 3, 'Trip Report', 'Primary_sale_controller/truck_report/listing/', 1),
(15, 3, 'TT Paper Detail', 'Project_controller/truck_license_expiry/listing/', 2),
(16, 3, 'Truck History Report', 'Primary_sale_controller/truck_history_report/listing/', 3),
(17, 3, 'Advance Chart', 'Primary_sale_controller/advance_chart_report/listing/', 4),
(18, 3, 'Operator Salary', 'Primary_sale_controller/operator_salary_report/listing/', 5),
(19, 3, 'Loading to Loading', 'Primary_sale_controller/loading_to_loading_report/listing/', 6),
(20, 3, 'EMI Report', 'Project_controller/emi_report/nolist/', 7),
(21, 3, 'Driver Report', 'Project_controller/TemplateReports/36/', 8),
(22, 1, 'Employee Priviledge Set', 'Project_controller/Employee_priviledge_set/', 3),
(23, 2, 'Bank balance Maintain', 'Primary_sale_controller/bank_balance_maintain/listing/0/', 5);

-- --------------------------------------------------------

--
-- Table structure for table `menu_header`
--

CREATE TABLE IF NOT EXISTS `menu_header` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(100) NOT NULL,
  `menu_detail` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `menu_header`
--

INSERT INTO `menu_header` (`id`, `menu_name`, `menu_detail`) VALUES
(1, 'MASTER SECTIOM', 'Master'),
(2, 'TRANSACTIONS SECTION', 'Tran Entry'),
(3, 'REPORT SECTIOM', 'REPORTS');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `news_pic` varchar(120) NOT NULL,
  `news_details` mediumtext NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `news_pic`, `news_details`, `date`, `created_at`, `status`) VALUES
(2, 'New Lab Setup', 'news_news_pic2.jpg', 'LASCO MEDICARE is setting up state of the art facilities as per NABL ACCREDITATION requirements.', '2019-05-23', '2019-05-31 14:35:33', 'ACTIVE'),
(3, 'HbA1c Test at Doorstep', '', 'Among few labs in Howrah & Hooghly districts where GLYCATED HEMOGLOBIN (HbA1c) test is done in house by BIO-RAD D-10 HPLC ANALYSER', '2019-05-29', '2019-05-31 14:27:24', 'INACTIVE'),
(4, 'EQAS', '', 'LASCO MDICARE has tied up with Christian Medical College, Vellore and BIO-RAD, USA', '2019-05-27', '2019-05-31 14:25:05', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `cate_id` int(11) NOT NULL,
  `service_details` mediumtext NOT NULL,
  `order_index` int(5) NOT NULL,
  `image` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `cate_id`, `service_details`, `order_index`, `image`) VALUES
(4, 'CT (COMPUTERISED TOMOGRAPHY )', 1, '', 1, ''),
(5, 'ULTRASONOGRAPHY ROUTINE', 1, '', 2, ''),
(6, 'ULTRASONOGRAPHY DOPPLER', 1, '', 3, ''),
(7, 'X-RAY ROUTINE', 1, '', 4, ''),
(8, 'HYSTERO-SALPINGOGRAPHY', 1, '', 5, ''),
(9, 'BARIUM SWALLO OESOPHAGUS (BMSW)', 1, '', 6, ''),
(10, 'BARIUM STOMACH DEODENUM (BMSD)', 1, '', 7, ''),
(11, 'BARIUM MEAL FOLLOW THROUGH (BMFT)', 1, '', 8, '');

-- --------------------------------------------------------

--
-- Table structure for table `service_cate`
--

CREATE TABLE IF NOT EXISTS `service_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(200) NOT NULL,
  `order_index` int(5) NOT NULL,
  `image` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `service_cate`
--

INSERT INTO `service_cate` (`id`, `cate_name`, `order_index`, `image`) VALUES
(1, 'Radiology', 1, 'service_cate_image1.jpg'),
(2, 'Laboratory Services', 2, ''),
(3, 'Cardiology', 3, ''),
(4, 'Neurology', 4, ''),
(5, 'PUMPKIN', 0, ''),
(6, 'BITTER GOURD', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_mstr`
--

CREATE TABLE IF NOT EXISTS `tbl_employee_mstr` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `address` varchar(300) NOT NULL,
  `contactno` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` int(10) NOT NULL,
  `tbl_designation_id` int(10) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `login_status` varchar(20) NOT NULL DEFAULT 'USER',
  `ANDROID_CODE` int(5) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `tbl_employee_mstr`
--

INSERT INTO `tbl_employee_mstr` (`id`, `code`, `name`, `address`, `contactno`, `email`, `city`, `tbl_designation_id`, `userid`, `password`, `login_status`, `ANDROID_CODE`, `status`) VALUES
(6, 'emp1', 'admin', 'admin', 'admin', 'admin@admin.com', 0, 1, 'admin', 'admin', 'ADMIN', 0, 'ACTIVE'),
(69, '', 'SUPER', '', '', '', 0, 0, 'SUPER', 'SUPER', 'SUPER', 0, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `sl_no` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sl_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sl_no`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'admin', 'd0cc9677852ed448ec99860e69fdd457', 'shyamapadadas26@gmail.com', '2019-04-30 19:08:13');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
