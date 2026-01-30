<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ - Lab5 MVC</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .container {
            text-align: center;
            padding: 40px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(90deg, #e94560, #f39c12, #9b59b6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .message {
            font-size: 1.3rem;
            color: #f0f0f0;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .student-info {
            background: linear-gradient(135deg, #e94560, #9b59b6);
            padding: 20px 30px;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 500;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(233, 69, 96, 0.3);
            transition: transform 0.3s ease;
        }

        .student-info:hover {
            transform: translateY(-5px);
        }

        .nav-links {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .nav-links a {
            display: inline-block;
            padding: 12px 25px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .nav-links a:hover {
            background: rgba(233, 69, 96, 0.5);
            border-color: #e94560;
            transform: translateY(-3px);
        }

        .icon {
            font-size: 3rem;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">

        <h1>Lab5 - Mini MVC</h1>
        <p class="message">
            <?php echo htmlspecialchars($message); ?>
        </p>

        <div class="student-info">
            <?php echo htmlspecialchars($studentInfo); ?>
        </div>

        <div class="nav-links">
            <a href="index.php?page=home">Trang Chủ</a>
            <a href="index.php?page=faker">Faker Demo</a>
            <a href="index.php?page=products">Sản Phẩm</a>
        </div>
    </div>
</body>

</html>