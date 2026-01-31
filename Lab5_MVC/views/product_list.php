<?php $pageTitle = 'Danh Sách Sản Phẩm - Lab5 MVC'; ?>
<?php include __DIR__ . '/layouts/header.php'; ?>

<div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
    <div class="mb-3 mb-md-0">
        <h1 class="page-title">Danh Sách Sản Phẩm</h1>
        <p class="page-subtitle">
            <?php if (!empty($isSearch)): ?>
                Kết quả tìm kiếm cho: "<strong><?php echo htmlspecialchars($keyword ?? ''); ?></strong>"
                (<?php echo count($products); ?> sản phẩm)
            <?php else: ?>
                Quản lý tất cả sản phẩm trong hệ thống
            <?php endif; ?>
        </p>
    </div>
    <a href="index.php?page=product-add" class="btn btn-primary">Thêm Sản Phẩm</a>
</div>

<?php if (!empty($_SESSION['success'])): ?>
    <div class="alert alert-success fade-in d-flex align-items-center" role="alert">
        <?php echo $_SESSION['success'];
        unset($_SESSION['success']); ?>
    </div>
<?php endif; ?>

<?php if (!empty($_SESSION['error'])): ?>
    <div class="alert alert-danger fade-in d-flex align-items-center" role="alert">
        <?php echo $_SESSION['error'];
        unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<div class="card mb-4 fade-in">
    <div class="card-body py-3">
        <form action="index.php" method="GET" class="row g-3 align-items-center">
            <input type="hidden" name="page" value="product-search">
            <div class="col-md-8 col-lg-9">
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-end-0"
                        style="border-color: var(--border-color);"></span>
                    <input type="text" name="keyword" class="form-control border-start-0"
                        placeholder="Tìm kiếm sản phẩm theo tên..."
                        value="<?php echo htmlspecialchars($_GET['keyword'] ?? ''); ?>">
                </div>
            </div>
            <div class="col-md-4 col-lg-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary flex-grow-1">Tìm kiếm</button>
                <?php if (!empty($isSearch)): ?>
                    <a href="index.php?page=products" class="btn btn-outline-light">X</a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<div class="card fade-in">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Bảng Sản Phẩm</h5>
        <span class="badge bg-primary"><?php echo count($products); ?> sản phẩm</span>
    </div>
    <div class="card-body p-0">
        <?php if (!empty($products)): ?>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th style="width: 60px;">ID</th>
                            <th style="width: 80px;">Hình</th>
                            <th>Tên sản phẩm</th>
                            <th>Mô tả</th>
                            <th style="width: 150px;">Giá</th>
                            <th style="width: 180px;" class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td>
                                    <span class="badge bg-secondary">#<?php echo $product['id']; ?></span>
                                </td>
                                <td>
                                    <?php if (!empty($product['image'])): ?>
                                        <img src="<?php echo htmlspecialchars($product['image']); ?>"
                                            alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-img">
                                    <?php else: ?>
                                        <div class="product-img-placeholder">-</div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <strong><?php echo htmlspecialchars($product['name']); ?></strong>
                                </td>
                                <td>
                                    <span class="text-secondary">
                                        <?php
                                        $desc = $product['description'] ?? '';
                                        echo htmlspecialchars(strlen($desc) > 50 ? substr($desc, 0, 50) . '...' : $desc);
                                        ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="price">
                                        <?php echo number_format($product['price'], 0, ',', '.'); ?> VNĐ
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="index.php?page=product-detail&id=<?php echo $product['id']; ?>"
                                            class="btn btn-sm btn-outline-light" title="Xem chi tiết">Xem</a>
                                        <a href="index.php?page=product-edit&id=<?php echo $product['id']; ?>"
                                            class="btn btn-sm btn-warning" title="Sửa">Sửa</a>
                                        <a href="index.php?page=product-delete&id=<?php echo $product['id']; ?>"
                                            class="btn btn-sm btn-danger" title="Xóa"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <h3>Không có sản phẩm nào</h3>
                <p>
                    <?php if (!empty($isSearch)): ?>
                        Không tìm thấy sản phẩm phù hợp với từ khóa tìm kiếm.
                    <?php else: ?>
                        Hãy thêm sản phẩm mới để bắt đầu quản lý.
                    <?php endif; ?>
                </p>
                <a href="index.php?page=product-add" class="btn btn-primary mt-3">Thêm Sản Phẩm Đầu Tiên</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include __DIR__ . '/layouts/footer.php'; ?>