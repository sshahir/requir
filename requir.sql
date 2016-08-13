-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2016 at 08:03 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `requir`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `Name` text NOT NULL,
  `Purchase_Name` text NOT NULL,
  `Email` text NOT NULL,
  `Purchase_Email` text NOT NULL,
  `Password` text NOT NULL,
  `Phone_number` text NOT NULL,
  `Another_Phone_number` text NOT NULL,
  `Address` text NOT NULL,
  `Another_Address` text NOT NULL,
  `Landmark` text NOT NULL,
  `City` text NOT NULL,
  `Pin` text NOT NULL,
  `ID` int(11) NOT NULL,
  `IP_Address` text NOT NULL,
  `Date_Time` text NOT NULL,
  `Cart_Items` text NOT NULL,
  `Cart` int(11) NOT NULL,
  `Purchase_Info` text NOT NULL,
  `Purchase_Items` text NOT NULL,
  `Purchase` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Name`, `Purchase_Name`, `Email`, `Purchase_Email`, `Password`, `Phone_number`, `Another_Phone_number`, `Address`, `Another_Address`, `Landmark`, `City`, `Pin`, `ID`, `IP_Address`, `Date_Time`, `Cart_Items`, `Cart`, `Purchase_Info`, `Purchase_Items`, `Purchase`) VALUES
('Shahir', 'Sk Shahir Halim', 'sshahirh1994@gmail.com', 'sshahirh1994@gmail.com', 'Shahir', '8420029633', '8420029633', '18/D Jaigir ghat road , thakurpukur', '', 'West Bengal', 'kolkata', '700063', 106, '::1', 'Thu, 21 Jan 16 07:06:17 +0100', '', 0, '\r\n\r\n\r\n------\r\n\r\n\r\n\r\nName : Sk Shahir Halim\r\nEmail : sshahirh1994@gmail.com\r\nPhone Number 1 : 8420029633\r\nPhone Number 2 : 8420029633\r\nAddress 1 : 18/D Jaigir ghat road , thakurpukur\r\nAddress 2 :\r\nLandmark : West Bengal\r\nCity : kolkata\r\nPin : 700063\r\nCustomer ID : 106\r\n\r\n\r\n\r\n\r\nItems------\r\n\r\n\r\nItem Name : Gtr , Price : 10 x 20 = 200\r\n\r\n\r\nTotal Cost : 443.4 Inclusive of Shipping and Tax\r\n\r\n\r\n\r\n\r\n------\r\n\r\n\r\n\r\nName : Sk Shahir Halim\r\nEmail : sshahirh1994@gmail.com\r\nPhone Number 1 : 8420029633\r\nPhone Number 2 : 8420029633\r\nAddress 1 : 18/D Jaigir ghat road , thakurpukur\r\nAddress 2 :\r\nLandmark : opp pm burial ground\r\nCity : kolkata\r\nPin : 700063\r\nCustomer ID : 106\r\n\r\n\r\n\r\n\r\nItems------\r\n\r\n\r\nItem Name : Lptr , Price : 56 x 1 = 56\r\n\r\nItem Name : A , Price : 200 x 8 = 1600\r\n\r\n\r\nTotal Cost : 2105.352 Inclusive of Shipping and Tax\r\n\r\n\r\n\r\n\r\n------\r\n\r\n\r\n\r\nName : Sk Shahir Halim\r\nEmail : sshahirh1994@gmail.com\r\nPhone Number 1 : 8420029633\r\nPhone Number 2 : 8420029633\r\nAddress 1 : 18/D Jaigir ghat road , thakurpukur\r\nAddress 2 :\r\nLandmark : West Bengal\r\nCity : kolkata\r\nPin : 700063\r\nCustomer ID : 106\r\n\r\n\r\n\r\n\r\nItems------\r\n\r\n\r\nItem Name : A , Price : 200 x 9 = 1800\r\n\r\n\r\nTotal Cost : 2280.6 Inclusive of Shipping and Tax\r\n\n\n\n\n------\n\n\n\nName : Sk Shahir Halim\nEmail : sshahirh1994@gmail.com\nPhone Number 1 : 8420029633\nPhone Number 2 : 8420029633\nAddress 1 : 18/D Jaigir ghat road , thakurpukur\nAddress 2 :\nLandmark : West Bengal\nCity : kolkata\nPin : 700063\nCustomer ID : 106\n\n\n\n\nItems------\n\n\nItem Name : A , Price : 200 x 6 = 1200\n\n\nTotal Cost : 1520.4 Inclusive of Shipping and Tax\n', '', 0),
('', 'Sk Shahir Halim', '', 'sshahirh1994@gmail.com', '', '8420029633', '8420029633', '18/D Jaigir ghat road , thakurpukur', '', 'West Bengal', 'kolkata', '700063', 107, '192.168.0.103', '', '', 0, '\n\n\n\n------\n\n\n\nName : Sk Shahir Halim\nEmail : sshahirh1994@gmail.com\nPhone Number 1 : 8420029633\nPhone Number 2 : 8420029633\nAddress 1 : 18/D Jaigir ghat road , thakurpukur\nAddress 2 :\nLandmark : West Bengal\nCity : kolkata\nPin : 700063\nCustomer ID : 107\n\n\n\n\nItems------\n\n\nItem Name : Gtr , Price : 10 x 1 = 10\n\n\nTotal Cost : 22.17 Inclusive of Shipping and Tax\n', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', 108, '192.168.0.102', '', '', 0, '', '', 0),
('', '', '', '', '', '', '', '', '', '', '', '', 109, '192.168.0.100', '', '', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `Name` text NOT NULL,
  `ID` int(11) NOT NULL,
  `Price` text NOT NULL,
  `Path` text NOT NULL,
  `Info` text NOT NULL,
  `Details` text NOT NULL,
  `BoughtCount` int(11) NOT NULL,
  `ViewCount` int(11) NOT NULL,
  `Category` text NOT NULL,
  `Page` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Name`, `ID`, `Price`, `Path`, `Info`, `Details`, `BoughtCount`, `ViewCount`, `Category`, `Page`) VALUES
