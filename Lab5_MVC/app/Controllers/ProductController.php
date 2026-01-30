<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController
{
    private Product $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function listProducts(): void
    {
        // 1. Lấy dữ liệu từ Model
        $products = $this->productModel->getAllProducts();

        // 2. Gọi View và truyền dữ liệu
        include __DIR__ . '/../../views/product_list.php';
    }

    public function showProduct(int $id): void
    {
        $product = $this->productModel->getProductById($id);

        if (!$product) {
            echo "Không tìm thấy sản phẩm!";
            return;
        }

        include __DIR__ . '/../../views/product_detail.php';
    }
}
