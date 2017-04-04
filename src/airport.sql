create database airport;

use airport;

DROP TABLE IF EXISTS `temperature`;
CREATE TABLE `temperature` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `source_id` enum('1','2','3','4') NOT NULL,
  `location_id` int NOT NULL,
  `temperature` double NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `source`;
CREATE TABLE `source` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `source_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

select temperature,datetime,source_name,location_name from location join
(select temperature,datetime,source_name,location_id from temperature join source on temperature.source_id = source.id
where datetime >= "2017-02-04" and datetime < "2017-02-05" and source_id = 3) 
as tmp on tmp.location_id = location.id;