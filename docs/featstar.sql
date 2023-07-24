-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 24 juil. 2023 à 09:27
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `featstar`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `prix` decimal(10,0) NOT NULL COMMENT 'Prix avec deux chiffres après la virgule',
  `quantité` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL COMMENT 'Le nom de la catégorie',
  `picture` varchar(128) DEFAULT NULL COMMENT 'L''URL de l''image de la catégorie (utilisée en home, par exemple)',
  `home_order` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'L''ordre d''affichage de la catégorie sur la home (0=pas affichée en home)',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'La date de création de la catégorie',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'La date de la dernière mise à jour de la catégorie',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `picture`, `home_order`, `created_at`, `updated_at`) VALUES
(1, 'Gobelets', 'assets/img/products/gobelet-330-ml.jpg', 1, '2022-11-15 15:05:39', NULL),
(2, 'Balisage', 'assets/img/products/balise_moose.jpg', 2, '2022-11-15 15:05:39', NULL),
(3, 'Matériels évenementiels', 'assets/img/products/buvette.png', 3, '2022-11-15 15:05:39', NULL),
(4, 'Destockage', 'assets/img/products/destockage.png', 4, '2022-11-15 15:05:39', '2023-07-21 07:12:53'),
(9, 'Brouette', '', 0, '2023-07-23 15:48:55', '2023-07-23 15:56:50');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` tinytext NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `pseudo`, `email`, `password`) VALUES
(1, 'roro', 'roger@gmail.com', 'roro'),
(2, '', 'roger@gmail.com', '$2y$10$Uklud93vvRY4eDko7mq6Nu6xx9XoobM1EpagO49tCoW.ojwfi4A0C'),
(3, 'mimi', 'mireille@gmail.com', '$2y$10$es5VgCr5S5GabmUO.LmoiO/K.UbL3PoHhk7dZt.I/XVyvZy/OJhCu'),
(4, 'ric', 'richard.desnoues@orange.fr', '$2y$10$IJXnL6O8lyBrwFWR.FMrE.9kY/sJ2nQP01ypABxe1Ko6CzMiWvvLu');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL COMMENT 'Le nom du produit',
  `description` text COMMENT 'La description du produit',
  `picture` varchar(128) DEFAULT NULL COMMENT 'L''URL de l''image du produit',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Le prix du produit',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Le statut du produit (1=dispo, 2=pas dispo)',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'La date de création du produit',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'La date de la dernière mise à jour du produit',
  `category_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_category1_idx` (`category_id`),
  KEY `fk_product_type1_idx` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `status`, `created_at`, `updated_at`, `category_id`, `type_id`) VALUES
(1, 'Gobelet 33cl réutilisable', 'Gobelet 33cl réutilisable, translucide, personnalisable, 500 Pièces\r\n\r\nArticle idéal lors de vos manifestations, à offrir ou vendre à vos visiteurs.\r\n\r\nVERRE GOBELET 33CL - BLANC TRANSLUCIDE - REUTILISABLE - \r\n\r\n500 PIECES PAR CARTON - SOIT 0.60€ TTC PIECES - DEGRESSIF SELON QUANTITE\r\n\r\n PERSONNALISABLE PAR STICKERS EN SUPPLEMENT ( entre 0.80 et 1.20€ pièces,  selon stickers )\r\n\r\nArticle sur commande ou stock , disponible rapidement\r\n\r\nPropriétés (dimensions ou contenance) 330 ml\r\n\r\nMatériau PP\r\n\r\nConditionnement 500 pièces / carton\r\n\r\nLamination : Aucune lamination\r\n\r\nCouleur : Blanc\r\n\r\nRésistance au four : Non\r\n\r\nRésistance au micro-ondes (800W) 8 minutes\r\n\r\nLavable / Réutilisable : Oui\r\n\r\nBiodégradable : Non\r\n\r\nRecyclable : Oui', 'assets/img/products/gobelet-330-ml.jpg', '300.00', 2, '2022-11-15 17:15:41', NULL, 1, 1),
(2, 'Balisage Enduro Moose Racing', 'Kit de balisage Enduro\r\n\r\n\r\nKit de 50 panneaux de même couleur.\r\n\r\n5 couleurs aux choix, Blanc, Orange, Rouge, Vert ou Bleu.\r\n\r\nPapier Cartonné renforcé\r\n\r\nFabriqué au USA', 'assets/img/products/balise_moose.jpg', '10.00', 1, '2022-11-15 17:15:41', NULL, 2, 2),
(3, 'Kit Balisage Enduro', 'Kit de balisage Enduro\r\n\r\n\r\nInclut cent flèches 35 cm x 15 cm (flèche vers la droite),\r\n\r\nCent flèches 35 cm x 15 cm (flèches vers la gauche),\r\n\r\nCinquante panneaux 20 cm x 20 cm indiquant la bonne direction,\r\n\r\nVingt-cinq panneaux 20 cm x 20 cm indiquant la mauvaise direction et cent panneaux de contrôle du tampon\r\n\r\nPVC - Blanc rouge\r\n\r\nFabriqué en Italie', 'assets/img/products/balisage_enduro.png', '108.00', 1, '2022-11-15 17:15:41', NULL, 2, 2),
(4, 'Balise UFO Blanc Souple', 'Piquet, Jalon de balisage circuit. Moto, VTT, Rando ou autres...\r\n\r\n\r\nBalises spécialement conçues pour les pistes, afin que les pilotes gardent le cap\r\n\r\nBlanc - PVC - Souple\r\n\r\nHauteur totale 78cm - Visible 57cm - Enfoncement 21 cm\r\n\r\nPossiblité de personalisation sur la face avant, sur devis.\r\n\r\nFabriqué en Italie', 'assets/img/products/balise_ufo_blanc.png', '7.00', 1, '2022-11-15 17:15:41', NULL, 2, 2),
(5, 'Balise UFO Red Fixe', 'Piquet, Jalon  de balisage circuit.\r\n\r\n\r\nBalises spécialement conçues pour les pistes, afin que les pilotes gardent le cap\r\n\r\nRouge - PVC\r\n\r\nFabriqué en Italie', 'assets/img/products/balise_ufo_red.png', '6.80', 0, '2022-11-15 17:15:41', NULL, 2, 2),
(6, 'Tente pliable buvette noir ou blanc', 'Dispose d\'un bar pour animer votre stand Très léger Toile polyester 160 g/m² / Structure acier et aluminium. Polyester 160 g/m². Dim. : H. 240 à 340 x L. 300 x P. 300 cm. Poids : 43 kg. Noir. ', 'assets/img/products/buvette.png', '490.00', 0, '2022-11-15 17:15:41', NULL, 3, 3),
(7, 'Set forain/Table + Bancs', 'Pin verni, Table H76 x L 220 x P 70 cm - banc H 55 x L 220 x P 25 cm - 50 KG ', 'assets/img/products/set_forain_table_bancs.png', '120.00', 1, '2022-11-15 17:15:41', NULL, 3, 3),
(8, 'Table pique nique / Banc pliant', 'Table pique Nique banc pliant - Haute qualité. Epaisseur : 42 mm. Pin scandinave traité en autoclave classe 4 - CTB B+ - Dimensions de la table en cm [H x l x P] 71 x 177 x 154 - Poids 70 kg ', 'assets/img/products/table_pique_nique_banc_pliant.png', '120.00', 1, '2022-11-15 17:15:41', NULL, 3, 3),
(9, 'Barbecue Pro', 'Grande surface de cuisson\r\n\r\nCharbon de bois. Dim. : H. 93 x L. 116,5 x Ø 64,5 cm. Poids : 31 kg. Noir. à partir de 220€', 'assets/img/products/barbecue_grande_surface.png', '220.00', 1, '2022-11-15 17:15:41', NULL, 3, 4),
(10, 'Tente pliable 3x3 noir ou blanc', 'Pliable Toile polyester 160 g/m² / noir ou blanc / existe en 6 x 3 M', 'assets/img/products/tente_pliable_3x3.png', '130.00', 1, '2022-11-15 17:15:41', NULL, 3, 2),
(11, 'Crépière krampouz gaz Standard', 'Puissance 6000W / diam 40cm /Dimensions en cm [H x l x P] 18.5 x 40 x 40/ poids 15kg / Système d\'isolation du brûleur : chambre de combustion Normes Européennes CE Raccordement gaz prévu pour flexibles normalisés', 'assets/img/products/crepiere_gaz_standard.png', '0.00', 0, '2022-11-15 17:15:41', NULL, 3, 4),
(12, 'Crépière krampouz électrique standard', 'Puissance 3000W / 230V /Dimensions en cm [H x l x P] 12.5 x 40 x 40 / Poids (kg)16 / Bâti inox; Thermostat de 50 à 300°C Plaque en fonte : diamètre 40 cm Interrupteurs marche/arrêt ', 'assets/img/products/crepiere_electrique_standard.png', '420.00', 1, '2022-11-15 17:15:41', NULL, 3, 4),
(13, 'Friteuse gaz/électrique', 'Nombreux modèles disponible, gaz, électrique, sur coffre, a poser, 7L / 10L / 15L / 23L, simple, double.', 'assets/img/products/friteuse.png', '1000.00', 2, '2022-11-15 17:15:41', NULL, 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL COMMENT 'Le nom du type',
  `footer_order` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'L''ordre d''affichage du type dans le footer (0=pas affichée dans le footer)',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'La date de création de la catégorie',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'La date de la dernière mise à jour de la catégorie',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','catalog-manager') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `email`, `password`, `role`) VALUES
(1, 'ricstar80', 'richarddesnoues@gmail.com', 'psw', 'admin'),
(7, 'bernardo', 'bernard@gmail.com', '$2y$10$n2kWuqYq02d.j6g2n6Rz2O9VVBLy5MjV8OtwxYr7HefkH/cI59iym', 'catalog-manager'),
(9, 'chef', 'chef@gmail.com', '$2y$10$S3IYQMoAs0CLCjnUM9NsZ.djg.6caZLVhi.ScyAQxVJwgAj1kEBBW', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
