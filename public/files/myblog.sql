-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  Dim 11 août 2019 à 11:54
-- Version du serveur :  5.7.25
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `myblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `image`, `created_at`) VALUES
(1, 'Titre de l\'article numéro 1', 'Contenu de l\'article 1', 'http://placehold.it/350x150', '2019-08-10 22:38:49'),
(2, 'Titre de l\'article numéro 2', 'Contenu de l\'article 2', 'http://placehold.it/350x150', '2019-08-10 22:38:49'),
(3, 'Titre de l\'article numéro 3', 'Contenu de l\'article 3', 'http://placehold.it/350x150', '2019-08-10 22:38:49'),
(4, 'Titre de l\'article numéro 4', 'Contenu de l\'article 4', 'http://placehold.it/350x150', '2019-08-10 22:38:49'),
(5, 'Titre de l\'article numéro 5', 'Contenu de l\'article 5', 'http://placehold.it/350x150', '2019-08-10 22:38:49'),
(6, 'Titre de l\'article numéro 6', 'Contenu de l\'article 6', 'http://placehold.it/350x150', '2019-08-10 22:38:49'),
(7, 'Titre de l\'article numéro 7', 'Contenu de l\'article 7', 'http://placehold.it/350x150', '2019-08-10 22:38:49'),
(8, 'Titre de l\'article numéro 8', 'Contenu de l\'article 8', 'http://placehold.it/350x150', '2019-08-10 22:38:49'),
(9, 'Titre de l\'article numéro 9', 'Contenu de l\'article 9', 'http://placehold.it/350x150', '2019-08-10 22:38:49'),
(10, 'Titre de l\'article numéro 10', 'Contenu de l\'article 10', 'http://placehold.it/350x150', '2019-08-10 22:38:49');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190810183141', '2019-08-10 20:11:39');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;