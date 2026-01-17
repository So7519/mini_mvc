-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 17 jan. 2026 à 23:11
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mini_mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Maillot 24/25', 'Les maillots porter lors de la saison des champions d\'Europe 2024/2025.', '2025-12-17 13:26:06', '2026-01-17 18:37:00'),
(2, 'Maillot 25/26', 'Les maillots porter du PSG lors de la saison 2025/2026.', '2025-12-17 13:26:06', '2026-01-17 18:36:53'),
(3, 'Maillot Rétro', 'Les maillots porter du PSG lors des saisons iconiques du Paris Saint-Germain.', '2025-12-17 13:26:06', '2026-01-17 18:36:48'),
(4, 'Maillot Jordan', 'Les maillots porter en partenariat avec Jordan.', '2025-12-17 13:26:06', '2026-01-17 18:36:41');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `statut` enum('en_attente','validee','annulee') DEFAULT 'en_attente',
  `total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `user_id`, `statut`, `total`, `created_at`, `updated_at`) VALUES
(7, 1, 'validee', 110.00, '2026-01-17 18:38:20', '2026-01-17 18:38:20'),
(8, 1, 'validee', 429.00, '2026-01-17 22:05:27', '2026-01-17 22:05:27');

-- --------------------------------------------------------

--
-- Structure de la table `commande_produit`
--

CREATE TABLE `commande_produit` (
  `id` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL DEFAULT 1,
  `prix_unitaire` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande_produit`
--

