CREATE TABLE `userinfo` (
  `username` varchar(255) NOT NULL DEFAULT '',
  `pword` varchar(255) DEFAULT NULL,
  `admin` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
