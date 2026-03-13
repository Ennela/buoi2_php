@extends('layouts.master')

@section('title', 'Danh sách sản phẩm - Lab 08')

@section('styles')
    <style>
        /* ===== E-COMMERCE PRODUCT PAGE ===== */
        .shop-hero {
            background: linear-gradient(135deg, #e0e7ff 0%, #ede9fe 50%, #f3e8ff 100%);
            border-radius: 20px;
            padding: 3rem 2.5rem;
            margin-bottom: 2.5rem;
            position: relative;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        .shop-hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.15) 0%, transparent 70%);
        }

        .shop-hero::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(52, 211, 153, 0.1) 0%, transparent 70%);
        }

        .shop-hero h1 {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 1;
        }

        .shop-hero h1 .gradient-text {
            background: linear-gradient(135deg, #4f46e5, #10b981);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .shop-hero p {
            color: var(--text-secondary);
            font-size: 1rem;
            position: relative;
            z-index: 1;
        }

        .shop-stats {
            display: flex;
            gap: 2rem;
            margin-top: 1.5rem;
            position: relative;
            z-index: 1;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .stat-label {
            font-size: 0.75rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* ===== CATEGORY TABS ===== */
        .category-tabs {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        .category-tab {
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
            color: var(--text-secondary);
            background: transparent;
            text-decoration: none;
        }

        .category-tab:hover,
        .category-tab.active {
            background: var(--primary-color);
            color: #fff;
            border-color: var(--primary-color);
        }

        .category-tab .count {
            background: rgba(0,0,0,0.1);
            padding: 1px 8px;
            border-radius: 50px;
            font-size: 0.75rem;
            margin-left: 6px;
        }

        /* ===== SECTION HEADER ===== */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid var(--border-color);
        }

        .section-header h2 {
            font-size: 1.35rem;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .section-header h2 .icon {
            font-size: 1.1rem;
        }

        .section-header .view-all {
            font-size: 0.85rem;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .section-header .view-all:hover {
            color: var(--text-primary);
        }

        /* ===== PRODUCT GRID ===== */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 1.25rem;
            margin-bottom: 3rem;
        }

        /* ===== PRODUCT CARD ===== */
        .product-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            border-color: var(--primary-color);
        }

        .product-card .card-img-wrapper {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            padding: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 180px;
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid var(--border-color);
        }

        .product-card .card-img-wrapper::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(129, 140, 248, 0.08) 0%, transparent 70%);
        }

        .product-card .product-icon {
            font-size: 3.5rem;
            opacity: 0.7;
            position: relative;
            z-index: 1;
            transition: all 0.3s ease;
        }

        .product-card:hover .product-icon {
            transform: scale(1.1);
            opacity: 1;
        }

        .product-card .card-info {
            padding: 1rem 1.1rem 1.25rem;
        }

        .product-card .product-category {
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--primary-color);
            margin-bottom: 0.4rem;
        }

        .product-card .product-name {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 2.52em;
        }

        .product-card .product-desc {
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-bottom: 0.75rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.5;
        }

        .product-card .product-bottom {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .product-card .product-price {
            font-size: 1.05rem;
            font-weight: 700;
            color: #f87171;
        }

        .product-card .product-price small {
            font-size: 0.75rem;
            font-weight: 400;
            color: var(--text-muted);
        }

        .product-card .product-stock {
            font-size: 0.7rem;
            color: var(--text-muted);
        }

        .product-card .product-stock .in-stock {
            color: #34d399;
        }

        /* ===== BADGE ON CARD ===== */
        .product-card .badge-hot {
            position: absolute;
            top: 12px;
            left: 12px;
            background: linear-gradient(135deg, #f87171, #ef4444);
            color: white;
            font-size: 0.65rem;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 50px;
            z-index: 2;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .product-card .badge-new {
            position: absolute;
            top: 12px;
            right: 12px;
            background: linear-gradient(135deg, #818cf8, #6366f1);
            color: white;
            font-size: 0.65rem;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 50px;
            z-index: 2;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Quick action on hover */
        .product-card .quick-actions {
            position: absolute;
            bottom: 12px;
            right: 12px;
            display: flex;
            gap: 6px;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease;
            z-index: 2;
        }

        .product-card:hover .quick-actions {
            opacity: 1;
            transform: translateY(0);
        }

        .quick-actions .action-btn {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--primary-color);
            color: #fff;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .quick-actions .action-btn:hover {
            background: var(--primary-hover);
            color: #fff;
            transform: scale(1.1);
        }

        /* ===== PRODUCT SUMMARY BAR ===== */
        .summary-bar {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .summary-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 1rem 1.5rem;
            flex: 1;
            min-width: 150px;
            transition: all 0.3s ease;
        }

        .summary-card:hover {
            border-color: var(--primary-color);
        }

        .summary-card .sc-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .summary-card .sc-label {
            font-size: 0.75rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .summary-card .sc-icon {
            float: right;
            font-size: 1.5rem;
            opacity: 0.3;
        }

        /* ===== CATEGORY ICONS ===== */
        .cat-icon-1::before { content: '📱'; }
        .cat-icon-2::before { content: '💻'; }
        .cat-icon-3::before { content: '📟'; }
        .cat-icon-4::before { content: '🎧'; }
        .cat-icon-5::before { content: '⌚'; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.75rem;
            }

            .shop-hero {
                padding: 2rem 1.5rem;
            }

            .shop-hero h1 {
                font-size: 1.5rem;
            }

            .shop-stats {
                gap: 1rem;
            }

            .summary-bar {
                flex-direction: column;
            }
        }

        @media (max-width: 480px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.5rem;
            }

            .product-card .card-img-wrapper {
                height: 120px;
            }

            .product-card .product-name {
                font-size: 0.8rem;
            }
        }
    </style>
@endsection

@section('content')
    {{-- HERO BANNER --}}
    <div class="shop-hero fade-in">
        <h1>🛒 <span class="gradient-text">Cửa Hàng Công Nghệ</span></h1>
        <div class="shop-stats">
            <div class="stat-item">
                <div class="stat-number">{{ count($products) }}</div>
                <div class="stat-label">Sản phẩm</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">{{ count($categories) }}</div>
                <div class="stat-label">Danh mục</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">{{ number_format($products->sum('quantity')) }}</div>
                <div class="stat-label">Tồn kho</div>
            </div>
        </div>
    </div>

    {{-- SUMMARY CARDS --}}
    <div class="summary-bar fade-in">
        @foreach ($categories as $cat)
            <div class="summary-card">
                <span class="sc-icon cat-icon-{{ $cat->id }}"></span>
                <div class="sc-value">{{ $groupedProducts->has($cat->id) ? $groupedProducts[$cat->id]->count() : 0 }}</div>
                <div class="sc-label">{{ $cat->name }}</div>
            </div>
        @endforeach
    </div>

    {{-- CATEGORY TABS --}}
    <div class="category-tabs fade-in">
        <span class="category-tab active" onclick="filterProducts('all')">
            Tất cả <span class="count">{{ count($products) }}</span>
        </span>
        @foreach ($categories as $cat)
            <span class="category-tab" onclick="filterProducts({{ $cat->id }})">
                {{ $cat->name }}
                <span class="count">{{ $groupedProducts->has($cat->id) ? $groupedProducts[$cat->id]->count() : 0 }}</span>
            </span>
        @endforeach
    </div>

    {{-- PRODUCTS BY CATEGORY --}}
    @php
        $categoryIcons = [1 => '📱', 2 => '💻', 3 => '📟', 4 => '🎧', 5 => '⌚'];
    @endphp

    @foreach ($categories as $cat)
        @if ($groupedProducts->has($cat->id))
            <div class="product-section" data-category="{{ $cat->id }}">
                <div class="section-header fade-in">
                    <h2>
                        <span class="icon">{{ $categoryIcons[$cat->id] ?? '📦' }}</span>
                        {{ $cat->name }}
                    </h2>
                    <span class="view-all">
                        {{ $groupedProducts[$cat->id]->count() }} sản phẩm
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </div>
                <div class="product-grid fade-in">
                    @foreach ($groupedProducts[$cat->id] as $index => $product)
                        <div class="product-card" data-category="{{ $product->category_id }}">
                            @if ($product->price >= 20000000)
                                <span class="badge-hot">Hot</span>
                            @endif
                            @if ($product->is_active)
                                <span class="badge-new">Mới</span>
                            @endif

                            <div class="card-img-wrapper">
                                <span class="product-icon">{{ $categoryIcons[$product->category_id] ?? '📦' }}</span>
                                <div class="quick-actions">
                                    <button class="action-btn" title="Xem nhanh"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn" title="Thêm giỏ hàng"><i class="fas fa-cart-plus"></i></button>
                                </div>
                            </div>

                            <div class="card-info">
                                <div class="product-category">{{ $cat->name }}</div>
                                <div class="product-name">{{ $product->name }}</div>
                                <div class="product-desc">{{ $product->content }}</div>
                                <div class="product-bottom">
                                    <div class="product-price">
                                        {{ number_format($product->price, 0, ',', '.') }}₫
                                    </div>
                                    <div class="product-stock">
                                        <span class="in-stock">SL: {{ $product->quantity }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
@endsection

@section('scripts')
    <script>
        function filterProducts(categoryId) {
            // Update active tab
            document.querySelectorAll('.category-tab').forEach(tab => {
                tab.classList.remove('active');
            });
            event.target.closest('.category-tab').classList.add('active');

            // Show/hide sections
            const sections = document.querySelectorAll('.product-section');
            sections.forEach(section => {
                if (categoryId === 'all') {
                    section.style.display = 'block';
                } else {
                    section.style.display = section.dataset.category == categoryId ? 'block' : 'none';
                }
            });
        }

        // Staggered animation
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.product-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 30);
            });
        });
    </script>
@endsection