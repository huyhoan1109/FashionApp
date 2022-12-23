<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CartController extends Controller
{
    public function addCart(Request $request){
        if ($request->session()->has('key')){  
            $cart = new Cart();
            $cart->user_id = $request->session()->get('key')['id'];
            $cart->item_id = $request->item_id;
            $cart->save();
        } else {
            $user = new User();
            $user->name = Str::random(15);
            $user->email = 'noreply'.User::where('type', 2)->count().'gmail.com';
            $user->password = Str::random(15);
            $user->address = 'Ha Noi';
            $user->phone = 0000000000;
            $user->type = 2; # user vang lai
            $user->save();
            $request->session()->put('key', $user);
            $cart = new Cart();
            $cart->user_id = $user->id();
            $cart->item_id = $request->item_id;
            $cart->save();
        }
        return back();
    }
    public function removeCart(Request $request){
        if ($request->session()->has('key')){  
            $user_id = $request->session()->get('key')['id'];
            $item_id = $request->item_id;
            $query = Cart::where('user_id', $user_id)->where('item_id', $item_id)->delete();
            if ($query){
                return back()->with('status', 'Remove successfully');
            } else {
                return back()->with('error', 'Something is wrong');
            }
        } 
    }
}