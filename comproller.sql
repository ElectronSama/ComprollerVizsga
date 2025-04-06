-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2025 at 08:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comproller`
--

-- --------------------------------------------------------

--
-- Table structure for table `berszamfejtes`
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
-- Dumping data for table `berszamfejtes`
--

INSERT INTO `berszamfejtes` (`id`, `DolgozoID`, `vezeteknev`, `keresztnev`, `honap`, `ber`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kovács', 'Ádám', '2025-04-06', 3500, '2025-04-06 16:26:11', '2025-04-06 16:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_admin2@comproller.hu|::1', 'i:1;', 1742383450),
('laravel_cache_admin2@comproller.hu|::1:timer', 'i:1742383450;', 1742383450);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `csekkolasok`
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
-- Dumping data for table `csekkolasok`
--

INSERT INTO `csekkolasok` (`CsekkolasID`, `az_id`, `Vezeteknev`, `Keresztnev`, `Datum_Be`, `Datum_Ki`, `Kezdido`, `Vegido`, `Ora`, `Ber`, `Bonusz`, `Vegosszeg`, `Szamfejtve`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kovács', 'Ádám', '2025-04-01', '2025-04-01', '10:00:00', '12:00:00', 2, 1000, 0, 1000, 1, '2025-04-06 18:25:30', '2025-04-06 16:26:11'),
(2, 1, 'Kovács', 'Ádám', '2025-04-02', '2025-04-02', '10:00:00', '12:00:00', 2, 1000, 0, 1000, 1, '2025-04-06 18:25:46', '2025-04-06 16:26:11'),
(3, 1, 'Kovács', 'Ádám', '2025-04-03', '2025-04-03', '22:00:00', '13:00:00', 3, 1500, 0, 1500, 1, '2025-04-06 18:26:03', '2025-04-06 16:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `esemenyek`
--

CREATE TABLE `esemenyek` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `datum` date NOT NULL,
  `esemeny_neve` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `esemenyek`
--

INSERT INTO `esemenyek` (`id`, `datum`, `esemeny_neve`, `created_at`, `updated_at`) VALUES
(1, '2025-04-10', 'valami', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `ideiglenes`
--

CREATE TABLE `ideiglenes` (
  `DolgozoID` int(255) NOT NULL,
  `Nev` varchar(255) NOT NULL,
  `Datum_Be` varchar(255) NOT NULL,
  `Datum_Ki` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ideiglenes`
--

