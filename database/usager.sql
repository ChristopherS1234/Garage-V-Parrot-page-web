-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 18 fév. 2024 à 13:19
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `usager`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `is_ban` tinyint(1) NOT NULL DEFAULT 0,
  `role` varchar(100) NOT NULL COMMENT 'réparation,achat',
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `name`, `email`, `phone`, `pass`, `is_ban`, `role`, `created_at`) VALUES
(1, 'Test1', 'testclient1@gmail.co', '0611223344', 'Testclient123', 0, 'reparation', '2024-02-13'),
(2, 'test2', 'test2@gmail.com', '0611223344', 'Clienttest123456', 0, '', '2024-02-14');

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `is_ban` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=unban,1=ban',
  `role` varchar(100) NOT NULL COMMENT 'vendeur,reparateur,reparateur-vendeur',
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `phone`, `pass`, `is_ban`, `role`, `created_at`) VALUES
(1, 'Test', 'test@gmail.com', '0611223344', 'Testtest123456', 1, 'reparateur-vendeur', '2024-02-13'),
(2, 'Test 2', 'test2@gmail.com', '0611223344', 'Testtest987654', 1, '', '2024-02-13'),
(3, 'Test3', 'test3@gmail.com', '0611223344', 'Testtest123456', 0, 'reparateur-vendeur', '2024-02-13'),
(4, 'Test4', 'test4@gmail.com', '0611223344', 'Tetsmotdepasse', 0, 'vendeur', '2024-02-13');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `small_description` text DEFAULT NULL,
  `meta_description` varchar(1000) DEFAULT NULL,
  `meta_keyword` varchar(1000) DEFAULT NULL,
  `email1` varchar(100) DEFAULT NULL,
  `email2` varchar(100) DEFAULT NULL,
  `phone1` varchar(50) DEFAULT NULL,
  `phone2` varchar(50) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `titre`, `slug`, `small_description`, `meta_description`, `meta_keyword`, `email1`, `email2`, `phone1`, `phone2`, `address`) VALUES
(1, 'Garage V Parrot', 'www.GarrageVparrot.fr', 'Le Garage V est avotre disposion, appelez nous a notre numéro afin qu\'un conseillé qui prenne note de vos besoins.', 'Le Garage V.Parrot est un garage qui a ouvert ses porte à Toulouse en 2021 <br>\r\nOn propose une large gamme de services étant la réparation <br>\r\nde la carroserie et de la mécanique des voiture ainsi que <br>\r\nleur entretien régulier pour garantir leur performance et leur sécurité.', 'lun: 08:45-12:00,14:00-18:00 <br>\r\nmar: 08:45-12:00,14:00-18:00 <br>\r\n mer: 08:45-12:00,14:00-18:00 <br>\r\njeu: 08:45-12:00,14:00-18:00 <br>\r\nven: 08:45-12:00,14:00-18:00 <br>\r\nsam: 08:45-12:00,14:00-18:00 <br>\r\ndim: Fermé', 'adminvparrot@gmail.com', 'adminvparrot2@gmail.com', '0611223344', '061122334455', '1 Rue Garage');

-- --------------------------------------------------------

--
-- Structure de la table `ventes`
--

CREATE TABLE `ventes` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `small_description` varchar(500) DEFAULT NULL,
  `long_description` mediumtext DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `slug` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ventes`
--

INSERT INTO `ventes` (`id`, `name`, `small_description`, `long_description`, `image`, `slug`) VALUES
(1, 'OPEL CORSA 1.3 CDTI 75 CH DIESEL', 'Année:2008 <br>\r\nDiesel <br>\r\n177220 km', 'OPEL CORSA 1.3 CDTI 75 CH DIESEL', './img/1708095644.jpg', 'opel-corsa-1.3-cdti-75-ch-diesel'),
(2, 'LAND ROVER FREELANDER SX 112CH 4X4', 'Année:2001 <br>\r\n Diesel <br>\r\n184200 km', 'LAND ROVER FREELANDER SX 112CH 4X4', './img/1708095223.jpg', 'land-rover-freelander-sx-112ch-4x4'),
(3, 'VOLKSWAGEN POLO 1.6 TDI 75CH', 'Année:2010 <br>Diesel <br>177261 km', 'VOLKSWAGEN POLO 1.6 TDI 75CH', './img/1708095306.jpg', 'volkswagen-polo-1.6-tdi-75ch');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ventes`
--
ALTER TABLE `ventes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `ventes`
--
ALTER TABLE `ventes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
