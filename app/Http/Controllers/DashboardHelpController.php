<?php

namespace App\Http\Controllers;

use App\Models\Help;
use App\Models\CategoryHelp;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardHelpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.allhelps.index', [
            'helps'=>Help::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.allhelps.create', [
            'categoryHelps'=>CategoryHelp::all()
        ]);
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
            'judul' => 'required| max:255 | min:3',
            'slug' => 'required | unique:helps',
            'categoryHelp_id' => 'required',
            'helpImage' => 'image | file | max: 1024',
            'body' => 'required'
        ]);

        if($request->file('helpImage')){
            $validatedData['helpImage'] =$request->file('helpImage')-> store('help-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 150, '...');
        
        Help::create($validatedData);

        return redirect('/dashboard/allhelps')->with('success', 'Mantapp, Postingan Help baru kamu berhasil ditambahkan !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Help  $help
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $help = Help::find($id);
        return view('dashboard.allhelps.show', [
            'help'=>$help
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Help  $help
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $help = Help::find($id);
        return view('dashboard.allhelps.edit', [
            'help'=> $help,
            'categoryHelps'=>CategoryHelp::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Help  $help
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $help = Help::find($id);
        $rules =[
            'judul' => 'required| max:255 | min:3',
            'categoryHelp_id' => 'required',
            'helpImage' => 'image | file | max: 1024',
            'body' => 'required'
        ];

        if($request->slug != $help->slug){
            $rules['slug'] ='required | unique:helps';
        }

        $validatedData = $request->validate($rules);

        if($request->file('helpImage')){
            if($request->oldhelpImage){
                Storage::delete($request->oldhelpImage);
            }
            $validatedData['helpImage'] =$request->file('helpImage')-> store('help-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 150, '...');
        
        Help::where('id', $help->id)
            ->update($validatedData);

        return redirect('/dashboard/allhelps')->with('success', 'Mantapp, Postingan Help berhasil diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Help  $help
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $help= Help::find($id);
        if($help->helpImage){
            Storage::delete($help->helpImage);
        }
        Help::destroy($id);
        return redirect('/dashboard/allhelps')->with('success', 'Data yang dipilih berhasil dihapus');

    }

    // public function cekSlug(Request $request)
    // {
    //     $slug = SlugService::createSlug(Help::class, 'slug', $request->judul);
    //     return response()->json(['slug'=>$slug]);
    // }

    public function dasearchHelp(Request $request){
        // Get the search value from the request
        $searchHelp = $request->input('dasearchHelp');
    
        // Search in the judul and body columns from the helps table
        $helps = Help::query()
            ->where('judul', 'LIKE', "%{$searchHelp}%")
            ->orWhere('body', 'LIKE', "%{$searchHelp}%")
            ->paginate(10)->withQueryString()
            ;
    
        // Return the search view with the resluts compacted
        return view('dashboard.allhelps.index', compact('helps'),[
            "title"=>"Need Some Helps?"
        ]);
    }
}
