-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Jun 2024 um 00:52
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `webtechie`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT 0.00,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `bookings`
--

INSERT INTO `bookings` (`id`, `userID`, `price`, `title`, `created_at`) VALUES
(13, 63, 5210.00, 'Republic Fighter Tank', '2024-06-17 21:50:08'),
(14, 63, 1995.00, 'Botanischer Garten', '2024-06-17 21:50:08'),
(15, 63, 2555.00, '', '2024-06-17 21:50:08'),
(16, 63, 2555.00, '', '2024-06-17 21:50:08');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `tags` varchar(50) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`tags`, `datum`, `id`, `title`, `price`, `image`) VALUES
('Sport', '2024-06-05 16:42:28', 50, '123', 123.00, 'uploads/products/legomale.jpg'),
('Wellness', '2024-06-05 16:49:42', 51, '123', 520.00, 'uploads/products/legomale.jpg'),
('Sport', '2024-06-05 16:53:18', 52, '123', 420.00, 'uploads/products/legomale.jpg'),
('Sport', '2024-06-05 16:53:45', 53, '123', 1337.00, 'uploads/products/legomale.jpg'),
('Sport', '2024-06-05 16:55:34', 54, '123', 1337.00, 'uploads/products/legomale.jpg'),
('Wellness', '2024-06-05 17:14:50', 55, 'LegoSet1', 133.00, 'uploads/products/legomale.jpg'),
('Kultur', '2024-06-05 17:22:21', 56, 'This is our newest Product!', 123.50, 'uploads/products/LegoSet2.jpg'),
('Sport', '2024-06-06 16:26:37', 57, 'Kipplaster', 9.99, 'uploads/products/Kipplaster.png'),
('Kultur', '2024-06-06 16:55:26', 58, 'Neon Fun', 24.99, 'uploads/products/11027_alt1.png'),
('Kultur', '2024-06-11 18:12:11', 59, 'Botanischer Garten', 25.55, 'uploads/products/legoset3.png'),
('Kultur', '2024-06-12 19:37:31', 60, 'Lego Set 11', 12.00, 'uploads/products/legoset11.png'),
('Sport', '2024-06-12 19:44:57', 61, 'Republic Fighter Tank', 133.00, 'uploads/products/republicfightertank.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(260) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `useremail` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `anrede` varchar(255) DEFAULT NULL,
  `firstname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lastname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `accountstatus` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `useremail`, `address`, `city`, `state`, `zip`, `anrede`, `firstname`, `lastname`, `role`, `accountstatus`) VALUES
(39, 'admin', 'admin', 'admin@admin.admin', 'Hochstädtplatz', 'Wien', 'Wien', 1200, 'Mr', 'nameUpdated', 'Potatiss', 1, 1),
(41, 'testUser', '937e8d5fbb48bd4949536cd65b8d35c426b80d2f830c5c308e2cdec422ae2244', 'test@testUser.at', NULL, NULL, NULL, NULL, '', 'testupdate', 'testupdater2', 0, 0),
(48, 'lego', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'lego@lego.at', 'lego', 'lego', 'lego', 1234, 'mr', 'lego', 'lego', 0, 1),
(49, 'lego', 'ac9689e2272427085e35b9d3e3e8bed88cb3434828b43b86fc0596cad4c6e270', 'lego@lego.at', '1234 main', 'main', 'main', 1234, 'lego', 'lego', 'lego', 0, 1),
(50, 'localhost', '5fefe57f9c94d4888a4d19343420b12897c19e48fea6f11bd455c0463eb36250', 'lego@lego.at', '1234 main', 'kkkü', 'Wien', 1080, 'Mr', 'Götterer', 'götterer', 0, 1),
(51, 'localhost', '5fefe57f9c94d4888a4d19343420b12897c19e48fea6f11bd455c0463eb36250', 'lego@lego.at', '1234 main', 'kkkü', 'Wien', 1080, 'Mr', 'Götterer', 'götterer', 0, 1),
(52, 'localhost', '5fefe57f9c94d4888a4d19343420b12897c19e48fea6f11bd455c0463eb36250', 'lego@lego.at', '1234 main', 'kkkü', 'Wien', 1080, 'Mr', 'Götterer', 'götterer', 0, 1),
(53, 'localhost', '5fefe57f9c94d4888a4d19343420b12897c19e48fea6f11bd455c0463eb36250', 'lego@lego.at', '1234 main', 'kkkü', 'Wien', 1080, 'Mr', 'Götterer', 'götterer', 0, 1),
(54, 'localhost', '5fefe57f9c94d4888a4d19343420b12897c19e48fea6f11bd455c0463eb36250', 'lego@lego.at', '1234 main', 'kkkü', 'Wien', 1080, 'Mr', 'Götterer', 'götterer', 0, 1),
(55, 'localhost', '5fefe57f9c94d4888a4d19343420b12897c19e48fea6f11bd455c0463eb36250', 'lego@lego.at', '1234 main', 'kkkü', 'Wien', 1080, 'Mr', 'Götterer', 'götterer', 0, 1),
(56, 'localhost', '5fefe57f9c94d4888a4d19343420b12897c19e48fea6f11bd455c0463eb36250', 'lego@lego.at', '1234 main', 'kkkü', 'Wien', 1080, 'Mr', 'Götterer', 'götterer', 0, 1),
(57, 'localhost', '5fefe57f9c94d4888a4d19343420b12897c19e48fea6f11bd455c0463eb36250', 'lego@lego.at', '1234 main', 'kkkü', 'Wien', 1080, 'Mr', 'Götterer', 'götterer', 0, 1),
(58, 'localhost', '5fefe57f9c94d4888a4d19343420b12897c19e48fea6f11bd455c0463eb36250', 'lego@lego.at', '1234 main', 'kkkü', 'Wien', 1078, 'Mr', 'Götterer', 'götterer', 0, 1),
(59, 'Man', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'lego@lego.at', '1234 Street', 'kkkü', 'Wien', 1080, 'asd', 'Götterer', 'götterer', 0, 1),
(60, ' works', '00204d9898150268e1ee5e893de53bd1bc88fc6d434bc30be2613b24758dccd7', 'llego@lego.lego', '1234', '123', '123', 10901, 'Test', 'if', 'it', 0, 1),
(61, 'tester1', '7cdee0f9eeaab9c077cca34b3efde45f9b7e991bd1d0f8efac1e61802bb0d40d', 'test@ok.at', '1234', '1234', '1234', 1234, 'Mister', 'Tester', 'LastName', 0, 1),
(62, 'Man', '89048e252360e4a89afcea3494684cf0ec162b77fe90a072bace5777b0926463', 'lego@lego.at', '1234 main', '123', 'main', 1080, 'Mr', 'Götterer', 'götterer', 0, 1),
(63, 'tester2', 'b394db3266460ed2dd2df8bcaf7db8583110d1086aa9679606f350016db55281', 'llego@lego.lego', '1234 main', '123', 'main', 1070, 'Mr', 'asd', 'asd', 1, 1),
(64, 'brunog', '7992a6588b23077470a1b8761841afadffa2fccaa304cece903893ca401715b9', 'changed@asd.at', '1234 strret', 'wien', 'wien', 1080, 'Male', 'Bruno', 'Götterer', 0, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `code` varchar(5) NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `status` enum('valid','used','expired') DEFAULT 'valid',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `vouchers`
--

INSERT INTO `vouchers` (`id`, `code`, `value`, `expiry_date`, `status`, `created_at`) VALUES
(1, '8EP0G', 5.00, '2024-06-12', 'expired', '2024-06-11 15:07:22'),
(4, 'L5HH9', 1337.00, '2024-06-10', 'expired', '2024-06-11 15:11:59'),
(5, 'F0W98', 5.00, '2024-06-13', 'expired', '2024-06-11 18:08:25');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `USERBOOKING` (`userID`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT für Tabelle `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `USERBOOKING` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
