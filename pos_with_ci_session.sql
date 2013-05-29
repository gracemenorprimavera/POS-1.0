-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2013 at 10:46 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `account_id` int(8) NOT NULL AUTO_INCREMENT,
  `role` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `role`, `password`) VALUES
(1, 'admin', 'admeen'),
(2, 'cashier', 'cache');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('bb594da666a3a160924ef7283335f6ac', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.94 Safari/537.36', 1369817172, 'a:1:{s:13:"cart_contents";a:3:{s:32:"4de3714cec3e124b85c329fb792371f9";a:6:{s:5:"rowid";s:32:"4de3714cec3e124b85c329fb792371f9";s:2:"id";s:6:"CHA151";s:3:"qty";s:1:"1";s:5:"price";s:4:"9.65";s:4:"name";s:8:"Champion";s:8:"subtotal";d:9.6500000000000003552713678800500929355621337890625;}s:11:"total_items";i:1;s:10:"cart_total";d:9.6500000000000003552713678800500929355621337890625;}}');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(8) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(125) NOT NULL,
  `balance` float NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `balance`) VALUES
(1, 'cashier', 0),
(2, 'credit', 10);

-- --------------------------------------------------------

--
-- Table structure for table `delivered_item`
--

CREATE TABLE IF NOT EXISTS `delivered_item` (
  `delivery_id` int(8) NOT NULL,
  `item_code` varchar(125) NOT NULL,
  `quantity` int(8) NOT NULL,
  `price` float NOT NULL,
  KEY `fk_delivered_delivery` (`delivery_id`),
  KEY `fk_delivered_item` (`item_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `supplier_id` int(8) NOT NULL,
  `delivery_id` int(8) NOT NULL AUTO_INCREMENT,
  `date_delivered` date NOT NULL,
  PRIMARY KEY (`delivery_id`),
  KEY `fk_delivery_supplier` (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_code` varchar(125) NOT NULL,
  `bar_code` varchar(125) NOT NULL,
  `desc1` varchar(125) DEFAULT NULL,
  `desc2` varchar(125) DEFAULT NULL,
  `desc3` varchar(125) DEFAULT NULL,
  `desc4` varchar(125) DEFAULT NULL,
  `group` varchar(125) DEFAULT NULL,
  `class1` varchar(125) DEFAULT NULL,
  `class2` varchar(125) DEFAULT NULL,
  `cost` double NOT NULL,
  `retail_price` double NOT NULL,
  `model_quantity` varchar(125) DEFAULT NULL,
  `supplier_code` varchar(125) DEFAULT NULL,
  `manufacturer` varchar(125) DEFAULT NULL,
  `quantity` int(8) NOT NULL,
  `reorder_point` int(8) DEFAULT NULL,
  PRIMARY KEY (`item_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_code`, `bar_code`, `desc1`, `desc2`, `desc3`, `desc4`, `group`, `class1`, `class2`, `cost`, `retail_price`, `model_quantity`, `supplier_code`, `manufacturer`, `quantity`, `reorder_point`) VALUES
('CEN43', '748485100418', 'Century ', 'Tuna Flakes ', 'Hot and Spicy ', '155g', 'Food', 'Sea Foods- Tuna', '', 24.5, 27.5, '', 'Suy Sing', 'Century Pacific Group', 255, 55),
('CHA151', '4806501705422', 'Champion', 'Detergent Powder ', 'Infinity ', '70g', 'Non-Food', 'Laundry Products- Detergent Powder', '', 8.51, 9.65, '', 'Suy Sing', 'Peerless Products Manufacturing Corp.', 255, 55),
('DEL216', '4800024562739', 'Del Monte', 'Pineapple Juice ', 'w/ ACE', '1.36L', 'Food', 'RTD- Juices', '', 55.99, 63.75, '', 'World Power Zone', 'Del Monte Phils. Inc.', 255, 5),
('IC1', '48037105', 'Fortune ', 'Cigarette', 'Red Soft Pack', '20''s', 'Non-Food', 'Cigarettes', '', 24.5, 26.5, '', 'PMFTC Inc.', 'PMFTC Inc.', 255, 55),
('IC2', '48037105', 'Fortune ', 'Cigarette', 'Red Soft Pack', '20''s', 'Non-Food', 'Cigarettes', '', 24.5, 26.5, '', 'PMFTC Inc.', 'PMFTC Inc.', 255, 55),
('IC3', '4808680021355', 'Lady''s Choice ', 'Mayonnaise ', '', '80mL', 'Food', 'Salad Aids', '', 25.53, 29.75, '', 'DDI', 'Unilever', 255, 55),
('IC4', '4902430429399', 'Rejoice ', 'Shampoo ', '3 in 1 ', '70mL', 'Non-Food', 'Hair Care- Shampoo', '', 37.02, 43.5, '', 'RGPI', ' Procter & Gamble ', 255, 55),
('IC5', '4801668601228', 'UFC Golden Fiesta', 'Corn Oil ', '', '1L', 'Food', 'Cooking Oil', '', 150.43, 171, '', 'Triple J', 'NutriAsia', 255, 55),
('IC6', '4800016653094', 'Jack ''n Jill Mr. Chips', 'Nacho ', 'Cheese 100g', '100g', 'Food', 'Snacks', '', 17.13, 21, '', 'PGG', 'URC', 255, 55),
('IC7', '4800092113444', 'Rebisco Super Thin ', 'Crackers', 'Cheese', '30g', 'Food', 'Biscuits, Cookies and Cakes', '', 4.32, 5, '', 'RZM', 'Republic Biscuit Corp.', 255, 55);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(8) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(125) NOT NULL,
  `manufacturer` varchar(125) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `manufacturer`) VALUES
(4, 'leslie', 'msg'),
(5, 'honda', 'mitsubishi'),
(6, 'PGG', 'PGG'),
(7, 'Suy Sing', 'Suya');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `trans_id` int(8) NOT NULL AUTO_INCREMENT,
  `customer_id` int(8) NOT NULL,
  `trans_date` date NOT NULL,
  PRIMARY KEY (`trans_id`),
  KEY `fk_trans_customers` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `customer_id`, `trans_date`) VALUES
