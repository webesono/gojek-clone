<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            "title" => "Home",
            "leaders" => Leader::get(),
            "products" => Product::get(),
            "users" => User::get()

        ]);
    }
}
