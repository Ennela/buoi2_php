<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Lab5 MVC - Quản lý Sản phẩm'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #818cf8;
            --primary-hover: #6366f1;
            --secondary-color: #1e293b;
            --success-color: #34d399;
            --danger-color: #f87171;
            --warning-color: #fbbf24;
            --dark-bg: #0f172a;
            --card-bg: #1e293b;
            --border-color: #334155;
            --text-primary: #f1f5f9;
            --text-secondary: #cbd5e1;
            --text-muted: #94a3b8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--dark-bg);
            color: var(--text-primary);
            min-height: 100vh;
            line-height: 1.6;
        }

        .navbar {
            background-color: var(--card-bg) !important;
            border-bottom: 1px solid var(--border-color);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--text-primary) !important;
        }

        .nav-link {
            color: var(--text-secondary) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: all 0.3s ease;
            margin: 0 4px;
        }

        .nav-link:hover {
            color: var(--text-primary) !important;
            background-color: rgba(129, 140, 248, 0.15);
        }

        .nav-link.active {
            color: #fff !important;
            background-color: var(--primary-color);
        }

        .main-content {
            padding: 2rem 0;
            min-height: calc(100vh - 80px);
        }

        .card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            background: transparent;
            border-bottom: 1px solid var(--border-color);
            padding: 1.25rem 1.5rem;
            color: var(--text-primary);
        }

        .card-body {
            padding: 1.5rem;
        }

        .table {
            color: var(--text-primary);
            margin-bottom: 0;
        }

        .table> :not(caption)>*>* {
            background-color: transparent;
            border-bottom-color: var(--border-color);
            padding: 1rem 0.75rem;
            color: var(--text-primary);
        }

        .table thead th {
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            border-bottom-width: 2px;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: rgba(129, 140, 248, 0.08);
        }

        .btn {
            font-weight: 500;
            padding: 0.625rem 1.25rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: #0f172a;
            box-shadow: 0 4px 15px rgba(129, 140, 248, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(129, 140, 248, 0.4);
            background-color: var(--primary-hover);
            color: #fff;
        }

        .btn-success {
            background-color: var(--success-color);
            color: #0f172a;
            box-shadow: 0 4px 15px rgba(52, 211, 153, 0.3);
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(52, 211, 153, 0.4);
            background-color: #10b981;
            color: #fff;
        }

        .btn-warning {
            background-color: var(--warning-color);
            color: #0f172a;
            box-shadow: 0 4px 15px rgba(251, 191, 36, 0.3);
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(251, 191, 36, 0.4);
            background-color: #f59e0b;
            color: #0f172a;
        }

        .btn-danger {
            background-color: var(--danger-color);
            color: #0f172a;
            box-shadow: 0 4px 15px rgba(248, 113, 113, 0.3);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(248, 113, 113, 0.4);
            background-color: #ef4444;
            color: #fff;
        }

        .btn-outline-light {
            border: 1px solid var(--border-color);
            color: var(--text-secondary);
            background: transparent;
        }

        .btn-outline-light:hover {
            background-color: var(--border-color);
            border-color: var(--border-color);
            color: var(--text-primary);
        }

        .btn-sm {
            padding: 0.4rem 0.75rem;
            font-size: 0.875rem;
        }

        .form-control,
        .form-select {
            background-color: var(--dark-bg);
            border: 1px solid var(--border-color);
            color: var(--text-primary);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: var(--dark-bg);
            border-color: var(--primary-color);
            color: var(--text-primary);
            box-shadow: 0 0 0 3px rgba(129, 140, 248, 0.2);
        }

        .form-control::placeholder {
            color: var(--text-muted);
        }

        .form-label {
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .form-text {
            color: var(--text-muted) !important;
        }

        .alert {
            border: none;
            border-radius: 12px;
            padding: 1rem 1.25rem;
        }

        .alert-success {
            background-color: rgba(52, 211, 153, 0.15);
            color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }

        .alert-danger {
            background-color: rgba(248, 113, 113, 0.15);
            color: var(--danger-color);
            border-left: 4px solid var(--danger-color);
        }

        .alert-warning {
            background-color: rgba(251, 191, 36, 0.15);
            color: var(--warning-color);
            border-left: 4px solid var(--warning-color);
        }

        .badge {
            font-weight: 500;
            padding: 0.5rem 0.75rem;
            border-radius: 8px;
        }

        .badge.bg-primary {
            background-color: var(--primary-color) !important;
            color: #0f172a;
        }

        .badge.bg-secondary {
            background-color: var(--border-color) !important;
            color: var(--text-primary);
        }

        .badge.bg-success {
            background-color: var(--success-color) !important;
            color: #0f172a;
        }

        .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid var(--border-color);
        }

        .product-img-placeholder {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--border-color);
            border-radius: 10px;
            color: var(--text-muted);
            font-size: 0.8rem;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
        }

        .page-subtitle {
            color: var(--text-secondary);
            font-size: 1rem;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }

        .empty-state h3 {
            color: var(--text-secondary);
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: var(--text-muted);
        }

        .price {
            font-weight: 600;
            color: var(--success-color);
        }

        .text-secondary {
            color: var(--text-secondary) !important;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 1rem;
        }

        .breadcrumb-item a {
            color: var(--primary-color);
        }

        .breadcrumb-item.active {
            color: var(--text-secondary);
        }

        .breadcrumb-item+.breadcrumb-item::before {
            color: var(--text-muted);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        footer {
            padding: 1.5rem 0;
            border-top: 1px solid var(--border-color);
            text-align: center;
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--dark-bg);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border-color);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--text-muted);
        }

        strong {
            color: var(--text-primary);
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: var(--text-primary);
        }

        p {
            color: var(--text-secondary);
        }

        a {
            color: var(--primary-color);
        }

        a:hover {
            color: var(--text-primary);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php?page=home">Lab5 MVC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($_GET['page'] ?? 'home') === 'home' ? 'active' : ''; ?>"
                            href="index.php?page=home">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo in_array($_GET['page'] ?? '', ['products', 'product-add', 'product-edit', 'product-detail', 'product-search']) ? 'active' : ''; ?>"
                            href="index.php?page=products">Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($_GET['page'] ?? '') === 'faker' ? 'active' : ''; ?>"
                            href="index.php?page=faker">Faker Demo</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="main-content">
        <div class="container">