INSERT INTO `commande_produit` (`id`, `commande_id`, `product_id`, `quantite`, `prix_unitaire`, `created_at`) VALUES
(10, 7, 4, 1, 110.00, '2026-01-17 18:38:20'),
(11, 8, 10, 3, 110.00, '2026-01-17 22:05:27'),
(12, 8, 11, 1, 99.00, '2026-01-17 22:05:27');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `prix` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `image_url` text NOT NULL,
  `categorie_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `description`, `prix`, `stock`, `image_url`, `categorie_id`) VALUES
(1, 'Maillot PSG Héritage Domicile 93/94', 'Le Paris Saint-Germain redonne vie à sa riche histoire et se replonge dans les souvenirs avec ce maillot iconique qui a marqué les grandes années du club en tant que Champion de France pour la deuxième année de son histoire.', 210.00, 4, 'https://images.footballfanatics.com/paris-saint-germain/psg-heritage-home-shirt-1993/94_ss4_p-13301593+pv-1+u-191dhb6klw8xetyl6a7f+v-f1b9d51e43134ede84a062ab1b3fd884.jpg?_hv=2&w=1018', NULL),
(2, 'Maillot PSG Héritage Domicile 2001/02', 'Le Paris Saint-Germain célèbre à nouveau son histoire en rééditant un maillot qui a marqué à jamais la mémoire des supporters et des passionnés de football : le mythique maillot Home de la saison 2001-2002.', 160.00, 10, 'https://images.footballfanatics.com/paris-saint-germain/psg-2001/02-heritage-home-shirt_ss5_p-13373444+pv-1+u-isu7ndbuylklgrqjgcaj+v-belqzisacqjuffebyvfz.jpg?_hv=2&w=1018', NULL),
(3, 'Maillot PSG Nike 2004/05', 'Ce maillot réédité semble tout droit sorti du coffre. Avec ses couleurs signature, ses logos et ses détails vintage, ce remake rend hommage à la collection Total 90 créée par Nike pour l\'équipe du PSG en 2004.', 150.00, 15, 'https://images.footballfanatics.com/paris-saint-germain/psg-nike-2004/05-total-90-reissue-jersey-navy_ss5_p-202664149+pv-1+u-nbs4w88oyneq9rtk2buu+v-fa5mqaynn5zdb3woe3un.jpg?_hv=2&w=1018', NULL),
(4, 'Tenue Fourth Stadium PSG Jordan 2024-25', 'Le Paris Saint-Germain et Jordan Brand sont fiers de présenter leur nouvelle collection « WINGS ». Une initiative inédite à la croisée du luxe et de la performance. Un nouveau chapitre dans l\'histoire des deux icônes du sport et du style.', 110.00, 8, 'https://images.footballfanatics.com/paris-saint-germain/psg-jordan-fourth-stadium-shirt-2024-25_ss5_p-202135221+pv-1+u-0o0jisxpvy4z8fvhapnp+v-yymhxaygepcgd38hsiaz.jpg?_hv=2&w=1018', NULL),
(5, 'Maillot Collector Maillot Third Stadium PSG Jordan 24/25', 'Le Paris Saint-Germain et Jordan dévoilent le nouveau maillot Third pour la saison 2024-2025, une création qui symbolise l’alliance du luxe parisien et de la performance sportive.', 105.00, 40, 'https://images.footballfanatics.com/paris-saint-germain/special-edition-psg-jordan-third-stadium-shirt-2024-25-kids-champions-of-europe-2025_ss5_p-203292667+pv-1+u-3xgntbfslwevvuys8ruq+v-eeua3xb0fys0rdvxh60j.png?_hv=2&w=1018', NULL),
(6, 'Maillot PSG Héritage Extérieur 2000/01', 'Le Paris Saint-Germain revisite à nouveau l\'histoire du Club en rééditant un maillot qui a marqué les mémoires des supporters parisiens et des amateurs de football, notamment à l\'occasion d\'un match épique contre le Milan AC à San Siro au cours duquel Nicolas Anelka inscrivit un but salvateur pour les Rouge & Bleu.', 170.00, 12, 'https://images.footballfanatics.com/paris-saint-germain/psg-2000-away-shirt_ss5_p-13373445+pv-1+u-hyqdah306s1iwaggdpfg+v-yvg2ygfhkfbvcscmwl16.jpg?_hv=2&w=1018', NULL),
(7, 'Maillot Collector Domicile Stadium PSG Nike 24/25', 'ICI C\'EST PARIS, ICI C\'EST Champions d’Europe ! Adoptez le look d\'un champion d\'Europe avec ce maillot Nike Domicile Stadium PSG Édition Spéciale 2024-25 – Champions of Europe 2025.', 135.00, 25, 'https://images.footballfanatics.com/paris-saint-germain/special-edition-psg-nike-home-stadium-shirt-2024-25-kids-champions-of-europe-2025_ss5_p-203176389+pv-1+u-o6tihsc4adjnejmdff0j+v-of1gibyt9kpk2djlt9nv.jpg?_hv=2&w=1018', NULL),
(8, 'Maillot Fourth Match PSG Jordan Dri-FIT ADV 25/26', 'Le Paris Saint-Germain et Jordan Brand présentent le quatrième maillot du Club pour la saison 2025-2026. Inspiré par la tradition des ateliers de couture parisiens, il exprime la rencontre entre l\'élégance, la créativité et la performance.', 115.00, 32, 'https://images.footballfanatics.com/paris-saint-germain/psg-jordan-fourth-stadium-shirt-2025-26-with-cup-printing-vitinha-17_ss5_p-203607296+pv-1+u-rzcl7sosghpkhfknhinn+v-lp7nqbs4b4alrgshsw7s.jpg?_hv=2&w=1018', NULL),
(9, 'Maillot Third Stadium PSG Nike 25/26', 'Le Paris Saint-Germain et Nike dévoilent leur nouveau maillot Third 2025-2026. Inspiré de l\'univers graphique Total 90, qui a marqué le début des années 2000, ce nouveau maillot en propose une réinterprétation contemporaine.', 120.00, 45, 'https://images.footballfanatics.com/paris-saint-germain/psg-nike-third-stadium-shirt-2025-26-with-ucl-titleholder-and-foundation-10-years-badge-and-eiffel-star_ss5_p-203391359+pv-1+u-ajvxb3117nmglmdl5lkp+v-eps7mkt9v3vmj9lg60qa.jpg?_hv=2&w=1018', NULL),
(10, 'Maillot Extérieur Stadium PSG Nike 25/26', 'Le maillot PSG Extérieur 25/26 rend hommage à une tunique iconique du Club portée par les Parisiens lors des saisons 1990-1991 et 1991-1992, tout en incarnant l\'esprit d’innovation du club de la nouvelle génération.', 110.00, 80, 'https://images.footballfanatics.com/paris-saint-germain/psg-nike-away-stadium-shirt-2025-26-with-d-dou%C3%A9-14-printing_ss5_p-202155503+pv-1+u-lej6mzjgpztc0pwtk75o+v-83qki5btfmrnbeuehxv3.jpg?_hv=2&w=1018', NULL),
(11, 'Maillot Domicile Stadium PSG Nike 25/26', 'Plus que jamais légendaire, le mythique maillot du Paris Saint-Germain se réinvente avec une base bleu nuit, des accents éclatants de rouge et de blanc, et un graphisme en treillis inspiré des structures métalliques, clin d\'œil assumé à l\'armature d\'un monument iconique de Paris, prenant ici une place centrale.', 99.00, 114, 'https://images.footballfanatics.com/paris-saint-germain/psg-nike-home-stadium-shirt-2025-26-with-o-demb%C3%A9l%C3%A9-10-printing_ss5_p-203060681+pv-1+u-xxo4uaqxlhj4k24pkgks+v-vobfh2osvjywfsl5ynht.jpg?_hv=2&w=1018', 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `email`, `password`) VALUES
(1, 'toto', 'toto@toto.toto', NULL),
(7, 'Sofiane', 'sofiane.efrei@gmail.com', '$2y$10$10jYR541S8L4gjK6SozFJuzBXO91DU8YL3qZdhBnP4g1B.0jbmUxG');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_commande_user` (`user_id`);

--
-- Index pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_commande_produit_commande` (`commande_id`),
  ADD KEY `fk_commande_produit_produit` (`product_id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_product` (`user_id`,`product_id`),
  ADD KEY `fk_panier_produit` (`product_id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produit_categorie` (`categorie_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_commande_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD CONSTRAINT `fk_commande_produit_commande` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_commande_produit_produit` FOREIGN KEY (`product_id`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `fk_panier_produit` FOREIGN KEY (`product_id`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_panier_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_produit_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
