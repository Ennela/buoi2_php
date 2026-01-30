-- =====================================================
-- Lab5 MVC - Setup Database
-- =====================================================
-- Chạy file SQL này trong phpMyAdmin để tạo bảng products
-- Database: buoi2_php
-- =====================================================

USE buoi2_php;

-- Tạo bảng products nếu chưa tồn tại
CREATE TABLE IF NOT EXISTS `products` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `price` DECIMAL(15, 2) NOT NULL DEFAULT 0,
    `description` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Xóa dữ liệu cũ (nếu có)
TRUNCATE TABLE products;

-- Thêm dữ liệu mẫu
INSERT INTO `products` (`name`, `price`, `description`) VALUES
('iPhone 15 Pro Max', 34990000, 'Điện thoại Apple iPhone 15 Pro Max 256GB - Titan Trắng'),
('Samsung Galaxy S24 Ultra', 31990000, 'Điện thoại Samsung Galaxy S24 Ultra 12GB/256GB'),
('Laptop MacBook Pro M3', 49990000, 'Apple MacBook Pro 14 inch M3 Pro 2023'),
('Laptop Dell XPS 15', 42990000, 'Dell XPS 15 9530 Core i7 Gen 13, RTX 4050'),
('AirPods Pro 2', 6790000, 'Apple AirPods Pro 2 (USB-C) - Chống ồn chủ động'),
('Bàn phím Keychron K2', 2190000, 'Bàn phím cơ Keychron K2 RGB Hot-swappable'),
('Màn hình LG UltraFine', 12990000, 'Màn hình LG UltraFine 27" 5K USB-C'),
('Apple Watch Ultra 2', 21990000, 'Apple Watch Ultra 2 GPS + Cellular 49mm'),
('Sony WH-1000XM5', 7990000, 'Tai nghe chống ồn Sony WH-1000XM5 Wireless'),
('iPad Pro M4', 28990000, 'Apple iPad Pro 11 inch M4 2024 WiFi 256GB');

-- Kiểm tra dữ liệu
SELECT * FROM products;
