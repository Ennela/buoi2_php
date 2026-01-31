<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo htmlspecialchars($product['name']); ?> - Lab5 MVC
    </title>
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
            max-width: 850px;
            margin: 0 auto;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #666;
            text-decoration: none;
            margin-bottom: 35px;
            padding: 12px 20px;
            background-color: #1a1a1a;
            border-radius: 12px;
            border: 1px solid #2a2a2a;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .back-link:hover {
            color: #3498db;
            border-color: #3498db;
            transform: translateX(-5px);
        }

        .product-detail {
            background-color: #1a1a1a;
            border-radius: 28px;
            border: 1px solid #2a2a2a;
            overflow: hidden;
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .product-image {
            height: 320px;
            background-color: #222;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 8rem;
            position: relative;
        }

        .product-image::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 5px;
            background-color: #3498db;
        }

        .product-content {
            padding: 45px;
        }

        .product-id {
            display: inline-block;
            padding: 8px 16px;
            background-color: rgba(52, 152, 219, 0.15);
            border-radius: 25px;
            font-size: 0.9rem;
            color: #3498db;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .product-name {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 25px;
            color: #fff;
            letter-spacing: -1px;
            line-height: 1.2;
        }

        .product-price {
            font-size: 2.2rem;
            font-weight: 700;
            color: #3498db;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .product-price::before {
            content: '';
            width: 8px;
            height: 35px;
            background-color: #3498db;
            border-radius: 4px;
        }

        .product-description {
            font-size: 1.15rem;
            color: #888;
            line-height: 1.9;
            margin-bottom: 35px;
            padding-left: 20px;
            border-left: 3px solid #333;
        }

        .product-meta {
            display: flex;
            gap: 40px;
            padding-top: 30px;
            border-top: 1px solid #2a2a2a;
            font-size: 0.95rem;
        }

        .meta-item {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .meta-label {
            color: #555;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
        }

        .meta-value {
            color: #ccc;
            font-weight: 500;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 35px;
        }

        .btn {
            padding: 16px 32px;
            border-radius: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #3498db;
            color: #fff;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(52, 152, 219, 0.3);
        }

        .btn-secondary {
            background-color: #252525;
            color: #fff;
            border: 1px solid #333;
        }

        .btn-secondary:hover {
            background-color: #333;
            transform: translateY(-3px);
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="index.php?page=products" class="back-link">← Quay lại danh sách</a>

        <div class="product-detail">
            <div class="product-image"></div>
            <div class="product-content">
                <span class="product-id">ID: #<?php echo $product['id']; ?></span>
                <h1 class="product-name">
                    <?php echo htmlspecialchars($product['name']); ?>
                </h1>
                <div class="product-price">
                    <?php echo number_format($product['price'], 0, ',', '.'); ?> VNĐ
                </div>
                <p class="product-description">
                    <?php echo nl2br(htmlspecialchars($product['description'] ?? 'Không có mô tả chi tiết cho sản phẩm này.')); ?>
                </p>

                <?php if (isset($product['created_at'])): ?>
                    <div class="product-meta">
                        <div class="meta-item">
                            <span class="meta-label">Ngày tạo</span>
                            <span class="meta-value">
                                <?php echo $product['created_at']; ?>
                            </span>
                        </div>
                        <?php if (isset($product['updated_at'])): ?>
                            <div class="meta-item">
                                <span class="meta-label">Cập nhật lần cuối</span>
                                <span class="meta-value">
                                    <?php echo $product['updated_at']; ?>
                                </span>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="action-buttons">
                    <a href="index.php?page=products" class="btn btn-primary">Xem tất cả sản phẩm</a>
                    <a href="index.php?page=home" class="btn btn-secondary">Về trang chủ</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>