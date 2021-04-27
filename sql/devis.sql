-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 27 avr. 2021 à 12:38
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `devis`
--

-- --------------------------------------------------------

--
-- Structure de la table `devis_client`
--

CREATE TABLE `devis_client` (
  `idDevis` int(11) NOT NULL,
  `numDevis` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomClient` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenomClient` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `agence` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metier` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `programme` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frequence` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateEmissionFin` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateActuel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typeDevis` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prixSemaine` int(11) DEFAULT NULL,
  `prixMois` int(11) DEFAULT NULL,
  `prixAnnee` int(11) DEFAULT NULL,
  `prixTotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `devis_client`
--

INSERT INTO `devis_client` (`idDevis`, `numDevis`, `nomClient`, `prenomClient`, `adresse`, `agence`, `email`, `metier`, `programme`, `frequence`, `dateEmissionFin`, `dateActuel`, `typeDevis`, `prixSemaine`, `prixMois`, `prixAnnee`, `prixTotal`) VALUES
(180, '2021042317', 'test', 'test', '', 'PARIS', '', 'PSYCHOMOTRICITÉ', 'bilan', '', '2021-07-22', '2021-04-23', 'PSYbi', 0, 0, 360, 360),
(181, '2021042701', 'test', 'test', '', 'PARIS', '', 'PSYCHOMOTRICITÉ', 'suivi', '80f1a', '2021-07-26', '2021-04-27', 'PSYsu', 120, 480, 4800, 4800),
(182, '2021042702', 'ㅁㄴㅇㄹ', 'ㅁㄴㅇㄹ', '', 'RIS-ORANGIS', '', 'PSYCHOMOTRICITÉ', 'suivi', '80f1a', '2021-07-26', '2021-04-27', 'PSYsu', 120, 480, 4800, 4800),
(183, '2021042703', 'nom', 'prenom', 'adresse', 'PARIS', '', 'PSYCHOMOTRICITÉ', 'suivi', '80f1a', '2021-07-26', '2021-04-27', 'PSYsu', 4800, 120, 480, 480),
(184, '2021042704', 'test', 'test', 'test', 'PARIS', 'test@test.test', 'PSYCHOMOTRICITÉ', 'bilan', '', '2021-07-26', '2021-04-27', 'PSYbi', 0, 0, 360, 360),
(185, '2021042705', 'test', 'test', 'test', 'PARIS', 'test@test.test', 'PSYCHOMOTRICITÉ', 'suivi', '40f1a', '2021-07-26', '2021-04-27', 'PSYsu', 2400, 60, 240, 240);

-- --------------------------------------------------------

--
-- Structure de la table `info_frequence`
--

CREATE TABLE `info_frequence` (
  `codeFrequence` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomFrequence` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fSemaine` int(11) NOT NULL,
  `fMois` int(11) NOT NULL,
  `fAnnee` int(11) NOT NULL,
  `seanceTotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `info_frequence`
--

INSERT INTO `info_frequence` (`codeFrequence`, `nomFrequence`, `fSemaine`, `fMois`, `fAnnee`, `seanceTotal`) VALUES
('20f1a', '20 fois / an', 1, 2, 20, 20),
('20f6m', '20 fois / 6 mois', 2, 4, 20, 20),
('40f1a', '40 fois / an', 1, 4, 40, 40),
('40f6m', '40 fois / 6 mois', 2, 8, 40, 40),
('80f1a', '80 fois / an', 2, 8, 80, 80);

-- --------------------------------------------------------

--
-- Structure de la table `info_services`
--

CREATE TABLE `info_services` (
  `idService` int(11) NOT NULL,
  `nomService` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `unite` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Séance',
  `typeConsultation` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semaine` int(11) DEFAULT NULL,
  `mois` int(11) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  `typeClassification` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix` int(11) DEFAULT NULL COMMENT 'euros'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `info_services`
--

INSERT INTO `info_services` (`idService`, `nomService`, `description`, `unite`, `typeConsultation`, `semaine`, `mois`, `annee`, `typeClassification`, `prix`) VALUES
(1, 'PSYCHOMOTRICITÉ', 'Bilan psychomoteur', 'Séance', 'Bilan', NULL, NULL, 1, 'psybi', 360),
(2, 'PSYCHOMOTRICITÉ', 'Consultation de suivi psychomotricité', 'Séance', 'Suivi', NULL, NULL, NULL, 'psysu', 60),
(3, 'NEUROPSYCHOLOGIE', 'Bilan Neuropsychologique', 'Séance', 'Bilan', NULL, NULL, 1, 'neubi', 360),
(4, 'NEUROPSYCHOLOGIE', 'Séance de remédiation cognitive', 'Séance', 'Suivi', NULL, NULL, NULL, 'neusu', 60),
(5, 'ORTHOPHONIE', 'Bilan Orthophonique', 'Séance', 'Bilan', NULL, NULL, 1, 'ortbi', 360),
(6, 'ORTHOPHONIE', 'Séance de suivi de Orthophoniste', 'Séance', 'Suivi', NULL, NULL, NULL, 'ortsu', 34),
(7, 'SPECIALISTE DU LANGUE', 'Bilan du langue, de la prole et de la communication', 'Séance', 'Bilan', NULL, NULL, 1, 'spebi', 360),
(8, 'SPECIALISTE DU LANGUE', 'Rééducation du langage de la prole et de la communication', 'Séance', 'Suivi', NULL, NULL, NULL, 'spesu', 34),
(9, 'NATUROPATHIE / REFLEXOLOGIE', 'Séance de suivi de NATUROPATHIE / REFLEXOLOGIE', 'Séance', 'Suivi', NULL, NULL, NULL, 'natsu', 60),
(10, 'SOPHROLOGIE', 'Séance de suivi de sophrologie', 'Séance', 'Suivi', NULL, NULL, NULL, 'sopsu', 60),
(11, 'EDUCATRICE SPÉCIALISÉE', 'Séances d’accompagnement et de suivi', 'Séance', 'Suivi', NULL, NULL, 1, 'edusu', 60),
(12, 'ENSEIGNANTE SPECIALISÉE', 'Séance de suivi d\'Enseignante spécialisée', 'Séance', 'Suivi', NULL, NULL, NULL, 'enssu', 60);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `devis_client`
--
ALTER TABLE `devis_client`
  ADD PRIMARY KEY (`idDevis`);

--
-- Index pour la table `info_frequence`
--
ALTER TABLE `info_frequence`
  ADD PRIMARY KEY (`codeFrequence`);

--
-- Index pour la table `info_services`
--
ALTER TABLE `info_services`
  ADD PRIMARY KEY (`idService`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `devis_client`
--
ALTER TABLE `devis_client`
  MODIFY `idDevis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT pour la table `info_services`
--
ALTER TABLE `info_services`
  MODIFY `idService` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
