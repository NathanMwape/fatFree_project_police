-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 01 mai 2023 à 14:38
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
(1, 'Pistolet', 40, 'images/pistolet.jpg'),
(2, 'Fusil', 58, 'images/Fusil.png'),
(4, 'AK47', 70, 'images/AK47.jpg'),
(5, 'Revolver', 69, 'images/Revolver.jpg'),
(6, 'Fusil de chasse', 42, 'images/Fusil de chasse.jpeg'),
(10, 'asweew', 23, 'images/istockphoto-183140934-1024x1024.jpg'),
(11, 'AK20', 34, 'images/revolver-g6531e4b32_640.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `attribution`
--

CREATE TABLE `attribution` (
  `id` int(11) NOT NULL,
  `id_policier` int(11) NOT NULL,
  `id_arme` int(11) NOT NULL,
  `nombre_munition` int(11) NOT NULL,
  `date_attribution` date NOT NULL,
  `type_munition` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `attribution`
--

INSERT INTO `attribution` (`id`, `id_policier`, `id_arme`, `nombre_munition`, `date_attribution`, `type_munition`) VALUES
(77, 1, 4, 99, '2023-03-27', 'AK47');

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
(1, 5216, 1),
(2, 3000, 2),
(4, 1500, 4),
(5, 6500, 5),
(6, 1570, 6),
(22, 200, 10);

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
  `nb_munition` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `policier`
--

INSERT INTO `policier` (`id_policier`, `nom`, `post_nom`, `prenom`, `age`, `sexe`, `pays_origine`, `date_naissance`, `lieu_naissance`, `adresse`, `matricule`, `etat_civil`, `num_dossier`, `num_region`, `unite_appartenance`, `observation`, `armes`, `nb_munition`) VALUES
(1, 'MPETI', 'mwape', 'nathan', 26, 'M', 'lubumbashi', '2023-03-26', 'lubumbashi', 'nathan@gmai.com', '17mg22', 'Marie', '8812', '98w2la', 'katuba', '', 'AK47', 99),
(6, 'mukanjila', 'ilunga', 'kevin', 26, 'M', 'rdc', '2023-04-01', 'lubumbashi', 'nathan@gmai.com', '17mg22', 'Marie', '8812', '98w2la', 'lubumbashi', 'lkjdsfsdfkjlsj', '', 0),
(7, 'power', 'manager', 'Patienr', 32, 'M', 'RDC', '2023-04-05', 'Lubumbashi', '16 likasi lubumbashi', '12power21', 'Marie', '927ER2', '88002', 'Katuba', 'en forme', '', 0);

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
(31, 'salut tous le monde vous aller bien\r\n&nbsp;', '2023-05-01 12:20:14', 'nathan', 'fichiers/rapport_nathan.docx');

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
(1, 'mpeti', 'mwape', 'nathan', 'admin', 'lubumbashi', '1234'),
(2, 'mukanjila', 'ilunga', 'kevin', 'utilisateur', 'kaktuba', '1234');

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
-- AUTO_INCREMENT pour la table `arme`
--
ALTER TABLE `arme`
  MODIFY `id_arme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `attribution`
--
ALTER TABLE `attribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT pour la table `munition`
--
ALTER TABLE `munition`
  MODIFY `id_munition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `policier`
--
ALTER TABLE `policier`
  MODIFY `id_policier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `rapports`
--
ALTER TABLE `rapports`
  MODIFY `id_rapport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
