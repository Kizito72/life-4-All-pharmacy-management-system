-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 04, 2026 at 02:49 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
CREATE TABLE IF NOT EXISTS `activity_log` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `task` varchar(5000) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1550 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`ID`, `task`) VALUES
(1516, 'Ndueso Okorie Logged In On 2023-04-03 08:43:00'),
(1517, 'Ndueso Okorie Logged In On 2023-05-16 13:49:32'),
(1518, 'Ndueso Okorie Logged In On 2023-07-08 22:29:09'),
(1519, 'Ndueso Okorie Logged In On 2023-07-13 15:35:41'),
(1520, 'Ndueso Walter Logged In On 2023-08-22 15:49:42'),
(1521, 'Ndueso Walter Updated his Photo On 2023-08-22 15:52:54'),
(1522, 'Ndueso Walter Logged In On 2023-08-22 15:53:32'),
(1523, 'Ndueso Walter Okorie Updated his Profile On 2023-08-22 16:01:12'),
(1524, 'Ndueso Walter Deleted Category On 2023-08-22 16:04:01'),
(1525, 'Ndueso Walter Deleted Supplier On 2023-08-22 16:05:35'),
(1526, 'Ndueso Walter Okorie Changed Password On 2023-08-22 16:15:32'),
(1527, 'Ndueso Walter Okorie Logged In On 2023-08-22 16:15:39'),
(1528, 'Ndueso Walter Okorie Logged In On 2023-08-24 12:38:33'),
(1529, 'Ndueso Walter Okorie Deleted Drug On 2023-08-24 14:04:44'),
(1530, 'Ndueso Walter Okorie Deleted Drug On 2023-08-24 14:06:31'),
(1531, 'Ndueso Walter Okorie Deleted Drug On 2023-08-24 14:35:44'),
(1532, 'Ndueso Walter Okorie Updated his Photo On 2023-08-24 15:51:45'),
(1533, 'Ndueso Walter Okorie Updated his Photo On 2023-08-24 15:54:35'),
(1534, 'Goodness Monday Logged In On 2023-08-25 12:42:54'),
(1535, 'Goodness Monday Logged In On 2026-02-02 22:37:16'),
(1536, 'ADMIN Logged In On 2026-02-02 22:53:19'),
(1537, 'ADMIN Logged In On 2026-02-02 23:32:35'),
(1538, 'ADMIN Updated his Photo On 2026-02-03 00:02:42'),
(1539, 'ADMIN Updated his Photo On 2026-02-03 00:03:35'),
(1540, 'ADMIN Updated his Photo On 2026-02-03 00:03:42'),
(1541, 'ADMIN Logged In On 2026-02-04 12:59:47'),
(1542, 'ADMIN Logged In On 2026-02-04 14:03:58'),
(1543, 'ADMIN Updated his Photo On 2026-02-04 14:06:15'),
(1544, 'ADMIN Logged In On 2026-02-04 14:44:35'),
(1545, 'ADMIN Logged In On 2026-02-04 14:49:18'),
(1546, 'ADMIN Deleted Drug On 2026-02-04 15:14:40'),
(1547, 'ADMIN Logged In On 2026-02-04 15:22:28'),
(1548, 'ADMIN Changed Password On 2026-02-04 15:25:33'),
(1549, 'ADMIN Logged In On 2026-02-04 15:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customerID` int NOT NULL AUTO_INCREMENT,
  `fullName` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` int NOT NULL,
  `phone2` int DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `district` varchar(30) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `fullName`, `email`, `mobile`, `phone2`, `address`, `address2`, `city`, `district`, `status`, `createdOn`) VALUES
(43, 'Nneka Chuks', 'nnes_baby@gmail.com', 2147483647, 2147483647, '89 Ukam Rd', '12 Market rd', 'Aba', 'Abia', 'Active', '2023-07-30 20:28:10'),
(44, 'Stella Monday Ekanem', 'steco_2010@gmail.com', 2147483647, 2147483647, '23 Aba rd', '23 Aba rd', 'Ikot Ekpene', 'Akwa Ibom', 'Active', '2023-08-01 08:38:59');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `saleID` int NOT NULL AUTO_INCREMENT,
  `customerName` varchar(255) NOT NULL,
  `drugName` varchar(255) NOT NULL,
  `saleDate` date NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `unitPrice` float(10,0) NOT NULL DEFAULT '0',
  PRIMARY KEY (`saleID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`saleID`, `customerName`, `drugName`, `saleDate`, `quantity`, `unitPrice`) VALUES
