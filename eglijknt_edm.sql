-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 15 oct. 2024 à 09:26
-- Version du serveur : 10.6.19-MariaDB-cll-lve-log
-- Version de PHP : 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eglijknt_edm`
--

-- --------------------------------------------------------

--
-- Structure de la table `auditors`
--

CREATE TABLE `auditors` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom_prenom` varchar(200) NOT NULL,
  `telephone` varchar(200) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `niveau_id` int(11) UNSIGNED NOT NULL,
  `genre` varchar(200) DEFAULT NULL,
  `avatar` varchar(225) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `auditors`
--

INSERT INTO `auditors` (`id`, `nom_prenom`, `telephone`, `adresse`, `user_id`, `niveau_id`, `genre`, `avatar`, `created_at`, `updated_at`) VALUES
(6, 'Déborah KASSI ', '0708665302', 'vincentenguessan@gmail.com', 18, 1, 'Féminin', 'uploads/1717892576_7b64e2fde6ca67c4a9fd.png', '2024-06-09 00:22:56', '2024-07-06 22:10:25'),
(10, 'Konan Nathanael Pierre-Joel', '0777097912', 'joelnathanael202@gmail.com', 27, 1, 'Masculin', '', '2024-06-29 16:34:11', '2024-06-30 12:11:07'),
(11, 'KONAN Batikpa Serge Emmanuel ', '0757297438', 'batikpakonan@gmail.com', 28, 2, 'Masculin', '', '2024-06-29 16:38:50', '2024-06-29 16:38:50'),
(12, 'Patrick KASOMBO', '0777870057', 'patrickkasombo@gmail.com', 29, 1, 'Masculin', 'uploads/1719788319_52f2a733287c0bbc1a72.jpg', '2024-06-29 16:40:58', '2024-06-30 22:58:39'),
(13, 'Adjato Christian', '0749594855', 'adjatochristian@gmail.com', 30, 1, 'Masculin', '', '2024-06-29 16:43:21', '2024-06-30 09:15:18'),
(14, 'Adjato Adingra Boris', '0709186759', 'borisadjato@gmail.com', 31, 2, 'Masculin', 'uploads/1719789186_ab9964438e5ca7f6d264.jpg', '2024-06-29 16:44:34', '2024-06-30 23:13:06'),
(18, 'Jean-Marie Kassi', '0748400679', 'kassiaman01@gmail.com', 35, 2, 'Masculin', 'uploads/1719737383_92f2fc742486f3f7316f.png', '2024-06-29 16:49:33', '2024-06-30 08:49:43'),
(19, 'Koffi N\'Guessan Dorcas', '0748597658', 'koffinguessan435@gmail.com', 36, 2, 'Féminin', '', '2024-06-29 16:51:26', '2024-06-29 16:51:26'),
(20, 'Koffi Benianmi Rita Ségolène', '0701385446', 'ritakoffi233@gmail.com', 37, 2, 'Féminin', '', '2024-06-29 16:53:03', '2024-06-29 16:53:03'),
(24, 'Musingya Jessica', '0711791158', 'jessicakabuyayak@gmail.com', 41, 1, 'Féminin', 'uploads/1719921443_ea2ddf66f23ecf8a47a8.jpg', '2024-06-30 23:26:21', '2024-07-02 11:57:23');

-- --------------------------------------------------------

--
-- Structure de la table `disciplines`
--

CREATE TABLE `disciplines` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom` varchar(200) NOT NULL,
  `coeficient` int(200) NOT NULL,
  `status` varchar(200) DEFAULT 'inactif',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `disciplines`
--

INSERT INTO `disciplines` (`id`, `nom`, `coeficient`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Compétence Biblique', 3, 'actif', NULL, NULL),
(2, 'Progression Biblique', 2, 'actif', NULL, NULL),
(3, 'Etude Biblique', 2, 'actif', NULL, NULL),
(4, 'Transformation', 3, 'actif', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-04-24-122126', 'App\\Database\\Migrations\\Users', 'default', 'App', 1716593869, 1),
(2, '2024-05-18-225227', 'App\\Database\\Migrations\\Discipline', 'default', 'App', 1716593869, 1),
(3, '2024-05-18-233505', 'App\\Database\\Migrations\\Niveau', 'default', 'App', 1716594116, 2),
(4, '2024-05-23-022528', 'App\\Database\\Migrations\\Professors', 'default', 'App', 1716594116, 2),
(5, '2024-05-24-233855', 'App\\Database\\Migrations\\Auditors', 'default', 'App', 1716594116, 2),
(7, '2024-05-28-185754', 'App\\Database\\Migrations\\Questionnaires', 'default', 'App', 1716924087, 3),
(8, '2024-05-28-185810', 'App\\Database\\Migrations\\Questions', 'default', 'App', 1716924087, 3),
(9, '2024-05-30-022830', 'App\\Database\\Migrations\\Reponses', 'default', 'App', 1717036420, 4),
(13, '2024-06-29-005115', 'App\\Database\\Migrations\\NotesQuestion', 'default', 'App', 1719623223, 7),
(14, '2024-05-24-235928', 'App\\Database\\Migrations\\Note', 'default', 'App', 1719630974, 8);

-- --------------------------------------------------------

--
-- Structure de la table `niveaux`
--

CREATE TABLE `niveaux` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `niveaux`
--

INSERT INTO `niveaux` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Niveau 1', '2024-05-25 00:50:47', '2024-05-25 00:50:47'),
(2, 'Niveau 2', '2024-05-25 00:51:04', '2024-05-25 00:51:04'),
(3, 'Niveau 3', '2024-05-25 00:49:42', '2024-05-25 00:49:42'),
(4, 'Niveau 4', '2024-05-25 00:49:42', '2024-05-25 00:49:42');

-- --------------------------------------------------------

--
-- Structure de la table `notequestions`
--

CREATE TABLE `notequestions` (
  `id` int(11) UNSIGNED NOT NULL,
  `auditor_id` int(11) UNSIGNED NOT NULL,
  `reponse_id` int(11) UNSIGNED NOT NULL,
  `note` int(2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `notequestions`
--

INSERT INTO `notequestions` (`id`, `auditor_id`, `reponse_id`, `note`, `created_at`, `updated_at`) VALUES
(1, 6, 45, 2, '2024-06-29 03:46:22', '2024-06-29 03:46:22'),
(2, 6, 46, 0, '2024-06-29 03:46:22', '2024-06-29 03:46:22'),
(3, 6, 47, 2, '2024-06-29 03:46:22', '2024-06-29 03:46:22'),
(4, 6, 48, 1, '2024-06-29 03:46:22', '2024-06-29 03:46:22'),
(5, 6, 49, 1, '2024-06-29 03:46:22', '2024-06-29 03:46:22'),
(6, 6, 50, 1, '2024-06-29 03:46:22', '2024-06-29 03:46:22'),
(7, 6, 51, 1, '2024-06-29 03:46:22', '2024-06-29 03:46:22'),
(8, 6, 52, 2, '2024-06-29 03:46:22', '2024-06-29 03:46:22'),
(9, 6, 53, 1, '2024-06-29 03:46:22', '2024-06-29 03:46:22'),
(10, 6, 54, 2, '2024-06-29 03:46:22', '2024-06-29 03:46:22'),
(11, 6, 55, 1, '2024-06-29 03:46:22', '2024-06-29 03:46:22');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) UNSIGNED NOT NULL,
  `auditor_id` int(11) UNSIGNED NOT NULL,
  `week` varchar(255) NOT NULL,
  `note` int(2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id`, `auditor_id`, `week`, `note`, `created_at`, `updated_at`) VALUES
(1, 6, 'semaine105635', 14, '2024-06-29 03:46:22', '2024-06-29 03:46:22');

