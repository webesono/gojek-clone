<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            "title" => "Posts",
            "posts" => Post::orderByDesc('id')->get(),
            "kategori" => Category::get()
        ]);
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('body', 'LIKE', "%{$search}%")
            ->paginate(50)
            ;
    
        // Return the search view with the resluts compacted
        return view('posts', compact('posts'),[
            "title"=>"Posts"
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Posts",
            "post" => $post
        ]);
    }
}
