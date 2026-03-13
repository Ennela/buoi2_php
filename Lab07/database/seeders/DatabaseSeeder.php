<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Gọi CategorySeeder để tạo 5 danh mục
        $this->call(CategorySeeder::class);

        // Tạo 50 sản phẩm giả bằng Factory
        Product::factory(50)->create();
    }
}
