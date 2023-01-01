<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Coupon;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class CartComponent extends Component
{
    protected $coupon;
    public $coupon_code;
    protected $listeners = ['refreshComponent' => '$refresh'];
    public function raiseItem($row_id){
        $cart = Cart::find($row_id);
        error_log($row_id);
        $qty = $cart->quantity + 1;
        Cart::whereId($row_id)->update([
            'quantity' => $qty
        ]);
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }
    public function reduceItem($row_id){
        $cart = Cart::find($row_id);
        error_log($cart->quantity);
        if ($cart->quantity > 0){
            $qty = $cart->quantity - 1;
            Cart::whereId($row_id)->update([
                'quantity' => $qty
            ]);
        }
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }
    public function removeItem($row_id){
        Cart::find($row_id)->delete();
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }
    public function addCoupon(){
        error_log($this->coupon_code);
    }
    public function mount(){
        $this->coupon = null;
        $this->coupon_code = "";
    }
    public function render(){
        $user_id = Session::get('key')['id'];
        $cart = Cart::where('user_id', $user_id)->get();
        $discount = 0;
        if($this->coupon){
            $discount = $this->coupon->discount;
        }
        return view('livewire.cart-component', compact('cart', 'discount'));
    }
}
