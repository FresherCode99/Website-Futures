<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

     // Xử lý đăng nhập
     public function login(Request $request)
     {
           // Validate đầu vào
    $request->validate([
        'email' => 'required',
        'password' => 'required|string',
    ]);

    // Kiểm tra nếu người dùng nhập vào email hay username
    $credentials = [
        'password' => $request->password
    ];

    // Kiểm tra nếu input là email
    if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
        $credentials['email'] = $request->email;
    } else {
        // Nếu không phải email, coi là username
        $credentials['username'] = $request->email;
    }

    // Thực hiện đăng nhập
    if (Auth::attempt($credentials, $request->has('remember'))) {
        // Đăng nhập thành công, lấy thông tin người dùng
        $user = Auth::user();

        // Chuyển hướng dựaa trên vai trò của người dùng
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'manager') {
            return redirect()->route('manager.dashboard');
        } elseif ($user->role === 'content') {
            return redirect()->route('content.dashboard');
        } else {
            session()->flash('alert', [
                'title' => 'Chào mừng bạn đã đăng nhập',
                'ic' => 'success', 
                'message' => 'Bạn đã đăng nhập thành công vào hệ thống!'
            ]);
            return redirect()->route('user.dashboard');
        }
    } else {
        // Đăng nhập thất bại, có thể thông báo lỗi cho người dùng
        session()->flash('alert', [
            'title' => 'Lỗi',
            'ic' => 'danger', 
            'message' => 'Thông tin đăng nhập không chính xác.'
        ]);
        return back()->withErrors(['email' => 'Thông tin đăng nhập không chính xác.']);
    }
         
         
 
         // Nếu đăng nhập thất bại, quay lại với thông báo lỗi
         return back()->withErrors([
             'email' => 'Thông tin đăng nhập không chính xác.',
         ]);
        }

}