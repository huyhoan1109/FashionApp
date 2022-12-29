<?php

namespace App\Http\Controllers;

use App\Models\Item;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class WishlistController extends Controller
{
    public function show(Request $request){
        $user_id = $request->session()->get('key')['id'];
        $witems = DB::table('wishlist')->where('user_id', $user_id)->get();     
        $items = DB::table('wishlist')->where('user_id', $user_id)->get();           
        return view('wishlist', compact('items', 'witems'));
    }
    public function add(Request $request){
        $user_id = $request->session()->get('key')['id'];
                  
        return view('wishlist', compact('items', 'witems'));
    }
}
