-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dbbiblioteca
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
-- Table structure for table `tbcliente`
--

DROP TABLE IF EXISTS `tbcliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcliente` (
  `cpfClie` varchar(15) NOT NULL,
  `nmClie` varchar(80) DEFAULT NULL,
  `dtNascClie` date DEFAULT NULL,
  `idGenClie` varchar(30) DEFAULT NULL,
  `emailClie` varchar(90) DEFAULT NULL,
  `celClie` varchar(20) DEFAULT NULL,
  `endClie` varchar(120) DEFAULT NULL,
  `fk_idFunc` int DEFAULT NULL,
  PRIMARY KEY (`cpfClie`),
  KEY `fk_idFunc` (`fk_idFunc`),
  CONSTRAINT `tbcliente_ibfk_1` FOREIGN KEY (`fk_idFunc`) REFERENCES `tbfunc` (`idFunc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcliente`
--

LOCK TABLES `tbcliente` WRITE;
/*!40000 ALTER TABLE `tbcliente` DISABLE KEYS */;
INSERT INTO `tbcliente` VALUES ('999.999.999-91','Roberto Vargs','2001-01-01','Homem Trans','roberto@vargs.com.br','11 99999-9999','Rua Onde Judas Perdeu as Botas, 666 - Jardim São Jão Pedro',1),('999.999.999-92','Maria Clara','2011-11-11','Mulher Cis','maria@clara.com','11 99999-9999','Rua Onde Judas Perdeu as Botas, 666 - Jardim São Jão',1),('999.999.999-93','Mario Luís','2001-09-27','Homem Cis','marioluis@gmail.com','11 99999-9999','Super Mario Street, 899 - Vila Sitio dos Bowsers, Guarulhos - SP',1);
/*!40000 ALTER TABLE `tbcliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcomanda`
--

DROP TABLE IF EXISTS `tbcomanda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcomanda` (
  `codCom` int NOT NULL AUTO_INCREMENT,
  `dtCom` date DEFAULT NULL,
  `dtDev` date DEFAULT NULL,
  `fk_codLiv` int DEFAULT NULL,
  `fk_cpfClie` varchar(15) DEFAULT NULL,
  `fk_idFunc` int DEFAULT NULL,
  `fk_codLiv2` int DEFAULT NULL,
  `fk_codLiv3` int DEFAULT NULL,
  `devolvido` tinyint(1) DEFAULT NULL,
  `emAtraso` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`codCom`),
  KEY `fk_codLiv` (`fk_codLiv`),
  KEY `fk_cpfClie` (`fk_cpfClie`),
  KEY `fk_idFunc` (`fk_idFunc`),
  KEY `fk_codLiv2` (`fk_codLiv2`),
  KEY `fk_codLiv3` (`fk_codLiv3`),
  CONSTRAINT `tbcomanda_ibfk_1` FOREIGN KEY (`fk_codLiv`) REFERENCES `tblivro` (`codLiv`),
  CONSTRAINT `tbcomanda_ibfk_2` FOREIGN KEY (`fk_cpfClie`) REFERENCES `tbcliente` (`cpfClie`),
  CONSTRAINT `tbcomanda_ibfk_3` FOREIGN KEY (`fk_idFunc`) REFERENCES `tbfunc` (`idFunc`),
  CONSTRAINT `tbcomanda_ibfk_4` FOREIGN KEY (`fk_codLiv2`) REFERENCES `tblivro` (`codLiv`),
  CONSTRAINT `tbcomanda_ibfk_5` FOREIGN KEY (`fk_codLiv3`) REFERENCES `tblivro` (`codLiv`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcomanda`
--

LOCK TABLES `tbcomanda` WRITE;
/*!40000 ALTER TABLE `tbcomanda` DISABLE KEYS */;
INSERT INTO `tbcomanda` VALUES (6,'2022-09-30','2022-10-10',3,'999.999.999-91',1,NULL,NULL,1,0),(7,'2022-09-30','2022-10-10',1,'999.999.999-93',1,NULL,NULL,1,0),(8,'2022-09-30','2022-10-10',1,'999.999.999-92',1,NULL,NULL,1,0),(9,'2022-09-30','2022-10-10',3,'999.999.999-91',1,NULL,NULL,1,0),(10,'2022-09-30','2022-10-10',3,'999.999.999-92',1,NULL,NULL,1,0),(11,'2022-09-30','2022-10-10',2,'999.999.999-93',1,NULL,NULL,1,0);
/*!40000 ALTER TABLE `tbcomanda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbestoque`
--

DROP TABLE IF EXISTS `tbestoque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbestoque` (
  `codEst` int NOT NULL AUTO_INCREMENT,
  `qntdEst` int DEFAULT NULL,
  `dispEst` int DEFAULT NULL,
  `fk_codLiv` int DEFAULT NULL,
  PRIMARY KEY (`codEst`),
  KEY `fk_codLiv` (`fk_codLiv`),
  CONSTRAINT `tbestoque_ibfk_1` FOREIGN KEY (`fk_codLiv`) REFERENCES `tblivro` (`codLiv`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbestoque`
--

LOCK TABLES `tbestoque` WRITE;
/*!40000 ALTER TABLE `tbestoque` DISABLE KEYS */;
INSERT INTO `tbestoque` VALUES (0,10,10,NULL),(2,10,10,NULL),(3,10,10,NULL),(5,0,0,NULL),(6,10,10,1),(7,10,10,2),(8,10,10,3);
/*!40000 ALTER TABLE `tbestoque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbfunc`
--

DROP TABLE IF EXISTS `tbfunc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbfunc` (
  `idFunc` int NOT NULL AUTO_INCREMENT,
  `cpfFunc` varchar(15) DEFAULT NULL,
  `nmFunc` varchar(80) DEFAULT NULL,
  `dtNascFunc` date DEFAULT NULL,
  `idGenFunc` varchar(30) DEFAULT NULL,
  `emailFunc` varchar(90) DEFAULT NULL,
  `celFunc` varchar(20) DEFAULT NULL,
  `endFunc` varchar(120) DEFAULT NULL,
  `ativoFunc` tinyint(1) DEFAULT NULL,
  `perfilFunc` char(3) DEFAULT NULL,
  `senhaFunc` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`idFunc`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbfunc`
--

LOCK TABLES `tbfunc` WRITE;
/*!40000 ALTER TABLE `tbfunc` DISABLE KEYS */;
INSERT INTO `tbfunc` VALUES (1,'469.939.888-01','Gabriel Klark','2005-01-17','Homem Cis','gabrielklarketec@gmail.com','11 99999-9999','Rua Conceição do Rio Verde, 672 - Vila Sitio dos Morros - Cocaia, Guarulhos - SP',1,'Adm','$2y$10$LvkzlS3R0rwJBpukqFFIsuSxOk0vbYdjDfHTULoZqTkn2yUZYO5AO'),(2,'999.999.999-01','Leticia Regis','2005-01-01','Mulher Cis','leti@gmail.com','11 98888-8888','Rua Onde Judas Perdeu as Botas, 666 - Jardim São Jão',1,'Adm','$2y$10$UbHN9X58DowgZ7acfLk.xeAbX5UoG9icwiHf4akZcllxRqJo53R8m'),(3,'999.999.999-03','Bede','2004-08-11','Não-Binário','naobede@bdsim.com','11 98682-9974','Rua Constelação do Seu Céu Vermelho Comunista, 66 - Bairro Socialista de Saçi - Amazônia - SP',1,'Adm','$2y$10$4UiFk7G58uSnpLlM0AFy4ecFivzf4XJmG1Ancz5iB238glbMlNgia'),(4,'999.999.999-04','Angel','2005-10-10','Mulher Cis','angel@anjo.deus','11 99999-9995','Rua Constelação do Seu Céu Vermelho Comunista, 66 - Bairro Socialista de Saçi - Amazônia - SP',1,'Usr','$2y$10$bWcgkf1uTIU6mp6lMyGxheqcHhwHfCL0s0SwnyI1kMQfqs7ZBua7a');
/*!40000 ALTER TABLE `tbfunc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblivro`
--

DROP TABLE IF EXISTS `tblivro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblivro` (
  `codLiv` int NOT NULL AUTO_INCREMENT,
  `isbnLiv` varchar(18) DEFAULT NULL,
  `titLiv` varchar(80) DEFAULT NULL,
  `autorLiv` varchar(80) DEFAULT NULL,
  `editoraLiv` varchar(80) DEFAULT NULL,
  `anoLiv` year DEFAULT NULL,
  `idiomaLiv` varchar(30) DEFAULT NULL,
  `custoLiv` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`codLiv`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblivro`
--

LOCK TABLES `tblivro` WRITE;
/*!40000 ALTER TABLE `tblivro` DISABLE KEYS */;
INSERT INTO `tblivro` VALUES (1,'978-65-5532-057-2','A Cantiga dos Passáros e das Serpentes',' Suzanne Collins','Rocco Jovens Leitores',2021,'Português',35.00),(2,'978-85-4410-292-3','A Guerra dos Tronos. As Crônicas de Gelo e Fogo - Livro 1','George R.R. Martin','Leya (1 janeiro 2015)',2015,'Português',46.86),(3,'978-85-4220-779-8','Fala ai, Malena','Malena Nunes','Outro Planeta',2016,'Português',42.90);
/*!40000 ALTER TABLE `tblivro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'dbbiblioteca'
--

--
-- Dumping routines for database 'dbbiblioteca'
--
/*!50003 DROP PROCEDURE IF EXISTS `SP_InsertCliente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_InsertCliente`(
		cpf varchar(15)
        ,nm varchar(80)
		, dtNasc date
		, idGen varchar(30)
		, email varchar(90)
		, cel varchar(20)
		, ende varchar(120)
		, idFunc int
	)
BEGIN
	/* Verifica se o CPF já está cadastrado*/
	if exists(select cpfClie from tbCliente where cpfClie like cpf)
	then 
		select ('Erro_CPFCadastrado') as queryStatus;
    else
		BEGIN
			/* Cadastra Cliente*/
			insert into tbCliente(cpfClie, nmClie, dtNascClie, idGenClie, emailClie, celClie, endClie, fk_idFunc)
				values (cpf,nm, dtNasc, idGen, email, cel, ende, idFunc);
			select ('SUCESSO_ClienteCadastrado') as queryStatus;
		END;
	END if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_InsertForEstoque` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_InsertForEstoque`(isbn varchar(18), qntd int, disp int)
BEGIN
	set @cod := (select codLiv from tbLivro where isbnLiv like isbn limit 1);
    insert into tbEstoque(qntdEst, dispEst, fk_codLiv) values
    (
		qntd, disp, @cod
    );
    select codEst from tbEstoque where fk_codLiv = @cod;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_InsertRealizarComanda` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_InsertRealizarComanda`(cpf varchar(15),realizado date, dev date, isbn varchar(18), isbn2 varchar(18), isbn3 varchar(18), func int)
BEGIN
	if exists(select codLiv from tbLivro where isbnLiv like isbn)
		then 
			if (exists(select codLiv from tbLivro where isbnLiv like isbn2) or isbn2 like '')
				then
					if (exists(select codLiv from tbLivro where isbnLiv like isbn3) or isbn3 like '')
						then
							set @cod := (select codLiv from tbLivro where isbnLiv like isbn);
                            if((select dispEst from tbEstoque where fk_codLiv = @cod) > 0)
								then
									if(isbn2 not like '')
										then set @cod2 := (select codLiv from tbLivro where isbnLiv like isbn);
									else
										set @cod2 := 0;
									end if;
                                    if(@cod2 = 0 or (select dispEst from tbEstoque where fk_codLiv = @cod2) > 0)
										then
											if(isbn3 not like '')
											then set @cod3 := (select codLiv from tbLivro where isbnLiv like isbn);
											else
												set @cod3 := 0;
											end if;
                                            if(@cod3 = 0 or (select dispEst from tbEstoque where fk_codLiv = @cod3) > 0)
												then
													insert into tbComanda(dtCom, dtDev, devolvido , emAtraso, fk_codLiv, fk_codLiv2, fk_codLiv3, fk_cpfClie, fk_idFunc) 
														values (realizado, dev, false, false, @cod, @cod2, @cod3, cpf, func);
                                                    set @codEst := (select codEst from tbEstoque where fk_codLiv = @cod limit 1);
                                                    set @codEst2 := (select codEst from tbEstoque where fk_codLiv = @cod2 limit 1);
                                                    set @codEst3 := (select codEst from tbEstoque where fk_codLiv = @cod3 limit 1);
                                                    update tbEstoque
														set dispEst = (dispEst - 1)
														where codEst = @codEst;
													update tbEstoque
														set dispEst = (dispEst - 1)
														where codEst = @codEst2;
													update tbEstoque
														set dispEst = (dispEst - 1)
														where codEst = @codEst3;
													select codCom from tbComanda where fk_cpfClie like cpf order by dtCom limit 1;
											else
												select 'ISBN3_INDISPONIVEL' as codCom;
											end if;
									else
										select 'ISBN2_INDISPONIVEL' as codCom;
                                    end if;
								else
									select 'ISBN_INDISPONIVEL' as codCom;
								end if;
					else
						select 'ISBN3_INVALIDO' as codCom;
					end if;
			else
				select 'ISBN2_INVALIDO' as codCom;
			end if;
	else
		select 'ISBN_INVALIDO' as codCom;
    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_SelectForEstoqueInsert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_SelectForEstoqueInsert`(isbn varchar(18))
BEGIN
	/* Verifica se o livro está cadastrado*/
	if exists(select isbnLiv from tbLivro where isbnLiv like isbn)
	then 
		BEGIN
			/* Verifica se o livro já está cadastrado no estoque*/
			set @cod := (select codLiv from tbLivro where isbnLiv like isbn);
			if exists(select codEst from tbEstoque where fk_codLiv = @cod)
				then select ('Erro_EstoqueCadastrado') as codLiv, ('') as titLiv;
			else
				/*Retorna os dados do livro*/
				select * from tbLivro where isbnLiv like isbn; 
			END if;
		END;
    else
		select ('Erro_EncontrarLivro') as codLiv, ('') as titLiv;
	END if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_SelectForEstoqueUpdate` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_SelectForEstoqueUpdate`(isbn varchar(18))
BEGIN
	/* Verifica se o livro já está cadastrado no estoque*/
	set @cod := (select codLiv from tbLivro where isbnLiv like isbn);
	if exists(select codEst from tbEstoque where fk_codLiv = @cod)
		/*Retorna os dados do livro*/
        then select tbEstoque.codEst, tbEstoque.qntdEst, tbEstoque.dispEst, tbLivro.titLiv
			from tbEstoque INNER JOIN tbLivro
			on tbEstoque.fk_codLiv = tbLivro.codLiv
			where tbEstoque.fk_codLiv = @cod limit 1;
			/*then select * from tbEstoque where fk_codLiv = @cod limit 1;*/
	else
		/*Retorna erro*/
        select ('Erro_EstoqueNaoCadastrado') as codEst, 0 as qntdEst, 0 as dispEst, 0 as fk_codLiv/*titLiv*/ ;
	END if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_SelectForVerifyCliente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_SelectForVerifyCliente`(cpf varchar(15))
BEGIN
	select * from tbCliente where cpfClie like cpf;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_UpdateForEstoque` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_UpdateForEstoque`(isbn varchar(18), qntd int, disp int)
BEGIN
	set @cod := (select codLiv from tbLivro where isbnLiv like isbn limit 1);
	update tbEstoque
		set qntdEst = qntd, dispEst = disp 
		where fk_codLiv = @cod;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-03 16:00:42
