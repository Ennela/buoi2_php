<?php
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../bai2/db_connect.php';


    $fullname = $_POST['fullname'];
    $student_code = $_POST['student_code'];
    $email = $_POST['email'];

    $sql = "INSERT INTO students (fullname, student_code, email)
            VALUES (:fullname, :student_code, :email)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':fullname' => $fullname,
        ':student_code' => $student_code,
        ':email' => $email
    ]);

    $message = "Thêm sinh viên thành công!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên</title>
</head>
<body>

<h2>Thêm sinh viên</h2>

<form method="post" action="">
    <div>
        <label>Họ tên:</label><br>
        <input type="text" name="fullname" required>
    </div>
    <br>
    <div>
        <label>Mã sinh viên:</label><br>
        <input type="text" name="student_code" required>
    </div>
    <br>
    <div>
        <label>Email:</label><br>
        <input type="email" name="email" required>
    </div>
    <br>
    <button type="submit">Thêm mới</button>
</form>

<?php if ($message !== ''): ?>
    <p style="color: green;"><?php echo $message; ?></p>
<?php endif; ?>

<p><em>Test: nhập fullname = Nguyễn Văn ' A → vẫn chạy bình thường.</em></p>

</body>
</html>
