<?php

namespace App\Models;

use PDO;
use PDOException;

class BaseModel
{
    protected PDO $pdo;

    protected string $host = 'localhost';
    protected string $dbname = 'buoi2_php';
    protected string $username = 'root';
    protected string $password = '';

    public function __construct()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4",
                $this->username,
                $this->password
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Hệ thống đang bảo trì, vui lòng quay lại sau. Lỗi: " . $e->getMessage());
        }
    }

    protected function getConnection(): PDO
    {
        return $this->pdo;
    }
}
