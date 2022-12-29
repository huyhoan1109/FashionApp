<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function show(Request $request){
        $user_id = $request->session()->get('key')['id'];
        $items = Item::query()->get();
        return view('shop', compact('items'));
    }
    public function search(){
        $items = Item::all();
        return view('shop', compact('items'));
    }
}
