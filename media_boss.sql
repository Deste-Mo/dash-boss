-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 08 juil. 2024 à 11:48
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `media_boss`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `clients_id` int(11) NOT NULL,
  `clients_nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(10) NOT NULL,
  `comment_mail` varchar(250) NOT NULL,
  `comment_name` varchar(250) DEFAULT NULL,
  `comment_message` text DEFAULT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(2) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `idLogin` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  `numTel` char(15) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`idLogin`, `user`, `mot_de_passe`, `numTel`, `mail`) VALUES
(4, 'admin', '0192023a7bbd73250516f069df18b500', '0332571312', 'modestep20.aps1a@gmail.com'),
(5, 'RaFaI', 'admin2408@#', '0383777022', 'morasata9@gmail.com'),
(6, 'Jules', 'Jules123', '03341044846', 'njcam@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `paiement_id` int(11) NOT NULL,
  `t_paiement` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE `personnel` (
  `cin` bigint(14) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `photo` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_enregistrement` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `qualif` varchar(100) NOT NULL,
  `lienProfile` text NOT NULL,
  `description` text NOT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`cin`, `nom`, `prenom`, `telephone`, `photo`, `email`, `date_enregistrement`, `qualif`, `lienProfile`, `description`, `password`) VALUES
(108111040764, 'RANDRIAMORASATA', 'Fandreseko Ismael', '0383777022', '66869f2b572df310691222_623177765918982_4241519868680315985_n.jpg', 'morasata9@gmail.com', '2024-07-05 09:04:24', 'Developpeur', '', '', '0192023a7bbd73250516f069df18b500'),
(111111111111, 'RALAIVOAVY', 'Natanael', '0388732917', '6686a11daa1ac7dc135e1-5dc3-41e8-acfd-badb154a9c87.jpg', 'ralaivoavy.natanael@gmail.com', '2024-07-05 09:04:25', 'Developpeur', 'https://nathanrael-portfolio.netlify.app', '', '0192023a7bbd73250516f069df18b500'),
(123451234567, 'ADOLPHE', 'Alexis Emmanuel', '0340854816', '66869b91239db20220923_141756 (2).jpg', 'adalelalexis@gmail.com', '2024-07-05 09:04:25', 'Developpeur', '', '', '0c909a141f1f2c0a1cb602b0b2d7d050'),
(201011032461, 'RAZAFITSOTRA', 'Toslin', '0380525383', '6686a1256e166448095222_122094719018366032_7418335717656708534_n.jpg', 'razaifitosy@gmail.com', '2024-07-05 09:04:25', 'Developpeur', '', '', '5c29aa8caace7f4fd33f55c2700220e1'),
(201012034181, 'RAHARISOA ', 'Haingonirina', '0345393880', '66869c0abed81759d26ad-fa34-43d6-a695-73608c474b84.jpg', 'haingonirina301@gmail.com', '2024-07-05 09:04:25', 'Developpeur', '', '', '0192023a7bbd73250516f069df18b500'),
(201031055518, 'HARITSOA', 'Maminiaina José', '0385984933', 'logo.png', 'jomaminiaina02@gmail.com', '2024-07-05 10:05:23', 'AdminSys et Reseau', '', '', '7e3de39c6f3ffdffaa9b140a2da339ab'),
(201051018761, 'RAVALOARIMANANA', 'Koloina Elie', '0342571374', 'logo.png', 'koloinaelie25@gmail.com', '2024-07-05 10:22:11', 'Developpeur', '', '', 'ad5c2d06127b26032575bbb9df6d9c11'),
(201091014574, 'ANDRIANANDRASANA', 'Miarantsoa Freddy Tollard', '0347697133', '6686a14c0a8b0Round Photo_Jun172024_084307.png', 'miarantsoatollard@gmail.com', '2024-07-05 09:04:25', 'Developpeur', 'https://www.facebook.com/profile.php?id=100082042398350', '', '0192023a7bbd73250516f069df18b500'),
(203011040781, 'RAMANANTSOA', 'hedzo', '0348112209', '6687d80403cd6istockphoto-1558174792-1024x1024.jpg', 'hedzoramanantsoa@gmail.com', '2024-07-05 11:24:52', 'Developpeur', '', '', 'bef074ca218c8c828302c40405efb0b9'),
(212011013026, 'NIRINA TOLOJANAHARY', 'Jacques Albin Jean Modeste', '0332571312', '66869ebc8b926422965606_1304317010246892_5799594502989605655_n.jpg', 'modestep20.aps1a@gmail.com', '2024-07-05 09:04:25', 'Developpeur', 'https://www.facebook.com/DesteMo.jam', '', '0192023a7bbd73250516f069df18b500'),
(272111111675, 'RAHARISON', 'Marolahy Jean Ruffin', '0346109678', '6686a084ad120IMG_20240614_102250.jpg', 'rmarolahyjeanruffin@gmail.com', '2024-07-05 09:04:25', 'Developpeur', 'http//www.facebook.com/profile.php?id=100075922060510', '', '0192023a7bbd73250516f069df18b500'),
(512011021704, 'RAHARITOJONIAINA', 'Fehizoro Aphonse', '0384829719', '6687d829d3c4aeverton-vila-AsahNlC0VhQ-unsplash.jpg', 'raharitojoniaiana@gmail.com', '2024-07-05 11:25:29', 'AdminSys et Reseau', '', '', '95a16d8c680fc622f69414ac20ae8c9a');

