-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 27 Mai 2019 à 15:48
-- Version du serveur :  5.7.26-0ubuntu0.18.04.1
-- Version de PHP :  7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `smart_leads`
--

--
-- Contenu de la table `activity_area`
--

INSERT INTO `activity_area` (`id`, `activity_area`) VALUES
(3, 'Alsace'),
(4, 'Aquitaine'),
(5, 'Auvergne'),
(6, 'Basse Normandie'),
(7, 'Bourgogne'),
(8, 'Bretagne'),
(9, 'Centre'),
(10, 'Champagne-Ardenne'),
(11, 'Corse'),
(12, 'Franche-Comté'),
(13, 'Haute Normandie'),
(14, 'Ile-de-France'),
(15, 'Languedoc-Roussillon'),
(16, 'Limousin'),
(17, 'Lorraine'),
(18, 'Midi-Pyrénées'),
(19, 'Nord-Pas-de-Calais'),
(20, 'Pays de la Loire'),
(21, 'Picardie'),
(22, 'Poitou-Charentes'),
(23, 'Rhône-Alpes'),
(24, 'Régions d\'outre-mer'),
(25, 'Guadeloupe'),
(26, 'Martinique'),
(27, 'Guyane'),
(28, 'La Réunion'),
(29, 'Mayotte');

--
-- Contenu de la table `colors`
--

INSERT INTO `colors` (`id`, `colors_code`, `colors_survol`, `colors_champ_obligatoire`, `colors_tag_entreprise`, `colors_tag_contact`, `colors_tag_score`) VALUES
(1, '#dc3575', '#dc3575', '#dc3575', '#dc3575', '#dc3575', '#dc3575');

--
-- Contenu de la table `company`
--

