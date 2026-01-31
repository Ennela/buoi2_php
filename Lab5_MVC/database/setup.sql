USE buoi2_php;

CREATE TABLE IF NOT EXISTS `products` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `price` DECIMAL(15, 2) NOT NULL DEFAULT 0,
    `description` TEXT,
    `image` VARCHAR(500) DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

TRUNCATE TABLE products;

INSERT INTO `products` (`name`, `price`, `description`, `image`) VALUES
('iPhone 15 Pro Max', 34990000, 'Điện thoại Apple iPhone 15 Pro Max 256GB - Titan Trắng', 'https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-blue-thumbnew-600x600.jpg'),
('Samsung Galaxy S24 Ultra', 31990000, 'Điện thoại Samsung Galaxy S24 Ultra 12GB/256GB', 'https://cdn.tgdd.vn/Products/Images/42/307174/samsung-galaxy-s24-ultra-grey-thumbn-600x600.jpg'),
('Laptop MacBook Pro M3', 49990000, 'Apple MacBook Pro 14 inch M3 Pro 2023', 'https://cdn.tgdd.vn/Products/Images/44/318230/macbook-pro-14-inch-m3-gray-thumb-1-600x600.jpg'),
('Laptop Dell XPS 15', 42990000, 'Dell XPS 15 9530 Core i7 Gen 13, RTX 4050', 'https://cdn.tgdd.vn/Products/Images/44/301276/dell-xps-15-9530-i7-71014226-thumb-600x600.jpg'),
('AirPods Pro 2', 6790000, 'Apple AirPods Pro 2 (USB-C) - Chống ồn chủ động', 'https://cdn.tgdd.vn/Products/Images/54/315014/airpods-pro-2-usb-c-thumb-600x600.jpg'),
('Bàn phím Keychron K2', 2190000, 'Bàn phím cơ Keychron K2 RGB Hot-swappable', 'https://keychron.vn/wp-content/uploads/2023/05/keychron-k2-pro-qmk-white.jpg'),
('Màn hình LG UltraFine', 12990000, 'Màn hình LG UltraFine 27" 5K USB-C', 'https://cdn.tgdd.vn/Products/Images/5668/305139/lg-27up850n-w-270124-033757-600x600.jpg'),
('Apple Watch Ultra 2', 21990000, 'Apple Watch Ultra 2 GPS + Cellular 49mm', 'https://cdn.tgdd.vn/Products/Images/7077/309814/apple-watch-ultra-2-lte-49mm-thumb-1-600x600.jpg'),
('Sony WH-1000XM5', 7990000, 'Tai nghe chống ồn Sony WH-1000XM5 Wireless', 'https://cdn.tgdd.vn/Products/Images/54/289727/tai-nghe-bluetooth-chup-tai-sony-wh-1000xm5-den-3-600x600.jpg'),
('iPad Pro M4', 28990000, 'Apple iPad Pro 11 inch M4 2024 WiFi 256GB', 'https://cdn.tgdd.vn/Products/Images/522/322064/ipad-pro-11-inch-m4-wifi-sliver-thumb-600x600.jpg');

SELECT * FROM products;
