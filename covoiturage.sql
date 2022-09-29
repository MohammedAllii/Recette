-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 10 août 2022 à 11:41
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `covoiturage`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `age` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `nom`, `email`, `password`, `created_at`, `updated_at`, `age`, `phone`, `photo`) VALUES
(1, 'hamouda', 'hamouda@gmail.com', '123456', '2022-04-01', '2022-04-01', 22, 97060567, '1648843944.JPG');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_trajet` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `id_user`, `created_at`, `updated_at`, `id_trajet`) VALUES
(114, '19', '2022-04-05 08:24:39', '2022-04-05 08:24:39', 83);

-- --------------------------------------------------------

--
-- Structure de la table `trajets`
--

CREATE TABLE `trajets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `villedep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `villedes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbp` int(11) NOT NULL,
  `marque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `name_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `trajets`
--

INSERT INTO `trajets` (`id`, `created_at`, `updated_at`, `villedep`, `villedes`, `nbp`, `marque`, `prix`, `date`, `heure`, `name_user`, `email`, `phone`, `user_id`) VALUES
(82, '2022-04-04 14:42:28', '2022-04-04 12:42:28', 'tunis', 'siliana', 3, 'Hyundai', 7, '2022-04-04', '14:15:00', 'Farah weslati', 'farah@gmail.com', 26547142, 21),
(83, '2022-04-04 14:43:36', '2022-04-05 08:24:39', 'nabeul', 'jerba', 1, 'BMW', 25, '2022-04-05', '09:00:00', 'Ayoub Ghmougui', 'ayoub@gmail.com', 22147852, 20),
(84, '2022-04-04 14:45:57', '2022-04-04 12:45:57', 'ben arous', 'bouarada', 4, 'mahindra', 6, '2022-04-05', '16:45:00', 'Mohamed Ali Méjri', 'mejrihamouda8@gmail.com', 97060567, 19),
(85, '2022-04-04 14:47:18', '2022-04-04 12:47:18', 'ariana', 'rouhia', 1, 'toyota', 8, '2022-04-04', '17:00:00', 'Mohamed Ali Méjri', 'mejrihamouda8@gmail.com', 97060567, 19),
(86, '2022-08-10 09:37:12', '2022-08-10 08:37:12', 'siliana', 'Tunis', 4, 'Audi', 10, '2022-08-10', '13:00:00', 'manel horcheni', 'manel.horcheni.123@gmail.com', 58858223, 23);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `age` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `password`, `created_at`, `updated_at`, `age`, `phone`, `photo`) VALUES
(23, 'manel horcheni', 'manel.horcheni.123@gmail.com', '$2y$10$MDcF1ZF.1cQLDKMKfj9oS.jwpNc/fTF/TFdqZxxnc1mI.Dut/JQI6', '2022-08-10 08:36:23', '2022-08-10 08:36:23', 22, 58858223, '1660124183.jpg'),
(22, 'Ayoub', 'ayou@gmail.com', '$2y$10$ys6sJSJ4uFeRyxKDVa1NPuA0HWDSB7yzCr3AHlT8OOwunRs1PUbCC', '2022-04-13 20:32:15', '2022-04-13 20:32:15', 7, 12345678, '1649889135.mp4'),
(21, 'Farah weslati', 'farah@gmail.com', '$2y$10$kEvQg8Mjk8MnpZl/POb22.sBDZ6Pk/NZsgDfdazrIc5tT9O3QxcHu', '2022-04-04 12:41:17', '2022-04-04 12:41:17', 22, 26547142, '1649083277.JPG'),
(20, 'Ayoub Ghmougui', 'ayoub@gmail.com', '$2y$10$kjKG5/cqd94s/M3U4RhyxusUNuW.FjWHDTWptyhd10xz7dqsW/XGC', '2022-04-04 12:39:50', '2022-04-04 12:39:50', 24, 22147852, '1649083190.JPG'),
(19, 'Mohamed Ali Méjri', 'mejrihamouda8@gmail.com', '$2y$10$pdUCzLWuFxtu6khIkr7Sfewl.KlA35i8cqCajI21Ln4zvl/aBTP1y', '2022-04-04 12:36:14', '2022-04-04 12:36:14', 22, 97060567, '1649082974.JPG');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trajets`
--
ALTER TABLE `trajets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT pour la table `trajets`
--
ALTER TABLE `trajets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
