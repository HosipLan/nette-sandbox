-- This is default for the users table with mcrypt
-- The file contains user "admin" with password "test"

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1,	'admin',	'$2a$07$d65cb592078d4ffcd9660OA4ZdsIWc.atqmz2wWBkV8Pig2YcPAvS',	'admin');

-- 2012-07-29 23:19:10