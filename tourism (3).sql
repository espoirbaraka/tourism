-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 26 sep. 2022 à 23:01
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
  `Categorie` varchar(100) NOT NULL,
  `Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbl_categorie`
--

INSERT INTO `tbl_categorie` (`CodeCategorie`, `Categorie`, `Image`) VALUES
(1, 'Hotel', '293542041.jpg'),
(3, 'Ile', 'tchegera-island.jpg'),
(5, 'Plage', '121424968.jpg'),
(7, 'Lac', '73c4b9e3e248ebdb854a22e48cbe8984.png'),
(8, 'Montagne', 'goma-rdc-kivu.jpg'),
(9, 'Paysage', 'masisi.jpg'),
(10, 'Parc', 'landing_about.jpg'),
(11, 'Base militaire', 'Un-écogarde-du-parc-national-de-Virunga-1024x576.jpg');

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

--
-- Déchargement des données de la table `tbl_photo`
--

INSERT INTO `tbl_photo` (`CodePhoto`, `Photo`, `Description`, `Created_On`, `CodeSite`) VALUES
(1, 'Garcon Lac vert2.jpg', '', '2022-09-26 07:27:18', 1),
(3, 'lac-vert-1024x684.jpg', '', '2022-09-26 08:54:51', 1),
(4, 'Lac vert.jpg', '', '2022-09-26 08:55:00', 1),
(5, 'E0mmWUeXIAE9qld.jpg', '', '2022-09-26 08:55:11', 1),
(6, '24062512725_bf343fb0a5_b.jpg', '', '2022-09-26 08:57:15', 1),
(7, 'gomalv12.jpg', '', '2022-09-26 09:18:16', 1),
(8, 'P1010277.JPG', '', '2022-09-26 09:18:24', 1),
(9, 'gomal110.jpg', '', '2022-09-26 09:18:33', 1),
(10, 'iStock-1272068914_cratère_lac_vert_goma_KLKL.jpg', '', '2022-09-26 09:18:43', 1),
(11, 'Tchegera-Island (1).jpg', '', '2022-09-26 12:52:34', 2),
(12, 'tchegera-canoe-700x392.jpg', '', '2022-09-26 12:52:43', 2),
(13, 'tchegera-island-tented.jpg', '', '2022-09-26 12:52:55', 2),
(14, 'tchegera-tented-camp.jpg', '', '2022-09-26 12:53:04', 2),
(15, 'Brent_Stirton_Getty_Images_for_Virunga_National_Park_Tchegera_Island_Tent.jpeg', '', '2022-09-26 12:53:18', 2),
(16, 'tchegera-island.jpg', '', '2022-09-26 12:53:32', 2),
(17, 'tchegera-1024x682.jpg', '', '2022-09-26 12:53:42', 2),
(18, 'EImwmplWwAAqAdN.jpg', '', '2022-09-26 13:02:35', 3),
(19, 'arton3865-1024x537.jpg', '', '2022-09-26 13:02:43', 3),
(20, '5f116f0709219204674370.jpg', '', '2022-09-26 13:02:51', 3),
(21, 'mont-goma.jpg', '', '2022-09-26 13:03:00', 3),
(22, 'DR-Congo-Nyiragongo-Volcano-Monitoring-Dario-Tedesco-2-Resized.jpg', '', '2022-09-26 13:03:09', 3),
(23, 'Volcan Nyiragongo (Clara Padovan) (3)_0.jfif', '', '2022-09-26 13:12:24', 4),
(24, 'La-porte-des-Enfers-du-volcan-Nyiragongo-inquiete.jpg', '', '2022-09-26 13:12:32', 4),
(25, 'An_aerial_view_of_the_towering_volcanic_peak_of_Mt._Nyiragongo.jpg', '', '2022-09-26 13:12:41', 4),
(26, 'IMG_5516.JPG', '', '2022-09-26 13:13:04', 4),
(27, 'IMG_5535.JPG', '', '2022-09-26 13:13:30', 4),
(28, 'IMG_5540.JPG', '', '2022-09-26 13:13:52', 4),
(29, 'IMG_5756.JPG', '', '2022-09-26 13:14:20', 4),
(30, 'IMG_5829.JPG', '', '2022-09-26 13:14:47', 4),
(31, 'IMG_5837.JPG', '', '2022-09-26 13:15:03', 4),
(32, 'IMG_5646.JPG', '', '2022-09-26 13:15:54', 4),
(33, 'IMG_5629.JPG', '', '2022-09-26 13:16:25', 4),
(34, 'masisi.jpg', '', '2022-09-26 13:30:19', 5),
(35, '0iXn1gPfacetWL0pux9uCkmxCIvjtnMppqJIthX9y9S7EuNhksfRhLxRV4B60Oe5edpGmYEkWGs1mAIbtI+6dxFJgXfvP1ukWjG.webp', '', '2022-09-26 13:30:27', 5),
(36, 'Mushaki.jpg', '', '2022-09-26 13:30:35', 5),
(37, 'Ec-dTPdXsAE5lTs.jpg', '', '2022-09-26 13:30:43', 5),
(38, '93e07a2d-5b1a-46b3-8f64-97ad51f25936.jpg', '', '2022-09-26 13:30:50', 5),
(39, '39775628980_658dab3be1_b.jpg', '', '2022-09-26 13:30:59', 5),
(40, 'Masisi-Mushaki.jpeg', '', '2022-09-26 13:31:07', 5),
(41, 'téléchargement.jfif', '', '2022-09-26 13:31:15', 5),
(42, 'iMushaki-20.jpg', '', '2022-09-26 13:31:24', 5),
(43, '5940088464_529be194b8_b.jpg', '', '2022-09-26 13:40:37', 6),
(44, 'entering-rumangabo-station.jpg', '', '2022-09-26 13:40:44', 6),
(45, 'Parc des Virunga.jpeg', '', '2022-09-26 13:40:52', 6),
(46, 'view-of-mikeno-volcano.jpg', '', '2022-09-26 13:41:00', 6),
(47, 'Rumangabo-750x450.jpg', '', '2022-09-26 13:41:10', 6),
(48, 'mikeno-exterior.jpg', '', '2022-09-26 13:41:19', 6),
(49, 'virunga_13.JPG', '', '2022-09-26 13:45:47', 7),
(50, 'landing_about.jpg', '', '2022-09-26 13:45:54', 7),
(51, 'Parc-des-Virunga-et-Hopital-general-de-reference-de-Mutwanga.jpg', '', '2022-09-26 13:46:02', 7),
(52, 'NHWCIOVGIS7XEVPYRQFG6TDIPA.jpg', '', '2022-09-26 13:46:10', 7),
(53, 'Le+Parc+National+des+Virunga.jfif', '', '2022-09-26 13:46:19', 7),
(54, 'virunganov_067.jpg', '', '2022-09-26 13:46:27', 7),
(55, 'site_0063_0001-1200-630-20150413150423.jpg', '', '2022-09-26 13:46:35', 7),
(56, 'phppkfRqg.jpg', '', '2022-09-26 13:46:43', 7),
(57, 'Gorille-montagne_0.jpg', '', '2022-09-26 13:46:51', 7),
(58, 'virunga-national-park.jpg', '', '2022-09-26 13:47:24', 7),
(59, '_117365380_virunga.jpg', '', '2022-09-26 13:47:36', 7),
(60, 'stock-photo-daytime-nobody-outdoors-plant-wildlife-tree-forest-selective-focus-square-50563415-3780-496f-a967-e36f0bb731b9-2-800x450.jpg', '', '2022-09-26 13:47:47', 7),
(61, 'Qubmo8YF_400x400.png', '', '2022-09-26 13:47:57', 7),
(62, '1.Buhimba\'.jpg', '', '2022-09-26 13:53:43', 8),
(63, 'EQv-qBZWoAMT2HW.jpg', '', '2022-09-26 13:53:50', 8),
(64, 'seminaire-1.webp', '', '2022-09-26 13:53:58', 8),
(65, 'EjHK7sIWkAYoXQC.jpg', '', '2022-09-26 13:54:07', 8),
(66, '291961635.jpg', '', '2022-09-26 13:59:53', 9),
(67, '292841194.jpg', '', '2022-09-26 14:00:00', 9),
(68, '291961659.jpg', '', '2022-09-26 14:00:08', 9),
(69, 'EEBlELBX4AA6UoT.jpg', '', '2022-09-26 14:00:15', 9),
(70, '291961683.jpg', '', '2022-09-26 14:00:22', 9),
(71, 'SARENA-HOTEL.webp', '', '2022-09-26 14:00:38', 9),
(72, '292840900.jpg', '', '2022-09-26 14:00:51', 9),
(73, '100820.12579.quetta.serena-hotels.hero.Goma-Serena-Covid-19-eVPdBtcX-62508-1280x720.jpeg', '', '2022-09-26 14:01:05', 9),
(74, '293542041.jpg', '', '2022-09-26 14:01:14', 9),
(75, 'lake-view.jpg', '', '2022-09-26 14:01:26', 9),
(76, '293542041.jpg', '', '2022-09-26 14:45:26', 1),
(77, 'goma-rdc-kivu.jpg', '', '2022-09-26 16:01:38', 4);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_province`
--

CREATE TABLE `tbl_province` (
  `CodeProvince` int(11) NOT NULL,
  `Province` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbl_province`
