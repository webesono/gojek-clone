<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        return view('posts', [
            "title" => "Post by Category : $category->name",
            'posts'=>$category->posts->load('category','author')
            
        ]);
    }
}
