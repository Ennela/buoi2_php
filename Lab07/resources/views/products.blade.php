@extends('layouts.master')

@section('title', 'Danh sách sản phẩm - Lab 07')

@section('content')
    <div class="page-header fade-in">
        <h1 class="page-title">Danh Sách Sản Phẩm</h1>
        <p class="page-subtitle">Bài 2: Blade Loops & Condition — Giá > 10 triệu → màu đỏ + badge Vip</p>
    </div>

    <div class="card fade-in">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Bảng Sản Phẩm</h5>
            <span class="badge bg-primary">{{ count($products) }} sản phẩm</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th style="width: 60px;">STT</th>
                            <th>Tên sản phẩm</th>
                            <th style="width: 250px;">Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index => $product)
                            <tr>
                                <td>
                                    <span class="badge"
                                        style="background-color: var(--border-color); color: var(--text-primary);">{{ $index + 1 }}</span>
                                </td>
                                <td>
                                    <strong>{{ $product['name'] }}</strong>
                                </td>
                                <td>
                                    @if ($product['price'] > 10000000)
                                        <span class="price-vip">
                                            {{ number_format($product['price'], 0, ',', '.') }} đ
                                        </span>
                                        <span class="badge"
                                            style="background: var(--danger-color); color: #0f172a; margin-left: 6px;">⭐ Vip</span>
                                    @else
                                        <span class="price">
                                            {{ number_format($product['price'], 0, ',', '.') }} đ
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection