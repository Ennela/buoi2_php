<?php
session_start();
require __DIR__ . '/../../Lab02/bai2/db_connect.php';

$error = '';

if (isset($_SESSION['user'])) {
    header('Location: ../bai3/dashboard.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password_input = $_POST['password'] ?? '';
    $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password_input, $user['password'])) {
        $_SESSION['user'] = $user['email'];
        header('Location: /../bai3/dashboard.php');
        exit;
    } else {
        $error = 'Sai email hoặc mật khẩu';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        .box {
            width: 360px;
            padding: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .row {
            margin-bottom: 12px;
        }

        input {
            width: 100%;
            padding: 8px;
        }

        button {
            padding: 8px 12px;
        }

        .err {
            color: red;
        }
    </style>
</head>

<body>
    <h2>Đăng nhập</h2>

    <div class="box">
        <?php if ($error): ?>
            <p class="err"><?php echo htmlspecialchars($error); ?></p><?php endif; ?>

        <form method="post" action="">
            <div class="row">
                <label>Email</label><br>
                <input type="email" name="email" required>
            </div>
            <div class="row">
                <label>Password</label><br>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Đăng nhập</button>
        </form>

        <p><a href="../bai1/register.php">Chưa có tài khoản? Đăng ký</a></p>
    </div>
</body>

</html>