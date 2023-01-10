<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\Cart;
use App\Models\User;
use Error;
use Livewire\Component;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Monolog\Handler\ErrorLogHandler;
use Symfony\Component\Console\EventListener\ErrorListener;

class ItemComponent extends Component
{
    protected $listeners = ['refreshComponent', '$refresh'];
    public $item_id;
    public function mount($item_id)
    {
        $this->item_id = $item_id;
    }
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
        error_log(url()->current());
    }
    public function render()
    {
        $item = Item::find($this->item_id);
        return view('livewire.item-component', compact('item'));
    }
}