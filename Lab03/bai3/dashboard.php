<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: /../bai2/login.php');
    exit;
}

$email = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        .box {
            width: 520px;
            padding: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        a.btn {
            display: inline-block;
            padding: 8px 12px;
            border: 1px solid #333;
            border-radius: 6px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <h2>Dashboard (Trang quản trị)</h2>

    <div class="box">
        <p>Xin chào, <strong>
                <?php echo htmlspecialchars($email); ?>
            </strong></p>
        <a class="btn" href="logout.php">Đăng xuất</a>
        <a class="btn" href="../bai4/cart.php">Giỏ hàng (Challenge)</a>
    </div>

    <p><em>Test Incognito: mở dashboard.php nếu tự nhảy về login.php là đúng.</em></p>
</body>

</html>