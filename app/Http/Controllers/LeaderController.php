<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    public function index()
    {
        return view('leaders', [
            "name" => "Leaders",
            "leaders" => Leader::orderByDesc('id')->get()
        ]);
    }

    public function searchLeader(Request $request){
        // Get the search value from the request
        $searchLeader = $request->input('searchLeader');
    
        // Search in the title and body columns from the helps table
        $leaders = Leader::query()
            ->where('name', 'LIKE', "%{$searchLeader}%")
            ->orWhere('body', 'LIKE', "%{$searchLeader}%")
            ->paginate(50)
            ;
    
        // Return the search view with the resluts compacted
        return view('leaders', compact('leaders'),[
            "name"=>"Leaders"
        ]);
    }

    public function show(Leader $leader)
    {
        return view('leader', [
            "name" => "Leaders",
            "leader" => $leader
        ]);
    }
}
