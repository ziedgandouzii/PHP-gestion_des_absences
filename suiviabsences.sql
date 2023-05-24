-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 10:03 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suiviabsences`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_classe`
--

CREATE TABLE `t_classe` (
  `CodeClasse` int(30) NOT NULL,
  `NomClasse` varchar(30) NOT NULL,
  `CodeGroupe` int(30) NOT NULL,
  `CodeDepartement` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_classe`
--

INSERT INTO `t_classe` (`CodeClasse`, `NomClasse`, `CodeGroupe`, `CodeDepartement`) VALUES
(1, 'GM2.1', 2, 3),
(2, 'GE2.1', 1, 2),
(3, 'MDW2.1', 2, 1),
(4, 'DSI2.1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_departement`
--

CREATE TABLE `t_departement` (
  `CodeDepartement` int(30) NOT NULL,
  `NomDepartement` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_departement`
--

INSERT INTO `t_departement` (`CodeDepartement`, `NomDepartement`) VALUES
(1, 'technologie de l\'informatique'),
(2, 'génie électrique'),
(3, 'génie mécanique'),
(4, 'gestion des entreprises');

-- --------------------------------------------------------

--
-- Table structure for table `t_enseignant`
--

CREATE TABLE `t_enseignant` (
  `CodeEnseignant` int(30) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `DateRecrutement` date NOT NULL,
  `Adresse` varchar(30) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `Tel` int(30) NOT NULL,
  `CodeDepartement` int(30) NOT NULL,
  `CodeGrade` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_enseignant`
--

INSERT INTO `t_enseignant` (`CodeEnseignant`, `Nom`, `Prenom`, `DateRecrutement`, `Adresse`, `Mail`, `Tel`, `CodeDepartement`, `CodeGrade`) VALUES
(1, 'Belhadj Said', 'Ramzi', '2018-01-01', 'Mahdia', 'ramzi.isetma@gmail.com', 12345678, 1, 2),
(2, 'Malloug', 'Issa', '2003-01-01', 'Mahdia', 'i.malloug@gmail.com', 114455, 1, 3),
(3, 'Ezzedine', 'Sana', '2017-05-04', 'Sousse', 'sanaezzedine@gmail.com', 1545879, 1, 1),
(4, 'Khayati', 'Alya', '2020-01-01', 'Mahdia', 'khayatialya5@gmail.com', 1144587, 1, 1),
(5, 'Tilouch', 'Amira', '2016-02-05', 'Nabeul', 'tilouch@gmail.com', 11548799, 1, 1),
(6, 'Jguirim', 'Moufida', '2015-04-04', 'Monastir', 'jguirim.moufida@yahoo.com', 1144557, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_etudiant`
--

CREATE TABLE `t_etudiant` (
  `CodeEtudiant` int(30) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `DateNaissance` date NOT NULL,
  `CodeClasse` int(30) NOT NULL,
  `NumInscription` int(30) NOT NULL,
  `Adresse` varchar(30) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `Tel` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_etudiant`
--

INSERT INTO `t_etudiant` (`CodeEtudiant`, `Nom`, `Prenom`, `DateNaissance`, `CodeClasse`, `NumInscription`, `Adresse`, `Mail`, `Tel`) VALUES
(1, 'Gandouzi', 'Zied', '2002-10-23', 3, 22266, 'Manzel bouzaiene', 'ziedgandouzi@gmail.com', 55554902),
(2, 'Mahmoudi', 'Ala', '2002-08-29', 3, 22244, 'Touzeur', 'alaamahmoudi117@gmail.com', 52397166),
(3, 'Sayedi', 'Maher', '2001-10-01', 3, 22255, 'Moknine', 'mahersayedi737@gmail.com', 23443748),
(4, 'Abdellaoui', 'Ghassen', '2002-06-03', 4, 22278, 'Jelma', 'ghassendevo@gmail.com', 50818730);

-- --------------------------------------------------------

--
-- Table structure for table `t_ficheabsence`
--

CREATE TABLE `t_ficheabsence` (
  `CodeFicheAbsence` int(11) NOT NULL,
  `DateJour` date NOT NULL,
  `CodeMatiere` int(11) NOT NULL,
  `CodeEnseignant` int(11) NOT NULL,
  `CodeClasse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_ficheabsence`
--

INSERT INTO `t_ficheabsence` (`CodeFicheAbsence`, `DateJour`, `CodeMatiere`, `CodeEnseignant`, `CodeClasse`) VALUES
(1, '2023-05-01', 1, 1, 3),
(2, '2023-05-03', 2, 2, 3),
(3, '2023-05-09', 1, 1, 3),
(4, '2023-05-15', 2, 2, 3),
(5, '2023-05-14', 3, 2, 3),
(6, '2023-05-02', 3, 2, 3),
(7, '2023-05-01', 1, 1, 3),
(8, '2023-05-16', 2, 2, 3),
(9, '1955-10-10', 1, 1, 3),
(10, '1116-10-10', 1, 1, 3),
(11, '2023-05-01', 1, 1, 3),
(12, '2023-05-19', 2, 1, 3),
(13, '2023-05-21', 5, 2, 3),
(14, '0000-00-00', 1, 1, 3),
(15, '2023-05-17', 1, 6, 3),
(16, '2023-05-17', 1, 1, 3),
(17, '2023-05-16', 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `t_ficheabsenceseance`
--

CREATE TABLE `t_ficheabsenceseance` (
  `CodeFicheAbsence` int(11) NOT NULL,
  `CodeSeance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_ficheabsenceseance`
--

INSERT INTO `t_ficheabsenceseance` (`CodeFicheAbsence`, `CodeSeance`) VALUES
(1, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 4),
(16, 1),
(17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_grade`
--

CREATE TABLE `t_grade` (
  `CodeGrade` int(30) NOT NULL,
  `NomGrade` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_grade`
--

INSERT INTO `t_grade` (`CodeGrade`, `NomGrade`) VALUES
(1, 'grade 1'),
(2, 'grade 2'),
(3, 'grade 3');

-- --------------------------------------------------------

--
-- Table structure for table `t_groupe`
--

CREATE TABLE `t_groupe` (
  `CodeGroupe` int(30) NOT NULL,
  `NomGroupe` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_groupe`
--

INSERT INTO `t_groupe` (`CodeGroupe`, `NomGroupe`) VALUES
(1, 'groupe 1'),
(2, 'groupe 2');

-- --------------------------------------------------------

--
-- Table structure for table `t_ligneficheabsence`
--

CREATE TABLE `t_ligneficheabsence` (
  `CodeFicheAbsence` int(11) NOT NULL,
  `CodeEtudiant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_ligneficheabsence`
--

INSERT INTO `t_ligneficheabsence` (`CodeFicheAbsence`, `CodeEtudiant`) VALUES
(13, 1),
(17, 1),
(12, 2),
(15, 3),
(1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `t_matiere`
--

CREATE TABLE `t_matiere` (
  `CodeMatiere` int(30) NOT NULL,
  `NomMatiere` varchar(30) NOT NULL,
  `NbreHeureCoursParSemaine` int(30) NOT NULL,
  `NbreHeureTDParSemaine` int(30) NOT NULL,
  `NbreHeureTPParSemaine` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_matiere`
--

INSERT INTO `t_matiere` (`CodeMatiere`, `NomMatiere`, `NbreHeureCoursParSemaine`, `NbreHeureTDParSemaine`, `NbreHeureTPParSemaine`) VALUES
(1, 'Mern Stack', 1, 1, 3),
(2, 'PHP', 2, 1, 3),
(3, 'J2E', 2, 1, 3),
(4, 'Django', 1, 3, 1),
(5, 'Sécurité', 2, 0, 0),
(6, '2D', 2, 1, 3),
(7, '3D', 2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `t_seance`
--

CREATE TABLE `t_seance` (
  `CodeSeance` int(30) NOT NULL,
  `NomSeance` varchar(30) NOT NULL,
  `HeureDebut` time NOT NULL,
  `HeureFin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_seance`
--

INSERT INTO `t_seance` (`CodeSeance`, `NomSeance`, `HeureDebut`, `HeureFin`) VALUES
(1, 'seance 1', '08:15:00', '09:45:00'),
(2, 'seance 2', '10:00:00', '11:30:00'),
(3, 'seance 3', '11:30:00', '13:00:00'),
(4, 'seance 4', '13:30:00', '13:00:00'),
(5, 'seance 5', '15:15:00', '16:45:00'),
(6, 'seance 6', '16:45:00', '18:15:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_classe`
--
ALTER TABLE `t_classe`
  ADD PRIMARY KEY (`CodeClasse`),
  ADD UNIQUE KEY `CodeClasse` (`CodeClasse`),
  ADD KEY `CodeDepartement` (`CodeDepartement`),
  ADD KEY `CodeGroupe` (`CodeGroupe`);

--
-- Indexes for table `t_departement`
--
ALTER TABLE `t_departement`
  ADD PRIMARY KEY (`CodeDepartement`);

--
-- Indexes for table `t_enseignant`
--
ALTER TABLE `t_enseignant`
  ADD PRIMARY KEY (`CodeEnseignant`);

--
-- Indexes for table `t_etudiant`
--
ALTER TABLE `t_etudiant`
  ADD PRIMARY KEY (`CodeEtudiant`),
  ADD UNIQUE KEY `CodeEtudiant` (`CodeEtudiant`);

--
-- Indexes for table `t_ficheabsence`
--
ALTER TABLE `t_ficheabsence`
  ADD PRIMARY KEY (`CodeFicheAbsence`);

--
-- Indexes for table `t_ficheabsenceseance`
--
ALTER TABLE `t_ficheabsenceseance`
  ADD KEY `CodeFicheAbsence` (`CodeFicheAbsence`),
  ADD KEY `CodeSeance` (`CodeSeance`);

--
-- Indexes for table `t_grade`
--
ALTER TABLE `t_grade`
  ADD PRIMARY KEY (`CodeGrade`);

--
-- Indexes for table `t_groupe`
--
ALTER TABLE `t_groupe`
  ADD PRIMARY KEY (`CodeGroupe`);

--
-- Indexes for table `t_ligneficheabsence`
--
ALTER TABLE `t_ligneficheabsence`
  ADD PRIMARY KEY (`CodeFicheAbsence`),
  ADD KEY `CodeEtudiant` (`CodeEtudiant`);

--
-- Indexes for table `t_matiere`
--
ALTER TABLE `t_matiere`
  ADD PRIMARY KEY (`CodeMatiere`);

--
-- Indexes for table `t_seance`
--
ALTER TABLE `t_seance`
  ADD PRIMARY KEY (`CodeSeance`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_enseignant`
--
ALTER TABLE `t_enseignant`
  MODIFY `CodeEnseignant` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_etudiant`
--
ALTER TABLE `t_etudiant`
  MODIFY `CodeEtudiant` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_ficheabsence`
--
ALTER TABLE `t_ficheabsence`
  MODIFY `CodeFicheAbsence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `t_ligneficheabsence`
--
ALTER TABLE `t_ligneficheabsence`
  MODIFY `CodeFicheAbsence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_classe`
--
ALTER TABLE `t_classe`
  ADD CONSTRAINT `t_classe_ibfk_1` FOREIGN KEY (`CodeDepartement`) REFERENCES `t_departement` (`CodeDepartement`),
  ADD CONSTRAINT `t_classe_ibfk_2` FOREIGN KEY (`CodeGroupe`) REFERENCES `t_groupe` (`CodeGroupe`);

--
-- Constraints for table `t_ficheabsenceseance`
--
ALTER TABLE `t_ficheabsenceseance`
  ADD CONSTRAINT `t_ficheabsenceseance_ibfk_1` FOREIGN KEY (`CodeFicheAbsence`) REFERENCES `t_ficheabsence` (`CodeFicheAbsence`),
  ADD CONSTRAINT `t_ficheabsenceseance_ibfk_2` FOREIGN KEY (`CodeSeance`) REFERENCES `t_seance` (`CodeSeance`);

--
-- Constraints for table `t_ligneficheabsence`
--
ALTER TABLE `t_ligneficheabsence`
  ADD CONSTRAINT `t_ligneficheabsence_ibfk_1` FOREIGN KEY (`CodeFicheAbsence`) REFERENCES `t_ficheabsence` (`CodeFicheAbsence`),
  ADD CONSTRAINT `t_ligneficheabsence_ibfk_2` FOREIGN KEY (`CodeEtudiant`) REFERENCES `t_etudiant` (`CodeEtudiant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
