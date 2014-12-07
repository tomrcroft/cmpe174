CREATE DATABASE  IF NOT EXISTS `cs174bonushw` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cs174bonushw`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: cs174bonushw
-- ------------------------------------------------------
-- Server version	5.6.19

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
-- Table structure for table `fun_video`
--

DROP TABLE IF EXISTS `fun_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fun_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `videolink` text COLLATE utf8_unicode_ci NOT NULL,
  `videolength` int(6) NOT NULL,
  `highestresolution` enum('144','240','360','480','720','1080') COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `language` enum('English','Non-English') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'English',
  `viewcount` int(8) NOT NULL,
  `videotype` set('Tutorial','Entertainment','Application','Weapon','Group demo','Others') COLLATE utf8_unicode_ci NOT NULL,
  `iconimage` text COLLATE utf8_unicode_ci NOT NULL,
  `tag` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fun_video`
--

LOCK TABLES `fun_video` WRITE;
/*!40000 ALTER TABLE `fun_video` DISABLE KEYS */;
INSERT INTO `fun_video` VALUES (1,'Aikido VS Taekwondo','https://www.youtube.com/watch?v=NinO0vGum38',3,'480','Hello everyone, thank you for your comments for this performance video. This is Nakamura who is showing as a Aikido fighter . \r\nRecently, there is a video has been UP without our permission almost the same contents with BGM plaintive&#12288;of our video , but It is different from our intention. So let me say our opinion about pirated Video.','Non-English',5197559,'Entertainment,Others','https://yt3.ggpht.com/-sZ_9vfRpA_E/AAAAAAAAAAI/AAAAAAAAAAA/SsV2qknBG-4/s88-c-k-no/photo.jpg','sports, fight, taikwondo'),(2,'Aikido - This Will Blow Your Mind','https://www.youtube.com/watch?v=HcrThLIYvhw',1,'144','Aikido - This Will Blow Your Mind','English',4918013,'Entertainment,Others','https://i.ytimg.com/vi/HcrThLIYvhw/mqdefault.jpg','aikido, entertainment'),(3,'Excellent Aikido Demonstration','https://www.youtube.com/watch?v=aicHsMC6rxM',1,'240','Excellent Aikido Demonstration. This is Mr. Anthony Yates, 6th Dan Aikido Yoshinkan.','English',4131728,'Tutorial','https://i.ytimg.com/vi/aicHsMC6rxM/mqdefault.jpg','tutorial, aikido'),(4,'AIKIDO','https://www.youtube.com/watch?v=CtYIbXYU4VY',8,'240','Aikido training of UNDSS (United Nations Department of Safety and Security) personnel at the regional headquarters for the UN in South America - ECLAC / CEPAL - in Santiago, Chile.','English',4088320,'Entertainment,Application,Others','https://i.ytimg.com/vi_webp/CtYIbXYU4VY/mqdefault.webp','aikido, news and politics'),(5,'Aikido vs Karate','https://www.youtube.com/watch?v=R797LamA3Vw',1,'480','','Non-English',3909989,'Entertainment,Others','https://i.ytimg.com/i/qXlLzkYRn0UrT8KIB8X19A/1.jpg','karate, aikido, sports'),(6,'Nao brigue com um lutador de Aikido','https://www.youtube.com/watch?v=Jz5ypzGW-9M',1,'240','Se puderem ajudar, assistam esse video de um amigo meu','Non-English',3814454,'Entertainment,Others','https://i.ytimg.com/vi_webp/Jz5ypzGW-9M/mqdefault.webp','aikido, people, blogs'),(7,'Aikido Vs. MMA Real Fight Part 1','https://www.youtube.com/watch?v=pLqovX4G8Z0',3,'240','This is a video of an Aikido black belt taking on a Mixed Martial Artist in an MMA tournament. The fight goes into overtime, so be sure to check out the second part!','English',2930233,'Entertainment,Application,Others','https://i.ytimg.com/i/iSn9rWCd4WZGrAa6QFXDxw/1.jpg','MMA, Aikido, Sports'),(8,'* Aikido VS Karate * 1e','https://www.youtube.com/watch?v=J_K6LOFBBCc',3,'240','- DEMONSTRATIE.\r\n- DEMONSTRATION.\r\n\r\nDe vecht/verdedigingssport Aikido tegen Karate.','Non-English',2908743,'Tutorial,Others','https://i.ytimg.com/vi/J_K6LOFBBCc/mqdefault.jpg','Aikido, Education'),(9,'Pro Fighter vs Aikido Master','https://www.youtube.com/watch?v=QWpVUMCcSys',9,'480','','Non-English',2709837,'Entertainment,Others','','Aikido, fight, sport'),(10,'jujitsu vs aikido','https://www.youtube.com/watch?v=GXO9FrZ1N9s',2,'360','freddy ahi esta tu profe!!!','Non-English',2206041,'Entertainment,Others','https://i.ytimg.com/vi_webp/GXO9FrZ1N9s/mqdefault.webp','people and blogs, jiujitsu'),(11,'Steven Seagal AIKIDO Master YouTube','https://www.youtube.com/watch?v=yRhdKEGrTCo',3,'360','','Non-English',2121214,'Entertainment,Others','https://i.ytimg.com/vi_webp/yRhdKEGrTCo/mqdefault.webp','Sports'),(12,'Aikido vs Special police','https://www.youtube.com/watch?v=9CKxhkxPGms',1,'240','Aikido master Dankovic Nenad 2 dan aikikai, Aikido club \"Timok\" Zajecar,Serbia vs Special police','English',2042243,'Entertainment,Others','https://i.ytimg.com/vi_webp/9CKxhkxPGms/mqdefault.webp','Sports'),(13,'Aikido','https://www.youtube.com/watch?v=qAc-gQIeAaI',4,'240','Seagal, Tissier, Morihiro and other','English',2039928,'Entertainment,Others','https://i.ytimg.com/i/ZUzZaW1Q0PmAwKT87WRDSA/1.jpg','Sports'),(14,'Aikido vs Muay Thai','https://www.youtube.com/watch?v=aj8xH_aiCtg',5,'720','Please do not compare styles with each other . Only idiots do that . Instead , compare the fighters .\r\n\r\nThis took place in a russian show.I know it says Aikibudo in the video.Aikido was initially known as Aikibudo , before changing its name to Aikido.Aikibudo differs slightly from modern aikido.Note , this video was not made to compare styles .','English',1996003,'Entertainment,Others','https://i.ytimg.com/vi_webp/aj8xH_aiCtg/mqdefault.webp','Entertainment'),(15,'Aikido, The Samurai Spirit','https://www.youtube.com/watch?v=rs4gTZjSqJc',44,'360','Recomendado, esta muy bien explicado. La traduccion es normal, espero que les guste!\r\nGood, very well explained. The translation is normal, I hope you like it!\r\nThis video is not mine, no copyright.','Non-English',1970061,'Tutorial,Entertainment','https://i.ytimg.com/vi_webp/rs4gTZjSqJc/mqdefault.webp','Sports, Documentry'),(16,'judo vs aikido','https://www.youtube.com/watch?v=KLJPcChg1T4',1,'240','pelea de un disque judoka con un aikidoka.\r\naunque para mi que el judoka esta solo de uke y no pelea nada.','Non-English',1949523,'Entertainment,Others','https://i.ytimg.com/vi/KLJPcChg1T4/mqdefault.jpg','Spots, Judo'),(17,'Aggressive Aikido techniques demonstration','https://www.youtube.com/watch?v=P73mcY3g5ZE',4,'720','Description','English',1943743,'Entertainment,Others','https://i.ytimg.com/vi/P73mcY3g5ZE/mqdefault.jpg','Sports, Aggressive'),(18,'aikido vs jiu jitsu','https://www.youtube.com/watch?v=LPx7IAlRj_A',1,'240','aikido vs jiu jitsu demostracion','Non-English',6058450,'Entertainment,Others','https://i.ytimg.com/i/V00U70ieOd-yYxnzEljfWw/1.jpg','Sports, jiu jitsu'),(19,'Aikido Dim Mak Felony Fights','https://www.youtube.com/watch?v=Jk9eWREBa9U',3,'240','Wing Chun and Aikido RioHeroes Dim Mak Felony Fights Kimbo Slice Mercer Spratt Florian Abbott Tank Rizzo','English',1768611,'Entertainment,Others','https://i.ytimg.com/i/oL_uIbNR9Q8Hk5kJA2zmUA/1.jpg','Felony Fights, fight, extreme'),(20,'Karate vs. Aikido','https://www.youtube.com/watch?v=XEQGlLuoEDQ',2,'480','','English',1758044,'Tutorial,Entertainment,Others','https://i.ytimg.com/vi/XEQGlLuoEDQ/mqdefault.jpg','Karate, practice'),(21,'Tamaris - Real Aikido 1','https://www.youtube.com/watch?v=l-MAX1TQ7DQ',7,'480','Srbija, Beograd, Polaganje za braon pojas_2006 god.','Non-English',1718891,'Entertainment,Others','https://yt3.ggpht.com/-S4VVJsPUkyc/AAAAAAAAAAI/AAAAAAAAAAA/nasjPlLMces/s88-c-k-no/photo.jpg','Sports'),(22,'REAL AIKIDO','https://www.youtube.com/watch?v=7hQtg1_erAA',2,'480','','English',1693140,'Entertainment','https://yt3.ggpht.com/-8clbyIxIDGc/AAAAAAAAAAI/AAAAAAAAAAA/7svJgUVU_Qg/s88-c-k-no/photo.jpg','Real');
/*!40000 ALTER TABLE `fun_video` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-18 14:22:28
