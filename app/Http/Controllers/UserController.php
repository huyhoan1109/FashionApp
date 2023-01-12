<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{   
    public $user_id; 
    public function show(Request $request){
        $this->user_id = $request->session()->get('key')['id'];
        $user = User::find($this->user_id);
        return view('user', compact('user'));
    }
    public function track(Request $request){
        $validator = Order::where('id', "=", $request->id)->exists();
        if ($validator){
            Mail::send('mail.order-track',['order_id' => $request->id], function($message) use ($request) {
                $message->subject('Reset Password Notification');
                $message->to($request->billing_email);
            });
            return redirect()->back()->with('message', 'Sending message successfully!');
        } else {
            
            return redirect()->back()->with('error', 'Something is wrong!');
        }
    }
    public function update(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status", "Password changed successfully!");
    }
}
