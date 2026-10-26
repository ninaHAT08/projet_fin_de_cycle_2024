-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 17 avr. 2024 à 11:58
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionpfc`
--

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`id`, `nom`, `prenom`, `email`, `created_at`, `updated_at`) VALUES
(1, 'enseignant', 'ken', 'enseignant@gmail.com', '2024-03-31 19:56:09', '2024-03-31 19:56:09'),
(2, 'hhhhhhhhhh', 'ggggggg', 'agi@gmail.com', '2024-03-31 19:56:09', '2024-03-31 19:56:09'),
(3, 'kenza', 'kenzo', 'kenzo@gmail.com', '2024-03-31 19:56:09', '2024-03-31 19:56:09'),
(4, 'mouloud', 'athmani', 'mouloud@gmail.com', '2024-03-31 19:56:09', '2024-03-31 19:56:09'),
(8, 'kenza', 'gyoiup', 'gyoiup@gmail.com', '2024-03-31 19:59:54', '2024-03-31 19:59:54'),
(9, 'katarina', 'kykky', 'kykky@gmail.com', '2024-03-31 20:23:09', '2024-03-31 20:23:09'),
(10, 'kenza', 'lastart', 'lastart@gmail.com', '2024-03-31 21:31:37', '2024-03-31 21:31:37'),
(11, 'kenza', 'gndzn', 'gebodjk@gmail.com', '2024-03-31 21:48:01', '2024-03-31 21:48:01'),
(12, 'kenza', 'gndzn', 'gndzn@gmail.com', '2024-03-31 21:53:38', '2024-03-31 21:53:38'),
(13, 'kenza', '777fg', '777fg@gmail.com', '2024-03-31 22:08:21', '2024-03-31 22:08:21');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `specialite` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `email`, `created_at`, `updated_at`, `specialite`) VALUES
(4, 'gnd', 'kenza', 'kenza@gmail.com', '2024-03-28 16:25:03', '2024-03-28 16:25:03', NULL),
(5, 'nin', 'nono', 'noni@gmail.com', '2024-03-28 16:26:14', '2024-03-28 16:26:14', NULL),
(14, 'nadia', 'nado', 'nado@gmail.com', '2024-03-31 00:31:14', '2024-03-31 00:31:14', NULL),
(21, 'Guendouzen', 'kenza', 'guendouzenk@gmail.com', NULL, NULL, NULL),
(24, 'gnd', 'kenza', 'kenza@gmail.com', '2024-03-31 22:14:21', '2024-03-31 22:14:21', NULL),
(25, 'nin', 'nono', 'noni@gmail.com', '2024-03-31 22:14:21', '2024-03-31 22:14:21', NULL),
(26, 'papa', 'mama', 'mam@gmail.com', '2024-03-31 22:14:21', '2024-03-31 22:14:21', NULL),
(28, 'Guendouzen', 'kenza', 'guendouzenk@gmail.com', '2024-03-31 22:14:21', '2024-03-31 22:14:21', 'genie logiciel'),
(29, 'hatmi', 'nin', 'hatmi@gmail.com', '2024-03-31 22:14:21', '2024-03-31 22:14:21', 'ia'),
(33, 'hatmi', 'nina', 'hatmi.nin@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fiches`
--

