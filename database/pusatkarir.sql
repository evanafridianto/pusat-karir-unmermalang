-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table pusatkarir.addresses
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `province_id` bigint(20) unsigned NOT NULL,
  `city_id` bigint(20) unsigned NOT NULL,
  `street` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addressable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addressable_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `addresses_province_id_foreign` (`province_id`),
  KEY `addresses_city_id_foreign` (`city_id`),
  KEY `addresses_addressable_type_addressable_id_index` (`addressable_type`,`addressable_id`),
  CONSTRAINT `addresses_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `addresses_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.addresses: ~5 rows (approximately)
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` (`id`, `province_id`, `city_id`, `street`, `zip_code`, `addressable_type`, `addressable_id`, `created_at`, `updated_at`) VALUES
	(1, 15, 232, 'Jalan Terusan Dieng No. 62-64', '65146', 'App\\Models\\Employer', 1, '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(2, 11, 156, '32423', '4342', 'App\\Models\\Employer', 2, '2022-04-27 03:07:43', '2022-04-27 03:07:43'),
	(3, 15, 222, 'Jalan Galunggung', '56543', 'App\\Models\\Employer', 3, '2022-04-27 04:38:59', '2022-04-27 04:44:28'),
	(4, 29, 406, 'Jalan Galunggung', '56543', 'App\\Models\\Vacancy', 1, '2022-04-27 04:51:08', '2022-04-27 04:52:35'),
	(5, 15, 218, 'Jalan Mega Mendung', '4567', 'App\\Models\\Seeker', 1, '2022-04-27 05:11:29', '2022-04-27 05:18:30');
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.applicants
CREATE TABLE IF NOT EXISTS `applicants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `seeker_id` bigint(20) unsigned NOT NULL,
  `vacancy_id` bigint(20) unsigned NOT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci,
  `status` enum('Accepted','Rejected','Pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `applicants_seeker_id_foreign` (`seeker_id`),
  KEY `applicants_vacancy_id_foreign` (`vacancy_id`),
  CONSTRAINT `applicants_seeker_id_foreign` FOREIGN KEY (`seeker_id`) REFERENCES `seekers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `applicants_vacancy_id_foreign` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.applicants: ~1 rows (approximately)
/*!40000 ALTER TABLE `applicants` DISABLE KEYS */;
INSERT INTO `applicants` (`id`, `seeker_id`, `vacancy_id`, `message`, `status`, `created_at`, `updated_at`) VALUES
	(2, 1, 1, 'Et lacinia nisi curae faucibus magna finibus facilisi consectetur parturient per feugiat torquent a scelerisque fringilla consectetuer magnis ex himenaeos interdum sodales si ullamcorper aliquam duis pede platea suscipit lectus netus eget ridiculus iaculis ipsum tristique vivamus nostra integer potenti id eros conubia gravida tempor viverra sapien euismod', 'Rejected', '2022-04-27 05:32:35', '2022-04-27 05:39:52');
/*!40000 ALTER TABLE `applicants` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.articles
CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `tag` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_user_id_foreign` (`user_id`),
  KEY `articles_category_id_foreign` (`category_id`),
  KEY `articles_slug_index` (`slug`),
  CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.articles: ~0 rows (approximately)
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`id`, `user_id`, `title`, `slug`, `thumbnail`, `content`, `category_id`, `tag`, `created_at`, `updated_at`) VALUES
	(1, 1, '243423423', '243423423', 'thumbnail_1651039210.png', '<p bis_size="{&quot;x&quot;:20,&quot;y&quot;:20,&quot;w&quot;:1451,&quot;h&quot;:20,&quot;abs_x&quot;:341,&quot;abs_y&quot;:458}">24242</p>', 92, NULL, '2022-04-27 06:00:10', '2022-04-27 06:00:10');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('News','Events','Major','Business Field') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.categories: ~91 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `slug`, `type`, `created_at`, `updated_at`) VALUES
	(1, 'Pendidikan', 'pendidikan', 'Business Field', '2022-04-27 02:54:50', '2022-04-27 02:54:50'),
	(2, 'Akuntan / Auditor', 'akuntan-auditor', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(3, 'Asuransi', 'asuransi', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(4, 'Bioteknologi & Biologi', 'bioteknologi-biologi', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(5, 'Biro Perjalanan', 'biro-perjalanan', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(6, 'Bubur Kertas / Kertas', 'bubur-kertas-kertas', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(7, 'Desain Interior', 'desain-interior', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(8, 'E-Commerce', 'e-commerce', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(9, 'Ekspedisi / Agen Kargo', 'ekspedisi-agen-kargo', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(10, 'Elektronika / Semikonduktor', 'elektronika-semikonduktor', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(11, 'Energi', 'energi', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(12, 'Event Organizer', 'event-organizer', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(13, 'Farmasi', 'farmasi', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(14, 'Furnitur', 'furnitur', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(15, 'Garmen / Tekstil', 'garmen-tekstil', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(16, 'Hiburan', 'hiburan', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(17, 'Hotel', 'hotel', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(18, 'Hukum', 'hukum', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(19, 'Internet', 'internet', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(20, 'Jasa Ground handling', 'jasa-ground-handling', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(21, 'Jasa Pemindahan', 'jasa-pemindahan', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(22, 'Jasa Pengamanan', 'jasa-pengamanan', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(23, 'Jasa Pengendalian Hama', 'jasa-pengendalian-hama', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(24, 'Kecantikan / Fitness', 'kecantikan-fitness', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(25, 'Kehutanan / Perkayuan', 'kehutanan-perkayuan', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(26, 'Kelautan / Aquakultur', 'kelautan-aquakultur', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(27, 'Keramik & Alat Kebersihan', 'keramik-alat-kebersihan', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(28, 'Keuangan / Bank', 'keuangan-bank', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(29, 'Kimia', 'kimia', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(30, 'Komputer / IT-Hardware', 'komputer-it-hardware', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(31, 'Komputer / TI', 'komputer-ti', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(32, 'Konglomerasi', 'konglomerasi', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(33, 'Konstruksi', 'konstruksi', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(34, 'Konsultan', 'konsultan', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(35, 'Konsultan (Bisnis & Manajemen)', 'konsultan-bisnis-manajemen', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(36, 'Konsultan (IT; IPTEK)', 'konsultan-it-iptek', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(37, 'Kosmetik', 'kosmetik', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(38, 'Kulit', 'kulit', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(39, 'Kurir', 'kurir', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(40, 'Logam', 'logam', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(41, 'Logistik / Transportasi', 'logistik-transportasi', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(42, 'Mainan', 'mainan', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(43, 'Makanan dan Minuman', 'makanan-dan-minuman', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(44, 'Manajemen Fasilitas', 'manajemen-fasilitas', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(45, 'Manajemen Lingkungan / Limbah', 'manajemen-lingkungan-limbah', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(46, 'Manufactur & Retail Building Material', 'manufactur-retail-building-material', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(47, 'Manufaktur', 'manufaktur', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(48, 'Manufaktur Elektronik', 'manufaktur-elektronik', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(49, 'Media', 'media', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(50, 'Mekanik / Listrik', 'mekanik-listrik', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(51, 'Mesin / Peralatan', 'mesin-peralatan', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(52, 'Minyak dan Gas', 'minyak-dan-gas', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(53, 'Otomotif', 'otomotif', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(54, 'Pemerintahan', 'pemerintahan', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(55, 'Pemrosesan Makanan', 'pemrosesan-makanan', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(56, 'Penerbangan', 'penerbangan', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(57, 'Pengapalan', 'pengapalan', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(58, 'Pengolahan Sumber Daya Alam', 'pengolahan-sumber-daya-alam', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(59, 'Perawatan Kesehatan', 'perawatan-kesehatan', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(60, 'Percetakan dan Kemasan', 'percetakan-dan-kemasan', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(61, 'Perdagangan Komoditas', 'perdagangan-komoditas', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(62, 'Perdagangan Umum', 'perdagangan-umum', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(63, 'Pergudangan', 'pergudangan', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(64, 'Perikanan', 'perikanan', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(65, 'Periklanan / Penerbitan', 'periklanan-penerbitan', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(66, 'Permata & Perhiasan', 'permata-perhiasan', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(67, 'Permen / Biskuit', 'permen-biskuit', 'Business Field', '2022-04-27 02:54:51', '2022-04-27 02:54:51'),
	(68, 'Pertambangan / Mineral', 'pertambangan-mineral', 'Business Field', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(69, 'Polimer / Plastik / Karet', 'polimer-plastik-karet', 'Business Field', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(70, 'Produk Konsumen', 'produk-konsumen', 'Business Field', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(71, 'Produk Konsumen Elektronik', 'produk-konsumen-elektronik', 'Business Field', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(72, 'Properti', 'properti', 'Business Field', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(73, 'Pupuk & Pestisida', 'pupuk-pestisida', 'Business Field', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(74, 'Rancang Bangun Pesawat', 'rancang-bangun-pesawat', 'Business Field', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(75, 'Rekayasa & Konstruksi', 'rekayasa-konstruksi', 'Business Field', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(76, 'Rekrutmen / KPO', 'rekrutmen-kpo', 'Business Field', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(77, 'Restoran', 'restoran', 'Business Field', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(78, 'Ritel', 'ritel', 'Business Field', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(79, 'Sektor Nirlaba', 'sektor-nirlaba', 'Business Field', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(80, 'Semen', 'semen', 'Business Field', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(81, 'Seni / Desain / Fashion', 'seni-desain-fashion', 'Business Field', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(82, 'Servis', 'servis', 'Business Field', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(83, 'Sistem Pemadam Kebakaran', 'sistem-pemadam-kebakaran', 'Business Field', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(84, 'Startup dan Fintech', 'startup-dan-fintech', 'Business Field', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(85, 'Sumber Daya Alam Lainnya', 'sumber-daya-alam-lainnya', 'Business Field', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(86, 'Teknologi Finansial', 'teknologi-finansial', 'Business Field', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(87, 'Telekomunikasi', 'telekomunikasi', 'Business Field', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(88, 'Akuntasi', 'akuntasi', 'Major', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(89, 'Sistem Informasi', 'sistem-informasi', 'Major', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(90, 'Hukum', 'hukum', 'Major', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(91, 'Pariwisata', 'pariwisata', 'Major', '2022-04-27 02:54:52', '2022-04-27 02:54:52'),
	(92, 'Ekonomi', 'ekonomi', 'News', '2022-04-27 06:00:05', '2022-04-27 06:00:05');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.category_vacancy
CREATE TABLE IF NOT EXISTS `category_vacancy` (
  `vacancy_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `category_vacancy_vacancy_id_foreign` (`vacancy_id`),
  KEY `category_vacancy_category_id_foreign` (`category_id`),
  CONSTRAINT `category_vacancy_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `category_vacancy_vacancy_id_foreign` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.category_vacancy: ~2 rows (approximately)
/*!40000 ALTER TABLE `category_vacancy` DISABLE KEYS */;
INSERT INTO `category_vacancy` (`vacancy_id`, `category_id`, `created_at`, `updated_at`) VALUES
	(1, 88, NULL, NULL),
	(1, 89, NULL, NULL);
/*!40000 ALTER TABLE `category_vacancy` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.cities
CREATE TABLE IF NOT EXISTS `cities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=476 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.cities: ~475 rows (approximately)
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` (`id`, `name`, `province_id`, `created_at`, `updated_at`) VALUES
	(1, 'PIDIE JAYA', 1, NULL, NULL),
	(2, 'SIMEULUE', 1, NULL, NULL),
	(3, 'BIREUEN', 1, NULL, NULL),
	(4, 'ACEH TIMUR', 1, NULL, NULL),
	(5, 'ACEH UTARA', 1, NULL, NULL),
	(6, 'PIDIE', 1, NULL, NULL),
	(7, 'ACEH BARAT DAYA', 1, NULL, NULL),
	(8, 'GAYO LUES', 1, NULL, NULL),
	(9, 'ACEH SELATAN', 1, NULL, NULL),
	(10, 'ACEH TAMIANG', 1, NULL, NULL),
	(11, 'ACEH BESAR', 1, NULL, NULL),
	(12, 'ACEH TENGGARA', 1, NULL, NULL),
	(13, 'BENER MERIAH', 1, NULL, NULL),
	(14, 'ACEH JAYA', 1, NULL, NULL),
	(15, 'LHOKSEUMAWE', 1, NULL, NULL),
	(16, 'ACEH BARAT', 1, NULL, NULL),
	(17, 'NAGAN RAYA', 1, NULL, NULL),
	(18, 'LANGSA', 1, NULL, NULL),
	(19, 'BANDA ACEH', 1, NULL, NULL),
	(20, 'ACEH SINGKIL', 1, NULL, NULL),
	(21, 'SABANG', 1, NULL, NULL),
	(22, 'ACEH TENGAH', 1, NULL, NULL),
	(23, 'SUBULUSSALAM', 1, NULL, NULL),
	(24, 'NIAS SELATAN', 2, NULL, NULL),
	(25, 'MANDAILING NATAL', 2, NULL, NULL),
	(26, 'DAIRI', 2, NULL, NULL),
	(27, 'LABUHAN BATU UTARA', 2, NULL, NULL),
	(28, 'TAPANULI UTARA', 2, NULL, NULL),
	(29, 'SIMALUNGUN', 2, NULL, NULL),
	(30, 'LANGKAT', 2, NULL, NULL),
	(31, 'SERDANG BEDAGAI', 2, NULL, NULL),
	(32, 'TAPANULI SELATAN', 2, NULL, NULL),
	(33, 'ASAHAN', 2, NULL, NULL),
	(34, 'PADANG LAWAS UTARA', 2, NULL, NULL),
	(35, 'PADANG LAWAS', 2, NULL, NULL),
	(36, 'LABUHAN BATU SELATAN', 2, NULL, NULL),
	(37, 'PADANG SIDEMPUAN', 2, NULL, NULL),
	(38, 'TOBA SAMOSIR', 2, NULL, NULL),
	(39, 'TAPANULI TENGAH', 2, NULL, NULL),
	(40, 'HUMBANG HASUNDUTAN', 2, NULL, NULL),
	(41, 'SIBOLGA', 2, NULL, NULL),
	(42, 'BATU BARA', 2, NULL, NULL),
	(43, 'SAMOSIR', 2, NULL, NULL),
	(44, 'PEMATANG SIANTAR', 2, NULL, NULL),
	(45, 'LABUHAN BATU', 2, NULL, NULL),
	(46, 'DELI SERDANG', 2, NULL, NULL),
	(47, 'GUNUNGSITOLI', 2, NULL, NULL),
	(48, 'NIAS UTARA', 2, NULL, NULL),
	(49, 'NIAS', 2, NULL, NULL),
	(50, 'KARO', 2, NULL, NULL),
	(51, 'NIAS BARAT', 2, NULL, NULL),
	(52, 'MEDAN', 2, NULL, NULL),
	(53, 'PAKPAK BHARAT', 2, NULL, NULL),
	(54, 'TEBING TINGGI', 2, NULL, NULL),
	(55, 'BINJAI', 2, NULL, NULL),
	(56, 'TANJUNG BALAI', 2, NULL, NULL),
	(57, 'DHARMASRAYA', 3, NULL, NULL),
	(58, 'SOLOK SELATAN', 3, NULL, NULL),
	(59, 'SIJUNJUNG (SAWAH LUNTO SIJUNJUNG)', 3, NULL, NULL),
	(60, 'PASAMAN BARAT', 3, NULL, NULL),
	(61, 'SOLOK', 3, NULL, NULL),
	(62, 'PASAMAN', 3, NULL, NULL),
	(63, 'PARIAMAN', 3, NULL, NULL),
	(64, 'TANAH DATAR', 3, NULL, NULL),
	(65, 'PADANG PARIAMAN', 3, NULL, NULL),
	(66, 'PESISIR SELATAN', 3, NULL, NULL),
	(67, 'PADANG', 3, NULL, NULL),
	(68, 'SAWAH LUNTO', 3, NULL, NULL),
	(69, 'LIMA PULUH KOTO / KOTA', 3, NULL, NULL),
	(70, 'AGAM', 3, NULL, NULL),
	(71, 'PAYAKUMBUH', 3, NULL, NULL),
	(72, 'BUKITTINGGI', 3, NULL, NULL),
	(73, 'PADANG PANJANG', 3, NULL, NULL),
	(74, 'KEPULAUAN MENTAWAI', 3, NULL, NULL),
	(75, 'INDRAGIRI HILIR', 4, NULL, NULL),
	(76, 'KUANTAN SINGINGI', 4, NULL, NULL),
	(77, 'PELALAWAN', 4, NULL, NULL),
	(78, 'PEKANBARU', 4, NULL, NULL),
	(79, 'ROKAN HILIR', 4, NULL, NULL),
	(80, 'BENGKALIS', 4, NULL, NULL),
	(81, 'INDRAGIRI HULU', 4, NULL, NULL),
	(82, 'ROKAN HULU', 4, NULL, NULL),
	(83, 'KAMPAR', 4, NULL, NULL),
	(84, 'KEPULAUAN MERANTI', 4, NULL, NULL),
	(85, 'DUMAI', 4, NULL, NULL),
	(86, 'SIAK', 4, NULL, NULL),
	(87, 'TEBO', 5, NULL, NULL),
	(88, 'TANJUNG JABUNG BARAT', 5, NULL, NULL),
	(89, 'MUARO JAMBI', 5, NULL, NULL),
	(90, 'KERINCI', 5, NULL, NULL),
	(91, 'MERANGIN', 5, NULL, NULL),
	(92, 'BUNGO', 5, NULL, NULL),
	(93, 'TANJUNG JABUNG TIMUR', 5, NULL, NULL),
	(94, 'SUNGAIPENUH', 5, NULL, NULL),
	(95, 'BATANG HARI', 5, NULL, NULL),
	(96, 'JAMBI', 5, NULL, NULL),
	(97, 'SAROLANGUN', 5, NULL, NULL),
	(98, 'PALEMBANG', 6, NULL, NULL),
	(99, 'LAHAT', 6, NULL, NULL),
	(100, 'OGAN KOMERING ULU TIMUR', 6, NULL, NULL),
	(101, 'MUSI BANYUASIN', 6, NULL, NULL),
	(102, 'PAGAR ALAM', 6, NULL, NULL),
	(103, 'OGAN KOMERING ULU SELATAN', 6, NULL, NULL),
	(104, 'BANYUASIN', 6, NULL, NULL),
	(105, 'MUSI RAWAS', 6, NULL, NULL),
	(106, 'MUARA ENIM', 6, NULL, NULL),
	(107, 'OGAN KOMERING ULU', 6, NULL, NULL),
	(108, 'OGAN KOMERING ILIR', 6, NULL, NULL),
	(109, 'EMPAT LAWANG', 6, NULL, NULL),
	(110, 'LUBUK LINGGAU', 6, NULL, NULL),
	(111, 'PRABUMULIH', 6, NULL, NULL),
	(112, 'OGAN ILIR', 6, NULL, NULL),
	(113, 'BENGKULU TENGAH', 7, NULL, NULL),
	(114, 'REJANG LEBONG', 7, NULL, NULL),
	(115, 'MUKO MUKO', 7, NULL, NULL),
	(116, 'KAUR', 7, NULL, NULL),
	(117, 'BENGKULU UTARA', 7, NULL, NULL),
	(118, 'LEBONG', 7, NULL, NULL),
	(119, 'KEPAHIANG', 7, NULL, NULL),
	(120, 'BENGKULU SELATAN', 7, NULL, NULL),
	(121, 'SELUMA', 7, NULL, NULL),
	(122, 'BENGKULU', 7, NULL, NULL),
	(123, 'LAMPUNG UTARA', 8, NULL, NULL),
	(124, 'WAY KANAN', 8, NULL, NULL),
	(125, 'LAMPUNG TENGAH', 8, NULL, NULL),
	(126, 'MESUJI', 8, NULL, NULL),
	(127, 'PRINGSEWU', 8, NULL, NULL),
	(128, 'LAMPUNG TIMUR', 8, NULL, NULL),
	(129, 'LAMPUNG SELATAN', 8, NULL, NULL),
	(130, 'TULANG BAWANG', 8, NULL, NULL),
	(131, 'TULANG BAWANG BARAT', 8, NULL, NULL),
	(132, 'TANGGAMUS', 8, NULL, NULL),
	(133, 'LAMPUNG BARAT', 8, NULL, NULL),
	(134, 'PESISIR BARAT', 8, NULL, NULL),
	(135, 'PESAWARAN', 8, NULL, NULL),
	(136, 'BANDAR LAMPUNG', 8, NULL, NULL),
	(137, 'METRO', 8, NULL, NULL),
	(138, 'BELITUNG', 9, NULL, NULL),
	(139, 'BELITUNG TIMUR', 9, NULL, NULL),
	(140, 'BANGKA', 9, NULL, NULL),
	(141, 'BANGKA SELATAN', 9, NULL, NULL),
	(142, 'BANGKA BARAT', 9, NULL, NULL),
	(143, 'PANGKAL PINANG', 9, NULL, NULL),
	(144, 'BANGKA TENGAH', 9, NULL, NULL),
	(145, 'KEPULAUAN ANAMBAS', 10, NULL, NULL),
	(146, 'BINTAN', 10, NULL, NULL),
	(147, 'NATUNA', 10, NULL, NULL),
	(148, 'BATAM', 10, NULL, NULL),
	(149, 'TANJUNG PINANG', 10, NULL, NULL),
	(150, 'KARIMUN', 10, NULL, NULL),
	(151, 'LINGGA', 10, NULL, NULL),
	(152, 'JAKARTA UTARA', 11, NULL, NULL),
	(153, 'JAKARTA BARAT', 11, NULL, NULL),
	(154, 'JAKARTA TIMUR', 11, NULL, NULL),
	(155, 'JAKARTA SELATAN', 11, NULL, NULL),
	(156, 'JAKARTA PUSAT', 11, NULL, NULL),
	(157, 'KEPULAUAN SERIBU', 11, NULL, NULL),
	(158, 'DEPOK', 12, NULL, NULL),
	(159, 'KARAWANG', 12, NULL, NULL),
	(160, 'CIREBON', 12, NULL, NULL),
	(161, 'BANDUNG', 12, NULL, NULL),
	(162, 'SUKABUMI', 12, NULL, NULL),
	(163, 'SUMEDANG', 12, NULL, NULL),
	(164, 'INDRAMAYU', 12, NULL, NULL),
	(165, 'MAJALENGKA', 12, NULL, NULL),
	(166, 'KUNINGAN', 12, NULL, NULL),
	(167, 'TASIKMALAYA', 12, NULL, NULL),
	(168, 'CIAMIS', 12, NULL, NULL),
	(169, 'SUBANG', 12, NULL, NULL),
	(170, 'PURWAKARTA', 12, NULL, NULL),
	(171, 'BOGOR', 12, NULL, NULL),
	(172, 'BEKASI', 12, NULL, NULL),
	(173, 'GARUT', 12, NULL, NULL),
	(174, 'PANGANDARAN', 12, NULL, NULL),
	(175, 'CIANJUR', 12, NULL, NULL),
	(176, 'BANJAR', 12, NULL, NULL),
	(177, 'BANDUNG BARAT', 12, NULL, NULL),
	(178, 'CIMAHI', 12, NULL, NULL),
	(179, 'PURBALINGGA', 13, NULL, NULL),
	(180, 'KEBUMEN', 13, NULL, NULL),
	(181, 'MAGELANG', 13, NULL, NULL),
	(182, 'CILACAP', 13, NULL, NULL),
	(183, 'BATANG', 13, NULL, NULL),
	(184, 'BANJARNEGARA', 13, NULL, NULL),
	(185, 'BLORA', 13, NULL, NULL),
	(186, 'BREBES', 13, NULL, NULL),
	(187, 'BANYUMAS', 13, NULL, NULL),
	(188, 'WONOSOBO', 13, NULL, NULL),
	(189, 'TEGAL', 13, NULL, NULL),
	(190, 'PURWOREJO', 13, NULL, NULL),
	(191, 'PATI', 13, NULL, NULL),
	(192, 'SUKOHARJO', 13, NULL, NULL),
	(193, 'KARANGANYAR', 13, NULL, NULL),
	(194, 'PEKALONGAN', 13, NULL, NULL),
	(195, 'PEMALANG', 13, NULL, NULL),
	(196, 'BOYOLALI', 13, NULL, NULL),
	(197, 'GROBOGAN', 13, NULL, NULL),
	(198, 'SEMARANG', 13, NULL, NULL),
	(199, 'DEMAK', 13, NULL, NULL),
	(200, 'REMBANG', 13, NULL, NULL),
	(201, 'KLATEN', 13, NULL, NULL),
	(202, 'KUDUS', 13, NULL, NULL),
	(203, 'TEMANGGUNG', 13, NULL, NULL),
	(204, 'SRAGEN', 13, NULL, NULL),
	(205, 'JEPARA', 13, NULL, NULL),
	(206, 'WONOGIRI', 13, NULL, NULL),
	(207, 'KENDAL', 13, NULL, NULL),
	(208, 'SURAKARTA (SOLO)', 13, NULL, NULL),
	(209, 'SALATIGA', 13, NULL, NULL),
	(210, 'SLEMAN', 14, NULL, NULL),
	(211, 'BANTUL', 14, NULL, NULL),
	(212, 'YOGYAKARTA', 14, NULL, NULL),
	(213, 'GUNUNG KIDUL', 14, NULL, NULL),
	(214, 'KULON PROGO', 14, NULL, NULL),
	(215, 'GRESIK', 15, NULL, NULL),
	(216, 'KEDIRI', 15, NULL, NULL),
	(217, 'SAMPANG', 15, NULL, NULL),
	(218, 'BANGKALAN', 15, NULL, NULL),
	(219, 'SUMENEP', 15, NULL, NULL),
	(220, 'SITUBONDO', 15, NULL, NULL),
	(221, 'SURABAYA', 15, NULL, NULL),
	(222, 'JEMBER', 15, NULL, NULL),
	(223, 'PAMEKASAN', 15, NULL, NULL),
	(224, 'JOMBANG', 15, NULL, NULL),
	(225, 'PROBOLINGGO', 15, NULL, NULL),
	(226, 'BANYUWANGI', 15, NULL, NULL),
	(227, 'PASURUAN', 15, NULL, NULL),
	(228, 'BOJONEGORO', 15, NULL, NULL),
	(229, 'BONDOWOSO', 15, NULL, NULL),
	(230, 'MAGETAN', 15, NULL, NULL),
	(231, 'LUMAJANG', 15, NULL, NULL),
	(232, 'MALANG', 15, NULL, NULL),
	(233, 'BLITAR', 15, NULL, NULL),
	(234, 'SIDOARJO', 15, NULL, NULL),
	(235, 'LAMONGAN', 15, NULL, NULL),
	(236, 'PACITAN', 15, NULL, NULL),
	(237, 'TULUNGAGUNG', 15, NULL, NULL),
	(238, 'MOJOKERTO', 15, NULL, NULL),
	(239, 'MADIUN', 15, NULL, NULL),
	(240, 'PONOROGO', 15, NULL, NULL),
	(241, 'NGAWI', 15, NULL, NULL),
	(242, 'NGANJUK', 15, NULL, NULL),
	(243, 'TUBAN', 15, NULL, NULL),
	(244, 'TRENGGALEK', 15, NULL, NULL),
	(245, 'BATU', 15, NULL, NULL),
	(246, 'TANGERANG', 16, NULL, NULL),
	(247, 'SERANG', 16, NULL, NULL),
	(248, 'PANDEGLANG', 16, NULL, NULL),
	(249, 'LEBAK', 16, NULL, NULL),
	(250, 'TANGERANG SELATAN', 16, NULL, NULL),
	(251, 'CILEGON', 16, NULL, NULL),
	(252, 'KLUNGKUNG', 17, NULL, NULL),
	(253, 'KARANGASEM', 17, NULL, NULL),
	(254, 'BANGLI', 17, NULL, NULL),
	(255, 'TABANAN', 17, NULL, NULL),
	(256, 'GIANYAR', 17, NULL, NULL),
	(257, 'BADUNG', 17, NULL, NULL),
	(258, 'JEMBRANA', 17, NULL, NULL),
	(259, 'BULELENG', 17, NULL, NULL),
	(260, 'DENPASAR', 17, NULL, NULL),
	(261, 'MATARAM', 18, NULL, NULL),
	(262, 'DOMPU', 18, NULL, NULL),
	(263, 'SUMBAWA BARAT', 18, NULL, NULL),
	(264, 'SUMBAWA', 18, NULL, NULL),
	(265, 'LOMBOK TENGAH', 18, NULL, NULL),
	(266, 'LOMBOK TIMUR', 18, NULL, NULL),
	(267, 'LOMBOK UTARA', 18, NULL, NULL),
	(268, 'LOMBOK BARAT', 18, NULL, NULL),
	(269, 'BIMA', 18, NULL, NULL),
	(270, 'TIMOR TENGAH SELATAN', 19, NULL, NULL),
	(271, 'FLORES TIMUR', 19, NULL, NULL),
	(272, 'ALOR', 19, NULL, NULL),
	(273, 'ENDE', 19, NULL, NULL),
	(274, 'NAGEKEO', 19, NULL, NULL),
	(275, 'KUPANG', 19, NULL, NULL),
	(276, 'SIKKA', 19, NULL, NULL),
	(277, 'NGADA', 19, NULL, NULL),
	(278, 'TIMOR TENGAH UTARA', 19, NULL, NULL),
	(279, 'BELU', 19, NULL, NULL),
	(280, 'LEMBATA', 19, NULL, NULL),
	(281, 'SUMBA BARAT DAYA', 19, NULL, NULL),
	(282, 'SUMBA BARAT', 19, NULL, NULL),
	(283, 'SUMBA TENGAH', 19, NULL, NULL),
	(284, 'SUMBA TIMUR', 19, NULL, NULL),
	(285, 'ROTE NDAO', 19, NULL, NULL),
	(286, 'MANGGARAI TIMUR', 19, NULL, NULL),
	(287, 'MANGGARAI', 19, NULL, NULL),
	(288, 'SABU RAIJUA', 19, NULL, NULL),
	(289, 'MANGGARAI BARAT', 19, NULL, NULL),
	(290, 'LANDAK', 20, NULL, NULL),
	(291, 'KETAPANG', 20, NULL, NULL),
	(292, 'SINTANG', 20, NULL, NULL),
	(293, 'KUBU RAYA', 20, NULL, NULL),
	(294, 'PONTIANAK', 20, NULL, NULL),
	(295, 'KAYONG UTARA', 20, NULL, NULL),
	(296, 'BENGKAYANG', 20, NULL, NULL),
	(297, 'KAPUAS HULU', 20, NULL, NULL),
	(298, 'SAMBAS', 20, NULL, NULL),
	(299, 'SINGKAWANG', 20, NULL, NULL),
	(300, 'SANGGAU', 20, NULL, NULL),
	(301, 'MELAWI', 20, NULL, NULL),
	(302, 'SEKADAU', 20, NULL, NULL),
	(303, 'KOTAWARINGIN TIMUR', 21, NULL, NULL),
	(304, 'SUKAMARA', 21, NULL, NULL),
	(305, 'KOTAWARINGIN BARAT', 21, NULL, NULL),
	(306, 'BARITO TIMUR', 21, NULL, NULL),
	(307, 'KAPUAS', 21, NULL, NULL),
	(308, 'PULANG PISAU', 21, NULL, NULL),
	(309, 'LAMANDAU', 21, NULL, NULL),
	(310, 'SERUYAN', 21, NULL, NULL),
	(311, 'KATINGAN', 21, NULL, NULL),
	(312, 'BARITO SELATAN', 21, NULL, NULL),
	(313, 'MURUNG RAYA', 21, NULL, NULL),
	(314, 'BARITO UTARA', 21, NULL, NULL),
	(315, 'GUNUNG MAS', 21, NULL, NULL),
	(316, 'PALANGKA RAYA', 21, NULL, NULL),
	(317, 'TAPIN', 22, NULL, NULL),
	(318, 'BANJAR', 22, NULL, NULL),
	(319, 'HULU SUNGAI TENGAH', 22, NULL, NULL),
	(320, 'TABALONG', 22, NULL, NULL),
	(321, 'HULU SUNGAI UTARA', 22, NULL, NULL),
	(322, 'BALANGAN', 22, NULL, NULL),
	(323, 'TANAH BUMBU', 22, NULL, NULL),
	(324, 'BANJARMASIN', 22, NULL, NULL),
	(325, 'KOTABARU', 22, NULL, NULL),
	(326, 'TANAH LAUT', 22, NULL, NULL),
	(327, 'HULU SUNGAI SELATAN', 22, NULL, NULL),
	(328, 'BARITO KUALA', 22, NULL, NULL),
	(329, 'BANJARBARU', 22, NULL, NULL),
	(330, 'KUTAI BARAT', 23, NULL, NULL),
	(331, 'SAMARINDA', 23, NULL, NULL),
	(332, 'PASER', 23, NULL, NULL),
	(333, 'KUTAI KARTANEGARA', 23, NULL, NULL),
	(334, 'BERAU', 23, NULL, NULL),
	(335, 'PENAJAM PASER UTARA', 23, NULL, NULL),
	(336, 'BONTANG', 23, NULL, NULL),
	(337, 'KUTAI TIMUR', 23, NULL, NULL),
	(338, 'BALIKPAPAN', 23, NULL, NULL),
	(339, 'MALINAU', 24, NULL, NULL),
	(340, 'NUNUKAN', 24, NULL, NULL),
	(341, 'BULUNGAN (BULONGAN)', 24, NULL, NULL),
	(342, 'TANA TIDUNG', 24, NULL, NULL),
	(343, 'TARAKAN', 24, NULL, NULL),
	(344, 'BOLAANG MONGONDOW (BOLMONG)', 25, NULL, NULL),
	(345, 'BOLAANG MONGONDOW SELATAN', 25, NULL, NULL),
	(346, 'MINAHASA SELATAN', 25, NULL, NULL),
	(347, 'BITUNG', 25, NULL, NULL),
	(348, 'MINAHASA', 25, NULL, NULL),
	(349, 'KEPULAUAN SANGIHE', 25, NULL, NULL),
	(350, 'MINAHASA UTARA', 25, NULL, NULL),
	(351, 'KEPULAUAN TALAUD', 25, NULL, NULL),
	(352, 'KEPULAUAN SIAU TAGULANDANG BIARO (SITARO)', 25, NULL, NULL),
	(353, 'MANADO', 25, NULL, NULL),
	(354, 'BOLAANG MONGONDOW UTARA', 25, NULL, NULL),
	(355, 'BOLAANG MONGONDOW TIMUR', 25, NULL, NULL),
	(356, 'MINAHASA TENGGARA', 25, NULL, NULL),
	(357, 'KOTAMOBAGU', 25, NULL, NULL),
	(358, 'TOMOHON', 25, NULL, NULL),
	(359, 'BANGGAI KEPULAUAN', 26, NULL, NULL),
	(360, 'TOLI-TOLI', 26, NULL, NULL),
	(361, 'PARIGI MOUTONG', 26, NULL, NULL),
	(362, 'BUOL', 26, NULL, NULL),
	(363, 'DONGGALA', 26, NULL, NULL),
	(364, 'POSO', 26, NULL, NULL),
	(365, 'MOROWALI', 26, NULL, NULL),
	(366, 'TOJO UNA-UNA', 26, NULL, NULL),
	(367, 'BANGGAI', 26, NULL, NULL),
	(368, 'SIGI', 26, NULL, NULL),
	(369, 'PALU', 26, NULL, NULL),
	(370, 'MAROS', 27, NULL, NULL),
	(371, 'WAJO', 27, NULL, NULL),
	(372, 'BONE', 27, NULL, NULL),
	(373, 'SOPPENG', 27, NULL, NULL),
	(374, 'SIDENRENG RAPPANG / RAPANG', 27, NULL, NULL),
	(375, 'TAKALAR', 27, NULL, NULL),
	(376, 'BARRU', 27, NULL, NULL),
	(377, 'LUWU TIMUR', 27, NULL, NULL),
	(378, 'SINJAI', 27, NULL, NULL),
	(379, 'PANGKAJENE KEPULAUAN', 27, NULL, NULL),
	(380, 'PINRANG', 27, NULL, NULL),
	(381, 'JENEPONTO', 27, NULL, NULL),
	(382, 'PALOPO', 27, NULL, NULL),
	(383, 'TORAJA UTARA', 27, NULL, NULL),
	(384, 'LUWU', 27, NULL, NULL),
	(385, 'BULUKUMBA', 27, NULL, NULL),
	(386, 'MAKASSAR', 27, NULL, NULL),
	(387, 'SELAYAR (KEPULAUAN SELAYAR)', 27, NULL, NULL),
	(388, 'TANA TORAJA', 27, NULL, NULL),
	(389, 'LUWU UTARA', 27, NULL, NULL),
	(390, 'BANTAENG', 27, NULL, NULL),
	(391, 'GOWA', 27, NULL, NULL),
	(392, 'ENREKANG', 27, NULL, NULL),
	(393, 'PAREPARE', 27, NULL, NULL),
	(394, 'KOLAKA', 28, NULL, NULL),
	(395, 'MUNA', 28, NULL, NULL),
	(396, 'KONAWE SELATAN', 28, NULL, NULL),
	(397, 'KENDARI', 28, NULL, NULL),
	(398, 'KONAWE', 28, NULL, NULL),
	(399, 'KONAWE UTARA', 28, NULL, NULL),
	(400, 'KOLAKA UTARA', 28, NULL, NULL),
	(401, 'BUTON', 28, NULL, NULL),
	(402, 'BOMBANA', 28, NULL, NULL),
	(403, 'WAKATOBI', 28, NULL, NULL),
	(404, 'BAU-BAU', 28, NULL, NULL),
	(405, 'BUTON UTARA', 28, NULL, NULL),
	(406, 'GORONTALO UTARA', 29, NULL, NULL),
	(407, 'BONE BOLANGO', 29, NULL, NULL),
	(408, 'GORONTALO', 29, NULL, NULL),
	(409, 'BOALEMO', 29, NULL, NULL),
	(410, 'POHUWATO', 29, NULL, NULL),
	(411, 'MAJENE', 30, NULL, NULL),
	(412, 'MAMUJU', 30, NULL, NULL),
	(413, 'MAMUJU UTARA', 30, NULL, NULL),
	(414, 'POLEWALI MANDAR', 30, NULL, NULL),
	(415, 'MAMASA', 30, NULL, NULL),
	(416, 'MALUKU TENGGARA BARAT', 31, NULL, NULL),
	(417, 'MALUKU TENGGARA', 31, NULL, NULL),
	(418, 'SERAM BAGIAN BARAT', 31, NULL, NULL),
	(419, 'MALUKU TENGAH', 31, NULL, NULL),
	(420, 'SERAM BAGIAN TIMUR', 31, NULL, NULL),
	(421, 'MALUKU BARAT DAYA', 31, NULL, NULL),
	(422, 'AMBON', 31, NULL, NULL),
	(423, 'BURU', 31, NULL, NULL),
	(424, 'BURU SELATAN', 31, NULL, NULL),
	(425, 'KEPULAUAN ARU', 31, NULL, NULL),
	(426, 'TUAL', 31, NULL, NULL),
	(427, 'HALMAHERA BARAT', 32, NULL, NULL),
	(428, 'TIDORE KEPULAUAN', 32, NULL, NULL),
	(429, 'TERNATE', 32, NULL, NULL),
	(430, 'PULAU MOROTAI', 32, NULL, NULL),
	(431, 'KEPULAUAN SULA', 32, NULL, NULL),
	(432, 'HALMAHERA SELATAN', 32, NULL, NULL),
	(433, 'HALMAHERA TENGAH', 32, NULL, NULL),
	(434, 'HALMAHERA TIMUR', 32, NULL, NULL),
	(435, 'HALMAHERA UTARA', 32, NULL, NULL),
	(436, 'YALIMO', 33, NULL, NULL),
	(437, 'DOGIYAI', 33, NULL, NULL),
	(438, 'ASMAT', 33, NULL, NULL),
	(439, 'JAYAPURA', 33, NULL, NULL),
	(440, 'PANIAI', 33, NULL, NULL),
	(441, 'MAPPI', 33, NULL, NULL),
	(442, 'TOLIKARA', 33, NULL, NULL),
	(443, 'PUNCAK JAYA', 33, NULL, NULL),
	(444, 'PEGUNUNGAN BINTANG', 33, NULL, NULL),
	(445, 'JAYAWIJAYA', 33, NULL, NULL),
	(446, 'LANNY JAYA', 33, NULL, NULL),
	(447, 'NDUGA', 33, NULL, NULL),
	(448, 'BIAK NUMFOR', 33, NULL, NULL),
	(449, 'KEPULAUAN YAPEN (YAPEN WAROPEN)', 33, NULL, NULL),
	(450, 'PUNCAK', 33, NULL, NULL),
	(451, 'INTAN JAYA', 33, NULL, NULL),
	(452, 'WAROPEN', 33, NULL, NULL),
	(453, 'NABIRE', 33, NULL, NULL),
	(454, 'MIMIKA', 33, NULL, NULL),
	(455, 'BOVEN DIGOEL', 33, NULL, NULL),
	(456, 'YAHUKIMO', 33, NULL, NULL),
	(457, 'SARMI', 33, NULL, NULL),
	(458, 'MERAUKE', 33, NULL, NULL),
	(459, 'DEIYAI (DELIYAI)', 33, NULL, NULL),
	(460, 'KEEROM', 33, NULL, NULL),
	(461, 'SUPIORI', 33, NULL, NULL),
	(462, 'MAMBERAMO RAYA', 33, NULL, NULL),
	(463, 'MAMBERAMO TENGAH', 33, NULL, NULL),
	(464, 'RAJA AMPAT', 34, NULL, NULL),
	(465, 'MANOKWARI SELATAN', 34, NULL, NULL),
	(466, 'MANOKWARI', 34, NULL, NULL),
	(467, 'KAIMANA', 34, NULL, NULL),
	(468, 'MAYBRAT', 34, NULL, NULL),
	(469, 'SORONG SELATAN', 34, NULL, NULL),
	(470, 'FAKFAK', 34, NULL, NULL),
	(471, 'PEGUNUNGAN ARFAK', 34, NULL, NULL),
	(472, 'TAMBRAUW', 34, NULL, NULL),
	(473, 'SORONG', 34, NULL, NULL),
	(474, 'TELUK WONDAMA', 34, NULL, NULL),
	(475, 'TELUK BINTUNI', 34, NULL, NULL);
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.employers
CREATE TABLE IF NOT EXISTS `employers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `since` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `website` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tin` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_scale` enum('Micro','Small','Medium','Big') COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `number_of_employee` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Verified','Pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employers_category_id_foreign` (`category_id`),
  CONSTRAINT `employers_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.employers: ~3 rows (approximately)
/*!40000 ALTER TABLE `employers` DISABLE KEYS */;
INSERT INTO `employers` (`id`, `company_name`, `since`, `logo`, `description`, `website`, `telp`, `tin`, `business_scale`, `category_id`, `number_of_employee`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Pusat Karir Unmer Malang', '1964', 'pusat-karir-unmer-malang_1651033592.png', 'lorem', 'https://www.pusatkarir.unmer.ac.id', '0853453444546', '111111111111111', 'Big', 1, '>500', 'Verified', '2022-04-27 02:54:51', '2022-04-27 04:26:32'),
	(2, 'PT Ayam Jago', '2017', 'pt-ayam-jago_1651032746.jpg', NULL, NULL, '342432424', '333333333333333', 'Micro', 18, '<50', 'Verified', '2022-04-27 03:07:43', '2022-04-27 05:45:49'),
	(3, 'PT Aman Jaya', '2015', 'pt-aman-jaya_1651034668.jpg', 'Mus fusce hendrerit velit massa senectus ante praesent facilisi cursus litora tortor consectetuer ultrices tellus sagittis ornare nostra sit nibh facilisis lacinia laoreet lorem torquent aenean ac sollicitudin euismod vivamus feugiat et nulla platea ullamcorper semper luctus vitae tempus class convallis taciti inceptos turpis tincidunt phasellus urna dictumst bibendum malesuada sapien maximus quisque scelerisque at ligula aptent vehicula nullam amet nam elit a dolor molestie enim penatibus integer metus nec posuere aliquet lacus lobortis natoque nascetur magna', 'https://stackoverflow.com/', '455555555555555', '444444444444444', 'Micro', 15, '<50', 'Verified', '2022-04-27 04:38:59', '2022-04-27 05:46:37');
/*!40000 ALTER TABLE `employers` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.media
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.media: ~3 rows (approximately)
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
	(1, 'App\\Models\\Applicant', 1, '95eaf379-002d-4bfa-a694-96d082acb54f', 'documents', 'document_1651037217', 'document_1651037217.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'public', 'public', 282091, '[]', '[]', '[]', '[]', 1, '2022-04-27 05:26:59', '2022-04-27 05:26:59'),
	(2, 'App\\Models\\Applicant', 2, '6e09de33-23c2-4457-af28-6281353c5f98', 'documents', 'document_1651037543', 'document_1651037543.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'public', 'public', 84694, '[]', '[]', '[]', '[]', 2, '2022-04-27 05:32:36', '2022-04-27 05:32:36'),
	(3, 'App\\Models\\Applicant', 2, 'c995a46e-24b2-4340-9b07-135b4020830d', 'documents', 'document_1651037545', 'document_1651037545.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'public', 'public', 282091, '[]', '[]', '[]', '[]', 3, '2022-04-27 05:32:36', '2022-04-27 05:32:36');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.membership
CREATE TABLE IF NOT EXISTS `membership` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_pay` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `status` enum('Verified','Pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `membership_user_id_foreign` (`user_id`),
  CONSTRAINT `membership_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.membership: ~0 rows (approximately)
/*!40000 ALTER TABLE `membership` DISABLE KEYS */;
INSERT INTO `membership` (`id`, `user_id`, `image`, `total_pay`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
	(1, 3, 'confirmation_1651038631.png', '300000', '2022-05-27 05:50:31', 'Verified', '2022-04-27 05:50:31', '2022-04-27 05:58:27');
/*!40000 ALTER TABLE `membership` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.migrations: ~20 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_03_27_064826_create_categories_table', 1),
	(6, '2022_03_27_065330_create_articles_table', 1),
	(7, '2022_03_27_081855_create_tags_table', 1),
	(8, '2022_03_28_115810_create_taggables_table', 1),
	(9, '2022_04_01_060231_laratrust_setup_tables', 1),
	(10, '2022_04_05_055237_create_provinces_table', 1),
	(11, '2022_04_05_055513_create_cities_table', 1),
	(12, '2022_04_05_223502_create_seekers_table', 1),
	(13, '2022_04_06_004551_create_employers_table', 1),
	(14, '2022_04_06_183749_create_seeker_education_table', 1),
	(15, '2022_04_13_031749_create_pages_table', 1),
	(16, '2022_04_15_103354_create_addresses_table', 1),
	(17, '2022_04_24_050102_create_media_table', 1),
	(18, '2022_04_26_025812_create_membership_table', 1),
	(19, '2022_04_7_065214_create_vacancies_table', 1),
	(20, '2022_05_31_165812_create_vacancy_categories_table', 1),
	(21, '2022_05_32_013043_create_applicants_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.pages: ~0 rows (approximately)
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.permission_role
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.permission_role: ~0 rows (approximately)
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.permission_user
CREATE TABLE IF NOT EXISTS `permission_user` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.permission_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `permission_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_user` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.provinces
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locationid` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.provinces: ~34 rows (approximately)
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` (`id`, `name`, `locationid`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'ACEH', '1', '1', NULL, NULL),
	(2, 'SUMATERA UTARA', '1', '1', NULL, NULL),
	(3, 'SUMATERA BARAT', '1', '1', NULL, NULL),
	(4, 'RIAU', '1', '1', NULL, NULL),
	(5, 'JAMBI', '1', '1', NULL, NULL),
	(6, 'SUMATERA SELATAN', '1', '1', NULL, NULL),
	(7, 'BENGKULU', '1', '1', NULL, NULL),
	(8, 'LAMPUNG', '1', '1', NULL, NULL),
	(9, 'KEPULAUAN BANGKA BELITUNG', '1', '1', NULL, NULL),
	(10, 'KEPULAUAN RIAU', '1', '1', NULL, NULL),
	(11, 'DKI JAKARTA', '1', '1', NULL, NULL),
	(12, 'JAWA BARAT', '1', '1', NULL, NULL),
	(13, 'JAWA TENGAH', '1', '1', NULL, NULL),
	(14, 'DI YOGYAKARTA', '1', '1', NULL, NULL),
	(15, 'JAWA TIMUR', '1', '1', NULL, NULL),
	(16, 'BANTEN', '1', '1', NULL, NULL),
	(17, 'BALI', '1', '1', NULL, NULL),
	(18, 'NUSA TENGGARA BARAT', '1', '1', NULL, NULL),
	(19, 'NUSA TENGGARA TIMUR', '1', '1', NULL, NULL),
	(20, 'KALIMANTAN BARAT', '1', '1', NULL, NULL),
	(21, 'KALIMANTAN TENGAH', '1', '1', NULL, NULL),
	(22, 'KALIMANTAN SELATAN', '1', '1', NULL, NULL),
	(23, 'KALIMANTAN TIMUR', '1', '1', NULL, NULL),
	(24, 'KALIMANTAN UTARA', '1', '1', NULL, NULL),
	(25, 'SULAWESI UTARA', '1', '1', NULL, NULL),
	(26, 'SULAWESI TENGAH', '1', '1', NULL, NULL),
	(27, 'SULAWESI SELATAN', '1', '1', NULL, NULL),
	(28, 'SULAWESI TENGGARA', '1', '1', NULL, NULL),
	(29, 'GORONTALO', '1', '1', NULL, NULL),
	(30, 'SULAWESI BARAT', '1', '1', NULL, NULL),
	(31, 'MALUKU', '1', '1', NULL, NULL),
	(32, 'MALUKU UTARA', '1', '1', NULL, NULL),
	(33, 'PAPUA', '1', '1', NULL, NULL),
	(34, 'PAPUA BARAT', '1', '1', NULL, NULL);
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Superadmin', 'is to manage everything on the system', '2022-04-27 02:54:50', '2022-04-27 02:54:50'),
	(2, 'employer', 'Company', 'is to manage everything on the system', '2022-04-27 02:54:50', '2022-04-27 02:54:50'),
	(3, 'seeker', 'User Public', 'is to manage everything on the system', '2022-04-27 02:54:50', '2022-04-27 02:54:50');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.role_user: ~4 rows (approximately)
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
	(1, 1, 'App\\Models\\User'),
	(2, 2, 'App\\Models\\User'),
	(2, 3, 'App\\Models\\User'),
	(3, 4, 'App\\Models\\User');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.seekers
CREATE TABLE IF NOT EXISTS `seekers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` enum('Single','Married') COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.seekers: ~1 rows (approximately)
/*!40000 ALTER TABLE `seekers` DISABLE KEYS */;
INSERT INTO `seekers` (`id`, `first_name`, `last_name`, `logo`, `date_of_birth`, `gender`, `marital_status`, `telp`, `website`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Dwi', 'Rudianto', 'dwi_1651036520.jpg', '2000-04-12', 'Male', 'Married', '0854454545', 'https://www.youtube.com/', 'Penatibus volutpat sit augue phasellus letius interdum consequat auctor primis lobortis rhoncus nec ex tempor lacus iaculis habitasse potenti lorem adipiscing netus proin pretium viverra nostra magna non pharetra metus inceptos taciti ornare tortor cubilia ipsum gravida venenatis curae neque turpis nulla per diam fringilla pulvinar consectetuer torquent', '2022-04-27 05:11:29', '2022-04-27 05:17:38');
/*!40000 ALTER TABLE `seekers` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.seeker_education
CREATE TABLE IF NOT EXISTS `seeker_education` (
  `seeker_id` bigint(20) unsigned NOT NULL,
  `last_education` enum('S2','S1','D4','D3','D2','D1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `major` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `graduation_year` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gpa` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `seeker_education_seeker_id_foreign` (`seeker_id`),
  CONSTRAINT `seeker_education_seeker_id_foreign` FOREIGN KEY (`seeker_id`) REFERENCES `seekers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.seeker_education: ~1 rows (approximately)
/*!40000 ALTER TABLE `seeker_education` DISABLE KEYS */;
INSERT INTO `seeker_education` (`seeker_id`, `last_education`, `major`, `institute_name`, `graduation_year`, `gpa`, `created_at`, `updated_at`) VALUES
	(1, 'D2', '91', 'Universitas Merdeka Malang', '2023', '4.7', '2022-04-27 05:11:29', '2022-04-27 05:11:29');
/*!40000 ALTER TABLE `seeker_education` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.taggables
CREATE TABLE IF NOT EXISTS `taggables` (
  `tag_id` bigint(20) unsigned NOT NULL,
  `taggable_id` bigint(20) NOT NULL,
  `taggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `taggables_tag_id_foreign` (`tag_id`),
  KEY `taggables_taggable_id_taggable_type_index` (`taggable_id`,`taggable_type`),
  CONSTRAINT `taggables_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.taggables: ~0 rows (approximately)
/*!40000 ALTER TABLE `taggables` DISABLE KEYS */;
/*!40000 ALTER TABLE `taggables` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.tags: ~0 rows (approximately)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userable_id` bigint(20) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `users_userable_type_userable_id_index` (`userable_type`,`userable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `username`, `email_verified_at`, `password`, `userable_type`, `userable_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'pusatkarir@unmer.ac.id', 'pusatkarir-unmermalang', NULL, '$2y$10$L5507DvHlngpEwCXg6f5R.fCngDhZPO72PkSAHGdFs4FoEBhvPRH.', 'App\\Models\\Employer', 1, NULL, '2022-04-27 02:54:51', '2022-04-27 03:45:27'),
	(2, 'ayamjago@gmail.com', 'ayamjago', '2022-04-27 03:08:24', '$2y$10$SR0pdvvcSOrmmffL4Er9..kU1Wj5aGeO6hyrsoLTHFurGXr.iQTSK', 'App\\Models\\Employer', 2, NULL, '2022-04-27 03:07:43', '2022-04-27 03:08:24'),
	(3, 'amanjaya@email.com', 'amanjaya', '2022-04-27 04:43:56', '$2y$10$cDiB7Y5lXcrwe.XNxrz/wuNWI5amWLd4xnZzgrBufmuSiG1An.fZm', 'App\\Models\\Employer', 3, 'FYOtgXjbo3PGKGZ7wdWEEhKbofXL1nINMmDXVyLK0eYJ80z4Cz3R4FCje1qw', '2022-04-27 04:38:59', '2022-04-27 04:43:56'),
	(4, 'dwirudianto@gmail.com', 'dwirudianto', '2022-04-27 05:12:18', '$2y$10$YUWQKHhv9aoV6UPmmYWhzOeARg0Ko8Eci3NpgwyXCmzC5rXrxbTbe', 'App\\Models\\Seeker', 1, NULL, '2022-04-27 05:11:29', '2022-04-27 05:12:18');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.vacancies
CREATE TABLE IF NOT EXISTS `vacancies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employer_id` bigint(20) unsigned NOT NULL,
  `job_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_type` enum('Permanent-employment','Fixed-term','Part-time','Outsourcing','Internship') COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vacancies_employer_id_foreign` (`employer_id`),
  CONSTRAINT `vacancies_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.vacancies: ~1 rows (approximately)
/*!40000 ALTER TABLE `vacancies` DISABLE KEYS */;
INSERT INTO `vacancies` (`id`, `employer_id`, `job_title`, `slug`, `description`, `job_type`, `expiry_date`, `created_at`, `updated_at`) VALUES
	(1, 3, 'Web Developer Update', 'web-developer-at-pt-aman-jaya', '<p>Augue mi nostra volutpat risus suscipit imperdiet libero vivamus cras vitae lobortis dictum in dapibus lectus tristique eget hendrerit condimentum penatibus ut natoque facilisis felis si tellus leo magnis consectetur bibendum ac elit maecenas mollis praesent metus sit dolor pretium senectus porttitor id aliquet egestas velit montes nullam auctor sociosqu litora tempus ullamcorper pharetra adipiscing vel est semper aptent letius quam placerat dictumst nunc sagittis enim ridiculus lacus eros lacinia feugiat ligula fusce gravida tortor a justo</p>', 'Permanent-employment', '2022-04-28 11:50:50', '2022-04-27 04:51:08', '2022-04-27 04:52:35');
/*!40000 ALTER TABLE `vacancies` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
