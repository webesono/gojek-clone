<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rules\Unique;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TambahAdminController extends Controller
{
    public function index()
    {
        return view('TambahAdmin.index', [
            'title' => 'Register',

        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=> 'required | max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => ['required', 'email:dns','unique:users'],
            'password' => 'required | min:5 | max:255'
        ]);
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        $request->session()->flash('berhasil', 'Tambah User Berhasil');

        return redirect('/login');

    }
}
