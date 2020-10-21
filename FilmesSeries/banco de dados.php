DROP DATABASE IF exists comentaai;

CREATE DATABASE IF NOT EXISTS comentaai;

USE comentaai;

CREATE TABLE IF NOT EXISTS usuario (
    id_usuario INT AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    email VARCHAR(20) NOT NULL,
    senha VARCHAR(100) NOT NULL,
    permissao INT NOT NULL,
    PRIMARY KEY (id_usuario)
);

CREATE TABLE IF NOT EXISTS filme (
    id_filme INT AUTO_INCREMENT,
	foto varchar(200),
    nome VARCHAR(100) NOT NULL,
    ano INT NOT NULL,
    genero SET('acao', 'comedia', 'comedia romantica', 'drama', 'fantasia', 'ficcao cientifica', 'religioso', 'romance', 'suspense', 'terror') NOT NULL,
    classificacao SET('LIVRE', '10', '12', '14', '16', '18') NOT NULL,
    duracao INT NOT NULL,
    sinopse VARCHAR(1000) NOT NULL,
    PRIMARY KEY (id_filme)
);

CREATE TABLE IF NOT EXISTS serie (
    id_serie INT AUTO_INCREMENT,
	foto varchar(200),
    nome VARCHAR(100) NOT NULL,
    ano INT NOT NULL,
    genero SET('acao', 'comedia', 'comedia romantica', 'drama', 'fantasia', 'ficcao cientifica', 'religioso', 'romance', 'suspense', 'terror') NOT NULL,
    classificacao SET('LIVRE', '10', '12', '14', '16', '18') NOT NULL,
    duracao INT NOT NULL,
    temporada int NOT NULL,
	sinopse VARCHAR(1000),
    PRIMARY KEY (id_serie)
);

CREATE TABLE IF NOT EXISTS lancamento (
    id_lancamento INT AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    data DATE NOT NULL,
	tipo char(1),
	duracao_temporada int,
	imagem varchar(200),
	classificacao SET('LIVRE', '10', '12', '14', '16', '18'),
	genero SET('Ação','Comédia','Comédia romântica','Drama','Ficção científica','Religioso','Romance','Suspense','Terror')
    sinopse varchar(1000),
	PRIMARY KEY (id_lancamento)
);

CREATE TABLE IF NOT EXISTS avaliacao_filme (
    id_avaliacao_filme INT AUTO_INCREMENT,
    cod_filme INT,
    cod_usuario INT,
    nota FLOAT NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    descricao VARCHAR(1000) NOT NULL,
    PRIMARY KEY (id_avaliacao_filme),
    FOREIGN KEY (cod_filme)
        REFERENCES filme (id_filme),
    FOREIGN KEY (cod_usuario)
        REFERENCES usuario (id_usuario)
);

CREATE TABLE IF NOT EXISTS avaliacao_serie (
    id_avaliacao_serie INT AUTO_INCREMENT,
    cod_serie INT,
    cod_usuario INT,
	temporada INT,
    nota FLOAT NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    descricao VARCHAR(1000) NOT NULL,
    PRIMARY KEY (id_avaliacao_serie),
    FOREIGN KEY (cod_serie)
        REFERENCES serie (id_serie),
    FOREIGN KEY (cod_usuario)
        REFERENCES usuario (id_usuario)
);

CREATE VIEW view_avaliacao_filme AS
    SELECT 
		avaliacao_filme.id_avaliacao_filme as 'id_avaliacao_filme',
        usuario.nome AS 'usuario',
		usuario.id_usuario as 'id_usuario',
        filme.nome AS 'filme',
        avaliacao_filme.nota AS 'nota',
        avaliacao_filme.titulo AS 'titulo',
        avaliacao_filme.descricao AS 'descricao',
        avaliacao_filme.spoiler AS 'spoiler'
    FROM
        avaliacao_filme
            INNER JOIN
        filme ON avaliacao_filme.cod_filme = filme.id_filme
            INNER JOIN
        usuario ON avaliacao_filme.cod_usuario = usuario.id_usuario;


CREATE VIEW view_avaliacao_serie AS
    SELECT 
		avaliacao_serie.id_avaliacao_serie as 'id_avaliacao_serie',
        usuario.nome AS 'usuario',
		usuario.id_usuario as 'id_usuario',
        serie.nome AS 'serie',
        avaliacao_serie.titulo AS 'temporada',
        avaliacao_serie.nota AS 'nota',
        avaliacao_serie.titulo AS 'titulo',
        avaliacao_serie.descricao AS 'descricao',
        avaliacao_serie.spoiler AS 'spoiler'
    FROM
        avaliacao_serie
            INNER JOIN
        serie ON avaliacao_serie.cod_serie = serie.id_serie
            INNER JOIN
        usuario ON avaliacao_serie.cod_usuario = usuario.id_usuario;



