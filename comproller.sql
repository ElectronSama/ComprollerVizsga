-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2025 at 07:20 PM
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
-- Table structure for table `csekkolasok`
--

CREATE TABLE `csekkolasok` (
  `DolgozoID` int(20) NOT NULL,
  `Vezeteknev` varchar(255) DEFAULT NULL,
  `Keresztnev` varchar(255) DEFAULT NULL,
  `Datum_Be` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `Datum_Ki` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `csekkolasok`
--

INSERT INTO `csekkolasok` (`DolgozoID`, `Vezeteknev`, `Keresztnev`, `Datum_Be`, `Datum_Ki`) VALUES
(1, 'Hunyodi', 'János', '2025-03-01 10:10:00', '2025-03-01 10:10:00'),
(2, 'Hunyodi', 'János', '2025-02-25 12:10:00', '2025-02-25 12:00:00'),
(3, 'Hunyodi', 'János', '2025-03-01 10:10:00', '2025-03-01 10:20:00'),
(4, 'Hunyodi', 'János', '2025-02-25 10:15:00', '2025-02-25 10:20:00'),
(5, 'Hunyodi', 'János', '2025-02-25 09:00:00', '2025-02-25 08:10:00'),
(6, 'Hunyodi', 'János', '2025-02-25 10:10:00', '2025-02-25 10:30:00'),
(7, 'Hunyodi', 'János', '2025-02-25 10:10:00', '2025-02-25 09:10:00'),
(8, 'Nagy', 'Péter', '2025-03-01 10:10:00', ' 10:30:00');

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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nyilvantartas`
--

CREATE TABLE `nyilvantartas` (
  `DolgozoID` bigint(20) UNSIGNED NOT NULL,
  `Keresztnev` varchar(255) NOT NULL,
  `Vezeteknev` varchar(255) NOT NULL,
  `Szuletesi_datum` varchar(255) NOT NULL,
  `Anyja_neve` varchar(255) NOT NULL,
  `Tajszam` varchar(255) NOT NULL,
  `Adoszam` varchar(255) NOT NULL,
  `Bankszamlaszam` varchar(255) NOT NULL,
  `Alapber` varchar(255) NOT NULL,
  `Cim` varchar(255) NOT NULL,
  `Allampolgarsag` varchar(255) NOT NULL,
  `Tartozkodasi_hely` varchar(255) NOT NULL,
  `Szemelyigazolvany_szam` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Telefonszam` varchar(255) NOT NULL,
  `Munkakor` varchar(255) NOT NULL,
  `Megjegyzes` varchar(255) NOT NULL,
  `Qrcode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nyilvantartas`
--

INSERT INTO `nyilvantartas` (`DolgozoID`, `Keresztnev`, `Vezeteknev`, `Szuletesi_datum`, `Anyja_neve`, `Tajszam`, `Adoszam`, `Bankszamlaszam`, `Alapber`, `Cim`, `Allampolgarsag`, `Tartozkodasi_hely`, `Szemelyigazolvany_szam`, `Email`, `Telefonszam`, `Munkakor`, `Megjegyzes`, `Qrcode`, `created_at`, `updated_at`) VALUES
(1, 'Károly', 'Fodor', '1984-12-09', 'Nagy Erzsébet', '123456789', '12345678-1-12', '123456789123', '5500', 'Petőfi út 31.', 'magyar', '1234 Petőfi út 31.', '123456JJ', 'karoly.fodor@gmail.com', '06301111114', 'Asztalos', 'Példa.', 'edcv8rfvb', '2025-11-01 03:30:00', '2025-02-01 15:15:00'),
(2, 'Anna', 'Kovács', '1990-05-12', 'Nagy Éva', '234567890', '23456789-2-23', '234567890123', '3000', 'Kossuth út 2.', 'magyar', '2345 Kossuth út 2.', '234567GG', 'anna.kovacs@gmail.com', '06302222222', 'Könyvelő', 'Példa.', 'qwe9rtyu', '2025-01-15 07:00:00', '2025-09-20 12:30:00'),
(3, 'Péter', 'Nagy', '1988-07-23', 'Kiss Mária', '345678901', '34567890-3-34', '345678901234', '2800', 'Széchenyi út 3.', 'magyar', '3456 Széchenyi út 3.', '345678HH', 'peter.nagy@gmail.com', '06303333333', 'Villanyszerelő', 'Példa.', 'asdf8ghj', '2025-02-10 08:15:00', '2025-08-25 14:45:00'),
(4, 'Zsuzsanna', 'Tóth', '1992-09-15', 'Horváth Ilona', '456789012', '45678901-4-45', '456789012345', '3200', 'Ady Endre út 4.', 'magyar', '4567 Ady Endre út 4.', '456789II', 'zsuzsanna.toth@gmail.com', '06304444444', 'Takarító', 'Példa.', 'zxcv8bnm', '2025-03-20 09:30:00', '2025-07-30 10:00:00'),
(5, 'Gábor', 'Szabó', '1987-11-30', 'Fekete Klára', '567890123', '56789012-5-56', '567890123456', '2700', 'Béke út 5.', 'magyar', '5678 Béke út 5.', '567890JJ', 'gabor.szabo@gmail.com', '06305555555', 'Kőműves', 'Példa.', 'poiu8ytre', '2025-04-05 09:45:00', '2025-06-15 16:00:00'),
(6, 'Eszter', 'Horváth', '1995-03-22', 'Varga Erzsébet', '678901234', '67890123-6-67', '678901234567', '3100', 'Dózsa út 6.', 'magyar', '6789 Dózsa út 6.', '678901KK', 'eszter.horvath@gmail.com', '06306666666', 'Recepciós', 'Példa.', 'lkjh8gfds', '2025-05-12 10:00:00', '2025-05-10 08:15:00'),
(7, 'Balázs', 'Varga', '1984-08-14', 'Tóth Anna', '789012345', '78901234-7-78', '789012345678', '2900', 'Petőfi út 7.', 'magyar', '7890 Petőfi út 7.', '789012LL', 'balazs.varga@gmail.com', '06307777777', 'Asztalos', 'Példa.', 'mnbv8cxz', '2025-06-18 11:30:00', '2025-04-05 07:45:00'),
(8, 'Katalin', 'Molnár', '1993-12-05', 'Kovács Erzsébet', '890123456', '89012345-8-89', '890123456789', '3300', 'Kossuth út 8.', 'magyar', '8901 Kossuth út 8.', '890123MM', 'katalin.molnar@gmail.com', '06308888888', 'Pincér', 'Példa.', 'qaz8wsx', '2025-07-22 12:45:00', '2025-03-20 07:30:00'),
(9, 'Tamás', 'Farkas', '1986-06-18', 'Nagy Mária', '901234567', '90123456-9-90', '901234567890', '2600', 'Széchenyi út 9.', 'magyar', '9012 Széchenyi út 9.', '901234NN', 'tamas.farkas@gmail.com', '06309999999', 'Kertész', 'Példa.', 'edcr8fvt', '2025-08-30 13:00:00', '2025-02-15 16:00:00'),
(10, 'Judit', 'Balogh', '1991-04-25', 'Horváth Erzsébet', '012345678', '01234567-0-01', '012345678901', '3400', 'Ady Endre út 10.', 'magyar', '0123 Ady Endre út 10.', '012345OO', 'judit.balogh@gmail.com', '06301010101', 'Takarító', 'Példa.', 'rfv8tgby', '2025-09-05 14:15:00', '2025-01-10 13:45:00'),
(11, 'László', 'Papp', '1989-10-10', 'Kiss Erzsébet', '123456780', '12345678-1-12', '123456780123', '3500', 'Béke út 11.', 'magyar', '1234 Béke út 11.', '123456PP', 'laszlo.papp@gmail.com', '06301111112', 'Villanyszerelő', 'Példa.', 'tgby8hnuj', '2025-01-01 07:30:00', '2025-10-01 10:00:00'),
(12, 'Mária', 'Lakatos', '1994-02-28', 'Nagy Erzsébet', '234567890', '23456789-2-23', '234567890234', '3600', 'Dózsa út 12.', 'magyar', '2345 Dózsa út 12.', '234567QQ', 'maria.lakatos@gmail.com', '06302222223', 'Könyvelő', 'Példa.', 'yhnu8jmik', '2025-02-15 08:45:00', '2025-09-15 09:30:00'),
(13, 'István', 'Kiss', '1983-07-19', 'Tóth Erzsébet', '345678901', '34567890-3-34', '345678901345', '3700', 'Petőfi út 13.', 'magyar', '3456 Petőfi út 13.', '345678RR', 'istvan.kiss@gmail.com', '06303333334', 'Asztalos', 'Példa.', 'ujm8ikol', '2025-03-10 09:00:00', '2025-08-10 08:45:00'),
(14, 'Erika', 'Németh', '1996-05-08', 'Kovács Erzsébet', '456789012', '45678901-4-45', '456789012456', '3800', 'Kossuth út 14.', 'magyar', '4567 Kossuth út 14.', '456789SS', 'erika.nemeth@gmail.com', '06304444445', 'Pincér', 'Példa.', 'ikol8pzaq', '2025-04-05 09:15:00', '2025-07-05 07:30:00'),
(15, 'Zoltán', 'Fekete', '1982-09-21', 'Horváth Erzsébet', '567890123', '56789012-5-56', '567890123567', '3900', 'Széchenyi út 15.', 'magyar', '5678 Széchenyi út 15.', '567890TT', 'zoltan.fekete@gmail.com', '06305555556', 'Kertész', 'Példa.', 'pzaq8wsxc', '2025-05-01 10:30:00', '2025-06-01 06:15:00'),
(16, 'Gabriella', 'Szűcs', '1997-11-03', 'Nagy Erzsébet', '678901234', '67890123-6-67', '678901234678', '4000', 'Ady Endre út 16.', 'magyar', '6789 Ady Endre út 16.', '678901UU', 'gabriella.szucs@gmail.com', '06306666667', 'Takarító', 'Példa.', 'wsxc8edcv', '2025-06-15 11:45:00', '2025-05-15 05:00:00'),
(17, 'Ferenc', 'Tóth', '1981-03-14', 'Kiss Erzsébet', '789012345', '78901234-7-78', '789012345789', '4100', 'Béke út 17.', 'magyar', '7890 Béke út 17.', '789012VV', 'ferenc.toth@gmail.com', '06307777778', 'Villanyszerelő', 'Példa.', 'edcv8rfvb', '2025-07-10 12:00:00', '2025-04-10 04:45:00'),
(18, 'Anikó', 'Varga', '1998-08-26', 'Tóth Erzsébet', '890123456', '89012345-8-89', '890123456890', '4200', 'Dózsa út 18.', 'magyar', '8901 Dózsa út 18.', '890123WW', 'aniko.varga@gmail.com', '06308888889', 'Könyvelő', 'Példa.', 'rfvb8tgyn', '2025-08-05 13:15:00', '2025-03-05 04:30:00'),
(19, 'Róbert', 'Kovács', '1980-12-07', 'Nagy Erzsébet', '901234567', '90123456-9-90', '901234567901', '4300', 'Petőfi út 19.', 'magyar', '9012 Petőfi út 19.', '901234XX', 'robert.kovacs@gmail.com', '06309999990', 'Asztalos', 'Példa.', 'tgyn8hujm', '2025-09-01 14:30:00', '2025-02-01 03:15:00'),
(20, 'Szilvia', 'Mészáros', '1999-01-18', 'Horváth Erzsébet', '012345678', '01234567-0-01', '012345678012', '4400', 'Kossuth út 20.', 'magyar', '0123 Kossuth út 20.', '012345YY', 'szilvia.meszaros@gmail.com', '06301010102', 'Pincér', 'Példa.', 'hujm8ikol', '2025-10-15 15:45:00', '2025-01-15 02:00:00'),
(21, 'Attila', 'Oláh', '1989-04-29', 'Kiss Erzsébet', '123456789', '12345678-1-12', '123456789123', '4500', 'Széchenyi út 21.', 'magyar', '1234 Széchenyi út 21.', '123456ZZ', 'attila.olah@gmail.com', '06301111113', 'Kertész', 'Példa.', 'ikol8pzaq', '2025-01-10 17:00:00', '2025-12-10 01:45:00'),
(22, 'Bernadett', 'Pintér', '1992-06-30', 'Nagy Erzsébet', '234567890', '23456789-2-23', '234567890234', '4600', 'Ady Endre út 22.', 'magyar', '2345 Ady Endre út 22.', '234567AA', 'bernadett.pinter@gmail.com', '06302222224', 'Takarító', 'Példa.', 'pzaq8wsxc', '2025-02-05 18:15:00', '2025-11-05 00:30:00'),
(23, 'Csaba', 'Simon', '1987-09-11', 'Tóth Erzsébet', '345678901', '34567890-3-34', '345678901345', '4700', 'Béke út 23.', 'magyar', '3456 Béke út 23.', '345678BB', 'csaba.simon@gmail.com', '06303333335', 'Villanyszerelő', 'Példa.', 'wsxc8edcv', '2025-03-01 19:30:00', '2025-09-30 22:15:00'),
(24, 'Dóra', 'Rácz', '1993-02-22', 'Kovács Erzsébet', '456789012', '45678901-4-45', '456789012456', '4800', 'Dózsa út 24.', 'magyar', '4567 Dózsa út 24.', '456789CC', 'dora.racz@gmail.com', '06304444446', 'Könyvelő', 'Példa.', 'edcv8rfvb', '2025-04-15 19:45:00', '2025-09-15 21:00:00'),
(25, 'Endre', 'Király', '1986-05-03', 'Horváth Erzsébet', '567890123', '56789012-5-56', '567890123567', '4900', 'Petőfi út 25.', 'magyar', '5678 Petőfi út 25.', '567890DD', 'endre.kiraly@gmail.com', '06305555557', 'Asztalos', 'Példa.', 'rfvb8tgyn', '2025-05-10 20:00:00', '2025-08-10 20:45:00'),
(26, 'Fanni', 'Bognár', '1994-08-14', 'Nagy Erzsébet', '678901234', '67890123-6-67', '678901234678', '5000', 'Kossuth út 26.', 'magyar', '6789 Kossuth út 26.', '678901EE', 'fanni.bognar@gmail.com', '06306666668', 'Pincér', 'Példa.', 'tgyn8hujm', '2025-06-05 21:15:00', '2025-07-05 19:30:00'),
(27, 'Gergő', 'Takács', '1985-11-25', 'Kiss Erzsébet', '789012345', '78901234-7-78', '789012345789', '5100', 'Széchenyi út 27.', 'magyar', '7890 Széchenyi út 27.', '789012FF', 'gergo.takacs@gmail.com', '06307777779', 'Kertész', 'Példa.', 'hujm8ikol', '2025-06-30 22:30:00', '2025-06-01 18:15:00'),
(28, 'Hedvig', 'Váradi', '1990-03-06', 'Tóth Erzsébet', '890123456', '89012345-8-89', '890123456890', '5200', 'Ady Endre út 28.', 'magyar', '8901 Ady Endre út 28.', '890123GG', 'hedvig.varadi@gmail.com', '06308888890', 'Takarító', 'Példa.', 'ikol8pzaq', '2025-08-14 23:45:00', '2025-05-15 17:00:00'),
(29, 'Imre', 'Hegedűs', '1988-06-17', 'Kovács Erzsébet', '901234567', '90123456-9-90', '901234567901', '5300', 'Béke út 29.', 'magyar', '9012 Béke út 29.', '901234HH', 'imre.hegedus@gmail.com', '06309999991', 'Villanyszerelő', 'Példa.', 'pzaq8wsxc', '2025-09-10 00:00:00', '2025-04-10 16:45:00'),
(30, 'Jolán', 'Boros', '1995-09-28', 'Horváth Erzsébet', '012345678', '01234567-0-01', '012345678012', '5400', 'Dózsa út 30.', 'magyar', '0123 Dózsa út 30.', '012345II', 'jolan.boros@gmail.com', '06301010103', 'Könyvelő', 'Példa.', 'wsxc8edcv', '2025-10-05 01:15:00', '2025-03-05 16:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('QohH5xTi1AaBs5tCOF0C7bby3WwNlC0ThcKe0qBx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:135.0) Gecko/20100101 Firefox/135.0', 'YTo0OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiWDVrbDFDcHVDdWpPdm9QbDFxa2I3RVd6azV4ZllOb09yWDZrb2VYSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC93b3JrdGltZSI7fXM6NzoiaXNBZG1pbiI7YjoxO30=', 1740853204),
('RMwItaoKUuZwhMMqQnREFSC8yK2BS6LZVIQCQ4K4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:135.0) Gecko/20100101 Firefox/135.0', 'YTozOntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoidkt4S3ZzUHpCaEo0NmFuM2l5MnRCMXhLTk5ORjZIQkRwOWFxZzBYMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=', 1740847376);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `csekkolasok`
--
ALTER TABLE `csekkolasok`
  ADD PRIMARY KEY (`DolgozoID`),
  ADD KEY `Vezeteknev` (`Vezeteknev`),
  ADD KEY `Keresztnev` (`Keresztnev`);

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
  MODIFY `DolgozoID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nyilvantartas`
--
ALTER TABLE `nyilvantartas`
  MODIFY `DolgozoID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
