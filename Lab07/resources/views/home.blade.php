@extends('layouts.master')

@section('title', 'Trang chủ - Lab 07')

@section('content')
    <div class="row justify-content-center fade-in">
        <div class="col-md-8">
            <div class="text-center mb-4">
                <h1 style="font-size: 2.8rem; font-weight: 700; letter-spacing: -1px;">
                    Lab7 <span class="accent">Master Layout</span>
                </h1>
                <p style="font-size: 1.2rem; color: var(--text-secondary); line-height: 1.7;">
                    Bài 3: Xây dựng khung giao diện dùng chung
                </p>
            </div>

            <div
                style="background: var(--primary-color); color: #0f172a; padding: 22px 35px; border-radius: 16px; font-size: 1.15rem; font-weight: 600; margin-bottom: 2rem; box-shadow: 0 10px 30px rgba(129, 140, 248, 0.25); text-align: center; transition: transform 0.3s ease;">
                Nguyễn Văn Kiên - D18CNTT - MSSV: 23810310138
            </div>

            <div class="alert alert-info fade-in">
                <i class="fas fa-info-circle me-2"></i>
                Trang này sử dụng <strong>@@extends('layouts.master')</strong> để kế thừa Master Layout.
                Header và Footer tự động xuất hiện mà không cần copy code!
            </div>

            <div class="row mt-4">
                <div class="col-md-4 mb-3">
                    <div class="card text-center" style="padding: 1.5rem;">
                        <i class="fas fa-layer-group fa-2x mb-3" style="color: var(--primary-color);"></i>
                        <h6 class="fw-bold">Master Layout</h6>
                        <small style="color: var(--text-muted);">Dùng chung Header/Footer</small>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card text-center" style="padding: 1.5rem;">
                        <i class="fas fa-puzzle-piece fa-2x mb-3" style="color: var(--warning-color);"></i>
                        <h6 class="fw-bold">@@yield / @@section</h6>
                        <small style="color: var(--text-muted);">Nội dung riêng từng trang</small>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card text-center" style="padding: 1.5rem;">
                        <i class="fas fa-recycle fa-2x mb-3" style="color: var(--success-color);"></i>
                        <h6 class="fw-bold">Tái sử dụng</h6>
                        <small style="color: var(--text-muted);">Không cần lặp lại code</small>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-3 justify-content-center mt-3">
                <a href="/trang-chu" class="btn btn-primary">Trang chủ</a>
                <a href="/lien-he" class="btn" style="background: var(--border-color); color: var(--text-primary);">Liên
                    hệ</a>
                <a href="/products" class="btn" style="background: var(--border-color); color: var(--text-primary);">Sản
                    phẩm</a>
            </div>
        </div>
    </div>
@endsection