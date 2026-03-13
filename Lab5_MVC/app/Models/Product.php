<?php

namespace App\Models;

class Product extends BaseModel
{
    public function all(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM products ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function find(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $product = $stmt->fetch();
        return $product ?: null;
    }

    public function insert(array $data): bool
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO products (name, price, description, image) VALUES (:name, :price, :description, :image)"
        );
        return $stmt->execute([
            ':name' => $data['name'],
            ':price' => $data['price'],
            ':description' => $data['description'] ?? '',
            ':image' => $data['image'] ?? ''
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->pdo->prepare(
            "UPDATE products SET name = :name, price = :price, description = :description, image = :image WHERE id = :id"
        );
        return $stmt->execute([
            ':id' => $id,
            ':name' => $data['name'],
            ':price' => $data['price'],
            ':description' => $data['description'] ?? '',
            ':image' => $data['image'] ?? ''
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function search(string $keyword): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE name LIKE :keyword ORDER BY id DESC");
        $stmt->execute([':keyword' => '%' . $keyword . '%']);
        return $stmt->fetchAll();
    }
}
