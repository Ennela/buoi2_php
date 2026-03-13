<?php
session_start();

$products = [
    101 => 'Bàn phím A',
    102 => 'Chuột B',
    103 => 'Tai nghe C',
    104 => 'USB D'
];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Xử lý thêm vào giỏ
if (isset($_GET['add_id'])) {
    $add_id = (int) $_GET['add_id'];

    if (array_key_exists($add_id, $products)) {
        $_SESSION['cart'][] = $add_id;
    }
    header('Location: cart.php');
    exit;

}

$cart_ids = $_SESSION['cart'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cart (Session Array)</title>
    <style>
        .box {
            width: 650px;
            padding: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 12px;
        }

        th,
        td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
        }

        a.btn {
            display: inline-block;
            padding: 6px 10px;
            border: 1px solid #333;
            border-radius: 6px;
            text-decoration: none;
        }

        .muted {
            color: #666;
        }
    </style>
</head>

<body>
    <h2>Giỏ hàng đơn giản (Session Array)</h2>

    <div class="box">
        <h3>Danh sách sản phẩm</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Hành động</th>
            </tr>
            <?php foreach ($products as $id => $name): ?>
                <tr>
                    <td>
                        <?php echo htmlspecialchars((string) $id); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($name); ?>
                    </td>
                    <td><a class="btn" href="cart.php?add_id=<?php echo urlencode((string) $id); ?>">Thêm vào giỏ</a></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h3>Giỏ hiện tại</h3>
        <?php if (count($cart_ids) === 0): ?>
            <p class="muted">Chưa có sản phẩm nào.</p>
        <?php else: ?>
            <p>Các ID đã chọn: <strong>
                    <?php echo htmlspecialchars(implode(', ', $cart_ids)); ?>
                </strong></p>
        <?php endif; ?>
        <p>
            <a class="btn" href="../bai3/dashboard.php">Về Dashboard</a>
            <a class="btn" href="../bai3/logout.php">Đăng xuất</a>
        </p>
    </div>
</body>

</html>