--

INSERT INTO `tbl_province` (`CodeProvince`, `Province`) VALUES
(1, 'Nord-kivu'),
(2, 'Sud-kivu'),
(4, 'Maniema'),
(5, 'Ituri');

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
  `Status` int(11) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_site`
--

CREATE TABLE `tbl_site` (
  `CodeSite` int(11) NOT NULL,
  `Designation` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Longitude` varchar(100) NOT NULL,
  `Latitude` varchar(100) NOT NULL,
  `Prevision` float NOT NULL,
  `TempsPrevision` varchar(200) NOT NULL,
  `Gestionnaire` varchar(255) NOT NULL,
  `Image` text NOT NULL,
  `CodeCategorie` int(11) NOT NULL,
  `CodeProvince` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbl_site`
--

INSERT INTO `tbl_site` (`CodeSite`, `Designation`, `Description`, `Adresse`, `Longitude`, `Latitude`, `Prevision`, `TempsPrevision`, `Gestionnaire`, `Image`, `CodeCategorie`, `CodeProvince`) VALUES
(1, 'Lac vert', 'Le magnifique Lac vert s’étend sur une superficie de 1.93 kilomètres. Par sa beauté, ce cadeau de la nature est une des attractions de la ville touristique de Goma (Nord-Kivu). Plusieurs fois menacé, le lac a notamment résisté non seulement à l’afflux des déplacés, mais aussi aux velléités de certains d’en faire une décharge publique ou encore une carrière d’exploitation de sable. Aujourd’hui, plusieurs projets se murmurent autour, mais le Lac vert, c’est aussi ces enfants pauvres qui s’adonnent à la pêche et d’autres qui guettent l’arrivée des touristes pour tendre la main. ', 'Q. lac vert', '1.776788', '27.987902', 100, '6 heures', 'ICCN', 'Lac vert.jpg', 7, 1),
(2, 'Chegera island', 'Située sur les magnifiques eaux turquoises du lac Kivu, l’île de Tchegera est notable pour sa forme en croissant, qui constitue en fait la charnière du cratère supérieur d’un volcan long éteint. Par temps clair, l’île offre une vue spectaculaire sur les volcans de Nyiragongo et Nyamuragira, dont les lacs de lave luisent sous un ciel tapissé d’étoiles. Les deux plus hauts volcans des Virunga, Mikeno et Karisimbi, peuvent également être vus depuis Tchegera, ainsi que les paysages panoramiques du lac Kivu et de ses environs.', 'Lac kivu', '1.776789', '27.964702', 40, '12 heures', 'ICCN', 'tchegera-island.jpg', 3, 2),
(3, 'Mont Goma', 'Mont Goma (Mont Goma) est un/une montagne (class T - hypsographiques) en Democratic Republic of the Congo (general) (Congo, Democratic Republic of The (general)), République Démocratique Du Congo (Africa), ayant le code de région Africa/Middle East. Mont Goma est situé à 1,149 mètres d\'altitude.\r\n\r\nLes coordonnées géographiques sont 2°36\'0\" S et 28°13\'0\" E en DMS (degrés, minutes, secondes) ou -2.6 et 28.2167 (en degrés décimaux). La position UTM est PT31 et la référence Joint Operation Graphics est SA35-11.\r\n\r\nL’heure locale actuelle est 14:01; le lever du soleil est à 08:47 et le coucher du soleil est à 20:54 heure locale (Africa/Kinshasa UTC/GMT+1). Le fuseau horaire pour Mont Goma est UTC/GMT+1\r\nEn 2022 l’heure d’été est valable de - à -.\r\n\r\nA Montagne est un pied d\'élévation au-dessus de la zone environnante avec coin petit sommet, les pentes raides et de secours local de 300 m ou plus.\r\n', 'Ville de goma', '1.776647', '27.98767', 10, '5 heures', 'ICCN', 'DR-Congo-Nyiragongo-Volcano-Monitoring-Dario-Tedesco-2-Resized.jpg', 8, 1),
(4, 'Volcan Nyiragongo', 'Le Nyiragongo, anciennement orthographié Niragongo, est un stratovolcan culminant à 3 470 m d\'altitude dans la vallée du Grand Rift, dans l\'Est de la République démocratique du Congo. Il est localisé dans les montagnes des Virunga à une vingtaine de kilomètres au nord de la ville de Goma et du lac Kivu et à l\'ouest de la frontière du Rwanda. Par sa proximité avec des zones densément peuplées, ses éruptions fréquentes dont la dernière a débuté le 17 mai 20023 – avec une nouvelle phase éruptive le 22 mai 2021 – et la présence d\'un lac de lave quasiment permanent (une rareté dans le monde) pouvant se déverser sur ses pentes en de longues coulées de lave considérées comme les plus rapides au monde, le Nyiragongo est un des volcans les plus actifs et dangereux d\'Afrique.', 'Nord-kivu', '1.77657567', '27.9647456', 300, '1 jour', 'ICCN  et OVG', 'An_aerial_view_of_the_towering_volcanic_peak_of_Mt._Nyiragongo.jpg', 8, 1),
(5, 'Mushaki', 'Voulez-vous visiter la ferme de Maman Rica à Mushaki ? Ceci est pour vous. La ferme de maman Rica est située à Mushaki dans le territoire de Masisi à l’Est de la RD Congo. Le territoire de Masisi est reconnu pour ses végétations et son relief comparable aux alpes en Europe. C’est une région merveilleuse, un des plus bels endroits au monde. Situé à 40’ de la ville de Goma, la ferme maman Rica, regorge des chevaux, des vaches, des ânes en plus d’une végétation montagneuse et sempervirente.', 'Masisi/Nord-kivu', '1.77487', '28.964702', 100, '1 jour', 'Malaika Lodge', '39775628980_658dab3be1_b.jpg', 9, 1),
(6, 'Rumangabo', 'Rumangabo est une base militaire de l\'armée de la République démocratique du Congo située dans le territoire de Rutshuru, au nord de Goma dans la province du Nord-Kivu, à 3,5 kilomètres au nord du siège du parc national des Virunga.', 'Rutshuru', '1.76464535', '27.96475', 100, '6 heures', 'ICCN', 'entering-rumangabo-station.jpg', 11, 1),
(7, 'Parc National des Virunga', 'Le parc national des Virunga a été créé en 1925 dans l\'Est de la République démocratique du Congo, ce qui en fait le plus ancien parc national de l\'Afrique. Son objectif était initialement de protéger les gorilles des montagnes. À l\'origine, il était désigné sous le nom de parc Albert ; son nom actuel date de 1969.', 'Nord-kivu', '1.776789', '29.673738', 300, '1 jours', 'ICCN', 'landing_about.jpg', 10, 1),
(8, 'Buhimba', '', 'Ville de goma', '1.776789', '28.964702', 10, '1 jours', 'Eglise catholique', 'seminaire-1.webp', 9, 1),
(9, 'Goma Serena Hotel', 'Grand hôtel', 'Ville de goma', '1.776789', '27.964702', 200, '1 jour', 'IHUSI', 'lake-view.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `CodeUser` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `Photo` text NOT NULL,
  `Created_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_connection` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbl_user`
--

INSERT INTO `tbl_user` (`CodeUser`, `Username`, `Password`, `Photo`, `Created_On`, `last_connection`) VALUES
(1, 'Espoir', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'IMG_20210107_181859101.jpg', '2022-09-26 11:45:53', '2022-09-26 00:00:00'),
(3, 'siwa', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', '2022-09-21 19:57:02', '0000-00-00 00:00:00');

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
-- Index pour la table `tbl_site`
--
ALTER TABLE `tbl_site`
  ADD PRIMARY KEY (`CodeSite`);

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
  MODIFY `CodeCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `CodePhoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `tbl_province`
--
ALTER TABLE `tbl_province`
  MODIFY `CodeProvince` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `CodeReservation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_site`
--
ALTER TABLE `tbl_site`
  MODIFY `CodeSite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `CodeUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
