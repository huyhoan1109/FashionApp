<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function show(Request $request){
        $items = Item::query()->get();
        return view('shop', compact('items'));
    }
    public function search(Request $request){
        $items = Item::where('name', 'like', $request->q)->get();
        return view('shop', compact('items'));
    }
}