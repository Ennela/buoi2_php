<?php

session_start();

require 'vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Models\Student;

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;

    case 'faker':
        $faker = Faker\Factory::create('vi_VN');
        $name = $faker->name();
        $address = $faker->address();
        $email = $faker->email();
        include 'views/faker.php';
        break;

    case 'student':
        $student = new Student();
        echo "<h1>Test Autoload PSR-4</h1>";
        echo "<p>" . $student->getInfo() . "</p>";
        echo '<p><a href="index.php">Quay lại</a></p>';
        break;

    case 'products':
        $controller = new ProductController();
        $controller->index();
        break;

    case 'product-detail':
        $id = (int) ($_GET['id'] ?? 0);
        $controller = new ProductController();
        $controller->show($id);
        break;

    case 'product-add':
        $controller = new ProductController();
        $controller->create();
        break;

    case 'product-store':
        $controller = new ProductController();
        $controller->store();
        break;

    case 'product-edit':
        $id = (int) ($_GET['id'] ?? 0);
        $controller = new ProductController();
        $controller->edit($id);
        break;

    case 'product-update':
        $id = (int) ($_GET['id'] ?? 0);
        $controller = new ProductController();
        $controller->update($id);
        break;

    case 'product-delete':
        $id = (int) ($_GET['id'] ?? 0);
        $controller = new ProductController();
        $controller->destroy($id);
        break;

    case 'product-search':
        $controller = new ProductController();
        $controller->search();
        break;

    default:
        http_response_code(404);
        ?>
                <!DOCTYPE html>
                <html lang="vi">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>404 - Không tìm thấy trang</title>
                    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
                    <style>
                        :root {
                            --primary-color: #6366f1;
                            --dark-bg: #0f0f14;
                            --card-bg: #18181f;
                            --border-color: #2d2d3a;
                            --danger-color: #ef4444;
                        }
                        body {
                            font-family: 'Inter', sans-serif;
                            background-color: var(--dark-bg);
                            min-height: 100vh;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            color: #fff;
                            margin: 0;
                        }
                        .container {
                            text-align: center;
                            padding: 60px;
                            background-color: var(--card-bg);
                            border-radius: 24px;
                            border: 1px solid var(--border-color);
                            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
                            max-width: 500px;
                        }
                        h1 {
                            font-size: 7rem;
                            margin: 0 0 10px;
                            background: linear-gradient(135deg, var(--danger-color), #f97316);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            background-clip: text;
                            letter-spacing: -3px;
                        }
                        p {
                            font-size: 1.2rem;
                            color: #94a3b8;
                            margin: 20px 0 30px;
                        }
                        .page-name {
                            color: #f8fafc;
                            background-color: var(--border-color);
                            padding: 5px 15px;
                            border-radius: 8px;
                            font-family: monospace;
                        }
                        a {
                            display: inline-block;
                            padding: 16px 35px;
                            background: linear-gradient(135deg, var(--primary-color), #8b5cf6);
                            color: #fff;
                            text-decoration: none;
                            border-radius: 12px;
                            font-weight: 600;
                            transition: all 0.3s ease;
                            box-shadow: 0 10px 25px rgba(99, 102, 241, 0.25);
                        }
                        a:hover {
                            transform: translateY(-3px);
                            box-shadow: 0 15px 35px rgba(99, 102, 241, 0.35);
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <h1>404</h1>
                        <p>Không tìm thấy trang <span class="page-name"><?php echo htmlspecialchars($page); ?></span></p>
                        <a href="index.php?page=home">Quay về Trang Chủ</a>
                    </div>
                </body>
                </html>
                <?php
                break;
}
