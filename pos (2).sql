-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2013 at 10:25 AM
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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'cashier', '93585797569d208d914078d513c8c55a'),
(3, 'manager', '37bd0d3935b47be2ab57bcf91b57f499');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `amount`
--

INSERT INTO `amount` (`amount_id`, `date`, `opening_bills`, `opening_coins`, `opening_total`, `closing_bills`, `closing_coins`, `closing_total`) VALUES
(48, '2013-06-20', 1600, 400, 2000, 2000, 1000, 3000),
(50, '2013-06-21', 1300, 200, 1500, 1000, 2500, 3500);

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
('04774ae2105548c07e19e87f0e30241d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371711756, 'a:3:{s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:9:"validated";b:1;}'),
('09a2b9d705598ad340449eae916370a5', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371206215, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;s:4:"open";b:1;}'),
('0cd3f4f2ce75108d23a416adcf2e25de', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371183156, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:4:"open";b:1;s:9:"validated";b:1;}'),
('0f75df623bb5b2084dae58b37780227c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371735661, 'a:4:{s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:9:"validated";b:1;s:4:"open";b:1;}'),
('0fe2a61c751b697965e92acf848a44ba', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371728239, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:9:"validated";b:1;s:4:"open";b:1;}'),
('116351f1c24676218d1dacdf2cf63f44', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0', 1371120713, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"3";s:4:"role";s:7:"manager";s:13:"cart_contents";a:3:{s:32:"c4ca4238a0b923820dcc509a6f75849b";a:6:{s:5:"rowid";s:32:"c4ca4238a0b923820dcc509a6f75849b";s:2:"id";s:1:"1";s:3:"qty";s:1:"1";s:5:"price";s:4:"9.65";s:4:"name";s:8:"Champion";s:8:"subtotal";d:9.6500000000000003552713678800500929355621337890625;}s:11:"total_items";i:1;s:10:"cart_total";d:9.6500000000000003552713678800500929355621337890625;}}'),
('15903ec5c9f0732991b0009fd8231c31', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0', 1371733792, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:4:"open";b:1;s:9:"validated";b:1;}'),
('1bb882c1a5b69058741137c40689c2d2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371638886, 'a:3:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";}'),
('1c4740c5eaa448b5f0deef9fb267a229', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371096160, ''),
('1f4986e247add9076f9a7c6623c0963a', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1370942944, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;s:4:"open";b:1;}'),
('337aba649d7e7c59a6abd11cc648448c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371782521, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;}'),
('38e6e89f2aa24800790eaa993d2267d4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371802610, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;}'),
('3fb2c181dd0b3b4923b4fe4b8068da1f', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1370939392, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:9:"validated";b:1;s:4:"open";b:1;}'),
('6100f02ab842758fdb456119e4a49c76', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371096160, ''),
('6e6312b06e771e27f05c33770117be8d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371096160, ''),
('87ee2795329fdf20b408d885debf47bd', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371096160, ''),
('892873faa7698e886b30d58ee9c7932a', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371096160, ''),
('8d15ea8e5ab137488b029ea7b1615a6d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1370693363, ''),
('b9002ba34c179647ab7e83612abdd4b2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371096159, 'a:3:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";}'),
('b932d4927e30d0297e94d6969a68a9fb', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371638886, ''),
('d167886edb7d66b41801747a5584b923', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371206519, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;}'),
('d879362c6318cd29fecafb86a7e47cf9', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371540451, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:4:"open";b:1;s:9:"validated";b:1;}'),
('d9c57363af9257908c2d02827e8c3ddf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1370691562, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;s:4:"open";b:1;}'),
('febcb8a4313ab0994d359137c293deb2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371541662, '');

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE IF NOT EXISTS `credit` (
  `credit_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `customer_id` int(8) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(125) DEFAULT NULL,
  `amount_credit` float NOT NULL,
  `amount_paid` float NOT NULL,
  `credit_balance` float DEFAULT NULL,
  PRIMARY KEY (`credit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `credit`
--

INSERT INTO `credit` (`credit_id`, `customer_id`, `date`, `status`, `amount_credit`, `amount_paid`, `credit_balance`) VALUES
(1, 1, '2013-06-14', 'credit', 9.65, 0, 9.65),
(2, 1, '2013-06-14', 'payment', 0, 5, 4.65),
(3, 6, '2013-06-20', 'credit', 36.15, 0, 36.15);

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
  `date` date DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `contact_number`, `address`, `balance`) VALUES
(1, 'Juan', '', '', 4.65),
(5, 'Pedro', '', '', 0),
(6, 'Rosario', '', 'LB', 36.15);

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
  `out_amount` float NOT NULL,
  `credit` float NOT NULL,
  `load_bal` float NOT NULL,
  `load_in` float NOT NULL,
  `div_grocery` float NOT NULL,
  `div_poultry` float NOT NULL,
  `div_pet` float NOT NULL,
  `div_load` float NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `daily_report`
--

INSERT INTO `daily_report` (`report_id`, `date`, `open_amt`, `close_amt`, `cash_box`, `pos_sales`, `discrepancy`, `expenses`, `in_amount`, `out_amount`, `credit`, `load_bal`, `load_in`, `div_grocery`, `div_poultry`, `div_pet`, `div_load`) VALUES
(17, '2013-06-20', 0, 0, 0, 215.15, -215.15, 0, 0, 0, 0, 0, 0, 178.5, 0, 9.65, 27),
(18, '2013-06-21', 0, 0, 0, 352, -352, 0, 0, 0, 0, 0, 0, 342, 0, 0, 10);

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
(43, 'CHA1', 1, 40),
(43, 'IC1', 2, 49),
(44, 'IC5', 1, 150.43);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `supplier_id`, `date_delivered`, `description`, `total_amount`) VALUES
(43, 1, '2013-06-20', '', 89),
(44, 6, '2013-06-21', '', 150.43);

-- --------------------------------------------------------

--
-- Table structure for table `eload`
--

CREATE TABLE IF NOT EXISTS `eload` (
  `load_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `network` varchar(125) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(125) DEFAULT NULL,
  `eload` float NOT NULL DEFAULT '0',
  `wallet` float NOT NULL DEFAULT '0',
  `load_balance` float DEFAULT '0',
  `load_cash` float DEFAULT '0',
  PRIMARY KEY (`load_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `eload`
--

INSERT INTO `eload` (`load_id`, `network`, `date`, `status`, `eload`, `wallet`, `load_balance`, `load_cash`) VALUES
(14, 'smart', '2013-06-21', 'eload', 12, 150, -150, 12),
(15, 'tnt', '2013-06-21', 'eload', 10, 120, -120, 10);

-- --------------------------------------------------------

--
-- Table structure for table `eload_balance`
--

CREATE TABLE IF NOT EXISTS `eload_balance` (
  `network_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `network` varchar(125) NOT NULL,
  `balance` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`network_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `eload_balance`
--

INSERT INTO `eload_balance` (`network_id`, `network`, `balance`) VALUES
(1, 'globe', 500);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `name`) VALUES
(1, 'emp1'),
(2, 'emp2');

-- --------------------------------------------------------

--
-- Table structure for table `employee_dtr`
--

CREATE TABLE IF NOT EXISTS `employee_dtr` (
  `dtr_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `employee` varchar(125) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `work_hours` float NOT NULL,
  PRIMARY KEY (`dtr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `date_expense`, `status`, `description`, `amount`) VALUES
(24, '2013-06-20', 'salary', 'Pedro''s ', 150),
(25, '2013-06-21', 'remittance', 'LBC', 50),
(26, '2013-06-22', 'operationals', 'Ilaw', 240),
(27, '2013-06-20', 'remittance', 'pALAWAN', 100);

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
  `cost` float NOT NULL,
  `retail_price` float NOT NULL,
  `model_quantity` varchar(125) DEFAULT NULL,
  `supplier_code` varchar(125) DEFAULT NULL,
  `manufacturer` varchar(125) DEFAULT NULL,
  `quantity` int(8) NOT NULL,
  `reorder_point` int(8) DEFAULT NULL,
  `active` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_code`, `bar_code`, `desc1`, `desc2`, `desc3`, `desc4`, `division`, `group`, `class1`, `class2`, `cost`, `retail_price`, `model_quantity`, `supplier_code`, `manufacturer`, `quantity`, `reorder_point`, `active`) VALUES
(1, 'CHA1', '2910977430008', 'Champion', 'Detergent Powder ', 'Infinity ', '70g', 'pet', 'Non-Food', 'Laundry Products- Detergent Powder', '', 40, 9.65, '', 'Suy Sing', 'Peerless Products Manufacturing Corp.', 240, 55, 1),
(2, 'DEL216', '4800047820182', 'Del Monte', 'Pineapple Juice ', 'w/ ACE', '1.36L', 'poultry', 'Food', 'RTD- Juices', '', 55.99, 63.75, '', 'Suy Sing', 'Del Monte Phils. Inc.', 268, 5, 1),
(3, 'IC1', '4808888413709', 'Fortune ', 'Cigarette', 'Red Soft Pack', '20''s', 'grocery', 'Non-Food', 'Cigarettes', '', 24.5, 26.5, '', 'Suy Sing', 'PMFTC Inc.', 260, 55, 1),
(4, 'IC2', '48037105', 'Fortune ', 'Cigarette', 'Red Soft Pack', '20''s', 'grocery', 'Non-Food', 'Cigarettes', '', 24.5, 26.5, '', 'PMFTC Inc.', 'PMFTC Inc.', 255, 55, 0),
(5, 'IC3', '4808680021355', 'Lady''s Choice ', 'Mayonnaise ', '', '80mL', 'grocery', 'Food', 'Salad Aids', '', 25.53, 29.75, '', 'Suy Sing', 'Unilever', 255, 55, 1),
(6, 'IC4', '4902430429399', 'Rejoice ', 'Shampoo ', '3 in 1 ', '70mL', 'grocery', 'Non-Food', 'Hair Care- Shampoo', '', 37.02, 43.5, '', 'Suy Sing', ' Procter & Gamble ', 255, 55, 1),
(7, 'IC5', '4801668601228', 'UFC Golden Fiesta', 'Corn Oil ', '', '1L', 'grocery', 'Food', 'Cooking Oil', '', 150.43, 171, '', 'Triple J', 'NutriAsia', 257, 55, 1),
(8, 'IC6', '4800016653094', 'Jack ''n Jill Mr. Chips', 'Nacho ', 'Cheese 100g', '100g', 'grocery', 'Food', 'Snacks', '', 17.13, 21, '', 'PGG', 'URC', 263, 55, 1),
(9, 'IC7', '4807770120473', 'Rebisco Super Thin ', 'Crackers', 'Cheese', '30g', 'grocery', 'Food', 'Biscuits, Cookies and Cakes', '', 4.32, 5, '', 'RZM', 'Republic Biscuit Corp.', 258, 55, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `outgoing`
--

INSERT INTO `outgoing` (`outgoing_id`, `status`, `date_out`, `description`, `amount`) VALUES
(30, 'transfer', '2013-06-20', '', 9.65),
(31, 'return', '2013-06-22', '', 63.75);

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
(30, 'Champion', 1, 9.65),
(31, 'Del Monte', 1, 63.75);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`payment_id`, `date`, `customer_id`, `amount_paid`, `balance`) VALUES
(1, '2013-06-08', 2, 50, 0),
(2, '2013-06-08', 1, 10, 0),
(3, '2013-06-09', 1, 0.5, 0),
(4, '2013-06-09', 1, 1, 0),
(5, '2013-06-12', 3, 8.95, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(8) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(125) NOT NULL,
  `manufacturer` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

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
(8, 'RZM', 'Republic Biscuit Corp.'),
(9, 'Supplier 1', 'Manu 1'),
(10, 'Supplier Me', 'SM');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `trans_id` int(8) NOT NULL AUTO_INCREMENT,
  `trans_date` date NOT NULL,
  `total_amount` float DEFAULT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `trans_date`, `total_amount`) VALUES
(19, '2013-06-20', 188.15),
(20, '2013-06-20', 10),
(21, '2013-06-20', 17),
(22, '2013-06-21', 342),
(30, '2013-06-21', 10);

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
  `date` date DEFAULT NULL,
  KEY `fk_details_trans` (`trans_id`),
  KEY `fk_trans_item` (`item_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_details`
--

INSERT INTO `trans_details` (`trans_id`, `item_code`, `division`, `quantity`, `price`, `date`) VALUES
(19, '1', 'pet', 1, 9.65, '2013-06-20'),
(19, '6', 'grocery', 1, 43.5, '2013-06-20'),
(19, '2', 'grocery', 1, 63.75, '2013-06-20'),
(19, '4', 'grocery', 1, 26.5, '2013-06-20'),
(19, '5', 'grocery', 1, 29.75, '2013-06-20'),
(19, '9', 'grocery', 3, 15, '2013-06-20'),
(20, 'load', 'load', 0, 10, '2013-06-20'),
(21, 'load', 'load', 0, 17, '2013-06-20'),
(22, '7', 'grocery', 2, 342, '2013-06-21'),
(30, 'load', 'load', 0, 10, '2013-06-21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
