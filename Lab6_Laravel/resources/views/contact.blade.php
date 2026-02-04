<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ - Laravel Lab</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            width: 100%;
        }

        h1 {
            color: #4a5568;
            margin-bottom: 30px;
            text-align: center;
            font-size: 2rem;
        }

        .contact-info {
            margin-bottom: 20px;
        }

        .contact-info p {
            padding: 15px;
            background: #f7fafc;
            border-radius: 10px;
            margin-bottom: 10px;
            color: #2d3748;
        }

        .contact-info strong {
            color: #667eea;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            text-decoration: none;
            margin-top: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>📞 Liên hệ với chúng tôi</h1>

        <div class="contact-info">
            <p><strong>📧 Email:</strong> contact@laravel-lab.com</p>
            <p><strong>📱 Điện thoại:</strong> 0123 456 789</p>
            <p><strong>📍 Địa chỉ:</strong> Đại học Điện Lực, Hà Nội</p>
            <p><strong>⏰ Giờ làm việc:</strong> 8:00 - 17:00 (Thứ 2 - Thứ 6)</p>
        </div>

        <div class="text-center">
            <a href="/" class="btn">← Quay lại trang chủ</a>
        </div>
    </div>
</body>

</html>