-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Már 19. 09:45
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

--
-- A tábla adatainak kiíratása `esemenyek`
--

INSERT INTO `esemenyek` (`id`, `datum`, `esemeny_neve`, `created_at`, `updated_at`) VALUES
(1, '2025-03-05', 'valami1', NULL, NULL),
(2, '2025-04-10', 'valami2', NULL, NULL);

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
(3, 'viola123', 'admin123', 'admin', NULL, NULL);

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
(1, 'Márk', 'Tóth', '1998-06-01', 'Tóth Mariska', '123456777', '12345678-1-15', '123456789012', '3000', 'Petőfi út 1.', 'magyar', 'Példa.', 'toth@gmail', 'toth@gmail', '06301111111', 'Szoftver Mérnök', 'Példa.', 'mr25spj9', '2025-03-19 07:38:32', '2025-03-19 07:41:54'),
(2, 'Máté', 'Papp', '2000-08-10', 'Papp Anna', '123456789', '12345678-1-25', '123456789030', '5000', 'Petőfi út 2.', 'orosz', '11 Példa, Petőfi út 2.', '123456FF', 'mate@gmail', '+36301111111', 'HR Fejlesztő', 'Megjegyzés.', 'did3d194', '2025-03-19 07:44:54', '2025-03-19 07:44:54');

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
('gE1xp5HZ0LcmPDfaW4V5KjdHQvfKirYA4N0CpRul', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiR0NGeDRhSXRhQklrOWdxYkozN3RGdmY4VkI4VnppUDJMQWNlSHE0UCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9yZWdpc3RyeSI7fXM6NToiYWRtaW4iO2I6MTt9', 1742373895);

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
  MODIFY `DolgozoID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `esemenyek`
--
ALTER TABLE `esemenyek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `ideiglenes`
--
ALTER TABLE `ideiglenes`
  MODIFY `DolgozoID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `nyilvantartas`
--
ALTER TABLE `nyilvantartas`
  MODIFY `DolgozoID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
