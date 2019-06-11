-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 11. jun 2019 ob 12.34
-- Različica strežnika: 10.1.32-MariaDB
-- Različica PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `praktikum`
--

-- --------------------------------------------------------

--
-- Struktura tabele `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Certificate', NULL, NULL),
(2, 'Guaranty', NULL, NULL),
(3, 'Warrant', NULL, NULL),
(4, 'Constitution', NULL, NULL),
(5, 'Statement', NULL, NULL),
(6, 'Guideline', NULL, NULL),
(7, 'Agreement', NULL, NULL),
(8, 'Contract', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabele `forms`
--

CREATE TABLE `forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `categorie_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `forms`
--

INSERT INTO `forms` (`id`, `form_name`, `form_description`, `form_data`, `created_at`, `updated_at`, `user_id`, `categorie_id`) VALUES
(1, 'Luka Gričar', 'a', '<p><input id=\"0\" class=\"form-control component\" style=\"width: 15%; height: calc(0.59rem + 2px); padding: .375rem .75rem; font-size: .9rem; line-height: 1.6; color: #495057; background-color: #fff; background-clip: padding-box; border: 1px solid #ced4da; border-radius: .25rem; margin-left: .5rem; margin-right: .5rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;\" name=\"a\'\'\" readonly=\"readonly\" type=\"text\" placeholder=\"Bla\" data-label=\"Bla\" data-input-name=\"uppercaseInitial\" /></p>', '2019-06-06 07:38:28', '2019-06-06 07:38:28', 1, 1),
(2, 'sd', 'ds', '<p>Ime: <input id=\"0\" class=\"form-control component\" style=\"width: 15%; height: calc(0.59rem + 2px); padding: .375rem .75rem; font-size: .9rem; line-height: 1.6; color: #495057; background-color: #fff; background-clip: padding-box; border: 1px solid #ced4da; border-radius: .25rem; margin-left: .5rem; margin-right: .5rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;\" name=\"a\'\'\" readonly=\"readonly\" type=\"text\" placeholder=\"Redep\" data-label=\"Redep\" data-input-name=\"uppercaseInitial\" /></p>\r\n<p>Primek: <input id=\"1\" class=\"form-control component\" style=\"width: 15%; height: calc(0.59rem + 2px); padding: .375rem .75rem; font-size: .9rem; line-height: 1.6; color: #495057; background-color: #fff; background-clip: padding-box; border: 1px solid #ced4da; border-radius: .25rem; margin-left: .5rem; margin-right: .5rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;\" name=\"a\'\'\" readonly=\"readonly\" type=\"text\" placeholder=\"sss\" data-label=\"sss\" data-input-name=\"uppercaseInitial\" /></p>', '2019-06-06 09:54:55', '2019-06-06 09:54:55', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabele `inputs`
--

CREATE TABLE `inputs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `form_id` bigint(20) UNSIGNED NOT NULL,
  `input_template_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `inputs`
--

INSERT INTO `inputs` (`id`, `label`, `created_at`, `updated_at`, `form_id`, `input_template_id`) VALUES
(1, 'Bla', '2019-06-06 07:38:28', '2019-06-06 07:38:28', 1, 2),
(2, 'Redep', '2019-06-06 09:54:55', '2019-06-06 09:54:55', 2, 2),
(3, 'sss', '2019-06-06 09:54:55', '2019-06-06 09:54:55', 2, 2);

-- --------------------------------------------------------

--
-- Struktura tabele `input_templates`
--

CREATE TABLE `input_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `input_templates`
--

INSERT INTO `input_templates` (`id`, `template`, `name`, `created_at`, `updated_at`) VALUES
(1, '<input type=\"text\" data-parsley-palindrome=\"\" data-parsley-required=\"true\">', 'basicInput2', NULL, NULL),
(2, '<input type=\"text\" data-parsley-uppercase-initial=\"\" data-parsley-required=\"true\">', 'uppercaseInitial', NULL, NULL),
(3, '<input type=\"date\" data-parsley-required=\"true\">', 'date', NULL, NULL),
(4, '<input type=\"text\" data-parsley-required=\"true\">', 'required', NULL, NULL),
(5, '<input type=\"text\" data-parsley-registration-plate=\"\" data-parsley-required=\"true\">', 'registrationPlate', NULL, NULL),
(6, '<input type=\"text\" data-parsley-vin=\"\" data-parsley-required=\"true\">', 'vin', NULL, NULL),
(7, '<input type=\"text\" data-parsley-emso=\"\" data-parsley-required=\"true\">', 'emso', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabele `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(119, '2014_10_12_000000_create_users_table', 1),
(120, '2014_10_12_100000_create_password_resets_table', 1),
(121, '2019_05_25_194809_create_forms_table', 1),
(122, '2019_05_25_201139_create_inputs_table', 1),
(123, '2019_05_25_201255_create_input_templates_table', 1),
(124, '2019_05_30_102555_create_categories_table', 1);

-- --------------------------------------------------------

--
-- Struktura tabele `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Luka Gričar1', 'luka.lukec4@hotmail.com', NULL, '$2y$10$QObJfmvkbiqIERsRua.ybOKAvEipfLJxEDDjUjXlEWNTytOSjlkNi', NULL, '2019-06-06 07:09:35', '2019-06-06 07:09:58');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `inputs`
--
ALTER TABLE `inputs`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `input_templates`
--
ALTER TABLE `input_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeksi tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT tabele `forms`
--
ALTER TABLE `forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT tabele `inputs`
--
ALTER TABLE `inputs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT tabele `input_templates`
--
ALTER TABLE `input_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT tabele `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
