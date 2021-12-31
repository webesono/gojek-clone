<?php

namespace App\Http\Controllers;

use App\Models\Help;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index()
    {
        return view('helps', [
            "title" => "Need Some Helps?",
            "helps" => Help::orderByDesc('id')->get()
        ]);
    }

    public function searchHelp(Request $request){
        // Get the search value from the request
        $searchHelp = $request->input('searchHelp');
    
        // Search in the title and body columns from the helps table
        $helps = Help::query()
            ->where('judul', 'LIKE', "%{$searchHelp}%")
            ->orWhere('body', 'LIKE', "%{$searchHelp}%")
            ->paginate(50)
            ;
    
        // Return the search view with the resluts compacted
        return view('helps', compact('helps'),[
            "title"=>"Need Some Helps?"
        ]);
    }

    public function show(Help $help)
    {
        return view('help', [
            "title" => "Need Some Helps?",
            "help" => $help
        ]);
    }
}
