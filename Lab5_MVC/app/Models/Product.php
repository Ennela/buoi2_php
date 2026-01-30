<?php

namespace App\Models;

class Product extends BaseModel
{
    public function getAllProducts(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM products ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function getProductById(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $product = $stmt->fetch();
        return $product ?: null;
    }

    public function addProduct(string $name, float $price, string $description = ''): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO products (name, price, description) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $price, $description]);
    }

    public function updateProduct(int $id, string $name, float $price, string $description = ''): bool
    {
        $stmt = $this->pdo->prepare("UPDATE products SET name = ?, price = ?, description = ? WHERE id = ?");
        return $stmt->execute([$name, $price, $description, $id]);
    }

    public function deleteProduct(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
