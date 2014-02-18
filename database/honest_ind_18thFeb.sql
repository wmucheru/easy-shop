-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2014 at 08:07 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `honest_ind`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `email`, `username`, `password`, `date_created`) VALUES
(1, 'William', 'Kungu', 'willyk99@gmail.com', 'william', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', '2014-02-09 22:15:36'),
(2, 'Muriuki', 'Honest', 'muriuki@yahoo.com', 'muriuki', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', '2014-02-09 22:07:30'),
(3, 'Another', 'Admin', 'honadmin@gmail.com', 'honadmin', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', '2014-02-09 22:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE IF NOT EXISTS `buyers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `date_added`, `deleted`, `fname`, `lname`, `email`, `phone`, `address`, `city`, `postcode`, `country`, `password`) VALUES
(1, '0000-00-00 00:00:00', 0, 'Miriam', 'Wangari', 'miriam@yahoo.com', '0722111222', '12344', 'Kikuyu', '00902', 'Kenya', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
(2, '0000-00-00 00:00:00', 0, 'William', 'Mucheru', 'willyk99@gmail.com', '0726353233', '1282', 'Kikuyu', '00902', 'Kenya', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
(4, '0000-00-00 00:00:00', 0, 'Michael', 'Maina', 'mike@yahoo.com', '0723456098', '0998', 'Voi', '00948', 'Kenya', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `date_added`) VALUES
(1, 'Aloe Soaps', 'aloe.jpg', '2014-02-13 13:31:17'),
(2, 'Neem Soaps (Mwarubaini)', 'neem.jpg', '2014-02-13 13:31:35'),
(3, 'Cocunut Oil Soaps', 'coconut.jpg', '2014-02-13 13:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `total` decimal(10,0) unsigned NOT NULL,
  `date_ordered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `paid` varchar(10) NOT NULL DEFAULT 'no',
  `delivered` varchar(10) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `name`, `email`, `phone`, `address`, `postal_code`, `city`, `country`, `total`, `date_ordered`, `paid`, `delivered`) VALUES
(1, 'William', 'willyk99@yahoo.com', '+254726353233', '12344', '00902', 'Kikuyu', 'Kenya', '8700', '0000-00-00 00:00:00', 'no', 'no'),
(2, 'Mary', 'mary@yahoo.com', '0723456098', '12344', '00902', 'Kikuyu', 'Kenya', '35850', '0000-00-00 00:00:00', 'no', 'no'),
(3, 'Mary', 'mary@yahoo.com', '0723456098', '12344', '00902', 'Kikuyu', 'Kenya', '35850', '0000-00-00 00:00:00', 'no', 'no'),
(4, 'Mega Industries', 'mega@gmail.com', '0726323413', '2344', '00902', 'Nairobi', 'Kenya', '35850', '0000-00-00 00:00:00', 'no', 'no'),
(5, 'Megamind Industries', 'mega@gmail.com', '0726323413', '2344', '00902', 'Nairobi', 'Kenya', '35850', '0000-00-00 00:00:00', 'no', 'no'),
(6, 'Erastus Kibira', 'erastus@yahoo.com', '0712333445', 'ejfnerf', 'fwfw', 'fwfwf', 'fwfwf', '14200', '0000-00-00 00:00:00', 'no', 'no'),
(7, 'Alice Wanjiru', 'alice@yahoo.com', '0732123908', '3409', '00102', 'Nakuru', 'Kenya', '0', '2011-10-28 12:17:46', 'no', 'no'),
(8, 'Alice Wanjiru', 'alice@yahoo.com', '0732123908', '3409', '00102', 'Voi', 'Kenya', '10650', '2011-10-28 12:20:40', 'no', 'no'),
(9, 'Alice Wanjiru', 'alice@yahoo.com', '0732123908', '3409', '00102', 'Voi', 'Kenya', '10650', '2011-10-28 12:23:07', 'no', 'no'),
(10, 'Alice Wanjiru', 'alice@yahoo.com', '0732123908', '3409', '00102', 'Voi', 'Kenya', '10650', '2011-10-28 12:23:24', 'no', 'no'),
(11, 'Quantum Technologies', 'willyk99@yahoo.com', '254726353233', '12344', '00902', 'Kikuyu', 'Kenya', '16750', '2011-10-28 12:25:35', 'no', 'no'),
(12, 'Qweqwe', 'qeqe@yahoo.com', '0726323413', '2344', 'eqeq', 'qeqe', 'qeqe', '16750', '2011-10-28 12:32:37', 'no', 'no'),
(13, 'Quantum Technologies', 'willyk99@yahoo.com', '254726353233', '12344', '00902', 'Kikuyu', 'Kenya', '16750', '2011-10-28 12:33:31', 'no', 'no'),
(14, 'Megamind Industries', 'willyk99@yahoo.com', '254726353233', '12344', '00902', 'Kikuyu', 'Kenya', '16750', '2011-10-28 12:51:58', 'no', 'no'),
(15, 'William', 'willyk99@yahoo.com', '254726353233', '12344', '00902', 'Kikuyu', 'Kenya', '16750', '2011-10-28 12:52:43', 'no', 'no'),
(16, 'Anne Tech', 'willyk99@yahoo.com', '254726353233', '12344', '00902', 'Kikuyu', 'Kenya', '16750', '2011-10-28 12:55:31', 'no', 'no'),
(17, 'Extra Foods', 'willyk99@yahoo.com', '254726353233', '12344', '00902', 'Kikuyu', 'Kenya', '17050', '2011-10-28 12:56:57', 'no', 'no'),
(18, 'Extra Foods', 'willyk99@yahoo.com', '254726353233', '12344', '00902', 'Kikuyu', 'Kenya', '17050', '2011-10-28 12:57:46', 'no', 'no'),
(19, 'Extra Foods', 'willyk99@yahoo.com', '254726353233', '12344', '00902', 'Kikuyu', 'Kenya', '17050', '2011-10-28 12:58:00', 'no', 'no'),
(20, 'Erastus Kibira', 'willyk99@yahoo.com', '254726353233', '12344', '00902', 'Kikuyu', 'Kenya', '17050', '2011-10-28 12:58:32', 'yes', 'yes'),
(21, 'Erastus Kibira', 'willyk99@yahoo.com', '254726353233', '12344', '00902', 'Kikuyu', 'Kenya', '17050', '2011-10-28 13:00:11', 'no', 'no'),
(22, 'Mike Nderitu', 'mike@yahoo.com', '0724123098', '1234', '00100', 'Nairobi', 'Kenya', '16750', '2011-10-28 13:11:55', 'no', 'no'),
(23, 'William', 'willyk99@yahoo.com', '254726353233', '12344', '00902', 'Kikuyu', 'Kenya', '55350', '2011-10-28 13:15:07', 'no', 'no'),
(24, 'Quantum Technologies', 'willyk99@yahoo.com', '254726353233', '12344', '00902', 'Kikuyu', 'Kenya', '26700', '2011-10-29 10:15:43', 'no', 'no'),
(25, 'Mirinda High School', 'willyk99@yahoo.com', '254726353233', '12344', '00902', 'Kikuyu', 'Kenya', '4900', '2011-10-29 14:01:25', 'no', 'no'),
(26, 'Ann Wanjiru', 'annwan@yahoo.com', '0726353232', '1209', '00987', 'Kitui', 'Kenya', '3550', '2011-10-29 16:51:19', 'no', 'no'),
(27, 'Quantum Technologies', 'willyk99@yahoo.com', '254726353233', '12344', '00902', 'Kikuyu', 'Kenya', '600', '2011-10-29 16:58:45', 'no', 'no'),
(28, 'Suzan Wanjiru', 'suzie@yahoo.com', '0731123456', '12345', '00292', 'Kisumu', 'Kenya', '66760', '2011-10-30 08:19:26', 'no', 'no'),
(29, 'William', 'willyk99@yahoo.com', '254726353233', '12344', '00902', 'Kikuyu', 'Kenya', '1400', '2011-10-30 08:34:52', 'no', 'no'),
(30, 'Quantum Technologies', 'willyk99@yahoo.com', '254726353233', '12344', '00902', 'Kikuyu', 'Kenya', '1400', '2011-10-30 12:09:27', 'no', 'no'),
(31, 'Hotel Mwaka', 'product@mwaka.com', '+254732908444', '9084', '00104', 'Eldoret', 'Kenya', '1550', '2011-10-30 16:33:27', 'no', 'no'),
(32, 'Quantum Technologies', 'willyk99@yahoo.com', '254726353233', '12344', '00902', 'Kikuyu', 'Kenya', '1300', '2011-10-31 11:50:40', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE IF NOT EXISTS `order_products` (
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `quantity` int(10) unsigned DEFAULT NULL,
  `qty` int(10) unsigned NOT NULL,
  `subtotal` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_id`, `product_id`, `name`, `unit`, `quantity`, `qty`, `subtotal`) VALUES
(1, 7, 'Green Maize', 'Ext Bag', 115, 2, '4350'),
(2, 7, 'Green Maize', 'Ext Bag', 115, 2, '4350'),
(2, 11, 'Green Gram', 'Bag', 90, 3, '9050'),
(3, 7, 'Green Maize', 'Ext Bag', 115, 2, '4350'),
(3, 11, 'Green Gram', 'Bag', 90, 3, '9050'),
(4, 7, 'Green Maize', 'Ext Bag', 115, 2, '4350'),
(4, 11, 'Green Gram', 'Bag', 90, 3, '9050'),
(5, 7, 'Green Maize', 'Ext Bag', 115, 2, '4350'),
(5, 11, 'Green Gram', 'Bag', 90, 3, '9050'),
(6, 38, 'White Irish Potatoes', 'Bag', 110, 4, '3550'),
(10, 38, 'White Irish Potatoes', 'Bag', 110, 3, '3550'),
(11, 38, 'White Irish Potatoes', 'Bag', 110, 3, '3550'),
(11, 6, 'Dry Maize', 'Bag', 90, 2, '3050'),
(12, 38, 'White Irish Potatoes', 'Bag', 110, 3, '3550'),
(12, 6, 'Dry Maize', 'Bag', 90, 2, '3050'),
(13, 38, 'White Irish Potatoes', 'Bag', 110, 3, '3550'),
(13, 6, 'Dry Maize', 'Bag', 90, 2, '3050'),
(14, 38, 'White Irish Potatoes', 'Bag', 110, 3, '3550'),
(14, 6, 'Dry Maize', 'Bag', 90, 2, '3050'),
(15, 38, 'White Irish Potatoes', 'Bag', 110, 3, '3550'),
(15, 6, 'Dry Maize', 'Bag', 90, 2, '3050'),
(16, 38, 'White Irish Potatoes', 'Bag', 110, 3, '3550'),
(16, 6, 'Dry Maize', 'Bag', 90, 2, '3050'),
(17, 38, 'White Irish Potatoes', 'Bag', 110, 3, '3550'),
(17, 6, 'Dry Maize', 'Bag', 90, 2, '3050'),
(18, 38, 'White Irish Potatoes', 'Bag', 110, 3, '3550'),
(18, 6, 'Dry Maize', 'Bag', 90, 2, '3050'),
(19, 38, 'White Irish Potatoes', 'Bag', 110, 3, '3550'),
(19, 6, 'Dry Maize', 'Bag', 90, 2, '3050'),
(20, 38, 'White Irish Potatoes', 'Bag', 110, 3, '3550'),
(20, 6, 'Dry Maize', 'Bag', 90, 2, '3050'),
(21, 38, 'White Irish Potatoes', 'Bag', 110, 3, '3550'),
(21, 6, 'Dry Maize', 'Bag', 90, 2, '3050'),
(21, 41, 'Strawberries', '', NULL, 1, '300'),
(22, 38, 'White Irish Potatoes', 'Bag', 110, 3, '3550'),
(22, 6, 'Dry Maize', 'Bag', 90, 2, '3050'),
(23, 9, 'Sorghum', 'Bag', 90, 4, '4050'),
(23, 14, 'Groundnuts', 'Bag', 110, 3, '13050'),
(24, 42, 'Eggs', 'Tray', NULL, 2, '300'),
(24, 14, 'Groundnuts', 'Bag', 110, 2, '13050'),
(25, 31, 'Lemons', 'Bag', 95, 2, '2450'),
(26, 37, 'Red Irish Potatoes', 'Bag', 110, 1, '3550'),
(27, 42, 'Eggs', 'Tray', NULL, 2, '300'),
(28, 37, 'Red Irish Potatoes', 'Bag', 110, 3, '3550'),
(28, 16, 'Cooking Bananas', 'Bunch', 22, 2, '700'),
(28, 55, 'Herrings', 'Weight', 1, 1, '310'),
(28, 38, 'White Irish Potatoes', 'Bag', 110, 5, '3550'),
(28, 39, 'Cassava', 'Bag', 99, 4, '2350'),
(28, 30, 'Oranges', 'Bag', 93, 3, '3050'),
(28, 11, 'Green Gram', 'Bag', 90, 2, '9050'),
(29, 16, 'Cooking Bananas', 'Bunch', 22, 2, '700'),
(30, 16, 'Cooking Bananas', 'Bunch', 22, 2, '700'),
(31, 51, 'Red Snapper', 'Weight', 1, 5, '310'),
(32, 62, 'Prawns', 'Weight', 1, 2, '650');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `quantity` int(10) unsigned DEFAULT NULL,
  `price` decimal(13,2) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `option_name` varchar(255) DEFAULT NULL,
  `option_values` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `unit`, `quantity`, `price`, `description`, `image`, `option_name`, `option_values`) VALUES
(1, 1, 'Aloe Care Soap', 'Box', 20, '2400.00', 'AloeCare Soap keeps your skin healthy, smooth and provides instant glow. This soap extracts from Organic Aloe Vera that cleanse, hydrates the skin and helps in mitigating inflammation  and repairing the damaged cuticles. Provides rich lather.<br/><br/>\r\n\r\n<b>Ingredients: Saponified Coconut Oil, Organic Aloe Vera, Glycerine & Rosemary Extract</b>\r\n', 'aloe-care-soap.png', NULL, NULL),
(2, 1, 'Aloe Vera Soap', 'Box', 20, '2500.00', 'Original Aloe Vera Soap is able to protect and cure fungal and bacterial skin infections like Ringworms, Scabies, Acne, Dandruff, Allergies, Pimples, Foot Infections (Athletes Foot & Foot Rots) and Rashes. It also smoothens the skin. It is excellent for the whole family.<br/><br/>\r\n\r\n<b>Ingredients: Saponified Coconut Oil, Organic Aloe Vera, Glycerine & Rosemary Extract</b>', 'aloe-vera-soap.png', NULL, NULL),
(3, 2, 'Neem Original Soap', 'Box', 20, '2200.00', 'Original Mwarubaini Soap is able to protect and cure fungal and bacterial skin infections like Ringworms, Scabies, Acne, Dandruff, Allergies, Pimples, Foot Infections (Athletes Foot & Foot Rots) and Rashes. It also smoothens the skin.<br/><br/>\r\nIt is excellent for the whole family.<br/><br/>\r\n\r\n<b>Ingredients: Coconut Oil, Rosemary, Neem Oil and Aloe Vera</b>\r\n', 'neem-original-soap.png', NULL, NULL),
(4, 2, 'Neem Perfumed Soap', 'Box', 20, '2300.00', 'Original Mwarubaini Soap is able to protect and cure fungal and bacterial skin infections like Ringworms, Scabies, Acne, Dandruff, Allergies, Pimples, Foot Infections (Athletes Foot & Foot Rots) and Rashes. It also smoothens the skin. It is excellent for the whole family.<br/><br/>\r\n\r\n<b>Ingredients: Coconut Oil, Rosemary, Neem Oil and Aloe Vera</b>\r\n', 'neem-perfumed-soap.png', NULL, NULL),
(5, 3, 'Rose Coconut Soap', 'Box', 20, '2600.00', 'Organic Essential Oil and Coconut Extract will help you clean your mind of the day’s worries. Coconut Natural Soap helps to balance feminine hormone, reduce sadness and depression. Magic soap cleans and nourishes the skin. Great lather and good for the soul.<br/><br/>\r\n\r\n<b>Ingredients: Saponified Organic Coconut Oil, Glycerine, enriched with Rosemary Essential Oil & Coconut Water.</b>\r\n', 'rose-coconut-soap.png', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
