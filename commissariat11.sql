-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 20 oct. 2023 à 21:44
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `commissariat`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_user`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `affectation`
--

CREATE TABLE `affectation` (
  `id` int(11) NOT NULL,
  `nom_policier` varchar(255) NOT NULL,
  `date_affectation` date NOT NULL DEFAULT current_timestamp(),
  `date_fin` date NOT NULL DEFAULT current_timestamp(),
  `nom_commissariat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `affectation`
--

INSERT INTO `affectation` (`id`, `nom_policier`, `date_affectation`, `date_fin`, `nom_commissariat`) VALUES
(59, 'slkj', '2023-08-23', '2023-08-27', 'CIAT Rwashi'),
(60, 'slkj', '2023-08-23', '2023-08-25', 'inspection'),
(61, 'slkj', '2023-08-23', '2023-08-27', 'inspection'),
(62, 'slkj', '2023-08-23', '2023-08-23', 'CIAT Rwashi'),
(63, 'mukanjila', '2023-08-23', '2023-08-25', 'inspection'),
(64, 'mukanjila', '2023-08-23', '2023-08-27', 'inspection'),
(65, 'slkj', '2023-08-23', '2023-08-27', 'CIAT Rwashi'),
(66, 'mukanjila', '2023-08-24', '2023-08-17', 'CIAT kampemba'),
(67, 'mukanjila', '2023-08-24', '2023-08-25', 'CIAT kampemba'),
(68, 'mukanjila', '2023-08-25', '2023-08-18', 'CIAT kampemba'),
(69, 'mukanjila', '2023-08-25', '2023-08-27', 'CIAT kampemba');

-- --------------------------------------------------------

--
-- Structure de la table `arme`
--

