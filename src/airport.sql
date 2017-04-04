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

/*!40101 SET character_set_client = @saved_cs_client */;
LOAD DATA LOCAL INFILE "/vagrant/db/csv/Indicator.csv"
INTO TABLE indicator
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"' 
LINES TERMINATED BY '\r\n'
(source);
LOAD DATA LOCAL INFILE "/vagrant/db/csv/Temperature.csv"
INTO TABLE temperature
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"' 
LINES TERMINATED BY '\r\n'
(indicator_id,temperature,datetime,location);
select * from temperature join indicator on indicator.id = indicator_id
where source = 'ardunio_inside' and datetime > '2017-01-12 15:00:00';


INSERT INTO source (source_name) VALUES ('inside concrete wired');INSERT INTO source (source_name) VALUES ('inside concrete wireless');