-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 20 jan. 2021 à 09:47
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestiondemographique`
--

-- --------------------------------------------------------

--
-- Structure de la table `actenaissance`
--

CREATE TABLE `actenaissance` (
  `ID_ACTNAISS` int(10) NOT NULL,
  `ID_RESPONSABLE` int(10) NOT NULL,
  `ID_CITOYEN` int(10) NOT NULL,
  `referenceAnaiss` varchar(20) NOT NULL,
  `RANG_NAISS` int(2) DEFAULT NULL,
  `NATIONALITE_NAISS` varchar(30) DEFAULT NULL,
  `DATEDECL_AN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `actenaissance`
--

INSERT INTO `actenaissance` (`ID_ACTNAISS`, `ID_RESPONSABLE`, `ID_CITOYEN`, `referenceAnaiss`, `RANG_NAISS`, `NATIONALITE_NAISS`, `DATEDECL_AN`) VALUES
(1, 1, 1, 'AN001', 2, 'Guinéenne', '2019-06-11'),
(2, 1, 4, 'AN002', 5, 'Guinéenne', '2019-06-24'),
(3, 1, 2, 'AN003', 5, 'Guinéenne', '2019-06-05'),
(4, 1, 3, 'AN004', 2, 'Guinéenne', '2019-06-26'),
(5, 1, 5, 'AN005', 7, 'Guinéenne', '2019-07-24'),
(6, 1, 6, 'AN006', 12, 'Guinéenne', '2019-07-28'),
(7, 1, 10, 'AN010', 3, 'Guinéenne', '2019-08-06');

-- --------------------------------------------------------

--
-- Structure de la table `actualites`
--