(27, 'Nneka Chuks', 'Bosca', '0000-00-00', 10, 231),
(28, 'Stella Monday Ekanem', 'Panadol', '0000-00-00', 12, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

DROP TABLE IF EXISTS `tblcategory`;
CREATE TABLE IF NOT EXISTS `tblcategory` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(33) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `category_name`) VALUES
(1, 'Syrup'),
(3, 'Tablet'),
(4, 'pills'),
(5, 'Prescription Medicines'),
(6, 'Over-the-Counter Medicines'),
(7, 'Vitamins & Supplements'),
(8, 'Baby & Child Care'),
(9, 'Medical Equipment & Supplies'),
(10, 'Wellness & Personal Care'),
(11, 'Women\'s Health'),
(12, 'Men\'s Health'),
(13, 'Senior Health');

-- --------------------------------------------------------

--
-- Table structure for table `tblgroup`
--

DROP TABLE IF EXISTS `tblgroup`;
CREATE TABLE IF NOT EXISTS `tblgroup` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `groupname` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblgroup`
--

INSERT INTO `tblgroup` (`ID`, `groupname`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

DROP TABLE IF EXISTS `tblproduct`;
CREATE TABLE IF NOT EXISTS `tblproduct` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `productID` varchar(15) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  `expirydate` varchar(25) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `price` varchar(12) NOT NULL,
  `photo` varchar(3000) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`ID`, `productID`, `product_name`, `category`, `expirydate`, `qty`, `price`, `photo`) VALUES
(1, '23764', 'Bosca', 'Tablet', '2023-11-03', '111', '231', '../uploadImage/drug.jpeg'),
(2, '23423', 'Panadol', 'Tablet', '2023-08-28', '227', '233', '../uploadImage/home.jpg'),
(3, '908876', 'Paracetamol', 'pills', '2023-08-29', '22', '50', '../uploadImage/logo-banner.png'),
(4, '12345', 'Antibiotics', 'Prescription Medicines', '2026-08-15', '45', '12.50', '../assets/images/products/Antibiotics.jpg'),
(5, '23456', 'Cardiovascular', 'Prescription Medicines', '2026-10-20', '32', '18.75', '../assets/images/products/cardiovascular.png'),
(6, '34567', 'Diabetes Care', 'Prescription Medicines', '2026-06-10', '8', '25.00', '../assets/images/products/Diabetes-Care.png'),
(7, '45678', 'Mental Health', 'Prescription Medicines', '2027-01-05', '28', '22.50', '../assets/images/products/Mental-Health.png'),
(8, '56789', 'Pain Relief', 'Over-the-Counter Medicines', '2026-12-30', '85', '6.50', '../assets/images/products/Pain-Relief.png'),
(9, '67890', 'Cold & Flu', 'Over-the-Counter Medicines', '2026-09-15', '52', '8.99', '../assets/images/products/cold-&-flu.png'),
(10, '78901', 'Allergy Relief', 'Over-the-Counter Medicines', '2026-11-22', '38', '7.50', '../assets/images/products/Allergy-Relief.png'),
(11, '89012', 'Digestive Health', 'Over-the-Counter Medicines', '2027-02-14', '41', '5.99', '../assets/images/products/Digestive-Health.png'),
(12, '90123', 'Eye Care', 'Over-the-Counter Medicines', '2026-07-18', '12', '9.50', '../assets/images/products/Eye-Care.png'),
(13, '01234', 'Skin Treatments', 'Over-the-Counter Medicines', '2026-10-05', '29', '14.50', '../assets/images/products/Skin-Treatments.png'),
(14, '11235', 'Sleep Aids', 'Over-the-Counter Medicines', '2026-08-20', '33', '11.99', '../assets/images/products/Sleep-Aids.png'),
(15, '22346', 'First Aid', 'Over-the-Counter Medicines', '2027-03-10', '56', '4.99', '../assets/images/products/First-Aid.png'),
(16, '33457', 'Vitamin D', 'Vitamins & Supplements', '2027-05-20', '64', '10.50', '../assets/images/products/Vitamin-D.png'),
(17, '44568', 'Vitamin C', 'Vitamins & Supplements', '2026-12-15', '78', '8.75', '../assets/images/products/Vitamin-C.png'),
(18, '55679', 'Multivitamins', 'Vitamins & Supplements', '2027-01-30', '45', '15.99', '../assets/images/products/Multivitamins.png'),
(19, '66780', 'Omega-3', 'Vitamins & Supplements', '2026-09-25', '35', '16.50', '../assets/images/products/Omega-3.png'),
(20, '77891', 'Calcium', 'Vitamins & Supplements', '2027-02-28', '50', '12.99', '../assets/images/products/Calcium.png'),
(21, '88902', 'B-Complex', 'Vitamins & Supplements', '2026-11-10', '42', '9.99', '../assets/images/products/B-Complex.png'),
(22, '99013', 'Protein Supplements', 'Vitamins & Supplements', '2027-04-15', '31', '24.50', '../assets/images/products/Protein-Supplements.png'),
(23, '10124', 'Herbal Supplements', 'Vitamins & Supplements', '2026-08-22', '27', '13.75', '../assets/images/products/Herbal-Supplements.png'),
(24, '21235', 'Infant Formula', 'Baby & Child Care', '2026-06-30', '26', '28.50', '../assets/images/products/Infant-Formula.png'),
(25, '32346', 'Diapers & Wipes', 'Baby & Child Care', '2027-01-15', '89', '19.99', '../assets/images/products/diapers-&-wipes.png'),
(26, '43457', 'Baby Skincare', 'Baby & Child Care', '2026-10-20', '44', '11.50', '../assets/images/products/Baby-Skincare.png'),
(27, '54568', 'Baby Health', 'Baby & Child Care', '2026-12-05', '7', '14.75', '../assets/images/products/Baby-Health.png'),
(28, '65679', 'Skincare', 'Personal Care & Hygiene', '2026-11-30', '37', '17.50', '../assets/images/products/Skincare.png'),
(29, '76780', 'Oral Care', 'Personal Care & Hygiene', '2027-03-18', '61', '5.50', '../assets/images/products/Oral-Care.png'),
(30, '87891', 'Deodorants', 'Personal Care & Hygiene', '2026-07-25', '48', '6.99', '../assets/images/products/Deodorants.png'),
(31, '98902', 'Sun Protection', 'Personal Care & Hygiene', '2026-05-15', '3', '12.50', '../assets/images/products/sun-protection.png'),
(32, '09013', 'Hair Care', 'Personal Care & Hygiene', '2026-09-10', '11', '10.99', '../assets/images/products/Hair-Care.png'),
(33, '10124', 'Hand Sanitizers', 'Personal Care & Hygiene', '2027-02-20', '72', '4.75', '../assets/images/products/Hand-Sanitizers.png'),
(34, '21235', 'Women\'s Health', 'Personal Care & Hygiene', '2026-10-12', '25', '8.50', '../assets/images/products/Womens-Health.png'),
(35, '32346', 'Men\'s Health', 'Personal Care & Hygiene', '2026-12-28', '19', '9.75', '../assets/images/products/Mens-Health.png'),
(36, '43457', 'Blood Pressure Monitors', 'Medical Equipment & Devices', '2028-06-15', '15', '65.00', '../assets/images/products/Blood-Pressure-Monitors.png'),
(37, '54568', 'Glucose Meters', 'Medical Equipment & Devices', '2028-04-20', '12', '45.50', '../assets/images/products/Glucose-Meters.png'),
(38, '65679', 'Thermometers', 'Medical Equipment & Devices', '2028-08-10', '28', '19.75', '../assets/images/products/Thermometers.png'),
(39, '76780', 'Nebulizers', 'Medical Equipment & Devices', '2028-02-28', '6', '78.50', '../assets/images/products/Nebulizers.png'),
(40, '87891', 'Mobility Aids', 'Medical Equipment & Devices', '2028-11-30', '22', '35.99', '../assets/images/products/Mobility-Aids.png'),
(41, '98902', 'Compression Stockings', 'Medical Equipment & Devices', '2028-09-15', '18', '42.50', '../assets/images/products/Compression-Stockings.png'),
(42, '09013', 'Scales', 'Medical Equipment & Devices', '2028-07-22', '11', '21', '../assets/images/products/Scales.png'),
(43, '10124', 'Diabetic Supplies', 'Medical Equipment & Devices', '2026-05-30', '4', '22.75', '../assets/images/products/Diabetic-Supplies.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblstock`
--

