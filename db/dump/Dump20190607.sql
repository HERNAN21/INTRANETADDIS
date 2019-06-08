-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: 185.206.163.185    Database: u934388326_intra
-- ------------------------------------------------------
-- Server version	5.5.5-10.2.23-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `id_matricula` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_alumno`,`id_matricula`,`id_seccion`),
  KEY `fk_alumnos_matricula1_idx` (`id_matricula`),
  KEY `fk_alumnos_seccion1_idx` (`id_seccion`),
  CONSTRAINT `fk_alumnos_matricula1` FOREIGN KEY (`id_matricula`) REFERENCES `matricula` (`id_matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumnos_seccion1` FOREIGN KEY (`id_seccion`) REFERENCES `seccion` (`id_seccion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES (1,1,1,'AC'),(2,2,1,'AC'),(3,3,1,'AC'),(4,4,1,'AC'),(5,5,1,'AC'),(6,6,1,'AC'),(7,7,1,'AC'),(8,8,1,'AC'),(9,9,1,'AC'),(9,94,2,'AC'),(10,10,1,'AC'),(11,11,1,'AC'),(12,12,1,'AC'),(13,13,1,'AC'),(14,14,1,'AC'),(15,15,1,'AC'),(16,16,1,'AC'),(17,17,1,'AC'),(18,18,1,'AC'),(19,19,1,'AC'),(20,20,1,'AC'),(21,21,1,'AC'),(22,22,1,'AC'),(23,23,1,'AC'),(24,24,1,'AC'),(25,25,1,'AC'),(26,26,1,'AC'),(27,27,1,'AC'),(28,28,1,'AC'),(29,29,1,'AC'),(30,30,1,'AC'),(31,31,1,'AC'),(32,32,1,'AC'),(33,33,1,'AC'),(34,34,1,'AC'),(35,35,1,'AC'),(36,36,1,'AC'),(37,37,1,'AC'),(38,38,1,'AC'),(39,39,1,'AC'),(40,40,1,'AC'),(41,41,1,'AC'),(42,42,1,'AC'),(43,43,1,'AC'),(44,44,2,'AC'),(45,45,2,'AC'),(46,46,2,'AC'),(47,47,2,'AC'),(48,48,2,'AC'),(49,49,2,'AC'),(50,50,2,'AC'),(51,51,2,'AC'),(52,52,2,'AC'),(53,53,2,'AC'),(54,55,2,'AC'),(55,56,2,'AC'),(56,57,2,'AC'),(57,58,2,'AC'),(58,59,1,'AC'),(59,60,1,'AC'),(60,61,1,'AC'),(61,62,1,'AC'),(62,63,1,'AC'),(63,64,1,'AC'),(64,65,1,'AC'),(65,66,1,'AC'),(66,67,1,'AC'),(67,68,1,'AC'),(68,69,1,'AC'),(69,70,1,'AC'),(70,71,1,'AC'),(71,72,1,'AC'),(72,73,1,'AC'),(73,74,1,'AC'),(74,75,1,'AC'),(75,76,1,'AC'),(76,77,1,'AC'),(77,78,1,'AC'),(78,79,1,'AC'),(79,80,2,'AC'),(80,81,2,'AC'),(81,82,2,'AC'),(82,83,2,'AC'),(83,84,2,'AC'),(84,85,2,'AC'),(85,86,2,'AC'),(86,87,2,'AC'),(87,88,2,'AC'),(88,89,2,'AC'),(89,90,2,'AC'),(90,91,2,'AC'),(91,92,2,'AC'),(92,93,2,'AC'),(93,94,2,'AC'),(94,95,2,'AC'),(95,96,2,'AC'),(96,97,2,'AC'),(97,98,2,'AC'),(98,99,2,'AC'),(99,104,1,'AC'),(100,105,1,'AC'),(101,106,1,'AC'),(102,107,1,'AC'),(103,108,1,'AC'),(104,109,1,'AC'),(105,110,1,'AC'),(106,111,1,'AC'),(107,112,1,'AC'),(108,113,1,'AC'),(109,114,1,'AC'),(110,115,1,'AC'),(111,116,1,'AC'),(112,117,1,'AC'),(113,291,1,'ac');
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asistencia` (
  `id_asistencia` int(11) NOT NULL AUTO_INCREMENT,
  `hra_marcado` datetime DEFAULT NULL,
  `id_carrera` int(11) DEFAULT NULL,
  `id_ciclo` int(11) DEFAULT NULL,
  `id_seccion` int(11) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `cod_usuario` int(11) DEFAULT NULL,
  `id_alumno` int(11) NOT NULL,
  PRIMARY KEY (`id_asistencia`,`id_alumno`),
  KEY `fk_asistencia_alumnos1_idx` (`id_alumno`),
  CONSTRAINT `fk_asistencia_alumnos1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistencia`
--

LOCK TABLES `asistencia` WRITE;
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
INSERT INTO `asistencia` VALUES (1,'0000-00-00 00:00:00',1,1,1,30,3,8),(2,'2019-06-01 00:00:00',1,1,1,31,3,9),(3,'2019-06-06 18:08:05',1,1,1,33,3,10);
/*!40000 ALTER TABLE `asistencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carreras`
--

DROP TABLE IF EXISTS `carreras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carreras` (
  `id_carrera` int(11) NOT NULL AUTO_INCREMENT,
  `descor` varchar(10) DEFAULT NULL,
  `deslar` text DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_carrera`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carreras`
--

LOCK TABLES `carreras` WRITE;
/*!40000 ALTER TABLE `carreras` DISABLE KEYS */;
INSERT INTO `carreras` VALUES (1,'ADM','ADMINISTRACION DE EMPRESAS','AC'),(2,'DG','DISEÑO GRAFICO','AC'),(3,'INA','INDUSTRIAS ALIMENTARIAS\r\n','AC'),(4,'CEI','COMPUTACION E INFORMATICA','AC');
/*!40000 ALTER TABLE `carreras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carreras_cursos`
--

DROP TABLE IF EXISTS `carreras_cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carreras_cursos` (
  `id_carrera` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  PRIMARY KEY (`id_carrera`,`id_curso`),
  KEY `fk_carreras_has_cursos_cursos1_idx` (`id_curso`),
  KEY `fk_carreras_has_cursos_carreras1_idx` (`id_carrera`),
  CONSTRAINT `fk_carreras_has_cursos_carreras1` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id_carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_carreras_has_cursos_cursos1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carreras_cursos`
--

