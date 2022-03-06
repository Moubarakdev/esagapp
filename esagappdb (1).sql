-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 30 août 2021 à 15:25
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
-- Base de données : `esagappdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `codecours` varchar(100) NOT NULL,
  `libellecours` text NOT NULL,
  `codefiliere` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`codecours`, `libellecours`, `codefiliere`) VALUES
('ANG', 'Anglais', 'TIG'),
('FRA', 'Français', 'DDA'),
('JAVA', 'JAVA', 'TIG'),
('PHP', 'PHP', 'TIG');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `matricule` varchar(100) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `datenaissance` date NOT NULL,
  `sexe` text NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `filiere` varchar(50) NOT NULL,
  `niveau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`matricule`, `nom`, `prenom`, `datenaissance`, `sexe`, `adresse`, `filiere`, `niveau`) VALUES
('1210', 'ASSIGNON', 'Josué', '2001-11-02', 'Masculin', 'Baguida', 'GOL', 'LP2'),
('1212', 'KERIM', 'Moubarak', '2001-11-02', 'Masculin', '91036560, Djidjole', 'TIG', 'LP1'),
('1213', 'DUSSEY', 'Moïse', '1998-03-21', 'Masculin', 'Adidogomé', 'TIG', 'LP2'),
('5503', 'POGNON', 'Fulbert', '2000-11-02', 'Masculin', 'Aeroport', 'DDA', 'M1');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `codefiliere` varchar(100) NOT NULL,
  `libellefiliere` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`codefiliere`, `libellefiliere`) VALUES
('CO', 'Communication Des Organisations'),
('DDA', 'Droit Des Affaires'),
('GOL', 'Gestion Des Operations Et De La Logistique'),
('MGE', 'Management Et Gestion Des Entreprises'),
('TIG', 'Technologie Informatique De Gestion');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `codeinscription` int(11) NOT NULL,
  `dateinscription` datetime NOT NULL DEFAULT current_timestamp(),
  `montant` int(11) NOT NULL,
  `matricule` varchar(100) NOT NULL,
  `codecours` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`codeinscription`, `dateinscription`, `montant`, `matricule`, `codecours`) VALUES
(3, '2021-06-28 17:44:54', 10000, '1212', 'ANG'),
(4, '2021-06-28 17:53:47', 10000, '5503', 'ANG'),
(5, '2021-06-28 17:54:11', 10000, '1212', 'FRA'),
(6, '2021-06-29 10:10:16', 10000, '5503', 'PHP'),
(7, '2021-06-29 10:11:36', 110000, '5503', 'FRA'),
(8, '2021-07-10 12:02:02', 10000, '1213', 'JAVA');

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `idpaiement` int(11) NOT NULL,
  `montantverse` int(11) NOT NULL,
  `typepaiement` text NOT NULL,
  `matricule` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `paiement`
--

INSERT INTO `paiement` (`idpaiement`, `montantverse`, `typepaiement`, `matricule`) VALUES
(5, 10000, 'ESPECES', '1210'),
(6, 5000, 'ESPECES', '1213'),
(7, 20000, 'ESPECES', '5503'),
(8, 10000, 'ESPECES', '1212');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `recup` varchar(100) NOT NULL,
  `type_utilisateur` varchar(100) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `email`, `password`, `recup`, `type_utilisateur`, `ip`, `date_inscription`) VALUES
(10, 'Loukoumane', 'loukoumane@louk.com', '$2y$12$bmIoCZlB73rrQsT/Jdjii.XODfzukwbI51x3GqO6ujRf33u8zX2XO', 'loukoumane', 'Administrateur', '::1', '2021-07-14 14:30:09'),
(9, 'Junior', 'junior@junior.com', '$2y$12$Iz0uphvhOd8yh28R8F2p7OTxXXTMsqPjmC4fpWVc9Gs0CA3Xuekha', 'junior', 'Econome', '::1', '2021-07-14 12:20:21'),
(8, 'Pacha', 'pacha@pacha.com', '$2y$12$toIp6xStocEN.KHsyS5gg.DZSzilidDO4i.6zhxvgd4LQ01HFCzGS', 'pacha boss', 'Sécrétaire', '::1', '2021-07-14 12:18:28'),
(7, 'Moubarak', 'moubarakkerim@gmail.com', '$2y$12$3Tcol0iGg2kzUInBndZsouJJe9yl6nVSqkSZyERiScUqd1Ny.Cq/2', 'mister', 'Administrateur', '::1', '2021-07-14 12:16:39');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`codecours`),
  ADD KEY `COURS_FILIERE_FK` (`codefiliere`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`codefiliere`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`codeinscription`),
  ADD KEY `INSCRIPTION_ETUDIANT_FK` (`matricule`),
  ADD KEY `INSCRIPTION_COURS0_FK` (`codecours`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`idpaiement`),
  ADD KEY `PAIEMENT_ETUDIANT_FK` (`matricule`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `codeinscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `idpaiement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `COURS_FILIERE_FK` FOREIGN KEY (`codefiliere`) REFERENCES `filiere` (`codefiliere`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `INSCRIPTION_COURS0_FK` FOREIGN KEY (`codecours`) REFERENCES `cours` (`codecours`),
  ADD CONSTRAINT `INSCRIPTION_ETUDIANT_FK` FOREIGN KEY (`matricule`) REFERENCES `etudiant` (`matricule`);

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `PAIEMENT_ETUDIANT_FK` FOREIGN KEY (`matricule`) REFERENCES `etudiant` (`matricule`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
