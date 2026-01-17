<?php
include '../bai2/db_connect.php';

$sql = "SELECT * FROM students";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: blue;
        }
    </style>
</head>
<body>

<h2>Danh sách sinh viên</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Họ tên</th>
        <th>Mã SV</th>
        <th>Email</th>
        <th>Hành động</th>
    </tr>

    <?php foreach ($students as $student): ?>
        <tr>
            <td><?php echo htmlspecialchars($student['id']); ?></td>
            <td><?php echo htmlspecialchars($student['fullname']); ?></td>
            <td><?php echo htmlspecialchars($student['student_code']); ?></td>
            <td><?php echo htmlspecialchars($student['email']); ?></td>
            <td>
                <a href="#">Sửa</a> | <a href="#">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
