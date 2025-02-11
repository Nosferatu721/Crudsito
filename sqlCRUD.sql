CREATE DATABASE ciudad;
USE ciudad;

CREATE TABLE clima(
	`idClima` INT(11) NOT NULL AUTO_INCREMENT,
	`nombreClima` VARCHAR(20) NOT NULL,
	CONSTRAINT PK_clima PRIMARY KEY(idClima)
)ENGINE=InnoDb;

CREATE TABLE pais(
	`idPais` INT(11) NOT NULL AUTO_INCREMENT,
	`nombrePais` VARCHAR(20) NOT NULL,
	CONSTRAINT PK_pais PRIMARY KEY(idPais)
)ENGINE=InnoDb;

CREATE TABLE userr(
	`idUser` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(20) NOT NULL,
	`password` VARCHAR(20) NOT NULL,
	CONSTRAINT PK_user PRIMARY KEY(idUser)
)ENGINE=InnoDb;

CREATE TABLE ciudad(
	`idCiudad` INT(11) NOT NULL AUTO_INCREMENT,
	`nombreCiudad` VARCHAR(50) NOT NULL,
	`paisID` INT(11) NOT NULL,
	`climaID` INT(11) NOT NULL,
	`fecha` date,
	CONSTRAINT PK_ciudad PRIMARY KEY(idCiudad),
	CONSTRAINT FK_ciudad_pais FOREIGN KEY(paisID) REFERENCES pais(idPais),
	CONSTRAINT FK_ciudad_clima FOREIGN KEY(climaID) REFERENCES clima(idClima)
)ENGINE=InnoDb;