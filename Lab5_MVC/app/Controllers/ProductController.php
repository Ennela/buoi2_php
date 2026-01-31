<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController
{
    private Product $productModel;
    private string $uploadDir = __DIR__ . '/../../uploads/';

    public function __construct()
    {
        $this->productModel = new Product();
        if (!is_dir($this->uploadDir)) {
            mkdir($this->uploadDir, 0755, true);
        }
    }

    public function index(): void
    {
        $products = $this->productModel->all();
        include __DIR__ . '/../../views/product_list.php';
    }

    public function show(int $id): void
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            $_SESSION['error'] = 'Không tìm thấy sản phẩm!';
            header('Location: index.php?page=products');
            exit;
        }

        include __DIR__ . '/../../views/product_detail.php';
    }

    public function create(): void
    {
        include __DIR__ . '/../../views/product_add.php';
    }

    public function store(): void
    {
        $errors = [];

        if (empty($_POST['name'])) {
            $errors[] = 'Tên sản phẩm không được để trống!';
        }

        if (empty($_POST['price']) || !is_numeric($_POST['price']) || $_POST['price'] < 0) {
            $errors[] = 'Giá sản phẩm phải là số dương!';
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
            header('Location: index.php?page=product-add');
            exit;
        }

        $imagePath = '';
        if (!empty($_FILES['image']['name'])) {
            $imagePath = $this->uploadImage($_FILES['image']);
            if ($imagePath === false) {
                $_SESSION['errors'] = ['Upload ảnh thất bại! Chỉ chấp nhận file JPG, PNG, GIF, WEBP (tối đa 5MB)'];
                $_SESSION['old'] = $_POST;
                header('Location: index.php?page=product-add');
                exit;
            }
        }

        $data = [
            'name' => trim($_POST['name']),
            'price' => (float) $_POST['price'],
            'description' => trim($_POST['description'] ?? ''),
            'image' => $imagePath
        ];

        if ($this->productModel->insert($data)) {
            $_SESSION['success'] = 'Thêm sản phẩm thành công!';
        } else {
            $_SESSION['error'] = 'Có lỗi xảy ra, vui lòng thử lại!';
        }

        header('Location: index.php?page=products');
        exit;
    }

    public function edit(int $id): void
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            $_SESSION['error'] = 'Không tìm thấy sản phẩm!';
            header('Location: index.php?page=products');
            exit;
        }

        include __DIR__ . '/../../views/product_edit.php';
    }

    public function update(int $id): void
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            $_SESSION['error'] = 'Không tìm thấy sản phẩm!';
            header('Location: index.php?page=products');
            exit;
        }

        $errors = [];

        if (empty($_POST['name'])) {
            $errors[] = 'Tên sản phẩm không được để trống!';
        }

        if (empty($_POST['price']) || !is_numeric($_POST['price']) || $_POST['price'] < 0) {
            $errors[] = 'Giá sản phẩm phải là số dương!';
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
            header("Location: index.php?page=product-edit&id=$id");
            exit;
        }

        $imagePath = $product['image'] ?? '';

        if (!empty($_FILES['image']['name'])) {
            $newImagePath = $this->uploadImage($_FILES['image']);
            if ($newImagePath === false) {
                $_SESSION['errors'] = ['Upload ảnh thất bại! Chỉ chấp nhận file JPG, PNG, GIF, WEBP (tối đa 5MB)'];
                $_SESSION['old'] = $_POST;
                header("Location: index.php?page=product-edit&id=$id");
                exit;
            }
            if (!empty($product['image']) && file_exists($this->uploadDir . basename($product['image']))) {
                unlink($this->uploadDir . basename($product['image']));
            }
            $imagePath = $newImagePath;
        }

        $data = [
            'name' => trim($_POST['name']),
            'price' => (float) $_POST['price'],
            'description' => trim($_POST['description'] ?? ''),
            'image' => $imagePath
        ];

        if ($this->productModel->update($id, $data)) {
            $_SESSION['success'] = 'Cập nhật sản phẩm thành công!';
        } else {
            $_SESSION['error'] = 'Có lỗi xảy ra, vui lòng thử lại!';
        }

        header('Location: index.php?page=products');
        exit;
    }

    public function destroy(int $id): void
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            $_SESSION['error'] = 'Không tìm thấy sản phẩm!';
            header('Location: index.php?page=products');
            exit;
        }

        if (!empty($product['image']) && file_exists($this->uploadDir . basename($product['image']))) {
            unlink($this->uploadDir . basename($product['image']));
        }

        if ($this->productModel->delete($id)) {
            $_SESSION['success'] = 'Xóa sản phẩm thành công!';
        } else {
            $_SESSION['error'] = 'Có lỗi xảy ra, vui lòng thử lại!';
        }

        header('Location: index.php?page=products');
        exit;
    }

    public function search(): void
    {
        $keyword = trim($_GET['keyword'] ?? '');
        $products = $this->productModel->search($keyword);
        $isSearch = true;
        include __DIR__ . '/../../views/product_list.php';
    }

    private function uploadImage(array $file): string|false
    {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $maxSize = 5 * 1024 * 1024;

        if (!in_array($file['type'], $allowedTypes)) {
            return false;
        }

        if ($file['size'] > $maxSize) {
            return false;
        }

        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = uniqid('product_') . '.' . strtolower($extension);
        $destination = $this->uploadDir . $filename;

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return 'uploads/' . $filename;
        }

        return false;
    }
}
