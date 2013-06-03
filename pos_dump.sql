-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2013 at 06:30 AM
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
('ac080f0b15a2486720437103473c371d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.94 Safari/537.36', 1370233518, 'a:1:{s:9:"user_data";s:0:"";}');

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
(1, 'cashier', -2),
(2, 'credit', 6);

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

--
-- Dumping data for table `delivered_item`
--

INSERT INTO `delivered_item` (`delivery_id`, `item_code`, `quantity`, `price`) VALUES
(12, 'CEN43', 2, 8),
(12, 'CHA151', 2, 0),
(13, 'CEN43', 1, 8),
(13, 'CHA151', 1, 0),
(14, 'CEN43', 1, 8),
(14, 'CHA151', 1, 0),
(15, 'CEN43', 2, 24.5),
(16, 'CEN43', 2, 24.5),
(17, 'CEN43', 5, 24.5),
(18, 'CEN43', 2, 24.5);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `supplier_id` int(8) NOT NULL,
  `delivery_id` int(8) NOT NULL AUTO_INCREMENT,
  `date_delivered` date NOT NULL,
  `description` varchar(225) DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  PRIMARY KEY (`delivery_id`),
  KEY `fk_delivery_supplier` (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`supplier_id`, `delivery_id`, `date_delivered`, `description`, `total_amount`) VALUES
(6, 1, '2013-05-29', '', NULL),
(7, 2, '2013-05-29', '', NULL),
(7, 3, '2013-05-29', '', NULL),
(7, 4, '2013-05-29', 'Hi', NULL),
(6, 5, '2013-05-29', '', NULL),
(6, 6, '2013-05-29', '', NULL),
(7, 7, '2013-05-29', '', NULL),
(7, 8, '2013-05-29', '', NULL),
(7, 9, '2013-05-29', '', NULL),
(7, 10, '2013-05-29', 'Trial', NULL),
(7, 11, '2013-05-29', 'Trial 2', NULL),
(7, 12, '2013-05-29', 'Trial 3', NULL),
(7, 13, '2013-05-29', 'T4', NULL),
(7, 14, '2013-05-29', '', NULL),
(7, 15, '2013-05-29', '', NULL),
(7, 16, '2013-05-29', '', NULL),
(7, 17, '2013-05-29', '', NULL),
(7, 18, '2013-05-29', '', 49);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `expense_id` int(8) NOT NULL AUTO_INCREMENT,
  `date_expense` date NOT NULL,
  `amount` float NOT NULL,
  `description` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`expense_id`)
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
('CEN43', '748485100418', 'Century ', 'Tuna Flakes ', 'Hot and Spicy ', '155g', 'Food', 'Sea Foods- Tuna', '', 24.5, 27.5, '', 'Suy Sing', 'Century Pacific Group', 260, 55),
('CHA151', '4806501705422', 'Champion', 'Detergent Powder ', 'Infinity ', '70g', 'Non-Food', 'Laundry Products- Detergent Powder', '', 8.51, 9.65, '', 'Suy Sing', 'Peerless Products Manufacturing Corp.', 251, 55),
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
-- Table structure for table `outgoing`
--

CREATE TABLE IF NOT EXISTS `outgoing` (
  `outgoing_id` int(8) NOT NULL AUTO_INCREMENT,
  `date_out` date NOT NULL,
  `description` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`outgoing_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `out_item`
--

CREATE TABLE IF NOT EXISTS `out_item` (
  `outgoing_id` int(8) NOT NULL,
  `item_code` varchar(125) NOT NULL,
  `quantity` int(8) NOT NULL,
  `price` float NOT NULL,
  KEY `fk_outitem_outgoing` (`outgoing_id`),
  KEY `fk_out_item` (`item_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `total_amount` float DEFAULT NULL,
  PRIMARY KEY (`trans_id`),
  KEY `fk_trans_customers` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `customer_id`, `trans_date`, `total_amount`) VALUES
(7, 1, '2013-05-28', NULL),
(8, 1, '2013-05-28', NULL),
(9, 1, '2013-05-29', NULL),
(10, 1, '2013-05-29', NULL),
(11, 1, '2013-05-29', NULL),
(12, 1, '2013-05-29', NULL),
(13, 1, '2013-05-29', NULL),
(14, 1, '2013-05-29', NULL),
(15, 1, '2013-05-29', NULL),
(16, 1, '2013-05-29', NULL),
(17, 1, '2013-05-29', NULL),
(18, 1, '2013-05-29', NULL),
(19, 1, '2013-05-29', NULL),
(20, 2, '2013-05-29', NULL),
(21, 2, '2013-05-29', NULL),
(22, 2, '2013-05-29', NULL),
(23, 2, '2013-05-29', NULL),
(24, 1, '2013-05-29', NULL),
(25, 1, '2013-05-29', NULL),
(26, 1, '2013-05-29', NULL),
(27, 1, '2013-05-29', NULL),
(28, 1, '2013-05-29', NULL),
(29, 1, '2013-05-29', NULL),
(30, 1, '2013-05-29', NULL),
(31, 1, '2013-05-29', NULL),
(32, 1, '2013-05-29', NULL),
(33, 1, '2013-05-29', NULL),
(34, 1, '2013-05-29', NULL),
(35, 1, '2013-05-29', NULL),
(36, 1, '2013-05-29', NULL),
(37, 1, '2013-05-29', NULL),
(38, 1, '2013-05-29', NULL),
(39, 2, '0000-00-00', NULL),
(40, 2, '2013-05-29', NULL),
(41, 2, '2013-05-29', NULL),
(42, 2, '2013-05-29', NULL),
(43, 1, '2013-05-29', NULL),
(44, 1, '2013-05-29', NULL),
(45, 1, '2013-05-29', NULL),
(46, 1, '2013-05-29', NULL),
(47, 1, '2013-05-29', NULL),
(48, 1, '2013-05-29', NULL),
(49, 1, '2013-05-29', NULL),
(50, 1, '2013-05-29', NULL),
(51, 1, '2013-05-29', NULL),
(52, 1, '2013-05-29', NULL),
(53, 1, '2013-05-29', NULL),
(54, 1, '2013-05-29', NULL),
(55, 1, '2013-05-29', 55),
(56, 1, '2013-06-03', 9.65),
(57, 1, '2013-06-03', 28.95);

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
(43, 'DEL216', 1, 63.75),
(46, 'CEN43', 2, 55),
(47, 'CEN43', 2, 55),
(48, 'CEN43', 2, 55),
(50, 'CEN43', 2, 55),
(53, 'CEN43', 2, 55),
(54, 'CEN43', 2, 55),
(55, 'CEN43', 2, 55),
(56, 'CHA151', 1, 9.65),
(57, 'CHA151', 3, 28.95);

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
-- Constraints for table `outgoing`
--
ALTER TABLE `outgoing`
  ADD CONSTRAINT `outgoing_ibfk_1` FOREIGN KEY (`outgoing_id`) REFERENCES `out_item` (`outgoing_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `out_item`
--
ALTER TABLE `out_item`
  ADD CONSTRAINT `out_item_ibfk_1` FOREIGN KEY (`item_code`) REFERENCES `item` (`item_code`) ON DELETE CASCADE ON UPDATE CASCADE;

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
