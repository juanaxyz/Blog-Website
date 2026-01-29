-- MySQL dump 10.13  Distrib 8.4.8, for Linux (x86_64)
--
-- Host: localhost    Database: gblog
-- ------------------------------------------------------
-- Server version	8.4.8

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!50503 SET NAMES utf8mb4 */
;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */
;
/*!40103 SET TIME_ZONE='+00:00' */
;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */
;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */
;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */
;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */
;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `categories` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(50) NOT NULL,
    `slug` varchar(60) NOT NULL,
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `name` (`name`),
    UNIQUE KEY `slug` (`slug`)
) ENGINE = InnoDB AUTO_INCREMENT = 5 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */
;
INSERT INTO
    `categories`
VALUES (
        1,
        'PHP',
        'php',
        '2026-01-29 05:57:28'
    ),
    (
        2,
        'Web Development',
        'web-development',
        '2026-01-29 05:57:28'
    ),
    (
        3,
        'Backend',
        'backend',
        '2026-01-29 05:57:28'
    ),
    (
        4,
        'Ekonomi',
        'ekonomi',
        '2026-01-29 06:47:09'
    );
/*!40000 ALTER TABLE `categories` ENABLE KEYS */
;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `posts` (
    `id` int NOT NULL AUTO_INCREMENT,
    `user_id` int NOT NULL,
    `category_id` int NOT NULL,
    `title` varchar(150) NOT NULL,
    `slug` varchar(160) NOT NULL,
    `content` text NOT NULL,
    `gambar` varchar(100) DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NULL DEFAULT NULL,
    `status` enum('Draft', 'Published') DEFAULT 'Draft',
    PRIMARY KEY (`id`),
    UNIQUE KEY `slug` (`slug`),
    KEY `user_id` (`user_id`),
    KEY `category_id` (`category_id`),
    CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
    CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 12 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */
;
INSERT INTO
    `posts`
VALUES (
        1,
        1,
        2,
        'Startup dan Peran Investor di Era Digital',
        'startup-dan-peran-investor-di-era-digital',
        'Artikel ini membahas bagaimana investor berperan penting dalam pertumbuhan startup digital di Indonesia.',
        'startup-investor.jpg',
        '2026-01-29 05:57:28',
        NULL,
        'Draft'
    ),
    (
        2,
        1,
        2,
        'Pemanfaatan AI dalam Dunia Pendidikan',
        'pemanfaatan-ai-dalam-dunia-pendidikan',
        'Kecerdasan buatan mulai dimanfaatkan untuk personalisasi pembelajaran dan efisiensi sistem pendidikan.',
        'ai-pendidikan.jpg',
        '2026-01-29 05:57:28',
        NULL,
        'Draft'
    ),
    (
        3,
        1,
        2,
        'Pentingnya Literasi Digital bagi Masyarakat',
        'pentingnya-literasi-digital-bagi-masyarakat',
        'Literasi digital menjadi kunci agar masyarakat mampu menggunakan teknologi secara bijak dan aman.',
        'literasi-digital.jpg',
        '2026-01-29 05:57:28',
        NULL,
        'Draft'
    ),
    (
        4,
        1,
        2,
        'Transformasi Digital di Indonesia',
        'transformasi-digital-di-indonesia',
        'Perkembangan teknologi mendorong percepatan transformasi digital di berbagai sektor di Indonesia.',
        'digital-indonesia.jpg',
        '2026-01-29 05:57:28',
        NULL,
        'Draft'
    ),
    (
        5,
        1,
        2,
        'Penyesuaian Harga BBM dan Dampaknya',
        'penyesuaian-harga-bbm-dan-dampaknya',
        'Penyesuaian harga BBM memberikan dampak ekonomi dan sosial yang luas bagi masyarakat.',
        'bbm-penyesuaian.jpg',
        '2026-01-29 05:57:28',
        NULL,
        'Draft'
    ),
    (
        6,
        1,
        2,
        'Nilai Tukar Rupiah Menguat',
        'nilai-tukar-rupiah-menguat',
        'Penguatan rupiah dipengaruhi oleh stabilitas ekonomi dan sentimen positif pasar global.',
        'rupiah-menguat.jpg',
        '2026-01-29 05:57:28',
        NULL,
        'Draft'
    ),
    (
        7,
        1,
        2,
        'Teknologi Hijau untuk Masa Depan',
        'teknologi-hijau-untuk-masa-depan',
        'Teknologi hijau hadir sebagai solusi untuk mengurangi dampak lingkungan dan perubahan iklim.',
        'teknologi-hijau.jpg',
        '2026-01-29 05:57:28',
        NULL,
        'Draft'
    ),
    (
        8,
        1,
        2,
        'Digitalisasi UMKM di Indonesia',
        'digitalisasi-umkm-di-indonesia',
        'UMKM mulai beralih ke platform digital untuk memperluas pasar dan meningkatkan daya saing.',
        'umkm-digital.jpg',
        '2026-01-29 05:57:28',
        NULL,
        'Draft'
    ),
    (
        9,
        1,
        2,
        'Perkembangan E-Commerce Pasca Pandemi',
        'perkembangan-ecommerce-pasca-pandemi',
        'Pandemi mempercepat adopsi e-commerce dan mengubah perilaku belanja masyarakat.',
        'ecommerce-pasca-pandemi.jpg',
        '2026-01-29 05:57:28',
        NULL,
        'Draft'
    ),
    (
        10,
        1,
        2,
        'Peran Media Digital di Era Modern',
        'peran-media-digital-di-era-modern',
        'Media digital menjadi sarana utama penyebaran informasi di era internet.',
        'media-digital.jpg',
        '2026-01-29 05:57:28',
        NULL,
        'Draft'
    ),
    (
        11,
        1,
        4,
        'IHSG ANJLOK, ihsg anjlok apa kata purbaya',
        'ihsg anjlok apa kata purbaya',
        'ihsg anjlok apa kata purbaya ?? masak cuma diaam aja ?',
        '697b05b7007c3-ihsg merah.jpeg',
        '2026-01-29 07:01:11',
        NULL,
        'Draft'
    );
/*!40000 ALTER TABLE `posts` ENABLE KEYS */
;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `users` (
    `id` int NOT NULL AUTO_INCREMENT,
    `username` varchar(50) NOT NULL,
    `email` varchar(100) DEFAULT NULL,
    `password` varchar(255) NOT NULL,
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `profile` varchar(100) DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `username` (`username`),
    UNIQUE KEY `email` (`email`)
) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */
;
INSERT INTO
    `users`
VALUES (
        1,
        'juana',
        'juana@mail.com',
        '$2y$10$Lvsme.lLb5/OOyQc6YvL0eJytGYMuMd4vI483qXoZsk6aFriXzjp6',
        '2026-01-29 05:57:28',
        'juana.jpg'
    ),
    (
        2,
        'satya',
        'satya@mail.com',
        '$2y$10$Lvsme.lLb5/OOyQc6YvL0eJytGYMuMd4vI483qXoZsk6aFriXzjp6',
        '2026-01-29 05:57:28',
        'satya.png'
    );
/*!40000 ALTER TABLE `users` ENABLE KEYS */
;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */
;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */
;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */
;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */
;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */
;

-- Dump completed on 2026-01-29  8:40:53