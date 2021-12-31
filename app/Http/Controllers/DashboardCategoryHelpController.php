<?php

namespace App\Http\Controllers;

use App\Models\CategoryHelp;
use App\Models\Help;
use Illuminate\Http\Request;

class DashboardCategoryHelpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.allCategoryHelps.index',[
            'categoryHelps'=>CategoryHelp::latest()->paginate(10)
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
        
        CategoryHelp::create($validatedData);

        return redirect('/dashboard/allcategoryHelps')->with('success', 'Mantapp, Kategori baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryHelp  $categoryHelp
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryHelp $categoryHelp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryHelp  $categoryHelp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryHelp = CategoryHelp::find($id);
        return view('dashboard.allcategoryHelps.edit', [
            'categoryHelp'=> $categoryHelp
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryHelp  $categoryHelp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoryHelp = CategoryHelp::find($id);
        $rules =[
            'name' => 'required| max:255 | min:3'
        ];

        if($request->slug != $categoryHelp->slug){
            $rules['slug'] ='required | unique:helps';
        }

        $validatedData = $request->validate($rules);
        
        CategoryHelp::where('id', $categoryHelp->id)
            ->update($validatedData);

        return redirect('/dashboard/allcategoryHelps')->with('success', 'Sip, Kategori berhasil diupdate !');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryHelp  $categoryHelp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = Help::where('categoryHelp_id', $id)->count();

        if ($count > 0) {
            return redirect('/dashboard/allcategoryHelps')->with('danger', 'Gagal nih, ada postingan help yang masih pake kategori ini');
        } else {
            CategoryHelp::destroy($id);
            return redirect('/dashboard/allcategoryHelps')->with('success', 'Data yang dipilih berhasil dihapus');
        }
        
       
    }
}
