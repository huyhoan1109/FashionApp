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
            'firstname'      => 'required|string|max:255',
            'lastname'       => 'required|string|max:255',
            'email'          => 'required|string|email|max:255|unique:users',
            'password'       => 'required|string|confirmed',
            'address'        => 'required|string|max:255',
            'phone'   => 'required|digits:10',
            'password_confirmation' => 'required',
        ]);
        if ($validator->fails()){
            toast($validator->errors(), 'error', 'top-right');
            return back();
        } else { 
            User::create([
                'firstname'    => $request->firstname,
                'lastname'     => $request->lastname,
                'email'        => $request->email,
                'address'      => $request->address,
                'phone' => $request->phone,
                'password'     => Hash::make($request->password),
            ]);
            toast('Register successfully', 'success', 'top-right');
            return redirect()->route('login');
        }
    }
}