INSERT INTO `ideiglenes` (`DolgozoID`, `Nev`, `Datum_Be`, `Datum_Ki`) VALUES
(1, 'Kovács Ádám', '2025-04-01', '2025-04-01'),
(2, 'Kovács Ádám', '2025-04-02', '2025-04-02'),
(3, 'Kovács Ádám', '2025-04-03', '2025-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_22_184251_create_nyilvantartas_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nyilvantartas`
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
-- Dumping data for table `nyilvantartas`
--

INSERT INTO `nyilvantartas` (`DolgozoID`, `Keresztnev`, `Vezeteknev`, `Szuletesi_datum`, `Anyja_neve`, `Tajszam`, `Adoszam`, `Bankszamlaszam`, `Alapber`, `Email`, `Telefonszam`, `Munkakor`, `Qrcode`, `created_at`, `updated_at`) VALUES
(1, 'Ádám', 'Kovács', '1985-05-12', 'Kovácsné Horváth Ilona', '12345678901', '12345678901', 'HU0012345678901234567890', '450000', 'adam.kovacs@example.com', '+36301234567', 'Projektmenedzser', 'QRCODE001', '2025-04-06 18:17:56', '2025-04-06 18:17:56'),
(2, 'Béla', 'Nagy', '1990-08-23', 'Nagyné Kiss Mária', '23456789012', '23456789012', 'HU0023456789012345678901', '380000', 'bela.nagy@example.com', '+36201234567', 'Fejlesztő', 'QRCODE002', '2025-04-06 18:17:56', '2025-04-06 18:17:56'),
(3, 'Cecília', 'Szabó', '1988-11-15', 'Szabóné Tóth Erzsébet', '34567890123', '34567890123', 'HU0034567890123456789012', '420000', 'cecilia.szabo@example.com', '+36701234567', 'HR szakember', 'QRCODE003', '2025-04-06 18:17:56', '2025-04-06 18:17:56'),
(4, 'Dénes', 'Horváth', '1992-03-04', 'Horváthné Fekete Anna', '45678901234', '45678901234', 'HU0045678901234567890123', '360000', 'denes.horvath@example.com', '+36202234567', 'Tesztelő', 'QRCODE004', '2025-04-06 18:17:56', '2025-04-06 18:17:56'),
(5, 'Erika', 'Tóth', '1987-07-19', 'Tóthné Molnár Ildikó', '56789012345', '56789012345', 'HU0056789012345678901234', '410000', 'erika.toth@example.com', '+36302234567', 'Ügyfélszolgálatos', 'QRCODE005', '2025-04-06 18:17:56', '2025-04-06 18:17:56'),
(6, 'Ferenc', 'Varga', '1993-09-28', 'Vargáné Simon Eszter', '67890123456', '67890123456', 'HU0067890123456789012345', '370000', 'ferenc.varga@example.com', '+36702234567', 'Rendszergazda', 'QRCODE006', '2025-04-06 18:17:56', '2025-04-06 18:17:56'),
(7, 'Gizella', 'Molnár', '1986-01-30', 'Molnárné Kovács Judit', '78901234567', '78901234567', 'HU0078901234567890123456', '440000', 'gizella.molnar@example.com', '+36203234567', 'Pénzügyi szakember', 'QRCODE007', '2025-04-06 18:17:56', '2025-04-06 18:17:56'),
(8, 'Hunor', 'Farkas', '1991-12-08', 'Farkasné Nagy Katalin', '89012345678', '89012345678', 'HU0089012345678901234567', '390000', 'hunor.farkas@example.com', '+36303234567', 'Marketing szakember', 'QRCODE008', '2025-04-06 18:17:56', '2025-04-06 18:17:56'),
(9, 'Ilona', 'Balogh', '1989-04-17', 'Balogné Szabó Magdolna', '90123456789', '90123456789', 'HU0090123456789012345678', '430000', 'ilona.balogh@example.com', '+36703234567', 'Logisztikai koordinátor', 'QRCODE009', '2025-04-06 18:17:56', '2025-04-06 18:17:56'),
(10, 'János', 'Papp', '1994-06-25', 'Pappné Horváth Éva', '01234567890', '01234567890', 'HU0001234567890123456789', '350000', 'janos.papp@example.com', '+36204234567', 'Adminisztrátor', 'QRCODE010', '2025-04-06 18:17:56', '2025-04-06 18:17:56'),
(11, 'Katalin', 'Lakatos', '1984-10-11', 'Lakatosné Tóth Zsuzsanna', '11234567890', '11234567890', 'HU0112345678901234567890', '470000', 'katalin.lakatos@example.com', '+36304234567', 'Termékvezető', 'QRCODE011', '2025-04-06 18:17:56', '2025-04-06 18:17:56'),
(12, 'László', 'Takács', '1995-02-14', 'Takácsné Varga Mónika', '22345678901', '22345678901', 'HU0223456789012345678901', '340000', 'laszlo.takacs@example.com', '+36704234567', 'Támogató szolgálat', 'QRCODE012', '2025-04-06 18:17:56', '2025-04-06 18:17:56'),
(13, 'Mária', 'Juhász', '1983-07-07', 'Juhászné Farkas Anikó', '33456789012', '33456789012', 'HU0334567890123456789012', '480000', 'maria.juhasz@example.com', '+36205234567', 'Igazgatósági titkár', 'QRCODE013', '2025-04-06 18:17:56', '2025-04-06 18:17:56'),
(14, 'Norbert', 'Mészáros', '1996-05-03', 'Mészárosné Balogh Klára', '44567890123', '44567890123', 'HU0445678901234567890123', '330000', 'norbert.meszaros@example.com', '+36305234567', 'Gyakornok', 'QRCODE014', '2025-04-06 18:17:56', '2025-04-06 18:17:56'),
(15, 'Orsolya', 'Simon', '1982-09-21', 'Simonné Molnár Gabriella', '55678901234', '55678901234', 'HU0556789012345678901234', '490000', 'orsolya.simon@example.com', '+36705234567', 'Vezérigazgató', 'QRCODE015', '2025-04-06 18:17:56', '2025-04-06 18:17:56'),
(16, 'Péter', 'Rácz', '1997-11-29', 'Ráczné Juhász Mariann', '66789012345', '66789012345', 'HU0667890123456789012345', '320000', 'peter.racz@example.com', '+36206234567', 'Gyakornok', 'QRCODE016', '2025-04-06 18:17:56', '2025-04-06 18:17:56'),
(17, 'Renáta', 'Fekete', '1981-12-31', 'Feketéné Lakatos Edit', '77890123456', '77890123456', 'HU0778901234567890123456', '500000', 'renata.fekete@example.com', '+36306234567', 'Üzleti elemző', 'QRCODE017', '2025-04-06 18:17:56', '2025-04-06 18:17:56'),
(18, 'Szabolcs', 'Kiss', '1998-04-05', 'Kissné Rácz Viktória', '88901234567', '88901234567', 'HU0889012345678901234567', '310000', 'szabolcs.kiss@example.com', '+36706234567', 'Gyakornok', 'QRCODE018', '2025-04-06 18:17:56', '2025-04-06 18:17:56'),
(19, 'Teréz', 'Szűcs', '1980-08-18', 'Szűcsné Simon Henrietta', '99012345678', '99012345678', 'HU0990123456789012345678', '510000', 'terez.szucs@example.com', '+36207234567', 'Jogi tanácsadó', 'QRCODE019', '2025-04-06 18:17:56', '2025-04-06 18:17:56'),
(20, 'Ulrik', 'Bíró', '1999-01-22', 'Bíróné Fekete Bernadett', '00123456789', '00123456789', 'HU0000123456789012345678', '300000', 'ulrik.biro@example.com', '+36307234567', 'Gyakornok', 'QRCODE020', '2025-04-06 18:17:56', '2025-04-06 18:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('EwRZDycWlA6f23p5hCPCFWwuzByBHpmzb5Ec3LfI', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWDMzR2dhZUJHZGtwQTY2ZjhITmo4V3lzVk9XM1NmbjFJMnVOcjNCeiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3QvcGF5cm9sbC1jYWxjdWxhdGlvbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1743406045),
('jmzYPAxLfoBI2cWmCVevebLZ3F1tD2qte2uylsm8', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia2NScnZEZkZwZFd4alJqcmpOSWkxaFh3NEFYcG1yaU42SnFFd1NtWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTY6Imh0dHA6Ly9sb2NhbGhvc3QiO319', 1743351891),
('lef1NOWFTxiNuUKAqGnV2D4szNmskRYqSiSWoLxg', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibFVmMkowWTV1REFIbEZrYXowTXhJWjdrcU53ZGRHVzczU1FsWUt4ayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3QvcGF5cm9sbC1jYWxjdWxhdGlvbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1743349052),
('qfdiCBvCHYyb7tvZDgvCSYhn4c6sLol6dyZA6NMH', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:137.0) Gecko/20100101 Firefox/137.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRDh2Qlk2VnZDQzR0eWhwUTJFMjI1c1dVQk1McVVJVTJTM0xzT3BvSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1743964045);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'pelda', 'pelda@gmail', NULL, '$2y$12$97hMH4XinXy4Bmod6143OuirRpEqL8jYCjI8GE46YHFlRi8tDX.U2', NULL, '2025-04-06 16:20:35', '2025-04-06 16:20:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berszamfejtes`
--
ALTER TABLE `berszamfejtes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berszamfejtes_dolgozoid_foreign` (`DolgozoID`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `csekkolasok`
--
ALTER TABLE `csekkolasok`
  ADD PRIMARY KEY (`CsekkolasID`),
  ADD KEY `az_id` (`az_id`);

--
-- Indexes for table `esemenyek`
--
ALTER TABLE `esemenyek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ideiglenes`
--
ALTER TABLE `ideiglenes`
  ADD PRIMARY KEY (`DolgozoID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nyilvantartas`
--
ALTER TABLE `nyilvantartas`
  ADD PRIMARY KEY (`DolgozoID`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berszamfejtes`
--
ALTER TABLE `berszamfejtes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `csekkolasok`
--
ALTER TABLE `csekkolasok`
  MODIFY `CsekkolasID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `esemenyek`
--
ALTER TABLE `esemenyek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ideiglenes`
--
ALTER TABLE `ideiglenes`
  MODIFY `DolgozoID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nyilvantartas`
--
ALTER TABLE `nyilvantartas`
  MODIFY `DolgozoID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berszamfejtes`
--
ALTER TABLE `berszamfejtes`
  ADD CONSTRAINT `berszamfejtes_dolgozoid_foreign` FOREIGN KEY (`DolgozoID`) REFERENCES `nyilvantartas` (`DolgozoID`) ON DELETE CASCADE;

--
-- Constraints for table `csekkolasok`
--
ALTER TABLE `csekkolasok`
  ADD CONSTRAINT `csekkolasok_ibfk_1` FOREIGN KEY (`az_id`) REFERENCES `nyilvantartas` (`DolgozoID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
