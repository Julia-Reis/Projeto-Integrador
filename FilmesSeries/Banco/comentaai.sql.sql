DROP DATABASE comentaai;
CREATE DATABASE IF NOT EXISTS comentaai;
USE comentaai;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao_filme`
--

CREATE TABLE IF NOT EXISTS avaliacao_filme (
  id_avaliacao_filme int(11) NOT NULL AUTO_INCREMENT,
  cod_filme int(11) DEFAULT NULL,
  cod_usuario int(11) DEFAULT NULL,
  nota float NOT NULL,
  titulo varchar(100) NOT NULL,
  descricao varchar(1000) NOT NULL,
  PRIMARY KEY (id_avaliacao_filme),
  KEY cod_filme (cod_filme),
  KEY cod_usuario (`cod_usuario`)
);

--
-- Extraindo dados da tabela `avaliacao_filme`
--

INSERT INTO avaliacao_filme (`id_avaliacao_filme`, `cod_filme`, `cod_usuario`, `nota`, `titulo`, `descricao`) VALUES(3, 4, 2, 5, 'Sensacional', 'Maravigold');
INSERT INTO avaliacao_filme (`id_avaliacao_filme`, `cod_filme`, `cod_usuario`, `nota`, `titulo`, `descricao`) VALUES(4, 3, 13, 5, 'ótimo', 'Top!!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao_serie`
--

CREATE TABLE IF NOT EXISTS avaliacao_serie (
  id_avaliacao_serie int(11) NOT NULL AUTO_INCREMENT,
  cod_serie int(11) DEFAULT NULL,
  cod_usuario int(11) DEFAULT NULL,
  temporada int,
  nota float NOT NULL,
  titulo varchar(100) NOT NULL,
  descricao varchar(1000) NOT NULL,
  PRIMARY KEY (`id_avaliacao_serie`),
  KEY `cod_serie` (`cod_serie`),
  KEY `cod_usuario` (`cod_usuario`)
);

INSERT INTO avaliacao_serie (`id_avaliacao_serie`, `cod_serie`, `cod_usuario`, `temporada`, `nota`, `titulo`, `descricao`) VALUES(3, 2, 2, 1, 5, 'Super Recomendo', 'Bom demais da conta');
-- --------------------------------------------------------

--
-- Estrutura da tabela `filme`
--

CREATE TABLE IF NOT EXISTS `filme` (
  id_filme int(11) NOT NULL AUTO_INCREMENT,
  foto varchar(200) NOT NULL,
  nome varchar(100) NOT NULL,
  ano int(11) NOT NULL,
  genero set('Ação','Comédia','Comédia romântica','Drama','Fantasia','Ficção científica','Religioso','Romance','Suspense','Terror') NOT NULL,
  classificacao set('LIVRE','10','12','14','16','18') NOT NULL,
  duracao int(11) NOT NULL,
  sinopse varchar(1000) NOT NULL,
  PRIMARY KEY (`id_filme`)
);

--
-- Extraindo dados da tabela `filme`
--

