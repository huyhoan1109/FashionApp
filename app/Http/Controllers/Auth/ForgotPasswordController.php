<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Brian2694\Toastr\Facades\Toastr;

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

        Mail::send('auth.verify',['token' => $token], function($message) use ($request) {
            $message->subject('Reset Password Notification');
            $message->to($request->email);
        });
        Toastr::success('We have e-mailed your password reset link! :)','Success');
        return back();
    }
}
