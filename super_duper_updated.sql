-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2013 at 06:43 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `amount`
--

INSERT INTO `amount` (`amount_id`, `date`, `opening_bills`, `opening_coins`, `opening_total`, `closing_bills`, `closing_coins`, `closing_total`) VALUES
(1, '2013-05-25', 100, 100, 200, 1000, 1000, 2000),
(2, '2013-05-26', 200, 150, 350, 2030, 970, 3000),
(3, '2013-05-27', 200, 60, 260, 2890, 16, 2906),
(4, '2013-05-28', 370, 60, 430, 2890, 10, 2900),
(5, '2013-05-29', 187, 10, 187, 2000, 10, 2010),
(7, '2013-06-08', 890, 10, 900, 3740, 15, 3755),
(8, '2013-06-08', 1870, 16, 1886, 3740, 15, 3755),
(9, '2013-06-08', 420, 30, 450, 3740, 15, 3755),
(10, '2013-06-08', 1870, 16, 1886, 3740, 15, 3755);

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
('8d15ea8e5ab137488b029ea7b1615a6d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1370693363, ''),
('d9c57363af9257908c2d02827e8c3ddf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1370691562, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;s:4:"open";b:1;}'),
('e186aee7b91db1adae42e74d5b2242c7', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1370709802, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;}');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `credits`
--

INSERT INTO `credits` (`credit_id`, `customer_id`, `credit_date`, `total_amount`) VALUES
(1, 1, '2013-05-25', 19.3),
(2, 2, '2013-05-25', 19.3),
(3, 1, '2013-05-27', 73.4),
(4, 1, '2013-05-28', 9.65),
(5, 2, '2013-05-29', 9.65),
(6, 1, '2013-05-29', 160.25),
(60, 1, '2013-06-08', 38.6),
(61, 1, '2013-06-08', 38.6),
(62, 1, '2013-06-08', 405.75),
(63, 1, '2013-06-08', 308),
(64, 1, '2013-06-08', 127.5);

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

--
-- Dumping data for table `credit_details`
--

INSERT INTO `credit_details` (`credit_id`, `item_code`, `division`, `quantity`, `price`) VALUES
(1, '1', 'grocery', 2, 19.3),
(2, '1', 'grocery', 2, 19.3),
(3, '1', 'grocery', 1, 9.65),
(3, '2', 'grocery', 1, 63.75),
(4, '1', 'grocery', 1, 9.65),
(5, '1', 'grocery', 1, 9.65),
(6, '1', 'grocery', 10, 96.5),
(6, '2', 'grocery', 1, 63.75),
(60, '1', 'grocery', 4, 38.6),
(61, '1', 'grocery', 4, 38.6),
(62, '2', 'grocery', 1, 63.75),
(62, '7', 'grocery', 2, 342),
(63, '2', 'grocery', 4, 255),
(63, '3', 'grocery', 2, 53),
(64, '2', 'grocery', 2, 127.5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `contact_number`, `address`, `balance`) VALUES
(1, 'juana', '09261839622', '', 707.5),
(2, 'Kulit', '09211234567', 'LB', 950);

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
  `out_amount` float DEFAULT NULL,
  `credit` float NOT NULL,
  `load_bal` float NOT NULL,
  `load_in` float NOT NULL,
  `div_grocery` float NOT NULL,
  `div_poultry` float NOT NULL,
  `div_pet` float NOT NULL,
  `div_load` float NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `daily_report`
--

INSERT INTO `daily_report` (`report_id`, `date`, `open_amt`, `close_amt`, `cash_box`, `pos_sales`, `discrepancy`, `expenses`, `in_amount`, `out_amount`, `credit`, `load_bal`, `load_in`, `div_grocery`, `div_poultry`, `div_pet`, `div_load`) VALUES
(25, '2013-06-07', 1280, 5000, 3720, 291.55, 3428.45, 500, 51.39, 318.75, 100, 0, 0, 525.2, 0, 0, 0),
(26, '2013-06-07', 1280, 5000, 3720, 291.55, 3428.45, 500, 51.39, 318.75, 100, 0, 0, 525.2, 0, 0, 0),
(27, '2013-06-07', 1280, 5000, 3720, 291.55, 3428.45, 500, 51.39, 318.75, 100, 0, 0, 525.2, 0, 0, 0),
(28, '2013-06-07', 1280, 5000, 3720, 291.55, 3428.45, 500, 51.39, 318.75, 100, 0, 0, 525.2, 0, 0, 0),
(29, '2013-06-07', 1280, 5000, 3720, 291.55, 3428.45, 500, 51.39, 318.75, 100, 0, 0, 525.2, 0, 0, 0),
(30, '2013-06-07', 1280, 5000, 3720, 291.55, 3428.45, 500, 51.39, 318.75, 100, 0, 0, 525.2, 0, 0, 0),
(31, '2013-06-08', 0, 0, 0, 0, 0, 300, 0, NULL, 0, 0, 0, 0, 0, 0, 0),
(32, '2013-06-08', 0, 0, 0, 774.65, -774.65, 760, 647.39, 63.75, 918.45, 0, 0, 1230.55, 0, 0, 0);

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
(26, 'IC6', 1, 17.13),
(26, 'IC6', 2, 34.26),
(27, 'CHA151', 2, 17.02),
(27, 'CHA151', 1, 8.51),
(28, 'DEL216', 10, 559.9),
(29, 'IC1', 2, 49),
(30, 'IC7', 1, 4.32),
(30, 'IC7', 2, 8.64);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `supplier_id`, `date_delivered`, `description`, `total_amount`) VALUES
(26, 6, '2013-06-07', '', 51.39),
(27, 1, '2013-06-08', 'some text over here', 25.53),
(28, 2, '2013-06-08', 'World Power Zone', 559.9),
(29, 3, '2013-06-08', 'Inc', 49),
(30, 8, '2013-06-08', '', 12.96);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `expense_id` int(8) NOT NULL AUTO_INCREMENT,
  `date_expense` date NOT NULL,
  `status` varchar(125) DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`expense_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `date_expense`, `status`, `description`, `amount`) VALUES
(1, '2013-06-07', 'salary', 'Yu', 200),
(2, '2013-06-07', 'salary', 'yow', 300),
(3, '2013-06-08', 'salary', 'yow', 300),
(4, '2013-06-08', 'salary', 'Salary of Chuchu', 260),
(5, '2013-06-08', 'remittance', 'LBC Remit', 200);

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
(1, 'CHA151', '2792822', 'Champion', 'Detergent Powder ', 'Infinity ', '70g', 'grocery', 'Non-Food', 'Laundry Products- Detergent Powder', '', 8.51, 9.65, '', 'Suy Sing', 'Peerless Products Manufacturing Corp.', 230, 55),
(2, 'DEL216', '4800047820182', 'Del Monte', 'Pineapple Juice ', 'w/ ACE', '1.36L', 'grocery', 'Food', 'RTD- Juices', '', 55.99, 63.75, '', 'World Power Zone', 'Del Monte Phils. Inc.', 264, 5),
(3, 'IC1', '4808888413709', 'Fortune ', 'Cigarette', 'Red Soft Pack', '20''s', 'grocery', 'Non-Food', 'Cigarettes', '', 24.5, 26.5, '', 'PMFTC Inc.', 'PMFTC Inc.', 257, 55),
(4, 'IC2', '48037105', 'Fortune ', 'Cigarette', 'Red Soft Pack', '20''s', 'grocery', 'Non-Food', 'Cigarettes', '', 24.5, 26.5, '', 'PMFTC Inc.', 'PMFTC Inc.', 255, 55),
(5, 'IC3', '4808680021355', 'Lady''s Choice ', 'Mayonnaise ', '', '80mL', 'grocery', 'Food', 'Salad Aids', '', 25.53, 29.75, '', 'DDI', 'Unilever', 255, 55),
(6, 'IC4', '4902430429399', 'Rejoice ', 'Shampoo ', '3 in 1 ', '70mL', 'grocery', 'Non-Food', 'Hair Care- Shampoo', '', 37.02, 43.5, '', 'RGPI', ' Procter & Gamble ', 255, 55),
(7, 'IC5', '4801668601228', 'UFC Golden Fiesta', 'Corn Oil ', '', '1L', 'grocery', 'Food', 'Cooking Oil', '', 150.43, 171, '', 'Triple J', 'NutriAsia', 255, 55),
(8, 'IC6', '4800016653094', 'Jack ''n Jill Mr. Chips', 'Nacho ', 'Cheese 100g', '100g', 'grocery', 'Food', 'Snacks', '', 17.13, 21, '', 'PGG', 'URC', 263, 55),
(9, 'IC7', '4800092113444', 'Rebisco Super Thin ', 'Crackers', 'Cheese', '30g', 'grocery', 'Food', 'Biscuits, Cookies and Cakes', '', 4.32, 5, '', 'RZM', 'Republic Biscuit Corp.', 258, 55);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `outgoing`
--

INSERT INTO `outgoing` (`outgoing_id`, `status`, `date_out`, `description`, `amount`) VALUES
(17, 'transfer', '2013-06-07', 'transfer', 63.75),
(18, 'return', '2013-06-07', 'rp', 127.5),
(19, 'bad_order', '2013-06-07', 'bo', 127.5),
(20, 'transfer', '2013-06-08', 'transfer', 63.75);

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

--
-- Dumping data for table `out_item`
--

INSERT INTO `out_item` (`outgoing_id`, `item_code`, `quantity`, `price`) VALUES
(17, 'Champion', 64, 9.65),
(18, 'Del Monte', 2, 63.75),
(19, 'Del Monte', 2, 127.5),
(20, 'Del Monte', 1, 63.75);

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE IF NOT EXISTS `payment_details` (
  `payment_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `customer_id` tinyint(8) NOT NULL,
  `amount_paid` float NOT NULL,
  `balance` float NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`payment_id`, `date`, `customer_id`, `amount_paid`, `balance`) VALUES
