CREATE TABLE midia (
	id int PRIMARY KEY,
	nome varchar(60) NOT NULL,
	tipo int, 
	FOREIGN KEY (tipo) REFERENCES tipo(idTipo),
	autor int, 
	FOREIGN KEY (autor) REFERENCES autor(idAutor),
	status varchar(20),
	datatermino date,
	avaliacao varchar(500),
	nota int NOT NULL,
	usuario int,
	FOREIGN KEY (usuario) REFERENCES usuario(id)
);

CREATE TABLE usuario (
	id int PRIMARY KEY,
	nome varchar(60) NOT NULL,
	email varchar(50) NOT NULL,
	senha varchar(50) NOT NULL
);

CREATE TABLE tipo (
	idTipo int PRIMARY KEY,
	nome varchar(60) NOT NULL,
	descricao varchar(50) NOT NULL
);

CREATE TABLE autor (
	idAutor int PRIMARY KEY,
	nome varchar (100) NOT NULL,
	descricao varchar (300),
	tipo varchar (50) NOT NULL
);