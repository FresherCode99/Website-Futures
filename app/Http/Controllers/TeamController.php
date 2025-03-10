<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $teams = Team::where('admin_id', $user->id)->with('users')->get(); 
        
        return view('teams.index', compact('user', 'teams')); 
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('teams.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $team = Team::create([
            'name' => $request->name,
            'admin_id' => auth()->id(), // Đặt admin là người đăng nhập hiện tại
            'description' => $request->description,
            'image' => 'avatars/2.png',
        ]);

        // Thêm admin vào team
        $team->users()->attach(auth()->id());
        session()->flash('alert', [
            'title' => 'Thành Công',
            'ic' => 'success', 
            'message' => 'Thêm người dùng vào team thành công!'
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $team = Team::findOrFail($id);
        $allUsers = User::all(); // Lấy tất cả người dùng để mời
        return view('teams.show', compact('team', 'allUsers'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function addUserToTeam(Request $request, $teamId)
    {
        $team = Team::findOrFail($teamId);
    
        // Kiểm tra nếu người dùng hiện tại là admin của team
        if ($team->admin_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Bạn không có quyền thêm người vào team');
        }
    
        $user = User::find($request->user_id);
        if ($user) {
            // Check if the user is already a member of the team
            if ($team->users()->where('users.id', $user->id)->exists()) {
                session()->flash('alert', [
                    'title' => 'Lỗi',
                    'ic' => 'danger', 
                    'message' => 'Người dùng đã là thành viên của team!'
                ]);
                return redirect()->back()->with('error', 'Người dùng đã là thành viên của team');
            }
    
            $team->users()->attach($user->id);
            return redirect()->route('teams.show', $teamId);
        }
    
        return redirect()->back()->with('error', 'Người dùng không tồn tại');
    }

}
