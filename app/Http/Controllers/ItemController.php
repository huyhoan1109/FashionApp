<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
class ItemController extends Controller
{
    public function addItem(Request $request){     
        $item = new Item();
        $item->name = $request->name;
        $item->stock = $request->stock;
        $item->type = $request->type;
        $item->color = $request->color;
        $item->price = $request->price;
        $item->size = $request->size;
        $item->image = $request->image;
        $item->description = $request->description;
        $item->review = $request->review;
        $item->save();
        return back();
    }
    public function fixItem(Request $request){
        $item = Item::find($request->item_id);
        $item->name = $request->name;
        $item->stock = $request->stock;
        $item->type = $request->type;
        $item->color = $request->color;
        $item->price = $request->price;
        $item->size = $request->size;
        $item->image = $request->image;
        $item->description = $request->description;
        $item->review = $request->review;
        return $item;
    }
    public function deleteItem(Request $request){
        Item::where('id', $request->item_id)->delete();
        return back();
    }

    public function itemDetail($item_id){
        $item = Item::find($item_id);
        $relateds = Item::where('type', $item->type)->take(3)->get();
        return view('item-detail', compact('item', 'relateds'));
    }
}
