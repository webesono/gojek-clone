<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.allusers.index', [
            'users'=>User::where('id','!=',auth()->user()->id)->orderByDesc('status')->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.allusers.create');
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
            'name'=> 'required | min:1 | max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => ['required','unique:users'],
            'password' => 'required | min:5 | max:255',
            'status' =>'required',
            'photo' => 'image | file | max: 1024',
            'body' => 'required'
        ]);
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        if($request->file('photo')){
            $validatedData['photo'] =$request->file('photo')-> store('photo');
        }
        
        User::create($validatedData);

        return redirect('/dashboard/allusers')->with('success', 'Mantapp, Admin baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        {
            $user = User::find($id);
            return view('dashboard.profile.index', [
                "title" => "Profil dari : $user->name",
                'user'=>$user
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.allusers.edit', [
            'user'=> $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $rules =[
            'name'=> 'required | min:1 | max:255',
            // 'password' => 'required | min:5 | max:255',
            'status' =>'required',
            'photo' => 'image | file | max: 1024',
            'body' => 'required'
        ];

        // if($request->username != $user->username){
        //     $rules['username'] =['required', 'min:3', 'max:255', 'unique:users'];
        // }
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

        return redirect('/dashboard/allusers')->with('success', 'Mantapp, data user berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = Post::where('user_id', $id)->count();

        if ($count > 0) {
            return redirect('/dashboard/allusers')->with('danger', 'Gagal nih, admin ini masih punya postingan');
        } else {
            $user = User::find($id);
            if($user->userImage){
                Storage::delete($user->photo);
            }
            User::destroy($id);
        return redirect('/dashboard/allusers')->with('success', 'Admin berhasil dihapus');
        }
    }

}
