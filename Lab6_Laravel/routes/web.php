<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ==================== BÀI 2: BASIC ROUTING & VIEWS ====================

// Route /home - trả về chuỗi "Chào mừng đến với Laravel"
Route::get('/home', function () {
    return "Chào mừng đến với Laravel";
});

// Route /about - trả về thông tin cá nhân
Route::get('/about', function () {
    return "
        <h2>Thông tin sinh viên</h2>
        <p><strong>Họ tên:</strong> Nguyễn Văn Kiên</p>
        <p><strong>Lớp:</strong> K21</p>
        <p><strong>MSSV:</strong> 21000001</p>
    ";
});

// Route /contact - trả về view contact
Route::get('/contact', function () {
    return view('contact');
});

// ==================== BÀI 3: DYNAMIC ROUTE & CALCULATION ====================

// Route tính tổng: /tong/{a}/{b}
Route::get('/tong/{a}/{b}', function ($a, $b) {
    $tong = $a + $b;
    return "Tổng của {$a} và {$b} là: {$tong}";
});

// Route thông tin sinh viên với tham số tùy chọn: /sinh-vien/{name}/{age?}
Route::get('/sinh-vien/{name}/{age?}', function ($name, $age = 20) {
    return "
        <h2>Thông tin Sinh Viên</h2>
        <p><strong>Tên:</strong> {$name}</p>
        <p><strong>Tuổi:</strong> {$age}</p>
    ";
});

// ==================== BÀI 4: ROUTE GROUP & VALIDATION ====================

// Route group Admin
Route::prefix('admin')->group(function () {
    // /admin/dashboard
    Route::get('/dashboard', function () {
        return "Chào mừng Admin";
    });

    // /admin/users
    Route::get('/users', function () {
        return "Danh sách người dùng";
    });
});

// Route kiểm tra ngày tháng với validation
Route::get('/check-date/{day}/{month}/{year}', function ($day, $month, $year) {
    return "
        <h2>Kiểm tra ngày tháng</h2>
        <p><strong>Ngày:</strong> {$day}</p>
        <p><strong>Tháng:</strong> {$month}</p>
        <p><strong>Năm:</strong> {$year}</p>
        <p><em>Ngày hợp lệ!</em></p>
    ";
})->where([
            'day' => '([1-9]|[12][0-9]|3[01])',    // 1-31
            'month' => '([1-9]|1[0-2])',           // 1-12
            'year' => '[0-9]{4}'                    // 4 chữ số
        ]);
