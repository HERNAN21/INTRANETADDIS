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
  `idasistencia` int(11) NOT NULL AUTO_INCREMENT,
  `hra_marcado` datetime DEFAULT NULL,
  `id_carrera` int(11) DEFAULT NULL,
  `id_ciclo` int(11) DEFAULT NULL,
  `id_seccion` int(11) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `cod_usuario` int(11) DEFAULT NULL,
  `id_alumno` int(11) NOT NULL,
  PRIMARY KEY (`idasistencia`,`id_alumno`),
  KEY `fk_asistencia_alumnos1_idx` (`id_alumno`),
  CONSTRAINT `fk_asistencia_alumnos1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `asistencia` */

/*Table structure for table `carreras` */

DROP TABLE IF EXISTS `carreras`;

CREATE TABLE `carreras` (
  `id_carrera` int(11) NOT NULL AUTO_INCREMENT,
  `descor` varchar(10) DEFAULT NULL,
  `deslar` text,
  PRIMARY KEY (`id_carrera`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `carreras` */

insert  into `carreras`(`id_carrera`,`descor`,`deslar`) values (1,'ADM','ADMINISTRACION DE EMPRESAS'),(2,'DG','DISEÑO GRAFICO'),(3,'EFERM','ENFERMERIA');

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

insert  into `carreras_cursos`(`id_carrera`,`id_curso`) values (2,1),(1,30);

/*Table structure for table `ciclo` */

DROP TABLE IF EXISTS `ciclo`;

CREATE TABLE `ciclo` (
  `id_ciclo` int(11) NOT NULL AUTO_INCREMENT,
  `descor` varchar(10) DEFAULT NULL,
  `deslar` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_ciclo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `ciclo` */

insert  into `ciclo`(`id_ciclo`,`descor`,`deslar`) values (1,'I','PRIMER CICLO'),(2,'II','SEGUNDO CICLO'),(3,'III','TERCER CICLO'),(4,'IV','CUARTO CICLO'),(5,'V','QUINTO CICLO'),(6,'VI','SEXTO CICLO');

/*Table structure for table `concepto_pago` */

DROP TABLE IF EXISTS `concepto_pago`;

CREATE TABLE `concepto_pago` (
  `id_conceptoPago` int(11) NOT NULL AUTO_INCREMENT,
  `concepto` varchar(50) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  PRIMARY KEY (`id_conceptoPago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `concepto_pago` */

/*Table structure for table `cuenta` */

DROP TABLE IF EXISTS `cuenta`;

