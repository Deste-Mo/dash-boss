-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 29 juin 2024 à 07:28
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

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
  `comment_id` int(11) NOT NULL,
  `comment_mail` varchar(250) NOT NULL,
  `comment_name` varchar(250) DEFAULT NULL,
  `comment_message` text DEFAULT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE `contrat` (
  `contrat_id` int(11) NOT NULL,
  `clients_id` int(11) NOT NULL,
  `paiement_id` int(11) NOT NULL,
  `debut_contrat` date NOT NULL,
  `fin_contrat` date DEFAULT NULL
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
(1, 'alexis', 'admin123', '0340854816', 'adalelalexis@gmail.com'),
(2, 'emmanuel', '0192023a7bbd73250516f069df18b500', '0340854816', 'emmanuel@gmail.com');

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
  `photo` varchar(50) NOT NULL DEFAULT 'logo.png',
  `email` varchar(50) NOT NULL,
  `date_enregistrement` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`cin`, `nom`, `prenom`, `telephone`, `photo`, `email`, `date_enregistrement`) VALUES
(324323423441, 'Madia', 'Marx', '1234567892', '667ecc466186eIMG__201710286__125203.jpg', 'email3@example.com', '2024-06-28 14:46:14'),
(10000000000002, 'mamy', 'Nomena', '1234567891', '667ec4fe55c50IMG__201610279__120143.jpg', 'email2@example.com', '2024-06-28 14:13:18'),
(10000000000006, 'Nom6', 'Prenom6', '1234567895', 'logo.png', 'email6@example.com', '2024-06-24 19:09:45'),
(10000000000007, 'Nom7', 'Prenom7', '1234567896', 'logo.png', 'email7@example.com', '2024-06-24 19:09:45'),
(10000000000008, 'Nom8', 'Prenom8', '1234567897', 'logo.png', 'email8@example.com', '2024-06-24 19:09:45'),
(10000000000009, 'Nom9', 'Prenom9', '1234567898', 'logo.png', 'email9@example.com', '2024-06-24 19:09:45'),
(10000000000010, 'Nom10       ', 'Prenom10', '1234567899', 'IMG_20170110_063415.jpg', 'email10@example.com', '2024-06-25 03:30:48'),
(10000000000040, 'Andry', 'Jean', '1234567890', 'logo.png', 'email1@example.com', '2024-06-27 09:34:56');

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
  `nomP` varchar(100) NOT NULL,
  `N_pro` int(10) NOT NULL DEFAULT 0,
  `dateDeb` timestamp NULL DEFAULT current_timestamp(),
  `dateFin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `projetpersonnel`
--

CREATE TABLE `projetpersonnel` (
  `id` int(10) NOT NULL,
  `idProjet` int(10) NOT NULL,
  `cin` bigint(14) NOT NULL,
  `idPoste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE `tache` (
  `tache_id` int(11) NOT NULL,
  `tache_nom` text DEFAULT NULL,
  `cin` bigint(14) DEFAULT NULL,
  `etat` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`tache_id`, `tache_nom`, `cin`, `etat`) VALUES
(21, 'Préparer le rapport financier', NULL, 'F'),
(22, 'Organiser la réunion d\'équipe', 10000000000040, 'F'),
(23, 'Mettre à jour le site web', NULL, 'F'),
(24, 'Répondre aux emails des clients', 10000000000007, 'F'),
(25, 'Planifier la campagne marketing', NULL, 'F'),
(26, 'Analyser les données de vente', NULL, 'F'),
(27, 'Rédiger le communiqué de presse', 10000000000002, 'F'),
(28, 'Superviser le projet de développement', 10000000000008, 'F'),
(29, 'Effectuer la maintenance du serveur', 10000000000008, 'F'),
(30, 'Former les nouveaux employés', 10000000000009, 'F'),
(31, 'gfvsntvdsd', NULL, 'F'),
(32, 'tuer laurena', 10000000000007, 'F'),
(33, 'tuer laurena', NULL, 'F'),
(34, 'tuer laurena', NULL, 'F'),
(35, 'Manger de la tarte', 10000000000040, 'F'),
(36, 'Chercher du tacos', 10000000000040, 'F'),
(37, 'Dormir 3 heures', NULL, 'F'),
(38, 'Trouver une femme', 10000000000040, 'F'),
(39, 'tuer laurena', 10000000000008, 'F'),
(40, 'vdfvdfvdf', 10000000000008, 'F'),
(41, 'vdfvdfvdf', 10000000000008, 'F'),
(42, 'dssdfsdf', NULL, 'F'),
(43, 'asdsada', NULL, 'F'),
(44, 'gfvsntvdsd', NULL, 'F'),
(45, 'tuer laurena', NULL, 'F'),
(46, 'tuer laurena', 10000000000007, 'F'),
(47, 'asdsada', 10000000000007, 'F'),
(48, 'tuer laurena', 10000000000040, 'F'),
(49, 'tuer laurena', 10000000000040, 'F'),
(50, 'asdsada', 10000000000040, 'F'),
(51, 'tuer laurena', NULL, 'F'),
(52, 'tuer laurena', 10000000000002, 'F'),
(53, 'csdcsdc', NULL, 'L');

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
-- Index pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD PRIMARY KEY (`contrat_id`),
  ADD KEY `clients_id` (`clients_id`),
  ADD KEY `paiement_id` (`paiement_id`);

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
  ADD PRIMARY KEY (`N_pro`);

--
-- Index pour la table `projetpersonnel`
--
ALTER TABLE `projetpersonnel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cin` (`cin`),
  ADD KEY `idPoste` (`idPoste`),
  ADD KEY `idProjet` (`idProjet`);

--
-- Index pour la table `tache`
--
ALTER TABLE `tache`
  ADD PRIMARY KEY (`tache_id`),
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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `contrat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `paiement_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `poste`
--
ALTER TABLE `poste`
  MODIFY `poste_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `projetpersonnel`
--
ALTER TABLE `projetpersonnel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tache`
--
ALTER TABLE `tache`
  MODIFY `tache_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `contrat_ibfk_1` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`clients_id`),
  ADD CONSTRAINT `contrat_ibfk_2` FOREIGN KEY (`paiement_id`) REFERENCES `paiement` (`paiement_id`);

--
-- Contraintes pour la table `postepersonnel`
--
ALTER TABLE `postepersonnel`
  ADD CONSTRAINT `postepersonnel_ibfk_2` FOREIGN KEY (`poste_id`) REFERENCES `poste` (`poste_id`),
  ADD CONSTRAINT `postepersonnel_ibfk_3` FOREIGN KEY (`cin`) REFERENCES `personnel` (`cin`);

--
-- Contraintes pour la table `projetpersonnel`
--
ALTER TABLE `projetpersonnel`
  ADD CONSTRAINT `projetpersonnel_ibfk_1` FOREIGN KEY (`cin`) REFERENCES `personnel` (`cin`),
  ADD CONSTRAINT `projetpersonnel_ibfk_2` FOREIGN KEY (`idPoste`) REFERENCES `poste` (`poste_id`),
  ADD CONSTRAINT `projetpersonnel_ibfk_3` FOREIGN KEY (`idProjet`) REFERENCES `projet` (`N_pro`);

--
-- Contraintes pour la table `tache`
--
ALTER TABLE `tache`
  ADD CONSTRAINT `tache_ibfk_1` FOREIGN KEY (`cin`) REFERENCES `personnel` (`cin`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
