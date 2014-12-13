﻿USE `youthcyb_croft`;
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
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fun_video`
--

LOCK TABLES `fun_video` WRITE;
/*!40000 ALTER TABLE `fun_video` DISABLE KEYS */;
INSERT INTO `fun_video` VALUES (1,'Wing Chun - The Ultimate Demonstration','http://www.youtube.com/watch?v=_Ui6rj58DA0',2,'360',' Here\'s a video demonstration in florida of my Sifu, doing Wing Chun. Just the most incredible wing chun demonstration ever. Literally demonstrating a ton of advance techniques, and for those of you who\'ve never seen it, there\'s more to wing chun then doing lousy low level chain punches.\r\n','English',2746943,'Application','http://i.ytimg.com/vi/_Ui6rj58DA0/mqdefault.jpg','most,incredible,wing,chun,demonstration,ever.'),(2,'Wing Chun and Grandmaster IP Man','http://www.youtube.com/watch?v=-0QOjzAsUDg',4,'480',' none\r\n','Non-English',1405939,'Application','http://i.ytimg.com/vi_webp/-0QOjzAsUDg/mqdefault.webp','Wing,Chun,Grandmaster,Man'),(3,'Wing Chun Dummy - FAST!','http://www.youtube.com/watch?v=0xxHGCSjejE',1,'240',' One of Shifu Ripski\'s Wing Chun teachers freestyling on the wooden dummy.\r\n','English',1066089,'Tutorial','http://i.ytimg.com/vi/0xxHGCSjejE/mqdefault.jpg','One,Shifu,Ripskis,Wing,Chun,teachers,freestyling,wooden,dummy.'),(5,'Wing Chun vs TKD HARD CORE FULL CONTACT)','http://www.youtube.com/watch?v=1uG2hBcfVTQ',1,'360',' a 3 mths WC student vs a TKD 1 mth student\r\n','Non-English',734919,'Group demo','http://i.ytimg.com/vi/1uG2hBcfVTQ/mqdefault.jpg','mths,student,TKD,mth,student'),(6,'Wing Chun Lesson 2: basic leg exercise with twist','http://www.youtube.com/watch?v=2isLXQ-Gi70',2,'360',' You\'ve seen the hit movie Ip man, now learn how to use wing Chun techniques in the modern world. Master Wong wing Chun training makes it possible for you to use Wing Chun in full contact for real vs. Muay Thai, vs. boxing, vs. karate, vs. anyone! Available in Ipswich Suffolk and online.\r\n','English',736299,'Tutorial','http://i.ytimg.com/vi/2isLXQ-Gi70/mqdefault.jpg','learn,wing,Chun,techniques,modern,world.'),(7,'Wing Chun-techniques','http://www.youtube.com/watch?v=4N4Iyl-Efx4',1,'240',' That is great video I very like that\r\n','English',609296,'Group demo','http://i.ytimg.com/vi/4N4Iyl-Efx4/mqdefault.jpg','great,video'),(8,'BOXING champion VS WING CHUN MASTER','http://www.youtube.com/watch?v=5AKFNCIJdvA',3,'360',' The Ving Tsun guy claimed that he will punish me by his \"Scientific Ving Tsun\" and show me the \"right way\" of fighting. He was also proud of winning the competition of Sanda as follow\r\n','Non-English',769794,'Tutorial,Entertainment,Application','http://i.ytimg.com/vi_webp/5AKFNCIJdvA/mqdefault.webp','fight'),(9,'Wing Chun: Finishing Quickly','http://www.youtube.com/watch?v=6JoJbEghpbc',6,'480','  A quick look at finsihing a fight quickly\r\n','English',1338852,'Tutorial','http://i.ytimg.com/vi_webp/6JoJbEghpbc/mqdefault.webp','quick,look,finsihing,fight,quickly'),(10,'Bruce Lee - Wing Chun','http://www.youtube.com/watch?v=6LhRIk_yCQU',1,'480',' The young Bruce Lee and the Wing Chun.\r\n','Non-English',618964,'Group demo','http://i.ytimg.com/vi/6LhRIk_yCQU/mqdefault.jpg','young,Bruce,Lee,Wing,Chun.'),(11,'Wing Chun Basic Techniques part 1','http://www.youtube.com/watch?v=7ic3Y9Jh3VE',10,'480',' none\r\n','English',1351812,'Tutorial','http://i.ytimg.com/vi_webp/7ic3Y9Jh3VE/mqdefault.webp','Wing,Chun,Basic,Techniques,part'),(12,'Wing Chun Training - Lesson 1 Punch Drill','http://www.youtube.com/watch?v=8jMRT98sWIQ',4,'720',' You\'ve seen the hit movie Ip man, now learn how to use wing Chun techniques in the modern world. Master Wong wing Chun training makes it possible for you to use Wing Chun in full contact for real vs. Muay Thai, vs. boxing, vs. karate, vs. anyone! Available in Ipswich Suffolk and online.\r\n','English',553060,'Tutorial','http://i.ytimg.com/vi_webp/8jMRT98sWIQ/mqdefault.webp',' learn,wing,Chun,techniques,modern,world.'),(13,'Wing Chun Lesson 1:Basic leg excercise','http://www.youtube.com/watch?v=8w9tKNWIqyM',2,'360',' You\'ve seen the hit movie Ip man, now learn how to use wing Chun techniques in the modern world. Master Wong wing Chun training makes it possible for you to use Wing Chun in full contact for real vs. Muay Thai, vs. boxing, vs. karate, vs. anyone! \r\n','English',1400039,'Application','http://i.ytimg.com/vi_webp/8w9tKNWIqyM/mqdefault.webp','possible,Wing,Chun,full,contact,real,Muay,Thai,,boxing,,karate,,anyone!'),(14,'Wing Chun Training YouTube - With Master Wong EPS ','http://www.youtube.com/watch?v=A8fxnQGfXiQ',5,'480',' You\'ve seen the hit movie Ip man, now learn how to use wing Chun techniques in the modern world. Master Wong wing Chun training makes it possible for you to use Wing Chun in full contact for real vs. Muay Thai, vs. boxing, vs. karate, vs. anyone! Available in Ipswich Suffolk and online.\r\n','English',968339,'Tutorial','http://i.ytimg.com/vi/A8fxnQGfXiQ/mqdefault.jpg','learn,wing,Chun,techniques,modern,world.'),(15,'Shawn Obasi Wing Chun VS Wrestler','http://www.youtube.com/watch?v=B2Nt2YSTNNA',3,'480',' Wing Chun/ BJJ Fighter VS Wrestler- In this fight I wasn\'t allowed to throw knees,elbows or kicks.\r\n','English',1146505,'Entertainment','http://i.ytimg.com/vi/B2Nt2YSTNNA/mqdefault.jpg',' In,fight,wasnt,allowed,throw,knees,elbows,kicks.'),(17,'MMA vs. Wing Chun','http://www.youtube.com/watch?v=DhETnNWajrA',2,'480',' Daze and be amazed by this incredibly fair, dead even, totally equal match up. Wing Chun fighter David Levicki defeats Japanese Shooto fighter Kazuhiro Kusayamagi and proves beyond a shadow of doubt WC\'s unmitigated superiority over MMA.\r\n','Non-English',904454,'Entertainment','http://i.ytimg.com/vi/DhETnNWajrA/mqdefault.jpg','Wing,Chun,fighter,David,Levicki,defeats,Japanese,Shooto '),(18,'BLOODY Muay Tai Wing Chun','http://www.youtube.com/watch?v=dTGeH5Fr8p0',2,'240',' Insane Fights Pure Explosive Bone Breaking Fighting Muay Tai with Wing Chun Jiu Jitsu Jujutsu Hapkido\r\n','Non-English',1318158,'Entertainment,Application,Weapon','http://i.ytimg.com/vi/dTGeH5Fr8p0/mqdefault.jpg','Insane,Fights,Pure,Explosive,Bone,Breaking,Fighting'),(19,'Wing Chun Dummy 116','http://www.youtube.com/watch?v=eBUmyrp0-QU',2,'240',' You\'ve seen the hit movie Ip man, now learn how to use wing Chun techniques in the modern world. Master Wong wing Chun training makes it possible for you to use Wing Chun in full contact for real vs. Muay Thai, vs. boxing, vs. karate, vs. anyone! Available in Ipswich Suffolk and online.\r\n','English',1441384,'Application','http://i.ytimg.com/vi/eBUmyrp0-QU/mqdefault.jpg',' learn,wing,Chun,techniques,modern,world.'),(20,'Ip Man ( Wing Chun ) - Final Fight','http://www.youtube.com/watch?v=g4fKTwi1F_o',4,'480',' Ip Man is a 2008 Hong Kong semi biographical martial arts film very loosely based on the life of Ip Man, a grandmaster of the martial art Wing Chun and master of Bruce Lee. The film focuses on events in Ip\'s life that supposedly took place in the city of Foshan during the Second Sino-Japanese War. The film was directed by Wilson Yip, and stars Donnie Yen as Ip Man, with martial arts choreography by Sammo Hung. The supporting cast includes Simon Yam, Lynn Hung, Lam Ka-tung, Xing Yu and Hiroyuki Ikeuchi.\r\n','English',3584220,'Entertainment,Application','http://i.ytimg.com/vi_webp/g4fKTwi1F_o/mqdefault.webp','Man,2008,Hong,Kong,semi,biographical,martial,arts,film'),(21,'Donnie Yen Wing Chun and Tai Chi performance','http://www.youtube.com/watch?v=Gd2A8L87v2I',4,'360',' Donnie Yen performs during the grand variety show as part of the ceremony on the 15th anniversary of Hong Kong, June 30, 2012.\r\n','Non-English',2467485,'Entertainment','http://i.ytimg.com/vi/Gd2A8L87v2I/mqdefault.jpg','Donnie,Yen,performs,during,grand,variety,show'),(22,'Wing Chun - Chi Sao fast and slow mo','http://www.youtube.com/watch?v=GiQRlr5NCwk',2,'240',' Here you have chi sao demonstrated in both regular speed and slow mo\r\n','English',891323,'Tutorial','http://i.ytimg.com/vi/GiQRlr5NCwk/mqdefault.jpg','chi,sao,demonstrated,both,regular,speed,slow'),(23,'Bruce lee\'s wing chun (high quality)','http://www.youtube.com/watch?v=hBxqptNa6-8',4,'480',' \"clip starts out with bruce doing some fancy stuff to titillate the ladies. The remainder of the clip shows you Bruce\'s great wing chun skill. Its rumored that for the camera, he had to slow himself down so if whats in the clip is considered slow then....what was his fastest speed?\r\n\"\r\n','Non-English',5603746,'Entertainment','http://i.ytimg.com/vi_webp/hBxqptNa6-8/mqdefault.webp','\"way,dragon,fist,fury,enter,dragon\"'),(24,'Ip Man Cup 2012 - Wing Chun open competition: Wing','http://www.youtube.com/watch?v=HEH3kzYCEDs',31,'480',' Ip Man Cup 2012 - Foshan\r\n','Non-English',1068864,'Entertainment','http://i.ytimg.com/vi_webp/HEH3kzYCEDs/mqdefault.webp','Free,fight,Wing,Chun,Sanda'),(25,'the best wing chun & Jeetkunedo Trapping technique','http://www.youtube.com/watch?v=hfDLXYOcOcc',43,'240',' the best tutorial of sifu Paul Vunak Jeetkunedo Trapping\r\n','English',719251,'Tutorial','http://i.ytimg.com/vi/hfDLXYOcOcc/mqdefault.jpg','best,tutorial,sifu,Paul,Vunak,Jeetkunedo,Trapping'),(26,'wing chun techniques - how to destroy the boxer Q3','http://www.youtube.com/watch?v=hp9-jKO_K98',3,'720',' Wing lessons available in Ipswich Suffolk, London and online. Training includes basic techniques ,chi sao, blocks,chain punching, conditioning and preparation for competitions. Sil lim tao, chum kiu and biu jee hands forms. Butterfly knives, pole form and dummy training. Learn the basics of wing chun and begin your journey the same way as Bruce lee did before he incorporated boxing and created jkd.\r\n','English',2180483,'Application','http://i.ytimg.com/vi/hp9-jKO_K98/mqdefault.jpg','begin,your,journey,same,way,Bruce,lee,did'),(27,'Human Weapon Kung Fu - Wing Chun Punch','http://www.youtube.com/watch?v=HRu0UaZTbVI',1,'240',' This is a Technique Shown on an Episode of \'Human Weapon\' on the History Channel Fridays !! Check your Local Listings. This Move is From the Kung Fu Episode\r\n','English',3520863,'Application','http://i.ytimg.com/vi/HRu0UaZTbVI/mqdefault.jpg','Technique,Shown'),(28,'Descendants of Wing Chun','http://www.youtube.com/watch?v=Iq4IdP1YiL8',90,'480',' Descendants of Wing Chun full movie\r\n','Non-English',940350,'Entertainment','http://i.ytimg.com/vi_webp/Iq4IdP1YiL8/mqdefault.webp','Descendants,Wing,Chun,full,movie'),(29,'Wing Chun (red shirt) vs Muay Thai Sparring','http://www.youtube.com/watch?v=jF5BKSivkS8',2,'720',' This is a friendly sparring session and folks are not here to prove a point, but to learn from each other.\r\n','English',846309,'Group demo','http://i.ytimg.com/vi_webp/jF5BKSivkS8/mqdefault.webp','friendly,sparring,session'),(30,'Wing Chun Vs Muay Thai','http://www.youtube.com/watch?v=jU8B6eNm2zs',1,'360',' A Wing Chun Practitioner goes to a Muay Thai school to challenge them and test his abilities.\r\n','Non-English',1536158,'Application','http://i.ytimg.com/vi_webp/jU8B6eNm2zs/mqdefault.webp','Wing,Chun,Practitioner,goes,Muay,Thai,school,challenge,test,abilities.'),(31,'Samuel Kwok Wing Chun fighting applications DEMO','http://www.youtube.com/watch?v=kDnm0YiNfcA',5,'480',' This video aims to show techniques clearly, hence one person has head gear the other gloves.\r\n','English',866383,'Tutorial','http://i.ytimg.com/vi_webp/kDnm0YiNfcA/mqdefault.webp','Master,Samuel,Kwok,shows,Wing,Chun,can,applied'),(32,'Wing chun and Aikido (Kormushin and Mikhailov)','http://www.youtube.com/watch?v=KOJdxaOHJ1w',13,'480',' none\r\n','Non-English',851302,'Tutorial','http://i.ytimg.com/vi_webp/KOJdxaOHJ1w/mqdefault.webp','Wing,chun,Aikido,(Kormushin,Mikhailov)'),(33,'Takedown vs. Wing Chun','http://www.youtube.com/watch?v=LkLTxwATgbs',2,'480',' Takedown vs. Wing Chun\r\n','English',750843,'Group demo','http://i.ytimg.com/vi_webp/LkLTxwATgbs/mqdefault.webp','Takedown,Wing,Chun'),(34,'Wing Chun Kung Fu vs. Karate','http://www.youtube.com/watch?v=msM6oXWBqXE',3,'360',' Donnie Yen (Kung Fu estilo Wing Chun) vs Karate\r\n','Non-English',542659,'Entertainment','http://i.ytimg.com/vi_webp/msM6oXWBqXE/mqdefault.webp','Donnie,Yen,(Kung,estilo,Wing,Chun),Karate'),(35,'Wing Chun & Ju Jitsu - Samuel Kwok & Carlson Graci','http://www.youtube.com/watch?v=n3jJ-lb7N8A',7,'240',' Two great masters demonstrate their styles.\r\n','Non-English',928338,'Tutorial','http://i.ytimg.com/vi/n3jJ-lb7N8A/mqdefault.jpg','Two,great,masters,demonstrate,their,styles.'),(36,'Wing Chun Lesson 3: basic leg exercise/moving forw','http://www.youtube.com/watch?v=nTky4vOOy3A',2,'360',' You\'ve seen the hit movie Ip man, now learn how to use wing Chun techniques in the modern world. Master Wong wing Chun training makes it possible for you to use Wing Chun in full contact for real vs. Muay Thai, vs. boxing, vs. karate, vs. anyone! Available in Ipswich Suffolk and online.\r\n','English',560490,'Tutorial','http://i.ytimg.com/vi/nTky4vOOy3A/mqdefault.jpg',' learn,wing,Chun,techniques,modern,world.'),(37,'kung fu (wing chun) vs karate','http://www.youtube.com/watch?v=NUOjnf8dc_w',6,'240',' none\r\n','Non-English',605753,'Group demo','http://i.ytimg.com/vi_webp/NUOjnf8dc_w/mqdefault.webp','kung,(wing,chun),karate'),(38,'Wing tsun guy vs karate guy','http://www.youtube.com/watch?v=NZ3-Hi-kMNo',1,'480',' 1º grado de wing tsun contra karateka.pant negro wt, blanco karate\r\n','Non-English',2597526,'Entertainment','http://i.ytimg.com/vi/NZ3-Hi-kMNo/mqdefault.jpg','grado,wing,tsun,contra,karateka.pant,negro,wt,,blanco,karate'),(39,'Wing Chun vs Boxing - How to bridge a Jab','http://www.youtube.com/watch?v=orG1d0d7gq8',17,'360',' This is an instructional clip with some basic ideas (for Wing Chun) of closing the distance on a punch that retracts quickly. These concepts may help a Wing Chun student get into range to apply their Wing Chun Chi Sao skills against an alive attacker who moves freely like a boxer. \r\n','English',1603741,'Application','http://i.ytimg.com/vi_webp/orG1d0d7gq8/mqdefault.webp','Master,teacher,Mark,Phillips,takes,our,students,through,ideas,safely,closing,gap,,then,moving,when,contact. '),(40,'Superb Wing Tsun Chi Sao demonstration','http://www.youtube.com/watch?v=qaP1X-lEtgc',2,'240',' Sifu Emin Boztepe doin Chi Sao with Michael Casey.\r\n','English',2560640,'Application','http://i.ytimg.com/vi/qaP1X-lEtgc/mqdefault.jpg','Sifu,Emin,Boztepe,doin,Chi,Sao,with,Michael,Casey.'),(41,'Kyokushin Karate vs Wing Chun','http://www.youtube.com/watch?v=QH13kYFzfFk',1,'240',' The purpose of this video is not a \"style vs style\" comparison, as many claim it to be. Rather it clearly shows how one martial artist (the karateka) is actually training to fight, while the other (the WC fighter) is like most martial artists in which he thinks he knows how to fight but does not train to actually fight.\r\n','Non-English',1365803,'Tutorial','http://i.ytimg.com/vi/QH13kYFzfFk/mqdefault.jpg','1st,World,Tournament.'),(42,'Wing Chun','http://www.youtube.com/watch?v=Qs3BGC4tiPk',3,'360',' none\r\n','English',590510,'Entertainment','http://i.ytimg.com/vi_webp/Qs3BGC4tiPk/mqdefault.webp','Wing,Chun'),(43,'Orange County Wing Chun | The Legend is Born: Ip M','http://www.youtube.com/watch?v=Ramwk_AkhgA',3,'360',' Orange County Wing Chun school, The Dragon Institute, presents the movie trailer for THE LEGEND IS BORN: IP MAN.Directing by Herman Yau and produced by Sin Kwok Lam, Ip Man\'s son, Ip Chun, serves as the film\'s advisor and cameos as Iip Man\'s legendary Wing Chun mentor Leung Bik. Under invitation from Foshan government, 2/3 of the scenes from Ip Man the Prequel were shot on location in Foshan, including the original village Wing Chun Ip Man lived in.\r\n','Non-English',2218321,'Entertainment','http://i.ytimg.com/vi_webp/Ramwk_AkhgA/mqdefault.webp','movie,trailer,THE,LEGEND,BORN'),(44,'Wing Chun, Ip Man','http://www.youtube.com/watch?v=RYivNC62Plo',4,'480',' A compilation of videos including Ip Man, Ip Ching, Ip Chung, Bruce Lee, and Samuel Kwok. all descendents of Ip Man Wing Chun. the music is a few songs from the last samurai-please dont ask.\r\n','English',3462160,'Group demo','http://i.ytimg.com/vi_webp/RYivNC62Plo/mqdefault.webp','compilation,videos,including,Man,,Ching,,Chung,,Bruce,Lee,,Samuel,Kwok.'),(45,'Sparring Wing Chun vs Pencasilat','http://www.youtube.com/watch?v=sRAhsIpZjjg',2,'480',' A national champion of pencasilat came to Saigon to have a friendly exchange with Pierre Francois Flores after his defeat with master Tuan.Due to the rumors around this fight in Hanoi of cheating by using unclean ways, he wanted to check of Flores\' level and confirm the rumors.\r\n','Non-English',719671,'Group demo','http://i.ytimg.com/vi_webp/sRAhsIpZjjg/mqdefault.webp','national,champion,pencasilat'),(46,'Wing Chun: The Legacy of Ip Man','http://www.youtube.com/watch?v=tEB3NEdfLRA',7,'480',' In this mini-documentary, a seven minute cut of the original 36 minute presentation of \'WING CHUN: the Legacy of Ip Man\' which appears on the Australasian DVD release of \'Grandmaster Ip Man\' (aka: \'Ip Man\') on the \'Eastern Eye\'/\'Madman Entertainment\' label, Melbourne-based Wing Chun instructor David Peterson gives a brief overview of the history and methods of the Wing Chun Gung-fu system and the man who brought this art to the general public - the late Grandmaster Ip Man.\r\n','English',780561,'Entertainment','http://i.ytimg.com/vi/tEB3NEdfLRA/mqdefault.jpg','Wing,Chun,instructor,David,Peterson,gives,brief,overview,history,methods,Wing,Chun,Gung-fu,system'),(47,'Must See: Wing chun vs kickboxing','http://www.youtube.com/watch?v=TH0cjMNVbfs',3,'480',' \"NMAL Free Style martial arts competition. Wing chun (white singlet ) has 17 years wing chun experience has only fought in his own style tournament and has no other external tournament experience, The Kickboxer has 6 years \r\nexperience and has tournament experience. This is modified rules. Full contact to the body, semi to the head and legs, Sweeps are allowed, No Knees or elbows. Belts are used for Judging only, the belts do not represent the fights experience.\r\nStreet combat is different to sport. Please respect the fighters as both are giving it a go.. Thank you for watching.\"\r\n','English',4210756,'Entertainment','http://i.ytimg.com/vi_webp/TH0cjMNVbfs/mqdefault.webp','Full,contact,body,,semi,head,legs,,Sweeps,allowed'),(48,'Wing Chun Training inch punch','http://www.youtube.com/watch?v=uCv70BHtDf0',1,'480',' none\r\n','Non-English',1232470,'Entertainment','http://i.ytimg.com/vi/uCv70BHtDf0/mqdefault.jpg','Wing,Chun,Training,inch,punch'),(49,'Wing Chun vs Karate Black Belt','http://www.youtube.com/watch?v=ufq_BaiRYoY',3,'480',' During a seminar that Sifu Shannon Moore was conducting on Wing Chun ,Chi-Sao and contact reflexes on April 13, 2012.. The gentleman wanted to see if Wing Chun could close the gap from the outside against a kicking opponent. His assumption was the Wing Chun could only work from close range. His Assumption was that Wing Chun fighting was Chi Sao even though it was explained that Chi Sao is not fighting but a tool used to sharpen contact reflexes used in fighting.. Thus FROM ANY RANGE that there is contact, be it sustained or not , a contact reflex can be developed. Answer: Wing Chun can work from all ranges AND EXCELS at close range were the fight is most imminent. Ultimately, someone is going to bridge the gap to end the fight.\r\n','English',1385283,'Group demo','http://i.ytimg.com/vi_webp/ufq_BaiRYoY/mqdefault.webp','During,seminar,Sifu,Shannon,Moore,conducting,Wing,Chun,,Chi-Sao,contact,reflexes,April,13,,2012.'),(50,'Ip Man Wing Chun Against 10 Karate Black Belts','http://www.youtube.com/watch?v=upwyWKzozII',3,'720',' A hard Wing Chun demonstration from the terrific movie Ip Man (2008) loosely based on the life of Grandmaster Yip Man, the well-known master of Wing Chun (or Wing Tsun/Ving Tsun) fighting style and the teacher of Bruce Lee.\r\n','Non-English',1501113,'Entertainment','http://i.ytimg.com/vi_webp/upwyWKzozII/mqdefault.webp','hard,Wing,Chun,demonstration,terrific,movie,Man'),(51,'\"Wing Chun\" Documentary','http://www.youtube.com/watch?v=uVkjj8568d8',35,'360',' \"Wing Chun\" - a documentary sponsored by Shui On Land. The film shows how we can use Wing Chun and its philosophy to improve our daily life, as well as investigating its claims to be scientifically based.\r\n','Non-English',1339168,'Tutorial,Entertainment,Application','http://i.ytimg.com/vi_webp/uVkjj8568d8/mqdefault.webp','film,shows,can,Wing,Chun,philosophy,improve,our,daily,life'),(52,'Wing Tsun Training','http://www.youtube.com/watch?v=vTZUibPr6kU',4,'240','  Wing Tsun training led by Sifu Bernd Wagner. Tragically in April 2008 he passed away at only 40.\r\n','English',2033736,'Application','http://i.ytimg.com/vi/vTZUibPr6kU/mqdefault.jpg','Wing,Tsun,training,led,Sifu,Bernd,Wagner. '),(53,'Wing Chun Techniques Applications - How To Improve','http://www.youtube.com/watch?v=W_tybgcDUio',8,'360',' Here Sifu Mark Phillips takes you on another interesting journey into skillset training within the UK Wing Chun Assoc\r\n','English',573848,'Tutorial','http://i.ytimg.com/vi_webp/W_tybgcDUio/mqdefault.webp',' another,short,excerpt,Sifu,Phillips'),(54,'Wing Chun VS Kick boxer','http://www.youtube.com/watch?v=xtQdCuxuWXw',2,'360',' my student Ishaq (ZIG SHORT / LITTLE YIP MAN) Sloan. fighting for the very first time..ever! @ the \"Man Up Stand Up\" tournament 2009.(Sifu Novell Bell gave him the nickname \"Little Ip Man\" after watching this fight.) although Ishaq did not win this match, he shows great potential, and is very dynamic with his wing chun.\r\n','English',2128350,'Entertainment','http://i.ytimg.com/vi_webp/xtQdCuxuWXw/mqdefault.webp','student,Ishaq,(ZIG,SHORT,LITTLE,YIP,MAN),Sloan.,fighting,first,time..ever'),(55,'Ip Chun (&#33865;&#28310;), 84yo wing chun legend','http://www.youtube.com/watch?v=y6oPgV0tJrM',4,'480',' In this video we meet sifu Ip Chun, son and successor of none other than Ip Man. He currently teaches classes at the humble Ving Tsun Athletic Association\'s headquarters in Mong Kok which was established in 1967. Ip Chun prefers to see Wing Chun as a health regimen rather than just a form of combat.The spry 84-year-old tells us about all things Wing Chun and his thoughts on the future of the martial art in today\'s society.\r\n','English',8926284,'Others','http://i.ytimg.com/vi/y6oPgV0tJrM/mqdefault.jpg','Bruce,Lee,,revival,Chinese,martial,art,has,taken,Hong,Kong,storm'),(57,'The Ultimate Wing Chun Training','http://www.youtube.com/watch?v=YtVwGWQfDII',8,'720',' Wing lessons available in Ipswich Suffolk, London and online. Training includes basic techniques ,chi sao , blocks,chain punchng , conditioning and preparation for competitions. sil lim tao , chum kiu and biu jee hands forms. Butterfly knives, pole form and dummy training. learn the basics of wing chun and begin your journey the same way as bruce lee did before he incorporated boxing and created jkd.\r\n','English',589995,'Tutorial','http://i.ytimg.com/vi/YtVwGWQfDII/mqdefault.jpg','Wing,lessons'),(58,'Best Wing Chun ever','http://www.youtube.com/watch?v=YWQKA18ADLs',4,'480',' This was the largest ever organized seminar. 200 people came to learn Koviljac wing chun.\r\n','English',896563,'Tutorial','http://i.ytimg.com/vi_webp/YWQKA18ADLs/mqdefault.webp','15.05.2010.'),(59,'Wing Tsun, Karate, Kung Fu - victor_gutierrez','http://www.youtube.com/watch?v=ZM676yGD_5w',4,'144',' Wing Tsun, Wing Chun - Victor Gutierrez\r\n','Non-English',1008315,'Tutorial','http://i.ytimg.com/vi/ZM676yGD_5w/mqdefault.jpg','Wing,Tsun,,Wing,Chun,Victor,Gutierrez'),(60,'Muay Thai Vs Wing Chun Real Fight','http://www.youtube.com/watch?v=zpRWtYC9HOI',2,'360',' Brutal fight\r\n','Non-English',1036323,'Group demo','http://i.ytimg.com/vi_webp/zpRWtYC9HOI/mqdefault.webp','Brutal,fight');
/*!40000 ALTER TABLE `fun_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `session` (
  `session_id` varchar(255) NOT NULL,
  `session_data` text NOT NULL,
  `session_lastaccesstime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session`
--

LOCK TABLES `session` WRITE;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
INSERT INTO `session` VALUES ('admin@email.com','','2014-12-01 22:15:41'),('my@email','http://www.youtube.com/watch?v=uVkjj8568d8|s:42:\"http://www.youtube.com/watch?v=uVkjj8568d8\";http://www.youtube.com/watch?v=5AKFNCIJdvA|s:42:\"http://www.youtube.com/watch?v=5AKFNCIJdvA\";http://www.youtube.com/watch?v=dTGeH5Fr8p0|s:42:\"http://www.youtube.com/watch?v=dTGeH5Fr8p0\";','2014-12-01 22:03:49'),('new@email.com','http://www.youtube.com/watch?v=uVkjj8568d8|s:42:\"http://www.youtube.com/watch?v=uVkjj8568d8\";','2014-12-01 22:09:03'),('tom','a','2014-12-01 20:34:44');
/*!40000 ALTER TABLE `session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userinfo`
--

DROP TABLE IF EXISTS `userinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userinfo` (
  `username` varchar(255) NOT NULL DEFAULT '',
  `pword` varchar(255) DEFAULT NULL,
  `admin` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userinfo`
--

LOCK TABLES `userinfo` WRITE;
/*!40000 ALTER TABLE `userinfo` DISABLE KEYS */;
INSERT INTO `userinfo` VALUES ('admin@email.com','adminpword1',1);
/*!40000 ALTER TABLE `userinfo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-01 14:31:41
