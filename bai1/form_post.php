<?php
$name = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form POST</title>
</head>
<body>

<h2>Form đăng ký (POST)</h2>

<form method="post" action="">
    <div>
        <label>Tên:</label><br>
        <input type="text" name="name" required>
    </div>
    <br>
    <div>
        <label>Mật khẩu:</label><br>
        <input type="password" name="password" required>
    </div>
    <br>
    <button type="submit">Đăng ký</button>
</form>

<?php if ($name !== ''): ?>
    <p>Đã nhận thông tin của <strong><?php echo htmlspecialchars($name); ?></strong></p>
<?php endif; ?>

</body>
</html>
