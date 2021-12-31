<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardLeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.allleaders.index', [
            'leaders'=>Leader::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.allleaders.create');
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
            'position' => 'required | max:255 | min:3',
            'leaderImage' => 'image | file | max: 1024',
            'body' => 'required'
        ]);

        if($request->file('leaderImage')){
            $validatedData['leaderImage'] =$request->file('leaderImage')-> store('leader-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 150, '...');
        
        Leader::create($validatedData);

        return redirect('/dashboard/allleaders')->with('success', 'Leader baru berhasil ditambahkan !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leader = Leader::find($id);
        return view('dashboard.allleaders.show', [
            'leader'=>$leader
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leader = Leader::find($id);
        return view('dashboard.allleaders.edit', [
            'leader'=> $leader
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $leader = Leader::find($id);
        $rules =[
            'name' => 'required| max:255 | min:3',
            'position' => 'required | max:255 | min:3',
            'leaderImage' => 'image | file | max: 1024',
            'body' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('leaderImage')){
            if($request->oldleaderImage){
                Storage::delete($request->oldleaderImage);
            }
            $validatedData['leaderImage'] =$request->file('leaderImage')-> store('leader-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 150, '...');
        
        Leader::where('id', $leader->id)
            ->update($validatedData);

        return redirect('/dashboard/allleaders')->with('success', 'Leader berhasil diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leader= Leader::find($id);
        if($leader->leaderImage){
            Storage::delete($leader->leaderImage);
        }
        Leader::destroy($id);
        return redirect('/dashboard/allleaders')->with('success', 'Leader berhasil dihapus');
    }

    public function dasearchLeader(Request $request){
        // Get the search value from the request
        $searchLeader = $request->input('dasearchLeader');
    
        // Search in the title and body columns from the helps table
        $leaders = Leader::query()
            ->where('name', 'LIKE', "%{$searchLeader}%")
            ->orWhere('body', 'LIKE', "%{$searchLeader}%")
            ->paginate(10)->withQueryString()
            ;
    
        // Return the search view with the resluts compacted
        return view('dashboard.allleaders.index', compact('leaders'),[
            "name"=>"Leaders"
        ]);
    }

}
