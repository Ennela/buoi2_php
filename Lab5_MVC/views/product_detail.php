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
            background: linear-gradient(135deg, #141e30, #243b55);
            min-height: 100vh;
            color: #fff;
            padding: 40px 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #888;
            text-decoration: none;
            margin-bottom: 30px;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: #00c6ff;
        }

        .product-detail {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.1);
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
            height: 300px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 8rem;
        }

        .product-content {
            padding: 40px;
        }

        .product-id {
            display: inline-block;
            padding: 6px 12px;
            background: rgba(0, 198, 255, 0.2);
            border-radius: 20px;
            font-size: 0.85rem;
            color: #00c6ff;
            margin-bottom: 15px;
        }

        .product-name {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(90deg, #00c6ff, #0072ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .product-price {
            font-size: 2rem;
            font-weight: 600;
            color: #00c6ff;
            margin-bottom: 25px;
        }

        .product-description {
            font-size: 1.1rem;
            color: #aaa;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .product-meta {
            display: flex;
            gap: 30px;
            padding-top: 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.9rem;
            color: #666;
        }

        .meta-item {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .meta-label {
            color: #888;
        }

        .meta-value {
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="index.php?page=products" class="back-link">← Quay lại danh sách</a>

        <div class="product-detail">
            <div class="product-image"></div>
            <div class="product-content">
                <span class="product-id">ID: #
                    <?php echo $product['id']; ?>
                </span>
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
            </div>
        </div>
    </div>
</body>

</html>