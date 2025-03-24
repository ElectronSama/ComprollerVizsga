-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2025 at 08:10 PM
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
(1, 'Nagy', 'Péter', '2025-03-01 ', '2025-03-01 ', '10:00', '12:00', NULL, NULL, NULL, NULL, '2025-03-24 19:05:12', '2025-03-24 19:05:12'),
(2, 'Nagy', 'Péter', '2025-03-02 ', '2025-03-02 ', '15:00', '16:00', NULL, NULL, NULL, NULL, '2025-03-24 19:05:26', '2025-03-24 19:05:26'),
(3, 'Nagy', 'Péter', '2025-03-03 ', '2025-03-03 ', '15:00', '16:00', NULL, NULL, NULL, NULL, '2025-03-24 19:05:44', '2025-03-24 19:05:44'),
(4, 'Horváth', 'Eszter', '2025-03-01 ', '2025-03-01 ', '05:00', '10:00', NULL, NULL, NULL, NULL, '2025-03-24 19:06:14', '2025-03-24 19:06:14'),
(5, 'Horváth', 'Eszter', '2025-03-02 ', '2025-03-02 ', '10:00', '12:00', NULL, NULL, NULL, NULL, '2025-03-24 19:06:25', '2025-03-24 19:06:25');

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
(1, 'Horváth Eszter', '2025-03-01 ', '2025-03-01 ');

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
(1, 'Anna', 'Kovács', '1985-05-12', 'Nagy Erzsébet', '12345678901', '1234567890', 'HU0012345678901234567890', '450000', 'anna.kovacs@example.com', '+3612345678', 'HR vezető', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(2, 'Péter', 'Nagy', '1990-08-23', 'Kiss Mária', '23456789012', '2345678901', 'HU0023456789012345678901', '380000', 'peter.nagy@example.com', '+3623456789', 'Fejlesztő', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(3, 'Zsófia', 'Tóth', '1988-11-15', 'Szabó Ilona', '34567890123', '3456789012', 'HU0034567890123456789012', '420000', 'zsofia.toth@example.com', '+3634567890', 'Pénzügyi asszisztens', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(4, 'Gábor', 'Szabó', '1992-03-28', 'Horváth Anna', '45678901234', '4567890123', 'HU0045678901234567890123', '360000', 'gabor.szabo@example.com', '+3645678901', 'Marketing szakember', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(5, 'Eszter', 'Horváth', '1987-07-19', 'Tóth Katalin', '56789012345', '5678901234', 'HU0056789012345678901234', '410000', 'eszter.horvath@example.com', '+3656789012', 'Termék menedzser', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(6, 'Balázs', 'Varga', '1993-01-30', 'Fekete Judit', '67890123456', '6789012345', 'HU0067890123456789012345', '350000', 'balazs.varga@example.com', '+3667890123', 'Ügyfélszolgálatos', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(7, 'Katalin', 'Fekete', '1984-09-22', 'Varga Éva', '78901234567', '7890123456', 'HU0078901234567890123456', '480000', 'katalin.fekete@example.com', '+3678901234', 'Igazgatósági titkár', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(8, 'Miklós', 'Molnár', '1991-12-05', 'Takács Julianna', '89012345678', '8901234567', 'HU0089012345678901234567', '370000', 'miklos.molnar@example.com', '+3689012345', 'Rendszergazda', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(9, 'Judit', 'Takács', '1989-04-18', 'Molnár Gabriella', '90123456789', '9012345678', 'HU0090123456789012345678', '400000', 'judit.takacs@example.com', '+3690123456', 'Logisztikai koordinátor', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(10, 'Tamás', 'Balogh', '1994-06-25', 'Simon Eszter', '01234567890', '0123456789', 'HU0001234567890123456789', '340000', 'tamas.balogh@example.com', '+3601234567', 'Értékesítési asszisztens', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(11, 'Ilona', 'Simon', '1986-02-14', 'Balogh Márta', '11223344556', '1122334455', 'HU0112233445566778899001', '430000', 'ilona.simon@example.com', '+3611223344', 'Személyzeti vezető', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(12, 'András', 'Rácz', '1990-10-08', 'Fehér Klára', '22334455667', '2233445566', 'HU0223344556677889900112', '375000', 'andras.racz@example.com', '+3622334455', 'Projektmenedzser', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(13, 'Márta', 'Fehér', '1983-07-31', 'Rácz Edit', '33445566778', '3344556677', 'HU0334455667788990011223', '490000', 'marta.feher@example.com', '+3633445566', 'Pénzügyi vezető', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(14, 'László', 'Király', '1995-04-03', 'Kocsis Zsuzsanna', '44556677889', '4455667788', 'HU0445566778899001122334', '330000', 'laszlo.kiraly@example.com', '+3644556677', 'Gyakornok', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(15, 'Gabriella', 'Kocsis', '1988-12-26', 'Király Anikó', '55667788990', '5566778899', 'HU0556677889900112233445', '395000', 'gabriella.kocsis@example.com', '+3655667788', 'Kommunikációs szakember', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(16, 'Zoltán', 'Fodor', '1992-05-17', 'Papp Renáta', '66778899001', '6677889900', 'HU0667788990011223344556', '365000', 'zoltan.fodor@example.com', '+3666778899', 'IT támogató', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(17, 'Renáta', 'Papp', '1987-09-09', 'Fodor Irén', '77889900112', '7788990011', 'HU0778899001122334455667', '405000', 'renata.papp@example.com', '+3677889900', 'HR szakember', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(18, 'István', 'Bíró', '1993-02-20', 'Lukács Viktória', '88990011223', '8899001122', 'HU0889900112233445566778', '355000', 'istvan.biro@example.com', '+3688990011', 'Értékesítő', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(19, 'Viktória', 'Lukács', '1989-06-13', 'Bíró Jolán', '99001112234', '9900111223', 'HU0990011122334455667788', '385000', 'viktoria.lukacs@example.com', '+3699001122', 'Marketing asszisztens', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(20, 'Gergő', 'Szűcs', '1994-08-07', 'Gál Bernadett', '00112233445', '0011223344', 'HU0001122334455667788990', '345000', 'gergo.szucs@example.com', '+3600112233', 'Adatbázis adminisztrátor', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(21, 'Bernadett', 'Gál', '1985-01-29', 'Szűcs Magdolna', '11223344556', '1122334455', 'HU0112233445566778899001', '440000', 'bernadett.gal@example.com', '+3611223344', 'Office menedzser', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(22, 'Dávid', 'Vincze', '1991-11-11', 'Orsós Henrietta', '22334455667', '2233445566', 'HU0223344556677889900112', '370000', 'david.vincze@example.com', '+3622334455', 'Fejlesztő', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(23, 'Henrietta', 'Orsós', '1986-04-24', 'Vincze Mónika', '33445566778', '3344556677', 'HU0334455667788990011223', '415000', 'henrietta.orsos@example.com', '+3633445566', 'Terméktervező', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(24, 'Bence', 'Katona', '1995-07-16', 'Bognár Lilla', '44556677889', '4455667788', 'HU0445566778899001122334', '335000', 'bence.katona@example.com', '+3644556677', 'Gyakornok', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(25, 'Lilla', 'Bognár', '1988-03-08', 'Katona Emília', '55667788990', '5566778899', 'HU0556677889900112233445', '390000', 'lilla.bognar@example.com', '+3655667788', 'Designer', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(26, 'Krisztián', 'Pintér', '1992-10-01', 'Fábián Dorottya', '66778899001', '6677889900', 'HU0667788990011223344556', '360000', 'krisztian.pinter@example.com', '+3666778899', 'Elemző', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(27, 'Dorottya', 'Fábián', '1987-05-14', 'Pintér Zsófia', '77889900112', '7788990011', 'HU0778899001122334455667', '400000', 'dorottya.fabian@example.com', '+3677889900', 'PR szakember', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(28, 'Róbert', 'Sándor', '1993-12-27', 'Bálint Mariann', '88990011223', '8899001122', 'HU0889900112233445566778', '350000', 'robert.sandor@example.com', '+3688990011', 'Ügyfélszolgálat vezető', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(29, 'Mariann', 'Bálint', '1989-08-10', 'Sándor Erzsébet', '99001112234', '9900111223', 'HU0990011122334455667788', '380000', 'mariann.balint@example.com', '+3699001122', 'Szakmai tréner', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(30, 'Ádám', 'Hegedűs', '1994-01-23', 'Fülöp Katalin', '00112233445', '0011223344', 'HU0001122334455667788990', '340000', 'adam.hegedus@example.com', '+3600112233', 'Rendszeradminisztrátor', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(31, 'Katalin', 'Fülöp', '1985-06-06', 'Hegedűs Mária', '11223344556', '1122334455', 'HU0112233445566778899001', '435000', 'katalin.fulop@example.com', '+3611223344', 'Könyvelő', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(32, 'Norbert', 'Budai', '1991-09-19', 'Baranyai Judit', '22334455667', '2233445566', 'HU0223344556677889900112', '365000', 'norbert.budai@example.com', '+3622334455', 'Mérnök', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(33, 'Judit', 'Baranyai', '1986-02-02', 'Budai Klára', '33445566778', '3344556677', 'HU0334455667788990011223', '410000', 'judit.baranyai@example.com', '+3633445566', 'Minőségbiztosítási szakember', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(34, 'Szabolcs', 'Jónás', '1995-05-15', 'Major Edit', '44556677889', '4455667788', 'HU0445566778899001122334', '330000', 'szabolcs.jonas@example.com', '+3644556677', 'Gyakornok', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(35, 'Edit', 'Major', '1988-10-28', 'Jónás Ilona', '55667788990', '5566778899', 'HU0556677889900112233445', '385000', 'edit.major@example.com', '+3655667788', 'Adminisztrátor', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(36, 'Attila', 'Váradi', '1992-03-11', 'Lengyel Gabriella', '66778899001', '6677889900', 'HU0667788990011223344556', '355000', 'attila.varadi@example.com', '+3666778899', 'Értékesítési képviselő', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(37, 'Gabriella', 'Lengyel', '1987-07-24', 'Váradi Márta', '77889900112', '7788990011', 'HU0778899001122334455667', '395000', 'gabriella.lengyel@example.com', '+3677889900', 'Logisztikai menedzser', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(38, 'Zsolt', 'Bodnár', '1993-12-06', 'Sipos Eszter', '88990011223', '8899001122', 'HU0889900112233445566778', '345000', 'zsolt.bodnar@example.com', '+3688990011', 'Technikus', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(39, 'Eszter', 'Sipos', '1989-04-29', 'Bodnár Anna', '99001112234', '9900111223', 'HU0990011122334455667788', '375000', 'eszter.sipos@example.com', '+3699001122', 'HR asszisztens', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(40, 'Géza', 'Lázár', '1994-09-12', 'Mészáros Katalin', '00112233445', '0011223344', 'HU0001122334455667788990', '335000', 'geza.lazar@example.com', '+3600112233', 'IT támogató', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(41, 'Katalin', 'Mészáros', '1985-02-25', 'Lázár Erzsébet', '11223344556', '1122334455', 'HU0112233445566778899001', '425000', 'katalin.meszaros@example.com', '+3611223344', 'Pénzügyi elemző', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(42, 'Ferenc', 'Orosz', '1991-06-08', 'Virág Mária', '22334455667', '2233445566', 'HU0223344556677889900112', '360000', 'ferenc.orosz@example.com', '+3622334455', 'Projektkoordinátor', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(43, 'Mária', 'Virág', '1986-11-21', 'Orosz Jolán', '33445566778', '3344556677', 'HU0334455667788990011223', '395000', 'maria.virag@example.com', '+3633445566', 'Office asszisztens', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(44, 'Levente', 'Somogyi', '1995-04-04', 'Bakos Ildikó', '44556677889', '4455667788', 'HU0445566778899001122334', '325000', 'levente.somogyi@example.com', '+3644556677', 'Gyakornok', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(45, 'Ildikó', 'Bakos', '1988-08-17', 'Somogyi Edit', '55667788990', '5566778899', 'HU0556677889900112233445', '380000', 'ildiko.bakos@example.com', '+3655667788', 'Recepciós', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(46, 'Barnabás', 'Farkas', '1992-01-30', 'Veres Klára', '66778899001', '6677889900', 'HU0667788990011223344556', '350000', 'barnabas.farkas@example.com', '+3666778899', 'Értékesítési asszisztens', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(47, 'Klára', 'Veres', '1987-05-13', 'Farkas Márta', '77889900112', '7788990011', 'HU0778899001122334455667', '390000', 'klara.veres@example.com', '+3677889900', 'Marketing koordinátor', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(48, 'Csaba', 'Kelemen', '1993-10-26', 'Borbély Eszter', '88990011223', '8899001122', 'HU0889900112233445566778', '340000', 'csaba.kelemen@example.com', '+3688990011', 'Rendszergazda', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(49, 'Eszter', 'Borbély', '1989-03-09', 'Kelemen Ilona', '99001112234', '9900111223', 'HU0990011122334455667788', '370000', 'eszter.borbely@example.com', '+3699001122', 'HR szakember', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06'),
(50, 'Dénes', 'Magyar', '1994-07-22', 'Szilágyi Mónika', '00112233445', '0011223344', 'HU0001122334455667788990', '330000', 'denes.magyar@example.com', '+3600112233', 'Adatrögzítő', NULL, '2025-03-24 18:59:06', '2025-03-24 18:59:06');

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
('EyJbarjOpLvRhXXnk0KwTdOtNd07XdNJweX1a123', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYkk2MGY3TzR0ekMxbUVpREZ1ejJpeURjYzdzb0pKTDZKVEJTWE9jRiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=', 1742843379);

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
(1, 'Kiss Bercel', 'admin@comproller.hu', NULL, '$2y$12$XPRYhAWx.CRYfwdyLYUXL.goazWV9hoKjsaAtNNFXdGdXNLAuEFqa', NULL, '2025-03-19 10:49:25', '2025-03-19 10:49:25'),
(2, 'Kiss Bercel', 'kiss.berci20@gmail.com', NULL, '$2y$12$a39si9jlbupSGUU2J7.hvuiwcC7G6T6Tkm63FXF2f21ZHTTMJaQSy', 'ZOQtq0qRSFOwh5fbgqTRdVX0hIdbvn0DIlGZO3CqzfFKrDpkzjNAZJ39OGWK', '2025-03-19 18:27:59', '2025-03-19 18:27:59');

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`DolgozoID`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ideiglenes`
--
ALTER TABLE `ideiglenes`
  MODIFY `DolgozoID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `DolgozoID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
