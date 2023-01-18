<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{   
    public function show(Request $request){
        $user = User::find($request->session()->get('key')['id']);
        return view('user', compact('user'));
    }
    public function track(Request $request){
        $validator = Order::where('id', "=", $request->id)->exists();
        if ($validator){
            Mail::send('mail.order-track',['order_id' => $request->id], function($message) use ($request) {
                $message->subject('Your Order');
                $message->to($request->billing_email);
            });
            toast('Sending message successfully!', 'success', 'top-right');
        } else {
            toast('Something is wrong!', 'error', 'top-right');
        }
        return back();
    }
    public function update(Request $request)
    {
        # Validation
        $valid = Validator::make($request->all(), [
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'newpassword_confirmation' => 'required'
        ]);
        if ($request->newpassword != $request->newpassword_confirmation){
            toast('Password confirmation is wrong!', 'error', 'top-right');
        }
        #Match The Old Password
        elseif(!Hash::check($request->oldpassword, auth()->user()->password)){
            toast('Old password is wrong!', 'error', 'top-right');
        }
        else {
            #Update the new Password
            error_log(2);
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->newpassword)
            ]);
            toast('Update password successfully!', 'success', 'top-right');
        }
        return back();
    }
}
