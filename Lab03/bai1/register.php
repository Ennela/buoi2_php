<?php
require __DIR__ . '/../../Lab02/bai2/db_connect.php';


$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password_input = $_POST['password'] ?? '';

    if ($email === '' || $password_input === '') {
        $error = 'Vui lòng nhập đầy đủ Email và Password.';
    } else {
        $password_hash = password_hash($password_input, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':email' => $email,
                ':password' => $password_hash
            ]);
            $message = 'Đăng ký thành công! Bạn có thể đăng nhập.';
        } catch (PDOException $e) {
            // Trường hợp email bị trùng
            $error = 'Email đã tồn tại, vui lòng dùng email khác.';
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Register</title>
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

        .ok {
            color: green;
        }

        .err {
            color: red;
        }
    </style>
</head>

<body>
    <h2>Đăng ký tài khoản</h2>

    <div class="box">
        <?php if ($message): ?>
            <p class="ok">
                <?php echo htmlspecialchars($message); ?>
            </p>
        <?php endif; ?>
        <?php if ($error): ?>
            <p class="err">
                <?php echo htmlspecialchars($error); ?>
            </p>
        <?php endif; ?>

        <form method="post" action="">
            <div class="row">
                <label>Email</label><br>
                <input type="email" name="email" required>
            </div>
            <div class="row">
                <label>Password</label><br>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Đăng ký</button>
        </form>

        <p><a href="../bai2/login.php">Đã có tài khoản? Đăng nhập</a></p>
    </div>
</body>

</html>