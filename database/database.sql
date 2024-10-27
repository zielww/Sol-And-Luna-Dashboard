-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table luna.addresses
CREATE TABLE IF NOT EXISTS `addresses` (
  `address_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `street_address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zip_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(100) NOT NULL,
  `is_default` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`address_id`),
  UNIQUE KEY `address_id` (`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.addresses: ~3 rows (approximately)
INSERT INTO `addresses` (`address_id`, `user_id`, `street_address`, `city`, `province`, `zip_code`, `country`, `is_default`) VALUES
	(1, 7, '163 Rizal Street', 'Mataasnakahoy', 'Batangas', '4223', 'Philippines', 1),
	(2, 10, 'Calingatan', 'Mataasnakahoy', 'Batangas', '4223', 'Philippines', 1);

-- Dumping structure for table luna.cart_items
CREATE TABLE IF NOT EXISTS `cart_items` (
  `cart_item_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `added_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cart_item_id`),
  UNIQUE KEY `cart_item_id` (`cart_item_id`),
  KEY `idx_cart_items_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.cart_items: ~0 rows (approximately)

-- Dumping structure for table luna.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `visibility` tinyint DEFAULT NULL,
  `parent_category_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_id` (`category_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.categories: ~5 rows (approximately)
INSERT INTO `categories` (`category_id`, `name`, `description`, `visibility`, `parent_category_id`, `created_at`) VALUES
	(1, 'shirts', 'Desc1', 0, 2, NULL),
	(2, 'shorts', 'desc2', 1, 0, NULL),
	(3, 'blouse', 'desc3', 0, 2, NULL),
	(4, 'dress', 'desc4', 1, 2, NULL),
	(5, 'jacket', 'desc5', 1, 2, NULL);

-- Dumping structure for table luna.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(50) NOT NULL,
  `notes` text,
  `total_amount` decimal(10,2) NOT NULL,
  `shipping_address_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_id` (`order_id`),
  KEY `idx_orders_user` (`user_id`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.orders: ~2 rows (approximately)
INSERT INTO `orders` (`order_id`, `user_id`, `email`, `status`, `notes`, `total_amount`, `shipping_address_id`, `created_at`) VALUES
	(1, 7, 'shimijallores@gmail.com', 'shipped', 'I love cats', 32423.00, 1, '2024-10-11 12:35:36'),
	(2, 10, 'estephaniedetorres@gmail.com', 'processing', 'I love cats but im allergic', 4321.00, 2, '2024-10-11 13:23:31');

-- Dumping structure for table luna.order_items
CREATE TABLE IF NOT EXISTS `order_items` (
  `order_item_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int unsigned NOT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `price_at_time` decimal(10,2) NOT NULL,
  PRIMARY KEY (`order_item_id`),
  UNIQUE KEY `order_item_id` (`order_item_id`),
  KEY `idx_order_items_order` (`order_id`),
  CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.order_items: ~7 rows (approximately)
INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`, `price_at_time`) VALUES
	(1, 1, 1, 3, 1024.50),
	(2, 1, 2, 25, 51.00),
	(3, 2, 1, 4, 1024.50),
	(4, 2, 2, 18, 51.00),
	(5, 1, 1, 6, 1024.50),
	(6, 2, 1, 4, 1024.50),
	(7, 2, 1, 4, 1024.50);

-- Dumping structure for table luna.products
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `visibility` tinyint NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_id` (`product_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.products: ~3 rows (approximately)
INSERT INTO `products` (`product_id`, `name`, `description`, `visibility`, `price`, `stock_quantity`, `category_id`, `created_by`, `created_at`) VALUES
	(1, 'Kurumi Tshirt', 'hi estephanie', 1, 144.00, 143, 2, NULL, '2024-10-11 13:34:13'),
	(2, 'Moo Deng Denim', 'Cutie hippo moo deng ', 1, 143.00, 143, 2, NULL, '2024-10-11 13:34:46');

-- Dumping structure for table luna.product_images
CREATE TABLE IF NOT EXISTS `product_images` (
  `image_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL DEFAULT '0',
  `image_url` varchar(255) NOT NULL,
  `is_primary` tinyint(1) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`image_id`),
  UNIQUE KEY `image_id` (`image_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.product_images: ~2 rows (approximately)
INSERT INTO `product_images` (`image_id`, `product_id`, `image_url`, `is_primary`, `name`) VALUES
	(54, 2, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/moodeng.jpg', 1, 'moodeng.jpg'),
	(55, 1, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/kurumi.jpeg', 1, 'kurumi.jpeg');

-- Dumping structure for table luna.reviews
CREATE TABLE IF NOT EXISTS `reviews` (
  `review_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `comment` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`review_id`),
  UNIQUE KEY `review_id` (`review_id`),
  CONSTRAINT `reviews_chk_1` CHECK (((`rating` >= 1) and (`rating` <= 5)))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.reviews: ~0 rows (approximately)

-- Dumping structure for table luna.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `user_type` enum('admin','customer') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.users: ~4 rows (approximately)
INSERT INTO `users` (`user_id`, `email`, `password_hash`, `first_name`, `last_name`, `phone`, `country`, `user_type`, `created_at`) VALUES
	(1, 'shimijallores35@gmail.com', 'shimi', 'Shimi', 'Jallores', '09561434976', 'Philippines', 'admin', '2024-10-11 09:31:59'),
	(3, 'youanybluesky30@gmail.com', 'shimi', 'Patriarch', 'Cain', '09289287057', 'Philippines', 'customer', '2024-10-18 10:14:58'),
	(7, 'shimijallores@gmail.com', '$2y$10$Aj8rpfhjRl4CyUm4GYNV9Oj9VHhhjb2AcuiKFarXvXh57j0j9RWsC', 'Shimi Uzziel', 'Jallores', '09561434976', 'Philippines', 'customer', '2024-10-18 11:54:36'),
	(10, 'estephaniedetorres@gmail.com', '$2y$10$s5/0wP3pkkolnZ1KDmBH1OMUvN0qnLaU0.qPkCL4QA1D2k4tMPcPe', 'Estephanie', 'De Torres', '09561434976', 'Philippines', 'customer', '2024-10-19 07:25:22');

-- Dumping structure for table luna.user_images
CREATE TABLE IF NOT EXISTS `user_images` (
  `image_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL DEFAULT '0',
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`image_id`) USING BTREE,
  UNIQUE KEY `image_id` (`image_id`) USING BTREE,
  KEY `product_id` (`user_id`) USING BTREE,
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table luna.user_images: ~3 rows (approximately)
INSERT INTO `user_images` (`image_id`, `user_id`, `image_url`, `name`) VALUES
	(62, 7, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/Screenshot 2024-08-14 130707.png', 'Screenshot 2024-08-14 130707.png'),
	(63, 3, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/Profile-Picture-min.jpg', 'Profile-Picture-min.jpg'),
	(64, 10, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/Format-Photo.jpg', 'Format-Photo.jpg');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
