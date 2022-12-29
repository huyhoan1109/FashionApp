<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Item;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isEmpty;

class CartIconComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];
    public function removeItem($row_id){
        Cart::find($row_id)->delete();
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }
    public function render(){
        $user_id = Session::get('key')['id'];
        $cart = Cart::where('user_id', $user_id)->get();
        return view('livewire.cart-icon-component', compact('cart'));
    }
}
