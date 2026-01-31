<?php $pageTitle = htmlspecialchars($product['name']) . ' - Chi tiết sản phẩm'; ?>
<?php include __DIR__ . '/layouts/header.php'; ?>

<div class="page-header">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=products" class="text-decoration-none">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($product['name']); ?>
            </li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-5 mb-4">
        <div class="card fade-in">
            <div class="card-body text-center p-4">
                <?php if (!empty($product['image'])): ?>
                    <img src="<?php echo htmlspecialchars($product['image']); ?>"
                        alt="<?php echo htmlspecialchars($product['name']); ?>" class="img-fluid rounded"
                        style="max-height: 400px; object-fit: contain;">
                <?php else: ?>
                    <div class="d-flex align-items-center justify-content-center"
                        style="height: 300px; background: linear-gradient(135deg, var(--border-color), var(--card-bg)); border-radius: 12px;">
                        <span style="font-size: 3rem; color: var(--text-secondary); opacity: 0.5;">No Image</span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="col-lg-7 mb-4">
        <div class="card fade-in">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Thông Tin Chi Tiết</h5>
                <span class="badge bg-primary">ID: #<?php echo $product['id']; ?></span>
            </div>
            <div class="card-body">
                <h2 class="mb-3" style="font-weight: 700; letter-spacing: -0.5px;">
                    <?php echo htmlspecialchars($product['name']); ?>
                </h2>

                <div class="mb-4">
                    <span class="badge bg-success" style="font-size: 1.5rem; padding: 0.75rem 1.5rem;">
                        <?php echo number_format($product['price'], 0, ',', '.'); ?> VNĐ
                    </span>
                </div>

                <div class="mb-4">
                    <h6 class="text-secondary mb-2">Mô tả sản phẩm</h6>
                    <p class="mb-0" style="line-height: 1.8;">
                        <?php echo nl2br(htmlspecialchars($product['description'] ?? 'Không có mô tả')); ?>
                    </p>
                </div>

                <?php if (!empty($product['created_at'])): ?>
                    <div class="mb-4">
                        <h6 class="text-secondary mb-2">Ngày tạo</h6>
                        <p class="mb-0"><?php echo date('d/m/Y H:i', strtotime($product['created_at'])); ?></p>
                    </div>
                <?php endif; ?>

                <hr style="border-color: var(--border-color);">

                <div class="d-flex gap-2 flex-wrap">
                    <a href="index.php?page=product-edit&id=<?php echo $product['id']; ?>" class="btn btn-warning">Sửa
                        Sản Phẩm</a>
                    <a href="index.php?page=product-delete&id=<?php echo $product['id']; ?>" class="btn btn-danger"
                        onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                    <a href="index.php?page=products" class="btn btn-outline-light ms-auto">Quay Lại</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/layouts/footer.php'; ?>