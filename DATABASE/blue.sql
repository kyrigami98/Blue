-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 17 sep. 2019 à 18:37
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blue`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapitre`
--

DROP TABLE IF EXISTS `chapitre`;
CREATE TABLE IF NOT EXISTS `chapitre` (
  `id_chap` int(11) NOT NULL AUTO_INCREMENT,
  `nom_chap` int(11) DEFAULT NULL,
  `id_tome` int(50) DEFAULT NULL,
  PRIMARY KEY (`id_chap`),
  KEY `FK_chapitre_id_tome` (`id_tome`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commenter`
--

DROP TABLE IF EXISTS `commenter`;
CREATE TABLE IF NOT EXISTS `commenter` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `id_projet` int(50) NOT NULL,
  `comm_projet` varchar(5000) DEFAULT NULL,
  `date_comm` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_USER`,`id_projet`),
  KEY `FK_commenter_id_projet` (`id_projet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `creer_projet`
--

DROP TABLE IF EXISTS `creer_projet`;
CREATE TABLE IF NOT EXISTS `creer_projet` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `id_projet` int(50) NOT NULL,
  PRIMARY KEY (`ID_USER`,`id_projet`),
  KEY `FK_creer_projet_id_projet` (`id_projet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `image_lieu`
--

DROP TABLE IF EXISTS `image_lieu`;
CREATE TABLE IF NOT EXISTS `image_lieu` (
  `id_img_lieu` int(11) NOT NULL AUTO_INCREMENT,
  `img_lieu` varchar(1000) DEFAULT NULL,
  `desc_img_lieu` varchar(5000) DEFAULT NULL,
  `id_lieu` int(50) DEFAULT NULL,
  PRIMARY KEY (`id_img_lieu`),
  KEY `FK_image_lieu_id_lieu` (`id_lieu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `image_perso`
--

DROP TABLE IF EXISTS `image_perso`;
CREATE TABLE IF NOT EXISTS `image_perso` (
  `id_img_perso` int(11) NOT NULL AUTO_INCREMENT,
  `img_perso` varchar(1000) DEFAULT NULL,
  `desc_img_perso` varchar(1000) DEFAULT NULL,
  `id_perso` int(50) DEFAULT NULL,
  PRIMARY KEY (`id_img_perso`),
  KEY `FK_image_perso_id_perso` (`id_perso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lexique`
--

DROP TABLE IF EXISTS `lexique`;
CREATE TABLE IF NOT EXISTS `lexique` (
  `id_lexique` int(11) NOT NULL AUTO_INCREMENT,
  `mot_cle_lexique` varchar(1000) DEFAULT NULL,
  `id_projet` int(50) DEFAULT NULL,
  PRIMARY KEY (`id_lexique`),
  KEY `FK_lexique_id_projet` (`id_projet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

DROP TABLE IF EXISTS `lieu`;
CREATE TABLE IF NOT EXISTS `lieu` (
  `id_lieu` int(11) NOT NULL AUTO_INCREMENT,
  `nom_lieu` varchar(100) DEFAULT NULL,
  `desc_lieu` varchar(5000) DEFAULT NULL,
  `img_lieu` varchar(1000) DEFAULT NULL,
  `id_projet` int(50) DEFAULT NULL,
  PRIMARY KEY (`id_lieu`),
  KEY `FK_lieu_id_projet` (`id_projet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `personnages`
--

DROP TABLE IF EXISTS `personnages`;
CREATE TABLE IF NOT EXISTS `personnages` (
  `id_perso` int(11) NOT NULL AUTO_INCREMENT,
  `nom_perso` varchar(100) DEFAULT NULL,
  `desc_perso` varchar(1000) DEFAULT NULL,
  `id_projet` int(50) DEFAULT NULL,
  PRIMARY KEY (`id_perso`),
  KEY `FK_personnages_id_projet` (`id_projet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `planche`
--

DROP TABLE IF EXISTS `planche`;
CREATE TABLE IF NOT EXISTS `planche` (
  `id_planche` int(11) NOT NULL AUTO_INCREMENT,
  `img_planche` varchar(1000) DEFAULT NULL,
  `id_chap` int(50) DEFAULT NULL,
  PRIMARY KEY (`id_planche`),
  KEY `FK_planche_id_chap` (`id_chap`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

DROP TABLE IF EXISTS `projet`;
CREATE TABLE IF NOT EXISTS `projet` (
  `id_projet` int(11) NOT NULL AUTO_INCREMENT,
  `nom_projet` varchar(100) DEFAULT NULL,
  `desc_projet` varchar(5000) DEFAULT NULL,
  `img_projet` varchar(1000) DEFAULT NULL,
  `id_type_projet` int(50) DEFAULT NULL,
  `id_statut_projet` int(50) DEFAULT NULL,
  PRIMARY KEY (`id_projet`),
  KEY `FK_projet_id_type_projet` (`id_type_projet`),
  KEY `FK_projet_id_statut_projet` (`id_statut_projet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `statut_projet`
--

DROP TABLE IF EXISTS `statut_projet`;
CREATE TABLE IF NOT EXISTS `statut_projet` (
  `id_statut_projet` int(11) NOT NULL AUTO_INCREMENT,
  `statut_projet` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_statut_projet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tome`
--

DROP TABLE IF EXISTS `tome`;
CREATE TABLE IF NOT EXISTS `tome` (
  `id_tome` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tome` varchar(100) DEFAULT NULL,
  `desc_tome` varchar(5000) DEFAULT NULL,
  `num_tome` int(11) DEFAULT NULL,
  `couverture_tome` varchar(100) DEFAULT NULL,
  `id_projet` int(50) DEFAULT NULL,
  PRIMARY KEY (`id_tome`),
  KEY `FK_tome_id_projet` (`id_projet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_projet`
--

DROP TABLE IF EXISTS `type_projet`;
CREATE TABLE IF NOT EXISTS `type_projet` (
  `id_type_projet` int(11) NOT NULL AUTO_INCREMENT,
  `type_projet` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_type_projet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_user`
--

DROP TABLE IF EXISTS `type_user`;
CREATE TABLE IF NOT EXISTS `type_user` (
  `id_type_user` int(11) NOT NULL AUTO_INCREMENT,
  `type_user` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_type_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `PASSWORD_USER` varchar(30) DEFAULT NULL,
  `PSEUDO_USER` varchar(30) DEFAULT NULL,
  `EMAIL_USER` varchar(30) DEFAULT NULL,
  `id_type_user` int(50) DEFAULT NULL,
  PRIMARY KEY (`ID_USER`),
  KEY `FK_USER_id_type_user` (`id_type_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD CONSTRAINT `FK_chapitre_id_tome` FOREIGN KEY (`id_tome`) REFERENCES `tome` (`id_tome`);

--
-- Contraintes pour la table `commenter`
--
ALTER TABLE `commenter`
  ADD CONSTRAINT `FK_commenter_ID_USER` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`),
  ADD CONSTRAINT `FK_commenter_id_projet` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`);

--
-- Contraintes pour la table `creer_projet`
--
ALTER TABLE `creer_projet`
  ADD CONSTRAINT `FK_creer_projet_ID_USER` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`),
  ADD CONSTRAINT `FK_creer_projet_id_projet` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`);

--
-- Contraintes pour la table `image_lieu`
--
ALTER TABLE `image_lieu`
  ADD CONSTRAINT `FK_image_lieu_id_lieu` FOREIGN KEY (`id_lieu`) REFERENCES `lieu` (`id_lieu`);

--
-- Contraintes pour la table `image_perso`
--
ALTER TABLE `image_perso`
  ADD CONSTRAINT `FK_image_perso_id_perso` FOREIGN KEY (`id_perso`) REFERENCES `personnages` (`id_perso`);

--
-- Contraintes pour la table `lexique`
--
ALTER TABLE `lexique`
  ADD CONSTRAINT `FK_lexique_id_projet` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`);

--
-- Contraintes pour la table `lieu`
--
ALTER TABLE `lieu`
  ADD CONSTRAINT `FK_lieu_id_projet` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`);

--
-- Contraintes pour la table `personnages`
--
ALTER TABLE `personnages`
  ADD CONSTRAINT `FK_personnages_id_projet` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`);

--
-- Contraintes pour la table `planche`
--
ALTER TABLE `planche`
  ADD CONSTRAINT `FK_planche_id_chap` FOREIGN KEY (`id_chap`) REFERENCES `chapitre` (`id_chap`);

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `FK_projet_id_statut_projet` FOREIGN KEY (`id_statut_projet`) REFERENCES `statut_projet` (`id_statut_projet`),
  ADD CONSTRAINT `FK_projet_id_type_projet` FOREIGN KEY (`id_type_projet`) REFERENCES `type_projet` (`id_type_projet`);

--
-- Contraintes pour la table `tome`
--
ALTER TABLE `tome`
  ADD CONSTRAINT `FK_tome_id_projet` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_USER_id_type_user` FOREIGN KEY (`id_type_user`) REFERENCES `type_user` (`id_type_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
