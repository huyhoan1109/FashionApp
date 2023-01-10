<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Coupon;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class CartComponent extends Component
{
    public $user_id;
    protected $listeners = ['refreshComponent', '$refresh'];
    public function raiseItem($row_id){
        $cart = Cart::find($row_id);
        $cart->quantity = $cart->quantity + 1;
        $cart->save();
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }
    public function reduceItem($row_id){
        $cart = Cart::find($row_id);
        if ($cart->quantity > 0){
            $cart->quantity = $cart->quantity - 1;;
            $cart->save();
        }
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }
    public function removeItem($row_id){
        Cart::find($row_id)->delete();
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }
    public function removeCart(){
        Cart::where('user_id', $this->user_id)->delete();
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }
    public function mount($user_id){
        $this->user_id = $user_id;
    }
    public function render(){
        $user_id = $this->user_id;
        $cart = Cart::where('user_id', $user_id)->get();
        error_log(count($cart));
        return view('livewire.cart-component', compact('cart'));
    }
}