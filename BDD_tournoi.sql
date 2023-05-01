CREATE DATABASE IF NOT EXISTS Tournoi DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE Tournoi;

CREATE TABLE IF NOT EXISTS `tournoi`.`utilisateurs` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dateCreation` DATETIME NOT NULL,
  `pseudo` VARCHAR(50) NOT NULL,
  `pass` VARCHAR(50) NOT NULL,
  `email` VARCHAR(250) NOT NULL,
  `dateNaissance` DATE NOT NULL,
  `role` INT(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = latin1

CREATE TABLE IF NOT EXISTS `tournoi`.`jeux` (
  `id` CHAR(5) NOT NULL,
  `nom` VARCHAR(255) NOT NULL,
  `logo` VARCHAR(255) NOT NULL,
  `banniere` VARCHAR(255) NOT NULL,
  `trophee` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB

CREATE TABLE IF NOT EXISTS `tournoi`.`tournois` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) CHARACTER SET 'utf8mb3' NOT NULL,
  `datedebut` DATETIME NOT NULL,
  `prix` INT(10) NOT NULL,
  `id_jeu` CHAR(255) NOT NULL,
  `currentphase` TINYINT(4) NULL DEFAULT 0,
  `participants` INT(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 173

CREATE TABLE IF NOT EXISTS `tournoi`.`matchs` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_tournoi` INT(11) NOT NULL,
  `id_joueur1` VARCHAR(25) NOT NULL,
  `score_joueur1` SMALLINT(6) NOT NULL DEFAULT 0,
  `id_joueur2` VARCHAR(25) NOT NULL,
  `score_joueur2` SMALLINT(6) NOT NULL DEFAULT 0,
  `phase` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_tournoi` (`id_tournoi` ASC) VISIBLE,
  INDEX `id_joueur1` (`id_joueur1` ASC, `id_joueur2` ASC) VISIBLE,
  INDEX `matchs_ibfk_2` (`id_joueur2` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 472

CREATE TABLE IF NOT EXISTS `tournoi`.`inscriptions` (
  `id_tournoi` INT(11) NOT NULL,
  `id_joueur` VARCHAR(25) NOT NULL,
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_tournoi`, `id_joueur`),
  INDEX `id_tournoi` (`id_tournoi` ASC) VISIBLE,
  INDEX `id_joueur` (`id_joueur` ASC) VISIBLE,
  INDEX `id_tournoi_2` (`id_tournoi` ASC, `id_joueur` ASC) VISIBLE,
  INDEX `ai` (`id` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 687

CREATE TABLE IF NOT EXISTS `tournoi`.`phase` (
  `id_tournoi` INT(11) NOT NULL,
  `phase` TINYINT(4) NOT NULL,
  `time` DATETIME NOT NULL,
  PRIMARY KEY (`id_tournoi`, `phase`),
  INDEX `id_tournoi` (`id_tournoi` ASC) VISIBLE)
ENGINE = InnoDB

INSERT INTO `tournoi`.`jeux`
(`id`,
`nom`,
`logo`,
`banniere`,
`trophee`)
VALUES
('apex', 'Apex Legends', 'apex.jpg', 'banniere_apex.jpg', 'trophee_apex.png'),
('cod', 'Call Of Duty: Warzone', 'warzone.jpg', 'banniere_warzone.jpg', 'trophee_warzone.png'),
('csgo', 'Counter-Strike: Global Offensive', 'csgo.jpg', 'banniere_csgo.jpg', 'trophee_csgo.png'),
('eft', 'Escape From Tarkov', 'tarkov.jpg', 'banniere_tarkov.jpg', 'trophee_tarkov.png'),
('ftn', 'Fortnite', 'fortnite.jpg', 'banniere_fortnite.jpg', 'trophee_fortnite.png'),
('gta', 'Grand Theft Auto V', 'gta5.jpg', 'banniere_gta5.jpg', 'trophee_gta5.png'),
('lol', 'League of Legends', 'lol.jpg', 'banniere_lol.jpg', 'trophee_lol.png'),
('mc', 'Minecraft', 'minecraft.jpg', 'banniere_minecraft.jpg', 'trophee_minecraft.png'),
('ow', 'Overwatch', 'overwatch.jpg', 'banniere_overwatch.jpg', 'trophee_overwatch.png'),
("r6","Tom Clancy's Rainbow Six Siege","r6.jpg","banniere_r6.jpg","trophee_r6.png"),
("val","Valorant","valorant.jpg","banniere_valorant.jpg","trophee_valorant.png"),
("wow","World of Warcraft","wow.jpg","banniere_wow.jpg","trophee_wow.png");

INSERT INTO `tournoi`.`tournois`
(`id`,
`nom`,
`datedebut`,
`prix`,
`id_jeu`,
`currentphase`,
`participants`)
VALUES
("id","nom","datedebut","prix","id_jeu","currentphase","participants")
(155,"ada","2022-02-01 15:00:00",100,"League of Legends";0;0)
(160,"1v1 r&d","0122-05-15 23:10:00",150;"csgo",0;0)
(161,"1v1 COD","2014-05-15 18:59:00",150;"cod",0;0)
(164,"3v3 SND Cross play","2023-01-17 17:00:00",150,"cod",0,0)
(167,"Tournoi avec une écriture bien longue pour test","2023-05-20 18:00:00",80;"apex",0;0)
(168,"tounoi debutant","2023-08-15 20:00:00",1400;"apex",0,0)
(169,"TEST 2","2023-05-05 15:00:00",100,"ftn",0;0)
(170,"Tournoi pro","2023-04-29 00:00:00",50;"val",0,0);

INSERT INTO `tournoi`.`utilisateurs`
(`id`,
`dateCreation`,
`pseudo`,
`pass`,
`email`,
`dateNaissance`,
`role`)
VALUES
("id","dateCreation","pseudo","pass","email","dateNaissance","role")
(1,"2023-03-04 13:00:00","test","098f6bcd4621d373cade4e832627b4f6","test@test.fr","2023-03-04",0)
(2,"2023-03-04 15:00:00","joueur2","af831c682277bd9935160bcd1458bcca","joueur2@joueur2.fr","2023-03-04",0)
(3,"2023-03-04 15:00:00","admin","21232f297a57a5a743894a0e4a801fc3","admin@admin.fr","2000-08-18",1)
(4,"2023-04-07 14:15:51","joueur3","2a0c5343c9b908c9e984431efc415ec4","joueur3@joueur3.fr","2023-03-04",0)
(5,"2023-04-07 14:16:08","joueur3","2a0c5343c9b908c9e984431efc415ec4","joueur3@joueur3.fr","2023-03-04",0)
(6,"2023-04-08 13:33:06","e","e1671797c52e15f763380b45e841ec32","eee@eee.fr","2000-08-14",0)
(7,"2023-04-08 13:34:24","joueur4","aa344bafc69f4410a435ffdeb2d2ab13","joueur4@joueur4.fr","2007-01-01",0)
(8,"2023-04-08 13:35:16","eeeee","86871b9b1ab33b0834d455c540d82e89","eee@eee.fr","2000-05-08",0)
(9,"2023-04-09 00:06:15","aaa","47bce5c74f589f4867dbd57e9ca9f808","aaa@aaa.fr","2220-05-17",0);

