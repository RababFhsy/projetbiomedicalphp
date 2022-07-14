-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 27 mai 2022 à 19:38
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_cab`
--

-- --------------------------------------------------------

--
-- Structure de la table `association`
--

CREATE TABLE `association` (
  `id` int(50) NOT NULL,
  `idb` int(50) NOT NULL,
  `idc` int(50) NOT NULL,
  `branche` varchar(50) NOT NULL,
  `frequence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `association`
--

INSERT INTO `association` (`id`, `idb`, `idc`, `branche`, `frequence`) VALUES
(3, 27, 34, 'A1', 10),
(7, 29, 34, 'A2', 14),
(14, 31, 34, 'A0', 20),
(32, 33, 33, 'A1', 16),
(37, 27, 32, 'A2', 23);

-- --------------------------------------------------------

--
-- Structure de la table `boitier`
--

CREATE TABLE `boitier` (
  `id` int(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `ref` varchar(30) NOT NULL,
  `nbrbranche` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `boitier`
--

INSERT INTO `boitier` (`id`, `type`, `ref`, `nbrbranche`) VALUES
(27, 'Nano    ', '#UNO123', 4),
(29, 'Due   ', '#Due', 4),
(31, 'One  ', '#ONE345', 4),
(33, 'MEGA ', '#MEGA56', 3),
(34, 'One ', '#one566', 3);

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

CREATE TABLE `capteur` (
  `id` int(30) NOT NULL,
  `type` varchar(11) NOT NULL,
  `photo` blob NOT NULL,
  `ref` varchar(11) NOT NULL,
  `valeurmax` int(11) NOT NULL,
  `valeurmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`id`, `type`, `photo`, `ref`, `valeurmax`, `valeurmin`) VALUES
(32, 'ECG ', 0x4543472e6a7067, 'AD8232 ', 40, 0),
(33, 'Pools ', 0x706f756c732e706e67, 'P115200', 30, 10),
(34, 'MQ-3 ', 0x616c636f756c2e6a7067, 'MQ-3123', 35, 5);

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `id` int(10) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `age` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`id`, `fullname`, `age`) VALUES
(8, 'fatima zahra mouket', 21),
(13, 'kaoutar', 25),
(14, 'yassine', 30),
(15, 'Mohamed', 35),
(16, 'sanaa', 31),
(17, 'najia', 33),
(19, 'salimee', 26);

-- --------------------------------------------------------

--
-- Structure de la table `medecinpatient`
--

CREATE TABLE `medecinpatient` (
  `id` int(20) NOT NULL,
  `idm` int(20) NOT NULL,
  `idp` int(20) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `medecinpatient`
--

INSERT INTO `medecinpatient` (`id`, `idm`, `idp`, `dateDebut`, `dateFin`) VALUES
(1, 13, 16, '2022-05-04', '0000-00-00'),
(2, 8, 17, '2022-05-14', '0000-00-00'),
(3, 17, 18, '2022-05-21', '0000-00-00'),
(4, 8, 19, '2022-05-21', '0000-00-00'),
(5, 16, 20, '2022-05-20', '0000-00-00'),
(6, 16, 21, '2022-05-28', '0000-00-00'),
(7, 17, 22, '2022-05-14', '0000-00-00'),
(8, 13, 23, '2022-04-26', '0000-00-00'),
(9, 16, 24, '2022-05-05', '0000-00-00'),
(10, 17, 25, '2022-05-12', '0000-00-00'),
(11, 16, 26, '2022-05-13', '0000-00-00'),
(12, 16, 27, '2022-05-20', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dateDeNaissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id`, `fullname`, `email`, `password`, `dateDeNaissance`) VALUES
(16, 'lina', 'lina@gmail.com', '123456789', '2022-05-21'),
(17, 'lilyay', 'lilya@gmail.com', '123456789', '2022-05-21'),
(18, 'nirmine', 'nirmine@gmail.com', '123456789', '2022-05-13'),
(19, 'charaf', 'charaf@gmail.com', '123456789', '2022-04-28'),
(20, 'salima', 'salima@gamil.com', '123456789', '1999-05-20'),
(21, 'sanae', 'sanaa.madili3@gmail.com', 'fati136126140', '1988-04-26'),
(22, 'nisrine', 'nisrine@gmail.com', 'fati136126140', '1999-05-06'),
(23, 'salinat', 'salima@gmail.com', 'fati136126140', '0000-00-00'),
(24, 'saadia', 'saadia3@gmail.com', 'fati136126140', '1960-05-12'),
(25, 'faty', 'faty@gmail.com', '123456789', '0000-00-00'),
(26, 'hafid', 'hafid@gmail.com', '123456789', '1988-05-14'),
(27, 'hassna', 'hassna@gmail.com', '123456789', '1999-05-13');

-- --------------------------------------------------------

--
-- Structure de la table `patientboitier`
--

CREATE TABLE `patientboitier` (
  `id` int(100) NOT NULL,
  `idp` int(100) NOT NULL,
  `idb` int(100) NOT NULL,
  `datedebut` date NOT NULL,
  `datefin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `patientboitier`
--

INSERT INTO `patientboitier` (`id`, `idp`, `idb`, `datedebut`, `datefin`) VALUES
(4, 19, 28, '2022-05-18', '0000-00-00'),
(5, 20, 29, '2022-05-04', '2022-04-28');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `type`, `password`) VALUES
(30, 'fatima zahra', 'fatimazahra20mouket@gmail.com', 'admin', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),
(37, 'bahae', 'bahae@gmail.com', 'super admin', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),
(40, 'sara', 'sara@gmail.com', 'admin', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),
(45, 'najia', 'najia.okacha2@gmail.com', 'admin', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),
(52, 'kaoutar', 'kaouta@gmail.com', 'medecin', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),
(53, 'yassine', 'yassine@gmail.com', 'medecin', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),
(54, 'Mohamed', 'mohamed@gmail.com', 'medecin', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),
(55, 'najia', 'noura@gmail.com', 'medecin', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),
(56, 'sanaa', 'yassmine@gmail.com', 'medecin', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),
(57, 'nawal', 'nawal@gmail.com', 'secretaire', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),
(58, 'khadija', 'khadijaa@gmail.com', 'secretaire', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),
(59, 'abdelhafid', 'abdelhafid@gmail.com', 'secretaire', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),
(60, 'salma', 'salma@gmail.com', 'secretaire', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),
(61, 'yassmina', 'yassmina@gmail.com', 'secretaire', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),
(64, 'salimee', 'salimee@gmail.com', 'medecin', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),
(67, 'samiraa', 'samira@gamil.com', 'secretaire', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `association`
--
ALTER TABLE `association`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idb` (`idb`),
  ADD KEY `idc` (`idc`);

--
-- Index pour la table `boitier`
--
ALTER TABLE `boitier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `medecinpatient`
--
ALTER TABLE `medecinpatient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idm` (`idm`),
  ADD KEY `idp` (`idp`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `patientboitier`
--
ALTER TABLE `patientboitier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `association`
--
ALTER TABLE `association`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `boitier`
--
ALTER TABLE `boitier`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `capteur`
--
ALTER TABLE `capteur`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `medecinpatient`
--
ALTER TABLE `medecinpatient`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `patientboitier`
--
ALTER TABLE `patientboitier`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `association`
--
ALTER TABLE `association`
  ADD CONSTRAINT `association_ibfk_1` FOREIGN KEY (`idb`) REFERENCES `boitier` (`id`),
  ADD CONSTRAINT `association_ibfk_2` FOREIGN KEY (`idc`) REFERENCES `capteur` (`id`);

--
-- Contraintes pour la table `medecinpatient`
--
ALTER TABLE `medecinpatient`
  ADD CONSTRAINT `medecinpatient_ibfk_1` FOREIGN KEY (`idm`) REFERENCES `medecin` (`id`),
  ADD CONSTRAINT `medecinpatient_ibfk_2` FOREIGN KEY (`idp`) REFERENCES `patient` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
