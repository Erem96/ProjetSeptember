-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 28 août 2021 à 22:06
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gameshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `ID_article` int(11) NOT NULL,
  `titre` varchar(200) DEFAULT NULL,
  `prix_en_euro` float DEFAULT NULL,
  `description_article` varchar(500) DEFAULT NULL,
  `chemin_image` varchar(200) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `console` varchar(50) DEFAULT NULL,
  `annee_de_sortie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`ID_article`, `titre`, `prix_en_euro`, `description_article`, `chemin_image`, `genre`, `console`, `annee_de_sortie`) VALUES
(11, 'Mario', 25, 'Its-a-me!', 'Mario.jpg', 'action', 'Nes64', 1987),
(12, 'Luigi', 15, 'Presque aussi bon que Mario', 'Luigi.png', 'action', 'Nes64', 1988),
(13, 'Minecraft', 25, 'Please diamond!', 'Cobblestone.png', 'SandBox', 'PC', 2005);

-- --------------------------------------------------------

--
-- Structure de la table `article_souhaite`
--

CREATE TABLE `article_souhaite` (
  `Identifiant` int(11) NOT NULL,
  `ID_article` int(11) DEFAULT NULL,
  `ID_client` int(11) DEFAULT NULL,
  `QTT` int(11) DEFAULT NULL,
  `achete` bit(1) DEFAULT NULL,
  `ID_commande` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `ID_client` int(11) NOT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `mot_de_passe` varchar(50) DEFAULT NULL,
  `adresse_mail` varchar(100) DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comptes`
--

INSERT INTO `comptes` (`ID_client`, `pseudo`, `mot_de_passe`, `adresse_mail`, `statut`) VALUES
(1, 'alexisa', '21101994', 'Alexis@gmail.com', 'admin'),
(2, 'carnie', 'MDP1', 'Carnie@gmail.com', 'Carnie@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ID_article`);

--
-- Index pour la table `article_souhaite`
--
ALTER TABLE `article_souhaite`
  ADD PRIMARY KEY (`Identifiant`);

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`ID_client`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `ID_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `article_souhaite`
--
ALTER TABLE `article_souhaite`
  MODIFY `Identifiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `ID_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
