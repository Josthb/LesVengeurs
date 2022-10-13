-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 13 oct. 2022 à 18:01
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `marvelsite`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `IdCateg` int(11) NOT NULL,
  `NomCateg` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`IdCateg`, `NomCateg`) VALUES
(1, 'Heros'),
(2, 'Vilains');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `IdCt` int(2) NOT NULL,
  `NomCt` varchar(25) COLLATE utf8_bin NOT NULL,
  `emailCt` varchar(50) COLLATE utf8_bin NOT NULL,
  `SujetMess` varchar(100) COLLATE utf8_bin NOT NULL,
  `Mess` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`IdCt`, `NomCt`, `emailCt`, `SujetMess`, `Mess`) VALUES
(1, 'Joshua', 'joshua@gmail.com', 'test', 'test'),
(3, 'Marc', 'marc@gmail.com', 'bonjour', 'bonjour'),
(7, 'Vaillant', 'joshua@gmail.com', 'test', 'test'),
(8, 'Hugo', 'hugo@hugo.hugo', 'Hugo', 'Hugo'),
(10, 'Moreau', 'joshuadu72@gmail.com', 'Demande de Stage', 'ui'),
(11, 'Moreau', 'joshuadu72@gmail.com', 'Demande de Stage', 'ui'),
(12, 'Moreau', 'joshuadu72@gmail.com', 'Demande de Stage', 'ui'),
(13, 'Joshua', 'joshuadu72@gmail.com', 'joshua', 'ui'),
(14, 'Joshua', 'joshuadu72@gmail.com', 'joshua', 'ui'),
(15, 'Joshua', 'joshuadu72@gmail.com', 'joshua', 'ui'),
(16, 'Joshua', 'joshuadu72@gmail.com', 'joshua', 'ui'),
(17, 'Moreau', 'joshuadu72@gmail.com', 'test', '123'),
(18, 'Joshua', 'joshuadu72@gmail.com', 'joshua', 'ui'),
(19, 'johsua', 'joshuadu72@gmail.com', 'stage', '123\r\n'),
(21, 'Lucas', 'Lucas@gmail.com', 'Test Pour Oral ', 'Ceci est un test pour l\'oral du 12 mai\r\n'),
(22, 'Thebaudin', 'joshuadu72@gmail.com', 'Test Pour Oral ', 'iu'),
(23, 'Thebaudin', 'joshuadu72@gmail.com', 'Test Pour Oral ', 'bonjour');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_bin NOT NULL,
  `mail` varchar(255) COLLATE utf8_bin NOT NULL,
  `motdepasse` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mail`, `motdepasse`) VALUES
(15, 'joshua', 'joshua@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Structure de la table `personnages`
--

CREATE TABLE `personnages` (
  `idHeros` int(11) NOT NULL,
  `imgHeros` varchar(255) COLLATE utf8_bin NOT NULL,
  `TitreHeros` varchar(50) COLLATE utf8_bin NOT NULL,
  `DescHeros` varchar(255) COLLATE utf8_bin NOT NULL,
  `HistoireL` text COLLATE utf8_bin NOT NULL,
  `IdCateg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `personnages`
--

