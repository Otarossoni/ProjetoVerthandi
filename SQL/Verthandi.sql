CREATE TABLE midia (
	id int PRIMARY KEY,
	nome varchar(60) NOT NULL,
	tipo varchar(20),
	status varchar(20),
	datatermino date,
	avaliacao varchar(500),
	nota int NOT NULL
);

CREATE TABLE usuario (
	id int PRIMARY KEY,
	nome varchar(60) NOT NULL,
	email varchar(50) NOT NULL,
	senha varchar(50) NOT NULL
);