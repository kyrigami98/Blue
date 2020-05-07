-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 07 mai 2020 à 10:12
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
(21, 8),
(23, 9);

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
(52, 'Cache dans l\'ombre d\'un autre', 'le deuxieme chapitre de Spiritual Cross par Daniels...', '', 'Daniels6f3d29f87e004abcdaf63bf606f56c7a.jpg', 19),
(54, 'Mon chez moi', '\"mon chez moi\"', '', 'EEE-DEF-with-lines-legalline.jpg', 20),
(55, 'moi', 'description', '', 'd0f6cc250c466724992136933b9a9668.jpg', 21);

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
(5, 8),
(7, 8),
(8, 9);

-- --------------------------------------------------------

--
-- Structure de la table `collaborer`
--

CREATE TABLE `collaborer` (
  `id_projet` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `type_collaborateur` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `collaborer`
--

INSERT INTO `collaborer` (`id_projet`, `id_utilisateur`, `type_collaborateur`) VALUES
(8, 6, 'Scenariste'),
(8, 17, NULL),
(9, 1, 'Scenariste & Dessinateur'),
(9, 17, NULL);

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
(21, 'Humain', 'creature vivante et intelligente du monde des humains...', 'The Distorted Reality.jpg'),
(23, 'Anomalie', '\"Une creature...\"', '91507748_261164054915027_837417347391160320_n.png');

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `id_modif` int(11) NOT NULL,
  `nom_modif` varchar(30) NOT NULL,
  `categorie_modif` varchar(30) DEFAULT NULL,
  `type_modif` varchar(30) DEFAULT NULL,
  `date_modif` datetime DEFAULT current_timestamp(),
  `id_projet` int(11) DEFAULT NULL,
  `id_collaborateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`id_modif`, `nom_modif`, `categorie_modif`, `type_modif`, `date_modif`, `id_projet`, `id_collaborateur`) VALUES
(2, 'public', 'CONFIDENTIALITE', 'MODIFICATION', '2020-05-06 19:46:45', 9, 6),
(3, 'privé', 'CONFIDENTIALITE', 'MODIFICATION', '2020-05-06 19:46:46', 9, 6),
(5, 'Cache dans l\'ombre d\'un autre', 'CHAPITRE', 'MODIFICATION', '2020-05-06 20:13:18', 8, 1),
(6, 'illustration 8', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-06 20:28:16', 9, 6),
(7, 'public', 'CONFIDENTIALITE', 'MODIFICATION', '2020-05-06 21:55:26', 8, 1),
(8, 'public', 'CONFIDENTIALITE', 'MODIFICATION', '2020-05-06 22:03:06', 9, 6);

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
(23, 'chara-design', 'description', 'DanielsSTAND.jpg', 8),
(24, 'Illustration 1', '\"Une illustration...\"', 'DanielsSTAND.jpg', 9),
(25, 'Illustration 2', 'description', 'Black00qMahP.jpg', 9),
(26, 'illustration 3', 'description', 'Black6f3d29f87e004abcdaf63bf606f56c7a.jpg', 9),
(27, 'illustration 4', 'description', 'Black4028b9172df236e57c97904108d8a7fd.jpg', 9),
(28, 'illustration 5', 'description', 'Black343064.jpg', 9),
(29, 'illustration 6', '', 'BlackAmphibia_logo.jpg', 9),
(30, 'illustration 7', 'description', 'draw.gif', 9),
(32, 'illustration 9', 'description', 'Blackb0f09c8019563a5ff8983e99e40dad67.jpg', 9),
(33, 'Illustration 10', 'description', '60-603760_adventure-time-cartoon-network-iphone-8-wallpaper-adventure.jpg', 9);

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
(9, 8),
(10, 8),
(11, 9);

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
(23, 'Manoir Esthel', 'quartier général des templiers chevaliers de l\'ordre des ombres...', '4028b9172df236e57c97904108d8a7fd.jpg'),
(25, 'La librairie Watson', '\"Un lieu...\"', '91400522_703834397026695_4531857960967602176_n.png');

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
(9, 'Viktor Vladymir', 'Le protagoniste de Spiritual cross', 'd0f6cc250c466724992136933b9a9668.jpg'),
(10, 'X', 'Templier chevalier X de l\'ordre des ombres...', 'Daniels1차 성배 전쟁 일러 _ 네이버 블로그.jpg'),
(11, 'Kira Watson', '\"un personnage...\"', 'IMG_20191217_002246_822.JPG');

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
  `visibilite` varchar(30) CHARACTER SET utf32 NOT NULL DEFAULT 'public',
  `id_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `titre_projet`, `description_projet`, `image_projet`, `likes_projet`, `followers_projet`, `visibilite`, `id_utilisateur`) VALUES
(8, 'Spiritual Cross', 'Une histoire de templiers...', 'DanielsEEE-DEF-with-lines-legalline.jpg', 0, 0, 'public', 1),
(9, 'Book Of Death', NULL, NULL, 0, 0, 'public', 6),
(10, 'Cross of GOD', NULL, NULL, 0, 0, 'public', 6),
(11, 'Spiritual Cross', NULL, NULL, 0, 0, 'public', 6),
(12, 'Spiritual Cross : The Begining', NULL, NULL, 0, 0, 'public', 6);

-- --------------------------------------------------------

--
-- Structure de la table `suivre`
--

CREATE TABLE `suivre` (
  `id_suivi` int(11) NOT NULL,
  `id_artiste` int(11) DEFAULT NULL,
  `id_abonne` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `suivre`
--

INSERT INTO `suivre` (`id_suivi`, `id_artiste`, `id_abonne`) VALUES
(3, 17, 6),
(7, 1, 6),
(10, 6, 1);

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
(5, 'Energie spirituelle', ''),
(6, 'moi', 'moi'),
(7, 'Energie spirituelle demoniaque', 'description'),
(8, 'Ange de la mort', '\"Un terme...\"');

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
(19, 'Blessure', '', 8),
(20, 'Mon chez moi', '', 9),
(21, 'moi', 'd0f6cc250c466724992136933b9a9668.jpg', NULL);

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
(1, 'Daniels', 'kdalien.bassidi@gmail.com', '931996', 'Scenariste & Dessinateur', 'Daniels4e97fbc5abb083a286183cfdce27730d.gif', 8),
(6, 'Black', 'blacklenoire4444@gmail.com', '931996', 'Scenariste', 'black343064.jpg', 9),
(17, 'Erik', 'ericleblanc4444@gmail.com', '931996', NULL, 'Erik00qMahP.jpg', 0);

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
(23, 8),
(25, 9);

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
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`id_modif`);

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
-- Index pour la table `suivre`
--
ALTER TABLE `suivre`
  ADD PRIMARY KEY (`id_suivi`);

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
  MODIFY `id_chapitre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `creature`
--
ALTER TABLE `creature`
  MODIFY `id_creature` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `historique`
--
ALTER TABLE `historique`
  MODIFY `id_modif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `illustration`
--
ALTER TABLE `illustration`
  MODIFY `id_illustration` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `lieu`
--
ALTER TABLE `lieu`
  MODIFY `id_lieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `personnage`
--
ALTER TABLE `personnage`
  MODIFY `id_personnage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `suivre`
--
ALTER TABLE `suivre`
  MODIFY `id_suivi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `terme`
--
ALTER TABLE `terme`
  MODIFY `id_terme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `tome`
--
ALTER TABLE `tome`
  MODIFY `id_tome` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
