-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2025 at 06:11 PM
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
  `DolgozoID` bigint(20) UNSIGNED NOT NULL,
  `Vezeteknev` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Keresztnev` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Szamfejtes_honapja` date DEFAULT NULL,
  `Osszeg` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `csekkolasok`
--

CREATE TABLE `csekkolasok` (
  `DolgozoID` bigint(20) UNSIGNED NOT NULL,
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
-- Dumping data for table `csekkolasok`
--

INSERT INTO `csekkolasok` (`DolgozoID`, `Vezeteknev`, `Keresztnev`, `Datum_Be`, `Datum_Ki`, `Kezdido`, `Vegido`, `Ora`, `Ber`, `Bonusz`, `Vegosszeg`, `created_at`, `updated_at`) VALUES
(1, 'Kovács', 'János', '2025-03-01', '2025-03-01', '10:00', '12:00', NULL, NULL, NULL, NULL, '2025-03-14 15:40:58', '2025-03-14 15:46:24'),
(2, 'Nagy', 'Anna', '2025-03-02', '2025-03-02', '10:00', '12:00', NULL, NULL, NULL, NULL, '2025-03-14 15:43:21', '2025-03-14 15:46:32'),
(3, 'Szabó', 'Péter', '2025-03-03 ', '2025-03-03 ', '10:00', '12:00', NULL, NULL, NULL, NULL, '2025-03-14 16:19:10', '2025-03-14 16:19:10'),
(4, 'Kovács', 'János', '2025-03-02 ', '2025-03-02 ', '15:00', '15:50', NULL, NULL, NULL, NULL, '2025-03-14 16:57:23', '2025-03-14 16:57:23'),
(5, 'Kovács', 'János', '2025-03-03 ', '2025-03-03 ', '10:00', '12:00', NULL, NULL, NULL, NULL, '2025-03-14 16:57:42', '2025-03-14 16:57:42');

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

-- --------------------------------------------------------

--
-- Table structure for table `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `felhasznalonev` varchar(255) NOT NULL,
  `jelszo` varchar(255) NOT NULL,
  `szerep` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `felhasznalonev`, `jelszo`, `szerep`, `created_at`, `updated_at`) VALUES
(1, 'nikecareer', '123456', 'hr', NULL, NULL),
(2, 'shellpath', '654321', 'pu', NULL, NULL),
(3, 'viola123', 'admin123', 'admin', NULL, NULL);

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
(1, 'Kovács János', '2025-03-02 ', '2025-03-02 ');

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
(1, '2025_02_09_161901_create_sessions_table', 1);

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
  `Cim` text DEFAULT NULL,
  `Allampolgarsag` varchar(100) DEFAULT NULL,
  `Tartozkodasi_hely` text DEFAULT NULL,
  `Szemelyigazolvany_szam` varchar(20) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Telefonszam` varchar(20) DEFAULT NULL,
  `Munkakor` varchar(255) DEFAULT NULL,
  `Megjegyzes` text DEFAULT NULL,
  `Qrcode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nyilvantartas`
--

INSERT INTO `nyilvantartas` (`DolgozoID`, `Keresztnev`, `Vezeteknev`, `Szuletesi_datum`, `Anyja_neve`, `Tajszam`, `Adoszam`, `Bankszamlaszam`, `Alapber`, `Cim`, `Allampolgarsag`, `Tartozkodasi_hely`, `Szemelyigazolvany_szam`, `Email`, `Telefonszam`, `Munkakor`, `Megjegyzes`, `Qrcode`, `created_at`, `updated_at`) VALUES
(1, 'János', 'Kovács', '1990-01-01', 'Erzsébet Kovács', '123456789', '123456789', 'HU123456789', '250000', 'Budapest, Fő utca 1.', 'Magyar', 'Budapest', 'AB123456', 'janos.kovacs@example.com', '0612345678', 'Számviteli munkatárs', 'Nincs megjegyzés', 'QR1234567890', '2025-03-05 17:13:57', '2025-03-05 17:13:57'),
(2, 'Anna', 'Nagy', '1985-05-12', 'Mária Nagy', '987654321', '987654321', 'HU987654321', '280000', 'Budapest, Petőfi utca 2.', 'Magyar', 'Budapest', 'XY987654', 'anna.nagy@example.com', '0612345679', 'HR munkatárs', 'Nincs megjegyzés', 'QR9876543210', '2025-03-05 17:13:57', '2025-03-05 17:13:57'),
(3, 'Péter', 'Szabó', '1992-03-03', 'Katalin Szabó', '111223344', '112233445', 'HU112233445', '320000', 'Debrecen, Kossuth utca 5.', 'Magyar', 'Debrecen', 'XY112233', 'peter.szabo@example.com', '0623456789', 'Fejlesztő', 'Nincs megjegyzés', 'QR1122334455', '2025-03-05 17:13:57', '2025-03-14 14:41:45'),
(4, 'Dolgozó', 'Példa', '2025-03-10', 'Példa Ember', '123456788', '12345678-1-15', '10000000-00000000-000000', '3000', '1000, Példa utca 01.', 'példa', '0000, Példa Példa utca 00.', 'dolgozo@gmail.com', 'dolgozo@gmail.com', '1234567891', 'Búrkoló', 'asd', 'xzw9dmmm', '2025-03-13 15:20:18', '2025-03-14 14:10:42'),
(5, 'Új', 'Dolgozó', '2025-03-14', 'Példa Anyja', '111111111', '12345678-1-30', '123456789012', '3000', 'Példa út 30.', 'magyar', 'Példa.', '111111ZZ', 'pelda2@gmail.com', '06301111111', 'Búrkoló', 'Példa', '02t2zgm0', '2025-03-14 14:12:30', '2025-03-14 14:12:30');

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
('ed6zkEKfLqBg5sY4zdHPhiDtafZQuaYT0QqPirzQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'YTo0OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiME1PbWxqMHR4bUxiU05OUEJMM2d2MGxWTGgzcEpLTEdzQmgxamxYOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC93b3JrdGltZSI7fXM6NzoiaXNBZG1pbiI7YjoxO30=', 1741972235);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berszamfejtes`
--
ALTER TABLE `berszamfejtes`
  ADD PRIMARY KEY (`DolgozoID`),
  ADD KEY `vezeteknev_szamfejtes` (`Vezeteknev`);

--
-- Indexes for table `csekkolasok`
--
ALTER TABLE `csekkolasok`
  ADD PRIMARY KEY (`DolgozoID`),
  ADD KEY `DolgozoID` (`DolgozoID`);

--
-- Indexes for table `esemenyek`
--
ALTER TABLE `esemenyek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `felhasznalok_felhasznalonev_unique` (`felhasznalonev`),
  ADD UNIQUE KEY `felhasznalok_szerep_unique` (`szerep`);

--
-- Indexes for table `ideiglenes`
--
ALTER TABLE `ideiglenes`
  ADD PRIMARY KEY (`DolgozoID`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `csekkolasok`
--
ALTER TABLE `csekkolasok`
  MODIFY `DolgozoID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `esemenyek`
--
ALTER TABLE `esemenyek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ideiglenes`
--
ALTER TABLE `ideiglenes`
  MODIFY `DolgozoID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nyilvantartas`
--
ALTER TABLE `nyilvantartas`
  MODIFY `DolgozoID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `csekkolasok`
--
ALTER TABLE `csekkolasok`
  ADD CONSTRAINT `csekkolasok_ibfk_1` FOREIGN KEY (`DolgozoID`) REFERENCES `nyilvantartas` (`DolgozoID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