(1, '2013-06-08', 2, 50, 0),
(2, '2013-06-08', 1, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(8) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(125) NOT NULL,
  `manufacturer` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `manufacturer`) VALUES
(1, 'Suy Sing', 'PPMC'),
(2, 'World Power Zone', 'Del Monte Phils. Inc.'),
(3, 'PMFTC Inc.', 'PGG'),
(4, 'DDI', 'Unilever'),
(5, 'RGPI', 'Proctor & Gamble'),
(6, 'Triple J', 'NutriAsia'),
(7, 'PGG', 'URC'),
(8, 'RZM', 'Republic Biscuit Corp.');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `trans_id` int(8) NOT NULL AUTO_INCREMENT,
  `trans_date` date NOT NULL,
  `total_amount` float DEFAULT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `trans_date`, `total_amount`) VALUES
(1, '2013-05-25', 19.3),
(2, '2013-05-25', 19.3),
(3, '2013-05-27', 73.4),
(4, '2013-05-28', 9.65),
(5, '2013-05-29', 9.65),
(6, '2013-05-29', 160.25),
(7, '2013-06-08', 455.9),
(8, '2013-06-08', 127.5),
(9, '2013-06-08', 63.75),
(10, '2013-06-08', 127.5);

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
(1, '1', 'grocery', 2, 19.3),
(2, '1', 'grocery', 2, 19.3),
(3, '1', 'grocery', 1, 9.65),
(3, '2', 'grocery', 1, 63.75),
(4, '1', 'grocery', 1, 9.65),
(5, '1', 'grocery', 1, 9.65),
(6, '1', 'grocery', 10, 96.5),
(6, '2', 'grocery', 1, 63.75),
(7, '1', 'grocery', 1, 9.65),
(7, '2', 'grocery', 7, 446.25),
(8, '2', 'grocery', 2, 127.5),
(9, '2', 'grocery', 1, 63.75),
(10, '2', 'grocery', 2, 127.5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
