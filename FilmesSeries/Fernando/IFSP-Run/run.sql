CREATE DATABASE run DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

use run;

CREATE table usuarios(
	id int primary key auto_increment,
    usuario varchar(255) not null,
    senha varchar(255) not null,
    nome varchar(255) not null,
	email varchar(255) not null
);

-- senha = 1234
insert into usuarios (usuario, senha, nome, email) values ("admin", "700c8b805a3e2a265b01c77614cd8b21", "Administrador", "admin@todolist.com");
insert into usuarios (usuario, senha, nome, email) values ("fernando", "700c8b805a3e2a265b01c77614cd8b21", "Fernando Duarte", "fernando@todolist.com");

CREATE table corridas(
	id int primary key auto_increment,
    quilometro int,
    duracao varchar(8),
    caloria int,
    id_usuario int,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

insert into corridas (quilometro, duracao, caloria, id_usuario) values (123, "01:00:00", 123, 2);
insert into corridas (quilometro, duracao, caloria, id_usuario) values (123, "01:00:00", 123, 1);
insert into corridas (quilometro, duracao, caloria, id_usuario) values (222, "01:34:32", 222, 1);

select * from corridas;

select * from usuarios;
