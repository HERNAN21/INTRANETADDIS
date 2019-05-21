/*
SQLyog Community v8.71 
MySQL - 5.6.26 : Database - intranetaddisdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`intranetaddisdb` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `intranetaddisdb`;

/*Table structure for table `alumnos` */

DROP TABLE IF EXISTS `alumnos`;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `alumnos` */

insert  into `alumnos`(`id_alumno`,`id_matricula`,`id_seccion`,`estado`) values (1,1,1,'AC'),(2,2,1,'AC');

/*Table structure for table `asistencia` */

DROP TABLE IF EXISTS `asistencia`;

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
  KEY `fk_asistencia_alumnos1_idx` (`id_alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `asistencia` */

insert  into `asistencia`(`id_asistencia`,`hra_marcado`,`id_carrera`,`id_ciclo`,`id_seccion`,`id_curso`,`cod_usuario`,`id_alumno`) values (2,'2019-03-24 14:43:56',1,1,1,30,3,1),(3,'2019-03-24 14:43:56',1,1,1,30,3,2),(4,'2019-03-28 19:08:05',1,1,1,30,3,1),(5,'2019-03-28 19:08:05',1,1,1,30,3,2);

/*Table structure for table `carreras` */

DROP TABLE IF EXISTS `carreras`;

CREATE TABLE `carreras` (
  `id_carrera` int(11) NOT NULL AUTO_INCREMENT,
  `descor` varchar(10) DEFAULT NULL,
  `deslar` text,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_carrera`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `carreras` */

insert  into `carreras`(`id_carrera`,`descor`,`deslar`,`estado`) values (1,'ADM','ADMINISTRACION DE EMPRESAS','AC'),(2,'DG','DISEÑO GRAFICO','AC'),(3,'EFERM','ENFERMERIA','AC');

/*Table structure for table `carreras_cursos` */

DROP TABLE IF EXISTS `carreras_cursos`;

CREATE TABLE `carreras_cursos` (
  `id_carrera` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  PRIMARY KEY (`id_carrera`,`id_curso`),
  KEY `fk_carreras_has_cursos_cursos1_idx` (`id_curso`),
  KEY `fk_carreras_has_cursos_carreras1_idx` (`id_carrera`),
  CONSTRAINT `fk_carreras_has_cursos_carreras1` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id_carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_carreras_has_cursos_cursos1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `carreras_cursos` */

insert  into `carreras_cursos`(`id_carrera`,`id_curso`) values (1,30);

/*Table structure for table `ciclo` */

DROP TABLE IF EXISTS `ciclo`;

CREATE TABLE `ciclo` (
  `id_ciclo` int(11) NOT NULL AUTO_INCREMENT,
  `descor` varchar(10) DEFAULT NULL,
  `deslar` varchar(30) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_ciclo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `ciclo` */

insert  into `ciclo`(`id_ciclo`,`descor`,`deslar`,`estado`) values (1,'I','PRIMER CICLO','AC'),(2,'II','SEGUNDO CICLO','AC'),(3,'III','TERCER CICLO','AC'),(4,'IV','CUARTO CICLO','AC'),(5,'V','QUINTO CICLO','AC'),(6,'VI','SEXTO CICLO','AC');

/*Table structure for table `concepto_pago` */

DROP TABLE IF EXISTS `concepto_pago`;

CREATE TABLE `concepto_pago` (
  `id_conceptoPago` int(11) NOT NULL AUTO_INCREMENT,
  `concepto` varchar(50) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_conceptoPago`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `concepto_pago` */

insert  into `concepto_pago`(`id_conceptoPago`,`concepto`,`monto`,`estado`) values (1,'Matricula',150,'AC'),(2,'Pension Beca Trentino',460,'AC'),(3,'Pension Beca Parroquial',30,'AC'),(4,'Pension Beca Municipal',200,'AC'),(5,'Inscripcion',100,'AC'),(6,'Habitacion VG_Becarios',200,'AC'),(7,'Habitacion VG_Pagantes',130,'AC'),(8,'Habitacion Union_Becarios',200,'AC'),(9,'Habitacion Union_Pagantes',130,'AC'),(10,'Habitacion Collanac_Becarios',200,'AC'),(11,'Habitacion Collanac_Pagantes',130,'AC'),(12,'Habitacion Portada I',130,'AC');

/*Table structure for table `cuenta` */

DROP TABLE IF EXISTS `cuenta`;

CREATE TABLE `cuenta` (
  `id_cuenta` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_conceptoPago` int(11) NOT NULL,
  `vencimiento` date DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `id_carrera` int(11) NOT NULL,
  `id_ciclo` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  PRIMARY KEY (`id_cuenta`,`id_conceptoPago`,`id_alumno`),
  KEY `fk_deuda_concepto_pago1_idx` (`id_conceptoPago`),
  KEY `fk_deuda_alumnos1_idx` (`id_alumno`),
  CONSTRAINT `fk_deuda_concepto_pago1` FOREIGN KEY (`id_conceptoPago`) REFERENCES `concepto_pago` (`id_conceptoPago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cuenta` */

/*Table structure for table `cursos` */

DROP TABLE IF EXISTS `cursos`;

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `descor` varchar(45) DEFAULT NULL,
  `deslar` varchar(45) DEFAULT NULL,
  `credito` decimal(10,0) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

/*Data for the table `cursos` */

insert  into `cursos`(`id_curso`,`descor`,`deslar`,`credito`,`estado`) values (1,'D2D','DISEÑO 2D',NULL,'AC'),(2,'FV','FUNDAMENTOS VISUAL',NULL,'AC'),(3,'TG','TALLER DE GREATIVIDAD',NULL,'AC'),(4,'DA','DIBUJO ARTISTICO',NULL,'AC'),(5,'SD','SEMIOTICA DE DISEÑO',NULL,'AC'),(6,'TI','TECNICAS DE ILUSTRACION',NULL,'AC'),(7,'T','TIPOGRAFIA',NULL,'AC'),(8,'M','MARKETING',NULL,'AC'),(9,'D3D','DISEÑO 3D',NULL,'AC'),(10,'ID','ILUSTRACION DIGITAL',NULL,'AC'),(11,'D','DIAGRAMACION',NULL,'AC'),(12,'DD','DIAGRAMACION DIGITAL',NULL,'AC'),(13,'CV','COMUNICACION VISUAL',NULL,'AC'),(14,'PI','PROYECTO ILUSTRADOR',NULL,'AC'),(15,'PG','PRODUCCION GRAFICA',NULL,'AC'),(16,'PPD','PRE PRENSA DIGITAL',NULL,'AC'),(17,'FEV','FOTOGRAFIA Y EXPRESION VISUAL',NULL,'AC'),(18,'AD','ANIMACION DIGITAL',NULL,'AC'),(19,'PAF','PROYECTO ARTE FINAL',NULL,'AC'),(20,'RCP','REDACCION CRETAIVA Y OPUBLICIDAD',NULL,'AC'),(21,'EP','ESTRATEGIA PUBLICITARIA',NULL,'AC'),(22,'DE','DISEÑO DE EMPAQUE',NULL,'AC'),(23,'CMA','CREATIVIDAD EN MEDIO ALTERNATIVO',NULL,'AC'),(24,'PD','PROYECTO DISEÑADOR',NULL,'AC'),(25,'DAP','DIRECCION DE ARTE PUBLICITARIO',NULL,'AC'),(26,'DC','DUPLA CREATIVA',NULL,'AC'),(27,'TIC','TALLER DE IDENTIDAD CORPORATIVA',NULL,'AC'),(28,'CP','CAMPAÑAS PUBLICICTARIAS',NULL,'AC'),(29,'PDA','PROYECTO DIRECTOR DE ARTE',NULL,'AC'),(30,'PO','PLANIFICACION Y ORGANIZACION','3','AC'),(31,'DCE','DIRECCION Y CONTROL EMPRESARIAL','2','AC'),(32,'P','PRODUCCION',NULL,'AC'),(33,'GRH','GESTION DE RECURSOS HUMANOS',NULL,'AC'),(34,'SCPA','SISTEMA DE COMPENSACION, PREVISIONAL Y ASISTR',NULL,'AC'),(35,'AL','ADMINISTRACION LOGICA',NULL,'AC'),(36,'GA','GESTION DE ALMACENES',NULL,'AC'),(37,'AP','ADMINISTRACION PUBLICA',NULL,'AC'),(38,'EE','ESTADISTICA EMPRESARIAL',NULL,'AC'),(39,'GME','GESTION DE MARKETING EMPRESARIAL',NULL,'AC'),(40,'IM','INVESTIGACION DE MERCADO',NULL,'AC'),(41,'CI','COMERCIO INTERNACIONAL',NULL,'AC'),(42,'CCAC','COMUNICACION COMERCIAL Y ATENCION AL CLIENTE',NULL,'AC'),(43,'SVCE','SISTEMA DE VENTAS Y COMERCIO ELECTRONICO',NULL,'AC'),(44,'MES','MARKETING EN LAS EMPRESAS DE SERVICIOS',NULL,'AC'),(45,'IC','INGLES COMERCIAL',NULL,'AC'),(46,'OT','OPERACION CON TABLAS',NULL,'AC'),(47,'LCT','LEGISLACION COMERCIAL Y TRIBUTARIA',NULL,'AC'),(48,'GT','GESTION DE TESORERIA',NULL,'AC'),(49,'AC','ANALISIS DE COSTOS',NULL,'AC'),(50,'GP','GESTION PRESUPUESTARIA',NULL,'AC'),(51,'GF','GESTION FINANCIERA',NULL,'AC'),(52,'FPI','FORMULARIO DE PROYECTOS DE INVERSION',NULL,'AC'),(53,'EPI','EVALUACION DE PROYECTOS DE INVESTIGACION',NULL,'AC'),(54,'ADT','AUDITORIA',NULL,'AC'),(55,'PRUE','PRUEBA',NULL,'AC');

/*Table structure for table `cursos_ciclo` */

DROP TABLE IF EXISTS `cursos_ciclo`;

CREATE TABLE `cursos_ciclo` (
  `id_ciclo` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  PRIMARY KEY (`id_ciclo`,`id_curso`),
  KEY `fk_ciclo_has_cursos_cursos1_idx` (`id_curso`),
  KEY `fk_ciclo_has_cursos_ciclo1_idx` (`id_ciclo`),
  CONSTRAINT `fk_ciclo_has_cursos_ciclo1` FOREIGN KEY (`id_ciclo`) REFERENCES `ciclo` (`id_ciclo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ciclo_has_cursos_cursos1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cursos_ciclo` */

insert  into `cursos_ciclo`(`id_ciclo`,`id_curso`) values (1,30),(1,31);

/*Table structure for table `detalle_nota` */

DROP TABLE IF EXISTS `detalle_nota`;

CREATE TABLE `detalle_nota` (
  `id_detalleNota` int(11) NOT NULL AUTO_INCREMENT,
  `id_nota` int(11) NOT NULL,
  `id_tNota` int(11) NOT NULL,
  `nota` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`id_detalleNota`,`id_nota`,`id_tNota`),
  KEY `fk_detalle_nota_notas1_idx` (`id_nota`),
  KEY `id_tNota_idx` (`id_tNota`),
  CONSTRAINT `fk_detalle_nota_notas1` FOREIGN KEY (`id_nota`) REFERENCES `notas` (`id_nota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_nota` FOREIGN KEY (`id_nota`) REFERENCES `notas` (`id_nota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_tNota` FOREIGN KEY (`id_tNota`) REFERENCES `tipo_nota` (`id_tNota`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `detalle_nota` */

insert  into `detalle_nota`(`id_detalleNota`,`id_nota`,`id_tNota`,`nota`) values (1,1,1,'20.00'),(2,1,2,'20.00'),(3,1,3,'20.00'),(4,2,1,'18.00'),(5,2,2,'10.00'),(6,2,3,'0.00');

/*Table structure for table `detalle_requisitos` */

DROP TABLE IF EXISTS `detalle_requisitos`;

CREATE TABLE `detalle_requisitos` (
  `id_detRequisito` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `archivo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_detRequisito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detalle_requisitos` */

/*Table structure for table `docente` */

DROP TABLE IF EXISTS `docente`;

CREATE TABLE `docente` (
  `id_docente` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `profesion` text,
  `Facultad` text,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_docente`,`id_persona`),
  KEY `fk_profesor_persona1_idx` (`id_persona`),
  CONSTRAINT `fk_profesor_persona1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `docente` */

insert  into `docente`(`id_docente`,`id_persona`,`profesion`,`Facultad`,`estado`) values (1,3,'ingeniero en ciencias de la computacion','trentino juan pablo ii','AC'),(2,4,'ingeniero en desarrollo de software','trentino juan pablo ii','AC');

/*Table structure for table `docente_cursos` */

DROP TABLE IF EXISTS `docente_cursos`;

CREATE TABLE `docente_cursos` (
  `id_docente` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  PRIMARY KEY (`id_docente`,`id_curso`),
  KEY `fk_profesor_has_cursos_cursos1_idx` (`id_curso`),
  KEY `fk_profesor_has_cursos_profesor1_idx` (`id_docente`),
  CONSTRAINT `fk_profesor_has_cursos_cursos1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_profesor_has_cursos_profesor1` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `docente_cursos` */

insert  into `docente_cursos`(`id_docente`,`id_curso`) values (1,30),(2,31);

/*Table structure for table `evaluacionpostulante` */

DROP TABLE IF EXISTS `evaluacionpostulante`;

CREATE TABLE `evaluacionpostulante` (
  `id_evaluacionPost` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_evaluacionPost`,`id_persona`),
  UNIQUE KEY `id_evaluacionPost` (`id_evaluacionPost`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `evaluacionpostulante` */

insert  into `evaluacionpostulante`(`id_evaluacionPost`,`id_persona`,`estado`) values (1,1,'AP'),(2,2,'AP');

/*Table structure for table `inicio` */

DROP TABLE IF EXISTS `inicio`;

CREATE TABLE `inicio` (
  `id_imgInicio` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`id_imgInicio`,`id_perfil`),
  UNIQUE KEY `id_imgInicio` (`id_imgInicio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `inicio` */

insert  into `inicio`(`id_imgInicio`,`titulo`,`descripcion`,`imagen`,`id_perfil`) values (1,'INTRANET DEL ESTUDIANTE','Bienvenido a al portal web del estudiante, donde encontraras información sobre tus asignaciones, notas y pagos institucionales.Esperamos te guste...!','views/images/inicio/imagen769.jpg',3),(2,'INTRANET DEL DOCENTE','Bienvenido al portal web del Docente. Esperamos te guste...!','views/images/inicio/imagen950.jpg',2),(3,'INTRANET DEL PERSONAL ADMINISTRATIVO','Bienvenido al Portal Web del Personal Administrativo. Espero que les guste...!','views/images/inicio/imagen901.jpg',1);

/*Table structure for table `matricula` */

DROP TABLE IF EXISTS `matricula`;

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
  PRIMARY KEY (`id_matricula`,`id_evaluacionPost`,`id_carrera`,`id_ciclo`,`id_semestre`,`id_talumno`),
  KEY `fk_matricula_ciclo1_idx` (`id_ciclo`),
  KEY `fk_matricula_carreras1_idx` (`id_carrera`),
  KEY `fk_matricula_semestre1_idx` (`id_semestre`),
  KEY `fk_matricula_EvaluacionPostulate1_idx` (`id_evaluacionPost`),
  KEY `fk_matricula_tipo_alumno1_idx` (`id_talumno`),
  CONSTRAINT `fk_matricula_EvaluacionPostulate1` FOREIGN KEY (`id_evaluacionPost`) REFERENCES `evaluacionpostulante` (`id_evaluacionPost`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_matricula_carreras1` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id_carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_matricula_ciclo1` FOREIGN KEY (`id_ciclo`) REFERENCES `ciclo` (`id_ciclo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `matricula` */

insert  into `matricula`(`id_matricula`,`cod_unicoMatricula`,`id_evaluacionPost`,`id_carrera`,`id_ciclo`,`id_semestre`,`cod_pago`,`fecha_registro`,`cod_usuario`,`id_talumno`) values (1,'12345678945612',1,1,1,1,'002705','2019-01-23 04:11:00',5,3),(2,'45612378945612',2,1,1,1,'002806','2019-01-23 05:59:00',5,3);

/*Table structure for table `matricula_pariente` */

DROP TABLE IF EXISTS `matricula_pariente`;

CREATE TABLE `matricula_pariente` (
  `id_matricula` int(11) NOT NULL,
  `id_pariente` int(11) NOT NULL,
  PRIMARY KEY (`id_matricula`,`id_pariente`),
  KEY `fk_matricula_has_pariente_pariente1_idx` (`id_pariente`),
  KEY `fk_matricula_has_pariente_matricula1_idx` (`id_matricula`),
  CONSTRAINT `fk_matricula_has_pariente_matricula1` FOREIGN KEY (`id_matricula`) REFERENCES `matricula` (`id_matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_matricula_has_pariente_pariente1` FOREIGN KEY (`id_pariente`) REFERENCES `pariente` (`id_pariente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `matricula_pariente` */

/*Table structure for table `modulos` */

DROP TABLE IF EXISTS `modulos`;

CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `descor` varchar(25) DEFAULT NULL,
  `deslar` varchar(50) DEFAULT NULL,
  `mod_super` int(11) DEFAULT NULL,
  `link` text,
  `icono` text,
  `orden` char(2) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

/*Data for the table `modulos` */

insert  into `modulos`(`id_modulo`,`descor`,`deslar`,`mod_super`,`link`,`icono`,`orden`,`estado`) values (1,'Mod. Seguridad','Mod. Seguridad',1,'','security','1','AC'),(2,'USU','Usuarios',1,'ms_usuarios','people','1','AC'),(3,'PERF','Perfiles',1,'ms_perfiles','how_to_reg','1','AC'),(4,'MOD','Modulos',1,'ms_modulos','list_alt','1','AC'),(5,'Mod. program Acad','Mod. Prog. Academica',5,'','school','2','AC'),(6,'Mod. Config','Mod. Configuración',6,'','settings','3','AC'),(7,'Infor. Inst','Información Institucional',7,'www.addis.edu.pe','location_on','4','AC'),(8,'modi. contra','Modificar Contraseña',8,'mc_miPerfil','lock','5','AC'),(9,'program. academ','Prog. Academicos',5,'ma_gestorProgAcademicos','book','1','AC'),(10,'cur','Cursos',5,'ma_gestorCursos','layers','2','AC'),(11,'ciclos','Ciclos',5,'ma_gestorCiclos','bar_chart','3','AC'),(12,'Semes','Semestres',5,'ma_gestorSemestres','bar_chart','4','AC'),(13,'secc','Secciones',5,'ma_gestorSecciones','apps','5','AC'),(14,'ini','Inicio',6,'mc_gestorInicio','home','1','AC'),(15,'Mod. Pagos','Modulo de Pagos',15,'','monetization_on','4','AC'),(16,'Conceptos','Conceptos',15,'mp_gestorConceptos','book','1','AC'),(17,'Mod. Gestor Notas','Mód. Gestor de Notas',17,'','library_books','1','AC'),(18,'Gstr. Notas','Gestor Notas',17,'mn_gestorNotas','star','1','AC'),(19,'Mod. notas','Record de Notas',19,'mn_recordNotas','star','2','AC'),(20,'Mod. asistencia','Mi Asistencia',20,'ma_miAsistencia','list_alt','2','IN'),(21,'Mod. pagos','Mis Pagos',21,'mp_misPagos','money','3','AC'),(22,'Mod. Cursoso','Mis Cursos',22,'mn_misCursos','list_alt','1','AC'),(23,'Gestor Pagos','Gestionar Pagos',15,'mp_gestorPagos','money','2','AC');

/*Table structure for table `notas` */

DROP TABLE IF EXISTS `notas`;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `notas` */

insert  into `notas`(`id_nota`,`id_alumno`,`id_ciclo`,`id_curso`,`promedio`,`fecha`) values (1,1,1,30,'0.00','2019-02-18 10:20:01'),(2,1,1,31,'0.00','2019-02-18 10:20:01');

/*Table structure for table `pagante` */

DROP TABLE IF EXISTS `pagante`;

CREATE TABLE `pagante` (
  `id_pagante` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `apellPaterno` varchar(30) DEFAULT NULL,
  `apellMaterno` varchar(30) DEFAULT NULL,
  `dni` char(8) DEFAULT NULL,
  PRIMARY KEY (`id_pagante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pagante` */

/*Table structure for table `pagos` */

DROP TABLE IF EXISTS `pagos`;

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT,
  `id_cuenta` int(11) NOT NULL,
  `monto_pagado` varchar(45) DEFAULT NULL,
  `monto_deuda` varchar(45) DEFAULT NULL,
  `nBoleta` varchar(45) DEFAULT NULL,
  `fecha_registro` varchar(45) DEFAULT NULL,
  `dni_pagante` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `archivo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_pago`,`id_cuenta`),
  KEY `fk_pagos_deuda1_idx` (`id_cuenta`),
  CONSTRAINT `id_cuenta` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta` (`id_cuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pagos` */

/*Table structure for table `pariente` */

DROP TABLE IF EXISTS `pariente`;

CREATE TABLE `pariente` (
  `id_pariente` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellPaterno` varchar(20) DEFAULT NULL,
  `apellMaterno` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `id_parentesco` int(11) NOT NULL,
  PRIMARY KEY (`id_pariente`,`id_parentesco`),
  KEY `fk_pariente_tipo_parentesco1_idx` (`id_parentesco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';

/*Data for the table `pariente` */

/*Table structure for table `perfiles` */

DROP TABLE IF EXISTS `perfiles`;

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `descor` varchar(25) DEFAULT NULL,
  `deslar` varchar(50) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `perfiles` */

insert  into `perfiles`(`id_perfil`,`descor`,`deslar`,`estado`) values (1,'ADM','ADMINISTRADOR','AC'),(2,'DCT','DOCENTE','AC'),(3,'EST','ESTUDIANTE','AC');

/*Table structure for table `perfiles_modulos` */

DROP TABLE IF EXISTS `perfiles_modulos`;

CREATE TABLE `perfiles_modulos` (
  `id_perfil` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  PRIMARY KEY (`id_perfil`,`id_modulo`),
  KEY `fk_perfiles_has_modulos_modulos1_idx` (`id_modulo`),
  KEY `fk_perfiles_has_modulos_perfiles1_idx` (`id_perfil`),
  CONSTRAINT `fk_perfiles_has_modulos_modulos1` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_perfiles_has_modulos_perfiles1` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `perfiles_modulos` */

insert  into `perfiles_modulos`(`id_perfil`,`id_modulo`) values (1,1),(1,5),(1,6),(1,7),(3,7),(1,8),(3,8),(1,15),(2,17),(3,19),(3,20),(3,21),(3,22);

/*Table structure for table `persona` */

DROP TABLE IF EXISTS `persona`;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `persona` */

insert  into `persona`(`id_persona`,`nombres`,`ape_paterno`,`ape_materno`,`dni`,`genero`,`fech_nacimiento`,`id_tpersona`,`direccion`,`distrito`,`provincia`,`departamento`,`nCelular`,`email`,`estado`) values (1,'Kevin Ivan','Altamirano','Hoyos','75821744','M','1999-05-29',1,'mz.O lt.16-b - Manchay','Pachacamac','Lima','Lima','935086978','ivan123altamirano@gmail.com','AC'),(2,'Yoni ','Torres','Ambrosio','87456123','M','2000-08-16',1,'la union','Pachacamac','Lima ','Lima','954612378','yonitorres@gmail.com','AC'),(3,'Leodan','Perez','Llacsa','78456123','M','1999-10-08',2,'ms.O lt.16-b Mancahy','Pachacamac','Lima','Lima','923564178','leoperez@gmail.com','AC'),(4,'Fidel','Cartolin','Rojas','95647812','M','1997-05-09',2,'mz.O lt.16-b - Manchay','Pachacamac','Lima','Lima','985476123','fidelcartolin@gmail.com','AC'),(5,'Jhon','Alvitres','Quispe','95784561','M','1997-03-20',3,'La union','Pachacamac','Lima','Lima','956478123','jhonalvitres@gmail.com','AC');

/*Table structure for table `promedio_final` */

DROP TABLE IF EXISTS `promedio_final`;

CREATE TABLE `promedio_final` (
  `id_promdeio` int(11) NOT NULL,
  `id_alumno` varchar(45) DEFAULT NULL,
  `id_ciclo` varchar(45) DEFAULT NULL,
  `id_seccion` varchar(45) DEFAULT NULL,
  `año` varchar(45) DEFAULT NULL,
  `nota` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_promdeio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `promedio_final` */

/*Table structure for table `rechazopostulante` */

DROP TABLE IF EXISTS `rechazopostulante`;

CREATE TABLE `rechazopostulante` (
  `id_rechazoPost` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `detalle` text,
  `id_evaluacionPost` int(11) NOT NULL,
  PRIMARY KEY (`id_rechazoPost`,`id_evaluacionPost`),
  KEY `fk_rechazoPostulante_evaluacionPostulate1_idx` (`id_evaluacionPost`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `rechazopostulante` */

/*Table structure for table `renovacion_matricula` */

DROP TABLE IF EXISTS `renovacion_matricula`;

CREATE TABLE `renovacion_matricula` (
  `id_renovacionMat` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL,
  `id_semestre` int(11) DEFAULT NULL,
  `id_ciclo` int(11) DEFAULT NULL,
  `id_matricula` int(11) DEFAULT NULL,
  `cod_pago` varchar(45) DEFAULT NULL,
  `fecha` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_renovacionMat`,`id_alumno`),
  KEY `fk_renovacion_matricula_alumnos1_idx` (`id_alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `renovacion_matricula` */

insert  into `renovacion_matricula`(`id_renovacionMat`,`id_alumno`,`id_semestre`,`id_ciclo`,`id_matricula`,`cod_pago`,`fecha`) values (1,1,2,2,1,'002578',2019);

/*Table structure for table `requisitos` */

DROP TABLE IF EXISTS `requisitos`;

CREATE TABLE `requisitos` (
  `id_requisito` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `archivo` text,
  PRIMARY KEY (`id_requisito`,`id_persona`),
  KEY `fk_requisitos_persona1_idx` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `requisitos` */

/*Table structure for table `seccion` */

DROP TABLE IF EXISTS `seccion`;

CREATE TABLE `seccion` (
  `id_seccion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_seccion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `seccion` */

insert  into `seccion`(`id_seccion`,`descripcion`,`estado`) values (1,'A','AC'),(2,'B','AC'),(3,'UNICA','AC');

/*Table structure for table `semestre` */

DROP TABLE IF EXISTS `semestre`;

CREATE TABLE `semestre` (
  `id_semestre` int(11) NOT NULL AUTO_INCREMENT,
  `deslar` varchar(50) DEFAULT NULL,
  `descor` varchar(15) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_semestre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `semestre` */

insert  into `semestre`(`id_semestre`,`deslar`,`descor`,`estado`) values (1,'2018 - ciclo 1 Marzo','2018 - I','AC'),(2,'2018 - ciclo 2 Agosto','2018 - II','AC'),(3,'2019 - ciclo 1 Marzo','2019 - I','AC'),(4,'2019 - ciclo 2 Agosto','2019 - II','AC');

/*Table structure for table `tipo_alumno` */

DROP TABLE IF EXISTS `tipo_alumno`;

CREATE TABLE `tipo_alumno` (
  `id_talumno` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_talumno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tipo_alumno` */

insert  into `tipo_alumno`(`id_talumno`,`descripcion`) values (1,'BECA 18'),(2,'BECA PARROQUIA'),(3,'PAGANTE');

/*Table structure for table `tipo_nota` */

DROP TABLE IF EXISTS `tipo_nota`;

CREATE TABLE `tipo_nota` (
  `id_tNota` int(11) NOT NULL,
  `descor` varchar(45) NOT NULL,
  `deslar` varchar(45) NOT NULL,
  `porcentaje` int(2) NOT NULL,
  PRIMARY KEY (`id_tNota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tipo_nota` */

insert  into `tipo_nota`(`id_tNota`,`descor`,`deslar`,`porcentaje`) values (1,'EP','EXAMEN PARCIAL',20),(2,'EF','EXAMEN FINAL',30),(3,'PROYECTO','PROYECTO FINAL',50);

/*Table structure for table `tipo_parentesco` */

DROP TABLE IF EXISTS `tipo_parentesco`;

CREATE TABLE `tipo_parentesco` (
  `id_parentesco` int(11) NOT NULL,
  `parentesco` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_parentesco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tipo_parentesco` */

/*Table structure for table `tipo_persona` */

DROP TABLE IF EXISTS `tipo_persona`;

CREATE TABLE `tipo_persona` (
  `id_tpersona` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tipo_persona` */

insert  into `tipo_persona`(`id_tpersona`,`descripcion`) values (1,'postulante'),(2,'docente'),(3,'administrativo'),(4,'apoderado');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `foto` text,
  `email` text,
  `estado` char(2) DEFAULT NULL,
  `intentos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`,`id_persona`),
  KEY `fk_usuarios_persona_idx` (`id_persona`),
  CONSTRAINT `fk_usuarios_persona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id_usuario`,`id_persona`,`usuario`,`password`,`foto`,`email`,`estado`,`intentos`) values (1,5,'ADMIN','12345','views/images/img-usuarios/usuario773.jpg','jalvitres123@addis.edu.pe','AC',NULL),(2,1,'ALUMNO','12345','views/images/img-usuarios/usuario679.jpg','kaltamirano123@addis.edu.pe','AC',NULL),(3,3,'DOCENTE','12345','views/images/img-usuarios/usuario261.jpg','lperez123@trentino.edu.pe','AC',NULL),(8,2,'YTORRES','123','views/images/img-usuarios/usuario479.jpg','ytorres123@addis.edu.pe','AC',NULL),(9,4,'FCARTOLIN','123','views/images/img-usuarios/usuario748.jpg','fcartolin123@addis.edu.pe','AC',NULL);

/*Table structure for table `usuarios_perfiles` */

DROP TABLE IF EXISTS `usuarios_perfiles`;

CREATE TABLE `usuarios_perfiles` (
  `id_usuario` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_perfil`),
  KEY `fk_usuarios_has_perfiles_perfiles1_idx` (`id_perfil`),
  KEY `fk_usuarios_has_perfiles_usuarios1_idx` (`id_usuario`),
  CONSTRAINT `fk_usuarios_has_perfiles_perfiles1` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_has_perfiles_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `usuarios_perfiles` */

insert  into `usuarios_perfiles`(`id_usuario`,`id_perfil`) values (1,1),(3,2),(2,3);

/* Procedure structure for procedure `sp_insertModulos` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_insertModulos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertModulos`(
		in _id int,
		in _descor varchar(25),
		in _deslar varchar(50),
		in _link VARCHAR(50),
		in _icono VARCHAR(20),
		IN _orden CHAR(2)
	)
begin
	
		select @modSuper := count(*)+1 from modulos;
	
		insert into modulos(descor, deslar, mod_super, link, icono, orden, estado) 
		values(_descor, _deslar, @modSuper, _link, _icono, _orden, 'AC');
	end */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
