CREATE DATABASE  IF NOT EXISTS `bd_repositorio3` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;
USE `bd_repositorio3`;
-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: bd_repositorio3
-- ------------------------------------------------------
-- Server version	5.7.30-log

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
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrador` (
  `administrador_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`administrador_id`),
  UNIQUE KEY `administrado_id` (`administrador_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (1,'Jose','Villanueva','JVilla@unfv.edu.pe','123456789'),(2,'Emerson','Riveros','emerson@unfv.edu.pe','123456789');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articulo`
--

DROP TABLE IF EXISTS `articulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `articulo` (
  `articulo_id` int(11) NOT NULL AUTO_INCREMENT,
  `articulo_pdf` varchar(255) DEFAULT NULL,
  `tema_id` int(11) DEFAULT NULL,
  `idioma_id` char(2) DEFAULT NULL,
  `fecha_subida` date DEFAULT NULL,
  `titulo` varchar(250) NOT NULL,
  `autor` varchar(250) NOT NULL,
  `doi` varchar(255) DEFAULT NULL,
  `resumen` text,
  `Cancelled` int(11) DEFAULT '0',
  PRIMARY KEY (`articulo_id`),
  UNIQUE KEY `articulo_id` (`articulo_id`) USING BTREE,
  UNIQUE KEY `doi` (`doi`),
  KEY `tema_id` (`tema_id`) USING BTREE,
  KEY `idioma` (`idioma_id`),
  CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`idioma_id`) REFERENCES `idioma` (`idioma_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_temaid_articulo` FOREIGN KEY (`tema_id`) REFERENCES `tema` (`tema_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulo`
--

LOCK TABLES `articulo` WRITE;
/*!40000 ALTER TABLE `articulo` DISABLE KEYS */;
INSERT INTO `articulo` VALUES (11,'http://www.scielo.org.co/scielo.php?script=sci_pdf&pid=S2027-46882022000100202&lng=pt&tlng=es',1,'es','2022-03-18','Crédito eclesiástico y sistema de empréstitos de la catedral de Popayán, 1632-1790','<ul><li>ABADÍA QUINTERO, CAROLINA</li></ul>','https://doi.org/10.22380/20274688.1893','RESUMEN El presente artículo se centra en el estudio de 45 escrituras de censo del Fondo Notaría Primera del Archivo Central del Cauca, para identificar los créditos realizados por la catedral de Popayán entre los siglos XVII y XVIII, con el fin de analizar sus sistemas de empréstitos y de gestión económica, en cabeza del cabildo catedral. Se caracterizan entonces los tipos de censos, los valores y los réditos, así como los censualistas, los bienes y la geografía de los préstamos concedidos.',0),(13,'http://www.scielo.org.co/scielo.php?script=sci_pdf&pid=S2422-42002021000300112&lng=pt&tlng=en',1,'en','2022-03-18','Migración del Sistema de Información para la Administración del Talento Humano de la Policía Nacional: una revisión sistemática','<ul><li>Peñaranda Lizcano, Nelson Javier</li><li>Ducuara Ramírez, Duperly Graciela</li><li>Delgado Villota, Diego Mauricio</li><li>Murillo Pineda, Yeison Alexis</li></ul>','https://doi.org/10.22335/rlct.v13i3.1422','ABSTRACT The National Police of Colombia has at service information systems that helps efficiently to the fulfilment of its mission, among them we found the Management System for Human Resources (SIATH). This system has 20 years of functioning, it was developed in Oracle Forms and Reports language, and currently, it is considered obsolete and restrictive, because it depends on the execution of a plugin from Java, that it\'s deploy only by web site of Internet Explorer, which currently doesn\'t have Microsoft support, causing a menace in the availability of the information. So that, applying the revision protocol and metanalysis (PRISMA), it was checked in different data bases, by means of research equations and analysis categories with standard of inclusion and exclusion, related articles with the migration and implementation of applications. As a result, it was obtained that the reimplementation of SIATH is the option of the migration recommended, maintaining the functional architecture and the objects kept in the data base, using the develop platform .NET according to the institutional capacities, allowing to innovate in the process of human resources, guarantying the availability of information and facilitating the interaction of the final user.',0),(14,'http://www.scielo.br/scielo.php?script=sci_pdf&pid=S1519-60892021000300479&lng=pt&tlng=en',1,'en','2022-03-18','Espaço público e gestão da segurança urbana: um estudo sociológico da célula de proteção comunitária do bairro Jangurussu','<ul><li>Maciel, Wellington Ricardo Nogueira</li></ul>','https://doi.org/10.15448/1984-7289.2021.3.36821','Abstract: In many cities around the world, administrations have built security mechanisms to reactivate public uses of urban space. In Fortaleza, Ceará, Brazil, Mayor Roberto Cláudio\'s management (2017-2020) created the Municipal Urban Protection Program which instituted community protection cells (observation towers, drones, surveillance cameras and ostensible militia patrolling, with municipal guard). and military police riding bicycles and motorcycles) in places with high crime rates. This paper discusses the transformations caused by this “proximity protection” model in the Jangurussu neighborhood, a territory on the outskirts of the city that concentrates the highest number of adolescent deaths. The methodology is based on documentary research, direct observation of the daily life of the neighborhood and interviews with young people using the Urban Center for Culture, Art, Science and Sport (Cuca), located near the observation tower, for soiree, reggae parties. and rap performances. The results of this research suggest that the militarized territorialization of urban security policy, instead of favoring, contributes to weaken the intense uses of urban space by inhibiting and controlling the presence of young people in the observation tower\'s range.',0),(21,'http://www.scielo.org.co/scielo.php?script=sci_pdf&pid=S0120-56092021000300209&lng=pt&tlng=en',2,'en','2022-03-18','Characterization of High-Rise Reinforced Concrete Buildings Located in Antofagasta, Chile, by Means of Structural Indexes','<ul><li>Music Tomicic, Juan Andrés</li><li>Soto Ramírez, Felipe Ignacio</li></ul>','https://doi.org/10.15446/ing.investig.v41n3.90430','ABSTRACT This study aims to characterize a series of high-rise reinforced concrete wall buildings located in Antofagasta, Chile, by means of a set of structural indexes commonly used in professional activities in our country and recommended by researchers. To this effect, a total of eight buildings was analyzed, from which, based on their architectural plans and engineering drawings, a series of properties was determined, such as wall and floor area, among others. Additionally, a modal spectral analysis was carried out according to the current Chilean regulations (NCh 433Of.1996Mod.2009 and DS 61) by means of the ETABS software. Next, eleven structural indexes were selected and determined, which are related to stiffness, structural redundancy, and ductility, with the purpose of making a seismic qualification. The obtained values indexes provide information about the expected structural performance of the buildings under a major seismic event. Finally, correlations between the different indexes were established.',0),(22,'http://www.scielo.cl/scielo.php?script=sci_pdf&pid=S0717-50512021000100004&lng=pt&tlng=es',2,'es','2022-03-18','Formando planificadores latinoamericanos. Estructuras institucionales en Uruguay y Chile en la década del sesenta','<ul><li>Monti, Alejandra</li></ul>','https://doi.org/10.5354/0717-5051.2021.52173','Resumen: El presente artículo indaga acerca de las formas que adquirió en América Latina —particularmente en Uruguay y Chile— la discusión en torno a la formación de profesionales desde un enfoque integral en el campo de la planificación urbana y regional, en el contexto de las políticas desarrollistas de mediados de la década del sesenta. Analizando comparativamente la actividad del Instituto de Teoría de la Arquitectura y Urbanismo en Uruguay y el Comité Interdisciplinario de Desarrollo Urbano en Chile, a través de fuentes primarias institucionales y fuentes secundarias referidas a la historia de la disciplina en la región, se avanza en la identificación de los vínculos entre Estado, universidad y técnica. Desde esta perspectiva, se reconoce que las dos experiencias actuaron como espacios de formación de cuerpos profesionales capaces de dar respuesta a las nuevas necesidades de los Estados, tanto en términos de ideas como de gestión del territorio, entendido este a partir de su rol como variable de las políticas desarrollistas para orientar el equilibrio nacional.',0),(25,'http://www.scielo.br/scielo.php?script=sci_pdf&pid=S1518-76322021000300435&lng=pt&tlng=pt',2,'pt','2022-03-21','ARQUITETURA DO PROCESSAMENTO COGNITIVO: EFEITO RACIONAL E EFEITO EMOCIONAL','<ul><li>Santos, Sebastião Lourenço dos</li><li>Godoy, Elena</li></ul>','https://doi.org/10.1590/1982-4017-210309-11320','Resumo O estudo do efeito da razão e das emoções na interpretação humana em uma perspectiva pragmática se justifica pelo fato de que no âmbito das ciências cognitivas as investigações que envolvem o uso da linguagem associada às emoções ainda são tímidas. Tomando como referência a teoria da relevância (SPERBER; WILSON, 2001), as neurociências cognitivas (GAZZANIGA; IVRY; MAGNUM, 2006; DAMÁSIO, 1994, 2004) e a psicologia cognitiva (LEDOUX, 1996; STERNBERG, 2010), o objetivo deste estudo é advogar em favor de uma arquitetura mental que congrega razão e emoções. A partir da modelação da interpretação de um enunciado noticiando a frustração de uma expectativa, argumenta-se que, em um ato comunicativo, o desejo - ao fazer uma ponte entre a razão, que opera a partir da valoração das representações contextuais, e as emoções, que atribuem níveis afetivos às representações mentais - é o gatilho para a atribuição de relevância.',0),(28,'http://www.scielo.br/scielo.php?script=sci_pdf&pid=S1984-02922021000300173&lng=pt&tlng=pt',2,'pt','2022-03-21','Um olhar errante sobre as intervenções urbanas em Porto Alegre','<ul><li>Flach, Guilherme Augusto</li><li>Paulon, Simone Mainieri</li></ul>','https://doi.org/10.22409/1984-0292/v33i3/5802','Resumo Este artigo tem por objetivo explorar as intervenções urbanas na cidade de Porto Alegre e seus efeitos sobre os modos de vida na cidade. Tais intervenções podem estar em sintonia com a arte urbana, o a(r)tivismo, o efêmero, o urbanístico, a arquitetura e os movimentos de ocupação dos espaços públicos. A metodologia é traçada através da cartografia e da errância, fazendo do corpo do pesquisador superfície aos acontecimentos. Constrói-se, assim, uma narrativa acerca das forças que compõem a cidade a partir dos efeitos de tais intervenções no tecido urbano. Frente aos imperativos homogeneízadores das cidades - atrelados às premissas do biopoder e da produção capitalística, captam-se efeitos de pausa em uma rotina acelerada, que possibilitam encontros e dissipam o medo urbano. As intervenções urbanas promovem a abertura de limiares que se fazem possibilidade de criação e defesa da potência de vida, entrelaçando-se à produção do novo nas subjetividades emergentes.',0),(31,'http://www.scielo.org.co/scielo.php?script=sci_pdf&pid=S1692-33242016000200159&lng=pt&tlng=es',2,'es','2022-03-21','Evaluación de la calidad de lenguajes de modelado a través de análisis taxonómico: una propuesta preliminar','<ul><li>Giraldo, Fáber D.</li><li>España, Sergio</li><li>Giraldo, William J.</li><li>Pastor, Óscar</li></ul>','https://doi.org/10.22395/rium.v15n29a10','Resumen El paradigma de la ingeniería dirigida por modelos promueve el uso de modelos conceptuales en procesos de ingeniería de sistemas de información. Como pro ductos de ingeniería, los modelos conceptuales deben tener calidad, la cual aplica tanto a los modelos conceptuales como a los lenguajes de modelado empleados para construir dichos modelos. Este artículo presenta un marco de evaluación de la calidad de lenguajes de modelado, en los que se utilizan principios del marco del trabajo Zachman para sistemas de información, como una herramienta taxonómica aplicada sobre artefactos de modelado, empleados en el desarrollo de un sistema de información. El propósito de esta herramienta taxonómica es la ejecución de procedimientos analíticos alineados con una arquitectura de referencia para sistemas de información y razonamientos ontológicos. En este trabajo se expone cómo el marco Zachman soporta análisis sobre lenguajes de modelado para propósitos de calidad por su administración nativa de la semántica.',0),(32,'http://www.scielo.cl/scielo.php?script=sci_pdf&pid=S0718-18762013000200007&lng=pt&tlng=en',2,'en','2022-03-21','Enterprise Architecture Development Based on Enterprise Ontology','<ul><li>Rajabi, Zeinab</li><li>Minaei, Behrouz</li><li>Seyyedi, Mir Ali</li></ul>','https://doi.org/10.4067/S0718-18762013000200007','Enterprises choose Enterprise Architecture (EA) solution, in order to overcome dynamic business challenges and in order to coordinate various enterprise elements. In this article, a solution is suggested for the Enterprise Architecture based on a conceptual model of Enterprise Ontology (EO). Enterprise Ontology provides a common structure for data collection. First, conceptual model of Enterprise Ontology based on the Zachman Framework is presented. Then, the Enterprise Architecture development process based on Enterprise Ontology is proposed. Using this solution, Staffs, stakeholders, users, architects, and systems achieved a common understanding of enterprise concepts and relationships and therefore, architecture data are collected in a correct way. The primary focus is collecting accurate architecture data instead of developing architecture artifacts; also meet the decision maker’s needs by fit for purpose modeling. Finally, we demonstrate our solution in a case study and show the appropriate results and conclusions.',0);
/*!40000 ALTER TABLE `articulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial`
--

DROP TABLE IF EXISTS `historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historial` (
  `historial_id` int(11) NOT NULL AUTO_INCREMENT,
  `paper_id` int(11) DEFAULT NULL,
  `paper_pdf` varchar(255) DEFAULT NULL,
  `fecha_subida` date DEFAULT NULL,
  `Avance` enum('25%','75%','100%') DEFAULT NULL,
  `Notas` text,
  `historial_estado` enum('REVISADO','ESPERA') DEFAULT NULL,
  PRIMARY KEY (`historial_id`),
  UNIQUE KEY `historial_id` (`historial_id`) USING BTREE,
  KEY `fk_historial_paper` (`paper_id`),
  CONSTRAINT `FK_Historial_Paper` FOREIGN KEY (`paper_id`) REFERENCES `paper` (`paper_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial`
--

LOCK TABLES `historial` WRITE;
/*!40000 ALTER TABLE `historial` DISABLE KEYS */;
INSERT INTO `historial` VALUES (16,15,'historial_paper/2022-03-21time_Managemen-2.af.es.pdf','2022-03-21','25%','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of ty</p>','REVISADO'),(17,15,'historial_paper/2022-03-21time_Managemen-2.af.es.pdf','2022-03-21','75%','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>','REVISADO'),(19,15,'historial_paper/2022-03-21time_Managemen-2.af.es.pdf','2022-03-21',NULL,NULL,NULL),(21,18,'historial_paper/2022-03-21time_Managemen-2.af.es.pdf','2022-03-21','25%','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>','REVISADO'),(25,21,'historial_paper/2022-03-21time_Managemen-2.af.es.pdf','2022-03-21','25%','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>','REVISADO'),(26,21,'historial_paper/2022-03-21time_Managemen-2.af.es.pdf','2022-03-21',NULL,NULL,NULL);
/*!40000 ALTER TABLE `historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idioma`
--

DROP TABLE IF EXISTS `idioma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `idioma` (
  `idioma_id` char(2) CHARACTER SET utf8mb4 NOT NULL,
  `nombre_idioma` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`idioma_id`),
  UNIQUE KEY `id` (`idioma_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idioma`
--

LOCK TABLES `idioma` WRITE;
/*!40000 ALTER TABLE `idioma` DISABLE KEYS */;
INSERT INTO `idioma` VALUES ('en','Ingles'),('es','Español'),('fr','Frances'),('pt','Portugués');
/*!40000 ALTER TABLE `idioma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paper`
--

DROP TABLE IF EXISTS `paper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paper` (
  `paper_id` int(11) NOT NULL AUTO_INCREMENT,
  `paper_titulo` varchar(250) NOT NULL,
  `tema_id` int(11) NOT NULL,
  `fecha_subida` date NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `administrador_id` int(11) DEFAULT NULL,
  `estado` enum('ESPERA','REVISADO') NOT NULL,
  PRIMARY KEY (`paper_id`),
  UNIQUE KEY `paper_id` (`paper_id`) USING BTREE,
  KEY `fk_tema_paper` (`tema_id`),
  KEY `fk_usuario_paper` (`usuario_id`),
  KEY `fk_administrador_usuario` (`administrador_id`),
  CONSTRAINT `fk_administrador_usuario` FOREIGN KEY (`administrador_id`) REFERENCES `administrador` (`administrador_id`),
  CONSTRAINT `fk_tema_paper` FOREIGN KEY (`tema_id`) REFERENCES `tema` (`tema_id`),
  CONSTRAINT `fk_usuario_paper` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paper`
--

LOCK TABLES `paper` WRITE;
/*!40000 ALTER TABLE `paper` DISABLE KEYS */;
INSERT INTO `paper` VALUES (1,'Sistemas de tutoría inteligente y su aplicación en la educación superior',1,'0000-00-00',23,NULL,'ESPERA'),(2,'Análisis de la integración del sistema de dirección basado en el enfoque de arquitectura empresarial en el Hotel Habana Libre',2,'2022-02-28',23,NULL,'ESPERA'),(3,'Aplicaciones de inteligencia artificial para la clasificación automatizada de propósitos comunicativos en informes de ingeniería',1,'2022-02-28',24,NULL,'ESPERA'),(4,'Predicción del rendimiento académico estudiantil con redes neuronales artificiales',1,'2022-02-28',24,NULL,'ESPERA'),(5,'ARQUITECTURA EMPRESARIAL SOSTENIBLE: UN ENFOQUE INTEGRAL EN LOS NEGOCIOS',2,'2022-02-28',23,NULL,'ESPERA'),(6,'Integración del sistema de dirección con enfoque de arquitectura empresarial en una empresa de comunicaciones',2,'2022-03-02',23,NULL,'ESPERA'),(7,'Redes Neuronales Artificiales en la estimación del esfuerzo',1,'2022-03-06',23,NULL,'ESPERA'),(8,'Estudio del comportamiento de variables para la integración del sistema de dirección de la empresa con enfoque de arquitectura empresarial',2,'2022-03-07',24,NULL,'ESPERA'),(9,'Desarrollo de Arquitectura Empresarial usando un Framework con Enfoque Agil',2,'2022-03-07',23,NULL,'ESPERA'),(10,'El desafío de las tecnologías de inteligencia artificial en la Educación: percepción y evaluación de los docentes',2,'2022-03-07',24,1,'ESPERA'),(11,'Crédito eclesiástico y sistema de empréstitos de la catedral de Popayán, 1632-1790',1,'2022-03-21',26,NULL,'REVISADO'),(15,'Formando planificadores latinoamericanos. Estructuras institucionales en Uruguay y Chile en la década del sesenta',2,'2022-03-21',36,1,'ESPERA'),(18,'Desarrollo de Arquitectura Empresarial usando un Framework con Enfoque Agil',3,'2022-03-21',36,1,'ESPERA'),(21,'Desarrollo de Arquitectura Empresarial usando un Framework con Enfoque Agil',2,'2022-03-21',38,1,'ESPERA');
/*!40000 ALTER TABLE `paper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tema`
--

DROP TABLE IF EXISTS `tema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tema` (
  `tema_id` int(11) NOT NULL AUTO_INCREMENT,
  `tema` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tema_id`),
  UNIQUE KEY `tema_id` (`tema_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tema`
--

LOCK TABLES `tema` WRITE;
/*!40000 ALTER TABLE `tema` DISABLE KEYS */;
INSERT INTO `tema` VALUES (1,'Inteligencia Artificial'),(2,'Arquitectura Empresarial'),(3,'Otro tema');
/*!40000 ALTER TABLE `tema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `escuela` varchar(50) DEFAULT NULL,
  `estado` enum('ACTIVO','INACTIVO') DEFAULT NULL,
  `contrasena` text,
  `codigo` int(11) NOT NULL,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `usuario_id` (`usuario_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (23,'Alejandro','Reyna','2018025209@unfv.edu.pe','EPIA','ACTIVO','$2y$10$M0V7OpcOnimOgwkZb6vXQebA1jv06imCZDcbJktBEjHYXeT4s3vYy',51328),(24,'Mike','Riveros','2018026789@unfv.edu.pe','EPIS','ACTIVO','$2y$10$M0V7OpcOnimOgwkZb6vXQebA1jv06imCZDcbJktBEjHYXeT4s3vYy',89754),(25,'Jose','Villanueva','2018025204@unfv.edu.pe','EPIS','INACTIVO','$2y$10$M0V7OpcOnimOgwkZb6vXQebA1jv06imCZDcbJktBEjHYXeT4s3vYy',27758),(26,'Alejandra','Reyna','2018024587@unfv.edu.pe','EPIS','ACTIVO','$2y$10$M0V7OpcOnimOgwkZb6vXQebA1jv06imCZDcbJktBEjHYXeT4s3vYy',23387),(27,'Alex','Santos','2017846541@unfv.edu.pe','EPIS','ACTIVO','$2y$10$M0V7OpcOnimOgwkZb6vXQebA1jv06imCZDcbJktBEjHYXeT4s3vYy',64497),(28,'Marta','Suarez','2019153151@unfv.edu.pe','EPIS','INACTIVO','$2y$10$M0V7OpcOnimOgwkZb6vXQebA1jv06imCZDcbJktBEjHYXeT4s3vYy',82021),(34,'Jose','Villanueva','2018025202@unfv.edu.pe','EPIS','INACTIVO','$2y$10$M0V7OpcOnimOgwkZb6vXQebA1jv06imCZDcbJktBEjHYXeT4s3vYy',53348),(35,'Cristhian','Rivero','2018156135@unfv.edu.pe','EPIS','INACTIVO','$2y$10$M0V7OpcOnimOgwkZb6vXQebA1jv06imCZDcbJktBEjHYXeT4s3vYy',43985),(36,'Jose','Villanueva','2018025205@unfv.edu.pe','EPIS','ACTIVO','$2y$10$M0V7OpcOnimOgwkZb6vXQebA1jv06imCZDcbJktBEjHYXeT4s3vYy',83287),(37,'Kevin','Tarazona','2017884998@unfv.edu.pe','EPIS','INACTIVO','$2y$10$M0V7OpcOnimOgwkZb6vXQebA1jv06imCZDcbJktBEjHYXeT4s3vYy',93879),(38,'prueba','prueba','2018025208@unfv.edu.pe','EPIS','ACTIVO','$2y$10$M0V7OpcOnimOgwkZb6vXQebA1jv06imCZDcbJktBEjHYXeT4s3vYy',75910);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bd_repositorio3'
--

--
-- Dumping routines for database 'bd_repositorio3'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-21 22:24:18
