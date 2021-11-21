<?php

namespace App\Http\Controllers;

use App\Models\CategoryHelp;
use App\Models\Help;
use Illuminate\Http\Request;

class CategoryHelpController extends Controller
{
    public function show(CategoryHelp $categoryHelp)
    {
        return view('helps', [
            "title" => "Help With Category : $categoryHelp->name",
            'helps'=>$categoryHelp->helps->load('categoryHelp')
            
        ]);
    }
}
