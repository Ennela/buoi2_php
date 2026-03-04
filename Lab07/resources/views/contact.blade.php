@extends('layouts.master')

@section('title', 'Liên hệ - Lab 07')

@section('content')
    <div class="row justify-content-center fade-in">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center" style="padding: 2rem;">
                    <h2 class="mb-1">📞 Liên hệ với chúng tôi</h2>
                    <p class="mb-0" style="color: var(--text-muted);">Bài 3: Master Layout - Trang con thứ 2</p>
                </div>
                <div class="card-body" style="padding: 2rem;">
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle me-2"></i>
                        Trang Contact cũng dùng <strong>@@extends('layouts.master')</strong> - Header/Footer tự động xuất
                        hiện!
                    </div>

                    <div class="contact-item">
                        <strong style="color: var(--primary-color);">📧 Email:</strong> kien20377@gmail.com
                    </div>
                    <div class="contact-item">
                        <strong style="color: var(--primary-color);">📱 Điện thoại:</strong> 0394680113
                    </div>
                    <div class="contact-item">
                        <strong style="color: var(--primary-color);">📍 Địa chỉ:</strong> Đại học Điện Lực, Hà Nội
                    </div>
                    <div class="contact-item">
                        <strong style="color: var(--primary-color);">⏰ Giờ làm việc:</strong> 8:00 - 17:00 (Thứ 2 - Thứ 6)
                    </div>

                    <div class="text-center mt-4">
                        <a href="/" class="btn btn-primary">← Quay lại trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .contact-item {
            padding: 15px;
            background: var(--dark-bg);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            margin-bottom: 10px;
            color: var(--text-secondary);
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            background-color: rgba(129, 140, 248, 0.08);
        }
    </style>
@endsection