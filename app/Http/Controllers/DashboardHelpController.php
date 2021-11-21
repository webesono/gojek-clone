<?php

namespace App\Http\Controllers;

use App\Models\CategoryHelp;
use App\Models\Help;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

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
            'title' => 'required| max:255 | min:3',
            'slug' => 'required | unique:helps',
            'categoryHelp_id' => 'required',
            'body' => 'required'
        ]);
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
    public function edit(Help $help)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Help  $help
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Help $help)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Help  $help
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Help::destroy($id);
        return redirect('/dashboard/allhelps')->with('success', 'Data yang dipilih berhasil dihapus');

    }

    public function checkSlug(Request $request)
    {
        $slug1 = SlugService::createSlug(Help::class, 'slug', $request->title);
        return response()->json(['slug'=>$slug1]);
    }
}
