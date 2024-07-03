-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 03 juil. 2024 à 08:15
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
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(2) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_mail`, `comment_name`, `comment_message`, `comment_date`, `status`) VALUES
(35, 'razafitosy@gmail.com', 'Toslin', 'adaaasca', '2024-07-01 16:42:25', 'V'),
(36, 'razafitosy@gmail.com', 'Toslin', 'fdsfasfa', '2024-07-01 16:46:48', 'V'),
(37, 'razafitosy@gmail.com', 'Toslin', 'rfsfqffas', '2024-07-01 16:47:04', 'V'),
(38, 'razafitosy@gmail.com', 'Toslin', 'sgdgsdgaga', '2024-07-01 16:50:10', 'V'),
(39, 'adalelalexis@gmail.com', 'Emmanuel', 'sfvvasva ', '2024-07-01 16:53:56', 'V'),
(40, 'emmanuel@gmail.com', 'Emmanuel ADOLPHE', 'saffasfa', '2024-07-01 16:58:06', 'V'),
(41, 'razafitosy@gmail.com', 'Toslin', 'dzbadbvs sdvbsdbvsdb', '2024-07-01 17:03:12', 'V'),
(42, 'razafitosy@gmail.com', 'Toslin', 'caascas', '2024-07-01 17:15:18', 'V'),
(43, 'razafitosy@gmail.com', 'Toslin', 'abvADVA', '2024-07-01 17:51:18', 'V'),
(44, 'adalelalexis@gmail.com', 'Emmanuel', 'nvbncvx xcb h/n gvh/b;', '2024-07-01 18:11:27', 'V'),
(45, 'razafitosy@gmail.com', 'Toslin', 'dvsgebf vwegfqsfq', '2024-07-02 05:51:46', 'V'),
(46, 'emmanuel@gmail.com', 'Emmanuel ADOLPHE', 'fwefgetrgqeb wgeffgqwfsa', '2024-07-02 05:54:19', 'V'),
(47, 'dentiste1@gmail.com', 'Toslin', 'asccwhtebvb wrbfdvs', '2024-07-02 06:08:32', 'V'),
(48, 'adalelalexis@gmail.com', 'Emmanuel', 'ohcdjkc cuonc;scab ciansc;kasc', '2024-07-02 07:32:02', 'V'),
(49, 'razafitosy@gmail.com', 'Toslin', 'vsdvssd vsvsdvs', '2024-07-02 07:38:48', 'V'),
(50, 'adalelalexis@gmail.com', 'Emmanuel', 'dvagvzd  vavavd ', '2024-07-02 07:50:54', 'V'),
(51, 'haingonirina301@gmail.com', 'Haingonirina RAHARISOA', 'hello jjjjj', '2024-07-02 07:44:08', 'V'),
(52, 'fgfgfg', 'ffg', '', '2024-07-02 07:50:55', 'V'),
(53, '', '', ' ', '2024-07-02 07:44:50', 'V'),
(54, 'razafitosy@gmail.com', 'Toslin', 'Hano tay', '2024-07-02 07:46:30', 'V'),
(55, 'razafitosy@gmail.com', 'Toslin', 'salut', '2024-07-02 12:02:46', 'V');

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
(2, 'emmanuel', '0192023a7bbd73250516f069df18b500', '0340854816', 'emmanuel@gmail.com'),
(3, 'toslin', 'f9cda19fd0c31dd97c1547230a7951b2', '0340854816', 'razafytosy@gmail.com');

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
  `date_enregistrement` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `qualif` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`cin`, `nom`, `prenom`, `telephone`, `photo`, `email`, `date_enregistrement`, `qualif`) VALUES
(100000000008, 'Nom', 'Prenom', '1234567899', '6682cc6a38968IMG__201710286__125203.jpg', 'email10@example.com', '2024-07-01 15:34:02', ''),
(324323423442, 'Madia', 'Marx', '1234567892', '667ecc466186eIMG__201710286__125203.jpg', 'email3@example.com', '2024-07-01 15:33:09', ''),
(10000000000002, 'mamy', 'Nomena', '1234567891', '667ec4fe55c50IMG__201610279__120143.jpg', 'email2@example.com', '2024-06-28 14:13:18', ''),
(10000000000009, 'Nom9', 'Prenom9', '1234567898', 'logo.png', 'email9@example.com', '2024-06-24 19:09:45', ''),
(10000000000010, 'Nom10       ', 'Prenom10', '1234567899', 'IMG_20170110_063415.jpg', 'email10@example.com', '2024-06-25 03:30:48', '');

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
(4, NULL, 'EMIT efwwefw', '2024-07-02 22:22:11', NULL, 40),
(5, NULL, 'nsdkvsd', '2024-07-03 05:40:05', NULL, 15),
(6, 324323423442, 'Media Trans', '2024-07-03 05:53:11', NULL, 2);

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
(45, 4, NULL, 'EMIT efwwefw', '5', 'N', NULL, NULL),
(46, 5, NULL, 'EMIT efwwefw', '6', 'N', NULL, NULL),
(47, 5, NULL, 'haingonirina', '7', 'N', NULL, NULL),
(48, 6, NULL, 'Design', '5', 'N', NULL, NULL);

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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `N_pro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tache`
--
ALTER TABLE `tache`
  MODIFY `tache_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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