INSERT INTO `personnages` (`idHeros`, `imgHeros`, `TitreHeros`, `DescHeros`, `HistoireL`, `IdCateg`) VALUES
(1, 'IronMan.png', 'Iron Man', 'Sans son armure de haute technologie, Tony Stark alias Iron man (L\'homme de fer)n\'est qu\'un simple humain. Lorsqu\'il revêt son armure, il dispose de plusieurs capacités surhumaines, différentes selon l\'armure qu\'il utilise.', 'Tony Stark est le fils d\'Howard Stark, le patron des puissantes Stark Industries, ce dernier étant un alcoolique. \r\nTony Stark grandit et devient un inventeur brillant et imaginatif. Entré au Massachusetts Institute of Technology (MIT) à 15 ans, il en sort major de sa promotion. \r\nLorsque ses parents meurent dans un accident de voiture causé par des freins défectueux.\r\nIl prend les rênes de Stark Industries et achète la société ayant construit la voiture afin de remédier lui-même au défaut.', 1),
(6, 'StarLord.png', 'Star Lord ', 'Peter Quill est un hybride terrien-spartoi, une race extraterrestre semblable aux humains. Il possÃ¨de une force au corps Ã  corps semblable Ã  celle de Thanos, grÃ¢ce Ã  sa gemme et ses pouvoirs rÃ©gÃ©nÃ©rants.', 'Peter Quill a Ã©tÃ© conÃ§u suite Ã  l\'amour entre la terrienne Meredith Quill et l\'empereur Spartax de l\'Ã©poque, J\'son.          J\'son quitta la Terre peu aprÃ¨s avoir conÃ§u Peter afin de poursuivre sa guerre intergalactique,          laissant Meredith sur Terre afin de la protÃ©ger. Neuf mois plus tard, lors d\'un phÃ©nomÃ¨ne astronomique inhabituel          oÃ¹ de nombreuses planÃ¨tes Ã©taient alignÃ©es, Peter est nÃ© et peu aprÃ¨s, sa mÃ¨re Meredith, pour des raisons qu\'elle ne pouvait pas vraiment expliquer,          a eu l\'envie de l\'emmener dehors et de le prÃ©senter aux Ã©toiles.', 1),
(8, 'knull.jpg', 'Knull', 'Knull est un Ãªtre trÃ¨s puissant et trÃ¨s ancien Ã  l\'origine de la crÃ©ation des Symbiotes.                                      Il est alors le Dieu et le CrÃ©ateur de cette race.', 'Knull est un dieu eldritch des tÃ©nÃ¨bres et le crÃ©ateur des symbiotes. NÃ© du vide primordial qui existait entre le sixiÃ¨me et le septiÃ¨me cosmos.          RÃ©veillÃ© par la LumiÃ¨re lorsque les CÃ©lestes ont envahi son royaume des tÃ©nÃ¨bres, il a crÃ©Ã© le premier symbiote sous la forme d\'une Ã©pÃ©e et a dÃ©capitÃ© un CÃ©leste.          Il utilisa le pouvoir divin de la tÃªte pour affiner la lame, crÃ©ant ainsi un lien mÃ©taphysique entre le symbiote primordial et le dieu cosmique tuÃ© -          qui serait la source de la majeure partie de l\'immense pouvoir de Knull. En faisant la guerre Ã  la LumiÃ¨re, Knull devint une figure lÃ©gendaire de la terreur divine          mais finit par se retrouver bloquÃ© sur une planÃ¨te sans nom aprÃ¨s qu\'un habitant ait volÃ© sa lame et ait involontairement suivi ses traces. En expÃ©rimentant ses pouvoirs,          Knull dÃ©couvrit qu\'il pouvait crÃ©er des parasites amorphes Ã  partir des tÃ©nÃ¨bres qu\'il contrÃ´lait et les fusionner avec des \"crÃ©atures infÃ©rieures\".         ', 2),
(11, 'fatalis.png', 'Fatalis', 'Fatalis est un scientifique de renom et est l\'ennemi jurÃ© des 4 Fantastiques.', 'oui', 2),
(15, 'thor.png', 'Thor', 'Thor est un dieu', 'kdjsdjojsdp=', 1),
(16, 'nova.png', 'Nova', 'Nova est un super heros', 'dnskscp', 1),
(17, 'hulk.png', 'Hulk', 'Hulk est un heros', 'odjodepd', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`IdCateg`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`IdCt`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personnages`
--
ALTER TABLE `personnages`
  ADD PRIMARY KEY (`idHeros`),
  ADD KEY `IdCateg` (`IdCateg`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `IdCateg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `IdCt` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `personnages`
--
ALTER TABLE `personnages`
  MODIFY `idHeros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `personnages`
--
ALTER TABLE `personnages`
  ADD CONSTRAINT `IdCateg` FOREIGN KEY (`IdCateg`) REFERENCES `categorie` (`IdCateg`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
