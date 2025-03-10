<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // Hiển thị chat với người bạn
    public function showChat($username)
    {
        $user = Auth::user();
        // Tìm người bạn qua username
        $friend = User::where('username', $username)->firstOrFail();

        // Lấy các tin nhắn giữa người dùng hiện tại và bạn đó
        $messages = Message::where(function($query) use ($friend) {
            $query->where('sender_id', Auth::id())->where('receiver_id', $friend->id)
                  ->orWhere('sender_id', $friend->id)->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();

        return view('messages.index', compact('user','friend', 'messages'));
    }

    // Gửi tin nhắn
    public function sendMessage(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        $message = new Message();
        $message->sender_id = Auth::id();
        $message->receiver_id = $request->receiver_id;
        $message->message = $request->message;
        $message->save();

        return response()->json($message);
    }
}

