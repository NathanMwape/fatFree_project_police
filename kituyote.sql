-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 27 août 2024 à 12:27
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kituyote`
--

-- --------------------------------------------------------

--
-- Structure de la table `achats_fournisseurs`
--

CREATE TABLE `achats_fournisseurs` (
  `id` int(11) NOT NULL,
  `fournisseur_id` int(11) NOT NULL,
  `date_achat` date NOT NULL,
  `mode_paiement` enum('credit','cash','banque1','banque2','banque3') NOT NULL,
  `montant_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `achats_fournisseurs`
--

INSERT INTO `achats_fournisseurs` (`id`, `fournisseur_id`, `date_achat`, `mode_paiement`, `montant_total`) VALUES
(5, 21, '2024-08-27', 'cash', 380);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `telephone`) VALUES
(1, 'John Doe', '093789735'),
(2, 'Bob Martin', '234556'),
(3, 'Caroline Laroche', '3456789012'),
(4, 'David Lefevre', '4567890123'),
(5, 'Emma Moreau', '5678901234'),
(6, 'François Dubois', '6789012345'),
(7, 'Gérard Lambert', '7890123456'),
(8, 'Hélène Fournier', '8901234567'),
(9, 'Isabelle Girard', '9012345678'),
(10, 'Jacques Rousseau', '0123456789'),
(12, 'nathan', '+24381724'),
(13, 'Nawej tychique', '+243817264184'),
(14, 'Aaron Kasongo', '+32548566');

-- --------------------------------------------------------

--
-- Structure de la table `comptes_tresorerie`
--

CREATE TABLE `comptes_tresorerie` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `solde` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `comptes_tresorerie`
--

INSERT INTO `comptes_tresorerie` (`id`, `nom`, `solde`) VALUES
(1, 'caisse', 0),
(2, 'banque_USD', 0),
(3, 'banque_CDF', 0);

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `date_facture` date NOT NULL,
  `total` int(11) NOT NULL,
  `statut` enum('payee','impayee') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `factures`
--

INSERT INTO `factures` (`id`, `client_id`, `date_facture`, `total`, `statut`) VALUES
(1, 1, '2024-08-01', 1220, 'payee'),
(2, 2, '2024-08-02', 380, 'payee'),
(4, 4, '2024-08-04', 150, 'payee'),
(5, 5, '2024-08-05', 200, 'impayee'),
(6, 6, '2024-08-06', 480, 'payee'),
(7, 7, '2024-08-07', 1250, 'payee'),
(8, 8, '2024-08-08', 300, 'payee'),
(9, 9, '2024-08-09', 420, 'payee'),
(10, 10, '2024-08-10', 100, 'payee'),
(74, 12, '2024-08-27', 500, 'payee'),
(75, 13, '2024-08-27', 1900, 'payee'),
(76, 1, '2024-08-27', 760, 'payee');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `type` enum('A','B') NOT NULL,
  `telephone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `nom`, `type`, `telephone`) VALUES
(1, 'Aaron Kasongo', 'A', '+243817264156'),
(2, 'Fournisseur A2', 'B', '2227584'),
(3, 'Fournisseur A3', 'A', '3333333333'),
(4, 'Fournisseur B1', 'B', '44448788'),
(5, 'Fournisseur B2', 'B', '5555555555'),
(6, 'Fournisseur B3', 'B', '6666666666'),
(7, 'Fournisseur A4', 'A', '7777777777'),
(8, 'Fournisseur B4', 'B', '8888888888'),
(9, 'Fournisseur A5', 'A', '9999999999'),
(10, 'Fournisseur B5', 'B', '5646456'),
(21, 'Nathan MPETI', 'A', '+888445544');

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

CREATE TABLE `paiements` (
  `id` int(11) NOT NULL,
  `facture_id` int(11) NOT NULL,
  `date_paiement` date NOT NULL,
  `montant` int(11) NOT NULL,
  `compte_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `paiements`
--

INSERT INTO `paiements` (`id`, `facture_id`, `date_paiement`, `montant`, `compte_id`) VALUES
(1, 1, '2024-08-01', 1220, 1),
(2, 2, '2024-08-02', 380, 1),
(3, 4, '2024-08-04', 150, 1),
(4, 6, '2024-08-06', 480, 1),
(67, 76, '2024-08-27', 760, 2);

-- --------------------------------------------------------

--
-- Structure de la table `paiements_achats`
--

CREATE TABLE `paiements_achats` (
  `id` int(11) NOT NULL,
  `achat_id` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `date_paiement` date NOT NULL,
  `mode_paiement` enum('credit','cash','banque1','banque2','banque3') NOT NULL,
  `compte_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `prix` int(11) NOT NULL,
  `quantite_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `prix`, `quantite_stock`) VALUES
(1, 'Laptop X1', 'Laptop de haute performance', 1200, 40),
(3, 'Clavier Mécanique', 'Clavier avec rétroéclairage RGB', 80, 28),
(4, 'Écran 24 pouces', 'Écran full HD', 150, 10),
(5, 'Imprimante Laser', 'Imprimante laser monochrome', 200, 1),
(6, 'Routeur Wifi', 'Routeur sans fil haute vitesse', 100, 35),
(7, 'Disque Dur 1TB', 'Disque dur externe 1TB', 50, 94),
(8, 'Clé USB 32GB', 'Clé USB 3.0 rapide', 30000, 110),
(10, 'Alimentation 600W', 'Bloc d\'alimentation 600W', 70, 35),
(11, 'Support d\'ordinateur portable', 'Support réglable pour laptop', 28000, 9),
(12, 'Câble HDMI', 'câble HDMI pour écran', 5000, 76),
(13, 'Souris gaming', 'Souris avec capteur optique haute précision', 15000, 10),
(14, 'Écran 24 pouces full HD', 'Moniteur Full HD avec connectivité HDMI', 100000, 7),
(15, 'Webcam HD	', 'Webcam 1080p avec micro intégré', 120000, 21),
(16, 'Disque dur 2 To ', 'Disque dur interne 2 To', 200000, 7),
(17, 'Ecran 27 pouces', 'Moniteur 27 pouces 4K', 400000, 12),
(18, 'Souris Optique', 'Souris sans fil ergonomique', 35000, 52);

