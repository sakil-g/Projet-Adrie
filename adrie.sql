-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 25 fév. 2021 à 07:55
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `adrie`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `id_promo` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `promotion` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`id_promo`, `nom`, `promotion`) VALUES
(1, 'ADRIE', '2020-2021'),
(2, 'ADRIE WEB', '2020-2023'),
(3, 'ADRIE WEB', '2020-2021');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(10) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'apprenant');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mdp` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `username`, `mdp`, `email`, `numero`, `dob`, `role_id`, `nom`, `prenom`) VALUES
(7, 'tuteur', '1234', 'test@mail.com', 2623456, '02-03-2021', 0, 'jack', 'brand'),
(1, 'admin', 'admin', '', 123, '2021-02-08', 1, 'Add', 'Min'),
(44, 'declan', '', 'drice@gmail.com', 262500655, '05-02-2023', 2, 'declan', 'rice'),
(42, 'jack12', '2005', 'jbl@gmail.com', 262556699, '23-02-2021', 2, 'jack', 'brand'),
(43, 'abcd', '12345', 'abcd@gmail.com', 262555555, '03-02-2021', 2, 'ab', 'cd');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_promotion`
--

CREATE TABLE `utilisateur_promotion` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_promo` int(11) NOT NULL,
  `tuteur` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur_promotion`
--

INSERT INTO `utilisateur_promotion` (`id`, `id_user`, `id_promo`, `tuteur`) VALUES
(14, 44, 3, 0),
(13, 43, 2, 0),
(12, 42, 1, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id_promo`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `utilisateur_promotion`
--
ALTER TABLE `utilisateur_promotion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `utilisateur_promotion`
--
ALTER TABLE `utilisateur_promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
