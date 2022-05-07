-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 06 mai 2022 à 18:52
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bengmoudproject`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `contenu` text CHARACTER SET utf8 NOT NULL,
  `emplacement` varchar(200) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) NOT NULL,
  `visibility` tinyint(4) NOT NULL,
  `date_article` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `contenu`, `emplacement`, `image`, `visibility`, `date_article`) VALUES
(14, 'Les travaux', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'blog', '1650986527.jpg', 0, '2022-04-19'),
(15, 'TA3AWONIYA', '	Lorem ipsum dolor sit amet. Nam magni culpa a deleniti provident eum libero magni. Eos nulla consequatur sit velit', 'blog', '1650986125.jpg', 0, '2022-04-20'),
(16, 'BABA', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore', 'blog', '1650986339.jpg', 0, '2022-04-20'),
(18, 'titre', 'dsfsdfdsfdsfsddsffLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore', 'blog', '1650453810.jpg', 0, '2022-04-20'),
(21, 'ARTX', 'hg,', 'blog', '1650582909.jpg', 0, '2022-04-22');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(200) NOT NULL,
  `localisation` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_amount` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `createdtime` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `payments`
--

INSERT INTO `payments` (`id`, `transaction_id`, `payment_amount`, `currency_code`, `payment_status`, `invoice_id`, `name`, `createdtime`) VALUES
(8, 'PAYID-MJKZ6IA10P45656X5003643B', 1.00, 'USD', 'approved', '6255923addfd9', 'SOUFIANE', '2022-04-12'),
(9, 'PAYID-MJK2EGI0M71945243302502B', 1.00, 'USD', 'approved', '62559534ee7ef', 'SABER', '2022-04-12'),
(11, 'PAYID-MJK2J6Q6EH86627JK542483B', 1.00, 'USD', 'approved', '6255981579702', 'mohmad', '2022-04-12'),
(15, 'PAYID-MJXMT5I4AH56884S2840771D', 10.00, 'USD', 'approved', '626ebd20145f1', 'SOUFIANE TAATALLA', '2022-05-01'),
(16, 'PAYID-MJ2VYPQ5E684958BF365651L', 10.00, 'USD', 'approved', '62754f6d199fb', 'SOUFIANE', '2022-05-06');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `code` mediumint(9) NOT NULL,
  `email` varchar(200) NOT NULL,
  `Fullname` varchar(200) NOT NULL,
  `regdate` date NOT NULL,
  `groupid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `code`, `email`, `Fullname`, `regdate`, `groupid`) VALUES
(4, 'Chanigi', '$2y$10$H.85.ThojNzRguYFUuDQfuMjE9xnYrMVA6i2DoA7u.Zq52fU9CRj6', 0, 'oussman.taa@gmail.com', 'Sidi chanigi', '2022-04-20', 0),
(6, 'Abdusamad', '$2y$10$w4p1LCSx0D2CLWJr4srYXOc/qnloFgYyy6ziTxRTaimc4vc6NgU/m', 0, 'p@gmail.com', 'yourzarsif', '2022-04-20', 1),
(7, 'MO7A', '$2y$10$16kDnRTQIU0AWLijxlPyHOGqexnlF5ax5jAS0UI7dPbPoFG3ToLKe', 0, 'sas@hasas', 'qcfsqd', '2022-04-20', 0),
(10, 'Admin', '$2y$10$XC7jWypBu7D.tg3nU4oosuwMCGdhqvl80q4eaJ04L3Yo0nL8SfvY2', 0, 's@gmail.com', 'admin admin', '2022-04-30', 0),
(11, 'SOUFIANE', '$2y$10$KlG.enkptMo2KeF5zPz8XuqECgFm/LgFtd1LJxR0XueNygyKXpDZi', 0, 's@gmail.com', 'ADMIN2', '2022-04-30', 0),
(12, 'ASMA', '$2y$10$basyyF7FPcFk4oUXYalchekyQDLqqaTkfd16dl45v74.o/fyjLiRm', 0, 's@gmail.com', 'asma', '2022-04-30', 0),
(13, 'YAMNA', '$2y$10$lGavqgh0LqgL3m14bqAoOeVcLbbBkAKa6qzXJ3EvUK4NyBSvvQaam', 0, 's@gmail.com', 'SOSO', '2022-04-30', 0),
(14, 'SAAID', '$2y$10$bj58b6iG8RxILCTdbm/I/etP08JHGmAXfJai4Uqni07uxeOxUbXVO', 0, 's@gmail.com', 'TAATALA', '2022-04-30', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
