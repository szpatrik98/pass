-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3308
-- Létrehozás ideje: 2020. Máj 16. 08:08
-- Kiszolgáló verziója: 8.0.18
-- PHP verzió: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `afp2`
--
CREATE DATABASE IF NOT EXISTS `afp2` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `afp2`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `dir`
--

DROP TABLE IF EXISTS `dir`;
CREATE TABLE IF NOT EXISTS `dir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `alias` varchar(30) NOT NULL,
  `views` int(11) DEFAULT '0',
  `created` datetime NOT NULL,
  `expiration` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `dir`
--

INSERT INTO `dir` (`id`, `userID`, `alias`, `views`, `created`, `expiration`) VALUES
(1, NULL, 'asd', 97, '2020-02-15 00:00:00', '2021-02-15 00:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `alias` varchar(30) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `links`
--

INSERT INTO `links` (`id`, `userID`, `alias`, `url`, `created`) VALUES
(1, NULL, 'git', 'https://github.com/BozoTamas/AFP2', '2020-02-15 00:00:00'),
(2, NULL, 'trello', 'https://trello.com/b/kvd2LSU9/afp2', '2020-02-15 00:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `dir`
--
ALTER TABLE `dir`
  ADD CONSTRAINT `dir_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `links_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE;
--
-- Adatbázis: `ion_auth`
--
CREATE DATABASE IF NOT EXISTS `ion_auth` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `ion_auth`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(250) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `type_of` varchar(250) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `time` int(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `films`
--

INSERT INTO `films` (`id`, `address`, `type_of`, `time`) VALUES
(1, 'Az', 'horror', 100),
(2, 'XXX', 'akció', 180),
(10, 'XXX 2', 'AKCIÓ', 180);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'Best', 'Likeit');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `musics`
--

DROP TABLE IF EXISTS `musics`;
CREATE TABLE IF NOT EXISTS `musics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `performer` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `title` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `time` int(60) NOT NULL,
  `photo_path` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `musics`
--

INSERT INTO `musics` (`id`, `performer`, `title`, `time`, `photo_path`) VALUES
(13, 'The killers', 'Mr Brigthside', 3, 'Mr_Brigthside_001.png'),
(12, 'Nickelback', 'Rockstar', 4, 'Rockstar_001.jpg'),
(11, 'BSW', 'Hello', 4, 'Hello_001.jpg'),
(10, 'Krubi', 'Dobd fel magad', 4, 'Dobd_fel_magad_0012.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', '9VuxwRzxJ2hRUHnImPgZU.660953419a7ec30197', 1588883649, 'idbdp7bXoy0FTpzBeoTPLO', 1268889823, 1589616055, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '127.0.0.1', 'Patrik', 'Patrik22', '', 'patrik@admin.com', '', NULL, NULL, NULL, 1268889823, 1268889823, 1, 'Szabó', 'Patrik', 'ADMIN', '0'),
(3, '::1', 'feri@gmail.com', '$2y$08$mVFZt0Du2NqKuKPEF3o8I.SWLPeKVxYB7WrdYA05mGng2hIQorKxy', NULL, 'feri@gmail.com', NULL, NULL, NULL, NULL, 1588861466, NULL, 1, 'Molnár', 'Ferenc', 'Feri', '06204562254'),
(4, '::1', 'proba@proba.com', '$2y$08$1YL06QcvE4dfOdYnsW9DJOWMIKzo3pturPs9koQ.pUv1Lj1s8kW1e', NULL, 'proba@proba.com', NULL, NULL, NULL, NULL, 1589556138, 1589616016, 1, 'ProbaF', 'ProbaL', 'ProbaC', '12365478');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(8, 1, 1),
(5, 2, 1),
(6, 2, 2),
(7, 2, 3),
(4, 3, 2),
(9, 4, 2);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
--
-- Adatbázis: `link`
--
CREATE DATABASE IF NOT EXISTS `link` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_hu_0900_ai_ci;
USE `link`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `folders`
--

DROP TABLE IF EXISTS `folders`;
CREATE TABLE IF NOT EXISTS `folders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `alias` varchar(25) NOT NULL,
  `views` int(11) DEFAULT '0',
  `created` datetime NOT NULL,
  `expiration` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `folders`
--

INSERT INTO `folders` (`id`, `user_id`, `alias`, `views`, `created`, `expiration`) VALUES
(1, NULL, 'teszt', 0, '2020-02-15 00:00:00', NULL),
(2, NULL, 'asd', 0, '2020-02-15 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `alias` varchar(25) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `views` int(11) DEFAULT '0',
  `created` datetime NOT NULL,
  `expiration` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `links`
--

INSERT INTO `links` (`id`, `user_id`, `alias`, `url`, `views`, `created`, `expiration`) VALUES
(1, NULL, 'git', 'https://github.com/BozoTamas/AFP2', 10, '2020-02-15 00:00:00', NULL),
(2, NULL, 'trello', 'https://trello.com/b/kvd2LSU9/afp2', 1, '2020-02-15 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `emial` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `emial` (`emial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `folders`
--
ALTER TABLE `folders`
  ADD CONSTRAINT `folders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `links_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
--
-- Adatbázis: `re1d25_02_001`
--
CREATE DATABASE IF NOT EXISTS `re1d25_02_001` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `re1d25_02_001`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postal_code` varchar(4) NOT NULL,
  `name` char(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_cities_postal_code` (`postal_code`),
  UNIQUE KEY `UQ_cities_name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `cities`
--

INSERT INTO `cities` (`id`, `postal_code`, `name`) VALUES
(1, '2956', 'Eger');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `ssn` char(9) NOT NULL,
  `tin` char(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UQ_employees_ssn` (`ssn`),
  UNIQUE KEY `UQ_employees_tin` (`tin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `employees`
--

INSERT INTO `employees` (`id`, `name`, `ssn`, `tin`) VALUES
(1, 'T1', '012345678', '0123456789'),
(2, 'T1', '012345679', '0123456781');
--
-- Adatbázis: `web3`
--
CREATE DATABASE IF NOT EXISTS `web3` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `web3`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1268889823, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