-- --------------------------------------------------------

--
-- Structure de la table `produits_achats`
--

CREATE TABLE `produits_achats` (
  `id` int(11) NOT NULL,
  `achat_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix_unitaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `produits_achats`
--

INSERT INTO `produits_achats` (`id`, `achat_id`, `produit_id`, `quantite`, `prix_unitaire`) VALUES
(6, 5, 5, 2, 190);

-- --------------------------------------------------------

--
-- Structure de la table `produits_facture`
--

CREATE TABLE `produits_facture` (
  `id` int(11) NOT NULL,
  `facture_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix_unitaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `produits_facture`
--

INSERT INTO `produits_facture` (`id`, `facture_id`, `produit_id`, `quantite`, `prix_unitaire`) VALUES
(1, 1, 1, 1, 1200),
(3, 2, 4, 2, 150),
(4, 2, 3, 1, 80),
(6, 4, 4, 1, 150),
(7, 5, 5, 1, 200),
(8, 6, 3, 6, 80),
(9, 7, 1, 1, 1250),
(10, 8, 6, 3, 100),
(75, 76, 5, 3, 200),
(76, 76, 3, 2, 80);

-- --------------------------------------------------------

--
-- Structure de la table `transactions_tresorerie`
--

CREATE TABLE `transactions_tresorerie` (
  `id` int(11) NOT NULL,
  `compte_id` int(11) NOT NULL,
  `type_transaction` enum('entree','sortie') NOT NULL,
  `montant` int(11) NOT NULL,
  `date_transaction` date NOT NULL,
  `description` text DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `fournisseur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `transactions_tresorerie`
--

INSERT INTO `transactions_tresorerie` (`id`, `compte_id`, `type_transaction`, `montant`, `date_transaction`, `description`, `client_id`, `fournisseur_id`) VALUES
(3, 2, 'entree', 760, '2024-08-27', 'Paiement de la facture 76 par le client 1', 1, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achats_fournisseurs`
--
ALTER TABLE `achats_fournisseurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fournisseur_id` (`fournisseur_id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comptes_tresorerie`
--
ALTER TABLE `comptes_tresorerie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facture_id` (`facture_id`);

--
-- Index pour la table `paiements_achats`
--
ALTER TABLE `paiements_achats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `achat_id` (`achat_id`),
  ADD KEY `compte_id` (`compte_id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits_achats`
--
ALTER TABLE `produits_achats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `achat_id` (`achat_id`),
  ADD KEY `produit_id` (`produit_id`);

--
-- Index pour la table `produits_facture`
--
ALTER TABLE `produits_facture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facture_id` (`facture_id`),
  ADD KEY `produits_facture_ibfk_2` (`produit_id`);

--
-- Index pour la table `transactions_tresorerie`
--
ALTER TABLE `transactions_tresorerie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compte_id` (`compte_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `fournisseur_id` (`fournisseur_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `achats_fournisseurs`
--
ALTER TABLE `achats_fournisseurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `comptes_tresorerie`
--
ALTER TABLE `comptes_tresorerie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `paiements_achats`
--
ALTER TABLE `paiements_achats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `produits_achats`
--
ALTER TABLE `produits_achats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `produits_facture`
--
ALTER TABLE `produits_facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `transactions_tresorerie`
--
ALTER TABLE `transactions_tresorerie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `achats_fournisseurs`
--
ALTER TABLE `achats_fournisseurs`
  ADD CONSTRAINT `achats_fournisseurs_ibfk_1` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`);

--
-- Contraintes pour la table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `factures_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD CONSTRAINT `paiements_ibfk_1` FOREIGN KEY (`facture_id`) REFERENCES `factures` (`id`);

--
-- Contraintes pour la table `paiements_achats`
--
ALTER TABLE `paiements_achats`
  ADD CONSTRAINT `paiements_achats_ibfk_1` FOREIGN KEY (`achat_id`) REFERENCES `achats_fournisseurs` (`id`),
  ADD CONSTRAINT `paiements_achats_ibfk_2` FOREIGN KEY (`compte_id`) REFERENCES `comptes_tresorerie` (`id`);

--
-- Contraintes pour la table `produits_achats`
--
ALTER TABLE `produits_achats`
  ADD CONSTRAINT `produits_achats_ibfk_1` FOREIGN KEY (`achat_id`) REFERENCES `achats_fournisseurs` (`id`),
  ADD CONSTRAINT `produits_achats_ibfk_2` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`);

--
-- Contraintes pour la table `produits_facture`
--
ALTER TABLE `produits_facture`
  ADD CONSTRAINT `produits_facture_ibfk_1` FOREIGN KEY (`facture_id`) REFERENCES `factures` (`id`),
  ADD CONSTRAINT `produits_facture_ibfk_2` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `transactions_tresorerie`
--
ALTER TABLE `transactions_tresorerie`
  ADD CONSTRAINT `transactions_tresorerie_ibfk_1` FOREIGN KEY (`compte_id`) REFERENCES `comptes_tresorerie` (`id`),
  ADD CONSTRAINT `transactions_tresorerie_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `transactions_tresorerie_ibfk_3` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
