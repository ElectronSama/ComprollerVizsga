-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Már 26. 10:46
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `comproller`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_admin2@comproller.hu|::1', 'i:1;', 1742383450),
('laravel_cache_admin2@comproller.hu|::1:timer', 'i:1742383450;', 1742383450);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `csekkolasok`
--

CREATE TABLE `csekkolasok` (
  `CsekkolasID` bigint(20) UNSIGNED NOT NULL,
  `az_id` varchar(255) NOT NULL,
  `Vezeteknev` varchar(255) NOT NULL,
  `Keresztnev` varchar(255) NOT NULL,
  `Datum_Be` varchar(255) NOT NULL,
  `Datum_Ki` varchar(255) DEFAULT NULL,
  `Kezdido` varchar(255) NOT NULL,
  `Vegido` varchar(255) NOT NULL,
  `Ora` float DEFAULT NULL,
  `Ber` int(11) DEFAULT NULL,
  `Bonusz` int(11) DEFAULT NULL,
  `Vegosszeg` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `csekkolasok`
--

INSERT INTO `csekkolasok` (`CsekkolasID`, `az_id`, `Vezeteknev`, `Keresztnev`, `Datum_Be`, `Datum_Ki`, `Kezdido`, `Vegido`, `Ora`, `Ber`, `Bonusz`, `Vegosszeg`, `created_at`, `updated_at`) VALUES
(1, '', 'Nagy', 'Péter', '2025-03-01 ', '2025-03-01 ', '10:00', '12:00', NULL, NULL, NULL, NULL, '2025-03-24 19:05:12', '2025-03-24 19:05:12'),
(2, '', 'Nagy', 'Péter', '2025-03-02 ', '2025-03-02 ', '15:00', '16:00', NULL, NULL, NULL, NULL, '2025-03-24 19:05:26', '2025-03-24 19:05:26'),
(3, '', 'Nagy', 'Péter', '2025-03-03 ', '2025-03-03 ', '15:00', '16:00', NULL, NULL, NULL, NULL, '2025-03-24 19:05:44', '2025-03-24 19:05:44'),
(4, '', 'Horváth', 'Eszter', '2025-03-01 ', '2025-03-01 ', '05:00', '10:00', NULL, NULL, NULL, NULL, '2025-03-24 19:06:14', '2025-03-24 19:06:14'),
(5, '', 'Horváth', 'Eszter', '2025-03-02 ', '2025-03-02 ', '10:00', '12:00', NULL, NULL, NULL, NULL, '2025-03-24 19:06:25', '2025-03-24 19:06:25'),
(6, '1', 'Kovács', 'Anna', '2025-03-01 ', '2025-03-01 ', '10:00', '12:00', NULL, NULL, NULL, NULL, '2025-03-26 07:48:33', '2025-03-26 07:48:33'),
(7, '5', 'Horváth', 'Eszter', '2025-03-01 ', '2025-03-01 ', '10:00', '12:00', NULL, NULL, NULL, NULL, '2025-03-26 07:49:05', '2025-03-26 07:49:05'),
(8, '5', 'Horváth', 'Eszter', '2025-03-02 ', '2025-03-02 ', '10:00', '13:00', NULL, NULL, NULL, NULL, '2025-03-26 07:49:48', '2025-03-26 07:49:48'),
(9, '4', 'Szabó', 'Gábor', '2025-03-01 ', '2025-03-01 ', '10:00', '11:00', NULL, NULL, NULL, NULL, '2025-03-26 09:35:47', '2025-03-26 09:35:47'),
(10, '5', 'Horváth', 'Eszter', '2025-03-03 ', '2025-03-03 ', '10:00', '12:00', NULL, NULL, NULL, NULL, '2025-03-26 09:42:26', '2025-03-26 09:42:26');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `esemenyek`
--

CREATE TABLE `esemenyek` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `datum` date NOT NULL,
  `esemeny_neve` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `failed_jobs`
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
-- Tábla szerkezet ehhez a táblához `ideiglenes`
--

CREATE TABLE `ideiglenes` (
  `CsekkolasID` int(255) NOT NULL,
  `Nev` varchar(255) NOT NULL,
  `Datum_Be` varchar(255) NOT NULL,
  `Datum_Ki` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `ideiglenes`
--

INSERT INTO `ideiglenes` (`CsekkolasID`, `Nev`, `Datum_Be`, `Datum_Ki`) VALUES
(1, 'Horváth Eszter', '2025-03-01 ', '2025-03-01 '),
(2, 'Horváth Eszter', '2025-03-01 ', '2025-03-01 '),
(3, 'Horváth Eszter', '2025-03-02 ', '2025-03-02 '),
(4, 'Horváth Eszter', '2025-03-02 ', '2025-03-02 '),
(5, 'Horváth Eszter', '2025-03-03 ', '2025-03-03 ');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jobs`
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
-- Tábla szerkezet ehhez a táblához `job_batches`
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
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_22_184251_create_nyilvantartas_table', 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `nyilvantartas`
--

CREATE TABLE `nyilvantartas` (
  `DolgozoID` bigint(20) UNSIGNED NOT NULL,
  `Keresztnev` varchar(255) NOT NULL,
  `Vezeteknev` varchar(255) NOT NULL,
  `Szuletesi_datum` date NOT NULL,
  `Anyja_neve` varchar(255) DEFAULT NULL,
  `Tajszam` varchar(11) DEFAULT NULL,
  `Adoszam` varchar(20) DEFAULT NULL,
  `Bankszamlaszam` varchar(24) DEFAULT NULL,
  `Alapber` varchar(255) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Telefonszam` varchar(20) DEFAULT NULL,
  `Munkakor` varchar(255) DEFAULT NULL,
  `Qrcode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `nyilvantartas`
--

INSERT INTO `nyilvantartas` (`DolgozoID`, `Keresztnev`, `Vezeteknev`, `Szuletesi_datum`, `Anyja_neve`, `Tajszam`, `Adoszam`, `Bankszamlaszam`, `Alapber`, `Email`, `Telefonszam`, `Munkakor`, `Qrcode`, `created_at`, `updated_at`) VALUES
(1, 'Anna', 'Kovács', '1985-05-12', 'Nagy Erzsébet', '12345678901', '1234567890', 'HU0012345678901234567890', '450000', 'anna.kovacs@example.com', '+3612345678', 'HR vezető', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(2, 'Péter', 'Nagy', '1990-08-23', 'Kiss Mária', '23456789012', '2345678901', 'HU0023456789012345678901', '380000', 'peter.nagy@example.com', '+3623456789', 'Fejlesztő', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(3, 'Zsófia', 'Tóth', '1988-11-15', 'Szabó Ilona', '34567890123', '3456789012', 'HU0034567890123456789012', '420000', 'zsofia.toth@example.com', '+3634567890', 'Pénzügyi asszisztens', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(4, 'Gábor', 'Szabó', '1992-03-28', 'Horváth Anna', '45678901234', '4567890123', 'HU0045678901234567890123', '360000', 'gabor.szabo@example.com', '+3645678901', 'Marketing szakember', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(5, 'Eszter', 'Horváth', '1987-07-19', 'Tóth Katalin', '56789012345', '5678901234', 'HU0056789012345678901234', '410000', 'eszter.horvath@example.com', '+3656789012', 'Termék menedzser', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `sessions`
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
-- A tábla adatainak kiíratása `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('gArstTudQF0FoRNWjk1iPqh8u2LvyRVECTU9kfS1', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMDl4YjVhd0p0RjJIbVBnUE1PRW5VUmhaRVhKUUc4SFhxOGcyZ2d0MyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wcm9maWxlIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1742892343),
('wBg7OrHe8uaSoI1QEqYul8m8NqhsbpLJzi9BRNw8', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRkR3dkpjcGdjTDQzNFZhMU83Z1pqUE5LZE5nQ21XNjZEajZhN0FReiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC93b3JrdGltZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1742982354),
('WbWUMt1c12eTxykJpkuWiSQ9VlE5h6F5VX9WtZdq', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWlhjRmUwbXdsNVIzSzU3NldhZnE4bU1DNE9VVVhTWVJ6VmV2WVN6WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC93b3JrdGltZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1742975285);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kiss Bercel', 'admin@comproller.hu', NULL, '$2y$12$XPRYhAWx.CRYfwdyLYUXL.goazWV9hoKjsaAtNNFXdGdXNLAuEFqa', NULL, '2025-03-19 10:49:25', '2025-03-19 10:49:25'),
(2, 'Kiss Bercel', 'kiss.berci20@gmail.com', NULL, '$2y$12$a39si9jlbupSGUU2J7.hvuiwcC7G6T6Tkm63FXF2f21ZHTTMJaQSy', 'ZOQtq0qRSFOwh5fbgqTRdVX0hIdbvn0DIlGZO3CqzfFKrDpkzjNAZJ39OGWK', '2025-03-19 18:27:59', '2025-03-19 18:27:59'),
(3, 'pelda', 'pelda@gmail', NULL, '$2y$12$wLNxTfVpkfXMb9rrx9YTKOZVrKvfTE9j5U70Bg69MWGNgR7uB49uO', NULL, '2025-03-25 06:03:58', '2025-03-25 06:03:58');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- A tábla indexei `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- A tábla indexei `csekkolasok`
--
ALTER TABLE `csekkolasok`
  ADD PRIMARY KEY (`CsekkolasID`);

--
-- A tábla indexei `esemenyek`
--
ALTER TABLE `esemenyek`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- A tábla indexei `ideiglenes`
--
ALTER TABLE `ideiglenes`
  ADD PRIMARY KEY (`CsekkolasID`);

--
-- A tábla indexei `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- A tábla indexei `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `nyilvantartas`
--
ALTER TABLE `nyilvantartas`
  ADD PRIMARY KEY (`DolgozoID`);

--
-- A tábla indexei `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- A tábla indexei `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `csekkolasok`
--
ALTER TABLE `csekkolasok`
  MODIFY `CsekkolasID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `esemenyek`
--
ALTER TABLE `esemenyek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `ideiglenes`
--
ALTER TABLE `ideiglenes`
  MODIFY `CsekkolasID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `nyilvantartas`
--
ALTER TABLE `nyilvantartas`
  MODIFY `DolgozoID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