-- --------------------------------------------------------

--
-- Structure de la table `portfolio`
--

CREATE TABLE `portfolio` (
  `portfolioId` int(10) NOT NULL,
  `portfolioName` char(30) NOT NULL,
  `portfolioDesc` text NOT NULL,
  `portfolioImageUrl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `portfolio`
--

INSERT INTO `portfolio` (`portfolioId`, `portfolioName`, `portfolioDesc`, `portfolioImageUrl`) VALUES
(1, 'Web application', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.', 'jason-goodman-bzqU01v-G54-unsplash.jpg'),
(2, 'Web application', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.', 'jason-goodman-bzqU01v-G54-unsplash.jpg'),
(3, 'Web application', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.', 'jason-goodman-bzqU01v-G54-unsplash.jpg'),
(4, 'Mobile app', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.', 'brooke-cagle--uHVRvDr7pg-unsplash.jpg'),
(5, 'Mobile app', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.', 'brooke-cagle--uHVRvDr7pg-unsplash.jpg'),
(6, 'Mobile app', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.', 'brooke-cagle--uHVRvDr7pg-unsplash.jpg'),
(7, 'Desktop app', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.', 'smartworks-coworking-cW4lLTavU80-unsplash.jpg'),
(8, 'Desktop app', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.', 'smartworks-coworking-cW4lLTavU80-unsplash.jpg'),
(9, 'Desktop app', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.', 'smartworks-coworking-cW4lLTavU80-unsplash.jpg'),
(10, 'Mobile app', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.', 'brooke-cagle--uHVRvDr7pg-unsplash.jpg'),
(11, 'Desktop app', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.', 'smartworks-coworking-cW4lLTavU80-unsplash.jpg'),
(12, 'Desktop app', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.', 'smartworks-coworking-cW4lLTavU80-unsplash.jpg'),
(13, 'Desktop app', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.', 'smartworks-coworking-cW4lLTavU80-unsplash.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

CREATE TABLE `poste` (
  `poste_id` int(11) NOT NULL,
  `poste_nom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `postepersonnel`
--

CREATE TABLE `postepersonnel` (
  `cin` bigint(14) DEFAULT NULL,
  `poste_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `N_pro` int(10) NOT NULL,
  `id_chef` bigint(14) DEFAULT NULL,
  `nomP` varchar(100) NOT NULL,
  `dateDeb` timestamp NULL DEFAULT current_timestamp(),
  `dateFin` date DEFAULT NULL,
  `duree` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`N_pro`, `id_chef`, `nomP`, `dateDeb`, `dateFin`, `duree`) VALUES
(11, 212011013026, 'Media Boss', '2024-07-04 12:57:13', NULL, 4),
(13, 212011013026, 'FRONT TRANSPORT', '2024-07-04 13:07:21', NULL, 5),
(14, 201031055518, 'Serveur', '2024-07-05 09:58:46', NULL, 30),
(15, 201051018761, 'Site Nj-cam', '2024-07-05 10:26:41', NULL, 60);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `serviceId` int(10) NOT NULL,
  `serviceName` char(30) NOT NULL,
  `serviceDesc` text NOT NULL,
  `serviceImageUrl` text NOT NULL,
  `serviceRedirect` char(30) NOT NULL,
  `serviceIconName` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE `tache` (
  `tache_id` int(11) NOT NULL,
  `id_projet` int(10) DEFAULT NULL,
  `cin` bigint(14) DEFAULT NULL,
  `tache_nom` text DEFAULT NULL,
  `duree` varchar(50) DEFAULT NULL,
  `etat` char(1) DEFAULT 'N',
  `dateDeb` timestamp NULL DEFAULT NULL,
  `dateFin` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`tache_id`, `id_projet`, `cin`, `tache_nom`, `duree`, `etat`, `dateDeb`, `dateFin`) VALUES
(65, 11, 111111111111, 'Services Front', '3', 'E', '2024-07-04 13:20:00', NULL),
(66, 11, 201012034181, 'Redaction Web', '3', 'E', '2024-07-04 13:24:11', NULL),
(67, 11, 212011013026, 'Recherche', '3', 'E', '2024-07-04 13:11:55', NULL),
(68, 11, 123451234567, 'Notification', '3', 'F', '2024-07-04 13:02:52', '2024-07-04 13:02:54'),
(69, 11, 201011032461, 'Gestion Membres', '3', 'F', '2024-07-04 13:04:55', '2024-07-04 13:04:56'),
(70, 11, 123451234567, 'Gestions Projets', '3', 'F', '2024-07-04 13:04:55', '2024-07-04 13:05:03'),
(72, 13, 123451234567, 'Login', '5', 'E', '2024-07-04 13:17:56', NULL),
(73, 13, 123451234567, 'Signup', '5', 'E', '2024-07-04 13:18:03', NULL),
(74, 13, 201011032461, 'Page Offre', '5', 'E', '2024-07-04 13:23:43', NULL),
(75, 13, 108111040764, 'Pages Profil', '5', 'E', '2024-07-04 13:23:30', NULL),
(76, 13, 272111111675, 'Discussion', '5', 'E', '2024-07-04 13:24:03', NULL),
(77, 11, 201011032461, 'Controle Champs', '2', 'F', '2024-07-04 13:19:58', '2024-07-04 13:20:02'),
(78, 13, 201012034181, 'publication d\'offre', '5', 'E', '2024-07-04 13:20:09', NULL),
(79, 11, 201011032461, 'Accueil', '3', 'F', '2024-07-04 13:20:46', '2024-07-04 13:20:56'),
(80, 13, 212011013026, 'notification', '5', 'E', '2024-07-04 13:27:43', NULL),
(82, 13, 201091014574, 'Navbar Header', '5', 'E', '2024-07-04 13:27:23', NULL),
(85, 13, 111111111111, 'Pages Amis', '5', 'E', '2024-07-04 13:41:24', NULL),
(87, 13, 123451234567, 'tat ta', '5', 'F', '2024-07-05 08:57:53', '2024-07-05 08:58:04'),
(88, 11, NULL, 'Config route', '5', 'N', NULL, NULL),
(89, 11, NULL, 'z-index', '5', 'N', NULL, NULL),
(90, 14, NULL, 'Phases de test', '5', 'N', NULL, NULL),
(91, 14, NULL, 'installation centos', '5', 'N', NULL, NULL),
(95, 15, NULL, 'login + achat', '5', 'N', NULL, NULL),
(96, 15, NULL, 'back login ', '10', 'N', NULL, NULL),
(97, 15, NULL, 'back achat', '15', 'N', NULL, NULL),
(98, 15, 108111040764, 'Finition front & back', '20', 'F', '2024-07-05 11:32:31', '2024-07-05 11:32:35');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clients_id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLogin`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`paiement_id`);

--
-- Index pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`cin`);

