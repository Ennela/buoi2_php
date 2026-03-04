@extends('layouts.master')

@section('title', 'Welcome - Lab 07')

@section('content')
    <div class="row justify-content-center fade-in">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center" style="padding: 2rem;">
                    <h2 class="mb-1">👋 Thông tin cá nhân</h2>
                    <p class="mb-0" style="color: var(--text-muted);">Laravel Lab 07 - Bài 1: Controller & Truyền dữ liệu
                    </p>
                </div>
                <div class="card-body" style="padding: 2rem;">
                    {{-- Hiển thị thông tin từ Controller --}}
                    <div
                        style="background: var(--primary-color); color: #0f172a; padding: 18px 25px; border-radius: 12px; text-align: center; margin-bottom: 1.5rem; font-weight: 600; font-size: 1.1rem; box-shadow: 0 10px 30px rgba(129, 140, 248, 0.25); transition: transform 0.3s ease;">
                        Xin chào <strong>{{ $data['name'] }}</strong>, {{ $data['age'] }} tuổi
                    </div>

                    <div class="info-item">
                        <span class="info-icon" style="background: var(--primary-color);">👤</span>
                        <div>
                            <div class="info-label">Họ và tên</div>
                            <div class="info-value">{{ $data['name'] }}</div>
                        </div>
                    </div>

                    <div class="info-item">
                        <span class="info-icon" style="background: var(--danger-color);">🎂</span>
                        <div>
                            <div class="info-label">Tuổi</div>
                            <div class="info-value">{{ $data['age'] }} tuổi</div>
                        </div>
                    </div>

                    <div class="info-item">
                        <span class="info-icon" style="background: var(--success-color);">🏫</span>
                        <div>
                            <div class="info-label">Trường</div>
                            <div class="info-value">{{ $data['school'] }}</div>
                        </div>
                    </div>

                    <div class="info-item">
                        <span class="info-icon" style="background: var(--warning-color);">📚</span>
                        <div>
                            <div class="info-label">Lớp</div>
                            <div class="info-value">D18CNTT</div>
                        </div>
                    </div>

                    <div class="info-item">
                        <span class="info-icon" style="background: #a78bfa;">🎓</span>
                        <div>
                            <div class="info-label">MSSV</div>
                            <div class="info-value">23810310138</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .info-item {
            display: flex;
            align-items: center;
            padding: 14px 18px;
            margin-bottom: 10px;
            border-radius: 12px;
            background: var(--dark-bg);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .info-item:hover {
            background-color: rgba(129, 140, 248, 0.08);
            transform: translateX(5px);
        }

        .info-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 14px;
            font-size: 18px;
            color: #0f172a;
            flex-shrink: 0;
        }

        .info-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            font-weight: 600;
        }

        .info-value {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-primary);
        }
    </style>
@endsection