CREATE TABLE `cuenta` (
  `id_deuda` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_conceptoPago` int(11) NOT NULL,
  `vecimiento` date DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_deuda`,`id_alumno`,`id_conceptoPago`),
  KEY `fk_deuda_concepto_pago1_idx` (`id_conceptoPago`),
  KEY `fk_deuda_alumnos1_idx` (`id_alumno`),
  CONSTRAINT `fk_deuda_alumnos1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_deuda_concepto_pago1` FOREIGN KEY (`id_conceptoPago`) REFERENCES `concepto_pago` (`id_conceptoPago`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cuenta` */

/*Table structure for table `cursos` */

DROP TABLE IF EXISTS `cursos`;

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `descor` varchar(45) DEFAULT NULL,
  `deslar` varchar(45) DEFAULT NULL,
  `credito` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

/*Data for the table `cursos` */

insert  into `cursos`(`id_curso`,`descor`,`deslar`,`credito`) values (1,'D2D','DISEÑO 2D','4'),(2,'FV','FUNDAMENTOS VISUAL','4'),(3,'TG','TALLER DE GREATIVIDAD','3'),(4,'DA','DIBUJO ARTISTICO','3'),(5,'SD','SEMIOTICA DE DISEÑO','2'),(6,'TI','TECNICAS DE ILUSTRACION','4'),(7,'T','TIPOGRAFIA','4'),(8,'M','MARKETING','4'),(9,'D3D','DISEÑO 3D','4'),(10,'ID','ILUSTRACION DIGITAL','4'),(11,'D','DIAGRAMACION','4'),(12,'DD','DIAGRAMACION DIGITAL','2'),(13,'CV','COMUNICACION VISUAL','2'),(14,'PI','PROYECTO ILUSTRADOR','4'),(15,'PG','PRODUCCION GRAFICA','4'),(16,'PPD','PRE PRENSA DIGITAL','4'),(17,'FEV','FOTOGRAFIA Y EXPRESION VISUAL','2'),(18,'AD','ANIMACION DIGITAL','3'),(19,'PAF','PROYECTO ARTE FINAL','4'),(20,'RCP','REDACCION CRETAIVA Y OPUBLICIDAD','4'),(21,'EP','ESTRATEGIA PUBLICITARIA','3'),(22,'DE','DISEÑO DE EMPAQUE','4'),(23,'CMA','CREATIVIDAD EN MEDIO ALTERNATIVO','4'),(24,'PD','PROYECTO DISEÑADOR','4'),(25,'DAP','DIRECCION DE ARTE PUBLICITARIO','3'),(26,'DC','DUPLA CREATIVA','3'),(27,'TIC','TALLER DE IDENTIDAD CORPORATIVA','3'),(28,'CP','CAMPAÑAS PUBLICICTARIAS','4'),(29,'PDA','PROYECTO DIRECTOR DE ARTE','4'),(30,'PO','PLANIFICACION Y ORGANIZACION','3'),(31,'DCE','DIRECCION Y CONTROL EMPRESARIAL','4'),(32,'P','PRODUCCION','3'),(33,'GRH','GESTION DE RECURSOS HUMANOS','2'),(34,'SCPA','SISTEMA DE COMPENSACION, PREVISIONAL Y ASISTR','3'),(35,'AL','ADMINISTRACION LOGICA','3'),(36,'GA','GESTION DE ALMACENES','3'),(37,'AP','ADMINISTRACION PUBLICA','4'),(38,'EE','ESTADISTICA EMPRESARIAL','4'),(39,'GME','GESTION DE MARKETING EMPRESARIAL','4'),(40,'IM','INVESTIGACION DE MERCADO','2'),(41,'CI','COMERCIO INTERNACIONAL','3'),(42,'CCAC','COMUNICACION COMERCIAL Y ATENCION AL CLIENTE','2'),(43,'SVCE','SISTEMA DE VENTAS Y COMERCIO ELECTRONICO','4'),(44,'MES','MARKETING EN LAS EMPRESAS DE SERVICIOS','3'),(45,'IC','INGLES COMERCIAL','3'),(46,'OT','OPERACION CON TABLAS','3'),(47,'LCT','LEGISLACION COMERCIAL Y TRIBUTARIA','2'),(48,'GT','GESTION DE TESORERIA','2'),(49,'AC','ANALISIS DE COSTOS','3'),(50,'GP','GESTION PRESUPUESTARIA','3'),(51,'GF','GESTION FINANCIERA','3'),(52,'FPI','FORMULARIO DE PROYECTOS DE INVERSION','3'),(53,'EPI','EVALUACION DE PROYECTOS DE INVESTIGACION','4'),(54,'ADT','AUDITORIA','2');

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

insert  into `cursos_ciclo`(`id_ciclo`,`id_curso`) values (1,1);

/*Table structure for table `detalle_nota` */

DROP TABLE IF EXISTS `detalle_nota`;

CREATE TABLE `detalle_nota` (
  `id_detalleNota` int(11) NOT NULL AUTO_INCREMENT,
  `id_nota` int(11) NOT NULL,
  `capacidad` text,
  `nota` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`id_detalleNota`,`id_nota`),
  KEY `fk_detalle_nota_notas1_idx` (`id_nota`),
  CONSTRAINT `fk_detalle_nota_notas1` FOREIGN KEY (`id_nota`) REFERENCES `notas` (`id_nota`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detalle_nota` */

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

insert  into `docente_cursos`(`id_docente`,`id_curso`) values (1,1),(2,1),(1,2),(1,30);

/*Table structure for table `evaluacionpostulante` */

DROP TABLE IF EXISTS `evaluacionpostulante`;

CREATE TABLE `evaluacionpostulante` (
  `id_evaluacionPost` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `estado` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_evaluacionPost`,`id_persona`),
  KEY `fk_EvaluacionPostulate_persona1_idx` (`id_persona`),
  CONSTRAINT `fk_EvaluacionPostulate_persona1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `evaluacionpostulante` */

insert  into `evaluacionpostulante`(`id_evaluacionPost`,`id_persona`,`estado`) values (1,1,'AP'),(2,2,'AP');

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
  CONSTRAINT `fk_matricula_ciclo1` FOREIGN KEY (`id_ciclo`) REFERENCES `ciclo` (`id_ciclo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_matricula_semestre1` FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id_semestre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_matricula_tipo_alumno1` FOREIGN KEY (`id_talumno`) REFERENCES `tipo_alumno` (`id_talumno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `matricula` */

insert  into `matricula`(`id_matricula`,`cod_unicoMatricula`,`id_evaluacionPost`,`id_carrera`,`id_ciclo`,`id_semestre`,`cod_pago`,`fecha_registro`,`cod_usuario`,`id_talumno`) values (1,'12345678945612',1,2,1,1,'002705','2019-01-23 04:11:00',5,3),(2,'45612378945612',2,2,1,1,'002806','2019-01-23 05:59:00',5,3);

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `modulos` */

insert  into `modulos`(`id_modulo`,`descor`,`deslar`,`mod_super`,`link`,`icono`,`orden`,`estado`) values (1,'cursos','Mis Cursos',1,'mn_misCursos','book','1','AC'),(2,'notas','Record de notas',2,'mn_recordNotas','star','2','AC'),(3,'asistencia','Mi Asistencia',3,'ma_miAsistencia','list_alt','3','AC'),(4,'examenes','Rol de Examenes',4,'mn_rolExamenes','list_alt','4','AC'),(5,'pagos','Mis Pagos',5,'','money','5','AC'),(6,'pgs. matricula','Pagos Matricula',5,'mp_matricula','attach_money','1','AC'),(7,'pgs. mensualidad','Pagos Por Mensualidad',5,'mp_mensualidad','attach_money','2','AC'),(8,'cuenta','Consultar Cuenta',5,'mp_cuenta','list_alt','3','AC'),(9,'ifor. institucional','Información Institucional',9,'mi_inforInstitucional','location_on','6','AC'),(10,'mod. contraseña','Modificar Contraseña',10,'ms_modContraseña','lock','7','AC'),(11,'notas','Registar Notas',11,'mn_gestorNotas','library_books','1','AC'),(12,'asistencia','Registrar Asistencia',11,'ma_gestorAsistencia','list_alt','2','AC'),(13,'seg','seguridad',13,NULL,'security','1','AC'),(14,'usu','usuarios',13,'ms_usuarios','people','1','AC'),(15,'perf','perfiles',13,'ms_perfiles','how_to_reg','2','AC'),(16,'mod','modulos',13,'ms_modulos','list_alt','3','AC');

/*Table structure for table `notas` */

DROP TABLE IF EXISTS `notas`;

CREATE TABLE `notas` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL,
  `id_ciclo` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `nota` decimal(4,2) DEFAULT NULL,
  `porcentaje` varchar(5) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_nota`,`id_alumno`),
  KEY `fk_notas_alumnos1_idx` (`id_alumno`),
  CONSTRAINT `fk_notas_alumnos1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `notas` */

insert  into `notas`(`id_nota`,`id_alumno`,`id_ciclo`,`id_curso`,`descripcion`,`nota`,`porcentaje`,`fecha`) values (6,2,1,1,'Examen Final','18.00','20%','2019-02-06 16:01:53'),(10,1,1,1,'EXAMEN PARCIAL','20.00','50%','2019-02-12 10:48:37');

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
  `id_pago` int(11) NOT NULL,
  `id_deuda` int(11) NOT NULL,
  `monto_pagado` varchar(45) DEFAULT NULL,
  `monto_deuda` varchar(45) DEFAULT NULL,
  `nBoleta` varchar(45) DEFAULT NULL,
  `fecha_registro` varchar(45) DEFAULT NULL,
  `dni_pagante` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_pago`,`id_deuda`),
  KEY `fk_pagos_deuda1_idx` (`id_deuda`),
  CONSTRAINT `fk_pagos_deuda1` FOREIGN KEY (`id_deuda`) REFERENCES `cuenta` (`id_deuda`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  KEY `fk_pariente_tipo_parentesco1_idx` (`id_parentesco`),
  CONSTRAINT `fk_pariente_tipo_parentesco1` FOREIGN KEY (`id_parentesco`) REFERENCES `tipo_parentesco` (`id_parentesco`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `perfiles` */

insert  into `perfiles`(`id_perfil`,`descor`,`deslar`,`estado`) values (1,'EST','ESTUDIANTE','AC'),(2,'DCT','DOCENTE','AC'),(3,'ADM','ADMINISTRADOR','AC'),(4,'APD','APODERADO','AC');

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

insert  into `perfiles_modulos`(`id_perfil`,`id_modulo`) values (1,1),(1,2),(1,3),(1,4),(1,5),(1,9),(1,10),(2,11),(2,12),(3,13);

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
  KEY `fk_rechazoPostulante_evaluacionPostulate1_idx` (`id_evaluacionPost`),
  CONSTRAINT `fk_rechazoPostulante_evaluacionPostulate1` FOREIGN KEY (`id_evaluacionPost`) REFERENCES `evaluacionpostulante` (`id_evaluacionPost`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `rechazopostulante` */

/*Table structure for table `renovacion_matricula` */

DROP TABLE IF EXISTS `renovacion_matricula`;

CREATE TABLE `renovacion_matricula` (
  `id_renovacionMat` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL,
  `Id_semestre` int(11) DEFAULT NULL,
  `Id_ciclo` int(11) DEFAULT NULL,
  `cod_pago` varchar(45) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_matricula` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_renovacionMat`,`id_alumno`),
  KEY `fk_renovacion_matricula_alumnos1_idx` (`id_alumno`),
  CONSTRAINT `fk_renovacion_matricula_alumnos1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `renovacion_matricula` */

insert  into `renovacion_matricula`(`id_renovacionMat`,`id_alumno`,`Id_semestre`,`Id_ciclo`,`cod_pago`,`fecha`,`id_matricula`) values (1,1,2,2,'002578','2019-01-23 05:00:00',1);

/*Table structure for table `requisitos` */

DROP TABLE IF EXISTS `requisitos`;

CREATE TABLE `requisitos` (
  `id_requisito` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `archivo` text,
  PRIMARY KEY (`id_requisito`,`id_persona`),
  KEY `fk_requisitos_persona1_idx` (`id_persona`),
  CONSTRAINT `fk_requisitos_persona1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `requisitos` */

/*Table structure for table `seccion` */

DROP TABLE IF EXISTS `seccion`;

CREATE TABLE `seccion` (
  `id_seccion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_seccion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `seccion` */

insert  into `seccion`(`id_seccion`,`descripcion`) values (1,'A'),(2,'B'),(3,'UNICA');

/*Table structure for table `semestre` */

DROP TABLE IF EXISTS `semestre`;

CREATE TABLE `semestre` (
  `id_semestre` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_semestre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `semestre` */

insert  into `semestre`(`id_semestre`,`descripcion`) values (1,'2018 - ciclo 1 Marzo'),(2,'2018 - ciclo 2 Agosto'),(3,'2019 - ciclo 1 Marzo');

/*Table structure for table `tipo_alumno` */

DROP TABLE IF EXISTS `tipo_alumno`;

CREATE TABLE `tipo_alumno` (
  `id_talumno` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_talumno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tipo_alumno` */

insert  into `tipo_alumno`(`id_talumno`,`descripcion`) values (1,'BECA 18'),(2,'BECA PARROQUIA'),(3,'PAGANTE');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tipo_persona` */

insert  into `tipo_persona`(`id_tpersona`,`descripcion`) values (1,'postulante'),(2,'docente'),(3,'administrativo');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id_usuario`,`id_persona`,`usuario`,`password`,`foto`,`email`,`estado`,`intentos`) values (1,1,'kaltamirano','123','views\\images\\img-usuarios\\user-kevin.png','ivan123altamirano@gmail.com','AC',NULL),(2,2,'ytorres','123','views\\images\\img-usuarios\\user-yoni.png','yonitorres@gmail.com','AC',NULL),(3,3,'lperez','123','views\\images\\img-usuarios\\user-leo.png','leoperez@gmail.com','AC',NULL),(4,4,'fcartolin','123','views\\images\\img-usuarios\\user-fidel.png','fidelcartolin@gmail.com','AC',NULL),(5,5,'jalvitrez','123','views\\images\\img-usuarios\\user-jhoon.png','jhonalvitrez@gmail.com','AC',NULL);

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

insert  into `usuarios_perfiles`(`id_usuario`,`id_perfil`) values (1,1),(2,1),(3,2),(4,2),(5,3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
