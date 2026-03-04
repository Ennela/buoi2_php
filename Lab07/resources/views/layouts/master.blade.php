<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Lab 07')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
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
            display: flex;
            flex-direction: column;
            line-height: 1.6;
        }

        /* ===== NAVBAR ===== */
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

        .navbar-brand .accent {
            color: var(--primary-color);
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

        /* ===== MAIN CONTENT ===== */
        .main-content {
            flex: 1;
            padding: 2rem 0;
            min-height: calc(100vh - 80px);
        }

        /* ===== CARD ===== */
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

        /* ===== TABLE ===== */
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

        /* ===== BUTTONS ===== */
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

        /* ===== ALERT ===== */
        .alert {
            border: none;
            border-radius: 12px;
            padding: 1rem 1.25rem;
        }

        .alert-danger {
            background-color: rgba(248, 113, 113, 0.15);
            color: var(--danger-color);
            border-left: 4px solid var(--danger-color);
        }

        .alert-info {
            background-color: rgba(129, 140, 248, 0.15);
            color: var(--primary-color);
            border-left: 4px solid var(--primary-color);
        }

        .alert-success {
            background-color: rgba(52, 211, 153, 0.15);
            color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }

        /* ===== BADGE ===== */
        .badge {
            font-weight: 500;
            padding: 0.5rem 0.75rem;
            border-radius: 8px;
        }

        .badge.bg-primary {
            background-color: var(--primary-color) !important;
            color: #0f172a;
        }

        /* ===== PRICE ===== */
        .price {
            font-weight: 600;
            color: var(--success-color);
        }

        .price-vip {
            font-weight: 700;
            color: var(--danger-color);
        }

        /* ===== FOOTER ===== */
        footer {
            padding: 1.5rem 0;
            border-top: 1px solid var(--border-color);
            text-align: center;
            color: var(--text-secondary);
            font-size: 0.875rem;
            margin-top: auto;
        }

        footer a {
            color: var(--primary-color);
            text-decoration: none;
            margin: 0 10px;
        }

        footer a:hover {
            color: var(--text-primary);
        }

        /* ===== PAGE HEADER ===== */
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

        /* ===== ANIMATIONS ===== */
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

        /* ===== TYPOGRAPHY ===== */
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

        .accent {
            color: var(--primary-color);
        }

        /* ===== SCROLLBAR ===== */
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
    </style>
    @yield('styles')
</head>

<body>
    {{-- ===== HEADER / NAVIGATION ===== --}}
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Lab7 <span class="accent">Laravel</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Welcome</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('trang-chu') ? 'active' : '' }}" href="/trang-chu">Trang
                            chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('lien-he') ? 'active' : '' }}" href="/lien-he">Liên hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('products') ? 'active' : '' }}" href="/products">Sản
                            phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('bang-cuu-chuong/*') ? 'active' : '' }}"
                            href="/bang-cuu-chuong/5">Cửu chương</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- ===== MAIN CONTENT ===== --}}
    <main class="main-content">
        <div class="container">
            @yield('content')
        </div>
    </main>

    {{-- ===== FOOTER ===== --}}
    <footer>
        <div class="container">
            <p class="mb-1">
                Lab7 Laravel - Controller & Blade &copy; {{ date('Y') }} |
                <strong>Nguyễn Văn Kiên</strong> - D18CNTT - 23810310138
            </p>
            <p class="mb-0" style="color: var(--text-muted);">
                Đại học Điện Lực, Hà Nội |
                <a href="/trang-chu">Trang chủ</a>
                <a href="/lien-he">Liên hệ</a>
                <a href="/products">Sản phẩm</a>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function (alert) {
                setTimeout(function () {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';
                    setTimeout(function () { alert.remove(); }, 500);
                }, 5000);
            });
        });
    </script>
    @yield('scripts')
</body>

</html>