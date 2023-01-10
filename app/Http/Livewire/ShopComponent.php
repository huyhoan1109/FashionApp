<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\Cart;

use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class ShopComponent extends Component
{
    protected $listeners = ['refreshComponent', '$refresh'];
    use WithPagination;
    public $pageSize;

    public function addToCart($item_id){
        $user_id = Session::get('key')['id'];
        $valid = Cart::where('user_id', $user_id)
                    ->where('item_id', $item_id)
                    ->exists();
        if(!$valid){
            Cart::create([
                'user_id' => $user_id,
                'item_id' => $item_id,
                'quantity' => 1
            ]);
        } else {
            $cart = Cart::where('user_id', $user_id)
                    ->where('item_id', $item_id)
                    ->first();
            $cart->quantity += 1;
            $cart->save();
        }
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }
    public function addWishlist($item_id){
        $user_id = Session::get('key')['id'];
        $validator = DB::table('wishlist')
                    ->where('user_id', $user_id)
                    ->where('item_id', $item_id)
                    ->exists();
        if(!$validator){
            DB::table('wishlist')->insert([
                'user_id' => $user_id,
                'item_id' => $item_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        $this->emitTo('wishlist-icon-component', 'refreshComponent');
    }
    public function removeWishlist($item_id){
        $user_id = Session::get('key')['id'];
        DB::table('wishlist')
            ->where('user_id', $user_id)
            ->where('item_id', $item_id)
            ->delete();
        $this->emitTo('wishlist-icon-component', 'refreshComponent');
    }
    public function mount(){
        $this->pageSize = 12;
    }
    public function changePageSize($size){
        $this->pageSize = $size;
    }
    public function render()
    {
        $items = Item::paginate($this->pageSize);
        return view('livewire.shop-component', [
            'items' => $items
        ]);
    }
}
