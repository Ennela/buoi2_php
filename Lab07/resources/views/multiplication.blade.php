@extends('layouts.master')

@section('title', 'Bảng cửu chương - Lab 07')

@section('content')
    <div class="row justify-content-center fade-in">
        <div class="col-md-6">
            @if (!$isValid)
                {{-- Hiển thị thông báo lỗi bằng Alert Bootstrap --}}
                <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Lỗi!</strong> Giá trị "<strong>{{ $n }}</strong>" không phải là một số hợp lệ.
                    Vui lòng nhập một số nguyên từ 1 đến 9.
                </div>
                <div class="text-center mt-3">
                    <p style="color: var(--text-muted);">Chọn một số bên dưới:</p>
                    <div class="d-flex flex-wrap gap-2 justify-content-center">
                        @for ($i = 1; $i <= 9; $i++)
                            <a href="/bang-cuu-chuong/{{ $i }}" class="quick-link">{{ $i }}</a>
                        @endfor
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-header text-center" style="padding: 2rem;">
                        <div
                            style="width: 60px; height: 60px; border-radius: 50%; background: var(--primary-color); display: inline-flex; align-items: center; justify-content: center; color: #0f172a; font-size: 28px; font-weight: 800; margin-bottom: 10px;">
                            {{ $n }}
                        </div>
                        <h3 class="mb-0">Bảng cửu chương {{ $n }}</h3>
                        <p class="mb-0 mt-1" style="color: var(--text-muted);">Bài 4: Tính toán trong Controller</p>
                    </div>
                    <div class="card-body">
                        @for ($i = 1; $i <= 10; $i++)
                            <div class="multiplication-item">
                                <span style="font-weight: 600; color: var(--text-primary);">{{ $n }} x {{ $i }}</span>
                                <span style="font-weight: 700; color: var(--primary-color); font-size: 1.15rem;">=
                                    {{ $n * $i }}</span>
                            </div>
                        @endfor
                    </div>
                </div>

                {{-- Chọn nhanh bảng cửu chương khác --}}
                <div class="text-center mt-4">
                    <p style="color: var(--text-muted);" class="mb-2">Chọn bảng cửu chương khác:</p>
                    <div class="d-flex flex-wrap gap-2 justify-content-center">
                        @for ($i = 1; $i <= 9; $i++)
                            <a href="/bang-cuu-chuong/{{ $i }}" class="quick-link {{ $n == $i ? 'active' : '' }}">{{ $i }}</a>
                        @endfor
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .multiplication-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 18px;
            margin-bottom: 6px;
            border-radius: 10px;
            background: var(--dark-bg);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .multiplication-item:hover {
            background-color: rgba(129, 140, 248, 0.08);
            transform: translateX(5px);
        }

        .quick-link {
            display: inline-flex;
            width: 44px;
            height: 44px;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
            background: var(--border-color);
            color: var(--text-primary);
            border: 1px solid var(--border-color);
        }

        .quick-link:hover,
        .quick-link.active {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: #0f172a;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(129, 140, 248, 0.3);
        }
    </style>
@endsection