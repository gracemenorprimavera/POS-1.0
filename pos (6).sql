-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2013 at 02:56 PM
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
  `account_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(125) NOT NULL,
  `role` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `name`, `role`, `password`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Cashier', 'cashier', '93585797569d208d914078d513c8c55a'),
(3, 'Manager', 'manager', '37bd0d3935b47be2ab57bcf91b57f499');

-- --------------------------------------------------------

--
-- Table structure for table `amount`
--

CREATE TABLE IF NOT EXISTS `amount` (
  `amount_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `opening_bills` decimal(10,2) NOT NULL DEFAULT '0.00',
  `opening_coins` decimal(10,2) NOT NULL DEFAULT '0.00',
  `opening_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `closing_bills` decimal(10,2) NOT NULL DEFAULT '0.00',
  `closing_coins` decimal(10,2) NOT NULL DEFAULT '0.00',
  `closing_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`amount_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `amount`
--

INSERT INTO `amount` (`amount_id`, `date`, `opening_bills`, `opening_coins`, `opening_total`, `closing_bills`, `closing_coins`, `closing_total`) VALUES
(48, '2013-06-20', 1600.00, 400.00, 2000.00, 2000.00, 1000.00, 3000.00),
(50, '2013-06-21', 1300.00, 200.00, 1500.00, 1000.00, 2500.00, 3500.00),
(51, '2013-06-22', 50.00, 0.00, 50.00, 0.00, 0.00, 0.00),
(52, '2013-06-22', 1000.00, 0.00, 1000.00, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `cashout`
--

CREATE TABLE IF NOT EXISTS `cashout` (
  `cashout_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `date_cashout` date NOT NULL,
  `status` varchar(125) NOT NULL,
  `description` varchar(225) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`cashout_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cashout_category`
--

