<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Item;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class DetailComponent extends Component
{
    public $item_id;
    public $user_id;
    public $quantity;
    public function mount($item_id){
        $this->user_id = Session::get('key')['id'];
        $this->item_id = $item_id;
        $this->quantity = 1;
    }
    public function reduceItem(){
        $this->quantity -= 1;
    }
    public function raiseItem(){
        $this->quantity += 1;
    }
    public function addWishlist($item_id){
        $validator = DB::table('wishlist')
                    ->where('user_id', $this->user_id)
                    ->where('item_id', $item_id)
                    ->exists();
        if(!$validator){
            DB::table('wishlist')->insert([
                'user_id' => $this->user_id,
                'item_id' => $item_id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        $this->emitTo('wishlist-icon-component', 'refreshComponent');
    }
    public function removeWishlist($id){
        DB::table('wishlist')->where('user_id', $this->user_id)->where('item_id', $id)->delete();
        $this->emitTo('wishlist-icon-component', 'refreshComponent');
    }
    public function addToCart(){
        $valid = Cart::where('user_id', $this->user_id)
                    ->where('item_id', $this->item_id)
                    ->exists();
        if(!$valid){
            Cart::create([
                'user_id' => $this->user_id,
                'item_id' => $this->item_id,
                'quantity' => $this->quantity
            ]);
        } else {
            $cart = Cart::where('user_id', $this->user_id)
                    ->where('item_id', $this->item_id)
                    ->first();
            $cart->quantity += $this->quantity;
            $cart->save();
        }
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }
    public function render()
    {
        $item = Item::find($this->item_id);
        return view('livewire.detail-component', compact('item'));
    }
}
