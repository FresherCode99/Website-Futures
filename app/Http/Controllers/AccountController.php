<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return view('user.account-setting', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        return view('user.account-setting', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Lấy thông tin người dùng hiện tại
        $us = Auth::user();
        $us_id = $us->id;
        $user = User::find($us_id);
        // $id = $user->id;
        // Validate dữ liệu nhập vào
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users,email,',
        //     'password' => 'nullable|confirmed|min:8',  // Nếu có thay đổi mật khẩu
        //     // 'upload' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate avatar (tối đa 2MB)
        // ]);

        // Cập nhật thông tin người dùng
        $user->username = $request->username;
        $user->fistname = $request->fistname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->language = $request->language;
        $user->topic = $request->topic;
        $user->skype = $request->skype;

        // Xử lý ảnh đại diện nếu có
        if ($request->hasFile('upload')) {
            // Xóa ảnh cũ nếu có
            if ($user->avatar && Storage::exists($user->avatar)) {
                Storage::delete($user->avatar);
            }

            // Lấy tên người dùng làm tên file
            $fileExtension = $request->file('upload')->getClientOriginalExtension(); // Lấy phần mở rộng của file
            $fileName = $user->username . '.' . $fileExtension; // Đặt tên file là tên người dùng + phần mở rộng

            // Lưu ảnh với tên mới và lấy đường dẫn
            $avatarPath = $request->file('upload')->storeAs('avatars', $fileName, 'public');

            // Cập nhật đường dẫn ảnh vào cơ sở dữ liệu
            $user->avatar = $avatarPath;
        }

        // Nếu người dùng có thay đổi mật khẩu, cập nhật mật khẩu mới
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Lưu thông tin người dùng
        $user->save();
        session()->flash('alert', [
            'title' => 'Thành Công',
            'ic' => 'success',
            'message' => 'Thay đổi thông ttin thành công'
        ]);
        // Quay lại trang profile với thông báo thành công
        return redirect()->route('account-setting')->with('status', 'Profile updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
