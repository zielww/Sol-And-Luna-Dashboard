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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.addresses: ~2 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.categories: ~12 rows (approximately)
INSERT INTO `categories` (`category_id`, `name`, `description`, `visibility`, `parent_category_id`, `created_at`) VALUES
	(1, 'shirts', 'Everyday tops with sleeves and a collar, coming in many styles and fabrics for both casual and dressy looks.', 1, 2, '2024-11-01 02:20:38'),
	(2, 'shorts', 'Knee-length or shorter pants that are great for warm weather, offering comfort and freedom of movement.', 1, 0, '2024-11-01 02:20:34'),
	(3, 'blouse', 'A stylish top, usually made from lighter fabrics, often with decorative details and a relaxed fit, perfect for dressing up or down.', 1, 2, '2024-11-01 02:20:40'),
	(4, 'dress', 'A one-piece garment that covers the body and can be casual or formal, with various styles, lengths, and patterns.', 1, 2, '2024-11-01 02:20:37'),
	(5, 'jacket', 'outer garment that provides warmth and style, typically featuring sleeves and a front opening, perfect for layering over other clothes.', 1, 2, '2024-11-02 02:20:38'),
	(21, 'shoes', 'Footwear that protect and provide comfort for the feet, available in many styles for different occasions, from casual to formal.', 1, NULL, '2024-11-01 04:54:03'),
	(22, 'boots', 'Sturdy footwear that cover the ankle or higher, often designed for protection and warmth, and come in various styles for fashion or function.', 1, NULL, '2024-11-01 04:54:13'),
	(23, 'sweater', 'Cozy knitted garment worn on the upper body, often made of wool or cotton, perfect for keeping warm in cooler weather.', 1, NULL, '2024-11-01 04:57:01'),
	(24, 'handbag', 'Portable accessory used to carry personal items, often featuring handles or a strap and coming in various sizes and styles for everyday use or special occasions.', 1, NULL, '2024-11-01 05:02:18'),
	(25, 'sneakers', 'Comfortable shoes designed for active wear, typically featuring a rubber sole and breathable materials, making them great for sports or casual outings.', 1, NULL, '2024-11-01 05:03:19'),
	(26, 'skirt', 'A cloth hanging from the waist, worn chiefly by women and girls.', 1, NULL, '2024-11-01 05:03:41'),
	(27, 'sunglasses', 'Protective eyewear designed primarily to prevent bright sunlight and high-energy visible light from damaging or discomforting the eyes.', 1, NULL, '2024-11-01 05:04:08');

