-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 31 Août 2023 à 21:18
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pokemon`
--

-- --------------------------------------------------------

--
-- Structure de la table `pokemon`
--

CREATE TABLE `pokemon` (
  `id` int(4) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `type` varchar(32) NOT NULL,
  `evolution` int(3) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Contenu de la table `pokemon`
--

INSERT INTO `pokemon` (`id`, `nom`, `type`, `evolution`, `image`) VALUES
(1, 'Bulbasaur', 'Grass', 1, 'https://img.pokemondb.net/sprites/sword-shield/icon/bulbasaur.png'),
(2, 'Ivysaur', 'Grass', 2, 'https://img.pokemondb.net/sprites/sword-shield/icon/ivysaur.png'),
(3, 'Venusaur', 'Grass', 3, 'https://img.pokemondb.net/sprites/sword-shield/icon/venusaur.png'),
(4, 'Charmander', 'Fire', 1, 'https://img.pokemondb.net/sprites/sword-shield/icon/charmander.png'),
(5, 'Charmeleon', 'Fire', 2, 'https://img.pokemondb.net/sprites/sword-shield/icon/charmeleon.png'),
(6, 'Charizard', 'Fire', 3, 'https://img.pokemondb.net/sprites/sword-shield/icon/charizard.png'),
(7, 'Squirtle', 'Water', 1, 'https://img.pokemondb.net/sprites/sword-shield/icon/squirtle.png'),
(8, 'Wartortle', 'Water', 2, 'https://img.pokemondb.net/sprites/sword-shield/icon/wartortle.png'),
(9, 'Blastoise', 'Water', 3, 'https://img.pokemondb.net/sprites/sword-shield/icon/blastoise.png'),
(10, 'Caterpie', 'Bug', 1, 'https://img.pokemondb.net/sprites/sword-shield/icon/caterpie.png'),
(11, 'Metapod', 'Bug', 2, 'https://img.pokemondb.net/sprites/sword-shield/icon/metapod.png'),
(12, 'Butterfree', 'Bug', 3, 'https://img.pokemondb.net/sprites/sword-shield/icon/butterfree.png'),
(13, 'Weedle', 'Bug', 1, 'https://img.pokemondb.net/sprites/sword-shield/icon/weedle.png'),
(14, 'Kakuna', 'Bug', 2, 'https://img.pokemondb.net/sprites/sword-shield/icon/kakuna.png'),
(15, 'Beedrill', 'Bug', 3, 'https://img.pokemondb.net/sprites/sword-shield/icon/beedrill.png'),
(16, 'Pidgey', 'Normal', 1, 'https://img.pokemondb.net/sprites/sword-shield/icon/pidgey.png'),
(17, 'Pidgeotto', 'Normal', 2, 'https://img.pokemondb.net/sprites/sword-shield/icon/pidgeotto.png'),
(18, 'Pidgeot', 'Normal', 3, 'https://img.pokemondb.net/sprites/sword-shield/icon/pidgeot.png');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