('Abcd', 2, '45', 'trending-images/2penProduct.jpg', 'Awesome Pen.', '', 0, 14, 'pen', 'writing'),
('Bcde', 3, '100', 'trending-images/3pencilProduct.jpg', 'Used to write.', '', 0, 2, 'pencil', 'writing'),
('Lptr', 4, '56', 'trending-images/4copyProduct.jpg', 'Rull Copy.', '', 0, 6, 'copy', 'copy'),
('Xyz', 5, '89', 'trending-images/5copyProduct.jpg', 'White Copy', '1 Piece White Copy.', 2, 5, 'copy', 'copy'),
('Gtr', 6, '10', 'trending-images/6whitnerProduct.jpg', 'Its a Whitner.', '', 0, 7, 'whitner', 'utilities'),
('Jty', 7, '752', 'trending-images/7diaryProduct.png', 'Its the Diary of Life.', '', 0, 11, 'diary', 'copy'),
('A', 8, '200', 'top-slider-images/8SliderProduct.jpg', 'Its awesome.', '', 0, 27, 'SliderProduct', ''),
('B', 9, '78', 'top-slider-images/9SliderProduct.jpg', 'Fabulous.', '', 0, 7, 'SliderProduct', ''),
('C', 10, '1000', 'top-slider-images/10SliderProduct.jpg', 'Mind Blowing.', '', 0, 4, 'SliderProduct', ''),
('D', 11, '569', 'top-slider-images/11SliderProduct.jpg', 'This product is really good.', '', 0, 0, 'SliderProduct', ''),
('Sqr', 12, '457', 'trending-images/12scaleProduct.jpg', 'Its a scale.', '', 0, 0, 'scale', 'writing'),
('Iuyfg', 13, '12', 'trending-images/13adhesiveProduct.jpg', 'Its a adhesive.', '', 0, 0, 'adhesive', 'utilities');

-- --------------------------------------------------------

--
-- Table structure for table `purchased`
--

