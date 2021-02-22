-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Feb 22. 15:37
-- Kiszolgáló verziója: 10.4.16-MariaDB
-- PHP verzió: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `y3xsupport`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `AdmminName` varchar(32) COLLATE utf8_hungarian_ci NOT NULL,
  `AdminEmail` varchar(64) COLLATE utf8_hungarian_ci NOT NULL,
  `AdminPW` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tickets`
--

CREATE TABLE `tickets` (
  `TicketID` int(11) NOT NULL,
  `TicketCategory` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `UserID` int(11) NOT NULL,
  `Homeaddress` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `ProductCategory` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `ProductName` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `Warranty` int(100) NOT NULL,
  `Progress` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `TicketMessage` varchar(1024) COLLATE utf8_hungarian_ci NOT NULL,
  `TicketDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `tickets`
--

INSERT INTO `tickets` (`TicketID`, `TicketCategory`, `UserID`, `Homeaddress`, `ProductCategory`, `ProductName`, `Warranty`, `Progress`, `TicketMessage`, `TicketDate`) VALUES
(1, 'Factory defective product', 2, 'Domaszék Tanya 714', 'Television', 'Samsung smart tv', 12354536, 'Requested', 'Hello! Az újonnan vásárolt televízióm távirányítója nem működik!\r\nCserét szeretnék kérvényezni', '2021-02-16 12:22:14'),
(2, 'assdadasd', 2, 'asddasdadas', 'assdasdasdadadas', 'adaddadasdasdadadada', 123123123, 'Requested', 'asfdbgmgh,ksgsfbxfhmshgnc', '2021-02-16 13:25:46');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(128) COLLATE utf8_hungarian_ci NOT NULL,
  `UserEmail` varchar(128) COLLATE utf8_hungarian_ci NOT NULL,
  `UserPW` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `PwReminder` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `UserRegdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UserTickets` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `UserEmail`, `UserPW`, `PwReminder`, `UserRegdate`, `UserTickets`) VALUES
(1, 'Kelemen Kálmán', 'kklman@gmail.com', 'kelemenKalman', 'Szeged út 1', '2021-02-04 23:00:00', 0),
(2, 'asd asd', 'asd', 'asd', 'asd', '2021-02-04 23:00:00', 0),
(3, 'Karcsi Bácsi', 'elm@ffff.aaa', 'asdasdas', 'asdasd', '2021-02-12 16:10:10', 0),
(4, 'Kecske kecse', 'asd@asd.hu', '$2y$10$EQtLmA2nMlcJR7sTGze6leZikzD481RDZjYhswq4QGopquiQAJtqW', 'Abc1234', '2021-02-13 09:37:19', 0);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- A tábla indexei `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`TicketID`),
  ADD KEY `UserID` (`UserID`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `tickets`
--
ALTER TABLE `tickets`
  MODIFY `TicketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
