-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 21, 2021 at 06:28 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(2, 'Tracey Wiegandd', 'jose15@conroy.com', '082156419140', '41806 Zola Greens\r\nJoanniebury, PA 64773', '2021-12-08 06:11:16', '2021-12-16 05:57:42'),
(3, 'Mrs. Lauriane Schinner V', 'ycole@howe.com', '08212752959', '53836 Harvey Spring\nPort Orvilleborough, SC 60242-0477', '2021-12-08 06:11:16', '2021-12-08 06:11:16'),
(4, 'Jeffry Haag', 'torp.dawson@gerhold.com', '082185394382', '18410 Cynthia Grove\nJoneshaven, OK 08420', '2021-12-08 06:11:16', '2021-12-08 06:11:16'),
(5, 'Darwin Hagenes', 'darryl.kub@fritsch.com', '082168439424', '623 Rowe Bridge Suite 397\nEast Vanton, OH 30038-6798', '2021-12-08 06:11:16', '2021-12-08 06:11:16'),
(6, 'Barney Tillman DDS', 'kris.vita@klein.com', '082141318814', '8530 Rogelio Mountain Suite 648\nWest Ansleyhaven, TX 10330', '2021-12-08 06:11:16', '2021-12-08 06:11:16'),
(7, 'Dr. Kurtis Ortiz', 'lang.ross@beier.info', '08218246672', '54736 Giovani Spurs\nPetrafurt, AL 46125-9560', '2021-12-08 06:11:16', '2021-12-08 06:11:16'),
(8, 'Janick Hoppe', 'victor.kreiger@johnson.com', '082129079999', '527 Roberta Vista Suite 146\nSouth Ezekiel, MD 05796-4491', '2021-12-08 06:11:16', '2021-12-08 06:11:16'),
(9, 'Prof. Maria Gleason MD', 'caterina.keeling@hotmail.com', '082153273943', '387 Anthony Cape\nEast Kayceeside, FL 19661-6689', '2021-12-08 06:11:16', '2021-12-08 06:11:16'),
(10, 'Vern Kautzer', 'bernier.velma@gmail.com', '082125846618', '9064 Schaden Branch\nNorth Lavadafurt, ND 62703', '2021-12-08 06:11:16', '2021-12-08 06:11:16'),
(11, 'Prof. Verla Tillman II', 'vladimir.stroman@roberts.biz', '0821460875', '625 Keebler Manors Suite 944\nNorth Hassan, AL 89333-9238', '2021-12-08 06:11:16', '2021-12-08 06:11:16'),
(12, 'Mrs. Zena Simonis IV', 'mitchell.vena@beatty.com', '082177473186', '6592 Zieme Skyway Suite 834\nEast Reanna, NY 51087', '2021-12-08 06:11:16', '2021-12-08 06:11:16'),
(13, 'Mr. Martin Will', 'adrienne19@hotmail.com', '082173299125', '45161 Reina Walks\nLake Conor, DC 28634', '2021-12-08 06:11:16', '2021-12-08 06:11:16'),
(15, 'Ms. Jacinthe Rippin', 'ebert.francesca@simonis.com', '08212381457', '854 Mckenzie Vista\nWeberside, NM 35168', '2021-12-08 06:11:16', '2021-12-08 06:11:16'),
(16, 'Prof. Luther Carroll Sr.', 'nikolaus.verlie@hackett.com', '08212613269', '7408 Pacocha Mission\nWest Jon, NM 95331-6471', '2021-12-08 06:11:16', '2021-12-08 06:11:16'),
(18, 'Keira Schamberger', 'cpowlowski@mcclure.org', '082168919624', '451 Schultz Spur\nZulaufmouth, WY 14507', '2021-12-08 06:11:16', '2021-12-08 06:11:16'),
(19, 'Mauricio Kuhic', 'bradford.mitchell@gmail.com', '082148869892', '93737 Euna Dale Apt. 159\nHarrisbury, RI 19610', '2021-12-08 06:11:16', '2021-12-08 06:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isbn` int(11) NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `publisher_id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `catalog_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `isbn`, `title`, `year`, `publisher_id`, `author_id`, `catalog_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(3, 86465001, 'Dr. Brock Bergnaum Sr.', 2013, 2, 11, 13, 20, 18739, '2021-12-09 02:50:10', '2021-12-09 02:50:10'),
(4, 440294191, 'Francisca Schaden', 2021, 10, 15, 1, 11, 14640, '2021-12-09 02:50:10', '2021-12-09 02:50:10'),
(5, 280188256, 'Virgie Jakubowski IV', 2021, 12, 15, 1, 11, 10931, '2021-12-09 02:50:10', '2021-12-09 02:50:10'),
(6, 579310237, 'Carli Volkman', 2007, 15, 15, 20, 18, 15769, '2021-12-09 02:50:10', '2021-12-09 02:50:10'),
(7, 706925458, 'Yasmine Hamill', 1981, 8, 3, 16, 19, 19673, '2021-12-09 02:50:10', '2021-12-09 02:50:10'),
(8, 155523806, 'Christiana Kessler', 2004, 14, 15, 11, 17, 14817, '2021-12-09 02:50:10', '2021-12-09 02:50:10'),
(9, 63761745, 'Mariam Abshire', 2013, 11, 8, 6, 16, 19268, '2021-12-09 02:50:10', '2021-12-09 02:50:10'),
(10, 687479943, 'Madyson Kessler', 2010, 3, 19, 2, 13, 15300, '2021-12-09 02:50:10', '2021-12-09 02:50:10'),
(13, 492014344, 'Itzel Kshlerin MD', 1974, 17, 4, 11, 17, 16735, '2021-12-09 02:50:10', '2021-12-09 02:50:10'),
(14, 992767612, 'Chester Flatley', 1990, 7, 15, 19, 11, 10858, '2021-12-09 02:50:10', '2021-12-09 02:50:10'),
(15, 432376925, 'Dr. Chadd Kerluke III', 2011, 8, 18, 20, 10, 12304, '2021-12-09 02:50:10', '2021-12-09 02:50:10'),
(16, 110732329, 'Prof. Bridget Murphy Sr.', 1976, 14, 10, 15, 20, 14694, '2021-12-09 02:50:10', '2021-12-09 02:50:10'),
(17, 331467928, 'Alfred McKenzie', 1992, 14, 16, 4, 20, 15749, '2021-12-09 02:50:10', '2021-12-09 02:50:10'),
(19, 357368000, 'Dr. Kathlyn Kerluke PhD', 2005, 8, 16, 19, 18, 16642, '2021-12-09 02:50:10', '2021-12-09 02:50:10'),
(20, 27742027, 'Dena Crona', 1975, 18, 8, 16, 17, 13597, '2021-12-09 02:50:10', '2021-12-09 02:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE `catalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Savanna Halvorsonn', '2021-12-09 01:57:19', '2021-12-14 09:46:49'),
(2, 'Ms. Lilian Pollich VI', '2021-12-09 05:26:34', '2021-12-14 09:30:12'),
(3, 'Dr. Kenyon Christiansen PhD', '2021-12-09 07:36:57', '2021-12-09 02:32:40'),
(4, 'Miss Maybelle Powlowski', '2021-12-08 18:46:55', '2021-12-09 02:32:40'),
(5, 'Theresa Corkery', '2021-12-09 02:32:36', '2021-12-09 02:32:40'),
(6, 'Carleton Osinski', '2021-12-09 04:01:35', '2021-12-09 02:32:40'),
(7, 'Jeremy Zboncak', '2021-12-08 19:28:42', '2021-12-09 02:32:40'),
(8, 'Gene Stoltenberg', '2021-12-08 20:17:47', '2021-12-09 02:32:40'),
(9, 'Zella Simonis', '2021-12-09 03:44:13', '2021-12-09 02:32:40'),
(11, 'Prof. Theresa Marks', '2021-12-08 22:32:29', '2021-12-09 02:32:40'),
(12, 'Prof. Vaughn Weimann Jr.', '2021-12-09 01:22:37', '2021-12-09 02:32:40'),
(13, 'Carey Walsh DDS', '2021-12-09 07:48:33', '2021-12-09 02:32:40'),
(14, 'Prof. Jeromy Pfannerstill', '2021-12-08 21:44:55', '2021-12-09 02:32:40'),
(15, 'Dr. Kelley Bartoletti', '2021-12-09 03:15:52', '2021-12-09 02:32:40'),
(16, 'Reece Jast', '2021-12-08 18:12:11', '2021-12-09 02:32:40'),
(18, 'Everett Mills', '2021-12-08 22:42:49', '2021-12-09 02:32:40'),
(19, 'Marjolaine Nicolas', '2021-12-08 21:12:46', '2021-12-09 02:32:40'),
(20, 'Tiana Shields', '2021-12-08 20:47:46', '2021-12-09 02:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `gender`, `phone_number`, `address`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Robin Trantow', 'F', '082186405257', '3935 Leatha Causeway\r\nEast Kayceemouth, ME 17747-5168', 'will.curt@graham.com', '2021-06-08 18:40:15', '2021-12-16 05:56:58'),
(2, 'Miss Lilliana Hermiston', 'F', '082131919361', '681 Bernhard Pine Suite 299\nNew Newellmouth, NJ 23912', 'eschmeler@schumm.info', '2021-12-09 07:05:44', '2021-12-09 02:37:13'),
(3, 'Arvilla McLaughlin', 'M', '08214852149', '6918 Huels Row Apt. 532\nLake Annalise, OR 71785', 'koelpin.eugenia@littel.org', '2021-12-08 17:57:31', '2021-12-09 02:37:13'),
(4, 'Kaylee Adams', 'F', '082115022192', '1043 Nicholas Throughway Apt. 515\nSouth Elishaborough, MO 30151', 'jailyn.nolan@hotmail.com', '2021-12-09 07:30:25', '2021-12-09 02:37:13'),
(5, 'Dr. Wilfred Gleason I', 'M', '082146653776', '3277 Furman Isle\nNew Jessika, OK 88615', 'tillman.kailey@gmail.com', '2021-12-09 01:19:14', '2021-12-09 02:37:13'),
(6, 'Mr. Otto Funk DVM', 'M', '082126505695', '2294 Sheridan Fords Apt. 544\nMacejkovicview, MO 25730', 'mandy74@gmail.com', '2021-12-09 00:51:43', '2021-12-09 02:37:13'),
(7, 'Vallie Parker', 'M', '082186315606', '8456 Dickens Valleys\nWehnermouth, NV 85647-9905', 'hartmann.ladarius@volkman.com', '2021-12-08 18:46:00', '2021-12-09 02:37:13'),
(8, 'Matt Auer', 'F', '082113358122', '91911 Kennedy Highway Apt. 188\nKulasberg, VT 66861', 'daugherty.mallie@rogahn.com', '2021-12-09 03:55:59', '2021-12-09 02:37:13'),
(9, 'Prof. Henry Murazik MD', 'F', '082113892225', '3596 Ritchie Mountain Suite 887\nStrosinstad, NC 99050', 'kole85@pfannerstill.net', '2021-12-09 02:18:07', '2021-12-09 02:37:13'),
(10, 'Ford Bernhard', 'F', '082165355352', '13017 Lee Shore\nNienowfurt, WY 97620-0170', 'pbuckridge@ruecker.com', '2021-12-09 05:57:51', '2021-12-09 02:37:13'),
(11, 'Prof. Jena Conn Jr.', 'F', '082115471515', '12779 Kreiger Camp Suite 887\nCasperport, AL 69912', 'ernestina05@hotmail.com', '2021-12-08 17:08:36', '2021-12-09 02:37:13'),
(12, 'Dr. Audrey Hagenes DVM', 'F', '082180210343', '32229 Al Square Apt. 565\nWest Vidal, WY 57861-1899', 'josefa.wiza@yahoo.com', '2021-12-09 03:21:26', '2021-12-09 02:37:13'),
(13, 'Easton Smitham DDS', 'F', '08211251943', '214 Durgan Knolls\nPort Uriah, MD 98469-0768', 'idickens@ferry.com', '2021-12-09 04:40:39', '2021-12-09 02:37:13'),
(14, 'Miss Aniya Mosciski IV', 'F', '082127249013', '188 Katrina Summit Suite 683\nSouth Oramouth, NH 99963', 'damien92@hotmail.com', '2021-12-08 22:50:05', '2021-12-09 02:37:13'),
(15, 'Ronny Skiles', 'F', '082172782927', '1005 Emilio Locks\nPollichfort, OK 00873', 'spencer.marquis@stanton.com', '2021-12-09 00:39:36', '2021-12-09 02:37:13'),
(16, 'Lazaro Welch', 'F', '082158121805', '1977 Victoria Isle\nNew Laury, NV 73424', 'justus36@mills.net', '2021-12-08 17:54:55', '2021-12-09 02:37:13'),
(17, 'Karolann Bradtke', 'F', '082180244335', '100 Friedrich Court\nWildermanburgh, OK 14427', 'salvatore20@mertz.com', '2021-12-09 00:40:15', '2021-12-09 02:37:13'),
(18, 'Mr. Murl Sporer', 'M', '08218400320', '44295 Jewel Motorway Apt. 960\nWilliamsonton, MT 22341', 'kennith.rempel@fahey.biz', '2021-12-09 04:13:19', '2021-12-09 02:37:14'),
(19, 'Celine Orn', 'F', '08216124149', '8096 Smitham Springs Apt. 508\nNorth Johaven, NY 19101', 'sasha.boyer@hotmail.com', '2021-12-08 21:40:32', '2021-12-09 02:37:14'),
(20, 'Dr. Beryl Corkery MD', 'F', '082133421380', '55451 Ottilie Island\nLake Rubyefort, TX 98240', 'bogan.eriberto@lakin.org', '2021-12-09 03:00:52', '2021-12-09 02:37:14'),
(21, 'Ulum', 'M', '083813013523', 'serang - banten', 'ulum@gmail.com', '2021-12-09 10:30:27', NULL),
(22, 'Suki suki', 'M', '083813013523', 'jl. pamarayan', 'suki151800@gmail.com', '2021-12-16 05:41:00', '2021-12-16 05:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2010_12_08_103632_create_members_table', 1),
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2021_12_08_103824_create_publishers_table', 1),
(11, '2021_12_08_103837_create_authors_table', 1),
(12, '2021_12_08_103859_create_catalogs_table', 1),
(13, '2021_12_08_103906_create_books_table', 1),
(14, '2021_12_08_104005_create_transactions_table', 1),
(15, '2021_12_08_104021_create_transaction_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Marion Gorczanyy', 'oschulist@hotmail.com', '082130433537', '395 Nona Cove Apt. 910\r\nNew Sibylchester, NY 87041-3555', '2021-12-09 05:27:33', '2021-12-16 05:57:48'),
(2, 'Diana McGlynn', 'gnolan@erdman.com', '082194867237', '151 Leif Harbors Suite 512\nSunnyberg, IN 91380', '2021-12-09 05:15:26', '2021-12-09 02:39:54'),
(3, 'Camden Koss', 'hkautzer@hotmail.com', '082179259553', '9368 Annabel Track Suite 784\nNew Dejuan, MS 01642-9820', '2021-12-09 06:09:33', '2021-12-09 02:39:54'),
(4, 'Vickie Leannon V', 'nauer@gmail.com', '082115690816', '843 Adelia Forge Suite 017\nSouth Gisselle, CO 12400', '2021-12-09 01:48:12', '2021-12-09 02:39:54'),
(5, 'Lesly Goldner', 'hansen.alba@yahoo.com', '082129613547', '5365 Lindgren Streets Apt. 868\nCorenebury, NC 01226', '2021-12-08 22:13:06', '2021-12-09 02:39:54'),
(6, 'Prof. Natalie O\'Conner', 'karianne75@moen.biz', '082169915541', '72592 Hintz Plaza\nGorczanymouth, WY 44875', '2021-12-08 23:38:52', '2021-12-09 02:39:54'),
(7, 'Dr. Loyce Trantow', 'kutch.colt@ryan.com', '082184369705', '4030 Kassulke Parks\nPort Levi, CA 59506-9411', '2021-12-08 23:41:12', '2021-12-09 02:39:54'),
(8, 'Prof. Summer Metz Jr.', 'jayde98@hotmail.com', '082196389024', '8737 Braun Spur Suite 786\nSouth Jessfort, KY 84533', '2021-12-08 22:13:56', '2021-12-09 02:39:54'),
(9, 'Domenica Altenwerth', 'keebler.berneice@yahoo.com', '082199159689', '32417 Kunde Locks Apt. 865\nSanfordburgh, OK 74883-7994', '2021-12-09 03:21:40', '2021-12-09 02:39:54'),
(10, 'Dorcas Vandervort MD', 'ward.kitty@yahoo.com', '082134288482', '41931 Powlowski Ridges\nSouth Raoul, CA 58518', '2021-12-08 17:23:27', '2021-12-09 02:39:54'),
(11, 'Rhoda Klein III', 'zboncak.adrien@altenwerth.info', '082199123991', '75486 Robbie Cliffs Suite 539\nEast Emiemouth, VA 62548-8900', '2021-12-08 20:01:08', '2021-12-09 02:39:54'),
(12, 'Dr. Mauricio Bechtelar Jr.', 'wilderman.dina@hotmail.com', '082150092135', '260 Uriah Ramp\nWintheiserchester, SC 55427', '2021-12-08 20:35:03', '2021-12-09 02:39:54'),
(13, 'Minnie Turner', 'ally.renner@nikolaus.net', '082166791441', '54892 Ezra Rapids\nHackettfurt, NC 43778-8611', '2021-12-08 18:00:35', '2021-12-09 02:39:54'),
(14, 'Prof. Tommie Bradtke', 'ashleigh.collins@hotmail.com', '082141045879', '3469 Amie Meadow\nSouth Macyshire, IL 98902-5319', '2021-12-09 03:06:56', '2021-12-09 02:39:54'),
(15, 'Prof. Cydney Kilback', 'serena.carter@bernier.com', '082171205857', '739 Wolff Rest\nEast Helenfort, MI 21707-9836', '2021-12-09 01:19:44', '2021-12-09 02:39:54'),
(16, 'Hobart Ebert Sr.', 'lang.joshua@ryan.biz', '082172281773', '8580 Kip Village\nNorth Joanamouth, NE 00242-6335', '2021-12-09 01:38:07', '2021-12-09 02:39:54'),
(17, 'Ahmad Raynor', 'baron.terry@grimes.com', '082186576342', '63284 Otilia Islands Apt. 476\nGabrielside, ME 21368-6550', '2021-12-08 17:52:32', '2021-12-09 02:39:54'),
(18, 'Dr. Fay Lebsack', 'justen79@hotmail.com', '082129428477', '5825 Amani Rue\nNorth Nadiafort, LA 92550-9948', '2021-12-08 19:30:10', '2021-12-09 02:39:54'),
(19, 'Dr. Rhett Morar III', 'rowe.remington@thiel.com', '082175371605', '3882 Mikayla Avenue Suite 653\nVonville, WA 99150', '2021-12-08 20:53:26', '2021-12-09 02:39:54'),
(20, 'Garrett Cummings PhD', 'bfriesen@gmail.com', '082152715077', '96223 Genoveva Lodge Suite 435\nFrederickmouth, KS 58619', '2021-12-09 03:38:44', '2021-12-09 02:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `member_id`, `created_at`, `updated_at`) VALUES
(1, 'ulum', 'ulum@gmail.com', NULL, '$2y$10$hGdFWZZtZ9xIA6tKf7W6ruIug0Su6eLLCsJzokh8h8/o3RKy1dYC6', 'tMLTBOn8KYF6CNHYv7L5OB5S8dckJMVWPTextK5m5HCtVju8oj8pok8BRxD7', 21, '2021-12-09 03:13:32', '2021-12-09 03:13:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_publisher_id_foreign` (`publisher_id`),
  ADD KEY `books_author_id_foreign` (`author_id`),
  ADD KEY `books_catalog_id_foreign` (`catalog_id`);

--
-- Indexes for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_member_id_foreign` (`member_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_details_book_id_foreign` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_member_id_foreign` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
