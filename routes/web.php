<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ChatsController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('chat', [MessageController::class, 'index'])->name('chat.index');



Route::get('/', function () {
    return view('welcome');
});



Route::resource('teams', TeamController::class);

Route::post('teams/{team}/add-user', [TeamController::class, 'addUserToTeam'])->name('teams.addUser');


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);


// Route cho trang đăng ký
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Route xử lý đăng ký
Route::post('register', [RegisterController::class, 'register']);


Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard')->middleware('role:admin');  // Đảm bảo chỉ admin mới có thể truy cập

    Route::get('/manager/dashboard', function () {
        return view('manager.dashboard');
    })->name('manager.dashboard')->middleware('role:manager');

    Route::get('/content/dashboard', function () {
        return view('content.dashboard');
    })->name('content.dashboard')->middleware('role:content');

    Route::namespace('App\Http\Controllers')->prefix('user')->group(function () {
        Route::get('my-profile', [IndexController::class, 'myProfile'])->name('my-profile');
        Route::get('my-team', [IndexController::class, 'myTeam'])->name('my-team');
        Route::get('account-setting', [AccountController::class, 'index'])->name('account-setting');
        Route::put('account-setting/{id}', [AccountController::class, 'update'])->name('account-settings');
        Route::get('dashboard', [IndexController::class, 'index'])->name('user.dashboard');

        Route::get('friends', [FriendController::class, 'index'])->name('friend.index');
        Route::post('send-friend-request/{friendId}', [FriendController::class, 'sendFriendRequest'])->name('friend.sendRequest');
        Route::post('accept-friend-request/{friendId}', [FriendController::class, 'acceptFriendRequest'])->name('friend.acceptRequest');
        Route::post('reject-friend-request/{friendId}', [FriendController::class, 'rejectFriendRequest'])->name('friend.rejectRequest');


        // Route::get('/messages/{username}', [ChatController::class, 'showChat'])->name('chat.show');
    
        // // Gửi tin nhắn
        // Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
        
        // Route::get('messages', [ChatsController::class, 'index'])->name('message.index');
        Route::get('/messages/{receiverId}', [MessageController::class, 'showChat'])->name('chat.show');
        Route::post('/messages/{receiverId}/send', [MessageController::class, 'sendMessage'])->name('messages.send');
        // Route::get('messages/chat/{user}', [ChatsController::class, 'chat'])->name('message.chat');
    });
});