-- --------------------------------------------------------

--
-- Structure de la table `professors`
--

CREATE TABLE `professors` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom_prenom` varchar(200) NOT NULL,
  `telephone` varchar(200) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `date_naiss` varchar(200) DEFAULT NULL,
  `discipline_id` varchar(200) DEFAULT NULL,
  `genre` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(200) DEFAULT 'inactif',
  `avatar` varchar(255) DEFAULT 'inactif',
  `user_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `questionnaires`
--

CREATE TABLE `questionnaires` (
  `id` int(11) UNSIGNED NOT NULL,
  `questionnaire_name` varchar(255) NOT NULL,
  `discipline_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `questionnaires`
--

INSERT INTO `questionnaires` (`id`, `questionnaire_name`, `discipline_id`, `created_at`, `updated_at`) VALUES
(1, 'EDM Niveau 1 et 2', 4, '2024-05-28 20:39:35', '2024-05-28 20:39:35'),
(13, 'EDM Niveau 2', 4, '2024-05-28 23:07:08', '2024-05-28 23:07:08'),
(14, 'EDM Niveau 1', 1, '2024-06-08 22:43:53', '2024-06-08 22:43:53');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) UNSIGNED NOT NULL,
  `questionnaire_id` int(11) UNSIGNED NOT NULL,
  `niveau` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`niveau`)),
  `question` varchar(200) NOT NULL,
  `question_type` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `questionnaire_id`, `niveau`, `question`, `question_type`, `created_at`, `updated_at`) VALUES
(1, 1, '[\"1\",\"2\"]', 'Pendant combien de jours as-tu respecté la prière du matin ?', 'text', '2024-05-28 20:39:35', '2024-05-28 20:39:35'),
(2, 1, '[\"1\",\"2\"]', '⁠Combien d’heure en moyenne as-tu prié cette semaine ?', 'text', '2024-05-28 21:56:42', '2024-05-28 21:56:42'),
(3, 1, '[\"1\",\"2\"]', '⁠Combien de temps as-tu prier cette semaine pour tes mentorés ?', 'text', '2024-05-28 22:32:03', '2024-05-28 22:32:03'),
(4, 1, '[\"1\",\"2\"]', 'Combien de fois dans la semaine as-tu utiliser la méthode Lecture simple ?', 'text', '2024-05-28 22:33:16', '2024-05-28 22:33:16'),
(5, 1, '[\"1\",\"2\"]', 'Combien de fois dans la semaine as-tu utiliser la méthode: Étude du texte (OIA) ? ', 'text', '2024-05-28 22:34:00', '2024-05-28 22:34:00'),
(6, 1, '[\"1\",\"2\"]', 'Combien de fois dans la semaine as-tu utiliser la méthode : Étude par thème ?', 'text', '2024-05-28 22:34:41', '2024-05-28 22:34:41'),
(7, 1, '[\"1\",\"2\"]', 'Combien de prédications as-tu écouté cette semaine ?', 'text', '2024-05-28 22:35:22', '2024-05-28 22:35:22'),
(8, 1, '[\"1\",\"2\"]', 'Quelle trait de caractère es-tu en train de travailler cette semaine ? ', 'textarea', '2024-05-28 22:35:44', '2024-05-28 22:35:44'),
(9, 1, '[\"1\",\"2\"]', 'As-tu donné la dîme cette semaine ? ', 'checkbox', '2024-05-28 22:39:12', '2024-05-28 22:39:12'),
(10, 1, '[\"1\",\"2\"]', 'As-tu gagné une âme à Christ cette semaine ?', 'checkbox', '2024-05-28 22:40:09', '2024-05-28 22:40:09'),
(11, 1, '[\"1\",\"2\"]', '.⁠ ⁠As-tu invité une personne à l’église cette semaine ?', 'checkbox', '2024-05-28 22:40:33', '2024-05-28 22:40:33'),
(12, 1, '[\"1\",\"2\"]', 'Comment se porte tes mentorés ?', 'textarea', '2024-05-28 22:41:03', '2024-05-28 22:41:03'),
(13, 13, '[\"2\"]', 'Penses-tu avoir bien expliqué à chaque membre de ton département son rôle cette semaine ?', 'checkbox', '2024-05-28 23:10:35', '2024-05-28 23:10:35'),
(14, 13, '[\"2\"]', 'Combien de temps as-tu prier cette semaine pour les membres de ton département ?  ', 'text', '2024-05-28 23:11:16', '2024-05-28 23:11:16'),
(15, 13, '[\"2\"]', 'Quels sont les difficultés que tu as rencontré au sein de ton département cette ? ', 'textarea', '2024-05-28 23:14:06', '2024-05-28 23:14:06'),
(16, 13, '[\"2\"]', 'Merci d’énumérer les tâches qui te sont confiés au niveau de ton stage ? ', 'textarea', '2024-05-28 23:14:50', '2024-05-28 23:14:50'),
(17, 13, '[\"2\"]', 'Que as-tu appris de nouveau pendant ton stage cette semaine ?', 'textarea', '2024-05-28 23:15:26', '2024-05-28 23:15:26');

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE `reponses` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `question_id` int(11) UNSIGNED NOT NULL,
  `response` text NOT NULL,
  `week` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reponses`
--

INSERT INTO `reponses` (`id`, `user_id`, `question_id`, `response`, `week`, `status`, `created_at`, `updated_at`) VALUES
(45, 18, 1, '4', 'semaine105635', 'noté', '2024-06-09 01:49:51', '2024-06-09 01:49:51'),
(46, 18, 2, '3', 'semaine105635', 'noté', '2024-06-09 01:49:51', '2024-06-09 01:49:51'),
(47, 18, 3, '2', 'semaine105635', 'noté', '2024-06-09 01:49:51', '2024-06-09 01:49:51'),
(48, 18, 4, '3', 'semaine105635', 'noté', '2024-06-09 01:49:51', '2024-06-09 01:49:51'),
(49, 18, 5, '1', 'semaine105635', 'noté', '2024-06-09 01:49:51', '2024-06-09 01:49:51'),
(50, 18, 6, '1', 'semaine105635', 'noté', '2024-06-09 01:49:51', '2024-06-09 01:49:51'),
(51, 18, 7, '1', 'semaine105635', 'noté', '2024-06-09 01:49:51', '2024-06-09 01:49:51'),
(52, 18, 8, 'yuuu bien', 'semaine105635', 'noté', '2024-06-09 01:49:51', '2024-06-09 01:49:51'),
(53, 18, 9, 'on', 'semaine105635', 'noté', '2024-06-09 01:49:51', '2024-06-09 01:49:51'),
(54, 18, 11, 'on', 'semaine105635', 'noté', '2024-06-09 01:49:51', '2024-06-09 01:49:51'),
(55, 18, 12, 'tyrre', 'semaine105635', 'noté', '2024-06-09 01:49:51', '2024-06-09 01:49:51'),
(56, 31, 1, '4', 'semaine105638', NULL, '2024-06-29 21:08:19', '2024-06-29 21:08:19'),
(57, 31, 2, '9', 'semaine105638', NULL, '2024-06-29 21:08:19', '2024-06-29 21:08:19'),
(58, 31, 3, '2', 'semaine105638', NULL, '2024-06-29 21:08:19', '2024-06-29 21:08:19'),
(59, 31, 4, '5', 'semaine105638', NULL, '2024-06-29 21:08:19', '2024-06-29 21:08:19'),
(60, 31, 5, '0', 'semaine105638', NULL, '2024-06-29 21:08:19', '2024-06-29 21:08:19'),
(61, 31, 6, '1', 'semaine105638', NULL, '2024-06-29 21:08:19', '2024-06-29 21:08:19'),
(62, 31, 7, '8', 'semaine105638', NULL, '2024-06-29 21:08:19', '2024-06-29 21:08:19'),
(63, 31, 8, 'LE PARDON ', 'semaine105638', NULL, '2024-06-29 21:08:19', '2024-06-29 21:08:19'),
(64, 31, 10, 'on', 'semaine105638', NULL, '2024-06-29 21:08:19', '2024-06-29 21:08:19'),
(65, 31, 12, 'J\'ai parlé a tous les mentorés cette semaine, \r\n- Samuel vas bien, il a fini sa composition au baccalauréat la semaine dernière, il a des difficultés à prier mais il est résolu à se baptisé, il sera au culte demain \r\n- Henoc, m\'a donné l\'information selon laquelle son père aurait rechuté et je ne se porte bien en ce moment. Et demain il sera au culte.\r\n- Alfred par contre vas bien, selon sa vie spirituelle a pris un coup mais demain nous avons rdv pour mieux parler.\r\n- Hamed était injoignable, et puisse que j\'étais e déplacement je n\'ai pas pu passer le voir ', 'semaine105638', NULL, '2024-06-29 21:08:19', '2024-06-29 21:08:19'),
(66, 31, 13, 'on', 'semaine105638', NULL, '2024-06-29 21:08:19', '2024-06-29 21:08:19'),
(67, 31, 14, '1', 'semaine105638', NULL, '2024-06-29 21:08:19', '2024-06-29 21:08:19'),
(68, 31, 15, '- Le manque d\'engagement dans les choses de Dieu \r\n- Le manque de finance pour les activités ', 'semaine105638', NULL, '2024-06-29 21:08:19', '2024-06-29 21:08:19'),
(69, 31, 16, '', 'semaine105638', NULL, '2024-06-29 21:08:19', '2024-06-29 21:08:19'),
(70, 31, 17, '', 'semaine105638', NULL, '2024-06-29 21:08:19', '2024-06-29 21:08:19'),
(71, 37, 1, '3', 'semaine105638', NULL, '2024-06-29 21:40:31', '2024-06-29 21:40:31'),
(72, 37, 2, '16', 'semaine105638', NULL, '2024-06-29 21:40:31', '2024-06-29 21:40:31'),
(73, 37, 3, '4', 'semaine105638', NULL, '2024-06-29 21:40:31', '2024-06-29 21:40:31'),
(74, 37, 4, '3', 'semaine105638', NULL, '2024-06-29 21:40:31', '2024-06-29 21:40:31'),
(75, 37, 5, '1', 'semaine105638', NULL, '2024-06-29 21:40:31', '2024-06-29 21:40:31'),
(76, 37, 6, '', 'semaine105638', NULL, '2024-06-29 21:40:31', '2024-06-29 21:40:31'),
(77, 37, 7, '3', 'semaine105638', NULL, '2024-06-29 21:40:31', '2024-06-29 21:40:31'),
(78, 37, 8, '', 'semaine105638', NULL, '2024-06-29 21:40:31', '2024-06-29 21:40:31'),
(79, 37, 9, 'on', 'semaine105638', NULL, '2024-06-29 21:40:31', '2024-06-29 21:40:31'),
(80, 37, 12, 'Ils se portent bien ,j\'ai eu des nouvelles de maman Géraldine, elle va  bien,on n\'a parlé, elle a sa sœur qui est un peu malade . maman Brigitte,je l\'ai visité sa santé va un peu.\r\n\r\nStéphanie je l\'ai vu cette semaine mais on n\'a pas causé \r\n\r\n', 'semaine105638', NULL, '2024-06-29 21:40:31', '2024-06-29 21:40:31'),
(81, 37, 13, 'on', 'semaine105638', NULL, '2024-06-29 21:40:31', '2024-06-29 21:40:31'),
(82, 37, 14, '1', 'semaine105638', NULL, '2024-06-29 21:40:31', '2024-06-29 21:40:31'),
(83, 37, 15, 'Elles ne travaillent pas \'es chants et je ne suis pas patiente ,je veux que les choses soient bien faites,donc ça me fatigue un peu .', 'semaine105638', NULL, '2024-06-29 21:40:31', '2024-06-29 21:40:31'),
(84, 37, 16, '', 'semaine105638', NULL, '2024-06-29 21:40:31', '2024-06-29 21:40:31'),
(85, 37, 17, '', 'semaine105638', NULL, '2024-06-29 21:40:31', '2024-06-29 21:40:31'),
(86, 30, 1, 'Oui', 'semaine105638', NULL, '2024-06-30 09:18:06', '2024-06-30 09:18:06'),
(87, 30, 2, '15h', 'semaine105638', NULL, '2024-06-30 09:18:06', '2024-06-30 09:18:06'),
(88, 30, 3, '2h', 'semaine105638', NULL, '2024-06-30 09:18:06', '2024-06-30 09:18:06'),
(89, 30, 4, '7/7', 'semaine105638', NULL, '2024-06-30 09:18:06', '2024-06-30 09:18:06'),
(90, 30, 5, '1/1', 'semaine105638', NULL, '2024-06-30 09:18:06', '2024-06-30 09:18:06'),
(91, 30, 6, '1/1', 'semaine105638', NULL, '2024-06-30 09:18:06', '2024-06-30 09:18:06'),
(92, 30, 7, '7/7', 'semaine105638', NULL, '2024-06-30 09:18:06', '2024-06-30 09:18:06'),
(93, 30, 8, 'La procrastination ', 'semaine105638', NULL, '2024-06-30 09:18:06', '2024-06-30 09:18:06'),
(94, 30, 9, 'on', 'semaine105638', NULL, '2024-06-30 09:18:06', '2024-06-30 09:18:06'),
(95, 30, 10, 'on', 'semaine105638', NULL, '2024-06-30 09:18:06', '2024-06-30 09:18:06'),
(96, 30, 11, 'on', 'semaine105638', NULL, '2024-06-30 09:18:06', '2024-06-30 09:18:06'),
(97, 30, 12, 'Bonsoir papa. J’ai eu a échanger avec Sheila et Noura. \r\n\r\n-Noura m’a dit que pour le moment tout va bien tant de son coté et aussi du côté de la famille. Alors , elle m’a aussi fait part de comment elle prit , j’ai donc décidé de mettre une stratégie a fin de savoir a quel moment elle prit et si elle l’a vraiment fait. \r\n\r\nConcernant Sheila, c’est un peu compliqué, il semble qu’il y’a des problèmes entre ces parents( MAMAN ET TANTE) et Sheila. Apparemment elle découche beaucoup et ces parents n’ont vraiment pas de ses nouvelles car elle ne leur donne pas des nouvelles la concernant. Elle se fait rare.', 'semaine105638', NULL, '2024-06-30 09:18:06', '2024-06-30 09:18:06'),
(98, 36, 1, '7jours', 'semaine105638', NULL, '2024-06-30 14:06:56', '2024-06-30 14:06:56'),
(99, 36, 2, '15h', 'semaine105638', NULL, '2024-06-30 14:06:56', '2024-06-30 14:06:56'),
(100, 36, 3, '5h', 'semaine105638', NULL, '2024-06-30 14:06:56', '2024-06-30 14:06:56'),
(101, 36, 4, '7fois', 'semaine105638', NULL, '2024-06-30 14:06:56', '2024-06-30 14:06:56'),
(102, 36, 5, '7 fois ', 'semaine105638', NULL, '2024-06-30 14:06:56', '2024-06-30 14:06:56'),
(103, 36, 6, '5fois', 'semaine105638', NULL, '2024-06-30 14:06:56', '2024-06-30 14:06:56'),
(104, 36, 7, '10fois', 'semaine105638', NULL, '2024-06-30 14:06:56', '2024-06-30 14:06:56'),
(105, 36, 8, 'La patience (s\'avoir attendre)', 'semaine105638', NULL, '2024-06-30 14:06:56', '2024-06-30 14:06:56'),
(106, 36, 10, 'on', 'semaine105638', NULL, '2024-06-30 14:06:56', '2024-06-30 14:06:56'),
(107, 36, 12, 'Mes mentorés, la plupart ne sont pas régulières au culte du dimanche mais j\'essaie de les encourager et prier pour elles, si non qu\'elles sont baptisées, elles suivent déja la formation EDS. Je vois aussi qu\'il y\'a un travail à faire au niveau de leur vie.', 'semaine105638', NULL, '2024-06-30 14:06:56', '2024-06-30 14:06:56'),
(108, 36, 14, '', 'semaine105638', NULL, '2024-06-30 14:06:56', '2024-06-30 14:06:56'),
(109, 36, 15, 'RAS', 'semaine105638', NULL, '2024-06-30 14:06:56', '2024-06-30 14:06:56'),
(110, 36, 16, 'RAS', 'semaine105638', NULL, '2024-06-30 14:06:56', '2024-06-30 14:06:56'),
(111, 36, 17, 'RAS', 'semaine105638', NULL, '2024-06-30 14:06:56', '2024-06-30 14:06:56'),
(112, 29, 1, '5', 'semaine105638', NULL, '2024-06-30 22:55:00', '2024-06-30 22:55:00'),
(113, 29, 2, '8', 'semaine105638', NULL, '2024-06-30 22:55:00', '2024-06-30 22:55:00'),
(114, 29, 3, '1', 'semaine105638', NULL, '2024-06-30 22:55:00', '2024-06-30 22:55:00'),
(115, 29, 4, '3', 'semaine105638', NULL, '2024-06-30 22:55:00', '2024-06-30 22:55:00'),
(116, 29, 5, '1', 'semaine105638', NULL, '2024-06-30 22:55:00', '2024-06-30 22:55:00'),
(117, 29, 6, '1', 'semaine105638', NULL, '2024-06-30 22:55:00', '2024-06-30 22:55:00'),
(118, 29, 7, '6', 'semaine105638', NULL, '2024-06-30 22:55:00', '2024-06-30 22:55:00'),
(119, 29, 8, 'Metriser ma colère ', 'semaine105638', NULL, '2024-06-30 22:55:00', '2024-06-30 22:55:00'),
(120, 29, 9, 'on', 'semaine105638', NULL, '2024-06-30 22:55:00', '2024-06-30 22:55:00'),
(121, 29, 10, 'on', 'semaine105638', NULL, '2024-06-30 22:55:00', '2024-06-30 22:55:00'),
(122, 29, 11, 'on', 'semaine105638', NULL, '2024-06-30 22:55:00', '2024-06-30 22:55:00'),
(123, 29, 12, '', 'semaine105638', NULL, '2024-06-30 22:55:00', '2024-06-30 22:55:00'),
(124, 28, 1, '5', 'semaine105638', NULL, '2024-07-01 06:13:07', '2024-07-01 06:13:07'),
(125, 28, 2, '10', 'semaine105638', NULL, '2024-07-01 06:13:07', '2024-07-01 06:13:07'),
(126, 28, 3, '20 minutes ', 'semaine105638', NULL, '2024-07-01 06:13:07', '2024-07-01 06:13:07'),
(127, 28, 4, '1', 'semaine105638', NULL, '2024-07-01 06:13:07', '2024-07-01 06:13:07'),
(128, 28, 5, '0', 'semaine105638', NULL, '2024-07-01 06:13:07', '2024-07-01 06:13:07'),
(129, 28, 6, '0', 'semaine105638', NULL, '2024-07-01 06:13:07', '2024-07-01 06:13:07'),
(130, 28, 7, '5', 'semaine105638', NULL, '2024-07-01 06:13:07', '2024-07-01 06:13:07'),
(131, 28, 8, 'Aucun ', 'semaine105638', NULL, '2024-07-01 06:13:07', '2024-07-01 06:13:07'),
(132, 28, 9, 'on', 'semaine105638', NULL, '2024-07-01 06:13:07', '2024-07-01 06:13:07'),
(133, 28, 11, 'on', 'semaine105638', NULL, '2024-07-01 06:13:07', '2024-07-01 06:13:07'),
(134, 28, 12, 'Abraham n\'a pas d\'activité génératrice de revenu, il en cherche. Il arrive à prier chaque jour. Concernant sa vie personnelle il y a une amélioration et il grandit un peu un peu.\r\n\r\nJean Luc a une relation personnelle avec Dieu. Il arrive à prier. Et il a une activité à son propre compte. Je ne suis pas encore allé dans les détails mais je compte le faire au fur à mesure afin de savoir beaucoup de choses.\r\n\r\nEmmanuel KOUAKOU apprend beaucoup avec Dieu. Il arrive a prier un peu. Pour le niveau professionnel il se débrouille un peu. Je compte mieux entrer en profondeur dans les prochains échanges.\r\n\r\nAu niveau de leurs familles tout va bien.\r\nIls s\'engagent également bien dans les activités de l\'église et dans les formations.\r\nIls n\'ont pas de problème particulier dans l\'apprentissage à l\'église.', 'semaine105638', NULL, '2024-07-01 06:13:07', '2024-07-01 06:13:07'),
(135, 28, 13, 'on', 'semaine105638', NULL, '2024-07-01 06:13:07', '2024-07-01 06:13:07'),
(136, 28, 14, '30 minutes ', 'semaine105638', NULL, '2024-07-01 06:13:07', '2024-07-01 06:13:07'),
(137, 28, 15, 'J\'ai rencontré des difficultés matérielles auxquelles nous sommes en train de trouver des solutions avec maman ', 'semaine105638', NULL, '2024-07-01 06:13:07', '2024-07-01 06:13:07'),
(138, 28, 16, '', 'semaine105638', NULL, '2024-07-01 06:13:07', '2024-07-01 06:13:07'),
(139, 28, 17, '', 'semaine105638', NULL, '2024-07-01 06:13:07', '2024-07-01 06:13:07'),
(140, 37, 1, '3', 'semaine2', NULL, '2024-07-06 22:18:02', '2024-07-06 22:18:02'),
(141, 37, 2, '10', 'semaine2', NULL, '2024-07-06 22:18:02', '2024-07-06 22:18:02'),
(142, 37, 3, '30 min', 'semaine2', NULL, '2024-07-06 22:18:02', '2024-07-06 22:18:02'),
(143, 37, 4, '1 ', 'semaine2', NULL, '2024-07-06 22:18:02', '2024-07-06 22:18:02'),
(144, 37, 5, '0', 'semaine2', NULL, '2024-07-06 22:18:02', '2024-07-06 22:18:02'),
(145, 37, 6, '0', 'semaine2', NULL, '2024-07-06 22:18:02', '2024-07-06 22:18:02'),
(146, 37, 7, '4', 'semaine2', NULL, '2024-07-06 22:18:02', '2024-07-06 22:18:02'),
(147, 37, 8, '', 'semaine2', NULL, '2024-07-06 22:18:02', '2024-07-06 22:18:02'),
(148, 37, 9, 'on', 'semaine2', NULL, '2024-07-06 22:18:02', '2024-07-06 22:18:02'),
(149, 37, 11, 'on', 'semaine2', NULL, '2024-07-06 22:18:02', '2024-07-06 22:18:02'),
(150, 37, 12, 'Elles vont bien ,Stéphanie je l\'ai appelé pour prendre de ses nouvelles, elle m\'a dit ça va,on n\'a échangé je lui ai dit pourquoi elle n\'a pas commencé les cours, elle dit elle se réveille e\' retard.\r\n\r\nMaman Brigitte je l\'ai vu aujourd\'hui sa santé ça va.', 'semaine2', NULL, '2024-07-06 22:18:02', '2024-07-06 22:18:02'),
(151, 37, 13, 'on', 'semaine2', NULL, '2024-07-06 22:18:02', '2024-07-06 22:18:02'),
(152, 37, 14, '30 min', 'semaine2', NULL, '2024-07-06 22:18:02', '2024-07-06 22:18:02'),
(153, 37, 15, 'Les humeurs des membres du département me font parfois perdre le sang froid .\r\n\r\nJe veux imposer un leadership sans blesser les gens mais ce n\'est pas possible.', 'semaine2', NULL, '2024-07-06 22:18:02', '2024-07-06 22:18:02'),
(154, 37, 16, '', 'semaine2', NULL, '2024-07-06 22:18:02', '2024-07-06 22:18:02'),
(155, 37, 17, '', 'semaine2', NULL, '2024-07-06 22:18:02', '2024-07-06 22:18:02'),
(156, 18, 1, '6', 'semaine4', NULL, '2024-07-06 22:29:17', '2024-07-06 22:29:17'),
(157, 18, 2, '17h', 'semaine4', NULL, '2024-07-06 22:29:17', '2024-07-06 22:29:17'),
(158, 18, 3, '0', 'semaine4', NULL, '2024-07-06 22:29:17', '2024-07-06 22:29:17'),
(159, 18, 4, '10 minutes ', 'semaine4', NULL, '2024-07-06 22:29:17', '2024-07-06 22:29:17'),
(160, 18, 5, '1 seule fois ', 'semaine4', NULL, '2024-07-06 22:29:17', '2024-07-06 22:29:17'),
(161, 18, 6, '1', 'semaine4', NULL, '2024-07-06 22:29:17', '2024-07-06 22:29:17'),
(162, 18, 7, '1 seule ', 'semaine4', NULL, '2024-07-06 22:29:17', '2024-07-06 22:29:17'),
(163, 18, 8, 'La persévérance ', 'semaine4', NULL, '2024-07-06 22:29:17', '2024-07-06 22:29:17'),
(164, 18, 10, 'on', 'semaine4', NULL, '2024-07-06 22:29:17', '2024-07-06 22:29:17'),
(165, 18, 11, 'on', 'semaine4', NULL, '2024-07-06 22:29:17', '2024-07-06 22:29:17'),
(166, 18, 12, 'Daniel: Il va bien physiquement.\r\nPour ce qui est de la vie spirituelle Il n\'arrive pas à trop prier ni lire la bible.\r\nNicole : Je ne l\'a connait pas physiquement. Elle sera là demain pour faire d\'abord  la connaissance sinon elle va bien.\r\n', 'semaine4', NULL, '2024-07-06 22:29:17', '2024-07-06 22:29:17'),
(167, 35, 1, '13h30min', 'semaine105639', NULL, '2024-07-06 22:33:21', '2024-07-06 22:33:21'),
(168, 35, 2, '14h40min', 'semaine105639', NULL, '2024-07-06 22:33:21', '2024-07-06 22:33:21'),
(169, 35, 3, '2h', 'semaine105639', NULL, '2024-07-06 22:33:21', '2024-07-06 22:33:21'),
(170, 35, 4, '5', 'semaine105639', NULL, '2024-07-06 22:33:21', '2024-07-06 22:33:21'),
(171, 35, 5, '3', 'semaine105639', NULL, '2024-07-06 22:33:21', '2024-07-06 22:33:21'),
(172, 35, 6, '2', 'semaine105639', NULL, '2024-07-06 22:33:21', '2024-07-06 22:33:21'),
(173, 35, 7, '4', 'semaine105639', NULL, '2024-07-06 22:33:21', '2024-07-06 22:33:21'),
(174, 35, 8, 'J\'ai commencer à travailler sur la maitrise de soit cependant après notre échange, je vais commencer à travailler sur la patience', 'semaine105639', NULL, '2024-07-06 22:33:21', '2024-07-06 22:33:21'),
(175, 35, 9, 'on', 'semaine105639', NULL, '2024-07-06 22:33:21', '2024-07-06 22:33:21'),
(176, 35, 11, 'on', 'semaine105639', NULL, '2024-07-06 22:33:21', '2024-07-06 22:33:21'),
(177, 35, 12, 'Emmanuelle Ouaga: je n\'arrive pas à la joindre depuis lundi, j\'ai même essayé son numéro aujourd\'hui ça ne passe pas\r\nKonan Paul Henoc: je l\'ai cherché ce dimanche je ne l\'ai pas vu\r\nEklou Edem : je n\'ai pas pu le joindre cette semaine\r\nKouakou Grace: Je n\'ai pas pu le joindre cette semaine', 'semaine105639', NULL, '2024-07-06 22:33:21', '2024-07-06 22:33:21'),
(178, 35, 13, 'on', 'semaine105639', NULL, '2024-07-06 22:33:21', '2024-07-06 22:33:21'),
(179, 35, 14, 'Chaque que je prie', 'semaine105639', NULL, '2024-07-06 22:33:21', '2024-07-06 22:33:21'),
(180, 35, 15, 'RAS', 'semaine105639', NULL, '2024-07-06 22:33:21', '2024-07-06 22:33:21'),
(181, 35, 16, 'RAS', 'semaine105639', NULL, '2024-07-06 22:33:21', '2024-07-06 22:33:21'),
(182, 35, 17, 'RAS', 'semaine105639', NULL, '2024-07-06 22:33:21', '2024-07-06 22:33:21'),
(183, 18, 1, '4', 'semaine2', NULL, '2024-07-14 09:43:28', '2024-07-14 09:43:28'),
(184, 18, 2, '10h', 'semaine2', NULL, '2024-07-14 09:43:28', '2024-07-14 09:43:28'),
(185, 18, 3, '4h', 'semaine2', NULL, '2024-07-14 09:43:28', '2024-07-14 09:43:28'),
(186, 18, 4, '3', 'semaine2', NULL, '2024-07-14 09:43:28', '2024-07-14 09:43:28'),
(187, 18, 5, '1', 'semaine2', NULL, '2024-07-14 09:43:28', '2024-07-14 09:43:28'),
(188, 18, 6, '0', 'semaine2', NULL, '2024-07-14 09:43:28', '2024-07-14 09:43:28'),
(189, 18, 7, '3', 'semaine2', NULL, '2024-07-14 09:43:28', '2024-07-14 09:43:28'),
(190, 18, 8, 'La persévérance ', 'semaine2', NULL, '2024-07-14 09:43:28', '2024-07-14 09:43:28'),
(191, 18, 9, 'on', 'semaine2', NULL, '2024-07-14 09:43:28', '2024-07-14 09:43:28'),
(192, 18, 10, 'on', 'semaine2', NULL, '2024-07-14 09:43:28', '2024-07-14 09:43:28'),
(193, 18, 11, 'on', 'semaine2', NULL, '2024-07-14 09:43:28', '2024-07-14 09:43:28'),
(194, 18, 12, 'Daniel : \r\nPhysiquement il ne sr le moment ,il n\'arrive pas à garder l\'\r\nConcernant la prière,il n\'a pas prié cette semaine.\r\nSa vie financière :Il n\'arrive pas à garder l\'argent pour le moment.\r\nFlore: Elle ne prie pas tous les jours \r\nElle sera là aujourd\'hui au culte.\r\nNicole : Durant la semaine,j\'ai essayé de la joindre, mais je ne l\'ai pas eu.', 'semaine2', NULL, '2024-07-14 09:43:28', '2024-07-14 09:43:28'),
(195, 27, 1, '6h', 'semaine105640', NULL, '2024-07-14 12:05:30', '2024-07-14 12:05:30'),
(196, 27, 2, '14h', 'semaine105640', NULL, '2024-07-14 12:05:30', '2024-07-14 12:05:30'),
(197, 27, 3, '1h', 'semaine105640', NULL, '2024-07-14 12:05:30', '2024-07-14 12:05:30'),
(198, 27, 4, '0', 'semaine105640', NULL, '2024-07-14 12:05:30', '2024-07-14 12:05:30'),
(199, 27, 5, '0', 'semaine105640', NULL, '2024-07-14 12:05:30', '2024-07-14 12:05:30'),
(200, 27, 6, '0', 'semaine105640', NULL, '2024-07-14 12:05:30', '2024-07-14 12:05:30'),
(201, 27, 7, '4', 'semaine105640', NULL, '2024-07-14 12:05:30', '2024-07-14 12:05:30'),
(202, 27, 8, 'Le stresse ', 'semaine105640', NULL, '2024-07-14 12:05:30', '2024-07-14 12:05:30'),
(203, 27, 9, 'on', 'semaine105640', NULL, '2024-07-14 12:05:30', '2024-07-14 12:05:30'),
(204, 27, 12, 'Très bien ', 'semaine105640', NULL, '2024-07-14 12:05:30', '2024-07-14 12:05:30'),
(205, 28, 1, '5', 'semaine2', NULL, '2024-07-14 12:14:04', '2024-07-14 12:14:04'),
(206, 28, 2, '10', 'semaine2', NULL, '2024-07-14 12:14:04', '2024-07-14 12:14:04'),
(207, 28, 3, '', 'semaine2', NULL, '2024-07-14 12:14:04', '2024-07-14 12:14:04'),
(208, 28, 4, '3', 'semaine2', NULL, '2024-07-14 12:14:04', '2024-07-14 12:14:04'),
(209, 28, 5, '2', 'semaine2', NULL, '2024-07-14 12:14:04', '2024-07-14 12:14:04'),
(210, 28, 6, '1', 'semaine2', NULL, '2024-07-14 12:14:04', '2024-07-14 12:14:04'),
(211, 28, 7, '5', 'semaine2', NULL, '2024-07-14 12:14:04', '2024-07-14 12:14:04'),
(212, 28, 8, 'Orgueil ', 'semaine2', NULL, '2024-07-14 12:14:04', '2024-07-14 12:14:04'),
(213, 28, 9, 'on', 'semaine2', NULL, '2024-07-14 12:14:04', '2024-07-14 12:14:04'),
(214, 28, 11, 'on', 'semaine2', NULL, '2024-07-14 12:14:04', '2024-07-14 12:14:04'),
(215, 28, 12, 'Je n\'ai pas pu échanger avec eux de façon particulière ', 'semaine2', NULL, '2024-07-14 12:14:04', '2024-07-14 12:14:04'),
(216, 28, 13, 'on', 'semaine2', NULL, '2024-07-14 12:14:04', '2024-07-14 12:14:04'),
(217, 28, 14, 'Moins de 30 minutes ', 'semaine2', NULL, '2024-07-14 12:14:04', '2024-07-14 12:14:04'),
(218, 28, 15, 'Quelques soucis au niveau des réactions et des rendus de rapport avant et après les cours ', 'semaine2', NULL, '2024-07-14 12:14:04', '2024-07-14 12:14:04'),
(219, 28, 16, '', 'semaine2', NULL, '2024-07-14 12:14:04', '2024-07-14 12:14:04'),
(220, 28, 17, '', 'semaine2', NULL, '2024-07-14 12:14:04', '2024-07-14 12:14:04'),
(221, 30, 1, '7/7', 'semaine3', NULL, '2024-07-20 23:43:07', '2024-07-20 23:43:07'),
(222, 30, 2, '15/15', 'semaine3', NULL, '2024-07-20 23:43:07', '2024-07-20 23:43:07'),
(223, 30, 3, '1h30', 'semaine3', NULL, '2024-07-20 23:43:07', '2024-07-20 23:43:07'),
(224, 30, 4, '7/7', 'semaine3', NULL, '2024-07-20 23:43:07', '2024-07-20 23:43:07'),
(225, 30, 5, '1/1', 'semaine3', NULL, '2024-07-20 23:43:07', '2024-07-20 23:43:07'),
(226, 30, 6, '1/1', 'semaine3', NULL, '2024-07-20 23:43:07', '2024-07-20 23:43:07'),
(227, 30, 7, '7/7', 'semaine3', NULL, '2024-07-20 23:43:07', '2024-07-20 23:43:07'),
(228, 30, 8, 'La persévérance ', 'semaine3', NULL, '2024-07-20 23:43:07', '2024-07-20 23:43:07'),
(229, 30, 12, 'Concernant Sheila je n’ai aucune nouvelle d’elle quand je l’appelle son numéro ne passe\r\nNoura va bien , sa famille également ', 'semaine3', NULL, '2024-07-20 23:43:07', '2024-07-20 23:43:07'),
(230, 36, 1, '7jours', 'semaine3', NULL, '2024-07-21 09:20:45', '2024-07-21 09:20:45'),
(231, 36, 2, '15h', 'semaine3', NULL, '2024-07-21 09:20:45', '2024-07-21 09:20:45'),
(232, 36, 3, '5h', 'semaine3', NULL, '2024-07-21 09:20:45', '2024-07-21 09:20:45'),
(233, 36, 4, '7 fois ', 'semaine3', NULL, '2024-07-21 09:20:45', '2024-07-21 09:20:45'),
(234, 36, 5, '2 fois', 'semaine3', NULL, '2024-07-21 09:20:45', '2024-07-21 09:20:45'),
(235, 36, 6, '1fois', 'semaine3', NULL, '2024-07-21 09:20:45', '2024-07-21 09:20:45'),
(236, 36, 7, '8 predications', 'semaine3', NULL, '2024-07-21 09:20:45', '2024-07-21 09:20:45'),
(237, 36, 8, 'La libéralité. Donnez sans attendre en retour ', 'semaine3', NULL, '2024-07-21 09:20:45', '2024-07-21 09:20:45'),
(238, 36, 9, 'on', 'semaine3', NULL, '2024-07-21 09:20:45', '2024-07-21 09:20:45'),
(239, 36, 11, 'on', 'semaine3', NULL, '2024-07-21 09:20:45', '2024-07-21 09:20:45'),
(240, 36, 12, 'Ange Christelle est toujours en voyage à Daloa pour ses vacances.\r\nGracia va bien, elle sera présente au culte, elle m\'a dit qu\'elle habite seule.\r\nSarah Ouattara n\'a souvent pas le transport pour venir mais elle va bien.', 'semaine3', NULL, '2024-07-21 09:20:45', '2024-07-21 09:20:45'),
(241, 36, 14, 'RAS', 'semaine3', NULL, '2024-07-21 09:20:45', '2024-07-21 09:20:45'),
(242, 36, 15, 'RAS', 'semaine3', NULL, '2024-07-21 09:20:45', '2024-07-21 09:20:45'),
(243, 36, 16, 'RAS', 'semaine3', NULL, '2024-07-21 09:20:45', '2024-07-21 09:20:45'),
(244, 36, 17, 'RAS', 'semaine3', NULL, '2024-07-21 09:20:45', '2024-07-21 09:20:45'),
(245, 29, 1, '7', 'semaine4', NULL, '2024-07-22 06:35:59', '2024-07-22 06:35:59'),
(246, 29, 2, '7', 'semaine4', NULL, '2024-07-22 06:35:59', '2024-07-22 06:35:59'),
(247, 29, 3, '1', 'semaine4', NULL, '2024-07-22 06:35:59', '2024-07-22 06:35:59'),
(248, 29, 4, '3', 'semaine4', NULL, '2024-07-22 06:35:59', '2024-07-22 06:35:59'),
(249, 29, 5, '1', 'semaine4', NULL, '2024-07-22 06:35:59', '2024-07-22 06:35:59'),
(250, 29, 6, '1', 'semaine4', NULL, '2024-07-22 06:35:59', '2024-07-22 06:35:59'),
(251, 29, 7, '5', 'semaine4', NULL, '2024-07-22 06:35:59', '2024-07-22 06:35:59'),
(252, 29, 8, 'La paix du coeur', 'semaine4', NULL, '2024-07-22 06:35:59', '2024-07-22 06:35:59'),
(253, 29, 9, 'on', 'semaine4', NULL, '2024-07-22 06:35:59', '2024-07-22 06:35:59'),
(254, 29, 12, '1.Tout mes mentors se porte bien par la grâce de Dieu, \r\n\r\n2 les membres de familles de Kader, simplice et michael se porte bien, \r\n3.⁠ j\'ai leur rappel toujours de passer de beaucoup moment de qualités avec Dieu avoir au minimum 1h de prière par jour.\r\n\r\n4.⁠ Michael attend commence la formation de EDM en ligne, \r\nSimplice ma donner comme explication que cest le dimanche ou travail pour son compte alors il commence le yango  a 6:00 et si il a le temp a 10:00 il viens a l\' église, il prie de trouver une bonne personne qui pourra travailler pour lui chaque dimanche pour lui permettre d\'être présent a l Eglise pour le cour de EDM\r\n\r\n5.Mes mentores se bat pour leur finance Kader pour ses montage simplice sur yango et Michael dit qu\'il a pas beaucoup d\'élèves a donné cours dans se temp de vacance de fois je lui viens en aide en cas de besoin matériel ou financière \r\n\r\n6.⁠ simplice m\'a confirmé qu\'il prend ça vie de prière au sérieux.\r\nKader: il a confirmé que sa vie de prière est bonne.\r\nMichael: on se convenu d\'avoir le temps de prière ensemble chaque soir.', 'semaine4', NULL, '2024-07-22 06:35:59', '2024-07-22 06:35:59'),
(255, 18, 1, '5 jours ', 'semaine2', NULL, '2024-07-22 10:41:09', '2024-07-22 10:41:09'),
(256, 18, 2, '15 heures ', 'semaine2', NULL, '2024-07-22 10:41:09', '2024-07-22 10:41:09'),
(257, 18, 3, '2 heures ', 'semaine2', NULL, '2024-07-22 10:41:09', '2024-07-22 10:41:09'),
(258, 18, 4, '6', 'semaine2', NULL, '2024-07-22 10:41:09', '2024-07-22 10:41:09'),
(259, 18, 5, '3 ', 'semaine2', NULL, '2024-07-22 10:41:09', '2024-07-22 10:41:09'),
(260, 18, 6, '3 ', 'semaine2', NULL, '2024-07-22 10:41:09', '2024-07-22 10:41:09'),
(261, 18, 7, '4', 'semaine2', NULL, '2024-07-22 10:41:09', '2024-07-22 10:41:09'),
(262, 18, 8, 'J\'apprends à garder ma joie peu importe les situations.', 'semaine2', NULL, '2024-07-22 10:41:09', '2024-07-22 10:41:09'),
(263, 18, 11, 'on', 'semaine2', NULL, '2024-07-22 10:41:09', '2024-07-22 10:41:09'),
(264, 18, 12, 'Nicole : Ne prend pas mes appels \r\nFlore : Elle va bien à tous les niveaux.\r\nSauf que j\'ai l\'impression qu\'elle est  renfermée.\r\nDaniel : Il ne va pas bien spirituellement ,émotionnellement, financièrement .', 'semaine2', NULL, '2024-07-22 10:41:09', '2024-07-22 10:41:09'),
(265, 31, 1, '5 jours ', 'semaine5', NULL, '2024-07-28 00:46:04', '2024-07-28 00:46:04'),
(266, 31, 2, '11h', 'semaine5', NULL, '2024-07-28 00:46:04', '2024-07-28 00:46:04'),
(267, 31, 3, '2h', 'semaine5', NULL, '2024-07-28 00:46:04', '2024-07-28 00:46:04'),
(268, 31, 4, '4', 'semaine5', NULL, '2024-07-28 00:46:04', '2024-07-28 00:46:04'),
(269, 31, 5, '0', 'semaine5', NULL, '2024-07-28 00:46:04', '2024-07-28 00:46:04'),
(270, 31, 6, '3 fois ', 'semaine5', NULL, '2024-07-28 00:46:04', '2024-07-28 00:46:04'),
(271, 31, 7, '8', 'semaine5', NULL, '2024-07-28 00:46:04', '2024-07-28 00:46:04'),
(272, 31, 8, 'La patience ', 'semaine5', NULL, '2024-07-28 00:46:04', '2024-07-28 00:46:04'),
(273, 31, 10, 'on', 'semaine5', NULL, '2024-07-28 00:46:04', '2024-07-28 00:46:04'),
(274, 31, 11, 'on', 'semaine5', NULL, '2024-07-28 00:46:04', '2024-07-28 00:46:04'),
(275, 31, 12, 'Mes mentorés se portent bien grâce à Dieu \r\n- J\'étais avec Henoc aujourd\'hui, son père vas mieux grâce à Dieu et il sera au culte demain \r\n- Samuel s\'est fait baptisé aujourd\'hui, nous travaillons avec lui pour une vie de prière et de méditation \r\n- Hamed ne vient plus à l\'église et refuse de venir a mes rdv \r\n- Alfred m\'avait informé, qu\'il serait en déplacement le dimanche dernier, ce dimanche il m\'a dit qu\'il serait là mais aussi je crois qu\'il traverse une période trouble et nous y travaillons ensemble.', 'semaine5', NULL, '2024-07-28 00:46:04', '2024-07-28 00:46:04'),
(276, 31, 13, 'on', 'semaine5', NULL, '2024-07-28 00:46:04', '2024-07-28 00:46:04'),
(277, 31, 14, '1h ', 'semaine5', NULL, '2024-07-28 00:46:04', '2024-07-28 00:46:04'),
(278, 31, 15, '', 'semaine5', NULL, '2024-07-28 00:46:04', '2024-07-28 00:46:04'),
(279, 31, 16, '', 'semaine5', NULL, '2024-07-28 00:46:04', '2024-07-28 00:46:04'),
(280, 31, 17, '', 'semaine5', NULL, '2024-07-28 00:46:04', '2024-07-28 00:46:04'),
(281, 31, 1, '5 jours ', 'semaine3', NULL, '2024-08-11 06:19:19', '2024-08-11 06:19:19'),
(282, 31, 2, '12h', 'semaine3', NULL, '2024-08-11 06:19:19', '2024-08-11 06:19:19'),
(283, 31, 3, '2h', 'semaine3', NULL, '2024-08-11 06:19:19', '2024-08-11 06:19:19'),
(284, 31, 4, '6 fois ', 'semaine3', NULL, '2024-08-11 06:19:19', '2024-08-11 06:19:19'),
(285, 31, 5, '0', 'semaine3', NULL, '2024-08-11 06:19:19', '2024-08-11 06:19:19'),
(286, 31, 6, '3 fois ', 'semaine3', NULL, '2024-08-11 06:19:19', '2024-08-11 06:19:19'),
(287, 31, 7, '7', 'semaine3', NULL, '2024-08-11 06:19:19', '2024-08-11 06:19:19'),
(288, 31, 8, 'La maîtrise de soi', 'semaine3', NULL, '2024-08-11 06:19:19', '2024-08-11 06:19:19'),
(289, 31, 10, 'on', 'semaine3', NULL, '2024-08-11 06:19:19', '2024-08-11 06:19:19'),
(290, 31, 12, 'Ils vont tous bien grâce à Dieu ;\r\n- Henoc, a des difficultés à prier et nous y travaillons. Pour la santé de son père ça vas beaucoup mieux.\r\n- Samuel vas bien, il n\'était pas là le dimanche dernier parce qu\'il a fait le culte avec son père mais il sera là ce dimanche par la grâce de Dieu.\r\n- Alfred vas bien, seulement qu\'il évite les programmes de l\'église et j\'ai le sentiment qu\'il s\'éloigne de l\'église mais refuse de Parler.', 'semaine3', NULL, '2024-08-11 06:19:19', '2024-08-11 06:19:19'),
(291, 31, 14, '1h ', 'semaine3', NULL, '2024-08-11 06:19:19', '2024-08-11 06:19:19'),
(292, 31, 15, 'Aucun, nous travaillons pour le début d\'une nouvelle session de formation.\r\nNous prions que les étudiants de la nouvelle session soit motivé.', 'semaine3', NULL, '2024-08-11 06:19:19', '2024-08-11 06:19:19'),
(293, 31, 16, '', 'semaine3', NULL, '2024-08-11 06:19:19', '2024-08-11 06:19:19'),
(294, 31, 17, '', 'semaine3', NULL, '2024-08-11 06:19:19', '2024-08-11 06:19:19');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(200) DEFAULT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `role` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT 'inactif',
  `is_online` tinyint(1) NOT NULL,
  `lastlogged_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_submit_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `mot_de_passe`, `role`, `status`, `is_online`, `lastlogged_at`, `updated_at`, `last_submit_date`) VALUES
(10, 'gborissylvanus@gmail.com', '$2y$10$su6ahX2KImfPiSWNED0cWuWIXFe7Xa1HBm.YW3DaFtGo7SnKJc6Ji', 'administrateur', 'actif', 0, '2024-05-30 06:05:44', NULL, '0000-00-00 00:00:00'),
(13, 'kassiaman01@gmail.com', '$2y$10$9u5/c5XKTwLKwP/WB9zajurTumpwnTgTsx7/uJxGGnQflatvGmmiO', 'administrateur', 'actif', 0, '2024-05-30 21:05:13', NULL, '0000-00-00 00:00:00'),
(18, '0708665302', '$2y$10$goSWsO6Kh8/G/iHNqF01LeQlFLh1HoaL0lhIxNDHRLtZVav2cNhdy', 'auditeur', 'actif', 0, '0000-00-00 00:00:00', NULL, '2024-07-22 10:41:09'),
(20, '0777306709', '$2y$10$ThjeNaSMpl3EqIiSK8p37eG9Lgdgv7.KBN/6JCCFmbY6A4ACafWqu', 'administrateur', 'actif', 0, '2024-06-09 15:06:10', NULL, '0000-00-00 00:00:00'),
(27, '0777097912', '$2y$10$91uc0rVDmXgitb1qA15FXudhUQUMl58aP3D7bDpFJyN0GxTdEsAY2', 'auditeur', 'actif', 0, '0000-00-00 00:00:00', NULL, '2024-07-14 12:05:30'),
(28, '0757297438', '$2y$10$dPkNrrwbydrG9bvXKd5EguGnrqBWJo1AbCg2lqdKjNq9rZgWLBCTu', 'auditeur', 'actif', 0, '2024-06-29 16:06:50', NULL, '2024-07-14 12:14:04'),
(29, '0777870057', '$2y$10$/ntzBIpAtKgdI1Wr1JJRpOEUFNJdmFKONtfH7GGm/D2N8VQ5epX1a', 'auditeur', 'actif', 0, '0000-00-00 00:00:00', NULL, '2024-07-22 06:35:59'),
(30, '0749594855', '$2y$10$NSoJHqNcrh5ArKxHkS4yrOHBGo.Fer9YcE6w6xy24UZaToXKoKmWa', 'auditeur', 'actif', 0, '0000-00-00 00:00:00', NULL, '2024-07-20 23:43:07'),
(31, '0709186759', '$2y$10$PKSwDVowmgeyixjQeeTAT.wi.FxcXYG18JHEopXy7taXZ5pjYY5Ve', 'auditeur', 'actif', 0, '0000-00-00 00:00:00', NULL, '2024-08-11 06:19:19'),
(33, '0749361437', '$2y$10$Yi9I.g.6GVmJuF.1jZfJzeW8ZSu.2vL4EqS7dLTFsGWwdFeGEMpNy', 'auditeur', 'actif', 0, '2024-06-29 16:06:46', NULL, '0000-00-00 00:00:00'),
(35, '0748400679', '$2y$10$VrFWhIf1lHUJDk4wlVeZG.ScZvSWPDFQC8g5/lo/uNWd5ipzpdQxS', 'auditeur', 'actif', 0, '2024-06-29 16:06:32', NULL, '2024-07-06 22:33:21'),
(36, '0748597658', '$2y$10$qSkACbufkQnQW4F6ARHXpOWmLxMasF5WVl/azJEYQ6gh3rs5Tnpmq', 'auditeur', 'actif', 0, '2024-06-29 16:06:26', NULL, '2024-07-21 09:20:45'),
(37, '0701385446', '$2y$10$xMsVBxPBIJeFk0Y3QWRqS.XEHCTYthDbfdYBDduaKLKMZCHlM7fsq', 'auditeur', 'actif', 0, '2024-06-29 16:06:03', NULL, '2024-07-06 22:18:02'),
(41, '0711791158', '$2y$10$3Nj7a.6ptYmPSCOwOK4oPe16E84z2iFxOCn7FldM1su/UrKXQnc8a', 'auditeur', 'actif', 0, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `auditors`
--
ALTER TABLE `auditors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auditors_user_id_foreign` (`user_id`),
  ADD KEY `auditors_niveau_id_foreign` (`niveau_id`);

--
-- Index pour la table `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `niveaux`
--
ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notequestions`
--
ALTER TABLE `notequestions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notequestions_auditor_id_foreign` (`auditor_id`),
  ADD KEY `notequestions_reponse_id_foreign` (`reponse_id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_auditor_id_foreign` (`auditor_id`);

--
-- Index pour la table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `questionnaires`
--
ALTER TABLE `questionnaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questionnaires_discipline_id_foreign` (`discipline_id`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_questionnaire_id_foreign` (`questionnaire_id`);

--
-- Index pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reponses_user_id_foreign` (`user_id`),
  ADD KEY `reponses_question_id_foreign` (`question_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `auditors`
--
ALTER TABLE `auditors`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `disciplines`
--
ALTER TABLE `disciplines`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `niveaux`
--
ALTER TABLE `niveaux`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `notequestions`
--
ALTER TABLE `notequestions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `questionnaires`
--
ALTER TABLE `questionnaires`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `auditors`
--
ALTER TABLE `auditors`
  ADD CONSTRAINT `auditors_niveau_id_foreign` FOREIGN KEY (`niveau_id`) REFERENCES `niveaux` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auditors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notequestions`
--
ALTER TABLE `notequestions`
  ADD CONSTRAINT `notequestions_auditor_id_foreign` FOREIGN KEY (`auditor_id`) REFERENCES `auditors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notequestions_reponse_id_foreign` FOREIGN KEY (`reponse_id`) REFERENCES `reponses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_auditor_id_foreign` FOREIGN KEY (`auditor_id`) REFERENCES `auditors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `questionnaires`
--
ALTER TABLE `questionnaires`
  ADD CONSTRAINT `questionnaires_discipline_id_foreign` FOREIGN KEY (`discipline_id`) REFERENCES `disciplines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_questionnaire_id_foreign` FOREIGN KEY (`questionnaire_id`) REFERENCES `questionnaires` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD CONSTRAINT `reponses_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reponses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
