<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
   // Hiển thị tin nhắn với người dùng theo username
   public function showChatByUsername($username)
   {
       $user = Auth::user();
       // Tìm người bạn qua username
       $friend = User::where('username', $username)->first();

       // Kiểm tra nếu không tìm thấy người dùng
       if (!$friend) {
           return redirect()->route('chat.index')->with('error', 'User not found');
       }

       // Lấy các tin nhắn giữa người dùng hiện tại và bạn đó
       $messages = Message::where(function($query) use ($friend) {
           $query->where('sender_id', Auth::id())->where('receiver_id', $friend->id)
                 ->orWhere('sender_id', $friend->id)->where('receiver_id', Auth::id());
       })->get();

       // Trả về view với thông tin người bạn và tin nhắn
       return view('messages.index', compact('user','friend', 'messages'));
   }

    // Gửi tin nhắn
    public function sendMessage(Request $request, $receiverId)
    {
        $user = auth()->user();
        $receiver = User::find($receiverId);
        
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $message = Message::create([
            'sender_id' => $user->id,
            'receiver_id' => $receiver->id,
            'message' => $request->message,
        ]);

        broadcast(new MessageSent($message)); // Broadcast the message to the recipient

   {
    $user = auth()->user();
    $receiver = User::find($receiverId);

    // // Kiểm tra xem người dùng có phải bạn bè không
    // if (!$user->friends()->wherePivot('friend_id', $receiver->id)->wherePivot('status', 'accepted')->exists()) {
    //     return back()->with('error', 'Bạn chưa kết bạn với người này');
    // }

    $request->validate([
        'message' => 'required|string|max:1000',
    ]);

    $message = Message::create([
        'sender_id' => $user->id,
        'receiver_id' => $receiver->id,
        'message' => $request->message,
    ]);

    // Phát sự kiện MessageSent
    broadcast(new MessageSent($message));

    return back()->with('success', 'Tin nhắn đã được gửi');
}
}