CREATE TABLE `arme` (
  `id_arme` int(11) NOT NULL,
  `type_arme` varchar(50) NOT NULL,
  `nombre_arme` int(11) NOT NULL,
  `images` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `arme`
--

INSERT INTO `arme` (`id_arme`, `type_arme`, `nombre_arme`, `images`) VALUES
(1, 'Pistolet', 38, 'images/pistolet.jpg'),
(2, 'Fusil', 58, 'images/Fusil.png'),
(4, 'AK47', 70, 'images/AK47.jpg'),
(5, 'Revolver', 69, 'images/Revolver.jpg'),
(6, 'Fusil de chasse', 42, 'images/Fusil de chasse.jpeg'),
(10, 'asweew', 23, 'images/istockphoto-183140934-1024x1024.jpg'),
(11, 'AK20', 34, 'images/revolver-g6531e4b32_640.jpg'),
(16, 'M200', 54, 'images/C_3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `attribution`
--

CREATE TABLE `attribution` (
  `id` int(11) NOT NULL,
  `id_policier` int(11) NOT NULL,
  `id_arme` int(11) NOT NULL,
  `nombre_munition` int(11) NOT NULL,
  `date_debut` date NOT NULL DEFAULT current_timestamp(),
  `date_fin` date NOT NULL DEFAULT current_timestamp(),
  `duree` text NOT NULL,
  `type_munition` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `attribution`
--

INSERT INTO `attribution` (`id`, `id_policier`, `id_arme`, `nombre_munition`, `date_debut`, `date_fin`, `duree`, `type_munition`) VALUES
(139, 6, 4, 30, '2023-08-24', '2023-08-27', '3', 'AK47'),
(140, 6, 4, 30, '2023-08-23', '2023-08-18', '5', 'AK47'),
(141, 19, 1, 15, '2023-10-03', '2023-10-05', '2', 'Pistolet'),
(142, 19, 1, 6, '2023-10-04', '2023-10-04', '0', 'Pistolet'),
(143, 19, 1, 9, '2023-10-03', '2023-10-03', '0', 'Pistolet'),
(144, 7, 1, 5, '2023-10-03', '2023-10-03', '0', 'Pistolet'),
(145, 20, 1, 15, '2023-10-04', '2023-10-05', '1', 'Pistolet');

-- --------------------------------------------------------

--
-- Structure de la table `commissariat`
--

CREATE TABLE `commissariat` (
  `id` int(11) NOT NULL,
  `nom_commissariat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commissariat`
--

INSERT INTO `commissariat` (`id`, `nom_commissariat`) VALUES
(2, 'CIAT katuba'),
(4, 'CIAT Rwashi'),
(5, 'CIAT kampemba'),
(6, 'CIAT plateau karavia');

-- --------------------------------------------------------

--
-- Structure de la table `munition`
--

CREATE TABLE `munition` (
  `id_munition` int(11) NOT NULL,
  `nombre_munition` int(11) NOT NULL,
  `type_munition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `munition`
--

INSERT INTO `munition` (`id_munition`, `nombre_munition`, `type_munition`) VALUES
(1, 5050, 1),
(2, 1900, 2),
(4, 660, 4),
(5, 5500, 5),
(6, 1500, 6),
(22, 170, 10),
(23, 6000, 11);

-- --------------------------------------------------------

--
-- Structure de la table `policier`
--

CREATE TABLE `policier` (
  `id_policier` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `post_nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `sexe` varchar(50) NOT NULL,
  `pays_origine` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `matricule` varchar(50) NOT NULL,
  `etat_civil` varchar(50) NOT NULL,
  `num_dossier` varchar(50) NOT NULL,
  `num_region` varchar(50) NOT NULL,
  `unite_appartenance` varchar(50) NOT NULL,
  `observation` text NOT NULL,
  `armes` varchar(50) NOT NULL,
  `nb_munition` int(50) NOT NULL,
  `nom_commissariat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `policier`
--

INSERT INTO `policier` (`id_policier`, `nom`, `post_nom`, `prenom`, `age`, `sexe`, `pays_origine`, `date_naissance`, `lieu_naissance`, `adresse`, `matricule`, `etat_civil`, `num_dossier`, `num_region`, `unite_appartenance`, `observation`, `armes`, `nb_munition`, `nom_commissariat`) VALUES
(6, 'mukanjila', 'ilunga', 'kevin', 26, 'M', 'lubumbashi', '2023-04-01', 'lubumbashi', 'nathan@gmai.com', '17mg22', 'Marie', '8812', '98w2la', 'lubumbashi', '', '', 0, 'CIAT kampemba'),
(7, 'power', 'manager', 'Patienr', 32, 'M', 'Lubumbashi', '2023-04-05', 'Lubumbashi', '16 likasi lubumbashi', '12power21', 'Marie', '927ER2', '88002', 'Katuba', 'en forme', 'Pistolet', 5, 'CIAT kampemba'),
(15, 'Ilunga', 'kib', 'peniel', 24, 'M', 'paris', '2007-02-23', 'paris', 'katanga', '0010', 'Divorce', 'hh4', '4werw', 'lubu', 'bien', '', 0, 'CIAT Rwashi'),
(16, 'Ilunga', 'kalambi', 'nathan', 30, 'M', 'rdc', '1977-10-24', 'paris', '12 kamanyola lubumbashi', '12MMpol', '', 'hh4', '4werw', 'policier', 'bien', '', 0, 'CIAT plateau karavia'),
(19, 'MABENDE', 'MUKOPA', 'Alice', 23, 'F', 'Likasi', '2000-02-16', 'Likasi', 'Lubumbashi', '18MM214', 'celibataire', '003', '18MM0196', 'policier', 'très bien', 'Pistolet', 9, 'CIAT kampemba'),
(20, 'Rod', 'MUMBA', 'JESSY', 24, 'M', 'RDC', '2000-09-04', 'Kolwezi', 'LUBUMBASHI', '18MM214', 'celibataire', '066', '15KIL20', 'policier', 'TRES BIEN', 'Pistolet', 15, 'CIAT kampemba');

-- --------------------------------------------------------

--
-- Structure de la table `rapports`
--

CREATE TABLE `rapports` (
  `id_rapport` int(11) NOT NULL,
  `descriptions` text NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp(),
  `Destinatair` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rapports`
--

INSERT INTO `rapports` (`id_rapport`, `descriptions`, `date_creation`, `Destinatair`, `filename`) VALUES
(33, 'GSIOUISIOUISUIUSOIUOISUGSIUIOUIS', '2023-05-03 10:25:47', 'nathan', 'fichiers/rapport_nathan.docx'),
(34, 'IJSUIOYNYWURYOUBIWRIOWT', '2023-05-03 10:26:12', 'kevin', 'fichiers/rapport_kevin.docx'),
(35, 'LKJAN89RWEYU765375989302758389724808759275987002869', '2023-05-03 10:26:28', 'kevin', 'fichiers/rapport_kevin.docx'),
(36, 'bonjour c\'est le CIAT RWASHI', '2023-08-23 10:56:33', 'CIAT Rwashi', 'fichiers/rapport_CIAT Rwashi.docx'),
(41, 'salut', '2023-08-24 14:14:11', 'CIAT kampemba', 'fichiers/rapport_CIAT kampemba.docx'),
(42, 'Salut&nbsp;', '2023-10-03 09:26:38', 'CIAT kampemba', 'DossierPoliciers/rapport_CIAT kampemba.docx'),
(43, 'Bonjour&nbsp;', '2023-10-03 10:07:17', 'CIAT kampemba', 'DossierPoliciers/rapport_CIAT kampemba.docx'),
(44, 'ajjakjhdkjahdjkhakd', '2023-10-03 10:15:49', 'CIAT plateau karavia', 'DossierPoliciers/rapport_CIAT plateau karavia.docx'),
(45, 'bonjour', '2023-10-03 10:16:19', 'CIAT kampemba', 'DossierPoliciers/rapport_CIAT kampemba.docx');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `post_nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `nom_commissariat` varchar(50) NOT NULL,
  `passwords` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `post_nom`, `prenom`, `role`, `nom_commissariat`, `passwords`) VALUES
(1, 'mpeti', 'mwape', 'nathan', 'admin', 'inspection', '1234'),
(2, 'mukanjila', 'ilunga', 'kevin', 'utilisateur', 'CIAT katuba', '1234'),
(5, 'banza', 'kivungila', 'patrick', 'utilisateur', 'CIAT kampemba', '1234'),
(6, 'kaly', 'Hussein ', 'laurant', 'utilisateur', 'CIAT plateau karavia', '1234'),
(7, 'lens', 'prince', 'power', 'utilisateur', 'CIAT Rwashi', '1234');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `affectation`
--
ALTER TABLE `affectation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `arme`
--
ALTER TABLE `arme`
  ADD PRIMARY KEY (`id_arme`);

--
-- Index pour la table `attribution`
--
ALTER TABLE `attribution`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_policier` (`id_policier`),
  ADD KEY `id_arme` (`id_arme`);

--
-- Index pour la table `commissariat`
--
ALTER TABLE `commissariat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `munition`
--
ALTER TABLE `munition`
  ADD PRIMARY KEY (`id_munition`),
  ADD KEY `type_munition` (`type_munition`);

--
-- Index pour la table `policier`
--
ALTER TABLE `policier`
  ADD PRIMARY KEY (`id_policier`);

--
-- Index pour la table `rapports`
--
ALTER TABLE `rapports`
  ADD PRIMARY KEY (`id_rapport`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `affectation`
--
ALTER TABLE `affectation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `arme`
--
ALTER TABLE `arme`
  MODIFY `id_arme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `attribution`
--
ALTER TABLE `attribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT pour la table `commissariat`
--
ALTER TABLE `commissariat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `munition`
--
ALTER TABLE `munition`
  MODIFY `id_munition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `policier`
--
ALTER TABLE `policier`
  MODIFY `id_policier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `rapports`
--
ALTER TABLE `rapports`
  MODIFY `id_rapport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `attribution`
--
ALTER TABLE `attribution`
  ADD CONSTRAINT `attribution_ibfk_1` FOREIGN KEY (`id_policier`) REFERENCES `policier` (`id_policier`),
  ADD CONSTRAINT `attribution_ibfk_2` FOREIGN KEY (`id_arme`) REFERENCES `arme` (`id_arme`);

--
-- Contraintes pour la table `munition`
--
ALTER TABLE `munition`
  ADD CONSTRAINT `munition_ibfk_1` FOREIGN KEY (`type_munition`) REFERENCES `arme` (`id_arme`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
