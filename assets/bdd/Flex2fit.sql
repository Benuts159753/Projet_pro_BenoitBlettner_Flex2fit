-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 04 Mars 2019 à 15:56
-- Version du serveur :  5.7.25-0ubuntu0.18.04.2
-- Version de PHP :  7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Flex2fit`
--

-- --------------------------------------------------------

--
-- Structure de la table `food`
--

CREATE TABLE `food` (
  `id_food` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `foodPicture` blob,
  `Cals_for_100_grams` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Food_type`
--

CREATE TABLE `Food_type` (
  `id_type` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `meal`
--

CREATE TABLE `meal` (
  `id_meal` int(11) NOT NULL,
  `meal_date` date NOT NULL,
  `Meal_quantity` varchar(50) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_mealType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `mealContent`
--

CREATE TABLE `mealContent` (
  `id_meal` int(11) NOT NULL,
  `id_food` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `mealType`
--

CREATE TABLE `mealType` (
  `id_mealType` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `id_users` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(5) DEFAULT NULL,
  `weight` int(5) DEFAULT NULL,
  `height` int(5) DEFAULT NULL,
  `objectif` varchar(50) DEFAULT NULL,
  `id_userType` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Users`
--

INSERT INTO `Users` (`id_users`, `pseudo`, `password`, `lastname`, `firstname`, `email`, `age`, `weight`, `height`, `objectif`, `id_userType`) VALUES
(13, 'Benuts', '$2y$10$8eQUTvov5zWPQoiNS/jQ0.FeL7QcKC9Tjq9FC9Q6gs7r35ThcPtTy', 'Blettner', 'Benoit', 'blettnerbenoit@gmail.com', NULL, NULL, NULL, NULL, 1),
(14, 'testtest', '$2y$10$XVD.yzHAxstLCe7PQDt44ulYGCOye2xdFUMrYg4LcR3lRvq3DgEle', 'testtest', 'testtest', 'test@test.fr', NULL, NULL, NULL, NULL, 1),
(15, 'Jeudetest2', '$2y$10$YkEjhT8JuLj5iwZGngIHROY0JJ6myRxAOdto7fhe32mc8KKKR0HJu', 'Jeudetest2', 'Jeudetest2', 'Jeudetest2@test.com', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Users_type`
--

CREATE TABLE `Users_type` (
  `id_userType` int(11) NOT NULL,
  `userstype` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Users_type`
--

INSERT INTO `Users_type` (`id_userType`, `userstype`) VALUES
(1, 'User'),
(2, 'Admin');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id_food`),
  ADD KEY `food_Food_type_FK` (`id_type`);

--
-- Index pour la table `Food_type`
--
ALTER TABLE `Food_type`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`id_meal`),
  ADD KEY `meal_Users_FK` (`id_users`),
  ADD KEY `meal_mealType0_FK` (`id_mealType`);

--
-- Index pour la table `mealContent`
--
ALTER TABLE `mealContent`
  ADD PRIMARY KEY (`id_meal`,`id_food`),
  ADD KEY `mealContent_food0_FK` (`id_food`);

--
-- Index pour la table `mealType`
--
ALTER TABLE `mealType`
  ADD PRIMARY KEY (`id_mealType`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id_users`),
  ADD KEY `Users_Users_type_FK` (`id_userType`);

--
-- Index pour la table `Users_type`
--
ALTER TABLE `Users_type`
  ADD PRIMARY KEY (`id_userType`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `food`
--
ALTER TABLE `food`
  MODIFY `id_food` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Food_type`
--
ALTER TABLE `Food_type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `meal`
--
ALTER TABLE `meal`
  MODIFY `id_meal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `mealType`
--
ALTER TABLE `mealType`
  MODIFY `id_mealType` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `Users_type`
--
ALTER TABLE `Users_type`
  MODIFY `id_userType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_Food_type_FK` FOREIGN KEY (`id_type`) REFERENCES `Food_type` (`id_type`);

--
-- Contraintes pour la table `meal`
--
ALTER TABLE `meal`
  ADD CONSTRAINT `meal_Users_FK` FOREIGN KEY (`id_users`) REFERENCES `Users` (`id_users`),
  ADD CONSTRAINT `meal_mealType0_FK` FOREIGN KEY (`id_mealType`) REFERENCES `mealType` (`id_mealType`);

--
-- Contraintes pour la table `mealContent`
--
ALTER TABLE `mealContent`
  ADD CONSTRAINT `mealContent_food0_FK` FOREIGN KEY (`id_food`) REFERENCES `food` (`id_food`),
  ADD CONSTRAINT `mealContent_meal_FK` FOREIGN KEY (`id_meal`) REFERENCES `meal` (`id_meal`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