LOCK TABLES `carreras_cursos` WRITE;
/*!40000 ALTER TABLE `carreras_cursos` DISABLE KEYS */;
INSERT INTO `carreras_cursos` VALUES (1,30),(1,31),(1,33);
/*!40000 ALTER TABLE `carreras_cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciclo`
--

DROP TABLE IF EXISTS `ciclo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciclo` (
  `id_ciclo` int(11) NOT NULL AUTO_INCREMENT,
  `descor` varchar(10) DEFAULT NULL,
  `deslar` varchar(30) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_ciclo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciclo`
--

LOCK TABLES `ciclo` WRITE;
/*!40000 ALTER TABLE `ciclo` DISABLE KEYS */;
INSERT INTO `ciclo` VALUES (1,'I','PRIMER CICLO','AC'),(2,'II','SEGUNDO CICLO','AC'),(3,'III','TERCER CICLO','AC'),(4,'IV','CUARTO CICLO','IN'),(5,'V','QUINTO CICLO','AC'),(6,'VI','SEXTO CICLO','AC');
/*!40000 ALTER TABLE `ciclo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `concepto_pago`
--

DROP TABLE IF EXISTS `concepto_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `concepto_pago` (
  `id_conceptoPago` int(11) NOT NULL AUTO_INCREMENT,
  `concepto` varchar(50) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  PRIMARY KEY (`id_conceptoPago`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concepto_pago`
--

LOCK TABLES `concepto_pago` WRITE;
/*!40000 ALTER TABLE `concepto_pago` DISABLE KEYS */;
INSERT INTO `concepto_pago` VALUES (1,'Matricula',150),(2,'Pension Beca Trentino',460),(3,'Pension Beca Parroquial',30),(4,'Pension Beca Municipal',200),(5,'Inscripcion',100),(6,'Habitacion VG_Becarios',200),(7,'Habitacion VG_Pagantes',130),(8,'Habitacion Union_Becarios',200),(9,'Habitacion Union_Pagantes',130),(10,'Habitacion Collanac_Becarios',200),(11,'Habitacion Collanac_Pagantes',130),(12,'Habitacion Portada I',130);
/*!40000 ALTER TABLE `concepto_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuenta`
--

DROP TABLE IF EXISTS `cuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuenta` (
  `id_cuenta` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_ciclo` int(11) NOT NULL,
  `id_conceptoPago` int(11) NOT NULL,
  `vencimiento` date DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_cuenta`,`id_alumno`,`id_ciclo`,`id_conceptoPago`),
  KEY `fk_deuda_concepto_pago1_idx` (`id_conceptoPago`),
  KEY `fk_deuda_alumnos1_idx` (`id_alumno`),
  KEY `id_ciclo_idx` (`id_ciclo`),
  CONSTRAINT `fk_deuda_alumnos1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_deuda_concepto_pago1` FOREIGN KEY (`id_conceptoPago`) REFERENCES `concepto_pago` (`id_conceptoPago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_ciclo` FOREIGN KEY (`id_ciclo`) REFERENCES `ciclo` (`id_ciclo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuenta`
--

LOCK TABLES `cuenta` WRITE;
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
INSERT INTO `cuenta` VALUES (1,3,1,1,'2019-05-15','P'),(2,3,1,2,'2019-05-15','P'),(3,3,1,4,'2019-05-15','D'),(4,4,1,1,'2019-05-15','P'),(5,4,1,2,'2019-05-15','P'),(6,4,1,3,'2019-05-15','P'),(7,5,1,2,'2019-05-15','P'),(8,5,1,4,'2019-05-15','D'),(9,6,1,1,'2019-05-15','P'),(10,6,1,3,'2019-05-15','P'),(11,6,1,2,'2019-05-15','P'),(12,7,1,4,'2019-05-15','D'),(13,7,1,3,'2019-05-15','P'),(14,8,1,1,'2019-05-15','P'),(15,8,1,2,'2019-05-15','P'),(16,9,1,3,'2019-05-15','P'),(17,9,1,4,'2019-05-15','D'),(18,10,1,1,'2019-05-15','P'),(19,10,1,2,'2019-05-16','P'),(20,11,1,1,'2019-05-15','P'),(21,12,1,3,'2019-05-15','D'),(22,12,1,2,'2019-05-15','P'),(23,13,1,4,'2019-05-15','D'),(24,14,1,3,'2019-05-15','D'),(25,14,1,2,'2019-05-15','P'),(26,15,1,1,'2019-05-15','P'),(27,15,1,3,'2019-05-15','D'),(28,16,1,4,'2019-05-15','D'),(29,17,1,2,'2019-05-15','P'),(30,18,1,4,'2019-05-15','D'),(31,18,1,2,'2019-05-15','P'),(32,19,1,4,'2019-05-15','D'),(33,19,1,3,'2019-05-15','D'),(34,20,1,2,'2019-05-15','P'),(35,21,1,3,'2019-05-15','D'),(36,22,1,2,'2019-05-15','P'),(37,23,1,4,'2019-05-15','D'),(38,24,1,2,'2019-05-15','P'),(39,25,1,4,'2019-05-15','D'),(40,25,1,3,'2019-05-15','P'),(41,26,1,2,'2019-05-15','P'),(42,26,1,4,'2019-05-15','D'),(43,27,1,2,'2019-05-15','P'),(44,27,1,3,'2019-05-15','P'),(45,28,1,2,'2019-05-15','P'),(46,28,1,4,'2019-05-15','D'),(47,28,1,3,'2019-05-15','P'),(48,113,1,1,'2019-05-23','P');
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `descor` varchar(45) DEFAULT NULL,
  `deslar` varchar(45) DEFAULT NULL,
  `credito` decimal(10,0) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'D2D','DISEÑO 2D',4,'AC'),(2,'FV','FUNDAMENTOS VISUAL',4,'AC'),(3,'TG','TALLER DE CREATIVIDAD',3,'AC'),(4,'DA','DIBUJO ARTÍSTICO',3,'AC'),(5,'SD','SEMIÓTICA DE DISEÑO',2,'AC'),(6,'TI','TÉCNICAS DE ILUSTRACIÓN',4,'AC'),(7,'T','TIPOGRAFÍA',4,'AC'),(8,'M','MARKETING',4,'AC'),(9,'D3D','DISEÑO 3D',4,'AC'),(10,'ID','ILUSTRACIÓN DIGITAL',4,'AC'),(11,'D','DIAGRAMACIÓN',4,'AC'),(12,'DD','DIAGRAMACIÓN DIGITAL',2,'AC'),(13,'CV','COMUNICACIÓN VISUAL',2,'AC'),(14,'PI','PROYECTO ILUSTRADOR',4,'AC'),(15,'PG','PRODUCCIÓN GRÁFICA',4,'AC'),(16,'PPD','PRE PRENSA DIGITAL',4,'AC'),(17,'FEV','FOTOGRAFÍA Y EXPRESIÓN VISUAL',2,'AC'),(18,'AD','ANIMACIÓN DIGITAL',3,'AC'),(19,'PAF','PROYECTO ARTE FINAL',4,'AC'),(20,'RCP','REDACCIÓN CRETATIVA Y PUBLICIDAD',4,'AC'),(21,'EP','ESTRATEGIA PUBLICITARIA',3,'AC'),(22,'DE','DISEÑO DE EMPAQUE',4,'AC'),(23,'CMA','CREATIVIDAD EN MEDIO ALTERNATIVO',4,'AC'),(24,'PD','PROYECTO DISEÑADOR',4,'AC'),(25,'DAP','DIRECCIÓN DE ARTE PUBLICITARIO',3,'AC'),(26,'DC','DUPLA CREATIVA',3,'AC'),(27,'TIC','TALLER DE IDENTIDAD CORPORATIVA',3,'AC'),(28,'CP','CAMPAÑAS PUBLICITARIAS',4,'AC'),(29,'PDA','PROYECTO DIRECTOR DE ARTE',3,'AC'),(30,'PO','PLANIFICACIÓN Y ORGANIZACIÓN',3,'AC'),(31,'DCE','DIRECCIÓN Y CONTROL EMPRESARIAL',3,'AC'),(32,'P','PRODUCCIÓN',3,'AC'),(33,'GRH','GESTIÓN DE RECURSOS HUMANOS',2,'AC'),(34,'SCPA','SISTEMA DE COMPENSACIÓN, PREVISIONAL Y ASISTR',3,'AC'),(35,'AL','ADMINISTRACIÓN LOGÍSTICA',3,'AC'),(36,'GA','GESTIÓN DE ALMACENES',3,'AC'),(37,'AP','ADMINISTRACIÓN PUBLICA',4,'AC'),(38,'EE','ESTADÍSTICA EMPRESARIAL',4,'AC'),(39,'GME','GESTIÓN DE MARKETING EMPRESARIAL',4,'AC'),(40,'IM','INVESTIGACIÓN DE MERCADO',2,'AC'),(41,'CI','COMERCIO INTERNACIONAL',3,'AC'),(42,'CCAC','COMUNICACIÓN COMERCIAL Y ATENCIÓN AL CLIENTE',2,'AC'),(43,'SVCE','SISTEMA DE VENTAS Y COMERCIO ELECTRÓNICO',4,'AC'),(44,'MES','MARKETING EN LAS EMPRESAS DE SERVICIOS',3,'AC'),(45,'IC','INGLES COMERCIAL',3,'AC'),(46,'OT','OPERACIÓN CONTABLES',3,'AC'),(47,'LCT','LEGISLACIÓN COMERCIAL Y TRIBUTARIA',2,'AC'),(48,'GT','GESTIÓN DE TESORERÍA',2,'AC'),(49,'AC','ANÁLISIS DE COSTOS',3,'AC'),(50,'GP','GESTIÓN PRESUPUESTARIA',3,'AC'),(51,'GF','GESTIÓN FINANCIERA',3,'AC'),(52,'FPI','FORMULACION DE PROYECTOS DE INVERSIÓN',3,'AC'),(53,'EPI','EVALUACIÓN DE PROYECTOS DE INVESTIGACIÓN',4,'AC'),(54,'S.E.G','SOCIEDAD Y ECONOMIA EN LA GLOBALIZACIÓN',3,'AC'),(55,'P.I.I','PROYECTO DE INVESTIGACIÓN E INNOVACIÓN',NULL,'AC'),(56,'I.E.T','INVESTIGACIÓN E INNOVACIÓN TECNOLÓGICA',NULL,'AC'),(57,'M.F','MATEMÁTICA FINANCIERA I',NULL,'AC'),(58,'O.C.E','ORGANIZACIÓN Y CONSTITUCIÓN DE EMPRESAS',NULL,'AC'),(59,'C.E','COMPORTAMIENTO ÉTICO',NULL,'AC'),(60,'DPT','DESARROLLO DE PROYECTO DE TITULACIÓN',NULL,'AC');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos_ciclo`
--

DROP TABLE IF EXISTS `cursos_ciclo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos_ciclo` (
  `id_ciclo` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  PRIMARY KEY (`id_ciclo`,`id_curso`),
  KEY `fk_ciclo_has_cursos_cursos1_idx` (`id_curso`),
  KEY `fk_ciclo_has_cursos_ciclo1_idx` (`id_ciclo`),
  CONSTRAINT `fk_ciclo_has_cursos_ciclo1` FOREIGN KEY (`id_ciclo`) REFERENCES `ciclo` (`id_ciclo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ciclo_has_cursos_cursos1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos_ciclo`
--

LOCK TABLES `cursos_ciclo` WRITE;
/*!40000 ALTER TABLE `cursos_ciclo` DISABLE KEYS */;
INSERT INTO `cursos_ciclo` VALUES (1,30),(1,31),(1,33),(2,32),(3,38),(3,39),(3,40),(3,54),(3,57),(5,47),(5,49),(5,50),(5,52),(5,58),(5,59),(5,60);
/*!40000 ALTER TABLE `cursos_ciclo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_nota`
--

DROP TABLE IF EXISTS `detalle_nota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_nota` (
  `id_detalleNota` int(11) NOT NULL AUTO_INCREMENT,
  `id_nota` int(11) NOT NULL,
  `id_tNota` int(11) NOT NULL,
  `nota` decimal(4,2) NOT NULL,
  PRIMARY KEY (`id_detalleNota`,`id_nota`),
  KEY `fk_detalle_nota_notas1_idx` (`id_nota`),
  CONSTRAINT `fk_detalle_nota_notas1` FOREIGN KEY (`id_nota`) REFERENCES `notas` (`id_nota`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_nota`
--

LOCK TABLES `detalle_nota` WRITE;
/*!40000 ALTER TABLE `detalle_nota` DISABLE KEYS */;
INSERT INTO `detalle_nota` VALUES (1,30,1,20.00),(2,30,2,20.00),(3,31,3,15.00),(4,31,1,18.00),(5,31,2,16.00),(6,31,3,19.00),(8,12,1,20.00),(9,14,1,20.00),(10,30,1,20.00),(11,31,2,15.00),(12,16,0,19.00),(14,54,1,15.00),(16,54,0,20.00),(17,54,3,20.00),(18,54,2,15.00);
/*!40000 ALTER TABLE `detalle_nota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_requisitos`
--

DROP TABLE IF EXISTS `detalle_requisitos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_requisitos` (
  `id_detRequisito` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `archivo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_detRequisito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_requisitos`
--

LOCK TABLES `detalle_requisitos` WRITE;
/*!40000 ALTER TABLE `detalle_requisitos` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_requisitos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docente`
--

DROP TABLE IF EXISTS `docente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docente` (
  `id_docente` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `profesion` text DEFAULT NULL,
  `Facultad` text DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_docente`,`id_persona`),
  KEY `fk_profesor_persona1_idx` (`id_persona`),
  CONSTRAINT `fk_profesor_persona1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docente`
--

LOCK TABLES `docente` WRITE;
/*!40000 ALTER TABLE `docente` DISABLE KEYS */;
INSERT INTO `docente` VALUES (1,800,'Administracion de Empresas',NULL,'AC'),(2,801,'Administracion de Empresas',NULL,'AC'),(3,803,'Administracion de Empresas',NULL,'AC'),(4,804,'Administracion de Empresas',NULL,'AC'),(5,805,'Administracion de Empresas',NULL,'Ac');
/*!40000 ALTER TABLE `docente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docente_cursos`
--

DROP TABLE IF EXISTS `docente_cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docente_cursos` (
  `id_docente` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  PRIMARY KEY (`id_docente`,`id_curso`),
  KEY `fk_profesor_has_cursos_cursos1_idx` (`id_curso`),
  KEY `fk_profesor_has_cursos_profesor1_idx` (`id_docente`),
  CONSTRAINT `fk_profesor_has_cursos_cursos1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_profesor_has_cursos_profesor1` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docente_cursos`
--

LOCK TABLES `docente_cursos` WRITE;
/*!40000 ALTER TABLE `docente_cursos` DISABLE KEYS */;
INSERT INTO `docente_cursos` VALUES (1,33),(1,49),(1,54),(1,55),(1,56),(2,30),(2,31),(3,32),(3,47),(3,52),(3,57),(3,58),(3,60),(4,50),(5,35),(5,46);
/*!40000 ALTER TABLE `docente_cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluacionpostulante`
--

DROP TABLE IF EXISTS `evaluacionpostulante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluacionpostulante` (
  `id_evaluacionPost` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_evaluacionPost`,`id_persona`),
  UNIQUE KEY `id_evaluacionPost` (`id_evaluacionPost`)
) ENGINE=InnoDB AUTO_INCREMENT=297 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluacionpostulante`
--

LOCK TABLES `evaluacionpostulante` WRITE;
/*!40000 ALTER TABLE `evaluacionpostulante` DISABLE KEYS */;
INSERT INTO `evaluacionpostulante` VALUES (1,1,'AP'),(2,2,'AP'),(3,7,'AP'),(4,8,'AP'),(5,9,'AP'),(6,10,'AP'),(7,11,'AP'),(8,12,'AP'),(9,13,'AP'),(10,14,'AP'),(11,15,'AP'),(12,16,'AP'),(13,17,'AP'),(14,18,'AP'),(15,19,'AP'),(16,20,'AP'),(17,21,'AP'),(18,22,'AP'),(19,23,'AP'),(20,24,'AP'),(21,25,'AP'),(22,26,'AP'),(23,27,'AP'),(24,28,'AP'),(25,29,'AP'),(26,30,'AP'),(27,31,'AP'),(28,32,'AP'),(29,33,'AP'),(30,34,'AP'),(31,35,'AP'),(32,36,'AP'),(33,37,'AP'),(34,38,'AP'),(35,66,'AP'),(36,67,'AP'),(37,68,'AP'),(38,69,'AP'),(39,70,'AP'),(40,71,'AP'),(41,72,'AP'),(42,73,'AP'),(43,74,'AP'),(44,75,'AP'),(45,76,'AP'),(46,77,'AP'),(47,78,'AP'),(48,79,'AP'),(49,80,'AP'),(50,81,'AP'),(51,82,'AP'),(52,83,'AP'),(53,84,'AP'),(54,85,'AP'),(55,86,'AP'),(56,87,'AP'),(57,88,'AP'),(58,89,'AP'),(59,90,'AP'),(60,91,'AP'),(61,92,'AP'),(62,93,'AP'),(63,94,'AP'),(64,95,'AP'),(65,96,'AP'),(66,97,'AP'),(67,98,'AP'),(68,99,'AP'),(69,100,'AP'),(70,101,'AP'),(71,102,'AP'),(72,103,'AP'),(73,104,'AP'),(74,105,'AP'),(75,106,'AP'),(76,107,'AP'),(77,108,'AP'),(78,109,'AP'),(79,110,'AP'),(80,111,'AP'),(81,112,'AP'),(82,113,'AP'),(83,114,'AP'),(84,115,'AP'),(85,116,'AP'),(86,117,'AP'),(87,118,'AP'),(88,119,'AP'),(89,120,'AP'),(90,121,'AP'),(91,122,'AP'),(92,123,'AP'),(93,124,'AP'),(94,125,'AP'),(95,126,'AP'),(96,127,'AP'),(97,128,'AP'),(98,129,'AP'),(99,130,'AP'),(100,131,'AP'),(101,132,'AP'),(102,133,'AP'),(103,134,'AP'),(104,135,'AP'),(105,136,'AP'),(110,142,'AP'),(111,143,'AP'),(112,144,'AP'),(113,145,'AP'),(114,146,'AP'),(115,147,'AP'),(116,148,'AP'),(117,149,'AP'),(118,150,'AP'),(119,151,'AP'),(120,152,'AP'),(121,153,'AP'),(122,154,'AP'),(123,155,'AP'),(124,156,'AP'),(125,157,'AP'),(126,158,'AP'),(127,159,'AP'),(128,160,'AP'),(129,161,'AP'),(130,162,'AP'),(131,163,'AP'),(132,164,'AP'),(133,165,'AP'),(134,166,'AP'),(135,167,'AP'),(136,168,'AP'),(137,169,'AP'),(138,170,'AP'),(139,171,'AP'),(140,172,'AP'),(141,173,'AP'),(142,174,'AP'),(143,175,'AP'),(144,176,'AP'),(145,177,'AP'),(146,178,'AP'),(147,179,'AP'),(148,180,'AP'),(149,181,'AP'),(150,182,'AP'),(151,183,'AP'),(152,184,'AP'),(153,185,'AP'),(154,186,'AP'),(155,187,'AP'),(156,188,'AP'),(157,189,'AP'),(158,190,'AP'),(159,191,'AP'),(160,192,'AP'),(161,193,'AP'),(162,194,'AP'),(163,195,'AP'),(164,196,'AP'),(165,197,'AP'),(166,198,'AP'),(167,199,'AP'),(168,200,'AP'),(169,201,'AP'),(170,202,'AP'),(171,203,'AP'),(172,204,'AP'),(173,205,'AP'),(174,206,'AP'),(175,207,'AP'),(176,208,'AP'),(177,209,'AP'),(178,210,'AP'),(179,211,'AP'),(180,212,'AP'),(181,213,'AP'),(182,214,'AP'),(183,215,'AP'),(184,216,'AP'),(185,217,'AP'),(186,218,'AP'),(187,219,'AP'),(188,220,'AP'),(189,221,'AP'),(190,222,'AP'),(191,223,'AP'),(192,224,'AP'),(193,225,'AP'),(194,226,'AP'),(195,227,'AP'),(196,228,'AP'),(197,229,'AP'),(198,230,'AP'),(199,231,'AP'),(200,232,'AP'),(201,233,'AP'),(202,234,'AP'),(203,235,'AP'),(204,236,'AP'),(205,237,'AP'),(206,238,'AP'),(207,239,'AP'),(208,240,'AP'),(209,241,'AP'),(210,242,'AP'),(211,243,'AP'),(212,244,'AP'),(213,245,'AP'),(214,246,'AP'),(215,247,'AP'),(216,248,'AP'),(217,249,'AP'),(218,250,'AP'),(219,251,'AP'),(220,252,'AP'),(221,253,'AP'),(222,254,'AP'),(223,255,'AP'),(224,256,'AP'),(225,257,'AP'),(226,258,'AP'),(227,259,'AP'),(228,260,'AP'),(229,261,'AP'),(230,262,'AP'),(231,263,'AP'),(232,264,'AP'),(233,265,'AP'),(234,266,'AP'),(235,267,'AP'),(236,268,'AP'),(237,269,'AP'),(238,270,'AP'),(239,271,'AP'),(240,272,'AP'),(241,273,'AP'),(242,274,'AP'),(243,275,'AP'),(244,276,'AP'),(245,277,'AP'),(246,278,'AP'),(247,279,'AP'),(248,280,'AP'),(249,281,'AP'),(250,282,'AP'),(251,283,'AP'),(252,284,'AP'),(253,285,'AP'),(254,286,'AP'),(255,287,'AP'),(256,288,'AP'),(257,289,'AP'),(258,290,'AP'),(259,291,'AP'),(260,292,'AP'),(261,293,'AP'),(262,294,'AP'),(263,295,'AP'),(264,296,'AP'),(265,297,'AP'),(266,298,'AP'),(267,299,'AP'),(268,300,'AP'),(269,301,'AP'),(270,302,'AP'),(271,303,'AP'),(272,304,'AP'),(273,305,'AP'),(274,306,'AP'),(275,307,'AP'),(276,308,'AP'),(277,309,'AP'),(278,310,'AP'),(279,311,'AP'),(280,312,'AP'),(281,313,'AP'),(282,314,'AP'),(283,315,'AP'),(284,316,'AP'),(285,317,'AP'),(286,318,'AP'),(287,319,'AP'),(288,320,'AP'),(289,321,'AP'),(290,322,'AP'),(291,323,'AP'),(292,324,'AP'),(293,325,'AP'),(294,326,'AP'),(295,327,'AP'),(296,328,'AP');
/*!40000 ALTER TABLE `evaluacionpostulante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inicio`
--

DROP TABLE IF EXISTS `inicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inicio` (
  `id_imgInicio` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`id_imgInicio`,`id_perfil`),
  UNIQUE KEY `id_imgInicio` (`id_imgInicio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inicio`
--

LOCK TABLES `inicio` WRITE;
/*!40000 ALTER TABLE `inicio` DISABLE KEYS */;
INSERT INTO `inicio` VALUES (1,'INTRANET DEL ESTUDIANTE','Bienvenido a al portal web del estudiante, donde encontraras información sobre tus asignaciones, notas y pagos institucionales.Esperamos te guste...!','views/images/inicio/imagen769.jpg',1),(2,'INTRANET DEL DOCENTE','Bienvenido al portal web del Docente. Esperamos te guste...!','views/images/inicio/imagen950.jpg',2),(3,'INTRANET DEL PERSONAL ADMINISTRATIVO','Bienvenido al Portal Web del Personal Administrativo. Espero que les guste...!','views/images/inicio/imagen901.jpg',3);
/*!40000 ALTER TABLE `inicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matricula`
--

DROP TABLE IF EXISTS `matricula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matricula` (
  `id_matricula` int(11) NOT NULL AUTO_INCREMENT,
  `cod_unicoMatricula` varchar(14) DEFAULT NULL,
  `id_evaluacionPost` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `id_ciclo` int(11) NOT NULL,
  `id_semestre` int(11) NOT NULL,
  `cod_pago` varchar(20) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `cod_usuario` int(11) DEFAULT NULL,
  `id_talumno` int(11) NOT NULL,
  `tipo_matricula` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_matricula`,`id_evaluacionPost`,`id_carrera`,`id_ciclo`,`id_semestre`,`id_talumno`),
  KEY `fk_matricula_ciclo1_idx` (`id_ciclo`),
  KEY `fk_matricula_carreras1_idx` (`id_carrera`),
  KEY `fk_matricula_semestre1_idx` (`id_semestre`),
  KEY `fk_matricula_EvaluacionPostulate1_idx` (`id_evaluacionPost`),
  KEY `fk_matricula_tipo_alumno1_idx` (`id_talumno`),
  CONSTRAINT `fk_matricula_EvaluacionPostulate1` FOREIGN KEY (`id_evaluacionPost`) REFERENCES `evaluacionpostulante` (`id_evaluacionPost`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_matricula_carreras1` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id_carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_matricula_ciclo1` FOREIGN KEY (`id_ciclo`) REFERENCES `ciclo` (`id_ciclo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_matricula_semestre1` FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id_semestre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_matricula_tipo_alumno1` FOREIGN KEY (`id_talumno`) REFERENCES `tipo_alumno` (`id_talumno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=296 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matricula`
--

LOCK TABLES `matricula` WRITE;
/*!40000 ALTER TABLE `matricula` DISABLE KEYS */;
INSERT INTO `matricula` VALUES (1,'12345678945612',1,2,1,1,'002705','2019-01-23 04:11:00',5,3,0),(1,'45612378945638',243,1,1,3,NULL,NULL,1,1,0),(2,'45612378945612',2,2,1,1,'002806','2019-01-23 05:59:00',5,3,0),(3,'45612378945613',3,1,1,1,'002807','2019-05-11 00:00:00',1,3,0),(4,'45612378945614',4,1,1,1,'002808','2019-05-11 01:48:20',1,3,0),(5,'45612378945615',5,1,1,1,'002809','2019-05-11 01:49:10',1,3,0),(6,'45612378945616',6,1,1,1,'002810','2019-05-11 01:50:12',1,3,0),(7,'45612378945617',7,1,1,1,'002811','2019-05-11 01:51:13',1,3,0),(8,'45612378945618',8,1,1,1,'002812','2019-05-11 01:52:12',1,3,0),(9,'45612378945619',9,1,1,1,'002813','2019-05-11 01:53:12',1,3,0),(10,'98745632112365',10,1,1,1,'002814','2019-06-07 21:33:39',5,3,0),(11,'45612378945621',11,1,1,1,'002815','2019-05-11 01:55:12',1,3,0),(12,'45612378945622',12,1,1,1,'002816','2019-05-11 01:56:12',1,3,0),(13,'45612378945623',13,1,1,1,'002817','2019-05-11 01:57:12',1,3,0),(14,'45612378945624',14,1,1,1,'002818','2019-05-11 01:58:12',1,3,0),(15,'45612378945625',15,1,1,1,'002819','2019-05-11 01:59:12',1,3,0),(16,'45612378945626',16,1,1,1,'002820','2019-05-11 01:59:20',1,3,0),(17,'45612378945627',17,1,1,1,'002821','2019-05-11 01:59:30',1,3,0),(18,'45612378945628',18,1,1,1,'002822','2019-05-11 01:59:40',1,3,0),(19,'45612378945629',19,1,1,1,'002823','2019-05-11 01:59:50',1,3,0),(20,'45612378945630',20,1,1,1,'002824','2019-05-11 02:00:00',1,3,0),(21,'45612378945631',21,1,1,1,'002825','2019-05-11 02:01:02',1,3,0),(22,'45612378945632',22,1,1,1,'002826','2019-05-11 02:02:02',1,3,0),(23,'45612378945633',23,1,1,1,'002827','2019-05-11 02:03:02',1,3,0),(24,'45612378945634',24,1,1,1,'002828','2019-05-11 02:04:02',1,3,0),(25,'45612378945635',25,1,1,1,'002829','2019-05-11 02:05:02',1,3,0),(26,'45612378945636',26,1,1,1,'002830','2019-05-11 02:06:02',1,3,0),(27,'45612378945637',27,1,1,1,'002831','2019-05-11 02:07:02',1,3,0),(28,'45612378945638',28,1,1,1,'002832','2019-05-11 02:08:02',1,3,0),(29,'45612378945638',35,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(30,'45612378945638',36,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(31,'45612378945638',37,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(32,'45612378945638',38,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(33,'45612378945638',39,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(34,'45612378945638',40,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(35,'45612378945638',41,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(36,'45612378945638',42,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(37,'45612378945638',43,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(38,'45612378945638',44,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(39,'45612378945638',45,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(40,'45612378945638',46,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(41,'45612378945638',47,4,4,3,'002832    ','2019-05-20 11:32:05',1,1,1),(42,'45612378945638',48,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(43,'45612378945638',49,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(44,'45612378945638',50,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(45,'45612378945638',51,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(46,'45612378945638',52,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(47,'45612378945638',53,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(48,'45612378945638',54,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(49,'45612378945638',55,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(50,'45612378945638',56,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(51,'45612378945638',57,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(52,'45612378945638',58,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(53,'45612378945638',59,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(54,'45612378945638',60,4,4,3,'	002832','2019-05-20 11:32:05',1,1,1),(55,'45612378945638',61,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(56,'45612378945638',62,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(57,'45612378945638',63,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(58,'45612378945638',64,4,4,3,'002832','2019-05-20 11:32:05',1,1,1),(59,'45612378945638',65,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(60,'45612378945638',66,3,4,3,'002832 ','2019-05-21 11:32:05',1,1,1),(61,'45612378945638',67,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(62,'45612378945638',68,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(63,'45612378945638',69,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(64,'45612378945638',70,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(65,'45612378945638',71,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(66,'45612378945638',72,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(67,'45612378945638',73,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(68,'45612378945638',74,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(69,'45612378945638',75,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(70,'45612378945638',76,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(71,'45612378945638',77,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(72,'45612378945638',78,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(73,'45612378945638',79,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(74,'45612378945638',80,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(75,'45612378945638',81,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(76,'45612378945638',82,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(77,'45612378945638',83,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(78,'45612378945638',84,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(79,'45612378945638',85,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(80,'45612378945638',86,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(81,'45612378945638',87,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(82,'45612378945638',88,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(83,'45612378945638',89,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(84,'45612378945638',90,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(85,'45612378945638',91,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(86,'45612378945638',92,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(87,'45612378945638',93,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(88,'45612378945638',94,4,4,3,'002832','2019-05-21 11:32:05',1,1,1),(89,'45612378945638',95,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(90,'45612378945638',96,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(91,'45612378945638',97,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(92,'45612378945638',98,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(93,'45612378945638',99,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(94,'45612378945638',100,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(95,'45612378945638',101,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(96,'45612378945638',102,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(97,'45612378945638',103,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(98,'45612378945638',104,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(99,'45612378945638',105,3,4,3,'002832','2019-05-21 11:32:05',1,1,1),(100,'45612378945639',22,1,2,2,'025463','2019-05-31 03:50:00',1,1,1),(104,'45612378945638',110,2,4,3,'002832','2019-05-22 11:32:05',1,3,1),(105,'45612378945638',111,2,4,3,'002832','2019-05-22 11:32:05',1,1,1),(106,'45612378945638',112,2,4,3,'002832','2019-05-22 11:32:05',1,3,1),(107,'45612378945638',113,2,4,3,'002832','2019-05-22 11:32:05',1,1,1),(108,'45612378945638',114,2,4,3,'002832','2019-05-22 11:32:05',1,1,1),(109,'45612378945638',115,2,4,3,'002832','2019-05-22 11:32:05',1,1,1),(110,'45612378945638',116,2,4,3,'002832','2019-05-22 11:32:05',1,3,1),(111,'45612378945638',117,2,4,3,'002832','2019-05-22 11:32:05',1,1,1),(112,'45612378945638',118,2,4,3,'002832','2019-05-22 11:32:05',1,1,1),(113,'45612378945638',119,2,4,3,'002832','2019-05-22 11:32:05',1,1,1),(114,'45612378945638',120,2,4,3,'002832','2019-05-22 11:32:05',1,1,1),(115,'45612378945638',121,2,4,3,'002832','2019-05-22 11:32:05',1,3,1),(116,'45612378945638',122,2,4,3,'002832','2019-05-22 11:32:05',1,1,1),(117,'45612378945638',123,2,4,3,'002832','2019-05-22 11:32:05',1,1,1),(118,'45612378945638',124,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(119,'45612378945638',125,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(120,'45612378945638',126,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(121,'45612378945638',127,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(122,'45612378945638',128,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(123,'45612378945638',129,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(124,'45612378945638',130,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(125,'45612378945638',131,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(126,'45612378945638',132,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(127,'45612378945638',133,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(128,'45612378945638',134,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(129,'45612378945638',135,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(130,'45612378945638',136,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(131,'45612378945638',137,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(132,'45612378945638',138,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(133,'45612378945638',139,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(134,'45612378945638',140,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(135,'45612378945638',141,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(136,'45612378945638',142,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(137,'45612378945638',143,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(138,'45612378945638',144,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(139,'45612378945638',145,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(140,'45612378945638',146,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(141,'45612378945638',147,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(142,'45612378945638',148,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(143,'45612378945638',150,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(144,'45612378945638',151,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(145,'45612378945638',152,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(146,'45612378945638',153,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(147,'45612378945638',154,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(148,'45612378945638',155,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(149,'45612378945638',156,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(150,'45612378945638',157,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(151,'45612378945638',158,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(152,'45612378945638',159,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(153,'45612378945638',160,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(154,'45612378945638',161,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(155,'45612378945638',162,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(156,'45612378945638',163,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(157,'45612378945638',164,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(158,'45612378945638',165,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(159,'45612378945638',166,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(160,'45612378945638',167,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(161,'45612378945638',168,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(162,'45612378945638',169,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(163,'45612378945638',170,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(164,'45612378945638',171,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(165,'45612378945638',172,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(166,'45612378945638',173,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(167,'45612378945638',174,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(168,'45612378945638',175,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(169,'45612378945638',176,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(170,'45612378945638',177,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(171,'45612378945638',178,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(172,'45612378945638',179,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(173,'45612378945638',180,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(174,'45612378945638',181,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(175,'45612378945638',182,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(176,'45612378945638',183,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(177,'45612378945638',184,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(178,'45612378945638',185,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(179,'45612378945638',186,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(180,'45612378945638',187,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(181,'45612378945638',188,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(182,'45612378945638',189,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(183,'45612378945638',190,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(184,'45612378945638',191,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(185,'45612378945638',192,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(186,'45612378945638',193,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(187,'45612378945638',194,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(188,'45612378945638',195,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(189,'45612378945638',196,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(190,'45612378945638',197,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(191,'45612378945638',198,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(192,'45612378945638',199,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(193,'45612378945638',200,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(194,'45612378945638',201,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(195,'45612378945638',202,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(196,'45612378945638',203,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(197,'45612378945638',204,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(198,'45612378945638',205,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(199,'45612378945638',206,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(200,'45612378945638',207,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(201,'45612378945638',208,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(202,'45612378945638',209,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(203,'45612378945638',210,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(204,'45612378945638',211,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(205,'45612378945638',212,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(206,'45612378945638',213,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(207,'45612378945638',214,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(208,'45612378945638',215,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(209,'45612378945638',216,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(211,'45612378945638',217,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(212,'45612378945638',218,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(213,'45612378945638',219,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(214,'45612378945638',220,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(215,'45612378945638',221,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(216,'45612378945638',222,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(217,'45612378945638',223,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(218,'45612378945638',224,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(219,'45612378945638',225,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(220,'45612378945638',226,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(221,'45612378945638',227,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(222,'45612378945638',228,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(223,'45612378945638',229,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(224,'45612378945638',230,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(225,'45612378945638',231,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(226,'45612378945638',232,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(227,'45612378945638',233,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(228,'45612378945638',234,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(229,'45612378945638',235,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(230,'45612378945638',236,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(231,'45612378945638',237,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(232,'45612378945638',238,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(233,'45612378945638',239,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(234,'45612378945638',240,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(235,'45612378945638',241,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(236,'45612378945638',242,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(237,'45612378945638',243,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(238,'45612378945638',244,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(239,'45612378945638',245,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(240,'45612378945638',246,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(241,'45612378945638',247,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(242,'45612378945638',248,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(243,'45612378945638',249,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(244,'45612378945638',250,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(245,'45612378945638',251,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(246,'45612378945638',252,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(247,'45612378945638',253,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(248,'45612378945638',254,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(249,'45612378945638',255,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(250,'45612378945638',256,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(251,'45612378945638',257,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(252,'45612378945638',258,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(253,'45612378945638',259,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(254,'45612378945638',260,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(255,'45612378945638',261,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(256,'45612378945638',262,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(257,'45612378945638',263,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(258,'45612378945638',264,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(259,'45612378945638',265,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(260,'45612378945638',266,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(261,'45612378945638',267,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(262,'45612378945638',268,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(263,'45612378945638',269,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(264,'45612378945638',270,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(265,'45612378945638',271,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(266,'45612378945638',272,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(267,'45612378945638',273,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(268,'45612378945638',274,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(269,'45612378945638',275,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(270,'45612378945638',276,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(271,'45612378945638',277,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(272,'45612378945638',278,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(273,'45612378945638',279,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(274,'45612378945638',280,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(275,'45612378945638',281,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(276,'45612378945638',282,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(277,'45612378945638',283,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(278,'45612378945638',284,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(279,'45612378945638',285,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(280,'45612378945638',286,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(281,'45612378945638',287,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(282,'45612378945638',288,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(283,'45612378945638',289,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(284,'45612378945638',290,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(285,'45612378945638',291,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(286,'45612378945638',292,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(287,'45612378945638',293,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(288,'45612378945638',294,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(289,'45612378945638',295,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(290,'45612378945638',296,1,1,3,'002832','2019-05-23 11:32:05',1,1,0),(291,'45612378945638',149,1,1,3,'002832','2019-05-23 11:32:05',1,1,0);
/*!40000 ALTER TABLE `matricula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matricula_pariente`
--

DROP TABLE IF EXISTS `matricula_pariente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matricula_pariente` (
  `id_matricula` int(11) NOT NULL,
  `id_pariente` int(11) NOT NULL,
  PRIMARY KEY (`id_matricula`,`id_pariente`),
  KEY `fk_matricula_has_pariente_pariente1_idx` (`id_pariente`),
  KEY `fk_matricula_has_pariente_matricula1_idx` (`id_matricula`),
  CONSTRAINT `fk_matricula_has_pariente_matricula1` FOREIGN KEY (`id_matricula`) REFERENCES `matricula` (`id_matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_matricula_has_pariente_pariente1` FOREIGN KEY (`id_pariente`) REFERENCES `pariente` (`id_pariente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matricula_pariente`
--

LOCK TABLES `matricula_pariente` WRITE;
/*!40000 ALTER TABLE `matricula_pariente` DISABLE KEYS */;
/*!40000 ALTER TABLE `matricula_pariente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulos`
--

DROP TABLE IF EXISTS `modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `descor` varchar(25) DEFAULT NULL,
  `deslar` varchar(50) DEFAULT NULL,
  `mod_super` int(11) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  `icono` varchar(20) DEFAULT NULL,
  `orden` char(2) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulos`
--

LOCK TABLES `modulos` WRITE;
/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
INSERT INTO `modulos` VALUES (1,'cursos','Mis Cursos',1,'mn_misCursos','book','1','AC'),(2,'notas','Record de notas',2,'mn_recordNotas','star','2','AC'),(3,'mod. asistencia','Mod. Asistencia',3,'','list_alt','2','AC'),(4,'exámenes','Rol de Exámenes',4,'mn_rolExámenes','list_alt','4','AC'),(5,'Mod. pagos','Mis Pagos',5,'mp_misPagos','money','5','AC'),(6,'pgs. matricula','Pagos Matricula',33,'mp_matricula','attach_money','2','AC'),(7,'pgs. mensualidad','Pagos Por Mensualidad',25,'mp_mensualidad','attach_money','2','IN'),(8,'cuenta','Consultar Cuenta',25,'mp_cuenta','view_list','3','AC'),(9,'ifor. institucional','Información Institucional',9,'http://www.addis.edu.pe/','location_on','6','AC'),(10,'mod. contraseña','Modificar Contraseña',10,'mc_miPerfil','lock','7','AC'),(11,'mod.gestor notas','Mod. Gestor de Notas',11,'','library_books','1','AC'),(12,'asistencia','Registrar Asistencia',3,'ma_gestorAsistencia','list_alt','2','AC'),(13,'seg','Mod. Seguridad',13,'','security','1','AC'),(14,'usu','usuarios',13,'ms_usuarios','people','1','AC'),(15,'perf','perfiles',13,'ms_perfiles','how_to_reg','2','AC'),(16,'mod','modulos',13,'ms_modulos','list_alt','3','AC'),(17,'Mod. Proram Acad','Mod. Prog Academica',17,'','school','2','AC'),(18,'prog. acade.','programas academicos',17,'ma_gestorProgAcademicos','book','1','AC'),(19,'cur','cursos',17,'ma_gestorCursos','view_column','2','AC'),(20,'ci','ciclos',17,'ma_gestorCiclos','view_column','3','AC'),(21,'sem aca','semestre academico',17,'ma_gestorSemestres','view_list','4','AC'),(22,'secc','secciones',17,'ma_gestorSecciones','view_list','5','AC'),(23,'conf','Mod. Configuracion',23,'','settings','4','AC'),(24,'ini','inicio',23,'mc_gestorInicio','book','1','AC'),(25,'Mod. Pagos','Mod. de Pagos',25,'','money','4','AC'),(26,'pagos','Pagos',25,'mp_gestorPagos','list_alt','1','AC'),(27,'concep. pago','Concep. Pagos',25,'mp_conPagos','list_alt','5','IN'),(28,'report','Mod. Reportes',28,NULL,'star','6','AC'),(29,'Notas','Reporte Notas',28,'mr_reporteNotas','book','1','AC'),(30,'Pagos','Reporte Pagos',28,'mr_reportePagos','book','2','AC'),(31,'Matricula','Reporte Matricula',28,'mr_reporteMatricula','book','3','AC'),(32,'Gest. notas','Gestionar Notas',11,'mn_gestorNotas','list_alt','1','AC'),(33,'Matricula','Mod.Matricula',33,'','list_alt','8','AC'),(34,'Registrar Matricula','Registrar Matricula',33,'mm_gestorMatricula','list_alt','1','AC');
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas`
--

DROP TABLE IF EXISTS `notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notas` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL,
  `id_ciclo` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `promedio` decimal(4,2) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_nota`,`id_alumno`),
  KEY `fk_notas_alumnos1_idx` (`id_alumno`),
  CONSTRAINT `fk_notas_alumnos1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas`
--

LOCK TABLES `notas` WRITE;
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
INSERT INTO `notas` VALUES (12,3,1,30,18.00,'2019-05-11 00:00:00'),(13,3,1,32,15.00,'2019-05-11 00:00:00'),(14,3,1,33,18.00,'2019-05-11 00:00:00'),(15,3,1,35,13.00,'2019-05-11 00:00:00'),(16,4,1,30,10.00,'2019-05-11 00:00:00'),(17,4,1,32,16.00,'2019-05-11 00:00:00'),(18,4,1,33,20.00,'2019-05-11 00:00:00'),(19,4,1,35,18.00,'2019-05-11 00:00:00'),(20,5,1,30,13.00,'2019-05-11 00:00:00'),(21,6,1,32,15.00,'2019-05-11 00:00:00'),(22,6,1,33,18.00,'2019-05-11 00:00:00'),(23,6,1,35,20.00,'2019-05-11 00:00:00'),(24,7,1,30,16.00,'2019-05-11 00:00:00'),(25,7,1,32,19.00,'2019-05-11 00:00:00'),(26,8,1,35,20.00,'2019-05-11 00:00:00'),(27,8,1,32,15.00,'2019-05-11 00:00:00'),(28,9,1,30,16.00,'2019-05-11 00:00:00'),(29,9,1,33,15.00,'2019-05-11 00:00:00'),(30,10,1,33,20.00,'2019-05-11 00:00:00'),(31,10,1,31,6.60,'2019-05-11 00:00:00'),(32,11,1,33,16.00,'2019-05-11 00:00:00'),(33,12,1,32,15.00,'2019-05-11 00:00:00'),(34,12,1,35,16.00,'2019-05-11 00:00:00'),(35,13,1,32,16.00,'2019-05-11 00:00:00'),(36,13,1,33,18.00,'2019-05-11 00:00:00'),(37,14,1,30,20.00,'2019-05-11 00:00:00'),(38,15,1,32,5.00,'2019-05-11 00:00:00'),(39,15,1,30,15.00,'2019-05-11 00:00:00'),(40,15,1,33,16.00,'2019-05-14 00:00:00'),(41,16,1,30,17.00,'2019-05-14 00:00:00'),(42,16,1,33,20.00,'2019-05-14 00:00:00'),(43,17,1,35,20.00,'2019-05-14 00:00:00'),(44,17,1,30,15.00,'2019-05-14 00:00:00'),(45,18,1,35,18.00,'2019-05-15 00:00:00'),(46,18,1,32,14.00,'2019-05-15 00:00:00'),(47,19,1,30,15.00,'2019-05-01 00:00:00'),(48,19,1,32,19.00,'2019-05-15 00:00:00'),(49,20,1,30,17.00,'2019-05-15 00:00:00'),(50,20,1,32,18.00,'2019-05-15 00:00:00'),(51,21,1,30,15.00,'0201-05-15 00:00:00'),(52,21,1,32,16.00,'2019-05-15 00:00:00'),(53,22,1,30,15.00,'2019-05-15 00:00:00'),(54,22,1,33,14.00,'2019-05-15 00:00:00'),(55,23,1,35,18.00,'2019-05-15 00:00:00'),(56,23,1,33,17.00,'2019-05-15 00:00:00'),(57,24,1,30,14.00,'2019-05-15 00:00:00'),(58,24,1,30,18.00,'2019-05-15 00:00:00'),(59,25,1,30,19.00,'2019-05-15 00:00:00'),(60,25,1,32,15.00,'2019-05-15 00:00:00'),(61,26,1,30,17.00,'2019-05-15 00:00:00'),(62,26,1,33,18.00,'2019-05-15 00:00:00'),(63,27,1,30,14.00,'2019-05-15 00:00:00'),(64,27,1,32,17.00,'2019-05-15 00:00:00'),(65,28,1,30,14.00,'2019-05-15 00:00:00'),(66,28,1,30,18.00,'2019-05-15 00:00:00'),(67,5,1,32,20.00,'2019-05-21 00:00:00'),(68,5,1,33,20.00,'2019-05-21 00:00:00'),(69,5,1,35,20.00,'2019-05-21 00:00:00'),(70,113,1,30,NULL,'2019-05-22 00:00:00');
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagante`
--

DROP TABLE IF EXISTS `pagante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagante` (
  `id_pagante` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `apellPaterno` varchar(30) DEFAULT NULL,
  `apellMaterno` varchar(30) DEFAULT NULL,
  `dni` char(8) DEFAULT NULL,
  PRIMARY KEY (`id_pagante`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagante`
--

LOCK TABLES `pagante` WRITE;
/*!40000 ALTER TABLE `pagante` DISABLE KEYS */;
INSERT INTO `pagante` VALUES (1,NULL,NULL,NULL,'74366692');
/*!40000 ALTER TABLE `pagante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT,
  `id_cuenta` int(11) NOT NULL,
  `monto_pagado` varchar(45) DEFAULT NULL,
  `monto_deuda` varchar(45) DEFAULT NULL,
  `nBoleta` varchar(45) DEFAULT NULL,
  `fecha_registro` varchar(45) DEFAULT NULL,
  `dni_pagante` varchar(45) DEFAULT NULL,
  `nombrePagante` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_pago`,`id_cuenta`),
  KEY `fk_pagos_deuda1_idx` (`id_cuenta`),
  CONSTRAINT `fk_pagos_deuda1` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta` (`id_cuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2710 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
INSERT INTO `pagos` VALUES (2707,18,'30','0','1','2019-06-06','48213691','juan zapata');
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pariente`
--

DROP TABLE IF EXISTS `pariente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pariente` (
  `id_pariente` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellPaterno` varchar(20) DEFAULT NULL,
  `apellMaterno` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `id_parentesco` int(11) NOT NULL,
  PRIMARY KEY (`id_pariente`,`id_parentesco`),
  KEY `fk_pariente_tipo_parentesco1_idx` (`id_parentesco`),
  CONSTRAINT `fk_pariente_tipo_parentesco1` FOREIGN KEY (`id_parentesco`) REFERENCES `tipo_parentesco` (`id_parentesco`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pariente`
--

LOCK TABLES `pariente` WRITE;
/*!40000 ALTER TABLE `pariente` DISABLE KEYS */;
/*!40000 ALTER TABLE `pariente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `descor` varchar(25) DEFAULT NULL,
  `deslar` varchar(50) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfiles`
--

LOCK TABLES `perfiles` WRITE;
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
INSERT INTO `perfiles` VALUES (1,'EST','ESTUDIANTE','AC'),(2,'DCT','DOCENTE','AC'),(3,'ADM','ADMINISTRADOR','AC'),(24,'APD','APODERADO','AC'),(25,'DEMO','DEMO','AC'),(26,'SEG','SEGURIDAD','AC');
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfiles_modulos`
--

DROP TABLE IF EXISTS `perfiles_modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfiles_modulos` (
  `id_perfil` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  PRIMARY KEY (`id_perfil`,`id_modulo`),
  KEY `fk_perfiles_has_modulos_modulos1_idx` (`id_modulo`),
  KEY `fk_perfiles_has_modulos_perfiles1_idx` (`id_perfil`),
  CONSTRAINT `fk_perfiles_has_modulos_modulos1` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_perfiles_has_modulos_perfiles1` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfiles_modulos`
--

LOCK TABLES `perfiles_modulos` WRITE;
/*!40000 ALTER TABLE `perfiles_modulos` DISABLE KEYS */;
INSERT INTO `perfiles_modulos` VALUES (1,1),(1,2),(1,5),(1,9),(1,10),(2,3),(2,9),(2,10),(2,11),(3,9),(3,10),(3,13),(3,17),(3,23),(3,25),(3,33),(24,4),(24,9);
/*!40000 ALTER TABLE `perfiles_modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(45) DEFAULT NULL,
  `ape_paterno` varchar(45) DEFAULT NULL,
  `ape_materno` varchar(45) DEFAULT NULL,
  `dni` char(8) DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `fech_nacimiento` date DEFAULT NULL,
  `id_tpersona` int(11) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `distrito` varchar(100) DEFAULT NULL,
  `provincia` varchar(100) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `nCelular` char(9) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_persona`,`id_tpersona`),
  KEY `fk_persona_tipo_persona1_idx` (`id_tpersona`),
  CONSTRAINT `fk_persona_tipo_persona1` FOREIGN KEY (`id_tpersona`) REFERENCES `tipo_persona` (`id_tpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=806 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (3,'Jhon Alexander','Alvitrez','Quispe','78456123','M','1999-10-08',3,'ms.O lt.16-b Mancahy','Pachacamac','Lima','Lima','923564178','leoperez@gmail.com','AC'),(4,'Arturo','Medina','Rojas','95647812','M','1997-05-09',2,'mz.O lt.16-b - Manchay','Pachacamac','Lima','Lima','985476123','fidelcartolin@gmail.com','AC'),(7,'Jenny Liseth','AUCCAPUMA','TENIENTE',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(8,'Jahayra Marjorie','BACILIO ','LUQUE',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(9,'Esmeralda','CANCHARI','ALTAMIRANO',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(10,'Ericka Rosmery','DE LA CRUZ',' LOPEZ',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(11,'Hector Fabian','FLORES','HUISA','12345678','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(12,'Ely','GARCIA','HUAMAN',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(13,'Florcita Benina','HUISA','FLORES',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(14,'Yeslin Claudia ','JORGE','MANDUJANO','48213691','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(15,'Carmen','LLACCTA','CURO',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(16,'Luz Clarita','MENDEZ','PILLACA',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(17,'Roxana','SALAS',' SICHA',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(18,'Jhonatan','YAURI',' HUINCHO',NULL,'M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(19,'Yuliza','CARRERA','ARIAS',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(20,'Yessela','GARCIA ','GUERRERO',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(21,'Jhennifer Melissa','GOMES',' HUAMAN',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(22,'Angela','HUAYANA','NAVEROS',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(23,'Brucelee Wilson ','INGA',' EVANGELISTA',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(24,'Alina Alexandra ','LEON','JORGE',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(25,'Isabel Milagros','MUÑOZ','FLORES',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(26,'Edith','OCHOA','ALLCCARIMA',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(27,'Rosa Yaneli','OJEDA ',' FERNANDEZ',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(28,'Mirtha Erika','QUISPE','PAITA',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(29,'Merly ','RIVERA','HUAMAN',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(30,'Fiorella Noelia','RODRIGUEZ',' FERRER',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(31,'Jenny Joselyn','TACUCHI',' ESPINAL',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(32,'Diana','CLAUDIO','SIMON',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(33,'Karla Gissela ','ACOSTA','PEÑA',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(34,'Beatriz','ALVARADO',' VILLAZANA',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(35,'Norma Tatiana','ARTICA','ROSALES',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(36,'Sofia Jackeline','CHAVEZ','FERRIEL',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(37,'Isamar Nancy','CHOQUE','DELGADO',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(38,'Edith Leonella','CHURAMPI',' ROSALES',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(39,'Socorro del Pilar','CONCHA','HUACHEZ',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(40,'Enohe','GUERRERO','JIMENEZ',NULL,'M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(41,'Sheyla  Edith','GOZAR','ZEVALLOS',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(42,' Katy Lurdes','HUAMANI','TITO',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(43,'Clar Kent','HUANAQUIRI ','CASTRO',NULL,'M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(44,'Gleimy','HEREDIA','PEREZ',NULL,'M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(45,'Yoli Mariluz','JAVIER','SUNI',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(46,'Mitchael Brenda','MAMANI','TICONA',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(47,'Angel Luis','MATOS',' URRUTIA',NULL,'M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(48,' Anabel Anali','SALLO ',' RAMOS',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(49,'Diober Wilder','SANTA CRUZ','CENA',NULL,'M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(50,'Layde Laura','USCATA',' PAREDES',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(51,'Robert Fran','YAÑAC','PARIONA',NULL,'M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(52,'Luis Demar','ZABALETA ','DIAZ',NULL,'M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(53,'Estefani','ARCHE','HUARCAYA',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(54,'Lisbeth Yanina','ARDILES','MAUTINO',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(55,'Judith Soledad','CHIPANA','PEREZ',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(56,' Luis Angel','FELIPE','BALDEON',NULL,'M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(57,'Maria  Rosa','GALA','TAIPE',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(58,'Ruben','GALA','TAIPE',NULL,'M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(59,'Edelmira Roxana','GARCIA','CASTILLO',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(60,'Angie Jahayra','GONZALES','SANCHEZ',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(61,'Vadan shulyn','INGA','EVANGELISTA',NULL,'M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(62,'Yino','MEDINA','LLOCCLLA',NULL,'M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(63,'Gustavo William','RICCE','HIDALGO',NULL,'M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(64,'Susana','RIOS','SALAZAR',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(65,'Susan Nelida','ZEVALLOS','LANDA',NULL,'F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(66,'Jhon Alexander','ALVITRES','QUISPE','48213691','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(67,'Jorge Rolando','AREVALO','HUANIO','76868759','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(68,'Medalit','BANCES','UBILLUS','76654204','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(69,'Carmen Doris','CASTILLO','PEÑA','74493389','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(70,' Maria Orfelinda','CHAQUILA','PEREZ','72532827','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(71,'Vanesa','CLAUDIO','ROJAS','72268440','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(72,'Natalia','HUAMANI','URBINA','75157474','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(73,'Tatiana','LEVI','ANIBAL','62356915','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(74,'Samuel','MARIN','REYES','60728315','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(75,'Alex','NAPO','SANTOS','61577300','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(76,' Kenneth Joseph','OYOLA','CAVERO','76927756','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(77,'Guilver','PINEDO','RENGIFO','77576975','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(78,'Kiler','PINEDO','RENGIFO','63741194','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(79,'Elton Joseph','PONCE','ZARATE','72528313','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(80,'Bris Marian','RIBEYRO','MAYNAS','77061496','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(81,' Jazmin Esmeralda','ACEVEDO','UCHUPI','71351321','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(82,' Sandivel','BARBARAN','VARGAS','72663744','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(83,'Gianella Erzibet','CUIPA','CERON','75431658','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(84,'Cirilo','DE LA CRUZ','VELA','72288567','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(85,'Joseph Franccezco','FLORES','MATIAS','75344129','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(86,'Andrey Lenin','GREGORIO','RAMOS','71935177','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(87,'Cleidy','HUALLPA','TAPARA','74285101','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(88,'Roly','PRADO','GARAMENDI','70543346','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(89,'Jery Jackeline','RODRIGUEZ','GONZALES','76669173','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(90,'Jose Eduardo','SAAVEDRA','PICHIRRI','72274116','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(91,'Eva','SANTOS','VILLANUEVA','74221605','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(92,'Diego Kenny','TELLO','ESPIRITU','72243370','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(93,'Yoni','TORRES','AMBROSIO','71728572','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(94,'Juan Carlos','TRIGOSO','KIAK','77215346','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(95,'Josabet','VASQUEZ','RAMIREZ','72247131','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(96,'Alcides','ALEGRIA','VENTURA','76195136','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(97,'Merlyn Clotilde','ALVARO','PARCO','71968758','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(98,'Maria Isabel','ARIAS','RAFAEL','71787198','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(99,'Zoila Flor Hiris','CAMARGO','SURCO','63255908','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(100,'Beatriz','CAMPOMANES','LUDEÑA','77329535','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(101,'Jhanira Danitza','CANO','COLACHAGUA','71027064','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(102,'Ficol Victor','CESPEDES','CIENFUEGOS','76837237','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(103,'Waldir Mario','CONDOR','MORI','74998985','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(104,'Evelyn Candy','COSME','FIERRO','76673617','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(105,' Richard','GARCIA','PALACIOS','72635975','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(106,'Daniela Karol','HUAYLLANI','CARDENAS','75412577','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(107,'Yesenia Yobana','JUAN DE DIOS','ALMERCO','74423233','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(108,' Fiorela','PIZARRO','ESPINOZA','71824047','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(109,'Sandra Isabelita','QUISPE','QUISPE','75428036','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(110,'Rosalinda Yovana','RIVAS','CARHUANCHO','75189943','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(111,'Carlos Alberto','TOMAS','MATIRI','60373325','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(112,' Mesac','USCAMAYTA','TUPALAYA','75908087','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(113,'Jhonnatan','VELA','VALDERRAMA','74493872','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(114,'Yon Fred','VEGA','RAMOS','71913151','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(115,'Lesly Edith','YATA','FRANCO','73619310','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(116,'Ruth Maria','ALBURQUEQUE','GUARDADO','75491473','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(117,'Maria Consuelo','ALDEAN','CORREA','72509659','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(118,'Victor Alejandro','ALEMAN','PORRAS','70902585','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(119,'Yoseline Petronila','ARRUNATEGUI','DEL ROSARIO','75342906','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(120,' Nehemias','CUBAS','SANCHEZ','76267780','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(121,'Nathaly Iraida','DE LA ROCA ',' TINOCO','74026869','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(122,'Maria Yuliza','GARCIA',' TANDAZO','76002354','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(123,' Maricela Elizabeth','HUAMAN','ALVAREZ','72523743','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(124,'Fidel','HUAMAN','YAJAHUANCA','72277341','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(125,' Kary Yulitza','HUANCAS','PADILLA','72532324','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(126,'Alex Vidarte','PARRA','BERNA','72509765','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(127,'Ana Paula','REYES','BAUTISTA','71129379','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(128,'Karol Adriana','RODRIGUEZ','TRIPUL','76203900','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(129,'Katya','ROSILLO','MORAN','71061866','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(130,'Erinson Jhosimar','SAAVEDRA','LAMA','74398513','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(131,'Isaac Alexis','SAAVEDRA','RUIZ','72855959','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(132,'Fredil','SANTOS','CUEVA','77481365','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(133,' Mary','SANTOS','CUEVA','72532836','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(134,'Kenia Raquel','SILVA','PORTERO','75373005','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(135,' Laumer','TOCTO','YAJAHUANCA','75422522','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(136,'Debora Gyanela','ZAPATA','FARROÑAN','76096245','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(142,'Julio Cesar','CHIRA','AQUINO','47402841','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(143,' Lisbeth','DE LA CRUZ ','ORTIZ','71807204','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(144,'Yesmel Kevin','HUAMAN','SANTOS','77100268','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(145,'Tania','OCHOA','HUAMANI','70575873','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(146,'Sonia Kelly','PANIURA','DONGO','77021452','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(147,'Elizabeth','PEÑA','SAUÑE','76322025','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(148,'Megan','PINEDA','MAYHUA','73048178','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(149,'Lourdes','QUISPE','HUARACA','74909633','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(150,'Johany','QUISPE','RAMIREZ','76389269','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(151,'Marisol Yobana','QUISPE','SOPANTA','75000910','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(152,'Noe','ROMAN','GARCIA','71580263','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(153,'Kevin','ROMERO','CACERES','74646409','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(154,'Lizbeth','TELLO','VELASQUEZ','70598211','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(155,'Petronila Ines','VASQUEZ','GUTIERREZ','76172408','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(156,'GIOVANA MICAELA','ALLCCA','GUERRA','48750441','F',NULL,1,'ADMINISTRACION-E',NULL,NULL,NULL,NULL,NULL,'AC'),(157,'JAVIER HILARIO','CAPCHA','SOLIS','74732285','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(158,'FRANK ANDERXON','CARMONA',' MEDINA','74734733','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(159,'DIANA CAROLINA','CCAHUANA','PERALTA','74688878','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(160,'MARIA FERNANDA','CHARAHUAYTA','TAYPE','77481210','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(161,'RUBEN RONALDO','COLQUE',' PIÑE','76754594','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(162,'MARCO ANTONIO','DE LA CRUZ','YUYALI','72299790','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(163,'RUBEN','DIAZ','SIHUI','75626183','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(164,'PAULA KAREN','FLORES','PARI','73276598','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(165,'FRANS VIDAL','GARCIA','RIVAS','70269016','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(166,'RICARDO MANUEL','GONZALES','FLORES','75279028','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(167,'NEPTALI','LETONA','LETONA','60407743','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(168,'KAREN MILAGROS','MEDRANO',' DURAN','74482477','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(169,'LUIS ALBERTO','ORE','MONTES','46671619','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(170,'KATHERINE ELIZABETH','PIZARRO','VILLA','47345835','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(171,'RUTH ALINA','QUIQUIA','MELO','73048940','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(172,'ALEX','QUISPE','RAMIREZ','70892505','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(173,'REYNA YOSELYN','RAMIREZ','CARDENAS','77539622','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(174,'LUIS ALFREDO','RELAIZA','LLOCCLLA','73944990','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(175,'ANGEL MANUEL','RODAS','VERA','76594530','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(176,'JOSE ANTONIO','SALVADOR','BAEZ','78634723','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(177,'MARITZA MERVI','TAMINCHE','TANGOA','74476061','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(178,'CARLOS MOISES','VICTORIO','PUMA','77498482','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(179,'JAIME JHONATAN','ZAMORA','MISARAI','70776775','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(180,'FLOR DIANA','CASTRO','ESPINOZA','73089486','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(181,' GIOVANA MICAELA','ALZAMORA','CASTILLO','74366692','F',NULL,1,'ADMINISRCAION-A',NULL,NULL,NULL,NULL,NULL,'AC'),(182,'MIRYAM','BENDEZU','BERROCAL','46423844','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(183,'ANYELLA ALEXANDRA','CAMACHO','ARAMBULO','73442699','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(184,'VILMA AYDA','CANCHANYA','HUACHACA','71948589','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(185,'SANDREY JORDANA','CHAVEZ','SOLANO','74732176','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(186,'BEATRIZ','CLEMENTE','GASPAR','76853851','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(187,'ALEXANDRA ELVA','CRISTOBAL','GOMEZ','73674663','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(188,'NICOLE DENISSE','DERITO','ESPILLCO','81609132','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(189,'LUCILA','GOMEZ','HINOSTROZA','44862662','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(190,'MAYLYN CRISTINA','HUANACO',' PRADO','78286017','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(191,'RUTH MIRIAM','HUILLCAIQUIPA','CHALLA','71756231','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(192,'CRISTIAN MARCOS','LLAMOCCA','GARCIA','48637459','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(193,'CAREN','LOPEZ',' PARIONA','75417428','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(194,'ELIAS','MENDOZA','ROSALES','75431754','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(195,'LIZETH YULIZA','MONTALVO','GARCIA','74467484','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(196,'YELSON RAUL','OSORIO','PALMA','77506367','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(197,'GUTMER IRENEO','PAREDES','HUACHACA','71949623','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(198,'ANGIE','PRADO','RODRIGUEZ','78286991','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(199,'NOEMI JESENIA','ROJAS',' GARCIA','41210444','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(200,'ROSARIO ESTHER','SAYAS','PILLACA','74849840','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(201,'THALIA KIARA','SIHUAY','RENGIFO','72710721','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(202,'MARIA CLARA','VICENTE','SANDOVAL','47675219','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(203,'PRAXIS MARTIN','AREVALO','JUAREZ','75984779','M',NULL,1,'ADMINISTRACION-B',NULL,NULL,NULL,NULL,NULL,'AC'),(204,'YANETT','BENDEZU','BERROCAL','44903418','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(205,'JOSE LUIS','CAMPOS','BRAVO','75343599','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(206,'ROSI JHERALDI','CASTILLO','SAMPERTEGUI','75684958','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(207,'SANTA ANDREA','COTACHE','LAZARO','60281854','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(208,'CRISTIAN RONY','DELGADO','BUSTAMANTE','74448962','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(209,'SANDY LUZ','ESPEZA','CASTILLO','75890033','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(210,'JUDITH ADOLFINA','HOYOS','ASPAJO','42082047','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(211,'ROSA ITALA','HUATTA','NARVAEZ','10705725','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(212,'KAREN','LOAYZA','CHAVEZ','71863457','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(213,'LUZ MILENA','MENDOZA','RUIZ','74838039','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(214,'RAUL JONATHAN','NARVASTA','SANTIAGO','70582202','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(215,'ELVIS','PACHECO','POMARINO','74837991','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(216,'ROCIO','PAUCAR','MEZA','42435589','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(217,'CARMEN','RIVERA','ALEGRIA','48411049','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(218,'ANAIS MARGOT','SALAZAR','VARGAS','47451244','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(219,'YENNY MARIBEL','SICHA','HUARHUACHI','44315815','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(220,'JESUS MANUEL','SOPAN','SALAZAR','72102881','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(221,'LESLY GIANELLA','TORRICHELLI','CHOQUE','74291574','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(222,'ADAY FELICIANA','VELARDE','LOPEZ','70802333','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(223,'HIBER','VILLALOBOS','ARTIAGA','47071448','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(224,'MIRIAM','LLACUA','ROJAS','71106859','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(225,'ERIKA ADELINA','ALEGRIA','CRISPIN','76323286','F',NULL,1,'ADMINISTRACION-C',NULL,NULL,NULL,NULL,NULL,'AC'),(226,'JHOAN JHERSON','ARIAS','NINAHUAMAN','75434364','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(227,'ADRIANA MILAGROS','CABANA','SANTOS','72903108','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(228,'PRISCILA SOLEDAD','CAMPOS','POZO','71628741','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(229,'ISIS AMRU','CCANTO','NUÑEZ','76839336','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(230,'DIANA LIZET','CHAVEZ','HUAPAYA','74635967','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(231,'FEBE ESTHER','CURO','ROJAS','75934039','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(232,'YERSI','DELGADO','MONTENEGRO','75229000','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(233,'FELIX RODRIGO','ESPINOZA','MARTINEZ','75900859','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(234,'KEYLA YAMILY','FELIX','HUALCAS','77124537','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(235,'CARLOS MARTIN DE JESUS','GARCIA','PALOMARES','75272197','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(236,'KARIN YESENIA','GUEVARA','SAUCEDO','71803936','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(237,'LOURDES CARMEN','INGA','ASTOCHADO','70786924','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(238,'MELANI IDANIA','LEON','JORGE','76722606','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(239,'LUZ MARINA','MAMANI','CCUITO','76241779','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(240,'JORGE ALEXANDER','MAYORGA','SILUPU','77027553','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(241,'EDGARD JESUS','MENDOZA','FARFAN','77670332','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(242,'OSUMI JASMIN','OTIVO','CHACMANA','74993367','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(243,'NANCY JULIA','PERCA','PERALTA','45772527','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(244,'FLOR MARILUZ','PILLACA','DIAZ','42461637','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(245,'ALEXANDER MANUEL','QUIJANDRIA','JIMENEZ','74075489','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(246,'KIMBERLY LIZETH','RAMIREZ','MEZA','72852116','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(247,'GLADYS ANGELA','RIVEROS','ORDOÑEZ','72502501','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(248,'JAMINA ESCARLIT','ROMERO','MARZANO','60560935','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(249,'WENDY PAOLA','SOTELO','SANGAY','73133381','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(250,'DUBERLY','VILLALOBOS','JARA','74894718','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(251,'KEDIN LINCEN','ANCULLE','SIERRA','74972902','M',NULL,1,'ADMINISTRACION-D',NULL,NULL,NULL,NULL,NULL,'AC'),(252,'YULISA','BUSTINZA','CASTILLO','75734095','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(253,'MARCO ANTONIO','CAJAMARCA','CERAS','47577342','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(254,'ZOILA GIULIANA','CARLOS','CALDAS','73748357','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(255,'RAYDA','CCOHUA','PUCYURA','77569970','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(256,'ADELAIDA ROSMERI','CRUZ','HINOSTROZA','76593419','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(257,'RENE','DE LA CRUZ','RAMOS','44098678','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(258,'ALEX DANIEL','ESPEJO','BERROSPI','74849795','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(259,'CINTHIA ISABEL','ESTEBAN','HUAMAN','75113105','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(260,'XIOMARA HAYDEE','FLORES','TRINIDAD','76747004','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(261,'JOSE ENRIQUE','GILBONIO','TORRES','73354478','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(262,'NOEMI','HUAMAN','CHALLCO','44780336','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(263,'ANA CRISTINA','IPARRAGUIRRE','LUNA','75245494','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(264,'CINTHYA','LIVIA','CALDERON','76276760','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(265,'MARIANA VERONICA','MAURICIO','UGARTE','77167616','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(266,'DILMER YON','MEJIA','TARRILLO','74662493','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(267,'ANASU NOELIA','MENESES','FUERTE','75888891','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(268,'ESTEFANY','PALMA','TIPO','61054971','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(269,'ANTHONY GABRIEL','PILLACA','CHUMBE','75518726','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(270,'WILLIAM RUPERTO','POMA','GUTIERREZ','76579491','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(271,'YUMIRA PILAR','RAMIREZ','ALARCON','74096941','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(272,'DAVID EDWAR','REATEGUI','MUÑOZ','74376252','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(273,'ABRAHAM MISAEL','RODRIGUEZ','AYMA','77528305','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(274,'JHUNELI','SEGURA','RAMOS','70207481','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(275,'JHON RUSO','SURICHAQUI','HUAMANI','75417411','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(276,'JOHN PETER','TOLENTINO','ESPINOZA','46203181','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(277,'CARLOS MANUEL','CABRERA','PRUDENCIO','76287967','M',NULL,1,'ADMINSITRACION-F',NULL,NULL,NULL,NULL,NULL,'AC'),(278,'MARIA DEL PILAR','CARHUACUSMA','CCOLQUE','74837930','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(279,'THALIA YOLANDA','CASTRO','ROMERO','76008821','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(280,'JHORGHINO JUNNIOR','CERCEDO','MARTIN','72022521','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(281,'VANESSA KETTY','CHOQUE','YARANGA','46567346','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(282,'KATHERIN  ANDREA','DAMAS','MANCCO','74754372','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(283,'JHON MAYCOL','DIAZ','SANCHEZ','71590906','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(284,'JIAN PIERRE','FLOREZ','PAREDES','74484246','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(285,'JOAQUIN','GARCIA','UCHUPE','75982167','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(286,'GABRIEL ANTONIO','LACHIRA','HUILLCAHUARI','72094257','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(287,'ANTONIO FELICIANO','LIZANA','SALAZAR','70796190','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(288,'MAURA TEOFILA','MEDINA','HUAYHUA','75807887','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(289,'DANIEL CRISTIAN','MENDIETA','QUISPE','79381707','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(290,'BRAYAN','PEREZ','HERRERA','71134848','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(291,'PERCY ANDRES','PURACA','HERMITAÑO','75279091','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(292,'MAX LEONARDO SEBASTIAN','QUISPE','MEDINA','75368850','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(293,'HECTOR','RAMIREZ','AGUILAR','44865873','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(294,'JHON DANY','RAMIREZ','LLACUA','76935336','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(295,'YIBET INES','REYES','MANDUJANO','44852107','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(296,'SARA SOLEDAD','SILVA','MARTINEZ','46163604','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(297,'DARCY MIRELLY','ABAD','VASQUEZ','75204690','F',NULL,1,'ADMINISTRACION G',NULL,NULL,NULL,NULL,NULL,'AC'),(298,'JUAN CARLOS','ARIAS','ESTEBAN','74877778','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(299,'CHRISTIAN JORDI','CASTRO','ROMERO','76663016','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(300,'ABRAM YEXUAN','CARMONA','CERAZO','70372515','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(301,'MITSY LISLY','CHOCCE','QUINCHO','74032554','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(302,'ALEXSANDRA LUCIA','CLEMENTE','ROCA','73191419','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(303,'YESSICA','COLOS',' DE LA CRUZ','(NULL100','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(304,'ALDAIR','ESPINOZA','VILLA','74331757','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(305,'KIELBIN','EUGENIO','MENDOZA','72356720','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(306,'EULER OLIVER','GARCIA','CRUZ','72288275','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(307,'JAIME BERNABE','LAPA','MARCAS','74499676','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(308,'MARIANA','LEON','RUIZ','48751599','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(309,'SALOME VALENTINA','LEON','SOLORZANO','76443451','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(310,'ODAR BRANDI','MOZONBITE','BOCANEGRA','75172403','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(311,'JEAN CARLOS','PACHECO','ESPINOZA','74890739','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(312,'MISAEL','PAREDES','DAZA','71615475','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(313,'LUIS ENRIQUE','PEREZ','LOPEZ','74381692','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(314,'GISET ALMENDRA','PEREZ','NAJARRO','74589254','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(315,'VALERIA','QUIÑONES','INGA','71731118','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(316,'ORFELINA','RAMIREZ','PEREZ','46018472','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(317,'JUDITH MAYUMI','RAMOS','PABLO','48065954','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(318,'MARI CARMEN','RIVEROS','ARECHE','72283409','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(319,'ANAYELY REBECA','ROJAS','MORALES','74732338','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(320,'MILAGROS PAOLA','RONDON','GONZALES','73682089','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(321,'ROSA SILVIA','SANCHEZ','GUADALUPE','75237140','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(322,'CAMILA LIANA','SOTO','CHACON','71623947','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(323,'BENARDINO','VELASQUEZ','TENORIO','28459864','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(324,'LUZ MERY','VILLANUEVA','CASTRO','45204270','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(325,'DIANA','YAURI','CAMARENA','43464595','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(326,'ANTHONY BRAJHAN','TORIBIO','CUYUBAMBA','77817015','M',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(327,'ANGHIE DEL ROSARIO','YNGAROCA','COLLAS','71256999','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(328,'RUTH ARACELLY','ZAMORA','MISARAI','70776774','F',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'AC'),(800,'Alfredo','Pimentel','Huacachimo','19268230','M',NULL,2,NULL,NULL,NULL,'Lima',NULL,NULL,'AC'),(801,'Nestor Arturo','Medina','Valenzuela',NULL,'M',NULL,2,NULL,NULL,NULL,'Lima',NULL,NULL,'Ac'),(802,'Victor Martin','Silva','Viera',NULL,'M',NULL,2,NULL,NULL,NULL,'Lima',NULL,NULL,'AC'),(803,'Jorge Aurelio','Aguilar','Valenzuela',NULL,'M',NULL,2,NULL,NULL,NULL,'Lima',NULL,NULL,'AC'),(804,'Ali','Huaman','Paucar',NULL,'M',NULL,2,NULL,NULL,NULL,'Lima',NULL,NULL,'AC'),(805,'Roger','Durand','Chacon',NULL,'M',NULL,2,NULL,NULL,NULL,'Lima',NULL,NULL,'AC');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promedio_final`
--

DROP TABLE IF EXISTS `promedio_final`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promedio_final` (
  `id_promdeio` int(11) NOT NULL,
  `id_alumno` varchar(45) DEFAULT NULL,
  `id_ciclo` varchar(45) DEFAULT NULL,
  `id_seccion` varchar(45) DEFAULT NULL,
  `año` varchar(45) DEFAULT NULL,
  `nota` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_promdeio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promedio_final`
--

LOCK TABLES `promedio_final` WRITE;
/*!40000 ALTER TABLE `promedio_final` DISABLE KEYS */;
/*!40000 ALTER TABLE `promedio_final` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rechazopostulante`
--

DROP TABLE IF EXISTS `rechazopostulante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rechazopostulante` (
  `id_rechazoPost` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `detalle` text DEFAULT NULL,
  `id_evaluacionPost` int(11) NOT NULL,
  PRIMARY KEY (`id_rechazoPost`,`id_evaluacionPost`),
  KEY `fk_rechazoPostulante_evaluacionPostulate1_idx` (`id_evaluacionPost`),
  CONSTRAINT `fk_rechazoPostulante_evaluacionPostulate1` FOREIGN KEY (`id_evaluacionPost`) REFERENCES `evaluacionpostulante` (`id_evaluacionPost`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rechazopostulante`
--

LOCK TABLES `rechazopostulante` WRITE;
/*!40000 ALTER TABLE `rechazopostulante` DISABLE KEYS */;
/*!40000 ALTER TABLE `rechazopostulante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `renovacion_matricula`
--

DROP TABLE IF EXISTS `renovacion_matricula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `renovacion_matricula` (
  `id_renovacionMat` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL,
  `id_semestre` int(11) DEFAULT NULL,
  `id_ciclo` int(11) DEFAULT NULL,
  `id_seccion` varchar(45) DEFAULT NULL,
  `cod_pago` varchar(45) DEFAULT NULL,
  `fecha` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_renovacionMat`,`id_alumno`),
  KEY `fk_renovacion_matricula_alumnos1_idx` (`id_alumno`),
  CONSTRAINT `fk_renovacion_matricula_alumnos1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `renovacion_matricula`
--

LOCK TABLES `renovacion_matricula` WRITE;
/*!40000 ALTER TABLE `renovacion_matricula` DISABLE KEYS */;
INSERT INTO `renovacion_matricula` VALUES (1,10,2,2,'2','002578',2019),(2,10,2,2,'2','002579',2019);
/*!40000 ALTER TABLE `renovacion_matricula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisitos`
--

DROP TABLE IF EXISTS `requisitos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisitos` (
  `id_requisito` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `archivo` text DEFAULT NULL,
  PRIMARY KEY (`id_requisito`,`id_persona`),
  KEY `fk_requisitos_persona1_idx` (`id_persona`),
  CONSTRAINT `fk_requisitos_persona1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisitos`
--

LOCK TABLES `requisitos` WRITE;
/*!40000 ALTER TABLE `requisitos` DISABLE KEYS */;
INSERT INTO `requisitos` VALUES (1,181,'administracion','administracion','administracion');
/*!40000 ALTER TABLE `requisitos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seccion`
--

DROP TABLE IF EXISTS `seccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seccion` (
  `id_seccion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_seccion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seccion`
--

LOCK TABLES `seccion` WRITE;
/*!40000 ALTER TABLE `seccion` DISABLE KEYS */;
INSERT INTO `seccion` VALUES (1,'A','AC'),(2,'B','AC'),(3,'ÚNICA','AC');
/*!40000 ALTER TABLE `seccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semestre`
--

DROP TABLE IF EXISTS `semestre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `semestre` (
  `id_semestre` int(11) NOT NULL AUTO_INCREMENT,
  `deslar` varchar(50) DEFAULT NULL,
  `descor` varchar(15) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_semestre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semestre`
--

LOCK TABLES `semestre` WRITE;
/*!40000 ALTER TABLE `semestre` DISABLE KEYS */;
INSERT INTO `semestre` VALUES (1,'2018 - ciclo 1 Marzo','2018 - I','AC'),(2,'2018 - ciclo 2 Agosto','2018 - II','AC'),(3,'2019 - ciclo 1 Marzo','2019 - I','AC'),(4,'2019 - ciclo 2 ','2019 - II','AC');
/*!40000 ALTER TABLE `semestre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_alumno`
--

DROP TABLE IF EXISTS `tipo_alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_alumno` (
  `id_talumno` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_talumno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_alumno`
--

LOCK TABLES `tipo_alumno` WRITE;
/*!40000 ALTER TABLE `tipo_alumno` DISABLE KEYS */;
INSERT INTO `tipo_alumno` VALUES (1,'BECA 18'),(2,'BECA PARROQUIA'),(3,'PAGANTE');
/*!40000 ALTER TABLE `tipo_alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_nota`
--

DROP TABLE IF EXISTS `tipo_nota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_nota` (
  `id_tNota` int(11) NOT NULL,
  `descor` varchar(45) DEFAULT NULL,
  `deslar` varchar(45) DEFAULT NULL,
  `porcentaje` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tNota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_nota`
--

LOCK TABLES `tipo_nota` WRITE;
/*!40000 ALTER TABLE `tipo_nota` DISABLE KEYS */;
INSERT INTO `tipo_nota` VALUES (1,'EP','EXAMEN PARCIAL',20),(2,'EF','EXAMEN FINAL',30),(3,'TF','TRABAJO FINAL',50);
/*!40000 ALTER TABLE `tipo_nota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_parentesco`
--

DROP TABLE IF EXISTS `tipo_parentesco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_parentesco` (
  `id_parentesco` int(11) NOT NULL,
  `parentesco` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_parentesco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_parentesco`
--

LOCK TABLES `tipo_parentesco` WRITE;
/*!40000 ALTER TABLE `tipo_parentesco` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_parentesco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_persona`
--

DROP TABLE IF EXISTS `tipo_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_persona` (
  `id_tpersona` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_persona`
--

LOCK TABLES `tipo_persona` WRITE;
/*!40000 ALTER TABLE `tipo_persona` DISABLE KEYS */;
INSERT INTO `tipo_persona` VALUES (1,'postulante'),(2,'docente'),(3,'administrativo'),(4,'apoderado');
/*!40000 ALTER TABLE `tipo_persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `intentos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`,`id_persona`),
  KEY `fk_usuarios_persona_idx` (`id_persona`),
  CONSTRAINT `fk_usuarios_persona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,11,'HFLORESH','12345','views/images/img-usuarios/usuario479.jpg','alumno123456@gmail.com','AC',NULL),(2,3,'ADMIN','12345','views/images/img-usuarios/usuario773.jpg','admin@gmail.com','AC',NULL),(3,4,'AMEDINAR','12345','views/images/img-usuarios/usuario261.jpg','docente@gmail.com','AC',NULL),(16,7,'JAUCCAPUMAT','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(17,8,'JBACILIOL','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(18,9,'ECANCHARIA','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(19,10,'EDELACRUZL','12345','views/images/img-usuarios/foto-defecto.jpg\r\n','alumno12345@gmail.com','AC',NULL),(20,12,'EGARCIAH','12345','views/images/img-usuarios/foto-defecto.jpg\r\n','alumno12345@gmail.com','AC',NULL),(21,13,'FHUISAF','12345','views/images/img-usuarios/foto-defecto.jpg\r\n','alumno12345@gmail.com','AC',NULL),(22,14,'YJORGEM','12345','views/images/img-usuarios/foto-defecto.jpg\r\n','alumno12345@gmail.com','AC',NULL),(23,15,'CLLACCTAC','12345','views/images/img-usuarios/foto-defecto.jpg\r\n','alumno12345@gmail.com','AC',NULL),(24,16,'LMENDEZP','12345','views/images/img-usuarios/foto-defecto.jpg\r\n','alumno12345@gmail.com','AC',NULL),(25,17,'RSALASS','12345','views/images/img-usuarios/foto-defecto.jpg\r\n','alumno12345@gmail.com','AC',NULL),(26,18,'JYAURIH','1345','views/images/img-usuarios/foto-defecto.jpg\r\n','alumno12345@gmail.com','AC',NULL),(27,19,'YCARRERAA','12345','views/images/img-usuarios/foto-defecto.jpg\r\n','alumno12345@gmail.com','AC',NULL),(28,20,'YGARCIAG','12345','views/images/img-usuarios/foto-defecto.jpg\r\n','alumno12345@gmail.com','AC',NULL),(29,21,'JGOMESH','12345','views/images/img-usuarios/foto-defecto.jpg\r\n','alumno12345@gmail.com','AC',NULL),(30,22,'AHUAYANAN','12345','views/images/img-usuarios/foto-defecto.jpg\r\n','alumno12345@gmail.com','AC',NULL),(31,23,'BINGAE','12345','views/images/img-usuarios/foto-defecto.jpg\r\n','alumno12345@gmail.com','AC',NULL),(32,24,'ALEONJ','12345','views/images/img-usuarios/foto-defecto.jpg\r\n','alumno12345@gmail.com','AC',NULL),(33,25,'IMUÑOZF','12345','views/images/img-usuarios/foto-defecto.jpg\r\n','alumno12345@gmail.com','AC',NULL),(34,26,'EOCHOAA','12345','views/images/img-usuarios/foto-defecto.jpg\r\n','alumno12345@gmail.com','AC',NULL),(35,27,'ROJEDAF','12345','views/images/img-usuarios/foto-defecto.jpg\r\n','alumno12345@gmail.com','AC',NULL),(36,28,'MQUISPEP','12345','views/images/img-usuarios/foto-defecto.jpg\r\n','\r\nalumno12345@gmail.com','AC',NULL),(37,29,'MRIVERAH','12345','views/images/img-usuarios/foto-defecto.jpg\r\n','alumno12345@gmail.com','AC',NULL),(38,30,'FRODRIGUEZF','12345','views/images/img-usuarios/foto-defecto.jpg\r\n','alumno12345@gmail.com','AC',NULL),(39,31,'JTACUCHIE','12345','views/images/img-usuarios/foto-defecto.jpg\r\n','alumno12345@gmail.com','AC',NULL),(40,32,'DCLAUDIOS','12345','views/images/img-usuarios/foto-defecto.jpg\r\n','alumno12345@gmail.com','AC',NULL),(41,66,'JALVITRESQ','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com\r\n','AC',NULL),(42,67,'JAREVALOH','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com\r\n','AC',NULL),(43,68,'MBANCESU','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com\r\n','AC',NULL),(44,69,'CCASTILLOP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(45,70,'MCHAQUILAP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com\r\n','AC',NULL),(46,71,'VCLAUDIOR','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com\r\n','AC',NULL),(47,72,'NHUAMANIU','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(48,73,'TLEVIA','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(49,74,'SMARINR','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(50,75,'ANAPOS','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(51,76,'KOYOLAC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com\r\n','AC',NULL),(52,77,'GPINEDOR','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(53,78,'KPINEDOR','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(54,79,'EPONCEZ','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(55,80,'BRIBEYROM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(56,81,'JACEVEDOU','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(57,82,'SBARBARANV','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(58,83,'GCUIPAC','	12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com\r\n','AC',NULL),(59,84,'CDELACRUZV','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com\r\n','AC',NULL),(60,85,'JFLORESM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(61,86,'AGREGORIOR','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(62,87,'CHUALLPAT','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(63,88,'RPRADOG','12345','views/images/img-usuarios/foto-defecto.jpg\r\n	','alumno12345@gmail.com','AC',NULL),(64,89,'JRODRIGUEZG','12345','views/images/img-usuarios/foto-defecto.jpg\r\n	','alumno12345@gmail.com\r\n','AC',NULL),(65,90,'JSAAVEDRAP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(66,91,'ESANTOSV','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com\r\n','AC',NULL),(67,92,'DTELLOE','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com\r\n','AC',NULL),(68,93,'YTORRESA','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com\r\n','AC',NULL),(69,94,'JTRIGOSOK','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com\r\n','AC',NULL),(70,95,'JVASQUEZR','12345    ','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com\r\n','AC',NULL),(71,96,'AALEGRIAV','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(72,97,'MALVAROP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(73,98,'MARIASR','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(74,99,'ZCAMARGOC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(75,100,'BCAMPOMANESL','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(76,101,'JCANOC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(77,102,'FCESPEDESC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(78,103,'WCONDORM','12345    ','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(79,104,'ECOSMEF','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(80,105,'RGARCIAP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(81,106,'DHUAYLLANIC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(82,107,'YJUANDEDIOSA','12345','views/images/img-usuarios/foto-defecto.jpg\r\n','alumno12345@gmail.com','AC',NULL),(83,108,'FPIZARROE','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(84,109,'SQUISPEQ','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(85,110,'RRIVASC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(86,111,'CTOMASM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(87,112,'MUSCAMAYTAT','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(88,113,'JVELAV','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com\r\n','AC',NULL),(89,114,'YVEGAR','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(90,115,'LYATAF','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(91,116,'RALBURQUEQUEG','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(92,117,'MALDEANC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(93,118,'VALEMANP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(94,119,'YARRUNATEGUIR','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(95,120,'NCUBASS','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(96,121,'NDELAROCAT','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(97,122,'MGARCIAT','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(98,123,'MHUAMANA','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com  ','AC',NULL),(99,124,'FHUAMANY','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(100,125,'KHUANCASP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(101,126,'APARRAB','12345    ','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(102,127,'AREYESB','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(103,128,'KRODRIGUEZT','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(104,129,'KROSILLOM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(105,130,'ESAAVEDRAL','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(106,131,'ISAAVEDRAR','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(107,132,'FSANTOSC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com    ','AC',NULL),(108,133,'MSANTOSC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(109,134,'KSILVAP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(110,135,'LTOCTOY','12345    ','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(111,136,'DZAPATAF','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com  ','AC',NULL),(112,142,'JCHIRAA','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(113,143,'LDELACRUZO','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(114,144,'YHUAMANS','12345','views/images/img-usuarios/foto-defecto.jpg\r\n	','alumno12345@gmail.com','AC',NULL),(115,145,'TOCHOAH','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(116,146,'SPANIURAD','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(117,147,'EPEÑAS','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(118,148,'MPINEDAM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(119,149,'LQUISPEH','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(120,150,'JQUISPER','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(121,151,'MQUISPES','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(122,152,'NROMANG','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(123,153,'KROMEROC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com  ','AC',NULL),(124,154,'LTELLOV','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com  ','AC',NULL),(125,155,'PVASQUEZG','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(126,156,'SALLCCAG','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(127,157,'JCAPCHAS','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(128,158,'FCARMONAM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(129,159,'DCCAHUANAP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com   ','AC',NULL),(130,160,'MCHARAHUAYTAT','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(131,161,'RCOLQUEP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com  ','AC',NULL),(132,162,'MDELACRUZY','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com','AC',NULL),(133,163,'RDIAZS','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(134,164,'PFLORESP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(135,165,'FGARCIAR','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(136,166,'RGONZALESF','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(137,167,'NLETONAL','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(138,168,'KMEDRANOD','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(139,169,'LOREM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(140,170,'KPIZARROV','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(141,171,'RQUIQUIAM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(142,172,'AQUISPER','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(143,173,'RRAMIREZC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(144,174,'LRELAIZAL','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(145,175,'ARODASV','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(146,176,'JSALVADORB','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(147,177,'MTAMINCHET','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(148,178,'CVICTORIOP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(149,179,'JZAMORAM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(150,180,'FCASTROE','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(151,181,'GALZAMORAC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(152,182,'MBENDEZUB','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(153,183,'ACAMACHOA','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(154,184,'VCANCHANYAH','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(155,185,'SCHAVEZS','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(156,186,'BCLEMENTEG','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(157,187,'ACRISTOBALG','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(158,188,'NDERITOE','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(159,189,'LGOMEZH','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(160,190,'MHUANACOP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(161,191,'RHUILLCAIQUIPAC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(162,192,'CLLAMOCCAG','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(163,193,'CLOPEZP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(164,194,'EMENDOZAR','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(165,195,'LMONTALVOG','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(166,196,'YOSORIOP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(167,197,'GPAREDESH','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(168,198,'APRADOR','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(169,199,'NROJASG','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(170,200,'RSAYASP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(171,201,'TSIHUAYR','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(172,202,'MVICENTES','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(173,203,'PAREVALOJ','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(174,204,'YBENDEZUB','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(175,205,'JCAMPOSB','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(176,206,'RCASTILLOS','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(177,207,'SCOTACHEL','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(178,208,'CDELGADOB','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(179,209,'SESPEZAC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(180,210,'JHOYOSA','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(181,211,'RHUATTAN','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(182,212,'KLOAYZAC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(183,213,'LMENDOZAR','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(184,214,'RNARVASTAS','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(185,215,'EPACHECOP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(186,216,'RPAUCARM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(187,217,'CRIVERAA','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(188,218,'ASALAZARV','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(189,219,'YSICHAH','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(190,220,'JSOPANS','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(191,221,'LTORRICHELLIC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(192,222,'AVELARDEL','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(193,223,'AVILLALOBOSH','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(194,224,'MLLACUAR','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(195,225,'EALEGRIAC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(196,226,'JARIASN','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(197,227,'ACABANAS','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(198,228,'PCAMPOSP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(199,229,'ICCANTON','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(200,230,'DCHAVEZH','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(201,231,'FCUROR','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(202,232,'YDELGADOM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(203,233,'FESPINOZAM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(204,234,'KFELIXH','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(205,235,'CGARCIAP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(206,236,'KGUEVARAS','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(207,237,'LINGAA','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(208,238,'MLEONJ','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(209,239,'LMAMANIC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(210,240,'JMAYORGAS','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(211,241,'EMENDOZAF','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(212,242,'OOTIVOC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(213,243,'NPERCAP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(214,244,'FPILLACAD','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(215,245,'AQUIJANDRIAJ','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(216,246,'KRAMIREZM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(217,247,'GRIVEROSO','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(218,248,'JROMEROM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(219,249,'WSOTELOS','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(220,250,'DVILLALOBOSJ','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(221,251,'KANCULLES','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(222,252,'YBUSTINZAC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(223,253,'MCAJAMARCAC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(224,254,'ZCARLOSC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(225,255,'RCCOHUAP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(226,256,'ACRUZH','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(227,257,'RDELACRUZR','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(228,258,'AESPEJOB','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(229,259,'CESTEBANH','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(230,260,'XFLOREST','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(231,261,'JGILBONIOT','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(232,262,'NHUAMANC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(233,263,'AIPARRAGUIRREL','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(234,264,'CLIVIAC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(235,265,'MMAURICIOU','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(236,266,'DMEJIAT','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(237,267,'AMENESESF','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(238,268,'EPALMAT','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(239,269,'APILLACAC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(240,270,'WPOMAG','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(241,271,'YRAMIREZA','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(242,272,'DREATEGUIM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(243,273,'ARODRIGUEZA','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(244,274,'JSEGURAR','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(245,275,'JSURICHAQUIH','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(246,276,'JTOLENTINOE','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(247,277,'CCABRERAP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(248,278,'MCARHUACUSMAC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(249,279,'TCASTROR','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(250,280,'JCERCEDOM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(251,281,'VCHOQUEY','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(252,282,'KDAMASM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(253,283,'JDIAZS','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(254,284,'JFLOREZP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(255,285,'JGARCIAU','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(256,286,'GLACHIRAH','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(257,287,'ALIZANAS','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(258,288,'MMEDINAH','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(259,289,'DMENDIETAQ','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(260,290,'BPEREZH','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(261,291,'PPURACAH','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(262,292,'MQUISPEM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(263,293,'HRAMIREZA','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(264,294,'JRAMIREZL','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(265,295,'YREYESM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(266,296,'SSILVAM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(267,326,'ATORIBIOC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(268,327,'AYNGAROCAC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(269,328,'RZAMORAM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(270,297,'DABADV','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(271,298,'JARIASE','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(272,299,'CCASTROR','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(273,300,'ACARMONAC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(274,301,'MCHOCCEQ','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(275,302,'ACLEMENTER','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(276,303,'YCOLOSC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(277,304,'AESPINOZAV','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(278,305,'KEUGENIOM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(279,306,'EGARCIAC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(280,307,'JLAPAM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(281,308,'MLEONR','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(282,309,'SLEONS','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(283,310,'OMOZONBITEB','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(284,311,'JPACHECOE','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(285,312,'MPAREDESD','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(286,313,'LPEREZL','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(287,314,'GPEREZN','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(288,315,'VQUIÑONESI','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(289,316,'ORAMIREZP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(290,317,'JRAMOSP','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(291,318,'MRIVEROSA','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(292,319,'AROJASM','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(293,320,'MRONDONG','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(294,321,'RSANCHEZG','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(295,322,'CSOTOC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(296,323,'BVELASQUEZT','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(297,324,'LVILLANUEVAC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(298,325,'DYAURIC','12345','views/images/img-usuarios/foto-defecto.jpg','alumno12345@gmail.com ','AC',NULL),(299,800,'APIMENTELH','12345','views/images/img-usuarios/pimentel.png','alfredoPimentel@gmail.com','AC',NULL),(300,801,'NARTUROM','12345','views/images/img-usuarios/usuario611.jpg','nestorarturo@trentino.edu.pe','AC',NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_perfiles`
--

DROP TABLE IF EXISTS `usuarios_perfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_perfiles` (
  `id_usuario` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_perfil`),
  KEY `fk_usuarios_has_perfiles_perfiles1_idx` (`id_perfil`),
  KEY `fk_usuarios_has_perfiles_usuarios1_idx` (`id_usuario`),
  CONSTRAINT `fk_usuarios_has_perfiles_perfiles1` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_has_perfiles_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_perfiles`
--

LOCK TABLES `usuarios_perfiles` WRITE;
/*!40000 ALTER TABLE `usuarios_perfiles` DISABLE KEYS */;
INSERT INTO `usuarios_perfiles` VALUES (1,1),(2,3),(3,2),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(59,1),(60,1),(61,1),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1),(72,1),(73,1),(74,1),(75,1),(76,1),(77,1),(78,1),(79,1),(80,1),(81,1),(82,1),(83,1),(84,1),(85,1),(86,1),(87,1),(88,1),(89,1),(90,1),(92,1),(93,1),(94,1),(95,1),(96,1),(97,1),(98,1),(99,1),(100,1),(101,1),(102,1),(103,1),(104,1),(105,1),(106,1),(107,1),(108,1),(109,1),(110,1),(111,1),(112,1),(113,1),(114,1),(115,1),(116,1),(117,1),(118,1),(119,1),(120,1),(121,1),(122,1),(123,1),(124,1),(125,1),(126,1),(127,1),(128,1),(129,1),(130,1),(131,1),(132,1),(133,1),(134,1),(135,1),(136,1),(137,1),(138,1),(139,1),(140,1),(141,1),(142,1),(143,1),(144,1),(145,1),(146,1),(147,1),(148,1),(150,1),(151,1),(152,1),(153,1),(154,1),(155,1),(156,1),(157,1),(158,1),(159,1),(160,1),(161,1),(162,1),(163,1),(164,1),(165,1),(166,1),(167,1),(168,1),(169,1),(170,1),(171,1),(172,1),(173,1),(174,1),(175,1),(176,1),(177,1),(178,1),(179,1),(180,1),(181,1),(182,1),(183,1),(184,1),(185,1),(186,1),(187,1),(188,1),(189,1),(190,1),(191,1),(192,1),(193,1),(194,1),(195,1),(196,1),(197,1),(198,1),(199,1),(200,1),(201,1),(202,1),(203,1),(204,1),(205,1),(206,1),(207,1),(208,1),(209,1),(210,1),(211,1),(212,1),(213,1),(214,1),(215,1),(216,1),(217,1),(218,1),(219,1),(220,1),(221,1),(222,1),(223,1),(224,1),(225,1),(226,1),(227,1),(228,1),(229,1),(230,1),(231,1),(232,1),(233,1),(234,1),(235,1),(236,1),(237,1),(238,1),(239,1),(240,1),(241,1),(242,1),(243,1),(244,1),(245,1),(246,1),(247,1),(248,1),(249,1),(250,1),(251,1),(252,1),(253,1),(254,1),(255,1),(256,1),(257,1),(258,1),(259,1),(260,1),(261,1),(262,1),(263,1),(264,1),(265,1),(266,1),(267,1),(268,1),(269,1),(270,1),(271,1),(272,1),(273,1),(274,1),(275,1),(276,1),(277,1),(278,1),(279,1),(280,1),(281,1),(282,1),(283,1),(284,1),(285,1),(286,1),(287,1),(288,1),(289,1),(290,1),(291,1),(292,1),(293,1),(294,1),(295,1),(296,1),(297,1),(298,1),(299,2),(300,2);
/*!40000 ALTER TABLE `usuarios_perfiles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-07 23:48:26
