<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth()->user()->id);
        return view('dashboard.profile.index', [
            'title'=>'My Profile',
            'user'=>$user
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.profile.edit', [
            'user'=> $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $rules =[
            'name'=> 'required | min:1 | max:255',
            // 'status' =>'required',
            'photo' => 'image | file | max: 1024',
            'body' => 'required'
        ];
        
        if($request->username != $user->username){
            $rules['username'] =['required', 'min:3', 'max:255', 'unique:users'];
        }
        if($request->email != $user->email){
            $rules['email'] =['required','unique:users'];
        }

        
        $validatedData = $request->validate($rules);

        if($request->file('photo')){
            if($request->oldphoto){
                Storage::delete($request->oldphoto);
            }
            $validatedData['photo'] =$request->file('photo')-> store('photo');
        }
        
        User::where('id', $user->id)
            ->update($validatedData);

        return redirect('/dashboard/profile')->with('success', 'Mantapp, data user berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