-- Dumping structure for table luna.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` bigint NOT NULL AUTO_INCREMENT,
  `sender_id` bigint unsigned NOT NULL,
  `recipient_id` bigint unsigned NOT NULL,
  `message_text` text NOT NULL,
  `sent_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`message_id`),
  KEY `sender_id` (`sender_id`),
  KEY `recipient_id` (`recipient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.messages: ~2 rows (approximately)
INSERT INTO `messages` (`message_id`, `sender_id`, `recipient_id`, `message_text`, `sent_at`, `is_read`) VALUES
	(93, 14, 1, 'bro', '2024-11-02 20:08:17', 0),
	(94, 1, 14, 'why bro', '2024-11-02 20:08:42', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.orders: ~3 rows (approximately)
INSERT INTO `orders` (`order_id`, `user_id`, `email`, `status`, `notes`, `total_amount`, `shipping_address_id`, `created_at`) VALUES
	(1, 7, 'shimijallores@gmail.com', 'cancelled', 'I love cats', 32423.00, 1, '2024-10-12 12:35:36'),
	(2, 10, 'estephaniedetorres@gmail.com', 'shipped', 'I love cats but im allergic', 4321.00, 2, '2024-10-11 13:23:31'),
	(3, 3, 'youanybluesky30@gmail.com', 'new', 'tyler at the top!', 4321.00, 3, '2024-10-11 13:23:31');

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.order_items: ~11 rows (approximately)
INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`, `price_at_time`) VALUES
	(1, 1, 1, 3, 1024.50),
	(2, 1, 39, 25, 51.00),
	(3, 2, 1, 7, 1024.50),
	(4, 2, 2, 18, 51.00),
	(5, 1, 41, 6, 1024.50),
	(6, 2, 34, 2, 1024.50),
	(7, 2, 37, 4, 1024.50),
	(34, 3, 33, 6, 1024.50),
	(35, 3, 31, 10, 1024.50),
	(36, 3, 38, 9, 1024.50),
	(37, 3, 32, 2, 1024.50),
	(38, 1, 38, 1, 1024.50);

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.products: ~11 rows (approximately)
INSERT INTO `products` (`product_id`, `name`, `description`, `visibility`, `price`, `stock_quantity`, `category_id`, `created_by`, `created_at`) VALUES
	(1, 'Kurumi Tshirt', 'My Favorite piece of Shirt. Inspired by Kuromi from Sanrio.', 1, 143.00, 143, 2, NULL, '2024-10-11 13:34:13'),
	(2, 'Moo Deng Denim', 'Cutie hippo moo deng! The cutest and smallest baby hippo from South East Asia. She\'s a trend around the world rn!', 1, 120.00, 40, 2, NULL, '2024-10-11 13:34:46'),
	(32, 'Classic Denim Jacket', 'A timeless staple featuring a relaxed fit, button front, and two chest pockets. Perfect for layering.', 1, 59.99, 50, 5, NULL, '2024-11-01 04:52:38'),
	(34, 'Sleek Leather Ankle Boots', 'Stylish black leather ankle boots with a pointed toe and low block heel. Versatile for day or night.', 1, 89.99, 40, 22, NULL, '2024-11-01 04:56:08'),
	(35, 'Cozy Knit Sweater', 'Soft oversized sweater made from a warm blend of wool and acrylic, featuring ribbed cuffs and hem.', 1, 49.99, 60, 23, NULL, '2024-11-01 04:57:27'),
	(36, 'Trendy Crossbody Bag', 'Compact crossbody bag in faux leather with a gold-tone chain strap. Perfect for carrying essentials.', 1, 39.99, 75, 24, NULL, '2024-11-01 05:02:36'),
	(37, 'Sporty High-Top Sneakers', 'Canvas high-top sneakers with a padded collar and rubber sole, available in multiple colors.', 1, 54.99, 100, 25, NULL, '2024-11-01 05:04:40'),
	(38, 'Elegant Maxi Skirt', 'Flowing maxi skirt with a tiered design and elastic waistband. Great for casual or dressy occasions.', 1, 39.00, 40, 26, NULL, '2024-11-01 05:05:01'),
	(39, 'Stylish Oversized Sunglasses', 'Oversized sunglasses with UV protection and a chic retro design, perfect for sunny days.', 1, 25.00, 80, 27, NULL, '2024-11-01 05:05:20'),
	(40, 'Lightweight Utility Jacket', 'Versatile utility jacket with multiple pockets, drawstring waist, and breathable fabric. Great for layering.', 1, 65.00, 30, 5, NULL, '2024-11-01 05:05:51'),
	(41, 'Casual Graphic Tee', 'Comfortable cotton graphic tee featuring a fun, colorful design. Perfect for everyday wear.', 1, 29.99, 90, 1, NULL, '2024-11-01 05:06:08'),
	(43, 'Chic A-Line Dress', 'Sleek and Modern Dress perfect for formal events and gatherings.', 1, 79.99, 50, 4, NULL, '2024-11-02 12:04:35');

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
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.product_images: ~11 rows (approximately)
INSERT INTO `product_images` (`image_id`, `product_id`, `image_url`, `is_primary`, `name`) VALUES
	(54, 2, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/moodeng.jpg', 1, 'moodeng.jpg'),
	(55, 1, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/kurumi.jpeg', 1, 'kurumi.jpeg'),
	(61, 32, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/denim.jpg', 1, 'denim.jpg'),
	(63, 34, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/ankle-boots.jpg', 1, 'ankle-boots.jpg'),
	(64, 35, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/Cozy Knit Sweater.jpg', 1, 'Cozy Knit Sweater.jpg'),
	(65, 36, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/Trendy Crossbody Bag.jpg', 1, 'Trendy Crossbody Bag.jpg'),
	(66, 37, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/Sporty High-Top Sneakers.jpg', 1, 'Sporty High-Top Sneakers.jpg'),
	(67, 38, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/Elegant Maxi Skirt.jpg', 1, 'Elegant Maxi Skirt.jpg'),
	(68, 39, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/Stylish Oversized Sunglasses.jpg', 1, 'Stylish Oversized Sunglasses.jpg'),
	(69, 40, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/Lightweight Utility Jacket.jpg', 1, 'Lightweight Utility Jacket.jpg'),
	(70, 41, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/Casual Graphic Tee.jpg', 1, 'Casual Graphic Tee.jpg'),
	(74, 43, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/398375005672615538a3dd9.74725757Chic A-Line Dress.jpg', 1, '398375005672615538a3dd9.74725757Chic A-Line Dress.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table luna.users: ~5 rows (approximately)
INSERT INTO `users` (`user_id`, `email`, `password_hash`, `first_name`, `last_name`, `phone`, `country`, `user_type`, `created_at`) VALUES
	(1, 'shimijallores35@gmail.com', 'shimi', 'Shimi', 'Jallores', '09561434976', 'Philippines', 'admin', '2024-10-11 09:31:59'),
	(3, 'youanybluesky30@gmail.com', 'shimi', 'Patriarch', 'Cain', '09289287057', 'Philippines', 'customer', '2024-10-18 10:14:58'),
	(7, 'shimijallores@gmail.com', '$2y$10$Aj8rpfhjRl4CyUm4GYNV9Oj9VHhhjb2AcuiKFarXvXh57j0j9RWsC', 'Shimi Uzziel', 'Jallores', '09561434976', 'Philippines', 'customer', '2024-10-18 11:54:36'),
	(10, 'estephaniedetorres@gmail.com', '$2y$10$s5/0wP3pkkolnZ1KDmBH1OMUvN0qnLaU0.qPkCL4QA1D2k4tMPcPe', 'Estephanie', 'De Torres', '09561434976', 'Philippines', 'customer', '2024-10-19 07:25:22'),
	(14, 'romandmitry99@gmail.com', 'roman', 'Roman', 'Dmitry', NULL, NULL, 'admin', '2024-11-01 16:16:41');

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
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table luna.user_images: ~3 rows (approximately)
INSERT INTO `user_images` (`image_id`, `user_id`, `image_url`, `name`) VALUES
	(72, 3, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/Kuromi.jpg', 'Kuromi.jpg'),
	(74, 1, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/gues.png', 'gues.png'),
	(75, 14, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/Roman.jpg', 'Roman.jpg'),
	(78, 7, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/43840321067261300756395.08170808Profile-Picture-min.jpg', '43840321067261300756395.08170808Profile-Picture-min.jpg'),
	(79, 10, 'C:\\laragon\\projects\\Luna\\public/../public/uploads/14937797746726138e0a6337.59474852images.jpg', '14937797746726138e0a6337.59474852images.jpg');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
