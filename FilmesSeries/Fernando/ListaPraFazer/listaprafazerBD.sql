CREATE DATABASE listaprafazer DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

use listaprafazer;

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

CREATE table tarefas(
	id int primary key auto_increment,
    texto varchar(255) not null,
    data date,
    status int,
    id_usuario int,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

insert into tarefas (texto, data, status, id_usuario) values ("Pagar conta de luz", "2018-05-04", 1, 2);
insert into tarefas (texto, data, status, id_usuario) values ("Comprar pão", "2018-05-04", 2, 1);

select * from tarefas;

select * from usuarios;
