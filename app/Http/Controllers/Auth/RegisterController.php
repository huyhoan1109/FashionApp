<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function register()
    {
        $role = DB::table('users')->get();
        return view('auth.register',compact('role'));
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:8|confirmed',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|digits:10',
            'password_confirmation' => 'required',
        ]);
        $query = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'address'   => $request->address,
            'phone_number' => $request->phone_number,
            'password'  => Hash::make($request->password),
        ]);
        if ($query){
            return redirect()->route('login');
        } else {
            return redirect()->back()->with('fail', "Something went wrong");
        }
    }
}