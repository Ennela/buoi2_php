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
            background-color: #0f0f0f;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .container {
            text-align: center;
            padding: 50px;
            background-color: #1a1a1a;
            border-radius: 24px;
            border: 1px solid #2a2a2a;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
            max-width: 650px;
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
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #fff;
            letter-spacing: -1px;
        }

        .accent {
            color: #e94560;
        }

        .message {
            font-size: 1.2rem;
            color: #888;
            margin-bottom: 30px;
            line-height: 1.7;
        }

        .student-info {
            background-color: #e94560;
            padding: 22px 35px;
            border-radius: 16px;
            font-size: 1.15rem;
            font-weight: 500;
            margin-bottom: 35px;
            box-shadow: 0 10px 30px rgba(233, 69, 96, 0.25);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .student-info:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(233, 69, 96, 0.35);
        }

        .nav-links {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .nav-links a {
            display: inline-block;
            padding: 14px 28px;
            background-color: #252525;
            color: #fff;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: 1px solid #333;
        }

        .nav-links a:hover {
            background-color: #e94560;
            border-color: #e94560;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(233, 69, 96, 0.3);
        }

        .nav-links a.active {
            background-color: #e94560;
            border-color: #e94560;
        }
    </style>
</head>

<body>
    <div class="container">

        <h1>Lab5 <span class="accent">Mini MVC</span></h1>
        <p class="message">
            <?php echo htmlspecialchars($message); ?>
        </p>

        <div class="student-info">
            <?php echo htmlspecialchars($studentInfo); ?>
        </div>

        <div class="nav-links">
            <a href="index.php?page=home" class="active">Trang Chủ</a>
            <a href="index.php?page=faker">Faker Demo</a>
            <a href="index.php?page=products">Sản Phẩm</a>
        </div>
    </div>
</body>

</html>