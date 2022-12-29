<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class CartComponent extends Component
{
    public function raiseItem($row_id){
        $cart = Cart::find($row_id)->first();
        $qty = $cart->quantity + 1;
        Cart::whereId($row_id)->update([
            'quantity' => $qty
        ]);
    }
    public function reduceItem($row_id){
        $cart = Cart::find($row_id)->first();
        if ($cart->quantity > 0){
            $qty = $cart->quantity - 1;
            Cart::whereId($row_id)->update([
                'quantity' => $qty
            ]);
        }
    }
    public function removeItem($row_id){
        Cart::find($row_id)->delete();
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }
    public function render(){
        $user_id = Session::get('key')['id'];
        $cart = Cart::where('user_id', $user_id)->get();
        return view('livewire.cart-component', compact('cart'));
    }
}
