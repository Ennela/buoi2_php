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
            background: linear-gradient(135deg, #141e30, #243b55);
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
            margin-bottom: 15px;
            background: linear-gradient(90deg, #00c6ff, #0072ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .subtitle {
            color: #888;
            font-size: 1.1rem;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .product-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
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
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .product-card:hover {
            transform: translateY(-10px);
            border-color: rgba(0, 198, 255, 0.5);
            box-shadow: 0 20px 50px rgba(0, 198, 255, 0.2);
        }

        .product-image {
            height: 180px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
        }

        .product-content {
            padding: 25px;
        }

        .product-name {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: #fff;
        }

        .product-description {
            font-size: 0.95rem;
            color: #999;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(90deg, #00c6ff, #0072ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .product-id {
            font-size: 0.8rem;
            color: #666;
            margin-top: 10px;
        }

        .empty-state {
            text-align: center;
            padding: 80px 40px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 20px;
            border: 1px dashed rgba(255, 255, 255, 0.2);
        }

        .empty-state .icon {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .empty-state h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #888;
        }

        .empty-state p {
            color: #666;
        }

        .nav-links {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .nav-links a {
            padding: 12px 25px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .nav-links a:hover {
            background: rgba(0, 198, 255, 0.3);
            border-color: #00c6ff;
            transform: translateY(-3px);
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
                        <div class="product-image">
                        </div>
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
                            <div class="product-id">ID: #
                                <?php echo $product['id']; ?>
                            </div>
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
            <a href="index.php?page=products">Làm Mới</a>
        </div>
    </div>
</body>

</html>