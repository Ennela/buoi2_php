<?php $pageTitle = 'Sửa Sản Phẩm - Lab5 MVC'; ?>
<?php include __DIR__ . '/layouts/header.php'; ?>

<div class="page-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=products" class="text-decoration-none">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sửa:
                <?php echo htmlspecialchars($product['name']); ?></li>
        </ol>
    </nav>
    <h1 class="page-title">Sửa Sản Phẩm</h1>
    <p class="page-subtitle">Cập nhật thông tin sản phẩm #<?php echo $product['id']; ?></p>
</div>

<?php if (!empty($_SESSION['errors'])): ?>
    <div class="alert alert-danger fade-in" role="alert">
        <strong>Có lỗi xảy ra:</strong>
        <ul class="mb-0 mt-2">
            <?php foreach ($_SESSION['errors'] as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php unset($_SESSION['errors']); ?>
<?php endif; ?>

<div class="card fade-in">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Thông Tin Sản Phẩm</h5>
        <span class="badge bg-primary">ID: #<?php echo $product['id']; ?></span>
    </div>
    <div class="card-body">
        <form action="index.php?page=product-update&id=<?php echo $product['id']; ?>" method="POST"
            enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">
                        Tên sản phẩm <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="<?php echo htmlspecialchars($_SESSION['old']['name'] ?? $product['name']); ?>"
                        placeholder="Nhập tên sản phẩm..." required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label">
                        Giá (VNĐ) <span class="text-danger">*</span>
                    </label>
                    <input type="number" class="form-control" id="price" name="price"
                        value="<?php echo htmlspecialchars($_SESSION['old']['price'] ?? $product['price']); ?>"
                        placeholder="Nhập giá sản phẩm..." min="0" step="1000" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh sản phẩm</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                <div class="form-text text-secondary">
                    Chấp nhận file JPG, PNG, GIF, WEBP (tối đa 5MB). Để trống nếu không muốn thay đổi ảnh.
                </div>
            </div>

            <div class="mb-3">
                <div id="imagePreview" style="<?php echo !empty($product['image']) ? '' : 'display: none;'; ?>">
                    <p class="text-secondary mb-2">Ảnh hiện tại:</p>
                    <img id="previewImg" src="<?php echo htmlspecialchars($product['image'] ?? ''); ?>" alt="Preview"
                        style="max-height: 150px; border-radius: 8px; border: 2px solid var(--border-color);">
                </div>
            </div>

            <div class="mb-4">
                <label for="description" class="form-label">Mô tả sản phẩm</label>
                <textarea class="form-control" id="description" name="description" rows="4"
                    placeholder="Nhập mô tả chi tiết về sản phẩm..."><?php echo htmlspecialchars($_SESSION['old']['description'] ?? $product['description'] ?? ''); ?></textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-warning">Cập Nhật</button>
                <a href="index.php?page=products" class="btn btn-outline-light">Hủy Bỏ</a>
                <a href="index.php?page=product-delete&id=<?php echo $product['id']; ?>" class="btn btn-danger ms-auto"
                    onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa Sản Phẩm</a>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('image').addEventListener('change', function (e) {
        const file = e.target.files[0];
        const preview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImg.src = e.target.result;
                preview.style.display = 'block';
                preview.querySelector('p').textContent = 'Ảnh mới:';
            }
            reader.readAsDataURL(file);
        }
    });
</script>

<?php unset($_SESSION['old']); ?>
<?php include __DIR__ . '/layouts/footer.php'; ?>