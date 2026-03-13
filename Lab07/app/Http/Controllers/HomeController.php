<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Bài 1: Trang chủ - Truyền dữ liệu ra View
     */
    public function index()
    {
        $data = [
            'name' => 'Nguyễn Văn Kiên',
            'age' => 20,
            'school' => 'Đại học Điện Lực'
        ];

        return view('welcome', compact('data'));
    }

    /**
     * Bài 3: Trang Home (sử dụng Master Layout)
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Bài 3: Trang Contact (sử dụng Master Layout)
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Bài 4: Bảng cửu chương
     */
    public function multiplication($n)
    {
        // Kiểm tra $n có phải số không
        $isValid = is_numeric($n);

        return view('multiplication', compact('n', 'isValid'));
    }
}
