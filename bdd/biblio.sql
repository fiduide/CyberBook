-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 23 fév. 2020 à 10:54
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `biblio`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `idPersonne` int(11) NOT NULL,
  `idLivre` varchar(15) NOT NULL,
  `idRole` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`idPersonne`, `idLivre`, `idRole`) VALUES
(1, '2266200127', 1),
(2, '2092543032', 1),
(3, '2266285882', 1),
(2, '207066256X', 1),
(4, '2702436331', 1),
(5, '2226249303', 1),
(6, '2253151394', 1),
(6, '2253151343', 1),
(6, '2253122920', 1),
(7, '2264069112', 2),
(10, '2747033341', 1),
(10, '274702119X', 1),
(11, '999999999', 1);

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

DROP TABLE IF EXISTS `editeur`;
CREATE TABLE IF NOT EXISTS `editeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `editeur` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `editeur`
--

INSERT INTO `editeur` (`id`, `editeur`) VALUES
(1, 'PJK'),
(2, 'Nathan'),
(3, 'Robert Laffont'),
(4, 'Dutton Books'),
(5, 'Le Masque'),
(6, 'Albin Michel'),
(7, 'J\'ai lu'),
(8, 'Belfond'),
(9, 'Bayard Jeunesse'),
(10, 'TEST');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `libelle` (`libelle`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id`, `libelle`) VALUES
(1, 'Policier'),
(2, 'Roman'),
(3, 'Poésie'),
(4, 'Nouvelle'),
(5, 'Fantasy'),
(6, 'Horreur'),
(7, 'Science-fiction'),
(8, 'qdzdqzdqzdqzfsfefsef');

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

DROP TABLE IF EXISTS `langue`;
CREATE TABLE IF NOT EXISTS `langue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `langue` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `langue`
--

INSERT INTO `langue` (`id`, `langue`) VALUES
(1, 'Anglais'),
(2, 'Français'),
(3, 'Japonais'),
(5, 'Espagnol');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(15) NOT NULL,
  `titre` varchar(500) NOT NULL,
  `editeur` int(11) NOT NULL,
  `annee` int(11) DEFAULT NULL,
  `genre` int(11) DEFAULT NULL,
  `langue` int(11) DEFAULT NULL,
  `nbpages` int(11) DEFAULT NULL,
  `reservation` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`isbn`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `isbn`, `titre`, `editeur`, `annee`, `genre`, `langue`, `nbpages`, `reservation`) VALUES
(2, '2092543032', 'Nos étoiles contraire', 2, 2012, 1, 2, 336, 0),
(3, '2266285882', 'La 5eme Vagues', 3, 2013, 2, 1, 608, 0),
(4, '207066256X', 'La face cachée de Margo', 4, 2008, 2, 1, 400, 0),
(5, '2702436331', 'Le Crime de l\'Orient-Express', 5, 2011, 1, 2, 240, 0),
(6, '2226249303', 'Percy Jackson tome 1', 6, 2005, 5, 2, 432, 0),
(7, '2253151394', 'Marche ou creve', 7, 1979, 6, 1, 384, 0),
(8, '2253151343', 'Ça', 7, 1986, 6, 1, 799, 0),
(9, '2253122920', 'La ligne Verte', 7, 1996, 6, 1, 503, 0),
(10, '2264069112', 'L\'étrange bibliothèque', 8, 2015, 4, 2, 80, 0),
(11, '2747033341', 'Eragon - Cycle L\'Héritage Tome 01', 9, 2019, 5, 2, 709, 0),
(12, '274702119X', 'Eragon - L\'aîné Tome 02', 9, 2019, 5, 2, 0, 0),
(28, '999999999', 'TEST', 10, 2000, 8, 3, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id`, `nom`, `prenom`) VALUES
(1, 'Dashner', 'James'),
(2, 'Green', 'John'),
(3, 'Yancey', 'Rick'),
(4, 'Christie', 'Agatha'),
(5, 'Riordan', 'Rick'),
(6, 'King', 'Stephen'),
(7, 'Kat', 'Menschik'),
(8, 'Coben', 'Harlan'),
(9, 'Duflo', 'Ericka'),
(10, 'Paolini', 'Christopher'),
(11, 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `isbn` int(11) NOT NULL,
  `date_reservation` date NOT NULL,
  `id_membre` int(11) NOT NULL COMMENT 'fait référence à id de visiteurs',
  PRIMARY KEY (`isbn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Réservations des livres';

-- --------------------------------------------------------

--
-- Structure de la table `reservations_tmp`
--

DROP TABLE IF EXISTS `reservations_tmp`;
CREATE TABLE IF NOT EXISTS `reservations_tmp` (
  `isbn` varchar(15) NOT NULL,
  `id_membre` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservations_tmp`
--

INSERT INTO `reservations_tmp` (`isbn`, `id_membre`) VALUES
('999999999', 1),
('999999999', 18),
('2226249303', 18);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `libelle`) VALUES
(1, 'Ecrivain'),
(2, 'Illustrateur'),
(3, 'Traducteur');

-- --------------------------------------------------------

--
-- Structure de la table `visiteurs`
--

DROP TABLE IF EXISTS `visiteurs`;
CREATE TABLE IF NOT EXISTS `visiteurs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  `rôle` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `visiteurs`
--

INSERT INTO `visiteurs` (`ID`, `pseudo`, `email`, `mdp`, `rôle`) VALUES
(1, 'fiduide', 'dorian161100@hotmail.fr', '161100', 'admin'),
(13, 'Amanda', 'lihua99.77600@gmail.com', '77', 'admin'),
(17, 'Sandra', 'sandra.glt18@gmail.com', '18.11.2000', 'membre'),
(18, 'Wiwi', 'wiwi6977@hotmail.fr', '14102019', 'membre');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
