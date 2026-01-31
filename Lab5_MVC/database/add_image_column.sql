USE buoi2_php;

ALTER TABLE `products` 
ADD COLUMN IF NOT EXISTS `image` VARCHAR(500) DEFAULT NULL AFTER `description`;

UPDATE products SET image = 'https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-blue-thumbnew-600x600.jpg' WHERE name LIKE '%iPhone%' AND image IS NULL;
UPDATE products SET image = 'https://cdn.tgdd.vn/Products/Images/42/307174/samsung-galaxy-s24-ultra-grey-thumbn-600x600.jpg' WHERE name LIKE '%Samsung%' AND image IS NULL;
UPDATE products SET image = 'https://cdn.tgdd.vn/Products/Images/44/318230/macbook-pro-14-inch-m3-gray-thumb-1-600x600.jpg' WHERE name LIKE '%MacBook%' AND image IS NULL;
UPDATE products SET image = 'https://cdn.tgdd.vn/Products/Images/44/301276/dell-xps-15-9530-i7-71014226-thumb-600x600.jpg' WHERE name LIKE '%Dell%' AND image IS NULL;
UPDATE products SET image = 'https://cdn.tgdd.vn/Products/Images/54/315014/airpods-pro-2-usb-c-thumb-600x600.jpg' WHERE name LIKE '%AirPods%' AND image IS NULL;
UPDATE products SET image = 'https://cdn.tgdd.vn/Products/Images/7077/309814/apple-watch-ultra-2-lte-49mm-thumb-1-600x600.jpg' WHERE name LIKE '%Apple Watch%' AND image IS NULL;
UPDATE products SET image = 'https://cdn.tgdd.vn/Products/Images/54/289727/tai-nghe-bluetooth-chup-tai-sony-wh-1000xm5-den-3-600x600.jpg' WHERE name LIKE '%Sony%' AND image IS NULL;
UPDATE products SET image = 'https://cdn.tgdd.vn/Products/Images/522/322064/ipad-pro-11-inch-m4-wifi-sliver-thumb-600x600.jpg' WHERE name LIKE '%iPad%' AND image IS NULL;

SELECT id, name, image FROM products;
