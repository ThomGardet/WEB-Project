-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 13 juin 2018 à 16:41
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idFriend` int(11) NOT NULL,
  `meetingDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `friends`
--

INSERT INTO `friends` (`id`, `idUser`, `idFriend`, `meetingDate`) VALUES
(1, 1, 2, '0000-00-00 00:00:00'),
(2, 1, 2, '0000-00-00 00:00:00'),
(3, 1, 3, '0000-00-00 00:00:00'),
(4, 1, 4, '0000-00-00 00:00:00'),
(5, 2, 1, '0000-00-00 00:00:00'),
(6, 2, 3, '0000-00-00 00:00:00'),
(7, 3, 1, '0000-00-00 00:00:00'),
(8, 4, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `logins`
--

INSERT INTO `logins` (`id`, `username`, `password`, `idUser`) VALUES
(1, 'kevin', '$2y$11$uCqoYgszUzGvkZMc5uEkJuUROrBEmY92EEkuUvOjmXAUvAMs9VEem', 1),
(2, 'batou', '$2y$11$X.smAxSAfIlaWoc9sezAAenit9A1az.Cf6eldVVwtUzSvuSHp0sla', 2);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `idFrom` int(11) NOT NULL,
  `idTo` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `monuments`
--

CREATE TABLE `monuments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `creationDate` int(11) NOT NULL,
  `descriptif` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `descriptiv` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `idUser` int(11) NOT NULL,
  `publicationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `descriptiv`, `image`, `idUser`, `publicationDate`) VALUES
(1, 'some text', 'null', 2, '0000-00-00 00:00:00'),
(2, 'another text', 'null', 2, '0000-00-00 00:00:00'),
(3, 'test 1, 2, 3', 'null', 3, '0000-00-00 00:00:00'),
(4, 'another test', 'null', 4, '0000-00-00 00:00:00'),
(5, 'last test', 'null', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `profilPic` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `postalCode` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `streetNumber` int(11) NOT NULL,
  `town` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `profilPic`, `lastName`, `firstName`, `mail`, `phone`, `postalCode`, `street`, `streetNumber`, `town`, `country`) VALUES
(1, 'null', 'ouahmad', 'kevin', 'kevinouahmad@gmail.com', '0612581547', 90000, 'Chopin', 14, 'Belfort', 'France'),
(2, 'null', 'Leclerc', 'Baptiste', 'baptiste.leclerc@uha.fr', '0634532354', 68000, 'test', 6, 'Mulhouse', 'France'),
(3, 'null', 'pial', 'gauthier', 'efeff@gmail.com', '0688844899', 565656, 'efefef', 45, 'mulhouse', 'France'),
(4, 'null', 'wagner', 'gauthier', 'kefe@gmail.com', '059334534', 575755, 'frefere', 45, 'fefze', 'ezefze');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `monuments`
--
ALTER TABLE `monuments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `monuments`
--
ALTER TABLE `monuments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
