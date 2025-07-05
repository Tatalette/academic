-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 05 avr. 2024 à 00:32
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `randonnee`
--

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `pseudo` varchar(15) NOT NULL,
  `age` float NOT NULL,
  `genre` char(2) DEFAULT NULL CHECK (`genre` in ('F','M','B','NB','NE'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`pseudo`, `age`, `genre`) VALUES
('Albator', 20, 'NB'),
('Anderson', 60, 'F'),
('Gaston', 37, 'B'),
('Hortefeu', 98, 'NE'),
('Jeanne', 35, 'F'),
('Patapouf', 15, 'NE'),
('Raspoutine', 71, 'M'),
('Sasha', 12, 'M'),
('Tintin', 42, 'M'),
('Totoro', 80, 'NB');

-- --------------------------------------------------------

--
-- Structure de la table `participation`
--

CREATE TABLE `participation` (
  `numRando` int(11) DEFAULT NULL,
  `pseudo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `participation`
--

INSERT INTO `participation` (`numRando`, `pseudo`) VALUES
(1, 'Albator'),
(1, 'Anderson'),
(1, 'Hortefeu'),
(2, 'Raspoutine'),
(2, 'Sasha'),
(2, 'Gaston'),
(2, 'Jeanne'),
(2, 'Tintin'),
(3, 'Totoro'),
(3, 'Anderson'),
(3, 'Gaston'),
(3, 'Jeanne'),
(3, 'Hortefeu'),
(4, 'Gaston'),
(4, 'Jeanne'),
(10, 'Patapouf'),
(8, 'Sasha'),
(9, 'Hortefeu');

-- --------------------------------------------------------

--
-- Structure de la table `randonnee`
--

CREATE TABLE `randonnee` (
  `numRando` int(1) NOT NULL,
  `titre` varchar(20) NOT NULL,
  `dateDep` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `randonnee`
--

INSERT INTO `randonnee` (`numRando`, `titre`, `dateDep`) VALUES
(1, 'Randonnee au Macha C', '2024-04-04'),
(2, 'La randonnee au ranc', '2024-06-07'),
(3, 'Balade sur la lune', '2024-08-09'),
(4, 'Promenade sur les ch', '2024-10-23'),
(8, 'La balade inventée', '2025-04-15'),
(9, 'La balade inventée b', '2025-04-16'),
(10, 'La balade du test', '2026-05-03');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`pseudo`);

--
-- Index pour la table `participation`
--
ALTER TABLE `participation`
  ADD KEY `fk_numRando` (`numRando`),
  ADD KEY `fk_pseudo` (`pseudo`);

--
-- Index pour la table `randonnee`
--
ALTER TABLE `randonnee`
  ADD PRIMARY KEY (`numRando`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `randonnee`
--
ALTER TABLE `randonnee`
  MODIFY `numRando` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `participation`
--
ALTER TABLE `participation`
  ADD CONSTRAINT `fk_numRando` FOREIGN KEY (`numRando`) REFERENCES `randonnee` (`numRando`),
  ADD CONSTRAINT `fk_pseudo` FOREIGN KEY (`pseudo`) REFERENCES `membre` (`pseudo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
