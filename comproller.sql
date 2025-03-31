-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Már 31. 09:36
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

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
-- Tábla szerkezet ehhez a táblához `berszamfejtes`
--

CREATE TABLE `berszamfejtes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `DolgozoID` bigint(20) UNSIGNED NOT NULL,
  `vezeteknev` varchar(255) NOT NULL,
  `keresztnev` varchar(255) NOT NULL,
  `honap` date NOT NULL,
  `ber` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `berszamfejtes`
--

INSERT INTO `berszamfejtes` (`id`, `DolgozoID`, `vezeteknev`, `keresztnev`, `honap`, `ber`, `created_at`, `updated_at`) VALUES
(4, 1, 'Kiss', 'Bercel', '2025-03-31', 80000, '2025-03-31 05:27:20', '2025-03-31 05:27:20');

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
  `az_id` bigint(20) UNSIGNED NOT NULL,
  `Vezeteknev` varchar(255) NOT NULL,
  `Keresztnev` varchar(255) NOT NULL,
  `Datum_Be` varchar(255) NOT NULL,
  `Datum_Ki` varchar(255) DEFAULT NULL,
  `Kezdido` varchar(255) NOT NULL,
  `Vegido` varchar(255) DEFAULT NULL,
  `Ora` float DEFAULT NULL,
  `Ber` int(11) DEFAULT NULL,
  `Bonusz` int(11) DEFAULT NULL,
  `Vegosszeg` int(11) DEFAULT NULL,
  `Szamfejtve` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `csekkolasok`
--

INSERT INTO `csekkolasok` (`CsekkolasID`, `az_id`, `Vezeteknev`, `Keresztnev`, `Datum_Be`, `Datum_Ki`, `Kezdido`, `Vegido`, `Ora`, `Ber`, `Bonusz`, `Vegosszeg`, `Szamfejtve`, `created_at`, `updated_at`) VALUES
(32, 1, 'Kiss', 'Bercel', '2025-03-01', '2025-03-01', '08:00:00', '16:00:00', 8, 2000, 0, 16000, 1, '2025-03-30 12:14:57', '2025-03-31 05:27:20'),
(33, 1, 'Kiss', 'Bercel', '2025-03-02', '2025-03-02', '08:00:00', '16:00:00', 8, 2000, 0, 16000, 1, '2025-03-30 12:14:59', '2025-03-31 05:27:20'),
(34, 1, 'Kiss', 'Bercel', '2025-03-03', '2025-03-03', '08:00:00', '16:00:00', 8, 2000, 0, 16000, 1, '2025-03-30 12:14:59', '2025-03-31 05:27:20'),
(35, 1, 'Kiss', 'Bercel', '2025-03-04', '2025-03-04', '08:00:00', '16:00:00', 8, 2000, 0, 16000, 1, '2025-03-30 12:14:59', '2025-03-31 05:27:20'),
(36, 1, 'Kiss', 'Bercel', '2025-03-05', '2025-03-05', '08:00:00', '16:00:00', 8, 2000, 0, 16000, 1, '2025-03-30 12:14:59', '2025-03-31 05:27:20');

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
  `DolgozoID` int(255) NOT NULL,
  `Nev` varchar(255) NOT NULL,
  `Datum_Be` varchar(255) NOT NULL,
  `Datum_Ki` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'Bercel', 'Kiss', '2025-03-03', 'Anya', '123456789', '1234567899', '111111111111111111111111', '2000', 'kiss.bercel@comprollerinfo.hu', '06204979039', 'Boss', '2d3i7f8c', '2025-03-26 18:33:55', '2025-03-26 18:33:55');

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
('EwRZDycWlA6f23p5hCPCFWwuzByBHpmzb5Ec3LfI', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWDMzR2dhZUJHZGtwQTY2ZjhITmo4V3lzVk9XM1NmbjFJMnVOcjNCeiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3QvcGF5cm9sbC1jYWxjdWxhdGlvbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1743406045),
('jmzYPAxLfoBI2cWmCVevebLZ3F1tD2qte2uylsm8', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia2NScnZEZkZwZFd4alJqcmpOSWkxaFh3NEFYcG1yaU42SnFFd1NtWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTY6Imh0dHA6Ly9sb2NhbGhvc3QiO319', 1743351891),
('lef1NOWFTxiNuUKAqGnV2D4szNmskRYqSiSWoLxg', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibFVmMkowWTV1REFIbEZrYXowTXhJWjdrcU53ZGRHVzczU1FsWUt4ayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3QvcGF5cm9sbC1jYWxjdWxhdGlvbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1743349052);

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
(2, 'Kiss Bercel', 'kiss.berci20@gmail.com', NULL, '$2y$12$a39si9jlbupSGUU2J7.hvuiwcC7G6T6Tkm63FXF2f21ZHTTMJaQSy', 'iGvj8MoZUjXR0CzaphXyT9gvGDVIxlaLKnX3jf79NVBV0pLTsXCstd2Fmhy1', '2025-03-19 18:27:59', '2025-03-19 18:27:59'),
(3, 'pelda', 'pelda@gmail', NULL, '$2y$12$wLNxTfVpkfXMb9rrx9YTKOZVrKvfTE9j5U70Bg69MWGNgR7uB49uO', NULL, '2025-03-25 06:03:58', '2025-03-25 06:03:58');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `berszamfejtes`
--
ALTER TABLE `berszamfejtes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berszamfejtes_dolgozoid_foreign` (`DolgozoID`);

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
  ADD PRIMARY KEY (`CsekkolasID`),
  ADD KEY `az_id` (`az_id`);

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
  ADD PRIMARY KEY (`DolgozoID`);

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
-- AUTO_INCREMENT a táblához `berszamfejtes`
--
ALTER TABLE `berszamfejtes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `csekkolasok`
--
ALTER TABLE `csekkolasok`
  MODIFY `CsekkolasID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  MODIFY `DolgozoID` int(255) NOT NULL AUTO_INCREMENT;

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
  MODIFY `DolgozoID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `berszamfejtes`
--
ALTER TABLE `berszamfejtes`
  ADD CONSTRAINT `berszamfejtes_dolgozoid_foreign` FOREIGN KEY (`DolgozoID`) REFERENCES `nyilvantartas` (`DolgozoID`) ON DELETE CASCADE;

--
-- Megkötések a táblához `csekkolasok`
--
ALTER TABLE `csekkolasok`
  ADD CONSTRAINT `csekkolasok_ibfk_1` FOREIGN KEY (`az_id`) REFERENCES `nyilvantartas` (`DolgozoID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
