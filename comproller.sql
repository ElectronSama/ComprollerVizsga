-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Már 11. 09:37
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
  `DolgozoID` bigint(20) UNSIGNED NOT NULL,
  `Vezeteknev` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Keresztnev` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Szamfejtes_honapja` date DEFAULT NULL,
  `Osszeg` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `csekkolasok`
--

CREATE TABLE `csekkolasok` (
  `DolgozoID` int(255) NOT NULL,
  `Vezeteknev` varchar(255) DEFAULT NULL,
  `Keresztnev` varchar(255) DEFAULT NULL,
  `Datum_Be` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `Datum_Ki` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `Kezdido` varchar(255) NOT NULL,
  `Vegido` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `csekkolasok`
--

INSERT INTO `csekkolasok` (`DolgozoID`, `Vezeteknev`, `Keresztnev`, `Datum_Be`, `Datum_Ki`, `Kezdido`, `Vegido`) VALUES
(1, 'Fodor', 'Károly', '2025-03-11', '2025-03-12', '10:00', '11:00'),
(2, 'Fodor', 'Károly', '2025-03-11', '2025-03-11', '12:00', '15:00'),
(3, 'Fodor', 'Károly', '2025-03-01 ', '2025-03-02 ', '10:00', '11:00');

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
-- Tábla szerkezet ehhez a táblához `felhasznalok`
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
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `felhasznalonev`, `jelszo`, `szerep`, `created_at`, `updated_at`) VALUES
(1, 'nikecareer', '123456', 'hr', NULL, NULL),
(2, 'shellpath', '654321', 'pu', NULL, NULL),
(5, 'viola123', 'admin123', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ideiglenes`
--

CREATE TABLE `ideiglenes` (
  `DolgozoID` int(255) NOT NULL,
  `Nev` varchar(255) NOT NULL,
  `Datum_Be` varchar(255) NOT NULL,
  `Datum_Ki` varchar(255) NOT NULL,
  `Osszora` varchar(255) NOT NULL,
  `Csekkszam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(17, '2025_02_09_161901_create_sessions_table', 1);

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
  `Adoszam` varchar(10) DEFAULT NULL,
  `Bankszamlaszam` varchar(24) DEFAULT NULL,
  `Alapber` int(11) NOT NULL,
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
-- A tábla adatainak kiíratása `nyilvantartas`
--

INSERT INTO `nyilvantartas` (`DolgozoID`, `Keresztnev`, `Vezeteknev`, `Szuletesi_datum`, `Anyja_neve`, `Tajszam`, `Adoszam`, `Bankszamlaszam`, `Alapber`, `Cim`, `Allampolgarsag`, `Tartozkodasi_hely`, `Szemelyigazolvany_szam`, `Email`, `Telefonszam`, `Munkakor`, `Megjegyzes`, `Qrcode`, `created_at`, `updated_at`) VALUES
(1, 'Károly', 'Fodor', '1984-12-09', 'Nagy Erzsébet', '123456789', '12345678-1', '123456789123', 5500, 'Petőfi út 31.', 'magyar', '1234 Petőfi út 31.', '123456JJ', 'karoly.fodor@gmail.com', '06301111114', 'Asztalos', 'Példa.', 'edcv8rfvb', '2025-11-01 02:30:00', '2025-02-01 14:15:00'),
(2, 'Anna', 'Kovács', '1990-05-12', 'Nagy Éva', '234567890', '23456789-2', '234567890123', 3000, 'Kossuth út 2.', 'magyar', '2345 Kossuth út 2.', '234567GG', 'anna.kovacs@gmail.com', '06302222222', 'Könyvelő', 'Példa.', 'qwe9rtyu', '2025-01-15 06:00:00', '2025-09-20 10:30:00'),
(3, 'Péter', 'Nagy', '1988-07-23', 'Kiss Mária', '345678901', '34567890-3', '345678901234', 2800, 'Széchenyi út 3.', 'magyar', '3456 Széchenyi út 3.', '345678HH', 'peter.nagy@gmail.com', '06303333333', 'Villanyszerelő', 'Példa.', 'asdf8ghj', '2025-02-10 07:15:00', '2025-08-25 12:45:00'),
(4, 'Zsuzsanna', 'Tóth', '1992-09-15', 'Horváth Ilona', '456789012', '45678901-4', '456789012345', 3200, 'Ady Endre út 4.', 'magyar', '4567 Ady Endre út 4.', '456789II', 'zsuzsanna.toth@gmail.com', '06304444444', 'Takarító', 'Példa.', 'zxcv8bnm', '2025-03-20 08:30:00', '2025-07-30 08:00:00'),
(5, 'Gábor', 'Szabó', '1987-11-30', 'Fekete Klára', '567890123', '56789012-5', '567890123456', 2700, 'Béke út 5.', 'magyar', '5678 Béke út 5.', '567890JJ', 'gabor.szabo@gmail.com', '06305555555', 'Kőműves', 'Példa.', 'poiu8ytre', '2025-04-05 07:45:00', '2025-06-15 14:00:00'),
(6, 'Eszter', 'Horváth', '1995-03-22', 'Varga Erzsébet', '678901234', '67890123-6', '678901234567', 3100, 'Dózsa út 6.', 'magyar', '6789 Dózsa út 6.', '678901KK', 'eszter.horvath@gmail.com', '06306666666', 'Recepciós', 'Példa.', 'lkjh8gfds', '2025-05-12 08:00:00', '2025-05-10 06:15:00'),
(7, 'Balázs', 'Varga', '1984-08-14', 'Tóth Anna', '789012345', '78901234-7', '789012345678', 2900, 'Petőfi út 7.', 'magyar', '7890 Petőfi út 7.', '789012LL', 'balazs.varga@gmail.com', '06307777777', 'Asztalos', 'Példa.', 'mnbv8cxz', '2025-06-18 09:30:00', '2025-04-05 05:45:00'),
(8, 'Katalin', 'Molnár', '1993-12-05', 'Kovács Erzsébet', '890123456', '89012345-8', '890123456789', 3300, 'Kossuth út 8.', 'magyar', '8901 Kossuth út 8.', '890123MM', 'katalin.molnar@gmail.com', '06308888888', 'Pincér', 'Példa.', 'qaz8wsx', '2025-07-22 10:45:00', '2025-03-20 06:30:00'),
(9, 'Tamás', 'Farkas', '1986-06-18', 'Nagy Mária', '901234567', '90123456-9', '901234567890', 2600, 'Széchenyi út 9.', 'magyar', '9012 Széchenyi út 9.', '901234NN', 'tamas.farkas@gmail.com', '06309999999', 'Kertész', 'Példa.', 'edcr8fvt', '2025-08-30 11:00:00', '2025-02-15 15:00:00'),
(10, 'Judit', 'Balogh', '1991-04-25', 'Horváth Erzsébet', '012345678', '01234567-0', '012345678901', 3400, 'Ady Endre út 10.', 'magyar', '0123 Ady Endre út 10.', '012345OO', 'judit.balogh@gmail.com', '06301010101', 'Takarító', 'Példa.', 'rfv8tgby', '2025-09-05 12:15:00', '2025-01-10 12:45:00'),
(11, 'László', 'Papp', '1989-10-10', 'Kiss Erzsébet', '123456780', '12345678-1', '123456780123', 3500, 'Béke út 11.', 'magyar', '1234 Béke út 11.', '123456PP', 'laszlo.papp@gmail.com', '06301111112', 'Villanyszerelő', 'Példa.', 'tgby8hnuj', '2025-01-01 06:30:00', '2025-10-01 08:00:00'),
(12, 'Mária', 'Lakatos', '1994-02-28', 'Nagy Erzsébet', '234567890', '23456789-2', '234567890234', 3600, 'Dózsa út 12.', 'magyar', '2345 Dózsa út 12.', '234567QQ', 'maria.lakatos@gmail.com', '06302222223', 'Könyvelő', 'Példa.', 'yhnu8jmik', '2025-02-15 07:45:00', '2025-09-15 07:30:00'),
(13, 'István', 'Kiss', '1983-07-19', 'Tóth Erzsébet', '345678901', '34567890-3', '345678901345', 3700, 'Petőfi út 13.', 'magyar', '3456 Petőfi út 13.', '345678RR', 'istvan.kiss@gmail.com', '06303333334', 'Asztalos', 'Példa.', 'ujm8ikol', '2025-03-10 08:00:00', '2025-08-10 06:45:00'),
(14, 'Erika', 'Németh', '1996-05-08', 'Kovács Erzsébet', '456789012', '45678901-4', '456789012456', 3800, 'Kossuth út 14.', 'magyar', '4567 Kossuth út 14.', '456789SS', 'erika.nemeth@gmail.com', '06304444445', 'Pincér', 'Példa.', 'ikol8pzaq', '2025-04-05 07:15:00', '2025-07-05 05:30:00'),
(15, 'Zoltán', 'Fekete', '1982-09-21', 'Horváth Erzsébet', '567890123', '56789012-5', '567890123567', 3900, 'Széchenyi út 15.', 'magyar', '5678 Széchenyi út 15.', '567890TT', 'zoltan.fekete@gmail.com', '06305555556', 'Kertész', 'Példa.', 'pzaq8wsxc', '2025-05-01 08:30:00', '2025-06-01 04:15:00'),
(16, 'Gabriella', 'Szűcs', '1997-11-03', 'Nagy Erzsébet', '678901234', '67890123-6', '678901234678', 4000, 'Ady Endre út 16.', 'magyar', '6789 Ady Endre út 16.', '678901UU', 'gabriella.szucs@gmail.com', '06306666667', 'Takarító', 'Példa.', 'wsxc8edcv', '2025-06-15 09:45:00', '2025-05-15 03:00:00'),
(17, 'Ferenc', 'Tóth', '1981-03-14', 'Kiss Erzsébet', '789012345', '78901234-7', '789012345789', 4100, 'Béke út 17.', 'magyar', '7890 Béke út 17.', '789012VV', 'ferenc.toth@gmail.com', '06307777778', 'Villanyszerelő', 'Példa.', 'edcv8rfvb', '2025-07-10 10:00:00', '2025-04-10 02:45:00'),
(18, 'Anikó', 'Varga', '1998-08-26', 'Tóth Erzsébet', '890123456', '89012345-8', '890123456890', 4200, 'Dózsa út 18.', 'magyar', '8901 Dózsa út 18.', '890123WW', 'aniko.varga@gmail.com', '06308888889', 'Könyvelő', 'Példa.', 'rfvb8tgyn', '2025-08-05 11:15:00', '2025-03-05 03:30:00'),
(19, 'Róbert', 'Kovács', '1980-12-07', 'Nagy Erzsébet', '901234567', '90123456-9', '901234567901', 4300, 'Petőfi út 19.', 'magyar', '9012 Petőfi út 19.', '901234XX', 'robert.kovacs@gmail.com', '06309999990', 'Asztalos', 'Példa.', 'tgyn8hujm', '2025-09-01 12:30:00', '2025-02-01 02:15:00'),
(20, 'Szilvia', 'Mészáros', '1999-01-18', 'Horváth Erzsébet', '012345678', '01234567-0', '012345678012', 4400, 'Kossuth út 20.', 'magyar', '0123 Kossuth út 20.', '012345YY', 'szilvia.meszaros@gmail.com', '06301010102', 'Pincér', 'Példa.', 'hujm8ikol', '2025-10-15 13:45:00', '2025-01-15 01:00:00'),
(21, 'Attila', 'Oláh', '1989-04-29', 'Kiss Erzsébet', '123456789', '12345678-1', '123456789123', 4500, 'Széchenyi út 21.', 'magyar', '1234 Széchenyi út 21.', '123456ZZ', 'attila.olah@gmail.com', '06301111113', 'Kertész', 'Példa.', 'ikol8pzaq', '2025-01-10 16:00:00', '2025-12-10 00:45:00'),
(22, 'Bernadett', 'Pintér', '1992-06-30', 'Nagy Erzsébet', '234567890', '23456789-2', '234567890234', 4600, 'Ady Endre út 22.', 'magyar', '2345 Ady Endre út 22.', '234567AA', 'bernadett.pinter@gmail.com', '06302222224', 'Takarító', 'Példa.', 'pzaq8wsxc', '2025-02-05 17:15:00', '2025-11-04 23:30:00'),
(23, 'Csaba', 'Simon', '1987-09-11', 'Tóth Erzsébet', '345678901', '34567890-3', '345678901345', 4700, 'Béke út 23.', 'magyar', '3456 Béke út 23.', '345678BB', 'csaba.simon@gmail.com', '06303333335', 'Villanyszerelő', 'Példa.', 'wsxc8edcv', '2025-03-01 18:30:00', '2025-09-30 20:15:00'),
(24, 'Dóra', 'Rácz', '1993-02-22', 'Kovács Erzsébet', '456789012', '45678901-4', '456789012456', 4800, 'Dózsa út 24.', 'magyar', '4567 Dózsa út 24.', '456789CC', 'dora.racz@gmail.com', '06304444446', 'Könyvelő', 'Példa.', 'edcv8rfvb', '2025-04-15 17:45:00', '2025-09-15 19:00:00'),
(25, 'Endre', 'Király', '1986-05-03', 'Horváth Erzsébet', '567890123', '56789012-5', '567890123567', 4900, 'Petőfi út 25.', 'magyar', '5678 Petőfi út 25.', '567890DD', 'endre.kiraly@gmail.com', '06305555557', 'Asztalos', 'Példa.', 'rfvb8tgyn', '2025-05-10 18:00:00', '2025-08-10 18:45:00'),
(26, 'Fanni', 'Bognár', '1994-08-14', 'Nagy Erzsébet', '678901234', '67890123-6', '678901234678', 5000, 'Kossuth út 26.', 'magyar', '6789 Kossuth út 26.', '678901EE', 'fanni.bognar@gmail.com', '06306666668', 'Pincér', 'Példa.', 'tgyn8hujm', '2025-06-05 19:15:00', '2025-07-05 17:30:00'),
(27, 'Gergő', 'Takács', '1985-11-25', 'Kiss Erzsébet', '789012345', '78901234-7', '789012345789', 5100, 'Széchenyi út 27.', 'magyar', '7890 Széchenyi út 27.', '789012FF', 'gergo.takacs@gmail.com', '06307777779', 'Kertész', 'Példa.', 'hujm8ikol', '2025-06-30 20:30:00', '2025-06-01 16:15:00'),
(28, 'Hedvig', 'Váradi', '1990-03-06', 'Tóth Erzsébet', '890123456', '89012345-8', '890123456890', 5200, 'Ady Endre út 28.', 'magyar', '8901 Ady Endre út 28.', '890123GG', 'hedvig.varadi@gmail.com', '06308888890', 'Takarító', 'Példa.', 'ikol8pzaq', '2025-08-14 21:45:00', '2025-05-15 15:00:00'),
(29, 'Imre', 'Hegedűs', '1988-06-17', 'Kovács Erzsébet', '901234567', '90123456-9', '901234567901', 5300, 'Béke út 29.', 'magyar', '9012 Béke út 29.', '901234HH', 'imre.hegedus@gmail.com', '06309999991', 'Villanyszerelő', 'Példa.', 'pzaq8wsxc', '2025-09-09 22:00:00', '2025-04-10 14:45:00'),
(30, 'Jolán', 'Boros', '1995-09-28', 'Horváth Erzsébet', '012345678', '01234567-0', '012345678012', 5400, 'Dózsa út 30.', 'magyar', '0123 Dózsa út 30.', '012345II', 'jolan.boros@gmail.com', '06301010103', 'Könyvelő', 'Példa.', 'wsxc8edcv', '2025-10-04 23:15:00', '2025-03-05 15:30:00'),
(31, 'János2', 'Hunyodi2', '2025-03-10', 'Tóth Zsuzsanna2', '123456788', '12345678-1', '123456789020', 3500, 'Petőfi út 30.', 'magyarrr', '1234 Valami Petőfi út 1.', 'pelda2@gmail.com', 'pelda2@gmail.com', '06301111122', 'Példaaa.', 'aaa', 'mjy8kaaa', '2025-03-11 07:55:58', '2025-03-03 14:01:33');

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
('Fb1EeAOJF2lWAIEs3uqdbuG6AG3CTgj47khBJ7we', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidkt4RzJlR0lFWTU3aXFTQk5DODM0TEtrNXRxNDA4dXBnODBWeWVNQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly9sb2NhbGhvc3QvcmVnaXN0cnkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjc6ImlzQWRtaW4iO2I6MTt9', 1741678582),
('XaooUKXiadJtwbUahZpnjRh25rUjRjCknX6FCfKO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoib0pnaG9zQ2xkb2E1N0JmNjBpRUlYWGZRcGp2SnU1WXRUcVJXSzd0WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC93b3JrdGltZSI7fXM6NzoiaXNBZG1pbiI7YjoxO30=', 1741682240);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `berszamfejtes`
--
ALTER TABLE `berszamfejtes`
  ADD PRIMARY KEY (`DolgozoID`),
  ADD KEY `vezeteknev_szamfejtes` (`Vezeteknev`);

--
-- A tábla indexei `csekkolasok`
--
ALTER TABLE `csekkolasok`
  ADD PRIMARY KEY (`DolgozoID`);

--
-- A tábla indexei `esemenyek`
--
ALTER TABLE `esemenyek`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `felhasznalok_felhasznalonev_unique` (`felhasznalonev`),
  ADD UNIQUE KEY `felhasznalok_szerep_unique` (`szerep`);

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
-- A tábla indexei `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `csekkolasok`
--
ALTER TABLE `csekkolasok`
  MODIFY `DolgozoID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `esemenyek`
--
ALTER TABLE `esemenyek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT a táblához `nyilvantartas`
--
ALTER TABLE `nyilvantartas`
  MODIFY `DolgozoID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
