-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 01 jan. 2020 à 07:06
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
  `id_chapitre` int(11) NOT NULL,
  `nom_chapitre` varchar(30) NOT NULL,
  `description_chapitre` text NOT NULL,
  `id_tome` int(30) NOT NULL,
  `id_projet` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chapitre`
--

INSERT INTO `chapitre` (`id_chapitre`, `nom_chapitre`, `description_chapitre`, `id_tome`, `id_projet`) VALUES
(1, 'le commencement', '', 0, 11);

-- --------------------------------------------------------

--
-- Structure de la table `creature`
--

CREATE TABLE `creature` (
  `id_creature` int(11) NOT NULL,
  `nom_creature` varchar(30) NOT NULL,
  `description_creature` text NOT NULL,
  `image_creature` varchar(100) NOT NULL,
  `id_projet` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `creature`
--

INSERT INTO `creature` (`id_creature`, `nom_creature`, `description_creature`, `image_creature`, `id_projet`) VALUES
(1, 'etre sombre', '', '', 11);

-- --------------------------------------------------------

--
-- Structure de la table `creer_projet`
--

CREATE TABLE `creer_projet` (
  `id_projet` int(11) NOT NULL,
  `nom_projet` varchar(30) NOT NULL,
  `likes_projet` int(11) NOT NULL,
  `followers_projet` int(11) NOT NULL,
  `description_projet` text NOT NULL,
  `image_projet` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `creer_projet`
--

INSERT INTO `creer_projet` (`id_projet`, `nom_projet`, `likes_projet`, `followers_projet`, `description_projet`, `image_projet`, `id_user`) VALUES
(11, 'ENREGISTREMENT 1', 0, 0, '', '', 6),
(12, 'BOOK OF DEATH', 0, 0, '', '', 6),
(15, 'ikar', 0, 0, '', '', 7),
(16, 'SPIRITUAL + CROSS', 0, 0, '', '', 6);

-- --------------------------------------------------------

--
-- Structure de la table `illustration`
--

CREATE TABLE `illustration` (
  `id_illustration` int(11) NOT NULL,
  `nom_illustration` varchar(30) NOT NULL,
  `description_illustration` text NOT NULL,
  `image_illustration` varchar(100) NOT NULL,
  `id_projet` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `illustration`
--

INSERT INTO `illustration` (`id_illustration`, `nom_illustration`, `description_illustration`, `image_illustration`, `id_projet`) VALUES
(1, 'chara-design de Kuro', '', '', 11);

-- --------------------------------------------------------

--
-- Structure de la table `image_user`
--

CREATE TABLE `image_user` (
  `id_image` int(11) NOT NULL,
  `image_user` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `image_user`
--

INSERT INTO `image_user` (`id_image`, `image_user`, `id_user`) VALUES
(17, 'd0f6cc250c466724992136933b9a9668.jpg', 6),
(19, '1573741486944.png', 7);

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

CREATE TABLE `lieu` (
  `id_lieu` int(11) NOT NULL,
  `nom_lieu` varchar(30) NOT NULL,
  `description_lieu` text NOT NULL,
  `image_lieu` varchar(100) NOT NULL,
  `id_projet` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `lieu`
--

INSERT INTO `lieu` (`id_lieu`, `nom_lieu`, `description_lieu`, `image_lieu`, `id_projet`) VALUES
(1, 'monde de Kuro detruit', '', '', 11);

-- --------------------------------------------------------

--
-- Structure de la table `personnage`
--

CREATE TABLE `personnage` (
  `id_personnage` int(11) NOT NULL,
  `nom_personnage` varchar(30) NOT NULL,
  `description_personnage` text NOT NULL,
  `image_personnage` varchar(100) NOT NULL,
  `id_projet` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personnage`
--

INSERT INTO `personnage` (`id_personnage`, `nom_personnage`, `description_personnage`, `image_personnage`, `id_projet`) VALUES
(1, 'Kuro', '', '', 11),
(2, 'Shiro', '', '', 11);

-- --------------------------------------------------------

--
-- Structure de la table `terme`
--

CREATE TABLE `terme` (
  `id_terme` int(11) NOT NULL,
  `nom_terme` varchar(30) NOT NULL,
  `description_terme` text NOT NULL,
  `id_projet` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `terme`
--

INSERT INTO `terme` (`id_terme`, `nom_terme`, `description_terme`, `id_projet`) VALUES
(1, 'kuro', 'signifie \"Noir\" en japonais.', 11);

-- --------------------------------------------------------

--
-- Structure de la table `tome`
--

CREATE TABLE `tome` (
  `id_tome` int(11) NOT NULL,
  `nom_tome` varchar(30) NOT NULL,
  `image_tome` varchar(100) NOT NULL,
  `id_projet` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email_user` varchar(30) NOT NULL,
  `pseudo_user` varchar(30) NOT NULL,
  `password_user` varchar(30) NOT NULL,
  `type_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `email_user`, `pseudo_user`, `password_user`, `type_user`) VALUES
(6, 'blacklenoire4444@gmail.com', 'Daniels', '931996', 'Scenariste & Dessinateur'),
(7, 'Malandiyoane@gmail.com', 'Astral', 'Marline', 'Scenariste & Dessinateur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD PRIMARY KEY (`id_chapitre`);

--
-- Index pour la table `creature`
--
ALTER TABLE `creature`
  ADD PRIMARY KEY (`id_creature`);

--
-- Index pour la table `creer_projet`
--
ALTER TABLE `creer_projet`
  ADD PRIMARY KEY (`id_projet`);

--
-- Index pour la table `illustration`
--
ALTER TABLE `illustration`
  ADD PRIMARY KEY (`id_illustration`);

--
-- Index pour la table `image_user`
--
ALTER TABLE `image_user`
  ADD PRIMARY KEY (`id_image`),
  ADD UNIQUE KEY `id_user` (`id_user`);

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
-- Index pour la table `terme`
--
ALTER TABLE `terme`
  ADD PRIMARY KEY (`id_terme`);

--
-- Index pour la table `tome`
--
ALTER TABLE `tome`
  ADD PRIMARY KEY (`id_tome`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chapitre`
--
ALTER TABLE `chapitre`
  MODIFY `id_chapitre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `creature`
--
ALTER TABLE `creature`
  MODIFY `id_creature` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `creer_projet`
--
ALTER TABLE `creer_projet`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `illustration`
--
ALTER TABLE `illustration`
  MODIFY `id_illustration` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `image_user`
--
ALTER TABLE `image_user`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `lieu`
--
ALTER TABLE `lieu`
  MODIFY `id_lieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `personnage`
--
ALTER TABLE `personnage`
  MODIFY `id_personnage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `terme`
--
ALTER TABLE `terme`
  MODIFY `id_terme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tome`
--
ALTER TABLE `tome`
  MODIFY `id_tome` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
