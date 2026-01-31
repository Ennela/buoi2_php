<?php $pageTitle = 'Thêm Sản Phẩm Mới - Lab5 MVC'; ?>
<?php include __DIR__ . '/layouts/header.php'; ?>

<div class="page-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=products" class="text-decoration-none">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
        </ol>
    </nav>
    <h1 class="page-title">Thêm Sản Phẩm Mới</h1>
    <p class="page-subtitle">Điền thông tin sản phẩm bên dưới để thêm vào hệ thống</p>
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
    <div class="card-header">
        <h5 class="mb-0">Thông Tin Sản Phẩm</h5>
    </div>
    <div class="card-body">
        <form action="index.php?page=product-store" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">
                        Tên sản phẩm <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="<?php echo htmlspecialchars($_SESSION['old']['name'] ?? ''); ?>"
                        placeholder="Nhập tên sản phẩm..." required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label">
                        Giá (VNĐ) <span class="text-danger">*</span>
                    </label>
                    <input type="number" class="form-control" id="price" name="price"
                        value="<?php echo htmlspecialchars($_SESSION['old']['price'] ?? ''); ?>"
                        placeholder="Nhập giá sản phẩm..." min="0" step="1000" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh sản phẩm</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                <div class="form-text text-secondary">
                    Chấp nhận file JPG, PNG, GIF, WEBP (tối đa 5MB)
                </div>
            </div>

            <div class=" mb-3">
                    <div id="imagePreview" style="display: none;">
                        <img id="previewImg" src="" alt="Preview"
                            style="max-height: 150px; border-radius: 8px; border: 2px solid var(--border-color);">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label">Mô tả sản phẩm</label>
                    <textarea class="form-control" id="description" name="description" rows="4"
                        placeholder="Nhập mô tả chi tiết về sản phẩm..."><?php echo htmlspecialchars($_SESSION['old']['description'] ?? ''); ?></textarea>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">Lưu Sản Phẩm</button>
                    <a href="index.php?page=products" class="btn btn-outline-light">Hủy Bỏ</a>
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
            }
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    });
</script>

<?php unset($_SESSION['old']); ?>
<?php include __DIR__ . '/layouts/footer.php'; ?>