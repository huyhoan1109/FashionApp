<?php

namespace App\Http\Controllers;

use App\Models\Item;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class WishlistController extends Controller
{
    public function show(){          
        return view('wishlist');
    }
}