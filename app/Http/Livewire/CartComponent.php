<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Item;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class CartComponent extends Component
{
    public function render()
    {
        $user_id = Session::get('key')['id'];
        $cart_list = Cart::where('user_id', $user_id)->get();
        $cart_data = [];
        error_log(count($cart_data));
        $total = 0;
        foreach($cart_list as $cart){
            $item = Item::find($cart->item_id);
            $cart_data[] = [
                'name' => $item->name,
                'quantity' => $cart->quantity,
                'image' => $item->image,
                'price' => $item->price
            ];
            $total += $cart->quantity * $item->price;
        }
        error_log(count($cart_data));
        return view('livewire.cart-component', compact('cart_data', 'total'));
    }
}
