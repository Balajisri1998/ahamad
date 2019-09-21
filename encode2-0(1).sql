-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
create database if not exists encode2.0;
use ecode2.0;
DROP TABLE IF EXISTS `core_menu_details`;
CREATE TABLE `core_menu_details` (
  `menu_id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(100) NOT NULL,
  `menu_status` enum('Y','N','D') NOT NULL DEFAULT 'Y',
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `core_menu_details` (`menu_id`, `menu_name`, `menu_status`, `created_date`, `updated_date`) VALUES
(1,	'ForeCast',	'Y',	'2019-08-20 19:45:33',	'0000-00-00 00:00:00'),
(2,	'Data',	'Y',	'2019-08-20 19:45:33',	'0000-00-00 00:00:00'),
(3,	'API',	'Y',	'2019-08-20 19:45:33',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `core_menu_mapping_details`;
CREATE TABLE `core_menu_mapping_details` (
  `menu_mapping_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `r_menu_id` int(11) unsigned NOT NULL,
  `r_user_type_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`menu_mapping_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `core_menu_mapping_details` (`menu_mapping_id`, `r_menu_id`, `r_user_type_id`, `created_date`, `updated_date`) VALUES
(1,	1,	1,	'2019-08-20 19:49:33',	'0000-00-00 00:00:00'),
(2,	1,	2,	'2019-08-20 19:49:33',	'0000-00-00 00:00:00'),
(3,	1,	3,	'2019-08-20 19:49:33',	'0000-00-00 00:00:00'),
(4,	1,	4,	'2019-08-20 19:49:33',	'0000-00-00 00:00:00'),
(5,	2,	2,	'2019-08-20 19:49:33',	'0000-00-00 00:00:00'),
(6,	2,	3,	'2019-08-20 19:49:33',	'0000-00-00 00:00:00'),
(7,	2,	4,	'2019-08-20 19:49:33',	'0000-00-00 00:00:00'),
(8,	3,	2,	'2019-08-20 19:49:33',	'0000-00-00 00:00:00'),
(9,	3,	3,	'2019-08-20 19:49:33',	'0000-00-00 00:00:00'),
(10,	3,	4,	'2019-08-20 19:49:33',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `dm_account`;
CREATE TABLE `dm_account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_employee_id` int(11) NOT NULL,
  `login_password` varchar(255) NOT NULL,
  `r_user_type_id` int(11) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `dm_account` (`account_id`, `r_employee_id`, `login_password`, `r_user_type_id`) VALUES
(1,	1,	'infi',	1),
(2,	2,	'infi',	2),
(3,	3,	'infi',	2),
(4,	4,	'infi',	2);

DROP TABLE IF EXISTS `dm_corporate`;
CREATE TABLE `dm_corporate` (
  `corporate_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for corporates',
  `corporate_name` varchar(100) NOT NULL COMMENT 'Name of the corporate',
  `admin_account_id` int(11) NOT NULL COMMENT 'account id of the administrator details given during registration',
  `created_by` int(11) NOT NULL COMMENT 'account_id of user who created the corporate',
  `status` char(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL COMMENT 'date of last updation',
  PRIMARY KEY (`corporate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='To store corporate information';

INSERT INTO `dm_corporate` (`corporate_id`, `corporate_name`, `admin_account_id`, `created_by`, `status`, `created_date`, `updated_date`) VALUES
(1,	'Lodha Developers',	1,	0,	'Y',	'2019-08-26 14:15:46',	'0000-00-00 00:00:00'),
(2,	'KLI',	2,	0,	'Y',	'2019-08-26 14:15:46',	'0000-00-00 00:00:00'),
(3,	'KGI',	3,	0,	'Y',	'2019-08-26 14:15:46',	'0000-00-00 00:00:00'),
(4,	'Kotak Mahindra Bank Limited',	4,	0,	'Y',	'2019-08-26 14:15:46',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `dm_employee`;
CREATE TABLE `dm_employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(5) NOT NULL,
  `first_name` char(25) DEFAULT NULL,
  `last_name` char(25) DEFAULT NULL,
  `email_id` varchar(50) NOT NULL,
  `mobile_no` char(12) NOT NULL,
  `login_status` char(2) NOT NULL DEFAULT 'Y',
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `dm_employee` (`employee_id`, `title`, `first_name`, `last_name`, `email_id`, `mobile_no`, `login_status`, `created_date`, `updated_date`) VALUES
(1,	'Mr',	'Bala',	'murugan',	'bala@af.in',	'9999999999',	'Y',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(2,	'Mr',	'Mohamed',	'Ahamed',	'ahamed@af.in',	'9999999999',	'Y',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(3,	'Mr',	'Balaji',	'S',	'balaji@af.in',	'9999999999',	'Y',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(4,	'Mr',	'Devesh',	'S',	'devesh@af.in',	'9999999999',	'Y',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(5,	'Ms',	'Pradiksha',	'S',	'pradiksha@af.in',	'9999999999',	'Y',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(6,	'Mr',	'Nataraj',	'S',	'nataraj@af.in',	'9999999999',	'Y',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `dm_user_type`;
CREATE TABLE `dm_user_type` (
  `user_type_id` int(2) NOT NULL AUTO_INCREMENT,
  `user_type_name` varchar(15) NOT NULL,
  `user_type` char(4) NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `dm_user_type` (`user_type_id`, `user_type_name`, `user_type`) VALUES
(1,	'Corporate Admin',	'CA'),
(2,	'Developer',	'DV'),
(3,	'Operation',	'OP'),
(4,	'Accounts',	'AC');

-- 2019-09-21 10:57:36