CREATE TABLE `fiches` (
  `idfiche` bigint(20) UNSIGNED NOT NULL,
  `iduser` bigint(20) UNSIGNED NOT NULL,
  `idSujets` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fiches`
--

INSERT INTO `fiches` (`idfiche`, `iduser`, `idSujets`, `created_at`, `updated_at`) VALUES
(22, 3, 15, '2024-04-12 16:35:51', '2024-04-12 16:35:51'),
(23, 3, 14, '2024-04-12 16:35:58', '2024-04-12 16:35:58'),
(24, 3, 13, '2024-04-12 16:36:03', '2024-04-12 16:36:03'),
(27, 3, 16, '2024-04-17 07:21:19', '2024-04-17 07:21:19');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2024_04_02_185510_add_specialite_to_sujets', 3),
(12, '2024_04_02_190135_drop_specialite_from_sujets', 4),
(19, '0001_01_01_000000_create_users_table', 5),
(20, '0001_01_01_000001_create_cache_table', 5),
(21, '0001_01_01_000002_create_jobs_table', 5),
(22, '2024_03_31_224730_create_sujets_table', 5),
(23, '2024_04_02_232747_create_sujet_externe_table', 5),
(24, '2024_04_03_001207_create_sujetexterne_table', 6);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DWOVPxGOueH5gOJkcbGD7FbDm7V0Lr4PTBZndvn7', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:124.0) Gecko/20100101 Firefox/124.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVGR0TFhlWXVTMVYwM3FOT0Y2STIzNXhjRjltZm5FZnJEY3pDYXlCdSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbnN1amV0ZXh0ZXJuZSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1713212052),
('lw6HM4or3MCvVaWhUWABmrHaGdzg6K4v0SDS6eaI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:124.0) Gecko/20100101 Firefox/124.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUldGWGtZcllvNlZEejhBWlpyaTVQZ0d1cWcxYnNJbm5DalNhNUJZQiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1713346851),
('uW7faoXb2xmiSdVnhNGRp6itdzdPPYCFupqIjNem', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:124.0) Gecko/20100101 Firefox/124.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicks1cjBjWVdOQTN5SlRJUDhwaUx2M1lib2htN0dTRHdXcWJvYm1KTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbnN1amV0Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1713108290);

-- --------------------------------------------------------

--
-- Structure de la table `sujetexterne`
--

CREATE TABLE `sujetexterne` (
  `idsujete` bigint(20) UNSIGNED NOT NULL,
  `iduser` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `nom_entreprise` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `mot_clé` varchar(255) NOT NULL,
  `état` varchar(255) NOT NULL DEFAULT 'en_attente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sujetexterne`
--

INSERT INTO `sujetexterne` (`idsujete`, `iduser`, `titre`, `specialite`, `nom_entreprise`, `description`, `mot_clé`, `état`, `created_at`, `updated_at`) VALUES
(12, 3, 'titre 1', 'GL', 'entreprise', 'description etudiant', 'titre', 'en_attente', '2024-04-12 15:50:44', '2024-04-12 15:50:44'),
(13, 3, 'sujet 2', 'IA', 'sujet d\'entreprise', 'description de sujet1', 'descr', 'en_attente', '2024-04-12 15:51:48', '2024-04-12 15:51:48'),
(14, 10, 'sujetexterne', 'IA', 'externe', 'sujetexterne3333', 'externe', 'en_attente', '2024-04-12 16:33:40', '2024-04-12 16:33:40');

-- --------------------------------------------------------

--
-- Structure de la table `sujets`
--

CREATE TABLE `sujets` (
  `idSujet` bigint(20) UNSIGNED NOT NULL,
  `iduser` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `mot_clé` varchar(255) NOT NULL,
  `état` varchar(255) NOT NULL DEFAULT 'en_attente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sujets`
--

INSERT INTO `sujets` (`idSujet`, `iduser`, `titre`, `specialite`, `description`, `mot_clé`, `état`, `created_at`, `updated_at`) VALUES
(13, 4, 'sujet d\'enseignant', 'ASR', 'Description d\'enseignant', 'ens', 'en_attente', '2024-04-12 15:53:26', '2024-04-12 15:53:26'),
(14, 4, 'gestion pfc', 'Gl', 'projet fin de cycle', 'pfc', 'en_attente', '2024-04-12 15:55:07', '2024-04-12 15:55:07'),
(15, 11, 'titre sujet 3', 'IA', 'description 3', 'sujet', 'en_attente', '2024-04-12 16:26:32', '2024-04-12 16:26:32'),
(16, 9, 'ajoute sujet 2', 'GL', 'ajoute sujet 2', '2', 'en_attente', '2024-04-12 16:30:02', '2024-04-12 16:30:02');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'etudiant',
  `specialite` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `usertype`, `specialite`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin', 'admin', 'gl', 'admin@gmail.com', NULL, '$2y$12$VscXSMAaIMiOwu9wZx7bIe0YzXU2HCuvkE6rPgiK/7/PMYuI.rvg6', NULL, '2024-04-02 22:08:23', '2024-04-02 22:08:23'),
(3, 'etudiant', 'etudiant', 'etudiant', 'ia', 'etudiant@gmail.com', NULL, '$2y$12$EaI4VgUGiYfdXUDPMtO7Se9yE0.1yTw4Heb.hGqgDsU8GQ5JYgkwu', 'jjOrc2zh6oHMtX9pBalI9TVsYA4jPlhiOGbC9MIu9a5HQFAqc6i4UI3b20Dm', '2024-04-02 22:10:09', '2024-04-02 22:10:09'),
(4, 'enseignant', 'enseignant', 'enseignant', 'asr', 'enseignant@gmail.com', NULL, '$2y$12$y9zOhofmjg5fvDVm2HHJO.CEjvKGBQogMc40j5jRcD.sT8QyAbe8q', NULL, '2024-04-02 22:10:54', '2024-04-02 22:10:54'),
(6, 'nom1', 'prenom2', 'etudiant', 'GL', 'nom1@gmail.com', NULL, '$2y$12$YiglUr0ESOCsHDBossbBgO06k7vKJ63ugjeXedVdxcsPz4j/PhMm6', NULL, '2024-04-03 22:20:34', '2024-04-03 22:20:34'),
(9, 'nomenseignant', 'prenomenseignant', 'enseignant', 'IA , ASR', 'nomenseignant@gmail.com', NULL, '$2y$12$UwLAgUIy4Z3yrrPy8mZZNuc3JuqwGAfeUr0Av/VDZ3oH44jvMqDgW', NULL, '2024-04-12 16:02:29', '2024-04-12 16:02:29'),
(10, 'nom2', 'prenom2', 'etudiant', 'ASR', 'nom2@gmail.com', NULL, '$2y$12$1KsKb6/CSfBcEj3RgO/so.LMQRJm5c2QoBdHWo1MvqwPP/Hizcuuy', NULL, '2024-04-12 16:24:14', '2024-04-12 16:24:14'),
(11, 'enseignant3', 'enseig3', 'enseignant', 'IA, GL', 'enseignant3@gmail.com', NULL, '$2y$12$1/kZJ0tJD7jCz.Qkmm8ouec/6gMXqDx2/GAOUYTDFkjysuM7xblB.', NULL, '2024-04-12 16:25:29', '2024-04-12 16:25:29');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `fiches`
--
ALTER TABLE `fiches`
  ADD PRIMARY KEY (`idfiche`),
  ADD KEY `fiches_iduser_foreign` (`iduser`),
  ADD KEY `fk_fiches_a_table_b` (`idSujets`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `sujetexterne`
--
ALTER TABLE `sujetexterne`
  ADD PRIMARY KEY (`idsujete`),
  ADD KEY `sujetexterne_iduser_foreign` (`iduser`);

--
-- Index pour la table `sujets`
--
ALTER TABLE `sujets`
  ADD PRIMARY KEY (`idSujet`),
  ADD KEY `sujets_iduser_foreign` (`iduser`);

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
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fiches`
--
ALTER TABLE `fiches`
  MODIFY `idfiche` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `sujetexterne`
--
ALTER TABLE `sujetexterne`
  MODIFY `idsujete` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `sujets`
--
ALTER TABLE `sujets`
  MODIFY `idSujet` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `fiches`
--
ALTER TABLE `fiches`
  ADD CONSTRAINT `fiches_iduser_foreign` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_fiches_a_table_b` FOREIGN KEY (`idSujets`) REFERENCES `sujets` (`idSujet`);

--
-- Contraintes pour la table `sujetexterne`
--
ALTER TABLE `sujetexterne`
  ADD CONSTRAINT `sujetexterne_iduser_foreign` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `sujets`
--
ALTER TABLE `sujets`
  ADD CONSTRAINT `sujets_iduser_foreign` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
