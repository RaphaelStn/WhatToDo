-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 14 jan. 2022 à 11:31
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `whattodo`
--

-- --------------------------------------------------------

--
-- Structure de la table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ids` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=264 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `favorites`
--

INSERT INTO `favorites` (`id`, `ids`, `user_id`, `cat`) VALUES
(169, 62286, 75, 'shows'),
(151, 438631, 75, 'movies'),
(149, 646380, 75, 'movies'),
(150, 10213, 75, 'games'),
(148, 624860, 75, 'movies'),
(147, 425909, 75, 'movies'),
(152, 131927, 75, 'shows'),
(160, 785545, 75, 'movies'),
(259, 77169, 1, 'shows'),
(263, 18613, 1, 'games'),
(261, 110356, 1, 'shows'),
(258, 1429, 1, 'shows'),
(250, 19301, 1, 'games');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `cat`, `content`) VALUES
(1, 'homepage', '<p>This week\'s recommandation is a little bit different, what if instead of watching something, or playing, you would learn a new skill? OpenClassrooms can offers that for you ! Online course and more available at &nbsp;<a href=\"https://openclassrooms.com/fr/\" target=\"_blank\" rel=\"noopener\">Openclassrooms.com</a></p>\r\n<p><a href=\"https://openclassrooms.com/fr/\" target=\"_blank\" rel=\"noopener\"><img src=\"data:image/jpeg;base64,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\" alt=\"Avis Openclassrooms, se former en ligne | On a test&eacute; pour toi\" width=\"249\" height=\"119\" /></a></p>\r\n<p>&nbsp;</p>');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isAdmin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `isAdmin`) VALUES
(1, 'admin', 'meUPru2.87wCM', 'admin@gmail.com', 1),
(83, 'raphaelstn', 'meG6rtztBCwN.', 'raphaelstacino@gmail.com', NULL),
(84, 'toto', 'mezdnimyfPYvY', 'toto@gmail.fr', NULL),
(85, 'ok', 'me7oP12eZjBRU', 'ok@gmail.com', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
