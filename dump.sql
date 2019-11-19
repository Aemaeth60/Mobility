CREATE TABLE IF NOT EXISTS `interests` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(256) NOT NULL,
`description` text NOT NULL,
`long` double NOT NULL,
`lat` double NOT NULL,
primary key (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO interests VALUES(1, 'IUT Belfort' , 'Site de Belfort', '47.6437703', '6.8406881');
INSERT INTO interests VALUES(2, 'Département R&T Montbéliard' , 'Dept R&T', '47.4947933', '6.8008053');
INSERT INTO interests VALUES(3, 'One shot Belfort' , 'Bar gaming', '47.6328266', '6.8526153');
INSERT INTO interests VALUES(4, 'Etang des forges' , 'Etang loisirs', '47.6533531', '6.8682686');
INSERT INTO interests VALUES(5, 'UTBM Belfort' , 'Ecole ingenieurs', '47.6328827', '6.8197846');
INSERT INTO interests VALUES(6, 'Cinéma des quais' , 'Cinéma Belfort', '47.6301517', '6.8599163');
