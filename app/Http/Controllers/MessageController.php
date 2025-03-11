<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Friend;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // Hiển thị tin nhắn với người dùng theo username
    public function showChatByUsername($username)
    {
        // Tìm người bạn qua username
        $friend = User::where('username', $username)->first();

        // Kiểm tra nếu không tìm thấy người dùng
        if (!$friend) {
            return redirect()->route('chat.index')->with('error', 'User not found');
        }

        // Lấy các tin nhắn giữa người dùng hiện tại và bạn đó
        $messages = Message::where(function ($query) use ($friend) {
            $query->where('sender_id', Auth::id())->where('receiver_id', $friend->id)
                ->orWhere('sender_id', $friend->id)->where('receiver_id', Auth::id());
        })->get();

        // Trả về view với thông tin người bạn và tin nhắn
        return view('messages.index', compact('friend', 'messages'));
    }
    public function showChat($username)
{
    $user = Auth::user();
    $frr = $user->friends;
    // Tìm người bạn qua username
    $fri = User::where('username', $username)->firstOrFail();

    // Lấy danh sách bạn bè + tin nhắn mới nhất
    $friends = User::all()->map(function ($friend) {
        $lastMessage = Message::where(function ($query) use ($friend) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $friend->id);
        })->orWhere(function ($query) use ($friend) {
            $query->where('sender_id', $friend->id)
                ->where('receiver_id', auth()->id());
        })->latest()->first();
        
        $friend->lastMessage = $lastMessage;
        return $friend;
    });
    // return $friends;

    // Lấy các tin nhắn giữa user hiện tại và bạn đó
    $messages = Message::where(function ($query) use ($fri) {
        $query->where('sender_id', Auth::id())
              ->where('receiver_id', $fri->id);
    })->orWhere(function ($query) use ($fri) {
        $query->where('sender_id', $fri->id)
              ->where('receiver_id', Auth::id());
    })->orderBy('created_at', 'asc')->get();

    return view('messages.index', compact('user', 'fri', 'frr', 'friends', 'messages'));
}

    // Gửi tin nhắn
    public function sendMessage(Request $request, $receiverId)
    {

        $request->validate([
            'message' => 'required|string',
        ]);

        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $receiverId,
            'message' => $request->message,
        ]);

        broadcast(new MessageSent($message))->toOthers();
        return back();
        // return view('messages.index' ,compact('messages'));
        // return response()->json($message);
    }
}
