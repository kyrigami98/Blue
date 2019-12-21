-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 21 déc. 2019 à 03:32
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.10

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

CREATE TABLE `chapitre` (
  `id_chap` int(11) NOT NULL,
  `nom_chap` int(11) DEFAULT NULL,
  `id_tome` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commenter`
--

CREATE TABLE `commenter` (
  `ID_USER` int(11) NOT NULL,
  `id_projet` int(50) NOT NULL,
  `comm_projet` varchar(5000) DEFAULT NULL,
  `date_comm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `creer_projet`
--

CREATE TABLE `creer_projet` (
  `ID_USER` int(11) NOT NULL,
  `id_projet` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `image_lieu`
--

CREATE TABLE `image_lieu` (
  `id_img_lieu` int(11) NOT NULL,
  `img_lieu` varchar(1000) DEFAULT NULL,
  `desc_img_lieu` varchar(5000) DEFAULT NULL,
  `id_lieu` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `image_perso`
--

CREATE TABLE `image_perso` (
  `id_img_perso` int(11) NOT NULL,
  `img_perso` varchar(1000) DEFAULT NULL,
  `desc_img_perso` varchar(1000) DEFAULT NULL,
  `id_perso` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lexique`
--

CREATE TABLE `lexique` (
  `id_lexique` int(11) NOT NULL,
  `mot_cle_lexique` varchar(1000) DEFAULT NULL,
  `id_projet` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

CREATE TABLE `lieu` (
  `id_lieu` int(11) NOT NULL,
  `nom_lieu` varchar(100) DEFAULT NULL,
  `desc_lieu` varchar(5000) DEFAULT NULL,
  `img_lieu` varchar(1000) DEFAULT NULL,
  `id_projet` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `personnages`
--

CREATE TABLE `personnages` (
  `id_perso` int(11) NOT NULL,
  `nom_perso` varchar(100) DEFAULT NULL,
  `desc_perso` varchar(1000) DEFAULT NULL,
  `id_projet` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `planche`
--

CREATE TABLE `planche` (
  `id_planche` int(11) NOT NULL,
  `img_planche` varchar(1000) DEFAULT NULL,
  `id_chap` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id_projet` int(11) NOT NULL,
  `nom_projet` varchar(100) DEFAULT NULL,
  `desc_projet` varchar(5000) DEFAULT NULL,
  `img_projet` varchar(1000) DEFAULT NULL,
  `id_type_projet` int(50) DEFAULT NULL,
  `id_statut_projet` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `statut_projet`
--

CREATE TABLE `statut_projet` (
  `id_statut_projet` int(11) NOT NULL,
  `statut_projet` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tome`
--

CREATE TABLE `tome` (
  `id_tome` int(11) NOT NULL,
  `nom_tome` varchar(100) DEFAULT NULL,
  `desc_tome` varchar(5000) DEFAULT NULL,
  `num_tome` int(11) DEFAULT NULL,
  `couverture_tome` varchar(100) DEFAULT NULL,
  `id_projet` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_projet`
--

CREATE TABLE `type_projet` (
  `id_type_projet` int(11) NOT NULL,
  `type_projet` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_user`
--

CREATE TABLE `type_user` (
  `id_type_user` int(11) NOT NULL,
  `type_user` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `PASSWORD_USER` varchar(30) DEFAULT NULL,
  `PSEUDO_USER` varchar(30) DEFAULT NULL,
  `EMAIL_USER` varchar(30) DEFAULT NULL,
  `IMAGE_USER` varchar(30) DEFAULT NULL,
  `id_type_user` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID_USER`, `PASSWORD_USER`, `PSEUDO_USER`, `EMAIL_USER`, `IMAGE_USER`, `id_type_user`) VALUES
(2, '931996', 'Daniels', 'blacklenoire4444@gmail.com', 'CHIM-45.jpg', NULL),
(5, '931996', 'Erik', 'ericleblanc4444@gmail.com', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD PRIMARY KEY (`id_chap`),
  ADD KEY `FK_chapitre_id_tome` (`id_tome`);

--
-- Index pour la table `commenter`
--
ALTER TABLE `commenter`
  ADD PRIMARY KEY (`ID_USER`,`id_projet`),
  ADD KEY `FK_commenter_id_projet` (`id_projet`);

--
-- Index pour la table `creer_projet`
--
ALTER TABLE `creer_projet`
  ADD PRIMARY KEY (`ID_USER`,`id_projet`),
  ADD KEY `FK_creer_projet_id_projet` (`id_projet`);

--
-- Index pour la table `image_lieu`
--
ALTER TABLE `image_lieu`
  ADD PRIMARY KEY (`id_img_lieu`),
  ADD KEY `FK_image_lieu_id_lieu` (`id_lieu`);

--
-- Index pour la table `image_perso`
--
ALTER TABLE `image_perso`
  ADD PRIMARY KEY (`id_img_perso`),
  ADD KEY `FK_image_perso_id_perso` (`id_perso`);

--
-- Index pour la table `lexique`
--
ALTER TABLE `lexique`
  ADD PRIMARY KEY (`id_lexique`),
  ADD KEY `FK_lexique_id_projet` (`id_projet`);

--
-- Index pour la table `lieu`
--
ALTER TABLE `lieu`
  ADD PRIMARY KEY (`id_lieu`),
  ADD KEY `FK_lieu_id_projet` (`id_projet`);

--
-- Index pour la table `personnages`
--
ALTER TABLE `personnages`
  ADD PRIMARY KEY (`id_perso`),
  ADD KEY `FK_personnages_id_projet` (`id_projet`);

--
-- Index pour la table `planche`
--
ALTER TABLE `planche`
  ADD PRIMARY KEY (`id_planche`),
  ADD KEY `FK_planche_id_chap` (`id_chap`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id_projet`),
  ADD KEY `FK_projet_id_type_projet` (`id_type_projet`),
  ADD KEY `FK_projet_id_statut_projet` (`id_statut_projet`);

--
-- Index pour la table `statut_projet`
--
ALTER TABLE `statut_projet`
  ADD PRIMARY KEY (`id_statut_projet`);

--
-- Index pour la table `tome`
--
ALTER TABLE `tome`
  ADD PRIMARY KEY (`id_tome`),
  ADD KEY `FK_tome_id_projet` (`id_projet`);

--
-- Index pour la table `type_projet`
--
ALTER TABLE `type_projet`
  ADD PRIMARY KEY (`id_type_projet`);

--
-- Index pour la table `type_user`
--
ALTER TABLE `type_user`
  ADD PRIMARY KEY (`id_type_user`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`),
  ADD KEY `FK_USER_id_type_user` (`id_type_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chapitre`
--
ALTER TABLE `chapitre`
  MODIFY `id_chap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commenter`
--
ALTER TABLE `commenter`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `creer_projet`
--
ALTER TABLE `creer_projet`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `image_lieu`
--
ALTER TABLE `image_lieu`
  MODIFY `id_img_lieu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `image_perso`
--
ALTER TABLE `image_perso`
  MODIFY `id_img_perso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lexique`
--
ALTER TABLE `lexique`
  MODIFY `id_lexique` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lieu`
--
ALTER TABLE `lieu`
  MODIFY `id_lieu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personnages`
--
ALTER TABLE `personnages`
  MODIFY `id_perso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `planche`
--
ALTER TABLE `planche`
  MODIFY `id_planche` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `statut_projet`
--
ALTER TABLE `statut_projet`
  MODIFY `id_statut_projet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tome`
--
ALTER TABLE `tome`
  MODIFY `id_tome` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_projet`
--
ALTER TABLE `type_projet`
  MODIFY `id_type_projet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_user`
--
ALTER TABLE `type_user`
  MODIFY `id_type_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