INSERT INTO filme (`id_filme`, `foto`, `nome`, `ano`, `genero`, `classificacao`, `duracao`, `sinopse`) VALUES(3, '<img src="img/img_upload/20201020094423escritores da lierdade.jpg" class="imagem"/>', 'Escritores da Liberdade', 2007, 'Drama', '14', 123, 'Uma jovem e idealista professora chega a uma escola de um bairro pobre, que está corrompida pela agressividade e violência. Os alunos se mostram rebeldes e sem vontade de aprender, e há entre eles uma constante tensão racial. Assim, para fazer com que os alunos aprendam e também falem mais de suas complicadas vidas, a professora Gruwell aposta em métodos diferentes de ensino. Aos poucos, os alunos vão retomando a confiança em si mesmos, aceitando mais o conhecimento e reconhecendo valores.');
INSERT INTO filme (`id_filme`, `foto`, `nome`, `ano`, `genero`, `classificacao`, `duracao`, `sinopse`) VALUES(4, '<img src="img/img_upload/20201020103641estrelas alem do tempo.jpg" class="imagem"/>', 'Estrelas Além do Tempo', 2020, 'Drama', 'LIVRE', 103, 'AA');
INSERT INTO filme (`id_filme`, `foto`, `nome`, `ano`, `genero`, `classificacao`, `duracao`, `sinopse`) VALUES(5, '<img src="img/img_upload/20201020103751mulher_maravilha.jpg" class="imagem"/>', 'Mulher Maravilha', 2020, 'Ação', '14', 110, 'Mulher maravilhaaaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lancamento`
--

CREATE TABLE IF NOT EXISTS `lancamento` (
  id_lancamento int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(100) NOT NULL,
  data date NOT NULL,
  tipo char(1) NOT NULL,
  duracao_temporada int(11) NOT NULL,
  imagem varchar(200) NOT NULL,
  classificacao set('LIVRE','10','12','14','16','18') NOT NULL,
  genero set('Ação','Comédia','Comédia romântica','Drama','Ficção científica','Religioso','Romance','Suspense','Terror') NOT NULL,
  sinopse varchar(1000) NOT NULL,
  PRIMARY KEY (id_lancamento)
);

--
-- Extraindo dados da tabela `lancamento`
--

INSERT INTO `lancamento` (`id_lancamento`, `nome`, `data`, `tipo`, `duracao_temporada`, `imagem`, `classificacao`, `genero`, `sinopse`) VALUES(1, 'Estrelas Além do Tempo', '2020-10-30', 'f', 103, '<img src="img/img_upload/20201020103641estrelas alem do tempo.jpg" class="imagem"/>', 'LIVRE', 'Drama', 'AA');

--
-- Acionadores `lancamento`
--
DROP TRIGGER IF EXISTS `trigger_insere_lancamento_filme`;
DELIMITER //
CREATE TRIGGER `trigger_insere_lancamento_filme` AFTER INSERT ON `lancamento`
 FOR EACH ROW begin
   IF (NEW.tipo = 'f') THEN
        INSERT INTO filme (id_filme, foto, nome, ano, genero, classificacao, duracao, sinopse) 
		VALUES(NULL, NEW.imagem, NEW.nome, 
			year(sysdate()), NEW.genero, NEW.classificacao, NEW.duracao_temporada, NEW.sinopse);
     END IF;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `serie`
--

CREATE TABLE IF NOT EXISTS `serie` (
  id_serie int(11) NOT NULL AUTO_INCREMENT,
  foto varchar(200) NOT NULL,
  nome varchar(100) NOT NULL,
  ano int(11) NOT NULL,
  genero set('Ação','Comédia','Comédia romântica','Drama','Fantasia','Ficção científica','Religioso','Romance','Suspense','Terror') NOT NULL,
  classificacao set('LIVRE','10','12','14','16','18') NOT NULL,
  temporada int(11) NOT NULL,
  sinopse varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id_serie`)
);

--
-- Extraindo dados da tabela `serie`
--

INSERT INTO serie (`id_serie`, `foto`, `nome`, `ano`, `genero`, `classificacao`, `temporada`, `sinopse`) VALUES(2, '<img src="img/img_upload/20201020094541Arrow.jpg" class="imagem"/>', 'Arrow', 2012, 'Ação', '14', 8, 'Após um violento naufrágio, o playboy milionário Oliver Queen é dado como morto. Cinco anos depois, é resgatado de uma ilha do Pacífico e enviado de volta para Starling City, onde passa a agir como vigilante secreto.');
INSERT INTO serie (`id_serie`, `foto`, `nome`, `ano`, `genero`, `classificacao`, `temporada`, `sinopse`) VALUES(3, '<img src="img/img_upload/20201020094655prisonbreak.jpg" class="imagem"/>', 'Prison Break', 2005, 'Drama', '14', 5, 'Michael Scofield é um homem desesperado numa situação desesperadora. Seu irmão, Lincoln Burrows, que foi condenado por um crime que não cometeu, é colocado no corredor da morte.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  id_usuario int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(30) NOT NULL,
  email varchar(20) NOT NULL,
  senha varchar(100) NOT NULL,
  permissao int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`)
);

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO usuario (`id_usuario`, `nome`, `email`, `senha`, `permissao`) VALUES(2, 'Carlos', 'carlos@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2);
INSERT INTO usuario (`id_usuario`, `nome`, `email`, `senha`, `permissao`) VALUES(3, 'Julia', 'julia@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1);
INSERT INTO usuario (`id_usuario`, `nome`, `email`, `senha`, `permissao`) VALUES(13, 'Laura', 'laura@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2);
INSERT INTO usuario (`id_usuario`, `nome`, `email`, `senha`, `permissao`) VALUES(14, 'Fernando', 'fernando@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2);

-- --------------------------------------------------------

--
-- view `view_avaliacao_filme`
--
CREATE TABLE IF NOT EXISTS `view_avaliacao_filme` (
id_avaliacao_filme int(11),
usuario varchar(30),
id_usuario int(11),
foto varchar(200),
filme varchar(100),
nota float,
titulo varchar(100),
descricao varchar(1000)
);
-- --------------------------------------------------------

--
-- view `view_avaliacao_serie`
--
CREATE TABLE IF NOT EXISTS `view_avaliacao_serie` (
usuario varchar(30),
foto varchar(200),
serie varchar(100),
temporada varchar(100),
nota float,
titulo varchar(100),
descricao varchar(1000)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_lancamento_filme`
--
CREATE TABLE IF NOT EXISTS view_lancamento_filme (
id_lancamento int(11),
nome varchar(100),
data date,
tipo char(1),
duracao_temporada int(11),
imagem varchar(200),
classificacao set('LIVRE','10','12','14','16','18'),
genero set('Ação','Comédia','Comédia romântica','Drama','Ficção científica','Religioso','Romance','Suspense','Terror'),
sinopse varchar(1000)
);
-- --------------------------------------------------------

--
-- Structure for view `view_avaliacao_filme`
--
DROP TABLE IF EXISTS `view_avaliacao_filme`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_avaliacao_filme` AS select `avaliacao_filme`.`id_avaliacao_filme` AS `id_avaliacao_filme`,`usuario`.`nome` AS `usuario`,`usuario`.`id_usuario` AS `id_usuario`,`filme`.`foto` AS `foto`,`filme`.`nome` AS `filme`,`avaliacao_filme`.`nota` AS `nota`,`avaliacao_filme`.`titulo` AS `titulo`,`avaliacao_filme`.`descricao` AS `descricao` from ((`avaliacao_filme` join `filme` on((`avaliacao_filme`.`cod_filme` = `filme`.`id_filme`))) join `usuario` on((`avaliacao_filme`.`cod_usuario` = `usuario`.`id_usuario`)));

-- --------------------------------------------------------

--
-- Structure for view `view_avaliacao_serie`
--
DROP TABLE IF EXISTS `view_avaliacao_serie`;

CREATE VIEW `view_avaliacao_serie` AS select `usuario`.`nome` AS `usuario`,`serie`.`foto` AS `foto`,`serie`.`nome` AS `serie`,`avaliacao_serie`.`titulo` AS `temporada`,`avaliacao_serie`.`nota` AS `nota`,`avaliacao_serie`.`titulo` AS `titulo`,`avaliacao_serie`.`descricao` AS `descricao` from ((`avaliacao_serie` join `serie` on((`avaliacao_serie`.`cod_serie` = `serie`.`id_serie`))) join `usuario` on((`avaliacao_serie`.`cod_usuario` = `usuario`.`id_usuario`)));

-- --------------------------------------------------------

--
-- view `view_lancamento_filme`
--
DROP TABLE IF EXISTS `view_lancamento_filme`;

CREATE VIEW `view_lancamento_filme` AS select `lancamento`.`id_lancamento` AS `id_lancamento`,`lancamento`.`nome` AS `nome`,`lancamento`.`data` AS `data`,`lancamento`.`tipo` AS `tipo`,`lancamento`.`duracao_temporada` AS `duracao_temporada`,`lancamento`.`imagem` AS `imagem`,`lancamento`.`classificacao` AS `classificacao`,`lancamento`.`genero` AS `genero`,`lancamento`.`sinopse` AS `sinopse` from `lancamento` where (`lancamento`.`tipo` = 'f');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `avaliacao_filme`
--
ALTER TABLE `avaliacao_filme`
  ADD CONSTRAINT `avaliacao_filme_ibfk_1` FOREIGN KEY (`cod_filme`) REFERENCES `filme` (`id_filme`),
  ADD CONSTRAINT `avaliacao_filme_ibfk_2` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `avaliacao_serie`
--
ALTER TABLE `avaliacao_serie`
  ADD CONSTRAINT `avaliacao_serie_ibfk_1` FOREIGN KEY (`cod_serie`) REFERENCES `serie` (`id_serie`),
  ADD CONSTRAINT `avaliacao_serie_ibfk_2` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`id_usuario`);

select * from lancamento;
select * from usuario;
select * from filme;
select * from serie;
select * from avaliacao_filme;
select * from avaliacao_serie; 