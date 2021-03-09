CREATE DATABASE IF NOT EXISTS CodeToPlay;
USE CodeToPlay;

CREATE TABLE IF NOT EXISTS profile(
	idProfile INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(45) NOT NULL,
    surname VARCHAR(45) NOT NULL,
    email VARCHAR(45) NOT NULL,
    country VARCHAR(100) NOT NULL,
    photo VARCHAR(100),
    birthday DATE,
    bio VARCHAR(200),
    users_idUser INT NOT NULL,
    PRIMARY KEY(idProfile),
    FOREIGN KEY(users_idUser)
		REFERENCES users(idUser)
);

CREATE TABLE IF NOT EXISTS users(
	idUser INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(45),
    password VARCHAR(45),
    PRIMARY KEY(idUser)
);

CREATE TABLE IF NOT EXISTS project(
	idProject INT NOT NULL AUTO_INCREMENT,
    code MEDIUMTEXT,
    name VARCHAR(45),
    cover_page VARCHAR(45),
    users_idUser INT NOT NULL,
    PRIMARY KEY (idProject),
    FOREIGN KEY (users_idUser)
		REFERENCES users (idUser)
);

CREATE TABLE IF NOT EXISTS sounds(
	idSound INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(45),
    link VARCHAR(100),
    PRIMARY KEY (idSound)
);

CREATE TABLE IF NOT EXISTS characters(
	idCharacter INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(45),
    link VARCHAR(100),
    PRIMARY KEY (idCharacter)
);

CREATE TABLE IF NOT EXISTS scenarios(
	idScenario INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(45),
    link VARCHAR(100),
    PRIMARY KEY (idScenario)
);

CREATE TABLE IF NOT EXISTS project_has_scenarios(
	project_idProject INT NOT NULL,
    scenarios_idScenario INT NOT NULL,
    FOREIGN KEY (project_idProject)
		REFERENCES project (id_Project),
	FOREIGN KEY (scenarios_idScenario)
		REFERENCES scenarios (idScenario)
);

CREATE TABLE IF NOT EXISTS project_has_sounds(
	project_idProject INT NOT NULL,
    scenarios_idSound INT NOT NULL,
    FOREIGN KEY (project_idProject)
		REFERENCES project (id_Project),
	FOREIGN KEY (sounds_idSound)
		REFERENCES sounds (idSound)
);

CREATE TABLE IF NOT EXISTS project_has_characters(
	project_idProject INT NOT NULL,
    scenarios_idCharacter INT NOT NULL,
    FOREIGN KEY (project_idProject)
		REFERENCES project (id_Project),
	FOREIGN KEY (characters_idCharacter)
		REFERENCES characters (idCharacter)
);