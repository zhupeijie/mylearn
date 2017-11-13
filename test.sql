-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: test_1
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '产品ｉｄ',
  `name` varchar(45) NOT NULL COMMENT '产品名称',
  `type` int(3) NOT NULL COMMENT '产品类型：10　饮品　２０　糕点　　３０　护肤品　４０　其他\n　 ',
  `series` int(3) NOT NULL COMMENT '产品系列　１：蜜蜂堂　　２：黄蜂糖　　３：　马蜂糖',
  `price` decimal(12,2) NOT NULL COMMENT '产品价格：　两位小数（单位:元）',
  `isDelete` smallint(1) NOT NULL DEFAULT '0' COMMENT '是否删除: 默认0未删除;1已删除',
  `createId` int(11) NOT NULL COMMENT '创建人id',
  `createTime` varchar(45) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='产品表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'蜂王浆',10,1,100.00,0,1,'20171105'),(2,'蜂王面包',20,1,200.00,0,1,'20171105'),(3,'蜂王面膜',30,1,146.00,0,1,'20171105'),(4,'马蜂浆',10,2,101.00,0,1,'20171105'),(5,'马蜂面包',20,2,201.00,0,1,'20171105'),(6,'马蜂面膜',30,2,146.11,0,1,'20171105'),(7,'黄蜂浆',10,3,11.00,0,1,'20171105'),(8,'黄蜂面包',20,3,21.00,0,1,'20171105'),(9,'黄蜂面膜',30,3,56.00,0,1,'20171105');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-05 23:08:45
