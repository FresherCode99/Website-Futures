<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        $user = Auth::user();
        
        return view('user.dashboard',compact('user'));
    }
    public  function   myProfile(){
        
        $user = Auth::user();
        $userTeams = $user->teams;
        $teamsWithUserCounts = [];
        foreach ($userTeams as $team) {
            // Get the count of users for each team
            $userCount = $team->users()->count();
            $firstTag = $team->tags()->first(); // Get the first tag for the team
            $teamsWithUserCounts[] = [
                'team' => $team,
                'userCount' => $userCount,
                'firstTag' => $firstTag, // Include the first tag
            ];
        }
        return view('user.my-profile',compact('user','userTeams','teamsWithUserCounts'));
    }
    public function myTeam() {
        $user = Auth::user();
        $userTeams = $user->teams;
        
        $teamsWithUserCounts = [];
        
        foreach ($userTeams as $team) {
            // Get the count of users for each team
            $userCount = $team->users()->count();
            $firstTag = $team->tags()->limit(2)->get(); // Get the first tag for the team
            $teamsWithUserCounts[] = [
                'team' => $team,
                'userCount' => $userCount,
                'firstTag' => $firstTag, // Include the first tag
            ];
        }

        // $team = Team::all();
        // $users = $team->users()->orderBy('pivot_created_at')->limit(3)->get();
        // $user = Auth::user();
        // $userTeams = $user->teams;
        $teamsWithEarliestUsers = [];

    foreach ($userTeams as $team) {
        // Get the three earliest users for each team
        $earliestUsers = $team->users()->orderBy('pivot_created_at')->limit(3)->get();
        $userCount = $team->users()->count(); // Count users in the team
        $firstTag = $team->tags()->limit(2)->get(); // Get the first tag for the team
        $teamsWithEarliestUsers[] = [
            'team' => $team,
            'earliestUsers' => $earliestUsers,
            'userCount' => $userCount, // Include user count
            'firstTag' => $firstTag, 
        ];
    }
        return view('user.teams',compact( 'user' , 'userTeams','teamsWithEarliestUsers' ,'teamsWithUserCounts', 'firstTag'));
    }
    public  function   accountSetting(){
        $user = Auth::user();
        return view('user.account-setting',compact('user'));
    }
}
