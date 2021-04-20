CREATE DATABASE IF NOT EXISTS CodeToPlay;
USE CodeToPlay;

CREATE TABLE IF NOT EXISTS users(
	idUser INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(45),
    password VARCHAR(45)
);

CREATE TABLE IF NOT EXISTS profile(
	idProfile INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(45) NOT NULL,
    nickname VARCHAR(45) NOT NULL,
    email VARCHAR(45) NOT NULL,
    country VARCHAR(100) NOT NULL,
    photo VARCHAR(100),
    birthday DATE,
    bio VARCHAR(200),
    users_idUser INT NOT NULL,
    FOREIGN KEY(users_idUser)
		REFERENCES users(idUser)
);

CREATE TABLE IF NOT EXISTS project(
	idProject INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    code LONGTEXT,
    name VARCHAR(45) NOT NULL,
    cover_page VARCHAR(45),
    users_idUser INT NOT NULL,
    FOREIGN KEY (users_idUser)
		REFERENCES users (idUser)
);

CREATE TABLE IF NOT EXISTS sounds(
	idSound INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(45) NOT NULL,
    link VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS characters(
	idCharacter INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(45) NOT NULL,
    link VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS scenarios(
	idScenario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(45) NOT NULL,
    link VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS project_has_scenarios(
	project_idProject INT NOT NULL,
    scenarios_idScenario INT NOT NULL,
    FOREIGN KEY (project_idProject)
		REFERENCES project (idProject),
	FOREIGN KEY (scenarios_idScenario)
		REFERENCES scenarios (idScenario),
	PRIMARY KEY (project_idProject, scenarios_idScenario)
);

CREATE TABLE IF NOT EXISTS project_has_sounds(
	project_idProject INT NOT NULL,
    sounds_idSound INT NOT NULL,
    FOREIGN KEY (project_idProject)
		REFERENCES project (idProject),
	FOREIGN KEY (sounds_idSound)
		REFERENCES sounds (idSound),
	PRIMARY KEY (project_idProject, sounds_idSound)
);

CREATE TABLE IF NOT EXISTS project_has_characters(
	project_idProject INT NOT NULL,
    characters_idCharacter INT NOT NULL,
    FOREIGN KEY (project_idProject)
		REFERENCES project (idProject),
	FOREIGN KEY (characters_idCharacter)
		REFERENCES characters (idCharacter),
	PRIMARY KEY (project_idProject, characters_idCharacter)
);

select * from users;
#SELECT * FROM users WHERE user = "juliabadin03@gmail.com";
#update profile set link = "../midia/images/scenarios/view_of_city_night.jpg" where link = "../midia/images/scenarios/view_of_night_city.jpg";*/
#DELETE FROM characters WHERE idcharacter = 5;
#DROP TABLE users;

