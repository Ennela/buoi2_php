<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Điện thoại', 'description' => 'Các loại điện thoại thông minh', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Laptop', 'description' => 'Máy tính xách tay các hãng', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tablet', 'description' => 'Máy tính bảng', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Phụ kiện', 'description' => 'Phụ kiện công nghệ', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Đồng hồ', 'description' => 'Đồng hồ thông minh', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
