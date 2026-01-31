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
            background-color: #0f0f0f;
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
            background-color: #1a1a1a;
            border-radius: 24px;
            border: 1px solid #2a2a2a;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5);
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
            margin-bottom: 12px;
            color: #fff;
            letter-spacing: -0.5px;
        }

        .subtitle {
            font-size: 1rem;
            color: #666;
            margin-bottom: 40px;
        }

        .fake-data {
            text-align: left;
            margin-bottom: 35px;
        }

        .data-card {
            background-color: #222;
            border-radius: 16px;
            padding: 25px 28px;
            margin-bottom: 15px;
            border: 1px solid #333;
            transition: all 0.3s ease;
            animation: fadeIn 0.5s ease-out forwards;
            opacity: 0;
            position: relative;
            overflow: hidden;
        }

        .data-card::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background-color: #9b59b6;
        }

        .data-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .data-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .data-card:nth-child(2)::before {
            background-color: #3498db;
        }

        .data-card:nth-child(3) {
            animation-delay: 0.3s;
        }

        .data-card:nth-child(3)::before {
            background-color: #2ecc71;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        .data-card:hover {
            transform: translateX(8px);
            border-color: #444;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .data-label {
            font-size: 0.8rem;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .data-value {
            font-size: 1.25rem;
            font-weight: 600;
            color: #fff;
        }

        .refresh-btn {
            display: inline-block;
            padding: 16px 40px;
            background-color: #9b59b6;
            color: #fff;
            text-decoration: none;
            border-radius: 14px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(155, 89, 182, 0.25);
            margin-bottom: 25px;
        }

        .refresh-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(155, 89, 182, 0.35);
            background-color: #8e44ad;
        }

        .nav-links {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        .nav-links a {
            padding: 12px 22px;
            background-color: #252525;
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            border: 1px solid #333;
        }

        .nav-links a:hover {
            background-color: #9b59b6;
            border-color: #9b59b6;
            transform: translateY(-2px);
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