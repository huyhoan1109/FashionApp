<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\User;
use Illuminate\Support\Facades\Session;
class CheckoutComponent extends Component
{
    public function createOrder(){
        
    }
    public function render()
    {
        $user_id = Session::get('key')['id'];
        $user = User::find($user_id);
        $cart = Cart::where('user_id', $user_id)->get();
        $coupon = Coupon::first();
        return view('livewire.checkout-component', compact('user', 'cart', 'coupon'));
    }
}
