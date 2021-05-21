

-- --------------------------------------------------------

--
-- Structure de la table `animals`
--

DROP TABLE IF EXISTS `animals`;
CREATE TABLE IF NOT EXISTS `animals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Billy', 'dog', '2021-05-21 08:13:40', '2021-05-21 08:13:40'),
(2, 'Billy', 'dog', '2021-05-21 08:13:40', '2021-05-21 08:13:40');

-- -----------------------------------------------------