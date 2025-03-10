<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
{
    // Đăng xuất người dùng
    Auth::logout();

    // Xóa session và cookie để bảo mật
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Chuyển hướng về trang đăng nhập hoặc trang chủ
    return redirect()->route('login');
}
}
