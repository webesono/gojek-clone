<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.editPassword');
    }
     /**
     * Change the current password
     * @param Request $request
     * @return Renderable
     */
    public function changePassword(Request $request)
    {       
        $user = Auth::user();
    
        $userPassword = $user->password;
        
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|same:confirm_password|min:5',
            'confirm_password' => 'required',
        ]);

        if (!Hash::check($request->current_password, $userPassword)) {
            return back()->withErrors(['current_password'=>'password not match']);
        }

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('/dashboard/profile')->with('success','password successfully updated');
    }
}
