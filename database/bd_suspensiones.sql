-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: regular
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `afiliado`
--

DROP TABLE IF EXISTS `afiliado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `afiliado` (
  `no_afiliado` bigint NOT NULL,
  `cui` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `ibm` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_tipo_afiliado` int DEFAULT NULL,
  `dependencia` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cargo` int DEFAULT NULL,
  `colaborador` enum('y','n') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reglon` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`no_afiliado`),
  KEY `afiliado_ibfk_2` (`id_cargo`),
  KEY `fk_afiliado_tipo_afiliado1` (`id_tipo_afiliado`),
  CONSTRAINT `afiliado_ibfk_2` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE,
  CONSTRAINT `fk_afiliado_tipo_afiliado1` FOREIGN KEY (`id_tipo_afiliado`) REFERENCES `tipo_afiliado` (`Id_tipo_afiliado`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afiliado`
--

LOCK TABLES `afiliado` WRITE;
/*!40000 ALTER TABLE `afiliado` DISABLE KEYS */;
INSERT INTO `afiliado` VALUES (1111111111,'1234566666666','Roberto','Gomez Bola??os','12342234','Totonicapan','Masculino','2022-12-01',NULL,NULL,NULL,NULL,NULL,NULL),(1234567890987,'6545667899999','Edwin','Pretzantzin','123456788','Quetzaltenango','Masculino','2022-12-01',NULL,NULL,NULL,NULL,NULL,NULL),(3333333333333,NULL,'Armando','Mendoza','14321343',NULL,'Masculino',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `afiliado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `area` (
  `id_area` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'CONSULTA EXTERNA','AREA DEDICADA A LA ATENCION DE QUE INGRESAN POR CONSULTA'),(2,'EMERGENCIA','AREA DE EMERGENCIAS'),(3,'HOSPITALIZACION','AREA DE HOSPITALIZACION');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bitacora` (
  `id_bitacora` int NOT NULL AUTO_INCREMENT,
  `fecha_hora` datetime NOT NULL,
  `accion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_bitacora`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cargo` (
  `id_cargo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'Operador de Consola B  '),(2,'Registrador de Datos '),(3,'Ingeniero'),(4,'Operador de Consola A  '),(5,'Secretaria A '),(6,'Jefe de Divisi??n '),(7,'Secretaria B '),(8,'Director de Unidad E '),(9,'Sub Director Financiero E '),(10,'Sub Director Administrativo E\\n'),(11,'Administrador C  '),(12,'Asistente Administrativo A '),(13,'Asistente Administrativo B '),(14,'Asistente Administrativo C '),(15,'Auditor D '),(16,'Analista A '),(17,'Analista B '),(18,'Oficial Administrativo '),(19,'Agente de seguridad '),(20,'Alba??il A '),(21,'Alba??il B '),(22,'Aplanchador '),(23,'Archivista '),(24,'Arquitecto '),(25,'Asesor Jur??dico Departamental '),(26,'Asistente de Ingeniero o Arquitecto A '),(27,'Asistente de Ingeniero o Arquitecto B '),(28,'Asistente de Autopsia '),(29,'Auxiliar de enfermer??a  '),(30,'Ayudante de Enfermer??a '),(31,'Bibliotecario A '),(32,'Biom??dico '),(33,'Bodeguero A '),(34,'Bodeguero B '),(35,'Camarero '),(36,'Carpintero A '),(37,'Carpintero B '),(38,'Cocinero A '),(39,'Cocinero B '),(40,'Conserje '),(41,'Costurera '),(42,'Dibujante B '),(43,'Dientista '),(44,'Ec??nomo '),(45,'Edecan '),(46,'Educador de Salud '),(47,'Electricista A '),(48,'Electricista B '),(49,'Encargado de Bodega A '),(50,'Encargado de Bodega B '),(51,'Encargado de Camareros  '),(52,'Encargado de Costurer??a '),(53,'Encargado de Rama de Electricidad '),(54,'Encargado de Lavander??a '),(55,'Encargado de Mantenimiento B '),(56,'Encargado de Plomer??a '),(57,'Encargado de Registros M??dicos B '),(58,'Encargado de Roper??a B '),(59,'Enfermera Graduada '),(60,'Estad??stico B '),(61,'Fot??grafo '),(62,'Herrero A '),(63,'Herrero B '),(64,'Ingeniero en Calidad  '),(65,'Jardinero '),(66,'Ingeniero en Sistemas Informaticos '),(67,'Jefe de Bodega y Almac??n '),(68,'Jefe de Departamento Cl??nico '),(69,'Jefe de Farmacia '),(70,'Jefe de Laboratorio Cl??nico '),(71,'Jefe de Servicio de Enfermer??a '),(72,'Jefe de Servicio M??dico '),(73,'Jefe de Unidad de Especialidad '),(74,'Mec??nico A '),(75,'Mec??nico B '),(76,'M??dico Especialista A de 4 horas '),(77,'M??dico Especialista A de 4 horas con turnos '),(78,'M??dico Especialista A de 6 horas '),(79,'M??dico Especialista A de 8 horas '),(80,'M??dico Especialista B '),(81,'M??dico Especialista B de 8 horas '),(82,'M??dico General con turno de 6 horas '),(83,'M??dico General de 4 horas '),(84,'M??dico General con turno de 4 horas '),(85,'M??dico General de 8 horas '),(86,'Residente EPS-EM '),(87,'Nutricionista '),(88,'Odont??logo General de 4 horas '),(89,'Odont??logo General de 8 horas '),(90,'Operador de Consola B '),(91,'Operador de M??quina Lavadora '),(92,'Piloto de Veh??culo '),(93,'Pintor '),(94,'Plomero '),(95,'Procurador B Departamental '),(96,'Psic??logo A '),(97,'Psic??logo B '),(98,'Qu??mico Bi??logo '),(99,'Qu??mico Farmac??utico '),(100,'Secretaria Ejecutiva B '),(101,'Sub Jefe de Laboratorio Cl??nico '),(102,'Sub Director M??dico Hospitalario E '),(103,'Superintendente de Enfermer??a '),(104,'Supervisor de Enfermer??a  '),(105,'T??cnico de Laboratorio '),(106,'T??cnico en Banco de Sangre '),(107,'T??cnico en Citolog??a Exfoliativa '),(108,'T??cnico en Farmac??a '),(109,'T??cnico en Patolog??a '),(110,'T??cnico en Radiolog??a '),(111,'T??cnico en Trabajo Social '),(112,'Terapista '),(113,'Trabajador Social '),(114,'Mecanico de Calderas B '),(115,'Ingeniero en Mantenimiento '),(116,'M??dico Residente I '),(117,'Supervisor de Seguridad '),(118,'M??dico Especialista A de 6 horas con turnos '),(119,'Jefe de Cocina '),(120,'Encargado de Alba??iler??a '),(121,'M??dico Especialista A de 6 horas con turnos '),(122,'M??dico Residente II '),(123,'T??cnico en Hemodi??lisis  '),(124,'M??dico Especialista de Consulta Externa de 6 horas  '),(125,'M??dico Residente III ');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clinica_servicio`
--

DROP TABLE IF EXISTS `clinica_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clinica_servicio` (
  `id_clinica_servicio` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_especialidad` int DEFAULT NULL,
  `id_area` int DEFAULT NULL,
  `correlativo` int NOT NULL DEFAULT '1',
  `correlativo_rechazado` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_clinica_servicio`),
  KEY `fk_clinica/servicio_area1` (`id_area`),
  KEY `fk_clinica/servicio_especialidad1` (`id_especialidad`),
  CONSTRAINT `fk_clinica/servicio_area1` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`) ON DELETE CASCADE,
  CONSTRAINT `fk_clinica/servicio_especialidad1` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clinica_servicio`
--

LOCK TABLES `clinica_servicio` WRITE;
/*!40000 ALTER TABLE `clinica_servicio` DISABLE KEYS */;
INSERT INTO `clinica_servicio` VALUES (1,'MEDICINA INTERNA','MI-COEX',1,1,1,1),(2,'ENFERMEDAD COM??N','MI-COEX',1,1,1,1),(3,'GINECOLOGIA','GINE-COEX',2,1,1,1),(4,'OBSTETRICIA','GINE-COEX',2,1,1,1),(5,'ORTOPEDIA Y TRAUMATOLOGIA','TRAUMA-COEX',3,1,1,1),(6,'CIRUGIA DE LA MANO','TRAUMA-COEX',3,1,1,1),(7,'NEUROLOGIA','UMA-COEX',4,1,1,1),(8,'COLOPROCTOLOG??A','UMA-COEX',4,1,1,1),(9,'ENFERMEDAD COM??N','UMA-COEX',4,1,1,1),(10,'NEUMOLOG??A','UMA-COEX',4,1,1,1),(11,'MEDICINA FISICA','MF-COEX',5,1,1,1),(12,'PSIQUIATRIA','MF-COEX',5,1,1,1),(13,'ODONTOLOG??A','ODONTO-COEX',6,1,1,1),(14,'CIRUGIA ORAL Y MAXILOFACIAL','ODONTO-COEX',6,1,1,1),(15,'REUMATOLOG??A','ESPE-COEX',7,1,1,1),(16,'OTORRINOLARINGOLOG??A','ESPE-COEX',7,1,1,1),(17,'OFTALMOLOG??A','ESPE-COEX',7,1,1,1),(18,'CIRUG??A GENERAL','CIRU-COEX',8,1,1,1),(19,'CIRUG??A ONCOL??GICA','CIRU-COEX',8,1,1,1),(20,'DERMATOLOG??A','CIRU-COEX',8,1,1,1),(21,'NEFROLOG??A','NEFRO-COEX',9,1,1,1),(22,'CALL CENTER COVID 19','COVID-COEX',10,1,1,1),(23,'MEDICINA INTERNA HOMBRES','MI-HOSPI',1,3,1,1),(24,'MEDICINA INTERNA MUJERES','MI-HOSPI',1,3,1,1),(25,'CIRUG??A HOMBRES','CIRU-HOSPI',11,3,1,1),(26,'CIRUG??A MUJERES','CIRU-HOSPI',11,3,1,1),(27,'TRAUMATOLOGIA HOMBRES','TRAUMA-HOSPI',3,3,1,1),(28,'TRAUMATOLOGIA MUJERES','TRAUMA-HOSPI',3,3,1,1),(29,'GINECOLOG??A','GINE-HOSPI',2,3,1,1),(30,'OBSTETRICIA','GINE-HOSPI',2,3,1,1),(31,'COVID HOMBRES','COVID-HOSPI',10,3,1,1),(32,'COVID MUJERES','COVID-HOSPI',10,3,1,1),(33,'ENFERMEDAD','MI-EMER',1,2,1,1),(34,'ENFERMEDAD','GINE-EMER',2,2,1,1),(35,'MATERNIDAD','GINE-EMER',2,2,1,1),(36,'ENFERMEDAD','CIRU-EMER',12,2,1,1),(37,'ACCIDENTE','CIRU-EMER',12,2,1,1),(38,'ENFERMEDAD','TRAUMA-EMER',3,2,1,1),(39,'ACCIDENTE','TRAUMA-EMER',3,2,1,1),(40,'COVID','COVID-EMER',10,2,1,1),(41,'REGISTROS MEDICOS','CASOS-REGMED',NULL,NULL,1,1);
/*!40000 ALTER TABLE `clinica_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `control_requerimiento`
--

DROP TABLE IF EXISTS `control_requerimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `control_requerimiento` (
  `id_control_requerimiento` int NOT NULL AUTO_INCREMENT,
  `codigo_requerimiento` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  `url_pdf` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacones` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id_control_requerimiento`),
  KEY `fk_control_requerimiento_users1` (`users_id`),
  CONSTRAINT `fk_control_requerimiento_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `control_requerimiento`
--

LOCK TABLES `control_requerimiento` WRITE;
/*!40000 ALTER TABLE `control_requerimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `control_requerimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dependencia`
--

DROP TABLE IF EXISTS `dependencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dependencia` (
  `id_dependencia` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_dependencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dependencia`
--

LOCK TABLES `dependencia` WRITE;
/*!40000 ALTER TABLE `dependencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `dependencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encabezado`
--

DROP TABLE IF EXISTS `encabezado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `encabezado` (
  `nombre_destinatario` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saludo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lugar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `despedida` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encabezado`
--

LOCK TABLES `encabezado` WRITE;
/*!40000 ALTER TABLE `encabezado` DISABLE KEYS */;
/*!40000 ALTER TABLE `encabezado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidad`
--

DROP TABLE IF EXISTS `especialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `especialidad` (
  `id_especialidad` int NOT NULL AUTO_INCREMENT,
  `nombre_especialidad` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_especialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidad`
--

LOCK TABLES `especialidad` WRITE;
/*!40000 ALTER TABLE `especialidad` DISABLE KEYS */;
INSERT INTO `especialidad` VALUES (1,'MEDICINA INTERNA',NULL),(2,'GINECOLOG??A',NULL),(3,'TRAUMATOLOG??A',NULL),(4,'UMA',NULL),(5,'MEDICINA F??SICA',NULL),(6,'ODONTOLOG??A',NULL),(7,'ESPECIALIDADES',NULL),(8,'CIRUG??A GENERAL',NULL),(9,'NEFROLOG??A',NULL),(10,'COVID-19',NULL),(11,'CIRUGIA GENERAL',NULL),(12,'CIRUG??A',NULL);
/*!40000 ALTER TABLE `especialidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formulario`
--

DROP TABLE IF EXISTS `formulario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formulario` (
  `id_formulario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_formulario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formulario`
--

LOCK TABLES `formulario` WRITE;
/*!40000 ALTER TABLE `formulario` DISABLE KEYS */;
INSERT INTO `formulario` VALUES (1,'DPD-01','Documento de Apertura'),(2,'DEA','Documento Electronico de Acreditaci??n'),(3,'SPS-60','Aviso de Suspensi??n'),(4,'SPS-58','Aviso de Suspensi??n de Trabajo por Maternidad'),(5,'SPS-59','Alta al Patrono'),(6,'SPS-53','Informe de Incapacidad Temporal'),(7,'SPS-172','Dictamen de M??dico Final'),(8,'SPS-56','Aviso de Ingreso por Traslado'),(9,'SPS-57','Informe de Traslado'),(10,'SPS-57A','Informe Sobre Reingreso'),(11,'SPS-147','Control de Asistencia');
/*!40000 ALTER TABLE `formulario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formulario_suspencion`
--

DROP TABLE IF EXISTS `formulario_suspencion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formulario_suspencion` (
  `id_formulario_suspencion` int NOT NULL AUTO_INCREMENT,
  `id_formulario` int NOT NULL,
  `id_suspension` int NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_formulario_suspencion`),
  KEY `fk_formulario_suspencion_formulario1` (`id_formulario`),
  KEY `fk_formulario_suspencion_suspension1` (`id_suspension`),
  CONSTRAINT `fk_formulario_suspencion_formulario1` FOREIGN KEY (`id_formulario`) REFERENCES `formulario` (`id_formulario`) ON DELETE CASCADE,
  CONSTRAINT `fk_formulario_suspencion_suspension1` FOREIGN KEY (`id_suspension`) REFERENCES `suspension` (`id_suspension`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formulario_suspencion`
--

LOCK TABLES `formulario_suspencion` WRITE;
/*!40000 ALTER TABLE `formulario_suspencion` DISABLE KEYS */;
/*!40000 ALTER TABLE `formulario_suspencion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medico`
--

DROP TABLE IF EXISTS `medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medico` (
  `colegiado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especialidad` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_especialidad` int DEFAULT NULL,
  PRIMARY KEY (`colegiado`),
  KEY `fk_medico_especialidad1` (`id_especialidad`),
  CONSTRAINT `fk_medico_especialidad1` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medico`
--

LOCK TABLES `medico` WRITE;
/*!40000 ALTER TABLE `medico` DISABLE KEYS */;
INSERT INTO `medico` VALUES ('1000016','Walfred Abel Escobar Calder??n',NULL,NULL,NULL),('1000017','Oscar Daniel Sum Quijivix',NULL,NULL,NULL),('1000070','Allan Andre Rodr??guez Molina',NULL,NULL,NULL),('1000160','Shirley Jeanette L??pez Marroqu??n',NULL,NULL,NULL),('1000251','Yadira Lisbeth M??rida Escobedo',NULL,NULL,NULL),('1000252','Lisbeth Magaly Maldonado Barrios',NULL,NULL,NULL),('1000254','Glenda Vanessa G??mez Aceytuno',NULL,NULL,NULL),('1000275','Williams Josu?? Chamorro Tal??',NULL,NULL,NULL),('1000450','Deisy Carolina Elizabeth Ixcaquic Son',NULL,NULL,NULL),('1000451','Lesly Gabriela Guti??rrez D??vila',NULL,NULL,NULL),('1000452','Marilogi Alvarez Xuruc',NULL,NULL,NULL),('1000453','Ana Mariela Montenegro Solares',NULL,NULL,NULL),('1000454','Johann??n Adin Tajtaj Veliz',NULL,NULL,NULL),('1000455','Carlos Eduardo Guti??rrez L??pez',NULL,NULL,NULL),('1000458','Hilda Mar??a Perez Montalv??n',NULL,NULL,NULL),('1000459','Jos?? Manuel Silvestre Loarca',NULL,NULL,NULL),('1000460','Antonia Gonz??lez Alvarez',NULL,NULL,NULL),('1000589','Heidi Tatiana Fuentes Canales',NULL,NULL,NULL),('1000591','Walter Albino Quiejnay Gonz??lez',NULL,NULL,NULL),('1000618','H??ctor Mesala Escobar Rodr??guez',NULL,NULL,NULL),('1000957','Juana Mar??aXuruc Batz',NULL,NULL,NULL),('1000960','Andrea EvicelaZamora Argueta',NULL,NULL,NULL),('1001033','Mar??a GabrielaAncheta Gonz??lez',NULL,NULL,NULL),('1001117','Luis Francisco Herrera Aquino',NULL,NULL,NULL),('1001399','Emerson No??Calder??n Barrios',NULL,NULL,NULL),('1001400','Floridalma Isabel Quijivix Ixquiac',NULL,NULL,NULL),('1001402','Yeimi DennisseMorales Rodas',NULL,NULL,NULL),('1001403','Mar??a del C??rmenCastillo Villatoro',NULL,NULL,NULL),('1001432','Alba BenitaJimenez Xum',NULL,NULL,NULL),('1001433','Jos?? F??lixZarat M??ndez',NULL,NULL,NULL),('1001435','Juan Francisco Rios Bucaro',NULL,NULL,NULL),('1001436','Luis AugustoP??rez Orozco',NULL,NULL,NULL),('1001437','Pablo Efra??n Vel??squez Casta??eda',NULL,NULL,NULL),('1001719','Vasthy BriseiraOrozco Fuentes',NULL,NULL,NULL),('1001725','Cristian LorenzoCh??vez Zamora',NULL,NULL,NULL),('1001726','Edgar FernandoSum Racancoj',NULL,NULL,NULL),('1001727','Juan SantiagoZapeta ??vila',NULL,NULL,NULL),('1001728','Bryan Jos?? Hidalgo Gil',NULL,NULL,NULL),('1001729','Mar??a Cristina Del Carmen Monterroso Sosa',NULL,NULL,NULL),('1001730','Andrea del Carmen Ruano D??az',NULL,NULL,NULL),('1001731','Monica Lucia Castillo L??pez',NULL,NULL,NULL),('1001736','Claudia Lucrecia L??pez Castillo',NULL,NULL,NULL),('1001737','Hansel Roberto Argueta Garc??a',NULL,NULL,NULL),('1001738','Mar??a AlejandraBarrios de Le??n',NULL,NULL,NULL),('1001739','Anyee Gabriela De Le??n Miranda',NULL,NULL,NULL),('1001740','Kristy Mar??a Solares Rodr??guez',NULL,NULL,NULL),('1001741','Mar??a FernandaM??rida Luna',NULL,NULL,NULL),('1001742','Edgar Estuardo Nimatuj Ca ',NULL,NULL,NULL),('1001851','Diana IvetteP??rez Baten',NULL,NULL,NULL),('1001868','Jos?? RobertoTay',NULL,NULL,NULL),('1001870','Christian DagobertoL??pez Santos',NULL,NULL,NULL),('1001998','Howard Romeo Bradley V??squez',NULL,NULL,NULL),('1001999','Claudia Carolina Guill??n Rivera',NULL,NULL,NULL),('1002013','Eusebia BeatrizGonz??lez Espinoza',NULL,NULL,NULL),('1002026','Gary AlbertoRam??rez Rubio',NULL,NULL,NULL),('1002046','Sergio Roberto Villatoro Am??zquita',NULL,NULL,NULL),('1002084','Gloria Lissette Villela De Le??n',NULL,NULL,NULL),('1002201','Angela Sof??aOvalle de Le??n',NULL,NULL,NULL),('1002409','Lizbeth Analy Cifuentes Mazariegos',NULL,NULL,NULL),('1002410','Otto Ren?? Samayoa Natareno',NULL,NULL,NULL),('1002411','Jorge Daniel Castillo Solis',NULL,NULL,NULL),('1002412','Andrea CoraliaLoarca Ch??vez',NULL,NULL,NULL),('1002413','Marilyn Nohemy Galicia Ju??rez',NULL,NULL,NULL),('1002416','Maya LauraMonterroso Fuentes',NULL,NULL,NULL),('1002417','Mar??a Mercedes Ral??n',NULL,NULL,NULL),('1002418','Katherinne Paola Najera Reyes',NULL,NULL,NULL),('1002419','Andrea Mar??a Yllescas Molina',NULL,NULL,NULL),('1002420','Margarita del Roc??oFuentes Figueroa',NULL,NULL,NULL),('1002421','Oscar FernandoL??pez Rodas',NULL,NULL,NULL),('1002422','Yoselin YaritzaMorales Vel??sco',NULL,NULL,NULL),('1002423','Cindy Paulita EstefanyG??mez Ram??rez',NULL,NULL,NULL),('1002526','Patrick Rolando Robles Diaz',NULL,NULL,NULL),('1002590','Seidy Lisbeth Monterroso Gonz??lez',NULL,NULL,NULL),('1002604','Jos?? Francisco Alvarado Estrada',NULL,NULL,NULL),('1002616','Carmen MariaOsoy Colop',NULL,NULL,NULL),('1002640','RolandoRo G??mez',NULL,NULL,NULL),('1002657','Efra??n Isa??Mazariegos Cottom',NULL,NULL,NULL),('1003174','Luis DavidG??mez Moscoso',NULL,NULL,NULL),('1003213','Taryn YuririaD??az de Le??n',NULL,NULL,NULL),('1003214','Ana BernardaHern??ndez Poz',NULL,NULL,NULL),('1003220','Karin MarissaChampet Soto ',NULL,NULL,NULL),('1003318','Lucy SuramaPe??ate Rangel ',NULL,NULL,NULL),('1003346','Dulce Mar??a Concepci??nFuentes Najarro',NULL,NULL,NULL),('1003408','Silvana EstefaniaCh??ves Torres',NULL,NULL,NULL),('1003510','Estefania Jackeline Mar??aBarrera de Le??n',NULL,NULL,NULL),('1003524','Kevin ArmandoTzum Zelada',NULL,NULL,NULL),('1003555','Ericka PatriciaCapriel Chiroy',NULL,NULL,NULL),('1003560','Jos?? RicardoGuzm??n Villatoro',NULL,NULL,NULL),('1003561','Eduardo AlbertoRamos P??rez',NULL,NULL,NULL),('1003836','C??sar ArmandoXec Ixcamparij',NULL,NULL,NULL),('1003837','Cynthia CorinaCastillo Villatoro',NULL,NULL,NULL),('1003838','Jenifer Zo?? De Le??n Ru??z',NULL,NULL,NULL),('1003840','Samanta Yazm??nUl??n P??rez',NULL,NULL,NULL),('1003841','Alba Mar??a Rosal D??az',NULL,NULL,NULL),('1003850','Mar??a XimenaMaldonado Higueros',NULL,NULL,NULL),('1003851','Marlee Walesska Gramajo Ambrosio',NULL,NULL,NULL),('1003935','Jos?? IsraelMacario Vel??squez',NULL,NULL,NULL),('1003942','Camilo QuicabTiu Grijalva',NULL,NULL,NULL),('1004124','Diego AlejandroMorales Alc??zar',NULL,NULL,NULL),('1004265','Estela Mar??aHerrera Medina ',NULL,NULL,NULL),('1004266','Lucrecia LorenaQuixtan Pon',NULL,NULL,NULL),('1004280','Astrid Ang??licaDe Le??n Ronquillo',NULL,NULL,NULL),('1004323','Adria GennineGod??nez Zepeda',NULL,NULL,NULL),('1004344','Rossana IbetheBarrios Osorio',NULL,NULL,NULL),('1004349','Jorge NoeDe Leon Colop',NULL,NULL,NULL),('1004367','Delia Mar??aReyes Escobar',NULL,NULL,NULL),('1004387','Katherine Madelyn Roc??oRodr??guez Fuentes',NULL,NULL,NULL),('1004388','Edwyn JhowanyPol Ceto',NULL,NULL,NULL),('1004405','Wilmar RafaelLopez Monterroso',NULL,NULL,NULL),('1004452','Giezy GerardineGarc??a Guerra',NULL,NULL,NULL),('1004587','Joellyn JeminaReyes Villagr??n',NULL,NULL,NULL),('2001426','Juan HeberCastella??os Qui????nez',NULL,NULL,NULL),('2002689','Luis Francisco Herrera Aquino',NULL,NULL,NULL),('2002771','Ericka PatriciaCapriel Chiroy',NULL,NULL,NULL),('2003036','Juan Alberto Quem?? Maldonado',NULL,NULL,NULL),('2003038','Beggli YeseniaCastro Rivas',NULL,NULL,NULL),('2003345','Mayra Surama Tistoj Villagr??n',NULL,NULL,NULL),('2003636','Dar??o EstuardoMencos Ariza',NULL,NULL,NULL),('2003748','Alfredo EnriqueRubio Herrera',NULL,NULL,NULL),('2003780','Aldo HumbertoMej??a Macario',NULL,NULL,NULL),('2004069','Eduardo AlbertoRamos P??rez',NULL,NULL,NULL),('2004070','Nancy Melina IvetteMendoza Calmo',NULL,NULL,NULL),('2004095','Mar??a Jos??Morfin Oroxon',NULL,NULL,NULL),('2004097','Laura Roc??oRu??z Am??zquita',NULL,NULL,NULL),('2004101','Cristian ManuelV??squez Vel??squez',NULL,NULL,NULL),('2004103','Ingrid PaolaG??mez Cort??z',NULL,NULL,NULL),('2004278','Jos?? IsraelMacario Vel??squez',NULL,NULL,NULL),('2004390','Vera LuciaTurnil Ramos',NULL,NULL,NULL),('2004397','Esteban RafaelArriola Qui??onez',NULL,NULL,NULL),('2004418','M??nica Lizeth Garc??a Ram??rez',NULL,NULL,NULL),('2004452','Ingrid PatriciaToyom Zapeta',NULL,NULL,NULL),('2004569','Sindy RosalbaRam??rez Sanchez',NULL,NULL,NULL),('2004570','Edna Ang??lica EmperatrizAguilar Cotom',NULL,NULL,NULL),('2004571','Karen ElizabethL??pez Reyna',NULL,NULL,NULL),('2004572','Yecenia del RosarioSabaj Cital??n',NULL,NULL,NULL),('2004609','MichelleAguilar Quijiv??x',NULL,NULL,NULL),('2004610','Wendy YomaraCifuentes Mijangos',NULL,NULL,NULL),('2004611','Vera AracelyMench?? Garc??a',NULL,NULL,NULL),('2004614','Nancy PaolaCotom Ch??vez',NULL,NULL,NULL),('2004615','Luis ManuelL??pez Ramos',NULL,NULL,NULL),('2004616','Mieily PaolaAlva Vel??squez',NULL,NULL,NULL),('2004617','Ana BernardaHern??ndez Poz',NULL,NULL,NULL),('2004618','Carlos GiovanniAlvarez Godinez',NULL,NULL,NULL),('2004619','Sandra Paola Mishel Sac Toc',NULL,NULL,NULL),('2004620','Edith OneliaDe Le??n V??squez',NULL,NULL,NULL),('2004621','Paula Mar??aGuti??rrez de Le??n',NULL,NULL,NULL),('2004622','Hugo AlexanderIxcopal Xitumul',NULL,NULL,NULL),('2004660','Diego ManuelLoarca Navarro',NULL,NULL,NULL),('2004661','Glendy LorenaHern??ndez de Le??n',NULL,NULL,NULL),('2004665','Lida Frin??Cruz Aguirre',NULL,NULL,NULL),('2004666','Lesly ClaireM??rquez Arreaga',NULL,NULL,NULL),('2004685','David EstuardoNavarro Loarca',NULL,NULL,NULL),('2004687','Mar??a FernandaZacar??as Sig??enza',NULL,NULL,NULL),('2004739','C??rmen Sof??aCifuentes Rodas',NULL,NULL,NULL),('2004740','Roxana MilagrosAlvarez Navarro',NULL,NULL,NULL),('2004742','Eleazar MahelyCasta??on D??az',NULL,NULL,NULL),('2004834','Denis Ren??Cuc V??squez',NULL,NULL,NULL),('2004835','William RobertoSuchite Raxt??n',NULL,NULL,NULL),('2004863','Byron RobertoMiranda Orozco',NULL,NULL,NULL),('2004866','Sara ElizabethReyes G??mez',NULL,NULL,NULL),('2004894','Juana GriceldaL??pez Mart??nez',NULL,NULL,NULL),('2004895','Marvin Joel LeonelChan Hern??ndez',NULL,NULL,NULL),('2004897','Josselyn IvonneP??rez Chan',NULL,NULL,NULL),('2004981','Marco AntonioRoblero Vel??squez',NULL,NULL,NULL),('2005000','Olga Roc??oCurruchiche Cigarroa',NULL,NULL,NULL),('2005061','Luis Mois??sCoyoy Yax',NULL,NULL,NULL),('2005162','Johanna LucreciaGuti??rrez Ixquiac',NULL,NULL,NULL),('2005232','Ruth AlejandraShiloj Barrera',NULL,NULL,NULL),('2005271','Erick AlfonsoMolina Abad??a',NULL,NULL,NULL),('2005357','Gabriela Yanneth Garc??a L??pez',NULL,NULL,NULL),('2005675','Delia Soph??a del Cid Castillo',NULL,NULL,NULL),('2005676','Karen Mary GabrielaYax Toyom',NULL,NULL,NULL),('2005677','Karla Yesenia Miranda Sandoval',NULL,NULL,NULL),('2005678','Lucrecia LorenaQuixtan Pon',NULL,NULL,NULL),('2005679','Julio C??sar Castillo Pac',NULL,NULL,NULL),('2005734','Joellyn JeminaReyes Villagr??n',NULL,NULL,NULL),('2005782','Rossana Ibethe Barrios Osorio',NULL,NULL,NULL),('2005922','Ang??lica del RosarioMaldonado de Le??n',NULL,NULL,NULL),('2005937','Jorge RobertoR??os Zambrano',NULL,NULL,NULL),('2005958','Hugo AldoTzoc Lac??n',NULL,NULL,NULL),('2006009','Giezy GerardineGarc??a Guerra',NULL,NULL,NULL),('2006028','Massiel AlejandraM??ndez L??pez',NULL,NULL,NULL),('2006064','Kevin ErnestoEstrada Gonz??lez',NULL,NULL,NULL),('2006066','Rodrigo Andr??sBautista Rodas',NULL,NULL,NULL),('2006100','Bladimir Wilmer FranciscoAguar?? G??mez',NULL,NULL,NULL),('2006116','Jos?? RicardoGuzm??n Villatoro',NULL,NULL,NULL),('2006144','Jesus EstuardoEscobar Castillo',NULL,NULL,NULL),('2006154','Edwyn JhowanyPol Ceto',NULL,NULL,NULL),('2006186','Gloria SucelySoch Pacheco',NULL,NULL,NULL),('2006191','Gustavo AdolfoRamos Yax',NULL,NULL,NULL),('2006291','Mar??a GabrielaArg??ello Serrano',NULL,NULL,NULL),('2006340','Wilmar RafaelLopez Monterroso',NULL,NULL,NULL),('2006382','Luis AdanRodas Santos ',NULL,NULL,NULL),('2006529','Manuel AlbertoEstrada Taracena',NULL,NULL,NULL),('2006628','Wilder OsvelyBautista Arango',NULL,NULL,NULL),('2006788','Aywin AudelioPerez Arreaga',NULL,NULL,NULL),('2006789','Milvia Walhescka Cano Flores',NULL,NULL,NULL),('2006790','B??lsida LeonorBaten Lucas',NULL,NULL,NULL),('2006791','Camilo QuicabTiu Grijalva',NULL,NULL,NULL),('2006934','Astrid Ang??licaDe Le??n Ronquillo',NULL,NULL,NULL),('2006935','Kimberly Mar??a CristinaHerwing Alfaro',NULL,NULL,NULL),('2006936','Mirna AbelinaRamos P??rez',NULL,NULL,NULL),('2006937','M??rari Andre??naCastillo De Le??n',NULL,NULL,NULL),('2007027','Valeska IvetteHernandez Sao',NULL,NULL,NULL),('2007028','Ivonne Mar??a IvetteArgueta Cifuentes',NULL,NULL,NULL),('2007045','Nestor EmanuelLara Garc??a',NULL,NULL,NULL),('2007046','Isabel de LourdesAjutun Pelico',NULL,NULL,NULL),('2007047','Hilda LeonorD??az Mora',NULL,NULL,NULL),('2007049','Rafael VinicioGonz??lez Gil',NULL,NULL,NULL),('2007050','Elisa RosmeryMart??nez Mart??nez',NULL,NULL,NULL),('2007116','Astrid AnalisseMendoza Molina',NULL,NULL,NULL),('2007125','Alejandra Anal??Mazariegos Flores',NULL,NULL,NULL),('2007162','Estela Mar??aHerrera Medina ',NULL,NULL,NULL),('2007163','Erick DanielQuijivix Gonzalez',NULL,NULL,NULL),('2007209','Leonel Jos??Gonz??lez De Le??n',NULL,NULL,NULL),('2007279','Jos??  Andr??Barraza Gomez',NULL,NULL,NULL),('2007280','German RodolfoSac L??pez',NULL,NULL,NULL),('2007397','Jorge EstuardoHerrera Palacios',NULL,NULL,NULL),('2007398','Marlon Esa??Illescas Ruano',NULL,NULL,NULL),('2007504',' Evelyn YazminOlivia Guti??rrez',NULL,NULL,NULL),('2007601','Alexia YomaraTacam Son',NULL,NULL,NULL),('2007602','Antulio Josu??Requena Vel??squez',NULL,NULL,NULL),('2007710','Maritza Elodia Marina EulaliaCupil Barrios',NULL,NULL,NULL),('2007886','Margarita del RosarioChan Vicente',NULL,NULL,NULL),('2008058','Mar??a AzucenaGarc??a Bautista',NULL,NULL,NULL),('2008059','Jos?? FerlandyEscobar Portillo',NULL,NULL,NULL),('24731','Hania Veronica Chavez Alonzo',NULL,NULL,NULL),('24749','Edgar Vinicio Molina De Le??n',NULL,NULL,NULL),('25342','Danilo Bosbely De Le??n Valdez',NULL,NULL,NULL),('29919','Enrique Ottoniel Aguilar Toc',NULL,NULL,NULL),('30427','H??ctor Eduardo Lac??n De Le??n',NULL,NULL,NULL),('31518','ASP-Gabriela Noemi Mejia Say',NULL,NULL,NULL),('31793','Edwin Raul Manrique Alvarado',NULL,NULL,NULL),('32024','ASP-Shirley AlejandraMolina Gordon',NULL,NULL,NULL),('32055','Heidy KarinaMorales Chuc',NULL,NULL,NULL),('33009','Ingrid Janelor??n Santiago Maldonado',NULL,NULL,NULL),('33230','ASP Karenn AntonioP??rez Ortega',NULL,NULL,NULL),('33312','ASP Laura YesseniaAlvarado Mar??n',NULL,NULL,NULL),('33365','ASP Gabriela Mar??a Bel??nHern??ndez Palacios',NULL,NULL,NULL),('33632','Jos?? Manuel Benavente Larios',NULL,NULL,NULL),('33771','Claudia Carolina Acevedo Montes',NULL,NULL,NULL),('34404','Miriam SucellyMaaz Rodr??guez',NULL,NULL,NULL),('35593','Eloisa Del Carmen Lopez Morales',NULL,NULL,NULL),('35613','Gustavo RamiroM??rida Reina Amaya',NULL,NULL,NULL),('35788','Vivian Natalia G??mez Garc??a',NULL,NULL,NULL),('37716','Julio C??sar Aguilar Rosales',NULL,NULL,NULL),('37734','Edgar Rolando Ch??n Pelic??',NULL,NULL,NULL),('37904','Victor Gustavo Garc??a Bautista',NULL,NULL,NULL),('37906','Tito Belizario Ixcot Mej??a',NULL,NULL,NULL),('37913','Cristina Ileana Racancoj Alonzo',NULL,NULL,NULL),('37914','Ana Luc??a Palomo Leppe',NULL,NULL,NULL),('37916','Manuel De Jes??s Ro G??mez',NULL,NULL,NULL),('37918','Selvin Francisco Gon??n Chan',NULL,NULL,NULL),('38011','Andrea Patricia Vital Acosta',NULL,NULL,NULL),('38025','Diana Gabriela Aguilar Soto',NULL,NULL,NULL),('38065','Carlos Arnulfo Gonzalez Juach??n',NULL,NULL,NULL),('38076','Aldo Juancarlos Calder??n Contreras',NULL,NULL,NULL),('38083','Luis Alberto Galo Hernandez',NULL,NULL,NULL),('38127','Julio Herolde Le??n Natareno',NULL,NULL,NULL),('38132','Heydi Marisol De Le??n Villagr??n',NULL,NULL,NULL),('38141','Saira Patricia De Le??n Santizo',NULL,NULL,NULL),('38168','K??vin Esa?? Soch Toh??m',NULL,NULL,NULL),('38170','Carlos Herberth M??ndez Sandoval',NULL,NULL,NULL),('38175','Benigno Hern??ndez Mar??n',NULL,NULL,NULL),('38192','Juan Jos?? Deyet Ar??valo',NULL,NULL,NULL),('38193','Juan Luis Vasquez Comparini',NULL,NULL,NULL),('38215','Pedro Antonio Bautista Dominguez',NULL,NULL,NULL),('38220','Paola Mercedes De Le??n',NULL,NULL,NULL),('38249','Jos?? Fernando De Le??n Laparra',NULL,NULL,NULL),('38251','Shary Rold??n Mej??a',NULL,NULL,NULL),('38252','Yesenia Sarah?? Vald??z Bautista',NULL,NULL,NULL),('38274','Nathaly Mishell Alonzo Garc??a',NULL,NULL,NULL),('38281','Jorge Luis Gutierrez Loarca',NULL,NULL,NULL),('38288','Mar??a Alejandra Tucux L??pez',NULL,NULL,NULL),('38290','Ruby Julieta Pisquiy MontesDe Oca',NULL,NULL,NULL),('38295','Irma Lizet Ovalle Darodes',NULL,NULL,NULL),('38299','Sulmy Paola De Paz Ch??vez',NULL,NULL,NULL),('38330','Lesly Nineth Vel??squez Monterroso',NULL,NULL,NULL),('38383','Jos?? Ra??l Ord????ez Villatoro',NULL,NULL,NULL),('38388','Rocio Iveth Garc??a Piedrasanta',NULL,NULL,NULL),('38411','Fernando Rodrigo Xet Monz??n',NULL,NULL,NULL),('38418','Rudy Am??lcar Estrada Lux',NULL,NULL,NULL),('38427','Luis Emilio Bucaro Echeverria',NULL,NULL,NULL),('38428','Adolfo Antonio Ochoa Cabrera',NULL,NULL,NULL),('38430','Fausto Alberto Chan Cux',NULL,NULL,NULL),('38432','Mercy Margoth Herrera Coyoy',NULL,NULL,NULL),('38439','Celly Anayt?? Rodr??guez Arango',NULL,NULL,NULL),('38478','Felix No?? Cojom Quijivix',NULL,NULL,NULL),('38479','Aura Madeleine Ram??rez Calder??n',NULL,NULL,NULL),('38480','Mar??a Regina Solares Azpur??',NULL,NULL,NULL),('38481','Marcos Dav??d Gonz??lez Mazariegos',NULL,NULL,NULL),('38482','Ana Iris V??squez Cifuentes',NULL,NULL,NULL),('38501','Aida Modesta Barreno Cital??n',NULL,NULL,NULL),('38502','Elisa Liliana Xiap Satey',NULL,NULL,NULL),('38528','Juan De Dios Morales Ralda',NULL,NULL,NULL),('38529','Ana Guisela Monz??n Guzm??n',NULL,NULL,NULL),('38531','Henry Oswaldo Pisquiy Quixtan',NULL,NULL,NULL),('38532','Iliana Mar??a Cifuentes D??az',NULL,NULL,NULL),('38533','Gustavo Adolfo Xec Zacar??as',NULL,NULL,NULL),('38535','Mariela Teresa Del Rosario Yax Escobedo',NULL,NULL,NULL),('38552','Gloria Nancy Yolanda Rosales Fern??ndez',NULL,NULL,NULL),('38561','Zaira Lucia Mej??a D??az',NULL,NULL,NULL),('38584','Alvaro Israel Hern??ndez L??pez',NULL,NULL,NULL),('38606','Gover Stev S??nchez Morales',NULL,NULL,NULL),('38610','Luc??a Alejandra Delgado Or??zco',NULL,NULL,NULL),('38717','Alejandra Sof??a Quem?? Figueroa',NULL,NULL,NULL),('38718','Marco Vinicio Alvarez Maldonado',NULL,NULL,NULL),('38719','Ana Isabel Chivalan Castro',NULL,NULL,NULL),('38720','Ruben Alejandro Morales De Leon',NULL,NULL,NULL),('38725','Jos?? Roberto Loarca Hern??ndez',NULL,NULL,NULL),('38897','Aura Violeta Boj Cotom',NULL,NULL,NULL),('38898','Evelin Lisseth L??pez Granados',NULL,NULL,NULL),('38967','Tania Paola Rodas Aceituno',NULL,NULL,NULL),('38968','Patrick Kenny Hern??ndez De Le??n',NULL,NULL,NULL),('38970','Orlando Ayerdi Mazariegos',NULL,NULL,NULL),('39109','Jeniffer Marizza L??pez Morales',NULL,NULL,NULL),('39141','Jorge Adalberto Pum Santiago',NULL,NULL,NULL),('39161','Lucrecia Leonor Guerrero Saso',NULL,NULL,NULL),('39281','Jackelinne Kimberly Cum Mis',NULL,NULL,NULL),('39344','Amelia Isabel Leiva Anderson',NULL,NULL,NULL),('39352','Victor Yax Leiva',NULL,NULL,NULL),('39372','Geny Kiomara G??mez Cotom',NULL,NULL,NULL),('39373','Reina Antonieta Maldonado Barrios',NULL,NULL,NULL),('39594','Luc??a Alejandra Garc??a De Le??n',NULL,NULL,NULL),('39716','Robinson Vinicio Hidalgo Herrera',NULL,NULL,NULL),('39717','Miguel Francisco Silvestre Vela',NULL,NULL,NULL),('39718','Rosalba Rosemary Rivas Herrera',NULL,NULL,NULL),('39752','Carlos Rodolfo Monterroso Bola??os',NULL,NULL,NULL),('39753','Evelyn Dinorah V??squez Barrios',NULL,NULL,NULL),('39767','Kevin Josu?? Del Valle Rivas',NULL,NULL,NULL),('39890','Carlos Eduardo Molina Samayoa',NULL,NULL,NULL),('39896','Wendy Eugenia Canel Rom??n',NULL,NULL,NULL),('39897','Mar??a RoselinaPerussina M??ndez',NULL,NULL,NULL),('39940','Rosa Elena Galindo D??az',NULL,NULL,NULL),('39941','Mar??a Paola Durini M??rida',NULL,NULL,NULL),('39942','Javier Orlando Sim L??pez',NULL,NULL,NULL),('39960','H??ctor Rocael Laparra Cifuentes',NULL,NULL,NULL),('39968','Mynor Renato Portillo Arag??n',NULL,NULL,NULL),('39997','Edgar Ricardo L??pez Osorio',NULL,NULL,NULL),('48566','Mireytt LizettCalder??n P??rez',NULL,NULL,NULL),('49085','Pablo Jos??Fuentes D??az',NULL,NULL,NULL),('75194','Walter Alexander Jimenez Ram??rez',NULL,NULL,NULL),('78196','Aura MichelleHerrera Flores',NULL,NULL,NULL),('78584','Gabriela Aracely Guzm??n L??pez',NULL,NULL,NULL),('79526','R??binson StuardoDe le??n Rodas',NULL,NULL,NULL);
/*!40000 ALTER TABLE `medico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_12_14_000001_create_personal_access_tokens_table',1),(2,'2022_11_10_234858_create_dependencia_table',1),(3,'2022_11_10_234859_create_cargo_table',1),(4,'2022_11_10_234900_create_tipo_afiliado_table',1),(5,'2022_11_10_234902_create_area_table',1),(6,'2022_11_10_234903_create_bitacora_table',1),(7,'2022_11_10_234904_create_especialidad_table',1),(8,'2022_11_10_234905_create_clinica_servicio_table',1),(9,'2022_11_10_234905_create_roles_table',1),(10,'2022_11_10_234906_create_users_table',1),(11,'2022_11_10_234907_create_control_requerimiento_table',1),(12,'2022_11_10_234908_create_encabezado_table',1),(13,'2022_11_10_234909_create_failed_jobs_table',1),(14,'2022_11_10_234910_create_formulario_table',1),(15,'2022_11_10_234911_create_medico_table',1),(16,'2022_11_10_234912_create_afiliado_table',1),(17,'2022_11_10_234912_create_riesgo_table',1),(18,'2022_11_10_234912_create_suspension_table',1),(19,'2022_11_10_234913_create_formulario_suspencion_table',1),(20,'2022_11_10_234914_create_permissions_table',1),(21,'2022_11_10_234917_create_model_has_roles_table',1),(22,'2022_11_10_234918_create_oficio_table',1),(23,'2022_11_10_234919_create_oficio_suspencion_table',1),(24,'2022_11_10_234920_create_password_resets_table',1),(25,'2022_11_10_234922_create_requerimiento_table',1),(26,'2022_11_10_234923_create_revision_oficio_table',1),(27,'2022_11_10_234924_create_rev_susp_table',1),(28,'2022_11_11_234925_create_model_has_permissions_table',1),(29,'2022_11_11_234929_create_role_has_permissions_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
INSERT INTO `model_has_permissions` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',1),(3,'App\\Models\\User',1),(4,'App\\Models\\User',1),(5,'App\\Models\\User',1),(6,'App\\Models\\User',1),(7,'App\\Models\\User',1),(8,'App\\Models\\User',1),(9,'App\\Models\\User',1),(10,'App\\Models\\User',1),(11,'App\\Models\\User',1),(12,'App\\Models\\User',1),(13,'App\\Models\\User',1),(14,'App\\Models\\User',1),(15,'App\\Models\\User',1),(16,'App\\Models\\User',1),(17,'App\\Models\\User',1),(18,'App\\Models\\User',1),(19,'App\\Models\\User',1),(20,'App\\Models\\User',1),(21,'App\\Models\\User',1),(22,'App\\Models\\User',1),(23,'App\\Models\\User',1),(24,'App\\Models\\User',1),(25,'App\\Models\\User',1),(26,'App\\Models\\User',1),(27,'App\\Models\\User',1),(28,'App\\Models\\User',1),(29,'App\\Models\\User',1),(30,'App\\Models\\User',1),(31,'App\\Models\\User',1),(32,'App\\Models\\User',1),(33,'App\\Models\\User',1),(34,'App\\Models\\User',1),(35,'App\\Models\\User',1),(36,'App\\Models\\User',1),(37,'App\\Models\\User',1),(38,'App\\Models\\User',1),(39,'App\\Models\\User',1),(40,'App\\Models\\User',1),(41,'App\\Models\\User',1),(42,'App\\Models\\User',1),(43,'App\\Models\\User',1),(44,'App\\Models\\User',1),(45,'App\\Models\\User',1),(46,'App\\Models\\User',1),(47,'App\\Models\\User',1),(48,'App\\Models\\User',1),(49,'App\\Models\\User',1),(50,'App\\Models\\User',1),(51,'App\\Models\\User',1),(52,'App\\Models\\User',1),(53,'App\\Models\\User',1),(54,'App\\Models\\User',1),(55,'App\\Models\\User',1),(56,'App\\Models\\User',1),(57,'App\\Models\\User',1),(58,'App\\Models\\User',1),(59,'App\\Models\\User',1),(60,'App\\Models\\User',1),(61,'App\\Models\\User',1),(62,'App\\Models\\User',1),(63,'App\\Models\\User',1),(64,'App\\Models\\User',1),(65,'App\\Models\\User',1),(66,'App\\Models\\User',1),(67,'App\\Models\\User',1),(68,'App\\Models\\User',1),(69,'App\\Models\\User',1),(70,'App\\Models\\User',1),(71,'App\\Models\\User',1),(72,'App\\Models\\User',1),(73,'App\\Models\\User',1),(74,'App\\Models\\User',1),(75,'App\\Models\\User',1),(76,'App\\Models\\User',1),(77,'App\\Models\\User',1),(78,'App\\Models\\User',1),(79,'App\\Models\\User',1),(80,'App\\Models\\User',1),(81,'App\\Models\\User',1),(82,'App\\Models\\User',1),(83,'App\\Models\\User',1),(84,'App\\Models\\User',1),(85,'App\\Models\\User',1),(86,'App\\Models\\User',1),(87,'App\\Models\\User',1),(88,'App\\Models\\User',1),(89,'App\\Models\\User',1),(90,'App\\Models\\User',1),(91,'App\\Models\\User',1),(92,'App\\Models\\User',1),(93,'App\\Models\\User',1),(94,'App\\Models\\User',1),(95,'App\\Models\\User',1),(96,'App\\Models\\User',1),(97,'App\\Models\\User',1),(98,'App\\Models\\User',1),(99,'App\\Models\\User',1),(100,'App\\Models\\User',1),(10,'App\\Models\\User',2),(11,'App\\Models\\User',2),(12,'App\\Models\\User',2),(13,'App\\Models\\User',2),(14,'App\\Models\\User',2),(15,'App\\Models\\User',2),(16,'App\\Models\\User',2),(17,'App\\Models\\User',2),(18,'App\\Models\\User',2),(39,'App\\Models\\User',2),(40,'App\\Models\\User',2),(83,'App\\Models\\User',2);
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oficio`
--

DROP TABLE IF EXISTS `oficio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oficio` (
  `id_oficio` int NOT NULL AUTO_INCREMENT,
  `destinatario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saludo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lugar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correlativo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clinica_servicio` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `despedida` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id_creador` bigint unsigned NOT NULL,
  `users_id_revisor` bigint unsigned DEFAULT NULL,
  `fecha_revision` date DEFAULT NULL,
  PRIMARY KEY (`id_oficio`),
  KEY `fk_oficio_users1` (`users_id_creador`),
  KEY `fk_oficio_users2` (`users_id_revisor`),
  CONSTRAINT `fk_oficio_users1` FOREIGN KEY (`users_id_creador`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_oficio_users2` FOREIGN KEY (`users_id_revisor`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oficio`
--

LOCK TABLES `oficio` WRITE;
/*!40000 ALTER TABLE `oficio` DISABLE KEYS */;
/*!40000 ALTER TABLE `oficio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oficio_suspencion`
--

DROP TABLE IF EXISTS `oficio_suspencion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oficio_suspencion` (
  `id_oficio_suspencion` int NOT NULL AUTO_INCREMENT,
  `id_oficio` int NOT NULL,
  `id_suspension` int NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_oficio_suspencion`),
  KEY `fk_oficio_suspencion_oficio1` (`id_oficio`),
  KEY `fk_oficio_suspencion_suspension1` (`id_suspension`),
  CONSTRAINT `fk_oficio_suspencion_oficio1` FOREIGN KEY (`id_oficio`) REFERENCES `oficio` (`id_oficio`) ON DELETE CASCADE,
  CONSTRAINT `fk_oficio_suspencion_suspension1` FOREIGN KEY (`id_suspension`) REFERENCES `suspension` (`id_suspension`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oficio_suspencion`
--

LOCK TABLES `oficio_suspencion` WRITE;
/*!40000 ALTER TABLE `oficio_suspencion` DISABLE KEYS */;
/*!40000 ALTER TABLE `oficio_suspencion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'user-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(2,'user-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(3,'user-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(4,'user-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(5,'user-reset','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(6,'role-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(7,'role-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(8,'role-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(9,'role-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(10,'oficio-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(11,'oficio-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(12,'oficio-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(13,'oficio-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(14,'oficio-validar','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(15,'suspension-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(16,'suspension-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(17,'suspension-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(18,'suspension-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(19,'rev_oficio-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(20,'rev_oficio-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(21,'rev_oficio-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(22,'rev_oficio-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(23,'rev_Suspension-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(24,'rev_Suspension-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(25,'rev_Suspension-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(26,'rev_Suspension-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(27,'formulario-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(28,'formulario-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(29,'formulario-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(30,'formulario-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(31,'archivo-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(32,'archivo-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(33,'archivo-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(34,'archivo-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(35,'reporte-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(36,'reporte-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(37,'reporte-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(38,'reporte-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(39,'afiliado-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(40,'afiliado-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(41,'afiliado-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(42,'afiliado-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(43,'tipo_afiliado-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(44,'tipo_afiliado-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(45,'tipo_afiliado-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(46,'tipo_afiliado-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(47,'area-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(48,'area-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(49,'area-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(50,'area-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(51,'especialidad-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(52,'especialidad-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(53,'especialidad-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(54,'especialidad-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(55,'clinica-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(56,'clinica-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(57,'clinica-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(58,'clinica-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(59,'medico-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(60,'medico-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(61,'medico-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(62,'medico-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(63,'riesgo-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(64,'riesgo-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(65,'riesgo-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(66,'riesgo-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(67,'dependencia-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(68,'dependencia-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(69,'dependencia-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(70,'dependencia-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(71,'formulario_suspension-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(72,'formulario_suspension-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(73,'formulario_suspension-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(74,'formulario_suspension-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(75,'oficio_suspension-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(76,'oficio_suspension-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(77,'oficio_suspension-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(78,'oficio_suspension-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(79,'revs-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(80,'revs-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(81,'revs-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(82,'revs-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(83,'req-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(84,'req-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(85,'req-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(86,'req-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(87,'respuesta-requerimiento-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(88,'requerimiento-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(89,'requerimiento-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(90,'requerimiento-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(91,'requerimiento-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(92,'susp-list','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(93,'susp-create','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(94,'susp-edit','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(95,'susp-delete','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(96,'slidebar-registrador','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(97,'slidebar-revisor','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(98,'slidebar-visor','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(99,'slidebar-admin','web','2022-12-19 16:29:13','2022-12-19 16:29:13'),(100,'historial-afiliado','web','2022-12-19 16:29:14','2022-12-19 16:29:14');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requerimiento`
--

DROP TABLE IF EXISTS `requerimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `requerimiento` (
  `id_requerimiento` int NOT NULL AUTO_INCREMENT,
  `no_requerimiento` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_requerimiento` date NOT NULL,
  `fecha_envio` date NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_recepcion_regmed` date DEFAULT NULL,
  `id_oficio` int DEFAULT NULL,
  `no_afiliado` bigint NOT NULL,
  `users_id_remitente` bigint unsigned NOT NULL,
  `users_id_responsable` bigint unsigned DEFAULT NULL,
  `archivo` varchar(145) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caso` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desino_nombre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destino_area` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destino_lugar` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuerpo` varchar(900) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_usuario` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vobo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `folios` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_id_respuesta` bigint unsigned DEFAULT NULL,
  `id_cargo` int DEFAULT NULL,
  `archivo_respuesta` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correlativo` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_respuesta` date DEFAULT NULL,
  PRIMARY KEY (`id_requerimiento`),
  KEY `fk_requerimiento_afiliado1` (`no_afiliado`),
  KEY `fk_requerimiento_users1` (`users_id_remitente`),
  KEY `fk_requerimiento_users2` (`users_id_responsable`),
  KEY `fk_requerimiento_users3` (`users_id_respuesta`),
  KEY `fk_requerimiento_cargo1` (`id_cargo`),
  CONSTRAINT `fk_requerimiento_afiliado1` FOREIGN KEY (`no_afiliado`) REFERENCES `afiliado` (`no_afiliado`) ON DELETE CASCADE,
  CONSTRAINT `fk_requerimiento_cargo1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE,
  CONSTRAINT `fk_requerimiento_users1` FOREIGN KEY (`users_id_remitente`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_requerimiento_users2` FOREIGN KEY (`users_id_responsable`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_requerimiento_users3` FOREIGN KEY (`users_id_respuesta`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requerimiento`
--

LOCK TABLES `requerimiento` WRITE;
/*!40000 ALTER TABLE `requerimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `requerimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rev_susp`
--

DROP TABLE IF EXISTS `rev_susp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rev_susp` (
  `id_rev_susp` int NOT NULL AUTO_INCREMENT,
  `observacion` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_suspension` int NOT NULL,
  `id_revision_oficio` int NOT NULL,
  PRIMARY KEY (`id_rev_susp`),
  KEY `fk_rev_susp_revision_oficio1` (`id_revision_oficio`),
  KEY `fk_rev_susp_suspension1` (`id_suspension`),
  CONSTRAINT `fk_rev_susp_revision_oficio1` FOREIGN KEY (`id_revision_oficio`) REFERENCES `revision_oficio` (`id_revision_oficio`) ON DELETE CASCADE,
  CONSTRAINT `fk_rev_susp_suspension1` FOREIGN KEY (`id_suspension`) REFERENCES `suspension` (`id_suspension`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rev_susp`
--

LOCK TABLES `rev_susp` WRITE;
/*!40000 ALTER TABLE `rev_susp` DISABLE KEYS */;
/*!40000 ALTER TABLE `rev_susp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `revision_oficio`
--

DROP TABLE IF EXISTS `revision_oficio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `revision_oficio` (
  `id_revision_oficio` int NOT NULL AUTO_INCREMENT,
  `fecha_rev` date NOT NULL,
  `id_oficio` int NOT NULL,
  `users_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id_revision_oficio`),
  KEY `fk_revision_oficio1` (`id_oficio`),
  KEY `fk_revision_oficio_users1` (`users_id`),
  CONSTRAINT `fk_revision_oficio1` FOREIGN KEY (`id_oficio`) REFERENCES `oficio` (`id_oficio`) ON DELETE CASCADE,
  CONSTRAINT `fk_revision_oficio_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revision_oficio`
--

LOCK TABLES `revision_oficio` WRITE;
/*!40000 ALTER TABLE `revision_oficio` DISABLE KEYS */;
/*!40000 ALTER TABLE `revision_oficio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riesgo`
--

DROP TABLE IF EXISTS `riesgo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `riesgo` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riesgo`
--

LOCK TABLES `riesgo` WRITE;
/*!40000 ALTER TABLE `riesgo` DISABLE KEYS */;
INSERT INTO `riesgo` VALUES (1,'MATERNIDAD ABORT??',NULL),(2,'MATERNIDAD COMPLICACIONES DEL EMBARAZO',NULL),(3,'ENFERMEDAD',NULL),(4,'ACCIDENTE COM??N',NULL),(5,'ACCIDENTE TRABAJO',NULL),(6,'COVID-19',NULL);
/*!40000 ALTER TABLE `riesgo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(59,1),(60,1),(61,1),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1),(72,1),(73,1),(74,1),(75,1),(76,1),(77,1),(78,1),(79,1),(80,1),(81,1),(82,1),(83,1),(84,1),(85,1),(86,1),(87,1),(88,1),(89,1),(90,1),(91,1),(92,1),(93,1),(94,1),(95,1),(96,1),(97,1),(98,1),(99,1),(100,1),(1,2),(2,2),(3,2),(4,2),(6,2),(7,2),(8,2),(9,2),(10,2),(11,2),(12,2),(13,2),(14,2),(15,2),(16,2),(17,2),(18,2),(19,2),(20,2),(21,2),(22,2),(23,2),(24,2),(25,2),(26,2),(27,2),(28,2),(29,2),(30,2),(31,2),(32,2),(33,2),(34,2),(35,2),(36,2),(37,2),(38,2),(39,2),(40,2),(41,2),(42,2),(43,2),(44,2),(45,2),(46,2),(47,2),(48,2),(49,2),(50,2),(51,2),(52,2),(53,2),(54,2),(55,2),(56,2),(57,2),(58,2),(59,2),(60,2),(61,2),(62,2),(63,2),(64,2),(65,2),(66,2),(67,2),(68,2),(69,2),(70,2),(71,2),(72,2),(73,2),(74,2),(75,2),(76,2),(77,2),(78,2),(79,2),(80,2),(81,2),(82,2),(83,2),(84,2),(85,2),(86,2),(87,2),(88,2),(89,2),(90,2),(91,2),(92,2),(93,2),(94,2),(95,2),(96,2),(97,2),(98,2),(99,2),(100,2),(10,3),(11,3),(12,3),(13,3),(14,3),(15,3),(16,3),(17,3),(18,3),(39,3),(40,3),(83,3),(19,4),(20,4),(21,4),(22,4),(23,4),(24,4),(25,4),(26,4),(35,4),(36,4),(37,4),(38,4),(75,4),(76,4),(77,4),(78,4),(79,4),(80,4),(81,4),(82,4),(84,4),(19,5),(20,5),(21,5),(22,5),(23,5),(24,5),(25,5),(26,5),(75,5),(76,5),(77,5),(78,5),(79,5),(80,5),(81,5),(82,5),(84,5);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Super Administrador','web','2022-12-19 16:29:14','2022-12-19 16:29:14'),(2,'Administrador','web','2022-12-19 16:29:15','2022-12-19 16:29:15'),(3,'Registrador-Registros Medicos','web','2022-12-19 16:29:15','2022-12-19 16:29:15'),(4,'Revisor-Registros Medicos','web','2022-12-19 16:29:15','2022-12-19 16:29:15'),(5,'Registrador-Prestaciones','web','2022-12-19 16:29:15','2022-12-19 16:29:15');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suspension`
--

DROP TABLE IF EXISTS `suspension`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suspension` (
  `id_suspension` int NOT NULL AUTO_INCREMENT,
  `fecha_inicio_suspension` date NOT NULL,
  `fecha_fin_suspension` date NOT NULL,
  `fecha_alta` date DEFAULT NULL,
  `fecha_registro` datetime NOT NULL,
  `fecha_envio_prestacion` date DEFAULT NULL,
  `fecha_recibido_prestacione` date DEFAULT NULL,
  `fecha_revision` date DEFAULT NULL,
  `observacion` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_afiliado` bigint NOT NULL,
  `id_clinica_servicio` int NOT NULL,
  `medico_colegiado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id_registrador` bigint unsigned NOT NULL,
  `users_id_revisor` bigint unsigned DEFAULT NULL,
  `fecha_inicio_caso` date NOT NULL,
  `fecha_accidente` datetime DEFAULT NULL,
  `id_riesgo` int NOT NULL,
  `pago` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_suspension`),
  KEY `fk_suspension_afiliado1` (`no_afiliado`),
  KEY `fk_suspension_clinica/servicio1` (`id_clinica_servicio`),
  KEY `fk_suspension_medico1` (`medico_colegiado`),
  KEY `fk_suspension_riesgo1` (`id_riesgo`),
  KEY `fk_suspension_users1` (`users_id_registrador`),
  KEY `fk_suspension_users2` (`users_id_revisor`),
  CONSTRAINT `fk_suspension_afiliado1` FOREIGN KEY (`no_afiliado`) REFERENCES `afiliado` (`no_afiliado`) ON DELETE CASCADE,
  CONSTRAINT `fk_suspension_clinica/servicio1` FOREIGN KEY (`id_clinica_servicio`) REFERENCES `clinica_servicio` (`id_clinica_servicio`) ON DELETE CASCADE,
  CONSTRAINT `fk_suspension_medico1` FOREIGN KEY (`medico_colegiado`) REFERENCES `medico` (`colegiado`) ON DELETE CASCADE,
  CONSTRAINT `fk_suspension_riesgo1` FOREIGN KEY (`id_riesgo`) REFERENCES `riesgo` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_suspension_users1` FOREIGN KEY (`users_id_registrador`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_suspension_users2` FOREIGN KEY (`users_id_revisor`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suspension`
--

LOCK TABLES `suspension` WRITE;
/*!40000 ALTER TABLE `suspension` DISABLE KEYS */;
/*!40000 ALTER TABLE `suspension` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_afiliado`
--

DROP TABLE IF EXISTS `tipo_afiliado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_afiliado` (
  `Id_tipo_afiliado` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`Id_tipo_afiliado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_afiliado`
--

LOCK TABLES `tipo_afiliado` WRITE;
/*!40000 ALTER TABLE `tipo_afiliado` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_afiliado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ibm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'0000000','Admin','Igss','adminz@igssgt.org',NULL,'$2y$10$uyuw74Akju1EZZSR7UDPs.9OFT4Oc547M3KacW.Avbcd4sTO5xkGG',1,NULL,'2022-12-19 16:29:14','2022-12-19 16:29:14'),(2,'39093','MADELYN ROC??O','DE LE??N CIFUENTES','madelyn.deleon@igssgt.org',NULL,'$2y$10$4tFKJFc21/B.yRG864g/jOAny2wxLh9VYkpnq3iz.h4VgQfJzYX1m',3,NULL,'2022-12-19 16:32:45','2022-12-19 16:33:25');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'regular'
--

--
-- Dumping routines for database 'regular'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-19 11:29:10
