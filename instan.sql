-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 17 oct. 2019 à 08:46
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `instan`
--

-- --------------------------------------------------------

--
-- Structure de la table `comptes_influenceurs`
--

DROP TABLE IF EXISTS `comptes_influenceurs`;
CREATE TABLE IF NOT EXISTS `comptes_influenceurs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_influenceur` int(11) NOT NULL,
  `type_compte` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `lien` text COLLATE utf8_general_mysql500_ci ,
  `nom_compte` text COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_influenceur` (`id_influenceur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

INSERT INTO `comptes_influenceurs`  VALUES
(1, 1, 'instagram', null, 'realdonaldtrump'),
(2, 2, 'instagram', null, 'normanthavaud'),
(3, 3, 'instagram', null, '6pri1'),
(4, 4, 'instagram', null, 'xsqueezie'),
(5, 5, 'instagram', null, 'enjoyphoenix'),
(6, 6, 'instagram', null, 'yvick'),
(7, 7, 'instagram', null, 'natoogram'),
(8, 2, 'youtube', 'UCww2zZWg4Cf5xcRKG-ThmXQ', 'NORMAN FAIT DES VIDÉOS'),
(9, 3, 'youtube', 'UCyWqModMQlbIo8274Wh_ZsQ', 'Cyprien'),
(10, 4, 'youtube', 'UCWeg2Pkate69NFdBeuRFTAw', 'SQUEEZIE'),
(11, 5, 'youtube', 'UC99LgIedzGD1GirhFGldfUQ', ' EnjoyPhoenix'),
(12, 6, 'youtube', 'UC8Q0SLrZLiTj5s4qc9aad-w', 'Mister V'),
(13, 7, 'youtube', 'UCtihF1ZtlYVzoaj_bKLQZ-Q', 'Natoo'),
(14, 8, 'youtube', 'UCiP2tOO8zRo47GFd5rc8rkA', 'Angèle'),
(16, 8, 'instagram', null, 'angele_vl'),
(17, 10, 'instagram', null, 'selenagomez'),
(18, 10, 'youtube', 'UCPNxhDvTcytIdvwXWAm43cA', 'S.Gomez'),
(19, 9, 'instagram', null, 'beyonce'),
(20, 9, 'youtube', 'UCuHzBCaKmtaLcRAOoazhCPA', 'beyonce'),
(21, 11, 'instagram', null, 'cristiano'),
(22, 12, 'instagram', null, 'kimkardashian'),
(23, 12, 'youtube', 'UCeNhHgTE36tTQkJsjPaPwnA', 'Kim Kardashian West'),
(24, 13, 'instagram', null, 'kendalljenner'),
(25, 14, 'instagram', null, 'mileycyrus'),
(26, 14, 'youtube', 'UCn7dB9UMTBDjKtEKBy_XISw', 'Miley Cyrus'),
(27, 15, 'youtube', 'UCiGm_E4ZwYSHV3bcW1pnSeQ', 'Billie Eilish'), 
(28, 15, 'instagram', null, 'billieeilish'), 
(29, 16, 'instagram', null, 'zendaya'), 
(30, 16, 'youtube', 'UCKjrT7t9h6GsSkzhFe0ccDA', ' Zendaya '),
(31, 17, 'youtube', 'UCxMAbVFmxKUVGAll0WVGpFw', 'Cardi B'),
(32, 17, 'instagram', null, 'iamcardib'),
(33, 18, 'instagram', null, 'shawnmendes'),
(34, 18, 'youtube', 'UCAvCL8hyXjSUHKEGuUPr1BA', 'Shawn Mendes'),
(35, 19, 'instagram', null, 'therock'),
(36, 19, 'youtube', 'UCBdw4dLCLLHmTgAOnW4V0hQ', 'The Rock'),
(37, 20, 'instagram', null, 'taylorswift'), 
(38, 20, 'youtube', 'UCqECaJ8Gagnn7YCbPEzWH6g', 'Taylor swift'), 
(39, 21, 'instagram', null, 'nickiminaj'),
(40, 21, 'youtube', 'UC3jOd7GUMhpgJRBhiLzuLsg', 'Nicki Minaj'), 
(41, 22, 'instagram', null, 'jlo'), 
(42, 22, 'youtube', 'UCr8RjWUQ_9KYcIPmWiqBroQ', 'Jennifer Lopez'),
(43, 23, 'instagram', null, 'narendramodi'),
(44, 23, 'youtube', 'UC1NF71EwP41VdjAU1iXdLkw', 'Narenda Modi'),
(45, 24, 'instagram', null, 'khloekardashian');


-- --------------------------------------------------------

--
-- Structure de la table `influenceurs`
--

DROP TABLE IF EXISTS `influenceurs`;
CREATE TABLE IF NOT EXISTS `influenceurs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pseudo` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `nom` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `prenom` text COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Déchargement des données de la table `influenceurs`
--

INSERT INTO `influenceurs` (`id`, `pseudo`, `nom`, `prenom`) VALUES
(1, 'donaldtrump', 'trump', 'donald'),
(2, 'Norman Thavaud', 'Thavaud', 'Norman'),
(3, 'Cyprien', 'Iov', 'Cyprien'),
(4, 'Squeezie', 'Hauchard', 'Lucas'),
(5, 'Enjoy Phoenix', 'Lopez', 'Marie'),
(6, 'Mister V', 'Letexier', 'Yvick'),
(7, 'Natoo', 'Odzierejko', 'Nathalie'),
(8, 'Angèle',' Van Laeken','Angèle'),
(9, 'Beyonce', 'Beyoncé', 'Giselle Carter'),
(10, 'S.Gomez', 'Selena', 'Gomez'),
(11, 'Cr7', 'Cristiano', 'Ronaldo'),
(12, 'Kim K', 'Kim', 'Kardashian West'),
(13, 'Kendall Jenner', 'Kendall', 'Jenner'),
(14, 'Miley Cyrus', 'Miley', 'Cyrus'),
(15, 'Billie Eilish', 'Billie', 'Eilish'), 
(16, 'Zendaya', 'Zendaya Maree', 'Stoermer Coleman'),
(17, 'Cardi b', 'Belcalis Marlenis', 'Almánzar'), 
(18, 'Shawn Mendes', 'Shawn', 'Mendes'),
(19, 'The Rock', 'Dwayne', 'Jhonson'),
(20, 'Taylor Swift', 'Taylor', 'Alison Swift'),
(21, 'Nicki Minaj', 'Onika Tanya', 'Maraj'), 
(22, 'Jennifer Lopez', 'Jennifer', 'Lopez'),
(23, 'Narenda Modi', 'Narenda Damodardas', 'Modi'),
(24, 'Khloé Kardashian', 'Khloé Alexandra', 'Kardashian');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `password` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `ids_influenceurs_suivis` text COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
