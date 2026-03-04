<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

// ==================== BÀI 1: Controller & Truyền dữ liệu ====================
// Route / trỏ về HomeController@index
Route::get('/', [HomeController::class, 'index']);

// ==================== BÀI 2: Danh sách sản phẩm ====================
// Route /products trỏ về ProductController@list
Route::get('/products', [ProductController::class, 'list']);

// ==================== BÀI 3: Master Layout ====================
// Route /trang-chu và /lien-he để test Master Layout
Route::get('/trang-chu', [HomeController::class, 'home']);
Route::get('/lien-he', [HomeController::class, 'contact']);

// ==================== BÀI 4: Bảng cửu chương ====================
// Route /bang-cuu-chuong/{n} trỏ về HomeController@multiplication
Route::get('/bang-cuu-chuong/{n}', [HomeController::class, 'multiplication']);
