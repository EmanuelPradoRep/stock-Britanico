# HeidiSQL Dump 
#
# --------------------------------------------------------
# Host:                         localhost
# Database:                     stock
# Server version:               5.7.14
# Server OS:                    Win64
# Target compatibility:         HeidiSQL w/ MySQL Server 4.0
# Target max_allowed_packet:    16777216
# HeidiSQL version:             4.0
# Date/time:                    2020-08-16 16:26:27
# --------------------------------------------------------

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;*/


#
# Database structure for database 'stock'
#

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `stock` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `stock`;


#
# Table structure for table 'articulos'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `articulos` (
  `id_articulo` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `articulo` varchar(300) DEFAULT NULL,
  `cantidad` int(4) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_articulo`)
) TYPE=InnoDB;



#
# Dumping data for table 'articulos'
#

# No data found.



#
# Table structure for table 'pedido'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `pedido` (
  `id_pedido` int(5) NOT NULL AUTO_INCREMENT,
  `pedido` varchar(150) DEFAULT NULL,
  `comentario` varchar(50) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `usuario` varchar(10) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `rfecha_hora` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pedido`)
) TYPE=InnoDB AUTO_INCREMENT=28;



#
# Dumping data for table 'pedido'
#

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS;*/
REPLACE INTO `pedido` (`id_pedido`, `pedido`, `comentario`, `estado`, `usuario`, `fecha_hora`, `rfecha_hora`) VALUES
	(1,' Lenovo -M70Z | IBM | 3 | ','','confirmado','eprado','2020-03-17 23:34:29','2020-03-18 02:43:53'),
	(2,' AOC VGA | CEIPRIN | 4 | ','Probando','confirmado','eprado','2020-03-17 23:37:31','2020-03-18 21:33:24'),
	(3,' Lenovo -M70Z | IDS | 6 | ','Vienen con Hdmi','confirmado','eprado','2020-03-18 00:28:25','2020-03-18 02:48:06'),
	(4,'Lenovo - M710S | OFFICE 2000 | 5 | Brother 2320 | OFFICE 2000 | 5 | ','Impresoras para cosnultorios','confirmado','eprado','2020-03-18 00:29:24','2020-03-18 02:42:32'),
	(5,'Lenovo - M70 | OFFICE 2000 | 3 | ','pronbando','confirmado','eprado','2020-03-18 02:24:33','2020-03-18 02:44:09'),
	(6,' AOC VGA | ACSSA | 4 | ','asd','confirmado','eprado','2020-03-18 02:30:43','2020-03-18 03:09:03'),
	(7,' Lenovo -M720S | IDS | 5 | ','Va a cafeteria','confirmado','eprado','2020-03-18 03:08:19','2020-03-18 23:19:52'),
	(8,' Lenovo -M720S | OFFICE 2000 | 4 | ','Para Laboratorio pidio Arsine','confirmado','eprado','2020-03-18 23:20:57','2020-03-19 00:11:15'),
	(9,' AOC VGA+HDMI | PALSER | 2 | ','Respaldo','confirmado','eprado','2020-03-18 23:50:19','2020-03-18 23:51:21'),
	(10,' Brother 2360 | OFFICE 2000 | 1 |  AOC VGA+HDMI | PALSER | 4 | Lenovo - M70 | OFFICE 2000 | 4 | ','','confirmado','eprado','2020-03-19 00:10:47','2020-03-19 19:17:13'),
	(11,'Brother 2320 | CONATEL | 4 |  AOC VGA+HDMI | CONATEL | 3 | ','','confirmado','eprado','2020-03-19 00:25:01','2020-03-19 15:49:00'),
	(12,'','','confirmado','eprado','2020-03-19 15:47:16','2020-03-19 17:41:43'),
	(13,'','','confirmado','eprado','2020-03-19 17:40:27','2020-03-19 17:42:05'),
	(14,'Zebra H100 | CONATEL | 3 | ','edddddd','confirmado','eprado','2020-03-19 17:41:07','2020-04-02 00:52:07'),
	(15,' Brother 2360 | CONATEL | 3 | ','hola','confirmado','eprado','2020-03-20 01:59:09','2020-04-14 21:02:05'),
	(16,' Brother 2360 | ACSSA | 3 | ','33333','confirmado','eprado','2020-03-20 02:00:25','2020-03-20 02:01:32'),
	(17,'Lenovo - M700 | CONATEL | 4 | ','e','confirmado','eprado','2020-03-20 02:00:59','2020-03-21 16:27:21'),
	(18,'Lenovo - M720Q | CONATEL | 3 | ','','pendiente','eprado','2020-03-21 16:49:51',NULL),
	(19,'','sdf','pendiente','eprado','2020-03-21 16:55:11',NULL),
	(20,' Zebra GK420  | elegir | ff | ','wwwwwwwww','pendiente','eprado','2020-03-21 16:56:05',NULL),
	(21,' Lenovo -M70Z | CONATEL | 5 |  Zebra GK420  | CONATEL | 5 | ','','pendiente','eprado','2020-04-02 00:15:56',NULL),
	(22,' Lenovo -M720S | CEIPRIN | 8 | Lenovo - M73 | CONATEL | 5 | 8019 - Red color Negro | CONATEL | 7 | ','nair','pendiente','eprado','2020-04-14 14:12:08',NULL),
	(23,' Lenovo -M720S | OFFICE 2000 | 4 |  Brother 2360 | OFFICE 2000 | 4 | 9219 - Biyonet color Negro | CEIPRIN | 5 | ','Los pc van para Miguelina','pendiente','eprado','2020-04-14 20:58:50',NULL),
	(24,' Lenovo -M720S | CEIPRIN | 5 | ','RTRT','pendiente','eprado','2020-04-27 14:19:47',NULL),
	(25,'','','confirmado','eprado','2020-04-27 14:26:00','2020-05-05 03:09:20'),
	(26,'Brother 2320 | ACSSA | 6 |  Zebra GK420  | CEIPRIN | 6 | ','','pendiente','eprado','2020-05-09 17:30:56',NULL),
	(27,'Lenovo - M73 | OFFICE 2000 | 5 |  Brother 2360 | OFFICE 2000 | 10 | ','Probando','pendiente','eprado','2020-08-15 02:56:38',NULL);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS;*/
UNLOCK TABLES;


#
# Table structure for table 'usuarios'
#

CREATE TABLE /*!32312 IF NOT EXISTS*/ `usuarios` (
  `id_usuario` varchar(10) NOT NULL,
  `usuario` varchar(10) DEFAULT NULL,
  `pass` varchar(15) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `rol` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) TYPE=InnoDB;



#
# Dumping data for table 'usuarios'
#

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS;*/
REPLACE INTO `usuarios` (`id_usuario`, `usuario`, `pass`, `fecha_hora`, `rol`) VALUES
	('1','eprado','1234','2020-03-18 00:11:07','Supervisor');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS;*/
UNLOCK TABLES;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;*/
