<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Ensure the authenticated user is retrieved
        // Danh sách người dùng chưa kết bạn với người hiện tại
        $users = User::whereDoesntHave('friends', function($query) {
            $query->where('friends.status', 'accepted');
        })->paginate(9);

        // Danh sách các yêu cầu kết bạn đang chờ xử lý
        $pendingRequests = Friend::where('friend_id', $user->id)
                                  ->where('status', 'pending')
                                  ->get();



        // Danh sách bạn bè đã chấp nhận kết bạn
        $friends = $user->friends;

        return view('friends.index', compact('user','users', 'pendingRequests', 'friends'));
    }

    public function sendFriendRequest($friendId)
    {
        $userId = auth()->id();
        Friend::create([
            'user_id' => $userId,
            'friend_id' => $friendId,
            'status' => 'pending',
        ]);
        Friend::create([
            'user_id' => $friendId,
            'friend_id' => $userId,
            'status' => 'pending'
        ]);
        session()->flash('alert', [
            'title' => 'Thêm Bạn',
            'ic' => 'success', 
            'message' => 'Đã gửi lời mời kết bạn ,đợi người dùng phản hồi!'
        ]);
        return back()->with('message', 'Friend request sent');
    }

    public function acceptFriendRequest($friendId)
    {
        $userId = auth()->id();
        $friendRequest = Friend::where('user_id', $friendId)
                               ->where('friend_id', $userId)
                               ->first();
        
        
        $friendRequests = Friend::where('user_id', $userId)
                               ->where('friend_id', $friendId)
                               ->first();

        $friendRequest->update(['status' => 'accepted']);
        $friendRequests->update(['status' => 'accepted']);
        return back()->with('message', 'Friend request accepted');
    }

    public function rejectFriendRequest($friendId)
    {
        $userId = auth()->id();
        $friendRequest = Friend::where('user_id', $friendId)
                               ->where('friend_id', $userId)
                               ->first();

        $friendRequest->update(['status' => 'rejected']);

        return back()->with('message', 'Friend request rejected');
    }
}
