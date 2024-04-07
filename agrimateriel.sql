-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 26 mai 2020 à 18:58
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `agrimateriel`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `idAdmin` int(10) NOT NULL,
  `nomAdmin` varchar(20) NOT NULL,
  `prenomAdmin` varchar(20) NOT NULL,
  `emailAdmin` varchar(30) NOT NULL,
  `mdpAdmin` int(10) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`idAdmin`, `nomAdmin`, `prenomAdmin`, `emailAdmin`, `mdpAdmin`) VALUES
(20, 'Eya', 'Laffet', 'admin@gmail.com', 123456),
(21, 'Melek', 'Bejaoui', 'admin2@gmail.com', 123456),
(23, 'ahmed', 'mohamed', 'admin3@gmail.com', 123456);

-- --------------------------------------------------------

--
-- Structure de la table `annoncemateriel`
--

DROP TABLE IF EXISTS `annoncemateriel`;
CREATE TABLE IF NOT EXISTS `annoncemateriel` (
  `idMateriel` int(11) NOT NULL AUTO_INCREMENT,
  `nomMateriel` varchar(30) NOT NULL,
  `categorie` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `adresse` varchar(20) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prixHeure` int(10) NOT NULL,
  `etat` int(1) NOT NULL DEFAULT '0',
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`idMateriel`),
  KEY `idClient` (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annoncemateriel`
--

INSERT INTO `annoncemateriel` (`idMateriel`, `nomMateriel`, `categorie`, `description`, `adresse`, `photo`, `dateAjout`, `prixHeure`, `etat`, `idClient`) VALUES
(237, 'moinssonneuses1', 'faucheuses', 'la moissonneuse automatisÃ©e', 'tunis', 'id234_26052020112635_a.jpg', '2020-05-26 07:44:56', 90, 1, 234),
(239, 'tractour1', 'tracteurs', 'tracteurs', 'beja', 'id234_26052020085527_11.JPG', '2020-05-26 07:55:27', 50, 1, 234),
(240, 'ensileuses1', 'ensileuses', 'Puissance maxi. : 279 kW (380 ch)', 'tunis', 'id234_26052020085616_2.JPG', '2020-05-26 07:56:16', 100, 1, 234),
(241, 'rÃ©colteuses1', 'recolteuses', 'Type de culture: Ã  betteraves, de betteraves sucriÃ¨res\r\n', 'tunis', 'id234_26052020085801_3.JPG', '2020-05-26 07:57:46', 100, 2, 234),
(247, 'Presses ', 'presses', ' haute capacitÃ© et haute performance ', 'sfax', 'id195_26052020135405_id234_26052020091015_12.JPG', '2020-05-26 08:10:15', 60, 1, 195),
(248, 'faucheuses1', 'faucheuses', 'Avec un conditionneur Ã  flÃ©aux ou des rouleaux de conditionnement', 'nabeul', 'id234_26052020091130_13.JPG', '2020-05-26 08:11:30', 100, 2, 195),
(253, 'ensileuses2', 'ensileuses', 'description ensileuses ', 'sousse', 'id234_26052020113418_semoirs.jpeg', '2020-05-26 10:34:18', 4, 0, 234),
(255, 'tracteurs rouge', 'tracteurs', 'description de tracteur', 'mahdia', 'id195_26052020135713_id235_26052020114922_6.JPG', '2020-05-26 12:57:13', 50, 1, 195),
(256, 'tracteurs rouge', 'tracteurs', 'description de tracteur', 'mahdia', 'id195_26052020135852_id235_26052020114922_6.JPG', '2020-05-26 12:58:52', 50, 2, 195),
(257, 'faucheuses', 'faucheuses', 'description faucheses', 'kef', 'id195_26052020140058_id195_26052020090529_7.JPG', '2020-05-26 13:00:58', 9, 0, 195);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `emailClient` varchar(30) NOT NULL,
  `mdpClient` varchar(50) NOT NULL,
  `telephone` int(8) NOT NULL,
  `sexe` varchar(5) NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=243 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `nom`, `prenom`, `emailClient`, `mdpClient`, `telephone`, `sexe`) VALUES
(195, 'Laffet', 'Eya', 'eya@gmail.com', 'b5654f3e5a16b9bb1f53b3942f076b70', 52117277, 'Femme'),
(234, 'Bejaoui', 'Melek', 'melek@gmail.com', '8bd5b67121d84eecff7a0f2130509521', 52698741, 'Homme'),
(236, 'fekri', 'ahlem', 'ahlem@gmail.com', 'fb1626a06c1193ccff0ccaa711fbdf92', 22256987, 'Femme'),
(238, 'abidi', 'saif', 'saif@gmail.com', '44c099ff522cd529ade21a9c7aa54ebf', 52639789, 'Homme'),
(242, 'zairi', 'dorra', 'dorra@gmail.com', '48c558cc6dc6198ede303c8283672273', 53698741, 'Femme');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `dateCommande` date NOT NULL,
  `heureDebut` time(4) NOT NULL,
  `nbrHeure` int(10) NOT NULL,
  `prixTotal` int(20) NOT NULL,
  `idMateriel` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `idMateriel` (`idMateriel`),
  KEY `idClient` (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `dateCommande`, `heureDebut`, `nbrHeure`, `prixTotal`, `idMateriel`, `idClient`) VALUES
(72, '2020-05-29', '14:58:00.0000', 2, 180, 237, 195),
(73, '2020-05-28', '15:04:00.0000', 2, 100, 239, 195),
(74, '2020-05-28', '15:08:00.0000', 5, 300, 247, 195);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `idContact` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `objet` varchar(20) NOT NULL,
  `message` varchar(50) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idContact`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`idContact`, `nom`, `prenom`, `email`, `objet`, `message`, `dateAjout`) VALUES
(8, 'Laffet', 'Eya', 'sarra@gmail.com', 'objet1', 'message1', '2020-05-26 08:32:26'),
(9, 'Bejaoui', 'Melek', 'melek@gmail.com', 'objet2', 'message2', '2020-05-26 08:32:44'),
(10, 'ben mohamed ', 'ahmed', 'haifa@gmail.com', 'objet3', 'message3', '2020-05-26 08:33:09'),
(11, 'jihen', 'zoghlemi', 'jihen@gmail.com', 'objet3', 'message3', '2020-05-26 08:34:00'),
(12, 'sinda', 'khazri', 'sinda@gmail.com', 'objet4', 'message4', '2020-05-26 08:34:27'),
(13, 'ben jrad ', 'eya ', 'eya@gmail.com', 'objet5', 'message5', '2020-05-26 09:08:54');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annoncemateriel`
--
ALTER TABLE `annoncemateriel`
  ADD CONSTRAINT `annoncemateriel_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`idMateriel`) REFERENCES `annoncemateriel` (`idMateriel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
