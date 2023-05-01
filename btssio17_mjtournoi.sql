-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 15 mars 2023 à 14:36
-- Version du serveur : 10.6.12-MariaDB
-- Version de PHP : 7.4.33

CREATE DATABASE IF NOT EXISTS Tournoi DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE Tournoi;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `btssio17_mjtournoi`
--

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id_tournoi` int(11) NOT NULL,
  `id_joueur` varchar(25) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `inscriptions`
--

INSERT INTO `inscriptions` (`id_tournoi`, `id_joueur`, `id`) VALUES
(24, 'joueur1', 441),
(24, 'joueur2', 442),
(24, 'joueur3', 443),
(24, 'joueur4', 444),
(24, 'joueur5', 445),
(24, 'joueur6', 446),
(24, 'joueur7', 447),
(24, 'joueur8', 448),
(24, 'joueur9', 449),
(24, 'joueur10', 450),
(24, 'joueur11', 451),
(24, 'joueur12', 452),
(24, 'joueur13', 453),
(24, 'joueur14', 454),
(24, 'joueur15', 455),
(24, 'joueur16', 456),
(24, 'joueur17', 457),
(24, 'joueur18', 458),
(24, 'joueur19', 459),
(24, 'joueur20', 460),
(24, 'joueur21', 461),
(24, 'joueur22', 462),
(24, 'joueur23', 463),
(24, 'joueur24', 464),
(24, 'joueur25', 465),
(24, 'joueur26', 466),
(24, 'joueur27', 467),
(24, 'joueur28', 468),
(24, 'joueur29', 469),
(24, 'joueur30', 470),
(24, 'joueur31', 471),
(24, 'joueur32', 472),
(25, 'joueur1', 539),
(25, 'joueur2', 540),
(25, 'joueur3', 541),
(25, 'joueur4', 542),
(25, 'joueur5', 543),
(25, 'joueur6', 544),
(25, 'joueur7', 545),
(25, 'joueur8', 546),
(25, 'joueur9', 547),
(25, 'joueur10', 548),
(25, 'joueur11', 549),
(25, 'joueur12', 550),
(25, 'joueur13', 551),
(25, 'joueur14', 552),
(25, 'joueur15', 553),
(25, 'joueur16', 554),
(25, 'joueur17', 555),
(25, 'joueur18', 556),
(25, 'joueur19', 557),
(25, 'joueur20', 558),
(25, 'joueur21', 559),
(25, 'joueur22', 560),
(25, 'joueur23', 561),
(25, 'joueur24', 562),
(25, 'joueur25', 563),
(25, 'joueur26', 564),
(25, 'joueur27', 565),
(25, 'joueur28', 566),
(25, 'joueur29', 567),
(25, 'joueur30', 568),
(25, 'joueur31', 569),
(25, 'joueur32', 570),
(26, 'joueurtest', 574),
(26, 'joueur2', 575),
(26, 'prof', 577);

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeu` (
  `id` char(5) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeu` (`id`, `nom`, `image`) VALUES
('apex', 'Apex Legends', 'https://static-cdn.jtvnw.net/ttv-boxart/Apex%20Legends-285x380.jpg'),
('cod', 'Call Of Duty: Warzone', 'https://static-cdn.jtvnw.net/ttv-boxart/Call%20of%20Duty:%20Warzone-285x380.jpg'),
('csgo', 'Counter-Strike: Global Offensive', 'https://static-cdn.jtvnw.net/ttv-boxart/Counter-Strike:%20Global%20Offensive-285x380.jpg'),
('eft', 'Escape From Tarkov', 'https://static-cdn.jtvnw.net/ttv-boxart/Escape%20From%20Tarkov-285x380.jpg'),
('ftn', 'Fortnite', 'https://static-cdn.jtvnw.net/ttv-boxart/Fortnite-285x380.jpg'),
('gta', 'Grand Theft Auto V', 'https://static-cdn.jtvnw.net/ttv-boxart/Grand%20Theft%20Auto%20V-285x380.jpg'),
('lol', 'League of Legends', 'https://static-cdn.jtvnw.net/ttv-boxart/League%20of%20Legends-285x380.jpg'),
('mc', 'Minecraft', 'https://static-cdn.jtvnw.net/ttv-boxart/Minecraft-285x380.jpg'),
('ow', 'Overwatch', 'https://static-cdn.jtvnw.net/ttv-boxart/Overwatch-285x380.jpg'),
('r6', 'Tom Clancy\'s Rainbow Six Siege', 'https://static-cdn.jtvnw.net/ttv-boxart/Tom%20Clancy%27s%20Rainbow%20Six%20Siege-285x380.jpg'),
('val', 'Valorant', 'https://static-cdn.jtvnw.net/ttv-boxart/VALORANT-285x380.jpg'),
('wow', 'World of Warcraft', 'https://static-cdn.jtvnw.net/ttv-boxart/World%20of%20Warcraft-285x380.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `joueurs`
--

CREATE TABLE `joueur` (
  `login` varchar(25) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `datenaiss` date NOT NULL,
  `courriel` varchar(255) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT 0,
  `creation_compte` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `joueurs`
--

INSERT INTO `joueur` (`login`, `prenom`, `nom`, `mot_de_passe`, `datenaiss`, `courriel`, `admin`, `creation_compte`) VALUES
('admin', 'admin', 'admin', '$2y$10$GQ70HV86w7qNGl63yXNHlOtXlW.IJSJTHeCFAYkbJ3pxiGdBw/4hq', '2021-03-18', 'admin@admin', 1, '0000-00-00 00:00:00'),
('azerty', 'azerty', 'azerty', '$2y$10$.pgFOK96FhOqSQgVYDH/C.Dokje97uwcBejfX5DaY0PNPHRxi/xne', '2021-04-08', 'azerty@e', 0, '2021-04-05 15:45:58'),
('claude', 'claude', 'fichet', '$2y$10$8m1fSzKwVoZUCodaDHeSF.pj.mAvIF.YP6SJnXrHO2JwJueh.EzrC', '2021-03-05', 'clau@gg.kk', 0, '0000-00-00 00:00:00'),
('hacker', 'hacker', 'hacker', '$2y$10$VQ5UgLJwoyqinl2WmOzZEOYVa0jasSawM3AEtbs9LvmSG7s9lcCgW', '2021-03-10', 'hacker@hacker', 0, '0000-00-00 00:00:00'),
('jajaja', 'jaja', 'jaja', '$2y$10$a4xWIBpBrqxA8R9HwJ5k.umLdV10japjBEj3Gg9pOxLzoOdSNRQiu', '2021-04-07', 'jaja@jaja', 0, '0000-00-00 00:00:00'),
('joueur1', 'joueur1', 'joueur1', '$2y$10$BCyNpORJjyiFjzxm.kKCb.Ia7.sqYrJ1tpyXUBgMMPH79zKCcW2CW', '2021-02-01', 'joueur1@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur10', 'joueur10', 'joueur10', '$2y$10$VJIu3pKzTQ3i3yM54JI3JOHzlubcdMlHpYKfmXdyu.pNCkbFLj.yW', '2021-02-01', 'joueur10@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur11', 'joueur11', 'joueur11', '$2y$10$UZTQK4xX78NnqQKtMmU6d.hjyV2yW0bnnC5s3E6ajTZdJmsFC2OiW', '2021-02-01', 'joueur11@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur12', 'joueur12', 'joueur12', '$2y$10$KwN6iRH3CdmuKExfz5/SfeBcuNzcZmQmur7HwQs8cTJnY8y7IR6xu', '2021-02-01', 'joueur12@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur13', 'joueur13', 'joueur13', '$2y$10$c6onOENElW3VQpIs5cLD0ewUj53Xz4EViTxUeleKNKsPNjYP3xKy6', '2021-02-01', 'joueur13@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur14', 'joueur14', 'joueur14', '$2y$10$.M1k/G32bDyHSbTa7snGyeFQCIj1EE2yWLlk3ETIGQk.nc2hdibFS', '2021-02-01', 'joueur14@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur15', 'joueur15', 'joueur15', '$2y$10$nI2mTIfmu96SDJ67jw.I7uahDn.HKiVsColyu5BM4wui5eTnj/qwC', '2021-02-01', 'joueur15@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur16', 'joueur16', 'joueur16', '$2y$10$hiysdj2hdMWTIFh7yJuDA.FQQK1Crl0HPrQ8OERsDUdkHDcrilsdW', '2021-02-01', 'joueur16@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur17', 'joueur17', 'joueur17', '$2y$10$DTGqlOEniqTa5iiqXyzUlORd35nVPwO0/lSIE.fiJW56Tat8ecUbS', '2021-02-01', 'joueur17@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur18', 'joueur18', 'joueur18', '$2y$10$D.4KWqAUzN0bVd.O9GQJveAVPimaZSPhzWi2X.H1AynenZpJfz9GW', '2021-02-01', 'joueur18@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur19', 'joueur19', 'joueur19', '$2y$10$FEqDKfeJPfi118uZ9lpIUuxGYfMF6p5niItaoW1rRojuXcHcn..s6', '2021-02-01', 'joueur19@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur2', 'joueur2', 'joueur2', '$2y$10$WK7S6L28J.OZRehYtOtL6Op9IFHYF1QWISCJkxBxf6Fb.h4oNDiP2', '2021-02-01', 'joueur2@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur20', 'joueur20', 'joueur20', '$2y$10$Qr8RGjR8KUnKAXhqqSLvZ.6ly7iYpghn/dG4s9gK/VZcgsSLDzuZS', '2021-02-01', 'joueur20@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur21', 'joueur21', 'joueur21', '$2y$10$ZgL0ypBJZwcvc9QosiDBwe.mTTG9VvUYPSjBw5BGl3IOeGECZxoBy', '2021-02-01', 'joueur21@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur22', 'joueur22', 'joueur22', '$2y$10$oZjrgbpcj0aJl64EE0qLLuzmwCTK3ifDJmkIfR9bqoQwANVpceb/q', '2021-02-01', 'joueur22@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur23', 'joueur23', 'joueur23', '$2y$10$LLconZSOYQxeyGInqohYzu9BaI1ojt.yBTTcBqxZKG81hSNySZFt6', '2021-02-01', 'joueur23@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur24', 'joueur24', 'joueur24', '$2y$10$GNMUfkoJ3i/MLu4voLP1s.p9FYajcGHAb5kkTvD1dXPEoUZDR888a', '2021-02-01', 'joueur24@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur25', 'joueur25', 'joueur25', '$2y$10$5ndr4y2dXonbgSF/54Rf0OoBMsjKejAYOB8Fag.Diqu5YoR/Nk16u', '2021-02-01', 'joueur25@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur26', 'joueur26', 'joueur26', '$2y$10$WH3nvYCGuY.BmoTPkOGKDu59RjV9t3ZpYv/uohdp0P/axfJyxsac2', '2021-02-01', 'joueur26@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur27', 'joueur27', 'joueur27', '$2y$10$qGBkDtxLB1ZCODQPhONNDe.tiz9yvO3LH.bdsZ.d33YZmCdeBNoJe', '2021-02-01', 'joueur27@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur28', 'joueur28', 'joueur28', '$2y$10$xvgbQ1WkXhQqH3pga8hEfOSb/5zVvd06xrAbtF/e485oj96nvG/e6', '2021-02-01', 'joueur28@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur29', 'joueur29', 'joueur29', '$2y$10$ub.oUepUcnU3icNuNnWbXe0TZ7B3evYShbQQqDIYH3H0A7FAjRiHi', '2021-02-01', 'joueur29@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur3', 'joueur3', 'joueur3', '$2y$10$1Lik1pcd4vOawjJVX7DJGOGYGL.kf8sToGviWAku3oLoU3S21AUPC', '2021-02-01', 'joueur3@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur30', 'joueur30', 'joueur30', '$2y$10$93eAaH3ADFHgkfKdcZT1f.9y2Gwmaoq6kIRqPxIgWwxfcHxUuGhWe', '2021-02-01', 'joueur30@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur31', 'joueur31', 'joueur31', '$2y$10$c.Lk4cRRCiUTo9UOS8XglO8PC9UZMZZMaSt30U5QDMijRKDSHOzRS', '2021-02-01', 'joueur31@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur32', 'joueur32', 'joueur32', '$2y$10$RMepS7uMOaLi217pAEfoBuCo8Owf2caguDDpNfFOXc8p.nDx6ZtUW', '2021-02-01', 'joueur32@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur33', 'joueur33', 'joueur33', '$2y$10$3o/kyqLTU0WQ20jfLyufSOIRfVEbSC7K6zd.OsybwiVS5nrWAphHa', '2021-02-01', 'joueur33@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur34', 'joueur34', 'joueur34', '$2y$10$UCn/P1lR9sjVWDNX.SHVG.AkDSIGifBkOONvhBRGSXPsAfzkawJxO', '2021-02-01', 'joueur34@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur35', 'joueur35', 'joueur35', '$2y$10$mKUdGF6838daB/ZnXnO.5.KGBbliL.hP4oe.38MxKmKA8afOIVjVm', '2021-02-01', 'joueur35@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur36', 'joueur36', 'joueur36', '$2y$10$oB3l.0.6xyQ0vU0zB9C6tuMHK.lnn2SgSTrYb7F99blcGWAIXMRvy', '2021-02-01', 'joueur36@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur37', 'joueur37', 'joueur37', '$2y$10$q4IyLMnpjMdEAw5Gllye1.Q3z80MOHhAfE87qzYqV0rT/1YEsF.Fe', '2021-02-01', 'joueur37@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur38', 'joueur38', 'joueur38', '$2y$10$RD9dIyTE6RKAr8O/6qv1leVb00MQ2ECYsYlrZrDfW.7g89fBNLlZ6', '2021-02-01', 'joueur38@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur39', 'joueur39', 'joueur39', '$2y$10$3Kci.M6Cm1vl/Oa73Yq9hOVX44ZjDHffkg1BTrhBrFk8F7XviZR7a', '2021-02-01', 'joueur39@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur4', 'joueur4', 'joueur4', '$2y$10$1bM/nhkRwM7rHGSF86woWOW.S5M9h.DTa6H3jp6OOGbFQRcaAdk8O', '2021-02-01', 'joueur4@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur40', 'joueur40', 'joueur40', '$2y$10$csr9nsCWKgdbnAgT2FWd2.cwoVKd41Mj0N.OoXKQ/6.ve2UkQmFn2', '2021-02-01', 'joueur40@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur41', 'joueur41', 'joueur41', '$2y$10$amDCgmWJ14BvjRxQ0jh3v.pbUuRX6oznYVHPiD5GdWfYXWYyubAGG', '2021-02-01', 'joueur41@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur42', 'joueur42', 'joueur42', '$2y$10$Jb8kn811wZkpmvK4IQhdy./0lL00JaKcP6o/pwilQw0dlcZcl6oVO', '2021-02-01', 'joueur42@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur43', 'joueur43', 'joueur43', '$2y$10$s/eJ2JgRY7fWhVPM11DkAuiEQmM3exBr8bDdeg0KGu4MMPpFGkBQu', '2021-02-01', 'joueur43@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur44', 'joueur44', 'joueur44', '$2y$10$Au0Ud76V9vDbf6yPT.nvmOpT7j85o3UIM2NaLcGwNwU0vq9Tu82C6', '2021-02-01', 'joueur44@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur45', 'joueur45', 'joueur45', '$2y$10$BpV.5IhaDoRRrzVy.PNf5uFlfN7vqJt1dVgyIkKvme1SeaNHN.hWO', '2021-02-01', 'joueur45@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur46', 'joueur46', 'joueur46', '$2y$10$909FiXIcINjmE.5Fm2Mgkuw0791u4T2UyRQq2c1BdsuAhlrgv3fLW', '2021-02-01', 'joueur46@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur47', 'joueur47', 'joueur47', '$2y$10$x4GziHUlg9T6qOVQhoQy2u.F.W0XGwJv1rjz/1Ba4LoEGhXhxJib6', '2021-02-01', 'joueur47@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur48', 'joueur48', 'joueur48', '$2y$10$He8FnTqmjbFY8lcIF91peOzQjQC6cbQmInZEzp3nLDeNfN72Uwv.q', '2021-02-01', 'joueur48@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur49', 'joueur49', 'joueur49', '$2y$10$IdolfCF3VM8G5qWfQlqMK.R99e5nGRpELmABv33CIuB1/DpdP0ir6', '2021-02-01', 'joueur49@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur5', 'joueur5', 'joueur5', '$2y$10$q8v57/YM/nuY8hgyCqal2OkAaTRyGygL30PPAbPx4WNOHhrQVJ1bi', '2021-02-01', 'joueur5@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur50', 'joueur50', 'joueur50', '$2y$10$/FQ60QVJRWjBkz/WuDyTKOF/4TDuH.KfFwNhYKOQ7Gka46G1mmmAS', '2021-02-01', 'joueur50@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur51', 'joueur51', 'joueur51', '$2y$10$uc2PgF7dy8eiq2uZqmwkL.Tz/INY3tw8GJz.Krb/C011UZMQDbl/i', '2021-02-01', 'joueur51@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur52', 'joueur52', 'joueur52', '$2y$10$Cg0Wn0/Ls3dcFHyQ9FLD.e./19H7mXU7fkZwYBLUHWpYSX0rFYx22', '2021-02-01', 'joueur52@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur53', 'joueur53', 'joueur53', '$2y$10$jQfWUkgJSJE2ZWS1Sf2GdOGLpXxhqhBzS3Jix7d8IofvMkr8HWhIq', '2021-02-01', 'joueur53@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur54', 'joueur54', 'joueur54', '$2y$10$0kGOi/Z1PUfRBWtsBrsTrOgnLKkeh0LrmpDRT/8TUVs26j5BW4HkK', '2021-02-01', 'joueur54@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur55', 'joueur55', 'joueur55', '$2y$10$DWq1w9ng2Qmg9CdE5dpaUOvw5rSOTId2VRKxNrKTWf1vWDxmnDKKO', '2021-02-01', 'joueur55@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur56', 'joueur56', 'joueur56', '$2y$10$vZirfXQXz5wtbTkjGevIMeLQ4ezmtawjC7ETZMObhf2nkEUQaOH0m', '2021-02-01', 'joueur56@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur57', 'joueur57', 'joueur57', '$2y$10$bTt.vEhAkkzlPcSGu4gwXeAlMN7dv3bPdewLl9Y3R0Jdg74BICg4e', '2021-02-01', 'joueur57@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur58', 'joueur58', 'joueur58', '$2y$10$p1rpZt29ZHZr7un0MjjSg./UISF9pB6A0xxJyn3x4DuyjZmQEGOx6', '2021-02-01', 'joueur58@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur59', 'joueur59', 'joueur59', '$2y$10$2gFY/HBZBHP8cyhS9xwUh.Xem1cMfWpAemkCNju2Ag5IzqPjDyMum', '2021-02-01', 'joueur59@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur6', 'joueur6', 'joueur6', '$2y$10$LJNsU5ih9ukfLMMr99LEEuyFKhdomwZh/KsqTKM6XaocOy6W4mJAS', '2021-02-01', 'joueur6@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur60', 'joueur60', 'joueur60', '$2y$10$oMfk/W5eDlbeWRe2NI1Fg.zBjIHZQe1iimySGJd63zOksIZcnWrl2', '2021-02-01', 'joueur60@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur61', 'joueur61', 'joueur61', '$2y$10$jh8L8i7YQqXKwO2MZ66EAekR8kO7cpK6oV/Ns0Blw0iroq6QNd2mO', '2021-02-01', 'joueur61@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur62', 'joueur62', 'joueur62', '$2y$10$XITMCptI6joipteLmzIHe.98VaFJ2KtpbXHWEV.eXAR9I1GC4vtjC', '2021-02-01', 'joueur62@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur63', 'joueur63', 'joueur63', '$2y$10$UjLE85mFKpaoTKCNU3yUcOhfJrgT2Q8il5VPIBrR1PAdTRwOei2WG', '2021-02-01', 'joueur63@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur64', 'joueur64', 'joueur64', '$2y$10$am2ynZL6CfVoz7Q1LvUd2uMRzUpu1AR2sU/sQAQQk.y3GG7CazRKS', '2021-02-01', 'joueur64@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur7', 'joueur7', 'joueur7', '$2y$10$9FrQq6bWFZSxgRMiIUBY8.ScYJZovolittYZZfFfME6Qdsfg.PS1G', '2021-02-01', 'joueur7@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur8', 'joueur8', 'joueur8', '$2y$10$vxkuoG0Tq..vLjIwxg1vCe0LhXh6tEXq1mfBZXzyiv7oHCMLYL3WK', '2021-02-01', 'joueur8@gmail.com', 0, '0000-00-00 00:00:00'),
('joueur9', 'joueur9', 'joueur9', '$2y$10$.uhbRVsSNUV4Gukk1XVSo.6HNHpOs9tZof3FrCACoXS0MD4TZb9Bm', '2021-02-01', 'joueur9@gmail.com', 0, '0000-00-00 00:00:00'),
('joueurtest', 'Test', 'Joueur', '$2y$10$n.EVT6Seyjr00JMNJFb9JO1rpkaM4mif3JozR52yadm4Qd5us3oNq', '2001-10-10', 'jt@e.com', 0, '2021-04-08 10:47:28'),
('max', 'TEST', 'test', '$2y$10$aY2g7sMgCwEfP3F7xs2RNur5rzFq6WxgQ/MKePdk.nmsjX9ZZuqhi', '1111-12-12', 'test@gmail.com', 1, '2021-04-04 09:02:55'),
('prof', 'toto', 'toto', '$2y$10$ylpSRwT5gliL7r3LTfhYFODTFFPw39g9BPU3X38lL8jxfcFnUpwyy', '2021-05-15', 'toto@jj.ff', 0, '2021-05-15 14:29:34'),
('test', 'test', 'test', '$2y$10$ZFidUB8cOzBzKYVf.b1SFeaxdzFJ/V.mOaihNPQl66K3Y7yQi4k6m', '2021-04-08', 'test@e', 0, '0000-00-00 00:00:00'),
('test2', 'qdz', 'qze', '$2y$10$nhVLI0ijcDHP0uk9oDgHM.aQzhKaHVYetyfgThR7wjBuyHoWfVLOy', '2021-03-04', 'q@qz', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `matchs`
--

CREATE TABLE `match` (
  `id` int(11) NOT NULL,
  `id_tournoi` int(11) NOT NULL,
  `id_joueur1` varchar(25) NOT NULL,
  `score_joueur1` smallint(6) NOT NULL DEFAULT 0,
  `id_joueur2` varchar(25) NOT NULL,
  `score_joueur2` smallint(6) NOT NULL DEFAULT 0,
  `phase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `matchs`
--

INSERT INTO `match` (`id`, `id_tournoi`, `id_joueur1`, `score_joueur1`, `id_joueur2`, `score_joueur2`, `phase`) VALUES
(413, 24, 'joueur4', 0, 'joueur26', 0, 5),
(414, 24, 'joueur2', 0, 'joueur22', 0, 5),
(415, 24, 'joueur7', 0, 'joueur17', 0, 5),
(416, 24, 'joueur1', 0, 'joueur5', 0, 5),
(417, 24, 'joueur31', 0, 'joueur9', 0, 5),
(418, 24, 'joueur10', 0, 'joueur27', 0, 5),
(419, 24, 'joueur23', 0, 'joueur3', 0, 5),
(420, 24, 'joueur12', 0, 'joueur16', 0, 5),
(421, 24, 'joueur11', 0, 'joueur20', 0, 5),
(422, 24, 'joueur24', 0, 'joueur14', 0, 5),
(423, 24, 'joueur13', 0, 'joueur19', 0, 5),
(424, 24, 'joueur32', 0, 'joueur8', 0, 5),
(425, 24, 'joueur30', 0, 'joueur6', 0, 5),
(426, 24, 'joueur29', 0, 'joueur25', 0, 5),
(427, 24, 'joueur18', 0, 'joueur15', 0, 5),
(428, 24, 'joueur21', 0, 'joueur28', 0, 5),
(429, 25, 'joueur19', 0, 'joueur1', 4, 5),
(430, 25, 'joueur22', 13, 'joueur14', 12, 5),
(431, 25, 'joueur7', 0, 'joueur6', 0, 5),
(432, 25, 'joueur21', 0, 'joueur17', 0, 5),
(433, 25, 'joueur13', 0, 'joueur4', 5, 5),
(434, 25, 'joueur2', 0, 'joueur26', 0, 5),
(435, 25, 'joueur12', 0, 'joueur8', 0, 5),
(436, 25, 'joueur29', 25, 'joueur25', 0, 5),
(437, 25, 'joueur9', 0, 'joueur18', 0, 5),
(438, 25, 'joueur3', 0, 'joueur16', 0, 5),
(439, 25, 'joueur24', 0, 'joueur32', 0, 5),
(440, 25, 'joueur31', 0, 'joueur27', 25, 5),
(441, 25, 'joueur23', 0, 'joueur10', 0, 5),
(442, 25, 'joueur20', 0, 'joueur28', 0, 5),
(443, 25, 'joueur30', 0, 'joueur11', 0, 5),
(444, 25, 'joueur5', 0, 'joueur15', 0, 5),
(445, 25, 'joueur8', 14, 'joueur26', 0, 4),
(446, 25, 'joueur29', 1, 'joueur4', 0, 4),
(447, 25, 'joueur27', 12, 'joueur15', 0, 4),
(448, 25, 'joueur1', 14, 'joueur16', 0, 4),
(449, 25, 'joueur22', 15, 'joueur10', 0, 4),
(450, 25, 'joueur32', 16, 'joueur28', 0, 4),
(451, 25, 'joueur11', 14, 'joueur18', 0, 4),
(452, 25, 'joueur6', 12, 'joueur17', 0, 4),
(453, 25, 'joueur29', 14, 'joueur11', 10, 3),
(454, 25, 'joueur27', 14, 'joueur8', 0, 3),
(455, 25, 'joueur6', 12, 'joueur32', 0, 3),
(456, 25, 'joueur1', 3, 'joueur22', 0, 3),
(457, 25, 'joueur6', 13, 'joueur1', 0, 2),
(458, 25, 'joueur29', 0, 'joueur27', 24, 2),
(459, 25, 'joueur6', 4, 'joueur27', 0, 1),
(460, 24, 'joueur16', 0, 'joueur26', 0, 4),
(461, 24, 'joueur28', 0, 'joueur8', 0, 4),
(462, 24, 'joueur19', 0, 'joueur22', 0, 4),
(463, 24, 'joueur6', 0, 'joueur17', 0, 4),
(464, 24, 'joueur25', 0, 'joueur5', 0, 4),
(465, 24, 'joueur9', 0, 'joueur15', 0, 4),
(466, 24, 'joueur14', 0, 'joueur3', 0, 4),
(467, 24, 'joueur27', 0, 'joueur20', 0, 4),
(468, 24, 'joueur17', 2, 'joueur15', 1, 3),
(469, 24, 'joueur26', 0, 'joueur3', 0, 3),
(470, 24, 'joueur20', 0, 'joueur22', 5, 3),
(471, 24, 'joueur5', 5, 'joueur8', 0, 3);

-- --------------------------------------------------------

--
-- Structure de la table `phase`
--

CREATE TABLE `phase` (
  `id_tournoi` int(11) NOT NULL,
  `phase` tinyint(4) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `phase`
--

INSERT INTO `phase` (`id_tournoi`, `phase`, `time`) VALUES
(24, 3, '2021-04-14 17:08:00'),
(24, 4, '2021-04-12 12:12:00'),
(24, 5, '2021-04-08 12:12:00'),
(25, 1, '2021-04-15 13:13:00'),
(25, 2, '2021-04-14 20:10:00'),
(25, 3, '2021-04-13 10:10:00'),
(25, 4, '2021-04-11 10:10:00'),
(25, 5, '2021-04-10 15:15:00');

-- --------------------------------------------------------

--
-- Structure de la table `tournois`
--

CREATE TABLE `tournoi` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `datedebut` datetime NOT NULL,
  `prix` double NOT NULL,
  `jeu` char(5) NOT NULL,
  `currentphase` tinyint(4) DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `tournois`
--

INSERT INTO `tournoi` (`id`, `nom`, `datedebut`, `prix`, `jeu`, `currentphase`) VALUES
(24, 'Tournoi 1 Démonstration', '2021-04-08 00:00:00', 15000, 'lol', 2),
(25, 'Apex', '2021-04-10 00:00:00', 1000, 'apex', 0),
(26, 'Tournoitest', '2021-04-08 00:00:00',éq 100, 'eft', -1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id_tournoi`,`id_joueur`),
  ADD KEY `id_tournoi` (`id_tournoi`),
  ADD KEY `id_joueur` (`id_joueur`),
  ADD KEY `id_tournoi_2` (`id_tournoi`,`id_joueur`),
  ADD KEY `ai` (`id`);

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `joueurs`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`login`);

--
-- Index pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tournoi` (`id_tournoi`),
  ADD KEY `id_joueur1` (`id_joueur1`,`id_joueur2`),
  ADD KEY `matchs_ibfk_2` (`id_joueur2`);

--
-- Index pour la table `phase`
--
ALTER TABLE `phase`
  ADD PRIMARY KEY (`id_tournoi`,`phase`),
  ADD KEY `id_tournoi` (`id_tournoi`);

--
-- Index pour la table `tournois`
--
ALTER TABLE `tournoi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jeu` (`jeu`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=578;

--
-- AUTO_INCREMENT pour la table `matchs`
--
ALTER TABLE `match`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=472;

--
-- AUTO_INCREMENT pour la table `tournois`
--
ALTER TABLE `tournoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `matchs`
--
ALTER TABLE `match`
  ADD CONSTRAINT `matchs_ibfk_1` FOREIGN KEY (`id_joueur1`) REFERENCES `joueur` (`login`),
  ADD CONSTRAINT `matchs_ibfk_2` FOREIGN KEY (`id_joueur2`) REFERENCES `joueur` (`login`),
  ADD CONSTRAINT `matchs_ibfk_3` FOREIGN KEY (`id_tournoi`) REFERENCES `tournoi` (`id`);

--
-- Contraintes pour la table `phase`
--
ALTER TABLE `phase`
  ADD CONSTRAINT `phase_ibfk_1` FOREIGN KEY (`id_tournoi`) REFERENCES `tournoi` (`id`);

--
-- Contraintes pour la table `tournois`
--
ALTER TABLE `tournoi`
  ADD CONSTRAINT `tournois_ibfk_1` FOREIGN KEY (`jeu`) REFERENCES `jeu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
