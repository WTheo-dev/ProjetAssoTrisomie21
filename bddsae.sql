-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 17 oct. 2022 à 13:59
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae`
--

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

DROP TABLE IF EXISTS `enfant`;
CREATE TABLE IF NOT EXISTS `enfant` (
  `Id_Enfant` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prénom` varchar(50) NOT NULL,
  `Date_Naissance` date NOT NULL,
  `Lien_Jeton` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Enfant`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enfant`
--

INSERT INTO `enfant` (`Id_Enfant`, `Nom`, `Prénom`, `Date_Naissance`, `Lien_Jeton`) VALUES
(1, 'pomies', 'guillaume', '2022-10-11', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `lier`
--

DROP TABLE IF EXISTS `lier`;
CREATE TABLE IF NOT EXISTS `lier` (
  `Id_Objectif` int(11) NOT NULL,
  `Id_Récompense` int(11) NOT NULL,
  PRIMARY KEY (`Id_Objectif`,`Id_Récompense`),
  KEY `Id_Récompense` (`Id_Récompense`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `Id_Membre` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prénom` varchar(50) NOT NULL,
  `Adresse` varchar(100) DEFAULT NULL,
  `Code_Postal` char(5) DEFAULT NULL,
  `Ville` varchar(50) DEFAULT NULL,
  `Courriel` varchar(50) DEFAULT NULL,
  `Date_Naissance` date NOT NULL,
  `Mdp` varchar(50) DEFAULT NULL,
  `Pro` tinyint(1) DEFAULT NULL,
  `Compte_Validé` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id_Membre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`Id_Membre`, `Nom`, `Prénom`, `Adresse`, `Code_Postal`, `Ville`, `Courriel`, `Date_Naissance`, `Mdp`, `Pro`, `Compte_Validé`) VALUES
(1, 'Martin', 'alain', '2 rue des grands champs', '77000', 'Orléans', 'alainmartin@gmail.com', '2022-10-11', '$alain', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `Id_Message` int(11) NOT NULL,
  `Sujet` varchar(50) DEFAULT NULL,
  `Corps` text,
  `Date_Heure` datetime DEFAULT NULL,
  `Id_Objectif` int(11) NOT NULL,
  `Id_Membre` int(11) NOT NULL,
  PRIMARY KEY (`Id_Message`),
  KEY `Id_Objectif` (`Id_Objectif`),
  KEY `Id_Membre` (`Id_Membre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `objectif`
--

DROP TABLE IF EXISTS `objectif`;
CREATE TABLE IF NOT EXISTS `objectif` (
  `Id_Objectif` int(11) NOT NULL,
  `Intitule` varchar(50) DEFAULT NULL,
  `Nb_Jetons` int(11) DEFAULT NULL,
  `Durée` double DEFAULT NULL,
  `Lien_Image` varchar(50) DEFAULT NULL,
  `Priorité` int(11) DEFAULT NULL,
  `Travaillé` tinyint(1) DEFAULT NULL,
  `Id_Membre` int(11) NOT NULL,
  `Id_Enfant` int(11) NOT NULL,
  PRIMARY KEY (`Id_Objectif`),
  KEY `Id_Membre` (`Id_Membre`),
  KEY `Id_Enfant` (`Id_Enfant`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `objectif`
--

INSERT INTO `objectif` (`Id_Objectif`, `Intitule`, `Nb_Jetons`, `Durée`, `Lien_Image`, `Priorité`, `Travaillé`, `Id_Membre`, `Id_Enfant`) VALUES
(1, 'hello world', 15, 1, 'image', 2, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `placer_jeton`
--

DROP TABLE IF EXISTS `placer_jeton`;
CREATE TABLE IF NOT EXISTS `placer_jeton` (
  `Id_Objectif` int(11) NOT NULL,
  `Date_Heure` datetime NOT NULL,
  `Id_Membre` int(11) NOT NULL,
  PRIMARY KEY (`Id_Objectif`,`Date_Heure`),
  KEY `Id_Membre` (`Id_Membre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `récompense`
--

DROP TABLE IF EXISTS `récompense`;
CREATE TABLE IF NOT EXISTS `récompense` (
  `Id_Récompense` int(11) NOT NULL,
  `Intitulé` varchar(50) DEFAULT NULL,
  `Descriptif` text,
  `Lien_Image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Récompense`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `récompense`
--

INSERT INTO `récompense` (`Id_Récompense`, `Intitulé`, `Descriptif`, `Lien_Image`) VALUES
(1, 'jouet', 'lorem ipsum', 'image_jouet');

-- --------------------------------------------------------

--
-- Structure de la table `suivre`
--

DROP TABLE IF EXISTS `suivre`;
CREATE TABLE IF NOT EXISTS `suivre` (
  `Id_Enfant` int(11) NOT NULL,
  `Id_Membre` int(11) NOT NULL,
  `Date_Demande_Equipe` date DEFAULT NULL,
  `Rôle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Enfant`,`Id_Membre`),
  KEY `Id_Membre` (`Id_Membre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `suivre`
--

INSERT INTO `suivre` (`Id_Enfant`, `Id_Membre`, `Date_Demande_Equipe`, `Rôle`) VALUES
(1, 1, '2022-10-18', 'coordinateur');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
