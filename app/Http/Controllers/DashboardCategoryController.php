<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.allcategories.index', [
            'categories'=>Category::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required| max:255 | min:3',
            'slug' => 'required | unique:categories',
        ]);
        
        Category::create($validatedData);

        return redirect('/dashboard/allcategories')->with('success', 'Mantapp, Kategori baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('dashboard.allcategories.edit', [
            'category'=> $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $rules =[
            'name' => 'required| max:255 | min:3'
        ];

        if($request->slug != $category->slug){
            $rules['slug'] ='required | unique:categories';
        }

        $validatedData = $request->validate($rules);
        
        Category::where('id', $category->id)
            ->update($validatedData);

        return redirect('/dashboard/allcategories')->with('success', 'Sip, Kategori berhasil diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = Post::where('category_id', $id)->count();

        if ($count > 0) {
            return redirect('/dashboard/allcategories')->with('danger', 'Gagal nih, ada postingan yang masih pake kategori ini');
        } else {
            Category::destroy($id);
        return redirect('/dashboard/allcategories')->with('success', 'Data yang dipilih berhasil dihapus');
        }
        
    }
}
