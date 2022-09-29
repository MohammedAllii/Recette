-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 11 fév. 2022 à 10:43
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `covoiturage`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_trajet` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `id_user`, `created_at`, `updated_at`, `id_trajet`) VALUES
(87, '17', '2022-02-11 09:37:39', '2022-02-11 09:37:39', 76),
(86, '17', '2022-02-11 09:37:32', '2022-02-11 09:37:32', 76),
(85, '17', '2022-02-11 09:37:19', '2022-02-11 09:37:19', 76),
(84, '13', '2022-02-08 19:52:58', '2022-02-08 19:52:58', 75),
(75, '13', '2022-02-08 19:51:07', '2022-02-08 19:51:07', 75),
(83, '13', '2022-02-08 19:52:54', '2022-02-08 19:52:54', 75),
(82, '13', '2022-02-08 19:52:47', '2022-02-08 19:52:47', 75),
(81, '13', '2022-02-08 19:52:42', '2022-02-08 19:52:42', 75),
(80, '13', '2022-02-08 19:52:37', '2022-02-08 19:52:37', 75),
(79, '13', '2022-02-08 19:52:33', '2022-02-08 19:52:33', 75),
(78, '13', '2022-02-08 19:52:28', '2022-02-08 19:52:28', 75),
(77, '13', '2022-02-08 19:51:16', '2022-02-08 19:51:16', 75),
(76, '13', '2022-02-08 19:51:12', '2022-02-08 19:51:12', 75),
(88, '17', '2022-02-11 09:37:43', '2022-02-11 09:37:43', 76),
(89, '17', '2022-02-11 09:37:47', '2022-02-11 09:37:47', 76),
(90, '17', '2022-02-11 09:39:25', '2022-02-11 09:39:25', 76),
(91, '17', '2022-02-11 09:39:34', '2022-02-11 09:39:34', 76),
(92, '17', '2022-02-11 09:39:38', '2022-02-11 09:39:38', 76);

-- --------------------------------------------------------

--
-- Structure de la table `trajets`
--

DROP TABLE IF EXISTS `trajets`;
CREATE TABLE IF NOT EXISTS `trajets` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
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
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `trajets`
--

INSERT INTO `trajets` (`id`, `created_at`, `updated_at`, `villedep`, `villedes`, `nbp`, `marque`, `prix`, `date`, `heure`, `name_user`, `email`, `phone`, `user_id`) VALUES
(48, '2022-01-31 16:03:16', '2022-01-31 16:03:16', 'siliana', 'Marsa', 5, 'BMW', 25, '2022-01-27', '23:14:00', 'ines mejri', 'ines@gmail.com', 20256174, 10),
(52, '2022-02-02 13:55:04', '2022-02-08 18:58:25', 'siliana', 'ariana', -1, 'louage', 15, '2022-02-14', '07:00:00', 'farah', 'farah@gmail.com', 22568794, 14),
(45, '2022-01-31 10:56:16', '2022-01-31 10:56:16', 'siliana', 'Marsa', 4, 'Nissan', 5, '2022-01-31', '15:15:00', 'Nabil Abidi', 'nabil@gmail.com', 22123123, 9),
(67, '2022-02-03 15:41:44', '2022-02-03 15:41:44', 'siliana', 'siliana', 3, 'BMW', 3, '2022-02-08', '04:03:00', 'mejri mohamed ali', 'mejrihamouda8@gmail.com', 55223123, 11),
(75, '2022-02-08 18:39:12', '2022-02-08 19:52:42', 'mhamdeya', 'Marsa', 0, 'kio', 17, '2022-02-08', '15:20:00', 'Ayouba', 'ayoub1@gmail.com', 29002114, 13),
(76, '2022-02-11 09:34:57', '2022-02-11 09:39:34', 'mhamdeya', 'Marsa', 0, 'Nissan', 5, '2022-02-11', '15:15:00', 'hamouda', 'med@gmail.com', 97060568, 17);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `age` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `password`, `created_at`, `updated_at`, `age`, `phone`, `photo`) VALUES
(11, 'mejri mohamed ali', 'mejrihamouda8@gmail.com', '$2y$10$bcABoi2UUmg6PCUIu1/OjeLquMUah6uLbC1hFHnxNzPjSYwBaeTwm', '2022-01-30 21:46:57', '2022-02-03 15:40:19', 20, 55223123, NULL),
(9, 'Nabil', 'nabil@gmail.com', '$2y$10$2qL8gz1gDj9Y25Vgb39coOw0QXsvtboKZglqewFiwiZGIF2SKdqeq', '2022-01-28 05:51:10', '2022-01-31 10:56:30', 20, 22123123, NULL),
(10, 'hamouda', 'hamouda@gmail.com', '$2y$10$WhQbflQlIZonLMVTyJ2iq.dsRcaW0qr6r.QY2gwaAHXFJeXF.I8ZK', '2022-01-30 15:21:15', '2022-01-31 16:27:51', 21, 97060567, NULL),
(12, 'mejri habib', 'habib@gmail.com', '$2y$10$mQz/JN7jyUjIUDOVYNexoORbnnydOivu6Ps.Ld15A5MLaTbqWwnye', '2022-02-01 14:13:56', '2022-02-01 14:13:56', 40, 98424251, NULL),
(13, 'Ayouba', 'ayoub1@gmail.com', '$2y$10$UpLYJsQFXbvCg3EqvmLtsekBaoH9lfAOi1uVY/aRuCMApmispvVka', '2022-02-01 14:14:39', '2022-02-07 21:11:04', 12, 29002114, NULL),
(14, 'farah', 'farah@gmail.com', '$2y$10$vfcBpCE1hd2Byx1qGdoDjezQh9YT1N5eFaZ6B8JP2/a21zwNPWYMe', '2022-02-02 13:54:02', '2022-02-02 13:54:02', 21, 22568794, NULL),
(15, 'ahmed', 'ahmed@gmail.com', '$2y$10$fbsYbJfl57vkpEB1y8Uu1.7HQEeu9Up.a85Cr30BiyO2xaaWkuWhC', '2022-02-11 07:56:05', '2022-02-11 07:56:05', 23, 22012451, NULL),
(16, 'hama', 'hama@gmail.com', '$2y$10$0SmgWspqiZ9kXhqQfdfLQuHsXM8ViAnDLtwCfLd.ndcEmtnEqOZLq', '2022-02-11 08:37:11', '2022-02-11 08:37:11', 23, 14785236, '1644572231.png'),
(17, 'hamouda', 'med@gmail.com', '$2y$10$c3Q/YKykCNiDEDKPGEHKMehAXNFjTPUVoYmON85RqQGU7DapKPwly', '2022-02-11 08:47:21', '2022-02-11 09:18:04', 22, 97060568, 'ham.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
