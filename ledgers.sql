-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2016 at 05:21 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Hili Truck_accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `ledgers`
--

CREATE TABLE IF NOT EXISTS `ledgers` (
  `id` bigint(18) NOT NULL,
  `group_id` bigint(18) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `op_balance` decimal(25,2) NOT NULL DEFAULT '0.00',
  `op_balance_dc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(2) NOT NULL DEFAULT '0',
  `reconciliation` int(1) NOT NULL DEFAULT '0',
  `notes` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ledgers`
--

INSERT INTO `ledgers` (`id`, `group_id`, `name`, `op_balance`, `op_balance_dc`, `type`, `reconciliation`, `notes`) VALUES
(3, 16, 'BRP Printing works Dhaka', '0.00', 'D', 0, 0, 'test'),
(5, 1, 'Cash in hand', '0.00', 'D', 0, 0, 'test'),
(6, 6, 'Sonali Bank Limited, Netaiganj Branch (A/C-1408-7), Narayanganj', '0.00', 'D', 0, 0, 'test'),
(7, 14, 'Direct Labor', '0.00', 'D', 0, 0, 'This head is being  create for manufacturing labor which is directly use in production.'),
(8, 16, 'Rangdhanu Trading', '0.00', 'D', 0, 0, 'Inner poly & PVC gumtape'),
(9, 16, 'Super Thai Plastic', '0.00', 'D', 0, 0, 'Poly packet & Master carton suppliers'),
(10, 16, 'Dulu & Dulal Co.', '605415.00', 'D', 0, 0, 'Diesel Suppliers'),
(11, 17, 'Modu Soudagor Arot, Netaiganj', '5227320.00', 'D', 0, 0, 'Polythene Crude Salt Suppliers'),
(12, 16, 'Megna Salt Supply, Netaiganj', '393652.00', 'D', 0, 0, 'Polythene Salt ,crude salt suppliers'),
(13, 16, 'Sukumar Chandra Dey, Moheshkhali', '0.00', 'D', 0, 0, 'Polythe Salt , Black Salt, Crude Salt suppliers'),
(14, 4, 'Office General Expense', '0.00', 'D', 0, 0, 'All kinds of expenses related to office are included in this ledger.'),
(15, 4, 'Project Khat', '0.00', 'D', 0, 0, 'All kinds of expenses related to Sayedpur Manufacturing Salt  plant new project expenses.'),
(17, 17, 'Travelling & Conveyance', '0.00', 'D', 0, 0, ''),
(18, 17, 'Entertainment', '0.00', 'D', 0, 0, ''),
(19, 4, 'Transportation', '0.00', 'D', 0, 0, ''),
(20, 4, 'Selling Expense', '0.00', 'D', 0, 0, ''),
(21, 20, 'City Bank Ltd. (A/c- 1102222295001), Nitaiganj Branch, Narayanganj.', '0.00', 'D', 0, 0, ''),
(23, 6, 'National Bank Ltd. (A/C-33000055), Netaiganj Branch, Narayangonj.', '0.00', 'D', 0, 0, ''),
(24, 1, 'Prepaid Expense', '0.00', 'D', 0, 0, 'All kinds of Advance expense include here'),
(25, 6, 'Accounts Receivable', '0.00', 'D', 0, 0, 'Sales to customer but not paid such amount treated as this.'),
(27, 17, 'Festival Bonus', '0.00', 'D', 0, 0, ''),
(29, 17, 'Various Commission, Fees & Taxes', '0.00', 'D', 0, 0, 'All kinds of Commission (Bank, DD, TT, PO,Taxes, Fees & Renewals) etc.'),
(30, 4, 'Legal & Professional services', '0.00', 'D', 0, 0, 'Legal & Professional services are occupations in the tertiary sector of the economy. Legal & Professional Services  can include tax advice, supporting a company with accounting, IT services or providing management advice,etc.'),
(31, 4, 'Insurance', '0.00', 'D', 0, 0, ''),
(32, 17, 'Stationery, Accessories & Supplies', '0.00', 'D', 0, 0, ''),
(33, 18, 'Advertisement & Publicity', '0.00', 'D', 0, 0, 'All types of  Advertisement &  Publicity Expenses are included here. Like as Newspaper Ad, Radio, TV, Electronic and Print Media Ad, etc.'),
(34, 18, 'Trade Mark', '0.00', 'D', 0, 0, ''),
(35, 18, 'Calender', '0.00', 'D', 0, 0, 'Annual Calender purpose Expense, Both Bangla & English calender.'),
(36, 18, 'Gift / Sales Promotion', '0.00', 'D', 0, 0, ''),
(37, 18, 'Presentation', '0.00', 'D', 0, 0, ''),
(38, 1, 'Cash in Bank', '0.00', 'D', 0, 0, 'to maintain bank account'),
(39, 3, 'Direct sales', '0.00', 'C', 1, 0, 'To keep income'),
(40, 22, 'Scrap sales ledger', '0.00', 'C', 1, 0, 'For income generation'),
(44, 17, 'Vehicle Fuel (Gari khat)', '0.00', 'D', 0, 0, 'Vehicle related expense'),
(45, 17, 'Troller', '0.00', 'D', 0, 0, ''),
(46, 17, 'Vehicle Repair & Maintenance', '0.00', 'D', 0, 0, ''),
(47, 17, 'Vehicle Registration & Others', '0.00', 'D', 0, 0, ''),
(48, 17, 'Car fare', '0.00', 'D', 0, 0, ''),
(49, 17, 'Iodine Car fare', '0.00', 'D', 0, 0, ''),
(50, 17, 'Boat fare', '0.00', 'D', 0, 0, ''),
(51, 21, 'Mobile Bill', '0.00', 'D', 0, 0, ''),
(52, 21, 'Internet', '0.00', 'D', 0, 0, ''),
(53, 21, 'Currier / Postal charge', '0.00', 'D', 0, 0, ''),
(54, 21, 'Telephone Bill', '0.00', 'D', 0, 0, ''),
(56, 17, 'General Printing & Stationery', '0.00', 'D', 0, 0, ''),
(57, 17, 'Computer Accessories', '0.00', 'D', 0, 0, ''),
(58, 17, 'Supplies', '0.00', 'D', 0, 0, ''),
(59, 16, 'Empty bag purchase', '0.00', 'D', 0, 0, ''),
(60, 16, 'Iodine Khate', '0.00', 'D', 0, 0, 'Iodine salt purchase purpose expense'),
(61, 16, 'Sutli & Tikrui Khat', '0.00', 'D', 0, 0, ''),
(63, 4, 'Diesel Khat', '0.00', 'D', 0, 0, ''),
(64, 4, 'Generator Khat', '0.00', 'D', 0, 0, 'Generator expanse purpose'),
(65, 12, 'Manufacturing  Cost', '0.00', 'D', 0, 0, 'To maintain manufacturing expense account'),
(66, 4, 'Safety, Security & Hygiene', '0.00', 'D', 0, 0, 'To maintain expense record for safety, security & hygiene  accounts.'),
(67, 17, 'Repair & Maintenance', '0.00', 'D', 0, 0, 'Repair & Maintenance  expense account'),
(68, 6, 'Dutch Bangla Bank Ltd. (A/C: 124 -120-4785), Netaiganj Branch, Narayangonj.', '182762.00', 'D', 0, 0, ''),
(69, 16, 'Modina Traders,Netaiganj', '0.00', 'C', 1, 0, 'Polythene Salt /Black Salt Suppliers.'),
(70, 16, 'Naf Enterprise,Dhaka', '0.00', 'C', 1, 0, 'Polythene Salt/ Black Salt Suppliers.'),
(71, 20, 'Accounts Payable', '0.00', 'C', 1, 0, 'All kinds of  credit purchase against amount.'),
(72, 5, 'Buildings -(Hili Truck Tower)', '8392746.00', 'D', 0, 0, 'This is a property of our Hili Truck Mailk Group. So that the expenses related to the Hili Truck Tower now treat as Fixed Assets>Buildings -(Hili Truck Tower). as debit account of Balance sheet.'),
(73, 4, 'Utility Expense', '0.00', 'D', 0, 0, 'All kinds of  Gas, Electric, Dish bill include this account.'),
(74, 4, 'Donation', '0.00', 'D', 0, 0, 'In this head such include  Charitable, Welfare donation,  CSR  etc.'),
(75, 1, '4492-901-000012', '0.00', 'D', 0, 0, 'bank account'),
(76, 1, 'C/C-003790200-148-4\r\n', '0.00', 'D', 0, 0, 'bank account'),
(77, 1, '3979-2\r\n', '0.00', 'D', 0, 0, 'bank account'),
(78, 1, '003790103494-0\r\n', '0.00', 'D', 0, 0, 'bank account'),
(79, 1, '0037364000309\r\n', '0.00', 'D', 0, 0, 'bank account'),
(80, 1, '003790102328-0\r\n', '0.00', 'D', 0, 0, 'bank account'),
(81, 1, '0003001039704\r\n', '0.00', 'D', 0, 0, 'bank account'),
(82, 1, '124-120-000-4785\r\n', '0.00', 'D', 0, 0, 'bank account'),
(83, 1, '36150010-1408-7\r\n', '0.00', 'D', 0, 0, 'bank account'),
(84, 1, '0200000626951\r\n', '0.00', 'D', 0, 0, 'bank account'),
(85, 1, '012833000055\r\n', '0.00', 'D', 0, 0, 'bank account'),
(86, 1, '069-0181000169\r\n', '0.00', 'D', 0, 0, 'bank account'),
(87, 1, '1102221295001\r\n', '0.00', 'D', 0, 0, 'bank account'),
(88, 1, '20501080100-1208-07\r\n', '0.00', 'D', 0, 0, 'bank account'),
(89, 1, '20501080100-2299-18\r\n', '0.00', 'D', 0, 0, 'bank account'),
(90, 1, '01024227\r\n', '0.00', 'D', 0, 0, 'bank account'),
(91, 1, '20503400100-0002-15\r\n', '0.00', 'D', 0, 0, 'bank account'),
(92, 1, '3519\r\n', '0.00', 'D', 0, 0, 'bank account'),
(93, 1, '3917\r\n', '0.00', 'D', 0, 0, 'bank account'),
(94, 1, '3918\r\n', '0.00', 'D', 0, 0, 'bank account');

--
-- Triggers `ledgers`
--
DELIMITER $$
CREATE TRIGGER `bfins_ledgers` BEFORE INSERT ON `ledgers`
 FOR EACH ROW BEGIN
	SET NEW.op_balance_dc = UPPER(NEW.op_balance_dc);
	IF !(NEW.op_balance_dc <=> 'D' OR NEW.op_balance_dc <=> 'C') THEN
		SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'op_balance_dc restricted to char D or C.';
	END IF;
	IF (NEW.op_balance < 0.0) THEN
		SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'op_balance cannot be less than 0.00.';
	END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bfup_ledgers` BEFORE UPDATE ON `ledgers`
 FOR EACH ROW BEGIN
	IF (NEW.op_balance_dc IS NOT NULL) THEN
		SET NEW.op_balance_dc = UPPER(NEW.op_balance_dc);
		IF !(NEW.op_balance_dc <=> 'D' OR NEW.op_balance_dc <=> 'C') THEN
			SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'op_balance_dc restricted to char D or C.';
		END IF;
	END IF;

	IF (NEW.op_balance IS NOT NULL) THEN
		IF (NEW.op_balance < 0.0) THEN
			SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'op_balance cannot be less than 0.00.';
		END IF;
	END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ledgers`
--
ALTER TABLE `ledgers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `id` (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ledgers`
--
ALTER TABLE `ledgers`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=95;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ledgers`
--
ALTER TABLE `ledgers`
  ADD CONSTRAINT `ledgers_fk_check_group_id` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