--
-- Index pour la table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolioId`);

--
-- Index pour la table `poste`
--
ALTER TABLE `poste`
  ADD PRIMARY KEY (`poste_id`);

--
-- Index pour la table `postepersonnel`
--
ALTER TABLE `postepersonnel`
  ADD KEY `poste_id` (`poste_id`),
  ADD KEY `cin` (`cin`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`N_pro`),
  ADD KEY `projet_ibfk_1` (`id_chef`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceId`);

--
-- Index pour la table `tache`
--
ALTER TABLE `tache`
  ADD PRIMARY KEY (`tache_id`),
  ADD KEY `tache_ibfk_2` (`id_projet`),
  ADD KEY `tache_ibfk_1` (`cin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `clients_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `paiement_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolioId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `poste`
--
ALTER TABLE `poste`
  MODIFY `poste_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `N_pro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `serviceId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tache`
--
ALTER TABLE `tache`
  MODIFY `tache_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `postepersonnel`
--
ALTER TABLE `postepersonnel`
  ADD CONSTRAINT `postepersonnel_ibfk_2` FOREIGN KEY (`poste_id`) REFERENCES `poste` (`poste_id`),
  ADD CONSTRAINT `postepersonnel_ibfk_3` FOREIGN KEY (`cin`) REFERENCES `personnel` (`cin`);

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `projet_ibfk_1` FOREIGN KEY (`id_chef`) REFERENCES `personnel` (`cin`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `tache`
--
ALTER TABLE `tache`
  ADD CONSTRAINT `tache_ibfk_1` FOREIGN KEY (`cin`) REFERENCES `personnel` (`cin`) ON DELETE SET NULL,
  ADD CONSTRAINT `tache_ibfk_2` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`N_pro`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
