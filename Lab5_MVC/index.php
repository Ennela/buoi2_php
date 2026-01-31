<?php
/**
 * Lab5 MVC - Router chính
 * 
 * File này làm nhiệm vụ:
 * - Bài 1: Load Faker và tạo dữ liệu giả
 * - Bài 2: Sử dụng PSR-4 Autoload
 * - Bài 3 & 4: Mini Router chuyển hướng đến Controller
 */

// Load thư viện từ Composer
require 'vendor/autoload.php';

// Import các Controller
use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Models\Student;

// Router siêu đơn giản
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        // Bài 3: Gọi HomeController
        $controller = new HomeController();
        $controller->index();
        break;

    case 'faker':
        // Bài 1: Sử dụng Faker
        $faker = Faker\Factory::create('vi_VN');

        // Tạo dữ liệu giả
        $name = $faker->name();
        $address = $faker->address();
        $email = $faker->email();

        // Hiển thị View
        include 'views/faker.php';
        break;

    case 'products':
        // Bài 4: Gọi ProductController lấy dữ liệu từ DB
        $controller = new ProductController();
        $controller->listProducts();
        break;

    case 'student':
        // Bài 2: Test autoload namespace
        $student = new Student();
        echo "<h1>Test Autoload PSR-4</h1>";
        echo "<p>" . $student->getInfo() . "</p>";
        echo '<p><a href="index.php">Quay lại</a></p>';
        break;

    default:
        // 404 - Page Not Found
        http_response_code(404);
        ?>
        <!DOCTYPE html>
        <html lang="vi">

        <head>
            <meta charset="UTF-8">
            <title>404 - Không tìm thấy trang</title>
            <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
            <style>
                body {
                    font-family: 'Inter', sans-serif;
                    background-color: #0f0f0f;
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
                    background-color: #1a1a1a;
                    border-radius: 24px;
                    border: 1px solid #2a2a2a;
                    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
                }



                h1 {
                    font-size: 7rem;
                    margin: 0 0 10px;
                    color: #e94560;
                    letter-spacing: -3px;
                }

                p {
                    font-size: 1.3rem;
                    color: #666;
                    margin: 20px 0 30px;
                }

                .page-name {
                    color: #888;
                    background-color: #252525;
                    padding: 5px 15px;
                    border-radius: 8px;
                    font-family: monospace;
                }

                a {
                    display: inline-block;
                    padding: 16px 35px;
                    background-color: #e94560;
                    color: #fff;
                    text-decoration: none;
                    border-radius: 12px;
                    font-weight: 600;
                    transition: all 0.3s ease;
                    box-shadow: 0 10px 25px rgba(233, 69, 96, 0.25);
                }

                a:hover {
                    transform: translateY(-3px);
                    box-shadow: 0 15px 35px rgba(233, 69, 96, 0.35);
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
