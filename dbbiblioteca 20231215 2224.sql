-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema dbbiblioteca
--

CREATE DATABASE IF NOT EXISTS dbbiblioteca;
USE dbbiblioteca;

--
-- Definition of table `tbadm`
--

DROP TABLE IF EXISTS `tbadm`;
CREATE TABLE `tbadm` (
  `idadm` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idusuarios` int(10) unsigned NOT NULL,
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idadm`,`idusuarios`),
  KEY `FK_adm_usuarios` (`idusuarios`),
  CONSTRAINT `FK_adm_usuarios` FOREIGN KEY (`idusuarios`) REFERENCES `tbusuarios` (`idusuarios`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbadm`
--

/*!40000 ALTER TABLE `tbadm` DISABLE KEYS */;
INSERT INTO `tbadm` (`idadm`,`idusuarios`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (3,7,'2023-12-07 20:27:40','2023-12-15 19:45:17','A'),
 (6,14,'2023-12-15 19:54:01','2023-12-15 19:54:01','A');
/*!40000 ALTER TABLE `tbadm` ENABLE KEYS */;


--
-- Definition of table `tbdevolucoes`
--

DROP TABLE IF EXISTS `tbdevolucoes`;
CREATE TABLE `tbdevolucoes` (
  `iddevolucoes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idemprestimo` int(10) unsigned NOT NULL,
  `tempoemprestimo` varchar(15) DEFAULT NULL,
  `diasAtraso` int(11) DEFAULT NULL,
  `statusdevol` varchar(15) DEFAULT NULL,
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`iddevolucoes`,`idemprestimo`),
  KEY `FK_tbdevolucoes_tbemprestimo` (`idemprestimo`),
  CONSTRAINT `FK_tbdevolucoes_tbemprestimo` FOREIGN KEY (`idemprestimo`) REFERENCES `tbemprestimo` (`idemprestimo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbdevolucoes`
--

/*!40000 ALTER TABLE `tbdevolucoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbdevolucoes` ENABLE KEYS */;


--
-- Definition of table `tbemprestimo`
--

DROP TABLE IF EXISTS `tbemprestimo`;
CREATE TABLE `tbemprestimo` (
  `idemprestimo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idlivro` int(10) unsigned NOT NULL,
  `idusuarios` int(10) unsigned NOT NULL,
  `datadevolucao` date NOT NULL,
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idemprestimo`,`idlivro`,`idusuarios`),
  KEY `FK_tbemprestimo_tblivro` (`idlivro`),
  KEY `FK_tbemprestimo_tbusuarios` (`idusuarios`),
  CONSTRAINT `FK_tbemprestimo_tblivro` FOREIGN KEY (`idlivro`) REFERENCES `tblivro` (`idlivro`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbemprestimo_tbusuarios` FOREIGN KEY (`idusuarios`) REFERENCES `tbusuarios` (`idusuarios`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbemprestimo`
--

/*!40000 ALTER TABLE `tbemprestimo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbemprestimo` ENABLE KEYS */;


--
-- Definition of table `tblivro`
--

DROP TABLE IF EXISTS `tblivro`;
CREATE TABLE `tblivro` (
  `idlivro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idtipoLivro` int(10) unsigned NOT NULL,
  `titulo` varchar(245) NOT NULL,
  `autor` text NOT NULL,
  `datapubli` date NOT NULL,
  `descricao` longtext NOT NULL,
  `capa` varchar(90) DEFAULT NULL,
  `numpags` int(11) NOT NULL,
  `isbn` varchar(14) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idlivro`,`idtipoLivro`),
  KEY `FK_tblivro_tbtipoLivro` (`idtipoLivro`),
  CONSTRAINT `FK_tblivro_tbtipoLivro` FOREIGN KEY (`idtipoLivro`) REFERENCES `tbtipolivro` (`idtipoLivro`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblivro`
--

/*!40000 ALTER TABLE `tblivro` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblivro` ENABLE KEYS */;


--
-- Definition of table `tblog`
--

DROP TABLE IF EXISTS `tblog`;
CREATE TABLE `tblog` (
  `idlog` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulolog` varchar(45) DEFAULT NULL,
  `desclog` varchar(245) DEFAULT NULL,
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idlog`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblog`
--

/*!40000 ALTER TABLE `tblog` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblog` ENABLE KEYS */;


--
-- Definition of table `tbtipolivro`
--

DROP TABLE IF EXISTS `tbtipolivro`;
CREATE TABLE `tbtipolivro` (
  `idtipoLivro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipoLivro` varchar(45) NOT NULL,
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idtipoLivro`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbtipolivro`
--

/*!40000 ALTER TABLE `tbtipolivro` DISABLE KEYS */;
INSERT INTO `tbtipolivro` (`idtipoLivro`,`tipoLivro`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,'Livro','2023-12-04 20:13:24','2023-12-11 18:57:54','A'),
 (2,'Artigo Científico','2023-12-04 20:13:24','2023-12-11 18:57:54','A'),
 (3,'Monografia','2023-12-04 20:13:24','2023-12-11 18:57:54','A'),
 (4,'Apostila','2023-12-04 20:13:24','2023-12-11 18:57:54','A');
/*!40000 ALTER TABLE `tbtipolivro` ENABLE KEYS */;


--
-- Definition of table `tbusuarios`
--

DROP TABLE IF EXISTS `tbusuarios`;
CREATE TABLE `tbusuarios` (
  `idusuarios` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `telefone` varchar(16) DEFAULT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(245) NOT NULL,
  `pontuacao` int(11) NOT NULL DEFAULT 100,
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbusuarios`
--

/*!40000 ALTER TABLE `tbusuarios` DISABLE KEYS */;
INSERT INTO `tbusuarios` (`idusuarios`,`nome`,`telefone`,`cpf`,`email`,`senha`,`pontuacao`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (7,'Jovana','(21) 2 1212-1212','121.212.112-12','jov@gmail.com','$2y$10$O6cJj3ay4GWsUuiTMqWxNu.ypqqWWhyEuQ2gzJ4qy9bHmmAKRqX26',100,'2023-12-11 22:27:15','2023-12-11 22:27:15','A'),
 (10,'Jose Omar','(65) 9 3232-3232','117.273.672-16','joseomar@gmail.com','$2y$10$Gc7u5K6oTDn6WC6za1XZ0u94iXIr/qQDpLjLVCgRkEgVQ44jthYe.',100,'2023-12-14 19:53:26','2023-12-14 19:53:26','A'),
 (11,'Vitoria de Oliveira','(33) 9 3434-3434','121.212.121-21','vihh@gmail.com','$2y$10$pMHDz5kXPAMoybv9A4nhbuB17OLdNlC0Nnvn2xQeL6gnI3YC6YsyK',100,'2023-12-14 19:54:13','2023-12-14 19:54:13','A'),
 (12,'Kauã Juliano','(34) 8 7264-7324','122.365.135-61','juliano@gmail.com','$2y$10$Hw2BgXW7RJ.a934c8MXeAeamx5tXxqvwJc5VJPhgXbWaprzUPXVmu',100,'2023-12-14 19:54:53','2023-12-14 19:54:53','A'),
 (13,'Ana Clara','(33) 9 2635-4723','834.632.742-83','anaclara@gmail.com','$2y$10$6E04lp6640D59OiOYwylceQSPEOrupzKTutmTxKtkTQE5anSlJKGy',100,'2023-12-14 19:55:37','2023-12-14 19:55:37','A'),
 (14,'Ana Luísa','(33) 9 9923-6621','123.234.212-31','analu2023@bookadm.com','$2y$10$wfEJtqD82gkpDb4SlopEWe2.Dfr/U7FgojjAx9E38fIeWKKDvYfkm',100,'2023-12-15 19:53:18','2023-12-15 19:53:18','A'),
 (15,'Miguel','(33) 9 1221-2121','123.213.123-12','miguelis@gmail.com','$2y$10$5Ttyp8neVYYFVRriKN5IT.kQ61G1vqG/cK.x/h3B/ucC.18UCb9ga',100,'2023-12-15 20:02:11','2023-12-15 20:02:11','A');
/*!40000 ALTER TABLE `tbusuarios` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