CREATE TABLE IF NOT EXISTS `cashout_category` (
  `cashout_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `cashout` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`cashout_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `cashout_category`
--

INSERT INTO `cashout_category` (`cashout_id`, `cashout`) VALUES
(1, 'Delivery Payment'),
(2, 'Supplies'),
(3, 'Salary'),
(4, 'Rent'),
(5, 'Employee Fare Allowance'),
(6, 'Store Communication Allowance'),
(7, 'Store Food Allowance'),
(8, 'Store Maintenance/Repairs'),
(9, 'Cash Remitted'),
(10, 'test'),
(11, 'tester'),
(12, 'test2'),
(13, 'choclate'),
(14, 'test3');

-- --------------------------------------------------------

--
-- Table structure for table `check`
--

CREATE TABLE IF NOT EXISTS `check` (
  `check_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `check_num` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`check_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
('05d8de7949631f6db7cba39a316bfff7', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371877557, ''),
('09a2b9d705598ad340449eae916370a5', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371206215, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;s:4:"open";b:1;}'),
('0b98bcf16a45719a34770767ed762881', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371889474, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:4:"open";b:1;s:9:"validated";b:1;}'),
('0c176f28809909b7f5e757b8a3be65f8', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371877134, ''),
('0cd3f4f2ce75108d23a416adcf2e25de', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371183156, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:4:"open";b:1;s:9:"validated";b:1;}'),
('0f75df623bb5b2084dae58b37780227c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371735661, 'a:4:{s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:9:"validated";b:1;s:4:"open";b:1;}'),
('0fe2a61c751b697965e92acf848a44ba', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371728239, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:9:"validated";b:1;s:4:"open";b:1;}'),
('116351f1c24676218d1dacdf2cf63f44', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0', 1371120713, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"3";s:4:"role";s:7:"manager";s:13:"cart_contents";a:3:{s:32:"c4ca4238a0b923820dcc509a6f75849b";a:6:{s:5:"rowid";s:32:"c4ca4238a0b923820dcc509a6f75849b";s:2:"id";s:1:"1";s:3:"qty";s:1:"1";s:5:"price";s:4:"9.65";s:4:"name";s:8:"Champion";s:8:"subtotal";d:9.6500000000000003552713678800500929355621337890625;}s:11:"total_items";i:1;s:10:"cart_total";d:9.6500000000000003552713678800500929355621337890625;}}'),
('14633b9f22723c8829c333bf6423e3e6', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:21.0) Gecko/20100101 Firefox/21.0', 1372656122, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:13:"cart_contents";a:4:{s:32:"70efdf2ec9b086079795c442636b55fb";a:6:{s:5:"rowid";s:32:"70efdf2ec9b086079795c442636b55fb";s:2:"id";s:2:"17";s:3:"qty";s:1:"1";s:5:"price";s:4:"1.00";s:4:"name";s:5:"B-200";s:8:"subtotal";d:1;}s:32:"8f14e45fceea167a5a36dedd4bea2543";a:6:{s:5:"rowid";s:32:"8f14e45fceea167a5a36dedd4bea2543";s:2:"id";s:1:"7";s:3:"qty";s:1:"9";s:5:"price";s:6:"171.00";s:4:"name";s:17:"UFC Golden Fiesta";s:8:"subtotal";d:1539;}s:11:"total_items";i:10;s:10:"cart_total";d:1540;}s:9:"validated";b:1;}'),
('161aee6f12432c3f2ad14f85c9f1658b', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0', 1371964546, 'a:8:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:4:"open";b:1;s:5:"empid";s:1:"1";s:7:"empname";s:4:"emp1";s:9:"emp_login";b:1;s:9:"validated";b:1;}'),
('1bb882c1a5b69058741137c40689c2d2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371638886, 'a:3:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";}'),
('1c4740c5eaa448b5f0deef9fb267a229', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371096160, ''),
('1f4986e247add9076f9a7c6623c0963a', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1370942944, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;s:4:"open";b:1;}'),
('337aba649d7e7c59a6abd11cc648448c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371782521, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;}'),
('3fb2c181dd0b3b4923b4fe4b8068da1f', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1370939392, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:9:"validated";b:1;s:4:"open";b:1;}'),
('4426eec190f282c0d5f2d20d695fb0c0', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:21.0) Gecko/20100101 Firefox/21.0', 1372588669, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:13:"cart_contents";a:3:{s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";a:6:{s:5:"rowid";s:32:"eccbc87e4b5ce2fe28308fd9f2a7baf3";s:2:"id";s:1:"3";s:3:"qty";s:1:"1";s:5:"price";s:5:"26.50";s:4:"name";s:8:"Fortune ";s:8:"subtotal";d:26.5;}s:11:"total_items";i:1;s:10:"cart_total";d:26.5;}s:9:"validated";b:1;}'),
('45b0da8570d4c35efb5cad44d60951d3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371860989, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:9:"validated";b:1;}'),
('6100f02ab842758fdb456119e4a49c76', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371096160, ''),
('6e6312b06e771e27f05c33770117be8d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371096160, ''),
('6fe5c7f547c5007cb26fd35338f1d9f3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371877556, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;}'),
('79a900d247cce8b51a0214f7086c9ffc', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:21.0) Gecko/20100101 Firefox/21.0', 1372683137, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:9:"validated";b:1;}'),
('7a2ba9cb319e3a1f2f5c08569637af2c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371880869, ''),
('7b94ad3c3d3a1aa7e005345d4986b82f', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371904228, ''),
('87ee2795329fdf20b408d885debf47bd', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371096160, ''),
('892873faa7698e886b30d58ee9c7932a', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371096160, ''),
('8d15ea8e5ab137488b029ea7b1615a6d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1370693363, ''),
('906248831ab1138cef0640c6c394fdfc', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371904228, 'a:3:{s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;}'),
('9af7d52a7397aef6c8163b287826108f', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0', 1371895252, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;}'),
('9cdd4ec50c5f00eb46cb609d75fb2bab', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:21.0) Gecko/20100101 Firefox/21.0', 1372598943, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;}'),
('9eb0e639d5d92b111476412732074583', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371877952, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:9:"validated";b:1;}'),
('b8c396373cfa81170e3b6cf2ef863df1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371877134, ''),
('b9002ba34c179647ab7e83612abdd4b2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371096159, 'a:3:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";}'),
('b932d4927e30d0297e94d6969a68a9fb', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371638886, ''),
('b94e8b0a02a41deee1e7f2eb222f7409', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371877557, ''),
('c7bd56e3036c1c9fc3a2e8ec7974b77e', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371876814, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;}'),
('c898ca98e92df4d1890720679cd830b3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371947065, 'a:2:{s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";}'),
('cc9932fefb03206357c7899c70f26697', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0', 1371893743, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:4:"open";b:1;s:9:"validated";b:1;}'),
('d167886edb7d66b41801747a5584b923', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371206519, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;}'),
('d879362c6318cd29fecafb86a7e47cf9', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371540451, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"1";s:4:"role";s:5:"admin";s:4:"open";b:1;s:9:"validated";b:1;}'),
('d9c57363af9257908c2d02827e8c3ddf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1370691562, 'a:5:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;s:4:"open";b:1;}'),
('e6f7b5db88363e16b49e88a7bfb8aa80', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1371880868, 'a:4:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:9:"validated";b:1;}'),
('e80a375fa0878e469d70fe38327f4a11', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.116 Safari/537.36', 1372491893, 'a:7:{s:9:"user_data";s:0:"";s:6:"userid";s:1:"2";s:4:"role";s:7:"cashier";s:5:"empid";s:1:"1";s:7:"empname";s:4:"emp1";s:9:"emp_login";b:1;s:9:"validated";b:1;}'),
('febcb8a4313ab0994d359137c293deb2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1371541662, '');

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE IF NOT EXISTS `credit` (
  `credit_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `customer_id` tinyint(8) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(125) DEFAULT NULL,
  `amount_credit` decimal(10,2) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `credit_balance` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`credit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `credit`
--

INSERT INTO `credit` (`credit_id`, `customer_id`, `date`, `status`, `amount_credit`, `amount_paid`, `credit_balance`) VALUES
(1, 1, '2013-06-14', 'credit', 9.65, 0.00, 9.65),
(2, 1, '2013-06-14', 'payment', 0.00, 5.00, 4.65),
(3, 6, '2013-06-20', 'credit', 36.15, 0.00, 36.15);

-- --------------------------------------------------------

--
-- Table structure for table `credit_details`
--

CREATE TABLE IF NOT EXISTS `credit_details` (
  `credit_id` tinyint(8) NOT NULL,
  `item_code` tinyint(8) NOT NULL,
  `division` varchar(125) DEFAULT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date` date DEFAULT NULL,
  KEY `fk_details_credit` (`credit_id`),
  KEY `fk_trans_item` (`item_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(125) NOT NULL,
  `contact_number` varchar(125) NOT NULL,
  `address` varchar(225) DEFAULT NULL,
  `balance` decimal(10,2) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `contact_number`, `address`, `balance`) VALUES
(1, 'Juan', '', '', 4.65),
(5, 'Pedro', '', '', 0.00),
(6, 'Rosario', '', 'LB', 36.15);

-- --------------------------------------------------------

--
-- Table structure for table `daily_report`
--

CREATE TABLE IF NOT EXISTS `daily_report` (
  `report_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `open_amt` decimal(10,2) NOT NULL,
  `close_amt` decimal(10,2) NOT NULL,
  `cash_box` decimal(10,2) NOT NULL,
  `pos_sales` decimal(10,2) NOT NULL,
  `discrepancy` decimal(10,2) NOT NULL,
  `expenses` decimal(10,2) NOT NULL,
  `in_amount` decimal(10,2) NOT NULL,
  `out_amount` decimal(10,2) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  `load_bal` decimal(10,2) NOT NULL,
  `load_in` decimal(10,2) NOT NULL,
  `div_grocery` decimal(10,2) NOT NULL,
  `div_poultry` decimal(10,2) NOT NULL,
  `div_pet` decimal(10,2) NOT NULL,
  `div_load` decimal(10,2) NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `daily_report`
--

INSERT INTO `daily_report` (`report_id`, `date`, `open_amt`, `close_amt`, `cash_box`, `pos_sales`, `discrepancy`, `expenses`, `in_amount`, `out_amount`, `credit`, `load_bal`, `load_in`, `div_grocery`, `div_poultry`, `div_pet`, `div_load`) VALUES
(17, '2013-06-20', 0.00, 0.00, 0.00, 215.15, -215.15, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 178.50, 0.00, 9.65, 27.00),
(18, '2013-06-21', 0.00, 0.00, 0.00, 352.00, -352.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 342.00, 0.00, 0.00, 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `delivered_item`
--

CREATE TABLE IF NOT EXISTS `delivered_item` (
  `delivery_id` tinyint(8) NOT NULL,
  `item_code` tinyint(8) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  KEY `fk_delivered_delivery` (`delivery_id`),
  KEY `fk_delivered_item` (`item_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivered_item`
--

INSERT INTO `delivered_item` (`delivery_id`, `item_code`, `quantity`, `price`) VALUES
(43, 0, 1.00, 40.00),
(43, 0, 2.00, 49.00),
(44, 0, 1.00, 150.43);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `delivery_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `supplier_id` tinyint(8) NOT NULL,
  `date_delivered` date NOT NULL,
  `description` varchar(225) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`delivery_id`),
  KEY `fk_delivery_supplier` (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `supplier_id`, `date_delivered`, `description`, `total_amount`) VALUES
(43, 1, '2013-06-20', '', 89.00),
(44, 6, '2013-06-21', '', 150.43);

-- --------------------------------------------------------

--
-- Table structure for table `div_category`
--

CREATE TABLE IF NOT EXISTS `div_category` (
  `div_id` int(11) NOT NULL AUTO_INCREMENT,
  `division` varchar(30) NOT NULL,
  PRIMARY KEY (`div_id`),
  UNIQUE KEY `division` (`division`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `div_category`
--

INSERT INTO `div_category` (`div_id`, `division`) VALUES
(4, 'dd'),
(5, 'grocery'),
(1, 'Poultry');

-- --------------------------------------------------------

--
-- Table structure for table `eload`
--

CREATE TABLE IF NOT EXISTS `eload` (
  `load_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `network` varchar(125) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(125) DEFAULT NULL,
  `prev_balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `load_balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `amount` decimal(10,2) DEFAULT '0.00',
  `load_cost` decimal(10,2) DEFAULT '0.00',
  `profit` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`load_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `eload`
--

INSERT INTO `eload` (`load_id`, `network`, `date`, `status`, `prev_balance`, `load_balance`, `amount`, `load_cost`, `profit`) VALUES
(47, 'globe', '2013-06-22', 'wallet', 0.00, 1500.00, 0.00, 0.00, 0.00),
(48, 'sun', '2013-06-22', 'wallet', 0.00, 1200.00, 0.00, 0.00, 0.00),
(49, 'globe', '2013-06-22', 'sales', 1500.00, 1489.50, 12.00, 10.50, 1.50),
(50, 'globe', '2013-06-22', 'sales', 1489.50, 1462.00, 30.00, 27.50, 2.50),
(51, 'globe', '2013-06-22', 'sales', 1462.00, 1453.00, 12.00, 9.00, 3.00),
(52, 'globe', '2013-06-22', 'sales', 1453.00, 1444.00, 12.00, 9.00, 3.00);

-- --------------------------------------------------------

--
-- Table structure for table `eload_balance`
--

CREATE TABLE IF NOT EXISTS `eload_balance` (
  `network_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `network` varchar(125) NOT NULL,
  `balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`network_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `eload_balance`
--

INSERT INTO `eload_balance` (`network_id`, `network`, `balance`) VALUES
(1, 'globe', 1444.00),
(2, 'smart', 0.00),
(3, 'sun', 1200.00);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(125) DEFAULT NULL,
  `position` varchar(125) NOT NULL,
  `password` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `name`, `position`, `password`) VALUES
(1, 'emp1', '', 'empone'),
(2, 'emp2', '', 'emptwo');

-- --------------------------------------------------------

--
-- Table structure for table `employee_dtr`
--

CREATE TABLE IF NOT EXISTS `employee_dtr` (
  `dtr_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(125) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `work_hours` decimal(10,2) NOT NULL,
  PRIMARY KEY (`dtr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee_dtr`
--

INSERT INTO `employee_dtr` (`dtr_id`, `emp_id`, `date`, `time_in`, `time_out`, `work_hours`) VALUES
(1, '1', '2013-06-22', '08:00:00', '05:00:00', 8.00);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `expense_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `date_expense` date NOT NULL,
  `status` varchar(125) DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`expense_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `date_expense`, `status`, `description`, `amount`) VALUES
(24, '2013-06-20', 'salary', 'Pedro''s ', 150.00),
(25, '2013-06-21', 'remittance', 'LBC', 50.00),
(26, '2013-06-22', 'operationals', 'Ilaw', 240.00),
(27, '2013-06-20', 'remittance', 'pALAWAN', 100.00),
(28, '2013-06-30', '10', 'hiiii', 1200.00),
(29, '2013-06-30', '5', 'dfdfd', 111.00),
(30, '2013-06-30', '13', '11', 666.00);

-- --------------------------------------------------------

--
-- Table structure for table `expenses_category`
--

CREATE TABLE IF NOT EXISTS `expenses_category` (
  `expenses_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `expenses` varchar(225) NOT NULL,
  PRIMARY KEY (`expenses_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `expenses_category`
--

INSERT INTO `expenses_category` (`expenses_id`, `expenses`) VALUES
(1, 'Expenses');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(8) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(125) DEFAULT NULL,
  `bar_code` varchar(125) DEFAULT NULL,
  `desc1` varchar(125) DEFAULT NULL,
  `desc2` varchar(125) DEFAULT NULL,
  `desc3` varchar(125) DEFAULT NULL,
  `desc4` varchar(125) DEFAULT NULL,
  `division` varchar(125) DEFAULT NULL,
  `group` varchar(125) DEFAULT NULL,
  `class1` varchar(125) DEFAULT NULL,
  `class2` varchar(125) DEFAULT NULL,
  `cost` decimal(10,2) NOT NULL,
  `retail_price` decimal(10,2) NOT NULL,
  `model_quantity` varchar(125) DEFAULT NULL,
  `supplier_code` varchar(125) DEFAULT NULL,
  `manufacturer` varchar(125) DEFAULT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `reorder_point` int(8) DEFAULT NULL,
  `active` tinyint(3) DEFAULT '1',
  PRIMARY KEY (`item_id`),
  UNIQUE KEY `bar_code` (`bar_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=820 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_code`, `bar_code`, `desc1`, `desc2`, `desc3`, `desc4`, `division`, `group`, `class1`, `class2`, `cost`, `retail_price`, `model_quantity`, `supplier_code`, `manufacturer`, `quantity`, `reorder_point`, `active`) VALUES
(1, 'CHA1', '4809010343024', 'Champion', 'Detergent Powder ', 'Infinity ', '70g', 'pet', 'Non-Food', 'Laundry Products- Detergent Powder', '', 40.00, 9.65, '', 'Suy Sing', 'Peerless Products Manufacturing Corp.', 240.00, 55, 1),
(2, 'DEL216', '4800047820182', 'Del Monte', 'Pineapple Juice ', 'w/ ACE', '1.36L', 'poultry', 'Food', 'RTD- Juices', '', 56.00, 63.75, '', 'Suy Sing', 'Del Monte Phils. Inc.', 268.00, 5, 1),
(3, 'IC1', '4808888413709', 'Fortune ', 'Cigarette', 'Red Soft Pack', '20''s', 'grocery', 'Non-Food', 'Cigarettes', '', 25.00, 26.50, '', 'Suy Sing', 'PMFTC Inc.', 260.00, 55, 1),
(4, 'IC2', '48037105', 'Fortune ', 'Cigarette', 'Red Soft Pack', '20''s', 'grocery', 'Non-Food', 'Cigarettes', '', 25.00, 26.50, '', 'PMFTC Inc.', 'PMFTC Inc.', 255.00, 55, 1),
(5, 'IC3', '4808680021355', 'Lady''s Choice ', 'Mayonnaise ', '', '80mL', 'grocery', 'Food', 'Salad Aids', '', 26.00, 29.75, '', 'Suy Sing', 'Unilever', 255.00, 55, 1),
(6, 'IC4', '4902430429399', 'Rejoice ', 'Shampoo ', '3 in 1 ', '70mL', 'grocery', 'Non-Food', 'Hair Care- Shampoo', '', 37.00, 43.50, '', 'Suy Sing', ' Procter & Gamble ', 255.00, 55, 1),
(7, 'IC5', '4801668601228', 'UFC Golden Fiesta', 'Corn Oil ', '', '1L', 'grocery', 'Food', 'Cooking Oil', '', 150.00, 171.00, '', 'Triple J', 'NutriAsia', 257.00, 55, 1),
(8, 'IC6', '4800016653094', 'Jack ''n Jill Mr. Chips', 'Nacho ', 'Cheese 100g', '100g', 'grocery', 'Food', 'Snacks', '', 17.00, 21.00, '', 'PGG', 'URC', 263.00, 55, 1),
(9, 'IC7', '4807770120473', 'Rebisco Super Thin ', 'Crackers', 'Cheese', '30g', 'grocery', 'Food', 'Biscuits, Cookies and Cakes', '', 4.00, 5.00, '', 'RZM', 'Republic Biscuit Corp.', 258.00, 55, 1),
(11, 'BOT1', '', 'Coke Bottle', '1L', NULL, NULL, 'grocery', NULL, NULL, NULL, 7.00, 7.00, NULL, NULL, NULL, 10.00, NULL, 1),
(12, 'ITEM CODE', 'BARCODE', 'DESCRIPTION 1', 'DESCRITION 2', 'DESCRIPTION 3', 'UNITS', 'DIVISION', 'GROUP', 'CLASSIFICATION 1', 'CLASSIFICATION 2', 0.00, 0.00, ' MODEL QUANTITY ', 'SUPPLIER CODE', 'MANUFACTURER', 0.00, 0, 1),
(13, 'BOOSTINA ', NULL, 'BOOSTINA ', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'PURINA', '', 90.00, 100.00, '', 'AGRICONS', '', 0.00, 0, 1),
(14, 'BIO 800', NULL, 'BIO 800', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'PURINA', '', 50.60, 54.00, '', 'AGRICONS', '', 0.00, 0, 1),
(15, 'B-100', NULL, 'B-100', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'PURINA', '', 1.00, 1.00, '', 'AGRICONS', '', 0.00, 0, 1),
(16, 'B-100', NULL, 'B-100', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'PURINA', '', 34.20, 37.00, '', 'AGRICONS', '', 0.00, 0, 1),
(17, 'B-200', NULL, 'B-200', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'PURINA', '', 1.00, 1.00, '', 'AGRICONS', '', 0.00, 0, 1),
(18, 'B-200', NULL, 'B-200', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'PURINA', '', 33.06, 36.00, '', 'AGRICONS', '', 0.00, 0, 1),
(19, 'B-300', NULL, 'B-300', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'PURINA', '', 1.00, 1.00, '', 'AGRICONS', '', 0.00, 0, 1),
(20, 'B-300', NULL, 'B-300', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'PURINA', '', 32.20, 35.50, '', 'AGRICONS', '', 0.00, 0, 1),
(21, 'HPSP/P-BMEG', NULL, 'PRE STARTER', 'PREMIUM', '', '25 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 1.00, 1.00, '', 'JHK', '', 0.00, 0, 1),
(22, 'HPSP/P-BMEG', NULL, 'PRE STARTER', 'PREMIUM', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 43.08, 48.00, '', 'JHK', '', 0.00, 0, 1),
(23, 'HSP/P-BMEG', NULL, 'HOG STARTER PELLETS', 'PREMIUM', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 1.00, 1.00, '', 'JHK', '', 0.00, 0, 1),
(24, 'HSP/P-BMEG', NULL, 'HOG STARTER PELLETS', 'PREMIUM', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 26.30, 30.50, '', 'JHK', '', 0.00, 0, 1),
(25, 'HGP/P-BMEG', NULL, 'HOG GROWER PELLETS', 'PREMIUM', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 1.00, 1.00, '', 'JHK', '', 0.00, 0, 1),
(26, 'HGP/P-BMEG', NULL, 'HOG GROWER PELLETS', 'PREMIUM', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 24.58, 28.50, '', 'JHK', '', 0.00, 0, 1),
(27, 'PIGEON-BMEG', NULL, 'PIGEON PELLETS', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 1.00, 1.00, '', 'JHK', '', 0.00, 0, 1),
(28, 'PIGEON-BMEG', NULL, 'PIGEON PELLETS', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 21.96, 25.00, '', 'JHK', '', 0.00, 0, 1),
(29, 'INT 1K-BMEG', NULL, 'INTEGRA 1000', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 1.00, 1.00, '', 'JHK', '', 0.00, 0, 1),
(30, 'INT 1K-BMEG', NULL, 'INTEGRA 1000', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 28.86, 32.00, '', 'JHK', '', 0.00, 0, 1),
(31, 'INT 2K-BMEG', NULL, 'INTEGRA 2000', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 1.00, 1.00, '', 'JHK', '', 0.00, 0, 1),
(32, 'INT 2K-BMEG', NULL, 'INTEGRA 2000', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 27.56, 31.00, '', 'JHK', '', 0.00, 0, 1),
(33, 'INT 3K-BMEG', NULL, 'INTEGRA 3000', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 1.00, 1.00, '', 'JHK', '', 0.00, 0, 1),
(34, 'INT 3K-BMEG', NULL, 'INTEGRA 3000', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 26.36, 29.50, '', 'JHK', '', 0.00, 0, 1),
(35, 'FFM1-BMEG', NULL, 'FRY MASH 1', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 744.00, 780.00, '', 'JHK', '', 0.00, 0, 1),
(36, 'FFM1-BMEG', NULL, 'FRY MASH 1', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 29.76, 33.00, '', 'JHK', '', 0.00, 0, 1),
(37, 'FFM2-BMEG', NULL, 'FRY MASH 2', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 739.00, 775.00, '', 'JHK', '', 0.00, 0, 1),
(38, 'FFM2-BMEG', NULL, 'FRY MASH 2', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 29.56, 32.50, '', 'JHK', '', 0.00, 0, 1),
(39, 'NFJP-BMEG', NULL, 'NUTRIFLOAT JUVENILE FLOATING PELLETS', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 734.00, 770.00, '', 'JHK', '', 0.00, 0, 1),
(40, 'NFJP-BMEG', NULL, 'NUTRIFLOAT JUVENILE FLOATING PELLETS', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 29.36, 33.00, '', 'JHK', '', 0.00, 0, 1),
(41, 'NFAP-BMEG', NULL, 'NUTRIFLOAT ADULT FLOATING PELLETS', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 709.00, 745.00, '', 'JHK', '', 0.00, 0, 1),
(42, 'NFAP-BMEG', NULL, 'NUTRIFLOAT ADULT FLOATING PELLETS', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 28.36, 32.00, '', 'JHK', '', 0.00, 0, 1),
(43, 'TGSP-BMEG', NULL, 'TILAPIA GROWER SINKING PELLETS', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 709.00, 745.00, '', 'JHK', '', 0.00, 0, 1),
(44, 'TGSP-BMEG', NULL, 'TILAPIA GROWER SINKING PELLETS', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 28.36, 32.00, '', 'JHK', '', 0.00, 0, 1),
(45, 'TSC-BMEG', NULL, 'TILAPIA STARTER CRUMBLES', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 734.00, 770.00, '', 'JHK', '', 0.00, 0, 1),
(46, 'TSC-BMEG', NULL, 'TILAPIA STARTER CRUMBLES', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'BMEG', '', 29.36, 33.00, '', 'JHK', '', 0.00, 0, 1),
(47, 'PBC-LA4', NULL, 'PIGLET BOOSTER CRUMBLES', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LUCKY 4A', '', 1.00, 0.00, '', 'LUCKY 4A', '', 0.00, 0, 1),
(48, 'PBC-LA4', NULL, 'PIGLET BOOSTER CRUMBLES', '', '', 'SACHET', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LUCKY 4A', '', 63.46, 78.00, '', 'LUCKY 4A', '', 0.00, 0, 1),
(49, 'ZOOM-L4A', NULL, 'PIGGY ZOOM', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LUCKY 4A', '', 1.00, 1.00, '', 'LUCKY 4A', '', 0.00, 0, 1),
(50, 'ZOOM-L4A', NULL, 'PIGGY ZOOM', '', '', 'SACHET', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LUCKY 4A', '', 41.96, 46.00, '', 'LUCKY 4A', '', 0.00, 0, 1),
(51, 'HIGRO-L4A', NULL, 'HIGROTEK', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LUCKY 4A', '', 1.00, 1.00, '', 'LUCKY 4A', '', 0.00, 0, 1),
(52, 'HIGRO-L4A', NULL, 'HIGROTEK', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LUCKY 4A', '', 26.46, 30.00, '', 'LUCKY 4A', '', 0.00, 0, 1),
(53, 'PSP/HW-L4A', NULL, 'PIG STARTER PELLETS', 'HEALTHYWAY', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LUCKY 4A', '', 1.00, 1.00, '', 'LUCKY 4A', '', 0.00, 0, 1),
(54, 'PSP/HW-L4A', NULL, 'PIG STARTER PELLETS', 'HEALTHYWAY', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LUCKY 4A', '', 23.76, 27.00, '', 'LUCKY 4A', '', 0.00, 0, 1),
(55, 'PGP/HW-L4A', NULL, 'PIG GROWER PELLETS', 'HEALTHYWAY', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LUCKY 4A', '', 1.00, 1.00, '', 'LUCKY 4A', '', 0.00, 0, 1),
(56, 'PGP/HW-L4A', NULL, 'PIG GROWER PELLETS', 'HEALTHYWAY', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LUCKY 4A', '', 21.56, 25.00, '', 'LUCKY 4A', '', 0.00, 0, 1),
(57, 'PSP/M-L4A', NULL, 'PIG STARTER PELLETS', 'MILLER', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LUCKY 4A', '', 1.00, 1.00, '', 'LUCKY 4A', '', 0.00, 0, 1),
(58, 'PSP/M-L4A', NULL, 'PIG STARTER PELLETS', 'MILLER', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LUCKY 4A', '', 22.56, 26.00, '', 'LUCKY 4A', '', 0.00, 0, 1),
(59, 'PGP/M-L4A', NULL, 'PIG GROWER PELLETS', 'MILLER', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LUCKY 4A', '', 1.00, 1.00, '', 'LUCKY 4A', '', 0.00, 0, 1),
(60, 'PGP/M-L4A', NULL, 'PIG GROWER PELLETS', 'MILLER', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LUCKY 4A', '', 20.16, 23.50, '', 'LUCKY 4A', '', 0.00, 0, 1),
(61, 'PFP/M-L4A', NULL, 'PIG FINISHER PELLETES', 'MILLER', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LUCKY 4A', '', 958.00, 1.00, '', 'LUCKY 4A', '', 0.00, 0, 1),
(62, 'PFP/M-L4A', NULL, 'PIG FINISHER PELLETES', 'MILLER', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LUCKY 4A', '', 19.16, 22.50, '', 'LUCKY 4A', '', 0.00, 0, 1),
(63, 'PBP/M-L4A', NULL, 'PIG BREEDER PELLETS', 'MILLER', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LUCKY 4A', '', 958.00, 1.00, '', 'LUCKY 4A', '', 0.00, 0, 1),
(64, 'PBP/M-L4A', NULL, 'PIG BREEDER PELLETS', 'MILLER', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LUCKY 4A', '', 19.16, 22.50, '', 'LUCKY 4A', '', 0.00, 0, 1),
(65, 'CGC-L4A', NULL, 'CHICKEN GROWER CRUMBLES', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LUCKY 4A', '', 1.00, 1.00, '', 'LUCKY 4A', '', 0.00, 0, 1),
(66, 'CGC-L4A', NULL, 'CHICKEN GROWER CRUMBLES', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LUCKY 4A', '', 22.26, 26.00, '', 'LUCKY 4A', '', 0.00, 0, 1),
(67, 'CSP-L4A', NULL, 'CHICK STARTER PELLETS', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LUCKY 4A', '', 1.00, 1.00, '', 'LUCKY 4A', '', 0.00, 0, 1),
(68, 'CSP-L4A', NULL, 'CHICK STARTER PELLETS', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LUCKY 4A', '', 24.06, 27.50, '', 'LUCKY 4A', '', 0.00, 0, 1),
(69, 'HSP/U-URC', NULL, 'UNO HSP', 'UNO', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'ROBINA', '', 1.00, 1.00, '', 'UY', '', 0.00, 0, 1),
(70, 'HSP/U-URC', NULL, 'UNO HSP', 'UNO', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'ROBINA', '', 24.70, 28.50, '', 'UY', '', 0.00, 0, 1),
(71, 'HGP/U-URC', NULL, 'UNO HGP', 'UNO', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'ROBINA', '', 1.00, 1.00, '', 'UY', '', 0.00, 0, 1),
(72, 'HGP/U-URC', NULL, 'UNO HGP', 'UNO', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'ROBINA', '', 22.70, 27.50, '', 'UY', '', 0.00, 0, 1),
(73, 'PDP-URC', NULL, 'URC PDPP', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'ROBINA', '', 900.00, 980.00, '', 'UY', '', 0.00, 0, 1),
(74, 'PDP-URC', NULL, 'URC PDPP', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'ROBINA', '', 18.00, 22.00, '', 'UY', '', 0.00, 0, 1),
(75, NULL, NULL, 'SIDC', '', '', '', 'POULRTY SUPPLY', 'FEEDS-GENERAL', '', '', 0.00, 0.00, '', '', '', 0.00, 0, 1),
(76, NULL, NULL, 'PELLETS', '', '', '', 'POULRTY SUPPLY', 'FEEDS-GENERAL', '', '', 0.00, 0.00, '', '', '', 0.00, 0, 1),
(77, 'BIGBOY-SIDC', NULL, 'BIG BOY ', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 1.00, 1.00, '', 'SIDC', '', 0.00, 0, 1),
(78, 'BIGBOY-SIDC', NULL, 'BIG BOY ', '', '', 'KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 41.16, 46.00, '', 'SIDC', '', 0.00, 0, 1),
(79, 'PBP-SIDC', NULL, 'PIGLET BOOSTER PELLETS', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 1.00, 0.00, '', 'SIDC', '', 0.00, 0, 1),
(80, 'PBP-SIDC', NULL, 'PIGLET BOOSTER PELLETS', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 48.06, 55.00, '', 'SIDC', '', 0.00, 0, 1),
(81, 'HPSP-SIDC', NULL, 'HOG PRE STARTER', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 1.00, 1.00, '', 'SIDC', '', 0.00, 0, 1),
(82, 'HPSP-SIDC', NULL, 'HOG PRE STARTER', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 41.30, 46.00, '', 'SIDC', '', 0.00, 0, 1),
(83, 'HSP-SIDC', NULL, 'HOG STARTER PELLETS', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 1.00, 1.00, '', 'SIDC', '', 0.00, 0, 1),
(84, 'HSP-SIDC', NULL, 'HOG STARTER PELLETS', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 24.07, 27.50, '', 'SIDC', '', 0.00, 0, 1),
(85, 'HGP-SIDC', NULL, 'HOG GROWER PELLETS', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 1.00, 1.00, '', 'SIDC', '', 0.00, 0, 1),
(86, 'HGP-SIDC', NULL, 'HOG GROWER PELLETS', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 22.33, 26.00, '', 'SIDC', '', 0.00, 0, 1),
(87, 'HFP-SIDC', NULL, 'HOG FINISHER PELLETS', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 986.50, 1.00, '', 'SIDC', '', 0.00, 0, 1),
(88, 'HFP-SIDC', NULL, 'HOG FINISHER PELLETS', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 19.73, 23.50, '', 'SIDC', '', 0.00, 0, 1),
(89, 'HBP-SIDC', NULL, 'HOG BREEDER PELLETS', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 946.50, 1.00, '', 'SIDC', '', 0.00, 0, 1),
(90, 'HBP-SIDC', NULL, 'HOG BREEDER PELLETS', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 18.93, 22.50, '', 'SIDC', '', 0.00, 0, 1),
(91, 'HLP-SIDC', NULL, 'HOG LACTATION PELLETS', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 1.00, 1.00, '', 'SIDC', '', 0.00, 0, 1),
(92, 'HLP-SIDC', NULL, 'HOG LACTATION PELLETS', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 20.33, 24.00, '', 'SIDC', '', 0.00, 0, 1),
(93, 'HGM-SIDC', NULL, 'HOG GROWER MASH', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 1.00, 1.00, '', 'SIDC', '', 0.00, 0, 1),
(94, 'HGM-SIDC', NULL, 'HOG GROWER MASH', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 20.37, 24.50, '', 'SIDC', '', 0.00, 0, 1),
(95, 'HFM-SIDC', NULL, 'HOG FINISHER MASH', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 943.50, 1.00, '', 'SIDC', '', 0.00, 0, 1),
(96, 'HFM-SIDC', NULL, 'HOG FINISHER MASH', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 18.87, 23.00, '', 'SIDC', '', 0.00, 0, 1),
(97, 'HBM-SIDC', NULL, 'HOG BREEDER MASH', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 926.50, 1.00, '', 'SIDC', '', 0.00, 0, 1),
(98, 'HBM-SIDC', NULL, 'HOG BREEDER MASH', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 18.53, 22.50, '', 'SIDC', '', 0.00, 0, 1),
(99, 'HLM-SIDC', NULL, 'HOG LACTATION MASH', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 1.00, 1.00, '', 'SIDC', '', 0.00, 0, 1),
(100, 'HLM-SIDC', NULL, 'HOG LACTATION MASH', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 20.29, 24.50, '', 'SIDC', '', 0.00, 0, 1),
(101, 'BBM-SIDC', NULL, 'BROILER BOOSTER MASH', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 683.50, 738.00, '', 'SIDC', '', 0.00, 0, 1),
(102, 'BBM-SIDC', NULL, 'BROILER BOOSTER MASH', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 27.34, 31.00, '', 'SIDC', '', 0.00, 0, 1),
(103, 'BSC-SIDC', NULL, 'BROILER STARTER CRUMBLES', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 1.00, 1.00, '', 'SIDC', '', 0.00, 0, 1),
(104, 'BSC-SIDC', NULL, 'BROILER STARTER CRUMBLES', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 25.33, 29.00, '', 'SIDC', '', 0.00, 0, 1),
(105, 'BFC-SIDC', NULL, 'BROILER FINISHER CRUMBLE', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 1.00, 1.00, '', 'SIDC', '', 0.00, 0, 1),
(106, 'BFC-SIDC', NULL, 'BROILER FINISHER CRUMBLE', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 23.93, 28.00, '', 'SIDC', '', 0.00, 0, 1),
(107, 'DLP2-SIDC', NULL, 'DUCK LAYER 2', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 960.50, 1.00, '', 'SIDC', '', 0.00, 0, 1),
(108, 'DLP2-SIDC', NULL, 'DUCK LAYER 2', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 19.21, 23.00, '', 'SIDC', '', 0.00, 0, 1),
(109, 'DC-SIDC', NULL, 'DAIRY CATTLE FEEDS', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 747.50, 825.00, '', 'SIDC', '', 0.00, 0, 1),
(110, 'DC-SIDC', NULL, 'DAIRY CATTLE FEEDS', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 14.95, 19.00, '', 'SIDC', '', 0.00, 0, 1),
(111, 'CLM-SIDC', NULL, 'CHICKEN LAYER MASH', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 1.00, 1.00, '', 'SIDC', '', 0.00, 0, 1),
(112, 'CLM-SIDC', NULL, 'CHICKEN LAYER MASH', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'SIDC', '', 20.69, 24.50, '', 'SIDC', '', 0.00, 0, 1),
(113, 'CLC-JB', NULL, 'CHICKEN LAYER CRUMBLES', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'JETBEST', '', 1.00, 1.00, '', 'JETBEST', '', 0.00, 0, 1),
(114, 'CLC-JB', NULL, 'CHICKEN LAYER CRUMBLES', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'JETBEST', '', 23.90, 27.50, '', 'JETBEST', '', 0.00, 0, 1),
(115, 'HBM/E-GHPI', NULL, 'ECO BREEDER MASH', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'GHPI', '', 890.00, 970.00, '', 'GHPI', '', 0.00, 0, 1),
(116, 'HBM/E-GHPI', NULL, 'ECO BREEDER MASH', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'GHPI', '', 17.80, 21.00, '', 'GHPI', '', 0.00, 0, 1),
(117, 'HGM-LAD', NULL, 'HOG GROWER MASH', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 926.50, 1.00, '', 'LADECO', '', 0.00, 0, 1),
(118, 'HGM-LAD', NULL, 'HOG GROWER MASH', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 18.53, 22.50, '', 'LADECO', '', 0.00, 0, 1),
(119, 'HFM-LAD', NULL, 'HOG FINISHER MASH', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 906.50, 985.00, '', 'LADECO', '', 0.00, 0, 1),
(120, 'HFM-LAD', NULL, 'HOG FINISHER MASH', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 18.13, 22.00, '', 'LADECO', '', 0.00, 0, 1),
(121, 'HBM-LAD', NULL, 'HOG BREEDER MASH', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 911.50, 990.00, '', 'LADECO', '', 0.00, 0, 1),
(122, 'HBM-LAD', NULL, 'HOG BREEDER MASH', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 18.23, 22.00, '', 'LADECO', '', 0.00, 0, 1),
(123, 'HLM-LAD', NULL, 'HOG LACTATION MASH', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 916.50, 995.00, '', 'LADECO', '', 0.00, 0, 1),
(124, 'HLM-LAD', NULL, 'HOG LACTATION MASH', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 18.33, 22.50, '', 'LADECO', '', 0.00, 0, 1),
(125, 'CBM-LAD', NULL, 'CHICK BOOSTER MASH', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 610.00, 665.00, '', 'LADECO', '', 0.00, 0, 1),
(126, 'CBM-LAD', NULL, 'CHICK BOOSTER MASH', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 24.40, 29.00, '', 'LADECO', '', 0.00, 0, 1),
(127, 'BSM-LAD', NULL, 'BROILER STARTER MASH', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 1.00, 1.00, '', 'LADECO', '', 0.00, 0, 1),
(128, 'BSM-LAD', NULL, 'BROILER STARTER MASH', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 22.58, 26.50, '', 'LADECO', '', 0.00, 0, 1),
(129, 'BFM-LAD', NULL, 'BROILER FINISHER MASH', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 1.00, 1.00, '', 'LADECO', '', 0.00, 0, 1),
(130, 'BFM-LAD', NULL, 'BROILER FINISHER MASH', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 21.98, 26.00, '', 'LADECO', '', 0.00, 0, 1),
(131, 'CGM-LAD', NULL, 'CHICKEN GROWER MASH', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 1.00, 1.00, '', 'LADECO', '', 0.00, 0, 1),
(132, 'CGM-LAD', NULL, 'CHICKEN GROWER MASH', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 21.34, 25.50, '', 'LADECO', '', 0.00, 0, 1),
(133, 'CLM--LAD', NULL, 'CHICKEN LAYER MASH', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 1.00, 1.00, '', 'LADECO', '', 0.00, 0, 1),
(134, 'CLM-LAD', NULL, 'CHICKEN LAYER MASH', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 21.70, 26.00, '', 'LADECO', '', 0.00, 0, 1),
(135, 'BSC-LAD', NULL, 'BROILER STARTER CRUMBLES', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 1.00, 1.00, '', 'LADECO', '', 0.00, 0, 1),
(136, 'BSC-LAD', NULL, 'BROILER STARTER CRUMBLES', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 22.88, 27.00, '', 'LADECO', '', 0.00, 0, 1),
(137, 'BFC-LAD', NULL, 'BROILER FINISHER CRUMBLES', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 1.00, 1.00, '', 'LADECO', '', 0.00, 0, 1),
(138, 'BFC-LAD', NULL, 'BROILER FINISHER CRUMBLES', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 22.28, 26.50, '', 'LADECO', '', 0.00, 0, 1),
(139, 'CGC-LAD', NULL, 'CHICKEN GROWER CRUMBLES', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 1.00, 1.00, '', 'LADECO', '', 0.00, 0, 1),
(140, 'CGC-LAD', NULL, 'CHICKEN GROWER CRUMBLES', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 21.64, 26.00, '', 'LADECO', '', 0.00, 0, 1),
(141, 'CLC-LAD', NULL, 'CHICKEN LAYER CRUMBLES', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 1.00, 1.00, '', 'LADECO', '', 0.00, 0, 1),
(142, 'CLC-LAD', NULL, 'CHICKEN LAYER CRUMBLES', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'LADECO', '', 22.10, 26.50, '', 'LADECO', '', 0.00, 0, 1),
(143, 'PIGEON-GS', NULL, 'PIGEON PELLETS', '', '', '50 KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'GOODSEASON', '', 680.00, 800.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(144, 'PIGEON-GS', NULL, 'PIGEON PELLETS', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'GOODSEASON', '', 13.60, 19.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(145, 'RABBIT-GS', NULL, 'RABBIT PELLETS', '', '', '50 KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'GOODSEASON', '', 715.00, 830.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(146, 'RABBIT-GS', NULL, 'RABBIT PELLETS', '', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'GOODSEASON', '', 14.30, 20.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(147, ' TGFP/AQ-ACE ', NULL, 'TILAPIA GROWER FLOATING PELLETS', ' AQUASURE ', '', '25 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'ACE', '', 601.40, 665.00, '', ' ACE ', '', 0.00, 0, 1),
(148, ' TGFP/AQ-ACE ', NULL, 'TILAPIA GROWER FLOATING PELLETS', ' AQUASURE ', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'ACE', '', 24.06, 28.50, '', ' ACE ', '', 0.00, 0, 1),
(149, ' TFFP/AQ-ACE ', NULL, 'TILAPIA FINISHER FLOATING PELLETS', ' AQUASURE ', '', '25 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'ACE', '', 601.44, 655.00, '', ' ACE ', '', 0.00, 0, 1),
(150, ' TFFP/AQ-ACE ', NULL, 'TILAPIA FINISHER FLOATING PELLETS', ' AQUASURE ', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'ACE', '', 24.06, 28.00, '', ' ACE ', '', 0.00, 0, 1),
(151, ' FFM/I-ACE ', NULL, 'FISH FRY MASH', ' IDEAL ', '', '25 KGS.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'ACE', '', 703.25, 770.00, '', ' ACE ', '', 0.00, 0, 1),
(152, ' FFM/I-ACE ', NULL, 'FISH FRY MASH', ' IDEAL ', '', 'KG.', 'POULRTY SUPPLY', 'FEEDS-GENERAL', 'ACE', '', 28.13, 32.00, '', ' ACE ', '', 0.00, 0, 1),
(153, ' PF EXPANDER ', NULL, 'PF EXANDER', '', '', '20 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'NATVET', '', 971.96, 1.00, '', ' APT ', '', 0.00, 0, 1),
(154, ' PF EXPANDER ', NULL, 'PF EXANDER', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'NATVET', '', 48.60, 58.00, '', ' APT ', '', 0.00, 0, 1),
(155, ' PF POINTING ', NULL, 'PF POINTING PELLETS', '', '', '20 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'NATVET', '', 938.45, 1.00, '', ' APT ', '', 0.00, 0, 1),
(156, ' PF POINTING ', NULL, 'PF POINTING PELLETS', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'NATVET', '', 46.92, 56.00, '', ' APT ', '', 0.00, 0, 1),
(157, ' PF TUFF ', NULL, 'PF TUFF MAINTENANCE', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'NATVET', '', 564.41, 600.00, '', ' APT ', '', 0.00, 0, 1),
(158, ' PF TUFF ', NULL, 'PF TUFF MAINTENANCE', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'NATVET', '', 22.58, 26.00, '', ' APT ', '', 0.00, 0, 1),
(159, ' PF PRECON ', NULL, 'PF PRECON', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'NATVET', '', 1.00, 1.00, '', ' APT ', '', 0.00, 0, 1),
(160, ' PF PRECON ', NULL, 'PF PRECON', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'NATVET', '', 22.11, 25.50, '', ' APT ', '', 0.00, 0, 1),
(161, 'BIRD MIX', NULL, 'BIRD MIXTURE', '', '', 'KG. ', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 28.00, 60.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(162, 'BARLEY', NULL, 'BARLEY', '', '', '50 KGS.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 1.00, 1.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(163, 'BARLEY', NULL, 'BARLEY', '', '', 'KG.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 24.00, 30.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(164, 'BIRD SEED', NULL, 'BIRD SEED US', '', '', '25 KGS.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 750.00, 850.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(165, 'BIRD SEED', NULL, 'BIRD SEED US', '', '', 'KG.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 30.00, 37.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(166, 'CANARY', NULL, 'CANARY', '', '', '22.5 KGS.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 1.00, 1.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(167, 'CANARY', NULL, 'CANARY', '', '', 'KG.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 46.67, 60.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(168, 'JOCKEY OATS', NULL, 'JOCKEY OATS', '', '', '22.6 KGS.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 675.00, 0.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(169, 'JOCKEY OATS', NULL, 'JOCKEY OATS', '', '', 'KG.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 29.87, 35.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(170, 'OAT GROAT', NULL, 'OAT GROAT', '', '', '25 KGS.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 980.00, 1.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(171, 'OAT GROAT', NULL, 'OAT GROAT', '', '', 'KG.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 39.20, 48.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(172, 'RED MILLETS', NULL, 'RED MILLET', '', '', '25 KGS.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 700.00, 925.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(173, 'RED MILLETS', NULL, 'RED MILLET', '', '', 'KG.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 28.00, 40.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(174, 'SAFF', NULL, 'SAFFLOWER', '', '', '25 KGS.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 1.00, 1.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(175, 'SAFF', NULL, 'SAFFLOWER', '', '', 'KG.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 52.00, 65.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(176, 'SORGHUM', NULL, 'SORGHUM', '', '', '50KGS', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 1.00, 1.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(177, 'SORGHUM', NULL, 'SORGHUM', '', '', 'KG.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 22.00, 30.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(178, 'SUN BLACK', NULL, 'SUNFLOWER BLACK', '', '', '25 KGS.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 1.00, 1.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(179, 'SUN BLACK', NULL, 'SUNFLOWER BLACK', '', '', 'KG', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 50.00, 55.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(180, 'SUN STRIPES', NULL, 'SUNFLOWER STRIPES', '', '', '25 KGS.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 1.00, 1.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(181, 'SUN STRIPES', NULL, 'SUNFLOWER STRIPES', '', '', 'KG', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 52.00, 70.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(182, 'SUN JUMBO', NULL, 'SUNFLOWER JUMBO', '', '', '22.6 KGS.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 1.00, 1.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(183, 'SUN JUMBO', NULL, 'SUNFLOWER JUMBO', '', '', 'KG.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 70.00, 75.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(184, 'WHOLE OATS', NULL, 'WHOLE OATS', '', '', '50 KGS.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 1.00, 0.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(185, 'WHOLE OATS', NULL, 'WHOLE OATS', '', '', 'KG.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 24.00, 30.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(186, 'YELLOW MILLETS', NULL, 'YELLOW MILLETS', '', '', '25 KGS.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 656.00, 0.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(187, 'YELLOW MILLETS', NULL, 'YELLOW MILLETS', '', '', 'KG.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 26.24, 40.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(188, 'BLACK MILLETS', NULL, 'BLACK MILLETS', '', '', '25 KGS.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 795.00, 0.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(189, 'BLACK MILLETS', NULL, 'BLACK MILLETS', '', '', 'KG.', 'POULRTY SUPPLY', 'INGREDIENTS', 'GOODSEASON', '', 31.80, 50.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(190, 'CORN GRITS', NULL, 'CORN CRITS', '', '', '30 KGS.', 'POULRTY SUPPLY', 'INGREDIENTS', '', '', 670.00, 715.00, '', 'CLDS', '', 0.00, 0, 1),
(191, 'CORN GRITS', NULL, 'CORN CRITS', '', '', 'KG.', 'POULRTY SUPPLY', 'INGREDIENTS', '', '', 22.33, 25.50, '', 'CLDS', '', 0.00, 0, 1),
(192, 'CRACK CORN', NULL, 'CRACK CORN', '', '', '40 KGS.', 'POULRTY SUPPLY', 'INGREDIENTS', '', '', 860.00, 925.00, '', 'CLDS', '', 0.00, 0, 1),
(193, 'CRACK CORN', NULL, 'CRACK CORN', '', '', 'KG.', 'POULRTY SUPPLY', 'INGREDIENTS', '', '', 21.50, 24.50, '', 'CLDS', '', 0.00, 0, 1),
(194, 'PALYAT', NULL, 'PALYAT', '', '', '40 KGS.', 'POULRTY SUPPLY', 'INGREDIENTS', '', '', 320.00, 470.00, '', 'VARIOUS', '', 0.00, 0, 1),
(195, 'PALYAT', NULL, 'PALYAT', '', '', 'KG.', 'POULRTY SUPPLY', 'INGREDIENTS', '', '', 8.00, 14.00, '', 'VARIOUS', '', 0.00, 0, 1),
(196, 'DARAK ', NULL, 'DARAK ', '', '', '40 KGS.', 'POULRTY SUPPLY', 'INGREDIENTS', '', '', 440.00, 0.00, '', 'VARIOUS', '', 0.00, 0, 1),
(197, 'DARAK ', NULL, 'DARAK ', '', '', 'KG.', 'POULRTY SUPPLY', 'INGREDIENTS', '', '', 11.00, 14.00, '', 'VARIOUS', '', 0.00, 0, 1),
(198, 'TRIGO PINO', NULL, 'TRIGO PINO', '', '', '40 KGS.', 'POULRTY SUPPLY', 'INGREDIENTS', '', '', 550.00, 630.00, '', 'VARIOUS', '', 0.00, 0, 1),
(199, 'TRIGO PINO', NULL, 'TRIGO PINO', '', '', 'KG.', 'POULRTY SUPPLY', 'INGREDIENTS', '', '', 13.75, 17.00, '', 'VARIOUS', '', 0.00, 0, 1),
(200, 'TRIGO MAGASPANG', NULL, 'TRIGO MAGASPANG', '', '', '40 KGS.', 'POULRTY SUPPLY', 'INGREDIENTS', '', '', 0.00, 0.00, '', 'VARIOUS', '', 0.00, 0, 1),
(201, 'TRIGO MAGASPANG', NULL, 'TRIGO MAGASPANG', '', '', 'KG.', 'POULRTY SUPPLY', 'INGREDIENTS', '', '', 0.00, 0.00, '', 'VARIOUS', '', 0.00, 0, 1),
(202, 'ECO', NULL, 'ORANGE', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 430.75, 490.00, '', 'LADECO', '', 0.00, 0, 1),
(203, 'ECO', NULL, 'ORANGE', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 17.23, 21.00, '', 'LADECO', '', 0.00, 0, 1),
(204, 'PROPEL', NULL, 'PROPEL BUENA', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 540.00, 630.00, '', 'JETBEST', '', 0.00, 0, 1),
(205, 'PROPEL', NULL, 'PROPEL BUENA', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 21.60, 27.00, '', 'JETBEST', '', 0.00, 0, 1),
(206, 'POWER', NULL, 'POWER', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 545.00, 600.00, '', 'ACD', '', 0.00, 0, 1),
(207, 'POWER', NULL, 'POWER', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 21.80, 25.00, '', 'ACD', '', 0.00, 0, 1),
(208, 'SEF', NULL, 'SPECIAL EF', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 610.00, 685.00, '', 'ACD', '', 0.00, 0, 1),
(209, 'SEF', NULL, 'SPECIAL EF', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 24.40, 28.50, '', 'ACD', '', 0.00, 0, 1),
(210, 'EF', NULL, 'SUPER EF', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 680.00, 780.00, '', 'ACD', '', 0.00, 0, 1),
(211, 'EF', NULL, 'SUPER EF', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 27.20, 33.00, '', 'ACD', '', 0.00, 0, 1),
(212, 'TOP', NULL, 'TOP SPEED', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 710.00, 785.00, '', 'ACD', '', 0.00, 0, 1),
(213, 'TOP', NULL, 'TOP SPEED', '', '', 'KG', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 28.40, 34.00, '', 'ACD', '', 0.00, 0, 1),
(214, 'MAIN', NULL, 'MAINTENANCE CONDITIONER', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 650.00, 725.00, '', 'ACD', '', 0.00, 0, 1),
(215, 'MAIN', NULL, 'MAINTENANCE CONDITIONER', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 26.00, 30.00, '', 'ACD', '', 0.00, 0, 1),
(216, 'PRECON', NULL, 'PRECON', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 680.00, 755.00, '', 'ACD', '', 0.00, 0, 1),
(217, 'PRECON', NULL, 'PRECON', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 27.20, 32.00, '', 'ACD', '', 0.00, 0, 1),
(218, 'FLYER MIX', NULL, 'FLYER MIX', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 766.50, 900.00, '', 'CLDS', '', 0.00, 0, 1),
(219, 'FLYER MIX', NULL, 'FLYER MIX', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 30.66, 37.00, '', 'CLDS', '', 0.00, 0, 1),
(220, 'BREEDER MAXI', NULL, 'BREEDER MAXI', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 786.50, 920.00, '', 'CLDS', '', 0.00, 0, 1),
(221, 'BREEDER MAXI', NULL, 'BREEDER MAXI', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 31.46, 38.00, '', 'CLDS', '', 0.00, 0, 1),
(222, 'ROYAL', NULL, 'ROYAL GRAIN', '', '', '22.6kgs', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 1.00, 1.00, '', 'CLDS', '', 0.00, 0, 1),
(223, 'ROYAL', NULL, 'ROYAL GRAIN', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 44.54, 52.00, '', 'CLDS', '', 0.00, 0, 1),
(224, ' S16 ', NULL, 'DG SPECIAL', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 630.17, 740.00, '', ' APT ', '', 0.00, 0, 1),
(225, ' S16 ', NULL, 'DG SPECIAL', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 25.21, 31.00, '', ' APT ', '', 0.00, 0, 1),
(226, ' S18 ', NULL, 'DG SLASHER', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 698.47, 810.00, '', ' APT ', '', 0.00, 0, 1),
(227, ' S18 ', NULL, 'DG SLASHER', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'CONCENTRATE', '', 27.94, 34.00, '', ' APT ', '', 0.00, 0, 1),
(228, 'BSB-TB', NULL, 'BSB', '', '', '24''S', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 805.16, 865.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(229, 'BSB-TB', NULL, 'BSB', '', '', 'SACHET', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 33.55, 37.50, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(230, 'SD-TB', NULL, 'SD', '', '', '24''S', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 783.52, 842.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(231, 'SD-TB', NULL, 'SD', '', '', 'SACHET', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 32.65, 36.50, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(232, 'SD4+-TB', NULL, 'SD4+', '', '', '24''S', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 686.15, 735.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(233, 'SD4+-TB', NULL, 'SD4+', '', '', 'SACHET', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 28.59, 32.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(234, 'HM-TB', NULL, 'HM', '', '', '24''S', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 588.78, 645.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(235, 'HM-TB', NULL, 'HM', '', '', 'SACHET', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 24.53, 27.50, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(236, 'POWER-TB', NULL, 'POWER', '', '', '24''S', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 924.17, 995.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(237, 'POWER-TB', NULL, 'POWER', '', '', 'SACHET', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 38.51, 43.50, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(238, 'SUC-TB', NULL, 'SUCCESSOR', '', '', '24''S', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 675.33, 722.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(239, 'SUC-TB', NULL, 'SUCCESSOR', '', '', 'SACHET', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 28.14, 31.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(240, 'PIGEON-TB', NULL, 'PIGEON', '', '', '24''S', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 523.86, 565.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(241, 'PIGEON-TB', NULL, 'PIGEON', '', '', 'SACHET', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 21.83, 25.50, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(242, 'ENER-TB', NULL, 'ENERTONE', '', '', '24''S', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 632.05, 680.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(243, 'ENER-TB', NULL, 'ENERTONE', '', '', 'SACHET', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 26.34, 29.50, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(244, 'PLAT-TB', NULL, 'PLATINUM', '', '', '24''S', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 1.00, 1.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(245, 'PLAT-TB', NULL, 'PLATINUM', '', '', 'SACHET', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 43.92, 49.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(246, 'BSB/KRAFT-TB', NULL, 'BABY STAG BOOSTER PELLETS', '', '', '20 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 625.89, 690.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(247, 'BSB/KRAFT-TB', NULL, 'BABY STAG BOOSTER PELLETS', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 31.29, 36.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(248, 'SD/KRAFT-TB', NULL, 'STAG DEVELOPER PELLETS', '', '', '20 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 589.82, 655.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(249, 'SD-KRAFT-TB', NULL, 'STAG DEVELOPER PELLETS', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 29.49, 34.50, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(250, 'SD4+/KRAFT-TB', NULL, 'STAG DEV 4+', '', '', '25 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 587.12, 660.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(251, 'SD4+/KRAFT-TB', NULL, 'STAG DEV 4+', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 23.48, 29.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(252, 'HM/KRAFT-TB', NULL, 'HILANDER MAINTENANCE PELLETS', '', '', '20 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 481.63, 535.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(253, 'HM/KRAFT-TB', NULL, 'HILANDER MAINTENANCE PELLETS', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 24.08, 27.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(254, 'GMP1-TB', NULL, 'GMP1', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 1.00, 1.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(255, 'GMP1-TB', NULL, 'GMP1', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 24.54, 28.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(256, 'GMP2-TB', NULL, 'GMP2', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 1.00, 1.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(257, 'GMP2-TB', NULL, 'GMP2', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 23.04, 26.50, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(258, 'GMP3-TB', NULL, 'GMP3', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 1.00, 1.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(259, 'GMP3-TB', NULL, 'GMP3', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 21.04, 24.50, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(260, 'GMP4-TB', NULL, 'GMP4', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 1.00, 1.00, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(261, 'GMP4-TB', NULL, 'GMP4', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'THUNDERBIRD', '', 20.04, 23.50, '', 'UNAHCO FEEDS', '', 0.00, 0, 1),
(262, 'CBC-SSAG', NULL, 'CHICK BOOSTER CRUMBLES', '', '', '24''S', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'SAGUPAAN', '', 818.16, 880.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(263, 'CBC-SSAG', NULL, 'CHICK BOOSTER CRUMBLES', '', '', 'SACHET', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'SAGUPAAN', '', 34.09, 38.50, '', 'SAGUPAAN', '', 0.00, 0, 1),
(264, 'BSDC-SAG', NULL, 'BABY STAG DEVELOPER CRUMBLES', '', '', '24''S', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'SAGUPAAN', '', 818.16, 880.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(265, 'BSDC-SAG', NULL, 'BABY STAG DEVELOPER CRUMBLES', '', '', 'SACHET', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'SAGUPAAN', '', 34.09, 38.50, '', 'SAGUPAAN', '', 0.00, 0, 1),
(266, 'SDP-SAG', NULL, 'STAG DEVELOPER PELLETS', '', '', '24''S', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'SAGUPAAN', '', 797.76, 860.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(267, 'SDP-SAG', NULL, 'STAG DEVELOPER PELLETS', '', '', 'SACHET', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'SAGUPAAN', '', 33.24, 37.50, '', 'SAGUPAAN', '', 0.00, 0, 1),
(268, 'RTF-SAG', NULL, 'READY-TO-FIGHT', '', '', '24''S', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'SAGUPAAN', '', 928.32, 1.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(269, 'RTF-SAG', NULL, 'READY-TO-FIGHT', '', '', 'SACHET', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'SAGUPAAN', '', 38.68, 43.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(270, 'HA-SAG', NULL, 'HI-ACTION', '', '', '24''S', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'SAGUPAAN', '', 663.12, 715.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(271, 'HA-SAG', NULL, 'HI-ACTION', '', '', 'SACHET', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'SAGUPAAN', '', 27.63, 31.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(272, 'WL-SAG', NULL, 'WINNING LINE', '', '', '24''S', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'SAGUPAAN', '', 1.00, 1.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(273, 'WL-SAG', NULL, 'WINNING LINE', '', '', 'SACHET', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'SAGUPAAN', '', 43.78, 49.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(274, 'BP-SAG', NULL, 'BREEDER PELLETS', '', '', '24''S', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'SAGUPAAN', '', 797.76, 860.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(275, 'BA-SAG', NULL, 'BREEDER PELLETS', '', '', 'SACHET', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', 'SAGUPAAN', '', 33.24, 37.50, '', 'SAGUPAAN', '', 0.00, 0, 1),
(276, 'BERDUGO-PB', NULL, 'BERDUGO', '', '', '25KG', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', '', '', 1.00, 1.00, '', 'CLDS', '', 0.00, 0, 1),
(277, 'BERDUGO-PB', NULL, 'BERDUGO', '', '', 'SACHET', 'POULRTY SUPPLY', 'FIGHTING COCK FEEEDS', '', '', 45.26, 52.50, '', 'CLDS', '', 0.00, 0, 1),
(278, 'ALPO PC', NULL, 'ALPO PRIME CUT', '', '', '16.81KGS', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 1.00, '', 'LEROI', '', 0.00, 0, 1),
(279, 'ALPO PC', NULL, 'ALPO PRIME CUT', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 90.53, 105.00, '', 'LEROI', '', 0.00, 0, 1),
(280, 'ALPO ADULT', NULL, 'ALPO ADULT', '', '', '10KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 1.00, '', 'LEROI', '', 0.00, 0, 1),
(281, 'ALPO ADULT', NULL, 'ALPO ADULT', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 116.01, 135.00, '', 'LEROI', '', 0.00, 0, 1),
(282, 'ALPO PUP', NULL, 'ALPO PUP', '', '', '15 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 1.00, '', 'LEROI', '', 0.00, 0, 1),
(283, 'ALPO PUP', NULL, 'ALPO PUP', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 120.78, 140.00, '', 'LEROI', '', 0.00, 0, 1),
(284, 'ASPIN', NULL, 'ASPIN', '', '', '20 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 863.50, 970.00, '', ' MAXIVETE ', '', 0.00, 0, 1),
(285, 'ASPIN', NULL, 'ASPIN', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 43.18, 55.00, '', ' MAXIVETE ', '', 0.00, 0, 1),
(286, 'ASPIN', NULL, 'ASPIN', '', '', '8 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 350.00, 410.00, '', ' MAXIVETE ', '', 0.00, 0, 1),
(287, 'ASPIN', NULL, 'ASPIN', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 43.75, 55.00, '', ' MAXIVETE ', '', 0.00, 0, 1),
(288, 'BPA', NULL, 'BEEF PRO A', '', '', '22.6 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 1.00, '', 'DANCOR', '', 0.00, 0, 1),
(289, 'BPA', NULL, 'BEEF PRO A', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 57.73, 68.00, '', 'DANCOR', '', 0.00, 0, 1),
(290, 'BPP', NULL, 'BEEF PRO P', '', '', '22.6 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 1.00, '', 'DANCOR', '', 0.00, 0, 1),
(291, 'BPP', NULL, 'BEEF PRO P', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 68.97, 83.00, '', 'DANCOR', '', 0.00, 0, 1),
(292, 'BEEFY', NULL, 'BEEFY', '', '', '8 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 320.00, 380.00, '', ' VETFILES ', '', 0.00, 0, 1),
(293, 'BEEFY', NULL, 'BEEFY', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 40.00, 50.00, '', ' VETFILES ', '', 0.00, 0, 1),
(294, 'ESBA', NULL, 'EUKA SMALL BREED ADULT', '', '', '15 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 2.00, '', 'PLU', '', 0.00, 0, 1),
(295, 'ESBA', NULL, 'EUKA SMALL BREED ADULT', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 133.00, 155.00, '', 'PLU', '', 0.00, 0, 1),
(296, 'ESBP', NULL, 'EUKA SMALL BREED  PUPPY', '', '', '20 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 2.00, 3.00, '', 'PLU', '', 0.00, 0, 1),
(297, 'ESBP', NULL, 'EUKA SMALL BREED  PUPPY', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 144.50, 165.00, '', 'PLU', '', 0.00, 0, 1),
(298, 'ELBA', NULL, 'EUKA LARGE BREED ADULT', '', '', '15 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 2.00, '', 'PLU', '', 0.00, 0, 1),
(299, 'ELBA', NULL, 'EUKA LARGE BREED ADULT', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 133.00, 155.00, '', 'PLU', '', 0.00, 0, 1),
(300, 'ELBP', NULL, 'EUKA LARGE BREED PUPPY', '', '', '15 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 2.00, 2.00, '', 'PLU', '', 0.00, 0, 1),
(301, 'ELBP', NULL, 'EUKA LARGE BREED PUPPY', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 144.67, 165.00, '', 'PLU', '', 0.00, 0, 1),
(302, 'ELRA', NULL, 'EUKA LAMB&RICE ADULT', '', '', '15 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 2.00, 2.00, '', 'PLU', '', 0.00, 0, 1),
(303, 'ELRA', NULL, 'EUKA LAMB&RICE ADULT', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 141.00, 165.00, '', 'PLU', '', 0.00, 0, 1),
(304, 'ELRP', NULL, 'EUKA LAMB&RICE PUPPY', '', '', '15 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 2.00, 2.00, '', 'PLU', '', 0.00, 0, 1),
(305, 'ELRP', NULL, 'EUKA LAMB&RICE PUPPY', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 152.13, 175.00, '', 'PLU', '', 0.00, 0, 1),
(306, 'HOLISTIC ADULT', NULL, 'HOLISTIC ADULT', '', '', '15 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 1.00, '', 'NATPET', '', 0.00, 0, 1),
(307, 'HOLISTIC ADULT', NULL, 'HOLISTIC ADULT', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 93.67, 110.00, '', 'NATPET', '', 0.00, 0, 1),
(308, 'HOLISTIC PUPPY', NULL, 'HOLISTIC PUPPY', '', '', '15 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 1.00, '', 'NATPET', '', 0.00, 0, 1),
(309, 'HOLISTIC PUPPY', NULL, 'HOLISTIC PUPPY', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 100.33, 120.00, '', 'NATPET', '', 0.00, 0, 1),
(310, 'INTEGRITY ADULT', NULL, 'INTEGRITY', '', '', '22.7 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 1.00, '', ' 4AR ', '', 0.00, 0, 1),
(311, 'INTEGRITY ADULT', NULL, 'INTEGRITY', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 49.78, 60.00, '', ' 4AR ', '', 0.00, 0, 1),
(312, 'INTEGRITY PUP', NULL, 'INTEGRITY PUP', '', '', '22.7 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 1.00, '', ' 4AR ', '', 0.00, 0, 1),
(313, 'INTEGRITY PUP', NULL, 'INTEGRITY PUP', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 53.54, 65.00, '', ' 4AR ', '', 0.00, 0, 1),
(314, 'OBM', NULL, 'OPTIMA BEEF MEAL', '', '', '22.6 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 1.00, '', 'NATPET', '', 0.00, 0, 1),
(315, 'OBM', NULL, 'OPTIMA BEEF MEAL', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 47.57, 57.00, '', 'NATPET', '', 0.00, 0, 1),
(316, 'OHP', NULL, 'OPTIMA HI PRO', '', '', '22.6 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 1.00, '', 'NATPET', '', 0.00, 0, 1),
(317, 'OHP', NULL, 'OPTIMA HI PRO', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 56.42, 68.00, '', 'NATPET', '', 0.00, 0, 1),
(318, 'OLR', NULL, 'OPTIMA L&R', '', '', '22.6 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 1.00, '', 'NATPET', '', 0.00, 0, 1),
(319, 'OLR', NULL, 'OPTIMA L&R', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 64.38, 80.00, '', 'NATPET', '', 0.00, 0, 1),
(320, 'PED ADULT', NULL, 'PEDIGREE', '', '', '20 KGS', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 1.00, '', 'SIMON', '', 0.00, 0, 1),
(321, 'PED ADULT', NULL, 'PEDIGREE', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 82.42, 95.00, '', 'SIMON', '', 0.00, 0, 1);
INSERT INTO `item` (`item_id`, `item_code`, `bar_code`, `desc1`, `desc2`, `desc3`, `desc4`, `division`, `group`, `class1`, `class2`, `cost`, `retail_price`, `model_quantity`, `supplier_code`, `manufacturer`, `quantity`, `reorder_point`, `active`) VALUES
(322, 'PEDIGEE LAMB', NULL, 'PEDIGEE LAMB', '', '', '10 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 929.27, 1.00, '', 'SIMON', '', 0.00, 0, 1),
(323, 'PEDIGEE LAMB', NULL, 'PEDIGEE LAMB', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 92.93, 105.00, '', 'SIMON', '', 0.00, 0, 1),
(324, 'PED PUP', NULL, 'PED PUP', '', '', '15 KGS', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 1.00, '', 'SIMON', '', 0.00, 0, 1),
(325, 'PED PUP', NULL, 'PED PUP', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 115.05, 130.00, '', 'SIMON', '', 0.00, 0, 1),
(326, 'PET ONE ADULT', NULL, 'PET ONE ADULT', '', '', '18.1 KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 1.00, '', 'MAXIVETE', '', 0.00, 0, 1),
(327, 'PET ONE ADULT', NULL, 'PET ONE ADULT', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 57.07, 65.00, '', 'MAXIVETE', '', 0.00, 0, 1),
(328, 'PET ONE PUP', NULL, 'PET ONE PUP', '', '', '9.05KG', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 733.00, 795.00, '', 'MAXIVETE', '', 0.00, 0, 1),
(329, 'PET ONE PUP', NULL, 'PET ONE PUP', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 81.44, 90.00, '', 'MAXIVETE', '', 0.00, 0, 1),
(330, 'PETONE BEEF TERIYAKI', NULL, 'PETONE BEEF TERIYAKI', '', '', '8 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 340.00, 400.00, '', 'MAXIVETE', '', 0.00, 0, 1),
(331, 'PETONE BEEF TERIYAKI', NULL, 'PETONE BEEF TERIYAKI', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 42.50, 55.00, '', 'MAXIVETE', '', 0.00, 0, 1),
(332, 'VHE', NULL, 'VITALITY HI ENERGY', '', '', '15 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 1.00, '', 'CONSUMER CARE', '', 0.00, 0, 1),
(333, 'CHE', NULL, 'VITALITY HI ENERGY', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 106.67, 123.00, '', 'CONSUMER CARE', '', 0.00, 0, 1),
(334, 'VVM', NULL, 'VITALITY VALUE MEAL', '', '', '20 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 1.00, '', 'CONSUMER CARE', '', 0.00, 0, 1),
(335, 'VVM', NULL, 'VITALITY VALUE MEAL', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 60.00, 70.00, '', 'CONSUMER CARE', '', 0.00, 0, 1),
(336, 'VCL', NULL, 'VITALITY CLASSIC', '', '', '15 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 1.00, '', 'CONSUMER CARE', '', 0.00, 0, 1),
(337, 'VCL', NULL, 'VITALITY CLASSIC', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 93.33, 108.00, '', 'CONSUMER CARE', '', 0.00, 0, 1),
(338, 'VHE', NULL, 'VITALITY HI ENERGY', '', '', '15 KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 2.00, '', 'CONSUMER CARE', '', 0.00, 0, 1),
(339, 'CHE', NULL, 'VITALITY HI ENERGY', '', '', 'SACHET', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 120.00, 145.00, '', 'CONSUMER CARE', '', 0.00, 0, 1),
(340, 'VVM', NULL, 'VITALITY VALUE MEAL', '', '', '15 KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 1.00, '', 'CONSUMER CARE', '', 0.00, 0, 1),
(341, 'VVM', NULL, 'VITALITY VALUE MEAL', '', '', 'SACHET', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 77.33, 90.00, '', 'CONSUMER CARE', '', 0.00, 0, 1),
(342, 'VCL', NULL, 'VITALITY CLASSIC', '', '', '15 KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 1.00, '', 'CONSUMER CARE', '', 0.00, 0, 1),
(343, 'VCL', NULL, 'VITALITY CLASSIC', '', '', 'SACHET', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 108.00, 125.00, '', 'CONSUMER CARE', '', 0.00, 0, 1),
(344, 'VHE', NULL, 'VITALITY HI ENERGY', '', '', '4 X 3KGS', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 0.00, '', 'CONSUMER CARE', '', 0.00, 0, 1),
(345, 'CHE', NULL, 'VITALITY HI ENERGY', '', '', '3KGS', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 340.00, 405.00, '', 'CONSUMER CARE', '', 0.00, 0, 1),
(346, 'VVM', NULL, 'VITALITY VALUE MEAL', '', '', '4 X 3KGS', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 824.00, 0.00, '', 'CONSUMER CARE', '', 0.00, 0, 1),
(347, 'VVM', NULL, 'VITALITY VALUE MEAL', '', '', '3KGS', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 206.00, 240.00, '', 'CONSUMER CARE', '', 0.00, 0, 1),
(348, 'VCL', NULL, 'VITALITY CLASSIC', '', '', '4 X 3KGS', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 0.00, '', 'CONSUMER CARE', '', 0.00, 0, 1),
(349, 'VCL', NULL, 'VITALITY CLASSIC', '', '', '3KGS', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 290.00, 335.00, '', 'CONSUMER CARE', '', 0.00, 0, 1),
(350, 'CHAPPI', NULL, 'CHAPPI', '', '', '20KGS', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 1.00, 1.00, '', 'SIMON', '', 0.00, 0, 1),
(351, 'CHAPPI', NULL, 'CHAPPI', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY DOGFOOD', '', 55.25, 65.00, '', 'SIMON', '', 0.00, 0, 1),
(352, 'FRISKIES', NULL, 'FRISKIES', '', '', '7 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY CAT FOOD', '', 1.00, 1.00, '', 'LEROI', '', 0.00, 0, 1),
(353, 'FRISKIES', NULL, 'FRISKIES', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY CAT FOOD', '', 144.65, 165.00, '', 'LEROI', '', 0.00, 0, 1),
(354, 'IAMS', NULL, 'IAMS', '', '', '15 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY CAT FOOD', '', 2.00, 2.00, '', 'PLU', '', 0.00, 0, 1),
(355, 'IAMS', NULL, 'IAMS', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY CAT FOOD', '', 163.93, 190.00, '', 'PLU', '', 0.00, 0, 1),
(356, 'PRINCESS', NULL, 'PRINCESS', '', '', '22.6 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY CAT FOOD', '', 1.00, 1.00, '', 'NATPET', '', 0.00, 0, 1),
(357, 'PRINCESS', NULL, 'PRINCESS', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY CAT FOOD', '', 76.55, 90.00, '', 'NATPET', '', 0.00, 0, 1),
(358, 'WHISCKAS', NULL, 'WHISCKAS', '', '', '7 KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY CAT FOOD', '', 875.00, 960.00, '', 'SIMON', '', 0.00, 0, 1),
(359, 'WHISCKAS', NULL, 'WHISCKAS', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY CAT FOOD', '', 125.00, 140.00, '', 'SIMON', '', 0.00, 0, 1),
(360, 'KITEKAT', NULL, 'KITEKAT', '', '', '7KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY CAT FOOD', '', 684.25, 755.00, '', 'SIMON', '', 0.00, 0, 1),
(361, 'KITEKAT', NULL, 'KITEKAT', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY CAT FOOD', '', 97.75, 120.00, '', 'SIMON', '', 0.00, 0, 1),
(362, 'CV CAT', NULL, 'CV CAT', '', '', '9 KGS', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY CAT FOOD', '', 720.00, 780.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(363, 'CV CAT', NULL, 'CV CAT', '', '', 'KG.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY CAT FOOD', '', 80.00, 90.00, '', 'GOODSEASON', '', 0.00, 0, 1),
(364, 'VITALITY CATCARE', NULL, 'VITALITY CATCARE', '', '', '20KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY CAT FOOD', '', 2.00, 2.00, '', 'CONSUMER CARE', '', 0.00, 0, 1),
(365, 'VITALITY CATCARE', NULL, 'VITALITY CATCARE', '', '', 'KGS.', 'POULRTY SUPPLY', 'DOG FOOD', 'DRY CAT FOOD', '', 117.50, 130.00, '', 'CONSUMER CARE', '', 0.00, 0, 1),
(366, 'CORD ULO', NULL, 'CORD ULO', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'CORD', '', 7.00, 12.00, '', 'DOMENG', '', 0.00, 0, 1),
(367, 'CORD #8', NULL, 'CORD #8 PAYAT', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'CORD', '', 7.00, 11.00, '', 'DOMENG', '', 0.00, 0, 1),
(368, 'CORD #12', NULL, 'CORD # 12 ZAM', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'CORD', '', 10.00, 15.00, '', 'DOMENG', '', 0.00, 0, 1),
(369, 'CORD #15', NULL, 'CORD # 15 LEATHER', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'CORD', '', 11.00, 16.00, '', 'DOMENG', '', 0.00, 0, 1),
(370, 'CORD #16', NULL, 'CORD # 16 NYLON', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'CORD', '', 11.00, 18.00, '', 'DOMENG', '', 0.00, 0, 1),
(371, 'CORD #18', NULL, 'CORD # 18 COBRA', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'CORD', '', 11.00, 19.00, '', 'DOMENG', '', 0.00, 0, 1),
(372, 'CORD #20', NULL, 'CORD # 20 SAGUPAAN', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'CORD', '', 11.00, 20.00, '', 'DOMENG', '', 0.00, 0, 1),
(373, 'CORD #22', NULL, 'CORD # 22 LONG STRAP', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'CORD', '', 11.00, 23.00, '', 'DOMENG', '', 0.00, 0, 1),
(374, 'CORD NYLON', NULL, 'CORD NYLON', '', '', 'METER', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'CORD', '', 1.75, 5.00, '', 'DOMENG', '', 0.00, 0, 1),
(375, 'PASO # 4', NULL, 'PASO # 4', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'POT', '', 2.00, 5.00, '', 'VARIOUS', '', 0.00, 0, 1),
(376, 'PASO # 5', NULL, 'PASO # 5', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'POT', '', 3.00, 6.00, '', 'VARIOUS', '', 0.00, 0, 1),
(377, 'PASO #6', NULL, 'PASO #6', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'POT', '', 3.75, 7.00, '', 'VARIOUS', '', 0.00, 0, 1),
(378, 'PASO #15', NULL, 'PASO #15', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'POT', '', 13.00, 18.00, '', 'VARIOUS', '', 0.00, 0, 1),
(379, 'RPOT SML', NULL, 'RUBBER POT SMALL', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'POT', '', 17.00, 22.00, '', 'CLDS', '', 0.00, 0, 1),
(380, 'RPOT MED', NULL, 'RUBBER POT MED', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'POT', '', 18.00, 25.00, '', 'CLDS', '', 0.00, 0, 1),
(381, 'RPOT LAR', NULL, 'RUBBER POT LARGE', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'POT', '', 23.00, 30.00, '', 'CLDS', '', 0.00, 0, 1),
(382, 'FEEDER/AUTO 5KG', NULL, 'AUTO FEEDER 5KG', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'FEEDER', '', 105.00, 130.00, '', 'CLDS', '', 0.00, 0, 1),
(383, 'FEEDER/AUTO 7KG', NULL, 'AUTO FEEDER 7KG', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'FEEDER', '', 110.00, 140.00, '', 'CLDS', '', 0.00, 0, 1),
(384, 'FEEDER/AUTO 10KG', NULL, 'AUTO FEEDER 10KG', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'FEEDER', '', 135.00, 170.00, '', 'CLDS', '', 0.00, 0, 1),
(385, 'FEEDER 12"', NULL, 'FEEDER 12"', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'FEEDER', '', 24.00, 30.00, '', 'CLDS', '', 0.00, 0, 1),
(386, 'FEEDER 24"', NULL, 'FEEDER 24"', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'FEEDER', '', 33.00, 42.00, '', 'CLDS', '', 0.00, 0, 1),
(387, 'FEEDER 36''', NULL, 'FEEDER 36''', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'FEEDER', '', 58.00, 73.00, '', 'CLDS', '', 0.00, 0, 1),
(388, 'FEEDER CUP SML', NULL, 'FEEDER CUP SML', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'FEEDER', '', 10.00, 13.00, '', 'CLDS', '', 0.00, 0, 1),
(389, 'FEEDER CUP MED', NULL, 'FEEDER CUP MED', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'FEEDER', '', 10.50, 15.00, '', 'CLDS', '', 0.00, 0, 1),
(390, 'FEEDER CUP L', NULL, 'FEEDER CUP L', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'FEEDER', '', 11.00, 18.00, '', 'CLDS', '', 0.00, 0, 1),
(391, 'FEEDER WITH WIRE GURAD', NULL, 'FEEDER WITH WIRE GURAD', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'FEEDER', '', 66.05, 95.00, '', 'CLDS', '', 0.00, 0, 1),
(392, 'PAN FEEDER', NULL, 'PAN FEEDER', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'FEEDER', '', 68.00, 90.00, '', 'CLDS', '', 0.00, 0, 1),
(393, 'FEEDER SHORT/SP', NULL, 'SP FEEDER SHORT', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'FEEDER', '', 71.48, 88.00, '', 'CLDS', '', 0.00, 0, 1),
(394, 'FEEDER LONG/SP', NULL, 'SP FEEDER LONG', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'FEEDER', '', 105.23, 130.00, '', 'CLDS', '', 0.00, 0, 1),
(395, 'WATERER 1/8', NULL, 'WATERER 1/8', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'WATERER', '', 18.00, 25.00, '', 'GENERIS', '', 0.00, 0, 1),
(396, 'WATERER 1/4G', NULL, 'WATERER 1/4G', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'WATERER', '', 20.00, 28.00, '', 'GENERIS', '', 0.00, 0, 1),
(397, 'WATERER 1/2G', NULL, 'WATERER 1/2G', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'WATERER', '', 23.00, 30.00, '', 'GENERIS', '', 0.00, 0, 1),
(398, 'WATERER 3/4G', NULL, 'WATERER 3/4G', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'WATERER', '', 33.00, 45.00, '', 'GENERIS', '', 0.00, 0, 1),
(399, 'WATERER 1G', NULL, 'WATERER 1G', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'WATERER', '', 31.00, 40.00, '', 'GENERIS', '', 0.00, 0, 1),
(400, 'WATERER/SP 1L', NULL, 'WATERER/SP 1L', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'WATERER', '', 30.78, 42.00, '', 'GENERIS', '', 0.00, 0, 1),
(401, 'WATERER/SP 1G', NULL, 'WATERER/SP 1G', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'WATERER', '', 87.36, 110.00, '', 'GENERIS', '', 0.00, 0, 1),
(402, 'WATERER/SP 2G', NULL, 'WATERER/SP 2G', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'WATERER', '', 147.92, 175.00, '', 'GENERIS', '', 0.00, 0, 1),
(403, 'WATER NOZZLE', NULL, 'WATER NOZZLE', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'WATERER', '', 125.00, 165.00, '', '', '', 0.00, 0, 1),
(404, 'BAYONG', NULL, 'BAYONG', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'CARRIER', '', 20.00, 28.00, '', 'VARIOUS', '', 0.00, 0, 1),
(405, 'TCSK', NULL, 'TEXAS CARRIER SINGLE CARTON', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'CARRIER', '', 35.00, 60.00, '', 'VARIOUS', '', 0.00, 0, 1),
(406, 'TCSP', NULL, 'TEXAS CARRIER SINGLE PLASTIC', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'CARRIER', '', 55.00, 80.00, '', 'VARIOUS', '', 0.00, 0, 1),
(407, 'TCDK', NULL, 'TEXAS CARRIER DOUBLE CARTON', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'CARRIER', '', 50.00, 80.00, '', 'VARIOUS', '', 0.00, 0, 1),
(408, 'TCDP', NULL, 'TEXAS CARRIER DOUBLE PLASTIC', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'CARRIER', '', 105.00, 160.00, '', 'VARIOUS', '', 0.00, 0, 1),
(409, 'FLAT BOX DOUBLE', NULL, 'FLAT BOX DOUBLE', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'CARRIER', '', 55.00, 80.00, '', 'VARIOUS', '', 0.00, 0, 1),
(410, 'TCDK COLLAPSIBLE', NULL, 'TCDK COLLAPSIBLE', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'CARRIER', '', 48.00, 95.00, '', 'VARIOUS', '', 0.00, 0, 1),
(411, 'PIGEON BOX', NULL, 'PIGEON BOX', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'CARRIER', '', 35.00, 55.00, '', 'VARIOUS', '', 0.00, 0, 1),
(412, 'PEN/BREEDING', NULL, 'BREEDING PEN', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'PEN', '', 431.00, 550.00, '', 'CLDS', '', 0.00, 0, 1),
(413, 'PEN/CHICK', NULL, 'CHICK PEN', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'PEN', '', 509.00, 650.00, '', 'CLDS', '', 0.00, 0, 1),
(414, 'PEN/FLYING', NULL, 'FLYING PEN', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'PEN', '', 1.00, 1.00, '', 'CLDS', '', 0.00, 0, 1),
(415, 'PEN/FOLDING LAMINATED', NULL, 'FOLDING PEN LAMINATED', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'PEN', '', 1.00, 2.00, '', 'CLDS', '', 0.00, 0, 1),
(416, 'PEN/FOLDING PLASTIC', NULL, 'FOLDING PEN PLASTIC', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'PEN', '', 1.00, 1.00, '', 'CLDS', '', 0.00, 0, 1),
(417, 'PEN/RUNNING', NULL, 'RUNNING PEN', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'PEN', '', 1.00, 1.00, '', 'CLDS', '', 0.00, 0, 1),
(418, 'PEN/SCRATCH XL', NULL, 'SCRATCHPEN XL', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'PEN', '', 179.00, 210.00, '', 'GA METALS', '', 0.00, 0, 1),
(419, 'PEN/ SCRATCH SKY', NULL, 'SCRATCHPEN L BLUE', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'PEN', '', 335.00, 400.00, '', 'CLDS', '', 0.00, 0, 1),
(420, 'PEN/SCRATCH DARK BLUE', NULL, 'SCRATCHPEN D BLUE', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'PEN', '', 397.00, 475.00, '', 'CLDS', '', 0.00, 0, 1),
(421, ' PEN/ RS DUAL ', NULL, 'RS DUALPEN', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'PEN', '', 336.09, 425.00, '', ' APT ', '', 0.00, 0, 1),
(422, 'GLOVES ORD', NULL, 'GLOVES ORD', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'GLOVES', '', 17.00, 25.00, '', 'DOMENG', '', 0.00, 0, 1),
(423, 'GLOVES SEMI LEATHER', NULL, 'GLOVES SEMI LEATHER', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'GLOVES', '', 47.00, 70.00, '', 'CLDS', '', 0.00, 0, 1),
(424, 'GLOVES LEATHER', NULL, 'GLOVES LEATHER', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'GLOVES', '', 50.00, 80.00, '', 'CLDS', '', 0.00, 0, 1),
(425, 'GLOVES 85', NULL, 'GLOVES 85', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'GLOVES', '', 60.00, 85.00, '', 'CLDS', '', 0.00, 0, 1),
(426, 'GLOVES PURE LEATHER', NULL, 'GLOVES PURE LEATHER', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'GLOVES', '', 85.00, 110.00, '', 'CLDS', '', 0.00, 0, 1),
(427, 'GLOVES/RS BUDGET ', NULL, 'RS BUDGET GLOVES', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'GLOVES', '', 15.92, 25.00, '', ' APT ', '', 0.00, 0, 1),
(428, 'GLOVES/RS SOFT', NULL, 'RS SOFT GLOVES', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'GLOVES', '', 30.95, 50.00, '', ' APT ', '', 0.00, 0, 1),
(429, 'GLOVES/RS HARD', NULL, 'RS HARD GLOVES', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'GLOVES', '', 61.91, 95.00, '', ' APT ', '', 0.00, 0, 1),
(430, 'SYRINGE/FG-EURO', NULL, 'FIBER GLASS EUROPLEX 10CC', '', '', '10CC', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'SYRINGE', '', 395.00, 485.00, '', 'CLDS', '', 0.00, 0, 1),
(431, 'SYRINGE/FG-EURO', NULL, 'FIBER GLASS EUROPLEX 20CC', '', '', '20CC', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'SYRINGE', '', 425.00, 520.00, '', 'CLDS', '', 0.00, 0, 1),
(432, 'SYRINGE-FG-MDV', NULL, 'FIBER GLASS MDV 10CC', '', '', '10CC', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'SYRINGE', '', 270.00, 340.00, '', 'CLDS', '', 0.00, 0, 1),
(433, 'SYRINGE-FG-MDV', NULL, 'FIBER GLASS MDV 20CC', '', '', '20CC', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'SYRINGE', '', 290.00, 365.00, '', 'CLDS', '', 0.00, 0, 1),
(434, 'HYPO NEEDLE', NULL, 'HYPO NEEDLE', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'SYRINGE', '', 12.00, 17.00, '', 'CLDS', '', 0.00, 0, 1),
(435, 'HYPO NEEDLE 18X1', NULL, 'HYPO NEEDLE 18X1', '', '', '18X1', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'SYRINGE', '', 12.00, 18.00, '', 'CLDS', '', 0.00, 0, 1),
(436, 'HYPO NEEDLE 22X 1/2', NULL, 'HYPO NEEDLE 22X 1/2', '', '', '22X 1/2', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'SYRINGE', '', 11.67, 18.00, '', 'CLDS', '', 0.00, 0, 1),
(437, 'SYRINGE 1CC.', NULL, 'SYRINGE 1CC.', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'SYRINGE', '', 3.70, 6.00, '', 'CLDS', '', 0.00, 0, 1),
(438, 'SYRINGE 3CC.', NULL, 'SYRINGE 3CC.', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'SYRINGE', '', 2.60, 7.00, '', 'CLDS', '', 0.00, 0, 1),
(439, 'SYRINGE 5CC.', NULL, 'SYRINGE 5CC.', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'SYRINGE', '', 2.80, 8.00, '', 'CLDS', '', 0.00, 0, 1),
(440, 'SYRINGE 10CC.', NULL, 'SYRINGE 10CC.', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'SYRINGE', '', 4.20, 10.00, '', 'CLDS', '', 0.00, 0, 1),
(441, 'BAENA LEATHER', NULL, 'BAENA LEATHER', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 17.00, 25.00, '', 'CLDS', '', 0.00, 0, 1),
(442, 'BAENA PLASTIC', NULL, 'BAENA PLASTIC', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 15.00, 20.00, '', 'CLDS', '', 0.00, 0, 1),
(443, 'BAENA SPECIAL', NULL, 'BAENA SPECIAL', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 27.00, 40.00, '', 'CLDS', '', 0.00, 0, 1),
(444, 'BIDBID', NULL, 'BIDBID', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 5.00, 8.00, '', 'CLDS', '', 0.00, 0, 1),
(445, 'CUTTING NEEDLE', NULL, 'CUTTING NEEDLE', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 19.00, 25.00, '', 'CLDS', '', 0.00, 0, 1),
(446, 'LEG BAND', NULL, 'LEG BAND', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 14.00, 20.00, '', 'CLDS', '', 0.00, 0, 1),
(447, 'LEG BAND ORD', NULL, 'LEG BAND ORD', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 2.75, 5.00, '', 'CLDS', '', 0.00, 0, 1),
(448, 'PAGKIT', NULL, 'PAGKIT', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 57.00, 70.00, '', 'CLDS', '', 0.00, 0, 1),
(449, 'PLASTIC TAKIRA', NULL, 'PLASTIC TAKIRA', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 48.00, 65.00, '', 'CLDS', '', 0.00, 0, 1),
(450, 'SAPIN', NULL, 'SAPIN', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 11.67, 18.00, '', 'CLDS', '', 0.00, 0, 1),
(451, 'STRINGS STRAIGHT', NULL, 'STRINGS STRAIGHT', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 12.50, 20.00, '', 'CLDS', '', 0.00, 0, 1),
(452, 'SURGICAL BLADE', NULL, 'SURGICAL BLADE', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 8.00, 12.00, '', 'CLDS', '', 0.00, 0, 1),
(453, 'TIBAK QUEEN', NULL, 'TIBAK QUEEN', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 10.00, 18.00, '', 'CLDS', '', 0.00, 0, 1),
(454, 'WEIGHTS', NULL, 'WEIGHTS', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 17.00, 22.00, '', 'CLDS', '', 0.00, 0, 1),
(455, 'TEXAZ TRAINER', NULL, 'TEXAZ TRAINER', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 150.00, 200.00, '', 'CLDS', '', 0.00, 0, 1),
(456, 'WINGBAND ALUM W/I', NULL, 'WINGBAND ALUM W/I', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 8.00, 0.00, '', 'CLDS', '', 0.00, 0, 1),
(457, 'WINGBAND BRASS W/I', NULL, 'WINGBAND BRASS W/I', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 12.50, 0.00, '', 'CLDS', '', 0.00, 0, 1),
(458, 'RS TIBAK SHOE BONDAGE', NULL, 'RS TIBAK SHOE BONDAGE', '', '', 'PIECE', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 17.68, 28.00, '', 'CLDS', '', 0.00, 0, 1),
(459, 'LEG BAND/PIGEON ', NULL, 'PIGEON LEG BAND ', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 20.00, 35.00, '', 'CLDS', '', 0.00, 0, 1),
(460, 'PLIERS', NULL, 'PLIERS', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 310.00, 390.00, '', 'CLDS', '', 0.00, 0, 1),
(461, 'TOE PUNCHER', NULL, 'TOE PUNCHER', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 190.00, 240.00, '', 'CLDS', '', 0.00, 0, 1),
(462, 'TARI SHARPENER 1K', NULL, 'TARI SHARPENER 1K', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 250.00, 315.00, '', 'CLDS', '', 0.00, 0, 1),
(463, 'TARI SHARPENER 2K', NULL, 'TARI SHARPENER 2K', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 280.00, 350.00, '', 'CLDS', '', 0.00, 0, 1),
(464, 'TARI TAPE', NULL, 'TARI TAPE', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'OTHERS', '', 18.00, 22.00, '', 'CLDS', '', 0.00, 0, 1),
(465, 'PUGAD SMALL', NULL, 'PUGAD SMALL', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'NEST', '', 28.00, 38.00, '', 'CLDS', '', 0.00, 0, 1),
(466, 'PUGAD BIG', NULL, 'PUGAD BIG', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'NEST', '', 28.00, 48.00, '', 'CLDS', '', 0.00, 0, 1),
(467, 'PIGEON RING', NULL, 'PIGEON RING', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', 'NEST', '', 0.00, 0.00, '', 'CLDS', '', 0.00, 0, 1),
(468, 'RICE #26', NULL, 'RICE #26', '', '', '', 'POULRTY SUPPLY', 'RICE', '', '', 0.00, 0.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(469, 'RICE #26', NULL, 'RICE #26', '', '', '', 'POULRTY SUPPLY', 'RICE', '', '', 0.00, 26.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(470, 'RICE #29', NULL, 'RICE #29', '', '', '50 KGS.', 'POULRTY SUPPLY', 'RICE', '', '', 1.00, 0.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(471, 'RICE #29', NULL, 'RICE #29', '', '', 'KG', 'POULRTY SUPPLY', 'RICE', '', '', 25.51, 29.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(472, 'RICE #30', NULL, 'RICE #30', '', '', '50 KGS.', 'POULRTY SUPPLY', 'RICE', '', '', 1.00, 0.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(473, 'RICE #30', NULL, 'RICE #30', '', '', 'KG', 'POULRTY SUPPLY', 'RICE', '', '', 26.94, 30.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(474, 'RICE #31', NULL, 'RICE #31', '', '', '50 KGS.', 'POULRTY SUPPLY', 'RICE', '', '', 1.00, 0.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(475, 'RICE #31', NULL, 'RICE #31', '', '', 'KG', 'POULRTY SUPPLY', 'RICE', '', '', 28.16, 31.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(476, 'RICE #32', NULL, 'RICE #32', '', '', '50 KGS.', 'POULRTY SUPPLY', 'RICE', '', '', 1.00, 0.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(477, 'RICE #32', NULL, 'RICE #32', '', '', 'KG', 'POULRTY SUPPLY', 'RICE', '', '', 28.98, 32.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(478, 'RICE #33', NULL, 'RICE #33', '', '', '50 KGS.', 'POULRTY SUPPLY', 'RICE', '', '', 1.00, 0.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(479, 'RICE #33', NULL, 'RICE #33', '', '', 'KG', 'POULRTY SUPPLY', 'RICE', '', '', 30.00, 33.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(480, 'RICE #34', NULL, 'RICE #34', '', '', '50 KGS.', 'POULRTY SUPPLY', 'RICE', '', '', 1.00, 0.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(481, 'RICE #34', NULL, 'RICE #34', '', '', 'KG', 'POULRTY SUPPLY', 'RICE', '', '', 31.02, 34.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(482, 'RICE #35', NULL, 'RICE #35', '', '', '50 KGS.', 'POULRTY SUPPLY', 'RICE', '', '', 1.00, 0.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(483, 'RICE #35', NULL, 'RICE #35', '', '', 'KG', 'POULRTY SUPPLY', 'RICE', '', '', 32.04, 35.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(484, 'RICE #36', NULL, 'RICE #36', '', '', '50 KGS.', 'POULRTY SUPPLY', 'RICE', '', '', 1.00, 0.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(485, 'RICE #36', NULL, 'RICE #36', '', '', 'KG', 'POULRTY SUPPLY', 'RICE', '', '', 31.63, 36.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(486, 'RICE #37', NULL, 'RICE #37', '', '', '50 KGS.', 'POULRTY SUPPLY', 'RICE', '', '', 1.00, 0.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(487, 'RICE #37', NULL, 'RICE #37', '', '', 'KG', 'POULRTY SUPPLY', 'RICE', '', '', 34.69, 37.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(488, 'RICE #38', NULL, 'RICE #38', '', '', '50 KGS.', 'POULRTY SUPPLY', 'RICE', '', '', 1.00, 0.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(489, 'RICE #38', NULL, 'RICE #38', '', '', 'KG', 'POULRTY SUPPLY', 'RICE', '', '', 34.08, 38.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(490, 'RICE #39', NULL, 'RICE #39', '', '', '50 KGS.', 'POULRTY SUPPLY', 'RICE', '', '', 1.00, 0.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(491, 'RICE #39', NULL, 'RICE #39', '', '', 'KG', 'POULRTY SUPPLY', 'RICE', '', '', 34.49, 0.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(492, 'RICE #40', NULL, 'RICE #40', '', '', '25 KGS.', 'POULRTY SUPPLY', 'RICE', '', '', 855.00, 0.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(493, 'RICE #40', NULL, 'RICE #40', '', '', 'KGS.', 'POULRTY SUPPLY', 'RICE', '', '', 34.90, 40.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(494, 'RICE #42', NULL, 'RICE #42', '', '', '', 'POULRTY SUPPLY', 'RICE', '', '', 900.00, 0.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(495, 'RICE #42', NULL, 'RICE #42', '', '', '', 'POULRTY SUPPLY', 'RICE', '', '', 36.73, 42.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(496, 'RICE #43', NULL, 'RICE #43', '', '', '25 KGS.', 'POULRTY SUPPLY', 'RICE', '', '', 950.00, 0.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(497, 'RICE #43', NULL, 'RICE #43', '', '', 'KGS.', 'POULRTY SUPPLY', 'RICE', '', '', 38.78, 43.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(498, 'RICE JASMINE', NULL, 'RICE JASMINE', '', '', '', 'POULRTY SUPPLY', 'RICE', '', '', 1.00, 0.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(499, 'RICE JASMINE', NULL, 'RICE JASMINE', '', '', '', 'POULRTY SUPPLY', 'RICE', '', '', 52.24, 58.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(500, 'RICE DND', NULL, 'RICE DND', '', '', '25 KGS.', 'POULRTY SUPPLY', 'RICE', '', '', 910.00, 0.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(501, 'RICE DND', NULL, 'RICE DND', '', '', 'KG.', 'POULRTY SUPPLY', 'RICE', '', '', 37.14, 44.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(502, 'RICE MALAGKIT', NULL, 'RICE MALAGKIT', '', '', '50 KGS.', 'POULRTY SUPPLY', 'RICE', '', '', 1.00, 0.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(503, 'RICE MALAGKIT', NULL, 'RICE MALAGKIT', '', '', 'KG', 'POULRTY SUPPLY', 'RICE', '', '', 36.73, 40.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(504, 'RICE SUNGSONG', NULL, 'RICE SUNGSONG', '', '', '50 KGS.', 'POULRTY SUPPLY', 'RICE', '', '', 2.00, 0.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(505, 'RICE SUNGSONG', NULL, 'RICE SUNGSONG', '', '', 'KG.', 'POULRTY SUPPLY', 'RICE', '', '', 54.08, 60.00, '', 'AR MARISTELA', '', 0.00, 0, 1),
(506, 'COMPLETE', NULL, 'COMPLETE', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'FERTILIZER', '', 1.00, 1.00, '', 'NOCEJA', '', 0.00, 0, 1),
(507, 'COMPLETE', NULL, 'COMPLETE', '', '', 'KG.', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'FERTILIZER', '', 25.20, 29.00, '', 'NOCEJA', '', 0.00, 0, 1),
(508, 'UREA', NULL, 'UREA', '', '', '50 KGS.', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'FERTILIZER', '', 1.00, 1.00, '', 'AGRICONS', '', 0.00, 0, 1),
(509, 'UREA', NULL, 'UREA', '', '', 'KG.', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'FERTILIZER', '', 23.80, 27.50, '', 'AGRICONS', '', 0.00, 0, 1),
(510, 'CREOLINA', NULL, 'CREOLINA', '', '', '60 ML.', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'CHEMICALS', '', 11.46, 18.00, '', 'PARL', '', 0.00, 0, 1),
(511, 'CREOLINA', NULL, 'CREOLINA', '', '', '120 ML.', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'CHEMICALS', '', 17.70, 27.00, '', 'PARL', '', 0.00, 0, 1),
(512, 'CREOLINA', NULL, 'CREOLINA', '', '', '250 ML.', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'CHEMICALS', '', 37.00, 67.00, '', 'PARL', '', 0.00, 0, 1),
(513, 'CREOLINA', NULL, 'CREOLINA', '', '', '500 ML.', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'CHEMICALS', '', 68.85, 120.00, '', 'PARL', '', 0.00, 0, 1),
(514, 'CREOLINA', NULL, 'CREOLINA', '', '', '1L', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'CHEMICALS', '', 117.90, 215.00, '', 'PARL', '', 0.00, 0, 1),
(515, 'GENTIAN VIOLET', NULL, 'GENTIAN VIOLET', '', '', '60 ML.', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'CHEMICALS', '', 8.54, 16.00, '', 'PARL', '', 0.00, 0, 1),
(516, 'GENTIAN VIOLET', NULL, 'GENTIAN VIOLET', '', '', '100 ML.', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'CHEMICALS', '', 12.70, 25.00, '', 'PARL', '', 0.00, 0, 1),
(517, 'MALATHION', NULL, 'MALATHION', '', '', '60 ML.', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'CHEMICALS', '', 23.00, 35.00, '', 'JL', '', 0.00, 0, 1),
(518, 'MALATHION', NULL, 'MALATHION', '', '', '100 ML.', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'CHEMICALS', '', 40.20, 65.00, '', 'JL', '', 0.00, 0, 1),
(519, 'PINETAR', NULL, 'PINETAR', '', '', '60 ML.', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'CHEMICALS', '', 13.54, 23.00, '', 'PARL', '', 0.00, 0, 1),
(520, 'PINETAR', NULL, 'PINETAR', '', '', '120 ML.', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'CHEMICALS', '', 20.88, 36.00, '', 'PARL', '', 0.00, 0, 1),
(521, 'TINCTURE OF IODINE', NULL, 'TINCTURE OF IODINE', '', '', '60 ML.', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'CHEMICALS', '', 23.72, 35.00, '', 'PARL', '', 0.00, 0, 1),
(522, 'TINCTURE OF IODINE', NULL, 'TINCTURE OF IODINE', '', '', '120 ML.', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'CHEMICALS', '', 43.16, 60.00, '', 'PARL', '', 0.00, 0, 1),
(523, 'SEVIN', NULL, 'SEVIN', '', '', '', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'CHEMICALS', '', 55.00, 75.00, '', 'JL', '', 0.00, 0, 1),
(524, 'ZINC PHOSPHIDE', NULL, 'ZINC PHOSPHIDE', '', '', '', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'CHEMICALS', '', 16.00, 23.00, '', 'JL', '', 0.00, 0, 1),
(525, 'BRODAN', NULL, 'BRODAN', '', '', '100ML', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'CHEMICALS', '', 70.00, 90.00, '', 'JL', '', 0.00, 0, 1),
(526, 'FURADAN', NULL, 'FURADAN', '', '', '1KG', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'CHEMICALS', '', 87.00, 115.00, '', 'JL', '', 0.00, 0, 1),
(527, 'SELECTRON', NULL, 'SELECTRON', '', '', '', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'CHEMICALS', '', 0.00, 0.00, '', 'JL', '', 0.00, 0, 1),
(528, 'ASCEND', NULL, 'ASCEND', '', '', '', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'CHEMICALS', '', 0.00, 0.00, '', 'JL', '', 0.00, 0, 1),
(529, 'SEEDS/AMPALAYA', NULL, 'AMPALAYA', '', '', '', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'SEEDS', '', 31.50, 50.00, '', 'ALLIED BOTANICAL', '', 0.00, 0, 1),
(530, 'SEEDSCALABASA', NULL, 'CALABASA', '', '', '', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'SEEDS', '', 21.00, 35.00, '', 'ALLIED BOTANICAL', '', 0.00, 0, 1),
(531, 'SEEDSMUSTARD', NULL, 'MUSTARD', '', '', '', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'SEEDS', '', 21.00, 35.00, '', 'ALLIED BOTANICAL', '', 0.00, 0, 1),
(532, 'SEEDS/OKRA', NULL, 'OKRA', '', '', '', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'SEEDS', '', 21.00, 35.00, '', 'ALLIED BOTANICAL', '', 0.00, 0, 1),
(533, 'SEEDS/PATOLA', NULL, 'PATOLA', '', '', '', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'SEEDS', '', 21.00, 35.00, '', 'ALLIED BOTANICAL', '', 0.00, 0, 1),
(534, 'SEEDS/PECHAY', NULL, 'PECHAY', '', '', '', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'SEEDS', '', 21.00, 35.00, '', 'ALLIED BOTANICAL', '', 0.00, 0, 1),
(535, 'SEEDS/SITAO', NULL, 'SITAO', '', '', '', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'SEEDS', '', 21.00, 35.00, '', 'ALLIED BOTANICAL', '', 0.00, 0, 1),
(536, 'SEEDS/UPO', NULL, 'UPO', '', '', '', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'SEEDS', '', 21.00, 35.00, '', 'ALLIED BOTANICAL', '', 0.00, 0, 1),
(537, 'SEEDS/EGGPLANT', NULL, 'EGGPLANT', '', '', '', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'SEEDS', '', 31.50, 50.00, '', 'ALLIED BOTANICAL', '', 0.00, 0, 1),
(538, 'SEEDS/TOMATO', NULL, 'TOMATO', '', '', '', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'SEEDS', '', 21.00, 35.00, '', 'ALLIED BOTANICAL', '', 0.00, 0, 1),
(539, 'SEEDS/CUCUMBER', NULL, 'CUCUMBER', '', '', '', 'POULRTY SUPPLY', 'FERTILIZERS AND CHEMICALS', 'SEEDS', '', 31.50, 50.00, '', 'ALLIED BOTANICAL', '', 0.00, 0, 1),
(540, 'SPRAYER', NULL, 'SPRAYER', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK ACCESSORIES', '', '', 35.00, 55.00, '', '', '', 0.00, 0, 1),
(541, 'CALFMANNA', NULL, 'CALFMANNA', '', '', '50 LBS', 'POULRTY SUPPLY', 'FIGHTING COCK SPECIALTIES', '', '', 1.00, 1.00, '', 'CLDS', '', 0.00, 0, 1),
(542, 'CALFMANNA', NULL, 'CALFMANNA', '', '', 'KG.', 'POULRTY SUPPLY', 'FIGHTING COCK SPECIALTIES', '', '', 56.92, 70.00, '', 'CLDS', '', 0.00, 0, 1),
(543, 'HOLDING RATION', NULL, 'HOLDING RATION', '', '', '50  LBS', 'POULRTY SUPPLY', 'FIGHTING COCK SPECIALTIES', '', '', 1.00, 0.00, '', 'CLDS', '', 0.00, 0, 1),
(544, 'HOLDING RATION', NULL, 'HOLDING RATION', '', '', 'KG', 'POULRTY SUPPLY', 'FIGHTING COCK SPECIALTIES', '', '', 46.36, 55.00, '', 'CLDS', '', 0.00, 0, 1),
(545, 'DEXTROVET', NULL, 'DEXTROVET', '', '', '300 GMS', 'POULRTY SUPPLY', 'FIGHTING COCK SPECIALTIES', '', '', 39.00, 55.00, '', 'ARVET', '', 0.00, 0, 1),
(546, 'DEXTROVET', NULL, 'DEXTROVET', '', '', '100 GMS', 'POULRTY SUPPLY', 'FIGHTING COCK SPECIALTIES', '', '', 14.00, 22.00, '', 'ARVET', '', 0.00, 0, 1),
(547, 'WHITE OATS', NULL, 'WHITE OATS', '', '', '500 GMS', 'POULRTY SUPPLY', 'FIGHTING COCK SPECIALTIES', '', '', 54.25, 60.00, '', 'CLDS', '', 0.00, 0, 1),
(548, 'SKIM MILK', NULL, 'SKIM MILK', '', '', 'KG. ', 'POULRTY SUPPLY', 'FIGHTING COCK SPECIALTIES', '', '', 40.80, 120.00, '', 'FARMLAND', '', 0.00, 0, 1),
(549, 'SKIM MILK', NULL, 'SKIM MILK', '', '', '1/4 KG.', 'POULRTY SUPPLY', 'FIGHTING COCK SPECIALTIES', '', '', 10.20, 30.00, '', 'FARMLAND', '', 0.00, 0, 1),
(550, 'WHEAT GERM', NULL, 'WHEAT GERM', '', '', '300 GMS.', 'POULRTY SUPPLY', 'FIGHTING COCK SPECIALTIES', '', '', 42.00, 60.00, '', 'ARVET', '', 0.00, 0, 1),
(551, 'WHEAT GERM SMALL', NULL, 'WHEAT GERM SMALL', '', '', '100 GMS.', 'POULRTY SUPPLY', 'FIGHTING COCK SPECIALTIES', '', '', 19.00, 24.00, '', 'ARVET', '', 0.00, 0, 1),
(552, 'ROOSTER MILK', NULL, 'ROOSTER MILK', '', '', '', 'POULRTY SUPPLY', 'FIGHTING COCK SPECIALTIES', '', '', 45.15, 58.00, '', 'APT', '', 0.00, 0, 1),
(553, 'AMOBAC', NULL, 'AMOBAC', '', '', '7GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 17.86, 25.00, '', 'LDI', '', 0.00, 0, 1),
(554, 'ANDROBOL', NULL, 'ANDROBOL', '', '', 'TABLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 12.86, 18.00, '', 'LDI', '', 0.00, 0, 1),
(555, 'B-12-LDI', NULL, 'B-12', '', '', 'CAPLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 2.86, 3.50, '', 'LDI', '', 0.00, 0, 1),
(556, 'BEE POLLEN', NULL, 'BEE POLLEN', '', '', 'TABLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 3.57, 5.00, '', 'LDI', '', 0.00, 0, 1),
(557, 'BIOCALCIUM', NULL, 'BIOCALCIUM', '', '', 'CAPLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 2.50, 3.50, '', 'LDI', '', 0.00, 0, 1),
(558, 'CYDROXO', NULL, 'CYDROXO', '', '', '10 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 135.71, 190.00, '', 'LDI', '', 0.00, 0, 1),
(559, 'CIPROTYL', NULL, 'CIPROTYL', '', '', '50''S', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 500.00, 0.00, '', 'LDI', '', 0.00, 0, 1),
(560, 'CIPROTYL', NULL, 'CIPROTYL', '', '', 'TABS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 10.71, 15.00, '', 'LDI', '', 0.00, 0, 1),
(561, 'CIPROTYL', NULL, 'CIPROTYL', '', '', '7 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 20.00, 28.00, '', 'LDI', '', 0.00, 0, 1),
(562, 'DOXYLAK', NULL, 'DOXYLAK', '', '', 'TABLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 5.71, 8.00, '', 'LDI', '', 0.00, 0, 1),
(563, 'DOXYLAK', NULL, 'DOXYLAK', '', '', '7 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 14.29, 20.00, '', 'LDI', '', 0.00, 0, 1),
(564, 'LAKTAMINO DROPS', NULL, 'LAKTAMINO DROPS', '', '', '30 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 50.00, 70.00, '', 'LDI', '', 0.00, 0, 1),
(565, 'LAKTAMINO DROPS', NULL, 'LAKTAMINO DROPS', '', '', '1L', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 642.86, 900.00, '', 'LDI', '', 0.00, 0, 1),
(566, 'LEVIMIN GK', NULL, 'LEVIMIN GK', '', '', '7 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 14.29, 20.00, '', 'LDI', '', 0.00, 0, 1),
(567, 'LEVIMIN GK', NULL, 'LEVIMIN GK', '', '', '100 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 114.29, 160.00, '', 'LDI', '', 0.00, 0, 1),
(568, 'MEEB', NULL, 'MEEB', '', '', '10 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 178.57, 250.00, '', 'LDI', '', 0.00, 0, 1),
(569, 'MULTI-LYTE', NULL, 'MULTI-LYTE', '', '', '22GMS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 14.29, 20.00, '', 'LDI', '', 0.00, 0, 1),
(570, 'MULTI-LYTE', NULL, 'MULTI-LYTE', '', '', '1 KG.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 335.71, 470.00, '', 'LDI', '', 0.00, 0, 1),
(571, 'PROXIGEN', NULL, 'PROXIGEN', '', '', 'CAPSULE', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 9.29, 13.00, '', 'LDI', '', 0.00, 0, 1),
(572, 'PYRISTAT', NULL, 'PYRISTAT', '', '', 'TABS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 6.43, 9.00, '', 'LDI', '', 0.00, 0, 1),
(573, 'PYRISTAT', NULL, 'PYRISTAT', '', '', '7 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 12.14, 17.00, '', 'LDI', '', 0.00, 0, 1),
(574, 'PYRISTAT', NULL, 'PYRISTAT', '', '', '60 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 128.57, 180.00, '', 'LDI', '', 0.00, 0, 1),
(575, 'RED GEL', NULL, 'RED GEL', '', '', 'CAPSULE', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 17.86, 25.00, '', 'LDI', '', 0.00, 0, 1),
(576, 'SLAZBOLAK', NULL, 'SLAZBOLAK', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 257.14, 360.00, '', 'LDI', '', 0.00, 0, 1),
(577, 'TAPE TERMINATOR', NULL, 'TAPE TERMINATOR', '', '', '10ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 21.43, 30.00, '', 'LDI', '', 0.00, 0, 1),
(578, 'TAPE TERMINATOR', NULL, 'TAPE TERMINATOR', '', '', '1L', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 964.29, 1.00, '', 'LDI', '', 0.00, 0, 1),
(579, 'THIABEX XS', NULL, 'THIABEX XS', '', '', '10ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 100.00, 140.00, '', 'LDI', '', 0.00, 0, 1),
(580, 'THIABEX XS', NULL, 'THIABEX XS', '', '', '20ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 132.14, 185.00, '', 'LDI', '', 0.00, 0, 1),
(581, 'THIABEX XS', NULL, 'THIABEX XS', '', '', '100ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 428.57, 600.00, '', 'LDI', '', 0.00, 0, 1),
(582, 'TRISULAK ', NULL, 'TRISULAK ', '', '', 'CAPLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 5.71, 8.00, '', 'LDI', '', 0.00, 0, 1),
(583, 'TRISULAK ', NULL, 'TRISULAK ', '', '', '7 GMS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 10.71, 15.00, '', 'LDI', '', 0.00, 0, 1),
(584, 'TRISULAK ', NULL, 'TRISULAK ', '', '', '10ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 110.71, 155.00, '', 'LDI', '', 0.00, 0, 1),
(585, 'VERMEX ECO', NULL, 'VERMEX ECO', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 8.57, 12.00, '', 'LDI', '', 0.00, 0, 1),
(586, 'VERMEX-2', NULL, 'VERMEX-2', '', '', 'CAPLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 2.86, 5.00, '', 'LDI', '', 0.00, 0, 1),
(587, 'VERMEX FORTE', NULL, 'VERMEX FORTE', '', '', 'CAPS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 4.29, 6.00, '', 'LDI', '', 0.00, 0, 1),
(588, 'VIMINOLAK', NULL, 'VIMINOLAK', '', '', 'CAPLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 4.29, 6.00, '', 'LDI', '', 0.00, 0, 1),
(589, 'VIMINOLAK IRON CELL', NULL, 'VIMINOLAK IRON CELL', '', '', '30 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 67.86, 95.00, '', 'LDI', '', 0.00, 0, 1),
(590, 'VIMINOLAK IRON CELL', NULL, 'VIMINOLAK IRON CELL', '', '', '1L', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 678.57, 950.00, '', 'LDI', '', 0.00, 0, 1),
(591, 'WASHOUT', NULL, 'WASHOUT', '', '', '10 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 10.00, 13.00, '', 'LDI', '', 0.00, 0, 1),
(592, 'MUSCLE POWER KEEP', NULL, 'MUSCLE POWER KEEP', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 32.14, 45.00, '', 'LDI', '', 0.00, 0, 1),
(593, 'CUTTING POWER KEEP', NULL, 'CUTTING POWER KEEP', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 32.14, 45.00, '', 'LDI', '', 0.00, 0, 1),
(594, 'MILKOLAK', NULL, 'MILKOLAK', '', '', '100GMS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 60.71, 85.00, '', 'LDI', '', 0.00, 0, 1),
(595, 'LINCOGEN', NULL, 'LINCOGEN', '', '', '10ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 121.43, 170.00, '', 'LDI', '', 0.00, 0, 1),
(596, 'GENMOX', NULL, 'GENMOX', '', '', '10ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 164.29, 230.00, '', 'LDI', '', 0.00, 0, 1),
(597, 'KABEZEN', NULL, 'KABEZEN', '', '', '1L', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 785.71, 1.00, '', 'LDI', '', 0.00, 0, 1),
(598, 'ENROFLOXACIN', NULL, 'ENROFLOXACIN', '', '', '10ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'LAKPUE', '', 85.71, 120.00, '', 'LDI', '', 0.00, 0, 1),
(599, 'APARLYTE', NULL, 'APARLYTE', '', '', '6 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 16.54, 21.00, '', 'UNAHCO', '', 0.00, 0, 1),
(600, 'APARLYTE', NULL, 'APARLYTE', '', '', '24 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 58.80, 72.00, '', 'UNAHCO', '', 0.00, 0, 1),
(601, 'BACTERID', NULL, 'BACTERID', '', '', '10ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 119.07, 170.00, '', 'UNAHCO', '', 0.00, 0, 1),
(602, 'BAXIDIL', NULL, 'BAXIDIL', '', '', 'CAPLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 5.29, 8.00, '', 'UNAHCO', '', 0.00, 0, 1),
(603, 'BAXIDIL', NULL, 'BAXIDIL', '', '', '7 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 11.46, 13.50, '', 'UNAHCO', '', 0.00, 0, 1),
(604, 'BAXIDIL', NULL, 'BAXIDIL', '', '', '30 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 38.13, 45.00, '', 'UNAHCO', '', 0.00, 0, 1),
(605, 'BAXIDIL', NULL, 'BAXIDIL', '', '', '1 KG.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 594.05, 707.00, '', 'UNAHCO', '', 0.00, 0, 1),
(606, 'BAXIDIL SE', NULL, 'BAXIDIL SE', '', '', '6 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 12.86, 15.50, '', 'UNAHCO', '', 0.00, 0, 1),
(607, 'BAXIDIL SE', NULL, 'BAXIDIL SE', '', '', '30 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 40.42, 50.00, '', 'UNAHCO', '', 0.00, 0, 1),
(608, 'BAXIDIL SE ', NULL, 'BAXIDIL SE ', '', '', '1KG', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 740.88, 890.00, '', 'UNAHCO', '', 0.00, 0, 1),
(609, 'BEXAN XP', NULL, 'BEXAN XP', '', '', '10 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 128.42, 160.00, '', 'UNAHCO', '', 0.00, 0, 1),
(610, 'BEXAN XP', NULL, 'BEXAN XP', '', '', '20 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 203.74, 235.00, '', 'UNAHCO', '', 0.00, 0, 1),
(611, 'BEXAN XP ', NULL, 'BEXAN XP ', '', '', '100ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 694.92, 810.00, '', 'UNAHCO', '', 0.00, 0, 1),
(612, 'ELECTOGEN', NULL, 'ELECTOGEN', '', '', '6 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 6.63, 8.50, '', 'UNAHCO', '', 0.00, 0, 1),
(613, 'ELECTOGEN', NULL, 'ELECTOGEN', '', '', '20 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 11.54, 15.00, '', 'UNAHCO', '', 0.00, 0, 1),
(614, 'ELECTOGEN', NULL, 'ELECTOGEN', '', '', '1 KG', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 573.29, 685.00, '', 'UNAHCO', '', 0.00, 0, 1),
(615, 'GANADOR MAX', NULL, 'GANADOR MAX', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 5.73, 8.00, '', 'UNAHCO', '', 0.00, 0, 1),
(616, 'JECTRAN/CL', NULL, 'JECTRAN/CL', '', '', '10 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 108.45, 130.00, '', 'UNAHCO', '', 0.00, 0, 1),
(617, 'JECTRAN/CL', NULL, 'JECTRAN/CL', '', '', '20 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 162.28, 195.00, '', 'UNAHCO', '', 0.00, 0, 1),
(618, 'JECTRAN/PR', NULL, 'JECTRAN/PR', '', '', '10 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 163.17, 200.00, '', 'UNAHCO', '', 0.00, 0, 1),
(619, 'JECTRAN/PR', NULL, 'JECTRAN/PR', '', '', '20 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 233.73, 285.00, '', 'UNAHCO', '', 0.00, 0, 1),
(620, 'JECTRAN/PR', NULL, 'JECTRAN/PR', '', '', '100 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 432.18, 530.00, '', 'UNAHCO', '', 0.00, 0, 1),
(621, 'LATIGO 50 MGS.', NULL, 'LATIGO 50 MGS.', '', '', 'PIECE', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 7.13, 9.75, '', 'UNAHCO', '', 0.00, 0, 1),
(622, 'LATIGO 500 MGS.', NULL, 'LATIGO 500 MGS.', '', '', 'CAPLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 24.25, 31.50, '', 'UNAHCO', '', 0.00, 0, 1),
(623, 'LATIGO 1000', NULL, 'LATIGO 1000', '', '', '10 GMS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 24.63, 32.00, '', 'UNAHCO', '', 0.00, 0, 1),
(624, 'MAJOR D', NULL, 'MAJOR D', '', '', '20ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 15.88, 20.00, '', 'UNAHCO', '', 0.00, 0, 1),
(625, 'MICROBAN', NULL, 'MICROBAN', '', '', '100ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 105.18, 125.00, '', 'UNAHCO', '', 0.00, 0, 1),
(626, 'PUSHAM', NULL, 'PUSHAM', '', '', '8 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 8.40, 12.50, '', 'UNAHCO', '', 0.00, 0, 1),
(627, 'STRONG GUARD', NULL, 'STRONG GUARD', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 5.29, 7.00, '', 'UNAHCO', '', 0.00, 0, 1),
(628, 'VERMIGO', NULL, 'VERMIGO', '', '', 'CAPLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 3.23, 4.50, '', 'UNAHCO', '', 0.00, 0, 1),
(629, 'VET CAPS GOLD', NULL, 'VET CAPS GOLD', '', '', 'CAPSULE', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 5.33, 8.00, '', 'UNAHCO', '', 0.00, 0, 1),
(630, 'VETRACIN ', NULL, 'VETRACIN ', '', '', '1KG', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 520.69, 620.00, '', 'UNAHCO', '', 0.00, 0, 1),
(631, 'VET GOLD', NULL, 'VETRACIN GOLD', '', '', '1KG', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 1.00, 1.00, '', 'UNAHCO', '', 0.00, 0, 1),
(632, 'VET CLASS', NULL, 'VETRACIN', '', '', '5 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 8.91, 12.00, '', 'UNAHCO', '', 0.00, 0, 1),
(633, 'VET CLASS', NULL, 'VETRACIN', '', '', '31.2 gms', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 54.39, 65.00, '', 'UNAHCO', '', 0.00, 0, 1),
(634, 'VET CLASS', NULL, 'VETRACIN', '', '', '150G', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 163.17, 205.00, '', 'UNAHCO', '', 0.00, 0, 1),
(635, 'VET PREM ', NULL, 'VETRACIN PREMIUM ', '', '', '5 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 12.50, 17.00, '', 'UNAHCO', '', 0.00, 0, 1),
(636, 'VET PREM ', NULL, 'VETRACIN PREMIUM ', '', '', '24 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 62.47, 75.00, '', 'UNAHCO', '', 0.00, 0, 1),
(637, 'VET PREM ', NULL, 'VETRACIN PREMIUM ', '', '', '114', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 189.63, 240.00, '', 'UNAHCO', '', 0.00, 0, 1),
(638, 'VET GOLD', NULL, 'VETRACIN GOLD', '', '', '5 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 16.35, 22.00, '', 'UNAHCO', '', 0.00, 0, 1),
(639, 'VET GOLD', NULL, 'VETRACIN GOLD', '', '', '24 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 79.38, 100.00, '', 'UNAHCO', '', 0.00, 0, 1),
(640, 'VET GOLD', NULL, 'VETRACIN GOLD', '', '', '114', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 238.14, 300.00, '', 'UNAHCO', '', 0.00, 0, 1),
(641, 'VETRACIN', NULL, 'VETRACIN', '', '', 'REPACK', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 1.40, 5.00, '', 'UNAHCO', '', 0.00, 0, 1),
(642, 'VET CAPS 250', NULL, 'VET CAPS 250', '', '', 'CAPSULE', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 5.87, 8.00, '', 'UNAHCO', '', 0.00, 0, 1),
(643, 'ENERGEN', NULL, 'ENERGEN', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 15.82, 22.00, '', 'UNAHCO', '', 0.00, 0, 1),
(644, 'VREX', NULL, 'VREX', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'UNIVET', '', 7.50, 10.00, '', 'UNAHCO', '', 0.00, 0, 1),
(645, 'AMOXTIN ', NULL, 'AMOXTIN ', '', '', '5GMS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'SAGUPAAN', '', 12.60, 16.00, '', 'SAGUPAAN', '', 0.00, 0, 1);
INSERT INTO `item` (`item_id`, `item_code`, `bar_code`, `desc1`, `desc2`, `desc3`, `desc4`, `division`, `group`, `class1`, `class2`, `cost`, `retail_price`, `model_quantity`, `supplier_code`, `manufacturer`, `quantity`, `reorder_point`, `active`) VALUES
(646, 'AMOXTIN', NULL, 'AMOXTIN', '', '', '20 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'SAGUPAAN', '', 43.80, 57.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(647, 'AXYLIN', NULL, 'AXYLIN', '', '', '5 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'SAGUPAAN', '', 18.60, 24.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(648, 'AXYLIN', NULL, 'AXYLIN', '', '', '20GMS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'SAGUPAAN', '', 72.00, 95.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(649, 'B 50', NULL, 'B 50', '', '', 'CAPS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'SAGUPAAN', '', 3.75, 5.50, '', 'SAGUPAAN', '', 0.00, 0, 1),
(650, 'COMPLEXOR', NULL, 'COMPLEXOR', '', '', '10 ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'SAGUPAAN', '', 122.85, 158.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(651, 'COMPLEXOR', NULL, 'COMPLEXOR', '', '', '20 ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'SAGUPAAN', '', 205.05, 263.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(652, 'COMPLEXOR', NULL, 'COMPLEXOR', '', '', '100ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'SAGUPAAN', '', 798.40, 955.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(653, 'COMPLEXOR', NULL, 'COMPLEXOR', '', '', '1CC', 'POULRTY SUPPLY', 'VET PRODUCTS', 'SAGUPAAN', '', 7.98, 12.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(654, 'DOVITRON', NULL, 'DOVITRON', '', '', '5GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'SAGUPAAN', '', 12.60, 16.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(655, 'DOVITRON', NULL, 'DOVITRON', '', '', '20GMS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'SAGUPAAN', '', 41.40, 55.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(656, 'EXTRACTOR', NULL, 'EXTRACTOR', '', '', 'CAPS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'SAGUPAAN', '', 4.20, 7.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(657, 'HAMMER', NULL, 'HAMMER', '', '', 'CAPS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'SAGUPAAN', '', 3.75, 5.50, '', 'SAGUPAAN', '', 0.00, 0, 1),
(658, 'HAMMER 6ML', NULL, 'HAMMER 6ML', '', '', '6 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'SAGUPAAN', '', 13.20, 17.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(659, 'MITE FREE', NULL, 'MITE FREE', '', '', 'SACHET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'SAGUPAAN', '', 8.25, 12.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(660, 'SELECTROGEN', NULL, 'SELECTROGEN', '', '', '20 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'SAGUPAAN', '', 14.80, 20.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(661, 'T^2s 500', NULL, 'T^2s 500', '', '', 'CAPS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'SAGUPAAN', '', 6.60, 9.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(662, 'T^2s 500', NULL, 'T^2s 500', '', '', '5 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'SAGUPAAN', '', 15.82, 20.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(663, 'T^2s 500', NULL, 'T^2s 500', '', '', '20 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'SAGUPAAN', '', 43.80, 60.00, '', 'SAGUPAAN', '', 0.00, 0, 1),
(664, 'AFSILLIN', NULL, 'AFSILLIN', '', '', '220GMS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'NOVARTIS', '', 134.00, 165.00, '', 'VARIOUS', '', 0.00, 0, 1),
(665, 'AGITA', NULL, 'AGITA', '', '', '3G', 'POULRTY SUPPLY', 'VET PRODUCTS', 'NOVARTIS', '', 19.42, 30.00, '', 'VARIOUS', '', 0.00, 0, 1),
(666, 'AGITA', NULL, 'AGITA', '', '', '400GMS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'NOVARTIS', '', 2.00, 0.00, '', 'VARIOUS', '', 0.00, 0, 1),
(667, 'BELAMYL', NULL, 'BELAMYL', '', '', 'RETAIL', 'POULRTY SUPPLY', 'VET PRODUCTS', 'NOVARTIS', '', 8.50, 13.00, '', 'CLDS', '', 0.00, 0, 1),
(668, 'BELAMYL', NULL, 'BELAMYL', '', '', '10ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'NOVARTIS', '', 163.00, 188.00, '', 'CLDS', '', 0.00, 0, 1),
(669, 'BELAMYL', NULL, 'BELAMYL', '', '', '20 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'NOVARTIS', '', 234.00, 278.00, '', 'CLDS', '', 0.00, 0, 1),
(670, 'BELAMYL', NULL, 'BELAMYL', '', '', '50 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'NOVARTIS', '', 435.00, 540.00, '', 'CLDS', '', 0.00, 0, 1),
(671, 'BELAMYL', NULL, 'BELAMYL', '', '', '100 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'NOVARTIS', '', 850.00, 1.00, '', 'CLDS', '', 0.00, 0, 1),
(672, 'PAKYAW', NULL, 'PAKYAW', '', '', 'TABS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'NOVARTIS', '', 2.99, 5.00, '', 'CLDS', '', 0.00, 0, 1),
(673, 'COSUMIX', NULL, 'COSUMIX', '', '', 'TABLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'NOVARTIS', '', 7.47, 9.00, '', 'VARIOUS', '', 0.00, 0, 1),
(674, 'DYNAMUTILIN', NULL, 'DYNAMUTILIN', '', '', 'TABLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'NOVARTIS', '', 7.39, 9.50, '', 'VARIOUS', '', 0.00, 0, 1),
(675, 'VIONATE', NULL, 'VIONATE', '', '', '22OGMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'NOVARTIS', '', 272.00, 312.00, '', 'CLDS', '', 0.00, 0, 1),
(676, 'ESB3', NULL, 'ESB3', '', '', '20GMS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'NOVARTIS', '', 129.00, 160.00, '', 'CLDS', '', 0.00, 0, 1),
(677, 'ROBIPENSTREP P', NULL, 'ROBIPENSTREP P', '', '', '1 DOSE', 'POULRTY SUPPLY', 'VET PRODUCTS', 'ROBICHEM', '', 21.44, 30.00, '', 'UY', '', 0.00, 0, 1),
(678, 'ROBIPENSTREP P', NULL, 'ROBIPENSTREP P', '', '', '10 DOSE', 'POULRTY SUPPLY', 'VET PRODUCTS', 'ROBICHEM', '', 66.66, 95.00, '', 'UY', '', 0.00, 0, 1),
(679, 'ROBIPENSTREP P', NULL, 'ROBIPENSTREP P', '', '', '50 D', 'POULRTY SUPPLY', 'VET PRODUCTS', 'ROBICHEM', '', 160.80, 240.00, '', 'UY', '', 0.00, 0, 1),
(680, 'ROBISTREP VK', NULL, 'ROBISTREP VK', '', '', '25 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'ROBICHEM', '', 34.66, 50.00, '', 'UY', '', 0.00, 0, 1),
(681, 'ROBISTREP VK', NULL, 'ROBISTREP VK', '', '', '110 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'ROBICHEM', '', 120.80, 150.00, '', 'UY', '', 0.00, 0, 1),
(682, 'TRIPULAC', NULL, 'TRIPULAC', '', '', '100 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'ROBICHEM', '', 106.67, 145.00, '', 'UY', '', 0.00, 0, 1),
(683, 'ROBI LA', NULL, 'ROBI LA', '', '', '10 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'ROBICHEM', '', 83.33, 112.00, '', 'UY', '', 0.00, 0, 1),
(684, 'GONADIN', NULL, 'GONADIN', '', '', '2 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'TRYCO', '', 135.00, 165.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(685, 'PROTOLYTE', NULL, 'PROTOLYTE', '', '', '250 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'TRYCO', '', 70.00, 97.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(686, 'PITOXAL', NULL, 'PITOXAL', '', '', '5 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'TRYCO', '', 79.00, 96.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(687, 'SCOUREX', NULL, 'SCOUREX', '', '', 'COBLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'TRYCO', '', 10.56, 13.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(688, 'STREP V', NULL, 'STREP V', '', '', '25 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'TRYCO', '', 33.00, 40.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(689, 'STREP V', NULL, 'STREP V', '', '', '114 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'TRYCO', '', 90.00, 120.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(690, 'STYZOL', NULL, 'STYZOL', '', '', 'TABLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'TRYCO', '', 8.10, 10.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(691, 'TYROVITE', NULL, 'TYROVITE', '', '', '25 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'TRYCO', '', 33.00, 42.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(692, 'TYROVITE', NULL, 'TYROVITE', '', '', '114 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'TRYCO', '', 99.00, 120.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(693, 'TYROX-V', NULL, 'TYROX-V', '', '', 'TABLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'TRYCO', '', 11.00, 15.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(694, 'ANIMYCIN', NULL, 'ANIMYCIN', '', '', '60 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BELMAN', '', 53.32, 59.00, '', 'BELMAN', '', 0.00, 0, 1),
(695, 'ANIMYCIN', NULL, 'ANIMYCIN', '', '', '120 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BELMAN', '', 83.42, 95.00, '', 'BELMAN', '', 0.00, 0, 1),
(696, 'CECCICAL', NULL, 'CECCICAL', '', '', '200 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BELMAN', '', 48.16, 56.00, '', 'BELMAN', '', 0.00, 0, 1),
(697, 'COCKSURE', NULL, 'COCKSURE', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BELMAN', '', 8.60, 12.00, '', 'BELMAN', '', 0.00, 0, 1),
(698, 'DCM', NULL, 'DCM', '', '', '100 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BELMAN', '', 148.78, 172.00, '', 'BELMAN', '', 0.00, 0, 1),
(699, 'DCM', NULL, 'DCM', '', '', '50 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BELMAN', '', 98.04, 115.00, '', 'BELMAN', '', 0.00, 0, 1),
(700, 'ECOLMIN', NULL, 'ECOLMIN', '', '', '20ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BELMAN', '', 98.90, 115.00, '', 'BELMAN', '', 0.00, 0, 1),
(701, 'ILUALCIN', NULL, 'ILUALCIN', '', '', '2.5 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BELMAN', '', 27.78, 38.00, '', 'BELMAN', '', 0.00, 0, 1),
(702, 'MILKGOLD', NULL, 'MILKGOLD', '', '', '1 KG.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BELMAN', '', 117.50, 140.00, '', 'BELMAN', '', 0.00, 0, 1),
(703, 'PIDRO', NULL, 'PIDRO', '', '', '2.4 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BELMAN', '', 5.16, 7.00, '', 'BELMAN', '', 0.00, 0, 1),
(704, 'PIDRO', NULL, 'PIDRO', '', '', '24 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BELMAN', '', 24.08, 30.00, '', 'BELMAN', '', 0.00, 0, 1),
(705, 'SMP', NULL, 'SMP', '', '', 'TABLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BELMAN', '', 5.23, 6.50, '', 'BELMAN', '', 0.00, 0, 1),
(706, 'TYLOFER', NULL, 'TYLOFER', '', '', '10 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BELMAN', '', 149.64, 180.00, '', 'BELMAN', '', 0.00, 0, 1),
(707, 'TYLOFER', NULL, 'TYLOFER', '', '', '20 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BELMAN', '', 219.30, 255.00, '', 'BELMAN', '', 0.00, 0, 1),
(708, 'V-22', NULL, 'V-22', '', '', '30''S', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BELMAN', '', 43.13, 59.00, '', 'BELMAN', '', 0.00, 0, 1),
(709, 'V-22', NULL, 'V-22', '', '', '100''S', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BELMAN', '', 129.00, 150.00, '', 'BELMAN', '', 0.00, 0, 1),
(710, 'V-22', NULL, 'V-22', '', '', '1000''S', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BELMAN', '', 1.00, 1.00, '', 'BELMAN', '', 0.00, 0, 1),
(711, 'V-22', NULL, 'V-22', '', '', 'RETAIL', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BELMAN', '', 1.16, 1.50, '', 'BELMAN', '', 0.00, 0, 1),
(712, 'V-22', NULL, 'V-22', '', '', '200 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BELMAN', '', 39.47, 54.00, '', 'BELMAN', '', 0.00, 0, 1),
(713, 'VETCOMBEX', NULL, 'VETCOMBEX', '', '', '10 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BELMAN', '', 79.98, 95.00, '', 'BELMAN', '', 0.00, 0, 1),
(714, 'ILUALCIN', NULL, 'ILUALCIN', '', '', '10ml', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BELMAN', '', 93.74, 110.00, '', 'BELMAN', '', 0.00, 0, 1),
(715, 'NEOTERRA', NULL, 'NEOTERRA', '', '', '20 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'PFIZER', '', 80.00, 100.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(716, 'TERRAMYCIN LA', NULL, 'TERRAMYCIN LA', '', '', '10 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'PFIZER', '', 140.00, 200.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(717, 'VALBAZEN', NULL, 'VALBAZEN', '', '', '30 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'PFIZER', '', 135.00, 198.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(718, 'TM LA', NULL, 'TM LA', '', '', '100ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'PFIZER', '', 490.00, 630.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(719, 'AGMETIN', NULL, 'AGMETIN', '', '', ' 5G ', 'POULRTY SUPPLY', 'VET PRODUCTS', ' METROVET ', '', 14.58, 22.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(720, 'ANIMASTRATH', NULL, 'ANIMASTRATH', '', '', 'CAPSULE', 'POULRTY SUPPLY', 'VET PRODUCTS', ' METROVET ', '', 6.53, 8.50, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(721, 'AQUADOX', NULL, 'AQUADOX', '', '', '4 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', ' METROVET ', '', 14.83, 20.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(722, 'AQUADOX', NULL, 'AQUADOX', '', '', '25 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', ' METROVET ', '', 58.75, 80.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(723, 'AQUADOX', NULL, 'AQUADOX', '', '', '100GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', ' METROVET ', '', 108.00, 130.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(724, 'GALLIMYCIN', NULL, 'GALLIMYCIN', '', '', '5 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', ' METROVET ', '', 16.02, 20.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(725, 'VIMVITE', NULL, 'VIMVITE', '', '', 'TABLET', 'POULRTY SUPPLY', 'VET PRODUCTS', ' METROVET ', '', 3.60, 5.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(726, 'AMBROXITIL', NULL, 'AMBROXITIL', '', '', '5 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'EXCELLENCE', '', 24.80, 31.00, '', 'EXCELLENCE', '', 0.00, 0, 1),
(727, 'AMTYL', NULL, 'AMTYL', '', '', 'TABS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'EXCELLENCE', '', 12.00, 15.00, '', 'EXCELLENCE', '', 0.00, 0, 1),
(728, 'OXYRID', NULL, 'OXYRID', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'EXCELLENCE', '', 123.75, 160.00, '', 'EXCELLENCE', '', 0.00, 0, 1),
(729, 'TRUE GRIT', NULL, 'TRUE GRIT', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'EXCELLENCE', '', 3.88, 6.00, '', 'EXCELLENCE', '', 0.00, 0, 1),
(730, 'ZERO MITE', NULL, 'ZERO MITE', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'EXCELLENCE', '', 11.21, 15.00, '', 'EXCELLENCE', '', 0.00, 0, 1),
(731, 'RID', NULL, 'RID', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'EXCELLENCE', '', 3.50, 5.00, '', 'EXCELLENCE', '', 0.00, 0, 1),
(732, 'VOLTPLEX', NULL, 'VOLTPLEX', '', '', 'TABS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'EXCELLENCE', '', 9.49, 14.00, '', 'EXCELLENCE', '', 0.00, 0, 1),
(733, 'TEPOX', NULL, 'TEPOX', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'EXCELLENCE', '', 21.25, 27.00, '', 'EXCELLENCE', '', 0.00, 0, 1),
(734, 'RELOAD', NULL, 'RELOAD', '', '', '5ml', 'POULRTY SUPPLY', 'VET PRODUCTS', 'EXCELLENCE', '', 112.50, 130.00, '', 'EXCELLENCE', '', 0.00, 0, 1),
(735, 'ASUNTOL', NULL, 'ASUNTOL', '', '', 'REPACK', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BAYER', '', 70.00, 90.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(736, 'ASUNTOL', NULL, 'ASUNTOL', '', '', '500GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BAYER', '', 3.00, 0.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(737, 'BAYTRIL', NULL, 'BAYTRIL', '', '', '20 ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BAYER', '', 342.76, 450.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(738, 'COFORTA', NULL, 'COFORTA', '', '', '20 ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BAYER', '', 242.00, 292.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(739, 'NEGUVON', NULL, 'NEGUVON', '', '', '5GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BAYER', '', 45.00, 60.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(740, 'NEGUVON', NULL, 'NEGUVON', '', '', '10 GMS.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BAYER', '', 92.71, 115.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(741, 'RINTAL', NULL, 'RINTAL', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BAYER', '', 7.81, 10.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(742, 'BAYCOX', NULL, 'BAYCOX', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'BAYER', '', 2.00, 0.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(743, 'ALFAMEC', NULL, 'ALFAMEC', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'PHYLUM', '', 595.00, 710.00, '', 'PHYLUM', '', 0.00, 0, 1),
(744, 'AMILYTE-C ', NULL, 'AMILYTE-C ', '', '', '100ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'PHYLUM', '', 190.00, 230.00, '', 'PHYLUM', '', 0.00, 0, 1),
(745, 'AMOXICILLIN', NULL, 'AMOXICILLIN', '', '', '100ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'PHYLUM', '', 521.00, 625.00, '', 'PHYLUM', '', 0.00, 0, 1),
(746, 'BICOMED', NULL, 'BICOMED', '', '', '100ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'PHYLUM', '', 268.00, 365.00, '', 'PHYLUM', '', 0.00, 0, 1),
(747, 'BIOVITALYTE', NULL, 'BIOVITALYTE', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'PHYLUM', '', 789.00, 0.00, '', 'PHYLUM', '', 0.00, 0, 1),
(748, 'ENROMED', NULL, 'ENROMED', '', '', '100ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'PHYLUM', '', 413.00, 495.00, '', 'PHYLUM', '', 0.00, 0, 1),
(749, 'FTD', NULL, 'FTD', '', '', '100ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'PHYLUM', '', 455.00, 545.00, '', 'PHYLUM', '', 0.00, 0, 1),
(750, 'GENTAMICIN', NULL, 'GENTAMICIN', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'PHYLUM', '', 384.00, 460.00, '', 'PHYLUM', '', 0.00, 0, 1),
(751, 'KANADEXCON', NULL, 'KANADEXCON', '', '', '100ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'PHYLUM', '', 351.00, 500.00, '', 'PHYLUM', '', 0.00, 0, 1),
(752, 'METAPYRONE', NULL, 'METAPYRONE', '', '', '100ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'PHYLUM', '', 198.00, 240.00, '', 'PHYLUM', '', 0.00, 0, 1),
(753, 'OXYTETRA LA', NULL, 'OXYTETRA LA', '', '', '100ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'PHYLUM', '', 306.00, 367.00, '', 'PHYLUM', '', 0.00, 0, 1),
(754, 'VIT ADE', NULL, 'VIT ADE', '', '', '100ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'PHYLUM', '', 355.00, 426.00, '', 'PHYLUM', '', 0.00, 0, 1),
(755, 'AMIMOX', NULL, 'AMIMOX', '', '', '100ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'PHYLUM', '', 504.00, 605.00, '', 'PHYLUM', '', 0.00, 0, 1),
(756, 'PHYLUMOX 20% LA', NULL, 'PHYLUMOX 20% LA', '', '', '100ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'PHYLUM', '', 541.00, 650.00, '', 'PHYLUM', '', 0.00, 0, 1),
(757, 'MULTIVITAMINS', NULL, 'MULTIVITAMINS', '', '', '100ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'PHYLUM', '', 330.00, 395.00, '', 'PHYLUM', '', 0.00, 0, 1),
(758, 'ACROVIM', NULL, 'ACROVIM', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 4.00, 6.00, '', 'CLDS', '', 0.00, 0, 1),
(759, 'AMINOPLEX', NULL, 'AMINOPLEX', '', '', '10ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 420.00, 505.00, '', 'CLDS', '', 0.00, 0, 1),
(760, 'AMINOPLEX', NULL, 'AMINOPLEX', '', '', '30ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 610.00, 725.00, '', 'CLDS', '', 0.00, 0, 1),
(761, 'AMINOPLEX ', NULL, 'AMINOPLEX ', '', '', 'CAPSULE', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 5.52, 8.00, '', 'CLDS', '', 0.00, 0, 1),
(762, 'AMOX 250', NULL, 'AMOX 250', '', '', 'CAPSULE', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 1.50, 5.00, '', 'CLDS', '', 0.00, 0, 1),
(763, 'AMOX 500', NULL, 'AMOX 500', '', '', 'CAPSULE', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 2.00, 8.00, '', 'CLDS', '', 0.00, 0, 1),
(764, 'BIOCID', NULL, 'BIOCID', '', '', '1L', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 845.00, 970.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(765, 'B-12 AAFES', NULL, 'B-12 AAFES', '', '', 'TABS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 0.40, 1.00, '', 'ARVET', '', 0.00, 0, 1),
(766, 'B-12 AAFES', NULL, 'B-12 AAFES', '', '', '100''S', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 40.00, 75.00, '', 'ARVET', '', 0.00, 0, 1),
(767, 'BIONIC FIGHTER', NULL, 'BIONIC FIGHTER', '', '', 'CAPLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 4.00, 6.00, '', 'VARIOUS', '', 0.00, 0, 1),
(768, 'C.T WILLIAM', NULL, 'C.T WILLIAM', '', '', 'CAPSULE', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 9.00, 14.00, '', 'ARVET', '', 0.00, 0, 1),
(769, 'CALCIUM', NULL, 'CALCIUM', '', '', 'TABLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 0.10, 0.50, '', 'ARVET', '', 0.00, 0, 1),
(770, 'CALCIUM', NULL, 'CALCIUM', '', '', '100''S', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 10.00, 20.00, '', 'ARVET', '', 0.00, 0, 1),
(771, 'CEFA ', NULL, 'CEFA ', '', '', 'CAPLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 3.50, 15.00, '', 'VARIOUS', '', 0.00, 0, 1),
(772, 'CENTRUM', NULL, 'CENTRUM', '', '', 'TABLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 4.20, 8.00, '', 'ARVET', '', 0.00, 0, 1),
(773, 'CENTRUM SILVER', NULL, 'CENTRUM SILVER', '', '', 'TABLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 4.74, 10.00, '', 'ARVET', '', 0.00, 0, 1),
(774, 'CHLORAM 250', NULL, 'CHLORAM 250', '', '', 'CAPSULE', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 1.60, 4.00, '', 'ARVET', '', 0.00, 0, 1),
(775, 'CHLORAM 500', NULL, 'CHLORAM 500', '', '', 'CAPSULE', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 2.00, 7.00, '', 'ARVET', '', 0.00, 0, 1),
(776, 'COD LIVER OIL', NULL, 'COD LIVER OIL', '', '', 'CAPSULE', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 0.85, 2.00, '', 'CLDS', '', 0.00, 0, 1),
(777, 'COD LIVER OIL', NULL, 'COD LIVER OIL', '', '', '100''S', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 85.00, 130.00, '', 'CLDS', '', 0.00, 0, 1),
(778, 'COMBINEX', NULL, 'COMBINEX', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 166.30, 225.00, '', 'HUNTER', '', 0.00, 0, 1),
(779, 'DEMONS DRIVER', NULL, 'DEMONS DRIVER', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 105.00, 135.00, '', 'VARIOUS', '', 0.00, 0, 1),
(780, 'DERBY PILLS', NULL, 'DERBY PILLS', '', '', 'TABLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 3.45, 5.00, '', 'VARIOUS', '', 0.00, 0, 1),
(781, 'ENROFLOXACIN 250MG', NULL, 'ENROFLOXACIN 250MG', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 4.75, 10.00, '', 'CLDS', '', 0.00, 0, 1),
(782, 'ENROFLOXACIN 500MG', NULL, 'ENROFLOXACIN 500MG', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 6.92, 14.00, '', 'CLDS', '', 0.00, 0, 1),
(783, 'IVERMECTIN', NULL, 'IVERMECTIN', '', '', 'RETAIL', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 0.07, 15.00, '', 'VETFILES', '', 0.00, 0, 1),
(784, 'IVOMEC', NULL, 'IVOMEC', '', '', '100ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 1.00, 1.00, '', 'VARIOUS', '', 0.00, 0, 1),
(785, 'IVOMEC', NULL, 'IVOMEC', '', '', 'RETAIL', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 12.00, 25.00, '', 'VARIOUS', '', 0.00, 0, 1),
(786, 'L-SPEC', NULL, 'L-SPEC', '', '', '10ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 207.00, 260.00, '', 'CLDS', '', 0.00, 0, 1),
(787, 'MOTHYL-X TABS', NULL, 'MOTHYL-X TABS', '', '', 'TABS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 1.20, 2.00, '', 'ARVET', '', 0.00, 0, 1),
(788, 'MOTHYL-X TABS', NULL, 'MOTHYL-X TABS', '', '', '50''S', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 60.00, 85.00, '', 'ARVET', '', 0.00, 0, 1),
(789, 'MULTI', NULL, 'MULTI', '', '', 'TABLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 0.10, 0.50, '', 'ARVET', '', 0.00, 0, 1),
(790, 'MULTI', NULL, 'MULTI', '', '', '100''S', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 10.00, 20.00, '', 'ARVET', '', 0.00, 0, 1),
(791, 'NUXVOMICA', NULL, 'NUXVOMICA', '', '', '7ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 135.00, 185.00, '', 'CLDS', '', 0.00, 0, 1),
(792, 'OMETOL', NULL, 'OMETOL', '', '', 'CAPSULE', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 10.60, 15.00, '', 'CLDS', '', 0.00, 0, 1),
(793, 'PHARMATON', NULL, 'PHARMATON', '', '', 'TABS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 14.00, 24.00, '', 'ARVET', '', 0.00, 0, 1),
(794, 'PHARMATON', NULL, 'PHARMATON', '', '', '100''S', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 1.00, 0.00, '', 'ARVET', '', 0.00, 0, 1),
(795, 'RED CELL', NULL, 'RED CELL', '', '', 'DROPS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 44.00, 100.00, '', 'UNAHCO', '', 0.00, 0, 1),
(796, 'RELOAD PLUS', NULL, 'RELOAD PLUS', '', '', '15ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 249.00, 300.00, '', 'EXCELLENCE', '', 0.00, 0, 1),
(797, 'RESPIGEN', NULL, 'RESPIGEN', '', '', '5ml', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 127.00, 155.00, '', 'EXCELLENCE', '', 0.00, 0, 1),
(798, 'RESPIGEN', NULL, 'RESPIGEN', '', '', '10ml', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 235.00, 285.00, '', 'EXCELLENCE', '', 0.00, 0, 1),
(799, 'RESPIGEN GEL', NULL, 'RESPIGEN GEL', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 396.00, 475.00, '', 'EXCELLENCE', '', 0.00, 0, 1),
(800, 'ROMOXTYL', NULL, 'ROMOXTYL', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 9.90, 14.00, '', 'UNAHCO', '', 0.00, 0, 1),
(801, 'SECRET WEAPON', NULL, 'SECRET WEAPON', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 180.00, 235.00, '', 'VARIOUS', '', 0.00, 0, 1),
(802, 'STRESS FORMULA', NULL, 'STRESS FORMULA', '', '', 'CAPLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 3.85, 6.50, '', 'ARVET', '', 0.00, 0, 1),
(803, 'STRESS FORMULA', NULL, 'STRESS FORMULA', '', '', '100''S', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 385.00, 520.00, '', 'ARVET', '', 0.00, 0, 1),
(804, 'SULVET OBLETS', NULL, 'SULVET OBLETS', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 20.14, 25.00, '', 'ARVET', '', 0.00, 0, 1),
(805, 'TYLAN 50', NULL, 'TYLAN 50', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 75.67, 115.00, '', 'HUNTER', '', 0.00, 0, 1),
(806, 'VIRKON ', NULL, 'VIRKON ', '', '', '1KG', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 1.00, 1.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(807, 'WORMAL', NULL, 'WORMAL', '', '', 'CAPLET', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 3.61, 6.00, '', 'ARVET', '', 0.00, 0, 1),
(808, 'THYMOL POWDER', NULL, 'THYMOL POWDER', '', '', '75GMS', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 70.00, 85.00, '', 'CLDS', '', 0.00, 0, 1),
(809, ' B-12 1000MG', NULL, ' B-12 1000MG', '', '', '10ML.', 'POULRTY SUPPLY', 'VET PRODUCTS', 'OTHERS', '', 235.00, 290.00, '', 'CLDS', '', 0.00, 0, 1),
(810, 'B1 B1 STRAIN', NULL, 'B1 B1 STRAIN', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'VACCINES', '', 120.00, 180.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(811, 'BI LASOTA', NULL, 'BI LASOTA', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'VACCINES', '', 120.00, 180.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(812, 'HOG CHOLERA', NULL, 'HOG CHOLERA', '', '', '10 DOSE', 'POULRTY SUPPLY', 'VET PRODUCTS', 'VACCINES', '', 100.00, 140.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(813, 'HOG CHOLERA', NULL, 'HOG CHOLERA', '', '', '20 DOSE', 'POULRTY SUPPLY', 'VET PRODUCTS', 'VACCINES', '', 170.00, 230.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(814, 'PIGVAX', NULL, 'PIGVAX', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'VACCINES', '', 100.00, 140.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(815, 'FOWL POX', NULL, 'FOWL POX', '', '', '', 'POULRTY SUPPLY', 'VET PRODUCTS', 'VACCINES', '', 275.00, 350.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(816, 'FOWL POX', NULL, 'FOWL POX', '', '', '100 DOSE', 'POULRTY SUPPLY', 'VET PRODUCTS', 'VACCINES', '', 314.00, 450.00, '', 'SAN ISIDRO', '', 0.00, 0, 1),
(817, 'CORYZA', NULL, 'CORYZA', '', '', '500ML', 'POULRTY SUPPLY', 'VET PRODUCTS', 'VACCINES', '', 1.00, 2.00, '', 'CLDS', '', 0.00, 0, 1),
(818, 'Coke 1L', NULL, 'Coke ', '1L', NULL, NULL, NULL, NULL, NULL, NULL, 7.00, 7.00, NULL, NULL, NULL, 10.00, NULL, 1),
(819, 'Coke 1L', NULL, 'Coke ', '1L', NULL, NULL, NULL, NULL, NULL, NULL, 7.00, 7.00, NULL, NULL, NULL, 10.00, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `outgoing`
--

CREATE TABLE IF NOT EXISTS `outgoing` (
  `outgoing_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `status` varchar(125) DEFAULT NULL,
  `date_out` date NOT NULL,
  `description` varchar(225) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
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
-- Table structure for table `outgoing_category`
--

CREATE TABLE IF NOT EXISTS `outgoing_category` (
  `outgoing_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `outgoing` varchar(125) NOT NULL,
  PRIMARY KEY (`outgoing_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `outgoing_category`
--

INSERT INTO `outgoing_category` (`outgoing_id`, `outgoing`) VALUES
(1, 'Transfer'),
(2, 'Return Product'),
(3, 'Bad Order'),
(4, 'Expenses');

-- --------------------------------------------------------

--
-- Table structure for table `out_item`
--

CREATE TABLE IF NOT EXISTS `out_item` (
  `outgoing_id` tinyint(8) NOT NULL,
  `item_code` varchar(125) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  KEY `fk_outitem_outgoing` (`outgoing_id`),
  KEY `fk_out_item` (`item_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `out_item`
--

INSERT INTO `out_item` (`outgoing_id`, `item_code`, `quantity`, `price`) VALUES
(30, '0', 1.00, 9.65),
(31, '0', 1.00, 63.75);

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE IF NOT EXISTS `payment_details` (
  `payment_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `customer_id` tinyint(8) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`payment_id`, `date`, `customer_id`, `amount_paid`, `balance`) VALUES
(1, '2013-06-08', 2, 50.00, 0.00),
(2, '2013-06-08', 1, 10.00, 0.00),
(3, '2013-06-09', 1, 0.50, 0.00),
(4, '2013-06-09', 1, 1.00, 0.00),
(5, '2013-06-12', 3, 8.95, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` tinyint(8) NOT NULL AUTO_INCREMENT,
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
  `trans_id` tinyint(8) NOT NULL AUTO_INCREMENT,
  `trans_date` date NOT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `trans_date`, `total_amount`) VALUES
(19, '2013-06-20', 188.15),
(20, '2013-06-20', 10.00),
(21, '2013-06-20', 17.00),
(22, '2013-06-21', 342.00),
(30, '2013-06-21', 10.00),
(31, '2013-06-22', 15.00),
(32, '2013-06-22', 15.00),
(33, '2013-06-22', 12.00),
(34, '2013-06-22', 12.00),
(35, '2013-06-22', 12.00),
(36, '2013-06-22', 9.00),
(37, '2013-06-22', 1.00),
(38, '2013-06-22', 12.00),
(39, '2013-06-22', 12.00),
(40, '2013-06-22', 10.00),
(41, '2013-06-22', 30.00),
(42, '2013-06-22', 30.00),
(43, '2013-06-22', 30.00),
(44, '2013-06-22', 150.00),
(45, '2013-06-22', 12.00),
(46, '2013-06-22', 12.00),
(47, '2013-06-22', 30.00),
(48, '2013-06-22', 12.00),
(49, '2013-06-22', 12.00);

-- --------------------------------------------------------

--
-- Table structure for table `trans_details`
--

CREATE TABLE IF NOT EXISTS `trans_details` (
  `trans_id` tinyint(8) NOT NULL,
  `item_code` varchar(125) NOT NULL,
  `division` varchar(125) DEFAULT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date` date DEFAULT NULL,
  KEY `fk_details_trans` (`trans_id`),
  KEY `fk_trans_item` (`item_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_details`
--

INSERT INTO `trans_details` (`trans_id`, `item_code`, `division`, `quantity`, `price`, `date`) VALUES
(19, '1', 'pet', 1.00, 9.65, '2013-06-20'),
(19, '6', 'grocery', 1.00, 43.50, '2013-06-20'),
(19, '2', 'grocery', 1.00, 63.75, '2013-06-20'),
(19, '4', 'grocery', 1.00, 26.50, '2013-06-20'),
(19, '5', 'grocery', 1.00, 29.75, '2013-06-20'),
(19, '9', 'grocery', 3.00, 15.00, '2013-06-20'),
(20, 'load', 'load', 0.00, 10.00, '2013-06-20'),
(21, 'load', 'load', 0.00, 17.00, '2013-06-20'),
(22, '7', 'grocery', 2.00, 342.00, '2013-06-21'),
(30, 'load', 'load', 0.00, 10.00, '2013-06-21'),
(31, 'load', 'load', 0.00, 15.00, '2013-06-22'),
(32, 'load', 'load', 0.00, 15.00, '2013-06-22'),
(33, 'load', 'load', 0.00, 12.00, '2013-06-22'),
(34, 'load', 'load', 0.00, 12.00, '2013-06-22'),
(35, 'load', 'load', 0.00, 12.00, '2013-06-22'),
(36, 'load', 'load', 0.00, 9.00, '2013-06-22'),
(37, 'load', 'load', 0.00, 1.00, '2013-06-22'),
(38, 'load', 'load', 0.00, 12.00, '2013-06-22'),
(39, 'load', 'load', 0.00, 12.00, '2013-06-22'),
(40, 'load', 'load', 0.00, 10.00, '2013-06-22'),
(41, 'load', 'load', 0.00, 30.00, '2013-06-22'),
(42, 'load', 'load', 0.00, 30.00, '2013-06-22'),
(43, 'load', 'load', 0.00, 30.00, '2013-06-22'),
(44, 'load', 'load', 0.00, 150.00, '2013-06-22'),
(45, 'load', 'load', 0.00, 12.00, '2013-06-22'),
(46, 'load', 'load', 0.00, 12.00, '2013-06-22'),
(47, 'load', 'load', 0.00, 30.00, '2013-06-22'),
(48, 'load', 'load', 0.00, 12.00, '2013-06-22'),
(49, 'load', 'load', 0.00, 12.00, '2013-06-22');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `credit_details`
--
ALTER TABLE `credit_details`
  ADD CONSTRAINT `credit_details_ibfk_1` FOREIGN KEY (`credit_id`) REFERENCES `credit` (`credit_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivered_item`
--
ALTER TABLE `delivered_item`
  ADD CONSTRAINT `delivered_item_ibfk_1` FOREIGN KEY (`delivery_id`) REFERENCES `delivery` (`delivery_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `out_item`
--
ALTER TABLE `out_item`
  ADD CONSTRAINT `out_item_ibfk_1` FOREIGN KEY (`outgoing_id`) REFERENCES `outgoing` (`outgoing_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trans_details`
--
ALTER TABLE `trans_details`
  ADD CONSTRAINT `trans_details_ibfk_1` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`trans_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
