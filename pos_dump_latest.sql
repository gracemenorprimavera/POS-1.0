-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2013 at 02:41 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `role`, `password`) VALUES
(1, 'admin', 'admeen'),
(2, 'cashier', 'cache'),
(3, 'manager', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `amount`
--

CREATE TABLE IF NOT EXISTS `amount` (
  `amount_id` int(8) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `opening_bills` double NOT NULL DEFAULT '0',
  `opening_coins` double NOT NULL DEFAULT '0',
  `opening_total` double NOT NULL DEFAULT '0',
  `closing_bills` double NOT NULL DEFAULT '0',
  `closing_coins` double NOT NULL DEFAULT '0',
  `closing_total` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`amount_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `amount`
--

INSERT INTO `amount` (`amount_id`, `date`, `opening_bills`, `opening_coins`, `opening_total`, `closing_bills`, `closing_coins`, `closing_total`) VALUES
(1, '2013-06-04', 640, 640, 1280, 640, 640, 640);

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
('705dd20dc3a8426408da58a8bb018638', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.94 Safari/537.36', 1370608385, 'a:1:{s:9:"user_data";s:0:"";}');

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

CREATE TABLE IF NOT EXISTS `credits` (
  `credit_id` int(8) NOT NULL AUTO_INCREMENT,
  `customer_id` int(8) NOT NULL,
  `credit_date` date NOT NULL,
  `total_amount` float DEFAULT NULL,
  PRIMARY KEY (`credit_id`),
  KEY `fk_trans_customers` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

-- --------------------------------------------------------

--
-- Table structure for table `credit_details`
--

CREATE TABLE IF NOT EXISTS `credit_details` (
  `credit_id` int(8) NOT NULL,
  `item_code` varchar(125) NOT NULL,
  `division` varchar(125) DEFAULT NULL,
  `quantity` int(8) NOT NULL,
  `price` float NOT NULL,
  KEY `fk_details_credit` (`credit_id`),
  KEY `fk_trans_item` (`item_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(8) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(125) NOT NULL,
  `contact_number` varchar(125) NOT NULL,
  `address` varchar(225) DEFAULT NULL,
  `balance` float NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `contact_number`, `address`, `balance`) VALUES
(1, 'juana', '09261839622', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `daily_report`
--

CREATE TABLE IF NOT EXISTS `daily_report` (
  `report_id` int(8) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `open_amt` float NOT NULL,
  `close_amt` float NOT NULL,
  `cash_box` float NOT NULL,
  `pos_sales` float NOT NULL,
  `discrepancy` float NOT NULL,
  `expenses` float NOT NULL,
  `in_amount` float NOT NULL,
  `credit` float NOT NULL,
  `load_bal` float NOT NULL,
  `load_in` float NOT NULL,
  `div_grocery` float NOT NULL,
  `div_poultry` float NOT NULL,
  `div_pet` float NOT NULL,
  `div_load` float NOT NULL,
  `out_amount` float DEFAULT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `delivery_id` int(8) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(8) NOT NULL,
  `date_delivered` date NOT NULL,
  `description` varchar(225) DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  PRIMARY KEY (`delivery_id`),
  KEY `fk_delivery_supplier` (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `expense_id` int(8) NOT NULL AUTO_INCREMENT,
  `date_expense` date NOT NULL,
  `amount` float NOT NULL,
  `description` varchar(225) DEFAULT NULL,
  `status` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`expense_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(8) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(125) NOT NULL,
  `bar_code` varchar(125) NOT NULL,
  `desc1` varchar(125) DEFAULT NULL,
  `desc2` varchar(125) DEFAULT NULL,
  `desc3` varchar(125) DEFAULT NULL,
  `desc4` varchar(125) DEFAULT NULL,
  `division` varchar(125) DEFAULT NULL,
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
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_code`, `bar_code`, `desc1`, `desc2`, `desc3`, `desc4`, `division`, `group`, `class1`, `class2`, `cost`, `retail_price`, `model_quantity`, `supplier_code`, `manufacturer`, `quantity`, `reorder_point`) VALUES
(1, 'CHA151', '2792822', 'Champion', 'Detergent Powder ', 'Infinity ', '70g', 'grocery', 'Non-Food', 'Laundry Products- Detergent Powder', '', 8.51, 9.65, '', 'Suy Sing', 'Peerless Products Manufacturing Corp.', 227, 55),
(2, 'DEL216', '4800024562739', 'Del Monte', 'Pineapple Juice ', 'w/ ACE', '1.36L', 'grocery', 'Food', 'RTD- Juices', '', 55.99, 63.75, '', 'World Power Zone', 'Del Monte Phils. Inc.', 254, 5),
(3, 'IC1', '48037105', 'Fortune ', 'Cigarette', 'Red Soft Pack', '20''s', 'grocery', 'Non-Food', 'Cigarettes', '', 24.5, 26.5, '', 'PMFTC Inc.', 'PMFTC Inc.', 255, 55),
(4, 'IC2', '48037105', 'Fortune ', 'Cigarette', 'Red Soft Pack', '20''s', 'grocery', 'Non-Food', 'Cigarettes', '', 24.5, 26.5, '', 'PMFTC Inc.', 'PMFTC Inc.', 255, 55),
(5, 'IC3', '4808680021355', 'Lady''s Choice ', 'Mayonnaise ', '', '80mL', 'grocery', 'Food', 'Salad Aids', '', 25.53, 29.75, '', 'DDI', 'Unilever', 255, 55),
(6, 'IC4', '4902430429399', 'Rejoice ', 'Shampoo ', '3 in 1 ', '70mL', 'grocery', 'Non-Food', 'Hair Care- Shampoo', '', 37.02, 43.5, '', 'RGPI', ' Procter & Gamble ', 255, 55),
(7, 'IC5', '4801668601228', 'UFC Golden Fiesta', 'Corn Oil ', '', '1L', 'grocery', 'Food', 'Cooking Oil', '', 150.43, 171, '', 'Triple J', 'NutriAsia', 255, 55),
(8, 'IC6', '4800016653094', 'Jack ''n Jill Mr. Chips', 'Nacho ', 'Cheese 100g', '100g', 'grocery', 'Food', 'Snacks', '', 17.13, 21, '', 'PGG', 'URC', 260, 55),
(9, 'IC7', '4800092113444', 'Rebisco Super Thin ', 'Crackers', 'Cheese', '30g', 'grocery', 'Food', 'Biscuits, Cookies and Cakes', '', 4.32, 5, '', 'RZM', 'Republic Biscuit Corp.', 255, 55);

-- --------------------------------------------------------

--
-- Table structure for table `outgoing`
--

CREATE TABLE IF NOT EXISTS `outgoing` (
  `outgoing_id` int(8) NOT NULL AUTO_INCREMENT,
  `status` varchar(125) DEFAULT NULL,
  `date_out` date NOT NULL,
  `description` varchar(225) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  PRIMARY KEY (`outgoing_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `trans_id` int(8) NOT NULL AUTO_INCREMENT,
  `trans_date` date NOT NULL,
  `total_amount` float DEFAULT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `trans_date`, `total_amount`) VALUES
(1, '2013-06-07', 19.3),
(2, '2013-06-07', 19.3),
(3, '2013-06-07', 73.4),
(4, '2013-06-07', 9.65),
(5, '2013-06-07', 9.65);

-- --------------------------------------------------------

--
-- Table structure for table `trans_details`
--

CREATE TABLE IF NOT EXISTS `trans_details` (
  `trans_id` int(8) NOT NULL,
  `item_code` varchar(125) NOT NULL,
  `division` varchar(125) DEFAULT NULL,
  `quantity` int(8) NOT NULL,
  `price` float NOT NULL,
  KEY `fk_details_trans` (`trans_id`),
  KEY `fk_trans_item` (`item_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_details`
--

INSERT INTO `trans_details` (`trans_id`, `item_code`, `division`, `quantity`, `price`) VALUES
(1, 'CHA151', 'grocery', 2, 19.3),
(2, 'CHA151', 'grocery', 2, 19.3),
(3, 'CHA151', 'grocery', 1, 9.65),
(3, 'DEL216', 'grocery', 1, 63.75),
(4, 'CHA151', 'grocery', 1, 9.65),
(5, 'CHA151', 'grocery', 1, 9.65);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
