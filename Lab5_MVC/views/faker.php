<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faker Demo - Lab5 MVC</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            padding: 20px;
        }

        .container {
            text-align: center;
            padding: 50px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
            max-width: 700px;
            width: 100%;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            background: linear-gradient(90deg, #f093fb, #f5576c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .subtitle {
            font-size: 1rem;
            color: #888;
            margin-bottom: 35px;
        }

        .fake-data {
            text-align: left;
            margin-bottom: 30px;
        }

        .data-card {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            animation: fadeIn 0.5s ease-out forwards;
            opacity: 0;
        }

        .data-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .data-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .data-card:nth-child(3) {
            animation-delay: 0.3s;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        .data-card:hover {
            transform: translateX(10px);
            border-color: rgba(240, 147, 251, 0.5);
            box-shadow: 0 10px 30px rgba(240, 147, 251, 0.2);
        }

        .data-label {
            font-size: 0.85rem;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .data-value {
            font-size: 1.3rem;
            font-weight: 600;
            color: #fff;
        }

        .icon-wrapper {
            display: inline-block;
            width: 40px;
            font-size: 1.5rem;
        }

        .refresh-btn {
            display: inline-block;
            padding: 15px 35px;
            background: linear-gradient(135deg, #f093fb, #f5576c);
            color: #fff;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(245, 87, 108, 0.3);
            margin-bottom: 20px;
        }

        .refresh-btn:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 15px 40px rgba(245, 87, 108, 0.4);
        }

        .nav-links {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .nav-links a {
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .nav-links a:hover {
            background: rgba(240, 147, 251, 0.3);
            border-color: #f093fb;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Faker Demo</h1>
        <p class="subtitle">Mỗi lần tải lại trang sẽ hiển thị dữ liệu ngẫu nhiên mới!</p>

        <div class="fake-data">
            <div class="data-card">
                <div class="data-label">Họ và Tên</div>
                <div class="data-value">
                    <?php echo htmlspecialchars($name); ?>
                </div>
            </div>

            <div class="data-card">
                <div class="data-label">Địa chỉ</div>
                <div class="data-value">
                    <?php echo htmlspecialchars($address); ?>
                </div>
            </div>

            <div class="data-card">
                <div class="data-label">Email</div>
                <div class="data-value">
                    <?php echo htmlspecialchars($email); ?>
                </div>
            </div>
        </div>

        <a href="index.php?page=faker" class="refresh-btn">Tạo Dữ Liệu Mới</a>

        <div class="nav-links">
            <a href="index.php?page=home">Trang Chủ</a>
            <a href="index.php?page=products">Sản Phẩm</a>
        </div>
    </div>
</body>

</html>