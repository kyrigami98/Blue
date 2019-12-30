-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 30 déc. 2019 à 12:49
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
-- Structure de la table `creer_projet`
--

CREATE TABLE `creer_projet` (
  `id_projet` int(11) NOT NULL,
  `nom_projet` varchar(30) NOT NULL,
  `likes_projet` int(11) NOT NULL,
  `followers_projet` int(11) NOT NULL,
  `description_projet` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `creer_projet`
--

INSERT INTO `creer_projet` (`id_projet`, `nom_projet`, `likes_projet`, `followers_projet`, `description_projet`, `id_user`) VALUES
(1, 'SPIRITUAL + CROSS', 0, 0, '', 3),
(2, 'NARUTO SHIPPUDEN', 0, 0, '', 2),
(5, 'DRAGON BALL Z', 0, 0, '', 2),
(6, 'HUNTER X HUNTER', 0, 0, '', 2),
(7, 'FAIRY TAIL', 0, 0, '', 2),
(8, 'ONE PIECE', 0, 0, '', 2),
(9, 'BLEACH', 0, 0, '', 2);

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
(1, 'SplashScreen.png', 2),
(12, '343064.jpg', 3);

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
(2, 'blacklenoire4444@gmail.com', 'Kriss', '931996', 'Scenariste & Dessinateur'),
(3, 'ericleblanc4444@gmail.com', 'Erik', 'shiro', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `creer_projet`
--
ALTER TABLE `creer_projet`
  ADD PRIMARY KEY (`id_projet`);

--
-- Index pour la table `image_user`
--
ALTER TABLE `image_user`
  ADD PRIMARY KEY (`id_image`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `creer_projet`
--
ALTER TABLE `creer_projet`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `image_user`
--
ALTER TABLE `image_user`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
