<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function show(Request $request){
        $item_name = $request->query('q');;
        return view('shop', compact('item_name'));
    }
}