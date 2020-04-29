-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 29 avr. 2020 à 16:19
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
-- Base de données :  `blue2`
--

-- --------------------------------------------------------

--
-- Structure de la table `apparaitre`
--

CREATE TABLE `apparaitre` (
  `id_creature` int(11) NOT NULL,
  `id_projet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `apparaitre`
--

INSERT INTO `apparaitre` (`id_creature`, `id_projet`) VALUES
(21, 8);

-- --------------------------------------------------------

--
-- Structure de la table `chapitre`
--

CREATE TABLE `chapitre` (
  `id_chapitre` int(11) NOT NULL,
  `titre_chapitre` varchar(30) DEFAULT NULL,
  `description_chapitre` text DEFAULT NULL,
  `texte_chapitre` text CHARACTER SET utf32 NOT NULL,
  `image_chapitre` varchar(100) CHARACTER SET utf32 NOT NULL,
  `id_tome` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chapitre`
--

INSERT INTO `chapitre` (`id_chapitre`, `titre_chapitre`, `description_chapitre`, `texte_chapitre`, `image_chapitre`, `id_tome`) VALUES
(51, 'Blessure', 'Le prologue de Spiritual Cross...', '', 'c88de6df84d3a9fe26a13a586b0bde71.jpg', 19),
(52, 'cache dans l\'ombre d\'un autre', '', '', 'Daniels6f3d29f87e004abcdaf63bf606f56c7a.jpg', 19);

-- --------------------------------------------------------

--
-- Structure de la table `citer`
--

CREATE TABLE `citer` (
  `id_terme` int(11) NOT NULL,
  `id_projet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `citer`
--

INSERT INTO `citer` (`id_terme`, `id_projet`) VALUES
(5, 8);

-- --------------------------------------------------------

--
-- Structure de la table `collaborer`
--

CREATE TABLE `collaborer` (
  `id_projet` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `type_collaborateur` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `creature`
--

CREATE TABLE `creature` (
  `id_creature` int(11) NOT NULL,
  `nom_creature` varchar(30) DEFAULT NULL,
  `description_creature` text DEFAULT NULL,
  `image_creature` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `creature`
--

INSERT INTO `creature` (`id_creature`, `nom_creature`, `description_creature`, `image_creature`) VALUES
(21, 'Humain', 'creature vivante et intelligente du monde des humains...', 'The Distorted Reality.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `illustration`
--

CREATE TABLE `illustration` (
  `id_illustration` int(11) NOT NULL,
  `titre_illustration` varchar(30) DEFAULT NULL,
  `description_illustration` text DEFAULT NULL,
  `image_illustration` varchar(100) DEFAULT NULL,
  `id_projet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `illustration`
--

INSERT INTO `illustration` (`id_illustration`, `titre_illustration`, `description_illustration`, `image_illustration`, `id_projet`) VALUES
(22, 'PNG2', '', 'DanielsPIC1.PNG', 8);

-- --------------------------------------------------------

--
-- Structure de la table `intervenir`
--

CREATE TABLE `intervenir` (
  `id_personnage` int(11) NOT NULL,
  `id_projet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `intervenir`
--

INSERT INTO `intervenir` (`id_personnage`, `id_projet`) VALUES
(9, 8);

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

CREATE TABLE `lieu` (
  `id_lieu` int(11) NOT NULL,
  `nom_lieu` varchar(30) DEFAULT NULL,
  `description_lieu` text DEFAULT NULL,
  `image_lieu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `lieu`
--

INSERT INTO `lieu` (`id_lieu`, `nom_lieu`, `description_lieu`, `image_lieu`) VALUES
(23, 'Manoir Esthel', 'quartier général des templiers chevaliers de l\'ordre des ombres...', '4028b9172df236e57c97904108d8a7fd.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `personnage`
--

CREATE TABLE `personnage` (
  `id_personnage` int(11) NOT NULL,
  `nom_personnage` varchar(30) DEFAULT NULL,
  `description_personnage` text DEFAULT NULL,
  `image_personnage` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personnage`
--

INSERT INTO `personnage` (`id_personnage`, `nom_personnage`, `description_personnage`, `image_personnage`) VALUES
(9, 'Viktor Vladymir', 'Le protagoniste de Spiritual cross', 'd0f6cc250c466724992136933b9a9668.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id_projet` int(11) NOT NULL,
  `titre_projet` varchar(50) DEFAULT NULL,
  `description_projet` text DEFAULT NULL,
  `image_projet` varchar(100) DEFAULT NULL,
  `likes_projet` int(11) NOT NULL,
  `followers_projet` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `titre_projet`, `description_projet`, `image_projet`, `likes_projet`, `followers_projet`, `id_utilisateur`) VALUES
(8, 'Spiritual Cross', NULL, NULL, 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `terme`
--

CREATE TABLE `terme` (
  `id_terme` int(11) NOT NULL,
  `nom_terme` varchar(30) DEFAULT NULL,
  `description_terme` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `terme`
--

INSERT INTO `terme` (`id_terme`, `nom_terme`, `description_terme`) VALUES
(5, 'Energie spirituelle', '');

-- --------------------------------------------------------

--
-- Structure de la table `tome`
--

CREATE TABLE `tome` (
  `id_tome` int(11) NOT NULL,
  `titre_tome` varchar(30) DEFAULT NULL,
  `image_tome` varchar(100) DEFAULT NULL,
  `id_projet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tome`
--

INSERT INTO `tome` (`id_tome`, `titre_tome`, `image_tome`, `id_projet`) VALUES
(19, 'Blessure', '', 8);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom_utilisateur` varchar(30) DEFAULT NULL,
  `email_utilisateur` varchar(30) DEFAULT NULL,
  `password_utilisateur` varchar(50) DEFAULT NULL,
  `type_utilisateur` varchar(30) DEFAULT NULL,
  `image_utilisateur` varchar(100) DEFAULT NULL,
  `projet_en_cours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `email_utilisateur`, `password_utilisateur`, `type_utilisateur`, `image_utilisateur`, `projet_en_cours`) VALUES
(1, 'Daniels', 'blacklenoire4444@gmail.com', '931996', 'Scenariste & Dessinateur', 'Daniels4e97fbc5abb083a286183cfdce27730d.gif', 8),
(4, 'erik', 'ericleblanc4444@gmail.com', '931996', NULL, 'erik6f3d29f87e004abcdaf63bf606f56c7a.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `visiter`
--

CREATE TABLE `visiter` (
  `id_lieu` int(11) NOT NULL,
  `id_projet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `visiter`
--

INSERT INTO `visiter` (`id_lieu`, `id_projet`) VALUES
(23, 8);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apparaitre`
--
ALTER TABLE `apparaitre`
  ADD PRIMARY KEY (`id_creature`,`id_projet`),
  ADD KEY `id_projet` (`id_projet`);

--
-- Index pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD PRIMARY KEY (`id_chapitre`),
  ADD KEY `id_tome` (`id_tome`);

--
-- Index pour la table `citer`
--
ALTER TABLE `citer`
  ADD PRIMARY KEY (`id_terme`,`id_projet`),
  ADD KEY `id_projet` (`id_projet`);

--
-- Index pour la table `collaborer`
--
ALTER TABLE `collaborer`
  ADD PRIMARY KEY (`id_projet`,`id_utilisateur`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `creature`
--
ALTER TABLE `creature`
  ADD PRIMARY KEY (`id_creature`);

--
-- Index pour la table `illustration`
--
ALTER TABLE `illustration`
  ADD PRIMARY KEY (`id_illustration`),
  ADD KEY `id_projet` (`id_projet`);

--
-- Index pour la table `intervenir`
--
ALTER TABLE `intervenir`
  ADD PRIMARY KEY (`id_personnage`,`id_projet`),
  ADD KEY `id_projet` (`id_projet`);

--
-- Index pour la table `lieu`
--
ALTER TABLE `lieu`
  ADD PRIMARY KEY (`id_lieu`);

--
-- Index pour la table `personnage`
--
ALTER TABLE `personnage`
  ADD PRIMARY KEY (`id_personnage`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id_projet`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `terme`
--
ALTER TABLE `terme`
  ADD PRIMARY KEY (`id_terme`);

--
-- Index pour la table `tome`
--
ALTER TABLE `tome`
  ADD PRIMARY KEY (`id_tome`),
  ADD KEY `id_projet` (`id_projet`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Index pour la table `visiter`
--
ALTER TABLE `visiter`
  ADD PRIMARY KEY (`id_lieu`,`id_projet`),
  ADD KEY `id_projet` (`id_projet`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chapitre`
--
ALTER TABLE `chapitre`
  MODIFY `id_chapitre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `creature`
--
ALTER TABLE `creature`
  MODIFY `id_creature` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `illustration`
--
ALTER TABLE `illustration`
  MODIFY `id_illustration` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `lieu`
--
ALTER TABLE `lieu`
  MODIFY `id_lieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `personnage`
--
ALTER TABLE `personnage`
  MODIFY `id_personnage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `terme`
--
ALTER TABLE `terme`
  MODIFY `id_terme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `tome`
--
ALTER TABLE `tome`
  MODIFY `id_tome` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `apparaitre`
--
ALTER TABLE `apparaitre`
  ADD CONSTRAINT `apparaitre_ibfk_1` FOREIGN KEY (`id_creature`) REFERENCES `creature` (`id_creature`),
  ADD CONSTRAINT `apparaitre_ibfk_2` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`);

--
-- Contraintes pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD CONSTRAINT `chapitre_ibfk_1` FOREIGN KEY (`id_tome`) REFERENCES `tome` (`id_tome`);

--
-- Contraintes pour la table `citer`
--
ALTER TABLE `citer`
  ADD CONSTRAINT `citer_ibfk_1` FOREIGN KEY (`id_terme`) REFERENCES `terme` (`id_terme`),
  ADD CONSTRAINT `citer_ibfk_2` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`);

--
-- Contraintes pour la table `collaborer`
--
ALTER TABLE `collaborer`
  ADD CONSTRAINT `collaborer_ibfk_1` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`),
  ADD CONSTRAINT `collaborer_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `illustration`
--
ALTER TABLE `illustration`
  ADD CONSTRAINT `illustration_ibfk_1` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`);

--
-- Contraintes pour la table `intervenir`
--
ALTER TABLE `intervenir`
  ADD CONSTRAINT `intervenir_ibfk_1` FOREIGN KEY (`id_personnage`) REFERENCES `personnage` (`id_personnage`),
  ADD CONSTRAINT `intervenir_ibfk_2` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`);

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `projet_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `tome`
--
ALTER TABLE `tome`
  ADD CONSTRAINT `tome_ibfk_1` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`);

--
-- Contraintes pour la table `visiter`
--
ALTER TABLE `visiter`
  ADD CONSTRAINT `visiter_ibfk_1` FOREIGN KEY (`id_lieu`) REFERENCES `lieu` (`id_lieu`),
  ADD CONSTRAINT `visiter_ibfk_2` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
