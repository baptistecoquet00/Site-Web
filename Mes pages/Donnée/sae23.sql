-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 16 avr. 2023 à 20:47
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae23`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `Nom_article` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `Nom_article`) VALUES
(1, 'Pantalon'),
(2, 'T_shirt');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `prix` float NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `img`, `prix`, `nom`) VALUES
(1, 't-shirt.png', 15.99, 'T-shirt bleu'),
(2, 'pantalon.jpg', 15.99, 'Pantalon bege'),
(3, 'chaussures.jpg', 76.99, 'chaussures marrons'),
(4, 'manteau.png', 35.99, 'Manteau vert '),
(5, 'jogging.png', 17.99, 'Jogging gris'),
(6, 'joggingnoir.png', 17.99, 'Jogging noir'),
(7, 'manteau_bleu.png', 35.99, 'Manteau bleu'),
(8, 'jean-slim-brut.jpg', 17.99, 'Jean'),
(9, 'chaussures_noires.jpg', 76.89, 'chaussures noires'),
(10, 'pantalon-large-rouge-femme.jpg', 35.99, 'Pantalon rouge large'),
(11, 't-shirt_orange.png', 15.99, 'T-shirt orange'),
(12, 'jeans_dechires.png', 27.99, 'Jean Déchiré'),
(13, 'manteau_marron.jpg', 40.99, 'Manteau marron');

-- --------------------------------------------------------

--
-- Structure de la table `carte_bancaire`
--

CREATE TABLE `carte_bancaire` (
  `id` int(11) NOT NULL,
  `num_carte` int(11) NOT NULL,
  `Nom_prenom` varchar(35) NOT NULL,
  `expi` varchar(6) NOT NULL,
  `cvc` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `carte_bancaire`
--

INSERT INTO `carte_bancaire` (`id`, `num_carte`, `Nom_prenom`, `expi`, `cvc`) VALUES
(3, 2147483647, 'Kendra Kohler', '2/2025', 456),
(4, 2147483647, 'Nicholas Fisher', '2/2025', 456),
(5, 2147483647, 'Nicholas Fisher', '2/2025', 456),
(6, 2147483647, 'Kendra Kohler', '2/2025', 456),
(7, 2147483647, 'Kendra Kohler', '2/2025', 456),
(8, 2147483647, 'Kendra Kohler', '2/2025', 456),
(9, 2147483647, 'Kendra Kohler', '2/2025', 456);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mdp` char(32) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` char(30) NOT NULL,
  `numtel` char(10) NOT NULL,
  `birthday` char(10) NOT NULL,
  `ville` char(45) NOT NULL,
  `codepostal` char(5) NOT NULL,
  `pseudo` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `email`, `mdp`, `nom`, `prenom`, `numtel`, `birthday`, `ville`, `codepostal`, `pseudo`) VALUES
(39, 'hnfhjfj@gfg.dem', 'abc', 'sdsds', 'qdqdq', '0546897', '2000-12-11', 'blalvbvla', '98750', 'elix'),
(37, 'bcoquet03@gmail.com', 'aaa', 'dqdqd', 'qdqdq', '0546897', '2000-12-11', 'blalvbvla', '96740', 'elax'),
(76, 'a@a.a', 'a', 'aaaa', 'aaaa', '0745648910', '2000-12-11', 'aaaaa', '97450', 'Barney'),
(77, 'l@l.l', 'lll', 'llll', 'dqsdqd', '06894510', '1999-09-14', 'dqdsqd', '75560', 'luis');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `price` float NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `img`, `price`, `nom`) VALUES
(1, 't-shirt.png', 15.99, 'T-shirt bleu'),
(2, 'pantalon.jpg', 15.99, 'Pantalon bege'),
(3, 'chaussures.jpg', 76.99, 'chaussures marrons'),
(4, 'manteau.png', 35.99, 'Manteau vert '),
(5, 'jogging.png', 17.99, 'Jogging gris'),
(6, 'joggingnoir.png', 17.99, 'Jogging noir'),
(7, 'manteau_bleu.png', 35.99, 'Manteau bleu'),
(8, 'jean-slim-brut.jpg', 17.99, 'Jean'),
(9, 'chaussures_noires.jpg', 76.89, 'chaussures noires'),
(10, 'pantalon-large-rouge-femme.jpg', 35.99, 'Pantalon rouge large'),
(11, 't-shirt_orange.png', 15.99, 'T-shirt orange'),
(12, 'jeans_dechires.png', 27.99, 'Jean Déchiré'),
(13, 'manteau_marron.jpg', 40.99, 'Manteau marron');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `carte_bancaire`
--
ALTER TABLE `carte_bancaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `carte_bancaire`
--
ALTER TABLE `carte_bancaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
