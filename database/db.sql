CREATE DATABASE IF NOT EXISTS `VGjaX4G78w`;
USE `VGjaX4G78w`;

CREATE TABLE IF NOT EXISTS `characters` (
  `idCharacter` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idCharacter`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `functions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_function` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `profile` (
  `idProfile` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `bio` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `users_idUser` int(11) NOT NULL,
  PRIMARY KEY (`idProfile`),
  KEY `users_idUser` (`users_idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `project` (
  `idProject` int(11) NOT NULL AUTO_INCREMENT,
  `sequencia` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `valores_seq` longtext COLLATE utf8_unicode_ci,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cover_page` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `users_idUser` int(11) NOT NULL,
  PRIMARY KEY (`idProject`),
  KEY `users_idUser` (`users_idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `project_has_characters` (
  `project_idProject` int(11) NOT NULL,
  `characters_idCharacter` int(11) NOT NULL,
  `characters_NameCharacter` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`project_idProject`,`characters_idCharacter`),
  KEY `characters_idCharacter` (`characters_idCharacter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `project_has_scenarios` (
  `project_idProject` int(11) NOT NULL,
  `scenarios_idScenario` int(11) NOT NULL,
  `scenarios_NameScenario` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`project_idProject`,`scenarios_idScenario`),
  KEY `scenarios_idScenario` (`scenarios_idScenario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `project_has_sounds` (
  `project_idProject` int(11) NOT NULL,
  `sounds_idSound` int(11) NOT NULL,
  `sounds_NameSound` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`project_idProject`,`sounds_idSound`),
  KEY `sounds_idSound` (`sounds_idSound`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `scenarios` (
  `idScenario` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idScenario`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `sounds` (
  `idSound` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idSound`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`users_idUser`) REFERENCES `users` (`iduser`);

ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`users_idUser`) REFERENCES `users` (`iduser`);

ALTER TABLE `project_has_characters`
  ADD CONSTRAINT `project_has_characters_ibfk_1` FOREIGN KEY (`project_idProject`) REFERENCES `project` (`idproject`),
  ADD CONSTRAINT `project_has_characters_ibfk_2` FOREIGN KEY (`characters_idCharacter`) REFERENCES `characters` (`idcharacter`);

ALTER TABLE `project_has_scenarios`
  ADD CONSTRAINT `project_has_scenarios_ibfk_1` FOREIGN KEY (`project_idProject`) REFERENCES `project` (`idproject`),
  ADD CONSTRAINT `project_has_scenarios_ibfk_2` FOREIGN KEY (`scenarios_idScenario`) REFERENCES `scenarios` (`idscenario`);

ALTER TABLE `project_has_sounds`
  ADD CONSTRAINT `project_has_sounds_ibfk_1` FOREIGN KEY (`project_idProject`) REFERENCES `project` (`idproject`),
  ADD CONSTRAINT `project_has_sounds_ibfk_2` FOREIGN KEY (`sounds_idSound`) REFERENCES `sounds` (`idsound`);