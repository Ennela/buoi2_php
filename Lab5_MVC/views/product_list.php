<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sản Phẩm - Lab5 MVC</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #0f0f0f;
            min-height: 100vh;
            color: #fff;
            padding: 40px 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        header {
            text-align: center;
            margin-bottom: 50px;
            animation: fadeDown 0.6s ease-out;
        }

        @keyframes fadeDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }



        h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 12px;
            color: #fff;
            letter-spacing: -1px;
        }

        .subtitle {
            color: #666;
            font-size: 1.1rem;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            margin-bottom: 50px;
        }

        .product-card {
            background-color: #1a1a1a;
            border-radius: 20px;
            border: 1px solid #2a2a2a;
            overflow: hidden;
            transition: all 0.4s ease;
            animation: scaleIn 0.5s ease-out forwards;
            opacity: 0;
        }

        .product-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .product-card:nth-child(2) {
            animation-delay: 0.15s;
        }

        .product-card:nth-child(3) {
            animation-delay: 0.2s;
        }

        .product-card:nth-child(4) {
            animation-delay: 0.25s;
        }

        .product-card:nth-child(5) {
            animation-delay: 0.3s;
        }

        .product-card:nth-child(6) {
            animation-delay: 0.35s;
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .product-card:hover {
            transform: translateY(-10px);
            border-color: #3498db;
            box-shadow: 0 25px 50px rgba(52, 152, 219, 0.15);
        }

        .product-image {
            height: 180px;
            background-color: #252525;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            position: relative;
        }

        .product-image::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 20px;
            right: 20px;
            height: 4px;
            background-color: #3498db;
            border-radius: 4px 4px 0 0;
        }

        .product-content {
            padding: 28px;
        }

        .product-name {
            font-size: 1.35rem;
            font-weight: 600;
            margin-bottom: 12px;
            color: #fff;
        }

        .product-description {
            font-size: 0.95rem;
            color: #777;
            margin-bottom: 18px;
            line-height: 1.6;
        }

        .product-price {
            font-size: 1.6rem;
            font-weight: 700;
            color: #3498db;
        }

        .product-id {
            font-size: 0.8rem;
            color: #555;
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid #2a2a2a;
        }

        .empty-state {
            text-align: center;
            padding: 80px 40px;
            background-color: #1a1a1a;
            border-radius: 24px;
            border: 2px dashed #2a2a2a;
        }

        .empty-state .icon {
            font-size: 4rem;
            margin-bottom: 25px;
            opacity: 0.4;
        }

        .empty-state h2 {
            font-size: 1.5rem;
            margin-bottom: 12px;
            color: #666;
        }

        .empty-state p {
            color: #555;
        }

        .nav-links {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .nav-links a {
            padding: 14px 28px;
            background-color: #1a1a1a;
            color: #fff;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: 1px solid #2a2a2a;
        }

        .nav-links a:hover {
            background-color: #3498db;
            border-color: #3498db;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(52, 152, 219, 0.25);
        }

        .nav-links a.primary {
            background-color: #3498db;
            border-color: #3498db;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>

            <h1>Danh Sách Sản Phẩm</h1>
            <p class="subtitle">Dữ liệu được lấy từ Database (Lab 2)</p>
        </header>

        <?php if (!empty($products)): ?>
            <div class="products-grid">
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <div class="product-image"></div>
                        <div class="product-content">
                            <h3 class="product-name">
                                <?php echo htmlspecialchars($product['name']); ?>
                            </h3>
                            <p class="product-description">
                                <?php echo htmlspecialchars($product['description'] ?? 'Không có mô tả'); ?>
                            </p>
                            <div class="product-price">
                                <?php echo number_format($product['price'], 0, ',', '.'); ?> VNĐ
                            </div>
                            <div class="product-id">ID: #<?php echo $product['id']; ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="empty-state">

                <h2>Chưa có sản phẩm nào</h2>
                <p>Hãy thêm sản phẩm vào bảng products trong database buoi2_php</p>
            </div>
        <?php endif; ?>

        <div class="nav-links">
            <a href="index.php?page=home">Trang Chủ</a>
            <a href="index.php?page=faker">Faker Demo</a>
            <a href="index.php?page=products" class="primary">Làm Mới</a>
        </div>
    </div>
</body>

</html>