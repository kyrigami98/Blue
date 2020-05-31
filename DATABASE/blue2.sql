-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 22 mai 2020 à 18:16
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
-- Structure de la table `aimer_projet`
--

CREATE TABLE `aimer_projet` (
  `id_aimer` int(11) NOT NULL,
  `id_projet` int(11) DEFAULT NULL,
  `id_abonne` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `aimer_projet`
--

INSERT INTO `aimer_projet` (`id_aimer`, `id_projet`, `id_abonne`) VALUES
(14, 13, 6),
(15, 9, 6),
(16, 11, 1),
(17, 8, 17),
(19, 9, 1);

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
(51, 'Blessure', 'Le prologue de Spiritual Cross...', '*Energie_spirituelle_demoniaque ', 'c88de6df84d3a9fe26a13a586b0bde71.jpg', 19),
(52, 'Cache dans l\'ombre d\'un autre', 'le deuxieme chapitre de Spiritual Cross par Daniels...', 'c\'est l\'histoire de Viktor Vladymir, templier chevalier de l\'ordre du Vatican devenu templier chevalier de l\'ordre des ombres apres avoir eveille l\'energie spirituelle obscure face a l\'archange dechu Lucifer.', 'Daniels6f3d29f87e004abcdaf63bf606f56c7a.jpg', 19),
(54, 'Mon chez moi', '\"mon chez moi\"', '', 'EEE-DEF-with-lines-legalline.jpg', 20),
(55, 'moi', 'description', '', 'd0f6cc250c466724992136933b9a9668.jpg', 21),
(56, 'La nouvelle vie', '', '', 'DanielsCapture d’écran (54).png', 19);

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
(8, 9),
(9, 8);

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
(8, 'public', 'CONFIDENTIALITE', 'MODIFICATION', '2020-05-06 22:03:06', 9, 6),
(9, 'Informations du projet', 'Projet', 'MODIFICATION', '2020-05-11 10:58:42', 9, 6),
(10, 'Informations du projet', 'Projet', 'MODIFICATION', '2020-05-11 11:03:35', 9, 6),
(11, 'Informations du projet', 'Projet', 'MODIFICATION', '2020-05-11 18:49:08', 12, 6),
(12, 'Informations du projet', 'Projet', 'MODIFICATION', '2020-05-11 18:59:39', 12, 6),
(13, 'Informations du projet', 'Projet', 'MODIFICATION', '2020-05-11 19:01:15', 12, 6),
(14, 'Informations du projet', 'Projet', 'MODIFICATION', '2020-05-11 19:01:42', 12, 6),
(15, 'Informations du projet', 'Projet', 'MODIFICATION', '2020-05-11 19:16:31', 8, 1),
(16, 'privé', 'CONFIDENTIALITE', 'MODIFICATION', '2020-05-11 19:22:17', 8, 1),
(17, 'public', 'CONFIDENTIALITE', 'MODIFICATION', '2020-05-11 20:05:01', 8, 1),
(18, 'moi', 'ILLUSTRATION', 'AJOUT', '2020-05-11 20:07:09', 8, 1),
(19, 'moi', 'ILLUSTRATION', 'MODIFICATION', '2020-05-11 20:12:18', NULL, NULL),
(20, 'image', 'ILLUSTRATION', 'AJOUT', '2020-05-11 20:24:38', 8, 1),
(21, 'moi', 'ILLUSTRATION', 'MODIFICATION', '2020-05-11 20:28:49', 8, 1),
(22, 'teste ajax illustration 1', 'ILLUSTRATION', 'AJOUT', '2020-05-12 15:17:24', 8, 1),
(23, 'teste ajax illustration 1', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-12 15:17:37', 8, 1),
(24, 'teste ajax illustration 3', 'ILLUSTRATION', 'AJOUT', '2020-05-12 15:37:04', 8, 1),
(25, 'teste ajax illustration 3', 'ILLUSTRATION', 'AJOUT', '2020-05-12 15:37:17', 8, 1),
(26, 'teste ajax illustration 3', 'ILLUSTRATION', 'AJOUT', '2020-05-12 15:39:02', 8, 1),
(27, 'teste ajax illustration 4', 'ILLUSTRATION', 'AJOUT', '2020-05-12 15:42:25', 8, 1),
(28, 'teste ajax illustration final', 'ILLUSTRATION', 'AJOUT', '2020-05-12 15:44:31', 8, 1),
(29, 'moi', 'ILLUSTRATION', 'AJOUT', '2020-05-12 15:46:31', 8, 1),
(30, 'toi', 'ILLUSTRATION', 'AJOUT', '2020-05-12 15:49:13', 8, 1),
(31, 'eux', 'ILLUSTRATION', 'AJOUT', '2020-05-12 15:56:04', 8, 1),
(32, 'teste', 'ILLUSTRATION', 'AJOUT', '2020-05-12 16:00:40', 8, 1),
(33, 'teste 2', 'ILLUSTRATION', 'AJOUT', '2020-05-12 16:01:19', 8, 1),
(34, 'teste 3', 'ILLUSTRATION', 'AJOUT', '2020-05-12 16:02:13', 8, 1),
(35, 'teste 3.5', 'ILLUSTRATION', 'AJOUT', '2020-05-12 16:02:23', 8, 1),
(36, 'teste 4', 'ILLUSTRATION', 'AJOUT', '2020-05-12 16:03:08', 8, 1),
(37, 'teste 6', 'ILLUSTRATION', 'AJOUT', '2020-05-12 16:03:27', 8, 1),
(38, 'privé', 'CONFIDENTIALITE', 'MODIFICATION', '2020-05-12 16:48:51', 8, 1),
(39, 'Firewall dragon', 'ILLUSTRATION', 'AJOUT', '2020-05-12 16:52:06', 8, 1),
(40, 'teste ajax illustration 3', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-12 16:52:33', 8, 1),
(41, 'teste 6', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-12 16:52:39', 8, 1),
(42, 'teste 4', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-12 16:52:46', 8, 1),
(43, 'teste 3.5', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-12 16:52:51', 8, 1),
(44, 'teste 3', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-12 16:52:58', 8, 1),
(45, 'teste 2', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-12 16:53:04', 8, 1),
(46, 'teste', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-12 16:53:09', 8, 1),
(47, 'eux', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-12 16:53:14', 8, 1),
(48, 'toi', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-12 16:53:18', 8, 1),
(49, 'moi', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-12 16:53:24', 8, 1),
(50, 'teste ajax illustration 3', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-12 16:53:30', 8, 1),
(51, 'teste ajax illustration 3', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-12 16:53:36', 8, 1),
(52, '3', 'PLANCHE', 'SUPPRESSION', '2020-05-12 22:57:31', 8, 1),
(53, 'this is a tes', 'ILLUSTRATION', 'AJOUT', '2020-05-13 09:42:15', 9, 6),
(54, 'quelqu\'un', 'PERSONNAGE', 'AJOUT', '2020-05-13 09:44:13', 9, 6),
(55, 'X', 'ILLUSTRATION', 'AJOUT', '2020-05-13 09:45:45', 9, 6),
(56, 'public', 'CONFIDENTIALITE', 'MODIFICATION', '2020-05-13 14:53:26', 8, 1),
(57, 'teste e', 'ILLUSTRATION', 'AJOUT', '2020-05-13 18:28:45', 8, 1),
(58, 'terte', 'ILLUSTRATION', 'AJOUT', '2020-05-13 18:31:21', 8, 1),
(59, 'terte', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-13 18:31:35', 8, 1),
(60, 'teste e', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-13 18:31:39', 8, 1),
(61, 'autre teste', 'ILLUSTRATION', 'AJOUT', '2020-05-13 18:37:10', 8, 1),
(62, 'encore un teste', 'ILLUSTRATION', 'AJOUT', '2020-05-13 18:39:31', 8, 1),
(63, 'encore un teste', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-13 18:39:58', 8, 1),
(64, 'autre teste', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-13 18:40:02', 8, 1),
(65, 'moi', 'ILLUSTRATION', 'AJOUT', '2020-05-14 14:00:51', 8, 1),
(66, 'illustration 1', 'ILLUSTRATION', 'AJOUT', '2020-05-14 14:02:36', 8, 1),
(67, 'illustration 3', 'ILLUSTRATION', 'AJOUT', '2020-05-14 14:43:36', 8, 1),
(68, 'moi', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-14 15:00:59', 8, 1),
(69, 'illustration 4', 'ILLUSTRATION', 'AJOUT', '2020-05-14 15:02:14', 8, 1),
(70, 'illustration 5', 'ILLUSTRATION', 'AJOUT', '2020-05-14 15:03:27', 8, 1),
(71, 'illustration 6', 'ILLUSTRATION', 'AJOUT', '2020-05-14 15:03:56', 8, 1),
(72, 'illustration 3', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-14 15:04:17', 8, 1),
(73, 'illustration 1', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-14 15:04:23', 8, 1),
(74, 'illustration 7', 'ILLUSTRATION', 'AJOUT', '2020-05-14 15:05:56', 8, 1),
(75, 'illustration 8', 'ILLUSTRATION', 'AJOUT', '2020-05-14 15:07:49', 8, 1),
(76, '1', 'ILLUSTRATION', 'AJOUT', '2020-05-14 15:08:24', 8, 1),
(77, '1', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-14 15:10:32', 8, 1),
(78, '3', 'ILLUSTRATION', 'AJOUT', '2020-05-14 15:12:04', 8, 1),
(79, '4', 'ILLUSTRATION', 'AJOUT', '2020-05-14 15:15:17', 8, 1),
(80, '12', 'ILLUSTRATION', 'AJOUT', '2020-05-14 15:18:10', 8, 1),
(81, 'moi', 'ILLUSTRATION', 'AJOUT', '2020-05-14 15:24:02', 8, 1),
(82, 'moi', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-14 15:24:08', 8, 1),
(83, '12', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-14 15:24:12', 8, 1),
(84, '4', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-14 15:24:16', 8, 1),
(85, '3', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-14 15:24:21', 8, 1),
(86, 'monster', 'ILLUSTRATION', 'AJOUT', '2020-05-14 15:27:59', 8, 1),
(87, 'asdada', 'ILLUSTRATION', 'AJOUT', '2020-05-14 15:42:33', 8, 1),
(88, 'mot cle', 'TERME', 'AJOUT', '2020-05-14 15:44:54', 8, 1),
(89, 'illustration sans var', 'ILLUSTRATION', 'AJOUT', '2020-05-14 15:46:14', 8, 1),
(90, 'sans dataform', 'ILLUSTRATION', 'AJOUT', '2020-05-14 15:47:10', 8, 1),
(91, 'illustration sans var', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-14 15:47:22', 8, 1),
(92, 'asdada', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-14 15:47:29', 8, 1),
(93, 'monster', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-14 15:47:37', 8, 1),
(94, 'hahahaha', 'ILLUSTRATION', 'AJOUT', '2020-05-14 15:48:42', 8, 1),
(95, 'hahahaha', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-14 15:49:02', 8, 1),
(96, 'asdad', 'ILLUSTRATION', 'AJOUT', '2020-05-14 15:49:27', 8, 1),
(97, 'asdada', 'ILLUSTRATION', 'AJOUT', '2020-05-14 15:49:48', 8, 1),
(98, 'asdad', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-14 15:50:08', 8, 1),
(99, 'asdada', 'ILLUSTRATION', 'SUPPRESSION', '2020-05-14 15:50:13', 8, 1);

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
(33, 'Illustration 10', 'description', '60-603760_adventure-time-cartoon-network-iphone-8-wallpaper-adventure.jpg', 9),
(34, 'moi', '', 'Daniels_.JPG', 8),
(35, 'image', '', 'Daniels67f78b9fdbf4d615511be496c921f0f9.jpg', 8),
(40, 'teste ajax illustration 4', 'avec une description et une image', 'DanielsCapture d’écran (10).png', 8),
(41, 'teste ajax illustration final', 'verification du bug', 'DanielsCapture d’écran (54).png', 8),
(51, 'Firewall dragon', '', 'Daniels47989cb94837311a6707707e3bf7236d.jpg', 8),
(52, 'this is a tes', '', 'BlackZéroRoiSuprêmeduPortail-MACR-FR-SR-1E.jpg', 9),
(53, 'X', '', 'Blackd0f6cc250c466724992136933b9a9668.jpg', 9),
(61, 'illustration 4', 'description', 'Daniels0a020d6ee04dd848712e323edcde7876.jpg', 8),
(62, 'illustration 5', 'description', 'Daniels46566c886581d9fc3d3de4f52a8a9532.jpg', 8),
(63, 'illustration 6', 'description', 'Daniels00b712041c1721d6576d8e4d39d68c0e.jpg', 8),
(64, 'illustration 7', 'description', 'Daniels1b79c194119479a2ea82b8e36acfc1bf.jpg', 8),
(65, 'illustration 8', 'description', 'Daniels1ed2a78fd34e3f7920298d2f7f956728.jpg', 8),
(75, 'sans dataform', 'description', 'Daniels00af26324285341725b6994a137f4afd.jpg', 8);

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
(11, 9),
(12, 9);

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
(11, 'Kira Watson', '\"un personnage...\"', 'IMG_20191217_002246_822.JPG'),
(12, 'quelqu\'un', '', 'BlackBeautiful Illustrated Portraits by Janice Sung _ Inspiration Grid.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `planche`
--

CREATE TABLE `planche` (
  `id_planche` int(11) NOT NULL,
  `image_planche` varchar(100) NOT NULL,
  `numero_planche` int(11) NOT NULL,
  `id_chapitre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `planche`
--

INSERT INTO `planche` (`id_planche`, `image_planche`, `numero_planche`, `id_chapitre`) VALUES
(1, 'Daniels789c976b652f3464858d8569acf1deab.jpg', 4, 51),
(2, 'Daniels5d749fcdbb2e1c4386341d3593f82225.jpg', 1, 51),
(4, 'Daniels576e9fb450fd7caac64359b5d4afe3e5.jpg', 2, 51);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id_projet` int(11) NOT NULL,
  `titre_projet` varchar(50) DEFAULT NULL,
  `description_projet` text DEFAULT NULL,
  `image_projet` varchar(100) DEFAULT NULL,
  `visibilite` varchar(30) CHARACTER SET utf32 NOT NULL DEFAULT 'public',
  `id_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `titre_projet`, `description_projet`, `image_projet`, `visibilite`, `id_utilisateur`) VALUES
(8, 'Spiritual Cross', 'Une histoire de templiers...', 'Daniels2ec03f7032506f873deedfa00984286b.jpg', 'public', 1),
(9, 'Book Of Death', 'L\'histoire d\'une jeune fille qui voulait juste avoir une famille...', 'Black6b15ab81c36b8d1738f30d1a9359733f.jpg', 'public', 6),
(10, 'Cross of GOD', NULL, NULL, 'public', 6),
(11, 'Spiritual Cross', NULL, NULL, 'public', 6),
(12, 'HistoriA', 'ceci est le synopsis de cette histoire', 'Black5ee12175b06da7968996f6929a898874.jpg', 'public', 6),
(13, 'Mon projet', NULL, NULL, 'privé', 1);

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
(13, 1, 6),
(14, 1, 17),
(18, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `suivre_projet`
--

CREATE TABLE `suivre_projet` (
  `id_suivre` int(11) NOT NULL,
  `id_projet` int(11) DEFAULT NULL,
  `id_abonne` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `suivre_projet`
--

INSERT INTO `suivre_projet` (`id_suivre`, `id_projet`, `id_abonne`) VALUES
(6, 9, 6),
(7, 11, 1),
(8, 8, 17),
(9, 9, 1);

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
(8, 'Ange de la mort', '\"Un terme...\"'),
(9, 'mot cle', 'c\'est un mot cle');

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
(17, 'Erik', 'ericleblanc4444@gmail.com', '931996', 'Dessinateur', 'Erik00qMahP.jpg', 0);

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
-- Index pour la table `aimer_projet`
--
ALTER TABLE `aimer_projet`
  ADD PRIMARY KEY (`id_aimer`);

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
-- Index pour la table `planche`
--
ALTER TABLE `planche`
  ADD PRIMARY KEY (`id_planche`);

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
-- Index pour la table `suivre_projet`
--
ALTER TABLE `suivre_projet`
  ADD PRIMARY KEY (`id_suivre`);

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
-- AUTO_INCREMENT pour la table `aimer_projet`
--
ALTER TABLE `aimer_projet`
  MODIFY `id_aimer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `chapitre`
--
ALTER TABLE `chapitre`
  MODIFY `id_chapitre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `creature`
--
ALTER TABLE `creature`
  MODIFY `id_creature` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `historique`
--
ALTER TABLE `historique`
  MODIFY `id_modif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT pour la table `illustration`
--
ALTER TABLE `illustration`
  MODIFY `id_illustration` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT pour la table `lieu`
--
ALTER TABLE `lieu`
  MODIFY `id_lieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `personnage`
--
ALTER TABLE `personnage`
  MODIFY `id_personnage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `planche`
--
ALTER TABLE `planche`
  MODIFY `id_planche` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `suivre`
--
ALTER TABLE `suivre`
  MODIFY `id_suivi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `suivre_projet`
--
ALTER TABLE `suivre_projet`
  MODIFY `id_suivre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `terme`
--
ALTER TABLE `terme`
  MODIFY `id_terme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
