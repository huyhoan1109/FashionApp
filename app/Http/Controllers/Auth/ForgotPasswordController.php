<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

class ForgotPasswordController extends Controller
{
    public function getEmail()
    {
       return view('auth.passwords.email');
    }
    public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token = Str::random(60);
        DB::table('password_reset')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        Mail::send('auth.verify',['token' => $token], function($message) use ($request) {
            $message->subject('Reset Password Notification');
            $message->to($request->email);
        });
        return back();
    }
}
