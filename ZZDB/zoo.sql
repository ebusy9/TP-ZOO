-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 27 août 2023 à 12:50
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zoo`
--

-- --------------------------------------------------------

--
-- Structure de la table `entities`
--

CREATE TABLE `entities` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `healthPoints` int NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `age` int NOT NULL DEFAULT '0',
  `subtype` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `illness` tinyint(1) NOT NULL DEFAULT '0',
  `food` int NOT NULL DEFAULT '100',
  `poop` int NOT NULL DEFAULT '0',
  `water` int NOT NULL DEFAULT '100',
  `pee` int NOT NULL DEFAULT '0',
  `asleep` tinyint(1) NOT NULL DEFAULT '0',
  `paddock_id` int DEFAULT NULL,
  `zoo_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `entities`
--

INSERT INTO `entities` (`id`, `name`, `healthPoints`, `gender`, `age`, `subtype`, `illness`, `food`, `poop`, `water`, `pee`, `asleep`, `paddock_id`, `zoo_id`) VALUES
(1, 'tet', 33, 'male', 0, 'uranus', 0, 100, 0, 100, 0, 0, NULL, NULL),
(2, 'tets', 55, 'male', 0, 'uranus', 0, 100, 0, 100, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `paddocks`
--

CREATE TABLE `paddocks` (
  `id` int NOT NULL,
  `size` int NOT NULL,
  `spot` int NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cleanliness` int NOT NULL,
  `zoo_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `register_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `login`, `password`, `register_date`) VALUES
(1, 'BZ', 'elon228', '$2y$10$YBO/Cuopi39vO.3zI7f3f.a83Mrp5iesOZv5CaEDID9789Rgbz1pq', '2023-08-23');

-- --------------------------------------------------------

--
-- Structure de la table `zoo`
--

CREATE TABLE `zoo` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `size` int NOT NULL DEFAULT '2',
  `currentDay` int NOT NULL DEFAULT '1',
  `zookeeper_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `zookeepers`
--

CREATE TABLE `zookeepers` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `age` int NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `money` int DEFAULT '0',
  `piscivoreFood` int NOT NULL DEFAULT '0',
  `filterFeedFood` int NOT NULL DEFAULT '0',
  `carnivoreFood` int NOT NULL DEFAULT '0',
  `herbivoreFood` int NOT NULL DEFAULT '0',
  `water` int NOT NULL DEFAULT '0',
  `firstAidKit` int NOT NULL DEFAULT '0',
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `zookeepers`
--

INSERT INTO `zookeepers` (`id`, `name`, `age`, `gender`, `money`, `piscivoreFood`, `filterFeedFood`, `carnivoreFood`, `herbivoreFood`, `water`, `firstAidKit`, `user_id`) VALUES
(12695, 'Bi', 65, 'nonbinary', 500, 0, 0, 0, 0, 0, 0, 1),
(35176, 'finalTest', 77, 'female', 500, 0, 0, 0, 0, 0, 0, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `entities`
--
ALTER TABLE `entities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paddock_id` (`paddock_id`),
  ADD KEY `zoo_id` (`zoo_id`);

--
-- Index pour la table `paddocks`
--
ALTER TABLE `paddocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zoo_id` (`zoo_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Index pour la table `zoo`
--
ALTER TABLE `zoo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zookeeper_id` (`zookeeper_id`);

--
-- Index pour la table `zookeepers`
--
ALTER TABLE `zookeepers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `entities`
--
ALTER TABLE `entities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `paddocks`
--
ALTER TABLE `paddocks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `zoo`
--
ALTER TABLE `zoo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `zookeepers`
--
ALTER TABLE `zookeepers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46679;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `entities`
--
ALTER TABLE `entities`
  ADD CONSTRAINT `entities_ibfk_1` FOREIGN KEY (`paddock_id`) REFERENCES `paddocks` (`id`),
  ADD CONSTRAINT `entities_ibfk_2` FOREIGN KEY (`zoo_id`) REFERENCES `zoo` (`id`);

--
-- Contraintes pour la table `paddocks`
--
ALTER TABLE `paddocks`
  ADD CONSTRAINT `paddocks_ibfk_1` FOREIGN KEY (`zoo_id`) REFERENCES `zoo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `zoo`
--
ALTER TABLE `zoo`
  ADD CONSTRAINT `zoo_ibfk_1` FOREIGN KEY (`zookeeper_id`) REFERENCES `zookeepers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `zookeepers`
--
ALTER TABLE `zookeepers`
  ADD CONSTRAINT `zookeepers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
