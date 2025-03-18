-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Már 18. 11:47
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
-- A tábla adatainak kiíratása `csekkolasok`
--

INSERT INTO `csekkolasok` (`DolgozoID`, `Vezeteknev`, `Keresztnev`, `Datum_Be`, `Datum_Ki`, `Kezdido`, `Vegido`, `Ora`, `Ber`, `Bonusz`, `Vegosszeg`, `created_at`, `updated_at`) VALUES
(1, 'Kovács', 'János', '2025-03-01', '2025-03-01', '10:00', '12:00', NULL, NULL, NULL, NULL, '2025-03-14 14:40:58', '2025-03-14 14:46:24'),
(2, 'Nagy', 'Anna', '2025-03-02', '2025-03-02', '10:00', '12:00', NULL, NULL, NULL, NULL, '2025-03-14 14:43:21', '2025-03-14 14:46:32'),
(3, 'Szabó', 'Péter', '2025-03-03 ', '2025-03-03 ', '10:00', '12:00', NULL, NULL, NULL, NULL, '2025-03-14 15:19:10', '2025-03-14 15:19:10'),
(4, 'Kovács', 'János', '2025-03-02 ', '2025-03-02 ', '15:00', '15:50', NULL, NULL, NULL, NULL, '2025-03-14 15:57:23', '2025-03-14 15:57:23'),
(5, 'Kovács', 'János', '2025-03-03 ', '2025-03-03 ', '10:00', '12:00', NULL, NULL, NULL, NULL, '2025-03-14 15:57:42', '2025-03-14 15:57:42'),
(6, 'Nagy', 'Anna', '2025-03-01 ', '2025-03-01 ', '10:00', '12:00', NULL, NULL, NULL, NULL, '2025-03-14 20:26:48', '2025-03-14 20:26:48'),
(7, 'Nagy', 'Anna', '2025-03-01 ', '2025-03-01 ', '10:00', '12:00', NULL, NULL, NULL, NULL, '2025-03-14 20:29:20', '2025-03-14 20:29:20');

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
(3, 'viola123', 'admin123', 'valami', NULL, NULL),
(4, 'rudirudi', '12345678', 'raktar', '2025-03-18 09:32:07', '2025-03-18 09:32:07'),
(5, 'guest', 'guest123', 'guest', '2025-03-18 09:40:06', '2025-03-18 09:40:06'),
(6, 'valami', 'valamivalami', 'admin', '2025-03-18 09:43:08', '2025-03-18 09:43:08');

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

--
-- A tábla adatainak kiíratása `ideiglenes`
--

INSERT INTO `ideiglenes` (`DolgozoID`, `Nev`, `Datum_Be`, `Datum_Ki`) VALUES
(1, 'Kovács János', '2025-03-01', '2025-03-01'),
(2, 'Nagy Anna', '2025-03-01 ', '2025-03-01 '),
(3, 'Nagy Anna', '2025-03-01 ', '2025-03-01 '),
(4, 'Nagy Anna', '2025-03-02', '2025-03-02'),
(5, 'Kovács János', '2025-03-02 ', '2025-03-02 '),
(6, 'Szabó Péter', '2025-03-03 ', '2025-03-03 '),
(7, 'Kovács János', '2025-03-03 ', '2025-03-03 ');

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
(1, '2025_02_09_161901_create_sessions_table', 1);

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
(1, 'János', 'Kovács', '1990-01-01', 'Erzsébet Kovács', '123456789', '123456789', 'HU123456789', '250000', 'Budapest, Fő utca 1.', 'Magyar', 'Budapest', 'AB123456', 'janos.kovacs@example.com', '0612345678', 'Számviteli munkatárs', 'Nincs megjegyzés', 'QR1234567890', '2025-03-05 17:13:57', '2025-03-05 17:13:57'),
(2, 'Anna', 'Nagy', '1985-05-12', 'Mária Nagy', '987654321', '987654321', 'HU987654321', '280000', 'Budapest, Petőfi utca 2.', 'Magyar', 'Budapest', 'XY987654', 'anna.nagy@example.com', '0612345679', 'HR munkatárs', 'Nincs megjegyzés', 'QR9876543210', '2025-03-05 17:13:57', '2025-03-05 17:13:57'),
(3, 'Péter', 'Szabó', '1992-03-03', 'Katalin Szabó', '111223344', '112233445', 'HU112233445', '320000', 'Debrecen, Kossuth utca 5.', 'Magyar', 'Debrecen', 'XY112233', 'peter.szabo@example.com', '0623456789', 'Fejlesztő', 'Nincs megjegyzés', 'QR1122334455', '2025-03-05 17:13:57', '2025-03-14 14:41:45'),
(4, 'Dolgozó', 'Példa', '2025-03-10', 'Példa Ember', '123456788', '12345678-1-15', '10000000-00000000-000000', '3000', '1000, Példa utca 01.', 'példa', '0000, Példa Példa utca 00.', 'dolgozo@gmail.com', 'dolgozo@gmail.com', '1234567891', 'Búrkoló', 'asd', 'xzw9dmmm', '2025-03-13 15:20:18', '2025-03-14 14:10:42'),
(5, 'Új', 'Dolgozó', '2025-03-14', 'Példa Anyja', '111111111', '12345678-1-30', '123456789012', '3000', 'Példa út 30.', 'magyar', 'Példa.', '111111ZZ', 'pelda2@gmail.com', '06301111111', 'Búrkoló', 'Példa', '02t2zgm0', '2025-03-14 14:12:30', '2025-03-14 14:12:30');

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
('Czm6EDt4Gy8Jg65wZL1DV4I08AYT1YcrVJdUO8zS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiSlI4TVkzMmptSDRTTHhIY2VyNVdsS2hwM0lHT0U4OXNHTjhIT2NkQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wcm9maWxlIjt9czo3OiJpc0FkbWluIjtiOjE7fQ==', 1742294763);

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
-- A tábla indexei `ideiglenes`
--
ALTER TABLE `ideiglenes`
  ADD PRIMARY KEY (`DolgozoID`);

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
  MODIFY `DolgozoID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `esemenyek`
--
ALTER TABLE `esemenyek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `ideiglenes`
--
ALTER TABLE `ideiglenes`
  MODIFY `DolgozoID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `nyilvantartas`
--
ALTER TABLE `nyilvantartas`
  MODIFY `DolgozoID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