CREATE TABLE IF NOT EXISTS `purchased` (
  `Customer_ID` int(11) NOT NULL,
  `Purchase_Info` text NOT NULL,
  `Order_Number` int(11) NOT NULL,
  `Time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchased`
--

INSERT INTO `purchased` (`Customer_ID`, `Purchase_Info`, `Order_Number`, `Time`) VALUES
(106, 'Name : Sk Shahir Halim\nEmail : sshahirh1994@gmail.com\nPhone Number 1 : 8420029633\nPhone Number 2 : 8420029633\nAddress 1 : 18/D Jaigir ghat road , thakurpukur\nAddress 2 :\nLandmark : West Bengal\nCity : kolkata\nPin : 700063\nCustomer ID : 106\n\n\n\n\nItems------\n\n\nItem Name : Gtr , Price : 10 x 20 = 200\n\n\nTotal Cost : 443.4\n', 18, 'Wed, 20 Jan 16 21:03:04 +0100'),
(106, 'Name : Sk Shahir Halim\nEmail : sshahirh1994@gmail.com\nPhone Number 1 : 8420029633\nPhone Number 2 : 8420029633\nAddress 1 : 18/D Jaigir ghat road , thakurpukur\nAddress 2 :\nLandmark : opp pm burial ground\nCity : kolkata\nPin : 700063\nCustomer ID : 106\n\n\n\n\nItems------\n\n\nItem Name : Lptr , Price : 56 x 1 = 56\n\nItem Name : A , Price : 200 x 8 = 1600\n\n\nTotal Cost : 2105.352\n', 19, 'Thu, 21 Jan 16 06:47:12 +0100'),
(106, 'Name : Sk Shahir Halim\nEmail : sshahirh1994@gmail.com\nPhone Number 1 : 8420029633\nPhone Number 2 : 8420029633\nAddress 1 : 18/D Jaigir ghat road , thakurpukur\nAddress 2 :\nLandmark : West Bengal\nCity : kolkata\nPin : 700063\nCustomer ID : 106\n\n\n\n\nItems------\n\n\nItem Name : A , Price : 200 x 9 = 1800\n\n\nTotal Cost : 2280.6\n', 20, 'Thu, 21 Jan 16 07:51:03 +0100'),
(106, 'Name : Sk Shahir Halim\nEmail : sshahirh1994@gmail.com\nPhone Number 1 : 8420029633\nPhone Number 2 : 8420029633\nAddress 1 : 18/D Jaigir ghat road , thakurpukur\nAddress 2 :\nLandmark : West Bengal\nCity : kolkata\nPin : 700063\nCustomer ID : 106\n\n\n\n\nItems------\n\n\nItem Name : A , Price : 200 x 6 = 1200\n\n\nTotal Cost : 1520.4\n', 21, 'Thu, 21 Jan 16 08:00:37 +0100'),
(107, 'Name : Sk Shahir Halim\nEmail : sshahirh1994@gmail.com\nPhone Number 1 : 8420029633\nPhone Number 2 : 8420029633\nAddress 1 : 18/D Jaigir ghat road , thakurpukur\nAddress 2 :\nLandmark : West Bengal\nCity : kolkata\nPin : 700063\nCustomer ID : 107\n\n\n\n\nItems------\n\n\nItem Name : Gtr , Price : 10 x 1 = 10\n\n\nTotal Cost : 22.17\n', 22, 'Thu, 21 Jan 16 16:22:06 +0100');

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE IF NOT EXISTS `track` (
  `IP` text NOT NULL,
  `Time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`IP`, `Time`) VALUES
('::1', 'Fri, 12 Feb 16 20:03:02 +0100'),
('192.168.0.103', 'Thu, 21 Jan 16 16:26:24 +0100'),
('192.168.0.102', 'Fri, 22 Jan 16 11:27:20 +0100'),
('192.168.0.100', 'Fri, 22 Jan 16 12:17:32 +0100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `purchased`
--
ALTER TABLE `purchased`
  ADD UNIQUE KEY `Customer_ID` (`Order_Number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=110;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
