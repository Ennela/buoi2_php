<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $products = [
            // Điện thoại (category_id = 1)
            ['name' => 'iPhone 15 Pro Max 256GB', 'category_id' => 1, 'price' => 34990000],
            ['name' => 'iPhone 16 Pro 128GB', 'category_id' => 1, 'price' => 28990000],
            ['name' => 'Samsung Galaxy S24 Ultra', 'category_id' => 1, 'price' => 33990000],
            ['name' => 'Samsung Galaxy Z Fold 5', 'category_id' => 1, 'price' => 40990000],
            ['name' => 'Samsung Galaxy A55 5G', 'category_id' => 1, 'price' => 9990000],
            ['name' => 'Xiaomi Redmi Note 13 Pro', 'category_id' => 1, 'price' => 7490000],
            ['name' => 'Xiaomi 14 Ultra', 'category_id' => 1, 'price' => 23990000],
            ['name' => 'OPPO Reno 11 5G', 'category_id' => 1, 'price' => 9990000],
            ['name' => 'OPPO Find X7 Ultra', 'category_id' => 1, 'price' => 22990000],
            ['name' => 'Vivo V30 Pro 5G', 'category_id' => 1, 'price' => 12990000],
            ['name' => 'Realme GT 5 Pro', 'category_id' => 1, 'price' => 13990000],
            ['name' => 'Google Pixel 8 Pro', 'category_id' => 1, 'price' => 24990000],
            // Laptop (category_id = 2)
            ['name' => 'MacBook Air M3 15 inch', 'category_id' => 2, 'price' => 32990000],
            ['name' => 'MacBook Pro M3 Pro 14 inch', 'category_id' => 2, 'price' => 48990000],
            ['name' => 'Laptop Dell XPS 15 9530', 'category_id' => 2, 'price' => 42990000],
            ['name' => 'Laptop Asus ROG Strix G16', 'category_id' => 2, 'price' => 35990000],
            ['name' => 'Laptop HP Pavilion 15', 'category_id' => 2, 'price' => 15990000],
            ['name' => 'Laptop Acer Aspire 5 A515', 'category_id' => 2, 'price' => 12490000],
            ['name' => 'Laptop Lenovo ThinkPad X1 Carbon', 'category_id' => 2, 'price' => 38990000],
            ['name' => 'Laptop MSI Gaming GF63', 'category_id' => 2, 'price' => 18990000],
            ['name' => 'Laptop Asus Vivobook 15', 'category_id' => 2, 'price' => 11990000],
            ['name' => 'Laptop Dell Inspiron 16 Plus', 'category_id' => 2, 'price' => 24990000],
            // Tablet (category_id = 3)
            ['name' => 'iPad Pro M4 11 inch', 'category_id' => 3, 'price' => 28990000],
            ['name' => 'iPad Air M2 13 inch', 'category_id' => 3, 'price' => 20990000],
            ['name' => 'iPad Gen 10 WiFi 64GB', 'category_id' => 3, 'price' => 9490000],
            ['name' => 'Samsung Galaxy Tab S9 Ultra', 'category_id' => 3, 'price' => 27990000],
            ['name' => 'Samsung Galaxy Tab A9 Plus', 'category_id' => 3, 'price' => 7490000],
            ['name' => 'Xiaomi Pad 6 Pro', 'category_id' => 3, 'price' => 8990000],
            ['name' => 'Lenovo Tab P12 Pro', 'category_id' => 3, 'price' => 12990000],
            ['name' => 'OPPO Pad Air 2', 'category_id' => 3, 'price' => 6990000],
            // Phụ kiện (category_id = 4)
            ['name' => 'Tai nghe AirPods Pro 2 USB-C', 'category_id' => 4, 'price' => 6190000],
            ['name' => 'Tai nghe Sony WH-1000XM5', 'category_id' => 4, 'price' => 8490000],
            ['name' => 'Tai nghe Samsung Galaxy Buds 3 Pro', 'category_id' => 4, 'price' => 5490000],
            ['name' => 'Chuột Logitech G Pro X Superlight 2', 'category_id' => 4, 'price' => 3290000],
            ['name' => 'Chuột không dây Razer DeathAdder V3', 'category_id' => 4, 'price' => 2190000],
            ['name' => 'Bàn phím cơ Razer BlackWidow V4', 'category_id' => 4, 'price' => 4490000],
            ['name' => 'Bàn phím cơ Keychron K8 Pro', 'category_id' => 4, 'price' => 2490000],
            ['name' => 'Màn hình LG UltraWide 34 inch', 'category_id' => 4, 'price' => 12990000],
            ['name' => 'Màn hình Dell UltraSharp 27 4K', 'category_id' => 4, 'price' => 11490000],
            ['name' => 'Sạc dự phòng Anker 20000mAh', 'category_id' => 4, 'price' => 890000],
            ['name' => 'Ốp lưng iPhone 15 Pro Max MagSafe', 'category_id' => 4, 'price' => 1290000],
            ['name' => 'Cáp sạc nhanh USB-C 100W Baseus', 'category_id' => 4, 'price' => 350000],
            // Đồng hồ (category_id = 5)
            ['name' => 'Apple Watch Ultra 2 49mm', 'category_id' => 5, 'price' => 21990000],
            ['name' => 'Apple Watch Series 9 GPS 45mm', 'category_id' => 5, 'price' => 11490000],
            ['name' => 'Samsung Galaxy Watch 6 Classic', 'category_id' => 5, 'price' => 9990000],
            ['name' => 'Garmin Venu 3S', 'category_id' => 5, 'price' => 11990000],
            ['name' => 'Xiaomi Watch S3', 'category_id' => 5, 'price' => 3490000],
            ['name' => 'Huawei Watch GT 4 46mm', 'category_id' => 5, 'price' => 6490000],
            ['name' => 'Amazfit T-Rex Ultra', 'category_id' => 5, 'price' => 8990000],
            ['name' => 'Đồng hồ Fitbit Sense 2', 'category_id' => 5, 'price' => 7490000],
        ];

        $product = $this->faker->randomElement($products);

        $descriptions = [
            'Sản phẩm chính hãng, bảo hành 12 tháng toàn quốc. Hỗ trợ trả góp 0% lãi suất.',
            'Thiết kế sang trọng, hiệu năng mạnh mẽ. Miễn phí giao hàng toàn quốc.',
            'Sản phẩm mới 100%, nguyên seal. Tặng kèm phụ kiện chính hãng trị giá 500.000đ.',
            'Công nghệ tiên tiến, trải nghiệm vượt trội. Đổi trả miễn phí trong 30 ngày.',
            'Hàng nhập khẩu chính hãng, giá tốt nhất thị trường. Bảo hành 24 tháng.',
            'Hiệu năng flagship, giá cực kỳ cạnh tranh. Hỗ trợ kỹ thuật 24/7.',
            'Sản phẩm best-seller, được hàng triệu người dùng tin tưởng lựa chọn.',
            'Chất lượng cao cấp, thiết kế hiện đại. Phù hợp cho cả công việc và giải trí.',
        ];

        return [
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => $this->faker->numberBetween(1, 100),
            'content' => $this->faker->randomElement($descriptions),
            'category_id' => $product['category_id'],
        ];
    }
}