(7, 1, '2013-05-28'),
(8, 1, '2013-05-28'),
(9, 1, '2013-05-29'),
(10, 1, '2013-05-29'),
(11, 1, '2013-05-29'),
(12, 1, '2013-05-29'),
(13, 1, '2013-05-29'),
(14, 1, '2013-05-29'),
(15, 1, '2013-05-29'),
(16, 1, '2013-05-29'),
(17, 1, '2013-05-29'),
(18, 1, '2013-05-29'),
(19, 1, '2013-05-29'),
(20, 2, '2013-05-29'),
(21, 2, '2013-05-29'),
(22, 2, '2013-05-29'),
(23, 2, '2013-05-29'),
(24, 1, '2013-05-29'),
(25, 1, '2013-05-29'),
(26, 1, '2013-05-29'),
(27, 1, '2013-05-29'),
(28, 1, '2013-05-29'),
(29, 1, '2013-05-29'),
(30, 1, '2013-05-29'),
(31, 1, '2013-05-29'),
(32, 1, '2013-05-29'),
(33, 1, '2013-05-29'),
(34, 1, '2013-05-29'),
(35, 1, '2013-05-29'),
(36, 1, '2013-05-29'),
(37, 1, '2013-05-29'),
(38, 1, '2013-05-29'),
(39, 2, '0000-00-00'),
(40, 2, '2013-05-29'),
(41, 2, '2013-05-29'),
(42, 2, '2013-05-29'),
(43, 1, '2013-05-29'),
(44, 1, '2013-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `trans_details`
--

CREATE TABLE IF NOT EXISTS `trans_details` (
  `trans_id` int(8) NOT NULL,
  `item_code` varchar(125) NOT NULL,
  `quantity` int(8) NOT NULL,
  `price` float NOT NULL,
  KEY `fk_details_trans` (`trans_id`),
  KEY `fk_trans_item` (`item_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_details`
--

INSERT INTO `trans_details` (`trans_id`, `item_code`, `quantity`, `price`) VALUES
(12, 'CEN43', 1, 27.5),
(12, 'IC1', 2, 53),
(13, 'CEN43', 1, 27.5),
(13, 'IC1', 2, 53),
(13, 'CHA151', 3, 28.95),
(14, 'CHA151', 3, 28.95),
(16, 'IC1', 2, 53),
(16, 'CEN43', 1, 27.5),
(17, 'CEN43', 1, 27.5),
(18, 'IC1', 1, 26.5),
(20, 'CHA151', 1, 9.65),
(36, 'CHA151', 2, 19.3),
(38, 'IC1', 1, 26.5),
(39, 'IC1', 1, 26.5),
(40, 'IC1', 1, 26.5),
(41, 'CHA151', 2, 19.3),
(41, 'IC1', 2, 53),
(41, 'CEN43', 6, 165),
(43, 'CHA151', 2, 19.3),
(43, 'IC1', 1, 26.5),
(43, 'CEN43', 1, 27.5),
(43, 'IC7', 1, 5),
(43, 'IC5', 1, 171),
(43, 'IC4', 1, 43.5),
(43, 'DEL216', 1, 63.75);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivered_item`
--
ALTER TABLE `delivered_item`
  ADD CONSTRAINT `delivered_item_ibfk_1` FOREIGN KEY (`delivery_id`) REFERENCES `delivery` (`delivery_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `delivered_item_ibfk_2` FOREIGN KEY (`item_code`) REFERENCES `item` (`item_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trans_details`
--
ALTER TABLE `trans_details`
  ADD CONSTRAINT `trans_details_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `item` (`item_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trans_details_ibfk_2` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`trans_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
