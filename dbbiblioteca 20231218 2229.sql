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
-- Create schema dbbiblioteca
--

CREATE DATABASE IF NOT EXISTS dbbiblioteca;
USE dbbiblioteca;

--
-- Definition of table `tbadm`
--

DROP TABLE IF EXISTS `tbadm`;
CREATE TABLE `tbadm` (
  `idadm` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idusuarios` int(10) unsigned NOT NULL,
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idadm`,`idusuarios`),
  KEY `FK_adm_usuarios` (`idusuarios`),
  CONSTRAINT `FK_adm_usuarios` FOREIGN KEY (`idusuarios`) REFERENCES `tbusuarios` (`idusuarios`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbadm`
--

/*!40000 ALTER TABLE `tbadm` DISABLE KEYS */;
INSERT INTO `tbadm` (`idadm`,`idusuarios`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (3,7,'2023-12-07 20:27:40','2023-12-15 19:45:17','A'),
 (6,14,'2023-12-15 19:54:01','2023-12-15 19:54:01','A');
/*!40000 ALTER TABLE `tbadm` ENABLE KEYS */;


--
-- Definition of table `tbdevolucoes`
--

DROP TABLE IF EXISTS `tbdevolucoes`;
CREATE TABLE `tbdevolucoes` (
  `iddevolucoes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idemprestimo` int(10) unsigned NOT NULL,
  `tempoemprestimo` varchar(15) DEFAULT NULL,
  `diasAtraso` int(11) DEFAULT NULL,
  `statusdevol` varchar(15) DEFAULT NULL,
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`iddevolucoes`,`idemprestimo`),
  KEY `FK_tbdevolucoes_tbemprestimo` (`idemprestimo`),
  CONSTRAINT `FK_tbdevolucoes_tbemprestimo` FOREIGN KEY (`idemprestimo`) REFERENCES `tbemprestimo` (`idemprestimo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbdevolucoes`
--

/*!40000 ALTER TABLE `tbdevolucoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbdevolucoes` ENABLE KEYS */;


--
-- Definition of table `tbemprestimo`
--

DROP TABLE IF EXISTS `tbemprestimo`;
CREATE TABLE `tbemprestimo` (
  `idemprestimo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idlivro` int(10) unsigned NOT NULL,
  `idusuarios` int(10) unsigned NOT NULL,
  `datadevolucao` date NOT NULL,
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idemprestimo`,`idlivro`,`idusuarios`),
  KEY `FK_tbemprestimo_tblivro` (`idlivro`),
  KEY `FK_tbemprestimo_tbusuarios` (`idusuarios`),
  CONSTRAINT `FK_tbemprestimo_tblivro` FOREIGN KEY (`idlivro`) REFERENCES `tblivro` (`idlivro`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbemprestimo_tbusuarios` FOREIGN KEY (`idusuarios`) REFERENCES `tbusuarios` (`idusuarios`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbemprestimo`
--

/*!40000 ALTER TABLE `tbemprestimo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbemprestimo` ENABLE KEYS */;


--
-- Definition of table `tblivro`
--

DROP TABLE IF EXISTS `tblivro`;
CREATE TABLE `tblivro` (
  `idlivro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idtipoLivro` int(10) unsigned NOT NULL,
  `titulo` varchar(245) NOT NULL,
  `autor` text NOT NULL,
  `datapubli` date NOT NULL,
  `descricao` longtext NOT NULL,
  `capa` varchar(90) DEFAULT NULL,
  `isbn` varchar(14) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idlivro`,`idtipoLivro`),
  KEY `FK_tblivro_tbtipoLivro` (`idtipoLivro`),
  CONSTRAINT `FK_tblivro_tbtipoLivro` FOREIGN KEY (`idtipoLivro`) REFERENCES `tbtipolivro` (`idtipoLivro`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblivro`
--

/*!40000 ALTER TABLE `tblivro` DISABLE KEYS */;
INSERT INTO `tblivro` (`idlivro`,`idtipoLivro`,`titulo`,`autor`,`datapubli`,`descricao`,`capa`,`isbn`,`quantidade`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (5,1,'O ladrão de raios','Rick Riordan','2012-11-13','Primeiro volume da saga Percy Jackson e os olimpianos, O ladrão de raios esteve entre os primeiros lugares na lista das séries mais vendidas do The New York Times. O autor conjuga lendas da mitologia grega com aventuras no século XXI. Nelas, os deuses do Olimpo continuam vivos, ainda se apaixonam por mortais e geram filhos metade deuses, metade humanos, como os heróis da Grécia antiga. Marcados pelo destino, eles dificilmente passam da adolescência. Poucos conseguem descobrir sua identidade. O garoto-problema Percy Jackson é um deles. Tem experiências estranhas em que deuses e monstros mitológicos parecem saltar das páginas dos livros direto para a sua vida. Pior que isso: algumas dessas criaturas estão bastante irritadas. Um artefato precioso foi roubado do Monte Olimpo e Percy é o principal suspeito. Para restaurar a paz, ele e seus amigos – jovens heróis modernos – terão de fazer mais do que capturar o verdadeiro ladrão: precisam elucidar uma traição mais ameaçadora que fúria dos deuses. Best-seller da Veja','http://books.google.com/books/content?id=FP-rXfdk7EoC&printsec=frontcover&img=1&zoom=1&edg','9788580570151',343,'2023-12-18 19:40:35','2023-12-18 19:40:35','A'),
 (6,1,'Harry Potter e a Pedra Filosofal','J.K. Rowling','2015-12-08','Quando virou o envelope, com a mão trêmula, Harry viu um lacre de cera púrpura com um brasão; um leão, uma águia, um texugo e uma cobra circulando uma grande letra \"H\". Harry Potter nunca havia ouvido falar de Hogwarts quando as cartas começaram a aparecer no capacho da Rua dos Alfeneiros, no 4. Escritos a tinta verde-esmeralda em pergaminho amarelado com um lacre de cera púrpura, as cartas eram rapidamente confiscadas por seus pavorosos tio e tia. Então, no aniversário de onze anos de Harry, um gigante com olhos que luziam como besouros negros chamado Rúbeo Hagrid surge com notícias surpreendentes: Harry Potter é um bruxo e tem uma vaga na Escola de Magia e Bruxaria de Hogwarts. Uma incrível aventura está para começar!','http://books.google.com/books/content?id=GjgQCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edg','9781781103685',44,'2023-12-18 20:09:22','2023-12-18 20:09:22','A'),
 (7,1,'Vermelho, branco e sangue azul','Casey McQuiston','2019-11-04','O que pode acontecer quando o filho da presidenta dos Estados Unidos se apaixona pelo príncipe da Inglaterra? Quando sua mãe foi eleita presidenta dos Estados Unidos, Alex Claremont-Diaz se tornou o novo queridinho da mídia norte-americana. Bonito, carismático e com personalidade forte, Alex tem tudo para seguir os passos de seus pais e conquistar uma carreira na política, como tanto deseja. Mas quando sua família é convidada para o casamento real do príncipe britânico Philip, Alex tem que encarar o seu primeiro desafio diplomático: lidar com Henry, irmão mais novo de Philip, o príncipe mais adorado do mundo, com quem ele é constantemente comparado — e que ele não suporta. O encontro entre os dois sai pior do que o esperado, e no dia seguinte todos os jornais do mundo estampam fotos de Alex e Henry caídos em cima do bolo real, insinuando uma briga séria entre os dois. Para evitar um desastre diplomático, eles passam um fim de semana fingindo ser melhores amigos e não demora para que essa relação evolua para algo que nenhum dos dois poderia imaginar — e que não tem nenhuma chance de dar certo. Ou tem? \"Vermelho, branco e sangue azul é escandalosamente divertido. É romântico, sexy, espirituoso e emocionante. Amei cada segundo.\" — Taylor Jenkins Reid, autora de Daisy Jones & The Six e Os sete maridos de Evelyn Hugo','http://books.google.com/books/content?id=FQyvDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edg','9788554515751',23,'2023-12-18 21:17:09','2023-12-18 21:17:09','A'),
 (8,1,'A Seleção','Kiera Cass','2012-09-17','Muitas garotas sonham em ser princesas, mas este não é o caso de America Singer. Ela topa se inscrever na Seleção só para agradar a mãe, certa de que não será sorteada para participar da competição em que o príncipe escolherá sua futura esposa. Mas é claro que depois disso sua vida nunca mais será a mesma... Para trinta e cinco garotas, a Seleção é a chance de uma vida. É a oportunidade de ser alçada a um mundo de vestidos deslumbrantes e joias valiosas. De morar em um palácio, conquistar o coração do belo príncipe Maxon e um dia ser a rainha. Para America Singer, no entanto, estar entre as Selecionadas é um pesadelo. Significa deixar para trás o rapaz que ama. Abandonar sua família e seu lar para entrar em uma disputa ferrenha por uma coroa que ela não quer. E viver em um palácio sob a ameaça constante de ataques rebeldes. Então America conhece pessoalmente o príncipe - e percebe que a vida com que sempre sonhou talvez não seja nada comparada ao futuro que nunca tinha ousado imaginar.','http://books.google.com/books/content?id=kCpHATwghZkC&printsec=frontcover&img=1&zoom=1&edg','9788580864434',44,'2023-12-18 21:22:19','2023-12-18 21:22:19','A'),
 (10,1,'O homem de giz','C. J. Tudor','2018-03-05','Assassinato e sinais misteriosos em uma trama para fãs de Stranger Things e Stephen King Em 1986, Eddie e os amigos passam a maior parte dos dias andando de bicicleta pela pacata vizinhança em busca de aventuras. Os desenhos a giz são seu código secreto: homenzinhos rabiscados no asfalto; mensagens que só eles entendem. Mas um desenho misterioso leva o grupo de crianças até um corpo desmembrado e espalhado em um bosque. Depois disso, nada mais é como antes. Em 2016, Eddie se esforça para superar o passado, até que um dia ele e os amigos de infância recebem um mesmo aviso: o desenho de um homem de giz enforcado. Quando um dos amigos aparece morto, Eddie tem certeza de que precisa descobrir o que de fato aconteceu trinta anos atrás. Alternando habilidosamente entre presente e passado, O Homem de Giz traz o melhor do suspense: personagens maravilhosamente construídos, mistérios de prender o fôlego e reviravoltas que vão impressionar até os leitores mais escaldados.','http://books.google.com/books/content?id=pGJNDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edg','9788551002957',29,'2023-12-18 21:23:58','2023-12-18 21:23:58','A'),
 (11,1,'O Colecionador','John Fowles','2018-04-12','O COLECIONADOR é a história de Frederick Clegg, um homem solitário, de origem humilde, menosprezado por uma sociedade esnobe, que encontra o grande amor de sua vida. Tudo o que ele deseja é passar um tempo a sós com ela, demonstrar seus nobres sentimentos e deixar claro que eles nasceram um para o outro.O COLECIONADOR também é a história de Miranda Gray, uma jovem estudante de artes sequestrada por um maníaco que acha que pode obrigá-la a se apaixonar por ele. Tudo o que ela deseja é escapar do cativeiro, e vai usar de toda sua inteligência para sobreviver ao inferno em que sua vida se transformou. O romance é narrado por dois personagens antagônicos: o sequestrador e sua vítima. Frederick e Miranda. Todos temos um pouco dos dois dentro de nós, concluímos ao final de suas páginas — quem consegue se desgrudar delas? Essa obra-prima lançada em 1963 continua perigosamente atual. Best-seller internacional, e ainda um sucesso de venda nos sebos após décadas fora de catálogo no Brasil, o grande romance de estreia de John Fowles está de volta com uma edição digna de colecionador, e aquele padrão de qualidade psicopata que só a DarkSide® Books tem. Com direito a capa dura, introdução do mestre Stephen King — inédita no Brasil — e mais conteúdos exclusivos. O feminismo, a solidão, a luta de classes, a liberdade, o que pode ou não ser considerado arte e o que pode ou não ser considerado amor... estes são apenas alguns dos temas que o autor traz à tona. Numa época sem textão de redes sociais, era com literatura de qualidade que pensadores dissecavam o mundo à sua volta. Com O COLECIONADOR, a DarkSide® abre a janela para que Miranda consiga sair do cativeiro e que sua história volte a encantar novas gerações de leitores.','Link não disponível.','9788594541086',23,'2023-12-18 21:39:06','2023-12-18 21:39:06','A');
/*!40000 ALTER TABLE `tblivro` ENABLE KEYS */;


--
-- Definition of table `tblog`
--

DROP TABLE IF EXISTS `tblog`;
CREATE TABLE `tblog` (
  `idlog` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulolog` varchar(45) DEFAULT NULL,
  `desclog` varchar(245) DEFAULT NULL,
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idlog`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblog`
--

/*!40000 ALTER TABLE `tblog` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblog` ENABLE KEYS */;


--
-- Definition of table `tbtipolivro`
--

DROP TABLE IF EXISTS `tbtipolivro`;
CREATE TABLE `tbtipolivro` (
  `idtipoLivro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipoLivro` varchar(45) NOT NULL,
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idtipoLivro`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbtipolivro`
--

/*!40000 ALTER TABLE `tbtipolivro` DISABLE KEYS */;
INSERT INTO `tbtipolivro` (`idtipoLivro`,`tipoLivro`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,'Livro','2023-12-04 20:13:24','2023-12-11 18:57:54','A'),
 (2,'Artigo Científico','2023-12-04 20:13:24','2023-12-11 18:57:54','A'),
 (3,'Monografia','2023-12-04 20:13:24','2023-12-11 18:57:54','A'),
 (4,'Apostila','2023-12-04 20:13:24','2023-12-11 18:57:54','A');
/*!40000 ALTER TABLE `tbtipolivro` ENABLE KEYS */;


--
-- Definition of table `tbusuarios`
--

DROP TABLE IF EXISTS `tbusuarios`;
CREATE TABLE `tbusuarios` (
  `idusuarios` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `telefone` varchar(16) DEFAULT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(245) NOT NULL,
  `pontuacao` int(11) NOT NULL DEFAULT 100,
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbusuarios`
--

/*!40000 ALTER TABLE `tbusuarios` DISABLE KEYS */;
INSERT INTO `tbusuarios` (`idusuarios`,`nome`,`telefone`,`cpf`,`email`,`senha`,`pontuacao`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (7,'Jovana','(21) 2 1212-1212','121.212.112-12','jov@gmail.com','$2y$10$O6cJj3ay4GWsUuiTMqWxNu.ypqqWWhyEuQ2gzJ4qy9bHmmAKRqX26',100,'2023-12-11 22:27:15','2023-12-11 22:27:15','A'),
 (10,'Jose Omar','(65) 9 3232-3232','117.273.672-16','joseomar@gmail.com','$2y$10$Gc7u5K6oTDn6WC6za1XZ0u94iXIr/qQDpLjLVCgRkEgVQ44jthYe.',100,'2023-12-14 19:53:26','2023-12-14 19:53:26','A'),
 (11,'Vitoria de Oliveira','(33) 9 3434-3434','121.212.121-21','vihh@gmail.com','$2y$10$pMHDz5kXPAMoybv9A4nhbuB17OLdNlC0Nnvn2xQeL6gnI3YC6YsyK',100,'2023-12-14 19:54:13','2023-12-14 19:54:13','A'),
 (12,'Kauã Juliano','(34) 8 7264-7324','122.365.135-61','juliano@gmail.com','$2y$10$Hw2BgXW7RJ.a934c8MXeAeamx5tXxqvwJc5VJPhgXbWaprzUPXVmu',100,'2023-12-14 19:54:53','2023-12-14 19:54:53','A'),
 (13,'Ana Clara','(33) 9 2635-4723','834.632.742-83','anaclara@gmail.com','$2y$10$6E04lp6640D59OiOYwylceQSPEOrupzKTutmTxKtkTQE5anSlJKGy',100,'2023-12-14 19:55:37','2023-12-14 19:55:37','A'),
 (14,'Ana Luísa','(33) 9 9923-6621','123.234.212-31','analu2023@bookadm.com','$2y$10$wfEJtqD82gkpDb4SlopEWe2.Dfr/U7FgojjAx9E38fIeWKKDvYfkm',100,'2023-12-15 19:53:18','2023-12-15 19:53:18','A'),
 (15,'Miguel','(33) 9 1221-2121','123.213.123-12','miguelis@gmail.com','$2y$10$5Ttyp8neVYYFVRriKN5IT.kQ61G1vqG/cK.x/h3B/ucC.18UCb9ga',100,'2023-12-15 20:02:11','2023-12-15 20:02:11','A');
/*!40000 ALTER TABLE `tbusuarios` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
