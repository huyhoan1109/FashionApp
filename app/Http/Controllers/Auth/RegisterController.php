<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class RegisterController extends Controller
{
    public function register()
    {
        $role = DB::table('users')->get();
        return view('auth.register',compact('role'));
    }
    public function storeUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|confirmed',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|digits:10',
            'password_confirmation' => 'required',
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator->errors());
        } else { 
            User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'address'   => $request->address,
                'phone_number' => $request->phone_number,
                'password'  => Hash::make($request->password),
            ]);
            return redirect()->route('login');
        }
    }
}