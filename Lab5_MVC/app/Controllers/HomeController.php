<?php

namespace App\Controllers;

use App\Models\Student;

class HomeController
{
    public function index(): void
    {
        // 1. Chuẩn bị dữ liệu (Giả lập Model)
        $message = "Chào mừng đến với MVC!";
        $studentInfo = (new Student())->getInfo();

        // 2. Gọi View và truyền dữ liệu
        include __DIR__ . '/../../views/home.php';
    }
}