INSERT INTO `company` (`id`, `country_id_id`, `company_status_id`, `statut_juridique_id_id`, `company_ca_id`, `user_id_id`, `secteur_activite_id_id`, `category_id_id`, `nb_salarie_id_id`, `company_code`, `company_name`, `company_logo`, `company_category`, `company_address`, `company_comp_address`, `company_postcode`, `company_commentary`, `company_city`, `company_phone`, `company_fax`, `company_website`, `company_creation_date`, `company_siret`, `company_code_naf`, `company_source`, `company_email`, `company_created_at`, `company_updated_at`, `note`, `img_company`) VALUES
(1, NULL, 1, NULL, NULL, 19, 14, NULL, NULL, '54684685', 'Asfatech', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-04 19:05:39', NULL, NULL, NULL, NULL, '2019-05-04 19:05:39', '2019-05-05 17:34:21', NULL, '5ccf1e9dc425f_Illustration-logo.png'),
(2, NULL, 1, 1, 4, 19, 13, NULL, 5, '845648964', 'AsusTek Computers', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-05 17:19:36', '86465486465', NULL, NULL, NULL, '2019-05-05 17:19:36', '2019-05-05 17:19:36', NULL, NULL),
(7, NULL, 1, NULL, NULL, 19, NULL, NULL, NULL, '77565', 'Moovijob', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 12:33:05', NULL, NULL, NULL, NULL, '2019-05-14 12:33:05', '2019-05-27 15:42:42', NULL, NULL),
(8, NULL, 1, NULL, NULL, 19, 14, NULL, NULL, '61270', 'Vinci Eco Drive', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 12:33:05', NULL, NULL, NULL, NULL, '2019-05-14 12:33:05', '2019-05-14 14:59:05', NULL, '5cdad7ba22220_walpaper.jpg'),
(9, NULL, 1, NULL, NULL, 19, NULL, NULL, NULL, '86970', 'WebexpR - Communication Digitale', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:27', NULL, NULL, NULL, NULL, '2019-05-14 14:45:27', '2019-05-14 14:45:27', NULL, NULL),
(10, NULL, 1, NULL, NULL, 17, NULL, NULL, NULL, '63135', 'Alienware Corporation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:27', NULL, NULL, NULL, NULL, '2019-05-14 14:45:27', '2019-05-14 14:45:27', NULL, NULL),
(11, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '75854', 'Morgan Philips Hudson Executive Search', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:27', NULL, NULL, NULL, NULL, '2019-05-14 14:45:27', '2019-05-14 14:45:27', NULL, NULL),
(12, NULL, 1, NULL, NULL, 17, NULL, NULL, NULL, '93784', 'Besight', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:27', NULL, NULL, NULL, NULL, '2019-05-14 14:45:27', '2019-05-14 14:45:27', NULL, NULL),
(13, NULL, 1, NULL, NULL, 19, NULL, NULL, NULL, '4592', 'Micro Star International', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:28', NULL, NULL, NULL, NULL, '2019-05-14 14:45:28', '2019-05-14 14:45:28', NULL, NULL),
(14, NULL, 1, NULL, NULL, 19, NULL, NULL, NULL, '35596', 'TALENTS RH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:28', NULL, NULL, NULL, NULL, '2019-05-14 14:45:28', '2019-05-14 14:45:28', NULL, NULL),
(15, NULL, 1, NULL, NULL, 19, NULL, NULL, NULL, '79880', 'Gentis Recruitment', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:28', NULL, NULL, NULL, NULL, '2019-05-14 14:45:28', '2019-05-14 14:45:28', NULL, NULL),
(16, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '68153', 'Ambulances Plomion & Fils', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:28', NULL, NULL, NULL, NULL, '2019-05-14 14:45:28', '2019-05-14 14:45:28', NULL, NULL),
(17, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '58325', 'blgCloud', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:28', NULL, NULL, NULL, NULL, '2019-05-14 14:45:28', '2019-05-14 14:45:28', NULL, NULL),
(18, NULL, 1, NULL, NULL, 19, NULL, NULL, NULL, '9211', 'Total', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:28', NULL, NULL, NULL, NULL, '2019-05-14 14:45:28', '2019-05-14 14:45:28', NULL, NULL),
(19, NULL, 1, NULL, NULL, 19, NULL, NULL, NULL, '2263', 'FM Logistic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:28', NULL, NULL, NULL, NULL, '2019-05-14 14:45:28', '2019-05-14 14:45:28', NULL, NULL),
(20, NULL, 1, NULL, NULL, 19, NULL, NULL, NULL, '85623', 'Hyatt Regency', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:29', NULL, NULL, NULL, NULL, '2019-05-14 14:45:29', '2019-05-14 14:45:29', NULL, NULL),
(21, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '4281', 'Onli Software Solutions', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:29', NULL, NULL, NULL, NULL, '2019-05-14 14:45:29', '2019-05-14 14:45:29', NULL, NULL),
(22, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '90972', 'talent.io', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:29', NULL, NULL, NULL, NULL, '2019-05-14 14:45:29', '2019-05-14 14:45:29', NULL, NULL),
(23, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '49814', 'HETIC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:29', NULL, NULL, NULL, NULL, '2019-05-14 14:45:29', '2019-05-14 14:45:29', NULL, NULL),
(24, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '87735', 'Commanders Act', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:29', NULL, NULL, NULL, NULL, '2019-05-14 14:45:29', '2019-05-14 14:45:29', NULL, NULL),
(25, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '9355', 'Wanadev', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:30', NULL, NULL, NULL, NULL, '2019-05-14 14:45:30', '2019-05-14 14:45:30', NULL, NULL),
(26, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '61401', 'Bluecoders - the new way to find a tech job', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:30', NULL, NULL, NULL, NULL, '2019-05-14 14:45:30', '2019-05-14 14:45:30', NULL, NULL),
(27, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '64007', 'Yomeva', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:30', NULL, NULL, NULL, NULL, '2019-05-14 14:45:30', '2019-05-14 14:45:30', NULL, NULL),
(28, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '77817', 'Diji', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:30', NULL, NULL, NULL, NULL, '2019-05-14 14:45:30', '2019-05-14 14:45:30', NULL, NULL),
(29, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '71364', 'KONEKT Recrutement IT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:30', NULL, NULL, NULL, NULL, '2019-05-14 14:45:30', '2019-05-14 14:45:30', NULL, NULL),
(30, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '38344', 'Bluecoders', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:30', NULL, NULL, NULL, NULL, '2019-05-14 14:45:30', '2019-05-14 14:45:30', NULL, NULL),
(31, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '79645', 'SARP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:30', NULL, NULL, NULL, NULL, '2019-05-14 14:45:30', '2019-05-14 14:45:30', NULL, NULL),
(32, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '8947', 'SNCF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:30', NULL, NULL, NULL, NULL, '2019-05-14 14:45:30', '2019-05-14 14:45:30', NULL, NULL),
(33, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '57511', 'Linkvalue', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:31', NULL, NULL, NULL, NULL, '2019-05-14 14:45:31', '2019-05-14 14:45:31', NULL, NULL),
(34, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '98019', 'FIFTY TALENTS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:31', NULL, NULL, NULL, NULL, '2019-05-14 14:45:31', '2019-05-14 14:45:31', NULL, NULL),
(35, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '11973', 'EICAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:31', NULL, NULL, NULL, NULL, '2019-05-14 14:45:31', '2019-05-14 14:45:31', NULL, NULL),
(36, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '12696', 'LITESOFT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:31', NULL, NULL, NULL, NULL, '2019-05-14 14:45:31', '2019-05-14 14:45:31', NULL, NULL),
(37, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '56421', 'appKweb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:31', NULL, NULL, NULL, NULL, '2019-05-14 14:45:31', '2019-05-14 14:45:31', NULL, NULL),
(38, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '16235', 'SGS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:31', NULL, NULL, NULL, NULL, '2019-05-14 14:45:31', '2019-05-14 14:45:31', NULL, NULL),
(39, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2670', 'GABOWEB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:31', NULL, NULL, NULL, NULL, '2019-05-14 14:45:31', '2019-05-14 14:45:31', NULL, NULL),
(40, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '48601', 'Lycée Jean Rostand - Chantilly', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:31', NULL, NULL, NULL, NULL, '2019-05-14 14:45:31', '2019-05-14 14:45:31', NULL, NULL),
(41, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '98176', 'Ecole O\'clock', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:31', NULL, NULL, NULL, NULL, '2019-05-14 14:45:31', '2019-05-14 14:45:31', NULL, NULL),
(42, NULL, 1, NULL, NULL, 19, NULL, NULL, NULL, '92791', 'Aquarelle.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:32', NULL, NULL, NULL, NULL, '2019-05-14 14:45:32', '2019-05-14 14:45:32', NULL, NULL),
(43, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '42089', 'agence web AntheDesign', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:32', NULL, NULL, NULL, NULL, '2019-05-14 14:45:32', '2019-05-14 14:45:32', NULL, NULL),
(44, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '43194', 'Agora', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-14 14:45:32', NULL, NULL, NULL, NULL, '2019-05-14 14:45:32', '2019-05-14 14:45:32', NULL, NULL),
(45, NULL, 1, NULL, NULL, 2, 18, NULL, NULL, '4563541', 'efsfes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-20 14:00:40', NULL, NULL, NULL, NULL, '2019-05-20 14:00:40', '2019-05-20 14:00:40', NULL, NULL);

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `user_id_id`, `company_id_id`, `job_id_id`, `participation_id_id`, `metier_id_id`, `pouvoir_id_id`, `contact_code_client`, `contact_genre`, `contact_prenom`, `contact_nom`, `contact_date_creation`, `contact_mis_ajour`, `img_contact`, `contact_statut`, `contact_niv_decision`, `contact_date_naissance`, `contact_metier`, `contact_tel_mobile`, `contact_tel_fixe`, `contact_tel_standard`, `contact_email`, `contact_pre_verifie`, `contact_verifie`, `contact_adresse_linkedin`, `contact_adresse_facebook`, `contact_adresse_twitter`, `contact_ope_source`, `contact_commentaire`, `commercial_id`) VALUES
(35, NULL, 7, NULL, NULL, NULL, NULL, 75411, 1, 'Emilie', 'KIEFFER', '2019-05-14 14:45:26', '2019-05-14 14:45:26', NULL, 1, NULL, NULL, 'Sourcing & Campus Officer', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(36, NULL, 8, NULL, NULL, NULL, NULL, 28156, 1, 'Maximilien', 'Thomine', '2019-05-14 14:45:26', '2019-05-14 14:45:26', NULL, 1, NULL, NULL, 'Membre de l\'association Vinci Eco Drive', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(37, NULL, 9, NULL, NULL, NULL, NULL, 8400, 1, 'Jérémy', 'Dufroy', '2019-05-14 14:45:27', '2019-05-14 14:45:27', NULL, 1, NULL, NULL, 'Intégrateur Web', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, NULL, 10, NULL, NULL, NULL, NULL, 14952, 1, 'Théo', 'Lloret', '2019-05-14 14:45:27', '2019-05-14 14:45:27', NULL, 1, NULL, NULL, 'Digital Marketing Executive', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, NULL, 11, NULL, NULL, NULL, NULL, 64875, 1, 'Karen', 'Elbaz', '2019-05-14 14:45:27', '2019-05-14 14:45:27', NULL, 1, NULL, NULL, 'Consultante Senior IT & Digital Practice', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, NULL, 12, NULL, NULL, NULL, NULL, 93152, 1, 'Wilfrid', 'DE CONTI', '2019-05-14 14:45:27', '2019-05-14 14:45:27', NULL, 1, NULL, NULL, 'Co-fondateur & Responsable Marketing', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, NULL, 9, NULL, NULL, NULL, NULL, 93672, 1, 'Anaïs', 'Salis', '2019-05-14 14:45:28', '2019-05-14 14:45:28', NULL, 1, NULL, NULL, 'Chef de projet ', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17),
(42, NULL, 13, NULL, NULL, NULL, NULL, 9610, 1, 'Anne-France', 'Lambert', '2019-05-14 14:45:28', '2019-05-14 14:45:28', NULL, 1, NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(43, NULL, 14, NULL, NULL, NULL, NULL, 33283, 1, 'Marine', 'Lasfargues', '2019-05-14 14:45:28', '2019-05-14 14:45:28', NULL, 1, NULL, NULL, 'Chargée de comptes IT', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(44, NULL, 9, NULL, NULL, NULL, NULL, 57766, 1, 'Anne-Sophie', 'Wilmort', '2019-05-14 14:45:28', '2019-05-14 14:45:28', NULL, 1, NULL, NULL, 'Chef de projet', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(45, NULL, 15, NULL, NULL, NULL, NULL, 68427, 1, 'Asmaa', 'Benjelloun', '2019-05-14 14:45:28', '2019-05-14 14:45:28', NULL, 1, NULL, NULL, 'IT Talent Acquisition Associate', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(46, NULL, 9, NULL, NULL, NULL, NULL, 30477, 1, 'Grégory', 'Supiot', '2019-05-14 14:45:28', '2019-05-14 14:45:28', NULL, 1, NULL, NULL, 'Développeur web front-end', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(47, NULL, 9, NULL, NULL, NULL, NULL, 55682, 1, 'Yoann', 'Clement', '2019-05-14 14:45:28', '2019-05-14 14:45:28', NULL, 1, NULL, NULL, 'Intégrateur Web', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(48, NULL, 16, NULL, NULL, NULL, NULL, 64040, 1, 'Joffrey', 'PLOMION', '2019-05-14 14:45:28', '2019-05-14 14:45:28', NULL, 1, NULL, NULL, 'Gestion informatique', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, NULL, 9, NULL, NULL, NULL, NULL, 75608, 1, 'Cheyenne', 'Pino', '2019-05-14 14:45:28', '2019-05-14 14:45:28', NULL, 1, NULL, NULL, 'Intégrateur Développeuse Web', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, NULL, 17, NULL, NULL, NULL, NULL, 72539, 1, 'Yohan', 'Cauvry', '2019-05-14 14:45:28', '2019-05-14 14:45:28', NULL, 1, NULL, NULL, 'Intégrateur Web', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, NULL, 18, NULL, NULL, NULL, NULL, 83075, 1, 'Maëlle', 'RIVIERE', '2019-05-14 14:45:28', '2019-05-14 14:45:28', NULL, 1, NULL, NULL, 'Apprentie Ingénieure en Prévention des Risques', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(52, NULL, 19, NULL, NULL, NULL, NULL, 90764, 1, 'Catherine', 'LE CRUGUEL', '2019-05-14 14:45:28', '2019-05-14 14:45:28', NULL, 1, NULL, NULL, 'Responsable de département', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(53, NULL, 20, NULL, NULL, NULL, NULL, 88049, 1, 'Florian', 'Perigault', '2019-05-14 14:45:29', '2019-05-14 14:45:29', NULL, 1, NULL, NULL, 'Guest Relation F&B', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(54, NULL, 13, NULL, NULL, NULL, NULL, 44592, 1, 'Maxime', 'FUZELIER', '2019-05-14 14:45:29', '2019-05-14 14:45:29', NULL, 1, NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, NULL, 21, NULL, NULL, NULL, NULL, 32088, 1, 'Clarice', 'Boname', '2019-05-14 14:45:29', '2019-05-14 14:45:29', NULL, 1, NULL, NULL, 'Scrum Master', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, NULL, 22, NULL, NULL, NULL, NULL, 9268, 1, 'Sandra', 'Barazzutti', '2019-05-14 14:45:29', '2019-05-14 14:45:29', NULL, 1, NULL, NULL, 'Talent Acquisition Recruiter', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, NULL, 23, NULL, NULL, NULL, NULL, 85381, 1, 'Damien', 'JORDAN', '2019-05-14 14:45:29', '2019-05-14 14:45:29', NULL, 1, NULL, NULL, 'Responsable marketing et communications', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, NULL, 9, NULL, NULL, NULL, NULL, 70343, 1, 'Aurélien', 'GUILLIET', '2019-05-14 14:45:29', '2019-05-14 14:45:29', NULL, 1, NULL, NULL, 'UX Designer et Développeur front-end ', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, NULL, 9, NULL, NULL, NULL, NULL, 60474, 1, 'Valentin', 'BARTHEL', '2019-05-14 14:45:29', '2019-05-14 14:45:29', NULL, 1, NULL, NULL, 'Président - Co-Fondateur de WebexpR / Direction Commerciale & Administrative', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, NULL, 24, NULL, NULL, NULL, NULL, 46982, 1, 'Augustin', 'FERRARI', '2019-05-14 14:45:29', '2019-05-14 14:45:29', NULL, 1, NULL, NULL, 'Fullstack Developer', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, NULL, 9, NULL, NULL, NULL, NULL, 73790, 1, 'Lucas', 'ESTARDIER', '2019-05-14 14:45:29', '2019-05-14 14:45:29', NULL, 1, NULL, NULL, 'Chargé de clientèle junior', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, NULL, 9, NULL, NULL, NULL, NULL, 77840, 1, 'Pierre', 'MERMET', '2019-05-14 14:45:30', '2019-05-14 14:45:30', NULL, 1, NULL, NULL, 'Responsable Agence Paris', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, NULL, 9, NULL, NULL, NULL, NULL, 5375, 1, 'Angéline', 'Fouquet', '2019-05-14 14:45:30', '2019-05-14 14:45:30', NULL, 1, NULL, NULL, 'Assistante Chef de Projet', NULL, NULL, NULL, 'angel-fouquet@hotmail.fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, NULL, 25, NULL, NULL, NULL, NULL, 38877, 1, 'Thibaut', 'BLAIRON', '2019-05-14 14:45:30', '2019-05-14 14:45:30', NULL, 1, NULL, NULL, 'Développeur web', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, NULL, 26, NULL, NULL, NULL, NULL, 86907, 1, 'Ambroise', 'Bréant', '2019-05-14 14:45:30', '2019-05-14 14:45:30', NULL, 1, NULL, NULL, 'Business Manager & Coach PHP ', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, NULL, 27, NULL, NULL, NULL, NULL, 13739, 1, 'Abdelkader', 'Lagraa', '2019-05-14 14:45:30', '2019-05-14 14:45:30', NULL, 1, NULL, NULL, 'Directeur', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, NULL, 28, NULL, NULL, NULL, NULL, 53981, 1, 'Thomas', 'Bouriel', '2019-05-14 14:45:30', '2019-05-14 14:45:30', NULL, 1, NULL, NULL, 'Associé', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, NULL, 29, NULL, NULL, NULL, NULL, 97667, 1, 'Laurent', 'GARILHE', '2019-05-14 14:45:30', '2019-05-14 14:45:30', NULL, 1, NULL, NULL, 'Co-fondateur Konekt', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, NULL, 30, NULL, NULL, NULL, NULL, 73678, 1, 'Simon', 'Lauvin', '2019-05-14 14:45:30', '2019-05-14 14:45:30', NULL, 1, NULL, NULL, 'Business Developer & Team Builder (PHP)', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, NULL, 31, NULL, NULL, NULL, NULL, 77919, 1, 'Minart', 'Jean-Marie', '2019-05-14 14:45:30', '2019-05-14 14:45:30', NULL, 1, NULL, NULL, 'Directeur d\'Agence', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, NULL, 32, NULL, NULL, NULL, NULL, 84991, 1, 'Mickael', 'LECOCQ', '2019-05-14 14:45:30', '2019-05-14 14:45:30', NULL, 1, NULL, NULL, 'Étudiant en alternance', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, NULL, 29, NULL, NULL, NULL, NULL, 3542, 1, 'Cédric', 'Ansaldi', '2019-05-14 14:45:31', '2019-05-14 14:45:31', NULL, 1, NULL, NULL, 'Co-fondateur Konekt - IT Recruiter', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, NULL, 33, NULL, NULL, NULL, NULL, 67357, 1, 'Bélinda', 'Seauve', '2019-05-14 14:45:31', '2019-05-14 14:45:31', NULL, 1, NULL, NULL, 'HR Partner - Talent Management & Formation Tech ', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, NULL, 34, NULL, NULL, NULL, NULL, 10836, 1, 'Charaf', 'Ouhab', '2019-05-14 14:45:31', '2019-05-14 14:45:31', NULL, 1, NULL, NULL, 'Talents Manager', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, NULL, 35, NULL, NULL, NULL, NULL, 57614, 1, 'Evan', 'BOTELHO', '2019-05-14 14:45:31', '2019-05-14 14:45:31', NULL, 1, NULL, NULL, 'Étudiant', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, NULL, 36, NULL, NULL, NULL, NULL, 65035, 1, 'Dylan', 'NOALLY', '2019-05-14 14:45:31', '2019-05-14 14:45:31', NULL, 1, NULL, NULL, 'Analyste développeur junior', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, NULL, 37, NULL, NULL, NULL, NULL, 22826, 1, 'Valentin', 'REGNIER', '2019-05-14 14:45:31', '2019-05-14 14:45:31', NULL, 1, NULL, NULL, 'Fondateur & Développeur web ', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, NULL, 38, NULL, NULL, NULL, NULL, 98777, 1, 'Alexis', 'Gousset', '2019-05-14 14:45:31', '2019-05-14 14:45:31', NULL, 1, NULL, NULL, 'Technicien laboratoire ', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, NULL, 39, NULL, NULL, NULL, NULL, 44570, 1, 'Nicolas', 'PESTANA', '2019-05-14 14:45:31', '2019-05-14 14:45:31', NULL, 1, NULL, NULL, 'Fondateur', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, NULL, 40, NULL, NULL, NULL, NULL, 23626, 1, 'Jean-Bernard', 'DODEMONT', '2019-05-14 14:45:31', '2019-05-14 14:45:31', NULL, 1, NULL, NULL, 'Professeur d\'informatique', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, NULL, 41, NULL, NULL, NULL, NULL, 85956, 1, 'Marjorie', 'DI PLACIDO PIETRI ⚡️', '2019-05-14 14:45:31', '2019-05-14 14:45:31', NULL, 1, NULL, NULL, 'Responsable RH et Recrutement', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, NULL, 42, NULL, NULL, NULL, NULL, 33500, 1, 'Sofiane', 'AZI', '2019-05-14 14:45:32', '2019-05-14 14:45:32', NULL, 1, NULL, NULL, 'Stagiaire en développement de programmes', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(83, NULL, 43, NULL, NULL, NULL, NULL, 18136, 1, 'Marc', 'Iguenane', '2019-05-14 14:45:32', '2019-05-14 14:45:32', NULL, 1, NULL, NULL, 'Développeur web & Chef de projet junior', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, NULL, 9, NULL, NULL, NULL, NULL, 94031, 1, 'Thomas', 'Martin', '2019-05-14 14:45:32', '2019-05-14 14:45:32', NULL, 1, NULL, NULL, 'Développeur Full Stack', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, NULL, 44, NULL, NULL, NULL, NULL, 43264, 1, 'Adnane', 'Aliouate', '2019-05-14 14:45:32', '2019-05-14 14:45:32', NULL, 1, NULL, NULL, 'Manutentionnaire', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, NULL, 9, NULL, NULL, NULL, NULL, 58561, 1, 'Romain', 'SUSSEST', '2019-05-14 14:45:32', '2019-05-14 14:45:32', NULL, 1, NULL, NULL, 'Développeur Web', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Contenu de la table `nb_salary`
--

INSERT INTO `nb_salary` (`id`, `salary_libelle`) VALUES
(1, '0 à 50'),
(2, '50 à 100'),
(3, '100 à 250'),
(4, ' plus de 250');

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`id`, `user_id`, `categorie_note_id`, `priorite_note_id`, `echeance_note_id`, `title`, `date_creation`, `date_echeance`, `rel_type`, `rappel_email`, `description`, `rel_id`) VALUES
(1, 1, 2, 3, 1, 'le pireeeeee nul', '2019-05-14 00:00:00', '2019-05-14 00:00:00', 'contact', 0, '<p><strong>sah quel plaisir pd</strong></p>', 5);

--
-- Contenu de la table `operation`
--

INSERT INTO `operation` (`id`, `user_id_id`, `type_operation_id`, `operation_author_id`, `operation_name`, `operation_relance`, `operation_code`, `operation_object`, `operation_url`, `operation_type`, `operation_img_haut`, `operation_img_lateral`, `operation_genre`, `operation_prenom`, `operation_metier`, `operation_fonction`, `operation_tel`, `operation_fixe`, `operation_email`, `operation_photo`, `operation_linkedin`, `operation_newsletter`, `operation_offres_commerciales`, `operation_envoi_date`, `operation_date_cloture`, `operation_note`, `operation_statut`, `operation_cree`, `send_email_detail`) VALUES
(11, 2, 1, 1, 'Grand jeu concours 50 ans HAFA', 1, '26565', 'HAFA fêtes ses 50 ans !', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-29 00:00:00', '2019-05-31 00:00:00', NULL, 1, '2019-05-01 00:00:00', NULL),
(12, 1, 2, 1, 'WebExpert', 10, '12349647', 'Concours', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-15 00:00:00', '2019-05-31 00:00:00', 'Concours Web', 0, '2019-05-15 00:00:00', NULL),
(13, 20, NULL, 1, 'Concours Licence', 22, '1546', 'Licence', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-21 00:00:00', '2020-01-21 00:00:00', 'Licence', 0, '2019-05-21 11:43:12', NULL),
(14, 2, NULL, 1, 'Opération 24h Du Mans 2019', 10, '1546', 'Grand Jeu 24H du Mans', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-15 00:00:00', '2019-06-18 00:00:00', NULL, 0, '2019-05-21 11:43:13', NULL);

--
-- Contenu de la table `parameter`
--

INSERT INTO `parameter` (`id`, `parameter_activity_id`, `param_graphstyle_id`, `param_cat_id`, `param_nb_employer_id`, `param_ca_id`, `param_last_ca_id`, `param_user_id`, `param_operation_id`, `param_type_site_id`, `param_object_id`, `param_cible_id`, `param_comportement_id`, `param_company_id`, `param_nom_appli`, `param_adr`, `param_compl`, `param_ville`, `param_zip`, `param_pays`, `param_tel`, `param_logo`, `param_fax`, `param_email`, `param_email_alert`, `param_email_contact`, `img_parameter`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Smart Leads', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Contenu de la table `parameter_company_ca`
--

INSERT INTO `parameter_company_ca` (`id`, `libelle`, `ordre`) VALUES
(1, '0 à 5', 10),
(2, '5 à 10', 4),
(3, '10 à 15', 6),
(4, '15 à 20', 8),
(5, 'plus de 20', 3),
(7, 'Chiffre d\'affaire', 1);

--
-- Contenu de la table `parameter_company_effectifs`
--

INSERT INTO `parameter_company_effectifs` (`id`, `libelle`, `ordre`) VALUES
(1, '1 à 15', 10),
(2, '15 à 25', 8),
(3, '25 à 50', 3),
(4, '50 à 250', 4),
(5, ' plus 250', 5);

--
-- Contenu de la table `parameter_company_secteur`
--

INSERT INTO `parameter_company_secteur` (`id`, `libelle`) VALUES
(1, 'Agriculture, sylviculture et pêche\r\n'),
(2, 'Industries extractives\r\n'),
(3, 'Industrie manufacturière\r\n'),
(4, 'Production et distribution d\'électricité, de gaz, de vapeur et d\'air conditionné\r\n'),
(5, 'Secteur 5Production et distribution d\'eau ; assainissement, gestion des déchets et dépollution\r\n'),
(6, 'Construction\r\n'),
(7, 'Commerce ; réparation d\'automobiles et de motocycles\r\n'),
(8, 'Transports et entreposage\r\n'),
(9, 'Hébergement et restauration\r\n'),
(10, 'Information et communication\r\n'),
(11, 'Activités financières et d\'assurance\r\n'),
(12, 'Activités immobilières\r\n'),
(13, 'Activités spécialisées, scientifiques et techniques\r\n'),
(14, 'Activités de services administratifs et de soutien\r\n'),
(15, 'Administration publique\r\n'),
(16, 'Enseignement\r\n'),
(17, 'Santé humaine et action sociale\r\n'),
(18, 'Arts, spectacles et activités récréatives\r\n'),
(19, 'Autres activités de services\r\n'),
(20, 'Activités des ménages en tant qu\'employeurs ; activités indifférenciées des ménages en tant que producteurs de biens et services pour usage propre\r\n'),
(21, 'Activités extra-territoriales\r\n');

--
-- Contenu de la table `parameter_company_statut`
--

INSERT INTO `parameter_company_statut` (`id`, `libelle`, `color`) VALUES
(1, 'Client', '#00B900'),
(2, 'Inactif', '#CECECE'),
(3, 'Piste', '#CECECE'),
(4, 'Prospect', '#FFA200');

--
-- Contenu de la table `parameter_company_statut_juridique`
--

INSERT INTO `parameter_company_statut_juridique` (`id`, `libelle`, `ordre`) VALUES
(1, 'SA', 2),
(2, 'SARL', 3),
(3, 'SSII', 1);

--
-- Contenu de la table `parameter_contact_metier`
--

INSERT INTO `parameter_contact_metier` (`id`, `libelle`, `ordre`) VALUES
(1, 'Maçon', 3),
(2, 'Peintre', 4),
(3, 'Boulanger', 1),
(4, 'Technicien de surface', 2);

--
-- Contenu de la table `parameter_contact_pouvoir`
--

INSERT INTO `parameter_contact_pouvoir` (`id`, `libelle`) VALUES
(1, 'Manager'),
(2, 'Chef de section'),
(3, 'Directeur de pole'),
(4, 'Directeur commercial');

--
-- Contenu de la table `parameter_note_categorie`
--

INSERT INTO `parameter_note_categorie` (`id`, `libelle`, `color`) VALUES
(1, 'Devis', NULL),
(2, 'Facture', NULL),
(3, 'Rendez-vous', NULL);

--
-- Contenu de la table `parameter_note_echeance`
--

INSERT INTO `parameter_note_echeance` (`id`, `libelle`) VALUES
(1, '15 min avant'),
(2, '30 min avant'),
(3, '1h avant'),
(4, '2h avant'),
(5, '4h avant'),
(6, '1 journée avant');

--
-- Contenu de la table `parameter_note_priorite`
--

INSERT INTO `parameter_note_priorite` (`id`, `libelle`, `color`) VALUES
(1, 'Normal', NULL),
(2, 'Important', NULL),
(3, 'Critique', NULL);

--
-- Contenu de la table `parameter_operation`
--

INSERT INTO `parameter_operation` (`id`, `btn_interesse`) VALUES
(1, 'je ne suis pas intéressé');

--
-- Contenu de la table `parameter_team_departement`
--

INSERT INTO `parameter_team_departement` (`id`, `libelle`) VALUES
(3, 'Alsace'),
(4, 'Aquitaine'),
(5, 'Auvergne'),
(6, 'Basse Normandie'),
(7, 'Bourgogne'),
(8, 'Bretagne'),
(9, 'Centre'),
(10, 'Champagne-Ardenne'),
(11, 'Corse'),
(12, 'Franche-Comté'),
(13, 'Haute Normandie'),
(14, 'Ile-de-France'),
(15, 'Languedoc-Roussillon'),
(16, 'Limousin'),
(17, 'Lorraine'),
(18, 'Midi-Pyrénées'),
(19, 'Nord-Pas-de-Calais'),
(20, 'Pays de la Loire'),
(21, 'Picardie'),
(22, 'Poitou-Charentes'),
(23, 'Rhône-Alpes'),
(24, 'Régions d\'outre-mer'),
(25, 'Guadeloupe'),
(26, 'Martinique'),
(27, 'Guyane'),
(28, 'La Réunion'),
(29, 'Mayotte');

--
-- Contenu de la table `parameter_team_zone`
--

INSERT INTO `parameter_team_zone` (`id`, `libelle`) VALUES
(1, 'Nord'),
(2, 'Est'),
(3, 'Sud'),
(4, 'Ouest');

--
-- Contenu de la table `postes`
--

INSERT INTO `postes` (`id`, `company_id_id`, `metier_id_id`, `pouvoir_id_id`, `user_id_id`, `postes_date_creation`, `postes_mis_ajour`, `postes_statut`, `postes_metier`, `postes_tel_fixe`, `postes_tel_standard`, `postes_commentaire`, `contact_id`) VALUES
(9, 1, 2, 2, 1, '2019-05-13 06:52:25', '2019-05-13 06:52:25', 0, 'test', '0670107139', NULL, 'sah quel plaisir', 3),
(10, 2, 4, 1, 1, '2019-05-13 07:06:03', '2019-05-13 07:06:03', 0, 'twittos', NULL, NULL, 'sah quel plaisir', 5),
(11, 8, 3, 2, 2, '2019-05-14 12:44:55', '2019-05-14 12:44:55', 0, 'Membre de l\'association Vinci Eco Drive', NULL, NULL, NULL, 28),
(12, 2, 4, 1, 1, '2019-05-14 14:43:00', '2019-05-14 14:43:00', 0, 'twittos', NULL, NULL, 'sah quel plaisir', 5),
(13, 1, 2, 2, 1, '2019-05-20 13:59:30', '2019-05-20 13:59:30', 0, 'test', '0670107139', NULL, 'sah quel plaisir', 3),
(14, 1, 2, 2, 1, '2019-05-21 23:03:23', '2019-05-21 23:03:23', 0, 'test', '0670107139', NULL, 'sah quel plaisir', 3);

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `libelle`, `code`) VALUES
(1, 'Commercial', '4'),
(2, 'Directeur Commercial', '2'),
(3, 'Super Administrateur', '3'),
(5, 'Responsable d\'équipe Commerciale', '5'),
(6, 'Administrateur', '6');

--
-- Contenu de la table `statut_juridique`
--

INSERT INTO `statut_juridique` (`id`, `label`) VALUES
(1, 'SA'),
(2, 'SARL'),
(3, 'SSII');

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `role_id`, `departement_id`, `responsable_id`, `user_last_name`, `user_first_name`, `user_password`, `user_email`, `user_code`, `user_gender`, `user_created_at`, `user_update_at`, `user_status`, `user_dob`, `user_function`, `user_phone`, `user_fixe`, `user_lkd`, `user_facebook`, `user_twitter`, `user_annotation`, `user_arrival_date`, `user_quit_date`, `reset_password_token`, `img_url`) VALUES
(1, 2, 20, NULL, 'Thomas', 'Martin', '/5mey9c2RE5tNGclqqicDvM+MjAlO9FpHRZJnFM1n4X5iQta4x7yQX6DFatoJc9BfkFOFzHS3oFzHLFO563SGw==', 't.martin860@gmail.com', 1231, 1, '2019-04-17 00:00:00', '2019-05-27 15:07:47', 1, '2014-10-10 00:00:00', 'test update cahngement form', 606060606, 505050505, NULL, NULL, NULL, NULL, NULL, NULL, '8275ce3ea0e3c2a9', '5cebe1233ed43_laravel.png'),
(2, 1, 22, 1, 'Fuzelier', 'Maxime', 'mbkb0RRNgEafeWCk5ZPvW7g7rwqZaHeOovWOFkhm5aEPDZpjifCGARRlax5zOH+e1XfppGAY/cdU4NYL5zI9rg==', 'jminart@webexpr.fr', 68254, 1, '2019-05-13 14:22:17', '2019-05-13 14:22:17', 1, '1997-01-21 00:00:00', 'Dev', 750370327, 680025105, 'ffu', 'Maxime Fuzelier', 'Maxime Fuzelier', 'test', '2010-11-24 00:00:00', '2020-11-21 00:00:00', NULL, NULL),
(14, 1, 8, 1, 'Iguenane', 'Marc', 'TPFw5EsYQVqlwMePsjG2gbKncH9+cxzRSdCFqqDbFbnpWr7++p/77J4Iyx1IEOyMWXHsGMOpJ1yL6x42FYDj1g==', 'roger@rabbit@gmail.com', 123456789, 1, '2019-05-19 21:56:10', '2019-05-19 21:56:10', 1, '1997-01-21 00:00:00', 'Dev', 680025105, 251432621, 'Marc Iguenane', 'Marc Iguenane', 'Marc Iguenane', 'qsdqsd', '1998-01-21 00:00:00', '2020-01-21 00:00:00', NULL, NULL),
(17, 1, 23, 1, 'Minart', 'Jean-Emile', 'OH982lBnHPk4N1Sd5E2LyLL/am9mjqDMhU0EiYNeFQrmIh2mf4XQCYxbFX8FtgXtu6vmjm/iVnZMoMXvKCvozw==', 'j-em@outlook.fr', 45967895, 1, '2019-05-19 22:36:10', '2019-05-19 22:36:10', 1, '1998-02-28 00:00:00', 'dev', 680025105, 251432621, 'Minart', 'Minart', 'Minart', 'Aucunes remarques', '2010-03-21 00:00:00', '2020-04-21 00:00:00', NULL, NULL),
(19, 1, 9, 14, 'Dumas', 'Franck', 'lgEXvF20n7QyOQhqkcJA6ZstZHtiaKqr3WQSyOXM+vGznqMQEq75XdfJlaqVD+szudgNzZcAsXLTUalSijoz0g==', 'franck@toto.fr', 123987654, 1, '2019-05-19 23:21:24', '2019-05-19 23:21:24', 1, '1997-01-21 00:00:00', 'dev', 344213625, 344213625, 'Dumas', 'Dumas', 'Dumas', 'Dumas', '1998-01-21 00:00:00', '1999-01-21 00:00:00', NULL, NULL),
(20, 1, 7, 1, 'Azi', 'Sofiane', '', 'azi.sofiane@hotmail.fr', 123456789, 1, '2019-05-21 00:00:00', '2019-05-21 00:00:00', 1, NULL, '', 344213625, 344213625, NULL, NULL, NULL, NULL, NULL, NULL, '6975ce3ea87a7374', NULL),
(21, 1, 6, 2, 'Chataigner', 'Pascal', 'FU7ZMW3xjiVmuydPcFIaWZEMosrl8G+pK8K7JyWm+KlQYvVir7onmkr0x7sRmq/RsXb28898wb8vA+Nph9MxqA==', 'p.chataigner@orange.fr', 123456789, 1, '2019-05-08 00:00:00', '2019-05-15 00:00:00', 1, '2019-05-06 00:00:00', '', 344213625, 311243625, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
