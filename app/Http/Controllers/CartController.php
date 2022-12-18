<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class cartController extends Controller
{
    public function add(Request $request){
        error_log($request['item']);
    }
    public function remove(Request $request){
        error_log($request['item']);
    }
}
