CREATE TABLE IF NOT EXISTS `interests` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(256) NOT NULL,
`description` text NOT NULL,
'long' double NOT NULL,
'lat' double NOT NULL,
primary key (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO interests VALUES(1, 'IUT Belfort' , 'Site de Belfort', '47.6437703', '6.8406881');
INSERT INTO interests VALUES(2, 'Département R&T Montbéliard' , 'Dept R&T', '47.4947933', '6.8008053');