CREATE TABLE `actualites` (
  `id_actu` int(10) NOT NULL,
  `titre_actu` varchar(255) NOT NULL,
  `contenu_actu` text DEFAULT NULL,
  `date_actu` date DEFAULT NULL,
  `image_actu` varchar(255) DEFAULT NULL,
  `id_dep` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `actualites`
--

INSERT INTO `actualites` (`id_actu`, `titre_actu`, `contenu_actu`, `date_actu`, `image_actu`, `id_dep`) VALUES
(1, 'Guinée - Conakry: vers un bras', 'C’est un secret de polichinelle ! Le vote du code civil révisé consacrant la monogamie au détriment de la polygamie en Guinée a été largement réprouvée par les leaders de la religion\r\n                musulmane. ', '2019-05-20', 'img1.jpg', 1),
(2, 'Projet de nouvelle constitution', 'Dans sa campagne pour la promotion d’une nouvelle Constitution, permettant à Alpha Condé de s’éterniser au pouvoir,le parti présidentiel RPG arc-en-ciel vient de franchir un nouveau pas.', '2019-05-21', 'img2.jpg', 1),
(3, 'CENI - Conakry', 'Le Président de la Commission Electorale Nationale Indépendante exprime ses sincères remerciements à tous les acteurs du processus électoral', '2019-05-22', 'img3.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `antecedant_infraction`
--

CREATE TABLE `antecedant_infraction` (
  `ID_INFRACTION` int(10) NOT NULL,
  `ID_RESPONSABLE` int(10) NOT NULL,
  `ID_CASIERJUD` int(10) NOT NULL,
  `TITRE_INF` varchar(150) DEFAULT NULL,
  `DESCRIPTION_INF` text DEFAULT NULL,
  `MOTIF_INF` text DEFAULT NULL,
  `DEGRE_INF` varchar(50) DEFAULT NULL,
  `DATE_INF` date DEFAULT NULL,
  `LIEU_INF` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `autrespapiers`
--

CREATE TABLE `autrespapiers` (
  `ID_APAPIER` int(10) NOT NULL,
  `ID_RESPONSABLE` int(10) NOT NULL,
  `ID_CITOYEN` int(10) NOT NULL,
  `TITRE` varchar(50) DEFAULT NULL,
  `TYPE` varchar(50) DEFAULT NULL,
  `DATE_EXPIRATION_PAPIER` date DEFAULT NULL,
  `DATE_CONPAPIER` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `carteidentite`
--

CREATE TABLE `carteidentite` (
  `ID_CARTEIDEN` int(10) NOT NULL,
  `ID_RESPONSABLE` int(10) NOT NULL,
  `ID_CITOYEN` int(10) NOT NULL,
  `referenceCarteIden` varchar(20) NOT NULL,
  `DATE_CONFECTION_PAPIER` date DEFAULT NULL,
  `DATE_EXP` date DEFAULT NULL,
  `PHOTO_CARTEIDEN` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `carteidentite`
--

INSERT INTO `carteidentite` (`ID_CARTEIDEN`, `ID_RESPONSABLE`, `ID_CITOYEN`, `referenceCarteIden`, `DATE_CONFECTION_PAPIER`, `DATE_EXP`, `PHOTO_CARTEIDEN`) VALUES
(1, 3, 1, '', '2019-06-19', '2019-06-19', '1.jpg'),
(2, 3, 3, '', '2019-06-19', '2019-06-19', '3.jpg'),
(3, 3, 2, 'CI002', '2024-06-23', '2024-06-23', '2.jpg'),
(4, 3, 4, '', '2019-06-28', '2019-06-28', '4.jpg'),
(5, 3, 5, '', '2024-06-26', '2024-06-26', '5.jpg'),
(6, 3, 6, 'CI006', '2019-06-22', '2019-06-22', '6.jpg'),
(7, 3, 10, 'CI010', '2019-08-07', '2019-08-07', '10.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `casierjudiciaire`
--

CREATE TABLE `casierjudiciaire` (
  `ID_CASIERJUD` int(10) NOT NULL,
  `ID_RESPONSABLE` int(10) NOT NULL,
  `ID_CITOYEN` int(10) NOT NULL,
  `referenceCasJud` varchar(20) NOT NULL,
  `ADRESSE_TRIBUNAL` varchar(150) DEFAULT NULL,
  `TYPE_CASIERJUD` varchar(20) DEFAULT NULL,
  `DATE_CONF_CASIER` date NOT NULL,
  `DATE_EXP_CASIER` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `casierjudiciaire`
--

INSERT INTO `casierjudiciaire` (`ID_CASIERJUD`, `ID_RESPONSABLE`, `ID_CITOYEN`, `referenceCasJud`, `ADRESSE_TRIBUNAL`, `TYPE_CASIERJUD`, `DATE_CONF_CASIER`, `DATE_EXP_CASIER`) VALUES
(2, 4, 1, 'CJ001', 'Mafanco', 'Type1', '2019-07-28', '2019-10-28');

-- --------------------------------------------------------

--
-- Structure de la table `certificatdeces`
--

CREATE TABLE `certificatdeces` (
  `ID_CERTDECES` int(10) NOT NULL,
  `ID_DECLARATION_DECES` int(10) NOT NULL,
  `ID_RESPONSABLE` int(10) NOT NULL,
  `ID_CITOYEN` int(10) NOT NULL,
  `numFamille` varchar(20) NOT NULL,
  `referenceCertDeces` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `certificatdeces`
--

INSERT INTO `certificatdeces` (`ID_CERTDECES`, `ID_DECLARATION_DECES`, `ID_RESPONSABLE`, `ID_CITOYEN`, `numFamille`, `referenceCertDeces`) VALUES
(1, 1, 10, 3, '1234', '');

-- --------------------------------------------------------

--
-- Structure de la table `certificatmariage`
--

CREATE TABLE `certificatmariage` (
  `ID_CERTMARIAGE` int(10) NOT NULL,
  `ID_RESPONSABLE` int(10) NOT NULL,
  `ID_CITOYEN` int(10) NOT NULL,
  `referenceCertMariage` varchar(20) NOT NULL,
  `DEGRE_INSTRUCTION_EPOUX` varchar(50) DEFAULT NULL,
  `DOMICILE_PARENT_EPOUX` varchar(50) DEFAULT NULL,
  `ID_EPOUSE` int(10) NOT NULL,
  `DEGRE_INSTRUCTION_EPOUSE` varchar(50) DEFAULT NULL,
  `DOMICILE_PARENT_EPOUSE` varchar(50) DEFAULT NULL,
  `ID_TEMOIN1` int(10) NOT NULL,
  `ID_TEMOIN2` int(10) NOT NULL,
  `VILLE_MAR` varchar(50) NOT NULL,
  `COMMUNE_MAR` varchar(50) DEFAULT NULL,
  `DATE_MAR` date DEFAULT NULL,
  `DATEDEC_MAR` date DEFAULT NULL,
  `DOT` varchar(10) DEFAULT NULL,
  `ETAT_BIEN_MAR` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `certificatmariage`
--

INSERT INTO `certificatmariage` (`ID_CERTMARIAGE`, `ID_RESPONSABLE`, `ID_CITOYEN`, `referenceCertMariage`, `DEGRE_INSTRUCTION_EPOUX`, `DOMICILE_PARENT_EPOUX`, `ID_EPOUSE`, `DEGRE_INSTRUCTION_EPOUSE`, `DOMICILE_PARENT_EPOUSE`, `ID_TEMOIN1`, `ID_TEMOIN2`, `VILLE_MAR`, `COMMUNE_MAR`, `DATE_MAR`, `DATEDEC_MAR`, `DOT`, `ETAT_BIEN_MAR`) VALUES
(1, 1, 1, '', 'Master 2 Informatique', 'Kobayah', 5, 'Terminales SM', 'Lambanyi', 3, 4, 'Conakry', 'Ratoma', '2019-07-31', '2019-07-29', '5000', 'commun');

-- --------------------------------------------------------

--
-- Structure de la table `certificatnationalite`
--

CREATE TABLE `certificatnationalite` (
  `ID_CERTNATI` int(10) NOT NULL,
  `ID_RESPONSABLE` int(10) NOT NULL,
  `ID_CITOYEN` int(10) NOT NULL,
  `referenceCNationalite` varchar(20) NOT NULL,
  `DATE_FABRICATION` date DEFAULT NULL,
  `DATE_DEM` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `certificatnationalite`
--

INSERT INTO `certificatnationalite` (`ID_CERTNATI`, `ID_RESPONSABLE`, `ID_CITOYEN`, `referenceCNationalite`, `DATE_FABRICATION`, `DATE_DEM`) VALUES
(2, 1, 2, 'CN001', '2019-06-20', '2019-06-12');

-- --------------------------------------------------------

--
-- Structure de la table `certificatresidence`
--

CREATE TABLE `certificatresidence` (
  `ID_CERTRESI` int(10) NOT NULL,
  `ID_RESPONSABLE` int(10) NOT NULL,
  `ID_CITOYEN` int(10) NOT NULL,
  `referenceCResidence` varchar(20) NOT NULL,
  `VILLE_RESI` varchar(50) DEFAULT NULL,
  `QUARTIER_RESI` varchar(250) DEFAULT NULL,
  `SECTEUR_RESI` varchar(50) DEFAULT NULL,
  `NUM_RUE_RES` varchar(50) DEFAULT NULL,
  `NUM_BAT_RES` varchar(20) DEFAULT NULL,
  `DATE_ARRIVEE` date DEFAULT NULL,
  `DATE_CONFECTION_CERTRESI` date DEFAULT NULL,
  `DATE_EXPIRATION_CERTRESI` date DEFAULT NULL,
  `NUM_FAMILLE_RESI` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `certificatresidence`
--

INSERT INTO `certificatresidence` (`ID_CERTRESI`, `ID_RESPONSABLE`, `ID_CITOYEN`, `referenceCResidence`, `VILLE_RESI`, `QUARTIER_RESI`, `SECTEUR_RESI`, `NUM_RUE_RES`, `NUM_BAT_RES`, `DATE_ARRIVEE`, `DATE_CONFECTION_CERTRESI`, `DATE_EXPIRATION_CERTRESI`, `NUM_FAMILLE_RESI`) VALUES
(1, 1, 3, 'CR001', 'Conakry', 'Cosa', 'Petit Symbaya', '12', '12', '2019-06-20', '2019-06-20', '2019-09-20', '124');

-- --------------------------------------------------------

--
-- Structure de la table `certificatsejour`
--

CREATE TABLE `certificatsejour` (
  `ID_CERTSEJOUR` int(10) NOT NULL,
  `ID_RESPONSABLE` int(10) NOT NULL,
  `ID_CITOYEN` int(10) NOT NULL,
  `referenceCSejour` varchar(20) NOT NULL,
  `NATIONALITE_SEJOUR` varchar(30) DEFAULT NULL,
  `NUM_PS_SEJOUR` varchar(30) DEFAULT NULL,
  `DATE_EX_VISA` date DEFAULT NULL,
  `PROVENANCE` varchar(30) DEFAULT NULL,
  `DESTINATION` varchar(30) DEFAULT NULL,
  `DATE_CONFECTION_SEJOUR` date DEFAULT NULL,
  `TYPE_CERTSEJOUR` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `certificatsejour`
--

INSERT INTO `certificatsejour` (`ID_CERTSEJOUR`, `ID_RESPONSABLE`, `ID_CITOYEN`, `referenceCSejour`, `NATIONALITE_SEJOUR`, `NUM_PS_SEJOUR`, `DATE_EX_VISA`, `PROVENANCE`, `DESTINATION`, `DATE_CONFECTION_SEJOUR`, `TYPE_CERTSEJOUR`) VALUES
(2, 1, 1, '', 'guineenne', '555566', '2019-06-27', 'Cameroun', 'Conakry', '2019-06-10', 'Sortie'),
(3, 1, 2, 'CS002', 'Francaise', '2345', '2019-07-04', 'France', 'Guinee', '2019-06-03', 'entree');

-- --------------------------------------------------------

--
-- Structure de la table `certificat_perte`
--

CREATE TABLE `certificat_perte` (
  `ID_CERT_PERTE` int(10) NOT NULL,
  `ID_RESPONSABLE` int(10) NOT NULL,
  `ID_CITOYEN` int(10) NOT NULL,
  `NOM_OBJET` varchar(150) DEFAULT NULL,
  `REFERENCE` varchar(20) DEFAULT NULL,
  `DATE_PERTE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `certificat_perte`
--

INSERT INTO `certificat_perte` (`ID_CERT_PERTE`, `ID_RESPONSABLE`, `ID_CITOYEN`, `NOM_OBJET`, `REFERENCE`, `DATE_PERTE`) VALUES
(1, 1, 1, 'Certificat de sejour', 'CS001', '2019-06-19'),
(2, 1, 2, 'Certificat de sejour', 'CS002', '2019-06-20'),
(4, 1, 3, 'Certificat de residence', 'CR001', '2019-06-20'),
(5, 1, 2, 'Certificat de nationalité', 'CN001', '2019-06-20'),
(6, 1, 3, 'Certificat de deces', 'CD001', '2019-06-21'),
(7, 10, 3, 'Certificat de deces', 'CD002', '2019-06-06'),
(8, 3, 2, 'Carte d\'identité', 'CI002', '2019-06-21');

-- --------------------------------------------------------

--
-- Structure de la table `citoyen`
--

CREATE TABLE `citoyen` (
  `ID_CITOYEN` int(10) NOT NULL,
  `ID_DECNAISS` int(10) NOT NULL,
  `NOM` varchar(50) DEFAULT NULL,
  `PRENOMS` varchar(50) DEFAULT NULL,
  `DATE_NAISS` date DEFAULT NULL,
  `VILLE_NAISS` varchar(50) NOT NULL,
  `LIEU_NAISS` varchar(50) NOT NULL,
  `DOMICILE` varchar(50) DEFAULT NULL,
  `PROFESSION` varchar(50) DEFAULT NULL,
  `NOM_MERE` varchar(50) DEFAULT NULL,
  `PRENOM_MERE` varchar(50) DEFAULT NULL,
  `PROFESSION_MERE` varchar(50) DEFAULT NULL,
  `ADRESSE_MERE` varchar(50) DEFAULT NULL,
  `NOM_PERE` varchar(50) DEFAULT NULL,
  `PRENOM_PERE` varchar(50) DEFAULT NULL,
  `PROFESSION_PERE` varchar(50) DEFAULT NULL,
  `ADRESSE_PERE` varchar(50) DEFAULT NULL,
  `TEL` varchar(15) DEFAULT NULL,
  `EMAIL` varchar(60) DEFAULT NULL,
  `GENRE` varchar(10) DEFAULT NULL,
  `SITUATION_MATRIMONIALE` varchar(50) DEFAULT NULL,
  `TAILLE` float DEFAULT NULL,
  `TEINT` varchar(15) DEFAULT NULL,
  `CHEVEUX` varchar(15) DEFAULT NULL,
  `YEUX` varchar(20) DEFAULT NULL,
  `SIGNE_PARTICULIER` varchar(100) DEFAULT NULL,
  `MOT_PASSE` varchar(50) DEFAULT NULL,
  `NUM_EMPRUNT` varchar(20) DEFAULT NULL,
  `NIN_CITOYEN` varchar(20) DEFAULT NULL,
  `PHOTO_CITOYEN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `citoyen`
--

INSERT INTO `citoyen` (`ID_CITOYEN`, `ID_DECNAISS`, `NOM`, `PRENOMS`, `DATE_NAISS`, `VILLE_NAISS`, `LIEU_NAISS`, `DOMICILE`, `PROFESSION`, `NOM_MERE`, `PRENOM_MERE`, `PROFESSION_MERE`, `ADRESSE_MERE`, `NOM_PERE`, `PRENOM_PERE`, `PROFESSION_PERE`, `ADRESSE_PERE`, `TEL`, `EMAIL`, `GENRE`, `SITUATION_MATRIMONIALE`, `TAILLE`, `TEINT`, `CHEVEUX`, `YEUX`, `SIGNE_PARTICULIER`, `MOT_PASSE`, `NUM_EMPRUNT`, `NIN_CITOYEN`, `PHOTO_CITOYEN`) VALUES
(1, 1, 'Diallo', 'Souleymane', '1990-06-03', 'Pita', 'Timbi Madina', 'Kobayah ', 'Informaticien', 'Camara', 'Salematou', 'Coutiere', 'Cosa', 'Diallo', 'Mamadou Saliou', 'Fonctionnaire', 'Bambeto', '628507580', 'souleymanetimbidiallo@gmail.com', 'M', 'Marié', 1.82, 'Noir', 'Noirs', 'Noirs', 'V.P', 'souleymane', NULL, 'souleymane', '1.jpg'),
(2, 2, 'Camara', 'Aboubacar', '2019-06-04', '', '', 'Poredaka', 'Menusier', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'camara', NULL, 'camara', '2.jpg'),
(3, 3, 'Tolno', 'Sâa Barthélémy Salomon', '1994-08-23', 'Lola', 'N\'zoo', 'Foula Madina', 'Informaticien', 'Grovogui', 'Henriette', 'Enseignante', 'Lambanyi', 'Tolno', 'Alexis', 'Gendarme', 'Lambanyi', '+224657891243', 'tolnosalomon@gmail.com', 'M', 'Célibataire', 1.75, 'Noir', 'Noirs', 'Noirs', 'VP', 'tolno', NULL, 'tolno', '3.jpg'),
(4, 4, 'Lamah', 'Antoine', '1998-06-03', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'antoine', NULL, 'antoine', '4.jpg'),
(5, 5, 'Kanté', 'Hadja Mariama', '1997-06-25', 'Faranah', 'Tiro', 'Lambanyi', 'Commerçante', 'Bangoura', 'Kadiatou', 'Enseignante', 'Bambéto', 'Kanté', 'Alpha Kabinet', 'Enseignant', 'Kountia', '664987512', 'kantesalematou@gmail.com', 'F', 'Mariée', 1.79, 'Clair', 'Noir', 'Noirs', 'V.P', 'kante', '', 'kante', '5.jpg'),
(6, 6, 'Koulemou', 'Niankoye', '2019-04-22', '', '', 'Cimenterie', '', 'Grovogui', 'Madeleine', 'Fonctionnaire d\'Ã©tat', 'Cimenterie', '', '', '', '', '', '', '', '', 0.23, '', '', '', '', 'koulemou', '', 'koulemou', '6.jpg'),
(7, 7, 'Bah', 'Mamadou Bhoye', '2019-06-25', '', '', 'Cosa', '', 'Barry', 'Mariama', 'Enseignante', 'Cosa', 'Bah', 'Ahmadou', 'Fonctionnaire d\'état', 'Cosa', '', '', 'M', '', 0, '', '', '', '', '', '', 'bhoye', ''),
(8, 7, 'Bah', 'Mamadou Bhoye', '2019-06-25', '', '', 'Cosa', NULL, 'Barry', 'Mariama', 'Enseignante', 'Cosa', 'Bah', 'Ahmadou', 'Fonctionnaire d\'état', 'Cosa', NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, 'bhoye', '', 'bhoye', ''),
(9, 8, 'Camara', 'Hawa', '2019-06-06', 'Conakry', 'Madina', NULL, NULL, 'Haidara', 'Aminata', 'Coiffeuse', 'Madina', 'Camara', 'Abdoulaye', 'Informaticien', 'Madina', NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 'hawa', ''),
(10, 11, 'Diabaté', 'Fatoumata Yarie', '2019-08-07', 'Boké', 'Fougoumbayah', 'Conakry', 'Etudiante', 'Traoré', 'Kamissa', 'Femme de ménage', 'Fougoumbayah', 'Diabaté', 'Balla Moussa', 'Bijoutier', 'Fougoumbayah', '+224627145698', 'diabateyarie@gmail.com', 'F', 'Célibataire', 1.65, 'Clair', 'Noirs', 'Noirs', 'VP', 'diabate', NULL, 'diabate', '10.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `declarationdeces`
--

CREATE TABLE `declarationdeces` (
  `ID_DECLARATION_DECES` int(10) NOT NULL,
  `ID_RESPONSABLE` int(10) NOT NULL,
  `NOM_MORT` varchar(20) DEFAULT NULL,
  `PRENOM_MORT` varchar(30) DEFAULT NULL,
  `NOM_DEC` varchar(20) DEFAULT NULL,
  `PRENOM_DEC` varchar(30) DEFAULT NULL,
  `TEL_DEC` int(15) DEFAULT NULL,
  `TYPE_DE_MORT` varchar(50) DEFAULT NULL,
  `DATE_DE_MORT` date DEFAULT NULL,
  `LIEU_DE_MORT` varchar(150) DEFAULT NULL,
  `LIEN_PARENTE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `declarationdeces`
--

INSERT INTO `declarationdeces` (`ID_DECLARATION_DECES`, `ID_RESPONSABLE`, `NOM_MORT`, `PRENOM_MORT`, `NOM_DEC`, `PRENOM_DEC`, `TEL_DEC`, `TYPE_DE_MORT`, `DATE_DE_MORT`, `LIEU_DE_MORT`, `LIEN_PARENTE`) VALUES
(1, 10, 'Diallo', 'Moussa', 'Barry', 'Kadiatou', 6214578, 'Naturelle', '2019-06-21', 'Donka', 'Cousin'),
(2, 1, 'Camara', 'Boutouraby', 'Camara', 'Moussa', 628563127, 'Accident', '2019-06-13', 'Conakry', 'Frère'),
(3, 11, 'Fadiga', 'Cheick', 'Sow', 'Mamadou Alimou', 2147483647, 'Naturelle', '2019-08-03', 'Kissidougou', 'Frère');

-- --------------------------------------------------------

--
-- Structure de la table `declarationnaissance`
--

CREATE TABLE `declarationnaissance` (
  `ID_DECNAISS` int(10) NOT NULL,
  `ID_RESPONSABLE` int(10) NOT NULL,
  `NOM_MERE_DN` varchar(50) DEFAULT NULL,
  `PRENOM_MERE_DN` varchar(50) DEFAULT NULL,
  `AGE_MERE_DN` int(2) DEFAULT NULL,
  `PROFESSION_MERE_DN` varchar(50) DEFAULT NULL,
  `DOMICILE_MERE_DN` varchar(150) DEFAULT NULL,
  `HEURE_ACC` time DEFAULT NULL,
  `DATE_ACC` date DEFAULT NULL,
  `ADRESSE_HOPITAL` varchar(150) DEFAULT NULL,
  `SEXE_DN` varchar(10) DEFAULT NULL,
  `ETAT_VIE` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `declarationnaissance`
--

INSERT INTO `declarationnaissance` (`ID_DECNAISS`, `ID_RESPONSABLE`, `NOM_MERE_DN`, `PRENOM_MERE_DN`, `AGE_MERE_DN`, `PROFESSION_MERE_DN`, `DOMICILE_MERE_DN`, `HEURE_ACC`, `DATE_ACC`, `ADRESSE_HOPITAL`, `SEXE_DN`, `ETAT_VIE`) VALUES
(1, 1, 'Camara', 'Salematou', 25, 'Couturiere', 'Cosa', '10:30:00', '2019-06-12', 'Donka', 'M', 'V'),
(2, 1, 'Barry', 'Diamila', 34, 'Tailleuse', 'Yimbaya', '12:44:07', '2019-08-06', 'CHU Ignace Deen', 'F', 'V'),
(3, 1, 'Barry', 'Aissatou Sira', 25, 'Ménagère', 'Hamdallaye', '03:10:17', '2019-06-23', NULL, 'M', 'V'),
(4, 1, 'Sylla', 'Makalé', 19, 'Etudiante', 'Lambanyi', '17:40:23', '2019-06-18', 'Sino-guinéenne', 'M', 'V'),
(5, 1, 'Bangoura', 'Kadiatou', 26, 'Enseignante', 'Bambéto', '15:45:00', '2019-06-25', 'Donka', 'F', 'V'),
(6, 1, 'Grovogui', 'Madeleine', 27, 'Fonctionnaire d\'état', 'Cimenterie', '12:50:00', '2019-04-22', 'Ignace-Deen', 'M', 'V'),
(7, 1, 'Barry', 'Mariama', 45, 'Enseignante', 'Cosa', '15:26:00', '2019-06-25', 'Donka', 'M', 'V'),
(8, 1, 'Haidara', 'Aminata', 32, 'Coiffeuse', 'Madina', '19:24:00', '2019-06-06', 'Donka', 'F', 'V'),
(11, 11, 'Traoré', 'Kamissa', 24, 'Femme de ménage', 'Fougoumbayah', '15:26:00', '2019-08-07', 'CHU Kakandé', 'F', 'V');

-- --------------------------------------------------------

--
-- Structure de la table `decpertepapier`
--

CREATE TABLE `decpertepapier` (
  `id_DecPerPap` int(10) NOT NULL,
  `titrePapierPerdu` varchar(20) DEFAULT NULL,
  `referencePapierPerdu` varchar(20) NOT NULL,
  `datePerte` date DEFAULT NULL,
  `id_citoyen` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `decpertepapier`
--

INSERT INTO `decpertepapier` (`id_DecPerPap`, `titrePapierPerdu`, `referencePapierPerdu`, `datePerte`, `id_citoyen`) VALUES
(2, 'Certificat de mariag', '', '2019-06-03', 3),
(3, 'Casier judiciaire', '', '2019-06-20', 3),
(4, 'Certificat de nation', '', '2019-06-13', 4);

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `ID_DEMANDE` int(10) NOT NULL,
  `ID_RESPONSABLE` int(10) NOT NULL,
  `ID_CITOYEN` int(10) NOT NULL,
  `MOTIF` text DEFAULT NULL,
  `DATE_DEMANDE` date DEFAULT NULL,
  `DATE_RDV1` date DEFAULT NULL,
  `DATE_RDV2` date DEFAULT NULL,
  `DATE_RDV3` date DEFAULT NULL,
  `DATE_VALIDER` date DEFAULT NULL,
  `ETAT_TRAITEMENT` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`ID_DEMANDE`, `ID_RESPONSABLE`, `ID_CITOYEN`, `MOTIF`, `DATE_DEMANDE`, `DATE_RDV1`, `DATE_RDV2`, `DATE_RDV3`, `DATE_VALIDER`, `ETAT_TRAITEMENT`) VALUES
(47, 6, 2, 'Réference: CS002', '2019-06-21', '2019-06-14', '2019-06-13', '2019-06-25', NULL, NULL),
(48, 8, 2, 'Demande de certificat de nationalité valide!', '2019-06-21', '2019-06-14', '2019-06-13', '2019-06-25', NULL, NULL),
(49, 10, 3, 'Certificat de deces;Identifiant: 124564; Numero de famille: 53446546', '2019-06-21', '2019-06-09', '2019-06-28', '2019-06-27', NULL, NULL),
(50, 10, 3, 'Certificat de deces;Identifiant: 124564; Numero de famille: 12', '2019-06-21', '2019-06-09', '2019-06-28', '2019-06-27', NULL, NULL),
(51, 10, 3, 'Certificat de deces;Identifiant: 45; Numero de famille: 12', '2019-06-21', '2019-06-09', '2019-06-28', '2019-06-27', NULL, NULL),
(52, 10, 3, 'Certificat de deces;Identifiant: 124564; Numero de famille: 124', '2019-06-21', '2019-06-09', '2019-06-28', '2019-06-27', NULL, NULL),
(53, 10, 3, 'Certificat de deces;Identifiant: 124564; Numero de famille: 45', '2019-06-21', '2019-06-09', '2019-06-28', '2019-06-27', NULL, NULL),
(54, 10, 3, 'Réference: CD002', '2019-06-21', '2019-06-09', '2019-06-28', '2019-06-27', NULL, NULL),
(55, 8, 2, 'Demande de certificat de nationalité valide!', '2019-06-21', '2019-06-14', '2019-06-13', '2019-06-25', NULL, NULL),
(56, 1, 1, 'ID de la déclaration: 3', '2019-06-22', '2019-08-01', '2019-08-02', '2019-08-03', '2019-06-23', 'Traitée'),
(57, 1, 4, 'ID de la déclaration: 12', '2019-06-23', '2019-06-20', '2019-06-28', '2019-06-30', '2019-06-25', 'Traitée'),
(58, 3, 2, 'Première demande', '2019-06-23', '2019-06-14', '2019-06-13', '2019-06-25', '2019-06-13', 'Traitée'),
(59, 3, 2, 'Réference: CI002', '2019-06-23', '2019-06-14', '2019-06-13', '2019-06-25', '2019-06-13', 'Traitée'),
(60, 3, 4, 'Première demande', '2019-06-23', '2019-06-20', '2019-06-28', '2019-06-30', '2019-06-28', 'Traitée'),
(61, 3, 2, 'Réference: CI002', '2019-06-24', '2019-06-14', '2019-06-13', '2019-06-25', '2019-06-13', 'Traitée'),
(62, 3, 5, 'Première demande', '2019-06-25', '2019-06-12', '2019-06-18', '2019-06-20', '2019-06-18', 'Traitée'),
(63, 3, 6, 'Première demande', '2019-06-25', '2019-06-21', '2019-06-27', '2019-06-28', '2019-06-27', 'Traitée'),
(64, 5, 4, 'Secteur: ; Numero de rue: ; Numero de batiment: ; Date d\'arrivee: ; Numero de famille: ', '2019-06-25', NULL, NULL, NULL, NULL, NULL),
(65, 1, 2, 'ID de la déclaration: 2', '2019-06-26', '2019-06-19', '2019-06-27', '2019-06-21', '2019-06-27', 'Traitée'),
(66, 1, 3, 'ID de la déclaration: 3', '2019-06-26', '2019-06-20', '2019-06-27', '2019-06-19', '2019-06-27', 'Traitée'),
(67, 3, 6, 'Première demande', '2019-06-26', '2019-06-21', '2019-06-27', '2019-06-28', '2019-06-27', 'Traitée'),
(68, 10, 1, 'Certificat de deces;Identifiant: 78; Numero de famille: 45', '2019-06-26', '2019-08-15', '2019-08-16', '2019-08-17', '2019-08-16', 'Traitée'),
(69, 1, 5, 'ID de la déclaration: 5', '2019-06-30', '2019-06-13', '2019-06-21', '2019-06-29', '2019-06-21', 'Traitée'),
(70, 1, 6, 'ID de la déclaration: 6', '2019-07-24', '2019-07-24', '2019-07-25', '2019-07-26', '2019-07-25', 'Traitée'),
(71, 9, 1, 'Degré d\'instruction de l\'époux: Master 2; Domicile des parents de l\'époux: Kobayah; Date du mariage: 2019-07-31', '2019-07-27', '2019-08-01', '2019-08-02', '2019-08-03', '2019-08-02', 'Traitée'),
(72, 4, 1, 'Première demande', '2019-07-28', '2019-07-23', '2019-07-22', '2019-07-23', '2019-07-22', 'Traitée'),
(73, 1, 10, 'ID de la déclaration: 11', '2019-08-06', '2019-08-13', '2019-08-14', '2019-08-15', '2019-08-14', 'Traitée'),
(74, 3, 10, 'Première demande', '2019-08-06', '2019-08-09', '2019-08-11', '2019-08-12', '2019-08-11', 'Traitée'),
(75, 10, 1, 'Certificat de deces;Identifiant: 78; Numero de famille: 4', '2019-08-08', '2019-08-15', '2019-08-16', '2019-08-17', '2019-08-16', 'Traitée');

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

CREATE TABLE `departements` (
  `id_dep` int(10) NOT NULL,
  `nom_dep` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `departements`
--

INSERT INTO `departements` (`id_dep`, `nom_dep`) VALUES
(1, 'ETAT_CIVIL'),
(2, 'HOPITAL'),
(3, 'POLICE');

-- --------------------------------------------------------

--
-- Structure de la table `passeport`
--

CREATE TABLE `passeport` (
  `ID_PASSEPORT` int(10) NOT NULL,
  `ID_RESPONSABLE` int(10) NOT NULL,
  `ID_CITOYEN` int(10) NOT NULL,
  `referencePasseport` varchar(20) NOT NULL,
  `TYPE_CONFECTION` varchar(50) DEFAULT NULL,
  `TYPE_PASSEPORT` varchar(30) DEFAULT NULL,
  `NUMERO_RECEPISSE` varchar(20) DEFAULT NULL,
  `DATE_PAYEMENT` date DEFAULT NULL,
  `PHOTO_PASSEPORT` longblob DEFAULT NULL,
  `DATE_CONFECTION_PS` date DEFAULT NULL,
  `DATE_EXPIRATION_PS` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `registre`
--

CREATE TABLE `registre` (
  `id_reg` int(11) NOT NULL,
  `num_reg` varchar(3) NOT NULL,
  `mois_reg` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `registre`
--

INSERT INTO `registre` (`id_reg`, `num_reg`, `mois_reg`) VALUES
(1, '246', '02'),
(2, '', '07');

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

CREATE TABLE `responsable` (
  `ID_RESPONSABLE` int(10) NOT NULL,
  `NOM_RESP` varchar(50) DEFAULT NULL,
  `PRENOM_RESP` varchar(50) DEFAULT NULL,
  `PROFESSION_RESP` varchar(50) DEFAULT NULL,
  `LIEU_TRAVAIL` varchar(150) DEFAULT NULL,
  `SERVICE_RESP` varchar(255) DEFAULT NULL,
  `ADRESSE_RESP` varchar(150) DEFAULT NULL,
  `NOM_UTILISATEUR` varchar(50) DEFAULT NULL,
  `MOT_DE_PASSE` varchar(50) DEFAULT NULL,
  `TYPE_COMPTE` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `responsable`
--

INSERT INTO `responsable` (`ID_RESPONSABLE`, `NOM_RESP`, `PRENOM_RESP`, `PROFESSION_RESP`, `LIEU_TRAVAIL`, `SERVICE_RESP`, `ADRESSE_RESP`, `NOM_UTILISATEUR`, `MOT_DE_PASSE`, `TYPE_COMPTE`) VALUES
(1, 'Barry', 'Abdoulaye Djibril', 'Medecin', 'Donka', 'ACTE_NAISSANCE', 'Lansanaya Barrage', 'barry', 'barry', 1),
(2, 'Camara', 'Fatoumata', NULL, NULL, 'PASSEPORT', NULL, 'camara', 'camara', 1),
(3, 'Soumah', 'Mohamed', NULL, NULL, 'CARTE_IDENTITE', NULL, 'soumah', 'soumah', 1),
(4, 'Jean Pierre', 'Loua', NULL, NULL, 'CASIER_JUDICIAIRE', NULL, 'loua', 'loua', 1),
(5, 'Keita', 'Sidiki', NULL, NULL, 'CERTIFICAT_RESIDENCE', NULL, 'sidiki', 'sidiki', 1),
(6, 'Konaté', 'Mamady', NULL, NULL, 'CERTIFICAT_SEJOUR', NULL, NULL, NULL, 1),
(7, 'Balde', 'Thierno Aliou', NULL, NULL, 'CERTIFICAT_PERTE', NULL, 'balde', 'balde', 1),
(8, 'Barry', 'Boubacar Biro', NULL, NULL, 'CERTIFICAT_NATIONALITE', NULL, NULL, NULL, 1),
(9, 'Grovogui', 'Jonathan', NULL, NULL, 'CERTIFICAT_MARIAGE', NULL, NULL, NULL, 1),
(10, 'Cissé', 'Mohamed', NULL, NULL, 'CERTIFICAT_DECES', NULL, NULL, NULL, 1),
(11, 'Diallo', 'Amadou Diogo', 'Medecin', 'Kankako - Centre', 'DECLARATION_NAISSANCE', 'Kakandé', 'diogo', 'diogo', 1),
(12, 'Mara', 'Thierno Djibril', 'Fonctionnaire', 'Kaloum', 'CITOYENNETE', 'Sangoyah', 'mara', 'mara', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actenaissance`
--
ALTER TABLE `actenaissance`
  ADD PRIMARY KEY (`ID_ACTNAISS`),
  ADD KEY `FK_CONFECTIONNER_ACTE_NAISS` (`ID_RESPONSABLE`),
  ADD KEY `FK_RENSEIGNER_ACTE_NAISS` (`ID_CITOYEN`);

--
-- Index pour la table `actualites`
--
ALTER TABLE `actualites`
  ADD PRIMARY KEY (`id_actu`),
  ADD KEY `fk_departements_actualites` (`id_dep`);

--
-- Index pour la table `antecedant_infraction`
--
ALTER TABLE `antecedant_infraction`
  ADD PRIMARY KEY (`ID_INFRACTION`),
  ADD KEY `FK_RENSEIGNER_CASIER` (`ID_CASIERJUD`),
  ADD KEY `FK_ENREGISTRER_INFRACTION` (`ID_RESPONSABLE`);

--
-- Index pour la table `autrespapiers`
--
ALTER TABLE `autrespapiers`
  ADD PRIMARY KEY (`ID_APAPIER`),
  ADD KEY `FK_CONFECTIONNER_AUTRESPAPIERS` (`ID_RESPONSABLE`),
  ADD KEY `FK_RENSEIGNER_AUTRESPAPIERS` (`ID_CITOYEN`);

--
-- Index pour la table `carteidentite`
--
ALTER TABLE `carteidentite`
  ADD PRIMARY KEY (`ID_CARTEIDEN`),
  ADD KEY `FK_CONFECTIONNER_CARTIDEN` (`ID_RESPONSABLE`),
  ADD KEY `FK_RENSEIGNER_CARTIDEN` (`ID_CITOYEN`);

--
-- Index pour la table `casierjudiciaire`
--
ALTER TABLE `casierjudiciaire`
  ADD PRIMARY KEY (`ID_CASIERJUD`),
  ADD KEY `FK_CONFECTIONNER_CASJUD` (`ID_RESPONSABLE`),
  ADD KEY `FK_RENSEIGNER_CASJUD` (`ID_CITOYEN`);

--
-- Index pour la table `certificatdeces`
--
ALTER TABLE `certificatdeces`
  ADD PRIMARY KEY (`ID_CERTDECES`),
  ADD KEY `FK_CONFECTIONNER_CERTDECES` (`ID_RESPONSABLE`),
  ADD KEY `FK_NECESSITE_DECDECES` (`ID_DECLARATION_DECES`),
  ADD KEY `FK_RENSEIGNER_CERTDECES` (`ID_CITOYEN`);

--
-- Index pour la table `certificatmariage`
--
ALTER TABLE `certificatmariage`
  ADD PRIMARY KEY (`ID_CERTMARIAGE`),
  ADD KEY `FK_CONFECTIONER_CERTMARIAGE` (`ID_RESPONSABLE`),
  ADD KEY `FK_RENSEIGNER_CITOYEN` (`ID_CITOYEN`),
  ADD KEY `FK_RENSEIGNER_EPOUSE` (`ID_EPOUSE`),
  ADD KEY `FK_RENSEIGNER_TEMOIN1` (`ID_TEMOIN1`),
  ADD KEY `FK_RENSEIGNER_TEMOIN2` (`ID_TEMOIN2`);

--
-- Index pour la table `certificatnationalite`
--
ALTER TABLE `certificatnationalite`
  ADD PRIMARY KEY (`ID_CERTNATI`),
  ADD KEY `FK_CONFECTIONNER_CERTNATI` (`ID_RESPONSABLE`),
  ADD KEY `FK_RENSEIGNER_CERTNATI` (`ID_CITOYEN`);

--
-- Index pour la table `certificatresidence`
--
ALTER TABLE `certificatresidence`
  ADD PRIMARY KEY (`ID_CERTRESI`),
  ADD KEY `FK_CONFECTIONNER_CERTRES` (`ID_RESPONSABLE`),
  ADD KEY `FK_RENSEIGNER_CERTRES` (`ID_CITOYEN`);

--
-- Index pour la table `certificatsejour`
--
ALTER TABLE `certificatsejour`
  ADD PRIMARY KEY (`ID_CERTSEJOUR`),
  ADD KEY `FK_CONFECTIONNER_CERTSEJ` (`ID_RESPONSABLE`),
  ADD KEY `FK_RENSEIGNER_CERTSEJ` (`ID_CITOYEN`);

--
-- Index pour la table `certificat_perte`
--
ALTER TABLE `certificat_perte`
  ADD PRIMARY KEY (`ID_CERT_PERTE`),
  ADD UNIQUE KEY `REFERENCE` (`REFERENCE`),
  ADD KEY `FK_CONFECTIONNER_CERTPERTE` (`ID_RESPONSABLE`),
  ADD KEY `FK_RENSEIGNER_CERTPERTE` (`ID_CITOYEN`);

--
-- Index pour la table `citoyen`
--
ALTER TABLE `citoyen`
  ADD PRIMARY KEY (`ID_CITOYEN`),
  ADD KEY `FK_NECESSITE_DEC_NAISS` (`ID_DECNAISS`);

--
-- Index pour la table `declarationdeces`
--
ALTER TABLE `declarationdeces`
  ADD PRIMARY KEY (`ID_DECLARATION_DECES`),
  ADD KEY `FK_ASSOCIATION_19` (`ID_RESPONSABLE`);

--
-- Index pour la table `declarationnaissance`
--
ALTER TABLE `declarationnaissance`
  ADD PRIMARY KEY (`ID_DECNAISS`),
  ADD KEY `FK_CONFECTIONNER_DEC_NAISS` (`ID_RESPONSABLE`);

--
-- Index pour la table `decpertepapier`
--
ALTER TABLE `decpertepapier`
  ADD PRIMARY KEY (`id_DecPerPap`),
  ADD KEY `fk_decperte_citoyen` (`id_citoyen`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`ID_DEMANDE`),
  ADD KEY `FK_DEMANDE1` (`ID_RESPONSABLE`),
  ADD KEY `FK_DEMANDE2` (`ID_CITOYEN`);

--
-- Index pour la table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id_dep`);

--
-- Index pour la table `passeport`
--
ALTER TABLE `passeport`
  ADD PRIMARY KEY (`ID_PASSEPORT`),
  ADD KEY `FK_CONFECTIONNER_PASSEPORT` (`ID_RESPONSABLE`),
  ADD KEY `FK_RENSEIGNER_PASSEPORT` (`ID_CITOYEN`);

--
-- Index pour la table `registre`
--
ALTER TABLE `registre`
  ADD PRIMARY KEY (`id_reg`);

--
-- Index pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`ID_RESPONSABLE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actenaissance`
--
ALTER TABLE `actenaissance`
  MODIFY `ID_ACTNAISS` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `actualites`
--
ALTER TABLE `actualites`
  MODIFY `id_actu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `antecedant_infraction`
--
ALTER TABLE `antecedant_infraction`
  MODIFY `ID_INFRACTION` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `autrespapiers`
--
ALTER TABLE `autrespapiers`
  MODIFY `ID_APAPIER` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `carteidentite`
--
ALTER TABLE `carteidentite`
  MODIFY `ID_CARTEIDEN` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `casierjudiciaire`
--
ALTER TABLE `casierjudiciaire`
  MODIFY `ID_CASIERJUD` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `certificatdeces`
--
ALTER TABLE `certificatdeces`
  MODIFY `ID_CERTDECES` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `certificatmariage`
--
ALTER TABLE `certificatmariage`
  MODIFY `ID_CERTMARIAGE` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `certificatnationalite`
--
ALTER TABLE `certificatnationalite`
  MODIFY `ID_CERTNATI` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `certificatresidence`
--
ALTER TABLE `certificatresidence`
  MODIFY `ID_CERTRESI` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `certificatsejour`
--
ALTER TABLE `certificatsejour`
  MODIFY `ID_CERTSEJOUR` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `certificat_perte`
--
ALTER TABLE `certificat_perte`
  MODIFY `ID_CERT_PERTE` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `citoyen`
--
ALTER TABLE `citoyen`
  MODIFY `ID_CITOYEN` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `declarationdeces`
--
ALTER TABLE `declarationdeces`
  MODIFY `ID_DECLARATION_DECES` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `declarationnaissance`
--
ALTER TABLE `declarationnaissance`
  MODIFY `ID_DECNAISS` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `decpertepapier`
--
ALTER TABLE `decpertepapier`
  MODIFY `id_DecPerPap` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `ID_DEMANDE` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT pour la table `departements`
--
ALTER TABLE `departements`
  MODIFY `id_dep` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `passeport`
--
ALTER TABLE `passeport`
  MODIFY `ID_PASSEPORT` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `registre`
--
ALTER TABLE `registre`
  MODIFY `id_reg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `responsable`
--
ALTER TABLE `responsable`
  MODIFY `ID_RESPONSABLE` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `actenaissance`
--
ALTER TABLE `actenaissance`
  ADD CONSTRAINT `FK_CONFECTIONNER_ACTE_NAISS` FOREIGN KEY (`ID_RESPONSABLE`) REFERENCES `responsable` (`ID_RESPONSABLE`),
  ADD CONSTRAINT `FK_RENSEIGNER_ACTE_NAISS` FOREIGN KEY (`ID_CITOYEN`) REFERENCES `citoyen` (`ID_CITOYEN`);

--
-- Contraintes pour la table `actualites`
--
ALTER TABLE `actualites`
  ADD CONSTRAINT `fk_departements_actualites` FOREIGN KEY (`id_dep`) REFERENCES `departements` (`id_dep`);

--
-- Contraintes pour la table `antecedant_infraction`
--
ALTER TABLE `antecedant_infraction`
  ADD CONSTRAINT `FK_ENREGISTRER_INFRACTION` FOREIGN KEY (`ID_RESPONSABLE`) REFERENCES `responsable` (`ID_RESPONSABLE`),
  ADD CONSTRAINT `FK_RENSEIGNER_CASIER` FOREIGN KEY (`ID_CASIERJUD`) REFERENCES `casierjudiciaire` (`ID_CASIERJUD`);

--
-- Contraintes pour la table `autrespapiers`
--
ALTER TABLE `autrespapiers`
  ADD CONSTRAINT `FK_CONFECTIONNER_AUTRESPAPIERS` FOREIGN KEY (`ID_RESPONSABLE`) REFERENCES `responsable` (`ID_RESPONSABLE`),
  ADD CONSTRAINT `FK_RENSEIGNER_AUTRESPAPIERS` FOREIGN KEY (`ID_CITOYEN`) REFERENCES `citoyen` (`ID_CITOYEN`);

--
-- Contraintes pour la table `carteidentite`
--
ALTER TABLE `carteidentite`
  ADD CONSTRAINT `FK_CONFECTIONNER_CARTIDEN` FOREIGN KEY (`ID_RESPONSABLE`) REFERENCES `responsable` (`ID_RESPONSABLE`),
  ADD CONSTRAINT `FK_RENSEIGNER_CARTIDEN` FOREIGN KEY (`ID_CITOYEN`) REFERENCES `citoyen` (`ID_CITOYEN`);

--
-- Contraintes pour la table `casierjudiciaire`
--
ALTER TABLE `casierjudiciaire`
  ADD CONSTRAINT `FK_CONFECTIONNER_CASJUD` FOREIGN KEY (`ID_RESPONSABLE`) REFERENCES `responsable` (`ID_RESPONSABLE`),
  ADD CONSTRAINT `FK_RENSEIGNER_CASJUD` FOREIGN KEY (`ID_CITOYEN`) REFERENCES `citoyen` (`ID_CITOYEN`);

--
-- Contraintes pour la table `certificatdeces`
--
ALTER TABLE `certificatdeces`
  ADD CONSTRAINT `FK_CONFECTIONNER_CERTDECES` FOREIGN KEY (`ID_RESPONSABLE`) REFERENCES `responsable` (`ID_RESPONSABLE`),
  ADD CONSTRAINT `FK_NECESSITE_DECDECES` FOREIGN KEY (`ID_DECLARATION_DECES`) REFERENCES `declarationdeces` (`ID_DECLARATION_DECES`),
  ADD CONSTRAINT `FK_RENSEIGNER_CERTDECES` FOREIGN KEY (`ID_CITOYEN`) REFERENCES `citoyen` (`ID_CITOYEN`);

--
-- Contraintes pour la table `certificatmariage`
--
ALTER TABLE `certificatmariage`
  ADD CONSTRAINT `FK_CONFECTIONER_CERTMARIAGE` FOREIGN KEY (`ID_RESPONSABLE`) REFERENCES `responsable` (`ID_RESPONSABLE`),
  ADD CONSTRAINT `FK_RENSEIGNER_CITOYEN` FOREIGN KEY (`ID_CITOYEN`) REFERENCES `citoyen` (`ID_CITOYEN`),
  ADD CONSTRAINT `FK_RENSEIGNER_EPOUSE` FOREIGN KEY (`ID_EPOUSE`) REFERENCES `citoyen` (`ID_CITOYEN`),
  ADD CONSTRAINT `FK_RENSEIGNER_TEMOIN1` FOREIGN KEY (`ID_TEMOIN1`) REFERENCES `citoyen` (`ID_CITOYEN`),
  ADD CONSTRAINT `FK_RENSEIGNER_TEMOIN2` FOREIGN KEY (`ID_TEMOIN2`) REFERENCES `citoyen` (`ID_CITOYEN`);

--
-- Contraintes pour la table `certificatnationalite`
--
ALTER TABLE `certificatnationalite`
  ADD CONSTRAINT `FK_CONFECTIONNER_CERTNATI` FOREIGN KEY (`ID_RESPONSABLE`) REFERENCES `responsable` (`ID_RESPONSABLE`),
  ADD CONSTRAINT `FK_RENSEIGNER_CERTNATI` FOREIGN KEY (`ID_CITOYEN`) REFERENCES `citoyen` (`ID_CITOYEN`);

--
-- Contraintes pour la table `certificatresidence`
--
ALTER TABLE `certificatresidence`
  ADD CONSTRAINT `FK_CONFECTIONNER_CERTRES` FOREIGN KEY (`ID_RESPONSABLE`) REFERENCES `responsable` (`ID_RESPONSABLE`),
  ADD CONSTRAINT `FK_RENSEIGNER_CERTRES` FOREIGN KEY (`ID_CITOYEN`) REFERENCES `citoyen` (`ID_CITOYEN`);

--
-- Contraintes pour la table `certificatsejour`
--
ALTER TABLE `certificatsejour`
  ADD CONSTRAINT `FK_CONFECTIONNER_CERTSEJ` FOREIGN KEY (`ID_RESPONSABLE`) REFERENCES `responsable` (`ID_RESPONSABLE`),
  ADD CONSTRAINT `FK_RENSEIGNER_CERTSEJ` FOREIGN KEY (`ID_CITOYEN`) REFERENCES `citoyen` (`ID_CITOYEN`);

--
-- Contraintes pour la table `certificat_perte`
--
ALTER TABLE `certificat_perte`
  ADD CONSTRAINT `FK_CONFECTIONNER_CERTPERTE` FOREIGN KEY (`ID_RESPONSABLE`) REFERENCES `responsable` (`ID_RESPONSABLE`),
  ADD CONSTRAINT `FK_RENSEIGNER_CERTPERTE` FOREIGN KEY (`ID_CITOYEN`) REFERENCES `citoyen` (`ID_CITOYEN`);

--
-- Contraintes pour la table `declarationdeces`
--
ALTER TABLE `declarationdeces`
  ADD CONSTRAINT `FK_ASSOCIATION_19` FOREIGN KEY (`ID_RESPONSABLE`) REFERENCES `responsable` (`ID_RESPONSABLE`);

--
-- Contraintes pour la table `declarationnaissance`
--
ALTER TABLE `declarationnaissance`
  ADD CONSTRAINT `FK_CONFECTIONNER_DEC_NAISS` FOREIGN KEY (`ID_RESPONSABLE`) REFERENCES `responsable` (`ID_RESPONSABLE`);

--
-- Contraintes pour la table `decpertepapier`
--
ALTER TABLE `decpertepapier`
  ADD CONSTRAINT `fk_decperte_citoyen` FOREIGN KEY (`id_citoyen`) REFERENCES `citoyen` (`ID_CITOYEN`);

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `FK_DEMANDE1` FOREIGN KEY (`ID_RESPONSABLE`) REFERENCES `responsable` (`ID_RESPONSABLE`),
  ADD CONSTRAINT `FK_DEMANDE2` FOREIGN KEY (`ID_CITOYEN`) REFERENCES `citoyen` (`ID_CITOYEN`);

--
-- Contraintes pour la table `passeport`
--
ALTER TABLE `passeport`
  ADD CONSTRAINT `FK_CONFECTIONNER_PASSEPORT` FOREIGN KEY (`ID_RESPONSABLE`) REFERENCES `responsable` (`ID_RESPONSABLE`),
  ADD CONSTRAINT `FK_RENSEIGNER_PASSEPORT` FOREIGN KEY (`ID_CITOYEN`) REFERENCES `citoyen` (`ID_CITOYEN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
