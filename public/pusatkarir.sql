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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.addresses: ~23 rows (approximately)
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` (`id`, `province_id`, `city_id`, `street`, `zip_code`, `addressable_type`, `addressable_id`, `created_at`, `updated_at`) VALUES
	(1, 15, 232, 'Jalan Terusan Dieng No. 62-64, Pisang Candi, Sukun', '65146', 'App\\Models\\Employer', 1, '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(2, 19, 270, 'Repellat autem aut eos sed vel blanditiis possimus.', '8202817010', 'App\\Models\\Vacancy', 1, '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(3, 12, 174, 'Amet accusamus qui quia omnis sed vitae reiciendis.', '2603938383', 'App\\Models\\Vacancy', 2, '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(4, 28, 396, 'Autem eum et quasi explicabo impedit.', '8647053334', 'App\\Models\\Vacancy', 3, '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(5, 31, 420, 'Reprehenderit quibusdam nam nulla vel deleniti iure velit.', '0164326752', 'App\\Models\\Vacancy', 4, '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(6, 6, 112, 'Consectetur tempora eligendi aut inventore itaque dolores.', '8966785197', 'App\\Models\\Vacancy', 5, '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(7, 14, 211, 'Omnis saepe quod ad rerum vero.', '4003043006', 'App\\Models\\Vacancy', 6, '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(8, 28, 402, 'Error consequatur ut iure et et autem.', '1484857581', 'App\\Models\\Vacancy', 7, '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(9, 25, 351, 'Omnis aut laudantium sint omnis aspernatur et est et.', '1615687238', 'App\\Models\\Vacancy', 8, '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(10, 27, 373, 'Ut ut modi ut reiciendis sed et distinctio.', '8369750703', 'App\\Models\\Vacancy', 9, '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(11, 13, 194, 'Esse nemo soluta nesciunt sed eos.', '3227179771', 'App\\Models\\Vacancy', 10, '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(12, 15, 238, 'Est est voluptatem alias.', '7015780730', 'App\\Models\\Vacancy', 11, '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(13, 9, 138, 'Exercitationem ut eos non non.', '5861401715', 'App\\Models\\Vacancy', 12, '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(14, 13, 202, 'Sapiente et rerum alias delectus quis eum.', '8529490609', 'App\\Models\\Vacancy', 13, '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(15, 34, 469, 'Incidunt tempore qui id quasi fuga ipsa.', '1455626364', 'App\\Models\\Vacancy', 14, '2022-05-14 21:14:23', '2022-05-14 21:14:23'),
	(16, 16, 246, 'Repudiandae necessitatibus voluptatem ad reiciendis enim nihil nobis.', '3918044042', 'App\\Models\\Vacancy', 15, '2022-05-14 21:14:23', '2022-05-14 21:14:23'),
	(17, 1, 18, 'Aliquam rerum expedita error commodi qui necessitatibus iusto.', '5281905385', 'App\\Models\\Vacancy', 16, '2022-05-14 21:14:23', '2022-05-14 21:14:23'),
	(18, 25, 347, 'Aliquid cumque rerum aliquam unde sint corrupti.', '4527799092', 'App\\Models\\Vacancy', 17, '2022-05-14 21:14:23', '2022-05-14 21:14:23'),
	(19, 1, 10, 'Sequi ducimus et error.', '4709645475', 'App\\Models\\Vacancy', 18, '2022-05-14 21:14:23', '2022-05-14 21:14:23'),
	(20, 24, 339, 'Et explicabo officiis et occaecati ut voluptatem amet unde.', '8613594455', 'App\\Models\\Vacancy', 19, '2022-05-14 21:14:23', '2022-05-14 21:14:23'),
	(21, 13, 180, 'Veritatis voluptas quidem sit et quis amet.', '9376727895', 'App\\Models\\Vacancy', 20, '2022-05-14 21:14:23', '2022-05-14 21:14:23'),
	(22, 28, 404, 'Labore dolore dignissimos incidunt in ex consequatur.', '9759418863', 'App\\Models\\Seeker', 1, '2022-05-14 21:14:23', '2022-05-14 21:14:23'),
	(23, 26, 359, 'Voluptatem velit qui voluptatem tempore reiciendis aut quia.', '2901758771', 'App\\Models\\Seeker', 2, '2022-05-14 21:14:23', '2022-05-14 21:14:23'),
	(24, 20, 298, 'Quis nisi eum sit et nulla ipsa velit et.', '7600132595', 'App\\Models\\Seeker', 3, '2022-05-14 21:14:23', '2022-05-14 21:14:23');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.applicants: ~0 rows (approximately)
/*!40000 ALTER TABLE `applicants` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.articles: ~20 rows (approximately)
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`id`, `user_id`, `title`, `slug`, `thumbnail`, `content`, `category_id`, `tag`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Voluptatum qui consequatur qui inventore unde dolorum.', 'voluptatum-qui-consequatur-qui-inventore-unde-dolorum', 'https://via.placeholder.com/640x480.png/006677?text=quia', 'Dolor sit quae modi aperiam illo delectus odio voluptatem. Corporis voluptas blanditiis odio atque et et.', 105, NULL, '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(2, 1, 'Quis omnis rerum aut sit sit.', 'quis-omnis-rerum-aut-sit-sit', 'https://via.placeholder.com/640x480.png/00bb44?text=laboriosam', 'Porro omnis quos ut non consequatur quis enim quam. In id iusto qui fuga. Consequatur sed possimus voluptatem dolor.', 104, NULL, '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(3, 1, 'Inventore quas qui accusantium quo est exercitationem sed.', 'inventore-quas-qui-accusantium-quo-est-exercitationem-sed', 'https://via.placeholder.com/640x480.png/00ee88?text=eum', 'Ut nulla doloremque commodi reiciendis. Suscipit autem reiciendis necessitatibus quia quisquam.', 95, NULL, '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(4, 1, 'Autem et id earum culpa et rem.', 'autem-et-id-earum-culpa-et-rem', 'https://via.placeholder.com/640x480.png/001122?text=aut', 'Aperiam adipisci repellat maiores blanditiis. Recusandae aut impedit officiis iste quisquam. Sed quisquam optio mollitia est qui porro. Nihil odit consequatur illo minima eligendi aliquid ea.', 94, NULL, '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(5, 1, 'In quibusdam sed aut odio adipisci inventore.', 'in-quibusdam-sed-aut-odio-adipisci-inventore', 'https://via.placeholder.com/640x480.png/00cc88?text=qui', 'Quas laboriosam ad aut et. Est aliquam a et eos rem beatae. Quod molestiae modi consequatur tempore deleniti assumenda non. Vero modi libero fuga aperiam numquam doloribus.', 105, NULL, '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(6, 1, 'Non aut velit qui est placeat eos.', 'non-aut-velit-qui-est-placeat-eos', 'https://via.placeholder.com/640x480.png/0055dd?text=fuga', 'Illo ratione unde harum sunt quia modi. Natus molestiae dolores iure ullam doloremque. Alias sapiente molestiae fuga aut. Qui id in et quo et harum.', 95, NULL, '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(7, 1, 'Natus eius corrupti et in dolores et.', 'natus-eius-corrupti-et-in-dolores-et', 'https://via.placeholder.com/640x480.png/003344?text=dolorum', 'Qui qui et voluptate excepturi in. Reprehenderit cumque eius debitis quibusdam fugit. Non placeat itaque quia ut mollitia et saepe fuga.', 95, NULL, '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(8, 1, 'Pariatur tenetur et illo vitae.', 'pariatur-tenetur-et-illo-vitae', 'https://via.placeholder.com/640x480.png/00dd33?text=repellendus', 'Numquam voluptas repellendus facere quo ut sed. Vitae natus voluptatum consequatur delectus voluptatem maxime ratione. Consequuntur ea ea aut possimus.', 95, NULL, '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(9, 1, 'Ad aperiam ut et.', 'ad-aperiam-ut-et', 'https://via.placeholder.com/640x480.png/004411?text=ratione', 'Et ipsa vel culpa expedita repellendus. Sint velit est quis consequatur. Molestias voluptate vitae quaerat saepe doloremque. Temporibus doloribus et dolorum.', 105, NULL, '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(10, 1, 'Aut animi maxime vitae assumenda aut est ea eius.', 'aut-animi-maxime-vitae-assumenda-aut-est-ea-eius', 'https://via.placeholder.com/640x480.png/00ff99?text=suscipit', 'Et cupiditate sequi eos sit neque. Qui perferendis consequatur aut. Asperiores voluptatem ea earum tenetur velit. Assumenda illo est minima qui.', 97, NULL, '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(11, 1, 'Sint aut atque vitae ea praesentium et molestiae doloremque.', 'sint-aut-atque-vitae-ea-praesentium-et-molestiae-doloremque', 'https://via.placeholder.com/640x480.png/0077aa?text=sint', 'Totam nihil recusandae accusantium placeat aut impedit omnis. Et architecto laboriosam consectetur sed ut ad veniam et. Deserunt id veritatis quidem amet architecto eum. Voluptatibus et expedita quas ut voluptatem. Corrupti itaque qui ipsum qui voluptas rem.', 95, NULL, '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(12, 1, 'Dignissimos nisi aut maiores inventore quidem voluptas.', 'dignissimos-nisi-aut-maiores-inventore-quidem-voluptas', 'https://via.placeholder.com/640x480.png/00ccee?text=accusamus', 'Rerum odit recusandae voluptas recusandae sit. Delectus ut consequuntur voluptatem. Illo iste quis aut placeat quasi. Numquam nam sed laudantium quas et animi.', 102, NULL, '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(13, 1, 'Rerum alias quisquam architecto exercitationem autem dolorem.', 'rerum-alias-quisquam-architecto-exercitationem-autem-dolorem', 'https://via.placeholder.com/640x480.png/006666?text=repellat', 'Dicta voluptatem tempore tempore nam aut ipsam facilis quasi. Ut nesciunt nihil sint libero expedita voluptas neque. Voluptas et accusamus eaque repellat.', 95, NULL, '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(14, 1, 'Similique eum earum aliquam non omnis quaerat numquam quia.', 'similique-eum-earum-aliquam-non-omnis-quaerat-numquam-quia', 'https://via.placeholder.com/640x480.png/004433?text=voluptatibus', 'Porro numquam eligendi aliquam officia qui rerum. Voluptatem nemo et maiores tempore odio quia. Enim corrupti provident sed eius amet dolorem architecto.', 102, NULL, '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(15, 1, 'Illum id ducimus et ex non quo fuga.', 'illum-id-ducimus-et-ex-non-quo-fuga', 'https://via.placeholder.com/640x480.png/00bbbb?text=odio', 'Dolorum nulla et explicabo voluptatibus. Sunt aut itaque earum voluptates aspernatur nisi. Voluptatum dicta repellendus magnam delectus.', 95, NULL, '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(16, 1, 'Necessitatibus beatae odit ex omnis.', 'necessitatibus-beatae-odit-ex-omnis', 'https://via.placeholder.com/640x480.png/0088dd?text=amet', 'Deleniti eum id maiores mollitia doloremque et. Quidem architecto est animi. Et ab quam ut facilis. Odit perspiciatis sit rerum quam minima.', 104, NULL, '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(17, 1, 'Vel nam magnam itaque dignissimos aspernatur iure.', 'vel-nam-magnam-itaque-dignissimos-aspernatur-iure', 'https://via.placeholder.com/640x480.png/00ff22?text=voluptas', 'Id explicabo sunt dolor architecto rem tenetur hic. Dolore eveniet numquam fugiat itaque ut quis sed aperiam. Sed enim consequatur iusto ad atque necessitatibus. Laudantium possimus voluptates exercitationem et earum atque velit.', 105, NULL, '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(18, 1, 'Ratione reiciendis natus aperiam blanditiis sit.', 'ratione-reiciendis-natus-aperiam-blanditiis-sit', 'https://via.placeholder.com/640x480.png/00ccff?text=ex', 'Placeat aut dolore consequuntur cupiditate ducimus id. Beatae iusto laudantium qui dolorum non explicabo et et. Quidem sit quia voluptas quos.', 94, NULL, '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(19, 1, 'Sit exercitationem voluptatem iste.', 'sit-exercitationem-voluptatem-iste', 'https://via.placeholder.com/640x480.png/000000?text=est', 'Cupiditate fugiat quis sed quisquam eveniet expedita nulla. Et quasi unde veritatis error sit harum.', 102, NULL, '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(20, 1, 'Et ut aut esse commodi error sed voluptate ratione.', 'et-ut-aut-esse-commodi-error-sed-voluptate-ratione', 'https://via.placeholder.com/640x480.png/00bbbb?text=illo', 'Impedit esse porro praesentium hic consequuntur. Maiores voluptatum tempora id autem sit. Rerum rem at enim nobis consequatur mollitia.', 111, NULL, '2022-05-14 21:14:21', '2022-05-14 21:14:21');
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
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.categories: ~111 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `slug`, `type`, `created_at`, `updated_at`) VALUES
	(1, 'Pendidikan', 'pendidikan', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(2, 'Akuntan / Auditor', 'akuntan-auditor', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(3, 'Asuransi', 'asuransi', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(4, 'Bioteknologi & Biologi', 'bioteknologi-biologi', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(5, 'Biro Perjalanan', 'biro-perjalanan', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(6, 'Bubur Kertas / Kertas', 'bubur-kertas-kertas', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(7, 'Desain Interior', 'desain-interior', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(8, 'E-Commerce', 'e-commerce', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(9, 'Ekspedisi / Agen Kargo', 'ekspedisi-agen-kargo', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(10, 'Elektronika / Semikonduktor', 'elektronika-semikonduktor', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(11, 'Energi', 'energi', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(12, 'Event Organizer', 'event-organizer', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(13, 'Farmasi', 'farmasi', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(14, 'Furnitur', 'furnitur', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(15, 'Garmen / Tekstil', 'garmen-tekstil', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(16, 'Hiburan', 'hiburan', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(17, 'Hotel', 'hotel', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(18, 'Hukum', 'hukum', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(19, 'Internet', 'internet', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(20, 'Jasa Ground handling', 'jasa-ground-handling', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(21, 'Jasa Pemindahan', 'jasa-pemindahan', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(22, 'Jasa Pengamanan', 'jasa-pengamanan', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(23, 'Jasa Pengendalian Hama', 'jasa-pengendalian-hama', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(24, 'Kecantikan / Fitness', 'kecantikan-fitness', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(25, 'Kehutanan / Perkayuan', 'kehutanan-perkayuan', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(26, 'Kelautan / Aquakultur', 'kelautan-aquakultur', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(27, 'Keramik & Alat Kebersihan', 'keramik-alat-kebersihan', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(28, 'Keuangan / Bank', 'keuangan-bank', 'Business Field', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(29, 'Kimia', 'kimia', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(30, 'Komputer / IT-Hardware', 'komputer-it-hardware', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(31, 'Komputer / TI', 'komputer-ti', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(32, 'Konglomerasi', 'konglomerasi', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(33, 'Konstruksi', 'konstruksi', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(34, 'Konsultan', 'konsultan', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(35, 'Konsultan (Bisnis & Manajemen)', 'konsultan-bisnis-manajemen', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(36, 'Konsultan (IT; IPTEK)', 'konsultan-it-iptek', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(37, 'Kosmetik', 'kosmetik', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(38, 'Kulit', 'kulit', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(39, 'Kurir', 'kurir', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(40, 'Logam', 'logam', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(41, 'Logistik / Transportasi', 'logistik-transportasi', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(42, 'Mainan', 'mainan', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(43, 'Makanan dan Minuman', 'makanan-dan-minuman', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(44, 'Manajemen Fasilitas', 'manajemen-fasilitas', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(45, 'Manajemen Lingkungan / Limbah', 'manajemen-lingkungan-limbah', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(46, 'Manufactur & Retail Building Material', 'manufactur-retail-building-material', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(47, 'Manufaktur', 'manufaktur', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(48, 'Manufaktur Elektronik', 'manufaktur-elektronik', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(49, 'Media', 'media', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(50, 'Mekanik / Listrik', 'mekanik-listrik', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(51, 'Mesin / Peralatan', 'mesin-peralatan', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(52, 'Minyak dan Gas', 'minyak-dan-gas', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(53, 'Otomotif', 'otomotif', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(54, 'Pemerintahan', 'pemerintahan', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(55, 'Pemrosesan Makanan', 'pemrosesan-makanan', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(56, 'Penerbangan', 'penerbangan', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(57, 'Pengapalan', 'pengapalan', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(58, 'Pengolahan Sumber Daya Alam', 'pengolahan-sumber-daya-alam', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(59, 'Perawatan Kesehatan', 'perawatan-kesehatan', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(60, 'Percetakan dan Kemasan', 'percetakan-dan-kemasan', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(61, 'Perdagangan Komoditas', 'perdagangan-komoditas', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(62, 'Perdagangan Umum', 'perdagangan-umum', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(63, 'Pergudangan', 'pergudangan', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(64, 'Perikanan', 'perikanan', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(65, 'Periklanan / Penerbitan', 'periklanan-penerbitan', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(66, 'Permata & Perhiasan', 'permata-perhiasan', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(67, 'Permen / Biskuit', 'permen-biskuit', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(68, 'Pertambangan / Mineral', 'pertambangan-mineral', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(69, 'Polimer / Plastik / Karet', 'polimer-plastik-karet', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(70, 'Produk Konsumen', 'produk-konsumen', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(71, 'Produk Konsumen Elektronik', 'produk-konsumen-elektronik', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(72, 'Properti', 'properti', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(73, 'Pupuk & Pestisida', 'pupuk-pestisida', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(74, 'Rancang Bangun Pesawat', 'rancang-bangun-pesawat', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(75, 'Rekayasa & Konstruksi', 'rekayasa-konstruksi', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(76, 'Rekrutmen / KPO', 'rekrutmen-kpo', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(77, 'Restoran', 'restoran', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(78, 'Ritel', 'ritel', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(79, 'Sektor Nirlaba', 'sektor-nirlaba', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(80, 'Semen', 'semen', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(81, 'Seni / Desain / Fashion', 'seni-desain-fashion', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(82, 'Servis', 'servis', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(83, 'Sistem Pemadam Kebakaran', 'sistem-pemadam-kebakaran', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(84, 'Startup dan Fintech', 'startup-dan-fintech', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(85, 'Sumber Daya Alam Lainnya', 'sumber-daya-alam-lainnya', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(86, 'Teknologi Finansial', 'teknologi-finansial', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(87, 'Telekomunikasi', 'telekomunikasi', 'Business Field', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(88, 'Akuntasi', 'akuntasi', 'Major', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(89, 'Sistem Informasi', 'sistem-informasi', 'Major', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(90, 'Hukum', 'hukum', 'Major', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(91, 'Pariwisata', 'pariwisata', 'Major', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(92, 'Aspernatur', 'aspernatur', 'Major', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(93, 'Voluptas', 'voluptas', 'Major', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(94, 'Ducimus', 'ducimus', 'News', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(95, 'Id', 'id', 'News', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(96, 'Assumenda', 'assumenda', 'Major', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(97, 'Culpa', 'culpa', 'News', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(98, 'Libero', 'libero', 'Major', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(99, 'Sint', 'sint', 'Major', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(100, 'Aut', 'aut', 'Major', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(101, 'Consectetur', 'consectetur', 'Major', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(102, 'Porro', 'porro', 'News', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(103, 'Qui', 'qui', 'Major', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(104, 'Numquam', 'numquam', 'News', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(105, 'Vero', 'vero', 'News', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(106, 'Tempora', 'tempora', 'Major', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(107, 'Nihil', 'nihil', 'Major', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(108, 'Excepturi', 'excepturi', 'News', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(109, 'Deleniti', 'deleniti', 'Major', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(110, 'Quaerat', 'quaerat', 'Major', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(111, 'Perferendis', 'perferendis', 'News', '2022-05-14 21:14:21', '2022-05-14 21:14:21');
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

-- Dumping data for table pusatkarir.category_vacancy: ~36 rows (approximately)
/*!40000 ALTER TABLE `category_vacancy` DISABLE KEYS */;
INSERT INTO `category_vacancy` (`vacancy_id`, `category_id`, `created_at`, `updated_at`) VALUES
	(1, 98, NULL, NULL),
	(1, 107, NULL, NULL),
	(1, 110, NULL, NULL),
	(2, 93, NULL, NULL),
	(2, 96, NULL, NULL),
	(2, 103, NULL, NULL),
	(3, 103, NULL, NULL),
	(4, 101, NULL, NULL),
	(4, 106, NULL, NULL),
	(5, 99, NULL, NULL),
	(6, 99, NULL, NULL),
	(6, 110, NULL, NULL),
	(7, 103, NULL, NULL),
	(8, 101, NULL, NULL),
	(9, 96, NULL, NULL),
	(9, 107, NULL, NULL),
	(10, 101, NULL, NULL),
	(11, 110, NULL, NULL),
	(12, 107, NULL, NULL),
	(12, 109, NULL, NULL),
	(13, 98, NULL, NULL),
	(13, 109, NULL, NULL),
	(14, 100, NULL, NULL),
	(14, 103, NULL, NULL),
	(14, 110, NULL, NULL),
	(15, 109, NULL, NULL),
	(16, 103, NULL, NULL),
	(17, 101, NULL, NULL),
	(17, 107, NULL, NULL),
	(18, 99, NULL, NULL),
	(18, 107, NULL, NULL),
	(19, 93, NULL, NULL),
	(19, 98, NULL, NULL),
	(19, 106, NULL, NULL),
	(20, 96, NULL, NULL),
	(20, 109, NULL, NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.employers: ~0 rows (approximately)
/*!40000 ALTER TABLE `employers` DISABLE KEYS */;
INSERT INTO `employers` (`id`, `company_name`, `since`, `logo`, `description`, `website`, `telp`, `tin`, `business_scale`, `category_id`, `number_of_employee`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Pusat Karir Unmer Malang', '1964', 'pusat-karir-unmer-malang.png', 'Fermentum mi blandit aptent etiam malesuada amet donec placerat rutrum euismod sagittis adipiscing magnis leo vitae sociosqu si cursus per ullamcorper facilisi ac lacus porttitor condimentum phasellus mauris aliquet diam erat maecenas sed nisl tortor vulputate class dolor ad pretium risus arcu in ut faucibus magna maximus efficitur nisi habitasse hendrerit nascetur vivamus fusce mollis odio litora curabitur sit consequat bibendum lobortis nibh hac laoreet curae non porta parturient commodo facilisis vestibulum ultricies quis', 'https://pusatkarir.unmer.ac.id/', '0853453444546', '111111111111111', 'Big', 1, '>500', 'Verified', '2022-05-14 21:14:19', '2022-05-14 21:14:19');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.media: ~0 rows (approximately)
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.membership: ~0 rows (approximately)
/*!40000 ALTER TABLE `membership` DISABLE KEYS */;
/*!40000 ALTER TABLE `membership` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.migrations: ~21 rows (approximately)
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carousel` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.pages: ~8 rows (approximately)
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`id`, `name`, `title`, `slug`, `content`, `image`, `carousel`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'About', 'Selamat datang diwebsite resmi Puskar Unmer Malang', 'about', 'Habitasse curabitur mi massa dictum proin per lobortis orci ac laoreet leo velit sodales molestie est primis eros senectus amet ad duis consectetuer mus egestas posuere rutrum parturient mauris libero pellentesque donec aenean aliquam vel ultrices si risus integer ligula condimentum platea et sem fermentum erat hac morbi non quisque placerat cubilia vehicula elit at ultricies ut dignissim ex iaculis porta malesuada semper lorem accumsan imperdiet tellus convallis tempus aptent efficitur suscipit eu etiam', 'slide.jpg', '1', 'active', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(2, 'Term and conditions', 'Syarat & Ketentuan Pendaftar Puskar Unmer', 'term-and-conditions', 'Viverra si ridiculus penatibus letius adipiscing platea nec ac id dignissim nibh commodo vehicula ornare interdum eros cubilia nascetur mus egestas non etiam dis sociosqu pulvinar vivamus auctor laoreet conubia lobortis fermentum ipsum duis dui hendrerit porttitor himenaeos cursus diam mi convallis condimentum inceptos massa fusce donec tellus purus et elit euismod curae lorem in feugiat ullamcorper class augue neque gravida vel hac senectus finibus imperdiet vulputate aenean odio primis rutrum justo dapibus montes', 'https://via.placeholder.com/1920x800.png/003300?text=ut', '0', 'active', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(3, 'Membership', 'Dapatkan keuntung beragabung menjadi member Puskar Unmer Malang', 'membership', 'Habitasse curabitur mi massa dictum proin per lobortis orci ac laoreet leo velit sodales molestie est primis eros senectus amet ad duis consectetuer mus egestas posuere rutrum parturient mauris libero pellentesque donec aenean aliquam vel ultrices si risus integer ligula condimentum platea et sem fermentum erat hac morbi non quisque placerat cubilia vehicula elit at ultricies ut dignissim ex iaculis porta malesuada semper lorem accumsan imperdiet tellus convallis tempus aptent efficitur suscipit eu etiam', 'https://via.placeholder.com/1920x800.png/0000bb?text=quod', '0', 'active', '2022-05-14 21:14:20', '2022-05-14 21:14:20'),
	(4, 'Veritatis', 'Natus et voluptatum nam ratione qui quasi totam et.', 'veritatis', 'Voluptas fugiat ut et ut et repudiandae aut et. Repellat ab voluptatum quisquam adipisci. Distinctio error tempora facilis facilis voluptatem deserunt quas. Deserunt quibusdam maiores enim neque a excepturi ipsam.', 'https://via.placeholder.com/1920x800.png/002277?text=qui', '1', 'active', '2022-05-14 21:14:23', '2022-05-14 21:14:23'),
	(5, 'Odit', 'Omnis voluptate est qui eveniet qui et sunt voluptatem.', 'odit', 'Omnis id sunt maiores et. Eum voluptatem deserunt sit officiis quaerat nobis assumenda vel. Delectus voluptates recusandae culpa accusantium et. Exercitationem est excepturi ullam dolores. Eius dolor est ipsam molestiae non.', 'https://via.placeholder.com/1920x800.png/00aa55?text=veniam', '1', 'active', '2022-05-14 21:14:23', '2022-05-14 21:14:23'),
	(6, 'Voluptatibus', 'A voluptas quis reprehenderit aspernatur eos.', 'voluptatibus', 'Impedit aut voluptates illum accusamus. Sed iure eum voluptatem. Non aut in ab eum cumque est porro.', 'https://via.placeholder.com/1920x800.png/007733?text=vero', '1', 'active', '2022-05-14 21:14:23', '2022-05-14 21:14:23'),
	(7, 'Repudiandae', 'Culpa maiores veritatis tempora quae voluptatem.', 'repudiandae', 'Vel nesciunt tempore ut sint exercitationem. Aperiam sit doloremque repudiandae consequatur.', 'https://via.placeholder.com/1920x800.png/00ddff?text=voluptatem', '1', 'active', '2022-05-14 21:14:23', '2022-05-14 21:14:23'),
	(8, 'Quam', 'Omnis labore similique reiciendis.', 'quam', 'Hic similique aperiam quod est corporis ab sed. Qui dolorum quia asperiores sapiente. Voluptatem quos vel est possimus voluptates qui numquam. Recusandae quasi corporis expedita ipsum consectetur.', 'https://via.placeholder.com/1920x800.png/00ee11?text=aliquid', '1', 'active', '2022-05-14 21:14:23', '2022-05-14 21:14:23');
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
	(1, 'admin', 'Superadmin', 'is to manage everything on the system', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(2, 'employer', 'Company', 'is to manage everything on the system', '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(3, 'seeker', 'User Public', 'is to manage everything on the system', '2022-05-14 21:14:19', '2022-05-14 21:14:19');
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

-- Dumping data for table pusatkarir.role_user: ~5 rows (approximately)
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
	(1, 1, 'App\\Models\\User'),
	(2, 1, 'App\\Models\\User'),
	(3, 2, 'App\\Models\\User'),
	(3, 3, 'App\\Models\\User'),
	(3, 4, 'App\\Models\\User');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.seekers
CREATE TABLE IF NOT EXISTS `seekers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` enum('Single','Married') COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.seekers: ~3 rows (approximately)
/*!40000 ALTER TABLE `seekers` DISABLE KEYS */;
INSERT INTO `seekers` (`id`, `first_name`, `last_name`, `logo`, `date_of_birth`, `gender`, `marital_status`, `telp`, `website`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Kaleb', 'Carleton', 'https://via.placeholder.com/200x200.png/00ee66?text=qui', '2000-05-03', 'Male', 'Married', '2512040680', 'http://waters.com/nostrum-consectetur-consequatur-sapiente-fugiat-accusamus-laborum-iste', 'Eveniet placeat atque recusandae vero. Accusantium ut rem aut ullam. Qui unde libero perspiciatis quae.', '2022-05-14 21:14:23', '2022-05-14 21:14:23'),
	(2, 'Osborne', 'Celine', 'https://via.placeholder.com/200x200.png/008833?text=repellendus', '2000-09-25', 'Male', 'Married', '2617369161', 'https://howell.com/non-qui-aut-consequuntur-fuga-rerum-sint.html', 'Aut voluptatem qui corporis. Maiores similique voluptatibus et blanditiis culpa pariatur. Provident ut natus magni voluptas repellendus voluptatem.', '2022-05-14 21:14:23', '2022-05-14 21:14:23'),
	(3, 'Gudrun', 'Onie', 'https://via.placeholder.com/200x200.png/00dd77?text=ducimus', '1992-01-30', 'Male', 'Married', '3689166248', 'http://kohler.info/quam-saepe-ut-dolor-quia-omnis-laudantium.html', 'Et a eos quia molestiae provident sint cumque. Hic quos dolores nulla necessitatibus omnis harum aperiam. Officiis dolor voluptatibus maiores dolorum qui iusto aperiam.', '2022-05-14 21:14:23', '2022-05-14 21:14:23');
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

-- Dumping data for table pusatkarir.seeker_education: ~3 rows (approximately)
/*!40000 ALTER TABLE `seeker_education` DISABLE KEYS */;
INSERT INTO `seeker_education` (`seeker_id`, `last_education`, `major`, `institute_name`, `graduation_year`, `gpa`, `created_at`, `updated_at`) VALUES
	(1, 'D1', '110', 'Facere Cum Qui', '2022', '646', '2022-05-14 21:14:23', '2022-05-14 21:14:23'),
	(2, 'D4', '92', 'Dolor Repellat Quia', '2022', '992', '2022-05-14 21:14:23', '2022-05-14 21:14:23'),
	(3, 'D2', '109', 'Voluptatem Rerum Ipsam', '2022', '756', '2022-05-14 21:14:23', '2022-05-14 21:14:23');
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

-- Dumping data for table pusatkarir.taggables: ~41 rows (approximately)
/*!40000 ALTER TABLE `taggables` DISABLE KEYS */;
INSERT INTO `taggables` (`tag_id`, `taggable_id`, `taggable_type`) VALUES
	(8, 1, 'App\\Models\\Article'),
	(11, 1, 'App\\Models\\Article'),
	(9, 2, 'App\\Models\\Article'),
	(10, 2, 'App\\Models\\Article'),
	(16, 2, 'App\\Models\\Article'),
	(2, 3, 'App\\Models\\Article'),
	(11, 3, 'App\\Models\\Article'),
	(6, 4, 'App\\Models\\Article'),
	(17, 4, 'App\\Models\\Article'),
	(19, 4, 'App\\Models\\Article'),
	(3, 5, 'App\\Models\\Article'),
	(10, 5, 'App\\Models\\Article'),
	(7, 6, 'App\\Models\\Article'),
	(12, 7, 'App\\Models\\Article'),
	(13, 7, 'App\\Models\\Article'),
	(5, 8, 'App\\Models\\Article'),
	(18, 8, 'App\\Models\\Article'),
	(20, 8, 'App\\Models\\Article'),
	(4, 9, 'App\\Models\\Article'),
	(18, 9, 'App\\Models\\Article'),
	(7, 10, 'App\\Models\\Article'),
	(16, 10, 'App\\Models\\Article'),
	(11, 11, 'App\\Models\\Article'),
	(19, 11, 'App\\Models\\Article'),
	(11, 12, 'App\\Models\\Article'),
	(4, 13, 'App\\Models\\Article'),
	(5, 13, 'App\\Models\\Article'),
	(9, 14, 'App\\Models\\Article'),
	(19, 14, 'App\\Models\\Article'),
	(20, 14, 'App\\Models\\Article'),
	(3, 15, 'App\\Models\\Article'),
	(10, 15, 'App\\Models\\Article'),
	(10, 16, 'App\\Models\\Article'),
	(1, 17, 'App\\Models\\Article'),
	(9, 17, 'App\\Models\\Article'),
	(7, 18, 'App\\Models\\Article'),
	(9, 18, 'App\\Models\\Article'),
	(2, 19, 'App\\Models\\Article'),
	(10, 19, 'App\\Models\\Article'),
	(6, 20, 'App\\Models\\Article'),
	(8, 20, 'App\\Models\\Article');
/*!40000 ALTER TABLE `taggables` ENABLE KEYS */;

-- Dumping structure for table pusatkarir.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.tags: ~20 rows (approximately)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'Beatae', 'beatae', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(2, 'Minus', 'minus', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(3, 'Ut', 'ut', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(4, 'Quas', 'quas', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(5, 'Est', 'est', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(6, 'Et', 'et', '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(7, 'Quia', 'quia', '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(8, 'Quae', 'quae', '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(9, 'Sed', 'sed', '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(10, 'Fuga', 'fuga', '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(11, 'Adipisci', 'adipisci', '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(12, 'Debitis', 'debitis', '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(13, 'At', 'at', '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(14, 'Doloremque', 'doloremque', '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(15, 'Facere', 'facere', '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(16, 'Autem', 'autem', '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(17, 'Dignissimos', 'dignissimos', '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(18, 'Ea', 'ea', '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(19, 'Eaque', 'eaque', '2022-05-14 21:14:22', '2022-05-14 21:14:22'),
	(20, 'Impedit', 'impedit', '2022-05-14 21:14:22', '2022-05-14 21:14:22');
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
	(1, 'pusatkarir@unmer.ac.id', 'pusatkarir-unmermalang', '2022-05-14 21:14:19', '$2y$10$EAk7.gcncYK5Jx1bQDiGIuCEWuUHIazf4HDsMoD0FmnBIjgVOsvOa', 'App\\Models\\Employer', 1, NULL, '2022-05-14 21:14:19', '2022-05-14 21:14:19'),
	(2, 'simonis.earline@example.net', 'kalebcarleton', '2022-05-14 21:14:23', '$2y$10$8eCRaKC7Gi5Bv6NYFeByX.yw9fUdau5O8kR14yfIiUcfmc2QAYrbe', 'App\\Models\\Seeker', 1, 'pC44Bd0CdpnhyMpaewWxwJHazZSM6lC6UmNzWrWi936XmD3I5BDxWSowGhcR', '2022-05-14 21:14:23', '2022-05-14 21:14:23'),
	(3, 'jimmy46@example.net', 'osborneceline', '2022-05-14 21:14:23', '$2y$10$VHalo7Dlm8HwuWrvWe9BJ.AnfZjgHzl6wvN7xBdYX3oc3RNntuioa', 'App\\Models\\Seeker', 2, 'LGGitV4KQ5', '2022-05-14 21:14:23', '2022-05-14 21:14:23'),
	(4, 'larue.williamson@example.net', 'gudrunonie', '2022-05-14 21:14:23', '$2y$10$7nPOrP8ashVnP1xCO8ILXeSuMc/X9sQUE3uSHKtERXZyUyrvdHHPu', 'App\\Models\\Seeker', 3, 'drMKcB7RsO', '2022-05-14 21:14:23', '2022-05-14 21:14:23');
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pusatkarir.vacancies: ~20 rows (approximately)
/*!40000 ALTER TABLE `vacancies` DISABLE KEYS */;
INSERT INTO `vacancies` (`id`, `employer_id`, `job_title`, `slug`, `description`, `job_type`, `expiry_date`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Mollitia veniam a suscipit accusamus occaecati.', 'mollitia-veniam-a-suscipit-accusamus-occaecati', 'Quasi repellat soluta rerum. Voluptas ut aliquam at voluptatem.', 'Permanent-employment', '2022-05-24 21:14:21', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(2, 1, 'Dicta similique necessitatibus nobis quia et fuga.', 'dicta-similique-necessitatibus-nobis-quia-et-fuga', 'Modi qui odit sed et necessitatibus fugiat. Repellat quis quasi neque et voluptatem voluptas ut. Non labore sunt neque omnis sit vitae. Mollitia voluptatem dolores suscipit aut magni vel praesentium perferendis.', 'Fixed-term', '2022-05-24 21:14:21', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(3, 1, 'Enim ducimus sunt voluptas dolor.', 'enim-ducimus-sunt-voluptas-dolor', 'Aperiam amet reiciendis atque vel ut rerum. Harum sit ullam aut. Quidem praesentium magni facere mollitia ipsa. Repellat ut sit veniam distinctio veritatis fugiat sequi.', 'Internship', '2022-05-24 21:14:21', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(4, 1, 'Velit similique quam repellat vel rerum voluptatem provident corrupti.', 'velit-similique-quam-repellat-vel-rerum-voluptatem-provident-corrupti', 'Amet dolorum ad earum incidunt nulla. Dignissimos architecto odit blanditiis vero non tempore. Officia enim id et consectetur suscipit aut maiores ut. Consequatur quis suscipit est ab.', 'Fixed-term', '2022-05-24 21:14:21', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(5, 1, 'Consequuntur nesciunt dolorum aut odit rerum aut est fuga.', 'consequuntur-nesciunt-dolorum-aut-odit-rerum-aut-est-fuga', 'Molestiae nesciunt omnis laboriosam in est inventore suscipit. Quasi inventore dolor vel maxime atque. Delectus alias qui sit dolore blanditiis recusandae tenetur non. Vitae molestiae ad rerum quo harum provident.', 'Part-time', '2022-05-24 21:14:21', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(6, 1, 'Earum sit est praesentium aut autem molestiae.', 'earum-sit-est-praesentium-aut-autem-molestiae', 'Numquam accusamus non ad inventore est. Architecto possimus iure aperiam explicabo perspiciatis porro quas sequi. Cumque libero quia ab excepturi quasi nobis a.', 'Internship', '2022-05-24 21:14:21', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(7, 1, 'Quo ipsum enim repellat minus qui omnis.', 'quo-ipsum-enim-repellat-minus-qui-omnis', 'Laborum voluptatem amet consequatur harum cumque et tenetur. Quia omnis rerum dolore sapiente ad facilis.', 'Internship', '2022-05-24 21:14:21', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(8, 1, 'Sed eos aut ab a amet.', 'sed-eos-aut-ab-a-amet', 'Eos harum id saepe dolores mollitia perferendis dolores et. Corrupti ducimus molestiae voluptas sit animi et rerum.', 'Part-time', '2022-05-24 21:14:21', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(9, 1, 'Velit eum eveniet et omnis aspernatur explicabo.', 'velit-eum-eveniet-et-omnis-aspernatur-explicabo', 'Magnam quod ex deleniti ut illo tenetur. Enim dolores ut blanditiis eos omnis. Explicabo aut voluptatum quia eligendi qui accusantium. Voluptatem illum voluptatem rem eum.', 'Part-time', '2022-05-24 21:14:21', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(10, 1, 'Odit dolorem necessitatibus consequatur qui officiis deleniti quod nihil.', 'odit-dolorem-necessitatibus-consequatur-qui-officiis-deleniti-quod-nihil', 'Quisquam reiciendis est consequatur eaque culpa consequatur rerum autem. Illum reiciendis voluptatum dolorem.', 'Part-time', '2022-05-24 21:14:21', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(11, 1, 'Ducimus eveniet provident fugiat labore iure saepe nam.', 'ducimus-eveniet-provident-fugiat-labore-iure-saepe-nam', 'Aliquam tempora dignissimos dolores totam fugit repellendus perferendis fugiat. Aliquam eos velit voluptas. Natus tenetur dolor vel laboriosam quia. Aut odio sunt cumque enim et numquam.', 'Permanent-employment', '2022-05-24 21:14:21', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(12, 1, 'Sit id dignissimos natus optio.', 'sit-id-dignissimos-natus-optio', 'Unde debitis repellendus cumque pariatur. Nemo consequatur consequatur qui qui architecto soluta. Molestias enim rerum et adipisci laboriosam.', 'Fixed-term', '2022-05-24 21:14:21', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(13, 1, 'Ea reiciendis alias natus et expedita blanditiis.', 'ea-reiciendis-alias-natus-et-expedita-blanditiis', 'Aspernatur vitae eaque laborum quis aliquam tempora cupiditate. Corporis est provident aspernatur consequuntur ut corporis. Saepe provident repellat qui quasi ea et.', 'Permanent-employment', '2022-05-24 21:14:21', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(14, 1, 'Quam velit aut nulla vel.', 'quam-velit-aut-nulla-vel', 'Voluptas odit architecto dolorum blanditiis quia occaecati. Et nesciunt odio quibusdam et aspernatur fugiat et. Omnis autem sint sint sit et harum fuga. Sint totam voluptatum dolorum enim sunt aut ullam. Recusandae aut illo repellat eos ut voluptatem.', 'Outsourcing', '2022-05-24 21:14:21', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(15, 1, 'Officia voluptatum quasi et nostrum nihil et aut.', 'officia-voluptatum-quasi-et-nostrum-nihil-et-aut', 'Qui assumenda et eos. Dolores error illo impedit tempore est porro voluptate quia. Adipisci adipisci molestias eveniet pariatur. Itaque sed id nostrum quibusdam illum non quas.', 'Permanent-employment', '2022-05-24 21:14:21', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(16, 1, 'Molestiae aut et tempora voluptas repellat.', 'molestiae-aut-et-tempora-voluptas-repellat', 'Molestiae suscipit consequuntur inventore est ut in nihil. Quod beatae omnis aut et autem iusto. Ipsum corrupti cum aut. Neque dolore eos doloribus aut consequuntur dolorem voluptates sed.', 'Outsourcing', '2022-05-24 21:14:21', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(17, 1, 'Reiciendis itaque voluptas ea accusantium quas ipsum necessitatibus.', 'reiciendis-itaque-voluptas-ea-accusantium-quas-ipsum-necessitatibus', 'Nihil nostrum veritatis aspernatur praesentium quas dignissimos consectetur. Sed iste inventore et asperiores omnis qui vel. Quia itaque ut quia quae et similique.', 'Internship', '2022-05-24 21:14:21', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(18, 1, 'Cum ut voluptates officia nisi nostrum.', 'cum-ut-voluptates-officia-nisi-nostrum', 'Numquam error iure sunt omnis est sapiente voluptas. Odit ut doloremque voluptas totam. Eum nesciunt qui cum autem sunt.', 'Fixed-term', '2022-05-24 21:14:21', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(19, 1, 'Sit qui fuga aspernatur necessitatibus voluptatem et ratione.', 'sit-qui-fuga-aspernatur-necessitatibus-voluptatem-et-ratione', 'Eos ipsam et magnam quia quia et quod autem. Officia odio ut illo aut. Deserunt velit nesciunt qui et deserunt magnam repellendus. Numquam quidem enim placeat nemo.', 'Permanent-employment', '2022-05-24 21:14:21', '2022-05-14 21:14:21', '2022-05-14 21:14:21'),
	(20, 1, 'Consequuntur tempora velit sed sunt qui nesciunt.', 'consequuntur-tempora-velit-sed-sunt-qui-nesciunt', 'Eius aut dolorem sit doloremque atque consequatur consequuntur. Fuga consequatur incidunt non doloribus non. Ullam sed molestiae corrupti aut deserunt sed quia aut.', 'Internship', '2022-05-24 21:14:21', '2022-05-14 21:14:21', '2022-05-14 21:14:21');
/*!40000 ALTER TABLE `vacancies` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
