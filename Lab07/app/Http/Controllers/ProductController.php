<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Bài 4 (Buổi 8): Hiển thị 50 sản phẩm từ Database
     * Giao diện e-commerce card grid
     */
    public function list()
    {
        // Lấy tất cả danh mục
        $categories = Category::all();

        // Lấy tất cả sản phẩm
        $products = Product::all();

        // Nhóm sản phẩm theo category_id
        $groupedProducts = $products->groupBy('category_id');

        return view('products', compact('categories', 'products', 'groupedProducts'));
    }
}