DROP TABLE IF EXISTS `tblstock`;
CREATE TABLE IF NOT EXISTS `tblstock` (
  `purchaseID` int NOT NULL AUTO_INCREMENT,
  `productID` int NOT NULL,
  `stockDate` date NOT NULL,
  `drugName` varchar(255) NOT NULL,
  `unitPrice` float NOT NULL DEFAULT '0',
  `quantity` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`purchaseID`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstock`
--

INSERT INTO `tblstock` (`purchaseID`, `productID`, `stockDate`, `drugName`, `unitPrice`, `quantity`) VALUES
(63, 23764, '2023-08-24', 'Bosca', 231, 10),
(64, 23423, '2023-08-25', 'Panadol', 233, 110),
(66, 12345, '2026-02-04', 'Antibiotics', 8.5, 45),
(67, 23456, '2026-02-04', 'Cardiovascular', 12.75, 32),
(68, 34567, '2026-02-04', 'Diabetes Care', 18, 8),
(69, 45678, '2026-02-04', 'Mental Health', 15.5, 28),
(70, 56789, '2026-02-04', 'Pain Relief', 4.5, 85),
(71, 67890, '2026-02-04', 'Cold & Flu', 6.25, 52),
(72, 78901, '2026-02-04', 'Allergy Relief', 5.5, 38),
(73, 89012, '2026-02-04', 'Digestive Health', 4, 41),
(74, 90123, '2026-02-04', 'Eye Care', 7, 12),
(75, 1234, '2026-02-04', 'Skin Treatments', 10, 29),
(76, 11235, '2026-02-04', 'Sleep Aids', 8.5, 33),
(77, 22346, '2026-02-04', 'First Aid', 3.5, 56),
(78, 33457, '2026-02-04', 'Vitamin D', 7.5, 64),
(79, 44568, '2026-02-04', 'Vitamin C', 6, 78),
(80, 55679, '2026-02-04', 'Multivitamins', 11, 45),
(81, 66780, '2026-02-04', 'Omega-3', 12, 35),
(82, 77891, '2026-02-04', 'Calcium', 9.5, 50),
(83, 88902, '2026-02-04', 'B-Complex', 7, 42),
(84, 99013, '2026-02-04', 'Protein Supplements', 18, 31),
(85, 10124, '2026-02-04', 'Herbal Supplements', 10, 27),
(86, 21235, '2026-02-04', 'Infant Formula', 16, 22),
(87, 32346, '2026-02-04', 'Diapers & Wipes', 3.5, 95),
(88, 43457, '2026-02-04', 'Baby Skincare', 9, 18),
(89, 54568, '2026-02-04', 'Baby Health', 11.5, 24),
(90, 65679, '2026-02-04', 'Blood Pressure Monitor', 45, 8),
(91, 76780, '2026-02-04', 'Thermometer', 12, 19),
(92, 87891, '2026-02-04', 'Glucose Meter', 28, 6),
(93, 98902, '2026-02-04', 'Pulse Oximeter', 35.5, 11),
(94, 9013, '2026-02-04', 'Tooth Care', 5.5, 47),
(95, 10124, '2026-02-04', 'Hair Care', 7.5, 39),
(96, 21235, '2026-02-04', 'Foot Care', 8, 16),
(97, 32346, '2026-02-04', 'Body Care', 6.5, 44),
(98, 43457, '2026-02-04', 'Feminine Hygiene', 4.5, 72),
(99, 54568, '2026-02-04', 'Pregnancy Support', 14, 19),
(100, 65679, '2026-02-04', 'Menopausal Health', 12.5, 13),
(101, 76780, '2026-02-04', 'Hair Growth Solutions', 15, 11),
(102, 87891, '2026-02-04', 'Energy Boosters', 13, 28),
(103, 98902, '2026-02-04', 'Joint Support', 11.5, 26),
(104, 9013, '2026-02-04', 'Memory Support', 16.5, 15),
(105, 10124, '2026-02-04', 'Digestive Enzymes', 9.5, 21);

-- --------------------------------------------------------

--
-- Table structure for table `tblsupplier`
--

DROP TABLE IF EXISTS `tblsupplier`;
CREATE TABLE IF NOT EXISTS `tblsupplier` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(35) NOT NULL,
  `address` varchar(44) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblsupplier`
--

INSERT INTO `tblsupplier` (`ID`, `supplier_name`, `address`) VALUES
(1, 'emmasco drugs', '90 Imek rd'),
(2, 'Orange drugs ltd', '11 Aba rd'),
(4, 'Mathew Mark', '1234 Westtern Street, Main Area');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `lastaccess` varchar(30) NOT NULL,
  `last_ip` varchar(30) NOT NULL,
  `groupname` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `status` varchar(1) NOT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `photo` varchar(5000) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `email`, `fullname`, `password`, `lastaccess`, `last_ip`, `groupname`, `phone`, `status`, `date_created`, `photo`) VALUES
(1, 'admin@life4allpharmacy.test', 'ADMIN', '$2y$10$gFlr0zSR0EIPIMT2ZkUex.8KDUiELtcBn6/7bmi8NykvLacfghjZy', '2026-02-04 15:35:50', '127.0.0.1', 'Super Admin', '08067361023', '1', '2026-02-04 14:34:17', 'uploadImage/joseph.jpg'),
(3, 'staff@gmail.com', 'Lydia Wills', '123456789', 'NA', 'NA', 'Staff', '01234567893', '0', '2026-02-04 14:34:17', 'uploadImage/anna.jpg'),
(4, 'staff2@gmail.com', 'Mercy Miral', '$2y$10$gFlr0zSR0EIPIMT2ZkUex.8KDUiELtcBn6/7bmi8NykvLacfghjZy', 'NA', 'NA', 'Staff', '012345678', '1', '2026-02-04 14:43:38', 'uploadImage/exc.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
