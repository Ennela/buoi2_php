<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Bài 2: Danh sách sản phẩm với Blade Loops & Condition
     */
    public function list()
    {
        $products = [
            ['name' => 'iPhone 15 Pro Max', 'price' => 34990000],
            ['name' => 'Samsung Galaxy S24 Ultra', 'price' => 33990000],
            ['name' => 'Xiaomi Redmi Note 13', 'price' => 5490000],
            ['name' => 'OPPO Reno 11', 'price' => 9990000],
            ['name' => 'MacBook Air M3', 'price' => 27990000],
            ['name' => 'Laptop Acer Aspire 5', 'price' => 8990000],
            ['name' => 'Tai nghe AirPods Pro 2', 'price' => 6190000],
            ['name' => 'Chuột Logitech G Pro', 'price' => 2490000],
            ['name' => 'Màn hình LG UltraWide 34"', 'price' => 12990000],
            ['name' => 'Bàn phím cơ Razer', 'price' => 3490000],
        ];

        return view('products', compact('products'));
    }
}
