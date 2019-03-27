-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2016 at 04:49 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Hili Truck_accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `backup_entries`
--

CREATE TABLE IF NOT EXISTS `backup_entries` (
  `id` bigint(18) NOT NULL,
  `tag_id` bigint(18) DEFAULT NULL,
  `entrytype_id` bigint(18) NOT NULL,
  `number` bigint(18) DEFAULT NULL,
  `date` datetime NOT NULL,
  `dr_total` decimal(25,2) NOT NULL DEFAULT '0.00',
  `cr_total` decimal(25,2) NOT NULL DEFAULT '0.00',
  `narration` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `paymentmode` int(11) NOT NULL,
  `bank` varchar(280) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cheque` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` varchar(230) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_by` varchar(230) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- --------------------------------------------------------

--
-- Table structure for table `backup_entryitems`
--

CREATE TABLE IF NOT EXISTS `backup_entryitems` (
  `id` bigint(18) NOT NULL,
  `entry_id` bigint(18) NOT NULL,
  `ledger_id` bigint(18) NOT NULL,
  `amount` decimal(25,2) NOT NULL DEFAULT '0.00',
  `dc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `reconciliation_date` date DEFAULT NULL,
  `created_by` varchar(230) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_by` varchar(230) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE IF NOT EXISTS `entries` (
  `id` bigint(18) NOT NULL,
  `tag_id` bigint(18) DEFAULT NULL,
  `entrytype_id` bigint(18) NOT NULL,
  `number` bigint(18) DEFAULT NULL,
  `date` datetime NOT NULL,
  `dr_total` decimal(25,2) NOT NULL DEFAULT '0.00',
  `cr_total` decimal(25,2) NOT NULL DEFAULT '0.00',
  `narration` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `paymentmode` int(11) NOT NULL,
  `bank` varchar(280) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cheque` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` varchar(230) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `entries`
--


--
-- Triggers `entries`
--
DELIMITER $$
CREATE TRIGGER `bfins_entries` BEFORE INSERT ON `entries`
 FOR EACH ROW BEGIN
	IF (NEW.dr_total < 0.0) THEN
		SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'dr_total cannot be less than 0.00.';
	END IF;
	IF (NEW.cr_total < 0.0) THEN
		SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'cr_total cannot be less than 0.00.';
	END IF;
	IF !(NEW.dr_total <=> NEW.cr_total) THEN
		SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'dr_total is not equal to cr_total.';
	END IF;

	SELECT fy_start, fy_end FROM `settings` WHERE id = 1 INTO @fy_start, @fy_end;
	IF (NEW.date < @fy_start) THEN
		SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'date before fy_start.';
	END IF;
	IF (NEW.date > @fy_end) THEN
		SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'date after fy_end.';
	END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bfup_entries` BEFORE UPDATE ON `entries`
 FOR EACH ROW BEGIN
	DECLARE dr_total decimal(25,2);
	DECLARE cr_total decimal(25,2);

	IF (NEW.dr_total IS NOT NULL) THEN
		SET dr_total = NEW.dr_total;
	ELSE
		SET dr_total = OLD.dr_total;
	END IF;
	IF (NEW.cr_total IS NOT NULL) THEN
		SET cr_total = NEW.cr_total;
	ELSE
		SET cr_total = OLD.cr_total;
	END IF;

	IF (dr_total < 0.0) THEN
		SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'dr_total cannot be less than 0.00.';
	END IF;
	IF (cr_total < 0.0) THEN
		SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'cr_total cannot be less than 0.00.';
	END IF;
	IF !(dr_total <=> cr_total) THEN
		SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'dr_total is not equal to cr_total.';
	END IF;

	IF (NEW.date IS NOT NULL) THEN
		SELECT fy_start, fy_end FROM `settings` WHERE id = 1 INTO @fy_start, @fy_end;
		IF (NEW.date < @fy_start) THEN
			SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'date before fy_start.';
		END IF;
		IF (NEW.date > @fy_end) THEN
			SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'date after fy_end.';
		END IF;
	END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `entryitems`
--

CREATE TABLE IF NOT EXISTS `entryitems` (
  `id` bigint(18) NOT NULL,
  `entry_id` bigint(18) NOT NULL,
  `ledger_id` bigint(18) NOT NULL,
  `amount` decimal(25,2) NOT NULL DEFAULT '0.00',
  `dc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `reconciliation_date` date DEFAULT NULL,
  `created_by` varchar(230) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `entryitems`
--

--
-- Triggers `entryitems`
--
DELIMITER $$
CREATE TRIGGER `bfins_entryitems` BEFORE INSERT ON `entryitems`
 FOR EACH ROW BEGIN
	SET NEW.dc = UPPER(NEW.dc);
	IF !(NEW.dc <=> 'D' OR NEW.dc <=> 'C') THEN
		SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'dc restricted to char D or C.';
	END IF;
	IF (NEW.amount < 0.0) THEN
		SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'amount cannot be less than 0.00.';
	END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bfup_entryitems` BEFORE UPDATE ON `entryitems`
 FOR EACH ROW BEGIN
	IF (NEW.dc IS NOT NULL) THEN
		SET NEW.dc = UPPER(NEW.dc);
		IF !(NEW.dc <=> 'D' OR NEW.dc <=> 'C') THEN
			SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'dc restricted to char D or C.';
		END IF;
	END IF;
	IF (NEW.amount IS NOT NULL) THEN
		IF (NEW.amount < 0.0) THEN
			SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'amount cannot be less than 0.00.';
		END IF;
	END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `entrytypes`
--

CREATE TABLE IF NOT EXISTS `entrytypes` (
  `id` bigint(18) NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `base_type` int(2) NOT NULL DEFAULT '0',
  `numbering` int(2) NOT NULL DEFAULT '1',
  `prefix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zero_padding` int(2) NOT NULL DEFAULT '0',
  `restriction_bankcash` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `entrytypes`
--

INSERT INTO `entrytypes` (`id`, `label`, `name`, `description`, `base_type`, `numbering`, `prefix`, `suffix`, `zero_padding`, `restriction_bankcash`) VALUES
(1, 'receipt', 'Receipt', 'Received in Bank account or Cash account', 1, 1, '', '', 0, 2),
(2, 'payment', 'Payment', 'Payment made from Bank account or Cash account', 1, 1, '', '', 0, 3),
(3, 'contra', 'Contra', 'Transfer between Bank account and Cash account', 1, 1, '', '', 0, 4),
(4, 'journal', 'Journal', 'Transfer between Non Bank account and Cash account', 1, 1, '', '', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` bigint(18) NOT NULL,
  `parent_id` bigint(18) DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `affects_gross` int(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `parent_id`, `name`, `affects_gross`) VALUES
(1, NULL, 'Assets', 0),
(2, NULL, 'Liabilities and Owners Equity', 0),
(3, NULL, 'Incomes', 0),
(4, NULL, 'Expenses', 0),
(5, 1, 'Fixed Assets', 0),
(6, 1, 'Current Assets', 0),
(7, 1, 'Investments', 0),
(8, 2, 'Capital Account', 0),
(9, 2, 'Current Liabilities', 0),
(10, 2, 'Loans (Liabilities)', 0),
(11, 3, 'Direct Incomes', 1),
(12, 4, 'Direct Expenses', 1),
(13, 3, 'Indirect Incomes', 0),
(14, 4, 'Indirect Expenses', 0),
(15, 3, 'Sales', 1),
(16, 4, 'Purchases', 1),
(17, 4, 'Administrative Expenses', 1),
(18, 4, 'Marketing Expenses', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ledgers`
--


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

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` bigint(18) NOT NULL,
  `date` datetime NOT NULL,
  `level` int(1) NOT NULL,
  `host_ip` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentmode`
--

CREATE TABLE IF NOT EXISTS `paymentmode` (
  `id` int(11) NOT NULL,
  `paymentname` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paymentmode`
--

INSERT INTO `paymentmode` (`id`, `paymentname`) VALUES
(1, 'cash'),
(2, 'cheque'),
(3, 'PO'),
(4, 'DD'),
(5, 'Bikash');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(1) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fy_start` date NOT NULL,
  `fy_end` date NOT NULL,
  `currency_symbol` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_format` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timezone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manage_inventory` int(1) NOT NULL DEFAULT '0',
  `account_locked` int(1) NOT NULL DEFAULT '0',
  `email_use_default` int(1) NOT NULL DEFAULT '0',
  `email_protocol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email_host` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_port` int(5) NOT NULL,
  `email_tls` int(1) NOT NULL DEFAULT '0',
  `email_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `print_paper_height` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_paper_width` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_top` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_bottom` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_left` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_right` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_orientation` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `print_page_format` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `database_version` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `address`, `email`, `fy_start`, `fy_end`, `currency_symbol`, `date_format`, `timezone`, `manage_inventory`, `account_locked`, `email_use_default`, `email_protocol`, `email_host`, `email_port`, `email_tls`, `email_username`, `email_password`, `email_from`, `print_paper_height`, `print_paper_width`, `print_margin_top`, `print_margin_bottom`, `print_margin_left`, `print_margin_right`, `print_orientation`, `print_page_format`, `database_version`) VALUES
(1, 'jamil and co', 'mirpur', 'abmjamil21@gmail.com', '2014-12-02', '2020-01-06', '', 'd-M-Y|dd-M-yy', 'UTC', 0, 0, 1, 'Smtp', '', 0, 0, '', '', '', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', 'P', 'H', 5);

--
-- Triggers `settings`
--
DELIMITER $$
CREATE TRIGGER `bfins_settings` BEFORE INSERT ON `settings`
 FOR EACH ROW BEGIN
	SET NEW.id = 1;

	IF EXISTS (SELECT id FROM `entries` WHERE date < NEW.fy_start) THEN
		SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'entries present before fy_start.';
	END IF;

	IF EXISTS (SELECT id FROM `entries` WHERE date > NEW.fy_end) THEN
		SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'entries present after fy_end.';
	END IF;

	IF (NEW.fy_start >= NEW.fy_end) THEN
		SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'fy_start cannot be after fy_end.';
	END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bfup_settings` BEFORE UPDATE ON `settings`
 FOR EACH ROW BEGIN
	DECLARE fy_start date;
	DECLARE fy_end date;

	SET NEW.id = 1;

	IF (NEW.fy_start IS NULL) THEN
		SET fy_start = OLD.fy_start;
	ELSE
		SET fy_start = NEW.fy_start;
	END IF;

	IF (NEW.fy_end IS NULL) THEN
		SET fy_end = OLD.fy_end;
	ELSE
		SET fy_end = NEW.fy_end;
	END IF;

	IF EXISTS (SELECT id FROM `entries` WHERE date < fy_start) THEN
		SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'entries present before fy_start.';
	END IF;

	IF EXISTS (SELECT id FROM `entries` WHERE date > fy_end) THEN
		SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'entries present after fy_end.';
	END IF;

	IF (fy_start >= fy_end) THEN
		SIGNAL SQLSTATE '12345' SET MESSAGE_TEXT = 'fy_start cannot be after fy_end.';
	END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint(18) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `background` char(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tempentryitems`
--

CREATE TABLE IF NOT EXISTS `tempentryitems` (
  `id` bigint(18) NOT NULL,
  `entry_id` bigint(18) DEFAULT NULL,
  `ledger_id` bigint(18) NOT NULL,
  `amount` decimal(25,2) NOT NULL DEFAULT '0.00',
  `dc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `reconciliation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `typename`
--

CREATE TABLE IF NOT EXISTS `typename` (
  `typeid` int(11) NOT NULL,
  `typename` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `typename`
--

INSERT INTO `typename` (`typeid`, `typename`) VALUES
(0, 'super admin'),
(1, 'admin'),
(0, 'super admin'),
(1, 'admin'),
(2, 'accounts user'),
(3, 'General user');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE IF NOT EXISTS `usertable` (
  `userid` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `userpass` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `usertype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`userid`, `userpass`, `usertype`) VALUES
('admin', 'admin', 1),
('admin', 'admin', 1),
('user', 'user', 3),
('accounts_user', 'accounts', 2),
('super_admin', 'super123$%', 0),
('user', '1234', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_id` (`id`), ADD KEY `id` (`id`), ADD KEY `tag_id` (`tag_id`), ADD KEY `entrytype_id` (`entrytype_id`);

--
-- Indexes for table `entryitems`
--
ALTER TABLE `entryitems`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_id` (`id`), ADD KEY `id` (`id`), ADD KEY `entry_id` (`entry_id`), ADD KEY `ledger_id` (`ledger_id`);

--
-- Indexes for table `entrytypes`
--
ALTER TABLE `entrytypes`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_id` (`id`), ADD UNIQUE KEY `label` (`label`), ADD KEY `id` (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_id` (`id`), ADD UNIQUE KEY `name` (`name`), ADD KEY `id` (`id`), ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `ledgers`
--
ALTER TABLE `ledgers`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_id` (`id`), ADD UNIQUE KEY `name` (`name`), ADD KEY `id` (`id`), ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_id` (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_id` (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_id` (`id`), ADD UNIQUE KEY `title` (`title`), ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entries`
--
ALTER TABLE `entries`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `entryitems`
--
ALTER TABLE `entryitems`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `entrytypes`
--
ALTER TABLE `entrytypes`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `ledgers`
--
ALTER TABLE `ledgers`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `entries`
--
ALTER TABLE `entries`
ADD CONSTRAINT `entries_fk_check_entrytype_id` FOREIGN KEY (`entrytype_id`) REFERENCES `entrytypes` (`id`),
ADD CONSTRAINT `entries_fk_check_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
ADD CONSTRAINT `groups_fk_check_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `groups` (`id`);

--
-- Constraints for table `ledgers`
--
ALTER TABLE `ledgers`
ADD CONSTRAINT `ledgers_fk_check_group_id` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
