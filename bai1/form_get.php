<?php
$keyword = '';
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form GET</title>
</head>
<body>

<h2>Form tìm kiếm (GET)</h2>

<form method="get" action="">
    <input type="text" name="keyword" placeholder="Nhập từ khóa">
    <button type="submit">Tìm kiếm</button>
</form>

<?php if ($keyword !== ''): ?>
    <p>Bạn đang tìm kiếm từ khóa: <strong><?php echo htmlspecialchars($keyword); ?></strong></p>
<?php endif; ?>

</body>
</html>
