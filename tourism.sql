-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 21 sep. 2022 à 12:05
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tourism`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_categorie`
--

CREATE TABLE `tbl_categorie` (
  `CodeCategorie` int(11) NOT NULL,
  `Categorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `CodeClient` int(11) NOT NULL,
  `NomClient` varchar(50) NOT NULL,
  `PostnomClient` varchar(50) NOT NULL,
  `PrenomClient` varchar(50) NOT NULL,
  `Telephone` varchar(15) NOT NULL,
  `Nationalite` varchar(200) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `Photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_paiement`
--

CREATE TABLE `tbl_paiement` (
  `CodePaiement` int(11) NOT NULL,
  `Montant` float NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_photo`
--

CREATE TABLE `tbl_photo` (
  `CodePhoto` int(11) NOT NULL,
  `Photo` text NOT NULL,
  `Description` text NOT NULL,
  `Created_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `CodeSite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_province`
--

CREATE TABLE `tbl_province` (
  `CodeProvince` int(11) NOT NULL,
  `Province` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_reservation`
--

CREATE TABLE `tbl_reservation` (
  `CodeReservation` int(11) NOT NULL,
  `Created_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `CodeSite` int(11) NOT NULL,
  `CodeClient` int(11) NOT NULL,
  `CodePaiement` int(11) NOT NULL,
  `DateDepart` datetime NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_site`
--

CREATE TABLE `tbl_site` (
  `CodeSite` int(11) NOT NULL,
  `Designation` varchar(200) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Longitude` varchar(100) NOT NULL,
  `Latitude` varchar(100) NOT NULL,
  `Prevision` float NOT NULL,
  `Gestionnaire` varchar(255) NOT NULL,
  `CodeCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `CodeUser` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `Photo` text NOT NULL,
  `Created_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tbl_categorie`
--
ALTER TABLE `tbl_categorie`
  ADD PRIMARY KEY (`CodeCategorie`);

--
-- Index pour la table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`CodeClient`);

--
-- Index pour la table `tbl_paiement`
--
ALTER TABLE `tbl_paiement`
  ADD PRIMARY KEY (`CodePaiement`);

--
-- Index pour la table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  ADD PRIMARY KEY (`CodePhoto`);

--
-- Index pour la table `tbl_province`
--
ALTER TABLE `tbl_province`
  ADD PRIMARY KEY (`CodeProvince`);

--
-- Index pour la table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD PRIMARY KEY (`CodeReservation`);

--
-- Index pour la table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`CodeUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tbl_categorie`
--
ALTER TABLE `tbl_categorie`
  MODIFY `CodeCategorie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `CodeClient` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_paiement`
--
ALTER TABLE `tbl_paiement`
  MODIFY `CodePaiement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  MODIFY `CodePhoto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_province`
--
ALTER TABLE `tbl_province`
  MODIFY `CodeProvince` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `CodeReservation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `CodeUser` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
