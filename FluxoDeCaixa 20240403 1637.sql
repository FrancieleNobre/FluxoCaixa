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
-- Create schema inciopython
--

CREATE DATABASE IF NOT EXISTS inciopython;
USE inciopython;

--
-- Definition of table `adm`
--

DROP TABLE IF EXISTS `adm`;
CREATE TABLE `adm` (
  `idadm` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `ativo` char(1) DEFAULT 'A',
  `cadastro` datetime DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idadm`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adm`
--

/*!40000 ALTER TABLE `adm` DISABLE KEYS */;
INSERT INTO `adm` (`idadm`,`nome`,`cpf`,`senha`,`ativo`,`cadastro`,`alteracao`) VALUES 
 (1,'Franciele Telles','111.111.111-11','123456789','A','2024-04-03 16:06:53','2024-04-03 16:06:53');
/*!40000 ALTER TABLE `adm` ENABLE KEYS */;


--
-- Definition of table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idcliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `ativo` char(1) DEFAULT 'A',
  `cadastro` datetime DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`idcliente`,`nome`,`cpf`,`ativo`,`cadastro`,`alteracao`) VALUES 
 (1,'Franciele Telles de oliveira nobre','111.111.111-11','A','2024-04-03 16:02:40','2024-04-03 16:02:40');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


--
-- Definition of table `contrato`
--

DROP TABLE IF EXISTS `contrato`;
CREATE TABLE `contrato` (
  `idcontrato` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcliente` int(10) unsigned NOT NULL,
  `idtiposervico` int(10) unsigned NOT NULL,
  `idtipopagamento` int(10) unsigned NOT NULL,
  `idadm` int(10) unsigned NOT NULL,
  `valor` varchar(20) NOT NULL,
  `prazoentrega` date NOT NULL,
  `valorentrada` varchar(20) NOT NULL,
  `parcelas` varchar(30) DEFAULT NULL,
  `ativo` char(1) DEFAULT 'A',
  `cadastro` datetime DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idcontrato`,`idcliente`,`idtiposervico`,`idtipopagamento`,`idadm`),
  KEY `fk_contrato_cliente` (`idcliente`),
  KEY `fk_contrato_tiposervico` (`idtiposervico`),
  KEY `fk_contrato_tipopagamento` (`idtipopagamento`),
  KEY `fk_contrato_adm` (`idadm`),
  CONSTRAINT `fk_contrato_adm` FOREIGN KEY (`idadm`) REFERENCES `adm` (`idadm`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_contrato_cliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_contrato_tipopagamento` FOREIGN KEY (`idtipopagamento`) REFERENCES `tipopagamento` (`idtipopagamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_contrato_tiposervico` FOREIGN KEY (`idtiposervico`) REFERENCES `tiposervico` (`idtiposervico`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contrato`
--

/*!40000 ALTER TABLE `contrato` DISABLE KEYS */;
/*!40000 ALTER TABLE `contrato` ENABLE KEYS */;


--
-- Definition of table `tipopagamento`
--

DROP TABLE IF EXISTS `tipopagamento`;
CREATE TABLE `tipopagamento` (
  `idtipopagamento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipopagamento` varchar(20) NOT NULL,
  `ativo` char(1) DEFAULT 'A',
  `cadastro` datetime DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idtipopagamento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipopagamento`
--

/*!40000 ALTER TABLE `tipopagamento` DISABLE KEYS */;
INSERT INTO `tipopagamento` (`idtipopagamento`,`tipopagamento`,`ativo`,`cadastro`,`alteracao`) VALUES 
 (1,'À vista','A','2024-04-03 16:28:19','2024-04-03 16:28:19'),
 (2,'À prazo','A','2024-04-03 16:28:20','2024-04-03 16:28:20');
/*!40000 ALTER TABLE `tipopagamento` ENABLE KEYS */;


--
-- Definition of table `tiposervico`
--

DROP TABLE IF EXISTS `tiposervico`;
CREATE TABLE `tiposervico` (
  `idtiposervico` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tiposervico` varchar(30) NOT NULL,
  `ativo` char(1) DEFAULT 'A',
  `cadastro` datetime DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idtiposervico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiposervico`
--

/*!40000 ALTER TABLE `tiposervico` DISABLE KEYS */;
/*!40000 ALTER TABLE `tiposervico` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
