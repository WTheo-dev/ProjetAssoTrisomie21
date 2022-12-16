-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 15 déc. 2022 à 21:32
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

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
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(50) NOT NULL,
  `nom` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

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


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
