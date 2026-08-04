-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2026 at 11:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kalyani_web_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `id` int(11) NOT NULL,
  `attribute_name` varchar(255) NOT NULL,
  `is_active` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`id`, `attribute_name`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'Crop(s)', 'active', '2024-10-25 07:10:18', '2024-10-25 07:10:18'),
(3, 'Common Name of Pest', 'active', '2024-10-25 07:10:45', '2024-10-25 07:10:45'),
(4, 'AI (g)', 'active', '2024-10-25 07:11:36', '2024-10-25 07:11:36'),
(5, 'Formulation (ml)', 'active', '2024-10-25 07:11:50', '2024-10-25 07:11:50'),
(6, 'Dilution in Water (L)', 'active', '2024-10-25 07:12:01', '2024-10-25 07:12:01'),
(7, 'Waiting Period between last spray to harvest (days)', 'active', '2024-10-25 07:12:50', '2024-10-25 07:12:50'),
(8, 'Re-entry after each Application (In Hours)', 'active', '2024-10-25 07:13:00', '2024-10-25 07:13:00'),
(9, 'Target Pests', 'active', '2025-06-04 06:13:51', '2025-06-04 06:13:51'),
(10, 'Dosage', 'active', '2025-06-04 06:14:22', '2025-06-04 06:14:22'),
(11, 'Stored Grain Target Pests', 'active', '2025-05-29 14:05:02', '2025-05-29 14:05:02'),
(12, 'Pest', 'active', '2025-06-04 06:13:19', '2025-06-04 06:13:19'),
(13, 'Dosage/Ha', 'active', '2025-05-29 19:56:21', '2025-05-29 19:56:21'),
(14, 'Dilution/Ha water', 'active', '2025-05-29 19:59:58', '2025-05-29 19:59:58'),
(15, 'Dosage  Formulation', 'active', '2025-05-29 20:00:52', '2025-05-29 20:00:52'),
(16, 'Application', 'active', '2025-06-06 19:05:15', '2025-06-06 19:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `summary` text DEFAULT NULL,
  `content` longtext NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `reading_time` int(11) DEFAULT 5,
  `views_count` int(11) DEFAULT 0,
  `status` enum('draft','published','archived') DEFAULT 'draft',
  `is_active` varchar(50) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` tinytext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `published_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `slug`, `summary`, `content`, `featured_image`, `author_id`, `category_id`, `reading_time`, `views_count`, `status`, `is_active`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`, `published_at`) VALUES
(7, 'Growing Together: The Joy of Harvesting Pumpkins as a Family', 'growing-together-the-joy-of-harvesting-pumpkins-as-a-family', '<p data-start=\"165\" data-end=\"340\">Discover the simple joy of harvesting pumpkins as a family and how gardening creates lasting memories, teaches valuable life lessons, and strengthens bonds across generations.</p>', '<p data-start=\"364\" data-end=\"663\">There’s something magical about getting your hands into the soil and discovering what months of care and patience have produced. In a quiet pumpkin patch, surrounded by wide green leaves and golden sunlight, a shared moment of harvest becomes more than just picking vegetables — it becomes a memory.</p>\r\n<p data-start=\"665\" data-end=\"1008\">Gardening together offers families a rare opportunity to slow down. In today’s fast-paced digital world, stepping into nature reconnects us not only with the earth but with each other. Watching a child’s excitement as they discover a bright orange pumpkin hidden beneath sprawling vines is a reminder of how powerful simple experiences can be.</p>\r\n<h3 data-start=\"1010\" data-end=\"1051\">The Beauty of Learning Through Nature</h3>\r\n<p data-start=\"1053\" data-end=\"1334\">Harvesting pumpkins teaches children patience and responsibility. From planting the seeds to watering and nurturing the growing vines, every step requires care and attention. When harvest day finally arrives, it brings a sense of accomplishment that no screen or toy can replicate.</p>\r\n<p data-start=\"1336\" data-end=\"1351\">Children learn:</p>\r\n<ul data-start=\"1352\" data-end=\"1512\">\r\n<li data-start=\"1352\" data-end=\"1377\">\r\n<p data-start=\"1354\" data-end=\"1377\">Where food comes from</p>\r\n</li>\r\n<li data-start=\"1378\" data-end=\"1423\">\r\n<p data-start=\"1380\" data-end=\"1423\">The importance of nurturing living things</p>\r\n</li>\r\n<li data-start=\"1424\" data-end=\"1465\">\r\n<p data-start=\"1426\" data-end=\"1465\">The rewards of patience and hard work</p>\r\n</li>\r\n<li data-start=\"1466\" data-end=\"1512\">\r\n<p data-start=\"1468\" data-end=\"1512\">Environmental awareness and sustainability</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"1514\" data-end=\"1569\">These lessons happen naturally — no classroom required.</p>\r\n<h3 data-start=\"1571\" data-end=\"1601\">Strengthening Family Bonds</h3>\r\n<p data-start=\"1603\" data-end=\"1819\">Moments spent in the garden create space for conversation and connection. Whether guiding small hands to gently twist a pumpkin from the vine or sharing stories under the open sky, gardening becomes a shared journey.</p>\r\n<p data-start=\"1821\" data-end=\"1991\">The act of harvesting together symbolizes teamwork. It reflects how families grow stronger when they support each other through seasons of planting, waiting, and reaping.</p>\r\n<h3 data-start=\"1993\" data-end=\"2026\">Embracing Seasonal Traditions</h3>\r\n<p data-start=\"2028\" data-end=\"2237\">Pumpkin harvesting also marks the arrival of autumn — a season of warmth, gratitude, and gathering. Freshly picked pumpkins can be turned into delicious homemade pies, comforting soups, or festive decorations.</p>\r\n<p data-start=\"2239\" data-end=\"2444\">Making gardening a yearly tradition builds anticipation and continuity. Children who grow up harvesting pumpkins often carry those traditions into their own families, keeping the cycle of connection alive.</p>\r\n<h3 data-start=\"2446\" data-end=\"2472\">A Return to Simplicity</h3>\r\n<p data-start=\"2474\" data-end=\"2744\">At its heart, gardening is about presence. It’s about kneeling in the soil, feeling the texture of leaves, and appreciating the vibrant color of a ripe pumpkin ready to be picked. These small details remind us that happiness is often found in simple, shared experiences.</p>\r\n<p data-start=\"2746\" data-end=\"2887\">Growing together is about more than vegetables — it’s about cultivating love, patience, and memories that last far beyond the harvest season.</p>', 'featured_image/1771651494_pexels-zen-chung-5528964 (2).jpg', 1, 20, 2, 0, 'published', 'active', 'Family Pumpkin Harvesting: Growing Together in the Garden', 'Explore the joy of family pumpkin harvesting and discover how gardening together builds stronger bonds, teaches valuable life lessons.', 'Meta Keywords:  family gardening, pumpkin harvest, harvesting pumpkins, autumn activities, gardening with children, seasonal traditions, family bonding activities, pumpkin patch experience, fall harvest, growing food at home', '2026-02-20 23:54:54', '2026-02-21 00:08:17', '2026-02-21 00:08:17'),
(8, 'Modern Farming in Action: Where Tradition Meets Technology', 'modern-farming-in-action-where-tradition-meets-technology', 'A closer look at how modern agricultural machinery and hands-on farming practices work together to sustain today’s food production while preserving traditional values.', '<h2 data-start=\"338\" data-end=\"353\"><strong data-start=\"341\" data-end=\"353\">Content:</strong></h2>\r\n<p data-start=\"355\" data-end=\"677\">Across wide green fields, where rows of crops stretch toward the horizon, modern farming continues to evolve while staying rooted in tradition. Surrounded by tall trees and open skies, farmers work carefully among growing plants, supported by powerful machinery designed to make agriculture more efficient and sustainable.</p>\r\n<p data-start=\"679\" data-end=\"942\">The image of expansive farmland filled with equipment and workers reflects a balance between human dedication and mechanical innovation. Today’s agriculture is not only about planting and harvesting — it’s about precision, timing, and responsible land management.</p>\r\n<h3 data-start=\"944\" data-end=\"991\">The Role of Machinery in Modern Agriculture</h3>\r\n<p data-start=\"993\" data-end=\"1270\">Agricultural equipment has transformed how farms operate. Machines help with planting, irrigation, fertilizing, and harvesting, reducing manual labor while increasing productivity. What once required dozens of workers can now be accomplished efficiently with specialized tools.</p>\r\n<p data-start=\"1272\" data-end=\"1555\">However, machinery does not replace farmers — it empowers them. Skilled operators manage equipment carefully, ensuring crops receive the right treatment at the right time. Technology supports decision-making, improves yields, and helps farms remain competitive in a demanding market.</p>\r\n<h3 data-start=\"1557\" data-end=\"1592\">The Human Element Still Matters</h3>\r\n<p data-start=\"1594\" data-end=\"1886\">Despite technological advancements, farming remains deeply human. Workers walk through fields inspecting crops, monitoring soil conditions, and making adjustments as needed. Experience and intuition play a critical role in understanding weather patterns, soil health, and plant growth cycles.</p>\r\n<p data-start=\"1888\" data-end=\"2021\">Agriculture is both science and art. While machines provide strength and efficiency, farmers provide knowledge, care, and commitment.</p>\r\n<h3 data-start=\"2023\" data-end=\"2063\">Sustainable Practices for the Future</h3>\r\n<p data-start=\"2065\" data-end=\"2259\">Modern farming increasingly focuses on sustainability. Efficient irrigation systems conserve water, soil management techniques prevent erosion, and crop rotation improves long-term productivity.</p>\r\n<p data-start=\"2261\" data-end=\"2477\">Responsible farming ensures that land remains fertile for future generations. By combining advanced equipment with sustainable practices, farms can meet growing food demands without compromising environmental health.</p>\r\n<h3 data-start=\"2479\" data-end=\"2521\">A Glimpse into Agricultural Dedication</h3>\r\n<p data-start=\"2523\" data-end=\"2701\">Behind every harvest lies months of preparation, planning, and hard work. From early planting seasons to long days in the field, agriculture requires resilience and adaptability.</p>\r\n<p data-start=\"2703\" data-end=\"2943\">This scene captures more than just equipment and crops — it represents dedication, teamwork, and the ongoing evolution of farming. It’s a reminder that food production is a carefully coordinated effort that blends innovation with tradition.</p>', 'featured_image/1771652474_pexels-nc-farm-bureau-mark-7050077 (1).jpg', 1, 20, 0, 0, 'published', 'active', 'Modern Farming and Agricultural Technology in Action', 'Explore how modern farming combines advanced agricultural machinery with traditional farming knowledge to improve efficiency, sustainability, and production.', 'modern farming, agricultural technology, farm machinery, sustainable agriculture, crop production, farm equipment, precision farming, rural agriculture, farming innovation, agricultural sustainability', '2026-02-21 00:11:14', '2026-02-21 00:11:14', '2026-02-21 00:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL,
  `short_discription` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL COMMENT 'none_3',
  `discription` text CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL COMMENT 'none_3',
  `is_active` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `img`, `icon`, `short_discription`, `discription`, `is_active`, `created_at`, `updated_at`) VALUES
(20, 'AgroChemicals', 'agrochemicals', '/category/1742816632AgroChemicals.png', '/categoryicon/1743166977agroicon.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Active', '2025-03-24 06:13:52', '2026-02-09 12:25:00'),
(21, 'Public Health Pesticides', 'public-health-pesticides', '/category/1742816722public_health.png', '/categoryicon/1743230429public_health.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Active', '2025-03-24 06:15:22', '2026-02-09 12:25:27'),
(22, 'Export Zone', 'export-zone', '/category/17508477231742816844products_by_ingerdrent.png', '/categoryicon/1750848005images__1_-removebg-preview.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et! dDdDDX', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et! dDdDDX', 'Active', '2025-03-24 06:17:24', '2026-02-09 12:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `certificate_page_sections`
--

CREATE TABLE `certificate_page_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subheading` varchar(255) DEFAULT NULL,
  `home_image` varchar(255) DEFAULT NULL,
  `page_image` varchar(255) DEFAULT NULL,
  `order` tinyint(4) DEFAULT NULL,
  `image_position` enum('left','right') DEFAULT NULL,
  `paragraph` text DEFAULT NULL,
  `point` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`point`)),
  `section_type` enum('hero','section') DEFAULT 'section',
  `is_active` tinyint(4) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificate_page_sections`
--

INSERT INTO `certificate_page_sections` (`id`, `title`, `subheading`, `home_image`, `page_image`, `order`, `image_position`, `paragraph`, `point`, `section_type`, `is_active`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Certificate', NULL, NULL, '/page_sections/page/1771390273_about_banner.png', NULL, NULL, 'Company has recognized by many certified agency due to its contribution in field of manufacturing of quality products with highest safety and minimum hazard to environment', NULL, 'hero', 1, 'certificate', '2026-02-17 23:21:13', '2026-02-17 23:21:13', NULL),
(2, 'Competence of testing and calibration laboratory', 'Recognition which demonstrates a laboratory’s competence and commitment to quality', '/page_sections/home/1771390575_accredited_laboratory.png', '/page_sections/page/1771390575_accredited_laboratory.png', 1, 'right', 'Company accredited by IEC 17025 from global recognized agency end customer search for quality products. Company got accreditation due to adherence to quality standard prescribed by this standard which include', '[\"Company keeps Qualified and experienced testing staff\",\"Company use certified quality assurance procedure\",\"Company follow proper sampling practices for actual result\",\"Internationally valid Testing methods follow by the company\",\"Company has suitable testing facilities at centre\"]', 'section', 1, 'competence-of-testing-and-calibration-laboratory', '2026-02-17 23:26:15', '2026-02-17 23:26:15', NULL),
(3, 'Environmental management system', 'Accreditation for minimize environmental impact and improve their environmental performance', '/page_sections/home/1771391680_Environmental.png', '/page_sections/page/1771391680_Environmental.png', 2, 'left', 'Certified by ISO 14001, Company has develops Environmental management systems (EMS) which include creating an environmental policy, setting objectives, and outlining procedures to manage environmental impacts.\r\nCompany has implement this EMS and monitor the performance like energy usage, waste output etc. to check functioning of the system\r\nCompany assesses progress, address any shortcomings and ensure that it is aligned with organization’s strategic goals.', '[]', 'section', 1, 'environmental-management-system', '2026-02-17 23:44:40', '2026-02-17 23:44:40', NULL),
(4, 'Quality Management Systems', 'Effective Process to deliver flawless products time after time to customers', '/page_sections/home/1771391991_quality_management.png', '/page_sections/page/1771391991_quality_management.png', 3, 'right', 'Kalyani Industries Limited recognize by ISO 9001 for implementation of Quality Management Systems which offer quality of products and services and consistently meet customers’ expectations. Company work on following principle which help company to recognize by ISO 9001.', '[\"Company work on customer expectation to enhance customer satisfaction and built loyalty\",\"Company\\u2019s leadership create environment which is turn employee fully engaged in achieving the organization\\u2019s objectives\",\"Engagements of employee help company for continuous improvement in work culture\",\"Company follow process oriented approach which involve identifying, documenting, controlling and continuous improving the interconnected processes.\",\"Continue improvement is a core principle which company is following enhancing QMS and overall performance\",\"Company decides based on the analysis of data and information leading to more effective and overall performance.\"]', 'section', 1, NULL, '2026-02-17 23:49:51', '2026-02-17 23:50:55', NULL),
(5, 'Occupational Health and Safety Assessment Systems', 'Certification which create safe and secure workplace', '/page_sections/home/1771398472_ohsas.png', '/page_sections/page/1771398472_ohsas.png', 4, 'left', 'Kalyani Industries limited got certification of OHSAS due to its working as per principle of this standard.\r\nCompany ensure the safety and security of employee at the workplace. Company conducts a risk assessment to identify and eliminate workplace threats and hazards by preventing work-related injuries, illnesses, and incidents.\r\nCompany is maintaining and monitoring compliance with all national and international safety laws and regulations.\r\nCompany’s aim to enhance an organization\'s overall performance on health and safety parameters by adopting the principle of continual improvement.', '[]', 'section', 1, 'occupational-health-and-safety-assessment-systems', '2026-02-18 01:37:52', '2026-02-18 01:37:52', NULL),
(6, 'Good Manufacturing Practices', 'Certification, which ensures that the manufacturing processes adhere to strict quality standards.', '/page_sections/home/1771398518_gmp_certificate.png', '/page_sections/page/1771398518_gmp_certificate.png', 5, 'right', 'Kalyani Industries Limited Certified by WHO-GMP as company adherence to this standard which include to maintain consistency in product quality, reducing the risk of defects or contamination. Customers know that their products are produced under controlled and safe conditions.\r\n\r\nCompany also demonstrates its commitment to meeting industry standards and streamlines the compliance process by providing a framework that aligns with international regulatory requirements.\r\n\r\nBy verifying the integrity of the supply chain, company is minimizing the risk of substandard inputs affecting the final product. This, in turn, enhances the reliability and efficacy of the products for the end consumer, which is a crucial aspect of meeting customer requirements. Company’s systematic approach to monitor and assess manufacturing processes, enabling company to identify areas for improvement and implement corrective actions.', '[]', 'section', 1, 'good-manufacturing-practices', '2026-02-18 01:38:38', '2026-02-18 01:38:38', NULL),
(7, 'Hazard Analysis and Critical Control Points', 'Safety management system that aims to minimize or eliminate potential hazards by identifying and controlling them at critical points', '/page_sections/home/1771398572_haccp_certified.png', '/page_sections/page/1771398572_haccp_certified.png', 6, 'left', 'Company work on 7 principle of HACCP which aim to minimize or eliminate potential hazard\r\n\r\nIts start with Conduct of Hazard Analysis where company evaluates process and identifies where hazards can be introduced. Once the hazard is identified and evaluated, Identify Critical Control Points where step applied to prevent or eliminate the hazard which has identified.\r\n\r\nThird principle is to Establish Critical Limits where establish criteria for each critical control point. Next is Establish Monitoring Procedure where all the process monitored at the critical control points. Then it comes to Establish Corrective Action if critical limit is not met where evaluation of the process to determine the cause of the problem and an elimination of the cause.\r\n\r\nSix Principle is Establish Record Keeping Procedures where record kept for critical limits have been met and system is in control. Last one is to Establish Verification Procedures to validate the plan. Once the plan is in place, company makes sure that it is effective in preventing the hazards identified. Test the end product, and verify that the controls are working as planned', '[]', 'section', 1, 'hazard-analysis-and-critical-control-points', '2026-02-18 01:39:32', '2026-02-18 01:39:32', NULL),
(8, 'Hazard Analysis and Critical Control Points', 'Hazard Analysis and Critical Control Points', '/page_sections/home/1771398621_quality_management.png', '/page_sections/page/1771398621_quality_management.png', 7, 'left', 'Hazard Analysis and Critical Control PointsHazard Analysis and Critical Control Points', '[]', 'section', 0, NULL, '2026-02-18 01:40:21', '2026-03-13 13:56:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `corporate_media`
--

CREATE TABLE `corporate_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` enum('video','brochure') NOT NULL,
  `file_path` varchar(500) DEFAULT NULL,
  `video_url` varchar(500) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `corporate_media`
--

INSERT INTO `corporate_media` (`id`, `title`, `type`, `file_path`, `video_url`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Corporate Brochure', 'brochure', 'brochures/p7i5t8Tvq3NXNccfYfreAUNX9X4d2dbhWMvF1kyj.jpg', NULL, NULL, 1, '2026-03-13 02:54:03', '2026-03-15 13:37:16'),
(2, 'Corporate Video', 'video', NULL, 'videos/H3sFQT1D3PcbdsTJd3V7eCZIJk3Wyv6VxAPJYXMZ.mp4', NULL, 1, '2026-03-13 03:15:59', '2026-03-13 03:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homepage_banner`
--

CREATE TABLE `homepage_banner` (
  `id` int(11) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `title` varchar(150) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `display_order` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homepage_banner`
--

INSERT INTO `homepage_banner` (`id`, `banner_image`, `title`, `subtitle`, `link`, `is_active`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'banner_image/1772274122_landing.png', 'Global Leaders in Public Health, Agriculture and Environmental Solutions.', 'Pioneering Innovation, Quality, and Sustainability Since 2000.', NULL, 1, 1, '2026-02-28 04:52:02', '2026-02-28 04:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `homepage_contents`
--

CREATE TABLE `homepage_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_type` varchar(50) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` text DEFAULT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`value`)),
  `url` varchar(255) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `display_order` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homepage_contents`
--

INSERT INTO `homepage_contents` (`id`, `section_type`, `title`, `subtitle`, `value`, `url`, `icon`, `image`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'stat', 'Lorem ipsum dolor', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, porro, qui ad sint possimus labore tempora id molestiae aliquam invent.', '[{\"number\":\"40+\",\"label\":\"Integrations\"},{\"number\":\"50+\",\"label\":\"Customers\"},{\"number\":\"30+\",\"label\":\"Projects\"}]', NULL, NULL, NULL, 0, 1, '2026-02-23 01:11:57', '2026-02-23 01:37:49'),
(2, 'banner', 'Global Leaders in Public Health, Agriculture and Environmental Solutions', 'Pioneering Innovation, Quality, and Sustainability Since 2000.', NULL, NULL, NULL, 'homepage_contents/1771829058_landing.png', 1, 1, '2026-02-23 01:14:18', '2026-02-23 01:14:18'),
(3, 'social', 'Email', NULL, NULL, 'mailto:your@email.com', NULL, 'homepage_contents/1771829432_mail.png', 1, 1, '2026-02-23 01:20:32', '2026-02-23 01:20:32'),
(4, 'social', 'Youtube', NULL, NULL, 'https://youtube.com/@yourchannel', NULL, 'homepage_contents/1771829459_youtube.png', 2, 1, '2026-02-23 01:20:59', '2026-02-23 01:20:59'),
(5, 'social', 'Just Dail', NULL, NULL, 'https://www.justdial.com/YourBusiness', NULL, 'homepage_contents/1771829476_justdile.png', 3, 1, '2026-02-23 01:21:16', '2026-02-23 01:21:16'),
(6, 'social', 'Facebook', NULL, NULL, 'https://facebook.com/yourpage', NULL, 'homepage_contents/1771829506_facebook.png', 4, 1, '2026-02-23 01:21:46', '2026-02-23 01:21:46'),
(7, 'social', 'whatsapp', NULL, NULL, 'https://wa.me/919999999999', NULL, 'homepage_contents/1771829523_whatapp.png', 5, 1, '2026-02-23 01:22:03', '2026-02-23 01:22:03'),
(8, 'social', 'Instagram', NULL, NULL, 'https://instagram.com/yourprofile', NULL, 'homepage_contents/1771829546_instagram.png', 6, 1, '2026-02-23 01:22:26', '2026-02-23 01:22:26'),
(9, 'social', 'Linkdin', NULL, NULL, 'https://instagram.com/yourprofile', NULL, 'homepage_contents/1771829575_linkdin.png', 7, 1, '2026-02-23 01:22:55', '2026-02-23 01:22:55'),
(10, 'social', 'Twitter', NULL, NULL, 'https://youtube.com/@yourchannel', NULL, 'homepage_contents/1771829592_twitter.png', 8, 1, '2026-02-23 01:23:12', '2026-02-23 01:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `homepage_stats`
--

CREATE TABLE `homepage_stats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `value` varchar(100) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homepage_stats`
--

INSERT INTO `homepage_stats` (`id`, `title`, `subtitle`, `value`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Integrations', NULL, '40+', 1, '2026-02-28 05:33:49', '2026-02-28 05:34:08'),
(2, 'Customers', NULL, '50+', 1, '2026-02-28 05:34:20', '2026-02-28 05:34:20'),
(3, 'Projects', NULL, '30+', 1, '2026-02-28 05:34:33', '2026-02-28 05:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layout_points`
--

CREATE TABLE `layout_points` (
  `id` bigint(20) NOT NULL,
  `page_layouts_id` bigint(20) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `layout_points`
--

INSERT INTO `layout_points` (`id`, `page_layouts_id`, `heading`, `text`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, 'Farmer Support', 'Affordable pricing and expert guidance ensure farmers thrive in their endeavors.', 1, 1, NULL, '2026-03-13 01:39:19', '2026-03-13 01:39:19'),
(3, 3, 'Farmer Support', 'Affordable pricing and expert guidance ensure farmers thrive in their endeavors.', 1, 1, NULL, '2026-03-13 04:13:41', '2026-03-13 04:13:41'),
(4, 4, NULL, 'Tailored solutions for diverse crops and farming practices.', 1, 1, NULL, '2026-03-13 04:15:35', '2026-03-13 04:15:35'),
(5, 4, NULL, 'Affordable pricing with dedicated farmer support services.', 1, 1, NULL, '2026-03-13 04:15:48', '2026-03-13 04:15:48'),
(6, 4, NULL, 'Compliant with national agricultural standards for quality assurance.', 1, 1, NULL, '2026-03-13 04:15:57', '2026-03-13 04:15:57'),
(7, 11, 'Rapid Delivery', 'Experience timely shipments that keep your operations running smoothly and efficiently.', 1, 1, NULL, '2026-03-14 03:26:32', '2026-03-14 03:26:32'),
(8, 11, 'Global Collaboration', 'Partnering with NGOs to enhance agricultural practices and support sustainable farming initiatives.', 1, 1, NULL, '2026-03-14 03:26:45', '2026-03-14 03:26:45'),
(13, 18, 'Prototyping Services', 'Experience timely shipments that keep your operations running smoothly and efficiently.', 1, 1, NULL, '2026-03-14 03:38:19', '2026-03-14 03:38:19'),
(14, 18, 'Delivery Assurance', 'Partnering with NGOs to enhance agricultural practices and support sustainable farming initiatives.', 1, 1, NULL, '2026-03-14 03:38:32', '2026-03-14 03:38:32'),
(15, 22, 'Climate Adaptation', 'Formulations tailored to meet the unique challenges of tropical agriculture.', 1, 1, NULL, '2026-03-14 04:05:58', '2026-03-14 04:05:58'),
(16, 22, 'Pest Resistance', 'Advanced solutions designed to protect crops from prevalent pests in tropical regions', 1, 1, NULL, '2026-03-14 04:06:14', '2026-03-14 04:06:14'),
(17, 25, 'Rapid Delivery', 'Experience timely shipments that keep your operations running smoothly and efficiently.', 1, 1, NULL, '2026-03-14 04:12:55', '2026-03-14 04:12:55'),
(18, 25, 'Global Collaboration', 'Partnering with NGOs to enhance agricultural practices and support sustainable farming initiatives.', 1, 1, NULL, '2026-03-14 04:13:06', '2026-03-14 04:13:06'),
(19, 30, NULL, 'Customized formulations for diverse agricultural applications', 1, 1, NULL, '2026-03-14 05:47:20', '2026-03-14 05:47:20'),
(20, 30, NULL, 'Volume discounts that enhance your purchasing power.', 1, 1, NULL, '2026-03-14 05:47:34', '2026-03-14 05:47:34'),
(21, 30, NULL, 'Dedicated account management for personalized service.', 1, 1, NULL, '2026-03-14 05:47:43', '2026-03-14 05:47:43'),
(22, 32, NULL, 'Customized formulations for diverse agricultural applications', 1, 1, NULL, '2026-03-14 13:29:14', '2026-03-14 13:29:14'),
(23, 32, NULL, 'Volume discounts that enhance your purchasing power.', 1, 1, NULL, '2026-03-14 13:29:22', '2026-03-14 13:29:22'),
(24, 32, NULL, 'Dedicated account management for personalized service.', 1, 1, NULL, '2026-03-14 13:29:35', '2026-03-14 13:29:35'),
(25, 50, 'Ensure Regulatory Compliance and Safety:', 'We operate with an unwavering commitment to complying with all applicable national and international laws, regulations, and industry standards, including those set by the Central Insecticides Board & Registration Committee (CIBRC). The safety of our employees, customers, and the environment is our highest priority, and we ensure our products are safe to use and handle as per guidelines.', 1, 1, NULL, '2026-03-15 01:26:09', '2026-03-15 01:26:09'),
(26, 50, 'Foster a Culture of Continual Improvement:', 'We are dedicated to the continuous improvement of our processes, products, and Quality Management System. Through regular reviews, advanced research, and investment in technology, we ensure that we remain at the forefront of the agrochemicals industry.', 1, 1, NULL, '2026-03-15 01:26:28', '2026-03-15 01:26:28'),
(27, 50, 'Empower and Train Our Employees:', 'We believe that quality is the responsibility of every employee. We provide the necessary training and a safe working environment to empower our team to contribute to our quality objectives and uphold our commitment to excellence.', 1, 1, NULL, '2026-03-15 01:43:49', '2026-03-15 01:43:49'),
(28, 50, 'Promote Environmental Responsibility:', 'As manufacturers of agrochemicals, we are conscious of our environmental impact. We are committed to adopting sustainable practices, minimizing waste, and ensuring that our products and manufacturing processes are environmentally sound.', 1, 1, NULL, '2026-03-15 01:44:08', '2026-03-15 01:44:08'),
(29, 58, 'Prototyping Services', 'Experience timely shipments that keep your operations running smoothly and efficiently.', 1, 1, NULL, '2026-03-15 03:16:36', '2026-03-15 03:16:36'),
(30, 58, 'Delivery Assurance', 'Partnering with NGOs to enhance agricultural practices and support sustainable farming initiatives.', 1, 1, NULL, '2026-03-15 03:16:36', '2026-03-15 03:16:36'),
(31, 59, 'Prototyping Services', 'Experience timely shipments that keep your operations running smoothly and efficiently.', 1, 1, NULL, '2026-03-15 03:40:09', '2026-03-15 03:40:09'),
(32, 59, 'Delivery Assurance', 'Partnering with NGOs to enhance agricultural practices and support sustainable farming initiatives.', 1, 1, NULL, '2026-03-15 03:40:58', '2026-03-15 03:40:58'),
(36, 64, 'Prototyping Services', 'Experience timely shipments that keep your operations running smoothly and efficiently.', 1, 1, NULL, '2026-03-15 05:21:01', '2026-03-15 05:21:01'),
(37, 64, 'Delivery Assurance', 'Partnering with NGOs to enhance agricultural practices and support sustainable farming initiatives.', 1, 1, NULL, '2026-03-15 05:21:01', '2026-03-15 05:21:01'),
(38, 68, 'Prototyping Services', 'Experience timely shipments that keep your operations running smoothly and efficiently.', 1, 1, NULL, '2026-03-15 05:28:18', '2026-03-15 05:28:18'),
(39, 68, 'Delivery Assurance', 'Partnering with NGOs to enhance agricultural practices and support sustainable farming initiatives.', 1, 1, NULL, '2026-03-15 05:28:18', '2026-03-15 05:28:18'),
(40, 71, 'Prototyping Services', 'Experience timely shipments that keep your operations running smoothly and efficiently.', 1, 1, NULL, '2026-03-15 05:31:57', '2026-03-15 05:31:57'),
(41, 71, 'Delivery Assurance', 'Partnering with NGOs to enhance agricultural practices and support sustainable farming initiatives.', 1, 1, NULL, '2026-03-15 05:31:57', '2026-03-15 05:31:57'),
(42, 78, 'Prototyping Services', 'Experience timely shipments that keep your operations running smoothly and efficiently.', 1, 1, NULL, '2026-03-15 05:44:08', '2026-03-15 05:44:08'),
(43, 78, 'Delivery Assurance', 'Partnering with NGOs to enhance agricultural practices and support sustainable farming initiatives.', 1, 1, NULL, '2026-03-15 05:44:08', '2026-03-15 05:44:08'),
(44, 80, 'Prototyping Services', 'Experience timely shipments that keep your operations running smoothly and efficiently.', 1, 1, NULL, '2026-03-15 05:46:55', '2026-03-15 05:46:55'),
(45, 80, 'Delivery Assurance', 'Partnering with NGOs to enhance agricultural practices and support sustainable farming initiatives.', 1, 1, NULL, '2026-03-15 05:46:55', '2026-03-15 05:46:55'),
(46, 88, 'Prototyping Services', 'Experience timely shipments that keep your operations running smoothly and efficiently.', 1, 1, NULL, '2026-03-15 06:14:08', '2026-03-15 06:14:08'),
(47, 88, 'Delivery Assurance', 'Partnering with NGOs to enhance agricultural practices and support sustainable farming initiatives.', 1, 1, NULL, '2026-03-15 06:14:08', '2026-03-15 06:14:08'),
(48, 98, NULL, 'Tailored solutions for diverse crops and farming practices.', 1, 1, NULL, '2026-03-15 11:08:19', '2026-03-15 11:08:19'),
(49, 98, NULL, 'Affordable pricing with dedicated farmer support services.', 1, 1, NULL, '2026-03-15 11:08:19', '2026-03-15 11:08:19'),
(50, 98, NULL, 'Compliant with national agricultural standards for quality assurance.', 1, 1, NULL, '2026-03-15 11:08:19', '2026-03-15 11:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` enum('header','footer','both') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'header', '2026-03-13 05:57:15', '2026-03-13 12:37:17'),
(2, 'About Kalyani', 'header', '2026-03-13 05:57:30', '2026-03-13 12:37:20'),
(3, 'Our Products', 'header', '2026-03-13 05:57:45', '2026-03-13 12:37:24'),
(4, 'Business Area', 'header', '2026-03-12 00:21:53', '2026-03-13 12:37:27'),
(5, 'Key Strength', 'header', '2026-03-13 05:58:06', '2026-03-16 06:07:50'),
(6, 'Blog', 'header', '2026-03-13 05:58:18', '2026-03-13 05:58:18'),
(7, 'Contact Us', 'header', '2026-03-13 05:58:29', '2026-03-13 05:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `sort_order` int(11) DEFAULT 0,
  `target` enum('_self','_blank') DEFAULT '_self',
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `page_id`, `parent_id`, `title`, `sort_order`, `target`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 1, NULL, 'Domestic Brand Business', 1, '_self', 'active', '2026-03-12 00:44:50', '2026-03-12 00:46:41'),
(2, 4, 2, NULL, 'Institutional Business', 2, '_self', 'active', '2026-03-13 06:54:19', '2026-03-13 06:54:19'),
(3, 4, 3, NULL, 'International Business', 3, '_self', 'active', '2026-03-13 06:54:37', '2026-03-13 06:54:37'),
(4, 4, 4, NULL, 'Contract Manufacturing', 4, '_self', 'active', '2026-03-13 06:55:09', '2026-03-13 06:55:09'),
(5, 4, 5, NULL, 'Grow with Kalyani', 5, '_self', 'active', '2026-03-13 06:55:28', '2026-03-13 06:55:28'),
(6, 5, 6, NULL, 'Manufacturing Strength', 1, '_self', 'active', '2026-03-14 14:44:27', '2026-03-14 14:44:27'),
(7, 5, 7, NULL, 'Research And Development', 2, '_self', 'active', '2026-03-14 14:44:59', '2026-03-14 14:44:59'),
(8, 5, 8, NULL, 'Product Development', 3, '_self', 'active', '2026-03-14 14:45:25', '2026-03-14 14:46:52'),
(9, 5, 9, NULL, 'Marketing Network', 4, '_self', 'active', '2026-03-14 14:47:17', '2026-03-14 14:47:17'),
(10, 5, 10, NULL, 'Packaging', 5, '_self', 'active', '2026-03-14 14:47:39', '2026-03-14 14:47:39'),
(11, 2, 11, NULL, 'Company Profile', 1, '_self', 'inactive', '2026-03-14 15:04:54', '2026-03-15 13:02:37'),
(12, 2, 12, NULL, 'Quality Policy', 3, '_self', 'active', '2026-03-14 15:05:24', '2026-03-14 15:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `section_type` varchar(255) NOT NULL,
  `slug` tinytext NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `date` date NOT NULL,
  `is_active` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `section_type`, `slug`, `description`, `image`, `date`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'This is the title for testing of news', 'Industry News', 'this-is-the-title-for-testing-of-news', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, enim dolorum cumque ullam numquam odio voluptates nam deleniti non sed tempore culpa iure dolore magnam ad minus soluta expedita sit.', '/News/1743509726aricle3.png', '2025-04-25', 'Active', '2025-04-01 06:45:26', '2026-02-07 02:02:18'),
(3, 'This is the title', 'Industry News', 'this-is-the-title', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, enim dolorum cumque ullam numquam odio voluptates nam deleniti non sed tempore culpa iure dolore magnam ad minus soluta expedita sit.', '/News/1743509823article2.png', '2025-04-09', 'Active', '2025-04-01 06:47:03', '2026-02-07 02:01:56'),
(4, 'this is the title 2', 'Industry News', 'this-is-the-title-2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, enim dolorum cumque ullam numquam odio voluptates nam deleniti non sed tempore culpa iure dolore magnam ad minus soluta expedita sit.', '/News/1743509877gardener1.jpg', '2025-04-16', 'Active', '2025-04-01 06:47:57', '2026-02-07 02:01:34'),
(5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, enim dolorum cumque ullam numquam odio voluptates nam deleniti non sed tempore culpa iure dolore magnam ad minus soluta expedita sit.', 'Industry News', 'lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit.-saepe-enim-dolorum-cumque-ullam-numquam-odio-voluptates-nam-deleniti-non-sed-tempore-culpa-iure-dolore-magnam-ad-minus-soluta-expedita-sit.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, enim dolorum cumque ullam numquam odio voluptates nam deleniti non sed tempore culpa iure dolore magnam ad minus soluta expedita sit.', '/News/1743509914lorem.png', '2025-04-16', 'Active', '2025-04-01 06:48:34', '2026-02-07 02:01:11'),
(6, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, delectus aliquam natus dicta minima, soluta voluptatum aut cum corporis illum deleniti debitis repudiandae, esse voluptatem consectetur placeat nam molestiae quia!', 'Industry News', 'lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit.-amet-delectus-aliquam-natus-dicta-minima-soluta-voluptatum-aut-cum-corporis-illum-deleniti-debitis-repudiandae-esse-voluptatem-consectetur-placeat-nam-molestiae-quia', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, delectus aliquam natus dicta minima, soluta voluptatum aut cum corporis illum deleniti debitis repudiandae, esse voluptatem consectetur placeat nam molestiae quia!', '/News/1743577727aricle3.png', '2025-04-16', 'Active', '2025-04-02 01:38:47', '2026-02-07 02:00:47'),
(7, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, delectus aliquam natus dicta minima, soluta voluptatum aut cum corporis illum deleniti debitis repudiandae, esse voluptatem consectetur placeat nam molestiae quia!', 'Industry News', 'lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit.-amet-delectus-aliquam-natus-dicta-minima-soluta-voluptatum-aut-cum-corporis-illum-deleniti-debitis-repudiandae-esse-voluptatem-consectetur-placeat-nam-molestiae-quia', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, delectus aliquam natus dicta minima, soluta voluptatum aut cum corporis illum deleniti debitis repudiandae, esse voluptatem consectetur placeat nam molestiae quia!', '/News/1743577756emailimg.png', '2025-04-25', 'Active', '2025-04-02 01:39:16', '2026-02-07 02:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT 'draft',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Domestic Brand Business', 'domestic-brand-business', '1', '2026-03-12 00:45:20', '2026-03-12 00:45:20'),
(2, 'Institutional Business', 'institutional-business', '1', '2026-03-13 06:33:55', '2026-03-13 06:33:55'),
(3, 'International Business', 'international-business', '1', '2026-03-13 06:34:35', '2026-03-13 06:34:35'),
(4, 'Contract Manufacturing', 'contract-manufacturing', '1', '2026-03-13 06:35:01', '2026-03-13 06:35:01'),
(5, 'Grow with Kalyani', 'grow-with-kalyani', '1', '2026-03-13 06:35:20', '2026-03-13 06:35:20'),
(6, 'Manufacturing Strength', 'manufacturing-strenght', '1', '2026-03-14 14:42:34', '2026-03-14 14:42:34'),
(7, 'Research and Development', 'research-and-development', '1', '2026-03-14 14:42:50', '2026-03-14 14:42:50'),
(8, 'Product Development', 'product-development', '1', '2026-03-14 14:43:04', '2026-03-14 14:43:04'),
(9, 'Marketing Network', 'marketing-network', '1', '2026-03-14 14:43:21', '2026-03-14 14:43:21'),
(10, 'Packaging', 'packaging', '1', '2026-03-14 14:43:43', '2026-03-14 14:43:43'),
(11, 'Company Profile', 'company-profile', '1', '2026-03-14 15:03:31', '2026-03-15 13:12:43'),
(12, 'Quality Policy', 'quality-policy', '1', '2026-03-14 15:03:49', '2026-03-14 15:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `page_layouts`
--

CREATE TABLE `page_layouts` (
  `id` bigint(20) NOT NULL,
  `page_section_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `subheading` varchar(255) DEFAULT NULL,
  `paragraph` text DEFAULT NULL,
  `point_type` enum('box','normal','color_point') DEFAULT NULL,
  `order` int(11) DEFAULT 0,
  `link_text` varchar(255) DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_layouts`
--

INSERT INTO `page_layouts` (`id`, `page_section_id`, `image`, `heading`, `subheading`, `paragraph`, `point_type`, `order`, `link_text`, `link_url`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'sections/yV5oXurVrJ93zmRUm5m0AeNC8dDk8S7oFBJV5q7V.png', 'Empowering Local Farmers with Trusted Solution', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2026-03-13 00:55:51', '2026-03-13 05:09:26'),
(2, 2, 'sections/lULv0AYVjfvR0mDjaoumt1LC6p8EvQKgTwXNORY6.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2026-03-13 00:56:41', '2026-03-14 00:39:29'),
(3, 2, NULL, 'Empowering Farmers with Quality Agricultural Solutions', NULL, 'At Kalyani, we are dedicated to supporting local farmers by providing high-quality insecticides and crop-care products tailored to their specific needs. Our commitment extends beyond products, as we partner with local retailers and offer educational programs to ensure farmers thrive.', 'box', 0, NULL, NULL, 1, 1, NULL, '2026-03-13 00:57:09', '2026-03-13 00:57:09'),
(4, 3, NULL, 'Committed to Supporting Local Farmers\' Needs', NULL, 'At Kalyani, we prioritize the needs of local farmers by providing a comprehensive range of high-quality insecticides, fungicides, and crop-care products. Our solutions are specifically designed to enhance agricultural productivity and sustainability in regional farming.', 'normal', 0, NULL, NULL, 1, 1, NULL, '2026-03-13 04:15:21', '2026-03-13 04:15:21'),
(5, 3, 'sections/5rpM3a1bmygX9iU6CYxGchYkwttB7QzzmwHRVEtX.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2026-03-13 04:16:12', '2026-03-13 04:16:38'),
(6, 5, 'sections/scczYZhJLSteSCSPPBaLwGe1zZTjBrrNok1J5li9.png', 'Affordable Pricing and Support for Farmers', 'We offer competitive pricing and a helpline for agronomy tips', NULL, NULL, 1, NULL, NULL, 1, 1, NULL, '2026-03-13 04:19:15', '2026-03-13 04:19:15'),
(7, 5, 'sections/wKlvG6Yd5DmYwQh1u66oUVjZd9xn0efhzwoHNQ1U.png', 'Compliance with National Agricultural Standards', 'Our products meet all necessary agricultural regulations.', NULL, NULL, 2, NULL, NULL, 1, 1, NULL, '2026-03-13 04:19:49', '2026-03-13 04:19:49'),
(8, 5, 'sections/tzAaedUD6pqZBlTYWWDKDO54UGyw2qmwSkDAsNBl.png', 'Discover Our Commitment to Local Farmers', 'Join us in supporting sustainable farming practices.', NULL, NULL, 3, NULL, NULL, 1, 1, NULL, '2026-03-13 04:20:13', '2026-03-13 04:20:13'),
(9, 6, 'sections/jBzf0CwoIHJdS22LOXXNXBaPmRlmu2JJSdODfIfT.png', 'Your Partner in Crop Protection', 'Join us for tailored agricultural solutions today!', NULL, NULL, 0, 'Join Now', 'https://demokalyani.skilladders.com/view/business/domistic_board.html', 1, 1, NULL, '2026-03-13 05:11:06', '2026-03-13 05:11:06'),
(10, 7, 'sections/HY9etCYNfMh9ckyZJR3UFabrfNBcFs9dftQ8pMJo.png', 'Your Vision, Our Manufacturing Excellence', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-14 03:24:53', '2026-03-14 03:24:53'),
(11, 8, NULL, 'Tailored Solutions for Your Agrochemical Needs', NULL, 'At Kalyani, we specialize in custom formulations that meet your unique requirements. Our flexible approach ensures that you receive the perfect blend of quality and innovation.', 'box', 0, NULL, NULL, 1, 1, NULL, '2026-03-14 03:26:18', '2026-03-14 03:26:18'),
(12, 8, 'sections/5FDGA1cF5xtJcdAPTSLQB1O2JUdYTYjmnftTsNDB.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-14 03:27:03', '2026-03-14 03:27:03'),
(13, 9, 'sections/VmVjFU4FVd7hqLWv7bzcSKyVxzyOTh2qysx6kh5L.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-14 03:30:14', '2026-03-14 03:30:14'),
(14, 9, NULL, 'Quality', 'Commitment to Global Quality Standards', 'At Kalyani, we prioritize compliance with international quality standards, including ISO and GMP certifications. This commitment ensures that our agrochemical products meet the highest benchmarks for safety and efficacy.', NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-14 03:30:42', '2026-03-14 03:30:42'),
(18, 11, NULL, 'Comprehensive Solutions from Start to Finish', NULL, 'We provide complete assistance from initial prototyping to final delivery. Our dedicated team ensures a seamless process tailored to your needs.', 'box', 1, NULL, NULL, 1, 1, NULL, '2026-03-14 03:38:06', '2026-03-14 03:38:06'),
(19, 11, 'sections/PbKz4x1NhJIdICRzOIqeHNChudkjCsS6c1DgLXwy.png', NULL, NULL, NULL, NULL, 2, NULL, NULL, 1, 1, NULL, '2026-03-14 03:38:44', '2026-03-14 03:38:44'),
(20, 12, 'sections/WLJW2RWfL2FMqYPSmZWM89wxLKq3piFgSV8UaBlW.png', 'Unlock Your Business Potential', NULL, 'Partner with us for exclusive benefits and elevate your business to new heights.', NULL, 0, 'Know More', 'http://demokalyani.skilladders.com/view/business/manufacture.html', 1, 1, NULL, '2026-03-14 03:40:00', '2026-03-14 03:40:00'),
(21, 13, 'sections/YVlWPYPBXD7zqnbrKUMkkDKoU3ijaj5DQdS2T2Gm.png', 'Global Expertise Local Impact in Agrochemicals', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-14 04:04:48', '2026-03-14 04:04:48'),
(22, 14, NULL, 'Customized Solutions for Tropical Agriculture', NULL, 'Our agrochemicals are specifically designed to thrive in tropical climates. They effectively combat local pests, ensuring robust crop yields.', 'box', 2, NULL, NULL, 1, 1, NULL, '2026-03-14 04:05:43', '2026-03-14 04:05:43'),
(23, 14, 'sections/5Yw6iNVLWbdHXeox4V41ax7a70R3RWC5aGHtA8b6.png', NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, '2026-03-14 04:06:38', '2026-03-14 04:06:38'),
(24, 15, 'sections/SVTMcwqoQbGQd4btfl7DIG52yrdDTiymVGxzXRdz.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-14 04:12:04', '2026-03-14 04:12:04'),
(25, 15, NULL, 'Streamlined Logistics for Global Reach', NULL, 'Our strategic logistics hubs ensure that your agrochemical needs are met swiftly and effectively. With a focus on speed and reliability, we deliver the products you need when you need them.', 'box', 0, NULL, NULL, 1, 1, NULL, '2026-03-14 04:12:31', '2026-03-14 04:12:31'),
(26, 16, 'sections/4T1QF8JUobVMCuDoBy22NzJXWCsOaiDGzTmPyxSD.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-14 04:15:16', '2026-03-14 04:15:16'),
(27, 16, NULL, 'Partnering for Agricultural Progress Worldwide', NULL, 'We work closely with global agricultural NGOs to enhance farming practices and promote sustainable agriculture. Our partnerships ensure that innovative solutions reach the farmers who need them most.', NULL, 0, 'Join Now', 'https://demokalyani.skilladders.com/view/business/international.html', 1, 1, NULL, '2026-03-14 04:15:39', '2026-03-14 04:15:39'),
(28, 17, 'sections/gASzCkhsajppusIMQBi4nRDBfR0It1a3dAe4yMJn.png', 'Explore Our Global Solutions', NULL, 'Trusted agrochemicals for healthier crops worldwide.', NULL, 0, 'Know More', 'https://demokalyani.skilladders.com/view/business/international.html', 1, 1, NULL, '2026-03-14 04:16:39', '2026-03-14 04:16:39'),
(29, 19, 'sections/iRrHoxTOkfCUWV6xzLFK4Z1kZlo8wnZSGfL9a3hG.png', 'Bulk Agrochemical Supply', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-14 05:33:24', '2026-03-14 05:33:24'),
(30, 20, NULL, 'Strategic Partnerships for Bulk Agrochemical Supply Solutions in Agriculture', NULL, 'We specialize in forming strong alliances with government entities, cooperatives, and agribusinesses to meet their bulk agrochemical needs. Our tailored approach ensures that each partner receives the best solutions for their unique requirements.', 'normal', 0, NULL, NULL, 1, 1, NULL, '2026-03-14 05:47:09', '2026-03-14 05:47:09'),
(31, 20, 'sections/9LTeMakk49vHoIdAdrtiAJwVwVsxI3LDw9hxihTy.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-14 05:47:52', '2026-03-14 05:47:52'),
(32, 22, NULL, 'Strategic Partnerships for Bulk Agrochemical Supply Solutions in Agriculture', NULL, 'We specialize in forming strong alliances with government entities, cooperatives, and agribusinesses to meet their bulk agrochemical needs. Our tailored approach ensures that each partner receives the best solutions for their unique requirements.', 'normal', 0, NULL, NULL, 1, 1, NULL, '2026-03-14 13:28:53', '2026-03-14 13:28:53'),
(33, 22, 'sections/z0zlBq8Zp9lm3DT3XAvTV7UkXffeoMfXgGmkGL6D.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-14 13:30:28', '2026-03-14 13:30:28'),
(34, 24, 'sections/d99Ezv6GQYyMDmslpatyyq4HFMjcIeqLy2MSYNdf.png', 'Unlock Savings with Our Volume Discounts and Customized Formulations', 'We provide personalized support to ensure your specific agricultural requirements are met.', NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2026-03-14 13:34:41', '2026-03-14 13:36:37'),
(36, 24, 'sections/7Cko2FL3I608HOm1SD9BLD8WO64haWtZbtXvuqQJ.png', 'Dedicated Account Management for Seamless Service and Support', 'Our experienced team is committed to your success and satisfaction.', NULL, NULL, 2, NULL, NULL, 1, 1, NULL, '2026-03-14 13:38:18', '2026-03-14 13:38:18'),
(37, 24, 'sections/dF5izBJoBADRqno2lTT0ZB9pqOGFyntN4YnsGrdf.png', 'Efficient Supply Chain and Timely Delivery for Your Operations', 'Count on us for reliable logistics that keep your projects on track.', NULL, NULL, 3, NULL, NULL, 1, 1, NULL, '2026-03-14 13:40:14', '2026-03-14 13:40:14'),
(38, 25, 'sections/UmXRNrNO4F2XGpYe44PQ0XoVDnCs5KH4HkPvHlyG.png', 'Unlock Your Business Potential', 'Unlock Your Business Potential', NULL, NULL, 0, 'Join Now', 'https://demokalyani.skilladders.com/view/business/institution.html', 1, 1, NULL, '2026-03-14 13:43:51', '2026-03-14 13:43:51'),
(39, 26, 'sections/aN6luEDTHvEiitKNYzLSU9jEIx1UNj3n8ERmtQe3.png', 'Building Success Together with Kalyani', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-14 14:14:33', '2026-03-14 14:14:33'),
(40, 27, NULL, 'Unlock Your Potential with Exclusive Benefits and Support from Kalyani', NULL, 'Partnering with Kalyani grants you exclusive territorial rights, empowering you to dominate your market. Our comprehensive marketing support and training ensure you have the tools needed for success.', NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-14 14:16:17', '2026-03-14 14:16:17'),
(41, 27, 'sections/Cf258T36VekP5vPLZ4i6sNxSt4k91FJiJPfRqQd3.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-14 14:16:36', '2026-03-14 14:16:36'),
(42, 28, 'sections/SrDQpEK7CpoF9npHn97GzRyCO93zfstz19kHWtub.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-14 14:39:47', '2026-03-14 14:39:47'),
(43, 28, NULL, 'Unlock Your Potential with Exclusive Benefits and Support from Kalyani', NULL, 'Partnering with Kalyani grants you exclusive territorial rights, empowering you to dominate your market. Our comprehensive marketing support and training ensure you have the tools needed for success.', NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-14 14:40:13', '2026-03-14 14:40:13'),
(44, 29, 'sections/VlMdbKq31lYM3PRzOfsz8bLCD2o2Lyyw6erlFGta.png', 'Unlock Your Business Potential', 'Explore products crafted for farmers, addressing unique challenges with science-backed solutions for success.', NULL, NULL, 0, 'Join Now', 'https://demokalyani.skilladders.com/view/business/kalyanigrow.html', 1, 1, NULL, '2026-03-14 14:41:04', '2026-03-14 14:41:04'),
(45, 30, 'sections/oukHABoORiFIgtGcWlPnQPvlJVjS9pDRn6hVKEc2.png', 'Quality Policy', NULL, 'Kalyani Industries Limited’s Commitment to provide high quality, safe and effective solution for Pest free world', NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 01:16:44', '2026-03-15 01:16:44'),
(46, 32, 'sections/cJ7fQQNT4BlC6AJ4utrAO0SqYgIY9ObFdo4vPCTU.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 01:21:44', '2026-03-15 01:21:44'),
(47, 32, NULL, 'Deliver High Quality Product:', NULL, 'Company persistently works towards developing high quality products to ensure a pest-free household. It puts in constant efforts and invests sufficiently in Research and Development to develop products as per international quality standard which gives best performance not only in increasing crop yield but also in control of household pests. Company aims to develop high quality, safe and cost-effective product with consistent production to deliver on time. At Kalyani industries our utmost priority is the quality of our products. We strive to create products of the best quality which are effective and efficient.', NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 01:22:10', '2026-03-15 01:22:10'),
(48, 33, 'sections/YC6nKNnm6e2ixErbWqPtKF8WLGWEZbIX0ZFJH4mS.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2026-03-15 01:23:12', '2026-03-15 01:24:24'),
(49, 33, NULL, 'Customer Satisfaction:', NULL, 'Our prime motto is customer satisfaction by delivering right products at right time as per customer expectation. We believe in long term relationship based on trust and mutual success. Company constantly work hard in development of Agrochemicals and Household insecticides so our farmer get high quality and effective products on right time which benefited by high crop yield with minimum losses due to pest attack. On other hand our residential and non residential customers live peacefully without problem of household pest by use of our internationally approved products. This will reduce the chance of increase of vector borne disease.', NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 01:23:43', '2026-03-15 01:23:43'),
(50, 34, NULL, NULL, NULL, NULL, 'color_point', 0, NULL, NULL, 1, 1, NULL, '2026-03-15 01:25:37', '2026-03-15 01:25:37'),
(51, 35, 'sections/9f8dvXJnTDhYscz7CyqJhWmhrcXIPAr6oJHPV1Qu.png', 'Innovative Manufacturing for a Sustainable Future', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 01:51:13', '2026-03-15 01:51:13'),
(52, 36, NULL, 'Our advanced manufacturing units utilize automated production lines that prioritize eco-friendly processes. Experience the perfect blend of precision and sustainability in every product we create', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 01:52:03', '2026-03-15 01:52:03'),
(53, 36, 'sections/zYOng65wynrJ3nmlFquhiS0NFiDHl7dMfp4kPnsh.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 01:52:15', '2026-03-15 01:52:15'),
(54, 38, 'sections/yRP0CTdVvn09NDDHzozJdAyGo9xSagUpWSq8Q3dC.png', 'Ensuring Worker Safety at Every Step', 'Our safety measures exceed industry standards.', NULL, NULL, 1, NULL, NULL, 1, 1, NULL, '2026-03-15 01:53:50', '2026-03-15 01:53:50'),
(55, 38, 'sections/rteM5Um6wx0fMi77uoT29ZVIV7DENnujETpSgNQ1.png', 'Quality Control for Unmatched Product Safety', 'Rigorous testing guarantees the safety of our products.', NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 01:54:23', '2026-03-15 01:54:23'),
(56, 38, 'sections/wB5XbstmkZE4ilLyt3yVsXPnIR9JxKcBS4Phsu3b.png', 'A Culture of Safety and Accountability', 'We foster a culture where safety is paramount.', NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 01:54:47', '2026-03-15 01:54:47'),
(57, 39, 'sections/b4rX3WKwveFaN0Q78wbnD0rXcQM6aErhMQla6TYs.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 02:00:20', '2026-03-15 02:00:20'),
(58, 39, NULL, 'Leading the Way in Agricultural Research and Development Innovations', NULL, 'Our in-house R&D labs are at the forefront of agricultural innovation. We collaborate with top agricultural universities to develop sustainable chemistry solutions.', 'box', 0, NULL, NULL, 1, 1, NULL, '2026-03-15 02:00:53', '2026-03-15 02:00:53'),
(59, 40, NULL, 'Leading the Way in Agricultural Research and Development Innovations', NULL, 'Our in-house R&D labs are at the forefront of agricultural innovation. We collaborate with top agricultural universities to develop sustainable chemistry solutions.', 'box', 0, NULL, NULL, 1, 1, NULL, '2026-03-15 03:20:39', '2026-03-15 03:38:53'),
(60, 40, 'sections/v8KKcniTr4ELfhtCTIU2UW9SVPVXImTCM5WfOeIV.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 03:20:58', '2026-03-15 03:20:58'),
(62, 42, 'sections/V1nUCBkNApKYakVzSoYWYYLSYX8PY5Ed0YxJgvuM.png', 'Leading Innovation for Sustainable Agriculture Solutions', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 05:19:26', '2026-03-15 05:19:26'),
(63, 43, 'sections/NhOMDBXknbpExV5PCfoEtp82aJPNcNzHmnyIhRKP.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 05:20:19', '2026-03-15 05:20:19'),
(64, 43, NULL, 'Leading the Way in Agricultural Research and Development Innovations', NULL, 'Our in-house R&D labs are at the forefront of agricultural innovation. We collaborate with top agricultural universities to develop sustainable chemistry solutions.', 'box', 0, NULL, NULL, 1, 1, NULL, '2026-03-15 05:20:38', '2026-03-15 05:20:38'),
(65, 45, 'sections/cGJ5LZNfyakC26pUzMeCd8nHih37zRKsYAQxSFNA.png', 'Ensuring Worker Safety at Every Step', 'Our safety measures exceed industry standards.', NULL, NULL, 1, NULL, NULL, 1, 1, NULL, '2026-03-15 05:26:04', '2026-03-15 05:26:04'),
(66, 45, 'sections/hLTOUn6R1vPtTFrgIeuOGOX8ypocQUpvqVdsDukW.png', 'Quality Control for Unmatched Product Safety', 'Rigorous testing guarantees the safety of our products.', NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 05:26:54', '2026-03-15 05:26:54'),
(67, 45, 'sections/skEPFULOjdcfpnzwU9nyF9rWXJdbMOIawSLjEoUr.png', 'A Culture of Safety and Accountability', 'We foster a culture where safety is paramount.', NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 05:27:14', '2026-03-15 05:27:14'),
(68, 46, NULL, 'Innovative Solutions for Sustainable Agriculture: Patents and Research Advancements', NULL, 'Our commitment to research has led to groundbreaking patents and novel formulations. We focus on developing pest-resistant solutions that meet the challenges of modern agriculture.', 'box', 0, NULL, NULL, 1, 1, NULL, '2026-03-15 05:28:04', '2026-03-15 05:28:04'),
(69, 46, 'sections/jodxCHfNHMQUjmVtU4kod4fap2BesHgFt0eFCi4m.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 05:28:58', '2026-03-15 05:28:58'),
(70, 47, 'sections/OuXxir5Du8UxRegzTiTxUWnYakjlf7L3XYp3Ho5l.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 05:31:28', '2026-03-15 05:31:28'),
(71, 47, NULL, 'Innovative Solutions for Sustainable Agriculture: Patents and Research Advancements', NULL, 'Our commitment to research has led to groundbreaking patents and novel formulations. We focus on developing pest-resistant solutions that meet the challenges of modern agriculture.', 'box', 0, NULL, NULL, 1, 1, NULL, '2026-03-15 05:31:45', '2026-03-15 05:31:45'),
(72, 48, 'sections/uw9DjW4YxQXGwNfAaj9dVwwkD8KOFe3y0lZMHa0K.png', 'Innovative Solutions for Modern Farming Challenges', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 05:35:27', '2026-03-15 05:35:27'),
(73, 49, NULL, 'Our Comprehensive Product Development Process: From Concept to Crop Success', NULL, 'We begin with thorough market research to identify farmer needs, followed by precise formulation and rigorous field testing. This ensures our products are ready for launch, tailored to meet the unique challenges faced by farmers.', NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 05:37:31', '2026-03-15 05:37:31'),
(74, 49, 'sections/qfwsPG46TiJkuE02a9qXDlsk1dymuyMQAOn8hMio.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 05:37:44', '2026-03-15 05:37:44'),
(75, 51, 'sections/ska9wLRPlG4efZhLLYipFV6aM7pTII8EBvmmUq7k.png', 'Medium length section heading goes here', 'Our easy-to-measure bottles simplify the application process for farmers.', NULL, NULL, 1, NULL, NULL, 1, 1, NULL, '2026-03-15 05:39:05', '2026-03-15 05:39:05'),
(76, 51, 'sections/C7aNxWiWRuBliYAc3wtB9JEjAka3BbS74cTJ43gP.png', 'Medium length section heading goes here', 'Choose our eco-friendly products to support a healthier planet.', NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 05:39:26', '2026-03-15 05:39:26'),
(77, 51, 'sections/KJYnkp0mBI1TjorYBnCW3AU9RMlpv19txly2RJta.png', 'A Culture of Safety and Accountability', 'We foster a culture where safety is paramount.', NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 05:39:43', '2026-03-15 05:39:43'),
(78, 52, NULL, 'Innovative Solutions for Sustainable Agriculture: Patents and Research Advancements', NULL, 'Our commitment to research has led to groundbreaking patents and novel formulations. We focus on developing pest-resistant solutions that meet the challenges of modern agriculture.', 'box', 0, NULL, NULL, 1, 1, NULL, '2026-03-15 05:43:45', '2026-03-15 05:43:45'),
(79, 52, 'sections/ELxqsnButt7QSC54hEHCYAxLXkZAQSQFmCxn1Vxh.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 05:43:57', '2026-03-15 05:43:57'),
(80, 53, NULL, 'Innovative Solutions for Sustainable Agriculture: Patents and Research Advancements', NULL, 'Our commitment to research has led to groundbreaking patents and novel formulations. We focus on developing pest-resistant solutions that meet the challenges of modern agriculture.', 'box', 0, NULL, NULL, 1, 1, NULL, '2026-03-15 05:45:55', '2026-03-15 05:45:55'),
(81, 53, 'sections/bfz09S3gzbigLAauXWCKtUmMUVvcroRrBArl19jU.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 05:47:04', '2026-03-15 05:47:04'),
(82, 54, 'sections/pYEB4EsYJKjuzCKiy4GvWRRl9VTXfc2BnV7uTSTo.png', 'Bridging Farms with Innovative Solutions Worldwide', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 05:51:35', '2026-03-15 05:51:35'),
(85, 56, 'sections/hb3f8tnVDWxBlNBHqaNMJgeuVvj3ewjPfKCctmTy.png', 'Multilingual Support for Every Farmer\'s Needs', 'Our dedicated customer support team speaks multiple languages to assist farmers across diverse regions.', NULL, NULL, 1, NULL, NULL, 1, 1, NULL, '2026-03-15 06:10:12', '2026-03-15 06:10:12'),
(86, 56, 'sections/U5kCuKQNOvRvr0bl4WcwE8kXzSsbJbjGY5wPXU33.png', 'Digital Tools for Enhanced Farming Efficiency', 'Utilize our digital platforms for real-time insights and expert advice.', NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 06:10:44', '2026-03-15 06:10:44'),
(87, 56, 'sections/rr2gocYUgTTnLhCn4ofHdtss7kisEiZ7BjDb4q4X.png', 'Join Our Retailer Training Programs Today', 'Enhance your skills and better serve your customers', NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 06:11:05', '2026-03-15 06:11:05'),
(88, 57, NULL, 'Our Reach: Connecting Farms Worldwide', 'We proudly serve farmers across 15 countries. Our extensive network ensures that solutions are always within reach.', NULL, 'box', 0, NULL, NULL, 1, 1, NULL, '2026-03-15 06:13:46', '2026-03-15 06:13:56'),
(89, 57, 'sections/xS7YTIZxAGYNT7a8KlgrUXpMqgprNxZWaKR2TBLp.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 06:14:19', '2026-03-15 06:14:19'),
(90, 58, 'sections/ZDa5nLvrvLzRCXgSmfIEdIosMrxyFTvdwRAb57RP.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 06:14:52', '2026-03-15 06:14:52'),
(91, 59, 'sections/7wbZNG3b6jgLoL86emNo7QUdGrg1XFCvMgXFccup.png', 'Innovating Agriculture Through Research and Development', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 06:27:17', '2026-03-15 06:27:17'),
(92, 60, NULL, 'Transforming Ideas into Solutions: Our R&D Process Explained', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 06:39:08', '2026-03-15 06:39:08'),
(93, 60, NULL, NULL, NULL, 'Our comprehensive training programs equip retailers with the knowledge they need to support farmers effectively. We also provide innovative digital tools, including app-based advisory services, to enhance farm management. Together, these resources empower farmers to make informed decisions and optimize their yields.', NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 06:39:22', '2026-03-15 06:39:22'),
(94, 61, 'sections/PlOBtOLPcCiiBFkzZlYiPpU3M2FA1GV22Z98x5LA.png', 'From Concept to Field: The R&D Journey', 'Our approach combines creativity with scientific rigor to develop novel formulations.', NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 07:20:18', '2026-03-15 07:20:18'),
(95, 61, 'sections/0v6Pddflw1MkuJOlf4fBOadx2ZcvPSB4seotsOdL.png', 'Rapid Response to Agricultural Challenge', 'We prioritize quick adaptations to ensure our products meet evolving needs.', NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 07:20:42', '2026-03-15 07:20:42'),
(96, 61, 'sections/mmFhmKXMdl2Bgqn6HwPS7M2eay4cAhKkJoQjOfsp.png', 'Innovative Solutions for Pest Resistance', 'Our patented technologies lead the way in sustainable pest management.', NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 07:21:01', '2026-03-15 07:21:01'),
(97, 62, 'sections/qTUrVxv60wbI8EilAmc1RDqCYTzRzN9Sn0mWf9p4.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 11:07:22', '2026-03-15 11:07:22'),
(98, 62, NULL, 'Decades of Expertise in Agricultural Research and Development', NULL, 'Our extensive R&D experience ensures we stay ahead of agricultural challenges. We conduct trials in real-field conditions to validate our innovative solutions.', 'normal', 0, NULL, NULL, 1, 1, NULL, '2026-03-15 11:07:47', '2026-03-15 11:07:47'),
(99, 64, 'sections/UIBxF3jPqj9iE1BgariMlGs2xjQ5RRAlU8F3Lh7s.png', 'Ensuring Worker Safety at Every Step', 'Our safety measures exceed industry standards.', NULL, NULL, 1, NULL, NULL, 1, 1, NULL, '2026-03-15 11:09:58', '2026-03-15 11:09:58'),
(100, 64, 'sections/t0zM7vhs4ypFEUPfVSwsOJPmt6dkVLAvzXLAo4ML.png', 'Quality Control for Unmatched Product Safety', 'Rigorous testing guarantees the safety of our products.', NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 11:10:34', '2026-03-15 11:10:34'),
(101, 64, 'sections/5lh7GeesVMmVmIEzqeldUL0F7u7001Uf1wV0UVNI.png', 'A Culture of Safety and Accountability', 'We foster a culture where safety is paramount.', NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 11:10:54', '2026-03-15 11:10:54'),
(102, 65, NULL, 'Innovative Packaging for a Sustainable Future', NULL, 'Our packaging solutions are designed with safety and sustainability in mind. Featuring tamper-proof, weather-resistant materials, and child-safe locks, we ensure your products are protected while being eco-friendly.', NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 11:11:41', '2026-03-15 11:11:41'),
(103, 65, 'sections/02Gg8zY1F7FGZ2otZfiFjtUnPXc6kCF2lAxa83uW.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 11:11:53', '2026-03-15 11:11:53'),
(104, 66, NULL, 'Company Profile', 'Kalyani Industries Limited Pioneer developer and innovator of cutting-edge agrochemical and public health pesticide products.', 'Certified by HACCP, ISO 9001, ISO 14001, OHSAS, WHO GMP, IEC 17025; Company has world class manufacturing plant having facilities to manufacture all types of Pesticides including Technical for Export, Agrochemicals and Public health Pesticides. Currently we are manufacturing 378 products to serve domestic and international market.\r\n\r\nFounded on firm conviction of agricultural productivity, public health, and environmental protection, Kalyani Industries Limited has emerged as a trusted business partner and associate of farmers, Pest Management Professional, public health organizations, and industries looking for effective and sustainable pest control solutions at reasoable cost. Our portfolio of high-value products is diversified to address the changing needs of modern agriculture and worldwide public health.\r\n\r\nDue to unparellel standard of product with capacity to produce more, Company has able to export many countries of the world without interception of domestc supply.', NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 12:50:44', '2026-03-15 12:50:44'),
(105, 66, 'sections/mKm0mcDn6w2WQXjqGJcqMKPj7bspnTMylLKbOhiv.png', NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, '2026-03-15 12:51:57', '2026-03-15 12:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `page_sections`
--

CREATE TABLE `page_sections` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `section_name` varchar(100) NOT NULL,
  `section_heading` varchar(255) DEFAULT NULL,
  `section_subheading` varchar(255) DEFAULT NULL,
  `section_paragraph` longtext DEFAULT NULL,
  `layout_type` enum('full-width','grid_2','grid_3','') DEFAULT NULL,
  `image_layout` enum('top','left','right','') DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_sections`
--

INSERT INTO `page_sections` (`id`, `page_id`, `section_name`, `section_heading`, `section_subheading`, `section_paragraph`, `layout_type`, `image_layout`, `sort_order`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 1, 'Hero Section', NULL, NULL, NULL, NULL, NULL, 1, 1, '2026-03-13 00:55:31', '2026-03-13 02:11:00', NULL, NULL, NULL),
(2, 1, 'Section-1', NULL, NULL, NULL, 'grid_2', 'left', 2, 1, '2026-03-13 00:56:25', '2026-03-13 00:56:25', NULL, NULL, NULL),
(3, 1, 'Section-2', NULL, NULL, NULL, 'grid_2', 'right', 3, 1, '2026-03-13 04:14:18', '2026-03-13 04:14:18', NULL, NULL, NULL),
(4, 1, 'Section-3', 'Comprehensive Solutions for Every Crop', 'Our extensive product range caters to various crops, including cereals, fruits, and vegetables. We prioritize affordability and provide dedicated support to empower farmers.', NULL, 'full-width', 'top', 4, 1, '2026-03-13 04:18:11', '2026-03-13 04:18:11', NULL, NULL, NULL),
(5, 1, 'Section-4', NULL, NULL, NULL, 'grid_3', 'top', 5, 1, '2026-03-13 04:18:27', '2026-03-13 09:50:33', NULL, NULL, NULL),
(6, 1, 'Footer Section', NULL, NULL, NULL, 'full-width', 'top', 6, 1, '2026-03-13 05:10:15', '2026-03-13 10:52:55', NULL, NULL, NULL),
(7, 4, 'Hero Section', NULL, NULL, NULL, 'full-width', 'top', 1, 1, '2026-03-14 03:24:18', '2026-03-14 03:24:18', NULL, NULL, NULL),
(8, 4, 'Section-1', NULL, NULL, NULL, 'grid_2', 'right', 2, 1, '2026-03-14 03:25:18', '2026-03-14 09:05:54', NULL, NULL, NULL),
(9, 4, 'Section-2', NULL, NULL, NULL, 'grid_2', 'left', 3, 1, '2026-03-14 03:30:03', '2026-03-14 03:30:03', NULL, NULL, NULL),
(11, 4, 'Section-3', NULL, NULL, NULL, 'grid_2', 'right', 4, 1, '2026-03-14 03:36:53', '2026-03-14 03:36:53', NULL, NULL, NULL),
(12, 4, 'Footer Section', NULL, NULL, NULL, 'full-width', 'top', 5, 1, '2026-03-14 03:39:17', '2026-03-14 03:39:17', NULL, NULL, NULL),
(13, 3, 'Hero Section', NULL, NULL, NULL, 'full-width', 'top', 1, 1, '2026-03-14 04:04:21', '2026-03-14 04:04:21', NULL, NULL, NULL),
(14, 3, 'Section-1', NULL, NULL, NULL, 'grid_2', 'left', 2, 1, '2026-03-14 04:05:12', '2026-03-14 04:05:12', NULL, NULL, NULL),
(15, 3, 'Section-3`', NULL, NULL, NULL, 'grid_2', 'right', 3, 1, '2026-03-14 04:11:55', '2026-03-14 04:11:55', NULL, NULL, NULL),
(16, 3, 'Section-4', NULL, NULL, NULL, 'grid_2', 'left', 4, 1, '2026-03-14 04:15:01', '2026-03-14 04:15:01', NULL, NULL, NULL),
(17, 3, 'Footer Section', NULL, NULL, NULL, 'full-width', 'top', 4, 1, '2026-03-14 04:16:07', '2026-03-14 04:16:07', NULL, NULL, NULL),
(19, 2, 'Hero Section', NULL, NULL, NULL, 'full-width', 'top', 1, 1, '2026-03-14 05:32:59', '2026-03-14 05:32:59', NULL, NULL, NULL),
(20, 2, 'Section-1', NULL, NULL, NULL, 'grid_2', 'left', 2, 1, '2026-03-14 05:46:44', '2026-03-14 05:46:44', NULL, NULL, NULL),
(22, 2, 'Section-2', NULL, NULL, NULL, 'grid_2', 'right', 3, 1, '2026-03-14 13:27:46', '2026-03-14 13:27:46', NULL, NULL, NULL),
(23, 2, 'Section-3', 'Tailored Solutions for Your Agricultural Bulk Supply Needs', NULL, NULL, NULL, NULL, 4, 1, '2026-03-14 13:31:53', '2026-03-14 13:32:17', NULL, NULL, NULL),
(24, 2, 'Section-4', NULL, NULL, NULL, 'grid_3', 'top', 5, 1, '2026-03-14 13:32:43', '2026-03-14 13:32:43', NULL, NULL, NULL),
(25, 2, 'Footer Section', NULL, NULL, NULL, 'full-width', 'top', 6, 1, '2026-03-14 13:43:00', '2026-03-14 13:43:00', NULL, NULL, NULL),
(26, 5, 'Hero Section', NULL, NULL, NULL, 'full-width', 'top', 1, 1, '2026-03-14 14:14:06', '2026-03-14 14:14:06', NULL, NULL, NULL),
(27, 5, 'Section-1', NULL, NULL, NULL, 'grid_2', 'right', 2, 1, '2026-03-14 14:15:38', '2026-03-14 14:15:38', NULL, NULL, NULL),
(28, 5, 'Section-2', NULL, NULL, NULL, 'grid_2', 'left', 3, 1, '2026-03-14 14:39:37', '2026-03-14 14:39:37', NULL, NULL, NULL),
(29, 5, 'Footer Section', NULL, NULL, NULL, 'full-width', 'top', 4, 1, '2026-03-14 14:40:31', '2026-03-14 14:40:31', NULL, NULL, NULL),
(30, 12, 'Hero Section', NULL, NULL, NULL, 'full-width', 'top', 1, 1, '2026-03-15 01:15:43', '2026-03-15 01:15:43', NULL, NULL, NULL),
(31, 12, 'Section-1', NULL, NULL, 'Kalyani, a research based company dedicated to work as trusted partner to the Agriculture community and also in eliminate vector borne disease by supply of quality products. Our commitment to quality is embedded in every aspect of our business, from product development to delivery.  Our policy is to:', 'full-width', 'top', 2, 1, '2026-03-15 01:20:07', '2026-03-15 01:20:07', NULL, NULL, NULL),
(32, 12, 'Section-2', NULL, NULL, NULL, 'grid_2', 'right', 3, 1, '2026-03-15 01:20:43', '2026-03-15 01:20:43', NULL, NULL, NULL),
(33, 12, 'Section-3', NULL, NULL, NULL, 'grid_2', 'left', 4, 1, '2026-03-15 01:22:36', '2026-03-15 01:22:36', NULL, NULL, NULL),
(34, 12, 'Section-4', NULL, NULL, NULL, 'full-width', 'top', 5, 1, '2026-03-15 01:25:26', '2026-03-15 01:25:26', NULL, NULL, NULL),
(35, 6, 'Hero Section', NULL, NULL, NULL, 'full-width', 'top', 1, 1, '2026-03-15 01:50:40', '2026-03-15 01:50:40', NULL, NULL, NULL),
(36, 6, 'Section-1', NULL, NULL, NULL, 'grid_2', 'left', 2, 1, '2026-03-15 01:51:37', '2026-03-15 01:51:37', NULL, NULL, NULL),
(37, 6, 'Section-2', 'Commitment to Safety and Quality Standards', NULL, 'We prioritize stringent safety protocols to protect both our workers and products. Our commitment to safety ensures a secure environment and high-quality outcomes.', 'full-width', 'top', 3, 1, '2026-03-15 01:52:49', '2026-03-15 01:52:49', NULL, NULL, NULL),
(38, 6, 'Section-3', NULL, NULL, NULL, 'grid_3', 'top', 4, 1, '2026-03-15 01:53:13', '2026-03-15 01:53:13', NULL, NULL, NULL),
(39, 6, 'Section-4', NULL, NULL, NULL, 'grid_2', 'right', 5, 1, '2026-03-15 02:00:00', '2026-03-15 02:00:00', NULL, NULL, NULL),
(40, 6, 'Section-5', NULL, NULL, NULL, 'grid_2', 'left', 6, 1, '2026-03-15 03:18:18', '2026-03-15 03:18:18', NULL, NULL, NULL),
(42, 7, 'Hero Section', NULL, NULL, NULL, 'full-width', 'top', 1, 1, '2026-03-15 05:17:51', '2026-03-15 05:17:51', NULL, NULL, NULL),
(43, 7, 'Section-1', NULL, NULL, NULL, 'grid_2', 'right', 2, 1, '2026-03-15 05:20:12', '2026-03-15 05:20:12', NULL, NULL, NULL),
(44, 7, 'Section-2', 'Commitment to Safety and Quality Standards', 'We prioritize stringent safety protocols to protect both our workers and products. Our commitment to safety ensures a secure environment and high-quality outcomes.', NULL, 'full-width', 'top', 3, 1, '2026-03-15 05:23:37', '2026-03-15 05:23:37', NULL, NULL, NULL),
(45, 7, 'Section-3', NULL, NULL, NULL, 'grid_3', 'top', 4, 1, '2026-03-15 05:23:58', '2026-03-15 05:23:58', NULL, NULL, NULL),
(46, 7, 'Section-4', NULL, NULL, NULL, 'grid_2', 'left', 5, 1, '2026-03-15 05:27:40', '2026-03-15 05:27:40', NULL, NULL, NULL),
(47, 7, 'Section-5', NULL, NULL, NULL, 'grid_2', 'right', 6, 1, '2026-03-15 05:29:45', '2026-03-15 05:29:45', NULL, NULL, NULL),
(48, 8, 'Hero Section', NULL, NULL, NULL, 'full-width', 'top', 1, 1, '2026-03-15 05:35:05', '2026-03-15 05:35:05', NULL, NULL, NULL),
(49, 8, 'Section-1', NULL, NULL, NULL, 'grid_2', 'left', 2, 1, '2026-03-15 05:37:11', '2026-03-15 05:37:11', NULL, NULL, NULL),
(50, 8, 'Section-2', 'Medium length section heading goes here', NULL, 'Our product development begins with thorough market research to identify the needs of farmers. We then formulate innovative solutions, followed by rigorous field testing to ensure effectiveness. Finally, we launch products that are continuously refined based on farmer feedback.', 'full-width', 'top', 3, 1, '2026-03-15 05:38:21', '2026-03-15 05:38:21', NULL, NULL, NULL),
(51, 8, 'Section-3', NULL, NULL, NULL, 'grid_3', 'top', 4, 1, '2026-03-15 05:38:42', '2026-03-15 05:40:35', NULL, NULL, NULL),
(52, 8, 'Section-4', NULL, NULL, NULL, 'grid_2', 'right', 5, 1, '2026-03-15 05:43:22', '2026-03-15 05:43:22', NULL, NULL, NULL),
(53, 8, 'Section-5', NULL, NULL, NULL, 'grid_2', 'left', 6, 1, '2026-03-15 05:45:36', '2026-03-15 05:45:36', NULL, NULL, NULL),
(54, 9, 'Hero Section', NULL, NULL, NULL, 'full-width', 'top', 1, 1, '2026-03-15 05:51:21', '2026-03-15 05:51:21', NULL, NULL, NULL),
(55, 9, 'Section-1', 'Transforming Ideas into Solutions: Our R&D Process Explained', NULL, 'Our research and development process begins with innovative ideas that address real-world agricultural challenges. We conduct thorough field trials to ensure our solutions perform effectively in various conditions. This commitment allows us to respond swiftly to emerging pest and disease threats.', 'full-width', 'top', 2, 1, '2026-03-15 05:52:26', '2026-03-15 06:08:44', NULL, NULL, NULL),
(56, 9, 'Section-2', NULL, NULL, NULL, 'grid_3', 'top', 3, 1, '2026-03-15 06:09:34', '2026-03-15 06:09:34', NULL, NULL, NULL),
(57, 9, 'Section-3', NULL, NULL, NULL, 'grid_2', 'right', 4, 1, '2026-03-15 06:13:28', '2026-03-15 06:13:28', NULL, NULL, NULL),
(58, 9, 'Footer Section', NULL, NULL, NULL, 'full-width', 'top', 5, 1, '2026-03-15 06:14:43', '2026-03-15 06:14:43', NULL, NULL, NULL),
(59, 10, 'Hero Section', NULL, NULL, NULL, 'full-width', 'top', 1, 1, '2026-03-15 06:27:04', '2026-03-15 06:27:04', NULL, NULL, NULL),
(60, 10, 'Section-1', NULL, NULL, NULL, 'grid_2', 'top', 2, 1, '2026-03-15 06:38:57', '2026-03-15 06:39:31', NULL, NULL, NULL),
(61, 10, 'Section-2', NULL, NULL, NULL, 'grid_3', 'top', 3, 1, '2026-03-15 07:19:40', '2026-03-15 07:19:40', NULL, NULL, NULL),
(62, 10, 'Section-3', NULL, NULL, NULL, 'grid_2', 'right', 4, 1, '2026-03-15 11:06:55', '2026-03-15 11:06:55', NULL, NULL, NULL),
(63, 10, 'Section-4', 'Commitment to Safety and Quality Standards', NULL, 'We prioritize stringent safety protocols to protect both our workers and products. Our commitment to safety ensures a secure environment and high-quality outcomes.', 'full-width', 'top', 5, 1, '2026-03-15 11:08:48', '2026-03-15 11:08:48', NULL, NULL, NULL),
(64, 10, 'Section-5', NULL, NULL, NULL, 'grid_3', 'top', 6, 1, '2026-03-15 11:09:33', '2026-03-15 11:09:33', NULL, NULL, NULL),
(65, 10, 'Section-6', NULL, NULL, NULL, 'grid_2', 'left', 7, 1, '2026-03-15 11:11:21', '2026-03-15 11:11:21', NULL, NULL, NULL),
(66, 11, 'Section-1', NULL, NULL, NULL, 'grid_2', 'left', 1, 0, '2026-03-15 12:50:13', '2026-03-15 13:31:52', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image_url`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KAVITA PRAMOD MORE', 'ranjeet', '/product/1728998692download (6).jfif', 'active', '2024-10-15 06:41:10', '2024-10-15 07:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `brochure` varchar(255) NOT NULL,
  `composition` varchar(255) NOT NULL,
  `model_of_action` varchar(255) NOT NULL,
  `packing` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` text DEFAULT NULL,
  `features` longtext NOT NULL,
  `useage_type` int(11) NOT NULL,
  `useage` longtext DEFAULT NULL,
  `is_active` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `category_id`, `subcategory_id`, `title`, `slug`, `image`, `brochure`, `composition`, `model_of_action`, `packing`, `description`, `features`, `useage_type`, `useage`, `is_active`, `created_at`, `updated_at`) VALUES
(20, 21, 22, 'OZIER', 'ozier', '/product/17510212851.png', '', 'Imidacloprid 30.5% SC', 'Systemic', '[\"50ml\",\"100ml\",\"250ml\",\"500ml\",\"1litre\",\"5litre\",\"25litre\"]', 'A slight breakage in the treated area, leaving the treated structure die without any initial symptoms. Ozier containing Imidacloprid 30.5% SC is new termiticide which break the concept of repellence and it is systemic & contact insecticide.', '<p class=\"MsoNormal\" style=\"font-size: 10pt; font-weight: normal; font-family: Arial, Verdana; text-align: justify;\"></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">REASON TO CHOOSE OZIER AS\r\nTERMITICIDE:&nbsp;</span></b><span style=\"font-size:12.0pt;line-height:107%\">\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Ozier\r\nhas a lethal action on termite.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Ozier\r\nhas an ability to spread in the all direction of soil by a process called&nbsp;as\r\nLateral Soil movement” which depend on soil moisture ensuring&nbsp;thorough\r\nsoil coverage with no gaps whereas vertical soil movement in&nbsp;case of\r\nChlorpyriphos.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Ozier\r\nis odourless, low toxic and water-based formulation.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Ozier\r\ndosage is very low i.e.2.1 ml in 1 litre of water with comparison to&nbsp;high\r\ndose of Chlorpyriphos 20 % EC i.e.50 ml in 1 litre of water.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Ozier\r\ncreates a non-detectable barrier which termite cannot detect whereas&nbsp;other\r\nconventional termiticide create detectable barrier which termite can&nbsp;detect\r\nand so termite avoid treated zone and look for gaps in the barrier to&nbsp;enter.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Ozier\r\nLD50 value is 450 mg/kg and 135 mg/kg are of Chlorpyriphos so&nbsp;OZIER is\r\nvery low toxic than Chlorpyriphos.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Ozier\r\nremain intact for a longer time than other conventional termiticide&nbsp;which\r\nmake ozier cost effective in the long term.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Ozier\r\ncan be applied in both pre and post construction treatment.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:18.0pt;mso-add-space:auto\"><span style=\"font-size:12.0pt;line-height:107%\">&nbsp;</span></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">SYMPTOMS OF POISONING:</span></b><span style=\"font-size:14.0pt;line-height:107%;color:#ED7D31;mso-themecolor:accent2\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 10pt; text-align: justify;\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoListParagraph\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l3 level1 lfo5\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Apathy,\r\nMyatonia, Tremor, Difficult breathing &amp; Myospasms.<o:p></o:p></span></p><p style=\"font-size: 10pt; font-weight: normal; font-family: Arial, Verdana;\"></p>', 1, '<p class=\"MsoNormal\" style=\"font-size: 13.3333px;\"><b><span style=\"font-size: 14pt; line-height: 19.9733px; color: rgb(237, 125, 49);\">DOSAGE:</span></b><span style=\"font-size: 14pt; line-height: 19.9733px; color: rgb(237, 125, 49);\"><o:p></o:p></span></p><p class=\"MsoListParagraph\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">2.1ml formulated Ozier diluted in 1 Litre of water.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13.3333px;\"><span style=\"font-size: 12pt; line-height: 17.12px;\">&nbsp;<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13.3333px;\"><b><span style=\"font-size: 14pt; line-height: 19.9733px; color: rgb(237, 125, 49);\">HOW TO USE OZIER:&nbsp;</span></b><span style=\"font-size: 14pt; line-height: 19.9733px; color: rgb(237, 125, 49);\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13.3333px; margin-left: 14.2pt;\"><b><span style=\"font-size: 12pt; line-height: 17.12px;\">Pre-construction Treatment &amp; Post-construction</span></b><span style=\"font-size: 12pt; line-height: 17.12px;\">&nbsp;<b>Treatment.</b>&nbsp;Treatment should be as per IS 6313 (Part-2): 2001 for pre-constructional chemical treatment measures and IS 6313 (Part-3): 2001 for post-construction treatment of the existing building.<o:p></o:p></span></p><p class=\"MsoListParagraph\" style=\"font-size: 13.3333px; margin-left: 14.2pt; text-indent: -14.65pt;\"><b><span style=\"font-size: 12pt; line-height: 17.12px; color: rgb(237, 125, 49);\">A.<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;</span></span></b><b><span style=\"font-size: 12pt; line-height: 17.12px; color: rgb(237, 125, 49);\">PRE-CONSTRUCTION TREATMENT</span></b><span style=\"font-size: 12pt; line-height: 17.12px; color: rgb(237, 125, 49);\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13.3333px; margin-left: 14.2pt;\"><span style=\"font-size: 12pt; line-height: 17.12px;\">For thermal fogging the product can be applied through hand carried thermal&nbsp;foggers, pulse jet or friction plate.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13.3333px;\"><b><span style=\"font-size: 12pt; line-height: 17.12px;\">&nbsp; &nbsp; &nbsp;Treatment should be as per IS 6313 (Part-2) : 2001 for Pre-construction&nbsp; &nbsp; &nbsp; &nbsp; treatment.</span></b><span style=\"font-size: 12pt; line-height: 17.12px;\"><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">Treatment of masonry foundation:&nbsp; Bottom surface and sides of foundation&nbsp;pits upto a height of 30 cm Should be treated @ 5 ltr Chemical solution per&nbsp;sq.mtr of surface area.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">Refill Earth: Back fill earth in immediate contact with the foundation&nbsp;structure should be treated @ 7.5 ltr per sq. mtr of the vertical surface of&nbsp;the substructure for each side.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">Treatment of RCC Foundation: Treatment should start at a depth of 50 cm&nbsp;below ground level @ 7.5 ltr per sq.mtr.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">Treatment of Top surface of plinth filling: The top surface of the&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; consolidated earth within plinth walls shall be treated with Chemical&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; solution at the rate of 5 ltr/m2 of the surface before the sand bed or sub-grade is laid.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">Soil treatment along external perimeter of building: Earth along the external&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; walls of the building should be rodded at intervals of 15 cm and to a depth&nbsp;of 30 cm exposing the foundation wall surface chemical solution should be&nbsp;poured along the wall @ 7.5 ltr per sq.mtr of vertical surface.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">Treatment of soil under apron along external perimeter of building: Top&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; surface of the earth over which the apron is to be laid shall be treated with&nbsp;chemical solution @ 5 ltr per sq.mtr of the vertical surface.&nbsp; &nbsp;<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"font-size: 13.3333px; margin-left: 18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px;\">&nbsp;</span></p><p class=\"MsoListParagraphCxSpLast\" style=\"font-size: 13.3333px; margin-left: 21.3pt; text-indent: -21.3pt;\"><b><span style=\"font-size: 12pt; line-height: 17.12px; color: rgb(237, 125, 49);\">B.<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></b><b><span style=\"font-size: 12pt; line-height: 17.12px; color: rgb(237, 125, 49);\">POST-CONSTRUCTION TREATMENT</span></b><span style=\"font-size: 12pt; line-height: 17.12px; color: rgb(237, 125, 49);\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13.3333px; text-indent: 18pt;\"><b><span style=\"font-size: 12pt; line-height: 17.12px;\">Treatment should be as per IS 6313 (Part-3) : 2001 for&nbsp;Post-construction treatment.</span></b><span style=\"font-size: 12pt; line-height: 17.12px;\"><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">Soil treatment along external perimeter of building: Earth along the&nbsp;external walls of the building should be rodded at intervals of 15 cm and to&nbsp;a depth of 30 cm exposing the foundation wall surface. chemical solution&nbsp;should be poured along the wall @ 7.5 ltr per sq.mtr of vertical surface.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">Treatment of soil under apron along external perimeter of building: Top&nbsp;surface of the earth over which the apron is to be laid shall be treated with&nbsp;chemical solution @ 5 ltr per sq.mtr of the vertical surface.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">Treatment of soil under floor: To prevent entry of termites from cracks,&nbsp;soil under floor should be treated. Drill<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">12 mm holes at the junction of floor and wall at 30 cm interval to reach&nbsp;the soil below. Squirt the chemical solution @1ltr./ hole and seal.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">Treatment of voids in masonry: The movement of termites throughmasonry walls may be restricted by drilling holes in masonry wall at about&nbsp; 45° angle preferably from both sides of the plinth wall at 30 cm interval and squirt the chemical in holes till refusal and seal the holes.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">Treatment of upper floors: In case of infestation in upper floors, treat&nbsp;ground floor of the existing building as described above.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13.3333px;\"><span style=\"font-size: 12pt; line-height: 17.12px;\">&nbsp;</span></p>', 'active', '2025-05-26 17:51:23', '2026-02-09 12:30:27'),
(21, 21, 22, 'Bithrin 25', 'brithrin-25', '/product/1750076915Bithrin 25.png', '', 'Bifenthrin 2.5% EC', 'Contact', '[\"50ml\",\"100ml\",\"250ml\",\"500ml\",\"1litre\",\"5litre\"]', 'Wood Borers and Termites are known as \"Silent Destroyers\" because of their ability to chew through wood, flooring and even wallpaper undetected. They can damage decorative woodwork, musical instruments, wooden tools and on a more serious scale wood flooring, joinery and structural timbers. The best way to stop termites and wood borers from destroying homes and furniture is by applying chemical barrier of Bithrin 25 termiticide in the soil around the structure. It is 2.5% emulsifiable concentrate (EC) with Bifenthrin w/w as an active ingredient.', '<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:0cm;mso-add-space:auto;\r\ntext-align:justify\"></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">HOW TO USE BITHRIN 25 FOR WOOD BORER</span></b><span style=\"font-size:14.0pt;line-height:107%;color:#ED7D31;mso-themecolor:accent2\"><o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:12.0pt;line-height:107%\">FOR THE\r\nCONTROL OF WOOD BORERS IN PLYWOOD, VANEER AND WOOD</span></b><span style=\"font-size:12.0pt;line-height:107%\"><o:p></o:p></span></p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\">&nbsp;<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:12.0pt;line-height:107%\">Plywood:</span></b><span style=\"font-size:12.0pt;line-height:107%\"><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l1 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Apply\r\n400ml formulation/m3 of wood as glue line poisoning.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l1 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Mix\r\n1 litre of formulation in 99 litres of water/kerosene to make 0.025% solution\r\nand applied by dipping method.<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:12.0pt;line-height:107%\">Veneer:</span></b><span style=\"font-size:12.0pt;line-height:107%\"><o:p></o:p></span></p><p class=\"MsoListParagraph\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Mix\r\n1 litre of formulation 99 litres of water/kerosene to make 0.025% solution and\r\napplied by dipping method.<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:12.0pt;line-height:107%\">Wood:</span></b><span style=\"font-size:12.0pt;line-height:107%\"><o:p></o:p></span></p><p class=\"MsoListParagraph\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Mix\r\n1 litre of formulation 99 litre of water/kerosene to make 0.025% solution and\r\napplied<o:p></o:p></span></p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\">&nbsp;<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">HOW TO USE BITHRIN 25 FOR TERMITE\r\nTREATMENT<o:p></o:p></span></b></p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\">&nbsp;</span></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">DOSAGE:</span></b><span style=\"font-size:\r\n14.0pt;line-height:107%;color:#ED7D31;mso-themecolor:accent2\"><o:p></o:p></span></p><p class=\"MsoListParagraph\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">20\r\nml Bithrin 25 diluted in 1 Litre of water.<o:p></o:p></span></p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\">&nbsp;</span></p><p class=\"MsoNormal\"><b><span style=\"font-size:12.0pt;line-height:107%\">Pre-construction\r\nTreatment &amp; Post-construction</span></b><span style=\"font-size:12.0pt;\r\nline-height:107%\">&nbsp;<b>Treatment.</b>&nbsp;Treatment should be as per IS\r\n6313 (Part-2): 2001 for pre-constructional chemical treatment measures and IS\r\n6313 (Part-3): 2001 for post-construction treatment of the existing building<o:p></o:p></span></p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\">&nbsp;</span></p><p class=\"MsoNormal\"><b><span style=\"font-size:12.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">A) PRE-CONSTRUCTION TREATMENT</span></b><span style=\"font-size:12.0pt;line-height:107%;color:#ED7D31;mso-themecolor:accent2\"><o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:12.0pt;line-height:107%\">Treatment\r\nshould be as per IS 6313 (Part-2): 2001 for Pre-construction treatment.</span></b><span style=\"font-size:12.0pt;line-height:107%\"><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Treatment\r\nof masonry foundation:&nbsp; Bottom surface and sides of foundation pits upto a\r\nheight of 30 cm Should be treated @ 5 ltr Chemical solution per sq.mtr of\r\nsurface area.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Refill\r\nEarth: Back fill earth in immediate contact with the foundation structure\r\nshould be treated @ 7.5 ltr per sq. mtr of the vertical surface of the\r\nsubstructure for each side.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Treatment\r\nof RCC Foundation: Treatment should start at a depth of 50 cm below ground\r\nlevel @ 7.5 ltr per sq.mtr.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Treatment\r\nof Top surface of plinth filling: The top surface of the consolidated earth\r\nwithin plinth walls shall be treated with Chemical solution at the rate of 5\r\nltr/m2 of the surface before the sand bed or sub-grade is laid.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Soil\r\ntreatment along external perimeter of building: Earth along the external walls\r\nof the building should be rodded at intervals of 15 cm and to a depth of 30 cm\r\nexposing the foundation wall surface chemical solution should be poured along\r\nthe wall @ 7.5 ltr per sq.mtr of vertical surface.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Treatment\r\nof soil under apron along external perimeter of building: Top surface of the\r\nearth over which the apron is to be laid shall be treated with chemical\r\nsolution @ 5 ltr per sq.mtr of the vertical surface.<o:p></o:p></span></p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\">&nbsp;<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:12.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">B) POST-CONSTRUCTION TREATMENT</span></b><span style=\"font-size:12.0pt;line-height:107%;color:#ED7D31;mso-themecolor:accent2\"><o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:12.0pt;line-height:107%\">Treatment\r\nshould be as per IS 6313 (Part-3): 2001 for post-construction treatment.</span></b><span style=\"font-size:12.0pt;line-height:107%\"><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Soil\r\ntreatment along external perimeter of building: Earth along the external walls\r\nof the building should be rodded at intervals of 15 cm and to a depth of 30 cm\r\nexposing the foundation wall surface. chemical solution should be poured along\r\nthe wall @ 7.5 ltr per sq.mtr of vertical surface.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Treatment\r\nof soil under apron along external perimeter of building: Top surface of the\r\nearth over which the apron is to be laid shall be treated with chemical\r\nsolution @ 5 ltr per sq.mtr of the vertical surface.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Treatment\r\nof soil under floor: To prevent entry of termites from cracks, soil under floor\r\nshould be treated. Drill 12 mm holes at the junction of floor and wall at 30 cm\r\ninterval to reach the soil below. Squirt the chemical solution @1ltr. / Hole\r\nand seal.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Treatment\r\nof voids in masonry: The movement of termites through masonry walls may be\r\nrestricted by drilling holes in masonry wall at abot 45° angle preferably from\r\nboth sides of the plinth wall at 30 cm interval and squirt the chemical in\r\nholes till refusal and seal the holes.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Treatment\r\nof upper floors: In case of infestation in upper floors, treat ground floor of\r\nthe existing building as described above.<o:p></o:p></span></p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\">&nbsp;<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">SYMPTOMS OF POISONING:</span></b><span style=\"font-size:14.0pt;line-height:107%;color:#ED7D31;mso-themecolor:accent2\"><o:p></o:p></span></p><p class=\"MsoListParagraph\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Symptoms\r\nof overexposure include bleeding from the nose, tremors and convulsions.\r\ncontact with this product may occasionally produce skin sensations such as\r\nreshes, numbing burning or tingling, these skin sensations are reversible and\r\nusually subside within 12 hours.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:0cm;mso-add-space:auto;\r\ntext-align:justify\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\">&nbsp;</span></p><p></p>', 0, '<div style=\"\"><br></div>', 'active', '2025-05-26 18:29:53', '2026-02-13 13:16:21');
INSERT INTO `product_list` (`id`, `category_id`, `subcategory_id`, `title`, `slug`, `image`, `brochure`, `composition`, `model_of_action`, `packing`, `description`, `features`, `useage_type`, `useage`, `is_active`, `created_at`, `updated_at`) VALUES
(22, 21, 22, 'Pexter', 'pexter', '/product/1750076883Pexter.png', '', 'Fipronil 2.92% EC', 'Systemic', '[\"50ml\",\"100ml\",\"250ml\",\"500ml\",\"1litre\",\"5litre\"]', 'Pexter contains Fipronil which is approved for control of Termite in pre and post construction at the rate of 0.25% concentration i.e. 100 ml formulated product diluted in 1 litre of water. Treatment should be as per IS 6313 (Part-2): 2001 for pre-constructional chemical treatment measures and IS 6313 (Part-3): 2001 for post-construction treatment of the existing building.', '<div style=\"\"><div style=\"\"><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">FIRST AID</span></b><span style=\"font-size:14.0pt;line-height:107%;color:#ED7D31;mso-themecolor:accent2\"><o:p></o:p></span></p><p class=\"MsoListParagraph\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">If\r\nthe chemical is inhaled, get the victim into fresh air immediately. If\r\nbreathing is stopped, apply artificial respiration. If swallowed, induce\r\nvomiting by tickling at the back of the throat with the finger. If the chemical\r\nhas splashed into the eyes, flush the eyes with plenty of cold water. In case\r\nof skin contact, wash the skin with plenty of soap and water. Get medical\r\nattention immediately.<o:p></o:p></span></p><p class=\"MsoNormal\"><br></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">SYMPTOMS OF POISONING:</span></b></p><p class=\"MsoListParagraph\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Mainly\r\nconsists of irritability, lethargy, muscle tremors and in extreme cases\r\nconvulsions may occur. Fipronil is a reversible GABA receptor inhibitor and\r\nthese symptoms are reversible after termination of exposure.<o:p></o:p></span></p><p class=\"MsoNormal\">\r\n\r\n</p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\">&nbsp;</span></p><p class=\"MsoNormal\" style=\"font-family: Arial, Verdana; font-size: 10pt; font-weight: normal; margin-left: 36pt; text-align: justify;\"><b><span style=\"font-size:16.0pt;line-height:115%;color:#ED7D31;mso-themecolor:accent2\"></span></b></p></div></div>', 1, '<div style=\"\"><p class=\"MsoNormal\" style=\"font-size: 13.3333px;\"><b><span style=\"font-size: 14pt; line-height: 19.9733px; color: rgb(237, 125, 49);\">DIRECTION OF USE OF PEXTER</span></b><span style=\"font-size: 14pt; line-height: 19.9733px; color: rgb(237, 125, 49);\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13.3333px;\"><b><span style=\"font-size: 12pt; line-height: 17.12px;\">Pre-construction Treatment &amp; Post-construction</span></b><span style=\"font-size: 12pt; line-height: 17.12px;\">&nbsp;<b>Treatment.</b>&nbsp;Treatment should be as per IS 6313 (Part-2): 2001 for pre-constructional chemical treatment measures and IS 6313 (Part-3): 2001 for post-construction treatment of the existing building.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13.3333px;\"><span style=\"font-size: 12pt; line-height: 17.12px;\">&nbsp;</span></p><p class=\"MsoNormal\" style=\"font-size: 13.3333px;\"><span style=\"font-size: 12pt; line-height: 17.12px; color: rgb(237, 125, 49);\">&nbsp;<b>A) PRE-CONSTRUCTION TREATMENT</b><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13.3333px;\"><b><span style=\"font-size: 12pt; line-height: 17.12px;\">Treatment should be as per IS 6313 (Part-2): 2001 for Pre-construction treatment.</span></b><span style=\"font-size: 12pt; line-height: 17.12px;\"><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">Treatment of masonry foundation:&nbsp; Bottom surface and sides of foundation pits upto a height of 30 cm Should be treated @ 5 ltr Chemical solution per sq.mtr of surface area.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">Refill Earth: Back fill earth in immediate contact with the foundation structure should be treated @ 7.5 ltr per sq. mtr of the vertical surface of the substructure for each side.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">Treatment of RCC Foundation: Treatment should start at a depth of 50 cm below ground level @ 7.5 ltr per sq.mtr.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">Treatment of Top surface of plinth filling: The top surface of the consolidated earth within plinth walls shall be treated with Chemical solution at the rate of 5 ltr/m2 of the surface before the sand bed or sub-grade is laid.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">Soil treatment along external perimeter of building: Earth along the external walls of the building should be rodded at intervals of 15 cm and to a depth of 30 cm exposing the foundation wall surface chemical solution should be poured along the wall @ 7.5 ltr per sq.mtr of vertical surface.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">Treatment of soil under apron along external perimeter of building: Top surface of the earth over which the apron is to be laid shall be treated with chemical solution @ 5 ltr per sq.mtr of the vertical surface.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13.3333px;\"><span style=\"font-size: 12pt; line-height: 17.12px;\">&nbsp;<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13.3333px;\"><b><span style=\"font-size: 12pt; line-height: 17.12px; color: rgb(237, 125, 49);\">B) POST-CONSTRUCTION TREATMENT</span></b><span style=\"font-size: 12pt; line-height: 17.12px; color: rgb(237, 125, 49);\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13.3333px;\"><b><span style=\"font-size: 12pt; line-height: 17.12px;\">Treatment should be as per IS 6313 (Part-3): 2001 for post-construction treatment.</span></b><span style=\"font-size: 12pt; line-height: 17.12px;\"><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">Soil treatment along external perimeter of building: Earth along the external walls of the building should be rodded at intervals of 15 cm and to a depth of 30 cm exposing the foundation wall surface chemical solution should be poured along the wall @ 7.5 ltr per sq.mtr of vertical surface.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">Treatment of soil under apron along external perimeter of building: Top surface of the earth over which the apron is to be laid shall be treated with chemical solution @ 5 ltr per sq.mtr of the vertical surface.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">Treatment of soil under floor: To prevent entry of termites from cracks, soil under floor should be treated. Drill 12 mm holes at the junction of floor and wall at 30 cm interval to reach the soil below. Squirt the chemical solution @1ltr. / Hole and seal.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">Treatment of voids in masonry: The movement of termites through masonry walls may be restricted by drilling holes in masonry wall at abot 45° angle preferably from both sides of the plinth wall at 30 cm interval and squirt the chemical in holes till refusal and seal the holes.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"font-size: 13.3333px; margin-left: 18pt; text-indent: -18pt;\"><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Symbol; color: rgb(237, 125, 49);\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 17.12px;\">Treatment of upper floors: In case of infestation in upper floors, treat ground floor of the existing building as described above.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13.3333px;\"><span style=\"font-size: 12pt; line-height: 17.12px;\">&nbsp;</span></p></div>', 'active', '2025-05-26 18:41:38', '2026-02-09 12:30:45'),
(23, 21, 21, 'MATHIER', 'mathier', '/product/1750076842MATHIER.png', '', 'DELTAMETHRIN 2% w/w EW', 'Systemic', '[\"50ml\",\"100ml\",\"250ml\",\"500ml\",\"1litre\",\"5litre\",\"25litre\"]', 'It is a space spray concentrate containing Deltamethrin. It is water-based formulation used for the control for adult mosquitoes for public health. It is recommended for outdoor & indoor application for control of adult mosquitoes causing malaria, dengue etc public health.', '<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l2 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Effective\r\nfor indoor &amp; outdoor applications.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l2 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Eliminate\r\nuse of diesel, thus reduces pollution and spray cost significantly.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l2 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">It\r\ncan be used for cold fogging also.<o:p></o:p></span></p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\">&nbsp;<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">DIRECTION OF USE:&nbsp;</span></b><span style=\"font-size:14.0pt;line-height:107%;color:#ED7D31;mso-themecolor:accent2\"><o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:12.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">1.</span></b><span style=\"font-size:12.0pt;\r\nline-height:107%;color:#ED7D31;mso-themecolor:accent2\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Thermal\r\nfogging: &nbsp;</b><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l2 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">For\r\nthermal fogging the product can be applied through hand carried thermal\r\nfoggers, pulse jet or friction plate.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l2 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">In\r\ncase of indoor treatments. remove all pets, aquarium and foodstuffs from the\r\nroom and cover all surfaces used for food preparation.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l2 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Turn\r\noff the electricity and extinguish all naked flames.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l2 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Dilute\r\n25 ml of Deltamethrin 2% w/w EW in 5-10 lit of water and apply this solution to\r\ncover one hectare area.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l2 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Treatment\r\nis to be done when mosquitoes are active.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l2 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Depending\r\non the mosquito infestation fogging treatment can be Done Once a Week during\r\npeak season or once in 3 months during low pest activity.<o:p></o:p></span></p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\">&nbsp;<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:12.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">2.</span></b><span style=\"font-size:12.0pt;\r\nline-height:107%;color:#ED7D31;mso-themecolor:accent2\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Ultra\r\nLow Volume application:</b><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Exterior\r\nSpace treatment in the form of ULV can be carried out with knapsack cold fogger\r\nor any ULV machine capable of producing droplets with volume median diameter\r\n(VMD) in the range of 15-25 microns.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Dilute\r\n50ml or Deltamethrin 2% w/w EW in 1 lit of water and apply this solution to\r\ncover one hectare area.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Fogging\r\nshould not be conducted when it is raining or when the wind speed exceeds 15\r\nkm/h.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Depending\r\non the mosquito infestation fogging treatment can be done once a week during\r\npeak season or once in 3 months during low pest activity<o:p></o:p></span></p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\">&nbsp;<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">SYMPTOMS OF POISONING:</span></b><span style=\"font-size:14.0pt;line-height:107%;color:#ED7D31;mso-themecolor:accent2\"><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:54.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo3\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoListParagraph\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l1 level1 lfo3\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Nasal\r\ndischarge, Itching, Vomiting, eyes redness, anxiety and convulsions.<o:p></o:p></span></p><p class=\"MsoListParagraph\" style=\"font-size: 10pt; text-indent: -18pt;\"><o:p></o:p></p>', 0, '<p class=\"MsoNormal\"></p><p class=\"MsoNormal\"><br></p><p></p>', 'active', '2025-05-26 18:55:00', '2026-02-09 12:30:54'),
(24, 21, 21, 'AESTHER+', 'aesther+', '/product/1750076795Aesther+.png', '', 'LAMBDA CYHALOTHRIN 9.7% CS', 'Non – systemic insecticides, with contact, residual and stomach action.', '[\"50ml\",\"100ml\",\"250ml\",\"500ml\",\"1litre\",\"5litre\",\"25litre\"]', 'Aesther+   is broad spectrum public health insecticide contains 97-gram active ingredient, Lambda cyhalothrin per kg of the product, which is equivalent to 100-gram Lambda cyhalothrin per liter of water based capsule suspension (CS) formulated specifically for use as indoor residual spray for insect / vector control for controlling malaria transmission and is effective on the full range of surfaces.', '<div style=\"\"><div style=\"\"><p class=\"MsoListParagraphCxSpFirst\" style=\"font-weight: normal; font-family: Arial, Verdana; font-size: 10pt; margin-left: 54pt; text-indent: -18pt;\"></p><p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l2 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Knock\r\ndown effect on target pest and long-lasting residual effect.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l2 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">New\r\ngeneration insecticide which based on capsule suspension technology due to\r\nwhich slow release of active ingredient, provide better Bio- Efficiency at\r\nlower doses.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l2 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Non\r\nstaining, odorless and non-greasy.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l2 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">As\r\nPer Direction Of CIBRC-MOA, It Can Also Used For Control Of Common Household\r\nPest @ 4-5 Ml/litre To Cover 50m2 Area<o:p></o:p></span></p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\">&nbsp;<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">DIRECTION OF USE:&nbsp;</span></b><span style=\"font-size:14.0pt;line-height:107%;color:#ED7D31;mso-themecolor:accent2\"><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Add\r\nrequire quantity of Aesther+ in small part of water, mix vigorously and then\r\nadd remaining qty of water for better uniform mixture.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Ensure\r\ncomplete dispersion of Aesther+ in the water before spraying.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Maintain\r\nconstant agitation of the spray solution during application.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Spray\r\nall infested areas where insect hide, including Walls, Ceilings, Floors, Cracks\r\nand Crevices.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Spray\r\nsurfaces thoroughly to the point of minimal runoff.<o:p></o:p></span></p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\">&nbsp;<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">SYMPTOMS OF POISONING:</span></b><span style=\"font-size:14.0pt;line-height:107%;color:#ED7D31;mso-themecolor:accent2\"><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:54.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l2 level1 lfo1\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoListParagraph\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l0 level1 lfo3\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Ingestion\r\nof lambda cyhalothrin may produce non-specific symptoms such as nausea,\r\nvomiting, tremors, lachrymation, salivation and irritation to mucous membrance.&nbsp;</span></p><p class=\"MsoListParagraph\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l0 level1 lfo3\"><span style=\"color: rgb(237, 125, 49); font-family: Symbol; font-size: 16px;\">¨&nbsp; &nbsp;</span><span style=\"font-size: 12pt; text-indent: -18pt;\">If larger doses are ingested, it may cause disturbance of the nervous system\r\nwith tremors, ataxia, weakness of limbs, convulsion, coma and death from\r\nrespiratory depression.&nbsp;</span></p><p class=\"MsoListParagraph\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l0 level1 lfo3\"><span style=\"color: rgb(237, 125, 49); font-family: Symbol; font-size: 16px;\">¨&nbsp; &nbsp;</span><span style=\"font-size: 12pt; text-indent: -18pt;\">skin contact may cause paraesthesia effects, a\r\nsubjective sensation of tingling or numbness in the facial area. This effect\r\nnormally results from unconscious transfer to the face from contaminated hands\r\nor gloves. This effect is transient lasting upto 24 hours and these is not\r\nevidence of any long term or cumulative effects. Eye contact irrigation.</span></p></div></div><div style=\"\"><div style=\"\"><p></p></div></div>', 0, '<p data-start=\"105\" data-end=\"254\"><br></p>', 'active', '2025-05-26 19:27:47', '2026-02-09 12:31:12');
INSERT INTO `product_list` (`id`, `category_id`, `subcategory_id`, `title`, `slug`, `image`, `brochure`, `composition`, `model_of_action`, `packing`, `description`, `features`, `useage_type`, `useage`, `is_active`, `created_at`, `updated_at`) VALUES
(25, 21, 21, 'Lamier 100', 'lamier-100', '/product/1750076742Lamier 100.png', '', 'Lambda-cyhalothrin 10 % WP', 'Broad-spectrum', '[\"62.5gm\",\"1kg\",\"25kg\"]', 'Lamier 100 is a broad-spectrum insecticide for use as a residual spray against adult vector mosquito of Public Health importance and for control of mosquito, houseflies and cockroach. Lamier 100 is a novel synthetic pyrethroid developed as a result of extensive research.', '<div style=\"\"><div style=\"\"><div style=\"\"><div style=\"\"><p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Lamier\r\n100<b>&nbsp;</b>gives effective control of Malaria, Dengue etc.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Lamier\r\n100<b>&nbsp;</b>kills the insects with contact action which offers broad\r\nspectrum activity<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Lamier\r\n100<b>&nbsp;</b>against range of mosquito species.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Lamier\r\n100<b>&nbsp;</b>has very long residual effect.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Lamier\r\n100<b>&nbsp;</b>is safe to non-target animals and human beings.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Lamier\r\n100<b>&nbsp;</b>is odourless, no greasy and non-staining.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:-18.0pt\">&nbsp;<o:p></o:p></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">DIRECTION OF USE:&nbsp;</span></b><span style=\"font-size:14.0pt;line-height:107%;color:#ED7D31;mso-themecolor:accent2\"><o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Dilute\r\nLamier 100 in water for residual spraying.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Use\r\ncompression sprayer or stirrup pump at 40 psi.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Mix:\r\n5L water + Lamier 100, stir well, then add 5L more water.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Ensure\r\neven coverage, focusing on insect-prone areas.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Handle\r\nwith care; it is a moderate to high irritant.<o:p></o:p></span></p><p class=\"MsoNormal\">&nbsp;<o:p></o:p></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">SYMPTOMS OF POISONING:</span></b><span style=\"font-size:14.0pt;line-height:107%;color:#ED7D31;mso-themecolor:accent2\"><o:p></o:p></span></p><p class=\"MsoListParagraph\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l2 level1 lfo3\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Nervousness,\r\nanxiety, tremor, convulsions, skin irritation, allergies, sneezing, running\r\nnose and irritation may occur.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\">&nbsp;</span></p><p class=\"MsoListParagraph\" style=\"margin-left:54.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l0 level1 lfo1\"><o:p></o:p></p></div><div style=\"\"></div><div style=\"\"></div></div></div></div>', 0, '<div style=\"\"><br></div>', 'active', '2025-05-27 12:42:46', '2026-02-09 12:31:22'),
(26, 21, 23, 'KALRAT CB', 'kalrat-cb', '/product/1750076708KALRAT CB.png', '', 'BROMADIALONE 0.25% CB', 'Acute stomach action of Rodenticide', '[\"100gm\",\"250gm\",\"500gm\",\"1kg\",\"5kg\"]', 'Kalrat CB is a high performance, residual insecticide that provides control of rat. It contains 2.25 gm of active ingredient of Bromadiolone per kg.', '<div style=\"\"><div style=\"\"><p class=\"MsoNormal\"></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">OUTSTANDING FEATURES OF KALRAT CB:<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"margin-left:18.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Kalrat\r\nCB kills the insects by ingestion.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:18.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Kalrat\r\nCB is odourless, powder form and minor irritant.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:18.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Highly\r\neffective on all species of Rodent.&nbsp; <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:18.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">New\r\nsingle dose anticoagulant Rodenticide<o:p></o:p></span></p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\">&nbsp;</span></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">DIRECTION OF USE:&nbsp; <o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"margin-left:18.0pt;text-indent:-18.0pt;mso-list:l1 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Survey\r\nthe area for the burrow of rat and also check place of frequent visit of rat.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:18.0pt;text-indent:-18.0pt;mso-list:l1 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Mix\r\nKalrat CB with Bait material like small piece of grain which includes rice,\r\nwheat, maize etc.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:18.0pt;text-indent:-18.0pt;mso-list:l1 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Take\r\nsmall amount of sunflower oil so powder can properly mix with grain.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:18.0pt;text-indent:-18.0pt;mso-list:l1 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Keep\r\nthis bait near burrow of rat and also at places which are frequently visited by\r\nrat.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:18.0pt;text-indent:-18.0pt;mso-list:l1 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Change\r\nthe bait material every time as rat detects the bait material easily if its\r\nsame and it will not eat that bait material.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:18.0pt;text-indent:-18.0pt;mso-list:l1 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Keep\r\nthis bait material out of reach of children.<o:p></o:p></span></p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\">&nbsp;</span></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">ANTIDOTE: <o:p></o:p></span></b></p><p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l2 level1 lfo3\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Administer\r\nvitamin Kl intramuscularly or orally. Repeat it as necessary.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:54.0pt;mso-add-space:auto\"><span style=\"font-size:12.0pt;line-height:107%\">&nbsp;</span></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">SYMPTOMS OF POISONING:<o:p></o:p></span></b></p><p class=\"MsoNormal\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoListParagraph\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l2 level1 lfo3\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Nasal\r\ndischarge, Itching, Vomiting, eyes redness, anxiety and convulsions.<o:p></o:p></span></p><p></p></div></div>', 0, '<div style=\"\"><br></div>', 'active', '2025-05-27 13:32:45', '2026-02-09 12:31:34'),
(27, 21, 23, 'Kalrat RB', 'kalrat-rb', '/product/1750076680KALRAT RB.png', '', 'Bromadialone 0.005% RB', 'Acute stomach action of Rodenticide', '[\"25gm\",\"50gm\",\"100gm\",\"\"]', 'Kalrat RB is a new single dose anticoagulant rodenticide. It controls field and commensal rats when consumed by causing haemorrhage in the blood system, Place the cake in the burrows and at places frequented by the rodents and one application provides good control. Pre baiting is not necessary.', '<div style=\"\"><div style=\"\"><p class=\"MsoNormal\"></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">OUTSTANDING FEATURES OF KALRAT RB:<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"margin-left:18.0pt;text-indent:-18.0pt;mso-list:l3 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Kalrat\r\nRB is extremely effective to rodents.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:18.0pt;text-indent:-18.0pt;mso-list:l3 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Kalrat\r\nRB is generally given orally.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:18.0pt;text-indent:-18.0pt;mso-list:l3 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Kalrat\r\nRB safe to non-target animal and human beings.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:18.0pt;text-indent:-18.0pt;mso-list:l3 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Kalrat\r\nRB poison does not show up for 24 to 35 hours after poison is eaten and often\r\nit makes 2-5 days for the signs to show up.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-left:18.0pt;text-indent:-18.0pt;mso-list:l3 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Kalrat\r\nRB can be absorbed through digestive tract, through lungs or through skin\r\ncontact. The lack of vitamin K in the circulatory system reduces blood clothing\r\nand will cause death due to internal haemorrhaging.<o:p></o:p></span></p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\">&nbsp;</span></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">DIRECTION OF USE:&nbsp; <o:p></o:p></span></b></p><p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Place\r\nthe cake in the burrows and at places frequently visited by the rodents.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Rats\r\ndie within 3 to 4 days after consuming the cake. In majority of cases, rats die\r\nin open space.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Inspect\r\nthe area at regular interval for availability of cake and for the dead rats.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Replace\r\ncake at places where it has been consumed completely and rat activity is still\r\nobserved.<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Pre\r\nbaiting is not necessary<o:p></o:p></span></p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\">&nbsp;</span></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">ANTIDOTE: <o:p></o:p></span></b></p><p class=\"MsoListParagraph\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l0 level1 lfo3\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Vitamin\r\nK1 at a dosage of 5-10 mg for infants and 15-25 mg for adults should be\r\nadministered orally. Repeat if necessary. If serious, give blood transfusion<o:p></o:p></span></p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\">&nbsp;</span></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">SYMPTOMS OF POISONING:<o:p></o:p></span></b></p><p class=\"MsoNormal\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoListParagraph\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l2 level1 lfo4\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\">¨<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Back\r\npain, abdominal pain, vomiting, bleeding from nose may occur.&nbsp;<o:p></o:p></span></p><p></p></div></div>', 0, '<div style=\"\"><br></div>', 'active', '2025-05-27 13:55:18', '2026-02-09 12:31:45'),
(28, 21, 23, 'Zinphos', 'zinphose', '/product/1750076647ZINPHOS.png', '', 'Zinc Phosphide 80% Wv', 'Acute stomach action of Rodenticide', '[\"10gm\",\"100gm\",\"250gm\",\"500gm\",\"1kg\"]', 'Zinc Phosphide is a greyish black coloured heavy. Amongst all available rat poison tried in India. Zinc Phosphide has given all round satisfactory results and still continues to be the most popular rodenticide.', '<div style=\"\"><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">CONDITION OF USE ZINPHOS /ORGANISM\r\nDOSAGE: <o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">For\r\nfield rodent control Rattus/rattas 1.5%-2.5% Bondicota bengalensis. <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">In\r\nresidential premises to Rattus mattuda be used under the Tatera indica active\r\ningredient supervision of treined Meriones hurrianae in bait personnel Mus\r\nPlatylhrix Mus muscerlus Rattus norycus Mus boduga Sumcus caeruleus.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\"><o:p>&nbsp;</o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">DIRECTION OF USE:<span style=\"mso-spacerun:yes\">&nbsp; </span><o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-indent:18.0pt\"><b><span style=\"font-size:12.0pt;\r\nline-height:107%\">PRE BAITING:</span></b><span style=\"font-size:12.0pt;\r\nline-height:107%\"> <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Rats\r\nare very sensitive to any market change or the presence of any new articles in\r\ntheir environment. Hence the placing of poison baits all the sudden, for rat\r\ncontrol is not likely to yield any satisfactory results.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">For\r\nthe first four or five days, place plain baits consisting of any materials\r\navailable locally in the vicinity or rat burrows or areas frequently visited by\r\nrats.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">The\r\nBaits material should be whole wheat, rice, rice sweat, pieces, dry fish, food\r\narticles or any such materials which could be resisted rats.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Rats\r\nare very Baits-shy and would not touch the plain baits and take the baits we\r\ncan found out the place of baits points from where the baits are consumed by\r\nrats. This in short is the process called Pre-baiting.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\"><o:p>&nbsp;</o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-indent:18.0pt\"><b><span style=\"font-size:12.0pt;\r\nline-height:107%\">BAITING:</span></b><span style=\"font-size:12.0pt;line-height:\r\n107%\"> <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">When\r\nmore than 75% of the plain Baits of the known bait’s points are consumed, add\r\nZinphos (1 part of Zinphos to 10 parts of Bait by weight) and replace the plain\r\nbaits at the bait points with poison Baits.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">The\r\nplacing of poison baits should be continued for two to three days by which\r\ntime, 75 to 85% of the rat population would have been exterminated.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Do\r\nnot use either plain baits or poison baits for another fortnight or so when\r\nagain pre-baiting should commence but with different base for bait followed by\r\npoison bait later.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">This\r\nfollows up treatment should account for the population left alive after the\r\nfirst course.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">While\r\npreparing the baits either plain or poison actual manual handling should be\r\navoided as far as possible.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\"><o:p>&nbsp;</o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\"><o:p>&nbsp;</o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">SYMPTOMS OF POISONING:<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoListParagraph\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l2 level1 lfo3\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Nausea,\r\nAbdominal pain, tightness in the chest, weakness, excessive thirust,\r\nconvulsions may occur.<o:p></o:p></span></p><br></div>', 0, '<div style=\"\"><br></div>', 'active', '2025-05-27 14:06:40', '2026-02-09 12:31:56');
INSERT INTO `product_list` (`id`, `category_id`, `subcategory_id`, `title`, `slug`, `image`, `brochure`, `composition`, `model_of_action`, `packing`, `description`, `features`, `useage_type`, `useage`, `is_active`, `created_at`, `updated_at`) VALUES
(29, 21, 24, 'DELPHIER', 'delphier', '/product/1750076607DELPHIER.png', '', 'Deltamethrin 2.5% WP', 'Stored Grain Pest control', '[\"100gm\",\"250gm\",\"500gm\",\"1kg\",\"5kg\"]', 'Weevils and other stored grain pest attack many crops destroying the quality of food grains and crops. Delphier is a synthetic pyrethroid insecticide with long lasting residual effectiveness against mosquitoes, weevils, moths, beetles and other insect pests of stored grains/seeds. It contains Deltamethrin 2.5% w/w as an active ingredient in wettable form.', '<div style=\"\"><div style=\"\"><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">OUTSTANDING FEATURES OF DELPHIER:<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Delphier\r\nkills the insects with contact action which offers broad spectrum activity\r\nagainst range of mosquito species and so it gives effective control of malaria.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Delphier\r\nresidual action at very low dose is proven cost effective compared to DDT. It\r\nis found effective in both, indoors and outdoors. <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Delphier\r\nis recommended and certified by National Anti-Malaria Programme (NAMP) as\r\nMosquito Adulticide. <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Delphier\r\noffers high degrees of safety compared to other conventional insecticides at\r\nthe recommended dosages.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Delphier\r\nvery effective against stored grain pest.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\"><o:p>&nbsp;</o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">DIRECTION OF USE:<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Before\r\nevery spray stir the suspension well to get best results. This will also avoid\r\nblockage of nozzle.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Use\r\nknapsack sprayer or compression knapsack sprayer <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">For\r\nmaximum result, cover all the infested areas like walls, ceilings &amp; floors\r\nincluding cracks and crevices.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\"><o:p>&nbsp;</o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">SYMPTOMS OF POISONING:<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoListParagraph\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Nervousness,\r\nanxiety, salivation, tremors, convulsions, vomiting, skin irritation,\r\nallergies, may occur.<o:p></o:p></span></p><br></div></div>', 0, '<div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Before every spray, stir the suspension well to get the best results. This will also avoid blockage of the nozzle.</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\"><br></span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Use a knapsack sprayer or compression knapsack sprayer.</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\"><br></span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">For maximum results, cover all infested areas like walls, ceilings, and floors, including cracks and crevices.</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\"><br></span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Symptoms Of Poisoning:</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Nervousness, anxiety, salivation, tremors, convulsions, vomiting, skin irritation, and allergies may occur.</span></font></div>', 'active', '2025-05-27 15:32:17', '2026-02-09 12:32:14'),
(30, 21, 24, 'RIDDLE', 'riddle', '/product/1750076567Riddle.png', '', 'Malathion 50% EC', 'Broad wide spectrum', '[\"100ml\",\"250ml\",\"500ml\",\"1litre\",\"5litre\"]', 'Riddle is a wide spectrum emulsifiable concentrate formulation based on malathion technical. It contains 50% active ingredient by weight.', '<div style=\"\"><div style=\"\"><p class=\"MsoNormal\"></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">OUTSTANDING FEATURES OF RIDDLE:<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Riddle\r\nis cost effective due to low dosage and less rounds. <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Riddle\r\nis practically soluble in water. <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">The\r\ntoxicity of Riddle works on nervous system.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Riddle\r\nis used in vegetables and fruits like brinjal, cabbage, apple, mangoes, grapes\r\netc.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\"><o:p>&nbsp;</o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">DIRECTION OF USE:<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Before\r\nevery spray stir the suspension well to get best result. This will also avoid\r\nblockage of nozzle.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Use\r\nknapsack sprayer or compression knapsack sprayer<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">For\r\nmaximum result, cover all the infested areas <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Application\r\nshould be made at low pressure and with a nozzle that produces even sized\r\ndroplets. <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Treated\r\nsurface should be thoroughly sprayed to the point of minimal run off.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">The\r\napplicator should ensure uniform coverage and pay particular attention to those\r\nareas where insects are most likely to come in contact with insecticides.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\"><o:p>&nbsp;</o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">ANTIDOTE:<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Atropinize\r\nthe patient immediately and maintain full atropinization by repeated doses of 2\r\nto 4 mg of atropine sulphate intravenously at 5 to 10 minutes interval. <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:18.0pt;mso-add-space:\r\nauto;text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">As\r\nmuch as 25 to 50 mg of atropine may be required in a day. The need for further\r\natropine administration is guided by the continuance of symptoms. Extent of\r\nsalivation is a useful criterion for dose adjustment. <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Dissolve\r\n1-2 gm of 2 PAM in 10 ml distilled water and inject intravenously very slowly\r\nfor 10-15 minutes.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:107%\"><o:p>&nbsp;</o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:107%;\r\ncolor:#ED7D31;mso-themecolor:accent2\">SYMPTOMS OF POISONING:<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoListParagraph\" style=\"margin-left:18.0pt;mso-add-space:auto;\r\ntext-indent:-18.0pt;mso-list:l1 level1 lfo2\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:107%;font-family:Symbol;mso-fareast-font-family:\r\nSymbol;mso-bidi-font-family:Symbol;color:#ED7D31;mso-themecolor:accent2\"><span style=\"mso-list:Ignore\">¨<span style=\"font:7.0pt &quot;Times New Roman&quot;\">&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:107%\">Headache,\r\ngiddiness, vertigo, nausea, vomiting, blurred vision, diarrhoea, convulsions,\r\nsweating, excessive lacrimation, and salivation may occur. <o:p></o:p></span></p><br><p></p></div></div>', 0, '<div style=\"\"><br></div>', 'active', '2025-05-27 15:41:57', '2026-02-09 12:32:21'),
(32, 22, 26, 'ARMOSS', 'armoss', '/product/1750846909ARMOSS.png', '/product_brochre/1750846909Scan tata.pdf', 'Deltamethrin 2.5% EC', 'Systematic Insecticices', '[\"1 lit\"]', 'public health', 'good<span style=\"white-space:pre\">	</span>', 1, '10 ml per litre', 'active', '2025-06-25 17:21:49', '2026-02-09 12:32:29');

-- --------------------------------------------------------

--
-- Table structure for table `product_specification`
--

CREATE TABLE `product_specification` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `compositiion` varchar(255) NOT NULL,
  `package` varchar(255) NOT NULL,
  `mode_of_action` varchar(255) NOT NULL,
  `is_active` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_uses`
--

CREATE TABLE `product_uses` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci DEFAULT NULL,
  `attribute_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_uses`
--

INSERT INTO `product_uses` (`id`, `product_id`, `attribute_id`, `attribute_value`, `created_at`, `updated_at`) VALUES
(23, 21, NULL, '{\"Crop(s)\":[\"Chickpea\",\"Chilli\",\"Cotton\",\"Paddy\",\"Soybean\"],\"Common Name of Pest\":[\"Fruit borer & Thrips\",\"Bollworms\",\"Leaf folder & hispa\",\"Green semilooper, Pod borer, Girdle beetle and Tobacco caterpillar\",\"Fruit borer\"],\"AI (g)\":[\"7.13\",\"7.13\",\"7.13\",\"7.13\",\"7.13\"],\"Formulation (ml)\":[\"375\",\"375\",\"375\",\"375\",\"375\"],\"Dilution in Water (L)\":[\"500\",\"500\",\"500\",\"500\",\"500\"],\"Waiting Period between last spray to harvest (days)\":[\"14\",\"14\",\"14\",\"14\",\"14\"],\"Re-entry after each Application (In Hours)\":[\"-\",\"-\",\"-\",\"-\",\"-\"]}', '2025-03-28 02:32:44', '2026-02-14 04:56:21'),
(24, 16, NULL, '{\"Crop(s)\":[\"Chickpea\",\"Chilli\",\"Cotton\",\"Paddy\",\"Soybean\",\"Tomato\"],\"Common Name of Pest\":[\"Pod borer\",\"Fruit borer & Thrips\",\"Bollworms\",\"Leaf folder & hispa\",\"Green semilooper, Pod borer, Girdle beetle and Tobacco caterpillar\",\"Fruit borer\"],\"AI (g)\":[\"7.13\",\"7.13\",\"7.13\",\"7.13\",\"7.13\",\"7.13\"],\"Formulation (ml)\":[\"375\",\"375\",\"375\",\"375\",\"375\",\"375\"],\"Dilution in Water (L)\":[\"500\",\"500\",\"500\",\"500\",\"500\",\"500\"],\"Waiting Period between last spray to harvest (days)\":[\"14\",\"14\",\"14\",\"14\",\"14\",\"14\"],\"Re-entry after each Application (In Hours)\":[\"-\"]}', '2025-04-14 17:05:41', '2025-04-14 17:05:41'),
(25, 26, NULL, '{\"AI (g)\":[\"0.005 A.I\"],\"Formulation (ml)\":[\"0.005 A.I\\t1 part of Kalrat CB with 49 part of Bait Material\"]}', '2025-05-29 13:32:24', '2025-05-29 13:32:24'),
(26, 27, NULL, '{\"Target Pests\":[\"House rat, larger bandicoot rat, Indian house rat, Indian Field mouse.\"],\"Dosage\":[\"0.005 A.I\\/ ha\"],\"Crop(s)\":[\"Paddy, Wheat, Gram, Groundnut, Sugarcane, Coconut residential.\"]}', '2025-05-29 13:40:24', '2025-06-06 18:23:58'),
(27, 29, NULL, '{\"Stored Grain Target Pests\":[\"Khapra Beetle, Red Flour Beetle, Saw toothed grain beetle, Rice Moth, Almond Moth, Lesser grain borer, Rice weevil of Wheat and Rice Crops.\"],\"Dosage  Formulation\":[\"30 mg a.i. \\/sq.m. (1.2 gm\\/sq.m.) (In practice 36 gms in 1litre of water to cover 30 sq.m.)\"]}', '2025-05-29 14:06:42', '2025-06-06 18:05:19'),
(28, 30, NULL, '{\"Target Pests\":[\"Rice,hispa, Sorghum Midge\",\"Aphid, Jassid, spotted bollworm, Mites,Mustard Aphids, Head borer, Stem borer, Tobacco Caterpillar, Whitefly\",\"Sanjose scale, Wolly aphids, Meaky scale, Mango Hopper\",\"Beetle\"],\"Dosage\":[\"500-575 gm a.i \\/ Ha\",\"500-750 gm a.i \\/ Ha\",\"0.05-0.075 gm a.i \\/ Ha\",\"500 gm a.i \\/ Ha\"],\"Dilution in Water (L)\":[\"Dilute 1150ml of Riddle in 500 liters of water to cover 1 hectare area\",\"Dilute 500ml of Riddle in 500 liters of water to cover 1 hectare area\",\"Dilute 1500-3000ml of Riddle in 1500 liters of water cover 1 hectare area\",\"Dilute 1000ml of Riddle in 1500 liters of water to cover 1 hectare area\"]}', '2025-05-29 14:16:06', '2025-06-06 18:32:34'),
(29, 25, NULL, '{\"Dosage  Formulation\":[\"7.5-15 gm a.i. \\/500 sq.mtr\",\"10 gm a.i. \\/500 sq.mtr\"],\"Dilution in Water (L)\":[\"Dilute 75-150 gm in 10 litres of water to cover 500 sq.m. area\",\"Dilute 75-150 gm of in 10 litres of water to cover 500 sq.m. area\"]}', '2025-05-29 16:51:20', '2025-06-06 18:05:59'),
(30, 24, NULL, '{\"Dosage  Formulation\":[\"For public health use for controlling mosquitoes transmit malaria (Anopheles culicifacies) and other vector borne disease\"],\"AI (g)\":[\"12.5 gm a.i.\\/ 500 sq. meter surface area\"],\"Formulation (ml)\":[\"125 ml of Aesther+ in 10 litres of water to cover 500 m2 surface area\"]}', '2025-05-29 16:59:50', '2025-06-06 18:06:19'),
(31, 23, NULL, '{\"Pest\":[\"Adult mosquitoes  Culex sp. And  Anopheles sp.\",\"Adult mosquitoes  Culex sp. And  Anopheles sp.\"],\"Application\":[\"Thermal fogging\",\"Ultra Low Volume (ULV) application\"],\"Dosage\\/Ha\":[\"0.5 a.i.\\/gm\",\"1.0 a.i.\\/gm\"],\"Dosage  Formulation\":[\"25 ml\",\"50 ml\"],\"Dilution\\/Ha water\":[\"5-10 litre\",\"1 litre\"]}', '2025-06-06 19:09:00', '2025-06-06 19:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) NOT NULL,
  `section_key` varchar(100) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `type` varchar(50) DEFAULT '''default''',
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section_key`, `title`, `content`, `type`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Company Profile', 'Kalyani Industries Limited Pioneer developer and innovator of cutting-edge agrochemical and public health pesticide products.', 'Certified by HACCP, ISO 9001, ISO 14001, OHSAS, WHO GMP, IEC 17025; Company has world class manufacturing plant having facilities to manufacture all types of Pesticides including Technical for Export, Agrochemicals and Public health Pesticides. Currently we are manufacturing 378 products to serve domestic and international market.\r\n\r\nFounded on firm conviction of agricultural productivity, public health, and environmental protection, Kalyani Industries Limited has emerged as a trusted business partner and associate of farmers, Pest Management Professional, public health organizations, and industries looking for effective and sustainable pest control solutions at reasoable cost. Our portfolio of high-value products is diversified to address the changing needs of modern agriculture and worldwide public health.\r\n\r\nDue to unparellel standard of product with capacity to produce more, Company has able to export many countries of the world without interception of domestc supply.', 'hero', 'uploads/company_profile/1773731060_company_profile.png', '2026-03-17 01:19:45', '2026-03-17 01:49:55', NULL),
(2, 'Innovation', NULL, 'Innovation is the ethos of everything that we undertake at Kalyani Industries Limited. Our state-of-the-art research and development laboratories are staffed by a team of career scientists and agronomists who are dedicated to discovering and developing next-generation solutions. We have stringent quality control processes at all manufacture stages, so our products are of the highest international standards of efficacy, safety, and environmental stewardship', 'default', NULL, '2026-03-17 01:34:42', '2026-03-17 01:34:42', NULL),
(3, 'Quality & Compliance', 'Quality & Compliance', 'Kalyani Industries has rigorous quality control processes at all levels of manufacturing, from raw material procurement to despatch of the finished product. Our factories are state of the art and are run strictly according to national and international regulatory norms. We intend to deliver products that are not just successful, but also of the highest order for safety and for the environment.', 'default', NULL, '2026-03-17 01:35:00', '2026-03-17 01:50:31', NULL),
(4, 'Core Business Areas', 'Core Business Areas', 'Kalyani Industries Limited has experience in two significant segments:', 'list', NULL, '2026-03-17 01:35:46', '2026-03-17 01:50:42', NULL),
(5, 'Mission', 'Mission', 'Our vision is to develop, produce, and sell effective, safe, and sustainable crop protection and public health products that enhance food security, enhance agricultural productivity, and safeguard human health everywhere.', 'default', NULL, '2026-03-17 01:36:06', '2026-03-17 01:36:06', NULL),
(6, 'Vision', 'Vision', 'To be the most respected partner in sustainable agriculture and public health, recognized by our innovative products, our dedication to quality, and our positive impact on the environment and the community.', 'default', NULL, '2026-03-17 01:36:23', '2026-03-17 01:36:23', NULL),
(7, 'Sustainability and Responsibility', 'Sustainability and Responsibility', 'We believe that economic growth and prospering must always be in tandem with social responsibility and environmental protection. It is evidenced by our dedication through:', 'list', NULL, '2026-03-17 01:37:28', '2026-03-17 01:51:29', NULL),
(8, 'Why to Choose Kalyani Industries Limited?', 'Why to Choose Kalyani Industries Limited?', NULL, 'list', NULL, '2026-03-17 01:38:57', '2026-03-17 01:51:38', NULL),
(9, 'Future Outlook', 'Future Outlook', 'Kalyani Industries Limited is working for long-term growth on the strength of our firm commitment to innovation, sustainability, and customer satisfaction. We plan to widen our product portfolio, enhance our R&D strength, and venture into new geographies while continuing to drive our core values of quality, integrity, and environmental care. By emphasizing innovative, sustainable solutions, Kalyani Industries is committed to helping create a healthier and more prosperous agricultural and community future for the world.', 'default', NULL, '2026-03-17 01:39:13', '2026-03-17 01:39:13', NULL),
(10, 'AWARDS & RECOGNITION', 'AWARDS & RECOGNITION', 'Kalyani Limited Industries is recognized by Ministry of External affair, Central Insecticides Board Department of Agriculture, Government of India to manufacture various pesticides.\r\n\r\nCompany also recognized by Department of Agriculture, Government of Gujarat to set up plant for Production of Agrochemicals and Public Health Pesticides.\r\n\r\nApart from all necessary recognition, company is also recognized by lakhs of satisfied customers including Farmers, Pest Management Professional, Dealer, Distributors, NGO, Govt undertaking organization etc.\r\n\r\nCompany is awarded by many international organizations for company’s role in integrated pest management.', 'image_text', 'uploads/company_profile/1773731386_tropy-squre.jpeg', '2026-03-17 01:39:46', '2026-03-17 01:51:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `section_items`
--

CREATE TABLE `section_items` (
  `id` bigint(20) NOT NULL,
  `section_id` bigint(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section_items`
--

INSERT INTO `section_items` (`id`, `section_id`, `title`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 4, 'Agrochemicals:', 'We believe in enabling farmers with innovative crop protection products offering increased yields, better crop quality, and food security. Our portfolio of products offers solutions to a wide array of agricultural requirements, from protection of crops from pests and diseases to efficient weed management.', '2026-03-17 01:35:46', '2026-03-17 01:50:42', '2026-03-17 01:50:42'),
(3, 4, 'Public health Pesticides:', 'Dedicated to safeguarding public health and living space hygiene, the department offers expert solutions for the control of vectors (e.g., flies, mosquitoes), household pest control, and commercial pest control. These products are essential for disease prevention and providing healthier living and working conditions.', '2026-03-17 01:35:46', '2026-03-17 01:50:42', '2026-03-17 01:50:42'),
(4, 7, 'Green Formulations:', 'With emphasis placed on developing products with positive environmental profiles and decreased toxicity.', '2026-03-17 01:37:28', '2026-03-17 01:51:29', '2026-03-17 01:51:29'),
(5, 7, 'Responsible Manufacturing:', 'Implementing sustainable actions in our facilities, including reducing waste, conserving energy, and conserving water.', '2026-03-17 01:37:28', '2026-03-17 01:51:29', '2026-03-17 01:51:29'),
(6, 7, 'Stewardship Programs:', 'Encouraging the safe and responsible handling of our products through intensive training and education programs for growers and public health professionals.', '2026-03-17 01:37:28', '2026-03-17 01:51:29', '2026-03-17 01:51:29'),
(7, 7, 'Community Engagement:', 'An ongoing engagement in initiatives that encourage agricultural communities and public health education.', '2026-03-17 01:37:28', '2026-03-17 01:51:29', '2026-03-17 01:51:29'),
(8, 8, 'Proven Efficacy:', 'Products backed by extensive research and field application', '2026-03-17 01:38:57', '2026-03-17 01:51:38', '2026-03-17 01:51:38'),
(9, 8, 'Safety & Compliance:', 'Adherence to global regulatory standards and ethical product stewardship.', '2026-03-17 01:38:57', '2026-03-17 01:51:38', '2026-03-17 01:51:38'),
(10, 8, 'Innovation:', 'Ongoing innovation of creative, sustainable solutions.', '2026-03-17 01:38:57', '2026-03-17 01:51:38', '2026-03-17 01:51:38'),
(11, 8, 'Expert Help:', 'Qualified technical and customer care personnel.', '2026-03-17 01:38:57', '2026-03-17 01:51:38', '2026-03-17 01:51:38'),
(12, 8, 'Sustainable Practices:', 'A commitment to environmental stewardship and social responsibility.', '2026-03-17 01:38:57', '2026-03-17 01:51:38', '2026-03-17 01:51:38'),
(13, 4, 'Agrochemicals:', 'We believe in enabling farmers with innovative crop protection products offering increased yields, better crop quality, and food security. Our portfolio of products offers solutions to a wide array of agricultural requirements, from protection of crops from pests and diseases to efficient weed management.', '2026-03-17 01:50:42', '2026-03-17 01:50:57', '2026-03-17 01:50:57'),
(14, 4, 'Public health Pesticides:', 'Dedicated to safeguarding public health and living space hygiene, the department offers expert solutions for the control of vectors (e.g., flies, mosquitoes), household pest control, and commercial pest control. These products are essential for disease prevention and providing healthier living and working conditions.', '2026-03-17 01:50:42', '2026-03-17 01:50:57', '2026-03-17 01:50:57'),
(15, 4, 'Agrochemicals:', 'We believe in enabling farmers with innovative crop protection products offering increased yields, better crop quality, and food security. Our portfolio of products offers solutions to a wide array of agricultural requirements, from protection of crops from pests and diseases to efficient weed management.', '2026-03-17 01:50:57', '2026-03-17 01:50:57', NULL),
(16, 4, 'Public health Pesticides:', 'Dedicated to safeguarding public health and living space hygiene, the department offers expert solutions for the control of vectors (e.g., flies, mosquitoes), household pest control, and commercial pest control. These products are essential for disease prevention and providing healthier living and working conditions.', '2026-03-17 01:50:57', '2026-03-17 01:50:57', NULL),
(17, 7, 'Green Formulations:', 'With emphasis placed on developing products with positive environmental profiles and decreased toxicity.', '2026-03-17 01:51:29', '2026-03-17 01:51:29', NULL),
(18, 7, 'Responsible Manufacturing:', 'Implementing sustainable actions in our facilities, including reducing waste, conserving energy, and conserving water.', '2026-03-17 01:51:29', '2026-03-17 01:51:29', NULL),
(19, 7, 'Stewardship Programs:', 'Encouraging the safe and responsible handling of our products through intensive training and education programs for growers and public health professionals.', '2026-03-17 01:51:29', '2026-03-17 01:51:29', NULL),
(20, 7, 'Community Engagement:', 'An ongoing engagement in initiatives that encourage agricultural communities and public health education.', '2026-03-17 01:51:29', '2026-03-17 01:51:29', NULL),
(21, 8, 'Proven Efficacy:', 'Products backed by extensive research and field application', '2026-03-17 01:51:38', '2026-03-17 01:51:38', NULL),
(22, 8, 'Safety & Compliance:', 'Adherence to global regulatory standards and ethical product stewardship.', '2026-03-17 01:51:38', '2026-03-17 01:51:38', NULL),
(23, 8, 'Innovation:', 'Ongoing innovation of creative, sustainable solutions.', '2026-03-17 01:51:38', '2026-03-17 01:51:38', NULL),
(24, 8, 'Expert Help:', 'Qualified technical and customer care personnel.', '2026-03-17 01:51:38', '2026-03-17 01:51:38', NULL),
(25, 8, 'Sustainable Practices:', 'A commitment to environmental stewardship and social responsibility.', '2026-03-17 01:51:38', '2026-03-17 01:51:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('66FbqLVq1NQ1YLW7pmWBIZNOmSjAf3Nn9ghpSPQB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiazVTMjRxcEMyYjVCaEQ1dzZad0R5MGhIdlFtM2VuR2pxVEVXd2czbyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9pbmRleC5odG1sIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1773738908),
('wuSscJv6hi8ivcoAJGDAVENA6hTryemHfBo0twDC', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidGZQOGNyNWZHaUY3V01VMmtVaFl0cGZ0R3AzQ1Q2RnpQbUVKYmZ6TSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC92aWV3dGVzdCI7czo1OiJyb3V0ZSI7czoxNjoidmlldy50ZXN0aW1vbmlhbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1773735361);

-- --------------------------------------------------------

--
-- Table structure for table `social_media_links`
--

CREATE TABLE `social_media_links` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `display_order` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social_media_links`
--

INSERT INTO `social_media_links` (`id`, `name`, `url`, `icon`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'https://youtube.com/@yourchannels', 'social_icons/1772274551_facebook.png', 1, 1, '2026-02-28 04:59:11', '2026-02-28 05:02:40'),
(2, 'Email', 'https://instagram.com/yourprofile', 'social_icons/1772276837_mail.png', 2, 1, '2026-02-28 05:37:17', '2026-02-28 05:37:17'),
(3, 'Youtube', 'https://youtube.com/@yourchannel', 'social_icons/1772276864_youtube.png', 3, 1, '2026-02-28 05:37:44', '2026-02-28 05:37:44'),
(4, 'JustDial', 'https://youtube.com/@yourchannel', 'social_icons/1772276903_justdile.png', 4, 1, '2026-02-28 05:38:23', '2026-02-28 05:38:23'),
(5, 'Whatsapp', 'https://instagram.com/yourprofile', 'social_icons/1772276927_whatapp.png', 5, 1, '2026-02-28 05:38:47', '2026-02-28 05:38:47'),
(6, 'Instagram', 'https://youtube.com/@yourchannel', 'social_icons/1772276945_instagram.png', 6, 1, '2026-02-28 05:39:05', '2026-02-28 05:39:05'),
(7, 'Linkdin', 'https://youtube.com/@yourchannel', 'social_icons/1772276962_linkdin.png', 7, 1, '2026-02-28 05:39:22', '2026-02-28 05:39:22'),
(8, 'Twitter', 'https://instagram.com/yourprofile', 'social_icons/1772276978_twitter.png', 8, 1, '2026-02-28 05:39:38', '2026-02-28 05:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `short_discription` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `discription` text CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `is_active` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `category_id`, `name`, `slug`, `img`, `icon`, `short_discription`, `discription`, `is_active`, `created_at`, `updated_at`) VALUES
(12, 20, 'Insecticides', 'insecticides', '/subcategory/1744616345public_health.png', '/subcaticon/17446163451743166977agroicon.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Active', '2025-04-14 14:39:05', '2026-02-09 12:26:21'),
(13, 20, 'Weedicide', 'weedicide', '/subcategory/1744616504growone.png', '/subcaticon/1744616504AgroChemicals.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Active', '2025-04-14 14:41:44', '2026-02-09 12:26:33'),
(14, 20, 'Fungicide', 'fungicide', '/subcategory/1744617086growone.png', '/subcaticon/1744617086rings.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Active', '2025-04-14 14:42:50', '2026-02-09 12:26:46'),
(15, 20, 'Plant Growth Regulator', 'plant-growth-regulator', '/subcategory/1744617135grass.png', '/subcaticon/1744617135reduce.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Active', '2025-04-14 14:44:00', '2026-02-09 12:27:08'),
(16, 20, 'Adjuvant', 'adjuvant', '/subcategory/1744616705grass.png', '/subcaticon/1744616705impact_input.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Active', '2025-04-14 14:45:05', '2026-02-09 12:27:22'),
(17, 20, 'Biostimulant', 'biostimulant', '/subcategory/1744616757public_health.png', '/subcaticon/1744616757effictive_storage.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Active', '2025-04-14 14:45:57', '2026-02-09 12:27:38'),
(18, 20, 'Plant Suppliment', 'plant-suppliment', '/subcategory/1744616810products_by_ingerdrent.png', '/subcaticon/1744616810wast_reduction.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Active', '2025-04-14 14:46:50', '2026-02-09 12:27:51'),
(20, 20, 'Seed Treatment', 'seed-treatment', '/subcategory/1744617931growone.png', '/subcaticon/1744617931reduce.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Active', '2025-04-14 15:05:31', '2026-02-09 12:28:05'),
(21, 21, 'Vector Control', 'vector-control', '/subcategory/1744618025picimage.png', '/subcaticon/1744618025wast_reduction.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Active', '2025-04-14 15:07:05', '2026-02-09 12:28:22'),
(22, 21, 'Termite Control', 'termite-control', '/subcategory/1744618085picimage.png', '/subcaticon/1744618085product-insectside.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Active', '2025-04-14 15:08:05', '2026-02-09 12:28:36'),
(23, 21, 'Rodent Control', 'rodent-control', '/subcategory/1744618176public_health.png', '/subcaticon/1744618176superqulity.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Active', '2025-04-14 15:09:36', '2026-02-09 12:28:51'),
(24, 21, 'Stored Grain Pest control', 'stored-grain-pest-control', '/subcategory/1744618226manufacterstwo.png', '/subcaticon/1744618226impact_input.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Active', '2025-04-14 15:10:26', '2026-02-09 12:29:11'),
(25, 21, 'General Pest Control', 'general-pest-control', '/subcategory/1744618299AgroChemicals.png', '/subcaticon/1744618299higih_product.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis quam eos nemo, sunt at laudantium voluptatum eligendi, maxime aliquid voluptatem alias! Dolores cumque facere et!', 'Active', '2025-04-14 15:11:39', '2026-02-09 12:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `testimonal`
--

CREATE TABLE `testimonal` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `occupation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `date` date NOT NULL,
  `is_active` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonal`
--

INSERT INTO `testimonal` (`id`, `name`, `image`, `occupation`, `message`, `date`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Jenny Wilson sing', '/testimonal/1743505540BG.png', 'Grower.io', 'We love Landingfolio! Our designers were using it for their projects, so we already knew what kind of design they want.\"', '2024-12-11', 'Active', '2025-04-01 05:35:40', '2025-04-01 05:57:47'),
(3, 'sheela', '/testimonal/1743574756BG.png', 'web design', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, delectus aliquam natus dicta minima, soluta voluptatum aut cum corporis illum deleniti debitis repudiandae, esse voluptatem consectetur placeat nam molestiae quia!', '2025-04-09', 'Active', '2025-04-02 00:49:16', '2025-04-02 00:49:16'),
(4, 'nisha', '/testimonal/1743574798BG.png', 'tailor', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, delectus aliquam natus dicta minima, soluta voluptatum aut cum corporis illum deleniti debitis repudiandae, esse voluptatem consectetur placeat nam molestiae quia!', '2025-04-23', 'Active', '2025-04-02 00:49:58', '2025-04-02 00:49:58'),
(5, 'shilpa', '/testimonal/1743574849BG.png', 'farmer', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, delectus aliquam natus dicta minima, soluta voluptatum aut cum corporis illum deleniti debitis repudiandae, esse voluptatem consectetur placeat nam molestiae quia!', '2025-04-16', 'Active', '2025-04-02 00:50:49', '2025-04-02 00:50:49'),
(6, 'sheetal sing', '/testimonal/1744270324BG.png', 'Grower.io', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque facere culpa enim dolores repellat hic voluptatem debitis voluptas voluptatibus aspernatur, magnam commodi repudiandae? Praesentium ab voluptatum atque quis! Nobis, unde.', '2025-04-08', 'Active', '2025-04-10 14:32:04', '2025-04-10 14:32:04'),
(7, 'kiran', '/testimonal/1750839209g20.jpg', 'business', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque facere culpa enim dolores repellat hic voluptatem debitis voluptas voluptatibus aspernatur, magnam commodi repudiandae? Praesentium ab voluptatum atque quis! Nobis, unde.', '2025-06-25', 'Inactive', '2025-06-25 15:13:29', '2025-06-25 15:13:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sanjay', 'admin@gmail.com', NULL, '$2y$12$84c4DD52oEY9lOg5SzobFuNZaRNc85acQUftJvrEh.aQyBIK58Ruq', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) NOT NULL,
  `video_path` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `sequence_no` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_path`, `description`, `sequence_no`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '/videos/uploads/1771394776_10041412-hd_1080_1920_24fps.mp4', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.', 2, 1, '2026-02-18 00:36:16', '2026-02-18 01:09:51', NULL),
(2, '/videos/uploads/1771395438_19120712-hd_1080_1920_30fps.mp4', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.', 1, 1, '2026-02-18 00:47:18', '2026-02-18 01:08:43', NULL),
(3, '/videos/uploads/1771396823_6015651-hd_1080_1920_30fps.mp4', 'Lorem, ipsum dolor sit amet consectetur', 3, 1, '2026-02-18 01:10:23', '2026-03-15 13:41:53', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate_page_sections`
--
ALTER TABLE `certificate_page_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corporate_media`
--
ALTER TABLE `corporate_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `homepage_banner`
--
ALTER TABLE `homepage_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage_contents`
--
ALTER TABLE `homepage_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage_stats`
--
ALTER TABLE `homepage_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layout_points`
--
ALTER TABLE `layout_points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_layout_points_layout` (`page_layouts_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_menu_id` (`menu_id`),
  ADD KEY `idx_page_id` (`page_id`),
  ADD KEY `idx_parent_id` (`parent_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `page_layouts`
--
ALTER TABLE `page_layouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_page_layout_section` (`page_section_id`);

--
-- Indexes for table `page_sections`
--
ALTER TABLE `page_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_page_id` (`page_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_specification`
--
ALTER TABLE `product_specification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_uses`
--
ALTER TABLE `product_uses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_items`
--
ALTER TABLE `section_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `social_media_links`
--
ALTER TABLE `social_media_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonal`
--
ALTER TABLE `testimonal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `certificate_page_sections`
--
ALTER TABLE `certificate_page_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `corporate_media`
--
ALTER TABLE `corporate_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homepage_banner`
--
ALTER TABLE `homepage_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homepage_contents`
--
ALTER TABLE `homepage_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `homepage_stats`
--
ALTER TABLE `homepage_stats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layout_points`
--
ALTER TABLE `layout_points`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `page_layouts`
--
ALTER TABLE `page_layouts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `page_sections`
--
ALTER TABLE `page_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_specification`
--
ALTER TABLE `product_specification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_uses`
--
ALTER TABLE `product_uses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `section_items`
--
ALTER TABLE `section_items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `social_media_links`
--
ALTER TABLE `social_media_links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `testimonal`
--
ALTER TABLE `testimonal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `layout_points`
--
ALTER TABLE `layout_points`
  ADD CONSTRAINT `fk_layout_points_layout` FOREIGN KEY (`page_layouts_id`) REFERENCES `page_layouts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `fk_menu_items_menu` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_menu_items_page` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_menu_items_parent` FOREIGN KEY (`parent_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `page_layouts`
--
ALTER TABLE `page_layouts`
  ADD CONSTRAINT `fk_page_layout_section` FOREIGN KEY (`page_section_id`) REFERENCES `page_sections` (`id`);

--
-- Constraints for table `page_sections`
--
ALTER TABLE `page_sections`
  ADD CONSTRAINT `fk_page_sections_page` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `section_items`
--
ALTER TABLE `section_items`
  ADD CONSTRAINT `section_items_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
